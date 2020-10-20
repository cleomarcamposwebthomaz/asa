<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FeatureRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\ModelFilters\AdminFilters\FeatureFilter;
use App\Models\Feature;

class FeatureController extends Controller
{
    protected $feature;

    public function __construct(Feature $feature)
    {
        $this->feature = $feature;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $features = $this->feature
                        ->filter($request->all(), FeatureFilter::class)
                        ->sortable()
                        ->withCount('options')
                        ->orderBy('id', 'desc')
                        ->paginate();

        return view('admin.pages.feature.index', [
            'features' => $features
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formButtons[] = [
            'title' => 'Salvar e adicionar mais items', 
            'name' => 'saveAndContinue', 
            'icon' => 'plus',
            'value' => 1
        ];

        return view('admin.pages.feature.create', compact('formButtons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(featureRequest $request)
    {
        $data = $request->only($this->feature->fillable);

        $feature = $this->feature->create($data);

        $request->session()->flash('success', 'Salvo com sucesso.');

        if (!empty($request->input('saveAndContinue'))) {
            return redirect()->back();
        }
        
        return redirect()->route('admin.feature.index');
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
        $feature = $this->feature->findOrFail($id);

        return view('admin.pages.feature.edit', [
            'feature' => $feature,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeatureRequest $request, $id)
    {
        $data = $request->only($this->feature->fillable);

        $feature = $this->feature->findOrFail($id);

        $feature->fill($data)->save();

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.feature.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feature = $this->feature->findOrFail($id);
        $feature->delete();
        $feature = $this->feature
                            ->options()
                            ->where('feature_id', $feature->id)
                            ->delete();
                            
        Session::flash('success', 'Registro deletado com sucesso.');

        return redirect()->route('admin.feature.index');
    }
}