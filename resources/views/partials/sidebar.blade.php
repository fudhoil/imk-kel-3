<div class="container-fluid">
  <button class="navbar-toggler bg-dark collapsed mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <i data-feather="menu" class=" pb-1 text-white"></i>
  </button>
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" aria-current="page" href="/home" style="font-family: 'Raleway', sans-serif;">
                <span data-feather="home"></span>
                Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($title === "Barang") ? 'active' : '' }}" href="/barang" style="font-family: 'Raleway', sans-serif;">
                <span data-feather="file"></span>
                Barang
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($title === "Peminjaman") ? 'active' : '' }}" href="/peminjaman" style="font-family: 'Raleway', sans-serif;">
                <span data-feather="shopping-cart"></span>
                Peminjaman
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($title === "Laporan") ? 'active' : '' }}" href="/laporan" style="font-family: 'Raleway', sans-serif;">
                <span data-feather="bar-chart-2"></span>
                Laporan
              </a>
            </li>
          </ul>

        </div>
      </nav>
    </div>
</div>