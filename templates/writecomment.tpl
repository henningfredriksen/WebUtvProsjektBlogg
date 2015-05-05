<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<form action="createcomment.php" method="post">		
		<textarea cols="50" rows="10" name="comment" placeholder="Write your comment here"></textarea>
		<input type="hidden" name="postid" value="{$postid}">{$postid}		
		<input type="hidden" name="userid" value="{$activeUser->getId()}">{$activeUser->getId()}		
		<input type="submit" value="Post comment">
	</form>
</body>