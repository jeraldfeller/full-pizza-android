<?php
/**
Author               K.Vinothini
Start Date           05June2012        
Note:
      This is as include file for all the php files
       - setup.php is the parent file
       - included files &  global settings
**/
	require 'cron_file.php';
    
    spl_autoload_register(__autoload);
	#------------------------------------------------------------------------------------
	#Included files & global settings
    require_once ('smarty_files.php');
    #------------------------------------------------------------------------------------
    #Table settings
	require_once ($CFG['site']['include_path'].'/DbTablesNames.php');
    #------------------------------------------------------------------------------------
    #Global object for db connections
    $objSite = new Site($db_host="localhost",$db_name="r0@ms0ft",$db_user="developer",$db_pwd="P@55w0rd");
    #$objThumb = new Thumbnail;
    #global $objSite,$CFG,$objThumb;
	global $objSite,$CFG,$_lang; 
	#------------------------------------------------------------------------------------
	#GET CURRENT FILENAME
	$req_file_name = $objSite->get_file_name();
	#------------------------------------------------------------------------------------
	#Site setting
	$sitesetting = $objSite->getsite_setting();
	#------------------------------------------------------------------------------------
	#Js Global variable
	$objSite->setglobalvarjavascript();
	#------------------------------------------------------------------------------------
	#Language Session & include files
	#$objSite->languageSession();
	
	#Default Time Zone
	#$timezone = "America/New_York";
	#$timezone = "Asia/Calcutta";
	$timezone = $CFG['site']['site_timezone'];	
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	
	$CFG['site']['current_date']					=	date("M,d.Y h:m:i");
	#$CFG['site']['current_date']	=	"date_format($current_date, '%m-%d-%Y %H:%i:%s')";
	#echo $current_date;
	
	#------------------------------------------------------------------------------------
	$admincpcnt = substr_count($_SERVER['REQUEST_URI'], 'admin');
	if($admincpcnt == 0){
		
		#Country
		define("SITE_COUNTRY","INDIA", true);
		define("SITE_COUNTRY_SHRT","IN", true);
	}	
	
	#------------------------------------------------------------------------------------
	#if($_GET['seourl'] == 'admincp') $objSite->redirectUrl($CFG['site']['base_url'].'/admincp/index.php');
	#................................................................................................
	function __autoload($class_name) {
		global $CFG;
		
		include_once $CFG['site']['include_path']."/classes/class.".$class_name.'.php';
		if (!class_exists($class_name, false)) {
	        trigger_error("Unable to load class: $class_name", E_USER_WARNING);
	    }
	}
	
#echo "<pre>Request";print_r($_SERVER);echo"</pre>";
/*echo "<pre>Request";print_r($_REQUEST);echo"</pre>";
echo "<pre>session";print_r($_SESSION);echo"</pre>";*/
#die("TEST");
#echo "<pre>";print_r($_SESSION);echo "</pre>";
?>