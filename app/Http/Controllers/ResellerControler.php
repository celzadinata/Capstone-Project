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
        $banner = produk::paginate(2);
        $produk = produk::with('users')->get();
        return view('reseller.page_home', compact('list_kategori', 'banner', 'produk'));
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

    public function produk_kategori(Request $request, $slug)
    {
        $list_kategori = kategori::paginate(5);
        $kategori = kategori::where('slug', $slug)->first();
        $sort = $request->input('sort');

        $produk = produk::where('kategoris_id', $kategori->id)
            ->when($sort, function ($query) use ($sort) {
                switch ($sort) {
                    case 'termahal':
                        $query->orderByDesc('harga');
                        break;
                    case 'termurah':
                        $query->orderBy('harga');
                        break;
                    case 'terbaru':
                        $query->orderByDesc('created_at');
                        break;
                    case 'acak':
                        $query->inRandomOrder();
                        break;
                    default:
                        // Default sorting option
                        $query->orderBy('nama_produk');
                        break;
                }
            })
            ->get();

        return view('reseller.page_produk_kategori', compact('list_kategori', 'kategori', 'produk', 'sort'));
    }


    public function paket_usaha(Request $request)
    {
        $list_kategori = kategori::paginate(5);
        $sort = $request->input('sort');

        $paket = produk::with('users')
            ->where('jenis', 'paket_usaha')
            ->when($sort, function ($query) use ($sort) {
                switch ($sort) {
                    case 'termahal':
                        $query->orderByDesc('harga');
                        break;
                    case 'termurah':
                        $query->orderBy('harga');
                        break;
                    case 'terbaru':
                        $query->orderByDesc('created_at');
                        break;
                    case 'acak':
                        $query->inRandomOrder();
                        break;
                    default:
                        // Default sorting option
                        $query->orderBy('nama_produk');
                        break;
                }
            })
            ->get();

        return view('reseller.page_paket_usaha', compact('list_kategori', 'paket', 'sort'));
    }


    public function supply(Request $request)
    {
        $list_kategori = kategori::paginate(5);
        $sort = $request->input('sort');

        $supply = produk::with('users')
            ->where('jenis', 'supply')
            ->when($sort, function ($query) use ($sort) {
                switch ($sort) {
                    case 'termahal':
                        $query->orderByDesc('harga');
                        break;
                    case 'termurah':
                        $query->orderBy('harga');
                        break;
                    case 'terbaru':
                        $query->orderByDesc('created_at');
                        break;
                    case 'acak':
                        $query->inRandomOrder();
                        break;
                    default:
                        // Default sorting option
                        $query->orderBy('nama_produk');
                        break;
                }
            })
            ->get();

        return view('reseller.page_supply', compact('list_kategori', 'supply', 'sort'));
    }


    public function produk_detail($slug)
    {
        $list_kategori = Kategori::paginate(5);

        $produk = Produk::where('slug', $slug)->first();

        if ($produk) {
            if ($produk->trashed()) {
                $produk = Produk::withTrashed()->where('slug', $slug)->first();
            }
        } else {
            // Produk tidak ditemukan
        }


        $rating = Review::where('produks_id', $produk->id)
            // ->withTrashed() // Menampilkan review yang telah dihapus juga
            ->select(DB::raw('AVG(rate) as average_rating'))
            ->pluck('average_rating')
            ->first();

        $nilai = Review::where('produks_id', $produk->id)
            // ->withTrashed() // Menampilkan review yang telah dihapus juga
            ->count();

        $terjual = detail_transaksi::where('produks_id', $produk->id)->count();

        return view('reseller.page_produk_detail', compact('list_kategori', 'produk', 'rating', 'nilai', 'terjual'));
    }

    public function search_paketusaha(Request $request)
    {
        $list_kategori = kategori::paginate(5);
        $searchTerm = $request->input('search');
        $paket = produk::where('nama_produk', 'like', '%' . $searchTerm . '%')->get();

        return view('reseller.page_paket_usaha', compact('list_kategori', 'paket'));
    }

    public function search_supply(Request $request)
    {
        $list_kategori = kategori::paginate(5);
        $searchTerm = $request->input('search');
        $supply = produk::where('nama_produk', 'like', '%' . $searchTerm . '%')->get();

        return view('reseller.page_supply', compact('list_kategori', 'supply'));
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
        $reseller->latitude = $request->input('latitude');
        $reseller->longitude = $request->input('longitude');
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
        $filename = "YokResell-$id";

        return $pdf->download($filename);
    }
    public function konfirmasiPesanan(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required'
        ]);

        transaksi::where('id', $id)->update([
            'status' => $validated['status']
        ]);
        $cart_items = detail_transaksi::where(['users_id' => Auth::user()->id, 'transaksis_id' => $id])->get();
        foreach ($cart_items as $key => $item) {
            $item->status = $validated['status'];
            $item->update();
        }
        return redirect()->back()->with('success', 'Status berhasil diubah');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'mimes:jpg,jpeg,png,pdf'
        ]);

        $id = Auth::user();

        $imgUrl = '';
        if ($request->bukti_pembayaran) {
            $imgUrl = time() . '-' . $id->username . '.' . $request->bukti_pembayaran->extension();
            $request->bukti_pembayaran->move(public_path('assets/users/reseller/' . $id->id), $imgUrl);
        }

        transaksi::where('id', $request->input('id'))->update([
            'bukti_pembayaran' => $imgUrl,
        ]);
        return redirect()->back()->with('success', 'Upload berhasil');
    }
}
