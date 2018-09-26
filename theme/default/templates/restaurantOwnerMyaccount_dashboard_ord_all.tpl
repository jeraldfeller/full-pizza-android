	{*
	<div class="myAccntTopMiddleBtm">
		<ul class="dashLeftBottomUl">
			<li>
				<label class="sno">{$LANG.res_myaccount_dashsno}</label>
				<label class="menu">{$LANG.res_myaccount_dashorderno}</label>
				<label class="name1">{$LANG.res_myaccount_dashname}</label>
				<label class="name1">{$LANG.res_myaccount_dashprice}</label>
			</li>
			{assign var=i value=1}
			{section name="allorder" loop=$ordersList_allorder max=5}
			<li>
				<label class="sno">{$i++}</label>
				<label class="menu">{$ordersList_allorder[allorder].ordergenerateid}</label>
				<label class="name1">{$ordersList_allorder[allorder].customername|ucfirst|stripslashes}</label>
				<label class="name1"><span class="rupeeImg1">{$currency}</span><span class="rupeePrice1">{$ordersList_allorder[allorder].ordertotalprice}</span></label>
			</li>
			{/section}
		</ul>
		{if $ordersList_allorderCnt gt 5}
		<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_order.php{else}restaurant-myaccount-order{/if}" class="myAccntViewMore" >{$LANG.res_myaccount_dashview}</a>
		{/if}
	</div>
	*}
	
	<div class="myAccntTopMiddleBtm">
		<table class="dashLeftBottomUl table table-hover table-striped">
			<tr>
				<th width="20%"><span class="sno">{$LANG.res_myaccount_dashsno}</span></th>
				<th width="30%"><span class="menu">{$LANG.res_myaccount_dashorderno}</span></th>
				<th width="25%"><span class="name1">{$LANG.res_myaccount_dashname}</span></th>
				<th width="25%"><span class="name1">{$LANG.res_myaccount_dashprice}</span></th>
			</tr>
			{assign var=i value=1}
			{section name="allorder" loop=$ordersList_allorder max=5}
			<tr>
				<td><span class="sno">{$i++}</span></td>
				<td><span class="menu">{$ordersList_allorder[allorder].ordergenerateid}</span></td>
				<td><span class="name1">{$ordersList_allorder[allorder].customername|ucfirst|stripslashes}</span></td>
				<td><span class="name1">{$currency} {$ordersList_allorder[allorder].ordertotalprice}</span></td>
			</tr>
			{sectionelse}
			<tr>
			<td colspan="4" align="center" style="color:red;">{$LANG.res_myaccount_dashboard_deliver_no}</td>
			</tr>
			{/section}
		</table>
		{if $ordersList_allorderCnt gt 5}
		<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_order.php{else}restaurant-myaccount-order{/if}" class="myAccntViewMore" >{$LANG.res_myaccount_dashview}</a>
		{/if}
	</div>