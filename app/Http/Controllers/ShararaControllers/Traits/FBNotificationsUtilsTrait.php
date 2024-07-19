<?php

namespace App\Http\Controllers\ShararaControllers\Traits;

use App\Http\Controllers\statics\Firestore\FirebaseServerConnecterController;
use App\Models\RoyalBoardModel\RoyalBoardModel;
use App\Models\System\Notifications\NotificationModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Kreait\Firebase\Messaging;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

trait FBNotificationsUtilsTrait {




    static public function createAndSendNotification(
        $title,
        $body,
        $model,
        $metadata = null,
        $type = "general",
        $notificationModel = NotificationModel::class,
    ) : string | RoyalBoardModel {
      if( $type == "general" ){
        $notification = new $notificationModel();
        $notification->title = $title;
        $notification->body = $body;
        $notification->type = $type;
        $saver = $notification->saver();
        if($saver)return $saver;
        $class = new $model;
        $ms = $class::where('notification',1);
        $sender= Self::handleNotificationSending(
            FirebaseServerConnecterController::messaging(),
            $ms,
            $title,
            $body,
            $notification->fullResponse(),
            $type
        );
        if($sender)return $sender;
        return $notification;
      }

      else if ($model instanceof Model){
        $notification = new $notificationModel();
        $notification->title = $title;
        $notification->body = $body;
        $notification->type = $type;
        $notification->metadata = $metadata;
        $notification->model_type = $model->getTable();
        $notification->model_id = $model->id;
        $saver = $notification->saver();
        if($saver)return $saver;
        $sender =  Self::handleNotificationSending(
            FirebaseServerConnecterController::messaging(),
            $model,
            $title,
            $body,
            $notification->fullResponse(),
            $type
        );
        if($sender)return $sender;
        return $notification;
      }
      else if($model instanceof Builder){
        $noti = null;
        $model->chunk(499,function ($collection) use (
            &$notificationModel,
            &$title,
            &$body,
            &$type,
            &$metadata,
            &$noti,
        ){

            foreach($collection as $m){
                $notification = new $notificationModel();
            $notification->title = $title;
            $notification->body = $body;
            $notification->type = $type;
            $notification->metadata = $metadata;
            $notification->model_type = $m->getTable();
            $notification->model_id = $m->id;
            $saver = $notification->saver();
            if($saver)return $saver;
            if($noti==null)$noti = $notification;
            Self::handleNotificationSending(
                FirebaseServerConnecterController::messaging(),
                $m,
                $title,
                $body,
                $notification->fullResponse(),
                $type
            );
            }
            
        });
      }
      return $noti;
    }

    static public function handleNotificationSending(
        Messaging $messaging,
        $models,
        $title,
        $body,
        $data = null,
        $type = "general",
    ) :string | null{
        $tokens = [];

        if(is_array($models)){
            if(empty($models))return "models is an empty array";
            $f = $models[0];
            if(is_string($f)){
                $tokens = $models;
            }else if ($f instanceof Model){
                if(!(property_exists($f,"fcm")))return "error fcm column not found";
                foreach($models as $m){
                    $fcm = $m->fcm;
                    if($fcm==null)continue;
                    $tokens[] = $fcm;
                }
            }
        } else if($models instanceof Builder){
            $models->whereNotNull("fcm")->select('fcm')->chunk(499,function($m) use(&$messaging,
            &$title,&$body,&$data,&$type){
                $tokens =  $m->pluck('fcm')->toArray();

                self::sendNotification(
                    $messaging,
                    $title,
                    $body,
                    $tokens,
                    $data,
                    $type
                );
            });
            return null;
        }
        else if ($models instanceof Model){
           if($models->fcm==null)return "fcm is null";
           $tokens[] = $models->fcm;
        }
        self::sendNotification(
            $messaging,
            $title,
            $body,
            $tokens,
            $data,
            $type
        );
        return null;

    }


    static public function sendNotification(Messaging $messaging,$title,$body,array $tokens,$data=null,$type = "general"){
        $androidConfigArray = [
            'ttl' => '3600s',
            'priority' => 'high',
        ];
        $androidConfigArray['notification'] = [
            'title'=>$title,
            'body'=>$body,
            'click_action' => 'FLUTTER_NOTIFICATION_CLICK',
            'sound'=>'default',
            "icon" => "ic_stat_name",
        ];
        $serverData = [
           "title"=>$title,
           "_r_server_key"=>"_r_server_key",
            "body"=>$body,
            "type"=>$type,
            "_r_server_value"=>$data
        ];
        $cloudMessage = CloudMessage::new();
        $cloudMessage = $cloudMessage->withNotification(
            Notification::fromArray([
                "title"=>$title,
                "body"=>$body,
                "type"=>$type,
            ])
            )->withAndroidConfig($androidConfigArray);
        $cloudMessage = $cloudMessage->withData($serverData);
        $messaging->sendMulticast($cloudMessage,$tokens);
    }
}


?>