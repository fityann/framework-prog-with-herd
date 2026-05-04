<style>
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .sidebar-item-active {
        background-color: #E8F5E9;
        color: #1B5E20;
        border-left: 4px solid #1B5E20;
    }

    /* Dark mode active state for sidebar */
    .dark .sidebar-item-active {
        background-color: rgba(27, 94, 32, 0.2);
        color: #4ade80;
        border-left: 4px solid #4ade80;
    }

    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #E0E0E0;
        border-radius: 10px;
    }

    .dark .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #334155;
    }

    /* Dropdown Sidebar & Profile */
    /* Styling Dropdown */
    .dropdown-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
    }

    /* Class ini akan dipasang oleh Laravel secara server-side */
    .dropdown-active .dropdown-content {
        max-height: 500px;
        /* Nilai yang cukup besar untuk menampung submenu */
    }

    .dropdown-active .chevron-icon {
        transform: rotate(180deg);
    }

    /* Warna Fokus Aktif Menu Utama */
    .sidebar-item-active {
        background-color: #16a34a !important;
        /* Green-600 */
        color: white !important;
    }

    .sidebar-item-inactive {
        color: #64748b;
        /* Slate-500 */
    }

    .sidebar-item-inactive:hover {
        background-color: #f8fafc;
        /* Slate-50 */
    }

    /* Untuk mode gelap */
    .dark .sidebar-item-inactive:hover {
        background-color: rgba(30, 41, 59, 0.5);
    }

    /* Profile Dropdown Specific */
    .profile-dropdown {
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: all 0.2s ease-in-out;
    }

    .profile-dropdown.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
</style>
