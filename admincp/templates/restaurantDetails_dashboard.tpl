<div class="dashboardInner">
	<!--Left Statistics-->
	<div class="col-sm-3">
		<div class="dashboardLeftCont">
			<ul class="dashLeftTopUl yearMonthStatics">
				<li><a href="javascript:void(0);" id="index_today" class="active">Today</a></li>
				<li><a href="javascript:void(0);" id="index_week">Week</a></li>
				<li><a href="javascript:void(0);" id="index_month">Month</a></li>
				<li><a href="javascript:void(0);" id="index_year">Year</a></li>
			</ul>
			
			{******************** Today **********************}
			<div class="dashLeftBottom indexLeftTabContent" id="index_today_content">
				<h1 class="dashLeftBtmHead">{$day}, {$month} {$date}, {$currentyear}</h1>
				<ul class="dashLeftBottomUl">
					<li>
						<label class="name">Orders Today</label>
						<label class="count">{$totalordertoday} </label>
					</li>
					<li>
						<label class="name">Sales Today</label>
						<label class="count">{$currency}&nbsp;{if $totalsalesordertoday neq ''}{$totalsalesordertoday}{else}0{/if}</label>
					</li>
					<li>
						<label class="name">Pending Order</label>
						<label class="count">{$totalpendingtoday} </label>
					</li>
					<li>
						<label class="name">Processing Orders</label>
						<label class="count">{$totalprocessingtoday} </label>
					</li>
					<li>
						<label class="name">Delivered Order</label>
						<label class="count">{$totaldelivertoday} </label>
					</li>
					<li>
						<label class="name">Failed Order</label>
						<label class="count">{$totalfailedtoday} </label>
					</li>
					<!--<li>
						<label class="name">Recent Orders</label>
						<label class="count">22$</label>
					</li>-->
				</ul>
			</div>
			
			{******************** Week **********************}
			<div class="dashLeftBottom indexLeftTabContent" id="index_week_content" style="display:none;">
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
						<label class="name">Pending Order</label>
						<label class="count">{$totalpendingweek} </label>
					</li>
					<li>
						<label class="name">Processing Orders</label>
						<label class="count">{$totalprocessingweek} </label>
					</li>
					<li>
						<label class="name">Delivered Order</label>
						<label class="count">{$totaldeliverweek} </label>
					</li>
					<li>
						<label class="name">Failed Order</label>
						<label class="count">{$totalfailedweek} </label>
					</li>
				</ul>
			</div>
			
			{******************** Month **********************}
			<div class="dashLeftBottom indexLeftTabContent" id="index_month_content" style="display:none;">
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
						<label class="name">Pending Order</label>
						<label class="count">{$totalpendingmonth} </label>
					</li>
					<li>
						<label class="name">Processing Orders</label>
						<label class="count">{$totalprocessingmonth} </label>
					</li>
					<li>
						<label class="name">Delivered Order</label>
						<label class="count">{$totaldelivermonth} </label>
					</li>
					<li>
						<label class="name">Failed Order</label>
						<label class="count">{$totalfailedmonth} </label>
					</li>
				</ul>
			</div>
			
			{******************** Year **********************}
			<div class="dashLeftBottom indexLeftTabContent" id="index_year_content" style="display:none;">
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
						<label class="name">Pending Order</label>
						<label class="count">{$totalpendingyear} </label>
					</li>
					<li>
						<label class="name">Processing Orders</label>
						<label class="count">{$totalprocessingyear} </label>
					</li>
					<li>
						<label class="name">Delivered Order</label>
						<label class="count">{$totaldeliveryear} </label>
					</li>
					<li>
						<label class="name">Failed Order</label>
						<label class="count">{$totalfailedyear} </label>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!--Right Statistics-->
	<div class="col-sm-9">
		<div class="dashboardRightWrap">
			<div class="dashboardLeftCont">
				<ul class="dashLeftTopUl rightStatics">
					<li><a href="javascript:void(0);" id="index_user" class="active">All Orders</a></li>
					<li><a href="javascript:void(0);" id="index_restaurant">Pending Orders</a></li>
					<li><a href="javascript:void(0);" id="index_revenue">Processing Orders</a></li>
					<li><a href="javascript:void(0);" id="index_last10orders">Delivered Orders</a></li>
					<li><a href="javascript:void(0);" id="index_top10rest">Failed Orders</a></li>
				</ul>
				
				{******************** All Orders **********************}
				<div class="dashRightBottom indexRightTabContent" id="index_user_content">
					{$objAdminMgmt->restaurantDashboardLastOrders()}
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
						<tbody>
							<tr class="orderInnerHead">
								<td class="orderHeading1" width="10%">S.no</td>
								<td class="orderHeading1" width="15%">Name</td>
								<td class="orderHeading1" width="15%">Order Number</td>
								<td class="orderHeading1" width="15%">Total Price</td>
								<td class="orderHeading1" width="20%">Order At</td>
							</tr>
							{assign var=i value=1}
							{section name="last" loop=$ordersList_allorder max=10}
							<tr class="orderInnerCont">
								<td>{$i++}</td>
								<td>{$ordersList_allorder[last].customername|ucfirst|stripslashes}</td>
								<td>{$ordersList_allorder[last].ordergenerateid}</td>
								<td>{$currency}&nbsp;{$ordersList_allorder[last].ordertotalprice}</td>
								<td>{$ordersList_allorder[last].orderdate|date_format:"%d-%m-%Y %H:%M"}</td>
							</tr>
							{sectionelse}
							<tr>
								<td></td>
								<td style="margin-left:100px; color:red;">No Record Found</td>
							</tr>
							{/section}
						</tbody>
					</table>
				</div>
				{******************** Pending Orders **********************}
				<div class="dashRightBottom indexRightTabContent" id="index_restaurant_content" style="display:none;">
					{$objAdminMgmt->restaurantDashboardPendingOrderInfo()}
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
						<tbody>
							<tr class="orderInnerHead">
								<td class="orderHeading1" width="15%">S.no</td>
								<td class="orderHeading1" width="15%">Name</td>
								<td class="orderHeading1" width="15%">Order Number</td>
								<td class="orderHeading1" width="15%">Total Price</td>
								<td class="orderHeading1" width="15%">Order At</td>
							</tr>
							{assign var=i value=1}
							{section name="last" loop=$ordersList_pendingorder max=10}
							<tr class="orderInnerCont">
								<td>{$i++}</td>
								<td>{$ordersList_pendingorder[last].customername|ucfirst|stripslashes}</td>
								<td>{$ordersList_pendingorder[last].ordergenerateid}</td>
								<td>{$currency}&nbsp;{$ordersList_pendingorder[last].ordertotalprice}</td>
								<td>{$ordersList_pendingorder[last].orderdate|date_format:"%d-%m-%Y %H:%M"}</td>
							</tr>
							{sectionelse}
							<tr>
								<td></td>
								<td style="margin-left:100px; color:red;">No Record Found</td>
							</tr>
							{/section}
						</tbody>
					</table>
				</div>
				{******************** Processing Orders **********************}
				<div class="dashRightBottom indexRightTabContent" id="index_revenue_content" style="display:none;">
					{$objAdminMgmt->restaurantDashboardProcessingOrderInfo()}
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
						<tbody>
							<tr class="orderInnerHead">
								<td class="orderHeading1" width="15%">S.no</td>
								<td class="orderHeading1" width="15%">Name</td>
								<td class="orderHeading1" width="15%">Order Number</td>
								<td class="orderHeading1" width="15%">Total Price</td>
								<td class="orderHeading1" width="15%">Order At</td>
							</tr>
							{assign var=i value=1}
							{section name="last" loop=$ordersList_processingorder max=10}
							<tr class="orderInnerCont">
								<td>{$i++}</td>
								<td>{$ordersList_processingorder[last].customername|ucfirst|stripslashes}</td>
								<td>{$ordersList_processingorder[last].ordergenerateid}</td>
								<td>{$currency}&nbsp;{$ordersList_processingorder[last].ordertotalprice}</td>
								<td>{$ordersList_processingorder[last].orderdate|date_format:"%d-%m-%Y %H:%M"}</td>
							</tr>
							{sectionelse}
							<tr>
								<td></td>
								<td style="margin-left:100px; color:red;">No Record Found</td>
							</tr>
							{/section}
						</tbody>
					</table>
				</div>
				{******************** Delivered **********************}
				<div class="dashRightBottom indexRightTabContent" id="index_last10orders_content" style="display:none;">
				{$objAdminMgmt->restaurantDashboardDeliveredOrderInfo()}
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
						<tbody>
							<tr class="orderInnerHead">
								<td class="orderHeading1" width="15%">S.no</td>
								<td class="orderHeading1" width="15%">Name</td>
								<td class="orderHeading1" width="15%">Order Number</td>
								<td class="orderHeading1" width="15%">Total Price</td>
								<td class="orderHeading1" width="15%">Order At</td>
							</tr>
							{assign var=i value=1}
							{section name="last" loop=$ordersList_deliveredorder max=10}
							<tr class="orderInnerCont">
								<td>{$i++}</td>
								<td>{$ordersList_deliveredorder[last].customername|ucfirst|stripslashes}</td>
								<td>{$ordersList_deliveredorder[last].ordergenerateid}</td>
								<td>{$currency}&nbsp;{$ordersList_deliveredorder[last].ordertotalprice}</td>
								<td>{$ordersList_deliveredorder[last].orderdate|date_format:"%d-%m-%Y %H:%M"}</td>
							</tr>
							{sectionelse}
							<tr>
								<td></td>
								<td style="margin-left:100px; color:red;">No Record Found</td>
							</tr>
							{/section}
						</tbody>
					</table>
				</div>
				{******************** Top 10 Discount Restaurants **********************}
				<div class="dashRightBottom indexRightTabContent" id="index_top10rest_content" style="display:none;">
				{$objAdminMgmt->restaurantDashboardFailedOrderInfo()}
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
						<tbody>
							<tr class="orderInnerHead">
								<td class="orderHeading1" width="15%">S.no</td>
								<td class="orderHeading1" width="15%">Name</td>
								<td class="orderHeading1" width="15%">Order Number</td>
								<td class="orderHeading1" width="15%">Total Price</td>
								<td class="orderHeading1" width="15%">Order At</td>
							</tr>
							{assign var=i value=1}
							{section name="last" loop=$ordersList_failedorder max=10}
							<tr class="orderInnerCont">
								<td>{$i++}</td>
								<td>{$ordersList_failedorder[last].customername|ucfirst|stripslashes}</td>
								<td>{$ordersList_failedorder[last].ordergenerateid}</td>
								<td>{$currency}&nbsp;{$ordersList_failedorder[last].ordertotalprice}</td>
								<td>{$ordersList_failedorder[last].orderdate|date_format:"%d-%m-%Y %H:%M"}</td>
							</tr>
							{sectionelse}
							<tr>
								<td></td>
								<td style="margin-left:100px; color:red;">No Record Found</td>
							</tr>
							{/section}
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>	

