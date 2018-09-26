<?php 
include("includes/config.inc.php");
$objSite->languageSession();
#SMARTY ASSIGNING 
$ACTUAL_PAGE = 'home';
$main_content = $objSmarty->fetch('home.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->assign("ACTUAL_PAGE", $ACTUAL_PAGE);
$objSmarty->display('main.tpl');
?>