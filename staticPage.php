<?php 
include("includes/config.inc.php");
#Offline
$objSite->siteOfflineStaus();
#Language
$objSite->languageSession();
#.............................................................................................
if(isset($_GET['contentpage']) && !empty($_GET['contentpage']) ){
	
	$objCommon = new Common;
	
	# Static Content 
	$objCommon->staticContentList($_GET['contentpage']);
}
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('staticPage.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');
?>