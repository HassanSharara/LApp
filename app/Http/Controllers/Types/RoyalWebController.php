<?php

namespace App\Http\Controllers\Types;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

abstract class RoyalWebController extends Controller
{
    
    protected string $viewPath;
    
    protected function render($fileName,$data = []){
        return view($this->viewPath.$fileName,$data);
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function user():User{
        return auth()->user();
    }



    protected function setValueIfNotNull($model,$key,$request):bool{
        $value = $request->get($key);
        if($value==null)return false;
        $model->$key = $value;
        return true;
    }
}
