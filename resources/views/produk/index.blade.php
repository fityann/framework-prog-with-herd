<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>
    <h1>ini halaman produk</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataproduk as $produk)
                <tr>
                    <td>{{ $produk['kode_produk'] }}</td>
                    <td>{{ $produk['nama_produk'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
