<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<div id="expandedpost{$postid}" class="expandedpost">
		{foreach key=key from=$allPosts item=post}
			{if $post->getId() == $postid}				
				{$post->getId()}<br>
				{$post->getAuthor()}<br>				
				<span id="posttitle">{$post->getTitle()}</span>
				<div id="postcontent">{$post->getText()}</div><br>
				{$post->getDate()}											
			{/if}
		{/foreach}
		{foreach key=key from=$hitsByPostId item=hit}
			{if $postid == $hit['post_id']}
				Hits: {$hit['hits']}
			{/if}
		{/foreach}
		 {if isset($activeUser)}
			{if $activeUser->getUsertype() == 1}
				<a href="deletepost.php?postid={$postid}" onclick="return confirm('Are you sure you want to delete this post?');">Delete post</a>
				<a href="editpost.php?postid={$postid}">Edit post</a>
			{/if}
		{/if}
		{if isset($attachments)}
			{foreach key=key from=$attachments item=attachment}
				{if $attachment->getPostId() == $postid}
					<img alt="Attachment" src="uploadedfiles/{$attachment->getFilename()}">
				{/if}
			{/foreach}
		{/if}
	</div>
</body>