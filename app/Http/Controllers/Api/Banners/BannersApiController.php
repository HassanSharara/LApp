<?php

namespace App\Http\Controllers\Api\Banners;

use App\Http\Controllers\Types\RoyalApiController;
use App\Models\System\Banners\BannersModel;
use Illuminate\Http\Request;

class BannersApiController extends RoyalApiController
{
    //


    public function allBanners(Request $request){
        $banners = BannersModel::whereHas('images')->with('images');
        $this->handleFilterRequest($request,$banners);
        return $this->SR('banners',$banners->paginate($this->ApiPagination));
    }
}
