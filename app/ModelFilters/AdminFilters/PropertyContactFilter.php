<?php

namespace App\ModelFilters\AdminFilters;

use EloquentFilter\ModelFilter;

class PropertyContactFilter extends ModelFilter
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
        return $this->where(function ($q) use ($search) {
            return $q->where('name', 'LIKE', "%$search%")
                ->orWhere('id', $search)
                ->orWhere('property_id', $search)
                ->orWhere('broker_id', $search)
                ->orWhere('phone', $search)
                ->orWhere('is_read', $search)
                ->orWhere('email', $search);
        });
    }
}