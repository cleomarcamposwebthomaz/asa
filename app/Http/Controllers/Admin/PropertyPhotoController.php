<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyPhotoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\ModelFilters\AdminFilters\PropertyPhotoFilter;
use App\Models\PropertyPhoto;
use App\Models\Property;

class PropertyPhotoController extends Controller
{
    protected $propertyPhoto;
    protected $property;

    public function __construct(PropertyPhoto $propertyPhoto, Property $property)
    {
        $this->property = $property;
        $this->propertyPhoto = $propertyPhoto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $property_id)
    {
        $property = $this->property->findOrFail($property_id);

        $propertyPhotos = $this->propertyPhoto
            ->filter(
                $request->all(),
                PropertyPhotoFilter::class
            )
            ->where('property_id', $property_id)
            ->sortable()
            ->orderBy('id', 'desc')
            ->paginate();

        return response()->json($propertyPhotos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($property_id)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyPhotoRequest $request, $property_id)
    {
        $last = $this->propertyPhoto
            ->query()
            ->where('property_id', $property_id)
            ->max('sort');

        $data = $request->only($this->propertyPhoto->fillable);
        $data['sort'] = $last += 1;
        $data['property_id'] = $property_id;

        $propertyPhoto = $this->propertyPhoto->create($data);

        return response()->json([
            'success' => true,
            'message' => __('Salvo com sucesso'),
            'data' => $propertyPhoto,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($property_id, $id)
    {
        $property = $this->property->findOrFail($property_id);
        $propertyPhoto = $this->propertyPhoto->findOrFail($id);

        return view('admin.pages.property.photo.edit', [
            'propertyPhoto' => $propertyPhoto,
            'property' => $property
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyPhotoRequest $request, $property_id, $id)
    {
        $data = $request->only($this->propertyPhoto->fillable);
        $data['active'] = !empty($data['active']) ? true : false;

        $propertyPhoto = $this->propertyPhoto->findOrFail($id);

        $propertyPhoto->fill($data)->save();

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.property.edit', [
            'property' => $property_id,
            'tab' => 'tab-photo'
        ]);
    }

    public function reorder(Request $request)
    {
        foreach ($request->post('item') as $sort => $id) {
            $sort = $this->propertyPhoto->query()->where('id', $id)->update([
                'sort' => $sort
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($property_id, $id)
    {
        $propertyPhoto = $this->propertyPhoto->findOrFail($id);
        $propertyPhoto->delete();

        return response()->json([
            'success' => true,
            'message' => __('Registro deletado com sucesso')
        ]);
    }
}