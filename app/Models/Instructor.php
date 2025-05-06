<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'biography',
        'specialty',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
