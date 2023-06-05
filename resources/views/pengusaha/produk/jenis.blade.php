@extends('layouts_pengusaha.app')
@section('title', 'Pilih Jenis')
@section('content')
    <style>
        .rad-label {
            display: flex;
            align-items: center;
            border-radius: 100px;
            padding: 14px 16px;
            margin: 10px 0;
            cursor: pointer;
            transition: .3s;
        }

        .rad-label:hover,
        .rad-label:focus-within {
            background: hsla(0, 0%, 80%, .14);
        }

        .rad-input {
            position: absolute;
            left: 0;
            top: 0;
            width: 1px;
            height: 1px;
            opacity: 0;
            z-index: -1;
        }

        .rad-design {
            width: 20px;
            height: 20px;
            border-radius: 100px;
            background: linear-gradient(to bottom left, #CE3ABD, #B500A0);
            position: relative;
        }

        .rad-design::before {
            content: '';
            display: inline-block;
            width: inherit;
            height: inherit;
            border-radius: inherit;
            background: hsl(0, 0%, 90%);
            transform: scale(1.1);
            transition: .3s;
        }

        .rad-input:checked+.rad-design::before {
            transform: scale(0);
        }

        .rad-text {
            color: hsl(0, 0%, 60%);
            margin-left: 14px;
            font-size: 15px;
            transition: .3s;
        }

        .rad-input:checked~.rad-text {
            color: #CE3ABD;
        }
    </style>
    <div class="content">
        <div class="container-fluid">
            <div class="card px-4">
                <div class="shadow mb-2">
                    <form method="GET" action="{{ route('produk.create') }}">
                        @csrf
                        <h3>Pilih Jenis:</h3>
                        <div>
                            <label class="rad-label">
                                <input type="radio" class="rad-input" name="rad" value="paket_usaha">
                                <div class="rad-design"></div>
                                <div class="rad-text">Paket Usaha</div>
                            </label>
                            <label class="rad-label">
                                <input type="radio" class="rad-input" name="rad" value="supply">
                                <div class="rad-design"></div>
                                <div class="rad-text">Supply Barang</div>
                            </label>
                        </div>
                        <a href="{{ route('produk.pengusaha') }}" class="btn btn-primary mb-3">Kembali</a>
                        <button type="submit" class="btn btn-primary mb-3">Berikutnya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
