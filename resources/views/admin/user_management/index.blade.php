@extends('layouts_admin.app')
@section('title', 'User Management')
@section('title_top', 'USER MANAGEMENT')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-1">
                                <div class="row">
                                    <div class="col text-right">
                                        <input class="table-filter py-2 px-2 mr-2" type="text" id="myInput"
                                            data-table="table" placeholder="Cari"><i
                                            class="fa-solid fa-magnifying-glass px-3 py-3" id="cari"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Nama</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $u)
                                            <tr style="color: #CE3ABD; background-color: white; font-weight: 500;">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $u->nama_depan }}</td>
                                                <td>{{ Str::title($u->role) }}</td>
                                                <td>{{ $u->status }}</td>
                                                <td>
                                                    <a href="{{ route('confirm_user.admin', $u->id) }}"
                                                        class="btn btn-warning">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    {{-- <a href="{{ route('destroy_user.admin',$u->id) }}" class="btn" id="btn_table">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $user->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
