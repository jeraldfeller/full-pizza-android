<?php

include ("includes/config.inc.php");
#Offline
$objSite->siteOfflineStaus();
#Language
$objSite->languageSession();

#Classes
$objCommon = new Common;
$objRestaurant = new Restaurant;
$objRestaurant->restaurant_unauthetic();
$objThumb = new Thumbnail;
global $objThumb;
#.............................................................................................
#Restaurant Log In Status
if (isset($_SESSION['restaurantownerid']) && !empty($_SESSION['restaurantownerid']))
{
    $restaurantStatus = $objCommon->restaurantLogInStatus();
    if ($restaurantStatus != '1')
    {
        $objRestaurant->restaurantLogout();
    }
}
#.............................................................................................
#Order Count
include_once ("restaurantOwnerMyaccount_orderCount.php");
#.............................................................................................
#--------------------------------------------------------------------------
$restaurantdetail = $objRestaurant->restDetailsMyacc();
$objSmarty->assign("restaurantname", $restaurantdetail[0]['restaurant_name']);
$objSmarty->assign("aboutrestaurant", $restaurantdetail[0]['restaurant_description']);

#--------------------------------------------------------------------------
#echo "<pre>222";print_r($_SESSION);echo "</pre>";
#echo "<pre>";print_r($_FILES);echo "</pre>";

$resid = $_SESSION['restaurantownerid'];

$objSmarty->assign("resid", $resid);
$objSmarty->assign("objRestaurant", $objRestaurant);

#--------------------------------------------------------------------------
#Facebook Tab Added success Message
if (isset($_SESSION['fbapps']) && !empty($_SESSION['fbapps']))
{
    $objSmarty->assign("fbapps_message", $_SESSION['fbapps']);
    unset($_SESSION['fbapps']);
}
#.............................................................................................
#SMARTY ASSIGNING
$objSmarty->assign('objSite', $objSite);
$objRestaurant->reviewsList();
//$objSmarty->display('restaurantOwnerMyaccount.tpl');
$main_content = $objSmarty->fetch('restaurantOwnerMyaccount_reviews.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('restaurantOwnerMyaccount.tpl');

?> 