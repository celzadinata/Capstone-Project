<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars py-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.reseller') }}">Home</a>
                </li>
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Kategori
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($list_kategori as $k)
                            <li><a class="dropdown-item"
                                    href="{{ route('produk_kategori.reseller', $k->id) }}">{{ $k->nama }}</a></li>
                        @endforeach
                        <hr>
                        <li><a class="dropdown-item" href="{{ route('kategori.reseller') }}"><i
                                    class="fa-solid fa-bars"></i> Semua Kategori</a></li>
                    </ul>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produk.reseller') }}">Paket Usaha</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto nav-center">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('keranjang')}}"><i class="fas fa-shopping-cart"></i></a>
                    </li>
                    @if (Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.admin') }}"><i class="fa fa-wrench"></i> Admin
                                CMS</a>
                        @elseif (Auth::user()->role == 'pengusaha')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.pengusaha') }}"><i class="fa fa-wrench"></i>
                                Pengusaha
                                CMS</a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->username }} <i class="fas fa-user-circle"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if (auth()->user()->role == 'pengusaha')
                                <li><a class="dropdown-item" href="{{ route('profile.reseller') }}">Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Log Out') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @elseif (auth()->user()->role == 'admin')
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Log Out') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @elseif(auth()->user()->role == 'reseller')
                                <li><a class="dropdown-item" href="{{ route('profile.reseller') }}">Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Log Out') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('role') }}">Register</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
