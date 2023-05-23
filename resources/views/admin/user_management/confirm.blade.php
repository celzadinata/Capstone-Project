@extends('layouts_admin.app')
@section('title', 'User Management')
@section('title_top', 'USER MANAGEMENT')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3>Konfirmasi User</h3>
                            <form action="{{ route('update_user.admin', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    {{-- <div class="mb-3">
                                        <div class="form-group">
                                            <label for="nama_depan">Email :</label>
                                            <input type="text" name="nama_depan" value="{{ old('nama_depan') }}"
                                                class="form-control @error('nama_depan') is-invalid @enderror">
                                            <div class="text-danger">
                                                @error('nama_depan')
                                                    Email tidak boleh kosong.
                                                @enderror
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="mb-3">
                                        <div class="form-group">
                                            <label for="password">Password :</label>
                                            <input type="password" name="password" value="{{ old('password') }}"
                                                class="form-control @error('password') is-invalid @enderror">
                                            <div class="text-danger">
                                                @error('password')
                                                    Password tidak boleh kosong.
                                                @enderror
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="form-group">
                                        <input type="hidden" value="Aktif" name="status">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <a href="{{ route('user.admin') }}" type="button" class="btn"><i
                                            class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a>
                                    <button type="submit" class="btn" id="btn_table"><i
                                            class="nav-icon fas fa-save"></i>
                                        &nbsp;
                                        Konfirmasi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
