<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonfirmasiPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = produk::where('jenis', 'paket_usaha')->with('users')->paginate(8);
        return view('admin.konfirmasi_paket.index', compact('produk'));
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
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = produk::find($id);
        return view('admin.konfirmasi_paket.confirm', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, produk $id)
    {
        $request->validate([
            'status'     => 'required',
            'produks_id'     => 'required',
            'users_id'     => 'required',
        ]);

        notifikasi::create([
            'produks_id' => $request->produks_id,
            'users_id' => $request->users_id,
            'judul' => 'Konfirmasi',
            'pesan' => 'Produk Sudah Dikonfirmasi!',
        ]);

        $id->update($request->all());
        return redirect()->route('konfirmasi.admin')->with('success', 'Berhasil Mengkonfirmasi Produk!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = produk::find($id);
        $notif = notifikasi::where('produks_id', $id)->get();

        if ($produk->berkas_1) {
            $berkas1Path = public_path('assets/users/pengusaha/' . $produk->users_id . '/berkas/' . $produk->berkas_1);
            if (file_exists($berkas1Path)) {
                unlink($berkas1Path);
            }
        }
        if ($produk->berkas_2) {
            $berkas2Path = public_path('assets/users/pengusaha/' . $produk->users_id . '/berkas/' . $produk->berkas_2);
            if (file_exists($berkas2Path)) {
                unlink($berkas2Path);
            }
        }
        if ($produk->berkas_3) {
            $berkas3Path = public_path('assets/users/pengusaha/' . $produk->users_id . '/berkas/' . $produk->berkas_3);
            if (file_exists($berkas3Path)) {
                unlink($berkas3Path);
            }
        }
        if ($produk->foto) {
            $fotoPath = public_path('assets/users/pengusaha/' . $produk->users_id . '/' . $produk->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        $produk->delete();
        foreach ($notif as $item) {
            $item->delete();
        };

        return redirect()->route('user.admin')->with('success', 'Produk berhasil dihapus.');
    }
}
