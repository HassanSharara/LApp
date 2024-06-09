<?php

namespace App\Models\System\City;

use App\Models\RoyalBoardModel\RoyalBoardModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends RoyalBoardModel
{
    protected $table="city";
    use HasFactory;
}
