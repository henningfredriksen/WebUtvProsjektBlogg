<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
</head>
<body>
	<div id="archive">
		{foreach key=linekey from=$yearMonthArray item=line}
			{$linekey}<br>								
			{foreach key=itemkey from=$line item=item}
				<a href="index.php?year={$item['year']}&month={$item['month']}">{$item}</a>
			{/foreach}
			<br>
		{/foreach}
	</div>
</body>