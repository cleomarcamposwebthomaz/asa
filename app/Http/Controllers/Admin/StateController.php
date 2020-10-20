<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\ModelFilters\AdminFilters\StateFilter;
use App\Models\State;

class StateController extends Controller
{
    protected $state;

    public function __construct(state $state)
    {
        $this->state = $state;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $states = $this->state
                        ->filter($request->all(), StateFilter::class)
                        ->sortable()
                        ->orderBy('id', 'desc');

        if ($request->json) {
            return response()->json($states->get());
        }

        $states = $states->paginate();

        return view('admin.pages.state.index', [
            'states' => $states
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

        return view('admin.pages.state.create', compact('saveFormContinueAdd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateRequest $request)
    {
        $data = $request->only($this->state->fillable);

        $this->state->create($data);

        $request->session()->flash('success', 'Salvo com sucesso.');

        if (!empty($request->input('save-and-create'))) {
            return redirect()->back();
        }
        
        return redirect()->route('admin.state.index');
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
        $state = $this->state->findOrFail($id);

        return view('admin.pages.state.edit', [
            'state' => $state,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StateRequest $request, $id)
    {
        $data = $request->only($this->state->fillable);

        $state = $this->state->findOrFail($id);

        $state->fill($data)->save();

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.state.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = $this->state->findOrFail($id);
        $state->delete();

        Session::flash('success', 'Registro deletado com sucesso.');

        return redirect()->route('admin.state.index');
    }
}