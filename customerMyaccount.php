<?php 
include("includes/config.inc.php");
#Offline
$objSite->siteOfflineStaus();
#Language
$objSite->languageSession();
$objCommon = new Common;
$objCustomer = new Customer;
$objCustomer->customer_unauthetic();
#.............................................................................................
	/*#Customer Log In Status
	if(isset($_SESSION['customerid']) && !empty($_SESSION['customerid'])){
		$customerStatus  = $objCommon->customerLogInStatus();
		if($customerStatus != '1'){
			$objCustomer->customerLogout();
		}
	}*/
#.............................................................................................
	#Customer Details
    $objCustomer->customerMyFavoritesList();
    $objCustomer->addressBookList();
	$objSite->showStateList();	
    $customer_addresscity = $objSite->getValue("customer_state",$CFG['table']['customer'],"customer_id = '".$objSite->filterInput($_SESSION['customerid'])."'");
    $customer_addressdistrict = $objSite->getValue("customer_city",$CFG['table']['customer'],"customer_id = '".$objSite->filterInput($_SESSION['customerid'])."'");
    #$objSite->showcityList($customer_addresscity);
    #$objSite->showzipList($customer_addressdistrict);
    $objCustomer->customerProfileDetails();
    $objSmarty->assign('objSite',$objSite);
#.............................................................................................
#SMARTY ASSIGNING 
/*$objSmarty->display('customerMyaccount.tpl');*/
$objSmarty->assign("objCustomer", $objCustomer);
$main_content = $objSmarty->fetch('customerMyaccount.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');
?> 