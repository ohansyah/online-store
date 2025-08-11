<?php

namespace App\Http\Controllers;

use App\Services\OauthService;

class OauthController extends Controller
{
    public function handleOauthGoogle()
    {
        if (!config('services.google.enabled')) {
            return redirect()->to('/login')->with('error', 'Google login is disabled');
        }
        return OauthService::redirectToProvider(OauthService::GOOGLE);
    }

    public function handleOauthGoogleCallback()
    {
        if (!config('services.google.enabled')) {
            return redirect()->to('/login')->with('error', 'Google login is disabled');
        }
        return OauthService::handleProviderCallback(OauthService::GOOGLE);
    }
}
