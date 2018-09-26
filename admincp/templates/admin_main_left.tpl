<div class="adminLeft">
	<div class="adminLeftInner">
		<ul class="adminLeftUl yearMonthStatics">
			<li><a href="javascript:void(0);" id="index_today" class="active">Today</a></li>
			<li><a href="javascript:void(0);" id="index_week">Week</a></li>
			<li><a href="javascript:void(0);" id="index_month">Month</a></li>
			<li><a href="javascript:void(0);" id="index_year">Year</a></li>
		</ul>
		<div class="adminLeftBox indexLeftTabContent"  id="index_today_content">
			<h1 class="dashLeftBtmHead">{$day}, {$month} {$date}, {$currentyear}</h1>
			<ul class="dashLeftBottomUl">
				<li>
					<label class="name">Orders Today</label>
					<label class="count">{$totalordertoday} </label>
				</li>
				<li>
					<label class="name">Sales Today</label>
					<label class="count">{$currency}&nbsp; {if $totalsalesordertoday neq ''}{$totalsalesordertoday}{else}0{/if}</label>
				</li>
				<li>
					<label class="name">Pending Orders</label>
					<label class="count">{$totalpendingtoday} </label>
				</li>
				<li>
					<label class="name">Processing Orders</label>
					<label class="count">{$totalprocessingtoday} </label>
				</li>
				<li>
					<label class="name">Delivered Orders</label>
					<label class="count">{$totaldelivertoday} </label>
				</li>
				<li>
					<label class="name">Failed Orders</label>
					<label class="count">{$totalfailedtoday} </label>
				</li>
				
			</ul>
		</div>
		<div class="adminLeftBox indexLeftTabContent"  id="index_week_content" style="display:none;">
			{$objAdminMgmt->restaurantDashboardWeekOrders()}
			<h1 class="dashLeftBtmHead">Week</h1>
			<ul class="dashLeftBottomUl">
				<li>
					<label class="name">Orders Week</label>
					<label class="count">{$totalorderweek} </label>
				</li>
				<li>
					<label class="name">Sales Week</label>
					<label class="count">{$currency}&nbsp;{if $totalsalesorderweek neq ''}{$totalsalesorderweek}{else}0{/if}</label>
				</li>
				<li>
					<label class="name">Pending Orders</label>
					<label class="count">{$totalpendingweek} </label>
				</li>
				<li>
					<label class="name">Processing Orders</label>
					<label class="count">{$totalprocessingweek} </label>
				</li>
				<li>
					<label class="name">Delivered Orders</label>
					<label class="count">{$totaldeliverweek} </label>
				</li>
				<li>
					<label class="name">Failed Orders</label>
					<label class="count">{$totalfailedweek} </label>
				</li>
			</ul>
		</div>
		<div class="adminLeftBox indexLeftTabContent"  id="index_month_content" style="display:none;">
			{$objAdminMgmt->restaurantDashboardMonthOrders()}
			<h1 class="dashLeftBtmHead">{$month}</h1>
			<ul class="dashLeftBottomUl">
				<li>
					<label class="name">Orders Month</label>
					<label class="count">{$totalordermonth} </label>
				</li>
				<li>
					<label class="name">Sales Month</label>
					<label class="count">{$currency}&nbsp;{if $totalsalesordermonth neq ''}{$totalsalesordermonth}{else}0{/if}</label>
				</li>
				<li>
					<label class="name">Pending Orders</label>
					<label class="count">{$totalpendingmonth} </label>
				</li>
				<li>
					<label class="name">Processing Orders</label>
					<label class="count">{$totalprocessingmonth} </label>
				</li>
				<li>
					<label class="name">Delivered Orders</label>
					<label class="count">{$totaldelivermonth} </label>
				</li>
				<li>
					<label class="name">Failed Orders</label>
					<label class="count">{$totalfailedmonth} </label>
				</li>
			</ul>
		</div>
		<div class="adminLeftBox indexLeftTabContent"  id="index_year_content" style="display:none;">
			{$objAdminMgmt->restaurantDashboardYearOrders()}
			<h1 class="dashLeftBtmHead">{$currentyear}</h1>
			<ul class="dashLeftBottomUl">
				<li>
					<label class="name">Orders Year</label>
					<label class="count">{$totalorderyear} </label>
				</li>
				<li>
					<label class="name">Sales Year</label>
					<label class="count">{$currency}&nbsp;{if $totalsalesorderyear neq ''}{$totalsalesorderyear}{else}0{/if}</label>
				</li>
				<li>
					<label class="name">Pending Orders</label>
					<label class="count">{$totalpendingyear} </label>
				</li>
				<li>
					<label class="name">Processing Orders</label>
					<label class="count">{$totalprocessingyear} </label>
				</li>
				<li>
					<label class="name">Delivered Orders</label>
					<label class="count">{$totaldeliveryear} </label>
				</li>
				<li>
					<label class="name">Failed Orders</label>
					<label class="count">{$totalfailedyear} </label>
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
					<label class="count">{$tot_user}</label>
				</li>
				<li>
					<label class="name">Active Users</label>
					<label class="count">{$active_user}</label>
				</li>
				<li>
					<label class="name">Inactive Users</label>
					<label class="count">{$inactive_user}</label>
				</li>
				<li>
					<label class="name">User Joined In This Week</label>
					<label class="count">{$thisweek_user}</label>
				</li>
				<li>
					<label class="name">User Joined In This Month</label>
					<label class="count">{$thismon_user}</label>
				</li>
				<li>
					<label class="name">User Joined In This Year</label>
					<label class="count">{$thisyear_user}</label>
				</li>
			</ul>
		</div>
		<div class="adminLeftBox indexRightTabContent"  id="index_restaurant_content" style="display:none;">
			<ul class="dashLeftBottomUl">
				<li>
					<label class="name">Total Restaurants</label>
					<label class="count">{$tot_rest}</label>
				</li>
				<li>
					<label class="name">Active Restaurants</label>
					<label class="count">{$active_rest}</label>
				</li>
				<li>
					<label class="name">Inactive Restaurants</label>
					<label class="count">{$inactive_rest}</label>
				</li>
				<li>
					<label class="name">Pending Activation Restaurants</label>
					<label class="count">{$pend_rest}</label>
				</li>
				<li>
					<label class="name">Restaurants Joined In This Week</label>
					<label class="count">{$thisweek_rest}</label>
				</li>
				<li>
					<label class="name">Restaurants Joined In This Month</label>
					<label class="count">{$thismonth_rest}</label>
				</li>
				<li>
					<label class="name">Restaurants Joined In This Year</label>
					<label class="count">{$thisyear_rest}</label>
				</li>
			</ul>
		</div>
	</div>
</div>