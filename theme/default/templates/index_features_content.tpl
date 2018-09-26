<div class="featureInner">
	<div class="byFeature">
		<div class="bandHeadFeature">
			<span class="featureFont">{$LANG.home_featured}</span>
			<span class="flt">{$LANG.home_res_hot_offers}</span>
		</div>
		<div class="featureTop"></div>
		<div class="featureMiddle">
			{section name="hotoffer" loop=$featureRestaurantHotoffersList}
				<div class="featureWrap">
					<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantDetails.php?resid={$featureRestaurantHotoffersList[hotoffer].restaurant_id}&amp;resname={$featureRestaurantHotoffersList[hotoffer].restaurant_seourl}{else}menu/{$featureRestaurantHotoffersList[hotoffer].restaurant_id}/{$featureRestaurantHotoffersList[hotoffer].restaurant_seourl}{/if}" class="featureWrapImg">
						{if $featureRestaurantHotoffersList[hotoffer].restaurant_logo neq ''}
							<img src="{$SITE_IMAGE_RESTAURANT_URL}/logo/{$featureRestaurantHotoffersList[hotoffer].restaurant_logo}" alt="{$featureRestaurantHotoffersList[hotoffer].restaurant_name|stripslashes}" title="{$featureRestaurantHotoffersList[hotoffer].restaurant_name|stripslashes}" width="95" height="67"/>
						{else}
							<img src="{$SITE_IMAGE_URL}/no-image.jpg" alt="" title=""   width="95" height="67"  />
						{/if}
					</a>
					<div class="featureWrapTxt">
						<span class="featureTextNew"><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantDetails.php?resid={$featureRestaurantHotoffersList[hotoffer].restaurant_id}&amp;resname={$featureRestaurantHotoffersList[hotoffer].restaurant_seourl}{else}menu/{$featureRestaurantHotoffersList[hotoffer].restaurant_id}/{$featureRestaurantHotoffersList[hotoffer].restaurant_seourl}{/if}">{$featureRestaurantHotoffersList[hotoffer].restaurant_name|stripslashes}</a></span>
						<span class="featureTextNew">
							<img src="{$SITE_IMAGE_URL}/non.png" alt="Non-Veg" title="Non-Veg" class="flt" />
							<img src="{$SITE_IMAGE_URL}/veg.png" alt="Veg" title="Veg" class="flt" />
						</span>
						<div class="featureWrapOff">
							<span class="offerBghover">{$featureRestaurantHotoffersList[hotoffer].exp_per[0]}% {$LANG.home_feature_off}</span>
							<div class="offerBg">
								<span class="offerBgTop"></span>
								<span class="offerBgMiddle">
									<b class="flt">{$LANG.home_feature_get} {$featureRestaurantHotoffersList[hotoffer].exp_per[0]}% {$LANG.home_feature_off}</b>
									<span class="flt"> {$LANG.home_feature_with} {$featureRestaurantHotoffersList[hotoffer].offer_price} {$LANG.home_feature_ormore}.</span>
									<!--<span class="flt">Use Coupon Code: <b>{$featureRestaurantHotoffersList[hotoffer].offer_id}</b></span>-->
								</span>
								<span class="offerBgDown"></span>
							</div>
						</div>
					</div>
					
					<div class="featureWrapOrder">
						<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantDetails.php?resid={$featureRestaurantHotoffersList[hotoffer].restaurant_id}&amp;resname={$featureRestaurantHotoffersList[hotoffer].restaurant_seourl}{else}menu/{$featureRestaurantHotoffersList[hotoffer].restaurant_id}/{$featureRestaurantHotoffersList[hotoffer].restaurant_seourl}{/if}" class="featureOrder">{$LANG.home_ordernow}</a>
						<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantDetails.php?resid={$featureRestaurantHotoffersList[hotoffer].restaurant_id}&amp;resname={$featureRestaurantHotoffersList[hotoffer].restaurant_seourl}{else}menu/{$featureRestaurantHotoffersList[hotoffer].restaurant_id}/{$featureRestaurantHotoffersList[hotoffer].restaurant_seourl}{/if}" class="featureOrder">{$LANG.home_viewmenu}</a>
					</div>
				</div>
			{/section}
		</div>
		<div class="featureBottom"></div>
	</div>
	<!-- Table Booking -->
	<div class="byFeature">
		<div class="bandHeadFeature">
			<span class="featureFont">{$LANG.home_featured}</span>
			<span class="flt">{$LANG.home_restauraunts}</span>
		</div>
		<div class="featureTop"></div>
		<div class="featureMiddle">
		{section name="tablebook" loop=$featurerestaurantTableBookingList}
			<div class="featureWrap">
				<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantDetails.php?resid={$featurerestaurantTableBookingList[tablebook].restaurant_id}&amp;resname={$featurerestaurantTableBookingList[tablebook].restaurant_seourl}{else}menu/{$featurerestaurantTableBookingList[tablebook].restaurant_id}/{$featurerestaurantTableBookingList[tablebook].restaurant_seourl}{/if}" class="featureWrapImg">
					{if $featurerestaurantTableBookingList[tablebook].restaurant_logo neq ''}
						<img src="{$SITE_IMAGE_RESTAURANT_URL}/logo/{$featurerestaurantTableBookingList[tablebook].restaurant_logo}" alt="{$featurerestaurantTableBookingList[tablebook].restaurant_name|stripslashes}" title="{$featurerestaurantTableBookingList[tablebook].restaurant_name|stripslashes}" width="95" height="67" />
					{else}
						<img src="{$SITE_IMAGE_URL}/no-image.jpg" alt="" title=""  width="95" height="67" />
					{/if}
				</a>
				<div class="featureWrapTxt2">
					<span class="featureTextNew"><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantDetails.php?resid={$featurerestaurantTableBookingList[tablebook].restaurant_id}&amp;resname={$featurerestaurantTableBookingList[tablebook].restaurant_seourl}{else}menu/{$featurerestaurantTableBookingList[tablebook].restaurant_id}/{$featurerestaurantTableBookingList[tablebook].restaurant_seourl}{/if}" class="flt">{$featurerestaurantTableBookingList[tablebook].restaurant_name|stripslashes}</a></span>
				</div>
				<div class="featureWrapOrder">
					<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantDetails.php?resid={$featurerestaurantTableBookingList[tablebook].restaurant_id}&amp;resname={$featurerestaurantTableBookingList[tablebook].restaurant_seourl}{else}menu/{$featurerestaurantTableBookingList[tablebook].restaurant_id}/{$featurerestaurantTableBookingList[tablebook].restaurant_seourl}{/if}" class="featureOrder">{$LANG.home_ordernow}</a>
					<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantDetails.php?resid={$featurerestaurantTableBookingList[tablebook].restaurant_id}&amp;resname={$featurerestaurantTableBookingList[tablebook].restaurant_seourl}{else}menu/{$featurerestaurantTableBookingList[tablebook].restaurant_id}/{$featurerestaurantTableBookingList[tablebook].restaurant_seourl}{/if}" class="featureOrder">{$LANG.home_viewmenu}</a>
				</div>
			</div>	
		{/section}
		</div>
		<div class="featureBottom"></div>
	</div>
	<div class="byFeature">
		<div class="bandHead">{$LANG.home_how_it_works}</div>
		<div class="featureTop"></div>
		<div class="featureMiddle heightnew">
			<ul class="howItworksUl">
				<!--<li><a href="javascript:void(0);">» {$LANG.home_buffet_search}</a></li>-->
				<li><a href="{$SITE_BASEURL}/restaurant_innerpage.php?browse=area">&raquo; {$LANG.home_res_by_location}</a></li>
				<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurant_innerpage.php?browse=cuisine{else}restaurants/cuisine{/if}">&raquo; {$LANG.home_res_by_cuisine}</a></li>
			</ul>
			<a href="javascript:void(0);" class="howItWorkBanner"><img src="{$SITE_IMAGE_URL}/howitworks-banner.png" alt="" title="" /></a>
		</div>
		<div class="featureBottom"></div>
	</div>
</div>