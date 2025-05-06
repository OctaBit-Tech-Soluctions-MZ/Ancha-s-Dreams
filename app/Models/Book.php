<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
    protected $fillable = [
        'title',
        'description',
        'author',
        'cover',
        'price',
        'url',
        'qtd',
        'is_digital'
    ];

    public static function boot()
    {
        parent::boot();

        
        static::creating(function ($books) {
            $books->slug = static::generateUniqueSlug($books->title);
        });

        static::updating(function ($books) {
            if ($books->isDirty('title')) {
                $books->slug = static::generateUniqueSlug($books->title, $books->id);
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
