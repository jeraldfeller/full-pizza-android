<div class="finalorderid" style="display:none;">{$lastorderid}</div>
<div class="container">
	<div class="MyAccountBg clearfix">
			{********************** PAYMNET Failure START *************************}
			{if $respmsg neq '' and $respmsg neq 'Approved'}
				<h1 class="thanksHead">{$LANG.thank_payment_failure}</h1>
				<h1 class="thanksInnerHead">{$respmsg}</h1>
			{/if}
			{********************** PAYMNET SUCCESS START *************************}
			{if $smarty.get.orderid neq ''}
			<div class="thanksordershow">{$LANG.thank_orderthank} {$SITE_NAME} {$LANG.thank_orderfrom} {$restaurantname}</div>
			<h1 class="MyAccountBgHead">{$LANG.thank_orderdetails}</h1>
			<div class="addtoCartInner marTop20">
				<div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="viewDetailHead">{$LANG.thank_order_info}</div>
                        <ul class="thanksUlNew1MyAcc">
                            {if $orderDetails.0.ordergenerateid neq ''}
                            <li>
                                <span class="name">{$LANG.thank_orderno}</span>
                                <span class="value">{$orderDetails.0.ordergenerateid}</span>
                            </li>
                            {/if}
                            {if $restaurantname neq ''}
                            <li>
                                <span class="name">{$LANG.thank_restname}</span>
                                <span class="value">{$restaurantname}</span>
                            </li>
                            {/if}
                            {if $orderDetails.0.deliverytype neq ''}
                            <li>
                                <span class="name">{$LANG.thank_ordertype}</span>
                                <span class="value">{$orderDetails.0.deliverytype|ucfirst|stripslashes}</span>
                            </li>
                            {/if}
                            {if $orderDetails.0.deliverytype eq 'delivery' and $orderDetails.0.deliverydate neq ''}
                            <li>
                                <span class="name">{$LANG.thank_deliverytime}</span>
                                <span class="value">{$orderDetails.0.deliverydate} {if $orderDetails.0.foodassoonas eq '1'} ASAP {else} {$orderDetails.0.deliverytime} {/if} </span>
                            </li>
                            {/if}
                            {if $orderDetails.0.orderdate neq ''}
                            <li>
                                <span class="name">{$LANG.thank_ordertime}</span>
                                <span class="value">{$orderDetails.0.orderdate}</span>
                            </li>
                            {/if}
                            {if $orderDetails.0.payment_type neq ''}
                            <li>
                                <span class="name">{$LANG.thank_paymentmethod}</span>
                                <span class="value">{if $orderDetails.0.payment_type eq 'cod'}Cash on Delivery{elseif $orderDetails.0.payment_type eq 'CC'}Credit Card{else}{$orderDetails.0.payment_type|ucfirst|stripslashes}{/if}</span>
                            </li>
                            <li>
                                <span class="name">Payment Status</span>
                                <span class="value">{if $orderDetails.0.payment_status eq 'P'}Paid{else}Not Paid{/if}</span>
                            </li>
                            {/if}
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="viewDetailHead">{$LANG.thank_customer_info}</div>
                        <ul class="thanksUlNew1MyAcc">
                            {if $orderDetails.0.customername neq ''}
                            <li>
                                <span class="name">{$LANG.thank_custname}</span>
                                <span class="value">{$orderDetails.0.customername|ucfirst|stripslashes} {$orderDetails.0.customerlastname|ucfirst|stripslashes}</span>
                            </li>
                            {/if}
                            {if $orderDetails.0.deliverystreet neq '' or $orderDetails.0.deliveryarea neq '' or $orderDetails.0.deliverycity neq '' or $orderDetails.0.deliverystate neq '' or $orderDetails.0.deliveryzip neq ''} 
                            <li>
                                <span class="name">{$LANG.thank_custaddress}</span>
                                <span class="value">{if $orderDetails.0.deliverystreet neq ''}{$orderDetails.0.deliverystreet|ucfirst|stripslashes},{/if}{if $deliverycity neq ''}{$deliverycity|ucfirst|stripslashes},{/if}{if $deliverystate neq ''}{$deliverystate|ucfirst|stripslashes}{/if}{if $orderDetails.0.deliveryzip neq ''}&nbsp;-{$orderDetails.0.deliveryzip}{/if}</span>
                            </li>
                            {/if}
                            {if $orderDetails.0.customercellphone neq ''}
                            <li>
                                <span class="name">{$LANG.thank_phoneno}</span>
                                <span class="value">{$orderDetails.0.customercellphone|ucfirst|stripslashes}</span>
                            </li>
                            {/if}
                            {if $orderDetails.0.customerlandline neq ''}
                                <li>
                                    <span class="name">{$LANG.thank_landline}</span>
                                    <span class="value">{$orderDetails.0.customerlandline|ucfirst|stripslashes}</span>
                                </li>
                            {/if}
                            {if $orderDetails.0.deliverylandmark neq ''}
                                <li>
                                    <span class="name">{$LANG.thank_landmark}</span>
                                    <span class="value">{$orderDetails.0.deliverylandmark|ucfirst|stripslashes}</span>
                                </li>
                            {/if}
                            {if $orderDetails.0.instructions neq ''}
                                <li>
                                    <span class="name">Instructions</span>
                                    <span class="value">{$orderDetails.0.instructions|ucfirst|stripslashes}</span>
                                </li>
                            {/if}
                        </ul>
                    </div>
				</div>
			</div>
			<div class="checkBtmLine">
				
				{if $smarty.session.customerid neq ''}
				<div class="thanksbutton">
					<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}customerMyaccount.php{else}myaccount{/if}" class="submit-bg">{$LANG.thank_myorderbut}</a>
				</div>
				{/if}
			</div>
			<h1 class="MyAccountBgHead">{$LANG.thank_menudetails}</h1>
			<div class="tablecontainer marTop20">
				<table width="100%" cellspacing="0" cellpadding="0" border="0">
					<tr class="orderInnerHead">
						<th class="orderHeading" width="10%">{*$LANG.thank_menuitem*}S No</th>
						<th class="orderHeading" width="30%">{$LANG.thank_menuitem}</th>
						<th class="orderHeading" width="20%">{$LANG.thank_menuqty}</th>
						<th class="orderHeading" width="25%">{$LANG.thank_menuprice}</th>
						<th class="orderHeading" width="50%">{$LANG.thank_menutotprice}</th>
					</tr>
					{section name=ord loop=$cartDetails}
					<tr class="orderInnerCont">
						<td width="10%">{$smarty.section.ord.rownum}</td>
						<td width="30%">
						{$cartDetails[ord].menuname|ucfirst|stripslashes|html_entity_decode} {if $cartDetails[ord].pizza_size neq ''}({$cartDetails[ord].pizza_size}){/if}
						<span class="addonthanks">
							{if $cartDetails[ord].addonsname neq ''}<br><b>{$LANG.thank_customer_addons}:</b> {$cartDetails[ord].addonsname|stripslashes} {/if}
							{if $cartDetails[ord].pizza_crustname neq ''}<br><b>{$LANG.thank_customer_crust}:</b>{$cartDetails[ord].pizza_crustname|stripslashes} {/if}
							{if $cartDetails[ord].pizza_addonsname neq ''}<br><b>{$LANG.thank_customer_topping}:</b>{$cartDetails[ord].pizza_addonsname|stripslashes|html_entity_decode} {/if}
							{if $cartDetails[ord].specialinstruction neq ''}<br><b>{$LANG.thank_inst}:</b>{$cartDetails[ord].specialinstruction|stripslashes}{/if}
						</span>
						</td>
						<td width="20%">{$cartDetails[ord].quantity}</td>
						<td width="15%">{$currency}&nbsp;{$cartDetails[ord].menuprice}{if $cartDetails[ord].addonsname neq ''}( {$currency}&nbsp;{$cartDetails[ord].addonsprice} Extra ){/if}</td>
						<td width="50%" class="last align-right padright90">{$currency}&nbsp;{$cartDetails[ord].tot_menuprice}</td>
					</tr>
					{/section}
					<tr>
						<td align="right" colspan="4">{$LANG.thank_menutotal}</td>
						<td class="last align-right padright90">{$currency}&nbsp;{$subtotal}</td>
					</tr>
					<tr>
						<td align="right" colspan="4">{$LANG.thank_menutax}{if $salestax neq '0.00'} ({$salestax} %){/if}</td>
						<td class="last align-right padright90">{$currency}&nbsp;{$taxamount}</td>
					</tr>
					{if $deliveryoption eq 'Yes' and $deliverytype neq 'pickup'}
					<tr>
						<td align="right" colspan="4">{$LANG.thank_deliverycharge}</td>
						<td class="last align-right padright90">{if $deliverycharge eq '0.00'}0.00{else}{$currency}&nbsp;{$deliverycharge}{/if}</td>
					</tr>
					{/if}
					{if $orderDetails.0.offervalue neq ''}
					<tr>
						<td align="right" colspan="4">{$LANG.thank_discount}({$orderDetails.0.offervalue} {$LANG.thank_percent})</td>
						<td class="last align-right padright90">{if $orderDiscountPrice eq '0.00'}0.00{else}- {$currency}&nbsp;{$orderDiscountPrice}{/if}</td>
					</tr>
					{/if}
					{if $orderDetails.0.tipamount neq '0.00'}
					<tr>
						<td align="right" colspan="4">Tip</td>
						<td class="last align-right padright90">{$currency}&nbsp;{$tipamount}</td>
					</tr>
					{/if}
					{if $orderDetails.0.voucher_id neq '' and $orderDetails.0.voucher_price gt 0}
						{if $orderDetails.0.voucher_price neq '0.00'}
						<tr>
							<td align="right" colspan="4">Voucher Discount Price</td>
							<td class="last align-right padright90">- {$currency}&nbsp;{$orderDetails.0.voucher_price|string_format:"%.2f"}</td>
						</tr>
						{/if}
					{/if}
					<tr>
						<td align="right" colspan="4">{$LANG.thank_menufinaltot}</td>
						<td class="last align-right padright90">{$currency}&nbsp;{$total|string_format:"%.2f"}</td>
					</tr>
				</table>
			</div>
			{/if}
			{********************** PAYMNET SUCCESS END *************************}
			
		</div>
</div><br /><br />

{literal}

<script type="text/javascript">
$(document).ready(function() {
    
    var finalorderid = $(".finalorderid").html();  
    callorderprocess(finalorderid);  
});
</script>
{/literal}
<!--Customer Forget Password -->
<div id="printer_respone" style="display:none;">
	<div class="addtoCartInner">
		<div class="customaddtocartPopupHead">
			<h1 class="addtocartPopupHeadNew">{$LANG.thank_order_ack}</h1>
			<div class="addtoCartClose" onclick="myPopupWindowClose('#printer_respone');"></div>
		</div>
		<div class="customaddtocartPopup">
			<div class="customaddtocartWrap">
				<div class="contain center">{$LANG.thank_request_is_processed}.</div>
				<div class="contain center"><img src="{$SITE_IMAGE_URL}/loader.gif" alt="" title="" /></div>
				<div class="contain center">{$LANG.thank_order_is_under_ack}</div>
				<div class="contain center">{$LANG.thank_please_wait}....</div>
			</div>
		</div>
	</div>
</div>