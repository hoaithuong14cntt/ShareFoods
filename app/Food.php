<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Food extends Model
{
    public function getImageAttribute($value)
    {
        if (empty($value)) {
            return '';
        }

        return Storage::url($value);
    }
}
