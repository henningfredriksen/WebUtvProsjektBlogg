<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-23 14:22:51
         compiled from ".\templates\postcontainer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:208855538e41b248407-30429016%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd6351917f42b650bf0ca0533b1bec1ad9a8dbe0' => 
    array (
      0 => '.\\templates\\postcontainer.tpl',
      1 => 1429791469,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208855538e41b248407-30429016',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5538e41b24c284_01917119',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5538e41b24c284_01917119')) {function content_5538e41b24c284_01917119($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<div id="postlist">
		<?php echo $_smarty_tpl->getSubTemplate ('shortpost.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<!-- need IF sentence here to select between shortpost and expandedpost+commentlist. it needs to know the id of the post -->

	</div>
</body><?php }} ?>
