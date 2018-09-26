<?php 
include("includes/config.inc.php");
#Offline
$objSite->siteOfflineStaus();
#Language
$objSite->languageSession();

$objRestaurant	= new Restaurant;
$objRestaurant->restaurant_authetic();
#.............................................................................................
$objCommon = new Common;
$objCommon->termsList();
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('restaurantOwnerLogin.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');
?>