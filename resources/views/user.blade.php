<!DOCTYPE html>
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
</html>
