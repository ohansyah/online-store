<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'is_active',
        'image',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function () {
            Cache::forget('categories');
        });

        static::updated(function () {
            Cache::forget('categories');
        });

        static::deleting(function ($category) {
            $path = storage_path('app/public/' . $category->image);
            if (file_exists($path)) {
                unlink($path);
            }

            Cache::forget('categories');
        });
    }

    public function getImageUrlAttribute()
    {
        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        } else {
            return asset('storage/' . $this->image);
        }
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
