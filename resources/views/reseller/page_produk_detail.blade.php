@extends('layouts_reseller.app')
@section('title', 'Homepage')
@section('content')
    <style>
        #map {
            height: 100%;
        }
    </style>
    {{-- Paket Usaha --}}
    <section class="paket">
        <div class="container">
            {{-- <hr class="my-2 hr-paket opacity-100" data-aos="flip-right" data-aos-delay="100"> --}}
            <div class="row py-2" id="content">
                <div class="col-md-3 col-lg-5">
                    <img src="{{ asset('assets/img/reseller/paket/paket-adidas.jpg') }}" class="card-img-top" alt="...">
                </div>
                <div class="col-md-5 col-lg-7 pt-2">
                    <h4 class="title">{{ $produk->nama_produk }}</h4>
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
                    <div class="price p-4">
                        <h2>Rp {{ number_format($produk->harga, 0, '.', '.') }}</h2>
                    </div>

                    <div class="col-md-3 col-lg-8">
                        <a href="{{ route('map', $produk->id) }}" class="btn-resell"> Lihat Lokasi</a>
                    </div>
                    <div class="col-md-3 col-lg-8">

                        <a href="{{ route('keranjang.add', $produk->id) }}" class="btn-resell"><i
                                class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i> Masukkan Keranjang</a>
                    </div>
                    <div class="col-md-5 col-lg-2">
                        <a href="#" class="btn-resell">Resell</a>
                    </div>
                </div>
            </div>

            <style>
                .checked {
                    color: #CE3ABDe;
                }
            </style>

            <div class="description row py-2" id="content">
                <h4 class="title">Deskripsi</h4>
                <p class="isi">{{ $produk->deskripsi }}</p>
            </div>

            <div class="review row py-2" id="content">
                <h4>Penilaian Produk</h4>

                @livewire('review', ['produk_id' => $produk->id])

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
