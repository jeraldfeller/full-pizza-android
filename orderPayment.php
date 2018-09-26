<?php 
include("includes/config.inc.php");
#Language
$objSite->languageSession();
#.............................................................................................

#echo "<pre>";print_r($_REQUEST);echo "</pre>";
#exit;

# --------------------- Cash On Delivery ------------------------------  #
if( isset($_POST['paymentinfo']) && !empty($_POST['paymentinfo']) && ($_POST['paymentinfo']=='cod') ){
    #echo "cod";exit;
	$objCheckout = new Checkout();
    $postarrvalues = '';
	$orderId = $objCheckout->restaurantOrder($postarrvalues);	
}
# --------------------- Group Iso Payment ------------------------------  #
elseif( isset($_POST['paymentinfo']) && !empty($_POST['paymentinfo']) && ($_POST['paymentinfo']=='GIP') ){
	
	$objGIP = new GroupIsoPayment;
	global $objGIP;
	
	$objCheckout = new Checkout();
    $postarrvalues = '';
	$orderId = $objCheckout->restaurantOrder($postarrvalues);	
}
# --------------------- Authorize.Net ------------------------------  #
elseif( isset($_POST['paymentinfo']) && !empty($_POST['paymentinfo']) && ($_POST['paymentinfo']=='authorizenet') ){
	
	$card_type			= $objSite->filterInput($_POST['cardtype']);
	$card_holdername	= $objSite->filterInput($_POST['cardholdername']);
	$card_number		= $objSite->filterInput($_POST['cardnumber']);
	$card_cvccode		= $objSite->filterInput($_POST['cvccode']);
	$card_expmon		= $objSite->filterInput($_POST['expmonth']);
	$card_expyear		= $objSite->filterInput($_POST['expyear']);		
	$expdate = $card_expmon.'-'.$card_expyear;
	
	//$paymentprice       = $_POST['ordertotalprice'];
    
    $tipvalue = $_REQUEST['credittipprice'];
    if($tipvalue == '' || $tipvalue == 0){
        $paymentprice 	= $objSite->filterInput($_POST['ordertotalprice']);
    }else{
        $ordertotalprice1 	= $objSite->filterInput($_POST['ordertotalprice']);
        $paymentprice    = $ordertotalprice1+$tipvalue;
    }
	//echo "<pre>";print_r($_REQUEST);echo "</pre>";
	//exit;
	
	#Get Credit Info
	$creditcardinfo['0']['cardnumber'] 		= $card_number;
	$creditcardinfo['0']['cvccode'] 		= $card_cvccode;
	$creditcardinfo['0']['expdate'] 		= $expdate;
	$creditcardinfo['0']['paymentamount'] 	= $paymentprice;
	$creditcardinfo['0']['paymentdesc'] 	= "Order Payment";
	
	#Do Payment
	$paymentResponse = $objSite->do_user_payment($creditcardinfo);
	//echo "<pre>";print_r($paymentResponse);echo "</pre>";
	//exit;
    
	if($paymentResponse[0]==1 && $paymentResponse[1]==1 && $paymentResponse[2]==1){
		
		$objCheckout = new Checkout();
		
		$postarrvalues['transaction_id'] = $paymentResponse[6];
		$postarrvalues['trans_auth_id'] = $paymentResponse[37];
		$postarrvalues['pay_cardno'] = $paymentResponse[50];
		$postarrvalues['pay_cardtype'] = $paymentResponse[51];
		
		$orderId = $objCheckout->restaurantOrder($postarrvalues);	
	
	}else{
		// payment failed.
	    $objSmarty->assign('paymentError',$paymentResponse[3]);
	}
}
#---------------------- SRIPE PAYMENT GATEWAY ----------------  #
elseif( isset($_POST['paymentinfo']) && !empty($_POST['paymentinfo']) && $_POST['paymentinfo']=='creditcard' ){
    
    echo '<div align="center" style="text-align:center;margin:100px;"><h1>Processing your request. Please wait...</h1><br /><img src="'.$CFG['site']['image_url'].'/processing.gif'.'" alt="Loading" title="Loading" /></div>';
   
    $objCheckout = new Checkout();
    $objCheckout->payment_stripe_payment();	
}  
# --------------------- Pay Pal ------------------------------  #
elseif( isset($_POST['paymentinfo']) && !empty($_POST['paymentinfo']) && ($_POST['paymentinfo']=='paypal') ){
    
	$objSearchDetails	= new SearchDetails;
	$objCheckout = new Checkout();
    $postarrvalues = '';
	$lastorderid = $objCheckout->restaurantOrder($postarrvalues);	
	
	$restid = base64_encode($_POST['restid']);
	
	$getpaypalDet=$objSite->getMultiValue("paypal_mode,paypal_url_live,business_live,paypal_url_test,business_test",$CFG['table']['setting_payment'],"id = '1'");
	$paypalmode = $getpaypalDet[0]['paypal_mode'];
	if($paypalmode == 'Live'){
		$server   = $getpaypalDet[0]['paypal_url_live'];
		$business = $getpaypalDet[0]['business_live'];
	}else{
		$server   = $getpaypalDet[0]['paypal_url_test'];
		$business = $getpaypalDet[0]['business_test'];
	}
	
	$getrestDet = $objSite->GetMultivalue("restaurant_name,restaurant_salestax,restaurant_delivery_charge,restaurant_minorder_price,restaurant_delivery",$CFG['table']['restaurant'],"restaurant_id = '".$objSite->filterInput($_REQUEST['restid'])."'");
	/*if($getrestDet[0]['restaurant_delivery'] == 'Yes'){
		$deliverychargeamt = $getrestDet[0]['restaurant_delivery_charge'];
	}*/
	
	$sel_order = "SELECT tipamount,deliverytype,ordertotalprice FROM ".$CFG['table']['order']." WHERE orderid = '".$lastorderid."' ";
	$res_order = $objSite->ExecuteQuery($sel_order,'select');
    
	/*if($res_order[0]['deliverytype'] != 'pickup'){
		$deliverychargeamt = $getrestDet[0]['restaurant_delivery_charge'];
	}
    
    $tipamt = $res_order[0]['tipamount'];
    if($tipamt != '0.00'){
        $tipamount = $tipamt;
    }
	
	$sel_cart = "SELECT cart_id, menuid, restaurantid, menuname, menutype, addonsname, addonsprice, menuprice, quantity, specialinstruction, tot_menuprice, pizza_size, pizza_crustname, pizza_crustprice, pizza_addonsname, pizza_addons_price FROM ".$CFG['table']['restaurant_cart']." WHERE sessionid = '".session_id()."' AND quantity != '0' ";
	$res = $objSite->ExecuteQuery($sel_cart, "select");
	$i = 1;
	$j = 1;
	$k = 1;
	foreach($res as $key=>$value){
		$rowTotal[]= $res[$key]['tot_menuprice'];
		$menutotamount = $res[$key]['menuprice']+$res[$key]['addonsprice']+$res[$key]['pizza_crustprice']+$res[$key]['pizza_addons_price'];
		
		$input .='<input type=hidden name="item_name_'.$i++.'" value="'.$res[$key]['menuname'].'"/>
				  <input type=hidden name="amount_'.$j++.'" value="'.$menutotamount.'"/>
				  <input type=hidden name="quantity_'.$k++.'" value="'.$res[$key]['quantity'].'"/>';
		
	}
	if(!empty($rowTotal) && is_array($rowTotal))
	{
		$orderSubTotal = array_sum($rowTotal);
	}
	
	$tax = $getrestDet[0]['restaurant_salestax'];
	if($tax != ''){
		$taxamount = $orderSubTotal*($tax/100);
	}*/
	//$shipping = $taxamount+$deliverychargeamt+$tipamount;
    
    $ordertotalprice = $res_order[0]['ordertotalprice'];
	
	$paymentId   = $objSearchDetails->buyProduct();
	
	$paymentId    = base64_encode($paymentId);
	$lastorderid  = base64_encode($lastorderid);
	
	/*$goBackUrl = $CFG['site']['base_url']."/thanks.php?action=buyProdSucc&orderId=".$orderId."&restid=".$restid."&customerid=".$cusid."&landmark=".$deliverylandmark."&landline=".$contactlandline."&deliverytype=".$deliverypickup."&foodassoonas=".$deliveryassoonas."&deliverydate=".$datedelivery."&deliverytime=".$deliverytime."&instructions=".$instructions."&offervalue=".$offer."&total=".$total;*/
	$goBackUrl = $CFG['site']['base_url']."/thanks.php?action=buyProdSucc&paymentId=".$paymentId."&restid=".$restid."&orderid=".$lastorderid;
	$cancelUrl = $CFG['site']['base_url']."/index.php";
	$site_name = $CFG['site']['sitename'];
    
    $itemname = 'Current Purchase';
	
	echo '<form name= "paypal" action="https://'.$server.'/cgi-bin/webscr" method="post" id="paypal_form">';
	echo '<input type=hidden name=amount value="'.$ordertotalprice.'" />';
	echo '<input type=hidden name=business value="'.$business.'" />
		  <input type=hidden name=cmd value="_xclick" />
          <input type=hidden name="item_name" value="'.$itemname.'"/>
		  <input type=hidden name=upload value="1">
		  <input type=hidden name=currency_code value="USD" />
		  <input type=hidden name=payer_id value=1 />
		  <input type=hidden name=payer_email value="" />
		  <input type=hidden name=custom value=10/>
          <input type="hidden" name="tx" value="TransactionID">
		  <input type=hidden name=return value="'.$goBackUrl.'"/>
		  <input type=hidden name=cancel_return value="'.$cancelUrl.'"/>
		  <input type=hidden name=rm value="2" />
		  <input type="hidden" name="bn" value="'.$site_name.'" />
		  <input type="hidden" name="cbt" value="Return to '.$site_name.' " />';
    echo '<div align="center" style="text-align:center;margin:100px;font-family:Verdana;"><h1>Your payment request is processing. Please wait...</h1><br /><img src="'.$CFG['site']['image_url'].'/loader.gif'.'" alt="Loading" title="Loading" /></div>';
	echo '</form>';
	?>
	<script>setTimeout(function(){document.paypal.submit();},3000);</script>

	<?php
}
# --------------------- PayPal Pro ( Do Direact Method ) ------------------------------  #
elseif( isset($_POST['paymentinfo']) && !empty($_POST['paymentinfo']) && ($_POST['paymentinfo']=='paypalpro') ){
    
    $objCheckout = new Checkout();
    $postarrvalues = '';
	$orderId = $objCheckout->restaurantOrder($postarrvalues);
    
    #$onlinepaymentfee = $objSite->getValue("site_cc_percentage",$CFG['table']['sitesetting'],"id = '1'");
    $totalamount = $objSite->filterInput($_POST['ordertotalprice']);
    
    $amount 	= urlencode($totalamount);
    //$amount 	= urlencode('0.10');
	//$invnum 	= session_id();
	$firstName 	= urlencode($_POST['cardholderfirstname']);
	$lastName 	= urlencode($_POST['cardholderlastname']);
	$address1 	= urlencode($_POST['deliverystreet']);
	$city 		= urlencode($_POST['deliverycity']);
	$state 		= urlencode($_POST['deliverystate']);
	$zip 		= urlencode($_POST['deliveryzip']);
	//$country 	= SITE_COUNTRY_SHRT;
    $country 	= urlencode('UK');
    $creditCardType   = urlencode($_POST['cardtype']);
    $creditCardNumber = urlencode($_POST['cardnumber']);
    $expDateMonth     = urlencode($_POST['expmonth']);
    $padDateMonth     = urlencode(str_pad($expDateMonth, 2, '0', STR_PAD_LEFT));
    $expDateYear      = urlencode($_POST['expyear']);
    $cvv2Number       = urlencode($_POST['cvccode']);
    $currencyID       = urlencode('GBP');	
    $paymentType      = urlencode('Sale');		// or 'Sale'/'Authorization'
    
    $nvpStr =	"&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber".
			    "&EXPDATE=$padDateMonth$expDateYear&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName".
			    "&STREET=$address1&CITY=$city&STATE=$state&ZIP=$zip&COUNTRYCODE=$country&CURRENCYCODE=$currencyID";
       
    
    //echo "<br>nvpstr-->".$nvpStr;
                
    // Execute the API operation; see the PPHttpPost function above.
    //$httpParsedResponseAr = PPHttpPost('DoDirectPayment', $nvpStr);
    $httpParsedResponseAr = $objSite->doDirectPayment('DoDirectPayment', $nvpStr); 
    
    //echo "<pre>";print_r($httpParsedResponseAr);echo "</pre>";
    //exit;
    
    if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
        
        //$lastorderid  = base64_encode($orderId);
        $resid = $objSite->filterInput($_REQUEST['restid']);
        $objCheckout->updateDoDirectPayment($orderId,$resid);
    	//exit('Direct Payment Completed Successfully: '.print_r($httpParsedResponseAr, true));
    } else  {
        
        $resid = $objSite->filterInput($_REQUEST['restid']);
        $objCheckout->updateDoDirectPayment_failure($orderId,$resid);
    	//exit('DoDirectPayment failed: ' . print_r($httpParsedResponseAr, true));
    }   
    
}
# -------------------- Ideal Payment Gateway -------------------------------#
#Ideal Payment Method
elseif( isset($_POST['paymentinfo']) && !empty($_POST['paymentinfo']) && ($_POST['paymentinfo']=='ideal') ){
    
    if(isset($_POST['ordertotalprice']) && $_POST['ordertotalprice'] > 0){
        
        $amount1 = $_POST['ordertotalprice'];
        //Call Google API
	    $google_url = "http://rate-exchange.appspot.com/currency?from=USD&to=EUR" ;
        //Get and Store API results into a variable
	    $result = file_get_contents($google_url);
        //Explode result to convert into an array
    	$result = explode('"', $result);
    	
    	$google_url = "http://rate-exchange.appspot.com/currency?from=USD&to=EUR" ;
        //Get and Store API results into a variable
	    $result = file_get_contents($google_url);
        //Explode result to convert into an array
    	$result = explode(':', $result);
        $splitamt = explode(",",$result[2]);
    	$conversion1 = $splitamt[0] * $amount1;
    	$conversionamount = round($conversion1, 2);
    	
    	if($conversionamount >= '84'){
    	    $objCheckout = new Checkout();
            $postarrvalues = '';
        	$orderId = $objCheckout->restaurantOrder($postarrvalues);
            
            //Ideal Account Details
            $rtlo=75263;
            
            $description = 'Food online order'; // Maximum 32 characters
            //$amount      = $_POST['ordertotalprice'];
            $amount      = $conversionamount;
            
            $id = $orderId;
            $returnurl="http://comeneat.com/platinum/thanks.php?action=Ideal&orderid=".$id;
            $reporturl="http://comeneat.com/platinum/thanks.php?action=Ideal&orderid=".$id;
            
            if( isset ($_REQUEST['bank'])) { 
                $url = $objSite->StartTransaction($rtlo, $_REQUEST['bank'], $description,$amount, $returnurl, $reporturl);
                header( "Location: ". $url );
            }
    	}
        else{
            
           $resid   = $objSite->filterInput($_REQUEST['restid']);
           $resname = $objSite->getValue("restaurant_seourl",$CFG['table']['restaurant'],"restaurant_id = '".$resid."'");
           $objSite->redirectUrl($CFG['site']['base_url']."/restaurantDetails.php?resid=".$resid."&resname=".$resname."&lowamt=ideal");
         
    	   /*if($CFG['site']['userfriendly'] == 'Y'){
               $objSite->redirectUrl($CFG['site']['base_url']."/menu/".$resid."/".$resname);
           }else{
               $objSite->redirectUrl($CFG['site']['base_url']."/restaurantDetails.php?resid=".$resid."&resname=".$resname);
           }*/
    	}
    }
    
    
}    

#.............................................................................................
#SMARTY ASSIGNING 
//if($_POST['paymentinfo'] != 'paypal' && $_POST['paymentinfo'] != 'creditcard' ){
if($_POST['paymentinfo'] != 'paypal'){
	$main_content = $objSmarty->fetch('orderPayment.tpl');
	$objSmarty->assign("MAIN_CONTENT", $main_content);
	$objSmarty->display('main.tpl');
}

?>