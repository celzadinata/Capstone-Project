@extends('layouts_reseller.app')
@section('title', 'Homepage')
@section('content')
    {{-- Banner --}}
    <div id="myCarousel" class="carousel slide mt-2" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 0"
                aria-current="true"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 1"
                class=""></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 2"
                class=""></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active"  data-bs-interval="4000">
                <img class="d-block w-100 img-fluid" src="{{ asset('assets/img/icon/bg_yokresell.jpg') }}" alt="slide 0">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Yok Resell</h1>
                        <h2>Ayo Majukan Dan Kembangkan UMKM Indonesia</h2>
                    </div>
                </div>
            </div>
            @foreach ($banner as $b)
                <div class="carousel-item" data-bs-interval="4000">
                    <img class="d-block w-100 img-fluid"
                        src="{{ asset('assets/users/' . $b->users->role . '/' . $b->users_id . '/' . $b->foto) }}"
                        alt="slide {{ $loop->iteration }}">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>{{ $b->nama_produk }}</h1>
                            <h2>Rp {{ number_format($b->harga, 0, '.', '.') }}</h2>
                            <a href="{{ route('produk_detail.reseller', $b->slug) }}" class="btn-resell">Resell</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- ./Banner --}}

    {{-- Paket Usaha --}}
    <section class="paket">
        <div class="container py-3 mt-3">
            <div class="text-center">
                <hr class="hr-paket opacity-100" data-aos="flip-right" data-aos-delay="100">
                <span data-aos="zoom-in">Paket Usaha</span>
                <hr class="hr-paket opacity-100" data-aos="flip-right" data-aos-delay="100">
            </div>
            <div class="col-lg-12 my-5" data-aos="zoom-in">
                <div class="paket-slider owl-carousel">
                    @foreach ($produk as $p)
                        @if ($p->status == 'Konfirmasi')
                            @if ($p->tampilkan == 1)
                                <div class="single-box text-center">
                                    <div class="img-area">
                                        <img alt="" class="img-fluid move-animation"
                                            src="{{ asset('assets/users/' . $p->users->role . '/' . $p->users_id . '/' . $p->foto) }}" />
                                    </div>
                                    <div class="info-area">
                                        <h4 id="title_card">{{ Str::limit($p->nama_produk, 20) }}</h4>
                                        <h6 class="price">Rp {{ number_format($p->harga, 0, '.', '.') }}</h6>
                                        <a href="{{ route('produk_detail.reseller', $p->slug) }}"
                                            class="btn-resell">Resell</a>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    {{-- ./Paket Usaha --}}
@endsection
