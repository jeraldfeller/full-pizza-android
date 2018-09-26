<?php

/**
 * @author gencyolcu
 * @copyright 2014
 */


include ("../includes/config.inc.php");
#Classes
$objAdmin			= new Admin;
$objAdmin->Admin_authetic();

$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;

#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);

//echo "<pre>";print_r($_REQUEST);echo "</pre>";
#.............................................................................................

    if (isset($_POST) && $_POST['voucherCode'] != '') {
        $objAdminRestaurantMgmt->voucherAddEdit();
    }
    if (isset($_GET['vid']) && $_GET['vid'] != '') {
        $objAdminRestaurantMgmt->voucherCodeDetails($_GET['vid']);
        
    }

    #List RestaurantSearch
	$objAdminRestaurantMgmt->getsearchRestaurantList();
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $admin_smarty->fetch('voucherAddEdit.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');


?>