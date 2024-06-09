<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\ShararaControllers\Traits\MainControllerTrait;
use App\Http\Controllers\ShararaControllers\Traits\QueryFilterTrati;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests,MainControllerTrait,QueryFilterTrati;
    
}
