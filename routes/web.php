<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('categories/create', [CategoryController::class, 'create']);
Route::post('/categories/store', [CategoryController::class, 'store']);
Route::get('/categories/edit/{category}', [CategoryController::class, 'edit']);
Route::put('/categories/update/{category}', [CategoryController::class, 'update']);

Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::post('/produk/store', [ProdukController::class, 'index']);
Route::get('/customers', [CustomerController::class, 'index']);
