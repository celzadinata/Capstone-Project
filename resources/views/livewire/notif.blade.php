<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        Notifikasi <i class="fa-solid fa-bell"></i>
        @if ($jml_notif == null)
        @else
            <span class="badge">{{ $jml_notif }}</span>
        @endif
    </a>
    <style>
        .badge {
            position: absolute;
            top: -10px;
            right: -10px;
            padding: 5px 10px;
            border-radius: 50%;
            background-color: red;
            color: white;
        }
    </style>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        @if ($notifikasi->isEmpty())
            <li><a class="dropdown-item" href="#">Tidak Ada Notifikasi</a>
            </li>
        @else
            @foreach ($notifikasi as $n)
                <li><a class="dropdown-item" href="{{ route('profile.reseller') }}">
                        <div class="row">
                            <div class="col">
                                <b>- Admin</b>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-lg-2">&nbsp;{{ Str::limit($n->pesan, 40) }}</div>
                        </div>
                    </a>
                </li>
            @endforeach
        @endif
        <hr>
        <li class="text-center">
            <form action="{{ route('notif.destroy') }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn-notif" type="submit"><i class="fa-solid fa-x"></i></button>
            </form>
        </li>
    </ul>
</li>
