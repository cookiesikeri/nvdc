<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'role_id',
        'home_component',
        'demo_request',
        'service',
        'product',
        'settings',
        'pages',
        'careers',
        'user_module'
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }
}
