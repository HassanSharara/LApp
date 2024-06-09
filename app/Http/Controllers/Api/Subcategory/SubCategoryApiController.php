<?php

namespace App\Http\Controllers\Api\Subcategory;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Types\ApiFunctionsController;
use App\Models\System\Category\Category;
use App\Models\System\SubCategory\SubCategory;
use Illuminate\Http\Request;

class SubCategoryApiController extends ApiFunctionsController
{
    function index(request $request,$id){
        if($id=="justOne")$id=Category::first()->id;
        $data=SubCategory::where('father_model',$id)->with('images')->arrangeByTandPaginate($this->ApiPagination);
        return $this->SR("subCategories",$data);
    }
}
