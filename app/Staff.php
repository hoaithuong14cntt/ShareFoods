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

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'user_id')->withPivot('id');
    }
}
