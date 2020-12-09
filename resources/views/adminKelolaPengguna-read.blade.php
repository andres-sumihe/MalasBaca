<!DOCTYPE html>
<html>
<head>
	<title>Read Pengguna</title>
</head>
<body>
	<a href="{{ route('insertPengguna') }}">>> Insert Pengguna</a>
	<br>
	<br>
	<table border="1">
		<tr>
			<th>NIM Pengguna</th>
			<th>Nama Pengguna</th>
			<th>Email Pengguna</th>
			<th>Password Pengguna</th>
			<th>No. HP Pengguna</th>
			<th>Alamat Pengguna</th>
			<th>Action</th>
		</tr>
		<?php foreach ($pengguna as $p): ?>
			<tr>
				<td>{{ $p->nim_pengguna }}</td>
				<td>{{ $p->nama_pengguna }}</td>
				<td>{{ $p->email_pengguna }}</td>
				<td>{{ $p->password_pengguna }}</td>
				<td>{{ $p->phone_pengguna}}</td>
				<td>{{ $p->address_pengguna}}</td>
				<td>
					<a href="/admin/updatePengguna/{{ $p->nim_pengguna }}">Edit</a> | 
					<a href="/admin/deletePengguna/{{ $p->nim_pengguna }}">Hapus</a>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
	
</body>
</html>