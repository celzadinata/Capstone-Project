@extends('auth.app')
@section('content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="login-gbp">
            <div class="logo-bTt">
                <img class="icontoko-WKx" src="{{ asset('assets/img/icontoko-Hkr.png') }}" />
                <div class="yok-resell-r8v">
                    Yok
                    <br />
                    Resell
                </div>
            </div>
            <div class="auto-group-swk6-NNA">
                <div class="login-HEE">Login</div>
                <div class="input-ysk">
                    <div class="input-username-Gbx">
                        <x-input-label for="email" :value="__('Email')" class="email-mBL" />
                        <x-text-input id="email" class="rectangle-4221-ria" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="input-password-yoC">
                        <x-input-label for="password" :value="__('Password')" class="password-Ldk" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" class="input-Fki" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    {{-- <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                name="remember">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div> --}}
                </div>
                <div class="frame-26-ZFc">
                    <x-primary-button class="button-VQA">
                        {{ __('Login') }}
                    </x-primary-button>
                    <div class="daftar-7Ae">
                        <div class="tidak-punya-akun-sQi">Tidak Punya Akun?</div>
                        <a class="daftar-NMU" href="{{ route('role') }}">
                            {{ __('Daftar') }}
                        </a>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </form>
@endsection
