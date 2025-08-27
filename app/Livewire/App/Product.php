<?php

namespace App\Livewire\App;

use App\Models\Category;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;

    public string $searchQuery = '';
    public string $section = '';
    public $categories;
    public $selectedCategories = [];
    public $isFilteredCategory = false;
    public $hasMorePages = true;
    public $page = 1;
    public $allProducts = [];

    public function mount(Request $request)
    {
        if ($request->has('category') && is_numeric($categoryId)) {
            $this->toggleCategory($request->query('category'));
        }

        if ($request->has('search')) {
            $this->searchQuery = $request->query('search');
        }

        if ($request->has('section')) {
            $this->section = $request->query('section');
        }
    }

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
            ->when($this->section, function ($query){
                $query->whereHas('section', function ($q) {
                    $q->where('section_name', $this->section);
                });
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
            return Category::active()->get();
        });

        $products = $this->loadProduct();

        if ($this->page > 1) {
            $this->allProducts = array_merge($this->allProducts, $products->items());
        } else {
            $this->allProducts = $products->items();
        }

        return view('livewire.app.product', [
            'products' => $this->allProducts,
        ])->layout('layouts.mobile');
    }
}
