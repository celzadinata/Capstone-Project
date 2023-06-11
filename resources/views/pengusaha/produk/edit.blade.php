@extends('layouts_pengusaha.app')
@section('title', 'Edit Produk')
@if ($produk->jenis == 'paket_usaha')
    @section('title_top', 'PAKET USAHA')
@else
    @section('title_top', 'SUPPLY')
@endif
@section('content')
    <style>
        .previewImage {
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
        }
    </style>
    <div class="content">
        <div class="container-fluid">
            <div class="card p-4">
                <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" name="nama_produk" id="nama_produk" class="form-control"
                            value="{{ $produk->nama_produk }}" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ $produk->deskripsi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control"
                            value="{{ $produk->harga }}" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" name="stok" id="stok" class="form-control" value="{{ $produk->stok }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="kategoris_id">Kategori</label>
                        <select name="kategoris_id" id="kategoris_id" class="form-control" required>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}"
                                    {{ $produk->kategoris_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @if ($jenis == 'paket_usaha')
                        <div class="form-group">
                            <label for="kategoris_id">Berkas 1</label>
                            <div class="file-upload">
                                <div class="file-select">
                                    <div class="file-select-button" id="fileName"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" class="bi bi-upload fa-7x"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                            <path
                                                d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                                        </svg>
                                    </div>
                                    <div class="file-select-name" id="noFile">
                                        {{ $produk->berkas_1 }}</div>
                                    <input type="file" class="form-control @error('berkas1') is-invalid @enderror"
                                        name="berkas1" aria-describedby="berkasHelp" id="chooseFile"
                                        onchange="PreviewBerkas()">
                                    @error('berkas1')
                                        <div id="namaprodukHelp" class="form-text">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kategoris_id">Berkas 2</label>
                            <div class="file-upload">
                                <div class="file-select">
                                    <div class="file-select-button" id="fileName"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" class="bi bi-upload fa-7x"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                            <path
                                                d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                                        </svg>
                                    </div>
                                    <div class="file-select-name" id="noFile">
                                        {{ $produk->berkas_2 }}</div>
                                    <input type="file" class="form-control @error('berkas2') is-invalid @enderror"
                                        name="berkas2" aria-describedby="berkasHelp" id="chooseFile"
                                        onchange="PreviewBerkas()">
                                    @error('berkas2')
                                        <div id="namaprodukHelp" class="form-text">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kategoris_id">Berkas 3</label>
                            <div class="file-upload">
                                <div class="file-select">
                                    <div class="file-select-button" id="fileName"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" class="bi bi-upload fa-7x"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                            <path
                                                d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                                        </svg>
                                    </div>
                                    <div class="file-select-name" id="noFile">
                                        {{ $produk->berkas_3 }}</div>
                                    <input type="file" class="form-control @error('berkas3') is-invalid @enderror"
                                        name="berkas3" aria-describedby="berkasHelp" id="chooseFile"
                                        onchange="PreviewBerkas()">
                                    @error('berkas3')
                                        <div id="namaprodukHelp" class="form-text">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif
                    <div>
                        <img src="{{ asset('assets/users/' . Auth::user()->role . '/' . Auth::user()->id . '/' . $produk->foto) }}"
                            id="preview" class="rounded img-fluid" style="width: 150px; height: 150px;" />
                        <div class="d-flex ms-1 mb-2">
                            <input type="file" accept="image/*"
                                class="form-control text-muted @error('foto') is-invalid @enderror" name="foto"
                                id="foto" aria-describedby="avatarHelp" style="display: none"
                                onchange="PreviewFoto()">
                            <input type="button" value="Ubah Foto" class="btn btn-outline-primary"
                                onclick="document.getElementById('foto').click();" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="{{ $produk->id }}" required autocomplete="id" />
                    </div>
                    @if ($produk->foto == null)
                        <div id="previewContainer"><img src="{{ asset('assets/img/default/produk.png') }}"
                                class="previewImage"></div>
                    @else
                        <div id="previewContainer"><img src="{{ $produk->foto }}" class="previewImage"></div>
                    @endif
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('produk.pengusaha') }}" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
