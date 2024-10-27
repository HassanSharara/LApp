<?php

namespace App\Http\Controllers\statics\Firestore;

use Google\Cloud\Firestore\FirestoreClient;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging;

class FirebaseServerConnecterController 
{

    static function getFirebaseFactory():Factory{
        
        $service = config('fb_service');
        $factory = (new Factory)
        ->withServiceAccount($service);
        return $factory;
    }

    static function getFirebaseFirestore():FirestoreClient{
        return self::getFirebaseFactory()->createFirestore()->database();
    }


    static function messaging():Messaging{
        $factory = self::getFirebaseFactory();
        $messaging = $factory->createMessaging();
        return $messaging;
    }


}
