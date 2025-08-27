<?php

namespace App\Livewire\App;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductSection as ModelProductSection;

class ProductSection extends Component
{
    public $products;
    public string $section;

    public function loadProduct()
    {
        return ModelProductSection::with('product')
            ->whereHas('product', function ($query) {
                $query->where('is_active', true);
            })
            ->where('section_name', $this->section)
            // ->inRandomOrder()
            ->take(8)
            ->get()
            ->pluck('product')
            ->filter(function ($product) {
                return $product && $product->is_active;
            })
            ->values()
            ->all();
    }

    public function render()
    {
        $this->products = $this->loadProduct();
        return view('livewire.app.product-section', [
            'products' => $this->products,
        ]);
    }
}
