<?php

namespace App\Livewire\App;

use App\Models\Banner as BannerModel;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Banner extends Component
{
    public $banners;
    public function render()
    {
        $this->banners = Cache::remember('banner:list', 3600, function () {
            return BannerModel::select('id', 'name', 'image', 'started_at', 'ended_at')->active()->get();
        });

        return view('livewire.app.banner')->layout('layouts.mobile');
    }
}
