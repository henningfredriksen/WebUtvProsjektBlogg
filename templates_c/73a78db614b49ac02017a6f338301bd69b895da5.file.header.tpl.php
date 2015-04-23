<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-30 18:47:34
         compiled from ".\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20280551956324e7e04-38900377%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73a78db614b49ac02017a6f338301bd69b895da5' => 
    array (
      0 => '.\\templates\\header.tpl',
      1 => 1427734039,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20280551956324e7e04-38900377',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5519563252a495_45657984',
  'variables' => 
  array (
    'logged_in' => 0,
    'username' => 0,
    'filename' => 0,
    'creationdate' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5519563252a495_45657984')) {function content_5519563252a495_45657984($_smarty_tpl) {?><!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<div id="header">
		<div id="headertext">
			<span id="blogname">HENNING'S BLOG</span>
		</div>
		
		<div id="login">
		<?php if ($_smarty_tpl->tpl_vars['logged_in']->value) {?>
			<span id="username"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</span><br>		
			<img src="images/<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
"><br>
			<span id="date">Account created: <?php echo $_smarty_tpl->tpl_vars['creationdate']->value;?>
</span><br>
			<a href="newpost.php">Write a new blog entry</a>
			<a href="logout.php">Log out</a>
		<?php } else { ?>		
			<?php echo $_smarty_tpl->getSubTemplate ('login.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<?php }?>
		</div>
	</div>
</body><?php }} ?>
