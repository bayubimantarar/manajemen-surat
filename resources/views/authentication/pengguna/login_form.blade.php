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
                        @if($errors->has('notification'))
                            <p class="text-danger">
                                {{ $errors->first('notification') }}
                            </p>
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
                                class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                value="{{ old('email') }}"
                            />
                            @if($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">
                                Kata Sandi
                            </label>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                            />
                            @if($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <p>
                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            <i class="fa fa-sign-in-alt"></i> Masuk
                        </button>
                        &nbsp;
                        <a href="#">
                            Lupa kata sandi?
                        </a>
                        </p>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
