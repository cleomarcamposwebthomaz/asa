<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FeatureOptionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\ModelFilters\AdminFilters\FeatureOptionFilter;
use App\Models\FeatureOption;
use App\Models\Feature;

class FeatureOptionController extends Controller
{
    protected $featureOption;
    protected $feature;

    public function __construct(FeatureOption $featureOption, Feature $feature)
    {
        $this->feature = $feature;
        $this->featureOption = $featureOption;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $feature_id)
    {
        $feature = $this->feature->findOrFail($feature_id);

        $featureOptions = $this->featureOption
                                    ->filter(
                                        $request->all(), 
                                        FeatureOptionFilter::class
                                    )
                                    ->where('feature_id', $feature_id)
                                    ->sortable()
                                    ->orderBy('id', 'desc')
                                    ->paginate();

        return view('admin.pages.feature.option.index', [
            'featureOptions' => $featureOptions,
            'feature_id' => $feature_id,
            'feature' => $feature
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($feature_id)
    {
        $formButtons[] = [
            'title' => 'Salvar e cadastrar mais itens', 
            'name' => 'saveAndContinueAdd', 
            'icon' => 'plus',
            'value' => 1
        ];

        $feature = $this->feature->findOrFail($feature_id);

        return view('admin.pages.feature.option.create', [
            'feature' => $feature,
            'formButtons' => $formButtons
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeatureOptionRequest $request, $feature_id)
    {
        $data = $request->only($this->featureOption->fillable);
        $data['feature_id'] = $feature_id;

        $featureOption = $this->featureOption->create($data);

        $request->session()->flash('success', 'Salvo com sucesso.');

        if (!empty($request->input('saveAndContinueAdd'))) {
            return redirect()->route('admin.feature.option.create', [
                'feature' => $feature_id,
            ]);
        }
        
        return redirect()->route('admin.feature.option.index', [
            'feature' => $feature_id
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
    public function edit($feature_id, $id)
    {
        $feature = $this->feature->findOrFail($feature_id);
        $featureOption = $this->featureOption->findOrFail($id);

        return view('admin.pages.feature.option.edit', [
            'featureOption' => $featureOption,
            'feature' => $feature
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeatureOptionRequest $request, $feature_id, $id)
    {
        $data = $request->only($this->featureOption->fillable);

        $featureOption = $this->featureOption->findOrFail($id);

        $featureOption->fill($data)->save();

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.feature.option.index', [
            'feature' => $feature_id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $featureOption = $this->featureOption->findOrFail($id);
        $featureOption->delete();

        Session::flash('success', 'Registro deletado com sucesso.');

        return redirect()->route('admin.featureOption.index');
    }
}