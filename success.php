<?php 
include("includes/config.inc.php");
#Offline
$objSite->siteOfflineStaus();
#Language
$objSite->languageSession();

#$objCommon = new Common;
#$objSearchDetails	= new SearchDetails;
#----------------------------------------------------------------------
#echo "<pre>";print_r($_REQUEST);echo "</pre>";
    
	
	if( ($_GET['action']) && $_GET['action']=="cusRegSucc"){
		
		$scmsg='Your register has been added successfully, please check your email and activate your account';
	}
	
	$objSmarty->assign("scmsg",$scmsg);	
	$main_content = $objSmarty->fetch('success.tpl');
	$objSmarty->assign("MAIN_CONTENT", $main_content);
	$objSmarty->display('main.tpl');

?>