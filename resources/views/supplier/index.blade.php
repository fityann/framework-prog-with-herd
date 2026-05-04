@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Manajemen Supplier</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Daftar mitra pemasok barang sistem Anda.</p>
            </div>
            <a href="{{ route('supplier.create') }}"
                class="bg-violet-600 hover:bg-violet-700 text-white px-5 py-2 rounded-xl transition duration-200 flex items-center shadow-sm font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Tambah Supplier
            </a>
        </div>

        <div
            class="bg-white dark:bg-slate-800 p-4 rounded-2xl shadow-sm mb-6 border border-gray-100 dark:border-slate-700 transition-colors duration-300">
            <form action="{{ Route('supplier.index') }}" method="GET" class="flex flex-wrap gap-4 items-center">
                <div class="relative flex-1 min-w-[240px]">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <input type="text" name="supplier_name" placeholder="Cari nama supplier..."
                        value="{{ Request('supplier_name') }}"
                        class="w-full pl-10 pr-4 py-2 bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-700 rounded-xl text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 transition">
                </div>
                <input type="text" name="id" placeholder="ID" value="{{ Request('id') }}"
                    class="w-20 px-3 py-2 bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-700 rounded-xl text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 text-center">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl transition font-medium">
                    Filter
                </button>
            </form>
        </div>

        <div
            class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 overflow-hidden transition-colors duration-300">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50 dark:bg-slate-900/50 border-b border-gray-100 dark:border-slate-700">
                            <th
                                class="px-6 py-4 text-xs uppercase tracking-wider font-semibold text-gray-500 dark:text-gray-400">
                                Kode</th>
                            <th
                                class="px-6 py-4 text-xs uppercase tracking-wider font-semibold text-gray-500 dark:text-gray-400">
                                Nama Supplier</th>
                            <th
                                class="px-6 py-4 text-xs uppercase tracking-wider font-semibold text-gray-500 dark:text-gray-400">
                                Alamat</th>
                            <th
                                class="px-6 py-4 text-xs uppercase tracking-wider font-semibold text-gray-500 dark:text-gray-400">
                                Telepon</th>
                            <th
                                class="px-6 py-4 text-xs uppercase tracking-wider font-semibold text-gray-500 dark:text-gray-400 text-center">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 dark:divide-slate-700">
                        @foreach ($suppliers as $supplier)
                            <tr class="hover:bg-violet-50/30 dark:hover:bg-slate-700/50 transition">
                                <td class="px-6 py-4 text-sm font-mono text-violet-600 dark:text-violet-400 font-medium">
                                    {{ $supplier->supplier_code }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200 font-bold">
                                    {{ $supplier->supplier_name }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400 max-w-xs truncate">
                                    {{ $supplier->address }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400">
                                        {{ $supplier->phone }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center items-center gap-4">
                                        <a href="{{ route('supplier.edit', $supplier->id) }}"
                                            class="text-violet-500 hover:text-violet-700 dark:text-violet-400 dark:hover:text-violet-300 font-semibold text-sm transition">
                                            Edit
                                        </a>
                                        <span class="text-gray-300 dark:text-slate-600">|</span>
                                        <form action="{{ route('supplier.destroy', $supplier->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                                                class="text-red-400 hover:text-red-600 dark:text-red-500 dark:hover:text-red-400 font-semibold text-sm transition">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
