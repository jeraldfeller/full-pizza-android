<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin		= new Admin();
$objAdminMgmt	= new AdminManagement();
$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
$objAdmin->Admin_authetic();

#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);

#.............................................................................................
	#Export Process	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'exportProcess'){
		$objAdminMgmt->exportMainCategory();
	}	
	#-----------------------------------------------------------------------------------------	
	#Import Process	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'importProcess'){
		
		$objAdminMgmt->importMainCategory();
	}
	#-----------------------------------------------------------------------------------------
	#List
	$objAdminMgmt->mainCategoryList();
    if($_REQUEST['resid'] != ''){
        $resname = $objSite->getValue("restaurant_name",$CFG['table']['restaurant'],"restaurant_id = '".$objSite->filterInput($_REQUEST['resid'])."'");
        $admin_smarty->assign("resname", $resname);
    }
    
    #List RestaurantSearch
	$objAdminRestaurantMgmt->getsearchRestaurantList();
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $admin_smarty->fetch('categoryManage.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>