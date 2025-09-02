<?php

namespace App\Livewire\Forms;

use App\Models\Banner;
use App\Services\Session;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class BannerForm extends Component
{
    use WithFileUploads;

    public string $name;
    public string $started_at;
    public string $ended_at;
    public string $description;
    public int $is_active = 1;
    public $image;
    public $imagePreview;
    public $bannerId;

    protected $rules = [
        'name' => 'required|min:3|max:255',
        'description' => 'nullable|string|max:1000',
        'started_at' => 'required|date',
        'ended_at' => 'required|date|after_or_equal:started_at',
        'is_active' => 'required|in:0,1',
    ];

    public function mount($bannerId = null)
    {
        $this->bannerId = $bannerId;
        if ($bannerId) {
            $banner = Banner::findOrFail($bannerId);
            $this->name = $banner->name;
            $this->description = $banner->description;
            $this->started_at = $banner->started_at;
            $this->ended_at = $banner->ended_at;
            $this->is_active = $banner->is_active;
            $this->imagePreview = asset('storage/' . $banner->image);
        }
    }

    public function updatedImage()
    {
        $this->rules['image'] = 'required|image|mimes:jpeg,png,jpg,webp|max:1024';
        $this->validateOnly('image');
        $this->imagePreview = $this->image->temporaryUrl();
    }

    public function save()
    {
        $this->validate();

        $banner = $this->bannerId ? Banner::findOrFail($this->bannerId) : new Banner();
        $banner->name = $this->name;
        $banner->description = $this->description;
        $banner->started_at = $this->started_at;
        $banner->ended_at = $this->ended_at;
        $banner->is_active = $this->is_active;

        // uptional change image
        if ($this->image) {
            $banner->image = $this->image->store('banners', 'public');
        }
        $banner->save();

        Session::success($this->bannerId ? __('success_edit') : __('success_add') . ' ' . __('banner'));
        return redirect()->route('banner.index');
    }

    public function render()
    {
        return view('livewire.forms.banner-form');
    }
}
