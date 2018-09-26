<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-18 20:49:03
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/admin_main_left.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9797067165806d10f4f5b33-81760180%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d511483c5210534e1492e29772f846bcf116ad3' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/admin_main_left.tpl',
      1 => 1466424142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9797067165806d10f4f5b33-81760180',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'day' => 0,
    'month' => 0,
    'date' => 0,
    'currentyear' => 0,
    'totalordertoday' => 0,
    'currency' => 0,
    'totalsalesordertoday' => 0,
    'totalpendingtoday' => 0,
    'totalprocessingtoday' => 0,
    'totaldelivertoday' => 0,
    'totalfailedtoday' => 0,
    'objAdminMgmt' => 0,
    'totalorderweek' => 0,
    'totalsalesorderweek' => 0,
    'totalpendingweek' => 0,
    'totalprocessingweek' => 0,
    'totaldeliverweek' => 0,
    'totalfailedweek' => 0,
    'totalordermonth' => 0,
    'totalsalesordermonth' => 0,
    'totalpendingmonth' => 0,
    'totalprocessingmonth' => 0,
    'totaldelivermonth' => 0,
    'totalfailedmonth' => 0,
    'totalorderyear' => 0,
    'totalsalesorderyear' => 0,
    'totalpendingyear' => 0,
    'totalprocessingyear' => 0,
    'totaldeliveryear' => 0,
    'totalfailedyear' => 0,
    'tot_user' => 0,
    'active_user' => 0,
    'inactive_user' => 0,
    'thisweek_user' => 0,
    'thismon_user' => 0,
    'thisyear_user' => 0,
    'tot_rest' => 0,
    'active_rest' => 0,
    'inactive_rest' => 0,
    'pend_rest' => 0,
    'thisweek_rest' => 0,
    'thismonth_rest' => 0,
    'thisyear_rest' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5806d10f6ea6d3_96565240',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5806d10f6ea6d3_96565240')) {function content_5806d10f6ea6d3_96565240($_smarty_tpl) {?><div class="adminLeft">
	<div class="adminLeftInner">
		<ul class="adminLeftUl yearMonthStatics">
			<li><a href="javascript:void(0);" id="index_today" class="active">Today</a></li>
			<li><a href="javascript:void(0);" id="index_week">Week</a></li>
			<li><a href="javascript:void(0);" id="index_month">Month</a></li>
			<li><a href="javascript:void(0);" id="index_year">Year</a></li>
		</ul>
		<div class="adminLeftBox indexLeftTabContent"  id="index_today_content">
			<h1 class="dashLeftBtmHead"><?php echo $_smarty_tpl->tpl_vars['day']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['month']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['date']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['currentyear']->value;?>
</h1>
			<ul class="dashLeftBottomUl">
				<li>
					<label class="name">Orders Today</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalordertoday']->value;?>
 </label>
				</li>
				<li>
					<label class="name">Sales Today</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp; <?php if ($_smarty_tpl->tpl_vars['totalsalesordertoday']->value!='') {
echo $_smarty_tpl->tpl_vars['totalsalesordertoday']->value;
} else { ?>0<?php }?></label>
				</li>
				<li>
					<label class="name">Pending Orders</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalpendingtoday']->value;?>
 </label>
				</li>
				<li>
					<label class="name">Processing Orders</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalprocessingtoday']->value;?>
 </label>
				</li>
				<li>
					<label class="name">Delivered Orders</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['totaldelivertoday']->value;?>
 </label>
				</li>
				<li>
					<label class="name">Failed Orders</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalfailedtoday']->value;?>
 </label>
				</li>
				
			</ul>
		</div>
		<div class="adminLeftBox indexLeftTabContent"  id="index_week_content" style="display:none;">
			<?php echo $_smarty_tpl->tpl_vars['objAdminMgmt']->value->restaurantDashboardWeekOrders();?>

			<h1 class="dashLeftBtmHead">Week</h1>
			<ul class="dashLeftBottomUl">
				<li>
					<label class="name">Orders Week</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalorderweek']->value;?>
 </label>
				</li>
				<li>
					<label class="name">Sales Week</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['totalsalesorderweek']->value!='') {
echo $_smarty_tpl->tpl_vars['totalsalesorderweek']->value;
} else { ?>0<?php }?></label>
				</li>
				<li>
					<label class="name">Pending Orders</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalpendingweek']->value;?>
 </label>
				</li>
				<li>
					<label class="name">Processing Orders</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalprocessingweek']->value;?>
 </label>
				</li>
				<li>
					<label class="name">Delivered Orders</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['totaldeliverweek']->value;?>
 </label>
				</li>
				<li>
					<label class="name">Failed Orders</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalfailedweek']->value;?>
 </label>
				</li>
			</ul>
		</div>
		<div class="adminLeftBox indexLeftTabContent"  id="index_month_content" style="display:none;">
			<?php echo $_smarty_tpl->tpl_vars['objAdminMgmt']->value->restaurantDashboardMonthOrders();?>

			<h1 class="dashLeftBtmHead"><?php echo $_smarty_tpl->tpl_vars['month']->value;?>
</h1>
			<ul class="dashLeftBottomUl">
				<li>
					<label class="name">Orders Month</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalordermonth']->value;?>
 </label>
				</li>
				<li>
					<label class="name">Sales Month</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['totalsalesordermonth']->value!='') {
echo $_smarty_tpl->tpl_vars['totalsalesordermonth']->value;
} else { ?>0<?php }?></label>
				</li>
				<li>
					<label class="name">Pending Orders</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalpendingmonth']->value;?>
 </label>
				</li>
				<li>
					<label class="name">Processing Orders</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalprocessingmonth']->value;?>
 </label>
				</li>
				<li>
					<label class="name">Delivered Orders</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['totaldelivermonth']->value;?>
 </label>
				</li>
				<li>
					<label class="name">Failed Orders</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalfailedmonth']->value;?>
 </label>
				</li>
			</ul>
		</div>
		<div class="adminLeftBox indexLeftTabContent"  id="index_year_content" style="display:none;">
			<?php echo $_smarty_tpl->tpl_vars['objAdminMgmt']->value->restaurantDashboardYearOrders();?>

			<h1 class="dashLeftBtmHead"><?php echo $_smarty_tpl->tpl_vars['currentyear']->value;?>
</h1>
			<ul class="dashLeftBottomUl">
				<li>
					<label class="name">Orders Year</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalorderyear']->value;?>
 </label>
				</li>
				<li>
					<label class="name">Sales Year</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['totalsalesorderyear']->value!='') {
echo $_smarty_tpl->tpl_vars['totalsalesorderyear']->value;
} else { ?>0<?php }?></label>
				</li>
				<li>
					<label class="name">Pending Orders</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalpendingyear']->value;?>
 </label>
				</li>
				<li>
					<label class="name">Processing Orders</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalprocessingyear']->value;?>
 </label>
				</li>
				<li>
					<label class="name">Delivered Orders</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['totaldeliveryear']->value;?>
 </label>
				</li>
				<li>
					<label class="name">Failed Orders</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['totalfailedyear']->value;?>
 </label>
				</li>
			</ul>
		</div>
	</div>
	<div class="adminLeftInner">
		<ul class="adminLeftUl rightStatics">
			<li><a href="javascript:void(0);" id="index_user" class="active">Users</a></li>
			<li><a href="javascript:void(0);" id="index_restaurant">Restaurants</a></li>
		</ul>
		<div class="adminLeftBox indexRightTabContent"  id="index_user_content">
			<ul class="dashLeftBottomUl">
				<li>
					<label class="name">Total Users</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['tot_user']->value;?>
</label>
				</li>
				<li>
					<label class="name">Active Users</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['active_user']->value;?>
</label>
				</li>
				<li>
					<label class="name">Inactive Users</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['inactive_user']->value;?>
</label>
				</li>
				<li>
					<label class="name">User Joined In This Week</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['thisweek_user']->value;?>
</label>
				</li>
				<li>
					<label class="name">User Joined In This Month</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['thismon_user']->value;?>
</label>
				</li>
				<li>
					<label class="name">User Joined In This Year</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['thisyear_user']->value;?>
</label>
				</li>
			</ul>
		</div>
		<div class="adminLeftBox indexRightTabContent"  id="index_restaurant_content" style="display:none;">
			<ul class="dashLeftBottomUl">
				<li>
					<label class="name">Total Restaurants</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['tot_rest']->value;?>
</label>
				</li>
				<li>
					<label class="name">Active Restaurants</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['active_rest']->value;?>
</label>
				</li>
				<li>
					<label class="name">Inactive Restaurants</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['inactive_rest']->value;?>
</label>
				</li>
				<li>
					<label class="name">Pending Activation Restaurants</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['pend_rest']->value;?>
</label>
				</li>
				<li>
					<label class="name">Restaurants Joined In This Week</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['thisweek_rest']->value;?>
</label>
				</li>
				<li>
					<label class="name">Restaurants Joined In This Month</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['thismonth_rest']->value;?>
</label>
				</li>
				<li>
					<label class="name">Restaurants Joined In This Year</label>
					<label class="count"><?php echo $_smarty_tpl->tpl_vars['thisyear_rest']->value;?>
</label>
				</li>
			</ul>
		</div>
	</div>
</div><?php }} ?>
