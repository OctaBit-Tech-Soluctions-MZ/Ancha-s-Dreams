<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyCourse extends Model
{
    protected $fillable = [
        'course_id',
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
