<?php

namespace App\Livewire\App;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Services\ProductService;
use App\Services\Session;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public string $searchQuery = '';
    public $categories;
    public $selectedCategories = [];
    public $isFilteredCategory = false;
    public $hasMorePages = true;
    public $page = 1;
    public $allProducts = [];
    public $cartItems = [];

    public function toggleCategory($categoryId)
    {
        $this->selectedCategories = in_array($categoryId, $this->selectedCategories)
        ? array_diff($this->selectedCategories, [$categoryId])
        : array_merge($this->selectedCategories, [$categoryId]);

        $this->isFilteredCategory = true;
    }

    public function loadMore()
    {
        $this->page++;
    }

    public function loadProduct()
    {
        $perpage = 12;

        $products = ProductService::index($this->searchQuery)
            ->when($this->selectedCategories, function ($query) {
                $query->whereIn('category_id', $this->selectedCategories);
            })
            ->simplePaginate($perpage, ['*'], 'page', $this->page);

        $this->hasMorePages = $products->hasMorePages();

        return $products;
    }

    public function resetPage()
    {
        $this->page = 1;
        $this->allProducts = [];
    }

    public function render()
    {
        if ($this->isFilteredCategory || $this->searchQuery != '') {
            $this->resetPage();
        }

        $this->categories = Cache::remember('categories', 3600, function () {
            return Category::active()->toBase()->get();
        });

        $products = $this->loadProduct();

        if ($this->page > 1) {
            $this->allProducts = array_merge($this->allProducts, $products->items());
        } else {
            $this->allProducts = $products->items();
        }

        return view('livewire.app.product-list', [
            'products' => $this->allProducts,
        ]);
    }
}
