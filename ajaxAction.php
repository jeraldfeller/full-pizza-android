<?php
	include("includes/config.inc.php");
    //header('Content-Type: text/html; charset=iso-8859-1'); 
	#Language
	$objSite->languageSession();
	#echo"<pre>";print_r($_POST);echo"</pre>";exit;
    $postAction = $_POST['action'];
    $getAction  = $_GET['action'];
    
    if ($postAction != '') {
        //echo "Hai";
        $action	 = $postAction;
		$objSmarty->assign('action',$action);
        
        switch ($postAction) {
            
            case 'viewRestaurantNamewise':
                
                $objCommon	= new Common;
	           	$objCommon->browseByAllRestaurant();
                break;
                
            case 'Datepickerdatebook':
                
                $objSite	= new Site;
	           	$objSite->checkbookingdatePickerDate('');
                break; 
                
            case 'check_printer_response':
                
                $sel_order = " SELECT printer_response, printer_res_deli_time, printer_ack, printer_ack_msg 
                               FROM ".$CFG['table']['order']." 
                               WHERE orderid = '".base64_decode($objSite->filterInput($_POST['orderid']))."' ";
                $res_order = $objSite->ExecuteQuery($sel_order,'select');
                $objSmarty->assign('res_order',$res_order);	
                break;
                
            case 'verification':
                
                $ResultStr = $objSite->captchaCode();
                $objSmarty->assign("rndnumber", $ResultStr);	
                break;
                
            case 'Datepickerdate':
                
                //In checkout page taking date with time
                $objSite->checkdatePickerDate('');
                break;
                
            case 'CategoryMenu':
                
                #Category Wise Menu list
                $objSearchDetails	= new SearchDetails;
        		$objSearchDetails->CategoryList_individual($_POST['catid']);
        		$objSmarty->assign("objSearchDetails", $objSearchDetails);
                break;
                
            case 'CategoryMenuleft':
                
                #Category Wise Menu list
                $objSearchDetails	= new SearchDetails;
        		$objSearchDetails->categoryList();
        		$objSmarty->assign("objSearchDetails", $objSearchDetails);
                break;
                
            case 'searchMenuItems':
                
                #Category Wise Menu list
                $objSearchDetails	= new SearchDetails;
        		$objSearchDetails->selectedMenuList();
        		$objSmarty->assign("objSearchDetails", $objSearchDetails);
                break;
                
            case 'reviewOrganize':
                
                #Category Wise Menu list
                $objSearchDetails	= new SearchDetails;
        		$objSearchDetails->restaurantReviewDetails();
        		$objSmarty->assign('objSearchDetails',$objSearchDetails);
                break;
                
            case 'customerFavStatus':
                
                $objCustomer	= new Customer;
        		$objCustomer->favoriteDelete();
        		$objCustomer->customerMyFavoritesList();
        		$objSmarty->assign('objCustomer',$objCustomer);
                break;
                
            case 'EditAddress':
                
                $objCustomer = new Customer;
        		$objCustomer->addressBookList();
        		$objSite->showStateList();
        		$city	= $objSite->getValue("customer_state",$CFG['table']['customer_addressbook'],"id='".$objSite->filterInput($_REQUEST['addressID'])."'");
        		$zip	= $objSite->getValue("customer_city",$CFG['table']['customer_addressbook'],"id='".$objSite->filterInput($_REQUEST['addressID'])."'");
        		$objSite->showcityList($city);
            	$objSite->showzipList($zip);
        		$objSmarty->assign('objCustomer',$objCustomer);
                break;
                
            case 'AddNewAddress':
                
                $objCustomer	= new Customer;
        		$objCustomer->AddNewAddress();
                $objCustomer->addressBookList();
        		$objSmarty->assign('objCustomer',$objCustomer);
                break;
                
            case 'customerUpdatePrimary':
                
                $objCustomer = new Customer;
        		$objCustomer->customerUpdatePrimaryAddress();
                $objCustomer->addressBookList();
        		$objSmarty->assign('objCustomer',$objCustomer);
                break;   
                
           case 'GetAddress':
                
                $objCustomer = new Customer;
        		$objSearchDetails	= new SearchDetails;
        		$objCustomer->getParticularAddress();
        		$objSearchDetails->customerDetails($_SESSION['customerid']);
        		$objSite->showStateList();
                $objSite->showcityList($customerDetails[0]['customer_state']);
        	    $objSite->showzipList($customerDetails[0]['customer_city']);
        		$objSmarty->assign('objCustomer',$objCustomer);
                break; 
                
            case 'OrderFilter':
                
                $objCustomer	= new Customer;
                $objSmarty->assign('sortbystatus',$_REQUEST['sortbystatus']);
		        $objSmarty->assign('objCustomer',$objCustomer);
                break;   
                
             case 'applyVoucher':
                
                $objSearchDetails	= new SearchDetails;
        		$objSearchDetails->menuCartList();
                $objSmarty->assign('action','checkoutDeliveryCharge');
                $objSite->checkAnyVoucher($_REQUEST['resid']);
                $restaurantdet = $objSite->getMultivalue("restaurant_name,restaurant_seourl,restaurant_streetaddress,restaurant_city,restaurant_zip",$CFG['table']['restaurant'],"restaurant_id = '".$objSite->filterInput($_POST['resid'])."'");
                $restaurant_city  = $objSite->getValue("cityname",$CFG['table']['city'],"city_id = '".$objSite->filterInput($restaurantdet['0']['restaurant_city'])."' ");
                
                $rest_addr = $restaurantdet[0]['restaurant_streetaddress'].','.$restaurant_city.'-'.$restaurantdet[0]['restaurant_zip'];
                $rest_address = strlen($rest_addr) > 40 ? substr($rest_addr,0,40)."..." : $rest_addr;

                $objSmarty->assign("restaurantname", $restaurantdet[0]['restaurant_name']);
                $objSmarty->assign("restaurantseourl", $restaurantdet[0]['restaurant_seourl']);	
                $objSmarty->assign("restaurant_streetaddress", $rest_address);
                
                break; 
                
            case 'destryVoucher':
                
                unset($_SESSION['voucher_id']);
                unset($_SESSION['voucher']);
                unset($_SESSION['voucherPrice']);
                
                $objSearchDetails	= new SearchDetails;        
        		$objSearchDetails->menuCartList();
                $objSmarty->assign('action','checkoutDeliveryCharge');
                $objSite->checkAnyVoucher($_REQUEST['resid']);
                $restaurantdet = $objSite->getMultivalue("restaurant_name,restaurant_seourl,restaurant_streetaddress,restaurant_city,restaurant_zip",$CFG['table']['restaurant'],"restaurant_id = '".$objSite->filterInput($_POST['resid'])."'");
                $restaurant_city  = $objSite->getValue("cityname",$CFG['table']['city'],"city_id = '".$objSite->filterInput($restaurantdet['0']['restaurant_city'])."' ");
                
                $rest_addr = $restaurantdet[0]['restaurant_streetaddress'].','.$restaurant_city.'-'.$restaurantdet[0]['restaurant_zip'];
                $rest_address = strlen($rest_addr) > 40 ? substr($rest_addr,0,40)."..." : $rest_addr;

                $objSmarty->assign("restaurantname", $restaurantdet[0]['restaurant_name']);
                $objSmarty->assign("restaurantseourl", $restaurantdet[0]['restaurant_seourl']);	
                $objSmarty->assign("restaurant_streetaddress", $rest_address);
                break;   
                
             case 'yelpreviewsdisplay':
                
                $objSite->yelpRestuarantReviews($_REQUEST['resid']);
                break; 
                     
            case 'showPizzaPriceSize_new':
            
                    $objSearchDetails	= new SearchDetails;
            		$order_list = $objSearchDetails->menuDetails($_REQUEST['menuid']);
                    $sel_menu_det = "SELECT id, restaurant_id, menu_name, menu_category, menu_type, menu_price, menu_addons, menu_description, sizeoption, menu_spl_instruction, pizza_size_small, pizza_small_value, pizza_size_medium, pizza_medium_value, pizza_size_large, pizza_large_value FROM " .
                        $CFG['table']['restaurant_menu'] . " WHERE id = '" . $objSite->filterInput($_REQUEST['menuid']) .
                    "' AND status = '1' ";
                
                    $res_menu_det = $objSite->ExecuteQuery($sel_menu_det, "select");
                       $res_menu_det[0]['restaurant_seourl'] = $objSite->getValue("restaurant_seourl", $CFG['table']['restaurant'], "restaurant_id = '" . $objSite->filterInput($res_menu_det[0]['restaurant_id']) . "'");

                    $getcategoryname = $objSite->getValue("maincatename", $CFG['table']['category_main'],
                        "maincateid = '" . $objSite->filterInput($res_menu_det[0]['menu_category']) . "'");
                    $getcategory_option = $objSite->getValue("maincat_option", $CFG['table']['category_main'],"maincateid = '" . $objSite->filterInput($res_menu_det[0]['menu_category']) . "'");
                     
                    //$objSearchDetails->pizzzaSizeList($res_menu_det['0']['menu_category'],"pizza",$_REQUEST['menuid']);
                    $objSmarty->assign("objSearchDetails", $objSearchDetails);
                    $objSmarty->assign("objSite",$objSite);	
                    	
                    break;  

                case 'cartTotal':
                
                    
                    $objSearchDetails   = new SearchDetails;
                    $objSearchDetails->menuCartList();

                    //$objSearchDetails->getMenuCount();
               
                    break; 

                case 'orderPopup':
                    
                   $objSearchDetails = new SearchDetails;
                    $orderlist = $objSearchDetails->menuDetails($_REQUEST['menuid']);
                    $sel_menu_det = "SELECT id, restaurant_id, menu_name, menu_category, menu_type, menu_price, menu_addons, menu_description, sizeoption, menu_spl_instruction, pizza_size_small, pizza_small_value, pizza_size_medium, pizza_medium_value, pizza_size_large, pizza_large_value FROM " .
                    $CFG['table']['restaurant_menu'] . " WHERE id = '" . $objSite->filterInput($_REQUEST['menuid']) .
                    "' AND status = '1' ";
                
                    $res_menu_det = $objSite->ExecuteQuery($sel_menu_det, "select");
                       $res_menu_det[0]['restaurant_seourl'] = $objSite->getValue("restaurant_seourl", $CFG['table']['restaurant'], "restaurant_id = '" . $objSite->filterInput($res_menu_det[0]['restaurant_id']) . "'");

                    $getcategoryname = $objSite->getValue("maincatename", $CFG['table']['category_main'],
                        "maincateid = '" . $objSite->filterInput($res_menu_det[0]['menu_category']) . "'");
                    $getcategory_option = $objSite->getValue("maincat_option", $CFG['table']['category_main'],
                    "maincateid = '" . $objSite->filterInput($res_menu_det[0]['menu_category']) . "'");
                    $qtylist = $objSite->quantitylist($monopentimehr);
                    //$objSearchDetails->pizzzaSizeList($res_menu_det['0']['menu_category'],$getcategory_option,$_REQUEST['menuid']);
                    $objSmarty->assign('QUANTITY_LIST', $qtylist);
                    $objSmarty->assign("objSearchDetails", $objSearchDetails);
                    $objSmarty->assign("objSite", $objSite);
                    break;


                    
                case 'addtoItem':
                    
                    $objSearchDetails   = new SearchDetails;
                    $objSearchDetails->addToMenuCart();
                    $objSearchDetails->menuCartList();
                    $objSearchDetails->restaurantDetails();
                    $objSmarty->assign('resid',$_REQUEST['resid']);
                    $objSmarty->assign('offer',$_REQUEST['offer']);
                    $objSmarty->assign("action", 'userMenuOrderList');
                    break;

                case 'modifyItem':
                    
                    $objSearchDetails   = new SearchDetails;
                    $objSearchDetails->modifyMenuCart();
                    $objSearchDetails->menuCartList();
                    $objSearchDetails->restaurantDetails();
                    $objSmarty->assign('resid',$_REQUEST['resid']);
                    $objSmarty->assign('offer',$_REQUEST['offer']);
                    $objSmarty->assign("action", 'userMenuOrderList');
                    break;

                case 'deleteItem':
                    
                    $objSearchDetails   = new SearchDetails;
                    $objSearchDetails->deleteMenuCart();
                    $objSearchDetails->menuCartList();
                    $objSearchDetails->restaurantDetails();
                    $objSmarty->assign('resid',$_REQUEST['resid']);
                    $objSmarty->assign('offer',$_REQUEST['offer']);
                    $objSmarty->assign("action", 'userMenuOrderList');
                    break;
                case 'showAllRestaurants':
                    
                    $objSearchResult	= new SearchResult;
                    $objSearchResult->searchResultAllRestaurants();                   
                    break;
                    

        }
    } elseif ($getAction != '') {
        
        $action	 = $getAction;
		$objSmarty->assign('action',$action);
        
            switch ($getAction) {
                
                case 'showCusCityList':
        
                    #Area List From Customer
                    $objSite->showcityList($_GET['statecode']);
            		$objSearchDetails = new SearchDetails;
            		$objSearchDetails->customerDetails($_SESSION['customerid']);
                    break;
                    
                 case 'showCusCityListAdd':
                
                    $objSite->showcityList($_GET['statecode']);
            		$objSearchDetails = new SearchDetails;
            		$objSearchDetails->customerDetails($_SESSION['customerid']);
                    break;
                                    
                 case 'Address_Book':
                
                    $objCustomer	= new Customer;
            		#Change status
            		if( isset($_POST['mid']) && !empty($_POST['mid']) ){
            		  
            			$tablename 			= $CFG['table']['customer_addressbook'];
            			$fieldname_status 	= 'status';
            			$fieldname_updateid = 'id';
                        $objCustomer->addressBookList();
            			$objCustomer->ChangeStatus($tablename,$fieldname_status,$fieldname_updateid);
            			if($_POST['chgeval']=="delete"){ $objSmarty->assign('success_msg','Offer deleted successfully'); }
            			elseif($_POST['chgeval']=='0'){ $objSmarty->assign('success_msg','Offer status deactivate successfully'); }
            			else{ $objSmarty->assign('success_msg','Offer status activate successfully'); }
            		}
                    
                    $objSmarty->assign('objCustomer',$objCustomer);
                    break;
                              
                 
                    
                 case 'showCusAreaList':
                    
                    #Area List From Customer
                    $objSite->showzipList($_GET['cid']);
            		$objSearchDetails = new SearchDetails;
            		$objSearchDetails->customerDetails($_SESSION['customerid']);
                    break;
                    
                case 'showCusAreaListAdd':
                    
                    #Show Zip code list for customer address book add
                    $objSite->showzipList($_GET['cid']);
            		$objSearchDetails = new SearchDetails;
            		$objSearchDetails->customerDetails($_SESSION['customerid']);
                    break;
                    
                case 'showCusCityListcheck':
                    
                    #Area List From delivery
                    $objSite->showcityList($_GET['statecode']);
            		$objSearchDetails = new SearchDetails;
            		$objSearchDetails->customerDetails($_SESSION['customerid']);
                    break;
                    
                case 'showCusCityListcheck':
                    
                    #Area List From delivery
                    $objSite->showcityList($_GET['statecode']);
            		$objSearchDetails = new SearchDetails;
            		$objSearchDetails->customerDetails($_SESSION['customerid']);
                    break;
                    
                case 'showCusZipListcheck':
                    
                    #Area List From delivery
                    $objSite->showzipList($_GET['cid']);
            		$objSearchDetails = new SearchDetails;
            		$objSearchDetails->customerDetails($_SESSION['customerid']);
                    break;
                    
                case 'selectOptionMenuList':
                    
                    #Popular Veg Menu list
                    $objSearchDetails	= new SearchDetails;
            		$objSearchDetails->selectOptionMenuList();
            		$objSmarty->assign("objSearchDetails", $objSearchDetails);
                    break;
                    
                case 'selectOptionMenuListmiddle':
                    
                    $objSearchDetails	= new SearchDetails;
            		$objSearchDetails->selectOptionMenuList();
            		$objSearchDetails->categoryList();
            		$objSmarty->assign("objSearchDetails", $objSearchDetails);
                    break;
                    
                case 'selectOptionMenuListleft':
                    
                    $objSearchDetails	= new SearchDetails;
            		$objSearchDetails->categoryList();
            		$objSmarty->assign("objSearchDetails", $objSearchDetails);
                    break;
                    
                case 'selectOptionMenuListright':
                    
                    $objSearchDetails	= new SearchDetails;
            		$objSearchDetails->restaurantDetails();
            		$objSearchDetails->menuCartList();
            		$objSmarty->assign("objSearchDetails", $objSearchDetails);
                    break;
                    
                case 'selectOptionMenuListright':
                    
                    $objSearchDetails	= new SearchDetails;
            		$objSearchDetails->restaurantDetails();
            		$objSearchDetails->menuCartList();
            		$objSmarty->assign("objSearchDetails", $objSearchDetails);
                    break;
                    
                case 'vegCategoryMenu':
                    
                    $objSearchDetails	= new SearchDetails;
            		$objSearchDetails->vegCategoryList_individual($_POST['catid']);
            		$objSmarty->assign("objSearchDetails", $objSearchDetails);
                    break;
                    
                case 'nonvegCategoryMenu':
                    
                    $objSearchDetails	= new SearchDetails;
            		$objSearchDetails->nonvegCategoryList_individual($_POST['catid']);
            		$objSmarty->assign("objSearchDetails", $objSearchDetails);
                    break;
                    
                                  
                
                case 'offerItem':
                    
                    $objSearchDetails	= new SearchDetails;
                    $objSearchDetails->restaurantDetails();
            		$objSearchDetails->menuCartList($_POST['resid']);
            		$objSmarty->assign('resid',$_REQUEST['resid']);
            		$objSmarty->assign('offer',$_REQUEST['offer']);	
            		$objSmarty->assign("action", 'userMenuOrderList');
                    break;
                    
                case 'orderFullDetails':
                    
                    $objRestaurant	= new Restaurant;
            		$orderfull_list = $objRestaurant->viewOrderFullDetails($_GET['orderid']);
            		$objSmarty->assign("objSearchDetails", $objSearchDetails);
                    break;
                    
                case 'showPizzaPriceSize':
                    
                    #show pizza size price:
                    $objSearchDetails	= new SearchDetails;
            		$order_list = $objSearchDetails->menuDetails($_REQUEST['menuid']);
            		$qtylist = $objSite->quantitylist($monopentimehr);
            		$objSmarty->assign('QUANTITY_LIST', $qtylist);
            		$objSmarty->assign("objSearchDetails",$objSearchDetails);
            		$objSmarty->assign("objSite",$objSite);		
                    break;
                    
                case 'mapInfoUpdate':
                    
                    #Update Map info:
                    $objRestaurant	= new Restaurant;
            		$objRestaurant->mapInfoUpdate();
            		$restaurantdetail_info = $objRestaurant->restDetailsMyacc();
            		$restaurantdetail 	= $objSite->siteRestDetails($_SESSION['restaurantownerid']);
            		$res_straddress 	= $objSite->filterInput($restaurantdetail[0]['restaurant_streetaddress']);
            		$res_area 			= $objSite->filterInput($restaurantdetail[0]['restaurant_zip']);
            		$res_city 			= $objSite->filterInput($restaurantdetail[0]['cityname']);
            		$res_state 			= $objSite->filterInput($restaurantdetail[0]['statename']);
            		$restaurant_address_map = $objSite->findFullAddress($res_straddress, $res_area, $res_city, $res_state);
            		
            		$objSmarty->assign("restaurant_address_map",$restaurant_address_map);
            		$objSmarty->assign("restaurantdetail_info",$restaurantdetail_info);	
                    break;
                    
              case 'showPizzaPriceSize_new':
                
                    $objSearchDetails	= new SearchDetails;
            		$order_list = $objSearchDetails->menuDetails($_REQUEST['menuid']);
                    $sel_menu_det = "SELECT id, restaurant_id, menu_name, menu_category, menu_type, menu_price, menu_addons, menu_description, sizeoption, menu_spl_instruction, pizza_size_small, pizza_small_value, pizza_size_medium, pizza_medium_value, pizza_size_large, pizza_large_value FROM " .
                        $CFG['table']['restaurant_menu'] . " WHERE id = '" . $objSite->filterInput($_REQUEST['menuid']) .
                    "' AND status = '1' ";
                
                    $res_menu_det = $objSite->ExecuteQuery($sel_menu_det, "select");
                       $res_menu_det[0]['restaurant_seourl'] = $objSite->getValue("restaurant_seourl", $CFG['table']['restaurant'], "restaurant_id = '" . $objSite->filterInput($res_menu_det[0]['restaurant_id']) . "'");

                    $getcategoryname = $objSite->getValue("maincatename", $CFG['table']['category_main'],
                        "maincateid = '" . $objSite->filterInput($res_menu_det[0]['menu_category']) . "'");
                    $getcategory_option = $objSite->getValue("maincat_option", $CFG['table']['category_main'],"maincateid = '" . $objSite->filterInput($res_menu_det[0]['menu_category']) . "'");
                     
                    //$objSearchDetails->pizzzaSizeList($res_menu_det['0']['menu_category'],"pizza",$_REQUEST['menuid']);
                    $objSmarty->assign("objSearchDetails", $objSearchDetails);
                    $objSmarty->assign("objSite",$objSite);	
                    	
                    break;  
            }
    }
 
	$objSmarty->display('ajaxAction.tpl');

?>