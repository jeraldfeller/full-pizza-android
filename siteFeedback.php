<?php 
include("includes/config.inc.php");
#Offline
$objSite->siteOfflineStaus();
#Language
$objSite->languageSession();
#.............................................................................................
if( !isset($_SESSION['restaurantownerid']) && empty($_SESSION['restaurantownerid']) ){
	$objSite->redirectUrl($CFG['site']['base_url'].'/restaurantOwnerLogin.php?page=feedback');
}	
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('siteFeedback.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');
?>