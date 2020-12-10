<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<table border="1">

		<?php 
		$check = Session::get('adminResultLogin');
		if (isset($check)){
			echo "true";
		}else{
			
			echo "false";
		}
		?>
	<a href="/admin/logout">Logout</a>
	</table>	
</body>
</html>