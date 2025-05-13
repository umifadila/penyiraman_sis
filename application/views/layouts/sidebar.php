<ul style="background-color: #2E8B57;" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

<br>
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex flex-column align-items-center justify-content-center py-3" href="index.html" style="text-decoration: none;">
    <div style="background: white; padding: 8px 16px; border-radius: 12px;">
      <span style="font-size: 1.2rem; font-weight: 700; color: #2E8B57;">AutoGrow</span>
      <span style="font-size: 0.9rem; font-weight: 500; color: #2E8B57;">Chili</span>
    </div>
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
