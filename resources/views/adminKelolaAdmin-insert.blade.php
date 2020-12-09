<!DOCTYPE html>
<html>
<head>
	<title>Insert Admin</title>
</head>
<body>
	<form method="post" action="{{ route('saveAdmin') }}">
		{{ csrf_field() }}
		<table>
			<tr>
				<td>ID Admin</td>
				<td><input type="text" name="id_admin" required></td>
			</tr>
			<tr>
				<td>Nama Admin</td>
				<td><input type="text" name="nama_admin" required></td>
			</tr>
			<tr>
				<td>Username Admin</td>
				<td><input type="text" name="username_admin" required></td>
			</tr>
			<tr>
				<td>Password Admin</td>
				<td><input type="text" name="password_admin" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Insert Admin" required></td>
			</tr>
		</table>
	</form>
</body>
</html>