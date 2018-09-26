<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-18 23:23:57
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/staticPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:165741276357df685daa8c27-20346136%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '492baea9797c8c9efdd0c4c3262cbfed5be7585c' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/staticPage.tpl',
      1 => 1466424461,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165741276357df685daa8c27-20346136',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'staticContentList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57df685dc9feb9_25913255',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57df685dc9feb9_25913255')) {function content_57df685dc9feb9_25913255($_smarty_tpl) {?><div class="container">
	<div class="customerLeftBox clearfix">
		<h1 class="customSignupHead"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['staticContentList']->value[0]['content_title']));?>
</h1>
		<p><?php echo stripslashes($_smarty_tpl->tpl_vars['staticContentList']->value[0]['content']);?>
</p>
	</div>
</div><?php }} ?>
