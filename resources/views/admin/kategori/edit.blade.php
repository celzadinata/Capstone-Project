@extends('layouts_admin.app')
@section('title','Edit Kategori')
@section('title_top', 'EDIT KATEGORI')
@section('content')
    <div class="content">
        <div class="card">
            <div class="container">
            <form action="{{ route('kategori.update', $kategori->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body mt-3">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="nama">Nama Kategori :</label>
                            <input type="text" name="nama" value="{{ $kategori->nama }}"
                                class="form-control @error('nama') is-invalid @enderror">
                            <div class="text-danger">
                                @error('nama')
                                    Nama Kategori tidak boleh kosong.
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route('kategori') }}" type="button" class="btn btn-secondary"><i
                            class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a>
                    <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i>
                        &nbsp;
                        Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
