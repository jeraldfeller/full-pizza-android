<div class="searchResultInner">
	<div class="detailsInnerNewWrap">
		<div id="detailsRightRelated">
			<div class="restDetInfo1Inner clearfix">
				<div class="newOfferLeft">
					<h1 class="offerDealCouponHead">{$LANG.res_details_offer}</h1>
					<span class="offerDealCouponCont">{$LANG.res_details_offerperorder}</span>
					
					{section name="off" loop=$percentage_show}
					<div class="offerSaveOption">
						<img src="{$SITE_IMAGE_URL}/coupon_icon_menu.png" alt="" title="" />
						<div class="offerSaveTextNew col-sm-10 pull-right">
							<!--<span class="percentOffer">{$percentage_show[off].offer_percentage}{$LANG.res_book_offer_off}</span>-->
                            
                            {if $percentage_show[off].offer_valprice eq '1'}
                            <span class="percentOfferImg1">{$percentage_show[off].offer_percentage|number_format:0} {$LANG.res_book_offer_off}</span>
                            {else}                    
							<span class="percentOfferImg1">{$percentage_show[off].offer_percentage}  {$LANG.res_book_offer_off}</span>
                            {/if}	
                            							
							<span class="percentOfferFree">{$LANG.res_book_offer_free}!</span>
							<!--<span class="offerDealCouponCont">{$percentage_show[off].offer_percentage}{$LANG.res_book_offer_off} {$percentage_show[off].offer_price}{$LANG.res_book_or_more}.</span>-->
                             {if $percentage_show[off].offer_valprice eq '1'}
                            <span class="offerDealCouponCont">{$percentage_show[off].offer_percentage|number_format:0}{$LANG.res_book_offer_off} {$percentage_show[off].offer_price}{$LANG.res_book_or_more}.</span>
                            {else}                    
						<span class="offerDealCouponCont">{$percentage_show[off].offer_percentage}{$LANG.res_book_offer_off} {$percentage_show[off].offer_price}{$LANG.res_book_or_more}.</span>
                            {/if}	
						</div>
					</div>
					{sectionelse}
						<p class="text-danger text-center">{$LANG.res_details_offerno}</p>
					{/section}
				</div>
			</div>
				{*<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-right">
				<h1 class="detailsRightHead borderbox">{$searchrestaurantDetails.0.restaurant_name|ucfirst|stripslashes} {$LANG.res_details_offerorder}</h1>
				<div class="detailsRightMiddle1 borderbox">
				<form name="checkoutpage" method="post" action="checkout.php" >
					<input type="hidden" name="minimumorder" id="minimumorder" value="{$searchrestaurantDetails.0.restaurant_minorder_price}"/>
					<input type="hidden" name="total" id="totalprice" value="{$total}"/>
					<input type="hidden" name="resid" id="resid" value="{$smarty.request.resid}"/>
					<div class="restaurantMenuAddtocartmm">
					{include file='cart.tpl'}
					</div>
				</form>	
				</div>
			</div>*}
		</div>
	</div>
</div>