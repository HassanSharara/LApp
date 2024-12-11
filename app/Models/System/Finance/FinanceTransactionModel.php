<?php

namespace App\Models\System\Finance;

use App\Models\RoyalBoardModel\RoyalBoardModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FinanceTransactionModel extends RoyalBoardModel
{
    protected $table = "transactions";
    use HasFactory;
}
