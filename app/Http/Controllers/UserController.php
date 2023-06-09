<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('role', '<>', 'admin')->paginate(10);
        return view('admin.user_management.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user_management.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|unique:' . User::class . '|max:100',
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.admin')->with('success', 'Berhasil Menambah Admin!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user_management.confirm', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $id)
    {
        $request->validate([
            'status'     => 'required',
            'users_id'     => 'required',
        ]);

        $status = $request->status;
        if ($status == 'Aktif') {
            $pesan = 'Akun Anda Sudah Diaktifkan!';
        } elseif ($status == 'Non Aktif') {
            $pesan = 'Akun Anda Dinonaktifkan!';
        }
        notifikasi::create([
            'users_id' => $request->users_id,
            'judul' => 'Konfirmasi',
            'pesan' => $pesan,
        ]);

        $id->update($request->all());
        return redirect()->route('user.admin')->with('success', 'Berhasil Mengubah Status Akun!');
    }

    public function tolak(Request $request)
    {
        $request->validate([
            'users_id' => 'required',
            'pesan' => 'required',
        ]);

        notifikasi::create([
            'users_id' => $request->users_id,
            'judul' => 'User Ditolak!',
            'pesan' => $request->pesan,
        ]);
        return redirect()->route('user.admin')->with('success', 'Pesan berhasil dikirim');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        alert()->error('Berhasil Menghapus User');
        return redirect()->route('user.admin');
    }
}
