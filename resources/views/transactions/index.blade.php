@extends('layout/main')

@section('head-title', 'Pengguna')

@section('title')
    <section class="title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="mt-3">Transaksi</h5>
                    <p>Daftar seluruh data yang sedang di proses</p>
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
            <a href="{{ url('/transactions/print') }}" class="btn btn-danger float-right"><i class="fal fa-print"></i></a>
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
                        <th scope="col">Jumlah</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Transaksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                    <tr>
                    <form action="{{ url('transactions/create') }}" method="get">
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $order->meja_id }}<input type="hidden" name="meja_id" id="meja_id" value="<?= $order->meja_id; ?>"></th>
                        <th>{{ $order->nama_masakan }}<input type="hidden" name="nama_masakan" id="nama_masakan" value="<?= $order->nama_masakan; ?>"></th>
                        <th>{{ $order->jumlah }}<input type="hidden" name="jumlah" id="jumlah" value="<?= $order->jumlah; ?>"></th>
                        <th>{{ $order->total_harga }}<input type="hidden" name="total_harga" id="total_harga" value="<?= $order->total_harga; ?>"></th>
                        <th><span class="badge badge-warning">{{ $order->status }}</span><input type="hidden" name="status" id="status" value="<?= $order->status; ?>"></th>
                        <th>{{ $order->tanggal }}<input type="hidden" name="tanggal" id="tanggal" value="<?= $order->tanggal; ?>"></th>
                        <th><button type="submit" class="btn btn-selesai">Selesaikan</th>
                    </tr>
                    </form>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="pagination mt-5" style="position:absolute; bottom: 0;">
        <!-- pagination -->
        {{ $orders->links() }}
    </div>
@endsection