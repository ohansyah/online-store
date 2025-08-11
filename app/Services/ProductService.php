<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public static function index($searchQuery = null)
    {
        return Product::when($searchQuery, function ($query, $searchQuery) {
            return $query->where('name', 'like', '%' . $searchQuery . '%');
        });
    }
}
