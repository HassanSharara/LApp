<?php

namespace App\Http\Controllers\Validator\Customer;

use App\Models\RoyalBoardModel\RoyalBoardModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerValidatorController 
{
    
    
   static function registerValidator($i,$model){
       /// Validate if Inputs are good
       $validator=Validator::make($i,[
           'name'=>'required',
           'phone'=>'required|numeric',
           'password'=>'required'
       ],[
          'name.required'=>'اسم المستخدم مطلوب', 
          'phone.required'=>'رقم هاتف المستخدم مطلوب', 
          'email.required'=>'البريد الالكتروني للمستخدم مطلوب', 
          'password.required'=>'كلمة السر مطلوبة', 
          'phone.numeric'=>'يجب ان يكون رقم الهاتف صحيح', 
       ]);
       if($validator->fails())return $validator->getMessageBag()->first();
       if($model==null)return null;
       if($model::where('phone',$i['phone'])->limit(2)->count()>0)return "هذا رقم الهاتف  موجود بالفعل";
   }

 
}
