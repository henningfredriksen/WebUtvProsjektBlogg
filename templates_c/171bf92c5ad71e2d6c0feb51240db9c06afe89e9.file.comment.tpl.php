<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-28 18:05:50
         compiled from ".\templates\comment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26356553a7c1a6671a1-14206209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '171bf92c5ad71e2d6c0feb51240db9c06afe89e9' => 
    array (
      0 => '.\\templates\\comment.tpl',
      1 => 1430237080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26356553a7c1a6671a1-14206209',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_553a7c1a695fb0_92125713',
  'variables' => 
  array (
    'postid' => 0,
    'allComments' => 0,
    'comment' => 0,
    'commentid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_553a7c1a695fb0_92125713')) {function content_553a7c1a695fb0_92125713($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<div id="comment<?php echo $_smarty_tpl->tpl_vars['postid']->value;?>
" class="comment">
		<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allComments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['comment']->key;
?>				
			<?php if ($_smarty_tpl->tpl_vars['comment']->value->getId()==$_smarty_tpl->tpl_vars['commentid']->value&&$_smarty_tpl->tpl_vars['comment']->value->getPostId()==$_smarty_tpl->tpl_vars['postid']->value) {?>
				<?php echo $_smarty_tpl->tpl_vars['comment']->value->getId();?>
<br>
				<?php echo $_smarty_tpl->tpl_vars['comment']->value->getAuthorId();?>
<br>
				<?php echo $_smarty_tpl->tpl_vars['comment']->value->getAuthor();?>
<br>
				<?php echo $_smarty_tpl->tpl_vars['comment']->value->getComment();?>
<br>
				<?php echo $_smarty_tpl->tpl_vars['comment']->value->getDate();?>
<br>
			<?php }?>
		<?php } ?>
	</div>
</body>
<?php }} ?>
