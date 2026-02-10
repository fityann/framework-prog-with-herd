<h1>Edit Ccategory</h1>
<form action="/categories/update/{{ $categories->id }}" method="POST">
    @csrf
    @method('PUT')
    <label for="category_name">Nama Kategori:</label>
    <input type="text" name="category_name" value="{{ $categories->category_name }}">
    <button type="submit">Simpan</button>
</form>
