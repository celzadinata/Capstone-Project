@extends('layouts_reseller.app')
@section('title', 'Produk')
@section('content')
    {{-- Produk Kategori --}}
    <section class="paket-usaha">
        <div class="container">
            <hr class="my-2 hr-paket opacity-100" data-aos="flip-right" data-aos-delay="100">
            <div class="row my-3">
                <div class="col-md-3 col-lg-2 pe-5 side-panel-paket" data-aos="zoom-in" data-aos-delay="100">
                    <h1>{{ $kategori->nama }}</h1>
                    <hr class="my-4 hr-paket opacity-100" data-aos="flip-right" data-aos-delay="800">
                    <h1>Urutkan</h1>
                    <form id="sort-form" action="{{ route('produk_kategori.reseller', $kategori->slug) }}" method="GET">
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
                    @if ($produk->isEmpty())
                        <div class="text-center mt-5">
                            <h4>Tidak Ada Produk Yang Tersedia</h4>
                        </div>
                    @else
                        <div class="row row-cols-2 row-cols-lg-5 g-4" data-aos="fade">
                            @foreach ($produk as $p)
                                @if ($p->status == 'Konfirmasi')
                                    @if ($p->tampilkan == 1)
                                        <div class="col g-3">
                                            <a class="konten" href="{{ route('produk_detail.reseller', $p->slug) }}">
                                                <div class="card h-100">
                                                    <img src="{{ asset('assets/users/' . $p->users->role . '/' . $p->users_id . '/' . $p->foto) }}"
                                                        class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <p class="kategori">{{ $p->kategori->nama}}</p>
                                                        <h4 class="card-title">{{ Str::limit($p->nama_produk, 12) }}</h4>
                                                        <span class="jenis">{{ str_replace('_', ' ', Str::title($p->jenis)) }}</span>
                                                        <p>Rp {{ number_format($p->harga, 0, '.', '.') }}</p>
                                                    </div>
                                                </div>
                                            </a>
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
