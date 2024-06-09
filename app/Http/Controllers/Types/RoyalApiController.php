<?php

namespace App\Http\Controllers\Types;

use App\Models\System\Customer\Customer;
use Illuminate\Http\Request;

class RoyalApiController extends ApiFunctionsController
{
    protected $token;
    protected $customer;

    function __construct(request $request)
    {
        $token=$request->bearerToken();
        $customer=Customer::where('api_token',$token)->first();
        if($customer!=null){
            $this->token=$token;
            $this->customer=$customer;
        }
    }

    function responseRequestError(){
        return $this->eToast(parent::$requestError);
    }

    function responseCatchError(){
        return $this->eToast(parent::$RoyalCatchEror);
    }
}
