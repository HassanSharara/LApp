<?php

namespace App\Http\Controllers\Web\Orders;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Types\RoyalWebController;
use App\Models\System\Order\Order;
use App\Traits\GoogleMapTrait\GoogleMapTrait;
use Illuminate\Http\Request;

class OrdersWebController extends RoyalWebController
{

    use GoogleMapTrait;
    
    private $view = "Admin.orders.";

    public function index(request $request){
        return view($this->view.'all');
    }

    

    public function showOnMap($lat,$long){
        return $this->redirectToGoogleMaps($lat,$long);
    }




    public function updateStatus(request $request,$id){
        $order = Order::find($id);
        if($order==null)return parent::EM("لا يوجد هكذا طلب");

        $status = $order->status==1?0:1;
        $order->status=$status;
        $saver = $order->RoyalModelSaving();

        if($saver)return parent::EM("يرجى المحاولة لاحقاً");

        return parent::SM("تمت العملية بنجاح");
    }
}
