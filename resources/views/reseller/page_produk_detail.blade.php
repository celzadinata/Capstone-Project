@extends('layouts_reseller.app')
@section('title', 'Homepage')
@section('content')
    {{-- Paket Usaha --}}
    <section class="paket">
        <div class="container">
            {{-- <hr class="my-2 hr-paket opacity-100" data-aos="flip-right" data-aos-delay="100"> --}}
            <div class="row py-2" id="content">
                <div class="col-md-3 col-lg-5" data-aos="zoom-in" data-aos-delay="100">
                    <img src="{{ asset('assets/img/reseller/paket/paket-adidas.jpg') }}" class="card-img-top" alt="...">
                </div>
                <div class="col-md-5 col-lg-7 pt-2">
                    <h4>{{ $produk->nama_produk }}</h4>
                    @if ($produk->rate == 1)
                        1 <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                    @elseif($produk->rate == 2)
                        2 <i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star"
                            style="color: #ffea00;"></i>
                    @elseif($produk->rate == 3)
                        3 <i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star"
                            style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i>
                    @elseif($produk->rate == 4)
                        4 <i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star"
                            style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i
                            class="fa-solid fa-star" style="color: #ffea00;"></i>
                    @elseif($produk->rate == 5)
                        5 <i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star"
                            style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i
                            class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star"
                            style="color: #ffea00;"></i>
                    @endif
                    <div class="p-4">
                        <h2>Rp {{ number_format($produk->harga, 0, '.', '.') }}</h2>
                    </div>
                    <div class="col-md-3 col-lg-8">
                        <a href="#" class="btn-resell"><i class="fa-solid fa-cart-shopping"
                                style="color: #ffffff;"></i> Masukkan Keranjang</a>
                    </div>
                    <div class="col-md-5 col-lg-2">
                        <a href="#" class="btn-resell">Resell</a>
                    </div>
                </div>
            </div>

            <div class="row py-2" id="content">
                <h4>Deskripsi</h4>
                <p>{{ $produk->deskripsi }}</p>
            </div>

            <div class="row py-2" id="content">
                <h4>Penilaian Produk</h4>
                @if ($review->isEmpty())
                    <h5 class="mt-2">Belum Ada Penilaian</h5>
                @else
                    @foreach ($review as $r)
                        <div class="col-md-2 col-lg-1">
                            <img src="{{ asset('assets/img/reseller/paket/paket-adidas.jpg') }}" width="40px"
                                style="border-radius:20px">
                        </div>
                        <div class="col-md-5 col-lg-7 pt-2">
                            <h5>{{ $r->users->username }}</h5>
                            @if ($r->rate == 1)
                                1 <i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            @elseif($r->rate == 2)
                                2 <i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star"
                                    style="color: #ffea00;"></i>
                            @elseif($r->rate == 3)
                                3 <i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star"
                                    style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i>
                            @elseif($r->rate == 4)
                                4 <i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star"
                                    style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i
                                    class="fa-solid fa-star" style="color: #ffea00;"></i>
                            @elseif($r->rate == 5)
                                5 <i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star"
                                    style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i
                                    class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star"
                                    style="color: #ffea00;"></i>
                            @endif
                            <p>{{ $r->review }}</p>
                    @endforeach
                @endif
            </div>
        </div>

        <style>
            #content {
                background-color: #fff;
            }
        </style>
        </div>
    </section>
    {{-- ./Paket Usaha --}}
@endsection
