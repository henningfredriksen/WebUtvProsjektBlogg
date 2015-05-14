<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
<title> Write comment
</title>
</head>
<body>
	<div id="comment{$postid}" class="comment">
		<form id="createcommentid" action="createcomment.php" method="post">		
			<textarea cols="80" rows="5" name="comment" placeholder="Write your comment here" class="commentinputfield"></textarea>
			<input type="hidden" name="postid" value="{$postid}">		
			<input type="hidden" name="userid" value="{$activeUser->getId()}">		
			<input name="createcomment_input" type="submit" value="Post comment">
			<button type="button" onClick="location.href = 'index.php'">Cancel</button>
		</form>
	</div>
</body>