<?php 
include("includes/config.inc.php");
$objCommon = new Common;
$objSearchDetails	= new SearchDetails;
#.............................................................................................
#echo "<pre>";print_r($_POST);echo "</pre>";
#echo "<pre>";print_r($_SESSION);echo "</pre>";
//exit;

$contactname 		= $objSite->filterInput($_POST['contactname']);
$contactemail 		= $objSite->filterInput($_POST['contactemail']);
$contactpassword 	= $objSite->filterInput($_POST['contactpassword']);
$contactphone 	   	= $objSite->filterInput($_POST['contactphone']);
$contactlandline 	= $objSite->filterInput($_POST['contactlandline']);
$deliveryaddress 	= $objSite->filterInput($_POST['deliveryaddress']);
$deliverystreet 	= $objSite->filterInput($_POST['deliverystreet']);
$deliverylandmark 	= $objSite->filterInput($_POST['deliverylandmark']);
$deliveryarea 		= $objSite->filterInput($_POST['deliveryarea']);
$deliverycity 		= $objSite->filterInput($_POST['deliverycity']);
$deliveryassoonas 	= $objSite->filterInput($_POST['foodassoonas']);
$datedelivery 		= $objSite->filterInput($_POST['datedelivery']);
$hr_delivery 		= $objSite->filterInput($_POST['hr_delivery']);
$min_delivery 		= $objSite->filterInput($_POST['min_delivery']);
$sess_delivery 		= $objSite->filterInput($_POST['sess_delivery']);
$ordertotalprice 	= $objSite->filterInput($_POST['ordertotalprice']);
$instructions 		= $objSite->filterInput($_POST['instructions']);
$deliverypickup 	= $objSite->filterInput($_POST['deliverypickup']);
$offer 	= $objSite->filterInput($_POST['offer']);
if($deliveryassoonas == '0'){
	$deliverytime 	= $hr_delivery.':'.$min_delivery.' '.$sess_delivery;
}else{
	$deliverytime 	= '';
}		
$paypaltype 	    = $objSite->filterInput($_POST['paypal_type']);
if($_SESSION['customerid'] == ''){
	$ins_cus = "INSERT INTO 
					  ".$CFG['table']['customer']."
					SET
					   customer_name 		= '".$contactname."',
					   customer_buildtype 	= '".$deliveryaddress."',
					   customer_crossstreet = '".$deliverystreet."',
					   customer_city 		= '".$deliverycity."',
					   customer_area 		= '".$deliveryarea."',
					   customer_phone 		= '".$contactphone."',
					   customer_email 		= '".$contactemail."',
					   customer_password 	= '".$contactpassword."',
					   addeddate 			= now() ";
	$lastins_cusid = $objSite->ExecuteQuery($ins_cus, "insert");
}else{
	$lastins_cusid = $objSite->filterInput($_SESSION['customerid']);
}
//if(isset($_POST['ordertotalprice']) && $_POST['ordertotalprice'] > 0)
//{
	$total = $objSite->filterInput($_POST['ordertotalprice']);
	$restid = base64_encode($objSite->filterInput($_POST['restid']));
	$cusid  = base64_encode($lastins_cusid);
	//$amount = 0.01;
	
//echo "<br>cus-->".$cusid;
//exit;
	
	$objSearchDetails	= new SearchDetails;
	$getpaypalDet=$objSite->getMultiValue("paypal_mode,paypal_url_live,business_live,paypal_url_test,business_test",$CFG['table']['setting_payment'],"id = '1'");
	$paypalmode = $getpaypalDet[0]['paypal_mode'];
	if($paypalmode == 'Live'){
		$server   = $getpaypalDet[0]['paypal_url_live'];
		$business = $getpaypalDet[0]['business_live'];
	}else{
		$server   = $getpaypalDet[0]['paypal_url_test'];
		$business = $getpaypalDet[0]['business_test'];
	}
	//$server = 'www.sandbox.paypal.com';$_REQUEST['PHPSESSID']
	
	$getrestDet = $objSite->GetMultivalue("restaurant_name,restaurant_salestax,restaurant_delivery_charge,restaurant_minorder_price,restaurant_delivery",$CFG['table']['restaurant'],"restaurant_id = '".$_REQUEST['restid']."'");
	if($getrestDet[0]['restaurant_delivery'] == 'Yes'){
		$deliverychargeamt = $getrestDet[0]['restaurant_delivery_charge'];
		//$shipping = $deliverychargeamt;
	}
	//$tax = $getrestDet[0]['restaurant_salestax'];
	$shipping = $getrestDet[0]['restaurant_salestax']+$deliverychargeamt;
	
	$sel_cart = "SELECT cart_id, menuid, restaurantid, menuname, menutype, addonsname, addonsprice, menuprice, quantity, specialinstruction, tot_menuprice, pizza_size, pizza_crustname, pizza_crustprice, pizza_addonsname, pizza_addons_price FROM ".$CFG['table']['restaurant_cart']." WHERE sessionid = '".session_id()."' AND quantity != '0' ";
	$res = $objSite->ExecuteQuery($sel_cart, "select");
	$i = 1;
	$j = 1;
	$k = 1;
	foreach($res as $key=>$value){
		
		$menutotamount = $res[$key]['menuprice']+$res[$key]['addonsprice']+$res[$key]['pizza_crustprice']+$res[$key]['pizza_addons_price'];
		
		$input .='<input type=hidden name="item_name_'.$i++.'" value="'.$res[$key]['menuname'].'"/>
				  <input type=hidden name="amount_'.$j++.'" value="'.$menutotamount.'"/>
				  <input type=hidden name="quantity_'.$k++.'" value="'.$res[$key]['quantity'].'"/>';
		
	}
		
	$orderId   = $objSearchDetails->buyProduct();
	#$goBackUrl = $CFG['site']['base_url']."/success.php?action=buyProdSucc&orderId=".$orderId;
	$goBackUrl = $CFG['site']['base_url']."/thanks.php?action=buyProdSucc&orderId=".$orderId."&restid=".$restid."&customerid=".$cusid."&landmark=".$deliverylandmark."&landline=".$contactlandline."&deliverytype=".$deliverypickup."&foodassoonas=".$deliveryassoonas."&deliverydate=".$datedelivery."&deliverytime=".$deliverytime."&instructions=".$instructions."&offervalue=".$offer."&total=".$total;
	//$notify    = $CFG['site']['base_url']."/success.php?action=update&task=product&orderId=".$orderId."&amount=".$amount;
	$cancelUrl = $CFG['site']['base_url']."/index.php";
	$site_name = $CFG['site']['sitename'];
	//$business = "paypal@roamsoft.in";
	//$business = "paul@roamsofttech.com";
	
	echo '<form name= "paypal" action="https://'.$server.'/cgi-bin/webscr" method="post" id="paypal_form">';
	#echo '<input type=hidden name=amount value="'.$amount.'" />';
	echo '<input type=hidden name=business value="'.$business.'" />
		  <input type=hidden name=cmd value="_cart" />
		  <input type=hidden name=upload value="1">
		  <input type=hidden name=currency_code value="USD" />
		  '.$input.'
		  
		  <input type="hidden" name="shipping_1" value="'.$shipping.'" />
		  <input type=hidden name=payer_id value=1 />
		  <input type=hidden name=payer_email value="" />
		  <input type=hidden name=custom value=10/>
		  <input type=hidden name=return value="'.$goBackUrl.'"/>
		  <input type=hidden name=cancel_return value="'.$cancelUrl.'"/>
		  <input type=hidden name=rm value="2" />
		  <input type="hidden" name="bn" value="'.$site_name.'" />
		  <input type="hidden" name="cbt" value="Return to '.$site_name.' " />
          <br />';
	echo '</form>';

//}

//exit;
	
#.............................................................................................

?>
<script>
document.paypal.submit();
</script>