<div class="detailsInnerNewWrap">	
	<h1 class="restOwnMyHead">{$LANG.res_myaccount_order}</h1>
	<div class="clr"></div>

	<!-- Pagination start -->
	{if $ordersListCnt gt 0} {$pagination} {/if}
	<!-- Pagination end -->
	
		
		{if $succ_msg neq ''}<div class="ownerSucc succmsg1 text-center" id="msg">{$succ_msg}</div>{/if}
		
		<div class="ownerStaticContainer">
			<ul class="orderTopLine1Ul">
				<li><span class="order">{$LANG.res_myaccount_ordertotal}:</span><span class="value">{$ordersList_orderCnt}</span></li>
				<li><span class="order">{$LANG.res_myaccount_orderdeliver}:</span><span class="value">{$delivered_ord}</span></li>
				<li><span class="order">{$LANG.res_myaccount_orderprocessing}:</span><span class="value">{$processing_ord}</span></li>
				<li><span class="order">{$LANG.res_myaccount_orderpending}:</span><span class="value">{$pending_ord}</span></li>
				<li><span class="order">{$LANG.res_myaccount_orderfailed}:</span><span class="value">{$failed_ord}</span></li>
			</ul>
			<div class="frt">
				<span class="sortbytext">{$LANG.res_myaccount_ordersortby} : </span>
				<select name="sortby" id="sortby" onchange="return changeSortbyStatus(this.value,'Order');" class="selectpicker">
					<option value="">All</option>
					<option value="pending" {if $smarty.get.sortby eq 'pending' or $smarty.request.sortbystatus eq 'pending'}selected="selected"{/if} >{$LANG.res_myaccount_orderoptpending}</option>
					<option value="processing" {if $smarty.get.sortby eq 'processing' or $smarty.request.sortbystatus eq 'processing'}selected="selected"{/if}>{$LANG.res_myaccount_orderoptprocessing}</option>
					<option value="completed" {if $smarty.get.sortby eq 'completed' or $smarty.request.sortbystatus eq 'completed'}selected="selected"{/if}>{$LANG.res_myaccount_orderoptdelivered}</option>
					<option value="failed" {if $smarty.get.sortby eq 'failed' or $smarty.request.sortbystatus eq 'failed'}selected="selected"{/if}>{$LANG.res_myaccount_orderoptfailed}</option>
				</select>
				
			</div>
		</div>
		<div class="ordersInnerWrap">
			<div class="contain" id="rest_myorder">
				<table class="table table-hover table-striped restownertable">
					<tbody>
						<tr>
							<th width="1%">{$LANG.res_sno}</th>
							<th width="8%">{$LANG.res_myaccount_orderno}</th>
							<th width="11%">{$LANG.res_myaccount_ordertime}</th>
							<th width="10%">{$LANG.res_myaccount_ordertype}</th>
							<th width="10%">{$LANG.res_myaccount_ordertotprice}</th>
							<th width="12%">{$LANG.res_myaccount_paymenttype}</th>
							<th width="8%">{$LANG.res_myaccount_ordername}</th>
							<th width="15%">{$LANG.res_myaccount_orderaddress}</th>
							<th width="13%">{$LANG.res_myaccount_orderat}</th>
							<th width="9%">{$LANG.res_myaccount_orderstatus}</th>
							<th width="10%" class="last_priceTd">{*$LANG.res_myaccount_orderviewdetails|utf8_encode*} Details</th>
						</tr>
						{section name=order loop=$ordersList}
						<tr>
							<td>{$ordersList[order].sno}</td>
							<td>{$ordersList[order].ordergenerateid}</td>
							<td>{*if $ordersList[order].deliverytype eq 'delivery'*}{$ordersList[order].deliverydate}&nbsp;{if $ordersList[order].foodassoonas eq '1'}ASAP{else}{$ordersList[order].deliverytime}{/if}{*else}--{/if*}</td>
							<td>{if $ordersList[order].deliverytype eq 'delivery'}{$LANG.res_delivery}{elseif $ordersList[order].deliverytype eq 'pickup'}{$LANG.res_pickup}{/if}</td>
							<td><span class="rupeeImg2">{$currency}&nbsp;</span><span class="rupeePrice">{$ordersList[order].ordertotalprice}</span></td>
							<td>{if $ordersList[order].payment_type eq 'cod'}{$LANG.res_cash_on_del}{else}{$ordersList[order].payment_type|ucfirst|stripslashes}{/if}</td>
							<td>{$ordersList[order].customername|ucfirst|stripslashes}</td>
							<td class="indentZero">{if $ordersList[order].deliverydoornumber neq ''}{$ordersList[order].deliverydoornumber|stripslashes},{/if}{$ordersList[order].deliverystreet|stripslashes}</td>
							<td>{$ordersList[order].orderdate}</td>
							<td valign="top" width="30%">
								<span id="ordstatustd{$ordersList[order].orderid}">
								<!--{if $ordersList[order].status neq 'completed' and $ordersList[order].status neq 'failed'}
									<select class="orderSelect1new" name="changeorderstatus" onchange="return changeOrderStatus(this.value,'{$ordersList[order].orderid}');">
									{if $ordersList[order].status eq 'pending'}
										<option value="pending" selected="selected" >{$LANG.res_myaccount_orderoptpending}</option>
									{/if}
										<option value="processing" {if $ordersList[order].status eq 'processing'}selected="selected"{/if}>{$LANG.res_myaccount_orderoptprocessing}</option>
										<option value="completed" {if $ordersList[order].status eq 'completed'}selected="selected"{/if}>{$LANG.res_myaccount_orderoptdelivered}</option>
										<option value="failed" {if $ordersList[order].status eq 'failed'}selected="selected"{/if}>{$LANG.res_myaccount_orderoptfailed}</option>
									</select>
									<a class="orderEditDetails" href="javascript:void(0);">Edit Status</a>
								{/if}
								{if $ordersList[order].status eq 'completed'}
									{$LANG.res_myaccount_orderoptdelivered}
								{/if}
								{if $ordersList[order].status eq 'failed'}
									{$LANG.res_myaccount_orderoptfailed}
								{/if}-->
								{if $ordersList[order].status neq 'processing' and $ordersList[order].status neq 'failed' and $ordersList[order].status neq 'completed' and $ordersList[order].status neq 'testing'}
								<select class="selectpicker" name="changeorderstatus" id="changeorderstatus" onchange="return disclaimOrder(this.value,'disclaimReason{$ordersList[order].ordergenerateid}','{$ordersList[order].orderid}');">
								
									<option value="pending" selected="selected" >Pending</option>
								
								
									<option value="processing" {if $ordersList[order].status eq 'processing'}selected="selected"{/if} >Accept</option>
									<option value="failed" {if $ordersList[order].status eq 'failed'}selected="selected"{/if} >Disclaim</option>
                                    {*<option value="testing" {if $ordersList[order].status eq 'testing'}selected="selected"{/if} >Testing</option>*}
									
								</select>
                                <span id="error"></span>
								<div id="disclaimReason{$ordersList[order].ordergenerateid}" style="display:none" class="disclaimReason">
									<span class="disclaimReasonHead">Reason<span class="red">*</span></span>				
									<textarea  cols="5" rows="1" id="reason{$ordersList[order].orderid}" class="disclaimReasonArea"></textarea>
									<input type="button" onclick="return changeOrderStatus('failed','{$ordersList[order].orderid}');" value="Submit" class="disclaimbtn">
								</div>
								{/if}
								
								{if $ordersList[order].status eq 'processing' and $ordersList[order].status neq 'failed' and $ordersList[order].status neq 'completed' and $ordersList[order].status neq 'testing'}
								<select class="selectpicker" name="changeorderstatus" onchange="return changeOrderStatus(this.value,'{$ordersList[order].orderid}');">
								    
									<option value="processing" {if $ordersList[order].status eq 'processing'}selected="selected"{/if}>Processing</option>
									<option value="completed" {if $ordersList[order].status eq 'completed'}selected="selected"{/if}>Delivered</option>
									
								</select>
								
								{/if}
								
							 	{if $ordersList[order].status eq 'completed'}
								Delivered
								{/if}
								{if $ordersList[order].status eq 'failed'}
								Failed
								{/if}
                                {if $ordersList[order].status eq 'testing'}
								Testing
								{/if}
								</span>
							</td>
							<td align="center">
								<a class="orderEditDetails" onclick="return orderViewFullDetails({$ordersList[order].orderid});" href="javascript:void(0);">{*$LANG.res_myaccount_orderviewdetails*}</a>
							</td>
						</tr>
						{sectionelse}
    					<td class="text-danger" colspan="11" align="center">{$LANG.res_myaccount_no_rec_found}</td>
    					{/section}
					</tbody>
				</table>	
			</div>	
			<div class="contain" id="rest_fullorder"></div>
		</div>
		<!-- Pagination start -->
	{if $ordersListCnt gt 0} {$pagination} {/if}
	<!-- Pagination end -->
	</div>
		<!-- Order Full Details POP -->
<div id="orderViewFullDetailsPop" style="display:none;">
	<div class="addtoCartInner">
		<div class="addtocartPopup">
			<div id="orderFullDetailsList"></div>
		</div>
	</div>
</div>
