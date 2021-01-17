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
        <h5 class="mb-3">Tambah daftar menu</h5>
        <form action="{{ url('masakans/store') }}" method="post" enctype='multipart/form-data'>
            @csrf
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10 mt-1">
                    <input class="form-control" type="text" placeholder="1" name='id' id="id" >
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Menu</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Nasi Kuning" name='nama' id="nama" >
                </div>
            </div>
            <div class="form-group row">
                <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <select class="form-control" name="kategori" id="kategori">
                        <option value="makanan">Makanan</option>
                        <option value="minuman">Minuman</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="30000" name='harga' id="harga" >
                </div>
            </div>
            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select class="form-control" name="status" id="status">
                        <option value="tersedia">Tersedia</option>
                        <option value="habis">Habis</option>
                    </select>
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