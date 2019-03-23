<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">
        <img src="/assets/img/logo-surat.png" width="40" height="40" alt="">
        Manajemen Surat
    </a>
    <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarText"
        aria-controls="navbarText"
        aria-expanded="false"
        aria-label="Toggle navigation"
    >
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <!-- left navbar -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item {{ Request::segment(1) == 'surat-masuk' ? 'active' : '' }}">
            <a class="nav-link" href="/surat-masuk">
                <i class="fa fa-envelope"></i> Surat Masuk
            </a>
          </li>
          <li class="nav-item {{ Request::segment(1) == 'surat-keluar' ? 'active' : '' }}">
            <a class="nav-link" href="/surat-keluar">
                <i class="fa fa-envelope-open-text"></i> Surat Keluar
            </a>
          </li>
          @if(Auth::guard('pengguna')->User()->role == "Super Admin")
            <li class="nav-item {{ Request::segment(1) == 'jabatan' ? 'active' : '' }}">
                <a class="nav-link" href="/jabatan">
                    <i class="fa fa-sort-alpha-up"></i> Jabatan
                </a>
            </li>
            <li class="nav-item {{ Request::segment(1) == 'pegawai' ? 'active' : '' }}">
                <a class="nav-link" href="/pegawai">
                    <i class="fa fa-users"></i> Pegawai
                </a>
            </li>
            <li class="nav-item {{ Request::segment(1) == 'pengguna' ? 'active' : '' }}">
                <a class="nav-link" href="/pengguna">
                    <i class="fa fa-users-cog"></i> Pengguna
                </a>
            </li>
          @endif
        </ul>
        <!-- right navbar -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <span class="navbar-text">
              <i class="fa fa-user"></i>
              {{ Auth::guard('pengguna')->User()->email }}
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa fa-cogs"></i> Pengaturan
            </a>
          </li>
          <li class="nav-item">
            <a
                href="/autentikasi/logout"
                class="nav-link"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
            >
                <i class="fa fa-sign-out-alt"></i> Keluar
            </a>
            <form
                id="logout-form"
                action="/autentikasi/logout"
                method="post"
                style="display: none;"
            >
                <input
                    type="hidden"
                    name="_token"
                    value="{{ csrf_token() }}"
                />
            </form>
          </li>
        </ul>
    </div>
</nav>
