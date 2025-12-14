<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url(); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">GKS WAIKABUBAK</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() . 'user/management_user' ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Jemaat Management</span></a>

    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() . 'user/management_keluarga' ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Atur Data Keluarga</span></a>

    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() . 'user/upcoming_event' ?>">
            <i class="fas fa-fw fa-address-book"></i>
            <span>Upcoming Event</span></a>


        <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() . 'user/auth/logout' ?>">
            <i class="fas fa-fw fa-power-off"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var sidebarToggle = document.getElementById('sidebarToggle');
        var sidebar = document.getElementById('accordionSidebar');

        function checkScreenSize() {
            if (window.innerWidth <= 768) { // 768px adalah ukuran standar untuk mobile
                // Jika sidebar terbuka, tutupkan sidebar
                if (!sidebar.classList.contains('toggled')) {
                    sidebarToggle.click();
                }
            } else {
                // Jika sidebar tertutup, buka sidebar
                if (sidebar.classList.contains('toggled')) {
                    sidebarToggle.click();
                }
            }
        }

        // Periksa saat halaman pertama kali dimuat
        checkScreenSize();

        // Periksa saat ukuran layar berubah
        window.addEventListener('resize', checkScreenSize);
    });
</script>