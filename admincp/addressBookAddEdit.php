<?php 
include ("../includes/config.inc.php");
#Classes
$objAdmin	= new Admin();
$objAdmin->Admin_authetic();
$objAdminMgmt	= new AdminManagement;
#Check admin id not equal to 1 that time not redirect to not authorised page
$php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
$req_file_name = end($php_self_arr);
$objAdmin->Admin_Pageauthetic($req_file_name);
#.............................................................................................
#Edit state
if(isset($_GET['addid']) && !empty($_GET['addid'])){
    
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] = 'Edit'){
        
        $objAdminMgmt->addressBookEdit();   
    }

	$addressBookvalue = $objSite->getMultiValue("id, customer_id, customer_apartment_name, customer_landmark, customer_street, customer_address_title, customer_state, customer_city, customer_zip, customer_landline, customer_address_label, status, added_date",$CFG['table']['customer_addressbook'],"id='".$objSite->filterInput($_GET['addid'])."' ");
	$objSite->showStateList();
	$objSite->showcityList($objSite->filterInput($addressBookvalue[0]['customer_state']));
	
	$admin_smarty->assign("addressBookvalue",$addressBookvalue);
    
}else{
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] = 'Add'){
        
        $objAdminMgmt->addAddressBook();   
    }
    $customer_name = $objSite->getMultiValue("customer_id, customer_name, customer_lastname",$CFG['table']['customer'],"status='1' AND delete_status = 'No' ORDER BY customer_name ASC");
    $admin_smarty->assign("customer",$customer_name);
}
$objSite->showStateList();

#.............................................................................................
#SMARTY ASSIGNING 
$admin_smarty->assign("objSite", $objSite);
//$admin_smarty->display('stateAddEdit.tpl');
$main_content = $admin_smarty->fetch('addressBookAddEdit.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>