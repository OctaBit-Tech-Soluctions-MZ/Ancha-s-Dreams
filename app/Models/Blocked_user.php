<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blocked_user extends Model
{
    protected $fillable = [
        'user_id',
        'reason',
        'is_blocked',
        'blocked_by',
        'blocked_at',
        'unblocked_at'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
