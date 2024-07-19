<?php

namespace App\Models\System\Notification;

use App\Models\RoyalBoardModel\RoyalBoardModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NotificationModel extends RoyalBoardModel
{
    protected $table = "notifications";
    use HasFactory;
    protected $hasImage = true;
}
