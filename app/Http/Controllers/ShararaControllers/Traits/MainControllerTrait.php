<?php

namespace App\Http\Controllers\ShararaControllers\Traits;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isEmpty;

 trait MainControllerTrait{
    static protected $requestError="هذا الطلب غير صحيح";
    static protected $youAreNotAuthenticated="انت غير مرخص";
    static protected $validatorError="يجب التأكد من صحة جميع الحقول";
    static protected $RoyalCatchEror="يرجى المحاولة فيما بعد";
    static function standardValidation($i,$variables,$function="EM"){
        $conditions=array();
        foreach($variables as $v){
            if($v=="phone"||$v=="status"||$v=="t")$conditions[$v]="required||numeric";
            else $conditions[$v]="required";
        }
        $v=Validator::make($i,$conditions);
        if($v->fails())return $v->getMessageBag()->first();
    }

    static function EM($message,$route=null){
        if($route!=null)$redirect= redirect()->route($route);
        else $redirect=redirect()->back();
        return $redirect->with([
            "error"=>$message
        ]);
    }
    static function SM($e,$route=null){
        if($route!=null)$redirect= redirect()->route($route);
        else $redirect=redirect()->back();
        return $redirect->with(
            [ "success"=>$e]
        );
    }


}

trait QueryFilterTrati {
    public function handleFilterRequest(Request &$request,&$model){
       try{
        $defaultFilterJson = $request->get('default_query_filter');
        if($defaultFilterJson!=null){
            try {
                $d = json_decode($defaultFilterJson);
                $this->handleDecodedMessage($model,$d);
            }catch(Exception $e){
                return $e->getMessage();
            }
        }
        $searchFilterJson = $request->get('search_query_filter');
        if($searchFilterJson!=null){
            try {
                $s = json_decode($searchFilterJson);
                $this->handleDecodedMessage($model,$s);
            }catch(Exception $e){
                return $e->getMessage();
            }
        }


        $filterJson = $request->get("laravel_query_filter");
        if($filterJson==null) return ;
        $filterData = json_decode($filterJson);
        $this->handleDecodedMessage($model,$filterData);
       }catch(Exception $e){
        return $e->getMessage();
       }
    }

    private function handleDecodedMessage(&$model,&$filterData){
        foreach ($filterData as $key => $value ){

            switch (strtolower($key)) {
                case "orderby":
                     $this->orderByHandler($model,$value);
                break;  

                case "where" :
                     $this->whereHandler($model,$value);
                    break;

                    
                case "wherein" :
                     $this->whereInHandler($model,$value);
                    break;


                case "having" :
                     $this->havingHandler($model,$value);
                    break;

                    
                case "wherenull" :
                     $this->whereNullHandler($model,$value);
                    break;
                    
                case "wherenotnull" :
                     $this->whereNotNullHandler($model,$value);
                    break;


                case "wherehas":
                    $this->whereHasHandler($model,$value);
                    break;

                    

                case "select":
                    $this->selectHandler($model,$value);
                    break;

                case "groupby":
                    $this->groupByHandler($model,$value);
                    break;

                case "withrelation":
                    $this->withRelationHandler($model,$value);
                    break;


                case "orwhere" :
                 $this->orWhereHandler($model,$value);
                 break;    

                case "orwherenull" :
                 $this->orWhereHandler($model,$value);
                 break;    


                case "distinct" :
                 $this->distinct($model,$value);
                 break;    
            }
        }
    }


    private function orWhereNull(&$model,&$data){
        foreach ($data as $map){
            $root = $map->root;
            if(property_exists($root,"children") && is_array($root->children) && !isEmpty($root->children)){
             $model->orWhereNull(function ($m) use ($root){
                $m->orWhereNull($root->column);
                foreach($root->children as $querycb){
                    $this->handleDecodedMessage($m,$querycb);
                }
             });   
            } else {
              $model->orWhereNull($root->column);
            }
       }
    }


    private function whereNullHandler(&$model,&$data){
        foreach ($data as $map){
            $root = $map->root;
            if(property_exists($root,"children") && is_array($root->children) && !isEmpty($root->children)){
             $model->whereNull(function ($m) use ($root){
                $m->whereNull($root->column);
                foreach($root->children as $querycb){
                    $this->handleDecodedMessage($m,$querycb);
                }
             });   
            } else {
              $model->whereNull($root->column);
            }
       }
    }

    private function whereNotNullHandler(&$model,&$data){
        foreach ($data as $map){
            $root = $map->root;
            if(property_exists($root,"children") && is_array($root->children) && !isEmpty($root->children)){
             $model->whereNotNull(function ($m) use ($root){
                $m->whereNotNull($root->column);
                foreach($root->children as $querycb){
                    $this->handleDecodedMessage($m,$querycb);
                }
             });   
            } else {
              $model->whereNotNull($root->column);
            }
       }
    }


    private function orWhereHandler(&$model,&$data){
        foreach ($data as $map){
            $root = $map->root;
            if(property_exists($root,"children") && is_array($root->children) && !isEmpty($root->children)){
             $model->orwhere(function ($m) use ($root){
                $m->orwhere($root->column,$root->middleAction,$root->value);
                foreach($root->children as $querycb){
                    $this->handleDecodedMessage($m,$querycb);
                }
             });   
            } else {
              $model->orwhere($root->column,$root->middleAction,$root->value);
            }
       }
    }

    private function distinct(&$model,&$data){
        foreach ($data as $map){
            $root = $map->root;
            $model->distinct($root->column);    
        }
    }

    private function whereHandler(&$model,&$data){
        foreach ($data as $map){
            $root = $map->root;
            if(property_exists($root,"children") && is_array($root->children) && !empty($root->children)){
             $model->where(function ($m) use ($root){
                $m->where($root->column,$root->middleAction,$root->value);
                foreach($root->children as $querycb){
                    $this->handleDecodedMessage($m,$querycb);
                }
             });   
            } else {
              $model->where($root->column,$root->middleAction,$root->value);
            }
       }
    }

    
    private function selectHandler(&$model,&$data){
        foreach ($data as $map){
            $root = $map->root;
            if(property_exists($root,"children") && is_array($root->children) && !empty($root->children)){
             $model->select(function ($m) use ($root){
                $m->select($root->value);
                foreach($root->children as $querycb){
                    $this->handleDecodedMessage($m,$querycb);
                }
             });   
            } else {
                $model->select($root->value);
            }
       }
    }


    private function withRelationHandler(&$model,&$data){
        foreach ($data as $map){
            $root = $map->root;
            if(property_exists($root,"children") && is_array($root->children) && !empty($root->children)){
             $model->with($root->value,function ($m) use ($root){
                foreach($root->children as $querycb){
                    $this->handleDecodedMessage($m,$querycb);
                }
             });   
            } else {
                $model->with($root->value);
            }
       }
    }
    private function whereHasHandler(&$model,&$data){
        foreach ($data as $map){
            $root = $map->root;
            if(property_exists($root,"children") && is_array($root->children) && !empty($root->children)){
             $model->whereHas($root->value,function ($m) use ($root){
                foreach($root->children as $querycb){
                    $this->handleDecodedMessage($m,$querycb);
                }
             });   
            } else {
                $model->whereHas($root->value);
            }
       }
    }
      
    private function groupByHandler(&$model,&$data){
        foreach ($data as $map){
            $root = $map->root;
            $model->groupBy($root->value);
       }
    }

    private function whereInHandler(&$model,&$data){
        foreach ($data as $map){
            $root = $map->root;
            if(property_exists($root,"children") && is_array($root->children) && !empty($root->children)){
             $model->where(function ($m) use ($root){
                $m->whereIn($root->column,$root->value);
                foreach($root->children as $querycb){
                    $this->handleDecodedMessage($m,$querycb);
                }
             });   
            } else {
             $model->whereIn($root->column,$root->value);
            }
       }
    }

    private function havingHandler(&$model,&$data){
        foreach ($data as $map){
            $root = $map->root;
    
            if(property_exists($root,"children") && is_array($root->children) && !empty($root->children)){
             $model->having(function ($m) use ($root){
                $m->having($root->column,$root->middleAction,$root->value);
                foreach($root->children as $querycb){
                    $this->handleDecodedMessage($m,$querycb);
                }
             });   
            } else {
              $model->having($root->column,$root->middleAction,$root->value);
            }
       }
    }


    private function orderByHandler(&$model,&$data){
        foreach ($data as $map){
             $root = $map->root;
             $model->orderBy($root->column,$root->value);
        }
    }
}



?>