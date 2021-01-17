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
            <!-- <h5>Tambah daftar menu</h5> -->
        </div>
    </div>

    <div class="row">
        <div class="col-12">
        <h5 class="mb-3">Ubah data pengguna</h5>
        <form action="{{ url('penggunas/'.$pengguna->id) }}" method="post" enctype='multipart/form-data'>
            @method('put')
            @csrf
            <!-- <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10 mt-1"> -->
                    <input type="hidden" class="form-control" type="text" placeholder="1" name='id' id="id" value="{{ $pengguna->id }}">
                <!-- </div>
            </div> -->
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Masukan nama..." name='name' id="name" value="{{ $pengguna->name }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="level" class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-10">
                    <select class="form-control" name="level" id="level">
                        <option value="admin">Admin</option>
                        <option value="user">User / Pelanggan</option>
                        <option value="waiter">Waiter</option>
                        <option value="dapur">Dapur</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name='email' id="email" value="{{ $pengguna->email }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                        <option value="laki-laki">Laki-laki</option>
                        <option value="prempuan">Prempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name='alamat' id="alamat" value="{{ $pengguna->alamat }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="no_telp" class="col-sm-2 col-form-label">No Telepon</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name='no_telp' id="no_telp" value="{{ $pengguna->no_telp }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-10 mt-2">
                    <img src="{{ asset('img/'.$pengguna->gambar) }}" alt="gambar-menu" width="100px" height="80px">
                    <input type="file" class='form-control-file' name='gambar' id="gambar">
                    <!-- <img src="{{ asset('img/'.$pengguna->gambar) }}" alt="gambar-menu" width="100px" height="80px"> -->
                    </div>
                </div>
            <button type="submit" class='btn btn-primary float-right'>Ubah Data</button>
        </form>                    
        </div>
    </div>
@endsection