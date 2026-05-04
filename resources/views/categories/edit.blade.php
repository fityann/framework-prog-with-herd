@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-md mx-auto mb-6 text-center">
            <div
                class="inline-flex items-center justify-center w-16 h-16 bg-emerald-100 dark:bg-emerald-900/30 rounded-full mb-4 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-600 dark:text-emerald-400" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Edit Kategori</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Ubah nama kategori <span
                    class="font-bold text-emerald-600">"{{ $categories->category_name }}"</span></p>
        </div>

        <div
            class="max-w-md mx-auto bg-white dark:bg-slate-800 rounded-3xl shadow-xl border border-gray-100 dark:border-slate-700 overflow-hidden transition-all duration-300">
            <form action="/categories/update/{{ $categories->id }}" method="POST" class="p-8">
                @csrf
                @method('PUT')

                <div class="mb-8">
                    <label for="category_name"
                        class="block text-xs font-bold uppercase tracking-widest text-gray-400 dark:text-gray-500 mb-2 px-1">
                        Nama Kategori Baru
                    </label>
                    <input type="text" name="category_name" id="category_name" required
                        value="{{ old('category_name', $categories->category_name) }}"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-700 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:outline-none dark:text-white transition shadow-sm font-medium">
                    @error('category_name')
                        <p class="text-xs text-red-500 mt-2 ml-1 italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-3">
                    <button type="submit"
                        class="w-full py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl shadow-lg shadow-emerald-500/30 transition-all duration-200 font-bold flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Perbarui Kategori
                    </button>

                    <a href="{{ route('categories.index') }}"
                        class="w-full py-3 text-gray-500 dark:text-gray-400 hover:text-red-500 dark:hover:text-red-400 text-center font-medium transition text-sm">
                        Batalkan Perubahan
                    </a>
                </div>
            </form>
        </div>

        <div class="max-w-md mx-auto mt-8 text-center px-6">
            <p class="text-xs text-gray-400 dark:text-gray-500">
                Perubahan ini akan langsung berdampak pada semua produk yang terhubung dengan kategori ini.
            </p>
        </div>
    </div>
@endsection
