<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin			= new Admin;
$objAdmin->Admin_authetic();

$objAdminMgmt		= new AdminManagement;

#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);

#.............................................................................................
	#Export Process	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'exportProcess'){
		$objAdminMgmt->exportCity();
	}	
	#-----------------------------------------------------------------------------------------	
	#Import Process	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'importProcess'){
		
		$objAdminMgmt->importCity();
	}
	#-----------------------------------------------------------------------------------------
	#List
	$objAdminMgmt->cityNameList();

#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $admin_smarty->fetch('cityManage.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>