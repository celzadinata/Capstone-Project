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
                            <div class="ml-3" style="color:#CE3ABD">
                                <h3>Konfirmasi Produk</h3>
                            </div>
                            <div class="ml-3 mr-3 p-4" id="konfirmasi_user">
                                <table>
                                    <tbody id="text_konfirmasi_user">
                                        <tr>
                                            <td>Nama</td>
                                            <td>&nbsp;:</td>
                                            <td>{{ $produk->nama_produk }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis</td>
                                            <td>&nbsp;:</td>
                                            <td>{{ str_replace('_', ' ', Str::title($produk->jenis)) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pengusaha</td>
                                            <td>&nbsp;:</td>
                                            <td>{{ $produk->users->nama_depan }} {{ $produk->users->nama_belakang }}</td>
                                        </tr>
                                        <tr>
                                            <td>Berkas SIUP</td>
                                            <td>&nbsp;:</td>
                                            <td>
                                                @if ($produk->berkas_1 == null)
                                                    <button type="button" class="btn btn-sm" id="button_berkas_user"
                                                        data-toggle="modal" data-target=".bd-example-modal-lg">Lihat
                                                        Berkas</button>
                                                    <div class="modal fade bd-example-modal-lg" tabindex="-1"
                                                        role="dialog" aria-labelledby="myLargeModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content" id="modal">
                                                                <h3 class="py-5 text-center" style="color:#CE3ABD">
                                                                    Berkas SIUP Masih Belum
                                                                    Dimasukkan</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <a href="{{ asset('assets/users/pengusaha/' . $produk->users_id . '/berkas/' . $produk->berkas_1) }}"
                                                        type="button" class="btn btn-sm" id="button_berkas_user"
                                                        target="_blank">Lihat
                                                        Berkas</a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Berkas SITU</td>
                                            <td>&nbsp;:</td>
                                            <td>
                                                @if ($produk->berkas_2 == null)
                                                    <button type="button" class="btn btn-sm" id="button_berkas_user"
                                                        data-toggle="modal" data-target=".situ">Lihat
                                                        Berkas</button>
                                                    <div class="modal fade bd-example-modal-lg situ" tabindex="-1"
                                                        role="dialog" aria-labelledby="myLargeModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content" id="modal">
                                                                <h3 class="py-5 text-center" style="color:#CE3ABD">
                                                                    Berkas SITU Masih Belum
                                                                    Dimasukkan</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <a href="{{ asset('assets/users/pengusaha/' . $produk->users_id . '/berkas/' . $produk->berkas_2) }}"
                                                        type="button" class="btn btn-sm" id="button_berkas_user"
                                                        target="_blank">Lihat
                                                        Berkas</a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Berkas Opsional</td>
                                            <td>&nbsp;:</td>
                                            @if ($produk->berkas_3 == null)
                                                <td>Tidak Ada</td>
                                            @else
                                                <td><a href="{{ asset('assets/users/pengusaha/' . $produk->users_id . '/berkas/' . $produk->berkas_3) }}"
                                                        type="button" class="btn btn-sm" id="button_berkas_user"
                                                        target="_blank">Lihat
                                                        Berkas</a></td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <form action="{{ route('update_paket.admin', $produk->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="hidden" value="Konfirmasi" name="status">
                                        <input type="hidden" value="{{ $produk->id }}" name="produks_id">
                                        <input type="hidden" value="{{ $produk->users->id }}" name="users_id">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    @if ($produk->status == 'Konfirmasi')
                                        <a href="{{ route('konfirmasi.admin') }}" type="button" class="btn"><i
                                                class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a>
                                        <div>
                                            <h4>Produk Sudah Dikonfirmasi</h4>
                                        </div>
                                    @else
                                        <a href="{{ route('konfirmasi.admin') }}" type="button" class="btn"><i
                                                class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#exampleModal">
                                            Tolak
                                        </button>
                                        <button type="submit" class="btn" id="btn_table"><i
                                                class="nav-icon fas fa-save"></i>
                                            &nbsp;
                                            Konfirmasi</button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pesan_paket.admin') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="pesan">Masukkan Pesan</label>
                            <input type="text" name="pesan" id="pesan" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="Produk Ditolak!!" name="judul">
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="{{ $produk->users->id }}" name="users_id">
                            <input type="hidden" value="{{ $produk->id }}" name="produks_id">
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
