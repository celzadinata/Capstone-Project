<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\review;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $review = review::where('produk_id',$id)->with('users')->get();
        // @dd($review);
        return view('reseller.page_produk_detail', compact('list_kategori', 'produk', 'review'));
    }
}
