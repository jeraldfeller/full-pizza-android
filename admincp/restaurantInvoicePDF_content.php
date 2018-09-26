<?php


$html = '
<html>
<head>
<style>
body {font-family: sans-serif;font-size: 9pt;}
p {    margin: 0pt;}
td { vertical-align: top; }
</style>
</head>
<body>
<div style="width:700px;margin:0 auto;">
	<div style="float:left;width:89%;border: 1px solid #C4C4C4;margin: 20px 0;padding:0px 5%;">
		<div style="float:left;width:100%;margin:10px 0px 20px 0px;">
			<div style="float:left;width:80%; font:bold 20px/30px Arial;">Invoice '.$invoice_gen_no.'</div>
			
			<div style="float:right; font:bold 20px/30px Arial;"><img src="'.$CFG['site']['logoname'].'" title="'.$CFG['site']['sitename'].'" alt="'.$CFG['site']['sitename'].'" /></div>
		</div>
		<div style="float:left; border-top:1px solid #000000; width:100%; margin:0px 0px 10px 0px;"></div>
		<div style="float:left;width:100%; font:normal 14px/20px Arial;">
			<div style="float:left; width:50%;">
				<div style="float:left;width:100%; font-weight: bold;">Customer:</div>
				<div style="float:left;width:100%;">'.$res_det['0']['res_name'].'</div>'.
				$res_st_address.
				$res_city.
				$res_state.'
			</div>
			<div style="float:right; width:50%;">
				<div style="float:left;width:100%; text-align:right;">'.$CFG['site']['sitename'].'</div>
				<div style="float:left;width:100%; text-align:right;">'.$CFG['site']['site_address'].'</div>
				<div style="float:left;width:100%; text-align:right;">Tel: '.$CFG['site']['site_phone'].' </div>
				<div style="float:left;width:100%; text-align:right;">Email: <a href="mailto:'.$CFG['site']['invoiceemail'].'">'.$CFG['site']['invoiceemail'].'</a></div>
				<div style="float:left;width:100%; text-align:right;">VAT No.'.$CFG['site']['site_vat_no'].'</div>
			</div>
		</div>
		<div style="float:left;width:100%; font:normal 14px/20px Arial;">
			<div style="float:left; width:50%;">
				<div style="float:left;width:100%;">Invoice date: '.$invoice_sent_date.'</div>
				<div style="float:left;width:100%; font-weight: bold;">For Period: '.$inv_for_period.'</div>
			</div>
		</div>
		<div style="float:left;width:100%;margin:10px 0px 20px 0px;">
			<div style=" width:90%;float:left; font:bold 16px/25px Arial;">You have '.$CFG['site']['sitename'].'</div>
			<div style="float:right; font:bold 16px/25px Arial;">Amount</div>
		</div>
		<div style="float:left; border-top:1px solid #000000; width:100%; margin:0px 0px 10px 0px;"></div>
		<div style="float:left;width:100%; font:normal 14px/20px Arial;">
			<div style="float:left; width:50%;">
				<div style="float:left;width:100%;">1 x Creditcard Fee('.$CFG['site']['site_cc_percentage'].'%)</div>
				<div style="float:left;width:100%;">1 x Commission to '.$CFG['site']['sitename'].' </div>
			</div>
			<div style="float:right; width:50%;">
				<div style="float:left;width:100%; text-align:right;">'.$CFG['site']['currency'].number_format($credit_card_fee,2).'</div>
				<div style="float:left;width:100%; text-align:right;">'.$CFG['site']['currency'].number_format($totalCommission,2).'</div>
				<div style="float:left; border-top:1px solid #000000; width:100%; margin:0px 0px 10px 0px;"></div>
				<div style="float:left;width:100%; font:normal 14px/20px Arial;">
					<div style="float:left; width:50%;">
						<div style="float:left;width:100%;">Total (excl. vat)</div>
						<div style="float:left;width:100%;">+ '.$CFG['site']['site_vat_percentage'].'% vat</div>
						<div style="float:left;width:100%; font-weight: bold;">Invoice total incl. vat</div>
					</div>
					<div style="float:right; width:50%;">
						<div style="float:left;width:100%; text-align:right;">'.$CFG['site']['currency'].number_format($total_com_cc_fee,2).'</div>
						<div style="float:left;width:100%; text-align:right;">'.$CFG['site']['currency'].number_format($cal_vat_per_total,2).'</div>
						<div style="float:left;width:100%; text-align:right; font-weight: bold;">'.$CFG['site']['currency'].number_format($invoice_total_plus_vat,2).'</div>
					</div>
				</div>
			</div>
		</div>
		<div style="float:left; font:bold 20px/25px Arial;">
			<div style="float:left; font:bold 20px/25px Arial;">Account Summary</div>
		</div>
		<div style="float: left; width:100%;">
			<div style="float:left; width:100%; text-align:center;font:normal 14px/25px Arial;">'.$CFG['site']['sitename'].'</div>
		</div>
		<div style="float:left; border-top:1px solid #000000; width:100%; margin:0px 0px 10px 0px;"></div>
		<div style="float:left;width:100%; font:normal 14px/20px Arial;">
			<div style="float:left; width:50%;">
				<div style="float:left;width:100%;">'.$invoice_sent_date.' Payment (card)</div>
				<div style="float:left;width:100%;">'.$invoice_sent_date.' Invoice '.$invoice_gen_no.'</div>
			</div>
			<div style="float:right; width:50%;">
				<div style="float:left;width:100%; text-align:right;">'.$CFG['site']['currency'].number_format($totalSales_cc,2).'</div>
				<div style="float:left;width:100%; text-align:right;">'.$CFG['site']['currency'].'-'.number_format($invoice_total_plus_vat,2).'</div>
				<div style="float:left; border-top:1px solid #000000; width:100%; margin:0px 0px 10px 0px;"></div>
				<div style="float:left;width:100%; font:normal 14px/20px Arial;">
					<div style="float:left; width:50%;">
						<div style="float:left;width:100%; font-weight: bold;">Account Balance:</div>
					</div>
					<div style="float:right; width:50%;">
						<div style="float:left;width:100%; text-align:right; font-weight: bold;">'.$CFG['site']['currency'].number_format($account_bal,2).'</div>
					</div>
				</div>
			</div>
		</div>
		<div style="float:left; font:bold 20px/25px Arial;">
			<div style="float:left; font:bold 20px/25px Arial;">'.$CFG['site']['sitename'].' will pay '.$CFG['site']['currency'].number_format($account_bal,2).' into your account: XX6020-XXXX8560</div>
		</div>
		<p style="float:left;width:100%;font:normal 14px/20px Arial; margin-bottom:15px;">
			The sort code and account number on this invoice are masked for your protection - if the unmasked section of these fields appears to be incorrect or if you have any questions regarding this invoice please call us on tel. 0818 288 888 or write to us at <a href="mailto:'.$CFG['site']['invoiceemail'].'">'.$CFG['site']['invoiceemail'].'</a>
		</p>
		<p style="float:left;width:100%;font:normal 14px/20px Arial; margin-bottom:15px;">
			Amount will be in your account on the '.$payment_send_date.'
		</p>
		<div style="float:left; border-top:1px solid #000000; width:100%; margin:0px 0px 10px 0px;"></div>
		<p style="float:left;width:100%;font:normal 14px/20px Arial; margin-bottom:15px;">
			If you have any questions regarding this invoice or changes to your information, please contact '.$CFG['site']['sitename'].' at tel. 0818 288 888 or via e-mail: <a href="mailto:'.$CFG['site']['invoiceemail'].'">'.$CFG['site']['invoiceemail'].'</a>
		</p>
		<div style="float:left;width:100%; font:normal 14px/20px Arial;">
			<div style="float:right; width:50%;">
				<div style="float:left;width:100%; text-align:right; font-weight: bold;">Period: '.$inv_period.'</div>
			</div>
		</div>
		<div style="float:left; font:bold 20px/25px Arial;">
			<div style="float:left; font:bold 20px/25px Arial;">Your orders for this period</div>
		</div>
		<div style="float:left; border-top:1px solid #000000; width:100%; margin:0px 0px 10px 0px;"></div>
		<div style="float:left;width:100%;margin:10px 0px 20px 0px;">
			<div style="float:left; font:bold 16px/25px Arial;">
			'.$res_det['0']['res_name'].', '.$res_st_address1.$res_city1.$res_zip1.$res_state1.'
			</div>
		</div>
		<div style="float:left;width:100%; font:normal 14px/20px Arial;">
			<div style="float:left; width:50%;">
				<div style="float:left;width:100%;">Restaurant id: '.$res_det['0']['restaurant_id'].'</div>
				<div style="float:left;width:100%;">Specification for invoice no: '.$invoice_gen_no.'</div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<table style="width:100%; margin-bottom:0px;font:normal 14px/20px Arial;" cellpadding="10" cellspacing="10">
			<thead>
			  <tr>
				<th style="text-align:center;">Order No.</th>
				<th style=" text-align:center;">Date</th>
				<th style="text-align:center;">Payment method</th>
				<th style="text-align:center;">Type</th>
				<th style="padding: 5px 10px 0px 0px;text-align:right;">Amount</th>
			  </tr>
			 </thead>
			 <tbody>'.$order_summary.'</tbody>
		</table>
		<div style="float:left;width:100%; font:normal 14px/20px Arial;">
			<div style="float:right; width:50%;">
				<div style="float:left;width:100%; font:normal 14px/20px Arial; margin-right:4px;">
					<div style="float:left; width:50%;">
						<div style="float:left;width:100%; font-weight: bold;">Total Sales:</div>
					</div>
					<div style="float:right; width:50%;">
						<div style="float: left;width: 97%; text-align: right; font-weight: bold;">'.$CFG['site']['currency'] .number_format($totalSales,2).'</div>
					</div>
				</div>
			</div>
		</div>
		<div style="float:left;width:85%; font:normal 14px/20px Arial; margin:20px 0px 20px 0px;">'.
			$cash_orders_history.
			$paypal_orders_history.
			$cc_orders_history.'
		</div>
		'.$rejected_orders_history.'
	</div>
</div>
</body>
</html>
';

?>