@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto mb-6">
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
                    <li><a href="{{ route('supplier.index') }}" class="hover:text-rose-600 transition">Supplier</a></li>
                    <li><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg></li>
                    <li class="font-bold text-gray-800 dark:text-white text-base">Perbarui Data</li>
                </ol>
            </nav>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Edit Informasi Supplier</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">ID Partner: <span
                    class="font-mono text-rose-500 font-bold">#{{ $suppliers->id }}</span></p>
        </div>

        <div
            class="max-w-2xl mx-auto bg-white dark:bg-slate-800 rounded-3xl shadow-2xl border border-gray-100 dark:border-slate-700 overflow-hidden transition-all duration-300">
            <div class="bg-rose-500 h-2 w-full"></div>
            <form action="{{ route('supplier.update', $suppliers->id) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="col-span-1">
                        <label
                            class="block text-xs font-bold uppercase tracking-wider text-gray-400 dark:text-gray-500 mb-2">Kode
                            Internal</label>
                        <input type="text" name="supplier_code"
                            value="{{ old('supplier_code', $suppliers->supplier_code) }}"
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-slate-900 border @error('supplier_code') border-red-500 @else border-gray-200 dark:border-slate-700 @enderror rounded-2xl focus:ring-2 focus:ring-rose-500 focus:outline-none dark:text-white transition">
                        @error('supplier_code')
                            <p class="text-xs text-red-500 mt-1 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-1">
                        <label
                            class="block text-xs font-bold uppercase tracking-wider text-gray-400 dark:text-gray-500 mb-2">Nama
                            Relasi</label>
                        <input type="text" name="supplier_name"
                            value="{{ old('supplier_name', $suppliers->supplier_name) }}"
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-slate-900 border @error('supplier_name') border-red-500 @else border-gray-200 dark:border-slate-700 @enderror rounded-2xl focus:ring-2 focus:ring-rose-500 focus:outline-none dark:text-white transition">
                        @error('supplier_name')
                            <p class="text-xs text-red-500 mt-1 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label
                            class="block text-xs font-bold uppercase tracking-wider text-gray-400 dark:text-gray-500 mb-2">Kontak
                            Aktif</label>
                        <input type="text" name="phone" value="{{ old('phone', $suppliers->phone) }}"
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-slate-900 border @error('phone') border-red-500 @else border-gray-200 dark:border-slate-700 @enderror rounded-2xl focus:ring-2 focus:ring-rose-500 focus:outline-none dark:text-white transition">
                        @error('phone')
                            <p class="text-xs text-red-500 mt-1 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label
                            class="block text-xs font-bold uppercase tracking-wider text-gray-400 dark:text-gray-500 mb-2">Lokasi
                            Kantor/Gudang</label>
                        <textarea name="address" rows="3"
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-slate-900 border @error('address') border-red-500 @else border-gray-200 dark:border-slate-700 @enderror rounded-2xl focus:ring-2 focus:ring-rose-500 focus:outline-none dark:text-white transition">{{ old('address', $suppliers->address) }}</textarea>
                        @error('address')
                            <p class="text-xs text-red-500 mt-1 italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-10 flex items-center justify-end gap-4 border-t border-gray-50 dark:border-slate-700 pt-6">
                    <a href="{{ route('supplier.index') }}"
                        class="text-sm font-semibold text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition">
                        Batalkan
                    </a>
                    <button type="submit"
                        class="px-8 py-3 bg-rose-600 hover:bg-rose-700 text-white rounded-2xl shadow-lg shadow-rose-500/30 transition-all duration-200 font-bold flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l6-6a1 1 0 00-1.414-1.414l-5.293 5.293-2.293-2.293z" />
                            <path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V5z" />
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
