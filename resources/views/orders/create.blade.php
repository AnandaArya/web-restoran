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
        <form action="{{ url('orders/store') }}" method="post" enctype='multipart/form-data'>
            @csrf
            <!-- <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10 mt-1"> -->
                
                <!-- </div>
            </div> -->
            <div class="form-group row">
                <label for="meja_id" class="col-sm-2 col-form-label">No Meja</label>
                <div class="col-lg-6">
                    <select class="form-control" name="meja_id" id="meja_id">
                        <?php for($i =  1; $i <= 40; $i++) : ?>
                            <option value="<?= $i; ?>"><?= $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>
            <input type="hidden" class="form-control" type="text" placeholder="1" name='masakan_id' id="masakan_id" value="{{ $order->id }}">

            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Menu</label>
                <div class="col-sm-10">
                    <p class="mt-2">{{ $order->nama }}</p>
                    <!-- <input class="form-control" type="hidden" placeholder="Nasi Kuning" name='nama' id="nama" value="{{ $order->nama }}"> -->
                </div>
            </div>
            <div class="form-group row">
                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                    <input type="number" class="mt-2" id="jumlah" name="jumlah" onchange="hitungTotal()" min="1">
                </div>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <p class="mt-2">{{ $order->harga }}</p>
                    <input class="form-control" type="hidden" name='harga' id="harga" value="{{ $order->harga }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="total_harga" class="col-sm-2 col-form-label">Total Harga</label>
                <div class="col-sm-10">
                    <p class="mt-2" id="teksTotalHarga"></p>
                    <input class="form-control" type="hidden" name='total_harga' id="total_harga">
                </div>
            </div>
            <input type="hidden" id="status" name="status" value="proses">
            <div class="form-group row">
                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-10 mt-2">
                    <img src="{{ asset('img/'.$order->gambar) }}" class="d-block" alt="gambar-menu" width="200px" height="200px">
                </div>
            </div>
            <div class="form-group row">
                <label for="total_harga" class="col-sm-2 col-form-label">Total Harga</label>
                <div class="col-lg-6">
                    <p class="mt-2" id="teksTotalHarga"></p>
                    <input class="form-control" type="date" name='tanggal' id="tanggal" value="<?= $today; ?>">
                    <button type="submit" class='btn btn-primary mt-5'>Pesan</button>
                </div>
            </div>
        </form>                    
        </div>
    </div>
@endsection

@section('myscript')
<script>
    function hitungTotal() {
        
        var jumlah = document.querySelector('#jumlah').value;
        var harga = document.querySelector('#harga').value;

        var total = jumlah * harga;

        document.querySelector('#total_harga').value = total;
        document.querySelector('#teksTotalHarga').innerHTML = total;
    }
</script>
@endsection