<div class="contain">
	<div style="background: white;" class="cart_details col-md-12 col-xs-12 col-sm-12">
		<p style="font-size: x-large !important;" class="AgentOrange">my cart</p>

		<div class="reticulaInterna"></div>

    	<input type="hidden" name="deliverytype" id="ordoption" value="{$smarty.request.ordoption}" />
		
		<ul class="detRiteNewCont1Ul ulBg">
			<li class="item no-border"><label class="bgNew">{$LANG.res_details_item}</label></li>
			<li class="Qty"><label class="bgNew">{$LANG.res_details_qty}</label></li>
			<li class="price"><label class="bgNew">{$LANG.res_details_price}</label></li>
			<!-- <li class="del"><label class="bgNew">{$LANG.res_details_del}</label></li> -->
		</ul>	
		<div class="cartitem-list">		
		{section name=cart loop=$cartDetails}
			<div class="ulcartwrap" id="{$cartDetails[cart].menuid}">
				<input type="hidden" name="menu" id="menuid{$smarty.section.cart.rownum}" value="{$cartDetails[cart].menuid}" />
				<input type="hidden" name="cart" id="cartid{$smarty.section.cart.rownum}" value="{$cartDetails[cart].cart_id}" />
		              
				<ul class="detRiteNewCont1Ul">
					<li class="item">		
						<label class="{if $cartDetails[cart].menutype eq 'veg'}contNew1{else}contNew1{/if}">{$cartDetails[cart].menuname|ucfirst|stripslashes|html_entity_decode}{if $cartDetails[cart].pizza_size neq ''} <small>({$cartDetails[cart].pizza_size})</small>{/if} </label>
					</li>
					<li class="Qty"><label class="{if $cartDetails[cart].menutype eq 'veg'}contNew1{else}contNew1{/if}"> 
                        <img src="{$SITE_IMAGE_URL}/Remove_number.png" alt="" title="" style="cursor:pointer;width: 25%;margin-right: 10%;" onclick="return orderItemDecInc({$smarty.section.cart.rownum},'0');" />
						<span>{$cartDetails[cart].quantity} </span>
                        <img src="{$SITE_IMAGE_URL}/Add_number.png" alt="" title="" style="cursor:pointer;width: 25%;margin-right: 10%;" onclick="return orderItemDecInc({$smarty.section.cart.rownum},'1');" />
					</li>
					<li class="price"><label class="{if $cartDetails[cart].menutype eq 'veg'}contNew1{else}contNew1{/if}">{$cartDetails[cart].tot_menuprice}</label></li>
					<li class="del"><label class="delete" onclick="return deletecartItem({$cartDetails[cart].cart_id});"></label></li>
				
				{if $cartDetails[cart].pizza_crustname neq ''}
					<li class="deal_info_desc1">
						<div class="contain">{$LANG.res_addtocart_crust}:
						{$cartDetails[cart].pizza_crustname|stripslashes}&nbsp;</div>
					</li>
				{/if}
				{if $cartDetails[cart].pizza_addonsname neq ''}
					<li class="deal_info_desc1">
						<div class="contain">{$LANG.res_addtocart_topping}:
						{$cartDetails[cart].pizza_addonsname|stripslashes|html_entity_decode}&nbsp;</div>
					</li>
				{/if}
				{if $cartDetails[cart].addonsname neq ''}
					<li class="deal_info_desc1">
						<div class="contain">{$LANG.res_details_addons}:
						{$cartDetails[cart].addonsname|ucfirst|stripslashes}&nbsp;</div>
						<!--<span class="flt">{$cartDetails[cart].addonsname|ucfirst|stripslashes}&nbsp;({$currency}&nbsp;{$cartDetails[cart].addonsprice} Extra)</span>-->
					</li>
				{/if}
				<!-- {if $cartDetails[cart].specialinstruction neq ''}
					<li class="deal_info_desc1">
						<div class="contain"><b>{$LANG.res_details_instruction}:</b>
						<label class="instr">{$cartDetails[cart].specialinstruction|ucfirst|stripslashes}</label></div>
					</li>
				{/if} -->
				</ul>
			</div>
			{sectionelse}
			<span class="noOrderYet">{$LANG.res_details_noitem}</span>
		{/section}
		</div>
		
        
		<ul class="detRitePriceCont1Ul">
			<li>
				<label class="txt1">{$LANG.res_details_subtot}:</label>
				<label class="price1">{if $cartDetailsCnt gt 0 and $subtotal neq ''}{$subtotal|string_format:"%.2f"}{else}0.00{/if}</label>
			</li>
            {if $pointOffer gt 0}
                <li>
                    <label class="txt1">Reward offer price({$PointPercentage}%):</label>
    				<label class="price1">{$pointOffer}</label>
                </li>
            {/if}
			<li>
				<label class="txt1">{$LANG.res_details_notax}{if $salestax neq '0.00'}({$salestax} %){/if}:</label>
				<label class="price1">{if $cartDetailsCnt gt 0 and $salestax neq ''}{$taxamount|string_format:"%.2f"}{else}0.00{/if}</label>
			</li>
			{if $deliveryoption eq 'Yes'}
				<li id="deliveryShowCharge" {if (!isset($smarty.request.ordoption)) || ($deliveryoption eq 'Yes' && isset($smarty.request.ordoption) && $smarty.request.ordoption eq 'pickup')} style="display:none;" {/if}>
					<label class="txt1">{$LANG.res_details_delcharge}:</label>
                    {if $smarty.request.ordoption eq 'delivery' or $smarty.session.deliverypickup eq 'delivery'}
					   <label class="price1"><span class="color3">{if $cartDetailsCnt gt 0}{if $deliverycharge eq '0.00'}Free{else}{$deliverycharge}{/if}{else}0.00{/if}</span></label>
                    {else}
                         <label class="price1"><span class="color3">{if $cartDetailsCnt gt 0}{if $newdeliverycharge eq '0.00'}Free{else}{$newdeliverycharge}{/if}{else}0.00{/if}</span></label>
                    {/if}   
				</li> 
			{/if}
			<!--{if !empty($rest_offer_percentage)} 
				<li class="chooseCouponHeight">
					<div class="chooseCoupon offerCouponLft">Offers :</div>
						<div class="chooseCoupon offerCouponRht">
						<input type="text" value="{$rest_offer_percentage} % OFF" name="offerid" id="offerid" readonly>
					</div>
				</li>			
			{/if}-->
            {if !empty($rest_offer_percentage)}
            <input type="hidden" name="offer" id="offer" value="{$offer}" />
            {if $offervalue gt 0}
                <li>
                    <label class="txt1">{$LANG.res_details_discount} <span id="offerid">{$rest_offer_percentage} % OFF</span>:</label>
                    <label class="total1" id="total1" >{if $offervalue neq ''}- {$offervalue|string_format:"%.2f"}{else}0.00{/if}</label>
                </li>
            {/if}
            {/if}
            {if $smarty.session.voucherPrice neq ''}
                <li>
                    <label class="txt1">{*$LANG.res_details_discount*}Voucher Price:</label>
                    <label class="total1" id="total1" >- {$smarty.session.voucherPrice|string_format:"%.2f"}</label>
                </li>
            {/if}
            <li class="totalWithoutDelCharge" style="display:none;">
                <label class="txt1">{$LANG.res_details_total}:</label>
                <label class="total1" id="total1">{$currency} {if $cartDetailsCnt gt 0 and $total neq ''}{($total-$deliverycharge)|string_format:"%.2f"}{else}0.00{/if}</label>
            </li>
            <li class="totalWithDelCharge">
                <label class="txt1">{$LANG.res_details_total}:</label>
                <label class="total1" id="total1">{$currency} {if $cartDetailsCnt gt 0 and $total neq ''}{$total|string_format:"%.2f"}{else}0.00{/if}</label>
            </li>
		</ul>
    	<div style="display: none;" class="picdeliver">		
			{if $pickupoption eq 'Yes'}
				<div class="madInputPopup col-sm-6">
					<input type="radio" name="deliverypickup"  {if $smarty.session.deliverypickup neq '' && $smarty.session.deliverypickup eq 'pickup'}checked="checked"{elseif $pickupoption eq 'Yes' && $deliveryoption neq 'Yes' && $smarty.session.deliverypickup eq 'pickup' }checked="checked"{elseif $pickupoption eq 'Yes' && $deliveryoption eq 'No'}checked="checked"{/if} id="pickupopt" class="radio1 flt" value="pickup" onclick="pickupbutton();"/>
					{*<span class="detpickBag"><img src="{$SITE_IMAGE_URL}/pickup-icon.png" alt="" title="" /></span>*}
					<label for="pickupopt" class="deliPickName">{$LANG.res_details_pickup}</label>
				</div>
			{/if}
				
			{if $deliveryoption eq 'Yes'}
				<div class="madInputPopup  col-sm-6">
					<input type="radio" name="deliverypickup" id="deliveryopt" class="radio1 flt" {if $smarty.session.deliverypickup neq '' && $smarty.session.deliverypickup eq 'delivery'}checked="checked"{elseif $deliveryoption eq 'Yes' && $smarty.session.deliverypickup eq 'delivery'}checked="checked"{elseif $smarty.session.deliverypickup eq '' && $deliveryoption eq 'Yes'}checked="checked"{/if}  value="delivery" onclick="deliverybutton();"/>
					{*<span class="detpickVan"><img src="{$SITE_IMAGE_URL}/delivery-icon.png" alt="" title="" /></span>*}
					<label for="deliveryopt" class="deliPickName">{$LANG.res_details_delivery}</label>
				</div>
			{/if}
		</div>
		{if $deliveryoption eq 'Yes'}
			<p class="detMinOrder">{$LANG.res_details_mindelivery}: <span style=" font:12px montserratregular; color:#000000;">{$currency}{$minorderprice}</span></p>
		{/if}
		{if $pickupoption eq 'Yes'}
			<p class="detMinOrder">{$LANG.res_details_minorders}</p>
		{/if}
    {if $searchrestaurantDetails.0.status eq 'Open' || $searchrestaurantDetails.0.status eq 'Preorder'}
    
    	{if ($deliveryoption eq 'Yes' or $pickupoption eq 'Yes') and $total gt 0}
    	
    		<div class="contain center hideCheckoutButton marginBtm12" {if $deliveryoption eq 'No'} style="display:none;" {/if}>
    			{if $total lte $minorderprice or $cartDetailsCnt eq 0}
    			
    				<span class="btn-group col-md-12 col-sm-12 col-xs-12 pad0">
    					<input type="submit" class="btn btn-default btn-block" disabled="disabled" value="{if $searchrestaurantDetails.0.status eq 'Open'}Proceed Check Out{elseif $searchrestaurantDetails.0.status eq 'Preorder'}Pre Order{/if}" />
    				</span>
    			{else}
    				
                	<span class="btn-group col-md-12 col-sm-12 col-xs-12 pad0">
    					<input type="submit"  class="btn btn-info checkout_btn btn-block" value="{if $searchrestaurantDetails.0.status eq 'Open'}Proceed Check Out{elseif $searchrestaurantDetails.0.status eq 'Preorder'}Pre Order{/if}" />
    				</span>
    				
    			{/if}
    		</div>
    		<div class="contain center showCheckoutButton marginBtm12" {if $deliveryoption neq 'No'} style="display:none;" {/if}>
    			{*if $cartDetailsCnt gt 0 and $total neq ''*}
    			{if $cartDetailsCnt gt 0 and $withoutdel_total neq ''}
    				<span class="btn-group col-md-12 col-sm-12 col-xs-12 pad0">
    					<input type="submit"  class="btn btn-info checkout_btn btn-block" value="{if $searchrestaurantDetails.0.status eq 'Open'}Proceed Check Out{elseif $searchrestaurantDetails.0.status eq 'Preorder'}Pre Order{/if}" />
						
    				</span>
    			{else}
    				<span class="btn-group col-md-12 col-sm-12 col-xs-12 pad0">
    					<input type="submit" class="btn col-md-12 pad0" disabled="disabled" value="{if $searchrestaurantDetails.0.status eq 'Open'}Proceed Check Out{elseif $searchrestaurantDetails.0.status eq 'Preorder'}Pre Order{/if}" />
    				</span>
    			{/if}
    		</div>
    	{else}
    		<div class="contain center marginBtm12">
    			<span class="btn-group col-md-12 col-sm-12 col-xs-12 pad0">
    				<input type="submit" class="btn btn-default btn-block" disabled="disabled" value="{if $searchrestaurantDetails.0.status eq 'Open'}Proceed Check Out{elseif $searchrestaurantDetails.0.status eq 'Preorder'}Pre Order{/if}" />
    			</span>
    		</div>
    	{/if}
    {else}
        <div class="contain center marginBtm12">
    		<input type="button" disabled="disabled" class="btn btn-default btn-block" value="Closed" />
		</div>
    {/if}
	</div>	
	
</div>	