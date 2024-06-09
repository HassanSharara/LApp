<?php

namespace App\Models\System\Shop;

use App\Models\RoyalBoardModel\RoyalBoardModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends RoyalBoardModel
{
    protected $table="shop";
    use HasFactory;
}
