<?php
include ("../includes/config.inc.php");
include ("fckeditor_files.php");
#Classes
$objAdmin			= new Admin;
$objAdmin->Admin_authetic();

#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);

$objAdminMgmt	= new AdminManagement;
#.............................................................................................
if(isset($_GET['eid']) && !empty($_GET['eid'])){
	
	if(isset($_POST['action']) && ($_POST['action'] == "Edit") ){
		$objAdminMgmt->faqEdit($_GET['eid']);
	}
	#Edit
	$faqValue = $objSite->getMultiValue("question, answer, faq_id, faq_status",$CFG['table']['faq'],"faq_id='".$objSite->filterInput($_GET['eid'])."'");
	
	#content
	$oFCKeditor->Value	= stripslashes($faqValue['0']['answer']);
	$Editor 			= $oFCKeditor->Create();
	
	$admin_smarty->assign("faqEditList",$faqValue);
	$admin_smarty->assign("Editor", $Editor);	
}else{
	#Add
	if(isset($_POST['action']) && ($_POST['action'] == "Add") ){
		$objAdminMgmt->faqAdd();
	}
}
	/*#Edit faq manage 
	if(isset($_GET['eid']) && !empty($_GET['eid'])){
		$objAdminMgmt->faqMgmtList($_GET['eid']);
	}*/
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $admin_smarty->fetch('faqAddEdit.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');

?>