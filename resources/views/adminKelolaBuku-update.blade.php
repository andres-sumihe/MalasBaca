<!DOCTYPE html>
<html>
<head>
	<title>Update Buku</title>
</head>
<body>
<form method="post" action="/admin/update-buku">

<!-- CEK DONG, KENAPA INI GA JADI :(  -->
	{{ csrf_field() }}
	<table>
		<td><input type="hidden" name="id_buku" id="id_buku" required></td>

		<tr>
			<td>Nama Buku</td>
			<td><input type="text" name="nama_buku" id="Title" required></td>
		</tr>
		<tr>
			<td>Penulis Buku</td>
			<td><input type="text" name="penulis_buku" id="Author" required></td>
		</tr>
		<tr>
			<td>Penerbit Buku</td>
			<td><input type="text" name="penerbit_buku" id="Publisher" required></td>
		</tr>
		<tr>
			<td>URL Cover Buku</td>
			<td><input type="text" name="url_cover" id="cover" required></td>
		</tr>
		<tr>
			<td>Stok Buku</td>
			<td><input type="text" name="stok_buku" id="Stock" required></td>
		</tr>
		<tr>
			<td>Status Buku</td>
			<td><input type="text" name="status_buku" id="Status" required></td>
		</tr>
		<tr>
			<td>Tahun</td>
			<td><input type="text" name="tahun" id="Year" required></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Update Buku" required></td>
		</tr>
	</table>
</form>
</body>
</html>