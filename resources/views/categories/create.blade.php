<h1>Add Ccategory</h1>
<form action="/categories/store" method="POST">
    @csrf
    <label for="category_name">Nama Kategori:</label>
    <input type="text" name="category_name">
    <button type="submit">Simpan</button>
</form>
