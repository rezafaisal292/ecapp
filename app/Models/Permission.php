<?php

namespace App\Models;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    public $guarded = [];

    public function scopeFindById($query, string $value)
    {
        return $query->where('id', $value)->first();
    }
}
