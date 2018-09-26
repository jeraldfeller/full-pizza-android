<!-- Start Page Header -->
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
	      <h3>{$tot_wholeorder}</h3>
	      <!-- <span class="diff"><b class="color-down"><i class="fa fa-caret-down"></i> 26%</b> from yesterday</span> -->
	    </li>
	    <li class="col-xs-6 col-lg-2">
	      <span class="title"><i class="fa fa-users"></i> Total Customer (s)</span>
	      <h3>{$tot_user}</h3>
	      <!-- <span class="diff"><b class="color-down"><i class="fa fa-caret-down"></i> 26%</b> from yesterday</span> -->
	    </li>
	    <li class="col-xs-6 col-lg-2">
	      <span class="title"><i class="fa fa-cutlery"></i> Total Restaurant (s)</span>
	      <h3>{$tot_rest}</h3>
	      <!--  <span class="diff"><b class="color-down"><i class="fa fa-caret-down"></i> 26%</b> from yesterday</span> -->
	    </li>
	     <li class="col-xs-6 col-lg-3">
	      <span class="title"><i class="fa fa-shopping-cart"></i> Total Turnover</span>
	      <h3 class="color-up">{$currency} {$total_wholesalesprice}</h3>
	     <!--  <span class="diff"><b class="color-up"><i class="fa fa-caret-up"></i> 26%</b> from last month</span> -->
	    </li>
	    <li class="col-xs-6 col-lg-3">
	      <span class="title"><i class="fa fa-calendar-o"></i> Total Commissions</span>
	      <h3>{$currency} {$totalsalesCommissionprice}</h3>
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
		                <td colspan="2">{$day}, {$month} {$date}, {$currentyear}</td>
		              </tr>
		           </thead>
		           <tbody>
		              <tr>
		                <td>Orders Today</td>
		                <td>{$totalordertoday}</td>
		              </tr>
		              <tr>
		                <td>Sales Today</td>
		                <td>{$currency}&nbsp; {if $totalsalesordertoday neq ''}{$totalsalesordertoday}{else}0{/if}</td>
		              </tr>
		              <tr>
		                <td>Pending Orders</td>
		                <td>{$totalpendingtoday} </td>
		              </tr>
		              <tr>
		                <td>Processing Orders</td>
		                <td>{$totalprocessingtoday}</td>
		              </tr>
		              <tr>
		                <td>Delivered Orders</td>
		                <td>{$totaldelivertoday} </td>
		              </tr>
		              <tr>
		                <td>Failed Orders</td>
		                <td>{$totalfailedtoday}</td>
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
		                <td>{$totalorderweek}</td>
		              </tr>
		              <tr>
		                <td>Sales Week</td>
		                <td>{$currency}&nbsp;{if $totalsalesorderweek neq ''}{$totalsalesorderweek}{else}0{/if}</td>
		              </tr>
		              <tr>
		                <td>Pending Orders</td>
		                <td>{$totalpendingweek} </td>
		              </tr>
		              <tr>
		                <td>Processing Orders</td>
		                <td>{$totalprocessingweek}</td>
		              </tr>
		              <tr>
		                <td>Delivered Orders</td>
		                <td>{$totaldeliverweek} </td>
		              </tr>
		              <tr>
		                <td>Failed Orders</td>
		                <td>{$totalfailedweek}</td>
		              </tr>
		           </tbody>
		        </table>
	        </div>
	        <div role="tabpanel" class="tab-pane form-horizontal" id="month">
		        <table class="table table-hover">
			        <thead>
		              <tr>
		                <td colspan="2">{$month}</td>
		              </tr>
		           </thead>
		           <tbody>
		              <tr>
		                <td>Orders Month</td>
		                <td>{$totalordermonth}</td>
		              </tr>
		              <tr>
		                <td>Sales Month</td>
		                <td>{$currency}&nbsp;{if $totalsalesordermonth neq ''}{$totalsalesordermonth}{else}0{/if}</td>
		              </tr>
		              <tr>
		                <td>Pending Orders</td>
		                <td>{$totalpendingmonth} </td>
		              </tr>
		              <tr>
		                <td>Processing Orders</td>
		                <td>{$totalprocessingmonth}</td>
		              </tr>
		              <tr>
		                <td>Delivered Orders</td>
		                <td>{$totaldelivermonth} </td>
		              </tr>
		              <tr>
		                <td>Failed Orders</td>
		                <td>{$totalfailedmonth}</td>
		              </tr>
		           </tbody>
				</table>
	        </div>
	        <div role="tabpanel" class="tab-pane form-horizontal" id="year">
		        <table class="table table-hover">
			        <thead>
		              <tr>
		                <td colspan="2">{$currentyear}</td>
		              </tr>
		           </thead>
		           <tbody>
		              <tr>
		                <td>Orders Year</td>
		                <td>{$totalorderyear}</td>
		              </tr>
		              <tr>
		                <td>Sales Year</td>
		                <td>{$currency}&nbsp;{if $totalsalesorderyear neq ''}{$totalsalesorderyear}{else}0{/if}</td>
		              </tr>
		              <tr>
		                <td>Pending Orders</td>
		                <td>{$totalpendingyear} </td>
		              </tr>
		              <tr>
		                <td>Processing Orders</td>
		                <td>{$totalprocessingyear}</td>
		              </tr>
		              <tr>
		                <td>Delivered Orders</td>
		                <td>{$totaldeliveryear} </td>
		              </tr>
		              <tr>
		                <td>Failed Orders</td>
		                <td>{$totalfailedyear}</td>
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
		                <td>{$tot_user}</td>
		              </tr>
		              <tr>
		                <td>Active Users</td>
		                <td>{$active_user}</td>
		              </tr>
		              <tr>
		                <td>Inactive Users</td>
		                <td>{$inactive_user} </td>
		              </tr>
		              <tr>
		                <td>User Joined In This Week</td>
		                <td>{$thisweek_user}</td>
		              </tr>
		              <tr>
		                <td>User Joined In This Month</td>
		                <td>{$thismon_user} </td>
		              </tr>
		              <tr>
		                <td>User Joined In This Year</td>
		                <td>{$thisyear_user}</td>
		              </tr>
		           </tbody>
		        </table>
	        </div>
	        <div role="tabpanel" class="tab-pane form-horizontal" id="rest">
		        <table class="table table-hover">
		           <tbody>
		              <tr>
		                <td>Total Restaurants</td>
		                <td>{$tot_rest}</td>
		              </tr>
		              <tr>
		                <td>Active Restaurants</td>
		                <td>{$active_rest}</td>
		              </tr>
		              <tr>
		                <td>Inactive Restaurants</td>
		                <td>{$inactive_rest} </td>
		              </tr>
		              <tr>
		                <td>Pending Activation Restaurants</td>
		                <td>{$pend_rest} </td>
		              </tr>
		              <tr>
		                <td>Restaurants Joined In This Week</td>
		                <td>{$thisweek_rest}</td>
		              </tr>
		              <tr>
		                <td>Restaurants Joined In This Month</td>
		                <td>{$thismonth_rest} </td>
		              </tr>
		              <tr>
		                <td>Restaurants Joined In This Year</td>
		                <td>{$thisyear_rest}</td>
		              </tr>
		           </tbody>
		        </table>
	        </div>
	       
	    </div>
    </div>

</div>


<!--<div class="row">
    
    
	<div class="col-sm-9 col-xs-12">
		{if $smarty.session.adminid eq '1'}
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
			
		    {*{section name="menulist" loop=$mainModulesList}
		        <div class="adminRightRest">
		            <h1 class="adminRightHead orderbg1">{$mainModulesList[menulist].modulesname|ucfirst|stripslashes}</h1>
		            <div class="adminRightInBox">                
		                {if $mainModulesList[menulist].menucount gt 0}
		                {$objAdmin->selectSubMenu($mainModulesList[menulist].id)}
		                <div class="adminRightcontain">
		                    {section name="sub" loop=$subModulesList}
		                        <a href="{if $subModulesList[sub].page_url neq ''}{$subModulesList[sub].page_url}{else}javascript:void(0);{/if}">{$subModulesList[sub].modulesname|ucfirst|stripslashes}</a>
		                    {/section}
		                </div>
		                {/if}
		            </div>
		   		</div>
		    {/section}*}
		{else}
		    {section name="menulist" loop=$mainModulesList}
		        {section name="userlist" loop=$userModulesList}
		            {if $userModulesList[userlist].modules eq $mainModulesList[menulist].id}
		                <div class="adminRightRest">
		                    <li><a href="{if $mainModulesList[menulist].page_url neq ''}{$mainModulesList[menulist].page_url}{else}javascript:void(0){/if}">{$mainModulesList[menulist].modulesname|ucfirst|stripslashes}</a>
		                        {if $mainModulesList[menulist].menucount gt 0}
		                            {$objAdmin->selectSubMenu($mainModulesList[menulist].id)}
		                            <ul>
		                                {section name="sub" loop=$subModulesList}
		                                    {section name="usedlist" loop=$userUsedModulesList}
		                                        {if $userUsedModulesList[usedlist].modules eq $subModulesList[sub].id}
		                                            <li><a href="{if $subModulesList[sub].page_url neq ''}{$subModulesList[sub].page_url}{else}javascript:void(0);{/if}">{$subModulesList[sub].modulesname|ucfirst|stripslashes}</a></li>
		                                        {/if}
		                                    {/section}
		                                {/section}
		                            </ul>
		                        {/if}
		                    </li>
		                </div>
		            {/if}
		        {/section}
		    {/section}
		{/if}
	</div>

	<div class="col-sm-3 col-xs-12">
		{include file='admin_main_left.tpl'}
	</div>
</div>-->
