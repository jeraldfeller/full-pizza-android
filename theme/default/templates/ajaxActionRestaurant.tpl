{if $smarty.session.lan eq 'CS' || $smarty.session.lan eq 'SK' || $smarty.session.lan eq 'SL' || $smarty.session.lan eq 'AR' || $smarty.session.lan eq 'SV' || $smarty.session.lan eq 'LT' }
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
{else}
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
{/if}
{**********************************************************************************************}
{* Dashboard Tab Start *}
{**********************************************************************************************}
	
	{if $action eq "dashboardTodayorder"}
		<!-- Dashboard Today Details -->
		{include file='restaurantOwnerMyaccount_dashboard_dtoday.tpl'}
	{/if}
	
	{if $action eq "dashboardweekorder"}
		<!-- Dashboard Week Details -->
		{include file='restaurantOwnerMyaccount_dashboard_dweek.tpl'}
	{/if}
	
	{if $action eq "dashboardMonthorder"}
		<!-- Dashboard Month Details -->
		{include file='restaurantOwnerMyaccount_dashboard_dmonth.tpl'}
	{/if}
	{if $action eq "dashboardYearorder"}
		<!-- Dashboard Year Details -->
		{include file='restaurantOwnerMyaccount_dashboard_dyear.tpl'}
	{/if}
	{************************************************************************************************************}
	
	{if $action eq "dashboardAllorder"}
		<!-- Dashboard Details All Order -->
		{include file='restaurantOwnerMyaccount_dashboard_ord_all.tpl'}
	{/if}
	
	{if $action eq "dashboardPendorder"}
		<!-- Dashboard Details Pending Order -->
		{include file='restaurantOwnerMyaccount_dashboard_ord_pending.tpl'}
	{/if}
	
	{if $action eq "dashboardProcessorder"}
		<!-- Dashboard Details Processing Order -->
		{include file='restaurantOwnerMyaccount_dashboard_ord_process.tpl'}
	{/if}
	
	{if $action eq "dashboardDeliverorder"}
		<!-- Dashboard Details Deliver Order -->
		{include file='restaurantOwnerMyaccount_dashboard_ord_deliver.tpl'}
	{/if}
	
	{if $action eq "dashboardFailorder"}
		<!-- Dashboard Details Failed Order -->
		{include file='restaurantOwnerMyaccount_dashboard_ord_failed.tpl'}
	{/if}
	
	{if $action eq "dashboardCommissionPrice"}
		<!-- Dashboard Commission details -->
		<div class="myAccntTopRightBox1">
			<h1 class="myAccntTopRightBoxHead">{$LANG.res_myaccount_dashtotprice}</h1>
			<span class="myAccntTopRightBoxTxt">{$currency}&nbsp; {$totalorderprice}</span>
		</div>
		<div class="myAccntTopRightBox1">
			<h1 class="myAccntTopRightBoxHead">{*{$LANG.res_myaccount_dashtotprice}*} {$LANG.res_total_menu_price}</h1>
			<span class="myAccntTopRightBoxTxt">{$currency}&nbsp; {$totalsalesprice}</span>
		</div>
		
		<div class="myAccntTopRightBox2">
			<h1 class="myAccntTopRightBoxHead">{$LANG.res_myaccount_dashremprice}</h1>
			<span class="myAccntTopRightBoxTxt">{$currency}&nbsp; {$remainingprice}</span>
		</div>
		<div class="myAccntTopRightBox2">
			<h1 class="myAccntTopRightBoxHead">{$LANG.res_myaccount_dashcomprice} ({$commission} %)</h1>
			<span class="myAccntTopRightBoxTxt">{$currency}&nbsp; {$totalsalesCommissionprice}</span>
		</div>
		
		<div class="myAccntTopRightBox1">
			<h1 class="myAccntTopRightBoxHead"></h1>
			<span class="myAccntTopRightBoxTxt"></span>
		</div>
		<div class="myAccntTopRightBox1">
			<h1 class="myAccntTopRightBoxHead"></h1>
			<span class="myAccntTopRightBoxTxt"></span>
		</div>
		
		<div class="myAccntTopRightBox3">
			<h1 class="myAccntTopRightBoxHead"></h1>
			<span class="myAccntTopRightBoxTxt"></span>
		</div>
		<div class="myAccntTopRightBox3">
			<h1 class="myAccntTopRightBoxHead"></h1>
			<span class="myAccntTopRightBoxTxt"></span>
		</div>
	{/if}
{**********************************************************************************************}
{* Dashboard Tab End *}
{**********************************************************************************************}

{**********************************************************************************************}
{* Orders Tab Start *}
{**********************************************************************************************}
	{if $action eq "Order"}
		{include file='restaurantOwnerMyaccount_order.tpl'}
	{/if}
	{if $action eq "Orderstatus"}
		{include file='restaurantOwnerMyaccount_order_ajax.tpl'}
	{/if}
	{if $action eq "categoryDropList"}
		<select class="selectbx" name="menu_category" id="menu_category" onchange="otherSpecify('category');getShowAddons(this.value);" >
			<option value="">{$LANG.res_select}</option>
			{foreach from=$showcategorylist item=cat}
				<option value="{$cat.maincateid}" {if $cat.maincateid eq $menudet.0.menu_category}selected="selected"{/if}>{$cat.maincatename}</option>
			{/foreach}
			<option value="other" id="categoryOther" onclick="otherSpecify('category');">{$LANG.res_myaccount_menucatoptother}</option>
		</select>
	{/if}
	{if $action eq "categoryDropListEdit"}
    
		<select class="selectbx menu_categoryedit" name="menu_category" id="menu_category1" onchange="otherSpecifyEdit('category');getShowAddonsEdit(this.value);" >
			<option value="">{$LANG.res_select}</option>
			{foreach from=$showcategorylist item=cat}
				<option value="{$cat.maincateid}" {if $cat.maincateid eq $catval}selected="selected"{/if}>{$cat.maincatename}</option>
			{/foreach}
			<option value="other" id="categoryOtherEdit" onclick="otherSpecifyEdit('category');">{$LANG.res_myaccount_menucatoptother}</option>
		</select>
        {/if}
	
	{if $action eq "categoryDropListAddon"}
		<select class="selectbx" name="menu_categor" id="menu_categor" onchange="otherSpecifyAddon('category');">
			<option value="">{$LANG.res_select}</option>
			{foreach from=$showcategorylist item=cat}
				<option value="{$cat.maincateid}" {if $cat.maincateid eq $menudet.0.menu_category}selected="selected"{/if}>{$cat.maincatename}</option>
			{/foreach}
			<option value="other" id="categoryOther_addon" onclick="otherSpecifyAddon('category');">{$LANG.res_myaccount_addoncatoptother}</option>
		</select>
	{/if}
	{if $action eq "categoryDropListAddonEdit"}
		<select class="selectbx addons_category" name="menu_categor" id="menu_categor1" onchange="otherSpecifyAddonEdit('category');" >
			<option value="">{$LANG.res_select}</option>
			{foreach from=$showcategorylist item=cat}
				<option value="{$cat.maincateid}" {if $cat.maincateid eq $catval}selected="selected"{/if}>{$cat.maincatename}</option>
			{/foreach}
			<option value="other">{$LANG.res_myaccount_addoncatoptother}</option>
		</select>
	{/if}
	
	{if $action eq "orderFullDetails"}
		<!-- Order Full details POPUP -->
		<!--<div class="addtocartPopupHead">
			<h1 class="addtocartPopupHeadNew">{$SITE_NAME}</h1>
			{*<h1 class="addtocartPopupHeadNew">Order No - {$orderDetails.0.ordergenerateid}</h1>*}
			<div class="addtoCartClose" data-dismiss="modal"></div>
		</div>-->
        
        
		<div class="container" id="logoimg" style="display:none; background-color:#ffffff">
			<img src="{$SITE_LOGO}" alt="{$SITE_NAME}" title="{$SITE_NAME}" />
		</div>
		<div class="order-box">
			<div class="popTxtarea1Inner1MyAcc">
				<a class="pdf" href="viewfullDetailsPDF.php?orderid={$orderDetails.0.orderid}" target="_blank"  >{$LANG.res_myaccount_viewdwnformat}</a>
				<a class="print" href="javascript:void(0);" onclick="print();">{$LANG.res_myaccount_viewprint}</a>
			</div>
			<div class="frt"><a href="javascript:void(0);" class="backHistTxt"  onclick="backHistory();">{$LANG.rest_back_history}</a></div>
			<div class="addtocartWrap newPopupHeight1">
				<!--<h1 class="addtoCartMainhead">Order Number - {$orderDetails.0.ordergenerateid}</h1>-->
				<div class="addtoCartInner">
					<a href='javascript:void(0);' id="printpage" onclick='window.print();' class='print' style="display:none">Print this page</a>
					<div class="thanksTableOrderNew1">
						<span class="orderNewPopHead"><b>{$LANG.res_myaccount_viewordernumber} :</b> {$orderDetails.0.ordergenerateid}</span>
						<span class="orderNewPopsubHead"><b>{$LANG.res_myaccount_vieworderat}: </b>{$orderDetails.0.orderdate} </span>
						<span class="orderNewPopsubHead"><b>{$LANG.res_myaccount_viewstatus}: </b>{if $orderDetails.0.status eq 'completed'}{$LANG.res_delivered}{else}{$orderDetails.0.status|ucfirst}{/if}</span>
						<!--<input type="button" class="addtoNotebtn1" value="Edit" />-->
                        {if $gprsoption eq 'Yes'}
                            <span class="orderNewPopsubHead"><b>Order is sent to Printer: </b>{$orderDetails.0.printer_sent|stripslashes}</span>
                            <span class="orderNewPopsubHead"><b>Printer received or not the order: </b>{$orderDetails.0.printer_response|stripslashes}</span>
                            {if $orderDetails.0.printer_ack neq ''}
                                <span class="orderNewPopsubHead"><b>Printer acknowledgement: </b>{$orderDetails.0.printer_ack|stripslashes}</span>
                            {/if}
                        {/if}
                        {*if $orderDetails.0.status eq 'completed'}
                        <span class="orderNewPopsubHead"><b>Food Ready/Deliver Time: </b>{$orderDetails.0.printer_res_deli_time|stripslashes}</span>
                        {elseif $orderDetails.0.status eq 'failed'}
                        <span class="orderNewPopsubHead"><b>Reason: </b>{$orderDetails.0.printer_ack_msg|stripslashes}</span>
                        {/if*}
					</div>
					<table class="table table-striped  table-hover table-bordered">
						<tr class="">
                            <th class="bold" width="10%">{$LANG.res_myaccount_sno}</th>
							<th class="bold" width="20%">{$LANG.res_myaccount_viewmenuname}</th>
							<th class="bold" width="20%">{$LANG.res_myaccount_viewcategory}</th>
							<th class="bold" width="10%">{$LANG.res_myaccount_viewquantity}</th>
							<th class="bold " width="20%">{$LANG.res_myaccount_viewprice}</th>
							<th class="bold center" width="20%">{$LANG.res_myaccount_viewtotalprice}</th>
						</tr>
                        {assign var = detailsCart value = $cartDetails}
                        
						{section name=ord loop=$detailsCart}
						<tr class="">
                            <td class="">{$smarty.section.ord.rownum}</td>
							<td class="">{$detailsCart[ord].menuname|ucfirst|stripslashes} {if $cartDetails[ord].pizza_size neq ''}({$cartDetails[ord].pizza_size}){/if}
							{if $detailsCart[ord].addonsname neq ''} <br><b>{$LANG.res_addons}:</b> {$detailsCart[ord].addonsname|stripslashes}{/if}
							{if $detailsCart[ord].pizza_crustname neq ''}<br><b>{$LANG.res_crust}:</b> {$detailsCart[ord].pizza_crustname|stripslashes}{/if}
							{if $detailsCart[ord].pizza_addonsname neq ''}<br><b>{$LANG.res_topping}:</b> {$detailsCart[ord].pizza_addonsname|stripslashes}{/if}
							{if $detailsCart[ord].specialinstruction neq ''} <br><b>{$LANG.res_inst}:</b>{$detailsCart[ord].specialinstruction|stripslashes}{/if}
							</td>
							<td class="">{$cartDetails[ord].catname|ucfirst|stripslashes}</td>
							<td class=" ">{$cartDetails[ord].quantity}</td>
							<td class=" ">{$currency} {$cartDetails[ord].menuprice}{if $cartDetails[ord].addonsname neq ''}({$currency} {$cartDetails[ord].addonsprice|stripslashes} Extra ){/if}</td>
							<td class="padright75" align="right">{$currency} {$cartDetails[ord].tot_menuprice}</td>
						</tr>
						{/section}
						<tr class="">
							<td class="" align="right" colspan="5">{$LANG.res_myaccount_viewsubtotal}</td>
							<td align="right" class=" padright75">{$currency} {$subtotal}</td>
						</tr>
                        <tr class="">
							
							<td class="" align="right"   colspan="5">{$LANG.res_tax}{if $salestax neq '0.00'}({$salestax|string_format:"%.0f"} %){/if}</td>
							<td align="right" class=" padright75">{$currency} {$taxamount}</td>
						</tr>
						{*if $deliveryoption eq 'Yes' and $deliverytype neq 'pickup'*}
						{if $deliverytype neq 'pickup'}
						<tr class=""> 
							<td class=""  align="right"  colspan="5">{$LANG.res_myaccount_viewdeliverycharge}</td>
							<td align="right" class=" padright75">{if $deliverycharge eq '0.00'}0.00{else}{$currency} {$deliverycharge}{/if}</td>
						</tr>
						{/if}
						{if $orderDetails.0.offervalue neq ''}
						<tr class="">
							<td class="" align="right"  colspan="5">{$LANG.res_myaccount_viewdiscount}({$orderDetails.0.offervalue|string_format:"%.0f"} % Off)</td>
							<td align="right" class="padright75">{if $orderDiscountPrice eq '0.00'}0.00{else}- {$currency} {$orderDiscountPrice}{/if}</td>
						</tr>
						{/if}
						{if $orderDetails.0.tipamount neq '0.00'}
						<tr class="" >
							<td class=" " align="right"  colspan="5">Tip</td>
							<td align="right" class="padright75">{$currency} {$tipamount}</td>
						</tr>
						{/if}
						
                        {if $orderDetails.0.voucher_id neq '' and $orderDetails.0.voucher_price gt 0 }
                            <tr class="">
            					<td class="" align="right"  colspan="5">Voucher Discount Price</td>
            					<td align="right" class="padright75">- {$currency} {$orderDetails.0.voucher_price|string_format:"%.2f"}</td>
            				</tr>
                        {/if}
						<tr class="">
							<td class=""  align="right"  colspan="5">{$LANG.res_myaccount_viewtotal}</td>
							<td align="right" class="padright75">{$currency}&nbsp;{$total|string_format:"%.2f"}</td>
						</tr>
					</table>
				</div>
				<div class="addtoCartInner">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<h1 class="viewDetailHead">Order Details</h1>
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
								<span class="value">{if $orderDetails.0.foodassoonas eq '1'}{$LANG.res_as_soon_as}{else}{$orderDetails.0.deliverydate} ,&nbsp; {$orderDetails.0.deliverytime}{/if}</span>
							</li>
							{/if}
							
							<li>
								<span class="name">{$LANG.res_myaccount_viewpaymentmethod}</span>
								<span class="col">:</span>
								<span class="value">{if $orderDetails.0.payment_type eq 'cod'}{$LANG.res_cash_on_del}{else}{$orderDetails.0.payment_type|ucfirst|stripslashes}{/if}</span>
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
								<span class="value">{if $orderDetails.0.status eq 'completed'}{$LANG.res_delivered}{else}{$orderDetails.0.status|ucfirst}{/if}</span>
							</li>
							{if $orderDetails.0.instructions neq ''}
        					<li>
        						<span class="name">{$LANG.res_myaccount_viewyourindtruction}</span>
        						<span class="col">:</span>
        						<span class="value">{$orderDetails.0.instructions|ucfirst|stripslashes}</span>
        					</li>
        					{/if}
							<!--<li>
									<span class="name">{$LANG.res_myaccount_vieworderstatus}</span>
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
									<span class="value">{if $orderDetails.0.foodassoonas eq '1'}{$LANG.res_as_soon_as}{else}{$orderDetails.0.deliverydate} &nbsp; {$orderDetails.0.deliverytime}{/if}</span>
								</li>
								{/if}
								
								<li>
									<span class="name">{$LANG.res_myaccount_viewpaymentmethod}</span>
									<span class="col">:</span>
									<span class="value">{if $orderDetails.0.payment_type eq 'cod'}{$LANG.res_cash_on_del}{else}{$orderDetails.0.payment_type|ucfirst|stripslashes}{/if}</span>
								</li>
								<li>
									<span class="name">Payment Status</span>
									<span class="col">:</span>
									<span class="value">{if $orderDetails.0.payment_status eq 'P'}Paid{else}Not Paid{/if}</span>
								</li>
								
								<li>
									<span class="name">Order Status</span>
									<span class="col">:</span>
									<span class="value">{if $orderDetails.0.status eq 'completed'}{$LANG.res_delivered}{else}{$orderDetails.0.status|ucfirst}{/if}</span>
								</li>
								<li>
									<span class="name">{$LANG.res_myaccount_viewyourindtruction}</span>
									<span class="col">:</span>
									<span class="value">{$orderDetails.0.instructions|ucfirst|stripslashes}</span>
								</li>
								<!--<li>
										<span class="name">{$LANG.res_myaccount_vieworderstatus}</span>
										<span class="col">:</span>
										<span class="value">{$orderDetails.0.status}</span>
									</li>
									<li>
										<span class="name">{$LANG.res_myaccount_vieworderdate}</span>
										<span class="col">:</span>
										<span class="value">{$orderDetails.0.orderdate}</span>
									</li>-->
							</ul>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<h1 class="viewDetailHead">Customer Details</h1>
							<ul class="thanksUlNew1MyAcc">
								<li>
									<span class="name">{$LANG.res_myaccount_viewcustomername}</span>
									<span class="col">:</span>
									<span class="value">{$orderDetails.0.customername|ucfirst|stripslashes} {$orderDetails.0.customerlastname|ucfirst|stripslashes}</span>
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
								<li>
									<span class="name">{$LANG.res_myaccount_viewphonenumber}</span>
									<span class="col">:</span>
									<span class="value">{$orderDetails.0.customercellphone|ucfirst|stripslashes}</span>
								</li>
								<li>
									<span class="name">{$LANG.res_myaccount_viewcustomeremail}</span>
									<span class="col">:</span>
									<span class="value">{$orderDetails.0.customeremail|ucfirst|stripslashes}</span>
								</li>
							</ul>
						</div>
						{*<div class="popTxtarea1Inner col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
							<h1 class="popTxtarea1Head">{$LANG.res_myaccount_viewyourindtruction}</h1>
							<textarea rows="" cols="" class="popTxtarea1">{$orderDetails.0.instructions|ucfirst|stripslashes}</textarea>
						</div>
						<div  class="popTxtarea1Inner1 span6 pull-right offset0">
							<a class="pdf" href="viewfullDetailsPDF.php?orderid={$orderDetails.0.orderid}" target="_blank" >{$LANG.res_myaccount_viewdwnformat}</a>
							<a class="print" href="javascript:void(0);" onclick="print();">{$LANG.res_myaccount_viewprint}</a>
						</div>*}
					</div>
				</div>
			</div>
		</div>
	{/if}
{**********************************************************************************************}
{* Orders Tab End *}
{**********************************************************************************************}

{**********************************************************************************************}
{* Report Tab Start *}
{**********************************************************************************************}
	{if $action eq "Report"}
	
	<!--Date Picker Files-->
	<!--<script type="text/javascript" src="{$SITE_JS_URL}/jquery-1.7.2.js"></script>
	<script type="text/javascript" src="{$SITE_JS_URL}/zebra_datepicker.js"></script>-->
	{literal}
	<script type="text/javascript">
		$(document).ready(function() 
		{
	   		$('#report_from').datepicker({
			direction: [false, '2025-01-01'],
			//pair: $('#report_from') 	
   		});
   		 
   		$('#report_to').datepicker({
    	    direction: [false, '2025-01-01'],
			//pair: $('#report_to')                
   		});
	   	});
	</script>
	{/literal}
		
	{include file='restaurantOwnerMyaccount_report.tpl'}
	{/if}
    	{if $action eq "Reportdate"}
	
	<!--Date Picker Files-->
	<!--<script type="text/javascript" src="{$SITE_JS_URL}/jquery-1.7.2.js"></script>
	<script type="text/javascript" src="{$SITE_JS_URL}/zebra_datepicker.js"></script>-->
	{literal}
	<script type="text/javascript">
		$(document).ready(function() 
		{
	   		$('#report_from').datepicker({
			direction: [false, '2025-01-01'],
			//pair: $('#report_from') 	
   		});
   		 
   		$('#report_to').datepicker({
        	direction: [false, '2025-01-01'],
			//pair: $('#report_to')                
   		});
	   	});
	</script>
	{/literal}
		
	{include file='restaurantOwnerMyaccount_report_ajax.tpl'}
	{/if}
{**********************************************************************************************}
{* Report Tab End *}
{**********************************************************************************************}

{**********************************************************************************************}
{* Category Tab Start *}
{**********************************************************************************************}
	
	{if $action eq "Category"}
		{include file='restaurantOwnerMyaccount_category_ajax.tpl'}
	{/if}
{**********************************************************************************************}
{* Category Tab End *}
{**********************************************************************************************}

{**********************************************************************************************}
{* Menu Tab Start *}
{**********************************************************************************************}
	{if $action eq "Menu"}
		<!-- Pegination Menu List -->
		{include file='restaurantOwnerMyaccount_menu_ajax.tpl'}
	{/if}
	{*---------------------------------------------------------------------------------------*}

	{if $action eq "showCatAddonsListEdit"}
		<!-- Addons List from menu mgmt -->
		<!--<span class="addPageRightFont">&nbsp;</span><span class="colon1">&nbsp;</span>-->
		<table width="68%" cellpadding="0" cellspacing="0" border="0">
			{section name="addon" loop=$showAddonslist}
				<tr>
					<td align="left" width="25%" height="35">
						
						<table width="70%" cellpadding="0" cellspacing="0" border="0">
							<tr>
								{if $showAddonslist[addon].addonspriceoption eq 'Paid'}
									<td align="left" width="16%" height="20">
										<input type="checkbox" name="mainaddons[{$smarty.section.addon.index}][mainaddonsname]" id="{$showAddonslist[addon].addonsname|stripslashes}" value="{$showAddonslist[addon].id}" /> &nbsp;<label for="{$showAddonslist[addon].addonsname|stripslashes}">{$showAddonslist[addon].addonsname|stripslashes}</label>
									</td>
									
									<td width="50%" height="20">
										<input type="radio" name="mainaddons[{$smarty.section.addon.index}][addonspriceoption]" id="paid" value="Paid" onclick="addonspaidoption('{$showAddonslist[addon].id}');" checked="checked"/> Paid &nbsp;
										<span id="showprice_{$showAddonslist[addon].id}" >
											<span class="flt">Price :</span> <input type="text" name="mainaddons[{$smarty.section.addon.index}][addons_price]" id="addonsprice" value="{$showAddonslist[addon].addonsprice}" size="10" readonly=""/> 
										</span>
									</td>
								{/if}
							</tr>
						</table>
						
						
						<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][mainaddoneditid]" value="{$showAddonslist[addon].menu_addonid}" />
						{if $showAddonslist[addon].addonspriceoption eq 'Free'}
						<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][mainaddonsname]" value="{$showAddonslist[addon].id}" />{/if}
						{$objSite->getShowSubAddonsList($showAddonslist[addon].id)}
						{if $showAddonslist[addon].addonspriceoption eq 'Free' and $cntmenuSubAddons1 gt 0}
							<b>{$showAddonslist[addon].addonsname|stripslashes}</b>
						{/if}
						<span class="addPageRightFont">&nbsp;</span><span class="colon1">&nbsp;</span>
						{section name="subaddon" loop=$showSubAddonslist}
							<table width="" cellpadding="0" cellspacing="0" border="0">
								<tr class="trMenu">
									<td align="left" width="30%" height="35">
										<input type="checkbox" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonsname]" id="{$showSubAddonslist[subaddon].addonsname|stripslashes}" value="{$showSubAddonslist[subaddon].id}" /> &nbsp;<label for="{$showSubAddonslist[subaddon].addonsname|stripslashes}">{$showSubAddonslist[subaddon].addonsname|stripslashes}</label>
									</td>
									<td align="left" width="20%" height="35" class="td1">
										<input type="radio" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" id="free" value="Free" checked="checked" onclick="addonsfreeoption('{$showSubAddonslist[subaddon].id}');"/>{$LANG.res_free} 
									</td>
									<td align="left" width="50%" height="35">
										<input type="radio" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" id="paid" value="Paid" onclick="addonspaidoption('{$showSubAddonslist[subaddon].id}');"/> {$LANG.res_paid} &nbsp;
										<span id="showprice_{$showSubAddonslist[subaddon].id}" style="display:none;">
											<span class="flt">{$LANG.res_price} :</span> <input type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price]" id="addonsprice" value="" class="" /> 
										</span>
									</td>
								</tr>
							</table>
						{/section}
					</td>
				</tr>
			{/section}
		</table>
													
	{/if}
	
	{******************************************************************************************}
	{*---------------------------------------------------------------------------------------*}
	{if $action eq "showCatPizzaAddonsList"}

		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_size}</span>
			<span class="colon1">:</span>
			<span>
			<table width="70%" cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td align="left" height="30">
						<input type="checkbox" name="small" id="small" value="small" onclick="showSmallPrice();" />&nbsp;{$LANG.res_small} &nbsp;
					
						<span id="smallpriceshow" style="display:none;">
						<input type="text" name="smallval" id="smallval" value="" />&nbsp;</span><br />
					</td>
				</tr>
				<tr>
					<td align="left" width="10%" height="30">
						<input type="checkbox" name="medium" id="medium" value="medium" onclick="showMediumPrice();" />&nbsp;{$LANG.res_medium}&nbsp;
					
						<span id="mediumpriceshow" style="display:none;">
						<input type="text" name="mediumval" id="mediumval" value="" />&nbsp;</span><br />
					</td>
				</tr>
				<tr>
					<td align="left" width="16%" height="30">	
						<input type="checkbox" name="large" id="large" value="large" onclick="showLargePrice();" />&nbsp;{$LANG.res_large} &nbsp;
					
						<span id="largepriceshow" style="display:none;">
						<input type="text" name="largeval" id="largeval" value="" />&nbsp;</span>
					</td>
				</tr>
			</table>
			</span>
		</div>
		<!--Crust Start -->
		<div class="addPageCont">
			<span class="addPageRightFont">Crust </span>
			<span class="colon1">:</span>
			<span>
				<table width="68%" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td align="left" width="32%" height="35">
							<input type="text" name="crustname" id="crustname" value="" /> 
							<input type="radio" name="crust" id="crustfree" value="Free" onclick="pizzacrustfreeoption();" checked="checked" />{$LANG.res_free}
						</td>
						<td width="40%" height="35">
							<input type="radio" name="crust" id="crustpaid" value="Paid" onclick="pizzacrustpaidoption();"/> {$LANG.res_paid} &nbsp;
							<span id="showcrustpizzaprice" style="display:none;">
							<span class="flt">{$LANG.res_price} :</span><input type="text" name="crustprice" id="crustprice" value="" /> 
							</span>
						</td>
						<td align="left" width="9%" height="35">&nbsp;</td>
					</tr>
				</table>
			
				<label style="float:left; width:250px;">&nbsp;</label>
				<table id="specialcrust" >
				
					<tfoot><tr>
					<td class="left" colspan="3" align="center">
						<!--<span id="addonsAddMore" {if $menuaddonsdet eq 'Yes'} style="display:block"; {else} style="display:none";{/if}">-->
							<a onclick="addMorePizzaCrust1();" style="color:#ff0000;cursor:pointer;"><span>{$LANG.res_add_more_crust}</span></a>
						<!--</span>-->
					</td>
					</tr></tfoot>
				</table>
			</span>
		</div>
		<!--Crust End -->
		<!-- Add Topping Start-->
		<div class="addPageCont">	
			<span class="addPageRightFont">{$LANG.res_add_topping}</span>
			<span class="colon1">:</span>
			<span class="addNewToppings">
				<table width="95%" cellpadding="0" cellspacing="0" border="0">
					{section name="pizza" loop=$showPizzaAddonslist}
						<tr>
							<td align="left" width="30%" height="35">
								<input type="checkbox" name="pizzaaddons[{$smarty.section.pizza.index}][pizzaaddonsname]" id="{$showPizzaAddonslist[pizza].addonsname|stripslashes}" value="{$showPizzaAddonslist[pizza].id}" /> &nbsp;<label for="{$showPizzaAddonslist[pizza].addonsname|stripslashes}">{$showPizzaAddonslist[pizza].addonsname|stripslashes}</label>
							</td>
							
							<td align="left" width="20%" height="35" class="td1">
								<input type="radio" name="pizzaaddons[{$smarty.section.pizza.index}][pizzaaddons_priceoption]" id="free" value="Free" onclick="pizzaaddonsfreeoption('{$showPizzaAddonslist[pizza].id}');" checked="checked"/> {$LANG.res_free}
							</td>
							
							<td width="50%" height="35">
								<input type="radio" name="pizzaaddons[{$smarty.section.pizza.index}][pizzaaddons_priceoption]" id="paid[{$smarty.section.pizza.index}]" value="Paid" onclick="pizzaaddonspaidoption('{$showPizzaAddonslist[pizza].id}');" /> {$LANG.res_paid} &nbsp;
							
								<span id="showpizzaprice_{$showPizzaAddonslist[pizza].id}"  style="display:none;" >
									<span class="flt">{$LANG.res_price} :</span> <input type="text" name="pizzaaddons[{$smarty.section.pizza.index}][pizzaaddons_price]" id="pizzaaddonsprice[{$smarty.section.pizza.index}]" value="" /> 
								</span>
							</td>
						</tr>
					{/section}
				</table>
			
				<table id="specialpizza" border="0" width="98%">
				<tfoot><tr>
				<td class="left"  colspan="3" align="center">
					<!--<span id="addonsAddMore" {if $menuaddonsdet eq 'Yes'} style="display:block"; {else} style="display:none";{/if}">-->
						<a onclick="addMorePizzaAddons1();" style="color:#ff0000;cursor:pointer;margin-left:100px;"><span>{$LANG.res_add_more_topping}</span></a>
					<!--</span>-->
				</td>
				</tr></tfoot>
			</table>
			</span>
		</div>
		<!-- Add Topping End-->
	{/if}
	{*---------------------------------------------------------------------------------------*}
	{if $action eq "showCatPizzaAddonsListEdit"}

		<div class="addPageCont">
			<span class="addPageRightFont">Size </span>
			<span class="colon1">:</span>
			<span>
			<table width="70%" cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td align="left" height="30">
						<input type="checkbox" name="small" id="small" value="small" onclick="showSmallPrice();" />&nbsp;{$LANG.res_small}&nbsp;
					
						<span id="smallpriceshow" style="display:none;">
						<input type="text" name="smallval" id="smallval" value="" />&nbsp;</span><br />
					</td>
				</tr>
				<tr>
					<td align="left" width="10%" height="30">
						<input type="checkbox" name="medium" id="medium" value="medium" onclick="showMediumPrice();" />&nbsp;{$LANG.res_medium}&nbsp;
					
						<span id="mediumpriceshow" style="display:none;">
						<input type="text" name="mediumval" id="mediumval" value="" />&nbsp;</span><br />
					</td>
				</tr>
				<tr>
					<td align="left" width="16%" height="30">	
						<input type="checkbox" name="large" id="large" value="large" onclick="showLargePrice();" />&nbsp;{$LANG.res_large}&nbsp;
					
						<span id="largepriceshow" style="display:none;">
						<input type="text" name="largeval" id="largeval" value="" />&nbsp;</span>
					</td>
				</tr>
			</table>
			</span>
		</div>
		<!--Crust Start -->
		<div class="addPageCont">
			<span class="addPageRightFont">Crust </span>
			<span class="colon1">:</span>
			<span>
				<table width="68%" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td align="left" width="32%" height="35">
							<input type="text" name="crustname" id="crustname" value="" /> 
							<input type="radio" name="crust" id="crustfree" value="Free" onclick="pizzacrustfreeoption();" checked="checked" />{$LANG.res_free}
						</td>
						<td width="40%" height="35">
							<input type="radio" name="crust" id="crustpaid" value="Paid" onclick="pizzacrustpaidoption();"/> {$LANG.res_paid} &nbsp;
							<span id="showcrustpizzaprice" style="display:none;">
							<span class="flt">{$LANG.res_price} :</span> <input type="text" name="crustprice" id="crustprice" value="" /> 
							</span>
						</td>
						<td align="left" width="9%" height="35">&nbsp;</td>
					</tr>
				</table>
			
				<!--<label style="float:left; width:250px;">&nbsp;</label>-->
				<table id="specialcrust" border="0" width="98%">
				
					<tfoot><tr>
					<td class="left" height="20" >
						<!--<span id="addonsAddMore" {if $menuaddonsdet eq 'Yes'} style="display:block"; {else} style="display:none";{/if}">-->
							<a onclick="addMorePizzaCrust1();" style="color:#ff0000;cursor:pointer;"><span>{$LANG.res_add_more_crust}</span></a>
						<!--</span>-->
					</td>
					</tr></tfoot>
				</table>
			</span>
		</div>
		<!--Crust End -->
		<!-- Add Topping Start-->
		<div class="addPageCont">	
			<span class="addPageRightFont">{$LANG.res_add_topping}</span>
			<span class="colon1">:</span>
			<span class="addNewToppings">
				<table width="95%" cellpadding="0" cellspacing="0" border="0">
					{section name="pizza" loop=$showPizzaAddonslist}
						<tr>
							<td align="left" width="30%" height="35">
								<input type="checkbox" name="pizzaaddons[{$smarty.section.pizza.index}][pizzaaddonsname]" id="{$showPizzaAddonslist[pizza].addonsname|stripslashes}" value="{$showPizzaAddonslist[pizza].id}" /> &nbsp;<label for="{$showPizzaAddonslist[pizza].addonsname|stripslashes}">{$showPizzaAddonslist[pizza].addonsname|stripslashes}</label>
							</td>
							
							<td align="left" width="20%" height="35" class="td1">
								<input type="radio" name="pizzaaddons[{$smarty.section.pizza.index}][pizzaaddons_priceoption]" id="free" value="Free" onclick="pizzaaddonsfreeoption('{$showPizzaAddonslist[pizza].id}');" checked="checked"/> {$LANG.res_free}
							</td>
							
							<td width="50%" height="35">
								<input type="radio" name="pizzaaddons[{$smarty.section.pizza.index}][pizzaaddons_priceoption]" id="paid[{$smarty.section.pizza.index}]" value="Paid" onclick="pizzaaddonspaidoption('{$showPizzaAddonslist[pizza].id}');" /> {$LANG.res_paid} &nbsp;
							
								<span id="showpizzaprice_{$showPizzaAddonslist[pizza].id}"  style="display:none;" >
									<span class="flt">{$LANG.res_price}:</span> <input type="text" name="pizzaaddons[{$smarty.section.pizza.index}][pizzaaddons_price]" id="pizzaaddonsprice[{$smarty.section.pizza.index}]" value="" /> 
								</span>
							</td>
						</tr>
					{/section}
				</table>
						
				<table id="specialpizza" border="0" width="98%">
					<tfoot><tr>
					<td class="left"  colspan="3" align="center">
						<!--<span id="addonsAddMore" {if $menuaddonsdet eq 'Yes'} style="display:block"; {else} style="display:none";{/if}">-->
							<a onclick="addMorePizzaAddons1();" style="color:#ff0000;cursor:pointer;margin-left:100px;"><span>{$LANG.res_add_more_topping}</span></a>
						<!--</span>-->
					</td>
					</tr></tfoot>
				</table>
			</span>
		</div>
		<!-- Add Topping End-->
	{/if}
	
	{if $action eq "pizzaAddons"}
		<div class="addPageCont">
			<span class="addPageRightFont">Size </span>
			<span class="colon1">:</span>
			<span>
			<table width="68%" cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td align="left" width="25%" height="35">
						<input type="checkbox" class="pizza_size_small_small" name="small" id="small" value="small" onclick="showSmallPrice();" {if $menudet.0.pizza_size_small eq 'small'}checked="checked"{/if} /><label class="btnNameMenu">{$LANG.res_small}</label>
						<span id="smallpriceshow" {if $menudet.0.pizza_small_value eq '0.00' or $menudet.0.pizza_small_value eq ''} style="display:none;" {/if} class="textboxAddonsizeName">
						<input type="text" class="pizza_size_small_value" name="smallval" id="smallval" value="{if $menudet.0.pizza_small_value neq '0.00'}{$menudet.0.pizza_small_value}{/if}" class="textboxAddonsize" /></span><br />
					</td>
				</tr>
				
				<tr>
					<td align="left" width="25%" height="35">
						<input type="checkbox" class="pizza_size_medium_medium" name="medium" id="medium" value="medium" onclick="showMediumPrice();" {if $menudet.0.pizza_size_medium eq 'medium'}checked="checked"{/if} /><label class="btnNameMenu">{$LANG.res_medium}</label>
						<span id="mediumpriceshow" {if $menudet.0.pizza_medium_value eq '0.00' or $menudet.0.pizza_medium_value eq ''} style="display:none;" {/if} class="textboxAddonsizeName">
						<input type="text" class="pizza_size_medium_value" name="mediumval" id="mediumval" value="{if $menudet.0.pizza_medium_value neq '0.00'}{$menudet.0.pizza_medium_value}{/if}" class="textboxAddonsize" /></span><br />
					</td>
				</tr>
				
				<tr>
					<td align="left" width="25%" height="35">
						<input type="checkbox" class="pizza_size_large_large" name="large" id="large" value="large" onclick="showLargePrice();" {if $menudet.0.pizza_size_large eq 'large'}checked="checked"{/if} /><label class="btnNameMenu">{$LANG.res_large}</label>
						<span id="largepriceshow" {if $menudet.0.pizza_large_value eq '0.00' or $menudet.0.pizza_large_value eq ''} style="display:none;" {/if} class="textboxAddonsizeName">
						<input type="text" class="pizza_size_large_value" name="largeval" id="largeval" value="{if $menudet.0.pizza_large_value neq '0.00'}{$menudet.0.pizza_large_value}{/if}" class="textboxAddonsize" /></span>
					</td>
				</tr>
			</table>
			</span>
		</div>
		<!--Crust Start -->
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_crust}</span>
			<span class="colon1">:</span>
			<span>
				<table width="70%" cellpadding="0" cellspacing="0" border="0">
					{section name="crust" loop=$showPizzaCrustlist}
						<tr>
							<td align="left" width="40%" height="30">
								<input type="text" name="crust[{$smarty.section.crust.index}][crustname]" id="crustname" value="{$showPizzaCrustlist[crust].pizza_crust_addonsname}" />
								<input type="radio" name="crust[{$smarty.section.crust.index}][pizza_crust_priceoption]" id="crustfree" value="Free" onclick="pizzacrusteditfreeoptionedit('{$showPizzaCrustlist[crust].pizza_crustid}');" {if $showPizzaCrustlist[crust].pizza_crust_priceoption eq 'Free' or $showPizzaCrustlist[crust].pizza_crust_price eq ''} checked="checked"{/if} /> {$LANG.res_free}
							</td>
							<td width="40%" height="44">	
								<input type="radio" name="crust[{$smarty.section.crust.index}][pizza_crust_priceoption]" id="crustpaid[{$smarty.section.crust.index}]" value="Paid" onclick="pizzacrusteditpaidoptionedit('{$showPizzaCrustlist[crust].pizza_crustid}');" {if $showPizzaCrustlist[crust].pizza_crust_priceoption eq 'Paid'}checked="checked"{/if}/> {$LANG.res_paid} &nbsp;
								<span id="showcrustpizzapriceedit_{$showPizzaCrustlist[crust].pizza_crustid}" {if $showPizzaCrustlist[crust].pizza_crust_price eq '' or $showPizzaCrustlist[crust].pizza_crust_price eq '0' or $showPizzaCrustlist[crust].pizza_crust_priceoption eq 'Free' } style="display:none;" {/if}>
								<span class="flt">{$LANG.res_price} :</span> <input type="text" name="crust[{$smarty.section.crust.index}][crustprice]" id="crustprice" value="{$showPizzaCrustlist[crust].pizza_crust_price}" /> 
								</span>
							</td>
							<td class="left">
								<!--<a href="menuAddEdit.php?eid={$smarty.get.eid}&action=crustdelete&crustid={$showPizzaCrustlist[crust].pizza_crustid}" style="color:#ff0000;cursor:pointer;" name="remove" id="remove"  >Remove</a>-->
								
								<a href="javascript:void(0);" style="color:#ff0000;cursor:pointer;" name="remove" id="remove" onclick="removeCrust('{$menuid}','{$catid}','{$showPizzaCrustlist[crust].pizza_crustid}');"  >{$LANG.res_remove}</a>
							</td>
						</tr>	
					{/section}
				</table>
			
				<!--<label style="float:left; width:250px;">&nbsp;</label>-->
				<table id="specialcrust" border="0" width="98%">
					{section name=crust1 loop=$cntcrustAddons}
					{assign var=crustaddon value=$smarty.section.crust1.index}
					<input type="hidden" name="crust[{$crustaddon}][crusteditid]" value="{$showPizzaCrustlist.$crustaddon.pizza_crustid}" />
					{/section}
				
					<tfoot><tr>
					<td class="left" height="20" colspan="3">
						
						<a onclick="addMorePizzaCrust1();" style="color:#ff0000;cursor:pointer;"><span>{$LANG.res_add_more_crust}</span></a>
						
					</td>
					</tr></tfoot>
				</table>
			</span>
		</div>	
		<!--Crust End -->
		<!-- Add Topping Start-->
		<div class="addPageCont">	
			<span class="addPageRightFont">{$LANG.res_add_topping}</span>
			<span class="colon1">:</span>
			<span class="addNewToppings">
				<table width="95%" cellpadding="0" cellspacing="0" border="0">
					{section name="pizza" loop=$showPizzaAddonslist}
						<tr>
							<td align="left" width="30%" height="35">
								<input type="checkbox" name="pizzaaddons[{$smarty.section.pizza.index}][pizzaaddonsname]" id="{$showPizzaAddonslist[pizza].addonsname|stripslashes}" value="{$showPizzaAddonslist[pizza].id}" {if $showPizzaAddonslist[pizza].id eq $showPizzaAddonslist[pizza].addonid}checked="checked"{/if} /> &nbsp;<label for="{$showPizzaAddonslist[pizza].addonsname|stripslashes}">{$showPizzaAddonslist[pizza].addonsname|stripslashes}</label>
							</td>
							
							<td align="left" width="20%" height="35" class="td1">
								<input type="radio" name="pizzaaddons[{$smarty.section.pizza.index}][pizzaaddons_priceoption]" id="free" value="Free" onclick="pizzaaddonsfreeoption('{$showPizzaAddonslist[pizza].id}');" {if $showPizzaAddonslist[pizza].menupriceoption eq 'Free' or $showPizzaAddonslist[pizza].menuprice eq ''}checked="checked"{/if}/> {$LANG.res_free}
							</td>
							
							<td width="50%" height="35">
								<input type="radio" name="pizzaaddons[{$smarty.section.pizza.index}][pizzaaddons_priceoption]" id="paid[{$smarty.section.pizza.index}]" value="Paid" onclick="pizzaaddonspaidoption('{$showPizzaAddonslist[pizza].id}');" {if $showPizzaAddonslist[pizza].menupriceoption eq 'Paid'}checked="checked"{/if}/> {$LANG.res_paid} &nbsp;
							
								<span id="showpizzaprice_{$showPizzaAddonslist[pizza].id}" {if $showPizzaAddonslist[pizza].menuprice eq '' or $showPizzaAddonslist[pizza].menuprice eq '0' or $showPizzaAddonslist[pizza].menupriceoption eq 'Free' } style="display:none;" {/if}>
									<span class="flt">{$LANG.res_price} :</span> <input type="text" name="pizzaaddons[{$smarty.section.pizza.index}][pizzaaddons_price]" id="pizzaaddonsprice[{$smarty.section.pizza.index}]" value="{$showPizzaAddonslist[pizza].menuprice}" /> 
								</span>
							</td>
						</tr>
					{/section}
				</table>
				
				<table id="specialpizza" border="0" width="98%">
					{section name=pizza1 loop=$cntpizzaAddons}
					{assign var=pizzaaddon value=$smarty.section.pizza1.index}
					<input type="hidden" name="pizzaaddons[{$pizzaaddon}][pizzaeditid]" value="{$showPizzaAddonslist.$pizzaaddon.menu_addonid}" />
					{/section}
				
					<tfoot><tr>
					<td class="left" height="20" colspan="3">
						<a onclick="addMorePizzaAddons1();" style="color:#ff0000;cursor:pointer;margin-left:100px;"><span>{$LANG.res_add_more_topping}</span></a>
					</td>
					</tr></tfoot>
				</table>
			</span>
		</div>
		<!-- Add Topping End-->
	{/if}
{**********************************************************************************************}
{* Menu Tab End *}
{**********************************************************************************************}

{**********************************************************************************************}
{* Addons Tab Start *}
{**********************************************************************************************}
	{if $action eq "Addon"}
		{include file="restaurantOwnerMyaccount_addons_ajax.tpl"}
	{/if}
	{if $action eq "resownershowaddonList"}
		{include file="restaurantOwnerMyaccount_addons_ajax.tpl"}
	{/if}
	{if $action eq "editSubAddon"}
			<!--<span class="madAddons">
				<input type="radio" name="mainaddonoption" id="mainaddon_free" value="Free" {if $addonsvalue.0.addonspriceoption eq 'Free'} checked="checked"{/if} onclick="mainaddonfree();" class="madInput"><span class="flt">Free</span>
			</span>	
			<span class="madAddons">
				<input type="radio" name="mainaddonoption" id="mainaddon_paid" value="Paid" {if $addonsvalue.0.addonspriceoption eq 'Paid'}checked="checked"{/if} onclick="mainaddonpaid();" class="madInput" /><span class="flt">Paid</span>
			</span>
			<span class="showaddPrice" {if $addonsvalue.0.addonspriceoption neq 'Paid'} style="display:none;"{/if}>
				<input type="text" name="mainaddonvalue" id="mainaddonvalue" value="{$addonsvalue.0.addonsprice}" size="" class="madTxtBox"/>
			</span>-->
				<input type="text" name="mainaddoncnt" id="mainaddoncnt" value="{if $addonsvalue.0.addonscount eq ''}Addons count{else}{$addonsvalue.0.addonscount}{/if}" onfocus="if (this.value == '{if $addonsvalue.0.addonscount eq ''}Addons count{else}{$addonsvalue.0.addonscount}{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $addonsvalue.0.addonscount eq ''}Addons count{else}{$addonsvalue.0.addonscount}{/if}';" size="12" class="madTxtBoxcnt"/>
			
			
		<div class="showaddPriceList newSubBtnDiv" {if $addonsvalue.0.addonspriceoption eq 'Paid'} style="display:none;"{/if}>
		{section name="addon" loop=$showmainAddonslist}
			<input type="text" name="addonsub[{$smarty.section.addon.index}][subaddonsname]" id="{$showmainAddonslist[addon].addonsname|stripslashes}" value="{$showmainAddonslist[addon].addonsname|stripslashes}" class="textboxAddon madBox" />
		{/section}
		</div>
		
		<div id="subaddonslistEdit"></div>
		
		<span class="showaddPriceList" {if $getpriceoption eq 'Paid'}style="display:none;"{/if}>
		<a onclick="addListSubAddonsEdit();" style="color:#ff0000;cursor:pointer;margin-left:0px;"><span>{$LANG.res_add_sub_addon}</span></a>	
		</span>
		
		{section name=addon1 loop=$cntmainAddons}
		{assign var=mainaddon value=$smarty.section.addon1.index}
		<input type="hidden" name="addonsub[{$mainaddon}][subaddoneditid]" value="{$showmainAddonslist.$mainaddon.id}" />
		{/section}
	{/if}
{**********************************************************************************************}
{* Addons Tab End *}
{**********************************************************************************************}

{**********************************************************************************************}
{* Offers Tab Start *}
{**********************************************************************************************}
	{if $action eq "Offer"}
		{include file="restaurantOwnerMyaccount_offers_ajax.tpl"}
	{/if}
{**********************************************************************************************}
{* Offers Tab End *}
{**********************************************************************************************}

{**********************************************************************************************}
{* Accounts Tab Start *}
{**********************************************************************************************}
	{if $action eq "resownerAccountsList"}
		{$objRestaurant->restaurantDetailsList()}
		{include file='restaurantOwnerMyaccount_accounts_ajax.tpl'}
	{/if}
{**********************************************************************************************}
{* Accounts Tab End *}
{**********************************************************************************************}

{**********************************************************************************************}
{* Reviews Tab Start *}
{**********************************************************************************************}
	{if $action eq "Reviews"}
		{include file="restaurantOwnerMyaccount_reviews_ajax.tpl"}
	{/if}
{**********************************************************************************************}
{* Reviews Tab End *}
{**********************************************************************************************}

{**********************************************************************************************}
{* Setting Tab Start *}
{**********************************************************************************************}
	
	{if $action eq "showResCityList"}
		<!-- City List from Restaurant -->
		<select class="form-control" name="restaurant_city" id="restaurant_city_con" >
			<option value="">{$LANG.res_reg_select}</option>
			{foreach from=$selectCityList item=city}
			<option value="{$city.city_id}">{$city.cityname|stripslashes}</option>
			{/foreach}
		</select>
	{/if}
	{if $action eq "showResZipList"}
		<!-- Zipcode List from Restaurant -->
		<select class="form-control" name="restaurant_zip" id="restaurant_zip" >
			<option value="">{$LANG.res_reg_select}</option>
			{foreach from=$showZiplist item=ziplist}
				<option value="{$ziplist.zipcode_id}">{$ziplist.zipcode|stripslashes} - {$ziplist.areaname|stripslashes}</option>
			{/foreach}
		</select>
	{/if}
	{**********************************************************************************************}
	{if $action eq "resownerEditContactList"}
	<a class="restOwnMyAddBtn" href="javascript:void(0);" onclick="return editLocationShow();">{$LANG.res_myaccount_setlocedit}</a>
	<div class="restTabNewIn3">
	<!-- Content start -->
		<h1 class="restOwnMyHead">{$LANG.res_myaccount_setcontact}</h1> 
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_myaccount_setcontactname}</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_contact_name|stripslashes}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_myaccount_setcontactphone}</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_contact_phone|stripslashes}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_myaccount_setcontactemail}</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_contact_email}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_myaccount_setcontactpassword}</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">******** <a href="javascript:void(0);" onclick="showChangePassword();" class="colorLink"> {$LANG.res_myaccount_setcontactchgpass} </a></span>
		</div>
	</div>
	<div class="restTabNewIn2">
		<h1 class="restOwnMyHead">{$LANG.res_myaccount_setlocinfo}</h1>
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_myaccount_setlocaddress}</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_streetaddress|stripslashes}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_myaccount_setlocstate} </span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantstate|stripslashes}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_myaccount_setloccity} </span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantcity}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_myaccount_setloczip} </span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantzip}</span>
		</div>
	</div>
	<!-- Content end -->
	{/if}
	{**********************************************************************************************************}
	{if $action eq "resownerEditRestaurantInfoList"}
	<div class="contain">
		<h1 class="restOwnMyHead">Restauarnt Info</h1>
		<a class="restOwnMyAddBtn" href="javascript:void(0);" onclick="editRestaurantInfoShow();">{$LANG.res_edit}</a>
	</div>
	<div class="restTabNewIn3">
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_resname}</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_name|stripslashes}</span>
		</div>	
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_resphone}</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_phone|stripslashes}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_resweb}</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_website|stripslashes}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">Order Receive Email</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantDetailsList.0.order_receive_email|stripslashes}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_resfax}</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_fax|stripslashes}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_about_res}</span>
			<span class="colon1">:</span>
			<span class="widthAboutRest">{$restaurantDetailsList.0.restaurant_description|stripslashes}</span>
		</div>
		<!--<div class="addPageCont">
			<span class="addPageRightFont">Restaurant Logo</span>
			<span class="colon1">:</span>
			{if $restaurantDetailsList.0.restaurant_logo neq ''}
			<div class="logoUpload" id="res_owner_logo1">
				<div class="logoImgInner">
					<div class="logo posRelate">
						<img src="{$SITE_IMAGE_RESTAURANT_URL}/logo/{$restaurantDetailsList.0.restaurant_logo}" alt="image" title="" class="logoInfoImg" />
						<a href="javascript:void(0);" id="restaurantlogo1" onclick="resownerdeletelogo('{$resid}');" class="logoCloseIcon"></a>
					</div>
					
					<input type="button" value="Modify" class="addphoto-button logoInfoImgTxt" />
					<input type="file" class="hided modify1" size="1" name="restaurant_logo" id="restaurant_logo" onChange="resownerlogoUpdate();" />
				</div>
			</div>
			
			<span id="res_owner_add_disp_logo" style="display:none;">
				<input type="button" value="Add" class="addphoto-button logoInfoImgTxt" />
				<input type="file" class="hided" size="1" name="restaurant_log" id="restaurant_log" onChange="resownerlogoAdd();" />
			</span>
		
		{else}
		<span id="res_owner_add_disp_logo" >
			<input type="button" value="Add" class="addphoto-button logoInfoImgTxt" />
			<input type="file" class="hided" size="1" name="restaurant_log" id="restaurant_log" onChange="resownerlogoAdd();" />
		</span>	
		
		{/if}
		</div>-->
	</div>
	<div class="restTabNewIn2">
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_pickup}</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_pickup|stripslashes}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_booktab}</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_booktable|stripslashes}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_min_order}</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_minorder_price|stripslashes}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_sales_tax}</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_salestax|stripslashes}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_serving_cuisine}</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$servingcuisine}</span>
		</div>
		<div class="addPageCont">
			<span class="addPageRightFont">Order Pending Alert Tone</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantDetailsList.0.pending_order_alert|stripslashes}</span>
		</div>
        <!-- Open/Close Status -->
        <div class="addPageCont">
			<span class="addPageRightFont">Open/Close Status</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">
            {if $restaurantDetailsList.0.restaurant_set_status eq 'TT'}Time Table
            {else}
            {$restaurantDetailsList.0.restaurant_set_status|stripslashes}({$restaurantDetailsList.0.restaurant_set_time})
            {/if}</span>
		</div>
		
		
	<!-- Content end -->
	</div>
	
	{/if}
	{**********************************************************************************************************}
	{if $action eq "resownerEditDeliveryInfoList"}
		<h1 class="restOwnMyHead">{$LANG.res_del_info}</h1>
		<a class="restOwnMyAddBtn" href="javascript:void(0);" onclick="editDeliveryInfoShow();">{$LANG.res_edit}</a>
		<!-- Content start -->
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_delivery}</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_delivery|stripslashes}</span>
		</div>	
		
		{*<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_del_area}</span>
			<span class="colon1">:</span>
			<span class="addPageRightFont">{$servingareas}</span>
		</div>*}
        <div id="Deliveryinfo" {if $restaurantDetailsList.0.restaurant_delivery eq 'No'} style="display:none; {/if}">
    		<div class="addPageCont">
    			<span class="addPageRightFont">{$LANG.res_del_estimated_time}</span>
    			<span class="colon1">:</span>
    			<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_estimated_time|stripslashes}</span>
    		</div>
    		<div class="addPageCont">
    			<span class="addPageRightFont">{$LANG.res_del_charge}</span>
    			<span class="colon1">:</span>
    			<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_delivery_charge|stripslashes}</span>
    		</div>
    		<div class="addPageCont">
    			<span class="addPageRightFont">Delivery miles</span>
    			<span class="colon1">:</span>
    			<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_delivery_distance|stripslashes}</span>
    		</div>
         </div>   
	{/if}
	{*---------------------------------------------------------------------------------------------------------------------*}
	{if $action eq "resownerEditOpenCloseInfoList"}
		<h1 class="restOwnMyHead">Open and Close Time</h1>
		<a class="restOwnMyAddBtn" href="javascript:void(0);" onclick="editOpenAndCloseInfoShow();">{$LANG.res_edit}</a>
		<!-- Content start -->
		{*<div class="addPageCont">
			<span class="addPageRightFont">&nbsp;</span>
			<span class="colon1">&nbsp;</span>
			<span class="DeliveryHrs1">{$LANG.res_opening_time}<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrs1">{$LANG.res_closing_time}<span class="DeliverHrs_Font">&nbsp;</span></span>
		</div>
		
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_monday}</span>
			<span class="colon1">:</span>
			<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_mon_opentime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_mon_closetime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
		</div>
		
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_tuesday}</span>
			<span class="colon1">:</span>
			<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_tue_opentime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_tue_closetime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
		</div>
		
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_wednesday}</span>
			<span class="colon1">:</span>
			<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_wed_opentime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_wed_closetime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
		</div>
		
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_Thursday}</span>
			<span class="colon1">:</span>
			<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_thu_opentime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_thu_closetime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
		</div>
		
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_friday}</span>
			<span class="colon1">:</span>
			<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_fri_opentime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_fri_closetime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
		</div>
		
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_saturday}</span>
			<span class="colon1">:</span>
			<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_sat_opentime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_sat_closetime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
		</div>
		
		<div class="addPageCont">
			<span class="addPageRightFont">{$LANG.res_sunday}</span>
			<span class="colon1">:</span>
			<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_sun_opentime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_sun_closetime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
		</div>*}
		<div class="contain timeOpenClose">
			<span class="addPageRightFont">{$LANG.res_myaccount_setmonday} </span>
			<span class="colon1">:</span>
			<span class="width53">
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.mon_firstopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.mon_firstclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.mon_secondopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.mon_secondclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			</span>
		</div>
		
		<div class="contain timeOpenClose">
			<span class="addPageRightFont">{$LANG.res_myaccount_settuesday} </span>
			<span class="colon1">:</span>
			<span class="width53">
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.tue_firstopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.tue_firstclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.tue_secondopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.tue_secondclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			</span>
		</div>
		
		<div class="contain timeOpenClose">
			<span class="addPageRightFont">{$LANG.res_myaccount_setwednesday} </span>
			<span class="colon1">:</span>
			<span class="width53">
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.wed_firstopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.wed_firstclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.wed_secondopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.wed_secondclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			</span>
		</div>
		
		<div class="contain timeOpenClose">
			<span class="addPageRightFont">{$LANG.res_myaccount_setthursday} </span>
			<span class="colon1">:</span>
			<span class="width53">
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.thu_firstopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.thu_firstclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.thu_secondopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.thu_secondclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			</span>
		</div>
		
		<div class="contain timeOpenClose">
			<span class="addPageRightFont">{$LANG.res_myaccount_setfriday} </span>
			<span class="colon1">:</span>
			<span class="width53">
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.fri_firstopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.fri_firstclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.fri_secondopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.fri_secondclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			</span>
		</div>
		
		<div class="contain timeOpenClose">
			<span class="addPageRightFont">{$LANG.res_myaccount_setsaturday} </span>
			<span class="colon1">:</span>
			<span class="width53">
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.sat_firstopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.sat_firstclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.sat_secondopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.sat_secondclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			</span>
		</div>
		
		<div class="contain timeOpenClose">
			<span class="addPageRightFont">{$LANG.res_myaccount_setsunday} </span>
			<span class="colon1">:</span>
			<span class="width53">
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.sun_firstopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.sun_firstclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.sun_secondopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
				<span class="DeliveryHrsdet1 span3">{$restaurantEditListTiming.0.sun_secondclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
			</span>
		</div>
		<!-- Content end -->
	{/if}
	{*-------------------------------------------------------------------------*}
	{if $action eq "Paymentmethod"}
		{include file='restaurantOwnerMyaccount_payment_ajax.tpl'}
        
	{/if}
{**********************************************************************************************}
{* Setting Tab End *}
{**********************************************************************************************}

{**********************************************************************************************}
{* Invoice Tab Start *}
{**********************************************************************************************}
	{if $action eq "Invoice"}
		{include file='restaurantOwnerMyaccount_invoice_ajax.tpl'}
	{/if}
{**********************************************************************************************}
{* Invoice Tab Start *}
{**********************************************************************************************}

{**************************************NEW IMPLEMENTATION***************************************}
{if $action eq "showCatAddonsList"}
		<div class="addPageCont">
		<div class="showcataddonsList_delete addontable">
		<input type="hidden" name="cntSliceAddons" id="cntSliceAddons1" value="{$cntSliceAddons}" />
		<input type="hidden" name="cntSliceAddons_createsub" id="cntSliceAddons_createsub1" value="" />
		<input type="hidden" name="sizeoption_addmoreaddonedit" id="sizeoption_addmoreaddonedit_ajax" value="{$menudet.0.sizeoption}" />
        
        {*<input type="hidden" name="cntSlice" class="cntSlice" id="cntSlice1" value="" />*}
        
        <input type='hidden' class="selectoptionsFirst" id="selectoptions" name='selectoptions' value='{$menudet.0.sizeoption}' />
        {*<span class="selectoptionVal"></span>*}
			<!--Addons List-->
			<div class="col-sm-8 col-sm-offset-4">
			{section name="addon" loop=$showAddonslist}
				
						<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][mainaddonsname]" value="{$showAddonslist[addon].id}" />
					
						{assign var='showSubAddonslist' value=$objSite->getShowSubAddonsList($showAddonslist[addon].id,$showAddonslist[addon].maincat_option)}
					{if $showSubAddonslist neq ''}
						
						
							<b style="cursor:pointer;" onclick="openAddons('q{$smarty.section.addon.rownum}')">{$showAddonslist[addon].addonsname|ucfirst|stripslashes} 
								<img alt="" title="" src="{$SITE_IMAGE_URL}/arrowdown.png" class="uparr_q{$smarty.section.addon.rownum}" {if $smarty.section.addon.rownum eq '1'}style="display:none;"{/if}/>  
								<img alt="" title="" src="{$SITE_IMAGE_URL}/arrowup.png" class="downarr_q{$smarty.section.addon.rownum}" {if $smarty.section.addon.rownum neq '1'}style="display:none;"{/if}/>
							</b>
						{/if}
						
						
						<div class="clr"></div>
						<div id="q{$smarty.section.addon.rownum}" {if $smarty.section.addon.rownum neq '1'}style="display:none;"{/if}>
						
						{section name="subaddon" loop=$showSubAddonslist}
							<div  class="form-group">
								
									<div class="col-sm-3">
									{if $showSubAddonslist[subaddon].menu_categoryoption neq 'pizza'}
										<label class="checkbox-inline">
											<input type="checkbox" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonsname]" id="{$showSubAddonslist[subaddon].addonsname|stripslashes}" value="{$showSubAddonslist[subaddon].id}" /> {$showSubAddonslist[subaddon].addonsname|ucfirst|stripslashes}
										</label>
									{else}
										<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonsname]" id="{$showSubAddonslist[subaddon].addonsname|stripslashes}" value="{$showSubAddonslist[subaddon].id}" />
										<label for="{$showSubAddonslist[subaddon].addonsname|stripslashes}">{$showSubAddonslist[subaddon].addonsname|ucfirst|stripslashes}</label>
									{/if}
									</div>
									<div class="col-sm-2">
										<label class="radio-inline">
											<input type="radio" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" id="free" class="free" value="Free" checked="checked" onclick="addonsfreeoption('{$showSubAddonslist[subaddon].id}');"/>  {$LANG.res_free} 
										</label>
                                        
                                        {*<input type="radio" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" id="free" value="Free" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $showSubAddonslist[subaddon].menuprice eq ''}checked="checked"{/if} onclick="addonsfreeoption('{$showSubAddonslist[subaddon].id}');"/> {$LANG.res_free} *}
										<label class="radio-inline">
											<input type="radio" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" id="paid" class="paid" value="Paid"  onclick="addonspaidoption_ajax('{$showSubAddonslist[subaddon].id}');"/>
											 {$LANG.res_paid} 
										</label>
                                        {*<span class="flt"><input type="radio" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" id="paid" value="Paid" {if $showSubAddonslist[subaddon].menupriceoption eq 'Paid'}checked="checked"{elseif $showSubAddonslist[subaddon].menupriceoption neq 'Free'}checked="checked"{/if} onclick="addonspaidoption_ajax('{$showSubAddonslist[subaddon].id}');"/> {$LANG.res_paid} &nbsp;</span>*}
									</div>
									<div  class="col-sm-5">	
										<!--Fixed option's addons price-->
										<span id="showprice_{$showSubAddonslist[subaddon].id}_fixed" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $menudet.0.sizeoption neq 'fixed'} style="display:none;" {/if} class="showprice_fixed" style="display:none;">
                                            <span class="col-sm-6"> 
                                                <input class="form-control numericfield input-sm" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_fixed]" id="addonsprice" value="{*if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Fixed{/if*}"   placeholder="Price"/>											
												{*<input class="paidTxtBox" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_medium_fixed]" id="addonsprice_medium" value="{if $showSubAddonslist[subaddon].menuaddons_price_medium eq 0.00}Medium{else}{$showSubAddonslist[subaddon].menuaddons_price_medium}{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuaddons_price_medium neq '0.00'}{$showSubAddonslist[subaddon].menuaddons_price_medium}{else}Medium{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuaddons_price_medium neq ''}{$showSubAddonslist[subaddon].menuaddons_price_medium|stripslashes}{else}Medium{/if}';" />
												<input class="paidTxtBox" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_large_fixed]" id="addonsprice_large" value="{if $showSubAddonslist[subaddon].menuaddons_price_large eq 0.00}Large{else}{$showSubAddonslist[subaddon].menuaddons_price_large}{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuaddons_price_large neq '0.00'}{$showSubAddonslist[subaddon].menuaddons_price_large}{else}Large{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuaddons_price_large neq ''}{$showSubAddonslist[subaddon].menuaddons_price_large|stripslashes}{else}Large{/if}';" />*}	
											</span>									
										</span>
										<!--Fixed option's addons price-->
										
										<!--Size option's addons price-->
										<span id="showprice_{$showSubAddonslist[subaddon].id}_size" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $menudet.0.sizeoption neq 'size'} style="display:none;" {/if} class="showprice_size">
										   <div class="col-sm-4">
                                            	<input class="form-control numericfield input-sm" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_size]" id="addonsprice" value="{*if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Small{/if*}"   placeholder="Small"/>
                                           </div>
                                            <div class="col-sm-4">
												<input class="form-control numericfield input-sm" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_medium_size]" id="addonsprice_medium" value="{*if $showSubAddonslist[subaddon].menuaddons_price_medium neq ''}{$showSubAddonslist[subaddon].menuaddons_price_medium}{else}Medium{/if*}"  placeholder="Medium" />
											</div>
											<div class="col-sm-4">
												<input class="form-control numericfield input-sm" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_large_size]" id="addonsprice_large" value="{*if $showSubAddonslist[subaddon].menuaddons_price_large neq ''}{$showSubAddonslist[subaddon].menuaddons_price_large}{else}Large{/if*}" placeholder="Large" />
											</div>
										</span>
										<!--Size option's addons price-->
										
										<!--Slice options addons price-->
										<span id="showprice_{$showSubAddonslist[subaddon].id}_slice" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $menudet.0.sizeoption neq 'slice'} style="display:none;" {/if} class="priceSpan showprice_slice">
										
											<input type="hidden" name="subaddonindex" id="subaddonindex" value="{$smarty.section.subaddon.index}" />
											<input type="hidden" name="mainaddonindex" id="mainaddonindex" value="{$smarty.section.addon.index}" />					
											{if $showSubAddonslist[subaddon].menuaddons_price_slice neq ''}
												{*$objSite->getSliceAddonsPrice($showSubAddonslist[subaddon].menuaddons_price_slice)*}
												{section name=slice1 loop=$sliceaddonprice_arr}
    												{assign var=sliceList value=$smarty.section.slice1.index}
    												<div class="col-sm-4">
    												<input class="form-control numericfield input-sm" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][{$smarty.section.slice1.index}][addons_price_slice]" id="addonsprice_slice" value="{*if $sliceaddonprice_arr[slice1] neq ''}{$sliceaddonprice_arr[slice1]}{else}Price{/if*}"  placeholder="Price"/>		
    												</div>	
												{/section}										
											{else}											
												{section name=slice1 loop=$cntSliceAddons}
    												{assign var=sliceList value=$smarty.section.slice1.index}
    												<div class="col-sm-4">
	    												<input class="form-control numericfield input-sm" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][{$smarty.section.slice1.index}][addons_price_slice]" id="addonsprice_slice" value="{*if $cntSliceAddons[slice1] neq ''}{$sliceaddonprice_arr[slice1]}{else}Price{/if*}"  placeholder="Price"/>
	    											</div>
												{/section}
											{/if}
											<input type="hidden" name="slicemoreprice_countperslice" class="slicemoreprice_countperslice" id="slicemoreprice_countperslice_{$smarty.section.addon.index}_{$smarty.section.subaddon.index}" value="" />
											
											<div class="slicemoreprice showprice_{$showSubAddonslist[subaddon].id}_slice addonrowline" id="slicemoreprice_{$smarty.section.addon.index}_{$smarty.section.subaddon.index}"></div>
										</span>	
										<!--Slice options addons price-->
									</div>
									{*------------  Remove Existing addons ------------*}
									{*<td valign="top" style="cursor:pointer;" > <span class="btnName" onclick="return removeAddon({$showAddonslist[addon].id},{$showSubAddonslist[subaddon].category_id},{$showSubAddonslist[subaddon].addonid},{$showSubAddonslist[subaddon].menu_addonid},{$showSubAddonslist[subaddon].restaurant_id},'{$showSubAddonslist[subaddon].addonsname}');" style="color:#ff0000;">{$LANG.res_remove}</span></td>*}
								
							</div>
						{/section}
						</div>
					
			{/section}
			<input type="hidden" id="total" value="{$smarty.section.addon.total}" />
		</div>
		</div>
		</div>
		
		<div id="createbuttondiv" class="addtoCartInnerNew1"></div>
		<div class="col-sm-offset-4 col-sm-2">
			<a onclick="addCreateMoreAddons_first();"  class="btn btn-success btn-sm" id="madAddons_firstajax"><i class="glyphicon glyphicon-edit marRight"></i>{$LANG.res_create_addons}</a>
		</div>
	{/if}
	
	{*---------------------------------------------------------------------------------------------------*}
	{if $action eq "menuAddons"}
		<!-- Addons List from menu mgmt -->
		<div id="showcataddonsList1" class="showcataddonsList_delete">
		<div class="myaccMenudiv myaccMenudivNew frt">
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<input type="hidden" name="cntSliceAddons" id="cntSliceAddons" value="{$cntSliceAddons}" />
			<input type="hidden" name="cntSliceAddons_createsub" id="cntSliceAddons_createsub" value="" />
            
            <input type='hidden' class="selectoptionsFirst" id="selectoptions" name='selectoptions' value='{$menudet.0.sizeoption}' />
            <span class="selectoptionVal"></span>
            			
			{section name="addon" loop=$showAddonslist}
				<tr>
					<td align="left" width="25%" height="35">
						<table width="100%" cellpadding="0" cellspacing="0" border="0">
							<tr>
    							{if $showAddonslist[addon].addonspriceoption eq 'Paid'}
    								<td align="left" width="35%" height="20">								
    									<input type="checkbox" name="mainaddons[{$smarty.section.addon.index}][mainaddonsname]" id="{$showAddonslist[addon].addonsname|stripslashes}" value="{$showAddonslist[addon].id}" {if $showAddonslist[addon].id eq $showAddonslist[addon].addonid}checked="checked"{/if}/> &nbsp;<label for="{$showAddonslist[addon].addonsname|stripslashes}">{$showAddonslist[addon].addonsname|stripslashes}</label>								
    								</td>
    								<td width="50%" height="20">
    									<input type="radio" name="mainaddons[{$smarty.section.addon.index}][addonspriceoption]" id="paid" value="Paid" onclick="addonspaidoption('{$showAddonslist[addon].id}');" {if $showAddonslist[addon].addonspriceoption eq 'Paid'}checked="checked"{/if}/>{$LANG.res_paid}&nbsp;
    									<span id="showprice_{$showAddonslist[addon].id}" {if $showAddonslist[addon].addonsprice eq '' or $showAddonslist[addon].addonsprice eq '0' or $showAddonslist[addon].addonspriceoption eq 'Free' } style="display:none;" {/if}>
    										<span class="flt">{$LANG.res_price}:</span><span class="priceSpan"> <input type="text" name="mainaddons[{$smarty.section.addon.index}][addons_price]" id="addonsprice" value="{$showAddonslist[addon].addonsprice}" size="10" readonly="" class="numericfield"/> </span>
    									</span>
    								</td>
    							{/if}
							</tr>
						</table>
						
						{*if $showAddonslist[addon].addonspriceoption eq 'Free'*}
						<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][mainaddonsname]" value="{$showAddonslist[addon].id}" />{*/if*}
						<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][mainaddoneditid]" value="{$showAddonslist[addon].menu_addonid}" />
						
						{*{$objSite->getShowSubAddonsListEdit($showAddonslist[addon].id,$menuid)}*}
						{assign var='showSubAddonslist' value=$objSite->getShowSubAddonsList($showAddonslist[addon].id,$showAddonslist[addon].maincat_option)}
					{if $showSubAddonslist neq ''}
                    <b style="cursor:pointer;" onclick="openAddons('q{$smarty.section.addon.rownum}')">{$showAddonslist[addon].addonsname|ucfirst|stripslashes}&nbsp;<img alt="" title="" src="{$SITE_IMAGE_URL}/arrowdown.png" class="uparr_q{$smarty.section.addon.rownum}" {if $smarty.section.addon.rownum eq '1'}style="display:none;"{/if}/> &nbsp;<img alt="" title="" src="{$SITE_IMAGE_URL}/arrowup.png" class="downarr_q{$smarty.section.addon.rownum}" {if $smarty.section.addon.rownum neq '1'}style="display:none;"{/if}/></b>{/if}						
						<div class="clr"></div>
						<div id="q{$smarty.section.addon.rownum}" {if $smarty.section.addon.rownum neq '1'}style="display:none;"{/if}>
						
						{section name="subaddon" loop=$showSubAddonslist}						
							<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addoneditid]" value="{$showSubAddonslist[subaddon].menu_addonid}" />
							
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr class="trMenu">
									<td align="left" width="30%" height="35" valign="top">									
    									{if $showSubAddonslist[subaddon].menu_categoryoption neq 'pizza'}
    										<input type="checkbox" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonsname]" id="{$showSubAddonslist[subaddon].addonsname|stripslashes}" value="{$showSubAddonslist[subaddon].id}" {if $showSubAddonslist[subaddon].id eq $showSubAddonslist[subaddon].addonid}checked="checked"{/if} /> &nbsp;<label for="{$showSubAddonslist[subaddon].addonsname|stripslashes}">{$showSubAddonslist[subaddon].addonsname|ucfirst|stripslashes}</label>
    									{else}
    										<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonsname]" id="{$showSubAddonslist[subaddon].addonsname|stripslashes}" value="{$showSubAddonslist[subaddon].id}" />
    										<label for="{$showSubAddonslist[subaddon].addonsname|stripslashes}">{$showSubAddonslist[subaddon].addonsname|ucfirst|stripslashes}</label>
    									{/if}
									</td>
									
									<td align="left" width="10%" height="35" valign="top" class="td1">
										<label><input type="radio" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" id="free" value="Free" onclick="addonsfreeoption('{$showSubAddonslist[subaddon].id}');" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free'}checked="checked"{/if}/>&nbsp;<span class="btnName" > {$LANG.res_free} </span></label>
									</td>
									
									<td align="left" width="10%" height="35" valign="top">
										<label><input type="radio" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" id="paid" value="Paid" onclick="addonspaidoption('{$showSubAddonslist[subaddon].id}');" {if $showSubAddonslist[subaddon].menupriceoption eq 'Paid'}checked="checked"{elseif $showSubAddonslist[subaddon].menupriceoption neq 'Free'}checked="checked"{/if}/>  &nbsp;<span class="btnName" >{$LANG.res_paid}</span></label>
									</td>
                                    
									<td align="left" headers="35" valign="top" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free'}style="display:none;"{/if} id="addonspricefreepaid_{$showSubAddonslist[subaddon].id}" width="40%">
										<!--Fixed option's addons price-->
										<span id="showprice_{$showSubAddonslist[subaddon].id}_fixed" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $menudet.0.sizeoption neq 'fixed'} style="display:none;" {/if} class="showprice_fixed">
											<span class="btnName">{$LANG.res_price} :</span>
                                            <span class="priceSpan"> 
                                                <input class="paidTxtBox numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_fixed]" id="addonsprice" value="{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Fixed{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Fixed{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice|stripslashes}{else}Fixed{/if}';"/>											
												{*<input class="paidTxtBox" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_medium]" id="addonsprice_medium" value="{if $showSubAddonslist[subaddon].menuaddons_price_medium eq 0.00}Medium{else}{$showSubAddonslist[subaddon].menuaddons_price_medium}{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuaddons_price_medium neq '0.00'}{$showSubAddonslist[subaddon].menuaddons_price_medium}{else}Medium{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuaddons_price_medium neq ''}{$showSubAddonslist[subaddon].menuaddons_price_medium|stripslashes}{else}Medium{/if}';" />
												<input class="paidTxtBox" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_large]" id="addonsprice_large" value="{if $showSubAddonslist[subaddon].menuaddons_price_large eq 0.00}Large{else}{$showSubAddonslist[subaddon].menuaddons_price_large}{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuaddons_price_large neq '0.00'}{$showSubAddonslist[subaddon].menuaddons_price_large}{else}Large{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuaddons_price_large neq ''}{$showSubAddonslist[subaddon].menuaddons_price_large|stripslashes}{else}Large{/if}';" />*}
											</span>	
										</span>
										<!--Fixed option's addons price-->
										
										<!--Size option's addons price-->
										<span id="showprice_{$showSubAddonslist[subaddon].id}_size" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $menudet.0.sizeoption neq 'size'} style="display:none;" {/if} class="showprice_size">
											<span class="btnName">Price :</span>
                                            <span class="priceSpan">
                                                <input class="paidTxtBox numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_size]" id="addonsprice" value="{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Small{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Small{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice|stripslashes}{else}Small{/if}';"/>
												<input class="paidTxtBox numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_medium_size]" id="addonsprice_medium" value="{if $showSubAddonslist[subaddon].menuaddons_price_medium neq ''}{$showSubAddonslist[subaddon].menuaddons_price_medium}{else}Medium{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuaddons_price_medium neq ''}{$showSubAddonslist[subaddon].menuaddons_price_medium}{else}Medium{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuaddons_price_medium neq ''}{$showSubAddonslist[subaddon].menuaddons_price_medium|stripslashes}{else}Medium{/if}';" />
												<input class="paidTxtBox numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_large_size]" id="addonsprice_large" value="{if $showSubAddonslist[subaddon].menuaddons_price_large neq ''}{$showSubAddonslist[subaddon].menuaddons_price_large}{else}Large{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuaddons_price_large neq ''}{$showSubAddonslist[subaddon].menuaddons_price_large}{else}Large{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuaddons_price_large neq ''}{$showSubAddonslist[subaddon].menuaddons_price_large|stripslashes}{else}Large{/if}';" />
											</span>
										</span>
										<!--Size option's addons price-->
										
										<!--Slice options addons price-->
										<span id="showprice_{$showSubAddonslist[subaddon].id}_slice" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $menudet.0.sizeoption neq 'slice'} style="display:none;" {/if} class="priceSpan showprice_slice">
										
											<input type="hidden" name="subaddonindex" id="subaddonindex" value="{$smarty.section.subaddon.index}" />
											<input type="hidden" name="mainaddonindex" id="mainaddonindex" value="{$smarty.section.addon.index}" />	
											
											{if $showSubAddonslist[subaddon].menuaddons_price_slice neq ''}
                                            {assign var='sliceaddonprice_arr' value=$objSite->getSliceAddonsPrice($showSubAddonslist[subaddon].menuaddons_price_slice)}	
											
												{section name=slice1 loop=$sliceaddonprice_arr}
    												{assign var=sliceList value=$smarty.section.slice1.index}
    												<input class="paidTxtBox numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][{$smarty.section.slice1.index}][addons_price_slice]" id="addonsprice_slice" value="{if $sliceaddonprice_arr[slice1] eq 0.00}Price{else}{$sliceaddonprice_arr[slice1]}{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuprice neq '0.00'}{$showSubAddonslist[subaddon].menuprice}{else}Price{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice|stripslashes}{else}Price{/if}';"/>			
												{/section}										
											{else}											
												{section name=slice1 loop=$cntSliceAddons}
    												{assign var=sliceList value=$smarty.section.slice1.index}
    												<input class="paidTxtBox numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][{$smarty.section.slice1.index}][addons_price_slice]" id="addonsprice_slice" value="{if $cntSliceAddons[slice1] eq 0.00}Price{else}{$sliceaddonprice_arr[slice1]}{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuprice neq '0.00'}{$showSubAddonslist[subaddon].menuprice}{else}Price{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice|stripslashes}{else}Price{/if}';"/>
												{/section}
											{/if}
											
											
											{*
														
											{if $showSubAddonslist[subaddon].menuaddons_price_slice neq ''}
												{$objSite->getSliceAddonsPrice($showSubAddonslist[subaddon].menuaddons_price_slice)}
												{section name=slice1 loop=$sliceaddonprice_arr}
    												{assign var=sliceList value=$smarty.section.slice1.index}
    												<input class="paidTxtBox" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][{$smarty.section.slice1.index}][addons_price_slice]" id="addonsprice_slice" value="{if $sliceaddonprice_arr[slice1] neq ''}{$sliceaddonprice_arr[slice1]}{else}Price{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Price{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice|stripslashes}{else}Price{/if}';"/>		
												{/section}										
											{else}											
												{section name=slice1 loop=$cntSliceAddons}
    												{assign var=sliceList value=$smarty.section.slice1.index}
    												<input class="paidTxtBox" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][{$smarty.section.slice1.index}][addons_price_slice]" id="addonsprice_slice" value="{if $cntSliceAddons[slice1] neq ''}{$sliceaddonprice_arr[slice1]}{else}Price{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Price{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice|stripslashes}{else}Price{/if}';"/>
												{/section}
											{/if}*}
											<input type="hidden" name="slicemoreprice_countperslice" class="slicemoreprice_countperslice" id="slicemoreprice_countperslice_{$smarty.section.addon.index}_{$smarty.section.subaddon.index}" value="" />
											
											<span class="slicemoreprice addonrowline" id="slicemoreprice_{$smarty.section.addon.index}_{$smarty.section.subaddon.index}"></span>
										</span>	
										<!--Slice options addons price-->										
									</td>
									{*-------------- Remove Existing addons -------------*}
                                    
									<td valign="top" style="cursor:pointer;" width="10%" > 
									{if $showSubAddonslist[subaddon].addonid neq ''}
										<span class="btnName" style="color:#ff0000;" onclick="return removeAddon({$showAddonslist[addon].id},{$showSubAddonslist[subaddon].category_id},{$showSubAddonslist[subaddon].addonid},{$showSubAddonslist[subaddon].menu_addonid},{$showSubAddonslist[subaddon].restaurant_id},'{$showSubAddonslist[subaddon].addonsname|addslashes}','{$menuid}');" >{$LANG.res_remove}</span>
									{/if}
									</td>
                                    
								</tr>
							</table>
						{/section}
						</div>
					</td>
				</tr>
			{/section}
			<input type="hidden" id="total" value="{$smarty.section.addon.total}" />
		</table>
		</div>
		
		<div id="createbuttondiv" class="addtoCartInnerNew1"></div>
		{*<a onclick="addCreateMoreAddons();" style="color:#7DB82B;cursor:pointer;font-weight:bold;text-decoration:underline;" class="madAddons">{$LANG.res_create_addons}</a>*}
		<a onclick="addCreateMoreAddons_first();" style="color:#7DB82B;cursor:pointer;font-weight:bold;text-decoration:underline;" class="madAddons" id="madAddons_first">{$LANG.res_create_addons}</a>	
		<input type="hidden" name="sizeoption_addmoreaddonedit" id="sizeoption_addmoreaddonedit" value="{$menudet.0.sizeoption}" />	
		</div>									
	 {/if}
    {*---------------------------------------------------------------------------------------*}
    {if $action eq "deleteAddons"}
    
        <div class="col-sm-8 col-sm-offset-4">
		
			<input type="hidden" name="cntSliceAddons" id="cntSliceAddons" value="{$cntSliceAddons}" />
			<input type="hidden" name="cntSliceAddons_createsub" id="cntSliceAddons_createsub" value="" />
            
            <input type='hidden' class="selectoptionsFirst" id="selectoptions" name='selectoptions' value='{$menudet.0.sizeoption}' />
            <span class="selectoptionVal"></span>
            			
			{section name="addon" loop=$showAddonslist}
				
						{*<table width="100%" cellpadding="0" cellspacing="0" border="0">
							<tr>
    							{if $showAddonslist[addon].addonspriceoption eq 'Paid'}
    								<td align="left" width="35%" height="20">								
    									<input type="checkbox" name="mainaddons[{$smarty.section.addon.index}][mainaddonsname]" id="{$showAddonslist[addon].addonsname|stripslashes}" value="{$showAddonslist[addon].id}" {if $showAddonslist[addon].id eq $showAddonslist[addon].addonid}checked="checked"{/if}/> &nbsp;<label for="{$showAddonslist[addon].addonsname|stripslashes}">{$showAddonslist[addon].addonsname|stripslashes}</label>								
    								</td>
    								<td width="50%" height="20">
    									<input type="radio" name="mainaddons[{$smarty.section.addon.index}][addonspriceoption]" id="paid" value="Paid" onclick="addonspaidoption('{$showAddonslist[addon].id}');" {if $showAddonslist[addon].addonspriceoption eq 'Paid'}checked="checked"{/if}/>{$LANG.res_paid}&nbsp;
    									<span id="showprice_{$showAddonslist[addon].id}" {if $showAddonslist[addon].addonsprice eq '' or $showAddonslist[addon].addonsprice eq '0' or $showAddonslist[addon].addonspriceoption eq 'Free' } style="display:none;" {/if}>
    										<span class="flt">{$LANG.res_price}:</span><span class="priceSpan"> <input type="text" name="mainaddons[{$smarty.section.addon.index}][addons_price]" id="addonsprice" value="{$showAddonslist[addon].addonsprice}" size="10" readonly="" class="numericfield"/> </span>
    									</span>
    								</td>
    							{/if}
							</tr>
						</table>*}
						
						{*if $showAddonslist[addon].addonspriceoption eq 'Free'*}
						<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][mainaddonsname]" value="{$showAddonslist[addon].id}" />{*/if*}
						<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][mainaddoneditid]" value="{$showAddonslist[addon].menu_addonid}" />
						
						{*{$objSite->getShowSubAddonsListEdit($showAddonslist[addon].id,$menuid)}*}
						{$objSite->getShowSubAddonsListEdit($showAddonslist[addon].id,$showAddonslist[addon].maincat_option,$menuid)}
												
						{if $cntmenuSubAddons1 gt 0}<b style="cursor:pointer;" onclick="openAddons('q{$smarty.section.addon.rownum}')">{$showAddonslist[addon].addonsname|ucfirst|stripslashes}&nbsp;<img alt="" title="" src="{$SITE_IMAGE_URL}/arrowdown.png" class="uparr_q{$smarty.section.addon.rownum}" {if $smarty.section.addon.rownum eq '1'}style="display:none;"{/if}/> &nbsp;<img alt="" title="" src="{$SITE_IMAGE_URL}/arrowup.png" class="downarr_q{$smarty.section.addon.rownum}" {if $smarty.section.addon.rownum neq '1'}style="display:none;"{/if}/></b>{/if}						
						<div class="clr"></div>
						<div id="q{$smarty.section.addon.rownum}" {if $smarty.section.addon.rownum neq '1'}style="display:none;"{/if}>
						
						{section name="subaddon" loop=$showSubAddonslist}	
							<div class="form-group">					
							<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addoneditid]" value="{$showSubAddonslist[subaddon].menu_addonid}" />
							
						
									<div class="col-sm-3">									
    									{if $showSubAddonslist[subaddon].menu_categoryoption neq 'pizza'}
    										<label class="checkbox-inline">
    											<input type="checkbox" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonsname]" id="{$showSubAddonslist[subaddon].addonsname|stripslashes}" value="{$showSubAddonslist[subaddon].id}" {if $showSubAddonslist[subaddon].id eq $showSubAddonslist[subaddon].addonid}checked="checked"{/if} />{$showSubAddonslist[subaddon].addonsname|ucfirst|stripslashes}
    										</label>
    									{else}
    										<label class="checkbox-inline">	
    											<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonsname]" id="{$showSubAddonslist[subaddon].addonsname|stripslashes}" value="{$showSubAddonslist[subaddon].id}" />{$showSubAddonslist[subaddon].addonsname|ucfirst|stripslashes}
    										</label>
    									{/if}
									</div>
									
									<div class="col-sm-2">
										<label class="radio-inline"><input type="radio" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" id="free" value="Free" onclick="addonsfreeoption('{$showSubAddonslist[subaddon].id}');" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free'}checked="checked"{/if}/>{$LANG.res_free} </label>
									
										<label  class="radio-inline"><input type="radio" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" id="paid" value="Paid" onclick="addonspaidoption('{$showSubAddonslist[subaddon].id}');" {if $showSubAddonslist[subaddon].menupriceoption eq 'Paid'}checked="checked"{elseif $showSubAddonslist[subaddon].menupriceoption neq 'Free'}checked="checked"{/if}/> {$LANG.res_paid}</label>
									</div>
                                    
									<div class="col-sm-5">	
										<!--Fixed option's addons price-->
										<span id="showprice_{$showSubAddonslist[subaddon].id}_fixed" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $menudet.0.sizeoption neq 'fixed'} style="display:none;" {/if} class="showprice_fixed">
                                                <input class="form-control input-sm numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_fixed]" id="addonsprice" value="{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Price{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Price{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice|stripslashes}{else}Price{/if}';"/>		
										</span>
										<!--Fixed option's addons price-->
										
										<!--Size option's addons price-->
										<div id="showprice_{$showSubAddonslist[subaddon].id}_size" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $menudet.0.sizeoption neq 'size'} style="display:none;" {/if} class="showprice_size">
											
                                            <div class="col-sm-4">
                                                <input class="form-control input-sm numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_size]" id="addonsprice" value="{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Price{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Price{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice|stripslashes}{else}Price{/if}';"/>
                                            </div>
                                            <div class="col-sm-4">
												<input class="form-control input-sm numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_medium_size]" id="addonsprice_medium" value="{if $showSubAddonslist[subaddon].menuaddons_price_medium neq ''}{$showSubAddonslist[subaddon].menuaddons_price_medium}{else}Price{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuaddons_price_medium neq ''}{$showSubAddonslist[subaddon].menuaddons_price_medium}{else}Price{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuaddons_price_medium neq ''}{$showSubAddonslist[subaddon].menuaddons_price_medium|stripslashes}{else}Price{/if}';" />
											</div>
											<div class="col-sm-4">
												<input class="form-control input-sm numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_large_size]" id="addonsprice_large" value="{if $showSubAddonslist[subaddon].menuaddons_price_large neq ''}{$showSubAddonslist[subaddon].menuaddons_price_large}{else}Price{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuaddons_price_large neq ''}{$showSubAddonslist[subaddon].menuaddons_price_large}{else}Price{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuaddons_price_large neq ''}{$showSubAddonslist[subaddon].menuaddons_price_large|stripslashes}{else}Price{/if}';" />
											</div>
										</div>
										<!--Size option's addons price-->
										
										<!--Slice options addons price-->
										<div id="showprice_{$showSubAddonslist[subaddon].id}_slice" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $menudet.0.sizeoption neq 'slice'} style="display:none;" {/if} class="priceSpan showprice_slice">
										
											<input type="hidden" name="subaddonindex" id="subaddonindex" value="{$smarty.section.subaddon.index}" />
											<input type="hidden" name="mainaddonindex" id="mainaddonindex" value="{$smarty.section.addon.index}" />	
														
											{if $showSubAddonslist[subaddon].menuaddons_price_slice neq ''}
												{$objSite->getSliceAddonsPrice($showSubAddonslist[subaddon].menuaddons_price_slice)}
												{section name=slice1 loop=$sliceaddonprice_arr}
    												{assign var=sliceList value=$smarty.section.slice1.index}
    												<div class="col-sm-4">
    													<input class="form-control input-sm numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][{$smarty.section.slice1.index}][addons_price_slice]" id="addonsprice_slice" value="{if $sliceaddonprice_arr[slice1] neq ''}{$sliceaddonprice_arr[slice1]}{else}Price{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Price{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice|stripslashes}{else}Price{/if}';"/>	
    												</div>		
												{/section}										
											{else}											
												{section name=slice1 loop=$cntSliceAddons}
    												{assign var=sliceList value=$smarty.section.slice1.index}
    												<div class="col-sm-4">
    													<input class="form-control input-sm numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][{$smarty.section.slice1.index}][addons_price_slice]" id="addonsprice_slice" value="{if $cntSliceAddons[slice1] neq ''}{$sliceaddonprice_arr[slice1]}{else}Price{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Price{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice|stripslashes}{else}Price{/if}';"/>
    												</div>
												{/section}
											{/if}
											<input type="hidden" name="slicemoreprice_countperslice" class="slicemoreprice_countperslice" id="slicemoreprice_countperslice_{$smarty.section.addon.index}_{$smarty.section.subaddon.index}" value="" />
											
											<div class="slicemoreprice addonrowline" id="slicemoreprice_{$smarty.section.addon.index}_{$smarty.section.subaddon.index}"></div>
										</div>	
										<!--Slice options addons price-->	
									</div>									
									
									{*-------------- Remove Existing addons -------------*}
                                   
									<div class="col-sm-2">
									 {if $showSubAddonslist[subaddon].addonid neq ''}
									 	 <span class="btn btn-danger btn-sm"  onclick="return removeAddon({$showAddonslist[addon].id},{$showSubAddonslist[subaddon].category_id},{$showSubAddonslist[subaddon].addonid},{$showSubAddonslist[subaddon].menu_addonid},{$showSubAddonslist[subaddon].restaurant_id},'{$showSubAddonslist[subaddon].addonsname|addslashes}','{$menuid}');" ><i class="glyphicon glyphicon-remove"></i>
									 	 </span>
									 {/if}
									</div>
                                    
								</div>
						{/section}
						</div>
					
			{/section}
			<input type="hidden" id="total" value="{$smarty.section.addon.total}" />
		
		</div>
		
		<div id="createbuttondiv" class="addtoCartInnerNew1"></div>
		{*<a onclick="addCreateMoreAddons();" style="color:#7DB82B;cursor:pointer;font-weight:bold;text-decoration:underline;" class="madAddons">{$LANG.res_create_addons}</a>*}
		<div class="col-sm-offset-4 col-sm-2 marTop10">
			<a onclick="addCreateMoreAddons_first();" class="btn btn-success btn-sm"  id="madAddons_first"><i class="glyphicon glyphicon-edit marRight"></i>{$LANG.res_create_addons}</a>	
		</div>
		<input type="hidden" name="sizeoption_addmoreaddonedit" id="sizeoption_addmoreaddonedit" value="{$menudet.0.sizeoption}" />	
        
   
    {/if}
	{*---------------------------------------------------------------------------------------*}
	
	
	{******************************************************************************************}
	{if $action eq "menuPriceDetails"}
		<div class="addPageCont">		
		  {*<div id="menusize_option">*}
			<span class="addPageRightFont">{$LANG.res_menu_price}</span>
			<span class="colon1">:</span>
			<span class="myaccMenudiv myaccMenudivNew frt">
				<span class="row-fluid">
					<span class="span3 offset0"><input type="radio" name="sizeoption" id="sizeoption_fixedprice_edit" value="fixed" {if $menudet.0.sizeoption eq 'fixed'}checked="checked"{/if} onclick="return fixedOption_Edit();"/><label class="btnName">{$LANG.res_fixed_price}</label></span>
					<span class="span3 offset0"><input type="radio" name="sizeoption" id="sizeoption_default_edit" value="default" {if $menudet.0.sizeoption eq 'size'}checked="checked"{/if} onclick="return defaultOption_Edit();"/><label class="btnName">{$LANG.res_size}</label></span>
					<span class="span3 offset0"><input type="radio" name="sizeoption" id="sizeoption_other_edit" value="other" {if $menudet.0.sizeoption eq 'slice'}checked="checked"{/if} onclick="return otherOption_Edit();"/><label class="btnName">{$LANG.res_slice}</label></span>
				</span>
			</span>
            <!-- Fixed -->
			<span id="fixedOption1" {if $menudet.0.sizeoption eq 'slice' or $menudet.0.sizeoption eq 'size'}style="display:none;"{/if} class="clr addPageCont">
				<span class="myaccMenudiv frt">
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td align="left" width="16%" height="30">
								<input class="textbox textboxNew numericfield" type="text" name="menu_price" id="menu_price1_edit" value="{$menudet[0].menu_price|stripslashes}" placeholder="Price"/>
							</td>
						</tr>
					</table>
				</span>
			</span>
			<!-- Size -->
			<span id="pizzaDefaultOption1" {if $menudet.0.sizeoption eq 'slice' or $menudet.0.sizeoption eq 'fixed'}style="display:none;"{/if} class="clr addPageCont">
				<span class="myaccMenudiv frt">
				<table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td align="left" width="16%" height="30">
							<input type="checkbox" name="small" id="small1" value="small" onclick="showSmallPrice();" {if $menudet.0.pizza_size_small eq 'small'}checked="checked"{/if} /><label class="btnNameMenu">{$LANG.res_small}</label>
						
							<span id="smallpriceshowedit" {*if $menudet.0.pizza_small_value eq '0.00' or $menudet.0.pizza_small_value eq ''} style="display:none;" {/if*}{if $menudet.0.pizza_size_small neq 'small'}style="display:none;"{/if} class="textboxAddonsizeName">
							<input type="text" name="smallval" id="smallval1" value="{if $menudet.0.pizza_small_value neq '0.00'}{$menudet.0.pizza_small_value}{/if}" class="textboxAddonsize numericfield" placeholder="Price" />
							</span><br />
						</td>
					</tr>
					
					<tr>
						<td align="left" width="16%" height="30">
							<input type="checkbox" name="medium" id="medium1" value="medium" onclick="showMediumPrice();" {if $menudet.0.pizza_size_medium eq 'medium'}checked="checked"{/if} /><label class="btnNameMenu">{$LANG.res_medium}</label>
							<span id="mediumpriceshowedit" {*if $menudet.0.pizza_medium_value eq '0.00' or $menudet.0.pizza_medium_value eq ''} style="display:none;" {/if*}{if $menudet.0.pizza_size_medium neq 'medium'}style="display:none;"{/if} class="textboxAddonsizeName">
							<input type="text" name="mediumval" id="mediumval1" value="{if $menudet.0.pizza_medium_value neq '0.00'}{$menudet.0.pizza_medium_value}{/if}" class="textboxAddonsize numericfield" placeholder="Price" /></span><br />
						</td>
					</tr>
					
					<tr>
						<td align="left" width="16%" height="30">
							<input type="checkbox" name="large" id="large1" value="large" onclick="showLargePrice();" {if $menudet.0.pizza_size_large eq 'large'}checked="checked"{/if} /><label class="btnNameMenu">{$LANG.res_large}</label>
							<span id="largepriceshowedit" {*if $menudet.0.pizza_large_value eq '0.00' or $menudet.0.pizza_large_value eq ''} style="display:none;" {/if*}{if $menudet.0.pizza_size_large neq 'large'}style="display:none;"{/if} class="textboxAddonsizeName">
							<input type="text" name="largeval" id="largeval1" value="{if $menudet.0.pizza_large_value neq '0.00'}{$menudet.0.pizza_large_value}{/if}" class="textboxAddonsize numericfield" placeholder="Price" /></span>
						</td>
					</tr>
				</table>				
				</span>
			</span>
			<!-- Slice -->
			<span id="pizzaOtherOption1" {if $menudet.0.sizeoption eq 'size' or $menudet.0.sizeoption eq 'fixed'}style="display:none;"{/if} class="clr addPageCont">
				<span class="myaccMenudiv frt">
				<table width="100%" cellpadding="0" cellspacing="0" border="0">
					{section name="slicelist" loop=$showPizzaSlicelist}
					<tr>
						<td align="left" width="16%" height="40">
							<input type="text" name="size_option[{$smarty.section.slicelist.index}][sizename]" id="sizename1" value='{$showPizzaSlicelist[slicelist].pizza_slice_name|stripslashes}' class="textboxAddonsize span2 slicevalidate"/> &nbsp;&nbsp;
							<input type="text" class="textboxAddonsize span2 slicevalidate numericfield" name="size_option[{$smarty.section.slicelist.index}][sizevalue]" id="sizevalue1" value="{$showPizzaSlicelist[slicelist].pizza_slice_price}" /> 
						</td>
					</tr>					
					{*{sectionelse}
					<tr>
						<td align="left" width="16%" height="30">
							<input type="text" name="sizename" id="sizename" value="" /> &nbsp;&nbsp;
							<input type="text" name="sizevalue" id="sizevalue" value="" /> 
						</td>
					</tr>*}					
					{/section}
					</table>
				</span>
				<div class="clr"></div>
				<span class="myaccMenudiv myaccMenudivNew frt">
				<table id="specialPizzaSize" border="0" width="100%">
					{section name=slice1 loop=$cntSliceAddons}
					{assign var=sliceList value=$smarty.section.slice1.index}
					<input type="hidden" name="size_option[{$sliceList}][sliceeditid]" value="{$showPizzaSlicelist.$sliceList.pizza_slice_id}" />
					{/section}
					<tfoot><tr>
					<td class="left" height="20">
						<a onclick="addMorePizzaSize();" style="color:#ff0000;cursor:pointer;"><span>{$LANG.res_add_more_slice}</span></a>
					</td>
					</tr></tfoot>
				</table>
				</span>
			</span>
		{*</div>*}
	  </div>
	{/if}	
{**************************************NEW IMPLEMENTATION***************************************}
{if $action eq 'Bookings'}
	{include file='restaurantOwnerMyaccount_bookings.tpl'}
{/if}

{if $action eq "bookingFullDetails"}
<!-- Order Full details POPUP -->
	<!--<div class="addtocartPopupHead">
		<h1 class="addtocartPopupHeadNew">{$SITE_NAME}</h1>
		<h1 class="addtocartPopupHeadNew">Order No - {$orderDetails.0.ordergenerateid}</h1>
		<div class="addtoCartClose" data-dismiss="modal" ></div>
	</div>-->

	<div class="inlineblock">
		<h1 class="bookingHeading">{$restaurantname|stripslashes} Booking Details</h1>
		<ul class="thanksUlNew1Book">
			<li>
				<span class="name">{$LANG.res_myaccount_guests}</span>
				<span class="colon">:</span>
				<span class="value">{$orderDetails.0.num_guests}</span>
			</li>
			<li>
				<span class="name">{$LANG.res_myaccount_bookingdate}</span>
				<span class="colon">:</span>
				<span class="value">{$orderDetails.0.booking_date}</span>
			</li>
			<li>
				<span class="name">{$LANG.res_myaccount_bookingtime}</span>
				<span class="colon">:</span>
				<span class="value">{$orderDetails.0.booking_time}</span>
			</li>
		
			<li>
				<span class="name">{$LANG.res_myaccount_bookname}</span>
				<span class="colon">:</span>
				<span class="value">{$orderDetails.0.booking_name|ucfirst|stripslashes}</span>
			</li>
			<li>
				<span class="name">{$LANG.res_myaccount_bookemail}</span>
				<span class="colon">:</span>
				<span class="value">{$orderDetails.0.booking_email|stripslashes}</span>
			</li>
			<li>
				<span class="name">{$LANG.res_myaccount_booktmobile}</span>
				<span class="colon">:</span>
				<span class="value">{$orderDetails.0.booking_mobileno}</span>
			</li>
			{if $orderDetails.0.booking_phoneno neq ''}
			<li>
				<span class="name">{$LANG.res_myaccount_bookingtelephone}</span>
				<span class="colon">:</span>
				<span class="value">{$orderDetails.0.booking_phoneno|ucfirst|stripslashes}</span>
			</li>
			{/if}
			{if $orderDetails.0.booking_ext neq ''}
			<li>
				<span class="name">{$LANG.res_myaccount_bookingext}</span>
				<span class="colon">:</span>
				<span class="value">{$orderDetails.0.booking_ext}</span>
			</li>
			{/if}
			{if $orderDetails.0.booking_instruction neq ''}
			<li>
				<span class="name">{$LANG.res_myaccount_bookinginst}</span>
				<span class="colon">:</span>
				<span class="value">{$orderDetails.0.booking_instruction|ucfirst|stripslashes}</span>
			</li>
			{/if}
		</ul>
	</div>

{/if}
{*--------------------------------------Restaurant Invoice Details-------------------------------------------*}
{if $action eq 'restaurantInvoiceDetails'}
{$objResInvoice->inv_deli_order_list()}
	<div class="rightContBody">
		<div class="riteContWrap1"> 
			<div style="display:block; width:96%; padding:0 2%;"> 
	
			<span id="backtoinvoice"><input type="button" value="Back" onclick="return backtoinvoice();"></span>
	        <div style="clear:both;"></div>
			<div style="display:block; width:100%; vertical-align:top;margin-top:15px;">
				<div style="display:block; width:100%; vertical-align:top;">
					<!--  Logo  -->
					<div style="display:inline-block; width:100%; padding-bottom:20px;">
						<div style="display:inline-block; width:49%; vertical-align:top;">
							<div style="display:inline-block; width:100%; vertical-align:top; font-size:20px; font-weight:bold; padding-bottom:5px;">Invoice  {$invoice_gen_no}</div>
							<div style="display:inline-block; width:100%; vertical-align:top padding-bottom:5px;;">Invoice Date :  {$invoice_sent_date}</div>
							<div style="display:inline-block; width:100%; vertical-align:top; padding-bottom:5px;">Period : ({$inv_period})</div>
						</div>
						<div style="display:inline-block; width:49%; vertical-align:top; float:right;">
						
						<img src="{$SITE_LOGO}" alt="{$SITE_NAME}" title="{$SITE_NAME}" style="float:right;" />
						</div>
					</div>
					<!--  Address  -->
					<div style="display:inline-block; width:100%; border-top:1px solid #000; padding-top:20px;">
						<div style="display:inline-block; width:49%; vertical-align:top;">
							<div style="width:100%; font-family:Arial; font-size:13px; font-weight:bold;">Restaurant</div>
							<div style="display:block; width:100%; font-family:Arial; font-size:13px;">{$res_det.0.res_name|stripslashes}</div>
							{if $res_det.0.res_st_address neq ''}<div style="display:block; width:100%; font-family:Arial; font-size:13px;">{$res_det.0.res_st_address|stripslashes}</div>{/if}
							{if $res_det.0.res_city neq ''}<div style="display:block; width:100%; font-family:Arial; font-size:13px;">{$res_det.0.res_city|stripslashes}{if $res_det.0.res_zip neq ''}-{$res_det.0.res_zip|stripslashes}{/if}</div>{/if}
							{if $res_det.0.res_state neq ''}<div style="display:block; width:100%; font-family:Arial; font-size:13px;">{$res_det.0.res_state|stripslashes}</div>{/if}
							<div style="display:block; width:100%;">
								<div style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">Account number : </span>HB{$res_det.0.restaurant_generate_id}</div>
							</div>
						</div>
						<div style="display:inline-block; width:49%; vertical-align:top; float:right; text-align:right;">
							<div style="display:block; width:100%; font-family:Arial; font-size:13px;">
								<div style="display:inline-block; vertical-align:top;">{$site_address}</div>
							</div>
							<div style="display:block; width:100%;">
								<div style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">Tel : </span>{$SITE_PHONE}</div>
							</div>
							<div style="display:block; width:100%;">
								<div style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">Email : </span><a href="{$SITE_INVOICE_EMAIL}">{$SITE_INVOICE_EMAIL}</a></div>
							</div>
							<div style="display:block; width:100%;">
								<div style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">Website : </span>{$SITE_BASEURL}</div>
							</div>
							<div style="display:block; width:100%;">
								<div style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">VAT Registration : </span>{$SITE_VAT_NO}</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Invoice List  -->
				<div style="clear:both;"></div>
				<div style="display:block; width:100%; vertical-align:top; margin-top:15px;margin-bottom:10px;">
				
					<div style="clear:both;"></div>
					<table width="100%" align="center"  style="font:13px Arial;">
						<tr style="border-bottom:1px solid #000; font-size:18px;">
							<th width="70%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; font-weight:bold;">
								<table width="100%" align="center">
									<tr>
										<td width="70%">Invoice breakdown</td>
										<td width="30%" style="text-align:right;"></td>
									</tr>
								</table>
							</th>
							<th width="30%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; font-weight:bold;">Amount</th>
						</tr>
						<tr>
							<td width="70%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">
								<table width="100%" align="center">
									<tr>
										<td width="70%">Total value for</td>
										<td width="30%" style="text-align:right;">{$total_orders} orders</td>
									</tr>
								</table>
							</td>
							<td width="30%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;">{$currency} {$totalSales}</td>
						</tr>
						<tr>
							<td width="70%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">
								<table width="100%" align="center">
									<tr>
										<td width="70%">Customers paid cash for</td>
										<td width="30%" style="text-align:right;">{$total_orders_cash} orders</td>
									</tr>
								</table>
							</td>
							<td width="30%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;">{$currency} {$totalSales_cash}</td>
						</tr>
						<tr>
							<td width="70%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">
								<table width="100%" align="center">
									<tr>
										<td width="70%">Customers prepaid online with card for </td>
										<td width="30%" style="text-align:right;">{$total_orders_cc} orders</td>
									</tr>
								</table>
							</td>
							<td width="30%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;">{$currency} {$totalSales_cc}</td>
						</tr>
					</table>
					<table width="100%" align="center" style="font:13px Arial;">
	                    <tr>
							<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3;">Admin fee and charges</td>
							<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3;">{$currency} {$admin_service_fee_charge}</td>
						</tr>
						<tr>
							<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;">{$rest_comm_order_per}% commission on orders</td>
							<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;">{$currency} {$totalCommission}</td>
						</tr>
						<tr>
							<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;">UK VAT ({$uk_vat_per}%):</td>
							<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;">{$currency} {$uk_vat_cal}</td>
						</tr>
	                    <tr>
							<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;">Total amount owed to {$SITE_NAME}:</td>
							<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;">{$currency} {$net_amt_vat}</td>
						</tr>
						<tr>
							<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3;">Total owned to restaurant ({$currency} {$totalSales_cc} - {$currency} {$net_amt_vat}):</td>
							<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3;">{$currency} {$total_owned_to_restaurant}</td>
						</tr>
						<tr>
							<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;">Account balance carried forward from previous invoice {$prev_inv_cont}<br />(Note: This should be &pound;0.00 if the previous amount is positive, because it had been paid by {$SITE_NAME})</td>
							<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;">{$currency} {$previous_invoice_balance}</td>
						</tr>
						<tr height="1"><td>&nbsp;</td><td>&nbsp;</td></tr>
						<tr>
							<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3; font-weight:bold;">Total payable to restaurant (this invoice):</td>
							<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3; font-weight:bold;">{$currency} {$total_payable_to_restaurant}</td>
						</tr>
					</table>
				</div>
				
				<!-- Hunger Buster  -->
				<div style="clear:both;"></div>
				<div style="display:block; width:100%; vertical-align:top; margin-top:15px;margin-bottom:10px;">
					<div style="display:block; width:80%; font-family:Arial; font-size:20px; font-weight:bold; margin-bottom:15px;">{$SITE_NAME} will pay {$currency} {$total_payable_to_restaurant}<br /> into your account: {$res_det.0.res_ac_no}</div>
					<div style="display:block; width:100%; font-family:Arial; font-size:13px; line-height:20px;margin-bottom:10px;">The sort code and account number on this invoice are masked for your protection  if the unmasked section of these fields appears to be incorrect or if you have any questions regarding this invoice please call us on Tel: {$SITE_PHONE} or write to us at <a href="mailto:{$SITE_INVOICE_EMAIL}">{$SITE_INVOICE_EMAIL}</a></div>
					<div style="display:block; width:100%; font-family:Arial; font-size:13px; padding-bottom:10px; border-bottom:1px solid #000; margin-bottom:20px;">Amount will be paid in your account on or around the {$payment_send_date}</div>
					<div style="display:block; width:100%; font-family:Arial; font-size:13px;margin-bottom:20px;line-height:20px;">If you have any question regarding this invoice or changes to your information, please contact {$SITE_NAME} at Tel: {$SITE_PHONE} or via e-mail at: <a href="mailto:{$SITE_INVOICE_EMAIL}">{$SITE_INVOICE_EMAIL}</a></a></div>
				</div>
				
				<!-- Other Service  -->
				<div style="clear:both;"></div>
				<div style="display:block; width:100%; vertical-align:top; margin-top:15px;margin-bottom:10px;">
					<div style="display:block; width:100%; font-family:Arial; font-size:20px; font-weight:bold; padding-bottom:15px; border-bottom:1px solid #000;margin-bottom:15px;">Other services charges for this period</div>
					<table width="100%" align="center" style="font-size:13px; font-family:Arial; line-height:22px;">
						<thead>
						  <tr>
							<th style="text-align:center; border-bottom:2px solid #f5950c; font-weight:bold;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">Date</th>
							<th style=" text-align:left; border-bottom:2px solid #f5950c; font-weight:bold;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">Narrative</th>
							<th style="text-align:center; border-bottom:2px solid #f5950c; font-weight:bold;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">Quantity</th>
							<th style="text-align:right; border-bottom:2px solid #f5950c; font-weight:bold;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">Price</th>
							<th style="text-align:center; border-bottom:2px solid #f5950c; font-weight:bold;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">Discount</th>
							<th style="text-align:right; border-bottom:2px solid #f5950c; font-weight:bold;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">Net</th>
						  </tr>
						 </thead>
						 <tbody>
						  <tr>
							 <td style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">{$endeddate|date_format:"%d %b %Y"}</td>
							 <td style="text-align:left;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">Card Payment fees (on {$total_orders_cc} payments worth {$totalSales_cc})</td>
							 <td style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">1</td>
							 <td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">{$currency} {$card_payment_fees}</td>
							 <td style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">&nbsp;</td>
							 <td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">{$currency} {$card_payment_fees}</td>
						  </tr>
	                      {if $othername1 neq ''}
						  <tr>
							 <td style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">{$endeddate|date_format:"%d %b %Y"}</td>
							 <td style="text-align:left;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">{$othername1}</td>
							 <td style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">1</td>
							 <td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">{$currency} {$otherprice1}</td>
							 <td style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">&nbsp;</td>
							 <td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">{$currency} {$otherprice1}</td>
						  </tr>
	                      {/if}
	                      {if $othername2 neq ''}
						  <tr>
							 <td style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">{$endeddate|date_format:"%d %b %Y"}</td>
							 <td style="text-align:left;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">{$othername2}</td>
							 <td style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">1</td>
							 <td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">{$currency} {$otherprice2}</td>
							 <td style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">&nbsp;</td>
							 <td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">{$currency} {$otherprice2}</td>
						  </tr>
	                      {/if}
						  <tr>
							<td colspan="5" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">Subtotal services:</td>
							<td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">{$currency} {$admin_service_fee_charge}</td>
						  </tr>
						  <tr>
							<td colspan="5" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">Subtotal commission on orders:</td>
							<td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">{$currency} {$totalCommission}</td>
						  </tr>
						  <tr>
							<td colspan="5" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">UK VAT ({$uk_vat_per}%):</td>
							<td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">{$currency} {$uk_vat_cal}</td>
						  </tr>
	                      <tr>
							<td colspan="5" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; font-weight:bold;">Total Service Charges:</td>
							<td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; font-weight:bold;">{$currency} {$net_amt_vat}</td>
						  </tr>
						 </tbody>
					</table>
				</div>
				
				<!-- Order Detail  -->
				<div style="clear:both;"></div>
				<div style="display:block; width:100%; vertical-align:top; margin-top:15px;margin-bottom:10px; border-top:1px solid #000000; padding-top:15px;">
					<div style="display:block; width:100%; font-family:Arial; font-size:20px; font-weight:bold; margin-bottom:15px;">Order details</div>
					<table width="100%" align="center" style="font-size:13px; font-family:Arial; line-height:22px;">
					<thead>
					  <tr>
						<th style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">#</th>
						<th style=" text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Date</th>
						<th style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Order No</th>
						<th style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Paid Mtd</th>
						<th style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Value</th>
						<th style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Commission</th>
						<th style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Total</th>
					  </tr>
					 </thead>
					 <tbody>
					  {section name=inv loop=$inv_deli_order}
	                  {assign var="trvar" value=$smarty.section.inv.rownum}
					  <tr>
						<td width="5%" style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">{$smarty.section.inv.rownum}</td>
						<td width="10%" style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">{$inv_deli_order[inv].deliverydate|date_format:"%a %d %b %Y"}</td>
						<td width="15%" style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">{$inv_deli_order[inv].ordergenerateid} {if $inv_deli_order[inv].payment_type eq 'cc' || $inv_deli_order[inv].payment_type eq 'CC' || $inv_deli_order[inv].payment_type eq 'paypal' || $inv_deli_order[inv].payment_type eq 'creditcard'}(card fee: {$SITE_CC_PERCENTAGE}){/if}</td>
						<td width="10%" style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">{if $inv_deli_order[inv].payment_type eq 'cod'}Cash{elseif $inv_deli_order[inv].payment_type eq 'CC'}Credit Card{elseif $inv_deli_order[inv].payment_type eq 'paypal'}Paypal{else}{$inv_deli_order[inv].payment_type}{/if}</td>
						<td width="10%" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">{$inv_deli_order[inv].ordertotalprice}</td>
						<td width="10%" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">{$currency} {$inv_deli_order[inv].res_comm_price}</td>
						<td width="10%" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">{$currency} {$inv_deli_order[inv].res_comm_price}</td>
					  </tr>
					  {/section}
					  <tr>
						<td colspan="7" align="right" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff;border-bottom:2px solid #f5950c;/*4bacc6*/ font-weight:bold;">Subtotal commission on orders: {$currency} {$totalCommission}</td>
					 </tbody>
				</table>
				</div>
				
				<div style="clear:both;"></div>
				<div style="display:block; width:100%; vertical-align:top; margin-top:10px;margin-bottom:15px;">
					<div style="display:block; width:100%; font-family:Arial; font-size:16px; font-weight:bold; margin-bottom:5px;">Partner tariff</div>
					<div style="display:block; width:100%; font-family:Arial; font-size:13px;margin-bottom:5px;">Your current commission is: {$rest_comm_order_per}% per order</div>
				</div>	
			</div>
		
		</div>
		
	</div>
	</div>

{/if}

{if $action eq "booktable"}
    {include file='restaurantOwnerMyaccount_bookings_ajax.tpl'}
{/if}
{if $action eq "rest_status"}
    <a  class="ownername">{$rest_status}</a>
{/if}
{*---------------------------------------------------------------------------------------------------------------------*}
{if $action eq "resownerEditCommissionInfoList"}
    <h1 class="restOwnMyHead">{*$LANG.res_myaccount_setcommissioninfo*}Commission</h1>
			<a class="btn btn-warning pull-right btn-sm" href="javascript:void(0);" onclick="editCommissionInfoShow();"><i class="glyphicon glyphicon-edit marRight"></i>{$LANG.res_myaccount_setdeliveredit}</a>
			<!-- Content start -->
			<div class="addPageCont">
				<span class="addPageRightFont">{$LANG.res_myaccount_setcommission}</span>
				<span class="colon1">:</span>
				<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_commission}</span>
			</div>
{/if}

{*---------------------------------------------------------------------------------*}
{*--------------------Validation for Numeric/Price Fields-----------------------*}
{literal}
    <script type="text/javascript">
        //Allow only numbers in textbox
        $(".numericfield").keypress(function(e) {	
            var k = e.which;    
            if ( (k < 48 || k > 57) && (k!=8) &&(k!=0) && (k!=46) ) {
                e.preventDefault();
                return false;
            }				   
        });	
    </script>
{/literal}
