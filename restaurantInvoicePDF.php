<?php

include ("includes/config.inc.php");

include($CFG['site']['base_path']."/includes/mpdf/mpdf.php");
$objResInvoice	= new ResInvoice;

$mpdf=new mPDF('c','A4','','',5,5,5,5,5,5); 
$mpdf->useOnlyCoreFonts = true;    // false is default
$mpdf->SetProtection(array('print'));
$mpdf->SetTitle($CFG['site']['sitename']." - Invoice - ".$_GET['invoiceno']);
$mpdf->SetAuthor($CFG['site']['sitename']);
$mpdf->SetWatermarkText($CFG['site']['sitename']);
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'DejaVuSansCondensed';
$mpdf->watermarkTextAlpha = 0.03;
$mpdf->SetDisplayMode('fullwidth');

//==============================================================
//==============================================================
		$inv_resid 		= $objSite->filterInput($_GET['resid'];
		$invoice_gen_no = $objSite->filterInput($_GET['invoiceno'];
		
		#Restaurant Details******************************************
		$res_det = $objResInvoice->restaurantDetailsInvoice($inv_resid);
		
		#Invoice Details******************************************
		if( isset($invoice_gen_no) && !empty($invoice_gen_no) )
		{
            #$invoice_gen_no = $_GET['invoiceno'];
			
			$sel_inv = " SELECT total_sales_cnt, total_sales_cash_cnt, total_sales_cc_cnt, total_sales, total_sales_cash, total_sales_cc, admin_fee_charge, comm_order_per, comm_order_amt , com_amt_admin_fee_charge, uk_vat_per, uk_vat_amt, net_amt_vat, total_owned_to_rest_amt, pre_inv_acc_balance, inv_acc_balance, card_payment_fee, card_fee, rejected_order_total_sales, rejected_order_cnt, inv_month, inv_month_p_short, inv_month_period, inv_ord_from, inv_ord_to, inv_acc_balance, payment_send_date, invoice_sent_date FROM ".$CFG['table']['invoice']." WHERE invoice_gen_id = '".$invoice_gen_no."' ORDER BY invoice_id DESC ";
			$res_inv = $objResInvoice->ExecuteQuery($sel_inv,'select');
			
			$invoice_monthly_2 	= $objSite->filterInput($res_inv['0']['inv_month']);
			$invoice_period_2 	= $objSite->filterInput($res_inv['0']['inv_month_period']);
			
			#invoice Sent date
			$invoice_sent_date = date("d M Y",strtotime($res_inv['0']['invoice_sent_date']));
			#Payment will be send date
			$payment_send_date = date("d M Y", strtotime($res_inv['0']['payment_send_date']));
			
			#-----------------------------------------------------			
			$startdate 	= $res_inv['0']['inv_ord_from'];
			$endeddate 	= $res_inv['0']['inv_ord_to'];
            
            #Prev invoice
            $sel_inv_pre1 = " SELECT invoice_gen_id, pre_inv_acc_balance, inv_acc_balance, invoice_sent_date FROM ".$CFG['table']['invoice']." WHERE restaurant_id = '".$inv_resid."' AND invoice_gen_id < '".$invoice_gen_no."' ORDER BY invoice_id DESC LIMIT 1 ";
            
			$sel_inv_pre = $objResInvoice->ExecuteQuery($sel_inv_pre1,'select');
            
            $pre_inv_no = '';
            $pre_inv_acc_bal = 0.00;
            $pre_inv_sent_date = '';
            if(count($sel_inv_pre) > 0){
                #Prev invoice
                $pre_inv_no         = $sel_inv_pre['0']['invoice_gen_id'];
                $pre_inv_acc_bal    = $sel_inv_pre['0']['inv_acc_balance'];
                $pre_inv_sent_date  = date("d.m.Y", strtotime($sel_inv_pre['0']['invoice_sent_date']) );
            }    
            if( isset($pre_inv_no) && !empty($pre_inv_no) ){
                $prev_inv_cont = '('.$pre_inv_no.' – '.$pre_inv_sent_date.')';
            }
            
            $inv_for_period = date("d M Y", strtotime($startdate) ).' to '.date("d M Y", strtotime($endeddate) );
			$inv_period 	= date("d M Y", strtotime($startdate) ).' to '.date("d M Y", strtotime($endeddate) );
            
            $endeddate_cond = date('Y-m-d', strtotime($endeddate. ' + 1 days'));
			$invoice_cond = " AND orderdate BETWEEN '".$startdate."' AND '".$endeddate_cond."' ";
            
            //Total Orders--------------------------------------
    		list($res_det_all, $totalSales, $totalCommission, $order_summary) = $objResInvoice->get_all_orders($inv_resid, $invoice_cond);
            $total_orders = count($res_det_all);
            
            #Invoice Process
            $total_orders       		= $res_inv['0']['total_sales_cnt'];
            $total_orders_cash  		= $res_inv['0']['total_sales_cash_cnt'];
            $total_orders_cc    		= $res_inv['0']['total_sales_cc_cnt'];
            
            $totalSales   		        = $res_inv['0']['total_sales'];
            $totalSales_cash   		    = $res_inv['0']['total_sales_cash'];
            $totalSales_cc      		= $res_inv['0']['total_sales_cc'];
            
            $admin_service_fee_charge 	= $res_inv['0']['admin_fee_charge'];
            $rest_comm_order_per     	= $res_inv['0']['comm_order_per'];
            $totalCommission    		= number_format($res_inv['0']['comm_order_amt'],2);
            $net_amt_owned_site_admin 	= $res_inv['0']['com_amt_admin_fee_charge'];
            $uk_vat_per         		= $res_inv['0']['uk_vat_per'];
            $uk_vat_cal         		= $res_inv['0']['uk_vat_amt'];
            $net_amt_vat        		= $res_inv['0']['net_amt_vat'];
            //$Invoice_total              = $res_inv['0']['net_amt_vat'];
            $total_owned_to_restaurant 	= $res_inv['0']['total_owned_to_rest_amt'];
            $previous_invoice_balance 	= $res_inv['0']['pre_inv_acc_balance'];
            $total_payable_to_restaurant= $res_inv['0']['inv_acc_balance'];
            
            $card_payment_fees 			= $res_inv['0']['card_payment_fee'];
            $othername1    		        = $res_inv['0']['invoice_other1_name'];
            $otherprice1  		        = $res_inv['0']['invoice_other1_price'];
            $othername2 	            = $res_inv['0']['invoice_other2_name'];
            $otherprice2     	        = $res_inv['0']['invoice_other2_price'];
            $card_fee 					= $res_inv['0']['card_fee'];
            $rejected_order_total_sales = $res_inv['0']['rejected_order_total_sales'];
            $rejected_order_cnt 		= $res_inv['0']['rejected_order_cnt'];
            
		}
		
//==============================================================
//==============================================================
		
		if($res_det['0']['res_st_address'] != ''){
			$res_st_address	= '<div style="display:block; width:100%; font-family:Arial; font-size:13px; margin-bottom:8px;">'.$res_det['0']['res_st_address'].'</div>';
			$res_st_address1= $res_det['0']['res_st_address'].', ';
		}
		if($res_det['0']['res_city'] != ''){
			$res_city 		= '<div style="display:block; width:100%; font-family:Arial; font-size:13px; margin-bottom:8px;">'.$res_det['0']['res_city'].'</div>';
			$res_city1 		= $res_det['0']['res_city'].', ';
		}
		if($res_det['0']['res_zip'] != ''){
		    $res_zip 		= '<div style="display:block; width:100%; font-family:Arial; font-size:13px; margin-bottom:8px;">'.$res_det['0']['res_zip'].'</div>';
			$res_zip1 		= $res_det['0']['res_zip'].', ';
		}
		if($res_det['0']['res_state'] != ''){
			$res_state 		= '<div style="display:block; width:100%; font-family:Arial; font-size:13px; margin-bottom:8px;">'.$res_det['0']['res_state'].'</div>';
			$res_state1 	= $res_det['0']['res_state'];
		}
		
//Restaurant Invoice Email/Pdf content
include($CFG['site']['base_path']."/restaurantInvoicePDF_content.php");
$html = utf8_encode($html);
//echo $html;
//==============================================================
//==============================================================
//==============================================================
$mpdf->WriteHTML($html);

$mpdf->Output(); 

exit;
//==============================================================
//==============================================================
//==============================================================


?>