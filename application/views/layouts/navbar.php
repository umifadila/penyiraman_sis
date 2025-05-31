<nav class="navbar navbar-expand navbar-light bg-white px-4 shadow-sm" style="border-bottom: 1px solid #eee;">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 text-success">
    <i class="fas fa-bars"></i>
  </button>

 
  <!-- Spacer -->
  <div class="flex-grow-1"></div>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">

    <!-- Search (XS only) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
      <a class="nav-link dropdown-toggle text-dark" href="#" id="searchDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right p-3 shadow-sm animated--grow-in"
        aria-labelledby="searchDropdown">
        <form class="form-inline w-100 navbar-search">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small"
              placeholder="Search..." aria-label="Search"
              aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-success" type="button">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>

    <!-- User Info -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php if ($this->session->userdata('is_logged_in')): ?>
          <span class="mr-2 d-none d-lg-inline small font-weight-semibold" style="color: #26A69A;">
            <?php echo strtoupper($this->session->userdata('username')) . ""; ?>
          </span>
          <i class="fas fa-user-circle fa-lg" style="color: #26A69A;"></i>
        <?php endif; ?>
      </a>
    </li>

  </ul>

</nav>
