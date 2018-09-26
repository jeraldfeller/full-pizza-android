<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin	= new Admin;
$objAdmin->Admin_authetic();

$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;

#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);

#.............................................................................................

	#EDIT
	if(isset($_GET['eid']) && !empty($_GET['eid'])){
		
		$objThumb	= new Thumbnail;
		global $objThumb;
		
		$eid = $_GET['eid'];
		if(isset($_POST['action']) && ($_POST['action'] == "Edit") ){												
			$objAdminRestaurantMgmt->menuEdit($eid);
		}
		#Pizza Crust Delete
		/*if(isset($_GET['action']) && ($_GET['action'] == "crustdelete") ){
			$tbl_name = $CFG['table']['restaurant_pizza_crust'];	
			$field    = 'pizza_crustid';
			$id 	  = $_GET['crustid'];											
			$objAdminRestaurantMgmt->crustDelete($tbl_name,$field,$id,$eid);
		}*/
		//List edit page
		$sizeopt	= $objAdminRestaurantMgmt->geteditMenuList($eid);
		$menuaddonsdet = $objSite->getValue("menu_addons",$CFG['table']['restaurant_menu'],"id='".$eid."' ");
		
		//if($menuaddonsdet == 'Yes'){
			$menuaddonscategory = $objSite->getValue("menu_category",$CFG['table']['restaurant_menu'],"id='".$eid."' AND menu_addons = '".$menuaddonsdet."'");
			$menuaddons = $objSite->getShowAddonsListEdit($menuaddonscategory,$eid);
            #$showSubAddonslist = $objSite->getShowSubAddonsList($menuaddons['0']['id'],$menuaddons['0']['id']);
                     
            //$objSite->getSliceAddonsPrice($showSubAddonslist['menuaddons_price_slice']);
            //$objSite->getSliceAddonsPrice($showSubAddonslist[subaddon].menuaddons_price_slice)
			//$objSite->getShowAddonsList($menuaddonscategory);
		/*}else{
			$menuaddonscategory = $objSite->getValue("menu_category",$CFG['table']['restaurant_menu'],"id='".$eid."'");
			//$objAdminRestaurantMgmt->getShowAddonsList1($menuaddonscategory);
			$objSite->getShowPizzaAddonsListEdit($menuaddonscategory,$eid);
			$objAdminRestaurantMgmt->getShowCrustList($eid);
		}*/
		
		/*$objAdminRestaurantMgmt->getShowPizzaSizeoption($eid);		
		$menuaddonscatname = $objSite->getValue("maincatename",$CFG['table']['category_main'],"maincateid='".$menuaddonscategory."'");
		$admin_smarty->assign("menuaddonsdet", $menuaddonsdet);
		$admin_smarty->assign("menuaddonscat", $menuaddonscategory);
		$admin_smarty->assign("menuaddonscatname", strtolower($menuaddonscatname));*/
		
		#NEW IMPLEMENTATION
		$objAdminRestaurantMgmt->getShowPizzaSizeoption($sizeopt['0']['menu_category'],$sizeopt['0']['maincat_option']);
		
		
		$menuaddonscategory_edit = $objSite->getValue("menu_category",$CFG['table']['restaurant_menu'],"id='".$eid."' ");
		$menuaddonscatname = $objSite->getValue("maincatename",$CFG['table']['category_main'],"maincateid='".$menuaddonscategory."'");
		$admin_smarty->assign("menuaddonsdet", $menuaddonsdet);
		$admin_smarty->assign("menuaddonscat", $menuaddonscategory);
		$admin_smarty->assign("menuaddonscatname", strtolower($menuaddonscatname));
		$admin_smarty->assign("menuaddonscategory_edit",$menuaddonscategory_edit);
		
	}else{
		#ADD
		
		$objThumb	= new Thumbnail;
		global $objThumb;
		
		if(isset($_POST['action']) && ($_POST['action'] == "Add") ){
			$objAdminRestaurantMgmt->menuAdd();
		}
	}
	
	if(isset($_GET['resid']) && !empty($_GET['resid'])){
		//$objSite->getShowCategoryList_res($_GET['resid']);

	}
	//Categoria unica
	$objSite->getShowCategoryList_res('0');

	$objAdminRestaurantMgmt->getShowRestaurantList();
	#$objSite->getShowCategoryList();
	$objSite->getShowCuisineList();
	//$objAdminRestaurantMgmt->getShowAddonsList();
#.............................................................................................
#SMARTY ASSIGNING 
$admin_smarty->assign("objSite", $objSite);
$main_content = $admin_smarty->fetch('menuAddEdit.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>