<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class USDPayment extends Model
{
    use HasFactory;

    protected $table = "usd_payments";
    protected $guarded = [];
}
