<?php

namespace App\Http\Controllers\Api\Auth\Customers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Types\ApiFunctionsController;
use App\Http\Controllers\Validator\Customer\CustomerValidatorController as CustomerValidator;
use App\Models\System\Customer\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends ApiFunctionsController
{
    protected $googleSign="RoyalBoard_google_Customer_";
    
    function register(request $request){


        $i=$request->all();
       $v=CustomerValidator::registerValidator($i,Customer::class);
       if($v)return $this->eToast($v);
       try{
           $model=new Customer();
           $model->name=$i['name'];
           $model->phone=$i['phone'];
           $model->google_id = $request->get('google_id');
           $model->password=Hash::make($i['password']);
           if($model->save())return $this->loginProccess($request);
       }catch(Exception $e){
        return $this->eToast(''.$e->getMessage());
       }
    }



    function loginByGoogle(request $request){
        $i=$request->all();
        $v=$this->standardValidation($i,['email','password','name','image_url'],'eToast');
        if($v)return $this->eToast(parent::$requestError);
        
        $email=$i['email'];
        $customer=Customer::where('email',$email)->first();
        if($customer!=null){
            if($customer->id==$this->googleSign.$request->get('password')){
                return $this->SR("auth",$customer->fullResponse(), "تم تسجيل الدخول بنجاح");
            }
        }
        try{
            $model=new Customer();
            $model->id=$this->googleSign.$i['password'];
            $model->name=$i['name'];
            $model->email=$i['email'];
            $model->image_url=$request->get('image_url');
            $model->password=Hash::make($i['password']);
            if($model->save())return $this->loginProccess($request);
        }catch(Exception $e){
         return $this->eToast(parent::$RoyalCatchEror);
        }
    }


    

    function login(request $request){
        $v=$this->standardValidation($request->all(),['phone','password'],'eToast');
        if($v)return $v;
        return $this->loginProccess($request);
    }


    public function forget(request $request){
        $phone = $request->get('phone');
        $password = $request->get('password');
        $customer = Customer::where('phone',$phone)->first();
        if($customer==null)return $this->eToast("لا يوجد حساب بهذا رقم الهاتف");
        $customer->password = Hash::make($password);
        $saver = $customer->saver();
        if($saver)return $this->eToast($saver);
        return $this->loginProccess($request);
    }

    function loginProccess(request $request){
       try{
        $auth=auth($this->RoyalApiGuard);
        $token=$auth->attempt($request->only('phone','password'));
        if($token==null)return $this->eToast("البريد الالكتروني او كلمة السر غير صحيحات");
        $customer = $auth->user() ;
        $customer->api_token=$token;
        if($customer->save())return $this->SR("auth",$customer->fullResponse(),"تم تسجيل الدخول بنجاح");
       }catch(Exception $e){
           return $this->eToast(parent::$RoyalCatchEror);
       }
    }
}
