<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-10 02:26:05
         compiled from ".\templates\commentlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16583553a7c1a58c570-02127254%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b0549b292f6fee1d15a859585adeb70e9883081' => 
    array (
      0 => '.\\templates\\commentlist.tpl',
      1 => 1431217440,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16583553a7c1a58c570-02127254',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_553a7c1a62c812_93308032',
  'variables' => 
  array (
    'postid' => 0,
    'allComments' => 0,
    'comment' => 0,
    'activeUser' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_553a7c1a62c812_93308032')) {function content_553a7c1a62c812_93308032($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
<title> Commentlist
</title>
</head>
<body>
	<div id="commentlist<?php echo $_smarty_tpl->tpl_vars['postid']->value;?>
" class="commentlist">
		<?php if ($_smarty_tpl->tpl_vars['allComments']->value!=null) {?>
			<!-- includes all the posts in the array as a seperate template -->
			<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allComments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['comment']->key;
?>			
					<!-- saves the post ID, so it's accessable by the child templates -->
					<?php $_smarty_tpl->tpl_vars['commentid'] = new Smarty_variable($_smarty_tpl->tpl_vars['comment']->value->getId(), null, 0);?>
		      		<?php echo $_smarty_tpl->getSubTemplate ('comment.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
	   
	        <?php } ?>
		    <?php if (isset($_smarty_tpl->tpl_vars['activeUser']->value)) {?>
				<?php if ($_smarty_tpl->tpl_vars['activeUser']->value->getUsertype()==1||$_smarty_tpl->tpl_vars['activeUser']->value->getUsertype()==2) {?>
					<?php echo $_smarty_tpl->getSubTemplate ('writecomment.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				<?php }?>
			<?php }?>
	    <?php }?>
    </div>
</body><?php }} ?>
