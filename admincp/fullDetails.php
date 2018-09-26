<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin		= new Admin;
$objAdmin->Admin_authetic();

#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);

$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
#.............................................................................................
	#View Contact Us details
    if(isset($_GET['det']) && !empty($_GET['det']) && $_GET['det']=="contact")
    {
	   $objAdminRestaurantMgmt->contactUsDetails($_GET['det_id']);
    }
    #View FeedBack details
    if(isset($_GET['det']) && !empty($_GET['det']) && $_GET['det']=="feedback")
    {
	   $objAdminRestaurantMgmt->feedbackDetails($_GET['det_id']);
    }   
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $admin_smarty->fetch('fullDetails.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>