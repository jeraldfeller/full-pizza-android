<div class="page-header">
    <h1 class="title">{$restaurantname|ucfirst|stripslashes} Information</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">{$restaurantname|ucfirst|stripslashes} Information</li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div aria-label="..." role="group" class="btn-group">
        <a class="btn btn-light" href="index.php">Dashboard</a>
        <a class="btn btn-light" href="#"><i class="fa fa-refresh"></i></a>
        <a class="btn btn-light" href="#"><i class="fa fa-search"></i></a>
        <a id="topstats" class="btn btn-light" href="#"><i class="fa fa-line-chart"></i></a>
      </div>
    </div>
    <!-- End Page Header Right Div -->
</div>

<div class="panel panel-default">
	<div class="panel-body">
		<div role="tabpanel">
			<div class="clearfix">
				<!--Left Restaurant Menu Tab Start-->
				<ul class="nav nav-tabs tabcolor5-bg">
					<li class="active">
						<a data-toggle="tab" role="tab" aria-controls="dashboard" href="#dashboard">Dashboard</a>
					</li>
					<li>
						<a data-toggle="tab" role="tab" aria-controls="order" href="#order">Orders</a>
					</li>
					<li>
						<a data-toggle="tab" role="tab" aria-controls="category" href="#category">Category</a>
					</li>
					<li>
						<a data-toggle="tab" role="tab" aria-controls="menu" href="#menu">Menu</a>
					</li>
					<li>
						<a data-toggle="tab" role="tab" aria-controls="addons" href="#addons">Addons</a>
					</li>
					<li>
						<a data-toggle="tab" role="tab" aria-controls="booking" href="#booking">Booking</a>
					</li>
					<li>
						<a data-toggle="tab" role="tab" aria-controls="account" href="#account">Accounts</a>
					</li>
					<li>
						<a data-toggle="tab" role="tab" aria-controls="settings" href="#settings">Settings</a>
					</li>
					<li>
						<a data-toggle="tab" role="tab" aria-controls="offers" href="#offers">Offers</a>
					</li>
					<li>
						<a data-toggle="tab" role="tab" aria-controls="reports" href="#reports">Reports</a>
					</li>
				</ul>
				<!--Left Restaurant Menu Tab End-->
				<!--Right Restaurant Menu Tab End-->
				<div class="tab-content">
					{*----------------------- Dashboard -----------------------*}
					<div id="dashboard" class="tab-pane active" role="tabpanel">
						{include file='restaurantDetails_dashboard.tpl'}
					</div>
					{*----------------------- Orders -----------------------*}
					<div  id="order" class="tab-pane" role="tabpanel">
						{include file='restaurantDetails_order.tpl'}
					</div>
					{*----------------------- Category -----------------------*}
					<div  id="category" class="tab-pane " role="tabpanel">
						{include file='restaurantDetails_category.tpl'}
					</div>
					{*----------------------- Menu -----------------------*}
					<div  id="menu" class="tab-pane " role="tabpanel">
						{include file='restaurantDetails_menu.tpl'}
					</div>
					{*----------------------- Addons -----------------------*}
					<div  id="addons" class="tab-pane " role="tabpanel">
						{include file='restaurantDetails_addon.tpl'}
					</div>
					{*----------------------- Billing -----------------------*}
					<div  id="booking" class="tab-pane " role="tabpanel">
						{include file='restaurantDetails_booking.tpl'}
					</div>
					{*----------------------- Accounts -----------------------*}
					<div  id="account" class="tab-pane " role="tabpanel">
						{include file='restaurantDetails_account.tpl'}
					</div>
					{*----------------------- Settings -----------------------*}
					<div  id="settings" class="tab-pane " role="tabpanel">
						{include file='restaurantDetails_setting.tpl'}
					</div>
					{*----------------------- Offers -----------------------*}
					<div  id="offers" class="tab-pane " role="tabpanel">
						{include file='restaurantDetails_offer.tpl'}
					</div>
					{*----------------------- Reports -----------------------*}
					<div id="reports" class="tab-pane " role="tabpanel">
						{include file='restaurantDetails_report.tpl'}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>