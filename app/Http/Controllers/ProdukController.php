<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(){
        $title = "Produk";
        $products = Product::with('category')->get();
        return view('produk.index', compact('title','products'));
    }

    public function create(){
        $title = "Tambah Produk";
        $categories = Category::all();
        return view('produk.create', compact('title','categories'));
    }

    public function store(Request $request){
        // echo "Menyimpan data produk";
        $data = [
            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'unit' => $request->unit,
            'categories_id' => $request->categories_id
        ];
        $store = Product::store($data);
        if($store) {
            return redirect('/produk')->with('success', 'Data Berhasil Disimpan');
        }else{
            return redirect('/produk')->with('error', 'Data Gagal Disimpan');
        }
    }

    public function edit($id){
        $title = "Edit Produk";
        $produk = Product::with('category')->findOrFail($id);
        $categories = Category::all();
        return view('produk.edit', compact('title','produk','categories'));
    }

    public function update(Request $request, $id){
        $data = [
            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'unit' => $request->unit,
            'categories_id' => $request->categories_id
        ];
        $update = Product::updateData($id, $data);
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
