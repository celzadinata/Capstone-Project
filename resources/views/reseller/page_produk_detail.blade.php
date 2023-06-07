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

                    <div id="map"></div>

                    <div class="col-md-3 col-lg-8">
                        <a href="#" class="btn-resell"><i class="fa-solid fa-cart-shopping"
                                style="color: #ffffff;"></i> Masukkan Keranjang</a>
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
                @if ($review->isEmpty())
                    <h5 class="mt-2">Belum Ada Penilaian</h5>
                @else
                    @foreach ($review as $r)
                        <div class="row">
                            <div class="col-md-2 col-lg-1">
                                <img src="{{ asset('assets/img/reseller/paket/paket-adidas.jpg') }}" width="60px"
                                    style="border-radius:5px">
                            </div>
                            <div class="col-md-5 col-lg-7">
                                <h5>{{ $r->users->username }}</h5>
                                @if ($r->rate == 1)
                                    1 <i class="fa-solid fa-star" style="color: #CE3ABD;"></i>
                                @elseif($r->rate == 2)
                                    2 <i class="fa-solid fa-star" style="color: #CE3ABD;"></i><i class="fa-solid fa-star"
                                        style="color: #CE3ABD;"></i>
                                @elseif($r->rate == 3)
                                    3 <i class="fa-solid fa-star" style="color: #CE3ABD;"></i><i class="fa-solid fa-star"
                                        style="color: #CE3ABD;"></i><i class="fa-solid fa-star" style="color: #CE3ABD;"></i>
                                @elseif($r->rate == 4)
                                    4 <i class="fa-solid fa-star" style="color: #CE3ABD;"></i><i class="fa-solid fa-star"
                                        style="color: #CE3ABD;"></i><i class="fa-solid fa-star"
                                        style="color: #CE3ABD;"></i><i class="fa-solid fa-star" style="color: #CE3ABD;"></i>
                                @elseif($r->rate == 5)
                                    5 <i class="fa-solid fa-star" style="color: #CE3ABD;"></i><i class="fa-solid fa-star"
                                        style="color: #CE3ABD;"></i><i class="fa-solid fa-star"
                                        style="color: #CE3ABD;"></i><i class="fa-solid fa-star"
                                        style="color: #CE3ABD;"></i><i class="fa-solid fa-star" style="color: #CE3ABD;"></i>
                                @endif
                                <p>{{ $r->review }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <style>
                #content {
                    background-color: #fff;
                }
            </style>
        </div>
    </section>
    {{-- ./Paket Usaha --}}
    <script>
        function initMap() {     
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 15,
          center: { lat: -6.9806422, lng: 107.5860216 },
        })};
    </script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoNyOpCm5oQ4vlUSfaQX5_dDd06ZNGQR4&callback=initMap&libraries=&v=weekly"
      async
    ></script>
@endsection
