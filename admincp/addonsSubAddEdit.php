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
	#Edit Addons
	if(isset($_GET['eid']) && !empty($_GET['eid'])){
		
		$addonsname = $objSite->getValue("addonsname",$CFG['table']['addons'],"id='".$objSite->filterInput($_GET['eid'])."'");
		$admin_smarty->assign("addonsname", $addonsname);	
	}
#.............................................................................................
#SMARTY ASSIGNING 
$admin_smarty->display('addonsSubAddEdit.tpl');
/*$main_content = $admin_smarty->fetch('addonsAddEdit.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');*/
?>