<?php

/**
 * SearchDetails
 * 
 * @package   
 * @author 
 * @copyright gencyolcu
 * @version 2014
 * @access public
 */
class SearchDetails extends Site
{
    #--------------------------------------------------------------------------------
    #Search Result
    /**
     * SearchDetails::restaurantDetails()
     * 
     * @return
     */
    function restaurantDetails()
    {   
       
        global $CFG, $objSmarty;

        $resid              = $this->filterInput($_REQUEST['resid']);
        $resname            = $this->filterInput($_REQUEST['resname']);
        
        $get_res_detail = 0; 
        if ( isset($resid) && !empty($resid) && isset($resname) && !empty($resname) && $CFG['site']['fb_domain_name']!='fb' )
        {
            $res_det_status =  $this->getValue( "restaurant_status", $CFG['table']['restaurant'], "restaurant_id = '".$resid."' AND restaurant_seourl = '".$resname."' AND delete_status = 'No' ");
            $get_res_detail = $this->getNumvalues( $CFG['table']['restaurant'], "restaurant_id = '".$resid."' AND restaurant_seourl = '".$resname."' ");
        } else {
            $res_det_status =  $this->getValue( "restaurant_status", $CFG['table']['restaurant'], "restaurant_id = '".$this->filterInput($_REQUEST['resid'])."' AND delete_status = 'No' ");
            $get_res_detail = $this->getNumvalues( $CFG['table']['restaurant'], "restaurant_id = '".$this->filterInput($_REQUEST['resid'])."'  ");
        }
        
        if ($res_det_status == 1 && $get_res_detail == 1) {
            
            if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
            {
                $condition .= " AND rest.restaurant_id = '" . $this->filterInput($_REQUEST['resid']) . "' ";
            }
            if (isset($_REQUEST['resname']) && !empty($_REQUEST['resname']))
            {
                $condition .= " AND rest.restaurant_seourl = '" . $this->filterInput($_REQUEST['resname']) . "' ";
            }
            $sort = " ORDER BY rest.restaurant_id ASC";
    
            $day = date("l");
    
            if ($day == "Monday")
            {
                $open_close_time_cond = ", re.mon_firstopen_time AS open_time, re.mon_firstclose_time AS close_time, re.tue_firstopen_time, re.tue_firstclose_time, re.wed_firstopen_time, re.wed_firstclose_time, re.thu_firstopen_time, re.thu_firstclose_time, re.fri_firstopen_time, re.fri_firstclose_time, re.sat_firstopen_time, re.sat_firstclose_time, re.sun_firstopen_time, re.sun_firstclose_time, re.mon_secondopen_time AS secopen_time, re.mon_secondclose_time AS secclose_time,re.tue_secondopen_time, re.tue_secondclose_time, re.wed_secondopen_time, re.wed_secondclose_time, re.thu_secondopen_time, re.thu_secondclose_time, re.fri_secondopen_time, re.fri_secondclose_time, re.sat_secondopen_time, re.sat_secondclose_time, re.sun_secondopen_time, re.sun_secondclose_time, re.sun_firstopen_time AS first_pre_open_time, re.sun_firstclose_time AS first_pre_close_time, re.sun_secondopen_time AS sec_pre_open_time, re.sun_secondclose_time AS sec_pre_close_time, ";
            } elseif ($day == "Tuesday")
            {
                $open_close_time_cond = ", re.mon_firstopen_time, re.mon_firstclose_time, re.tue_firstopen_time AS open_time, re.tue_firstclose_time AS close_time, re.wed_firstopen_time, re.wed_firstclose_time, re.thu_firstopen_time, re.thu_firstclose_time, re.fri_firstopen_time, re.fri_firstclose_time, re.sat_firstopen_time, re.sat_firstclose_time, re.sun_firstopen_time, re.sun_firstclose_time, re.mon_secondopen_time, re.mon_secondclose_time,re.tue_secondopen_time AS secopen_time, re.tue_secondclose_time AS secclose_time, re.wed_secondopen_time, re.wed_secondclose_time, re.thu_secondopen_time, re.thu_secondclose_time, re.fri_secondopen_time, re.fri_secondclose_time, re.sat_secondopen_time, re.sat_secondclose_time, re.sun_secondopen_time, re.sun_secondclose_time,  re.mon_firstopen_time AS first_pre_open_time, re.mon_firstclose_time AS first_pre_close_time, re.mon_secondopen_time AS sec_pre_open_time, re.mon_secondclose_time AS sec_pre_close_time, ";
            } elseif ($day == "Wednesday")
            {
                $open_close_time_cond = ", re.mon_firstopen_time, re.mon_firstclose_time, re.tue_firstopen_time, re.tue_firstclose_time, re.wed_firstopen_time AS open_time, re.wed_firstclose_time AS close_time, re.thu_firstopen_time, re.thu_firstclose_time, re.fri_firstopen_time, re.fri_firstclose_time, re.sat_firstopen_time, re.sat_firstclose_time, re.sun_firstopen_time, re.sun_firstclose_time, re.mon_secondopen_time, re.mon_secondclose_time,re.tue_secondopen_time, re.tue_secondclose_time, re.wed_secondopen_time AS secopen_time, re.wed_secondclose_time AS secclose_time, re.thu_secondopen_time, re.thu_secondclose_time, re.fri_secondopen_time, re.fri_secondclose_time, re.sat_secondopen_time, re.sat_secondclose_time, re.sun_secondopen_time, re.sun_secondclose_time,  re.tue_firstopen_time AS first_pre_open_time, re.tue_firstclose_time AS first_pre_close_time, re.tue_secondopen_time AS sec_pre_open_time, re.tue_secondclose_time AS sec_pre_close_time, ";
            } elseif ($day == "Thursday")
            {
                $open_close_time_cond = ", re.mon_firstopen_time, re.mon_firstclose_time, re.tue_firstopen_time, re.tue_firstclose_time, re.wed_firstopen_time, re.wed_firstclose_time, re.thu_firstopen_time AS open_time, re.thu_firstclose_time AS close_time, re.fri_firstopen_time, re.fri_firstclose_time, re.sat_firstopen_time, re.sat_firstclose_time, re.sun_firstopen_time, re.sun_firstclose_time, re.mon_secondopen_time, re.mon_secondclose_time,re.tue_secondopen_time, re.tue_secondclose_time, re.wed_secondopen_time, re.wed_secondclose_time, re.thu_secondopen_time AS secopen_time, re.thu_secondclose_time AS secclose_time, re.fri_secondopen_time, re.fri_secondclose_time, re.sat_secondopen_time, re.sat_secondclose_time, re.sun_secondopen_time, re.sun_secondclose_time,  re.wed_firstopen_time AS first_pre_open_time, re.wed_firstclose_time AS first_pre_close_time, re.wed_secondopen_time AS sec_pre_open_time, re.wed_secondclose_time AS sec_pre_close_time, ";
            } elseif ($day == "Friday")
            {
                $open_close_time_cond = ", re.mon_firstopen_time, re.mon_firstclose_time, re.tue_firstopen_time, re.tue_firstclose_time, re.wed_firstopen_time, re.wed_firstclose_time, re.thu_firstopen_time, re.thu_firstclose_time, re.fri_firstopen_time AS open_time, re.fri_firstclose_time AS close_time, re.sat_firstopen_time, re.sat_firstclose_time, re.sun_firstopen_time, re.sun_firstclose_time, re.mon_secondopen_time, re.mon_secondclose_time,re.tue_secondopen_time, re.tue_secondclose_time, re.wed_secondopen_time, re.wed_secondclose_time, re.thu_secondopen_time, re.thu_secondclose_time, re.fri_secondopen_time AS secopen_time, re.fri_secondclose_time AS secclose_time, re.sat_secondopen_time, re.sat_secondclose_time, re.sun_secondopen_time, re.sun_secondclose_time, re.thu_firstopen_time AS first_pre_open_time, re.thu_firstclose_time AS first_pre_close_time, re.thu_secondopen_time AS sec_pre_open_time, re.thu_secondclose_time AS sec_pre_close_time, ";
            } elseif ($day == "Saturday")
            {
                $open_close_time_cond = ", re.mon_firstopen_time, re.mon_firstclose_time, re.tue_firstopen_time, re.tue_firstclose_time, re.wed_firstopen_time, re.wed_firstclose_time, re.thu_firstopen_time, re.thu_firstclose_time, re.fri_firstopen_time, re.fri_firstclose_time, re.sat_firstopen_time AS open_time, re.sat_firstclose_time AS close_time, re.sun_firstopen_time, re.sun_firstclose_time, re.mon_secondopen_time, re.mon_secondclose_time,re.tue_secondopen_time, re.tue_secondclose_time, re.wed_secondopen_time, re.wed_secondclose_time, re.thu_secondopen_time, re.thu_secondclose_time, re.fri_secondopen_time, re.fri_secondclose_time, re.sat_secondopen_time AS secopen_time, re.sat_secondclose_time AS secclose_time, re.sun_secondopen_time, re.sun_secondclose_time, re.fri_firstopen_time AS first_pre_open_time, re.fri_firstclose_time AS first_pre_close_time, re.fri_secondopen_time AS sec_pre_open_time, re.fri_secondclose_time AS sec_pre_close_time, ";
            } elseif ($day == "Sunday")
            {
                $open_close_time_cond = ", re.mon_firstopen_time, re.mon_firstclose_time, re.tue_firstopen_time, re.tue_firstclose_time, re.wed_firstopen_time, re.wed_firstclose_time, re.thu_firstopen_time, re.thu_firstclose_time, re.fri_firstopen_time, re.fri_firstclose_time, re.sat_firstopen_time, re.sat_firstclose_time, re.sun_firstopen_time AS open_time, re.sun_firstclose_time  AS close_time, re.mon_secondopen_time, re.mon_secondclose_time,re.tue_secondopen_time, re.tue_secondclose_time, re.wed_secondopen_time, re.wed_secondclose_time, re.thu_secondopen_time, re.thu_secondclose_time, re.fri_secondopen_time, re.fri_secondclose_time, re.sat_secondopen_time, re.sat_secondclose_time, re.sun_secondopen_time AS secopen_time, re.sun_secondclose_time AS secclose_time, re.sat_firstopen_time AS first_pre_open_time, re.sat_firstclose_time AS first_pre_close_time, re.sat_secondopen_time AS sec_pre_open_time, re.sat_secondclose_time AS sec_pre_close_time, ";
            } else
            {
                $open_close_time_cond = ", re.mon_firstopen_time, re.mon_firstclose_time, re.tue_firstopen_time, re.tue_firstclose_time, re.wed_firstopen_time, re.wed_firstclose_time, re.thu_firstopen_time, re.thu_firstclose_time, re.fri_firstopen_time, re.fri_firstclose_time, re.sat_firstopen_time, re.sat_firstclose_time, re.sun_firstopen_time, re.sun_firstclose_time, re.mon_secondopen_time, re.mon_secondclose_time,re.tue_secondopen_time, re.tue_secondclose_time, re.wed_secondopen_time, re.wed_secondclose_time, re.thu_secondopen_time, re.thu_secondclose_time, re.fri_secondopen_time, re.fri_secondclose_time, re.sat_secondopen_time, re.sat_secondclose_time, re.sun_secondopen_time, re.sun_secondclose_time, ";
            }
    
            $sqlsel = "SELECT rest.restaurant_id,rest.restaurant_delivery_distance, rest.restaurant_name, rest.restaurant_seourl, rest.restaurant_phone, rest.restaurant_logo, rest.restaurant_website, rest.restaurant_fax, rest.restaurant_streetaddress, rest.restaurant_zip, rest.restaurant_contact_name, rest.restaurant_contact_phone, rest.restaurant_contact_email, rest.restaurant_description, rest.restaurant_estimated_time, rest.restaurant_delivery, rest.restaurant_delivery_charge, rest.restaurant_minorder_price, rest.restaurant_serving_cuisines, rest.restaurant_delivery_areas, rest.restaurant_displayoption, rest.restaurant_photos1, rest.restaurant_photos2, rest.restaurant_photos3, rest.restaurant_photos4, rest.restaurant_salestax, rest.restaurant_minorder_price, rest.restaurant_video, rest.restaurant_map, rest.res_marketbanner_option, rest.res_marketbanner_img_code, rest.restaurant_display_photo, rest.restaurant_display_video, rest.restaurant_display_banner, rest.restaurant_set_status,rest.restaurant_set_time,rest.restaurant_booktable,rest.restaurant_feature_status " .
                $open_close_time_cond . " cty.cityname, " . "state.statename,  resvoucher.voucher_id " . 
                " FROM " . $CFG['table']['restaurant'] ." AS rest " . 
                " LEFT JOIN " . $CFG['table']['restaurant_timing'] ." AS re ON rest.restaurant_id = re.restaurant_id " . 
                " LEFT JOIN " . $CFG['table']['city'] ." AS cty ON rest.restaurant_city = cty.city_id " .
                " LEFT JOIN " .$CFG['table']['restaurant_voucher']." AS resvoucher ON rest.restaurant_id = resvoucher.restaurant_id ".
                " LEFT JOIN " . $CFG['table']['state'] ." AS state ON rest.restaurant_state = state.statecode " .
                "	WHERE rest.restaurant_status = '1' ".$condition." ".$sort." LIMIT 1 ";	
    
            $sqlres = $this->ExecuteQuery($sqlsel, 'select');
            #echo "<pre>";print_r($sqlres);echo "</pre>";            
            $today = date("Y-m-d");
            $cond = "ORDER BY id DESC LIMIT 1"; 
    
            if (!empty($sqlres['0']['restaurant_serving_cuisines']))
            {
                $sqlres['0']['servingcuisine'] = $this->getArrayCuisinesInfo($sqlres['0']['restaurant_serving_cuisines']);
                
            }
            if (!empty($sqlres[0]['restaurant_delivery_areas']))
            {
                $sqlres['0']['servingareas'] = $this->getArrayAreas($sqlres['0']['restaurant_delivery_areas']);
            }

            if( !empty($sqlres[0]['restaurant_logo']) && file_exists($CFG['site']['photo_restaurant_path'].'/logo/'.$sqlres[0]['restaurant_logo']) ){
                $sqlres[0]['restaurant_logo'] = $CFG['site']['photo_restaurant_url'].'/logo/'.$sqlres[0]['restaurant_logo'];
            } else {
                $sqlres[0]['restaurant_logo'] = $CFG['site']['image_url'].'/no-image.jpg';
            }
    
            #---------Open & Close Time Start------------#
            #First Time
            $rrr_opentime = $sqlres['0']['open_time'];
            $rrr_closetime = $sqlres['0']['close_time'];
    
            #Previous day
            $rrr_opentime_pre = $sqlres['0']['first_pre_open_time'];
            $rrr_closetime_pre = $sqlres['0']['first_pre_close_time'];
    
            #Second Time
            $sec_rrr_opentime = $sqlres['0']['secopen_time'];
            $sec_rrr_closetime = $sqlres['0']['secclose_time'];
    
            #Previous day
            $sec_rrr_opentime_pre = $sqlres['0']['sec_pre_open_time'];
            $sec_rrr_closetime_pre = $sqlres['0']['sec_pre_close_time'];
    
            $sqlres['0']['first_status'] = $this->openandcloseRecursion($rrr_opentime, $rrr_closetime, $rrr_opentime_pre, $rrr_closetime_pre);
            $sqlres['0']['second_status'] = $this->openandcloseRecursion($sec_rrr_opentime, $sec_rrr_closetime, $sec_rrr_opentime_pre, $sec_rrr_closetime_pre);
    
            if ($sqlres['0']['first_status'] == 'Open' || $sqlres['0']['second_status'] == 'Open')
            {
                $sqlres['0']['status'] = 'Open';
            }
            elseif ($sqlres['0']['first_status'] == 'Preorder' || $sqlres['0']['second_status'] == 'Preorder')
            {
                $sqlres['0']['status'] = 'Preorder';
            }
            else
            {
                $sqlres['0']['status'] = 'Closed';
            }
            
            $objSmarty->assign("day", $day);
            $objSmarty->assign("searchrestaurantDetails", $sqlres);           
            $objSmarty->assign('novoucherdis', $novoucher);
            $objSmarty->assign('recvoucher', $voucherId);
            
            
    
            #For Google Map
            $res_straddress = $this->My_stripslashes($sqlres[0]['restaurant_streetaddress']);
            $res_area       = $this->My_stripslashes($sqlres[0]['areaname']);
            $res_city       = $this->My_stripslashes($sqlres[0]['cityname']);
            $res_state      = $this->My_stripslashes($sqlres[0]['statename']);
            list($reslat, $reslong) = $this->findLatLongFromAddress($res_straddress, $res_area, $res_city, $res_state, $country = '');
            $objSmarty->assign('reslattitude', $reslat);
            $objSmarty->assign('reslongtitude', $reslong);
            
    
            #Meta Tag
            $objSmarty->assign('Meta_Tag_Title', $this->My_stripslashes($sqlres['0']['restaurant_name']));
            $objSmarty->assign('Meta_Tag_Keyword', $this->My_stripslashes(strtolower($sqlres['0']['restaurant_name'])));
            $objSmarty->assign('Meta_Tag_Desc', $this->My_stripslashes(strtolower($sqlres['0']['restaurant_name'])));
        }
        $objSmarty->assign('get_res_detail', $get_res_detail);
        $objSmarty->assign('res_det_status', $res_det_status);
        //print_r($get_res_detail);
        //print_r($res_det_status);
        
        return true;
    }
    
    #--------------------------------------------------------------------------------
    #Res Voucher List
    /**
     * SearchDetails::resVoucherList()
     * 
     * @return
     */
     
     function resVoucherList($resid, $word) 
     {
        global $CFG, $objSmarty;
   
        $today = date("Y-m-d");
        
        $resvoucher = "SELECT voucher.id ,voucher.off_type,voucher.voucher_name,voucher.off_price_percentage, voucher.use_type, voucher.valid_from,voucher.valid_to, ". "resvoucher.voucher_id,resvoucher.restaurant_id " . 
        " FROM "  . $CFG['table']['voucher']. " AS voucher" . 
        " LEFT JOIN " .$CFG['table']['restaurant_voucher']. " AS resvoucher ON voucher.id = resvoucher.voucher_id AND resvoucher.restaurant_id = '".$this->filterInput($resid)."' " . 
        " WHERE voucher.status = '1' AND resvoucher.restaurant_id = '".$this->filterInput($resid)."' AND voucher.valid_from <= '" . $today ."' AND voucher.valid_to >= '" . $today . "' ".$cond."";
        $voucher = $this->ExecuteQuery($resvoucher, 'select');
        $objSmarty->assign('voucherdis', $voucher);
     }
    #--------------------------------------------------------------------------------
    #Payment Method
    /**
     * SearchDetails::restaurantDetailsPaymentMethod()
     * 
     * @return
     */
    function restaurantDetailsPaymentMethod($resid)
    {
        global $CFG, $objSmarty;

        //echo "<pre>";print_r($_REQUEST['resid']);echo "</pre>";
        if (isset($resid) && !empty($resid))
        {
            $condition .= " AND respay.restaurant_id = '" . $this->filterInput($resid) . "' ";
        }
        $sel = "SELECT respay.paymentoption, respay.paymentmethod, " .
            " paymtd.paymentinfo_id, paymtd.paymentinfo_name, paymtd.paymentinfo_photo " .
            " FROM " . $CFG['table']['restaurant_choose_paymentoption'] . " as respay " .
            " INNER JOIN " . $CFG['table']['paymentinfo'] .
            " AS paymtd ON respay.paymentoption = paymtd.paymentinfo_id " .
            " WHERE paymtd.paymentinfo_status = '1' AND respay.status = '1' AND respay.paymentmethod='Yes' " .
            $condition . " GROUP BY paymtd.paymentinfo_id ORDER BY paymtd.paymentinfo_id ASC";
        $res = $this->ExecuteQuery($sel, 'select');
        foreach($res as $key => $value) {
            if( $res[$key]['paymentinfo_photo'] == '') {
                $res[$key]['paymentinfo_photo'] = $CFG['site']['image_url']."/no-image.jpg";
            } elseif ($res[$key]['paymentinfo_photo'] != '') {
                
            $logoexists  = $CFG['site']['photo_paymentinfo_path']."/".$res[$key]['paymentinfo_photo'];
            $res[$key]['paymentinfo_photo'] = (file_exists($logoexists)) ? $CFG['site']['photo_paymentinfo_url']."/".$res[$key]['paymentinfo_photo']:
                                                        $CFG['site']['image_url']."/no-image.jpg";
                                                      
            }
        }
        $objSmarty->assign("searchrestaurantDetailsPaymethod", $res);
        $objSmarty->assign("searchrestaurantDetailsPaymethod_cnt", count($res));
        
    }
    #--------------------------------------------------------------------------------
    #Category List
    /**
     * SearchDetails::categoryList()
     * 
     * @return
     */
    function categoryList()
    {
        global $CFG, $objSmarty;

        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $restaurantid = $this->filterInput($_REQUEST['resid']);
        }
        //$sel_veg = " SELECT menu.id, menu.menu_name, menu.menu_category, menu.menu_type, menu.menu_price, menu.menu_description, cat.maincateid, cat.maincatename AS catname " .
        //    " FROM " . $CFG['table']['restaurant_menu'] . " AS menu " . " LEFT JOIN " . $CFG['table']['category_main'] .
        //    " AS cat ON cat.maincateid = menu.menu_category " .
            //" WHERE menu.restaurant_id = '" . $restaurantid .
        //    " WHERE menu.restaurant_id = '" . "0" .
        //    "' AND  cat.delete_status = 'No' AND menu.status = '1' AND cat.status = '1' AND menu.delete_status = 'No'  GROUP BY menu.menu_category ORDER BY cat.sortorder ASC";
          
          $sel_veg = " SELECT cat.maincateid as cat_id, cat.maincatename AS cat_name, cat.maincateid" .
            " FROM " . $CFG['table']['restaurant_menu'] . " AS menu " . " LEFT JOIN " . $CFG['table']['category_main'] .
            " AS cat ON cat.maincateid = menu.menu_category " .
            //" WHERE menu.restaurant_id = '" . $restaurantid .
            " WHERE menu.restaurant_id = '" . "0" .
            "' AND  cat.delete_status = 'No' AND menu.status = '1' AND cat.status = '1' AND menu.delete_status = 'No'  GROUP BY menu.menu_category ORDER BY cat.sortorder ASC";
            
            
        $sql_res = $this->ExecuteQuery($sel_veg, 'select');

        $objSmarty->assign("catid", $_REQUEST['catid']);
        $objSmarty->assign("categoryList", $sql_res);
        //echo "categoryList: <br>";
        //print_r($sql_res);
        //echo $_REQUEST['resid'];
    }
    #--------------------------------------------------------------------------------
    #Category Menu List
    /**
     * SearchDetails::categoryMenuList()
     * 
     * @param mixed $catid
     * @param mixed $searchname
     * @return
     */
    function categoryMenuList($catid, $searchname)
    {   
       // echo $catid;
        //echo $searchname;
        global $CFG, $objSmarty;
        
        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $restaurantid = $this->filterInput($_REQUEST['resid']);
        }

        #Popular menu list
        if (isset($_REQUEST['popular']) && !empty($_REQUEST['popular']))
        {
            $cond .= " AND menu_popular_dish = '" . $this->filterInput($_REQUEST['popular']) . "'";
        }
        #Spicy
        if (isset($_REQUEST['spicy']) && !empty($_REQUEST['spicy']))
        {
            $cond .= " AND menu_spicy = '" . $this->filterInput($_REQUEST['spicy']) . "'";
        }
        if ((isset($_REQUEST['nonveg']) && !empty($_REQUEST['nonveg'])) && (isset($_REQUEST['veg']) &&
            !empty($_REQUEST['veg'])))
        {
            $cond .= " AND (menu_type = 'veg' OR menu_type = 'nonveg') ";
        } else
        {
            if (isset($_REQUEST['nonveg']) && !empty($_REQUEST['nonveg']))
            {
                $cond .= " AND menu_type = 'nonveg' ";
            }
            if (isset($_REQUEST['veg']) && !empty($_REQUEST['veg']))
            {
                $cond .= " AND menu_type = 'veg' ";
            }
        }

        if (isset($searchname) && !empty($searchname))
        {

            $cond .= "AND menu_name LIKE '%" . $this->filterInput($searchname) . "%'";
        }


        $sel_menu = "SELECT id, menu_name, menu_category, menu_type, menu_price, menu_description, menu_popular_dish, menu_spicy, menu_photo,delete_status FROM " .
            //$CFG['table']['restaurant_menu'] . " WHERE restaurant_id = '" . $restaurantid .
            $CFG['table']['restaurant_menu'] . " WHERE restaurant_id = '0' " .
            "AND menu_category = '" . $catid . "' AND status = '1' AND delete_status = 'No'" . $cond ." ORDER BY sortorder ASC ";
            $res_menu = $this->ExecuteQuery($sel_menu, 'select');
    foreach ($res_menu as $key => $value) {
        if( $res_menu[$key]['menu_photo'] == '') {
                                
                $res_menu[$key]['menu_photo'] = $CFG['site']['image_url']."/comeneat_no-image.jpg";
                
            } elseif ($res_menu[$key]['menu_photo'] != '') {
                
            $logoexists  = $CFG['site']['photo_menu_path']."/".$res_menu[$key]['menu_photo'];
            $res_menu[$key]['menu_photo'] = (file_exists($logoexists)) ? $CFG['site']['photo_menu_url']."/".$res_menu[$key]['menu_photo'] : $CFG['site']['image_url']."/comeneat_no-image.jpg";
        }
}   
        
        
        $objSmarty->assign("categoryMenuList", $res_menu);
        //echo "<br> categoryMenuList: <br>";
       // print_r($res_menu);
        return $res_menu;
        
    }
    #--------------------------------------------------------------------------------
    # Category List Individual
    /**
     * SearchDetails::CategoryList_individual()
     * 
     * @param mixed $catid
     * @return
     */
    function CategoryList_individual($catid)
    {
        global $CFG, $objSmarty;

        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $restaurantid = $this->filterInput($_REQUEST['resid']);
        }

        $sel_veg = "SELECT id, menu_name, menu_category, menu_type, menu_price, menu_description FROM " .
            $CFG['table']['restaurant_menu'] . " WHERE restaurant_id = '" . $restaurantid .
            "' AND menu_category = '" . $this->filterInput($catid) .
            "' AND status = '1' GROUP BY menu_category ORDER BY sortorder ASC ";
        $sql_res = $this->ExecuteQuery($sel_veg, 'select');
        foreach ($sql_res as $key => $value)
        {
            $sql_res[$key]['catname'] = $this->GetValue("maincatename", $CFG['table']['category_main'],
                "maincateid = '" . $this->filterInput($sql_res[$key]['menu_category']) . "' AND status = '1'");
        }
        $objSmarty->assign("vegcatid", $catid);
        $objSmarty->assign("categoryList", $sql_res);
        
    }
    #-------------------------------------------------------------------------------------------
    /**
     * SearchDetails::selectedMenuList()
     * 
     * @return
     */
    function selectedMenuList()
    {
        global $CFG, $objSmarty;

        $searchname = mysqli_real_escape_string($this->DBCONN,trim($this->filterInput($_REQUEST['menuvalue'])));
        $restaurantid = $this->filterInput($_REQUEST['resid']);
        #echo $restaurantid;exit;

        $sel_menu = "SELECT id, menu_name, menu_category, menu_type, menu_price, menu_description, menu_popular_dish, menu_spicy, menu_photo FROM " .
            $CFG['table']['restaurant_menu'] . " WHERE restaurant_id = '" . $restaurantid .
            "' AND menu_name LIKE '%" . $searchname .
            "%' AND status = '1' GROUP BY menu_category ORDER BY sortorder ASC ";
        $res_menu = $this->ExecuteQuery($sel_menu, 'select');
        if (count($res_menu) > 0)
        {
            foreach ($res_menu as $key => $value)
            {
                $res_menu[$key]['catname'] = $this->GetValue("maincatename", $CFG['table']['category_main'],
                    "maincateid = '" . $this->filterInput($res_menu[$key]['menu_category']) . "' AND status = '1'");
            }
        }
        $objSmarty->assign("searchname", $searchname);
        $objSmarty->assign("categoryList", $res_menu);
    }
    #-------------------------------------------------------------------------------------------
    #--------------------------------------------------------------------------------
    #Select Option Menu List
    /**
     * SearchDetails::selectOptionMenuList()
     * 
     * @return
     */
    function selectOptionMenuList()
    {
        global $CFG, $objSmarty;

        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $restaurantid = $this->filterInput($_REQUEST['resid']);
        }

        if (isset($_REQUEST['popular']) && !empty($_REQUEST['popular']))
        {
            $cond .= " AND menu_popular_dish = 'Yes' ";
        }
        if (isset($_REQUEST['spicy']) && !empty($_REQUEST['spicy']))
        {
            $cond .= " AND menu_spicy = 'Yes' ";
        }

        if ((isset($_REQUEST['nonveg']) && !empty($_REQUEST['nonveg'])) && (isset($_REQUEST['veg']) &&
            !empty($_REQUEST['veg'])))
        {
            $cond .= " AND (menu_type = 'veg' OR menu_type = 'nonveg') ";
        } else
        {
            if (isset($_REQUEST['nonveg']) && !empty($_REQUEST['nonveg']))
            {
                $cond .= " AND menu_type = 'nonveg' ";
            }
            if (isset($_REQUEST['veg']) && !empty($_REQUEST['veg']))
            {
                $cond .= " AND menu_type = 'veg' ";
            }
        }

        $sel_veg = "SELECT id, menu_name, menu_category, menu_type, menu_price, menu_description FROM " .
            $CFG['table']['restaurant_menu'] . " WHERE restaurant_id = '" . $restaurantid .
            "' AND status = '1' " . $cond . " GROUP BY menu_category ";
        $sql_res = $this->ExecuteQuery($sel_veg, 'select');
        foreach ($sql_res as $key => $value)
        {
            $sql_res[$key]['catname'] = $this->GetValue("maincatename", $CFG['table']['category_main'],
                "maincateid = '" . $this->filterInput($sql_res[$key]['menu_category']) . "' AND status = '1'");
        }
        $objSmarty->assign("vegcatid", $catid);
        $objSmarty->assign("categoryList", $sql_res);
       
    }
    #--------------------------------------------------------------------------------
    #--------------------------------------------------------------------------------
    #Veg Category List
    /**
     * SearchDetails::vegCategoryList()
     * 
     * @return
     */
    function vegCategoryList()
    {
        global $CFG, $objSmarty;

        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $restaurantid = $this->filterInput($_REQUEST['resid']);
        }

        $sel_veg = "SELECT id, menu_name, menu_category, menu_type, menu_price, menu_description FROM " .
            $CFG['table']['restaurant_menu'] . " WHERE restaurant_id = '" . $restaurantid .
            "' AND menu_type = 'veg' AND status = '1' GROUP BY menu_category ";
        $sql_res = $this->ExecuteQuery($sel_veg, 'select');

        if (count($sql_res) > 0)
        {
            foreach ($sql_res as $key => $value)
            {
                $sql_res[$key]['catname'] = $this->GetValue("maincatename", $CFG['table']['category_main'],
                    "maincateid = '" . $this->filterInput($sql_res[$key]['menu_category']) . "' AND status = '1' ");
            }
        }
        $objSmarty->assign("vegCategoryList", $sql_res);
    }
    #--------------------------------------------------------------------------------
    #Non Veg Category List
    /**
     * SearchDetails::nonvegCategoryList()
     * 
     * @return
     */
    function nonvegCategoryList()
    {
        global $CFG, $objSmarty;

        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $restaurantid = $this->filterInput($_REQUEST['resid']);
        }

        $sel_veg = "SELECT id, menu_name, menu_category, menu_type, menu_price, menu_description FROM " .
            $CFG['table']['restaurant_menu'] . " WHERE restaurant_id = '" . $restaurantid .
            "' AND menu_type = 'nonveg' AND status = '1' GROUP BY menu_category ";
        $sql_res = $this->ExecuteQuery($sel_veg, 'select');
        foreach ($sql_res as $key => $value)
        {
            $sql_res[$key]['catname'] = $this->GetValue("maincatename", $CFG['table']['category_main'],
                "maincateid = '" . $this->filterInput($sql_res[$key]['menu_category']) . "' AND status = '1' ");
        }
        $objSmarty->assign("nonvegCategoryList", $sql_res);
    }
    #--------------------------------------------------------------------------------
    #Veg Category List
    /**
     * SearchDetails::vegCategoryList_individual()
     * 
     * @param mixed $catid
     * @return
     */
    function vegCategoryList_individual($catid)
    {
        global $CFG, $objSmarty;

        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $restaurantid = $this->filterInput($_REQUEST['resid']);
        }

        $sel_veg = "SELECT id, menu_name, menu_category, menu_type, menu_price, menu_description FROM " .
            $CFG['table']['restaurant_menu'] . " WHERE restaurant_id = '" . $restaurantid .
            "' AND menu_category = '" . $catid .
            "' AND menu_type = 'veg' AND status = '1' GROUP BY menu_category ";
        $sql_res = $this->ExecuteQuery($sel_veg, 'select');
        foreach ($sql_res as $key => $value)
        {
            $sql_res[$key]['catname'] = $this->GetValue("maincatename", $CFG['table']['category_main'],
                "maincateid = '" . $this->filterInput($sql_res[$key]['menu_category']) . "' AND status = '1'");
        }
        $objSmarty->assign("vegcatid", $catid);
        $objSmarty->assign("vegCategoryList", $sql_res);
    }
    #--------------------------------------------------------------------------------
    #Veg Category Menu List
    /**
     * SearchDetails::categoryvegMenuList()
     * 
     * @param mixed $catid
     * @return
     */
    function categoryvegMenuList($catid)
    {
        global $CFG, $objSmarty;

        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $restaurantid = $this->filterInput($_REQUEST['resid']);
        }

        $sel_veg_menu = "SELECT id, menu_name, menu_category, menu_type, menu_price, menu_description, menu_popular_dish, menu_photo FROM " .
            $CFG['table']['restaurant_menu'] . " WHERE restaurant_id = '" . $restaurantid .
            "' AND menu_category = '" . $this->filterInput($catid) . "' AND menu_type = 'veg' AND status = '1' ";
        $sql_res_menu = $this->ExecuteQuery($sel_veg_menu, 'select');
        $objSmarty->assign("vegCategoryMenuList", $sql_res_menu);
    }

    #--------------------------------------------------------------------------------
    #Non Veg Category List
    /**
     * SearchDetails::nonvegCategoryList_individual()
     * 
     * @param mixed $catid
     * @return
     */
    function nonvegCategoryList_individual($catid)
    {
        global $CFG, $objSmarty;

        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $restaurantid = $this->filterInput($_REQUEST['resid']);
        }

        $sel_veg = "SELECT id, menu_name, menu_category, menu_type, menu_price, menu_description FROM " .
            $CFG['table']['restaurant_menu'] . " WHERE restaurant_id = '" . $restaurantid .
            "' AND menu_category = '" . $this->filterInput($catid) .
            "' AND menu_type = 'nonveg' AND status = '1' GROUP BY menu_category ";
        $sql_res = $this->ExecuteQuery($sel_veg, 'select');
        foreach ($sql_res as $key => $value)
        {
            $sql_res[$key]['catname'] = $this->GetValue("maincatename", $CFG['table']['category_main'],
                "maincateid = '" . $this->filterInput($sql_res[$key]['menu_category']) . "' AND status = '1'");
        }
        $objSmarty->assign("nonvegCategoryList", $sql_res);
    }

    #--------------------------------------------------------------------------------
    #Non Veg Category Menu List
    /**
     * SearchDetails::categorynonvegMenuList()
     * 
     * @param mixed $catid
     * @return
     */
    function categorynonvegMenuList($catid)
    {
        global $CFG, $objSmarty;

        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $restaurantid = $this->filterInput($_REQUEST['resid']);
        }

        $sel_veg_menu = "SELECT id, menu_name, menu_category, menu_type, menu_price, menu_description, menu_popular_dish, menu_photo FROM " .
            $CFG['table']['restaurant_menu'] . " WHERE restaurant_id = '" . $restaurantid .
            "' AND menu_category = '" . $this->filterInput($catid) .
            "' AND menu_type = 'nonveg' AND status = '1' ";
        $sql_res_menu = $this->ExecuteQuery($sel_veg_menu, 'select');
        $objSmarty->assign("nonvegCategoryMenuList", $sql_res_menu);
    }
    #--------------------------------------------------
    /**
     * SearchDetails::menuSubAddonsListSingle()
     * 
     * @param mixed $mid
     * @return
     */
    function menuSubAddonsListSingle($mid)
    {
        global $CFG, $objSmarty;

        $sel = "SELECT menuaddons_id, addonparentid, menuaddons_restaurantid, menuaddons_menuid, menuaddons_addonsname, menuaddons_priceoption, menuaddons_price FROM " .
            $CFG['table']['restaurant_menuaddons'] . " WHERE menuaddons_menuid = '" . $this->filterInput($mid) .
            "' ";
        $res = $this->ExecuteQuery($sel, "select");
        foreach ($res as $key => $value)
        {
            $res[$key]['subaddonsname'] = $this->getValue("addonsname", $CFG['table']['restaurant_addons'],
                "id = '" . $this->filterInput($res[$key]['menuaddons_addonsname']) . "' ");
        }
        $objSmarty->assign('menuSubaddonslistSingle', $res);
        $objSmarty->assign('menuSubaddonslist_cnt', count($res));
    }
    #--------------------------------------------------------------------------------
    #Menu Details In POP UP
    /**
     * SearchDetails::pizzaAddonsList()
     * 
     * @param mixed $pizzamenuid
     * @return
     */
    function pizzaAddonsList($pizzamenuid)
    {
        global $CFG, $objSmarty;

        $sel_pizza_add = "SELECT pizza_addonsid, pizza_addons_restaurantid, pizza_addons_categoryid, pizza_addons_menuid, pizza_addons_addonsname, pizza_addons_priceoption, pizza_addons_price FROM " .
            $CFG['table']['restaurant_pizza_addons'] . " WHERE pizza_addons_menuid = '" . $this->filterInput($pizzamenuid) .
            "' ";
        $res_pizza_add = $this->ExecuteQuery($sel_pizza_add, "select");
        foreach ($res_pizza_add as $key => $value)
        {
            $res_pizza_add[$key]['addonsname'] = $this->getValue("addonsname", $CFG['table']['restaurant_addons'],
                "id = '" . $this->filterInput($res_pizza_add[$key]['pizza_addons_addonsname']) . "'");
        }
        $objSmarty->assign('pizza_addonslist', $res_pizza_add);
        $objSmarty->assign('pizza_addonslist_cnt', count($res_pizza_add));

    }
    #--------------------------------------------------------------------------------
    #Menu Details In POP UP
    /**
     * SearchDetails::pizzaCrustList()
     * 
     * @param mixed $crustmenuid
     * @return
     */
    function pizzaCrustList($crustmenuid)
    {
        global $CFG, $objSmarty;

        $sel_crust_add = "SELECT pizza_crustid, pizza_crust_restaurantid, pizza_crust_categoryid, pizza_crust_menuid, pizza_crust_addonsname, pizza_crust_priceoption, pizza_crust_price FROM " .
            $CFG['table']['restaurant_pizza_crust'] . " WHERE pizza_crust_menuid = '" . $this->filterInput($crustmenuid) .
            "' ";
        $res_crust_add = $this->ExecuteQuery($sel_crust_add, "select");

        $objSmarty->assign('pizza_crustlist', $res_crust_add);
        $objSmarty->assign('pizza_crustlist_cnt', count($res_crust_add));

    }
    #--------------------------------------------------------------------------------
    #Menu Add to Cart List
    /**
     * SearchDetails::menuCartList()
     * 
     * @return
     */
    function menuCartList()
    {
        global $CFG, $objSmarty;

        $sessionid = session_id();
        
       #echo "<pre>";print_r($_REQUEST);echo "</pre>";
      // exit;

        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $resid = $this->filterInput($_REQUEST['resid']);

            $restDetails = $this->GetMultivalue("restaurant_salestax,restaurant_delivery_charge,restaurant_minorder_price,restaurant_delivery,restaurant_pickup",
                $CFG['table']['restaurant'], "restaurant_id = '" . $resid . "'");
        //echo "<pre>";print_r($restDetails);echo "</pre>";
        }

        $sel_cart = "SELECT cart_id, menuid, restaurantid, menuname, menutype, addonsname, addonsprice, menuprice, quantity, pizza_size, pizza_crustname, pizza_crustprice, pizza_addonsname, pizza_addons_price, specialinstruction, tot_menuprice FROM " .
            $CFG['table']['restaurant_cart'] . " WHERE restaurantid = '" . $resid .
            "' AND sessionid = '" . $sessionid . "' AND quantity != '0' GROUP BY cart_id ";
        $res_cart = $this->ExecuteQuery($sel_cart, "select");
        
        //$res_cart[0]['resname'] = $this->getValue("restaurant_seourl", $CFG['table']['restaurant'], "restaurant_id = '" .$res_cart[0]['restaurantid']. "'");
        
        //echo "<pre>";print_r($res_cart);echo "</pre>";
        
        if (count($res_cart) > 0)
        {
            $orderSubTotal = 0;
            $quantity = 0;
            foreach ($res_cart as $key => $value)
            {
                $orderSubTotal += $res_cart[$key]['tot_menuprice'];
                $quantity += $res_cart[$key]['quantity']; 
            }
        }

        if ($restDetails[0]['restaurant_delivery'] == 'Yes')
        {
            //if($_REQUEST['deliverypickup'] == 'delivery'){
                $deliverychargeamt = $restDetails[0]['restaurant_delivery_charge'];
            //}
            
        }
        if($_REQUEST['deliverypickup'] == 'pickup'){
             $deliverychargeamt1 = $restDetails[0]['restaurant_delivery_charge'];
        }
        $tax = $restDetails[0]['restaurant_salestax'];
        if ($tax != '')
        {
            $taxamount = $orderSubTotal * ($tax / 100);
        }

        #Offer
        $sel_off = "SELECT offer_id, offer_percentage, offer_price, offer_valid_from, offer_valid_to, status FROM " .
            $CFG['table']['restaurant_offer'] . " WHERE status ='1' AND restaurant_id = '" .
            $resid . "' ORDER BY offer_id DESC LIMIT 1 ";
        $res_off = $this->ExecuteQuery($sel_off, "select");
        #echo "<pre>";print_r($res_off);echo "</pre>";exit;

        if (count($res_off) > 0)
        {
            $today = date("Y-m-d");
            if (($orderSubTotal >= $res_off['0']['offer_price']) && ($res_off['0']['offer_valid_from']) <=
                $today && ($res_off['0']['offer_valid_to'] >= $today))
            {
                $offer_percentage = $res_off['0']['offer_percentage'];
                $Offer_purchasePrice = $res_off['0']['offer_price'];
            }
        }
        if (!empty($Offer_purchasePrice) && ($orderSubTotal >= $Offer_purchasePrice))
        {

            $orderDiscountPrice = $orderSubTotal * ($offer_percentage / 100);
            $orderDiscountPriceTotal = $orderSubTotal - $orderDiscountPrice;

            $orderGrandTotal = $orderDiscountPriceTotal + $deliverychargeamt + $taxamount;
            #$orderGrandTotal_withoutdel = $orderDiscountPriceTotal+$taxamount;
            $orderGrandTotal_withoutdel = $orderSubTotal + $taxamount;
        } else
        {
            $orderGrandTotal = $orderSubTotal + $deliverychargeamt + $taxamount;
            $orderGrandTotal_withoutdel = $orderSubTotal + $taxamount;
        }

            
        //Voucher code
        $ordSub = '';
        $voucherMsg = '';
        $voucherCode = '';
        if ($_REQUEST['voucher']) {
            $voucherCode = $this->filterInput($_REQUEST['voucher']);
        } elseif ($_SESSION['voucher']) {
            $voucherCode = $this->filterInput($_SESSION['voucher']);
        }
        
        //echo "vouchercode".$voucherCode."<br>";
        
        if ($voucherCode != '') {
            //Check voucher code is avilable or not
            $voucherDet = $this->voucherDetailByCode($resid,$voucherCode);
            //echo "ggg".$voucherDet."<br>";
            if ($voucherDet != 'Not Avail') {
                if ($_SESSION['customerid'] && $voucherDet[0]['use_type'] == 'S') {
                    //Get existing used voucher 
                    $existUse = $this->getNumvalues($CFG['table']['order'],"customer_id = '".$this->filterInput($_SESSION['customerid'])."' AND voucher_id = '".$this->filterInput($voucherDet[0]['id'])."'");
                    if ($existUse == 0) {
                        if ($voucherDet[0]['off_type'] == 'Price') {
                            $ordSub = $voucherDet[0]['off_price_percentage'];
                            if (($orderSubTotal - $ordSub) <= 0) {
                                $voucherMsg = 'Not enough subtotal';
                            }
                            
                        } elseif ($voucherDet[0]['off_type'] == 'Percentage') {
                            $ordSub = $orderSubTotal * ($voucherDet[0]['off_price_percentage'] / 100);
                            if (($orderSubTotal - $ordSub) <= 0) {
                                $voucherMsg = 'Not enough subtotal';
                            }
                        }
                    } else {
                        $voucherMsg = 'Since it is a one-time use voucher.You have already used this voucher';
                    }
                } else {
                    if ($voucherDet[0]['off_type'] == 'Price') {
                        $ordSub = $voucherDet[0]['off_price_percentage'];
                        
                        //echo "ordSub".$ordSub;
                         //echo "ordSub".$orderSubTotal;
                        if (($orderSubTotal - $ordSub) <= 0) {
                            $voucherMsg = 'Not enough subtotal';
                        }
                    } elseif ($voucherDet[0]['off_type'] == 'Percentage') {
                         
                        $ordSub = $orderSubTotal * ($voucherDet[0]['off_price_percentage'] / 100);
                        if (($orderSubTotal - $ordSub) <= 0) {
                            $voucherMsg = 'Not enough subtotal';
                        }
                    }
                }                
            } else {
                $voucherMsg = 'This voucher code not available now..!';
            }
            
            if ($voucherMsg == '') {
                
                $_SESSION['voucherId']    = $voucherDet[0]['id'];
                $_SESSION['voucher']      = stripslashes($voucherDet[0]['voucher_name']);
                $_SESSION['voucherPrice'] = $ordSub;
                $orderGrandTotal          = $orderGrandTotal-$ordSub;
            }
            $objSmarty->assign('voucherMsg',$voucherMsg);
            $objSmarty->assign('voucherPrice',$ordSub);
        }
        #echo "orderGrandTotal->". $orderGrandTotal;
        //echo $voucherMsg;
        
        $objSmarty->assign('offervalue', $orderDiscountPrice);
        $objSmarty->assign('discountprice', $orderDiscountPrice);
        //$objSmarty->assign('subtotal',number_format($orderSubTotal,2));
        $objSmarty->assign('subtotal', $orderSubTotal);
        $objSmarty->assign('taxamount', $taxamount);
        $objSmarty->assign('total', $orderGrandTotal);
        //$objSmarty->assign('withoutdel_total',number_format($orderGrandTotal_withoutdel,2));
        $objSmarty->assign('withoutdel_total', $orderGrandTotal_withoutdel);

        $objSmarty->assign('deliverycharge', $restDetails[0]['restaurant_delivery_charge']);
        $objSmarty->assign('newdeliverycharge', $deliverychargeamt1);
        $objSmarty->assign('minorderprice', $restDetails[0]['restaurant_minorder_price']);
        $objSmarty->assign('salestax', $restDetails[0]['restaurant_salestax']);
        $objSmarty->assign('deliveryoption', $restDetails[0]['restaurant_delivery']);
        $objSmarty->assign('pickupoption', $restDetails[0]['restaurant_pickup']);

        $objSmarty->assign('rest_offer_percentage', $offer_percentage);
        $objSmarty->assign('Offer_purchasePrice', $Offer_purchasePrice);
        $objSmarty->assign('offer', $offer_percentage);

        $objSmarty->assign('cartDetailsCnt', count($res_cart));
        $objSmarty->assign('cartDetails', $res_cart);
        
        
        $CartCount = $this->getNumValues($CFG['table']['restaurant_cart'], "restaurantid = '".$resid."' AND sessionid = '".$sessionid."'");
        $objSmarty->assign('CartCount', $quantity);
    }
    
    #Get GrandTotal for Cart
    
    /**
     * SearchDetails::getMenuCount()
     * 
     * @return void
     */
    function getMenuCount()
    {
        global $CFG, $objSmarty;
        $sessionid = session_id();
        $CartCount = $this->getNumValues($CFG['table']['restaurant_cart'], "restaurantid = '".$this->filterInput($_POST['resid'])."' AND sessionid = '".$sessionid."'");
        echo $CartCount; exit;
    }
    #--------------------------------------------------------------------------------
    #Menu Add to Cart List
    /**
     * SearchDetails::deleteMenuCart()
     * 
     * @return
     */
    function deleteMenuCart()
    {
        global $CFG, $objSmarty;

        $sessionid = session_id();
        $del_cart = "DELETE FROM " . $CFG['table']['restaurant_cart'] .
            " WHERE cart_id = '" . $this->filterInput($_REQUEST['cartid']) . "' AND sessionid = '" . $sessionid .
            "' LIMIT 1";
        $res_cart = $this->ExecuteQuery($del_cart, "delete");
    }
    #--------------------------------------------------------------------------------
    #Modify Menu Cart Item
    /**
     * SearchDetails::modifyMenuCart()
     * 
     * @return
     */
    function modifyMenuCart()
    {
        global $CFG, $objSmarty;

        $sessionid = session_id();
        $menuid = $this->filterInput($_REQUEST['menuid']);
        $cartid = $this->filterInput($_REQUEST['cartid']);
        $orderoption = $this->filterInput($_REQUEST['orderoption']);

        #exit;

        $sel = "SELECT cart_id, quantity, menuprice, addonsname, pizza_crustprice, pizza_addons_price, addonsprice FROM " .
            $CFG['table']['restaurant_cart'] . " WHERE menuid = '" . $menuid .
            "' AND sessionid = '" . $sessionid . "' AND cart_id = '" . $cartid . "' LIMIT 1";
        $res = $this->ExecuteQuery($sel, "select");

        if ($orderoption == 'dec')
        {
            $quantity = $res[0]['quantity'] - 1;
        } elseif ($orderoption == 'inc')
        {
            $quantity = $res[0]['quantity'] + 1;
        }

        $menuprice = $this->filterInput($res[0]['menuprice']);
        $pizza_crustprice = $this->filterInput($res[0]['pizza_crustprice']);
        $pizza_addons_price = $this->filterInput($res[0]['pizza_addons_price']);

        if (($res[0]['addonsname'] != '') && ($res[0]['addonsprice'] != '0'))
        {
            $addonsprice = $this->filterInput($res[0]['addonsprice']);
            #$totalprice = ($menuprice * $quantity) + $addonsprice;
            $totalprice = (($menuprice + $addonsprice) * $quantity);
        } else
        {
            #$totalprice = $menuprice * $quantity;
            $totalprice = (($menuprice + $pizza_crustprice + $pizza_addons_price) * $quantity);
        }

        if ($quantity == 0)
        {
            $del_cart = "DELETE FROM " . $CFG['table']['restaurant_cart'] .
                " WHERE menuid = '" . $menuid . "' AND sessionid = '" . $sessionid .
                "' AND cart_id = '" . $cartid . "' LIMIT 1";
            $res_cart = $this->ExecuteQuery($del_cart, "delete");
        } else
        {
            $upd = "UPDATE " . $CFG['table']['restaurant_cart'] . " SET quantity = '" . $quantity .
                "',menuprice = '" . $menuprice . "',tot_menuprice = '" . $totalprice .
                "' WHERE menuid = '" . $menuid . "' AND sessionid = '" . $sessionid .
                "' AND cart_id = '" . $cartid . "' ";
            $res_up = $this->ExecuteQuery($upd, "update");
        }

    }
    #----------------------------------------------------------------------------------
    #Order Details
    /**
     * SearchDetails::orderDetailsList()
     * 
     * @param mixed $orderid
     * @return
     */
    function orderDetailsList($orderid)
    {
        global $CFG, $objSmarty;

        $sel_order = "SELECT ordergenerateid, restaurant_id, customername, customerlastname, customeremail, customercellphone, deliverydoornumber, deliverystreet, deliverylandmark, deliveryarea, deliverycity, deliverytype, deliverystate, deliveryzip, ordertotalprice, offervalue, taxvalue, customerlandline, deliverylandmark, foodassoonas, deliverydate, deliverytime, instructions, status, orderdate, payment_type, usertype , printer_sent, deliveryamount, taxamount, offeramount, tipamount, voucher_id,voucher_code,voucher_price,ordersubtotal, payment_status FROM " .
            $CFG['table']['order'] . " WHERE orderid = '" . $this->filterInput($orderid) . "' ";
        $res_order = $this->ExecuteQuery($sel_order, 'select');
        //echo "<pre>"; print_r($res_order); echo "</pre>";
        $deliverystate  = $this->getValue("statename",$CFG['table']['state'],"statecode = '".$this->filterInput($res_order['0']['deliverystate'])."' ");
        $deliverycity  = $this->getValue("cityname",$CFG['table']['city'],"city_id = '".$this->filterInput($res_order['0']['deliverycity'])."' ");
        $deliverytype = $res_order[0]['deliverytype'];

        $restDetails = $this->GetMultivalue("restaurant_name,restaurant_salestax,restaurant_delivery_charge,restaurant_minorder_price,restaurant_delivery,restaurant_pickup, gprs_option",
            $CFG['table']['restaurant'], "restaurant_id = '" . $this->filterInput($res_order[0]['restaurant_id']) .
            "'");

        $sel_cart = "SELECT cart_id, menuid, restaurantid, menuname, menutype,addonsname, addonsprice, menuprice, quantity, pizza_size, pizza_crustname, pizza_crustprice, pizza_addonsname, pizza_addons_price, specialinstruction, tot_menuprice FROM " .
            $CFG['table']['restaurant_cart'] . " WHERE orderid = '" . $this->filterInput($orderid) .
            "' AND quantity != '0' ";
        $res_cart = $this->ExecuteQuery($sel_cart, "select");
        #echo "<pre>";print_r($res_cart);echo "</pre>";

        if (count($res_cart) > 0)
        {
            foreach ($res_cart as $key => $value)
            {
                $rowTotal[] = $res_cart[$key]['tot_menuprice'];

                #$ordertxt_item .= $res_cart[$key]['quantity'] . "," . stripslashes($res_cart[$key]['menuname']) . "," . $res_cart[$key]['tot_menuprice'] . ";";
                if(!empty($res_cart[$key]['addonsname'])){
					$res_cart[$key]['printeraddonsname'] .= strip_tags($res_cart[$key]['addonsname']);
				}
				if(!empty($res_cart[$key]['pizza_crustname'])){
					$res_cart[$key]['printeraddonsname'] .= strip_tags($res_cart[$key]['pizza_crustname']);
				}
				if(!empty($res_cart[$key]['pizza_addonsname'])){
					$res_cart[$key]['printeraddonsname'] .= strip_tags($res_cart[$key]['pizza_addonsname']);
				}
				if(!empty($res_cart[$key]['specialinstruction'])){
					$res_cart[$key]['printeraddonsname'] .= " Instruction: ".strip_tags($res_cart[$key]['specialinstruction']);
				}
				
				if( !empty($res_cart[$key]['printeraddonsname']) ){
					$res_cart[$key]['addonsnametoprinter'] = "(".$res_cart[$key]['printeraddonsname'].");";
				}
				
				//$ordertxt_item .= "%%%%".$res_cart[$key]['quantity']." X ".stripslashes($res_cart[$key]['menuname'])." - ".$res_cart[$key]['tot_menuprice']."%%%%".$res_cart[$key]['addonsnametoprinter'];
				$ordertxt_item .= $res_cart[$key]['quantity'].",".stripslashes($res_cart[$key]['menuname']).",".$res_cart[$key]['tot_menuprice'].";".$res_cart[$key]['addonsnametoprinter'];
            }
            /*if(!empty($rowTotal) && is_array($rowTotal))
            {
            $orderSubTotal = array_sum($rowTotal);
            }*/
        }
        $orderSubTotal = $res_order['0']['ordersubtotal'];
        #if($restDetails[0]['restaurant_delivery'] == 'Yes' && $res_order[0]['deliverytype'] != 'pickup'){
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
        /*if(!empty($deliverychargeamt))
        {
            $orderGrandTotal = ($res_order['0']['ordertotalprice']) + $deliverychargeamt;    
        } else {
            $orderGrandTotal = $res_order['0']['ordertotalprice'];   
        }*/
        $orderGrandTotal = ($res_order['0']['ordertotalprice']);  
        
        if($res_order[0]['voucher_price'] != ''){
            //voucher_price
            $orderGrandTotal1 = ($orderGrandTotal-$res_order[0]['voucher_price']);
        }else{
            $orderGrandTotal1 = $orderGrandTotal;
        }
        $res_order[0]['deliverydate'] = $this->setDateFormatWithOutTime($res_order[0]['deliverydate']);
        $res_order[0]['orderdate'] = $this->setDateFormatWithTime($res_order[0]['orderdate']);

        $objSmarty->assign('subtotal', number_format($orderSubTotal, 2));
        $objSmarty->assign('taxamount', number_format($taxamount, 2));
        $objSmarty->assign('total', $orderGrandTotal);
        $objSmarty->assign('orderDiscountPrice', number_format($orderDiscountPrice, 2));

        $objSmarty->assign('deliverycharge', $res_order['0']['deliveryamount']);
        $objSmarty->assign('res_salestax', $res_order[0]['taxvalue']);
        //$objSmarty->assign('taxamount',$taxamount);
        $objSmarty->assign('salestax', $res_order[0]['taxvalue']);
        $objSmarty->assign('tipamount', $tipamount);
        $objSmarty->assign('restaurantname', $restDetails[0]['restaurant_name']);
        $objSmarty->assign('minorderprice', $restDetails[0]['restaurant_minorder_price']);
        $objSmarty->assign('deliveryoption', $restDetails[0]['restaurant_delivery']);
        $objSmarty->assign('pickupoption', $restDetails[0]['restaurant_pickup']);
        $objSmarty->assign('deliverytype', $deliverytype);
        $objSmarty->assign('deliverystate', $deliverystate);
        $objSmarty->assign('deliverycity', $deliverycity);

        $objSmarty->assign('cartDetails', $res_cart);
        $objSmarty->assign("orderDetails", $res_order);

        #Write in orderfiles folder in.txt file
        if ($res_order['0']['printer_sent'] == 'N' && $restDetails['0']['gprs_option'] == 'Yes' )
        {
            $this->getUpdate($CFG['table']['order'], "printer_sent = 'Y' ", " orderid = '" .$orderid . "' ");
        }
        $objSmarty->assign("printer_sent", $res_order['0']['printer_sent']);
        $objSmarty->assign("gprsoption", $restDetails['0']['gprs_option']);
        $objSmarty->assign("orderid", base64_encode($orderid));


    }
    #--------------------------------------------------------------------------------------
    #Customer Details
    /**
     * SearchDetails::customerDetails()
     * 
     * @param mixed $cusid
     * @return
     */
    function customerDetails($cusid)
    {
        global $CFG, $objSmarty;

        $sel = "SELECT customer_name, customer_lastname, customer_buildtype,customer_street, customer_crossstreet, customer_city, customer_zip, customer_state, customer_landmark, customer_area, customer_phone, customer_email, customer_password, customer_landline FROM " .
            $CFG['table']['customer'] . " WHERE customer_id = '" . $this->filterInput($_SESSION['customerid']) .
            "'";
        $res = $this->ExecuteQuery($sel, "select");
        #----------------------------------------------------------------get state,city,zip value ----------------------------------------->
        $res[0]['customer_city_name'] = $this->getValue("cityname", $CFG['table']['city'],
            "city_id = '" . $this->filterInput($res[0]['customer_city']) . "' ");
        $res[0]['customer_zip_code'] = $this->getValue("zipcode", $CFG['table']['zipcode'],
            "zipcode_id = '" . $this->filterInput($res[0]['customer_zip']) . "' ");
        $res[0]['customer_zip_area'] = $this->getValue("areaname", $CFG['table']['zipcode'],
            "zipcode_id = '" . $this->filterInput($res[0]['customer_zip']) . "' ");

        $objSmarty->assign("customerDetails", $res);
    }
    #-------------------------------------------------------------------------------------
    #Offers Details
    /**
     * SearchDetails::RestaurantOffers()
     * 
     * @return
     */
    function RestaurantOffers()
    {
        global $CFG, $objSmarty;

        $today = date("Y-m-d");

        $sel_offerres = "SELECT offer_id, offer_percentage, offer_price, offer_valid_from, 	offer_valid_to FROM " .
            $CFG['table']['restaurant_offer'] . " WHERE status = '1' AND restaurant_id = '" .
            $this->filterInput($_REQUEST['resid']) . "' AND offer_valid_from <= '" . $today .
            "' AND offer_valid_to >= '" . $today . "' ORDER BY offer_id DESC LIMIT 1 ";

        $res_offer_res = $this->ExecuteQuery($sel_offerres, "select");
        
        if($res_offer_res != ''){       
            foreach ($res_offer_res as $key => $value){
                
                $offer1         =  $res_offer_res[$key]['offer_percentage']."<br>";
                $offer2         =  round($res_offer_res[$key]['offer_percentage'],0)."<br>";     
                $res_offer_res[$key]['offer_valprice']   = $offer1/$offer2; 
                    
            }
        }    
        #echo "<pre>";print_r($res_offer_res);echo "</pre>";

        $objSmarty->assign('percentage_show', $res_offer_res);
        
    }
    #-------------------------------------------------------------------------------------
    #CheckOutPaypal
    /**
     * SearchDetails::buyProduct()
     * 
     * @return
     */
    function buyProduct()
    {
        global $CFG, $objSmarty;

        $sql = "INSERT INTO " . $CFG['table']['payment'] . " SET member_id = '" . $this->filterInput($_SESSION['customerid']) .
            "',orderid = '" . $this->filterInput($_POST['orderid']) . "',amount = '" . $this->filterInput($_POST['ordertotalprice']) .
            "',rechared_date = '" . CUR_TIME . "'";
        $insertId = $this->ExecuteQuery($sql, "insert");
        return $insertId;

    }

    #--------------------------------------------------------------------------------------
    #restaurantReviewDetails
    /**
     * SearchDetails::restaurantReviewDetails()
     * 
     * @return
     */
    function restaurantReviewDetails()
    {
        global $CFG, $objSmarty;

        if (isset($_REQUEST['ratingval']) && !empty($_REQUEST['ratingval']))
        {

            if ($_REQUEST['ratingval'] == "newest")
            {
                $sortby = " ORDER BY rating_id DESC ";
            } elseif ($_REQUEST['ratingval'] == 'today')
            {
                $today = date("Y-m-d");
                $cond .= " AND DATE_FORMAT(addeddate,'%Y-%m-%d')='" . $today . "'";
            } elseif ($_REQUEST['ratingval'] == 'ratingasc')
            {
                $sortby = " ORDER BY rating ASC ";
            } elseif ($_REQUEST['ratingval'] == 'ratingdesc')
            {
                $sortby = " ORDER BY rating DESC ";
            }
        }

        $sql = "SELECT restaurant_id, customer_id, rating, message, addeddate FROM " . $CFG['table']['restaurant_reviews'] .
            " WHERE restaurant_id = '" . $this->filterInput($_GET['resid']) . "' AND status = '1' " . $cond .
            " " . $sortby . " ";
        $res = $this->ExecuteQuery($sql, 'select');
        foreach ($res as $key => $value)
        {
            $res[$key]['customername'] = $this->getValue("customer_name", $CFG['table']['customer'],
                "customer_id = '" . $this->filterInput($res[$key]['customer_id']) . "'");
        }

        $objSmarty->assign('restaurant_reviews', $res);
        $objSmarty->assign('restaurant_reviews_count', count($res));
    }
    #-----------------------------------------------------------------------------------------
    #My favorites List
    /**
     * SearchDetails::ListMyFavorties()
     * 
     * @return
     */
    function ListMyFavorties()
    {
        global $CFG, $objSmarty;

        $seltype = $this->filterInput($_POST['sel_type']);
        $resid = $this->filterInput($_POST['resid']);
        $customerid = $this->filterInput($_SESSION['customerid']);

        if ($seltype == 'Add')
        {
            $checkalreadyAdd = $this->getNumvalues($CFG['table']['myfavorties'],"customerid = '" . $customerid."' AND restaurant_id = '" .
                $resid ."' ");
            if ($checkalreadyAdd == 0) {
            $sel = "INSERT INTO " . $CFG['table']['myfavorties'] . " SET restaurant_id = '" .
                $resid . "',customerid = '" . $customerid . "',ip_address	= '" . $_SERVER['REMOTE_ADDR'] .
                "', adddate = '" . CUR_TIME . "' ";
            $res = $this->ExecuteQuery($sel, 'insert');
            echo 'success';
            }
        }
        if ($seltype == 'Remove')
        {
            $sel = "DELETE FROM " . $CFG['table']['myfavorties'] .
                " WHERE restaurant_id = '" . $resid . "' AND customerid = '" . $customerid .
                "' ";
            $res = $this->ExecuteQuery($sel, 'delete');
            echo 'success';
        }
    }
    #--------------------------------------------------------------------------------
    /**
     * SearchDetails::MyFavoritesAddid()
     * 
     * @param mixed $resid
     * @return
     */
    function MyFavoritesAddid($resid)
    {
        global $CFG, $objSmarty;

        if (isset($_SESSION['customerid']) && !empty($_SESSION['customerid']))
        {
            $myfavid_num = $this->GetNumValues($CFG['table']['myfavorties'],
                "restaurant_id = '" . $this->filterInput($resid) . "' AND (customerid='" . $this->filterInput($_SESSION['customerid']) .
                "' OR ip_address='" . $_SERVER['REMOTE_ADDR'] . "') ");
                
        }
        //echo $myfavid_num;
        $objSmarty->assign('myfavnum', $myfavid_num);
    }
    #-----------------------------------------------------------------------------------------------
    /**
     * SearchDetails::checkCategoryName()
     * 
     * @return
     */
    function checkCategoryName()
    {
        global $CFG, $objSmarty;

        $getcatid = $this->GetValue("menu_category", $CFG['table']['restaurant_menu'],
            "id = '" . $this->filterInput($_POST['menuid']) . "' ");
        $getcatname = $this->GetValue("maincatename", $CFG['table']['category_main'],
            "maincateid = '" . $getcatid . "' ");
        echo strtolower($getcatname);
    }

    #---------------------------------------------------------------------------------
    #addBookTable
    /**
     * SearchDetails::addBookTable()
     * 
     * @return
     */
    function addBookTable()
    {
        global $CFG, $objSmarty;

        $num_guests = $this->filterInput($_REQUEST['num_guests']);
        $booking_date = $this->filterInput($_REQUEST['booking_date']);
        $booking_hours = $this->filterInput($_REQUEST['booking_hours']);
        $booking_mins = $this->filterInput($_REQUEST['booking_mins']);
        $booking_session = $this->filterInput($_REQUEST['booking_time']);
        $booking_name = $this->filterInput($_REQUEST['booking_name']);
        $booking_email = $this->filterInput($_REQUEST['booking_email']);
        $booking_mobileno = $this->filterInput($_REQUEST['booking_mobileno']);
        $booking_phoneno = $this->filterInput($_REQUEST['booking_phoneno']);
        $booking_ext = $this->filterInput($_REQUEST['booking_ext']);
        $booking_instruction = $this->filterInput($_REQUEST['booking_instruction']);
        //echo $booking_session;

        $booking_time = $booking_hours;
        $day = date("D", strtotime($booking_date));
        $res_open_close = $this->getMultiValue("mon_firstopen_time, 	mon_firstclose_time, 	tue_firstopen_time, 	tue_firstclose_time, 	wed_firstopen_time, 	wed_firstclose_time, 	thu_firstopen_time, 	thu_firstclose_time, 	fri_firstopen_time, 	fri_firstclose_time, 	sat_firstopen_time, 	sat_firstclose_time, 	sun_firstopen_time, 	sun_firstclose_time, 	mon_secondopen_time, 	mon_secondclose_time, 	tue_secondopen_time, 	tue_secondclose_time,	wed_secondopen_time, 	wed_secondclose_time, 	thu_secondopen_time, 	thu_secondclose_time, 	fri_secondopen_time, 	fri_secondclose_time, 	sat_secondopen_time, 	sat_secondclose_time, 	sun_secondopen_time, 	sun_secondclose_time",
            $CFG['table']['restaurant_timing'], "restaurant_id = '" . $this->filterInput($_REQUEST['rest_id']) .
            "'");

        if ($day == 'Mon')
        {
            $booking_status = $this->openandcloseBookingTable($res_open_close[0]['mon_firstopen_time'],
                $res_open_close[0]['mon_firstclose_time'], $res_open_close[0]['mon_secondopen_time'],
                $res_open_close[0]['mon_secondclose_time'], $booking_time);
        } elseif ($day == 'Tue')
        {
            $booking_status = $this->openandcloseBookingTable($res_open_close[0]['tue_firstopen_time'],
                $res_open_close[0]['tue_firstclose_time'], $res_open_close[0]['tue_secondopen_time'],
                $res_open_close[0]['tue_secondclose_time'], $booking_time);
        } elseif ($day == 'Wed')
        {
            $booking_status = $this->openandcloseBookingTable($res_open_close[0]['wed_firstopen_time'],
                $res_open_close[0]['wed_firstclose_time'], $res_open_close[0]['wed_secondopen_time'],
                $res_open_close[0]['wed_secondclose_time'], $booking_time);
        } elseif ($day == 'Thu')
        {
            $booking_status = $this->openandcloseBookingTable($res_open_close[0]['thu_firstopen_time'],
                $res_open_close[0]['thu_firstclose_time'], $res_open_close[0]['thu_secondopen_time'],
                $res_open_close[0]['thu_secondclose_time'], $booking_time);
        } elseif ($day == 'Fri')
        {
            $booking_status = $this->openandcloseBookingTable($res_open_close[0]['fri_firstopen_time'],
                $res_open_close[0]['fri_firstclose_time'], $res_open_close[0]['fri_secondopen_time'],
                $res_open_close[0]['fri_secondclose_time'], $booking_time);
        } elseif ($day == 'Sat')
        {
            $booking_status = $this->openandcloseBookingTable($res_open_close[0]['sat_firstopen_time'],
                $res_open_close[0]['sat_firstclose_time'], $res_open_close[0]['sat_secondopen_time'],
                $res_open_close[0]['sat_secondclose_time'], $booking_time);
        } elseif ($day == 'Sun')
        {
            $booking_status = $this->openandcloseBookingTable($res_open_close[0]['sun_firstopen_time'],
                $res_open_close[0]['sun_firstclose_time'], $res_open_close[0]['sun_secondopen_time'],
                $res_open_close[0]['sun_secondclose_time'], $booking_time);
        }
        if ($booking_status == 'Open')
        {
            if (strtotime(date("d-m-Y")) == strtotime($booking_date))
            {
                if (strtotime(date("d-m-Y h:s:i A")) > strtotime($booking_date . ' ' . $booking_time))
                {
                    $booking_status = 'Time Exceeded';
                }
            }
        }
        
        if ($booking_status == 'Open')
        {

            $Query = "INSERT INTO " . $CFG['table']['restaurant_booking'] . " SET 
								restaurant_id	=	'" . $this->filterInput($_REQUEST['rest_id']) . "',
								num_guests		=	'" .  $num_guests . "',
								booking_date	=	'" .  $this->filterInput($booking_date) . "',
								booking_time	=	'" .  $this->filterInput($booking_time) . "',
								booking_name	=	'" .  $this->filterInput($booking_name) . "',
								booking_email	=	'" .  $this->filterInput($booking_email) . "',
								booking_mobileno=	'" .  $this->filterInput($booking_mobileno) . "',
								booking_phoneno	=	'" .  $this->filterInput($booking_phoneno) . "',
								booking_ext		=	'" .  $this->filterInput($booking_ext) . "',
								booking_instruction = '" .  $this->filterInput($booking_instruction) . "',
								addeddate		=	'" . CUR_TIME . "'";
            $Res = $this->ExecuteQuery($Query, 'insert');
            
            if (!empty($Res) && ($Res > 0))
            {
                #Customer Id Generation
                $ordergenid = $this->generateId($Res);
                $finalorderid = "BT" . $ordergenid;
                $this->getUpdate($CFG['table']['restaurant_booking'], "bookinggenerateid='" . $finalorderid .
                    "'", "id='" . $Res . "'");

            }                
            //if($Res){
            //echo "success";
            #exit;
            //}

            //------------------------------------------------------------------Mail to Restaurant Owner and Admin------------------------------------------------


            //Split mail like r*******@gmail.com

            $mail1 = explode('@', $booking_email);
            $mail2 = str_split($mail1[0]);
            for ($i = 0; $i < count($mail2) - 1; $i++)
            {
                $mail3 .= '*';
            }
            $mail4 = $mail2[0] . $mail3 . '@' . $mail1[1];


            //Split mobile number like 393********

            $mobile1 = str_split($booking_mobileno);

            for ($i = 0; $i < count($mobile1); $i++)
            {
                if ($i < count($mobile1) - 2)
                {
                    $mobile2 .= '*';
                }
                if ($i >= count($mobile1) - 2)
                {
                    $mobile4 .= $mobile1[$i];
                }

            }
            $mobile3 = $mobile2 . $mobile4;


            if ($Res)
            {

                echo "success";

                //Mail To Restaurant Owner

                $rest_mail = $this->getMultiValue("restaurant_name,restaurant_phone,restaurant_logo,restaurant_streetaddress,restaurant_city,restaurant_state,restaurant_zip,restaurant_contact_phone,restaurant_contact_email",
                    $CFG['table']['restaurant'], "restaurant_id	=	'" . $this->filterInput($_REQUEST['rest_id']) . "'");

                $resname = '';
                
                if($booking_phoneno != '') {
                    $Landline = '<tr>
                				<td width="30%" align="left" valign="top">Landline Number</td>
                				<td width="5%" align="center" valign="top">:</td>
                				<td width="55%" align="left" valign="top">'.$booking_phoneno.'</td>
                			</tr>';
                }
                
                if($booking_instruction != '') {
                    $bookingInstruction = '<tr>
                				<td width="30%" align="left" valign="top">Instruction by Customer</td>
                				<td width="5%" align="center" valign="top">:</td>
                				<td width="55%" align="left" valign="top">'.stripslashes($booking_instruction).'</td>
                			</tr>';
                }
                

                $from_mail = $CFG['site']['supportemail'];
                $tomail = $rest_mail[0]['restaurant_contact_email'];
                $mailsubject = $CFG['site']['sitename'] . ": Requesting for booking a table";
                $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] ."/bookTableMail.tpl");
                $mail_content = str_replace('{SITE_URL}', $CFG['site']['base_url'], $mail_content);
                $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
                $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
                $mail_content = str_replace('{RESTAURANTNAME}', $resname, $mail_content);
                $mail_content = str_replace('{NOOFGUEST}', $num_guests, $mail_content);
                $mail_content = str_replace('{BOOKDATE}', $booking_date, $mail_content);
                $mail_content = str_replace('{BOOKTIME}', $booking_time, $mail_content);
                $mail_content = str_replace('{BOOKNAME}', stripslashes($booking_name), $mail_content);
                $mail_content = str_replace('{BOOKMAIL}', $mail4, $mail_content);
                $mail_content = str_replace('{BOOKMOBILE}', $mobile3, $mail_content);
                $mail_content = str_replace('{LANDLINE}', $Landline, $mail_content);
                $mail_content = str_replace('{BOOKINGINSTRUCTION}', $bookingInstruction , $mail_content);

                $ok = $this->sendMail($CFG['site']['sitename'], $from_mail, $tomail, $mailsubject,
                    $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');
                //$ok = $this->sendMailSMTP($toemail,$toname,$mailsubject,$mail_content);
                //Mail To Admin
                //echo "content->".$mail_content;
                //echo "111111->".$ok;exit;
                if ($ok)
                {

                    $resname = '	<tr>
											<td align="left" colspan="3" style="padding-top:20px;"><b>Restaurant Name : </b> ' .
                        stripslashes($rest_mail[0]['restaurant_name']) . '</td>
										</tr>';

                    $from_mail = $rest_mail[0]['restaurant_contact_email'];
                    $tomail = $CFG['site']['supportemail'];
                    $mailsubject = $CFG['site']['sitename'] . ": Requesting for booking a table";
                    $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] .
                        "/bookTableMail.tpl");
                    $mail_content = str_replace('{SITE_URL}', $CFG['site']['base_url'], $mail_content);
                    $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
                    $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
                    $mail_content = str_replace('{RESTAURANTNAME}', $resname, $mail_content);
                    $mail_content = str_replace('{NOOFGUEST}', $num_guests, $mail_content);
                    $mail_content = str_replace('{BOOKDATE}', $booking_date, $mail_content);
                    $mail_content = str_replace('{BOOKTIME}', $booking_time, $mail_content);
                    $mail_content = str_replace('{BOOKNAME}', stripslashes($booking_name), $mail_content);
                    $mail_content = str_replace('{BOOKMAIL}', $booking_email, $mail_content);
                    $mail_content = str_replace('{BOOKMOBILE}', $booking_mobileno, $mail_content);
                    $mail_content = str_replace('{LANDLINE}', $Landline, $mail_content);
                    $mail_content = str_replace('{BOOKINGINSTRUCTION}', stripslashes($booking_instruction), $mail_content);

                    $done = $this->sendMail($CFG['site']['sitename'], $from_mail, $tomail, $mailsubject,
                        $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');
                    //Mail To Customer
                    //echo "sent->".$ok;
                    if ($done)
                    {
                        $resname = '	<tr>
												<td align="left" colspan="3" style="padding-top:20px;"><b>Restaurant Name : </b> ' .
                            $rest_mail[0]['restaurant_name'] . '</td>
											</tr>';

                        $from_mail = $CFG['site']['supportemail'];
                        $tomail = $booking_email;
                        $mailsubject = $CFG['site']['sitename'] .
                            ": Your requesting for booking a table";
                        $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] .
                            "/bookTableMail.tpl");
                        $mail_content = str_replace('{SITE_URL}', $CFG['site']['base_url'], $mail_content);
                        $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
                        $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
                        $mail_content = str_replace('{RESTAURANTNAME}', $resname, $mail_content);
                        $mail_content = str_replace('{NOOFGUEST}', $num_guests, $mail_content);
                        $mail_content = str_replace('{BOOKDATE}', $booking_date, $mail_content);
                        $mail_content = str_replace('{BOOKTIME}', $booking_time, $mail_content);
                        $mail_content = str_replace('{BOOKNAME}', stripslashes($booking_name), $mail_content);
                        $mail_content = str_replace('{BOOKMAIL}', $booking_email, $mail_content);
                        $mail_content = str_replace('{BOOKMOBILE}', $booking_mobileno, $mail_content);
                        $mail_content = str_replace('{LANDLINE}', $Landline, $mail_content);
                        $mail_content = str_replace('{BOOKINGINSTRUCTION}', stripslashes($booking_instruction), $mail_content);

                        $done = $this->sendMail($CFG['site']['sitename'], $from_mail, $tomail, $mailsubject,
                            $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');
                    }
                    //echo "done->".$done;exit;
                }


            }
        } elseif ($booking_status == 'Closed')
        {
            echo 'closed';
        } elseif ($booking_status == 'Time Exceeded')
        {
            echo 'time_exceeded';
        }

    }
    //Open and Close time for booking table
    /**
     * SearchDetails::HourMinuteToDecimal()
     * 
     * @param mixed $hour_minute
     * @return
     */
    function HourMinuteToDecimal($hour_minute)
    {
        $t = explode(':', $hour_minute);
        #echo "<pre>--->"; print_r($t); echo "</pre>";

        return $t[0] * 60 + $t[1];
    }

    /**
     * SearchDetails::HourMinuteToDecimalBook()
     * 
     * @param mixed $hour_minute
     * @return
     */
    function HourMinuteToDecimalBook($hour_minute)
    {
        $t = explode(':', $hour_minute);
        #echo "<pre>--->"; print_r($t); echo "</pre>";
        $sess = explode(" ", $t[1]);

        if ($sess[1] == 'PM')
        {
            if ($t[0] != 12)
            {
                $hour = $t[0] + 12;
            } else
            {
                $hour = $t[0];
            }
        } else
        {
            if ($t[0] == 12)
            {
                $hour = 0;
            } else
            {
                $hour = $t[0];
            }
        }
        #echo "<pre>";print_r($sess);echo "</pre>";
        #return $t[0]*60+$t[1];
        return $hour * 60 + $t[1];
    }
    /**
     * SearchDetails::openandcloseBookingTable()
     * 
     * @param mixed $rrr_opentime
     * @param mixed $rrr_closetime
     * @param mixed $rrr_opentime2
     * @param mixed $rrr_closetime2
     * @param mixed $bookHrsMinsSess
     * @return
     */
    function openandcloseBookingTable($rrr_opentime, $rrr_closetime, $rrr_opentime2,
        $rrr_closetime2, $bookHrsMinsSess)
    {

        $dec_rrr_opentime = $this->HourMinuteToDecimalBook($rrr_opentime);
        $dec_rrr_closetime = $this->HourMinuteToDecimalBook($rrr_closetime);
        $dec_rrr_nowtime = $this->HourMinuteToDecimalBook($bookHrsMinsSess);

        $dec_rrr_opentime2 = $this->HourMinuteToDecimalBook($rrr_opentime2);
        $dec_rrr_closetime2 = $this->HourMinuteToDecimalBook($rrr_closetime2);

        list($hh_book_hrmin, $hh_book_sess) = explode(" ", $bookHrsMinsSess);
        list($hh_book_hr, $hh_book_min) = explode(":", $hh_book_hrmin);

        //Open
        list($hh_open_hrmin, $hh_open_sess) = explode(" ", $rrr_opentime);
        list($hh_open_hr, $hh_open_min) = explode(":", $hh_open_hrmin);

        //Close
        list($hh_close_hrmin, $hh_close_sess) = explode(" ", $rrr_closetime);
        list($hh_close_hr, $hh_close_min) = explode(":", $hh_close_hrmin);

        //Open2
        list($hh_open_hrmin2, $hh_open_sess2) = explode(" ", $rrr_opentime2);
        list($hh_open_hr2, $hh_open_min2) = explode(":", $hh_open_hrmin2);

        //Close2
        list($hh_close_hrmin2, $hh_close_sess2) = explode(" ", $rrr_closetime2);
        list($hh_close_hr2, $hh_close_min2) = explode(":", $hh_close_hrmin2);


        if (($hh_open_sess == 'AM' && $hh_close_sess == 'AM') && ($hh_open_sess2 == 'PM' &&
            $hh_close_sess2 == 'PM'))
        {

            if ($hh_book_sess == 'AM' || $hh_book_sess == 'PM')
            {
                if ((($dec_rrr_nowtime > $dec_rrr_opentime) && ($dec_rrr_closetime > $dec_rrr_nowtime)) ||
                    (($dec_rrr_nowtime > $dec_rrr_opentime2) && ($dec_rrr_closetime2 > $dec_rrr_nowtime)))
                {
                    #echo "<br><b>AM-PM--Open</b>";
                    $openclosetype = "Open";
                }
                 /*elseif( ($dec_rrr_nowtime > $dec_rrr_opentime2 ) &&  ($dec_rrr_closetime2 > $dec_rrr_nowtime) ){
                #echo "<br><b>AM-PM--Open</b>";
                $openclosetype = "Open";
                }*/  else
                {
                    #echo "<br><b>AM-PM--Closed</b>";
                    $openclosetype = "Closed";
                }
            } else
            {
                #echo "<br><b>AM-PM--Closed</b>";
                $openclosetype = "Closed";
            }
        } elseif (($hh_open_sess == 'AM' && $hh_close_sess == 'PM') && ($hh_open_sess2 ==
        'PM' && $hh_close_sess2 == 'PM'))
        {

            if ($hh_book_sess == 'AM' || $hh_book_sess == 'PM')
            {
                if (($dec_rrr_nowtime > $dec_rrr_opentime) && ($dec_rrr_closetime > $dec_rrr_nowtime))
                {
                    #echo "<br><b>Fir-->AM-PM--Open</b>";
                    $openclosetype = "Open";
                } elseif (($dec_rrr_nowtime > $dec_rrr_opentime2) && ($dec_rrr_closetime2 > $dec_rrr_nowtime))
                {
                    #echo "<br><b>2222AM-PM--Open</b>";
                    $openclosetype = "Open";
                } else
                {
                    #echo "<br><b>Fir-->AM-PM--Closed</b>";
                    $openclosetype = "Closed";
                }
            } else
            {
                #echo "<br><b>Last-->AM-PM--Closed</b>";
                $openclosetype = "Closed";
            }
        } elseif (($hh_open_sess == 'AM' && $hh_close_sess == 'PM') && ($hh_open_sess2 ==
        'PM' && $hh_close_sess2 == 'AM'))
        {

            if ($hh_book_sess == 'AM' || $hh_book_sess == 'PM')
            {
                if (($dec_rrr_nowtime > $dec_rrr_opentime) && ($dec_rrr_closetime > $dec_rrr_nowtime))
                {
                    #echo "<br><b>1111AM-PM--Open</b>";
                    $openclosetype = "Open";
                } elseif (($dec_rrr_nowtime > $dec_rrr_opentime2) && ($dec_rrr_closetime2 > $dec_rrr_nowtime))
                {
                    #echo "<br><b>2222AM-PM--Open</b>";
                    $openclosetype = "Open";
                } else
                {
                    #echo "<br><b>Sec--->AM-PM--Closed</b>";
                    $openclosetype = "Closed";
                }
            } else
            {
                #echo "<br><b>AM-PM--Closed</b>";
                $openclosetype = "Closed";
            }
        } elseif (($hh_open_sess == 'PM' && $hh_close_sess == 'PM') && ($hh_open_sess2 ==
        'PM' && $hh_close_sess2 == 'PM'))
        {

            if ($hh_book_hr == '12')
            {

                if (($dec_rrr_nowtime > $dec_rrr_opentime) || ($dec_rrr_closetime > $dec_rrr_nowtime))
                {
                    #echo "<br><b>$hh_open_sess-$hh_close_sess--Open</b>";
                    $openclosetype = "Open";
                } else
                {
                    $openclosetype = "Closed";
                }
            } elseif ((($dec_rrr_nowtime > $dec_rrr_opentime) && ($dec_rrr_closetime > $dec_rrr_nowtime)) ||
            ($dec_rrr_closetime > $dec_rrr_nowtime))
            {
                #echo "<br><b>$hh_open_sess-$hh_close_sess--Open</b>";
                $openclosetype = "Open";
            } elseif ((($dec_rrr_nowtime > $dec_rrr_opentime2) && ($dec_rrr_closetime2 > $dec_rrr_nowtime)) ||
            ($dec_rrr_closetime2 > $dec_rrr_nowtime))
            {
                #echo "<br><b>$hh_open_sess-$hh_close_sess--Open</b>";
                $openclosetype = "Open";
            } else
            {
                $openclosetype = "Closed";
            }
        } elseif (($hh_open_sess == 'AM' && $hh_close_sess == 'AM') && ($hh_open_sess2 ==
        'AM' && $hh_close_sess2 == 'AM'))
        {

            if ($hh_book_hr == '12' || $hh_book_hr == '01')
            {

                if (($dec_rrr_nowtime > $dec_rrr_opentime) || ($dec_rrr_closetime > $dec_rrr_nowtime))
                {
                    #echo "<br><b>$hh_open_sess-$hh_close_sess--Open</b>";
                    $openclosetype = "Open";
                } else
                {
                    $openclosetype = "Closed";
                }
            } elseif ((($dec_rrr_nowtime > $dec_rrr_opentime) && ($dec_rrr_closetime > $dec_rrr_nowtime)))
            {
                #echo "<br><b>hh_open_sess--Open</b>"."bnmbnmbmbnm";
                $openclosetype = "Open";
            } elseif ((($dec_rrr_nowtime > $dec_rrr_opentime2) && ($dec_rrr_closetime2 > $dec_rrr_nowtime)))
            {
                #echo "<br><b>hh_open_sessOpen222222222</b>"."vvvvvvvvvv";
                $openclosetype = "Open";
            } else
            {
                $openclosetype = "Closed";
            }
        } elseif (($hh_open_sess == 'AM' && $hh_close_sess == 'PM') && ($hh_open_sess2 ==
        'AM' && $hh_close_sess2 == 'AM'))
        {
            if ($hh_book_hr == '12' || $hh_book_hr == '01')
            {

                if (($dec_rrr_nowtime > $dec_rrr_opentime) || ($dec_rrr_closetime > $dec_rrr_nowtime))
                {
                    #echo "<br><b>$hh_open_sess-$hh_close_sess--Open</b>";
                    $openclosetype = "Open";
                } else
                {
                    $openclosetype = "Closed";
                }
            } elseif ((($dec_rrr_nowtime > $dec_rrr_opentime) && ($dec_rrr_closetime > $dec_rrr_nowtime)))
            {
                #echo "<br><b>hh_open_sess--Open</b>"."bnmbnmbmbnm";
                $openclosetype = "Open";
            } elseif ((($dec_rrr_nowtime > $dec_rrr_opentime2) && ($dec_rrr_closetime2 > $dec_rrr_nowtime)))
            {
                #echo "<br><b>hh_open_sessOpen222222222</b>"."vvvvvvvvvv";
                $openclosetype = "Open";
            } else
            {
                $openclosetype = "Closed";
            }
        }
        return $openclosetype;
    }


    ############################NEW IMPLEMENTATION ##################################################
    #--------------------------------------------------------------------------------
    #Menu Details In POP UP
    /**
     * SearchDetails::menuDetails()
     * 
     * @return
     */
    function menuDetails()
    {
        global $CFG, $objSmarty;

        $sel_menu_det = "SELECT id, restaurant_id, menu_name, menu_category, menu_type, menu_price, menu_addons, menu_description, sizeoption, menu_spl_instruction, pizza_size_small, pizza_small_value, pizza_size_medium, pizza_medium_value, pizza_size_large, pizza_large_value FROM " .
            $CFG['table']['restaurant_menu'] . " WHERE id = '" . $this->filterInput($_REQUEST['menuid']) .
            "' AND status = '1' ";
        
        $res_menu_det = $this->ExecuteQuery($sel_menu_det, "select");
        //echo"<pre>";print_r($res_menu_det);echo"</pre>";   
        $res_menu_det[0]['restaurant_seourl'] = $this->getValue("restaurant_seourl", $CFG['table']['restaurant'], "restaurant_id = '" . $this->filterInput($res_menu_det[0]['restaurant_id']) . "'");
        
        #echo "<pre>";print_r($res_menu_det);echo "</pre>";

        $getcategoryname = $this->getValue("maincatename", $CFG['table']['category_main'],
            "maincateid = '" . $this->filterInput($res_menu_det[0]['menu_category']) . "'");
        $getcategory_option = $this->getValue("maincat_option", $CFG['table']['category_main'],
            "maincateid = '" . $this->filterInput($res_menu_det[0]['menu_category']) . "'");
        
        $objSmarty->assign('getcategoryname', strtolower($getcategoryname));
        $objSmarty->assign('getcategory_option', strtolower($getcategory_option));
        $objSmarty->assign('menuid', $_REQUEST['menuid']);
        $objSmarty->assign('selectmenuDetails', $res_menu_det);
    }

    #--------------------------------------------------------------------------------
    #NEW IMPLEMENTATION##############################################################
    /**
     * SearchDetails::pizzzaSizeList()
     * 
     * @param mixed $catid
     * @param mixed $maincat_option
     * @param mixed $menuid
     * @return
     */
    function pizzzaSizeList($catid, $maincat_option, $menuid)
    {
        global $CFG, $objSmarty;
        
        //echo "===>".$maincat_option;
        if (isset($maincat_option) && !empty($maincat_option) && $maincat_option ==
            'pizza')
        {
            $cat_optioncond .= " piz.pizza_slice_restaurantid = '" . $this->filterInput($_REQUEST['resid']) .
                "' AND cat.maincat_option = '" . $this->filterInput($maincat_option) .
                "' AND piz.pizza_slice_menuid = '" . $this->filterInput($menuid) . "'";
        } elseif (isset($maincat_option) && !empty($maincat_option) && $maincat_option ==
        'normal')
        {
            $cat_optioncond .= " piz.pizza_slice_categoryid = '" . $this->filterInput($catid) .
                "' AND piz.pizza_slice_restaurantid = '" . $this->filterInput($_REQUEST['resid']) .
                "' AND cat.maincat_option = '" . $this->filterInput($maincat_option) .
                "' AND piz.pizza_slice_menuid = '" . $this->filterInput($menuid) . "'";
        }
       
       $sel_slice_add = "SELECT piz.pizza_slice_id, piz.pizza_slice_restaurantid, piz.pizza_slice_categoryid, piz.pizza_slice_menuid, piz.pizza_slice_name, piz.pizza_slice_price, cat.maincat_option FROM " .
            $CFG['table']['restaurant_pizza_slice'] . " as piz" . " LEFT JOIN " . $CFG['table']['category_main'] .
            " as cat ON piz.pizza_slice_categoryid = cat.maincateid" . " WHERE ". $cat_optioncond." GROUP BY piz.pizza_slice_name ORDER BY piz.pizza_slice_id ASC";
        
        #echo $sel_slice_add;
        $res_slice_add = $this->ExecuteQuery($sel_slice_add, "select");
        //$this->pr($res_slice_add);
       
        //print_r($res_slice_add);
        return $res_slice_add;
        
        //$objSmarty->assign('pizzasizelist', $res_slice_add);
        //$objSmarty->assign('pizza_slicelist_cnt', count($res_slice_add));
    }
    
    function pizzzaSizeListFP($menuid)
    {
        global $CFG, $objSmarty;
        echo "**";

        echo $menuid;
        //echo "===>".$maincat_option;
        if (isset($maincat_option) && !empty($maincat_option) && $maincat_option ==
            'pizza')
        {
            $cat_optioncond .= " piz.pizza_slice_restaurantid = '" . $this->filterInput($_REQUEST['resid']) .
                "' AND cat.maincat_option = '" . $this->filterInput($maincat_option) .
                "' AND piz.pizza_slice_menuid = '" . $this->filterInput($menuid) . "'";
        } elseif (isset($maincat_option) && !empty($maincat_option) && $maincat_option ==
        'normal')
        {
            $cat_optioncond .= " piz.pizza_slice_menuid = '" . $this->filterInput($menuid) . "'";
        }
        
        $cat_optioncond .= " piz.pizza_slice_menuid = '" . $this->filterInput($menuid) . "'";
       
       $sel_slice_add = "SELECT piz.pizza_slice_id, piz.pizza_slice_restaurantid, piz.pizza_slice_categoryid, piz.pizza_slice_menuid, piz.pizza_slice_name, piz.pizza_slice_price, cat.maincat_option FROM " .
            $CFG['table']['restaurant_pizza_slice'] . " as piz" . " LEFT JOIN " . $CFG['table']['category_main'] .
            " as cat ON piz.pizza_slice_categoryid = cat.maincateid" . " WHERE ". $cat_optioncond." GROUP BY piz.pizza_slice_name ORDER BY piz.pizza_slice_id ASC";
        
        //echo $sel_slice_add;
        $res_slice_add = $this->ExecuteQuery($sel_slice_add, "select");
        //$this->pr($res_slice_add);
       
        //print_r($res_slice_add);
        return $res_slice_add;
        
        //$objSmarty->assign('pizzasizelist', $res_slice_add);
        //$objSmarty->assign('pizza_slicelist_cnt', count($res_slice_add));
    }
    
    #----------------------------------------------------------------------------------------
    #Menu Details In POP UP
    /**
     * SearchDetails::menuAddonsList()
     * 
     * @param mixed $menuaddonsid
     * @param mixed $catid
     * @return
     */
    function menuAddonsList($menuaddonsid, $catid)
    {
        global $CFG, $objSmarty;
        
        $menu_categoryoption = $this->GetValue("maincat_option", $CFG['table']['category_main'],
            "maincateid = '" . $this->filterInput($catid) . "' ");

        if ($menu_categoryoption == 'pizza')
        {
            $catcond .= " menu_catoption = '" . $menu_categoryoption ."' AND menuaddons_categoryid = '" . $this->filterInput($catid) . "' AND menuaddons_restaurantid = '" .$this->filterInput($_REQUEST['resid']) . "' AND menuaddons_menuid = '" . $this->filterInput($menuaddonsid) . "' ";
            //$catcond .= " rma.menu_catoption = '" . $menu_categoryoption ."' AND ra.category_id = '" . $catid . "' AND ra.restaurant_id = '" .$_REQUEST['resid'] . "' ";
        } else
        {
            $catcond .= " menu_catoption = '" . $menu_categoryoption ."' AND menuaddons_categoryid = '" . $this->filterInput($catid) . "' AND menuaddons_restaurantid = '" .$this->filterInput($_REQUEST['resid']) . "' AND menuaddons_menuid = '" . $this->filterInput($menuaddonsid) . "' ";
            //$catcond .= " rma.menu_catoption = '" . $menu_categoryoption ."' AND ra.category_id = '" . $catid . "' AND ra.restaurant_id = '" .$_REQUEST['resid'] . "' ";
        }

        $sel = " SELECT rma.menuaddons_id, rma.addonparentid, rma.menuaddons_restaurantid, rma.menuaddons_categoryid, rma.menuaddons_menuid, rma.menuaddons_addonsname, rma.menuaddons_priceoption, rma.menuaddons_price, rma.menu_catoption ".
                    " FROM " .$CFG['table']['restaurant_menuaddons'] . " AS rma".
                    " INNER JOIN " .$CFG['table']['restaurant_addons'] . " AS ra ON rma.menuaddons_restaurantid = ra.restaurant_id AND rma.menuaddons_categoryid = ra.category_id".
                    " WHERE  " . $catcond ." AND rma.menuaddons_addonsname != ''  AND addonparentid IN (SELECT DISTINCT id FROM  " .$CFG['table']['restaurant_addons'] . " WHERE category_id = '".$this->filterInput($catid)."')GROUP BY rma.addonparentid ";
        $res = $this->ExecuteQuery($sel, "select");

        foreach ($res as $key => $value)
        {
            #$res[$key]['id'] = $this->getValue("id",$CFG['table']['restaurant_addons'],"id = '".$res[$key]['addonparentid']."'");
            $res[$key]['mainaddonsname'] = $this->getValue("addonsname", $CFG['table']['restaurant_addons'],
                "id = '" . $this->filterInput($res[$key]['addonparentid']) . "' AND status = '1' ");
            $res[$key]['mainaddonsnamecnt'] = $this->getValue("addonscount", $CFG['table']['restaurant_addons'],
                "id = '" . $this->filterInput($res[$key]['addonparentid']) . "' AND status = '1'");
            $res[$key]['mainaddonstype'] = $this->getValue("addons_option", $CFG['table']['restaurant_addons'],
                "id = '" . $this->filterInput($res[$key]['addonparentid']) . "' AND status = '1'");
            //$res[$key]['mainaddonstypecnt'] = $this->getNumvalues($CFG['table']['restaurant_addons'],"category_id = '".$res[$key]['menuaddons_categoryid']."' AND parentid = '0' AND addons_option = 'single' ");
            $res[$key]['mainaddonspriceoption'] = $this->getValue("addonspriceoption", $CFG['table']['restaurant_addons'],
                "id = '" . $this->filterInput($res[$key]['addonparentid']) . "'");
        }
       
        //$res_count  = count($res);
        return $res;
        //return $res_count
        //$objSmarty->assign('menuaddonslist', $res);
        //$objSmarty->assign('menuaddonslist_cnt', count($res));
    }

    #-----------------------------------------------------------------------------------
    /**
     * SearchDetails::menuSubAddonsList()
     * 
     * @param mixed $pid
     * @param mixed $mid
     * @param mixed $catid
     * @param mixed $menuaddons_addonsname
     * @param mixed $menu_catoption
     * @return
     */
    function menuSubAddonsList($pid, $mid, $catid, $menuaddons_addonsname, $menu_catoption)
    {
        global $CFG, $objSmarty;

        $menu_categoryoption = $this->GetValue("maincat_option", $CFG['table']['category_main'],
            "maincateid = '" . $this->filterInput($catid) . "' ");

        if ($menu_categoryoption == 'pizza')
        {
            $catcond .= " AND 	menu_catoption = '" . $this->filterInput($menu_categoryoption) .
                "' AND menuaddons_categoryid = '" . $this->filterInput($catid) . "' AND menuaddons_restaurantid = '" .
                $this->filterInput($_REQUEST['resid']) . "' ";
        } else
        {
            $catcond .= " AND 	menu_catoption = '" . $menu_categoryoption .
                "' AND menuaddons_categoryid = '" . $catid . "' AND menuaddons_restaurantid = '" .
                $_REQUEST['resid'] . "' ";
        }

        $sel = "SELECT menuaddons_id, addonparentid, menuaddons_restaurantid, menuaddons_menuid, menuaddons_addonsname, menuaddons_priceoption, menuaddons_price, menuaddons_categoryid, menuaddons_price_slice FROM " .
            $CFG['table']['restaurant_menuaddons'] . " WHERE addonparentid = '" . $this->filterInput($pid) .
            "' " . $catcond . " AND menuaddons_menuid = '" . $this->filterInput($mid) .
            "' GROUP BY menuaddons_addonsname";
        $res = $this->ExecuteQuery($sel, "select");
        foreach ($res as $key => $value)
        {
            $res[$key]['subaddonsname'] = $this->getValue("addonsname", $CFG['table']['restaurant_addons'],
                "id = '" . $this->filterInput($res[$key]['menuaddons_addonsname']) . "' ");
        }
        return $res;
        //$objSmarty->assign('menuSubaddonslist', $res);
        //$objSmarty->assign('menuSubaddonslist_cnt', count($res));
    }

    #--------------------------------------------------------------------------------
    #Menu Add to Cart
    /**
     * SearchDetails::addToMenuCart()
     * 
     * @return
     */
    function addToMenuCart()
    {
        global $CFG, $objSmarty;

        $sessionid = session_id();
        $addon = explode(',', $_REQUEST['Addons']);
        sort($addon);
        foreach ($addon as $value)
        {
            if ($value != '')
            {
                $newaddon .= $value . ',';
            }

        }
        $_REQUEST['Addons'] = $newaddon;
        //echo "request==><pre>";print_r($_REQUEST);echo "</pre>";
        #echo "Addons==><pre>";print_r($_REQUEST['Addons']);echo "</pre>";
        #Addons
        if ($_REQUEST['Addons'] != "")
        {
            $addons = explode(",", $_REQUEST['Addons']);
            if (is_array($addons))
            {
                foreach ($addons as $key => $value)
                {
                    if (!empty($addons[$key]))
                    {
                        $addonss[] = "'" . $addons[$key] . "'";
                    }
                }
                if (!empty($addonss))
                {
                    $addons_add = implode(",", $addonss);
                    if ($addons_add != "")
                    {
                        $condition1 .= "menuaddons_id IN (" . $addons_add . ")";
                        $maincond .= "menuaddons_id IN (" . $addons_add . ") GROUP BY addonparentid";
                    }
                }
            }

            $pizza_size_check = $_REQUEST['pizzasize'];
            $pizza_size_check_arr = explode("_", $pizza_size_check);

            #echo "<pre>";print_r($pizza_size_check_arr);echo "</pre>";

            $addonsprice = $this->getMultivalue("menuaddons_addonsname,menuaddons_price,menuaddons_price_medium,menuaddons_price_large,menuaddons_price_slice,menuaddons_categoryid",
                $CFG['table']['restaurant_menuaddons'], "$condition1");

            $mainaddonsid_arr = $this->getMultivalue("menuaddons_addonsname,addonparentid",
                $CFG['table']['restaurant_menuaddons'], $maincond);

            $addonsaddprice = '';

            if (!empty($addonsprice))
            {

                if (is_array($mainaddonsid_arr))
                {

                    foreach ($mainaddonsid_arr as $mkey => $mval)
                    {
                        $main_addon_id = $this->filterInput($mainaddonsid_arr[$mkey]['addonparentid']);
                        $main_addon_name = $this->getValue("addonsname", $CFG['table']['restaurant_addons'],
                            "id = '" . $main_addon_id . "'");
                        $sub_addonssname = '';
                        $subaddonsname = '';
                        foreach ($addonsprice as $key => $value)
                        {
                            $mainaddonparid = $this->getValue("addonparentid", $CFG['table']['restaurant_menuaddons'],
                                "menuaddons_id  = '" . $this->filterInput($addons[$key]) . "'");
                            if ($main_addon_id == $mainaddonparid)
                            {
                                #Size addon price Condition
                                if (isset($_REQUEST['pizzasize']) && !empty($_REQUEST['pizzasize']))
                                {
                                    if ($pizza_size_check_arr[0] == 'Small')
                                    {
                                        $addonstotal[] = $addonsprice[$key]['menuaddons_price'];
                                        $addonsaddprice = $addonsprice[$key]['menuaddons_price'];
                                    } elseif ($pizza_size_check_arr[0] == 'Medium')
                                    {
                                        $addonstotal[] = $addonsprice[$key]['menuaddons_price_medium'];
                                        $addonsaddprice = $addonsprice[$key]['menuaddons_price_medium'];
                                    } elseif ($pizza_size_check_arr[0] == 'Large')
                                    {
                                        $addonstotal[] = $addonsprice[$key]['menuaddons_price_large'];
                                        $addonsaddprice = $addonsprice[$key]['menuaddons_price_large'];
                                    } else
                                    {
                                        $addonstotal[] = $addonsprice[$key]['menuaddons_price'];
                                        $addonsaddprice = $addonsprice[$key]['menuaddons_price'];
                                    }
                                }
                                #Slice addon price Condition
                                elseif (isset($_REQUEST['pizzasize_slice']) && !empty($_REQUEST['pizzasize_slice']))
                                {

                                    $sliceaddonprice_val = $this->getSliceAddonsPrice_OrderPop($addonsprice[$key]['menuaddons_price_slice'],
                                        $this->filterInput($_REQUEST['pizzasliceprice_position']));
                                    #echo "<pre>slice prizes ";print_r($sliceaddonprice_val);echo "</pre>";
                                    $addonstotal[] = $sliceaddonprice_val;
                                    $addonsaddprice = $sliceaddonprice_val;
                                } else
                                {
                                    $addonstotal[] = $addonsprice[$key]['menuaddons_price'];
                                    $addonsaddprice = $addonsprice[$key]['menuaddons_price'];
                                }

                                $menu_addonprice = '';
                                if ($addonsaddprice != '0.00' && $addonsaddprice != '' )
                                {
                                    if ($CFG['site']['currency_option'] == 'img')
                                    {
                                        $menu_addonprice = '(' . '<img src="' . $CFG['site']['currency_image'] .
                                            '" title="" alt="currency" /> ' . $addonsaddprice . ')';
                                    } else
                                    {
                                        $menu_addonprice = '(' . $CFG['site']['currency_symbol'] . $addonsaddprice . ')';
                                    }
                                }
                                $sub_addonssname = $this->getValue("addonsname", $CFG['table']['restaurant_addons'],
                                    "id = '" . $this->filterInput($addonsprice[$key]['menuaddons_addonsname']) . "'");
                                $subaddonsname[] = $sub_addonssname . '' . $menu_addonprice;
                            }

                        }
                        if (isset($subaddonsname) && !empty($subaddonsname))
                        {
                            $subaddon_imp = implode(" + ", $subaddonsname);
                            $addonsname[] = $main_addon_name . '( ' . $subaddon_imp . ' )';
                        }

                    }

                }

                /*foreach($addonsprice as $key=>$value){
                #Size addon price Condition
                if(isset($_REQUEST['pizzasize']) && !empty($_REQUEST['pizzasize'])){
                if($pizza_size_check_arr[0] == 'Small'){
                $addonstotal[]= $addonsprice[$key]['menuaddons_price'];
                $addonsaddprice = $addonsprice[$key]['menuaddons_price'];
                }
                elseif($pizza_size_check_arr[0] == 'Medium'){
                $addonstotal[]= $addonsprice[$key]['menuaddons_price_medium'];
                $addonsaddprice = $addonsprice[$key]['menuaddons_price_medium'];
                }
                elseif($pizza_size_check_arr[0] == 'Large'){
                $addonstotal[]= $addonsprice[$key]['menuaddons_price_large'];
                $addonsaddprice = $addonsprice[$key]['menuaddons_price_large'];
                }				
                else{
                $addonstotal[]= $addonsprice[$key]['menuaddons_price'];
                $addonsaddprice = $addonsprice[$key]['menuaddons_price'];
                }
                }
                #Slice addon price Condition
                elseif(isset($_REQUEST['pizzasize_slice']) && !empty($_REQUEST['pizzasize_slice'])){
                
                $sliceaddonprice_val	=	$this->getSliceAddonsPrice_OrderPop($addonsprice[$key]['menuaddons_price_slice'],$_REQUEST['pizzasliceprice_position']);
                #echo "<pre>slice prizes ";print_r($sliceaddonprice_val);echo "</pre>";
                $addonstotal[]= $sliceaddonprice_val;
                $addonsaddprice = $sliceaddonprice_val;
                }
                else{
                $addonstotal[]= $addonsprice[$key]['menuaddons_price'];
                $addonsaddprice = $addonsprice[$key]['menuaddons_price'];
                }
                
                $menu_addonprice = '';
                if($addonsaddprice != '0.00' ){
                if($CFG['site']['currency_option'] == 'img'){
                $menu_addonprice = '('.'<img src="'.$CFG['site']['currency_image'].'" title="" alt="currency" /> '. $addonsaddprice.')';
                }else{
                $menu_addonprice = '('.$CFG['site']['currency_symbol']. $addonsaddprice.')';
                }
                }
                $addonssname = $this->getValue("addonsname",$CFG['table']['restaurant_addons'],"id = '".$addonsprice[$key]['menuaddons_addonsname']."'");
                $addonsname[] = $addonssname.''.$menu_addonprice;
                }*/

            }

            #echo "addonsaddprice ".$addonsaddprice;
            #echo "<pre>";print_r($addons_name);echo "</pre>";

            if (!empty($addonsname))
            {
                #$addons_name = implode(" + ",$addonsname);
                $addons_name = implode(" , ", $addonsname);
            }
            if (!empty($addonstotal) && is_array($addonstotal))
            {
                $menu_addprice = array_sum($addonstotal);
            }
        }

        if (isset($_REQUEST['pizzasize_slice']) && $_REQUEST['pizzasize_slice'] != '')
        {

            $pizzaSliceprice = $this->getMultivalue("pizza_slice_price,pizza_slice_name", $CFG['table']['restaurant_pizza_slice'],
                "pizza_slice_id = '" . $this->filterInput($_REQUEST['pizzasize_slice']) . "'");
            $menuprice = $pizzaSliceprice[0]['pizza_slice_price'];
            $pizzasize = $pizzaSliceprice[0]['pizza_slice_name'];
        }
         /*else{
        $menuprice 		= $this->filterInput($_REQUEST['menuprice']);
        $pizzasize 	    = $this->filterInput($_REQUEST['pizzasize']);
        }*/  elseif (isset($_REQUEST['pizzasize']) && !empty($_REQUEST['pizzasize']))
        {
            $menuprice = $this->filterInput($_REQUEST['menuprice']);
            $pizzasize = $this->filterInput($_REQUEST['pizzasize']);
        } else
        {
            $menuprice = $this->filterInput($_REQUEST['menuprice']);
            $pizzasize = $this->filterInput($_REQUEST['pizzasize']);
        }
        #echo "<br>aaa-->".$pizza_addonsprice;
        #echo "<br>ccc-->".$pizza_crustprice;

        #exit;

        $menuid = $this->filterInput($_REQUEST['menuid']);
        $restaurantid = $this->filterInput($_REQUEST['resid']);
        $menuname = $this->filterInput($this->GetValue("menu_name", $CFG['table']['restaurant_menu'],
            "id = '" . $this->filterInput($_REQUEST['menuid']) . "'"));
        $menutype = $this->GetValue("menu_type", $CFG['table']['restaurant_menu'],
            "id = '" . $this->filterInput($_REQUEST['menuid']) . "'");
        //$menuprice 		= $this->filterInput($_REQUEST['menuprice']);
        $quantity = $this->filterInput($_REQUEST['quantity']);
        $splins = $this->filterInput($_REQUEST['menuspl_ins']);
        //$addonsname 	= $this->filterInput($_REQUEST['addonsname']);
        //$addonsprice 	= $this->filterInput($_REQUEST['addonsprice']);
        //$pizzasize 	    = $this->filterInput($_REQUEST['pizzasize']);

        /*if($addonsprice != ''){
        #$totmenuprice 	= ($menuprice * $quantity) + $addonsprice;
        #$totmenuprice 	= ( ($menuprice + $addonsprice) * $quantity) ;
        $totmenuprice 	= ( ($menuprice + $menu_addprice) * $quantity) ;
        }else{
        $totmenuprice  = ( ( $menuprice + $pizza_addonsprice + $pizza_crustprice ) * $quantity);
        #$totmenuprice 	= ($menuprice * $quantity);$pizzasize
        }
        
        if($addons_name != ''){
        $cond .= " AND addonsname = '".$addons_name."' "; 
        }
        if($crust_name != ''){
        $cond .= " AND pizza_crustname = '".$crust_name."' "; 
        }
        if($pizza_addons_name != ''){
        $cond .= " AND pizza_addonsname = '".$pizza_addons_name."' "; 
        }*/

        #$sel = "SELECT quantity, cart_id FROM ".$CFG['table']['restaurant_cart']." WHERE menuid = '".$menuid."' AND sessionid = '".$sessionid."' AND addonsname = '".$addons_name."' AND pizza_crustname = '".$crust_name."' AND pizza_addonsname = '".$pizza_addons_name."' AND pizza_size = '".$pizzasize."'  ";
        $sel = "SELECT quantity, cart_id FROM " . $CFG['table']['restaurant_cart'] .
            " WHERE menuid = '" . $menuid . "' AND sessionid = '" . $sessionid .
            "' AND addonsname = '" . mysqli_real_escape_string($this->DBCONN,$addons_name) .
            "' AND pizza_size = '" . mysqli_real_escape_string($this->DBCONN,$pizzasize) . "'  ";
        #echo $sel;
        $res = $this->ExecuteQuery($sel, "select");
        $getquantity = $res[0]['quantity'];
        $getcartid = $res[0]['cart_id'];
        $totalcartsession = count($res);
        //echo "<br>tot-->".$totalcartsession;
        //exit;

        #$totalcartsession = $this->getNumvalues($CFG['table']['restaurant_cart'],"menuid = '".$menuid."' AND sessionid = '".$sessionid."' ");
        if ($totalcartsession == '0')
        {

            if ($addonsprice != '')
            {
                $totmenuprice = (($menuprice + $menu_addprice) * $quantity);
            } else
            {
                $totmenuprice = (($menuprice + $pizza_addonsprice + $pizza_crustprice) * $quantity);
            }

            $ins_cart = "INSERT INTO 
								" . $CFG['table']['restaurant_cart'] . " 
							SET 
								menuid 			   = '" . $menuid . "', 
								restaurantid 	   = '" . $restaurantid . "', 
								menuname 		   = '" . $menuname . "',
								addonsname 		   = '" . mysqli_real_escape_string($this->DBCONN,addslashes($addons_name)) . "',
								addonsprice		   = '" . $menu_addprice . "',
								menutype 		   = '" . $menutype . "',  
								menuprice 		   = '" . $menuprice . "', 
								quantity		   = '" . $quantity . "',
								pizza_crustname	   = '" . $crust_name . "', 
								pizza_crustprice   = '" . $pizza_crustprice . "', 
								pizza_addonsname   = '" . $pizza_addons_name . "',
								pizza_addons_price = '" . $pizza_addonsprice . "', 
								pizza_size		   = '" . mysqli_real_escape_string($this->DBCONN,$pizzasize) . "',
								specialinstruction = '" . $splins . "', 
								tot_menuprice      = '" . $totmenuprice . "', 
								sessionid 		   = '" . $sessionid . "',
								addeddate 		   = '" . CUR_TIME . "' ";
            $res_cart = $this->ExecuteQuery($ins_cart, "insert");
        } else
        {

            $updquantity = $getquantity + $quantity;

            if ($addonsprice != '')
            {
                $totmenuprice = (($menuprice + $menu_addprice) * $updquantity);
            } else
            {
                $totmenuprice = (($menuprice + $pizza_addonsprice + $pizza_crustprice) * $updquantity);
            }

            $up_cart = "UPDATE 
							" . $CFG['table']['restaurant_cart'] . " 
							SET 
								menuid 			   = '" . $menuid . "', 
								restaurantid 	   = '" . $restaurantid . "', 
								menuname 		   = '" . $menuname . "', 
								addonsname 		   = '" . $addons_name . "',
								addonsprice		   = '" . $menu_addprice . "',
								menutype 		   = '" . $menutype . "', 
								menuprice 		   = '" . $menuprice . "', 
								quantity		   = '" . $updquantity . "', 
								pizza_crustname	   = '" . $crust_name . "', 
								pizza_crustprice   = '" . $pizza_crustprice . "', 
								pizza_addonsname   = '" . $pizza_addons_name . "',
								pizza_addons_price = '" . $pizza_addonsprice . "',
								pizza_size		   = '" . $pizzasize . "',
								specialinstruction = '" . $splins . "', 
								tot_menuprice      = '" . $totmenuprice . "', 
								sessionid 		   = '" . $sessionid . "',
								addeddate 		   = '" . CUR_TIME . "'
							WHERE 
							    menuid =  '" . $menuid . "' AND sessionid = '" . $sessionid .
                "' AND cart_id = '" . $getcartid . "' ";
            $res_cart = $this->ExecuteQuery($up_cart, "update");
        }
    }

    #--------------------------------------------------------------------------------
    #showPizzaPriceperSize:
    /**
     * SearchDetails::showPizzaPriceperSize()
     * 
     * @param mixed $pizza_size
     * @param mixed $parentid
     * @param mixed $menuaddonid
     * @param mixed $menuid
     * @return
     */
    function showPizzaPriceperSize($pizza_size, $parentid, $menuaddonid, $menuid)
    {
        global $CFG, $objSmarty;

        if ($pizza_size == 'size_small')
        {
            $req_field = 'menuaddons_price';
        }
        if ($pizza_size == 'size_medium')
        {
            $req_field = 'menuaddons_price_medium';
        }
        if ($pizza_size == 'size_large')
        {
            $req_field = 'menuaddons_price_large';
        }
        $qry = "SELECT " . $req_field . " FROM " . $CFG['table']['restaurant_menuaddons'] .
            " WHERE addonparentid = '" . $this->filterInput($parentid) . "' AND menuaddons_id  = '" . $this->filterInput($menuaddonid) .
            "' AND menuaddons_menuid = '" . $this->filterInput($menuid) .
            "' AND menuaddons_priceoption = 'Paid' ";
        $res = mysqli_query($this->DBCONN,$qry) or die(mysqli_error($this->DBCONN));
        $row = mysqli_fetch_assoc($res);
        return $row[$req_field];
        $objSmarty->assign("pizza_price_size", $row[$req_field]);
    }
    ############################NEW IMPLEMENTATION ##################################################

}

?>