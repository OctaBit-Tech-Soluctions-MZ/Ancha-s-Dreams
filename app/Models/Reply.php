<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'comment_id',
        'comment_text',
        'attachment',
    ];
    public function comments()
    {
        return $this->belongsTo(Comment::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
