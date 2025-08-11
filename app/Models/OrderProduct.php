<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'total',
    ];

    protected $appends = [
        'price_formatted',
        'total_formatted',
    ];

    public function getPriceFormattedAttribute()
    {
        return formatCurrency($this->price, 0, ',', '.');
    }
    
    public function getTotalFormattedAttribute()
    {
        return formatCurrency($this->total, 0, ',', '.');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
