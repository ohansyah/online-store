<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class OauthService
{
    const GOOGLE = 'google';

    public static function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public static function handleProviderCallback($provider)
    {
        $socialiteUser = Socialite::driver($provider)->user();

        $user = User::where('provider', $provider)
            ->where('provider_id', $socialiteUser->getId())
            ->first();

        if (!$user) {
            $user = User::where('email', $socialiteUser->getEmail())->first();

            if ($user) {
                if (($provider != $user->provider) && $user->provider != null) {
                    return redirect()->to('/login')->with('error', 'Email registered with ' . $user->provider);
                }

                $user->update([
                    'provider' => $provider,
                    'provider_id' => $socialiteUser->getId(),
                    'provider_token' => $socialiteUser->token,
                ]);

            } else {
                $user = User::create([
                    'name' => $socialiteUser->getName(),
                    'email' => $socialiteUser->getEmail(),
                    'provider' => $provider,
                    'provider_id' => $socialiteUser->getId(),
                    'provider_token' => $socialiteUser->token,
                ]);
            }
        }

        Auth::login($user);

        return redirect()->to('/cashier');
    }
}
