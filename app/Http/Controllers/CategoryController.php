<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // 1. Inisialisasi Query (Belum ambil data ke database)
        $query = Category::query();

        // 2. Tambahkan filter jika ada input
        if ($request->filled('category_name')) {
            // Ini akan diterjemahkan ke SQL: WHERE category_name LIKE '%...%'
            $query->where('category_name', 'like', '%' . $request->category_name . '%');
        }

        if ($request->filled('id')) {
            // Ini akan diterjemahkan ke SQL: WHERE id = ...
            $query->where('id', $request->id);
        }

        // 3. Eksekusi query dan ambil hasilnya (Get/Paginate)
        $categories = $query->get();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // $data = [
        //     'category_name' => $request->category_name
        // ];
        // $store = Category::store($data);
        $store = Category::create($request->all());
        if ($store) {
            return redirect('/categories')->with('success', 'Data Berhasil Disimpan');
        } else {
            echo "Gagal menyimpan kategori.";
        }
    }
    public function edit($id)
    {
        // $categories = Category::getCategoryById($id);
        $categories = Category::find($id);
        return view('categories.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        // $data = [
        //     'category_name' => $request->category_name
        // ];
        // $update = Category::updateData($id, $data);
        $update = Category::find($id)->update($request->all());
        if ($update) {
            return redirect('/categories')->with('success', 'Data Berhasil Diupdate');
        } else {
            echo "Gagal mengupdate kategori.";
        }
    }

    public function destroy($id)
    {
        $delete = Category::destroy($id);
        if ($delete) {
            return redirect('/categories')->with('success', 'Data Berhasil Dihapus');
        } else {
            echo "Gagal menghapus kategori.";
        }

        return redirect('/categories');
    }
}
