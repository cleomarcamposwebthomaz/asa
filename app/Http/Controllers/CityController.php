<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    protected $city;

    public function __construct(City $city)
    {
        $this->city = $city;
    }

    public function index($state_id)
    {
        $cities = $this->city->query()->where('state_id', $state_id)->limit(99999);

        return response()->json($cities->get());
    }
}