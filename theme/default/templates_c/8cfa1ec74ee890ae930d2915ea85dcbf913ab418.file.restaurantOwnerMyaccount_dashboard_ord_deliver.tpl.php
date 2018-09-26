<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-18 01:48:26
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_dashboard_ord_deliver.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187241482457b4c69250b418-25870345%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8cfa1ec74ee890ae930d2915ea85dcbf913ab418' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_dashboard_ord_deliver.tpl',
      1 => 1466424463,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187241482457b4c69250b418-25870345',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'ordersList_deliveredorder' => 0,
    'i' => 0,
    'currency' => 0,
    'ordersList_deliveredorderCnt' => 0,
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57b4c692599be4_71873827',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b4c692599be4_71873827')) {function content_57b4c692599be4_71873827($_smarty_tpl) {?>							<div class="myAccntTopMiddleBtm">
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
									<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['name'] = "deliverorder";
$_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['ordersList_deliveredorder']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['max'] = (int) 5;
$_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["deliverorder"]['total']);
?>
									<tr>
										<td><label class="sno"><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</label></td>
										<td><label class="menu"><?php echo $_smarty_tpl->tpl_vars['ordersList_deliveredorder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['deliverorder']['index']]['ordergenerateid'];?>
</label></td>
										<td><label class="name1"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['ordersList_deliveredorder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['deliverorder']['index']]['customername']));?>
</label></td>
										<td><label class="name1"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['ordersList_deliveredorder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['deliverorder']['index']]['ordertotalprice'];?>
</label></td>
									</tr>
									<?php endfor; else: ?>
									<tr>
									<td colspan="4" align="center" style="color:red;"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashboard_deliver_no'];?>
</td>
									</tr>
									<?php endif; ?>
								</table>
								<?php if ($_smarty_tpl->tpl_vars['ordersList_deliveredorderCnt']->value>5) {?>
								<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_order.php?sortbystatus=completed<?php } else { ?>restaurant-myaccount-order/completed<?php }?>" class="myAccntViewMore" ><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashview'];?>
</a>
								<?php }?>
							</div><?php }} ?>
