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
#echo "<pre>222";print_r($_SESSION);echo "</pre>";
#echo "<pre>";print_r($_FILES);echo "</pre>";

$resid = $_SESSION['restaurantownerid'];


if (isset($_POST['action']) && ($_POST['action'] == "editSetting"))
{
    $objRestaurant->restaurantSettingInfo();
} elseif (isset($_POST['action']) && ($_POST['action'] == "addNewMenu"))
{
    $objRestaurant->restaurantMenuAdd();
} elseif (isset($_POST['action']) && ($_POST['action'] == "editMenu"))
{
    $objRestaurant->restaurantMenuEdit();
} elseif (isset($_POST['action']) && ($_POST['action'] == "addNewAddon"))
{
    $objRestaurant->restaurantAddonsAdd();
} elseif (isset($_POST['action']) && ($_POST['action'] == "editAddon"))
{
    $objRestaurant->restaurantAddonsEdit();
} elseif (isset($_POST['action']) && ($_POST['action'] == "resOwnerPhotoUpdates"))
{
    $objRestaurant->resOwnerUpdatePhotos($_POST['photonumber']);
} elseif (isset($_POST['action']) && ($_POST['action'] == "resOwnerLogoAdd"))
{
    $objRestaurant->resOwnerAddLogo();
} elseif (isset($_POST['action']) && ($_POST['action'] == "resOwnerLogoUpdates"))
{
    $objRestaurant->resOwnerUpdateLogo();
} elseif (isset($_POST['action']) && ($_POST['action'] == "resOwnerBannerAdd"))
{
    $objRestaurant->resOwnerAddBanner();
} elseif (isset($_POST['action']) && ($_POST['action'] == "resOwnerBannerUpdates"))
{
    $objRestaurant->resOwnerUpdateBanner();
}
elseif( isset($_POST['action']) && ($_POST['action'] == "addNewdeal") ){
	//exit;
	$objRestaurant->dealNew();
}
elseif( isset($_POST['action']) && ($_POST['action'] == "editdeal") ){
	//echo "<pre>"; print_r($_POST); echo "</pre>";exit;
	$objRestaurant->dealEdit();
//	$objRestaurant->restaurantEditdealOption();
}
$objRestaurant->paymentMethodList();
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
$res_straddress = $objSite->My_stripslashes($restaurantdetail[0]['restaurant_streetaddress']);
$res_area = $objSite->My_stripslashes($restaurantdetail[0]['areaname']);
$res_city = $objSite->My_stripslashes($restaurantdetail[0]['cityname']);
$res_state = $objSite->My_stripslashes($restaurantdetail[0]['statename']);

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
$objSmarty->assign('objSite', $objSite);
//$objSmarty->display('restaurantOwnerMyaccount.tpl');
$main_content = $objSmarty->fetch('restaurantOwnerMyaccount_payment.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('restaurantOwnerMyaccount.tpl');

?> 