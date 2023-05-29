{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars py-1"></i>
        </button>
        @guest
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Pakaian</a></li>
                            <li><a class="dropdown-item" href="#">Makanan</a></li>
                            <li><a class="dropdown-item" href="#">Peralatan</a></li>
                            <li><a class="dropdown-item" href="#">Sport</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('paket_usaha') }}">Paket Usaha</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto nav-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-shopping-cart pe-3"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('role') }}">Register</a>
                    </li>
                </ul>
            </div>
        @endguest

        @auth
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Pakaian</a></li>
                            <li><a class="dropdown-item" href="#">Makanan</a></li>
                            <li><a class="dropdown-item" href="#">Peralatan</a></li>
                            <li><a class="dropdown-item" href="#">Sport</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="paket_usaha.php">Paket Usaha</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto nav-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-shopping-cart pe-3"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Username <i class="fas fa-user-circle username"></i></a>
                    </li>
                </ul>
            </div>
        @endauth
    </div>
</nav>
{{-- ./Navbar --}}
