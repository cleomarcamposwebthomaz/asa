<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OfferTypeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\ModelFilters\AdminFilters\OfferTypeFilter;
use App\Models\OfferType;

class OfferTypeController extends Controller
{
    protected $offerType;

    public function __construct(offerType $offerType)
    {
        $this->offerType = $offerType;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $offerTypes = $this->offerType
            ->filter($request->all(), OfferTypeFilter::class)
            ->sortable()
            ->orderBy('id', 'desc')
            ->paginate();

        return view('admin.pages.offer-type.index', [
            'offerTypes' => $offerTypes
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

        $colors = $this->offerType->getColors();

        return view('admin.pages.offer-type.create', compact('saveFormContinueAdd', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferTypeRequest $request)
    {
        $data = $request->only($this->offerType->fillable);

        $this->offerType->create($data);

        $request->session()->flash('success', 'Salvo com sucesso.');

        if (!empty($request->input('save-and-create'))) {
            return redirect()->back();
        }

        return redirect()->route('admin.offer-type.index');
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
        $offerType = $this->offerType->findOrFail($id);
        $colors = $this->offerType->getColors();

        return view('admin.pages.offer-type.edit', [
            'offerType' => $offerType,
            'colors' => $colors,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfferTypeRequest $request, $id)
    {
        $data = $request->only($this->offerType->fillable);

        $offerType = $this->offerType->findOrFail($id);

        $offerType->fill($data)->save();

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.offer-type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offerType = $this->offerType->findOrFail($id);
        $offerType->delete();

        Session::flash('success', 'Registro deletado com sucesso.');

        return redirect()->route('admin.offer-type.index');
    }
}