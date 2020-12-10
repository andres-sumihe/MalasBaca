<!DOCTYPE html>
<html>
<head>
	<title>Test Fungsi</title>
</head>
<body>
	Cari Buku 
	<form method="post" action="{{ route('cariBukuResult') }}">
		{{ csrf_field() }}
		<table>
			<tr>
				<td>Nama Buku</td>
				<td><input type="text" name="nama_buku" required></td>
			</tr>
			<tr>
		
			<tr>
				<td></td>
				<td><input type="submit" value="Cari Buku" required></td>
			</tr>
		</table>
	</form>
	<?php if (isset($resultBuku)): ?>
		<table border="1">
		<tr>
			<th>Nama Buku</th>
			<th>Action</th>
		</tr>
		<?php foreach ($resultBuku as $rB): ?>
			<tr>
				<td>{{ $rB->nama_buku }}</td>
				<td><a href="">Detail</a>
			</tr>
		<?php endforeach ?>
	</table>
	<?php endif ?>
	
</body>
</html>