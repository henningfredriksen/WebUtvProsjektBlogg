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
		<a href="registeruser.php?showRegisterUser='true'">Register New User</a></p>
	{else}
		{if isset($showRegisterUser)}
			{if $showRegisterUser}
				{include file='registeruser.tpl'}
			{/if}			
		{else}	
			Hello, {$activeUser->getUserName()}
			<a href="changepassword.html">Endre Passord</a></p>
			<div id="writenewpostbutton">
				<button value="Write New Post"   />
			</div>
		{/if}		
	{/if}	
	</div>
</body>
</hmtl>