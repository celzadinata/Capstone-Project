<div class="sidebar" data-color="purple" data-background-color="white">
    <div class="logo"><a class="simple-text logo-normal">
            <i class="fa-solid fa-store"></i>
            <nbsp> Yok Resell
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item  {{ set_active('dashboard.admin') }}">
                <a href="{{ route('dashboard.admin') }}" class="nav-link">
                    <i><img src="/assets/img/icon/dashboard-sidebar.png" alt="" srcset=""></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ set_active(['kategori', 'kategori.add', 'kategori.edit']) }}">
                <a href="{{ route('user.admin') }}" class="nav-link">
                    <i><img src="/assets/img/icon/kategori-30.png" alt="" srcset=""></i>
                    <p>Kategori Usaha</p>
                </a>
            </li>
            <li class="nav-item {{ set_active('user.admin') }}">
                <a href="{{ route('user.admin') }}" class="nav-link">
                    <i><img src="/assets/img/icon/users-admin-30.png" alt="" srcset=""></i>
                    <p>User Management</p>
                </a>
            </li>
            <li class="nav-item {{ set_active('konfirmasi.admin') }}">
                <a href="{{ route('konfirmasi.admin') }}" class="nav-link">
                    {{-- <i><img src="/assets/img/icon/users-admin-30.png" alt="" srcset=""></i> --}}
                    <p>Konfirmasi Produk</p>
                </a>
            </li>
        </ul>
    </div>
</div>
