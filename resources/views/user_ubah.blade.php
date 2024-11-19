<!DOCTYPE html>
<html>
<head>
    <title>Data Ubah User</title>
</head>
<body>
    <h1>Form Ubah Data User</h1>
    <a href="/user">Kembali</a>
    <br><br>

    <form method="post" action="/pwl_sdm/public/user/ubah_simpan/{{ $data->user_id }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <label>NIP</label>
        <input type="text" name="NIP" placeholder="Masukkan NIP" value="{{ $data->NIP }}" required>
        <br>

        <label>Nama</label>
        <input type="text" name="nama" placeholder="Masukkan Nama" value="{{ $data->nama }}" required>
        <br>

        <label>Email</label>
        <input type="email" name="email" placeholder="Masukkan Email" value="{{ $data->email }}" required>
        <br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Masukkan Password">
        <br>

        <label>Role</label>
        <input type="number" name="role" placeholder="Masukkan Role ID" value="{{ $data->role }}" required>
        <br><br>

        <input type="submit" class="btn btn-success" value="Ubah">
    </form>
</body>
</html>
