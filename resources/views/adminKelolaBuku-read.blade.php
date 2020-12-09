<!DOCTYPE html>
<html>
<head>
	<title>Read Buku</title>
</head>
<body>
	<a href="{{ route('insertBuku') }}">>> Input Buku</a>
	<br>
	<br>
	<table border="1">
		<tr>
			<th>ID Buku</th>
			<th>Nama Buku</th>
			<th>Penulis Buku</th>
			<th>Penerbit Buku</th>
			<th>URL Cover Buku</th>
			<th>Tahun</th>
			<th>Action</th>
		</tr>
		<?php foreach ($buku as $b): ?>
			<tr>
				<td>{{ $b->id_buku }}</td>
				<td>{{ $b->nama_buku }}</td>
				<td>{{ $b->penulis_buku }}</td>
				<td>{{ $b->penerbit_buku }}</td>
				<td>{{ $b->url_cover }}</td>
				<td>{{ $b->tahun }}</td>
				<td><a href="/admin/updateBuku/{{ $b->id_buku }}">Edit</a> | <a href="/admin/deleteBuku/{{ $b->id_buku }}">Hapus</a></td>
			</tr>
		<?php endforeach ?>
	</table>
	
</body>
</html>