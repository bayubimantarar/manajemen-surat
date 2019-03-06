<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width">
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous"
    >
    <style>
        body {
            margin-top: 100px;
            background-color: #eee;
        }
    </style>
    <title>Form Login | Aplikasi Manajamen Surat</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">
                        Form Login
                    </h3>
                    <hr />
                    <!-- card content -->
                    <form method="post" action="/autentikasi/login">
                        @if(!empty($errors->all()))
                            <ul>
                                @foreach($errors->all() as $errorItem)
                                    <li>{{ $errorItem }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <input
                            type="hidden"
                            name="_token"
                            value="{{ csrf_token() }}"
                        />
                        <div class="form-group">
                            <label for="email">
                                Email
                            </label>
                            <input
                                type="text"
                                name="email"
                                id="email"
                                class="form-control"
                            />
                        </div>
                        <div class="form-group">
                            <label for="password">
                                Kata Sandi
                            </label>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control"
                            />
                        </div>
                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            <i class="fa fa-sign-in-alt"></i> Masuk
                        </button>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
