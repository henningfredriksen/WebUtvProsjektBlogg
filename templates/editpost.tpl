<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
<title> Edit Post
</title>
</head>
<body>
	<div id="editpost">
			{foreach key=key from=$allPosts item=post}
			{if $post->getId() == $editpostid}
				<form enctype="multipart/form-data" action="editpost.php" method="post">
				<table>
					<tr><td>Title</td><td><input type="text" name ="title" value="{$post->getTitle()}"></td></tr> 
					<tr><td>Content</td><td><textarea cols="50" rows="10" name="content">{$post->getText()}</textarea></td></tr> 
					<tr><td>Keywords</td><td><input type="text" name="keywords" value="{$post->getKeywords()}"></td></tr> 					
					<input type="hidden" name="postid" value="{$post->getId()}">
					<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
					<tr><td colspan="2"><input name="userfile" type="file"></td></tr>
					<tr><td colspan="2"><input type="checkbox" name="deleteattachment" value="delete"> Delete the existing attachment
					{if isset($attachments)}
							{foreach key=key from=$attachments item=attachment}
								{if $attachment->getPostId() == $postid}
									({$attachment->getFilename()}, {$attachment->getMimetype()}, {$attachment->getFilesize()}B)
								{/if}
							{/foreach}
						{/if}</td></tr>
					<tr><td><input type="submit" value="Post"></td>
				</form>
			{/if}
		{/foreach}
		<div id="editPostCancelButton">
			<td><button type="button" onClick="location.href = 'index.php'">Cancel</button></td></tr>
			</table>
		</div>
	</div>
</body>