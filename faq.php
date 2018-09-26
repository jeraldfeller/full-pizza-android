<?php 
include("includes/config.inc.php");
#Offline
$objSite->siteOfflineStaus();
#Language
$objSite->languageSession();
#.............................................................................................
$objCommon = new Common;
#.............................................................................................

	# Static Content 
	$objCommon->staticFaqList();
	
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('faq.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');
?>