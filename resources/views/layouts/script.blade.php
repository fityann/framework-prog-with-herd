<script>
    lucide.createIcons();

    // Deteksi tema sistem saat pertama kali load
    if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
        document.documentElement.classList.add('dark');
    }

    // Toggle Sidebar Dropdowns
    function toggleDropdown(id) {
        const element = document.getElementById(id);
        element.classList.toggle('dropdown-active');
    }

    // Toggle Profile Dropdown
    function toggleProfileMenu() {
        const dropdown = document.getElementById('profileDropdown');
        dropdown.classList.toggle('show');
    }

    // Konfirmasi Logout dengan SweetAlert2
    function confirmLogout() {
        const isDark = document.documentElement.classList.contains('dark');

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Sesi Anda akan diakhiri dan Anda perlu login kembali.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1B5E20',
            cancelButtonColor: '#ef4444',
            confirmButtonText: 'Ya, Keluar!',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            background: isDark ? '#0f172a' : '#ffffff',
            color: isDark ? '#f1f5f9' : '#0f172a',
            borderRadius: '1.25rem',
            customClass: {
                popup: 'rounded-[2rem] border dark:border-slate-800',
                confirmButton: 'rounded-xl px-6 py-3 font-bold',
                cancelButton: 'rounded-xl px-6 py-3 font-bold'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logoutForm').submit();
            }
        });
    }

    // Close profile dropdown when clicking outside
    window.addEventListener('click', function(e) {
        const dropdown = document.getElementById('profileDropdown');
        const button = document.getElementById('profileButton');
        if (dropdown && button) {
            if (!button.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.remove('show');
            }
        }
    });
</script>
