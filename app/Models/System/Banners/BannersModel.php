<?php

namespace App\Models\System\Banners;

use App\Models\RoyalBoardModel\RoyalBoardModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BannersModel extends RoyalBoardModel
{
    protected $table = "banners";
    protected $hasImage = true;
    use HasFactory;


}
