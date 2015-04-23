<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-30 19:10:13
         compiled from ".\templates\postcontent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:236965515ace5e2f586-98197625%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a68f8b80f0ac230210fcb97a752a1b55b5a72027' => 
    array (
      0 => '.\\templates\\postcontent.tpl',
      1 => 1427735411,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '236965515ace5e2f586-98197625',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5515ace5e33402_64010785',
  'variables' => 
  array (
    'blogPostArray' => 0,
    'post' => 0,
    'postid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5515ace5e33402_64010785')) {function content_5515ace5e33402_64010785($_smarty_tpl) {?><!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['blogPostArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['post']->key;
?>
		<?php if ($_smarty_tpl->tpl_vars['post']->value->getId()==$_smarty_tpl->tpl_vars['postid']->value) {?>
			<span id="posttitle"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
</span><br>
			<div id="postcontent"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->getText(), ENT_QUOTES, 'UTF-8', true);?>
</div><br>						
		<?php }?>
	<?php } ?>	
</body><?php }} ?>
