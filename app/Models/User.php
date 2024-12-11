<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
        'is_super'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function roles():array{
        try {
            $roles = json_decode($this->roles);
            return $roles;
        }catch(Exception $e){}
        return [];
    }

    public function can_do($key):bool{
        $roles = $this->roles();
        if(
            $this->is_super == 1 
        ||  in_array($key,$roles) 
        ||  in_array("all_admin",$roles) 
        ) {
            return true;
        }
        return false;
    }
}
