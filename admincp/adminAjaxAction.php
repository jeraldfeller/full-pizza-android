<?php
	include("../includes/config.inc.php");
	
	/*if(isset($_GET['action'])){ 
		$action	 = $_GET['action'];
		$admin_smarty->assign('action',$action);
	}*/
	if(isset($_REQUEST['action'])){ 
		$action	 = $_REQUEST['action'];
		$admin_smarty->assign('action',$action);
	}
	#Admin Login
	if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'showSubaddonsList'){
		
		$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objAdminRestaurantMgmt->showSubAddonsList($_GET['aid']);
	}
	#City List From Restaurant
	if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'showResCityList'){
		
		$objSite->showcityList($_GET['department_id']);
	}
	#Zipcode List From Restaurant
	if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'showResZipList'){
		
		$objSite->showzipList($_GET['cid']);
	}
    if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'autosuggestzip'){
		
		$objSite->showzipList();
	}
    
	#City List From Zipcode Mgmt
	if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'showcityList'){
		
		$objSite->showcityList($_GET['statecode']);
	}
	#Select All Open
	if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'checkSelectAllOpen'){
		
		#$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		#$objAdminRestaurantMgmt->selectAllOpenTime();
		$objSite->selectAllOpenTime();
	}
	#Select All Close
	if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'checkSelectAllClose'){
		
		#$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		#$objAdminRestaurantMgmt->selectAllCloseTime();
		$objSite->selectAllCloseTime();
	}
	
	#Addons List From Menu Mgmt
	/*if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'showCatAddonsList'){
		
		$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objSite->getShowAddonsList($_GET['catid']);
		$admin_smarty->assign('objSite',$objSite);
	}*/
	#Addons List From Menu Mgmt
	
	#Pizza Addons List From Menu Mgmt
	if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'showCatPizzaAddonsList'){
		
		$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objSite->getShowAddonsList($_GET['catid']);
		$admin_smarty->assign('objSite',$objSite);
		#$objAdminRestaurantMgmt->getShowAddonsList1($_GET['catid']);
	}
	
		#Update Map info:
	if(isset($_REQUEST['action']) && !empty($_REQUEST['action']) && $_REQUEST['action'] == 'mapInfoUpdate'){
		$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objAdminRestaurantMgmt->mapInfoUpdate();
		$objAdminRestaurantMgmt->geteditRestaurantList($_REQUEST['eid']);
		
		$restaurantdetail 	= $objSite->siteRestDetails($_REQUEST['eid']);
		
		$res_straddress 	= $objSite->My_stripslashes($restaurantdetail[0]['restaurant_streetaddress']);
		$res_area 			= $objSite->My_stripslashes($restaurantdetail[0]['areaname']);
		$res_city 			= $objSite->My_stripslashes($restaurantdetail[0]['cityname']);
		$res_state 			= $objSite->My_stripslashes($restaurantdetail[0]['statename']);
		$restaurant_address_map = $objSite->findFullAddress($res_straddress, $res_area, $res_city, $res_state);
		$admin_smarty->assign("restaurant_address_map",$restaurant_address_map);
	}
	//---------------------------------------------------------------------------------------------------
	#NEW IMPLEMENTATION	
	if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'showCatAddonsList'){
	   
		//echo "<pre>";print_r($_REQUEST);echo "</pre>";
        
		//$objAdminRestaurantMgmt->getShowAddonsList($_GET['catid']);		
		$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objSite->getShowAddonsList($_GET['catid'],$_GET['resid']);
		$sizeopt	=	$objAdminRestaurantMgmt->geteditMenuList($_REQUEST['eid']);
		#echo "<pre>";print_r($sizeopt);echo "</pre>";
		//$objAdminRestaurantMgmt->getShowPizzaSizeoption($_GET['catid'],$sizeopt['0']['maincat_option']);
        $admin_smarty->assign('menuid',$_REQUEST['eid']);
		$admin_smarty->assign('objSite',$objSite);
	}
	
	#-----------------------------------------------------------------------------------------------------
	#echo "<pre>";print_r($_REQUEST);echo "</pre>";
	//Delete Addons:	
	if(isset($_REQUEST['action']) && !empty($_REQUEST['action']) && $_REQUEST['action'] == 'deleteAddons'){	
	    
		#Delete Addons and subaddons	
		$objSite->deleteAddons();
		
		#Select Addons list
		$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		//$objSite->getShowAddonsList($_REQUEST['catid'],$_REQUEST['resid']);
		
		$sizeopt	=	$objAdminRestaurantMgmt->geteditMenuList($_REQUEST['eid']);
        //echo "<pre>";print_r($sizeopt);echo "</pre>";
        $menuaddonsdet = $sizeopt[0]['menu_addons'];
		
		if($menuaddonsdet == 'Yes'){
			$menuaddonscategory = $sizeopt['0']['menu_category'];
			$objSite->getShowAddonsListEdit($menuaddonscategory,$_REQUEST['eid']);
			//$objSite->getShowAddonsList($menuaddonscategory);
		}
		//echo "<pre>";print_r($sizeopt);echo "</pre>";
		$objAdminRestaurantMgmt->getShowPizzaSizeoption($sizeopt['0']['menu_category'],$sizeopt['0']['maincat_option']);
		$admin_smarty->assign('menuid',$_REQUEST['eid']);
		$admin_smarty->assign('objSite',$objSite);
	}
	#----------------------------------------------------------------------------------------------------
	#Category List From Menu Mgmt restaurant wise
	if(isset($_GET['action']) && !empty($_GET['action']) && ( $_GET['action'] == 'resCategory') || ( $_GET['action'] == 'resAddonCategory') ){		
		#$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objSite->getShowCategoryList_res($_GET['resid']);
	}	
	#NEW IMPLEMENTATION
	/*/Restaurant Details Show Per Page
	if(isset($_REQUEST['action']) && !empty($_REQUEST['action']) && ( $_REQUEST['action'] == 'restaurantDetailsShowPerPage')){	
			
		$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objAdminRestaurantMgmt->bookingList($_REQUEST['resid']); 
		$admin_smarty->assign('Tab',"restaurantDetails_".$_REQUEST['Tab']);
	}*/
		
	$admin_smarty->display('adminAjaxAction.tpl');
?>