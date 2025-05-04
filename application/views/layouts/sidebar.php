<ul style="background-color: #7bc47f;" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex flex-column align-items-center justify-content-center" href="index.html">
    <span class="sidebar-brand-text mx-3" style="color: #7bc47f; display: block; background-color: white; padding-top: 5px; padding-left: 10px; padding-right: 10px; margin: 0px !important;">AutoGrow</span>
    <span class="sidebar-brand-text mx-3" style="color: #7bc47f; display: block; background-color: white; padding-bottom: 3px; padding-left: 10px; padding-right: 10px; margin: 0px !important;">Chili</span>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0 mb-2">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?= ($this->uri->segment(1) == 'dashboard') ? 'active' : '' ?> p-1">
    <a class="nav-link py-1" href="<?= site_url('dashboard') ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <!-- Nav Item - Lokasi -->
  <li class="nav-item <?= ($this->uri->segment(1) == 'lokasi') ? 'active' : '' ?> p-1">
    <a class="nav-link py-1" href="<?= site_url('lokasi') ?>">
      <i class="fas fa-solid fa-map"></i>
      <span>Lokasi</span>
    </a>
  </li>

  <!-- Nav Item - Penjadwalan -->
  <li class="nav-item <?= ($this->uri->segment(1) == 'penjadwalan') ? 'active' : '' ?> p-1">
    <a class="nav-link py-1" href="<?= site_url('penjadwalan') ?>">
      <i class="fas fa-solid fa-calendar"></i>
      <span>Penjadwalan</span>
    </a>
  </li>

</ul>