<?php 

namespace App\ModelFilters\AdminFilters;

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
        return $this->where(function($q) use ($search)
        {
            return $q->where('name', 'LIKE', "%$search%")
                ->orWhere('id', $search);
        });
    }

    public function broker($broker) 
    {
        return $this->where('properties.broker_id', $broker);
    }
    
    public function offer_type($offer_type) 
    {
        return $this->where('properties.offer_type_id', $offer_type);
    }

    public function advertiser($advertiser) 
    {
        return $this->where('properties.advertiser_id', $advertiser);
    }
    
}