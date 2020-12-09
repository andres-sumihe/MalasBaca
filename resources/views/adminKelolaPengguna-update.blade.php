<!DOCTYPE html>
<html>
<head>
	<title>Update Pengguna</title>
</head>
<body>
	<form method="post" action="/admin/saveUpdatePengguna">
		{{ csrf_field() }}
		<table>
			<?php foreach ($result as $r): ?>
		
			<td><input type="hidden" name="nim_pengguna" value="{{ $r->nim_pengguna }}" required></td>

			<tr>
				<td>Nama Pengguna</td>
				<td><input type="text" name="nama_pengguna" value="{{ $r->nama_pengguna  }}" required></td>
			</tr>
			<tr>
				<td>Email Pengguna</td>
				<td><input type="text" name="email_pengguna" value="{{ $r->email_pengguna }}" required></td>
			</tr>
			<tr>
				<td>Password Pengguna</td>
				<td><input type="text" name="password_pengguna" value="{{ $r->password_pengguna }}" required></td>
			</tr>
			<tr>
				<td>No. HP Pengguna</td>
				<td><input type="text" name="phone_pengguna" value="{{ $r->phone_pengguna }}" required></td>
			</tr>
			<tr>
				<td>Alamat Pengguna</td>
				<td><input type="text" name="address_pengguna" value="{{ $r->address_pengguna }}" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Update Pengguna" required></td>
			</tr>
			<?php endforeach ?>
		</table>
	</form>
</body>
</html>