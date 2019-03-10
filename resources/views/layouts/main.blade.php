<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width">
    <link
        rel="stylesheet"
        href="/assets/css/bootstrap.css"
    />
    <link
        rel="stylesheet"
        href="/assets/font-awesome/css/all.css"
    />
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Lato|Roboto+Slab"
    />
    @yield('css')
    <style>
        body {
            background-color: #eee;
            font-family: 'Lato', sans-serif;
        }
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Roboto Slab', serif;
        }
        .container {
            margin-top: 20px;
        }
        .bg-light {
            background-color: #fff !important;
        }
    </style>
    <title>@yield('title')</title>
</head>
<body>
    <!-- include navbar -->
    @include('layouts.components.navbar')

    <!-- content -->
    @yield('content')

    <script
        type="text/javascript"
        src="/assets/js/jquery-3.3.1.js"
    ></script>
    <script
        type="text/javascript"
        src="/assets/js/bootstrap.js"
    ></script>

    <!-- custom different javascript in every module -->
    @yield('js')
</body>
</html>
