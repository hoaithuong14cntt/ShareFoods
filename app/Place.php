<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Place extends Model
{
    const STATUS = [
        'unpublished' => 0,
        'published' => 1,
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('favoriteCount', function ($builder) {
            $builder->withCount('favorites');
        });

        static::addGlobalScope('commentCount', function ($builder) {
            $builder->withCount('comments');
        });

        static::addGlobalScope('saveCount', function ($builder) {
            $builder->withCount('saves');
        });
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'favorited_id', 'user_id');
    }

    public function comments()
    {
        return $this->belongsToMany(User::class, 'comments', 'place_id', 'user_id');
    }

    public function cmt()
    {
        return $this->hasMany(Comment::class);
    }

    public function saves()
    {
        return $this->belongsToMany(User::class, 'saves', 'place_id', 'user_id');
    }

    public function getImageAttribute($value)
    {
        if (empty($value)) {
            return '';
        }

        return Storage::url($value);
    }

    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    public function notes()
    {
        return $this->belongsToMany(User::class, 'saves', 'place_id', 'user_id');
    }
}
