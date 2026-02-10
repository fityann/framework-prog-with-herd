<h1>ini halaman kategori</h1>
<a href="/categories/create">Tambah Kategori</a>
<table border="1">
    <thead></thead>
        <tr>
            <th>ID</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->category_name }}</td>
                <td>
                    <a href="/categories/edit/{{ $category->id }}">Edit</a>
                    <a href="/categories/delete/{{ $category->id }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
