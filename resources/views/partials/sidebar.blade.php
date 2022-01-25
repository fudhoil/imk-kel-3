<div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" aria-current="page" href="/">
                <span data-feather="home"></span>
                Welcome
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($title === "Barang") ? 'active' : '' }}" href="/barang">
                <span data-feather="file"></span>
                Barang
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($title === "Peminjaman") ? 'active' : '' }}" href="/peminjaman">
                <span data-feather="shopping-cart"></span>
                Peminjaman
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($title === "Laporan") ? 'active' : '' }}" href="/laporan">
                <span data-feather="bar-chart-2"></span>
                Laporan
              </a>
            </li>
          </ul>

        </div>
      </nav>