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
    <title>@yield('title')</title>
</head>
<body>
    <!-- include navbar -->
    @include('layouts.components.navbar')

    <!-- content -->
    @yield('content')

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
