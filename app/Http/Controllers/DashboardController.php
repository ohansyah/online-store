<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

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
            
        ]);
    }
}
