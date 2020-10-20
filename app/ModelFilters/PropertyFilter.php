<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class PropertyFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function search($search)
    {
        return $this->where('properties.name', 'LIKE', "%${search}%");
    }

    public function state($state)
    {
        return $this->where('state_id', $state);
    }

    public function city($city)
    {
        return $this->where('city_id', $city);
    }

    public function price($price)
    {
        if (is_array($price) && !empty($price[0]) && !empty($price[1])) {
            return $this->whereBetween('properties.price', [
                $this->getDecimalValue($price[0]),
                $this->getDecimalValue($price[1])
            ]);
        }
        return $this;
    }

    public function offerTypes($types = [])
    {
        $types = (array) $types;
        return $this->whereHas('offerTypes', function ($query) use ($types) {
            return $query->whereIn('offer_types.id', $types);
        });
    }

    public function categories($categories = [])
    {
        $categories = (array) $categories;
        return $this->whereHas('categories', function ($query) use ($categories) {
            return $query->whereIn('categories.id', $categories);
        });
    }

    public function features($features = [])
    {
        $features = (array) $features;
        return $this->whereHas('features', function ($query) use ($features) {
            return $query->whereIn('features.id', $features);
        });
    }

    protected function getDecimalValue($value)
    {
        $value = str_replace('R', '', $value);
        $value = str_replace('$', '', $value);
        $value = str_replace('R$', '', $value);
        $value = str_replace('.', '', $value);
        $value = str_replace(',', '.', $value);

        return (float) $value;
    }
}