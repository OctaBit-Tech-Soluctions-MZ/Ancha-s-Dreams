<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Recipe extends Model
{
    public static function boot()
    {
        parent::boot();

        static::creating(function ($recipes) {
            $recipes->slug = static::generateUniqueSlug($recipes->title);
        });

        static::updating(function ($recipes) {
            if ($recipes->isDirty('title')) {
                $recipes->slug = static::generateUniqueSlug($recipes->title, $recipes->id);
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
