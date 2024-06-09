<?php

namespace App\Http\Controllers\Web\Subcategory;

use App\Http\Controllers\Files\Image\ImageController;
use App\Http\Controllers\Types\RoyalWebController;
use App\Models\System\Category\Category;
use Exception;
use Illuminate\Http\Request;

class SubcategoryController extends RoyalWebController
{
    protected $view="Admin.Subcategories.";
    protected $inputsCheck=['name','t'];

    public function index($id){
        $model=Category::find($id);
        if($model==null)return parent::EM(parent::$requestError);
        
        return view($this->view."all",compact('id'));
    }

    function create(request $request,$id){
        $model=Category::find($id);
        if($model==null)return parent::EM(parent::$requestError);
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
        return $this->saveModel($request,$model->father_id,$model);
    }


    function saveModel(request $request,$fatherId,$model=null){
        $i=$request->all();

        $isCreating = $model == null;

        if ($isCreating)
            $model = new Category();
        try{

            $model->father_id = $fatherId;
           
            $model->name=$i['name'];
            $model->t=$i['t'];
            $model->description=$request->get('description');
            $model->price=$request->get('price');
            if($model->save()){

                if($isCreating){
                    $model->father_id=$fatherId;
                    $img=ImageController::createWebImage($request,$model);
                }else{
                    $img=ImageController::createWebImage($request,$model,false);
                }
                
                if($img)return $img;

                return redirect()->route('subcategories',[
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
       }catch(Exception $e){return parent::EM($e);}}

    return parent::EM(parent::$requestError);

    }
}
