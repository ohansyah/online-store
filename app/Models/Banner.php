<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'started_at',
        'ended_at',
        'image',
        'is_active',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function () {
            Cache::forget('banner:list');
            Cache::forget('banner:slider');
        });

        static::updated(function () {
            Cache::forget('banner:list');
            Cache::forget('banner:slider');
        });

        static::deleting(function ($category) {
            $path = storage_path('app/public/' . $category->image);
            if (file_exists($path)) {
                unlink($path);
            }

            Cache::forget('banner:list');
            Cache::forget('banner:slider');
        });
    }

    protected $appends = ['image_url'];

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
        return $query->where('is_active', true)
            ->where('started_at', '<=', now())
            ->where('ended_at', '>=', now());
    }
}
