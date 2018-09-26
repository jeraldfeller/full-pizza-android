<?php 
include("includes/config.inc.php");
#Offline
$objSite->siteOfflineStaus();
#Language
$objSite->languageSession();

$objRestaurant	= new Restaurant;
$objRestaurant->restaurant_authetic();
#.............................................................................................
	
if( isset($_REQUEST['action']) && $_REQUEST['action'] == 'restaurantreset' ){
	
	$objRestaurant->restaurantResetPassword($_GET['ui']);
}
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('restaurantResetPassword.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');
?>