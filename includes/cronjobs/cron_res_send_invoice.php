<?php

require(dirname(dirname(__FILE__)).'/cron_cron.php');
//echo dirname(dirname(__FILE__));
//echo "<pre>";print_r($_SERVER);echo "</pre>";
//exit;

/*$fromname = 'Platinum';
$fromemail = 'sri.n@roamsoft.in';
$to_email = 'sri.n@roamsoft.in';
$mail_subject = 'test crones';
$mail_content .= 'basepath=>'.$CFG['site']['base_path'];
$mail_content .= 'baseurl=>'.$CFG['site']['base_url']."<br>";
#$mail_content .= print_r($CFG);;

$mailHeader  = "From:".$fromname." <".$fromemail."> \n" ;
$mailHeader .= "X-Sender:". $fromemail." \n";
$mailHeader .= "Reply-To: ".$fromname." <".$fromemail."> \n";
$mailHeader .= "Content-Type: text/html; charset=iso-8859-1 \n";
$mailHeader .= "Return-Path:".$fromemail." \n";
$mailHeader .= "Error-To: ".$fromemail." \n";
$mailHeader .= "X-Mailer: ".$_SERVER['SERVER_NAME']." \n";
$mailHeader .= "MIME-Version: 1.0 \n";

$mailresult  = mail($to_email,$mail_subject,$mail_content,$mailHeader);
if($mailresult){
    echo "MAIL SENT";
}else{
    echo "MAIL NOT SENT";
}*/
//exit;

$objResInvoice	= new ResInvoice;

#-----------------------------------------------------------------------------
#Monthly Twice
$invoicesetting = $CFG['site']['site_inv_setting'];
//echo "<br>sett-->". $invoicesetting;

//Monthly Once
//if($invoicesetting == 'm2'){
    
    
    /*if(date('j') == 1){
        //Next Month 1 -> Day 16 To Day 30 OR 31
        
        $last_date = date("Y-m-d", strtotime('-1 day', strtotime(date('Y-m-d'))) );
        //echo "<br>ld-->".$last_date;
        
        list($ll_yr, $ll_mon, $ll_date) = explode("-", $last_date);
        $startdate              = $ll_yr.'-'.$ll_mon.'-16';
        $endeddate              = $last_date;
        //$endeddate              = '2014-01-31';
        
        $invoice_monthly_2      = $ll_yr.'-'.$ll_mon;
        $inv_month_period       = 16;
        $inv_month_period_limit = '16-'.$ll_date;
        $inv_month              = $ll_yr.'-'.$ll_mon;
    }else{
        //Day 16 -> Day 01 to Day 15
    	$startdate              = date('Y').'-'.date('m').'-01';
        $endeddate              = date('Y').'-'.date('m').'-15';
        
        $invoice_monthly_2      = date('Y').'-'.date('m');
        $inv_month_period       = 1; 
        $inv_month_period_limit = '01-15';
        $inv_month              = date('Y').'-'.date('m');
    }*/
//}
        $startdate              = '2015-07-10';
        $endeddate              = '2015-07-11';


#Order
// This is used only order restaurant ( With Order )
$sql_sel_ress_1 = " SELECT ro.restaurant_id ".
				  " FROM ".$CFG['table']['order']." AS ro ".
				  " WHERE ro.restaurant_id IS NOT NULL AND ro.payment_type !='' AND ro.ordersubtotal !='0.00' AND ro.deliverytype != '' AND status='completed' AND ro.res_order_delivereddate != '0000-00-00 00:00:00' AND res_order_delivereddate BETWEEN '".$startdate."' AND '".$endeddate."' GROUP BY ro.restaurant_id ORDER BY ro.restaurant_id ASC ";
                  
$res_sel_ress = $objSite->ExecuteQuery($sql_sel_ress_1,'select');

if(count($res_sel_ress) > 0){
	foreach($res_sel_ress as $key11=>$value11){
	
 #Invoice Process start--------------------------------------------------------
    		$inv_resid 		= $res_sel_ress[$key11]['restaurant_id'];
            
            #Restaurant Details******************************************
    		$res_det = $objResInvoice->restaurantDetailsInvoice($inv_resid);
    		//echo "<pre>";print_r($res_det);echo "</pre>";
            
            #Invoice No---------------------------------------
			$sel_inv_no = " SELECT invoice_gen_id FROM ".$CFG['table']['invoice']." WHERE restaurant_id = '".$inv_resid."' AND invoice_gen_id = '" . $invoice_gen_no . "' ORDER BY invoice_id DESC ";
			$res_inv_no = $objSite->ExecuteQuery($sel_inv_no,'select');
			
			if( !empty($res_inv_no) ){
                list($inv_prefix,$inv_newcode) = explode('CP'.$inv_resid.'_',$res_inv_no['0']['invoice_gen_id']);
				$invoice_gen_no = 'CP'.$inv_resid.'_'.$objSite->generateId($inv_newcode+1);
			}else{
				$invoice_gen_no = 'CP'.$inv_resid.'_1001';
			}
			
			#invoice Sent date
			$invoice_sent_date = date("d M Y");
			#Payment will be send date
			$payment_send_date = date("Y-m-d", strtotime("+1 week"));
            
            #Prev invoice
            $sel_inv_pre = $objResInvoice->getMultiValue("invoice_gen_id, inv_acc_balance, invoice_sent_date", $CFG['table']['invoice'] , " restaurant_id = '".$inv_resid."' ORDER BY invoice_id DESC LIMIT 1 ");
             #echo "<pre>";print_r($sel_inv_pre);echo "</pre>";
             
            $pre_inv_no = '';
            $pre_inv_acc_bal = 0.00;
            $pre_inv_sent_date = '';
            if(count($sel_inv_pre) > 0){
                #Prev invoice
                $pre_inv_no         = $sel_inv_pre['0']['invoice_gen_id'];
                $pre_inv_acc_bal    = $sel_inv_pre['0']['inv_acc_balance'];
                $pre_inv_sent_date  = date("d.m.Y", strtotime($sel_inv_pre['0']['invoice_sent_date']) );
            }
                        
            $inv_for_period = date("d M Y", strtotime($startdate) ).' to '.date("d M Y", strtotime($endeddate) );
			$inv_period 	= date("d M Y", strtotime($startdate) ).' to '.date("d M Y", strtotime($endeddate) );
            
            $endeddate_cond = date('Y-m-d', strtotime($endeddate. ' + 1 days'));
            $invoice_cond = " AND res_order_delivereddate BETWEEN '".$startdate."' AND '".$endeddate_cond."' ";
            
            //Total Orders--------------------------------------
    		list($res_det_all, $totalSales, $totalCommission, $order_summary) = $objResInvoice->get_all_orders($inv_resid, $invoice_cond);
            $total_orders = count($res_det_all);
            
            #-----------------Cash------------------
            list($totalSales_cash, $cash_orders_history, $total_orders_cash) = $objResInvoice->get_all_orders_cod($inv_resid, $invoice_cond);
    		
    		//CC---------------------------------------------
    		list($totalSales_cc, $cc_orders_history, $total_orders_cc, $onlinepaymentfee_cc) = $objResInvoice->get_all_orders_cc($inv_resid, $invoice_cond);
    		#Admin service fee charge---------------------------------------------
            $card_payment_fees = $onlinepaymentfee_cc;
            
            #Join fee---------------------------------------------
            $get_num_invoice = $objResInvoice->getNumValues($CFG['table']['invoice'], " restaurant_id = '".$inv_resid."' ");
            
            if($get_num_invoice < $res_det['0']['site_rest_noofinstall']){
                $site_remaining_join_fee= $res_det['0']['site_rest_remain_join_fee']/$res_det['0']['site_rest_noofinstall'];
            }else{
                $site_remaining_join_fee = number_format(0.00 , 2);
            }
            
            $totalCommWithCardFee = $totalCommission + $card_payment_fees;
            $admin_service_fee_charge = $card_payment_fees ;
            
            $net_amt_owned_site_admin = $totalCommission+$admin_service_fee_charge;
            
            #VAT--------------------------------------------
            $uk_vat_per = $CFG['site']['site_vat_percentage'];
            $uk_vat_cal =  ($net_amt_owned_site_admin * ($CFG['site']['site_vat_percentage']/100));
            
            $net_amt_vat =  ($net_amt_owned_site_admin + $uk_vat_cal);
            $total_owned_to_restaurant = ($totalSales_cc-$net_amt_vat);
            
            #Invoice total
            $Invoice_total =($admin_service_fee_charge+$totalCommission+$uk_vat_cal);
            
            #previous invoice balance
            if($pre_inv_acc_bal < 0.00){
                $previous_invoice_balance = $pre_inv_acc_bal;
            }else{
                $previous_invoice_balance = 0.00;
            }
            
            //$previous_invoice_balance = number_format( $pre_inv_acc_bal,2);
            if($previous_invoice_balance < 0.00){
                $total_payable_to_restaurant = ($total_owned_to_restaurant+$previous_invoice_balance);
            }else{
                $total_payable_to_restaurant = ($total_owned_to_restaurant);
            }
            
            if( isset($pre_inv_no) && !empty($pre_inv_no) ){
                $prev_inv_cont = '('.$pre_inv_no.' – '.$pre_inv_sent_date.')';
            }
            
            $rest_comm_order_per = $res_det['0']['res_com_per'];
		
		//Insert into Invoice table-------------------------------------------
		$sel_i = " SELECT restaurant_id FROM ".$CFG['table']['invoice']." WHERE restaurant_id = ".$inv_resid." AND inv_month_p_short = '".$invoicesetting."' AND inv_month = '".$inv_month."' AND inv_month_period = '".$inv_month_period."' ";
		$in_no_rows = $objSite->ExecuteQuery($sel_i,'norows');
        
		if($in_no_rows == 0){
				
			$sel_ins = 	"INSERT INTO 
                                  ".$CFG['table']['invoice']." 
                                SET 
            						invoice_gen_id			= '".$invoice_gen_no."',
            						restaurant_id 			= '".$inv_resid."',
                                    
                                    total_sales_cnt         = '".count($res_det_all)."',
                                    total_sales_cash_cnt    = '".$total_orders_cash."',
                                    total_sales_cc_cnt      = '".$total_orders_cc."',
                                    
                                    inv_month_p_short       = '".$invoicesetting."',
                                    inv_month               = '".$inv_month."',
                                    inv_month_period        = '".$inv_month_period."',
                                    inv_month_period_limit  = '".$inv_month_period_limit."',
                                    
                                    inv_ord_from			= '".$startdate."',
            						inv_ord_to				= '".$endeddate."',
                                    
            						total_sales				= '".$totalSales."',
            						total_sales_cash		= '".$totalSales_cash."',
            						total_sales_cc			= '".$totalSales_cc."',
                                    
                                    admin_fee_charge		= '".$admin_service_fee_charge."',
                                    comm_order_per			= '".$rest_comm_order_per."',
                                    comm_order_amt			= '".$totalCommission."',
                                    com_amt_admin_fee_charge= '".$net_amt_owned_site_admin."',
                                    uk_vat_per  			= '".$uk_vat_per."',
                                    uk_vat_amt  			= '".$uk_vat_cal."',
                                    net_amt_vat  			= '".$net_amt_vat."',
                                    total_owned_to_rest_amt = '".$total_owned_to_restaurant."',
                                    inv_acc_balance			= '".$total_payable_to_restaurant."',
                                    
                                    card_payment_fee		= '".$card_payment_fees."',
                                    card_fee                = '".$CFG['site']['site_cc_percentage']."',
                                    
                                    rejected_order_total_sales = '".$totalSales_reje_order."',
            						rejected_order_cnt 		= '".$res_det_reje_order."',
            						invoice_status 			= 'IS',
                                    payment_send_date       = '".$payment_send_date."',			
            						invoice_sent_date 		= NOW() ";
            
			$res_ins = $objSite->ExecuteQuery($sel_ins,'insert');
			
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
    			$res_zip1 		= $res_det['0']['res_zip'].', ';
    		}
    		if($res_det['0']['res_state'] != ''){
    			$res_state 		= '<div style="display:block; width:100%; font-family:Arial; font-size:13px; margin-bottom:8px;">'.$res_det['0']['res_state'].'</div>';
    			$res_state1 	= $res_det['0']['res_state'];
    		}
			
			//Restaurant Invoice Email/Pdf content
			include($CFG['site']['base_path']."/restaurantInvoicePDF_content.php");
			echo $html;
            #exit;
			
			
			$mailsubject  	= $CFG['site']['sitename']." Invoice: ".$invoice_gen_no;
			$mail_content 	= $html;
            
            $mail_attachment_name = $invoice_gen_no.'.pdf';
            
            $toemail        = 'manikandan.n@roamsoft.in';
            $toemail_res    = $res_det['0']['restaurant_contact_email'];
            #$mail_result = $objSite->sendMail($CFG['site']['sitename'],$CFG['site']['adminemail'],$toemail,$mailsubject,$mail_content,$mail_attachment_name,$mail_attachment_content='');
            #$mail_result = $objSite->sendMail($CFG['site']['sitename'],$CFG['site']['adminemail'],$tomail_sindhu,$mailsubject,$mail_content,$mail_attachment_name,$mail_attachment_content='');
			//$mail_result = $objSite->sendMail($CFG['site']['sitename'],$CFG['site']['adminemail'],$toemail_res,$mailsubject,$mail_content,$invoice_gen_no,$mail_content);
			/*
			if($mail_result){
				//Send InterFAx to Resturant Owner start--------------------------------------------------
		        $faxnumber = $res_det['0']['res_fax'];
		        $contactname = stripslashes($res_det['0']['res_name']);
                if(!empty($faxnumber) && $res_det['0']['restaurant_fax_option'] == 'Yes'){
                    
                    $fax_result = $objSite->sendInterFAX($contactname,$faxnumber,$mailsubject,$mail_content, 'cron');
    		        if($fax_result > 0){
    			        // fax submission succeeded
    			        echo 'Fax submitted successfully. Transaction ID: ' . $fax_result;
    			    } else {
    			        // fax submission failed
    			        echo 'Fax submission failed. Error message: <a href = "http://www.interfax.net/en/dev/webservice/reference/web-service-return-codes">' . $ret . '</a>';
    			        die();
    			    }
                }
		        
			    //Send InterFAx to Resturant Owner End--------------------------------------------------
				
				$cron_sno = $key11+1;
				echo $cron_sno.'-----'.$inv_resid.'-----'.stripslashes($res_det['0']['res_name']).'-----'.date("M Y",strtotime($inv_month)).'-----'.date("M d, Y",strtotime($startdate)).'------'.date("M d, Y",strtotime($endeddate)).'-----'.'success'."\n";
				
				
			}*/
		}//end if
		

#Invoice Process End--------------------------------------------------------
	}//end foreach
}//end if 



?>