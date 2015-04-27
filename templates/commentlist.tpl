<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<div id="commentlist{$postid}" class="commentlist">
		{if $allComments != null}
			<!-- includes all the posts in the array as a seperate template -->
			{foreach key=key from=$allComments item=comment}			
					<!-- saves the post ID, so it's accessable by the child templates -->
					{$commentid = $comment->getId()}
		      		{include file='comment.tpl'}	   
	        {/foreach}
	    {else}
	    	
	    {/if}
    </div>
</body>