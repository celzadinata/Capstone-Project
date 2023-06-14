@extends('layouts_reseller.app')
@section('title', 'Paket Usaha')
@section('content')
    {{-- Paket Usaha --}}
    <section class="paket-usaha">
        <div class="container">
            <hr class="my-2 hr-paket opacity-100" data-aos="flip-right" data-aos-delay="100">
            <div class="row my-3">
                <div class="col-md-3 col-lg-2 pe-5 side-panel-paket" data-aos="zoom-in" data-aos-delay="100">
                    <form class="d-flex mb-4" action="{{ route('search_paket') }}" method="get" role="search">
                        <input class="form-control me-2" name="search" type="text" placeholder="Search"
                            aria-label="Search">
                        <button class="search-button" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <h1>Kategori</h1>
                    <ul class="kategori list-unstyled">
                        @foreach ($list_kategori as $k)
                            <li><a href="{{ route('produk_kategori.reseller', $k->slug) }}">{{ $k->nama }}</a></li>
                        @endforeach
                        <hr class="opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <li><a href="{{ route('kategori.reseller') }}">Semua Kategori</a></li>
                    </ul>
                    <hr class="my-4 hr-paket opacity-100" data-aos="flip-right" data-aos-delay="800">
                    <h1>Urutkan</h1>
                    <ul class="urutkan list-unstyled">
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="listGroupRadio" value=""
                                id="radio1">
                            <label class="form-check-label" for="radio1">Termahal</label>
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="listGroupRadio" value=""
                                id="radio2">
                            <label class="form-check-label" for="radio2">Termurah</label>
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="listGroupRadio" value=""
                                id="radio3">
                            <label class="form-check-label" for="radio3">Terbaru</label>
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="listGroupRadio" value=""
                                id="radio4">
                            <label class="form-check-label" for="radio4">Acak</label>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9 col-lg-10">
                    <div class="row row-cols-1 row-cols-md-5 g-4" data-aos="fade">
                        @foreach ($paket as $p)
                            @if ($p->status == 'Konfirmasi')
                                @if ($p->tampilkan == 1)
                                    <div class="col">
                                        <div class="card h-100">
                                            <img src="{{ asset('assets/users/' . $p->users->role . '/' . $p->users_id . '/' . $p->foto) }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h4 class="card-title">{{ Str::limit($p->nama_produk, 20) }}</h4>
                                                <p>Rp {{ number_format($p->harga, 0, '.', '.') }}</p>
                                                <a href="{{ route('produk_detail.reseller', $p->slug) }}"
                                                    class="btn-resell">Resell</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ./Paket Usaha --}}
@endsection
