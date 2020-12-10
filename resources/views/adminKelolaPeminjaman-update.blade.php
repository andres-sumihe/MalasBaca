<!DOCTYPE html>
<html>
<head>
	<title>Update Peminjaman</title>
</head>
<body>
	<form method="post" action="/admin/saveUpdatePeminjaman">
		{{ csrf_field() }}
		<table>
			<?php foreach ($result as $r): ?>
		
			<td><input type="hidden" name="id_peminjaman" value="{{ $r->id_peminjaman }}" required></td>

			<tr>
				<td>Tanggal Pinjam</td>
				<td><input type="text" name="tanggal_pinjam" value="{{ $r->tanggal_pinjam }}" required></td>
			</tr>
			<tr>
				<td>Tanggal Kembali</td>
				<td><input type="text" name="tanggal_kembali" value="{{ $r->tanggal_kembali }}" required></td>
			</tr>
			<tr>
				<td>Status Peminjaman</td>
				<td><input type="text" name="status_peminjaman" value="{{ $r->status_peminjaman }}" required></td>
			</tr>
			<tr>
				<td>ID Peminjaman</td>
				<td><input type="text" name="id_buku" value="{{ $r->id_buku }}" required></td>
			</tr>
			<tr>
				<td>NIM Pengguna</td>
				<td><input type="text" name="nim_pengguna" value="{{ $r->nim_pengguna }}" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Update Peminjaman" required></td>
			</tr>
			<?php endforeach ?>
		</table>
	</form>
</body>
</html>