<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin		= new Admin;
$objAdmin->Admin_authetic();

#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);

$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
#.............................................................................................
	#View Order details
	$objAdminRestaurantMgmt->bookingViewFullDetails($_GET['bkid']);
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $admin_smarty->fetch('viewBookingDetails.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>