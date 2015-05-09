<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<div id="editpost">
		{if isset($attachments)}
			{foreach key=key from=$attachments item=attachment}
				{if $attachment->getPostId() == $postid}
					<img alt="Attachment" src="uploadedfiles/{$attachment->getFilename()}">
				{/if}
			{/foreach}
		{/if}
		{foreach key=key from=$allPosts item=post}
			{if $post->getId() == $editpostid}
				<form enctype="multipart/form-data" action="editpost.php" method="post">
					Title <input type="text" name ="title" value="{$post->getTitle()}"><br>
					Content <textarea cols="50" rows="10" name="content">{$post->getText()}</textarea><br>
					Keywords <input type="text" name="keywords" value="{$post->getKeywords()}"><br>
					<input type="checkbox" name="deleteattachment" value="delete"> Delete the excisting attachment<br>
					<input type="hidden" name="postid" value="{$post->getId()}">
					<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
					<input name="userfile" type="file">	
					<input type="submit" value="Post">
				</form>
			{/if}
		{/foreach}
		<div id="editPostCancelButton">
			<button type="button" onClick="location.href = 'index.php'">Cancel</button>
		</div>
	</div>
</body>