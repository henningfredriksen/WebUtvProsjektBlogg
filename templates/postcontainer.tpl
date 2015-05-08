<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<div id="postcontainer">
		
		{if isset($editpostid)}
			{if $postid == $editpostid}
				{include file='editpost.tpl'}
			{else}
				{include file='shortpost.tpl'}				
				{include file='expandedpost.tpl'}
				{include file='commentlist.tpl'}
			{/if}
		{else}
			{include file='shortpost.tpl'}				
			{include file='expandedpost.tpl'}
			{include file='commentlist.tpl'}
		{/if}
	</div>
</body>