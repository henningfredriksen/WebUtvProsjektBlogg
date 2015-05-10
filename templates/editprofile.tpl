<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
<title> Edit profile
</title>
</head>
<body>
	<div id="editprofile">
		<form enctype="multipart/form-data" action="editprofile.php" method="post">
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
			<input type="file" name="profilepic">
			<input type="hidden" name="userid" value="{$activeUser->getId()}"> 
			<input type="submit" value="Upload picture">
		</form>
	</div>
</body>