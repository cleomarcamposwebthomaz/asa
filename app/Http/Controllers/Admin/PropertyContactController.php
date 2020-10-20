<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\ModelFilters\AdminFilters\PropertyContactFilter;
use App\Models\PropertyContact;

class PropertyContactController extends Controller
{

    protected $propertyContact;

    public function __construct(PropertyContact $propertyContact)
    {
        $this->propertyContact = $propertyContact;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $propertyContacts = $this->propertyContact
            ->filter($request->all(), PropertyContactFilter::class)
            ->sortable()
            ->orderBy('id', 'desc')
            ->paginate();

        $total = $this->propertyContact->filter($request->all(), PropertyContactFilter::class)->count();

        return view('admin.pages.property-contact.index', [
            'propertyContacts' => $propertyContacts,
            'total' => $total,
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

        return view('admin.pages.property-contact.create', compact('saveFormContinueAdd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyContactRequest $request)
    {
        $data = $request->only($this->propertyContact->fillable);

        $this->propertyContact->create($data);

        $request->session()->flash('success', 'Salvo com sucesso.');

        if (!empty($request->input('save-and-create'))) {
            return redirect()->back();
        }

        return redirect()->route('admin.property-contact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $propertyContact = $this->propertyContact->findOrFail($id);
        $propertyContact->load('property');
        $propertyContact->load('broker');

        if (!$propertyContact->is_read) {
            $propertyContact->is_read = true;
            $propertyContact->save();
        }

        return view('admin.pages.property-contact.show', [
            'propertyContact' => $propertyContact
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $propertyContact = $this->propertyContact->findOrFail($id);

        return view('admin.pages.property-contact.edit', [
            'propertyContact' => $propertyContact,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyContactRequest $request, $id)
    {
        $data = $request->only($this->propertyContact->fillable);

        $propertyContact = $this->propertyContact->findOrFail($id);

        $propertyContact->fill($data)->save();

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.property-contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $propertyContact = $this->propertyContact->findOrFail($id);
        $propertyContact->delete();

        Session::flash('success', 'Registro deletado com sucesso.');

        return redirect()->route('admin.property-contact.index');
    }
}