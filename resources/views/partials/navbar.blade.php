<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand bg-warning col-md-3 col-lg-2 me-0 px-3 text-black" href="/">GATRA COLLABORATIVE</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    @auth
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-decoration-none text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
          Selamat datang, {{ auth()->user()->nama }}
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item disabled" href="#">Profil</a></li>
          <li><a class="dropdown-item" href="/">Home</a></li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="dropdown-item">Keluar</button>
            </form>
        </ul>
      </div>
    @else
        <div class="nav-item text-nowrap">
          <a class="nav-link px-3  text-decoration-none text-white" href="/login">Masuk</a>
        </div>
    @endauth

</header>