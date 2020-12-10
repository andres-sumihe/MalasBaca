<!DOCTYPE html>
<html>
<head>
	<title>Read Peminjaman</title>
</head>
<body>
	<a href="{{ route('insertPeminjaman') }}">>> Insert Peminjaman</a>
	<br>
	<br>
	<table border="1">
		<tr>
			<th>ID Peminjaman</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Kembali</th>
			<th>Status Peminjaman</th>
			<th>ID Buku</th>
			<th>NIM Pengguna</th>
			<th>Action</th>
		</tr>
		<?php foreach ($peminjaman as $p): ?>
			<tr>
				<td>{{ $p->id_peminjaman }}</td>
				<td>{{ $p->tanggal_pinjam }}</td>
				<td>{{ $p->tanggal_kembali }}</td>
				<td>{{ $p->status_peminjaman }}</td>
				<td>{{ $p->id_buku}}</td>
				<td>{{ $p->nim_pengguna}}</td>
				<td>
					<a href="/admin/updatePeminjaman/{{ $p->id_peminjaman }}">Edit</a> | 
					<a href="/admin/deletePeminjaman/{{ $p->id_peminjaman }}">Hapus</a>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
	
</body>
</html>