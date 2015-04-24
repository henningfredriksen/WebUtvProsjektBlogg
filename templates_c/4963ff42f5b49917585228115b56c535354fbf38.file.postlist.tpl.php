<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-23 16:55:31
         compiled from ".\templates\postlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:75005538e41b209bf3-36006013%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4963ff42f5b49917585228115b56c535354fbf38' => 
    array (
      0 => '.\\templates\\postlist.tpl',
      1 => 1429800907,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75005538e41b209bf3-36006013',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5538e41b221302_20223919',
  'variables' => 
  array (
    'allPosts' => 0,
    'post' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5538e41b221302_20223919')) {function content_5538e41b221302_20223919($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<div id="postlist">
		<?php if ($_smarty_tpl->tpl_vars['allPosts']->value!=null) {?>
			<!-- includes all the posts in the array as a seperate template -->
			<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allPosts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['post']->key;
?>
				<!-- saves the post ID, so it's accessable by the child templates -->
				<?php $_smarty_tpl->tpl_vars['postid'] = new Smarty_variable($_smarty_tpl->tpl_vars['post']->value->getId(), null, 0);?>
	      		<?php echo $_smarty_tpl->getSubTemplate ('postcontainer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	        <?php } ?>
	    <?php } else { ?>
	    	
	    <?php }?>
    </div>	
</body><?php }} ?>
