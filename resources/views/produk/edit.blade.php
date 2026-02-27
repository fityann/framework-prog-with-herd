<h1>Edit Product</h1>
<form action="{{ route('produk.update', $produk->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="product_name">Nama Produk:</label>
    <input type="text" name="product_name" value="{{ $produk->product_name }}"><br>
    <label for="product_code">Kode Produk:</label>
    <input type="text" name="product_code" value="{{ $produk->product_code }}"><br>
    <label for="price">Harga:</label>
    <input type="number" name="price" value="{{ $produk->price }}"><br>
    <label for="unit">Satuan:</label>
    <select name="unit" id="unit">
        <option value="pcs" {{ $produk->unit == 'pcs' ? 'selected' : '' }}>Pcs</option>
        <option value="kg" {{ $produk->unit == 'kg' ? 'selected' : '' }}>Kg</option>
        <option value="liter" {{ $produk->unit == 'liter' ? 'selected' : '' }}>Liter</option>
    </select>
    <label for="categories_id">Kategori:</label>
    <select name="categories_id">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $produk->categories_id ? 'selected' : '' }}>
                {{ $category->category_name }}
            </option>
        @endforeach
    </select><br>
    <button type="submit">Simpan</button>
</form>
