@extends('layout/main')

@section('head-title', 'Pengguna')

@section('title')
    <section class="title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="mt-3">Pengguna</h5>
                    <p>Daftar seluruh data pengguna</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h5>Pengguna</h5>
            <p>Dibawah ini adalah data dari seluruh pengguna</p>
            <a href="{{ url('penggunas/create') }}" class="btn btn-tambah-pengguna mb-3">+ Tambah Pengguna</a>
            <a href="{{ url('/penggunas/print') }}" class="btn btn-danger float-right"><i class="fal fa-print"></i></a>

        </div>

        <div class="col-5">
            <form action="{{ url('penggunas/search') }}" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" name="search" id="search" placeholder="Masukan Pencarian...">
                </div>
            </div>
        <div class="col-3">
                <button type="submit" class="btn btn-primary" style="margin-left: -20px;">Search</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penggunas as $pengguna)
                    <tr>
                        <th scope="row">{{ $pengguna->id }}</th>
                        <td>{{ $pengguna->email }}</td>
                        <td>{{ $pengguna->name }}</td>
                        <td>{{ $pengguna->level }}</td>
                        <td>
                            <a href="{{ url('penggunas/'.$pengguna->id.'/edit') }}" class="btn btn-edit-pengguna mx-2">Edit</a>
                            <form action="{{ url('penggunas/'.$pengguna->id) }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="pagination mt-5" style="position:absolute; bottom: 0;">
        {{ $penggunas->links() }}
    </div>
@endsection