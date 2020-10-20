<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelFilters\PropertyFilter;
use App\Http\Requests\PropertyContactRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Feature;
use App\Models\OfferType;
use App\Models\Property;
use App\Models\PropertyContact;
use App\Models\PropertyType;
use App\Models\State;
use App\Services\Setting;

class PropertyController extends Controller
{
    protected $setting;
    protected $property;
    protected $offerType;
    protected $feature;
    protected $propertyType;
    protected $category;
    protected $state;
    protected $city;
    protected $propertyContact;

    /**
     * Class constructor.
     */
    public function __construct(
        Setting $setting,
        Property $property,
        OfferType $offerType,
        Feature $feature,
        PropertyType $propertyType,
        Category $category,
        State $state,
        City $city,
        PropertyContact $propertyContact
    ) {
        $this->setting = $setting;
        $this->property = $property;
        $this->offerType = $offerType;
        $this->feature = $feature;
        $this->propertyType = $propertyType;
        $this->category = $category;
        $this->state = $state;
        $this->city = $city;
        $this->propertyContact = $propertyContact;
    }

    public function index(Request $request, $category_id = null)
    {
        $category = '';
        if ($category_id) {
            $category = $this->category->findOrFail($category_id);
        }

        $properties = $this->property
            ->query()
            ->filter($request->all(), PropertyFilter::class)
            ->active();

        $total = $this->property
            ->query()
            ->filter($request->all(), PropertyFilter::class)
            ->active();

        if ($category) {
            $properties->whereHas('categories', function ($query) use ($category) {
                return $query->where('categories.id', $category->id);
            });
            $total->whereHas('categories', function ($query) use ($category) {
                return $query->where('categories.id', $category->id);
            });
        }

        $offerTypes = $this->offerType->query()->active()->pluck('name', 'id');
        $propertyTypes = $this->propertyType->query()->active()->pluck('name', 'id');
        $features = $this->feature->query()->active()->pluck('name', 'id');
        $states = $this->state->query()->pluck('uf', 'id');

        $categories = $this->category->query()->active()->pluck('name', 'id');

        if ($category) {
            $categories->where('categories.parent_id', $category->id);
        }

        $cities = [];
        if ($request->get('state')) {
            $cities = $this->city->query()->where('state_id', $request->get('state'))->pluck('name', 'id');
        }

        if ($request->get('city') && !$request->get('state')) {
            $city = $this->city->findOrFail($request->get('city'));
            $cities = $this->city->query()->where('state_id', $city->state_id)->pluck('name', 'id');
            $request['state'] = $city->state_id;
        }

        $template = $request->ajax() ? 'ajax' : 'index';

        return view('front.pages.property.' . $template, [
            'properties' => $properties->paginate(),
            'propertyTypes' => $propertyTypes,
            'offerTypes' => $offerTypes,
            'features' => $features,
            'categories' => $categories,
            'states' => $states,
            'cities' => $cities,
            'total' => $total->count(),
            'category' => $category,
        ]);
    }

    public function show($id)
    {
        $property = $this->property->findOrFail($id);

        $property->load('city.state');

        $property->load(['categories' => function ($query) {
            return $query->active();
        }]);

        $property->load(['type' => function ($query) {
            return $query->active();
        }]);

        $property->load(['offerTypes' => function ($query) {
            return $query->active();
        }]);

        $property->load(['photos' => function ($query) {
            return $query->active()->orderBy('sort', 'asc');
        }]);

        $property->load(['features' => function ($query) {
            return $query->active();
        }]);

        $property->load(['broker' => function ($query) {
            return $query->active();
        }]);

        return view('front.pages.property.show', [
            'property' => $property
        ]);
    }

    public function store(PropertyContactRequest $request, $property_id)
    {
        $property = $this->property->findOrFail($property_id);

        $data = $request->only($this->propertyContact->fillable);
        $data['property_id'] = $property->id;
        $data['broker_id'] = $property->broker_id;

        $this->propertyContact->create($data);

        $request->session()->flash('success', $this->setting->getSetting('property_contact_text_success'));

        return redirect()->back();
    }
}