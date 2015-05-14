<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
<title> Login
</title>
</head>
<body>
	<div id="login">
	{if !$isLoggedIn}
		{if isset($showRegisterUser)}
			{if $showRegisterUser}
				{include file='registeruser.tpl'}
			{/if}
		{else if isset($showForgottenPassword)}
			{if $showForgottenPassword}
				{include file='forgottenpassword.tpl'}
			{/if}					
		{else}		
			<form id="login_id" name="login" action="login.php" method="post">
			<table> 
			<tr><td>Brukernavn:</td><td><input type="text" name="username" class="inputfield"></td></tr> 
			<tr><td>Passord:</td><td><input type="password" name="password" class="inputfield"></td></tr> 
			<tr><td colspan="2"><input name="login_input" type="submit" value="Log in"></td></tr>
			</table>
			</form>
			<br>
			<a href="registeruser.php?showRegisterUser='true'">Register New User</a><br>
			<a href="forgottenpassword.php?showForgottenPassword='true'">Forgot Your Password?</a><br>
		{/if}		
	{else}
		{if isset($showChangePassword)}
			{if $showChangePassword}
				{include file='changepassword.tpl'}
			{/if}
		{else if isset($editprofile)}
			{if $editprofile}
				{include file='editprofile.tpl'}
			{/if}				
		{else}
			Welcome, {$activeUser->getName()}.<br>
			{if $activeUser->getPictureFilename()  != ""}				
				<img alt="Profile Picture" src="uploadedfiles/{$activeUser->getPictureFilename()}"><br>
			{/if}
			<a href="changepassword.php?showChangePassword='true'">Change Password</a><br>
			<a href="editprofile.php?editprofile='true'">Change User Pic</a><br>
			{if $activeUser->getUsertype() == 1}
			<a href="createpost.php?createpost='true'">Write New Post</a><br>
			{/if}
			<a href="logout.php">Log out</a><br>
			
		{/if}
	{/if}	
	</div>
</body>
</html>