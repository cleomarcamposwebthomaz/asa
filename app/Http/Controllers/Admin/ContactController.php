<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\ModelFilters\AdminFilters\ContactFilter;
use App\Models\Contact;

class ContactController extends Controller
{

    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = $this->contact
            ->filter($request->all(), ContactFilter::class)
            ->sortable()
            ->orderBy('id', 'desc')
            ->paginate();

        $total = $this->contact->filter($request->all(), ContactFilter::class)->count();

        return view('admin.pages.contact.index', [
            'contacts' => $contacts,
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

        return view('admin.pages.contact.create', compact('saveFormContinueAdd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $data = $request->only($this->contact->fillable);

        $this->contact->create($data);

        $request->session()->flash('success', 'Salvo com sucesso.');

        if (!empty($request->input('save-and-create'))) {
            return redirect()->back();
        }

        return redirect()->route('admin.contact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = $this->contact->findOrFail($id);

        if (!$contact->is_read) {
            $contact->is_read = true;
            $contact->save();
        }

        return view('admin.pages.contact.show', [
            'contact' => $contact
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
        $contact = $this->contact->findOrFail($id);

        return view('admin.pages.contact.edit', [
            'contact' => $contact,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, $id)
    {
        $data = $request->only($this->contact->fillable);

        $contact = $this->contact->findOrFail($id);

        $contact->fill($data)->save();

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = $this->contact->findOrFail($id);
        $contact->delete();

        Session::flash('success', 'Registro deletado com sucesso.');

        return redirect()->route('admin.contact.index');
    }
}