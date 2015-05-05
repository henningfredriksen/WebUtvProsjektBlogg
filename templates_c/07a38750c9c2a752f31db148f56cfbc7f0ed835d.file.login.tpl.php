<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-06 00:35:40
         compiled from ".\templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2175538e41b1b3ce1-13766574%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07a38750c9c2a752f31db148f56cfbc7f0ed835d' => 
    array (
      0 => '.\\templates\\login.tpl',
      1 => 1430865325,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2175538e41b1b3ce1-13766574',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5538e41b1b3ce1_75833022',
  'variables' => 
  array (
    'isLoggedIn' => 0,
    'activeUser' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5538e41b1b3ce1_75833022')) {function content_5538e41b1b3ce1_75833022($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<div id="login">
	<?php if (!$_smarty_tpl->tpl_vars['isLoggedIn']->value) {?>	
		<form id="login_id" name="login" action="login.php" method="post">
		Brukernavn: <input type="text" name="username"><br>
		Passord: <input type="password" name="password"><br>
		<input name="login_input" type="submit" value="Log in">
		</form>	
		<a href="registeruser.html">Registrer deg</a></p>
	<?php } else { ?>
		Hello, <?php echo $_smarty_tpl->tpl_vars['activeUser']->value->getUserName();?>

		<a href="changepassword.html">Endre Passord</a></p>
		<div id="writenewpostbutton">
			<button value="Write New Post"   />
		</div>		
	<?php }?>	
	</div>
</body>
</hmtl><?php }} ?>
