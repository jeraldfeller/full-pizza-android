<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin	= new Admin;
$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
$objAdmin->Admin_authetic();
#.............................................................................................
//echo "<pre>";print_r($_REQUEST);echo "</pre>";
//echo "<pre>";print_r($_SESSION);echo "</pre>";

    if(isset($_GET['eid']) && !empty($_GET['eid'])){
    
        if(isset($_POST['action']) && ($_POST['action'] == "EDIT") ){
    		$objAdmin->editUser($_GET['eid']);
    	}
    	#Edit
    	$userValue = $objSite->getMultiValue("username, password, modules,user_designation, log_status",$CFG['table']['admin'],"admin_id='".$_GET['eid']."'");
        //echo "<pre>";print_r($userValue);echo "</pre>";
        $admin_smarty->assign("userEditList",$userValue);
    }
    else{
        
        if( isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'ADD' ){
            $objAdmin->addNewUser();
        }
    }

#Modules List
//$objAdmin->modulesList();

#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $admin_smarty->fetch('userAddEdit.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>