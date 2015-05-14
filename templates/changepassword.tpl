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
			<tr><td>Gammelt Passord:</td><td><input type="password" name ="oldpassword" class="inputfield"></td></tr> 
			<tr><td>Nytt Passord:</td><td><input type="password" name="newpassword" class="inputfield"></td></tr> 
			<tr><td>Gjenta Nytt Passord:</td><td><input type="password" name="rnewpassword" class="inputfield"></td></tr> 
			<tr><td colspan="2"><input type="submit" value="Endre Passord"></td></tr>
		</table>
		</form>
	</div>
</body>
</html>