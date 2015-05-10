<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
<title> Shortpost
</title>
</head>
<body>
	<div id="shortpost{$postid}" class="shortpost">
		{foreach key=key from=$allPosts item=post}
			{if $post->getId() == $postid}			
				<span id="posttitle">{$post->getTitle()}</span><br>
				<span id="author">{$post->getAuthor()}</span> <span id="date">{$post->getDate()}</span><br>
				<div id="postcontent">{$post->getShortpost()}</div>
				
			{/if}
		{/foreach}		
	</div>

</body>