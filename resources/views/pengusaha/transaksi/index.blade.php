@extends('layouts_pengusaha.app')
@section('title', 'Transaksi')
@section('title_top', 'TRANSAKSI')
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
                                        <tr style="background-color: #CE3ABD; color: white;">
                                            <th>No</th>
                                            <th>ID Transaksi</th>
                                            <th>Reseller</th>
                                            <th>Tanggal</th>
                                            <th width="3%">Status Pembayaran</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Total Harga</th>
                                            <th text-center;" colspan="3">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksiModel as $item)
                                            <tr style="color: #CE3ABD; background-color: white; font-weight: 500;">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->users->username }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td><b><i>{{ $item->status }}</i></b></td>
                                                <td>
                                                    @if ($item->bukti_pembayaran)
                                                        <a href="{{ asset('/assets/users/reseller/' . $item->user_id . '/' . $item->bukti_pembayaran) }}"
                                                            target="_blank">Lihat Bukti</a>
                                                    @else
                                                        Belum Ada Bukti Pembayaran
                                                    @endif
                                                </td>
                                                <td>Rp. {{ number_format($item->total, 0, ',', '.') }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        data-toggle="modal"
                                                        data-target="#ubahStatusModal{{ $item->id }}">
                                                        Ubah Status
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        data-toggle="modal" data-target="#detailModal{{ $item->id }}">
                                                        Detail transaksi
                                                    </button>
                                                </td>
                                                <td>
                                                    <a type="button" class="btn-resell"
                                                        href="{{ route('invoice', $item->id) }}">Cetak</a>
                                                </td>
                                            </tr>

                                            {{-- Modal Ubah Status --}}
                                            <div class="modal fade" id="ubahStatusModal{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="ubahStatusLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ubahStatusLabel">Ubah Status</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('transaksi.update', ['id' => $item->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <label for="status">Status:</label>
                                                                    <select class="form-control" id="status"
                                                                        name="status">
                                                                        <option value="Menunggu Pembayaran"
                                                                            {{ $item->status == 'Menunggu Pembayaran' ? 'selected' : '' }}>
                                                                            Menunggu Pembayaran</option>
                                                                        <option value="Pembayaran Diterima"
                                                                            {{ $item->status == 'Pembayaran Diterima' ? 'selected' : '' }}>
                                                                            Pembayaran Diterima</option>
                                                                        <option value="Pesanan Diproses"
                                                                            {{ $item->status == 'Pesanan Diproses' ? 'selected' : '' }}>
                                                                            Pesanan Diproses</option>
                                                                        <option value="Pesanan Dikirim"
                                                                            {{ $item->status == 'Pesanan Dikirim' ? 'selected' : '' }}>
                                                                            Pesanan Dikirim
                                                                        </option>
                                                                        <option value="Selesai"
                                                                            {{ $item->status == 'Selesai' ? 'selected' : '' }}>
                                                                            Selesai</option>
                                                                    </select>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                id="simpanStatusButton">Simpan</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Modal Detail Transaksi -->
                                            <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="detailModalLabel">Detail Transaksi
                                                                <b>ID
                                                                    {{ $item->id }}</b>
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul>
                                                                @if ($item->detail_transaksi)
                                                                    @foreach ($item->detail_transaksi as $detailTransaksi)
                                                                        <li>{{ $detailTransaksi->nama_produk }} - <b>Qty :
                                                                                <span>{{ $detailTransaksi->qty }}</span>
                                                                            </b></li>
                                                                        <li class="form-control">Rp.
                                                                            {{ number_format($detailTransaksi->harga, 0, ',', '.') }}
                                                                        </li>
                                                                    @endforeach
                                                                @else
                                                                    <li>Tidak ada detail transaksi</li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $transaksiModel->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
