<?php

namespace App\Models\System\Packages;

use App\Models\RoyalBoardModel\RoyalBoardModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends RoyalBoardModel
{
    use HasFactory;
    protected $table="packages";
    
}
