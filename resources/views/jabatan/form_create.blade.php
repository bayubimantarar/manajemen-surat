<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form action="/jabatan/simpan" method="post">
        @csrf
        <ul>
            @foreach($errors->all() as $errorItem)
                <li>{{ $errorItem }}</li>
            @endforeach
        </ul>
        <p>
            Kode <input type="text" name="kode" />
        </p>
        <p>
            Nama <input type="text" name="nama" />
        </p>
        <p>
            <button type="submit">Simpan</button>
        </p>
    </form>
</body>
</html>
