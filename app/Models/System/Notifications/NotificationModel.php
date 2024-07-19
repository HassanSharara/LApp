<?php

namespace App\Models\System\Notifications;

use App\Models\RoyalBoardModel\RoyalBoardModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NotificationModel extends RoyalBoardModel
{
    protected $table = "notifications";
    protected $hasImage = true;
    use HasFactory;
}
