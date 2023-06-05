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
        $id = Auth::id();
        $produks = produk::where('users_id', $id)->get();
        $notifikasi = notifikasi::where('users_id', $id)->get();
        $jml_notif = notifikasi::where('users_id', $id)->count();
        return view('pengusaha.produk.index', compact('produks', 'notifikasi', 'jml_notif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function jenis()
    {
        $id = Auth::id();
        $notifikasi = notifikasi::where('users_id', $id)->get();
        $jml_notif = notifikasi::where('users_id', $id)->count();
        return view('pengusaha.produk.jenis', compact('notifikasi', 'jml_notif'));
    }

    public function create(Request $request)
    {
        $users = User::all();
        $id = Auth::id();
        $notifikasi = notifikasi::where('users_id', $id)->get();
        $jml_notif = notifikasi::where('users_id', $id)->count();

        $jenis = $request->input('rad');

        if ($jenis == 'paket_usaha') {
            $kategoris = kategori::all();
            return view('pengusaha.produk.create', compact('users', 'kategoris', 'notifikasi', 'jml_notif', 'jenis'));
        } elseif ($jenis == 'supply') {
            $kategoris = kategori::all();
            return view('pengusaha.produk.create', compact('users', 'kategoris', 'notifikasi', 'jml_notif', 'jenis'));
        } else {
            abort(404);
        }
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
            // 'status' => 'required',
            // 'rate' => 'required',
            'kategoris_id' => 'required',
            'berkas1' => 'mimes:pdf,doc,docx',
            'berkas2' => 'mimes:pdf,doc,docx',
            'berkas3' => 'mimes:pdf,doc,docx',
            'foto' => 'mimes:jpg,jpeg,png|max:2048'
        ]);

        $imgUrl = '';
        if ($request->foto) {
            $imgUrl = time() . '-' . $request->nama_produk . '.' . $request->foto->extension();
            $request->foto->move(public_path('user'), $imgUrl);
        }

        // $fotoPath = $request->file('foto')->store('produk_images', 'public');

        $berkas1Url = '';
        if ($request->hasFile('berkas1')) {
            $berkas1Url = time() . '-' . $request->nama_produk . '-berkas1.' . $request->file('berkas1')->getClientOriginalExtension();
            $request->file('berkas1')->move(public_path('user'), $berkas1Url);
        }

        $berkas2Url = '';
        if ($request->hasFile('berkas2')) {
            $berkas2Url = time() . '-' . $request->nama_produk . '-berkas2.' . $request->file('berkas2')->getClientOriginalExtension();
            $request->file('berkas2')->move(public_path('user'), $berkas2Url);
        }

        $berkas3Url = '';
        if ($request->hasFile('berkas3')) {
            $berkas3Url = time() . '-' . $request->nama_produk . '-berkas3.' . $request->file('berkas3')->getClientOriginalExtension();
            $request->file('berkas3')->move(public_path('user'), $berkas3Url);
        }

        $user = Auth::user();
        $userId = $user->id;

        produk::create([
            'jenis' => $request['jenis'],
            'nama_produk' => $request['nama_produk'],
            'deskripsi' => $request['deskripsi'],
            'harga' => $request['harga'],
            'stok' => $request['stok'],
            // 'status' => $request['status'],
            // 'rate' => $request['rate'],
            'users_id' => $userId,
            'kategoris_id' => $request['kategoris_id'],
            'berkas_1' => $berkas1Url,
            'berkas_2' => $berkas2Url,
            'berkas_3' => $berkas3Url,
            'foto' => $imgUrl,
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
        $id = Auth::id();
        $notifikasi = notifikasi::where('users_id', $id)->get();
        $jml_notif = notifikasi::where('users_id', $id)->count();
        return view('pengusaha.produk.edit', compact('produk', 'users', 'kategoris', 'notifikasi', 'jml_notif'));
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
            'users_id' => 'required',
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
