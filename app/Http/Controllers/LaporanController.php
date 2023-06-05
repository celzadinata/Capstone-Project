<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\produk;
use App\Models\transaksi;
use App\Models\notifikasi;
use Illuminate\Http\Request;
use App\Models\detail_transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class LaporanController extends Controller
{
    public function index()
    {
        $log = Auth::id();

        // Total produk
        $produk = produk::where('users_id', $log)->count();
        // Total transaksi
        $transaksi = DB::table('detail_transaksis')
            ->leftJoin('produks', 'produks.id', '=', 'detail_transaksis.produks_id')
            ->where('produks.users_id', $log)
            ->groupBy('detail_transaksis.transaksis_id')
            ->count();


        // Untuk laporan chart
        // Total untuk grafik
        $count = DB::table('transaksis')
            ->select(DB::raw('CAST(SUM(transaksis.total/2) as int) AS total_harga'), DB::raw('MONTH(transaksis.tanggal) as month'))
            ->leftJoin('detail_transaksis', 'transaksis.id', '=', 'detail_transaksis.transaksis_id')
            ->leftJoin('produks', 'detail_transaksis.produks_id', '=', 'produks.id')
            ->where('produks.users_id', $log)
            ->groupBy(DB::raw('MONTH(transaksis.tanggal)'))
            ->count();

        $total_harga = DB::table('transaksis')
            ->select(DB::raw('CAST(SUM(transaksis.total/' . $count . ') as int) AS total_harga'), DB::raw('MONTH(transaksis.tanggal) as month'), DB::raw('DATE_FORMAT(transaksis.tanggal, "%Y") AS year'))
            ->leftJoin('detail_transaksis', 'transaksis.id', '=', 'detail_transaksis.transaksis_id')
            ->leftJoin('produks', 'detail_transaksis.produks_id', '=', 'produks.id')
            ->where('produks.users_id', $log)
            ->groupBy(DB::raw('MONTH(transaksis.tanggal)'), 'tanggal')
            ->get()
            ->pluck('total_harga');
        // dd($total_harga);

        $tanggal = DB::table('transaksis')
            ->select(DB::raw('MONTHNAME(transaksis.tanggal) as bulan'), DB::raw('YEAR(transaksis.tanggal) as tahun'))
            ->leftJoin('detail_transaksis', 'transaksis.id', '=', 'detail_transaksis.transaksis_id')
            ->leftJoin('produks', 'detail_transaksis.produks_id', '=', 'produks.id')
            ->where('produks.users_id', $log)
            ->groupBy('bulan', 'tahun')
            ->get();

        $bulan = transaksi::select(DB::raw("MONTHNAME(tanggal) as bulan"))
            ->orderByRaw("MONTH(tanggal)")
            ->groupBy(DB::raw("MONTHNAME(tanggal)"))
            ->pluck('bulan');

        $notifikasi = notifikasi::where('users_id', $log)->get();

        return view('pengusaha.laporan.index', compact('produk', 'transaksi', 'total_harga', 'tanggal', 'bulan','notifikasi'));
    }
}
