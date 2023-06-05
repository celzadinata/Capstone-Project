@extends('layouts_reseller.app')
@section('title', 'Homepage')
@section('content')
    {{-- Banner --}}
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1"
                aria-current="true"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"
                class=""></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"
                class=""></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="4000">
                <img class="d-block w-100 img-fluid" src="assets/img/reseller/banner-adidas.jpg" alt="slide 1">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Adidas Store</h1>
                        <h2>Better exercise experience with<br>our latest edition of Adidas.</h2>
                        <a href="#" class="btn-resell">Resell</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="4000">
                <img class="d-block w-100 img-fluid" src="assets/img/reseller/banner-kyt.jpg" alt="slide 2">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>KYT Helmet</h1>
                        <h2>Better exercise experience<br>with World Class Helmet.</h2>
                        <a href="#" class="btn-resell">Resell</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="4000">
                <img class="d-block w-100 img-fluid" src="assets/img/reseller/banner-snack.jpg" alt="slide 3">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Snack Quest</h1>
                        <h2>We believe that snacks are not just a snack,<br>but also an experience that can enrich
                            your life.</h2>
                        <a href="#" class="btn-resell">Resell</a>
                    </div>
                </div>
            </div>
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
                            <div class="single-box text-center">
                                <div class="img-area">
                                    <img alt="" class="img-fluid move-animation"
                                        src="assets/img/reseller/paket/paket-adidas.jpg" />
                                </div>
                                <div class="info-area">
                                    <h4 id="title_card">{{ Str::limit($p->nama_produk, 20) }}</h4>
                                    <p class="price">Rp {{ number_format($p->harga, 0, '.', '.') }}</p>
                                    <a href="{{ route('produk_detail.reseller', $p->id) }}" class="btn-resell">Resell</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    {{-- ./Paket Usaha --}}
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.star-rating').click(function() {
                var rating = $(this).data('rating');
                // Kirim rating ke server menggunakan Ajax atau lakukan tindakan lain sesuai kebutuhan Anda
            });
        });
    </script>
@endsection
