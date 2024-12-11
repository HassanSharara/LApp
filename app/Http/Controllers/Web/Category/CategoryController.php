<?php

namespace App\Http\Controllers\Web\Category;

use App\Http\Controllers\Files\Image\ImageController;
use App\Http\Controllers\Types\RoyalWebController;
use App\Models\System\Actions\AdminAction;
use App\Models\System\Category\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends RoyalWebController
{
    protected $view =  "Admin.Categories.";
    protected $inputsCheck=['name','t'];
    protected string $viewPath = "Admin.Categories.";
    public function index(){
        $model = Category::whereNull('father_id')->paginate();
        return view($this->view."all",['model'=>$model]);
    }


    function create(request $request){
        $id = $request->get('id');
        $data = [];
        if($id != null) $data['id']=$id;
        if($request->isMethod('get'))return $this->render('create',$data);
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
        DB::beginTransaction();
        try {
            if($model!=null) if($model->fullRemoving()){
                AdminAction::registerAction($this->user(),$model,"قام بحذف القسم ".$model->name);
                DB::commit();
                return parent::SM("تم الحذف بنجاح" );
            }
        }
        catch(Exception $e){}
        DB::rollBack();
       return parent::EM(parent::$requestError);
    }

    function saveModel(Request $request,$model=null){
        $i=$request->all();
        $isCreating = $model == null;
        $swithToFatherId = null;
        DB::beginTransaction();
        if($isCreating){
            $model= new Category();
            $fatherId = $request->get('father_id');
            if($fatherId!=null){
                $fatherModel = Category::find($fatherId);
                if($fatherModel==null) return $this->EM("please try again later");
                $model->father_id = $fatherModel->id;
                $swithToFatherId = $fatherId;
            }
        }
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
                AdminAction::registerAction($this->user(),$model,'قام بتحديث بيانات الاقسام ');
                DB::commit();
              
                if($swithToFatherId!=null){
                    $data = [];
                    $data['id'] = $swithToFatherId;
                    return parent::SM("تمت العملية  بنجاح","subcategories",$data);
                }
                return parent::SM('تمت العملية بنجاح','categories');
            }
        }catch(Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        DB::rollBack();
        return parent::EM(parent::$RoyalCatchEror);
    }

    public function children(request $request,$id){
        $category = Category::find($id);
        if($category==null)return $this->EM("هذا الطلب غير صحيح");
        $model = $category->childs()->paginate();
        return $this-> render("all",['model'=>$model,'id'=>$id]);
    }
}
