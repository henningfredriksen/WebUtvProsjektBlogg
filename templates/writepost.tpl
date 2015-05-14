<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
<title> Write post
</title>
</head>
<body>
	<div id="writepost">
		<table>
		<form enctype="multipart/form-data" action="createpost.php" method="post">		
			<tr><td>Title</td><td><span class="postinputspan"><input type="text" name="title" class="postinputfield"></span></td></tr>
			<tr><td>Content</td><td><span class="postinputspan"><textarea rows="10" name="content" placeholder="Write your post here." class="postinputfield"></textarea></span></td></tr>
			<tr><td>Keywords</td><td><span class="postinputspan"><input type="text" name="keywords" class="postinputfield"></span></td></tr>
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
			<tr><td>Attachment</td><td><input name="userfile" type="file"></td></tr>			
			<tr><td></td><td><input type="submit" value="Post">
		</form>
			<button type="button" onClick="location.href = 'index.php'">Cancel</button></td></tr>
		</table>
	</div>
</body>