							<div class="myAccntTopMiddleBtm">
								<table class="dashLeftBottomUl">
									<tr>
										<th width="20%"><label class="sno">{$LANG.res_myaccount_dashsno}</label></th>
										<th width="30%"><label class="menu">{$LANG.res_myaccount_dashorderno}</label></th>
										<th width="25%"><label class="name1">{$LANG.res_myaccount_dashname}</label></th>
										<th width="25%"><label class="name1">{$LANG.res_myaccount_dashprice}</label></th>
									</tr>
									{assign var=i value=1}
									{section name="deliverorder" loop=$ordersList_deliveredorder max=5}
									<tr>
										<td><label class="sno">{$i++}</label></td>
										<td><label class="menu">{$ordersList_deliveredorder[deliverorder].ordergenerateid}</label></td>
										<td><label class="name1">{$ordersList_deliveredorder[deliverorder].customername|ucfirst|stripslashes}</label></td>
										<td><label class="name1">{$currency} {$ordersList_deliveredorder[deliverorder].ordertotalprice}</label></td>
									</tr>
									{sectionelse}
									<tr>
									<td colspan="4" align="center" style="color:red;">{$LANG.res_myaccount_dashboard_deliver_no}</td>
									</tr>
									{/section}
								</table>
								{if $ordersList_deliveredorderCnt gt 5}
								<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_order.php?sortbystatus=completed{else}restaurant-myaccount-order/completed{/if}" class="myAccntViewMore" >{$LANG.res_myaccount_dashview}</a>
								{/if}
							</div>