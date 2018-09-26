<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin		= new Admin;
$objAdmin->Admin_authetic();

$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);

//Number of pending order
$pending_ord     = $objSite->getNumvalues($CFG['table']['order'],"status = 'pending' AND restaurant_id != '0' AND paypal_status = 'success'");
$admin_smarty->assign("Pending",$pending_ord);
#.............................................................................................

	#List
	if(isset($_GET['resid']) && !empty($_GET['resid']))
		$resid = $_GET['resid'];
	else
		$resid = '';

	$objAdminRestaurantMgmt->deleteOrderList($resid);
	
	#List RestaurantSearch
	$objAdminRestaurantMgmt->getsearchRestaurantList();

#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $admin_smarty->fetch('restaurantDeleteOrderManage.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>