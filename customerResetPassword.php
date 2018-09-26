<?php 
include("includes/config.inc.php");
#Offline
$objSite->siteOfflineStaus();
#Language
$objSite->languageSession();

$objCustomer = new Customer;
$objCustomer->customer_authetic();
#.............................................................................................
	
if( isset($_REQUEST['action']) && $_REQUEST['action'] == 'customerreset' ){
	
	$objCustomer->customerResetPassword($_GET['ui']);
}
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('customerResetPassword.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');
?>