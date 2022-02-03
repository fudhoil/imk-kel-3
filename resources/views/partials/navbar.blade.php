<nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark p-0 shadow">
  <div class="container-fluid justify-content-between">
    <div class="d-flex">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 text-warning bg-dark" href="/" style="font-family: 'Oswald', sans-serif;">GATRA COLLABORATIVE</a>
    </div>
    <button class="navbar-toggler bg-warning text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <i data-feather="user"></i>
    </button>
      @auth
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" href="/logout">Keluar <i data-feather="log-out"></i></a>
        </div>
      </div>
      @endauth
  </div>
</nav>