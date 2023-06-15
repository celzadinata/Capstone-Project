<?php

namespace App\Http\Livewire;

use App\Models\detail_transaksi;
use Livewire\Component;
use App\Models\review as reviews;
use App\Models\transaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Review extends Component
{
    public $produk_id;
    public $review;
    public $rating;
    public $pesan;
    public $checkIfExits;

    public function render()
    {
        $this->checkIfExits = '';
        if (Auth::check()) $this->checkIfExits = detail_transaksi::where(['users_id' => Auth::user()->id, 'produks_id' => $this->produk_id, 'reviewed' => 0, 'status' => 'Selesai'])->first();
        $rating = reviews::where('produks_id', $this->produk_id)
            ->select(DB::raw('AVG(rate) as average_rating'))
            ->pluck('average_rating')
            ->first();
        $this->review = reviews::where('produks_id', $this->produk_id)->with('users')->orderByDesc('created_at')->get();
        return view('livewire.review', compact('rating'));
    }

    public function reviewProduk()
    {
        $this->checkIfExits = detail_transaksi::where(['users_id' => Auth::user()->id, 'produks_id' => $this->produk_id, 'reviewed' => 0, 'status' => 'Selesai'])->first();
        if (!$this->checkIfExits) {
            session()->flash('message', 'Silahkan melakukan pembelian pada produk terlebih dahulu');
        } else {
            $validated = $this->validate([
                'rating' => 'required',
                'pesan' => 'required'
            ]);

            reviews::create([
                'users_id' => Auth::user()->id,
                'produks_id' => $this->produk_id,
                'rate' => $validated['rating'],
                'review' => $validated['pesan'],
                'review_status' => 'SudahReview'
            ]);
            $this->checkIfExits->reviewed = 1;
            $this->checkIfExits->update();
            $this->reset('rating');
            $this->reset('pesan');
        }
    }
}
