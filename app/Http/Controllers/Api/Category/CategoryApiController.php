<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Types\ApiFunctionsController;
use App\Models\System\Category\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryApiController extends ApiFunctionsController
{
    
    function index(Request $request){
        $model = Category::with(['images','childs']);
        $err =  $this->handleFilterRequest($request,$model);
        if($err)return $this->eToast($err);
       $data = $model
       ->paginate(2);
       return $this->SR(
        "categories",
        $data,

    );
    }


    function forShowing()
    {
        return $this->SR(
            "categories",
            Category::whereHas('subcategories', function ($s) {
                $s->whereHas('sections');
            })->
             with(['images','subcategories'])
            ->orderBy('t','DESC')
            ->paginate($this->ApiPagination)
        );
    }
}
