@extends('layouts_pengusaha.app')
@section('title', 'Dashboard')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-icon">
                            <div class="card-icon" id="icon">
                                <img src="/assets/img/icon/paket-usaha-index.png" alt="" srcset="">
                            </div>
                            <p class="card-category">Paket Usaha</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <a href="{{ route('produk.pengusaha') }}" type="button" class="btn"
                                    id="icon">Buka</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-icon">
                            <div class="card-icon" id="icon">
                                <img src="/assets/img/icon/transaksi-56.png" alt="" srcset="">
                            </div>
                            <p class="card-category">Transaksi</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <a href="{{ route('transaksi.pengusaha') }}" type="button" class="btn"
                                    id="icon">Buka</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-icon">
                            <div class="card-icon" id="icon">
                                <img src="/assets/img/icon/laporan-56.png" alt="" srcset="">
                            </div>
                            <p class="card-category">Laporan</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <a href="{{ route('laporan.pengusaha') }}" type="button" class="btn"
                                    id="icon">Buka</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-icon">
                            <div class="card-icon" id="icon">
                                <img src="/assets/img/icon/review-56.png" alt="" srcset="">
                            </div>
                            <p class="card-category">Review</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <a href="{{ route('review.pengusaha') }}" type="button" class="btn"
                                    id="icon">Buka</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-icon">
                            <div class="card-icon" id="icon">
                                <img src="/assets/img/icon/profil-56.png" alt="" srcset="">
                            </div>
                            <p class="card-category">Profil</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <a href="#" type="button" class="btn" id="icon">Buka</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
