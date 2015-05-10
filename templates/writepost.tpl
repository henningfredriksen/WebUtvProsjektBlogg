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
		<!-- http://davidwalsh.name/multiple-file-upload -->
		<form enctype="multipart/form-data" action="createpost.php" method="post">
		<table>
			<tr><td>Title</td><td><input type="text" name ="title"></td></tr>
			<tr><td>Content</td><td><textarea cols="50" rows="10" name="content" placeholder="Write your post here."></textarea></td></tr>
			<tr><td>Keywords</td><td><input type="text" name="keywords"></td></tr>
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
			<tr><td colspan="2"><input name="userfile" type="file"></td></tr>			
			<tr><td><input type="submit" value="Post"></td>
		</form>
		<div id="newPostCancelButton">
			<td><button>Cancel</button></td></tr>
		</div>
		</table>
	</div>
</body>