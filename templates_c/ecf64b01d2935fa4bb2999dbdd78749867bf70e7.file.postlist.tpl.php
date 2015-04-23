<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-30 15:51:34
         compiled from ".\templates\postlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6935551847af501155-46198952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ecf64b01d2935fa4bb2999dbdd78749867bf70e7' => 
    array (
      0 => '.\\templates\\postlist.tpl',
      1 => 1427723466,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6935551847af501155-46198952',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_551847af52ff62_63751512',
  'variables' => 
  array (
    'addnewpost' => 0,
    'blogPostArray' => 0,
    'post' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551847af52ff62_63751512')) {function content_551847af52ff62_63751512($_smarty_tpl) {?><!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<div id="postlist">
		<?php if ($_smarty_tpl->tpl_vars['addnewpost']->value) {?>
			<?php echo $_smarty_tpl->getSubTemplate ('newpost.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<?php }?>
		
		<?php if ($_smarty_tpl->tpl_vars['blogPostArray']->value!=null) {?>
			<!-- includes all the posts in the array as a seperate template (post.tpl) -->
			<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['blogPostArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['post']->key;
?>
				<!-- saves the post ID, so it's accessable by the child templates (post.tpl) -->
				<?php $_smarty_tpl->tpl_vars['postid'] = new Smarty_variable($_smarty_tpl->tpl_vars['post']->value->getId(), null, 0);?>
				<!-- saves the author ID, so it's accessable by the child templates (post.tpl) -->
				<?php $_smarty_tpl->tpl_vars['authorid'] = new Smarty_variable($_smarty_tpl->tpl_vars['post']->value->getAuthorId(), null, 0);?>
	      		<?php echo $_smarty_tpl->getSubTemplate ('post.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	        <?php } ?>
	    <?php } else { ?>
	    	
	    <?php }?>
    </div>	
</body><?php }} ?>
