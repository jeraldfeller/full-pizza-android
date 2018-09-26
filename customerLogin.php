<?php

include ("includes/config.inc.php");
#Offline
$objSite->siteOfflineStaus();
#Language
$objSite->languageSession();

$objCustomer = new Customer;
$objCustomer->customer_authetic();
#.............................................................................................
#echo "<pre>";print_r($_REQUEST);echo "</pre>";
#Activation Link
if (isset($_GET['ui']) && !empty($_GET['ui']))
{
    $objCustomer = new Customer;
    $scmsg = $objCustomer->Email_Activation($_GET['ui']);
    $objSmarty->assign('message', $scmsg);
}

#RememberMe Option
if (isset($_COOKIE['cookie_userMail']) && !empty($_COOKIE['cookie_userMail']) &&
    isset($_COOKIE['cookie_userPassword']) && !empty($_COOKIE['cookie_userPassword']))
{
    $objSmarty->assign("cookieusermail", $_COOKIE['cookie_userMail']);
    $objSmarty->assign("cookieuserpassword", $_COOKIE['cookie_userPassword']);
}
#.............................................................................................
#SMARTY ASSIGNING
$main_content = $objSmarty->fetch('customerLogin.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');

?>