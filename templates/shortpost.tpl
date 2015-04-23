<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	{foreach key=key from=$allPosts item=post}
		{if $post->getId() == $postid}
			<span id="posttitle">{$post->getTitle()}</span><br>
			<div id="postcontent">{$post->getText()}</div><br>						
		{/if}
</body>