@extends('layout/main')

@section('head-title', 'Pengguna')

@section('title')
    <section class="title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="mt-3">Selamat Datang</h5>
                    <p>{{ auth()->user()->name }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h5 class="mb-4">Profil Saya</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <td>{{ auth()->user()->name }}</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Jenis Kelamin</th>
                        <td>{{ auth()->user()->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Role</th>
                        <td>{{ auth()->user()->level }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Alamat</th>
                        <td>{{ auth()->user()->alamat }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Photo</th>
                        <td><img src="{{ asset('img/'.auth()->user()->gambar) }}" alt="user-foto" width="200px" height="200px"></td>
                    </tr>
                    <tr>
                        <th scope="row">No Telepon</th>
                        <td>{{ auth()->user()->no_telp }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection