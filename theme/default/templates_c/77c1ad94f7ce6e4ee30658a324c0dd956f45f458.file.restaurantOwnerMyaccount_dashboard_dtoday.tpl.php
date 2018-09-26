<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-18 01:48:26
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_dashboard_dtoday.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197927396857b4c69279f0b3-61678803%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77c1ad94f7ce6e4ee30658a324c0dd956f45f458' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_dashboard_dtoday.tpl',
      1 => 1466424450,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197927396857b4c69279f0b3-61678803',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_IMAGE_URL' => 0,
    'LANG' => 0,
    'totalordertoday' => 0,
    'currency' => 0,
    'totalsalesordertoday' => 0,
    'totaldelivertoday' => 0,
    'totalpendingtoday' => 0,
    'totalfailedtoday' => 0,
    'totalprocessingtoday' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57b4c6929382e7_32258523',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b4c6929382e7_32258523')) {function content_57b4c6929382e7_32258523($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/includes/smarty/plugins/modifier.date_format.php';
?>							<div class="dashLeftBottom">
								<!--<h1 class="dashLeftBtmHead"><?php echo smarty_modifier_date_format(time(),"%A, %B %e, %Y");?>
</h1>-->
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/orders-today.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashordertoday'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['totalordertoday']->value;?>
</span>
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/sales-today.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashsalestoday'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['totalsalesordertoday']->value!='') {
echo $_smarty_tpl->tpl_vars['totalsalesordertoday']->value;
} else { ?>0<?php }?> </span>
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/delivered-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashdeliverorder'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['totaldelivertoday']->value;?>
 </span>
								</div>
								<div class="menuOuter ">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/pending-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashpendorder'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['totalpendingtoday']->value;?>
 </span>
								</div>
								<div class="menuOuter ">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/failed-order.png" alt="" title="" /></span>
								
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashfailedrorder'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['totalfailedtoday']->value;?>
 </span>
									
								</div>
								<div class="menuOuter ">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/processing-order.png" alt="" title="" /></span>
									
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashprocessorder'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['totalprocessingtoday']->value;?>
 </span>
									
								</div>
								
								
								<!--<ul class="dashLeftBottomUl">
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashordertoday'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalordertoday']->value;?>
 </label>
									</li>
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashsalestoday'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['totalsalesordertoday']->value!='') {
echo $_smarty_tpl->tpl_vars['totalsalesordertoday']->value;
} else { ?>0<?php }?></label>
									</li>
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashdeliverorder'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['totaldelivertoday']->value;?>
 </label>
									</li>
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashpendorder'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalpendingtoday']->value;?>
 </label>
									</li>
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashfailedrorder'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalfailedtoday']->value;?>
 </label>
									</li>
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashprocessorder'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalprocessingtoday']->value;?>
 </label>
									</li>
								</ul>-->
							</div><?php }} ?>
