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
                        <input class="form-control me-2" onkeyup="filter()" name="search" id="value" type="text"
                            placeholder="Search" aria-label="Search">
                        <button class="search-button" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <h1>Kategori</h1>
                    <ul class="kategori list-unstyled">
                        @foreach ($list_kategori as $k)
                            <li><a href="{{ route('produk_kategori.reseller', $k->slug) }}">{{ $k->nama }}</a></li>
                        @endforeach
                        <hr class="hr-paket opacity-100" data-aos="flip-right" data-aos-delay="800">
                        <li><a href="{{ route('kategori.reseller') }}">Semua Kategori</a></li>
                        <hr class="hr-paket opacity-100" data-aos="flip-right" data-aos-delay="800">
                    </ul>
                    <h1>Urutkan</h1>
                    <form id="sort-form" action="{{ route('paket.reseller') }}" method="GET">
                        <div class="form-group">
                            <ul class="urutkan list-unstyled">
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="radio" id="termahal" name="sort"
                                        value="termahal" {{ $sort == 'termahal' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="termahal">Termahal</label><br>
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="radio" id="termurah" name="sort"
                                        value="termurah" {{ $sort == 'termurah' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="termurah">Termurah</label><br>
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="radio" id="terbaru" name="sort"
                                        value="terbaru" {{ $sort == 'terbaru' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="terbaru">Terbaru</label><br>
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="radio" id="acak" name="sort"
                                        value="acak" {{ $sort == 'acak' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="acak">Acak</label><br>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="col-md-9 col-lg-10">
                    <div class="row row-cols-2 row-cols-md-5 g-4" data-aos="fade">
                        @if ($cek == true)
                            @foreach ($paket as $p)
                                @if ($p->status == 'Konfirmasi')
                                    @if ($p->tampilkan == 1)
                                        <div class="col g-3">
                                            <a class="konten" href="{{ route('produk_detail.reseller', $p->slug) }}">
                                                <div class="card h-100">
                                                    <img src="{{ asset('assets/users/' . $p->users->role . '/' . $p->users_id . '/' . $p->foto) }}"
                                                        class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h4 class="card-title">{{ Str::limit($p->nama_produk, 12) }}</h4>
                                                        <p>Rp {{ number_format($p->harga, 0, '.', '.') }}</p>
                                                        {{-- <a href="{{ route('produk_detail.reseller', $s->slug) }}"
                                                            class="btn-resell">Resell</a> --}}
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        @else
                            @foreach ($filter as $p)
                                @if ($p->status == 'Konfirmasi')
                                    @if ($p->tampilkan == 1)
                                        <div class="col g-3">
                                            <a class="konten" href="{{ route('produk_detail.reseller', $p->slug) }}">
                                                <div class="card h-100">
                                                    <img src="{{ asset('assets/users/' . $p->users->role . '/' . $p->users_id . '/' . $p->foto) }}"
                                                        class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h4 class="card-title">{{ Str::limit($p->nama_produk, 12) }}</h4>
                                                        <p>Rp {{ number_format($p->harga, 0, '.', '.') }}</p>
                                                        {{-- <a href="{{ route('produk_detail.reseller', $s->slug) }}"
                                                            class="btn-resell">Resell</a> --}}
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    </div>
                    {{ $filter->links() }}
                </div>
            </div>
        </div>
    </section>
    {{-- ./Paket Usaha --}}
@endsection
