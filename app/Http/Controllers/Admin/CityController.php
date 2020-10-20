<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CityRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\ModelFilters\AdminFilters\CityFilter;
use App\Models\City;

class CityController extends Controller
{
    protected $city;

    public function __construct(City $city)
    {
        $this->city = $city;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = $this->city
                        ->filter($request->all(), CityFilter::class)
                        ->sortable()
                        ->orderBy('id', 'desc')
                        ->with('state');

        if ($request->json) {
            return response()->json($cities->get());
        }

        $cities = $cities->paginate();  

        return view('admin.pages.city.index', [
            'cities' => $cities
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

        return view('admin.pages.city.create', compact('saveFormContinueAdd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $data = $request->only($this->city->fillable);

        $this->city->create($data);

        $request->session()->flash('success', 'Salvo com sucesso.');

        if (!empty($request->input('save-and-create'))) {
            return redirect()->back();
        }
        
        return redirect()->route('admin.city.index');
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
        $city = $this->city->findOrFail($id);

        return view('admin.pages.city.edit', [
            'city' => $city,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {
        $data = $request->only($this->city->fillable);

        $city = $this->city->findOrFail($id);

        $city->fill($data)->save();

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.city.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = $this->city->findOrFail($id);
        $city->delete();

        Session::flash('success', 'Registro deletado com sucesso.');

        return redirect()->route('admin.city.index');
    }
}