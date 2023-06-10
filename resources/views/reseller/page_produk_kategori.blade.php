@extends('layouts_reseller.app')
@section('title', 'Produk')
@section('content')
    {{-- Produk Kategori --}}
    <section class="paket-usaha">
        <div class="container">
            <hr class="my-2 hr-paket opacity-100" data-aos="flip-right" data-aos-delay="100">
            <div class="row">
                <div class="col-md-3 col-lg-2 pe-5 side-panel-paket" data-aos="zoom-in" data-aos-delay="100">
                    <form class="d-flex mb-4" action="{{ route('search') }}" method="get" role="search">
                        <input class="form-control me-2" name="search" type="text" placeholder="Search"
                            aria-label="Search">
                        <button class="search-button" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <h1>{{ $kategori->nama }}</h1>
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
                    @if ($produk->isEmpty())
                        <div class="text-center mt-5">
                            <h4>Tidak Ada Produk Yang Tersedia</h4>
                        </div>
                    @else
                        <div class="row row-cols-2 row-cols-lg-5 g-4" data-aos="fade">
                            @foreach ($produk as $p)
                                @if ($p->status == 'Konfirmasi')
                                    @if ($p->tampilkan == 1)
                                        <div class="col">
                                            <div class="card h-100">
                                                <img src="{{ asset('assets/img/reseller/paket/paket-adidas.jpg') }}"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h4 class="card-title">{{ Str::limit($p->nama_produk, 20) }}</h4>
                                                    <p>Rp {{ number_format($p->harga, 0, '.', '.') }}</p>
                                                    <a href="#{{ route('produk_detail.reseller', $p->slug) }}"
                                                        class="btn-resell">Resell</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    {{-- ./Produk Kategori --}}
@endsection
