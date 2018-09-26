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

#--------------------------------------------------------------------------
$restaurantdetail = $objRestaurant->restDetailsMyacc();
$objSmarty->assign("restaurantname", $restaurantdetail[0]['restaurant_name']);
$objSmarty->assign("aboutrestaurant", $restaurantdetail[0]['restaurant_description']);

#--------------------------------------------------------------------------
#.............................................................................................
#Order Count
include_once ("restaurantOwnerMyaccount_orderCount.php");
#.............................................................................................

$objRestaurant->addonsList();

$resid = $_SESSION['restaurantownerid'];

#--------------------------------------------------------------------------
$objSmarty->assign("resid", $resid);
$objSmarty->assign("objRestaurant", $objRestaurant);


#.............................................................................................
#SMARTY ASSIGNING
$objSmarty->assign('objSite', $objSite);
//$objSmarty->display('restaurantOwnerMyaccount.tpl');
$main_content = $objSmarty->fetch('restaurantOwnerMyaccount_addons.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('restaurantOwnerMyaccount.tpl');

?> 