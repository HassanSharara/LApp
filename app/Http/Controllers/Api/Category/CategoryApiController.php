<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Types\ApiFunctionsController;
use App\Models\System\Category\Category;
use Illuminate\Http\Request;

class CategoryApiController extends ApiFunctionsController
{
    
    function index(Request $request){
        $model = Category::with(['images','childs']);
        $err =  $this->handleFilterRequest($request,$model);
        if($err)return $this->eToast($err);
       $data = $model->paginate($this->ApiPagination);
       return $this->SR(
        "categories",
        $data,
    );
    }

}
