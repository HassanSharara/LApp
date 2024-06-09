<?php

namespace App\Http\Controllers\Appmonitor;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Types\ApiFunctionsController;
use App\Models\Appdebugmonitor\AppDebugMonitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppMonitorController extends ApiFunctionsController
{
   function  create(request $request){

    $i=$request->all();
    $v=$this->standardValidation($i,['msg','description','deviceInfo'],'eToast');
    if($v==null){
        $model=new AppDebugMonitor();
        $model->msg=$i['msg'];
        $model->description=$i['description'];
        $model->device_info=$i['deviceInfo'];
        if($model->save()) return $this->SR();
    }
 
    return $this->ER();
    
   }
}
