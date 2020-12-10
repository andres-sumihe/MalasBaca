<!DOCTYPE html>
<html>
<head>
	<title>Insert Peminjaman</title>
</head>
<body>
	<form method="post" action="{{ route('savePeminjaman') }}">
		{{ csrf_field() }}
		<table>
			<tr>
				<td>ID_ Peminjaman</td>
				<td><input type="text" name="id_peminjaman" required></td>
			</tr>
			<tr>
				<td>Tanggal Pinjam</td>
				<td><input type="text" name="tanggal_pinjam" required></td>
			</tr>
			<tr>
				<td>Tanggal Kembali</td>
				<td><input type="text" name="tanggal_kembali" required></td>
			</tr>
			<tr>
				<td>Status Peminjaman</td>
				<td><input type="text" name="status_peminjaman" required></td>
			</tr>
			<tr>
				<td>ID Buku</td>
				<td><input type="text" name="id_buku" required></td>
			</tr>
			<tr>
				<td>NIM Pengguna</td>
				<td><input type="text" name="nim_pengguna" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Insert Peminjaman" required></td>
			</tr>
		</table>
	</form>
</body>
</html>