<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin			= new Admin;
$objAdmin->Admin_authetic();

$objAdminMgmt		= new AdminManagement;

#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);

#.............................................................................................
	#Export Process	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'exportProcess'){
		$objAdminMgmt->exportZipcode();
	}	
	#-----------------------------------------------------------------------------------------	
	#Import Process	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'importProcess'){
		
		$objAdminMgmt->importZipcode();
	}
	#-----------------------------------------------------------------------------------------
	#List
	$objAdminMgmt->zipcodeList();
    
    /*$sql_qry = " SELECT city_id, cityname FROM ".$CFG['table']['city']." WHERE statecode = 'AB1'  ";
	$res_qry = $objSite->ExecuteQuery($sql_qry,'select');
    
    foreach($res_qry as $key=>$value){
        
        $up_qry = " UPDATE ".$CFG['table']['zipcode']." SET cityid = '".$res_qry[$key]['city_id']."' WHERE cityid = '".$res_qry[$key]['cityname']."' AND zipcode_status = '1' AND zipcode_id BETWEEN 25501 AND 25750 ";
		//echo "<br>".$up_qry;
		$up_res = $objSite->ExecuteQuery($up_qry,'update');
	}*/
	
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $admin_smarty->fetch('zipcodeManage.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>