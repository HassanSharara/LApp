<?php

namespace App\Http\Controllers\Web\Notifications;

use App\Http\Controllers\Files\Image\ImageController;
use App\Http\Controllers\Types\RoyalWebController;
use Illuminate\Http\Request;
use App\Http\Controllers\ShararaControllers\Traits\FBNotificationsUtilsTrait;
use App\Models\System\Customer\Customer;
use App\Models\System\Notification\NotificationModel;

class NotificationsWebController extends RoyalWebController
{
    
    protected string $viewPath = "Admin.Notifications.";


    public function all(){
        $model = NotificationModel::where('type','general')->orderBy('created_at','desc')
        ->paginate();
        return $this->render("all",['model'=>$model]);
    }


    public function create(request $request){
      
        if($request->isMethod("GET"))return $this->render("create");
        $title = $request->get('title');
        $body = $request->get('body');
        $sender = FBNotificationsUtilsTrait::createAndSendNotification(
            $title,
            $body,
            Customer::class,
        );

        if(is_string($sender))return $this->EM($sender);
        if($sender==null)return $this->EM("error");
        if($request->hasFile('royal_image')){
            ImageController::createWebImage($request,$sender,false);
        }
        return redirect(Route("all_notifications"))->with(
            [
                "success"=>"تمت العملية بنجاح"
            ]
        );
    }


    public function edit(request $request,$id){
        $notification = NotificationModel::find($id);
        if($notification==null)return $this->EM("يرجى تحديث الصفحة والمحاولة لاحقاً");
        
        if($request->isMethod("GET"))return $this->render("create",[
            "model"=>$notification
        ]);

        $title = $request->get("title");
        $body = $request->get("body");
        if($title!=null){
            $notification->title = $title;
        }
        if($body!=null){
            $notification->body = $body;
        }
        $saver = $notification->saver();
        if($saver)return $this->EM($saver);
        if($request->hasFile("royal_image")){
            $imageSaver = ImageController::createWebImage($request,$notification,true);
            if($imageSaver)return $this->EM($imageSaver);
        }

        return redirect(Route("all_notifications"))->with(
            [
                "success"=>"تمت العملية بنجاح"
            ]
        );
    }


    public function delete(request $_,$id){
        $notification = NotificationModel::find($id);
        if($notification==null)return $this->EM("يرجى تحديث الصفحة والمحاولة لاحقاً");
        $notification->fullRemoving();
        return $this->SM("تمت العملية بنجاح");
    }
}
