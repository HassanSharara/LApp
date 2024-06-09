<?php

namespace App\Models\System\Customer;

use App\Models\System\Shop\Shop;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\RoyalBoardUser as RoyalAuthenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class Customer extends RoyalAuthenticatable implements JWTSubject
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
