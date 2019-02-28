<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form method="post" action="/autentikasi/login">
        <ul>
            @foreach($errors->all() as $errorItem)
                <li>{{ $errorItem }}</li>
            @endforeach
        </ul>
        @csrf
        <p>
            Email <input type="text" name="email" />
        </p>
        <p>
            Password <input type="password" name="password" />
        </p>
        <p>
            <input type="submit" name="login-button" value="Login">
        </p>
    </form>
</body>
</html>
