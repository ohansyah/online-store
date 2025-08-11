<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'barcode',
        'name',
        'price',
        'stock',
        'is_active',
        'image',
        'category_id',
        'description',
    ];

    protected $appends = [
        'image_url',
        'price_formatted',
    ];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($product) {
            if ($product->image == 'products/box.png') {
                return;
            }

            $path = storage_path('app/public/' . $product->image);
            if (file_exists($path)) {
                unlink($path);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageUrlAttribute()
    {
        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        } else {
            return asset('storage/' . $this->image);
        }
    }

    public function getPriceFormattedAttribute()
    {
        return formatCurrency($this->price, 0, ',', '.');
    }

}
