<?php

namespace App\ModelFilters\AdminFilters;

use EloquentFilter\ModelFilter;

class PostFilter extends ModelFilter
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
            return $q->where('title', 'LIKE', "%$search%")
                ->orWhere('active', $search)
                ->orWhere('id', $search);
        });
    }
}