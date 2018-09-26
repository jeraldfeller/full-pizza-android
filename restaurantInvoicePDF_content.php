<?php

					  

$html = '
<html>
<head>
<style>
body {font-family: sans-serif;font-size: 9pt;}
p {margin: 0pt;}
td {vertical-align: top; }
</style>
</head>
<body style="font-family:Arial; font-size:13px;">
<div style="display:block; width:760px; padding:0 10px;"> 

    <div style="display:block; width:100%; vertical-align:top;">
		
		<div style="display:block; width:100%; vertical-align:top;">
			<table width="100%" align="center" style="display:inline-block; vertical-align:top;font-family:Arial; font-size:13px; border-bottom:1px solid #000000; padding-bottom:10px;">
                <tbody style="width:100%; display:inline-block;">
				<tr>
                    <td valign="top" width="50%" style="font-family:Arial; font-size:13px;" > 
						<table>
							<tr><td style="font-family:Arial; font-size:20px; font-weight:bold;">Invoice '.$invoice_gen_no.'</td></tr>
							<tr><td style="font-family:Arial; font-size:13px;">Invoice Date : '.$invoice_sent_date.'</td></tr>
							<tr><td style="font-family:Arial; font-size:13px;">Period : ('.$inv_period.')</td></tr>
						</table>
                    </td>
                    <td valign="top" width="43%" align="right">
    					<div style="display:inline-block;  width:100%; vertical-align:top;" >
                			<img src="'.$CFG['site']['logoname'].'" title="'.$CFG['site']['sitename'].'" alt="'.$CFG['site']['sitename'].'" />
              			 </div>
    				</td>
				</tr>
                </tbody>
			</table>
		</div>
		
		<div style="clear:both;"></div>
		<div style="display:inline-block; width:100%; vertical-align:top; margin-top:10px;margin-bottom:5px;">
			<table width="100%">
				<tr>
					<td valign="top" width="50%" align="left">
						<div style="display:inline-block; width:100%; vertical-align:top;">
							<div style="display:block; width:100%; font-weight:bold; font-family:Arial; font-size:13px;">Restaurant</div>
							<div style="display:block; width:100%; font-family:Arial; font-size:13px; margin-bottom:8px;">'.stripslashes($res_det['0']['res_name']).'</div>'.			
							$res_st_address.
                            $res_city.
							$res_state.
							$res_zip.'
						</div>
					</td>		
					<td valign="top" width="50%" align="right">
						<table align="right"; style="display:inline-block; width:100%; vertical-align:top; float:right;font-family:Arial; font-size:13px; text-align:right;"> 
                        <tbody style="width:100%; display:inline-block;">
							<tr style="display:block; width:100%; font-family:Arial; font-size:13px; margin-bottom:8px;">
								<td style="display:inline-block; vertical-align:top; text-align:right;">'.$CFG['site']['site_address'].'</td>
							</tr>
							<tr style="display:block; width:100%;margin-bottom:8px;">
								<td style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">Tel : </span>'.$CFG['site']['site_phone'].'</td>
							</tr>
							<tr style="display:block; width:100%;margin-bottom:8px;">
								<td style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">Email : </span><a href="'.$CFG['site']['invoiceemail'].'">'.$CFG['site']['invoiceemail'].'</a></td>
							</tr>
							<tr style="display:block; width:100%;margin-bottom:8px;">
								<td style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">Website : </span>'.$CFG['site']['base_url'].'</td>
							</tr>
							<tr style="display:block; width:100%;margin-bottom:8px;">
								<td style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">VAT Registration : </span>'.$CFG['site']['site_vat_no'].'</td>
							</tr>
                            </tbody>
						</table>
					</td>
				</tr>
			</table>
		</div>
		
		<div style="clear:both;"></div>
		<div style="display:block; width:100%; vertical-align:top; margin-top:10px;margin-bottom:5px;">
				<table width="100%" style="font:13px Arial;">
					<tr>
						<td width="50%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;border-bottom:1px solid #000000; font-weight:bold; font-size:13px;">Invoice breakdown</td>
						<td width="20%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;border-bottom:1px solid #000000; font-weight:bold; font-size:13px;"></td>
						<td width="30%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-bottom:1px solid #000000; font-weight:bold; font-size:13px;">Amount</td>
					</tr>
					<tr>
						<td width="50%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">Total value for</td>
						<td width="20%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">'.$total_orders.' orders</td>
						<td width="30%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;"> '.$CFG['site']['currency'].' '.number_format($totalSales,2).'</td>
					</tr>
					<tr>
						<td width="50%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">Customers paid cash for</td>
						<td width="20%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">'.$total_orders_cash.' orders</td>
						<td width="30%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;"> '.$CFG['site']['currency'].' '.number_format($totalSales_cash,2).'</td>
					</tr>
					<tr>
						<td width="50%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">Customers prepaid online with card for</td>
						<td width="20%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">'.$total_orders_cc.' orders</td>
						<td width="30%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;"> '.$CFG['site']['currency'].' '.number_format($totalSales_cc,2).'</td>
					</tr>
				</table>
				<table width="100%" align="center">
					
					<tr>
						<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; border-top:1px solid #ddd9c3; text-align:right; font-family:Arial; font-size:13px;">'.$rest_comm_order_per.'% commission on orders</td>
						<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; border-top:1px solid #ddd9c3; text-align:right;"> '.$CFG['site']['currency'].' '.number_format($totalCommission,2).'</td>
					</tr>
                    <tr>
						<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; font-family:Arial; font-size:13px;" >Card Payment Fee</td>
						<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; ">'.$CFG['site']['currency'].' '.number_format($card_payment_fees,2).'</td>
					</tr>
                    <tr>
						<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; font-family:Arial; font-size:13px;" >Total Commission with Card fee</td>
						<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-bottom:1px solid #ddd9c3;">'.$CFG['site']['currency'].' '.number_format($totalCommWithCardFee,2).'</td>
					</tr>
					<tr>
						<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; font-family:Arial; font-size:13px;"> VAT ('.$uk_vat_per.'%):</td>
						<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;"> '.$CFG['site']['currency'].' '.number_format($uk_vat_cal,2).'</td>
					</tr>
                    
                    <tr>
						<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; border-top:1px solid #ddd9c3; text-align:right; font-family:Arial; font-size:13px;">Total amount owed to '.$CFG['site']['sitename'].':</td>
						<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3;"> '.$CFG['site']['currency'].' '.number_format($net_amt_vat,2).'</td>
					</tr>
					<tr>
						<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; font-family:Arial; font-size:13px;">Total owned to restaurant ( '.$CFG['site']['currency'].' '.number_format($totalSales_cc,2).' - '.$CFG['site']['currency'].' '.number_format($net_amt_vat,2).'):</td>
						<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;"> '.$CFG['site']['currency'].' '.$total_owned_to_restaurant.'</td>
					</tr>
					<tr>
						<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; font-family:Arial; font-size:13px;">Account balance carried forward from previous invoice '.$prev_inv_cont.'<br />(Note: This should be '.$CFG['site']['currency'].' 0.00 if the previous amount is positive, because it had been paid by '.$CFG['site']['sitename'].')</td>
						<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;"> '.$CFG['site']['currency'].' '.number_format($previous_invoice_balance,2).'</td>
					</tr>
					<tr>
						<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; border-top:1px solid #ddd9c3; text-align:right; font-weight:bold; ">Total payable to restaurant (this invoice):</td>
						<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; border-top:1px solid #ddd9c3; text-align:right; font-weight:bold;"> '.$CFG['site']['currency'].' '.$total_payable_to_restaurant.'</td>
					</tr>
				</table>
			</div>
			
			<div style="clear:both;"></div>
			<div style="display:block; width:100%; vertical-align:top; margin-top:10px;margin-bottom:5px;">
				<div style="display:block; width:80%; font-family:Arial; font-size:20px; font-weight:bold; margin-bottom:5px;">'.$CFG['site']['sitename'].' will pay '.$CFG['site']['currency'].' '.number_format($total_payable_to_restaurant,2).' into your account: '.$res_det['0']['res_ac_no'].' </div>
				
				<div style="display:block; width:100%; font-family:Arial; font-size:13px; line-height:20px;margin-bottom:30px;">The sort code and account number on this invoice are masked for your protection – if the unmasked section of these fields appears to be incorrect or if you have any questions regarding this invoice please call us on Tel: '.$CFG['site']['site_phone'].' or write to us at <a href="mailto:'.$CFG['site']['invoiceemail'].'">'.$CFG['site']['invoiceemail'].'</a></div>
				<div style="display:block; width:100%; font-family:Arial; font-size:13px; padding-bottom:30px; border-bottom:1px solid #000; margin-bottom:20px;">Amount will be paid in your account on or around the '.$payment_send_date.'</div>
				<div style="display:block; width:100%; font-family:Arial; font-size:13px;margin-bottom:20px;line-height:20px;">If you have any question regarding this invoice or changes to your information, please contact '.$CFG['site']['sitename'].' at Tel: '.$CFG['site']['site_phone'].' or via e-mail at: <a href="mailto:'.$CFG['site']['invoiceemail'].'">'.$CFG['site']['invoiceemail'].'</a></a></div>
			</div>
			
			<div style="clear:both;"></div>
			<div style="display:block; width:100%; vertical-align:top; margin-top:10px;margin-bottom:5px; border-top:1px solid #000000; padding-top:10px;">
				<div style="display:block; width:100%; font-family:Arial; font-size:20px; font-weight:bold; margin-bottom:15px;">Order details</div>
				<table width="100%" align="center" style="font-size:13px; font-family:Arial; line-height:22px;">
				<thead>
				  <tr>
					<th width="5%" style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">#</th>
					<th width="15%" style=" text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Date</th>
					<th width="25%" style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Order No</th>
					<th width="12%" style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Paid Mtd</th>
                    <th width="13%" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Sub Total</th>
                    <th width="13%" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Del.Charge</th>
                    <th width="13%" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Tax</th>
                    <th width="13%" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Offer( - )</th>
					<th width="15%" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Grand Total</th>
					<th width="13%" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Commission</th>
					
				  </tr>
				 </thead>
				 <tbody>
                 '.$order_summary.'
				  <tr>
					<td colspan="10" align="right" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff;border-bottom:2px solid #f5950c; /*4bacc6*/ font-weight:bold;">Subtotal commission on orders: '.$CFG['site']['currency'].' '.number_format($totalCommission,2).'</td>
				 </tbody>
			</table>
			</div>
			
			<div style="clear:both;"></div>
			<div style="display:block; width:100%; vertical-align:top; margin-top:10px;margin-bottom:5px;">
				<div style="display:block; width:100%; font-family:Arial; font-size:16px; font-weight:bold; margin-bottom:5px;">Partner tariff</div>
				<div style="display:block; width:100%; font-family:Arial; font-size:13px;margin-bottom:5px;">Your current commission is: '.$rest_comm_order_per.'% per order</div>
			</div>
		</div>

</div>
</body>
</html>
';

//$html = utf8_encode($html11);

?>