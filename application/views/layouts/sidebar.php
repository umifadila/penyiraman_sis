<aside class="main-sidebar sidebar-dark-primary elevation-4">


  <!-- Sidebar -->
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= site_url("assets/dist/img/avatar.png") ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Andi Septian</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?= site_url("dashboard") ?>" class="nav-link <?= $this->uri->segment(1) == '' || $this->uri->segment(1) == 'dashboard'  ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashbord
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url("sepeda") ?>" class="nav-link <?= $this->uri->segment(1) == 'sepeda' ? 'active' : ''; ?>"">
             <i class=" nav-icon fas fa-solid fa-gear"></i>
            <p>
              Sepeda
            </p>
          </a>
        </li>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>