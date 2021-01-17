@extends('layout/main')

@section('head-title', 'Pengguna')

@section('title')
    <section class="title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="mt-3">Menu</h5>
                    <p>Daftar seluruh data Menu</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h5>Menu Restoran</h5>
            <p>Dibawah ini adalah data dari seluruh Menu</p>
            <a href="{{ url('/masakans/create') }}" class="btn btn-tambah-pengguna mb-3">+ Tambah Menu</a>
            <a href="{{ url('/masakans/print') }}" class="btn btn-danger float-right"><i class="fal fa-print"></i></a>
        </div>
        <div class="col-5">
            <form action="{{ url('masakans/search') }}" method="get">
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
            <table class="table table-striped mb-5">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($masakans as $masakan)
                    <tr>
                        <th scope="row">{{ $masakan->id }}</th>
                        <td>{{ $masakan->nama }}</td>
                        <td><img src="{{ asset('img/'.$masakan->gambar) }}" alt="gambar-menu" width="100px" height="80px"></td>
                        <td>{{ $masakan->harga }}</td>
                        <td>{{ $masakan->status }}</td>
                        <td>
                            <a href="{{ url('masakans/'.$masakan->id.'/edit') }}" class="btn btn-edit-pengguna mx-2" type="submit">Edit</a>
                            <form action="{{ url('masakans/'.$masakan->id) }}" method="post" class="d-inline">
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
    {{ $masakans->links() }}
    </div>
@endsection