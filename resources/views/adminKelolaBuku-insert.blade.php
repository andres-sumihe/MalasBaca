<!DOCTYPE html>
<html>
<head>
	<title>Insert Buku</title>
</head>
<body>
	<form method="post" action="{{ route('saveBuku') }}">
		{{ csrf_field() }}
		<table>
			<tr>
				<td>ID Buku</td>
				<td><input type="text" name="id_buku" required></td>
			</tr>
			<tr>
				<td>Nama Buku</td>
				<td><input type="text" name="nama_buku" required></td>
			</tr>
			<tr>
				<td>Penulis Buku</td>
				<td><input type="text" name="penulis_buku" required></td>
			</tr>
			<tr>
				<td>Penerbit Buku</td>
				<td><input type="text" name="penerbit_buku" required></td>
			</tr>
			<tr>
				<td>URL Cover Buku</td>
				<td><input type="text" name="url_cover" required></td>
			</tr>
			<tr>
				<td>Tahun</td>
				<td><input type="text" name="tahun" required></td>
			</tr>
			<tr>
				<td>Stok</td>
				<td><input type="text" name="stok_buku" required></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><input type="text" name="status_buku" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Insert Buku" required></td>
			</tr>
		</table>
	</form>
</body>
</html>