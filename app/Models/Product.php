<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'qtd',
        'published'
    ];

    public function order_items(){
        return $this->morphedByMany(order_item::class, 'itemable');
    }

    public function users(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($products) {
            $products->slug = static::generateUniqueSlug($products->name);
        });

        static::updating(function ($products) {
            if ($products->isDirty('name')) {
                $products->slug = static::generateUniqueSlug($products->name, $products->id);
            }
        });
    }

    protected static function generateUniqueSlug($title, $excludeId = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)
            ->when($excludeId, fn($query) => $query->where('id', '!=', $excludeId))
            ->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
}
