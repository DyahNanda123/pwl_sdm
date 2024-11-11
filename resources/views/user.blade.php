{{-- <!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
</head>
<body>
    <h1>Data User</h1>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{ $d->user_id }}</td>
            <td>{{ $d->NIP }}</td>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->email }}</td>
            <td>{{ $d->role }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html> --}}

<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
</head>
<body>
    <h1>Data User</h1>
    <a href="/pwl_sdm/public/user/tambah">Tambah User</a>

    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <td>ID</td>
            <td>NIP</td>
            <td>Nama</td>
            <td>Email</td>
            <td>Role</td>
            <td>Aksi</td>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{ $d->user_id }}</td>
            <td>{{ $d->NIP }}</td>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->email }}</td>
            <td>{{ $d->role }}</td>
            <td>
                <a href="/pwl_sdm/public/user/ubah/{{ $d->user_id }}">Ubah</a> | 
                <a href="/pwl_sdm/public/user/hapus/{{ $d->user_id }}">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
