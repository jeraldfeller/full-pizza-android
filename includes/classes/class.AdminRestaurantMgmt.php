<?php

/*	Class Function for Restaurant ADMIN RESTAURANT MANAGEMENT	*/

/**
 * AdminRestaurantMgmt
 * 
 * @package   
 * @author 
 * @copyright gencyolcu
 * @version 2014
 * @access public
 */
class AdminRestaurantMgmt extends Site
{

    var $restaurant_name;
    var $restaurant_phone;
    var $restaurant_website;
    var $restaurant_fax;
    var $restaurant_streetaddress;
    var $restaurant_city;
    var $restaurant_state;
    var $restaurant_zip;
    var $restaurant_contact_name;
    var $restaurant_contact_phone;
    var $restaurant_contact_email;
    var $restaurant_cloud_printer_email;
    var $restaurant_cloud_printer_password;
    var $restaurant_description;
    var $restaurant_estimated_time;
    var $restaurant_delivery;
    var $restaurant_delivery_areas;
    var $restaurant_delivery_charge;
    var $restaurant_delivery_zone;
    var $restaurant_coordinates_lat;
    var $restaurant_coordinates_long;
    var $restaurant_minorder_price;
    var $restaurant_salestax;
    var $restaurant_serving_cuisines;
    var $restaurant_video;
    var $restaurant_map;
    var $restaurant_pickup;
    var $restaurant_booktable;
    #var $restaurant_password;
    var $restaurant_delivery_distance;
    var $restaurant_set_status;
    var $restaurant_set_time;

    #Order Info
    var $order_email;
    var $receive_email;
    var $send_fax;
    var $gprs;
    var $google_cloud_printer;
    var $sms;

    #Bank
    var $res_bank_name;
    var $res_ac_no;
    var $res_routine_no;
    var $res_swift_code;

    /**
     * AdminRestaurantMgmt::AdminRestaurantMgmt()
     * 
     * @return
     */
    function __construct()
    {
        parent::__construct();
        #Restaurant
        if (array_key_exists("restaurant_name", $_POST))
        {
            $this->restaurant_name = $this->filterInput($_POST['restaurant_name']);
        }
        if (array_key_exists("restaurant_phone", $_POST))
        {
            $this->restaurant_phone = $this->filterInput($_POST['restaurant_phone']);
        }
        if (array_key_exists("restaurant_fax", $_POST))
        {
            $this->restaurant_fax = $this->filterInput($_POST['restaurant_fax']);
        }
        if (array_key_exists("restaurant_website", $_POST))
        {
            $this->restaurant_website = $this->filterInput($_POST['restaurant_website']);
        }
        if (array_key_exists("restaurant_streetaddress", $_POST))
        {
            $this->restaurant_streetaddress = $this->filterInput($_POST['restaurant_streetaddress']);
        }
        if (array_key_exists("restaurant_city", $_POST))
        {
            $this->restaurant_city = $this->filterInput($_POST['restaurant_city']);
        }
        if (array_key_exists("restaurant_state", $_POST))
        {
            $this->restaurant_state = $this->filterInput($_POST['restaurant_state']);
        }
        if (array_key_exists("restaurant_zip", $_POST))
        {
            $this->restaurant_zip = $this->filterInput($_POST['restaurant_zip']);
        }

        if (array_key_exists("restaurant_contact_name", $_POST))
        {
            $this->restaurant_contact_name = $this->filterInput($_POST['restaurant_contact_name']);
        }
        if (array_key_exists("restaurant_cloud_printer_email", $_POST))
        {
            $this->restaurant_cloud_printer_email = $this->filterInput($_POST['restaurant_cloud_printer_email']);
        }
        if (array_key_exists("restaurant_cloud_printer_password", $_POST))
        {
            $this->restaurant_cloud_printer_password = $this->filterInput($_POST['restaurant_cloud_printer_password']);
        }
        if (array_key_exists("restaurant_contact_phone", $_POST))
        {
            $this->restaurant_contact_phone = $this->filterInput($_POST['restaurant_contact_phone']);
        }
        if (array_key_exists("restaurant_streetaddress", $_POST))
        {
            $this->restaurant_contact_email = $this->filterInput($_POST['restaurant_contact_email']);
        }
        if (array_key_exists("restaurant_description", $_POST))
        {
            $this->restaurant_description = nl2br($this->filterInput($_POST['restaurant_description']));
        }
        if (array_key_exists("restaurant_estimated_time", $_POST))
        {
            $this->restaurant_estimated_time = $this->filterInput($_POST['restaurant_estimated_time']);
        }
        if (array_key_exists("restaurant_delivery", $_POST))
        {
            $this->restaurant_delivery = $this->filterInput($_POST['restaurant_delivery']);
        }

        if (array_key_exists("restaurant_delivery_areas", $_POST))
        {
            $this->restaurant_delivery_areas = $this->filterInput($_POST['restaurant_delivery_areas']);
        }
        if (array_key_exists("restaurant_delivery_charge", $_POST))
        {
            $this->restaurant_delivery_charge = $this->filterInput($_POST['restaurant_delivery_charge']);
        }
        if (array_key_exists("restaurant_coordinates", $_POST))
        {
        	list($latitude, $longitude) = split(',', $this->filterInput($_POST['restaurant_coordinates']));
        	$this->restaurant_coordinates_lat = $latitude;
        	$this->restaurant_coordinates_long = $longitude;
        	//echo $this->restaurant_coordinates_long;
        	//echo $this->restaurant_coordinates_lat;
        	//die();
        }
        if (array_key_exists("restaurant_delivery_zone", $_POST))
        {
        	$polygonInfo = "PolygonFromText('POLYGON((".$this->filterInput($_POST['restaurant_delivery_zone'])."))')";
        	$this->restaurant_delivery_zone = $polygonInfo;
        }
        if (array_key_exists("restaurant_delivery_distance", $_POST))
        {
            $this->restaurant_delivery_distance = $this->filterInput($_POST['restaurant_delivery_distance']);
        }
        #Open/Close Status
        if (array_key_exists("restaurant_set_status", $_POST)) {
 			$this->restaurant_set_status = $this->filterInput($_POST['restaurant_set_status']);
		}
        
        if (array_key_exists("restaurant_minorder_price", $_POST))
        {
            $this->restaurant_minorder_price = $this->filterInput($_POST['restaurant_minorder_price']);
        }
        if (array_key_exists("restaurant_salestax", $_POST))
        {
            $this->restaurant_salestax = $this->filterInput($_POST['restaurant_salestax']);
        }
        if (array_key_exists("restaurant_display", $_POST))
        {
            $this->restaurant_display = $this->filterInput($_POST['restaurant_display']);
        }
        if (array_key_exists("restaurant_map", $_POST))
        {
            $this->restaurant_map = trim($this->filterInput($_POST['restaurant_map']));
        }
        if (array_key_exists("restaurant_video", $_POST))
        {
            $this->restaurant_video = trim($this->filterInput($_POST['restaurant_video']));
        }
        if (array_key_exists("restaurant_pickup", $_POST))
        {
            $this->restaurant_pickup = trim($this->filterInput($_POST['restaurant_pickup']));
        }
        if (array_key_exists("restaurant_booktable", $_POST))
        {
            $this->restaurant_booktable = trim($this->filterInput($_POST['restaurant_booktable']));
        }
        /*if (array_key_exists("restaurant_password", $_POST)) {
        $this->restaurant_password = trim($_POST['restaurant_password']);
        }*/

        if (array_key_exists("restaurant_display_photo", $_POST))
        {
            $this->restaurant_display_photo = trim($this->filterInput($_POST['restaurant_display_photo']));
        }
        if (array_key_exists("restaurant_display_video", $_POST))
        {
            $this->restaurant_display_video = trim($this->filterInput($_POST['restaurant_display_video']));
        }
        if (array_key_exists("restaurant_display_banner", $_POST))
        {
            $this->restaurant_display_banner = trim($this->filterInput($_POST['restaurant_display_banner']));
        }

        #Order Info
        if (array_key_exists("order_email", $_POST))
        {
            $this->order_email = $this->filterInput($_POST['order_email']);
        }
        if (array_key_exists("order_number", $_POST))
        {
            $this->order_number = $this->filterInput($_POST['order_number']);
        }
        if (array_key_exists("receive_email", $_POST))
        {
            $this->receive_email = $this->filterInput($_POST['receive_email']);
        }
        if (array_key_exists("send_fax", $_POST))
        {
            $this->send_fax = $this->filterInput($_POST['send_fax']);
        }
        if (array_key_exists("gprs", $_POST))
        {
            $this->gprs = $this->filterInput($_POST['gprs']);
        }
        if (array_key_exists("google_cloud_printer", $_POST))
        {
            $this->google_cloud_printer = $this->filterInput($_POST['google_cloud_printer']);
        }
        if (array_key_exists("sms", $_POST))
        {
            $this->sms = $this->filterInput($_POST['sms']);
        }


        #Bank
        if (array_key_exists("res_bank_name", $_POST))
        {
            $this->res_bank_name = $this->filterInput($_POST['res_bank_name']);
        }
        if (array_key_exists("res_ac_no", $_POST))
        {
            $this->res_ac_no = $this->filterInput($_POST['res_ac_no']);
        }
        if (array_key_exists("res_routine_no", $_POST))
        {
            $this->res_routine_no = $this->filterInput($_POST['res_routine_no']);
        }
        if (array_key_exists("res_swift_code", $_POST))
        {
            $this->res_swift_code = $this->filterInput($_POST['res_swift_code']);
        }

    }
    #-------------------------------------------------------------------------------------------
    #Restaurant Add New
    /**
     * AdminRestaurantMgmt::restaurantAdd()
     * 
     * @return
     */
    function restaurantAdd()
    {
        global $CFG, $admin_smarty, $objThumb;

        #echo "<pre>";print_r($_REQUEST);echo "</pre>";
        #exit;

        #Restaurant Two Time Implementation:
        #Mon
        list($mon_firstopen_time, $mon_firstclose_time, $mon_secondopen_time, $mon_secondclose_time) =
            $this->insertTimeOption_Second_Time($_POST['restaurant_delivery_mon_open_hr'], $_POST['restaurant_delivery_mon_open_min'],
            $_POST['restaurant_delivery_mon_open_sess'], $_POST['restaurant_delivery_mon_close_hr'],
            $_POST['restaurant_delivery_mon_close_min'], $_POST['restaurant_delivery_mon_close_sess'],
            $_POST['restaurant_delivery_mon_open_hr_second'], $_POST['restaurant_delivery_mon_open_min_second'],
            $_POST['restaurant_delivery_mon_open_sess_second'], $_POST['restaurant_delivery_mon_close_hr_second'],
            $_POST['restaurant_delivery_mon_close_min_second'], $_POST['restaurant_delivery_mon_close_sess_second']);
        #Tues
        list($tue_firstopen_time, $tue_firstclose_time, $tue_secondopen_time, $tue_secondclose_time) =
            $this->insertTimeOption_Second_Time($_POST['restaurant_delivery_tue_open_hr'], $_POST['restaurant_delivery_tue_open_min'],
            $_POST['restaurant_delivery_tue_open_sess'], $_POST['restaurant_delivery_tue_close_hr'],
            $_POST['restaurant_delivery_tue_close_min'], $_POST['restaurant_delivery_tue_close_sess'],
            $_POST['restaurant_delivery_tue_open_hr_second'], $_POST['restaurant_delivery_tue_open_min_second'],
            $_POST['restaurant_delivery_tue_open_sess_second'], $_POST['restaurant_delivery_tue_close_hr_second'],
            $_POST['restaurant_delivery_tue_close_min_second'], $_POST['restaurant_delivery_tue_close_sess_second']);
        #Wed
        list($wed_firstopen_time, $wed_firstclose_time, $wed_secondopen_time, $wed_secondclose_time) =
            $this->insertTimeOption_Second_Time($_POST['restaurant_delivery_wed_open_hr'], $_POST['restaurant_delivery_wed_open_min'],
            $_POST['restaurant_delivery_wed_open_sess'], $_POST['restaurant_delivery_wed_close_hr'],
            $_POST['restaurant_delivery_wed_close_min'], $_POST['restaurant_delivery_wed_close_sess'],
            $_POST['restaurant_delivery_wed_open_hr_second'], $_POST['restaurant_delivery_wed_open_min_second'],
            $_POST['restaurant_delivery_wed_open_sess_second'], $_POST['restaurant_delivery_wed_close_hr_second'],
            $_POST['restaurant_delivery_wed_close_min_second'], $_POST['restaurant_delivery_wed_close_sess_second']);
        #Thurs
        list($thu_firstopen_time, $thu_firstclose_time, $thu_secondopen_time, $thu_secondclose_time) =
            $this->insertTimeOption_Second_Time($_POST['restaurant_delivery_thu_open_hr'], $_POST['restaurant_delivery_thu_open_min'],
            $_POST['restaurant_delivery_thu_open_sess'], $_POST['restaurant_delivery_thu_close_hr'],
            $_POST['restaurant_delivery_thu_close_min'], $_POST['restaurant_delivery_thu_close_sess'],
            $_POST['restaurant_delivery_thu_open_hr_second'], $_POST['restaurant_delivery_thu_open_min_second'],
            $_POST['restaurant_delivery_thu_open_sess_second'], $_POST['restaurant_delivery_thu_close_hr_second'],
            $_POST['restaurant_delivery_thu_close_min_second'], $_POST['restaurant_delivery_thu_close_sess_second']);
        #Fri
        list($fri_firstopen_time, $fri_firstclose_time, $fri_secondopen_time, $fri_secondclose_time) =
            $this->insertTimeOption_Second_Time($_POST['restaurant_delivery_fri_open_hr'], $_POST['restaurant_delivery_fri_open_min'],
            $_POST['restaurant_delivery_fri_open_sess'], $_POST['restaurant_delivery_fri_close_hr'],
            $_POST['restaurant_delivery_fri_close_min'], $_POST['restaurant_delivery_fri_close_sess'],
            $_POST['restaurant_delivery_fri_open_hr_second'], $_POST['restaurant_delivery_fri_open_min_second'],
            $_POST['restaurant_delivery_fri_open_sess_second'], $_POST['restaurant_delivery_fri_close_hr_second'],
            $_POST['restaurant_delivery_fri_close_min_second'], $_POST['restaurant_delivery_fri_close_sess_second']);
        #Satur
        list($sat_firstopen_time, $sat_firstclose_time, $sat_secondopen_time, $sat_secondclose_time) =
            $this->insertTimeOption_Second_Time($_POST['restaurant_delivery_sat_open_hr'], $_POST['restaurant_delivery_sat_open_min'],
            $_POST['restaurant_delivery_sat_open_sess'], $_POST['restaurant_delivery_sat_close_hr'],
            $_POST['restaurant_delivery_sat_close_min'], $_POST['restaurant_delivery_sat_close_sess'],
            $_POST['restaurant_delivery_sat_open_hr_second'], $_POST['restaurant_delivery_sat_open_min_second'],
            $_POST['restaurant_delivery_sat_open_sess_second'], $_POST['restaurant_delivery_sat_close_hr_second'],
            $_POST['restaurant_delivery_sat_close_min_second'], $_POST['restaurant_delivery_sat_close_sess_second']);
        #Sun
        list($sun_firstopen_time, $sun_firstclose_time, $sun_secondopen_time, $sun_secondclose_time) =
            $this->insertTimeOption_Second_Time($_POST['restaurant_delivery_sun_open_hr'], $_POST['restaurant_delivery_sun_open_min'],
            $_POST['restaurant_delivery_sun_open_sess'], $_POST['restaurant_delivery_sun_close_hr'],
            $_POST['restaurant_delivery_sun_close_min'], $_POST['restaurant_delivery_sun_close_sess'],
            $_POST['restaurant_delivery_sun_open_hr_second'], $_POST['restaurant_delivery_sun_open_min_second'],
            $_POST['restaurant_delivery_sun_open_sess_second'], $_POST['restaurant_delivery_sun_close_hr_second'],
            $_POST['restaurant_delivery_sun_close_min_second'], $_POST['restaurant_delivery_sun_close_sess_second']);
        #--------------------------------------------------------------------------------------------------------------------------------------

        $restaurant_password = $this->encrypt_password_md5($_POST["restaurant_password"]);
        $encode_restaurant_password = base64_encode($_POST["restaurant_password"]);

        $selareas = $this->filterInput($_POST['restaurant_delivery_areas']);
        if (isset($selareas) && !empty($selareas))
        {
            for ($i = 0; $i < count($selareas); $i++)
            {
                $serveareas = implode(",", $selareas);
            }
        }

        $selcuisine = $this->filterInput($_POST['restaurant_serving_cuisines']);
        if (isset($selcuisine) && !empty($selcuisine))
        {
            for ($i = 0; $i < count($selcuisine); $i++)
            {
                $servecuisine = implode(",", $selcuisine);
            }
        }
        
        $setrest_status = $this->filterInput($_POST['restaurant_set_status']);
        if($setrest_status != 'TT'){
            $setcurrenttime = date("H:i");
        }

        $restaurantseourl = $this->seoUrl($_POST['restaurant_name']);
        /*$pass = time();
        $password = substr(md5($pass),0, 7 );*/

        $restaurant_commission = $this->filterInput($_POST['restaurant_commission']);
        $res_marketbanner_option = $this->filterInput($_POST['restaurant_market_banner']);
        $res_marketbanner_code = $this->filterInput($_POST['market_ban_code']);

        #Restaurant Lat & Long
        //$res_straddress = $this->My_stripslashes($this->restaurant_streetaddress);
        //$res_area 		= $this->My_stripslashes($this->getValue("areaname",$CFG['table']['zipcode'],"zipcode_id  = '".$this->restaurant_zip."' "));
        //$res_zip 		= $this->My_stripslashes($this->getValue("zipcode",$CFG['table']['zipcode'],"zipcode_id  = '".$this->restaurant_zip."' "));
        //$res_area 		= $this->My_stripslashes($this->getValue("areaname",$CFG['table']['zipcode'],"zipcode  = '".$this->restaurant_zip."' "));
        $res_zip = $this->restaurant_zip;
        $res_city = $this->My_stripslashes($this->getValue("cityname", $CFG['table']['city'],
            "city_id  = '" . $this->restaurant_city . "' "));
        $res_state = $this->My_stripslashes($this->getValue("statename", $CFG['table']['state'],
            "statecode  = '" . $this->restaurant_state . "' "));

        list($restaurant_lat, $restaurant_long) = $this->findLatLongFromAddress($res_straddress,$res_city, $res_state, $rest_country = '');

        $ins_rest = "INSERT INTO 
								" . $CFG['table']['restaurant'] . "
						    SET
						    	restaurant_name  				 	= '" . $this->restaurant_name . "',
						    	restaurant_seourl  				 	= '" . $restaurantseourl . "',
						    	restaurant_phone  				 	= '" . $this->restaurant_phone . "',
						    	restaurant_website  			 	= '" . $this->restaurant_website . "',
						    	restaurant_fax 				 	    = '" . $this->restaurant_fax . "',
						    	restaurant_streetaddress  		 	= '" . $this->restaurant_streetaddress ."',
						    	restaurant_city  					= '" . $this->restaurant_city . "',
						    	restaurant_state  					= '" . $this->restaurant_state . "',
						    	restaurant_zip  					= '" . $this->restaurant_zip . "',
						    	restaurant_contact_name  			= '" . $this->restaurant_contact_name ."',
						    	restaurant_contact_phone  			= '" . $this->restaurant_contact_phone ."',
						    	restaurant_contact_email  			= '" . $this->restaurant_contact_email ."',
						    	restaurant_cloud_printer_email		= '" . $this->restaurant_cloud_printer_email . "',
						    	restaurant_cloud_printer_password	= '" . $this->restaurant_cloud_printer_password . "',
						    	restaurant_description  			= '" . $this->restaurant_description . "',
						    	restaurant_estimated_time  			= '" . $this->restaurant_estimated_time . "',
						    	restaurant_delivery  				= '" . $this->restaurant_delivery . "',
						    	restaurant_delivery_areas 			= '" . $serveareas . "',
						    	restaurant_delivery_charge 			= '" . $this->restaurant_delivery_charge . "',
						    	restaurant_delivery_distance		= '" . $this->restaurant_delivery_distance . "',
						    	restaurant_set_status               = '" . $this->restaurant_set_status."',
						    	restaurant_set_time                 = '" . $setcurrenttime."',
                                
						    	order_email_option					= '" . $this->order_email . "',
						    	order_receive_email					= '" . $this->receive_email . "',
                                order_phone_number					= '" . $this->order_number . "',
						    	send_fax_option						= '" . $this->send_fax . "',
						    	sms_option							= '" . $this->sms . "',
						    	gprs_option							= '" . $this->gprs . "',
						    	google_cloud_printer_option			= '" . $this->google_cloud_printer ."',
						    	
						    	restaurant_minorder_price 			= '" . $this->restaurant_minorder_price ."',
						    	restaurant_salestax 				= '" . $this->restaurant_salestax . "',
						    	restaurant_serving_cuisines 		= '" . $servecuisine . "',
						    	restaurant_displayoption 		    = '" . $this->restaurant_display . "',
						    	restaurant_password					= '" . $restaurant_password . "',
						    	restaurant_encrypt_password			= '" . $encode_restaurant_password ."',
						    	restaurant_commission 				= '" . $restaurant_commission . "',
						    	restaurant_inv_setting				= '" . $this->filterInput($_POST['restaurant_inv_setting']) ."',
						    	restaurant_map			 		    = '" . $this->restaurant_map . "',
                                restaurant_video		 		    = '" . $this->restaurant_video . "',
						    	restaurant_pickup		 		    = '" . $this->restaurant_pickup . "',
						    	restaurant_booktable	 		    = '" . $this->restaurant_booktable . "',
						    	restaurant_display_photo			= '" . $this->restaurant_display_photo ."',
						    	restaurant_display_video			= '" . $this->restaurant_display_video ."',
						    	restaurant_display_banner			= '" . $this->restaurant_display_banner ."',
						    	restaurant_lat						= '" . $restaurant_lat . "',
								restaurant_long						= '" . $restaurant_long . "',
						    	res_bank_name		 		    	= '" . $this->res_bank_name . "',
						    	res_ac_no		 		    		= '" . $this->res_ac_no . "',
						    	res_routine_no		 		    	= '" . $this->res_routine_no . "',
						    	res_swift_code		 		    	= '" . $this->res_swift_code . "',
                                restaurant_status                   = '2',
						    	pending_order_alert					= '" . $this->filterInput($_REQUEST['res_order_alert']) . "',
						    	addeddate = '" . CUR_TIME . "' ";
        //echo $ins_rest;echo  $this->restaurant_delivery_charge;
        //exit;
        $res_rest = $this->ExecuteQuery($ins_rest, 'insert');

        #Serving Cuisine added in new table
        if ($res_rest)
        {

            #Open and Close timing
            $ins_time = "INSERT INTO " . $CFG['table']['restaurant_timing'] . "	SET
								   restaurant_id 		 = '" . $res_rest . "',
								   mon_firstopen_time    = '" . $mon_firstopen_time . "',
								   mon_firstclose_time   = '" . $mon_firstclose_time . "',
								   tue_firstopen_time	 = '" . $tue_firstopen_time . "',
								   tue_firstclose_time	 = '" . $tue_firstclose_time . "',
								   wed_firstopen_time    = '" . $wed_firstopen_time . "',
								   wed_firstclose_time	 = '" . $wed_firstclose_time . "',
								   thu_firstopen_time	 = '" . $thu_firstopen_time . "',
								   thu_firstclose_time	 = '" . $thu_firstclose_time . "',
								   fri_firstopen_time	 = '" . $fri_firstopen_time . "',
								   fri_firstclose_time	 = '" . $fri_firstclose_time . "',
								   sat_firstopen_time	 = '" . $sat_firstopen_time . "',
								   sat_firstclose_time	 = '" . $sat_firstclose_time . "',
								   sun_firstopen_time	 = '" . $sun_firstopen_time . "',
								   sun_firstclose_time	 = '" . $sun_firstclose_time . "',
								   mon_secondopen_time	 = '" . $mon_secondopen_time . "',
								   mon_secondclose_time	 = '" . $mon_secondclose_time . "',
								   tue_secondopen_time	 = '" . $tue_secondopen_time . "',
								   tue_secondclose_time	 = '" . $tue_secondclose_time . "',
								   wed_secondopen_time	 = '" . $wed_secondopen_time . "',
								   wed_secondclose_time	 = '" . $wed_secondclose_time . "',
								   thu_secondopen_time	 = '" . $thu_secondopen_time . "',
								   thu_secondclose_time	 = '" . $thu_secondclose_time . "',
								   fri_secondopen_time	 = '" . $fri_secondopen_time . "',
								   fri_secondclose_time	 = '" . $fri_secondclose_time . "',
								   sat_secondopen_time	 = '" . $sat_secondopen_time . "',
								   sat_secondclose_time	 = '" . $sat_secondclose_time . "',
								   sun_secondopen_time	 = '" . $sun_secondopen_time . "',
								   sun_secondclose_time	 = '" . $sun_secondclose_time . "'";
            $res_time = $this->ExecuteQuery($ins_time, 'insert');
            //--------------------------------------------------
            //                  DISPATCH SYSTEM
            //--------------------------------------------------
            $data     = array(
                        'Restaurant' => array(
                            'res_id' => $res_rest,
                            'restaurant_name' => $this->restaurant_name,
                            'restaurant_address' => $this->restaurant_streetaddress.', '.$res_city.', '.$res_state.'-'.$res_zip
                        )
                    );
            $this->dispatchFoodSystem($data, 'restaurant');
            //--------------------------------------------------
            $inse = "INSERT INTO " . $CFG['table']['restaurant_choose_paymentoption'] .
                " SET restaurant_id = '" . $res_rest .
                "',paymentoption = '1',paymentmethod = 'Yes',addeddate = '" . CUR_TIME . "'";
            $rese = $this->ExecuteQuery($inse, 'insert');

            for ($i = 0; $i < count($selareas); $i++)
            {
                $ins_areas = "INSERT INTO " . $CFG['table']['restaurant_delivery_areas'] .
                    " SET restaurant_id = '" . $res_rest . "', zipcode_id = '" . $selareas[$i] .
                    "', addeddate='" . CUR_TIME . "' ";
                $res_areas = $this->ExecuteQuery($ins_areas, 'insert');
            }

            for ($i = 0; $i < count($selcuisine); $i++)
            {

                $ins_sercuisine = "INSERT INTO " . $CFG['table']['restaurant_serving_cuisines'] .
                    " SET restaurant_id = '" . $res_rest . "', cuisine_id = '" . $selcuisine[$i] .
                    "', addeddate='" . CUR_TIME . "' ";
                $res_sercuisine = $this->ExecuteQuery($ins_sercuisine, 'insert');
            }
            
            
            $city = $this->getValue("cityname", $CFG['table']['city'], "city_id = '" . $this->restaurant_city . "'");
            $zip = $this->restaurant_zip;

            $toemail = $CFG['site']['adminemail'];
            $res_name = stripslashes($this->restaurant_name);
            $street_addr = stripslashes($this->restaurant_streetaddress);
            $res_contact_name = stripslashes($this->restaurant_contact_name);


            #$mailsubject  = $CFG['site']['sitedomain'].": ".$CFG['site']['sitename']." Owner Register";
            $mailsubject = $CFG['site']['sitedomain'] . ": " . $CFG['site']['sitename'] . " New Restaurant Added";
            $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] . "/emailOwnerRegister.tpl");
            $mail_content = str_replace('{SITE_URL}', $CFG['site']['base_url'], $mail_content);
            $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
            $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
            $mail_content = str_replace('{SITE_DOMAIN}', $CFG['site']['sitedomain'], $mail_content);
            $mail_content = str_replace('{REST_NAME}', $res_name, $mail_content);
            $mail_content = str_replace('{REST_PHONE}', $this->restaurant_phone, $mail_content);
            $mail_content = str_replace('{REST_WEBSITE}', $this->restaurant_website, $mail_content);
            $mail_content = str_replace('{REST_STREETADDRESS}', $street_addr, $mail_content);
            $mail_content = str_replace('{REST_CITY}', $city, $mail_content);
            $mail_content = str_replace('{REST_STATE}', $this->restaurant_state, $mail_content);
            $mail_content = str_replace('{REST_ZIP}', $zip, $mail_content);
            $mail_content = str_replace('{REST_CONTACTNAME}', $res_contact_name, $mail_content);
            $mail_content = str_replace('{REST_CONTACTPHONE}', $this->restaurant_contact_phone, $mail_content);
            $mail_content = str_replace('{REST_CONTACTEMAIL}', $this->restaurant_contact_email, $mail_content);
            $mail_content = str_replace('{REST_CONTACTFAX}', $this->restaurant_fax, $mail_content);
            $mail_content = str_replace('{ADMIN}', 'Admin', $mail_content);

            $this->sendMail($res_name, $toemail, $this->restaurant_contact_email, $mailsubject, $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');

        }


        #Restaurant Logo
        $imagesizedata = getimagesize($_FILES['restaurant_logo']['tmp_name']);
        if (isset($_FILES['restaurant_logo']['name']) && !empty($_FILES['restaurant_logo']['name']) && $imagesizedata == TRUE)
        {

            $logoext = $this->getFileExtension($_FILES['restaurant_logo']['name']);
            $logoname = $this->seoUrl($this->restaurant_name) . "." . $logoext;
            $logoimage = "logo_" . $logoname;
            $dest_name = $CFG['site']['photo_restaurant_path'] . '/logo' . '/' . $logoimage;

            $uploadsuccess = @move_uploaded_file($_FILES['restaurant_logo']['tmp_name'], $dest_name);
            @chmod($dest_name, 0777);

            if ($uploadsuccess)
            {
                
                #Uplaod in plugin path
                $dest_name_plugin = $CFG['site']['photo_plugin_restaurant_path']. '/logo' . '/' . $logoimage;
                $uploadsuccesss = @move_uploaded_file($_FILES['restaurant_logo']['tmp_name'], $dest_name_plugin);
                @chmod($dest_name_plugin, 0777);
               
                #Get Thumbnail width & height
                $restlogothumb = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath = $dest_name;
                $logo = "logo_thumb_" . $logoname;

                $dest_imagepath = $CFG['site']['photo_restaurant_path'] . '/logo' . '/' . $logo;
                $objThumb->createThumb($sour_imagepath, $dest_imagepath, $restlogothumb['0']['restaurant_logo_thumb_width'],
                    $restlogothumb['0']['restaurant_logo_thumb_height'], 'crop');
                  
                #upload Plugin Path
                $copy = copy($dest_imagepath,$CFG['site']['photo_plugin_restaurant_path']. '/logo' . '/' . $logo);    

                @unlink($dest_name);
                
                

                $query = "UPDATE " . $CFG['table']['restaurant'] . " SET restaurant_logo = '" .
                    $logo . "' WHERE restaurant_id = '" . $res_rest . "' ";
                $res = $this->ExecuteQuery($query, "update");
            }
        }
        #Restaurant Photo1
        $imagesizedata1 = getimagesize($_FILES['restaurant_photos1']['tmp_name']);
        if (isset($_FILES['restaurant_photos1']['name']) && !empty($_FILES['restaurant_photos1']['name']) && $imagesizedata1 == TRUE)
        {

            $logoext = $this->getFileExtension($_FILES['restaurant_photos1']['name']);
            $logoname = $this->seoUrl($this->restaurant_name) . "1." . $logoext;
            $logoimage = "photo_" . $logoname;
            $dest_name = $CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $logoimage;
            
            $uploadsuccess = @move_uploaded_file($_FILES['restaurant_photos1']['tmp_name'],
                $dest_name);
            @chmod($dest_name, 0777);

            if ($uploadsuccess)
            {
                #Get Thumbnail width & height
                $restphotothumb = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath = $dest_name;
                $photo = "thumb_" . $logoname;

                $dest_imagepath = $CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $photo;
                $objThumb->createThumb($sour_imagepath, $dest_imagepath, $restphotothumb['0']['restaurant_photo_thumb_width'],
                    $restphotothumb['0']['restaurant_photo_thumb_height'], 'exact');
                    
                #upload Plugin Path    
                $copy = copy($dest_imagepath,$CFG['site']['photo_plugin_restaurant_path']. '/photos' . '/' . $photo); 
                
                
                @unlink($dest_name);

                $query = "UPDATE " . $CFG['table']['restaurant'] . " SET restaurant_photos1 = '" .
                    $photo . "' WHERE restaurant_id = '" . $res_rest . "' ";
                $res = $this->ExecuteQuery($query, "update");
            }
        }

        #Restaurant Photo2
        $imagesizedata2 = getimagesize($_FILES['restaurant_photos2']['tmp_name']);
        if (isset($_FILES['restaurant_photos2']['name']) && !empty($_FILES['restaurant_photos2']['name']) && $imagesizedata2 == TRUE)
        {

            $logoext2 = $this->getFileExtension($_FILES['restaurant_photos2']['name']);
            $logoname2 = $this->seoUrl($this->restaurant_name) . "2." . $logoext2;
            $logoimage2 = "photo_" . $logoname2;
            $dest_name2 = $CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $logoimage2;

            $uploadsuccess2 = @move_uploaded_file($_FILES['restaurant_photos2']['tmp_name'],
                $dest_name2);
            @chmod($dest_name2, 0777);

            if ($uploadsuccess2)
            {
                #Get Thumbnail width & height
                $restphotothumb2 = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath2 = $dest_name2;
                $photo2 = "thumb_" . $logoname2;

                $dest_imagepath2 = $CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $photo2;
                $objThumb->createThumb($sour_imagepath2, $dest_imagepath2, $restphotothumb2['0']['restaurant_photo_thumb_width'],
                    $restphotothumb2['0']['restaurant_photo_thumb_height'], 'exact');
                    
                #upload Plugin Path    
                $copy = copy($dest_imagepath2,$CFG['site']['photo_plugin_restaurant_path']. '/photos' . '/' . $photo2);    

                @unlink($dest_name2);

                $query2 = "UPDATE " . $CFG['table']['restaurant'] .
                    " SET restaurant_photos2 = '" . $photo2 . "' WHERE restaurant_id = '" . $res_rest .
                    "' ";
                $res2 = $this->ExecuteQuery($query2, "update");
            }
        }

        #Restaurant Photo3
        $imagesizedata3 = getimagesize($_FILES['restaurant_photos3']['tmp_name']);
        if (isset($_FILES['restaurant_photos3']['name']) && !empty($_FILES['restaurant_photos3']['name']) && $imagesizedata3 == TRUE)
        {

            $logoext3 = $this->getFileExtension($_FILES['restaurant_photos3']['name']);
            $logoname3 = $this->seoUrl($this->restaurant_name) . "3." . $logoext3;
            $logoimage3 = "photo_" . $logoname3;
            $dest_name3 = $CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $logoimage3;

            $uploadsuccess3 = @move_uploaded_file($_FILES['restaurant_photos3']['tmp_name'],
                $dest_name3);
            @chmod($dest_name3, 0777);

            if ($uploadsuccess3)
            {
                #Get Thumbnail width & height
                $restphotothumb3 = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath3 = $dest_name3;
                $photo3 = "thumb_" . $logoname3;

                $dest_imagepath3 = $CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $photo3;
                $objThumb->createThumb($sour_imagepath3, $dest_imagepath3, $restphotothumb3['0']['restaurant_photo_thumb_width'],
                    $restphotothumb3['0']['restaurant_photo_thumb_height'], 'exact');
                    
                #upload Plugin Path    
                $copy = copy($dest_imagepath3,$CFG['site']['photo_plugin_restaurant_path']. '/photos' . '/' . $photo3);    

                @unlink($dest_name3);

                $query3 = "UPDATE " . $CFG['table']['restaurant'] .
                    " SET restaurant_photos3 = '" . $photo3 . "' WHERE restaurant_id = '" . $res_rest .
                    "' ";
                $res3 = $this->ExecuteQuery($query3, "update");
            }
        }

        #Restaurant Photo4
        $imagesizedata4 = getimagesize($_FILES['restaurant_photos4']['tmp_name']);
        if (isset($_FILES['restaurant_photos4']['name']) && !empty($_FILES['restaurant_photos4']['name']) && $imagesizedata4 == TRUE)
        {

            $logoext4 = $this->getFileExtension($_FILES['restaurant_photos4']['name']);
            $logoname4 = $this->seoUrl($this->restaurant_name) . "4." . $logoext4;
            $logoimage4 = "photo_" . $logoname4;
            $dest_name4 = $CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $logoimage4;

            $uploadsuccess4 = @move_uploaded_file($_FILES['restaurant_photos4']['tmp_name'],
                $dest_name4);
            @chmod($dest_name4, 0777);

            if ($uploadsuccess4)
            {
                #Get Thumbnail width & height
                $restphotothumb4 = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath4 = $dest_name4;
                $photo4 = "thumb_" . $logoname4;

                $dest_imagepath4 = $CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $photo4;
                $objThumb->createThumb($sour_imagepath4, $dest_imagepath4, $restphotothumb4['0']['restaurant_photo_thumb_width'],
                    $restphotothumb4['0']['restaurant_photo_thumb_height'], 'exact');
                    
                    
                #upload Plugin Path    
                $copy = copy($dest_imagepath4,$CFG['site']['photo_plugin_restaurant_path']. '/photos' . '/' . $photo4);    
    

                @unlink($dest_name4);

                $query4 = "UPDATE " . $CFG['table']['restaurant'] .
                    " SET restaurant_photos4 = '" . $photo4 . "' WHERE restaurant_id = '" . $res_rest .
                    "' ";
                $res4 = $this->ExecuteQuery($query4, "update");
            }
        }

        #Restaurant Market Banner
        #if($res_marketbanner_option == 'img'){
        $imagesizebanner = getimagesize($_FILES['market_ban_image']['tmp_name']);
        if (isset($_FILES['market_ban_image']['name']) && !empty($_FILES['market_ban_image']['name']) && $imagesizebanner == TRUE)
        {

            $logoext = $this->getFileExtension($_FILES['market_ban_image']['name']);
            $logoname = $this->seoUrl($this->restaurant_name) . "." . $logoext;
            $logoimage = "logo_" . $logoname;
            $dest_name = $CFG['site']['photo_restaurant_path'] . '/banner' . '/' . $logoimage;

            $uploadsuccess = @move_uploaded_file($_FILES['market_ban_image']['tmp_name'], $dest_name);
            @chmod($dest_name, 0777);

            if ($uploadsuccess)
            {
                #Get Thumbnail width & height
                $restlogothumb = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath = $dest_name;
                $banner = "banner_thumb_" . $logoname;

                $dest_imagepath = $CFG['site']['photo_restaurant_path'] . '/banner' . '/' . $banner;
                $objThumb->createThumb($sour_imagepath, $dest_imagepath, $restlogothumb['0']['marketbanner_width'],
                    $restlogothumb['0']['marketbanner_height'], 'crop');

                @unlink($dest_name);

                $query = "UPDATE " . $CFG['table']['restaurant'] .
                    " SET res_marketbanner_img_code = '" . $banner . "' WHERE restaurant_id = '" . $res_rest .
                    "' ";
                $res = $this->ExecuteQuery($query, "update");
            }
        }
        /*}
        elseif($res_marketbanner_option == 'code'){
        $query = "UPDATE ".$CFG['table']['restaurant']." SET res_marketbanner_img_code = '".$res_marketbanner_code."' WHERE restaurant_id = '".$res_rest."' ";
        $res = $this->ExecuteQuery($query, "update");
        }*/
        

        $this->redirectUrl("restaurantManage.php");
    }
    #-------------------------------------------------------------------------------------------
    #Restaurant Edit
    /**
     * AdminRestaurantMgmt::restaurantEdit()
     * 
     * @param mixed $rid
     * @return
     */
    function restaurantEdit($rid)
    {
        global $CFG, $admin_smarty, $objThumb;

        #echo "<pre>";print_r($_REQUEST);echo "</pre>";
        #exit;

        /*#Mon
        list($res_mon_opening_time,$res_mon_closeing_time) = $this->insertTimeOption($_POST['restaurant_delivery_mon_open_hr'], $_POST['restaurant_delivery_mon_open_min'], $_POST['restaurant_delivery_mon_open_sess'], $_POST['restaurant_delivery_mon_close_hr'],$_POST['restaurant_delivery_mon_close_min'], $_POST['restaurant_delivery_mon_close_sess']);
        #Tues
        list($res_tue_opening_time,$res_tue_closeing_time) = $this->insertTimeOption($_POST['restaurant_delivery_tue_open_hr'], $_POST['restaurant_delivery_tue_open_min'], $_POST['restaurant_delivery_tue_open_sess'], $_POST['restaurant_delivery_tue_close_hr'],$_POST['restaurant_delivery_tue_close_min'], $_POST['restaurant_delivery_tue_close_sess']);
        #Wed
        list($res_wed_opening_time,$res_wed_closeing_time) = $this->insertTimeOption($_POST['restaurant_delivery_wed_open_hr'], $_POST['restaurant_delivery_wed_open_min'], $_POST['restaurant_delivery_wed_open_sess'], $_POST['restaurant_delivery_wed_close_hr'],$_POST['restaurant_delivery_wed_close_min'], $_POST['restaurant_delivery_wed_close_sess']);
        #Thurs
        list($res_thu_opening_time,$res_thu_closeing_time) = $this->insertTimeOption($_POST['restaurant_delivery_thu_open_hr'], $_POST['restaurant_delivery_thu_open_min'], $_POST['restaurant_delivery_thu_open_sess'], $_POST['restaurant_delivery_thu_close_hr'],$_POST['restaurant_delivery_thu_close_min'], $_POST['restaurant_delivery_thu_close_sess']);
        #Fri
        list($res_fri_opening_time,$res_fri_closeing_time) = $this->insertTimeOption($_POST['restaurant_delivery_fri_open_hr'], $_POST['restaurant_delivery_fri_open_min'], $_POST['restaurant_delivery_fri_open_sess'], $_POST['restaurant_delivery_fri_close_hr'],$_POST['restaurant_delivery_fri_close_min'], $_POST['restaurant_delivery_fri_close_sess']);
        #Satur
        list($res_sat_opening_time,$res_sat_closeing_time) = $this->insertTimeOption($_POST['restaurant_delivery_sat_open_hr'], $_POST['restaurant_delivery_sat_open_min'], $_POST['restaurant_delivery_sat_open_sess'], $_POST['restaurant_delivery_sat_close_hr'],$_POST['restaurant_delivery_sat_close_min'], $_POST['restaurant_delivery_sat_close_sess']);
        #Sun
        list($res_sun_opening_time,$res_sun_closeing_time) = $this->insertTimeOption($_POST['restaurant_delivery_sun_open_hr'], $_POST['restaurant_delivery_sun_open_min'], $_POST['restaurant_delivery_sun_open_sess'], $_POST['restaurant_delivery_sun_close_hr'],$_POST['restaurant_delivery_sun_close_min'], $_POST['restaurant_delivery_sun_close_sess']);*/

        #Restaurant Two Time Implementation:
        #Mon
        list($mon_firstopen_time, $mon_firstclose_time, $mon_secondopen_time, $mon_secondclose_time) =
            $this->insertTimeOption_Second_Time($_POST['restaurant_delivery_mon_open_hr'], $_POST['restaurant_delivery_mon_open_min'],
            $_POST['restaurant_delivery_mon_open_sess'], $_POST['restaurant_delivery_mon_close_hr'],
            $_POST['restaurant_delivery_mon_close_min'], $_POST['restaurant_delivery_mon_close_sess'],
            $_POST['restaurant_delivery_mon_open_hr_second'], $_POST['restaurant_delivery_mon_open_min_second'],
            $_POST['restaurant_delivery_mon_open_sess_second'], $_POST['restaurant_delivery_mon_close_hr_second'],
            $_POST['restaurant_delivery_mon_close_min_second'], $_POST['restaurant_delivery_mon_close_sess_second']);
        #Tues
        list($tue_firstopen_time, $tue_firstclose_time, $tue_secondopen_time, $tue_secondclose_time) =
            $this->insertTimeOption_Second_Time($_POST['restaurant_delivery_tue_open_hr'], $_POST['restaurant_delivery_tue_open_min'],
            $_POST['restaurant_delivery_tue_open_sess'], $_POST['restaurant_delivery_tue_close_hr'],
            $_POST['restaurant_delivery_tue_close_min'], $_POST['restaurant_delivery_tue_close_sess'],
            $_POST['restaurant_delivery_tue_open_hr_second'], $_POST['restaurant_delivery_tue_open_min_second'],
            $_POST['restaurant_delivery_tue_open_sess_second'], $_POST['restaurant_delivery_tue_close_hr_second'],
            $_POST['restaurant_delivery_tue_close_min_second'], $_POST['restaurant_delivery_tue_close_sess_second']);
        #Wed
        list($wed_firstopen_time, $wed_firstclose_time, $wed_secondopen_time, $wed_secondclose_time) =
            $this->insertTimeOption_Second_Time($_POST['restaurant_delivery_wed_open_hr'], $_POST['restaurant_delivery_wed_open_min'],
            $_POST['restaurant_delivery_wed_open_sess'], $_POST['restaurant_delivery_wed_close_hr'],
            $_POST['restaurant_delivery_wed_close_min'], $_POST['restaurant_delivery_wed_close_sess'],
            $_POST['restaurant_delivery_wed_open_hr_second'], $_POST['restaurant_delivery_wed_open_min_second'],
            $_POST['restaurant_delivery_wed_open_sess_second'], $_POST['restaurant_delivery_wed_close_hr_second'],
            $_POST['restaurant_delivery_wed_close_min_second'], $_POST['restaurant_delivery_wed_close_sess_second']);
        #Thurs
        list($thu_firstopen_time, $thu_firstclose_time, $thu_secondopen_time, $thu_secondclose_time) =
            $this->insertTimeOption_Second_Time($_POST['restaurant_delivery_thu_open_hr'], $_POST['restaurant_delivery_thu_open_min'],
            $_POST['restaurant_delivery_thu_open_sess'], $_POST['restaurant_delivery_thu_close_hr'],
            $_POST['restaurant_delivery_thu_close_min'], $_POST['restaurant_delivery_thu_close_sess'],
            $_POST['restaurant_delivery_thu_open_hr_second'], $_POST['restaurant_delivery_thu_open_min_second'],
            $_POST['restaurant_delivery_thu_open_sess_second'], $_POST['restaurant_delivery_thu_close_hr_second'],
            $_POST['restaurant_delivery_thu_close_min_second'], $_POST['restaurant_delivery_thu_close_sess_second']);
        #Fri
        list($fri_firstopen_time, $fri_firstclose_time, $fri_secondopen_time, $fri_secondclose_time) =
            $this->insertTimeOption_Second_Time($_POST['restaurant_delivery_fri_open_hr'], $_POST['restaurant_delivery_fri_open_min'],
            $_POST['restaurant_delivery_fri_open_sess'], $_POST['restaurant_delivery_fri_close_hr'],
            $_POST['restaurant_delivery_fri_close_min'], $_POST['restaurant_delivery_fri_close_sess'],
            $_POST['restaurant_delivery_fri_open_hr_second'], $_POST['restaurant_delivery_fri_open_min_second'],
            $_POST['restaurant_delivery_fri_open_sess_second'], $_POST['restaurant_delivery_fri_close_hr_second'],
            $_POST['restaurant_delivery_fri_close_min_second'], $_POST['restaurant_delivery_fri_close_sess_second']);
        #Satur
        list($sat_firstopen_time, $sat_firstclose_time, $sat_secondopen_time, $sat_secondclose_time) =
            $this->insertTimeOption_Second_Time($_POST['restaurant_delivery_sat_open_hr'], $_POST['restaurant_delivery_sat_open_min'],
            $_POST['restaurant_delivery_sat_open_sess'], $_POST['restaurant_delivery_sat_close_hr'],
            $_POST['restaurant_delivery_sat_close_min'], $_POST['restaurant_delivery_sat_close_sess'],
            $_POST['restaurant_delivery_sat_open_hr_second'], $_POST['restaurant_delivery_sat_open_min_second'],
            $_POST['restaurant_delivery_sat_open_sess_second'], $_POST['restaurant_delivery_sat_close_hr_second'],
            $_POST['restaurant_delivery_sat_close_min_second'], $_POST['restaurant_delivery_sat_close_sess_second']);
        #Sun
        list($sun_firstopen_time, $sun_firstclose_time, $sun_secondopen_time, $sun_secondclose_time) =
            $this->insertTimeOption_Second_Time($_POST['restaurant_delivery_sun_open_hr'], $_POST['restaurant_delivery_sun_open_min'],
            $_POST['restaurant_delivery_sun_open_sess'], $_POST['restaurant_delivery_sun_close_hr'],
            $_POST['restaurant_delivery_sun_close_min'], $_POST['restaurant_delivery_sun_close_sess'],
            $_POST['restaurant_delivery_sun_open_hr_second'], $_POST['restaurant_delivery_sun_open_min_second'],
            $_POST['restaurant_delivery_sun_open_sess_second'], $_POST['restaurant_delivery_sun_close_hr_second'],
            $_POST['restaurant_delivery_sun_close_min_second'], $_POST['restaurant_delivery_sun_close_sess_second']);

        #--------------------------------------------------------------------------------------------------------------------------------------

        /*$restaurant_password        = $this->encrypt_password_md5($_POST["restaurant_password"]);
        $encode_restaurant_password = base64_encode($_POST["restaurant_password"]);*/


        $selareas = $this->filterInput($_POST['restaurant_delivery_areas']);
        if (isset($selareas) && !empty($selareas))
        {
            for ($i = 0; $i < count($selareas); $i++)
            {
                $serveareas = implode(",", $selareas);
            }
        }

        $selcuisine = $this->filterInput($_POST['restaurant_serving_cuisines']);
        if (isset($selcuisine) && !empty($selcuisine))
        {
            for ($i = 0; $i < count($selcuisine); $i++)
            {
                $servecuisine = implode(",", $selcuisine);
            }
        }
        
        #Open/Close Status
        $setrest_status = $this->filterInput($_POST['restaurant_set_status']);
        if($setrest_status != 'TT'){
            $setcurrenttime = date("H:i");
        }

        $restaurantseourl = $this->seoUrl($_POST['restaurant_name']);
        $restaurant_commission = $this->filterInput($_POST['restaurant_commission']);
        $res_marketbanner_option = $this->filterInput($_POST['restaurant_market_banner']);
        $res_marketbanner_code = $this->filterInput($_POST['market_ban_code']);

        
        #Restaurant Lat & Long
        //$res_straddress = $this->My_stripslashes($this->restaurant_streetaddress);
        //$res_area 		= $this->My_stripslashes($this->getValue("areaname",$CFG['table']['zipcode'],"zipcode_id  = '".$this->restaurant_zip."' "));
        //$res_zip 		= $this->My_stripslashes($this->getValue("zipcode",$CFG['table']['zipcode'],"zipcode_id  = '".$this->restaurant_zip."' "));
        //$res_area 		= $this->My_stripslashes($this->getValue("areaname",$CFG['table']['zipcode'],"zipcode  = '".$this->restaurant_zip."' "));
        $res_zip = $this->restaurant_zip;
        $res_city = $this->My_stripslashes($this->getValue("cityname", $CFG['table']['city'],
            "city_id  = '" . $this->restaurant_city . "' "));
        $res_state = $this->My_stripslashes($this->getValue("statename", $CFG['table']['state'],
            "statecode  = '" . $this->restaurant_state . "' "));

        list($restaurant_lat, $restaurant_long) = $this->findLatLongFromAddress($res_straddress,$res_city, $res_state, $rest_country = '');

        $upd_rest = "UPDATE  
								" . $CFG['table']['restaurant'] . "
						    SET
                            
						    	restaurant_name  				 	= '" . $this->restaurant_name . "',
						    	restaurant_seourl  				 	= '" . $restaurantseourl . "',
						    	restaurant_phone  				 	= '" . $this->restaurant_phone . "',
						    	restaurant_website  			 	= '" . $this->restaurant_website . "',
						    	restaurant_fax 				 	    = '" . $this->restaurant_fax . "',
						    	restaurant_streetaddress  		 	= '" . $this->restaurant_streetaddress .
            "',
						    	restaurant_city  					= '" . $this->restaurant_city . "',
						    	restaurant_state  					= '" . $this->restaurant_state . "',
						    	restaurant_zip  					= '" . $this->restaurant_zip . "',
						    	restaurant_contact_name  			= '" . $this->restaurant_contact_name .
            "',
						    	restaurant_contact_phone  			= '" . $this->restaurant_contact_phone .
            "',
						    	restaurant_contact_email  			= '" . $this->restaurant_contact_email .
            "',
						    	restaurant_cloud_printer_email		= '" . $this->
            restaurant_cloud_printer_email . "',
						    	restaurant_cloud_printer_password	= '" . $this->
            restaurant_cloud_printer_password . "',
						    	restaurant_description  			= '" . $this->restaurant_description . "',
						    	restaurant_estimated_time  			= '" . $this->
            restaurant_estimated_time . "',
						    	restaurant_delivery  				= '" . $this->restaurant_delivery . "'," .
            /*
            restaurant_delivery_mon_opentime  	= '".$res_mon_opening_time."',
            restaurant_delivery_mon_closetime  	= '".$res_mon_closeing_time."',
            restaurant_delivery_tue_opentime  	= '".$res_tue_opening_time."',
            restaurant_delivery_tue_closetime  	= '".$res_tue_closeing_time."',
            restaurant_delivery_wed_opentime  	= '".$res_wed_opening_time."',
            restaurant_delivery_wed_closetime 	= '".$res_wed_closeing_time."',
            restaurant_delivery_thu_opentime  	= '".$res_thu_opening_time."',
            restaurant_delivery_thu_closetime  	= '".$res_thu_closeing_time."',
            restaurant_delivery_fri_opentime  	= '".$res_fri_opening_time."',
            restaurant_delivery_fri_closetime  	= '".$res_fri_closeing_time."',
            restaurant_delivery_sat_opentime  	= '".$res_sat_opening_time."',
            restaurant_delivery_sat_closetime  	= '".$res_sat_closeing_time."',
            restaurant_delivery_sun_opentime  	= '".$res_sun_opening_time."',
            restaurant_delivery_sun_closetime  	= '".$res_sun_closeing_time."',*/"
            					restaurant_delivery_zone 			= " . $this->restaurant_delivery_zone . ",
            					restaurant_lat 						= '" . $this->restaurant_coordinates_lat . "',
            					restaurant_long 					= '" . $this->restaurant_coordinates_long . "',
						    	restaurant_delivery_areas 			= '" . $serveareas . "',
						    	restaurant_delivery_charge 			= '" . $this->restaurant_delivery_charge . "',
						    	restaurant_delivery_distance		= '" . $this->restaurant_delivery_distance . "',
                                restaurant_set_status               = '" . $this->restaurant_set_status."',
						    	restaurant_set_time                 = '" . $setcurrenttime."',
						    	
						    	order_email_option					= '" . $this->order_email . "',
						    	order_receive_email					= '" . $this->receive_email . "',
                                order_phone_number					= '" . $this->order_number . "',
						    	send_fax_option						= '" . $this->send_fax . "',
						    	sms_option							= '" . $this->sms . "',
						    	gprs_option							= '" . $this->gprs . "',
						    	google_cloud_printer_option			= '" . $this->google_cloud_printer .
            "',
						    	
						    	restaurant_minorder_price 			= '" . $this->restaurant_minorder_price .
            "',
						    	restaurant_salestax 				= '" . $this->restaurant_salestax . "',
						    	restaurant_serving_cuisines 		= '" . $servecuisine . "',
						    	restaurant_displayoption 		    = '" . $this->restaurant_display . "',
						    	restaurant_map			 		    = '" . $this->restaurant_map . "',
						    	restaurant_video		 		    = '" . $this->restaurant_video . "',
						    	restaurant_pickup		 		    = '" . $this->restaurant_pickup . "',
						    	restaurant_booktable	 		    = '" . $this->restaurant_booktable . "',
						    	restaurant_display_photo			= '" . $this->restaurant_display_photo .
            "',
						    	restaurant_display_video			= '" . $this->restaurant_display_video .
            "',
						    	restaurant_display_banner			= '" . $this->restaurant_display_banner .
            "',
						    	restaurant_commission 				= '" . $restaurant_commission . "',
						    	restaurant_inv_setting				= '" . $this->filterInput($_POST['restaurant_inv_setting']) .
            "',
						    	res_bank_name		 		    	= '" . $this->res_bank_name . "',
						    	res_ac_no		 		    		= '" . $this->res_ac_no . "',
						    	res_routine_no		 		    	= '" . $this->res_routine_no . "',
						    	res_swift_code		 		    	= '" . $this->res_swift_code . "',
						    	pending_order_alert					= '" . $this->filterInput($_REQUEST['res_order_alert']) . "'
							WHERE restaurant_id = '" . $rid . "' ";
        //echo $upd_rest;
        //die();
        $upd_res_rest = $this->ExecuteQuery($upd_rest, 'update');
        //--------------------------------------------------
        //                  DISPATCH SYSTEM
        //--------------------------------------------------
        $data      = array(
                        'Restaurant' => array(
                            'res_id' => $rid,
                            'restaurant_name' => $this->restaurant_name,
                            'restaurant_address' => $this->restaurant_streetaddress.', '.$res_city.', '.$res_state.'-'.$res_zip
                        )
                    );
        $this->dispatchFoodSystem($data, 'restaurant');
        //--------------------------------------------------

        $restaurant_timing_num = $this->getNumvalues($CFG['table']['restaurant_timing'],
            "restaurant_id = '" . $rid . "'");
        #Open and Close timing
        if ($restaurant_timing_num == 0)
        {
            $upd_time = "INSERT INTO  
								" . $CFG['table']['restaurant_timing'] . "
							SET
							   restaurant_id 		 = '" . $rid . "',
							   mon_firstopen_time    = '" . $mon_firstopen_time . "',
							   mon_firstclose_time   = '" . $mon_firstclose_time . "',
							   tue_firstopen_time	 = '" . $tue_firstopen_time . "',
							   tue_firstclose_time	 = '" . $tue_firstclose_time . "',
							   wed_firstopen_time    = '" . $wed_firstopen_time . "',
							   wed_firstclose_time	 = '" . $wed_firstclose_time . "',
							   thu_firstopen_time	 = '" . $thu_firstopen_time . "',
							   thu_firstclose_time	 = '" . $thu_firstclose_time . "',
							   fri_firstopen_time	 = '" . $fri_firstopen_time . "',
							   fri_firstclose_time	 = '" . $fri_firstclose_time . "',
							   sat_firstopen_time	 = '" . $sat_firstopen_time . "',
							   sat_firstclose_time	 = '" . $sat_firstclose_time . "',
							   sun_firstopen_time	 = '" . $sun_firstopen_time . "',
							   sun_firstclose_time	 = '" . $sun_firstclose_time . "',
							   mon_secondopen_time	 = '" . $mon_secondopen_time . "',
							   mon_secondclose_time	 = '" . $mon_secondclose_time . "',
							   tue_secondopen_time	 = '" . $tue_secondopen_time . "',
							   tue_secondclose_time	 = '" . $tue_secondclose_time . "',
							   wed_secondopen_time	 = '" . $wed_secondopen_time . "',
							   wed_secondclose_time	 = '" . $wed_secondclose_time . "',
							   thu_secondopen_time	 = '" . $thu_secondopen_time . "',
							   thu_secondclose_time	 = '" . $thu_secondclose_time . "',
							   fri_secondopen_time	 = '" . $fri_secondopen_time . "',
							   fri_secondclose_time	 = '" . $fri_secondclose_time . "',
							   sat_secondopen_time	 = '" . $sat_secondopen_time . "',
							   sat_secondclose_time	 = '" . $sat_secondclose_time . "',
							   sun_secondopen_time	 = '" . $sun_secondopen_time . "',
							   sun_secondclose_time	 = '" . $sun_secondclose_time . "' ";

            $res_time = $this->ExecuteQuery($upd_time, 'insert');

        } else
        {
            $upd_time = "UPDATE  
								" . $CFG['table']['restaurant_timing'] . "
							SET
							   restaurant_id 		 = '" . $rid . "',
							   mon_firstopen_time    = '" . $mon_firstopen_time . "',
							   mon_firstclose_time   = '" . $mon_firstclose_time . "',
							   tue_firstopen_time	 = '" . $tue_firstopen_time . "',
							   tue_firstclose_time	 = '" . $tue_firstclose_time . "',
							   wed_firstopen_time    = '" . $wed_firstopen_time . "',
							   wed_firstclose_time	 = '" . $wed_firstclose_time . "',
							   thu_firstopen_time	 = '" . $thu_firstopen_time . "',
							   thu_firstclose_time	 = '" . $thu_firstclose_time . "',
							   fri_firstopen_time	 = '" . $fri_firstopen_time . "',
							   fri_firstclose_time	 = '" . $fri_firstclose_time . "',
							   sat_firstopen_time	 = '" . $sat_firstopen_time . "',
							   sat_firstclose_time	 = '" . $sat_firstclose_time . "',
							   sun_firstopen_time	 = '" . $sun_firstopen_time . "',
							   sun_firstclose_time	 = '" . $sun_firstclose_time . "',
							   mon_secondopen_time	 = '" . $mon_secondopen_time . "',
							   mon_secondclose_time	 = '" . $mon_secondclose_time . "',
							   tue_secondopen_time	 = '" . $tue_secondopen_time . "',
							   tue_secondclose_time	 = '" . $tue_secondclose_time . "',
							   wed_secondopen_time	 = '" . $wed_secondopen_time . "',
							   wed_secondclose_time	 = '" . $wed_secondclose_time . "',
							   thu_secondopen_time	 = '" . $thu_secondopen_time . "',
							   thu_secondclose_time	 = '" . $thu_secondclose_time . "',
							   fri_secondopen_time	 = '" . $fri_secondopen_time . "',
							   fri_secondclose_time	 = '" . $fri_secondclose_time . "',
							   sat_secondopen_time	 = '" . $sat_secondopen_time . "',
							   sat_secondclose_time	 = '" . $sat_secondclose_time . "',
							   sun_secondopen_time	 = '" . $sun_secondopen_time . "',
							   sun_secondclose_time	 = '" . $sun_secondclose_time . "'
						WHERE restaurant_id = '" . $rid . "' ";

            $res_time = $this->ExecuteQuery($upd_time, 'update');

        }

        #Serving Cuisine & Delivery Areas added in new table
        if ($upd_res_rest)
        {

            #Delivery Areas
            $trunc_tab = "DELETE FROM " . $CFG['table']['restaurant_delivery_areas'] .
                " WHERE restaurant_id = '" . $rid . "' ";
            $trunc_res = mysqli_query($this->DBCONN,$trunc_tab) or die(mysqli_error($this->DBCONN));

            for ($i = 0; $i < count($selareas); $i++)
            {
                $ins_areas = "INSERT INTO " . $CFG['table']['restaurant_delivery_areas'] .
                    " SET restaurant_id = '" . $rid . "', zipcode_id = '" . $selareas[$i] .
                    "', addeddate='" . CUR_TIME . "' ";
                $res_areas = $this->ExecuteQuery($ins_areas, 'insert');
            }

            #Serving Cuisine
            $trunc_tab = "DELETE FROM " . $CFG['table']['restaurant_serving_cuisines'] .
                " WHERE restaurant_id = '" . $rid . "' ";
            $trunc_res = mysqli_query($this->DBCONN,$trunc_tab) or die(mysqli_error($this->DBCONN));

            for ($i = 0; $i < count($selcuisine); $i++)
            {
                $ins_sercuisine = "INSERT INTO " . $CFG['table']['restaurant_serving_cuisines'] .
                    " SET restaurant_id = '" . $rid . "', cuisine_id = '" . $selcuisine[$i] .
                    "', addeddate='" . CUR_TIME . "' ";
                $res_sercuisine = $this->ExecuteQuery($ins_sercuisine, 'insert');
            }

        }
        #exit;
        #Restaurant Logo
        $imagesizedata = getimagesize($_FILES['restaurant_logo']['tmp_name']);
        if (isset($_FILES['restaurant_logo']['name']) && !empty($_FILES['restaurant_logo']['name']) && $imagesizedata == TRUE)
        {

            $getphotoname = $this->getValue("restaurant_logo", $CFG['table']['restaurant'],
                "restaurant_id = '" . $rid . "' ");
            if (!empty($getphotoname))
            {
                @unlink($CFG['site']['photo_restaurant_path'] . '/logo' . '/' . $getphotoname);
            }

            $logoext = $this->getFileExtension($_FILES['restaurant_logo']['name']);
            $logoname = $this->seoUrl($this->restaurant_name) .time()."." . $logoext;
            $logoimage = "logo_". $logoname;
            $dest_name = $CFG['site']['photo_restaurant_path'] . '/logo' . '/' . $logoimage;
            
            //echo $dest_name."<br>";
            //exit ;    
                
            $uploadsuccess = @move_uploaded_file($_FILES['restaurant_logo']['tmp_name'], $dest_name);
            @chmod($dest_name, 0777);

            if ($uploadsuccess)
            {
                
                
                 //echo $uploadsuccesss.$CFG['site']['photo_plugin_restaurant_path'];exit;
                
                #Get Thumbnail width & height
                $restlogothumb = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath = $dest_name;
                $logo = "logo_thumb_" . $logoname;

                $dest_imagepath = $CFG['site']['photo_restaurant_path'] . '/logo' . '/' . $logo;
                $objThumb->createThumb($sour_imagepath, $dest_imagepath, $restlogothumb['0']['restaurant_logo_thumb_width'],
                $restlogothumb['0']['restaurant_logo_thumb_height'], 'crop');
                
                #upload in plugin path
                $copy = copy($dest_imagepath,$CFG['site']['photo_plugin_restaurant_path']. '/logo' . '/' . $logo);

                unlink($dest_name);
                
                #Uplaod in plugin path
                //$dest_image_plugin_path = $CFG['site']['photo_plugin_restaurant_path'] . '/logo' . '/' . $logo;
                //$objThumb->createThumb($sour_imagepath, $dest_image_plugin_path, $restlogothumb['0']['restaurant_logo_thumb_width'],
                    //$restlogothumb['0']['restaurant_logo_thumb_height'], 'crop');

                //unlink($dest_image_plugin_path);
                
                

                $query = "UPDATE " . $CFG['table']['restaurant'] . " SET restaurant_logo = '" .
                    $logo . "' WHERE restaurant_id = '" . $rid . "' ";
                $res = $this->ExecuteQuery($query, "update");
            }
        }
        #Restaurant Photo1
        $imagesizedata1 = getimagesize($_FILES['restaurant_photos1']['tmp_name']);
        if (isset($_FILES['restaurant_photos1']['name']) && !empty($_FILES['restaurant_photos1']['name']) && $imagesizedata1 == TRUE)
        {

            $getphotoname1 = $this->getValue("restaurant_photos1", $CFG['table']['restaurant'],
                "restaurant_id = '" . $mid . "' ");
            if (!empty($getphotoname1))
            {
                @unlink($CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $getphotoname1);
            }

            $logoext = $this->getFileExtension($_FILES['restaurant_photos1']['name']);
            $logoname = $this->seoUrl($this->restaurant_name) .time()."1." . $logoext;
            $logoimage = "photo_". $logoname;
            $dest_name = $CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $logoimage;

            $uploadsuccess = @move_uploaded_file($_FILES['restaurant_photos1']['tmp_name'],
                $dest_name);
            @chmod($dest_name, 0777);

            if ($uploadsuccess)
            {
                #Get Thumbnail width & height
                $restphotothumb = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath = $dest_name;
                $photo = "thumb_" . $logoname;

                $dest_imagepath = $CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $photo;
                $objThumb->createThumb($sour_imagepath, $dest_imagepath, $restphotothumb['0']['restaurant_photo_thumb_width'],
                    $restlogothumb['0']['restaurant_photo_thumb_height'], 'crop');

                #upload Plugin Path    
                $copy = copy($dest_imagepath,$CFG['site']['photo_plugin_restaurant_path']. '/photos' . '/' . $photo); 
                
                
                unlink($dest_name);

                $query = "UPDATE " . $CFG['table']['restaurant'] . " SET restaurant_photos1 = '" .
                    $photo . "' WHERE restaurant_id = '" . $rid . "' ";
                     
                $res = $this->ExecuteQuery($query, "update");
            }
        }


        #Restaurant Photo2
        $imagesizedata2 = getimagesize($_FILES['restaurant_photos2']['tmp_name']);
        if (isset($_FILES['restaurant_photos2']['name']) && !empty($_FILES['restaurant_photos2']['name']) && $imagesizedata2 == TRUE)
        {

            $getphotoname2 = $this->getValue("restaurant_photos2", $CFG['table']['restaurant'],
                "restaurant_id = '" . $mid . "' ");
            if (!empty($getphotoname2))
            {
                @unlink($CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $getphotoname2);
            }

            $logoext = $this->getFileExtension($_FILES['restaurant_photos2']['name']);
            $logoname = $this->seoUrl($this->restaurant_name) .time()."2." . $logoext;
            $logoimage = "photo_" . $logoname;
            $dest_name = $CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $logoimage;

            $uploadsuccess = @move_uploaded_file($_FILES['restaurant_photos2']['tmp_name'],
                $dest_name);
            @chmod($dest_name, 0777);

            if ($uploadsuccess)
            {
                #Get Thumbnail width & height
                $restphotothumb = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath = $dest_name;
                $photo = "thumb_" . $logoname;

                $dest_imagepath = $CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $photo;
                $objThumb->createThumb($sour_imagepath, $dest_imagepath, $restphotothumb['0']['restaurant_photo_thumb_width'],
                    $restlogothumb['0']['restaurant_photo_thumb_height'], 'crop');
                    
                #upload Plugin Path    
                $copy = copy($dest_imagepath,$CFG['site']['photo_plugin_restaurant_path']. '/photos' . '/' . $photo);    

                unlink($dest_name);

                $query = "UPDATE " . $CFG['table']['restaurant'] . " SET restaurant_photos2 = '" .
                    $photo . "' WHERE restaurant_id = '" . $rid . "' ";
                $res = $this->ExecuteQuery($query, "update");
            }
        }

        #Restaurant Photo3
        $imagesizedata3 = getimagesize($_FILES['restaurant_photos3']['tmp_name']);
        if (isset($_FILES['restaurant_photos3']['name']) && !empty($_FILES['restaurant_photos3']['name']) && $imagesizedata3 == TRUE)
        {

            $getphotoname3 = $this->getValue("restaurant_photos3", $CFG['table']['restaurant'],
                "restaurant_id = '" . $mid . "' ");
            if (!empty($getphotoname3))
            {
                @unlink($CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $getphotoname3);
            }

            $logoext = $this->getFileExtension($_FILES['restaurant_photos3']['name']);
            $logoname = $this->seoUrl($this->restaurant_name) .time(). "3." . $logoext;
            $logoimage = "photo_" . $logoname;
            $dest_name = $CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $logoimage;

            $uploadsuccess = @move_uploaded_file($_FILES['restaurant_photos3']['tmp_name'],
                $dest_name);
            @chmod($dest_name, 0777);

            if ($uploadsuccess)
            {
                #Get Thumbnail width & height
                $restphotothumb = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath = $dest_name;
                $photo = "thumb_" . $logoname;

                $dest_imagepath = $CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $photo;
                $objThumb->createThumb($sour_imagepath, $dest_imagepath, $restphotothumb['0']['restaurant_photo_thumb_width'],
                    $restlogothumb['0']['restaurant_photo_thumb_height'], 'crop');
                    
                #upload Plugin Path    
                $copy = copy($dest_imagepath,$CFG['site']['photo_plugin_restaurant_path']. '/photos' . '/' . $photo);    

                unlink($dest_name);

                $query = "UPDATE " . $CFG['table']['restaurant'] . " SET restaurant_photos3 = '" .
                    $photo . "' WHERE restaurant_id = '" . $rid . "' ";
                $res = $this->ExecuteQuery($query, "update");
            }
        }

        #Restaurant Photo4
        $imagesizedata4 = getimagesize($_FILES['restaurant_photos4']['tmp_name']);
        if (isset($_FILES['restaurant_photos4']['name']) && !empty($_FILES['restaurant_photos4']['name']) && $imagesizedata4 == TRUE)
        {
             
            $getphotoname4 = $this->getValue("restaurant_photos4", $CFG['table']['restaurant'],
                "restaurant_id = '" . $mid . "' ");
            if (!empty($getphotoname4))
            {
                @unlink($CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $getphotoname4);
            }

            $logoext = $this->getFileExtension($_FILES['restaurant_photos4']['name']);
            $logoname = $this->seoUrl($this->restaurant_name) .time()."4." . $logoext;
            $logoimage = "photo_" . $logoname;
            $dest_name = $CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $logoimage;

            $uploadsuccess = @move_uploaded_file($_FILES['restaurant_photos4']['tmp_name'],
                $dest_name);
              
            @chmod($dest_name, 0777);

            if ($uploadsuccess)
            {
                #Get Thumbnail width & height
                $restphotothumb = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath = $dest_name;
                $photo = "thumb_" . $logoname;

                $dest_imagepath = $CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $photo;
                $objThumb->createThumb($sour_imagepath, $dest_imagepath, $restphotothumb['0']['restaurant_photo_thumb_width'],
                    $restlogothumb['0']['restaurant_photo_thumb_height'], 'crop');
                    
                    
                #upload Plugin Path    
                $copy = copy($dest_imagepath,$CFG['site']['photo_plugin_restaurant_path']. '/photos' . '/' . $photo);     

                unlink($dest_name);

                $query = "UPDATE " . $CFG['table']['restaurant'] . " SET restaurant_photos4 = '" .
                    $photo . "' WHERE restaurant_id = '" . $rid . "' ";
                    
                $res = $this->ExecuteQuery($query, "update");
            }
        }

        #Restaurant Market Banner
        #if($res_marketbanner_option == 'img'){
        $imagesizedata5 = getimagesize($_FILES['market_ban_image']['tmp_name']);
        if (isset($_FILES['market_ban_image']['name']) && !empty($_FILES['market_ban_image']['name']) && $imagesizedata5 == TRUE)
        {

            $getbannerimg = $this->getValue("res_marketbanner_img_code", $CFG['table']['restaurant'],
                "restaurant_id = '" . $rid . "' ");
            if (!empty($getbannerimg))
            {
                @unlink($CFG['site']['photo_restaurant_path'] . '/banner/' . $getbannerimg);
            }

            $logoext = $this->getFileExtension($_FILES['market_ban_image']['name']);
            $logoname = $this->seoUrl($this->restaurant_name) .time()."." . $logoext;
            $logoimage = "logo_" . $logoname;
            $dest_name = $CFG['site']['photo_restaurant_path'] . '/banner/' . $logoimage;

            $uploadsuccess = @move_uploaded_file($_FILES['market_ban_image']['tmp_name'], $dest_name);
            @chmod($dest_name, 0777);

            if ($uploadsuccess)
            {
                #Get Thumbnail width & height
                $restlogothumb = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath = $dest_name;
                $banner = "banner_thumb_" . $logoname;

                $dest_imagepath = $CFG['site']['photo_restaurant_path'] . '/banner/' . $banner;
                $objThumb->createThumb($sour_imagepath, $dest_imagepath, $restlogothumb['0']['marketbanner_width'],
                    $restlogothumb['0']['marketbanner_height'], 'crop');

                @unlink($dest_name);

                $query = "UPDATE " . $CFG['table']['restaurant'] .
                    " SET res_marketbanner_img_code = '" . $banner . "' WHERE restaurant_id = '" . $rid .
                    "' ";
                $res = $this->ExecuteQuery($query, "update");
            }
        }
        /*}
        elseif($res_marketbanner_option == 'code'){
        $query = "UPDATE ".$CFG['table']['restaurant']." SET res_marketbanner_img_code = '".$res_marketbanner_code."' WHERE restaurant_id = '".$rid."' ";
        $res = $this->ExecuteQuery($query, "update");
        }*/
        //echo "<pre>"; print_r($_REQUEST); echo "<pre>"; die("Test");

        $querystring = '?';
        if ($_REQUEST['page'] != '')
            $querystring .= 'page=' . $_REQUEST['page'];
        else
            $querystring .= 'page=1';

        if ($_REQUEST['searchrestaurantid'] != '')
            $querystring .= '&searchrestaurantid=' . $_REQUEST['searchrestaurantid'];

        if ($_REQUEST['sortby'] != '')
            $querystring .= '&sortby=' . $_REQUEST['sortby'];

        if ($_REQUEST['keyword'] != '')
            $querystring .= '&keyword=' . $_REQUEST['keyword'];


        $this->redirectUrl("restaurantManage.php" . $querystring);
    }
    #-------------------------------------------------------------------------------------------
    #Restaurant List
    /**
     * AdminRestaurantMgmt::restaurantList()
     * 
     * @return
     */
    function restaurantList()
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);
        $searchrestaurantid = $this->filterInput($_REQUEST['searchrestaurantid']);
        
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'rasc')
        {
            $sort = " ORDER BY restaurant_name ASC";
            $fields .= "&sortby=rasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'rdesc')
        {
            $sort = " ORDER BY restaurant_name DESC";
            $fields .= "&sortby=rdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'stateasc')
        {
            $sort = " ORDER BY st.statename ASC";
            $fields .= "&sortby=stateasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'statedesc')
        {
            $sort = " ORDER BY st.statename DESC";
            $fields .= "&sortby=statedesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cityasc')
        {
            $sort = " ORDER BY ci.cityname ASC";
            $fields .= "&sortby=cityasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'citydesc')
        {
            $sort = " ORDER BY ci.cityname DESC";
            $fields .= "&sortby=citydesc";
        }
        /*elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'zipasc'){
        $sort = " ORDER BY zi.zipcode ASC";
        $fields .= "&sortby=zipasc";
        }elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'zipdesc'){
        $sort = " ORDER BY zi.zipcode DESC";
        $fields .= "&sortby=zipdesc";
        }*/  elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'iasc')
        {
            $sort = " ORDER BY rs.restaurant_id ASC";
            $fields .= "&sortby=iasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'idesc')
        {
            $sort = " ORDER BY rs.restaurant_id DESC";
            $fields .= "&sortby=idesc";
        } else
        {
            $sort = " ORDER BY restaurant_name  ASC";
        }

        #Status
        if (!empty($_REQUEST['sortby']))
        {
            if ($_REQUEST['sortby'] == 'pending')
            {
                $condition = "AND restaurant_status = '2' ";
                $fields .= "&sortby=pending";
            } elseif ($_REQUEST['sortby'] == 'active')
            {
                $condition = "AND restaurant_status = '1'";
                $fields .= "&sortby=active";
            } elseif ($_REQUEST['sortby'] == 'deactive')
            {
                $condition = "AND restaurant_status = '0'";
                $fields .= "&sortby=deactive";
            }
        }

        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields .= "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND ( restaurant_name LIKE '%" . addslashes($req_keyword) .
                "%' OR restaurant_contact_email LIKE '%" . addslashes($req_keyword) .
                "%' OR rs.restaurant_zip LIKE '%" . addslashes($req_keyword) .
                "%' OR ci.cityname LIKE '%" . addslashes($req_keyword) .
                "%' ) ";
            $fields .= "&keyword=$_REQUEST[keyword]";
        }


        if (isset($searchrestaurantid) && !empty($searchrestaurantid))
        {
            $cond .= " AND restaurant_id = '" . $searchrestaurantid . "' ";
            $fields .= "&searchrestaurantid=$_REQUEST[searchrestaurantid]";

            $admin_smarty->assign("searchrestaurantid", $searchrestaurantid);
        }

        $sql_sel = "SELECT rs.restaurant_id, rs.restaurant_name, rs.restaurant_seourl, rs.restaurant_phone, rs.restaurant_streetaddress, rs.restaurant_city, rs.restaurant_state, rs.restaurant_zip, rs.restaurant_feature_status,rs.restaurant_footer_status, rs.restaurant_status,rs.addeddate, " .
            " ci.cityname," . //" zi.zipcode,".
            " st.statename" . " FROM " . $CFG['table']['restaurant'] . " AS rs " .
            " LEFT JOIN " . $CFG['table']['city'] .
            " AS ci ON rs.restaurant_city = ci.city_id " .
            //" LEFT JOIN ".$CFG['table']['zipcode']." AS zi ON rs.restaurant_zip = zi.zipcode_id ".
            " LEFT JOIN " . $CFG['table']['state'] .
            " AS st ON rs.restaurant_state = st.state_id " .
            " WHERE restaurant_id IS NOT NULL AND delete_status = 'No' " . $cond . " " . $condition .
            " " . $sort . " ";
        #echo $sql_sel;

        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');
        $targetpage = "restaurantManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt;
            $row_seller['menuscnt'] = $this->getNumvalues($CFG['table']['restaurant_menu'],
                "restaurant_id = '" . $this->filterInput($row_seller['restaurant_id']) . "'");
            $row_seller['addonscnt'] = $this->getNumvalues($CFG['table']['restaurant_addons'],
                "restaurant_id = '" . $this->filterInput($row_seller['restaurant_id']) . "'");
            $row_seller['offerscnt'] = $this->getNumvalues($CFG['table']['restaurant_offer'],
                "restaurant_id = '" . $this->filterInput($row_seller['restaurant_id']) . "'");
            $row_seller['orderscnt'] = $this->getNumvalues($CFG['table']['order'],
                "restaurant_id = '" . $this->filterInput($row_seller['restaurant_id']) . "'");
            $row_seller['reportscnt'] = $this->getNumvalues($CFG['table']['order'],
                "status = 'completed' AND restaurant_id = '" . $this->filterInput($row_seller['restaurant_id']) .
                "'");
            $row_seller['reviewscnt'] = $this->getNumvalues($CFG['table']['restaurant_reviews'],
                "restaurant_id = '" . $this->filterInput($row_seller['restaurant_id']) . "'");
            $row_seller['bookingcnt'] = $this->getNumvalues($CFG['table']['restaurant_booking'],
                "restaurant_id = '" . $this->filterInput($row_seller['restaurant_id']) . "'");
            $row_seller['commorderscnt'] = $this->getNumvalues($CFG['table']['order'],
                "status = 'completed' AND restaurant_id = '" . $this->filterInput($row_seller['restaurant_id']) .
                "'");
            $row_seller['zipcode'] = $row_seller['restaurant_zip'];
            
            $restaurant_status = $this->open_close_time_rest($row_seller['restaurant_id'],CUR_TIME);
            $row_seller['rest_status'] = $restaurant_status['0']; 
            $restaurantList[] = $row_seller;
            $cnt++;
        }

        #echo "<pre>";print_r($restaurantList);echo "</pre>";

        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        #Statistics
        $tot_res = $this->getNumvalues($CFG['table']['restaurant'],
            "restaurant_id != '' AND delete_status = 'No'");
        $active_res = $this->getNumvalues($CFG['table']['restaurant'],
            "restaurant_status = '1' AND delete_status = 'No'");
        $deactive_res = $this->getNumvalues($CFG['table']['restaurant'],
            "restaurant_status = '0' AND delete_status = 'No'");
        $pending_res = $this->getNumvalues($CFG['table']['restaurant'],
            "restaurant_status = '2' AND delete_status = 'No'");

        $admin_smarty->assign("tablename", $CFG['table']['restaurant']);
        $admin_smarty->assign("whereField", 'restaurant_id');
        $admin_smarty->assign("fieldname", 'restaurant_status');
        $admin_smarty->assign("word", 'Restaurant');
        $admin_smarty->assign("filename", 'restaurantManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        $admin_smarty->assign("tot_res", $tot_res);
        $admin_smarty->assign("active_res", $active_res);
        $admin_smarty->assign("deactive_res", $deactive_res);
        $admin_smarty->assign("pending_res", $pending_res);

        $admin_smarty->assign("restaurant_list", $restaurantList);
        $admin_smarty->assign("pagination", $next_page);
    }
    #-------------------------------------------------------------------------------------------
    # Deleted Restaurant List
    /**
     * AdminRestaurantMgmt::deletedRestaurantList()
     * 
     * @return
     */
    function deletedRestaurantList()
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);
        $searchrestaurantid = $this->filterInput($_REQUEST['searchrestaurantid']);

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'rasc')
        {
            $sort = " ORDER BY restaurant_name ASC";
            $fields .= "&sortby=rasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'rdesc')
        {
            $sort = " ORDER BY restaurant_name DESC";
            $fields .= "&sortby=rdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'stateasc')
        {
            $sort = " ORDER BY st.statename ASC";
            $fields .= "&sortby=stateasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'statedesc')
        {
            $sort = " ORDER BY st.statename DESC";
            $fields .= "&sortby=statedesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cityasc')
        {
            $sort = " ORDER BY ci.cityname ASC";
            $fields .= "&sortby=cityasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'citydesc')
        {
            $sort = " ORDER BY ci.cityname DESC";
            $fields .= "&sortby=citydesc";
        }
        /*elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'zipasc'){
        $sort = " ORDER BY zi.zipcode ASC";
        $fields .= "&sortby=zipasc";
        }elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'zipdesc'){
        $sort = " ORDER BY zi.zipcode DESC";
        $fields .= "&sortby=zipdesc";
        }*/  elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'iasc')
        {
            $sort = " ORDER BY rs.restaurant_id ASC";
            $fields .= "&sortby=iasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'idesc')
        {
            $sort = " ORDER BY rs.restaurant_id DESC";
            $fields .= "&sortby=idesc";
        } else
        {
            $sort = " ORDER BY restaurant_name  ASC";
        }

        #Status
        if (!empty($_REQUEST['sortby']))
        {
            if ($_REQUEST['sortby'] == 'pending')
            {
                $condition = "AND restaurant_status = '2' ";
                $fields .= "&sortby=pending";
            } elseif ($_REQUEST['sortby'] == 'active')
            {
                $condition = "AND restaurant_status = '1'";
                $fields .= "&sortby=active";
            } elseif ($_REQUEST['sortby'] == 'deactive')
            {
                $condition = "AND restaurant_status = '0'";
                $fields .= "&sortby=deactive";
            }
        }

        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND ( restaurant_name LIKE '%" . addslashes($req_keyword) .
                "%' OR restaurant_contact_email LIKE '%" . addslashes($req_keyword) .
                "%' OR rs.restaurant_zip LIKE '%" . addslashes($req_keyword) .
                "%' OR ci.cityname LIKE '%" . addslashes($req_keyword) .
                "%' ) ";
            $fields .= "&keyword=$_REQUEST[keyword]$fields";
        }

        if (isset($searchrestaurantid) && !empty($searchrestaurantid))
        {
            $cond .= " AND restaurant_id = '" . $searchrestaurantid . "' ";

            $admin_smarty->assign("searchrestaurantid", $searchrestaurantid);
        }

        $sql_sel = "SELECT rs.restaurant_id, rs.restaurant_name, rs.restaurant_phone, rs.restaurant_streetaddress, rs.restaurant_city, rs.restaurant_state, rs.restaurant_zip, rs.restaurant_feature_status,rs.restaurant_footer_status, rs.restaurant_status,rs.addeddate, " .
            " ci.cityname," . //" zi.zipcode,".
            " st.statename" . " FROM " . $CFG['table']['restaurant'] . " AS rs " .
            " LEFT JOIN " . $CFG['table']['city'] .
            " AS ci ON rs.restaurant_city = ci.city_id " .
            //" LEFT JOIN ".$CFG['table']['zipcode']." AS zi ON rs.restaurant_zip = zi.zipcode_id ".
            " LEFT JOIN " . $CFG['table']['state'] .
            " AS st ON rs.restaurant_state = st.state_id " .
            " WHERE restaurant_id IS NOT NULL AND delete_status = 'Yes' " . $cond . " " . $condition .
            " " . $sort . " ";
       

        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');
        $targetpage = "deletedRestaurantManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt;
            $row_seller['menuscnt'] = $this->getNumvalues($CFG['table']['restaurant_menu'],
                "restaurant_id = '" . $row_seller['restaurant_id'] . "'");
            $row_seller['addonscnt'] = $this->getNumvalues($CFG['table']['restaurant_addons'],
                "restaurant_id = '" . $row_seller['restaurant_id'] . "'");
            $row_seller['offerscnt'] = $this->getNumvalues($CFG['table']['restaurant_offer'],
                "restaurant_id = '" . $row_seller['restaurant_id'] . "'");
            $row_seller['orderscnt'] = $this->getNumvalues($CFG['table']['order'],
                "restaurant_id = '" . $row_seller['restaurant_id'] . "'");
            $row_seller['reportscnt'] = $this->getNumvalues($CFG['table']['order'],
                "status = 'completed' AND restaurant_id = '" . $row_seller['restaurant_id'] .
                "'");
            $row_seller['reviewscnt'] = $this->getNumvalues($CFG['table']['restaurant_reviews'],
                "restaurant_id = '" . $row_seller['restaurant_id'] . "'");
            $row_seller['bookingcnt'] = $this->getNumvalues($CFG['table']['restaurant_booking'],
                "restaurant_id = '" . $row_seller['restaurant_id'] . "'");
            $row_seller['commorderscnt'] = $this->getNumvalues($CFG['table']['order'],
                "status = 'completed' AND restaurant_id = '" . $row_seller['restaurant_id'] .
                "'");
            $row_seller['zipcode'] = $row_seller['restaurant_zip'];
            $restaurantList[] = $row_seller;
            $cnt++;
        }

        //echo "<pre>";print_r($restaurantList);echo "</pre>";

        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        #Statistics
        $tot_res = $this->getNumvalues($CFG['table']['restaurant'],
            "restaurant_id != '' AND delete_status = 'Yes'");
        $active_res = $this->getNumvalues($CFG['table']['restaurant'],
            "restaurant_status = '1' AND delete_status = 'Yes'");
        $deactive_res = $this->getNumvalues($CFG['table']['restaurant'],
            "restaurant_status = '0' AND delete_status = 'Yes'");
        $pending_res = $this->getNumvalues($CFG['table']['restaurant'],
            "restaurant_status = '2' AND delete_status = 'Yes'");

        $admin_smarty->assign("tablename", $CFG['table']['restaurant']);
        $admin_smarty->assign("whereField", 'restaurant_id');
        $admin_smarty->assign("fieldname", 'restaurant_status');
        $admin_smarty->assign("word", 'Restaurant');
        $admin_smarty->assign("filename", 'deletedRestaurantManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        $admin_smarty->assign("tot_res", $tot_res);
        $admin_smarty->assign("active_res", $active_res);
        $admin_smarty->assign("deactive_res", $deactive_res);
        $admin_smarty->assign("pending_res", $pending_res);

        $admin_smarty->assign("restaurant_list", $restaurantList);
        $admin_smarty->assign("pagination", $next_page);
    }

    #---------------------------------------------------------------------------------------
    #update map Info in miles
    /**
     * AdminRestaurantMgmt::mapInfoUpdate()
     * 
     * @return
     */
    function mapInfoUpdate()
    {
        global $CFG, $objSmarty;

        $update = "UPDATE " . $CFG['table']['restaurant'] .
            " SET restaurant_delivery_distance = '" . $this->filterInput($_REQUEST['restaurant_delivery_distance']) .
            "' WHERE restaurant_id = '" . $this->filterInput($_REQUEST['eid']) . "'";
        $res = $this->ExecuteQuery($update, "update");
    }

    #---------------------------------------------------------------------------------------
    #Restaurant edit list
    /**
     * AdminRestaurantMgmt::geteditRestaurantList()
     * 
     * @param mixed $rid
     * @return
     */
    function geteditRestaurantList($rid)
    {
        global $CFG, $admin_smarty;

        $sel = "SELECT 
					restaurant_id, restaurant_name, restaurant_phone, restaurant_fax, restaurant_website, restaurant_streetaddress, restaurant_city, restaurant_state, restaurant_zip, restaurant_contact_name, restaurant_contact_phone, restaurant_contact_email, restaurant_cloud_printer_email, restaurant_cloud_printer_password, restaurant_description, restaurant_estimated_time, restaurant_delivery, restaurant_lat, restaurant_long, AsText(restaurant_delivery_zone) as restaurant_delivery_zone, restaurant_delivery_areas, restaurant_delivery_charge,restaurant_delivery_distance, restaurant_minorder_price, restaurant_salestax, restaurant_serving_cuisines,  restaurant_photos1, restaurant_photos2, restaurant_photos3, restaurant_photos4, restaurant_logo, restaurant_delivery_mon_opentime, restaurant_delivery_tue_opentime, restaurant_delivery_wed_opentime, restaurant_delivery_thu_opentime, restaurant_delivery_fri_opentime, restaurant_delivery_sat_opentime, restaurant_delivery_sun_opentime, restaurant_delivery_mon_closetime, restaurant_delivery_tue_closetime, restaurant_delivery_wed_closetime, restaurant_delivery_thu_closetime, restaurant_delivery_fri_closetime, restaurant_delivery_sat_closetime, restaurant_delivery_sun_closetime, restaurant_displayoption, restaurant_commission, restaurant_inv_setting, restaurant_status, addeddate, restaurant_video, restaurant_pickup, restaurant_booktable, restaurant_password, restaurant_map, res_marketbanner_option, res_marketbanner_img_code, restaurant_display_photo, restaurant_display_video, restaurant_display_banner, res_bank_name, res_ac_no, res_routine_no, res_swift_code, order_email_option, order_receive_email,order_phone_number, send_fax_option, sms_option, gprs_option, google_cloud_printer_option, pending_order_alert, restaurant_set_status, restaurant_set_time
					
				FROM " . $CFG['table']['restaurant'] . " WHERE restaurant_id = '" . $this->filterInput($rid) .
            "'  ";
        $res = $this->ExecuteQuery($sel, 'select');
        
       
        
        $res[0]['restaurant_delivery_zone'] = str_replace("POLYGON((","",$res[0]['restaurant_delivery_zone']);
		$res[0]['restaurant_delivery_zone'] = str_replace("))","",$res[0]['restaurant_delivery_zone']);
	
		
        
        $admin_smarty->assign("restaurantEditList", $res);
        return $res;

        
    }
    #---------------------------------------------------------------------------------------
    #Get Restaurant List in search
    /**
     * AdminRestaurantMgmt::getsearchRestaurantList()
     * 
     * @return
     */
    function getsearchRestaurantList()
    {
        global $CFG, $admin_smarty;

        $sel_search = "SELECT restaurant_id, restaurant_name FROM " . $CFG['table']['restaurant'] .
            " WHERE restaurant_status = '1' AND delete_status = 'No' ORDER BY restaurant_name ASC";
        $res_search = $this->ExecuteQuery($sel_search, 'select');
        $admin_smarty->assign("restaurantSearchList", $res_search);
    }
    #Get Deleted Restaurant List in search
    /**
     * AdminRestaurantMgmt::getsearchDeletedRestaurantList()
     * 
     * @return
     */
    function getsearchDeletedRestaurantList()
    {
        global $CFG, $admin_smarty;

        $sel_search = "SELECT restaurant_id, restaurant_name FROM " . $CFG['table']['restaurant'] .
            " WHERE  delete_status = 'Yes' ORDER BY restaurant_name ASC";
        $res_search = $this->ExecuteQuery($sel_search, 'select');
        $admin_smarty->assign("restaurantSearchList", $res_search);
    }
    #--------------------------------------------------------------------------------
    #  Restaurant Offer  MANAGEMENT START  #
    #--------------------------------------------------------------------------------
    #Restaurant offer Add
    /**
     * AdminRestaurantMgmt::restaurantOfferNew()
     * 
     * @return
     */
    function restaurantOfferNew()
    {
        global $CFG, $admin_smarty;

        //echo "<pre>";print_r($_REQUEST);echo "</pre>";
        //exit;
        
        $restaurant_name = $this->filterInput($_POST['restaurant_name']);
        $offer_percentage = $this->filterInput($_POST['offer_percentage']);
        $offer_price = $this->filterInput($_POST['offer_price']);
        
        list($day,$month,$year) = explode("-",$_POST['offer_valid_from']);
		$startdate = $year.'-'.$month.'-'.$day;
        //echo $startdate."<br>";
        
        
        list($day,$month,$year) = explode("-",$_POST['offer_valid_to']);
		$enddate = $year.'-'.$month.'-'.$day;       
        
        $offer_valid_from = date('Y-m-d', strtotime($this->filterInput($startdate)));
		$offer_valid_to	  = date('Y-m-d', strtotime($this->filterInput($enddate)));
         //echo $offer_valid_from."<br>";
        
        //echo $_POST['offer_valid_from'];
        //echo $offer_valid_to;exit;
        
        //echo "---time".strtotime($startdate);
        /*$offer_valid_from = date('m-d-Y', strtotime(($_POST['offer_valid_from'])));
        $offer_valid_to = date('m-d-Y', strtotime(($_POST['offer_valid_to'])));*/

        if (isset($_GET['resid']) && !empty($_GET['resid']))
        {
            $restaurant_name = $this->filterInput($_GET['resid']);
        }

        $query = "INSERT INTO 
							" . $CFG['table']['restaurant_offer'] . " 
						SET 
							restaurant_id = '" . $restaurant_name . "', 
							offer_percentage = '" . $offer_percentage . "', 
							offer_price = '" . $offer_price . "', 
							offer_valid_from = '" . $offer_valid_from . "', 
							offer_valid_to = '" . $offer_valid_to . "',  
							addeddate = '" . CUR_TIME . "'";
                            
        $res = $this->ExecuteQuery($query, "insert");

        #echo "insert";
        if (isset($_GET['resid']) && !empty($_GET['resid']))
        {
            $this->redirectUrl("restaurantOfferManage.php?resid=$_GET[resid]");
        } else
        {
            $this->redirectUrl("restaurantOfferManage.php");
        }
    }
    #--------------------------------------------------------------------------------
    #Restaurant  offer List
    /**
     * AdminRestaurantMgmt::restaurantOfferList()
     * 
     * @param mixed $resid
     * @return
     */
    function restaurantOfferList($resid)
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);
        $searchrestaurantid = $this->filterInput($_REQUEST['searchrestaurantid']);
        $resid              = $this->filterInput($_GET['resid']);

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'rasc')
        {
            $sort = " ORDER BY ra.restaurant_name ASC";
            $fields .= "&sortby=rasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'rdesc')
        {
            $sort = " ORDER BY ra.restaurant_name DESC";
            $fields .= "&sortby=rdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'priceasc')
        {
            $sort = " ORDER BY ro.offer_price ASC";
            $fields .= "&sortby=priceasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'pricedesc')
        {
            $sort = " ORDER BY ro.offer_price DESC";
            $fields .= "&sortby=pricedesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'perasc')
        {
            $sort = " ORDER BY ro.offer_percentage ASC";
            $fields .= "&sortby=perasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'perdesc')
        {
            $sort = " ORDER BY ro.offer_percentage DESC";
            $fields .= "&sortby=perdesc";
        } else
        {
            $sort .= " ORDER BY offer_id DESC";
        }

        #$sort = "ORDER BY offer_id DESC";

        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND ro.status = '1' ";
            $cond .= " AND status = '1' ";
            $fields .= "&sortby=active";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND ro.status = '0' ";
            $cond .= " AND status = '0' ";
            $fields .= "&sortby=deactive";
        }

        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields .= "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND (offer_percentage LIKE '%" . addslashes($_REQUEST['keyword']) .
                "%' OR ro.offer_price LIKE '%" . addslashes($_REQUEST['keyword']) . "%') ";
            $fields .= "&keyword=$_REQUEST[keyword]";
        }

        if (isset($resid) && !empty($resid))
        {
            $fields .= "&resid=$_REQUEST[resid]";
        }
        if (isset($resid) && !empty($resid))
        {
            $rest_cond .= " AND ro.restaurant_id = '" . $resid . "' ";
            $rest_cond1 .= " AND restaurant_id = '" . $resid . "' ";

            $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                "restaurant_id = '" . $resid . "'");
            $admin_smarty->assign("restname", $restname);
        }

        if (isset($searchrestaurantid) && !empty($searchrestaurantid))
        {
            $condition .= " AND ra.restaurant_id = '" . $searchrestaurantid .
                "' ";
            $rest_cond1 .= " AND restaurant_id = '" . $searchrestaurantid . "' ";
        }
        
        $today = date("Y-m-d");
        //$admin_smarty->assign("today", $today);
        
        $offerstatus = "UPDATE ".$CFG['table']['restaurant_offer']." SET status = '0'  WHERE offer_valid_to < '".$today."' AND status != '2'";
        $offerEnd = $this->ExecuteQuery($offerstatus,'update');

        $sql_sel = "SELECT ro.offer_id,ro.restaurant_id, ro.offer_percentage, ro.offer_price, ro.offer_valid_from, ro.offer_valid_to,ro.status,ro.addeddate, " .
            " ra.restaurant_name " . " FROM " . $CFG['table']['restaurant_offer'] .
            " AS ro " . " LEFT JOIN " . $CFG['table']['restaurant'] .
            " AS ra ON ra.restaurant_id = ro.restaurant_id " .
            " WHERE offer_id IS NOT NULL " . $rest_cond . " " . $condition . " " . $sort .
            " ";

        #echo $sql_sel;

        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');

        $targetpage = "restaurantOfferManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt;
            #Restname
            $row_seller['offer_restname'] = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                "restaurant_id = '" . $row_seller['restaurant_id'] . "'");
            $restaurantOfferList[] = $row_seller;
            $cnt++;
        }

        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }


        $admin_smarty->assign("tablename", $CFG['table']['restaurant_offer']);
        $admin_smarty->assign("whereField", 'offer_id');
        $admin_smarty->assign("fieldname", 'status');
        $admin_smarty->assign("word", 'Restaurant Offer');
        $admin_smarty->assign("filename", 'restaurantOfferManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);
        $admin_smarty->assign("limit", $limit);

        #Statistics
        $tot_offer_rec = $this->getNumvalues($CFG['table']['restaurant_offer'],
            "offer_id != '' " . $rest_cond1 . " ");
        $active_offer_rec = $this->getNumvalues($CFG['table']['restaurant_offer'],
            "status = '1' " . $rest_cond1 . " " . $cond . " ");
        $deactive_offer_rec = $this->getNumvalues($CFG['table']['restaurant_offer'],
            "status = '0' " . $rest_cond1 . " " . $cond . " ");

        $admin_smarty->assign("tot_offer_rec", $tot_offer_rec);
        $admin_smarty->assign("active_offer_rec", $active_offer_rec);
        $admin_smarty->assign("deactive_offer_rec", $deactive_offer_rec);


        $admin_smarty->assign("restaurantOfferList", $restaurantOfferList);
        $admin_smarty->assign("pagination", $next_page);
        return $restaurantOfferList;
    }

    #--------------------------------------------------------------------------------
    #Restaurant Offer Update
    /**
     * AdminRestaurantMgmt::restaurantOfferUpdate()
     * 
     * @param mixed $resoffid
     * @return
     */
    function restaurantOfferUpdate($resoffid)
    {
        global $CFG;

        /*echo "<pre>";print_r($_REQUEST);echo "</pre>";
        echo "<pre>";print_r($_POST);echo "</pre>";
        echo "<pre>";print_r($_GET);echo "</pre>";*/

        $restaurant_name = $this->filterInput($_POST['restaurant_name']);

        $offer_percentage = $this->filterInput($_POST['offer_percentage']);
        $offer_price = $this->filterInput($_POST['offer_price']);
        //$offer_valid_from = date('Y-m-d', strtotime($this->filterInput($_POST['offer_valid_from'])));
        //$offer_valid_to = date('Y-m-d', strtotime($this->filterInput($_POST['offer_valid_to'])));
        $offer_id = $this->filterInput($_POST['offer_id']);


        list($day,$month,$year) = explode("-",$_POST['offer_valid_from']);
		$startdate = $year.'-'.$month.'-'.$day;  
        //echo $startdate."<br>";
        
        list($day,$month,$year) = explode("-",$_POST['offer_valid_to']);
		$enddate = $year.'-'.$month.'-'.$day;   

        $offer_valid_from = date('Y-m-d', strtotime($this->filterInput($startdate)));
        $offer_valid_to = date('Y-m-d', strtotime($this->filterInput($enddate)));
        
        if (isset($_GET['resid']) && !empty($_GET['resid']))
        {
            $restaurant_name = $this->filterInput($_GET['resid']);
        }

        $query = "UPDATE 
						" . $CFG['table']['restaurant_offer'] . " 
					SET 
						restaurant_id    = '" . $restaurant_name . "',  
						offer_percentage = '" . $offer_percentage . "', 
						offer_price 	 = '" . $offer_price . "', 
						offer_valid_from = '" . $offer_valid_from . "', 
						offer_valid_to 	 = '" . $offer_valid_to . "' 
				   WHERE 
				        offer_id = '" . $resoffid . "' ";
        $res = $this->ExecuteQuery($query, "update");
        #echo "update";
        if (isset($_GET['resid']) && !empty($_GET['resid']))
        {
            $this->redirectUrl("restaurantOfferManage.php?resid=$_GET[resid]");
        } else
        {
            $this->redirectUrl("restaurantOfferManage.php");
        }
    }

    #--------------------------------------------------------------------------------
    #  MENU MANAGEMENT START #
    #--------------------------------------------------------------------------------

    #Check Categoty Others List
    /**
     * AdminRestaurantMgmt::checkMenuName()
     * 
     * @return
     */
    function checkMenuName()
    {
        global $CFG, $admin_smarty;

        $menu_name = $this->filterInput($_POST['menu_name']);
        #$restaurant_name  = $this->filterInput($_POST['restaurant_name']);
        $menu_category = $this->filterInput($_POST['menu_category']);
        $menu_type = $this->filterInput($_POST['menu_type']);

        #echo $restaurant_name;

        $noofrows = $this->getNumvalues($CFG['table']['restaurant_menu'], "menu_name='" .
            $menu_name . "' AND menu_category='" . $menu_category . "' AND menu_type='" . $menu_type .
            "' ");

        if ($noofrows > 0)
        {
            echo "exist";
        }
    }
    #Check Categoty Others List
    /**
     * AdminRestaurantMgmt::checkEditMenuName()
     * 
     * @return
     */
    function checkEditMenuName()
    {
        global $CFG, $admin_smarty;

        $menu_name = $this->filterInput($_POST['menu_name']);
        $menu_category = $this->filterInput($_POST['menu_category']);
        $menu_type = $this->filterInput($_POST['menu_type']);

        $noofrows = $this->getNumvalues($CFG['table']['restaurant_menu'],
            "menu_name = '" . $menu_name . "' AND menu_category = '" . $menu_category .
            "' AND menu_type='" . $menu_type . "' AND id != '" . $this->filterInput($_POST['eid']) . "'");
        #echo $noofrows;
        if ($noofrows > 0)
        {
            echo "exist";
        }
    }
    #Check Categoty Others List
    /**
     * AdminRestaurantMgmt::checkMenuCategoryOthers()
     * 
     * @return
     */
    function checkMenuCategoryOthers()
    {
        global $CFG, $admin_smarty;

        $menu_catothers = $this->filterInput($_POST['menu_catothers']);
        $noofrows = $this->getNumvalues($CFG['table']['category_main'], "maincatename='" .
            $menu_catothers . "'");
        if ($noofrows > 0)
        {
            echo "exist";
        }
    }
    #--------------------------------------------------------------------------------------
    #ADD NEW MENU
    /**
     * AdminRestaurantMgmt::menuAdd()
     * 
     * @return
     */
    function menuAdd()
    {
        global $CFG, $admin_smarty, $objThumb;

        //echo "<pre>";print_r($_REQUEST);echo "</pre>";
        //exit;

        if (isset($_GET['resid']) && !empty($_GET['resid']))
        {
            $restaurantname = $this->filterInput($_GET['resid']);
        } else
        {
            $restaurantname = $this->filterInput($_POST['restaurant_name']);
        }

        $menuname           = $this->filterInput($_POST['menu_name']);
        $menu_category      = $this->filterInput($_POST['menu_category']);
        $menu_catothers     = $this->filterInput($_POST['menu_catothers']);
        $menu_type          = $this->filterInput($_POST['menu_type']);
        $menu_cuisine       = $this->filterInput($_POST['menu_cuisine']);
        #$menu_price 	   =  $this->filterInput($_POST['menu_price']);
        $menu_addons        = $this->filterInput($_POST['menu_addons']);
        $menu_spl_ins       = $this->filterInput($_POST['menu_spl_ins']);
        $menu_description   = $this->filterInput($_POST['menu_description']);
        $menu_popular_dish  = $this->filterInput($_POST['menu_popular_dish']);
        $menu_spicy         = $this->filterInput($_POST['menu_spicy']);

        if ($menu_category == 'other') {

            $ins_cat = "INSERT INTO " . $CFG['table']['category_main'] .
                " SET maincatename = '" . html_entity_decode($menu_catothers) . "', restaurant_id ='" . $restaurantname .
                "',addeddate = '" . CUR_TIME . "' ";
            $res_cat = $this->ExecuteQuery($ins_cat, "insert");
            $menu_category = $res_cat;
            $main_catoption = 'normal';
        } else {
            $main_catoption = $this->getValue("maincat_option", $CFG['table']['category_main'],
                "maincateid = '" . $_POST['menu_category'] . "'");
        }

        if (isset($_GET['resid']) && !empty($_GET['resid'])) {
            $restaurantname = $this->filterInput($_GET['resid']);
        }

        $categoryname = $this->getValue("maincatename", $CFG['table']['category_main'],
            "maincateid = '" . $menu_category . "'");
        $categoryname1 = strtolower($categoryname);

        if ($_POST['sizeoption'] == 'default') {
            if ($_POST['smallval_main'] == '' && $_POST['mediumval_main'] != '') {
                $menu_price = $this->filterInput($_POST['mediumval_main']);
            } elseif (($_POST['smallval_main'] == '') && ($_POST['mediumval_main'] == '')) {
                $menu_price = $this->filterInput($_POST['largeval_main']);
            } else {
                $menu_price = $this->filterInput($_POST['smallval_main']);
            }
            $sizeoption = 'size';
        } elseif ($_POST['sizeoption'] == 'fixed') {
            $menu_price = $this->filterInput($_POST['menu_price_main']);
            
            $sizeoption = 'fixed';
        } else {
            if (isset($_POST['size_option']) && !empty($_POST['size_option']) && is_array($_POST['size_option'])) {
                foreach ($_POST['size_option'] as $so=>$val) {
                    $menu_price = $this->filterInput($_POST['size_option'][$so]['sizevalue']);
                    break;
                }
            } elseif (isset($_POST['morepizzasize']) && !empty($_POST['morepizzasize']) && is_array($_POST['morepizzasize'])) {
                foreach ($_POST['morepizzasize'] as $so=>$val) {
                    $menu_price = $this->filterInput($_POST['morepizzasize'][$so]['sizevalue']);
                    break;
                }
            }
            
            $sizeoption = 'slice';
        }
        
        $smallvalue  = $this->filterInput($_POST['smallval_main']);
        $mediumvalue = $this->filterInput($_POST['mediumval_main']);
        $largevalue  = $this->filterInput($_POST['largeval_main']);
        
        //El menu pertenece a todos los restaurantes
        $restaurantname = 0;
        
        $ins_menu = "INSERT INTO 
								" . $CFG['table']['restaurant_menu'] . " 
							SET 
								restaurant_id        = '" . $restaurantname . "',
								menu_name 		 	 = '" . html_entity_decode($menuname) . "',
								menu_category    	 = '" . $menu_category . "',
								menu_type 		     = '" . $menu_type . "',
								menu_cuisine      	 = '" . $menu_cuisine . "',
								menu_price 		 	 = '" . $menu_price . "',
								menu_addons 		 = '" . $menu_addons . "',
								sizeoption	 		 = '" . $sizeoption . "',
								pizza_size_small	 = '" . $this->filterInput($_POST['small']) . "',
								pizza_small_value	 = '" . $smallvalue . "',
								pizza_size_medium	 = '" . $this->filterInput($_POST['medium']) . "',
								pizza_medium_value	 = '" . $mediumvalue . "',
								pizza_size_large	 = '" . $this->filterInput($_POST['large']) . "',
								pizza_large_value	 = '" . $largevalue . "',
								menu_spl_instruction = '" . $menu_spl_ins . "',
								menu_description 	 = '" . $menu_description . "',
								menu_popular_dish  	 = '" . $menu_popular_dish . "',
								menu_spicy		  	 = '" . $menu_spicy . "',
								maincat_option		 = '" . $main_catoption . "',
								addeddate 			 = '" . CUR_TIME . "' ";

        $res_menu = $this->ExecuteQuery($ins_menu, "insert");
        
        $imagesizedata = getimagesize($_FILES['menu_photo']['tmp_name']);
        if (isset($_FILES['menu_photo']['name']) && !empty($_FILES['menu_photo']['name']) && $imagesizedata == TRUE)
        {

            $logoext = $this->getFileExtension($_FILES['menu_photo']['name']);
            $logoname = $this->seoUrl($_POST["menu_name"]) . "." . $logoext;
            $logoimage = "photo_" . $logoname;
            $dest_name = $CFG['site']['photo_menu_path'] . '/' . $logoimage;

            $uploadsuccess = @move_uploaded_file($_FILES['menu_photo']['tmp_name'], $dest_name);
            @chmod($dest_name, 0777);

            if ($uploadsuccess)
            {
                #Get Thumbnail width & height
                $menuthumb = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath = $dest_name;
                $photo = "thumb_" . $logoname;

                $dest_imagepath = $CFG['site']['photo_menu_path'] . '/' . $photo;
                $objThumb->createThumb($sour_imagepath, $dest_imagepath, $menuthumb['0']['menu_thumb_width'],
                    $menuthumb['0']['menu_thumb_height'], 'crop');
                    
                #upload Plugin Path    
                $copy = copy($dest_imagepath,$CFG['site']['photo_plugin_menu_path']. '/' . $photo); 

                @unlink($dest_name);

                $query = "UPDATE " . $CFG['table']['restaurant_menu'] . " SET menu_photo = '" .
                    $photo . "' WHERE id = '" . $res_menu . "' ";
                $res = $this->ExecuteQuery($query, "update");
            }
        }

        if ($res_menu)
        {
            if ($menu_addons == 'Yes')
            {

                if (count($_POST['mainaddons']) > 0)
                {
                    //for($i=0;$i<count($_POST['mainaddons']);$i++){
                    foreach ($_POST['mainaddons'] as $keyi => $value)
                    {
                        if ($_POST['mainaddons'][$keyi]['mainaddonsname'] != '' && $_POST['sizeoption'] !=
                            'other')
                        {
                            $mainaddonsname = $this->filterInput($_POST['mainaddons'][$keyi]['mainaddonsname']);
                            $mainaddonspriceoption = $this->filterInput($_POST['mainaddons'][$keyi]['addonspriceoption']);
                            if ($mainaddonspriceoption != '')
                            {
                                if ($mainaddonspriceoption == 'Free')
                                {
                                    $mainaddonsprice = '';
                                    $mainaddonsprice_medium = '';
                                    $mainaddonsprice_large = '';
                                } else
                                {
                                    $mainaddonsprice = $this->filterInput($_POST['mainaddons'][$keyi]['addons_price']);
                                    $mainaddonsprice_medium = $this->filterInput($_POST['mainaddons'][$keyi]['addons_price_medium']);
                                    $mainaddonsprice_large = $this->filterInput($_POST['mainaddons'][$keyi]['addons_price_large']);
                                }
                                $inst = "INSERT INTO 
												" . $CFG['table']['restaurant_menuaddons'] . " 
												SET 
													menuaddons_restaurantid = '" . $restaurantname . "',
													menuaddons_categoryid   = '" . $menu_category . "',
													menu_catoption			= '" . $main_catoption . "',
													menuaddons_menuid 		= '" . $res_menu . "',
													addonparentid           = '" . $mainaddonsname . "',
													menuaddons_addonsname 	= '" . $mainaddonsname . "',
													menuaddons_priceoption 	= '" . $mainaddonspriceoption . "',
													menuaddons_price 		= '" . $mainaddonsprice . "',
													menuaddons_price_medium	= '" . $mainaddonsprice_medium . "',
													menuaddons_price_large	= '" . $mainaddonsprice_large . "'";
                                //echo "<br>sublist--->".$inst;
                                $res = $this->ExecuteQuery($inst, "insert");
                            } else
                            {
                                if (count($_POST['mainaddons'][$keyi]['addons']) > 0)
                                {
                                    //for($j=0;$j<count($_POST['mainaddons'][$keyi]['addons']);$j++){
                                    foreach ($_POST['mainaddons'][$keyi]['addons'] as $keyj => $value)
                                    {
                                        $addonsname1 = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addonsname']);
                                        $addonspriceoption = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addonspriceoption']);
                                        if ($addonspriceoption == 'Free')
                                        {
                                            $menuaddonsprice = '';
                                            $mainaddonsprice_medium = '';
                                            $mainaddonsprice_large = '';
                                        } else
                                        {
                                            /*$menuaddonsprice = $_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price'];
                                            $mainaddonsprice_medium = $_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_medium']; 
                                            $mainaddonsprice_large  = $_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_large'];*/

                                            if ($_POST['sizeoption'] == 'fixed')
                                            {
                                                $menuaddonsprice = $_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_fixed'];
                                                $mainaddonsprice_medium = $_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_medium_fixed'];
                                                $mainaddonsprice_large = $_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_large_fixed'];
                                            } else
                                            {
                                                $menuaddonsprice = $_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_size'];
                                                $mainaddonsprice_medium = $_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_medium_size'];
                                                $mainaddonsprice_large = $_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_large_size'];
                                            }
                                        }
                                        if ($addonsname1 != '')
                                        {
                                            $inst = "INSERT INTO 
															" . $CFG['table']['restaurant_menuaddons'] . " 
															SET 
																menuaddons_restaurantid = '" . $restaurantname . "',
																menuaddons_categoryid   = '" . $menu_category . "',
																menu_catoption			= '" . $main_catoption . "',
																menuaddons_menuid 		= '" . $res_menu . "',
																addonparentid           = '" . $mainaddonsname . "',
																menuaddons_addonsname 	= '" . $addonsname1 . "',
																menuaddons_priceoption 	= '" . $addonspriceoption . "',
																menuaddons_price 		= '" . $menuaddonsprice . "',
																menuaddons_price_medium	= '" . $mainaddonsprice_medium . "',
																menuaddons_price_large	= '" . $mainaddonsprice_large . "'";
                                            //echo "<br>sublist--->".$inst;
                                            $res = $this->ExecuteQuery($inst, "insert");
                                        }
                                    } // End Foreach loop For ( J )
                                }
                            }
                        }
                        #Slice size Addon Price ********************************************************************
                        elseif ($_POST['mainaddons'][$keyi]['mainaddonsname'] != '' && $_POST['sizeoption'] ==
                            'other')
                        {

                            $mainaddonsname = $this->filterInput($_POST['mainaddons'][$keyi]['mainaddonsname']);
                            $mainaddonspriceoption = $this->filterInput($_POST['mainaddons'][$keyi]['addonspriceoption']);

                            if ($mainaddonspriceoption != '')
                            {

                                if ($mainaddonspriceoption == 'Free')
                                {
                                    $mainaddonsprice_slice = '';
                                } else
                                {
                                    $mainaddonsprice_slice_arr[] = $_POST['mainaddons'][$keyi]['addons_price_slice'];
                                    $mainaddonsprice_slice = implode(",", $mainaddonsprice_slice_arr);
                                }
								
								//Slice para el unico rest
								$restaurantname = 0;
                                $inst = "INSERT INTO 
												" . $CFG['table']['restaurant_menuaddons'] . " 
												SET 
													menuaddons_restaurantid = '" . $restaurantname . "',
													menuaddons_categoryid   = '" . $menu_category . "',
													menu_catoption			= '" . $main_catoption . "',
													menuaddons_menuid 		= '" . $res_menu . "',
													addonparentid           = '" . $mainaddonsname . "',
													menuaddons_addonsname 	= '" . $mainaddonsname . "',
													menuaddons_priceoption 	= '" . $mainaddonspriceoption . "',
													menuaddons_price_slice 	= '" . $this->filterInput($mainaddonsprice_slice) . "'";
                                //echo "<br>Insert1--->".$inst;
                                $res = $this->ExecuteQuery($inst, "insert");
                            } else
                            {

                                if (count($_POST['mainaddons'][$keyi]['addons']) > 0)
                                {
                                    //for($j=0;$j<count($_POST['mainaddons'][$keyi]['addons']);$j++){
                                    foreach ($_POST['mainaddons'][$keyi]['addons'] as $keyj => $value)
                                    {
                                        $addonsname1 = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addonsname']);
                                        $addonspriceoption = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addonspriceoption']);

                                        if ($addonspriceoption == 'Free')
                                        {
                                            $mainaddonsprice_slice = '';
                                        }
                                         /*else{
                                        $mainaddonsprice_slice_arr[] 		= $_POST['mainaddons'][$i]['addons'][$j]['addons_price_slice'];
                                        $mainaddonsprice_slice				= implode(",",$mainaddonsprice_slice_arr);
                                        }*/  else
                                        {
                                            #$mainaddonsprice_slice_arr[] 	= $_POST['mainaddons'][$i]['addons'][$j]['addons_price_slice'];
                                            #$mainaddonsprice_slice			= implode(",",$mainaddonsprice_slice_arr);

                                            if (isset($_POST['slicemoreprice_countperslice']) && !empty($_POST['slicemoreprice_countperslice']))
                                            {
                                                $sizeopt_cnt = $this->filterInput($_POST['slicemoreprice_countperslice']);
                                            } else
                                            {
                                                $sizeopt_cnt = count($this->filterInput($_POST['size_option']));
                                            }
                                            #echo "<br>sizeopt_cnt ------>".$sizeopt_cnt;
                                            //for($k=0;$k<count($_POST['size_option']);$k++){
                                            for ($k = 0; $k < $sizeopt_cnt; $k++)
                                            {
                                                $mainaddonsprice_slice_arr[$keyj][$k] = $_POST['mainaddons'][$keyi]['addons'][$keyj][$k]['addons_price_slice'];
                                            }

                                            foreach ($mainaddonsprice_slice_arr as $key => $val)
                                            {
                                                $mainaddonsprice_slice_arr_new = $val;
                                                #unset($mainaddonsprice_slice_arr[$key-1]);
                                                $mainaddonsprice_slice_arr_new2[] = $val;
                                                #echo "<pre>";print_r($val);
                                                $string = implode(',', $val);
                                            }
                                            $mainaddonsprice_slice = $string;
                                        }
                                        #echo "<br>mainaddonsprice_slice --->".$mainaddonsprice_slice."<br>";
                                        /*echo "mainaddonsprice_medium ".$mainaddonsprice_medium;
                                        echo "mainaddonsprice_large ".$mainaddonsprice_large;  */
                                        if ($addonsname1 != '')
                                        {
                                            $inst = "INSERT INTO 
															" . $CFG['table']['restaurant_menuaddons'] . " 
															SET 
																menuaddons_restaurantid = '" . $restaurantname . "',
																menuaddons_categoryid   = '" . $menu_category . "',
																menu_catoption			= '" . $main_catoption . "',
																menuaddons_menuid 		= '" . $res_menu . "',
																addonparentid           = '" . $mainaddonsname . "',
																menuaddons_addonsname 	= '" . $addonsname1 . "',
																menuaddons_priceoption 	= '" . $addonspriceoption . "',
																menuaddons_price_slice	= '" . $mainaddonsprice_slice . "'";
                                            #echo "<br>Insert2 --->".$inst;
                                            $res = $this->ExecuteQuery($inst, "insert");
                                        }
                                    } # End Foreach For ( J )
                                }
                            }
                        }
                    } # End Loop Foreach ( I )
                }

                #Create Addons
                if (count($_POST['createmainaddons']) > 0)
                {
                    //for($i=0;$i<count($_POST['createmainaddons']);$i++){
                    foreach ($_POST['createmainaddons'] as $keyi => $value)
                    {
                        if ($_POST['createmainaddons'][$keyi]['mainaddonsname'] != '')
                        {
                            $ins_ad = "INSERT INTO 
											" . $CFG['table']['restaurant_addons'] . " 
										SET 
											parentid      	= '0',
											restaurant_id 	= '" . $restaurantname . "',
											category_id   	= '" . $menu_category . "',
											addonsname 		= '" . html_entity_decode(mysqli_real_escape_string($this->filterInput($this->DBCONN,$_POST['createmainaddons'][$keyi]['mainaddonsname']))) .
                                "',
											addonscount 	= '" . $this->filterInput($_POST['createmainaddons'][$keyi]['mainaddoncnt']) .
                                "',
											addeddate 		= '" . CUR_TIME . "' ";
                            $resid = $this->ExecuteQuery($ins_ad, "insert");
                            /*if($resid){
                            if(count($_POST['createmainaddons'][$i]['subaddons']) > 0){
                            for($j=0;$j<count($_POST['createmainaddons'][$i]['subaddons']);$j++){
                            
                            $addonsname1 = $_POST['createmainaddons'][$i]['subaddons'][$j]['subaddonsname'];
                            if($addonsname1 != ''){
                            $inst_add = "INSERT INTO 
                            ".$CFG['table']['restaurant_addons']." 
                            SET 
                            parentid      	= '".$resid."',
                            restaurant_id 	= '".$restaurantname."',
                            category_id   	= '".$menu_category."',
                            addonsname 		= '".$addonsname1."',
                            addeddate 		= NOW() ";
                            $res_add = $this->ExecuteQuery($inst_add, "insert");
                            
                            $inst = "INSERT INTO 
                            ".$CFG['table']['restaurant_menuaddons']." 
                            SET 
                            menuaddons_restaurantid = '".$restaurantname."',
                            menuaddons_categoryid   = '".$menu_category."',
                            menuaddons_menuid 		= '".$res_menu."',
                            addonparentid           = '".$resid."',
                            menuaddons_addonsname 	= '".$res_add."',
                            menuaddons_priceoption 	= '".$_POST['createmainaddons'][$i]['subaddons'][$j]['subaddonsradio']."',
                            menuaddons_price 		= '".$_POST['createmainaddons'][$i]['subaddons'][$j]['subaddonsprice']."' ";
                            #echo "<br>sublist--->".$inst;
                            $res = $this->ExecuteQuery($inst, "insert");
                            }
                            }
                            }
                            }*/

                            if ($resid)
                            {
                                if (count($_POST['createmainaddons'][$keyi]['subaddons']) > 0)
                                {

                                    foreach ($_POST['createmainaddons'][$keyi]['subaddons'] as $key => $value)
                                    {

                                        $addonsname1 = $this->filterInput($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsname']);
                                        if ($addonsname1 != '')
                                        {
                                            $inst_add = "INSERT INTO 
														" . $CFG['table']['restaurant_addons'] . " 
													SET 
														parentid      	= '" . $resid . "',
														restaurant_id 	= '" . $restaurantname . "',
														category_id   	= '" . $menu_category . "',
														addonsname 		= '" . html_entity_decode(mysqli_real_escape_string($this->DBCONN,$addonsname1)) . "',
														addeddate 		= '" . CUR_TIME . "' ";
                                            #echo "<br>inst_add--->".$inst_add;
                                            $res_add = $this->ExecuteQuery($inst_add, "insert");


                                            #Fixed and default Addons Prices condition
                                            if ($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsname'] != '' &&
                                                $_POST['sizeoption'] != 'other')
                                            {
                                                $ins_createaddone_price = ", menuaddons_price = '" . $this->filterInput($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsprice']) .
                                                    "', menuaddons_price_medium	= '" . $this->filterInput($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsprice_medium']) .
                                                    "', menuaddons_price_large 	= '" . $this->filterInput($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsprice_large']) .
                                                    "'";
                                            }

                                            #Slice Addons Prices Condition
                                            if ($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsname'] && $_POST['sizeoption'] ==
                                                'other')
                                            {


                                                if (isset($_POST['cntSliceAddons_createsub']) && !empty($_POST['cntSliceAddons_createsub']) ||
                                                    isset($_POST['cntSliceAddons_createsub1']) && !empty($_POST['cntSliceAddons_createsub']))
                                                {
                                                    if (isset($_POST['cntSliceAddons_createsub']) && !empty($_POST['cntSliceAddons_createsub']))
                                                    {
                                                        $sizeopt_cnt = $this->filterInput($_POST['cntSliceAddons_createsub']);
                                                    }
                                                    if (isset($_POST['cntSliceAddons_createsub1']) && !empty($_POST['cntSliceAddons_createsub1']))
                                                    {
                                                        $sizeopt_cnt = $this->filterInput($_POST['cntSliceAddons_createsub1']);
                                                    }
                                                } else
                                                {
                                                    if (isset($_POST['slicemoreprice_countperslice']) && !empty($_POST['slicemoreprice_countperslice']))
                                                    {
                                                        $sizeopt_cnt = $this->filterInput($_POST['slicemoreprice_countperslice']);
                                                    } else
                                                    {
                                                        $sizeopt_cnt = count($_POST['size_option']);
                                                    }
                                                }
                                                #echo "sizeopt_cnt ---->".$_POST['cntSliceAddons_createsub'];
                                                for ($k = 0; $k < $sizeopt_cnt; $k++)
                                                {
                                                    $mainaddonsprice_slice_arr[$j][$k] = $_POST['createmainaddons'][$keyi]['subaddons'][$key][$k]['subaddonsprice_slice'];
                                                }
                                                foreach ($mainaddonsprice_slice_arr as $ky => $val)
                                                {
                                                    #echo "<br>key ".$key;
                                                    $mainaddonsprice_slice_arr_new = $val;
                                                    #unset($mainaddonsprice_slice_arr[$key-1]);
                                                    $mainaddonsprice_slice_arr_new2[] = $val;
                                                    #echo "<pre>";print_r($val);echo ;
                                                    $string = implode(',', $val);
                                                }
                                                $mainaddonsprice_slice = $string;
                                                $ins_createaddone_price = ", menuaddons_price_slice = '" . $mainaddonsprice_slice .
                                                    "' ";
                                            }

                                            /*$inst = "INSERT INTO
                                            ".$CFG['table']['restaurant_menuaddons']." 
                                            SET 
                                            menuaddons_restaurantid = '".$restaurantname."',
                                            menuaddons_categoryid   = '".$menu_category."',
                                            menu_catoption			= '".$main_catoption."',
                                            menuaddons_menuid 		= '".$res_menu."',
                                            addonparentid           = '".$resid."',
                                            menuaddons_addonsname 	= '".$res_add."',
                                            menuaddons_priceoption 	= '".$_POST['createmainaddons'][$i]['subaddons'][$key]['subaddonsradio']."',
                                            menuaddons_price 		= '".$_POST['createmainaddons'][$i]['subaddons'][$key]['subaddonsprice']."',
                                            menuaddons_price_medium	= '".$_POST['createmainaddons'][$i]['subaddons'][$key]['subaddonsprice_medium']."',
                                            menuaddons_price_large 	= '".$_POST['createmainaddons'][$i]['subaddons'][$key]['subaddonsprice_large']."' ";*/
                                            $inst = "INSERT INTO 
													" . $CFG['table']['restaurant_menuaddons'] . " 
													SET 
														menuaddons_restaurantid = '" . $restaurantname . "',
														menuaddons_categoryid   = '" . $menu_category . "',
														menu_catoption			= '" . $main_catoption . "',
														menuaddons_menuid 		= '" . $res_menu . "',
														addonparentid           = '" . $resid . "',
														menuaddons_addonsname 	= '" . $res_add . "',
														menuaddons_priceoption 	= '" . $this->filterInput($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsradio']) .
                                                "'
														$ins_createaddone_price
														";
                                            //echo "<br>sublist--->".$inst;
                                            $res = $this->ExecuteQuery($inst, "insert");
                                        }
                                    }
                                }
                            }
                        }
                    } # End Foreach For ( I )
                }
            }

            if ($_POST['sizeoption'] == 'other')
            {
                //echo "size option*******";
                #Pizza Slice Option
                if (!empty($_POST['sizename']))
                {
                    $ins_size = "INSERT INTO 
											" . $CFG['table']['restaurant_pizza_slice'] . " 
										SET
											pizza_slice_restaurantid    = '" . $restaurantname . "',
											pizza_slice_categoryid      = '" . $menu_category . "',
											pizza_slice_menuid 		    = '" . $res_menu . "',
											pizza_slice_name 	    	= '" . htmlentities($this->filterInput($_POST['sizename']), ENT_QUOTES) .
                        "',
											pizza_slice_price 		    = '" . $this->filterInput($_POST['sizevalue']) . "' ";
                    $res_size = $this->ExecuteQuery($ins_size, "insert");
                }

                if (count($_POST['morepizzasize']) > 0)
                {
                    //for ($i = 0; $i < count($_POST['morepizzasize']); $i++)
                    foreach($_POST['morepizzasize'] as $ke=>$va)
                    {
                        if ($_POST['morepizzasize'][$ke]['sizename'] != '')
                        {
                            $ins_size = "INSERT INTO 
													" . $CFG['table']['restaurant_pizza_slice'] . " 
												SET
													pizza_slice_restaurantid    = '" . $restaurantname . "',
													pizza_slice_categoryid      = '" . $menu_category . "',
													pizza_slice_menuid 		    = '" . $res_menu . "',
													pizza_slice_name 	    	= '" . htmlentities($this->filterInput($_POST['morepizzasize'][$ke]['sizename']), ENT_QUOTES) .
                                "',
													pizza_slice_price 		    = '" . $this->filterInput($_POST['morepizzasize'][$ke]['sizevalue']) .
                                "' ";
                            //echo "ins_size **********".$ins_size;
                            $res_size = $this->ExecuteQuery($ins_size, "insert");
                        }
                    }
                }
            }
        }

        #exit;
        if (isset($_GET['resid']) && !empty($_GET['resid']))
        {
            $this->redirectUrl("menuManage.php?resid=$_GET[resid]");
        } else
        {
            $this->redirectUrl("menuManage.php");
        }
    }
    #-----------------------------------------------------------
    #ADD NEW MENU
    /**
     * AdminRestaurantMgmt::menuEdit()
     * 
     * @param mixed $mid
     * @return
     */
    function menuEdit($mid)
    {
        global $CFG, $admin_smarty, $objThumb;

        //echo "<pre>";print_r($_REQUEST);echo "</pre>";
       //exit;

        if (isset($_GET['resid']) && !empty($_GET['resid']))
        {
            $restaurantname = $this->filterInput($_GET['resid']);
        } else
        {
            $restaurantname = $this->filterInput($_POST['restaurant_name']);
        }

        $menuname = $this->filterInput($_POST['menu_name']);
        $menu_category = $this->filterInput($_POST['menu_category']);
        $menu_catothers = $this->filterInput($_POST['menu_catothers']);
        $menu_type = $this->filterInput($_POST['menu_type']);
        $menu_cuisine = $this->filterInput($_POST['menu_cuisine']);
        #$menu_price 	  =  $this->filterInput($_POST['menu_price']);
        $menu_addons = $this->filterInput($_POST['menu_addons']);
        $menu_spl_ins = $this->filterInput($_POST['menu_spl_ins']);
        $menu_description = $this->filterInput($_POST['menu_description']);
        $menu_popular_dish = $this->filterInput($_POST['menu_popular_dish']);
        $menu_spicy = $this->filterInput($_POST['menu_spicy']);

        if ($menu_category == 'other')
        {

            $ins_cat = "INSERT INTO " . $CFG['table']['category_main'] .
                " SET maincatename = '" . html_entity_decode($menu_catothers) . "',restaurant_id ='" . $restaurantname .
                "',addeddate = '" . CUR_TIME . "' ";
            $res_cat = $this->ExecuteQuery($ins_cat, "insert");
            $menu_category = $res_cat;
            $main_catoption = 'normal';
        } else
        {
            $main_catoption = $this->getValue("maincat_option", $CFG['table']['category_main'],
                "maincateid = '" . $menu_category . "'");
        }

        $categoryname = $this->getValue("maincatename", $CFG['table']['category_main'],
            "maincateid = '" . $menu_category . "'");
        $categoryname1 = strtolower($categoryname);

        if ($_POST['sizeoption'] == 'default')
        {
            if ($_POST['smallval_main'] == '' && $_POST['mediumval_main'] != '') {
                $menu_price = $this->filterInput($_POST['mediumval_main']);
            } elseif (($_POST['smallval_main'] == '') && ($_POST['mediumval_main'] == '')) {
                $menu_price = $this->filterInput($_POST['largeval_main']);
            } else {
                $menu_price = $this->filterInput($_POST['smallval_main']);
            }
            
            $sizeoption = 'size';
        } elseif ($_POST['sizeoption'] == 'fixed') {
            $menu_price = $this->filterInput($_POST['menu_price_main']);
            
            $sizeoption = 'fixed';
        } else {
            
            if (isset($_POST['size_option']) && !empty($_POST['size_option']) && is_array($_POST['size_option'])) {
                foreach ($_POST['size_option'] as $so=>$val) {
                    $menu_price = $this->filterInput($_POST['size_option'][$so]['sizevalue']);
                    break;
                }
            } elseif (isset($_POST['morepizzasize']) && !empty($_POST['morepizzasize']) && is_array($_POST['morepizzasize'])) {
                foreach ($_POST['morepizzasize'] as $so=>$val) {
                    $menu_price = $this->filterInput($_POST['morepizzasize'][$so]['sizevalue']);
                    break;
                }
            }
            $sizeoption = 'slice';
        }

        $smallvalue = $this->filterInput($_POST['smallval_main']);
        $mediumvalue = $this->filterInput($_POST['mediumval_main']);
        $largevalue = $this->filterInput($_POST['largeval_main']);
        

        $upd_menu = "UPDATE  
								" . $CFG['table']['restaurant_menu'] . " 
							SET 
								restaurant_id        = '" . $restaurantname . "',
								menu_name 		 	 = '" . html_entity_decode($menuname) . "',
								menu_category    	 = '" . $menu_category . "',
								menu_type 		     = '" . $menu_type . "',
								menu_cuisine      	 = '" . $menu_cuisine . "',
								menu_price 		 	 = '" . $menu_price . "',
								menu_addons 		 = '" . $menu_addons . "',
								sizeoption 		 	 = '" . $sizeoption . "',
								pizza_size_small	 = '" . $this->filterInput($_POST['small']) . "',
								pizza_small_value	 = '" . $smallvalue . "',
								pizza_size_medium	 = '" . $this->filterInput($_POST['medium']) . "',
								pizza_medium_value	 = '" . $mediumvalue . "',
								pizza_size_large	 = '" . $this->filterInput($_POST['large']) . "',
								pizza_large_value	 = '" . $largevalue . "',
								menu_spl_instruction = '" . $menu_spl_ins . "',
								menu_description 	 = '" . $menu_description . "',
								menu_popular_dish  	 = '" . $menu_popular_dish . "',
								menu_spicy		  	 = '" . $menu_spicy . "',
								maincat_option		 = '" . $main_catoption . "'
							WHERE id = '" . $mid . "' ";
        $res_upmenu = $this->ExecuteQuery($upd_menu, "update");
        
        $imagesizedata = getimagesize($_FILES['menu_photo']['tmp_name']);
        if (isset($_FILES['menu_photo']['name']) && !empty($_FILES['menu_photo']['name']) && $imagesizedata == TRUE)
        {

            $getphotoname = $this->getValue("menu_photo", $CFG['table']['restaurant_menu'],
                "id = '" . $mid . "' ");
            if (!empty($getphotoname))
            {
                @unlink($CFG['site']['photo_menu_path'] . '/' . $getphotoname);
            }

            $logoext = $this->getFileExtension($_FILES['menu_photo']['name']);
            $logoname = $this->seoUrl($_POST["menu_name"]) .time()."." . $logoext;
            $logoimage = "photo_" . $logoname;
            $dest_name = $CFG['site']['photo_menu_path'] . '/' . $logoimage;

            $uploadsuccess = @move_uploaded_file($_FILES['menu_photo']['tmp_name'], $dest_name);
            @chmod($dest_name, 0777);

            if ($uploadsuccess)
            {
                #Get Thumbnail width & height
                $menuthumb = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath = $dest_name;
                $photo = "thumb_" . $logoname;

                $dest_imagepath = $CFG['site']['photo_menu_path'] . '/' . $photo;
                $objThumb->createThumb($sour_imagepath, $dest_imagepath, $menuthumb['0']['menu_thumb_width'],
                    $menuthumb['0']['menu_thumb_height'], 'crop');
                    
                #upload Plugin Path    
                $copy = copy($dest_imagepath,$CFG['site']['photo_plugin_menu_path']. '/' . $photo); 
                unlink($dest_name);

                $query = "UPDATE " . $CFG['table']['restaurant_menu'] . " SET menu_photo = '" .
                    $photo . "' WHERE id = '" . $mid . "' ";
                    
                $res = $this->ExecuteQuery($query, "update");
            }
        }

        if ($menu_addons == 'Yes')
        {
            if (count($_POST['mainaddons']) > 0)
            {
                //for($i=0;$i<count($_POST['mainaddons']);$i++){
                foreach ($_POST['mainaddons'] as $keyi => $value)
                {
                    $mainaddoneditid = $this->filterInput($_POST['mainaddons'][$keyi]['mainaddoneditid']);
                    #if($_POST['mainaddons'][$i]['mainaddonsname'] != ''){
                    if ($_POST['mainaddons'][$keyi]['mainaddonsname'] != '' && $_POST['sizeoption'] !=
                        'other')
                    {
                        $mainaddonsname = $this->filterInput($_POST['mainaddons'][$keyi]['mainaddonsname']);

                        $mainaddonspriceoption = $this->filterInput($_POST['mainaddons'][$keyi]['addonspriceoption']);
                        if ($mainaddonspriceoption != '')
                        {
                            if ($mainaddonspriceoption == 'Free')
                            {
                                $mainaddonsprice = '';
                                $mainaddonsprice_medium = '';
                                $mainaddonsprice_large = '';
                            } else
                            {
                                $mainaddonsprice = $this->filterInput($_POST['mainaddons'][$keyi]['addons_price']);
                                $mainaddonsprice_medium = $this->filterInput($_POST['mainaddons'][$keyi]['addons_price_medium']);
                                $mainaddonsprice_large = $this->filterInput($_POST['mainaddons'][$keyi]['addons_price_large']);
                            }
                            if (isset($mainaddoneditid) && !empty($mainaddoneditid))
                            {
                                $inst = "UPDATE  
													" . $CFG['table']['restaurant_menuaddons'] . " 
													SET 
														menuaddons_restaurantid = '" . $restaurantname . "',
														menuaddons_categoryid   = '" . $menu_category . "',
														menu_catoption			= '" . $main_catoption . "',
														menuaddons_menuid 		= '" . $mid . "',
														addonparentid           = '" . $mainaddonsname . "',
														menuaddons_addonsname 	= '" . $mainaddonsname . "',
														menuaddons_priceoption 	= '" . $mainaddonspriceoption . "',
														menuaddons_price 		= '" . $mainaddonsprice . "',
														menuaddons_price_medium	= '" . $mainaddonsprice_medium . "',
														menuaddons_price_large	= '" . $mainaddonsprice_large . "'
													WHERE  
														menuaddons_id = '" . $mainaddoneditid . "'";
                                //echo "<br>sublist--->".$inst;
                                $res = $this->ExecuteQuery($inst, "update");
                            } else
                            {
                                $ins = "INSERT INTO  
												" . $CFG['table']['restaurant_menuaddons'] . " 
												SET 
													menuaddons_restaurantid = '" . $restaurantname . "',
													menuaddons_categoryid   = '" . $menu_category . "',
													menu_catoption			= '" . $main_catoption . "',
													menuaddons_menuid 		= '" . $mid . "',
													addonparentid           = '" . $mainaddonsname . "',
													menuaddons_addonsname 	= '" . $mainaddonsname . "',
													menuaddons_priceoption 	= '" . $mainaddonspriceoption . "',
													menuaddons_price 		= '" . $mainaddonsprice . "',
													menuaddons_price_medium	= '" . $mainaddonsprice_medium . "',
													menuaddons_price_large	= '" . $mainaddonsprice_large . "' ";
                                //echo "<br>sublist--->".$inst;
                                $res = $this->ExecuteQuery($ins, "insert");
                            }
                        } else
                        {
                            if (count($_POST['mainaddons'][$keyi]['addons']) > 0)
                            {
                                //for($j=0;$j<count($_POST['mainaddons'][$keyi]['addons']);$j++){
                                foreach ($_POST['mainaddons'][$keyi]['addons'] as $keyj => $value)
                                {
                                    $addoneditid = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addoneditid']);
                                    $addonsname1 = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addonsname']);
                                    $addonspriceoption = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addonspriceoption']);
                                    if ($addonspriceoption == 'Free')
                                    {
                                        $menuaddonsprice = '';
                                        $mainaddonsprice_medium = '';
                                        $mainaddonsprice_large = '';
                                    } else
                                    {
                                        /*$menuaddonsprice = $_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price'];
                                        $mainaddonsprice_medium = $_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_medium']; 
                                        $mainaddonsprice_large  = $_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_large']; */

                                        if ($_POST['sizeoption'] == 'fixed')
                                        {
                                            $menuaddonsprice = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_fixed']);
                                            $mainaddonsprice_medium = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_medium_fixed']);
                                            $mainaddonsprice_large = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_large_fixed']);
                                        } else
                                        {
                                            $menuaddonsprice = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_size']);
                                            $mainaddonsprice_medium = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_medium_size']);
                                            $mainaddonsprice_large = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_large_size']);
                                        }
                                    }

                                    #echo "<br>addonsname1--->".$addonsname1;

                                    if (isset($addoneditid) && !empty($addoneditid))
                                    {
                                        if ($addonsname1 != '')
                                        {
                                            $upda = "UPDATE 
																" . $CFG['table']['restaurant_menuaddons'] . " 
																SET 
																	menuaddons_restaurantid = '" . $restaurantname . "',
																	menuaddons_categoryid   = '" . $menu_category . "',
																	menu_catoption			= '" . $main_catoption . "',
																	menuaddons_menuid 		= '" . $mid . "',
																	addonparentid           = '" . $mainaddonsname . "',
																	menuaddons_addonsname 	= '" . $addonsname1 . "',
																	menuaddons_priceoption 	= '" . $addonspriceoption . "',
																	menuaddons_price 		= '" . $menuaddonsprice . "',
																	menuaddons_price_medium	= '" . $mainaddonsprice_medium . "',
																	menuaddons_price_large	= '" . $mainaddonsprice_large . "'
																WHERE  
																	menuaddons_id = '" . $addoneditid . "'";
                                            //echo "<br>sublist--->".$upda;
                                            #exit;
                                            $res = $this->ExecuteQuery($upda, "update");
                                        } else
                                        {
                                            $del = "DELETE FROM " . $CFG['table']['restaurant_menuaddons'] .
                                                " WHERE menuaddons_id = '" . $addoneditid . "'";
                                            $res = $this->ExecuteQuery($del, "delete");
                                        }
                                    } else
                                    {
                                        if ($addonsname1 != '')
                                        {
                                            $inst = "INSERT INTO 
																" . $CFG['table']['restaurant_menuaddons'] . " 
																SET 
																	menuaddons_restaurantid = '" . $restaurantname . "',
																	menuaddons_categoryid   = '" . $menu_category . "',
																	menu_catoption			= '" . $main_catoption . "',
																	menuaddons_menuid 		= '" . $mid . "',
																	addonparentid           = '" . $mainaddonsname . "',
																	menuaddons_addonsname 	= '" . $addonsname1 . "',
																	menuaddons_priceoption 	= '" . $addonspriceoption . "',
																	menuaddons_price 		= '" . $menuaddonsprice . "' ,
																	menuaddons_price_medium	= '" . $mainaddonsprice_medium . "',
																	menuaddons_price_large	= '" . $mainaddonsprice_large . "'";
                                            //echo "<br>sublist--->".$inst;
                                            #exit;
                                            $res = $this->ExecuteQuery($inst, "insert");
                                        }
                                    }
                                } # End Foreach Loop For ( J )
                            }
                        }
                    }

                    #Slice Addon prices:************************************************************************
                    elseif ($_POST['mainaddons'][$keyi]['mainaddonsname'] != '' && $_POST['sizeoption'] ==
                        'other')
                    {
                        #echo "Size Option : ". $_POST['sizeoption'];

                        $mainaddonsname = $this->filterInput($_POST['mainaddons'][$keyi]['mainaddonsname']);
                        $mainaddonspriceoption = $this->filterInput($_POST['mainaddons'][$keyi]['addonspriceoption']);

                        if ($mainaddonspriceoption != '')
                        {
                            if ($mainaddonspriceoption == 'Free')
                            {
                                $mainaddonsprice_slice = '';
                            } else
                            {
                                $mainaddonsprice_slice_arr[] = $_POST['mainaddons'][$keyi]['addons_price_slice'];
                                $mainaddonsprice_slice = implode(",", $mainaddonsprice_slice_arr);
                            }
                            if (isset($mainaddoneditid) && !empty($mainaddoneditid))
                            {
                                $inst = "UPDATE  
														" . $CFG['table']['restaurant_menuaddons'] . " 
														SET 
															menuaddons_restaurantid = '" . $restaurantname . "',
															menuaddons_categoryid   = '" . $menu_category . "',
															menu_catoption			= '" . $main_catoption . "',
															menuaddons_menuid 		= '" . $mid . "',
															addonparentid           = '" . $mainaddonsname . "',
															menuaddons_addonsname 	= '" . $mainaddonsname . "',
															menuaddons_priceoption 	= '" . $mainaddonspriceoption . "',
															menuaddons_price_slice 	= '" . $this->filterInput($mainaddonsprice_slice) . "'
														WHERE  
															menuaddons_id = '" . $mainaddoneditid . "'";
                                //echo "<br>update1--->".$inst;
                                $res = $this->ExecuteQuery($inst, "update");
                            } else
                            {
                                $ins = "INSERT INTO  
													" . $CFG['table']['restaurant_menuaddons'] . " 
													SET 
														menuaddons_restaurantid = '" . $restaurantname . "',
														menuaddons_categoryid   = '" . $menu_category . "',
														menu_catoption			= '" . $main_catoption . "',
														menuaddons_menuid 		= '" . $mid . "',
														addonparentid           = '" . $mainaddonsname . "',
														menuaddons_addonsname 	= '" . $mainaddonsname . "',
														menuaddons_priceoption 	= '" . $mainaddonspriceoption . "',
														menuaddons_price_slice 	= '" . $this->filterInput($mainaddonsprice_slice) . "'";
                                //echo "<br>sublist--->".$inst;
                                $res = $this->ExecuteQuery($ins, "insert");
                            }
                        } else
                        {
                            if (count($_POST['mainaddons'][$keyi]['addons']) > 0)
                            {
                                //for($j=0;$j<count($_POST['mainaddons'][$keyi]['addons']);$j++){
                                foreach ($_POST['mainaddons'][$keyi]['addons'] as $keyj => $value)
                                {
                                    $addoneditid = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addoneditid']);
                                    $addonsname1 = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addonsname']);
                                    $addonspriceoption = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addonspriceoption']);
                                    if ($addonspriceoption == 'Free')
                                    {
                                        $mainaddonsprice_slice = '';
                                    } else
                                    {
                                        #$mainaddonsprice_slice_arr[] 	= $_POST['mainaddons'][$i]['addons'][$j]['addons_price_slice'];
                                        #$mainaddonsprice_slice			= implode(",",$mainaddonsprice_slice_arr);


                                        if (isset($_POST['slicemoreprice_countperslice']) && !empty($_POST['slicemoreprice_countperslice']))
                                        {
                                            $sizeopt_cnt = $this->filterInput($_POST['slicemoreprice_countperslice']);
                                        } else
                                        {
                                            $sizeopt_cnt = count($_POST['size_option']);
                                        }
                                        #echo "<br> count ".$_POST['cntSliceAddons_createsub'];
                                        #echo "<br> count1 ".$_POST['cntSliceAddons_createsub1'];
                                        #for($k=0;$k<count($_POST['size_option']);$k++){
                                        for ($k = 0; $k < $sizeopt_cnt; $k++)
                                        {
                                            $mainaddonsprice_slice_arr[$keyj][$k] = $_POST['mainaddons'][$keyi]['addons'][$keyj][$k]['addons_price_slice'];
                                        }
                                        #echo "<pre>";print_r($mainaddonsprice_slice_arr);echo "</pre>";
                                        foreach ($mainaddonsprice_slice_arr as $key => $val)
                                        {
                                            /*if(is_array($mainaddonsprice_slice_arr) && count($mainaddonsprice_slice_arr) >= 2){
                                            $mainaddonsprice_slice_arr_new[]	=	$val;
                                            unset($mainaddonsprice_slice_arr_new[$key-1]);    	
                                            #echo "<pre>";print_r($mainaddonsprice_slice_arr_new);echo "</pre>";
                                            #echo "<br>val =>=>=>".$j.print_r($val)."<br>";
                                            $mainaddonsprice_slice_arr_new2[]  = $val;
                                            $string[] = implode( ',',$val);	
                                            }elseif(is_array($mainaddonsprice_slice_arr) && count($mainaddonsprice_slice_arr) ==1){
                                            #$mainaddonsprice_slice_arr_new[]	=	$val;
                                            $mainaddonsprice_slice_arr_new2[]	=	$val;
                                            $string[] = implode( ',',$val);	
                                            }*/
                                            #echo "<br>key ".$key;
                                            #$mainaddonsprice_slice_arr_new	=	$val;
                                            #$mainaddonsprice_slice_arr_new2[]	=	$val;
                                            unset($mainaddonsprice_slice_arr[$key - 1]);
                                            $string = implode(',', $val);
                                            //echo "<pre>";print_r($val);echo "</pre>";
                                        }
                                        $mainaddonsprice_slice = $string;
                                    }
                                    #echo "<pre>";print_r($mainaddonsprice_slice_arr);echo "</pre>";
                                    if (isset($addoneditid) && !empty($addoneditid))
                                    {
                                        if ($addonsname1 != '')
                                        {
                                            $upda = "UPDATE 
																	" . $CFG['table']['restaurant_menuaddons'] . " 
																	SET 
																		menuaddons_restaurantid = '" . $restaurantname . "',
																		menuaddons_categoryid   = '" . $menu_category . "',
																		menu_catoption			= '" . $main_catoption . "',
																		menuaddons_menuid 		= '" . $mid . "',
																		addonparentid           = '" . $mainaddonsname . "',
																		menuaddons_addonsname 	= '" . $addonsname1 . "',
																		menuaddons_priceoption 	= '" . $addonspriceoption . "',
																		menuaddons_price_slice 	= '" . $this->filterInput($mainaddonsprice_slice) . "'
																	WHERE  
																		menuaddons_id = '" . $addoneditid . "'";
                                            //echo "<br>update2--->".$upda;
                                            #exit;
                                            $res = $this->ExecuteQuery($upda, "update");
                                        } else
                                        {
                                            $del = "DELETE FROM " . $CFG['table']['restaurant_menuaddons'] .
                                                " WHERE menuaddons_id = '" . $addoneditid . "'";
                                            $res = $this->ExecuteQuery($del, "delete");
                                        }
                                    } else
                                    {
                                        if ($addonsname1 != '')
                                        {
                                            $inst = "INSERT INTO 
																	" . $CFG['table']['restaurant_menuaddons'] . " 
																	SET 
																		menuaddons_restaurantid = '" . $restaurantname . "',
																		menuaddons_categoryid   = '" . $menu_category . "',
																		menu_catoption			= '" . $main_catoption . "',
																		menuaddons_menuid 		= '" . $mid . "',
																		addonparentid           = '" . $mainaddonsname . "',
																		menuaddons_addonsname 	= '" . $addonsname1 . "',
																		menuaddons_priceoption 	= '" . $addonspriceoption . "',
																		menuaddons_price_slice 	= '" . $mainaddonsprice_slice . "'";
                                            //echo "<br>sublistHIHIHIH---><br>".$inst;
                                            #exit;
                                            $res = $this->ExecuteQuery($inst, "insert");
                                        }
                                    }
                                } # End Foreach Loop For ( J )
                            }
                        }
                        #}
                    } else
                    {
                        #echo "<br>fff===>"."renga";
                        $del = "DELETE FROM " . $CFG['table']['restaurant_menuaddons'] .
                            " WHERE menuaddons_id = '" . $mainaddoneditid . "'";
                        $res = $this->ExecuteQuery($del, "delete");
                    }
                } # End Foreach For ( I )
            }
            #exit;
            #Create Addons
            if (count($_POST['createmainaddons']) > 0)
            {
                //for($i=0;$i<count($_POST['createmainaddons']);$i++){
                foreach ($_POST['createmainaddons'] as $keyi => $value)
                {
                    if ($_POST['createmainaddons'][$keyi]['mainaddonsname'] != '')
                    {
                        $ins_ad = "INSERT INTO 
										" . $CFG['table']['restaurant_addons'] . " 
									SET 
										parentid      	= '0',
										restaurant_id 	= '" . $restaurantname . "',
										category_id   	= '" . $menu_category . "',
										addonsname 		= '" . html_entity_decode(mysqli_real_escape_string($this->DBCONN,$this->filterInput($_POST['createmainaddons'][$keyi]['mainaddonsname']))) .
                            "',
										addonscount 	= '" . $this->filterInput($_POST['createmainaddons'][$keyi]['mainaddoncnt']) .
                            "',
										addeddate 		= '" . CUR_TIME . "' ";
                        $resid = $this->ExecuteQuery($ins_ad, "insert");
                        if ($resid)
                        {
                            /*if(count($_POST['createmainaddons'][$i]['subaddons']) > 0){
                            for($j=0;$j<count($_POST['createmainaddons'][$i]['subaddons']);$j++){
                            
                            $addonsname1 = $_POST['createmainaddons'][$i]['subaddons'][$j]['subaddonsname'];
                            if($addonsname1 != ''){
                            $inst_add = "INSERT INTO 
                            ".$CFG['table']['restaurant_addons']." 
                            SET 
                            parentid      	= '".$resid."',
                            restaurant_id 	= '".$restaurantname."',
                            category_id   	= '".$menu_category."',
                            addonsname 		= '".$addonsname1."',
                            addeddate 		= NOW() ";
                            $res_add = $this->ExecuteQuery($inst_add, "insert");
                            
                            $inst = "INSERT INTO 
                            ".$CFG['table']['restaurant_menuaddons']." 
                            SET 
                            menuaddons_restaurantid = '".$restaurantname."',
                            menuaddons_categoryid   = '".$menu_category."',
                            menuaddons_menuid 		= '".$mid."',
                            addonparentid           = '".$resid."',
                            menuaddons_addonsname 	= '".$res_add."',
                            menuaddons_priceoption 	= '".$_POST['createmainaddons'][$i]['subaddons'][$j]['subaddonsradio']."',
                            menuaddons_price 		= '".$_POST['createmainaddons'][$i]['subaddons'][$j]['subaddonsprice']."' ";
                            #echo "<br>sublist--->".$inst;
                            $res = $this->ExecuteQuery($inst, "insert");
                            }
                            }
                            }*/


                            if ($resid)
                            {
                                if (count($_POST['createmainaddons'][$keyi]['subaddons']) > 0)
                                {
                                    #echo "<br>count: ".count($_POST['createmainaddons'][$i]['subaddons']);
                                    foreach ($_POST['createmainaddons'][$keyi]['subaddons'] as $key => $value)
                                    {

                                        $addonsname1 = $this->filterInput($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsname']);

                                        if ($addonsname1 != '')
                                        {

                                            $inst_add = "INSERT INTO 
														" . $CFG['table']['restaurant_addons'] . " 
													SET 
														parentid      	= '" . $resid . "',
														restaurant_id 	= '" . $restaurantname . "',
														category_id   	= '" . $menu_category . "',
														addonsname 		= '" . html_entity_decode(mysqli_real_escape_string($this->DBCONN,$addonsname1)) . "',
														addeddate 		= '" . CUR_TIME . "' ";
                                            #echo "<br>inst_add--->".$inst_add;

                                            $res_add = $this->ExecuteQuery($inst_add, "insert");

                                            #Fixed and default Addons Prices condition
                                            if ($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsname'] != '' &&
                                                $_POST['sizeoption'] != 'other')
                                            {
                                                $ins_createaddone_price = ", menuaddons_price = '" . $this->filterInput($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsprice']) .
                                                    "', menuaddons_price_medium	= '" . $this->filterInput($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsprice_medium']) .
                                                    "', menuaddons_price_large 	= '" . $this->filterInput($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsprice_large']) .
                                                    "'";
                                            }

                                            #Slice Addons Prices Condition
                                            if ($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsname'] && $_POST['sizeoption'] ==
                                                'other')
                                            {

                                                if (isset($_POST['cntSliceAddons_createsub']) && !empty($_POST['cntSliceAddons_createsub']) ||
                                                    isset($_POST['cntSliceAddons_createsub1']) && !empty($_POST['cntSliceAddons_createsub']))
                                                {
                                                    if (isset($_POST['cntSliceAddons_createsub']) && !empty($_POST['cntSliceAddons_createsub']))
                                                    {
                                                        $sizeopt_cnt = $this->filterInput($_POST['cntSliceAddons_createsub']);
                                                    }
                                                    if (isset($_POST['cntSliceAddons_createsub1']) && !empty($_POST['cntSliceAddons_createsub1']))
                                                    {
                                                        $sizeopt_cnt = $this->filterInput($_POST['cntSliceAddons_createsub1']);
                                                    }
                                                } else
                                                {
                                                    if (isset($_POST['slicemoreprice_countperslice']) && !empty($_POST['slicemoreprice_countperslice']))
                                                    {
                                                        $sizeopt_cnt = $this->filterInput($_POST['slicemoreprice_countperslice']);
                                                    } else
                                                    {
                                                        $sizeopt_cnt = count($_POST['size_option']);
                                                    }
                                                }

                                                for ($k = 0; $k < $sizeopt_cnt; $k++)
                                                {
                                                    $mainaddonsprice_slice_arr[$j][$k] = $_POST['createmainaddons'][$keyi]['subaddons'][$key][$k]['subaddonsprice_slice'];
                                                }
                                                foreach ($mainaddonsprice_slice_arr as $ky => $val)
                                                {
                                                    #$mainaddonsprice_slice_arr_new	=	$val;
                                                    #$mainaddonsprice_slice_arr_new2[]	=	$val;
                                                    $string = implode(',', $val);
                                                }
                                                $mainaddonsprice_slice = $string;

                                                $ins_createaddone_price = ", menuaddons_price_slice = '" . $mainaddonsprice_slice .
                                                    "' ";
                                            }

                                            #echo "<br> ins condotion ".$ins_createaddone_price;
                                            /*$inst = "INSERT INTO
                                            ".$CFG['table']['restaurant_menuaddons']." 
                                            SET 
                                            menuaddons_restaurantid = '".$restaurantname."',
                                            menuaddons_categoryid   = '".$menu_category."',
                                            menu_catoption			= '".$main_catoption."',
                                            menuaddons_menuid 		= '".$mid."',
                                            addonparentid           = '".$resid."',
                                            menuaddons_addonsname 	= '".$res_add."',
                                            menuaddons_priceoption 	= '".$_POST['createmainaddons'][$i]['subaddons'][$key]['subaddonsradio']."',
                                            menuaddons_price 		= '".$_POST['createmainaddons'][$i]['subaddons'][$key]['subaddonsprice']."',
                                            menuaddons_price_medium	= '".$_POST['createmainaddons'][$i]['subaddons'][$key]['subaddonsprice_medium']."',
                                            menuaddons_price_large 	= '".$_POST['createmainaddons'][$i]['subaddons'][$key]['subaddonsprice_large']."'; ";*/
                                            $inst = "INSERT INTO 
														" . $CFG['table']['restaurant_menuaddons'] . " 
														SET 
															menuaddons_restaurantid = '" . $restaurantname . "',
															menuaddons_categoryid   = '" . $menu_category . "',
															menu_catoption			= '" . $main_catoption . "',
															menuaddons_menuid 		= '" . $mid . "',
															addonparentid           = '" . $resid . "',
															menuaddons_addonsname 	= '" . $res_add . "',
															menuaddons_priceoption = '" . $this->filterInput($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsradio']) .
                                                "'
															$ins_createaddone_price	";
                                            //echo "<br>sublist--->".$inst;

                                            $res = $this->ExecuteQuery($inst, "insert");
                                        }
                                    }
                                }
                            }
                        }
                    }
                } # End Foreach Loop For ( I )
            }
        }
        #exit;
        //echo "ins_size **********";
        if ($_POST['sizeoption'] == 'other')
        {
            #Pizza Slice Option
            if (count($_POST['size_option']) > 0)
            {
                //for ($i = 0; $i < count($_POST['size_option']); $i++)
                foreach($_POST['size_option'] as $ke=>$va)
                {
                    $sliceeditid = $this->filterInput($_POST['size_option'][$ke]['sliceeditid']);
                     
                    $slicename = $this->filterInput($_POST['size_option'][$ke]['sizename']);
                     
                    if ($slicename != '')
                    {
                        $ins_slice = "UPDATE  
										" . $CFG['table']['restaurant_pizza_slice'] . " 
									SET 
										pizza_slice_restaurantid    = '" . $restaurantname . "',
										pizza_slice_categoryid      = '" . $menu_category . "',
										pizza_slice_menuid 		    = '" . $mid . "',
										pizza_slice_name 	    	= '" . htmlentities($slicename, ENT_QUOTES) . "',
										pizza_slice_price 		    = '" . $this->filterInput($_POST['size_option'][$ke]['sizevalue']) .
                            "' 
									WHERE 
									    pizza_slice_id = '" . $sliceeditid . "' ";
                        $res_slice = $this->ExecuteQuery($ins_slice, "update");
                    }
                }
            }

            if (count($_POST['morepizzasize']) > 0)
            {
                //for ($i = 0; $i < count($_POST['morepizzasize']); $i++)
                foreach($_POST['morepizzasize'] as $km=>$vm)
                {
                    if ($_POST['morepizzasize'][$km]['sizename'] != '')
                    {
                        $ins_size = "INSERT INTO 
												" . $CFG['table']['restaurant_pizza_slice'] . " 
											SET
												pizza_slice_restaurantid    = '" . $restaurantname . "',
												pizza_slice_categoryid      = '" . $menu_category . "',
												pizza_slice_menuid 		    = '" . $mid . "',
												pizza_slice_name 	    	= '" . htmlentities($this->filterInput($_POST['morepizzasize'][$km]['sizename']), ENT_QUOTES) .
                            "',
												pizza_slice_price 		    = '" . $this->filterInput($_POST['morepizzasize'][$km]['sizevalue']) .
                            "' ";
                        
                        $res_size = $this->ExecuteQuery($ins_size, "insert");
                    }
                }
            }
        }
        #echo "ins_size **********";
        #exit;
        if (isset($_GET['resid']) && !empty($_GET['resid']))
        {
            $this->redirectUrl("menuManage.php?resid=$_GET[resid]");
        } else
        {
            $this->redirectUrl("menuManage.php");
        }

    }
    #--------------------------------------------------------------------------------
    #Menu List
    /**
     * AdminRestaurantMgmt::menuList()
     * 
     * @param mixed $resid
     * @return
     */
    function menuList($resid)
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);
        $searchrestaurantid = $this->filterInput($_REQUEST['searchrestaurantid']);
        $resid              = $this->filterInput($_GET['resid']);
        
        //El menu pertenece a todos los rest
        $resid = '0';
        #echo "<pre>";print_r($_REQUEST);echo "</pre>";

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'masc')
        {
            $sort = " ORDER BY rm.menu_name ASC";
            $fields .= "&sortby=masc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'mdesc')
        {
            $sort = " ORDER BY rm.menu_name DESC";
            $fields .= "&sortby=mdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc')
        {
            $sort = " ORDER BY cat.maincatename ASC";
            $fields .= "&sortby=casc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc')
        {
            $sort = " ORDER BY cat.maincatename DESC";
            $fields .= "&sortby=cdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resasc')
        {
            $sort = " ORDER BY res.restaurant_name ASC";
            $fields .= "&sortby=resasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resdesc')
        {
            $sort = " ORDER BY res.restaurant_name DESC";
            $fields .= "&sortby=resdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'tasc')
        {
            $sort = " ORDER BY rm.menu_type ASC";
            $fields .= "&sortby=tasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'tdesc')
        {
            $sort = " ORDER BY rm.menu_type DESC";
            $fields .= "&sortby=tdesc";
        } else
        {
            $sort .= " ORDER BY sortorder ASC ";
        }

        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND rm.status = '1' ";
            $cond .= " AND status = '1' ";
            $fields .= "&sortby=active";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND rm.status = '0' ";
            $cond .= " AND status = '0' ";
            $fields .= "&sortby=deactive";
        }

        #Menu Type
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'veg')
        {
            $condition .= " AND rm.menu_type = 'veg' ";
            $cond .= " AND menu_type = 'veg' ";
            $fields .= "&sortby=veg";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'nonveg')
        {
            $condition .= " AND rm.menu_type = 'nonveg'";
            $cond .= " AND menu_type = 'nonveg' ";
            $fields .= "&sortby=nonveg";
        }

        #Dish
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'normal')
        {
            $condition .= " AND rm.menu_popular_dish = 'No' ";
            $cond .= " AND menu_popular_dish = 'No' ";
            $fields .= "&sortby=normal";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'popular')
        {
            $condition .= " AND rm.menu_popular_dish = 'Yes' ";
            $cond .= " AND menu_popular_dish = 'Yes' ";
            $fields .= "&sortby=popular";
        }

        #Limit
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields .= "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND (rm.menu_name LIKE '%" . addslashes($req_keyword) ."%' OR res.restaurant_name LIKE '%" . addslashes($req_keyword) ."%' ) ";
            $fields .= "&keyword=$_REQUEST[keyword]$fields";
        }

        if (isset($resid) && !empty($resid))
        {
            $fields .= "&resid=$_REQUEST[resid]";
        }

        if (isset($_GET['catid']) && !empty($_GET['catid']))
        {
            $fields .= "&resid=$_REQUEST[catid]";
            $rest_cond .= " AND rm.menu_category = '" . $this->filterInput($_GET['catid']) . "' ";
        }

        if (isset($resid) && !empty($resid))
        {
            $rest_cond .= " AND rm.restaurant_id = '" . $resid . "' ";
            $rest_cond1 .= " AND restaurant_id = '" . $resid . "' ";

            $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                "restaurant_id = '" . $resid . "'");
            $admin_smarty->assign("restname", $restname);
        }

        if (isset($searchrestaurantid) && !empty($searchrestaurantid))
        {
            $condition .= " AND res.restaurant_id = '" . $searchrestaurantid .
                "' ";
            $rest_cond1 .= " AND restaurant_id = '" . $searchrestaurantid . "' ";
            $fields .= "&searchrestaurantid=$_REQUEST[searchrestaurantid]";
        }


/*
		$sql_sel = "SELECT rm.id, rm.menu_name, rm.menu_category, rm.menu_photo, rm.restaurant_id, rm.menu_type, rm.menu_popular_dish, rm.status, rm.sortorder, rm.addeddate, " .
            " cat.maincatename AS menu_catname " . " res.restaurant_name AS menu_restname " .
            " FROM " . $CFG['table']['restaurant_menu'] . " AS rm " . " LEFT JOIN " . $CFG['table']['category_main'] .
            " AS cat ON rm.menu_category = cat.maincateid " . " LEFT JOIN " . $CFG['table']['restaurant'] .
            " AS res ON rm.restaurant_id = res.restaurant_id " .
            " WHERE rm.delete_status = 'No' AND res.delete_status = 'No' AND id IS NOT NULL " . $rest_cond . " " . $condition .
            " " . $sort . " ";
*/
        $sql_sel = "SELECT rm.id, rm.menu_name, rm.menu_category, rm.menu_photo, rm.restaurant_id, rm.menu_type, rm.menu_popular_dish, rm.status, rm.sortorder, rm.addeddate, " .
            " cat.maincatename AS menu_catname " . 
            " FROM " . $CFG['table']['restaurant_menu'] . " AS rm " . " LEFT JOIN " . $CFG['table']['category_main'] .
            //" AS cat ON rm.menu_category = cat.maincateid " . " LEFT JOIN " . $CFG['table']['restaurant'] .
            //" AS res ON rm.restaurant_id = res.restaurant_id " .
            " AS cat ON rm.menu_category = cat.maincateid " .
            " WHERE rm.delete_status = 'No' AND id IS NOT NULL " . $rest_cond . " " . $condition .
            " " . $sort . " ";
        #echo $sql_sel;
		
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');
        $targetpage = "menuManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt . '.';

            $menuList[] = $row_seller;
            $cnt++;
        }

        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        $admin_smarty->assign("tablename", $CFG['table']['restaurant_menu']);
        $admin_smarty->assign("whereField", 'id');
        $admin_smarty->assign("fieldname", 'status');
        $admin_smarty->assign("word", 'Menu');
        $admin_smarty->assign("filename", 'menuManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        #Statistics
        $tot_menu_rec = $this->getNumvalues($CFG['table']['restaurant_menu'],
            "delete_status = 'No' AND id != '' " . $rest_cond1 . " " . $cond . " ");
        $active_menu_rec = $this->getNumvalues($CFG['table']['restaurant_menu'],
            "delete_status = 'No' AND id != '' AND status = '1' " . $rest_cond1 . " " . $cond . " ");
        $deactive_menu_rec = $this->getNumvalues($CFG['table']['restaurant_menu'],
            "delete_status = 'No' AND id != '' AND status = '0' " . $rest_cond1 . " " . $cond . " ");
        $popular_menu_rec = $this->getNumvalues($CFG['table']['restaurant_menu'],
            "delete_status = 'No' AND id != '' AND status = '1' AND menu_popular_dish = 'Yes' " . $rest_cond1 . " " . $cond .
            " ");
        $normal_menu_rec = $this->getNumvalues($CFG['table']['restaurant_menu'],
            "delete_status = 'No' AND id != '' AND status = '1' AND menu_popular_dish = 'No' " . $rest_cond1 . " " . $cond .
            " ");
        $veg_menu_rec = $this->getNumvalues($CFG['table']['restaurant_menu'],
            "delete_status = 'No' AND id != '' AND status = '1' AND menu_type = 'veg' " . $rest_cond1 . " " . $cond . " ");
        $nonveg_menu_rec = $this->getNumvalues($CFG['table']['restaurant_menu'],
            "delete_status = 'No' AND id != '' AND status = '1' AND menu_type = 'nonveg' " . $rest_cond1 . " " . $cond .
            " ");

        $admin_smarty->assign("tot_menu_rec", $tot_menu_rec);
        $admin_smarty->assign("active_menu_rec", $active_menu_rec);
        $admin_smarty->assign("deactive_menu_rec", $deactive_menu_rec);
        $admin_smarty->assign("popular_menu_rec", $popular_menu_rec);
        $admin_smarty->assign("normal_menu_rec", $normal_menu_rec);
        $admin_smarty->assign("veg_menu_rec", $veg_menu_rec);
        $admin_smarty->assign("nonveg_menu_rec", $nonveg_menu_rec);

        $admin_smarty->assign("menu_list", $menuList);
        $admin_smarty->assign("pagination", $next_page);
        return $menuList;
    }
    #--------------------------------------------------------------------------------
    #Menu List
    /**
     * AdminRestaurantMgmt::menuDeleteList()
     * 
     * @param mixed $resid
     * @return
     */
    function menuDeleteList($resid)
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);
        $searchrestaurantid = $this->filterInput($_REQUEST['searchrestaurantid']);
        $resid              = $this->filterInput($_GET['resid']);
        #echo "<pre>";print_r($_REQUEST);echo "</pre>";

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'masc')
        {
            $sort = " ORDER BY rm.menu_name ASC";
            $fields .= "&sortby=masc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'mdesc')
        {
            $sort = " ORDER BY rm.menu_name DESC";
            $fields .= "&sortby=mdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc')
        {
            $sort = " ORDER BY cat.maincatename ASC";
            $fields .= "&sortby=casc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc')
        {
            $sort = " ORDER BY cat.maincatename DESC";
            $fields .= "&sortby=cdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resasc')
        {
            $sort = " ORDER BY res.restaurant_name ASC";
            $fields .= "&sortby=resasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resdesc')
        {
            $sort = " ORDER BY res.restaurant_name DESC";
            $fields .= "&sortby=resdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'tasc')
        {
            $sort = " ORDER BY rm.menu_type ASC";
            $fields .= "&sortby=tasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'tdesc')
        {
            $sort = " ORDER BY rm.menu_type DESC";
            $fields .= "&sortby=tdesc";
        } else
        {
            $sort .= " ORDER BY rm.sortorder ASC,rm.menu_name ASC";
        }

        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND rm.status = '1' ";
            $cond .= " AND status = '1' ";
            $fields .= "&sortby=active";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND rm.status = '0' ";
            $cond .= " AND status = '0' ";
            $fields .= "&sortby=deactive";
        }

        #Menu Type
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'veg')
        {
            $condition .= " AND rm.menu_type = 'veg' ";
            $cond .= " AND menu_type = 'veg' ";
            $fields .= "&sortby=veg";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'nonveg')
        {
            $condition .= " AND rm.menu_type = 'nonveg'";
            $cond .= " AND menu_type = 'nonveg' ";
            $fields .= "&sortby=nonveg";
        }

        #Dish
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'normal')
        {
            $condition .= " AND rm.menu_popular_dish = 'No' ";
            $cond .= " AND menu_popular_dish = 'No' ";
            $fields .= "&sortby=normal";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'popular')
        {
            $condition .= " AND rm.menu_popular_dish = 'Yes' ";
            $cond .= " AND menu_popular_dish = 'Yes' ";
            $fields .= "&sortby=popular";
        }

        #Limit
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $_REQUEST['limit'];
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND (rm.menu_name LIKE '%" . addslashes($req_keyword) . "%' OR res.restaurant_name LIKE '%" .addslashes($req_keyword)."%') ";
            $fields .= "&keyword=$_REQUEST[keyword]$fields";
        }

        if (isset($resid) && !empty($resid))
        {
            $fields .= "&resid=$_REQUEST[resid]$fields";
        }

        if (isset($_GET['catid']) && !empty($_GET['catid']))
        {
            $fields .= "&resid=$_REQUEST[catid]$fields";
            $rest_cond .= " AND rm.menu_category = '" . $this->filterInput($_GET['catid']) . "' ";
        }

        if (isset($resid) && !empty($resid))
        {
            $rest_cond .= " AND rm.restaurant_id = '" . $resid . "' ";
            $rest_cond1 .= " AND restaurant_id = '" . $resid . "' ";

            $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                "restaurant_id = '" . $resid . "'");
            $admin_smarty->assign("restname", $restname);
        }

        if (isset($searchrestaurantid) && !empty($searchrestaurantid))
        {
            $condition .= " AND res.restaurant_id = '" . $searchrestaurantid .
                "' ";
            $rest_cond1 .= " AND restaurant_id = '" . $searchrestaurantid . "' ";
            $fields .= "&searchrestaurantid=$_REQUEST[searchrestaurantid]$fields";
        }

        $sql_sel = "SELECT rm.id, rm.menu_name, rm.menu_category, rm.menu_photo, rm.restaurant_id, rm.menu_type, rm.menu_popular_dish, rm.status, rm.sortorder, rm.addeddate, " .
            " cat.maincatename AS menu_catname, " . " res.restaurant_name AS menu_restname " .
            " FROM " . $CFG['table']['restaurant_menu'] . " AS rm " . " LEFT JOIN " . $CFG['table']['category_main'] .
            " AS cat ON rm.menu_category = cat.maincateid " . " LEFT JOIN " . $CFG['table']['restaurant'] .
            " AS res ON rm.restaurant_id = res.restaurant_id " .
            " WHERE rm.delete_status = 'Yes' AND id IS NOT NULL " . $rest_cond . " " . $condition .
            " " . $sort . " ";
        #echo $sql_sel;

        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');
        $targetpage = "menuDeleteManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt . '.';

            $menuList[] = $row_seller;
            $cnt++;
        }

        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        $admin_smarty->assign("tablename", $CFG['table']['restaurant_menu']);
        $admin_smarty->assign("whereField", 'id');
        $admin_smarty->assign("fieldname", 'status');
        $admin_smarty->assign("word", 'Menu');
        $admin_smarty->assign("filename", 'menuManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        #Statistics
        $tot_menu_rec = $this->getNumvalues($CFG['table']['restaurant_menu'],
            "delete_status = 'Yes' AND id != '' " . $rest_cond1 . " " . $cond . " ");
        $active_menu_rec = $this->getNumvalues($CFG['table']['restaurant_menu'],
            "delete_status = 'Yes' AND status = '1' " . $rest_cond1 . " " . $cond . " ");
        $deactive_menu_rec = $this->getNumvalues($CFG['table']['restaurant_menu'],
            "delete_status = 'Yes' AND status = '0' " . $rest_cond1 . " " . $cond . " ");
        $popular_menu_rec = $this->getNumvalues($CFG['table']['restaurant_menu'],
            "delete_status = 'Yes' AND menu_popular_dish = 'Yes' " . $rest_cond1 . " " . $cond .
            " ");
        $normal_menu_rec = $this->getNumvalues($CFG['table']['restaurant_menu'],
            "delete_status = 'Yes' AND menu_popular_dish = 'No' " . $rest_cond1 . " " . $cond .
            " ");
        $veg_menu_rec = $this->getNumvalues($CFG['table']['restaurant_menu'],
            "delete_status = 'Yes' AND menu_type = 'veg' " . $rest_cond1 . " " . $cond . " ");
        $nonveg_menu_rec = $this->getNumvalues($CFG['table']['restaurant_menu'],
            "delete_status = 'Yes' AND menu_type = 'nonveg' " . $rest_cond1 . " " . $cond .
            " ");

        $admin_smarty->assign("tot_menu_rec", $tot_menu_rec);
        $admin_smarty->assign("active_menu_rec", $active_menu_rec);
        $admin_smarty->assign("deactive_menu_rec", $deactive_menu_rec);
        $admin_smarty->assign("popular_menu_rec", $popular_menu_rec);
        $admin_smarty->assign("normal_menu_rec", $normal_menu_rec);
        $admin_smarty->assign("veg_menu_rec", $veg_menu_rec);
        $admin_smarty->assign("nonveg_menu_rec", $nonveg_menu_rec);

        $admin_smarty->assign("menu_list", $menuList);
        $admin_smarty->assign("pagination", $next_page);
    }
    #--------------------------------------------------------------------------------
    #Export Main Category
    /**
     * AdminRestaurantMgmt::exportMenu()
     * 
     * @return
     */
    function exportMenu()
    {
        global $CFG;

        $restaurant_cond = '';
        $file_name = '';
        if (isset($_GET['resid']) && !empty($_GET['resid']))
        {
            $restaurant_cond = " AND restaurant_id = '" . $_GET['resid'] . "'  ";
            $file_name = "Menu_" . $_GET['resid'];
        }
        if (isset($_GET['catid']) && !empty($_GET['catid']))
        {
            $restaurant_cond .= " AND menu_category = '" . $_GET['catid'] . "'  ";
            $file_name = "Menu_" . $_GET['resid'] . "_" . $_GET['catid'];
        }
        #File name
        #$file_name 		= "Menu_".date("dmY-His");

        $export_val_arr = array(
            'menu_name',
            'menu_cuisine',
            'menu_type',
            'menu_price',
            'menu_spl_instruction',
            'menu_popular_dish',
            'menu_spicy',
            'menu_description',
            'menu_addons');

        #Table
        $selectfld = "menu_name, menu_cuisine, menu_type, menu_price, menu_spl_instruction, menu_popular_dish, menu_spicy, menu_description, menu_addons";
        $tablename = $CFG['table']['restaurant_menu'];
        $tblcondition = "status = '1' AND delete_status = 'No' " . $restaurant_cond .
            " ORDER BY menu_name ASC";
        $table_arr = array(
            $selectfld,
            $tablename,
            $tblcondition);

        #CSV
        $csv_heading_arr = array(
            "Menu Name",
            "Cuisine Id",
            "Menu Type",
            "Menu Price",
            "Special Instruction",
            "Popular Dish",
            "Spicy",
            "Description",
            "Addons");

        #Xls
        $xls_heading_arr = "Menu Name\tCuisine Id\tMenu Type\tMenu Price\tSpecial Instruction\tPopular Dish\tSpicy\Description\tAddons";

        $this->exportProcessCSVXLS($file_name, $table_arr, $export_val_arr, $csv_heading_arr,
            $xls_heading_arr);
    }
    #--------------------------------------------------------------------------------
    #Import Main Category
    /**
     * AdminRestaurantMgmt::importMenu()
     * 
     * @return
     */
    function importMenu()
    {
        global $CFG;

        $tablename = $CFG['table']['restaurant_menu'];
        $dbfields = array(
            "menu_name",
            "menu_category",
            "menu_cuisine",
            "menu_type",
            "menu_price",
            "menu_spl_instruction",
            "menu_popular_dish",
            "menu_spicy",
            "menu_description",
            "menu_addons");
        $filename = "categoryManage.php";

        $this->importProcessCSV($tablename, $dbfields, $filename);
    }
    #-----------------------------------------------------------------------------------------
    #Get Edit menu list
    /**
     * AdminRestaurantMgmt::geteditMenuList()
     * 
     * @param mixed $eid
     * @return
     */
    function geteditMenuList($eid)
    {
        global $CFG, $admin_smarty;

        #echo $sel = "SELECT id, restaurant_id, menu_name, menu_category, menu_type, item_type, menu_cuisine, menu_price, menu_addons, sizeoption, menu_spl_instruction, menu_description, menu_photo, menu_popular_dish, menu_lunch_dish, menu_spicy, pizza_size_small, pizza_small_value, pizza_size_medium, pizza_medium_value, pizza_size_large, pizza_large_value, maincat_option FROM ".$CFG['table']['restaurant_menu']." WHERE id='".$eid."' $cond";
        /*if(isset($_REQUEST['catid']) && !empty($_REQUEST['catid'])){
        $sel = "SELECT cat.maincateid, cat.restaurant_id, cat.maincatename, cat.maincat_option, menu.id, menu.restaurant_id, menu.menu_name, menu.menu_category, menu.menu_type, menu.menu_cuisine, menu.menu_price, menu.menu_addons, menu.sizeoption, menu.menu_spl_instruction, menu.menu_description, menu.menu_photo, menu.menu_popular_dish, menu.menu_spicy, menu.pizza_size_small, menu.pizza_small_value, menu.pizza_size_medium, menu.pizza_medium_value, menu.pizza_size_large, menu.pizza_large_value FROM ".$CFG['table']['category_main']." as cat LEFT JOIN  ".$CFG['table']['restaurant_menu']." as menu ON cat.maincateid = menu.menu_category OR cat.maincat_option = menu.maincat_option WHERE cat.maincateid = '".$_REQUEST['catid']."' GROUP BY menu.maincat_option";
        }else{
        $sel = "SELECT id, restaurant_id, menu_name, menu_category, menu_type, menu_cuisine, menu_price, menu_addons, sizeoption, menu_spl_instruction, menu_description, menu_photo, menu_popular_dish, menu_spicy, pizza_size_small, pizza_small_value, pizza_size_medium, pizza_medium_value, pizza_size_large, pizza_large_value, maincat_option FROM ".$CFG['table']['restaurant_menu']." WHERE id='".$eid."' ";
        }*/

        if (isset($eid) && !empty($eid))
        {
            $sel = "SELECT id, restaurant_id, menu_name, menu_category, menu_type, menu_cuisine, menu_price, menu_addons, sizeoption, menu_spl_instruction, menu_description, menu_photo, menu_popular_dish, menu_spicy, pizza_size_small, pizza_small_value, pizza_size_medium, pizza_medium_value, pizza_size_large, pizza_large_value, maincat_option FROM " .
                $CFG['table']['restaurant_menu'] . " WHERE id='" . $this->filterInput($eid) . "' ";
        } else
        {
            $sel = "SELECT cat.maincateid, cat.restaurant_id, cat.maincatename, cat.maincat_option, menu.id, menu.restaurant_id, menu.menu_name, menu.menu_category, menu.menu_type, menu.menu_cuisine, menu.menu_price, menu.menu_addons, menu.sizeoption, menu.menu_spl_instruction, menu.menu_description, menu.menu_photo, menu.menu_popular_dish, menu.menu_spicy, menu.pizza_size_small, menu.pizza_small_value, menu.pizza_size_medium, menu.pizza_medium_value, menu.pizza_size_large, menu.pizza_large_value FROM " .
                $CFG['table']['category_main'] . " as cat LEFT JOIN  " . $CFG['table']['restaurant_menu'] .
                " as menu ON cat.maincateid = menu.menu_category OR cat.maincat_option = menu.maincat_option WHERE cat.maincateid = '" .
                $this->filterInput($_REQUEST['catid']) . "' GROUP BY menu.maincat_option";
        }
        //echo $sel;
        $res = $this->ExecuteQuery($sel, 'select');
        $admin_smarty->assign("menudet", $res);
        return $res;
    }


    #-----------------------------------------------------------------------------------------------------
    #Delete select plan
    /**
     * AdminRestaurantMgmt::crustDelete()
     * 
     * @param mixed $tablename
     * @param mixed $field
     * @param mixed $id
     * @param mixed $eid
     * @return
     */
    function crustDelete($tablename, $field, $id, $eid)
    {
        global $CFG, $admin_smarty;

        $delsel = "DELETE FROM " . $tablename . " WHERE " . $field . " = '" . $id . "' ";
        $delres = $this->ExecuteQuery($delsel, "delete");

        $this->redirectUrl("menuAddEdit.php?eid=$eid");
    }
    #--------------------------------------------------------------------------------
    #  ADDONS  MANAGEMENT START  #
    #--------------------------------------------------------------------------------
    #Addons Add & Check Availability
    /**
     * AdminRestaurantMgmt::addonsNew()
     * 
     * @return
     */
    function addonsNew()
    {
        global $CFG;

        $restaurant_name    = $this->filterInput($_REQUEST['resid']);
        $category_name      = $this->filterInput($_POST['category_name']);
        $addons_name        = $this->filterInput($_POST['addons_name']);

        if ($restaurant_name == '')
        {
            $restaurant_name = $this->filterInput($_POST['resid']);
        }
        $noofrows = $this->getNumvalues($CFG['table']['restaurant_addons'],
            "restaurant_id = '".$restaurant_name."' AND category_id = '" . $category_name . "' AND addonsname='" . $addons_name . "'");

        if ($noofrows > 0)
        {
            echo "exist";
        }
         /*else{
        $query = "INSERT INTO ".$CFG['table']['restaurant_addons']." SET restaurant_id = '".$restaurant_name."',category_id = '".$category_name."', addonsname = '".$addons_name."', addeddate = NOW()";
        $res   = $this->ExecuteQuery($query, "insert");
        echo "insert";
        }*/
    }
    #--------------------------------------------------------------------------------
    #Addons EDIT
    /**
     * AdminRestaurantMgmt::addonsEdit()
     * 
     * @return
     */
    function addonsEdit()
    {
        global $CFG;

        $restaurant_name    = $this->filterInput($_POST['restaurant_name']);
        $category_name      = $this->filterInput($_POST['category_name']);
        $addons_name        = $this->filterInput($_POST['addons_name']);

        if ($restaurant_name == '')
        {
            $restaurant_name = $this->filterInput($_POST['resid']);
        }

        $noforows = $this->getNumvalues($CFG['table']['restaurant_addons'],
            "category_id = '" . $category_name . "' AND addonsname = '" . $addons_name .
            "' AND id != '" . $this->filterInput($_POST['eid']) . "'");

        if ($noforows != 0)
        {
            echo "exist";
        }
         /*else{
        $query = "UPDATE ".$CFG['table']['restaurant_addons']." SET restaurant_id = '".$restaurant_name."',category_id = '".$category_name."',addonsname = '".$addons_name."' WHERE id = '".$_POST['eid']."' ";
        $res   = $this->ExecuteQuery($query, "update");
        echo "update";
        }*/
    }
    #--------------------------------------------------------------------------------
    /**
     * AdminRestaurantMgmt::mainAddonsNew()
     * 
     * @return
     */
    function mainAddonsNew()
    {
        global $CFG, $objSmarty;

        #echo "<pre>";print_r($_REQUEST);echo "</pre>";
        #exit;

        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $restaurant_name = $this->filterInput($_REQUEST['resid']);
        } else
        {
            $restaurant_name = $this->filterInput($_POST['restaurant_name']);
        }
        $category_name = $this->filterInput($_POST['category_name']);
        $addons_name = $this->filterInput($_POST['addons_name']);
        $addons_option = $this->filterInput($_POST['mainaddonoption']);
        $addonstype = $this->filterInput($_POST['addonstype']);
        $addons_value = $this->filterInput($_POST['mainaddonvalue']);
        
        if ($_POST['category_name'] == 'other')
        {
            $ins_cat = " INSERT INTO 
                                    " . $CFG['table']['category_main'] .  " 
                                SET 
                                    maincatename  = '" . $this->filterInput(mysqli_real_escape_string($this->DBCONN,$this->filterInput($_REQUEST['addon_catothers']))) . "',
                                    restaurant_id ='" . $restaurant_name . "',
                                    addeddate     = '" . CUR_TIME . "' ";
                                    
            $category_name = $this->ExecuteQuery($ins_cat, "insert");
        }
        $query = "INSERT INTO 
							" . $CFG['table']['restaurant_addons'] . " 
						 SET 
						 	restaurant_id 	  = '" . $restaurant_name . "',
							category_id 	  = '" . $category_name . "',
							addonsname 		  = '" . html_entity_decode(($addons_name)) . "',
							addonspriceoption = '" . $addons_option . "',
							addons_option 	  = '" . $addonstype . "',
							addonsprice 	  = '" . $addons_value . "',
							addonscount 	  = '" . $this->filterInput($_POST['mainaddoncnt']) . "',
							addeddate 		  = '" . CUR_TIME . "'";
        $resaddonid = $this->ExecuteQuery($query, "insert");

        if ($resaddonid)
        {
            #echo "<br>subcnt===>".count($_POST['subadd']);

            if (count($_POST['subadd']) > 0)
            {
                foreach ($_POST['subadd'] as $key => $value)
                {
                    //for($i=0;$i<count($_POST['subadd']);$i++){
                    #echo "<br>adon-->".$_POST['subadd'][$i]['subaddon'];
                    if ($_POST['subadd'][$key]['subaddon'] != '')
                    {
                        $ins = "INSERT INTO 
											" . $CFG['table']['restaurant_addons'] . " 
										SET 
											parentid      		= '" . $resaddonid . "',
											restaurant_id 		= '" . $restaurant_name . "',
											category_id   		= '" . $category_name . "',
											addonsname 			= '" . html_entity_decode(mysqli_real_escape_string($this->DBCONN,$this->filterInput($_POST['subadd'][$key]['subaddon']))) .
                            "',
											addeddate 			= '" . CUR_TIME . "' ";
                        #echo "<br>subadd--->".$ins;
                        $res = $this->ExecuteQuery($ins, "insert");
                    }
                }
            }

            if (count($_POST['mainaddons']) > 0)
            {
                foreach ($_POST['mainaddons'] as $keyma => $valuema)
                {
                    //for($i=0;$i<count($_POST['mainaddons']);$i++){

                    #echo "<br>maincnt--->".count($_POST['mainaddons'][$i]['subaddons']);

                    if ($_POST['mainaddons'][$keyma]['mainaddons_priceoption'] == 'Free')
                    {
                        $mainaddons_price = '';
                    } elseif ($_POST['mainaddons'][$keyma]['mainaddons_priceoption'] == 'Paid')
                    {
                        $mainaddons_price = $this->filterInput($_POST['mainaddons'][$keyma]['mainaddons_price']);
                    }

                    if ($_POST['mainaddons'][$keyma]['mainaddonsname'] != '')
                    {
                        $ins = "INSERT INTO 
											" . $CFG['table']['restaurant_addons'] . " 
										SET 
											parentid      	= '0',
											restaurant_id 	= '" . $restaurant_name . "',
											category_id   	= '" . $category_name . "',
											addonsname 		= '" . html_entity_decode(mysqli_real_escape_string($this->DBCONN,$this->filterInput($_POST['mainaddons'][$keyma]['mainaddonsname']))) .
                            "',
											addonspriceoption = '" . $this->filterInput($_POST['mainaddons'][$keyma]['mainaddons_priceoption']) .
                            "',
											addonsprice 	= '" . $mainaddons_price . "',
											addons_option 	= '" . $this->filterInput($_POST['mainaddons'][$keyma]['addonstype']) .
                            "',
											addonscount 	= '" . $this->filterInput($_POST['mainaddons'][$keyma]['mainaddoncnt']) .
                            "',
											addeddate 		= '" . CUR_TIME . "' ";
                        #echo "<br>mainadd--->".$ins;
                        $resid = $this->ExecuteQuery($ins, "insert");
                    }
                    if ($resid)
                    {
                        if (count($_POST['mainaddons'][$keyma]['subaddons']) > 0)
                        {
                            foreach ($_POST['mainaddons'][$keyma]['subaddons'] as $keysa => $valuesa)
                            {
                                //for($j=0;$j<count($_POST['mainaddons'][$i]['subaddons']);$j++){

                                $addonsname1 = $this->filterInput($_POST['mainaddons'][$keyma]['subaddons'][$keysa]['subaddonsname']);
                                if ($addonsname1 != '')
                                {
                                    $inst = "INSERT INTO 
											" . $CFG['table']['restaurant_addons'] . " 
										SET 
											parentid      	= '" . $resid . "',
											restaurant_id 	= '" . $restaurant_name . "',
											category_id   	= '" . $category_name . "',
											addonsname 		= '" . html_entity_decode(mysqli_real_escape_string($this->DBCONN,$addonsname1)) . "',
											addeddate 		= '" . CUR_TIME . "' ";
                                    #echo "<br>sublist--->".$inst;
                                    $res = $this->ExecuteQuery($inst, "insert");
                                }
                            }
                        }
                    }
                }
            }
        }
        #exit;
        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $resid = "?resid=" . $_REQUEST['resid'];
        } else
        {
            $resid = "?resid=" . $_POST['restaurant_name'];
        }
        $this->redirectUrl("addonsManage.php" . $resid);
    }
    #--------------------------------------------------------------------------------
    /**
     * AdminRestaurantMgmt::mainAddonsNewEdit()
     * 
     * @return
     */
    function mainAddonsNewEdit()
    {
        global $CFG, $objSmarty;
        //echo "<pre>";print_r($_REQUEST);echo "</pre>";
        //exit;

        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $restaurant_name = $this->filterInput($_REQUEST['resid']);
        } else
        {
            $restaurant_name = $this->filterInput($_POST['restaurant_name']);
        }
        $category_name = $this->filterInput($_POST['category_name']);
        $addons_name = $this->filterInput($_POST['addons_name']);
        $addons_option = $this->filterInput($_POST['mainaddonoption']);
        $addonstype = $this->filterInput($_POST['addonstype']);
        $addons_value = $this->filterInput($_POST['mainaddonvalue']);
        
        if ($_POST['category_name'] == 'other')
        {
            $ins_cat = " INSERT INTO 
                                    " . $CFG['table']['category_main'] . " 
                                SET 
                                    maincatename   = '" . $this->filterInput(mysqli_real_escape_string($this->DBCONN,$this->filterInput($_REQUEST['addon_catothers']))) . "',
                                    restaurant_id  = '" . $restaurant_name . "',
                                    addeddate      = '" . CUR_TIME . "' ";
                                
            $category_name = $this->ExecuteQuery($ins_cat, "insert");
        }
        $upquery = "UPDATE " . $CFG['table']['restaurant_addons'] . " 
						SET 
							restaurant_id 	  = '" . $restaurant_name . "',
							category_id 	  = '" . $category_name . "', 
							addonsname 		  = '" . html_entity_decode(($addons_name)) . "',
							addonspriceoption = '" . $addons_option . "',
							addonsprice 	  = '" . $addons_value . "',
							addons_option     = '" . $addonstype . "',
							addonscount 	  = '" . $this->filterInput($_POST['mainaddoncnt']) . "'
						WHERE 
							id = '" . $this->filterInput($_GET['eid']) . "'";
        $resaddonid = $this->ExecuteQuery($upquery, "update");

        if (count($_POST['addonsub']) > 0)
        {
            foreach ($_POST['addonsub'] as $key => $value)
            {
                //for($i=0;$i<count($_POST['addonsub']);$i++){
                $editid = $this->filterInput($_POST['addonsub'][$key]['subaddoneditid']);

                if ($addons_option != 'Paid')
                {
                    if (isset($editid) && !empty($editid))
                    {
                        $upd = "UPDATE  
										" . $CFG['table']['restaurant_addons'] . " 
									SET 
										parentid      		= '" . $this->filterInput($_GET['eid']) . "',
										restaurant_id 		= '" . $restaurant_name . "',
										category_id   		= '" . $category_name . "',
										addonsname 			= '" . html_entity_decode(mysqli_real_escape_string($this->DBCONN,$this->filterInput($_POST['addonsub'][$key]['subaddonsname']))) .
                            "'
									WHERE 
										id = '" . $editid . "' ";
                        $res = $this->ExecuteQuery($upd, "update");
                    }
                    if (empty($editid))
                    {
                        $ins = "INSERT INTO 
											" . $CFG['table']['restaurant_addons'] . " 
										SET 
											parentid      		= '" . $this->filterInput($_GET['eid']) . "',
											restaurant_id 		= '" . $restaurant_name . "',
											category_id   		= '" . $category_name . "',
											addonsname 			= '" . html_entity_decode(mysqli_real_escape_string($this->DBCONN,$this->filterInput($_POST['addonsub'][$key]['subaddonsname']))) .
                            "'
											addeddate 			= '" . CUR_TIME . "' ";
                        $res = $this->ExecuteQuery($ins, "insert");
                    }
                } else
                {
                    $del = "DELETE FROM " . $CFG['table']['restaurant_addons'] . " WHERE id = '" . $editid .
                        "' ";
                    $res = $this->ExecuteQuery($del, "delete");
                }
            }
        }

        if (count($_POST['subadd']) > 0)
        {
            foreach ($_POST['subadd'] as $key1 => $value1)
            {
                //for($i=0;$i<count($_POST['subadd']);$i++){
                if ($_POST['subadd'][$key1]['subaddon'] != '')
                {
                    $ins = "INSERT INTO 
										" . $CFG['table']['restaurant_addons'] . " 
									SET 
										parentid      		= '" . $this->filterInput($_GET['eid']) . "',
										restaurant_id 		= '" . $restaurant_name . "',
										category_id   		= '" . $category_name . "',
										addonsname 			= '" . html_entity_decode(mysqli_real_escape_string($this->DBCONN,$this->filterInput($_POST['subadd'][$key1]['subaddon']))) .
                        "',
										addeddate 			= '" . CUR_TIME . "' ";
                    $res = $this->ExecuteQuery($ins, "insert");
                }
            }
        }
        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $resid = "?resid=" . $_REQUEST['resid'];
        } else
        {
            $resid = "?resid=" . $_POST['restaurant_name'];
        }
        $this->redirectUrl("addonsManage.php" . $resid);
    }
    #--------------------------------------------------------------------------------
    #Addons List
    /**
     * AdminRestaurantMgmt::addonsList()
     * 
     * @return
     */
    function addonsList()
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);
        $searchrestaurantid = $this->filterInput($_REQUEST['searchrestaurantid']);
        $resid = $this->filterInput($_GET['resid']);

        #echo "<pre>";print_r($_REQUEST);echo "</pre>";

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'aasc')
        {
            $sort = " ORDER BY ra.addonsname ASC";
            $fields .= "&sortby=aasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'adesc')
        {
            $sort = " ORDER BY ra.addonsname DESC";
            $fields .= "&sortby=adesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'catasc')
        {
            $sort = " ORDER BY cat.maincatename ASC";
            $fields .= "&sortby=catasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'catdesc')
        {
            $sort = " ORDER BY cat.maincatename DESC";
            $fields .= "&sortby=catdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'rasc')
        {
            $sort = " ORDER BY rs.restaurant_name ASC";
            $fields .= "&sortby=rasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'rdesc')
        {
            $sort = " ORDER BY rs.restaurant_name DESC";
            $fields .= "&sortby=rdesc";
        } else
        {
            $sort = " ORDER BY ra.id  DESC";
        }
        #$sort = "ORDER BY id ASC";

        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND ra.status = '1' ";
            $cond .= " AND status = '1' ";
            $fields .= "&sortby=active";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND ra.status = '0' ";
            $cond .= " AND status = '0' ";
            $fields .= "&sortby=deactive";
        }

        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields .= "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND ra.addonsname LIKE '%" . addslashes($req_keyword) .
                "%' ";
            $fields .= "&keyword=$_REQUEST[keyword]";
        }

        #echo "<pre>";print_r($_GET);echo "</pre>";

        if (isset($resid) && !empty($resid))
        {
            $rest_cond .= " AND ra.restaurant_id = '" . $resid . "' ";
            $rest_cond1 .= " AND restaurant_id = '" . $resid . "' ";
            $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                "restaurant_id = '" . $resid . "'");
            $admin_smarty->assign("restname", $restname);
            #$admin_smarty->assign("searchrestaurantid", $resid);
        }

        if (isset($searchrestaurantid) && !empty($searchrestaurantid))
        {
            $rest_cond .= " AND ra.restaurant_id = '" . $searchrestaurantid .
                "' ";
            $rest_cond1 .= " AND restaurant_id = '" . $searchrestaurantid . "' ";
            $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                "restaurant_id = '" . $searchrestaurantid . "'");
            $admin_smarty->assign("restname", $restname);
            #$admin_smarty->assign("searchrestaurantid", $searchrestaurantid);
            $fields .= "&searchrestaurantid=$_REQUEST[searchrestaurantid]";
        }

        $sql_sel = "SELECT ra.id, ra.addonsname, ra.category_id, ra.restaurant_id, ra.status,ra.addeddate, " .
            " cat.maincatename, " . " rs.restaurant_name " . " FROM " . $CFG['table']['restaurant_addons'] .
            " AS ra " . " LEFT JOIN " . $CFG['table']['category_main'] .
            " AS cat ON ra.category_id = cat.maincateid " . " LEFT JOIN " . $CFG['table']['restaurant'] .
            " AS rs ON ra.restaurant_id = rs.restaurant_id " .
            " WHERE parentid = '0' AND id IS NOT NULL " . $rest_cond . " " . $condition .
            " " . $sort . " ";

        /*$sql_sel = "SELECT ra.id, ra.addonsname, ra.category_id, ra.restaurant_id, ra.status,ra.addeddate, ".
        " cat.maincatename, ".
        " rs.restaurant_name ".
        " FROM ".$CFG['table']['restaurant_addons']." AS ra ".
        " LEFT JOIN ".$CFG['table']['category_main']." AS cat ON ra.category_id = cat.maincateid ".
        " LEFT JOIN ".$CFG['table']['restaurant']." AS rs ON ra.restaurant_id = rs.restaurant_id ".
        " WHERE id IS NOT NULL ".$rest_cond." ".$condition." ".$sort." ";*/
        #echo $sql_sel;
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');
        if ($_REQUEST['said'] != "")
        {
            $targetpage = "addonsSubManage.php";
        } else
        {
            $targetpage = "addonsManage.php";
        }
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {

            $row_seller['sno'] = (($page - 1) * $limit) + $cnt . '.';
            #cat name
            $row_seller['addons_catname'] = $this->getValue('maincatename', $CFG['table']['category_main'],
                "maincateid = '" . $this->filterInput($row_seller['category_id']) . "'");
            #Restname
            $row_seller['addons_restname'] = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                "restaurant_id = '" . $this->filterInput($row_seller['restaurant_id']) . "'");
            $row_seller['addeddate'] = $this->setDateFormatWithOutTime($row_seller['addeddate']);

            $addonsList[] = $row_seller;
            $cnt++;
        }

        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }


        $admin_smarty->assign("tablename", $CFG['table']['restaurant_addons']);
        $admin_smarty->assign("whereField", 'id');
        $admin_smarty->assign("fieldname", 'status');
        $admin_smarty->assign("word", 'Addons');
        if ($_REQUEST['said'] != '')
        {
            $admin_smarty->assign("filename", 'addonsSubManage.php');
        } else
        {
            $admin_smarty->assign("filename", 'addonsManage.php');
        }
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        #Statistics
        $tot_addon_rec = $this->getNumvalues($CFG['table']['restaurant_addons'],
            "id != '' " . $rest_cond1 . " AND parentid = '0'");
        $active_addon_rec = $this->getNumvalues($CFG['table']['restaurant_addons'],
            "status = '1' " . $rest_cond1 . " " . $cond . " AND parentid = '0'");
        $deactive_addon_rec = $this->getNumvalues($CFG['table']['restaurant_addons'],
            "status = '0' " . $rest_cond1 . " " . $cond . " AND parentid = '0'");

        $admin_smarty->assign("tot_addon_rec", $tot_addon_rec);
        $admin_smarty->assign("active_addon_rec", $active_addon_rec);
        $admin_smarty->assign("deactive_addon_rec", $deactive_addon_rec);

        $admin_smarty->assign("addons_list", $addonsList);
        $admin_smarty->assign("pagination", $next_page);
        return $addonsList;
    }
    #--------------------------------------------------------------------------------
    #Restaurant Category List
    /**
     * AdminRestaurantMgmt::categoryList()
     * 
     * @param mixed $resid
     * @return
     */
    function categoryList($resid)
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);
        $resid              = $this->filterInput($_GET['resid']);

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'masc')
        {
            $sort = " ORDER BY maincatename ASC";
            $fields .= "&sortby=masc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'mdesc')
        {
            $sort = " ORDER BY maincatename DESC";
            $fields .= "&sortby=mdesc";
        } else
        {
            $sort .= " ORDER BY maincatename ASC";
        }

        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND maincatename LIKE '%" . addslashes($req_keyword) .
                "%' ";
            $fields .= "&keyword=$_REQUEST[keyword]$fields";
        }

        if (isset($resid) && !empty($resid))
        {
            $fields .= "&resid=$_REQUEST[resid]$fields";
            $condition .= " AND restaurant_id = '" . $resid . "' ";
        }

        if (isset($resid) && !empty($resid))
        {
            $rest_cond = " AND restaurant_id = '" . $resid . "' ";

            $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                "restaurant_id = '" . $resid . "'");
            $admin_smarty->assign("restname", $restname);
        }
        #$sql_sel = "SELECT id, menu_name, menu_category, restaurant_id, menu_type, status, addeddate FROM ".$CFG['table']['restaurant_menu']." WHERE id IS NOT NULL ".$rest_cond." ".$condition." GROUP BY menu_category ".$sort." ";

        $sql_sel = "SELECT maincateid, maincatename, restaurant_id, status, addeddate FROM " .
            $CFG['table']['category_main'] . " WHERE maincateid IS NOT NULL " . $condition .
            " GROUP BY maincatename ORDER BY maincatename ASC ";

        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');
        $targetpage = "categoryManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt . '.';
            #cat name
            $row_seller['menu_catname'] = $this->getValue('maincatename', $CFG['table']['category_main'],
                "maincateid = '" . $this->filterInput($row_seller['menu_category']) . "'");
            #Restname
            $row_seller['menu_restname'] = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                "restaurant_id = '" . $this->filterInput($row_seller['restaurant_id']) . "'");

            $categoryList[] = $row_seller;
            $cnt++;
        }

        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        $admin_smarty->assign("tablename", $CFG['table']['restaurant_menu']);
        $admin_smarty->assign("whereField", 'id');
        $admin_smarty->assign("fieldname", 'status');
        $admin_smarty->assign("word", 'Menu');
        $admin_smarty->assign("filename", 'categoryManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        $admin_smarty->assign("category_list", $categoryList);
        $admin_smarty->assign("pagination", $next_page);
        return $categoryList;
    }
    #---------------------------------------------------------------
    #Common
    #---------------------------------------------------------------
    #Show Category List
    /**
     * AdminRestaurantMgmt::getShowCategoryList()
     * 
     * @param mixed $restid
     * @return
     */
    function getShowCategoryList($restid)
    {
        global $CFG, $admin_smarty;

        $sel_cat = "SELECT maincateid,maincatename FROM " . $CFG['table']['category_main'] .
            " WHERE status = '1' AND delete_status = 'No' AND restaurant_id = '" . $this->filterInput($restid) .
            "' GROUP BY maincatename ORDER BY maincatename ASC";
        $res_cat = $this->ExecuteQuery($sel_cat, "select");
        #echo "<pre>";print_r($res_cat);echo "</pre>";
        $admin_smarty->assign("showcategorylist", $res_cat);
    }
    #Show Cuisine List
    /**
     * AdminRestaurantMgmt::getShowCuisineList()
     * 
     * @return
     */
    function getShowCuisineList()
    {
        global $CFG, $admin_smarty;

        $sel_cui = "SELECT cuisine_id,cuisine_name FROM " . $CFG['table']['cuisine'] .
            " WHERE cuisine_status = '1' AND delete_status = 'No' ORDER BY cuisine_name ASC";
        $res_cui = $this->ExecuteQuery($sel_cui, "select");
        #echo "<pre>";print_r($res_cui);echo "</pre>";
        $admin_smarty->assign("showcuisinelist", $res_cui);
    }

    #Show Sub Addons List
    /**
     * AdminRestaurantMgmt::showSubAddonsList()
     * 
     * @param mixed $addon_id
     * @return
     */
    function showSubAddonsList($addon_id)
    {
        global $CFG, $admin_smarty;

        $sel_subaddon = "SELECT id,addonsname FROM " . $CFG['table']['restaurant_addons'] .
            " WHERE parentid = '" . $this->filterInput($addon_id) . "' AND status = '1' ORDER BY addonsname ASC";
        $res_subaddon = $this->ExecuteQuery($sel_subaddon, "select");

        $admin_smarty->assign("subAddonsCountlist", count($res_subaddon));
        $admin_smarty->assign("showSubAddonslist", $res_subaddon);
    }
    #Delivery Areas List
    /*function showDeliveryAresList(){
    global $CFG,$admin_smarty;
    
    //$sel = "SELECT zipcode_id, areaname FROM ".$CFG['table']['zipcode']." WHERE zipcode_status = '1' ORDER BY areaname ASC ";
    $sel = "SELECT city_id, cityname FROM ".$CFG['table']['city']." WHERE city_status = '1' ORDER BY cityname ASC ";
    $res = $this->ExecuteQuery($sel,'select');
    $admin_smarty->assign("showDeliveryAreasList",$res);
    $admin_smarty->assign("showDeliveryAreasListCount",count($res));
    }*/
    #---------------------------------------------------------------------------------------
    #Restaurant edit list
    /**
     * AdminRestaurantMgmt::getShowRestaurantList()
     * 
     * @return
     */
    function getShowRestaurantList()
    {
        global $CFG, $admin_smarty;
            
        $sel = "SELECT restaurant_id, restaurant_name FROM " . $CFG['table']['restaurant'] .
            " WHERE restaurant_status = '1' AND delete_status= 'No' ORDER BY restaurant_name ASC  ";
        $res = $this->ExecuteQuery($sel, 'select');
        #echo "<pre>";print_r($res);echo "</pre>";
        $admin_smarty->assign("showRestaurantList", $res);

       // return $res;
    }
    #-----------------------------------------------------------------------------
    #Get Array Areas
    /**
     * AdminRestaurantMgmt::getArrayAreas()
     * 
     * @param mixed $id
     * @return
     */
    function getArrayAreas($id)
    {
        global $CFG, $admin_smarty;

        if (!empty($id))
            $areaid = explode(",", $id);
        $cnt = count($areaid);
        for ($i = 0; $i < $cnt; $i++)
        {
            $servingareas[] = $this->getValue("areaname", $CFG['table']['zipcode'],
                "zipcode_id = '" . $areaid[$i] . "'");
        }
        if (isset($servingareas) && !empty($servingareas))
            $servingarea = implode(", ", $servingareas);

        return $servingarea;
    }

    #--------------------------------------------------------------------------------
    #Order List
    /**
     * AdminRestaurantMgmt::orderList()
     * 
     * @param mixed $resid
     * @return
     */
    function orderList($resid)
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);
        $searchrestaurantid = $this->filterInput($_REQUEST['searchrestaurantid']);
        $resid              = $this->filterInput($_GET['resid']);
        $custid              = $this->filterInput($_GET['custid']);

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc')
        {
            $sort = " ORDER BY ro.deliverytype ASC";
            $fields .= "&sortby=casc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc')
        {
            $sort = " ORDER BY ro.deliverytype DESC";
            $fields .= "&sortby=cdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'easc')
        {
            $sort = " ORDER BY ro.customeremail ASC";
            $fields .= "&sortby=easc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'edesc')
        {
            $sort = " ORDER BY ro.customeremail DESC";
            $fields .= "&sortby=edesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'tasc')
        {
            $sort = " ORDER BY ro.ordertotalprice ASC";
            $fields .= "&sortby=tasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'tdesc')
        {
            $sort = " ORDER BY ro.ordertotalprice DESC";
            $fields .= "&sortby=tdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resasc')
        {
            $sort = " ORDER BY res.restaurant_name ASC";
            $fields .= "&sortby=resasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resdesc')
        {
            $sort = " ORDER BY res.restaurant_name DESC";
            $fields .= "&sortby=resdesc";
        } else
        {
            //$sort .= " ORDER BY ro.customername ASC";
            $sort .= " ORDER BY ro.orderid DESC";
        }

        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'pending')
        {
            $condition .= " AND ro.status = 'pending' ";
            $cond_cnt .= " AND status = 'pending' ";
            $fields .= "&sortby=pending";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'processing')
        {
            $condition .= " AND ro.status = 'processing' ";
            $cond_cnt .= " AND status = 'processing' ";
            $fields .= "&sortby=processing";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'completed')
        {
            $condition .= " AND ro.status = 'completed' ";
            $cond_cnt .= " AND status = 'completed' ";
            $fields .= "&sortby=completed";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'failed')
        {
            $condition .= " AND ro.status = 'failed' ";
            $cond_cnt .= " AND status = 'failed' ";
            $fields .= "&sortby=failed";
        }

        #Limit
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields .= "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND (ro.ordergenerateid LIKE '%" . addslashes($req_keyword) .
                "%' OR res.restaurant_name LIKE '%" . addslashes($req_keyword) .
                "%' OR ro.ordertotalprice LIKE '%" . addslashes($req_keyword) .
                "%' OR ro.deliverytype LIKE '%" . addslashes($req_keyword) . "%')";
            $fields .= "&keyword=$_REQUEST[keyword]";
        }

        if (isset($resid) && !empty($resid))
        {
            $fields .= "&resid=$_REQUEST[resid]";
        }

        if (isset($_REQUEST['type']) && !empty($_REQUEST['type']))
        {
            $fields .= "&type=$_REQUEST[type]";
        }

        if (isset($resid) && !empty($resid))
        {
            $rest_cond = " AND ro.restaurant_id = '" . $resid . "' ";
            $rest_cond1 = " AND restaurant_id = '" . $resid . "' ";

            $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                "restaurant_id = '" . $resid . "'");
            $admin_smarty->assign("restname", $restname);
        }

        if (isset($searchrestaurantid) && !empty($searchrestaurantid))
        {
            $condition .= " AND res.restaurant_id = '" . $searchrestaurantid .
                "' ";
            $rest_cond1 .= " AND restaurant_id = '" . $searchrestaurantid . "' ";
            $fields .= "&searchrestaurantid=$_REQUEST[searchrestaurantid]";
        }

        if (isset($_REQUEST['type']) && !empty($_REQUEST['type']) && $_REQUEST['type'] ==
            'CO')
        {
            $cond .= " AND ro.usertype = 'C'";
            $cond_cnt .= " AND usertype = 'C' ";
        } elseif (isset($_REQUEST['type']) && !empty($_REQUEST['type']) && $_REQUEST['type'] ==
        'GO')
        {
            $cond .= " AND ro.usertype = 'G'";
            $cond_cnt .= " AND usertype = 'G' ";
        }
        $condition .= " AND ro.delete_status = 'No' ";

        if (isset($custid) && !empty($custid))
        {
            $cond .= " AND ro.customer_id = '" . $custid . "'";
            $cusName = $this->getMultivalue("customername, customerlastname", $CFG['table']['order'],
                "customer_id  = '" . $custid . "' ");
            $admin_smarty->assign("cusName", $cusName);
            $fields .= "&custid=" . $custid;
        }

        $sql_sel = "SELECT " .
            "ro.orderid, ro.ordergenerateid, ro.deliverydoornumber, ro.deliverystreet, ro.restaurant_id, ro.ordertotalprice, ro.status, ro.orderdate, ro.payment_type, ro.foodassoonas, ro.deliverydate, ro.deliverytime, ro.deliverytype, ro.voucher_code, " .
            " ro.customername, ro.customeremail, ro.customercellphone, " .
            " res.restaurant_name " . " FROM " . $CFG['table']['order'] . " AS ro " .
            " LEFT JOIN " . $CFG['table']['restaurant'] .
            " AS res ON ro.restaurant_id = res.restaurant_id " .
            " WHERE  ro.restaurant_id != '0' AND ro.paypal_status = 'success' AND status != 'testing' AND orderid IS NOT NULL " .
            $cond . " " . $rest_cond . " " . $condition . " " . $sort . " ";

        #echo $sql_sel;
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');
        $targetpage = "restaurantOrderManage.php";
        //$targetpage =  "restaurantDetails.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt . '.';

            $orderList[] = $row_seller;
            $cnt++;
        }
        #echo "<pre>";print_r($orderList);echo "</pre>";
        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        $admin_smarty->assign("tablename", $CFG['table']['order']);
        $admin_smarty->assign("whereField", 'orderid');
        $admin_smarty->assign("fieldname", 'status');
        $admin_smarty->assign("word", 'Order');
        $admin_smarty->assign("filename", 'restaurantOrderManage.php');
        //$admin_smarty->assign("filename",'restaurantDetails.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        #Statistics
        $tot_ord = $this->getNumvalues($CFG['table']['order'],
            "delete_status = 'No' AND restaurant_id != '' AND paypal_status = 'success' AND status != 'testing' " .
            $cond_cnt . " ");
        $delivered_ord = $this->getNumvalues($CFG['table']['order'],
            "delete_status = 'No' AND status = 'completed' AND restaurant_id != '0' AND paypal_status = 'success' AND status != 'testing' " .
            $cond_cnt . " ");
        $processing_ord = $this->getNumvalues($CFG['table']['order'],
            "delete_status = 'No' AND status = 'processing' AND restaurant_id != '0' AND paypal_status = 'success' AND status != 'testing' " .
            $cond_cnt . " ");
        $pending_ord = $this->getNumvalues($CFG['table']['order'],
            "delete_status = 'No' AND status = 'pending' AND restaurant_id != '0' AND paypal_status = 'success' AND status != 'testing' " .
            $cond_cnt . " ");
        $failed_ord = $this->getNumvalues($CFG['table']['order'],
            "delete_status = 'No' AND status = 'failed' AND restaurant_id != '0' AND paypal_status = 'success' AND status != 'testing' " .
            $cond_cnt . " ");
        //echo 'Pending-->'.$pending_ord;
        $admin_smarty->assign("ordersList_orderCnt", $tot_ord);
        $admin_smarty->assign("delivered_ord", $delivered_ord);
        $admin_smarty->assign("processing_ord", $processing_ord);
        $admin_smarty->assign("pending_ord", $pending_ord);
        $admin_smarty->assign("failed_ord", $failed_ord);

        $admin_smarty->assign("order_list", $orderList);
        $admin_smarty->assign("pagination", $next_page);
        return $orderList;
    }
    #--------------------------------------------------------------------------------
    #--------------------------------------------------------------------------------
    #Order List
    /**
     * AdminRestaurantMgmt::deleteOrderList()
     * 
     * @param mixed $resid
     * @return
     */
    function deleteOrderList($resid)
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);
        $searchrestaurantid = $this->filterInput($_REQUEST['searchrestaurantid']);
        $resid              = $this->filterInput($_GET['resid']);

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc')
        {
            $sort = " ORDER BY ro.deliverytype ASC";
            $fields .= "&sortby=casc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc')
        {
            $sort = " ORDER BY ro.deliverytype DESC";
            $fields .= "&sortby=cdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'easc')
        {
            $sort = " ORDER BY ro.customeremail ASC";
            $fields .= "&sortby=easc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'edesc')
        {
            $sort = " ORDER BY ro.customeremail DESC";
            $fields .= "&sortby=edesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'tasc')
        {
            $sort = " ORDER BY ro.ordertotalprice ASC";
            $fields .= "&sortby=tasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'tdesc')
        {
            $sort = " ORDER BY ro.ordertotalprice DESC";
            $fields .= "&sortby=tdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resasc')
        {
            $sort = " ORDER BY res.restaurant_name ASC";
            $fields .= "&sortby=resasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resdesc')
        {
            $sort = " ORDER BY res.restaurant_name DESC";
            $fields .= "&sortby=resdesc";
        } else
        {
            //$sort .= " ORDER BY ro.customername ASC";
            $sort .= " ORDER BY ro.orderid DESC";
        }

        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'pending')
        {
            $condition .= " AND ro.status = 'pending' ";
            $cond_cnt .= " AND status = 'pending' ";
            $fields .= "&sortby=pending";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'processing')
        {
            $condition .= " AND ro.status = 'processing' ";
            $cond_cnt .= " AND status = 'processing' ";
            $fields .= "&sortby=processing";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'completed')
        {
            $condition .= " AND ro.status = 'completed' ";
            $cond_cnt .= " AND status = 'completed' ";
            $fields .= "&sortby=completed";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'failed')
        {
            $condition .= " AND ro.status = 'failed' ";
            $cond_cnt .= " AND status = 'failed' ";
            $fields .= "&sortby=failed";
        }

        #Limit
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND res.restaurant_name LIKE '%" . addslashes($req_keyword) .
                "%' OR ro.ordertotalprice LIKE '%" . addslashes($req_keyword) .
                "%' OR ro.ordergenerateid LIKE '%" . addslashes($req_keyword) . "%' ";
            $fields .= "&keyword=$_REQUEST[keyword]$fields";
        }
        

        if (isset($resid) && !empty($resid))
        {
            $fields .= "&resid=$_REQUEST[resid]$fields";
        }

        if (isset($_REQUEST['type']) && !empty($_REQUEST['type']))
        {
            $fields .= "&type=$_REQUEST[type]$fields";
        }

        if (isset($resid) && !empty($resid))
        {
            $rest_cond = " AND ro.restaurant_id = '" . $resid . "' ";
            $rest_cond1 = " AND restaurant_id = '" . $resid . "' ";

            $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                "restaurant_id = '" . $resid . "'");
            $admin_smarty->assign("restname", $restname);
        }

        if (isset($searchrestaurantid) && !empty($searchrestaurantid))
        {
            $condition .= " AND res.restaurant_id = '" . $searchrestaurantid .
                "' ";
            $rest_cond1 .= " AND restaurant_id = '" . $searchrestaurantid . "' ";
            $fields .= "&searchrestaurantid=$_REQUEST[searchrestaurantid]$fields";
        }

        if (isset($_REQUEST['type']) && !empty($_REQUEST['type']) && $_REQUEST['type'] ==
            'CO')
        {
            $cond .= " AND ro.usertype = 'C'";
            $cond_cnt .= " AND usertype = 'C' ";
        } elseif (isset($_REQUEST['type']) && !empty($_REQUEST['type']) && $_REQUEST['type'] ==
        'GO')
        {
            $cond .= " AND ro.usertype = 'G'";
            $cond_cnt .= " AND usertype = 'G' ";
        }

        $sql_sel = "SELECT " .
            "ro.orderid, ro.ordergenerateid, ro.deliverydoornumber, ro.deliverystreet, ro.restaurant_id, ro.ordertotalprice, ro.status, ro.orderdate, ro.payment_type, ro.foodassoonas, ro.deliverydate, ro.deliverytime, ro.deliverytype, " .
            " ro.customername, ro.customeremail, ro.customercellphone, " .
            " res.restaurant_name " . " FROM " . $CFG['table']['order'] . " AS ro " .
            " LEFT JOIN " . $CFG['table']['restaurant'] .
            " AS res ON ro.restaurant_id = res.restaurant_id " .
            " WHERE ro.delete_status = 'Yes' AND ro.restaurant_id != '0' AND ro.paypal_status = 'success' AND orderid IS NOT NULL " .
            $cond . " " . $rest_cond . " " . $condition . " " . $sort . " ";

        #echo $sql_sel;
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');
        $targetpage = "restaurantDeleteOrderManage.php";
        //$targetpage =  "restaurantDetails.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt . '.';

            $orderList[] = $row_seller;
            $cnt++;
        }
        #echo "<pre>";print_r($orderList);echo "</pre>";
        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        $admin_smarty->assign("tablename", $CFG['table']['order']);
        $admin_smarty->assign("whereField", 'orderid');
        $admin_smarty->assign("fieldname", 'status');
        $admin_smarty->assign("word", 'Order');
        $admin_smarty->assign("filename", 'restaurantDeleteOrderManage.php');
        //$admin_smarty->assign("filename",'restaurantDetails.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        #Statistics
        $tot_ord = $this->getNumvalues($CFG['table']['order'],
            "delete_status = 'Yes' AND restaurant_id != '' AND paypal_status = 'success' " .
            $cond_cnt . " ");
        $delivered_ord = $this->getNumvalues($CFG['table']['order'],
            "delete_status = 'Yes' AND status = 'completed' AND restaurant_id != '0' AND paypal_status = 'success' " .
            $cond_cnt . " ");
        $processing_ord = $this->getNumvalues($CFG['table']['order'],
            "delete_status = 'Yes' AND status = 'processing' AND restaurant_id != '0' AND paypal_status = 'success' " .
            $cond_cnt . " ");
        $pending_ord = $this->getNumvalues($CFG['table']['order'],
            "delete_status = 'Yes' AND status = 'pending' AND restaurant_id != '0' AND paypal_status = 'success' " .
            $cond_cnt . " ");
        $failed_ord = $this->getNumvalues($CFG['table']['order'],
            "delete_status = 'Yes' AND status = 'failed' AND restaurant_id != '0' AND paypal_status = 'success' " .
            $cond_cnt . " ");

        $admin_smarty->assign("ordersList_orderCnt", $tot_ord);
        $admin_smarty->assign("delivered_ord", $delivered_ord);
        $admin_smarty->assign("processing_ord", $processing_ord);
        $admin_smarty->assign("pending_ord", $pending_ord);
        $admin_smarty->assign("failed_ord", $failed_ord);

        $admin_smarty->assign("order_list", $orderList);
        $admin_smarty->assign("pagination", $next_page);
    }
    #-------------------------------------------------------------------------------------
    #Order List
    /**
     * AdminRestaurantMgmt::reportList()
     * 
     * @param mixed $resid
     * @return
     */
    function reportList($resid)
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);
        $searchrestaurantid = $this->filterInput($_REQUEST['searchrestaurantid']);
        $resid              = $this->filterInput($_GET['resid']);

        #echo "<pre>";print_r($_REQUEST);echo "</pre>";
        //exit;
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc')
        {
            $sort = " ORDER BY ro.customername ASC";
            $fields .= "&sortby=casc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc')
        {
            $sort = " ORDER BY ro.customername DESC";
            $fields .= "&sortby=cdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'easc')
        {
            $sort = " ORDER BY ro.customeremail ASC";
            $fields .= "&sortby=easc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'edesc')
        {
            $sort = " ORDER BY ro.customeremail DESC";
            $fields .= "&sortby=edesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'tasc')
        {
            $sort = " ORDER BY ro.ordertotalprice ASC";
            $fields .= "&sortby=tasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'tdesc')
        {
            $sort = " ORDER BY ro.ordertotalprice DESC";
            $fields .= "&sortby=tdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resasc')
        {
            $sort = " ORDER BY res.restaurant_name ASC";
            $fields .= "&sortby=resasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resdesc')
        {
            $sort = " ORDER BY res.restaurant_name DESC";
            $fields .= "&sortby=resdesc";
        } else
        {
            //$sort .= " ORDER BY ro.customername ASC";
            $sort .= " ORDER BY ro.orderid DESC";
        }

        #List
        if (isset($_REQUEST['report']) && !empty($_REQUEST['report']))
        {

            if ($_REQUEST['report'] == "Today")
            {
                $today = date("Y-m-d");
                $condition .= " AND DATE_FORMAT(orderdate,'%Y-%m-%d') = '" . $today . "'";
            } elseif ($_REQUEST['report'] == "ThisWeek")
            {
                $condition .= " AND WEEK('" . CUR_TIME .
                    "',7) = WEEK(orderdate,7) AND DATEDIFF('" . CUR_TIME . "',orderdate)<7";
            } elseif ($_REQUEST['report'] == "LastWeek")
            {

                $lastweek = date("d-m-Y", strtotime('-1 week'));
                $date = $this->week_from_monday($lastweek);
                $weekdate = implode(",", $date);

                $condition .= " AND (
							DATE_FORMAT(orderdate,'%Y-%m-%d')='$date[0]' OR 
							DATE_FORMAT(orderdate,'%Y-%m-%d')='$date[1]' OR 
							DATE_FORMAT(orderdate,'%Y-%m-%d')='$date[2]' OR 
							DATE_FORMAT(orderdate,'%Y-%m-%d')='$date[3]' OR 
							DATE_FORMAT(orderdate,'%Y-%m-%d')='$date[4]' OR 
							DATE_FORMAT(orderdate,'%Y-%m-%d')='$date[5]' OR
							DATE_FORMAT(orderdate,'%Y-%m-%d')='$date[6]' ) ";
            } elseif ($_REQUEST['report'] == "LastMonth")
            {
                $lastmonth = date("Y-m", strtotime("-1 month"));
                $condition .= " AND DATE_FORMAT(orderdate,'%Y-%m')='" . $lastmonth . "'";
            } elseif ($_REQUEST['report'] == "ThisMonth")
            {
                $currentmonth = date("Y-m");
                $condition .= " AND DATE_FORMAT(orderdate,'%Y-%m')='" . $currentmonth . "'";
            } elseif ($_REQUEST['report'] == "ThisYear")
            {
                $currentyear = date("Y");
                $condition .= " AND DATE_FORMAT(orderdate,'%Y')='" . $currentyear . "'";
            } elseif ($_REQUEST['report'] == "LastYear")
            {
                $lastyear = date("Y", strtotime("-1 year"));
                $condition .= " AND DATE_FORMAT(orderdate,'%Y')='" . $lastyear . "'";
            }
        }

        #Datewise List
        if (isset($_REQUEST['report_from']) && !empty($_REQUEST['report_from']) && isset
            ($_REQUEST['report_to']) && !empty($_REQUEST['report_to']))
        {
            //Delivered date List from datewise
            $stdate = $this->filterInput($_REQUEST['report_from']);
            list($day, $month, $year) = explode("-", $stdate);
            $startdate = $year . '-' . $month . '-' . $day;

            $enddate = $this->filterInput($_REQUEST['report_to']);
            list($day, $month, $year) = explode("-", $enddate);
            $end_date = $year . '-' . $month . '-' . $day;
            $end_date = strtotime($end_date);
            $end_date = strtotime("+1 day",$end_date);
            $end_date = date("Y-m-d",$end_date);

            $condition .= " AND orderdate BETWEEN '" . $startdate . " 00:00:01' AND '" . $end_date ." 00:00:01' ";
            $cond_cnt .= " AND orderdate BETWEEN '" . $startdate . " 00:00:01' AND '" . $end_date ." 00:00:01' ";
            
        }


        #Limit
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields .= "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND customername LIKE '%" . addslashes($req_keyword) .
                "%' ";
            $fields .= "&keyword=$_REQUEST[keyword]";
        }

        if (isset($resid) && !empty($resid))
        {
            $fields .= "&resid=$_REQUEST[resid]";
        }

        if (isset($_REQUEST['type']) && !empty($_REQUEST['type']))
        {
            $fields .= "&type=$_REQUEST[type]";
        }

        if (isset($resid) && !empty($resid))
        {
            $rest_cond .= " AND ro.restaurant_id = '" . $resid . "' ";
            $cond_cnt .= " AND restaurant_id = '" . $resid . "' ";

            $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                "restaurant_id = '" . $resid . "'");

            $admin_smarty->assign("restname", $restname);


        }

        if (isset($searchrestaurantid) && !empty($searchrestaurantid))
        {
            $condition .= " AND res.restaurant_id = '" . $searchrestaurantid .
                "' ";
            $cond_cnt .= " AND restaurant_id = '" . $searchrestaurantid . "' ";
            $fields .= "&searchrestaurantid=$_REQUEST[searchrestaurantid]";
        }

        $sql_sel = "SELECT ro.orderid, ro.ordergenerateid, ro.deliverydoornumber, ro.deliverystreet, ro.restaurant_id, ro.customername, ro.customeremail, ro.ordertotalprice, ro.customercellphone, ro.status, ro.orderdate, ro.payment_type, " .
            " res.restaurant_name " . " FROM " . $CFG['table']['order'] . " AS ro " .
            " LEFT JOIN " . $CFG['table']['restaurant'] .
            " AS res ON res.restaurant_id = ro.restaurant_id " .
            " WHERE ro.paypal_status = 'success' AND ro.delete_status = 'No' AND ro.status = 'completed' AND ro.restaurant_id != '0' AND ro.orderid IS NOT NULL " .
            $cond . " " . $rest_cond . " " . $condition . " " . $sort . " ";

        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');
        $targetpage = "restaurantReportManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt . '.';
            $reportList[] = $row_seller;
            $cnt++;
        }

        #echo "<pre>";print_r($reportList);echo "</pre>";

        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }
        if (isset($_REQUEST['searchrestaurantid']) && !empty($_REQUEST['searchrestaurantid']))
        {
            $filename = 'restaurantReportManage.php?searchrestaurantid=' . $_REQUEST['searchrestaurantid'] . '';
        } else
        {
            $filename = 'restaurantReportManage.php';
        }

        $admin_smarty->assign("tablename", $CFG['table']['order']);
        $admin_smarty->assign("whereField", 'orderid');
        $admin_smarty->assign("fieldname", 'status');
        $admin_smarty->assign("word", 'Order');
        $admin_smarty->assign("filename", $filename);
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        #Statistics
        $tot_ord = $this->getNumvalues($CFG['table']['order'],
            "delete_status = 'No' AND restaurant_id != '' AND paypal_status = 'success' AND status = 'completed' ");
        $today_ord = $this->getNumvalues($CFG['table']['order'],
            "delete_status = 'No' AND paypal_status = 'success' AND status = 'completed' AND restaurant_id != '0' AND DATE_FORMAT(orderdate,'%Y-%m-%d') = '" .
            date("Y-m-d") . "' " . $cond_cnt . " ");
        $thisweek_ord = $this->getNumvalues($CFG['table']['order'],
            "delete_status = 'No' AND paypal_status = 'success' AND status = 'completed' AND restaurant_id != '0' AND WEEK('" .
            CUR_TIME . "',7) = WEEK(orderdate,7) AND DATEDIFF('" . CUR_TIME .
            "',orderdate)<7 " . $cond_cnt . " ");

        $lastweek_ord = $this->getNumvalues($CFG['table']['order'],
            "delete_status = 'No' AND paypal_status = 'success' AND status = 'completed' AND restaurant_id != '0' " .
            $cond_cnt . " ");

        $thismonth_ord = $this->getNumvalues($CFG['table']['order'],
            "delete_status = 'No' AND paypal_status = 'success' AND status = 'completed' AND restaurant_id != '0' AND DATE_FORMAT(orderdate,'%Y-%m')='" .
            date("Y-m") . "' " . $cond_cnt . " ");
        $lastmonth_ord = $this->getNumvalues($CFG['table']['order'],
            "delete_status = 'No' AND paypal_status = 'success' AND status = 'completed' AND restaurant_id != '0' AND DATE_FORMAT(orderdate,'%Y-%m')='" .
            date("Y-m", strtotime("-1 month")) . "' " . $cond_cnt . " ");

        $thisyear_ord = $this->getNumvalues($CFG['table']['order'],
            "delete_status = 'No' AND paypal_status = 'success' AND status = 'completed' AND restaurant_id != '0' AND DATE_FORMAT(orderdate,'%Y')='" .
            date("Y") . "' " . $cond_cnt . " ");
        $lastyear_ord = $this->getNumvalues($CFG['table']['order'],
            "delete_status = 'No' AND paypal_status = 'success' AND status = 'completed' AND restaurant_id != '0' AND DATE_FORMAT(orderdate,'%Y')='" .
            date("Y", strtotime("-1 year")) . "' " . $cond_cnt . " ");

        $admin_smarty->assign("ordersList_orderCnt", $tot_ord);
        $admin_smarty->assign("today_ord", $today_ord);
        $admin_smarty->assign("thisweek_ord", $thisweek_ord);
        $admin_smarty->assign("lastweek_ord", $lastweek_ord);
        $admin_smarty->assign("thismonth_ord", $thismonth_ord);
        $admin_smarty->assign("lastmonth_ord", $lastmonth_ord);
        $admin_smarty->assign("thisyear_ord", $thisyear_ord);
        $admin_smarty->assign("lastyear_ord", $lastyear_ord);

        $admin_smarty->assign("report_list", $reportList);
        $admin_smarty->assign("pagination", $next_page);
        return $reportList;
    }


    #--------------------------------------------------------------------------------
    #pdfReportlist
    /**
     * AdminRestaurantMgmt::pdfReportlist()
     * 
     * @param mixed $resid
     * @return
     */
    function pdfReportlist($resid)
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);
        $searchrestaurantid = $this->filterInput($_REQUEST['searchrestaurantid']);
        $resid              = $this->filterInput($_GET['resid']);

        #echo "<pre>";print_r($_REQUEST);echo "</pre>";
        //exit;
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc')
        {
            $sort = " ORDER BY ro.customername ASC";
            $fields .= "&sortby=casc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc')
        {
            $sort = " ORDER BY ro.customername DESC";
            $fields .= "&sortby=cdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'easc')
        {
            $sort = " ORDER BY ro.customeremail ASC";
            $fields .= "&sortby=easc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'edesc')
        {
            $sort = " ORDER BY ro.customeremail DESC";
            $fields .= "&sortby=edesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'tasc')
        {
            $sort = " ORDER BY ro.ordertotalprice ASC";
            $fields .= "&sortby=tasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'tdesc')
        {
            $sort = " ORDER BY ro.ordertotalprice DESC";
            $fields .= "&sortby=tdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resasc')
        {
            $sort = " ORDER BY res.restaurant_name ASC";
            $fields .= "&sortby=resasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resdesc')
        {
            $sort = " ORDER BY res.restaurant_name DESC";
            $fields .= "&sortby=resdesc";
        } else
        {
            //$sort .= " ORDER BY ro.customername ASC";
            $sort .= " ORDER BY ro.orderid DESC";
        }

        #List
        if (isset($_REQUEST['report']) && !empty($_REQUEST['report']))
        {

            if ($_REQUEST['report'] == "Today")
            {
                $today = date("Y-m-d");
                $condition .= " AND DATE_FORMAT(orderdate,'%Y-%m-%d') = '" . $today . "'";
            } elseif ($_REQUEST['report'] == "ThisWeek")
            {
                $condition .= " AND WEEK('" . CUR_TIME .
                    "',7) = WEEK(orderdate,7) AND DATEDIFF('" . CUR_TIME . "',orderdate)<7";
            } elseif ($_REQUEST['report'] == "LastWeek")
            {

                $lastweek = date("d-m-Y", strtotime('-1 week'));
                $date = $this->week_from_monday($lastweek);
                $weekdate = implode(",", $date);

                $condition .= " AND (
							DATE_FORMAT(orderdate,'%Y-%m-%d')='$date[0]' OR 
							DATE_FORMAT(orderdate,'%Y-%m-%d')='$date[1]' OR 
							DATE_FORMAT(orderdate,'%Y-%m-%d')='$date[2]' OR 
							DATE_FORMAT(orderdate,'%Y-%m-%d')='$date[3]' OR 
							DATE_FORMAT(orderdate,'%Y-%m-%d')='$date[4]' OR 
							DATE_FORMAT(orderdate,'%Y-%m-%d')='$date[5]' OR
							DATE_FORMAT(orderdate,'%Y-%m-%d')='$date[6]' ) ";
            } elseif ($_REQUEST['report'] == "LastMonth")
            {
                $lastmonth = date("Y-m", strtotime("-1 month"));
                $condition .= " AND DATE_FORMAT(orderdate,'%Y-%m')='" . $lastmonth . "'";
            } elseif ($_REQUEST['report'] == "ThisMonth")
            {
                $currentmonth = date("Y-m");
                $condition .= " AND DATE_FORMAT(orderdate,'%Y-%m')='" . $currentmonth . "'";
            } elseif ($_REQUEST['report'] == "ThisYear")
            {
                $currentyear = date("Y");
                $condition .= " AND DATE_FORMAT(orderdate,'%Y')='" . $currentyear . "'";
            } elseif ($_REQUEST['report'] == "LastYear")
            {
                $lastyear = date("Y", strtotime("-1 year"));
                $condition .= " AND DATE_FORMAT(orderdate,'%Y')='" . $lastyear . "'";
            }
        }

        #Datewise List
        if (isset($_REQUEST['report_from']) && !empty($_REQUEST['report_from']) && isset
            ($_REQUEST['report_to']) && !empty($_REQUEST['report_to']))
        {
            //Delivered date List from datewise
            $stdate = $_REQUEST['report_from'];
            list($day, $month, $year) = explode("-", $stdate);
            $startdate = $year . '-' . $month . '-' . $day;

            $enddate = $_REQUEST['report_to'];
            list($day, $month, $year) = explode("-", $enddate);
            $end_date = $year . '-' . $month . '-' . $day;

            $condition .= " AND orderdate BETWEEN '" . $startdate . "' AND '" . $end_date .
                "' ";
            $cond_cnt .= " AND orderdate BETWEEN '" . $startdate . "' AND '" . $end_date .
                "' ";
        }


        #Limit
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $_REQUEST['limit'];
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND customername LIKE '%" . addslashes($req_keyword) .
                "%' ";
            $fields .= "&keyword=$_REQUEST[keyword]$fields";
        }

        if (isset($resid) && !empty($resid))
        {
            $fields .= "&resid=$_REQUEST[resid]$fields";
        }

        if (isset($_REQUEST['type']) && !empty($_REQUEST['type']))
        {
            $fields .= "&type=$_REQUEST[type]$fields";
        }

        if (isset($resid) && !empty($resid))
        {
            $rest_cond .= " AND ro.restaurant_id = '" . $resid . "' ";
            $cond_cnt .= " AND restaurant_id = '" . $resid . "' ";

            $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                "restaurant_id = '" . $resid . "'");
            $admin_smarty->assign("restname", $restname);
        }

        if (isset($searchrestaurantid) && !empty($searchrestaurantid))
        {
            $condition .= " AND res.restaurant_id = '" . $searchrestaurantid .
                "' ";
            $cond_cnt .= " AND restaurant_id = '" . $searchrestaurantid . "' ";
            $fields .= "&searchrestaurantid=$_REQUEST[searchrestaurantid]$fields";
        }

        $sql_sel = "SELECT ro.orderid, ro.ordergenerateid, ro.deliverydoornumber, ro.deliverystreet, ro.restaurant_id, ro.customername, ro.customeremail, ro.ordertotalprice, ro.customercellphone, ro.status, ro.orderdate, ro.payment_type, " .
            " res.restaurant_name " . " FROM " . $CFG['table']['order'] . " AS ro " .
            " LEFT JOIN " . $CFG['table']['restaurant'] .
            " AS res ON ro.restaurant_id = res.restaurant_id " .
            " WHERE ro.status = 'completed' AND ro.restaurant_id != '0' AND ro.orderid IS NOT NULL " .
            $cond . " " . $rest_cond . " " . $condition . " " . $sort . " ";

        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');
        $targetpage = "restaurantReportManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt . '.';

            $rowsubTotal[] = $row_seller['subtotal'];
            $rowdelTotal[] = $row_seller['deliveryamount'];
            //$rowtaxTotal[]= $row_seller['taxvalue'];
            $rowtipTotal[] = $row_seller['tipvalue'];
            $rowTotal[] = $row_seller['ordertotalprice'];

            $rowtaxTotal[] = $this->getValue("restaurant_salestax", $CFG['table']['restaurant'],
                "restaurant_id = '" . $this->filterInput($row_seller['restaurant_id']) . "'");

            $row_seller['tax'] = $this->getValue("restaurant_salestax", $CFG['table']['restaurant'],
                "restaurant_id = '" . $this->filterInput($row_seller['restaurant_id']) . "'");
            #$row_seller['restaurant_commission_type']	= $this->getValue("restaurant_commission_type",$CFG['table']['restaurant'],"restaurant_id = '".$row_seller['restaurant_id']."'");


            #$row_seller['restaurant_commission']	= $this->getValue("restaurant_commission",$CFG['table']['restaurant'],"restaurant_id = '".$row_seller['restaurant_id']."'");

            #$total_commission[] = $row_seller['restaurant_commission'];

            $reportList[] = $row_seller;
            $cnt++;
        }

        #echo "<pre>";print_r($reportList);echo "</pre>";

        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        if (!empty($rowsubTotal) && is_array($rowsubTotal))
        {
            $orderSubTotal = array_sum($rowsubTotal);
        }
        if (!empty($rowdelTotal) && is_array($rowdelTotal))
        {
            $orderDelTotal = array_sum($rowdelTotal);
        }
        if (!empty($rowtaxTotal) && is_array($rowtaxTotal))
        {
            $orderTaxTotal = array_sum($rowtaxTotal);
        }
        /*if(!empty($total_commission) && is_array($total_commission)){
        $ordercommissionTotal = array_sum($total_commission);
        }*/
        if (!empty($rowtipTotal) && is_array($rowtipTotal))
        {
            $orderTipTotal = array_sum($rowtipTotal);
        }
        if (!empty($rowTotal) && is_array($rowTotal))
        {
            $orderTotal = array_sum($rowTotal);
        }

        #$restaurant_commission_type	= $this->getValue("restaurant_commission_type",$CFG['table']['restaurant'],"restaurant_id = '".$_REQUEST['resid']."'");
        $admin_smarty->assign("orderSubTotal", $orderSubTotal);
        $admin_smarty->assign("orderDelTotal", $orderDelTotal);
        $admin_smarty->assign("orderTaxTotal", $orderTaxTotal);
        $admin_smarty->assign("orderTipTotal", $orderTipTotal);
        #$objSmarty->assign("ordercommissionTotal",$ordercommissionTotal);
        $admin_smarty->assign("orderTotal", $orderTotal);
        #$objSmarty->assign("restaurant_commission_type",$restaurant_commission_type);


        //Calculate Commision Price or Percentage:
        $sql_commission = "SELECT ro.orderid, ro.ordergenerateid, ro.deliverydoornumber, ro.deliverystreet, ro.restaurant_id, ro.customername, ro.customeremail, SUM(ro.ordertotalprice) as total_commission, ro.status, ro.orderdate, ro.payment_type, ro.taxvalue," .
            " res.restaurant_name " . " FROM " . $CFG['table']['order'] . " AS ro " .
            " LEFT JOIN " . $CFG['table']['restaurant'] .
            " AS res ON ro.restaurant_id = res.restaurant_id " .
            " WHERE ro.status = 'completed' AND ro.payment_type = 'CC' AND ro.restaurant_id != '0' AND ro.orderid IS NOT NULL " .
            $cond . " " . $rest_cond . " " . $condition . " " . $sort . " ";

        $res_commision = $this->ExecuteQuery($sql_commission, 'select');

        $commission_type = $this->getMultiValue('restaurant_commission', $CFG['table']['restaurant'],
            "restaurant_id = '" . $resid . "'");

        foreach ($res_commision as $key => $val)
        {
            $total_commission = $res_commision[$key]['total_commission'];
        }

        $comm_type = $commission_type['0']['restaurant_commission_type'];
        $commission_amount = $commission_type['0']['restaurant_commission'];

        if ($comm_type == 'percentage')
        {
            $total_commission_in_type = ($total_commission * ($commission_amount / 100));
        } elseif ($comm_type == 'price')
        {
            $total_commission_in_type = ($total_commission * $commission_amount);
        }

        $vat = "0.00";
        $total_vat_amount = $total_commission_in_type + $vat;


        //Calculate Total sales on cash:
        $sql_cod = "SELECT ro.orderid, ro.ordergenerateid, ro.deliverydoornumber, ro.deliverystreet, ro.restaurant_id, ro.customername, ro.customeremail, SUM(ro.ordertotalprice) as total_commission, ro.status, ro.orderdate, ro.payment_type, ro.taxvalue," .
            " res.restaurant_name " . " FROM " . $CFG['table']['order'] . " AS ro " .
            " LEFT JOIN " . $CFG['table']['restaurant'] .
            " AS res ON ro.restaurant_id = res.restaurant_id " .
            " WHERE ro.status = 'completed' AND ro.payment_type = 'cod' AND ro.restaurant_id != '0' AND ro.orderid IS NOT NULL " .
            $cond . " " . $rest_cond . " " . $condition . " " . $sort . " ";

        $res_cod = $this->ExecuteQuery($sql_cod, 'select');

        $total_cod = $res_cod['0']['total_commission'];

        //Calculate Total sales on cash:
        $sql_cardpay = "SELECT ro.orderid, ro.ordergenerateid, ro.deliverydoornumber, ro.deliverystreet, ro.restaurant_id, ro.customername, ro.customeremail, SUM(ro.ordertotalprice) as total_commission, ro.status, ro.orderdate, ro.payment_type, ro.taxvalue," .
            " res.restaurant_name " . " FROM " . $CFG['table']['order'] . " AS ro " .
            " LEFT JOIN " . $CFG['table']['restaurant'] .
            " AS res ON ro.restaurant_id = res.restaurant_id " .
            " WHERE ro.status = 'completed' AND ro.payment_type = 'cardpayment' AND ro.restaurant_id != '0' AND ro.orderid IS NOT NULL " .
            $cond . " " . $rest_cond . " " . $condition . " " . $sort . " ";

        $res_cardpay = $this->ExecuteQuery($sql_cardpay, 'select');

        $total_cardpay = $res_cardpay['0']['total_commission'];

        //Calculate Total sales on cash:
        $sql_paypal = "SELECT ro.orderid, ro.ordergenerateid, ro.deliverydoornumber, ro.deliverystreet, ro.restaurant_id, ro.customername, ro.customeremail, SUM(ro.ordertotalprice) as total_commission, ro.status, ro.orderdate, ro.payment_type, ro.taxvalue," .
            " res.restaurant_name " . " FROM " . $CFG['table']['order'] . " AS ro " .
            " LEFT JOIN " . $CFG['table']['restaurant'] .
            " AS res ON ro.restaurant_id = res.restaurant_id " .
            " WHERE ro.status = 'completed' AND ro.payment_type = 'paypal' AND ro.restaurant_id != '0' AND ro.orderid IS NOT NULL " .
            $cond . " " . $rest_cond . " " . $condition . " " . $sort . " ";

        $res_paypal = $this->ExecuteQuery($sql_paypal, 'select');

        $total_paypal = $res_paypal['0']['total_commission'];


        $admin_smarty->assign("tablename", $CFG['table']['order']);
        $admin_smarty->assign("whereField", 'orderid');
        $admin_smarty->assign("fieldname", 'status');
        $admin_smarty->assign("word", 'Order');
        $admin_smarty->assign("filename", 'restaurantReportManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        $admin_smarty->assign('total_commission', $total_commission);
        $admin_smarty->assign('commission_type', $comm_type);
        $admin_smarty->assign('commission_amount', $commission_amount);
        $admin_smarty->assign('total_commission_in_type', $total_commission_in_type);
        $admin_smarty->assign('vat', $vat);
        $admin_smarty->assign('total_cod', $total_cod);
        $admin_smarty->assign('total_vat_amount', $total_vat_amount);
        $admin_smarty->assign('total_cardpay', $total_cardpay);
        $admin_smarty->assign('total_paypal', $total_paypal);
        $admin_smarty->assign('res_commision', $res_commision);

        #Statistics
        $tot_ord = $this->getNumvalues($CFG['table']['order'], "restaurant_id != ''  ");
        $today_ord = $this->getNumvalues($CFG['table']['order'],
            "status = 'completed' AND restaurant_id != '0' AND DATE_FORMAT(orderdate,'%Y-%m-%d') = '" .
            date("Y-m-d") . "' " . $cond_cnt . " ");
        $thisweek_ord = $this->getNumvalues($CFG['table']['order'],
            "status = 'completed' AND restaurant_id != '0' AND WEEK('" . CUR_TIME .
            "',7) = WEEK(orderdate,7) AND DATEDIFF('" . CUR_TIME . "',orderdate)<7 " . $cond_cnt .
            " ");

        $lastweek_ord = $this->getNumvalues($CFG['table']['order'],
            "status = 'completed' AND restaurant_id != '0' " . $cond_cnt . " ");

        $thismonth_ord = $this->getNumvalues($CFG['table']['order'],
            "status = 'completed' AND restaurant_id != '0' AND DATE_FORMAT(orderdate,'%Y-%m')='" .
            date("Y-m") . "' " . $cond_cnt . " ");
        $lastmonth_ord = $this->getNumvalues($CFG['table']['order'],
            "status = 'completed' AND restaurant_id != '0' AND DATE_FORMAT(orderdate,'%Y-%m')='" .
            date("Y-m", strtotime("-1 month")) . "' " . $cond_cnt . " ");

        $thisyear_ord = $this->getNumvalues($CFG['table']['order'],
            "status = 'completed' AND restaurant_id != '0' AND DATE_FORMAT(orderdate,'%Y')='" .
            date("Y") . "' " . $cond_cnt . " ");
        $lastyear_ord = $this->getNumvalues($CFG['table']['order'],
            "status = 'completed' AND restaurant_id != '0' AND DATE_FORMAT(orderdate,'%Y')='" .
            date("Y", strtotime("-1 year")) . "' " . $cond_cnt . " ");

        $admin_smarty->assign("ordersList_orderCnt", $tot_ord);
        $admin_smarty->assign("today_ord", $today_ord);
        $admin_smarty->assign("thisweek_ord", $thisweek_ord);
        $admin_smarty->assign("lastweek_ord", $lastweek_ord);
        $admin_smarty->assign("thismonth_ord", $thismonth_ord);
        $admin_smarty->assign("lastmonth_ord", $lastmonth_ord);
        $admin_smarty->assign("thisyear_ord", $thisyear_ord);
        $admin_smarty->assign("lastyear_ord", $lastyear_ord);

        $admin_smarty->assign("report_list", $reportList);
        $admin_smarty->assign("pagination", $next_page);
    }


    #--------------------------------------------------------------------------------
    #Order List
    /**
     * AdminRestaurantMgmt::reviewsList()
     * 
     * @param mixed $resid
     * @return
     */
    function reviewsList($resid)
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);
        $searchrestaurantid = $this->filterInput($_REQUEST['searchrestaurantid']);
        $resid              = $this->filterInput($_GET['resid']);

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc')
        {
            $sort = " ORDER BY cus.customer_name ASC";
            $fields .= "&sortby=casc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc')
        {
            $sort = " ORDER BY cus.customer_name DESC";
            $fields .= "&sortby=cdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resasc')
        {
            $sort = " ORDER BY res.restaurant_name ASC";
            $fields .= "&sortby=resasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resdesc')
        {
            $sort = " ORDER BY res.restaurant_name DESC";
            $fields .= "&sortby=resdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'rasc')
        {
            $sort = " ORDER BY rr.rating ASC";
            $fields .= "&sortby=rasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'rdesc')
        {
            $sort = " ORDER BY rr.rating DESC";
            $fields .= "&sortby=rdesc";
        } else
        {
            $sort .= " ORDER BY rr.rating_id DESC";
        }

        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND rr.status = '1' ";
            $cond_cnt .= " AND status = '1' ";
            $fields .= "&sortby=active";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND rr.status = '0' ";
            $cond_cnt .= " AND status = '0' ";
            $fields .= "&sortby=deactive";
        }

        #Limit
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND cus.customer_name LIKE '%" . addslashes($req_keyword) .
                "%' OR res.restaurant_name LIKE '%" . addslashes($req_keyword) . "%'";
            $fields .= "&keyword=$_REQUEST[keyword]$fields";
        }

        if (isset($resid) && !empty($resid))
        {
            $fields .= "&resid=$_REQUEST[resid]$fields";
        }

        if (isset($resid) && !empty($resid))
        {
            $rest_cond .= " AND rr.restaurant_id = '" . $resid . "' ";
            $cond_cnt .= " AND restaurant_id = '" . $resid . "' ";

            $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                "restaurant_id = '" . $resid . "'");
            $admin_smarty->assign("restname", $restname);
        }

        if (isset($searchrestaurantid) && !empty($searchrestaurantid))
        {
            $condition .= " AND rr.restaurant_id = '" . $searchrestaurantid .
                "' ";
            $cond_cnt .= " AND restaurant_id = '" . $searchrestaurantid . "' ";
            $fields .= "&searchrestaurantid=$_REQUEST[searchrestaurantid]$fields";
        }

        $sql_sel = "SELECT rr.rating_id, rr.order_id, rr.restaurant_id, rr.customer_id, rr.rating, rr.message, rr.addeddate, rr.status, " .
            " res.restaurant_name, " . "cus.customer_name " . " FROM " . $CFG['table']['restaurant_reviews'] .
            " AS rr " . " LEFT JOIN " . $CFG['table']['restaurant'] .
            " AS res ON rr.restaurant_id = res.restaurant_id " . " LEFT JOIN " . $CFG['table']['customer'] .
            " AS cus ON rr.customer_id = cus.customer_id " .
            " WHERE rr.restaurant_id != '0' AND rr.rating_id IS NOT NULL " . $cond . " " . $rest_cond .
            " " . $condition . " " . $sort . " ";

        #echo $sql_sel;
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');
        $targetpage = "restaurantReviewsManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt . '.';

            $reviewList[] = $row_seller;
            $cnt++;
        }
        #echo "<pre>";print_r($reviewList);echo "</pre>";
        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        $admin_smarty->assign("tablename", $CFG['table']['restaurant_reviews']);
        $admin_smarty->assign("whereField", 'rating_id');
        $admin_smarty->assign("fieldname", 'status');
        $admin_smarty->assign("word", 'Reviews');
        $admin_smarty->assign("filename", 'restaurantReviewsManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        #Statistics
        $tot_rec = $this->getNumvalues($CFG['table']['restaurant_reviews'],
            "rating_id != '' ");
        $active_rec = $this->getNumvalues($CFG['table']['restaurant_reviews'],
            "status = '1' " . $cond_cnt . " ");
        $deactive_rec = $this->getNumvalues($CFG['table']['restaurant_reviews'],
            "status = '0' " . $cond_cnt . " ");

        $admin_smarty->assign("reviewsCnt", $tot_rec);
        $admin_smarty->assign("activerec", $active_rec);
        $admin_smarty->assign("deactiverec", $deactive_rec);
        
        $admin_smarty->assign("review_list", $reviewList);
        $admin_smarty->assign("pagination", $next_page);
    }
    #--------------------------------------------------------------------------------
    #Order List
    /**
     * AdminRestaurantMgmt::paymentList()
     * 
     * @return
     */
    function paymentList()
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);
        $searchrestaurantid = $this->filterInput($_REQUEST['searchrestaurantid']);
        $resid              = $this->filterInput($_GET['resid']);

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc')
        {
            $sort = " ORDER BY customername ASC";
            $fields .= "&sortby=casc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc')
        {
            $sort = " ORDER BY customername DESC";
            $fields .= "&sortby=cdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'tasc')
        {
            $sort = " ORDER BY ordertotalprice ASC";
            $fields .= "&sortby=tasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'tdesc')
        {
            $sort = " ORDER BY ordertotalprice DESC";
            $fields .= "&sortby=tdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resasc')
        {
            $sort = " ORDER BY restaurant_id ASC";
            $fields .= "&sortby=resasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resdesc')
        {
            $sort = " ORDER BY restaurant_id DESC";
            $fields .= "&sortby=resdesc";
        } else
        {
            $sort .= " ORDER BY orderid DESC";
        }


        #Limit
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND customername LIKE '%" . addslashes($req_keyword) .
                "%' OR ordertotalprice LIKE '%" . addslashes($req_keyword) .
                "%' OR payment_type LIKE '%" . addslashes($req_keyword) . "%' ";
            $fields .= "&keyword=$_REQUEST[keyword]$fields";
        }

        if (isset($resid) && !empty($resid))
        {
            $fields .= "&resid=$_REQUEST[resid]$fields";
        }

        if (isset($_REQUEST['type']) && !empty($_REQUEST['type']))
        {
            $fields .= "&type=$_REQUEST[type]$fields";
        }

        if (isset($resid) && !empty($resid))
        {
            $rest_cond = " AND restaurant_id = '" . $resid . "' ";

            $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                "restaurant_id = '" . $resid . "'");
            $admin_smarty->assign("restname", $restname);
        }

        if (isset($searchrestaurantid) && !empty($searchrestaurantid))
        {
            $condition .= " AND restaurant_id = '" . $searchrestaurantid . "' ";
            $fields .= "&searchrestaurantid=$_REQUEST[searchrestaurantid]$fields";
        }

        $sql_sel = "SELECT ordergenerateid, restaurant_id, customer_id, usertype, customername, ordertotalprice, payment_type, transaction_id, orderdate FROM " .
            $CFG['table']['order'] . " WHERE payment_type != '' " . $condition . " " . $sort .
            "  ";

        /*$sql_sel = "SELECT py.payment_id, py.member_id, py.orderid, py.amount, py.rechared_date, py.transaction_id,".
        " cus.customer_name, ". "ord.restaurant_id ".
        " FROM ".$CFG['table']['payment']." AS py ".
        " LEFT JOIN ".$CFG['table']['customer']." AS cus ON py.member_id = cus.customer_id".
        " LEFT JOIN ".$CFG['table']['order']." AS ord ON py.orderid = ord.ordergenerateid".
        " WHERE py.transaction_id != '' AND py.amount != '0' ".$condition." ".$sort."  " ;*/

        #echo $sql_sel;

        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');
        $targetpage = "paymentManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt . '.';
            $row_seller['restaurantname'] = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                "restaurant_id = '" . $row_seller['restaurant_id'] . "'");
            /*if ($row_seller['payment_type'] == "paypal" && $row_seller['transaction_id'] == '')
            {
                $row_seller['transaction_id'] = $this->getValue('transaction_id', $CFG['table']['payment'],
                    "orderid = '" . $row_seller['ordergenerateid'] . "' ");
            }*/
            $paymentList[] = $row_seller;
            $cnt++;
        }
        #echo "<pre>";print_r($orderList);echo "</pre>";
        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        $admin_smarty->assign("tablename", $CFG['table']['payment']);
        $admin_smarty->assign("whereField", 'payment_id');
        $admin_smarty->assign("fieldname", 'status');
        $admin_smarty->assign("word", 'Payment');
        $admin_smarty->assign("filename", 'paymentManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        $admin_smarty->assign("payment_list", $paymentList);
        $admin_smarty->assign("pagination", $next_page);
    }
    #-------------------------------------------------------------------------------------
    #Order View Full Details
    /**
     * AdminRestaurantMgmt::orderViewFullDetails()
     * 
     * @param mixed $orderid
     * @return
     */
    function orderViewFullDetails($orderid)
    {
        global $CFG, $admin_smarty;

        $sel_order = "SELECT ordergenerateid, restaurant_id, customername,customerlastname, customeremail, customercellphone, deliverydoornumber, deliverystreet, deliverylandmark, deliveryarea, deliverycity, deliverytype, deliverystate, deliveryzip, deliverydate, deliverytime, ordertotalprice, offervalue, taxvalue, foodassoonas, status, orderdate, payment_type, deliveryamount, taxamount, offeramount, tipamount, ordersubtotal, payment_status, instructions, transaction_id, printer_sent, printer_response,voucher_id, voucher_code, voucher_price, printer_ack, printer_ack_msg, printer_res_deli_time FROM " .
            $CFG['table']['order'] . " WHERE orderid = '" . $this->filterInput($orderid) . "' ";
        $res_order = $this->ExecuteQuery($sel_order, 'select');
        foreach ($res_order as $key => $val)
        {
            /*$res_order[$key]['transaction_id'] = $this->getValue("transaction_id", $CFG['table']['payment'],
                "orderid = '" . $orderid . "' ");*/
            $res_order[$key]['deliverycity'] = $this->GetValue("cityname", $CFG['table']['city'],
                    "city_id = '" . $this->filterInput($res_order[0]['deliverycity']) . "'");
            $res_order[$key]['deliverystate'] = $this->GetValue("statename", $CFG['table']['state'],
                    "statecode = '" . $this->filterInput($res_order[0]['deliverystate']) . "'");
        }

        $restDetails = $this->GetMultivalue("restaurant_name,restaurant_salestax,restaurant_delivery_charge,restaurant_minorder_price, restaurant_cloud_printer_email, restaurant_cloud_printer_password, google_cloud_printer_option, gprs_option",$CFG['table']['restaurant'], "restaurant_id = '" . $this->filterInput($res_order[0]['restaurant_id']) ."'");

        $sel_cart = "SELECT cart_id, menuid, restaurantid, menuname, menutype,addonsname, pizza_size, addonsprice, menuprice, quantity, specialinstruction, tot_menuprice FROM " .
            $CFG['table']['restaurant_cart'] . " WHERE orderid = '" . $this->filterInput($orderid) .
            "' AND quantity != '0' ";
        $res_cart = $this->ExecuteQuery($sel_cart, "select");


        #echo "<pre>";print_r($res_cart);echo "</pre>";
        if (count($res_cart) > 0)
        {
            foreach ($res_cart as $key => $value)
            {
                $rowTotal[] = $res_cart[$key]['tot_menuprice'];
            }
        }
        $orderSubTotal = $res_order['0']['ordersubtotal'];
        if ($res_order[0]['deliverytype'] != 'pickup')
        {
            $deliverychargeamt = $res_order['0']['deliveryamount'];
        }
        #$tax = $restDetails[0]['restaurant_salestax'];
        $tax = $res_order[0]['taxvalue'];
        if ($tax != '')
        {
            $taxamount = $res_order[0]['taxamount'];
        }

        $tipamt = $res_order[0]['tipamount'];
        if ($tipamt != '0.00')
        {
            $tipamount = $tipamt;
        }

        $offer_percentage = $res_order['0']['offervalue'];
        if (isset($offer_percentage) && !empty($offer_percentage))
        {

            $orderDiscountPrice = $res_order['0']['offeramount'];
        }
        $orderGrandTotal = $res_order['0']['ordertotalprice'];

        $admin_smarty->assign('subtotal',$orderSubTotal);
        $admin_smarty->assign('total',$orderGrandTotal);
        $admin_smarty->assign('orderDiscountPrice',$orderDiscountPrice);

        $admin_smarty->assign('deliverycharge', $res_order['0']['deliveryamount']);
        $admin_smarty->assign('res_salestax', $res_order[0]['taxvalue']);
        $admin_smarty->assign('salestax', $res_order[0]['taxvalue']);
        $admin_smarty->assign('tipamount', $tipamount);
        $admin_smarty->assign('taxamount', $taxamount);
        #new
        $admin_smarty->assign('printer_email', $restDetails[0]['restaurant_cloud_printer_email']);
        $admin_smarty->assign('printer_password', $restDetails[0]['restaurant_cloud_printer_password']);
        $admin_smarty->assign('printer_option', $restDetails[0]['google_cloud_printer_option']);
        $admin_smarty->assign('gprs_option', $restDetails[0]['gprs_option']);
        #
        $admin_smarty->assign('restaurantname', $restDetails[0]['restaurant_name']);
        $admin_smarty->assign('minorderprice', $restDetails[0]['restaurant_minorder_price']);

        $admin_smarty->assign('cartDetails', $res_cart);
        $admin_smarty->assign('orderDetails', $res_order);
    }
    #---------------------------------------------------------------------------------------

    #-------------------------------------------------------------------------------------
    #ContactUs View Full Details
    /**
     * AdminRestaurantMgmt::contactUsDetails()
     * 
     * @param mixed $detid
     * @return
     */
    function contactUsDetails($detid)
    {
        global $CFG, $admin_smarty;

        $sel_contact = "SELECT contact_id,contact_name,contact_email,contact_ordernumber,contact_orderdate,contact_restaurantname,addeddate,contact_status,contact_comments FROM " .
            $CFG['table']['contactus'] . " WHERE contact_id = '" . $this->filterInput($detid) . "' ";
        $res_contact = $this->ExecuteQuery($sel_contact, 'select');

        foreach ($res_contact as $key => $val)
        {
            $res_contact[$key]['contact_id'] = $this->getValue("contact_id", $CFG['table']['contactus'],
                "contact_id = '" . $this->filterInput($detid) . "' ");
        }

        $admin_smarty->assign('contact_name', $res_contact[0]['contact_name']);
        $admin_smarty->assign('contact_email', $res_contact[0]['contact_email']);
        $admin_smarty->assign('contact_ordernumber', $res_contact[0]['contact_ordernumber']);
        $admin_smarty->assign('contact_orderdate', $res_contact[0]['contact_orderdate']);
        $admin_smarty->assign('contact_comments', $res_contact[0]['contact_comments']);
        $admin_smarty->assign('contact_status', $res_contact[0]['contact_status']);

        $admin_smarty->assign('orderDetails', $res_contact);
    }
    #---------------------------------------------------------------------------------------

    #-------------------------------------------------------------------------------------
    #Feed View Full Details
    /**
     * AdminRestaurantMgmt::feedbackDetails()
     * 
     * @param mixed $detid
     * @return
     */
    function feedbackDetails($detid)
    {
        global $CFG, $admin_smarty;

        $sel_feedback = "SELECT id,restaurantname,restaurantcity,feedback,addeddate,status FROM " .
            $CFG['table']['sitefeedback'] . " WHERE id = '" . $this->filterInput($detid) . "' ";
        $res_feedback = $this->ExecuteQuery($sel_feedback, 'select');

        foreach ($res_feedback as $key => $val)
        {
            $res_feedback[$key]['id'] = $this->getValue("id", $CFG['table']['sitefeedback']," id = '" . $this->filterInput($detid) . "' ");
                
        }
        $resName = $this->getValue("restaurant_name", $CFG['table']['restaurant']," restaurant_id = '" . $this->filterInput($res_feedback[0]['restaurantname']) . "' ");
        $admin_smarty->assign('restaurantname', $resName);
        $admin_smarty->assign('restaurantcity', $res_feedback[0]['restaurantcity']);
        $admin_smarty->assign('feedback', $res_feedback[0]['feedback']);
        $admin_smarty->assign('addeddate', $res_feedback[0]['addeddate']);
        $admin_smarty->assign('status', $res_feedback[0]['status']);

        $admin_smarty->assign('orderDetails', $res_feedback);
    }
    #---------------------------------------------------------------------------------------

    #change addons status
    /**
     * AdminRestaurantMgmt::categoryChangeStatus()
     * 
     * @param mixed $resid
     * @return
     */
    function categoryChangeStatus($resid)
    {
        global $CFG, $admin_smarty;

        $changestatus = $_POST['chgestatus'];
        if ($changestatus == 'chgeActDeact')
        {
            if (isset($_POST['mid']) && !empty($_POST['mid']))
            {
                $sel_up = "UPDATE " . $CFG['table']['category_main'] . " SET status = '" . $_POST['chgeval'] .
                    "' WHERE maincateid = '" . $this->filterInput($_POST['mid']) . "'";
                $res_up = $this->ExecuteQuery($sel_up, 'update');
                #echo $sel_up;
            }
        }
    }
    #........................................................................................
    #DELETE Restaurant Photo's
    /**
     * AdminRestaurantMgmt::Res_Delete_Photo()
     * 
     * @return
     */
    function Res_Delete_Photo()
    {
        global $CFG, $admin_smarty;

        $tab_fieldname = "restaurant_photos" . $this->filterInput($_POST['fieldnumber']);
        $restaurantid = $this->filterInput($_POST['restaurantid']);

        $getphotoname = $this->getValue($tab_fieldname, $CFG['table']['restaurant'],
            "restaurant_id = '" . $restaurantid . "' ");

        if ($getphotoname != '' && $tab_fieldname != '')
        {
            @unlink($CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $getphotoname);

            $query = "UPDATE " . $CFG['table']['restaurant'] . " SET " . $tab_fieldname .
                " = '' WHERE restaurant_id = '" . $restaurantid . "' ";
            $res = $this->ExecuteQuery($query, "update");

            echo 'success';
            exit;
        }
    }


    #........................................................................................
    #DELETE Restaurant Logo
    /**
     * AdminRestaurantMgmt::Res_Delete_Logo()
     * 
     * @return
     */
    function Res_Delete_Logo()
    {
        global $CFG, $admin_smarty;

        $restaurantid = $this->filterInput($_POST['restaurantid']);

        $getlogoname = $this->getValue("restaurant_logo", $CFG['table']['restaurant'],
            "restaurant_id = '" . $restaurantid . "' ");

        if ($getlogoname != '' && $restaurantid != '')
        {

            @unlink($CFG['site']['photo_restaurant_path'] . '/logo' . '/' . $getlogoname);

            $query = "UPDATE " . $CFG['table']['restaurant'] .
                " SET restaurant_logo = '' WHERE restaurant_id = '" . $restaurantid . "' ";
            $res = $this->ExecuteQuery($query, "update");

            echo 'success';
            exit;
        }
    }
    #-----------------------------------------------------------------------------------------------
    /**
     * AdminRestaurantMgmt::checkCategoryName()
     * 
     * @return
     */
    function checkCategoryName()
    {
        global $CFG, $admin_smarty;

        $getcatname = $this->getValue("maincatename", $CFG['table']['category_main'],
            "maincateid = '" . $this->filterInput($_POST['catid']) . "' ");
        echo strtolower($getcatname);
    }
    #-----------------------------------------------------------------------------------------------
    /**
     * AdminRestaurantMgmt::checkCategoryName1()
     * 
     * @return
     */
    function checkCategoryName1()
    {
        global $CFG, $admin_smarty;

        $getcatname = $this->getValue("maincatename", $CFG['table']['category_main'],
            "maincateid = '" . $this->filterInput($_POST['menu_category']) . "' ");
        echo strtolower($getcatname);
    }
    #--------------------------------------------
    #Show Addons List
    /**
     * AdminRestaurantMgmt::getShowAddonsList1()
     * 
     * @param mixed $catid
     * @return
     */
    function getShowAddonsList1($catid)
    {
        global $CFG, $admin_smarty;

        $sel_addon = "SELECT id,category_id,addonsname,restaurant_id FROM " . $CFG['table']['restaurant_addons'] .
            " WHERE category_id = '" . $catid .
            "' AND parentid = '0' AND status = '1' ORDER BY addonsname ASC";
        $res_addon = $this->ExecuteQuery($sel_addon, "select");
        #echo "<pre>";print_r($res_addon);echo "</pre>";

        foreach ($res_addon as $key => $value)
        {
            $res_addon[$key]['addonid'] = $this->GetValue("menuaddons_addonsname", $CFG['table']['restaurant_menuaddons'],
                "menuaddons_addonsname = '" . $this->filterInput($res_addon[$key]['id']) .
                "' AND menuaddons_categoryid = '" . $this->filterInput($res_addon[$key]['category_id']) . "' " . $cond .
                " ");
            $res_addon[$key]['menupriceoption'] = $this->GetValue("menuaddons_priceoption",
                $CFG['table']['restaurant_menuaddons'], "menuaddons_addonsname = '" . $this->filterInput($res_addon[$key]['id']) .
                "' AND menuaddons_categoryid = '" . $this->filterInput($res_addon[$key]['category_id']) . "' " . $cond .
                "");
            $res_addon[$key]['menuprice'] = $this->GetValue("menuaddons_price", $CFG['table']['restaurant_menuaddons'],
                "menuaddons_addonsname = '" . $this->filterInput($res_addon[$key]['id']) .
                "' AND menuaddons_categoryid = '" . $this->filterInput($res_addon[$key]['category_id']) . "' " . $cond .
                "");
            $res_addon[$key]['menu_addonid'] = $this->GetValue("menuaddons_id", $CFG['table']['restaurant_menuaddons'],
                "menuaddons_addonsname = '" . $this->filterInput($res_addon[$key]['id']) .
                "' AND menuaddons_categoryid = '" . $this->filterInput($res_addon[$key]['category_id']) . "' " . $cond .
                "");
        }

        /*foreach($res_addon as $key=>$value){
        $res_addon[$key]['addonid'] = $this->getValue("pizza_addons_addonsname",$CFG['table']['restaurant_pizza_addons'],"pizza_addons_addonsname = '".$res_addon[$key]['id']."' AND pizza_addons_categoryid = '".$res_addon[$key]['category_id']."' AND pizza_addons_restaurantid = '".$res_addon[$key]['restaurant_id']."'");
        $res_addon[$key]['menupriceoption'] = $this->getValue("pizza_addons_priceoption",$CFG['table']['restaurant_pizza_addons'],"pizza_addons_addonsname = '".$res_addon[$key]['id']."' AND pizza_addons_categoryid = '".$res_addon[$key]['category_id']."' AND pizza_addons_restaurantid = '".$res_addon[$key]['restaurant_id']."'");
        $res_addon[$key]['menuprice'] = $this->getValue("pizza_addons_price",$CFG['table']['restaurant_pizza_addons'],"pizza_addons_addonsname = '".$res_addon[$key]['id']."' AND pizza_addons_categoryid = '".$res_addon[$key]['category_id']."' AND pizza_addons_restaurantid = '".$res_addon[$key]['restaurant_id']."'");
        
        $res_addon[$key]['menu_addonid'] = $this->getValue("pizza_addonsid",$CFG['table']['restaurant_pizza_addons'],"pizza_addons_addonsname = '".$res_addon[$key]['id']."' AND pizza_addons_categoryid = '".$res_addon[$key]['category_id']."' AND pizza_addons_restaurantid = '".$res_addon[$key]['restaurant_id']."'");
        }*/
        //echo "<pre>";print_r($res_addon);echo "</pre>";
        $admin_smarty->assign("showPizzaAddonslist", $res_addon);
        $admin_smarty->assign("cntpizzaAddons", count($res_addon));
    }
    #----------------------------------------------------
    #getShowCrustList
    /**
     * AdminRestaurantMgmt::getShowCrustList()
     * 
     * @param mixed $menuid
     * @return
     */
    function getShowCrustList($menuid)
    {
        global $CFG, $admin_smarty;

        $sel_crust = "SELECT pizza_crustid, pizza_crust_restaurantid, pizza_crust_categoryid, pizza_crust_menuid, pizza_crust_addonsname, pizza_crust_priceoption, pizza_crust_price FROM " .
            $CFG['table']['restaurant_pizza_crust'] . " WHERE pizza_crust_menuid = '" . $this->filterInput($menuid) .
            "' ORDER BY pizza_crustid ASC";

        $res_crust = $this->ExecuteQuery($sel_crust, "select");
        $admin_smarty->assign("showPizzaCrustlist", $res_crust);
        $admin_smarty->assign("cntcrustAddons", count($res_crust));

    }

    //---------------------------------------------------------------------------
    #getShowPizzaSizeoption
    /**
     * AdminRestaurantMgmt::getShowPizzaSizeoption()
     * 
     * @param mixed $cat_id
     * @param mixed $maincat_option
     * @return
     */
    function getShowPizzaSizeoption($cat_id, $maincat_option)
    {
        global $CFG, $admin_smarty;

        #$sel_slice = "SELECT pizza_slice_id, pizza_slice_restaurantid, pizza_slice_categoryid, pizza_slice_menuid, pizza_slice_name, pizza_slice_price FROM ".$CFG['table']['restaurant_pizza_slice']." WHERE pizza_slice_categoryid = '".$cat_id."' AND pizza_slice_restaurantid = '".$_REQUEST['resid']."'  ORDER BY pizza_slice_id ASC";

        //echo "maincat_option --->".$maincat_option;

        if (isset($_REQUEST['eid']) && !empty($_REQUEST['eid']))
        {
            $cond .= " AND pizza_slice_menuid = '" . $this->filterInput($_REQUEST['eid']) . "' ";
        }

        if (isset($maincat_option) && !empty($maincat_option) && $maincat_option ==
            'pizza')
        {
            $cat_optioncond .= " WHERE piz.pizza_slice_restaurantid = '" . $this->filterInput($_REQUEST['resid']) .
                "' AND cat.maincat_option = '" . $this->filterInput($maincat_option) . "'";
        } elseif (isset($maincat_option) && !empty($maincat_option) && $maincat_option ==
        'normal')
        {
            $cat_optioncond .= " WHERE piz.pizza_slice_categoryid = '" . $cat_id .
                "' AND piz.pizza_slice_restaurantid = '" . $this->filterInput($_REQUEST['resid']) .
                "' AND cat.maincat_option = '" . $maincat_option . "'";
        }

        $sel_slice = "SELECT piz.pizza_slice_id, piz.pizza_slice_restaurantid, piz.pizza_slice_categoryid, piz.pizza_slice_menuid, piz.pizza_slice_name, piz.pizza_slice_price, cat.maincat_option FROM " .
            $CFG['table']['restaurant_pizza_slice'] . " as piz" . " LEFT JOIN " . $CFG['table']['category_main'] .
            " as cat ON piz.pizza_slice_categoryid = cat.maincateid" . " $cat_optioncond " .
            $cond . " GROUP BY piz.pizza_slice_name ORDER BY piz.pizza_slice_id ASC";

        $res_slice = $this->ExecuteQuery($sel_slice, "select");
        #echo "qry: ".$sel_slice;
        //echo "<pre>";print_r($res_slice);echo "</pre>";
        #echo "count: ".count($res_slice);

        $admin_smarty->assign("showPizzaSlicelist", $res_slice);
        $admin_smarty->assign("cntSliceAddons", count($res_slice));
    }
    #--------------------------------------------------------------------------------
    #Booking List:
    /**
     * AdminRestaurantMgmt::bookingList()
     * 
     * @param mixed $resid
     * @return
     */
    function bookingList($resid)
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);
        $searchrestaurantid = $this->filterInput($_REQUEST['searchrestaurantid']);
        

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'tasc')
        {
            $sort = " ORDER BY ro.booking_name ASC";
            $fields .= "&sortby=tasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'tdesc')
        {
            $sort = " ORDER BY ro.booking_name DESC";
            $fields .= "&sortby=tdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resasc')
        {
            $sort = " ORDER BY res.restaurant_name ASC";
            $fields .= "&sortby=resasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resdesc')
        {
            $sort = " ORDER BY res.restaurant_name DESC";
            $fields .= "&sortby=resdesc";
        } else
        {
            //$sort .= " ORDER BY ro.customername ASC";
            $sort .= " ORDER BY ro.id DESC";
        }

        #Status
        /*
        if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'pending'){
        $condition .= " AND ro.status = 'pending' ";
        $cond_cnt .= " AND status = 'pending' ";
        }elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'processing'){
        $condition .= " AND ro.status = 'processing' ";
        $cond_cnt .= " AND status = 'processing' ";
        }elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'completed'){
        $condition .= " AND ro.status = 'completed' ";
        $cond_cnt .= " AND status = 'completed' ";
        }elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'failed'){
        $condition .= " AND ro.status = 'failed' ";
        $cond_cnt .= " AND status = 'failed' ";
        }*/

        #Limit
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND ro.booking_name LIKE '%" . addslashes($req_keyword) .
                "%' OR res.restaurant_name LIKE '%" . addslashes($req_keyword) . "%' ";
            $fields .= "&keyword=$_REQUEST[keyword]$fields";
        }

        if (isset($resid) && !empty($resid))
        {
            $fields .= "&resid=$_REQUEST[resid]$fields";
        }

        if (isset($_REQUEST['type']) && !empty($_REQUEST['type']))
        {
            $fields .= "&type=$_REQUEST[type]$fields";
        }

        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $rest_cond = " AND ro.restaurant_id = '" . $_REQUEST['resid'] . "' ";
            $rest_cond1 = " AND restaurant_id = '" . $_REQUEST['resid'] . "' ";

            $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                "restaurant_id = '" . $this->filterInput($_GET['resid']) . "'");
            $admin_smarty->assign("restname", $restname);
        }

        if (isset($searchrestaurantid) && !empty($searchrestaurantid))
        {
            $condition .= " AND res.restaurant_id = '" . $searchrestaurantid .
                "' ";
            $rest_cond1 .= " AND restaurant_id = '" . $searchrestaurantid . "' ";
            $fields .= "&searchrestaurantid=$_REQUEST[searchrestaurantid]$fields";
        }

        if (isset($_REQUEST['type']) && !empty($_REQUEST['type']) && $_REQUEST['type'] ==
            'CO')
        {
            $cond .= " AND ro.usertype = 'C'";
            $cond_cnt .= " AND usertype = 'C' ";
        } elseif (isset($_REQUEST['type']) && !empty($_REQUEST['type']) && $_REQUEST['type'] ==
        'GO')
        {
            $cond .= " AND ro.usertype = 'G'";
            $cond_cnt .= " AND usertype = 'G' ";
        }

        $sql_sel = "SELECT " .
            "ro.id,ro.bookinggenerateid, ro.num_guests, ro.booking_date, ro.booking_time, ro.restaurant_id, ro.booking_name, ro.booking_email, ro.booking_mobileno, ro.addeddate,ro.bookingstatus, ro.status,  " .
            " res.restaurant_name " . " FROM " . $CFG['table']['restaurant_booking'] .
            " AS ro " . " LEFT JOIN " . $CFG['table']['restaurant'] .
            " AS res ON ro.restaurant_id = res.restaurant_id " .
            " WHERE ro.restaurant_id != '0' AND ro.id IS NOT NULL " . $cond . " " . $rest_cond .
            " " . $condition . " " . $sort . " ";

        #echo $sql_sel;
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');

        $targetpage = "restaurantBookingManage.php";
        //$targetpage =  "restaurantDetails.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt . '.';

            $orderList[] = $row_seller;
            $cnt++;
        }
        #echo "<pre>";print_r($orderList);echo "</pre>";
        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        $admin_smarty->assign("tablename", $CFG['table']['restaurant_booking']);
         $admin_smarty->assign("whereField", 'id');
        $admin_smarty->assign("order_list", $orderList);
        $admin_smarty->assign("fieldname", 'status');
        $admin_smarty->assign("fieldname1", 'bookingstatus');
        $admin_smarty->assign("word", 'Booking');
        $admin_smarty->assign("filename", 'restaurantBookingManage.php');
        //$admin_smarty->assign("filename",'restaurantDetails.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        #Statistics
        /*
        $tot_ord	 	 = $this->getNumvalues($CFG['table']['order'],"restaurant_id != '' ".$cond_cnt." ");
        $delivered_ord	 = $this->getNumvalues($CFG['table']['order'],"status = 'completed' AND restaurant_id != '0' ".$cond_cnt." ");
        $processing_ord  = $this->getNumvalues($CFG['table']['order'],"status = 'processing' AND restaurant_id != '0' ".$cond_cnt." ");
        $pending_ord     = $this->getNumvalues($CFG['table']['order'],"status = 'pending' AND restaurant_id != '0' ".$cond_cnt." ");
        $failed_ord      = $this->getNumvalues($CFG['table']['order'],"status = 'failed' AND restaurant_id != '0' ".$cond_cnt." ");
        
        $objSmarty->assign("ordersList_orderCnt", $tot_ord);
        $objSmarty->assign("delivered_ord", $delivered_ord);
        $objSmarty->assign("processing_ord", $processing_ord);
        $objSmarty->assign("pending_ord", $pending_ord);
        $objSmarty->assign("failed_ord", $failed_ord);*/

        $admin_smarty->assign("order_list", $orderList);
        $admin_smarty->assign("pagination", $next_page);
    }

    #-------------------------------------------------------------------------------------
    #Booking View Full Details
    /**
     * AdminRestaurantMgmt::bookingViewFullDetails()
     * 
     * @param mixed $booking_id
     * @return
     */
    function bookingViewFullDetails($booking_id)
    {
        global $CFG, $admin_smarty;

        $sel_order = "SELECT ro.id, ro.num_guests, ro.booking_date, ro.booking_time, ro.restaurant_id, ro.booking_name, ro.booking_email, ro.booking_phoneno,ro.booking_ext, ro.booking_instruction , ro.booking_mobileno, ro.addeddate, ro.status, res.restaurant_name FROM " .
            $CFG['table']['restaurant_booking'] . " AS ro " . " LEFT JOIN " . $CFG['table']['restaurant'] .
            " AS res ON ro.restaurant_id = res.restaurant_id " .
            " WHERE ro.restaurant_id != '0' AND ro.id = '" . $this->filterInput($booking_id) . "' ";
        $res_order = $this->ExecuteQuery($sel_order, 'select');

        $admin_smarty->assign('orderDetails', $res_order);
    }
    #--------------------------------------------------------------------------------
    #--------------------------------------------------------------------------------
    #Export Booking list
    /**
     * AdminRestaurantMgmt::exportBookings()
     * 
     * @return
     */
    function exportBookings()
    {
        global $CFG;

        #File name
        $file_name = "Menu_" . date("dmY-His");
        $export_val_arr = array(
            'restaurant_id',
            'num_guests',
            'booking_date',
            'booking_time',
            'booking_name',
            'booking_email',
            'booking_mobileno',
            'booking_phoneno',
            'booking_instruction');

        #Table
        $selectfld = " restaurant_id, num_guests, booking_date, booking_time, booking_name, booking_email, booking_mobileno, booking_phoneno, booking_instruction";
        $tablename = $CFG['table']['restaurant_booking'];
        $tblcondition = "status = '1' ORDER BY id ASC";
        $table_arr = array(
            $selectfld,
            $tablename,
            $tblcondition);

        #CSV
        $csv_heading_arr = array(
            "Res Id",
            "Num of Guests",
            "Booking Date",
            "Booking Time",
            "Booking Name",
            "Booking Email",
            "Booking Mobile",
            "Booking Phone",
            "Booking Instruction");

        #Xls
        $xls_heading_arr = "Res Id\tNum of Guests\tBooking Date\tBooking Time\tBooking Name\tBooking Email\tBooking Mobile\tBooking Phone\Booking Instruction";

        $this->exportProcessCSVXLS($file_name, $table_arr, $export_val_arr, $csv_heading_arr,
            $xls_heading_arr);
    }
    #--------------------------------------------------------------------------------
    #Import Booking List
    /**
     * AdminRestaurantMgmt::importBookings()
     * 
     * @return
     */
    function importBookings()
    {
        global $CFG;

        $tablename = $CFG['table']['restaurant_booking'];
        $dbfields = array(
            'restaurant_id',
            'num_guests',
            'booking_date',
            'booking_time',
            'booking_name',
            'booking_email',
            'booking_mobileno',
            'booking_phoneno',
            'booking_instruction');
        $filename = "restaurantBookingManage.php";

        $this->importProcessCSV($tablename, $dbfields, $filename);
    }
    #-------------------------------------------------------------------------
    #Order List
    /**
     * AdminRestaurantMgmt::commissionOrderList()
     * 
     * @param mixed $resid
     * @return
     */
    function commissionOrderList($resid)
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);
        $searchrestaurantid = $this->filterInput($_REQUEST['searchrestaurantid']);
        $resid              = $this->filterInput($_GET['resid']);

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'tasc')
        {
            $sort = " ORDER BY ro.ordertotalprice ASC";
            $fields .= "&sortby=tasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'tdesc')
        {
            $sort = " ORDER BY ro.ordertotalprice DESC";
            $fields .= "&sortby=tdesc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resasc')
        {
            $sort = " ORDER BY res.restaurant_name ASC";
            $fields .= "&sortby=resasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resdesc')
        {
            $sort = " ORDER BY res.restaurant_name DESC";
            $fields .= "&sortby=resdesc";
        } else
        {
            //$sort .= " ORDER BY ro.customername ASC";
            $sort .= " ORDER BY ro.orderid DESC";
        }

        #List
        if (isset($_REQUEST['report']) && !empty($_REQUEST['report']))
        {

            if ($_REQUEST['report'] == "Today")
            {
                $today = date("Y-m-d");
                $condition .= " AND DATE_FORMAT(res_order_delivereddate,'%Y-%m-%d') = '" . $today .
                    "'";
            } elseif ($_REQUEST['report'] == "ThisWeek")
            {
                $condition .= " AND WEEK('" . CUR_TIME .
                    "',7) = WEEK(res_order_delivereddate,7) AND DATEDIFF('" . CUR_TIME .
                    "',res_order_delivereddate)<7";
            } elseif ($_REQUEST['report'] == "LastWeek")
            {

                $lastweek = date("d-m-Y", strtotime('-1 week'));
                $date = $this->week_from_monday($lastweek);
                $weekdate = implode(",", $date);

                $condition .= " AND (
							DATE_FORMAT(res_order_delivereddate,'%Y-%m-%d')='$date[0]' OR 
							DATE_FORMAT(res_order_delivereddate,'%Y-%m-%d')='$date[1]' OR 
							DATE_FORMAT(res_order_delivereddate,'%Y-%m-%d')='$date[2]' OR 
							DATE_FORMAT(res_order_delivereddate,'%Y-%m-%d')='$date[3]' OR 
							DATE_FORMAT(res_order_delivereddate,'%Y-%m-%d')='$date[4]' OR 
							DATE_FORMAT(res_order_delivereddate,'%Y-%m-%d')='$date[5]' OR
							DATE_FORMAT(res_order_delivereddate,'%Y-%m-%d')='$date[6]' ) ";
            } elseif ($_REQUEST['report'] == "LastMonth")
            {
                $lastmonth = date("Y-m", strtotime("-1 month"));
                $condition .= " AND DATE_FORMAT(res_order_delivereddate,'%Y-%m')='" . $lastmonth .
                    "'";
            } elseif ($_REQUEST['report'] == "ThisMonth")
            {
                $currentmonth = date("Y-m");
                $condition .= " AND DATE_FORMAT(res_order_delivereddate,'%Y-%m')='" . $currentmonth .
                    "'";
            } elseif ($_REQUEST['report'] == "ThisYear")
            {
                $currentyear = date("Y");
                $condition .= " AND DATE_FORMAT(res_order_delivereddate,'%Y')='" . $currentyear .
                    "'";
            } elseif ($_REQUEST['report'] == "LastYear")
            {
                $lastyear = date("Y", strtotime("-1 year"));
                $condition .= " AND DATE_FORMAT(res_order_delivereddate,'%Y')='" . $lastyear .
                    "'";
            }
        }

        #Datewise List
        if (isset($_REQUEST['report_from']) && !empty($_REQUEST['report_from']) && isset
            ($_REQUEST['report_to']) && !empty($_REQUEST['report_to']))
        {
            //Delivered date List from datewise
            $stdate = $this->filterInput($_REQUEST['report_from']);
            list($day, $month, $year) = explode("-", $stdate);
            $startdate = $year . '-' . $month . '-' . $day;

            $enddate = $this->filterInput($_REQUEST['report_to']);
            list($day, $month, $year) = explode("-", $enddate);
            $end_date = $year . '-' . $month . '-' . $day;

            $condition .= " AND  res_order_delivereddate BETWEEN '" . $startdate . "' AND '" .
                $end_date . "' ";
            $cond_cnt .= " AND  res_order_delivereddate BETWEEN '" . $startdate . "' AND '" .
                $end_date . "' ";
        }


        #Limit
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND restaurant_name LIKE '%" . addslashes($req_keyword) .
                "%' ";
            $fields .= "&keyword=$_REQUEST[keyword]$fields";
        }

        if (isset($resid) && !empty($resid))
        {
            $fields .= "&resid=$_REQUEST[resid]$fields";
        }

        if (isset($_REQUEST['type']) && !empty($_REQUEST['type']))
        {
            $fields .= "&type=$_REQUEST[type]$fields";
        }

        if (isset($resid) && !empty($resid))
        {
            $rest_cond = " AND ro.restaurant_id = '" . $resid . "' ";
            $rest_cond1 = " AND restaurant_id = '" . $resid . "' ";

            $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                "restaurant_id = '" . $resid . "'");
            $admin_smarty->assign("restname", $restname);
        }

        if (isset($searchrestaurantid) && !empty($searchrestaurantid))
        {
            $condition .= " AND res.restaurant_id = '" . $searchrestaurantid .
                "' ";
            $rest_cond1 .= " AND restaurant_id = '" . $searchrestaurantid . "' ";
            $fields .= "&searchrestaurantid=$_REQUEST[searchrestaurantid]$fields";
        }

        $sql_sel = "SELECT " .
            "ro.orderid, ro.ordergenerateid, ro.deliverydoornumber, ro.deliverystreet, ro.restaurant_id, ro.ordertotalprice, ro.status, ro.orderdate, ro.payment_type, ro.foodassoonas, ro.deliverydate, ro.deliverytime, ro.deliverytype, ro.res_comm_perchantage, ro.res_comm_price, ro.res_order_delivereddate, " .
            " ro.customername, ro.customeremail, ro.customercellphone, " .
            " res.restaurant_name " . " FROM " . $CFG['table']['order'] . " AS ro " .
            " RIGHT JOIN " . $CFG['table']['restaurant'] .
            " AS res ON res.restaurant_id = ro.restaurant_id " .
            " WHERE ro.restaurant_id != '0' AND ro.paypal_status = 'success' AND ro.status = 'completed' AND orderid IS NOT NULL " .
            $cond . " " . $rest_cond . " " . $condition . " " . $sort . " ";

        #echo $sql_sel;
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');
        $targetpage = "commissionOrderManage.php";
        //$targetpage =  "restaurantDetails.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt . '.';

            $total[] = $row_seller['ordertotalprice'];
            $commprice[] = $row_seller['res_comm_price'];

            $orderList[] = $row_seller;
            $cnt++;
        }

        if (!empty($total))
        {
            $sales = str_replace(",", "", $total);
            $salesprice = array_sum($sales);
        }
        if (!empty($commprice))
        {
            $commsales = str_replace(",", "", $commprice);
            $commsalesprice = array_sum($commsales);
        }

        #echo "<pre>";print_r($orderList);echo "</pre>";
        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        $admin_smarty->assign("tablename", $CFG['table']['order']);
        $admin_smarty->assign("whereField", 'orderid');
        $admin_smarty->assign("fieldname", 'status');
        $admin_smarty->assign("word", 'Order');
        $admin_smarty->assign("filename", 'commissionOrderManage.php');
        //$admin_smarty->assign("filename",'restaurantDetails.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        $admin_smarty->assign("totalsalesprice", number_format($salesprice, 2));
        $admin_smarty->assign("totalsalesCommissionprice", number_format($commsalesprice,
            2));

        /*#Statistics
        $tot_ord	 	 = $this->getNumvalues($CFG['table']['order'],"restaurant_id != '' AND paypal_status = 'success' ".$cond_cnt." ");
        $delivered_ord	 = $this->getNumvalues($CFG['table']['order'],"status = 'completed' AND restaurant_id != '0' AND paypal_status = 'success' ".$cond_cnt." ");
        $processing_ord  = $this->getNumvalues($CFG['table']['order'],"status = 'processing' AND restaurant_id != '0' AND paypal_status = 'success' ".$cond_cnt." ");
        $pending_ord     = $this->getNumvalues($CFG['table']['order'],"status = 'pending' AND restaurant_id != '0' AND paypal_status = 'success' ".$cond_cnt." ");
        $failed_ord      = $this->getNumvalues($CFG['table']['order'],"status = 'failed' AND restaurant_id != '0' AND paypal_status = 'success' ".$cond_cnt." ");
        
        $admin_smarty->assign("ordersList_orderCnt", $tot_ord);
        $admin_smarty->assign("delivered_ord", $delivered_ord);
        $admin_smarty->assign("processing_ord", $processing_ord);
        $admin_smarty->assign("pending_ord", $pending_ord);
        $admin_smarty->assign("failed_ord", $failed_ord);*/

        $admin_smarty->assign("order_list", $orderList);
        $admin_smarty->assign("pagination", $next_page);
    }

    #Check Whether the emailid is already exist or not
    /**
     * AdminRestaurantMgmt::checkResEmailAlreadyExist()
     * 
     * @return
     */
   /* function checkResEmailAlreadyExist()
    {
        global $CFG, $objSmarty, $admin_smarty;

        $restaurant_contact_email = $this->filterInput($_POST['restaurant_contact_email']);
        $eid = $this->filterInput($_POST['eid']);

        if (isset($eid) && !empty($eid))
        {
            $whercon = " AND restaurant_id != '" . $eid . "' ";
        }

        $noofrows = $this->getNumvalues($CFG['table']['restaurant'],
            "restaurant_contact_email = '" . $restaurant_contact_email . "' " . $whercon .
            " ");
        #echo $noofrows;
        if ($noofrows > 0)
        {
            echo "exist";
        }
    }*/
    function checkResEmailAlreadyExist(){
		global $CFG,$objSmarty;
		//echo "<pre>";print_r($_REQUEST);echo "</pre>";
		$restaurant_id = $this->filterInput($_REQUEST['rid']);
		$email = $this->getMultiValue("restaurant_name,restaurant_id",$CFG['table']['restaurant'],"restaurant_contact_email = '".$this->filterInput($_REQUEST['restaurant_contact_email'])."'");
		//echo "<pre>";print_r($email);echo "</pre>";
		$email = $this->getMultiValue("restaurant_name,restaurant_id,restaurant_contact_email",$CFG['table']['restaurant'],"restaurant_contact_email = '".$this->filterInput($_REQUEST['restaurant_contact_email'])."'");
		//echo "<pre>";print_r($email);echo "</pre>";
		if( isset($_REQUEST['rid']) && !empty($_REQUEST['rid']) ){
			$countresname		=	$this->getNumvalues($CFG['table']['restaurant']," restaurant_name = '".addslashes($this->filterInput($_REQUEST['restaurant_name']))."' AND restaurant_id != '".$restaurant_id."' ");
			$countresemail		=   $this->getNumvalues($CFG['table']['restaurant']," restaurant_contact_email = '".$this->filterInput($_REQUEST['restaurant_contact_email'])."' AND restaurant_id != '".$restaurant_id."' " );
			
			//echo $countresemail;
			
			if($countresname != '0' && $countresemail == '0'){
				echo "resAlready";
			}
			else if($countresemail != '0' && $countresname == '0'){
				echo "emailAlready";
			}
			else if($countresname != '0' && $countresemail != '0'){
				echo "resemailAlready";
			}
			else{
				echo "success";
			}
			
		}else{
			
			$countresname		=	$this->getNumvalues($CFG['table']['restaurant']," restaurant_name = '".addslashes($this->filterInput($_REQUEST['restaurant_name']))."'  ");
			$countresemail		=   $this->getNumvalues($CFG['table']['restaurant']," restaurant_contact_email = '".$this->filterInput($_REQUEST['restaurant_contact_email'])."' " );
			if($countresname != '0' && $countresemail == '0'){
				echo "resAlready";
			}
			else if($countresemail != '0' && $countresname == '0'){
				echo "emailAlready";
			}
			else if($countresname != '0' && $countresemail != '0'){
				echo "resemailAlready";
			}
			else{
				echo "success";
			}
		}	
	}

     #CheckwithOffer Already Exist or not
     function offerAlreadyCheck(){
        
            global $CFG,$admin_smarty;
            
           //echo "<pre>";print_r($_POST);echo "</pre>";
                    
            $toDate     = $this->getValue('offer_valid_to', $CFG['table']['restaurant_offer'],"restaurant_id = '" . $this->filterInput($_POST['restaurant_name']) . "' AND status = '1' ");
            list($day,$month,$year) = explode("-",$_POST['offer_valid_to']);
		    $enddate = $day.'-'.$month.'-'.$year;  
            $toDate     = strtotime($toDate);
            $nowToDate     = strtotime($enddate);
                    
            if($nowToDate < $toDate){
                echo "Already";
            }else{
                echo "Nooffer";
            }       
     }
     #
     function offerEditAlreadyCheck(){
        
          global $CFG,$admin_smarty;
          
          $toDate     = $this->getValue('offer_valid_to', $CFG['table']['restaurant_offer'],"restaurant_id = '" . $this->filterInput($_POST['restaurant_name']) . "' AND status = '1' and offer_id != '".$this->filterInput($_POST['offer_id'])."' ");
            
            list($month,$day,$year) = explode("-",$_POST['offer_valid_to']);
		    $enddate = $day.'-'.$month.'-'.$year;   
            $nowToDate     = strtotime($enddate);
            $toDate     = strtotime($toDate);
                  
            if($nowToDate < $toDate){
                echo "Already";
            }else{
                echo "Nooffer";
            }  
     }
     
     #Get the Details for View the Map
     function addMapViewDetails() {
        global $CFG,$admin_smarty;
        
        $street  = $this->filterInput($_POST['street']);
        $state   = $this->filterInput($_POST['state']);
        $city    = $this->filterInput($_POST['city']);
        $zip     = $this->filterInput($_POST['zip']);
        
        $stateVal = $this->getValue("statename", $CFG['table']['state'], " statecode = '".$state."'");
        $cityVal  = $this->getValue("cityname", $CFG['table']['city'], " city_id = '".$city."'");
        
        $restaurant_address_map = $this->findFullAddress($street, $zip, $cityVal, $stateVal);
        echo $restaurant_address_map;
     }
     
     #Voucher Code Concepts
     /**
     * Voucher Code Manage
     */
    function voucherCodeManage()
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);
        
        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
            $condition .= " AND status = '1' ";
            $fields .= "&sortby=active";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
            $condition .= " AND status = '0' ";
            $fields .= "&sortby=deactive";
        }
        
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] != "all")){
            $limit = $_REQUEST['limit'];
            $fields .= "&limit=$_REQUEST[limit]";
        }else{
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all")){
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else{
            $sql_lim = "$start, $limit";
        }
        
        #Keyword
        if (isset($req_keyword) && !empty($req_keyword)){
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND voucher_name LIKE '%".$this->filterInput($req_keyword)."%' ";
            $fields .= "&keyword=$_REQUEST[keyword]";
        }
        
        $sqlSel = "SELECT id, voucher_name, use_type, off_type, off_price_percentage, valid_from, valid_to, status, addeddate FROM ".$CFG['table']['voucher']." WHERE voucher_name != '' $condition ORDER BY addeddate DESC";
        $total_pages = $this->ExecuteQuery($sqlSel, 'norows');
        
        $targetpage  = 'voucherManage.php';
        $next_page   = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit   = $sqlSel . " LIMIT " . $sql_lim;
        $result      = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt         = 1;
        while ($row_seller = mysqli_fetch_array($result)){
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt . '.';
            #Date Format
            //$row_seller['valid_from'] = date('d-m-Y',$row_seller['valid_from']);
            //$row_seller['valid_to']   = date('d-m-Y',$row_seller['valid_to']);
            
            $voucherList[] = $row_seller;
           //echo "<pre>"; print_r($row_seller);echo "</pre>";
            $cnt++;
        }
        
        #From & To Records
        if ($page == 1){
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else{
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }
        
        $admin_smarty->assign("tablename", $CFG['table']['voucher']);
        $admin_smarty->assign("whereField", 'id');
        $admin_smarty->assign("fieldname", 'status');
        $admin_smarty->assign("word", 'voucher');
        
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);
        
        $admin_smarty->assign("voucherList", $voucherList);
        $admin_smarty->assign("pagination", $next_page);
        
        $admin_smarty->assign('active',$this->getNumvalues($CFG['table']['voucher'],"status = '1'"));
        $admin_smarty->assign('deactive',$this->getNumvalues($CFG['table']['voucher'],"status = '0'"));
    
    }
    /**
     * Edit Voucher Code
     */
   /**
     * Add/Edit Voucher Code
     */
    function voucherAddEdit()
    {
        global $CFG, $admin_smarty;
        
        $voucherId      = trim($this->filterInput($_POST['AddEdit']));
        $voucherCode    = $this->filterInput($_POST['voucherCode']);
        $useType        = trim($this->filterInput($_POST['useType']));
        $offType        = trim($this->filterInput($_POST['offType']));
        $offPrice       = trim($this->filterInput($_POST['offPrice']));
        
       // $validFrom      = strtotime($_POST['validFrom'].' 00:00:01');
        //$validTo        = strtotime($_POST['validTo'].' 23:59:59');
        list($day,$month,$year) = explode("-",$_POST['validFrom']);
		$startdate = $year.'-'.$month.'-'.$day;
        
        
        list($day,$month,$year) = explode("-",$_POST['validTo']);
		$enddate = $year.'-'.$month.'-'.$day;     
        
        $validFrom = date('Y-m-d', strtotime($this->filterInput($startdate)));
		$validTo   = date('Y-m-d', strtotime($this->filterInput($enddate)));
        $resId     = $_POST['restaurantList'];
      
        
        if (!empty($resId) && is_array($resId) && $voucherId == '') {
            #Insert voucher code
            $voucherIns = " INSERT INTO 
                                        ".$CFG['table']['voucher']." 
                                    SET
                                        voucher_name            = '".$voucherCode."',
                                        use_type                = '".$useType."',
                                        off_type                = '".$offType."',
                                        off_price_percentage    = '".$offPrice."',
                                        valid_from              = '".$validFrom."',
                                        valid_to                = '".$validTo."',
                                        addeddate               = '".CUR_TIME."' ";
           $voucherRes = $this->ExecuteQuery($voucherIns,'insert');
           // echo $voucherIns;
            //exit;
            if ($voucherRes) {
                $subIns = '';
                foreach ($resId as $key=>$value) {
                    $subIns .= "('".$voucherRes."', '".$value."'),";
                }
                if ($subIns != '') {
                    #Insert restauant by v oucher id
                    $resIns = "INSERT INTO ".$CFG['table']['restaurant_voucher']." (voucher_id, restaurant_id) VALUES ".trim($subIns,',')."";
                    $this->ExecuteQuery($resIns,'insert');
                }
            }
            $this->redirectUrl('voucherManage.php');
        } elseif (!empty($resId) && is_array($resId) && $voucherId != '') {
            #Update Vocher Code
            $voucherUp = "UPDATE
                                ".$CFG['table']['voucher']."
                            SET
                                voucher_name            = '".$voucherCode."',
                                use_type                = '".$useType."',
                                off_type                = '".$offType."',
                                off_price_percentage    = '".$offPrice."',
                                valid_from              = '".$validFrom."',
                                valid_to                = '".$validTo."'
                            WHERE
                                id                      = '".$voucherId."' ";
            $this->ExecuteQuery($voucherUp,'update');
            #Delete restaurant by Voucher id
            $delRes = "DELETE FROM ".$CFG['table']['restaurant_voucher']." WHERE voucher_id = '".$voucherId."'";
            $this->ExecuteQuery($delRes,'delete');
            #Insert restaurant by voucher id
            $subIns = '';
            foreach ($resId as $key=>$value) {
                $subIns .= "('".$voucherId."', '".$value."'),";
            }
            if ($subIns != '') {
                $resIns = "INSERT INTO ".$CFG['table']['restaurant_voucher']." (voucher_id, restaurant_id) VALUES ".trim($subIns,',')."";
                $this->ExecuteQuery($resIns,'insert');
            }
            $this->redirectUrl('voucherManage.php');
        }
    }  
    
    /**
     * Edit Voucher Code
     */
    function voucherCodeDetails($vid)
    {
        global $CFG, $admin_smarty;
        
        if ($vid != '') {
            $voucherDet = $this->getMultiValue('id, voucher_name, use_type, off_type, off_price_percentage, valid_from, valid_to', $CFG['table']['voucher'],"id='".$vid."'");
            /*$voucherDet[0]['valid_from'] = date('d-m-Y',$voucherDet[0]['valid_from']);
            $voucherDet[0]['valid_to']   = date('d-m-Y',$voucherDet[0]['valid_to']);*/
            $resList = $this->getMultiValue('restaurant_id',$CFG['table']['restaurant_voucher'],"voucher_id='".$vid."'");
        }
        
        $admin_smarty->assign('voucherDet',$voucherDet);
        $admin_smarty->assign('resList',$resList);
    } 

    function checkVoucherCode() {
        global $CFG, $admin_smarty;

        $voucherCount = $this->getNumvalues($CFG['table']['voucher'],"voucher_name = '" . $this->filterInput($_REQUEST['coupon']) . "'");
        echo $voucherCount;

    }
    
} #End Of Class..


?>