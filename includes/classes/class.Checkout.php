<?php

/**
 * Checkout
 * 
 * @package   
 * @author 
 * @copyright gencyolcu
 * @version 2014
 * @access public
 */
class Checkout extends Site
{

    /**
     * Checkout::__construct()
     * 
     * @return
     */
   /**  function __construct()
    {
    } **/
    # **/---------------------------------------------------------------------------------------
    #Submit Order
    /**
     * Checkout::checkOrderEmailId()
     * 
     * @return
     */
    function checkOrderEmailId()
    {
        global $CFG, $objSmarty;

        $contactemail = $this->filterInput($_POST['contactemail']);
        $addresstitle = $this->filterInput($_POST['add_title']);

        if (!isset($_SESSION['customerid']) && empty($_SESSION['customerid']))
        {
            $cntemail = $this->getNumvalues($CFG['table']['customer'], "customer_email = '" .
                $contactemail . "' ");

            if ($cntemail > 0)
            {
                echo 'already';
            } else
            {
                echo 'gotopayment';
            }
        } else
        {
            echo 'gotopayment';
        }
    }
    # **/---------------------------------------------------------------------------------------
    #Submit Order
    /**
     * Checkout::checkaddresstitle()
     * 
     * @return
     */
    function checkaddtitle()
    {
        global $CFG, $objSmarty;
        #print_r($_SESSION);
        //echo "<pre>";print_r($_POST['customerid']);echo "</pre>";
        //$contactemail = $this->filterInput($_POST['contactemail']);
        $addresstitle = $this->filterInput($_POST['add_title']);

        if (isset($_SESSION['customerid']) && !empty($_SESSION['customerid']))
        {
            #echo "set";
            $cntaddr = $this->getNumvalues($CFG['table']['customer_addressbook'], "customer_address_title = '" .
                $addresstitle . "' ");

            if ($cntaddr > 0)
            {
                echo 'already';
            }
        } 
        #echo "no2";
    }
    
    
    
    
    
    
    #Submit Order
    /**
     * Checkout::checkOrderEmailId()
     * 
     * @return
     */
    function checkOrderResubmit()
    {
        global $CFG, $objSmarty;
        
        #echo "<pre>";print_r($_REQUEST);echo "</pre>";exit;
        $sessionId = session_id();
        $orderId = $this->getValue("orderid",$CFG['table']['restaurant_cart'], "sessionid = '" .$sessionId . "' ");
        
        if ($orderId > 0) {
            
            session_regenerate_id();
            echo 'already';
        } else {
            
            echo 'proceed_order';
        }
    } 
    #Submit Order
    /**
     * Checkout::checkOrderStatus()
     * 
     * @return
     */
    function checkOrderStatus()
    {
        global $CFG, $objSmarty;

        $cusid  = $this->filterInput($_POST['cusid']);
        
        $checkCusAvailable = $this->getValue("customer_id", $CFG['table']['customer'], "customer_id = '" .$cusid . "'");
        if($checkCusAvailable != '') {
            $cusId = $this->getNumvalues($CFG['table']['customer'], "customer_id  = '" .$cusid . "' AND status = '1' ");
            if($cusId > 0 ){
                echo "active";
            }else
            {
                echo "deactive";
            }
        }
    } 
    #---------------------------------------------------------------------------------------
    #Submit Order
    /**
     * Checkout::restaurantOrder()
     * 
     * @param mixed $postarrvalues
     * @return
     */
    function restaurantOrder($postarrvalues)
    {
        global $CFG, $objSmarty, $objGIP;
        
        //echo "hi";
       #echo "<pre>";print_r($_REQUEST);echo "</pre>";exit;
      // echo "<pre>";print_r($_POST);echo "</pre>"; 
       

        $resid = $this->filterInput($_REQUEST['restid']);
        $_SESSION['orderresid'] = $resid;
        //Delivery Address
        $contactname = $this->filterInput($_POST['contactname']);
        $contactlastname = $this->filterInput($_POST['contactlastname']);
        $contactemail = $this->filterInput($_POST['contactemail']);
        $contactpassword = $this->filterInput($_POST['contactpassword']);
        $contactphone = $this->filterInput($_POST['contactphone']);
        $contactlandline = $this->filterInput($_POST['contactlandline']);
        $deliveryaddress = $this->filterInput($_POST['deliveryaddress']);
        $deliverystreet = $this->filterInput($_POST['deliverystreet']);
        $deliverylandmark = $this->filterInput($_POST['deliverylandmark']);
        $deliveryarea = $this->filterInput($_POST['deliveryarea']);
        $deliverycity = $this->filterInput($_POST['deliverycity']);
        $deliverystate = $this->filterInput($_POST['deliverystate']);
        $deliveryzip = $this->filterInput($_POST['deliveryzip']);
        $deliveryassoonas = $this->filterInput($_POST['foodassoonas']);

        #echo "contactpassword: ".$contactpassword;

        //Billing Address
        $bill_fname = $this->filterInput($_POST['bill_fname']);
        $bill_lname = $this->filterInput($_POST['bill_lname']);
        $bill_address = $this->filterInput($_POST['bill_address']);
        $bill_street = $this->filterInput($_POST['bill_street']);
        $bill_landmark = $this->filterInput($_POST['bill_landmark']);
        $bill_zipcode = $this->filterInput($_POST['bill_zipcode']);
        $bill_city = $this->filterInput($_POST['bill_city']);
        $bill_state = $this->filterInput($_POST['bill_state']);
        $bill_mobile = $this->filterInput($_POST['bill_mobile']);
        $bill_landline = $this->filterInput($_POST['bill_landline']);
        $bill_email = $this->filterInput($_POST['bill_email']);

        //Card Info
        $card_holdername = $this->filterInput($_POST['card_holdername']);
        $card_no = $this->filterInput($_POST['card_no']);
        $card_securitycode = $this->filterInput($_POST['card_securitycode']);
        $card_expmon = $this->filterInput($_POST['card_expmon']);
        $card_expyear = $this->filterInput($_POST['card_expyear']);
        $expdate = $card_expmon . '-' . $card_expyear;

        $hr_delivery = $this->filterInput($_POST['hr_delivery']);
        $min_delivery = $this->filterInput($_POST['min_delivery']);
        $sess_delivery = $this->filterInput($_POST['sess_delivery']);
        //$ordertotalprice 	= $this->filterInput($_POST['ordertotalprice']);
        $instructions = $this->filterInput($_POST['instructions']);
        $deliverypickup = $this->filterInput($_POST['deliverypickup']);
        $paymentmethod = $this->filterInput($_POST['paymentinfo']);

        if ($deliveryassoonas == '1')
        {

            $datedelivery = date("Y-m-d");
            $deliverytime = 'ASAP';

        } else
        {

            #$datedelivery = $this->filterInput($_POST['datedelivery']);
            $stdate = $_REQUEST['datedelivery'];
			list($day,$month,$year) = explode("-",$stdate);
			$datedelivery = $year.'-'.$month.'-'.$day;
            //echo $datedelivery;exit;
            #$datedelivery = date('d-m-Y', strtotime($datedelivery));
            //$deliverytime 	= $hr_delivery.':'.$min_delivery.' '.$sess_delivery;
            $deliverytime = $this->filterInput($_POST['time_delivery']);
            
        }
        #exit;
        $tipvalue = $_REQUEST['credittipprice'];

        if ($tipvalue == '' || $tipvalue == 0)
        {
            //echo "hi";
            $ordertotalprice = $this->filterInput($_POST['ordertotalprice']);
            //echo "fdsfds=>".$ordertotalprice;
        } else
        {
            $ordertotalprice1 = $this->filterInput($_POST['ordertotalprice']);
            $ordertotalprice = $ordertotalprice1 + $tipvalue;
        }

        if (isset($postarrvalues) && !empty($postarrvalues))
        {

            $card_type = $postarrvalues['pay_cardtype'];
            $cardnumber = $postarrvalues['pay_cardno'];
            $txnid = $postarrvalues['transaction_id'];
            $txn_authid = $postarrvalues['trans_auth_id'];
        }

        $taxpercentage = $this->getValue("restaurant_salestax", $CFG['table']['restaurant'],
            "restaurant_id = '" . $resid . "'");
        
        $stripe_customer_id = 0;
        if(isset($postarrvalues) && !empty($postarrvalues)){
            
            $transactionid = $postarrvalues['transaction_id'];
            
            $stripe_customer_id  = $postarrvalues['stripe_customer_id'];
		}
        //COD-----------------------------------------
        //if($paymentmethod == 'cod'){

        if (isset($_SESSION['customerid']) && !empty($_SESSION['customerid']))
        {
            //Customer
            $lastins_cusid = $this->filterInput($_SESSION['customerid']);
            $totaddress = $this->getNumvalues($CFG['table']['customer_addressbook'],"customer_id = '" . $lastins_cusid . "' AND status = '1'");

            if (isset($_REQUEST['deliveryaddresstitle']) && $_REQUEST['deliveryaddresstitle'] ==
                'Other')
            {

                $ins_other_add = "INSERT INTO 
													" . $CFG['table']['customer_addressbook'] . " 
												SET
													customer_id 			= '" . $lastins_cusid . "',
													customer_apartment_name	= '" . $this->filterInput($_REQUEST['deliveryaddress']) . "',
													customer_street			= '" . $this->filterInput($_REQUEST['deliverystreet']) . "',
													customer_address_title	= '" . $this->filterInput($_REQUEST['otheraddresstitle']) . "',
													customer_state			= '" . $this->filterInput($_REQUEST['deliverystate']) . "',
													customer_city			= '" . $this->filterInput($_REQUEST['deliverycity']) . "',
													customer_zip			= '" . $this->filterInput($_REQUEST['deliveryzip']) . "'";
                $this->ExecuteQuery($ins_other_add, 'insert');
            } elseif ($totaddress == '0')
            {
                $ins_guest_add = "INSERT INTO 
													" . $CFG['table']['customer_addressbook'] . " 
												SET
													customer_id 			= '" . $lastins_cusid . "',
													customer_apartment_name	= '" . $this->filterInput($_REQUEST['deliveryaddress']) . "',
													customer_street			= '" . $this->filterInput($_REQUEST['deliverystreet']) . "',
													customer_address_title	= '" . $this->filterInput($_REQUEST['otheraddresstitle']) . "',
													customer_state			= '" . $this->filterInput($_REQUEST['deliverystate']) . "',
													customer_city			= '" . $this->filterInput($_REQUEST['deliverycity']) . "',
													customer_zip			= '" . $this->filterInput($_REQUEST['deliveryzip']) . "'";
                $this->ExecuteQuery($ins_guest_add, 'insert');
            }

        } 
        else
        {
            //Guest
            if ($contactpassword != '')
            {
                $cntemail = $this->getNumvalues($CFG['table']['customer'], "customer_email = '" .
                    $contactemail . "' AND customer_id != '" . $this->filterInput($_SESSION['customerid']) . "' ");
                if ($cntemail == '0')
                {

                    $sel = "SELECT * FROM " . $CFG['table']['customer'] .
                        " WHERE customer_id != '' ";
                    $res = $this->ExecuteQuery($sel, 'select');
                    $num_visit = count($res);
                    $num_visits = $num_visit + 1;
                    $sessionid = session_id();

                    $cuspass = $this->encrypt_password_md5($contactpassword);

                    if (isset($_REQUEST['customer_news']) && !empty($_REQUEST['customer_news']))
                    {
                        $newsletter = $this->filterInput($_REQUEST['customer_news']);
                    } else
                    {
                        $newsletter = 'No';
                    }

                    $ins_cus = "INSERT INTO 
										  " . $CFG['table']['customer'] . "
										SET
										   customer_name 		= '" . $this->filterInput($contactname) . "',
										   customer_lastname	= '" . $this->filterInput($contactlastname) . "',
										   customer_buildtype 	= '" . $this->filterInput($deliveryaddress) . "',
										   customer_street 		= '" . $this->filterInput($deliverystreet) . "',
										   customer_city 		= '" . $deliverycity . "',
										   customer_state 		= '" . $deliverystate . "',
										   customer_zip 		= '" . $this->filterInput($deliveryzip) . "',
										   customer_area 		= '" . $this->filterInput($deliveryarea) . "',
										   customer_phone 		= '" . $this->filterInput($contactphone) . "',
										   customer_email 		= '" . $this->filterInput($contactemail) . "',
										   customer_password 	= '" . $this->filterInput($cuspass) . "',
										   newsletter			= '" . $newsletter . "',
										   addeddate 			= '" . CUR_TIME . "',
										   last_logged 			= '" . CUR_TIME . "',
										   num_visits  			= '" . $num_visits . "', 
										   logged_in   			= '0',
										   last_active 			= '" . CUR_TIME . "', 
										   ip          			= '" . $_SERVER['REMOTE_ADDR'] . "',
										   session     			= '" . $sessionid . "' ";
                    $lastins_cusid = $this->ExecuteQuery($ins_cus, "insert");
                    
                   //echo "last insert id".$lastins_cusid."<br>";
                    
                    if ($lastins_cusid)
                    {

                        $ins_guest_add = "INSERT INTO 
													" . $CFG['table']['customer_addressbook'] . " 
												SET
													customer_id 			= '" . $lastins_cusid . "',
													customer_apartment_name	= '" . $this->filterInput($_REQUEST['deliveryaddress']) . "',
													customer_street			= '" . $this->filterInput($_REQUEST['deliverystreet']) . "',
													customer_address_title	= '" . $this->filterInput($_REQUEST['otheraddresstitle']) . "',
													customer_state			= '" . $this->filterInput($_REQUEST['deliverystate']) . "',
													customer_city			= '" . $this->filterInput($_REQUEST['deliverycity']) . "',
													customer_zip			= '" . $this->filterInput($_REQUEST['deliveryzip']) . "'";
                        $this->ExecuteQuery($ins_guest_add, 'insert');

                        $toemail = $contactemail;
                        $active_link = $CFG['site']['base_url'] . "/customerLogin.php?ui=" . base64_encode($toemail);

                        $mailsubject = $CFG['site']['sitename'] ." Customer Login Details";
                        $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] . "/emailCustomerRegister.tpl");
                        $mail_content = str_replace('{SITE_URL}', $CFG['site']['base_url'], $mail_content);
                        $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
                        $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
                        $mail_content = str_replace('{SITE_DOMAIN}', $CFG['site']['sitedomain'], $mail_content);
                        $mail_content = str_replace('{CUSTOMER_EMAIL}', $contactemail, $mail_content);
                        $mail_content = str_replace('{CUSTOMER_PASSWORD}', $contactpassword, $mail_content);
                        $mail_content = str_replace('{ACTIVATION_LINK}', $active_link, $mail_content);

                        $ok = $this->sendMail($CFG['site']['sitename'], $CFG['site']['adminemail'], $toemail,
                            $mailsubject, $mail_content, $mail_attachment_name = '', $mail_attachment_content =
                            '');
                            
                        if($ok){
                        	
                        	$city = $this->getValue("cityname", $CFG['table']['city'], "city_id = '" . $deliverycity . "'");
            				$state = $this->getValue("statename", $CFG['table']['state'], "statecode = '" . $deliverystate . "'");
							
						  	$to_email = $CFG['site']['adminemail'];

			                $mailsubject = $CFG['site']['sitedomain'] . ": " . $CFG['site']['sitename'] .
			                    " Customer Register";
			                $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] .
			                    "/emailCustomerRegisterSendadmin.tpl");
			                $mail_content = str_replace('{SITE_URL}', $CFG['site']['base_url'], $mail_content);
			                $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
			                $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
			                $mail_content = str_replace('{SITE_DOMAIN}', $CFG['site']['sitedomain'], $mail_content);
			                $mail_content = str_replace('{CUSTOMER_NAME}', $contactname . " " . $contactlastname, $mail_content);
			                $mail_content = str_replace('{CUSTOMER_PHONE}', $contactphone, $mail_content);
			                $mail_content = str_replace('{CUSTOMER_STREETADDRESS}', $deliverystreet, $mail_content);
			                $mail_content = str_replace('{CUSTOMER_CITY}', $city, $mail_content);
			                $mail_content = str_replace('{CUSTOMER_STATE}', $state, $mail_content);
			                $mail_content = str_replace('{CUSTOMER_EMAIL}', $contactemail, $mail_content);
			                //$mail_content = str_replace('{CUSTOMER_PASSWORD}',$this->customerpassword,$mail_content);
			                $ok = $this->sendMail($contactname, $contactemail, $to_email, $mailsubject,
			                    $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');
						}    
                    }
                } else
                {
                    $lastins_cusid = 'already';
                }
            }
        }
        //echo "<br>last-->".$lastins_cusid;
        if ($lastins_cusid != 'already')
        {

            if (isset($_SESSION['customerid']) && !empty($_SESSION['customerid']))
            {
                $usertype = 'C';
            } else
            {
                $usertype = 'G';
            }

            if ($paymentmethod == 'paypal')
            {
                $paypalstatus = 'failed';
            } else
            {
                $paypalstatus = 'success';
            } /*else
            {
                $paypalstatus = 'failed';
            }*/

            if ($paymentmethod != 'cod')
            {
                $cardparper = $this->getValue("site_cc_percentage", $CFG['table']['sitesetting'],
                    "id = '1'");
                $cardpayfees = $ordertotalprice * ($cardparper / 100);
            }
            $dateorder =date("Y-m-d ");
            #echo $dateorder;exit;
            $deliveryamount = ($deliverypickup == 'pickup') ? '0.00' : $this->filterInput($_POST['deliveryamount']);
            $ordertotalprice = ($deliverypickup == 'pickup') ? $ordertotalprice - $this->filterInput($_POST['deliveryamount']) : $ordertotalprice;
                
            
            $fax_confirmation_number = rand(100, 999);
            $ins_order = "INSERT INTO 
									" . $CFG['table']['order'] . "
								 SET
								 	restaurant_id       = '" . $resid . "',
								 	customer_id         = '" . $lastins_cusid . "',
									usertype		 	= '" . $usertype . "',
									customername 		= '" . $this->filterInput($contactname) . "',
									customerlastname 	= '" . $this->filterInput($contactlastname) . "',
									customeremail 		= '" . $this->filterInput($contactemail) . "',
									customerpassword 	= '" . $this->filterInput($contactpassword) . "',
									customercellphone 	= '" . $this->filterInput($contactphone) . "',
									customerlandline 	= '" . $this->filterInput($contactlandline) . "',
									deliverydoornumber  = '" . $this->filterInput($deliveryaddress) . "',
									deliverystreet 		= '" . $this->filterInput($deliverystreet) . "',
									deliverylandmark 	= '" . $this->filterInput($deliverylandmark) . "',
									deliveryarea 		= '" . $this->filterInput($deliveryarea) . "',
									deliverycity 		= '" . $deliverycity . "',
									deliverystate 		= '" . $deliverystate . "',
									deliveryzip 		= '" . $this->filterInput($deliveryzip) . "',
									deliverytype 		= '" . $deliverypickup . "',
									foodassoonas 		= '" . $deliveryassoonas . "',
									deliverydate 	 	= '" . $datedelivery . "',
									deliverytime 		= '" . $deliverytime . "',
									instructions 		= '" . $this->filterInput($instructions) . "', " .
                /*" bill_cardholder_name     = '".$card_holdername."',
                bill_cardholder_cardno   = '".$card_no."',
                bill_cardholder_cardcode = '".$card_securitycode."',
                bill_cardholder_expdate  = '".$expdate."', ".*/" offervalue 		     = '" . $this->filterInput($_REQUEST['offer']) .
                "',
                                    offeramount              = '" . $this->filterInput($_POST['offeramount']) .
                "',
									ordersubtotal 		     = '" . $this->filterInput($_REQUEST['subtotal']) . "',
									taxvalue				 = '" . $taxpercentage . "',
                                    taxamount                = '" . $this->filterInput($_POST['taxamount']) .
                "',
                                    deliveryamount           = '" . $deliveryamount .
                "',
                                    tipamount                = '" . $this->filterInput($_POST['credittipprice']) .
                "',
                                
                                    voucher_id               = '" . $this->filterInput($_SESSION['voucherId']) . "',
                                    voucher_code             = '" . $this->filterInput($_SESSION['voucher']) . "',
                                    voucher_price            = '" . $this->filterInput($_SESSION['voucherPrice']) . "',
									ordertotalprice 		 = '" . $ordertotalprice . "',
									payment_type 	    	 = '" . $paymentmethod . "',
									paypal_status			 = '" . $paypalstatus . "',
                                    cardpaymentper           = '" . $cardparper .
                "',
                                    transaction_id           = '" . $transactionid."',
                                    cardpaymentfees          = '" . $this->filterInput($cardpayfees) .
                "',
									orderdate         		 = '"  . CUR_TIME . "' ";
            #echo $ins_order."<br>";
            #exit ;
            
            //$Result = mysqli_query($ins_order) or die("Error in Selection Query <br>");
            #echo $Result;
            //$lastinsertid = mysqli_insert_id();
            //echo $LastInsertedRow;
            
            $lastinsertid = $this->ExecuteQuery($ins_order, "insert");
            //echo $ins_order."<br>";
            //exit;
            #Unset voucher code
            unset($_SESSION['voucher_id']);
            unset($_SESSION['voucher']);
            unset($_SESSION['voucherPrice']);
            //echo $lastinsertid."<br>";
            //exit ;
            //exit;
            if (!empty($lastinsertid) && ($lastinsertid > 0))
            {
                #Customer Id Generation
                $ordergenid = $this->generateId($lastinsertid);
                $finalorderid = "ORD" . $ordergenid;
                $this->getUpdate($CFG['table']['order'], "ordergenerateid='" . $finalorderid .
                    "'", "orderid='" . $lastinsertid . "'");

                $sql_upd = "UPDATE " . $CFG['table']['restaurant_cart'] . " SET orderid = '" . $lastinsertid .
                    "' WHERE sessionid = '" . session_id() . "' AND restaurantid = '" . $resid . "'";
                $res_upd = $this->ExecuteQuery($sql_upd, "update");

                #----------------------------- Start Cash On Delivery ---------------------------------------------#
                if ($paymentmethod == 'cod' || $paymentmethod == 'creditcard')
                {
                    #Send Mail Satrt----------------------------------
                    $orderId = $lastinsertid;
                    
                    if($paymentmethod == 'creditcard'){
                        $updorderstatus = "UPDATE ".$CFG['table']['order']." SET payment_status = 'P' WHERE orderid = '".$orderId."' ";
		                $resorderstatus = $this->ExecuteQuery($updorderstatus, 'update');
                    }
                    
                    list($mail_content, $rest_cont_email,$rest_fax_no,$rest_fax_option) = $this->checkoutMailContent($resid, $orderId,
                        $finalorderid,"");
                    //echo $rest_fax_no.$rest_fax_option;exit;
                    //Send Mail to Customer
                    $toemail = $contactemail;
                    $mailsubject = $CFG['site']['sitename'] ." Order : ".$finalorderid;
                    $ok = $this->sendMail($CFG['site']['sitename'], $CFG['site']['adminemail'], $toemail,
                        $mailsubject, $mail_content, $mail_attachment_name = '', $mail_attachment_content =
                        '');
                    if ($ok)
                    {
                        //Send mail to Admin
                        $toemail = $CFG['site']['adminemail'];
                        $mailsubject = $CFG['site']['sitename'] ." Order : ".$finalorderid;
                        $ok_mail = $this->sendMail($restaurant_name, $contactemail, $toemail, $mailsubject,
                            $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');

                        //Send mail to Fax Number
                        /*$this->sendMail($restaurant_name,"vinothini.k@roamsoft.in","18184764397@sendfax.innoport.com",$mailsubject,$mail_content);*/

                        $res_mail_option = $this->getMultiValue("order_email_option, order_receive_email",
                            $CFG['table']['restaurant'], "restaurant_id='" . $resid . "'");
                        if ($ok_mail && $res_mail_option[0]['order_email_option'] == 'Yes' && $res_mail_option[0]['order_receive_email'] !=
                            '')
                        {

                            //Send mail to Restaurant Owner
                            //$toemail  	= $rest_cont_email;
                            list($mail_content, $rest_cont_email,$rest_fax_no,$rest_fax_option) = $this->checkoutMailContent($resid, $orderId,
                        $finalorderid,"restaurant");
                            $toemail = $res_mail_option[0]['order_receive_email'];
                            $mailsubject = $CFG['site']['sitename'] ." Order : ".$finalorderid;
                            $ok_mail = $this->sendMail($contactname, $contactemail, $toemail, $mailsubject,
                                $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');
                            //echo $ok_mail;
                        }
                    }
                      #Twilio SMS Integration start------------------
                $smsoption = $this->getMultiValue('restaurant_name, restaurant_phone, sms_option',$CFG['table']['restaurant'],"restaurant_id = '".$resid."'");
                
                if(trim($smsoption[0]['sms_option']) == 'Yes' && $contactphone != ''){
                    $phone = trim($contactphone);
                    $Message   = "You have received a order(".$finalorderid."), Order Price - ".$ordertotalprice.", Order Type - ".$deliverypickup.", Contact Name - ".stripslashes($contactname)." ".stripslashes($contactlastname).", Delivery Date - ".$datedelivery.", Delivery Time - ".$deliverytime." ";
                    
                    $sms_result = $this->sendTwilioSms($phone,html_entity_decode($Message));
                    
                    if( !empty($sms_result) )
                    {
                        //Open log file to append data
                        $fp_sms = fopen(dirname(dirname(__FILE__))."/order_sms.log", "a+");
                        fwrite($fp_sms, date("M d, Y H:i:s")." SMS: Order(".$finalorderid.") from '".$smsoption[0]['restaurant_name']."' - Phone: ('".$phone."')- Response: ".$sms_result."  \n");
                        //Close log file.
                        //echo "the sms result is".$sms_result;exit;
                        fclose($fp_sms);
                    }
                }
                    #Send InterFAx to Resturant Owner start--------------------------------------------------
			        /*if( $rest_fax_option == 'Yes' && !empty($rest_fax_no) ){
				        $faxnumber = $rest_fax_no;
                        
                       
				        $fax_result = $this->sendInterFAX($contactname,$faxnumber,$mailsubject,$mail_content, 'checkout');
                        
                        //Open log file to append data.
                        $fp_interfax = fopen(dirname(dirname(__FILE__))."/order_interfax.log", "a+");
				        if($fax_result > 0){
					        // fax submission succeeded
					        echo 'Fax submitted successfully. Transaction ID: ' . $fax_result;
                            
                            fwrite($fp_interfax, date("M d, Y H:i:s")." Order ".$finalorderid.": Fax is sent successfully. Transaction ID:".$fax_result." \n");
					    } else {
					        // fax submission failed
                                                        
					        echo 'Fax submission failed. Error message: <a href = "http://www.interfax.net/en/dev/webservice/reference/web-service-return-codes">' . $fax_result . '</a>';
                            fwrite($fp_interfax, date("M d, Y H:i:s")." Order ".$finalorderid.": Fax is not sent. Error Code:".$fax_result." \n");
					        //die();
					    }   
				    }
                     //Close log file.
                     fclose($fp_interfax);
				    #Send InterFAx to Resturant Owner end--------------------------------------------------
                    
                    #Insert GCM Registration Id
                    /*if(!empty($_REQUEST['gcm_regid'])){
                        $gcm_ins    = "INSERT INTO 
                                                    ".$CFG['table']['gcm']." 
                                                SET
                                                    userid          = '".$lastins_cusid."',
                                                    restaurant_id   = '".$resid."',
                                                    order_id        = '".$lastinsertid."',
                                                    gcm_register_id = '".trim($_REQUEST['gcm_regid'])."',
                                                    addeddate       = '".CUR_TIME."'";
                        $this->ExecuteQuery($gcm_ins, "insert");
                    }*/
                    
                    $ResName = $this->getValue("restaurant_name", $CFG['table']['restaurant'], "restaurant_id = '".$resid."'");
                    $Result = $this->getMultiValue("gcm_register_id, status", $CFG['table']['owner_gcm'], "restaurant_id   = '".$resid."' AND status = '1'");
                    #echo "<pre>"; print_r($Result); echo "</pre>";
                    foreach($Result as $key => $val){
                        //$Result1 = $this->sendGCMnotification('pending',trim($Result[$key]['gcm_register_id']),trim($finalorderid),trim(stripslashes($ResName)));
                        #echo 'Result1-->'.$Result1; exit;
                    }
                    
                    #Send Mail End----------------------------------
                    #Order Details Send to Cloud Printer--------------------------
                    $cloud_printerInfo = $this->getMultiValue("google_cloud_printer_option, restaurant_cloud_printer_email, restaurant_cloud_printer_password",
                        $CFG['table']['restaurant'], "restaurant_id = '" . $resid . "'");
                    if ($cloud_printerInfo[0]['restaurant_cloud_printer_email'] != '' && $cloud_printerInfo[0]['restaurant_cloud_printer_password'] !=
                        '' && $cloud_printerInfo[0]['google_cloud_printer_option'] == 'Yes')
                    {
                        $print_order = $this->printOrderDetails($mail_content, $cloud_printerInfo[0]['restaurant_cloud_printer_email'],
                            $cloud_printerInfo[0]['restaurant_cloud_printer_password']);
                    }
            
                    //COD
                    //echo session_id()."<br>";
                    
                    //echo "<pre>";print_r($_SESSION);echo "<pre>";
                    
                    //echo "<pre>";print_r($_SERVER);echo "<pre>";
                    
                    session_regenerate_id();
                    
                   // echo session_id()."<br>";
                    
                    //echo "<pre>";print_r($_SERVER);echo "<pre>";exit;
                     
                    if (isset($CFG['site']['fb_domain_name']) && !empty($CFG['site']['fb_domain_name']) &&
                        ($CFG['site']['fb_domain_name'] == 'fb'))
                    { //check whether fb or not
                        $this->redirectUrl($CFG['site']['base_url_https'] . "/" . $CFG['site']['fb_domain_name'] .
                            "/thanks.php?orderid=" . base64_encode($orderId));
                    } elseif (isset($CFG['site']['fb_domain_name']) && !empty($CFG['site']['fb_domain_name']) &&
                    ($CFG['site']['fb_domain_name'] == 'facebook'))
                    { //check whether fb or not
                        $this->redirectUrl($CFG['site']['base_url_https'] . "/" . $CFG['site']['fb_domain_name'] .
                            "/thanks.php?orderid=" . base64_encode($orderId));
                    } else
                    {
                        //echo "haha";
                        if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
                            $this->redirectUrl($CFG['site']['base_url_https'] . "/thanks.php?orderid=" . base64_encode($orderId));
                		}else{
                            $this->redirectUrl($CFG['site']['base_url'].'/order-success/'.base64_encode($orderId));
                		}
                        
                    }
                    /*if($CFG['site']['userfriendly'] == 'Y'){
                    $this->redirectUrl($CFG['site']['base_url']."/thanks/".base64_encode($orderId));
                    }else{
                    $this->redirectUrl($CFG['site']['base_url']."/thanks.php?orderid=".base64_encode($orderId));
                    }*/


                } //end for cod
                #----------------Start Authorize.Net ------------------------------------------------#
                if ($paymentmethod == 'authorizenet')
                {

                    #Send Mail Satrt----------------------------------
                    $orderId = $lastinsertid;

                    $updorderstatus = "UPDATE " . $CFG['table']['order'] .
                        " SET paypal_status = 'success',transaction_id = '" . $txnid .
                        "',payment_status = 'P' WHERE orderid = '" . $orderId . "' ";
                    $resorderstatus = $this->ExecuteQuery($updorderstatus, 'update');

                    list($mail_content, $rest_cont_email,$rest_fax_no,$rest_fax_option) = $this->checkoutMailContent($resid, $orderId,
                        $finalorderid,"");

                    //Send Mail to Customer
                    $toemail = $contactemail;
                    $mailsubject = $CFG['site']['sitename'] ." Order : ".$finalorderid;

                    $ok = $this->sendMail($CFG['site']['sitename'], $CFG['site']['adminemail'], $toemail,
                        $mailsubject, $mail_content, $mail_attachment_name = '', $mail_attachment_content =
                        '');
                    if ($ok)
                    {

                        //Send mail to Admin
                        $toemail = $CFG['site']['adminemail'];
                        $mailsubject = $CFG['site']['sitename'] ." Order : ".$finalorderid;
                        $ok_mail = $this->sendMail($restaurant_name, $contactemail, $toemail, $mailsubject,
                            $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');

                        //Send mail to Fax Number
                        /*$this->sendMail($restaurant_name,"vinothini.k@roamsoft.in","18184764397@sendfax.innoport.com",$mailsubject,$mail_content);*/

                        $res_mail_option = $this->getMultiValue("order_email_option, order_receive_email",
                            $CFG['table']['restaurant'], "restaurant_id='" . $resid . "'");
                        if ($ok_mail && $res_mail_option[0]['order_email_option'] == 'Yes' && $res_mail_option[0]['order_receive_email'] !=
                            '')
                        {

                            //Send mail to Restaurant Owner
                            //$toemail  	= $rest_cont_email;
                            $toemail = $res_mail_option[0]['order_receive_email'];
                            $mailsubject = $CFG['site']['sitename'] ." Order : ".$finalorderid;
                            $ok_mail = $this->sendMail($contactname, $contactemail, $toemail, $mailsubject,
                                $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');
                            //echo $ok_mail;
                        }
                    }
                    #Send Mail End----------------------------------
                    #Send InterFAx to Resturant Owner start--------------------------------------------------
			        /*if( $rest_fax_option == 'Yes' && !empty($rest_fax_no) ){
				        $faxnumber = $rest_fax_no;
                        
                       
				        $fax_result = $this->sendInterFAX($contactname,$faxnumber,$mailsubject,$mail_content, 'checkout');
                        
                        //Open log file to append data.
                        $fp_interfax = fopen(dirname(dirname(__FILE__))."/order_interfax.log", "a+");
				        if($fax_result > 0){
					        // fax submission succeeded
					        echo 'Fax submitted successfully. Transaction ID: ' . $fax_result;
                            
                            fwrite($fp_interfax, date("M d, Y H:i:s")." Order ".$finalorderid.": Fax is sent successfully. Transaction ID:".$fax_result." \n");
					    } else {
					        // fax submission failed
					        echo 'Fax submission failed. Error message: <a href = "http://www.interfax.net/en/dev/webservice/reference/web-service-return-codes">' . $fax_result . '</a>';
                            fwrite($fp_interfax, date("M d, Y H:i:s")." Order ".$finalorderid.": Fax is not sent. Error Code:".$fax_result." \n");
					        //die();
					    }   
				    }
                     //Close log file.
                     fclose($fp_interfax);*/
				    #Send InterFAx to Resturant Owner end--------------------------------------------------                    
                    #Order Details Send to Cloud Printer--------------------------
                    $cloud_printerInfo = $this->getMultiValue("google_cloud_printer_option, restaurant_cloud_printer_email, restaurant_cloud_printer_password",
                        $CFG['table']['restaurant'], "restaurant_id = '" . $resid . "'");
                    if ($cloud_printerInfo[0]['restaurant_cloud_printer_email'] != '' && $cloud_printerInfo[0]['restaurant_cloud_printer_password'] !=
                        '' && $cloud_printerInfo[0]['google_cloud_printer_option'] == 'Yes')
                    {
                        $print_order = $this->printOrderDetails($mail_content, $cloud_printerInfo[0]['restaurant_cloud_printer_email'],
                            $cloud_printerInfo[0]['restaurant_cloud_printer_password']);
                    }
                    
                    session_regenerate_id();
                    //echo "hai";exit;
                    if (isset($CFG['site']['fb_domain_name']) && !empty($CFG['site']['fb_domain_name']) &&
                        ($CFG['site']['fb_domain_name'] == 'fb'))
                    { //check whether fb or not
                        $this->redirectUrl($CFG['site']['base_url_https'] . "/" . $CFG['site']['fb_domain_name'] .
                            "/thanks.php?orderid=" . base64_encode($orderId));
                    } elseif (isset($CFG['site']['fb_domain_name']) && !empty($CFG['site']['fb_domain_name']) &&
                    ($CFG['site']['fb_domain_name'] == 'facebook'))
                    { //check whether fb or not
                        $this->redirectUrl($CFG['site']['base_url_https'] . "/" . $CFG['site']['fb_domain_name'] .
                            "/thanks.php?orderid=" . base64_encode($orderId));
                    } else
                    {
                        if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
                            $this->redirectUrl($CFG['site']['base_url_https'] . "/thanks.php?orderid=" . base64_encode($orderId));
                		}else{
                            $this->redirectUrl($CFG['site']['base_url'].'/order-success/'.base64_encode($orderId));
                		}
                        
                    }
                    /*if($CFG['site']['userfriendly'] == 'Y'){
                    $this->redirectUrl($CFG['site']['base_url']."/thanks/".base64_encode($orderId));
                    }else{
                    $this->redirectUrl($CFG['s0ite']['base_url']."/thanks.php?orderid=".base64_encode($orderId));
                    }*/
                    //$this->redirectUrl($CFG['site']['base_url']."/thanks.php?orderid=".base64_encode($orderId));

                }
                #---------------  End Authorize.Net -----------------#
            }
            return $lastinsertid;
        }
        //}
    }
    
    #-----------------------------------------------------------------------------------------
    #My archivo FTP
    /**
     * SearchDetails::uploadfile()
     *
     * @return
     */
    function uploadfile($postarrvalues){
    	
    	global $CFG, $objSmarty;
    	
    	$sessionId = session_id();
    	
    	//Delivery Address
    	$contactname = $this->filterInput($_POST['contactname']);
    	$contactlastname = $this->filterInput($_POST['contactlastname']);
    	$contactemail = $this->filterInput($_POST['contactemail']);  
    	$contactphone = $this->filterInput($_POST['contactphone']);
    	$deliveryaddress = $this->filterInput($_POST['deliveryaddress']);
    	$deliverystreet = $this->filterInput($_POST['deliverystreet']);
    	$deliverylandmark = $this->filterInput($_POST['deliverylandmark']);
    	$deliveryarea = $this->filterInput($_POST['deliveryarea']);
    	$deliverycity = $this->filterInput($_POST['deliverycity']);
    	$deliverystate = $this->filterInput($_POST['deliverystate']);
    	$deliveryzip = $this->filterInput($_POST['deliveryzip']);
    	$payment_type = $this->filterInput($_POST['payment_type']);
    	 
    	
    	 $sel_cart = "SELECT cart_id, menuid, restaurantid, menuprice, quantity, FROM " .
    			$CFG['table']['restaurant_cart'] . " WHERE sessionid = '" . $sessionId .
    			"' AND quantity != '0' AND orderid = '" . $orderId . "' ";
    	 $res_cart = $this->ExecuteQuery($sel_cart, "select");
    	  			  			
    			$menuid = $res_cart[$key]['menuid'];
    			$menuprice = $res_cart[$key]['menuprice'];    			
    			$quantity = $res_cart[$key]['quantity'];
    	
     
    	$fecha = date("DMMYY");
    	$dia = date("j");
    	$mes = date("m");
    	$ano = date("y");
    	$nom_file= $_REQUEST['resid'].$dia.$mes.$ano.$lastins_cusid.'.txt';
    	var_dump($nom_file);
    	$ar=fopen("$nom_file","a") or die("Problemas en la creacion");
    	 
    	fputs($ar,"{0}");
    	fputs($ar,$res_cart[0]['menuid']);
    	fputs($ar, ";");
    	fputs($ar,$quantity);
    	fputs($ar, ";");
    	fputs($ar,$menuprice);
    	fputs($ar,"". PHP_EOL);
    	fputs($ar,"{1}");
    	fputs($ar,$payment_type);
    	fputs($ar,"". PHP_EOL);
    	fputs($ar,"{2}");
    	fputs($ar,$contactname.";".$contactlastname .";".$contactemail.";".$contactphone.";".$deliveryaddress.";".$deliverystreet.";".$deliverylandmark.";".$deliverylandmark.";".$deliverycity.";".$deliverystate.";".$deliveryzip);
    	fputs($ar,"\n");
    	  	 
    	fputs($ar,"");
    	fputs($ar,"\n");
    	fclose($ar);
    
    	// connect and login to FTP server
    	$ftp_server = "64.250.116.160";
    	$ftp_username=" admin_fullpizzadev";
    	$ftp_userpass= "YGT2uR72C";
    
    	$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
    	$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);
    	$file = $nom_file;
    
    	// upload file
    	if (ftp_put($ftp_conn, $file, $file, FTP_ASCII))
    	{
    		echo "Successfully uploaded $file.";
    	}
    	else
    	{
    		echo "Error uploading $file.";
    	}
    
    	// close connection
    	ftp_close($ftp_conn);
    
    }
    
    
    #--------------------------------------------------------------------------------------------
    # Google cloud printer #
    #--------------------------------------------------------------------------------------------
    #Print the order
    /**
     * Checkout::printOrderDetails()
     * 
     * @param mixed $print_content
     * @param mixed $printer_email
     * @param mixed $printer_pwd
     * @return
     */
    function printOrderDetails($print_content, $printer_email, $printer_pwd)
    {

        global $CFG;
        require_once 'includes/GoogleCloudPrint.php';

        // Create object
        $gcp = new GoogleCloudPrint();
        #echo "email---".$printer_email."pass---->".$printer_pwd;
        // Login to Googel, email address and password is required
        if ($gcp->loginToGoogle($printer_email, $printer_pwd))
        {

            $filename = time() . ".html";
            #echo $CFG['site']['photo_printerfiles_path']."/".$filename.".html";
            #die("test");
            // Create Html files
            $content .= $print_content;
            $fp = fopen($CFG['site']['printerfiles_path'] . "/" . $filename . ".html", "wb");
            fwrite($fp, $content);
            fclose($fp);

            // Login is successfull so now fetch printers
            $printers = $gcp->getPrinters();
            #echo "<pre>"; print_r($printers); echo "</pre>";
            if (count($printers) > 0)
            {
                for ($i = 0; $i < count($printers); $i++)
                {
                    #if(!empty($printers[$i]["id"]) && $printers[$i]["id"] != "__google__docs"){
                    $resarray = $gcp->sendPrintToPrinter($printers[$i]['id'], "Order details", $CFG['site']['printerfiles_path'] .
                        "/" . $filename . ".html", "text/html");
                    #	}
                }
            }
        }
        #die("testttt");
    }
    #---------------------------------------------------------------------------------------------------
    #   Standard Paypal  #
    #---------------------------------------------------------------------------------------------------
    /**
     * Checkout::updatePaypalPaySuccess()
     * 
     * @param mixed $paymentid
     * @param mixed $transactionId
     * @param mixed $lastorderid
     * @return
     */
    function updatePaypalPaySuccess($paymentid, $transactionId, $lastorderid)
    {
        global $CFG, $objSmarty;

        //echo "<pre>";print_r($_REQUEST);echo "</pre>";

        $resid = base64_decode($this->filterInput($_REQUEST['restid']));

        if ($lastorderid)
        {

            $updorderstatus = "UPDATE " . $CFG['table']['order'] .
                " SET paypal_status = 'success',transaction_id = '" . $transactionId .
                "',payment_status= 'P' WHERE orderid = '" . $lastorderid .
                "' AND paypal_status = 'failed'";
            $resorderstatus = $this->ExecuteQuery($updorderstatus, 'update');

            $UpdateSQL = "UPDATE " . $CFG['table']['payment'] . " SET orderid = '" . $lastorderid .
                "',transaction_id = '" . $transactionId . "' WHERE payment_id = '" . $paymentid .
                "'";
            $update = $this->ExecuteQuery($UpdateSQL, 'update');

            /*$sql_upd = "UPDATE ".$CFG['table']['restaurant_cart']." SET orderid = '".$lastorderid."' WHERE sessionid = '".session_id()."' AND restaurantid = '".$resid."'";
            $res_upd = $this->ExecuteQuery($sql_upd, "update");*/

            $getorderdet = $this->getMultivalue("ordergenerateid,customername,customeremail,customercellphone",
                $CFG['table']['order'], "orderid = '" . $lastorderid . "'");
            $finalorderid = $getorderdet[0]['ordergenerateid'];
            $contactemail = $getorderdet[0]['customeremail'];
            $contactname = $getorderdet[0]['customername'];
            $restaurant_name = $this->getValue("restaurant_name", $CFG['table']['restaurant'],
                "restaurant_id = '" . $resid . "'");
            //get mail content from this fn
            $orderId = $lastorderid;
            list($mail_content, $rest_cont_email) = $this->checkoutMailContent($resid, $orderId,
                $finalorderid,"");
            #Twilio SMS Integration start------------------
                $smsoption = $this->getMultiValue('restaurant_name, restaurant_phone, sms_option',$CFG['table']['restaurant'],"restaurant_id = '".$resid."'");
                
                if(trim($smsoption[0]['sms_option']) == 'Yes' && $getorderdet[0]['customercellphone'] != ''){
                    $phone = trim($getorderdet[0]['customercellphone']);
                    $Message   = "You have received a order(".$finalorderid."), Order Price - ".$ordertotalprice.", Order Type - ".$deliverypickup.", Contact Name - ".stripslashes($contactname)." ".stripslashes($contactlastname).", Delivery Date - ".$datedelivery.", Delivery Time - ".$deliverytime." "; 
                    
                    $sms_result = $this->sendTwilioSms($phone,html_entity_decode($Message));
                    
                    if( !empty($sms_result) )
                    {
                        //Open log file to append data
                        $fp_sms = fopen(dirname(dirname(__FILE__))."/order_sms.log", "a+");
                        fwrite($fp_sms, date("M d, Y H:i:s")." SMS: Order(".$finalorderid.") from '".$smsoption[0]['restaurant_name']."' - Phone: ('".$phone."')- Response: ".$sms_result."  \n");
                        //Close log file.
                        fclose($fp_sms);
                    }
                }
                #Twilio SMS Integration End------------------    

            //Send Mail to Customer
            #$toemail  	 = $res_order['0']['customeremail'];
            $toemail = $contactemail;
            $mailsubject = $CFG['site']['sitename'] ." Order : ".$finalorderid;

            $ok = $this->sendMail($CFG['site']['sitename'], $CFG['site']['adminemail'], $toemail,
                $mailsubject, $mail_content, $mail_attachment_name = '', $mail_attachment_content =
                '');
            if ($ok)
            {
                $res_mail_option = $this->getMultiValue("order_email_option, order_receive_email",
                    $CFG['table']['restaurant'], "restaurant_id='" . $resid . "'");
                //Send mail to Restaurant
                if ($res_mail_option[0]['order_email_option'] == 'Yes' && $res_mail_option[0]['order_receive_email'] !=
                    '')
                {
                    //$toemail  	= $rest_cont_email;
                    $toemail = $res_mail_option[0]['order_receive_email'];
                    $mailsubject = $CFG['site']['sitename'] ." Order : ".$finalorderid;
                    $ok_mail = $this->sendMail($contactname, $contactemail, $toemail, $mailsubject,
                        $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');
                }


                if ($ok_mail)
                {
                    //Send mail to Admin
                    $toemail = $CFG['site']['adminemail'];
                    $mailsubject = $CFG['site']['sitename'] ." Order : ".$finalorderid;
                    $ok_mail = $this->sendMail($restaurant_name, $contactemail, $toemail, $mailsubject,
                        $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');

                    //Send mail to Fax Number
                    //$this->sendMail($restaurant_name,"vinothini.k@roamsoft.in","18184764397@sendfax.innoport.com",$mailsubject,$mail_content, $mail_attachment_name='', $mail_attachment_content='');

                }
            }

        }
        session_regenerate_id();
    }
    #---------------------------------------------------------------------------------------------------
    # Credit Card ( Payflow )
    #---------------------------------------------------------------------------------------------------
    /**
     * Checkout::updateCreditCardSuccess()
     * 
     * @return
     */
    function updateCreditCardSuccess()
    {
        global $CFG, $objSmarty;

        #echo "<pre>";print_r($_REQUEST);echo "</pre>";

        //set GET variables to local values.
        $transactionId = $_POST['PNREF'];
        $result = $_POST['RESULT'];
        $respMsg = $_POST['RESPMSG'];
        $invnum = $_POST['INVNUM'];
        $amount = $_POST['AMT'];

        if (isset($_POST['ACCT']))
        {
            $last4 = $_POST['ACCT'];
        } else
        {
            $last4 = "N/A";
        }

        if (isset($_POST['CARDTYPE']))
        {
            $cardType = $_POST['CARDTYPE'];
        } else
        {
            $cardType = "N/A";
        }

        //check the card type
        if ($cardType == "0")
        {
            $cardType = "Visa";
        } else
            if ($cardType == "1")
            {
                $cardType = "Master Card";
            } else
                if ($cardType == "2")
                {
                    $cardType = "Discover";
                } else
                    if ($cardType == "3")
                    {
                        $cardType = "AMEX";
                    } else
                    {
                        $cardType = "N/A";
                    }


                    $customerid = base64_decode($this->filterInput($_POST['CUSTID']));
        $resid = base64_decode($this->filterInput($_POST['USER2']));
        if ($_SESSION['customerid'] == '')
        {
            $usertype = 'G';
        } else
        {
            $usertype = 'C';
        }
        $dateorder = date("d-m-Y");
        $sel_cus = "SELECT customer_name, customer_lastname, customer_email,customer_phone,customer_buildtype,customer_street,customer_area,customer_city FROM " .
            $CFG['table']['customer'] . " WHERE customer_id = " . $customerid . " ";
        $res_cus = $this->ExecuteQuery($sel_cus, 'select');

        $ins_order = "INSERT INTO 
									" . $CFG['table']['order'] . "
								 SET
								 	restaurant_id       = '" . $resid . "',
								 	customer_id         = '" . $customerid . "',
									usertype		 	= '" . $usertype . "',
									customername 		= '" . $this->filterInput($_POST['FIRSTNAME']) . "',
									customerlastname 	= '" . $this->filterInput($_POST['LASTNAME']) . "',
									customeremail 		= '" . $this->filterInput($_POST['EMAIL']) . "',
									customerpassword 	= '" . $this->filterInput($contactpassword) . "',
									customercellphone 	= '" . $this->filterInput($_POST['PHONE']) . "',
									customerlandline 	= '" . $this->filterInput($_REQUEST['landline']) . "',
									deliverydoornumber  = '" . $this->filterInput($res_cus[0]['customer_buildtype']) . "',
									deliverystreet 		= '" . $this->filterInput($_POST['ADDRESS']) . "',
									deliverylandmark 	= '" . $this->filterInput($_REQUEST['landmark']) . "',
									deliveryarea 		= '" . $this->filterInput($res_cus[0]['customer_area']) . "',
									deliverycity 		= '" . $this->filterInput($_POST['CITY']) . "',
									deliveryzip 		= '" . $this->filterInput($_POST['ZIP']) . "',
									deliverystate 		= '" . $this->filterInput($_POST['STATE']) . "',
									deliverytype 		= '" . $this->filterInput($_POST['USER6']) . "',
									foodassoonas 		= '" . $this->filterInput($_POST['USER5']) . "',
									deliverydate 	 	= '" . $this->filterInput($_POST['USER3']) . "',
									deliverytime 		= '" . $this->filterInput($_POST['USER4']) . "',
									offervalue 		    = '" . $this->filterInput($_POST['USER7']) . "',
									ordertotalprice 	= '" . $this->filterInput($_POST['AMT']) . "',
									payment_type 	    = 'CC',
									orderdate         	= '" . $dateorder . "' ";
        #echo $ins_order;
        $lastinsertid = $this->ExecuteQuery($ins_order, "insert");
        if (!empty($lastinsertid) && ($lastinsertid > 0))
        {

            #Customer Id Generation
            $ordergenid = $this->generateId($lastinsertid);
            $finalorderid = "ORD" . $ordergenid;
            $this->getUpdate($CFG['table']['order'], "ordergenerateid='" . $finalorderid .
                "'", "orderid='" . $lastinsertid . "'");

            #Update in Order Payment table
            $UpdateSQL = "INSERT INTO " . $CFG['table']['payment'] . " SET orderid = '" . $lastinsertid .
                "',transaction_id = '" . $transactionId .
                "', payment_method = 'CC', member_id = '" . $customerid . "', amount = '" . $this->filterInput($_POST['AMT']) .
                "', rechared_date = '" . CUR_TIME . "' ";
            $update = $this->ExecuteQuery($UpdateSQL, 'update');

            #Update in cart table
            $sql_upd = "UPDATE " . $CFG['table']['restaurant_cart'] . " SET orderid = '" . $lastinsertid .
                "' WHERE sessionid = '" . session_id() . "' AND restaurantid = '" . $resid . "'";
            $res_upd = $this->ExecuteQuery($sql_upd, "update");


            //get mail content from this fn
            $orderId = $lastinsertid;
            list($mail_content, $rest_cont_email) = $this->checkoutMailContent($resid, $orderId,
                $finalorderid,"");

            //Send Mail to Customer
            $toemail = $res_order['0']['customeremail'];
            $mailsubject = $CFG['site']['sitename'] ." Order : ".$finalorderid;

            $ok = $this->sendMail($CFG['site']['sitename'], $CFG['site']['adminemail'], $toemail,
                $mailsubject, $mail_content, $mail_attachment_name = '', $mail_attachment_content =
                '');
            if ($ok)
            {
                $res_mail_option = $this->getMultiValue("order_email_option, order_receive_email",
                    $CFG['table']['restaurant'], "restaurant_id='" . $resid . "'");
                if ($res_mail_option[0]['order_email_option'] == 'Yes' && $res_mail_option[0]['order_receive_email'] !=
                    '')
                {
                    //Send mail to Restaurant
                    #$toemail  	= $rest_cont_email;
                    $toemail = $res_mail_option[0]['order_receive_email'];
                    $mailsubject = $CFG['site']['sitename'] ." Order : ".$finalorderid;
                    $ok_mail = $this->sendMail($contactname, $restaurantmail, $toemail, $mailsubject,
                        $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');
                }

                if ($ok_mail)
                {
                    //Send mail to Admin
                    $toemail = $CFG['site']['adminemail'];
                    $mailsubject = $CFG['site']['sitename'] ." Order : ".$finalorderid;
                    $ok_mail = $this->sendMail($restaurant_name, $contactemail, $toemail, $mailsubject,
                        $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');

                    //Send mail to Fax Number
                    $this->sendMail($restaurant_name, "vinothini.k@roamsoft.in",
                        "18184764397@sendfax.innoport.com", $mailsubject, $mail_content, $mail_attachment_name =
                        '', $mail_attachment_content = '');

                }
            }
            session_regenerate_id();
            if ($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook')
            {
                $this->redirectUrl($CFG['site']['base_url'] . "/thanks.php?orderid=" .base64_encode($lastinsertid));
            } else
            {
                $this->redirectUrl($CFG['site']['base_url'] . "/order-success/" . base64_encode($lastinsertid));
            }
            //$this->redirectUrl("thanks.php?orderid=".base64_encode($lastinsertid));
        }
    }
    #---------------------------------------------------------------------------------------------------
    # Do Direct payment ( Paypal Pro)
    #---------------------------------------------------------------------------------------------------
    #Do Direct Payment Method
    /**
     * Checkout::updateDoDirectPayment()
     * 
     * @param mixed $lastorderid
     * @param mixed $resid
     * @return
     */
    function updateDoDirectPayment($lastorderid, $resid)
    {
        global $CFG, $objSmarty;

        $finalorderid = $this->getValue("ordergenerateid", $CFG['table']['order'],
            "orderid = '" . $lastorderid . "'");
        $ordertotalprice = $this->getValue("ordertotalprice", $CFG['table']['order'],
            "orderid = '" . $lastorderid . "'");
        $deliverypickup = $this->getValue("deliverytype", $CFG['table']['order'],
            "orderid = '" . $lastorderid . "'");
        $contactphone = $this->getValue("customercellphone", $CFG['table']['order'],
            "orderid = '" . $lastorderid . "'");
        $contactname = $this->getValue("customername", $CFG['table']['order'],
            "orderid = '" . $lastorderid . "'");
        #SMS-----------------------------------#

        #$this->sendSMScontent($lastorderid,$resid);

        #SMS-----------------------------------#

        #Send Mail Start----------------------------------
        $orderId = $lastorderid;
        $finalorderid = $this->getValue("ordergenerateid", $CFG['table']['order'],
            "orderid = '" . $orderId . "'");

        $sql_upd = "UPDATE " . $CFG['table']['restaurant_cart'] . " SET orderid = '" . $orderId .
            "' WHERE sessionid = '" . session_id() . "' AND restaurantid = '" . $this->filterInput($resid) . "'";
        $res_upd = $this->ExecuteQuery($sql_upd, "update");

        $updorderstatus = "UPDATE " . $CFG['table']['order'] .
            " SET paypal_status = 'success',payment_status = 'P' WHERE orderid = '" . $orderId .
            "' AND paypal_status = 'failed'";
        $resorderstatus = $this->ExecuteQuery($updorderstatus, 'update');

        list($mail_content, $rest_cont_email, $rest_fax_no, $rest_fax_option) = $this->
            checkoutMailContent($resid, $orderId, $finalorderid,"");
        $contactemail = $this->getValue("customeremail", $CFG['table']['order'],
            "orderid = '" . $orderId . "' ");
        $contactname = $this->getValue("customername", $CFG['table']['order'],
            "orderid = '" . $orderId . "' ");
        $restaurant_name = $this->getValue("restaurant_name", $CFG['table']['restaurant'],
            "restaurant_id = '" . $this->filterInput($resid) . "' ");
        //Send Mail to Customer
        $toemail = $contactemail;
        $mailsubject = $CFG['site']['sitename'] . " Order:" . $finalorderid;

        $ok_mail = $this->sendMail($CFG['site']['sitename'], $CFG['site']['adminemail'],
            $toemail, $mailsubject, $mail_content);
        if ($ok_mail)
        {

            //Send mail to Admin
            $toemail = $CFG['site']['adminemail'];
            $mailsubject = $CFG['site']['sitename'] . " Order:" . $finalorderid;
            $ok_mail = $this->sendMail($restaurant_name, $contactemail, $toemail, $mailsubject,
                $mail_content);

            if ($ok_mail)
            {

                //Send mail to Restaurant Owner
                $toemail = $rest_cont_email;
                $mailsubject = $CFG['site']['sitename'] . " Order:" . $finalorderid;
                $ok_mail = $this->sendMail($contactname, $contactemail, $toemail, $mailsubject,
                    $mail_content);

                //Send InterFAx to Resturant Owner start--------------------------------------------------
                if ($rest_fax_option == 'Yes' && !empty($rest_fax_no))
                {
                    $faxnumber = $rest_fax_no;
                    $fax_result = $this->sendInterFAX($contactname, $faxnumber, $mailsubject, $mail_content,
                        'checkout');
                    if ($fax_result > 0)
                    {
                        // fax submission succeeded
                        echo 'Fax submitted successfully. Transaction ID: ' . $fax_result;
                    } else
                    {
                        // fax submission failed
                        echo 'Fax submission failed. Error message: <a href = "http://www.interfax.net/en/dev/webservice/reference/web-service-return-codes">' .
                            $ret . '</a>';
                    }
                }
                //Send InterFAx to Resturant Owner end--------------------------------------------------
            }
        }
        #Send Mail End----------------------------------

        //COD
        session_regenerate_id();
        if ($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook')
        {
            $this->redirectUrl($CFG['site']['base_url'] . "/thanks.php?orderid=" . base64_encode($orderId));
        } else
        {
            $this->redirectUrl($CFG['site']['base_url'] . "/order-success/" . base64_encode($orderId));
        }
        //$this->redirectUrl($CFG['site']['base_url']."/thanks.php?orderid=".base64_encode($orderId));
    }
    #------------------------------------------------------------------
    #DoDirect payment Failure
    /**
     * Checkout::updateDoDirectPayment_failure()
     * 
     * @param mixed $lastorderid
     * @param mixed $resid
     * @return
     */
    function updateDoDirectPayment_failure($lastorderid, $resid)
    {
        global $CFG, $objSmarty;

        $del = "DELETE FROM " . $CFG['table']['order'] . " WHERE orderid = '" . $lastorderid .
            "' ";
        $res = $this->ExecuteQuery($del, "delete");

        $resname = $this->getValue("restaurant_seourl", $CFG['table']['restaurant'],
            "restaurant_id = '" . $this->filterInput($resid) . "'");

        if ($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook')
        {
            $this->redirectUrl($CFG['site']['base_url'] . "/restaurantDetails.php?resid=" . $resid . "&resname=" . $resname);
        } else
        {
            $this->redirectUrl($CFG['site']['base_url'] . "/menu/" . $resid . "/" . $resname);
        }
        //$this->redirectUrl($CFG['site']['base_url']."/restaurantDetails.php?resid=".$resid."&resname=".$resname);

    }
    #---------------------------------------------------------------------------------------------------
    #------------------------------------------------------------------------------------------------------------------------
    /**
     * Checkout::checkoutMailContent()
     * 
     * @param mixed $resid
     * @param mixed $orderId
     * @param mixed $finalorderid
     * @return
     */
    function checkoutMailContent($resid, $orderId, $finalorderid,$type)
    {
        global $CFG, $objSmarty;

        $sessionId = session_id();

        $restDetails = $this->GetMultivalue("restaurant_name, restaurant_phone, restaurant_salestax, restaurant_delivery, restaurant_delivery_charge, restaurant_minorder_price,restaurant_contact_email, restaurant_fax, send_fax_option,restaurant_streetaddress,restaurant_state,restaurant_city,restaurant_zip",
            $CFG['table']['restaurant'], "restaurant_id = '" . $this->filterInput($resid) . "'");

        $resstate = $this->getValue("statename", $CFG['table']['state'], "statecode = '" . $this->filterInput($restDetails[0]['restaurant_state']) . "'");
        $rescity  = $this->getValue("cityname", $CFG['table']['city'], "city_id = '" . $this->filterInput($restDetails[0]['restaurant_city']) . "'");

        $restaurantmail = $restDetails[0]['restaurant_contact_email'];

        $restofferdetails = $this->GetMultivalue("offer_id, offer_percentage, offer_price, offer_valid_from, offer_valid_to, status",
            $CFG['table']['restaurant_offer'], "restaurant_id = '" . $this->filterInput($resid) . "'");

        $sel_order = "SELECT ordergenerateid, restaurant_id, customername, customerlastname, customeremail, customercellphone, deliverydoornumber, deliverystreet, deliverylandmark,instructions, deliveryarea, deliverycity, deliveryzip, deliverytype, ordertotalprice, offervalue, foodassoonas, deliverydate, deliverytime, status, orderdate, payment_type, payment_status, deliveryamount,taxvalue, taxamount, offeramount, tipamount, ordersubtotal, voucher_id, voucher_code, voucher_price FROM " .
            $CFG['table']['order'] . " WHERE orderid = '" . $orderId . "' ";
        $res_order = $this->ExecuteQuery($sel_order, 'select');
        if($type == 'restaurant') {
        $confirmation_number = '<div style="font-family:Arial;font-weight:normal; font-size:24px;color:#222;padding-bottom:10px;border-bottom:2px solid #ccc;">Confirmation Number :'.$res_order[0]['fax_confirmation_num'].' </div>';
        }
        if(!empty($res_order[0]['deliverystate']))
        {
            $deliveryState = $this->getValue("statename", $CFG['table']['state'], "statecode='" .$res_order[0]['deliverystate'] . "'");
        }
        if(!empty($res_order[0]['deliverycity']))
        {
            $deliverycity = $this->getValue("cityname", $CFG['table']['city'], "city_id='" .$res_order[0]['deliverycity'] . "'");
        }
        if(!empty($res_order[0]['deliveryzip']))
        {
            //$deliveryzip   = $this->getValue("zipcode",$CFG['table']['zipcode'],"zipcode_id='".$res_order[0]['deliveryzip']."'");
            $deliveryzip = $res_order[0]['deliveryzip'];
        }
        if(!empty($res_order[0]['deliveryarea']))
        {
            $deliveryarea = $res_order[0]['deliveryarea'];
        }
        
        #if($restDetails[0]['restaurant_delivery'] == 'Yes' && $res_order['0']['deliverytype'] == 'delivery'){
        if ($res_order['0']['deliverytype'] == 'delivery')
        {         
            $deliverychargeamt = $res_order[0]['deliveryamount'];
            $deliverycharge .= '<div style="font-family:Arial;font-weight:bold; font-size:13px;color:#222;margin-bottom:4px;">
															<span style="width:50%;display:inline-block;">Delivery Charge:</span>
															<span style="width:45%;display:inline-block;text-align: right;">' .
                $CFG['site']['currency'] . '' . $deliverychargeamt . '</span>
														</div>';

            $delivery_pickuptype =
                '<div style="font-family:Arial; font-size:40px; font-weight:bold; color:#222; border-top:2px solid #ccc; padding-top:10px; margin-top:20px;">' .
                $res_order['0']['deliverytime'] . ' ' . ucfirst($res_order['0']['deliverytype']) .
                
               /* '<img src="' . $CFG['site']['image_url'] .
                '/mail_delivery.png" alt="" title="" style="margin-left:10px;" /></div>';*/
                
            $deliverydate = '' . $res_order['0']['deliverytime'] . ' on ' . date("d M, Y",
                strtotime($res_order['0']['deliverydate'])) . '';
        }
        if ($res_order[0]['voucher_id'] != '' && $res_order[0]['voucher_price'] > 0) {
            $voucher .= '<div style="font-family:Verdana;font-weight:bold; font-size:13px;color:#222;margin-bottom:4px;">
										<span style="width:50%;display:inline-block;">Voucher Discount Price:</span>
										<span style="width:45%;display:inline-block;text-align: right;"> - ' . $CFG['site']['currency'] .
                '' . number_format($res_order[0]['voucher_price'], 2) . '</span>
									</div>';
        }
        if ($res_order['0']['deliverytype'] == 'pickup')
        {
            $delivery_pickuptype =
                '<div style="font-family:Arial; font-size:40px; font-weight:bold; color:#222; border-top:2px solid #ccc; padding-top:10px; margin-top:20px;">Cash on Collection<img src="' .
                $CFG['site']['image_url'] .
                '/mail_pickup.png" alt="" title="" style="margin-left:10px;" /></div>';
            $deliverydate = '';
        }

        $sel_cart = "SELECT cart_id, menuid, restaurantid, menuname, menutype,addonsname, addonsprice, menuprice, quantity, specialinstruction, tot_menuprice, pizza_size, pizza_crustname, pizza_crustprice, pizza_addonsname, pizza_addons_price FROM " .
            $CFG['table']['restaurant_cart'] . " WHERE sessionid = '" . $sessionId .
            "' AND quantity != '0' AND orderid = '" . $orderId . "' ";
        $res_cart = $this->ExecuteQuery($sel_cart, "select");

        if (count($res_cart) > 0)
        {
            foreach ($res_cart as $key => $value)
            {
                if ($res_cart[$key]['pizza_size'] != ''){
                    $pizza_size = '('.utf8_decode($res_cart[$key]['pizza_size']).')';
                }
                $rowTotal[] = $res_cart[$key]['tot_menuprice'];
                $menuname = $res_cart[$key]['menuname'].' '.$pizza_size;
                $menuprice = $res_cart[$key]['menuprice'];
                $tot_menuprice = $res_cart[$key]['tot_menuprice'];
                $quantity = $res_cart[$key]['quantity'];
                $addonsname = '';
                $addonsprice = '';
                $crustname = '';
                $topping = '';
                $instruction = '';

                if ($res_cart[$key]['addonsname'] != '')
                {
                    $addonsname = '<br> <b>Addons:</b>' . stripslashes($res_cart[$key]['addonsname']);
                    $addonsprice = '('.$CFG['site']['currency'].' ' . $res_cart[$key]['addonsprice'] . ' ' . 'Extra' . ')';
                }
                if ($res_cart[$key]['pizza_crustname'] != '')
                {
                    $crustname = '<br> <b>Crust:</b>' . $res_cart[$key]['pizza_crustname'];
                }
                if ($res_cart[$key]['pizza_addonsname'] != '')
                {
                    $topping = '<br> <b>Topping:</b>' . $res_cart[$key]['pizza_addonsname'];
                }
                if ($res_cart[$key]['specialinstruction'] != '')
                {
                    $instruction = '<br> <b>Instruction:</b>' . $res_cart[$key]['specialinstruction'];
                }

                $menudetails .= '<tr>
											<td align="left" style="height:35px;border-bottom:1px solid #CCC;">' .
                    html_entity_decode($menuname) . ' ' . $addonsname . ' ' . $crustname . ' ' . $topping .
                    ' ' . $instruction . ' </td>
											<td align="center" style="height:35px;border-bottom:1px solid #CCC;">' .
                    $quantity . '</td>
											<td align="left" style="height:35px;border-bottom:1px solid #CCC; text-align: center;">' .
                    $CFG['site']['currency'] . '' . $menuprice . ' '.$addonsprice.'</td>
											<td align="left" style="height:35px;border-bottom:1px solid #CCC; text-align: right;">' .
                    $CFG['site']['currency'] . '' . $tot_menuprice . '</td>
										</tr>';

            }
            /*if(!empty($rowTotal) && is_array($rowTotal))
            {
            $orderSubTotal = array_sum($rowTotal);
            }*/
        }
        $orderSubTotal = $res_order['0']['ordersubtotal'];
        $tax = $res_order['0']['taxvalue'];
        if ($tax != '')
        {
            //$taxamount1 = $orderSubTotal*($tax/100);
            //$taxamount  = number_format($taxamount1,2);
            $taxamount = $res_order['0']['taxamount'];
        }
        $orderGrandTotal = $res_order['0']['ordertotalprice'];
        $instructions = $res_order['0']['instructions'];

        if ($tax != '0.00')
        {
            $taxperchantage = $tax;
        }

        $tipamount = $res_order[0]['tipamount'];
        if ($tipamount != '0.00')
        {
            /*$tipdetails .= '<tr>
            <td>&nbsp;</td><td>&nbsp;</td><td>Tip</td><td>'.$tipamount.'</td>
            </tr>';*/

            $tipdetails .= '<div style="font-family:Arial;font-weight:bold; font-size:13px;color:#222;margin-bottom:4px;">
										<span style="width:50%;display:inline-block;">Tip:</span>
										<span style="width:45%;display:inline-block;text-align: right;">' . $CFG['site']['currency'] .
                '' . $tipamount . '</span>
									</div>';
        }

        $offer_percentage = $res_order['0']['offervalue'];
        if (isset($offer_percentage) && !empty($offer_percentage))
        {

            /*$orderDiscountPrice = $orderSubTotal*($offer_percentage/100);
            $orderDiscountPriceTotal = $orderSubTotal-$orderDiscountPrice;
            $orderGrandTotal = $orderDiscountPriceTotal+$totaltax+$deliverychargeamt+$taxamount;*/
            $orderDiscountPrice = $res_order['0']['offeramount'];

            /*$offerdetails .= '<tr>
            <td style="height:35px;">&nbsp;</td>
            <td style="height:35px;">&nbsp;</td>
            <td style="height:35px;">Discount('.$offer_percentage.' % Off) 	 </td>
            <td style="height:35px;">'.number_format($orderDiscountPrice,2).'</td>
            </tr>';*/
            $offerdetails .= '<div style="font-family:Arial;font-weight:bold; font-size:13px;color:#222;margin-bottom:4px;">
															<span style="width:50%;display:inline-block;">Discount(' . $offer_percentage .
                ' % Off) :</span>
															<span style="width:45%;display:inline-block;text-align: right;"> - ' .
                $CFG['site']['currency'] . '' . number_format($orderDiscountPrice, 2) . '</span>
														</div>';
        }

        if ($res_order['0']['deliverytype'] != 'pickup')
        {
            //Deliver Time
            if ($res_order['0']['foodassoonas'] == '1')
            {
                $deliveryoption = 'ASAP';
            } else
            {
                $deliveryoption = $res_order['0']['deliverydate'] . ' ' . $res_order['0']['deliverytime'];
            }
            $deliveryTime .= '<td>Delivery Time</td><td>:</td><td>' . $deliveryoption .
                '</td>';
        }


        if ($res_order['0']['deliverylandmark'] != '')
        {
            $landmark = 'Landmark:' . $res_order['0']['deliverylandmark'];
        }
        if ($res_order['0']['customerlandline'] != '')
        {
            $landline = 'Landline:' . $res_order['0']['customerlandline'];
        }
        if ($res_order['0']['payment_type'] == 'cod')
        {
            $payment_type = 'Cash on Delivery';
        } else
        {
            $payment_type = $this->My_stripslashes($res_order['0']['payment_type']);
        }

        $restaurant_name = $this->My_stripslashes($restDetails[0]['restaurant_name']);

        if (!empty($res_order['0']['customername']) || !empty($res_order['0']['customerlastname']))
        {
            $fax_cust_addr .= '<div style="font-family:Arial;font-weight:normal; font-size:14px;color:#222; padding-top:20px;">' .
                $this->My_stripslashes($res_order['0']['customername']) . ' ' . $this->
                My_stripslashes($res_order['0']['customerlastname']) . '</div>';
            $fax_cust_addr_bot .=
                '<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">' .
                $this->My_stripslashes($res_order['0']['customername']) . ' ' . $this->
                My_stripslashes($res_order['0']['customerlastname']) . '</div>';
        }
        if (!empty($res_order['0']['customercellphone']))
        {
            $fax_cust_addr .= '<div style="font-family:Arial;font-weight:bold; font-size:22px;color:#222; padding-top:2px;">' .
                $res_order['0']['customercellphone'] . '</div>';
            $fax_cust_addr_bot .=
                '<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">' .
                $this->My_stripslashes($res_order['0']['customercellphone']) . '</div>';
        }
        if (!empty($res_order['0']['deliverydoornumber']))
        {
            $fax_cust_addr .= '<div style="font-family:Arial;font-weight:normal; font-size:14px;color:#222; padding-top:2px;">' .
                $this->My_stripslashes($res_order['0']['deliverydoornumber']) . '</div>';
            $fax_cust_addr_bot .=
                '<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">' .
                $this->My_stripslashes($res_order['0']['deliverydoornumber']) . '</div>';
        }
        if (!empty($res_order['0']['deliverystreet']))
        {
            $fax_cust_addr .= '<div style="font-family:Arial;font-weight:normal; font-size:14px;color:#222; padding-top:2px;">' .
                $this->My_stripslashes($res_order['0']['deliverystreet']) . '</div>';
            $fax_cust_addr_bot .=
                '<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">' .
                $this->My_stripslashes($res_order['0']['deliverystreet']) . '</div>';
        }
        if (!empty($deliveryarea))
        {
            $fax_cust_addr .= '<div style="font-family:Arial;font-weight:normal; font-size:14px;color:#222; padding-top:2px;">' .
                $this->My_stripslashes($deliveryarea) . '</div>';
            $fax_cust_addr_bot .=
                '<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">' .
                $this->My_stripslashes($deliveryarea) . '</div>';
        }
        if (!empty($deliverycity))
        {
            $fax_cust_addr .= '<div style="font-family:Arial;font-weight:normal; font-size:14px;color:#222; padding-top:2px;">' .
                $this->My_stripslashes($deliverycity) . '</div>';
            $fax_cust_addr_bot .=
                '<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">' .
                $this->My_stripslashes($deliverycity) . '</div>';
        }
        if (!empty($deliveryState))
        {
            $fax_cust_addr .= '<div style="font-family:Arial;font-weight:normal; font-size:14px;color:#222; padding-top:2px;">' .
                $this->My_stripslashes($deliveryState) . ' - ' . $this->My_stripslashes($deliveryZip) .
                '</div>';
            $fax_cust_addr_bot .=
                '<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">' .
                $this->My_stripslashes($deliveryState) . ' - ' . $this->My_stripslashes($deliveryzip) .
                '</div>';
        }
        if (empty($deliveryState) && !empty($deliveryzip))
        {
            $fax_cust_addr .= '<div style="font-family:Arial;font-weight:normal; font-size:14px;color:#222; padding-top:2px;">' .
                'Post Code:' . $this->My_stripslashes($deliveryzip) . '</div>';
            $fax_cust_addr_bot .=
                '<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">' .
                'Post Code:' . $this->My_stripslashes($deliveryzip) . '</div>';
        }

        if (!empty($fax_cust_addr))
        {
            $fax_cust_address = '<tr><td>
                                                    ' . $fax_cust_addr . '
                                                </td></tr>';
            $fax_cust_address_bottom = '<td>
                                                    ' . $fax_cust_addr_bot . '
                                                </td>';
        }

        if (!empty($restDetails['0']['restaurant_streetaddress']))
        {
            $res_addr .= '<div style="font-family:Arial;font-weight:normal; font-size:14px;color:#222; padding-top:2px;">' .
                $this->My_stripslashes($restDetails['0']['restaurant_streetaddress']) . '</div>';
            $res_addr_bot .=
                '<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">' .
                $this->My_stripslashes($restDetails['0']['restaurant_streetaddress']) . '</div>';
        }
        if (!empty($resstate))
        {
            $res_addr .= '<div style="font-family:Arial;font-weight:normal; font-size:14px;color:#222; padding-top:2px;">' .
                $this->My_stripslashes($resstate) . '</div>';
            $res_addr_bot .=
                '<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">' .
                $this->My_stripslashes($resstate) . '</div>';
        }
        if (!empty($rescity))
        {
            $res_addr .= '<div style="font-family:Arial;font-weight:normal; font-size:14px;color:#222; padding-top:2px;">' .
                $this->My_stripslashes($rescity) . '</div>';
            $res_addr_bot .=
                '<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">' .
                $this->My_stripslashes($rescity) . '</div>';
        }
        if (!empty($restDetails['0']['restaurant_zip']))
        {
            $res_addr .= '<div style="font-family:Arial;font-weight:normal; font-size:14px;color:#222; padding-top:2px;">' .
                $this->My_stripslashes($restDetails['0']['restaurant_zip']) . '</div>';
            $res_addr_bot .=
                '<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">' .
                $this->My_stripslashes($restDetails['0']['restaurant_zip']) . '</div>';
        }
        if (!empty($res_addr))
        {
            $res_address = '<tr><td>
                                                    ' . $res_addr . '
                                                </td></tr>';
            $res_address_bottom = $res_addr_bot;
        }
        //echo "==============".$res_address_bottom;exit;
        //Address Details
        $cust_address = '';
        if (!empty($res_order['0']['deliverydoornumber']))
            $cust_address .= $this->My_stripslashes($res_order['0']['deliverydoornumber']) .
                ', ';
        if (!empty($res_order['0']['deliverystreet']))
            $cust_address .= $this->My_stripslashes($res_order['0']['deliverystreet']) .
                ', ';
        if (!empty($deliveryarea))
            $cust_address .= $this->My_stripslashes($deliveryarea) . ', ';
        if (!empty($deliverycity))
            $cust_address .= $this->My_stripslashes($deliverycity);
        if (!empty($deliveryzip))
            $cust_address .= " - " . $this->My_stripslashes($deliveryzip);

        //Lanline Details
        if (!empty($landmark))
        {
            $landmark_details = '<td>Landmark</td><td>:</td><td>' . $this->My_stripslashes($landmark) .
                '</td>';
        }
        //Lanline Details
        if (!empty($landline))
        {
            $landline_details = '<td>Landline</td><td>:</td><td>' . $this->My_stripslashes($landline) .
                '</td>';
        }

        //Payment Detils
        if (!empty($transactionId))
        {
            $trasnsId_details = '<td width="18%">Transaction Id</td><td width="2%">:</td><td width="30%">' .
                $transactionId . '</td>';
        } else
        {
            $trasnsId_details = '<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>';
        }
        $order_payment_details = '<tr>
											<td align="left" colspan="3">
												<table width="100%" cellpadding="5" cellspacing="0" border="0" style="border:1px solid #CCC;">
													<tr><td width="18%">Payment Method</td><td width="2%">:</td><td width="30%">' .
            $payment_type . '</td>' . $trasnsId_details . '</tr>
												</table>
											</td>
										</tr>';


        $mail_content = '<table cellspacing="0" cellpadding="0" width="650" align="center" border="0" bgcolor="#fff">
									<tr>
										<td width="62%" valign="top" align="left">
											<table cellspacing="0" cellpadding="0" width="100%" align="center" border="0">
												<tr>
													<td>
													 ' . $delivery_pickuptype . '
													 </td>
												</tr>
												<tr>
													<td>
												    <div style="font-family:Arial; font-size:17px;color:#222; padding-top:10px; padding-bottom:10px; border-bottom:1px solid #ccc;"><span style="font-weight:bold;">' .
            $deliverydate . '</span><br/><span style="font-weight:normal;">Ordered on:' .
            date("M d, Y h:i:s A", strtotime($res_order['0']['orderdate'])) . '</span></div>
													</td>
												</tr>
												<tr>
													<td align="left">
														<div style="font-family:Arial;font-weight:normal; font-size:14px;color:#222;padding-bottom:7px;">' .
            $restaurant_name . ' - ' . $restDetails[0]['restaurant_phone'] . '</div>
													</td>
												</tr>
												<tr>
													<td align="left">
														<div style="font-family:Arial;font-weight:normal; font-size:24px;color:#222;padding-bottom:10px;border-bottom:2px solid #ccc;">ORDER #' .
            $finalorderid . '</div>'.$confirmation_number.'
													</td>
												</tr>
												<tr>
													<td align="left">
														<div style="color:#222;padding-bottom:10px;margin-top:10px;">
															<table cellspacing="0" cellpadding="0" width="100%" align="center" border="0">
																<tr>
																	<td width="5%" style="font-family:Arial; font-weight:bold; font-size:13px; padding:5px;">Menu</td>
                                                                    <td width="5%" style="font-family:Arial; font-weight:bold; font-size:13px; padding:5px;">Qty</td>
																	<td width="5%" style="font-family:Arial; font-weight:bold; font-size:13px; padding:5px;">Menu price</td>
																	<td width="5%" style="font-family:Arial; font-weight:bold; font-size:13px; padding:5px;">Price</td>
																</tr>
																<tr>
																	<td colspan="3">&nbsp;</td>
																</tr>
																' . $menudetails . '
															</table>
														</div>
													</td>
												</tr>
												
												<tr>
													<td align="left">
														<div style="padding-bottom:10px;border:1px solid #ccc; padding-top:10px;">
															<table cellspacing="0" cellpadding="0" width="100%" align="center" border="0">
																<tr>
																	<td width="60%">&nbsp;</td>
																	<td align="right" width="40%">
																		<div style="font-family:Arial;font-weight:bold; font-size:12px;color:#222;padding-bottom:8px; text-align: right; padding-right:10px;">Subtotal: ' .
            $CFG['site']['currency'] . '' . number_format($orderSubTotal, 2) . '</div></td>
																</tr>
                                                                
															</table>
														</div>
													</td>
												</tr>
												' . $order_instruction . '
											</table>
										</td>
										<td width="38%" align="right" valign="top" style="padding-top:20px;padding-left:20px;">
											<table cellspacing="0" cellpadding="0" width="100%" align="left" border="0">
												<tr>
													<td>
														<img src="' . $CFG['site']['logoname'] . '" alt="' . $CFG['site']['sitename'] .
            '" title="' . $CFG['site']['sitename'] . '" />
													</td>
												</tr>
												' . $fax_cust_address . '
												<tr>
													<td>
														<div style="padding-bottom:7px;border:1px solid #ccc; padding-top:7px;font-family:Arial;font-weight:bold; font-size:15px;color:#222; margin-top:20px;margin-bottom:10px; padding-left:5px; padding-right:5px;">
															' . $CFG['site']['currency'] . ' ' . $payment_type . ' 
														</div>
													</td>
												</tr>
												
												' . $order_payment_withid . '
												
												<tr>
													<td align="left">
                                                        <div style="clear:both;font-family:Arial;font-weight:bold; font-size:13px;color:#222;margin-bottom:4px;">
															<span style="width:50%;display:inline-block;">Subtotal: </span>
															<span style="width:45%;display:inline-block;text-align: right;">' .
            $CFG['site']['currency'] . '' . number_format($orderSubTotal, 2) . '</span>
														</div>
                                                       
														<div style="font-family:Arial;font-weight:bold; font-size:13px;color:#222;margin-bottom:4px;">
															<span style="width:50%;display:inline-block;">Tax (' .
            number_format($taxperchantage) . ' %):</span>
															<span style="width:45%;display:inline-block;text-align: right;">' .
            $CFG['site']['currency'] . '' . $taxamount . '</span>
														</div>
														
														' . $deliverycharge . '
														
														' . $offerdetails . '
                                                        
                                                        ' . $tipdetails . '
                                                        ' . $voucher . '
                                                        
														<div style="font-family:Arial;font-weight:bold; font-size:14px;color:#222;margin-bottom:4px;">
															<span style="width:50%;display:inline-block;">Total: </span>
															<span style="width:45%;display:inline-block;text-align: right;">' .
            $CFG['site']['currency'] . '' . number_format($orderGrandTotal, 2) . '</span>
														</div>
													</td>
												</tr>
												<tr>
													<td colspan="3"><div style="border-top:1px dashed #ccc; margin-top:0; margin-top:40px;margin-bottom:5px;height:2px;">&nbsp;</div></td>
												</tr>
												<tr>
													<td align="right">
														<div style="font-family:Arial;font-weight:bold; font-size:13px;color:#222; padding-top:0px;">Customer Signature</div>
													</td>
												</tr>
											</table>
										</td>
									</tr></br>
                                    
                                    
                                    <tr>
													<td align="left">
														<div style="font-family:Arial;font-weight:bold; font-size:12px;color:#222;padding-bottom:8px; text-align: left; padding-right:10px; margin-top:5px;">Customer Instructions:&nbsp;  &nbsp; ' .                                              
            $instructions . '</div></td>              
													
												</tr>
                                    
                                    
                                    
                                    
                                    
									<tr>
										<td colspan="2">
											<table cellspacing="0" cellpadding="0" width="100%" border="0">
												<tr>
													<td colspan="3"><div style="border-top:2px dotted #ccc;margin-top:40px;height:2px; margin-bottom:5px;">&nbsp;</div></td>
												</tr>
												<tr>
													<td colspan="3" align="right"><div style="margin-bottom:10px;font-family:Arial;font-weight:normal; font-size:12px;color:#222;">Tear of Receipt</div></td>
												</tr>
												<tr>
													<td valign="top">
														<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">' .
            $restaurant_name . '</div>
														<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">Order #' .
            $finalorderid . '</div>
														' . $res_address_bottom . '
														<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">Total: ' .
            $CFG['site']['currency'] . '' . number_format($orderGrandTotal, 2) . '</div>
                                                        <div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:13px;color:#222;">Order #' .
            $payment_type . '</div>
													</td>
													' . $fax_cust_address_bottom . '
													<td align="center" width="30%" valign="top">
														<div style="border:1px solid #333; padding-left:5px; padding-right:5px; padding-top:10px; padding-bottom:10px;">
															<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:17px;color:#222;">Questions</div>
															<div style="margin-bottom:2px;font-family:Arial;font-weight:normal; font-size:13px;color:#222;">Customer service is available</div>
															<div style="margin-bottom:2px;font-family:Arial;font-weight:bold; font-size:20px;color:#222;">' .
            $CFG['site']['site_phone'] . '</div>
														</div>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>';
        //echo $mail_content;exit;
        return array($mail_content, $restDetails[0]['restaurant_contact_email'],$restDetails[0]['restaurant_fax'],$restDetails[0]['send_fax_option']);
    }
    #--------------------------------------------------------------------------------------------------------------------------
    #-------------------------------------------------------------------------------------------
    /**
     * Checkout::tipcalculated()
     * 
     * @return
     */
    function tipcalculated()
    {
        global $CFG, $objSmarty;

        if ($_POST['per'] != '')
        {

            $calculateval1 = $_POST['subtot'] * ($_POST['per'] / 100);
        }
        $updatedtotal1 = $calculateval1 + $_POST['grandtotal'];

        $updatedtotal = number_format($updatedtotal1, 2);
        $calculateval = number_format($calculateval1, 2);
        echo $calculateval . '^^' . $updatedtotal .'^^'.$CFG['site']['currency'];
    }
    
    #-------------------------------------------------------------------------------------------------------------------------------------------------------
    #                                                       STRIPE  -  CREDIT CARD PAYMENT
    #-------------------------------------------------------------------------------------------------------------------------------------------------------
    function payment_stripe_payment(){
        
        global $CFG, $objSmarty;
        
        //echo "Hai";
        $path = $CFG['site']['base_path']."/lib/Stripe.php";
         
    	require_once($path);
        
        if($CFG['site']['userfriendly'] == 'Y'){
            $redirecturl = $CFG['site']['base_url_https']."/checkout";
        }else{
            $redirecturl = $CFG['site']['base_url_https']."/checkout.php";
        }  
        
        
        $form_data = '<form name="stripe_payment_failure" action="'.$redirecturl.'" method="post">
        
            <input type=hidden name="resid" value="'.$_REQUEST['restid'].'">
            <input type=hidden name="opentime" value="'.$_REQUEST['opentime'].'">
            <input type=hidden name="closetime" value="'.$_REQUEST['closetime'].'">
            <input type=hidden name="secopentime" value="'.$_REQUEST['secopentime'].'">
            <input type=hidden name="secclosetime" value="'.$_REQUEST['secclosetime'].'">
            <input type=hidden name="deliverypickup" value="'.$_REQUEST['deliverypickup'].'">
            
            <input type=hidden name="contactname" value="'.stripslashes($_POST['contactname']).'">
            <input type=hidden name="contactlastname" value="'.stripslashes($_POST['contactlastname']).'">
            <input type=hidden name="contactemail" value="'.stripslashes($_POST['contactemail']).'">
            <input type=hidden name="contactpassword" value="'.stripslashes($_POST['contactpassword']).'">
            <input type=hidden name="contactphone" value="'.stripslashes($_POST['contactphone']).'">
            
            <input type=hidden name="deliveryaddress" value="'.stripslashes($_POST['deliveryaddress']).'">
            <input type=hidden name="deliverystreet" value="'.stripslashes($_POST['deliverystreet']).'">
            <input type=hidden name="deliverycity" value="'.stripslashes($_POST['deliverycity']).'">
            <input type=hidden name="deliverystate" value="'.stripslashes($_POST['deliverystate']).'">
            <input type=hidden name="deliveryzip" value="'.stripslashes($_POST['deliveryzip']).'">
            
            <input type=hidden name="stripe_houseno" value="'.stripslashes($_POST['stripe_houseno']).'">
            <input type=hidden name="stripe_postcode" value="'.stripslashes($_POST['stripe_postcode']).'">
            <input type=hidden name="stripe_cardtype" value="'.stripslashes($_POST['stripe_cardtype']).'">
            <input type=hidden name="stripe_cardnumber" value="'.stripslashes($_POST['stripe_cardnumber']).'">
            <input type=hidden name="stripe_expmonth" value="'.stripslashes($_POST['stripe_expmonth']).'">
            <input type=hidden name="stripe_expyear" value="'.stripslashes($_POST['stripe_expyear']).'">
            <input type=hidden name="stripe_cvccode" value="'.stripslashes($_POST['stripe_cvccode']).'">
            
            <input type=hidden name="offer" value="'.$_REQUEST['offer'].'">
            <input type=hidden name="offeramount" value="'.$_REQUEST['offeramount'].'">
            <input type=hidden name="subtotal" value="'.$_REQUEST['subtotal'].'">
            <input type=hidden name="taxamount" value="'.$_REQUEST['taxamount'].'">
            <input type=hidden name="deliveryamount" value="'.$_REQUEST['deliveryamount'].'">
            <input type=hidden name="credittipprice" value="'.$_REQUEST['credittipprice'].'">
            <input type=hidden name="ordertotalprice" value="'.$_REQUEST['ordertotalprice'].'">
            
            <input type=hidden name="time_delivery" value="'.$_POST['time_delivery'].'">
            <input type=hidden name="instructions" value="'.stripslashes($_POST['instructions']).'">
            <input type=hidden name="paymentinfo" value="'.$_POST['paymentinfo'].'">';
        
        
            
            //$objSmarty->assign("deliverycharge", $_REQUEST['paymentinfo']);
            
        $tipvalue = $this->filterInput($_REQUEST['credittipprice']);
        #$ordertotalprice_new = $this->filterInput($_POST['ordertotalprice'])+$CFG['site']['site_cc_percentage'];
        $ordertotalprice_new = number_format($this->filterInput($_POST['ordertotalprice']),2);
        
        if($tipvalue == '' || $tipvalue == 0){
            $ordertotalprice 	= $ordertotalprice_new;
        }else{
            $ordertotalprice1 	= $ordertotalprice_new;
            $ordertotalprice    = ($ordertotalprice1+$tipvalue);
        }
        
        $amount = ($ordertotalprice > 0) ? ($ordertotalprice*100) : 0; 
        
        $paymentSettings = $this->getMultiValue("credit_mode, credit_stripe_live, credit_stripe_test", $CFG['table']['setting_payment'], "id='1'");
        
        if($paymentSettings[0]['credit_mode'] == 'live'){
            $strip_publisher_id =  $paymentSettings[0]['credit_stripe_live'];
        } 
        if($paymentSettings[0]['credit_mode'] == 'test'){
            $strip_publisher_id =  $paymentSettings[0]['credit_stripe_test'];   
        } 
        #$strip_publisher_id =  'sk_test_RSZSJBlhkHpxeJHYZzuJHVkI';             
        
        $error   = '';        
        try {
            Stripe::setApiKey($strip_publisher_id);
            if(isset($_POST) && !empty($_POST['stripe_cardnumber']) && !empty($_POST['stripe_expmonth']) && !empty($_POST['stripe_expyear']) && !empty($_POST['stripe_expyear'])) 
            {  
                $stripe_desc = 'order card payment from '.$_POST['contactemail'].' with amount '.$ordertotalprice;
                $card_token = array(
                        'number'    => $_POST['stripe_cardnumber'],
                        'exp_month' => $_POST['stripe_expmonth'],
                        'exp_year'  => $_POST['stripe_expyear'],
                        'cvc'       => $_POST['stripe_cvccode'],
                        'address_line1'=> stripslashes($_POST['stripe_houseno']),
                        'address_zip'  => stripslashes($_POST['stripe_postcode'])
                        );
                
                $payment = Stripe_Charge::create(array( 
                        'amount'        => $amount,
                        'currency'      => 'USD',
                        'card'          => $card_token,
                        "receipt_email" => $_POST['contactemail'],
                        'description'   => $stripe_desc
                    )); 
               
               if(isset($payment) && !empty($payment)){ 
                   #$customer = Stripe_Customer::create(array( "description" => $_POST['contactemail'] )); 
                   $stripe_val = $payment->getStripeSuccessValue();
                   $postarrvalues['transaction_id'] = $stripe_val['id'];
            	   $orderId = $this->restaurantOrder($postarrvalues);	
               }     
            }
        }catch (Stripe_ApiConnectionError $e) {
            // Network problem, perhaps try again.
            $e_json = $e->getJsonBody();
            $error = $e_json['error'];
           
            echo $form_data;
            echo '<input type=hidden name="responsemessage" value="'.$error['message'].'"></form>';
            $objSmarty->assign("deliverycharge", $_REQUEST['deliveryamount']);            
            ?>
            <script>setTimeout(function(){document.stripe_payment_failure.submit();},3000);</script>
            <?php
        } catch (Stripe_InvalidRequestError $e) {
            // You screwed up in your programming. Shouldn't happen!
            $e_json = $e->getJsonBody();
            $error = $e_json['error'];
            #echo "<pre>";print_r($error);echo "</pre>";exit;
               
            echo $form_data;
            echo '<input type=hidden name="responsemessage" value="'.$error['message'].'"></form>';
            $objSmarty->assign("deliverycharge", $_REQUEST['deliveryamount']);            
            ?>
            <script>setTimeout(function(){document.stripe_payment_failure.submit();},3000);</script>
            <?php
        } catch (Stripe_ApiError $e) {
            // Stripe's servers are down!
            $e_json = $e->getJsonBody();
            $error = $e_json['error'];
            #echo "<pre>";print_r($error);echo "</pre>";exit;
               
            echo $form_data;
            echo '<input type=hidden name="responsemessage" value="'.$error['message'].'"></form>';
            $objSmarty->assign("deliverycharge", $_REQUEST['deliveryamount']);            
            ?>
            <script>setTimeout(function(){document.stripe_payment_failure.submit();},3000);</script>
            <?php
        } catch (Stripe_CardError $e) {
            $e_json = $e->getJsonBody();
            $error = $e_json['error'];
            #echo "<pre>";print_r($error);echo "</pre>";exit;
               
            echo $form_data;
            echo '<input type=hidden name="responsemessage" value="'.$error['message'].'"></form>';
            $objSmarty->assign("deliverycharge", $_REQUEST['deliveryamount']);            
            ?>
            <script>setTimeout(function(){document.stripe_payment_failure.submit();},3000);</script>
            <?php
              
        } 
    	#Order Information		
     } 
    #-------------------------------------------------------------------    
}

?>