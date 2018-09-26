<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-18 01:48:26
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_dashboard_dyear.tpl" */ ?>
<?php /*%%SmartyHeaderCode:71566571157b4c692ac5758-80091916%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab4547d5fb4c882f57f30e2fa117044f3e481ce5' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_dashboard_dyear.tpl',
      1 => 1466424465,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '71566571157b4c692ac5758-80091916',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_IMAGE_URL' => 0,
    'LANG' => 0,
    'totalorderyear' => 0,
    'currency' => 0,
    'totalsalesorderyear' => 0,
    'totaldeliveryear' => 0,
    'totalpendingyear' => 0,
    'totalfailedyear' => 0,
    'totalprocessingyear' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57b4c692b52d71_41104484',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b4c692b52d71_41104484')) {function content_57b4c692b52d71_41104484($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?>							<div class="dashLeftBottom">
								<!--<h1 class="dashLeftBtmHead"><?php echo smarty_modifier_date_format(time(),"%Y");?>
</h1>-->
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/orders-today.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashorderyear'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['totalorderyear']->value;?>
</span>									
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/sales-today.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashsalesyear'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['totalsalesorderyear']->value!='') {
echo $_smarty_tpl->tpl_vars['totalsalesorderyear']->value;
} else { ?>0<?php }?> </span>									
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/delivered-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashdeliverorder'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['totaldeliveryear']->value;?>
 </span>									
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/pending-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashpendorder'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['totalpendingyear']->value;?>
 </span>									
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/failed-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashfailedrorder'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['totalfailedyear']->value;?>
 </span>									
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/processing-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashprocessorder'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['totalprocessingyear']->value;?>
 </span>									
								</div>
								<!--<ul class="dashLeftBottomUl">
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashorderyear'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalorderyear']->value;?>
 </label>
									</li>
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashsalesyear'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['totalsalesorderyear']->value!='') {
echo $_smarty_tpl->tpl_vars['totalsalesorderyear']->value;
} else { ?>0<?php }?></label>
									</li>
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashdeliverorder'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['totaldeliveryear']->value;?>
 </label>
									</li>
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashpendorder'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalpendingyear']->value;?>
</label>
									</li>
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashfailedrorder'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalfailedyear']->value;?>
 </label>
									</li>
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashprocessorder'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalprocessingyear']->value;?>
 </label>
									</li>
								</ul>-->
							</div><?php }} ?>
