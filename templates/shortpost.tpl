<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<div id="shortpost">
	{foreach key=key from=$allPosts item=post}
		{if $post->getId() == $postid}
			{$post->getId()}<br>
			{$post->getId()}<br>
			<span id="posttitle">{$post->getTitle()}</span>
			<div id="postcontent">{$post->getText()}</div><br>											
		{/if}
	{/foreach}
	</div>
</body>