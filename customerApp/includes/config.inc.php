<?php
/**
Author               K.Vinothini
Start Date           05Jan2014        
Note:
      This is as include file for all the php files
       - setup.php is the parent file
       - included files &  global settings
**/
	require 'setup.php';
	#------------------------------------------------------------------------------------
	#Included files & global settings
    //require_once ($CFG['site']['include_path'].'/smarty_files.php');
    #------------------------------------------------------------------------------------
    #Site Path
    $CFG['site']['include_path']			= $CFG['site']['base_path']."/includes";
    $CFG['site']['include_url']				= $CFG['site']['base_url_https']."/includes";
    
    $CFG['site']['email_path']              = $CFG['site']['base_path']."/emailfile";
    $CFG['site']['email_url']               = $CFG['site']['base_url_https']."/emailfile";
    
    #MAIN URL
    $CFG['site']['main_base_path']    = $_SERVER['DOCUMENT_ROOT'].SITE_MAIN_FOLDER;
    $CFG['site']['main_base_url']     = "http://".$_SERVER['HTTP_HOST'].SITE_MAIN_FOLDER;
    
    #Restaurant Photo
    $CFG['site']['photo_restaurant_path']	= $CFG['site']['main_base_path']."/uploads/photo_restaurant";
    $CFG['site']['photo_restaurant_url']	= $CFG['site']['main_base_url']."/uploads/photo_restaurant";
    
    #Site Logo
    $CFG['site']['photo_sitelogo_path']		= $CFG['site']['main_base_path']."/photo_sitelogo";
    $CFG['site']['photo_sitelogo_url']		= $CFG['site']['main_base_url']."/photo_sitelogo";
    
    $CFG['site']['theme_image_url']         = $CFG['site']['main_base_url']."/theme/default/images";
    
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
	//$req_file_name = $objSite->get_file_name();
	#------------------------------------------------------------------------------------
	#Site setting
	$sitesetting = $objSite->getsite_setting();
	#------------------------------------------------------------------------------------
	#Js Global variable
	/*if($CFG['site']['fb_domain_name']=='fb' || $CFG['site']['fb_domain_name']=='facebook') 
    {
		$objSite->setglobalvarjavascript_fb();
        $objSite->lang_error_js_fb();
	}
    else 
    {
		$objSite->setglobalvarjavascript();
	}*/
    #------------------------------------------------------------------------------------
    #Time Zone
    $timezone = $CFG['site']['site_timezone'];
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
    
    $today = date('Y-m-d H:i:s');
	define('CUR_TIME',$today);
    //$objSmarty->assign("current",$today);
	#------------------------------------------------------------------------------------
	#Language Session & include files
	#$objSite->languageSession();
	#------------------------------------------------------------------------------------
	$admincpcnt = substr_count($_SERVER['REQUEST_URI'], 'admincp');
	if($admincpcnt == 0){
		//$objCommon = new Common;
		
        #Meta Tag
        //$objCommon->show_metatag();
        
		#Home
		if($req_file_name == 'restaurantOwnerRegister.php' || $req_file_name == 'customerLogin.php' || $req_file_name == 'customerRegister.php'){
			#Top Restauraunt by Cuisine
			//$objCommon->topRestaurantByCuisine();
		}
		
		#Footer-------------
		#Top cuisines restaurants
		//$objCommon->topCuisineRestaurants();
		
		#Top Restauraunt by Location - Areas
		//$objCommon->topRestByLocation();
		#Restauraunt Footer
		//$objCommon->footerContentList();
		#Hungryfood
		//$objCommon->howitworkContentList();
		#Footer Popular Restaurant chains
		//$objCommon->footerPopularRestaurantList();
		
		#Followers List Footer
		//$objCommon->followersList();
		#Followers List Header
		//$objCommon->followersHeaderList();
		
        // Facebook Apps individual restaurant menu
        #echo "<pre>";print_r($_REQUEST);echo "</pre>";
    	if((isset($_REQUEST['signed_request']) && !empty($_REQUEST['signed_request'])) && $domainname == 'fb')
        {
			$res = $objCommon->parse_signed_request($_REQUEST['signed_request']);
            
            #echo "<pre>";print_r($res);echo "</pre>";
			if(count($res['page'])>0) {
				$_GET['resid'] = $objSite->getValue("resid",$CFG['table']['facebook_page'],"fb_pageid='".$res['page']['id']."'");
				$_REQUEST['resid'] = $_GET['resid'];
			}	 
    	} 
	}else{
		
		//Admin side
		$objAdminMgmt	= new AdminManagement;
		#Statistics
		//$objAdminMgmt->IndexStatics();
		#Today List
		//$objAdminMgmt->restaurantDashboardTodayOrders();
		$admin_smarty->assign("objAdminMgmt", $objAdminMgmt);
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
    header("Cache-Control: no-cache, must-revalidate");
    
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) 
	{
		$_SESSION['browser'] = "MSIE";
		//$objSmarty->assign("browser",$_SESSION['browser']);
		//$admin_smarty->assign("browser",$_SESSION['browser']);
	}
	//Number of pending order
	$pending_ord     = $objSite->getNumvalues($CFG['table']['order'],"delete_status = 'No' AND status = 'pending' AND restaurant_id != '0' AND paypal_status = 'success'");
	//$admin_smarty->assign("Pending",$pending_ord);
	//Number of processing order
	$Processing_ord	 = $objSite->getNumvalues($CFG['table']['order'],"delete_status = 'No' AND status = 'processing' AND restaurant_id != '0' AND paypal_status = 'success'");
	//$admin_smarty->assign("Processing",$Processing_ord);
	//$admin_smarty->assign("QueryString",$_SERVER['QUERY_STRING']);
	
?>