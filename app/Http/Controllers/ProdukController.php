<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(){
        $title = "Produk";
        $dataproduk = Produk::getDataProduk();
        // dd($dataproduk);
        return view('produk.index', compact('title','dataproduk'));
    }

    public function store(Request $request){
        echo "Menyimpan data produk";
    }
}
