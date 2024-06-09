<?php

namespace App\Http\Controllers\Types;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class RoyalWebController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
}
