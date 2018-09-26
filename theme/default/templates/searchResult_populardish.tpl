<div class="restInfoPopContInner borderbox">
	<h1 class="restInfo1HeadNew">{$LANG.search_popularhead}</h1>
	{$objSearchResult->popularDishList($searchrestaurantList[searchRest].restaurant_id)}
	
	<div class="restInfoPopAddress">
		<ul class="restInfoPopDayUl">
		{section name=dish loop=$populardishlist}
			<li>
				<label class="dishName">{$populardishlist[dish].menu_name|ucfirst|stripslashes}</label>
				<label class="dishPrice">{$currency}&nbsp;{$populardishlist[dish].menu_price}</label>
				<span class="restInfoPopAddress">{$populardishlist[dish].menu_description|stripslashes}</span>
			</li>
		{/section}
		</ul>
	</div>
</div>
<!--Right side Restaurant Info End-->