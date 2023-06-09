<?php

namespace App\Http\Controllers;

use App\Models\detail_transaksi;
use File;
use App\Models\User;
use App\Models\produk;
use App\Models\transaksi;
use App\Models\notifikasi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

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
        })->with('detail_transaksi.produk')->get();

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
        $id = 'TRX'.rand(1000000,9999999);
        $cart_items = detail_transaksi::where('transaksis_id', null)->get();

        foreach ($cart_items as $keyy => $itemm) {
            $product = produk::find($itemm->produks_id);
            $validation = produk::find($itemm->produks_id);
            if ($product->stok < $itemm->qty) {
                alert()->error('Ada produk yang kekurangan stok, silahkan cek kembali persediaan produk');
                return back();
            }
        }

        foreach ($cart_items as $item) {
            $product = produk::find($item->produks_id);
            if ($product->stok >= $item->qty) {
                $product->stok -= $item->qty;
                $item->transaksis_id = $id;
            } else {
                alert()->error('Ada produk yang kekurangan stok, silahkan cek kembali persediaan produk');
                return back();
            }
            $product->update();
        }
        
        $transaksi = transaksi::create([
            'id' => $id,
            'user_id' => Auth::user()->id,
            'tanggal' => Date::now(),
            'total' => $request->total,
            'bukti_pembayaran' => 'sad.pdf'
        ]);

        foreach ($cart_items as $item) {
            $item->update();
        }

        return back()->with('success', 'Berhasil membeli paket/usaha, silahkan selesaikan proses pembayaran');
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
