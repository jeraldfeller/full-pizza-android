<?php 
include("includes/config.inc.php");
#Offline
$objSite->siteOfflineStaus();
#Language
$objSite->languageSession();

$objCustomer = new Customer;

$objCustomer->customer_authetic();
#.............................................................................................
$objCustomer->contentList();

#---------------------------------------------------------------------------------------------
#show state value and city value and zip value
$objSite->showStateList();
$objCommon->termsList();
//$objSite->showcityList();
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('customerRegister.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');
?>