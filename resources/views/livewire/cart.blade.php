<div class="container">
    <div class="card mb-5">
        <div class="card-items">
            <div class="row p-5">
                {{-- <a href="{{route('keranjang.add', 'AYM002')}}">add to cart</a> --}}
                <h1 class="fw-bolder text-purple"><i class="bi bi-cart4"></i> Keranjang</h1>
                <hr class="my-2 hr-header opacity-100 text-purple">
                @if ($cart_item->toArray() != null)
                    @foreach ($cart_item as $key => $item)
                        <div class="col-md-12 mb-4">
                            <div class="row border rounded p-2">
                                <div class="col-md-2">
                                    <img class="rounded mx-auto d-block pb-2"
                                        src="{{ asset('assets/img/apple-icon.png') }}" alt="">
                                </div>
                                <div class="col-md-10">
                                    <div class="row fw-bolder" style="color: #CE3ABD">
                                        <div class="col-md-3 pb-2">
                                            {{ $item->produk->nama_produk }}
                                            <br>
                                            <small class="text-muted">Stok: {{ $item->produk->stok }}</small>
                                        </div>
                                        <div class="col-md-3 pb-2">
                                            Harga Satuan
                                            <br>
                                            <small class="text-muted">Rp
                                                {{ number_format($item->produk->harga) }}</small>
                                        </div>
                                        <div class="col-md-3 pb-2">
                                            Kuantitas
                                            <br>
                                            <small class="text-muted">
                                                <button
                                                    class="button-minus border rounded-circle  icon-shape icon-sm mx-1"
                                                    wire:click="decrementQty({{ $item->id }})">
                                                    -
                                                </button>
                                                {{ $item->qty }}
                                                <button
                                                    class="button-plus border rounded-circle icon-shape icon-sm lh-0"
                                                    wire:click="incrementQty({{ $item->id }})">
                                                    +
                                                </button>
                                            </small>
                                        </div>
                                        <div class="col-md-3 pb-2">
                                            Total
                                            <br>
                                            <small class="text-muted">Rp {{ number_format($subtotal[$key]) }}</small>
                                        </div>
                                        <small class="text-danger text-left"
                                            style="font-size: 10px; text-decoration: underline" id="hapus-item"
                                            wire:click="removeItem({{ $item->id }})">Hapus dari keranjang</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-7"></div>
                    <div class="col-md-5 border rounded p-3">
                        <h2 class="fw-bolder text-purple">Detail</h2>
                        <hr class="my-2 hr-header opacity-100 text-purple">
                        <div class="row">
                            <div class="col-12 mb-2" data-bs-toggle="collapse" data-bs-target="#detail_item"
                                id="detail-item">
                                <div class="row">
                                    <div class="col-6">Detail item</div>
                                    <div class="col-6 text-center position-relative"><i
                                            class="bi bi-chevron-down position-absolute end-0"></i></div>
                                </div>
                                <div id="detail_item" class="collapse">
                                    <div class="row px-2 detail-item" style="color: rgb(153, 153, 153)">
                                        @foreach ($cart_item as $detail_item)
                                            <div class="col-9 fw-normal mb-1"> {{ $detail_item->produk->nama_produk }}
                                            </div>
                                            <div class="col-3 fw-normal mb-1"> {{ $detail_item->qty }}x </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="col-5 mb-2">Subtotal</div>
                            <div class="col-7 mb-2">Rp {{ number_format($total) }}</div>
                            <div class="col-5 mb-2">Pajak</div>
                            <div class="col-7 mb-2">Rp 0</div>
                            <div class="col-5 fw-bolder mb-2">Total</div>
                            <div class="col-7 fs-4 text-purple fw-bolder">Rp {{ number_format($total) }}</div>
                            <form action="{{ route('keranjang.checkout') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $total }}" name="total">
                                <button type="submit" class="btn mt-3 text-light fw-bolder"
                                    style="background-color: #CE3ABD">Checkout</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div style="text-align: center;">
                        <i class="bi bi-basket fa-5x fa-fw"></i>
                        <h2 style="margin-top: 0.25em; color: #CC20B9;">Keranjang mu kosong </h2>
                        <p class="text-muted">Ayo belanja produk dulu agar keranjangmu ada isinya</p>
                    </div>
                @endif


            </div>
        </div>
    </div>
</div>
