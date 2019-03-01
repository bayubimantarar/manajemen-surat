<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form action="/pegawai/simpan" method="post">
        @csrf
        <p>Jabatan ID : <input type="number" name="jabatan_id" /></p>
        <p>Nama : <input type="text" name="nama" /></p>
        <p>Nomor Telepon : <input type="number" name="nomor_telepon" /></p>
        <p>Email : <input type="text" name="email" /></p>
        <p>Alamat : <input type="number" name="alamat" /></p>
        <p><input type="submit" name="Simpan" value="Simpan"></p>
    </form>
</body>
</html>
