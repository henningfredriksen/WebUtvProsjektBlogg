<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-27 20:16:38
         compiled from ".\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:241855133a51382708-10569848%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de432425ca199f4c79570a216899eaa9108aed60' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1427483798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '241855133a51382708-10569848',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55133a51386582_87401589',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55133a51386582_87401589')) {function content_55133a51386582_87401589($_smarty_tpl) {?><!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
<div id="main">
<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('postlist.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
</body><?php }} ?>
