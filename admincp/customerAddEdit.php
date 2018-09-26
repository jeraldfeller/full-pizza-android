<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin	= new Admin();
$objAdmin->Admin_authetic();
#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);
#.............................................................................................
#Edit state
if(isset($_GET['cusmid']) && !empty($_GET['cusmid'])){

	$customervalue = $objSite->getMultiValue("customer_name,customer_lastname, customer_street, customer_buildtype, customer_crossstreet, customer_zip, customer_city, customer_state, customer_phone, customer_addresslabel, customer_email, customer_password, customer_landline, customer_landmark",$CFG['table']['customer'],"customer_id='".$objSite->filterInput($_GET['cusmid'])."'");	
	
//	echo "<pre>";print_r($customervalue);echo "</pre>";
	
	$admin_smarty->assign("customervalue",$customervalue);
}
$objSite->showStateList($customervalue[0].'customer_state');
$objSite->showcityList($statecode);
$objSite->showzipList($cityid);
//$objSite->showcityList($statecode);
//$objSite->showAllzipList();
//$objSite->showzipList($cityid);

#.............................................................................................
#SMARTY ASSIGNING 
//$admin_smarty->display('stateAddEdit.tpl');
$main_content = $admin_smarty->fetch('customerAddEdit.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>