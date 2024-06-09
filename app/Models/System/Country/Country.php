<?php

namespace App\Models\System\Country;

use App\Models\RoyalBoardModel\RoyalBoardModel;
use App\Models\System\City\City;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends RoyalBoardModel
{
    protected $table="countries";
    protected $RCH=['cities'];
    use HasFactory;


    function childs(){
        return $this->hasMany(City::class,$this->fatherModel);
    }
}
