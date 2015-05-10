<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-10 02:26:05
         compiled from ".\templates\search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109105538e41b1d6f65-05066125%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2dc76d96dea9f2f313a00e346ffbd29ed65b1134' => 
    array (
      0 => '.\\templates\\search.tpl',
      1 => 1431217517,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109105538e41b1d6f65-05066125',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5538e41b1d6f63_18907412',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5538e41b1d6f63_18907412')) {function content_5538e41b1d6f63_18907412($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
<title> Search
</title>
</head>
<body>
	<div id="search">
		<form id="searchid" name="search" action="index.php" method="post">
		<input type="text" name="search" size="15">		
		<input name="search_input" type="submit" value="Search"><br>
		</form>		
	</div>
</body><?php }} ?>
