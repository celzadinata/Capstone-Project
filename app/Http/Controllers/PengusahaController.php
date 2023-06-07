<?php

namespace App\Http\Controllers;

use App\Models\notifikasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PengusahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $notifikasi = notifikasi::where('users_id', $id)->get();
        $jml_notif = notifikasi::where('users_id', $id)->count();
        return view('pengusaha.dashboard.index', compact('notifikasi','jml_notif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = Auth::id();
        $notifikasi = notifikasi::where('users_id', $id)->get();
        $jml_notif = notifikasi::where('users_id', $id)->count();
        return view('pengusaha.dashboard.profile', compact('notifikasi','jml_notif'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'password' => ['confirmed', Password::default()->sometimes()],
            // 'jenisKelamin' => 'required',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:13',
            'avatar' => 'mimes:jpg,jpeg,png|max:2048'
        ]);

        // dd($request->toArray());
        $pengusaha = User::find(Auth::user()->id);
        $pengusaha->nama_depan = $request->input('nama');
        $pengusaha->no_hp = $request->input('no_hp');
        // $pengusaha->jenis_kelamin = $request->input('jenisKelamin');
        $pengusaha->alamat = $request->input('alamat');
        if ($request->avatar) {
            $imgUrl = time() . '-' . Auth::user()->username . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('assets/users/' . Auth::user()->role . '/' . Auth::user()->id . '/avatar'), $imgUrl);
            $pengusaha->avatar = $imgUrl;
        }
        if ($request->password) {
            $pengusaha->password = Hash::make($request->input('password'));
        }
        if ($request->berkas) {
            $berkasUrl = time() . '-' . Auth::user()->username . '.' . $request->berkas->extension();
            $request->berkas->move(public_path('assets/users/' . Auth::user()->role . '/' . Auth::user()->id . '/berkasprofil'), $berkasUrl);
            $pengusaha->berkas = $berkasUrl;
        }
        $pengusaha->update();

        return back()->with('success', 'Berhasil mengubah informasi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
