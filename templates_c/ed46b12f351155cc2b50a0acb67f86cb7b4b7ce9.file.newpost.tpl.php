<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-30 16:08:16
         compiled from ".\templates\newpost.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1544955185bbe9ab507-16965480%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed46b12f351155cc2b50a0acb67f86cb7b4b7ce9' => 
    array (
      0 => '.\\templates\\newpost.tpl',
      1 => 1427724485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1544955185bbe9ab507-16965480',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55185bbe9e9d19_93349345',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55185bbe9e9d19_93349345')) {function content_55185bbe9e9d19_93349345($_smarty_tpl) {?><!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
<div id="newpost">
    <form method="POST" >
	    <table>     
            <tr><td>Title</td><td><input type="text" name="title" size="100" /></td></tr>          
            <tr><td>Content</td><td><textarea name="content" cols="100" rows="5"></textarea></td></tr>          
            <tr><td><input type="submit" name="newpost" value="Post" /></td><td><input type="submit" name="cancelnewpost" value="Cancel" /></td></tr>  
        </table> 
    </form> 
</div>
</body><?php }} ?>
