<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
<title> Archive
</title>
</head>
<body>
	<div id="archive" class="archive">
	{if isset($yearMonthArray)}
		{foreach key=linekey from=$yearMonthArray item=line}
			{$linekey}<br>								
			{foreach key=itemkey from=$line item=item}				
				<a href="index.php?year={$linekey} & month={$item}">{$item}</a>
			{/foreach}
			<br>
		{/foreach}
	{/if}
	</div>
</body>