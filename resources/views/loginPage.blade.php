<!DOCTYPE html>
<html>
<head>
	<title>MalesBaca</title>
</head>
<body>
	<form method="post" action="{{ route('loginCheck') }}">
		{{ csrf_field() }}
		<table>
			<tr>
				<td>NIM</td>
				<td><input type="text" name="nim" required></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="input" required></td>
			</tr>
		</table>
	</form>
</body>
</html>