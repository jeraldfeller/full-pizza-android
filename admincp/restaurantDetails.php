<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin		= new Admin;
$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
$objAdminMgmt	= new AdminManagement;
$objAdmin->Admin_authetic();
#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);
#.............................................................................................
	$resid = $_GET['resid'];
	
	#Today List
	$objAdminMgmt->restaurantDashboardTodayOrders();
	#Orders List
	$objAdminMgmt->restaurantDashboardAllorderInfo();
	#Booking
	$objAdminRestaurantMgmt->bookingList($resid);

	
	$restauEditDet  = $objAdminRestaurantMgmt->geteditRestaurantList($resid);
    $restauEditDetTiming = $objSite->geteditRestaurantListTiming($resid);
	$servingareas   = $objAdminRestaurantMgmt->getArrayAreas($restauEditDet[0]['restaurant_delivery_areas']);
	$servingcuisine = $objAdminRestaurantMgmt->getArrayCuisines($restauEditDet[0]['restaurant_serving_cuisines']);
	$restaurantname = $objSite->GetValue("restaurant_name",$CFG['table']['restaurant'],"restaurant_id = '".$resid."'");
	$restaurantcity = $objSite->GetValue("cityname",$CFG['table']['city'],"city_id = '".$restauEditDet[0]['restaurant_city']."'");
	//$restaurantzip  = $objSite->GetValue("zipcode",$CFG['table']['zipcode'],"zipcode_id = '".$restauEditDet[0]['restaurant_zip']."'");
	$admin_smarty->assign("restaurantname", $restaurantname);
	$admin_smarty->assign("restaurantcity", $restaurantcity);
	$admin_smarty->assign("restaurantzip", $restauEditDet[0]['restaurant_zip']);
	$admin_smarty->assign("servingcuisine", $servingcuisine);
	$admin_smarty->assign("servingareas", $servingareas);
	$admin_smarty->assign("resid", $resid);
    $admin_smarty->assign("restauEditDetTiming", $restauEditDetTiming);
#.............................................................................................
#SMARTY ASSIGNING 
$admin_smarty->assign("objAdminMgmt", $objAdminMgmt);
$admin_smarty->assign("objAdminRestaurantMgmt", $objAdminRestaurantMgmt);
$main_content = $admin_smarty->fetch('restaurantDetails.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>