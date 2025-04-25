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

    // Gera o slug automaticamente ao criar um curso
    public static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            $course->slug = Str::slug($course->name, '-');
        });
    }

    public function contents()
    {   
        return $this->hasMany(Content::class, 'course_id');
    }
}