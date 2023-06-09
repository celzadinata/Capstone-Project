<?php

namespace App\Http\Controllers;

use App\Models\notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'produks_id' => 'required',
            'users_id' => 'required',
            'judul' => 'required',
            'pesan' => 'required',
        ]);

        notifikasi::create($request->all());
        return redirect()->route('konfirmasi.admin')->with('success', 'Pesan berhasil dikirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\notifikasi  $notifikasi
     * @return \Illuminate\Http\Response
     */
    public function show(notifikasi $notifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\notifikasi  $notifikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(notifikasi $notifikasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\notifikasi  $notifikasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, notifikasi $notifikasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notifikasi  $notifikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(notifikasi $notifikasi)
    {
        $id = Auth::id();
        notifikasi::where('users_id',$id)->delete();

        return redirect()->back();
    }
}
