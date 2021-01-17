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
        <h5 class="mb-3">Tambah data pengguna</h5>
        <form action="{{ url('penggunas/store') }}" method="post" enctype='multipart/form-data'>
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Masukan nama..." name='name' id="name" >
                </div>
            </div>
            <div class="form-group row">
                <label for="level" class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-10">
                    <select class="form-control" name="level" id="level">
                        <option value="admin">Admin</option>
                        <option value="dapur">Dapur</option>
                        <option value="pelanggan">Pelanggan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Masukan email..." name='email' id="email" >
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input class="form-control" type="password" placeholder="Masukan password..." name='password' id="password" >
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
                    <input class="form-control" type="text" placeholder="Masukan alamat..." name='alamat' id="alamat" >
                </div>
            </div>
            <div class="form-group row">
                <label for="no_telp" class="col-sm-2 col-form-label">No Telepon</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Masukan No Telepon..." name='no_telp' id="no_telp" >
                </div>
            </div>
            <div class="form-group row">
                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-10 mt-2">
                    <input type="file" class='form-control-file' name='gambar' id="gambar">
                </div>
            </div>
            <button type="submit" class='btn btn-primary float-right'>Submit</button>
        </form>                    
        </div>
    </div>
@endsection