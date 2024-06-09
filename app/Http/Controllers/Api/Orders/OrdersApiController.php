<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Types\RoyalApiController;
use App\Models\System\Order\Order;
use App\Models\System\SubCategory\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrdersApiController extends RoyalApiController
{
    


    function phonFilter($phone,$countrycode='964'){
      
        if(!str_contains($phone,'+')){
            $phone="+".$phone;
        }
        if(!str_contains($phone,'+'.$countrycode)){
           $phone = str_replace('+','+'.$countrycode,$phone);
        }
        if(str_contains($phone,'+'.$countrycode.'0'))$phone=str_replace('+'.$countrycode.'0','+'.$countrycode,$phone);
        return $phone;
    }



    function createOrder(request $request){
        $i = $request->all();
        $v = Validator::make($i,[
            "phone"=>'required',
            "address"=>'required',
            "subcat_id"=>'required',
        ]);

        if($v->failed())return $this->responseRequestError();

        $subcat = SubCategory::find($i['subcat_id']);

        if($subcat==null)return $this->responseRequestError();
    
        $phone = $this->phonFilter($i['phone']);
        if(strlen($phone)<14)return $this->eToast("يوجد خطأ في رقم الهاتف");
        $address = $request->get('address');
        $order = new Order();
        $order->phone =$phone;
        $order->address=$address;
        $order->s_name = $subcat->name;
        $order->s_price = $subcat->price;

        if(array_key_exists('lat',$i) && array_key_exists('long',$i)){
            $order->lat=$i['lat'];
            $order->long=$i['long'];
        }

        $saver = $order->RoyalModelSaving();
        if($saver)return $this->responseCatchError();
        return $this->sToast("سوف يتم التواصل معك فوراً يرجى الانتظار");
    }

}
