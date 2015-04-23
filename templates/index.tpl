<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<div id="index">
		{include file='header.tpl'}
		{include file='buttonbar.tpl'}
		{include file='login.tpl'}
		{include file='search.tpl'}
		{include file='archive.tpl'}
		{include file='footer.tpl'}
		
		{foreach key=key from=$allPosts item=post}
				
				{$post->getId()}
				{$post->getTitle()}
				blargh
	      		
	        {/foreach}
						
	</div>
</body>