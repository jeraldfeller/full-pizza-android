{if $topRestByCuisineTotal gt 0}
	<div class="customerLeftBox clearfix">
		<h1 class="customSignupHead">{$LANG.home_topresby_cuisine}</h1>
		<div class="byCuisineMiddle">
			{section name=cui loop=$topRestByCuisineList max=5}
				<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantCuisineInnerpage.php?cuisine={$topRestByCuisineList[cui].cuisine_seourl}{else}c/{$topRestByCuisineList[cui].cuisine_seourl}{/if}" class="byFoodImg">
					<span class="flt"><img src="{$SITE_IMAGE_CUISINE_URL}/{$topRestByCuisineList[cui].cuisine_photo}" alt="{$topRestByCuisineList[cui].cuisine_name|stripslashes}" title="{$topRestByCuisineList[cui].cuisine_name|stripslashes}" /></span>
					<span class="homeCuisineRed"></span>
					<span class="foodName">+ {$topRestByCuisineList[cui].cuisine_name|stripslashes}</span>
				</a>
			{/section}
			<a href="{$SITE_BASEURL}/restaurant_innerpage.php?browse=cuisine" class="viewMoreCuisine">{$LANG.home_viewmore_cuisine}</a>
		</div>
	</div>
{/if}