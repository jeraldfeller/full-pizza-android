<?php
    
	#Templates & theme
    if($CFG['site']['fb_domain_name'] != 'fb' && $CFG['site']['fb_domain_name'] != 'facebook'){
        $CFG['site']['themename'] = 'theme/default/';
    }
    /*echo "<br>themename=>".$CFG['site']['themename']."<br>";
    echo "<br>base_path_temp=>".$CFG['site']['base_path_temp']."<br>";
    echo "<br>base_url_https_temp=>".$CFG['site']['base_url_https_temp']."<br>";*/
   	
	$CFG['site']['tpl_path']				= $CFG['site']['base_path_temp']."/".$CFG['site']['themename']."templates";
	$CFG['site']['comp_path']				= $CFG['site']['base_path_temp']."/".$CFG['site']['themename']."templates_c";
	
	#CSS
    $CFG['site']['theme_css_url']			= $CFG['site']['base_url_https_temp']."/".$CFG['site']['themename']."css";
	$CFG['site']['css_url']					= $CFG['site']['base_url_https']."/css";
	
	#Images
	$CFG['site']['image_path']				= $CFG['site']['base_path_temp']."/".$CFG['site']['themename']."images";
	$CFG['site']['image_url']				= $CFG['site']['base_url_https_temp']."/".$CFG['site']['themename']."images";
    
    #js
    $CFG['site']['js_url']					= $CFG['site']['base_url_https']."/js";
    
    $CFG['site']['include_path']			= $CFG['site']['base_path']."/includes";
    $CFG['site']['include_url']				= $CFG['site']['base_url_https']."/includes";
    
    $CFG['site']['language_path']			= $CFG['site']['include_path']."/language";
    $CFG['site']['language_url']			= $CFG['site']['include_url']."/language";
    
   //if(isset($_SESSION['lan']) && !empty($_SESSION['lan']) && $_SESSION['lan'] == 'EN') {
        
        $CFG['site']['emailtpl_path']	    = $CFG['site']['include_path']."/emailtemplates";
        $CFG['site']['emailtpl_url']		= $CFG['site']['include_url']."/emailtemplates";
        
    //} 
    
    $CFG['site']['upload_path']			    = $CFG['site']['base_path']."/uploads";
    $CFG['site']['upload_url']				= $CFG['site']['base_url_https']."/uploads";
    
    $CFG['site']['photo_sitelogo_path']		= $CFG['site']['upload_path']."/photo_sitelogo";
    $CFG['site']['photo_sitelogo_url']		= $CFG['site']['upload_url']."/photo_sitelogo";
        
	$CFG['site']['photo_cuisine_path']		= $CFG['site']['upload_path']."/photo_cuisine";
    $CFG['site']['photo_cuisine_url']		= $CFG['site']['upload_url']."/photo_cuisine";  
	
	$CFG['site']['photo_followers_path']	= $CFG['site']['upload_path']."/photo_followers";
    $CFG['site']['photo_followers_url']		= $CFG['site']['upload_url']."/photo_followers";       

    $CFG['site']['photo_menu_path']			= $CFG['site']['upload_path']."/photo_menu";
    $CFG['site']['photo_menu_url']			= $CFG['site']['upload_url']."/photo_menu";
    
    $CFG['site']['photo_restaurant_path']	= $CFG['site']['upload_path']."/photo_restaurant";
    $CFG['site']['photo_restaurant_url']	= $CFG['site']['upload_url']."/photo_restaurant";
    
    #plugin image upload path
    $CFG['site']['photo_plugin_restaurant_path']	= "/home/comeneat/public_html/comeneat_plugin/uploads/photo_restaurant";
    $CFG['site']['photo_plugin_menu_path']	         = "/home/comeneat/public_html/comeneat_plugin/uploads/photo_menu";
    
    $CFG['site']['photo_paymentinfo_path']	= $CFG['site']['upload_path']."/photo_paymentinfo";
    $CFG['site']['photo_paymentinfo_url']	= $CFG['site']['upload_url']."/photo_paymentinfo";
    
    $CFG['site']['photo_banner_path']		= $CFG['site']['upload_path']."/photo_banner";
    $CFG['site']['photo_banner_url']		= $CFG['site']['upload_url']."/photo_banner";
    
    // Cloud printer printer order files
    $CFG['site']['printerfiles_path']		= $CFG['site']['upload_path']."/printed_files";
    	
    #------------------------------------------------------------------------------------
    #Inc Smarty files
    require_once $CFG['site']['include_path'].'/smarty/Smarty.class.php';
    //require_once('../smarty/SmartyBC.class.php'); 
    #echo "<pre>";print_r($CFG);echo "</pre>";
    //require $CFG['site']['include_path'].'/smarty/Smarty.class.php';
    #User Side
    $objSmarty = new Smarty;
    $objSmarty->compile_check  = true;
    //$objSmarty->loadPlugin('smarty_compiler_switch');
    //$objSmarty->caching = true;
    //$objSmarty->cache_lifetime = 120;
    $objSmarty->debugging      = false;
	$objSmarty->template_dir  = $CFG['site']['tpl_path'];
    $objSmarty->compile_dir   = $CFG['site']['comp_path'];
    //require_once $CFG['site']['include_path'].'/smarty/SmartyBC.class.php';
    #Admin side
    $admin_smarty                 = new Smarty;
    $admin_smarty->compile_check  = true;
    //$admin_smarty->caching = true;
    //$admin_smarty->cache_lifetime = 120;
    $admin_smarty->debugging      = false;
    $admin_smarty->template_dir   = $CFG['site']['base_path']."/admincp/templates";
    $admin_smarty->compile_dir    = $CFG['site']['base_path']."/admincp/templates_c";
    
    #define("SITEBASEURL",$CFG['site']['base_url']);
    
    #Base Path
	$objSmarty->assign("SITE_BASEPATH",$CFG['site']['base_path']);
    
    #Base Url
    $objSmarty->assign("SITE_BASEURL",$CFG['site']['base_url_https_temp']);
    $admin_smarty->assign("SITE_BASEURL",$CFG['site']['base_url_https_temp']);
    
    $objSmarty->assign("SITE_BASEURL_MAIN",$CFG['site']['base_url_https']);
    $admin_smarty->assign("SITE_BASEURL_MAIN",$CFG['site']['base_url_https']);
    
    #Facebook folder name
    $admin_smarty->assign("FB_DOMAIN_NAME", $CFG['site']['fb_domain_name']);
    $objSmarty->assign("FB_DOMAIN_NAME",$CFG['site']['fb_domain_name']);
    
	#Css & Js
	$objSmarty->assign("SITE_THEME_CSS_URL",$CFG['site']['theme_css_url']);
	$objSmarty->assign("SITE_CSS_URL",$CFG['site']['css_url']);
    
	$objSmarty->assign("SITE_JS_URL",$CFG['site']['js_url']);
    $admin_smarty->assign("SITE_JS_URL",$CFG['site']['js_url']);
    $admin_smarty->assign("SITE_JS_URL",$CFG['site']['js_url']);
    
    #Sound URL
    $CFG['site']['sound_url']				= $CFG['site']['base_url_https']."/admincp/images/sound";
    $admin_smarty->assign("SOUND_URL",$CFG['site']['sound_url']);
    $objSmarty->assign("SOUND_URL",$CFG['site']['base_url_https']."/images/sound");
	#Image Url
	$objSmarty->assign("SITE_IMAGE_URL",$CFG['site']['image_url']);
	
	$objSmarty->assign("SITE_IMAGE_LOGO_URL",$CFG['site']['photo_sitelogo_url']);
	$admin_smarty->assign("SITE_IMAGE_LOGO_URL",$CFG['site']['photo_sitelogo_url']);
	
	$objSmarty->assign("SITE_IMAGE_CUISINE_URL",$CFG['site']['photo_cuisine_url']);
	$admin_smarty->assign("SITE_IMAGE_CUISINE_URL",$CFG['site']['photo_cuisine_url']);
	
	$objSmarty->assign("SITE_IMAGE_FOLLOWERS_URL",$CFG['site']['photo_followers_url']);
	$admin_smarty->assign("SITE_IMAGE_FOLLOWERS_URL",$CFG['site']['photo_followers_url']);
	
	$objSmarty->assign("SITE_IMAGE_MENU_URL",$CFG['site']['photo_menu_url']);
	$admin_smarty->assign("SITE_IMAGE_MENU_URL",$CFG['site']['photo_menu_url']);
	
	$objSmarty->assign("SITE_IMAGE_RESTAURANT_URL",$CFG['site']['photo_restaurant_url']);
	$admin_smarty->assign("SITE_IMAGE_RESTAURANT_URL",$CFG['site']['photo_restaurant_url']);
	
	$objSmarty->assign("SITE_IMAGE_PAYMENTINFO_URL",$CFG['site']['photo_paymentinfo_url']);
	$admin_smarty->assign("SITE_IMAGE_PAYMENTINFO_URL",$CFG['site']['photo_paymentinfo_url']);
	
	$objSmarty->assign("SITE_IMAGE_BANNER_URL",$CFG['site']['photo_banner_url']);
	$admin_smarty->assign("SITE_IMAGE_BANNER_URL",$CFG['site']['photo_banner_url']);

	
	
	#Imported File Url
	$objSmarty->assign("CATE_NAME_IMPORT_URL",$CFG['site']['categoryname_importfiles_url']);
	$admin_smarty->assign("CATE_NAME_IMPORT_URL",$CFG['site']['categoryname_importfiles_url']);
	
	$objSmarty->assign("LANGUAGE_URL",$CFG['site']['language_url']);
	$admin_smarty->assign("LANGUAGE_URL",$CFG['site']['language_url']);
	

?>