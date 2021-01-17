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
    <?php 

        $month = date('m');
        $day = date('d');
        $year = date('Y');

        $today = $year . '-' . $month . '-' . $day;
    ?>
    <div class="row">
        <div class="col-12">
            <!-- <h5>Tambah daftar menu</h5> -->
        </div>
    </div>

    <div class="row">
        <div class="col-12">
        <h5 class="mb-3">Silahkan Isi Pesanan</h5>
        <form action="{{ url('transactions/store') }}" method="post" enctype='multipart/form-data'>
            @csrf
            <!-- <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10 mt-1"> -->
                
                <!-- </div>
            </div> -->

            <div class="form-group row">
                <label for="meja_id" class="col-sm-2 col-form-label">No Meja    </label>
                <div class="col-sm-10">
                    <p class="mt-2">{{ $transactions->meja_id }}</p>
                    <input class="form-control" type="hidden" name='meja_id' id="meja_id" value="{{ $transactions->meja_id }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_masakan" class="col-sm-2 col-form-label">Nama Masakan</label>
                <div class="col-sm-10">
                    <p class="mt-2">{{ $transactions->nama_masakan }}</p>
                    <input class="form-control" type="hidden" name='nama_masakan' id="nama_masakan" value="{{ $transactions->nama_masakan }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                    <p class="mt-2">{{ $transactions->jumlah }}</p>
                    <input class="form-control" type="hidden" name='jumlah' id="jumlah" value="{{ $transactions->jumlah }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="total_harga" class="col-sm-2 col-form-label">Total Harga</label>
                <div class="col-sm-10">
                    <p class="mt-2">{{ $transactions->total_harga }}</p>
                    <input class="form-control" type="hidden" name='total_harga' id="total_harga" value="{{ $transactions->total_harga }}">
                    <input class="form-control" type="hidden" name='status' id="status" value="selesai">
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <p class="mt-2">{{ $transactions->tanggal }}</p>
                    <input class="form-control" type="hidden" name='tanggal' id="tanggal" value="{{ $transactions->tanggal }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="bayar" class="col-sm-2 col-form-label">Bayar</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name='bayar' id="bayar">
                </div>
                    <p class="btn btn-primary" onclick="hitungKembalian()">Kembalian</p>
            </div>
            <div class="form-group row">
                <label for="bayar" class="col-sm-2 col-form-label">Total Harga</label>
                <div class="col-md-4">
                    <p class="mt-2" id="teksKembalian"></p>
                    <button type="submit" class='btn btn-selesai mt-4'>Selesai</button>
                </div>
            </div>
        </form>                    
        </div>
    </div>
@endsection

@section('myscript')
<script>
    function hitungKembalian() {
        var bayar = document.querySelector('#bayar').value;
        var totalHarga = document.querySelector('#total_harga').value;

        var kembalian = bayar - totalHarga;

        document.querySelector('#teksKembalian').innerHTML = kembalian;
    }

</script>
@endsection