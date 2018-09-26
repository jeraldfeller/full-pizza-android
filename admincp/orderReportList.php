<?php 
include ("../includes/config.inc.php");

$objAdmin	= new Admin();
$objAdmin->Admin_authetic();
$objAdminMgmt	= new AdminManagement;
$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);
#.............................................................................................
#List
if(isset($_GET['resid']) && !empty($_GET['resid'])){
	$resid = $_GET['resid'];
}elseif( isset($_GET['searchrestaurantid']) && !empty($_GET['searchrestaurantid']) ){
	$resid = $_GET['searchrestaurantid'];
}else{
	$resid = '';
}

#$objAdminRestaurantMgmt->reportList($resid);
$objAdminRestaurantMgmt->pdfReportlist($resid);
$getrestvalue = $objSite->getMultivalue("restaurant_id,restaurant_name,restaurant_streetaddress,restaurant_city",$CFG['table']['restaurant'],"restaurant_id = '".$resid."'");
$admin_smarty->assign("restname", $getrestvalue[0]['restaurant_name']);
$admin_smarty->assign("restid", $getrestvalue[0]['restaurant_id']);
$admin_smarty->assign("restaddress", $getrestvalue[0]['restaurant_streetaddress']);
$city = $objSite->getValue("cityname",$CFG['table']['city'],"city_id = '".$getrestvalue[0]['restaurant_city']."'");
$admin_smarty->assign("restcity", $city);
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $admin_smarty->fetch('orderReportList.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>