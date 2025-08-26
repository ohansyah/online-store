<?php

namespace App\Livewire\App;

use Livewire\Component;
use App\Models\Product;

class ProductDetail extends Component
{
    public Product $product;

    public function mount($id)
    {
        $this->product = Product::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.app.product-detail')->layout('layouts.mobile');
    }
}
