<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-23 14:32:59
         compiled from ".\templates\shortpost.tpl" */ ?>
<?php /*%%SmartyHeaderCode:211625538e41b267812-86795474%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce4838d6f6a522dc8cb1257e5f508c68e21266f0' => 
    array (
      0 => '.\\templates\\shortpost.tpl',
      1 => 1429792371,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211625538e41b267812-86795474',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5538e41b27b096_39127971',
  'variables' => 
  array (
    'allPosts' => 0,
    'post' => 0,
    'postid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5538e41b27b096_39127971')) {function content_5538e41b27b096_39127971($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allPosts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['post']->key;
?>
		<?php if ($_smarty_tpl->tpl_vars['post']->value->getId()==$_smarty_tpl->tpl_vars['postid']->value) {?>
			<span id="posttitle"><?php echo $_smarty_tpl->tpl_vars['post']->value->getTitle();?>
</span><br>
			<div id="postcontent"><?php echo $_smarty_tpl->tpl_vars['post']->value->getText();?>
</div><br>
			stuff					
		<?php }?>
	<?php } ?>
</body><?php }} ?>
