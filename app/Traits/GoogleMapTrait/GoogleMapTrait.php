<?php 

namespace App\Traits\GoogleMapTrait;

use Illuminate\Support\Facades\Redirect;

Trait GoogleMapTrait {

    public function redirectToGoogleMaps($latitude, $longitude)
{
    $url = "https://www.google.com/maps/search/?api=1&query={$latitude},{$longitude}";
    return Redirect::away($url);
}
}