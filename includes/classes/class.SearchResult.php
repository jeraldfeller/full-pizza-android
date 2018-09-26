<?php

/**
 * SearchResult
 * 
 * @package 
 * @author gencyolcu
 * @copyright 2014
 * @version $Id$
 * @access public
 */
class SearchResult extends Site
{
    #--------------------------------------------------------------------------------
    #Search Result
    
    /**
     * SearchResult::searchResultRestaurantByLocation()
     * 
     * @return
     */
     
    function searchResultRestaurantByLocation()
    {
        global $CFG, $objSmarty;
        

        $day     = strtolower(date('D'));
		//$area    = addslashes($_REQUEST["area"]);
		$user_longitude = strtolower($_REQUEST["long"]);
		$user_latitude 	= strtolower($_REQUEST["lat"]);
		$type    = strtolower($_REQUEST["type"]);
        //$cuisine = strtolower($_REQUEST["type"]);
		$today = date("Y-m-d");
        #Filter...........................................................
        #Search Area
        //if($area != ''){
            
           
            
            
                
                switch($type){
                    case ('delivery'): $wherecond .= " AND rest.restaurant_delivery = 'Yes' "; break;
                    case ('pickup'): $wherecond .= " AND rest.restaurant_pickup = 'Yes' "; break;
                    case ('bookatable'): $wherecond .= " AND rest.restaurant_booktable = 'Yes' "; break;
                    case ('offer'): $wherecond1 .= " AND ( offer.offer_valid_from <= '" . $today . "' AND offer.offer_valid_to >= '" . $today . "' AND offer.status = '1' )";
                    default : $wherecond .= " AND (rest.restaurant_pickup = 'Yes' OR rest.restaurant_delivery = 'Yes') "; break;
                }  
            
                if (!empty($area))
                {
                    $res_city = $area;
                }
                
                
           
        
        //Restaurant Open And Close Timings
        if ($day != '') {
            $openClose = ", tim.".$day."_firstopen_time AS firstOpen, tim.".$day."_firstclose_time AS firstClose, tim.".$day."_secondopen_time AS secondOpen, tim.".$day."_secondclose_time AS secondClose ";
        }
        
        if ($user_longitude != '' && $user_latitude != '')
        {
        	$delivery_zone_cond = " AND CONTAINS(  `restaurant_delivery_zone` , POINT( ".$user_latitude.",".$user_longitude." ) ) ";
        }
        
        
        
        if($wherecond != '' || $wherecond1 != '') {
            //search result
            mysqli_query($this->DBCONN,"SET OPTION SQL_BIG_SELECTS=1");
    		$sql = " SELECT rest.restaurant_id, rest.restaurant_name, rest.restaurant_delivery, rest.restaurant_delivery_charge, rest.restaurant_logo, rest.restaurant_minorder_price, rest.restaurant_serving_cuisines, rest.restaurant_streetaddress,rest.restaurant_feature_status, rest.restaurant_zip, rest.restaurant_lat AS res_latitude, rest.restaurant_long AS res_longitude, rest.restaurant_set_status   ".
    					  "  ".$openClose.
    					  "	FROM rt_restaurant AS rest ".
    					  //" LEFT JOIN rt_city AS cty ON rest.restaurant_city = cty.city_id ".
    					  //" LEFT JOIN rt_state AS state ON rest.restaurant_state = state.statecode ".
    					  //" LEFT JOIN rt_restaurant_menu AS menu ON rest.restaurant_id = menu.restaurant_id ".
    					  //" LEFT JOIN rt_restaurant_offer AS offer ON rest.restaurant_id = offer.restaurant_id ".
    					  //" LEFT JOIN rt_restaurant_serving_cuisines AS cui ON rest.restaurant_id = cui.restaurant_id ".
    					  //" LEFT JOIN rt_cuisine AS cuisine ON cuisine.cuisine_id = cui.cuisine_id ".
    					  //" LEFT JOIN rt_restaurant_delivery_areas AS area ON rest.restaurant_id = area.restaurant_id ".
    					  //" LEFT JOIN rt_zipcode AS zip ON (area.zipcode_id = zip.zipcode_id OR rest.restaurant_zip = zip.zipcode_id) ".
                          " LEFT JOIN ".$CFG['table']['restaurant_timing']." AS tim ON (rest.restaurant_id = tim.restaurant_id)".
    					  #" LEFT JOIN rt_restaurant_reviews AS rvw ON rest.restaurant_id = rvw.restaurant_id AND rvw.restaurant_id != ''".
    					  "	WHERE rest.restaurant_status = '1' AND rest.delete_status = 'No' ".$wherecond." ".$wherecond1." ".$delivery_zone_cond." GROUP BY rest.restaurant_id  ";
            
            $res = mysqli_query($this->DBCONN, $sql) or die(mysqli_error($this->DBCONN));
            
    		if(mysqli_num_rows($res)>0)
    		{
    			while($row=mysqli_fetch_assoc($res))
    			{
    				$row_list[] = $row;
    			}
                
                foreach($row_list as $key=>$value){
                    
                    if($row_list[$key]['restaurant_id'] != ''){
                        $res_ids .= "'".$row_list[$key]['restaurant_id']."',";
                    }
                    
                    $today = date("Y-m-d");
                    
                    $row_list[$key]['offer_percentage'] = $this->getValue("offer_percentage",$CFG['table']['restaurant_offer'],
                            "restaurant_id = '" . $row_list[$key]['restaurant_id'] .
                            "' AND status = '1' AND offer_valid_from <= '" . $today .
                            "' AND offer_valid_to >= '" . $today . "' ORDER BY offer_id DESC LIMIT 1");
                    $row_list[$key]['offer_percentage'] = ($row_list[$key]['offer_percentage'] != '') ? $row_list[$key]['offer_percentage'] : '';
                    
                    #serving Cuisine
                    if (!empty($row_list[$key]['restaurant_serving_cuisines'])){
                        $row_list[$key]['restaurant_serving_cuisines'] = $this->getArrayCuisines($row_list[$key]['restaurant_serving_cuisines']);
                    }
                    #Restaurant Logo
                    if( !empty($row_list[$key]['restaurant_logo']) && file_exists($CFG['site']['photo_restaurant_path'].'/logo/'.$row_list[$key]['restaurant_logo']) ){
    					$row_list[$key]['restaurant_logo'] = $CFG['site']['photo_restaurant_url'].'/logo/'.$row_list[$key]['restaurant_logo'];
    				}else{
    					$row_list[$key]['restaurant_logo'] = $CFG['site']['theme_image_url'].'/no-image.jpg';
    				}
                    
                    $Review = $this->averageReviews($row_list[$key]['restaurant_id']);
                    
                    if($Review != ''){
                        $row_list[$key]['total_rating'] = $Review;
                    } else {
                        $row_list[$key]['total_rating'] = 0;
                    }
                    
                    $voucher = "SELECT voucher_id FROM rt_restaurant_voucher WHERE restaurant_id = ".$value['restaurant_id']." " ; 
                    $voucher_list = $this->ExecuteQuery($voucher, "select");
                    if(!empty($voucher_list)) {
                        foreach($voucher_list as $voukey=> $vouvalue)
                        {
                            $voucherAvailable =  $this->getNumValues('rt_voucher', " valid_from <= '" . $today . "' AND valid_to >= '" . $today . "' AND status = '1' AND id = '".$vouvalue['voucher_id']."' ");
                            if($voucherAvailable > 0)
                            {
                                $row_list[$key]['voucher'] = 'Yes';
                            }else{
                                $row_list[$key]['voucher'] = 'No';
                            }
                        }
                    } else {
                        $row_list[$key]['voucher'] = 'No';
                    }
                    
                    $restaurantSetStatus = $row_list[$key]['restaurant_set_status'];
                    
                    $firstStatus = '';
                    $secondStatus= '';
                    
                    
                    if ($restaurantSetStatus == 'TT' || $restaurantSetStatus == '') {
                        $firstStatus = $this->openandcloseRecursion($row_list[$key]['firstOpen'], $row_list[$key]['firstClose'],'','');
                        $secondStatus= $this->openandcloseRecursion($row_list[$key]['secondOpen'], $row_list[$key]['secondClose'],'','');
                         
                        if ($firstStatus == 'Open' || $secondStatus == 'Open')
                        {
                            $row_list[$key]['status'] = 'Open';
                        } 
                        elseif ($firstStatus == 'Preorder' || $secondStatus == 'Preorder')
                        {
                            $row_list[$key]['status'] = 'Preorder';
                        }
                        else
                        {
                            $row_list[$key]['status'] = 'Closed';
                        }
                        
                        
                    } else {
                        $row_list[$key]['status'] = $restaurantSetStatus;
                    }
                    
                }
                #echo"<pre>";print_r($row_list);echo"</pre>";exit;
                
                
                foreach($row_list as $keyword=>$value) {
                    if(trim($value['status']) == 'Open') {
                        $restaurants[] = $value;
                    }
                }
                
                foreach($row_list as $key=>$valueopen) {
                    if(trim($valueopen['status']) == 'Preorder') {
                        $restaurants[] = $valueopen;
                    }
                }
                
                foreach($row_list as $keyword=>$value) {
                    if(trim($value['status']) == 'Closed') {
                        $restaurants[] = $value;
                    }
                }
                
                $res_ids = substr($res_ids,0,-1);
        		//echo "before sql 2";
                if($res_ids != ''){
                	//echo "if sql 2";
                    $sqlsel2 = 	" SELECT cuis.cuisine_id, cuis.cuisine_name, cuis.cuisine_seourl, "."rs.restaurant_id".
                    		" FROM ".$CFG['table']['cuisine']." as cuis ".
                    		" RIGHT JOIN ".$CFG['table']['restaurant_serving_cuisines']." AS rsc ON cuis.cuisine_id = rsc.cuisine_id ".
                    		" RIGHT JOIN ".$CFG['table']['restaurant']." AS rs ON rsc.restaurant_id = rs.restaurant_id ".
                    		" WHERE rs.restaurant_id IN (".$res_ids.") AND cuis.cuisine_status = '1' AND rs.restaurant_status = '1' AND cuis.delete_status = 'No' AND rs.delete_status = 'No' AND (rs.restaurant_delivery = 'Yes' OR rs.restaurant_pickup = 'Yes') GROUP BY cuis.cuisine_id ";
                    $sqlres2 =  $this->ExecuteQuery($sqlsel2,'select');
                  	//echo $sqlsel2;
                    if(isset($sqlres2) && !empty($sqlres2)){
                        foreach($sqlres2 as $k_cui=>$v_cui){
                            $sqlres2[$k_cui]['counts']  = $this->cusinecount($sqlres2[$k_cui]['cuisine_id'],$res_ids);
                        }
                    }
                    
                    $cuisineList = $sqlres2;
                }else{
                    $cuisineList[] = array();
                }
                
               
    			$response["status"] = 1;
                $response["restaurants"] = $restaurants;
                $response["cuisineList"] = $cuisineList;
                $objSmarty->assign("restaurants", $response); 
                //print_r($response);
                //echo("<script>console.log('lo hizo');</script>"); 
                
                echo json_encode($response);

    		}
            // NO  HAY RESTAURANTES
        }
		
		// NO  HAY RESTAURANTES
		
		//En la variable $response estan los restaurantes encontrados
         
        
         
        // $objSmarty->assign("tuleke", $tuleke);
		
        
    }
    
    #--------------------------------------------------------------------------------
    #Search Result
    
    /**
     * SearchResult::searchResultAllRestaurants()
     * 
     * @return
     */
     
    function searchResultAllRestaurants()
    {
        global $CFG, $objSmarty;
        

        $day     = strtolower(date('D'));
		//$area    = addslashes($_REQUEST["area"]);
		$user_longitude = strtolower($_REQUEST["long"]);
		$user_latitude 	= strtolower($_REQUEST["lat"]);
		$type    = strtolower($_REQUEST["type"]);
        //$cuisine = strtolower($_REQUEST["type"]);
		$today = date("Y-m-d");
        #Filter...........................................................
        #Search Area
        //if($area != ''){
            
           
            
            
                
                switch($type){
                    case ('delivery'): $wherecond .= " AND rest.restaurant_delivery = 'Yes' "; break;
                    case ('pickup'): $wherecond .= " AND rest.restaurant_pickup = 'Yes' "; break;
                    case ('bookatable'): $wherecond .= " AND rest.restaurant_booktable = 'Yes' "; break;
                    case ('offer'): $wherecond1 .= " AND ( offer.offer_valid_from <= '" . $today . "' AND offer.offer_valid_to >= '" . $today . "' AND offer.status = '1' )";
                    default : $wherecond .= " AND (rest.restaurant_pickup = 'Yes' OR rest.restaurant_delivery = 'Yes') "; break;
                }  
            
                if (!empty($area))
                {
                    $res_city = $area;
                }
                
                
           
        
        //Restaurant Open And Close Timings
        if ($day != '') {
            $openClose = ", tim.".$day."_firstopen_time AS firstOpen, tim.".$day."_firstclose_time AS firstClose, tim.".$day."_secondopen_time AS secondOpen, tim.".$day."_secondclose_time AS secondClose ";
        }
        
        if ($user_longitude != '' && $user_latitude != '')
        {
        	//$delivery_zone_cond = " AND CONTAINS(  `restaurant_delivery_zone` , POINT( ".$user_latitude.",".$user_longitude." ) ) ";
        }
        
        
        
        if($wherecond != '' || $wherecond1 != '') {
            //search result
            mysqli_query($this->DBCONN,"SET OPTION SQL_BIG_SELECTS=1");
    		$sql = " SELECT rest.restaurant_id, rest.restaurant_name, rest.restaurant_delivery, rest.restaurant_delivery_charge, rest.restaurant_logo, rest.restaurant_minorder_price, rest.restaurant_serving_cuisines, rest.restaurant_streetaddress,rest.restaurant_feature_status, rest.restaurant_zip, rest.restaurant_lat AS res_latitude, rest.restaurant_long AS res_longitude, rest.restaurant_set_status   ".
    					  "  ".$openClose.
    					  "	FROM rt_restaurant AS rest ".
    					  //" LEFT JOIN rt_city AS cty ON rest.restaurant_city = cty.city_id ".
    					  //" LEFT JOIN rt_state AS state ON rest.restaurant_state = state.statecode ".
    					  //" LEFT JOIN rt_restaurant_menu AS menu ON rest.restaurant_id = menu.restaurant_id ".
    					  //" LEFT JOIN rt_restaurant_offer AS offer ON rest.restaurant_id = offer.restaurant_id ".
    					  //" LEFT JOIN rt_restaurant_serving_cuisines AS cui ON rest.restaurant_id = cui.restaurant_id ".
    					  //" LEFT JOIN rt_cuisine AS cuisine ON cuisine.cuisine_id = cui.cuisine_id ".
    					  //" LEFT JOIN rt_restaurant_delivery_areas AS area ON rest.restaurant_id = area.restaurant_id ".
    					  //" LEFT JOIN rt_zipcode AS zip ON (area.zipcode_id = zip.zipcode_id OR rest.restaurant_zip = zip.zipcode_id) ".
                          " LEFT JOIN ".$CFG['table']['restaurant_timing']." AS tim ON (rest.restaurant_id = tim.restaurant_id)".
    					  #" LEFT JOIN rt_restaurant_reviews AS rvw ON rest.restaurant_id = rvw.restaurant_id AND rvw.restaurant_id != ''".
    					  "	WHERE rest.restaurant_status = '1' AND rest.delete_status = 'No' ".$wherecond." ".$wherecond1." ".$delivery_zone_cond." GROUP BY rest.restaurant_id  ";
            
            $res = mysqli_query($this->DBCONN, $sql) or die(mysqli_error($this->DBCONN));
            
    		if(mysqli_num_rows($res)>0)
    		{
    			while($row=mysqli_fetch_assoc($res))
    			{
    				$row_list[] = $row;
    			}
                
                foreach($row_list as $key=>$value){
                    
                    if($row_list[$key]['restaurant_id'] != ''){
                        $res_ids .= "'".$row_list[$key]['restaurant_id']."',";
                    }
                    
                    $today = date("Y-m-d");
                    
                    $row_list[$key]['offer_percentage'] = $this->getValue("offer_percentage",$CFG['table']['restaurant_offer'],
                            "restaurant_id = '" . $row_list[$key]['restaurant_id'] .
                            "' AND status = '1' AND offer_valid_from <= '" . $today .
                            "' AND offer_valid_to >= '" . $today . "' ORDER BY offer_id DESC LIMIT 1");
                    $row_list[$key]['offer_percentage'] = ($row_list[$key]['offer_percentage'] != '') ? $row_list[$key]['offer_percentage'] : '';
                    
                    #serving Cuisine
                    if (!empty($row_list[$key]['restaurant_serving_cuisines'])){
                        $row_list[$key]['restaurant_serving_cuisines'] = $this->getArrayCuisines($row_list[$key]['restaurant_serving_cuisines']);
                    }
                    #Restaurant Logo
                    if( !empty($row_list[$key]['restaurant_logo']) && file_exists($CFG['site']['photo_restaurant_path'].'/logo/'.$row_list[$key]['restaurant_logo']) ){
    					$row_list[$key]['restaurant_logo'] = $CFG['site']['photo_restaurant_url'].'/logo/'.$row_list[$key]['restaurant_logo'];
    				}else{
    					$row_list[$key]['restaurant_logo'] = $CFG['site']['theme_image_url'].'/no-image.jpg';
    				}
                    
                    $Review = $this->averageReviews($row_list[$key]['restaurant_id']);
                    
                    if($Review != ''){
                        $row_list[$key]['total_rating'] = $Review;
                    } else {
                        $row_list[$key]['total_rating'] = 0;
                    }
                    
                    $voucher = "SELECT voucher_id FROM rt_restaurant_voucher WHERE restaurant_id = ".$value['restaurant_id']." " ; 
                    $voucher_list = $this->ExecuteQuery($voucher, "select");
                    if(!empty($voucher_list)) {
                        foreach($voucher_list as $voukey=> $vouvalue)
                        {
                            $voucherAvailable =  $this->getNumValues('rt_voucher', " valid_from <= '" . $today . "' AND valid_to >= '" . $today . "' AND status = '1' AND id = '".$vouvalue['voucher_id']."' ");
                            if($voucherAvailable > 0)
                            {
                                $row_list[$key]['voucher'] = 'Yes';
                            }else{
                                $row_list[$key]['voucher'] = 'No';
                            }
                        }
                    } else {
                        $row_list[$key]['voucher'] = 'No';
                    }
                    
                    $restaurantSetStatus = $row_list[$key]['restaurant_set_status'];
                    
                    $firstStatus = '';
                    $secondStatus= '';
                    
                    
                    if ($restaurantSetStatus == 'TT' || $restaurantSetStatus == '') {
                        $firstStatus = $this->openandcloseRecursion($row_list[$key]['firstOpen'], $row_list[$key]['firstClose'],'','');
                        $secondStatus= $this->openandcloseRecursion($row_list[$key]['secondOpen'], $row_list[$key]['secondClose'],'','');
                         
                        if ($firstStatus == 'Open' || $secondStatus == 'Open')
                        {
                            $row_list[$key]['status'] = 'Open';
                        } 
                        elseif ($firstStatus == 'Preorder' || $secondStatus == 'Preorder')
                        {
                            $row_list[$key]['status'] = 'Preorder';
                        }
                        else
                        {
                            $row_list[$key]['status'] = 'Closed';
                        }
                        
                        
                    } else {
                        $row_list[$key]['status'] = $restaurantSetStatus;
                    }
                    
                }
                #echo"<pre>";print_r($row_list);echo"</pre>";exit;
                
                
                foreach($row_list as $keyword=>$value) {
                    if(trim($value['status']) == 'Open') {
                        $restaurants[] = $value;
                    }
                }
                
                foreach($row_list as $key=>$valueopen) {
                    if(trim($valueopen['status']) == 'Preorder') {
                        $restaurants[] = $valueopen;
                    }
                }
                
                foreach($row_list as $keyword=>$value) {
                    if(trim($value['status']) == 'Closed') {
                        $restaurants[] = $value;
                    }
                }
                
                $res_ids = substr($res_ids,0,-1);
        		//echo "before sql 2";
                if($res_ids != ''){
                	//echo "if sql 2";
                    $sqlsel2 = 	" SELECT cuis.cuisine_id, cuis.cuisine_name, cuis.cuisine_seourl, "."rs.restaurant_id".
                    		" FROM ".$CFG['table']['cuisine']." as cuis ".
                    		" RIGHT JOIN ".$CFG['table']['restaurant_serving_cuisines']." AS rsc ON cuis.cuisine_id = rsc.cuisine_id ".
                    		" RIGHT JOIN ".$CFG['table']['restaurant']." AS rs ON rsc.restaurant_id = rs.restaurant_id ".
                    		" WHERE rs.restaurant_id IN (".$res_ids.") AND cuis.cuisine_status = '1' AND rs.restaurant_status = '1' AND cuis.delete_status = 'No' AND rs.delete_status = 'No' AND (rs.restaurant_delivery = 'Yes' OR rs.restaurant_pickup = 'Yes') GROUP BY cuis.cuisine_id ";
                    $sqlres2 =  $this->ExecuteQuery($sqlsel2,'select');
                  	//echo $sqlsel2;
                    if(isset($sqlres2) && !empty($sqlres2)){
                        foreach($sqlres2 as $k_cui=>$v_cui){
                            $sqlres2[$k_cui]['counts']  = $this->cusinecount($sqlres2[$k_cui]['cuisine_id'],$res_ids);
                        }
                    }
                    
                    $cuisineList = $sqlres2;
                }else{
                    $cuisineList[] = array();
                }
                
               
    			$response["status"] = 1;
                $response["restaurants"] = $restaurants;
                $response["cuisineList"] = $cuisineList;
                $objSmarty->assign("restaurants", $response); 
                
                //print_r($response);
                
               // echo json_encode($response);

    		}
            // NO  HAY RESTAURANTES
        }
		
		// NO  HAY RESTAURANTES
		
		//En la variable $response estan los restaurantes encontrados
         
        
         
        // $objSmarty->assign("tuleke", $tuleke);
		
        
    }
    
    
    
    /**
     * SearchResult::searchResultRestaurant()
     * 
     * @return
     */
    function searchResultRestaurant()
    {
        global $CFG, $objSmarty;

        $day = date("l");
        
        #Pagination
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']))
        {
            $limit   = $_REQUEST['limit'];
            $fields .= "&limit=" . $_REQUEST['limit'];
        } else
        {
            $limit = USERPAGELIMIT;
        }
        
        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;
        if (($_REQUEST['limit'] <> "") && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = " $start, $limit";
        }
        
        #----------------------------------Area--------------------------------
        #Area Search From Index Page
        if ((isset($_REQUEST['searcharea']) && !empty($_REQUEST['searcharea'])) || (isset
            ($_REQUEST['area']) && !empty($_REQUEST['area'])) || (isset($_REQUEST['zipcode']) && !empty($_REQUEST['zipcode'])))
        {
            $statecode = $this->getValue("statecode",$CFG['table']['city'],  " cityname = '" . $this->filterInput($_REQUEST['searcharea']) . "' ");
            $statename  = $this->getValue("statename",$CFG['table']['state'], " state_status = '1' AND statecode = '" . $this->filterInput($statecode) . "' "); 
            $objSmarty->assign("statename", $statename);  
            if(isset($_REQUEST['searcharea']) && !empty($_REQUEST['searcharea'])){ 
                
                $condition  = $this->getNumValues($CFG['table']['state'], " state_status = '1' AND state_seourl = '" . $this->filterInput($_REQUEST['searcharea']) . "' ");
                $condition1 = $this->getNumValues($CFG['table']['city'],  " city_status = '1' AND cityname = '" . $this->filterInput($_REQUEST['searcharea']) . "' ");
                $condition2 = $this->getNumValues($CFG['table']['zipcode'], " zipcode_status = '1' AND zipcode = '" . $this->filterInput($_REQUEST['searcharea']) . "' AND zipcode != '0' ");
            }
            
            if(!empty($condition2)){
                $country = $this->getMultiValue("statecode",$CFG['table']['zipcode'],"zipcode_status = '1' AND zipcode = '" . $this->filterInput($_REQUEST['searcharea']) . "' AND zipcode != '0'");
                $country_code = $country[0] ;
                $rest_country = implode(',',$country_code);
              }
              /*if(!empty($condition1)){  
                $cityId    = $this->getValue("city_id",$CFG['table']['city'],"city_status = '1' AND cityname = '" . $_REQUEST['searcharea'] . "' ");
                $wherecond .= " AND (rest.restaurant_city = '".$cityId."') ";
                //$cityid  = $city ;                 
                //$city_id = implode(',',$cityid);
            }*/
            
           
                if (!empty($_REQUEST['searcharea']))
                {
                    $res_city               = $this->filterInput($_REQUEST['searcharea']);
                    $_SESSION['searcharea'] = $this->filterInput($_REQUEST['searcharea']);
                } elseif (!empty($_REQUEST['area']))
                {
                    $res_city         = $this->filterInput($_REQUEST['area']);
                    $_SESSION['area'] = $this->filterInput($_REQUEST['area']);
                } elseif (!empty($_REQUEST['zipcode']))
                {
                    $res_city = $this->filterInput($_REQUEST['zipcode']);
                }
        
                #Calculate Lattitude & longtitude for search area------------------------------------
                
                list($find_lat, $find_long) = $this->findLatLongFromAddress($res_straddress = '', $res_area = '', $res_city , $res_state = '', $rest_country );                     
                   
                if (!empty($find_lat) && !empty($find_long))
                {
                    $select_gmap_service = " ROUND(  ( 3959  * acos( cos( radians(" . $find_lat .
                        ") ) * cos( radians( restaurant_lat ) ) * cos( radians( restaurant_long ) - radians(" .
                        $find_long . ") ) + sin( radians(" . $find_lat .
                        ") ) * sin( radians( restaurant_lat ) ) ) ),2  ) AS distance, ";
                
                
                    if (isset($select_gmap_service) && !empty($select_gmap_service))
                    {
                        
                        
                        mysqli_query($this->DBCONN,"SET OPTION SQL_BIG_SELECTS=1");
                         $sqlsel = "SELECT " . $select_gmap_service .
                            " restaurant_id,restaurant_delivery, restaurant_delivery_distance " . "	FROM " . $CFG['table']['restaurant'] .
                            " WHERE restaurant_status = '1'  " . $cond_gmap_service .
                            " ORDER BY distance ASC ";
                        $sqlres = $this->ExecuteQuery($sqlsel, 'select');
                        //echo $sqlsel;
                        //echo"<pre>";print_r($sqlres);echo"</pre>";
                        
                        if (count($sqlres) > 0)
                        {
                            foreach ($sqlres as $key => $value)
                            {
                                    if (empty($sqlres[$key]['distance']))
                                    {
                                        $sqlres[$key]['distance'] = '0.00';
                                    }
            
                                    if (($sqlres[$key]['restaurant_delivery_distance'] >= $sqlres[$key]['distance']) ||
                                        ($sqlres[$key]['restaurant_delivery_distance'] == 0 && $sqlres[$key]['distance'] <= 1))
                                    {
                                        //echo "hai".$sqlres[$key]['restaurant_id']."</br>";
                                        $service_rest_id[] = $sqlres[$key]['restaurant_id'];
                                        
                                    }
                                        
                                /*else{
                                    
                                    $service_rest_id[] = $sqlres[$key]['restaurant_id'];
                                    
                                    
                                }*/
                            } //end for foreach
                        }
        
                        if (!empty($service_rest_id))
                            $gps_restaurant_id = implode(',', $service_rest_id);
                    }
        
                    if (isset($gps_restaurant_id) && !empty($gps_restaurant_id))
                    {
        
                        $wherecond .= " AND rest.restaurant_id IN (" . $gps_restaurant_id . ") ";

                    }
                 } else {
                    $getcityid = $this->getValue("city_id", $CFG['table']['city'],"cityname = '" . $this->filterInput($_REQUEST['searcharea']) . "'");
                    $wherecond .= " AND (rest.restaurant_city LIKE '%".$getcityid."%')";   
                 }
                  $objSmarty->assign("searcharea", $_REQUEST['searcharea']);
                  $ser_qrystring .= "&searcharea=" . $_REQUEST['searcharea'];   
            
            
        }

        #Area Search from search result page left
        if (isset($_REQUEST['areaid']) && !empty($_REQUEST['areaid']))
        {
            $objSmarty->assign("areaid", $_REQUEST['areaid']);
        }

        if (isset($_REQUEST['city']) && !empty($_REQUEST['city']))
        {
            $getcityid = $this->getValue("city_id", $CFG['table']['city'], "city_seourl = '" . $this->filterInput($_REQUEST['city']) . "' AND city_status = '1' ");
            $wherecond .= " AND cty.city_id = '" . $getcityid . "' ";
            
            $objSmarty->assign("city", $_REQUEST['city']);
            $objSmarty->assign("searcharea", $_REQUEST['city']);
        }

        #Zipcode search wise list
        if (isset($_REQUEST['zipcode']) && !empty($_REQUEST['zipcode']))
        {
            $wherecond .= " AND ( rest.restaurant_zip = '" . $this->filterInput($_REQUEST['zipcode']) . "' ) ";
            $objSmarty->assign("zipcode", $_REQUEST['zipcode']);
        }
        #Cuisine from index page
        if (isset($_REQUEST['cuisine']) && !empty($_REQUEST['cuisine']))
        {
            $getcuisineid = $this->getValue("cuisine_id", $CFG['table']['cuisine'], "cuisine_seourl = '" . $this->filterInput($_REQUEST['cuisine']) . "' AND cuisine_status = '1' ");
            $wherecond .= " AND cui.cuisine_id = '" . $this->filterInput($getcuisineid) . "' ";

            $objSmarty->assign("cuisine", $_REQUEST['cuisine']);
            $objSmarty->assign("searchcuisine", $_REQUEST['cuisine']);
        }
        #Area Search from index
        if (isset($_REQUEST['area']) && !empty($_REQUEST['area']))
        {
            $areaid = $this->getValue("zipcode_id", $CFG['table']['zipcode'], "area_seourl = '" . $this->filterInput($_REQUEST['area']) . "'");
            $objSmarty->assign("areaid", $areaid);
        }
        if (isset($_REQUEST['searcharea']) && !empty($_REQUEST['searcharea']) && isset($_REQUEST['searchtype']) && !empty($_REQUEST['searchtype'])) {
            if($_REQUEST['searchtype'] == 'city') {
                $getcityid = $this->getValue("city_id", $CFG['table']['city'],"cityname = '" . $this->filterInput($_REQUEST['searcharea']) . "'");
                $wherecond .= " AND (rest.restaurant_city LIKE '%".$getcityid."%')";
            } else if($_REQUEST['searchtype'] == 'zip') {
                $wherecond .= " AND (rest.restaurant_zip LIKE '%".($this->filterInput($_REQUEST['searcharea']))."%')";
            }             
         }
        #----------------------------------Cuisine--------------------------------
        #Search Cuisine From Index Page
        if (isset($_REQUEST['searchcuisine']) && !empty($_REQUEST['searchcuisine']))
        {
            $getcuisineid = $this->getValue("cuisine_id", $CFG['table']['cuisine'],
                "cuisine_name LIKE '%" . addslashes($this->filterInput($_REQUEST['searchcuisine'])) . "%'");
            $wherecond .= " AND cuisine.cuisine_name LIKE '%" . addslashes($this->filterInput($_REQUEST['searchcuisine'])) ."%' ";

            $ser_qrystring .= "&searchcuisine=" . $this->filterInput($_REQUEST['searchcuisine']);
        }

        #Cuisine from search Result page
        if (isset($_REQUEST['cuisineid']) && !empty($_REQUEST['cuisineid']))
        {
            $cuisineidstr = $this->filterInput($_REQUEST['cuisineid']);
            $cuisineidarr = explode(',', $cuisineidstr);
            if (isset($cuisineidstr) && !empty($cuisineidstr))
            {
                $wherecond .= " AND cui.cuisine_id IN(" . $cuisineidstr . ") ";
            }
        }

        #----------------------------------Restaurant name--------------------------------
        #Search Restaurant From Index Page
        if (isset($_REQUEST['searchrestaurant']) && !empty($_REQUEST['searchrestaurant']))
        {
            $SDFGD = mysqli_real_escape_string(addslashes($this->DBCONN,$this->filterInput($_REQUEST['searchrestaurant'])));
            $restaurantid = $this->getValue("restaurant_id", $CFG['table']['restaurant'],
                "restaurant_name LIKE '%" . $SDFGD . "%'");

            $wherecond .= " AND rest.restaurant_name LIKE '%" . $SDFGD . "%'";

            $objSmarty->assign("searchrestaurant", $_REQUEST['searchrestaurant']);
            $ser_qrystring .= "&searchrestaurant=" . $_REQUEST['searchrestaurant'];
        }

        #Filter...........................................................
        #Delivery
        if (isset($_REQUEST['ser_delivery']) && !empty($_REQUEST['ser_delivery']))
        {
            $wherecond .= " AND rest.restaurant_delivery = '" . $this->filterInput($_REQUEST['ser_delivery']) ."' ";
        }
        #Pick Up
        if (isset($_REQUEST['ser_pickup']) && !empty($_REQUEST['ser_pickup']))
        {
            $wherecond .= " AND rest.restaurant_pickup = '" . $this->filterInput($_REQUEST['ser_pickup']) . "' ";
        }
        #Book Table
        if (isset($_REQUEST['ser_booktable']) && !empty($_REQUEST['ser_booktable']))
        {
            $wherecond .= " AND rest.restaurant_booktable = '" . $this->filterInput($_REQUEST['ser_booktable']) ."' ";
        }
        
        #Open Now
        if (isset($_REQUEST['ser_opennow']) && !empty($_REQUEST['ser_opennow']))
        {
            if ($day == "Monday")
            {
                $getresdet = $this->getMultiValue("restaurant_id, mon_firstopen_time AS opentime, mon_firstclose_time AS closetime, mon_secondopen_time AS secopentime, mon_secondclose_time AS secclosetime", $CFG['table']['restaurant_timing'], "restaurant_id != '' ");
            } elseif ($day == "Tuesday")
            {
                $getresdet = $this->getMultiValue("restaurant_id, tue_firstopen_time AS opentime, tue_firstclose_time AS closetime, tue_secondopen_time AS secopentime, tue_secondclose_time AS secclosetime", $CFG['table']['restaurant_timing'], "restaurant_id != '' ");
            } elseif ($day == "Wednesday")
            {
                $getresdet = $this->getMultiValue("restaurant_id, wed_firstopen_time AS opentime, wed_firstclose_time AS closetime, wed_secondopen_time AS secopentime, wed_secondclose_time AS secclosetime", $CFG['table']['restaurant_timing'], "restaurant_id != '' ");
            } elseif ($day == "Thursday")
            {
                $getresdet = $this->getMultiValue("restaurant_id, thu_firstopen_time AS opentime, thu_firstclose_time AS closetime, thu_secondopen_time AS secopentime, thu_secondclose_time AS secclosetime", $CFG['table']['restaurant_timing'], "restaurant_id != '' ");
            } elseif ($day == "Friday")
            {
                $getresdet = $this->getMultiValue("restaurant_id, fri_firstopen_time AS opentime, fri_firstclose_time AS closetime, fri_secondopen_time AS secopentime, fri_secondclose_time AS secclosetime", $CFG['table']['restaurant_timing'], "restaurant_id != '' ");
            } elseif ($day == "Saturday")
            {
                $getresdet = $this->getMultiValue("restaurant_id, sat_firstopen_time AS opentime, sat_firstclose_time AS closetime, sat_secondopen_time AS secopentime, sat_secondclose_time AS secclosetime", $CFG['table']['restaurant_timing'], "restaurant_id != '' ");
            } elseif ($day == "Sunday")
            {
                $getresdet = $this->getMultiValue("restaurant_id, sun_firstopen_time AS opentime, sun_firstclose_time AS closetime, sun_secondopen_time AS secopentime, sun_secondclose_time AS secclosetime", $CFG['table']['restaurant_timing'], "restaurant_id != '' ");
            }
            
            if (count($getresdet) > 0)
            {
                foreach ($getresdet as $key1 => $val)
                {
                    $opentime     = date("H:i", strtotime($getresdet[$key1]['opentime']));
                    $closetime    = date("H:i", strtotime($getresdet[$key1]['closetime']));
                    $secopentime  = date("H:i", strtotime($getresdet[$key1]['secopentime']));
                    $secclosetime = date("H:i", strtotime($getresdet[$key1]['secclosetime']));
                    $nowtime      = date("H:i");
                    if ($nowtime >= $opentime && $nowtime <= $closetime)
                    {
                        $openres .= "'" . $getresdet[$key1]['restaurant_id'] . "',";
                    } else
                    {
                        if ($nowtime >= $secopentime && $nowtime <= $secclosetime)
                        {
                            $openres .= "'" . $getresdet[$key1]['restaurant_id'] . "',";
                        }
                    }
                }
                $openrestaurant = substr($openres, 0, -1);
                if (!empty($openrestaurant))
                {
                    $wherecond .= " AND rest.restaurant_id IN (" . $openrestaurant . ")";
                } else
                {
                    $openrestaurant = '0';
                    $wherecond .= " AND rest.restaurant_id IN (" . $openrestaurant . ")";
                }
            }
        }

        #Offer
        if (isset($_REQUEST['ser_offer']) && !empty($_REQUEST['ser_offer']))
        {
            $today = date("Y-m-d");
            $wherecond .= " AND ( offer.offer_valid_from <= '" . $today .
                "' AND offer.offer_valid_to >= '" . $today . "' AND offer.status = '1' )";
        }

        #Orgainze By
        if (isset($_REQUEST['organizeby']) && !empty($_REQUEST['organizeby']) && $_REQUEST['organizeby'] == 'newest')
        {
            $sortby = " ORDER BY rest.restaurant_id DESC ";

        } elseif (isset($_REQUEST['organizeby']) && !empty($_REQUEST['organizeby']) && $_REQUEST['organizeby'] == 'minorder')
        {
            $sortby = "ORDER BY rest.restaurant_minorder_price ASC ";
            
        } elseif (isset($_REQUEST['organizeby']) && !empty($_REQUEST['organizeby']) && $_REQUEST['organizeby'] == 'deliveryfee')
        {
            $sortby = " ORDER BY rest.restaurant_delivery_charge ASC ";

        } elseif (isset($_REQUEST['organizeby']) && !empty($_REQUEST['organizeby']) && $_REQUEST['organizeby'] == 'toprated')
        {
            $sortby = " ORDER BY rvw.rating DESC ";

        } elseif (isset($_REQUEST['organizeby']) && !empty($_REQUEST['organizeby']) && $_REQUEST['organizeby'] == 'cashcoupon')
        {
            $sortby = " ORDER BY offer.offer_percentage DESC ";
        } else
        {
            $sortby = " ORDER BY rest.restaurant_feature_status,rest.restaurant_id DESC";
        }

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
        }
        
        
        if (!empty($wherecond) && !empty($sortby))
        {
            mysqli_query($this->DBCONN,"SET OPTION SQL_BIG_SELECTS=1");
            
            $sqlsel = "SELECT rest.restaurant_id, rest.restaurant_name, rest.restaurant_seourl,rest.restaurant_lat, rest.restaurant_long, rest.restaurant_phone, rest.restaurant_logo, rest.restaurant_website, rest.restaurant_zip, rest.restaurant_fax, rest.restaurant_streetaddress, rest.restaurant_contact_name, rest.restaurant_contact_phone, rest.restaurant_contact_email, rest.restaurant_description, rest.restaurant_estimated_time, rest.restaurant_delivery, rest.restaurant_delivery_charge, rest.restaurant_minorder_price, rest.restaurant_serving_cuisines, rest.restaurant_feature_status, rest.restaurant_set_status,rest.restaurant_set_time, rest.restaurant_booktable ".$open_close_time_cond.' '.$select_gmap_service.
					  " cty.cityname, "."zip.zipcode, zip.areaname, "."state.statename".
					  "	FROM ".$CFG['table']['restaurant']." AS rest ".
					  " LEFT JOIN ".$CFG['table']['restaurant_timing']." AS re ON rest.restaurant_id = re.restaurant_id ".
					  " LEFT JOIN ".$CFG['table']['city']." AS cty ON rest.restaurant_city = cty.city_id ".
					  " LEFT JOIN ".$CFG['table']['state']." AS state ON rest.restaurant_state = state.statecode ".
					  " LEFT JOIN ".$CFG['table']['restaurant_offer']." AS offer ON rest.restaurant_id = offer.restaurant_id ".
					  " LEFT JOIN ".$CFG['table']['restaurant_serving_cuisines']." AS cui ON rest.restaurant_id = cui.restaurant_id ".
					  " LEFT JOIN ".$CFG['table']['cuisine']." AS cuisine ON cuisine.cuisine_id = cui.cuisine_id ".
					  " LEFT JOIN ".$CFG['table']['zipcode']." AS zip ON rest.restaurant_zip = zip.zipcode_id ".
					  " LEFT JOIN ".$CFG['table']['restaurant_reviews']." AS rvw ON rest.restaurant_id = rvw.restaurant_id ".
					  "	WHERE rest.restaurant_status = '1' AND rest.delete_status = 'NO' AND (rest.restaurant_delivery = 'Yes' OR rest.restaurant_pickup = 'Yes') ".$wherecond." GROUP BY rest.restaurant_id ".$sortby." ";
            
            $total_pages      = $this->ExecuteQuery($sqlsel, 'norows');
            $targetpage       = ",'searchResultList'";
            $searcharea       = ",'$_REQUEST[searcharea]'";
            $searchcuisine    = ",'$_REQUEST[searchcuisine]'";
            $searchrestaurant = ",'$_REQUEST[searchrestaurant]'";
            $ser_delivery     = ",'$_REQUEST[ser_delivery]'";
            $ser_pickup       = ",'$_REQUEST[ser_pickup]'";
            $ser_opennow      = ",'$_REQUEST[ser_opennow]'";
            $ser_offer        = ",'$_REQUEST[ser_offer]'";
            $vegmenutype      = ",'$_REQUEST[vegmenutype]'";
            $nonvegmenutype   = ",'$_REQUEST[nonvegmenutype]'";
            $cuisine          = ",'$_REQUEST[cuisine]'";
            $cuisineid        = ",'$_REQUEST[cuisineid]'";
            $ser_area         = ",'$_REQUEST[area]'";
            $ser_city         = ",'$_REQUEST[city]'";
            $ser_areaid       = ",'$_REQUEST[areaid]'";
            $ser_pricemin     = ",'$_REQUEST[pricemin]'";
            $ser_pricemax     = ",'$_REQUEST[pricemax]'";

            $next_page = $this->make_page_usersideAjaxSearch($targetpage, $total_pages, $limit,
                $page, $fields, $searcharea, $searchcuisine, $searchrestaurant, $ser_delivery, $ser_pickup,
                $ser_opennow, $ser_offer, $vegmenutype, $nonvegmenutype, $cuisine, $cuisineid, $ser_area,$ser_city,
                $ser_areaid, $ser_pricemin, $ser_pricemax);
            $sql_limit = $sqlsel . " LIMIT $sql_lim ";
            $sqlres = $this->ExecuteQuery($sql_limit, 'select');

            $today = date("Y-m-d");
            if (count($sqlres) > 0)
            {
               if( isset($_GET['gmapaction']) && !empty($_GET['gmapaction']) && ($_GET['gmapaction']=='gmapresult' ) ){
					header("Content-type: text/xml");
					echo '<markers>';
				}

                foreach ($sqlres as $key => $value)
                {

                    if( !empty($sqlres[$key]['restaurant_logo']) && file_exists($CFG['site']['photo_restaurant_path'].'/logo/'.$sqlres[$key]['restaurant_logo']) ){
                        $sqlres[$key]['restaurant_logo'] = $CFG['site']['photo_restaurant_url'].'/logo/'.$sqlres[$key]['restaurant_logo'];
                    } else {
                        $sqlres[$key]['restaurant_logo'] = $CFG['site']['image_url'].'/no-image.jpg';
                    }

                    $sqlres[$key]['reviewrating']  = $this->averageReviews($sqlres[$key]['restaurant_id']); 
                    $sqlres[$key]['reviewmessage'] = $this->reviewmessage($sqlres[$key]['restaurant_id']);
                    $sqlres[$key]['reviewcount']   = $this->reviewcount($sqlres[$key]['restaurant_id']);     
                    $sqlres[$key]['reviewscount'] =  $this->getNumValues($CFG['table']['restaurant_reviews'],
                    " restaurant_id='" . $this->filterInput($sqlres[$key]['restaurant_id']) . "' AND status = '1' "); 
                    
                    if($sqlres[$key]['restaurant_id'] != ''){
                        $res_ids .= "'".$sqlres[$key]['restaurant_id']."',";
                    }
                    
                    if($sqlres[$key]['restaurant_serving_cuisines'] != ''){
                        $res_cuisine .= "'".$sqlres[$key]['restaurant_serving_cuisines']."',";
                    }
                    
                    if (!empty($sqlres[$key]['restaurant_serving_cuisines']))
                    {
                        $sqlres[$key]['servingcuisine'] = $this->getArrayCuisines($sqlres[$key]['restaurant_serving_cuisines']);
                    }
                    $sqlres[$key]['totalDishes'] = $this->getNumvalues($CFG['table']['restaurant_menu'],
                        "restaurant_id = '" . $this->filterInput($sqlres[$key]['restaurant_id']) .
                        "' AND menu_popular_dish = 'Yes' AND status = '1' ");
                    $sqlres[$key]['totalOffers'] = $this->getNumvalues($CFG['table']['restaurant_offer'],
                        "restaurant_id = '" . $this->filterInput($sqlres[$key]['restaurant_id']) .
                        "' AND status = '1' AND offer_valid_from <= '" . $today .
                        "' AND offer_valid_to >= '" . $today . "' ORDER BY offer_id DESC LIMIT 1");

                    $sqlres[$key]['reszipcode'] = $this->getValue("zipcode", $CFG['table']['zipcode'],
                        "zipcode_id = '" . $this->filterInput($sqlres[$key]['restaurant_zip']) . "'");
                    
                    #--------Open & Close Time Start------------#
                    #First Time
                    $rrr_opentime = $sqlres[$key]['open_time'];
                    $rrr_closetime = $sqlres[$key]['close_time'];

                    #Previous day
                    $rrr_opentime_pre = $sqlres[$key]['first_pre_open_time'];
                    $rrr_closetime_pre = $sqlres[$key]['first_pre_close_time'];

                    #Second Time
                    $sec_rrr_opentime = $sqlres[$key]['secopen_time'];
                    $sec_rrr_closetime = $sqlres[$key]['secclose_time'];

                    #Previous day
                    $sec_rrr_opentime_pre = $sqlres[$key]['sec_pre_open_time'];
                    $sec_rrr_closetime_pre = $sqlres[$key]['sec_pre_close_time'];
                            
                    $sqlres[$key]['first_status']  = $this->openandcloseRecursion($rrr_opentime, $rrr_closetime, $rrr_opentime_pre, $rrr_closetime_pre);
                    $sqlres[$key]['second_status'] = $this->openandcloseRecursion($sec_rrr_opentime, $sec_rrr_closetime, $sec_rrr_opentime_pre, $sec_rrr_closetime_pre);
                    
                    if ($sqlres[$key]['first_status'] == 'Open' || $sqlres[$key]['second_status'] == 'Open')
                    {
                        $sqlres[$key]['status'] = 'Open';
                    } 
                    elseif ($sqlres[$key]['first_status'] == 'Preorder' || $sqlres[$key]['second_status'] == 'Preorder')
                    {
                        $sqlres[$key]['status'] = 'Preorder';
                    }
                    else
                    {
                        $sqlres[$key]['status'] = 'Closed';
                        $sqlres[$key]['tomorrow'] = date("d-m-Y", strtotime("+1 day"));
                        $sqlres[$key]['tomorrowday'] = date("l", strtotime("+1 day"));
                    }
                    
                    #------------Open & Close Time End---------------#

                    if ($sqlres[$key]['status'] == 'Open')
                    {
                        $opencount = $opencount + 1;
                        $rest_id_open[] = $sqlres[$key]['restaurant_id'];
                    }
                    if ($sqlres[$key]['status'] == 'Closed' || $sqlres[$key]['status'] == 'Preorder')
                    {
                        $closedcount = $closedcount + 1;
                        $rest_id_close[] = $sqlres[$key]['restaurant_id'];
                    }
                    
                    if( isset($_GET['gmapaction']) && !empty($_GET['gmapaction']) && ($_GET['gmapaction']=='gmapresult' ) ){
		
						$rest_address 	= $sqlres[$key]['restaurant_streetaddress'];
						$rest_area 		= $sqlres[$key]['area'];
						$rest_city 		= $sqlres[$key]['cityname'];
						$rest_zip 		= $sqlres[$key]['reszipcode'];
						$rest_state 	= $sqlres[$key]['statename'];
						$rest_fullAddress = $this->findFullAddress($rest_address,$rest_area,$rest_city.' - '.$rest_zip,$rest_country);
						
						echo '<marker ';
					  	echo 'restaurantlogo="' . htmlspecialchars($sqlres[$key]['restaurant_logo'], ENT_QUOTES) . '" ';
					  	echo 'restaurantname="' . htmlspecialchars(stripslashes($sqlres[$key]['restaurant_name']), ENT_QUOTES) . '" ';
					  	echo 'restaurantaddress="' . htmlspecialchars(stripslashes($rest_fullAddress), ENT_QUOTES) . '" ';
                        echo 'restaurantlink="' . htmlspecialchars($CFG['site']['base_url_https'].'/restaurantDetails.php?resid='.$sqlres[$key]['restaurant_id'].'&resname='.$sqlres[$key]['restaurant_seourl'], ENT_QUOTES) . '" ';
					  	echo 'lat="' . $sqlres[$key]['restaurant_lat'] . '" ';
					  	echo 'lng="' . $sqlres[$key]['restaurant_long'] . '" ';
					  	echo '/>';
					}
                } //end for foreach
                           
                if( isset($_GET['gmapaction']) && !empty($_GET['gmapaction']) && ($_GET['gmapaction']=='gmapresult' ) ){
					echo '</markers>';
				}
			    
				#Gmap Latitude & longtitude
				$objSmarty->assign('reslattitude', $sqlres['0']['restaurant_lat']);
				$objSmarty->assign('reslongtitude', $sqlres['0']['restaurant_long']);
				$ser_qrystring = (!empty($ser_qrystring)) ? $ser_qrystring : $_SERVER['QUERY_STRING'];
				$objSmarty->assign('ser_qrystring', $ser_qrystring);
            }
        } //end if for not empty of where condition
        else
        {
            $sqlres = array();
        }
        
        $cuis_arr = explode(',',substr($res_cuisine,0,-1));

        $res_ids = substr($res_ids,0,-1);
        
        if($res_ids != ''){
            $sqlsel2 = 	" SELECT cuis.cuisine_id, cuis.cuisine_name, cuis.cuisine_seourl, "."rs.restaurant_id".
            		" FROM ".$CFG['table']['cuisine']." as cuis ".
            		" RIGHT JOIN ".$CFG['table']['restaurant_serving_cuisines']." AS rsc ON cuis.cuisine_id = rsc.cuisine_id ".
            		" RIGHT JOIN ".$CFG['table']['restaurant']." AS rs ON rsc.restaurant_id = rs.restaurant_id ".
            		" WHERE rs.restaurant_id IN (".$res_ids.") AND cuis.cuisine_status = '1' AND rs.restaurant_status = '1' AND cuis.delete_status = 'No' AND rs.delete_status = 'No' AND (rs.restaurant_delivery = 'Yes' OR rs.restaurant_pickup = 'Yes') GROUP BY cuis.cuisine_id ";
            $sqlres2 =  $this->ExecuteQuery($sqlsel2,'select');
          
            if(isset($sqlres2) && !empty($sqlres2)){
                foreach($sqlres2 as $k_cui=>$v_cui){
                    $sqlres2[$k_cui]['counts']  = $this->cusinecount($sqlres2[$k_cui]['cuisine_id'],$res_ids);
                }
            }
        }
        #echo "<pre>"; print_r($sqlres); echo "</pre>";	
        $objSmarty->assign("searchrestaurantList", $sqlres);
        $objSmarty->assign("day", $day);
        $objSmarty->assign("cuisinecount", $sqlres2);
        $objSmarty->assign("searchrestaurantTotal", $total_pages);
        $objSmarty->assign("cuisineid", $getcuisineid);
        $objSmarty->assign("pagination", $next_page);
        $objSmarty->assign("fields", $fields);
        return $total_pages;
        
    }
    /**
     * SearchResult::HourMinuteToDecimal()
     * 
     * @param mixed $hour_minute
     * @return
     */
    function HourMinuteToDecimal($hour_minute)
    {
        $t = explode(':', $hour_minute);
        return $t[0] * 60 + $t[1];
    }
    #--------------------------------------------------------------------------------
    #Choose Cuisine List
    /**
     * SearchResult::chooseCuisineList()
     * 
     * @return
     */
    function chooseCuisineList()
    {
        global $CFG, $objSmarty;

        $sqlsel = " SELECT cuisine_id, cuisine_name, cuisine_seourl FROM " . $CFG['table']['cuisine'] .
            " WHERE cuisine_status = '1' AND delete_status = 'No' ORDER BY cuisine_name ASC ";
        $sqlres = $this->ExecuteQuery($sqlsel, 'select');
        $objSmarty->assign("chooseCuisineList", $sqlres);
        $objSmarty->assign("chooseCuisineTotal", count($sqlres));
        return $sqlres;
    }
    #--------------------------------------------------------------------------------
    #Choose Delivery Area List
    /**
     * SearchResult::chooseDeliveryAreaList()
     * 
     * @return
     */
    function chooseDeliveryAreaList()
    {
        global $CFG, $objSmarty;

        $sqlsel = " SELECT zipcode_id, areaname FROM " . $CFG['table']['zipcode'] .
            " WHERE zipcode_status = '1' ORDER BY areaname ASC ";
        #$sqlsel = " SELECT zipcode_id FROM ".$CFG['table']['restaurant_delivery_areas']." WHERE status = '1' GROUP BY zipcode_id ORDER BY zipcode_id ASC";
        $sqlres = $this->ExecuteQuery($sqlsel, 'select');
        /*foreach($sqlres as $key=>$value){
        $sqlres[$key]['areaname'] = $this->getValue("areaname",$CFG['table']['zipcode'],"zipcode_id = '".$sqlres[$key]['zipcode_id']."'");
        }*/
        $objSmarty->assign("choosedeliveryareaList", $sqlres);
        return true;
    }
    #--------------------------------------------------------------------------------
    #List Popular Dish
    /**
     * SearchResult::popularDishList()
     * 
     * @param mixed $resid
     * @return
     */
    function popularDishList($resid)
    {
        global $CFG, $objSmarty;

        $sel = "SELECT menu_name,menu_price,menu_type,menu_description FROM " . $CFG['table']['restaurant_menu'] .
            " WHERE restaurant_id = '" . $this->filterInput($resid) .
            "' AND menu_popular_dish = 'Yes' AND status = '1' ";
        $res = $this->ExecuteQuery($sel, 'select');
        $objSmarty->assign("populardishlist", $res);
    }
    #--------------------------------------------------------------------------------
    #List Coupon List
    /**
     * SearchResult::searchCouponsList()
     * 
     * @param mixed $resid
     * @return
     */
    function searchCouponsList($resid)
    {
        global $CFG, $objSmarty;

        $sel = "SELECT offer_percentage, offer_price, offer_valid_from, offer_valid_to FROM " .
            $CFG['table']['restaurant_offer'] . " WHERE restaurant_id = '" . $this->filterInput($resid) .
            "' AND status = '1' ORDER BY offer_id DESC LIMIT 1";
        $res = $this->ExecuteQuery($sel, 'select');
        $objSmarty->assign("searchcouponlist", $res);
    }
    #---------------------------------------------------------------------------------
    #Average Reviews
    /**
     * SearchResult::averageReviews()
     * 
     * @param mixed $resid
     * @return
     */
    function averageReviews($resid)
    {
        global $CFG, $objSmarty;
        $sel = "SELECT rating FROM " . $CFG['table']['restaurant_reviews'] .
            " WHERE restaurant_id = '" . $this->filterInput($resid) . "' and status = '1' ";
        $res = $this->ExecuteQuery($sel, 'select');

        $rescnt = count($res);
        
        $sumofrating = 0;
        if ($rescnt > 0)
        {
            foreach ($res as $key => $value)
            {

                $sumofrating += $res[$key]['rating'];
            }

            $sumofrating = ($sumofrating / ($rescnt * 5)) * 100;
            $sumofrating = number_format($sumofrating, 2);
        }
        return $sumofrating;
        
        
    }
    #---------------------------------------------------------------------------------
    # Review Message
    /**
     * SearchResult::reviewmessage()
     * 
     * @param mixed $resid
     * @return
     */
    function reviewmessage($resid) {
        
        global $CFG, $objSmarty;
       
        $sel = "SELECT  message FROM " . $CFG['table']['restaurant_reviews'] .
               " WHERE restaurant_id = '" . $this->filterInput($resid) . "' and status = '1' ORDER BY rating_id  DESC LIMIT 1 ";  
        $res = $this->ExecuteQuery($sel, 'select');
        return $res['0']['message'];

    }
    #---------------------------------------------------------------------------------
    # Review Message
    /**
     * SearchResult::reviewcount()
     * 
     * @param mixed $resid
     * @return
     */
    function reviewcount($resid) {
        
        global $CFG, $objSmarty;
       
        $sel = "SELECT  rating FROM " . $CFG['table']['restaurant_reviews'] .
               " WHERE restaurant_id = '" . $this->filterInput($resid) . "' and status = '1' ORDER BY rating_id  DESC LIMIT 1 ";  
        $res = $this->ExecuteQuery($sel, 'select');
        return $res['0']['rating'];

    }
       function cusinecount($cid,$res_ids){
		global $CFG,$objSmarty;
		
		$sqlsel = " SELECT rsc.cuisine_id ".
		          " FROM ".$CFG['table']['restaurant_serving_cuisines']." as rsc ".
		          " RIGHT JOIN ".$CFG['table']['restaurant']." AS rs ON rsc.restaurant_id = rs.restaurant_id ".
		          " WHERE rs.restaurant_id IN (".$res_ids.") AND rsc.cuisine_id ='".$this->filterInput($cid)."' AND rs.delete_status = 'No' AND rs.restaurant_status = '1' AND (rs.restaurant_delivery = 'Yes' OR rs.restaurant_pickup = 'Yes') ";
		$sqlres =  $this->ExecuteQuery($sqlsel,'select');
		$cnt    = count($sqlres);
		return $cnt;
		
	}
    
    

}

?>