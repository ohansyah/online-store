<?php

namespace App\Livewire\App;

use Livewire\Component;
use App\Models\Banner as BannerModel;

class BannerDetail extends Component
{
    public $banner;

    public function mount($id)
    {
        $this->banner = BannerModel::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.app.banner-detail')->layout('layouts.mobile');
    }
}
