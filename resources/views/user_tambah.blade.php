<!DOCTYPE html>
<html>
<head>
    <title>Data Tambah User</title>
</head>
<body>
    <h1>Form Tambah Data User</h1>
    <form method="post" action="/pwl_sdm/public/user/tambah_simpan">
        {{ csrf_field() }}
        
        <label>NIP</label>
        <input type="text" name="NIP" placeholder="Masukkan NIP" required>
        <br>

        <label>Nama</label>
        <input type="text" name="nama" placeholder="Masukkan Nama" required>
        <br>

        <label>Email</label>
        <input type="email" name="email" placeholder="Masukkan Email" required>
        <br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Masukkan Password" required>
        <br>

        <label>Role</label>
        <input type="number" name="role" placeholder="Masukkan Role ID" required>
        <br>

        <input type="submit" class="btn btn-success" value="Simpan">
    </form>
</body>
</html>
