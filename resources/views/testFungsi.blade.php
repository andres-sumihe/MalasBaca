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
				<td><input type="text" name="input" required></td>
				<td><label for="buku">Filter</label></td>
				<td>
					<select name="buku" id="buku">
					  <option value=""></option>
					  <option value="nama">Nama Buku</option>
					  <option value="penulis">Penulis Buku</option>
					  <option value="penerbit">Penerbit Buku</option>
					</select>
				</td>
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