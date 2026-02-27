<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        
        $categories = Category::getAll($request);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $data = [
            'category_name' => $request->category_name
        ];
        $store = Category::store($data);
        if($store) {
            return redirect('/categories')->with('success', 'Data Berhasil Disimpan');
        }else{
            echo "Gagal menyimpan kategori.";
        }
    }
    public function edit ($id)
    {
        $categories = Category::getCategoryById($id);
        return view('categories.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'category_name' => $request->category_name
        ];
        $update = Category::updateData($id, $data);
        if($update) {
            return redirect('/categories')->with('success', 'Data Berhasil Diupdate');
        }else{
            echo "Gagal mengupdate kategori.";
        }
    }

    public function destroy($id)
    {
        $delete = Category::destroy($id);
        if($delete) {
            return redirect('/categories')->with('success', 'Data Berhasil Dihapus');
        }else{
            echo "Gagal menghapus kategori.";
        }

        return redirect('/categories');
    }
}
