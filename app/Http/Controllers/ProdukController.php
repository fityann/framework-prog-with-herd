<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request){
        $title = "Produk";
        $products = Product::with('category');

        if ($request->filled('product_name')) {
            $products = $products->where('product_name', 'like', '%' . $request->product_name . '%');
        }
        if ($request->filled('id')) {
            $products = $products->where('id', $request->id);
        }
        $products = $products->get();
        return view('produk.index', compact('title','products'));
    }

    public function create(){
        $title = "Tambah Produk";
        $categories = Category::all();
        return view('produk.create', compact('title','categories'));
    }

    public function store(Request $request){
        // echo "Menyimpan data produk";
        // $data = [
        //     'product_code' => $request->product_code,
        //     'product_name' => $request->product_name,
        //     'price' => $request->price,
        //     'unit' => $request->unit,
        //     'categories_id' => $request->categories_id
        // ];

        // membuat validasi untuk mewajibkan input data diisi
        $request->validate([
            'product_code' => 'required|max:6',
            'product_name' => 'required',
            'price' => 'required|numeric',
            'unit' => 'required',
            'categories_id' => 'required'
        ], [
            'product_code.required' => 'Kode produk wajib diisi',
            'product_code.max' => 'Kode produk maksimal 4 karakter',
            'product_name.required' => 'Nama produk wajib diisi',
            'price.required' => 'Harga wajib diisi',
            'price.numeric' => 'Harga harus berupa angka',
            'unit.required' => 'Satuan wajib diisi',
            'categories_id.required' => 'Kategori wajib diisi'
        ]);
        $store = Product::create($request->all());
        if($store) {
            return redirect('/produk')->with('success', 'Data Berhasil Disimpan');
        }else{
            return redirect('/produk')->with('error', 'Data Gagal Disimpan');
        }
    }

    public function edit($id){
        $title = "Edit Produk";
        $produk = Product::with('category')->find($id);
        $categories = Category::all();
        return view('produk.edit', compact('title','produk','categories'));
    }

    public function update(Request $request, $id){
        // $data = [
        //     'product_code' => $request->product_code,
        //     'product_name' => $request->product_name,
        //     'price' => $request->price,
        //     'unit' => $request->unit,
        //     'categories_id' => $request->categories_id
        // ];
        // $update = Product::updateData($id, $data);
        $update = Product::find($id)->update($request->all());
        if($update) {
            return redirect('/produk')->with('success', 'Data Berhasil Diupdate');
        }else{
            return redirect('/produk')->with('error', 'Data Gagal Diupdate');
        }
    }

    public function destroy($id){
        $delete = Product::destroy($id);
        if($delete) {
            return redirect('/produk')->with('success', 'Data Berhasil Dihapus');
        }else{
            return redirect('/produk')->with('error', 'Data Gagal Dihapus');
        }
    }
}
