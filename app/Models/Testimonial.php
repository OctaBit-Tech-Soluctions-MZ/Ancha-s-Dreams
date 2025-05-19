<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'user_id',
        'comment',
        'rate',

    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
