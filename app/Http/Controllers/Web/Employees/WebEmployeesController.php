<?php

namespace App\Http\Controllers\Web\Employees;

use App\Http\Controllers\Types\RoyalWebController;
use App\Models\System\Actions\AdminAction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class WebEmployeesController extends RoyalWebController
{
    
    protected string $viewPath = "Admin.Employees.";

    public function index(request $request){

        $employees = User::where('is_super','<>',1)->paginate();

        return $this->render('all',['model'=>$employees]);
    }


    public function edit(request $request){
        
        $model = User::find($request->get("id"));
        if($request->isMethod("GET")) return $this->render("create",["model"=>$model]);

        if(!$this->user()->can_do("roles")) return $this->EM("انت غير مرخص لعمل هذا التغيير");
        if($model==null ) {
            $model = new User();
            $password = $request->get('password');

            if($password==null)return $this->EM("كلمة السر مطلوبة");

            $model->password = Hash::make($password);
        }


        DB::beginTransaction();
        
        if(!$this->setValueIfNotNull($model,'name',$request))return $this->EM("الاسم مطلوب");
        if(!$this->setValueIfNotNull($model,'email',$request)) return $this->EM("البريد الالكتروني مطلوب");
        $this->setValueIfNotNull($model,'phone',$request);
        

        $roles = $request->get('roles');
        $model->roles = json_encode($roles);
        if(is_string($model->saver())) return $this->EM("locked");

        $model->refresh();
        if(is_string(AdminAction::registerAction($this->user(),$model,"تم التعديل على الادمن ".$model->name))){
            DB::rollBack();
            return $this->EM("Locked");
        }

        DB::commit();
        return $this->SM("تمت العملية بنجاح");

    }


    public function delete(request $request){

    }
}
