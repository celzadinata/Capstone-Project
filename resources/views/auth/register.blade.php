@extends('auth.app-register')
@section('content')
    <div class="registerresellerpage-RQi">
        <div class="auto-group-mqoc-9bc">
            <div class="bar-eHU">
                <div class="logo-y4r">
                    <img class="icontoko-uz6" src="{{ asset('assets/img/icontoko-3tr.png') }}" />
                    <p class="yokresell-reS">YokResell</p>
                </div>
            </div>
            <div class="register-ZHx">
                <div class="logo-6Yn">
                    <img class="icontoko-dHp" src="{{ asset('assets/img/icontoko-Hkr.png') }}" />
                    <div class="yok-resell-ZxA">
                        Yok
                        <br />
                        Resell
                    </div>
                </div>
                <form method="POST" action="{{ route('store') }}">
                    @csrf
                    <div class="auto-group-xzdp-JPx">
                        <div class="frame-16-zna">
                            <div class="nama-vRL">
                                <x-input-label for="nama" :value="__('Nama Lengkap')" class="nama-fti" />
                                <x-text-input id="nama" class="rectangle-4221-zg6" type="text" name="nama"
                                    :value="old('nama')" required autofocus autocomplete="nama" />
                                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                            </div>

                            <div class="username-KTU">
                                <x-input-label for="username" :value="__('Username')" class="username-HfC" />
                                <x-text-input id="username" class="input-Dok" type="text" name="username"
                                    :value="old('username')" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('username')" class="mt-2" />
                            </div>

                            @if ($role == 'pengusaha')
                                <div class="username-KTU">
                                    <x-input-label for="usaha" :value="__('Usaha')" class="username-HfC" />
                                    <x-text-input id="usaha" class="input-Dok" type="text" name="usaha"
                                        :value="old('usaha')" required autofocus autocomplete="usaha" />
                                    <x-input-error :messages="$errors->get('usaha')" class="mt-2" />
                                </div>
                            @endif

                            <div class="email-xmL">
                                <x-input-label for="email" :value="__('Email')" class="email-XJe" />
                                <x-text-input id="email" class="input-f9x" type="email" name="email"
                                    :value="old('email')" required autocomplete="email" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="no-hp-zi2">
                                <x-input-label for="hp" :value="__('No HP')" class="password-kBQ" />
                                <x-text-input id="hp" class="input-rkE" type="text" name="hp"
                                    :value="old('hp')" required autofocus autocomplete="phone" />
                                <x-input-error :messages="$errors->get('hp')" class="mt-2" />
                            </div>

                            <div class="alamat-Cp6">
                                <x-input-label for="alamat" :value="__('Alamat')" class="alamat-mcJ" />
                                <x-text-input id="alamat" class="input-JcE" type="text" name="alamat"
                                    :value="old('alamat')" required autofocus autocomplete="address" />
                                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                            </div>

                            <div class="password-Rwk">
                                <x-input-label for="password" :value="__('Password')" class="password-bbL" />

                                <x-text-input id="password" class="input-Xjt" type="password" name="password" required
                                    autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div class="konfirmasi-password-5Fc">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')"
                                    class="konfirmasi-password-EPQ" />

                                <x-text-input id="password_confirmation" class="input-ZRg" type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-text-input id="role" class="block mt-1 w-full" type="hidden" name="role"
                                    value="{{ $role }}" required autocomplete="role" />
                                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                            </div>

                        </div>
                        <div class="frame-19-sxA">
                            <x-primary-button class="button-abg">
                                {{ __('Register') }}
                            </x-primary-button>
                            <div class="login-1S6">
                                <div class="sudah-punya-akun-Apn">Sudah Punya Akun?</div>
                                <a class="login-sjC" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="footer-89L">
            <div class="frame-9-sMp">
                <p class="yokresell-2023-c4W">YokResell © 2023</p>
                <div class="frame-1-W9t">
                    <img class="ig-TL2" src="{{ asset('assets/img/ig-ezJ.png') }}" />
                    <img class="fb-D4J" src="{{ asset('assets/img/fb-9b4.png') }}" />
                    <img class="linkedin-mLi" src="{{ asset('assets/img/linkedin-mYA.png') }}" />
                    <img class="twitter-X4z" src="{{ asset('assets/img/twitter-nqC.png') }}" />
                    <img class="yt-UF8" src="{{ asset('assets/img/yt-fxz.png') }}" />
                </div>
            </div>
        </div>
    </div>
@endsection
