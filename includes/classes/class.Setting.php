<?php

/*	Class Function for Setting	*/

/**
 * Setting
 * 
 * @package   
 * @author 
 * @copyright gencyolcu
 * @version 2014
 * @access public
 */
class Setting extends Site
{

    var $user_friendly;
    var $site_name;
    var $page_user_side;
    var $page_admin_side;
    var $headertext;

    #FB
    var $site_fb_appsid;
    var $site_fb_appsecret;
    var $site_fb_menu_appsid;
    var $site_fb_menu_appsecret;

    #offline
    var $offline_status;
    var $offline_notes;
    #Currency
    var $currency_option;
    var $currency_sym;

    #Location
    var $site_address;
    var $site_city;
    var $site_zipcode;
    var $site_state;
    var $site_country;
    var $site_country_short;
    var $site_timezone;

    #Contact
    var $admin_name;
    var $admin_email;
    var $support_email;
    var $invoice_email;
    var $site_phone;

    #Analytics Code
    var $google_analytic_code;
    var $woopra_analytic_code;

    #Meta tag
    var $site_metatag_title;
    var $site_metatag_keyword;
    var $site_metatag_desc;

    #VAT
    var $site_vat_no;
    var $site_vat_percentage;
    var $site_cc_percentage;

    #SMS
    var $site_sms_api;
    var $site_sms_url;
    var $site_sms_username;
    var $site_sms_password;
    var $site_sms_sender;

    #Inter Fax
    var $site_interfax_username;
    var $site_interfax_password;

    #Icon Settings
    var $cuisine_thumb_width;
    var $cuisine_thumb_height;
    var $menu_thumb_width;
    var $menu_thumb_height;
    var $follower_icon_width;
    var $follower_icon_height;

    #Payment
    var $paypal_url_live;
    var $paypal_url_test;

    /**
     * Setting::__construct()
     * 
     * @return
     */
    function Setting()
    {
        parent::__construct();
        #Site Settings--------------------------------------------------------
        if (array_key_exists("sitename", $_POST))
        {
            $this->sitename = $this->filterInput($_POST['sitename']);
        }
        if (array_key_exists("userfriendly", $_POST))
        {
            $this->userfriendly = $this->filterInput($_POST['userfriendly']);
        }
        if (array_key_exists("user_page", $_POST))
        {
            $this->user_page = $this->filterInput($_POST['user_page']);
        }
        if (array_key_exists("admin_page", $_POST))
        {
            $this->admin_page = $this->filterInput($_POST['admin_page']);
        }
        if (array_key_exists("headertext", $_POST))
        {
            $this->headertext = addslashes(trim($this->filterInput($_POST['headertext'])));
        }

        #FB
        if (array_key_exists("site_fb_appsid", $_POST))
        {
            $this->site_fb_appsid = $this->filterInput($_POST['site_fb_appsid']);
        }
        if (array_key_exists("site_fb_appsecret", $_POST))
        {
            $this->site_fb_appsecret = $this->filterInput($_POST['site_fb_appsecret']);
        }
        if (array_key_exists("site_fb_menu_appsid", $_POST))
        {
            $this->site_fb_menu_appsid = $this->filterInput($_POST['site_fb_menu_appsid']);
        }
        if (array_key_exists("site_fb_menu_appsecret", $_POST))
        {
            $this->site_fb_menu_appsecret = $this->filterInput($_POST['site_fb_menu_appsecret']);
        }

        #COntact
        if (array_key_exists("admin_name", $_POST))
        {
            $this->admin_name = $this->filterInput($_POST['admin_name']);
        }
        if (array_key_exists("admin_email", $_POST))
        {
            $this->admin_email = $this->filterInput($_POST['admin_email']);
        }
        if (array_key_exists("support_email", $_POST))
        {
            $this->support_email = $this->filterInput($_POST['support_email']);
        }
        if (array_key_exists("invoice_email", $_POST))
        {
            $this->invoice_email = $this->filterInput($_POST['invoice_email']);
        }
        if (array_key_exists("site_phone", $_POST))
        {
            $this->site_phone = $this->filterInput($_POST['site_phone']);
        }
        #Location
        if (array_key_exists("site_address", $_POST))
        {
            $this->site_address = addslashes(trim($this->filterInput($_POST['site_address'])));
        }
        if (array_key_exists("site_city", $_POST))
        {
            $this->site_city = addslashes(trim($this->filterInput($_POST['site_city'])));
        }
        if (array_key_exists("site_zipcode", $_POST))
        {
            $this->site_zipcode = addslashes(trim($this->filterInput($_POST['site_zipcode'])));
        }
        if (array_key_exists("site_state", $_POST))
        {
            $this->site_state = addslashes(trim($this->filterInput($_POST['site_state'])));
        }
        if (array_key_exists("site_country", $_POST))
        {
            $this->site_country = addslashes(trim($this->filterInput($_POST['site_country'])));
        }
        if (array_key_exists("site_country_short", $_POST))
        {
            $this->site_country_short = addslashes(trim($this->filterInput($_POST['site_country_short'])));
        }
        if (array_key_exists("site_timezone", $_POST))
        {
            $this->site_timezone = addslashes(trim($this->filterInput($_POST['site_timezone'])));
        }

        #Offline
        if (array_key_exists("offline_status", $_POST))
        {
            $this->offline_status = $this->filterInput($_POST['offline_status']);
        }
        if (array_key_exists("offline_notes", $_POST))
        {
            $this->offline_notes = $this->filterInput($_POST['offline_notes']);
        }

        #SMS
        if (array_key_exists("site_sms_apiID", $_POST))
        {
            $this->site_sms_api = $this->filterInput($_POST['site_sms_apiID']);
        }
        if (array_key_exists("site_sms_url", $_POST))
        {
            $this->site_sms_url = $this->filterInput($_POST['site_sms_url']);
        }
        if (array_key_exists("site_sms_username", $_POST))
        {
            $this->site_sms_username = $this->filterInput($_POST['site_sms_username']);
        }
        if (array_key_exists("site_sms_password", $_POST))
        {
            $this->site_sms_password = $this->filterInput($_POST['site_sms_password']);
        }
        if (array_key_exists("site_sms_sender", $_POST))
        {
            $this->site_sms_sender = $this->filterInput($_POST['site_sms_sender']);
        }

        #Inter Fax
        if (array_key_exists("site_fax_username", $_POST))
        {
            $this->site_interfax_username = $this->filterInput($_POST['site_fax_username']);
        }
        if (array_key_exists("site_fax_password", $_POST))
        {
            $this->site_interfax_password = $this->filterInput($_POST['site_fax_password']);
        }

        #Currency
        if (array_key_exists("currency_option", $_POST))
        {
            $this->currency_option = $this->filterInput($_POST['currency_option']);
        }
        if (array_key_exists("currency_sym", $_POST))
        {
            $this->currency_sym = addslashes(trim($this->filterInput($_POST['currency_sym'])));
        }

        #Analytics
        if (array_key_exists("google_analytic_code", $_POST))
        {
            $this->google_analytic_code = addslashes(trim($this->filterInput($_POST['google_analytic_code'])));
        }
        if (array_key_exists("woopra_analytic_code", $_POST))
        {
            $this->woopra_analytic_code = addslashes(trim($this->filterInput($_POST['woopra_analytic_code'])));
        }
        #Meta tag
        if (array_key_exists("site_metatag_title", $_POST))
        {
            $this->site_metatag_title = $this->filterInput($_POST['site_metatag_title']);
        }
        if (array_key_exists("site_metatag_keyword", $_POST))
        {
            $this->site_metatag_keyword = $this->filterInput($_POST['site_metatag_keyword']);
        }
        if (array_key_exists("site_metatag_desc", $_POST))
        {
            $this->site_metatag_desc = $this->filterInput($_POST['site_metatag_desc']);
        }

        #VAT
        if (array_key_exists("site_vat_no", $_POST))
        {
            $this->site_vat_no = $this->filterInput($_POST['site_vat_no']);
        }
        if (array_key_exists("site_vat_percentage", $_POST))
        {
            $this->site_vat_percentage = $this->filterInput($_POST['site_vat_percentage']);
        }
        if (array_key_exists("site_cc_percentage", $_POST))
        {
            $this->site_cc_percentage = $this->filterInput($_POST['site_cc_percentage']);
        }
        if (array_key_exists("site_inv_setting", $_POST))
        {
            $this->site_inv_setting = $this->filterInput($_POST['site_inv_setting']);
        }

        #Icon Settings
        if (array_key_exists("cuisine_thumb_width", $_POST))
        {
            $this->cuisine_thumb_width = $this->filterInput($_POST['cuisine_thumb_width']);
        }
        if (array_key_exists("cuisine_thumb_height", $_POST))
        {
            $this->cuisine_thumb_height = $this->filterInput($_POST['cuisine_thumb_height']);
        }
        if (array_key_exists("cuisine_large_width", $_POST))
        {
            $this->cuisine_large_width = $this->filterInput($_POST['cuisine_large_width']);
        }
        if (array_key_exists("cuisine_large_height", $_POST))
        {
            $this->cuisine_large_height = $this->filterInput($_POST['cuisine_large_height']);
        }
        if (array_key_exists("menu_thumb_width", $_POST))
        {
            $this->menu_thumb_width = $this->filterInput($_POST['menu_thumb_width']);
        }
        if (array_key_exists("menu_thumb_height", $_POST))
        {
            $this->menu_thumb_height = $this->filterInput($_POST['menu_thumb_height']);
        }
        if (array_key_exists("restaurant_logo_thumb_width", $_POST))
        {
            $this->restaurant_logo_thumb_width = $this->filterInput($_POST['restaurant_logo_thumb_width']);
        }
        if (array_key_exists("restaurant_logo_thumb_height", $_POST))
        {
            $this->restaurant_logo_thumb_height = $this->filterInput($_POST['restaurant_logo_thumb_height']);
        }
        if (array_key_exists("restaurant_photo_thumb_width", $_POST))
        {
            $this->restaurant_photo_thumb_width = $this->filterInput($_POST['restaurant_photo_thumb_width']);
        }
        if (array_key_exists("restaurant_photo_thumb_height", $_POST))
        {
            $this->restaurant_photo_thumb_height = $this->filterInput($_POST['restaurant_photo_thumb_height']);
        }
        if (array_key_exists("follower_icon_width", $_POST))
        {
            $this->follower_icon_width = $this->filterInput($_POST['follower_icon_width']);
        }
        if (array_key_exists("follower_icon_height", $_POST))
        {
            $this->follower_icon_height = $this->filterInput($_POST['follower_icon_height']);
        }

        if (array_key_exists("marketbanner_width", $_POST))
        {
            $this->marketbanner_width = $this->filterInput($_POST['marketbanner_width']);
        }
        if (array_key_exists("marketbanner_height", $_POST))
        {
            $this->marketbanner_height = $this->filterInput($_POST['marketbanner_height']);
        }

        if (array_key_exists("paymenticon_width", $_POST))
        {
            $this->paymenticon_width = $this->filterInput($_POST['paymenticon_width']);
        }
        if (array_key_exists("paymenticon_height", $_POST))
        {
            $this->paymenticon_height = $this->filterInput($_POST['paymenticon_height']);
        }

        #Payment Settings
        if (array_key_exists("paypal_mode", $_POST))
        {
            $this->paypal_mode = $this->filterInput($_POST['paypal_mode']);
        }
        if (array_key_exists("paypal_url_live", $_POST))
        {
            $this->paypal_url_live = $this->filterInput($_POST['paypal_url_live']);
        }
        if (array_key_exists("paypal_url_test", $_POST))
        {
            $this->paypal_url_test = $this->filterInput($_POST['paypal_url_test']);
        }
        if (array_key_exists("business_live", $_POST))
        {
            $this->business_live = $this->filterInput($_POST['business_live']);
        }
        if (array_key_exists("business_test", $_POST))
        {
            $this->business_test = $this->filterInput($_POST['business_test']);
        }

    }

    #Update Site Settings
    /**
     * Setting::updateSiteSetting()
     * 
     * @return
     */
    function updateSiteSetting()
    {
        global $CFG, $admin_smarty;
        $UpQuery = "UPDATE " . $CFG['table']['sitesetting'] . " SET
							sitename 			 	= '" . $this->sitename . "',
							userfriendly 		 	= '" . $this->userfriendly . "',
							site_fb_appsid 		 	= '" . $this->site_fb_appsid . "',
                            site_fb_appsecret 		= '" . $this->site_fb_appsecret ."',
                            site_fb_menu_appsid     = '" . $this->site_fb_menu_appsid . "',
                            site_fb_menu_appsecret 	= '" . $this->site_fb_menu_appsecret . "',
							admin_name 			 	= '" . $this->admin_name . "',
							admin_email 		 	= '" . $this->admin_email . "',
							support_email 		 	= '" . $this->support_email . "',
							invoice_email 		 	= '" . $this->invoice_email . "',
							site_phone				= '" . $this->site_phone . "',
							site_address         	= '" . $this->site_address . "',
							site_city         		= '" . $this->site_city . "',
							site_zipcode         	= '" . $this->site_zipcode . "',
							site_state         		= '" . $this->site_state . "',
							site_country         	= '" . $this->site_country . "',
							site_country_short      = '" . $this->site_country_short . "',
							site_timezone         	= '" . $this->site_timezone . "',
							admin_page 			 	= '" . $this->admin_page . "',
							offline_status		 	= '" . $this->offline_status . "',
							offline_notes		 	= '" . $this->offline_notes . "',
							user_page 			 	= '" . $this->user_page . "',
							currency_option      	= '" . $this->currency_option . "',
							currency_symbol      	= '" . $this->currency_sym . "',
							google_analytic_code 	= '" . $this->google_analytic_code . "', 
							woopra_analytic_code 	= '" . $this->woopra_analytic_code . "',
							site_metatag_title		= '" . $this->site_metatag_title . "',
							site_metatag_keyword 	= '" . $this->site_metatag_keyword . "',
							site_metatag_desc 		= '" . $this->site_metatag_desc . "',
							site_vat_no 			= '" . $this->site_vat_no . "',
							site_vat_percentage 	= '" . $this->site_vat_percentage . "',
							site_cc_percentage		= '" . $this->site_cc_percentage . "',
                            site_inv_setting		= '" . $this->site_inv_setting ."',
							site_twiliosms_sid		= '" . $this->site_sms_api . "',
							site_twiliosms_token	= '" . $this->site_sms_url . "',
							site_twiliosms_from_no	= '" . $this->site_sms_username . "',
							site_sms_password		= '" . $this->site_sms_password . "',
							site_sms_sender			= '" . $this->site_sms_sender . "',
							site_interfax_username	= '" . $this->site_interfax_username . "',
							site_interfax_password	= '" . $this->site_interfax_password . "',
							admin_pending_order_alert = '" . $this->filterInput($_REQUEST['admin_alert']) . "',
                            searchbyoption          = '" . $this->filterInput($_REQUEST['searchbyoption']) ."',
                            searchoption          = '" . $this->filterInput($_REQUEST['searchoption']) ."',
                            mail_option             = '".$this->filterInput($_REQUEST['mail_option'])."',
                            smtp_host               = '".$this->filterInput($_REQUEST['smtp_host'])."',
                            smtp_port               = '".$this->filterInput($_REQUEST['smtp_port'])."',
                            smtp_username           = '".$this->filterInput($_REQUEST['smtp_username'])."',
                            smtp_password           = '".$this->filterInput($_REQUEST['smtp_password'])."',
                            google_api_key          = '".$this->filterInput($_REQUEST['gapi_key'])."'
							
						WHERE id  = '1'";
        $UpResult = $this->ExecuteQuery($UpQuery, 'update');

        #Upload Site Logo
        $imagesizedata = getimagesize($_FILES['sitelogo']['tmp_name']);
        if (isset($_FILES['sitelogo']['name']) && !empty($_FILES['sitelogo']['name']) && $imagesizedata == TRUE)
        {

            $getphotoname = $this->getValue("sitelogo", $CFG['table']['sitesetting'],
                "id = '1' ");
            if (!empty($getphotoname))
            {
                @unlink($CFG['site']['photo_sitelogo_path'] . '/' . $getphotoname);
            }

            $logoext = $this->getFileExtension($_FILES['sitelogo']['name']);
            $logoimage = "logo_" . $this->seoUrl($_POST["sitename"]) . "." . $logoext;
            $dest_name = $CFG['site']['photo_sitelogo_path'] . '/' . $logoimage;

            @move_uploaded_file($_FILES['sitelogo']['tmp_name'], $dest_name);
            @chmod($dest_name, 0777);

            $query = "UPDATE " . $CFG['table']['sitesetting'] . " SET sitelogo = '" . $logoimage .
                "' WHERE id = '1' ";
            $res = $this->ExecuteQuery($query, "update");
        }
        #Upload Fav Icon
        $imagesizedata1 = getimagesize($_FILES['site_fav_icon']['tmp_name']);
        
        if (isset($_FILES['site_fav_icon']['name']) && !empty($_FILES['site_fav_icon']['name']) && $imagesizedata1 == TRUE)
        {
		
            $getphotoname = $this->getValue("site_fav_icon", $CFG['table']['sitesetting'],
                "id = '1' ");
            if (!empty($getphotoname))
            {
                @unlink($CFG['site']['photo_sitelogo_path'] . '/' . $getphotoname);
            }

            $logoext = $this->getFileExtension($_FILES['site_fav_icon']['name']);
            $imgname = "favicon.ico";
            $dest_name = $CFG['site']['photo_sitelogo_path'] . '/' . $imgname;

            @move_uploaded_file($_FILES['site_fav_icon']['tmp_name'], $dest_name);
            @chmod($dest_name, 0777);

            $query = "UPDATE " . $CFG['table']['sitesetting'] . " SET site_fav_icon = '" . $imgname .
                "' WHERE id = '1' ";
            $res = $this->ExecuteQuery($query, "update");
        }

        if ($_POST['currency_option'] == 'img')
        {
            $imagesizeCurr = getimagesize($_FILES['sitelogo']['tmp_name']);
            if (isset($_FILES['currencyimg']['name']) && !empty($_FILES['currencyimg']['name']) && $imagesizeCurr == TRUE)
            {

                $getphotoname = $this->getValue("currency_image", $CFG['table']['sitesetting'],
                    "id = '1' ");
                if (!empty($getphotoname))
                {
                    @unlink($CFG['site']['photo_sitelogo_path'] . '/' . $getphotoname);
                }

                $logoext = $this->getFileExtension($_FILES['currencyimg']['name']);
                $currencyimage = "currency_" . $this->seoUrl($_POST["sitename"]) . "." . $logoext;
                $dest_name = $CFG['site']['photo_sitelogo_path'] . '/' . $currencyimage;

                @move_uploaded_file($_FILES['currencyimg']['tmp_name'], $dest_name);
                @chmod($dest_name, 0777);

                $query = "UPDATE " . $CFG['table']['sitesetting'] . " SET currency_image = '" .
                    $currencyimage . "' WHERE id = '1' ";
                $res = $this->ExecuteQuery($query, "update");
            }
        }

        $admin_smarty->assign("SuccessMessage", "Site setting has been updated successfully");

    }
    #Update Site Sett
    /**
     * Setting::selectSiteSetting()
     * 
     * @return
     */
    function selectSiteSetting()
    {
        global $CFG, $admin_smarty;

       $selqry = " SELECT admin_name, admin_email, support_email, invoice_email, site_phone, userfriendly, site_fb_appsid, site_fb_appsecret, site_fb_menu_appsid, site_fb_menu_appsecret, sitename, sitelogo, site_fav_icon, offline_status, offline_notes, user_page, admin_page, currency_option , currency_image , currency_symbol, site_address, site_city, site_zipcode, site_state, site_country, site_country_short, site_timezone, google_analytic_code, woopra_analytic_code, site_metatag_title, site_metatag_keyword, site_metatag_desc, site_vat_no, site_vat_percentage, site_cc_percentage,site_twiliosms_sid, site_twiliosms_token, site_twiliosms_from_no, site_sms_password, site_sms_sender, site_interfax_username, site_interfax_password, admin_pending_order_alert, site_inv_setting, searchbyoption,searchoption,mail_option, smtp_host, smtp_port, smtp_username, smtp_password, google_api_key FROM " .
            $CFG['table']['sitesetting'] . " ";
        $resqry = $this->ExecuteQuery($selqry, "select");
        
        $admin_smarty->assign('site_adimin_value', $resqry);
    }
    #Icon Settings
    /**
     * Setting::updateIconSettings()
     * 
     * @return
     */
    function updateIconSettings()
    {
        global $CFG, $admin_smarty;

        $UpQuery = "UPDATE " . $CFG['table']['iconsetting'] . " SET 
													cuisine_thumb_width 			= '" . $this->cuisine_thumb_width . "', 
													cuisine_thumb_height			= '" . $this->cuisine_thumb_height . "',
													cuisine_large_width 			= '" . $this->cuisine_large_width . "', 
													cuisine_large_height			= '" . $this->cuisine_large_height . "',  
													menu_thumb_width 				= '" . $this->menu_thumb_width . "', 
													menu_thumb_height 				= '" . $this->menu_thumb_height . "',
													restaurant_logo_thumb_width 	= '" . $this->
            restaurant_logo_thumb_width . "',
													restaurant_logo_thumb_height 	= '" . $this->
            restaurant_logo_thumb_height . "',
													restaurant_photo_thumb_width 	= '" . $this->
            restaurant_photo_thumb_width . "',
													restaurant_photo_thumb_height 	= '" . $this->
            restaurant_photo_thumb_height . "',
													follower_icon_height			= '" . $this->follower_icon_height . "',
													follower_icon_width				= '" . $this->follower_icon_width . "',
													marketbanner_width				= '" . $this->marketbanner_width . "',
													marketbanner_height			    = '" . $this->marketbanner_height . "',
													paymenticon_width				= '" . $this->paymenticon_width . "',
													paymenticon_height			    = '" . $this->paymenticon_height . "'
												WHERE id  = '1'";

        $UpResult = $this->ExecuteQuery($UpQuery, 'update');
        //echo $UpResult;
        //exit;
        if ($UpResult)
            echo 'updated_success';
        exit;
    }
    #Update Site Settings
    /**
     * Setting::selectIconSetting()
     * 
     * @return
     */
    function selectIconSetting()
    {
        global $CFG, $admin_smarty;

        $selqry = "SELECT cuisine_thumb_width, cuisine_thumb_height, cuisine_large_width, cuisine_large_height, menu_thumb_width, menu_thumb_height, restaurant_logo_thumb_width,   restaurant_logo_thumb_height, restaurant_photo_thumb_width, restaurant_photo_thumb_height, follower_icon_width, follower_icon_height, marketbanner_width, marketbanner_height, paymenticon_width, paymenticon_height FROM " .
            $CFG['table']['iconsetting'] . " ";
        $resqry = $this->ExecuteQuery($selqry, "select");

        $admin_smarty->assign('iconSettingVal', $resqry);
    }

    #Payment Settings
    /**
     * Setting::updatePaymentSettings()
     * 
     * @return
     */
    function updatePaymentSettings()
    {
        global $CFG, $admin_smarty;
        //PayPal
        if ($_POST['paypal_mode'] == 'Live')
        {
            $UpQuery = "UPDATE 
								" . $CFG['table']['setting_payment'] . " 
							SET 
								paypal_mode			= '" . $this->paypal_mode . "', 
								paypal_url_live 	= '" . $this->paypal_url_live . "',
								business_live 	    = '" . $this->business_live . "' 
							WHERE id  = '1'";
        } else
        {
            $UpQuery = "UPDATE 
								" . $CFG['table']['setting_payment'] . " 
							SET 
								paypal_mode			= '" . $this->paypal_mode . "', 
								paypal_url_test 	= '" . $this->paypal_url_test . "',
								business_test 	    = '" . $this->business_test . "' 
							WHERE id  = '1'";

        }
        //PayPal Pro
        if ($_REQUEST['paypal_pro_mode'] == 'live')
        {
            $proUpQuery = "UPDATE
									" . $CFG['table']['setting_payment'] . " 
							SET 
									paypal_pro_mode		= '" . $this->filterInput($_REQUEST['paypal_pro_mode']) . "',
									pro_username_live	= '" . $this->filterInput($_REQUEST['pro_uname_live']) .
                "',
									pro_password_live	= '" . $this->filterInput($_REQUEST['pro_password_live']) .
                "',
									pro_signature_live	= '" . $this->filterInput($_REQUEST['pro_sign_live']) .
                "' 
							WHERE 	
									id  = '1'";
        } elseif ($_REQUEST['paypal_pro_mode'] == 'sandbox')
        {
            $proUpQuery = "UPDATE
									" . $CFG['table']['setting_payment'] . " 
							SET 
									paypal_pro_mode		= '" . $this->filterInput($_REQUEST['paypal_pro_mode']) . "',
									pro_username_test	= '" . $this->filterInput($_REQUEST['pro_uname_test']) .
                "',
									pro_password_test	= '" . $this->filterInput($_REQUEST['pro_password_test']) .
                "',
									pro_signature_test	= '" . $this->filterInput($_REQUEST['pro_sign_test']) .
                "' 
							WHERE 	
									id  = '1'";
        }
        //echo $proUpQuery;
        //Authorized.net
        if ($_REQUEST['authorized_mode'] == 'Live')
        {
            $netUpQuery = "UPDATE
									" . $CFG['table']['setting_payment'] . " 
							SET 
									authorized_mode					= '" . $this->filterInput($_REQUEST['authorized_mode']) . "',
									authorized_url_live				= '" . $this->filterInput($_REQUEST['authorized_url_live']) .
                "',
									authorized_login_key_live		= '" . $this->filterInput($_REQUEST['authorized_login_key_live']) .
                "',
									authorized_transaction_key_live	= '" . $this->filterInput($_REQUEST['authorized_transaction_key_live']) .
                "' 
							WHERE 	
									id  = '1'";
        } elseif ($_REQUEST['authorized_mode'] == 'Test')
        {
            $netUpQuery = "UPDATE
									" . $CFG['table']['setting_payment'] . " 
							SET 
									authorized_mode					= '" . $this->filterInput($_REQUEST['authorized_mode']) . "',
									authorized_url_test				= '" . $this->filterInput($_REQUEST['authorized_url_test']) .
                "',
									authorized_login_key_test		= '" . $this->filterInput($_REQUEST['authorized_login_key_test']) .
                "',
									authorized_transaction_key_test	= '" . $this->filterInput($_REQUEST['authorized_transaction_key_test']) .
                "' 
							WHERE 	
									id  = '1'";
        }
        //STRIPE PAYMENT
		if($_REQUEST['credit_mode'] == 'live'){
			$stripeUpQuery	= "UPDATE
								 ".$CFG['table']['setting_payment']." 
							   SET 
								 credit_mode		= '".$this->filterInput($_REQUEST['credit_mode'])."',
								 credit_stripe_live	= '".$this->filterInput($_REQUEST['credit_stripe_live'])."'
							   WHERE 	
								 id  = '1'";
		}elseif($_REQUEST['credit_mode'] == 'test'){
			$stripeUpQuery	= "UPDATE
			                     ".$CFG['table']['setting_payment']." 
							   SET 
								 credit_mode		= '".$this->filterInput($_REQUEST['credit_mode'])."',
								 credit_stripe_test	= '".$this->filterInput($_REQUEST['credit_stripe_test'])."'
							   WHERE 	
								 id  = '1'";
		}
        $stripeResult = $this->ExecuteQuery($stripeUpQuery, 'update');
        $UpResult = $this->ExecuteQuery($UpQuery, 'update');
        $proUpResult = $this->ExecuteQuery($proUpQuery, 'update');
        $netUpResult = $this->ExecuteQuery($netUpQuery, 'update');
        //echo $UpResult;
        //exit;
        //if($UpResult) echo 'updated_success';exit;
    }

    #Select Payment Settings
    /**
     * Setting::selectPaypalSetting()
     * 
     * @return
     */
    function selectPaypalSetting()
    {
        global $CFG, $admin_smarty;

        $selqry = "SELECT paypal_mode, paypal_url_live, paypal_url_test, business_live, business_test, paypal_pro_mode, pro_username_live, pro_password_live, pro_signature_live, pro_username_test, pro_password_test, pro_signature_test, authorized_mode, authorized_url_live, authorized_login_key_live, authorized_transaction_key_live, authorized_url_test, authorized_login_key_test, authorized_transaction_key_test, credit_mode,	credit_stripe_live, 	credit_stripe_test FROM " .
            $CFG['table']['setting_payment'] . " ";
        $resqry = $this->ExecuteQuery($selqry, "select");

        $admin_smarty->assign('paymentsettingval', $resqry);
    }

}

?>