<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-18 01:48:26
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_dashboard_ord_pending.tpl" */ ?>
<?php /*%%SmartyHeaderCode:64887788457b4c692485c65-40276892%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e5ab702f8acd40eea4a9d5cfc8f7a3830d55587' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_dashboard_ord_pending.tpl',
      1 => 1466424463,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64887788457b4c692485c65-40276892',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'ordersList_pendingorder' => 0,
    'i' => 0,
    'currency' => 0,
    'ordersList_pendingorderCnt' => 0,
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57b4c6924ff778_81008595',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b4c6924ff778_81008595')) {function content_57b4c6924ff778_81008595($_smarty_tpl) {?>						<div class="myAccntTopMiddleBtm">
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
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['name'] = "pendingorder";
$_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['ordersList_pendingorder']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['max'] = (int) 5;
$_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["pendingorder"]['total']);
?>
							<tr>
								<td><span class="sno"><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</span></td>
								<td><span class="menu"><?php echo $_smarty_tpl->tpl_vars['ordersList_pendingorder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pendingorder']['index']]['ordergenerateid'];?>
</span></td>
								<td><span class="name1"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['ordersList_pendingorder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pendingorder']['index']]['customername']));?>
</span></td>
								<td><span class="name1"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['ordersList_pendingorder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pendingorder']['index']]['ordertotalprice'];?>
</span></td>
							</tr>
							<?php endfor; else: ?>
							<tr>
							<td style="color:red;" colspan="4" align="center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashboard_pending_no'];?>
</tr>
							</tr>
							<?php endif; ?>
						</table>
						<?php if ($_smarty_tpl->tpl_vars['ordersList_pendingorderCnt']->value>5) {?>
						<a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantOwnerMyaccount_order.php?sortbystatus=pending<?php } else { ?>restaurant-myaccount-order/pending<?php }?>" class="myAccntViewMore" onclick="return dashboardSortbyStatus('pending','Order');"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashview'];?>
</a>
						<?php }?>
					</div><?php }} ?>
