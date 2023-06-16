@extends('layouts_admin.app')
@section('title', 'Konfirmasi Produk')
@section('title_top', 'KONFIRMASI PRODUK')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-1">
                                <div class="row">
                                    <div class="col text-right">
                                        <input class="table-filter py-2 px-2 mr-2" type="text" id="myInput"
                                            data-table="table" placeholder="Cari"><i class="fa-solid fa-magnifying-glass px-3 py-3" id="cari"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Nama Paket Usaha</th>
                                            <th>Pengusaha</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produk as $p)
                                            <tr style="color: #CE3ABD; background-color: white; font-weight: 500;">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $p->nama_produk }}</td>
                                                <td>{{ $p->users->nama_depan }}</td>
                                                <td>{{ $p->status }}</td>
                                                <td>
                                                    <a href="{{ route('konfirmasi_paket.admin', $p->id) }}"
                                                        class="btn btn-warning">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    {{-- <a href="{{ route('konfirmasi_destroy.admin') }}" class="btn" id="btn_table">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $produk->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
