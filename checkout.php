<?php 
include("includes/config.inc.php");
#Offline
$objSite->siteOfflineStaus();
#Language
$objSite->languageSession();
#.............................................................................................
$objSearchDetails	= new SearchDetails;
$objCommon = new Common;
$objCustomer	= new Customer;

#echo "<pre>";print_r($_REQUEST);echo "</pre>";
#.............................................................................................]

//print_r($_SESSION);
    $_SESSION['deliverypickup'] = $_POST['deliverypickup'];
	//echo "delivery pickup recibido: ";
	//echo $_POST['deliverypickup'];
	if( isset($_SESSION['customerid']) && !empty($_SESSION['customerid']) ){
	   //echo "ho";
		$objSearchDetails->customerDetails($_SESSION['customerid']);
        $objSite->showcityList($customerDetails[0]['customer_state']);
	    //$objSite->showzipList($customerDetails[0]['customer_city']);
	    $objCustomer->addressBookList();
	}
	
	#Menu Cart Order Details
	$objSearchDetails->menuCartList();
	
	#------------------------------state,city,zipcode------------------------
    
	$objSite->showStateList();	
	
	
	#Restaurant Details
	if( !empty($_REQUEST['resid']) ){
		$restaurantdet = $objSite->getMultivalue("restaurant_name,restaurant_seourl,restaurant_streetaddress,restaurant_city,restaurant_zip",$CFG['table']['restaurant'],"restaurant_id = '".$objSite->filterInput($_REQUEST['resid'])."'");
		$objSearchDetails->restaurantDetailsPaymentMethod($_REQUEST['resid']);
	}
	$restaurant_city  = $objSite->getValue("cityname",$CFG['table']['city'],"city_id = '".$objSite->filterInput($restaurantdet['0']['restaurant_city'])."' ");
	
#Exp Month

if(!empty($_REQUEST['stripe_expmonth'])) {
    $refid = $_REQUEST['stripe_expmonth']; 
} else {
    $refid = '';
}
$expmonth_list = $objSite->expMonthList($refid);
$objSmarty->assign('EXP_MONTH_LIST', $expmonth_list);

if(!empty($_REQUEST['stripe_expyear'])) {
    $refid = $_REQUEST['stripe_expyear']; 
} else {
    $refid = '';
}
#Exp Year
$expyear_list = $objSite->expYearList($refid);
$objSmarty->assign('EXP_YEAR_LIST', $expyear_list);

$rest_addr = $restaurantdet[0]['restaurant_streetaddress'].','.$restaurant_city.'-'.$restaurantdet[0]['restaurant_zip'];
$rest_address = strlen($rest_addr) > 40 ? substr($rest_addr,0,40)."..." : $rest_addr;

$objSmarty->assign("restaurantname", $restaurantdet[0]['restaurant_name']);
$objSmarty->assign("restaurantseourl", $restaurantdet[0]['restaurant_seourl']);
$objSmarty->assign("restaurant_streetaddress", $rest_address);
$objCommon->termsList();

$objSite->checkdatePickerDate($_REQUEST['resid']);
//$objSite->SelectBank();
//Check Vocher Available Or Not
$objSite->checkAnyVoucher($_REQUEST['resid']);
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('checkout.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');
?>