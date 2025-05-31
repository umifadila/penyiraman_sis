<ul style="background-color: #26A69A;" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">


  <!-- Sidebar - Brand -->
  <a  style="text-decoration: none; padding: 0px !important;"  class="sidebar-brand d-flex flex-column align-items-center justify-content-center  pading-0 mt-0" href="index.html">
  <div style="line-height: 1rem; padding: 0px !important;"  class="">
  <span style="
    font-size: 1.2rem;
    font-weight: 700;
    color:rgb(255, 255, 255);

 
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
  ">
    AutoGrow <br> 

    <span style="
    font-size: 0.9rem;
    font-weight: 500;
    color:rgb(255, 255, 255);
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
    margin: 0px;
    padding: 0px;
  ">
    Chili
  </span>
  </span>
  

</div>

  </a>

  <!-- Divider -->
  <hr class="sidebar-divider  mb-2">

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
