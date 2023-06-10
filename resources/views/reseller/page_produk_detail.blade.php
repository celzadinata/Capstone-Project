@extends('layouts_reseller.app')
@section('title', 'Detail Produk')
@section('content')
    <style>
        #map {
            height: 100%;
        }
    </style>
    {{-- Detail Produk --}}
    <section class="detail-produk">
        <div class="container">
            <hr class="my-2 hr-detail opacity-100" data-aos="flip-right" data-aos-delay="100">
            <div class="card my-4" data-aos="zoom-in">
                <div class="row row-cols-1 row-cols-md-4 g-0">
                    <div class="col-md-5">
                        <img src="{{ asset('assets/img/reseller/paket/paket-adidas.jpg') }}" class="img-fluid"
                            alt="...">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body px-5">
                            <h3>{{ $produk->nama_produk }}</h3>
                            <table>
                                <tbody id="text_konfirmasi_user">
                                    <tr>
                                        <td>
                                            @if ($rating == null)
                                                0
                                            @else
                                                <u>{{ str_replace('...', '', Str::limit($rating, 3)) }}</u>
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $rating)
                                                        <i class="fa fa-star checked"></i>
                                                    @endif
                                                @endfor
                                            @endif
                                        </td>
                                        <td>&nbsp|&nbsp</td>
                                        <td>{{ $nilai }} Penilaian</td>
                                        <td>&nbsp|&nbsp</td>
                                        <td>{{ $terjual }} Terjual</td>
                                    </tr>
                                </tbody>
                            </table>
                            <h4>Rp {{ number_format($produk->harga, 0, '.', '.') }}</h4>
                            <div class="row align-items-center">
                                <div class="col-auto mb-3">
                                    <a href="#" class="btn-cart"><i class="fas fa-cart-plus"></i> Masukkan
                                        Keranjang</a>
                                </div>
                                <div class="col-auto mb-3">
                                    <a href="#" class="btn-resell">Resell</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="description mb-4" id="content" data-aos="fade-right">
                <div class="row py-3 px-4">
                    <h3>Deskripsi</h3>
                    <p>{{ $produk->deskripsi }}</p>
                </div>
            </div>

            <div class="review mb-4" id="content" data-aos="fade-left">
                <div class="row py-3 px-4">
                    <h3>Penilaian Produk</h3>
                    @if ($review->isEmpty())
                        <h5 class="mt-2">Belum Ada Penilaian</h5>
                    @else
                        @foreach ($review as $r)
                            <div class="col-md-2 col-lg-auto">
                                <img src="{{ asset('assets/img/reseller/paket/paket-adidas.jpg') }}" width="40px"
                                    style="border-radius:20px">
                            </div>
                            <div class="col-md-5 col-lg-auto">
                                <h4>{{ $r->users->username }}</h4>
                                <h6>
                                    @if ($r->rate == 1)
                                        <i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i
                                            class="far fa-star"></i><i class="far fa-star"></i>
                                    @elseif($r->rate == 2)
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i
                                            class="far fa-star"></i><i class="far fa-star"></i>
                                    @elseif($r->rate == 3)
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="far fa-star"></i><i class="far fa-star"></i>
                                    @elseif($r->rate == 4)
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="far fa-star"></i>
                                    @elseif($r->rate == 5)
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i>
                                    @endif
                                </h6>
                                <p>{{ $r->review }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    {{-- ./Detail Produk --}}
@endsection
