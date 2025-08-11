<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class GeneralSettingController extends Controller
{
    public function clear($key)
    {
        if ($key != env('CACHE_CLEAR_KEY')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        Cache::forget('general_settings');

        return response()->json(['message' => 'Cache cleared']);
    }

    public function index()
    {
        return view('general-setting');
    }
}
