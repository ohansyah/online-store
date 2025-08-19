<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class AppHome extends Component
{
    public $categories;
    public $products;

    public function render()
    {
        $this->categories = Cache::remember('categories', 3600, function () {
            return Category::active()->get();
        });

        return view('livewire.app-home')->layout('layouts.mobile');
    }
}
