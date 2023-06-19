@extends('layouts_pengusaha.app')
@section('title', 'Produk')
@section('title_top', 'PRODUK')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-1">
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ route('produk.jenis') }}" class="btn btn-primary mb-3">Tambah Produk</a>
                                    </div>
                                    <div class="col text-right">
                                        <input class="table-filter py-2 px-2 mr-2" type="text" id="myInput"
                                            data-table="table" placeholder="Cari"><i
                                            class="fa-solid fa-magnifying-glass px-3 py-3" id="cari"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2 mx-2 my-2" id="sorting">
                                <div class="row mx-4 text-center">
                                    <div class="col">
                                        <a class="btn btn-warning mb-0"
                                            href="{{ route('produk.sorting2', ['order2' => 'asc']) }}">
                                            Paket Usaha</a>
                                    </div>
                                    <div class="col">
                                        <a class="btn btn-warning mb-0"
                                            href="{{ route('produk.sorting2', ['order2' => 'desc']) }}">
                                            Supply</a>
                                    </div>
                                    <div class="col">
                                        <a class="btn btn-warning mb-0"
                                            href="{{ route('produk.sorting', ['order' => 'asc']) }}">
                                            A-Z</a>
                                    </div>
                                    <div class="col">
                                        <a class="btn btn-warning mb-0"
                                            href="{{ route('produk.sorting', ['order' => 'desc']) }}">Z-A</a>
                                    </div>
                                </div>
                            </div>
                            <style>
                                #sorting{
                                    border: 2px solid #CE3ABD;
                                    background-color: #CE3ABD;
                                    border-radius: 10px;
                                }
                            </style>
                            <div class="table-responsive ">
                                <table class="table table-bordered " style="border: 1px solid white;">
                                    <thead>
                                        <tr style="background-color: #CE3ABD; color: white;">
                                            <th width="5%" style="border-right: 1px solid white;">No</th>
                                            <th>Jenis</th>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produks as $produk)
                                            <tr style="font-weight: 500;">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ str_replace('_', ' ', Str::title($produk->jenis)) }}</td>
                                                <td>{{ Str::title($produk->nama_produk) }}</td>
                                                <td>Rp. {{ number_format($produk->harga), 0, ',', '.' }}</td>
                                                <td class="text-center">{{ $produk->stok }}</td>
                                                <td>{{ $produk->status }}</td>
                                                <td>
                                                    <form action="{{ route('produk.update_tampilan', $produk->id) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        @if ($produk->status == 'Belum Konfirmasi')
                                                        @else
                                                            @if ($produk->tampilkan == 0)
                                                                <div class="form-group">
                                                                    <input type="hidden" value="1" name="tampilkan">
                                                                    <input type="hidden" value="{{ $produk->id }}" name="id">
                                                                </div>
                                                                <button type="submit"
                                                                class="btn btn-success btn-sm">Tampilkan</button>
                                                                @else
                                                                <div class="form-group">
                                                                    <input type="hidden" value="0" name="tampilkan">
                                                                    <input type="hidden" value="{{ $produk->id }}" name="id">
                                                                </div>
                                                                <button class="btn btn-warning btn-sm">Hilangkan</button>
                                                            @endif
                                                        @endif
                                                    </form>
                                                    <a href="{{ route('produk.edit', $produk->id) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    <a href="{{ route('produk.destroy', $produk->id) }}"
                                                        class="btn btn-sm btn-danger" data-confirm-delete="true">Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $produks->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
