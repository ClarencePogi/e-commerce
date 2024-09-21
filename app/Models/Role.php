<?php

namespace App\Models;

use App\User;
use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }
}
