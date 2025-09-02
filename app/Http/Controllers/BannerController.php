<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Services\Session;

class BannerController extends Controller
{
    public function delete($bannerId)
    {
        try {
            $banner = Banner::findOrFail($bannerId);
            $banner->delete();
            Session::success(__('success_delete') . ' ' . __('banner').' '. $banner->name);
        } catch (\Throwable $th) {
            Session::failed(__('failed_delete') . ' ' . __('banner'). '. ' . $th->getMessage());
        }
        return redirect()->route('banner.index');
    }
}
