<?php

namespace App\Http\Controllers\Web\Banner;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Files\Image\ImageController;
use App\Http\Controllers\Types\RoyalWebController;
use App\Models\System\Banners\BannersModel;
use Exception;
use Illuminate\Http\Request;

class BannerWebController extends RoyalWebController
{
    //

    protected string $viewPath = "Admin.Banners.";
    protected $inputsCheck = ['title'];

    public function index(request $request){
        $model = BannersModel::orderBy('created_at','desc')->with('images');
        return $this->render("all",['model'=>$model->paginate()]);
    }


    function create(request $request){
        if($request->isMethod('get'))return $this->render('create');
        $i=$request->all();
        $v=$this->standardValidation($i,$this->inputsCheck);if($v)return parent::EM($v);
        return $this->saveModel($request);
    }

    function edit(request $request,$id){
        $model=BannersModel::find($id);
        if($model==null)return parent::EM(parent::$requestError);
        if($request->isMethod('get'))return $this->render('create',compact('model'));
        $i=$request->all();
        $v=$this->standardValidation($i,$this->inputsCheck);if($v)return $v;
        return $this->saveModel($request,$model);
    }
    function delete(request $request,$id){
        $model=BannersModel::find($id);
        if($model!=null) if($model->fullRemoving())return parent::SM("تم الحذف بنجاح" );
       return parent::EM(parent::$requestError);
    }

    function saveModel(Request $request,$model=null){
        $i=$request->all();
        $isCreating = $model == null;
        if($isCreating)$model= new BannersModel();
        try{
            $model->title=$request->get("title");


            
            $t=$request->get("t");
            if($t!=null)$model->t=$t;

            $description=$request->get("description");
            if($t!=null)$model->description=$description;

            

            
            $action_type=$request->get("action_type");
            if($action_type!=null)$model->action_type=$action_type;


            
            $metadata=$request->get("metadata");
            if($metadata!=null)$model->metadata=$metadata;




            if ($model->save()) {

                if($isCreating){
                $image=ImageController::createWebImage($request,$model);
                }else{
                    $image=ImageController::createWebImage($request,$model,false);
                }

                if($image)return $image;
                return parent::SM('تمت العملية بنجاح','banners');
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
        return parent::EM(parent::$RoyalCatchEror);
    }
}
