<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin	= new Admin();
$objAdmin->Admin_authetic();
$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
#.........................................................................
#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);

#Edit Addons
if(isset($_GET['eid']) && !empty($_GET['eid'])){
	
	if(isset($_POST['action']) && ($_POST['action'] == "Edit") ){												
		$objAdminRestaurantMgmt->mainAddonsNewEdit($_GET['eid']);
	}
	
	$addonsvalue = $objSite->getMultivalue("restaurant_id,category_id,addonsname,addonspriceoption,addonsprice,addons_option,addonscount",$CFG['table']['restaurant_addons'],"id='".$objSite->filterInput($_GET['eid'])."'");
	$admin_smarty->assign("addonsvalue", $addonsvalue);
	
	$objSite->getShowMainAddonsListEdit($_GET['eid']);	
    $objSite->getShowCategoryList_res($addonsvalue[0]['restaurant_id']);
}else{
	#ADD Addons
	if(isset($_POST['action']) && ($_POST['action'] == "Add") ){
		$objAdminRestaurantMgmt->mainAddonsNew();
	}
}
$objAdminRestaurantMgmt->getShowRestaurantList();
if (isset($_GET['resid']) && !empty($_GET['resid'])) {
    
    $objSite->getShowCategoryList_res($_REQUEST['resid']);
}
//$objAdminRestaurantMgmt->getShowCategoryList();
$admin_smarty->assign("objSite", $objSite);
#.............................................................................................
#SMARTY ASSIGNING 
#$admin_smarty->display('addonsAddEdit.tpl');
$main_content = $admin_smarty->fetch('addonsAddEdit.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>