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
	
	$eid = $_GET['eid'];
	if(isset($_POST['action']) && ($_POST['action'] == "Edit") ){												
		$objAdminRestaurantMgmt->restaurantOfferUpdate($eid);
	}
	//List edit page
	$selectRestOfferValue = $objSite->getMultiValue(" restaurant_id,offer_id, offer_percentage , offer_price, offer_valid_from, offer_valid_to",$CFG['table']['restaurant_offer'],"offer_id ='".$_GET['eid']."' ");
	#echo "<pre>";print_r($selectRestOfferValue);echo "</pre>";
	$admin_smarty->assign("restOffEdList", $selectRestOfferValue);
	
}else{
	#ADD
	if(isset($_POST['action']) && ($_POST['action'] == "Add") ){
		$objAdminRestaurantMgmt->restaurantOfferNew();
	}
}
$objAdminRestaurantMgmt->getShowRestaurantList();
#Edit List

#.............................................................................................
#SMARTY ASSIGNING 
//$admin_smarty->display('restaurantOfferAddEdit.tpl');
$main_content = $admin_smarty->fetch('restaurantOfferAddEdit.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>