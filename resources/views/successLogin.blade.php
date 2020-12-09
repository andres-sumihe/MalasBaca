<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<table border="1">
		<tr>
			<th>NIM</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Password</th>
			<th>Phone</th>
			<th>Address</th>
		</tr>
		<?php foreach ($pengguna as $p): ?>
			<tr>
				<td>{{ $p->nim_pengguna }}</td>
				<td>{{ $p->nama_pengguna }}</td>
				<td>{{ $p->email_pengguna }}</td>
				<td>{{ $p->password_pengguna }}</td>
				<td>{{ $p->phone_pengguna }}</td>
				<td>{{ $p->address_pengguna }}</td>
			</tr>
		<?php endforeach ?>
	</table>
</body>
</html>