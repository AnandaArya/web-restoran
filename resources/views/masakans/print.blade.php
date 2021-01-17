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
        <h1 align="center">Laporan data Menu</h1>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <td>NO</td>
                <td>ID</td>
                <td>Nama</td>
                <td>Kategori</td>
                <td>Gambar</td>
                <td>Harga</td>
                <td>Status</td>
            </tr>
            @foreach($masakans as $masakan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $masakan->id }}</td>
                <td>{{ $masakan->nama }}</td>
                <td width="20%">{{ $masakan->kategori }}</td>
                <td><img src="{{ asset('img/'.$masakan->gambar) }}" width="100px" height="100px"></td>
                <td width="20%">{{ $masakan->harga }}</td>
                <td width="20%">{{ $masakan->status }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    
</body>
</html>