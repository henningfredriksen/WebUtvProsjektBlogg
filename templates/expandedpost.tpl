<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
<title> Expanded post
</title>
</head>
<body>
	<div id="expandedpost{$postid}" class="expandedpost">
		{foreach key=key from=$allPosts item=post}
			{if $post->getId() == $postid}
				<span id="posttitle">{$post->getTitle()}</span><br>
				<span id="author">{$post->getAuthor()}</span> <span id="date">{$post->getDate()}</span><br>			
				<div id="postcontent">{$post->getText()}</div><br>															
			{/if}
		{/foreach}
		{if isset($attachments)}
			{foreach key=key from=$attachments item=attachment}
				{if $attachment->getPostId() == $postid}
					<img alt="Attachment" src="uploadedfiles/{$attachment->getFilename()}"><br>
				{/if}
			{/foreach}
		{/if}
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
			{if $activeUser->getUsertype() == 1 || $activeUser->getUsertype() == 2}
				<a href="createcomment.php?writecomment='true' & postidforcomment={$postid}">Write comment</a>
			{/if}
		{/if}
		
	</div>
</body>