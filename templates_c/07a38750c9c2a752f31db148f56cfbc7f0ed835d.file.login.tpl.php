<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-10 06:13:13
         compiled from ".\templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2175538e41b1b3ce1-13766574%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07a38750c9c2a752f31db148f56cfbc7f0ed835d' => 
    array (
      0 => '.\\templates\\login.tpl',
      1 => 1431231187,
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
    'showRegisterUser' => 0,
    'showForgottenPassword' => 0,
    'showChangePassword' => 0,
    'editprofile' => 0,
    'activeUser' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5538e41b1b3ce1_75833022')) {function content_5538e41b1b3ce1_75833022($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
<title> Login
</title>
</head>
<body>
	<div id="login">
	<?php if (!$_smarty_tpl->tpl_vars['isLoggedIn']->value) {?>
		<?php if (isset($_smarty_tpl->tpl_vars['showRegisterUser']->value)) {?>
			<?php if ($_smarty_tpl->tpl_vars['showRegisterUser']->value) {?>
				<?php echo $_smarty_tpl->getSubTemplate ('registeruser.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<?php }?>
		<?php } elseif (isset($_smarty_tpl->tpl_vars['showForgottenPassword']->value)) {?>
			<?php if ($_smarty_tpl->tpl_vars['showForgottenPassword']->value) {?>
				<?php echo $_smarty_tpl->getSubTemplate ('forgottenpassword.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<?php }?>					
		<?php } else { ?>		
			<form id="login_id" name="login" action="login.php" method="post">
			<table> 
			<tr><td>Brukernavn:</td><td><input type="text" name="username"></td></tr> 
			<tr><td>Passord:</td><td><input type="password" name="password"></td></tr> 
			<tr><td colspan="2"><input name="login_input" type="submit" value="Log in"></td></tr>
			</table>
			</form>
			<br>
			<a href="registeruser.php?showRegisterUser='true'">Register New User</a><br>
			<a href="forgottenpassword.php?showForgottenPassword='true'">Forgot Your Password?</a><br>
		<?php }?>		
	<?php } else { ?>
		<?php if (isset($_smarty_tpl->tpl_vars['showChangePassword']->value)) {?>
			<?php if ($_smarty_tpl->tpl_vars['showChangePassword']->value) {?>
				<?php echo $_smarty_tpl->getSubTemplate ('changepassword.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<?php }?>
		<?php } elseif (isset($_smarty_tpl->tpl_vars['editprofile']->value)) {?>
			<?php if ($_smarty_tpl->tpl_vars['editprofile']->value) {?>
				<?php echo $_smarty_tpl->getSubTemplate ('editprofile.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<?php }?>				
		<?php } else { ?>
			Welcome, <?php echo $_smarty_tpl->tpl_vars['activeUser']->value->getName();?>
.<br>
			<?php if ($_smarty_tpl->tpl_vars['activeUser']->value->getPictureFilename()!='') {?>				
				<img alt="Profile Picture" src="uploadedfiles/<?php echo $_smarty_tpl->tpl_vars['activeUser']->value->getPictureFilename();?>
"><br>
			<?php }?>
			<a href="changepassword.php?showChangePassword='true'">Change Password</a><br>
			<a href="editprofile.php?editprofile='true'">Change User Pic</a><br>
			<a id="writenewpostbutton" href="" onclick="return false;">Write New Post</a><br>
			<a href="logout.php">Log out</a><br>
			
		<?php }?>
	<?php }?>	
	</div>
</body>
</html><?php }} ?>
