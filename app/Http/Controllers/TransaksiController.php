<?php

namespace App\Http\Controllers;

use File;
use App\Models\User;
use App\Models\produk;
use App\Models\transaksi;
use App\Models\notifikasi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Untuk laporan tabel
        $log = Auth::id();
        $transaksiModel = transaksi::whereHas('detail_transaksi', function ($query) use ($log) {
            $query->whereHas('produk', function ($query) use ($log) {
                $query->where('users_id', $log);
            });
        })->with('detail_transaksi.produk')->paginate(10);

        $notifikasi = notifikasi::where('users_id', $log)->get();
        $jml_notif = notifikasi::where('users_id', $log)->count();

        return view('pengusaha.transaksi.index', compact('transaksiModel', 'notifikasi', 'jml_notif'));
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
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required'
        ]);

        transaksi::where('id', $id)->update([
            'status' => $validated['status']
        ]);
        return redirect()->back()->with('success', 'Status berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaksi $transaksi)
    {
        //
    }
}
