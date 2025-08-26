<?php

namespace App\Livewire\App;

use App\Services\ProductService;
use Livewire\Component;
use Livewire\WithPagination;

class ProductSimpleList extends Component
{
    use WithPagination;

    public $hasMorePages = true;
    public $page = 1;
    public $products = [];

    public function loadMore()
    {
        $this->page++;
    }

    public function loadProduct()
    {
        $perpage = 6;

        $products = ProductService::index(null)
            ->simplePaginate($perpage, ['*'], 'page', $this->page);

        $this->hasMorePages = $products->hasMorePages();

        return $products;
    }

    public function render()
    {
        $products = $this->loadProduct();

        if ($this->page > 1) {
            $this->products = array_merge($this->products, $products->items());
        } else {
            $this->products = $products->items();
        }

        return view('livewire.app.product-simple-list', [
            'products' => $this->products,
        ]);
    }
}
