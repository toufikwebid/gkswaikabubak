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
    <a class="nav-link" href="<?php echo base_url() . 'admin/dashboard' ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() . 'admin/pendeta' ?>">
      <i class="fas fa-user-tie"></i>
      <span>Data Pendeta</span></a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-images"></i>
      <span>Data Jemaat</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?php echo base_url() . 'admin/data_jemaat' ?>">Kelola Jemaat</a>
        <a class="collapse-item" href="<?php echo base_url() . 'admin/djemaat' ?>">Download Data</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() . 'admin/agenda' ?>">
      <i class="fas fa-fw fa-envelope-open"></i>
      <span>Data Kebaktian</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() . 'admin/pengumuman' ?>">
      <i class="fas fa-fw fa-volume-up"></i>
      <span>Data Pengumuman</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() . 'admin/rsvp' ?>">
      <i class="fas fa-calendar-alt"></i>
      <span>Data RSVP</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() . 'admin/files' ?>">
      <i class="fas fa-fw fa-download"></i>
      <span>Data Download</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() . 'admin/situs' ?>">
      <i class="fas fa-fw fa-cog"></i>
      <span>Pengaturan Website</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() . 'admin/video' ?>">
      <i class="fas fa-video"></i>
      <span>Data Video</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() . 'admin/pengguna' ?>">
      <i class="fas fa-fw fa-users"></i>
      <span>Data User</span></a>
  </li>

  <!-- Divider -->

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSiji" aria-expanded="true" aria-controls="collapseSiji">
      <i class="fas fa-newspaper"></i>
      <span>Berita</span>
    </a>
    <div id="collapseSiji" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?php echo base_url() . 'admin/tulisan' ?>">List Berita</a>
        <a class="collapse-item" href="<?php echo base_url() . 'admin/tulisan/add_tulisan' ?>">Pos Berita</a>
        <a class="collapse-item" href="<?php echo base_url() . 'admin/kategori' ?>">Kategori Berita</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-images"></i>
      <span>Album Galeri</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?php echo base_url() . 'admin/album' ?>">Kategori Galeri</a>
        <a class="collapse-item" href="<?php echo base_url() . 'admin/galeri' ?>">Foto Galeri</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() . 'admin/saran' ?>">
    <i class="fas fa-lightbulb"></i>

      <span>Data Saran</span></a>
  </li>
  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() . 'admin/login/logout' ?>">
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