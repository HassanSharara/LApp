<?php

namespace App\Models\RoyalBoardModel;

use App\Models\Files\Image\Image;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class RoyalBoardModel extends Model
{
  protected $hasImage = false;
  use HasFactory;
  protected $RCH = [];
    function images(){
        if($this->hasImage==false)return [];
        return $this->hasMany(Image::class,'father_model')->where('type',$this->getTable());
    }
      /// Royal Board Changes 
      function fullRemoving($triger=true):bool{
        DB::beginTransaction();
        try {
          $this->removingWorker();
          DB::commit();
          return true;
        }catch(Exception $e){
          DB::rollBack();
        }
        return false;
    }


    private function removingWorker($triger=true){
      if($triger==true&& count($this->RCH)>0){
        foreach($this->RCH as $funcs){
           if(!is_null($this->$funcs())){
            $singleChilds=$this->$funcs;
            foreach($singleChilds as $child){
                $child->removingWorker();
            }
           }
           } 
        }
        return $this->secretRemoving();
    }

    function secretRemoving(){
      try{
        if($this->hasImage==true){
          foreach($this->images as $image){
              $image->secretRemoving();
          }  
        }
       if($this->delete())return true;
      }catch(Exception $e){
          return false;
      }
    }



    public function saver(){return $this->RoyalModelSaving();}
    public function RoyalModelSaving(){
      try{
        $this->save();
        return null;
      }
      catch(QueryException $e){
        return $e->getMessage();
      }
      catch(Exception $e){
        return $e->getMessage();
      }}

    /// Royal Board End Changes
}
