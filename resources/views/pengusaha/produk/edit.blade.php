@extends('layouts_pengusaha.app')
@section('title', 'Edit Produk')
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
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input class="form-control chooseBtn" type="file" id="foto" onchange="previewFoto(event)"
                            required>
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
    <script>
        function previewFoto(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var previewContainer = document.getElementById('previewContainer');
                    previewContainer.innerHTML = '<img src="' + e.target.result + '" class="previewImage">';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
