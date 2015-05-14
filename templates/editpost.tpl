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
				<table>
				<form enctype="multipart/form-data" action="editpost.php" method="post">				
					<tr><td>Title</td><td><span class="postinputspan"><input type="text" name ="title" value="{$post->getTitle()}" class="postinputfield"></span></td></tr> 
					<tr><td>Content</td><td><span class="postinputspan"><textarea cols="50" rows="10" name="content" class="postinputfield">{$post->getText()}</textarea></span></td></tr> 
					<tr><td>Keywords</td><td><span class="postinputspan"><input type="text" name="keywords" value="{$post->getKeywords()}" class="postinputfield"></span></td></tr> 					
					<input type="hidden" name="postid" value="{$post->getId()}">
					<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
					<tr><td>Attachment</td><td><input name="userfile" type="file"></td></tr>
					<tr><td colspan="2"><input type="checkbox" name="deleteattachment" value="delete"> Delete the existing attachment
					{if isset($attachments)}
							{foreach key=key from=$attachments item=attachment}
								{if $attachment->getPostId() == $postid}
									({$attachment->getFilename()}, {$attachment->getMimetype()}, {$attachment->getFilesize()}B)
								{/if}
							{/foreach}
						{/if}</td></tr>
					<tr><td></td><td><input type="submit" value="Post">
				</form>
			{/if}
		{/foreach}		
			<button type="button" onClick="location.href = 'index.php'">Cancel</button></td></tr>
			</table>		
	</div>
</body>