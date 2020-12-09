<!DOCTYPE html>
<html>
<head>
	<title>Update Buku</title>
</head>
<body>
	<form method="post" action="/admin/saveUpdateBuku">
		{{ csrf_field() }}
		<table>
			<?php foreach ($result as $r): ?>
		
			<td><input type="hidden" name="id_buku" value="{{ $r->id_buku }}" required></td>

			<tr>
				<td>Nama Buku</td>
				<td><input type="text" name="nama_buku" value="{{ $r->nama_buku  }}" required></td>
			</tr>
			<tr>
				<td>Penulis Buku</td>
				<td><input type="text" name="penulis_buku" value="{{ $r->penulis_buku }}" required></td>
			</tr>
			<tr>
				<td>Penerbit Buku</td>
				<td><input type="text" name="penerbit_buku" value="{{ $r->penerbit_buku }}" required></td>
			</tr>
			<tr>
				<td>URL Cover Buku</td>
				<td><input type="text" name="url_cover" value="{{ $r->url_cover }}" required></td>
			</tr>
			<tr>
				<td>Tahun</td>
				<td><input type="text" name="tahun" value="{{ $r->tahun }}" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Update Buku" required></td>
			</tr>
			<?php endforeach ?>
		</table>
	</form>
</body>
</html>