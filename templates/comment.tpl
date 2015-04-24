<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<div id="comment">
		{foreach key=key from=$allComments item=comment}				
			{if $comment->getId() == $commentid && $comment->getPostId() == $postid}
				{$comment->getId()}<br>
				{$comment->getAuthorId()}<br>
				{$comment->getAuthor()}<br>
				{$comment->getComment()}<br>
				{$comment->getDate()}<br>
		{/if}
	{/foreach}
	</div>
</body>
