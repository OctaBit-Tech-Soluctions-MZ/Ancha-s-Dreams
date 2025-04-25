<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Content extends Model
{
    protected $fillable = ['title', 'description', 'url_preview', 'file_id','duration', 'order', 'course_id'];
    
    public static function boot()
    {
        parent::boot();

        static::creating(function ($content) {
            $content->slug = Str::slug($content->name, '-');
        });
    }

    public function courses() {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
