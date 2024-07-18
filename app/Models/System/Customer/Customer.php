<?php

namespace App\Models\System\Customer;

use App\Models\RoyalBoardModel\RoyalUserModel\RoyalUserModel as RAUTH;
use App\Models\System\Shop\Shop;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class Customer extends RAUTH implements JWTSubject
{
    use HasFactory;
    use Notifiable;
    
    protected $hasImage=true;
    protected $hidden=['password','google_id'];
    protected $RCH=['shop'];
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    
    function shop(){
        return $this->hasOne(Shop::class,'creator');
    }

   function fullResponse(){
       $this->shop();
       $this->images;
       return $this;
    }
}

