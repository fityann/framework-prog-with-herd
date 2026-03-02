<h1>Categories</h1>

<a href="{{ Route('categories.create') }}">Tambah Data</a>

@if (session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif

<form action="{{ Route('categories.index') }}" method="GET" style="margin-top: 20px">
    <input type="text" name="category_name" placeholder="Search by name" value="{{ Request('category_name') }}">
    <input type="text" name="id" placeholder="ID" value="{{ Request('id') }}" style="width: 50px">
    <button type="submit">Search</button>
</form>

<table border="1">
    <thead>
        <tr></tr>
            <th>ID</th>
            <th>Name</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $categories as $category)
            <tr>
                <td>{{ $category->id}}</td>
                <td>{{ $category->category_name}}</td>
                <td>
                    <a href="{{ Route('categories.edit', $category->id)}}">Edit</a>
                    <form action="{{ Route('categories.destroy', $category->id)}}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
