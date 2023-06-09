@extends('layouts_pengusaha.app')
@section('title', 'Profile')
@section('title_top', 'PROFILE')
@section('content')
    <section style="background-color: #eee;">
        <form action="{{ route('pengusaha.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="container pt-5">
                <div class="col p-md-5 mx-md-6">
                    <div class="row bg-white rounded">
                        <div class="col-md-4 col-lg-4 order-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mb-2">
                                                <div class="text-center">
                                                    @if (Auth::user()->avatar == null)
                                                        <img src="{{ asset('assets/img/icon/admin.png') }}" id="preview"
                                                            class="rounded img-fluid"
                                                            style="width: 150px; height: 150px;" />
                                                    @else
                                                        <img src="{{ asset('assets/users/' . Auth::user()->role . '/' . Auth::user()->id . '/avatar/' . Auth::user()->avatar) }}"
                                                            id="preview" class="rounded img-fluid"
                                                            style="width: 150px; height: 150px;" />
                                                    @endif
                                                    <h5 class="my-3">{{ Auth::user()->nama_depan }}</h5>
                                                    <p class="text-muted mb-3">{{ '@' . Auth::user()->username }}</p>
                                                    <div class="d-flex justify-content-center mb-2">
                                                        <input type="file" accept="image/*"
                                                            class="form-control text-muted @error('avatar') is-invalid @enderror"
                                                            name="avatar" id="avatar" aria-describedby="avatarHelp"
                                                            style="display: none" onchange="PreviewImage()">
                                                        <input type="button" value="Ubah Avatar"
                                                            class="btn btn-outline-primary ms-1"
                                                            onclick="document.getElementById('avatar').click();" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-8 order-md-1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div>
                                            <div class="mb-4">
                                                <label for="nama" class="form-label"
                                                    style="color:#CE3ABD; font-weight: 700">Nama</label>
                                                <input type="text"
                                                    class="form-control text-muted @error('nama') is-invalid @enderror"
                                                    name="nama" id="nama" aria-describedby="namaHelp"
                                                    value="{{ Auth::user()->nama_depan }}">
                                                @error('nama')
                                                    <div id="namaHelp" class="form-text">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label for="username" class="form-label"
                                                    style="color:#CE3ABD; font-weight: 700">Username</label>
                                                <input type="text"
                                                    class="form-control text-muted @error('username') is-invalid @enderror"
                                                    name="username" id="username" aria-describedby="usernameHelp"
                                                    value="{{ Auth::user()->username }}" disabled>
                                                @error('username')
                                                    <div id="usernameHelp" class="form-text">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label for="email" class="form-label"
                                                    style="color:#CE3ABD; font-weight: 700">Email</label>
                                                <input type="email"
                                                    class="form-control text-muted @error('email') is-invalid @enderror"
                                                    name="email" id="email" aria-describedby="emailHelp"
                                                    value="{{ Auth::user()->email }}" disabled>
                                                @error('email')
                                                    <div id="emailHelp" class="form-text">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label for="nama_perusahaan" class="form-label"
                                                    style="color:#CE3ABD; font-weight: 700">Usaha</label>
                                                <input type="nama_perusahaan"
                                                    class="form-control text-muted @error('nama_perusahaan') is-invalid @enderror"
                                                    name="nama_perusahaan" id="nama_perusahaan"
                                                    aria-describedby="nama_perusahaanHelp"
                                                    value="{{ Auth::user()->nama_perusahaan }}" disabled>
                                                @error('nama_perusahaan')
                                                    <div id="nama_perusahaanHelp" class="form-text">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            {{-- <div class="mb-4">
                                                <label for="jenisKelamin" class="form-label" style="color:#CE3ABD; font-weight: 700">Jenis Kelamin</label>
                                                <select class="form-select"
                                                    class="form-control text-muted @error('jenisKelamin') is-invalid @enderror"
                                                    name="jenisKelamin" id="jenisKelamin"
                                                    aria-label="Default select example">
                                                    @if (Auth::user()->first_name == 'laki-laki')
                                                        <option selected value="{{ Auth::user()->jenis_kelamin }}">
                                                            Laki - laki</option>
                                                        <option value="perempuan">Perempuan</option>
                                                    @else
                                                        <option value="laki-laki">
                                                            Laki - laki</option>
                                                        <option selected value="{{ Auth::user()->jenis_kelamin }}">Perempuan
                                                        </option>
                                                    @endif
                                                </select>
                                                @error('jenisKelamin')
                                                    <div id="namaprodukHelp" class="form-text">{{ $message }}</div>
                                                @enderror
                                            </div> --}}

                                            <div class="mb-4">
                                                <label for="no_hp" class="form-label"
                                                    style="color:#CE3ABD; font-weight: 700">Telepon</label>
                                                <input type="no_hp"
                                                    class="form-control text-muted @error('no_hp') is-invalid @enderror"
                                                    name="no_hp" id="no_hp" value="{{ Auth::user()->no_hp }}">
                                                @error('no_hp')
                                                    <div id="no_hpHelp" class="form-text">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-4">
                                                <div class="autocomplete-container" id="autocomplete-container">
                                                    <label for="alamat" class="form-label"
                                                        style="color:#CE3ABD; font-weight: 700">Alamat</label>
                                                    <div id="temp" hidden>{{ Auth::user()->alamat }}</div>
                                                </div>
                                                @error('alamat')
                                                    <div id="alamatHelp" class="form-text">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>

                                            <input type="hidden" id="latitude" name="latitude">
                                            <input type="hidden" id="longitude" name="longitude">

                                            <div class="mb-4">
                                                <label for="berkas" class="form-label"
                                                    style="color:#CE3ABD; font-weight: 700">KTP</label>
                                                <div class="row mb-3">
                                                    <div class="col-md-9">
                                                        <div class="file-upload">
                                                            <div class="file-select">
                                                                <div class="file-select-button" id="fileName"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-upload fa-7x" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                                        <path
                                                                            d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                                                                    </svg>
                                                                </div>
                                                                <div class="file-select-name" id="noFile">
                                                                    @if (Auth::user()->berkas)
                                                                        {{ Auth::user()->berkas }}
                                                                    @else
                                                                        <div class="text-muted font-italic">Belum
                                                                            mengupload file...</div>
                                                                    @endif
                                                                </div>
                                                                <input type="file"
                                                                    class="form-control @error('berkas') is-invalid @enderror"
                                                                    name="berkas" aria-describedby="berkasHelp"
                                                                    id="chooseFile" onchange="PreviewBerkas()">
                                                                @error('berkas')
                                                                    <div id="namaprodukHelp" class="form-text">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button type="button" class="btn btn-sm" id="button_berkas_user"
                                                            data-toggle="modal" data-target=".ktp">Lihat
                                                            Berkas</button>
                                                    </div>
                                                    <div class="ktp modal fade bd-example-modal-lg" tabindex="-1"
                                                        role="dialog" aria-labelledby="myLargeModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content" id="modal">
                                                                @if (Auth::user()->berkas == null)
                                                                    <h3 class="py-5 text-center" style="color:#CE3ABD">
                                                                        Berkas KTP Masih Belum
                                                                        Dimasukkan</h3>
                                                                @else
                                                                    <embed type="application/pdf"
                                                                        src="{{ asset('assets/users/' . Auth::user()->role . '/' . Auth::user()->id . '/berkasprofil/' . Auth::user()->berkas) }}"
                                                                        width="100%" height="400"></embed>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <label for="password" class="form-label"
                                                    style="color:#CE3ABD; font-weight: 700">Password Baru</label>
                                                <input type="password"
                                                    class="form-control text-muted @error('password') is-invalid @enderror"
                                                    name="password" id="password">
                                                @error('password')
                                                    <div id="passwordHelp" class="form-text">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="password_confirmation" class="form-label"
                                                    style="color:#CE3ABD; font-weight: 700">Password
                                                    Konfirmasi</label>
                                                <input type="password"
                                                    class="form-control text-muted @error('password_confirmation') is-invalid @enderror"
                                                    name="password_confirmation" id="password_confirmation">
                                                @error('password_confirmation')
                                                    <div id="passwordConfirmationHelp" class="form-text">{{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="nav-icon fas fa-save"></i>
                                                Simpan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="container mb-2">
            <div class="col px-md-5 mx-md-6">
                <div class="row bg-white rounded">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="">
                                    <div>
                                        <h5 class="my-3" style="color:#CE3ABD; font-weight: 700">Tautan dompet
                                            digital mu</h5>
                                        <p class="text-muted mb-3"><i class="fab fa-paypal fa-lg"
                                                style="color: #063a93;"></i>
                                            @if (Auth::user()->paypal_email)
                                                {{ Auth::user()->paypal_email }}
                                            @else
                                                <small class="text-muted font-italic">Belum
                                                    ditautkan</small>
                                            @endif
                                        </p>
                                        <p class="text-muted mb-3"><img src="{{ asset('assets/img/bca.png') }}"
                                                alt="bca" style="height: 15px; width: 25px">
                                            @if (Auth::user()->no_rek)
                                                {{ Auth::user()->no_rek }}
                                            @else
                                                <small class="text-muted font-italic">Belum
                                                    ditautkan</small>
                                            @endif
                                        </p>
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#detailModal">
                                            Ubah info
                                        </button>
                                        <div class="modal fade" id="detailModal" tabindex="-1" role="dialog"
                                            aria-labelledby="detailModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="detailModalLabel">
                                                            Ubah informasi dompet
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('ubah.payment.info') }}" method="POST">
                                                            @csrf
                                                            @method('put')
                                                            <div class="mb-4">
                                                                <label for="paypal_email" class="form-label"
                                                                    style="color:#CE3ABD; font-weight: 700">Paypal
                                                                    Email</label>
                                                                <input type="text"
                                                                    class="form-control text-muted @error('paypal_email') is-invalid @enderror"
                                                                    name="paypal_email" id="paypal_email"
                                                                    aria-describedby="paypal_emailHelp"
                                                                    value="{{ Auth::user()->paypal_email }}">
                                                                @error('paypal_email')
                                                                    <div id="paypal_emailHelp" class="form-text">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-4">
                                                                <label for="no_rek" class="form-label"
                                                                    style="color:#CE3ABD; font-weight: 700">Nomor
                                                                    Rekening (BCA)</label>
                                                                <input type="text"
                                                                    class="form-control text-muted @error('no_rek') is-invalid @enderror"
                                                                    name="no_rek" id="no_rek"
                                                                    aria-describedby="no_rekHelp"
                                                                    value="{{ Auth::user()->no_rek }}">
                                                                @error('no_rek')
                                                                    <div id="no_rekHelp" class="form-text">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="nav-icon fas fa-save"></i>
                                                                Simpan
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="{{ asset('assets/js/reseller/alamat-autocomplete-profile.js') }}"></script>

@endsection
