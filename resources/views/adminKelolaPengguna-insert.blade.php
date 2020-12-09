<!DOCTYPE html>
<html>
<head>
	<title>Insert Buku</title>
</head>
<body>
	<form method="post" action="{{ route('savePengguna') }}">
		{{ csrf_field() }}
		<table>
			<tr>
				<td>NIM Pengguna</td>
				<td><input type="text" name="nim_pengguna" required></td>
			</tr>
			<tr>
				<td>Nama Pengguna</td>
				<td><input type="text" name="nama_pengguna" required></td>
			</tr>
			<tr>
				<td>Email Pengguna</td>
				<td><input type="text" name="email_pengguna" required></td>
			</tr>
			<tr>
				<td>Password Pengguna</td>
				<td><input type="text" name="password_pengguna" required></td>
			</tr>
			<tr>
				<td>No. HP Pengguna</td>
				<td><input type="text" name="phone_pengguna" required></td>
			</tr>
			<tr>
				<td>Alamat Pengguna</td>
				<td><input type="text" name="address_pengguna" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Insert Pengguna" required></td>
			</tr>
		</table>
	</form>
</body>
</html>