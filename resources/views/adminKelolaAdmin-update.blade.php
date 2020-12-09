<!DOCTYPE html>
<html>
<head>
	<title>Update Admin</title>
</head>
<body>
	<form method="post" action="/admin/saveUpdateAdmin">
		{{ csrf_field() }}
		<table>
			<?php foreach ($result as $r): ?>
		
			<td><input type="hidden" name="id_admin" value="{{ $r->id_admin }}" required></td>

			<tr>
				<td>Nama Admin</td>
				<td><input type="text" name="nama_admin" value="{{ $r->nama_admin  }}" required></td>
			</tr>
			<tr>
				<td>Username Admin</td>
				<td><input type="text" name="username_admin" value="{{ $r->username_admin }}" required></td>
			</tr>
			<tr>
				<td>Password Admin</td>
				<td><input type="text" name="password_admin" value="{{ $r->password_admin }}" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Update Admin" required></td>
			</tr>
			<?php endforeach ?>
		</table>
	</form>
</body>
</html>