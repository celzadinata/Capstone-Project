<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\kategori;
use Illuminate\Http\Request;
use App\Models\detail_transaksi;
use Illuminate\Support\Facades\Auth;


class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_kategori = kategori::paginate(5);
        return view('livewire.cart',compact('list_kategori'));
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
    public function store(Request $request, $id)
    {
        $produk = produk::find($id);
        $user = Auth::user();

        if ($user->status == 'Non Aktif') {
            alert()->error('Akun Anda Belum Dikonfirmasi Admin');
            return back();
        }

        if ($produk->stok < 1) {
            alert()->error('Persediaan barang tidak ada');
            return back();
        }

        $ifDuplicate = detail_transaksi::where(['produks_id' => $id, 'transaksis_id' => null, 'users_id' => Auth::user()->id])->first();

        if ($ifDuplicate) {
            $ifDuplicate->qty += 1;
            $ifDuplicate->sub_total += $produk->harga;
            $ifDuplicate->update();
        } else {
            detail_transaksi::create([
                'produks_id' => $id,
                'transaksis_id' => null,
                'users_id' => Auth::user()->id,
                'qty' => 1,
                'nama_produk' => $produk->nama_produk,
                'harga' => $produk->harga,
                'sub_total' => $produk->harga,
            ]);
        }

        return back()->with('success', 'Berhasil menambahkan ke keranjang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detail_transaksi  $detail_transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(detail_transaksi $detail_transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detail_transaksi  $detail_transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(detail_transaksi $detail_transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detail_transaksi  $detail_transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, detail_transaksi $detail_transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detail_transaksi  $detail_transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(detail_transaksi $detail_transaksi)
    {
        //
    }
}
