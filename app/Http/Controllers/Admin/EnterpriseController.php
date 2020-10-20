<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EnterpriseRequest;
use App\ModelFilters\AdminFilters\EnterpriseFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\State;
use App\Models\City;
use App\Models\Enterprise;

class EnterpriseController extends Controller
{
    protected $enterprise;

    public function __construct(Enterprise $enterprise)
    {
        $this->enterprise = $enterprise;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $enterprises = $this->enterprise
            ->filter($request->all(), EnterpriseFilter::class)
            ->sortable()
            ->orderBy('id', 'desc')
            ->paginate();

        return view('admin.pages.enterprise.index', [
            'enterprises' => $enterprises
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $states = State::query()->pluck('uf', 'id');
        $cities = City::query()->pluck('name', 'id');

        if ($request->input('state_id')) {
            $cities->where('state_id', $request->input('state_id'));
        }

        return view('admin.pages.enterprise.create', [
            'states' => $states,
            'cities' => $cities,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(enterpriseRequest $request)
    {
        $data = $request->only($this->enterprise->fillable);
        $data['active'] = !empty($data['active']) ? true : false;
        $data['published'] = !empty($data['published']) ? true : false;

        $enterprise = $this->enterprise->create($data);

        return redirect()->route('admin.enterprise.edit', [
            'enterprise' => $enterprise->id,
            'tab' => 'tab-photo'
        ]);

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.enterprise.index');
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
        $enterprise = $this->enterprise->findOrFail($id);
        $enterprise->load(['photos' => function ($q) {
            return $q->orderBy('enterprise_photos.sort', 'asc');
        }]);

        $states = State::query()->pluck('uf', 'id');
        $cities = City::query()->where('state_id', $enterprise->state_id)->pluck('name', 'id');

        return view('admin.pages.enterprise.edit', [
            'enterprise' => $enterprise,
            'states' => $states,
            'cities' => $cities,
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
        $data = $request->only($this->enterprise->fillable);
        $data['active'] = !empty($data['active']) ? true : false;
        $data['published'] = !empty($data['published']) ? true : false;

        $enterprise = $this->enterprise->findOrFail($id);

        $enterprise->fill($data)->save();

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.enterprise.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enterprise = $this->enterprise->findOrFail($id);
        $enterprise->delete();

        Session::flash('success', 'Registro deletado com sucesso.');

        return redirect()->route('admin.enterprise.index');
    }
}
