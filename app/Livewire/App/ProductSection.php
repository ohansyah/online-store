<?php

namespace App\Livewire\App;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductSection as ModelProductSection;

class ProductSection extends Component
{
    public $products;
    public string $section = 'popular';

    public function loadProduct()
    {
        $perpage = 8;

        $productSectionIds = ModelProductSection::where('section_name', $this->section)
            ->inRandomOrder()
            ->take($perpage)
            ->pluck('id')
            ->toArray();

        return Product::whereIn('id', $productSectionIds)->get();
    }

    public function render()
    {
        $this->products = $this->loadProduct();
        return view('livewire.app.product-section', [
            'products' => $this->products,
        ]);
    }
}
