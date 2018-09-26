<meta http-equiv="content-type" content="text/html;charset=utf-8" />

{*--------------------------------------------------------------------------------------------*}
                    {* Customer Page Start *}
{*--------------------------------------------------------------------------------------------*}
{if $action eq "customerFavStatus"}
	<div class="detailsInnerNewWrap">
		<div class="ordersInnerWrap">
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr class="orderInnerHead">
					<td class="orderHeading" width="10%">{$LANG.cus_myacc_fav_sno}</td>
					<td class="orderHeading" width="50%">{$LANG.cus_myacc_fav_resname}</td>
					<td class="orderHeading" width="15%">{$LANG.cus_myacc_fav_adddate}</td>
					<td class="orderHeading" width="15%">{$LANG.cus_myacc_fav_action}</td>
				</tr>
				{assign var=i value=1}
				{section name="cus_fav" loop=$customerFavoritesList}
				<tr class="orderInnerCont">
					<td>{$i++}</td>
					<td><a href="restaurantDetails.php?resid={$customerFavoritesList[cus_fav].restaurant_id}&resname={$customerFavoritesList[cus_fav].restaurant_seourl}">{$customerFavoritesList[cus_fav].restaurant_name|stripslashes}</a></td>
					<td>{$customerFavoritesList[cus_fav].adddate|date_format:"%a %e,%Y %H:%M"}</td>
					<td><a href="javascript:void(0);" onclick="changeStatusOptionFav('delete','{$customerFavoritesList[cus_fav].id}','favorite');"><img src="{$SITE_IMAGE_URL}/delete.jpg" alt="" title="" /></a></td>
				</tr>
				{sectionelse}
				<tr><td class="red" colspan="4" align="center">{$LANG.cus_myacc_fav_norecord}</td></tr>
				{/section}
			</tbody>
		</table>		
		</div>			
	</div>
{/if}
{*--------------------------------------------------------------------------------------------*}
<!-- Order Full details POPUP -->
{if $action eq "orderFullDetails"}
	<div class="container" id="logoimg" style="display:none">
		<img src="{$SITE_LOGO}" alt="{$SITE_NAME}" title="{$SITE_NAME}" />
	</div>
	<div class="popTxtarea1Inner1MyAcc">
		<a class="pdf" href="viewfullDetailsPDF.php?orderid={$orderDetails.0.orderid}" target="_blank" >{$LANG.res_myaccount_viewdwnformat}</a>
		<a class="print" href="javascript:void(0);" onclick="print();">{$LANG.res_myaccount_viewprint}</a>
		{*<a href='javascript:void(0);' id="printpage" onclick='window.print();' class='print' style="display:none">Print this page<a>*}
	</div>
	<div class="frt"><a href="javascript:void(0);" class="backHistTxt"  onclick="backHistory();">{$LANG.cus_back_history}</a></div>
	<div class="addtoCartInner">
		<div class="thanksTableOrderNew1">
			<span class="orderNewPopHead">{$LANG.res_myaccount_viewordernumber} : {$orderDetails.0.ordergenerateid}</span>
			<span class="orderNewPopsubHead"><b>{$LANG.res_myaccount_vieworderat}: </b>{$orderDetails.0.orderdate} </span>
			<span class="orderNewPopsubHead"><b>{$LANG.res_myaccount_viewstatus}: </b>{if $orderDetails.0.status eq 'completed'}{$LANG.cus_delivered}{else}{$orderDetails.0.status|ucfirst}{/if}</span>
            {if $gprsoption eq 'Yes'}
                <span class="orderNewPopsubHead"><b>Order is sent to Printer: </b>{$orderDetails.0.printer_sent|stripslashes}</span>
                <span class="orderNewPopsubHead"><b>Printer received or not the order: </b>{$orderDetails.0.printer_response|stripslashes}</span>
                {if $orderDetails.0.printer_ack neq ''}
                    <span class="orderNewPopsubHead"><b>Printer acknowledgement: </b>{$orderDetails.0.printer_ack|stripslashes}</span>
                {/if}
            {/if}
            {if $orderDetails.0.status eq 'completed'}
            <span class="orderNewPopsubHead"><b>Food Ready/Deliver Time: </b>{$orderDetails.0.printer_res_deli_time|stripslashes}</span>
            {elseif $orderDetails.0.status eq 'failed'}
            <span class="orderNewPopsubHead"><b>Reason: </b>{$orderDetails.0.printer_ack_msg|stripslashes}</span>
            {/if}
			<!--<input type="button" class="addtoNotebtn1" value="Edit" />-->
		</div>
		<div class="tablecontainer">
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<tr class="orderInnerHead">
					<th class="orderHeading" width="10%">{*$LANG.res_myaccount_viewmenuname*}S No</th>
					<th class="orderHeading" width="35%">{$LANG.res_myaccount_viewmenuname}</th>
					{*<span>{$LANG.res_myaccount_viewcategory}</span>*}
					<th class="orderHeading" width="15%">{$LANG.res_myaccount_viewquantity}</th>
					<th class="orderHeading" width="20%">{$LANG.res_myaccount_viewprice}</th>
					<th class="orderHeading center" width="20%">{$LANG.res_myaccount_viewtotalprice}</th>
				</tr>
				{section name=ord loop=$cartDetails}
				<tr class="orderInnerCont">
					<td>{$smarty.section.ord.rownum}</td>
					<td>
					{$cartDetails[ord].menuname|ucfirst|stripslashes} {if $cartDetails[ord].pizza_size neq ''}({$cartDetails[ord].pizza_size}){/if}
					{if $cartDetails[ord].addonsname neq ''} <br><b>{$LANG.cus_addons}:</b> {$cartDetails[ord].addonsname|stripslashes}{/if}
					{if $cartDetails[ord].pizza_crustname neq ''}<br><b>{$LANG.cus_crust}:</b> {$cartDetails[ord].pizza_crustname|stripslashes}{/if}
					{if $cartDetails[ord].pizza_addonsname neq ''}<br><b>{$LANG.cus_topping}:</b> {$cartDetails[ord].pizza_addonsname|stripslashes}{/if}
					{if $cartDetails[ord].specialinstruction neq ''}<br><b>{$LANG.cus_inst}:</b>{$cartDetails[ord].specialinstruction|stripslashes}{/if}
					</td>
					{*<td>{$cartDetails[ord].catname|ucfirst|stripslashes}</td>*}
					<td>{$cartDetails[ord].quantity}</td>
					<td>{$currency} {$cartDetails[ord].menuprice}{if $cartDetails[ord].addonsname neq ''}({$currency} {$cartDetails[ord].addonsprice} Extra ){/if}</td>
					<td>{$currency} {$cartDetails[ord].tot_menuprice}</td>
				</tr>				
				{/section}
				<tr>
					<td   align="right" colspan="4">{$LANG.res_myaccount_viewsubtotal}</td>
					<td>{$currency} {$subtotal}</td>
				</tr>
				 {if $salestax neq '0.00' and $salestax neq ''}
				<tr>
					<td align="right" colspan="4">Tax {if $salestax neq '0.00'}({$salestax|string_format:"%.2f"} %){/if}</td>
					<td>{$currency} {$taxamount}</td>
				</tr>
				{/if}
				{*if $deliveryoption eq 'Yes' and $deliverytype neq 'pickup'*}
				{if $deliverytype neq 'pickup'}
				<tr>
					<td  align="right"  colspan="4">{$LANG.res_myaccount_viewdeliverycharge}</td>
					<td>{if $deliverycharge eq '0.00'}0.00{else}{$currency} {$deliverycharge}{/if}</td>
				</tr>
				{/if}
			   
				{if $orderDetails.0.tipamount neq '0.00' and $orderDetails.0.tipamount neq ''}
				<tr>
					<td  align="right" colspan="4">Tip</td>
					<td>{$currency} {$tipamount}</td>
				</tr>
				{/if}
				{if $orderDetails.0.offervalue neq ''}
				<tr>
					<td  align="right" colspan="4">{$LANG.res_myaccount_viewdiscount}({$orderDetails.0.offervalue|string_format:"%.0f"} % Off)</td>
					<td>{if $orderDiscountPrice eq '0.00'}0.00{else} - {$currency} {$orderDiscountPrice}{/if}</td>
				</tr>
				{/if}
				{if $orderDetails.0.voucher_id neq '' and $orderDetails.0.voucher_price gt 0}
					<tr>
						<td   align="right" colspan="4">Voucher Discount Price</td>
						<td>- {$currency} {$orderDetails.0.voucher_price|string_format:"%.2f"}</td>
					</tr>
				{/if}
				<tr>
					<td  align="right" colspan="4"><b>{$LANG.res_myaccount_viewtotal}</b></td>
					<td><b>{$currency}&nbsp;{$total|string_format:"%.2f"}</b></td>
				</tr>
			</table>
		</div>
		<div class="addtoCartInner">
			<div class="col-sm-6">
				<h1 class="viewDetailHead">Order Detail</h1>
				<ul class="thanksUlNew1MyAcc">
					<li>
						<span class="name">{$LANG.res_myaccount_viewrestaurant}</span>
						<span class="col">:</span>
						<span class="value">{$restaurantname}</span>
					</li>
					<li>
						<span class="name">{$LANG.res_myaccount_viewordernumber}</span>
						<span class="col">:</span>
						<span class="value">{$orderDetails.0.ordergenerateid}</span>
					</li>
					<li>
						<span class="name">{$LANG.res_myaccount_viewordertype}</span>
						<span class="col">:</span>
						<span class="value">{$orderDetails.0.deliverytype|ucfirst|stripslashes}</span>
					</li>
					{if $deliverytype neq 'pickup'}
					<li>
						<span class="name">{$LANG.res_myaccount_viewdeliverytime}</span>
						<span class="col">:</span>
						<span class="value">{if $orderDetails.0.foodassoonas eq '1'}{$LANG.as_soon_as}{else}{$orderDetails.0.deliverydate}, &nbsp; {$orderDetails.0.deliverytime}{/if}</span>
					</li>
					{/if}
					<!--<li>
							<span class="name">{$LANG.res_myaccount_vieworderstatus} :</span>
							<span class="value">{$orderDetails.0.status}</span>
						</li>
						<li>
							<span class="name">{$LANG.res_myaccount_vieworderdate} :</span>
							<span class="value">{$orderDetails.0.orderdate}</span>
						</li> -->
					
					<li>
						<span class="name">{$LANG.res_myaccount_viewpaymentmethod}</span>
						<span class="col">:</span>
						<span class="value">{if $orderDetails.0.payment_type eq 'cod'}{$LANG.cash_on_del}{else}{$orderDetails.0.payment_type|ucfirst|stripslashes}{/if}</span>
					</li>
					<li>
						<span class="name">Payment Status</span>
						<span class="col">:</span>
						<span class="value">{if $orderDetails.0.payment_status eq 'P'}Paid{else}Not Paid{/if}</span>
					</li>
                    {if $orderDetails.0.payment_type eq 'paypal' or $orderDetails.0.payment_type eq 'creditcard'}
                    <li>
						<span class="name">Transaction Id</span>
                        <span class="col">:</span>
						<span class="value">{$orderDetails.0.transaction_id}</span>
					</li>
                    {/if}
					<li>
						<span class="name">Order Status</span>
						<span class="col">:</span>
						<span class="value">{if $orderDetails.0.status eq 'completed'}{$LANG.cus_delivered}{else}{$orderDetails.0.status|ucfirst}{/if}</span>
					</li>
					{if $orderDetails.0.instructions neq ''}
					<li>
						<span class="name">{$LANG.res_myaccount_viewyourindtruction}</span>
						<span class="col">:</span>
						<span class="value">{$orderDetails.0.instructions|ucfirst|stripslashes}</span>
					</li>
					{/if}
				</ul>
			</div>
			<div class="col-sm-6">
				<h1 class="viewDetailHead">Customer Detail</h1>
				<ul class="thanksUlNew1MyAcc">
					<li>
						<span class="name">{$LANG.res_myaccount_viewcustomername}</span>
						<span class="col">:</span>
						<span class="value">{$orderDetails.0.customername|ucfirst|stripslashes}</span>
					</li>
					<li>
						<span class="name">{$LANG.res_myaccount_viewcustomeremail}</span>
						<span class="col">:</span>
						<span class="value">{$orderDetails.0.customeremail|stripslashes}</span>
					</li>
					<li>
						<span class="name">{$LANG.res_myaccount_viewphonenumber}</span>
						<span class="col">:</span>
						<span class="value">{$orderDetails.0.customercellphone|ucfirst|stripslashes}</span>
					</li>
					{if $orderDetails.0.deliverydoornumber neq ''}
					<li>
						<span class="name">{$LANG.res_myaccount_viewapt}</span>
						<span class="col">:</span>
						<span class="value">{$orderDetails.0.deliverydoornumber|ucfirst|stripslashes}</span>
					</li>
					{/if}
                    {if $orderDetails.0.deliverystreet neq ''}
					<li>
						<span class="name">{$LANG.res_myaccount_viewstreet}</span>
						<span class="col">:</span>
						<span class="value">{$orderDetails.0.deliverystreet|ucfirst|stripslashes}</span>
					</li>
                    {/if}
					{*<li>
						<span class="name">{$LANG.res_myaccount_viewarea}</span>
						<span class="col">:</span>
						<span class="value">{$orderDetails.0.deliveryarea|ucfirst|stripslashes}</span>
					</li>*}
                    {if $orderDetails.0.deliverycity neq ''}
					<li>
						<span class="name">{$LANG.res_myaccount_viewcity}</span>
						<span class="col">:</span>
						<span class="value">{$orderDetails.0.deliverycity|ucfirst|stripslashes}</span>
					</li>
                    {/if}
                    {if $orderDetails.0.deliverystate neq ''}
                    <li>
						<span class="name">{$LANG.res_myaccount_viewstate}</span>
						<span class="col">:</span>
						<span class="value">{$orderDetails.0.deliverystate|ucfirst|stripslashes}</span>
					</li>
                    {/if}
					{if $orderDetails.0.deliveryzip neq ''}
					<li>
						<span class="name">Zip Code</span>
						<span class="col">:</span>
						<span class="value">{$orderDetails.0.deliveryzip|stripslashes}</span>
					</li>
					{/if}
					{if $orderDetails.0.deliverylandmark neq ''}
					<li>
						<span class="name">{$LANG.res_myaccount_viewlandmark}</span>
						<span class="col">:</span>
						<span class="value">{$orderDetails.0.deliverylandmark|ucfirst|stripslashes}</span>
					</li>
					{/if}
					{if $orderDetails.0.customerlandline neq ''}
					<li>
						<span class="name">{$LANG.res_myaccount_viewlandline}</span>
						<span class="col">:</span>
						<span class="value">{$orderDetails.0.customerlandline|ucfirst|stripslashes}</span>
					</li>
					{/if}
				</ul>
			</div>
			<!--<div class="popTxtarea1Inner span4">
				<h1 class="popTxtarea1Head">{$LANG.res_myaccount_viewyourindtruction}</h1>
				<textarea rows="" cols="" class="popTxtarea1">{$orderDetails.0.instructions|ucfirst|stripslashes}</textarea>
			</div>-->
		</div>
	</div>
{/if}
{*--------------------------------------------------------------------------------------------*}
                        {* Customer Page End *}
{*--------------------------------------------------------------------------------------------*}
{*--------------------------------------------------------------------------------------------*}
                        {* Restaurant or Search Details Page Start *}
{*--------------------------------------------------------------------------------------------*}
<!-- Category Menu List -->
{if $action eq "CategoryMenu"}
	{include file='restaurantDetails_menu_ajax.tpl'}
{/if}
{if $action eq "searchMenuItems"}
	{include file='restaurantDetails_menu_ajax.tpl'}
    {*_________________________ Menu Toggle On Restaurant Details Page __________________________*}
    {literal}
    <script type="text/javascript">
    	//execute();
    	$(".accordion h1:first").removeClass("active");
    	    $(".accordion div.new:not(:first)").show();
    	
    	    $(".accordion h1").click(function(e){ 
    		e.preventDefault(); 
    		$(this).next("div.new").slideToggle("fast")
    		.siblings("div.new:visible").slideUp("fast");
    		$(this).toggleClass("active");
            });
            $(".close").click(function(e){
            e.preventDefault();
               	var id=$(this).attr("id");
    			$("."+id).slideUp("fast");
    			$("."+id).prev("h3").removeClass("active");
    	    });  
    </script>
    {/literal}    
{/if}
<!-- Select option List-->
{if $action eq "selectOptionMenuList"}
	{include file='restaurantDetails_menu_ajax.tpl'}
{/if}

<!-- Category Veg Menu List -->
{if $action eq "vegCategoryMenu"}
	{include file='restaurantDetails_menu_veg_ajax.tpl'}
{/if}
{*--------------------------------------------------------------------------------------------*}
<!-- Category  Non Veg Menu List -->
{if $action eq "nonvegCategoryMenu"}
	{include file='restaurantDetails_menu_nonveg_ajax.tpl'}
{/if}
{*--------------------------------------------------------------------------------------------*}

{*################################## NEW IMPLEMENTATION ############################################*}
{*--------------------------------------------------------------------------------------------------*}
{if $action eq "orderPopup"}
    {assign var =menuDetails value = $selectmenuDetails}
    
   
	<!-- Add to Cart Menu details POPUP -->
	<input type="hidden" name="menuprice" id="menuprice" value="{$menuDetails.0.menu_price}" />
	<input type="hidden" name="menuid" id="menuid" value="{$menuid}" />
	<input type="hidden" name="restid" id="restid" value="{$menuDetails.0.restaurant_id}" />
	<input type="hidden" name="resname" id="resname" value="{$menuDetails.0.restaurant_seourl}" />

	<div class="addtocartWrapNew1">
		<div class="carthead">
            <h1>{$menuDetails.0.menu_name|ucfirst|stripslashes}</h1>
            <div class="addtoCartClose" data-dismiss="modal"></div>
        </div>
		
		<form name="orderpop" action="" method="post"> 
		<div class="addTableCart">
		    <div class="pizza_prize_size_new">
                <input type="hidden" name="pizzasliceprice_position" id="pizzasliceprice_position" value="0" />
				<input type="hidden" id="sizeoption" value="{$menuDetails.0.sizeoption}" />
				{if $menuDetails.0.sizeoption eq 'size'}
					<input type="hidden" id="pizzasmall" value="{$menuDetails.0.pizza_size_small}" />
					<input type="hidden" id="pizzamedium" value="{$menuDetails.0.pizza_size_medium}" />
					<input type="hidden" id="pizzalarge" value="{$menuDetails.0.pizza_size_large}" />
					<div class="addtoCartInBorder">
						<div class="addTableCartLeftPop">{$LANG.res_addtocart_price}</div>
						<div class="addTableCartRightPop">
							
							<!--For All category -->
							{if $menuDetails.0.pizza_size_small neq ''}
							<span class="madInputPopup">
							<input type="radio" name="pizza_size" id="size_small" value="{$menuDetails.0.pizza_small_value}" checked="checked" class="popNameInput" onclick="pizzaSize_Price('size_small',{$menuid},{$smarty.request.resid});" /><span class="addonsName">{$menuDetails.0.pizza_size_small|ucfirst} ({$currency}&nbsp;{$menuDetails.0.pizza_small_value})</span></span>{/if}
							
							{if $menuDetails.0.pizza_size_medium neq ''}
							<span class="madInputPopup"><input type="radio" name="pizza_size" id="size_medium" value="{$menuDetails.0.pizza_medium_value}" {if $menuDetails.0.pizza_size_small eq ''}checked="checked"{/if} class="popNameInput" onclick="pizzaSize_Price('size_medium',{$menuid},{$smarty.request.resid});" /><span class="addonsName">{$menuDetails.0.pizza_size_medium|ucfirst} ({$currency}&nbsp;{$menuDetails.0.pizza_medium_value}) </span></span>{/if}
							
							{if $menuDetails.0.pizza_size_large neq ''}
							<span class="madInputPopup"><input type="radio" name="pizza_size" id="size_large" value="{$menuDetails.0.pizza_large_value}" {if $menuDetails.0.pizza_size_small eq '' and $menuDetails.0.pizza_size_medium eq ''} checked="checked"{/if} class="popNameInput" onclick="pizzaSize_Price('size_large',{$menuid},{$smarty.request.resid});" /><span class="addonsName">{$menuDetails.0.pizza_size_large|ucfirst}({$currency}&nbsp;{$menuDetails.0.pizza_large_value})</span></span>{/if}
							
						</div>
					</div>
				{elseif $menuDetails.0.sizeoption eq 'fixed'} 
					<div class="addtoCartInBorder">
						<div class="addTableCartLeftPop">{$LANG.res_addtocart_price}</div>
						<div class="addTableCartRightPop">{$currency}&nbsp;{$menuDetails.0.menu_price}</div>
					</div>
				{elseif $menuDetails.0.sizeoption eq 'slice'}
					{*{$objSearchDetails->pizzzaSizeList($menuid)}*}					
					{assign var ="pizzasizelist" value=$objSearchDetails->pizzzaSizeList($menuDetails.0.menu_category,$getcategory_option,$menuid)}
					<div class="addtoCartInBorder">
						<div class="addTableCartLeftPop">{$LANG.res_addtocart_price}</div>
						<div class="addTableCartRightPop">
						{section name=size loop=$pizzasizelist}						
							<div class="madInputPopup"><input class="flt" type="radio" name="pizzasliceoption" id="pizzasliceoption_{$smarty.section.size.rownum}" value="{$pizzasizelist[size].pizza_slice_id}" {if $smarty.section.size.index eq 0}checked="checked"{/if} onchange="pizzaSlize_PriceperIndex({$smarty.section.size.index},{$menuid},{$smarty.request.resid})" /><span class="addonsName">{$pizzasizelist[size].pizza_slice_name|ucfirst|stripslashes}( {$currency}{$pizzasizelist[size].pizza_slice_price} )</span></div>
						{/section}
						</div>
					</div>
                    {else}
                     Menu not available					
				{/if}
				
				{*--------------  Add to cart ---------------*}
				{if $menuDetails.0.menu_addons eq 'Yes'}
                    {if count($objSearchDetails->menuAddonsList($menuid,$menuDetails.0.menu_category)) gt 0}
					{assign var="menuaddonslistNew" value=$objSearchDetails->menuAddonsList($menuid,$menuDetails.0.menu_category)}
					<input type="hidden" name="addonstype1" class="addonstype1" id="addonstype1" value="{if count($menuaddonslistNew) gt 0}{count($menuaddonslistNew)}{/if}" />
					{if $menuaddonslistNew gt 0}
						{section name=add loop=$menuaddonslistNew}
							{if $menuaddonslistNew[add].mainaddonsname neq ''}
								<div class="addtoCartInBorder">
									<div class="addTableCartLeftPop"><span class="width60">{$menuaddonslistNew[add].mainaddonsname|stripslashes}</span>
                                        <!--Subaddons Reset Button-->
                                        {if $menuaddonslistNew[add].mainaddonsnamecnt eq '1'}
                                            <input type="button" name="reset" value="Remove" onclick="return uncheckSingleAddon('{$menuaddonslistNew[add].menuaddons_id|replace:' ':'_'}{$smarty.section.add.index}');" class="removeBtn pull-right"/>
                                        {/if}
                                    </div>
									<div class="addTableCartRightPop {if $menuaddonslistNew[add].mainaddonsnamecnt eq '1'}newminht{/if}">
										<div class="contain1">
											{assign var="menuSubaddonslistNew" value=$objSearchDetails->menuSubAddonsList($menuaddonslistNew[add].addonparentid,$menuaddonslistNew[add].menuaddons_menuid,$menuDetails.0.menu_category,$menuaddonslistNew[add].menuaddons_addonsname,$menuaddonslistNew[add].menu_catoption)}
											<!-- Multiple Addons-->	
                                           															
											{section name=subadd loop=$menuSubaddonslistNew}
												{if $menuSubaddonslistNew[subadd].subaddonsname neq ''}
												{if $menuDetails.0.sizeoption neq 'slice'}
												    {assign var=pizza_price_size value=$objSearchDetails->showPizzaPriceperSize('size_small',$menuaddonslistNew[add].addonparentid,$menuSubaddonslistNew[subadd].menuaddons_id,$menuid)}
                                                {/if}
													{if $menuaddonslistNew[add].mainaddonsnamecnt eq '1'}
													<input type="hidden" name="singleopt" class="singleopt" id="singleopt" value="single" />
														<div class="madInputPopup single"><input class="flt {$menuaddonslistNew[add].menuaddons_id|replace:' ':'_'}{$smarty.section.add.index}" type="radio" class="addo" name="addonstype_{$menuaddonslistNew[add].mainaddonsname}" id="addonstypee_{count($menuSubaddonslistNew)}_{$smarty.section.subadd.rownum}" value="{$menuSubaddonslistNew[subadd].menuaddons_id}" {*if $smarty.section.subadd.rownum eq '1'}checked="checked"{/if*} />
															<span class="addonsName">&nbsp;{$menuSubaddonslistNew[subadd].subaddonsname|ucfirst|stripslashes} 
															{if $selectmenuDetails.0.sizeoption neq 'slice'}
																{if $menuSubaddonslistNew[subadd].menuaddons_priceoption eq 'Paid'} 
																	&nbsp;( {$currency} {$pizza_price_size} ) 
																{/if}
															{else}
																{if $menuSubaddonslistNew[subadd].menuaddons_priceoption eq 'Paid'} 
																	&nbsp;( {$currency} 
																{assign var="sliceaddonprice_val" value=$objSite->getSliceAddonsPrice_OrderPop($menuSubaddonslistNew[subadd].menuaddons_price_slice,0)}
																{*{$objSite->getSliceAddonsPrice_OrderPop($menuSubaddonslist[subadd].menuaddons_price_slice,0)}*}
																	{$sliceaddonprice_val|string_format:"%.2f"} )
																{/if}
															{/if}
															</span>
														</div>
													{/if}
													
													{if $menuaddonslistNew[add].mainaddonsnamecnt neq '1'}													
														<input type="hidden" name="multipleopt" class="multipleopt" id="multipleopt" value="multiple" />	
														<div class="madInputPopup">
                                                        {*<input class="flt {$menuaddonslist[add].mainaddonsname|stripslashes|replace:' ':'_'}_{$menuSubaddonslist_cnt}_{$menuaddonslist[add].mainaddonsnamecnt}" type="checkbox" name="addonstype" id="{$menuaddonslist[add].mainaddonsname|stripslashes|replace:' ':'_'}_{$menuSubaddonslist_cnt}_{$smarty.section.subadd.rownum}" value="{$menuSubaddonslist[subadd].menuaddons_id}" {if $menuaddonslist[add].mainaddonsnamecnt gt 0 }onclick="clickCheckedBox(this.id,'{$menuSubaddonslist_cnt}','{$menuaddonslist[add].mainaddonsnamecnt}','{$menuaddonslist[add].mainaddonsname|stripslashes|replace:' ':'_'}_{$menuSubaddonslist_cnt}_{$menuaddonslist[add].mainaddonsnamecnt}');"{/if} />*}
                                                        <input class="flt {$menuaddonslistNew[add].addonparentid}_{count($menuSubaddonslistNew)}_{$menuaddonslistNew[add].mainaddonsnamecnt}" type="checkbox" name="addonstype" id="{$menuaddonslistNew[add].addonparentid}_{count($menuSubaddonslistNew)}_{$smarty.section.subadd.rownum}" value="{$menuSubaddonslistNew[subadd].menuaddons_id}" {if $menuaddonslistNew[add].mainaddonsnamecnt gt 0 }onclick="clickCheckedBox(this.id,'{count($menuSubaddonslistNew)}','{$menuaddonslistNew[add].mainaddonsnamecnt}','{$menuaddonslistNew[add].addonparentid}_{count($menuSubaddonslistNew)}_{$menuaddonslistNew[add].mainaddonsnamecnt}');"{/if} />
															<span class="addonsName">&nbsp;{$menuSubaddonslistNew[subadd].subaddonsname|ucfirst|stripslashes} 
															{if $menuDetails.0.sizeoption neq 'slice'}
																{if $menuSubaddonslistNew[subadd].menuaddons_priceoption eq 'Paid'}
																	&nbsp;( {$currency} {$pizza_price_size} {*$menuSubaddonslist[subadd].menuaddons_price*} )  
																{/if}
															{else}
																{if $menuSubaddonslistNew[subadd].menuaddons_priceoption eq 'Paid'} 
																	&nbsp;( {$currency}  
																{assign var="sliceaddonprice_val" value=$objSite->getSliceAddonsPrice_OrderPop($menuSubaddonslistNew[subadd].menuaddons_price_slice,0)}
																{*{$objSite->getSliceAddonsPrice_OrderPop($menuSubaddonslist[subadd].menuaddons_price_slice,0)}*}
																	{$sliceaddonprice_val|string_format:"%.2f"} )
																{/if}
															{/if}
															</span>
														</div>
													{/if}
													
												{/if}
											{/section}
										</div>
									</div>
								</div>
							{/if}
						{/section}
					{/if}
                    {/if}
				{/if}
			</div>	
			{*------------------- Price --------------------------------*}
			<!--<div class="addtoCartInBorder">
					<div class="addTableCartLeftPop">{$LANG.res_addtocart_addon}</div>
					<div class="addTableCartRightPop">{$currency}&nbsp;{$menuDetails.0.menu_price}</div>
			</div> -->				
			{if $menuDetails.0.sizeoption eq 'fixed' or $menuDetails.0.sizeoption eq 'size' or $menuDetails.0.sizeoption eq 'slice'}
			<div class="addtoCartInBorder">
				<div class="addTableCartLeftPop">{$LANG.res_addtocart_qty}</div>
				<div class="addTableCartRightPop">
					<select class="addtocartSelect2" name="qty" id="qty">
						{$QUANTITY_LIST}
					</select>
				</div>
			</div>
            {/if}
			{if $menuDetails.0.menu_spl_instruction eq 'Yes'}
			<div class="addtoCartInBorder">
				<div class="addTableCartLeftPop">{$LANG.res_addtocart_spl_ins}</div>
				<div class="addTableCartRightPop">
					<textarea rows="" cols="" class="addtocartTxtarea" name="splins" id="splins" ></textarea>
					<div class="addChargesApply">{$LANG.res_addtocart_spl_ins_desc1}</div>
					<div class="addChargesApply">{$LANG.res_addtocart_spl_ins_desc2}</div>
				</div>
			</div>
			{/if}
            {if $menuDetails.0.sizeoption eq 'fixed' or $menuDetails.0.sizeoption eq 'size' or $menuDetails.0.sizeoption eq 'slice'}
			<div class="addtocartButton" id="buttonwidth">
				<input type="button" onclick="addToMenu();" value="{$LANG.res_addtocart_addtocart}" data-dismiss="modal" />
			</div>
            {/if}
		</div>
		</form>
	</div>
	
{/if}
{*-----------------------------------------------------------------------------------------------------------*}
{if $action eq "showPizzaPriceSize_new"}
    
    <input type="hidden" name="pizzasliceprice_position" id="pizzasliceprice_position" value="" />
    <input type="hidden" id="sizeoption" value="{$selectmenuDetails.0.sizeoption}" />
	{if $selectmenuDetails.0.sizeoption eq 'size'}
		<input type="hidden" id="pizzasmall" value="{$selectmenuDetails.0.pizza_size_small}" />
		<input type="hidden" id="pizzamedium" value="{$selectmenuDetails.0.pizza_size_medium}" />
		<input type="hidden" id="pizzalarge" value="{$selectmenuDetails.0.pizza_size_large}" />
		<div class="addtoCartInBorder">
			<div class="addTableCartLeftPop">{$LANG.res_addtocart_price}</div>
			<div class="addTableCartRightPop">
				<!--For All category -->
                <!-- Small -->
				{if $selectmenuDetails.0.pizza_size_small neq ''}
					<span class="madInputPopup">
					     <input type="radio" name="pizza_size" id="size_small" value="{$selectmenuDetails.0.pizza_small_value}" checked="checked" class="popNameInput" onclick="pizzaSize_Price('size_small',{$menuid},{$smarty.request.resid});" /><span class="addonsName">{$selectmenuDetails.0.pizza_size_small|ucfirst} ({$currency}&nbsp;{$selectmenuDetails.0.pizza_small_value})</span>
                    </span>
                {/if}
				<!-- Medium -->
				{if $selectmenuDetails.0.pizza_size_medium neq ''}
					<span class="madInputPopup"><input type="radio" name="pizza_size" id="size_medium" value="{$selectmenuDetails.0.pizza_medium_value}" {if $selectmenuDetails.0.pizza_size_small eq ''}checked="checked"{/if} class="popNameInput" onclick="pizzaSize_Price('size_medium',{$menuid},{$smarty.request.resid});" /><span class="addonsName">{$selectmenuDetails.0.pizza_size_medium|ucfirst} ({$currency}&nbsp;{$selectmenuDetails.0.pizza_medium_value}) </span>
                    </span>
                {/if}
				<!-- large -->
				{if $selectmenuDetails.0.pizza_size_large neq ''}
					<span class="madInputPopup"><input type="radio" name="pizza_size" id="size_large" value="{$selectmenuDetails.0.pizza_large_value}" {if $selectmenuDetails.0.pizza_size_small eq '' and $selectmenuDetails.0.pizza_size_medium eq ''} checked="checked"{/if} class="popNameInput" onclick="pizzaSize_Price('size_large',{$menuid},{$smarty.request.resid});" /><span class="addonsName">{$selectmenuDetails.0.pizza_size_large|ucfirst}({$currency}&nbsp;{$selectmenuDetails.0.pizza_large_value})</span>
                    </span>
                {/if}
				
			</div>
		</div>
	{elseif $selectmenuDetails.0.sizeoption eq 'fixed'}
		<div class="addtoCartInBorder">
			<div class="addTableCartLeftPop">{$LANG.res_addtocart_price}</div>
			<div class="addTableCartRightPop">{$currency}&nbsp;{$selectmenuDetails.0.menu_price}</div>
		</div>
	{else}
		{*{$objSearchDetails->pizzzaSizeList($menuid)}*}					
		{*$objSearchDetails->pizzzaSizeList($selectmenuDetails.0.menu_category,$getcategory_option,$menuid)*}
		{assign var ='pizzasizelist' value=$objSearchDetails->pizzzaSizeList($selectmenuDetails.0.menu_category,$getcategory_option,$menuid)}
		<div class="addtoCartInBorder">
			<div class="addTableCartLeftPop">{$LANG.res_addtocart_price}</div>
			<div class="addTableCartRightPop">
			{section name="size" loop=$pizzasizelist}						
				<div class="madInputPopup"><input class="flt" type="radio" name="pizzasliceoption" id="pizzasliceoption_{$smarty.section.size.rownum}" value="{$pizzasizelist[size].pizza_slice_id}" {if $smarty.section.size.index eq 0}checked="checked"{/if} onclick="pizzaSlize_PriceperIndex({$smarty.section.size.index},{$menuid},{$smarty.request.resid})" /><span class="addonsName">{$pizzasizelist[size].pizza_slice_name|ucfirst|stripslashes}( {$currency}{$pizzasizelist[size].pizza_slice_price} )</span></div>
			{/section}
			</div>
		</div>					
	{/if}
    
    {*----------------------------------------------------------*} 
    {if $selectmenuDetails.0.menu_addons eq 'Yes'}
    {assign var="menuaddonslist" value=$objSearchDetails->menuAddonsList($menuid,$selectmenuDetails.0.menu_category)}
    {if count($menuaddonslist) gt 0}					
    	{*$objSearchDetails->menuAddonsList($menuid,$selectmenuDetails.0.menu_category)*}
    	<input type="hidden" name="addonstype1" class="addonstype1" id="addonstype1" value="{count($menuaddonslist)}" />
    	{if count($menuaddonslist) gt 0}
    		{section name="add" loop=$menuaddonslist}
    			{if $menuaddonslist[add].mainaddonsname neq ''}
    				<div class="addtoCartInBorder">
    					<div class="addTableCartLeftPop">
							<span class="width60">{$menuaddonslist[add].mainaddonsname|stripslashes}</span>
							<!--Subaddons Reset Button-->
							{if $menuaddonslist[add].mainaddonsnamecnt eq '1'}
								<input type="button" name="reset" value="Remove" onclick="return uncheckSingleAddon('{$menuaddonslist[add].menuaddons_id|replace:' ':'_'}{$smarty.section.add.index}');" class="removeBtn pull-right"/>
							{/if}
						</div>
                        
    					<div class="addTableCartRightPop {if $menuaddonslist[add].mainaddonsnamecnt eq '1'}newminht{/if}">
    						<div class="contain1">
                                {assign var="menuSubaddonslist" value=$objSearchDetails->menuSubAddonsList($menuaddonslist[add].addonparentid,$menuaddonslist[add].menuaddons_menuid,$selectmenuDetails.0.menu_category,$menuaddonslist[add].menuaddons_addonsname,$menuaddonslist[add].menu_catoption)}<!-- Multiple Addons-->																					
    							{section name="subadd" loop=$menuSubaddonslist}
    								{if $menuSubaddonslist[subadd].subaddonsname neq ''}
                                    
                                    {if $selectmenuDetails.0.sizeoption neq 'slice'}
    								    {*$objSearchDetails->showPizzaPriceperSize($smarty.request.pizza_size,$menuaddonslist[add].addonparentid,$menuSubaddonslist[subadd].menuaddons_id,$menuid)*}
                                        {assign var="pizza_price_size" value=$objSearchDetails->showPizzaPriceperSize($smarty.request.pizza_size,$menuaddonslist[add].addonparentid,$menuSubaddonslist[subadd].menuaddons_id,$menuid)}
                                    {/if}
                                    
    									{if $menuaddonslist[add].mainaddonsnamecnt eq '1'}
    									<input type="hidden" name="singleopt" class="singleopt" id="singleopt" value="single" />
    										<div class="madInputPopup single"><input class="flt {$menuaddonslist[add].menuaddons_id|replace:' ':'_'}{$smarty.section.add.index}" type="radio" class="addo" name="addonstype_{$menuaddonslist[add].mainaddonsname}" id="addonstypee_{count($menuSubaddonslist)}_{$smarty.section.subadd.rownum}" value="{$menuSubaddonslist[subadd].menuaddons_id}"  />
    											<span class="addonsName">&nbsp;{$menuSubaddonslist[subadd].subaddonsname|ucfirst|stripslashes} 
    											{if $selectmenuDetails.0.sizeoption neq 'slice'}
    												{if $menuSubaddonslist[subadd].menuaddons_priceoption eq 'Paid'} 
    													&nbsp;( {$currency} {$pizza_price_size} ) 
    												{/if}
    											{else}
    												{if $menuSubaddonslist[subadd].menuaddons_priceoption eq 'Paid'} 
    													&nbsp;( {$currency} 
    												{assign var="sliceaddonprice_val" value=$objSite->getSliceAddonsPrice_OrderPop($menuSubaddonslist[subadd].menuaddons_price_slice,$smarty.request.pos)}
    												{*{$objSite->getSliceAddonsPrice_OrderPop($menuSubaddonslist[subadd].menuaddons_price_slice,0)}*}
    													{$sliceaddonprice_val|string_format:"%.2f"} )
    												{/if}
    											{/if}
    											</span>
    										</div>
    									{/if}
    									
    									{if $menuaddonslist[add].mainaddonsnamecnt neq '1'}													
    										<input type="hidden" name="multipleopt" class="multipleopt" id="multipleopt" value="multiple" />	
    										<div class="madInputPopup">
                                            {*<input class="flt {$menuaddonslist[add].mainaddonsname|stripslashes|replace:' ':'_'}_{$menuSubaddonslist_cnt}_{$menuaddonslist[add].mainaddonsnamecnt}" type="checkbox" name="addonstype" id="{$menuaddonslist[add].mainaddonsname|stripslashes|replace:' ':'_'}_{$menuSubaddonslist_cnt}_{$smarty.section.subadd.rownum}" value="{$menuSubaddonslist[subadd].menuaddons_id}" {if $menuaddonslist[add].mainaddonsnamecnt gt 0 }onclick="clickCheckedBox(this.id,'{$menuSubaddonslist_cnt}','{$menuaddonslist[add].mainaddonsnamecnt}','{$menuaddonslist[add].mainaddonsname|stripslashes|replace:' ':'_'}_{$menuSubaddonslist_cnt}_{$menuaddonslist[add].mainaddonsnamecnt}');"{/if} />*}
                                            <input class="flt {$menuaddonslist[add].addonparentid}_{count($menuSubaddonslist)}_{$menuaddonslist[add].mainaddonsnamecnt}" type="checkbox" name="addonstype" id="{$menuaddonslist[add].addonparentid}_{count($menuSubaddonslist)}_{$smarty.section.subadd.rownum}" value="{$menuSubaddonslist[subadd].menuaddons_id}" {if $menuaddonslist[add].mainaddonsnamecnt gt 0 }onclick="clickCheckedBox(this.id,'{count($menuSubaddonslist)}','{$menuaddonslist[add].mainaddonsnamecnt}','{$menuaddonslist[add].addonparentid}_{count($menuSubaddonslist)}_{$menuaddonslist[add].mainaddonsnamecnt}');"{/if} />
    											<span class="addonsName">&nbsp;{$menuSubaddonslist[subadd].subaddonsname|ucfirst|stripslashes} 
    											{if $selectmenuDetails.0.sizeoption neq 'slice'}
    												{if $menuSubaddonslist[subadd].menuaddons_priceoption eq 'Paid'}
    													&nbsp;( {$currency} {$pizza_price_size} )  
    												{/if}
    											{else}
    												{if $menuSubaddonslist[subadd].menuaddons_priceoption eq 'Paid'} 
    													&nbsp;( {$currency}  
    												{assign var="sliceaddonprice_val" value=$objSite->getSliceAddonsPrice_OrderPop($menuSubaddonslist[subadd].menuaddons_price_slice,$smarty.request.pos)}
    												{*{$objSite->getSliceAddonsPrice_OrderPop($menuSubaddonslist[subadd].menuaddons_price_slice,0)}*}
    													{$sliceaddonprice_val|string_format:"%.2f"} )
    												{/if}
    											{/if}
    											</span>
    										</div>
    									{/if}
    									
    								{/if}
    							{/section}
    						</div>
    					</div>
    				</div>
    			{/if}
    		{/section}
    	{/if}
        {/if}
    {/if}
    {*----------------------------------------------------------*}
{/if}

{*-------------------------------------------------------------------------------------------------------*}
{*-------------------------------------------------------------------------------------------------------*}
{if $action eq "showPizzaPriceSize"}
	<div class="pizza_prize_size">
	<!-- Add to Cart Menu details POPUP -->
	<input type="hidden" name="menuprice" id="menuprice" value="{$selectmenuDetails.0.menu_price}" />
	<input type="hidden" name="menuid" id="menuid" value="{$menuid}" />
	<input type="hidden" name="restid" id="restid" value="{$selectmenuDetails.0.restaurant_id}" />	
	<input type="hidden" name="pizzasliceprice_position" id="pizzasliceprice_position" value="" />
	
	
	<div class="addtocartWrapNew1">
	<h1 class="addtoCartMainhead">{$selectmenuDetails.0.menu_name|ucfirst|stripslashes}</h1>
		<form name="orderpop" action="" method="post"> 
		<div class="addTableCart">
				<input type="hidden" id="sizeoption" value="{$selectmenuDetails.0.sizeoption}" />
				{if $selectmenuDetails.0.sizeoption eq 'size'}
					<input type="hidden" id="pizzasmall" value="{$selectmenuDetails.0.pizza_size_small}" />
					<input type="hidden" id="pizzamedium" value="{$selectmenuDetails.0.pizza_size_medium}" />
					<input type="hidden" id="pizzalarge" value="{$selectmenuDetails.0.pizza_size_large}" />
					<div class="addtoCartInBorder">
						<div class="addTableCartLeftPop">{$LANG.res_addtocart_price}</div>
						<div class="addTableCartRightPop">
							<!--For pizza Category only-->
							{*{if $selectmenuDetails.0.pizza_size_small neq ''}
							<span class="madInputPopup">
							<input type="radio" name="pizza_size" id="size_small" value="{$selectmenuDetails.0.pizza_small_value}" checked="checked" class="popNameInput" {if $getcategoryname eq 'pizza'}onclick="pizzaSize_Price('size_small',{$menuid});"{/if} /><span class="addonsName">{$selectmenuDetails.0.pizza_size_small|ucfirst} ({$currency}&nbsp;{$selectmenuDetails.0.pizza_small_value})</span></span>{/if}
							
							{if $selectmenuDetails.0.pizza_size_medium neq ''}
							<span class="madInputPopup">
							<input type="radio" name="pizza_size" id="size_medium" value="{$selectmenuDetails.0.pizza_medium_value}" {if $selectmenuDetails.0.pizza_size_small eq ''}checked="checked"{/if} class="popNameInput" {if $getcategoryname eq 'pizza'}onclick="pizzaSize_Price('size_medium',{$menuid});"{/if} /><span class="addonsName">{$selectmenuDetails.0.pizza_size_medium|ucfirst} ({$currency}&nbsp;{$selectmenuDetails.0.pizza_medium_value}) </span></span>{/if}
							
							{if $selectmenuDetails.0.pizza_size_large neq ''}
							<span class="madInputPopup">
							<input type="radio" name="pizza_size" id="size_large" value="{$selectmenuDetails.0.pizza_large_value}" {if $selectmenuDetails.0.pizza_size_small eq '' and $selectmenuDetails.0.pizza_size_medium eq ''} checked="checked"{/if} class="popNameInput" {if $getcategoryname eq 'pizza'}onclick="pizzaSize_Price('size_large',{$menuid});"{/if} /><span class="addonsName">{$selectmenuDetails.0.pizza_size_large|ucfirst}({$currency}&nbsp;{$selectmenuDetails.0.pizza_large_value})</span></span> {/if}*}
							
							<!--For All Category-->
							{if $selectmenuDetails.0.pizza_size_small neq ''}
							<span class="madInputPopup">
							<input type="radio" name="pizza_size" id="size_small" value="{$selectmenuDetails.0.pizza_small_value}" checked="checked" class="popNameInput" onclick="pizzaSize_Price('size_small',{$menuid},{$smarty.request.resid});" /><span class="addonsName">{$selectmenuDetails.0.pizza_size_small|ucfirst} ({$currency}&nbsp;{$selectmenuDetails.0.pizza_small_value})</span></span>{/if}
							
							{if $selectmenuDetails.0.pizza_size_medium neq ''}
							<span class="madInputPopup">
							<input type="radio" name="pizza_size" id="size_medium" value="{$selectmenuDetails.0.pizza_medium_value}" {if $selectmenuDetails.0.pizza_size_small eq ''}checked="checked"{/if} class="popNameInput" onclick="pizzaSize_Price('size_medium',{$menuid},{$smarty.request.resid});" /><span class="addonsName">{$selectmenuDetails.0.pizza_size_medium|ucfirst} ({$currency}&nbsp;{$selectmenuDetails.0.pizza_medium_value}) </span></span>{/if}
							
							{if $selectmenuDetails.0.pizza_size_large neq ''}
							<span class="madInputPopup">
							<input type="radio" name="pizza_size" id="size_large" value="{$selectmenuDetails.0.pizza_large_value}" {if $selectmenuDetails.0.pizza_size_small eq '' and $selectmenuDetails.0.pizza_size_medium eq ''} checked="checked"{/if} class="popNameInput" onclick="pizzaSize_Price('size_large',{$menuid},{$smarty.request.resid});" /><span class="addonsName">{$selectmenuDetails.0.pizza_size_large|ucfirst}({$currency}&nbsp;{$selectmenuDetails.0.pizza_large_value})</span></span>{/if}
						</div>
					</div>
				{elseif $selectmenuDetails.0.sizeoption eq 'fixed'}
					<div class="addtoCartInBorder">
						<div class="addTableCartLeftPop">{$LANG.res_addtocart_price}</div>
						<div class="addTableCartRightPop">{$currency}&nbsp;{$selectmenuDetails.0.menu_price}</div>
					</div>
				{else}
					{*{$objSearchDetails->pizzzaSizeList($menuid)}*}					
					{*$objSearchDetails->pizzzaSizeList($selectmenuDetails.0.menu_category,$getcategory_option)*}
					{assign var ="pizzasizelist" value=$objSearchDetails->pizzzaSizeList($menuDetails.0.menu_category,$getcategory_option,$menuid)}
					{*<div class="addtoCartInBorder">
						<div class="addTableCartLeftPop">{$LANG.res_addtocart_price}</div>
						<div class="addTableCartRightPop">
						{section name="size" loop=$pizzasizelist}
							<div class="madInputPopup"><input class="flt" type="radio" name="pizzasliceoption" id="pizzasliceoption_{$smarty.section.size.rownum}" value="{$pizzasizelist[size].pizza_slice_id}" /><span class="addonsName">{$pizzasizelist[size].pizza_slice_name|ucfirst|stripslashes}( {$currency}{$pizzasizelist[size].pizza_slice_price} )</span></div>
						{/section}
						</div>
					</div>*}
					
					<div class="addtoCartInBorder">
						<div class="addTableCartLeftPop">{$LANG.res_addtocart_price}</div>
						<div class="addTableCartRightPop">
						{section name="size" loop=$pizzasizelist}
							<div class="madInputPopup"><input class="flt" type="radio" name="pizzasliceoption" id="pizzasliceoption_{$smarty.section.size.rownum}" value="{$pizzasizelist[size].pizza_slice_id}" {if $smarty.section.size.index eq 0}checked="checked"{/if} onclick="pizzaSlize_PriceperIndex({$smarty.section.size.index},{$menuid},{$smarty.request.resid})" /><span class="addonsName">{$pizzasizelist[size].pizza_slice_name|ucfirst|stripslashes}( {$currency}{$pizzasizelist[size].pizza_slice_price} )</span></div>
						{/section}
						</div>
					</div>					
				{/if}
				
				{*----------------------------- Add to cart ---------------------------------*}
				{if $selectmenuDetails.0.menu_addons eq 'Yes'}		
                {if count($objSearchDetails->menuAddonsList($menuid,$menuDetails.0.menu_category)) gt 0}			
					{$objSearchDetails->menuAddonsList($smarty.request.menuid,$selectmenuDetails.0.menu_category)}
					<input type="hidden" name="addonstype1" class="addonstype1" id="addonstype1" value="{$menuaddonslist_cnt}" />
					
					{if $menuaddonslist_cnt gt 0}
						{section name="add" loop=$menuaddonslist}
							{if $menuaddonslist[add].mainaddonsname neq ''}
								<div class="addtoCartInBorder">
									<div class="addTableCartLeftPop">{$menuaddonslist[add].mainaddonsname|stripslashes}</div>
									<div class="addTableCartRightPop">
										<div class="contain1">
											{*{$objSearchDetails->menuSubAddonsList($menuaddonslist[add].addonparentid,$menuaddonslist[add].menuaddons_menuid,$selectmenuDetails.0.menu_category)}*}
											{$objSearchDetails->menuSubAddonsList($menuaddonslist[add].addonparentid,$menuaddonslist[add].menuaddons_menuid,$selectmenuDetails.0.menu_category,$menuaddonslist[add].menuaddons_addonsname,$menuaddonslist[add].menu_catoption)}
											<!-- Multiple Addons-->
											
											{section name="subadd" loop=$menuSubaddonslist}
												{if $menuSubaddonslist[subadd].subaddonsname neq ''}
												
												{if $selectmenuDetails.0.sizeoption neq 'slice'}
												{$objSearchDetails->showPizzaPriceperSize($smarty.request.pizza_size,$menuaddonslist[add].addonparentid,$menuSubaddonslist[subadd].menuaddons_id)}		
												{/if}
																						
													{if $menuaddonslist[add].mainaddonsnamecnt eq '1'}
													<input type="hidden" name="singleopt" class="singleopt" id="singleopt" value="single" />
														<div class="madInputPopup single"><input class="flt" type="radio" class="addo" name="addonstype_{$menuaddonslist[add].mainaddonsname}" id="addonstypee_{$menuSubaddonslist_cnt}_{$smarty.section.subadd.rownum}" value="{$menuSubaddonslist[subadd].menuaddons_id}" {if $smarty.section.subadd.rownum eq '1'}checked="checked"{/if} />
															<span class="addonsName">&nbsp;{$menuSubaddonslist[subadd].subaddonsname|ucfirst|stripslashes}
																{if $selectmenuDetails.0.sizeoption neq 'slice'}
																	{if $menuSubaddonslist[subadd].menuaddons_priceoption eq 'Paid'} 
																		&nbsp;( {$currency} {$pizza_price_size} ) 
																	{/if}
																{else}
																	
																	{if $menuSubaddonslist[subadd].menuaddons_priceoption eq 'Paid'} 
																	&nbsp;( {$currency} 
																
																	{assign var="sliceaddonprice_val" value=$objSite->getSliceAddonsPrice_OrderPop($menuSubaddonslist[subadd].menuaddons_price_slice,$smarty.request.pos)}
																	{*{$objSite->getSliceAddonsPrice_OrderPop($menuSubaddonslist[subadd].menuaddons_price_slice,$smarty.request.pos)}*}
																	{$sliceaddonprice_val} )
																	{/if}
																{/if}
															</span>
														</div>
													{/if}
													
													{if $menuaddonslist[add].mainaddonsnamecnt neq '1'}													
														<input type="hidden" name="multipleopt" class="multipleopt" id="multipleopt" value="multiple" />	
														<div class="madInputPopup"><input class="flt {$menuaddonslist[add].mainaddonsnamecnt}','{$menuaddonslist[add].mainaddonsname|stripslashes|replace:' ':'_'}_{$menuSubaddonslist_cnt}_{$menuaddonslist[add].mainaddonsnamecnt}" type="checkbox" name="addonstype" id="{$menuaddonslist[add].mainaddonsname|stripslashes|replace:' ':'_'}_{$menuSubaddonslist_cnt}_{$smarty.section.subadd.rownum}" {if $menuaddonslist[add].mainaddonsnamecnt gt 0 }onclick="clickCheckedBox(this.id,'{$menuSubaddonslist_cnt}','{$menuaddonslist[add].mainaddonsnamecnt}','{$menuaddonslist[add].mainaddonsnamecnt}','{$menuaddonslist[add].mainaddonsname|stripslashes|replace:' ':'_'}_{$menuSubaddonslist_cnt}_{$menuaddonslist[add].mainaddonsnamecnt}');"{/if} />
															<span class="addonsName">&nbsp;{$menuSubaddonslist[subadd].subaddonsname|ucfirst|stripslashes} 
																{if $selectmenuDetails.0.sizeoption neq 'slice'}
																	{if $menuSubaddonslist[subadd].menuaddons_priceoption eq 'Paid'} 
																		&nbsp;( {$currency} {$pizza_price_size} )  
																	{/if}
																{else}
																	{if $menuSubaddonslist[subadd].menuaddons_priceoption eq 'Paid'} 
																	&nbsp;( {$currency} 
																	{assign var="sliceaddonprice_val" value=$objSite->getSliceAddonsPrice_OrderPop($menuSubaddonslist[subadd].menuaddons_price_slice,$smarty.request.pos)} 
																	{*{$objSite->getSliceAddonsPrice_OrderPop($menuSubaddonslist[subadd].menuaddons_price_slice,$smarty.request.pos)}*}
																	{$sliceaddonprice_val} )
																	{/if}
																{/if}
															</span>
														</div>
													{/if}													
												{/if}
											{/section}
										</div>
									</div>
								</div>
							{/if}
						{/section}
					{/if}
				{/if}	
                {/if}			
				
			{***************Price*******************}
			<!--<div class="addtoCartInBorder">
					<div class="addTableCartLeftPop">{$LANG.res_addtocart_addon}</div>
					<div class="addTableCartRightPop">{$currency}&nbsp;{$selectmenuDetails.0.menu_price}</div>
			</div> -->				
			
			<div class="addtoCartInBorder">
				<div class="addTableCartLeftPop">{$LANG.res_addtocart_qty}</div>
				<div class="addTableCartRightPop">
					<select class="addtocartSelect2" name="qty" id="qty">
						{$QUANTITY_LIST}
					</select>
				</div>
			</div>
			{if $selectmenuDetails.0.menu_spl_instruction eq 'Yes'}
			<div class="addtoCartInBorder">
				<div class="addTableCartLeftPop">{$LANG.res_addtocart_spl_ins}</div>
				<div class="addTableCartRightPop">
					<textarea rows="" cols="" class="addtocartTxtarea" name="splins" id="splins" ></textarea>
					<div class="addChargesApply">{$LANG.res_addtocart_spl_ins_desc1}</div>
					<div class="addChargesApply">{$LANG.res_addtocart_spl_ins_desc2}</div>
				</div>
			</div>
			{/if}
			<div class="addtocartButton" id="buttonwidth">
				<input type="button" onclick="addToMenu();" value="{$LANG.res_addtocart_addtocart}"/>
			</div>
		</div>
		</form>
	</div>
	</div>

{/if}
{*################################## NEW IMPLEMENTATION ############################################*}

{**********************************************************************************************}
{if $action eq "offerItem"}
<!--<input type="hidden" name="resid" id="resid" value="{$resid}"/>
<input type="hidden" name="offer" id="offer" value="{$offer}" />

	{if $offervalue gt 0}
	<ul class="detRiteTotalCont1Ul">
		<li>
			<label class="txt1">Discount({$rest_offer_percentage} % Off):</label>
			<label class="total1">{if $offervalue neq ''}{$offervalue}{else}0.00{/if}</label>
		</li>
	</ul>
	{/if}
	
	<ul class="detRiteTotalCont1Ul">
			<li>
				<label class="txt1"><b>Total:</b></label>
				<label class="total1"><b>{if $total neq ''}{$total}{else}0.00{/if}</b></label>
			</li>
	</ul>-->
{/if}
{************************************************************************************************************}
<!-- Add To Cart Menu -->
{if $action eq "userMenuOrderList"}
<input type="hidden" name="resid" id="resid" value="{$resid}"/>
<input type="hidden" name="minimumorder" id="minimumorder" value="{$minorderprice}"/>
<input type="hidden" name="total" id="totalprice" value="{$total}"/>
<input type="hidden" name="offer" id="offer" value="{$offer}" />

	{include file='cart.tpl'}	
	{literal}
	<script type="text/javascript">
	$(document).ready(function(){
		//execute();
	 $(".detRiteNewCont1Ul li.item .contNew1").click(function(){
    	$(this).toggleClass("active");
    	$(this).parent().parent().next().toggle();
   	 });
    });	
	 </script>
	 {/literal}
{/if}
{**********************************************************************************************}
{* Restaurant or Search Deatils Page End *}
{**********************************************************************************************}
<!-- *************************************customer signup state,city,zip************************************ -->
{if $action eq "showCusCityList"}
	<select name="customer_city" id="customer_city" class="form-control" >
		<option value="">{$LANG.cus_select}</option>
		{section name=city loop=$selectCityList}
			<option value="{$selectCityList[city].city_id}" {if $selectCityList[city].city_id eq $customerprofiledetails.0.customer_city}selected="selected"{/if}>{$selectCityList[city].cityname|stripslashes}</option>
		{/section}
	</select>
{/if}
{if $action eq "showCusCityListAdd"}
	<select name="customer_city" id="customer_city_new" class="form-control" >
		<option value="">{$LANG.cus_select}</option>
		{section name=city loop=$selectCityList}
			<option value="{$selectCityList[city].city_id}" {if $selectCityList[city].city_id eq $customerprofiledetails.0.customer_city}selected="selected"{/if}>{$selectCityList[city].cityname|stripslashes}</option>
		{/section}
	</select>
{/if}
{if $action eq "showCusAreaList"}
	<!-- Zipcode List from Customer -->
	<select name="customer_zip" class="form-control" id="customer_zip">
	<option value="">{$LANG.cus_select}</option>
		{section name=zip loop=$showZiplist}		
			<option value="{$showZiplist[zip].zipcode_id}" {if $showZiplist[zip].zipcode_id eq $customerprofiledetails.0.customer_zip}selected="selected"{/if}>{$showZiplist[zip].zipcode|stripslashes}- {$showZiplist[zip].areaname|stripslashes}</option>
		{/section}
	</select>
{/if}
{if $action eq "showCusAreaListAdd"}
	<!-- Zipcode List from Customer -->
	<select name="customer_zip" class="form-control" id="customer_zip_new">
	<option value="">{$LANG.cus_select}</option>
		{section name=zip loop=$showZiplist}		
			<option value="{$showZiplist[zip].zipcode_id}" {if $showZiplist[zip].zipcode_id eq $customerprofiledetails.0.customer_zip}selected="selected"{/if}>{$showZiplist[zip].zipcode|stripslashes}- {$showZiplist[zip].areaname|stripslashes}</option>
		{/section}
	</select>
{/if}
{if $action eq "showCusCityListcheck"}
	<select name="deliverycity" id="deliverycity" class="form-control" >
		<option value="">{$LANG.cus_select}</option>
		{section name=city loop=$selectCityList}
			<option value="{$selectCityList[city].city_id}" {if $selectCityList[city].city_id eq $customerprofiledetails.0.customer_city}selected="selected"{/if}>{$selectCityList[city].cityname|stripslashes}</option>
		{/section}
	</select>
{/if}
{if $action eq "showCusZipListcheck"}
	<!-- Zipcode List from Customer -->
	<select name="deliveryzip" class="form-control" id="deliveryzip">
	<option value="">{$LANG.cus_select}</option>
		{section name=zip loop=$showZiplist}		
			<option value="{$showZiplist[zip].zipcode_id}" {if $showZiplist[zip].zipcode_id eq $customerprofiledetails.0.customer_zip}selected="selected"{/if}>{$showZiplist[zip].zipcode|stripslashes}- {$showZiplist[zip].areaname|stripslashes}</option>
		{/section}
	</select>
{/if}

{*-----------------------------------------*}
<!-- Organize Reviews List -->
{if $action eq "reviewOrganize"}
	{section name="review" loop=$restaurant_reviews}
		{if $smarty.section.review.rownum is odd}
	      	{assign var="reviews" value="cont_review_head_left1"}
	  	{else}
	  		{assign var="reviews" value="cont_review_head_left2"}
	  	{/if}
		<div class="{$reviews}">
				<div class="upDownImg">
					{if $restaurant_reviews[review].rating eq '5' or $restaurant_reviews[review].rating eq '4' or $restaurant_reviews[review].rating eq '3'}
					<img alt="" title="" src="{$SITE_IMAGE_URL}/hand1.png" />
					{else}
					<img alt="" title="" src="{$SITE_IMAGE_URL}/hand2.png" />
					{/if}
				</div>
				<div class="likeText">
					<span class="cont_review_para">{$restaurant_reviews[review].message|ucfirst|stripslashes}</span>
					<span class="cont_review_star1">
					{if $restaurant_reviews[review].rating eq '1'} <img alt="" title="" src="{$SITE_IMAGE_URL}/single-star.png" /> 
					{elseif $restaurant_reviews[review].rating eq '2'} <img alt="" title="" src="{$SITE_IMAGE_URL}/double-star.png" /> 
					{elseif $restaurant_reviews[review].rating eq '3'} <img alt="" title="" src="{$SITE_IMAGE_URL}/triple-star.png" /> 
					{elseif $restaurant_reviews[review].rating eq '4'} <img alt="" title="" src="{$SITE_IMAGE_URL}/four-star.png" /> 
					{elseif $restaurant_reviews[review].rating eq '5'} <img alt="" title="" src="{$SITE_IMAGE_URL}/five-star.png" /> 
					{/if}
					</span>
					<span class="cont_review_post">{$LANG.cus_posted_by}<b>{$restaurant_reviews[review].customername|ucfirst|stripslashes}</b> {$LANG.cus_on} <b>{$restaurant_reviews[review].addeddate|date_format:"%d/%m/%Y"}</b></span>
				</div>
			</div>
	{sectionelse}
		<div style="color:red;margin-left:150px;">{$LANG.cus_no_review}</div>
	{/section}
{/if}

{*--------------------------------*}
{if $action eq "viewRestaurantNamewise"}

<ul class="byLocCityUl">
	{section name="allres" loop=$allrestaurantList}
		<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantDetails.php?resid={$allrestaurantList[allres].restaurant_id}&resname={$allrestaurantList[allres].restaurant_seourl}{else}menu/{$allrestaurantList[allres].restaurant_id}/{$allrestaurantList[allres].restaurant_seourl}{/if}">{$allrestaurantList[allres].restaurant_name|ucfirst|stripslashes} </a></li>
	{sectionelse}
		<span style="color:red;"> {$LANG.cus_no_rec_found} </span>
	{/section}
</ul>

{/if}

{*-------------------------------------------*}
{*GPRS PRinter Response*}
{*-------------------------------------------*}
{if $action eq "check_printer_response"}
	
	<div class="addtoCartInner">
		<div class="customaddtocartPopupHead">
			<h1 class="addtocartPopupHeadNew">{$LANG.cus_order_ack}</h1>
			<div class="addtoCartClose" onclick="myPopupWindowClose('#printer_respone');"></div>
		</div>
		{if $res_order.0.printer_response eq "Y" }
		<div class="customaddtocartPopup" style="min-height: 150px;">
			{if $res_order.0.printer_ack eq 'accepted' or $res_order.0.printer_ack eq 'Accepted'}
			<div class="customaddtocartWrap">
				<div style="float:left;">{$LANG.cus_your_order}: {$smarty.now|date_format} {$res_order.0.printer_res_deli_time}</div>
			</div>
			{elseif $res_order.0.printer_ack eq 'rejected' or $res_order.0.printer_ack eq 'Rejected'}
			<div class="customaddtocartWrap">
				<div style="float:left;">{$LANG.cus_your_order_rejected}{$res_order.0.printer_ack_msg}.</div>
			</div>
			{else}
			<div class="customaddtocartWrap">
				<div style="float:left;">{$LANG.cus_your_order_failed}.</div>
			</div>
			{/if}
		</div>
		{else}
		<div class="customaddtocartPopup">
			<div class="customaddtocartWrap">
				<div style="float:left;">{$LANG.cus_your_request_being}.</div>
				<div style="float:right;"><img alt="" title="" src="{$SITE_IMAGE_URL}/loader.gif" /></div><br /><br />
				<p>{$LANG.cus_order_is_under_ack}</p><br />
				<p>{$LANG.cus_please_wait}....</p>
			</div>
		</div>
		{/if}
	</div>
{/if}
{*-------------------------------------------------------------- Change Status and Delete ------------------------------------*}
{if $action eq 'Address_Book'}

	{include file="customerMyaccount_addressBook_ajax.tpl"}

{/if}
{if $action eq 'customerUpdatePrimary'}

	{include file="customerMyaccount_addressBook_ajax.tpl"}

{/if}
{if $action eq 'AddNewAddress'}

	{include file="customerMyaccount_addressBook_ajax.tpl"}

{/if}

{*-------------------------------------------------------------- Edit Customer Address ----------------------------------------------------------------------*}
{if $action eq 'EditAddress'}
	
    <div class="MyAccountBg clearfix">
		<h1 class="MyAccountBgHead">{$LANG.customer_myacc_edit_your_address}</h1>
		<div class="mandatoryField"><a class="addressbook-lnk" href="javascript:void(0);" onclick="return backtolist();"><i class="glyphicon glyphicon-circle-arrow-left marRight"></i> Address List</a></div>
	
	<div class="clr"></div>
    <div class="myAccInnerBg clearfix form-horizontal">
    	<div class="form-group">
	    	<div class="col-sm-4 col-sm-offset-4">
				<div class="mandatoryField">
					<span class="redStar">{$LANG.cus_mandatory_symbol|utf8_encode}</span>
					- {$LANG.customer_myacc_Mandatory}
				</div>
			</div>
		</div>
		<div class="form-group">
	    	<div class="col-sm-6 col-sm-offset-4">
				<span class="myAddressEdit1">{$LANG.customer_myacc_an_updo}.</span>
			</div>
		</div>
		<div class="form-group">
	    	<div class="col-sm-4 col-sm-offset-4">
				<span id="primaryerrormsg" class="errormsg_login"></span>
				<span id="primarysuccessmsg" class="succmsg"></span>
			</div>
		</div>
		<input type="hidden" id="Address_id" value="{$customerAddress.0.id}">
		<div class="form-group">
			<label class="col-sm-4 control-label font-normal">
				<span class="redStar">{$LANG.cus_mandatory_symbol|utf8_encode}</span>
				{$LANG.cus_address_title|utf8_encode}
			</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="address_title" id="address_title" value="{$customerAddress.0.customer_address_title|stripslashes}" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label font-normal">{$LANG.customer_myacc_plot_apt_door_numb}</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="doornumber" id="doornumber" value="{$customerAddress.0.customer_apartment_name|stripslashes}" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.cus_mandatory_symbol|utf8_encode}</span>{$LANG.customer_myacc_customer_street}</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="customerstreet" id="customerstreet" value="{$customerAddress.0.customer_street|stripslashes}" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.cus_mandatory_symbol|utf8_encode}</span>{$LANG.customer_myacc_state}</label>
			<div class="col-sm-4">
				<select name="customer_state" id="customer_state" class="form-control" onchange="getCityListCus(this.value);">
					<option value="">{$LANG.cus_myacc_select_state}</option>
					{section name="state" loop=$showStatelist}
						<option value="{$showStatelist[state].statecode}" {if $showStatelist[state].statecode eq $customerAddress.0.customer_state}selected="selected"{/if}>{$showStatelist[state].statename|stripslashes}</option>
					{/section}
				</select>						
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.cus_mandatory_symbol|utf8_encode}</span>{$LANG.customer_myacc_city}</label></li>				
			<div class="col-sm-4">
				<div id="showCusCityList">
					<select name="customer_city" id="customer_city" class="form-control" >
						<option value="">{$LANG.cus_myacc_first_sel_state}</option>
						{section name=city loop=$selectCityList}
							<option value="{$selectCityList[city].city_id}" {if $selectCityList[city].city_id eq $customerAddress.0.customer_city}selected="selected"{/if}>{$selectCityList[city].cityname|stripslashes}</option>
						{/section}
					</select>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.cus_mandatory_symbol|utf8_encode}</span>{$LANG.customer_myacc_zip}</label>
			<div class="col-sm-4">
				<div id="showCusZipList">
					<input type="text" class="form-control" name="customer_zip" id="customer_zip" autocomplete="off" value="{$customerAddress.0.customer_zip}"   onkeyup="autoSuggestZip();"/>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label font-normal">{$LANG.customer_myacc_landmark}</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="landmark" id="landmark" value="{$customerAddress.0.customer_landmark|stripslashes}" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label font-normal">{$LANG.customer_myacc_landline}</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="landline" id="landline" value="{$customerAddress.0.customer_landline|stripslashes}"  />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label font-normal">{$LANG.customer_myacc_address_label}</label></li>
			<div class="col-sm-4">
				<label class="radio-inline">
					<input type="radio" class="btn" name="customer_addresslabel" id="customer_addresslabel_home" value="home" {if $customerAddress.0.customer_address_label eq 'home'}checked="checked"{/if}/>
					{$LANG.customer_myacc_home}
				</label>
				<label class="radio-inline">
					<input type="radio" class="btn" name="customer_addresslabel" id="customer_addresslabel_off" value="office" {if $customerAddress.0.customer_address_label eq 'office'}checked="checked"{/if}/>
					{$LANG.customer_myacc_office}
				</label>
				<label class="radio-inline">
					<input type="radio" class="btn" name="customer_addresslabel" id="customer_addresslabel_other" value="other" {if $customerAddress.0.customer_address_label eq 'other'}checked="checked"{/if}/>
					{$LANG.customer_myacc_other}
				</label>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-4 col-sm-offset-4">
				<input class="updateBtn" type="button" id="editaddressbook" onclick="return customerUpdatePrimaryAddress();" value="{$LANG.customer_myacc_change_address}" />
			</div>
		</div>
    </div>
</div>
{/if}

{*---------------------------------- Get Address From Customer's address book for checkout --------------------------------------------*}
{if $action eq 'GetAddress'}
	{$objCustomer->getParticularAddress()}
	<div class="form-group">
		<label for="deliverystreet" class="col-sm-4 control-label font-normal">{if $smarty.request.deliverypickup neq 'pickup'}<span class="redStar">*</span>{/if}{$LANG.checkout_locality}</label>
		<div class="col-sm-5">
			<input class="form-control" type="text" name="deliverystreet" id="deliverystreet" value="{$customeraddress[0].customer_street|stripslashes}" />
			<span id="deliverystreeterrormsg"></span>
		</div>
	</div>
	 <div class="form-group">
		<label for="deliveryaddress" class="col-sm-4 control-label font-normal">{$LANG.checkout_doorno}</label>
		<div class="col-sm-5">
			<input class="form-control" type="text" name="deliveryaddress" id="deliveryaddress" value="{$customeraddress[0].customer_apartment_name|stripslashes}" />
			<span id="deliveryaddresserrormsg"></span>
		</div>
	</div>
   
	{*<ul class="customsignupUl">
		<li>
			<label class="name">{$LANG.checkout_landmark}</label>
		</li>
		<li>
			<input class="txt" type="text" name="deliverylandmark" id="deliverylandmark" value="{$customeraddress[0].customer_landmark|stripslashes}" />
			<span class="phoneNo">{$LANG.checkout_deliveryhelp}</span></li>
	</ul>
	<ul class="customsignupUl">
		<li>
			<label class="name"><span class="redStar">*</span>{$LANG.checkout_area}</label>
		</li>
		<li>
			<input class="txt" type="text" name="deliveryarea" id="deliveryarea" value="{$customeraddress[0].customer_area|stripslashes}" />
		<span id="deliveryareaerrormsg"></span></li>
	</ul>*}
<!--		<ul class="customsignupUl">
		<li><label class="name"><span class="redStar">*</span>{$LANG.checkout_zip}</label></li>
		<li><input type="text" class="txt" name="deliveryzip" id="deliveryzip" value="{$customerDetails[0].customer_zip}"/></li>
		<span id="deliveryziperrormsg"></span>
	</ul>-->
<!--		<ul class="customsignupUl">
		<li>
			<label class="name"><span class="redStar">*</span>{$LANG.checkout_city}/State</label>
		</li>
		<li>
			<input class="txt1" type="text" name="deliverycity" id="deliverycity" value="{$customerDetails[0].customer_city|stripslashes}">
		</li>
		<li><input type="text" class="txt2" name="deliverystate" id="deliverystate" value="{$customerDetails[0].customer_state}"/></li>
		<span id="deliverycityerrormsg"></span>
	</ul>-->
    {*----------------------------state,city,zipcode-----------------*}		
     <div class="form-group">
	 	<label for="deliverystate" class="col-sm-4 control-label font-normal">{if $smarty.request.deliverypickup neq 'pickup'}<span class="redStar">*</span>{/if}{$LANG.checkout_state}</label>
		<div class="col-sm-5">
			<select name="deliverystate" id="deliverystate" class="form-control" onchange="getCityListCuscheck(this.value);"> 
			<option value= "">{$LANG.checkout_selectstate}</option>
				{section name="state" loop=$showStatelist}
						<option value="{$showStatelist[state].statecode}" {if $showStatelist[state].statecode eq $customeraddress.0.customer_state}selected="selected"{/if}>{$showStatelist[state].statename|stripslashes}</option>
				{/section}
			</select>
			<span id="deliverystateerrormsg"></span>
		</div>
	</div>
	
     <div class="form-group">
	 	<label for="deliverycity" class="col-sm-4 control-label font-normal">{if $smarty.request.deliverypickup neq 'pickup'}<span class="redStar">*</span>{/if}{$LANG.checkout_city}</label>
		<div class="col-sm-5">
			<div id="showCusCityListcheck">
			<select name ="deliverycity" class= "form-control" id="deliverycity">
				<option value="">{$LANG.checkout_firstselectstate}</option>
				{section name=city loop=$selectCityList}
					<option value="{$selectCityList[city].city_id}" {if $selectCityList[city].city_id eq $customeraddress.0.customer_city}selected="selected"{/if}>{$selectCityList[city].cityname|stripslashes}</option>
				{/section}
			</select>	
			</div>			
			<span id="deliverycityerrormsg"></span>
		</div>
	</div>
	 <div class="form-group">
	 	<label for="deliveryzip" class="col-sm-4 control-label font-normal">{if $smarty.request.deliverypickup neq 'pickup'}<span class="redStar">*</span>{/if}{$LANG.checkout_zip}</label>
		<div class="col-sm-5">
			<div id="showCusZipListcheck">
			<input type="text" class="form-control" name="deliveryzip" id="deliveryzip" value="{$customeraddress.0.customer_zip}">
			{*<input type="text" class="txt" name="deliveryzip" id="deliveryzip" autocomplete="off" value="{if $customerAddress.0.customer_zip neq ''}{$customerAddress.0.customer_zip}{else}Zip Code{/if}" onfocus="if (this.value == '{if $customerAddress.0.customer_zip neq ''}{$customerAddress.0.customer_zip}{else}Zip Code{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $customerAddress.0.customer_zip neq ''}{$customerAddress.0.customer_zip}{else}Zip Code{/if}';" onkeyup="autoSuggestZip();"/>*}
			
			{*<select name="deliveryzip" class="selectboxindex" id="deliveryzip">
				<option value = "">{$LANG.checkout_firstselectcity}</option>
				{section name=zip loop=$showZiplist}
					<option value="{$showZiplist[zip].zipcode_id}" {if $showZiplist[zip].zipcode_id eq $customerDetails.0.customer_zip}selected="selected"{/if}>{$showZiplist[zip].zipcode|stripslashes} - {$showZiplist[zip].areaname|stripslashes}</option>
				{/section}
			</select>*}	
			</div>							
			<span id="deliveryziperrormsg"></span>
		</div>
	</div>	
    {*------------------------------state,city,zipcode end--------------------*}

{/if}

{*-------Customer Filter Order------------*}
{if $action eq "OrderFilter"}
	
	<!--Date Picker Files-->
	{*<script type="text/javascript" src="{$SITE_JS_URL}/jquery-1.7.2.js"></script>
	<script type="text/javascript" src="{$SITE_JS_URL}/zebra_datepicker.js"></script>
	{literal}
	<script type="text/javascript">
		$(document).ready(function() 
		{
	   		$('#order_from').Zebra_DatePicker({
				direction: [false, '2012-01-01'],
				pair: $('#report_from') 	
	   		});
	   		 
	   		$('#order_to').Zebra_DatePicker({
	        	direction: [false, '2012-01-01'],
				pair: $('#report_to')                
	   		});
	   	});
	</script>
	{/literal}*}
		
	{$objCustomer->customerMyorderHistory()}
    <div id="order_filter">
        <span class="sortbytext">From</span>
		<input type="text" id="order_from" name="order_from" value="{$smarty.request.startdate}" size="15" class="sortbyline"/>
		<span class="sortbytext">To</span>
		<input type="text" id="order_to" name="order_to" value="{$smarty.request.enddate}" size="15" class="sortbyline"/>
		<span class="showBtn"><input type="submit" name="actionsubmit" value="Show" id="show" onclick="return order_validate();"/></span>
    </div>
    
	<div class="myAccInnerBg clearfix">
		<div class="contain" id="cus_myorder">
			<div class="tablecontainer">
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tbody>
						<tr class="orderInnerHead">
							<td class="orderHeading" width="15%">{$LANG.customer_myacc_order_number}</td>
							<td class="orderHeading" width="15%">{$LANG.customer_myacc_total_price}</td>
							<td class="orderHeading" width="15%">{$LANG.customer_myacc_payment}</td>
							<td class="orderHeading" width="15%">{$LANG.customer_myacc_order_at}</td>
							<td class="orderHeading" width="15%">{$LANG.customer_myacc_status}</td>
							<td class="orderHeading" width="15%">&nbsp;</td>
							<td class="orderHeading" width="10%">&nbsp;</td>
						</tr>
						{section name="cus_ord" loop=$customerOrderList}
						<tr class="orderInnerCont">
							<td>{$customerOrderList[cus_ord].ordergenerateid}</td>
							<td><span class="rupeeImg">{$currency}</span><span class="rupeePrice">{$customerOrderList[cus_ord].ordertotalprice}</span></td>
							<td>{if $customerOrderList[cus_ord].payment_type eq 'cod'}Cash on Delivery{else}{$customerOrderList[cus_ord].payment_type|ucfirst|stripslashes}{/if}</td>
							<td>{$customerOrderList[cus_ord].orderdate|date_format:"%a %e,%Y %H:%M"}</td>
							<td>
								{if $customerOrderList[cus_ord].status eq 'completed'}Delivered
								{else}{$customerOrderList[cus_ord].status|ucfirst|stripslashes}
								{/if} 
							</td>
							<td align="center">
								<a class="viewFullDetails bold" onclick="orderViewFullDetails({$customerOrderList[cus_ord].orderid});" href="javascript:void(0);">{$LANG.cus_myacc_viewfull_detail}</a> 
							</td>
							<td>{if $customerOrderList[cus_ord].status eq 'completed'}<a class="orderEditDetailsview orderEditDetailsviewNew1 bold" onclick="return customerReviews('{$customerOrderList[cus_ord].orderid}','{$customerOrderList[cus_ord].restaurant_id}');" href="#customerReviewsPop" data-toggle="modal">{$LANG.cus_myacc_review}</a>{/if}</td>
						</tr>
						{sectionelse}
						<tr><td colspan="7" style="color:red;">{$LANG.cus_myacc_no_rec_found}</td></tr>
						{/section}
					</tbody>
				</table>		
			</div>
		</div>
         <!--Full Order-->
		<div class="contain" id="cus_fullorder"></div>
	</div>
{/if}


{if $action eq "mapInfoUpdate"}
	<!--Google Map Delivery Area-->
	<div class="addPageCont" id="map_distance_show">
		<input type="hidden" name="restaurant_address" id="restaurant_address" value="{$restaurant_address_map}" />
		<input type="hidden" name="rest_deliver_miles" id="rest_deliver_miles" value="{if $restaurantDetailsList.0.restaurant_delivery_distance neq ''}{$restaurantDetailsList.0.restaurant_delivery_distance|stripslashes}{else}5{/if}" />
		<div id="map" style="width:100%;height:500px;"></div>
	</div>
{/if}

{if $action eq "Datepickerdate"}

{if $times eq ''}
  <select name="time_delivery" id="time_delivery">
   <option value="">Closed</option>     
     
  </select>
  |@@|Closed
{else}
<select name="time_delivery" id="time_delivery">
	{foreach key=opentime item=timelist from=$times}
        {$timelist}
    {/foreach}
</select>
|@@|Open
{/if}
{/if}


 {if $action eq "verification"}
	  <span class="contact_verifycode" class="contact_verifycode" id="captchcode">{$rndnumber}</span>
 {/if}
 
{if $action eq 'checkoutDeliveryCharge'} 
	{if $cartDetailsCnt gt 0 and $subtotal neq ''}
					<a href="{$SITE_BASEURL}/{if $smarty.request.resid neq ''}restaurantDetails.php?resid={$smarty.request.resid}&resname={$restaurantseourl}&ordoption={$smarty.request.deliverypickup}{else}index.php{/if}" class="checkout_replan">{*$LANG.checkout_replanbut*}Edit Order</a>
				{else}
					<a href="{$SITE_BASEURL}/index.php" class="checkout_replan">{*$LANG.checkout_replanbut*} Edit Order</a>
				{/if}
				<div class="cartRightHeadInfo clearfix">
					<h1>{$restaurantname|stripslashes} {$LANG.checkout_varityorder}</h1>
					<p class="searchAddressCont">{$restaurant_streetaddress}</p>
				</div>
				<div class="detailsRightMiddle1">
					<div class="contain">
						<ul class="detRiteNewCont1Ul checkoutItemHead">
							<li class="item"><label class="bgNew">{$LANG.checkout_item}</label></li>
							<li class="Qty"><label class="bgNew align-center">{$LANG.checkout_qty}</label></li>
							<li class="price "><label class="bgNew align-right">{$LANG.checkout_price}</label></li>
						</ul>
						
						<input type="hidden" name="ordertotalprice" id="ordertotalprice" value="{if $smarty.request.deliverypickup eq 'pickup'}{$total}{else}{$total}{/if}"/>
						
						{section name=cart loop=$cartDetails}
						<ul class="detRiteNewCont1Ul">
							<li class="item">
								<label class="{if $cartDetails[cart].menutype eq 'veg'}contNew1{else}contNew1{/if}">{$cartDetails[cart].menuname|ucfirst|stripslashes|html_entity_decode} {if $cartDetails[cart].pizza_size neq ''}({$cartDetails[cart].pizza_size}){/if}</label>
							</li>
							<li class="Qty"><label class="{if $cartDetails[cart].menutype eq 'veg'}contNew1{else}contNew1{/if}"> {$cartDetails[cart].quantity}  </label></li>
							<li class="price"><label class="{if $cartDetails[cart].menutype eq 'veg'}contNew1{else}contNew1{/if}">{$cartDetails[cart].tot_menuprice}</label></li>
						</ul>
						{if $cartDetails[cart].pizza_crustname neq ''}
							<span class="deal_info_desc1">
								<span class="contain">{$LANG.checkout_crust}:
								{$cartDetails[cart].pizza_crustname|stripslashes}&nbsp;</span>
							</span>
						{/if}
						{if $cartDetails[cart].pizza_addonsname neq ''}
							<span class="deal_info_desc1">
								<span class="contain">{$LANG.checkout_add_topping}:
								{$cartDetails[cart].pizza_addonsname|stripslashes|html_entity_decode}&nbsp;</span>
							</span>
						{/if}
						{if $cartDetails[cart].addonsname neq ''}
							<span class="deal_info_desc1">
								<span class="contain">{$LANG.checkout_addons}
								{$cartDetails[cart].addonsname|ucfirst|stripslashes}</span>
								<!--<span class="option2">{$cartDetails[cart].addonsname|ucfirst|stripslashes}&nbsp;({$currency}&nbsp;{$cartDetails[cart].addonsprice} Extra)</span>-->
							</span>
						{/if}
						{if $cartDetails[cart].specialinstruction neq ''}
							<span class="deal_info_desc1">
								<span class="contain">{$LANG.checkout_spl_inst}:
								{$cartDetails[cart].specialinstruction|ucfirst|stripslashes}</span>
							</span>
						{/if}
						{sectionelse}
						<span class="noOrderYet">{$LANG.checkout_noitem}</span>
						{/section}
						<div class="border100"></div>
						<ul class="detRitePriceCont1Ul">
							<li>
								<label class="txt1">{$LANG.checkout_subtotal}:</label>
								<label class="price1">{if $cartDetailsCnt gt 0 and $subtotal neq ''}{$subtotal|string_format:"%.2f"}{else}0.00{/if}</label>
							</li>
							<li>
								<label class="txt1">{$LANG.checkout_tax} {if $salestax neq '0.00'}({$salestax} %){/if}:</label>
								<label class="price1">{if $cartDetailsCnt gt 0 and $salestax neq ''}{$taxamount|string_format:"%.2f"}{else}0.00{/if}</label>
							</li> 
							{if $deliveryoption eq 'Yes' and $smarty.request.deliverypickup neq 'pickup'}
							<li>
								<label class="txt1">{$LANG.checkout_deliverycharge}:</label>
								<label class="price1"><span class="color3">{if $cartDetailsCnt gt 0}{if $deliverycharge eq '0.00'}{$LANG.checkout_free}{else}{$deliverycharge}{/if}{else}0.00{/if}</span></label>
							</li> 
							{/if}                   
						</ul>
						
						{if !empty($rest_offer_percentage)}
						<input type="hidden" name="offer" id="offer" value="{$offer}" />
							{if $offervalue gt 0}
							<ul class="detRiteTotalCont1Ul">
								<li>
									<label class="txt1">{$LANG.checkout_discount} ({$rest_offer_percentage} {$LANG.checkout_percentoff}):</label>
									<label class="total1" id="total1">{if $cartDetailsCnt gt 0 and $offervalue neq ''}- {$offervalue|string_format:"%.2f"}{else}0.00{/if}</label>
								</li>
							</ul>
							{/if}
						{/if}
						{*----------------------Voucher concept-------------------------------*}
						{if $voucher eq 'Available'}
								<div class="form-group">
									<div class="col-sm-12" id="voucherErr">{$voucherMsg}</div>
									<label class ="control-label col-sm-12 align-left ">{$LANG.checkout_enter_voucher_code|utf8_encode}</label>
									<div class="col-sm-12 margintopbot10">
										<div class="input-group">
											<input type="text" class="form-control" id="voucher" />
											<label class="input-group-addon" >
												<input type="submit" class="apply-icn" value="" onclick="return applyVoucherCode({$smarty.request.resid});" />
											</label>
										</div>
									</div>
								</div>
								
							{else}
								<input type="hidden" id="voucher" value="{$smarty.session.voucher}"/>
								{if $voucherMsg eq '' and $voucherPrice neq ''}
									<div class="contain">
										
											<label class="vou-name">Voucher Discount Price</label>
										
											<label class="vou-price">- {$currency}&nbsp;{$voucherPrice|string_format:"%.2f"}</label>
											<span class="voucherdelete" onclick="return removeVoucherCode({$smarty.request.resid});">x</span>
										
									</div>
								{/if}
							{/if}
						
						<ul class="detRiteTotalCont1Ul" id="checkupdatetotalshow" style="display:none;">
							<li>
								<label class="txt1">Tip:</label>
								<label class="total1" id="checkpervalue">0.00</label>
								<span id="checkpervalue1"></span>
							</li>  
						</ul>
						<ul class="detRiteTotalCont1Ul">
							<li>
								<label class="txt1">{$LANG.checkout_total}:&nbsp;&nbsp;&nbsp;&nbsp;</label>
								{if $smarty.request.deliverypickup neq 'pickup'}
								<label class="total1" id="checkupdatetotal" >{$currency}&nbsp;{if $cartDetailsCnt gt 0 and $total neq ''}{$total|string_format:"%.2f"}{else}0.00{/if}</label>
								<input type="hidden" name="grandtotal" id="grandtotal" value="{if $cartDetailsCnt gt 0 and $total neq ''}{$total|string_format:"%.2f"}{else}0.00{/if}"/>
								{else}
								<label class="total1" id="checkupdatetotal">{$currency}&nbsp;{if $cartDetailsCnt gt 0 and $total neq '' and $deliveryoption eq 'Yes'}{($total-$deliverycharge)|string_format:"%.2f"}{elseif $cartDetailsCnt gt 0 and $total neq '' and $deliveryoption eq 'No'}{$total|string_format:"%.2f"}{else}0.00{/if}</label>
								<input type="hidden" name="grandtotal" id="grandtotal" value="{if $cartDetailsCnt gt 0 and $total neq '' and $deliveryoption eq 'Yes'}{($total-$deliverycharge)|string_format:"%.2f"}{elseif $cartDetailsCnt gt 0 and $total neq '' and $deliveryoption eq 'No'}{$total|string_format:"%.2f"}{else}0.00{/if}"/>
								{/if}
							</li>
						</ul>
					</div>
				</div>  
{/if} 
{*<!--     Yelp Reviews -->*}
{if $action eq "yelpreviewsdisplay"}
    	
			{if $yelp_reviews.1 neq ''}
			 <div class="total-rev">
                 <img src="{$yelp_reviews.1}" /> {$yelp_reviews.0} Reviews
            </div>
			{/if}
            {if $yelp_reviews.2 neq ''}
                <div class="last-revBox">
                    
                	<div class="last-revHead">
                    	<span class="last-revTit">Last Review</span>
                    	<div class="relate pull-right">
                            <img src="{$yelp_reviews.3}"/>{$yelp_reviews.6}
                        </div>
                    </div>
                	<span class="rev-info">{$yelp_reviews.4}<a href="{$yelp_reviews.8}" target="_blank">Read more</a></span>
                	<span class="rev-by">Posted by {$yelp_reviews.7} on Yelp.com</span>
                    
                </div>
            {else}
               <span class="no-rec"> No record(s) found</span>
            {/if}
		
{/if}
{if $action eq "Datepickerdatebook"}

{if $times eq ''}
  <select name="booking_hours" id="booking_hours" class="form-control">
   <option value="">Closed</option>     
     
  </select>
|@@|Closed   
  
{else}    
<select name="booking_hours" id="booking_hours" class="form-control">
 
	{foreach key=opentime item=timelist from=$times}
        {$timelist}
    {/foreach}
    
</select>
|@@|Open   
{/if}

{/if}

{if $action eq "cartTotal"}
	<div class="add_cart"><span id="CartCount">{if $CartCount neq ''}{$CartCount}{else}0{/if}</span></div> <p class="text">Your Cart - </p> 
                
    <span class="totalPriceCount">{$currency} {if $cartDetailsCnt gt 0 and $total neq ''}{$total|string_format:"%.2f"}{else}0.00{/if}</span>
{/if}


{if $action eq "showAllRestaurants"}
	{section name=elena loop=$restaurants.restaurants}
		<h1> {$restaurants.restaurants[elena].restaurant_name}	</h1>
	{/section}
{/if}