<?php

namespace App\Http\Controllers\Types;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ApiFunctionsController extends Controller
{
    protected $RoyalApiGuard="RoyalApi";
    protected $ApiPagination=30;
    function SR($msg="no_msg",$data="no_data",$toast="no_toast"){
        return array(
            "status"=>"success",
            "msg"=>$msg,
            "data"=>$data,
            "toast"=>$toast,
        );
    }
      

    function sToast($toast="no_toast"){
        $msg="no_msg";
        $data="no_data";
        return array(
            "status"=>"success",
            "msg"=>$msg,
            "data"=>$data,
            "toast"=>$toast,
        );
    }
   
    function eToast($toast="no_toast"){
        $msg="no_msg";
        $data="no_data";
        return array(
            "status"=>"error",
            "msg"=>$msg,
            "data"=>$data,
            "toast"=>$toast,
        );
    }

    function ER($msg="no_msg",$data="no_data",$toast="no_toast"){
        return array(
            "status"=>"error",
            "msg"=>$msg,
            "data"=>$data,
            "toast"=>$toast,
        );
    }

    function notAUth(){
        return $this->ER("not_auth");
    }

    function arrangeByRoyalConcept($data){
        $data->orderby('t','desc');
    }
}
