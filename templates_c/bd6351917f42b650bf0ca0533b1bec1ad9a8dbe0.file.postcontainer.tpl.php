<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-28 18:05:50
         compiled from ".\templates\postcontainer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:208855538e41b248407-30429016%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd6351917f42b650bf0ca0533b1bec1ad9a8dbe0' => 
    array (
      0 => '.\\templates\\postcontainer.tpl',
      1 => 1430237080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208855538e41b248407-30429016',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5538e41b24c284_01917119',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5538e41b24c284_01917119')) {function content_5538e41b24c284_01917119($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<div id="postcontainer">
		<?php echo $_smarty_tpl->getSubTemplate ('shortpost.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
				
		<?php echo $_smarty_tpl->getSubTemplate ('expandedpost.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('commentlist.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
</body><?php }} ?>
