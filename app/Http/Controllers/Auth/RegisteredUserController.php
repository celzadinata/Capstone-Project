<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */

    public function role()
    {
        return view('auth.register-role-page');
    }

    public function create(Request $request)
    {
        $request->validate([
            'role' => ['required'],
        ]);   
        return view('auth.register', ['role' => $request->role]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // dd($request->toArray());
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'role' => ['required'],
            'hp' => ['required','max:13'],
            'alamat' => ['required'],
            'username' => ['required', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $id = Str::random(4).rand(1000,9999);
        $user = User::create([
            'id' => $id,
            'nama_depan' => $request->nama,
            'role' => $request->role,
            'username' => $request->username,
            'jenis_kelamin' => 'laki-laki',
            'alamat' => $request->alamat,
            'no_hp' => $request->hp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        $redirect_path = '';
        Auth::user()->role === 'admin' ? $redirect_path = '/admin' : (Auth::user()->role === 'pengusaha' ? $redirect_path = '/pengusaha' : $redirect_path = '/reseller');

        return redirect($redirect_path);
    }
}
