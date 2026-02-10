<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public static function getDataProduk()
    {
        $dataproduk = [
            [
                'kode_produk' => 'B01',
                'nama_produk' => 'BengBeng'
            ],
            [
                'kode_produk' => 'C01',
                'nama_produk' => 'Chitato'
            ],
            [
                'kode_produk' => 'F01',
                'nama_produk' => 'Fanta'
            ]
        ];

        return $dataproduk;
    }
}
