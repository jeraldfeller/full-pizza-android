<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin		= new Admin;
$objAdmin->Admin_authetic();

#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);

$objAdminMgmt	= new AdminManagement;
#.............................................................................................
	#Export Process	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'exportProcess'){
		$objAdminMgmt->exportState();
	}	
	#-----------------------------------------------------------------------------------------	
	#Import Process	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'importProcess'){
		
		$objAdminMgmt->importState();
	}
	#-----------------------------------------------------------------------------------------
	#List
	$objAdminMgmt->stateNameList();

#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $admin_smarty->fetch('stateManage.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>