<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
        'category',
        'price',
        'slug',
        'certificate',
        'cover',
        'folder_id',
        'status',
    ];
    
    public function instructor(){

        return $this->belongsTo(User::class, 'user_id');
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