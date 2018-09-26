<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-20 06:34:10
         compiled from "C:\wamp\www\theme\default\templates\faq.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2317657e08b0aa2d9e1-18633935%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb5a4cd32c570989ba80c9c119e6287078d0f7fc' => 
    array (
      0 => 'C:\\wamp\\www\\theme\\default\\templates\\faq.tpl',
      1 => 1473952436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2317657e08b0aa2d9e1-18633935',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'staticFaqList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57e08b0aae0741_00943752',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57e08b0aae0741_00943752')) {function content_57e08b0aae0741_00943752($_smarty_tpl) {?><div class="container">
	<div class="customerLeftBox clearfix">
		<h1 class="customSignupHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['footer_faq'];?>
</h1>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["faq"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['name'] = "faq";
$_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['staticFaqList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["faq"]['total']);
?>
			<div class="faq_ans">
				<div style="cursor:pointer;" onclick="openFaq('q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['faq']['rownum'];?>
')" class="faqHead faq_arrow"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['staticFaqList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['faq']['index']]['question']));?>
</div>
				<div id="q<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['faq']['rownum'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['faq']['rownum']!='1') {?>style="display:none;"<?php }?> class="staticContent faqcontent"><?php echo stripslashes($_smarty_tpl->tpl_vars['staticFaqList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['faq']['index']]['answer']);?>
</div>
			</div>	
		<?php endfor; else: ?>
			<div class="errorline">No Record Found</div>
		<?php endif; ?>
		<input type="hidden" id="total" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['faq']['total'];?>
" />
	</div>
</div><?php }} ?>
