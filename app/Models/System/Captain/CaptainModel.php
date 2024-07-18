<?php

namespace App\Models\System\Captain;

use App\Models\System\Customer\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CaptainModel extends Customer
{
    protected $table = "captains";
    use HasFactory;
}
