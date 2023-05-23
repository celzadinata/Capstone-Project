@extends('layouts_pengusaha.app')
@section('title', 'Dashboard')
@section('content')
    <div class="content">
        {{auth()->user()->role . ' ' .  auth()->user()->email}}

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-icon">
                            <div class="card-icon" id="icon">
                                {{-- <i class="material-icons">content_copy</i> --}}
                                <img src="/assets/img/icon/paket-usaha-index.png" alt="" srcset="">
                            </div>
                            <p class="card-category">Paket Usaha</p>
                            {{-- <h3 class="card-title">49/50
                                <small>GB</small>
                            </h3> --}}
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <a href="#" type="button" class="btn" id="icon">Buka</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-icon">
                            <div class="card-icon" id="icon">
                                {{-- <i class="material-icons">content_copy</i> --}}
                                <img src="/assets/img/icon/transaksi-56.png" alt="" srcset="">
                            </div>
                            <p class="card-category">Transaksi</p>
                            {{-- <h3 class="card-title">49/50
                                <small>GB</small>
                            </h3> --}}
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <a href="#" type="button" class="btn" id="icon">Buka</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-icon">
                            <div class="card-icon" id="icon">
                                {{-- <i class="material-icons">content_copy</i> --}}
                                <img src="/assets/img/icon/laporan-56.png" alt="" srcset="">
                            </div>
                            <p class="card-category">Laporan</p>
                            {{-- <h3 class="card-title">49/50
                                <small>GB</small>
                            </h3> --}}
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <a href="{{ route('laporan') }}" type="button" class="btn" id="icon">Buka</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-icon">
                            <div class="card-icon" id="icon">
                                {{-- <i class="material-icons">content_copy</i> --}}
                                <img src="/assets/img/icon/review-56.png" alt="" srcset="">
                            </div>
                            <p class="card-category">Review</p>
                            {{-- <h3 class="card-title">49/50
                                <small>GB</small>
                            </h3> --}}
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <a href="#" type="button" class="btn" id="icon">Buka</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-icon">
                            <div class="card-icon" id="icon">
                                {{-- <i class="material-icons">content_copy</i> --}}
                                <img src="/assets/img/icon/profil-56.png" alt="" srcset="">
                            </div>
                            <p class="card-category">Profil</p>
                            {{-- <h3 class="card-title">49/50
                                <small>GB</small>
                            </h3> --}}
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
