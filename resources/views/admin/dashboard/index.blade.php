@extends('layouts_admin.app')
@section('title', 'Dashboard')
@section('title_top', 'DASHBOARD')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-icon">
                            <div class="card-icon" id="icon">
                                <img src="/assets/img/icon/kategori-56.png" alt="" srcset="">
                            </div>
                            <p class="card-category">Kategori Usaha</p>
                            {{-- <h3 class="card-title">49/50
                                <small>GB</small>
                            </h3> --}}
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <a href="{{ route('kategori') }}" type="button" class="btn" id="icon">Buka</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-icon">
                            <div class="card-icon" id="icon">
                                {{-- <i class="material-icons">content_copy</i> --}}
                                <img src="/assets/img/icon/users-admin-56.png" alt="" srcset="">
                            </div>
                            <p class="card-category">User Management</p>
                            {{-- <h3 class="card-title">49/50
                                <small>GB</small>
                            </h3> --}}
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <a href="{{ route('user.admin') }}" type="button" class="btn" id="icon">Buka</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-icon">
                            <div class="card-icon" id="icon">
                                {{-- <i class="material-icons">content_copy</i> --}}
                                <img src="/assets/img/icon/paket-usaha-index.png" alt="" srcset="">
                            </div>
                            <p class="card-category">Konfirmasi Produk</p>
                            {{-- <h3 class="card-title">49/50
                                <small>GB</small>
                            </h3> --}}
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <a href="{{ route('konfirmasi.admin') }}" type="button" class="btn"
                                    id="icon">Buka</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
