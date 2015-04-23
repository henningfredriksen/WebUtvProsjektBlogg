<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-30 19:09:18
         compiled from ".\templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:41975513269800c810-48897933%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ff09e963654823cf72f5b8127bd1fd59f58b9e5' => 
    array (
      0 => '.\\templates\\login.tpl',
      1 => 1427735147,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41975513269800c810-48897933',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55132698010692_54729427',
  'variables' => 
  array (
    'not_logged_in_msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55132698010692_54729427')) {function content_55132698010692_54729427($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
<title>Login</title>
</head>
<body>
    <form method="POST" >
    	<table>
            <tr><td>Username</td> <td><input type="text" name="username" size="25" /></td></tr>
            <tr><td>Password</td> <td><input type="password" name="password" size="25" /></td></tr>
            <tr><td><input type="submit" name="action"  value="login" /></td> <td><span id="errormsg"><?php echo $_smarty_tpl->tpl_vars['not_logged_in_msg']->value;?>
</span></td></tr>
        </table> 
    </form> 
 </body>
</html><?php }} ?>
