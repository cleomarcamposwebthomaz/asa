<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\ModelFilters\AdminFilters\PropertyFilter;
use App\Models\Property;
use App\Models\Broker;
use App\Models\OfferType;
use App\Models\Feature;
use App\Models\PropertyType;
use App\Models\State;
use App\Models\Category;
use App\Models\City;
use App\Models\Enterprise;

class PropertyController extends Controller
{
    protected $property;
    protected $broker;
    protected $offerType;
    protected $feature;
    protected $propertyType;
    protected $state;
    protected $category;
    protected $city;

    public function __construct(
        Property $property,
        Broker $broker,
        OfferType $offerType,
        Feature $feature,
        PropertyType $propertyType,
        State $state,
        City $city,
        Category $category
    ) {
        $this->property = $property;
        $this->broker = $broker;
        $this->offerType = $offerType;
        $this->feature = $feature;
        $this->propertyType = $propertyType;
        $this->state = $state;
        $this->category = $category;
        $this->city = $city;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $properties = $this->property
            ->filter($request->all(), PropertyFilter::class)
            ->sortable()
            ->orderBy('id', 'desc')
            ->paginate();

        return view('admin.pages.property.index', [
            'properties' => $properties
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $saveFormButton = false;
        $formButtons[] = [
            'title' => 'Continuar',
            'name' => 'saveAndContinue',
            'icon' => 'arrow-right',
            'color' => 'info',
            'value' => 1
        ];

        $categories = $this->category->pluck('name', 'id');
        $offerTypes = $this->offerType->pluck('name', 'id');
        $brokers = $this->broker->pluck('name', 'id');
        $features = $this->feature->pluck('name', 'id');
        $propertyTypes = $this->propertyType->pluck('name', 'id');
        $enterprises = Enterprise::query()->pluck('name', 'id');

        $states = $this->state->pluck('uf', 'id');
        $cities = [];

        if (old('state_id')) {
            $cities = $this->city->where('state_id', old('state_id'))->pluck('name', 'id');
        }

        return view('admin.pages.property.create', [
            'saveFormButton' => $saveFormButton,
            'formButtons' => $formButtons,
            'brokers' => $brokers,
            'offerTypes' => $offerTypes,
            'features' => $features,
            'propertyTypes' => $propertyTypes,
            'states' => $states,
            'cities' => $cities,
            'categories' => $categories,
            'enterprises' => $enterprises,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        $data = $request->only($this->property->fillable);
        $data['active'] = !empty($data['active']) ? true : false;
        $data['fatured'] = !empty($data['fatured']) ? true : false;

        $property = $this->property->create($data);
        $property->features()->sync($request->input('features'));
        $property->categories()->sync($request->input('categories'));
        $property->offerTypes()->sync($request->input('offerTypes'));

        $request->session()->flash('success', 'Salvo com sucesso.');

        if (!empty($request->input('saveAndContinue'))) {
            return redirect()->route('admin.property.edit', [
                'property' => $property->id,
                'tab' => 'tab-photo'
            ]);
        }

        return redirect()->route('admin.property.index');
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

    public function copy($id, Request $request)
    {
        $property = $this->property->findOrFail($id);
        $property->load('features');
        $property->load('offerTypes');
        $property->load('categories');

        $new_property = $property->replicate();
        $new_property->save();

        $new_property->features()->sync($property->features()->pluck('features.id'));
        $new_property->categories()->sync($property->offerTypes()->pluck('offer_types.id'));
        $new_property->offerTypes()->sync($property->categories()->pluck('categories.id'));

        $request->session()->flash('success', 'Imóvel duplicado com sucesso.');

        return redirect()->route('admin.property.edit', $new_property->id);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = $this->property->findOrFail($id);
        $property->load('features');
        $property->load('offerTypes');
        $property->load('categories');
        $property->load(['photos' => function ($q) {
            return $q->orderBy('property_photos.sort', 'asc');
        }]);

        $enterprises = Enterprise::query()->pluck('name', 'id');
        $categories = $this->category->pluck('name', 'id');
        $offerTypes = $this->offerType->pluck('name', 'id');
        $brokers = $this->broker->pluck('name', 'id');
        $features = $this->feature->pluck('name', 'id');
        $propertyTypes = $this->propertyType->pluck('name', 'id');
        $states = $this->state->pluck('uf', 'id');
        $cities = $this->city->where('state_id', $property->state_id)->pluck('name', 'id');

        return view('admin.pages.property.edit', [
            'property' => $property,
            'brokers' => $brokers,
            'offerTypes' => $offerTypes,
            'features' => $features,
            'propertyTypes' => $propertyTypes,
            'states' => $states,
            'cities' => $cities,
            'categories' => $categories,
            'enterprises' => $enterprises,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyRequest $request, $id)
    {
        $data = $request->only($this->property->fillable);
        $data['active'] = !empty($data['active']) ? true : false;
        $data['fatured'] = !empty($data['fatured']) ? true : false;

        $property = $this->property->findOrFail($id);

        $property->fill($data)->save();
        $property->features()->sync($request->input('features'));
        $property->categories()->sync($request->input('categories'));
        $property->offerTypes()->sync($request->input('offerTypes'));

        $request->session()->flash('success', 'Salvo com sucesso.');

        return redirect()->route('admin.property.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = $this->property->findOrFail($id);
        $property->delete();

        Session::flash('success', 'Registro deletado com sucesso.');

        return redirect()->route('admin.property.index');
    }
}