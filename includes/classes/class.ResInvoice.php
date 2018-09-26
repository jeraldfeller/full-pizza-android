<?php

/**
 * ResInvoice
 * 
 * @package   
 * @author 
 * @copyright gencyolcu
 * @version 2014
 * @access public
 */
class ResInvoice extends Site
{


    /*------------------------------Invoice Start-----------------------------------*/
    /**
     * ResInvoice::inv_deli_order_list()
     * 
     * @return
     */
    function inv_deli_order_list()
    {
        global $CFG, $admin_smarty, $objSmarty;

        $invoicesetting = $CFG['site']['site_inv_setting'];

        $inv_resid      = $_GET['resid'];
        $invoice_gen_no = $_GET['invoiceno'];

        #Restaurant Details---------------------------------------
        $res_det = $this->restaurantDetailsInvoice($inv_resid);
        $admin_smarty->assign('res_det', $res_det);
        $objSmarty->assign('res_det', $res_det);
        #---------------------------------------------------------
        if (isset($invoice_gen_no) && !empty($invoice_gen_no))
        {

            $sel_inv = " SELECT total_sales_cnt, total_sales_cash_cnt, total_sales_cc_cnt, total_sales, total_sales_cash, total_sales_cc, admin_fee_charge, comm_order_per, comm_order_amt, com_amt_admin_fee_charge, uk_vat_per, uk_vat_amt, net_amt_vat, total_owned_to_rest_amt, pre_inv_acc_balance, inv_acc_balance, card_payment_fee, online_merchant_service, admin_charge, joining_fee, livelink_terminal, card_fee, rejected_order_total_sales, rejected_order_cnt, inv_month, inv_month_p_short, inv_month_period, inv_ord_from, inv_ord_to, inv_acc_balance, payment_send_date, invoice_sent_date FROM " .
                $CFG['table']['invoice'] . " WHERE invoice_gen_id = '" . $invoice_gen_no .
                "' ORDER BY invoice_id DESC ";
            $res_inv = $this->ExecuteQuery($sel_inv, 'select');
            
            $invoice_monthly_2 = $res_inv['0']['inv_month'];
            $invoice_period_2 = $res_inv['0']['inv_month_period'];

            #invoice Sent date
            $invoice_sent_date = date("d M Y", strtotime($res_inv['0']['invoice_sent_date']));
            #Payment will be send date
            $payment_send_date = date("d M Y", strtotime($res_inv['0']['payment_send_date']));

            $startdate = $res_inv['0']['inv_ord_from'];
            $endeddate = $res_inv['0']['inv_ord_to'];

            #Prev invoice
            $sel_inv_pre1 = " SELECT invoice_gen_id, pre_inv_acc_balance, inv_acc_balance, invoice_sent_date ".
                            " FROM ".$CFG['table']['invoice'].
                            " WHERE restaurant_id = '".$inv_resid."' AND invoice_gen_id = '" . $invoice_gen_no ."' ORDER BY invoice_id DESC LIMIT 1 ";

            $sel_inv_pre = $this->ExecuteQuery($sel_inv_pre1, 'select');

            #Prev invoice
            $pre_inv_no = $sel_inv_pre['0']['invoice_gen_id'];
            $pre_inv_acc_bal = $sel_inv_pre['0']['inv_acc_balance'];
            $pre_inv_sent_date = date("d M Y", strtotime($sel_inv_pre['0']['invoice_sent_date']));

            if (isset($pre_inv_no) && !empty($pre_inv_no))
            {
                $prev_inv_cont = '(' . $pre_inv_no . ' – ' . $pre_inv_sent_date . ')';
            }

            $inv_for_period = date("d M Y", strtotime($startdate)). ' to '.date("d M Y",strtotime($endeddate));
            $inv_period     = date("d M Y", strtotime($startdate)). ' to '.date("d M Y",strtotime($endeddate));

            $endeddate_cond = date('Y-m-d', strtotime($endeddate . ' + 1 days'));
            $invoice_cond   = " AND res_order_delivereddate BETWEEN '".$startdate."' AND '".$endeddate_cond."' ";

            //Total Orders--------------------------------------
            list($res_det_all, $totalSales, $totalCommission, $order_summary) = $this->get_all_orders($inv_resid, $invoice_cond);
            $total_orders = count($res_det_all);
            
            #Invoice Process
            $total_orders                = $res_inv['0']['total_sales_cnt'];
            $total_orders_cash           = $res_inv['0']['total_sales_cash_cnt'];
            $total_orders_cc             = $res_inv['0']['total_sales_cc_cnt'];

            $totalSales                  = $res_inv['0']['total_sales'];
            $totalSales_cash             = $res_inv['0']['total_sales_cash'];
            $totalSales_cc               = $res_inv['0']['total_sales_cc'];

            $admin_service_fee_charge    = $res_inv['0']['admin_fee_charge'];
            $rest_comm_order_per         = $res_inv['0']['comm_order_per'];
            $totalCommission             = $res_inv['0']['comm_order_amt'];
            $net_amt_owned_site_admin    = $res_inv['0']['com_amt_admin_fee_charge'];
            $uk_vat_per                  = $res_inv['0']['uk_vat_per'];
            $uk_vat_cal                  = $res_inv['0']['uk_vat_amt'];
            $net_amt_vat                 = $res_inv['0']['net_amt_vat'];
            $Invoice_total               = $res_inv['0']['net_amt_vat'];
            $total_owned_to_restaurant   = $res_inv['0']['total_owned_to_rest_amt'];
            $previous_invoice_balance    = $res_inv['0']['pre_inv_acc_balance'];
            $total_payable_to_restaurant = $res_inv['0']['inv_acc_balance'];
            $card_payment_fees           = $res_inv['0']['card_payment_fee'];
            $card_fee                    = $res_inv['0']['card_fee'];
            $rejected_order_total_sales  = $res_inv['0']['rejected_order_total_sales'];
            $rejected_order_cnt          = $res_inv['0']['rejected_order_cnt'];
            $totalCommWithCardFee        = $totalCommission + $card_payment_fees;

        } else
        {
            if (isset($_POST['invoice_monthly_4t_tm']) && !empty($_POST['invoice_monthly_4t_tm']))
            {
                $inv_month_period = $_POST['invoice_monthly_4t_tm'];
            } elseif (isset($_POST['invoice_monthly_twice_tm']) && !empty($_POST['invoice_monthly_twice_tm']))
            {
                $inv_month_period = $_POST['invoice_monthly_twice_tm'];
            } else
            {
                $inv_month_period = $_POST['invoice_monthly_once'];
            }

            $getnuminv_validate = $this->getNumvalues($CFG['table']['invoice'],"restaurant_id = '" . $inv_resid . "' AND inv_month = '" . $_POST['invoice_monthly'] ."' AND inv_month_p_short = '" . $_POST['res_invoice_setting'] ."' AND inv_month_period = '" . $inv_month_period . "' ");
            
            $admin_smarty->assign('getnuminv_validate', $getnuminv_validate);

            #Invoice No---------------------------------------
            $sel_inv_no = " SELECT invoice_gen_id FROM " . $CFG['table']['invoice'] ." WHERE restaurant_id = '" . $inv_resid . "' ORDER BY invoice_id DESC ";
            $res_inv_no = $this->ExecuteQuery($sel_inv_no, 'select');

            if (!empty($res_inv_no))
            {
                list($inv_prefix, $inv_newcode) = explode('CP' . $inv_resid . '_', $res_inv_no['0']['invoice_gen_id']);
                $invoice_gen_no = 'CP' . $inv_resid . '_' . $this->generateId($inv_newcode + 1);
            } else
            {
                $invoice_gen_no = 'CP' . $inv_resid . '_1001';
            }

            $currentinvoicesetting = $_POST['res_invoice_setting'];

            #Monthly Once
            $invoice_monthly = $_POST['invoice_monthly'];
            #Monthly Twice
            $invoice_period_2 = $_POST['invoice_monthly_twice_tm'];
            #Monthly Four
            $invoice_period_4 = $_POST['invoice_monthly_4t_tm'];

            #invoice Sent date
            $invoice_sent_date = date("d M Y");
            #Payment will be send date
            $payment_send_date = date("Y-m-d", strtotime("+1 week"));

            if ($currentinvoicesetting == 'm2')
            {
                if ($invoice_period_2 == '1')
                {
                    $ss_date = '01';
                    $ee_date = '15';
                } elseif ($invoice_period_2 == '16')
                {
                    $ss_date = '16';
                    $ee_date = date('t', strtotime(date('Y-m-d')));
                }
            } elseif ($currentinvoicesetting == 'm4')
            {
                if ($invoice_period_4 == '15')
                {
                    $ss_date = '15';
                    $ee_date = '21';
                } elseif ($invoice_period_4 == '8')
                {
                    $ss_date = '08';
                    $ee_date = '14';
                } elseif ($invoice_period_4 == '1')
                {
                    $ss_date = '01';
                    $ee_date = '07';
                } else
                {
                    $ss_date = '22';
                    $ee_date = date('t', strtotime(date('Y-m-d')));
                }
            } elseif ($currentinvoicesetting == 'm1')
            {
                $ss_date = '01';
                $ee_date = date('t', strtotime(date('Y-m-d')));
            }
            $inv_month_period_limit = $ss_date . '-' . $ee_date;
            $startdate = $invoice_monthly . '-' . $ss_date;
            $endeddate = $invoice_monthly . '-' . $ee_date;

            #Prev invoice
            $sel_inv_pre = $this->getMultiValue("invoice_gen_id, pre_inv_acc_balance, inv_acc_balance, invoice_sent_date",$CFG['table']['invoice'], " restaurant_id = '".$inv_resid."' ORDER BY invoice_id DESC LIMIT 1 ");

            #Prev invoice
            $pre_inv_no        = $sel_inv_pre['0']['invoice_gen_id'];
            $pre_inv_acc_bal   = $sel_inv_pre['0']['inv_acc_balance'];
            $pre_inv_sent_date = date("d.m.Y", strtotime($sel_inv_pre['0']['invoice_sent_date']));

            $inv_for_period = date("d M Y", strtotime($startdate)) . ' to '.date("d M Y",strtotime($endeddate));
            $inv_period = date("d M Y", strtotime($startdate)) . ' to '.date("d M Y",strtotime($endeddate));

            $endeddate_cond = date('Y-m-d', strtotime($endeddate . ' + 1 days'));
            $invoice_cond = " AND res_order_delivereddate BETWEEN '" . $startdate ."' AND '" . $endeddate_cond . "' ";

            //Total Orders--------------------------------------
            list($res_det_all, $totalSales, $totalCommission, $order_summary) = $this->get_all_orders($inv_resid, $invoice_cond);
            $total_orders = count($res_det_all);
            echo $res_det_all;
            //Cash----------------------------------------------
            list($totalSales_cash, $cash_orders_history, $total_orders_cash) = $this->
                get_all_orders_cod($inv_resid, $invoice_cond);

            //CC-----------------------------------------------
            list($totalSales_cc, $cc_orders_history, $total_orders_cc, $onlinepaymentfee_cc) =
                $this->get_all_orders_cc($inv_resid, $invoice_cond);

            #Admin service fee charge---------------------------
            $card_payment_fees = $onlinepaymentfee_cc;
            
            #Join fee-------------------------------------------
            $get_num_invoice = $this->getNumValues($CFG['table']['invoice']," restaurant_id = '" . $inv_resid . "' ");

            if ($get_num_invoice < $res_det['0']['site_rest_noofinstall'])
            {
                $site_remaining_join_fee = ($res_det['0']['site_rest_remain_join_fee'] /
                    $res_det['0']['site_rest_noofinstall']);
            } else
            {
                $site_remaining_join_fee = number_format(0.00, 2);
            }

            $admin_service_fee_charge = ($card_payment_fees + $site_om_service +
                $site_admin_charge + $site_remaining_join_fee + $site_terminal_fees);

            $net_amt_owned_site_admin = $totalCommission + $admin_service_fee_charge;

            #UK VAT--------------------------------------------
            $uk_vat_per = $CFG['site']['site_vat_percentage'];
            $uk_vat_cal = ($net_amt_owned_site_admin * ($CFG['site']['site_vat_percentage'] /100));

            $net_amt_vat = ($net_amt_owned_site_admin + $uk_vat_cal);
            $total_owned_to_restaurant = ($totalSales_cc - $net_amt_vat);

            #Invoice total
            $Invoice_total = ($admin_service_fee_charge + $totalCommission + $uk_vat_cal);
            #previous invoice balance
            if ($pre_inv_acc_bal < 0)
            {
                $previous_invoice_balance = $pre_inv_acc_bal;
            } else
            {
                $previous_invoice_balance = number_format(0.00, 2);
            }
            if ($previous_invoice_balance < 0)
            {
                $total_payable_to_restaurant = ($total_owned_to_restaurant + $previous_invoice_balance);
            } else
            {
                $total_payable_to_restaurant = $total_owned_to_restaurant;
            }

            if (isset($pre_inv_no) && !empty($pre_inv_no))
            {
                $prev_inv_cont = '(' . $pre_inv_no . ' – ' . $pre_inv_sent_date . ')';
            }

            $rest_comm_order_per = $res_det['0']['res_com_per'];

        } //end for else
        # Assign  ------------------------------------------------
        $admin_smarty->assign('invoice_sent_date', $invoice_sent_date);
        $admin_smarty->assign('payment_send_date', $payment_send_date);

        $admin_smarty->assign('inv_deli_order', $res_det_all);
        $admin_smarty->assign('total_orders', $total_orders);
        $admin_smarty->assign('sub_totalSales', $sub_totalSales);
        $admin_smarty->assign('totalSales_tax', number_format($totalSales_tax, 2));
        $admin_smarty->assign('totalSales_tip', number_format($totalSales_tip, 2));
        $admin_smarty->assign('totalSales', number_format($totalSales, 2));        
        $admin_smarty->assign('totalCommission', $totalCommission);
        $admin_smarty->assign('res_popular_charge', number_format($res_popular_charge, 2));
        $admin_smarty->assign('todays_special_fee', number_format($todays_special_fee, 2));
        $admin_smarty->assign('rest_comm_order_per', $rest_comm_order_per);
        $admin_smarty->assign('totalCommWithCardFee', $totalCommWithCardFee);
        $admin_smarty->assign('bookedCount', $bookedCount);
        $admin_smarty->assign('bookedCommAmount', $bookedCommAmount);
        $admin_smarty->assign('bookTableFee', $bookTableFee);

        //Cash----------------------------------------------------
        $admin_smarty->assign('totalSales_cash', number_format($totalSales_cash, 2));
        $admin_smarty->assign('total_orders_cash', $total_orders_cash);

        //CC-----------------------------------------------------
        $admin_smarty->assign('totalSales_cc', number_format($totalSales_cc, 2));
        $admin_smarty->assign('total_orders_cc', $total_orders_cc);

        //Credit Card Fee----------------------------------------
        $admin_smarty->assign('payment_card', number_format($payment_card, 2));
        $admin_smarty->assign('credit_card_fee', number_format($credit_card_fee, 2));

        #admin service fee charge--------------------------------
        $admin_smarty->assign('card_payment_fees', $card_payment_fees);
        $admin_smarty->assign('uk_vat_per', $uk_vat_per);
        $admin_smarty->assign('uk_vat_cal', $uk_vat_cal);

        $admin_smarty->assign('site_om_service', $site_om_service);
        $admin_smarty->assign('site_admin_charge', $site_admin_charge);
        $admin_smarty->assign('site_remaining_join_fee', $site_remaining_join_fee);
        $admin_smarty->assign('site_terminal_fees', $site_terminal_fees);
        $admin_smarty->assign('Invoice_total', $Invoice_total);

        $admin_smarty->assign('admin_service_fee_charge', $admin_service_fee_charge);

        $admin_smarty->assign('net_amt_owned_site_admin', $net_amt_owned_site_admin);
        $admin_smarty->assign('net_amt_vat', $net_amt_vat);
        $admin_smarty->assign('total_owned_to_restaurant', $total_owned_to_restaurant);
        $admin_smarty->assign('previous_invoice_balance', $previous_invoice_balance);
        $admin_smarty->assign('total_payable_to_restaurant', $total_payable_to_restaurant);

        #previous Acc Balance
        $admin_smarty->assign('prev_inv_cont', $prev_inv_cont);
        $admin_smarty->assign('pre_inv_acc_bal', $pre_inv_acc_bal);

        #period
        $admin_smarty->assign('inv_for_period', $inv_for_period);
        $admin_smarty->assign('inv_period', $inv_period);
        $admin_smarty->assign('inv_month_period_limit', $inv_month_period_limit);
        $admin_smarty->assign('inv_monthly', $invoice_monthly);

        $admin_smarty->assign('invoice_gen_no', $invoice_gen_no);

        $admin_smarty->assign('endeddate', $endeddate);
        #------------------------------------------------------------#
        #For Restaurant Owner My Account Side View
        $objSmarty->assign('invoice_sent_date', $invoice_sent_date);
        $objSmarty->assign('payment_send_date', $payment_send_date);

        $objSmarty->assign('inv_deli_order', $res_det_all);
        $objSmarty->assign('total_orders', $total_orders);
        $objSmarty->assign('sub_totalSales', number_format($sub_totalSales, 2));
        $objSmarty->assign('totalSales_tax', number_format($totalSales_tax, 2));
        $objSmarty->assign('totalSales_tip', number_format($totalSales_tip, 2));
        $objSmarty->assign('totalSales', number_format($totalSales, 2));
        $objSmarty->assign('totalCommission', $totalCommission);
        $objSmarty->assign('res_popular_charge', number_format($res_popular_charge, 2));
        $objSmarty->assign('todays_special_fee', number_format($todays_special_fee, 2));
        $objSmarty->assign('rest_comm_order_per', $rest_comm_order_per);

        //Cash----------------------------------------------------
        $objSmarty->assign('totalSales_cash', number_format($totalSales_cash, 2));
        $objSmarty->assign('total_orders_cash', $total_orders_cash);

        //CC-----------------------------------------------------
        $objSmarty->assign('totalSales_cc', number_format($totalSales_cc, 2));
        $objSmarty->assign('total_orders_cc', $total_orders_cc);

        //Credit Card Fee----------------------------------------
        $objSmarty->assign('payment_card', number_format($payment_card, 2));
        $objSmarty->assign('credit_card_fee', number_format($credit_card_fee, 2));

        #admin service fee charge--------------------------------
        $objSmarty->assign('card_payment_fees', $card_payment_fees);
        $objSmarty->assign('uk_vat_per', $uk_vat_per);
        $objSmarty->assign('uk_vat_cal', $uk_vat_cal);

        $objSmarty->assign('site_om_service', $site_om_service);
        $objSmarty->assign('site_admin_charge', $site_admin_charge);
        $objSmarty->assign('site_remaining_join_fee', $site_remaining_join_fee);
        $objSmarty->assign('site_terminal_fees', $site_terminal_fees);
        $objSmarty->assign('Invoice_total', $Invoice_total);
        
        #------------admin Booked Table Fee----------------------
        $admin_smarty->assign('bookedCount', $bookedCount);
        $admin_smarty->assign('bookedCommAmount', $bookedCommAmount);
        $admin_smarty->assign('bookTableFee', $bookTableFee);

        $objSmarty->assign('admin_service_fee_charge', $admin_service_fee_charge);

        $objSmarty->assign('net_amt_owned_site_admin', $net_amt_owned_site_admin);
        $objSmarty->assign('net_amt_vat', $net_amt_vat);
        $objSmarty->assign('total_owned_to_restaurant', $total_owned_to_restaurant);
        $objSmarty->assign('previous_invoice_balance', $previous_invoice_balance);
        $objSmarty->assign('total_payable_to_restaurant', $total_payable_to_restaurant);

        #previous Acc Balance
        $objSmarty->assign('prev_inv_cont', $prev_inv_cont);
        $objSmarty->assign('pre_inv_acc_bal', $pre_inv_acc_bal);

        #period
        $objSmarty->assign('inv_for_period', $inv_for_period);
        $objSmarty->assign('inv_period', $inv_period);
        $objSmarty->assign('inv_month_period_limit', $inv_month_period_limit);
        $objSmarty->assign('inv_monthly', $invoice_monthly);

        $objSmarty->assign('invoice_gen_no', $invoice_gen_no);

        $objSmarty->assign('endeddate', $endeddate);
        #------------------------------------------------------------#

        #Send Invoice Mail to Restaurant-----------------------------#
        if (isset($_POST['subm']) && !empty($_POST['subm']) && ($_POST['subm'] ==
            'sent_invoice_restaurant'))
        {
            if ($_POST['res_invoice_setting'] == 'w1')
            {

                $inv_month = $_POST['invoice_weekly'];
            } elseif ($_POST['res_invoice_setting'] == 'm1')
            {

                $inv_month = $_POST['invoice_monthly'];
                $inv_month_period = $_POST['invoice_monthly_once'];
            } elseif ($_POST['res_invoice_setting'] == 'm2')
            {

                $inv_month = $_POST['invoice_monthly'];
                $inv_month_period = $_POST['invoice_monthly_twice_tm'];
            } elseif ($_POST['res_invoice_setting'] == 'm4')
            {

                $inv_month = $_POST['invoice_monthly'];
                $inv_month_period = $_POST['invoice_monthly_4t_tm'];
            }

            $sel_ins = "INSERT INTO 
                                    " . $CFG['table']['invoice'] . " 
                                SET 
            						invoice_gen_id			= '" . $invoice_gen_no . "',
            						restaurant_id 			= '" . $inv_resid . "',
                                    
            						inv_month_p_short       = '" . $invoicesetting . "',
            						inv_month				= '" . $inv_month . "',
            						inv_month_period		= '" . $inv_month_period . "',
            						inv_month_period_limit	= '" . $inv_month_period_limit . "',
                                    
            						inv_ord_from			= '" . $startdate . "',
            						inv_ord_to				= '" . $endeddate . "',
                                    
                                    total_sales_cnt         = '" . count($res_det_all) ."',
                                    total_sales_cash_cnt    = '" . $total_orders_cash ."',
                                    total_sales_cc_cnt      = '" . $total_orders_cc ."',
                                    
            						total_sales				= '" . number_format($totalSales, 2) . "',
            						total_sales_cash		= '" . number_format($totalSales_cash, 2) ."',
            						total_sales_cc			= '" . number_format($totalSales_cc, 2) . "',
                                    
                                    admin_fee_charge		= '" . $admin_service_fee_charge ."',
                                    comm_order_per			= '" . $rest_comm_order_per ."',
                                    comm_order_amt			= '" . $totalCommission ."',
                                    table_booked_count		= '" . $bookedCount ."',
                                   	booked_comm_amount		= '" . $bookedCommAmount ."',
                                    com_amt_admin_fee_charge= '" . $net_amt_owned_site_admin ."',
                                    uk_vat_per  			= '" . $uk_vat_per . "',
                                    uk_vat_amt  			= '" . $uk_vat_cal . "',
                                    net_amt_vat  			= '" . $net_amt_vat . "',
                                    total_owned_to_rest_amt = '" . $total_owned_to_restaurant ."',
                                    pre_inv_acc_balance		= '" . $previous_invoice_balance ."',
                                    inv_acc_balance			= '" . $total_payable_to_restaurant ."',
                                    
                                    card_payment_fee		= '" . $card_payment_fees ."',
                                    card_fee                = '" . $CFG['site']['site_cc_percentage'] ."',
                                    
                                    rejected_order_total_sales = '" .number_format($totalSales_reje_order, 2) . "',
            						rejected_order_cnt 		= '" . $res_det_reje_order . "',
            						invoice_status 			= 'IS',	
                                    payment_send_date       = '" . $payment_send_date ."',				
            						invoice_sent_date 		= NOW() ";
           
            $res_ins = $this->ExecuteQuery($sel_ins, 'insert');

            if ($res_ins)
            {
                if ($res_det['0']['res_st_address'] != '')
                {
                    $res_st_address = '<div style="float:left;width:100%;">' . $res_det['0']['res_st_address'] .'</div>';
                    $res_st_address1 = $res_det['0']['res_st_address'] . ', ';
                }
                if ($res_det['0']['res_city'] != '')
                {
                    $res_city = '<div style="float:left;width:100%;">' . $res_det['0']['res_city'] .'</div>';
                    $res_city1 = $res_det['0']['res_city'] . ', ';
                }
                if ($res_det['0']['res_zip'] != '')
                {
                    $res_zip1 = $res_det['0']['res_zip'] . ', ';
                }
                if ($res_det['0']['res_state'] != '')
                {
                    $res_state = '<div style="float:left;width:100%;">' . $res_det['0']['res_state'] .'</div>';
                    $res_state1 = $res_det['0']['res_state'];
                }

                #mail start-----------------------------------------------------
                $toemail = $res_det['0']['restaurant_contact_email'];
                $mailsubject = $CFG['site']['sitename'] . " Invoice: " . $invoice_gen_no;

                include ($CFG['site']['base_path'] . "/includes/mpdf/mpdf.php");
                //==============================================================
                //Restaurant Invoice Email/Pdf content
                include ($CFG['site']['base_path'] . "/restaurantInvoicePDF_content.php");
                $mail_content = $html;
                //$filename = "test.pdf";
                $mail_attachment_name = $invoice_gen_no . '.pdf';
                //==============================================================
                
                $mail_result = $this->sendMail($CFG['site']['sitename'], $CFG['site']['adminemail'],
                    $toemail, $mailsubject, $mail_content, $mail_attachment_name, $mail_attachment_content =
                    '');
                
                #mail end-------------------------------------------------------
                $this->redirectUrl('restaurantInvoice.php?resid=' . $inv_resid . '&invoiceno=' .
                    $invoice_gen_no);
            }
        }
    }
    #---------------------------------------------------------------------------------#
    /**
     * ResInvoice::restaurantDetailsInvoice()
     * 
     * @param mixed $inv_resid
     * @return
     */
    function restaurantDetailsInvoice($inv_resid)
    {
        global $CFG, $admin_smarty;

        #Restaurant Details-----------------------------------------------------------#
        $sql_sel = "SELECT rs.restaurant_id, rs.restaurant_name AS res_name, rs.restaurant_fax AS res_fax, rs.restaurant_contact_email, rs.restaurant_streetaddress AS res_st_address, rs.restaurant_commission AS res_com_per, rs.restaurant_inv_setting AS res_invoice_setting , rs.res_ac_no, rs.send_fax_option, rs.restaurant_city AS res_city, rs.restaurant_zip AS res_zip,rs.restaurant_state AS res_state, " .
            " ci.cityname AS res_city," . 
            " st.statename AS res_state" . " FROM " . $CFG['table']['restaurant'] .
            " AS rs " . " LEFT JOIN " . $CFG['table']['city'] .
            " AS ci ON rs.restaurant_city = ci.city_id " .
            " LEFT JOIN " . $CFG['table']['state'] .
            " AS st ON rs.restaurant_state = st.statecode " .
            " WHERE rs.restaurant_id IS NOT NULL AND rs.restaurant_id = '" . $inv_resid .
            "' ";
        #echo $sql_sel;
        $res_det = $this->ExecuteQuery($sql_sel, 'select');
        #echo "<pre>";print_r($res_det);echo "</pre>";
        $res_det['0']['restaurant_generate_id'] = $this->generateId($res_det['0']['restaurant_id']);

        $cardsplit = substr($res_det['0']['res_ac_no'], -4, 4);
        $res_det['0']['res_ac_no'] = str_pad($cardsplit, strlen($res_det['0']['res_ac_no']),"X", STR_PAD_LEFT);

        return $res_det;
    }
    #-------------------------------------------------------------------------------#
    //Select all orders
    /**
     * ResInvoice::get_all_orders()
     * 
     * @param mixed $inv_resid
     * @param mixed $invoice_cond
     * @return
     */
    function get_all_orders($inv_resid, $invoice_cond)
    {
        global $CFG, $admin_smarty;
        
        #Total Orders--------------------------------------------------------------#
        $sql_sel_all = " SELECT ro.orderid, ro.ordergenerateid, ro.deliverydate, ro.orderdate AS delivery_date, ro.payment_type, ro.deliverytype, ro.taxamount, ro.offeramount, ro.deliveryamount, ro.ordersubtotal, ro.ordertotalprice, ro.res_comm_perchantage, ro.res_comm_price, ro.cardpaymentper, ro.cardpaymentfees, rs.restaurant_commission, ro.orderdate " .
            " FROM " . $CFG['table']['order'] . " AS ro " .
            " LEFT JOIN " . $CFG['table']['restaurant'] ." AS rs ON ro.restaurant_id = rs.restaurant_id " .
            " WHERE ro.restaurant_id IS NOT NULL AND ro.payment_type !='' AND ro.deliverytype !='' AND ro.ordersubtotal !='0.00' AND ro.restaurant_id = '" .
            $inv_resid . "' AND ro.status='completed' AND ro.orderdate != '0000-00-00 00:00:00' " .
            $invoice_cond . "  ORDER BY ro.orderid ASC ";
        #echo $sql_sel_all;
        $res_det_all = $this->ExecuteQuery($sql_sel_all, 'select');
        #echo "<pre>";print_r($res_det_all);echo "</pre>";
        if (count($res_det_all) > 0)
        {
            foreach ($res_det_all as $key => $value)
            {
                //total items in order
                $res_det_all[$key]['total_items'] = $this->getNumvalues($CFG['table']['restaurant_cart'], " orderid = '" . $res_det_all[$key]['orderid'] . "' ");

                if ($res_det_all[$key]['restaurant_commission'] == '')
                {
                    $res_det_all[$key]['res_com_per'] = '0';
                }else{
                    $res_det_all[$key]['res_com_per'] = $res_det_all[$key]['restaurant_commission'];
                }
                //For email and Pdf start------------------

                //Payment method
                if ($res_det_all[$key]['payment_type'] == 'cod')
                {
                    $res_det_all[$key]['order_payment_type'] = 'Cash';
                } elseif ($res_det_all[$key]['payment_type'] == 'authorizenet')
                {
                    $res_det_all[$key]['order_payment_type'] = 'Authorize.net';
                } elseif ($res_det_all[$key]['payment_type'] == 'creditcard' )
                {
                    $res_det_all[$key]['order_payment_type'] = 'Credit Card';

                    if ($res_det_all[$key]['cardpaymentper'] != '')
                    {
                        $res_det_all[$key]['cred_card_fee'] = ' (' .$CFG['site']['currency'].' '.$res_det_all[$key]['cardpaymentfees']. '[' .$CFG['site']['site_cc_percentage'] .'%])';
                    }
                } elseif ($res_det_all[$key]['payment_type'] == 'paypal')
                {
                    $res_det_all[$key]['order_payment_type'] = 'Paypal';

                    if ($res_det_all[$key]['cardpaymentper'] != '')
                    {
                        $res_det_all[$key]['cred_card_fee'] = ' (' .$CFG['site']['currency'].' '.$res_det_all[$key]['cardpaymentfees']. '[' .$CFG['site']['site_cc_percentage'] .'%])';
                    }
                } else
                {
                    $res_det_all[$key]['order_payment_type'] = $res_det_all[$key]['payment_type'];
                }
                $sno = $key + 1;

                $order_summary .= '
                    <tr>
                        <td style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">' .
                    $sno . '</td>
                        <td style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">' .
                    date("d M Y", strtotime($res_det_all[$key]['orderdate'])) . '</td>
					   <td style="text-align:left;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">' .
                    $res_det_all[$key]['ordergenerateid'] . $res_det_all[$key]['cred_card_fee'] .
                    ' </td>
						<td style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">' . $res_det_all[$key]['order_payment_type'] . '</td>
                        <td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">' . $CFG['site']['currency'] . ' ' . number_format($res_det_all[$key]['ordersubtotal'], 2) . '</td>
                        <td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">' . $CFG['site']['currency'] . ' ' . number_format($res_det_all[$key]['deliveryamount'], 2) . '</td>
                        <td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">' . $CFG['site']['currency'] . ' ' . number_format($res_det_all[$key]['taxamount'], 2) . '</td>
                        <td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">' . $CFG['site']['currency'] . ' ' . number_format($res_det_all[$key]['offeramount'], 2) . '</td>
						<td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">' . $CFG['site']['currency'] . ' ' . number_format($res_det_all[$key]['ordertotalprice'], 2) . '</td>
						<td style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff1dc;" valign="top">' . $CFG['site']['currency'] . ' ' . number_format($res_det_all[$key]['res_comm_price'], 2) .'('.$res_det_all[$key]['res_comm_perchantage'].'%)'. '</td>
                        
					</tr>';
                //For email and Pdf end------------------
                //}

                $rowTotalordertotal[] = $res_det_all[$key]['ordertotalprice'];
                $rowTotalres_comm_price[] = $res_det_all[$key]['res_comm_price'];
            }

            if (!empty($rowTotalordertotal) && is_array($rowTotalordertotal))
            {

                $totalSales = array_sum($rowTotalordertotal);
            }
            if (!empty($rowTotalres_comm_price) && is_array($rowTotalres_comm_price))
            {

                $totalCommission = array_sum($rowTotalres_comm_price);
            }
        }
        
        return array(
            $res_det_all,
            $totalSales,
            $totalCommission,
            $order_summary);
    }
    #------------------------------------------------------------------------------#
    //Select all cod orders
    /**
     * ResInvoice::get_all_orders_cod()
     * 
     * @param mixed $inv_resid
     * @param mixed $invoice_cond
     * @return
     */
    function get_all_orders_cod($inv_resid, $invoice_cond)
    {
        global $CFG, $admin_smarty;

        $sql_sel_cash = " SELECT ro.deliveryamount, ro.ordersubtotal, ro.ordertotalprice " .
            " FROM " . $CFG['table']['order'] . " AS ro " .
            " WHERE ro.restaurant_id IS NOT NULL AND ro.payment_type !='' AND ro.deliverytype !='' AND ro.ordersubtotal !='0.00'  AND ro.restaurant_id = '" .
            $inv_resid . "' AND ro.status='completed' AND ro.orderdate != '0000-00-00 00:00:00' AND (ro.payment_type ='cod' OR ro.payment_type ='cashwithcollegeid') " .
            $invoice_cond . " ORDER BY ro.ordergenerateid ASC ";
        #echo $sql_sel_cash;
        $res_det_cash = $this->ExecuteQuery($sql_sel_cash, 'select');
        if (count($res_det_cash) > 0)
        {
            foreach ($res_det_cash as $key => $value)
            {
                $subtotal_cash[] = $res_det_cash[$key]['ordertotalprice'];
            }
            if (!empty($subtotal_cash) && is_array($subtotal_cash))
            {
                $totalSales_cash = array_sum($subtotal_cash);
            }
        }
        //if(	isset($_POST['subm']) && !empty($_POST['subm']) && ($_POST['subm'] == 'sent_invoice_restaurant') ){
        //For email and Pdf start------------------
        if ($totalSales_cash != '0.00' && !empty($totalSales_cash))
        {
            $cash_orders_history = '
                <div style="float:left; width:100%;margin-right:0%;">
					<div style="float:left; width: 65%; font-weight: bold;">Total Sales: Cash</div>
					<div style="float:left; width: 10%; margin-right:2%;">=</div>
					<div style="float:right; width: 20%; font-weight: bold;">' . $CFG['site']['currency'] .
                number_format($totalSales_cash, 2) . '</div>
				</div>';
        }
        //For email and Pdf end------------------
        //	}

        return array(
            $totalSales_cash,
            $cash_orders_history,
            count($res_det_cash));
    }
    #-------------------------------------------------------------------------------------#
    //Select all cc orders
    /**
     * ResInvoice::get_all_orders_cc()
     * 
     * @param mixed $inv_resid
     * @param mixed $invoice_cond
     * @return
     */
    function get_all_orders_cc($inv_resid, $invoice_cond)
    {
        global $CFG, $admin_smarty;

        //CC-----------------------------------------------
        $sql_sel_cc = " SELECT ro.deliveryamount, ro.ordersubtotal, ro.ordertotalprice, ro.cardpaymentfees, ro.cardpaymentper " .
            " FROM " . $CFG['table']['order'] . " AS ro " .
            " WHERE ro.restaurant_id IS NOT NULL AND ro.payment_type !='' AND ro.deliverytype !='' AND ro.ordersubtotal !='0.00'  AND ro.restaurant_id = '" .
            $inv_resid . "' AND ro.status='completed' AND ro.orderdate != '0000-00-00'  AND (ro.payment_type ='creditcard' OR ro.payment_type ='paypal' OR ro.payment_type ='authorizenet') " .
            $invoice_cond . " ORDER BY ro.ordergenerateid ASC ";
  
        $res_det_cc = $this->ExecuteQuery($sql_sel_cc, 'select');
        if (count($res_det_cc) > 0)
        {

            foreach ($res_det_cc as $key => $value)
            {
                $onlinepaymentfee_arr_cc[] = $res_det_cc[$key]['cardpaymentfees'];
                $finaltotal_cc[] = $res_det_cc[$key]['ordertotalprice'];
            }
            if (!empty($onlinepaymentfee_arr_cc) && is_array($onlinepaymentfee_arr_cc))
            {
                $onlinepaymentfee_cc = array_sum($onlinepaymentfee_arr_cc);
            }
            if (!empty($finaltotal_cc) && is_array($finaltotal_cc))
            {
                $totalSales_cc = array_sum($finaltotal_cc);
            }
        }
        
        //For email and Pdf start------------------
        if ($totalSales_cc != '0.00' && !empty($totalSales_cc))
        {
            $cc_orders_history = '<div style="float:left; width:100%;margin-right:0%;">
					<div style="float:left; width: 65%; font-weight: bold;">Total Sales: Credit / Debit Card</div>
					<div style="float:left; width: 10%; margin-right:2%;">=</div>
					<div style="float:right; width: 20%; font-weight: bold;">' . $CFG['site']['currency'] .
                number_format($totalSales_cc, 2) . '</div>
				</div>';
        }
        //For email and Pdf end------------------

        return array(
            $totalSales_cc,
            $cc_orders_history,
            count($res_det_cc),
            $onlinepaymentfee_cc);
    }
    #----------------------------------------------------------------------------------------#
    /**
     * ResInvoice::get_weekly_start_end_date()
     * 
     * @return
     */
    function get_weekly_start_end_date()
    {
        global $CFG, $admin_smarty;

        //date("d-m-Y", strtotime("+14 days"));

        return array(
            $pre_start_date,
            $start_date,
            $start_date,
            $end_date,
            $date_pop_count);
    }
    #----------------------------------------------------------------------------------------#
    //select all rejected orders
    /**
     * ResInvoice::get_all_orders_rejected()
     * 
     * @param mixed $inv_resid
     * @param mixed $invoice_cond
     * @return
     */
    function get_all_orders_rejected($inv_resid, $invoice_cond)
    {
        global $CFG, $admin_smarty;

        $sql_sel_reje_order =
            "SELECT ro.delivery_charge, ro.ordersubtotal, ro.ordertotalprice " . 
            " FROM " .$CFG['table']['order'] . " AS ro " .
            " WHERE ro.restaurant_id IS NOT NULL AND ro.ordersubtotal !='0.00' AND ro.restaurant_id = '" .
            $inv_resid . "' AND status='failed' " . $invoice_cond .
            " ORDER BY ro.ordergenerateid ASC ";
        //echo $sql_sel;
        $res_det_reje_order = $this->ExecuteQuery($sql_sel_reje_order, 'select');
        if (count($res_det_reje_order) > 0)
        {
            foreach ($res_det_reje_order as $key => $value)
            {
                $subtotal_reje_order[] = $res_det_reje_order[$key]['ordertotalprice'];
            }
            if (!empty($subtotal_reje_order) && is_array($subtotal_reje_order))
            {
                $totalSales_reje_order = array_sum($subtotal_reje_order);
            }
        }
        
        //For email and Pdf start------------------
        if (count($res_det_reje_order) > 0)
        {
            $rejected_orders_history = '<div style="float:left; font:bold 20px/25px Arial;">
						<div style="float:left; font:bold 20px/25px Arial;">This period you rejected ' .
                count($res_det_reje_order) . ' orders.</div>
					</div>
					<div style="float:left; font:bold 20px/25px Arial;">
						<div style="float:left; font:bold 20px/25px Arial;">The Total amount rejected: ' .
                $CFG['site']['currency'] . number_format($totalSales_reje_order, 2) . '</div>
					</div>
					<div style="float:left; border-top:1px solid #000000; width:100%; margin:0px 0px 10px 0px;"></div>';
        }
        //For email and Pdf end------------------
        return array($totalSales_reje_order, $rejected_orders_history);
    }
    
    #----------------------------------------------------------------------------------------#
    /**
     * ResInvoice::admin_res_invoice_list()
     * 
     * @return
     */
    public function admin_res_invoice_list()
    {
        global $CFG, $admin_smarty;
        
        #invoice
        $restaurant_inv_setting = $CFG['site']['site_inv_setting'];

        if ($restaurant_inv_setting == 'w1')
        {
            $current_year_mon = date('Y-m');
            list($pre_start_date, $pre_end_date, $start_date, $end_date, $date_pop_count) =
                $this->get_weekly_start_end_date();
        }
        if ($restaurant_inv_setting == 'm1')
        {
            $current_year_mon = date('Y-m');
            $numoftime = '1';
        }
        if ($restaurant_inv_setting == 'm2')
        {
            $current_year_mon = date('Y-m');
            if (date('j') <= 15)
            {
                $numoftime = '1';
            } else
            {
                $numoftime = '16';
            }
        }
        if ($restaurant_inv_setting == 'm4')
        {

            $current_year_mon = date('Y-m');
            if (date('j') <= 7)
            {
                $numoftime = '1';
            } elseif (date('j') <= 14)
            {
                $numoftime = '8';
            } elseif (date('j') <= 21)
            {
                $numoftime = '15';
            } else
            {
                $numoftime = '22';
            }
        }
        $admin_smarty->assign("restaurant_inv_setting", $restaurant_inv_setting);
        $admin_smarty->assign("current_year_mon", $current_year_mon);
        $admin_smarty->assign("numoftime", $numoftime);

        if ($restaurant_inv_setting == 'w1')
        {
            $invoice_occur = $this->getNumvalues($CFG['table']['invoice'],
                " restaurant_id = '" . $_GET['resid'] . "' AND inv_month = '" . $current_year_mon .
                "' AND inv_ord_from = '" . $start_date . "' ");

            $invoice_sent = $this->getMultiValue("invoice_sent_date, inv_ord_from, inv_ord_to",
                $CFG['table']['invoice'], " restaurant_id = '" . $_GET['resid'] .
                "' AND inv_month = '" . $current_year_mon .
                "' ORDER BY invoice_id DESC LIMIT 1 ");
        } elseif ($restaurant_inv_setting == 'm1')
        {
            $invoice_occur = $this->getNumvalues($CFG['table']['invoice'],
                " restaurant_id = '" . $_GET['resid'] . "' AND inv_month = '" . $current_year_mon .
                "' ");

            $invoice_sent = $this->getMultiValue("invoice_sent_date, inv_ord_from, inv_ord_to",
                $CFG['table']['invoice'], " restaurant_id = '" . $_GET['resid'] .
                "' AND inv_month = '" . $current_year_mon . "' ");
        } else
        {
            $invoice_occur = $this->getNumvalues($CFG['table']['invoice'],
                " restaurant_id = '" . $_GET['resid'] . "' AND inv_month = '" . $current_year_mon .
                "' AND inv_month_period = '" . $numoftime . "' ");
            $invoice_sent = $this->getMultiValue("invoice_sent_date, inv_ord_from, inv_ord_to",
                $CFG['table']['invoice'], " restaurant_id = '" . $_GET['resid'] .
                "' AND inv_month = '" . $current_year_mon . "' AND inv_month_period = '" . $numoftime .
                "' ");
        }

        $admin_smarty->assign("invoice_occur", $invoice_occur);
        $admin_smarty->assign("invoice_sent_date", $invoice_sent['0']['invoice_sent_date']);
        $admin_smarty->assign("invoice_period_from", $invoice_sent['0']['inv_ord_from']);
        $admin_smarty->assign("invoice_period_to", $invoice_sent['0']['inv_ord_to']);

        #List------------------------------------------------------------------------
        if ((isset($_GET['resid']) && !empty($_GET['resid'])) || isset($_POST['searchrestaurantid']) &&
            !empty($_POST['searchrestaurantid']))
        {

            if (isset($_GET['resid']) && !empty($_GET['resid']))
            {
                $res_id = $_GET['resid'];
            } elseif (isset($_POST['searchrestaurantid']) && !empty($_POST['searchrestaurantid']))
            {
                $res_id = $_POST['searchrestaurantid'];
            }

            $rest_cond .= " AND ri.restaurant_id = '" . $res_id . "' ";
            $cond_cnt .= " AND restaurant_id = '" . $res_id . "' ";

            $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                "restaurant_id = '" . $res_id . "'");

            $admin_smarty->assign("restname", $this->My_stripslashes($restname));
        }

        #Limit
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $_REQUEST['limit'];
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Invoice Search
        if (isset($_REQUEST['action']) && !empty($_REQUEST['action']) && $_REQUEST['action'] ==
            "InvoiceSearch")
        {
            if (isset($_REQUEST['resInvoice']) && !empty($_REQUEST['resInvoice']))
            {
                $resSearch .= " AND ri.restaurant_id =" . $_REQUEST['resInvoice'] . " ";
            }
            if (isset($_REQUEST['resPostcode']) && !empty($_REQUEST['resPostcode']))
            {
                $resSearch .= " AND res.restaurant_zip='" . $_REQUEST['resPostcode'] . "' ";
            }
            $frmdate = date_create($_REQUEST['invoice_from']);
            $todate = date_create($_REQUEST['invoice_to']);
            $from = date_format($frmdate, "Y-m-d H:i:s");
            $to = date_format($todate, "Y-m-d H:i:s");
            $rest_cond .= $resSearch . " AND ri.invoice_sent_date BETWEEN '" . $from .
                "' AND '" . $to . "' ";
        }


        #Keyword
        if (isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= " AND (ri.invoice_gen_id LIKE '%" . $_REQUEST['keyword'] .
                "%' OR res.restaurant_name LIKE '%" . $_REQUEST['keyword'] . "%') ";
            $fields .= "&keyword=$_REQUEST[keyword]$fields";
        }

        $sql_sel = "SELECT ri.invoice_id, ri.restaurant_id, ri.invoice_gen_id, ri.inv_month, ri.inv_month_p_short, ri.inv_month_period, ri.inv_month_period_limit, ri.inv_ord_from, ri.inv_ord_to, ri.inv_acc_balance, ri.invoice_status, ri.invoice_sent_date, " .
            " res.restaurant_name " . " FROM " . $CFG['table']['invoice'] . " AS ri " .
            " RIGHT JOIN " . $CFG['table']['restaurant'] .
            " AS res ON res.restaurant_id = ri.restaurant_id " .
            " WHERE ri.restaurant_id != '0' $condition AND ri.invoice_id IS NOT NULL " . $rest_cond .
            " ORDER BY ri.invoice_id DESC";

        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');
        $targetpage = "restaurantInvoiceManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt . '.';
            $invoiceList[] = $row_seller;
            $cnt++;
        }

        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        $admin_smarty->assign("tablename", $CFG['table']['invoice']);
        $admin_smarty->assign("whereField", 'invoice_id');
        $admin_smarty->assign("fieldname", 'invoice_status');
        $admin_smarty->assign("word", 'Invoice');
        $admin_smarty->assign("filename", 'restaurantInvoiceManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        $admin_smarty->assign("invoice_list", $invoiceList);
    }
    #--------------------------------------------------------------------------------#
}

?>