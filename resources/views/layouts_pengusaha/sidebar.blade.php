<div class="sidebar" data-color="purple" data-background-color="white">
    <div class="logo"><a class="simple-text logo-normal">
            <i class="fa-solid fa-store"></i>
            <nbsp> Yok Resell
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item  {{ set_active('dashboard.pengusaha') }}">
                <a href="{{ route('dashboard.pengusaha') }}" class="nav-link">
                    <i><img src="/assets/img/icon/dashboard-sidebar.png" alt="" srcset=""></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ set_active(['produk.pengusaha', 'produk.create', 'produk.edit']) }}">
                <a href="{{ route('produk.pengusaha') }}" class="nav-link">
                    <i><img src="/assets/img/icon/paket-usaha.png" alt="" srcset=""></i>
                    <p>Paket Usaha</p>
                </a>
            </li>
            <li class="nav-item {{ set_active('transaksi.pengusaha') }}">
                <a class="nav-link" href="{{ route('transaksi.pengusaha') }}">
                    <i><img src="/assets/img/icon/transaksi-sidebar.png" alt="" srcset=""></i>
                    <p>Transaksi</p>
                </a>
            </li>
            <li class="nav-item {{ set_active('laporan.pengusaha') }}">
                <a class="nav-link" href="{{ route('laporan.pengusaha') }}">
                    <i><img src="/assets/img/icon/laporan-sidebar.png" alt="" srcset=""></i>
                    <p>Laporan</p>
                </a>
            </li>
            <li class="nav-item {{ set_active('review.pengusaha') }}">
                <a class="nav-link" href="{{ route('review.pengusaha') }}">
                    <i><img src="/assets/img/icon/review-sidebar.png" alt="" srcset=""></i>
                    <p>Review</p>
                </a>
            </li>
        </ul>
    </div>
</div>
