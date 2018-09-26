						<div class="myAccntTopMiddleBtm">
							<table class="dashLeftBottomUl">
								<tr>
									<th width="20%"><label class="sno">{$LANG.res_myaccount_dashsno}</label></th>
									<th width="30%"><label class="menu">{$LANG.res_myaccount_dashorderno}</label></th>
									<th width="25%"><label class="name1">{$LANG.res_myaccount_dashname}</label></th>
									<th width="25%"><label class="name1">{$LANG.res_myaccount_dashprice}</label></th>
								</tr>
								{assign var=i value=1}
								{section name="failorder" loop=$ordersList_failedorder max=5}
								<tr>
									<td><label class="sno">{$i++}</label></td>
									<td><label class="menu">{$ordersList_failedorder[failorder].ordergenerateid}</label></td>
									<td><label class="name1">{$ordersList_failedorder[failorder].customername|ucfirst|stripslashes}</label></td>
									<td><label class="name1">{$currency} {$ordersList_failedorder[failorder].ordertotalprice}</label></td>
								</tr>
								{sectionelse}
								<tr>
								<td style="color:red;" colspan="4" align="center">{$LANG.res_myaccount_dashboard_failed_no}</td></tr>
								{/section}
							</table>
							{if $ordersList_failedorderCnt gt 5}
							<a href="{$SITE_BASEURL}/{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_order.php?sortbystatus=failed{else}restaurant-myaccount-order/failed{/if}" class="myAccntViewMore" onclick="return dashboardSortbyStatus('failed','Order');">{$LANG.res_myaccount_dashview}</a>
							{/if}
						</div>