<h1>Add Product</h1>

<form action="{{ route('produk.store') }}" method="POST">
    @csrf

    <label>Kode Produk:</label>
    <input type="text" name="product_code"><br>

    <label>Nama Produk:</label>
    <input type="text" name="product_name"><br>

    <label>Harga:</label>
    <input type="number" name="price"><br>

    <label>Satuan:</label>
    <select name="unit" id="unit">
        <option value="pcs">Pcs</option>
        <option value="kg">Kg</option>
        <option value="liter">Liter</option>
    </select><br>

    <label>Kategori:</label>
    <select name="categories_id">
        <option value="">-- Pilih Kategori --</option>

        @foreach ($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->category_name }}
            </option>
        @endforeach

    </select>

    <br><br>
    <button type="submit">Simpan</button>
</form>
