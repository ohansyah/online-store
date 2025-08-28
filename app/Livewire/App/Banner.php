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
        $this->banners = Cache::remember('banners', 3600, function () {
            return BannerModel::select('id', 'name', 'image')->active()->take(5)->get();
        });

        return view('livewire.app.banner');
    }
}
