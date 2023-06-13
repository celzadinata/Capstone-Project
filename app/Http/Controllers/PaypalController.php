<?php

namespace App\Http\Controllers;

use App\Models\detail_transaksi;
use App\Models\produk;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Srmklive\PayPal\Services\PayPal as PaypalClient;

class PaypalController extends Controller
{
    public function success(Request $request)
    {
        $provider = new PaypalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        // dd($response);

        $id = 'TRX' . rand(1000000, 9999999);
        $cart_items = detail_transaksi::where(['transaksis_id' => null, 'users_id' => Auth::user()->id])->get();
        $total = 0;

        foreach ($cart_items as $item) {
            $product = produk::find($item->produks_id);
            $product->stok -= $item->qty;
            $item->transaksis_id = $id;
            $total += $item->sub_total;
            $product->update();
        }

        $transaksi = transaksi::create([
            'id' => $id,
            'user_id' => Auth::user()->id,
            'tanggal' => Date::now(),
            'total' => $total,
            'status' => 'Pembayaran Diterima',
            'bukti_pembayaran' => 'sad.pdf'
        ]);

        foreach ($cart_items as $item) {
            $item->update();
        }

        return redirect(route('keranjang.checkout'))->with('success', 'Berhasil membeli paket/usaha');
    }

    public function cancel(Request $request)
    {
        return redirect(route('keranjang.checkout'))->with('danger', 'terjadi kesalahan saat melakukan pembayaran');
    }
}
