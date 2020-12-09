<!DOCTYPE html>
<html>
<head>
	<title>Read Admin</title>
</head>
<body>
	<a href="{{ route('insertAdmin') }}">>> Insert Admin</a>
	<br>
	<br>
	<table border="1">
		<tr>
			<th>ID Admin</th>
			<th>Nama Admin</th>
			<th>Username Admin</th>
			<th>Password Admin</th>
			<th>Action</th>
		</tr>
		<?php foreach ($admin as $a): ?>
			<tr>
				<td>{{ $a->id_admin }}</td>
				<td>{{ $a->nama_admin }}</td>
				<td>{{ $a->username_admin }}</td>
				<td>{{ $a->password_admin }}</td>
				<td>
					<a href="/admin/updateAdmin/{{ $a->id_admin }}">Edit</a> | 
					<a href="/admin/deleteAdmin/{{ $a->id_admin }}">Hapus</a>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
	
</body>
</html>