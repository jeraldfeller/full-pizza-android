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
#Edit Language
if(isset($_GET['langid']) && !empty($_GET['langid'])){
	
	$admin_smarty->assign('langcode',$_GET['langcode']);
	
	$objAdminMgmt	= new AdminManagement;
	$langvalue = $objSite->getMultiValue("lang_name, lang_code",$CFG['table']['language'],"lang_id='".$_GET['langid']."'");	
	$admin_smarty->assign("langvalue",$langvalue);
	
	/*$filename = $CFG['site']['language_path']."/".$langvalue[0]['lang_code']."/lang.php";	
	$filedata = $objSite->readfilecontent($filename);
	$admin_smarty->assign("filedata",$filedata);*/
	
	$dir_files_list = $objAdminMgmt->list_directory_files($CFG['site']['language_path']."/".$_GET['langcode']);
	$admin_smarty->assign('dir_files_list',$dir_files_list);
	
	if( isset($_GET['lfile']) && !empty($_GET['lfile']) ){
		
		$admin_smarty->assign("langcode",$langvalue[0]['lang_code']);
		
		$filename = $filename = $CFG['site']['language_path'].'/'.$_GET['langcode'].'/'.$_GET['lfile'];
		$filedata = $objSite->readfilecontent($filename);
        
        //echo $filedata;
        
       //echo "<pre>";print_r($filedata);echo "</pre>";
        
		
		if( $_GET['langcode'] == 'CS' || $_GET['langcode'] == 'SK' || $_GET['langcode'] == 'SL' || $_GET['langcode'] == 'AR' || $_GET['langcode'] == 'SV' || $_GET['langcode'] == 'LT' || $_GET['langcode'] == 'TR' || $_GET['langcode'] == 'ES'){
			$admin_smarty->assign("filedata",utf8_decode($filedata));
		}else{
			$admin_smarty->assign("filedata",utf8_decode($filedata));
		}
		
		
	}
	
}
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $admin_smarty->fetch('languageAddEdit.tpl');
$admin_smarty->assign("MAIN_CONTENT", $main_content);
$admin_smarty->display('admin_main.tpl');
?>