<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
<title> Register user
</title>
</head>
<body>
	<div id="registeruser">
		<form action="registeruser.php" method="post">
		<table>
			<tr><td>Name</td><td><input type="text" name ="personname"></td></tr>
			<tr><td>Username</td><td><input type="text" name="username"></td></tr>
			<tr><td>Email</td><td><input type="text" name="email"></td></tr>
			<tr><td>Password</td><td><input type="password" name="password"></td></tr>
			<tr><td>Repeat password</td><td><input type="password" name="rpassword"></td></tr>
			<tr><td colspan="2"><input type="submit" value="Register User"></td></tr>
		</table>
		</form>
	</div>
</body>