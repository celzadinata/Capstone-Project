@extends('layouts_pengusaha.app')
@section('title', 'Tambah Produk')
@if ($jenis == 'paket_usaha')
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
                <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" name="nama_produk" id="nama_produk" class="form-control" required>
                    </div>
                    {{-- <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
                    </div> --}}
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input id="x" type="hidden" name="deskripsi">
                        <trix-editor input="x"></trix-editor>
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

                    @if ($jenis == 'paket_usaha')
                        <div class="mb-3">
                            <label for="berkas1" class="form-label">Surat Izin Usaha Perdagangan (SIUP) </label>
                            <input class="form-control" type="file" id="berkas1" name="berkas1" required>
                        </div>
                        <div class="mb-3">
                            <label for="berkas2" class="form-label">Surat Izin Tempat Usaha (SITU)</label>
                            <input class="form-control" type="file" id="berkas2" name="berkas2" required>
                        </div>
                        <div class="mb-3">
                            <label for="berkas3" class="form-label"> NPWP, UD, NIB, SKDU dan lain sebagainya
                                (Opsional)</label>
                            <input class="form-control" type="file" id="berkas3" name="berkas3">
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto produk</label>
                        <input class="form-control" type="file" id="foto" name="foto"
                            onchange="previewFoto(event)">
                    </div>
                    <div id="previewContainer"></div>

                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="jenis" name="jenis" value="{{ $jenis }}"
                            required autocomplete="jenis" />
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('produk.pengusaha') }}" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('nama_produk').addEventListener('input', function() {
            var namaProduk = this.value;
            var slug = namaProduk.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
            document.getElementById('slug').value = slug;
        });

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
