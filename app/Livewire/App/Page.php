<?php

namespace App\Livewire\App;

use Livewire\Component;
use App\Models\Page as PageModel;
use Illuminate\Http\Request;

class Page extends Component
{
    public $page;
    public string $title = '';

    public function mount(Request $request)
    {
        $this->title = $request->route('title');
    }

    public function render()
    {
        $this->page = PageModel::where('title', $this->title)->firstOrFail();

        return view('livewire.app.page')->layout('layouts.mobile');
    }
}