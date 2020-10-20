<?php

namespace App\View\Components;

use App\Models\Property as ModelsProperty;
use App\Services\Setting;
use Illuminate\View\Component;

class Property extends Component
{
    var $property;
    var $setting;
    var $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ModelsProperty $property, Setting $setting, $type = '')
    {
        $this->property = $property;
        $this->setting = $setting;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $properties = [];
        switch ($this->type) {
            case 'latest':
                $properties = $this->latest();
                break;
            default:
                $properties = $this->getProperties();
                break;
        }

        return view('components.properties', [
            'properties' => $properties
        ]);
    }

    protected function latest()
    {
        $properties = $this->property
            ->query()
            ->with('photos')
            ->with('city.state')
            ->limit($this->setting->getSetting('limit_property_home_fatured'))
            ->fatured()
            ->orderBy('properties.id', 'desc')
            ->get();

        return $properties;
    }

    protected function getProperties()
    {
        $properties = $this->property
            ->query()
            ->with('photos')
            ->with('city.state')
            ->limit($this->setting->getSetting('limit_property_home_fatured'))
            ->fatured()
            ->orderBy('properties.id', 'desc')
            ->get();

        return $properties;
    }
}