<?php

namespace App\Http\Controllers;

use App\Models\ProductSection;
use App\Models\Product;
use App\Models\Category;
use App\Models\Banner;

class DashboardController extends Controller
{
    public function index()
    {
        $bannerCount = Banner::count();
        $bannerActiveCount = Banner::where('is_active', true)->count();
        
        $categoryCount = Category::count();
        $categoryActiveCount = Category::where('is_active', true)->count();
        
        $productCount = Product::count();
        $productActiveCount = Product::where('is_active', true)->count();

        $productSectionCount = ProductSection::count();
        $productSectionDistinctCount = ProductSection::distinct('section_name')->count('section_name');

        return view('dashboard', [
            'stats' => [
                [
                    'title' => 'Banners',
                    'count' => $bannerCount,
                    'subtitle' => "{$bannerActiveCount} Active",
                ],
                [
                    'title' => 'Categories',
                    'count' => $categoryCount,
                    'subtitle' => "{$categoryActiveCount} Active",
                ],
                [
                    'title' => 'Products',
                    'count' => $productCount,
                    'subtitle' => "{$productActiveCount} Active",
                ],
                [
                    'title' => 'Product Sections',
                    'count' => $productSectionCount,
                    'subtitle' => "{$productSectionDistinctCount} Distinct",   
                ]
            ]
        ]);
    }
}
