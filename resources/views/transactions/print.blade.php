<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengguna print</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <style>
        .container {
            margin: 10px auto;
        }

        table {
            margin: 0px auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 align="center">Laporan Data Order</h1>
        <table border="1" cellpadding="4" cellspacing="0">
            <tr>
                <td>NO</td>
                <td>NO Meja</td>
                <td>Nama Menu</td>
                <td>Jumlah Pesanan</td>
                <td>Total Harga</td>
                <td>Status</td>
                <td>Tanggal</td>
            </tr>
            @foreach($orders as $order)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $order->meja_id }}</td>
                <td>{{ $order->nama_masakan }}</td>
                <td>{{ $order->jumlah }}</td>
                <td width="20%">{{ $order->total_harga }}</td>
                <td width="20%">{{ $order->status }}</td>
                <td width="20%">{{ $order->tanggal }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    
</body>
</html>