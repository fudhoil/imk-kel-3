<h1 class="visually-hidden">Sidebars examples</h1>

  <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; position:absolute; height:100%; height:100vh">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/" class="nav-link {{ ($title === "Home") ? 'active' : '' }} text-white" aria-current="page">
          <i class="menu-icon fa fa-dashboard"></i>Home </a>
      </li>
      <li>
        <a href="/barang" class="nav-link {{ ($title === "Barang") ? 'active' : '' }} text-white">
          <i class="menu-icon fa fa-tasks"></i>Daftar Barang</a>
      </li>
      <li>
        <a href="/peminjaman-barang" class="nav-link {{ ($title === "Peminjaman") ? 'active' : '' }} text-white">
          <i class="menu-icon fa fa-file-o"></i>Form Peminjaman</a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>