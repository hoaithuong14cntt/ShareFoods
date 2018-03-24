<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    const TYPES = [
        'user' => 1,
        'staff' => 2,
        'admin' => 3,
    ];

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getIsUserAttribute()
    {
        return self::TYPES['user'] == $this->type;
    }

    public function getIsStaffAttribute()
    {
        return self::TYPES['staff'] == $this->type;
    }

    public function getIsAdminAttribute()
    {
        return self::TYPES['admin'] == $this->type;
    }

    public function favorites()
    {
        return $this->belongsToMany(Design::class, 'favorites', 'user_id', 'favorited_id');
    }

    public function comments()
    {
        return $this->belongsToMany(Place::class, 'comments', 'user_id', 'place_id');
    }

    public function notes()
    {
        return $this->belongsToMany(Place::class, 'saves', 'user_id', 'place_id');
    }
}
