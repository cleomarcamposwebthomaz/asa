<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Feature;
use App\Models\OfferType;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Setting;

class PropertySearch extends Component
{
    protected $setting;
    protected $property;
    protected $offerType;
    protected $feature;
    protected $propertyType;

    var $offer_types = [];

    /**
     * Class constructor.
     */
    public function mount(
        Setting $setting,
        Property $property,
        OfferType $offerType,
        Feature $feature,
        PropertyType $propertyType
    ) {
        $this->setting = $setting;
        $this->property = $property;
        $this->offerType = $offerType;
        $this->feature = $feature;
        $this->propertyType = $propertyType;
    }

    public function render()
    {
        $properties = Property::query()->active();
        $offerTypes = OfferType::query()->active()->pluck('name', 'id');
        $propertyTypes = PropertyType::query()->active()->pluck('name', 'id');
        $features = Feature::query()->active()->pluck('name', 'id');


        if (count($this->offer_types) > 0) {
            $properties->whereHas('offerTypes', function ($query) {
                return $query->whereIn('offer_types.id',  $this->offer_types);
            });
        }

        $properties = $properties->get();

        return view('livewire.property-search', [
            'properties' => $properties,
            'propertyTypes' => $propertyTypes,
            'offerTypes' => $offerTypes,
            'features' => $features,
        ]);
    }
}