<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyTypeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\PropertyType;
use App\ModelFilters\AdminFilters\PropertyTypeFilter;

class PropertyTypeController extends Controller
{
    protected $propertyType;

    public function __construct(propertyType $propertyType)
    {
        $this->propertyType = $propertyType;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $propertyTypes = $this->propertyType
                                ->filter($request->all(), propertyTypeFilter::class)
                                ->sortable()
                                ->orderBy('id', 'desc')
                                ->paginate();

        return view('admin.pages.property-type.index', [
            'propertyTypes' => $propertyTypes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $saveFormContinueAdd = true;
        return view('admin.pages.property-type.create', compact('saveFormContinueAdd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(propertyTypeRequest $request)
    {
        $data = $request->only(['name', 'active']);

        $this->propertyType->create($data);

        $request->session()->flash('success', 'Salvo com sucesso.');

        if (!empty($request->input('save-and-create'))) {
            return redirect()->back();
        }

        return redirect()->route('admin.property-type.index');
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
    public function edit($id)
    {
        $propertyType = $this->propertyType->findOrFail($id);

        return view('admin.pages.property-type.edit', [
            'propertyType' => $propertyType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only(['name', 'active']);
        $data['active'] = !empty($data['active']) ? true : false;

        $propertyType = $this->propertyType->findOrFail($id);

        $propertyType->fill($data)->save();

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.property-type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $propertyType = $this->propertyType->findOrFail($id);
        $propertyType->delete();

        Session::flash('success', 'Registro deletado com sucesso.');

        return redirect()->route('admin.property-type.index');
    }
}