<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-18 20:48:58
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15950667905806d10af0c737-49217903%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c44ede68f594566b871fecf221ac069556921140' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/index.tpl',
      1 => 1466424110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15950667905806d10af0c737-49217903',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tot_wholeorder' => 0,
    'tot_user' => 0,
    'tot_rest' => 0,
    'currency' => 0,
    'total_wholesalesprice' => 0,
    'totalsalesCommissionprice' => 0,
    'day' => 0,
    'month' => 0,
    'date' => 0,
    'currentyear' => 0,
    'totalordertoday' => 0,
    'totalsalesordertoday' => 0,
    'totalpendingtoday' => 0,
    'totalprocessingtoday' => 0,
    'totaldelivertoday' => 0,
    'totalfailedtoday' => 0,
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
    'active_user' => 0,
    'inactive_user' => 0,
    'thisweek_user' => 0,
    'thismon_user' => 0,
    'thisyear_user' => 0,
    'active_rest' => 0,
    'inactive_rest' => 0,
    'pend_rest' => 0,
    'thisweek_rest' => 0,
    'thismonth_rest' => 0,
    'thisyear_rest' => 0,
    'mainModulesList' => 0,
    'userModulesList' => 0,
    'objAdmin' => 0,
    'subModulesList' => 0,
    'userUsedModulesList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5806d10f447026_04638202',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5806d10f447026_04638202')) {function content_5806d10f447026_04638202($_smarty_tpl) {?><!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Dashboard</h1>
      <ol class="breadcrumb">
        <li class="active">This is a quick overview of some features</li>
    </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="index.php" class="btn btn-light">Dashboard</a>
        <span class="btn btn-light" onclick="location.reload();"><i class="fa fa-refresh"></i></span>
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->

<!-- START CONTAINER -->

<div class="container-widget">
  <!-- Start Top Stats -->
  <div class="col-md-12">
	  <ul class="topstats clearfix">
	  	<li class="col-xs-6 col-lg-2">
	      <span class="title"><i class="fa fa-tasks"></i> Total Order (s)</span>
	      <h3><?php echo $_smarty_tpl->tpl_vars['tot_wholeorder']->value;?>
</h3>
	      <!-- <span class="diff"><b class="color-down"><i class="fa fa-caret-down"></i> 26%</b> from yesterday</span> -->
	    </li>
	    <li class="col-xs-6 col-lg-2">
	      <span class="title"><i class="fa fa-users"></i> Total Customer (s)</span>
	      <h3><?php echo $_smarty_tpl->tpl_vars['tot_user']->value;?>
</h3>
	      <!-- <span class="diff"><b class="color-down"><i class="fa fa-caret-down"></i> 26%</b> from yesterday</span> -->
	    </li>
	    <li class="col-xs-6 col-lg-2">
	      <span class="title"><i class="fa fa-cutlery"></i> Total Restaurant (s)</span>
	      <h3><?php echo $_smarty_tpl->tpl_vars['tot_rest']->value;?>
</h3>
	      <!--  <span class="diff"><b class="color-down"><i class="fa fa-caret-down"></i> 26%</b> from yesterday</span> -->
	    </li>
	     <li class="col-xs-6 col-lg-3">
	      <span class="title"><i class="fa fa-shopping-cart"></i> Total Turnover</span>
	      <h3 class="color-up"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['total_wholesalesprice']->value;?>
</h3>
	     <!--  <span class="diff"><b class="color-up"><i class="fa fa-caret-up"></i> 26%</b> from last month</span> -->
	    </li>
	    <li class="col-xs-6 col-lg-3">
	      <span class="title"><i class="fa fa-calendar-o"></i> Total Commissions</span>
	      <h3><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['totalsalesCommissionprice']->value;?>
</h3>
	      <!-- <span class="diff"><b class="color-up"><i class="fa fa-caret-up"></i> 26%</b> from last week</span> -->
	    </li>
	   
	    
	   
	  </ul>
  </div>
  <!-- End Top Stats -->
</div>

  <!-- Start Fifth Row -->
<div class="row">
    <div class="col-md-12 col-lg-6 margin-bottom-15">
    	<ul class="nav nav-tabs tabcolor5-bg">
    		<li class="active"><a href="#today" aria-controls="today" role="tab" data-toggle="tab">Today</a></li>
    		<li><a href="#week" aria-controls="week" role="tab" data-toggle="tab">Week</a></li>
    		<li><a href="#month" aria-controls="month" role="tab" data-toggle="tab">Month</a></li>
    		<li><a href="#year" aria-controls="year" role="tab" data-toggle="tab">Year</a></li>
    	</ul>
    	<div class="tab-content">
	       	<div role="tabpanel" class="tab-pane active form-horizontal" id="today">
		        <table class="table table-hover">
		           <thead>
		              <tr>
		                <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['day']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['month']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['date']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['currentyear']->value;?>
</td>
		              </tr>
		           </thead>
		           <tbody>
		              <tr>
		                <td>Orders Today</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['totalordertoday']->value;?>
</td>
		              </tr>
		              <tr>
		                <td>Sales Today</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp; <?php if ($_smarty_tpl->tpl_vars['totalsalesordertoday']->value!='') {
echo $_smarty_tpl->tpl_vars['totalsalesordertoday']->value;
} else { ?>0<?php }?></td>
		              </tr>
		              <tr>
		                <td>Pending Orders</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['totalpendingtoday']->value;?>
 </td>
		              </tr>
		              <tr>
		                <td>Processing Orders</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['totalprocessingtoday']->value;?>
</td>
		              </tr>
		              <tr>
		                <td>Delivered Orders</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['totaldelivertoday']->value;?>
 </td>
		              </tr>
		              <tr>
		                <td>Failed Orders</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['totalfailedtoday']->value;?>
</td>
		              </tr>
		           </tbody>
		        </table>
	        </div>
	        <div role="tabpanel" class="tab-pane form-horizontal" id="week">
		        <table class="table table-hover">
		           <thead>
		              <tr>
		                <td colspan="2">Week</td>
		              </tr>
		           </thead>
		           <tbody>
		              <tr>
		                <td>Orders Week</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['totalorderweek']->value;?>
</td>
		              </tr>
		              <tr>
		                <td>Sales Week</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['totalsalesorderweek']->value!='') {
echo $_smarty_tpl->tpl_vars['totalsalesorderweek']->value;
} else { ?>0<?php }?></td>
		              </tr>
		              <tr>
		                <td>Pending Orders</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['totalpendingweek']->value;?>
 </td>
		              </tr>
		              <tr>
		                <td>Processing Orders</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['totalprocessingweek']->value;?>
</td>
		              </tr>
		              <tr>
		                <td>Delivered Orders</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['totaldeliverweek']->value;?>
 </td>
		              </tr>
		              <tr>
		                <td>Failed Orders</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['totalfailedweek']->value;?>
</td>
		              </tr>
		           </tbody>
		        </table>
	        </div>
	        <div role="tabpanel" class="tab-pane form-horizontal" id="month">
		        <table class="table table-hover">
			        <thead>
		              <tr>
		                <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['month']->value;?>
</td>
		              </tr>
		           </thead>
		           <tbody>
		              <tr>
		                <td>Orders Month</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['totalordermonth']->value;?>
</td>
		              </tr>
		              <tr>
		                <td>Sales Month</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['totalsalesordermonth']->value!='') {
echo $_smarty_tpl->tpl_vars['totalsalesordermonth']->value;
} else { ?>0<?php }?></td>
		              </tr>
		              <tr>
		                <td>Pending Orders</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['totalpendingmonth']->value;?>
 </td>
		              </tr>
		              <tr>
		                <td>Processing Orders</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['totalprocessingmonth']->value;?>
</td>
		              </tr>
		              <tr>
		                <td>Delivered Orders</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['totaldelivermonth']->value;?>
 </td>
		              </tr>
		              <tr>
		                <td>Failed Orders</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['totalfailedmonth']->value;?>
</td>
		              </tr>
		           </tbody>
				</table>
	        </div>
	        <div role="tabpanel" class="tab-pane form-horizontal" id="year">
		        <table class="table table-hover">
			        <thead>
		              <tr>
		                <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['currentyear']->value;?>
</td>
		              </tr>
		           </thead>
		           <tbody>
		              <tr>
		                <td>Orders Year</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['totalorderyear']->value;?>
</td>
		              </tr>
		              <tr>
		                <td>Sales Year</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['totalsalesorderyear']->value!='') {
echo $_smarty_tpl->tpl_vars['totalsalesorderyear']->value;
} else { ?>0<?php }?></td>
		              </tr>
		              <tr>
		                <td>Pending Orders</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['totalpendingyear']->value;?>
 </td>
		              </tr>
		              <tr>
		                <td>Processing Orders</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['totalprocessingyear']->value;?>
</td>
		              </tr>
		              <tr>
		                <td>Delivered Orders</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['totaldeliveryear']->value;?>
 </td>
		              </tr>
		              <tr>
		                <td>Failed Orders</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['totalfailedyear']->value;?>
</td>
		              </tr>
		           </tbody>
				</table>
	    	</div>
	    </div>
    </div>

    <div class="col-md-12 col-lg-6 margin-bottom-15">
    	<ul class="nav nav-tabs tabcolor5-bg">
    		<li class="active"><a href="#user" aria-controls="user" role="tab" data-toggle="tab">User</a></li>
    		<li><a href="#rest" aria-controls="rest" role="tab" data-toggle="tab">Restaurant</a></li>
    		
    	</ul>
    	<div class="tab-content">
	       	<div role="tabpanel" class="tab-pane active form-horizontal" id="user">
		        <table class="table table-hover">
		           <tbody>
		              <tr>
		                <td>Total Users</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['tot_user']->value;?>
</td>
		              </tr>
		              <tr>
		                <td>Active Users</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['active_user']->value;?>
</td>
		              </tr>
		              <tr>
		                <td>Inactive Users</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['inactive_user']->value;?>
 </td>
		              </tr>
		              <tr>
		                <td>User Joined In This Week</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['thisweek_user']->value;?>
</td>
		              </tr>
		              <tr>
		                <td>User Joined In This Month</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['thismon_user']->value;?>
 </td>
		              </tr>
		              <tr>
		                <td>User Joined In This Year</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['thisyear_user']->value;?>
</td>
		              </tr>
		           </tbody>
		        </table>
	        </div>
	        <div role="tabpanel" class="tab-pane form-horizontal" id="rest">
		        <table class="table table-hover">
		           <tbody>
		              <tr>
		                <td>Total Restaurants</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['tot_rest']->value;?>
</td>
		              </tr>
		              <tr>
		                <td>Active Restaurants</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['active_rest']->value;?>
</td>
		              </tr>
		              <tr>
		                <td>Inactive Restaurants</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['inactive_rest']->value;?>
 </td>
		              </tr>
		              <tr>
		                <td>Pending Activation Restaurants</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['pend_rest']->value;?>
 </td>
		              </tr>
		              <tr>
		                <td>Restaurants Joined In This Week</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['thisweek_rest']->value;?>
</td>
		              </tr>
		              <tr>
		                <td>Restaurants Joined In This Month</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['thismonth_rest']->value;?>
 </td>
		              </tr>
		              <tr>
		                <td>Restaurants Joined In This Year</td>
		                <td><?php echo $_smarty_tpl->tpl_vars['thisyear_rest']->value;?>
</td>
		              </tr>
		           </tbody>
		        </table>
	        </div>
	       
	    </div>
    </div>

</div>


<!--<div class="row">
    
    
	<div class="col-sm-9 col-xs-12">
		<?php if ($_SESSION['adminid']=='1') {?>
			<div class="adminRightRest">
				<h1 class="adminRightHead orderbg1">Restaurant</h1>
				<div class="adminRightInBox">
					<div class="adminRightcontain">
						<a href="restaurantAddEdit.php" class="innerLinks col-xs-12 col-sm-3"><img src="images/add-new-restaurant.png" alt="" title=""  width="16px" height="16px" /><span class="text">Add New Restaurant</span></a>
						<a href="restaurantManage.php" class="innerLinks col-xs-12 col-sm-3"><img src="images/manage-restaurant.png" alt="" title="" width="16px" height="16px" /><span class="text">Manage Restaurant</span></a>
						<a href="menuManage.php" class="innerLinks col-xs-12 col-sm-3"><img src="images/restaurantmenu.png" alt="" title="" width="16px" height="16px" /><span class="text">Restaurant Menu</span></a>
						<a href="restaurantOfferManage.php" class="innerLinks col-xs-12 col-sm-3 "><img src="images/restaurantoffer.png" alt="" title=""  width="16px" height="16px"/><span class="text">Restaurant Offer</span></a>
						
						<a href="restaurantReportManage.php" class="innerLinks col-xs-12 col-sm-3"><img src="images/restaurantreportr.png" alt="" title="" width="16px" height="16px"/><span class="text">Restaurant Reports</span></a>
						<a href="restaurantReviewsManage.php" class="innerLinks col-xs-12 col-sm-3"><img src="images/restaurantreviews.png" alt="" title="" width="16px" height="16px" /><span class="text">Restaurant Reviews</span></a>
						<a href="restaurantBookingManage.php" class="innerLinks col-xs-12 col-sm-3"><img src="images/restaurantbooking.png" alt="" title="" width="16px" height="16px" /><span class="text">Restaurant Bookings</span></a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="adminRightInner col-sm-4">
					<h1 class="adminRightHead turnoverbg1">Category</h1>
					<div class="adminRightInBox">
						<div class="adminRightcontain">
							<a href="categoryAddEdit.php" class="innerLinks col-xs-12 col-sm-12"><img src="images/add-new-category.png" alt="" title="" width="16px" height="16px" /><span class="text">Add New Category</span></a>
							<a href="categoryManage.php" class="innerLinks col-xs-12 col-sm-12"><img src="images/manage-category.png" alt="" title="" width="16px" height="16px" /><span class="text">Manage Category</span></a>
						</div>
					</div>
				</div>
				<div class="adminRightInner col-sm-4">
					<h1 class="adminRightHead blackbg">Cuisine</h1>
					<div class="adminRightInBox">
						<div class="adminRightcontain">
							<a href="cuisineAddEdit.php" class="innerLinks col-xs-12 col-sm-12"><img src="images/add-cuisine.png" alt="" title="" width="16px" height="16px" /><span class="text">Add New Cuisine</span></a>
							<a href="cuisineManage.php" class="innerLinks col-xs-12 col-sm-12"><img src="images/add-new-cuisine.png" alt="" title="" width="16px" height="16px" /><span class="text">Manage Cuisine</span></a>
						</div>
					</div>
				</div>
				<div class="adminRightInner col-sm-4">
					<h1 class="adminRightHead redbg">Addons</h1>
					<div class="adminRightInBox">
						<div class="adminRightcontain">
							<a href="addonsAddEdit.php" class="innerLinks col-xs-12 col-sm-12"><img src="images/add-new-addons.png" alt="" title="" width="16px" height="16px" /><span class="text">Add New Addons</span></a>
							<a href="addonsManage.php" class="innerLinks col-xs-12 col-sm-12"><img src="images/manage-addons.png" alt="" title="" width="16px" height="16px" /><span class="text">Manage Addons</span></a>
						</div>
					</div>
				</div>
			 
				<div class="adminRightInner col-sm-4 col-xs-12">
					<h1 class="adminRightHead greenbg">Orders</h1>
					<div class="adminRightInBox">
						<div class="adminRightcontain">
							<a href="restaurantOrderManage.php" class="clearfix col-xs-12 innerLinks col-sm-12"><img src="images/restaurantorders.png" alt="" title="" width="16px" height="16px" /><span class="text">Manage Order</span></a>
							<a href="restaurantOrderManage.php?type=CO" class="innerLinks col-xs-12 col-sm-12"><img src="images/customer-order.png" alt="" title=""  width="16px" height="16px"/><span class="text">Customer Order</span></a>
							<a href="restaurantOrderManage.php?type=GO" class="innerLinks col-xs-12 col-sm-12"><img src="images/guest.png" alt="" title="" width="16px" height="16px" /><span class="text">Guest Order</span></a>
						</div>
					</div>
				</div>
				<div class="adminRightInner col-sm-4 col-xs-12">
					<h1 class="adminRightHead purplebg">Location</h1>
					<div class="adminRightInBox">
						<div class="adminRightcontain">
							<a href="stateManage.php" class="innerLinks col-sm-12"><img src="images/state.png" alt="" title="" width="16px" height="16px" /><span class="text">State</span></a>
							<a href="cityManage.php" class="innerLinks col-sm-12"><img src="images/city.png" alt="" title="" width="16px" height="16px" /><span class="text">City</span></a>
							<a href="zipcodeManage.php" class="innerLinks col-sm-12"><img src="images/zipcode.png" alt="" title="" width="16px" height="16px" /><span class="text">Zipcode</span></a>
						</div>
					</div>
				</div>
				<div class="adminRightInner col-sm-4 col-xs-12">
					<h1 class="adminRightHead orderbg1">Customer</h1>
					<div class="adminRightInBox">
						<div class="adminRightcontain">
							<a href="customerManage.php" class="innerLinks col-sm-12"><img src="images/customer.png" alt="" title="" width="16px" height="16px" /><span class="text">Customer</span></a>
							<a href="customerManage.php" class="innerLinks col-sm-12"><img src="images/addressbookicon.png" alt="" title="" width="16px" height="16px" /><span class="text">Address Book</span></a>
							<a href="paymentManage.php" class="innerLinks col-sm-12"><img src="images/payment.png" alt="" title="" width="16px" height="16px" /><span class="text">Payment</span></a>
						</div>
					</div>
				</div>
			</div>
				<div class="adminRightRest">
					<h1 class="adminRightHead bg2">Management</h1>
					<div class="adminRightInBox">
						<div class="adminRightcontain">
							<a href="contentManage.php" class="innerLinks col-sm-3"><img src="images/content.png" alt="" title="" width="16px" height="16px"  /><span class="text">Content</span></a>
							<a href="faqManage.php" class="innerLinks col-sm-3"><img src="images/faq.png" alt="" title="" width="16px" height="16px" /><span class="text">FAQ</span></a>
							<a href="languageManage.php" class="innerLinks col-sm-3"><img src="images/language.png" alt="" title="" width="16px" height="16px" /><span class="text">Language</span></a>
							<a href="followersManage.php" class="innerLinks col-sm-3"><img src="images/followers.png" alt="" title="" width="16px" height="16px" /><span class="text">Followers</span></a>
							<a href="paymentInfoManage.php" class="clearfix innerLinks col-sm-3"><img src="images/payment-info.png" alt="" title="" width="16px" height="16px" /><span class="text">Payment Info</span></a>
							<a href="siteFeedbackManage.php" class="innerLinks col-sm-3"><img src="images/feedback.png" alt="" title="" width="16px" height="16px" /><span class="text">Site Feedback</span></a>
							<a href="contactUsManage.php" class="innerLinks col-sm-3"><img src="images/contactusicon.png" alt="" title="" width="16px" height="16px" /><span class="text">Contact us</span></a>
							<a href="newsLetterManage.php" class="innerLinks col-sm-3"><img src="images/newslettericon.png" alt="" title="" width="16px" height="16px"  /><span class="text">News letter</span></a>
							<a href="metatagManage.php" class="innerLinks col-sm-3"><img src="images/metatagicon.png" alt="" title="" width="16px" height="16px" /><span class="text">Meta tag</span></a>
							<a href="indexBannerManage.php" class="innerLinks col-sm-3"><img src="images/indexbanner.png" alt="" title=""width="16px" height="16px"  /><span class="text">Index Banner</span></a>
						</div>
					</div>
				</div>
			
				<div class="adminRightRest">
					<h1 class="adminRightHead bg2">Deleted Management</h1>
					<div class="adminRightInBox">
						<div class="adminRightcontain">
							<a href="deletedRestaurantManage.php" class="innerLinks  col-sm-3"><img src="images/delete-restaurantlist.png" alt="" title="" width="16px" height="16px" /><span class="text">Deleted Restaurant List</span></a>
							<a href="customerDeleteManage.php" class="clearfix innerLinks  col-sm-3"><img src="images/delete-userlist.png" alt="" title="" width="16px" height="16px" /><span class="text">Deleted Customer List</span></a>
							<a href="restaurantDeleteOrderManage.php" class="innerLinks  col-sm-3"><img src="images/delete-orderlist.png" alt="" title="" width="16px" height="16px" /><span class="text">Deleted Order List</span></a>
							<a href="menuDeleteManage.php" class="innerLinks  col-sm-3"><img src="images/delete-menulist.png" alt="" title="" width="16px" height="16px" /><span class="text">Deleted Menu List</span></a>
						</div>
					</div>
				</div>
			
		    
		<?php } else { ?>
		    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['name'] = "menulist";
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['mainModulesList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["menulist"]['total']);
?>
		        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['name'] = "userlist";
$_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['userModulesList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["userlist"]['total']);
?>
		            <?php if ($_smarty_tpl->tpl_vars['userModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['userlist']['index']]['modules']==$_smarty_tpl->tpl_vars['mainModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menulist']['index']]['id']) {?>
		                <div class="adminRightRest">
		                    <li><a href="<?php if ($_smarty_tpl->tpl_vars['mainModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menulist']['index']]['page_url']!='') {
echo $_smarty_tpl->tpl_vars['mainModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menulist']['index']]['page_url'];
} else { ?>javascript:void(0)<?php }?>"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['mainModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menulist']['index']]['modulesname']));?>
</a>
		                        <?php if ($_smarty_tpl->tpl_vars['mainModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menulist']['index']]['menucount']>0) {?>
		                            <?php echo $_smarty_tpl->tpl_vars['objAdmin']->value->selectSubMenu($_smarty_tpl->tpl_vars['mainModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['menulist']['index']]['id']);?>

		                            <ul>
		                                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['name'] = "sub";
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['subModulesList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["sub"]['total']);
?>
		                                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['name'] = "usedlist";
$_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['userUsedModulesList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["usedlist"]['total']);
?>
		                                        <?php if ($_smarty_tpl->tpl_vars['userUsedModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['usedlist']['index']]['modules']==$_smarty_tpl->tpl_vars['subModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sub']['index']]['id']) {?>
		                                            <li><a href="<?php if ($_smarty_tpl->tpl_vars['subModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sub']['index']]['page_url']!='') {
echo $_smarty_tpl->tpl_vars['subModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sub']['index']]['page_url'];
} else { ?>javascript:void(0);<?php }?>"><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['subModulesList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sub']['index']]['modulesname']));?>
</a></li>
		                                        <?php }?>
		                                    <?php endfor; endif; ?>
		                                <?php endfor; endif; ?>
		                            </ul>
		                        <?php }?>
		                    </li>
		                </div>
		            <?php }?>
		        <?php endfor; endif; ?>
		    <?php endfor; endif; ?>
		<?php }?>
	</div>

	<div class="col-sm-3 col-xs-12">
		<?php echo $_smarty_tpl->getSubTemplate ('admin_main_left.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
</div>-->
<?php }} ?>
