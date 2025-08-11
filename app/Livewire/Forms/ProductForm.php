<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use App\Models\Product;
use App\Services\Session;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductForm extends Component
{
    use WithFileUploads;

    public string $sku;
    public string $barcode;
    public string $description;
    public string $name;
    public float $price;
    public int $stock;
    public int $is_active = 1;
    public $image;
    public $imagePreview;
    public $category_id;
    public $productId;
    public $categories;

    protected $rules = [
        'sku' => 'required|min:3|max:255',
        'barcode' => 'required|min:3|max:255',
        'name' => 'required|min:3|max:255',
        'description' => 'required|max:1000',
        'price' => 'required|numeric|min:1',
        'stock' => 'required|numeric|min:0',
        'is_active' => 'required|in:0,1',
    ];

    public function mount($productId = null)
    {
        $this->productId = $productId;
        if ($productId) {
            $product = Product::findOrFail($productId);
            $this->sku = $product->sku;
            $this->barcode = $product->barcode;
            $this->name = $product->name;
            $this->description = $product->description;
            $this->category_id = $product->category_id;
            $this->price = $product->price;
            $this->stock = $product->stock;
            $this->is_active = $product->is_active;
            $this->imagePreview = asset('storage/' . $product->image);
        }

        $this->categories = Cache::remember('categories', 60, function () {
            return Category::active()->get();
        });
    }

    public function updatedImage()
    {
        $this->rules['image'] = 'required|image|mimes:jpeg,png,jpg|max:1024';
        $this->validateOnly('image');
        $this->imagePreview = $this->image->temporaryUrl();
    }

    public function save()
    {
        $this->validate();

        $product = $this->productId ? Product::findOrFail($this->productId) : new Product();
        $product->sku = $this->sku;
        $product->barcode = $this->barcode;
        $product->name = $this->name;
        $product->description = $this->description;
        $product->category_id = $this->category_id;
        $product->price = $this->price;
        $product->stock = $this->stock;
        $product->is_active = $this->is_active;

        // optional change image
        if ($this->image) {
            $product->image = $this->image->store('products', 'public');
        }
        $product->save();

        Session::success($this->productId ? __('success_edit') : __('success_add') . ' ' . __('product'));
        return redirect()->route('product.index');
    }

    public function render()
    {
        return view('livewire.product-form');
    }
}
