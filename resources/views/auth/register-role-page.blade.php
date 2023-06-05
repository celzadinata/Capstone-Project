@extends('auth.app')
@section('content')
    <div class="registerrole-5ti">
        <div class="logo-DEE">
            <img class="icontoko-jyG" src="{{ asset('assets/img/icontoko-Hkr.png') }}" />
            <div class="yok-resell-HUz">
                Yok
                <br />
                Resell
            </div>
        </div>
        <div class="auto-group-jfux-1A6">
            <div class="pilih-role-8Vc">
                <div class="role-V5G">Mendaftar sebagai :</div>
                <form method="GET" action="{{ route('register') }}">
                    @csrf
                    <div class="frame-12-naA">
                        <div class="frame-10-XXk">

                            <label for="reseller" class="role-radio-btn">Calon Reseller
                                <x-text-input id="reseller" type="radio" name="role" value="reseller" required
                                    autofocus autocomplete="role" />
                                <span class="checkmark"></span>
                            </label>
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                        </div>
                        <div class="frame-11-7kr">

                            <label for="pengusaha" class="role-radio-btn">Pengusaha
                                <x-text-input id="pengusaha" type="radio" name="role" value="pengusaha" required
                                    autofocus autocomplete="role" />
                                <span class="checkmark"></span>
                            </label>
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                        </div>
                    </div>
                    <div class="frame-27-k38">
                        <x-primary-button class="button-fvn">
                            {{ __('Berikutnya') }}
                        </x-primary-button>
                        <div class="login-uq8">
                            <div class="sudah-punya-akun-TLr">Sudah Punya Akun?</div>
                            <div class="login-MSE">Login</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end mt-4">

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
