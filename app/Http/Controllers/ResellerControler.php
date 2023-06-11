<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\lokasi;
use App\Models\produk;
use App\Models\review;
use App\Models\kategori;
use Illuminate\Http\Request;
use App\Models\detail_transaksi;
use App\Models\transaksi;
use Carbon\Carbon;
use Dompdf\Adapter\PDFLib;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use PDF;

class ResellerControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_kategori = kategori::paginate(5);
        $produk = produk::with('users')->get();
        return view('reseller.page_home', compact('list_kategori', 'produk'));
    }

    public function kategori()
    {
        $a = kategori::where('nama', 'LIKE', 'A%')->get();
        $b = kategori::where('nama', 'LIKE', 'B%')->get();
        $c = kategori::where('nama', 'LIKE', 'C%')->get();
        $d = kategori::where('nama', 'LIKE', 'D%')->get();
        $e = kategori::where('nama', 'LIKE', 'E%')->get();
        $f = kategori::where('nama', 'LIKE', 'F%')->get();
        $g = kategori::where('nama', 'LIKE', 'G%')->get();
        $h = kategori::where('nama', 'LIKE', 'H%')->get();
        $i = kategori::where('nama', 'LIKE', 'I%')->get();
        $j = kategori::where('nama', 'LIKE', 'J%')->get();
        $k = kategori::where('nama', 'LIKE', 'K%')->get();
        $l = kategori::where('nama', 'LIKE', 'L%')->get();
        $m = kategori::where('nama', 'LIKE', 'M%')->get();
        $n = kategori::where('nama', 'LIKE', 'N%')->get();
        $o = kategori::where('nama', 'LIKE', 'O%')->get();
        $p = kategori::where('nama', 'LIKE', 'P%')->get();
        $q = kategori::where('nama', 'LIKE', 'Q%')->get();
        $r = kategori::where('nama', 'LIKE', 'R%')->get();
        $s = kategori::where('nama', 'LIKE', 'S%')->get();
        $t = kategori::where('nama', 'LIKE', 'T%')->get();
        $u = kategori::where('nama', 'LIKE', 'U%')->get();
        $v = kategori::where('nama', 'LIKE', 'V%')->get();
        $w = kategori::where('nama', 'LIKE', 'W%')->get();
        $x = kategori::where('nama', 'LIKE', 'X%')->get();
        $y = kategori::where('nama', 'LIKE', 'Y%')->get();
        $z = kategori::where('nama', 'LIKE', 'Z%')->get();
        $list_kategori = kategori::paginate();
        return view('reseller.page_kategori', compact(
            'list_kategori',
            'a',
            'b',
            'c',
            'd',
            'e',
            'f',
            'g',
            'h',
            'i',
            'j',
            'k',
            'l',
            'm',
            'n',
            'o',
            'p',
            'q',
            'r',
            's',
            't',
            'u',
            'v',
            'w',
            'x',
            'y',
            'z',
        ));
    }

    public function produk_kategori($id)
    {
        $list_kategori = kategori::paginate(5);
        $kategori = kategori::find($id);
        $produk = produk::where('kategoris_id', $id)->get();
        return view('reseller.page_produk_kategori', compact('list_kategori', 'kategori', 'produk'));
    }

    public function produk()
    {
        $list_kategori = kategori::paginate(5);
        $produk = produk::with('users')->get();
        return view('reseller.page_produk', compact('list_kategori', 'produk'));
    }

    public function produk_detail($id)
    {
        $list_kategori = kategori::paginate(5);
        $produk = produk::find($id);
        $rating = review::where('produks_id', $id)
            ->select(DB::raw('AVG(rate) as average_rating'))
            ->pluck('average_rating')
            ->first();
        $nilai = review::where('produks_id', $id)->count();
        $review = review::where('produks_id', $id)->with('users')->get();
        $terjual = detail_transaksi::where('produks_id', $id)->count();
        // @dd($review);
        return view('reseller.page_produk_detail', compact('list_kategori', 'produk', 'rating', 'nilai', 'terjual', 'review'));
    }

    public function map()
    {
        $id = Auth::id();
        // $user_location = lokasi::where('users_id', $id)->get();
        $lokasi = lokasi::all();
        // @dd($user_location);
        return view('reseller.page_map', compact('lokasi'));
    }

    public function search(Request $request)
    {
        $list_kategori = kategori::paginate(5);
        $searchTerm = $request->input('search');
        $produk = produk::where('nama_produk', 'like', '%' . $searchTerm . '%')->get();

        return view('reseller.page_produk', compact('list_kategori', 'produk'));
    }

    public function profile()
    {
        $id = Auth::id();
        $user = User::find(Auth::user()->id);
        $list_kategori = kategori::paginate(5);
        return view('reseller.page_profile', compact('user', 'list_kategori'));
    }

    public function profile_update(Request $request)
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
        $reseller = User::find(Auth::user()->id);
        $reseller->nama_depan = $request->input('nama');
        $reseller->no_hp = $request->input('no_hp');
        // $reseller->jenis_kelamin = $request->input('jenisKelamin');
        $reseller->alamat = $request->input('alamat');
        if ($request->avatar) {
            $imgUrl = time() . '-' . Auth::user()->username . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('assets/users/' . Auth::user()->role . '/' . Auth::user()->id . '/avatar'), $imgUrl);
            $reseller->avatar = $imgUrl;
        }
        if ($request->password) {
            $reseller->password = Hash::make($request->input('password'));
        }
        if ($request->berkas) {
            $berkasUrl = time() . '-' . Auth::user()->username . '.' . $request->berkas->extension();
            $request->berkas->move(public_path('assets/users/' . Auth::user()->role . '/' . Auth::user()->id . '/berkasprofil'), $berkasUrl);
            $reseller->berkas = $berkasUrl;
        }
        $reseller->update();

        return back()->with('success', 'Berhasil mengubah informasi!');
    }

    public function indexPesanan()
    {
        $id = Auth::user()->id;
        $transaksi = transaksi::where('user_id', $id)->get();
        $transaksiModel = transaksi::whereHas('detail_transaksi', function ($query) use ($id) {
            $query->whereHas('produk', function ($query) use ($id) {
                $query->where('users_id', $id);
            });
        })->with('detail_transaksi.produk')->paginate(10);
        $list_kategori = kategori::paginate(5);
        return view('reseller.page_pesanan_saya', compact('list_kategori', 'transaksi', 'transaksiModel'));
    }
    public function invoice($id)
    {
        //GET DATA BERDASARKAN ID
        $transaksi = transaksi::with(['users', 'detail_transaksi'])->find($id);
        //LOAD PDF YANG MERUJUK KE VIEW PRINT.BLADE.PHP DENGAN MENGIRIMKAN DATA DARI INVOICE
        //KEMUDIAN MENGGUNAKAN PENGATURAN LANDSCAPE A4
        $pdf = PDF::loadView('reseller.page_struk', compact('transaksi'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
    public function konfirmasiPesanan(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required'
        ]);

        transaksi::where('id', $id)->update([
            'status' => $validated['status']
        ]);
        return redirect()->back()->with('success', 'Status berhasil diubah');
    }
}
