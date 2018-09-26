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
if(isset($_GET['stateid']) && !empty($_GET['stateid'])){

	$statevalue = $objSite->getMultiValue("statecode, statename",$CFG['table']['state'],"state_id='".$_GET['stateid']."'");	
	$admin_smarty->assign("statevalue",$statevalue);
}
#.............................................................................................
#SMARTY ASSIGNING 
//$admin_smarty->display('stateAddEdit.tpl');
$main_content = $admin_smarty->fetch('stateAddEdit.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>