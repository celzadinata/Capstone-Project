<?php

namespace App\Http\Livewire;

use App\Models\detail_transaksi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cart extends Component
{
    public $cart_item;
    public $subtotal, $qty, $total;
    public function render()
    {
        // $this->incrementQty(1);
        $this->cart_item = detail_transaksi::with('produk')->where(['transaksis_id'=> null, 'users_id' => Auth::user()->id])->get();
        $this->total = 0; 
        $this->subtotal[] = [];
        foreach ($this->cart_item as $key => $item) {
            $this->subtotal[$key] = $item->produk->harga * $item->qty;
            $this->total += $this->subtotal[$key];
        }
        return view('livewire.cart');
    }

    public function incrementQty($id){
        $cart = detail_transaksi::whereId($id)->first();
        $cart->qty += 1;
        $cart->sub_total += $cart->harga;
        $cart->save();
    }

    public function decrementQty($id){
        $cart = detail_transaksi::whereId($id)->first();
        if ($cart->qty > 1) {
            $cart->qty -= 1;
            $cart->sub_total -= $cart->harga;
        }
        $cart->save();
    }
    public function removeItem($id){
        $cart = detail_transaksi::whereId($id)->first();
        $cart->delete();
    }
}
