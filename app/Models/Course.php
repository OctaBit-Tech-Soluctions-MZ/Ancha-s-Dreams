<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    protected $fillable = ['name','price','nivel','category','description','course_photo_path','teacher','folder_id'];

    public function instructor(){

        return $this->belongsTo(User::class, 'teacher');
    }

    public function contents()
    {   
        return $this->hasMany(Content::class, 'course_id');
    }
    
    public static function boot()
    {
        parent::boot();

        static::creating(function ($courses) {
            $courses->slug = static::generateUniqueSlug($courses->name);
        });

        static::updating(function ($courses) {
            if ($courses->isDirty('name')) {
                $courses->slug = static::generateUniqueSlug($courses->name, $courses->id);
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
}