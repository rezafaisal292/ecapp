<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];

    public function scopefetch($query, $request, $export = false)
    {

        $q = $query->select();
                 
        if ($export === false) {
            if ($request->has('per_page')) {
                return $request->per_page === 'All' ? $q->get() : $q->paginate($request->per_page);
            }

            return $q->paginate(10);
        }
        return $q->get();
    }
    public function scopeFindByName($query, string $value)
    {
        return $query->where('name', $value)->first();
    }
}
