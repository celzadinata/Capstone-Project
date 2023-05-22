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
                                {{-- <i class="material-icons">content_copy</i> --}}
                                <img src="./assets/img/icon/paket-usaha.png" alt="" srcset="">
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
                                <i class="material-icons">store</i>
                            </div>
                            <p class="card-category">Revenue</p>
                            <h3 class="card-title">$34,245</h3>
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
                                <i class="material-icons">info_outline</i>
                            </div>
                            <p class="card-category">Fixed Issues</p>
                            <h3 class="card-title">75</h3>
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
                                <i class="fa fa-twitter"></i>
                            </div>
                            <p class="card-category">Followers</p>
                            <h3 class="card-title">+245</h3>
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