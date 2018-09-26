<?php 
include ("../includes/config.inc.php");
include ("fckeditor_files.php");
$objAdmin	= new Admin();
$objAdmin->Admin_authetic();
$objAdminMgmt	= new AdminManagement();

#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);

#............................................................................................. echo 
	if($_REQUEST['flag']!=""){
	 	$admin_smarty->assign('email',"All Users");
	}    

    if(($_REQUEST['Sel_Id']) || !empty($_REQUEST['Sel_Id'])){
		$objAdminMgmt->sendNewsParticularUser();
	}
	
	//to Insert a new member
	if($_REQUEST['hdAction']!=""){
		$objAdminMgmt->sendNewsAllUser();		
	}
$admin_smarty->assign("Editor", $Editor);
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $admin_smarty->fetch('mail_news.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>