<div class="byCuisine">
	<div class="bandHead bandNew">{$LANG.home_topresby_location}</div>
	<div class="byCuisineTop"></div>
	<div class="byCuisineMiddle">
		<!--Cities-->
		<div class="byLocationInner">
			<h1 class="byLocateHead">{$LANG.home_most_popular_cities} :</h1>
				
			<ul class="byLocatePopularUl">
			{section name="cty" loop=$topRestLocation_cities max=40}
				<li {if $smarty.section.cty.rownum is div by 4}class="last"{/if} ><a href="{$SITE_BASEURL}/restaurantCityInnerpage.php?cityname={$topRestLocation_cities[cty].city_seourl}">{$topRestLocation_cities[cty].cityname|ucfirst|stripslashes} </a></li>
				
				<!--<li {if $smarty.section.area.last}class="last"{/if} ><a href="{$SITE_BASEURL}/searchResult.php?area={$topRestLocation_areas[area].area_seourl}">{$topRestLocation_areas[area].areaname|ucfirst|stripslashes} </a></li>-->
			{/section}
			</ul>
		</div>
		<!--Areas-->
		{if $smarty.section.topRestLocation_areas.areas_noofcnt neq '0'}
		<div class="byLocationInnerNew">
			<h1 class="byLocateHead">{$LANG.home_areas} :</h1>
			<ul class="byLocCityUl">
			{section name=area loop=$topRestLocation_areas}
				<!--<li><a href="{$SITE_BASEURL}/restaurant_innerpage.php?areaname={$topRestLocation_areas[area].area_seourl}">{$topRestLocation_areas[area].areaname|ucfirst|stripslashes} ({$topRestLocation_areas[area].areas_noofcnt})</a></li>-->
				
					<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}searchResult.php?area={$topRestLocation_areas[area].area_seourl}{else}s/{$topRestLocation_areas[area].area_seourl}{/if}">{$topRestLocation_areas[area].areaname|ucfirst|stripslashes} {*({$topRestLocation_areas[area].areas_noofcnt})*}</a></li>
			{/section}
			</ul>
		</div>
		{/if}
	</div>
	<div class="byCuisineBottom"></div>
</div>