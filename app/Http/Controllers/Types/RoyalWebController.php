<?php

namespace App\Http\Controllers\Types;

use App\Http\Controllers\Controller;
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
}
