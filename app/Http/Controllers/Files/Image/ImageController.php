<?php

namespace App\Http\Controllers\Files\Image;

use App\Http\Controllers\Controller;
use App\Models\Files\Image\Image;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    
  static public $uploadPath="uploads/files/images";

   static function createWebImage(Request $request,Model $model,$forceValidation=true):?string{
    
    /// Validate The Images Input
    $v=ImageController::imageValidation($request,$forceValidation);
    if($v){if($forceValidation==true){return $v;}return null;}

    /// Remove Old Images if Exist
    $removeOldImages=ImageController::RemoveOldImages($model);
    if($removeOldImages)return $removeOldImages;

    /// start Creating New Image Model and File
    $image = $request->file('royal_image');
    $name = "image_".$model->getTable()."_".md5(rand().microtime().uniqid().mt_rand().uniqid()).'.'.$image->getClientOriginalExtension();
    $destinationPath = public_path('/'.Imagecontroller::$uploadPath);  
    try{
        if($image->move($destinationPath,$name)){
            $im=new Image();
            $im->type=$model->getTable();
            $im->father_model=$model->id;
            $im->path=$name;
            if(!$im->save())return parent::EM("حصل خطأ في حفظ الصورة");
        }
     }catch(Exception $e){
        return parent::EM($e->getMessage());
    }
    return null;
}

   static function imageValidation(request $request,$required=true){
    $v=Validator::make($request->all(),['royal_image'=>'required|image|mimes:jpg,jpeg,png,svg|max:1250']);
    if($v->fails()){

       if($required==true) return parent::EM('الصورة مطلوبة ويجب ان تكون الصورة غير اكبر من 1250  وبامتداد (jpg,jpeg,png,svg)');
       return "backed";
    }
}




  /// remove Old Images

  static function RemoveOldImages(Model $model){
      $images=Image::where('father_model',$model->id)->where('type',$model->getTable())->get();
      foreach($images as $image){
          if(!$image->secretRemoving())return parent::EM(parent::$RoyalCatchEror);
      }
  }

}
