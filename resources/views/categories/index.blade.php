@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Kategori Produk</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Kelola pengelompokan produk Anda.</p>
            </div>
            <a href="{{ Route('categories.create') }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-xl transition duration-200 flex items-center shadow-sm font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Tambah Kategori
            </a>
        </div>

        @if (session('success'))
            <script>
                Swal.fire({
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonColor: '#4F46E5',
                    confirmButtonText: 'Tutup'
                });
            </script>
        @endif

        <div
            class="bg-white dark:bg-slate-800 p-4 rounded-2xl shadow-sm mb-6 border border-gray-100 dark:border-slate-700 transition-colors duration-300">
            <form action="{{ Route('categories.index') }}" method="GET" class="flex flex-wrap gap-4 items-center">
                <div class="relative flex-1 min-w-[240px]">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <input type="text" name="category_name" placeholder="Cari nama kategori..."
                        value="{{ Request('category_name') }}"
                        class="w-full pl-10 pr-4 py-2 bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-700 rounded-xl text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                </div>
                <input type="text" name="id" placeholder="ID" value="{{ Request('id') }}"
                    class="w-20 px-3 py-2 bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-700 rounded-xl text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-center">
                <button type="submit"
                    class="bg-slate-800 dark:bg-indigo-600 hover:bg-slate-900 dark:hover:bg-indigo-700 text-white px-6 py-2 rounded-xl transition font-medium">
                    Cari
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
                                class="px-6 py-4 text-xs uppercase tracking-wider font-semibold text-gray-500 dark:text-gray-400 w-24">
                                No</th>
                            <th
                                class="px-6 py-4 text-xs uppercase tracking-wider font-semibold text-gray-500 dark:text-gray-400">
                                Nama Kategori</th>
                            <th
                                class="px-6 py-4 text-xs uppercase tracking-wider font-semibold text-gray-500 dark:text-gray-400 text-center">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 dark:divide-slate-700">
                        @foreach ($categories as $category)
                            <tr class="hover:bg-indigo-50/30 dark:hover:bg-slate-700/50 transition">
                                <td class="px-6 py-4 text-sm font-mono text-indigo-600 dark:text-indigo-400 font-medium">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200 font-medium">
                                    {{ $category->category_name }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center items-center gap-4">
                                        <a href="{{ Route('categories.edit', $category->id) }}"
                                            class="text-indigo-500 hover:text-indigo-700 dark:text-indigo-400 dark:hover:text-indigo-300 font-semibold text-sm">
                                            Edit
                                        </a>
                                        <span class="text-gray-300 dark:text-slate-600">|</span>
                                        <form action="{{ Route('categories.destroy', $category->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete(this)"
                                                class="text-red-400 hover:text-red-600 dark:text-red-500 dark:hover:text-red-400 font-semibold text-sm">
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

    <script>
        function confirmDelete(button) {
            let form = button.closest("form");
            Swal.fire({
                title: "Hapus Kategori?",
                text: "Produk dengan kategori ini mungkin akan terpengaruh!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#EF4444",
                cancelButtonColor: "#6B7280",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal",
                background: document.documentElement.classList.contains('dark') ? '#1E293B' : '#FFFFFF',
                color: document.documentElement.classList.contains('dark') ? '#F3F4F6' : '#1F2937'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>
@endsection
