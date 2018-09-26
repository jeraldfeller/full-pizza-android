<div class="adminRight pull-right span9">

<div class="rightContHeading Heading">Invoice</div>

<div class="rightContBody">
	<div class="riteContWrap1"> 


	<div style="display:block; width:96%; padding:0 2%;"> 
    
    {if $getnuminv_validate eq 0}
    
        {if $smarty.post.res_invoice_setting neq '' and $smarty.get.invoice_gen_no eq ''}
    	<form name="" method="post" action="">
    		<input type="hidden" name="subm" value="sent_invoice_restaurant" />
    		<input type="hidden" name="account_bal" value="{$account_bal}" />
    	
    		{if $smarty.post.res_invoice_setting eq 'm1'}
    		<input type="hidden" name="res_invoice_setting" value="{$smarty.post.res_invoice_setting}" />
    		<input type="hidden" name="invoice_monthly" value="{$smarty.post.invoice_monthly}" />				
    		{elseif $smarty.post.res_invoice_setting eq 'm2'}
    		<input type="hidden" name="res_invoice_setting" value="{$smarty.post.res_invoice_setting}" />
    		<input type="hidden" name="invoice_monthly" value="{$smarty.post.invoice_monthly}" />
    		<input type="hidden" name="invoice_monthly_twice_tm" value="{$smarty.post.invoice_monthly_twice_tm}" />
    		{elseif $smarty.post.res_invoice_setting eq 'm4'}
    		<input type="hidden" name="res_invoice_setting" value="{$smarty.post.res_invoice_setting}" />
    		<input type="hidden" name="invoice_monthly" value="{$smarty.post.invoice_monthly}" />
    		<input type="hidden" name="invoice_monthly_4t_tm" value="{$smarty.post.invoice_monthly_4t_tm}" />
    		{elseif $smarty.post.res_invoice_setting eq 'w1'}
    		<input type="hidden" name="res_invoice_setting" value="{$smarty.post.res_invoice_setting}" />
    		<input type="hidden" name="invoice_weekly" value="{$smarty.post.invoice_weekly}" />
    		{/if}				
    		{*<input type="submit" name="submit" value="Send Invoice" class="sendInvoiceBtn" />*}
    	</form>
    	{/if}
        
        <br />
        <a href="restaurantInvoiceManage.php?resid={$smarty.get.resid}" class="sendInvoiceBtn pull-right" /> Back </a>
        
        
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
					{*<img src="images/invoicelogo.png" alt="" title="" />*}
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
							<!--<div style="display:inline-block; padding-right:20px; vertical-align:top;font-weight:bold;">Email :</div>-->
							{*<div style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">Account number : </span>CP{$res_det.0.restaurant_generate_id}</div>*}
						</div>
					</div>
					<div style="display:inline-block; width:49%; vertical-align:top; float:right; text-align:right;">
						<div style="display:block; width:100%; font-family:Arial; font-size:13px;">
							<!--<div style="display:inline-block; padding-right:20px; vertical-align:top; font-weight:bold;">Address :</div>-->
							<div style="display:inline-block; vertical-align:top;">{$SITE_ADDRESS}</div>
						</div>
						<div style="display:block; width:100%;">
							<!--<div style="display:inline-block; padding-right:20px; vertical-align:top;font-weight:bold;">Telephone :</div>-->
							<div style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">Tel : </span>{$SITE_PHONE}</div>
						</div>
						<div style="display:block; width:100%;">
							<!--<div style="display:inline-block; padding-right:20px; vertical-align:top;font-weight:bold;">Email :</div>-->
							<div style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">Email : </span><a href="{$SITE_INVOICE_EMAIL}">{$SITE_INVOICE_EMAIL}</a></div>
						</div>
						<div style="display:block; width:100%;">
							<!--<div style="display:inline-block; padding-right:20px; vertical-align:top;font-weight:bold;">Website :</div>-->
							<div style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">Website : </span>{$SITE_BASEURL}</div>
						</div>
						<div style="display:block; width:100%;">
							<!--<div style="display:inline-block; padding-right:20px; vertical-align:top;font-weight:bold;">Email :</div>-->
							<div style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">VAT Registration : </span>{$SITE_VAT_NO}</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Invoice List  -->
			<div style="clear:both;"></div>
			<div style="display:block; width:100%; vertical-align:top; margin-top:15px;margin-bottom:10px;">
				<!--<div style="display:block; width:auto; float:left; font-family:Arial; font-size:16px; font-weight:bold; margin-bottom:15px;border-bottom:1px solid #000; padding-bottom:8px;">Invoice breakdown</div>-->
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
						<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3;">{$rest_comm_order_per}% commission on orders</td>
						<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3;">{$currency} {$totalCommission}</td>
					</tr>
                    <tr>
						<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;" >Card Payment Fee</td>
						<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; ">{$currency} {$card_payment_fees}</td>
					</tr>
                    <tr>
						<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;" >Total Commission with Card fee</td>
						<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-bottom:1px solid #ddd9c3;">{$currency} {$totalCommWithCardFee}</td>
					</tr>
					<tr>
						<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3;">VAT ({$uk_vat_per}%):</td>
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
			
			<!-- Site to Restaurant  -->
			<div style="clear:both;"></div>
			<div style="display:block; width:100%; vertical-align:top; margin-top:15px;margin-bottom:10px;">
				<div style="display:block; width:80%; font-family:Arial; font-size:20px; font-weight:bold; margin-bottom:15px;">{$SITE_NAME} will pay {$currency} {$total_payable_to_restaurant}<br /> into your account: {$res_det.0.res_ac_no}</div>
				<div style="display:block; width:100%; font-family:Arial; font-size:13px; line-height:20px;margin-bottom:10px;">The sort code and account number on this invoice are masked for your protection - if the unmasked section of these fields appears to be incorrect or if you have any questions regarding this invoice please call us on Tel: {$SITE_PHONE} or write to us at <a href="mailto:{$SITE_INVOICE_EMAIL}">{$SITE_INVOICE_EMAIL}</a></div>
				<div style="display:block; width:100%; font-family:Arial; font-size:13px; padding-bottom:10px; border-bottom:1px solid #000; margin-bottom:20px;">Amount will be paid in your account on or around the {$payment_send_date}</div>
				<div style="display:block; width:100%; font-family:Arial; font-size:13px;margin-bottom:20px;line-height:20px;">If you have any question regarding this invoice or changes to your information, please contact {$SITE_NAME} at Tel: {$SITE_PHONE} or via e-mail at: <a href="mailto:{$SITE_INVOICE_EMAIL}">{$SITE_INVOICE_EMAIL}</a></a></div>
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
                    <th style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Sub Total</th>
                    <th style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Del.charge</th>
                    <th style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Tax</th>
                    <th style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Offer(-)</th>
					<th style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Grand Total</th>
					<th style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Commission</th>
					
				  </tr>
				 </thead>
				 <tbody>
				  {section name=inv loop=$inv_deli_order}
                  {assign var="trvar" value=$smarty.section.inv.rownum}
				  <tr>
					<td width="5%" style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">{$smarty.section.inv.rownum}</td>
					<td width="10%" style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">{$inv_deli_order[inv].orderdate|date_format:"%d %b %Y"}</td>
					<td width="18%" style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">{$inv_deli_order[inv].ordergenerateid} {if $inv_deli_order[inv].payment_type eq 'creditcard' or $inv_deli_order[inv].payment_type eq 'paypal' or $inv_deli_order[inv].payment_type eq 'authorizenet'}({$currency} {$inv_deli_order[inv].cardpaymentfees} [{$SITE_CC_PERCENTAGE}%]){/if}</td>
					<td width="8%" style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">{if $inv_deli_order[inv].payment_type eq 'cod'}Cash{elseif $inv_deli_order[inv].payment_type eq 'creditcard'}Credit Card{elseif $inv_deli_order[inv].payment_type eq 'debitcard'}Debit card{elseif $inv_deli_order[inv].payment_type eq 'authorizenet'}Net bank{else}{$inv_deli_order[inv].payment_type}{/if}</td>
                    <td width="10%" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">{$inv_deli_order[inv].ordersubtotal} </td>
                    <td width="8%" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">{$inv_deli_order[inv].deliveryamount}</td>
                    <td width="7%" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">{$inv_deli_order[inv].taxamount}</td>
                    <td width="8%" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">{$inv_deli_order[inv].offeramount}</td>
					<td width="10%" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">{$inv_deli_order[inv].ordertotalprice}</td>
					<td width="15%" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">{$currency} {$inv_deli_order[inv].res_comm_price} ({$inv_deli_order[inv].res_comm_perchantage}%)</td>
				  </tr>
				  {/section}
				  <tr>
					<td colspan="10" align="right" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff;border-bottom:2px solid #f5950c;/*4bacc6*/ font-weight:bold;">Subtotal commission on orders: {$currency} {$totalCommission}</td>
				 </tbody>
			</table>
			</div>
			
			<div style="clear:both;"></div>
			<div style="display:block; width:100%; vertical-align:top; margin-top:10px;margin-bottom:15px;">
				<div style="display:block; width:100%; font-family:Arial; font-size:16px; font-weight:bold; margin-bottom:5px;">Partner tariff</div>
				<div style="display:block; width:100%; font-family:Arial; font-size:13px;margin-bottom:5px;">Your current commission is: {$rest_comm_order_per}% per order</div>
			</div>	
		</div>
	{else}
	You have already sent Invoice to Restaurant on ( <b> {$inv_month_period_limit} </b> Month ( <b>{$inv_monthly}</b> ) ) period...
    <br />
    <a href="restaurantInvoiceManage.php?resid={$smarty.get.resid}" class="sendInvoiceBtn" /> Back </a>
	{/if}
	</div>
	
</div>
</div>
</div>
