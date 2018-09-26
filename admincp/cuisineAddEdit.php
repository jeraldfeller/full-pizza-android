<?php 
include ("../includes/config.inc.php");
include ("fckeditor_files.php");

#Classes
$objAdmin	= new Admin;
$objAdmin->Admin_authetic();
$objAdminMgmt = new AdminManagement;
#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);
$objThumb	= new Thumbnail;
global $objThumb;
#.............................................................................................	
	#Edit cuisine name
	if( isset($_GET['cusid']) && !empty($_GET['cusid']) ){
		
		if(isset($_POST['action']) && ($_POST['action'] == "CuisineAddEdit") ){	
			$objAdminMgmt->editCuisineName();
		}
		
		
		$selectCuisineValue = $objSite->getMultiValue("cuisine_id, cuisine_name, cuisine_photo, cuisine_description, cuisine_status, addeddate",$CFG['table']['cuisine'],"cuisine_id ='".$objSite->filterInput($_GET['cusid'])."' ");		
		#Description
		$oFCKeditor->Value	= stripslashes($selectCuisineValue['0']['cuisine_description']);
		$Editor 			= $oFCKeditor->Create();
		$admin_smarty->assign("Editor", $Editor);
		$admin_smarty->assign('selectCuisineValue',$selectCuisineValue);	
	}
	else{
		#Add new cuisine
		if(isset($_POST['action']) && ($_POST['action'] == "CuisineAddEdit") ){
			$objAdminMgmt->newCuisineAdd();
		}	
	}
#.............................................................................................
#SMARTY ASSIGNING 
//$admin_smarty->display('cuisineAddEdit.tpl');
$main_content = $admin_smarty->fetch('cuisineAddEdit.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>