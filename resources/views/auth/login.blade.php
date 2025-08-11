<x-guest-layout>
    
    @if (config('app.debug'))
        <x-demo-login-banner />
    @endif
    
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>

            <!-- Google Login Button -->
            @if (config('services.google.enabled'))
                <div class="mt-6">
                    <a href="{{ route('oauth.google') }}" 
                    class="w-full flex items-center justify-center border border-red-600 text-red-600 bg-white 
                            font-semibold py-2 rounded-md transition-all duration-300 hover:bg-red-600 hover:text-white">
                        <svg class="w-5 h-5 mr-2" viewBox="0 0 48 48">
                            <path fill="#4285F4" d="M24 9.5c3.2 0 5.6 1.2 7.4 2.8l5.6-5.6C33.4 3.1 28.9 1 24 1 14.8 1 7.3 7 4.1 15h7c2-4.1 6.4-6.5 10.9-6.5z"/>
                            <path fill="#34A853" d="M46.2 24c0-1.5-.1-2.9-.4-4.2H24v8.5h12.6c-.6 3-2.4 5.6-5.2 7.3v6h8.4c5-4.7 7.9-11.7 7.9-19.6z"/>
                            <path fill="#FBBC05" d="M9.2 28c-.9-2.6-1.5-5.4-1.5-8.2s.6-5.6 1.5-8.2h-7c-1 2.7-1.6 5.6-1.6 8.2s.6 5.6 1.6 8.2l7-2z"/>
                            <path fill="#EA4335" d="M24 47c6.1 0 11.4-2 15.1-5.5l-7.4-5.7c-2 1.3-4.5 2.1-7.7 2.1-5.5 0-10.2-3.6-11.8-8.4H3.1v6.3C7.3 42 14.1 47 24 47z"/>
                        </svg>
                        {{ __('Continue with Google') }}
                    </a>
                </div>
            @endif

        </form>
    </x-authentication-card>
</x-guest-layout>
