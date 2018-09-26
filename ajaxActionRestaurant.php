<?php

	include("includes/config.inc.php");
    header('Content-Type: text/html; charset=iso-8859-1'); 
	#Language
	$objSite->languageSession();
    	
		
	
	$postAction = $_POST['action'];
    $getAction  = $_GET['action'];
    
    if ($postAction != '') {
        
        $action	 = $postAction;
		$objSmarty->assign('action',$action);
        
        switch ($postAction) {
            
            case 'Invoice':
                
              	$objRestaurant	= new Restaurant;
                $objResInvoice	= new ResInvoice;
			
			#Change status
			if(isset($_POST['invoiceid']) && !empty($_POST['invoiceid'])){
				
				/*$tablename 			= $CFG['table']['category_main'];
				$fieldname_status 	= 'status';
				$fieldname_updateid = 'maincateid';*/
				
				$objRestaurant->invoiceChangeStatus();
				
				$objSmarty->assign('orderchange','Invoice status changed successfully');
			}
			if($_REQUEST['sortbystatus']){
				
			}
			$objSmarty->assign('sortbystatus',$_REQUEST['sortbystatus']);
			#$objRestaurant->InvoiceList();
            $objResInvoice->inv_deli_order_list();
			$objSmarty->assign('objRestaurant',$objRestaurant);
            $objSmarty->assign('objResInvoice',$objResInvoice);
            break; 
             case 'Orderstatus':
                
                $objRestaurant	= new Restaurant;	
                		
                #Change status
    			if(isset($_POST['orderid']) && !empty($_POST['orderid'])){
    				
    				$objRestaurant->orderChangeStatus();
    				if($_REQUEST['val'] == 'completed'){
    					$status	= 'delevered';
    				}else{
    					$status	= $_REQUEST['val'];
    				}
                    $objRestaurant->ordersList();
    				$objSmarty->assign('orderchange','Order status changed successfully');
    				$objSmarty->assign('succ_msg','Order status changed to '.$status.' successfully');
    			}
    			$objSmarty->assign('sortbystatus',$_REQUEST['sortbystatus']);
    			$objSmarty->assign('objRestaurant',$objRestaurant);
                break;  
            case 'booktable':
                
                $objRestaurant	= new Restaurant;
		        #Change bookingstatus
    			if(isset($_POST['orderid']) && !empty($_POST['orderid'])){
    				
                    $objRestaurant->booktableChangeStatus();
    				if ($_REQUEST['val'] == 'accept') {
    				    $status	= 'accept';
    				} else {
    					$status	= $_REQUEST['val'];   
    				}
                    $objRestaurant->bookingsList();
    				$objSmarty->assign('orderchange','bookingtable status changed successfully');
    				$objSmarty->assign('succ_msg','bookingtable status changed to '.$status.' successfully');
    			}
		        $objSmarty->assign('sortbystatus',$_REQUEST['sortbystatus']);
			    $objSmarty->assign('objRestaurant',$objRestaurant);
                break;    
            case 'restaurantOwnerOrder':
                
                $objRestaurant	= new Restaurant;
    			$objSmarty->assign('sortbystatus',$_REQUEST['sortbystatus']);
    			$objSmarty->assign('objRestaurant',$objRestaurant);
                break;
                
            case 'restaurantOrderChangeStatus':
                
                $objRestaurant	= new Restaurant;
    			$objRestaurant->orderChangeStatus($_SESSION['restaurantownerid']);
    			$objSmarty->assign('orderchange','Order status change successfully');
    			$objSmarty->assign('objRestaurant',$objRestaurant);
                break;
                
            case 'orderFullDetails':
                
                $objRestaurant	= new Restaurant;
    			$orderfull_list = $objRestaurant->viewOrderFullDetails($_POST['orderid']);
    			$objSmarty->assign("objSearchDetails", $objSearchDetails);
                break;

                
            case 'categoryDropListEdit':
                
                $objSite->getShowCategoryList_res($_SESSION['restaurantownerid']);
    			if(!empty($_REQUEST['catval'])){
    				$objSmarty->assign('catval',$_REQUEST['catval']);
    			}
                break;
                
            case 'restaurantInvoiceDetails':
                
                $objResInvoice	= new ResInvoice;
		        $objResInvoice->inv_deli_order_list();
			    $objSmarty->assign('objResInvoice',$objResInvoice);	
                break;    
                
            case 'deleteAddons':
                
                #Delete Addons and subaddons	
    			$objSite->deleteAddons();
    			$sizeopt	=	$objSite->getShowMenuPriceDet_cat($_REQUEST['menuid']);
    			$objSite->getShowPizzaSizeoption($sizeopt['0']['menu_category'],$sizeopt['0']['maincat_option']);
    			#Select Addons list
    			$objSite->getShowAddonsList($_REQUEST['catid'],$_REQUEST['resid']);
                $objSmarty->assign('menuid',$_REQUEST['menuid']);
    			$objSmarty->assign('objSite',$objSite);	
                break;

            case 'resownerEditContactList':
                
                $objRestaurant	= new Restaurant;
				$objRestaurant->restaurantDetailsList();
				$objSmarty->assign('objRestaurant',$objRestaurant);
                break;
                
            case 'resownerEditRestaurantInfoList':
                
                $objRestaurant	= new Restaurant;
				$objRestaurant->restaurantDetailsList();
				$objSmarty->assign('objRestaurant',$objRestaurant);
                break;
                
            case 'resownerEditDeliveryInfoList':
                
                $objRestaurant	= new Restaurant;
				$objRestaurant->restaurantDetailsList();
				$objSmarty->assign('objRestaurant',$objRestaurant);
                break;
                
            case 'restaurantBannerCode':
                
                $objRestaurant	= new Restaurant;
				$objRestaurant->restaurantDetailsList();
				$objSmarty->assign('objRestaurant',$objRestaurant);
                break;
                
             case 'resownerAccountsList':
                
                $objRestaurant	= new Restaurant;
    			$objRestaurant->restaurantDetailsList();
    			$objSmarty->assign('objRestaurant',$objRestaurant);
                break;  
            case 'Reportdate':
                
                $objRestaurant	= new Restaurant;
                
		        $objSmarty->assign('sortbystatus',$_REQUEST['sortbystatus']);
                $objRestaurant->ordersReportList();
                $objSmarty->assign("objRestaurant", $objRestaurant);
			    //$objSmarty->assign('objRestaurant',$objRestaurant);
                break; 
       
             
            
        }
    } elseif ($getAction != '') {
        
        $action	 = $getAction;
		$objSmarty->assign('action',$action);
        
        switch ($getAction) {
       
            case 'resownerEditOpenCloseInfoList':
                
                $objRestaurant	= new Restaurant;
				$objRestaurant->restaurantDetailsList();
				$objSmarty->assign('objRestaurant',$objRestaurant);
                break;
           case 'resownerEditCommissionInfoList':
                
                $objRestaurant	= new Restaurant;
    			$objRestaurant->restaurantDetailsList();
    			$objSmarty->assign('objRestaurant',$objRestaurant);
                break;     
                
            case 'rest_status':
                
                $objSite	= new Site;
				$rest_status = $objSite->open_close_time_rest($_SESSION['restaurantownerid'],CUR_TIME);
                $objSmarty->assign("rest_status", $rest_status[0]);
                break;
            case 'Report':
                
                $objRestaurant	= new Restaurant;
                
		        $objSmarty->assign('sortbystatus',$_REQUEST['sortbystatus']);
                $objRestaurant->ordersReportList();
                $objSmarty->assign("objRestaurant", $objRestaurant);
			    //$objSmarty->assign('objRestaurant',$objRestaurant);
                break;
                
            case 'showResCityList':
                
                $objSite->showcityList($_GET['statecode']);
                break;
                
            case 'showResZipList':
                
                $objSite->showzipList($_GET['cid']);
                break;
                
            case 'dashboardTodayorder':
                
                $objRestaurant	= new Restaurant;
                $objRestaurant->restOrderStatistics('today');
                break;    
            case 'dashboardweekorder':
                
                $objRestaurant	= new Restaurant;
                $objRestaurant->restOrderStatistics('week');
                break;
                
            case 'dashboardMonthorder':
                
                $objRestaurant	= new Restaurant;
                $objRestaurant->restOrderStatistics('month');
                break;
                
            case 'dashboardYearorder':
                
                $objRestaurant	= new Restaurant;
                $objRestaurant->restOrderStatistics('year');
                break;
                
            case 'dashboardAllorder':
                
                $objRestaurant	= new Restaurant;
                $objRestaurant->restDashboardOrderInfo('allorder');
                break;
                
            case 'dashboardPendorder':
                
                $objRestaurant	= new Restaurant;
			    $objRestaurant->restDashboardOrderInfo('pendingorder');
                break;
                
            case 'dashboardProcessorder':
                
                $objRestaurant	= new Restaurant;
                $objRestaurant->restDashboardOrderInfo('processingorder');
                break;
                
            case 'dashboardDeliverorder':
                
                $objRestaurant	= new Restaurant;
			    $objRestaurant->restDashboardOrderInfo('deliveredorder');
                break;
                
            case 'dashboardFailorder':
                
                $objRestaurant	= new Restaurant;
			    $objRestaurant->restDashboardOrderInfo('failedorder');
                break;
                
            case 'dashboardCommissionPrice':
                
                $objRestaurant	= new Restaurant;
			    $objRestaurant->restaurantDashboardCommission();
                break; 
            
            case 'pizzaAddons':
                
                $objRestaurant	= new Restaurant;
    			$objRestaurant->restaurantEditPizzaOption($_GET['menuid']);
    			$objRestaurant->getShowCrustList($_GET['menuid']);
    			$objSite->getShowPizzaAddonsListEdit($_GET['catid'],$_GET['menuid']);
    			$objSmarty->assign('menuid',$_GET['menuid']);
    			$objSmarty->assign('catid',$_GET['catid']);
                break;  
                
            case 'showCatAddonsList':
                
                $sizeopt	=	$objSite->getShowMenuPriceDet_cat($_REQUEST['menu_id']);
    			$objSite->getShowAddonsList($_GET['catid'],$_GET['resid']);
    			$objSmarty->assign('objSite',$objSite);
                break;
                
            case 'menuAddons':
                
    			$sizeopt	=	$objSite->getShowMenuPriceDet($_GET['menuid']);
    			$objSite->getShowPizzaSizeoption($sizeopt['0']['menu_category'],$sizeopt['0']['maincat_option']);
    			$objSite->getShowAddonsList($_GET['catid'],$_SESSION['restaurantownerid']);
    			$objSmarty->assign('menuid',$_GET['menuid']);
    			$objSmarty->assign('objSite',$objSite);
                break;    
                
            case 'menuPriceDetails':
                
    			$sizeopt = $objSite->getShowMenuPriceDet($_GET['menuid']);
    			$objSite->getShowPizzaSizeoption($sizeopt['0']['menu_category'],$sizeopt['0']['maincat_option']);			
    			$objSmarty->assign('menuid',$_GET['menuid']);
    			$objSmarty->assign('objSite',$objSite);
                break;
           
           case 'bookingFullDetails':
                
    			$objRestaurant	= new Restaurant;
    			$orderfull_list = $objRestaurant->viewBookingFullDetails($_GET['id']);
    			$objSmarty->assign("objSearchDetails", $objSearchDetails);
                break;   
           case 'Paymentmethod':
                $objRestaurant	= new Restaurant;
	        
			#Change status
			if( isset($_POST['mid']) && !empty($_POST['mid']) ){
				
				$tablename 	= $CFG['table']['restaurant_choose_paymentoption'];
				
				$objRestaurant->selectpaymentMethod($tablename);
				
				if($_POST['chgeval']=='Yes'){ $objSmarty->assign('succ_msg','Payment method actived successfully'); }
				else{ $objSmarty->assign('succ_msg','Payment method deactived successfully'); }
			}
			
			$objSmarty->assign('sortbystatus',$_REQUEST['sortbystatus']);
			
			$objRestaurant->paymentMethodList();
			$objSmarty->assign('objRestaurant',$objRestaurant);
            break;  
            case 'Order':
                
                $objRestaurant	= new Restaurant;	
                		
                #Change status
    			if(isset($_POST['orderid']) && !empty($_POST['orderid'])){
    				
    				$objRestaurant->orderChangeStatus();
    				if($_REQUEST['val'] == 'completed'){
    					$status	= 'delevered';
    				}else{
    					$status	= $_REQUEST['val'];
    				}
                    
    				$objSmarty->assign('orderchange','Order status changed successfully');
    				$objSmarty->assign('succ_msg','Order status changed to '.$status.' successfully');
    			}
                $objRestaurant->ordersList();
    			$objSmarty->assign('sortbystatus',$_REQUEST['sortbystatus']);
    			$objSmarty->assign('objRestaurant',$objRestaurant);
                break;  
            case 'Bookings':
                	$objRestaurant	= new Restaurant;
			
			#Change status
			if( isset($_POST['mid']) && !empty($_POST['mid']) ){
				
				$tablename 			= $CFG['table']['restaurant_booking'];
				$fieldname_status 	= 'status';
				$fieldname_updateid = 'id';
				
				$objRestaurant->changeStatusResMyaccount($tablename,$fieldname_status,$fieldname_updateid);
				
				if($_POST['chgeval'] == "delete"){ $objSmarty->assign('succ_msg','Bookings deleted successfully'); }
				elseif($_POST['chgeval']=='0'){ $objSmarty->assign('succ_msg','Bookings status deactivated successfully'); }
				else{ $objSmarty->assign('succ_msg','Bookings status activated successfully'); }
			}
			
			$objRestaurant->bookingsList();
			
			$objSmarty->assign('sortbystatus',$_REQUEST['sortbystatus']);
			
			$objSmarty->assign('objRestaurant',$objRestaurant);
            break;
            
            case 'Reviews':
               
            $objRestaurant	= new Restaurant;
			
			if( isset($_POST['mid']) && !empty($_POST['mid']) ){
				
				$tablename 			= $CFG['table']['restaurant_reviews'];
				$fieldname_status 	= 'status';
				$fieldname_updateid = 'rating_id';
				
				$objRestaurant->changeStatusResMyaccount($tablename,$fieldname_status,$fieldname_updateid);
				
				if($_POST['chgeval']=="delete"){ $objSmarty->assign('succ_msg','Review deleted successfully'); }
				elseif($_POST['chgeval']=='0'){ $objSmarty->assign('succ_msg','Review status deactivated successfully'); }
				else{ $objSmarty->assign('succ_msg','Review status activated successfully'); }
			}
			
			$objSmarty->assign('sortbystatus',$_REQUEST['sortbystatus']);
			$objRestaurant->reviewsList();
			$objSmarty->assign('objRestaurant',$objRestaurant);
            break;
            case 'Invoice':
                
              	$objRestaurant	= new Restaurant;
			
			#Change status
			if(isset($_POST['invoiceid']) && !empty($_POST['invoiceid'])){
				
				/*$tablename 			= $CFG['table']['category_main'];
				$fieldname_status 	= 'status';
				$fieldname_updateid = 'maincateid';*/
				
				$objRestaurant->invoiceChangeStatus();
				
				$objSmarty->assign('orderchange','Invoice status changed successfully');
			}
			if($_REQUEST['sortbystatus']){
				
			}
			$objSmarty->assign('sortbystatus',$_REQUEST['sortbystatus']);
			$objRestaurant->InvoiceList();
			$objSmarty->assign('objRestaurant',$objRestaurant);
            break; 
      
            
        }
    }
	
	#--------------------------------------------------------------------------------------------------
    
	#--------------------------------------------------------------------------------------------------
	#Category Tab
	#--------------------------------------------------------------------------------------------------
	/*	if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'Category'){
			$objRestaurant	= new Restaurant;
			
			#Change status
			if( isset($_POST['mid']) && !empty($_POST['mid']) ){
				
				$tablename 			= $CFG['table']['category_main'];
				$fieldname_status 	= 'status';
				$fieldname_updateid = 'maincateid';
				
				$objRestaurant->changeStatusResMyaccount($tablename,$fieldname_status,$fieldname_updateid);
				
				if($_POST['chgeval'] == "delete"){ $objSmarty->assign('succ_msg','Category deleted successfully'); }
				elseif($_POST['chgeval']=='0'){ $objSmarty->assign('succ_msg','Category status deactivated successfully'); }
				else{ $objSmarty->assign('succ_msg','Category status activated successfully'); }
			}
			
			$objSmarty->assign('sortbystatus',$_REQUEST['sortbystatus']);
			
			$objSmarty->assign('objRestaurant',$objRestaurant);
		}
	
		#-----------------------------------------------------
		#Category List Pagination
		if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'restaurantOwnerCategory'){
			$objRestaurant	= new Restaurant;
			#$objRestaurant->categoryList($_SESSION['restaurantownerid']);
			
			$objSmarty->assign('objRestaurant',$objRestaurant);
			
		}
		#-----------------------------------------------------
		#Category change status
		if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'restaurantCategoryChangeStatus'){
			$objRestaurant	= new Restaurant;
			$objRestaurant->categoryChangeStatus($_SESSION['restaurantownerid']);
			#$objRestaurant->categoryList($_SESSION['restaurantownerid']);
			$objSmarty->assign('objRestaurant',$objRestaurant);
			
			
			if($_POST['chgeval']=="delete"){ $objSmarty->assign('succ_msg','Category deleted successfully'); }
			elseif($_POST['chgeval']=='0'){ $objSmarty->assign('succ_msg','Category status deactivated successfully'); }
			else{ $objSmarty->assign('succ_msg','Category status activated successfully'); }
			
		}
	#--------------------------------------------------------------------------------------------------
	#Menu Tab
	#--------------------------------------------------------------------------------------------------
		if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'Menu'){
			$objRestaurant	= new Restaurant;
			#echo "<pre>";print_r($_REQUEST);echo "</pre>";
			
			#Change status
			if( isset($_POST['mid']) && !empty($_POST['mid']) ){
				
				$tablename 			= $CFG['table']['restaurant_menu'];
				$fieldname_updateid = 'id';
				if($_POST['chgeval'] == '1' || $_POST['chgeval'] == '0') $fieldname_status 	= 'status';
				elseif($_POST['chgeval'] == 'Yes' || $_POST['chgeval'] == 'No')	$fieldname_status 	= 'menu_popular_dish';
				
				$objRestaurant->changeStatusResMyaccount($tablename,$fieldname_status,$fieldname_updateid);
				
				if($_POST['chgeval']=="delete"){ $objSmarty->assign('succ_msg','Menu deleted successfully'); }
				elseif($_POST['chgeval']=='0'){ $objSmarty->assign('succ_msg','Menu status deactivated successfully'); }
				elseif($_POST['chgeval']=='1'){ $objSmarty->assign('succ_msg','Menu status activated successfully'); }
				elseif($_POST['chgeval']=='Yes'){ $objSmarty->assign('succ_msg','Menu status change to popular successfully'); }
				else{ $objSmarty->assign('succ_msg','Menu status change to normal successfully'); }
			}
            
            $objSite->getShowCategoryList_res($_SESSION['restaurantownerid']);
			$objSmarty->assign('sortbystatus',$_REQUEST['sortbystatus']);
			
			$objSmarty->assign('objRestaurant',$objRestaurant);
		}
		
		#Menu List pagination
		if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'restaurantOwnerMenu'){
			$objRestaurant	= new Restaurant;
			#$objRestaurant->menuList($_SESSION['restaurantownerid']);
			
			$objSmarty->assign('sortbystatus',$_REQUEST['sortbystatus']);
			$objSmarty->assign('objRestaurant',$objRestaurant);
		}
		#-----------------------------------------------------
		#Category List From Menu Mgmt
		if(isset($_GET['action']) && !empty($_GET['action']) && ($_GET['action'] == 'categoryDropList') || ($_GET['action'] == 'categoryDropListEdit') || ($_GET['action'] == 'categoryDropListAddon') || ($_GET['action'] == 'categoryDropListAddonEdit') ) {
			
			$objSite->getShowCategoryList_res($_SESSION['restaurantownerid']);
			if(!empty($_REQUEST['catval'])){
				$objSmarty->assign('catval',$_REQUEST['catval']);
			}
		}
		#-----------------------------------------------------
		#Menu List Status changes #Popular Dish
		if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'restaurantMenuChangeStatus'){
			$objRestaurant	= new Restaurant;
			$objRestaurant->menuChangeStatus($_SESSION['restaurantownerid']);
			#$objRestaurant->menuList($_SESSION['restaurantownerid']);
			
			$objSmarty->assign('objRestaurant',$objRestaurant);
			
			if($_POST['chgeval']=="delete"){ $objSmarty->assign('succ_msg','Menu deleted successfully'); }
			elseif($_POST['chgeval']=='0'){ $objSmarty->assign('succ_msg','Menu status deactivated successfully'); }
			elseif($_POST['chgeval']=='1'){ $objSmarty->assign('succ_msg','Menu status activated successfully'); }
			elseif($_POST['chgeval']=='Yes'){ $objSmarty->assign('succ_msg','Menu status change to popular successfully'); }
			else{ $objSmarty->assign('succ_msg','Menu status change to normal successfully'); }
			
		}*/
		#-----------------------------------------------------
		#Addons List From Menu Mgmt
		/*if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'showCatAddonsList'){
			
			$objSite->getShowAddonsList($_GET['catid'],$_GET['resid']);
			#$objSite->getShowAddonsListEdit($_GET['catid']);
			$objSmarty->assign('objSite',$objSite);
		}
		#-----------------------------------------------------
		#Addons List From Menu Mgmt
		if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'showCatAddonsListEdit'){
			
			$objSite->getShowAddonsList($_GET['catid']);
			#$objSite->getShowAddonsListEdit($_GET['catid']);
			$objSmarty->assign('objSite',$objSite);
		}
		#-----------------------------------------------------
		#Addons List From Menu Mgmt
		if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'showCatPizzaAddonsList'){
			
			$objSite->getShowPizzaAddonsList($_GET['catid']);
		}
		if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'showCatPizzaAddonsListEdit'){
			
			$objSite->getShowPizzaAddonsList($_GET['catid']);
		}*/
		
    	#--------------------------------------------------------------------------------------------------
    	#Addons Tab
    	#--------------------------------------------------------------------------------------------------
    		/*if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'Addon'){
    			$objRestaurant	= new Restaurant;
    			
    			#Change Status
    			if( isset($_POST['mid']) && !empty($_POST['mid']) ){
    				
    				$tablename 			= $CFG['table']['restaurant_addons'];
    				$fieldname_status 	= 'status';
    				$fieldname_updateid = 'id';
    				
    				$objRestaurant->changeStatusResMyaccount($tablename,$fieldname_status,$fieldname_updateid);
    				
    				if($_POST['chgeval']=="delete"){ $objSmarty->assign('succ_msg','Addons deleted successfully'); }
    				elseif($_POST['chgeval']=='0'){ $objSmarty->assign('succ_msg','Addons status deactivated successfully'); }
    				else{ $objSmarty->assign('succ_msg','Addons status activated successfully'); }
    			}
    			
    			$objSmarty->assign('sortbystatus',$_REQUEST['sortbystatus']);
    			
    			$objSmarty->assign('objRestaurant',$objRestaurant);
    		}*/
	
	#--------------------------------------------------------------------------------------------------
	#Offers Tab
	#--------------------------------------------------------------------------------------------------
		/*if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'Offer'){
			$objRestaurant	= new Restaurant;
			
			#Change status
			if( isset($_POST['mid']) && !empty($_POST['mid']) ){
				
				$tablename 			= $CFG['table']['restaurant_offer'];
				$fieldname_status 	= 'status';
				$fieldname_updateid = 'Offer_id';
				
				$objRestaurant->changeStatusResMyaccount($tablename,$fieldname_status,$fieldname_updateid);
				
				if($_POST['chgeval']=="delete"){ $objSmarty->assign('succ_msg','Offer deleted successfully'); }
				elseif($_POST['chgeval']=='0'){ $objSmarty->assign('succ_msg','Offer status deactivated successfully'); }
				else{ $objSmarty->assign('succ_msg','Offer status activated successfully'); }
			}
			
			$objSmarty->assign('sortbystatus',$_REQUEST['sortbystatus']);
			
			$objSmarty->assign('objRestaurant',$objRestaurant);
		}*/
		
		#Offer List
		/*if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'resownershowofferList'){
			$objRestaurant	= new Restaurant;
			
			$objSmarty->assign('objRestaurant',$objRestaurant);
		}*/
		#-----------------------------------------------------
		#Offer List pagination
		/*if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'restaurantOwnerOffer'){
			$objRestaurant	= new Restaurant;
			#$objRestaurant->offersList($_SESSION['restaurantownerid']);
			
			$objSmarty->assign('sortbystatus',$_REQUEST['sortbystatus']);
			$objSmarty->assign('objRestaurant',$objRestaurant);
		}*/
		#-----------------------------------------------------
		#Offers change status
		/*if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'restaurantOfferssChangeStatus'){
			$objRestaurant	= new Restaurant;
			$objRestaurant->offerChangeStatus($_SESSION['restaurantownerid']);
			#$objRestaurant->offersList($_SESSION['restaurantownerid']);
			
			$objSmarty->assign('objRestaurant',$objRestaurant);
			
			if($_POST['chgeval']=="delete"){ $objSmarty->assign('succ_msg','Offer deleted successfully'); }
			elseif($_POST['chgeval']=='0'){ $objSmarty->assign('succ_msg','Offer status deactivated successfully'); }
			else{ $objSmarty->assign('succ_msg','Offer status activated successfully'); }
		}*/
	#--------------------------------------------------------------------------------------------------
	#Reviews Tab
	#--------------------------------------------------------------------------------------------------
		/*if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'Reviews'){
			$objRestaurant	= new Restaurant;
			//echo "hii";
            //echo "<pre>";print_r($_REQUEST);echo "</pre>";
			#Change status
			if( isset($_POST['mid']) && !empty($_POST['mid']) ){
				
				$tablename 			= $CFG['table']['restaurant_reviews'];
				$fieldname_status 	= 'status';
				$fieldname_updateid = 'rating_id';
				
				$objRestaurant->changeStatusResMyaccount($tablename,$fieldname_status,$fieldname_updateid);
				
				if($_POST['chgeval']=="delete"){ $objSmarty->assign('succ_msg','Review deleted successfully'); }
				elseif($_POST['chgeval']=='0'){ $objSmarty->assign('succ_msg','Review status deactivated successfully'); }
				else{ $objSmarty->assign('succ_msg','Review status activated successfully'); }
			}
			
			$objSmarty->assign('sortbystatus',$_REQUEST['sortbystatus']);
			
			$objSmarty->assign('objRestaurant',$objRestaurant);
		}*/
		#-------------------------------------------------------------------------
		/*if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'Paymentmethod'){
			$objRestaurant	= new Restaurant;
			
			#Change status
			if( isset($_POST['mid']) && !empty($_POST['mid']) ){
				
				$tablename 	= $CFG['table']['restaurant_choose_paymentoption'];
				
				$objRestaurant->selectpaymentMethod($tablename);
				
				if($_POST['chgeval']=='Yes'){ $objSmarty->assign('succ_msg','Payment method actived successfully'); }
				else{ $objSmarty->assign('succ_msg','Payment method deactived successfully'); }
			}
			
			$objSmarty->assign('sortbystatus',$_REQUEST['sortbystatus']);
			
			$objSmarty->assign('objRestaurant',$objRestaurant);
		}*/
		
		#--------------------------------------------------------------------------------------------------
		#Report Tab
		#--------------------------------------------------------------------------------------------------
		/*if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'Bookings'){
			$objRestaurant	= new Restaurant;
			
			#Change status
			if( isset($_POST['mid']) && !empty($_POST['mid']) ){
				
				$tablename 			= $CFG['table']['restaurant_booking'];
				$fieldname_status 	= 'status';
				$fieldname_updateid = 'id';
				
				$objRestaurant->changeStatusResMyaccount($tablename,$fieldname_status,$fieldname_updateid);
				
				if($_POST['chgeval'] == "delete"){ $objSmarty->assign('succ_msg','Bookings deleted successfully'); }
				elseif($_POST['chgeval']=='0'){ $objSmarty->assign('succ_msg','Bookings status deactivated successfully'); }
				else{ $objSmarty->assign('succ_msg','Bookings status activated successfully'); }
			}
			
			$objRestaurant->bookingsList();
			
			$objSmarty->assign('sortbystatus',$_REQUEST['sortbystatus']);
			
			$objSmarty->assign('objRestaurant',$objRestaurant);
		}*/
		#-------------------------------------------------------------------------
		/*if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'editSubAddon' ){
			
			#echo "<pre>";print_r($_REQUEST);echo "</pre>";
			$objSite->getShowMainAddonsListEdit($_REQUEST['addonid']);
			$objSite->getShoweditlist($_REQUEST['addonid']);
		}*/
	
	$objSmarty->display('ajaxActionRestaurant.tpl');
?>