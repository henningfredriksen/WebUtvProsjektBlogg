<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<div id="shortpost{$postid}" class="shortpost">
		{foreach key=key from=$allPosts item=post}
			{if $post->getId() == $postid}
				{$post->getAuthor()}<br>			
				<span id="posttitle">{$post->getTitle()}</span>
				<div id="postcontent">{$post->getShortpost()}</div>
				{$post->getDate()}
			{/if}
		{/foreach}		
	</div>

</body>