<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        // Total paket usaha
        $paket = produk::where('users_id', $log)->where('jenis', 'paket_usaha')->count();
        // Total paket usaha
        $supply = produk::where('users_id', $log)->where('jenis', 'supply')->count();
        // Total transaksi
        $transaksi =  DB::table('transaksis')
            ->leftJoin('detail_transaksis', 'transaksis.id', '=', 'detail_transaksis.transaksis_id')
            ->leftJoin('produks', 'detail_transaksis.produks_id', '=', 'produks.id')
            ->where('produks.users_id', '=', $log)
            ->count();
        // Total Review
        $review = DB::table('reviews')
            ->leftJoin('produks', 'reviews.produks_id', '=', 'produks.id')
            ->where('produks.users_id', '=', $log)
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
            ->select(DB::raw('CAST(SUM(transaksis.total) as int) AS total_harga'), DB::raw('MONTH(transaksis.tanggal) as month'), DB::raw('YEAR(transaksis.tanggal) AS year'))
            ->leftJoin('detail_transaksis', 'transaksis.id', '=', 'detail_transaksis.transaksis_id')
            ->leftJoin('produks', 'detail_transaksis.produks_id', '=', 'produks.id')
            ->where('produks.users_id', $log)
            ->groupBy(DB::raw('MONTH(transaksis.tanggal)'), DB::raw('YEAR(transaksis.tanggal)'))
            ->pluck('total_harga');

        $bulan = transaksi::select(DB::raw("MONTHNAME(tanggal) as bulan"))
            ->orderByRaw("MONTH(tanggal)")
            ->groupBy(DB::raw("MONTHNAME(tanggal)"))
            ->pluck('bulan');

        $bulan_table = DB::table('transaksis')
            ->leftJoin('detail_transaksis', 'transaksis.id', '=', 'detail_transaksis.transaksis_id')
            ->leftJoin('produks', 'detail_transaksis.produks_id', '=', 'produks.id')
            ->select(DB::raw('count(*) as total_transactions, MONTH(transaksis.tanggal) as month, YEAR(transaksis.tanggal) as year, SUM(total) as total_price'))
            ->where('produks.users_id', '=', $log)
            ->groupBy('year', 'month')
            ->get();

        // Menginisialisasi array bulan, jumlah transaksi, dan total harga
        $months = [];
        $years = [];
        $transactionCounts = [];
        $totalPrices = [];

        foreach ($bulan_table as $transaction) {
            $monthName = Carbon::createFromFormat('!m', $transaction->month)->format('F');
            $months[] = $monthName;
            $years[] = $transaction->year;
            $transactionCounts[] = $transaction->total_transactions;
            $totalPrices[] = $transaction->total_price;
        }

        $notifikasi = notifikasi::where('users_id', $log)->get();
        $jml_notif = notifikasi::where('users_id', $log)->count();

        return view('pengusaha.laporan.index', compact('paket', 'supply', 'transaksi', 'review', 'total_harga', 'months', 'bulan', 'years', 'totalPrices', 'transactionCounts', 'notifikasi', 'jml_notif'));
    }
}
