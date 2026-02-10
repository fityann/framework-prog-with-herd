<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(){
        $data['title'] = "Pelanggan";
        $data['nama_produk'] = "Beng Beng";
        return view('pelanggan.index', $data);
    }
}
