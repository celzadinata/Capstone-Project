@extends('layouts_pengusaha.app')
@section('title', 'Produk')
@section('title_top', 'PAKET USAHA')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-1">
                            <a href="{{ route('produk.jenis') }}" class="btn btn-primary mb-3">Tambah Produk</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table" style="border: 1px solid white;">
                                <thead>
                                    <tr style="background-color: #CE3ABD; color: white;">
                                        <th width="5%" style="border-right: 1px solid white;">No</th>
                                        <th style="border-right: 1px solid white;">Jenis</th>
                                        <th style="border-right: 1px solid white;">Nama Produk</th>
                                        <th style="border-right: 1px solid white;">Harga</th>
                                        <th style="border-right: 1px solid white;">Stok</th>
                                        <th style="border-right: 1px solid white;">Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produks as $produk)
                                        <tr style="color: #CE3ABD; background-color: white; font-weight: 500;">
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ str_replace('_', ' ', Str::title($produk->jenis)) }}</td>
                                            <td>{{ Str::title($produk->nama_produk) }}</td>
                                            <td>Rp. {{ number_format($produk->harga), 0, ',', '.' }}</td>
                                            <td>{{ $produk->stok }}</td>
                                            <td>{{ $produk->status }}</td>
                                            <td>
                                                <form action="{{ route('produk.update_tampilan', $produk->id) }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    @if($produk->status == 'Belum Konfirmasi' && $produk->status == null)
                                                    @else
                                                    @if ($produk->tampilkan == 0)
                                                        <div class="form-group">
                                                            <input type="hidden" value="1" name="tampilkan">
                                                        </div>
                                                        <button type="submit" class="btn btn-success btn-sm">Tampilkan</button>
                                                    @else
                                                        <div class="form-group">
                                                            <input type="hidden" value="0" name="tampilkan">
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
