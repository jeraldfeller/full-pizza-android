<?php 
include("includes/config.inc.php");
#Offline
$objSite->siteOfflineStaus();
#Language
$objSite->languageSession();

$objRestaurant	= new Restaurant;
$objRestaurant->restaurant_authetic();
#.............................................................................................
$objSite->showStateList();
$objRestaurant->siteFeedbackList();
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('restaurantOwnerRegister.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');
?>