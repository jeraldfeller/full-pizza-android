<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin	= new Admin;
$objAdmin->Admin_authetic();

#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);
#.............................................................................................
    

    #AddEdit Metatag
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'metatagUpdate'){
	   $objSite->pr($_POST);

    	$objAdminMgmt	= new AdminManagement;
    	$objAdminMgmt->metatag_add_edit();
        
    }
    
    $metatagList = $objSite->getMultiValue(" metatag_title, metatag_keyword,  metatag_desc",$CFG['table']['metatag'],"filename ='".$_GET['filename']."' ");
    $admin_smarty->assign('metatagList',$metatagList);
    
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $admin_smarty->fetch('metatagAddEdit.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>