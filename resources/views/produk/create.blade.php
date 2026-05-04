@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto mb-6">
            <a href="{{ route('produk.index') }}"
                class="text-sm text-gray-500 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-400 flex items-center transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Daftar
            </a>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white mt-2">Tambah Produk Baru</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Pastikan informasi produk yang dimasukkan sudah benar.</p>
        </div>

        <div
            class="max-w-2xl mx-auto bg-white dark:bg-slate-800 rounded-2xl shadow-xl border border-gray-100 dark:border-slate-700 overflow-hidden transition-colors duration-300">
            <form action="{{ route('produk.store') }}" method="POST" class="p-8">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="col-span-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Kode Produk</label>
                        <input type="text" name="product_code" value="{{ old('product_code') }}"
                            placeholder="Contoh: BRG-001"
                            class="w-full px-4 py-2.5 bg-gray-50 dark:bg-slate-900 border @error('product_code') border-red-500 @else border-gray-200 dark:border-slate-700 @enderror rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none dark:text-white transition">
                        @error('product_code')
                            <p class="text-xs text-red-500 mt-1 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Nama Produk</label>
                        <input type="text" name="product_name" value="{{ old('product_name') }}"
                            placeholder="Masukkan nama barang lengkap"
                            class="w-full px-4 py-2.5 bg-gray-50 dark:bg-slate-900 border @error('product_name') border-red-500 @else border-gray-200 dark:border-slate-700 @enderror rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none dark:text-white transition">
                        @error('product_name')
                            <p class="text-xs text-red-500 mt-1 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Harga (Rp)</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400 text-sm">Rp</span>
                            <input type="number" name="price" value="{{ old('price') }}" placeholder="0"
                                class="w-full pl-10 pr-4 py-2.5 bg-gray-50 dark:bg-slate-900 border @error('price') border-red-500 @else border-gray-200 dark:border-slate-700 @enderror rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none dark:text-white transition">
                        </div>
                        @error('price')
                            <p class="text-xs text-red-500 mt-1 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Satuan</label>
                        <select name="unit" id="unit"
                            class="w-full px-4 py-2.5 bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none dark:text-white transition">
                            <option value="pcs" {{ old('unit') == 'pcs' ? 'selected' : '' }}>Pcs</option>
                            <option value="kg" {{ old('unit') == 'kg' ? 'selected' : '' }}>Kg</option>
                            <option value="liter" {{ old('unit') == 'liter' ? 'selected' : '' }}>Liter</option>
                        </select>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Kategori</label>
                        <select name="categories_id"
                            class="w-full px-4 py-2.5 bg-gray-50 dark:bg-slate-900 border @error('categories_id') border-red-500 @else border-gray-200 dark:border-slate-700 @enderror rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none dark:text-white transition">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('categories_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('categories_id')
                            <p class="text-xs text-red-500 mt-1 italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-8 flex items-center justify-end gap-3">
                    <button type="reset"
                        class="px-6 py-2.5 rounded-xl border border-gray-200 dark:border-slate-600 text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-slate-700 transition font-medium">
                        Reset
                    </button>
                    <button type="submit"
                        class="px-8 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white shadow-lg shadow-blue-500/30 transition font-semibold">
                        Simpan Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
