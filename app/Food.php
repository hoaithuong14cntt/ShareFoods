<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Food extends Model
{

    protected $fillable = ['place_id', 'image', 'name', 'description', 'content', 'price'];

    public function getImageAttribute($value)
    {
        if (empty($value)) {
            return '';
        }

        return Storage::url($value);
    }
}
