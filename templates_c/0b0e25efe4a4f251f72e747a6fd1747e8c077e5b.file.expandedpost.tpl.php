<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-28 19:22:00
         compiled from ".\templates\expandedpost.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11596553fafde0cd8b6-34496902%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b0e25efe4a4f251f72e747a6fd1747e8c077e5b' => 
    array (
      0 => '.\\templates\\expandedpost.tpl',
      1 => 1430241716,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11596553fafde0cd8b6-34496902',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_553fafde0e4fc6_69982924',
  'variables' => 
  array (
    'postid' => 0,
    'allPosts' => 0,
    'post' => 0,
    'postHits' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_553fafde0e4fc6_69982924')) {function content_553fafde0e4fc6_69982924($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<div id="expandedpost<?php echo $_smarty_tpl->tpl_vars['postid']->value;?>
" class="expandedpost">
		<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allPosts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['post']->key;
?>
			<?php if ($_smarty_tpl->tpl_vars['post']->value->getId()==$_smarty_tpl->tpl_vars['postid']->value) {?>				
				<?php echo $_smarty_tpl->tpl_vars['post']->value->getId();?>
<br>
				<?php echo $_smarty_tpl->tpl_vars['post']->value->getId();?>
<br>
				<span id="posttitle"><?php echo $_smarty_tpl->tpl_vars['post']->value->getTitle();?>
</span>
				<div id="postcontent"><?php echo $_smarty_tpl->tpl_vars['post']->value->getText();?>
</div><br>
				<?php if (!isset($_smarty_tpl->tpl_vars['postHits'])) $_smarty_tpl->tpl_vars['postHits'] = new Smarty_Variable(null);if ($_smarty_tpl->tpl_vars['postHits']->value = !null) {?>
				<?php echo $_smarty_tpl->tpl_vars['postHits']->value;?>

				<?php }?>							
			<?php }?>
		<?php } ?>
	</div>
</body><?php }} ?>
