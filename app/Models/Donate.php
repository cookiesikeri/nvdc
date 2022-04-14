<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    protected $table = "donations";
    protected $guarded = [];

    public function users () {
        return $this->belongsTo('App\Models\User');
    }
}
