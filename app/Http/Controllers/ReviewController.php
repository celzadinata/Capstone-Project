<?php

namespace App\Http\Controllers;

use App\Models\review;
use App\Models\User;
use App\Models\produk;
use App\Models\notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $log = Auth::id();
        // $reviews = review::with('User','produk')->where('reviews.users_id','=',$log)->join('produks', 'reviews.produk_id', '=', 'produks.id')->get();
        // dd($reviews);
        // return view('pengusaha.review.index', compact( 'reviews'));

        $log = Auth::id();
        $notifikasi = notifikasi::where('users_id', $log)->get();
        $reviews = Review::with('users', 'produk')
        ->select('reviews.id as review_id', 'produks.id as produk_id', 'reviews.*')
        ->join('produks', 'reviews.produks_id', '=', 'produks.id')
        ->where('produks.users_id','=',  DB::raw("'$log'"))
        ->get();

        $notifikasi = notifikasi::where('users_id', $log)->get();
        $jml_notif = notifikasi::where('users_id', $log)->count();

        return view('pengusaha.review.index', compact('reviews','notifikasi','jml_notif'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'reply' => 'nullable'
        ]);

        review::where('id', $id)->update([
            'reply' => $validated['reply']
        ]);
        return redirect()->route('review.pengusaha')->with('success', 'Komentar berhasil ditambahkan.');

        // $validated = $request->validate([
        //     'reply' => 'nullable'
        // ]);

        // $review = review::findOrFail($id);
        // $review->reply = $validated['reply'];
        // $review->save();

        // return redirect()->route('review.pengusaha')->with('success', 'Komentar berhasil ditambahkan.');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(review $review)
    {
        //
    }
}
