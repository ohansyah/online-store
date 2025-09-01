<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Banner;

class DashboardController extends Controller
{
    public function index()
    {
        /**
         * Dashboard Overview
         * count product
         * count category
         * count banner
         */

        return view('dashboard', [
            'stats' => [
                [
                    'title' => 'Products',
                    'count' => Product::count(),
                ],
                [
                    'title' => 'Categories',
                    'count' => Category::count(),
                ],
                [
                    'title' => 'Banners',
                    'count' => Banner::count(),
                ]
            ]
        ]);
    }
}
