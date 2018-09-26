<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-20 06:34:13
         compiled from "C:\wamp\www\theme\default\templates\staticPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1129757e08b0d745fd4-32883490%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b10abec21f60899210aca7ec8b3469e26ef223d' => 
    array (
      0 => 'C:\\wamp\\www\\theme\\default\\templates\\staticPage.tpl',
      1 => 1473952436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1129757e08b0d745fd4-32883490',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'staticContentList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57e08b0d793fa9_20561310',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57e08b0d793fa9_20561310')) {function content_57e08b0d793fa9_20561310($_smarty_tpl) {?><div class="container">
	<div class="customerLeftBox clearfix">
		<h1 class="customSignupHead"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['staticContentList']->value[0]['content_title']));?>
</h1>
		<p><?php echo stripslashes($_smarty_tpl->tpl_vars['staticContentList']->value[0]['content']);?>
</p>
	</div>
</div><?php }} ?>
