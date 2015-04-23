<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<div id="postlist">
		{if $allPosts != null}
			<!-- includes all the posts in the array as a seperate template -->
			{foreach key=key from=$allPosts item=post}
				<!-- saves the post ID, so it's accessable by the child templates -->
				{$postid = $post->getId()}
				{$post->getTitle()}
	      		{include file='postcontainer.tpl'}
	        {/foreach}
	    {else}
	    	
	    {/if}
    </div>	
</body>