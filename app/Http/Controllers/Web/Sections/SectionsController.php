<?php

namespace App\Http\Controllers\Web\Sections;

use App\Http\Controllers\Files\Image\ImageController;
use App\Http\Controllers\Types\RoyalWebController;
use App\Models\System\Category\Category;
use Exception;
use Illuminate\Http\Request;

class SectionsController extends RoyalWebController
{
    protected $view="Admin.Sections.";
    protected $inputsCheck=['name','t'];

    public function index($id){
        return view($this->view."all",compact('id'));
    }

    function create(request $request,$id){

        if($request->isMethod('get'))return view($this->view."create",compact("id"));
        $i=$request->all();
        $v=$this->standardValidation($i,$this->inputsCheck);
        if($v)return $v;
        return $this->saveModel($request,$id);
    }

    function edit(request $request,$id){
        $model=Category::find($id);
        if($model==null)return parent::EM(parent::$requestError);
        if($request->isMethod('get'))return view($this->view."create",compact("model"));
        $i=$request->all();
        $v=$this->standardValidation($i,$this->inputsCheck);
        if($v)return $v;
        return $this->saveModel($request,$model->father_model,$model);
    }


    function saveModel(request $request,$fatherId,$model=null){
        $i=$request->all();

        $isCreating = $model == null;

        if ($isCreating)
            $model = new Category();
        try{

            $model->father_model = $fatherId;
           
            $model->name=$i['name'];
            $model->t=$i['t'];
            if($model->save()){

                if($isCreating){
                    $model->father_model=$fatherId;
                    $img=ImageController::createWebImage($request,$model);
                }else{
                    $img=ImageController::createWebImage($request,$model,false);
                }
                
                if($img)return $img;

                return redirect()->route('sections',[
                    'id'=>$fatherId
                ])->with(
                    [
                        "success"=>"تمت العملية بنجاح"
                    ]
                );
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
      return parent::EM(parent::$RoyalCatchEror);
    }
    

    function delete($id){
        $model=Category::find($id);
        if($model!=null){
       try{
        if($model->fullRemoving()==true)return parent::SM("تم الحذف بنجاح");
       }catch(Exception $e){
        return parent::EM($e);
    }}

    return parent::EM(parent::$requestError);

    }
}
