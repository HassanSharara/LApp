<?php

namespace App\Models\Appdebugmonitor;

use App\Models\RoyalBoardModel\RoyalBoardModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppDebugMonitor extends RoyalBoardModel
{
    protected $table="royal_app_debug_monitor";
    use HasFactory;
}
