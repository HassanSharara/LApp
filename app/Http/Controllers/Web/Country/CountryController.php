<?php

namespace App\Http\Controllers\Web\Country;

use App\Http\Controllers\Types\RoyalWebController;
use App\Models\System\Country\Country;
use Illuminate\Http\Request;

class CountryController extends RoyalWebController
{
    protected $view="Admin.Countries.";


   function index(){
       return view($this->view."all");
   }

   function create(request $request){
       if($request->isMethod('get'))return view($this->view."create");
       $i=$request->all();
       $v=$this->standardValidation($i,['name']);
       if($v)return $v;
       try{
           $model=new Country();
           $model->name=$i['name'];
           if($model->save())return parent::SM('تم انشاء دولة بنجاح','Countries');
       }catch(e $e){
           return parent::EM($e);
       }
   }


}
