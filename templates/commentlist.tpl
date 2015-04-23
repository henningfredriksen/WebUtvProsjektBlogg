<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<div id="commentlist">
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