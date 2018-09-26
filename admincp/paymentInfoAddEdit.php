<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin	= new Admin;
$objAdmin->Admin_authetic();
$objAdminMgmt = new AdminManagement;	

#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);

#.............................................................................................	
		
	if(isset($_GET['payid']) && !empty($_GET['payid'])){
		#Edit cuisine name
		$objThumb	= new Thumbnail;
		global $objThumb;
		
		if(isset($_POST['action']) && ($_POST['action'] == "paymentInfoEdit") ){
			$objAdminMgmt->paymentInfoEdit();
		}
		
		$selectPaymentinfoValue = $objSite->getMultiValue("paymentinfo_id, paymentinfo_name, paymentinfo_photo, paymentinfo_status",$CFG['table']['paymentinfo'],"paymentinfo_id ='".$_GET['payid']."' ");
		$admin_smarty->assign('selectPaymentinfoValue',$selectPaymentinfoValue);
	}
	else{
		#Add new cuisine 
		$objThumb	= new Thumbnail;
		global $objThumb;
		
		if(isset($_POST['action']) && ($_POST['action'] == "paymentInfoAdd") ){
			$objAdminMgmt->paymentInfoAdd();
		}
			
	}


	/*#Add new cuisine 
	if(isset($_POST['action']) && !empty($_POST['action']) && empty($_GET['cusid']) && $_POST['action'] == "paymentInfoAddEdit"){
		
		$objThumb	= new Thumbnail;
		global $objThumb;
		
		$objAdminMgmt = new AdminManagement;	
		$objAdminMgmt->newCuisineAdd();		
	}
	#Edit cuisine name
	if( isset($_GET['cusid']) && !empty($_GET['cusid']) && isset($_POST['action']) && ($_POST['action'] == "CuisineAddEdit") ){
		$objThumb	= new Thumbnail;
		global $objThumb;
		
		$objAdminMgmt = new AdminManagement;	
		$objAdminMgmt->editCuisineName();	
	}else{
			$selectCuisineValue = $objSite->getMultiValue("cuisine_id, cuisine_name, cuisine_photo, cuisine_status, addeddate",$CFG['table']['cuisine'],"cuisine_id ='".$_GET['cusid']."' ");
			$admin_smarty->assign('selectCuisineValue',$selectCuisineValue);
	}*/
#.............................................................................................
#SMARTY ASSIGNING 
//$admin_smarty->display('cuisineAddEdit.tpl');
$main_content = $admin_smarty->fetch('paymentInfoAddEdit.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>