@extends('layouts_reseller.app')
@section('title', 'Pesanan Saya')
@section('content')
    <style>
        .btn-konfirmasi {
            position: absolute;
            bottom: 0;
            right: 0;
        }

        .nav-link {
            color: #CE3ABD;
        }

        .card-container {
            display: flex;
        }

        .card-image {
            margin-left: 2%;
            margin-top: 2%;
            width: 130px;
            height: 130px;
        }
    </style>
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="tab-menunggu-pembayaran" data-bs-toggle="tab"
                    href="#content-menunggu-pembayaran">Menunggu Pembayaran</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab-pembayaran-diterima" data-bs-toggle="tab"
                    href="#content-pembayaran-diterima">Pembayaran Diterima</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab-pesanan-diproses" data-bs-toggle="tab" href="#content-pesanan-diproses">Pesanan
                    Diproses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab-pesanan-dikirim" data-bs-toggle="tab" href="#content-pesanan-dikirim">Pesanan
                    Dikirim</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab-selesai" data-bs-toggle="tab" href="#content-selesai">Selesai</a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="content-menunggu-pembayaran" class="tab-pane fade show active">
                <br>
                @foreach ($transaksi as $item)
                    @if ($item->status === 'Menunggu Pembayaran')
                        <hr>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="price">
                                            <h4 style="color: #CE3ABD">ID {{ $item->id }}</h4>
                                        </div>
                                        <hr>
                                        <div class="d-grid">

                                            @if ($item->detail_transaksi)
                                                @foreach ($item->detail_transaksi as $detailTransaksi)
                                                    <div class="d-flex">
                                                        <div class="card-image">
                                                            <img width="100 px" height="100px"
                                                                src="{{ asset('assets/img/reseller/paket/paket-adidas.jpg') }}"
                                                                class="card-title" alt="Image 1">
                                                        </div>
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $detailTransaksi->nama_produk }}
                                                            </h5>
                                                            <p class="card-text">Qty :
                                                                <span>{{ $detailTransaksi->qty }}</span> x
                                                                <span>Rp.
                                                                    {{ number_format($detailTransaksi->harga, 0, ',', '.') }}</span>
                                                            </p>
                                                            <div class="nav-item position-relative">
                                                                <div class="nav-link">
                                                                    <h5>Sub Total :</h5>
                                                                </div>
                                                                <div class="nav-link position-absolute top-0 end-0">
                                                                    <h5>
                                                                        Rp.
                                                                        {{ number_format($detailTransaksi->sub_total, 0, ',', '.') }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="card-footer nav-link" style="background-color: #f5f5f5">
                                                <h4 class="d-flex justify-content-end py-2 mb-0">
                                                    Total
                                                    &nbsp;
                                                    <span>Rp. {{ number_format($item->total, 0, ',', '.') }}</span>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <br>
            </div>
            <div id="content-pembayaran-diterima" class="tab-pane fade">
                <br>
                @foreach ($transaksi as $item)
                    @if ($item->status === 'Pembayaran Diterima')
                        <hr>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="price">
                                            <h4 style="color: #CE3ABD">ID {{ $item->id }}</h4>
                                        </div>
                                        <hr>
                                        <div class="d-grid">

                                            @if ($item->detail_transaksi)
                                                @foreach ($item->detail_transaksi as $detailTransaksi)
                                                    <div class="d-flex">
                                                        <div class="card-image">
                                                            <img width="100 px" height="100px"
                                                                src="{{ asset('assets/img/reseller/paket/paket-adidas.jpg') }}"
                                                                class="card-title" alt="Image 1">
                                                        </div>
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $detailTransaksi->nama_produk }}
                                                            </h5>
                                                            <p class="card-text">Qty :
                                                                <span>{{ $detailTransaksi->qty }}</span> x
                                                                <span>Rp.
                                                                    {{ number_format($detailTransaksi->harga, 0, ',', '.') }}</span>
                                                            </p>
                                                            <div class="nav-item position-relative">
                                                                <div class="nav-link">
                                                                    <h5>Sub Total :</h5>
                                                                </div>
                                                                <div class="nav-link position-absolute top-0 end-0">
                                                                    <h5>
                                                                        Rp.
                                                                        {{ number_format($detailTransaksi->sub_total, 0, ',', '.') }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="card-footer nav-link" style="background-color: #f5f5f5">
                                                <h4 class="d-flex justify-content-end py-2 mb-0">
                                                    Total
                                                    &nbsp;
                                                    <span>Rp. {{ number_format($item->total, 0, ',', '.') }}</span>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <br>
            </div>
            <div id="content-pesanan-diproses" class="tab-pane fade">
                <br>
                @foreach ($transaksi as $item)
                    @if ($item->status === 'Pesanan Diproses')
                        <hr>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="price">
                                            <h4 style="color: #CE3ABD">ID {{ $item->id }}</h4>
                                        </div>
                                        <hr>
                                        <div class="d-grid">

                                            @if ($item->detail_transaksi)
                                                @foreach ($item->detail_transaksi as $detailTransaksi)
                                                    <div class="d-flex">
                                                        <div class="card-image">
                                                            <img width="100 px" height="100px"
                                                                src="{{ asset('assets/img/reseller/paket/paket-adidas.jpg') }}"
                                                                class="card-title" alt="Image 1">
                                                        </div>
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $detailTransaksi->nama_produk }}
                                                            </h5>
                                                            <p class="card-text">Qty :
                                                                <span>{{ $detailTransaksi->qty }}</span> x
                                                                <span>Rp.
                                                                    {{ number_format($detailTransaksi->harga, 0, ',', '.') }}</span>
                                                            </p>
                                                            <div class="nav-item position-relative">
                                                                <div class="nav-link">
                                                                    <h5>Sub Total :</h5>
                                                                </div>
                                                                <div class="nav-link position-absolute top-0 end-0">
                                                                    <h5>
                                                                        Rp.
                                                                        {{ number_format($detailTransaksi->sub_total, 0, ',', '.') }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="card-footer nav-link" style="background-color: #f5f5f5">
                                                <h4 class="d-flex justify-content-end py-2 mb-0">
                                                    Total
                                                    &nbsp;
                                                    <span>Rp. {{ number_format($item->total, 0, ',', '.') }}</span>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <br>
            </div>
            <div id="content-pesanan-dikirim" class="tab-pane fade">
                <br>
                @foreach ($transaksi as $item)
                    @if ($item->status === 'Pesanan Dikirim')
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="price">
                                            <h4 style="color: #CE3ABD">ID {{ $item->id }}</h4>
                                        </div>
                                        <hr>
                                        <div class="d-grid">
                                            @if ($item->detail_transaksi)
                                                @foreach ($item->detail_transaksi as $detailTransaksi)
                                                    <div class="d-flex">
                                                        <div class="card-image">
                                                            <img width="100 px" height="100px"
                                                                src="{{ asset('assets/img/reseller/paket/paket-adidas.jpg') }}"
                                                                class="card-title" alt="Image 1">
                                                        </div>
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $detailTransaksi->nama_produk }}
                                                            </h5>
                                                            <p class="card-text">Qty :
                                                                <span>{{ $detailTransaksi->qty }}</span> x
                                                                <span>Rp.
                                                                    {{ number_format($detailTransaksi->harga, 0, ',', '.') }}</span>
                                                            </p>
                                                            <div class="nav-item position-relative">
                                                                <div class="nav-link">
                                                                    <h5>Sub Total :</h5>
                                                                </div>
                                                                <div class="nav-link position-absolute top-0 end-0">
                                                                    <h5>
                                                                        Rp.
                                                                        {{ number_format($detailTransaksi->sub_total, 0, ',', '.') }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="card-footer nav-link" style="background-color: #f5f5f5">
                                                <h4 class="d-flex justify-content-end py-2 mb-0">
                                                    Total
                                                    &nbsp;
                                                    <span>Rp. {{ number_format($item->total, 0, ',', '.') }}</span>
                                                </h4>
                                            </div>
                                            <div class="card-body mt-2">
                                                <button type="button" id="konfirmasiBtn{{ $item->id }}"
                                                    class="btn-resell btn-konfirmasi my-2" data-bs-toggle="modal"
                                                    data-bs-target="#detailmodal{{ $item->id }}">Konfirmasi
                                                    Pesanan</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>


                        {{-- Modal konfirmasi --}}

                        <div class="modal fade" id="detailmodal{{ $item->id }}" tabindex="-1"
                            aria-labelledby="ubahStatusLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fs-5" id="ubahStatusLabel">Konfirmasi Pesanan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('pesanan.update', ['id' => $item->id]) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <p>Apakah Anda yakin ingin mengkonfirmasi pesanan ini?</p>
                                            <input type="hidden" name="status" value="Selesai">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-warning">Konfirmasi</button>

                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <br>
            </div>
            <div id="content-selesai" class="tab-pane fade">
                <br>
                @foreach ($transaksi as $item)
                    @if ($item->status === 'Selesai')
                        <hr>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="price">
                                            <h4 style="color: #CE3ABD">ID {{ $item->id }}</h4>
                                        </div>
                                        <hr>
                                        <div class="d-grid">
                                            @if ($item->detail_transaksi)
                                                @foreach ($item->detail_transaksi as $detailTransaksi)
                                                    <div class="d-flex">
                                                        <div class="card-image">
                                                            <img width="100 px" height="100px"
                                                                src="{{ asset('assets/img/reseller/paket/paket-adidas.jpg') }}"
                                                                class="card-title" alt="Image 1">
                                                        </div>
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $detailTransaksi->nama_produk }}
                                                            </h5>
                                                            <p class="card-text">Qty :
                                                                <span>{{ $detailTransaksi->qty }}</span> x
                                                                <span>Rp.
                                                                    {{ number_format($detailTransaksi->harga, 0, ',', '.') }}</span>
                                                            </p>
                                                            <div class="nav-item position-relative">
                                                                <div class="nav-link">
                                                                    <h5>Sub Total :</h5>
                                                                </div>
                                                                <div class="nav-link position-absolute top-0 end-0">
                                                                    <h5>
                                                                        Rp.
                                                                        {{ number_format($detailTransaksi->sub_total, 0, ',', '.') }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="card-footer nav-link" style="background-color: #f5f5f5">
                                                <h4 class="d-flex justify-content-end py-2 mb-0">
                                                    Total
                                                    &nbsp;
                                                    <span>Rp. {{ number_format($item->total, 0, ',', '.') }}</span>
                                                </h4>
                                            </div>
                                            <div class="card-body position-relative">
                                                <div class="nav-link">
                                                    <a type="button" class="btn-resell"
                                                        href="{{ route('invoice.print', $item->id) }}">Cetak</a>
                                                </div>
                                                <div class="nav-link position-absolute end-0">
                                                    <button type="button" id="nilaiProdukBtn{{ $item->id }}"
                                                        class="btn-resell btn-konfirmasi" data-bs-toggle="modal"
                                                        data-bs-target="#nilaiProduk{{ $item->id }}">Nilai
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Modal Rating --}}
                        <div class="modal fade" id="nilaiProduk{{ $item->id }}" tabindex="-1"
                            aria-labelledby="nilaiProdukLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fs-5" id="nilaiProdukLabel">Detail pesanan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true"></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="card-body">
                                                @if ($item->detail_transaksi)
                                                    @foreach ($item->detail_transaksi as $detailTransaksi)
                                                        <p class="mb-3">{{ $detailTransaksi->nama_produk }} - <b>Qty :
                                                                <span>{{ $detailTransaksi->qty }}</span>
                                                            </b></p>
                                                        <p class="form-control">Rp.
                                                            {{ number_format($detailTransaksi->harga, 0, ',', '.') }}
                                                        </p>
                                                        <a href="{{ route('produk_detail.reseller', $detailTransaksi->produks_id) }}"
                                                            class="btn btn-warning form-control">Rate</a>
                                                        <hr>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <br>
            </div>
        </div>
    </div>
@endsection