<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
<title> Change Password
</title>
</head>
<body>
	<div id="changepassword">
		<form action="changepassword.php" method="post">
		<table>
			<tr><td>Gammelt Passord:</td><td><input type="password" name ="oldpassword"><br></td></tr> 
			<tr><td>Nytt Passord:</td><td><input type="password" name="newpassword"><br></td></tr> 
			<tr><td>Gjenta Nytt Passord:</td><td><input type="password" name="rnewpassword"><br></td></tr> 
			<tr><td><input type="submit" value="Endre Passord"></td></tr>
		</table>
		</form>
	</div>
</body>
</html>