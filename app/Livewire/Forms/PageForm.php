<?php

namespace App\Livewire\Forms;

use App\Models\Page;
use App\Services\Session;
use Livewire\Attributes\Validate;
use Livewire\Component;

class PageForm extends Component
{
    public string $title;
    public string $content;
    public $pageId;

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'content' => 'required|string',
    ];

    public function mount($pageId)
    {
        $page = Page::findOrFail($pageId);
        $this->title = $page->title;
        $this->content = $page->content;
    }

    public function save()
    {
        $this->validate();

        $page = Page::findOrFail($this->pageId);
        $page->title = $page->title; // Title is not editable
        $page->content = $this->content;
        $page->save();

        Session::success(__('success_update') . ' ' . __('page') . ' ' . $this->title);
        return redirect()->route('page.index');
    }

    public function render()
    {
        return view('livewire.forms.page-form');
    }
}
