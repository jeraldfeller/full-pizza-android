<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-18 01:48:26
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_dashboard_dmonth.tpl" */ ?>
<?php /*%%SmartyHeaderCode:145094073057b4c692a31f55-01405565%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44a051d4abe78b725f55b193dc443533012d0f7c' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_dashboard_dmonth.tpl',
      1 => 1466424442,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145094073057b4c692a31f55-01405565',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_IMAGE_URL' => 0,
    'LANG' => 0,
    'totalordermonth' => 0,
    'currency' => 0,
    'totalsalesordermonth' => 0,
    'totaldelivermonth' => 0,
    'totalpendingmonth' => 0,
    'totalfailedmonth' => 0,
    'totalprocessingmonth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57b4c692ab9935_49813361',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b4c692ab9935_49813361')) {function content_57b4c692ab9935_49813361($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?>							<div class="dashLeftBottom">
								<!--<h1 class="dashLeftBtmHead"><?php echo smarty_modifier_date_format(time(),"%B");?>
</h1>-->
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/orders-today.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashordermonth'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['totalordermonth']->value;?>
</span>									
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/sales-today.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashsalesmonth'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['totalsalesordermonth']->value!='') {
echo $_smarty_tpl->tpl_vars['totalsalesordermonth']->value;
} else { ?>0<?php }?> </span>									
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/delivered-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashdeliverorder'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['totaldelivermonth']->value;?>
 </span>									
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/pending-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashpendorder'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['totalpendingmonth']->value;?>
 </span>									
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/failed-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashfailedrorder'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['totalfailedmonth']->value;?>
 </span>									
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/processing-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashprocessorder'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['totalprocessingmonth']->value;?>
 </span>									
								</div>
								<!--<ul class="dashLeftBottomUl">
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashordermonth'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalordermonth']->value;?>
 </label>
									</li>
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashsalesmonth'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['totalsalesordermonth']->value!='') {
echo $_smarty_tpl->tpl_vars['totalsalesordermonth']->value;
} else { ?>0<?php }?></label>
									</li>
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashdeliverorder'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['totaldelivermonth']->value;?>
 </label>
									</li>
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashpendorder'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalpendingmonth']->value;?>
 </label>
									</li>
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashfailedrorder'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalfailedmonth']->value;?>
</label>
									</li>
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashprocessorder'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalprocessingmonth']->value;?>
</label>
									</li>
								</ul>-->
							</div><?php }} ?>
