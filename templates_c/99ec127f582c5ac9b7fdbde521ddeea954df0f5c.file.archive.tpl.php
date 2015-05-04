<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-04 22:15:15
         compiled from ".\templates\archive.tpl" */ ?>
<?php /*%%SmartyHeaderCode:311035538e41b1ee676-45344797%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99ec127f582c5ac9b7fdbde521ddeea954df0f5c' => 
    array (
      0 => '.\\templates\\archive.tpl',
      1 => 1430770499,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '311035538e41b1ee676-45344797',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5538e41b1f24f7_78251319',
  'variables' => 
  array (
    'yearMonthArray' => 0,
    'linekey' => 0,
    'line' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5538e41b1f24f7_78251319')) {function content_5538e41b1f24f7_78251319($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
</head>
<body>
	<div id="archive">
		<?php  $_smarty_tpl->tpl_vars['line'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['line']->_loop = false;
 $_smarty_tpl->tpl_vars['linekey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['yearMonthArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['line']->key => $_smarty_tpl->tpl_vars['line']->value) {
$_smarty_tpl->tpl_vars['line']->_loop = true;
 $_smarty_tpl->tpl_vars['linekey']->value = $_smarty_tpl->tpl_vars['line']->key;
?>
			<?php echo $_smarty_tpl->tpl_vars['linekey']->value;?>
<br>								
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['itemkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['line']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['itemkey']->value = $_smarty_tpl->tpl_vars['item']->key;
?>				
				<a href="index.php?year=<?php echo $_smarty_tpl->tpl_vars['linekey']->value;?>
&month=<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</a>
			<?php } ?>
			<br>
		<?php } ?>
	</div>
</body><?php }} ?>
