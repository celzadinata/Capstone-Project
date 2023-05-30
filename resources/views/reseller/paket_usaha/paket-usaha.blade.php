@extends('layouts_reseller.app')
@section('title', 'Homepage')
@section('content')
    {{-- Paket Usaha --}}
    <section class="paket">
        <div class="container">
            <hr class="my-2 hr-paket opacity-100" data-aos="flip-right" data-aos-delay="100">
            <div class="row">
                <div class="col-md-3 col-lg-2 pe-5 side-panel-paket" data-aos="zoom-in" data-aos-delay="100">
                    <form class="d-flex mb-4" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="search-button" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <h1>Kategori</h1>
                    <ul class="kategori list-unstyled">
                        <li><a href="#">Pakaian</a></li>
                        <li><a href="#">Makanan</a></li>
                        <li><a href="#">Peralatan</a></li>
                        <li><a href="#">Sport</a></li>
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
                        <div class="col">
                            <div class="card h-100">
                                <img src="assets/img/reseller/paket/paket-adidas.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">Adidas Store</h4>
                                    <a href="#" class="btn-resell">Resell</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <img src="assets/img/reseller/paket/paket-kyt.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">KYT Helmet</h4>
                                    <a href="#" class="btn-resell">Resell</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <img src="assets/img/reseller/paket/paket-kripik.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">Kripik Tempe</h4>
                                    <a href="#" class="btn-resell">Resell</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <img src="assets/img/reseller/paket/paket-snack.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">Snack Quest</h4>
                                    <a href="#" class="btn-resell">Resell</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <img src="assets/img/reseller/paket/paket-kue.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">My Kue</h4>
                                    <a href="#" class="btn-resell">Resell</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <img src="assets/img/reseller/paket/paket-minuman.jpg" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">Almond Drink</h4>
                                    <a href="#" class="btn-resell">Resell</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <img src="assets/img/reseller/paket/paket-kerajinan.jpg" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">Kerajinan Tangan</h4>
                                    <a href="#" class="btn-resell">Resell</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ./Paket Usaha --}}
@endsection
