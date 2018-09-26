<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin	= new Admin();
$objAdminMgmt	= new AdminManagement;
$objAdmin->Admin_authetic();
#.............................................................................................
#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);
#Edit state
if(isset($_GET['zipid']) && !empty($_GET['zipid'])){

	$zipcode = $objSite->getMultiValue("zipcode,statecode,cityid,areaname",$CFG['table']['zipcode'],"zipcode_id='".$_GET['zipid']."'");	
	#echo "<pre>";print_r($zipcode);echo "</pre>";
	$admin_smarty->assign("zipcodeValue",$zipcode);
	
	$objSite->showCityList($zipcode['0']['statecode']);
}	
	
$objSite->showStateList();
#.............................................................................................
#SMARTY ASSIGNING 
//$admin_smarty->display('stateAddEdit.tpl');
$main_content = $admin_smarty->fetch('zipcodeAddEdit.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>