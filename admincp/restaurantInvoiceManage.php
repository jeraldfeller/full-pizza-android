<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin		= new Admin;
$objAdmin->Admin_authetic();

$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
$objResInvoice	= new ResInvoice;

#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);
#.............................................................................................

	#List
	if(isset($_GET['resid']) && !empty($_GET['resid']))
		$resid = $_GET['resid'];
	else
		$resid = '';

	$objResInvoice->admin_res_invoice_list();
	//$objAdminRestaurantMgmt->admin_res_invoice_list();
	
	
	#List RestaurantSearch
	$objAdminRestaurantMgmt->getsearchRestaurantList();

#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $admin_smarty->fetch('restaurantInvoiceManage.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>