<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Content extends Model
{
    protected $fillable = ['title', 'description', 'url', 'order', 'file_id', 'course_id', 'recipe'];
    
    public static function boot()
    {
        parent::boot();

        static::creating(function ($content) {
            $content->slug = static::generateUniqueSlug($content->title);
        });

        static::updating(function ($content) {
            if ($content->isDirty('title')) {
                $content->slug = static::generateUniqueSlug($content->title, $content->id);
            }
        });
    }

    protected static function generateUniqueSlug($title, $excludeId = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)
            ->when($excludeId, fn($query) => $query->where('id', '!=', $excludeId))
            ->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }


    public function courses() {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
