<?php

namespace App\Http\Controllers\Web\Appwebmonitr;

use App\Http\Controllers\Types\RoyalWebController;
use App\Models\Appdebugmonitor\AppDebugMonitor;
use Illuminate\Http\Request;

class AppWebMonitorController extends RoyalWebController
{
    protected $view="Admin.AppMonitor.";
    
    function index(){
        return view($this->view."all");
    }

    function details(request $request,$id){
        $model=AppDebugMonitor::find($id);
        return view($this->view."details",compact('model'));
    }

    function solve(request $request,$id){
        $model=AppDebugMonitor::find($id);
        if($model){
            $model->status=1;
            if($model->save())return parent::SM("تم حل التقرير بنجاح");
        }
       return parent::EM(parent::$requestError);
    }
}
