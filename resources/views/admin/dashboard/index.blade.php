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
                            <p class="card-category">Users Management</p>
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
                                <img src="/assets/img/icon/users-admin-56.png" alt="" srcset="">
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
            <iframe width="600" height="450" style="border:0" loading="lazy" allowfullscreen
                referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps/embed/v1/place?key=API_KEY
    &q=Space+Needle,Seattle+WA">
            </iframe>
        </div>
    </div>
@endsection
