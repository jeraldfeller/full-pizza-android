<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin	= new Admin;
$objAdmin->Admin_authetic();
$objAdminMgmt	= new AdminManagement;

#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);

#.............................................................................................	
$objThumb	= new Thumbnail;
global $objThumb;

if(isset($_GET['id']) && !empty($_GET['id'])){
	
	if(isset($_POST['action']) && ($_POST['action'] == "bannerEdit") ){
		$objAdminMgmt->bannerEdit($_GET['id']);
	}
	
	$selectBannerValue = $objSite->getMultiValue("banner_id, banner_photo, banner_status, addeddate",$CFG['table']['indexbanner'],"banner_id ='".$_GET['id']."'");
	$admin_smarty->assign('selectBannerValue',$selectBannerValue);
}else{
	#Add
	if(isset($_POST['action']) && ($_POST['action'] == "bannerAdd") ){
		$objAdminMgmt->bannerAdd();
	}
}	
#.............................................................................................
#SMARTY ASSIGNING 
//$admin_smarty->display('cuisineAddEdit.tpl');
$main_content = $admin_smarty->fetch('indexBannerAddEdit.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>