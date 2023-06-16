@section('title', 'Keranjang')
<div class="container cart">
    <hr class="my-2 opacity-100" style="border: 1px solid var(--pink)" data-aos="flip-right" data-aos-delay="100"
        wire:ignore>
    <div class="card my-4">
        <div class="card-items">
            <div class="row p-5">
                {{-- <a href="{{route('keranjang.add', 'AYM002')}}">add to cart</a> --}}
                <h1 class="fw-bolder text-purple"><i class="fa-solid fa-cart-shopping"></i> Keranjang</h1>
                <hr class="my-2 opacity-100" style="border: 1px solid var(--pink)">
                @if ($cart_item->toArray() != null)
                    @foreach ($cart_item as $key => $item)
                        <div class="col-md-12 mb-4">
                            <div class="row border rounded p-2">
                                <div class="col-md-2">
                                    <img class="rounded mx-auto d-block"
                                        style="width: 100%; height: 100px; object-fit: cover;"
                                        src="{{ asset('assets/users/pengusaha/' . $item->produk->users_id . '/' . $item->produk->foto) }}"
                                        alt="">
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
                                            <small class="text-muted qty">
                                                <button
                                                    class="button-minus border rounded-circle icon-shape icon-sm mx-1"
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
                                        <div>
                                            <button class="btn-hapus" id="hapus-item"
                                                wire:click="removeItem({{ $item->id }})"><i
                                                    class="fa-solid fa-trash-can"></i> Hapus dari
                                                keranjang</button>
                                        </div>
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
                                    <div class="col-6 text-end"><i class="bi bi-chevron-down"></i>
                                    </div>
                                </div>
                                <div id="detail_item" class="collapse">
                                    <div class="row px-2 detail-item" style="color: rgb(153, 153, 153)">
                                        @foreach ($cart_item as $detail_item)
                                            <div class="col-5 fw-normal"> {{ $detail_item->produk->nama_produk }}
                                            </div>
                                            <div class="col-7 fw-normal"> {{ $detail_item->qty }}x </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="col-5 mb-2">Subtotal</div>
                            <div class="col-7 mb-2">Rp {{ number_format($sub) }}</div>
                            <div class="col-5 mb-2">Pajak</div>
                            <div class="col-7 mb-2">Rp 0</div>
                            <div class="col-5 mb-2">Biaya admin</div>
                            <div class="col-7 mb-2">Rp {{ number_format($admin) }} <i class="fa fa-info-circle fa-2xs"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Biaya admin adalah 4% dari total keranjang" aria-hidden="true"></i></div>
                            <div class="col-5 fw-bolder mb-2">Total</div>
                            <div class="col-7 fs-4 text-purple fw-bolder">Rp {{ number_format($total) }}</div>
                            <div class="px-3">
                                <hr class="mb-0">
                            </div>
                            <form class="px-3" action="{{ route('keranjang.checkout') }}" method="POST"
                                style="margin: 0; padding: 0">
                                @csrf
                                <input type="hidden" value="{{ $total }}" name="total">
                                <button type="submit" class="btn-checkout mt-3 fw-bolder"><i
                                        class="fa-solid fa-money-check-dollar fa-beat fa-lg"></i>
                                    Checkout</button>
                            </form>
                            <div class="px-3">
                                <div
                                    style="height: 15px; border-bottom: 1px solid rgb(184, 184, 184); text-align: center">
                                    <span style="font-size: 15px; background-color: #FFF; padding: 0 10px 0 10px">
                                        <b class="text-muted" style="font-size: 12px">Atau bayar via</b>
                                    </span>
                                </div>
                            </div>
                            <div class="px-3">
                                <button type="submit" class="btn-paypal mt-3" wire:click="checkout()"><img
                                        src="{{ asset('assets/img/paypal.png') }}" alt="paypal"
                                        style="width: 100px; height: 25px;"></button>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="cart-kosong">
                        <i class="fa-solid fa-basket-shopping fa-bounce"></i>
                        <h2>Keranjang mu kosong</h2>
                        <p class="text-muted">Ayo belanja produk dulu agar keranjangmu ada isinya</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
