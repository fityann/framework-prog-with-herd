<aside
    class="w-64 bg-white dark:bg-slate-900 border-r border-slate-100 dark:border-slate-800 flex flex-col hidden lg:flex">
    <div class="p-6 flex items-center gap-2">
        <div class="w-8 h-8 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
            <i data-lucide="layout-grid" class="text-green-800 dark:text-green-400 w-5 h-5"></i>
        </div>
        <span class="text-xl font-bold text-slate-900 dark:text-white tracking-tight">Senzo</span>
    </div>

    <nav class="flex-1 px-4 space-y-6 overflow-y-auto custom-scrollbar">
        <div>
            <p class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest px-4 mb-2">Utama
            </p>
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="{{ request()->routeIs('dashboard') ? 'sidebar-item-active' : 'sidebar-item-inactive' }} flex items-center gap-3 px-4 py-3 rounded-xl transition-all">
                        <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>
                </li>
            </ul>
        </div>

        <div id="masterDropdown"
            class="group {{ request()->routeIs(['produk.*', 'categories.*', 'supplier.*', 'pelanggan.*']) ? 'dropdown-active' : '' }}">
            <p class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest px-4 mb-2">
                Master Data</p>
            <ul class="space-y-1">
                <li>
                    <button onclick="toggleDropdown('masterDropdown')"
                        class="w-full flex items-center justify-between px-4 py-3 text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800/50 rounded-xl transition-all">
                        <div class="flex items-center gap-3 ">
                            <i data-lucide="database" class="w-5 h-5"></i>
                            <span class="font-medium">Manajemen</span>
                        </div>
                        <i data-lucide="chevron-down" class="w-4 h-4 chevron-icon transition-transform"></i>
                    </button>
                    <ul class="dropdown-content ml-12 space-y-1 mt-1">
                        <li>
                            <a href="{{ route('produk.index') }}"
                                class="block py-2 text-sm {{ request()->routeIs('produk.*') ? 'text-green-600 font-bold' : 'text-slate-500 hover:text-green-700' }} transition-colors">Produk</a>
                        </li>
                        <li>
                            <a href="{{ route('categories.index') }}"
                                class="block py-2 text-sm {{ request()->routeIs('categories.*') ? 'text-green-600 font-bold' : 'text-slate-500 hover:text-green-700' }} transition-colors">Kategori</a>
                        </li>
                        <li>
                            <a href="{{ route('supplier.index') }}"
                                class="block py-2 text-sm {{ request()->routeIs('supplier.*') ? 'text-green-600 font-bold' : 'text-slate-500 hover:text-green-700' }} transition-colors">Supplier</a>
                        </li>
                        <li>
                            <a href="{{ route('pelanggan.index') }}"
                                class="block py-2 text-sm {{ request()->routeIs('pelanggan.*') ? 'text-green-600 font-bold' : 'text-slate-500 hover:text-green-700' }} transition-colors">Pelanggan</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div id="transactionDropdown">
            <p class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest px-4 mb-2">
                Transaksi</p>
            <ul class="space-y-1">
                <li class="group">
                    <button onclick="toggleDropdown('transactionDropdown')"
                        class="w-full flex items-center justify-between px-4 py-3 text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800/50 rounded-xl transition-all">
                        <div class="flex items-center gap-3">
                            <i data-lucide="shopping-cart" class="w-5 h-5"></i>
                            <span class="font-medium">Penjualan</span>
                        </div>
                        <i data-lucide="chevron-down" class="w-4 h-4 chevron-icon transition-transform"></i>
                    </button>
                    <ul class="dropdown-content ml-12 space-y-1 mt-1">
                        <li><a href="#"
                                class="block py-2 text-sm text-slate-500 dark:text-slate-400 hover:text-green-700">Entri
                                Transaksi</a></li>
                        <li><a href="#"
                                class="block py-2 text-sm text-slate-500 dark:text-slate-400 hover:text-green-700">Riwayat
                                Penjualan</a></li>
                        <li><a href="#"
                                class="block py-2 text-sm text-slate-500 dark:text-slate-400 hover:text-green-700">Laporan
                                Harian</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</aside>
