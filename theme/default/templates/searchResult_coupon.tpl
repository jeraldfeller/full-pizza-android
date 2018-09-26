<!--Right side Restaurant Info Start-->
<div class="restInfoPopContInner borderbox">
	<h1 class="restInfo1HeadNew">{$LANG.search_coupons}</h1>
	{$objSearchResult->searchCouponsList($searchrestaurantList[searchRest].restaurant_id)}
	
	<div class="restInfoPopAddress">
		<ul class="restInfoPopDayUl">
		{section name=offer loop=$searchcouponlist}
			<li>
				<label class="dishName1">{$searchcouponlist[offer].offer_percentage} %</label>
				<span class="restInfoPopAddress">{$searchcouponlist[offer].offer_percentage} % {$LANG.home_purchase_off} &nbsp; {$currency}&nbsp; {$searchcouponlist[offer].offer_price} {$LANG.home_or_more}.</span>
			</li>
		{/section}
		</ul>
	</div>
</div>
<!--Right side Restaurant Info End-->