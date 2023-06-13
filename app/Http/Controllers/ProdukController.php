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
        if (!Auth::user()->paypal_email) {
            return redirect(route('pengusaha.profile'))->with('warning', 'Silahkan isi Paypal email di profile terlebih dahulu');
        }
        $id = Auth::id();
        $produks = produk::where('users_id', $id)->paginate(4);
        $notifikasi = notifikasi::where('users_id', $id)->get();
        $jml_notif = notifikasi::where('users_id', $id)->count();

        $title = 'Hapus Produk!';
        $text = "Apakah Anda Ingin Menghapus Produk?";
        confirmDelete($title, $text);
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
            'berkas1' => 'mimes:pdf,doc,docx|max:8048',
            'berkas2' => 'mimes:pdf,doc,docx|max:8048',
            'berkas3' => 'mimes:pdf,doc,docx|max:8048',
            'foto' => 'mimes:jpg,jpeg,png|max:2048'
        ]);

        $id = Auth::id();

        $imgUrl = '';
        if ($request->foto) {
            $imgUrl = time() . '-' . $request->nama_produk . '.' . $request->foto->extension();
            $request->foto->move(public_path('assets/users/pengusaha/' . $id), $imgUrl);
        }

        // $fotoPath = $request->file('foto')->store('produk_images', 'public');

        $berkas1Url = '';
        if ($request->hasFile('berkas1')) {
            $berkas1Url = time() . '-' . $request->nama_produk . '-berkas1.' . $request->file('berkas1')->getClientOriginalExtension();
            $request->file('berkas1')->move(public_path('assets/users/pengusaha/' . $id . '/berkas'), $berkas1Url);
        }

        $berkas2Url = '';
        if ($request->hasFile('berkas2')) {
            $berkas2Url = time() . '-' . $request->nama_produk . '-berkas2.' . $request->file('berkas2')->getClientOriginalExtension();
            $request->file('berkas2')->move(public_path('assets/users/pengusaha/' . $id . '/berkas'), $berkas2Url);
        }

        $berkas3Url = '';
        if ($request->hasFile('berkas3')) {
            $berkas3Url = time() . '-' . $request->nama_produk . '-berkas3.' . $request->file('berkas3')->getClientOriginalExtension();
            $request->file('berkas3')->move(public_path('assets/users/pengusaha/' . $id . '/berkas'), $berkas3Url);
        }

        $user = Auth::user();
        $userId = $user->id;

        produk::create([
            'jenis' => $request['jenis'],
            'nama_produk' => $request['nama_produk'],
            'deskripsi' => $request['deskripsi'],
            'harga' => $request['harga'],
            'stok' => $request['stok'],
            'status' => 'Belum Konfirmasi',
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
        $id = Auth::user();
        $notifikasi = notifikasi::where('users_id', $id)->get();
        $jml_notif = notifikasi::where('users_id', $id)->count();
        $jenis = ''; // Define an empty variable for $jenis

        // $uploadedFile1 = asset('assets/users/pengusaha/' . $id->id . '/berkas/' . $prod->berkas1);
        // $uploadedFile2 = asset('assets/users/pengusaha/' . $id->id . '/berkas/' . $id->berkas2);
        // $uploadedFile3 = asset('assets/users/pengusaha/' . $id->id . '/berkas/' . $id->berkas3);
        // return view('edit', compact('produk', 'uploadedFile1', 'uploadedFile2', 'uploadedFile3'));

        if ($produk->jenis == 'paket_usaha') {
            $jenis = 'paket_usaha';
        } elseif ($produk->jenis == 'supply') {
            $jenis = 'supply';
        } else {
            abort(404);
        }

        return view('pengusaha.produk.edit', compact('produk', 'kategoris', 'notifikasi', 'jml_notif', 'jenis'));
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
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'kategoris_id' => 'required',
            'berkas1' => 'mimes:pdf,doc,docx|max:8048',
            'berkas2' => 'mimes:pdf,doc,docx|max:8048',
            'berkas3' => 'mimes:pdf,doc,docx|max:8048',
            'foto' => 'mimes:jpg,jpeg,png|max:2048'
        ]);

        $produk = Produk::findOrFail($id);
        $produk->nama_produk = $request->input('nama_produk');
        $produk->deskripsi = $request->input('deskripsi');
        $produk->harga = $request->input('harga');
        $produk->stok = $request->input('stok');
        $produk->kategoris_id = $request->input('kategoris_id');

        $id = Auth::id();

        if ($request->hasFile('foto')) {
            // Delete previous foto file
            if ($produk->foto && file_exists(public_path('assets/users/pengusaha/' . $id . '/' . $produk->foto))) {
                unlink(public_path('assets/users/pengusaha/' . $id . '/' . $produk->foto));
            }

            $fotoUrl = time() . '-' . $produk->nama_produk . '.' . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->move(public_path('assets/users/pengusaha/' . $id), $fotoUrl);
            $produk->foto = $fotoUrl;
        }

        if ($request->hasFile('berkas1')) {
            // Delete previous berkas1 file
            if ($produk->berkas_1 && file_exists(public_path('assets/users/pengusaha/' . $id . '/berkas/' . $produk->berkas_1))) {
                unlink(public_path('assets/users/pengusaha/' . $id . '/berkas/' . $produk->berkas_1));
            }

            $berkas1Url = time() . '-' . $produk->nama_produk . '-berkas1.' . $request->file('berkas1')->getClientOriginalExtension();
            $request->file('berkas1')->move(public_path('assets/users/pengusaha/' . $id . '/berkas'), $berkas1Url);
            $produk->berkas_1 = $berkas1Url;
        }

        if ($request->hasFile('berkas2')) {
            // Delete previous berkas2 file
            if ($produk->berkas_2 && file_exists(public_path('assets/users/pengusaha/' . $id . '/berkas/' . $produk->berkas_2))) {
                unlink(public_path('assets/users/pengusaha/' . $id . '/berkas/' . $produk->berkas_2));
            }

            $berkas2Url = time() . '-' . $produk->nama_produk . '-berkas2.' . $request->file('berkas2')->getClientOriginalExtension();
            $request->file('berkas2')->move(public_path('assets/users/pengusaha/' . $id . '/berkas'), $berkas2Url);
            $produk->berkas_2 = $berkas2Url;
        }

        if ($request->hasFile('berkas3')) {
            // Delete previous berkas3 file
            if ($produk->berkas_3 && file_exists(public_path('assets/users/pengusaha/' . $id . '/berkas/' . $produk->berkas_3))) {
                unlink(public_path('assets/users/pengusaha/' . $id . '/berkas/' . $produk->berkas_3));
            }

            $berkas3Url = time() . '-' . $produk->nama_produk . '-berkas3.' . $request->file('berkas3')->getClientOriginalExtension();
            $request->file('berkas3')->move(public_path('assets/users/pengusaha/' . $id . '/berkas'), $berkas3Url);
            $produk->berkas_3 = $berkas3Url;
        }

        $produk->save();

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

        return redirect()->route('produk.pengusaha')->with('success', 'Produk berhasil dihapus.');
    }

    public function update_tampilan(Request $request, produk $id)
    {
        $request->validate([
            'tampilkan'     => 'required',
        ]);
        // $produk = produk::find($id);
        $id->update($request->all());
        return redirect()->route('produk.pengusaha')->with('success', 'Berhasil Merubah tampilan Produk!');
        // if ($produk->tampilkan == 0) {
        //     $id->update($request->all());
        //     return redirect()->route('produk.pengusaha')->with('success', 'Berhasil Menampilkan Produk!');
        // } else {
        //     $id->update($request->all());
        //     return redirect()->route('produk.pengusaha')->with('success', 'Berhasil Menampilkan Produk!');
        // }
    }
}
