<div class="flex-1 overflow-y-auto p-8 custom-scrollbar">
    <header
        class="h-20 bg-white dark:bg-slate-900 border-b border-slate-100 dark:border-slate-800 flex items-center justify-between px-8 relative rounded-2xl">
        <div>
            <h2 class="text-sm font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Dashboard</h2>
        </div>

        <!-- Profile Section with Dropdown -->
        <div class="relative">
            <button onclick="toggleProfileMenu()" id="profileButton"
                class="flex items-center gap-3 pl-4 group hover:bg-slate-50 dark:hover:bg-slate-800 p-2 rounded-xl transition-all">
                <div class="text-right">
                    <p class="text-xs font-bold text-slate-900 dark:text-white">{{ auth()->user()->name }}</p>
                    <p class="text-[10px] text-slate-400 dark:text-slate-500 uppercase tracking-tighter font-semibold">
                        Role: {{ auth()->user()->role }}</p>
                </div>
                <div class="relative">
                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ auth()->user()->name }}" alt="Avatar"
                        class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
                    <div
                        class="absolute -bottom-1 -right-1 bg-white dark:bg-slate-900 rounded-full p-0.5 shadow-sm border border-slate-100 dark:border-slate-700 group-hover:bg-green-50 dark:group-hover:bg-green-900/30 transition-colors">
                        <i data-lucide="chevron-down" class="w-3 h-3 text-slate-400"></i>
                    </div>
                </div>
            </button>

            <!-- Profile Dropdown Menu -->
            <div id="profileDropdown"
                class="profile-dropdown absolute right-0 mt-2 w-56 bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-2xl shadow-xl z-50 overflow-hidden">
                <div class="p-4 border-b border-slate-50 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/30">
                    <p class="text-xs font-bold text-slate-900 dark:text-white mb-0.5">{{ auth()->user()->name }}</p>
                    <p class="text-[10px] text-slate-500 dark:text-slate-400 truncate">
                        {{ auth()->user()->email ?? 'user@example.com' }}</p>
                </div>
                <div class="p-2">
                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2 text-sm text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-lg transition-colors">
                        <i data-lucide="user" class="w-4 h-4"></i>
                        Profil Saya
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2 text-sm text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-lg transition-colors">
                        <i data-lucide="settings" class="w-4 h-4"></i>
                        Pengaturan Akun
                    </a>
                </div>
                <div class="p-2 border-t border-slate-50 dark:border-slate-800">
                    <form action="{{ route('prosesLogout') }}" method="POST" id="logoutForm">
                        @csrf
                        <button type="button" onclick="confirmLogout()"
                            class="w-full flex items-center gap-3 px-3 py-2 text-sm text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors font-semibold">
                            <i data-lucide="log-out" class="w-4 h-4"></i>
                            Keluar (Logout)
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

