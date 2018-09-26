<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin		= new Admin;
$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
$objAdmin->Admin_authetic();

#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);
#.............................................................................................
	#Export Process	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'exportProcess'){
		#File name
		$file_name 	= "Restaurant_".date("dmY-His");
		$export_val_arr = array('restaurant_id', 'restaurant_name');
		
		#Table
		$selectfld 		= "restaurant_id, restaurant_name";
		$tablename 		= $CFG['table']['restaurant'];
		$tblcondition 	= "restaurant_status = '1' ORDER BY restaurant_name ASC";
		$table_arr 		= array($selectfld,$tablename,$tblcondition);
		
		#CSV
		$csv_heading_arr = array("Restaurant Id","Restaurant Name");
		
		#Xls
		$xls_heading_arr = "Restaurant Id\tRestaurant Name";
		
		$objAdmin->exportProcessCSVXLS($file_name,$table_arr,$export_val_arr,$csv_heading_arr,$xls_heading_arr);
	}	
	#Import Process	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'importProcess'){
		
		$tablename 		= $CFG['table']['restaurant'];
		$dbfields = array("restaurant_name");
		$filename = "restaurantManage.php";
		$objAdmin->importProcessCSV($tablename,$dbfields,$filename);
	}
$objAdminRestaurantMgmt->getsearchRestaurantList();	
#List
$objAdminRestaurantMgmt->restaurantList();
#--------------------------------------------------------------------------
#Facebook Tab Added success Message
if(isset($_SESSION['fbapps']) && !empty($_SESSION['fbapps'])){
    $admin_smarty->assign("fbapps_message", $_SESSION['fbapps']);
    unset($_SESSION['fbapps']);
}
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $admin_smarty->fetch('restaurantManage.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>