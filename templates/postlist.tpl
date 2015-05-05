<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<div id="postlist">
		{if isset($activeUser)}
			{if $activeUser->getUsertype() == 1}
				{include file='writepost.tpl'}
			{/if}
		{/if}
					
		{if $allPosts != null}
			<!-- includes all the posts in the array as a seperate template -->
			{foreach key=key from=$allPosts item=post}
				<!-- saves the post ID, so it's accessable by the child templates -->
				{$postid = $post->getId()}
	      		{include file='postcontainer.tpl'}      			
				<!-- Jquery code that shows/hides shortposts / expandedposts + commentlist. 
					it uses $postid to differentiate between each of the dynamically generated div blocks
					(each of them set using $postid in shortpost/expandedpost/commentlist/comment.tpl ex. #shortpost1, #shortpost2, etc)
					they inherit their style from a ccs class by the same name since they are dynamically generated	-->
				{literal}
					<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
					<script>
					$(document).ready(function()
					{	
						$("#writepost").hide();
						
						$("#expandedpost{/literal}{$postid}{literal}").hide();
						
						$("#commentlist{/literal}{$postid}{literal}").hide();
						
					    $("#shortpost{/literal}{$postid}{literal}").click(function()
					    {
					        $("#shortpost{/literal}{$postid}{literal}").hide();
					        $("#expandedpost{/literal}{$postid}{literal}").show();
					        $("#commentlist{/literal}{$postid}{literal}").show();
					        $.ajax({
					            url: 'addhittopost.php',
					            type: 'post',
					            data: { "postid": '{/literal}{$postid}{literal}'}
					        {/literal}<!-- , success: function(response) { alert(response); } --> {literal}
					        });
					    });    
					    
					    $("#expandedpost{/literal}{$postid}{literal}").click(function()
					    {
					        $("#shortpost{/literal}{$postid}{literal}").show();
					        $("#expandedpost{/literal}{$postid}{literal}").hide();
					        $("#commentlist{/literal}{$postid}{literal}").hide();        
					    });

					    $("#writenewpostbutton").click(function()
							    {
							        $("#writepost").show();
							    });
					});
					</script>
				{/literal}	      		
	        {/foreach}
	    {else}
	    	
	    {/if}
    </div>	
</body>