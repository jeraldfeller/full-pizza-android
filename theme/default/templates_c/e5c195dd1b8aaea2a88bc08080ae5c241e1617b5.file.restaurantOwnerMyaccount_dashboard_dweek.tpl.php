<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-18 01:48:26
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_dashboard_dweek.tpl" */ ?>
<?php /*%%SmartyHeaderCode:133849026457b4c692943fc9-74889553%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5c195dd1b8aaea2a88bc08080ae5c241e1617b5' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/restaurantOwnerMyaccount_dashboard_dweek.tpl',
      1 => 1466424470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133849026457b4c692943fc9-74889553',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'SITE_IMAGE_URL' => 0,
    'totalorderweek' => 0,
    'currency' => 0,
    'totalsalesorderweek' => 0,
    'totaldeliverweek' => 0,
    'totalpendingweek' => 0,
    'totalfailedweek' => 0,
    'totalprocessingweek' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57b4c692a26444_50544830',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b4c692a26444_50544830')) {function content_57b4c692a26444_50544830($_smarty_tpl) {?>							<div class="dashLeftBottom">
								<!--<h1 class="dashLeftBtmHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashweek'];?>
</h1>-->
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/orders-today.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashorderweek'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['totalorderweek']->value;?>
</span>	
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/sales-today.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashsalesweek'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['totalsalesorderweek']->value!='') {
echo $_smarty_tpl->tpl_vars['totalsalesorderweek']->value;
} else { ?>0<?php }?> </span>	
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/delivered-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashdeliverorder'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['totaldeliverweek']->value;?>
 </span>	
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/pending-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashpendorder'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['totalpendingweek']->value;?>
 </span>	
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/failed-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashfailedrorder'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['totalfailedweek']->value;?>
 </span>	
								</div>
								<div class="menuOuter">
									<span class="dashOrderImg col-sm-3"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/processing-order.png" alt="" title="" /></span>
									<span class="dashorderTxt col-sm-6 text-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashprocessorder'];?>
</span>
									<span class="dashorderCount col-sm-3"><?php echo $_smarty_tpl->tpl_vars['totalprocessingweek']->value;?>
 </span>	
								</div>
								<!--<ul class="dashLeftBottomUl">
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashorderweek'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalorderweek']->value;?>
 </label>
									</li>
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashsalesweek'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['totalsalesorderweek']->value!='') {
echo $_smarty_tpl->tpl_vars['totalsalesorderweek']->value;
} else { ?>0<?php }?></label>
									</li>
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashdeliverorder'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['totaldeliverweek']->value;?>
</label>
									</li>
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashpendorder'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalpendingweek']->value;?>
 </label>
									</li>
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashfailedrorder'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalfailedweek']->value;?>
 </label>
									</li>
									<li>
										<label class="name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['res_myaccount_dashprocessorder'];?>
</label>
										<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalprocessingweek']->value;?>
 </label>
									</li>
								</ul>-->
							</div><?php }} ?>
