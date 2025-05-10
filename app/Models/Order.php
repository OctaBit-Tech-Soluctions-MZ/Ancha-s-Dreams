<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'status'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function order_items()
    {
        return $this->hasMany(Order_item::class);
    }
}
