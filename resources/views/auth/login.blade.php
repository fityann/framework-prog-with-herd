<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CrimsonFlow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        /* Custom styling untuk SweetAlert agar sesuai tema */
        .swal2-popup {
            border-radius: 1.5rem !important;
            font-family: 'Inter', sans-serif !important;
        }
        /* Penyesuaian Dark Mode untuk SweetAlert */
        @media (prefers-color-scheme: dark) {
            .swal2-popup {
                background-color: #1f2937 !important;
                color: #f3f4f6 !important;
            }
            .swal2-title, .swal2-html-container {
                color: #f3f4f6 !important;
            }
        }
        .swal2-confirm {
            background-color: #E53935 !important;
            border-radius: 1rem !important;
            padding: 0.75rem 2rem !important;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 bg-gray-100 dark:bg-gray-900 transition-colors duration-300">

    <!-- Container Utama -->
    <div class="bg-white dark:bg-gray-800 rounded-[2.5rem] shadow-2xl flex flex-col md:flex-row w-full max-w-5xl overflow-hidden min-h-[600px] transition-colors duration-300">

        <!-- Sisi Kiri: Form Login -->
        <div class="w-full md:w-1/2 p-8 md:p-16 flex flex-col justify-center">
            <!-- Logo -->
            <div class="flex items-center gap-2 mb-8">
                <div class="bg-red-600 p-2 rounded-lg">
                    <i data-lucide="flame" class="text-white w-5 h-5"></i>
                </div>
                <span class="font-bold text-xl text-gray-800 dark:text-white tracking-tight">CrimsonFlow</span>
            </div>

            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Log in to your Account</h1>
            <p class="text-gray-400 dark:text-gray-400 text-sm mb-8">Welcome back! Select method to log in:</p>

            <!-- Social Login -->
            <div class="flex flex-col sm:flex-row gap-4 mb-8">
                <button type="button" class="flex-1 border border-gray-200 dark:border-gray-700 rounded-full py-2.5 px-4 flex items-center justify-center gap-Z text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    <img src="https://www.gstatic.com/images/branding/product/1x/gsa_512dp.png" class="w-9 h-9" alt="Google">
                    Sign Up with Google
                </button>
                <button type="button" class="flex-1 border border-gray-200 dark:border-gray-700 rounded-full py-2.5 px-4 flex items-center justify-center gap-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    <i data-lucide="apple" class="w-9 h-9 fill-current"></i>
                    Sign Up with Apple
                </button>
            </div>

            <!-- Separator -->
            <div class="relative flex items-center justify-center mb-8">
                <div class="border-t border-gray-100 dark:border-gray-700 w-full"></div>
                <span class="absolute bg-white dark:bg-gray-800 px-4 text-xs text-gray-400 uppercase tracking-widest">or continue with email</span>
            </div>

            <!-- Login Form (Laravel Integrated) -->
            <form id="loginForm" action="{{ route('prosesLogin') }}" method="POST" class="space-y-4" novalidate>
                @csrf

                <!-- Email Input -->
                <div class="space-y-1">
                    <label for="email" class="text-xs font-semibold text-gray-500 dark:text-gray-400 ml-1">Email Address</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-4 flex items-center text-gray-400">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                        </span>
                        <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required
                            class="w-full pl-11 pr-4 py-3 bg-gray-50 dark:bg-gray-700 border border-transparent dark:text-white rounded-xl focus:bg-white dark:focus:bg-gray-600 focus:border-red-500 focus:ring-2 focus:ring-red-200 dark:focus:ring-red-900 outline-none transition-all text-sm @error('email') border-red-500 @enderror">
                    </div>
                </div>

                <!-- Password Input -->
                <div class="space-y-1">
                    <label for="password" class="text-xs font-semibold text-gray-500 dark:text-gray-400 ml-1">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-4 flex items-center text-gray-400">
                            <i data-lucide="lock" class="w-4 h-4"></i>
                        </span>
                        <input type="password" id="password" name="password" placeholder="Password" required
                            class="w-full pl-11 pr-11 py-3 bg-gray-50 dark:bg-gray-700 border border-transparent dark:text-white rounded-xl focus:bg-white dark:focus:bg-gray-600 focus:border-red-500 focus:ring-2 focus:ring-red-200 dark:focus:ring-red-900 outline-none transition-all text-sm @error('password') border-red-500 @enderror">
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-4 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-200">
                            <i data-lucide="eye" class="w-4 h-4" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 cursor-pointer text-gray-500 dark:text-gray-400">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-red-600 focus:ring-red-500 w-4 h-4">
                        <span>Remember me</span>
                    </label>
                    <a href="#" class="text-red-600 dark:text-red-400 font-medium hover:underline">Forgot Password?</a>
                </div>

                <button type="submit" class="w-full bg-[#E53935] hover:bg-[#D32F2F] text-white font-semibold py-3.5 rounded-2xl shadow-lg shadow-red-200 dark:shadow-none transition-all transform active:scale-[0.98] mt-4">
                    Explore Now
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 dark:text-gray-400 mt-8">
                Don't have an account? <a href="#" class="text-red-600 dark:text-red-400 font-bold hover:underline">Sign Up</a>
            </p>
        </div>

        <!-- Sisi Kanan: Branding/Ilustrasi -->
        <div class="hidden md:flex w-1/2 bg-gradient-to-br from-[#FF3D3D] to-[#B71C1C] dark:from-[#D32F2F] dark:to-[#7F0000] p-12 flex-col items-center justify-center relative text-white">
            <div class="relative z-10 w-full max-w-xs aspect-square">
                <div class="absolute inset-0 glass-effect rounded-[2.5rem] flex items-center justify-center shadow-2xl">
                    <div class="w-32 h-32 bg-white/10 rounded-3xl flex items-center justify-center border border-white/20 relative">
                        <i data-lucide="shield-check" class="w-12 h-12 text-white"></i>
                        <div class="absolute top-4 right-4 w-2 h-2 bg-white rounded-full"></div>
                    </div>
                    <div class="absolute bottom-6 flex gap-1">
                        <div class="w-1 h-1 bg-white/50 rounded-full"></div>
                        <div class="w-1 h-1 bg-white/50 rounded-full"></div>
                        <div class="w-1 h-1 bg-white/50 rounded-full"></div>
                    </div>
                </div>
            </div>

            <div class="mt-16 text-center max-w-sm z-10">
                <h2 class="text-3xl font-bold mb-4">Ironclad Security Core</h2>
                <p class="text-red-100 text-sm leading-relaxed opacity-90">
                    Enterprise-grade identity protection and OAuth integration baked directly into every microservice interaction.
                </p>
                <div class="flex justify-center gap-2 mt-8">
                    <div class="w-1.5 h-1.5 bg-white/30 rounded-full"></div>
                    <div class="w-1.5 h-1.5 bg-white/30 rounded-full"></div>
                    <div class="w-6 h-1.5 bg-white rounded-full"></div>
                </div>
            </div>

            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 32px 32px;"></div>
        </div>
    </div>

    <script>
        // Inisialisasi Ikon Lucide
        lucide.createIcons();

        // Fitur Show/Hide Password
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            const iconName = type === 'password' ? 'eye' : 'eye-off';
            this.innerHTML = `<i data-lucide="${iconName}" class="w-4 h-4"></i>`;
            lucide.createIcons();
        });

        // Tampilkan SweetAlert jika ada error dari Laravel (Server Side)
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Akses Ditolak',
                html: `
                    <div class="text-left mt-2">
                        <ul class="text-sm text-gray-600 dark:text-gray-400">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                `,
                confirmButtonText: 'Coba Lagi'
            });
        @endif

        // Validasi Sisi Klien dengan SweetAlert
        const loginForm = document.getElementById('loginForm');
        loginForm.addEventListener('submit', function(e) {
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();

            if (!email || !password) {
                e.preventDefault();
                let missingField = !email ? 'Email' : 'Password';

                Swal.fire({
                    icon: 'warning',
                    title: 'Kolom Wajib Diisi',
                    text: `${missingField} tidak boleh kosong!`,
                    confirmButtonText: 'Oke',
                    confirmButtonColor: '#E53935'
                });
                return;
            }

            Swal.fire({
                title: 'Memproses...',
                text: 'Harap tunggu sebentar',
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading();
                }
            });
        });
    </script>
</body>
</html>
