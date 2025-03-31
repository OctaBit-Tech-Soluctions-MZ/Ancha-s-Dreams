<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'description', 'price', 'course_photo_path', 'teacher'];

    public function instructor(){

        return $this->belongsTo(User::class, 'teacher');
    }
}
