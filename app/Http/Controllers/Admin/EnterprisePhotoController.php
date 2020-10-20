<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EnterprisePhotoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\ModelFilters\AdminFilters\EnterprisePhotoFilter;
use App\Models\EnterprisePhoto;
use App\Models\Enterprise;

class EnterprisePhotoController extends Controller
{
    protected $enterprisePhoto;
    protected $enterprise;

    public function __construct(EnterprisePhoto $enterprisePhoto, Enterprise $enterprise)
    {
        $this->enterprise = $enterprise;
        $this->enterprisePhoto = $enterprisePhoto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $enterprise_id)
    {
        $enterprise = $this->enterprise->findOrFail($enterprise_id);

        $enterprisePhotos = $this->enterprisePhoto
            ->filter(
                $request->all(),
                EnterprisePhotoFilter::class
            )
            ->where('enterprise_id', $enterprise_id)
            ->sortable()
            ->orderBy('id', 'desc')
            ->paginate();

        return response()->json($enterprisePhotos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($enterprise_id)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnterprisePhotoRequest $request, $enterprise_id)
    {
        $last = $this->enterprisePhoto
            ->query()
            ->where('enterprise_id', $enterprise_id)
            ->max('sort');

        $data = $request->only($this->enterprisePhoto->fillable);
        $data['sort'] = $last += 1;
        $data['enterprise_id'] = $enterprise_id;

        $enterprisePhoto = $this->enterprisePhoto->create($data);

        return response()->json([
            'success' => true,
            'message' => __('Salvo com sucesso'),
            'data' => $enterprisePhoto,
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
    public function edit($enterprise_id, $id)
    {
        $enterprise = $this->enterprise->findOrFail($enterprise_id);
        $enterprisePhoto = $this->enterprisePhoto->findOrFail($id);

        return view('admin.pages.enterprise.photo.edit', [
            'enterprisePhoto' => $enterprisePhoto,
            'enterprise' => $enterprise
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EnterprisePhotoRequest $request, $enterprise_id, $id)
    {
        $data = $request->only($this->enterprisePhoto->fillable);
        $data['active'] = !empty($data['active']) ? true : false;

        $enterprisePhoto = $this->enterprisePhoto->findOrFail($id);

        $enterprisePhoto->fill($data)->save();

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.enterprise.edit', [
            'enterprise' => $enterprise_id,
            'tab' => 'tab-photo'
        ]);
    }

    public function reorder(Request $request)
    {
        foreach ($request->post('item') as $sort => $id) {
            $sort = $this->enterprisePhoto->query()->where('id', $id)->update([
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
    public function destroy($enterprise_id, $id)
    {
        $enterprisePhoto = $this->enterprisePhoto->findOrFail($id);
        $enterprisePhoto->delete();

        return response()->json([
            'success' => true,
            'message' => __('Registro deletado com sucesso')
        ]);
    }
}