<?php

use Illuminate\Http\Client\Request;
use PhpParser\Builder\Property;

class PropertyService
{
    protected $property;

    public function __construct(Property $property)
    {
        $this->property = $property;
    }

    public function getFatureds()
    {
        $properties = $this->property
            ->query()
            ->find('fatured')
            ->with('photos');

    }

    public function setVisit()
    {
        $total = $this->property->query()->where('id', Request::ip());
        pr($total);
    }

}