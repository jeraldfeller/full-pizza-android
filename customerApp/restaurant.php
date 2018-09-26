<?php
include ("includes/config.inc.php");
//----------------------------------------------------------------

switch($_REQUEST['action']) {
    
    case ('searchRestaurant') :
    	   
        
	    $day     = strtolower(date('D'));
		$area    = addslashes($_REQUEST["area"]);
		$type    = strtolower($_REQUEST["type"]);
        $cuisine = strtolower($_REQUEST["type"]);
		$today = date("Y-m-d");
        #Filter...........................................................
        #Search Area
        if($area != ''){
            if(isset($area) && !empty($area)){
                
                $condition  =  $objSite->getNumValues($CFG['table']['state'], " state_status = '1' AND state_seourl = '" . $area . "' ");
                $condition1 = $objSite->getNumValues($CFG['table']['city'], " city_status = '1' AND cityname = '" . $area . "' ");
                $condition2 = $objSite->getNumValues($CFG['table']['zipcode'], " zipcode_status = '1' AND zipcode = '" . $area . "' AND zipcode != '0' ");
            }
            
            if(!empty($condition) || !empty($condition1) || !empty($condition2)){
                
                switch($type){
                    case ('delivery'): $wherecond .= " AND rest.restaurant_delivery = 'Yes' "; break;
                    case ('pickup'): $wherecond .= " AND rest.restaurant_pickup = 'Yes' "; break;
                    case ('bookatable'): $wherecond .= " AND rest.restaurant_booktable = 'Yes' "; break;
                    case ('offer'): $wherecond1 .= " AND ( offer.offer_valid_from <= '" . $today . "' AND offer.offer_valid_to >= '" . $today . "' AND offer.status = '1' )";
                    default : $wherecond .= " AND (rest.restaurant_pickup = 'Yes' OR rest.restaurant_delivery = 'Yes') "; break;
                }  
            }
                if (!empty($area))
                {
                    $res_city = $area;
                }
                #echo"<pre>";print_r($_REQUEST['cuisineid']);echo"</pre>";
                #$check = implode(',', $_REQUEST['cuisineid']);
                #echo"<pre>";print_r($check);echo"</pre>";
                #Cuisine from search Result page
                if (isset($_REQUEST['cuisineid']) && !empty($_REQUEST['cuisineid']))
                {
                    $cuisineidstr = $_REQUEST['cuisineid'];
        
                    $cuisineidarr = explode(',', $cuisineidstr);
                    if (isset($cuisineidstr) && !empty($cuisineidstr))
                    {
                        $wherecond1 .= " AND cui.cuisine_id IN(" . $cuisineidstr . ") ";
                        //$wherecond1 .= " AND cui.cuisine_id IN(" . $cuisineidstr . ") ";
                    }
                } 
                #Calculate Lattitude & longtitude for search area
                
                list($find_lat, $find_long) = $objSite->findLatLongFromAddress($res_straddress = '', $res_area = '', $res_city , $res_state = '', $rest_country = '');    
                   
                
                if (!empty($find_lat) && !empty($find_long))
                {
                    $select_gmap_service = " ROUND(  ( 3959  * acos( cos( radians(" . $find_lat .
                        ") ) * cos( radians( rest.restaurant_lat ) ) * cos( radians( rest.restaurant_long ) - radians(" .
                        $find_long . ") ) + sin( radians(" . $find_lat .
                        ") ) * sin( radians( rest.restaurant_lat ) ) ) ),2  ) AS distance, ";
                
                
                    #$gps_restaurant_id = $this->searchResultRestaurant_GPS();
                    if (isset($select_gmap_service) && !empty($select_gmap_service))
                    {
                        mysql_query("SET OPTION SQL_BIG_SELECTS=1");
                        $sqlsel = "SELECT " . $select_gmap_service .
                            " rest.restaurant_id, rest.restaurant_delivery_distance " . "FROM " . $CFG['table']['restaurant'] .
                            " AS rest " . " LEFT JOIN " . $CFG['table']['zipcode'] .
                            " AS zip ON rest.restaurant_zip = zip.zipcode_id " .
                            "	WHERE rest.restaurant_status = '1'  " . $wherecond . "  " . $cond_gmap_service .
                            " ORDER BY distance ASC ";
                        $sqlres = $objSite->ExecuteQuery($sqlsel, 'select');
        
                        if (count($sqlres) > 0)
                        {
                            foreach ($sqlres as $key => $value)
                            {
        
                                if (empty($sqlres[$key]['distance']))
                                {
                                    $sqlres[$key]['distance'] = '0.00';
                                }
                                if (($sqlres[$key]['restaurant_delivery_distance'] >= $sqlres[$key]['distance']) ||
                                    ($sqlres[$key]['restaurant_delivery_distance'] == 0 && $sqlres[$key]['distance'] <=
                                    1))
                                {
                                    $service_rest_id[] = $sqlres[$key]['restaurant_id'];
                                }
                            } //end for foreach
                        }
        
                        if (!empty($service_rest_id))
                            $gps_restaurant_id = implode(',', $service_rest_id);
                    }
        
                    if (isset($gps_restaurant_id) && !empty($gps_restaurant_id))
                    {
                        $wherecond .= " AND rest.restaurant_id IN (" . $gps_restaurant_id . ") ";
                    }
                 }else{
                    $areaid = $objSite->getValue('city_id',$CFG['table']['city'],"cityname LIKE '%".$area."%'");
                    if($areaid == ''){
                        $wherecond .= " AND rest.restaurant_zip LIKE '%".$area."%' ";
                    }else{
                        $wherecond .= " AND rest.restaurant_city = '".$areaid."' ";
                    }                   
                 }  
            //}
        }
        //Restaurant Open And Close Timings
        if ($day != '') {
            $openClose = ", tim.".$day."_firstopen_time AS firstOpen, tim.".$day."_firstclose_time AS firstClose, tim.".$day."_secondopen_time AS secondOpen, tim.".$day."_secondclose_time AS secondClose ";
        }
        
        if($wherecond != '' || $wherecond1 != '') {
            //search result
            mysql_query("SET OPTION SQL_BIG_SELECTS=1");
    		$sql = " SELECT rest.restaurant_id, rest.restaurant_name, rest.restaurant_delivery, rest.restaurant_delivery_charge, rest.restaurant_logo, rest.restaurant_minorder_price, rest.restaurant_serving_cuisines, rest.restaurant_streetaddress,rest.restaurant_feature_status, rest.restaurant_zip, rest.restaurant_lat AS res_latitude, rest.restaurant_long AS res_longitude, rest.restaurant_set_status,   ".
    					  " cty.cityname, "."zip.zipcode, zip.areaname, "."state.statename ".$openClose.
    					  "	FROM rt_restaurant AS rest ".
    					  " LEFT JOIN rt_city AS cty ON rest.restaurant_city = cty.city_id ".
    					  " LEFT JOIN rt_state AS state ON rest.restaurant_state = state.statecode ".
    					  //" LEFT JOIN rt_restaurant_menu AS menu ON rest.restaurant_id = menu.restaurant_id ".
    					  //" LEFT JOIN rt_restaurant_offer AS offer ON rest.restaurant_id = offer.restaurant_id ".
    					  " LEFT JOIN rt_restaurant_serving_cuisines AS cui ON rest.restaurant_id = cui.restaurant_id ".
    					  " LEFT JOIN rt_cuisine AS cuisine ON cuisine.cuisine_id = cui.cuisine_id ".
    					  " LEFT JOIN rt_restaurant_delivery_areas AS area ON rest.restaurant_id = area.restaurant_id ".
    					  " LEFT JOIN rt_zipcode AS zip ON (area.zipcode_id = zip.zipcode_id OR rest.restaurant_zip = zip.zipcode_id) ".
                          " LEFT JOIN ".$CFG['table']['restaurant_timing']." AS tim ON (rest.restaurant_id = tim.restaurant_id)".
    					  #" LEFT JOIN rt_restaurant_reviews AS rvw ON rest.restaurant_id = rvw.restaurant_id AND rvw.restaurant_id != ''".
    					  "	WHERE rest.restaurant_status = '1' AND rest.delete_status = 'No' ".$wherecond." ".$wherecond1." GROUP BY rest.restaurant_id  ";
            $res = mysql_query($sql) or die(mysql_error());
            
    		if(mysql_num_rows($res)>0)
    		{
    			while($row=mysql_fetch_assoc($res))
    			{
    				$row_list[] = $row;
    			}
                #echo $CFG['site']['photo_restaurant_path']."<br />";
                #echo "<pre>"; print_r($row_list); echo "</pre>";exit;
                foreach($row_list as $key=>$value){
                    
                    if($row_list[$key]['restaurant_id'] != ''){
                        $res_ids .= "'".$row_list[$key]['restaurant_id']."',";
                    }
                    
                    $today = date("Y-m-d");
                    
                    $row_list[$key]['offer_percentage'] = $objSite->getValue("offer_percentage",$CFG['table']['restaurant_offer'],
                            "restaurant_id = '" . $row_list[$key]['restaurant_id'] .
                            "' AND status = '1' AND offer_valid_from <= '" . $today .
                            "' AND offer_valid_to >= '" . $today . "' ORDER BY offer_id DESC LIMIT 1");
                    $row_list[$key]['offer_percentage'] = ($row_list[$key]['offer_percentage'] != '') ? $row_list[$key]['offer_percentage'] : '';
                    
                    #serving Cuisine
                    if (!empty($row_list[$key]['restaurant_serving_cuisines'])){
                        $row_list[$key]['restaurant_serving_cuisines'] = $objSite->getArrayCuisines($row_list[$key]['restaurant_serving_cuisines']);
                    }
                    #Restaurant Logo
                    if( !empty($row_list[$key]['restaurant_logo']) && file_exists($CFG['site']['photo_restaurant_path'].'/logo/'.$row_list[$key]['restaurant_logo']) ){
    					$row_list[$key]['restaurant_logo'] = $CFG['site']['photo_restaurant_url'].'/logo/'.$row_list[$key]['restaurant_logo'];
    				}else{
    					$row_list[$key]['restaurant_logo'] = $CFG['site']['theme_image_url'].'/no-image.jpg';
    				}
                    
                    $Review = $objSite->averageReviews($row_list[$key]['restaurant_id']);
                    
                    if($Review != ''){
                        $row_list[$key]['total_rating'] = $Review;
                    } else {
                        $row_list[$key]['total_rating'] = 0;
                    }
                    
                    $voucher = "SELECT voucher_id FROM rt_restaurant_voucher WHERE restaurant_id = ".$value['restaurant_id']." " ; 
                    $voucher_list = $objSite->ExecuteQuery($voucher, "select");
                    if(!empty($voucher_list)) {
                        foreach($voucher_list as $voukey=> $vouvalue)
                        {
                            $voucherAvailable =  $objSite->getNumValues('rt_voucher', " valid_from <= '" . $today . "' AND valid_to >= '" . $today . "' AND status = '1' AND id = '".$vouvalue['voucher_id']."' ");
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
                    
                    /*$firstStatus = $objSite->openandcloseRecursion($row_list[$key]['firstOpen'], $row_list[$key]['firstClose'],'','');
                    $secondStatus= $objSite->openandcloseRecursion($row_list[$key]['secondOpen'], $row_list[$key]['secondClose'],'','');
                    $row_list[$key]['status'] = ($firstStatus == 'Open' || $secondStatus == 'Open') ? 'Open' : 'Close';
                    $voucherAvailable = '';*/
                    
                    if ($restaurantSetStatus == 'TT' || $restaurantSetStatus == '') {
                        $firstStatus = $objSite->openandcloseRecursion($row_list[$key]['firstOpen'], $row_list[$key]['firstClose'],'','');
                        $secondStatus= $objSite->openandcloseRecursion($row_list[$key]['secondOpen'], $row_list[$key]['secondClose'],'','');
                        //$row_list[$key]['status'] = ($firstStatus == 'Open' || $secondStatus == 'Open') ? 'Open' : 'Pre order';
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
                    if(trim($value['status']) == 'Close') {
                        $restaurants[] = $value;
                    }
                }
                
                $res_ids = substr($res_ids,0,-1);
        
                if($res_ids != ''){
                    $sqlsel2 = 	" SELECT cuis.cuisine_id, cuis.cuisine_name, cuis.cuisine_seourl, "."rs.restaurant_id".
                    		" FROM ".$CFG['table']['cuisine']." as cuis ".
                    		" RIGHT JOIN ".$CFG['table']['restaurant_serving_cuisines']." AS rsc ON cuis.cuisine_id = rsc.cuisine_id ".
                    		" RIGHT JOIN ".$CFG['table']['restaurant']." AS rs ON rsc.restaurant_id = rs.restaurant_id ".
                    		" WHERE rs.restaurant_id IN (".$res_ids.") AND cuis.cuisine_status = '1' AND rs.restaurant_status = '1' AND cuis.delete_status = 'No' AND rs.delete_status = 'No' AND (rs.restaurant_delivery = 'Yes' OR rs.restaurant_pickup = 'Yes') GROUP BY cuis.cuisine_id ";
                    $sqlres2 =  $objSite->ExecuteQuery($sqlsel2,'select');
                  
                    if(isset($sqlres2) && !empty($sqlres2)){
                        foreach($sqlres2 as $k_cui=>$v_cui){
                            $sqlres2[$k_cui]['counts']  = $objSite->cusinecount($sqlres2[$k_cui]['cuisine_id'],$res_ids);
                        }
                    }
                    
                    $cuisineList = $sqlres2;
                }else{
                    $cuisineList[] = array();
                }
                
                
    			$response["status"] = 1;
                $response["restaurants"] = $restaurants;
                $response["cuisineList"] = $cuisineList;
    		}
            else
    		{
    			$response["status"] = 0;
    			$response["message"] = "There is no restaurant(s)";
    		}
        }
		else
		{
			$response["status"] = 0;
			$response["message"] = "There is no restaurant(s)";
		}
    	echo json_encode($response, true);
        break;
    
    case ('searchAllRestaurants') :
    	   
        
        
	    $day     = strtolower(date('D'));
		//$area    = addslashes($_REQUEST["area"]);
		//$user_longitude = strtolower($_REQUEST["long"]);
		//$user_latitude 	= strtolower($_REQUEST["lat"]);
		$type    = strtolower($_REQUEST["type"]);
        //$cuisine = strtolower($_REQUEST["type"]);
		$today = date("Y-m-d");
        #Filter...........................................................
        #Search Area
        //if($area != ''){
            
            /*
            if(isset($area) && !empty($area)){
                
                $condition  =  $objSite->getNumValues($CFG['table']['state'], " state_status = '1' AND state_seourl = '" . $area . "' ");
                $condition1 = $objSite->getNumValues($CFG['table']['city'], " city_status = '1' AND cityname = '" . $area . "' ");
                $condition2 = $objSite->getNumValues($CFG['table']['zipcode'], " zipcode_status = '1' AND zipcode = '" . $area . "' AND zipcode != '0' ");
            }
            */
            
            //if(!empty($condition) || !empty($condition1) || !empty($condition2)){
                
                switch($type){
                    case ('delivery'): $wherecond .= " AND rest.restaurant_delivery = 'Yes' "; break;
                    case ('pickup'): $wherecond .= " AND rest.restaurant_pickup = 'Yes' "; break;
                    case ('bookatable'): $wherecond .= " AND rest.restaurant_booktable = 'Yes' "; break;
                    case ('offer'): $wherecond1 .= " AND ( offer.offer_valid_from <= '" . $today . "' AND offer.offer_valid_to >= '" . $today . "' AND offer.status = '1' )";
                    default : $wherecond .= " AND (rest.restaurant_pickup = 'Yes' OR rest.restaurant_delivery = 'Yes') "; break;
                }  
            //}
                if (!empty($area))
                {
                    $res_city = $area;
                }
                #echo"<pre>";print_r($_REQUEST['cuisineid']);echo"</pre>";
                #$check = implode(',', $_REQUEST['cuisineid']);
                #echo"<pre>";print_r($check);echo"</pre>";
                #Cuisine from search Result page
                /*
                if (isset($_REQUEST['cuisineid']) && !empty($_REQUEST['cuisineid']))
                {
                    $cuisineidstr = $_REQUEST['cuisineid'];
        
                    $cuisineidarr = explode(',', $cuisineidstr);
                    if (isset($cuisineidstr) && !empty($cuisineidstr))
                    {
                        $wherecond1 .= " AND cui.cuisine_id IN(" . $cuisineidstr . ") ";
                        //$wherecond1 .= " AND cui.cuisine_id IN(" . $cuisineidstr . ") ";
                    }
                } 
                */
                #Calculate Lattitude & longtitude for search area
                /*
                list($find_lat, $find_long) = $objSite->findLatLongFromAddress($res_straddress = '', $res_area = '', $res_city , $res_state = '', $rest_country = '');    
                   
                
                if (!empty($find_lat) && !empty($find_long))
                {
                    $select_gmap_service = " ROUND(  ( 3959  * acos( cos( radians(" . $find_lat .
                        ") ) * cos( radians( rest.restaurant_lat ) ) * cos( radians( rest.restaurant_long ) - radians(" .
                        $find_long . ") ) + sin( radians(" . $find_lat .
                        ") ) * sin( radians( rest.restaurant_lat ) ) ) ),2  ) AS distance, ";
                
                
                    #$gps_restaurant_id = $this->searchResultRestaurant_GPS();
                    if (isset($select_gmap_service) && !empty($select_gmap_service))
                    {
                        mysql_query("SET OPTION SQL_BIG_SELECTS=1");
                        $sqlsel = "SELECT " . $select_gmap_service .
                            " rest.restaurant_id, rest.restaurant_delivery_distance " . "FROM " . $CFG['table']['restaurant'] .
                            " AS rest " . " LEFT JOIN " . $CFG['table']['zipcode'] .
                            " AS zip ON rest.restaurant_zip = zip.zipcode_id " .
                            "	WHERE rest.restaurant_status = '1'  " . $wherecond . "  " . $cond_gmap_service .
                            " ORDER BY distance ASC ";
                        $sqlres = $objSite->ExecuteQuery($sqlsel, 'select');
        
                        if (count($sqlres) > 0)
                        {
                            foreach ($sqlres as $key => $value)
                            {
        
                                if (empty($sqlres[$key]['distance']))
                                {
                                    $sqlres[$key]['distance'] = '0.00';
                                }
                                if (($sqlres[$key]['restaurant_delivery_distance'] >= $sqlres[$key]['distance']) ||
                                    ($sqlres[$key]['restaurant_delivery_distance'] == 0 && $sqlres[$key]['distance'] <=
                                    1))
                                {
                                    $service_rest_id[] = $sqlres[$key]['restaurant_id'];
                                }
                            } //end for foreach
                        }
        
                        if (!empty($service_rest_id))
                            $gps_restaurant_id = implode(',', $service_rest_id);
                    }
        
                    if (isset($gps_restaurant_id) && !empty($gps_restaurant_id))
                    {
                        $wherecond .= " AND rest.restaurant_id IN (" . $gps_restaurant_id . ") ";
                    }
                 }else{
                    $areaid = $objSite->getValue('city_id',$CFG['table']['city'],"cityname LIKE '%".$area."%'");
                    if($areaid == ''){
                        $wherecond .= " AND rest.restaurant_zip LIKE '%".$area."%' ";
                    }else{
                        $wherecond .= " AND rest.restaurant_city = '".$areaid."' ";
                    }                   
                 }  
                 */
            //}
        //}
        //Restaurant Open And Close Timings
        if ($day != '') {
            $openClose = ", tim.".$day."_firstopen_time AS firstOpen, tim.".$day."_firstclose_time AS firstClose, tim.".$day."_secondopen_time AS secondOpen, tim.".$day."_secondclose_time AS secondClose ";
        }
        
        
        
        
        
        if($wherecond != '' || $wherecond1 != '') {
            //search result
            mysql_query("SET OPTION SQL_BIG_SELECTS=1");
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
    					  "	WHERE rest.restaurant_status = '1' AND rest.delete_status = 'No' ".$wherecond." ".$wherecond1." GROUP BY rest.restaurant_id  ";
            //echo $sql; 
            //die();
            $res = mysql_query($sql) or die(mysql_error());
            
    		if(mysql_num_rows($res)>0)
    		{
    			while($row=mysql_fetch_assoc($res))
    			{
    				$row_list[] = $row;
    			}
                #echo $CFG['site']['photo_restaurant_path']."<br />";
                #echo "<pre>"; print_r($row_list); echo "</pre>";exit;
                
                
                
                foreach($row_list as $key=>$value){
                    
                    if($row_list[$key]['restaurant_id'] != ''){
                        $res_ids .= "'".$row_list[$key]['restaurant_id']."',";
                    }
                    
                    $today = date("Y-m-d");
                    
                    $row_list[$key]['offer_percentage'] = $objSite->getValue("offer_percentage",$CFG['table']['restaurant_offer'],
                            "restaurant_id = '" . $row_list[$key]['restaurant_id'] .
                            "' AND status = '1' AND offer_valid_from <= '" . $today .
                            "' AND offer_valid_to >= '" . $today . "' ORDER BY offer_id DESC LIMIT 1");
                    $row_list[$key]['offer_percentage'] = ($row_list[$key]['offer_percentage'] != '') ? $row_list[$key]['offer_percentage'] : '';
                    
                    #serving Cuisine
                    if (!empty($row_list[$key]['restaurant_serving_cuisines'])){
                        $row_list[$key]['restaurant_serving_cuisines'] = $objSite->getArrayCuisines($row_list[$key]['restaurant_serving_cuisines']);
                    }
                    #Restaurant Logo
                    if( !empty($row_list[$key]['restaurant_logo']) && file_exists($CFG['site']['photo_restaurant_path'].'/logo/'.$row_list[$key]['restaurant_logo']) ){
    					$row_list[$key]['restaurant_logo'] = $CFG['site']['photo_restaurant_url'].'/logo/'.$row_list[$key]['restaurant_logo'];
    				}else{
    					$row_list[$key]['restaurant_logo'] = $CFG['site']['theme_image_url'].'/no-image.jpg';
    				}
                    
                    $Review = $objSite->averageReviews($row_list[$key]['restaurant_id']);
                    
                    if($Review != ''){
                        $row_list[$key]['total_rating'] = $Review;
                    } else {
                        $row_list[$key]['total_rating'] = 0;
                    }
                    
                    $voucher = "SELECT voucher_id FROM rt_restaurant_voucher WHERE restaurant_id = ".$value['restaurant_id']." " ; 
                    $voucher_list = $objSite->ExecuteQuery($voucher, "select");
                    if(!empty($voucher_list)) {
                        foreach($voucher_list as $voukey=> $vouvalue)
                        {
                            $voucherAvailable =  $objSite->getNumValues('rt_voucher', " valid_from <= '" . $today . "' AND valid_to >= '" . $today . "' AND status = '1' AND id = '".$vouvalue['voucher_id']."' ");
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
                    
                    /*$firstStatus = $objSite->openandcloseRecursion($row_list[$key]['firstOpen'], $row_list[$key]['firstClose'],'','');
                    $secondStatus= $objSite->openandcloseRecursion($row_list[$key]['secondOpen'], $row_list[$key]['secondClose'],'','');
                    $row_list[$key]['status'] = ($firstStatus == 'Open' || $secondStatus == 'Open') ? 'Open' : 'Close';
                    $voucherAvailable = '';*/
                    
                    if ($restaurantSetStatus == 'TT' || $restaurantSetStatus == '') {
                        $firstStatus = $objSite->openandcloseRecursion($row_list[$key]['firstOpen'], $row_list[$key]['firstClose'],'','');
                        $secondStatus= $objSite->openandcloseRecursion($row_list[$key]['secondOpen'], $row_list[$key]['secondClose'],'','');
                        //$row_list[$key]['status'] = ($firstStatus == 'Open' || $secondStatus == 'Open') ? 'Open' : 'Pre order';
                        
                        
                        
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
                        
                        //echo $row_list[$key]['status'];
                        
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
        
                if($res_ids != ''){
                    $sqlsel2 = 	" SELECT cuis.cuisine_id, cuis.cuisine_name, cuis.cuisine_seourl, "."rs.restaurant_id".
                    		" FROM ".$CFG['table']['cuisine']." as cuis ".
                    		" RIGHT JOIN ".$CFG['table']['restaurant_serving_cuisines']." AS rsc ON cuis.cuisine_id = rsc.cuisine_id ".
                    		" RIGHT JOIN ".$CFG['table']['restaurant']." AS rs ON rsc.restaurant_id = rs.restaurant_id ".
                    		" WHERE rs.restaurant_id IN (".$res_ids.") AND cuis.cuisine_status = '1' AND rs.restaurant_status = '1' AND cuis.delete_status = 'No' AND rs.delete_status = 'No' AND (rs.restaurant_delivery = 'Yes' OR rs.restaurant_pickup = 'Yes') GROUP BY cuis.cuisine_id ";
                    $sqlres2 =  $objSite->ExecuteQuery($sqlsel2,'select');
                  
                    if(isset($sqlres2) && !empty($sqlres2)){
                        foreach($sqlres2 as $k_cui=>$v_cui){
                            $sqlres2[$k_cui]['counts']  = $objSite->cusinecount($sqlres2[$k_cui]['cuisine_id'],$res_ids);
                        }
                    }
                    
                    $cuisineList = $sqlres2;
                }else{
                    $cuisineList[] = array();
                }
                
                
    			$response["status"] = 1;
                $response["restaurants"] = $restaurants;
                $response["cuisineList"] = $cuisineList;
    		}
            else
    		{
    			$response["status"] = 0;
    			$response["message"] = "There is no restaurant(s)";
    		}
        }
		else
		{
			$response["status"] = 0;
			$response["message"] = "There is no restaurant(s)";
		}
    	echo json_encode($response, true);
        break;
        
        case ('searchDeliveryRestaurant') :
    	   
        
        
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
            
            /*
            if(isset($area) && !empty($area)){
                
                $condition  =  $objSite->getNumValues($CFG['table']['state'], " state_status = '1' AND state_seourl = '" . $area . "' ");
                $condition1 = $objSite->getNumValues($CFG['table']['city'], " city_status = '1' AND cityname = '" . $area . "' ");
                $condition2 = $objSite->getNumValues($CFG['table']['zipcode'], " zipcode_status = '1' AND zipcode = '" . $area . "' AND zipcode != '0' ");
            }
            */
            
            //if(!empty($condition) || !empty($condition1) || !empty($condition2)){
                
                switch($type){
                    case ('delivery'): $wherecond .= " AND rest.restaurant_delivery = 'Yes' "; break;
                    case ('pickup'): $wherecond .= " AND rest.restaurant_pickup = 'Yes' "; break;
                    case ('bookatable'): $wherecond .= " AND rest.restaurant_booktable = 'Yes' "; break;
                    case ('offer'): $wherecond1 .= " AND ( offer.offer_valid_from <= '" . $today . "' AND offer.offer_valid_to >= '" . $today . "' AND offer.status = '1' )";
                    default : $wherecond .= " AND (rest.restaurant_pickup = 'Yes' OR rest.restaurant_delivery = 'Yes') "; break;
                }  
            //}
                if (!empty($area))
                {
                    $res_city = $area;
                }
                #echo"<pre>";print_r($_REQUEST['cuisineid']);echo"</pre>";
                #$check = implode(',', $_REQUEST['cuisineid']);
                #echo"<pre>";print_r($check);echo"</pre>";
                #Cuisine from search Result page
                /*
                if (isset($_REQUEST['cuisineid']) && !empty($_REQUEST['cuisineid']))
                {
                    $cuisineidstr = $_REQUEST['cuisineid'];
        
                    $cuisineidarr = explode(',', $cuisineidstr);
                    if (isset($cuisineidstr) && !empty($cuisineidstr))
                    {
                        $wherecond1 .= " AND cui.cuisine_id IN(" . $cuisineidstr . ") ";
                        //$wherecond1 .= " AND cui.cuisine_id IN(" . $cuisineidstr . ") ";
                    }
                } 
                */
                #Calculate Lattitude & longtitude for search area
                /*
                list($find_lat, $find_long) = $objSite->findLatLongFromAddress($res_straddress = '', $res_area = '', $res_city , $res_state = '', $rest_country = '');    
                   
                
                if (!empty($find_lat) && !empty($find_long))
                {
                    $select_gmap_service = " ROUND(  ( 3959  * acos( cos( radians(" . $find_lat .
                        ") ) * cos( radians( rest.restaurant_lat ) ) * cos( radians( rest.restaurant_long ) - radians(" .
                        $find_long . ") ) + sin( radians(" . $find_lat .
                        ") ) * sin( radians( rest.restaurant_lat ) ) ) ),2  ) AS distance, ";
                
                
                    #$gps_restaurant_id = $this->searchResultRestaurant_GPS();
                    if (isset($select_gmap_service) && !empty($select_gmap_service))
                    {
                        mysql_query("SET OPTION SQL_BIG_SELECTS=1");
                        $sqlsel = "SELECT " . $select_gmap_service .
                            " rest.restaurant_id, rest.restaurant_delivery_distance " . "FROM " . $CFG['table']['restaurant'] .
                            " AS rest " . " LEFT JOIN " . $CFG['table']['zipcode'] .
                            " AS zip ON rest.restaurant_zip = zip.zipcode_id " .
                            "	WHERE rest.restaurant_status = '1'  " . $wherecond . "  " . $cond_gmap_service .
                            " ORDER BY distance ASC ";
                        $sqlres = $objSite->ExecuteQuery($sqlsel, 'select');
        
                        if (count($sqlres) > 0)
                        {
                            foreach ($sqlres as $key => $value)
                            {
        
                                if (empty($sqlres[$key]['distance']))
                                {
                                    $sqlres[$key]['distance'] = '0.00';
                                }
                                if (($sqlres[$key]['restaurant_delivery_distance'] >= $sqlres[$key]['distance']) ||
                                    ($sqlres[$key]['restaurant_delivery_distance'] == 0 && $sqlres[$key]['distance'] <=
                                    1))
                                {
                                    $service_rest_id[] = $sqlres[$key]['restaurant_id'];
                                }
                            } //end for foreach
                        }
        
                        if (!empty($service_rest_id))
                            $gps_restaurant_id = implode(',', $service_rest_id);
                    }
        
                    if (isset($gps_restaurant_id) && !empty($gps_restaurant_id))
                    {
                        $wherecond .= " AND rest.restaurant_id IN (" . $gps_restaurant_id . ") ";
                    }
                 }else{
                    $areaid = $objSite->getValue('city_id',$CFG['table']['city'],"cityname LIKE '%".$area."%'");
                    if($areaid == ''){
                        $wherecond .= " AND rest.restaurant_zip LIKE '%".$area."%' ";
                    }else{
                        $wherecond .= " AND rest.restaurant_city = '".$areaid."' ";
                    }                   
                 }  
                 */
            //}
        //}
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
            mysql_query("SET OPTION SQL_BIG_SELECTS=1");
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
            //echo $sql; 
            //die();
            $res = mysql_query($sql) or die(mysql_error());
            
    		if(mysql_num_rows($res)>0)
    		{
    			while($row=mysql_fetch_assoc($res))
    			{
    				$row_list[] = $row;
    			}
                #echo $CFG['site']['photo_restaurant_path']."<br />";
                #echo "<pre>"; print_r($row_list); echo "</pre>";exit;
                
                
                
                foreach($row_list as $key=>$value){
                    
                    if($row_list[$key]['restaurant_id'] != ''){
                        $res_ids .= "'".$row_list[$key]['restaurant_id']."',";
                    }
                    
                    $today = date("Y-m-d");
                    
                    $row_list[$key]['offer_percentage'] = $objSite->getValue("offer_percentage",$CFG['table']['restaurant_offer'],
                            "restaurant_id = '" . $row_list[$key]['restaurant_id'] .
                            "' AND status = '1' AND offer_valid_from <= '" . $today .
                            "' AND offer_valid_to >= '" . $today . "' ORDER BY offer_id DESC LIMIT 1");
                    $row_list[$key]['offer_percentage'] = ($row_list[$key]['offer_percentage'] != '') ? $row_list[$key]['offer_percentage'] : '';
                    
                    #serving Cuisine
                    if (!empty($row_list[$key]['restaurant_serving_cuisines'])){
                        $row_list[$key]['restaurant_serving_cuisines'] = $objSite->getArrayCuisines($row_list[$key]['restaurant_serving_cuisines']);
                    }
                    #Restaurant Logo
                    if( !empty($row_list[$key]['restaurant_logo']) && file_exists($CFG['site']['photo_restaurant_path'].'/logo/'.$row_list[$key]['restaurant_logo']) ){
    					$row_list[$key]['restaurant_logo'] = $CFG['site']['photo_restaurant_url'].'/logo/'.$row_list[$key]['restaurant_logo'];
    				}else{
    					$row_list[$key]['restaurant_logo'] = $CFG['site']['theme_image_url'].'/no-image.jpg';
    				}
                    
                    $Review = $objSite->averageReviews($row_list[$key]['restaurant_id']);
                    
                    if($Review != ''){
                        $row_list[$key]['total_rating'] = $Review;
                    } else {
                        $row_list[$key]['total_rating'] = 0;
                    }
                    
                    $voucher = "SELECT voucher_id FROM rt_restaurant_voucher WHERE restaurant_id = ".$value['restaurant_id']." " ; 
                    $voucher_list = $objSite->ExecuteQuery($voucher, "select");
                    if(!empty($voucher_list)) {
                        foreach($voucher_list as $voukey=> $vouvalue)
                        {
                            $voucherAvailable =  $objSite->getNumValues('rt_voucher', " valid_from <= '" . $today . "' AND valid_to >= '" . $today . "' AND status = '1' AND id = '".$vouvalue['voucher_id']."' ");
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
                    
                    /*$firstStatus = $objSite->openandcloseRecursion($row_list[$key]['firstOpen'], $row_list[$key]['firstClose'],'','');
                    $secondStatus= $objSite->openandcloseRecursion($row_list[$key]['secondOpen'], $row_list[$key]['secondClose'],'','');
                    $row_list[$key]['status'] = ($firstStatus == 'Open' || $secondStatus == 'Open') ? 'Open' : 'Close';
                    $voucherAvailable = '';*/
                    
                    if ($restaurantSetStatus == 'TT' || $restaurantSetStatus == '') {
                        $firstStatus = $objSite->openandcloseRecursion($row_list[$key]['firstOpen'], $row_list[$key]['firstClose'],'','');
                        $secondStatus= $objSite->openandcloseRecursion($row_list[$key]['secondOpen'], $row_list[$key]['secondClose'],'','');
                        //$row_list[$key]['status'] = ($firstStatus == 'Open' || $secondStatus == 'Open') ? 'Open' : 'Pre order';
                        
                        
                        
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
                        
                        //echo $row_list[$key]['status'];
                        
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
        
                if($res_ids != ''){
                    $sqlsel2 = 	" SELECT cuis.cuisine_id, cuis.cuisine_name, cuis.cuisine_seourl, "."rs.restaurant_id".
                    		" FROM ".$CFG['table']['cuisine']." as cuis ".
                    		" RIGHT JOIN ".$CFG['table']['restaurant_serving_cuisines']." AS rsc ON cuis.cuisine_id = rsc.cuisine_id ".
                    		" RIGHT JOIN ".$CFG['table']['restaurant']." AS rs ON rsc.restaurant_id = rs.restaurant_id ".
                    		" WHERE rs.restaurant_id IN (".$res_ids.") AND cuis.cuisine_status = '1' AND rs.restaurant_status = '1' AND cuis.delete_status = 'No' AND rs.delete_status = 'No' AND (rs.restaurant_delivery = 'Yes' OR rs.restaurant_pickup = 'Yes') GROUP BY cuis.cuisine_id ";
                    $sqlres2 =  $objSite->ExecuteQuery($sqlsel2,'select');
                  
                    if(isset($sqlres2) && !empty($sqlres2)){
                        foreach($sqlres2 as $k_cui=>$v_cui){
                            $sqlres2[$k_cui]['counts']  = $objSite->cusinecount($sqlres2[$k_cui]['cuisine_id'],$res_ids);
                        }
                    }
                    
                    $cuisineList = $sqlres2;
                }else{
                    $cuisineList[] = array();
                }
                
                
    			$response["status"] = 1;
                $response["restaurants"] = $restaurants;
                $response["cuisineList"] = $cuisineList;
    		}
            else
    		{
    			$response["status"] = 0;
    			$response["message"] = "There is no restaurant(s)";
    		}
        }
		else
		{
			$response["status"] = 0;
			$response["message"] = "There is no restaurant(s)";
		}
    	echo json_encode($response, true);
        break;
        
    case ('restaurantDetails') :
        if(isset($_REQUEST['resid']) && !empty($_REQUEST['resid'])){
        
            $day            = strtolower(date('D'));
            $restaurantid   = $_REQUEST['resid'];
            if( isset($_REQUEST['resid']) && !empty($_REQUEST['resid']) ){
    			$condition .= " AND rest.restaurant_id = '".$_REQUEST['resid']."' ";
    		}
            #Restaurant Open And Close Timings
            if ($day != '') {
                $openClose = " tim.".$day."_firstopen_time AS firstOpen, tim.".$day."_firstclose_time AS firstClose, tim.".$day."_secondopen_time AS secondOpen, tim.".$day."_secondclose_time AS secondClose, ";
            }
            
            $today = date("Y-m-d");
            $off = " AND ";
            
    		$sort = " ORDER BY rest.restaurant_id ASC LIMIT 1";
    		mysql_query("SET OPTION SQL_BIG_SELECTS=1"); 
    		$sqlsel = "SELECT rest.restaurant_id, rest.restaurant_name, rest.restaurant_seourl, rest.restaurant_phone, rest.restaurant_logo, rest.restaurant_website, rest.restaurant_fax, rest.restaurant_streetaddress, rest.restaurant_zip, rest.restaurant_contact_name, rest.restaurant_contact_phone, rest.restaurant_contact_email, rest.restaurant_description, rest.restaurant_estimated_time, rest.restaurant_delivery, rest.restaurant_pickup, rest.restaurant_delivery_charge, rest.restaurant_salestax, rest.restaurant_minorder_price, rest.restaurant_serving_cuisines, rest.restaurant_feature_status, rest.restaurant_set_status, restaurant_booktable, ".$openClose.
    						  " cty.cityname, "."zip.zipcode, zip.areaname, "."state.statename, ".
    						  " ROUND( ( ( SUM(rvw.rating) / (COUNT(rvw.rating_id)*5) )*100 ) ,1) AS total_rating ".
    						  "	FROM ".$CFG['table']['restaurant']." AS rest ".
    						  " LEFT JOIN ".$CFG['table']['city']." AS cty ON rest.restaurant_city = cty.city_id ".
    						  " LEFT JOIN ".$CFG['table']['state']." AS state ON rest.restaurant_state = state.statecode ".
    						  " LEFT JOIN ".$CFG['table']['restaurant_menu']." AS menu ON '0' = menu.restaurant_id ".
    						  //" LEFT JOIN ".$CFG['table']['restaurant_menu']." AS menu ON rest.restaurant_id = menu.restaurant_id ".
    						  " LEFT JOIN ".$CFG['table']['restaurant_offer']." AS offer ON rest.restaurant_id = offer.restaurant_id ".
    						  " LEFT JOIN ".$CFG['table']['restaurant_serving_cuisines']." AS cui ON rest.restaurant_id = cui.restaurant_id ".
    						  " LEFT JOIN ".$CFG['table']['cuisine']." AS cuisine ON cuisine.cuisine_id = cui.cuisine_id ".
    						  " LEFT JOIN ".$CFG['table']['restaurant_delivery_areas']." AS area ON rest.restaurant_id = area.restaurant_id ".
    						  " LEFT JOIN ".$CFG['table']['zipcode']." AS zip ON (area.zipcode_id = zip.zipcode_id OR rest.restaurant_zip = zip.zipcode_id) ".
    						  " LEFT JOIN ".$CFG['table']['restaurant_reviews']." AS rvw ON rest.restaurant_id = rvw.restaurant_id AND rvw.restaurant_id != ''".
                              " LEFT JOIN ".$CFG['table']['restaurant_timing']." AS tim ON (rest.restaurant_id = tim.restaurant_id)".
    						  "	WHERE rest.restaurant_status = '1' AND rest.delete_status = 'No' ".$condition." GROUP BY rest.restaurant_id ".$sort." ";
    		//echo $sqlsel;
    		$sqlres = $objSite->ExecuteQuery($sqlsel,'select');
    		
    		if( !empty($sqlres['0']['restaurant_logo']) && file_exists($CFG['site']['photo_restaurant_path'].'/logo/'.$sqlres['0']['restaurant_logo']) ){
    			$sqlres['0']['restaurant_logo'] = $CFG['site']['photo_restaurant_url'].'/logo/'.$sqlres['0']['restaurant_logo'];
    		}else{
    			$sqlres['0']['restaurant_logo'] = $CFG['site']['theme_image_url'].'/no-image.jpg';
    		}
    		if(!empty($sqlres['0']['restaurant_serving_cuisines'])){
    			$sqlres['0']['restaurant_serving_cuisines'] = $objSite->getArrayCuisines($sqlres['0']['restaurant_serving_cuisines']);
    		}
            
             #Offer
            $sel_off = "SELECT offer_id, offer_percentage, offer_price, offer_valid_from, offer_valid_to, status FROM " .
                $CFG['table']['restaurant_offer'] . " WHERE status ='1' AND restaurant_id = '" .
                $sqlres['0']['restaurant_id']  . "' ORDER BY offer_id DESC LIMIT 1 ";
            $res_off = $objSite->ExecuteQuery($sel_off, "select"); 
            
            if (count($res_off) > 0)
            {
                $today = strtotime(date("Y-m-d"));
                if ((strtotime($res_off['0']['offer_valid_from'])) <= $today && (strtotime($res_off['0']['offer_valid_to']) >= $today))
                {
                    $sqlres[0]['offer_percentage'] = $res_off['0']['offer_percentage'];
                    $sqlres[0]['offer_price']      = $res_off['0']['offer_price'];
                }
                else {
                   $sqlres[0]['offer_percentage'] = '';
                   $sqlres[0]['offer_price']  = '';
                }
            } else {
               $sqlres[0]['offer_percentage'] = '';
               $sqlres[0]['offer_price']  = '';
            }
            
            #------------------------------ Voucher ----------------------------------------
            $today = date("Y-m-d");
            //$today =  strtotime($day);
            $sel_slice_add = "SELECT piz.id, piz.voucher_name, piz.use_type, piz.off_type, piz.off_price_percentage, piz.valid_from, piz.valid_to,piz.status,cat.restaurant_id FROM " .
                $CFG['table']['voucher'] . " as piz" . " LEFT JOIN " . $CFG['table']['restaurant_voucher'] .
                " as cat ON piz.id = cat.voucher_id" . " WHERE piz.status = '1' AND cat.restaurant_id = '".$_REQUEST['resid']."' AND  piz.valid_from <= '" . $today . "' AND  piz.valid_to >= '" . $today . "'  ";
            $sqlres[0]['voucher'] = $objSite->ExecuteQuery($sel_slice_add, "select");
            //$sqlres[0]['voucher'] = $res_voucher;
            #echo"<pre>";print_r($sqlres[0]['voucher']);echo"</pre>";
            
            #Restaurant Open And Close Status
            $restaurantSetStatus = $sqlres['0']['restaurant_set_status'];
                    
            $firstStatus = '';
            $secondStatus= '';
            if ($restaurantSetStatus == 'TT') {
                $firstStatus = $objSite->openandcloseRecursion($sqlres['0']['firstOpen'], $sqlres['0']['firstClose'],'','');
                $secondStatus= $objSite->openandcloseRecursion($sqlres['0']['secondOpen'], $sqlres['0']['secondClose'],'','');
                $sqlres['0']['status'] = ($firstStatus == 'Open' || $secondStatus == 'Open') ? 'Open' : 'Close';
            } else {
                $sqlres['0']['status'] = $restaurantSetStatus;
            }
            
            #address
    		if( !empty($sqlres['0']['cityname']) || !empty($sqlres['0']['restaurant_zip']) ){
    			
    			$sqlres['0']['resareaname'] = $objSite->getValue("areaname",$CFG['table']['zipcode'],"zipcode_id = '".$sqlres['0']['restaurant_zip']."'");
                $sqlres['0']['reszipcode']  = ($sqlres['0']['restaurant_zip'] != 0) ? $sqlres['0']['restaurant_zip'] : '';
    			$sqlres['0']['res_full_address'] = $objSite->findFullAddress($sqlres['0']['restaurant_streetaddress'], $sqlres['0']['resareaname'], $sqlres['0']['cityname'], $sqlres['0']['reszipcode']);
    		}
            
            $Payment = $objSite->getValue("paymentmethod", $CFG['table']['restaurant_choose_paymentoption'], " paymentoption = '2' AND restaurant_id = '".$restaurantid."'");
            
            if($Payment != '') {
                $sqlres['0']['payment'] = 'Yes';
            } else {
                $sqlres['0']['payment'] = 'No';
            }
            
            #Select Category
            /*
            $sel_cat = 	" SELECT cat.maincateid, cat.maincatename AS catname ".
    					" FROM ".$CFG['table']['restaurant_menu']." AS menu ".
    					" LEFT JOIN ".$CFG['table']['category_main']." AS cat ON cat.maincateid = menu.menu_category ".
    					" WHERE menu.restaurant_id = '".$restaurantid."' AND menu.status = '1' AND cat.status = '1' GROUP BY menu.menu_category ORDER BY menu.menu_category ASC";
    		*/
    		//Categoria Unica
    		$sel_cat = 	" SELECT cat.maincateid, cat.maincatename AS catname ".
    					" FROM ".$CFG['table']['restaurant_menu']." AS menu ".
    					" LEFT JOIN ".$CFG['table']['category_main']." AS cat ON cat.maincateid = menu.menu_category ".
    					" WHERE menu.restaurant_id = '0' AND menu.status = '1' AND cat.status = '1' GROUP BY menu.menu_category ORDER BY menu.menu_category ASC";
    		
    		
    		
    		$res_cat =  $objSite->ExecuteQuery($sel_cat,'select');
            $sqlres[0]['category'] = $res_cat;
            
            if(isset($res_cat) && !empty($res_cat)){
                foreach($res_cat as $key=>$value){
                    #Select Menu
                    //$menu_list  = $objSite->getMultiValue("id , menu_name, menu_type, menu_price",$CFG['table']['restaurant_menu'],"restaurant_id = '".$restaurantid."' AND menu_category = '".$res_cat[$key]['maincateid']."' AND status = '1'");
                    $menu_list  = $objSite->getMultiValue("id , menu_name, menu_type, menu_price",$CFG['table']['restaurant_menu'],"restaurant_id = '0' AND menu_category = '".$res_cat[$key]['maincateid']."' AND status = '1'");
                    
                    $sqlres[0]['category'][$key]['menu']    = $menu_list;
                    
                }
                $response['status']             = 1;
                $response['restaurantdetails']  = $sqlres;
            }else{
                $response['status']             = 0;
                //$response['restaurantdetails']  = $sqlres;
                $response['message']            = 'Menu is not found';
            }
        }
        echo json_encode($response, true);
        break;
        
    #Add Menu to the cart
    case ('restaurantAddons'):
        $menuid = trim($_REQUEST['menuid']);
        if($menuid != '') {
            #Menu Details
            
            $menu_det   = $objSite->menuDetails($menuid);
            #Get Slice Menu
            //$menu_det[0]['restaurant_id'] = '0';
            $menu_det[0]['Slice']   = $objSite->getMultiValue("pizza_slice_id,pizza_slice_name,pizza_slice_price",$CFG['table']['restaurant_pizza_slice'],"pizza_slice_restaurantid = '".$menu_det[0]['restaurant_id']."' AND pizza_slice_categoryid = '".$menu_det[0]['menu_category']."' AND pizza_slice_menuid = '".$menu_det[0]['id']."'");
            #Menu Addons Details
            $menu_addon = $objSite->menuAddonsList($menu_det[0]['id'],$menu_det[0]['menu_category'],$menu_det[0]['restaurant_id'],$menu_det[0]['category_option']);
            
            if(isset($menu_addon) && !empty($menu_addon) && is_array($menu_addon)){
                foreach($menu_addon as $key=>$value){
                    #Menu Sub Addons
                    $menu_addon[$key]['SubAddon']    = $objSite->menuSubAddonsList($menu_addon[$key]['addonparentid'],$menu_addon[$key]['menuaddons_menuid'],$menu_addon[$key]['menuaddons_categoryid'],$menu_addon[$key]['menuaddons_addonsname'],$menu_addon[$key]['menu_catoption'],$menu_addon[$key]['menuaddons_restaurantid']);
                }
            }
            #Combine Main addon and sub addon with menu
            $response['status']       = 1;
            $menu_det[0]['MainAddon'] = $menu_addon;
            $response['Menu']         = $menu_det;
        } else {
            $response['status']    = 0;
            $response['message']    = 'Required fields are missing';
        }
        echo json_encode($response, true);
        break;
        
    #Slice Addon Price   
    case ('sliceAddonPrice'):
        $menuid      = $_REQUEST['menu_id'];
        $mainaddonid = $_REQUEST['main_addon_id'];
        $resid      = $_REQUEST['resid'];
        if($menuid != '' && $mainaddonid != '' && $resid != '') {
            $addons_price = $objSite->getSliceAddonPrice();
            if($addons_price){
                $response['status']     = 1;
                $response['addons']     = $addons_price;
            }else{
                $response['status']     = 0;
                $response['message']    = 'Subaddons not available';
            }
        } else {
            $response['status']     = 0;
            $response['message']    = 'Required fields are missing';
        }
        echo json_encode($response, true);
        break;
        
    #Size Addon Price   
    case ('sizeAddonPrice'):
        $menuid      = $_REQUEST['menu_id'];
        $mainaddonid = $_REQUEST['main_addon_id'];
        $resid      = $_REQUEST['resid'];
        if($menuid != '' && $mainaddonid != '' && $resid != '') {
            $addons_price = $objSite->getSizeAddonPrice();
            if($addons_price){
                $response['status']     = 1;
                $response['addons']     = $addons_price;
            }else{
                $response['status']     = 0;
                $response['message']    = 'Subaddons not available';
            }
        } else {
            $response['status']     = 0;
            $response['message']    = 'Required fields are missing';
        }
        echo json_encode($response, true);
        break;
        
    #Fixed Addon Price   
    case ('fixedAddonPrice'):
        $menuid      = $_REQUEST['menu_id'];
        $mainaddonid = $_REQUEST['main_addon_id'];
        $resid      = $_REQUEST['resid'];
        if($menuid != '' && $mainaddonid != '' && $resid != '') {
            $addons_price = $objSite->getFixedAddonPrice();
            if($addons_price){
                $response['status']     = 1;
                $response['addons']     = $addons_price;
            }else{
                $response['status']     = 0;
                $response['message']    = 'Subaddons not available';
            }
        } else {
            $response['status']     = 0;
            $response['message']    = 'Required fields are missing';
        }
        echo json_encode($response, true);
        break;
        
    #Checkout Delivery Time
    case ('restaurantDeliveryTime'):
        $resid  = trim($_REQUEST['resid']);
        if($resid != '') {
            $_POST['date'] = $_REQUEST['date'];
            $day    = trim($_REQUEST['date']);
            
            $list = $objSite->checkdatePickerDate($resid);
            if(isset($list) && !empty($list)){
                $response['status']     = 1;
                $response['res_opening_time']    = implode(',',$list);
            }else{
                $response['status']     = 0;
                $response['message']    = 'Time not available!';
            }
        } else {
            $response['status']    = 0;
            $response['message']    = 'Required fields are missing';
        }
        echo json_encode($response, true);
        break;
        
    #Order Register
    case ('orderRegister'):
        $payment = $_POST['paymentinfo'];
        if($payment != '') {
            if(!empty($_REQUEST['resid']) && isset($_REQUEST['cartdetails']) && !empty($_REQUEST['cartdetails'])){
                #Add Cart Details To Cart Table
                $cart    = $objSite->AddToCart();
                #Order Register
                $orderid = $objSite->restaurantOrder();
                if($orderid == 'Already'){
                    $response['status']     = 0;
                    $response['message']    = 'Order already exist..!';
                }else{
                    $response['status']     = 1;
                    $response['order_id']   = $orderid;
                    $response['message']    = 'Your order palced successfully';
                }
            }
        } else {
            $response['status']     = 0;
            $response['message']    = 'Required fields are missing';
        }
        echo json_encode($response, true);
        break;
        
    case ('bookaTable') :
        $num_guests         = $objSite->My_addslashes($_REQUEST['num_guests']);
        $booking_date       = $objSite->My_addslashes($_REQUEST['booking_date']);
        $booking_session    = $objSite->My_addslashes($_REQUEST['booking_time']);
        $booking_name       = $objSite->My_addslashes($_REQUEST['booking_name']);
        $booking_email      = $objSite->My_addslashes($_REQUEST['booking_email']);
        $booking_mobileno   = $objSite->My_addslashes($_REQUEST['booking_mobileno']);
        $booking_instruction = $objSite->My_addslashes($_REQUEST['booking_instruction']);
        $day    = date("D", strtotime($booking_date));
        $resid  = $_REQUEST['resid'];
        $timing = explode('-',$_REQUEST['booking_time']);
        $booking_time = $timing[1];
        $res_open_close = $objSite->getMultiValue("mon_firstopen_time, 	mon_firstclose_time, 	tue_firstopen_time, 	tue_firstclose_time, 	wed_firstopen_time, 	wed_firstclose_time, 	thu_firstopen_time, 	thu_firstclose_time, 	fri_firstopen_time, 	fri_firstclose_time, 	sat_firstopen_time, 	sat_firstclose_time, 	sun_firstopen_time, 	sun_firstclose_time, 	mon_secondopen_time, 	mon_secondclose_time, 	tue_secondopen_time, 	tue_secondclose_time,	wed_secondopen_time, 	wed_secondclose_time, 	thu_secondopen_time, 	thu_secondclose_time, 	fri_secondopen_time, 	fri_secondclose_time, 	sat_secondopen_time, 	sat_secondclose_time, 	sun_secondopen_time, 	sun_secondclose_time",
            $CFG['table']['restaurant_timing'], "restaurant_id = '" . $resid ."'");
        switch($day) {
            case ('Mon') :
                $booking_status = $objSite->openandcloseBookingTable($res_open_close[0]['mon_firstopen_time'],
                    $res_open_close[0]['mon_firstclose_time'], $res_open_close[0]['mon_secondopen_time'],
                    $res_open_close[0]['mon_secondclose_time'], $booking_time);
                break;
            case ('Tue') :
                $booking_status = $objSite->openandcloseBookingTable($res_open_close[0]['tue_firstopen_time'],
                    $res_open_close[0]['tue_firstclose_time'], $res_open_close[0]['tue_secondopen_time'],
                    $res_open_close[0]['tue_secondclose_time'], $booking_time);
                break;
            case ('Wed') :
                $booking_status = $objSite->openandcloseBookingTable($res_open_close[0]['wed_firstopen_time'],
                    $res_open_close[0]['wed_firstclose_time'], $res_open_close[0]['wed_secondopen_time'],
                    $res_open_close[0]['wed_secondclose_time'], $booking_time);
                break;
            case ('Thu') :
                $booking_status = $objSite->openandcloseBookingTable($res_open_close[0]['thu_firstopen_time'],
                    $res_open_close[0]['thu_firstclose_time'], $res_open_close[0]['thu_secondopen_time'],
                    $res_open_close[0]['thu_secondclose_time'], $booking_time);
                break;
            case ('Fri') :
                $booking_status = $objSite->openandcloseBookingTable($res_open_close[0]['fri_firstopen_time'],
                    $res_open_close[0]['fri_firstclose_time'], $res_open_close[0]['fri_secondopen_time'],
                    $res_open_close[0]['fri_secondclose_time'], $booking_time);
                break;
            case ('Sat') :
                $booking_status = $objSite->openandcloseBookingTable($res_open_close[0]['sat_firstopen_time'],
                    $res_open_close[0]['sat_firstclose_time'], $res_open_close[0]['sat_secondopen_time'],
                    $res_open_close[0]['sat_secondclose_time'], $booking_time);
                break;
            case ('Sun') :
                $booking_status = $objSite->openandcloseBookingTable($res_open_close[0]['sun_firstopen_time'],
                    $res_open_close[0]['sun_firstclose_time'], $res_open_close[0]['sun_secondopen_time'],
                    $res_open_close[0]['sun_secondclose_time'], $booking_time);
                break;
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
        switch($booking_status) {
            case ('Open') :
    
                $Query = "INSERT INTO " . $CFG['table']['restaurant_booking'] . " SET 
    								restaurant_id	=	'" . $resid . "',
    								num_guests		=	'" . $num_guests . "',
    								booking_date	=	'" . $booking_date . "',
    								booking_time	=	'" . $booking_time . "',
    								booking_name	=	'" . $booking_name . "',
    								booking_email	=	'" . $booking_email . "',
    								booking_mobileno=	'" . $booking_mobileno . "',
    								booking_phoneno	=	'" . $booking_phoneno . "',
    								booking_instruction = '" . $booking_instruction . "',
    								addeddate		=	'" . CUR_TIME . "'";
                $Res = $objSite->ExecuteQuery($Query, 'insert');
                
                if (!empty($Res) && ($Res > 0))
                {
                    #Customer Id Generation
                    $ordergenid = $objSite->generateId($Res);
                    $finalorderid = "BT" . $ordergenid;
                    $objSite->getUpdate($CFG['table']['restaurant_booking'], "bookinggenerateid='" . $finalorderid ."'", "id='" . $Res . "'");
    
                }                
                
                #----------------------------------------------------Mail to Restaurant Owner and Admin----------------------------------
                $mail1 = explode('@', $booking_email);
                $mail2 = str_split($mail1[0]);
                for ($i = 0; $i < count($mail2) - 1; $i++)
                {
                    $mail3 .= '*';
                }
                $mail4 = $mail2[0] . $mail3 . '@' . $mail1[1];
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
    
                    #Mail To Restaurant Owner
                    $rest_mail = $objSite->getMultiValue("restaurant_name,restaurant_phone,restaurant_logo,restaurant_streetaddress,restaurant_city,restaurant_state,restaurant_zip,restaurant_contact_phone,restaurant_contact_email",
                        $CFG['table']['restaurant'], "restaurant_id	=	'" . $_REQUEST['rest_id'] . "'");
    
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
                    $mail_content = $objSite->readfilecontent($CFG['site']['email_path'] ."/bookTableMail.tpl");
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
    
                    $ok = $objSite->sendMail($CFG['site']['sitename'], $from_mail, $tomail, $mailsubject,
                        $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');
                    
                    if ($ok)
                    {
    
                        $resname = '	<tr>
    											<td align="left" colspan="3" style="padding-top:20px;"><b>Restaurant Name : </b> ' .
                            stripslashes($rest_mail[0]['restaurant_name']) . '</td>
    										</tr>';
    
                        $from_mail = $rest_mail[0]['restaurant_contact_email'];
                        $tomail = $CFG['site']['supportemail'];
                        $mailsubject = $CFG['site']['sitename'] . ": Requesting for booking a table";
                        $mail_content = $objSite->readfilecontent($CFG['site']['email_path'] .
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
    
                        $done = $objSite->sendMail($CFG['site']['sitename'], $from_mail, $tomail, $mailsubject,
                            $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');
                        
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
                            $mail_content = $objSite->readfilecontent($CFG['site']['email_path'] .
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
    
                            $done = $objSite->sendMail($CFG['site']['sitename'], $from_mail, $tomail, $mailsubject,
                                $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');
                        }
                    }
                }
                $response['status']     = 1;
                $response['message']    = 'Table booking success';
                break;
                
            case ('Closed') :
                $response['status']     = 0;
                $response['message']    = 'Restaurant is closed';
                break;
                
            case ('Time Exceeded') :
                $response['status']     = 0;
                $response['message']    = 'Restaurant is exceeded';
                break;
        }
        echo json_encode($response, true);
        break;
    
            
    default:
        $response['status']     = 0;
        $response['message']    = 'Required fields are missing';
        echo json_encode($response, true);
        break;
    case ('checkout_customer'):
        $cusid      = trim($_REQUEST['cusid']);
        if($cusid != '') {
            #Select Customer Details
            $sel_detail = "SELECT customer_name, customer_lastname, customer_email, customer_phone, customer_crossstreet, customer_buildtype   FROM ".$CFG['table']['customer']." WHERE customer_id = '".$cusid."' LIMIT 1";
    		$res_detail = $objSite->ExecuteQuery($sel_detail,'select');
            #Customer Address List
            $res_detail[0]['Address']   = $objSite->getMultiValue("id, customer_address_title",$CFG['table']['customer_addressbook'],"customer_id = '".$cusid."' ORDER BY id DESC");
            if(is_array($res_detail[0]['Address']) && !empty($res_detail[0]['Address'])){
                foreach($res_detail[0]['Address'] as $key=>$value){
                    $sel_address    = "SELECT ad.customer_id, ad.customer_apartment_name, ad.customer_landmark, ad.customer_street, ad.customer_zip, st.statename, ct.cityname
                                        FROM    ".$CFG['table']['customer_addressbook']." AS ad".
                                        " LEFT JOIN ".$CFG['table']['state']." AS st ON st.statecode = ad.customer_state AND st.state_status = '1' ".
                                        " LEFT JOIN ".$CFG['table']['city']." AS ct ON ct.city_id = ad.customer_city".
                                        //" LEFT JOIN ".$CFG['table']['zipcode']." AS zip ON zip.zipcode_id = ad.customer_area".
                                        " WHERE ad.id = '".$res_detail[0]['Address'][$key]['id']."'  ";
                    $res_detail[0]['Address'][$key]['customer_address'] = $objSite->ExecuteQuery($sel_address,'select');
                }
            }
            
            $response['status']    = '1';
            $response['Customer']   = $res_detail; 
            echo json_encode($response,true);
        } else {
            $response['status']    = '0';
            $response['message']    = 'Required fields are missing';
            echo json_encode($response);
        }
        break;
 }
 
 




    
//----------------------------------------------------------------
?>