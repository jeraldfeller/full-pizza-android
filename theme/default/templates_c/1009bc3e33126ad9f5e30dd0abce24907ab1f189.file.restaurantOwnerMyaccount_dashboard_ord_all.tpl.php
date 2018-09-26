<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-18 01:48:26
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_dashboard_ord_all.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34612168557b4c6922fbf70-59321833%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1009bc3e33126ad9f5e30dd0abce24907ab1f189' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_dashboard_ord_all.tpl',
      1 => 1466424439,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34612168557b4c6922fbf70-59321833',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'ordersList_allorder' => 0,
    'i' => 0,
    'currency' => 0,
    'ordersList_allorderCnt' => 0,
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57b4c69247c9a5_30516479',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b4c69247c9a5_30516479')) {function content_57b4c69247c9a5_30516479($_smarty_tpl) {?>	
	
	<div class="myAccntTopMiddleBtm">
		<table class="dashLeftBottomUl table table-hover table-striped">
			<tr>
				<th width="20%"><span class="sno"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashsno'];?>
</span></th>
				<th width="30%"><span class="menu"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashorderno'];?>
</span></th>
				<th width="25%"><span class="name1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashname'];?>
</span></th>
				<th width="25%"><span class="name1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashprice'];?>
</span></th>
			</tr>
			<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['name'] = "allorder";
$_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['ordersList_allorder']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['max'] = (int) 5;
$_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["allorder"]['total']);
?>
			<tr>
				<td><span class="sno"><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</span></td>
				<td><span class="menu"><?php echo $_smarty_tpl->tpl_vars['ordersList_allorder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['allorder']['index']]['ordergenerateid'];?>
</span></td>
				<td><span class="name1"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['ordersList_allorder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['allorder']['index']]['customername']));?>
</span></td>
				<td><span class="name1"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['ordersList_allorder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['allorder']['index']]['ordertotalprice'];?>
</span></td>
			</tr>
			<?php endfor; else: ?>
			<tr>
			<td colspan="4" align="center" style="color:red;"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashboard_deliver_no'];?>
</td>
			</tr>
			<?php endif; ?>
		</table>
		<?php if ($_smarty_tpl->tpl_vars['ordersList_allorderCnt']->value>5) {?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_order.php<?php } else { ?>restaurant-myaccount-order<?php }?>" class="myAccntViewMore" ><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashview'];?>
</a>
		<?php }?>
	</div><?php }} ?>
