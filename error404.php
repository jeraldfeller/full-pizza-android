<?php 
include("includes/config.inc.php");
#Offline
$objSite->siteOfflineStaus();
#Language
$objSite->languageSession();
#.............................................................................................
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('error404.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');
#$objSmarty->display('error404.tpl');
?>