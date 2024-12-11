<?php

namespace App\Http\Controllers\Api\Account;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Types\RoyalApiController;
use Illuminate\Http\Request;

class CustomerAccountController extends RoyalApiController
{
    //

    public function refresh(request $request){
        $fcm = $request->get('fcm');

        if($fcm!=null && !empty($fcm) && $fcm != $this->customer->fcm){
            $this->customer->fcm = $fcm;+
            $this->customer->saver();
        }
        
        return $this->refreshedCustomer("no_toast");
    }
}
