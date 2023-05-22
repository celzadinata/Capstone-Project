@extends('layouts_admin.app')
@section('title', 'Kategori')
@section('content')
    <div class="content">
        <div class="card">
        <div class="container">
            <div class="card_header">
                <h2>Kategori</h2>
            </div>
            <a href="{{ route('kategori.add') }}"><button class="btn btn-primary">Tambah Kategori</button></a>
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th width="5%">No</th>
                        <th>Name</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $c)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $c->nama }}</td>
                            <td>
                                <a href="{{ route('kategori.edit', $c->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="{{ route('kategori.destroy', $c->id) }}" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $kategori->links() }}
        </div>
    </div>
</div>
@endsection
