<?php 
include ("../includes/config.inc.php");

$objAdmin	= new Admin();
$objAdmin->Admin_authetic();
$objAdminMgmt	= new AdminManagement;

#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);

/*/Number of pending order
$pending_ord     = $objSite->getNumvalues($CFG['table']['order'],"status = 'pending' AND restaurant_id != '0' AND paypal_status = 'success'");
$admin_smarty->assign("Pending",$pending_ord);*/
#.............................................................................................
	#Statistics
	$objAdminMgmt->IndexStatics();
	
	#Today List
	$objAdminMgmt->restaurantDashboardTodayOrders();
    #Week List
    $objAdminMgmt->restaurantDashboardWeekOrders();
    #This Month List
    $objAdminMgmt->restaurantDashboardMonthOrders();
     #This Year List
    $objAdminMgmt->restaurantDashboardYearOrders();
	
	/*#Upadte seoUrl.
	$sql_sel = "SELECT zipcode_id, 	areaname FROM rt_zipcode";
	$res	 = mysqli_query($sql_sel);
	
	while($row_seller = mysqli_fetch_assoc($res))
	{
		$res_list[] =  $row_seller;
		
		$query_upd 	= "UPDATE rt_zipcode SET area_seourl = '".$objSite->seoUrl($row_seller['areaname'])."' WHERE zipcode_id = '".$row_seller['zipcode_id']."' ";
		$res_Update = mysqli_query($query_upd);
		
	}*/
    
    if(!empty($_GET['action']) && $_GET['action'] == 'Viewable') {
        $objSite->updateViewable($objSite->filterInput($_GET['viewable']));
    }
	#echo "<pre>";print_r($res_list);echo "</pre>";

#.............................................................................................
#SMARTY ASSIGNING 
$admin_smarty->assign("objAdminMgmt", $objAdminMgmt);
$main_content = $admin_smarty->fetch('index.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>