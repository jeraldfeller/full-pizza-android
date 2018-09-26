<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin	= new Admin();
$objAdmin->Admin_authetic();

#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);

$objAdminMgmt  = new AdminManagement();
$objAdminRestaurantMgmt = new AdminRestaurantMgmt();
#.............................................................................................
	#Edit main category
	if(isset($_GET['eid']) && !empty($_GET['eid'])){
		
		/*$catename = $objSite->getValue("maincatename",$CFG['table']['category_main'],"maincateid='".$_GET['eid']."'");	
		$admin_smarty->assign("catename",$catename);*/
		
		$catename = $objSite->getValue("maincatename",$CFG['table']['category_main'],"maincateid='".$objSite->filterInput($_GET['eid'])."'");	
		$admin_smarty->assign("catename",$catename);
		$catoption = $objSite->getValue("maincat_option",$CFG['table']['category_main'],"maincateid='".$objSite->filterInput($_GET['eid'])."'");	
		$admin_smarty->assign("catoption",$catoption);
		#$maincat_desc = $objSite->getValue("maincat_desc",$CFG['table']['category_main'],"maincateid='".$_GET['eid']."'");	
		#$objSmarty->assign("maincat_desc",$maincat_desc);
		$restaurant_id = $objSite->getValue("restaurant_id",$CFG['table']['category_main'],"maincateid='".$objSite->filterInput($_GET['eid'])."'");	
		$admin_smarty->assign("restaurant_id",$restaurant_id);
	}
	#Add new sub category
	if(isset($_GET['mcatid']) && !empty($_GET['mcatid'])){
		
		$catename_sub = $objSite->getValue("maincatename",$CFG['table']['category_main'],"maincateid='".$objSite->filterInput($_GET['mcatid'])."'");
		$admin_smarty->assign("catename_sub",$catename_sub);	
	}
	
	#Edit sub category
	if(isset($_GET['seid']) && !empty($_GET['seid'])){	
		
		$subcatname_id = $objSite->getMultiValue("maincatename,parent_id",$CFG['table']['category_main'],"maincateid='".$objSite->filterInput($_GET['seid'])."'");
		$parentname    = $objSite->getValue("maincatename",$CFG['table']['category_main'],"maincateid='".$objSite->filterInput($subcatname_id[0]['parent_id'])."'");	
		
		$admin_smarty->assign("subcatname_id",$subcatname_id);
		$admin_smarty->assign("parentname",$parentname);
	}
	
	
	if(isset($_POST['action']) && ($_POST['action'] == "Edit") ){
		$objAdminMgmt->categoryEdit($_GET['eid']);
	}
	
	if(isset($_POST['action']) && ($_POST['action'] == "Add") ){
		$objAdminMgmt->categoryAdd();
	}
	
	#List RestaurantSearch
	$objAdminRestaurantMgmt->getShowRestaurantList();
    #echo "huiu";
#.............................................................................................
#SMARTY ASSIGNING 
#$admin_smarty->display('categoryAddEdit.tpl');
$main_content = $admin_smarty->fetch('categoryAddEdit.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>