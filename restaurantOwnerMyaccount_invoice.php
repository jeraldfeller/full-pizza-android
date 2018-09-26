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
//Order Pending Alert Tone
$alerttone = $objSite->getValue("pending_order_alert", $CFG['table']['restaurant'],
    "restaurant_id = '" . $objSite->filterInput($_SESSION['restaurantownerid']) . "'");
$objSmarty->assign("Alert", $alerttone);
//Number of pending order
$pending_ord = $objSite->getNumvalues($CFG['table']['order'],
    "status = 'pending' AND restaurant_id = '" . $objSite->filterInput($_SESSION['restaurantownerid']) .
    "' AND paypal_status = 'success'");
$objSmarty->assign("Pending", $pending_ord);

//Number of processing order
$processing_ord = $objSite->getNumvalues($CFG['table']['order'],
    "status = 'processing' AND restaurant_id = '" . $objSite->filterInput($_SESSION['restaurantownerid']) .
    "' AND paypal_status = 'success'");
$objSmarty->assign("Processing", $processing_ord);
#.............................................................................................
#echo "<pre>222";print_r($_SESSION);echo "</pre>";
#echo "<pre>";print_r($_FILES);echo "</pre>";

$resid = $_SESSION['restaurantownerid'];

#--------------------------------------------------------------------------
#Dashboard Tab
$objRestaurant->restDashboardOrderInfo('allorder');
$objRestaurant->restOrderStatistics('today');
//$objRestaurant->restaurantDashboardCommission();

#--------------------------------------------------------------------------
$restaurantdetail = $objRestaurant->restDetailsMyacc();
$objSmarty->assign("restaurantname", $restaurantdetail[0]['restaurant_name']);
$objSmarty->assign("aboutrestaurant", $restaurantdetail[0]['restaurant_description']);

#--------------------------------------------------------------------------
#Category List
$objSite->showStateList();
$objSite->showcityList($restaurantdetail[0]['restaurant_state']);
//$objSite->showzipList($restaurantdetail[0]['restaurant_city']);
$objSite->showDeliveryAresList();
$objSite->getShowCuisineList();
//$objSite->getShowCategoryList();
$objSite->getShowCategoryList_res($_SESSION['restaurantownerid']);

#--------------------------------------------------------------------------
#For Google Map
$res_straddress = $objSite->filterInput($restaurantdetail[0]['restaurant_streetaddress']);
$res_area = $objSite->filterInput($restaurantdetail[0]['areaname']);
$res_city = $objSite->filterInput($restaurantdetail[0]['cityname']);
$res_state = $objSite->filterInput($restaurantdetail[0]['statename']);

list($reslat, $reslong) = $objSite->findLatLongFromAddress($res_straddress, $res_area,
    $res_city, $res_state, $rest_country = '');
$objSmarty->assign('reslattitude', $reslat);
$objSmarty->assign('reslongtitude', $reslong);
#--------------------------------------------------------------------------
#Open & Close Time
include_once ("restaurantOwnerMyaccOpenCloseTime.php");

#--------------------------------------------------------------------------
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
$objRestaurant->InvoiceList();
$objSmarty->assign('objSite', $objSite);
//$objSmarty->display('restaurantOwnerMyaccount.tpl');
$main_content = $objSmarty->fetch('restaurantOwnerMyaccount_invoice.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('restaurantOwnerMyaccount.tpl');

?> 