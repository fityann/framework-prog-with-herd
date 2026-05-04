@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto mb-6">
            <a href="{{ route('supplier.index') }}"
                class="text-sm text-gray-500 hover:text-violet-600 dark:text-gray-400 dark:hover:text-violet-400 flex items-center transition mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Daftar Supplier
            </a>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Registrasi Supplier</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Tambahkan data mitra pemasok baru ke dalam sistem.</p>
        </div>

        <div
            class="max-w-2xl mx-auto bg-white dark:bg-slate-800 rounded-3xl shadow-xl border border-gray-100 dark:border-slate-700 overflow-hidden transition-all duration-300">
            <form action="{{ route('supplier.store') }}" method="POST" class="p-8">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="col-span-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Kode
                            Supplier</label>
                        <input type="text" name="supplier_code" value="{{ old('supplier_code') }}"
                            placeholder="Contoh: SUP-001"
                            class="w-full px-4 py-2.5 bg-gray-50 dark:bg-slate-900 border @error('supplier_code') border-red-500 @else border-gray-200 dark:border-slate-700 @enderror rounded-xl focus:ring-2 focus:ring-violet-500 focus:outline-none dark:text-white transition">
                        @error('supplier_code')
                            <p class="text-xs text-red-500 mt-1 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Nama
                            Perusahaan/Supplier</label>
                        <input type="text" name="supplier_name" value="{{ old('supplier_name') }}"
                            placeholder="PT. Nama Supplier"
                            class="w-full px-4 py-2.5 bg-gray-50 dark:bg-slate-900 border @error('supplier_name') border-red-500 @else border-gray-200 dark:border-slate-700 @enderror rounded-xl focus:ring-2 focus:ring-violet-500 focus:outline-none dark:text-white transition">
                        @error('supplier_name')
                            <p class="text-xs text-red-500 mt-1 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Nomor Telepon /
                            WA</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </span>
                            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="0812xxxx"
                                class="w-full pl-10 pr-4 py-2.5 bg-gray-50 dark:bg-slate-900 border @error('phone') border-red-500 @else border-gray-200 dark:border-slate-700 @enderror rounded-xl focus:ring-2 focus:ring-violet-500 focus:outline-none dark:text-white transition">
                        </div>
                        @error('phone')
                            <p class="text-xs text-red-500 mt-1 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Alamat
                            Lengkap</label>
                        <textarea name="address" rows="3" placeholder="Jl. Alamat Lengkap No. XX..."
                            class="w-full px-4 py-2.5 bg-gray-50 dark:bg-slate-900 border @error('address') border-red-500 @else border-gray-200 dark:border-slate-700 @enderror rounded-xl focus:ring-2 focus:ring-violet-500 focus:outline-none dark:text-white transition">{{ old('address') }}</textarea>
                        @error('address')
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
                        class="px-10 py-2.5 rounded-xl bg-violet-600 hover:bg-violet-700 text-white shadow-lg shadow-violet-500/30 transition font-bold flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                        Simpan Supplier
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
