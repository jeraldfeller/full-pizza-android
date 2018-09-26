<!-- Search By Cuisine start -->
<div class="byCuisine customFood">
	<div class="byCuisineTop"></div>
	<div class="byCuisineMiddle">
		<div class="byLocationInnerNew">
			{section name=cui loop=$topRestByCuisineList max=5}
			<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantCuisineInnerpage.php?cuisine={$topRestByCuisineList[cui].cuisine_seourl}{else}cuisine/{$topRestByCuisineList[cui].cuisine_seourl}{/if}" class="byFoodImg">
				<span class="flt"><img src="{$SITE_IMAGE_CUISINE_URL}/{$topRestByCuisineList[cui].cuisine_photo}" alt="{$topRestByCuisineList[cui].cuisine_name|stripslashes}" title="{$topRestByCuisineList[cui].cuisine_name|stripslashes}" /></span>
				<span class="homeCuisineRed"></span>
				<span class="foodName">+ {$topRestByCuisineList[cui].cuisine_name|stripslashes}</span>
			</a>
			{/section}
		</div>
	</div>
	<div class="byCuisineBottom"></div>
</div>