<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
        @php
            $providers = [
                'google' => [
                    'bgColor' => '#ec462f',
                    'icon' => 'fab fa-google',
                ],
                'facebook' => [
                    'bgColor' => '#1877f2',
                    'icon' => 'fab fa-facebook-f',
                ],
                'linkedin' => [
                    'bgColor' => '#2969b1',
                    'icon' => 'fab fa-linkedin-in',
                ],
                'line' => [
                    'bgColor' => '#06c755',
                    'icon' => 'fab fa-line',
                ],
                'twitter' => [
                    'bgColor' => '#41aaf1',
                    'icon' => 'fab fa-twitter',
                ],
            ];
        @endphp

        @foreach ($providers as $provider => $params)
            <a class="block py-3 px-4 mb-5/2 rounded-sm text-white text-center font-bold hover:no-underline hover:opacity-75"
                href="{{ route('social.login', ['provider' => $provider]) }}"
                style="background-color: {{ $params['bgColor'] }}; min-height: 48px;">
                <i class="tw-float-left tw-inline-block tw-h-5 {{ $params['icon'] }}"></i>
                Login with {{ ucwords($provider) }}
            </a>
        @endforeach
    </x-jet-authentication-card>
</x-guest-layout>
