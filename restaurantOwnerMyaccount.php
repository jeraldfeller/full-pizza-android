<?php 
include("includes/config.inc.php");
#Offline
$objSite->siteOfflineStaus();
#Language
$objSite->languageSession();

#Classes
$objCommon = new Common;
$objRestaurant	= new Restaurant;
$objRestaurant->restaurant_unauthetic();
$objThumb = new Thumbnail;
global $objThumb;
#.............................................................................................
	#Restaurant Log In Status
	if(isset($_SESSION['restaurantownerid']) && !empty($_SESSION['restaurantownerid'])){
		$restaurantStatus	= $objCommon->restaurantLogInStatus();
		if($restaurantStatus != '1'){
			$objRestaurant->restaurantLogout();
		}
	}
#.............................................................................................
//Order Pending Alert Tone
$alerttone		= $objSite->getValue("pending_order_alert",$CFG['table']['restaurant'],"restaurant_id = '".$objSite->filterInput($_SESSION['restaurantownerid'])."'");
$objSmarty->assign("Alert",$alerttone);
//Number of pending order
$pending_ord     = $objSite->getNumvalues($CFG['table']['order'],"status = 'pending' AND restaurant_id = '".$objSite->filterInput($_SESSION['restaurantownerid'])."' AND paypal_status = 'success'");
$objSmarty->assign("Pending",$pending_ord);

//Number of processing order
$processing_ord     = $objSite->getNumvalues($CFG['table']['order'],"status = 'processing' AND restaurant_id = '".$objSite->filterInput($_SESSION['restaurantownerid'])."' AND paypal_status = 'success'");
$objSmarty->assign("Processing",$processing_ord);
#.............................................................................................
#echo "<pre>222";print_r($_SESSION);echo "</pre>";
#echo "<pre>";print_r($_FILES);echo "</pre>";

$resid = $objSite->filterInput($_SESSION['restaurantownerid']);


	if( isset($_POST['action']) && ($_POST['action'] == "editSetting") ){												
		$objRestaurant->restaurantSettingInfo();
	}
	elseif( isset($_POST['action']) && ($_POST['action'] == "addNewMenu") ){
		$objRestaurant->restaurantMenuAdd();
	}
	elseif( isset($_POST['action']) && ($_POST['action'] == "editMenu") ){
		$objRestaurant->restaurantMenuEdit();
	}
	elseif( isset($_POST['action']) && ($_POST['action'] == "addNewAddon") ){
		$objRestaurant->restaurantAddonsAdd();
	}
	elseif( isset($_POST['action']) && ($_POST['action'] == "editAddon") ){
		$objRestaurant->restaurantAddonsEdit();
	}
	elseif( isset($_POST['action']) && ($_POST['action'] == "resOwnerPhotoUpdates") ){
		$objRestaurant->resOwnerUpdatePhotos($_POST['photonumber']);
	}
	elseif( isset($_POST['action']) && ($_POST['action'] == "resOwnerLogoAdd") ){
		$objRestaurant->resOwnerAddLogo();
	}
	elseif( isset($_POST['action']) && ($_POST['action'] == "resOwnerLogoUpdates") ){
		$objRestaurant->resOwnerUpdateLogo();
	}
	elseif( isset($_POST['action']) && ($_POST['action'] == "resOwnerBannerAdd") ){
		$objRestaurant->resOwnerAddBanner();
	}
	elseif( isset($_POST['action']) && ($_POST['action'] == "resOwnerBannerUpdates") ){
		$objRestaurant->resOwnerUpdateBanner();
	}

	#--------------------------------------------------------------------------
	#Dashboard Tab
	$objRestaurant->restDashboardOrderInfo('allorder');
    $objRestaurant->restDashboardOrderInfo('pendingorder');
    $objRestaurant->restDashboardOrderInfo('processingorder');
    $objRestaurant->restDashboardOrderInfo('deliveredorder');
     $objRestaurant->restDashboardOrderInfo('failedorder');
	$objRestaurant->restOrderStatistics('today');
    $objRestaurant->restOrderStatistics('week');
    $objRestaurant->restOrderStatistics('month');
    $objRestaurant->restOrderStatistics('year');
	$objRestaurant->restaurantDashboardCommission();
	
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
	$res_area 		= $objSite->filterInput($restaurantdetail[0]['areaname']);
	$res_city 		= $objSite->filterInput($restaurantdetail[0]['cityname']);
	$res_state 		= $objSite->filterInput($restaurantdetail[0]['statename']);
	
	list($reslat,$reslong) = $objSite->findLatLongFromAddress($res_straddress,$res_area,$res_city,$res_state,$rest_country='');
	$objSmarty->assign('reslattitude', $reslat);
	$objSmarty->assign('reslongtitude', $reslong);
	#--------------------------------------------------------------------------
	#Open & Close Time
	include_once("restaurantOwnerMyaccOpenCloseTime.php");
    
    #-------------------------------------------------------------------------
    $rest_status = $objSite->getMultivalue("restaurant_name,restaurant_seourl,restaurant_set_status,restaurant_set_time",$CFG['table']['restaurant'],"restaurant_id = '".$resid."'");
    $objSmarty->assign("rest_status",$rest_status[0]['restaurant_set_status']);
    $objSmarty->assign("rest_time",$rest_status[0]['restaurant_set_time']);
    $objSmarty->assign("restaurantname",$rest_status[0]['restaurant_name']);
    $objSmarty->assign("restaurant_seourl",$rest_status[0]['restaurant_seourl']);
	
	#--------------------------------------------------------------------------
	$objSmarty->assign("resid", $resid);
	$objSmarty->assign("objRestaurant", $objRestaurant);
    
    #--------------------------------------------------------------------------
    #Facebook Tab Added success Message
    if(isset($_SESSION['fbapps']) && !empty($_SESSION['fbapps'])){
        $objSmarty->assign("fbapps_message", $_SESSION['fbapps']);
        unset($_SESSION['fbapps']);
    }
    $rest_status = $objSite->open_close_time_rest($_SESSION['restaurantownerid'],CUR_TIME);
    $objSmarty->assign("rest_status", $rest_status[0]);
#.............................................................................................
#SMARTY ASSIGNING 
$objSmarty->assign('objSite', $objSite);
//$objSmarty->display('restaurantOwnerMyaccount.tpl');
$main_content = $objSmarty->fetch('restaurantOwnerMyaccount_dashboard.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('restaurantOwnerMyaccount.tpl');
?> 