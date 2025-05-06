<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'qtd',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'created_by');
    }
}
