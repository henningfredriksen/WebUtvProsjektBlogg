<input type="hidden" name="fromlink" value="1">

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Endre Passord</title>
</head>
<body>
	<form action="changepassword.php" method="post">
		Gammelt Passord: <input type="password" name ="oldpassword"><br>
		Nytt Passord: <input type="password" name="newpassword"><br>
		Gjenta Nytt Passord: <input type="password" name="rnewpassword"><br>
		<input type="submit" value="Endre Passord">
	</form>
</body>
</html>