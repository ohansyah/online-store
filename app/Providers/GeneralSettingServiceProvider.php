<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class GeneralSettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Cache::rememberForever('general_settings', function () {
            return GeneralSetting::all()->pluck('value', 'key')->toArray();
        });
    }
}
