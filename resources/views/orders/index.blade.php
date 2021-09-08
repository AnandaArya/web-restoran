@extends('layout/main')

@section('head-title', 'Pengguna')

@section('title')
    <section class="title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="mt-3">Order</h5>
                    <p>Daftar seluruh data Menu</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h5>Order Menu</h5>
            <p>Silahkan Pilih Menu yang ingin anda pesan</p>
            <form action="{{ url('orders/search') }}" method="get" class="d-inline">
                <input type="hidden" class="form-control" name="search" id="search" value="makanan">
                <button type="submit" class="badge badge-warning mb-4">makanan</button>
            </form>
            <form action="{{ url('orders/search') }}" method="get" class="d-inline">
                <input type="hidden" class="form-control" name="search" id="search" value="minuman">
                <button type="submit" class="badge badge-warning mb-4">minuman</button>
            </form>
            <!-- <a href="" class="badge badge-warning mb-4">minuman</a> -->
        </div>
    </div>

    <div class="row">

        @foreach($orders as $order)
        <div class="col-3">
            <div class="card" style="width: 14rem;">
                <img src="{{ asset('img/'.$order->gambar) }}" class="card-img-top" alt="menu">
                <div class="card-body">
                    <h5 class="card-title">{{ $order->nama }}</h5>
                    <p class="card-text">Rp. {{ $order->harga }}</p>
                    <span class="badge badge-{{ $order->status == 'Tersedia' ? 'success':'danger' }} d-block p-1 my-2">{{ $order->status }}</span>
                    <a href="{{ url('orders/'.$order->id.'/new') }}" class="btn btn-pesan-menu d-block">Pesan</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="pagination mt-5" style="position:absolute; bottom: 0;">
        {{ $orders->links() }}
    </div>
    
@endsection
