                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Kategori
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($list_kategori as $k)
                            <li><a class="dropdown-item"
                                    href="{{ route('produk_kategori.reseller', $k->slug) }}">{{ $k->nama }}</a></li>
                        @endforeach
                        <hr>
                        <li><a class="dropdown-item" href="{{ route('kategori.reseller') }}"><i
                                    class="fa-solid fa-bars"></i> Semua Kategori</a></li>
                    </ul>
                </li>
