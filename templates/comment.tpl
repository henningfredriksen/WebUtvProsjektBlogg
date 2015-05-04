<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<div id="comment{$postid}" class="comment">
		{foreach key=key from=$allComments item=comment}				
			{if $comment->getId() == $commentid && $comment->getPostId() == $postid}
				{$comment->getId()}<br>
				{$comment->getAuthorId()}<br>
				{$comment->getAuthor()}<br>
				{$comment->getComment()}<br>
				{$comment->getDate()}<br>
				{if isset($activeUser)}
					{if $comment->getAuthorId() == $activeUser->getId() || $activeUser->getUsertype() == 1}
					<a href="deletecomment.php?commentid={$commentid}" onclick="return confirm('Are you sure you want to delete this comment?');">Delete comment</a>
					{/if}
				{/if}
			{/if}
		{/foreach}
		
		
	</div>
</body>
