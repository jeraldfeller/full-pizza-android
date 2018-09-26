<?php
/**
Author			K.Vinothini
Start Date		05June2012
Note:			Dont Change this file for any reason, we keep some security key for safe our script.
*/
    ob_start();            //Turn on output buffering
    @session_start();       //Initialize session data
    //ob_implicit_flush(0);  //Turn implicit flush on/off
    //ini_set('display_errors', 0);     //Sets the value of a configuration option
    error_reporting(E_ALL ^ E_NOTICE);
    //ini_set("default_charset","UTF-8");
    //setlocale(LC_ALL, "UTF-8");
    	
    	require_once('dbDetails.php');
    	
    	//$serverhost_url = "food2takeaway.com".SITE_FOLDER;
        $serverhost_url = $_SERVER['HTTP_HOST'].SITE_FOLDER;
    	
		#BASE PATH & BASE URL
	    $CFG['site']['base_path']    = dirname(dirname(__FILE__));
	    $CFG['site']['base_url']     = "http://".$serverhost_url;
	    
	    if( $_SERVER["HTTPS"] == 'on' ){//check whether https or http
			$CFG['site']['base_url_https']     = "https://".$serverhost_url;
		}else{
			$CFG['site']['base_url_https']     = $CFG['site']['base_url'];
		}
	    
	    $CFG['db']['db_host']        = DATABASE_HOST;
	    $CFG['db']['db_user']        = DATABASE_USER;
	    $CFG['db']['db_pwd']         = DATABASE_PWD;
	    $CFG['db']['db_name']        = DATABASE_NAME;
	    $CFG['db']['table_prefix']   = TBL_PREFIX;
/**********************************************************************************************************/
?>