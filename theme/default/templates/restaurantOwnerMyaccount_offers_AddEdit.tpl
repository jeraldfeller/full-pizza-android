

<!-- Offers add new start -->
<div class="detailsInnerNewWrap">
<h1 class="restOwnMyHead">{$LANG.res_myaccount_offer}</h1>
<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount_offers.php{else}restaurant-myaccount-offers{/if}" class="addbtn pull-right"><i class="glyphicon glyphicon-arrow-left marRight"></i>{$LANG.res_myaccount_offerback}</a>
<hr class="heading-hr">
<div class="clr"></div>
	<div class="ownerStaticContainer">
	<form name="offerAddEdit" method="post" action="{if $smarty.get.offer_id neq ''}restaurantOwnerMyaccount_offers_AddEdit.php?offer_id={$smarty.get.offer_id}{/if}" onsubmit="{if $smarty.get.offer_id neq ''}return editRestaurantOffer();{else}return addNewRestaurantOffer();{/if}">	
        <input type="hidden" name="offerid" value="{$smarty.get.offer_id}" id="offerid"/>
        <input type="hidden" name="action" id="action" value="{if $smarty.get.offer_id neq ''}Edit{else}Add{/if}" />
		<div class="mandatoryField">
			<span class="yellowStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>
			- {$LANG.res_myaccount_offermandatory}
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">&nbsp;</span>
			<span class="colon1">&nbsp;</span>
			<div id="offer_errormsg"></div>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont"><span class="yellowStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>{$LANG.res_myaccount_offerpercentage}</span>
			<span class="colon1">:</span>
			<input class="textbox numericfield" type="text" name="offer_percentage" id="offer_percentage" value="{if $smarty.get.offer_id neq ''}{$offerValue.0.offer_percentage}{/if}" />
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont"><span class="yellowStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>{$LANG.res_myaccount_offerprice}</span>
			<span class="colon1">:</span>
			<input class="textbox numericfield" type="text" name="offer_price" id="offer_price" value="{if $smarty.get.offer_id neq ''}{$offerValue.0.offer_price}{/if}" />
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont"><span class="yellowStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>{$LANG.res_myaccount_offervalidfrom}</span>
			<span class="colon1">:</span>
			<div class="input-group date offerdateAln">
				<input class="offer_valid_from form-control" name="offer_valid_from" id="offer_valid_from" type="text" value="{if $smarty.get.offer_id neq ''}{$offerValue.0.offer_valid_from|date_format:"%d-%m-%Y"}{/if}" />
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</span>
			</div>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont"><span class="yellowStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>{$LANG.res_myaccount_offervalidto}</span>
			<span class="colon1">:</span>
			<div class="input-group date offerdateAln">
				<input class=" offer_valid_to form-control" name="offer_valid_to" id="offer_valid_to" type="text" value="{if $smarty.get.offer_id neq ''}{$offerValue.0.offer_valid_to|date_format:"%d-%m-%Y"}{/if}" />
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</span>
			</div>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">&nbsp;</span>
			<span class="colon1">&nbsp;</span>
			
					<input type="submit" class="myaccsubmitbtn" value="{$LANG.res_myaccount_offeraddsubmit}" />
				
		</div> 
        </form>
	</div>
</div>

<!-- Offers add new end -->

