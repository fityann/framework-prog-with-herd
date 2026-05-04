@extends('layouts.app')

@section('content')
    <div class="flex-1 overflow-y-auto p-8 custom-scrollbar">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Selamat Datang, {{ auth()->user()->name }}!</h1>
            <p class="text-sm text-slate-400 dark:text-slate-500 mt-1">Anda masuk sebagai <span
                    class="text-green-700 dark:text-green-400 font-bold">{{ auth()->user()->role }}</span>. Berikut adalah
                ringkasan data sistem Anda.</p>
        </div>

        <!-- Quick Access Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <a href="{{ route('produk.index') }}"
                class="bg-white dark:bg-slate-900 p-6 rounded-[2rem] border border-slate-100 dark:border-slate-800 shadow-sm hover:border-green-500 dark:hover:border-green-400 transition-all group">
                <div
                    class="w-12 h-12 bg-green-50 dark:bg-green-900/20 text-green-700 dark:text-green-400 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-green-700 dark:group-hover:bg-green-500 group-hover:text-white transition-all">
                    <i data-lucide="package" class="w-6 h-6"></i>
                </div>
                <h3 class="font-bold text-slate-900 dark:text-white">Data Produk</h3>
                <p class="text-xs text-slate-400 dark:text-slate-500">Kelola stok barang</p>
            </a>

            <a href="{{ route('categories.index') }}"
                class="bg-white dark:bg-slate-900 p-6 rounded-[2rem] border border-slate-100 dark:border-slate-800 shadow-sm hover:border-green-500 dark:hover:border-green-400 transition-all group">
                <div
                    class="w-12 h-12 bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-400 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-blue-700 dark:group-hover:bg-blue-500 group-hover:text-white transition-all">
                    <i data-lucide="tag" class="w-6 h-6"></i>
                </div>
                <h3 class="font-bold text-slate-900 dark:text-white">Kategori</h3>
                <p class="text-xs text-slate-400 dark:text-slate-500">Klasifikasi produk</p>
            </a>

            <a href="{{ route('supplier.index') }}"
                class="bg-white dark:bg-slate-900 p-6 rounded-[2rem] border border-slate-100 dark:border-slate-800 shadow-sm hover:border-green-500 dark:hover:border-green-400 transition-all group">
                <div
                    class="w-12 h-12 bg-purple-50 dark:bg-purple-900/20 text-purple-700 dark:text-purple-400 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-purple-700 dark:group-hover:bg-purple-500 group-hover:text-white transition-all">
                    <i data-lucide="truck" class="w-6 h-6"></i>
                </div>
                <h3 class="font-bold text-slate-900 dark:text-white">Supplier</h3>
                <p class="text-xs text-slate-400 dark:text-slate-500">Manajemen pemasok</p>
            </a>

            <a href="{{ route('pelanggan.index') }}"
                class="bg-white dark:bg-slate-900 p-6 rounded-[2rem] border border-slate-100 dark:border-slate-800 shadow-sm hover:border-green-500 dark:hover:border-green-400 transition-all group">
                <div
                    class="w-12 h-12 bg-amber-50 dark:bg-amber-900/20 text-amber-700 dark:text-amber-400 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-amber-700 dark:group-hover:bg-amber-500 group-hover:text-white transition-all">
                    <i data-lucide="users" class="w-6 h-6"></i>
                </div>
                <h3 class="font-bold text-slate-900 dark:text-white">Pelanggan</h3>
                <p class="text-xs text-slate-400 dark:text-slate-500">Data member toko</p>
            </a>
        </div>

    </div>
@endsection
