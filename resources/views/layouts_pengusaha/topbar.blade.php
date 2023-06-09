<nav class="navbar navbar-expand-lg navbar-absolute fixed-top">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;" style="color:#CE3ABD">@yield('title_top')</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">notifications</i>
                        @if ($jml_notif == 0)
                        @else
                            <span class="notification">{{ $jml_notif }}</span>
                        @endif
                        <p class="d-lg-none d-md-block">
                            Some Actions
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        @if ($notifikasi->isEmpty())
                            <a class="dropdown-item" href="#">Tidak Ada Notifikasi
                            </a>
                        @else
                            @foreach ($notifikasi as $n)
                                @if ($n->produks_id == null)
                                    <a class="dropdown-item" href="{{ route('pengusaha.profile') }}">
                                        <div class="row">
                                            <div class="col">
                                                <b>Admin</b>
                                            </div>
                                            <div class="w-100"></div>
                                            <div class="col-lg-2">{{ Str::limit($n->pesan, 40) }}</div>
                                        </div>
                                    </a>
                                @else
                                    <a class="dropdown-item" href="{{ route('produk.edit', $n->produks_id) }}">
                                        <div class="row">
                                            <div class="col">
                                                <b>{{ $n->produks->nama_produk }}</b> - <span><b>Admin</b></span>
                                            </div>
                                            <div class="w-100"></div>
                                            <div class="col-lg-2">{{ Str::limit($n->pesan, 40) }}</div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                            <hr>
                            <form action="{{ route('notif.destroy') }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn-notif mx-3 my-2" type="submit"><i
                                        class="fa-solid fa-rectangle-xmark"></i>&nbsp;
                                    Hapus
                                    Notifikasi</button>
                            </form>
                        @endif
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        @if (auth()->user()->avatar == null)
                            {{ auth()->user()->username }}&nbsp;<i class="material-icons">person</i>
                        @else
                            {{ auth()->user()->username }}&nbsp;<img
                                src="{{ asset('assets/users/' . Auth::user()->role . '/' . Auth::user()->id . '/avatar/' . Auth::user()->avatar) }}"
                                id="preview" class="rounded img-fluid" style="width: 20px; height: 20px;" />
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="{{ route('dashboard.reseller') }}">Dashboard Reseller </a>
                        <a class="dropdown-item" href="{{ route('pengusaha.profile') }}">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Log Out') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
