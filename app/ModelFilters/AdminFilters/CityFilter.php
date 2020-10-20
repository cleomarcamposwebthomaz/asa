<?php 

namespace App\ModelFilters\AdminFilters;

use EloquentFilter\ModelFilter;

class CityFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function q($search) 
    {
        return $this->where(function($q) use ($search)
        {
            return $q->where('name', 'LIKE', "%$search%")
                ->orWhere('id', $search)
                ->orWhere('state_id', $search);
        });
    }

    public function state($state_id) 
    {
        return $this->where('state_id', $state_id);
    }
}