<?php

namespace App\Http\Controllers\Web\Category;

use App\Http\Controllers\Files\Image\ImageController;
use App\Http\Controllers\Types\RoyalWebController;
use App\Models\System\Category\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends RoyalWebController
{
    protected $view="Admin.Categories.";
    protected $inputsCheck=['name','t'];
    public function index(){
        return view($this->view."all");
    }

    function create(request $request){
        if($request->isMethod('get'))return view($this->view."create");
        $i=$request->all();
        $v=$this->standardValidation($i,$this->inputsCheck);if($v)return $v;
        return $this->saveModel($request);
    }

    function edit(request $request,$id){
        $model=Category::find($id);
        if($model==null)return parent::EM(parent::$requestError);
        if($request->isMethod('get'))return view($this->view."create",compact('model'));
        $i=$request->all();
        $v=$this->standardValidation($i,$this->inputsCheck);if($v)return $v;
        return $this->saveModel($request,$model);
    }
    function delete(request $request,$id){
        $model=Category::find($id);
        if($model!=null) if($model->fullRemoving())return parent::SM("تم الحذف بنجاح" );
       return parent::EM(parent::$requestError);
    }

    function saveModel(Request $request,$model=null){
        $i=$request->all();
        $isCreating = $model == null;
        if($isCreating)$model= new Category();
        try{
            $model->name=$i['name'];
            $model->t=$i['t'];
            $model->description=$request->get('description');
            if ($model->save()) {

                if($isCreating){
                $image=ImageController::createWebImage($request,$model);
                }else{
                    $image=ImageController::createWebImage($request,$model,false);
                }

                if($image)return $image;
                return parent::SM('تمت العملية بنجاح','categories');
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
        return parent::EM(parent::$RoyalCatchEror);
    }
}
