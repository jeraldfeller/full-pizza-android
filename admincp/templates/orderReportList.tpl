<div class="rightContHeading Heading borderNewtab">Report List - {$restname|stripslashes}</div>
<div class="rightContBody bgWhite">
	<span id="printing"></span>
	<div class="riteContWrap1 bgWhite">
		<img src="{$SITE_LOGO}" alt="{$SITE_NAME}" title="{$SITE_NAME}" id="logoimg" style="display:none"/>
		<div class="manageButtonLeftReport" style="width:100%;">	
			<h1 class="bold">{$restname|stripslashes}( {$restid} )</h1>
			<h1 class="flt">{$restaddress},</h1>
			<h1 class="frt printBtm bold">
				<a onclick="print();" class="pointer printThis" id="print_new_page">Go To Print this page</a>
				<a onclick="window.print();" class="pointer"  id="printpage" style="display:none">Print this page</a>
			</h1>
			<br />
			<h1>{$restcity}.</h1>
			<h1 class="bold flt printBtm">Sales Summary as of {$smarty.now|date_format:"%B %e, %Y %H:%M %p"}</h1>
		</div>
		<div class="tableListContainer">
			<table width="100%" border="0" class="tableListContent">
				<tr class="listHeader bordertable">
					<td width="5%" align="center" class="listHeaderCont bold">Type</td>
					<td width="8%" align="center" class="listHeaderCont bold">#</td>
					<td width="7%" class="listHeaderCont bold">Subtotal</td>
					<td width="11%" class="listHeaderCont bold">Delivery</td>
					<td width="6%" class="listHeaderCont bold">Tax</td>
					<td width="6%" class="listHeaderCont bold">Tip</td>
					<td width="6%" class="listHeaderCont bold">Total</td>
				</tr>
				{if $prepaidTotalorder gt 0}
				<tr>
					<td align="center" class="listCont">Prepaid Order</td>
					<td align="center" class="listCont">{$prepaidTotalorder}</td>
					<td class="listCont">$ {$prepaidsubTotal|string_format:"%.2f"}</td>
					<td class="listCont">$ {$prepaiddelTotal|string_format:"%.2f"}</td>
					<td class="listCont">$ {$prepaidtaxTotal|string_format:"%.2f"}</td>
					<td class="listCont">$ {$prepaidtipTotal|string_format:"%.2f"}</td>
					<td class="listCont">$ {$prepaidTotal|string_format:"%.2f"}</td>
				</tr>
				{/if}
				{if $cashTotalorder gt 0}
				<tr class="bordertable">
					<td align="center" class="listCont">Cash Order</td>
					<td align="center" class="listCont">{$cashTotalorder}</td>
					<td class="listCont">$ {$cashsubTotal|string_format:"%.2f"}</td>
					<td class="listCont">$ {$cashdelTotal|string_format:"%.2f"}</td>
					<td class="listCont">$ {$cashtaxTotal|string_format:"%.2f"}</td>
					<td class="listCont">$ {$cashtipTotal|string_format:"%.2f"}</td>
					<td class="listCont">$ {$cashTotal|string_format:"%.2f"}</td>
				</tr>
				{/if}
				<tr>
					<td class="bold">&nbsp;</td>
					<td class="bold">&nbsp;</td>
					<td class="bold">$ {$orderSubTotal|string_format:"%.2f"}</td>
					<td class="bold">$ {$orderDelTotal|string_format:"%.2f"}</td>
					<td class="bold">$ {$orderTaxTotal|string_format:"%.2f"}</td>
					<td class="bold">$ {$orderTipTotal|string_format:"%.2f"}</td>
					<td class="bold">$ {$orderTotal|string_format:"%.2f"}</td>
				</tr>
			</table>
			<h1 class="bold tabOrderMar">Order Details</h1>
			<table width="100%" border="0" class="tableListContent">
				<tr class="listHeader bordertable">
					<td width="8%" align="center" class="listHeaderCont bold">ID</td>
					<td width="5%" align="center" class="listHeaderCont bold">Type</td>
					<td width="5%" class="listHeaderCont bold">Date</td>
					<td width="5%" class="listHeaderCont bold">Time</td>
					<td width="7%" class="listHeaderCont bold">Subtotal</td>
					<td width="11%" class="listHeaderCont bold">Delivery</td>
					<td width="6%" class="listHeaderCont bold">Tax</td>
					<td width="6%" class="listHeaderCont bold">Tip</td>
					<td width="6%" class="listHeaderCont bold">Total</td>
				</tr>
				{section name="list" loop=$report_list}
				{assign var="trvar" value=$smarty.section.list.rownum}
				<tr {if $trvar is even}class="listLightGray"{/if} id="deletecate{$report_list[list].orderid}">
					<td align="center" class="listCont">{$report_list[list].ordergenerateid}</td>
					<td align="center" class="listCont">{if $report_list[list].payment_type eq 'cod'}Cash{elseif $report_list[list].payment_type eq 'CC'}Credit Card{elseif $report_list[list].payment_type eq 'cardpayment'} card payment on delivery (the customer wants to pay with card){else}{$report_list[list].payment_type|ucfirst|stripslashes}{/if}</td>
					<td class="listCont">{$report_list[list].orderdate|date_format:"%D"}</td>
					<td class="listCont">{$report_list[list].orderdate|date_format:"%H:%M %P"}</td>
					<td class="listCont">$ {$report_list[list].subtotal|string_format:"%.2f"}</td>
					<td class="listCont">$ {$report_list[list].deliveryamount|string_format:"%.2f"}</td>
					<td class="listCont">$ {$report_list[list].taxvalue|string_format:"%.2f"}</td>
					<td class="listCont">$ {$report_list[list].tipvalue|string_format:"%.2f"}</td>
					<td class="listCont">$ {$report_list[list].ordertotalprice|string_format:"%.2f"}</td>
				</tr>
				{sectionelse}
				<tr><td colspan="10" align="center" class="listCont">No record(s) found</td></tr>
				{/section}
				<tr class="bordertabTop">
					<td class="bold">&nbsp;</td>
					<td class="bold">&nbsp;</td>
					<td class="bold">&nbsp;</td>
					<td class="bold">&nbsp;</td>
					<td class="bold">$ {$orderSubTotal|string_format:"%.2f"}</td>
					<td class="bold">$ {$orderDelTotal|string_format:"%.2f"}</td>
					<td class="bold">$ {$orderTaxTotal|string_format:"%.2f"}</td>
					<td class="bold">$ {$orderTipTotal|string_format:"%.2f"}</td>
					<td class="bold">$ {$orderTotal|string_format:"%.2f"}</td>
				</tr>
			</table>
			<div class="reportListResult">
				<ul class="reportListResultUl">
					<li>
						<span class="reportListResultLft">1 x CreditCard Fee</span>
						<span class="reportListResultMidEq">=</span>
						<span class="reportListResultRht"><td class="bold">€ {$commission_amount|string_format:"%.2f"} ({if $commission_type eq 'percentage'}%{else}Rs{/if})</td></span>
					</li>
					<li>
						<span class="reportListResultLft">1 x Commission</span>
						<span class="reportListResultMidEq">=</span>
						<span class="reportListResultRht"><td class="bold">€ {$total_commission|string_format:"%.2f"}</td></span>
					</li>
					<li>
						<span class="reportListResultLft">&nbsp;</span>
						<span class="reportListResultMidEq">&nbsp;</span>
						<span class="reportListResultRhtBorder"></span>
					</li>
					<li>
						<span class="reportListResultLft">&nbsp;</span>
						<span class="reportListResultMidEq">&nbsp;</span>
						<ul class="reportListResultRht">
							<li>
								<span class="reportListResultRhtInLft">Total(excl. vat)</span>
								<span class="reportListResultRhtMidEq">=</span>
								<span class="reportListResultRhtInRht">{$total_commission_in_type|string_format:"%.2f"} ({if $commission_type eq 'percentage'}%{else}Rs{/if})</span>
							</li>
							<li>
								<span class="reportListResultRhtInLft">vat</span>
								<span class="reportListResultRhtMidEq">=</span>
								<span class="reportListResultRhtInRht">{$vat}</span>
							</li>
							<li>
								<span class="reportListResultRhtInLft">Invoice total incl. vat	</span>
								<span class="reportListResultRhtMidEq">=</span>
								<span class="reportListResultRhtInRht">{$total_vat_amount|string_format:"%.2f"}</span>
							</li>
						</ul>
					</li>
					
				</ul>
				
				<ul class="reportListTotalUl">
					<li>
						<span class="reportListTotalLft">Total Sales</span>
						<span class="reportListTotalMidCol">:</span>
						<span class="reportListTotalRht">Cash</span>
						<span class="frt"> 	
							<span class="reportListTotalRhtEq">=</span>
						
							<span class="reportListTotalRhtLast"> € {$total_cod|string_format:"%.2f"}</span>
						</span>
					</li>
					<li>
						<span class="reportListTotalLft">Total Sales</span>
						<span class="reportListTotalMidCol">:</span>
						<span class="reportListTotalRht">Credit/Debit card</span> 
						<span class="frt"> 	
							<span class="reportListTotalRhtEq">=</span>
							<span class="reportListTotalRhtLast">€ {$total_commission|string_format:"%.2f"}</span>
						</span>
					</li>
					<li>
						<span class="reportListTotalLft">Total Sales</span>
						<span class="reportListTotalMidCol">:</span>
						<span class="reportListTotalRht">Card payment on delivery (the customer wants to pay with card)</span> 
						<span class="frt"> 	
							<span class="reportListTotalRhtEq">=</span>
							<span class="reportListTotalRhtLast">€ {$total_cardpay|string_format:"%.2f"}</span>
						</span>
					</li>
					<li>
						<span class="reportListTotalLft">Total Sales</span>
						<span class="reportListTotalMidCol">:</span>
						<span class="reportListTotalRht">Paypal</span> 
						<span class="frt"> 	
							<span class="reportListTotalRhtEq">=</span>
							<span class="reportListTotalRhtLast">€ {$total_paypal|string_format:"%.2f"}</span>
						</span>
					</li>
				</ul>
			</div>
		</div>
					
		<!--List Start-->
		{*<div class="tableListContainer">
			<table width="100%" border="0" class="tableListContent">
				<tr class="listHeader">
					<td width="5%" align="center" class="listHeaderCont"><input type="checkbox" id="selectall" onclick="selectDeselectAll();" /></td>
					<td width="5%" align="center" class="listHeaderCont">S.No</td>
					<td width="8%" align="center" class="listHeaderCont">Order Id</td>
					<td width="7%" class="listHeaderCont">Order Type</td>
					<td width="11%" class="listHeaderCont">Order Date</td>
					<td width="6%" class="listHeaderCont">Payment Method</td>
					<td width="8%" align="center" class="listHeaderCont">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'tdesc'}onclick="sortByAscDesc('tasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'tasc'}onclick="sortByAscDesc('tdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('tdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Order Total Price{if $smarty.request.sortby eq 'tdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'tasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</td>
					<td width="{if !$smarty.get.resid}10%{else}10%{/if}" align="left" class="listHeaderCont">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'cdesc'}onclick="sortByAscDesc('casc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'casc'}onclick="sortByAscDesc('cdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('cdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Customer Name{if $smarty.request.sortby eq 'cdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'casc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</td>
					
					{if !$smarty.get.resid}
					<td width="10%" align="left" class="listHeaderCont">
						<a href="javascript:void(0);" {if $smarty.request.sortby eq 'resdesc'}onclick="sortByAscDesc('resasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'resasc'}onclick="sortByAscDesc('resdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('resdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Restaurant{if $smarty.request.sortby eq 'resdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'resasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
						</a>
					</td>
					{/if}
					
					
					<td width="5%" align="center" class="listHeaderCont">Status</td>
					
					<td width="7%" align="center" class="listHeaderCont">Order Date</td>
					
					<td width="7%" align="center" class="listHeaderCont">Action</td>
				</tr>
				
				{section name="list" loop=$order_list}
				{assign var="trvar" value=$smarty.section.list.rownum}
				<tr {if $trvar is even}class="listLightGray"{/if} id="deletecate{$order_list[list].orderid}">
					<td align="center" class="listCont"><input type="checkbox" class="case" value="{$order_list[list].orderid}" onclick="individualSelect();" /></td>
					<td align="center" class="listCont">{$order_list[list].sno}</td>
					<td align="center" class="listCont">{$order_list[list].ordergenerateid}</td>
					<td align="left" class="listCont">{if $order_list[list].deliverytype eq 'delivery'}Delivery{elseif $order_list[list].deliverytype eq 'pickup'}Pickup{/if}</td>
					<td align="left" class="listCont">{if $order_list[list].deliverytype eq 'delivery'}{$order_list[list].deliverydate}&nbsp;{if $order_list[list].foodassoonas eq '1'}ASAP{else}{$order_list[list].deliverytime}{/if}{else}--{/if}</td>
					<td align="left" class="listCont">{if $order_list[list].payment_type eq 'cod'}Cash{elseif $order_list[list].payment_type eq 'GIP'}Credit Card{else}{$order_list[list].payment_type|ucfirst|stripslashes}{/if}</td>
					<td align="center" class="listCont">{$order_list[list].ordertotalprice|string_format:"%.2f"}</td>
					<td align="left" class="listCont">{$order_list[list].customername|ucfirst|stripslashes}</td>
					<!--<td align="left" class="listCont">{$order_list[list].customeremail|stripslashes}</td>-->
					{if !$smarty.get.resid}
					<td align="left" class="listCont">{$order_list[list].restaurant_name|ucfirst|stripslashes}</td>
					{/if}
					<!--{if !$smarty.get.resid}
					<td align="left" class="listCont">{$order_list[list].menu_restname|stripslashes}</td>
					{/if}-->
					<!--<td align="left" class="listCont">{$order_list[list].instructions|stripslashes}</td>-->
					
					<!--<td align="center" class="listCont" id="chgstatus{$order_list[list].orderid}">-->
					<td>
						<select class="orderSelect1new" name="changeorderstatus" onchange="return changeOrderStatus(this.value,'{$fieldname}','{$whereField}','{$tablename}','{$word}','{$order_list[list].orderid}');">
							<option value="pending" {if $order_list[list].status eq 'pending'}selected="selected"{/if} >Pending</option>
							<option value="processing" {if $order_list[list].status eq 'processing'}selected="selected"{/if}>Processing</option>
							<option value="completed" {if $order_list[list].status eq 'completed'}selected="selected"{/if}>Delivered</option>
							<option value="failed" {if $order_list[list].status eq 'failed'}selected="selected"{/if}>Failed</option>
						</select>
					</td>
					<td align="center" class="listCont">{$order_list[list].orderdate|date_format}</td>
					<td align="center" class="listCont">
						<a href="viewOrderDetails.php?oid={$order_list[list].orderid}{if $smarty.get.resid neq ''}&resid={$smarty.get.resid}{/if}{if $smarty.get.type neq ''}&type={$smarty.get.type}{/if}" style="cursor:pointer;">View
							<!--<img src="images/icon_edit.png" width="16" height="16" alt="View Order Details" title="View Order Details" />-->
						</a>&nbsp;
						<span class="EditDeleteButton">
							<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$order_list[list].orderid}');" style="cursor:pointer;" />
						</span>
					</td>
				</tr>
				{sectionelse}
				<tr><td colspan="10" align="center" class="listCont">No record(s) found</td></tr>
				{/section}
			</table>
		</div>*}
		<!--List End-->
	</div>
</div>