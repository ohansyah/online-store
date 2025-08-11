<?php

namespace App\Livewire;

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

class Cashier extends Component
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
        $perpage = $this->page > 1 ? 12 : 24;

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

        $this->categories = Cache::remember('categories', 60, function () {
            return Category::active()->get();
        });

        $products = $this->loadProduct();

        if ($this->page > 1) {
            $this->allProducts = array_merge($this->allProducts, $products->items());
        } else {
            $this->allProducts = $products->items();
        }

        return view('livewire.cashier', [
            'products' => $this->allProducts,
        ]);
    }

    public function checkout($cartItems)
    {
        $cartItems = collect($cartItems);

        $productIds = $cartItems->pluck('id')->toArray();
        $products = Product::select('id', 'price')
            ->whereIn('id', $productIds)
            ->toBase()
            ->get();

        if ($products->isEmpty()) {
            throw new \Exception('Product not found');
        }

        DB::beginTransaction();
        try {

            $order = Order::create([
                'user_id' => auth()->id(),
                'total' => $cartItems->sum('total'),
            ]);
            $orderId = $order->id;

            $orderProducts = $products->map(function ($product) use ($orderId, $cartItems) {
                $cartItem = $cartItems->firstWhere('id', $product->id);
                if (!$cartItem) {
                    return null;
                }

                return [
                    'order_id' => $orderId,
                    'product_id' => $product->id,
                    'quantity' => $cartItem['qty'],
                    'price' => $product->price,
                    'total' => $product->price * $cartItem['qty'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            })->filter();

            OrderProduct::insert($orderProducts->toArray());

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }

        return $order->id;
    }
}
