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
	#List
	$dir_files_list = $objAdminMgmt->list_dir_files($CFG['site']['base_path']."/");
    
	$admin_smarty->assign('dir_files_list',$dir_files_list);
    
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $admin_smarty->fetch('metatagManage.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>