<?php

namespace App\Http\Livewire;

use App\Models\detail_transaksi;
use App\Models\produk;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class Cart extends Component
{
    public $cart_item;
    public $subtotal, $qty, $total;
    public function render()
    {
        // $this->incrementQty(1);
        $this->cart_item = detail_transaksi::with('produk')->where(['transaksis_id' => null, 'users_id' => Auth::user()->id])->get();
        $this->total = 0;
        $this->subtotal[] = [];
        foreach ($this->cart_item as $key => $item) {
            $this->subtotal[$key] = $item->produk->harga * $item->qty;
            $this->total += $this->subtotal[$key];
        }
        return view('livewire.cart');
    }

    public function incrementQty($id)
    {
        $cart = detail_transaksi::whereId($id)->first();
        $cart->qty += 1;
        $cart->sub_total += $cart->harga;
        $cart->save();
    }

    public function decrementQty($id)
    {
        $cart = detail_transaksi::whereId($id)->first();
        if ($cart->qty > 1) {
            $cart->qty -= 1;
            $cart->sub_total -= $cart->harga;
        }
        $cart->save();
    }

    public function removeItem($id)
    {
        $cart = detail_transaksi::whereId($id)->first();
        $cart->delete();
    }

    public function checkout()
    {
        $id = 'TRX' . rand(1000000, 9999999);
        $cart_items = detail_transaksi::where(['transaksis_id' => null, 'users_id' => Auth::user()->id])->get();

        foreach ($cart_items as $keyy => $itemm) {
            $product = produk::find($itemm->produks_id);
            $validation = produk::find($itemm->produks_id);
            if ($product->stok < $itemm->qty) {
                alert()->error('Ada produk yang kekurangan stok, silahkan cek kembali persediaan produk');
                return redirect(route('keranjang'));
            }
        }

        $purchase_units = [];
        $email = null;
        foreach ($cart_items as $item) {
            $product = produk::with('users')->find($item->produks_id)->first();
            $email = $product->users->paypal_email;
            if ($product->stok >= $item->qty) {
                $provider = new PayPalClient([]);
                $token = $provider->getAccessToken();
                $provider->setAccessToken($token);
                foreach ($this->cart_item as $key => $item) {
                    $purchase_units[$key]["reference_id"] = "REFID-" . $key;
                    $purchase_units[$key]["amount"]["currency_code"] = "USD";
                    $purchase_units[$key]["amount"]["value"] = sprintf(sprintf("%.2f", $this->toUsd($item->produk->harga)) * $item->qty);
                    $purchase_units[$key]["amount"]["breakdown"]["item_total"]["currency_code"] = "USD";
                    $purchase_units[$key]["amount"]["breakdown"]["item_total"]["value"] = sprintf(sprintf("%.2f", $this->toUsd($item->produk->harga)) * $item->qty);
                    $purchase_units[$key]["payee"]["email_address"] = $email;
                    $purchase_units[$key]["payee_display_metadata"]["brand_name"] = $item->produk->nama_produk;
                    $purchase_units[$key]["items"][] = [
                        "name" => $item->produk->nama_produk,
                        "description" => $item->produk->jenis,
                        "sku" => $item->produk->id,
                        "unit_amount" => [
                            "currency_code" => "USD",
                            "value" => sprintf("%.2f", $this->toUsd($item->produk->harga))
                        ],
                        "quantity" => $item->qty
                    ];
                }
                // dd($purchase_units);
                $order = $provider->createOrder([
                    "intent" => "CAPTURE",
                    "purchase_units" => $purchase_units,
                    "application_context" => [
                        'cancel_url' => route('payment.cancel'),
                        'return_url' => route('payment.success'),
                        'brand_name' => 'YokResell'
                    ]
                ]);
                // dd($order);
                return redirect($order['links'][1]['href']);
            } else {
                alert()->error('Ada produk yang kekurangan stok, silahkan cek kembali persediaan produk');
                return redirect(route('keranjang'));
            }
            $email = null;
        }
    }

    public function toUsd($nominal)
    {
        return $nominal / 15000;
    }
}
