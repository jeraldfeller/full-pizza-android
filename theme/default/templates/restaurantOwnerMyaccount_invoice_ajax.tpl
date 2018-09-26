<div class="detailsInnerNewWrap">
	{*$objRestaurant->InvoiceList()*}
    {$objResInvoice->inv_deli_order_list()}
	<h1 class="restOwnMyHead">{$LANG.res_myacc_invoice}</h1>

	<!-- Pagination start -->
	{if $ordersListCnt gt 0} {$pagination} {/if}
	<!-- Pagination end -->
	
		
		{if $succ_msg neq ''}<div class="succmsg1">{$succ_msg}</div>{/if}
		<span class="ordersInnerWrap" id="restaurantInvoiceDetails"></span>
		<div class="ownerStaticContainer">
			<ul class="orderTopLine1Ul">
				<li><span class="order">{$LANG.res_myacc_inv_total}:</span><span class="value">{$inv_tot_cnt}</span></li>
				<li><span class="order">{$LANG.res_myacc_inv_sent}:</span><span class="value">{$inv_sent_cnt}</span></li>
				<li><span class="order">{$LANG.res_myacc_inv_payment_sent}:</span><span class="value">{$inv_payment_sent_cnt}</span></li>
				<li><span class="order">{$LANG.res_myacc_inv_payment_receive}:</span><span class="value">{$inv_paymnet_receive_cnt}</span></li>
			</ul>
			<div class="frt">
				<span class="sortbytext">{$LANG.res_myaccount_ordersortby} : </span>
				<select name="sortby" id="sortby" onchange="return changeSortbyStatus(this.value,'Invoice');" class="selectpicker">
					<option value="">All</option>
					<option value="IS" {if $smarty.get.sortby eq 'IS' or $smarty.request.sortbystatus eq 'IS'}selected="selected"{/if} >{$LANG.res_myacc_inv_sent}</option>
					<option value="PS" {if $smarty.get.sortby eq 'PS' or $smarty.request.sortbystatus eq 'PS'}selected="selected"{/if}>{$LANG.res_myacc_inv_payment_sent}</option>
					<option value="PR" {if $smarty.get.sortby eq 'PR' or $smarty.request.sortbystatus eq 'PR'}selected="selected"{/if}>{$LANG.res_myacc_inv_payment_receive}</option>
				</select>
			</div>
		</div>
		<div class="ordersInnerWrap" id="restaurantInvoice">
			<table class="table table-hover table-striped table-bordered restownertable">
				<tbody>
					<tr>
						<th width="2%">{$LANG.res_sno}</th>
						<th width="7%">{$LANG.res_myacc_inv_no}</th>
						<th width="11%">{$LANG.res_myacc_inv_month}</th>
						<th width="6%">{$LANG.res_myacc_inv_period}</th>
						<th width="8%">{$LANG.res_myacc_inv_ac_balance}</th>
						<th width="10%">{$LANG.res_myacc_inv_sent_date}</th>
						<th width="9%">{$LANG.res_myacc_inv_status}</th>
						<th width="5%">{$LANG.res_myacc_inv_view}</th>
						<th width="5%">{$LANG.res_myacc_inv_pdf}</th>
					</tr>
					{section name="inv" loop=$invoiceList}
					<tr>
						<td>{$invoiceList[inv].sno}</td>
						<td>{$invoiceList[inv].invoice_gen_id}</td>
						<td>{$invoiceList[inv].inv_month|date_format:"%b %Y"}</td>
						<td>{if $invoiceList[inv].inv_month_period_limit eq ''}Monthly once{else}{$invoiceList[inv].inv_month_period_limit}{/if}</td>
						<td><span class="rupeeImg2">{$currency}</span><span class="rupeePrice">{$invoiceList[inv].inv_acc_balance}</span></td>
						<td>{$invoiceList[inv].invoice_sent_date|date_format:"%b %d, %Y"}</td>
						<td>
							<select class="selectpicker" name="changeinvoicestatus" onchange="return changeInvoiceStatus(this.value,'{$invoiceList[inv].invoice_id}');">
								<option value="IS" {if $invoiceList[inv].invoice_status eq 'IS'}selected="selected"{/if} >{$LANG.res_myacc_inv_sent}</option>
								<option value="PS" {if $invoiceList[inv].invoice_status eq 'PS'}selected="selected"{/if}>{$LANG.res_myacc_inv_payment_sent}</option>
								<option value="PR" {if $invoiceList[inv].invoice_status eq 'PR'}selected="selected"{/if}>{$LANG.res_myacc_inv_payment_receive}</option>
							</select>
						</td>
						<td>
							<a class="orderEditDetails" onclick="return restaurantInvoice('{$invoiceList[inv].invoice_gen_id}','{$smarty.session.restaurantownerid}');" href="javascript:void(0);">{$LANG.res_myacc_inv_view}</a>
						</td>
						<td>
							<a class="orderEditDetails"  href="restaurantInvoicePDF.php?invoiceno={$invoiceList[inv].invoice_gen_id}&resid={$smarty.session.restaurantownerid}" target="_blank">{$LANG.res_myacc_inv_pdf}</a>
						</td>
					</tr>
					{sectionelse}
					<tr><td colspan="10" align="center" class="text-danger">{$LANG.res_myaccount_no_rec_found}</td></tr>
					{/section}
				</tbody>
			</table>		
		</div>
		<!-- Pagination start -->
		{if $ordersListCnt gt 0} {$pagination} {/if}
		<!-- Pagination end -->
	</div>
	