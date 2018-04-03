<?php

namespace App;

use App\Traits\HasParentModel;

class Staff extends User
{
    use HasParentModel;

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('type', User::TYPES['staff']);
        });
    }
}
