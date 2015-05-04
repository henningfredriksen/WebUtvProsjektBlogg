<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<div id="login">
	{if !$isLoggedIn}	
		<form id="login_id" name="login" action="login.php" method="post">
		Brukernavn: <input type="text" name="username"><br>
		Passord: <input type="password" name="password"><br>
		<input name="login_input" type="submit" value="Log in">
		</form>	
		<a href="registeruser.html">Registrer deg</a></p>
	{else}
		Hello, {$activeUser->getUserName()}
		<a href="changepassword.html">Endre Passord</a></p>
	{/if}	
	</div>
</body>
</hmtl>