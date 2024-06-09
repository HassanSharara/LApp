<?php

namespace App\Http\Controllers\Web\City;

use App\Http\Controllers\Types\RoyalWebController;
use App\Models\System\Country\Country;
use Illuminate\Http\Request;

class CityController extends RoyalWebController
{
    protected $view="Admin.City.";

    function index($id){
        return view($this->view."all",compact('id'));
    }
}
