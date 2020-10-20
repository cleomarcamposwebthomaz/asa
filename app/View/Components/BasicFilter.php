<?php

namespace App\View\Components;

use App\Models\City;
use App\Models\OfferType;
use App\Models\PropertyType;
use Illuminate\View\Component;

class BasicFilter extends Component
{
    var $propertyType;
    var $offerType;
    var $city;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        PropertyType $propertyType,
        OfferType $offerType,
        City $city
    ) {
        $this->propertyType = $propertyType;
        $this->offerType = $offerType;
        $this->city = $city;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $propertyTypes = $this->propertyType->query()->pluck('name', 'id');
        $offerTypes = $this->offerType->query()->pluck('name', 'id');

        $cities = $this->city
            ->query()
            ->whereHas('properties', function ($query) {
                $query->active();
            })
            ->pluck('name', 'id');

        return view('components.basic-filter', [
            'propertyTypes' => $propertyTypes,
            'offerTypes' => $offerTypes,
            'cities' => $cities,
        ]);
    }
}