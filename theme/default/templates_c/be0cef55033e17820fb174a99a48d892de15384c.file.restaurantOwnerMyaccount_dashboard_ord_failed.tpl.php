<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-18 01:48:26
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_dashboard_ord_failed.tpl" */ ?>
<?php /*%%SmartyHeaderCode:118495422857b4c6925a2574-14526091%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be0cef55033e17820fb174a99a48d892de15384c' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_dashboard_ord_failed.tpl',
      1 => 1466424456,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118495422857b4c6925a2574-14526091',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'ordersList_failedorder' => 0,
    'i' => 0,
    'currency' => 0,
    'ordersList_failedorderCnt' => 0,
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57b4c692794ed3_93265720',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b4c692794ed3_93265720')) {function content_57b4c692794ed3_93265720($_smarty_tpl) {?>						<div class="myAccntTopMiddleBtm">
							<table class="dashLeftBottomUl">
								<tr>
									<th width="20%"><label class="sno"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashsno'];?>
</label></th>
									<th width="30%"><label class="menu"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashorderno'];?>
</label></th>
									<th width="25%"><label class="name1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashname'];?>
</label></th>
									<th width="25%"><label class="name1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashprice'];?>
</label></th>
								</tr>
								<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['name'] = "failorder";
$_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['ordersList_failedorder']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['max'] = (int) 5;
$_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["failorder"]['total']);
?>
								<tr>
									<td><label class="sno"><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</label></td>
									<td><label class="menu"><?php echo $_smarty_tpl->tpl_vars['ordersList_failedorder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['failorder']['index']]['ordergenerateid'];?>
</label></td>
									<td><label class="name1"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['ordersList_failedorder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['failorder']['index']]['customername']));?>
</label></td>
									<td><label class="name1"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['ordersList_failedorder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['failorder']['index']]['ordertotalprice'];?>
</label></td>
								</tr>
								<?php endfor; else: ?>
								<tr>
								<td style="color:red;" colspan="4" align="center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashboard_failed_no'];?>
</td></tr>
								<?php endif; ?>
							</table>
							<?php if ($_smarty_tpl->tpl_vars['ordersList_failedorderCnt']->value>5) {?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_order.php?sortbystatus=failed<?php } else { ?>restaurant-myaccount-order/failed<?php }?>" class="myAccntViewMore" onclick="return dashboardSortbyStatus('failed','Order');"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashview'];?>
</a>
							<?php }?>
						</div><?php }} ?>
