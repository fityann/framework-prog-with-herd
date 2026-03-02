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
    <a href="{{ route('produk.create') }}">Tambah Produk</a>
    <form action="{{ Route('produk.index') }}" method="GET" style="margin-top: 20px">
        <input type="text" name="product_name" placeholder="Search by name" value="{{ Request('product_name') }}">
        <input type="text" name="id" placeholder="ID" value="{{ Request('id') }}" style="width: 50px">
        <button type="submit">Search</button>
    </form>
    <table border="1">
        <thead>
            <tr>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Satuan</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $produk)
                <tr>
                    <td>{{ $produk->product_code }}</td>
                    <td>{{ $produk->product_name }}</td>
                    <td>{{ $produk->price }}</td>
                    <td>{{ $produk->unit }}</td>
                    <td>{{ $produk->category->category_name ?? '-' }}</td>
                    <td>
                        <a href="{{ Route('produk.edit', $produk->id) }}">Edit</a> |
                        <form action="{{ route('produk.destroy', $produk->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
