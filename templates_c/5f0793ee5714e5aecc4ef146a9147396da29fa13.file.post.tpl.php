<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-29 21:56:16
         compiled from ".\templates\post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:243865515ace5dd9679-59553554%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f0793ee5714e5aecc4ef146a9147396da29fa13' => 
    array (
      0 => '.\\templates\\post.tpl',
      1 => 1427658976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '243865515ace5dd9679-59553554',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5515ace5ddd4f1_63770124',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5515ace5ddd4f1_63770124')) {function content_5515ace5ddd4f1_63770124($_smarty_tpl) {?><!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>

<div id="post">
	<div id="postauthor">		
		<?php echo $_smarty_tpl->getSubTemplate ('postauthor.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
	<div id="postcontent">			
		<?php echo $_smarty_tpl->getSubTemplate ('postcontent.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>	
</div>
</body><?php }} ?>
