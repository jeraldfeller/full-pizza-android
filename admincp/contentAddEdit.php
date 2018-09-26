<?php 
include ("../includes/config.inc.php");
include ("fckeditor_files.php");
#Classes
$objAdmin	= new Admin;
$objAdminMgmt	= new AdminManagement();
$objAdmin->Admin_authetic();
#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);
#.............................................................................................
	
if(isset($_GET['conid']) && !empty($_GET['conid'])){
	
	if(isset($_POST['action']) && ($_POST['action'] == "Edit") ){
		$objAdminMgmt->contentEdit($_GET['conid']);
	}
	#Edit
	$contentValue = $objSite->getMultiValue("content_title, content, metatagtitle, metatagdescription, metatagkeyword, display_footer, display_customer, termscondition",$CFG['table']['content'],"content_id='".$objSite->filterInput($_GET['conid'])."'");
	
	#content
	$oFCKeditor->Value	= stripslashes($contentValue['0']['content']);
	$Editor 			= $oFCKeditor->Create();
	
	$admin_smarty->assign("contentValue",$contentValue);
	$admin_smarty->assign("Editor", $Editor);	
}else{
	#Add
	if(isset($_POST['action']) && ($_POST['action'] == "Add") ){
		$objAdminMgmt->newContentAdd();
	}
}
#.............................................................................................
#SMARTY ASSIGNING 
//$admin_smarty->display('stateAddEdit.tpl');
$main_content = $admin_smarty->fetch('contentAddEdit.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>