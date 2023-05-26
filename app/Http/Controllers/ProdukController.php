<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\produk;
use App\Models\kategori;
use App\Models\notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = produk::all();
        $id = Auth::id();
        $notifikasi = notifikasi::where('users_id', $id)->get();
        return view('pengusaha.produk.index', compact('produks','notifikasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $kategoris = kategori::all();
        $id = Auth::id();
        $notifikasi = notifikasi::where('users_id', $id)->get();
        return view('pengusaha.produk.create', compact('users', 'kategoris','notifikasi'));
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
            'jenis' => 'required',
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'status' => 'required',
            'rate' => 'required',
            // 'users_id' => 'required',
            'kategoris_id' => 'required',
            'foto' => 'required|image',
        ]);

        $userId = '5DXe1192';
        $fotoPath = $request->file('foto')->store('produk_images', 'public');

        produk::create([
            'jenis' => $request['jenis'],
            'nama_produk' => $request['nama_produk'],
            'deskripsi' => $request['deskripsi'],
            'foto' => $fotoPath,
            'harga' => $request['harga'],
            'stok' => $request['stok'],
            'status' => $request['status'],
            'rate' => $request['rate'],
            'users_id' => $userId,
            'kategoris_id' => $request['kategoris_id'],
        ]);


        return redirect()->route('produk.pengusaha')->with('success', 'Produk berhasil ditambahkan.');
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
        $kategoris = kategori::all();
        $users = User::all();
        $notifikasi = notifikasi::where('users_id', $id)->get();
        return view('pengusaha.produk.edit', compact('produk', 'users', 'kategoris','notifikasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'jenis' => 'required',
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'status' => 'required',
            'rate' => 'required',
            // 'users_id' => 'required',
            'kategoris_id' => 'required',
            'foto' => 'image',
        ]);

        produk::where('id', $id)->update([
            'jenis' => $validated['jenis'],
            'nama_produk' => $validated['nama_produk'],
            'deskripsi' => $validated['deskripsi'],
            'harga' => $validated['harga'],
            'stok' => $validated['stok'],
            'status' => $validated['status'],
            'rate' => $validated['rate'],
            'kategoris_id' => $validated['kategoris_id'],
        ]);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('produk_images', 'public');
            $validated['foto'] = $fotoPath;
        }

        return redirect()->route('produk.pengusaha')->with('success', 'Produk berhasil diperbarui.');
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
        $produk->delete();

        return redirect()->route('produk.pengusaha')->with('success', 'Produk berhasil dihapus.');
    }
}
