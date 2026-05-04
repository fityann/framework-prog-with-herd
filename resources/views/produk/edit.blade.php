@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto mb-6">
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li>
                        <a href="{{ route('produk.index') }}"
                            class="text-sm font-medium text-gray-500 hover:text-amber-600 dark:text-gray-400 dark:hover:text-amber-400 transition">Produk</a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-bold text-gray-800 dark:text-white md:ml-2">Edit Data</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Perbarui Produk</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Mengedit: <span
                    class="font-semibold text-amber-600">{{ $produk->product_name }}</span></p>
        </div>

        <div
            class="max-w-2xl mx-auto bg-white dark:bg-slate-800 rounded-3xl shadow-xl border border-gray-100 dark:border-slate-700 overflow-hidden transition-all duration-300">
            <form action="{{ route('produk.update', $produk->id) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="col-span-1">
                        <label
                            class="block text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400 mb-2">Kode
                            Produk</label>
                        <input type="text" name="product_code" value="{{ old('product_code', $produk->product_code) }}"
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-700 rounded-2xl focus:ring-2 focus:ring-amber-500 focus:outline-none dark:text-white transition shadow-sm">
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label
                            class="block text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400 mb-2">Nama
                            Produk</label>
                        <input type="text" name="product_name" value="{{ old('product_name', $produk->product_name) }}"
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-700 rounded-2xl focus:ring-2 focus:ring-amber-500 focus:outline-none dark:text-white transition shadow-sm">
                    </div>

                    <div class="col-span-1">
                        <label
                            class="block text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400 mb-2">Harga
                            Jual</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="text-gray-400 text-sm">Rp</span>
                            </div>
                            <input type="number" name="price" value="{{ old('price', $produk->price) }}"
                                class="w-full pl-12 pr-4 py-3 bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-700 rounded-2xl focus:ring-2 focus:ring-amber-500 focus:outline-none dark:text-white transition shadow-sm">
                        </div>
                    </div>

                    <div class="col-span-1">
                        <label
                            class="block text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400 mb-2">Satuan</label>
                        <select name="unit"
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-700 rounded-2xl focus:ring-2 focus:ring-amber-500 focus:outline-none dark:text-white transition shadow-sm appearance-none">
                            <option value="pcs" {{ $produk->unit == 'pcs' ? 'selected' : '' }}>Pcs</option>
                            <option value="kg" {{ $produk->unit == 'kg' ? 'selected' : '' }}>Kg</option>
                            <option value="liter" {{ $produk->unit == 'liter' ? 'selected' : '' }}>Liter</option>
                        </select>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label
                            class="block text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400 mb-2">Kategori</label>
                        <select name="categories_id"
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-700 rounded-2xl focus:ring-2 focus:ring-amber-500 focus:outline-none dark:text-white transition shadow-sm">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $produk->categories_id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-10 flex items-center justify-between border-t border-gray-100 dark:border-slate-700 pt-6">
                    <p class="text-xs text-gray-400 italic">* Pastikan semua data sudah divalidasi</p>
                    <div class="flex gap-3">
                        <a href="{{ route('produk.index') }}"
                            class="px-6 py-3 rounded-2xl bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600 transition font-bold text-sm">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-10 py-3 rounded-2xl bg-amber-500 hover:bg-amber-600 text-white shadow-lg shadow-amber-500/30 transition font-bold text-sm flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                            </svg>
                            Update Produk
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
