<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
<title> Postcontainer
</title>
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
			{if isset($activeUser)}
				{if $activeUser->getUsertype() == 1 || $activeUser->getUsertype() == 2}
					{if isset($showcomment)}
						{if $postid == $showcomment}
							{include file='writecomment.tpl'}
							{literal}
							<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
							<script>
							$(document).ready(function()
							{
								$("#shortpost{/literal}{$showcomment}{literal}").hide();
				
								$("#expandedpost{/literal}{$showcomment}{literal}").show();
			
								$("#commentlist{/literal}{$showcomment}{literal}").show();
							});						
							</script>
						{/literal}
						{/if}
					{/if}
				{/if}
			{/if}	
		{/if}
	</div>
</body>