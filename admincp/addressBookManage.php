<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin		= new Admin;
$objAdmin->Admin_authetic();

$objAdminMgmt	= new AdminManagement;
#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);
#.............................................................................................
	#Export Process	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'exportProcess'){
		$objAdminMgmt->exportCustomer();
	}	
	#-----------------------------------------------------------------------------------------	
	#Import Process	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'importProcess'){
		
		$objAdminMgmt->importState();
	}
	#-----------------------------------------------------------------------------------------
	#List
	$objAdminMgmt->addressBookDetailList();
	
	#customer address detail page name list
	$customer_name = $objSite->getMultiValue("customer_id, customer_name, customer_lastname, customer_email",$CFG['table']['customer'],"status='1' and delete_status = 'No'");
    $admin_smarty->assign("customerSearchList",$customer_name);

#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $admin_smarty->fetch('addressBookManage.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>