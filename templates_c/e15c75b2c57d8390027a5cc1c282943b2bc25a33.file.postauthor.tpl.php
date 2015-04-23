<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-30 19:15:05
         compiled from ".\templates\postauthor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:250255184014323148-75668489%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e15c75b2c57d8390027a5cc1c282943b2bc25a33' => 
    array (
      0 => '.\\templates\\postauthor.tpl',
      1 => 1427735697,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '250255184014323148-75668489',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55184014355dd0_65644317',
  'variables' => 
  array (
    'blogUserArray' => 0,
    'user' => 0,
    'authorid' => 0,
    'blogPostArray' => 0,
    'post' => 0,
    'postid' => 0,
    'filename' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55184014355dd0_65644317')) {function content_55184014355dd0_65644317($_smarty_tpl) {?><!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['blogUserArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['user']->key;
?>
		<?php if ($_smarty_tpl->tpl_vars['user']->value->getId()==$_smarty_tpl->tpl_vars['authorid']->value) {?>
			<span id="username"><?php echo $_smarty_tpl->tpl_vars['user']->value->getUsername();?>
</span><br>
			<div><img src="images/<?php echo $_smarty_tpl->tpl_vars['user']->value->getFilename();?>
"></div>			
		<?php }?>
	<?php } ?>
	
	<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['blogPostArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['post']->key;
?>
		<?php if ($_smarty_tpl->tpl_vars['post']->value->getId()==$_smarty_tpl->tpl_vars['postid']->value) {?>
			<span id="date">Posted: <?php echo $_smarty_tpl->tpl_vars['post']->value->getPostDate();?>
</span><br>								
		<?php }?>
	<?php } ?>
<!--  	<img src="images/<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
"> -->
</body><?php }} ?>
