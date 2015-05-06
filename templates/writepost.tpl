<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<div id="writepost">
		<!-- http://davidwalsh.name/multiple-file-upload -->
		<form enctype="multipart/form-data" action="createpost.php" method="post">
			Title <input type="text" name ="title"><br>
			Content <textarea cols="50" rows="10" name="content" placeholder="Write your post here."></textarea><br>
			Keywords <input type="text" name="keywords"><br>
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
			<input name="userfile" type="file">			
			<input type="submit" value="Post">
		</form>
		<div id="newPostCancelButton">
			<button>Cancel</button>
		</div>
	</div>
</body>