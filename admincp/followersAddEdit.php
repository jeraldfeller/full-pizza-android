<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin	= new Admin;
$objAdmin->Admin_authetic();
#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);

#.............................................................................................	
	#Add new cuisine 
	if(isset($_POST['action']) && !empty($_POST['action']) && empty($_GET['cusid']) && $_POST['action'] == "FollowersAddEdit"){
		
		$objThumb	= new Thumbnail;
		global $objThumb;
		
		$objAdminMgmt = new AdminManagement;	
		$objAdminMgmt->newFollowersAdd();		
	}
	#Edit cuisine name
	if( isset($_GET['cusid']) && !empty($_GET['cusid']) && isset($_POST['action']) && ($_POST['action'] == "FollowersAddEdit") ){
		$objThumb	= new Thumbnail;
		global $objThumb;
		
		$objAdminMgmt = new AdminManagement;	
		$objAdminMgmt->editFollowersName();	
	}else{
			$selectFollowersValue = $objSite->getMultiValue("followers_id, followers_name, followers_url, followers_logo, followers_status, addeddate",$CFG['table']['followers'],"followers_id ='".$objSite->filterInput($_GET['cusid'])."' ");
			$admin_smarty->assign('selectFollowersValue',$selectFollowersValue);
	}
#.............................................................................................
#SMARTY ASSIGNING 
//$admin_smarty->display('cuisineAddEdit.tpl');
$main_content = $admin_smarty->fetch('followersAddEdit.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>