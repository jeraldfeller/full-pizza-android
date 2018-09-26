						<div class="myAccntTopMiddleBtm">
							<table class="dashLeftBottomUl table table-hover table-striped">
							<tr>
								<th width="20%"><span class="sno">{$LANG.res_myaccount_dashsno}</span></th>
								<th width="30%"><span class="menu">{$LANG.res_myaccount_dashorderno}</span></th>
								<th width="25%"><span class="name1">{$LANG.res_myaccount_dashname}</span></th>
								<th width="25%"><span class="name1">{$LANG.res_myaccount_dashprice}</span></th>
							</tr>
							{assign var=i value=1}
							{section name="pendingorder" loop=$ordersList_pendingorder max=5}
							<tr>
								<td><span class="sno">{$i++}</span></td>
								<td><span class="menu">{$ordersList_pendingorder[pendingorder].ordergenerateid}</span></td>
								<td><span class="name1">{$ordersList_pendingorder[pendingorder].customername|ucfirst|stripslashes}</span></td>
								<td><span class="name1">{$currency} {$ordersList_pendingorder[pendingorder].ordertotalprice}</span></td>
							</tr>
							{sectionelse}
							<tr>
							<td style="color:red;" colspan="4" align="center">{$LANG.res_myaccount_dashboard_pending_no}</tr>
							</tr>
							{/section}
						</table>
						{if $ordersList_pendingorderCnt gt 5}
						<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_order.php?sortbystatus=pending{else}restaurant-myaccount-order/pending{/if}" class="myAccntViewMore" onclick="return dashboardSortbyStatus('pending','Order');">{$LANG.res_myaccount_dashview}</a>
						{/if}
					</div>