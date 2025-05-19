<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content_id',
        'comment_text',
        'attachment',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function contents()
    {
        return $this->belongsTo(Content::class);
    }
}
