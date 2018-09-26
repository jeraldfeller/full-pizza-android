							<div class="myAccntTopMiddleBtm">
							<ul class="dashLeftBottomUl">
								<li>
									<label class="sno">{$LANG.res_myaccount_dashsno}</label>
									<label class="menu">{$LANG.res_myaccount_dashorderno}</label>
									<label class="name1">{$LANG.res_myaccount_dashname}</label>
									<label class="name1">{$LANG.res_myaccount_dashprice}</label>
								</li>
								{assign var=i value=1}
								{section name="processorder" loop=$ordersList_processingorder max=5}
								<li>
									<label class="sno">{$i++}</label>
									<label class="menu">{$ordersList_processingorder[processorder].ordergenerateid}</label>
									<label class="name1">{$ordersList_processingorder[processorder].customername|ucfirst|stripslashes}</label>
									<label class="name1"><span class="rupeeImg1">{$currency}</span><span class="rupeePrice1">{$ordersList_processingorder[processorder].ordertotalprice}</span></label>
								</li>
								{sectionelse}
								<li>
								<span style=" color:red;">No Record Found</span>
								</li>
								{/section}
							</ul>
							{if $ordersList_processingorderCnt gt 5}
							<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_order.php?sortbystatus=processing{else}restaurant-myaccount-order/processing{/if}" class="myAccntViewMore" onclick="return dashboardSortbyStatus('processing','Order');">{$LANG.res_myaccount_dashview}</a>
							{/if}
						</div>