<?php

namespace App\Http\Controllers\Types;
use App\Http\Controllers\Controller;
use Exception;
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


   

    public function _reWriteRequest(request $request) :bool{
        try {
            $key = $request->get('key');
            $data = $request->get('data');
            if($key==null && $data == null)return true;
            $length = strlen($data);
            if($length < 9 ) return false;
            $ecounts = substr($data,0,1);
            if(!is_numeric($ecounts)) return false;
            $first = substr($data,1,4);
            if(!strpos($key,$first)) {
                return false;
            }  
            $data = strrev(substr($data,5,($length-9)));
            switch ($ecounts) {
                case 2:
                    $data = $data."==";
                    break;
                    
                case 1:
                    $data = $data."=";
                    break;
            };
            $d = json_decode(base64_decode($data),true);
            if(is_array($d)) {
                $request->replace($d);
                return true;
            }
        }catch(Exception $e){

        }
        return false;
    }
}
