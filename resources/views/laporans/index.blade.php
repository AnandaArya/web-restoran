@extends('layout/main')

@section('head-title', 'Pengguna')

@section('title')
    <section class="title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="mt-3">Laporan</h5>
                    <p>Daftar seluruh data Laporan</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <h5>Order Proses</h5>
            <p class="d-inline">Daftar dari order yang sedang di proses</p>
            <a href="{{ url('/laporans/print') }}" class="btn btn-danger float-right"><i class="fal fa-print"></i></a>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>

                        <th scope="col">NO</th>
                        <th scope="col">No meja</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($laporans as $laporan)
                    <tr>
                    <form action="{{ url('transactions/create') }}" method="get">
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $laporan->meja_id }}</th>
                        <th>{{ $laporan->nama_masakan }}</th>
                        <th>{{ $laporan->total_harga }}</th>
                        <th>{{ $laporan->tanggal }}</th>
                        <th><span class="badge badge-primary p-2 badge-selesai">{{ $laporan->status }}</span></th>
                    </tr>
                    </form>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="pagination mt-5" style="position:absolute; bottom: 0;">
        <!-- pagination -->
        {{ $laporans->links() }}
    </div>
@endsection