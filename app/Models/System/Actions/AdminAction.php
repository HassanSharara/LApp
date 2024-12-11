<?php

namespace App\Models\System\Actions;

use App\Models\RoyalBoardModel\RoyalBoardModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminAction extends RoyalBoardModel
{
    protected $table = "admin_actions";
    use HasFactory;


    static public function registerAction($user,RoyalBoardModel &$model,string $description):?string{
        $action = new AdminAction();
        $action->user_id = $user->id;
        $action->model_type = $model->getTable();
        $action->model_id = $model->id;
        $action->description = $description;
        return $action->saver();
    }


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
