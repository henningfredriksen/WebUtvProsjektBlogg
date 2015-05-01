<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
</head>
<body>
	<div id="archive">
		{foreach key=key from=$yearMonthArray item=line}
		{$key}<br>									
			{foreach key=key from=$line item=item}							
				{$item}			
			{/foreach}
		{/foreach}
	</div>
</body>