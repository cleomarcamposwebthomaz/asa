<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Services\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    var $property;
    var $setting;

    public function __construct(Property $property, Setting $setting)
    {
        $this->property = $property;
        $this->setting = $setting;
    }

    public function index()
    {
        $properties = $this->property
            ->query()
            ->with('photos')
            ->with('city.state')
            ->limit($this->setting->getSetting('limit_property_home_fatured'))
            ->fatured()
            ->orderBy('properties.id', 'desc')
            ->get();

        $pageName = 'home';

        return view('front.pages.home', [
            'properties' => $properties,
            'pageName' => $pageName
        ]);
    }
}