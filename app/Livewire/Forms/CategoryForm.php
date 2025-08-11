<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use App\Services\Session;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CategoryForm extends Component
{
    use WithFileUploads;

    public string $name;
    public int $is_active = 1;
    public $image;
    public $imagePreview;
    public $categoryId;

    protected $rules = [
        'name' => 'required|min:3|max:255',
        'is_active' => 'required|in:0,1',
    ];

    public function mount($categoryId = null)
    {
        $this->categoryId = $categoryId;
        if ($categoryId) {
            $category = Category::findOrFail($categoryId);
            $this->name = $category->name;
            $this->is_active = $category->is_active;
            $this->imagePreview = asset('storage/' . $category->image);
        }
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

        $category = $this->categoryId ? Category::findOrFail($this->categoryId) : new Category();
        $category->name = $this->name;
        $category->is_active = $this->is_active;

        // uptional change image
        if ($this->image) {
            $category->image = $this->image->store('categories', 'public');
        }
        $category->save();

        Session::success($this->categoryId ? __('success_edit') : __('success_add') . ' ' . __('category'));
        return redirect()->route('category.index');
    }

    public function render()
    {
        return view('livewire.category-form');
    }
}
