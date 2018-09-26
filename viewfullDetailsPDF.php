<?php

include ("includes/config.inc.php");

include($CFG['site']['base_path']."/includes/mpdf/mpdf.php");

$mpdf=new mPDF('c','A4','','',5,5,5,5,5,5); 
$mpdf->useOnlyCoreFonts = true;    // false is default
$mpdf->SetProtection(array('print'));
$mpdf->SetTitle($CFG['site']['sitename']." - Order");
$mpdf->SetAuthor($CFG['site']['sitename']);
$mpdf->SetWatermarkText($CFG['site']['sitename']);
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'DejaVuSansCondensed';
$mpdf->watermarkTextAlpha = 0.03;
$mpdf->SetDisplayMode('fullwidth');

//echo 'Hi';exit;
//==============================================================
//==============================================================
		$orderid = $objSite->filterInput($_GET['orderid']);
		$sel_order = "SELECT ordergenerateid, restaurant_id, customername, customeremail, customercellphone, deliverydoornumber, deliverystreet, deliverylandmark, deliveryarea, deliverycity, deliverytype, deliverystate, deliveryzip, ordertotalprice, offervalue, taxvalue, customerlandline, deliverylandmark, foodassoonas, deliverydate, deliverytime, instructions, status, orderdate, payment_type, payment_status, usertype , printer_sent, deliveryamount, taxamount, offeramount, tipamount, ordersubtotal, voucher_id, voucher_code, voucher_price, transaction_id FROM ".$CFG['table']['order']." WHERE orderid = '".$orderid."' ";
		$res_order = $objSite->ExecuteQuery($sel_order,'select');
        
        if($res_order[0]['voucher_price'] != '0.00'){
            
            $voucher_price = '<tr>
                        		<td class="totals">Voucher Price</td>
                        		<td class="totals_val"><b>- '.$CFG['site']['currency'].' '.number_format($res_order[0]['voucher_price'],2).'</b></td>
                    		</tr>';
            
        }
        
        #echo "<pre>";print_r($res_order);echo "</pre>";exit;
		
		$ordergenid		= $res_order[0]['ordergenerateid'];
		$orderstatus	= $res_order[0]['status'];
		$deliverydate	= $res_order[0]['deliverydate'];
		$deliverytime	= $res_order[0]['deliverytime'];
		$ordereddate	= $res_order[0]['orderdate'];
        $transaction_id	= $res_order[0]['transaction_id'];
        
        if ($res_order[0]['payment_status'] == 'P')
            $paymentstatus = "Paid";
        elseif ($res_order[0]['payment_status'] == 'NP')
        $paymentstatus = "Not Paid";
        $tipamount      = $res_order[0]['tipamount'];
        
        $offer1         =  $res_order[0]['offervalue']."<br>";
        $offer2         =  round($res_order[0]['offervalue'],0)."<br>";    
        if ($offer2 > 0)  {
            $offer3         = $offer1/$offer2;    
        }       
         
		
        if($offer3 == '1'){
             $offamount      = round($res_order[0]['offervalue'],0);
        }else{
             $offamount      = $res_order[0]['offervalue'];
        }
                
		#Payment method
		$payment_type	= $res_order[0]['payment_type'];
		if($payment_type == 'cod'){
			$order_payment_type = "COD";
		}elseif($payment_type == 'creditcard'){
			$order_payment_type = "Credit Card";
		}elseif($payment_type == 'authorizenet'){
			$order_payment_type = "Authorize.Net";
		}elseif($payment_type == 'paypal'){
			$order_payment_type = "Paypal";
		}
		
		$deliverytype 	= $res_order[0]['deliverytype'];
		$customer_name 	= stripslashes($res_order[0]['customername']);
		$deliverycity 	= stripslashes($objSite->getValue("cityname",$CFG['table']['city'],"city_id = '".$res_order[0]['deliverycity']."'"));
		$deliverystate 	= stripslashes($objSite->getValue("statename",$CFG['table']['state'],"statecode = '".$res_order[0]['deliverystate']."'"));
		$deliveryzip 	= stripslashes($res_order[0]['deliveryzip']);
		$deliveryphone 	= stripslashes($res_order[0]['customercellphone']);
		$deliveryemail 	= stripslashes($res_order[0]['customeremail']);
		
		#Address
		if(!empty($res_order[0]['deliverydoornumber']))
			$deliveryaddress .= stripslashes($res_order[0]['deliverydoornumber']).', ';
		if(!empty($res_order[0]['deliverystreet']))
			$deliveryaddress .= stripslashes($res_order[0]['deliverystreet']).', ';
		if(!empty($res_order[0]['deliveryarea']))
			$deliveryaddress .= stripslashes($res_order[0]['deliveryarea']);
		
        if(!empty($res_order[0]['deliverydoornumber']))
			$deliverydoornumber  = '<li>
            							<span style="float:left;width:25%;color:#353535;font:bold 13px/25px Arial;">Apt/Suite/Building</span>
            							<span style="float:left;width:1%;margin: 0 2% 0 0;">:</span>
            							<span style="float:left;width:69%;">'.stripslashes($res_order[0]['deliverydoornumber']).'</span>
            						</li>';
            
        if(!empty($res_order[0]['deliverystreet'])){
			$deliverystreet      = '<li>
            							<span style="float:left;width:25%;color:#353535;font:bold 13px/25px Arial;">Street</span>
            							<span style="float:left;width:1%;margin: 0 2% 0 0;">:</span>
            							<span style="float:left;width:69%;">'.stripslashes($res_order[0]['deliverystreet']).'</span>
            						</li>';
        }
        
        if(!empty($deliverycity)){
        $deliverycity  = '<li>
							<span style="float:left;width:25%;color:#353535;font:bold 13px/25px Arial;">City</span>
							<span style="float:left;width:1%;margin: 0 2% 0 0;">:</span>
							<span style="float:left;width:69%;">'.ucfirst($deliverycity).'</span>
						</li>';
        }
        
        if(!empty($deliverystate)){
            $deliverystate = '<li>
							<span style="float:left;width:25%;color:#353535;font:bold 13px/25px Arial;">State</span>
							<span style="float:left;width:1%;margin: 0 2% 0 0;">:</span>
							<span style="float:left;width:69%;">'.ucfirst($deliverystate).'</span>
						</li>';
        }
        
        if(!empty($deliveryzip)){
            $deliveryzip = '<li>
							<span style="float:left;width:25%;color:#353535;font:bold 13px/25px Arial;">Zip Code</span>
							<span style="float:left;width:1%;margin: 0 2% 0 0;">:</span>
							<span style="float:left;width:69%;">'.$deliveryzip.'</span>
						</li>';
        }
        	
		#Order Instructions
		$order_instructions 	= stripslashes($res_order[0]['instructions']);
		if(!empty($order_instructions)){
			$order_instruction_here = '<div style="float:left;width:300px; font: normal 13px/20px Arial;margin:-90px 0px 0px 10px;">
					<table border="0" cellpadding="0" cellspacing="0">
					<thead>
					  <tr>
					  	<th style="text-align:left;">Order Instructions</th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
					  <td style="text-align:left; word-break:break-all; word-wrap:break-word;">'.$order_instructions.'</td>
					  </tr>
					 </tbody>
					</table>
				</div>';
		}
		
		
		#echo "<pre>";print_r($res_order);echo "</pre>";
		
		$restDetails	= $objSite->GetMultivalue("restaurant_name,restaurant_salestax,restaurant_delivery_charge,restaurant_minorder_price,restaurant_delivery,restaurant_pickup, restaurant_logo",$CFG['table']['restaurant'],"restaurant_id = '".$res_order[0]['restaurant_id']."'");
		
		#res name
		$restaurant_name = stripslashes($restDetails['0']['restaurant_name']);
		
		#res logo
		if(!empty($restDetails['0']['restaurant_logo'])){
			$res_logo = $CFG['site']['photo_restaurant_url'].'/logo/'.$restDetails['0']['restaurant_logo'];
		}else{
			$res_logo = $CFG['site']['image_url'].'/no-image.jpg';
		}
		
		$sel_cart = " SELECT ".
					" rc.cart_id, rc.menuid, rc.restaurantid, rc.menuname, rc.menutype, rc.addonsname, rc.addonsprice, rc.menuprice, rc.quantity, rc.pizza_size, rc.pizza_crustname, rc.pizza_crustprice, rc.pizza_addonsname, rc.pizza_addons_price, rc.specialinstruction, rc.tot_menuprice, ".
					" cat.maincatename AS category_name ".
					" FROM ".$CFG['table']['restaurant_cart']." AS rc ".
					" LEFT JOIN ".$CFG['table']['restaurant_menu']." AS rm ON  rc.menuid = rm.id ".
					" LEFT JOIN ".$CFG['table']['category_main']." AS cat ON  cat.maincateid = rm.menu_category ".
					" WHERE rc.orderid = '".$orderid."' AND rc.quantity != '0' ";
		$res_cart = $objSite->ExecuteQuery($sel_cart, "select");
		#echo "<pre>";print_r($res_cart);echo "</pre>";
		
		if(count($res_cart) > 0){
			foreach($res_cart as $key=>$value){
				$rowTotal[]= $res_cart[$key]['tot_menuprice'];
				$snoo = $key+1;
				
				//Addons
				if (!empty($res_cart[$key]['addonsname']))			$addons_here .=  '<br><b>Addons:</b> '.$res_cart[$key]['addonsname'];
				if (!empty($res_cart[$key]['pizza_crustname']))		$addons_here .=  '<br><b>Crust:</b> '.$res_cart[$key]['pizza_crustname'];
				if (!empty($res_cart[$key]['pizza_addonsname']))	$addons_here .=  '<br><b>Topping:</b> '.$res_cart[$key]['pizza_addonsname'];
				if (!empty($res_cart[$key]['specialinstruction']))	$addons_here .=  '<br><b>Instruction:</b> '.$res_cart[$key]['specialinstruction'];
                if (!empty($res_cart[$key]['pizza_size'])) $res_cart[$key]['pizza_size'] = '('.$res_cart[$key]['pizza_size'].')';
				
				//cart Item
				$cart_item_here .= '<tr>
				<td align="center">'.$snoo.'</td>
				<td>'.stripslashes($res_cart[$key]['menuname']).' '.$res_cart[$key]['pizza_size'].' '.$addons_here.'</td>
				<td align="center">'.$res_cart[$key]['quantity'].'</td>
				<td align="right">'.$CFG['site']['currency'].' '.$res_cart[$key]['menuprice'].'</td>
				<td align="right">'.$CFG['site']['currency'].' '.$res_cart[$key]['tot_menuprice'].'</td>
				</tr>';
                unset($addons_here);
				
			}
			/*if(!empty($rowTotal) && is_array($rowTotal))
			{
				$orderSubTotal = array_sum($rowTotal);
			}*/
		}
        $orderSubTotal = $res_order['0']['ordersubtotal'];
		
		#Spl Instruction
		
		#if($restDetails[0]['restaurant_delivery'] == 'Yes' && $res_order[0]['deliverytype'] != 'pickup'){
		if($deliverytype != 'pickup'){
			$deliverychargeamt = $res_order['0']['deliveryamount'];
			
			$order_deliv_details = '<li>
							<span style="float:left;width:25%;color:#353535;font:bold 13px/25px Arial;">Delivery Date</span>
							<span style="float:left;width:1%;margin: 0 2% 0 0;">:</span>
							<span style="float:left;width:69%;">'.$deliverydate.'</span>
						</li>
						<li>
							<span style="float:left;width:25%;color:#353535;font:bold 13px/25px Arial;">Delivery Time</span>
							<span style="float:left;width:1%;margin: 0 2% 0 0;">:</span>
							<span style="float:left;width:69%;">'.$deliverytime.'</span>
						</li>';
			
			$delivery_charge_here = '<tr>
				<td class="totals">Delivery Charge:</td>
				<td class="totals_val">'.$CFG['site']['currency'].' '.number_format($deliverychargeamt,2).'</td>
				</tr>';
		}
		#$tax = $restDetails[0]['restaurant_salestax'];
		$tax = $res_order[0]['taxvalue'];
		if($tax != ''){
			$taxamount = $res_order[0]['taxamount'];
		}
		
		$offer_percentage = $res_order['0']['offervalue'];
		if( isset($offer_percentage) && !empty($offer_percentage) ){
		  
            $orderDiscountPrice = $res_order['0']['offeramount'];
			
			/*$orderDiscountPrice = $orderSubTotal*($offer_percentage/100);
			$orderDiscountPriceTotal = $orderSubTotal-$orderDiscountPrice;
			$orderGrandTotal = $orderDiscountPriceTotal+$totaltax+$deliverychargeamt+$taxamount;*/
			
			$offer_here = '<tr>
				<td class="totals">Discount('.$offamount.'% Off):</td>
				<td class="totals_val"> - '.$CFG['site']['currency'].' '.number_format($orderDiscountPrice,2).'</td>
				</tr>';
                
               //echo $offer_here;
               // exit;
		}/*else{
			$orderGrandTotal = $orderSubTotal+$totaltax+$deliverychargeamt+$taxamount;
		}*/
        $orderGrandTotal = $res_order['0']['ordertotalprice'];
//==============================================================
//==============================================================

$html = '
<html>
<head>
<style>
body {font-family: sans-serif;font-size: 9pt;}
p {    margin: 0pt;}
td { vertical-align: top; }
.items td {border-left: 0.1mm solid #000000;border-right: 0.1mm solid #000000;}
table thead td { background-color: #EEEEEE;text-align: center;border: 0.1mm solid #000000;}
.items td.blanktotal {background-color: #FFFFFF;border: 0mm none #000000;border-top: 0.1mm solid #000000;border-right: 0.1mm solid #000000;}
.items td.totals {text-align: right;border: 0.1mm solid #000000;}
.items td.totals_val {text-align: right;border: 0.1mm solid #000000;color:#ED7A53;}
</style>
</head>
<body>
    <div style="width:960px;margin:0 auto;">
		<div style="float:left;width:100%;border: 1px solid #C4C4C4;">
			<div style="background-color:#E0E0E0;width:100%;border-bottom: 1px solid #C4C4C4;">
				<table width="100%" border="0"><tr>
				<td><img src="'.$res_logo.'" alt="" title="" style="float:left;padding:10px 0px 10px 15px;" /></td>
				<td align="right">
					<div style="float:right;padding:10px 0px 10px 15px;color:#ED7A53;font:bold 17px/25px Arial;">Order #: '.$ordergenid.'</div>
					<div style="float:right;padding:10px 0px 10px 15px;">'.date('jS F Y').'</div>
				</td>
				</tr></table>
			</div>
			<div style="float:left;width:100%;">
				<div style="float:left;width:50%;">
					<ul style="float:left;width:100%; margin-bottom:15px;list-style:none;">
						<li style="float:left;width:100%;"><span style="float:left;color:#ED7A53;font:bold 15px/20px Arial;width:100%;margin-bottom: 10px;">'.$restaurant_name.'</span></li>
						<li>
							<span style="float:left;width:25%;color:#353535;font:bold 13px/25px Arial;">Customer Name</span>
							<span style="float:left;width:1%;margin: 0 2% 0 0;">:</span>
							<span style="float:left;width:69%;">'.$customer_name.'</span>
						</li>
                        <li>
							<span style="float:left;width:25%;color:#353535;font:bold 13px/25px Arial;">Email</span>
							<span style="float:left;width:1%;margin: 0 2% 0 0;">:</span>
							<span style="float:left;width:69%;color:#ED7A53;">'.$deliveryemail.'</span>
						</li>
                        <li>
							<span style="float:left;width:25%;color:#353535;font:bold 13px/25px Arial;">Phone</span>
							<span style="float:left;width:1%;margin: 0 2% 0 0;">:</span>
							<span style="float:left;width:69%;color:#ED7A53;">'.$deliveryphone.'</span>
						</li>
                        '.$deliverydoornumber.'
						'.$deliverystreet.'
						'.$deliverycity.'
                        '.$deliverystate.'
						'.$deliveryzip.'
                        <li>
							<span style="float:left;width:25%;color:#353535;font:bold 13px/25px Arial;">Transaction id</span>
							<span style="float:left;width:1%;margin: 0 2% 0 0;">:</span>
							<span style="float:left;width:69%;color:#ED7A53;">'.$transaction_id.'</span>
						</li>
					</ul>
				</div>
				<div style="float:right;width:30%;">
					<ul style="float:left;width:100%; margin-bottom:15px;list-style:none;">
						<li>
							<span style="float:left;width:25%;color:#353535;font:bold 15px/25px Arial;">Order #</span>
							<span style="float:left;width:1%;margin: 0 2% 0 0;">:</span>
							<span style="float:left;width:69%;color:#ED7A53;font:bold 17px/25px Arial;">'.$ordergenid.'</span>
						</li>
						<li>
							<span style="float:left;width:25%;color:#353535;font:bold 13px/25px Arial;">Order Status</span>
							<span style="float:left;width:1%;margin: 0 2% 0 0;">:</span>
							<span style="float:left;width:69%;">'.$orderstatus.'</span>
						</li>
						<li>
							<span style="float:left;width:25%;color:#353535;font:bold 13px/25px Arial;">Order Type</span>
							<span style="float:left;width:1%;margin: 0 2% 0 0;">:</span>
							<span style="float:left;width:69%;">'.$deliverytype.'</span>
						</li>
						<li>
							<span style="float:left;width:25%;color:#353535;font:bold 13px/25px Arial;">Ordered Date</span>
							<span style="float:left;width:1%;margin: 0 2% 0 0;">:</span>
							<span style="float:left;width:69%;">'.$ordereddate.'</span>
						</li>
                        <li>
							<span style="float:left;width:25%;color:#353535;font:bold 13px/25px Arial;">Payment status</span>
							<span style="float:left;width:1%;margin: 0 2% 0 0;">:</span>
							<span style="float:left;width:69%;">'.$paymentstatus.'</span>
						</li>
						'.$order_deliv_details.'
					</ul>
				</div>
				<div class="clearfix"></div>
				<div style="float: left; width:100%;">
					<ul style="float:left;width:100%; margin-bottom:15px;list-style:none;">
						<li style="float:left;width:100%;"><span style="float:left;font:bold 20px/25px Arial; line-height: 27px; color:#333333; width:100%;margin-bottom: 10px;">Payment method: <span style="color:#ED7A53;">'.$order_payment_type.'</span></span></li>
					</ul>
				</div>
				<div style="clear:both;">&nbsp;</div>
				<div align="center">
				<table class="items" width="95%" style="font-size: 9pt; border-collapse: collapse;" cellpadding="8">
				<thead>
				<tr>
				<td width="10%">SNO</td>
				<td width="35%">MENU</td>
				<td width="10%">QTY</td>
				<td width="15%">PRICE</td>
				<td width="15%">TOTAL PRICE</td>
				</tr>
				</thead>
				<tbody>
				<!-- ITEMS HERE -->
				'.$cart_item_here.'
				<!-- END ITEMS HERE -->
				<tr>
				<td class="blanktotal" colspan="3" rowspan="6"></td>
				<td class="totals">Subtotal:</td>
				<td class="totals_val">'.$CFG['site']['currency'].' '.number_format($orderSubTotal,2).'</td>
				</tr>
				'.$delivery_charge_here.'
				<tr>
				<td class="totals">Tax ('.$tax.'%):</td>
				<td class="totals_val">'.$CFG['site']['currency'].' '.number_format($taxamount,2).'</td>
				</tr>
				<tr>
				<td class="totals">Tips:</td>
				<td class="totals_val">'.$CFG['site']['currency'].' '.$tipamount.'</td>
				</tr>
				'.$offer_here.'
                '.$voucher_price.'
				<tr>
				<td class="totals"><b>TOTAL:</b></td>
				<td class="totals_val"><b>'.$CFG['site']['currency'].' '.number_format($orderGrandTotal,2).'</b></td>
				</tr>
				</tbody>
				</table>
				</div>
				'.$order_instruction_here.'
			</div>
		</div>

    </div>
   
</body>
</html>
';
//echo $html;
//exit;

//==============================================================
//==============================================================
//==============================================================
$mpdf->WriteHTML($html);

$mpdf->Output(); exit;

exit;
//==============================================================
//==============================================================
//==============================================================


?>