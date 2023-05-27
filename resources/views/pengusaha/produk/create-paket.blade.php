@extends('layouts_pengusaha.app')
@section('title', 'Tambah Paket Usaha')
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
                <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" name="nama_produk" id="nama_produk" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" name="stok" id="stok" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="kategoris_id">Kategori</label>
                        <select name="kategoris_id" id="kategoris_id" class="form-control" required>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="berkas1" class="form-label">Berkas Wajib 1</label>
                        <input class="form-control" type="file" id="berkas1" required>
                    </div>
                    <div class="mb-3">
                        <label for="berkas2" class="form-label">Berkas Wajib 2</label>
                        <input class="form-control" type="file" id="berkas2" required>
                    </div>
                    <div class="mb-3">
                        <label for="berkas3" class="form-label">Berkas Opsional</label>
                        <input class="form-control" type="file" id="berkas3">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input class="form-control chooseBtn" type="file" id="foto" onchange="previewFoto(event)"
                            required>
                    </div>
                    <div id="previewContainer"></div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="#" class="btn btn-primary">Kembali</a>
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
