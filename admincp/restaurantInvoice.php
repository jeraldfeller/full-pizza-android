<?php 
include ("../includes/config.inc.php");

$objAdmin	= new Admin();
$objAdmin->Admin_authetic();
$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
$objResInvoice	= new ResInvoice;

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
$objResInvoice->inv_deli_order_list();

#$objAdminRestaurantMgmt->reportList($resid);
#$objAdminRestaurantMgmt->pdfReportlist($resid);

//$objAdminRestaurantMgmt->single_res_detail();
#$objAdminRestaurantMgmt->inv_deli_order_list();
#.............................................................................................
#SMARTY ASSIGNING 
//$admin_smarty->display('restaurantInvoice.tpl');
$main_content = $admin_smarty->fetch('restaurantInvoice.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>