<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-10 02:26:05
         compiled from ".\templates\shortpost.tpl" */ ?>
<?php /*%%SmartyHeaderCode:211625538e41b267812-86795474%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce4838d6f6a522dc8cb1257e5f508c68e21266f0' => 
    array (
      0 => '.\\templates\\shortpost.tpl',
      1 => 1431217524,
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
    'postid' => 0,
    'allPosts' => 0,
    'post' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5538e41b27b096_39127971')) {function content_5538e41b27b096_39127971($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
<title> Shortpost
</title>
</head>
<body>
	<div id="shortpost<?php echo $_smarty_tpl->tpl_vars['postid']->value;?>
" class="shortpost">
		<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allPosts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['post']->key;
?>
			<?php if ($_smarty_tpl->tpl_vars['post']->value->getId()==$_smarty_tpl->tpl_vars['postid']->value) {?>
				<?php echo $_smarty_tpl->tpl_vars['post']->value->getAuthor();?>
<br>			
				<span id="posttitle"><?php echo $_smarty_tpl->tpl_vars['post']->value->getTitle();?>
</span>
				<div id="postcontent"><?php echo $_smarty_tpl->tpl_vars['post']->value->getShortpost();?>
</div>
				<?php echo $_smarty_tpl->tpl_vars['post']->value->getDate();?>

			<?php }?>
		<?php } ?>		
	</div>

</body><?php }} ?>
