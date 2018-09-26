<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin		= new Admin;
$objAdmin->Admin_authetic();

$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
#.............................................................................................
#List
$objAdmin->usersList();

#List RestaurantSearch
//$objAdminRestaurantMgmt->getsearchRestaurantList();
	
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $admin_smarty->fetch('userManage.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>