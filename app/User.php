<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Storage;

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

    const GENDERS = [
        'male' => 1,
        'female' => 2,
    ];

    const STATUS = [
        'inactive' => 0,
        'active' => 1,
    ];

    protected $fillable = ['email', 'password', 'firstname', 'lastname', 'date_of_birth', 'gender', 'address', 'avatar', 'phone', 'prefecture_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAvatarAttribute($value)
    {
        if (empty($value)) {
            return '';
        }

        return Storage::url($value);
    }

    public function getIsUserAttribute()
    {
        return self::TYPES['user'] == $this->type;
    }

    public function getFullnameAttribute()
    {
        return $this->lastname . ' ' . $this->firstname;
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
