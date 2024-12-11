<?php

namespace App\Http\Controllers\Web\Profile;

use App\Http\Controllers\Types\RoyalWebController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileWebController extends RoyalWebController
{
    protected string $viewPath = "Admin.Profile.";
    public function edit(request $request){

        $model = $this->user();
        if($request->isMethod("GET")) return $this->render("create",["model"=> $model ]);

        $vs = [
            $this->setValueIfNotNull($model,"name",$request),
            $this->setValueIfNotNull($model,"email",$request),
        ];

        if ( in_array(false,$vs)) return $this->EM("الاسم والبريد الالكتروني مطلوبات");

        $this->setValueIfNotNull($model,"phone",$request);

        $password = $request->get('password');
        if($password!=null){
            $oldPassword = $request->get("old_password");

            if($oldPassword==null)return $this->EM("يجب توفير كلمة السر القديمة");

         
            if(!Hash::check($oldPassword,$model->password)) return $this->EM("كلمة السر القديمة غير صحيحة");
            $model->password = Hash::make($password);
        }

        $saver = $model->saver();

        if(is_string($saver)) return $this->EM("يرجى التاكد من بريدك الالكتروني");
        return $this->SM('تمت العملية بنجاح');
    }
}
