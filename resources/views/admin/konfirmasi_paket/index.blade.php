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
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Nama Produk</th>
                                            <th>Pengusaha</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produk as $p)
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td>{{ $p->nama_produk }}</td>
                                                <td>{{ $p->users->nama_depan }}</td>
                                                <td>{{ $p->status }}</td>
                                                <td>
                                                    <a href="#" class="btn" id="btn_table">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <a href="#" class="btn" id="btn_table">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
