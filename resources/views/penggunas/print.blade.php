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
        <h1 align="center">Laporan data Pengguna</h1>
        <table border="1" cellpadding="4" cellspacing="0">
            <tr>
                <td>NO</td>
                <td>Nama</td>
                <td>Level</td>
                <td>Email</td>
                <td>Jenis Kelamin</td>
                <td>Alamat</td>
                <td>Gambar</td>
                <td>NO Telp</td>
            </tr>
            @foreach($penggunas as $pengguna)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pengguna->name }}</td>
                <td>{{ $pengguna->level }}</td>
                <td>{{ $pengguna->email }}</td>
                <td>{{ $pengguna->jenis_kelamin }}</td>
                <td>{{ $pengguna->alamat }}</td>
                <td><img src="{{ asset('img/'.$pengguna->gambar) }}" width="100px" height="100px"></td>
                <td>{{ $pengguna->no_telp }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    
</body>
</html>