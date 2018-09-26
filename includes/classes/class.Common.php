<?php

/**
 * Common
 * 
 * @package   
 * @author 
 * @copyright gencyolcu
 * @version 2014
 * @access public
 */
class Common extends Site
{
    #--------------------------------------------------------------------------------
    #Auto Suggest
    #--------------------------------------------------------------------------------
    #Auto Suggest By Area
    /**
     * Common::autoSuggestByArea()
     * 
     * @return
     */
    function autoSuggestByArea()
    {
        global $CFG, $objSmarty;

        $q = strtolower($this->filterInput($_REQUEST['term']));
        if (!isset($q))
            exit;
        if ($CFG['site']['searchbyoption'] == 'city')
        {
            $data = array();
            $sql = "SELECT cityname FROM " . $CFG['table']['city'] .
                " WHERE cityname LIKE '" . mysqli_real_escape_string($this->DBCONN,$q) .
                "%' AND city_status='1' ORDER BY cityname ASC ";
            $rs = mysqli_query($this->DBCONN,$sql) or die(mysqli_error($this->DBCONN));
            if ($rs && mysqli_num_rows($rs))
            {
                while ($row = mysqli_fetch_array($rs, MYSQL_ASSOC))
                {
                    $data[] = array('label' => $row['cityname'], 'value' => $row['cityname']);
                }
            }
        } elseif ($CFG['site']['searchbyoption'] == 'zip')
        {
            $data = array();
            $sql = "SELECT zipcode FROM " . $CFG['table']['zipcode'] .
                " WHERE zipcode LIKE '" . mysqli_real_escape_string($this->DBCONN,$q) .
                "%' AND zipcode_status='1'  GROUP BY zipcode ORDER BY zipcode ASC";
            $rs = mysqli_query($this->DBCONN,$sql) or die(mysqli_error($this->DBCONN));
            if ($rs && mysqli_num_rows($rs))
            {
                while ($row = mysqli_fetch_array($rs, MYSQL_ASSOC))
                {
                    $data[] = array('label' => $row['zipcode'], 'value' => $row['zipcode']);
                }
            }
        } elseif ($CFG['site']['searchbyoption'] == 'area')
        {
            $data = array();
            $sql = "SELECT areaname FROM " . $CFG['table']['zipcode'] .
                " WHERE areaname LIKE '" . mysqli_real_escape_string($this->DBCONN,$q) .
                "%' AND zipcode_status='1' ORDER BY areaname ASC ";
            $rs = mysqli_query($this->DBCONN,$sql) or die(mysqli_error($this->DBCONN));
            if ($rs && mysqli_num_rows($rs))
            {
                while ($row = mysqli_fetch_array($rs, MYSQL_ASSOC))
                {
                    $data[] = array('label' => $row['areaname'], 'value' => $row['areaname']);
                }
            }
        }
        
        echo json_encode($data);
        flush();

    }
    #--------------------------------------------------------------------------------
    #Auto Suggest Zip Code
    /**
     * Common::autoSuggestZipCode()
     * 
     * @return
     */
    function autoSuggestZipCode()
    {
        global $CFG, $objSmarty;

        $q = strtolower($this->filterInput($_REQUEST['term']));
        if (!isset($q))
            exit;

        $data = array();

        if (is_numeric($q))
        {
            $sql = "SELECT distinct(zipcode) FROM " . $CFG['table']['zipcode'] .
                " WHERE zipcode LIKE '" . mysqli_real_escape_string($this->DBCONN,$q) .
                "%' AND zipcode_status='1' AND cityid = '" . $this->filterInput($_REQUEST['city']) .
                "' ORDER BY zipcode ASC ";
            $rs = mysqli_query($this->DBCONN,$sql) or die(mysqli_error($this->DBCONN));
            if ($rs && mysqli_num_rows($rs))
            {
                while ($row = mysqli_fetch_array($rs, MYSQL_ASSOC))
                {
                    $data[] = array('label' => $row['zipcode'], 'value' => $row['zipcode']);
                }
            }
        }

        echo json_encode($data);
        flush();
    }
    #--------------------------------------------------------------------------------
    #Auto Suggest By Area
    /**
     * Common::autoSuggestByCuisine()
     * 
     * @return
     */
    function autoSuggestByCuisine()
    {
        global $CFG, $objSmarty;

        $q = strtolower($this->filterInput($_REQUEST['term']));
        if (!isset($q))
            exit;

        $data = array();

        $sql = "SELECT cuisine_name FROM " . $CFG['table']['cuisine'] .
            " WHERE delete_status = 'No' AND cuisine_name LIKE '%" . $q . "%' AND cuisine_status ='1' ";
        $rs = mysqli_query($this->DBCONN,$sql) or die(mysqli_error($this->DBCONN));
        if ($rs && mysqli_num_rows($rs))
        {
            while ($row = mysqli_fetch_array($rs, MYSQL_ASSOC))
            {
                $data[] = array('label' => stripslashes($row['cuisine_name']), 'value' =>
                        stripslashes($row['cuisine_name']));
            }
        }
        echo json_encode($data);
        flush();
    }
    #--------------------------------------------------------------------------------
    #Auto Suggest By Area
    /**
     * Common::autoSuggestByRestaurant()
     * 
     * @return
     */
    function autoSuggestByRestaurant()
    {
        global $CFG, $objSmarty;

        $q = strtolower($this->filterInput($_REQUEST['term']));
        if (!isset($q))
            exit;

        $data = array();

        $sql = "SELECT restaurant_name FROM " . $CFG['table']['restaurant'] .
            " WHERE restaurant_name LIKE '%" . $q .
            "%' AND restaurant_status ='1' AND (restaurant_delivery = 'Yes' OR restaurant_pickup = 'Yes') ";
        $rs = mysqli_query($this->DBCONN,$sql) or die(mysqli_error($this->DBCONN));
        if ($rs && mysqli_num_rows($rs))
        {
            while ($row = mysqli_fetch_array($rs, MYSQL_ASSOC))
            {
                $data[] = array('label' => stripslashes($row['restaurant_name']), 'value' =>
                        stripslashes($row['restaurant_name']));
            }
        }
        echo json_encode($data);
        flush();
    }
    #--------------------------------------------------------------------------------

    #Top Restauraunt by Cuisine
    /**
     * Common::topRestaurantByCuisine()
     * 
     * @return
     */
    function topRestaurantByCuisine()
    {
        global $CFG, $objSmarty;

        $sqlsel = "SELECT cuis.cuisine_id, cuis.cuisine_name, cuis.cuisine_photo, cuis.cuisine_seourl, COUNT(rsc.restaurant_id) AS cuisine_noofcnt  " .
            " FROM " . $CFG['table']['cuisine'] . " as cuis " . " RIGHT JOIN " . $CFG['table']['restaurant_serving_cuisines'] .
            " AS rsc ON cuis.cuisine_id = rsc.cuisine_id " . " RIGHT JOIN " . $CFG['table']['restaurant'] .
            " AS rs ON rsc.restaurant_id = rs.restaurant_id " .
            " WHERE cuis.cuisine_status = '1'  AND cuis.delete_status = 'No' AND rs.delete_status = 'No' AND rs.restaurant_status = '1' AND (rs.restaurant_delivery = 'Yes' OR rs.restaurant_pickup = 'Yes') GROUP BY cuis.cuisine_id ORDER BY cuisine_noofcnt DESC LIMIT 5";
        $sqlres = $this->ExecuteQuery($sqlsel, 'select');

        #echo "<pre>";print_r($sqlres);echo "</pre>";exit;
        #echo "<pre>";print_r($output_cuisine);echo "</pre>";
        $objSmarty->assign("topRestByCuisineList", $sqlres);
        $objSmarty->assign("topRestByCuisineTotal", count($sqlres));
    }
    #--------------------------------------------------------------------------------
    #Top Restauraunt by Location - Most Popular Cities
    /**
     * Common::topRestByMostPopularCities()
     * 
     * @return
     */
    function topRestByMostPopularCities()
    {
        global $CFG, $objSmarty;

        $sel = "SELECT cty.cityname, cty.city_id, cty.city_seourl, " .
            " COUNT(rs.restaurant_id) AS city_noofcnt, rs.restaurant_city " . " FROM " . $CFG['table']['restaurant'] .
            " AS rs " . " RIGHT JOIN " . $CFG['table']['city'] .
            " as cty ON rs.restaurant_city = cty.city_id" . " RIGHT JOIN " . $CFG['table']['restaurant_delivery_areas'] .
            " AS rda ON rs.restaurant_id = rda.restaurant_id " . " RIGHT JOIN " . $CFG['table']['restaurant_serving_cuisines'] .
            " AS rsc ON rs.restaurant_id = rsc.restaurant_id " .
            " WHERE rs.delete_status = 'No' AND rs.restaurant_status = '1' AND (rs.restaurant_delivery = 'Yes' OR rs.restaurant_pickup = 'Yes') GROUP BY rs.restaurant_city ORDER BY cty.cityname ASC LIMIT 70";
        $res = $this->ExecuteQuery($sel, 'select');
        #echo "<pre>";print_r($res);echo "</pre>";exit;
        $objSmarty->assign("topRestLocation_cities", $res);

        //$this->pr($res);
    }
    #--------------------------------------------------------------------------------
    #Top Restauraunt by Location - Areas
    /**
     * Common::topRestByAreas()
     * 
     * @return
     */
    function topRestByAreas()
    {
        global $CFG, $objSmarty;


        $sqlsel = " SELECT zip.areaname, zip.zipcode_id, zip.area_seourl, " .
            " COUNT(rda.restaurant_id) AS areas_noofcnt " . " FROM " . $CFG['table']['zipcode'] .
            " as zip " . " RIGHT JOIN " . $CFG['table']['restaurant_delivery_areas'] .
            " AS rda ON zip.zipcode_id = rda.zipcode_id " . " RIGHT JOIN " . $CFG['table']['restaurant'] .
            " AS rs ON rda.restaurant_id = rs.restaurant_id AND zip.zipcode_id = rs.restaurant_zip  " .
            " WHERE zip.zipcode_status = '1' AND rs.delete_status = 'No' AND rs.restaurant_status = '1' AND (rs.restaurant_delivery = 'Yes' OR rs.restaurant_pickup = 'Yes') GROUP BY zipcode_id ORDER BY areas_noofcnt DESC, zip.areaname ASC LIMIT 50";
            
            /*$sqlsel = " SELECT zip.areaname, zip.zipcode_id, zip.area_seourl, " .
            " COUNT(rs.restaurant_id) AS areas_noofcnt " . 
            " FROM " . $CFG['table']['zipcode'] . " as zip " . 
            " RIGHT JOIN " . $CFG['table']['restaurant'] . " AS rs ON zip.zipcode_id = rs.restaurant_zip  " .
            " WHERE zip.zipcode_status = '1' AND rs.delete_status = 'No' AND rs.restaurant_status = '1' AND (rs.restaurant_delivery = 'Yes' OR rs.restaurant_pickup = 'Yes') GROUP BY zipcode_id ORDER BY areas_noofcnt DESC, zip.areaname ASC LIMIT 50";   */                     
        #echo $sqlsel;
        $sqlres = $this->ExecuteQuery($sqlsel, 'select');

        //echo "<pre>";print_r($sqlres);echo "</pre>";//exit;

        #echo count($sqlresarea);

        $objSmarty->assign("topRestLocation_areas", $sqlres);
        $objSmarty->assign("topRestLocation_areasTotal", count($output_areas));
    }
    #................................................................................
    #Footer..........................................................................
    #................................................................................

    #Top Restauraunt by Location - Areas
    /**
     * Common::topRestByLocation()
     * 
     * @return
     */
    function topRestByLocation()
    {
        global $CFG, $objSmarty;
        /*$sqlsel="SELECT zip.areaname, zip.zipcode_id, zip.area_seourl , COUNT(rda.restaurant_id) AS areas_noofcnt".
        " FROM ".$CFG['table']['zipcode']." as zip ".
        " RIGHT JOIN ".$CFG['table']['restaurant_delivery_areas']." AS rda ON zip.zipcode_id = rda.zipcode_id ".
        " RIGHT JOIN ".$CFG['table']['restaurant']." AS rs ON rda.restaurant_id = rs.restaurant_id ".
        " WHERE zip.zipcode_status = '1' AND rs.restaurant_status = '1' AND (rs.restaurant_delivery = 'Yes' OR rs.restaurant_pickup = 'Yes') GROUP BY zipcode_id ORDER BY areas_noofcnt DESC LIMIT 7";*/
        /*$sqlsel="SELECT zip.areaname, zip.zipcode_id, zip.area_seourl , COUNT(rda.restaurant_id) AS areas_noofcnt".
        " FROM ".$CFG['table']['zipcode']." as zip ".
        " RIGHT JOIN ".$CFG['table']['restaurant_delivery_areas']." AS rda ON zip.zipcode_id = rda.zipcode_id ".
        " RIGHT JOIN ".$CFG['table']['restaurant']." AS rs ON rda.restaurant_id = rs.restaurant_id ".
        " WHERE zip.zipcode_status = '1' AND rs.restaurant_status = '1' AND (rs.restaurant_delivery = 'Yes' OR rs.restaurant_pickup = 'Yes') GROUP BY zipcode_id ORDER BY areas_noofcnt DESC LIMIT 7";	*/

        #---------------------------------------------------------------------restaurant innerpage details --------------------------------------->
        $sqlsel = "SELECT rs.restaurant_zip,rs.restaurant_name," . "zip.area_seourl" .
            " FROM " . $CFG['table']['restaurant'] . " as rs " . " RIGHT JOIN " . $CFG['table']['zipcode'] .
            " AS zip ON zip.zipcode_id = rs.restaurant_zip " .
            "WHERE zip.zipcode_status = '1' AND rs.delete_status = 'No' AND rs.restaurant_status = '1' AND (rs.restaurant_delivery = 'Yes' OR rs.restaurant_pickup = 'Yes') 
			 GROUP BY zipcode_id ORDER BY zipcode_id DESC LIMIT 7";

        /*	  $sqlsel="SELECT rs.zipcode_id,"."zip.area_seourl"." FROM ".$CFG['table']['restaurant_delivery_areas']." as rs "." RIGHT JOIN ".$CFG['table']['zipcode']." AS zip ON zip.zipcode_id = rs.zipcode_id "."RIGHT JOIN ".$CFG['table']['restaurant']." AS rt ON rs.restaurant_id = rt. 	restaurant_id "."WHERE zip.zipcode_status = '1' AND rt.restaurant_status = '1' AND (rt.restaurant_delivery = 'Yes' OR rt.restaurant_pickup = 'Yes') GROUP BY zipcode_id ORDER BY zipcode_id ";	*/
        /* $sqlsel="SELECT rs.restaurant_zip,"."zip.area_seourl"." FROM ".$CFG['table']['restaurant']." as rs ".
        " RIGHT JOIN ".$CFG['table']['zipcode']." AS zip ON zip.zipcode_id = rs.restaurant_zip ".
        " RIGHT JOIN ".$CFG['table']['restaurant_delivery_areas']." AS ar ON ar.zipcode_id = rs.restaurant_zip ".
        "WHERE zip.zipcode_status = '1' AND rs.restaurant_status = '1' AND (rs.restaurant_delivery = 'Yes' OR rs.restaurant_pickup = 'Yes') GROUP BY ar.zipcode_id ORDER BY ar.zipcode_id DESC LIMIT 7";	*/

        $sqlres = $this->ExecuteQuery($sqlsel, 'select');
        //echo "<pre>";print_r($sqlres);echo "</pre>";
        if (count($sqlres))
        {
            foreach ($sqlres as $key => $val)
            {
                $sqlres[$key]['areaname'] = $this->Getvalue("areaname", $CFG['table']['zipcode'],
                    " zipcode_id='" . $this->filterInput($sqlres[$key]['restaurant_zip']) . "'");
            }
        }

        /*	 if( count($sqlres) ){
        foreach($sqlres as $key=>$val){
        //$sqlres[$key]['areaname']=$this->Getvalue("areaname",$CFG['table']['zipcode']," zipcode_id='".$sqlres[$key]['restaurant_zip']."'");
        $sqlres[$key]['city_noofcnt']=$this->getNumValues($CFG['table']['zipcode']," zipcode_id ='".$sqlres[$key]['restaurant_zip']."'");
        }
        }*/
        //	echo "<pre>";print_r($sqlres);echo "</pre>";
        $objSmarty->assign("topRestLocationList", $sqlres);
        $objSmarty->assign("topRestLocationListTotal", count($output_areas));
    }
    #--------------------------------------------------------------------------------
    #Top cuisines restaurants
    /**
     * Common::topCuisineRestaurants()
     * 
     * @return
     */
    function topCuisineRestaurants()
    {
        global $CFG, $objSmarty;

        $sqlsel = "SELECT cuis.cuisine_id, cuis.cuisine_name, cuis.cuisine_seourl , COUNT(rsc.restaurant_id) AS cuisine_noofcnt" .
            " FROM " . $CFG['table']['cuisine'] . " as cuis " . " RIGHT JOIN " . $CFG['table']['restaurant_serving_cuisines'] .
            " AS rsc ON cuis.cuisine_id = rsc.cuisine_id " . " RIGHT JOIN " . $CFG['table']['restaurant'] .
            " AS rs ON rsc.restaurant_id = rs.restaurant_id " .
            " WHERE cuis.cuisine_status = '1' AND cuis.delete_status = 'No' AND rs.delete_status = 'No' AND rs.restaurant_status = '1' AND (rs.restaurant_delivery = 'Yes' OR rs.restaurant_pickup = 'Yes') GROUP BY cuis.cuisine_id ORDER BY cuisine_noofcnt DESC LIMIT 7";
        $sqlres = $this->ExecuteQuery($sqlsel, 'select');

        $objSmarty->assign("topCuisineRestList", $sqlres);
        $objSmarty->assign("topCuisineRestListTotal", count($sqlres));
    }

    #--------------------------------------------------------------------------------
    #Featured Restauraunt Hot Offers
    /**
     * Common::FeaturedRestHotOffers()
     * 
     * @return
     */
    function FeaturedRestHotOffers()
    {
        global $CFG, $objSmarty;

        $today = date("Y-m-d");

        $sqlsel = "SELECT ro.offer_id, ro.offer_percentage, ro.offer_price, ro.offer_valid_from, ro.offer_valid_to," .
            " rs.restaurant_id, rs.restaurant_name, rs.restaurant_logo, rs.restaurant_seourl " .
            " FROM " . $CFG['table']['restaurant_offer'] . " AS ro " . " RIGHT JOIN " . $CFG['table']['restaurant'] .
            " AS rs ON ro.restaurant_id = rs.restaurant_id " .
            " WHERE rs.delete_status = 'No' AND ro.offer_valid_from <= '" . $today .
            "' AND ro.offer_valid_to >= '" . $today .
            "' AND ro.status = '1' AND rs.restaurant_status = '1' AND (rs.restaurant_delivery = 'Yes' OR rs.restaurant_pickup = 'Yes') GROUP BY ro.restaurant_id ORDER BY ro.offer_percentage DESC LIMIT 5 ";
        $sqlres = $this->ExecuteQuery($sqlsel, 'select');
        foreach ($sqlres as $key => $val)
        {
            $sqlres[$key]['exp_per'] = explode(".", $sqlres[$key]['offer_percentage']);
        }
        //echo "<pre>";print_r($sqlres);echo "</pre>";
        $objSmarty->assign("featureRestaurantHotoffersList", $sqlres);
        $objSmarty->assign("featureRestaurantHotoffersTotal", count($sqlres));
        return true;
    }
    #----------------------------------------------------------------------------------
    #Featured Restauraunts Table Booking
    /**
     * Common::FeaturedRestTableBooking()
     * 
     * @return
     */
    function FeaturedRestTableBooking()
    {
        global $CFG, $objSmarty;

        $sqlsel = "SELECT restaurant_id, restaurant_name, restaurant_logo, restaurant_seourl FROM " .
            $CFG['table']['restaurant'] .
            " WHERE delete_status = 'No' AND restaurant_status = '1' AND (restaurant_delivery = 'Yes' OR restaurant_pickup = 'Yes') AND restaurant_feature_status = 'Yes' ORDER BY RAND() LIMIT 0,5";
        $sqlres = $this->ExecuteQuery($sqlsel, 'select');
        $objSmarty->assign("featurerestaurantTableBookingList", $sqlres);
        $objSmarty->assign("featurerestaurantTableBookingCntList", count($sqlres));
        return true;
    }
    #----------------------------------------------------------------------------------
    #Footer List
    /**
     * Common::footerContentList()
     * 
     * @return
     */
    function footerContentList()
    {
        global $CFG, $objSmarty;

        $sqlsel = "SELECT content_title, content_seourl FROM " . $CFG['table']['content'] .
            " WHERE status = '1' AND display_footer = 'F' ORDER BY sortorder ASC ";
        $sqlres = $this->ExecuteQuery($sqlsel, 'select');
        $objSmarty->assign("footerContentList", $sqlres);
        $objSmarty->assign("footerContentCntList", count($sqlres));

    }
    #----------------------------------------------------------------------------------
    #Footer List
    /**
     * Common::howitworkContentList()
     * 
     * @return
     */
    function howitworkContentList()
    {
        global $CFG, $objSmarty;

        $sqlsel = "SELECT content_title, content_seourl FROM " . $CFG['table']['content'] .
            " WHERE status = '1' AND display_footer != 'F' AND display_customer != 'CR' ORDER BY sortorder ASC ";
        $sqlres = $this->ExecuteQuery($sqlsel, 'select');
        $objSmarty->assign("howContentList", $sqlres);
        $objSmarty->assign("howContentCntList", count($sqlres));

    }
    #------------------------------------------------------------------------------
    #Static Content List
    /**
     * Common::staticContentList()
     * 
     * @return
     */
    function staticContentList($title)
    {
        global $CFG, $objSmarty;

        $sqlsel = "SELECT content_title, content, metatagtitle, metatagdescription, metatagkeyword FROM " .
            $CFG['table']['content'] . " WHERE content_seourl = '" . $this->filterInput($title) .
            "' AND status = '1' LIMIT 1 ";
        $sqlres = $this->ExecuteQuery($sqlsel, 'select');
        $objSmarty->assign("staticContentList", $sqlres);

        #Meta Tag
        $objSmarty->assign('Meta_Tag_Title', $this->My_stripslashes($sqlres['0']['content_title']));
        $objSmarty->assign('Meta_Tag_Keyword', $this->My_stripslashes(strtolower($sqlres['0']['content_title'])));
        $objSmarty->assign('Meta_Tag_Desc', $this->My_stripslashes(strtolower($sqlres['0']['content_title'])));

    }
    #-----------------------------------------------------------------------------
    #Terms And Condition
    /**
     * Common::termsList()
     * 
     * @return
     */
    function termsList()
    {
        global $CFG, $objSmarty;

        $sqlsel = "SELECT content_title, content_seourl, content FROM " . $CFG['table']['content'] .
            " WHERE status = '1' AND termscondition = 'Yes' ORDER BY sortorder DESC LIMIT 2 ";
        $sqlres = $this->ExecuteQuery($sqlsel, 'select');
        #echo "<pre>";print_r($sqlres);echo "</pre>";
        $objSmarty->assign("termsContentList", $sqlres);
    }
    #----------------------------------------------------------------------------------
    #Followers List
    /**
     * Common::followersList()
     * 
     * @return
     */
    function followersList()
    {
        global $CFG, $objSmarty;

        $sqlsel = "SELECT followers_name, followers_url, followers_logo FROM " . $CFG['table']['followers'] .
            " WHERE followers_status = '1'";
        $sqlres = $this->ExecuteQuery($sqlsel, 'select');
        $objSmarty->assign("footerFollowersList", $sqlres);
        $objSmarty->assign("footerFollowersCntList", count($sqlres));
    }
    #----------------------------------------------------------------------------------
    #Followers List
    /**
     * Common::followersHeaderList()
     * 
     * @return
     */
    function followersHeaderList()
    {
        global $CFG, $objSmarty;

        $sqlsel = "SELECT followers_name, followers_url, followers_logo FROM " . $CFG['table']['followers'] .
            " WHERE followers_header = 'Yes' AND followers_status = '1'";
        $sqlres = $this->ExecuteQuery($sqlsel, 'select');
        $objSmarty->assign("headerFollowersList", $sqlres);
    }
    #------------------------------------------------------------------------------
    #Static Faq List
    /**
     * Common::staticFaqList()
     * 
     * @return
     */
    function staticFaqList()
    {
        global $CFG, $objSmarty;

        $sqlsel = "SELECT question, answer FROM " . $CFG['table']['faq'] .
            " WHERE faq_status = '1' ";
        $sqlres = $this->ExecuteQuery($sqlsel, 'select');
        $objSmarty->assign("staticFaqList", $sqlres);

    }
    #------------------------------------------------------------------------------
    #Static footerPopularRestaurant List
    /**
     * Common::footerPopularRestaurantList()
     * 
     * @return
     */
    function footerPopularRestaurantList()
    {
        global $CFG, $objSmarty;

        $sqlsel = "SELECT restaurant_id, restaurant_name, restaurant_seourl FROM " . $CFG['table']['restaurant'] .
            " WHERE delete_status = 'No' AND restaurant_status = '1' AND (restaurant_delivery = 'Yes' OR restaurant_pickup = 'Yes') AND  restaurant_footer_status = 'Yes' ORDER BY RAND() LIMIT 8";
        $sqlres = $this->ExecuteQuery($sqlsel, 'select');

        foreach ($sqlres as $key => $val)
        {
            $sqlres[$key]['menucount'] = $this->getNumValues($CFG['table']['restaurant_menu'],
                " restaurant_id='" . $this->filterInput($sqlres[$key]['restaurant_id']) . "'");
        }

        #echo "menu count: ". $sqlres[0]['menucount'];

        $objSmarty->assign("restaurantPopularFooterList", $sqlres);
    }

    #................................................................................
    #View More..........................................................................
    
    /**
     * Common::cusinecnt()
     * 
     * @return
     */
    function cusinecnt($cid)
    {
        global $CFG, $objSmarty;

        $sqlsel = " SELECT rsc.cuisine_id " . " FROM " . $CFG['table']['restaurant_serving_cuisines'] .
            " as rsc " . " RIGHT JOIN " . $CFG['table']['restaurant'] .
            " AS rs ON rsc.restaurant_id = rs.restaurant_id " . " WHERE rsc.cuisine_id ='" .
            $cid . "' AND rs.delete_status = 'No' AND rs.restaurant_status = '1' AND (rs.restaurant_delivery = 'Yes' OR rs.restaurant_pickup = 'Yes') ";
        $sqlres = $this->ExecuteQuery($sqlsel, 'select');
        $cnt = count($sqlres);
        return $cnt;

    }
    
    #----------------------------------------------------------------------------------
    /**
     * Common::arraySortByElements()
     * 
     * @return
     */
    function arraySortByElements($array2sort, $sortField, $order, $nolimit = 0, $iscount = false)
    {
        #echo $nolimit;

        $functionString = '
		if (' . ($iscount ? 'true' : 'false') . '){
		if(count($a["' . $sortField . '"]) > count($b["' . $sortField .
            '"])) return 1*' . $order . ';
		if(count($a["' . $sortField . '"]) < count($b["' . $sortField .
            '"])) return -1*' . $order . ';
		}else{
		if($a["' . $sortField . '"] > $b["' . $sortField . '"]) return 1*' . $order .
            ';
		if($a["' . $sortField . '"] < $b["' . $sortField . '"]) return -1*' . $order .
            ';
		}
		return 0;';

        usort($array2sort, create_function('$a,$b', $functionString));

        if ($nolimit > 0)
        {
            $array3sort = array_slice($array2sort, 0, $nolimit);
        } else
        {
            $array3sort = $array2sort;
        }
        #echo "<pre>output=>";print_r($array3sort);echo "</pre>";
        return $array3sort;
    }
    
    #-------------------------------------------------------------------------------------
    #State Wise city List
    /**
     * Common::stateWiseCityList()
     * 
     * @return
     */
    function stateWiseCityList($state)
    {
        global $CFG, $objSmarty;

        $getresid = $this->getValue("restaurant_id", $CFG['table']['restaurant'],
            "restaurant_state = '" . $this->filterInput($state) . "'");
        $getcuisineid = $this->getValue("cuisine_id", $CFG['table']['cuisine'],
            "cuisine_seourl = '" . $this->filterInput($_GET['cuisine']) . "'");
        /*if( isset($getcuisineid) && !empty($getcuisineid) ){
        $condition .= "AND rsc.cuisine_id = '".$getcuisineid."' ";
        }*/

        $sqlsel = "SELECT cty.cityname, cty.city_id, cty.city_seourl, " .
            " COUNT(rs.restaurant_id) AS city_noofcnt, rs.restaurant_city " . " FROM " . $CFG['table']['city'] .
            " as cty " . " RIGHT JOIN " . $CFG['table']['restaurant'] .
            " AS rs ON ( cty.statecode = rs.restaurant_state AND cty.city_id = rs.restaurant_city ) " .
            /*" RIGHT JOIN ".$CFG['table']['restaurant_serving_cuisines']." AS rsc ON rs.restaurant_id = rsc.restaurant_id ".
            " RIGHT JOIN ".$CFG['table']['cuisine']." AS cu ON rsc.cuisine_id = cu.cuisine_id ".*/
            " WHERE rs.delete_status = 'No' AND cty.statecode = '" . $state . "' " . $condition .
            "  AND cty.city_status = '1' AND rs.restaurant_status = '1' AND (rs.restaurant_delivery = 'Yes' OR rs.restaurant_pickup = 'Yes') GROUP BY cty.cityname ORDER BY cty.cityname ASC ";

        $sqlres = $this->ExecuteQuery($sqlsel, 'select');

        $objSmarty->assign("statewiseCitydetails", $sqlres);
        $objSmarty->assign("statewiseCityTotal", count($sqlres));
    }
    #-------------------------------------------------------------------------------------
    
    /**
     * Common::cuisineCnt()
     * 
     * @return
     */
    function cuisineCnt($cuid)
    {
        global $CFG, $objSmarty;

        $sel_cui = " SELECT " . "rs.restaurant_id " . " FROM " . $CFG['table']['restaurant'] .
            " AS rs " . " RIGHT JOIN " . $CFG['table']['restaurant_serving_cuisines'] .
            " AS rsc ON rs.restaurant_id = rsc.restaurant_id " . " RIGHT JOIN " . $CFG['table']['cuisine'] .
            " AS cu ON cu.cuisine_id = rsc.cuisine_id " . " WHERE rsc.cuisine_id = '" . $this->filterInput($cuid) .
            "' AND rs.delete_status = 'No' AND rs.restaurant_status = '1' AND (rs.restaurant_delivery = 'Yes' OR rs.restaurant_pickup = 'Yes') GROUP BY rsc.cuisine_id ORDER BY cu.cuisine_name DESC ";
        $res_cui = $this->ExecuteQuery($sel_cui, 'select');
        $cuisinecount = count($res_cui);
        return $cuisinecount;
    }
    #------------------------------------------------------------------------------------
    /**
     * Common::updateGuestInfo()
     * 
     * @return
     */
    function updateGuestInfo()
    {
        global $CFG, $objSmarty;


        /*$checkvalidDomain = $this->checkEmailValidDomain($_POST['guest_email']);
        echo $checkvalidDomain;
        if($checkvalidDomain == 0 || $checkvalidDomain == false){
        echo 'invalid_domain';
        }*/


        $guestnum = $this->getNumValues("rt_guestdemo", " guest_email = '" . $this->
            filterInput($_POST['guest_email']) . "' AND guest_country = '" . $this->
            filterInput($_POST['guest_country']) . "' ");

        //Check Valid Email
        list($userName, $mailDomain) = explode("@", $_POST['guest_email']);
        $checkvalidDomain = checkdnsrr($mailDomain, "MX");
        if ($checkvalidDomain != 1)
        {
            echo 'invalid_domain';
        } elseif ($_COOKIE['comeneatCookie'] == '' && $guestnum == 0)
        {

            $sql_ins = "INSERT INTO rt_guestdemo SET guest_name = '" . $this->filterInput($_POST['guest_name']) .
                "', guest_email = '" . $this->filterInput($_POST['guest_email']) .
                "', guest_country = '" . $this->filterInput($_POST['guest_country']) .
                "', guest_skypeid = '" . $this->filterInput($_POST['guest_skypeid']) .
                "', addeddate='" . CUR_TIME . "'  ";
            $res_ins = $this->ExecuteQuery($sql_ins, 'insert');

            $value = $_POST['guest_email'];
            setcookie("comeneatCookie", $value, time() + 3600 * 24);

            echo 'success';
        } else
        {
            $sql_ins = "UPDATE rt_guestdemo SET addeddate='" . CUR_TIME . "'  ";
            $res_ins = $this->ExecuteQuery($sql_ins, 'update');

            $value = $_POST['guest_email'];
            setcookie("comeneatCookie", $value, time() + 3600 * 24);

            echo 'success';
        }
    }
    #-------------------------------------------------------------------------------------
    #ContactUs Form
    /**
     * Common::contactUsSubmit()
     * 
     * @return
     */
    function contactUsSubmit()
    {
        global $CFG, $objSmarty;

        $contactname = $this->filterInput($_POST['contact_name']);
        $contact_email = $this->filterInput($_POST['contact_email']);
        $contact_ordernumber = $this->filterInput($_POST['contact_ordernumber']);
        $contact_orderdate = $this->filterInput($_POST['contact_orderdate']);
        $contact_restaurantname = $this->filterInput($_POST['contact_restaurantname']);
        $contact_comments = $this->filterInput($_POST['contact_comments']);
        $contact_digit = $this->filterInput($_POST['contact_digit']);
        $captchcode = $this->filterInput($_POST['captchcode']);
        #$captchaCode            = $this->captchaCode();
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

        if (isset($contactname) && empty($contactname))
        {
            $error = "Please enter contact name";
        } elseif (isset($contact_email) && empty($contact_email))
        {
            $error = "Please enter contact e-mail address";
        } elseif (!preg_match($regex, $contact_email))
        {
            $error = "Please enter valid e-mail address";
        } elseif (isset($contact_digit) && empty($contact_digit))
        {
            $error = "Please enter security code";
        } elseif ($contact_digit != $captchcode)
        {
            $error = "Please enter correct security code";
        } elseif (isset($contactname) && !empty($contactname) && isset($contact_email) &&
        !empty($contact_email) && isset($contact_digit) && !empty($contact_digit))
        {
            $inssel = "INSERT INTO 
        							" . $CFG['table']['contactus'] . " 
        					SET
        							contact_name 			= '" . $this->filterInput($contactname) . "',
        							contact_email 			= '" . $this->filterInput($contact_email) . "',
        							contact_ordernumber 	= '" . $this->filterInput($contact_ordernumber) . "',
        							contact_orderdate 		= '" . $this->filterInput($contact_orderdate) . "',
        							contact_restaurantname 	= '" . $this->filterInput($contact_restaurantname) . "',
        							contact_comments		= '" . $this->filterInput($contact_comments) . "',
        							addeddate 		= '" . CUR_TIME . "' ";
            $sqlres = $this->ExecuteQuery($inssel, 'insert');
            if ($sqlres)
            {

                if (empty($contact_ordernumber))
                {
                    $contact_ordernumber = '--';
                }
                if (empty($contact_orderdate))
                {
                    $contact_orderdate = '--';
                }
                if (empty($contact_restaurantname))
                {
                    $contact_restaurantname = '--';
                }
                if (empty($contact_comments))
                {
                    $contact_comments = '--';
                }

                $toemail = $CFG['site']['supportemail'];

                $mailsubject = $CFG['site']['sitename'] . ": Contact Us Details";
                $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] .
                    "/emailContactus.tpl");
                $mail_content = str_replace('{SITE_URL}', $CFG['site']['base_url'], $mail_content);
                $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
                $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
                $mail_content = str_replace('{CONTACTNAME}', stripslashes($_POST['contact_name']), $mail_content);
                $mail_content = str_replace('{CONTACTEMAIL}', $contact_email, $mail_content);
                $mail_content = str_replace('{ORDERNUMBER}', $contact_ordernumber, $mail_content);
                $mail_content = str_replace('{ORDERDATE}', $contact_orderdate, $mail_content);
                $mail_content = str_replace('{RESTAURANTNAME}', $contact_restaurantname, $mail_content);
                $mail_content = str_replace('{COMMENTS}', stripslashes($_POST['contact_comments']), $mail_content);

                $this->sendMail(stripslashes($_POST['contact_name']), $contact_email, $toemail, $mailsubject, $mail_content,
                    $mail_attachment_name = '', $mail_attachment_content = '');
            }
            if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
                $this->redirectUrl($CFG['site']['base_url'] . "/contactUs.php?msg=succ");
    		}else{
                $this->redirectUrl($CFG['site']['base_url'].'/contact-us/succ');
    		}
            
        }
        return $error;

    }
    #------------------------------------------------------------------------------
    #Banner List
    /**
     * Common::bannerList()
     * 
     * @return
     */
    function bannerList()
    {
        global $CFG, $objSmarty;

        $sqlsel = "SELECT banner_photo FROM " . $CFG['table']['indexbanner'] .
            " WHERE banner_status = '1' ORDER BY banner_id ASC";
        $sqlres = $this->ExecuteQuery($sqlsel, 'select');
        #echo "<pre>";print_r($sqlres);echo "</pre>";
        $objSmarty->assign("bannerList", $sqlres);
    }
    #------------------------------------------------------------------------------
    #Banner List
    /**
     * Common::site_metatag_info()
     * 
     * @return
     */
    function site_metatag_info()
    {
        global $CFG, $objSmarty;

        $selqry = "SELECT site_metatag_title, site_metatag_keyword, site_metatag_desc FROM " .
            $CFG['table']['sitesetting'] . " WHERE id='1' ";
        $sqlres = $this->ExecuteQuery($selqry, 'select');
        $objSmarty->assign("site_metatag_info", $sqlres);
    }
    #--------------------------------------------------------------------------------
    #Restaurant List Why Not Try
    /**
     * Common::restaurantListIndex()
     * 
     * @return
     */
    function restaurantListIndex($searcharea)
    {
        global $CFG, $objSmarty;

       
        if (isset($searcharea) && !empty($searcharea))
        {

            if (!empty($searcharea))
            {
                $res_city = $searcharea;
                //$_SESSION['searcharea'] = $_REQUEST['searcharea'];
            }

            #Calculate Lattitude & longtitude for search area------------------------------------
            list($find_lat, $find_long) = $this->findLatLongFromAddress($res_straddress = '',
                $res_area = '', $res_city, $res_state = '', $rest_country = '');

            if (!empty($find_lat) && !empty($find_long))
            {
                $select_gmap_service = " ROUND(  ( 3959  * acos( cos( radians(" . $find_lat .
                    ") ) * cos( radians( rest.restaurant_lat ) ) * cos( radians( rest.restaurant_long ) - radians(" .
                    $find_long . ") ) + sin( radians(" . $find_lat .
                    ") ) * sin( radians( rest.restaurant_lat ) ) ) ),2  ) AS distance, ";
            }

            #$gps_restaurant_id = $this->searchResultRestaurant_GPS();
            if (isset($select_gmap_service) && !empty($select_gmap_service))
            {

                mysqli_query($this->DBCONN,"SET OPTION SQL_BIG_SELECTS=1");
                $sqlsel = " SELECT " . $select_gmap_service .
                    " rest.restaurant_id, rest.restaurant_delivery_distance " . "	FROM " . $CFG['table']['restaurant'] .
                    " AS rest " . " LEFT JOIN " . $CFG['table']['zipcode'] .
                    " AS zip ON rest.restaurant_zip = zip.zipcode_id " .
                    "	WHERE rest.delete_status = 'No' AND rest.restaurant_status = '1'  " . $wherecond .
                    "  " . $cond_gmap_service . " ORDER BY distance ASC ";
                $sqlres = $this->ExecuteQuery($sqlsel, 'select');

                #echo "<pre>";print_r($sqlres);echo "</pre>";
                if (count($sqlres) > 0)
                {
                    foreach ($sqlres as $key => $value)
                    {

                        if (empty($sqlres[$key]['distance']))
                        {
                            $sqlres[$key]['distance'] = '0.00';
                        }

                        //if( ($sqlres[$key]['restaurant_delivery_distance'] >= $sqlres[$key]['distance']) || ($sqlres[$key]['restaurant_delivery_distance'] == 0 &&  $sqlres[$key]['distance'] <= 1) ){
                        if (($sqlres[$key]['restaurant_delivery_distance'] >= $sqlres[$key]['distance']) ||
                            ($sqlres[$key]['restaurant_delivery_distance'] == 0 && $sqlres[$key]['distance'] <=
                            1))
                        {
                            $service_rest_id[] = $sqlres[$key]['restaurant_id'];
                        }
                        //$service_rest_id[] = $sqlres[$key]['restaurant_id'];
                    } //end for foreach
                }
                #echo "<pre>";print_r($service_rest_id);echo "</pre>";
                #echo "<pre>";print_r($sqlres);echo "</pre>";

                if (!empty($service_rest_id))
                    $gps_restaurant_id = implode(',', $service_rest_id);
            }

            if (isset($gps_restaurant_id) && !empty($gps_restaurant_id))
            {
                //echo "<br>Vino=>".$gps_restaurant_id;

                $wherecond .= " AND rest.restaurant_id IN (" . $gps_restaurant_id . ") ";
            }

        }
        #echo "<br>www-->".$wherecond;

        $sortby = " ORDER BY restaurant_id DESC";

        $today = date("Y-m-d");
        $day = date("l");
        if ($day == "Monday")
        {

            $open_close_time_cond =
                ", rest.restaurant_delivery_mon_opentime AS open_time, rest.restaurant_delivery_mon_closetime AS close_time, rest.restaurant_delivery_tue_opentime, rest.restaurant_delivery_tue_closetime, rest.restaurant_delivery_wed_opentime, rest.restaurant_delivery_wed_closetime, rest.restaurant_delivery_thu_opentime, rest.restaurant_delivery_thu_closetime, rest.restaurant_delivery_fri_opentime, rest.restaurant_delivery_fri_closetime, rest.restaurant_delivery_sat_opentime, rest.restaurant_delivery_sat_closetime, rest.restaurant_delivery_sun_opentime AS pre_open_time, rest.restaurant_delivery_sun_closetime AS pre_close_time, ";
        } elseif ($day == "Tuesday")
        {

            $open_close_time_cond =
                ", rest.restaurant_delivery_mon_opentime AS pre_open_time, rest.restaurant_delivery_mon_closetime AS pre_close_time, rest.restaurant_delivery_tue_opentime AS open_time, rest.restaurant_delivery_tue_closetime AS close_time, rest.restaurant_delivery_wed_opentime, rest.restaurant_delivery_wed_closetime, rest.restaurant_delivery_thu_opentime, rest.restaurant_delivery_thu_closetime, rest.restaurant_delivery_fri_opentime, rest.restaurant_delivery_fri_closetime, rest.restaurant_delivery_sat_opentime, rest.restaurant_delivery_sat_closetime, rest.restaurant_delivery_sun_opentime, rest.restaurant_delivery_sun_closetime, ";
        } elseif ($day == "Wednesday")
        {

            $open_close_time_cond =
                ", rest.restaurant_delivery_mon_opentime, rest.restaurant_delivery_mon_closetime, rest.restaurant_delivery_tue_opentime AS pre_open_time, rest.restaurant_delivery_tue_closetime AS pre_close_time, rest.restaurant_delivery_wed_opentime AS open_time, rest.restaurant_delivery_wed_closetime AS close_time, rest.restaurant_delivery_thu_opentime, rest.restaurant_delivery_thu_closetime, rest.restaurant_delivery_fri_opentime, rest.restaurant_delivery_fri_closetime, rest.restaurant_delivery_sat_opentime, rest.restaurant_delivery_sat_closetime, rest.restaurant_delivery_sun_opentime, rest.restaurant_delivery_sun_closetime, ";
        } elseif ($day == "Thursday")
        {

            $open_close_time_cond =
                ", rest.restaurant_delivery_mon_opentime, rest.restaurant_delivery_mon_closetime, rest.restaurant_delivery_tue_opentime, rest.restaurant_delivery_tue_closetime, rest.restaurant_delivery_wed_opentime AS pre_open_time, rest.restaurant_delivery_wed_closetime AS pre_close_time, rest.restaurant_delivery_thu_opentime AS open_time, rest.restaurant_delivery_thu_closetime AS close_time, rest.restaurant_delivery_fri_opentime, rest.restaurant_delivery_fri_closetime, rest.restaurant_delivery_sat_opentime, rest.restaurant_delivery_sat_closetime, rest.restaurant_delivery_sun_opentime, rest.restaurant_delivery_sun_closetime, ";
        } elseif ($day == "Friday")
        {

            $open_close_time_cond =
                ", rest.restaurant_delivery_mon_opentime, rest.restaurant_delivery_mon_closetime, rest.restaurant_delivery_tue_opentime, rest.restaurant_delivery_tue_closetime, rest.restaurant_delivery_wed_opentime, rest.restaurant_delivery_wed_closetime, rest.restaurant_delivery_thu_opentime AS pre_open_time, rest.restaurant_delivery_thu_closetime AS pre_close_time, rest.restaurant_delivery_fri_opentime AS open_time, rest.restaurant_delivery_fri_closetime AS close_time, rest.restaurant_delivery_sat_opentime, rest.restaurant_delivery_sat_closetime, rest.restaurant_delivery_sun_opentime, rest.restaurant_delivery_sun_closetime, ";
        } elseif ($day == "Saturday")
        {

            $open_close_time_cond =
                ", rest.restaurant_delivery_mon_opentime, rest.restaurant_delivery_mon_closetime, rest.restaurant_delivery_tue_opentime, rest.restaurant_delivery_tue_closetime, rest.restaurant_delivery_wed_opentime, rest.restaurant_delivery_wed_closetime, rest.restaurant_delivery_thu_opentime, rest.restaurant_delivery_thu_closetime, rest.restaurant_delivery_fri_opentime AS pre_open_time, rest.restaurant_delivery_fri_closetime AS pre_close_time, rest.restaurant_delivery_sat_opentime AS open_time, rest.restaurant_delivery_sat_closetime AS close_time, rest.restaurant_delivery_sun_opentime, rest.restaurant_delivery_sun_closetime, ";
        } elseif ($day == "Sunday")
        {

            $open_close_time_cond =
                ", rest.restaurant_delivery_mon_opentime, rest.restaurant_delivery_mon_closetime, rest.restaurant_delivery_tue_opentime, rest.restaurant_delivery_tue_closetime, rest.restaurant_delivery_wed_opentime, rest.restaurant_delivery_wed_closetime, rest.restaurant_delivery_thu_opentime, rest.restaurant_delivery_thu_closetime, rest.restaurant_delivery_fri_opentime, rest.restaurant_delivery_fri_closetime, rest.restaurant_delivery_sat_opentime AS pre_open_time, rest.restaurant_delivery_sat_closetime AS pre_close_time, rest.restaurant_delivery_sun_opentime AS open_time, rest.restaurant_delivery_sun_closetime AS close_time, ";
        } else
        {
            $open_close_time_cond =
                ", rest.restaurant_delivery_mon_opentime, rest.restaurant_delivery_mon_closetime, rest.restaurant_delivery_tue_opentime, rest.restaurant_delivery_tue_closetime, rest.restaurant_delivery_wed_opentime, rest.restaurant_delivery_wed_closetime, rest.restaurant_delivery_thu_opentime, rest.restaurant_delivery_thu_closetime, rest.restaurant_delivery_fri_opentime, rest.restaurant_delivery_fri_closetime, rest.restaurant_delivery_sat_opentime, rest.restaurant_delivery_sat_closetime, rest.restaurant_delivery_sun_opentime, rest.restaurant_delivery_sun_closetime, ";
        }

        if (isset($wherecond) && !empty($wherecond))
        {

            mysqli_query($this->DBCONN,"SET OPTION SQL_BIG_SELECTS=1");

            $sqlsel1 = "SELECT rest.restaurant_id, rest.restaurant_name, rest.restaurant_seourl, rest.restaurant_phone, rest.restaurant_logo, rest.restaurant_website, rest.restaurant_zip, rest.restaurant_fax, rest.restaurant_streetaddress, rest.restaurant_contact_name, rest.restaurant_contact_phone, rest.restaurant_contact_email, rest.restaurant_description, rest.restaurant_estimated_time, rest.restaurant_delivery, rest.restaurant_delivery_charge, rest.restaurant_minorder_price, rest.restaurant_serving_cuisines, rest.restaurant_feature_status, restaurant_booktable " .
                $open_close_time_cond . " state.statename" . "	FROM " . $CFG['table']['restaurant'] .
                " AS rest " . " LEFT JOIN " . $CFG['table']['state'] .
                " AS state ON rest.restaurant_state = state.statecode " . " LEFT JOIN " . $CFG['table']['zipcode'] .
                " AS zip ON rest.restaurant_zip = zip.zipcode_id " .
                "	WHERE rest.delete_status = 'No' AND rest.restaurant_status = '1' AND (rest.restaurant_delivery = 'Yes' OR rest.restaurant_pickup = 'Yes') " .
                $wherecond . " GROUP BY rest.restaurant_id " . $sortby . " ";

            #echo "<br>res--->".$sqlsel;

            $sqlres1 = $this->ExecuteQuery($sqlsel1, 'select');
            foreach ($sqlres1 as $key => $val)
            {
                if (!empty($sqlres1[$key]['restaurant_serving_cuisines']))
                {
                    $sqlres1[$key]['servingcuisine'] = $this->getArrayCuisines($sqlres1[$key]['restaurant_serving_cuisines']);
                }
                $sqlres1[$key]['exp_per'] = explode(".", $sqlres1[$key]['offer_percentage']);

                /*$open_time   = date("H:i", strtotime($sqlres[$key]['open_time']));
                $close_time  = date("H:i", strtotime($sqlres[$key]['close_time']));
                $now_time	 = date("H:i");
                
                if($now_time >= $open_time && $now_time <= $close_time)
                {
                $sqlres[$key]['status']="Open";
                }
                else
                {
                $sqlres[$key]['status']="Closed";
                $sqlres[$key]['tomorrow'] = date("d-m-Y", strtotime("+1 day") ) ;
                $sqlres[$key]['tomorrowday'] = date("l", strtotime("+1 day") ) ;
                }*/

            }

        }
        #echo "<pre>";print_r($sqlres1);echo "</pre>";
        $objSmarty->assign("whynottryRestaurantlist", $sqlres1);
        $objSmarty->assign("whynottryRestaurantlistCount", count($sqlres1));
        return true;

    }
    #--------------------------------------------------------------------------------------
    //Auto Suggestion for Index & Search Result
    #--------------------------------------------------------------------------------------
    /*public function autoSuggest_Area(){
    global $CFG;
    
    //$q = strtolower($_GET["inputvalue"]);
    $q = $_REQUEST["inputvalue"];
    if (!$q) return;
    $sql = "SELECT areaname FROM ".$CFG['table']['zipcode']." WHERE areaname LIKE '$q%'";
    $rsd = mysqli_query($sql);
    while($rs = mysqli_fetch_array($rsd)) {
    $cname = $rs['areaname'];
    //echo "$cname\n";
    }
    return $cname;
    }*/

    //Customer Log In Status
    /**
     * Common::customerLogInStatus()
     * 
     * @return
     */
    function customerLogInStatus()
    {
        global $CFG, $objSmarty;

        $customerID = $this->filterInput($_SESSION['customerid']);
        $cus_status = $this->getNumvalues($CFG['table']['customer'], "customer_id='" . $customerID .
            "' AND status='1'");
        return $cus_status;
    }
    //Restaurant Log In Status
    /**
     * Common::restaurantLogInStatus()
     * 
     * @return
     */
    function restaurantLogInStatus()
    {
        global $CFG, $objSmarty;

        $restaurantID = $this->filterInput($_SESSION['restaurantownerid']);
        $res_status = $this->getNumvalues($CFG['table']['restaurant'], "restaurant_id='" .
            $restaurantID . "' AND restaurant_status='1'");
        return $res_status;
    }
    /**
     * Common::restaurantDetailsLogInStatus()
     * 
     * @return
     */
    function restaurantDetailsLogInStatus()
    {
        global $CFG, $objSmarty;

        $restaurantID = $this->filterInput($_REQUEST['resid']);
        $res_status = $this->getNumvalues($CFG['table']['restaurant'], "restaurant_id='" . $restaurantID . "' AND restaurant_status='1' AND (restaurant_pickup = 'Yes' or restaurant_delivery = 'Yes') ");
        return $res_status;
    }

    #----------------------------------------------------------------------------------------------
    #Get facebook page id
    /**
     * Common::parse_signed_request()
     * 
     * @return
     */
    function parse_signed_request($signed_request)
    {
        list($encoded_sig, $payload) = explode('.', $signed_request, 2);
        // decode the data
        $sig = $this->base64_url_decode($encoded_sig);
        $data = json_decode($this->base64_url_decode($payload), true);
        return $data;
    }
    #----------------------------------------------------------------------------------------------
    # Base64 decode
    /**
     * Common::base64_url_decode()
     * 
     * @return
     */
    function base64_url_decode($input)
    {
        return base64_decode(strtr($input, '-_', '+/'));
    }

    #-------------------------------- Meta tag  -----------------------------------
    #Meta tag
    /**
     * Common::show_metatag()
     * 
     * @return
     */
    function show_metatag()
    {
        global $CFG, $objSmarty;

        $cur_page = basename($_SERVER['PHP_SELF']);
        #echo $cur_page;

        $sqlsel = "SELECT filename, metatag_title, metatag_keyword, metatag_desc FROM " .
            $CFG['table']['metatag'] . " WHERE filename = '" . $cur_page . "'";
        $sqlres = $this->ExecuteQuery($sqlsel, 'select');

        #Meta Tag
        $objSmarty->assign('Meta_Tag_Title', $this->My_stripslashes($sqlres['0']['metatag_title']));
        $objSmarty->assign('Meta_Tag_Keyword', $this->My_stripslashes(strtolower($sqlres['0']['metatag_keyword'])));
        $objSmarty->assign('Meta_Tag_Desc', $this->My_stripslashes(strtolower($sqlres['0']['metatag_desc'])));

    }
}
?>