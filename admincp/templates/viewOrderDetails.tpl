<div class="page-header">
    <h1 class="title">Order view full details - {$orderDetails.0.ordergenerateid}</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Order view full details - {$orderDetails.0.ordergenerateid}</li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div aria-label="..." role="group" class="btn-group">
        <a class="btn btn-light" href="index.php">Dashboard</a>
        <span class="btn btn-light" onclick="location.reload();"><i class="fa fa-refresh"></i></span>
      </div>
    </div>
    <!-- End Page Header Right Div -->
</div>

<div class="panel panel-default">
    <div class="panel-body">
		<div class="manageButtonLastCont">
		  <a class="btn btn-default btn-sm" href="{if $smarty.get.pagetype eq 'orderdelete'}restaurantDeleteOrderManage.php{if $smarty.get.type neq ''}?type={$smarty.get.type}{/if}{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}{if $smarty.get.oid neq ''}?oid={$smarty.get.oid}{/if}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.get.pagetype eq 'ordermanage' }restaurantOrderManage.php{if $smarty.get.type neq ''}?type={$smarty.get.type}{/if}{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}{if $smarty.get.oid neq ''}?oid={$smarty.get.oid}{/if}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.get.pagetype eq 'reportmanage' }restaurantReportManage.php{if $smarty.get.type neq ''}?type={$smarty.get.type}{/if}{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}{if $smarty.get.oid neq ''}?oid={$smarty.get.oid}{/if}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{/if}">Back</a>
		</div>

		
			<div class="addtocartWrap">
				
					<div class="thanksTableOrderview table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<tr class="">
                                <th width="5%">S no</th>
								<th width="40%">Item</th>
								<!--<th width="30%">Addon</th>-->
								<th width="25%">Qty</th>
								<th width="15%">Price</th>
								<th width="15%">Total Price</th>
							</tr>
							{section name=ord loop=$cartDetails}
							<tr class="">
                                <td>{$smarty.section.ord.rownum}</td>
								<td>{$cartDetails[ord].menuname|ucfirst|stripslashes} {if $cartDetails[ord].pizza_size neq ''}({$cartDetails[ord].pizza_size}){/if}
                                {if $cartDetails[ord].addonsname neq ''}<br /> Addons : ({$cartDetails[ord].addonsname|ucfirst|stripslashes}){/if}</td>
								<!--<td>{$cartDetails[ord].addonsname|ucfirst|stripslashes}</td>-->
								<td>{$cartDetails[ord].quantity}</td>
								<td>{$cartDetails[ord].menuprice}</td>
								<td>{$currency}&nbsp;{$cartDetails[ord].tot_menuprice}</td>
							</tr>
							{/section}
							<tr class="">
								<td colspan="4" align="right">Total</td>
								<td>{$currency}&nbsp;{$subtotal}</td>
							</tr>
							<tr class="">
								<td colspan="4" align="right">Tax {if $salestax neq '0.00'}({$salestax}%){/if}</td>
								<td>{$currency}&nbsp;{$taxamount}</td>
							</tr>
							{if $orderDetails.0.deliverytype eq 'delivery'}
							<tr class="">
								<td colspan="4" align="right">Delivery Charges</td>
								<td>{if $deliverycharge eq '0.00'}0.00{else}{$currency}&nbsp;{$deliverycharge}{/if}</td>
							</tr>
							{/if}
							{if $orderDetails.0.offervalue neq ''}
							<tr class="">
								<td colspan="4" align="right">Discount({$orderDetails.0.offervalue} % Off)</td>
								<td>{if $orderDiscountPrice eq '0.00'}0.00{else}- {$currency}&nbsp;{$orderDiscountPrice}{/if}</td>
							</tr>
							{/if}
                            {if $orderDetails.0.tipamount neq '0.00'}
							<tr class="">
								<td colspan="4" align="right">Tip</td>
								<td>{$currency}&nbsp;{$tipamount}</td>
							</tr>
							{/if}
                            {if $orderDetails.0.voucher_id neq '' and $orderDetails.0.voucher_price gt 0}
                                <tr class="">
    								<td colspan="4" align="right">Voucher Discount Price</td>
    								<td>- {$currency}&nbsp;{$orderDetails.0.voucher_price|string_format:"%.2f"}</td>
    							</tr>
                            {/if}
							<tr class="">
								<td colspan="4" align="right">Final Total</td>
								<td>{$currency} {$total}</td>
							</tr>
						</table>
					</div>
				
				
				<!--ORDER DETAILS-->
                    <div class="contain">
                       <div class="col-sm-6">
                            <div class="addPageCont"><h1><b>Order Details</b></h1></div>
                            
                            <div class="addPageCont">
                                <span class="orderLeft">Order Number</span>
                                <span class="colon1">:</span>				
                                <span class="value">{$orderDetails.0.ordergenerateid}</span>
                            </div>
                            
                            <div class="addPageCont">
                                <span class="orderLeft">Order Type</span>
                                <span class="colon1">:</span>				
                                <span class="value">{$orderDetails.0.deliverytype|ucfirst|stripslashes}</span>
                            </div>
                            {if $orderDetails.0.deliverytype eq 'delivery'}
                            <div class="addPageCont">
                                <span class="orderLeft">Delivery Time</span>
                                <span class="colon1">:</span>				
                                <span class="value">{if $orderDetails.0.foodassoonas eq '1'}As Soon As Possible{else}{$orderDetails.0.deliverydate} &nbsp; {$orderDetails.0.deliverytime}{/if}</span>
                            </div>
                            {/if}
                            {if $orderDetails.0.voucher_code neq ''}
                            <div class="addPageCont">
                                <span class="orderLeft">Voucher Code</span>
                                <span class="colon1">:</span>				
                                <span class="value">{$orderDetails.0.voucher_code}</span>
                            </div>
                            {/if}
                            <div class="addPageCont">
                                <span class="orderLeft">Order Status</span>
                                <span class="colon1">:</span>				
                                <span class="value">{if $orderDetails.0.status eq 'completed'}Delivered{else}{$orderDetails.0.status|ucfirst|stripslashes}{/if}</span>
                            </div>
                            
                            <div class="addPageCont">
                                <span class="orderLeft">Order Date</span>
                                <span class="colon1">:</span>				
                                <span class="value">{$orderDetails.0.orderdate|date_format:"%d-%m-%Y, %I:%M %p"}</span>
                            </div>
                            
                            <div class="addPageCont">
                                <span class="orderLeft">Restaurant</span>
                                <span class="colon1">:</span>				
                                <span class="value">{$restaurantname|ucfirst|stripslashes}</span>
                            </div>
                            {if $orderDetails.0.instructions neq ''}
                                <div class="addPageCont">
                                    <span class="orderLeft">Instruction</span>
                                    <span class="colon1">:</span>				
                                    <span class="value">{$orderDetails.0.instructions|ucfirst|stripslashes}</span>
                                </div>
                            {/if}
                           </div>
                       <div class="col-sm-6">
                            <!--CUSTOMER DETAILS-->
                            <div class="addPageCont"><h1><b>Customer Details</b></h1></div>
                            <div class="addPageCont">
                                <span class="orderLeft">Customer Name</span>
                                <span class="colon1">:</span>				
                                <span class="value">{$orderDetails.0.customername|ucfirst|stripslashes} {$orderDetails.0.customerlastname|ucfirst|stripslashes}</span>
                            </div>
                            <div class="addPageCont">
                                <span class="orderLeft">Customer Email</span>
                                <span class="colon1">:</span>				
                                <span class="value">{$orderDetails.0.customeremail|ucfirst|stripslashes}</span>
                            </div>
                            
                            <div class="addPageCont">
                                <span class="orderLeft">Customer Address</span>
                                <span class="colon1">:</span>				
                                <span class="value">{if $orderDetails.0.deliverydoornumber neq ''}{$orderDetails.0.deliverydoornumber|ucfirst|stripslashes}, <br>{/if}{$orderDetails.0.deliverystreet|ucfirst|stripslashes},{if $orderDetails.0.deliverycity neq ''}{$orderDetails.0.deliverycity|ucfirst|stripslashes},{/if}{if $orderDetails.0.deliverystate neq ''}{$orderDetails.0.deliverystate|ucfirst|stripslashes}{/if}{if $orderDetails.0.deliveryzip neq ''} - {$orderDetails.0.deliveryzip}{/if}</span>
                            </div>
                            
                            <div class="addPageCont">
                                <span class="orderLeft">Customer Phone Number</span>
                                <span class="colon1">:</span>				
                                <span class="value">{$orderDetails.0.customercellphone|ucfirst|stripslashes}</span>
                            </div>
                            </div>
                     </div>
                     <div class="contain">
                        <div class="col-sm-6">
                        <!--PAYMENT DETAILS-->
                        <div class="addPageCont"><h1><b>Payment Details</b></h1></div>
                            <div class="addPageCont">
                                <span class="orderLeft">Payment Method</span>
                                <span class="colon1">:</span>				
                                <span class="value">{$orderDetails.0.payment_type|ucfirst|stripslashes}</span>
                            </div>
                            <div class="addPageCont">
                                <span class="orderLeft">Payment Status</span>
                                <span class="colon1">:</span>				
                                <span class="value">{if $orderDetails.0.payment_status eq 'P'}Paid{elseif $orderDetails.0.payment_status eq 'NP'}Not Paid{/if}</span>
                            </div>
                            {if $orderDetails.0.payment_type eq 'CC' or $orderDetails.0.payment_type eq 'P' or $orderDetails.0.payment_type eq 'creditcard' or $orderDetails.0.payment_type eq 'paypal'}
                            <div class="addPageCont">
                                <span class="orderLeft">Transaction Id</span>
                                <span class="colon1">:</span>				
                                <span class="value">{$orderDetails.0.transaction_id}</span>
                            </div>
                            {/if}
                        </div>
                        {if $gprs_option eq 'Yes'}
                        <div class="col-sm-6">
                            <!--PRINTER DETAILS-->
                            <div class="addPageCont"><h1><b>Printer Details</b></h1></div>
                            <div class="addPageCont">
                                <span class="orderLeft">GPRS Printer Option</span>
                                <span class="colon1">:</span>				
                                <span class="value">{$gprs_option|stripslashes}</span>
                            </div>
                            <div class="addPageCont">
            					<span class="orderLeft">Order is sent to Printer</span>
            					<span class="colon1">:</span>				
            					<span class="value">{$orderDetails.0.printer_sent|stripslashes}</span>
            				</div>
                            <div class="addPageCont">
            					<span class="orderLeft">Printer received or not the order</span>
            					<span class="colon1">:</span>				
            					<span class="value">{$orderDetails.0.printer_response|stripslashes}</span>
            				</div>
                            <div class="addPageCont">
            					<span class="orderLeft">Printer acknowledgement</span>
            					<span class="colon1">:</span>				
            					<span class="value">{$orderDetails.0.printer_ack|stripslashes}</span>
            				</div>
                            {if $orderDetails.0.status eq 'failed'}
                            <div class="addPageCont">
            					<span class="orderLeft">Rejected Reason</span>
            					<span class="colon1">:</span>				
            					<span class="value">{$orderDetails.0.printer_ack_msg|stripslashes}</span>
            				</div>
                            {elseif $orderDetails.0.status eq 'completed'}
                            <div class="addPageCont">
            					<span class="orderLeft">Food Ready/Deliver Time</span>
            					<span class="colon1">:</span>				
            					<span class="value">{$orderDetails.0.printer_res_deli_time|stripslashes}</span>
            				</div>
                            {/if}
                            
                            <div class="addPageCont">
                                <span class="orderLeft">Google Cloud Printer Option</span>
                                <span class="colon1">:</span>				
                                <span class="value">{$printer_option|stripslashes}</span>
                            </div>
                            {if $printer_option eq 'Yes'}
                            <div class="addPageCont">
                                <span class="orderLeft">Printer email</span>
                                <span class="colon1">:</span>				
                                <span class="value">{$printer_email|stripslashes}</span>
                            </div>
                            <div class="addPageCont">
                                <span class="orderLeft">Printer password</span>
                                <span class="colon1">:</span>				
                                <span class="value">{$printer_password|stripslashes}</span>
                            </div>
                            {/if}
                         </div>
                         {/if}
                     </div>
			</div>
		
        <div class="col-sm-12">
		<div class="manageButtonLastCont">
		<a class="btn btn-default btn-sm" href="{if $smarty.get.pagetype eq 'orderdelete'}restaurantDeleteOrderManage.php{if $smarty.get.type neq ''}?type={$smarty.get.type}{/if}{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}{if $smarty.get.oid neq ''}?oid={$smarty.get.oid}{/if}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.get.pagetype eq 'ordermanage' }restaurantOrderManage.php{if $smarty.get.type neq ''}?type={$smarty.get.type}{/if}{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}{if $smarty.get.oid neq ''}?oid={$smarty.get.oid}{/if}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{elseif $smarty.get.pagetype eq 'reportmanage' }restaurantReportManage.php{if $smarty.get.type neq ''}?type={$smarty.get.type}{/if}{if $smarty.get.resid neq ''}?resid={$smarty.get.resid}{/if}{if $smarty.get.oid neq ''}?oid={$smarty.get.oid}{/if}{if $smarty.request.page neq ''}&page={$smarty.request.page}{/if}{if $smarty.request.limit neq ''}&limit={$smarty.request.limit}{/if}{if $smarty.request.sortby neq ''}&sortby={$smarty.request.sortby}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}{if $smarty.request.searchrestaurantid neq ''}&searchrestaurantid={$smarty.request.searchrestaurantid}{/if}{/if}">Back</a>
		</div>
    </div>
	</div>

</div>