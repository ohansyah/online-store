<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function getImageUrlAttribute()
    {
        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        } else {
            return asset('storage/' . $this->image);
        }
    }

    public function scopeActive()
    {
        return self::where('is_active', true)
            ->where('started_at', '<=', now())
            ->where('ended_at', '>=', now());
    }
}
