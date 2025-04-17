<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Content extends Model
{
    
    public static function boot()
    {
        parent::boot();

        static::creating(function ($content) {
            $content->slug = Str::slug($content->name, '-');
        });
    }
}
