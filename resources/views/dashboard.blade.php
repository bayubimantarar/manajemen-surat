<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width">
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    >
    <style>
        body {
            background-color: #eee;
        }
        .container {
            margin-top: 20px;
        }
        .bg-light {
            background-color: #fff !important;
        }
    </style>
    <title>Dashboard | Surat Masuk - Surat Keluar</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">
            <img src="/img/logo-surat.png" width="40" height="40" alt="">
            Aplikasi Manajemen Surat
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
              <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa fa-envelope"></i> Surat Masuk
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa fa-envelope-open-text"></i> Surat Keluar
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa fa-users"></i> Pegawai
                </a>
              </li>
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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">
                        Dashboard
                    </h3>
                    <hr />
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <center>
                                <h1><i class="fa fa-envelope"></i></h1>
                                <h3>Total Surat Masuk</h3>
                                <h4>0</h4>
                            </center>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <center>
                                <h1><i class="fa fa-envelope-open-text"></i></h1>
                                <h3>Total Surat Masuk</h3>
                                <h4>0</h4>
                            </center>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <script
        type="text/javascript"
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    >
    </script>
    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    >
    </script>
    <script
        type="text/javascript"
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    >
    </script>
</body>
</html>
