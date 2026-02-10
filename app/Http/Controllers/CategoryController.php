<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::getAll();
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
            echo "Kategori berhasil disimpan.";
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
            echo "Kategori berhasil diupdate.";
        }else{
            echo "Gagal mengupdate kategori.";
        }
    }
}
