<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'invoice_number',
        'total',
    ];

    protected $appends = [
        'total_formatted',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($order) {

            /**
             * Generate invoice number
             * INV-YYYYMMDD-HHIISS-USERID
             * INV-20241230-235959-1
             */
            $order->invoice_number = 'INV-' . date('Ymd') . '-' . date('His') . '-' . $order->user_id;
        });
    }
    
    public function getTotalFormattedAttribute()
    {
        return formatCurrency($this->total, 0, ',', '.');
    }

    /**
     * RELATIONSHIP SECTION
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
