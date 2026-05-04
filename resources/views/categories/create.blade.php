@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-md mx-auto mb-6 text-center">
            <div
                class="inline-flex items-center justify-center w-16 h-16 bg-indigo-100 dark:bg-indigo-900/30 rounded-full mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600 dark:text-indigo-400" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Tambah Kategori</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Buat klasifikasi produk baru Anda di sini.</p>
        </div>

        <div
            class="max-w-md mx-auto bg-white dark:bg-slate-800 rounded-3xl shadow-xl border border-gray-100 dark:border-slate-700 overflow-hidden transition-all duration-300">
            <form action="/categories/store" method="POST" class="p-8">
                @csrf

                <div class="mb-6">
                    <label for="category_name"
                        class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 px-1">
                        Nama Kategori
                    </label>
                    <input type="text" name="category_name" id="category_name" required
                        placeholder="Contoh: Elektronik, Makanan, dsb."
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-700 rounded-2xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none dark:text-white transition shadow-sm placeholder:text-gray-400">
                    @error('category_name')
                        <p class="text-xs text-red-500 mt-2 ml-1 italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-3">
                    <button type="submit"
                        class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl shadow-lg shadow-indigo-500/30 transition-all duration-200 font-bold flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Kategori
                    </button>

                    <a href="{{ route('categories.index') }}"
                        class="w-full py-3 bg-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 text-center font-medium transition italic text-sm">
                        Batal dan Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
