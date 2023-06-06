@extends('layouts_pengusaha.app')
@section('title', 'Produk')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card p-4">
                <div class="shadow mb-4">
                    <a href="{{ route('produk.jenis') }}" class="btn btn-primary mb-3">Tambah Produk</a>
                    <table class="table" style="border: 1px solid white;">
                        <thead>
                            <tr style="background-color: #CE3ABD; color: white;">
                                <th width="5%" style="border-right: 1px solid white;">No</th>
                                <th style="border-right: 1px solid white;">Jenis</th>
                                <th style="border-right: 1px solid white;">Nama Produk</th>
                                <th style="border-right: 1px solid white;">Harga</th>
                                <th style="border-right: 1px solid white;">Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produks as $produk)
                                <tr style="color: #CE3ABD; background-color: white; font-weight: 500;">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $produk->jenis }}</td>
                                    <td>{{ $produk->nama_produk }}</td>
                                    <td>{{ $produk->harga }}</td>
                                    <td>{{ $produk->stok }}</td>
                                    <td>
                                        <form action="{{ route('produk.update_tampilan', $produk->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            @if ($produk->tampilkan == 0)
                                                <div class="form-group">
                                                    <input type="hidden" value="1" name="tampilkan">
                                                </div>
                                                <button type="submit" class="btn btn-warning btn-sm">Tampilkan</button>
                                            @else
                                                <div class="form-group">
                                                    <input type="hidden" value="0" name="tampilkan">
                                                </div>
                                                <button class="btn btn-warning btn-sm">Hilangkan</button>
                                            @endif
                                        </form>
                                        <a href="{{ route('produk.edit', $produk->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('produk.destroy', $produk->id) }}"
                                            class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
