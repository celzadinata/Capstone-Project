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
                <form action="{{ Route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control" required>
                            <option value="paket_usaha" {{ $produk->jenis == 'paket_usaha' ? 'selected' : '' }}>Paket Usaha
                            </option>
                            <option value="supply" {{ $produk->jenis == 'supply' ? 'selected' : '' }}>Supply</option>
                        </select>
                    </div>
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
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="0" {{ $produk->status == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                            <option value="1" {{ $produk->status == 1 ? 'selected' : '' }}>Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rate">Rate</label>
                        <input type="number" name="rate" id="rate" class="form-control" value="{{ $produk->rate }}"
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
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <div>
                            <input type="file" name="foto" id="foto" class="form-control-file">
                            <button type="button" id="chooseBtn">Choose File</button>
                        </div>
                        <div id="previewContainer">
                            <img src="{{ $produk->foto }}" class="previewImage">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('produk.pengusaha') }}" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('chooseBtn').addEventListener('click', function() {
            document.getElementById('foto').click();
        });

        document.getElementById('foto').addEventListener('change', function(event) {
            var files = event.target.files;
            var previewContainer = document.getElementById('previewContainer');
            previewContainer.innerHTML = '';

            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var reader = new FileReader();

                reader.onload = function() {
                    var img = document.createElement('img');
                    img.src = reader.result;
                    img.classList.add('previewImage');
                    previewContainer.appendChild(img);
                }

                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection