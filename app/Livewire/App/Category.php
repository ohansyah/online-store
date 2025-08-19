<?php

namespace App\Livewire\App;

use Livewire\Component;
use App\Models\Category as CategoryModel;
use Illuminate\Support\Facades\Cache;

class Category extends Component
{
    public $categories;
    public function render()
    {
        $this->categories = Cache::remember('categories', 3600, function () {
            return CategoryModel::active()->get();
        });

        return view('livewire.app.category');
    }
}
