<?php
	include("includes/config.inc.php");
    header('Content-Type: text/html; charset=iso-8859-1');
	#Language
	$objSite->languageSession();
	
    $postAction = $_POST['action'];
    $getAction  = $_GET['action'];

    
    if ($postAction != '') {
        
        switch ($postAction) {

            case 'searchResultRestaurantByLocation':
               
               //echo 'hola';
                $objSearchResult = new SearchResult;
                               
               //echo("<script>console.log('response:');</script>"); 
                $objSearchResult->searchResultRestaurantByLocation();
                //return $objSearchResult;

                //return $response;
               // echo $response;
               /* foreach ($artistName as $key => $value) {
                    echo("<script>console.log('response: ". $key .": " . $value ."');</script>"); 
                } */

                //echo("<script>console.log('response: ". $artistName[0] ."');</script>"); 

                //echo("<script>console.log('ejecuto la funcion');</script>"); 

            case 'sendFeedback':
                
                #Feedback
                $objRestaurant = new Restaurant;
                $objRestaurant->resOwnerSiteFeedback();
                break;
            
            case 'updateGuestInfo':
            
                #Guest
                $objCommon = new Common();
                $objCommon->updateGuestInfo();	
                break;
            
            case 'customerLoginFb':
                
                #Facebook Connect for Login
                $objCustomer = new Customer;
                $objCustomer->customerLoginFacebook();
                break;
                
            case 'searchzip':
            
                #Search ZipCode
                $objCommon = new Common;
                $objCommon->autoSuggestZipCode();
                break;
            
            case 'customerlogin':
                
                #Customer Login
                $objCustomer = new Customer;
                $objCustomer->customerLogin();
                break;
                
            case 'customerforgetPassword':
                
                #Customer Forget Password
                $objCustomer = new Customer;
                $objCustomer->customerForgetPassword();
                break;
                
            case 'restaurantOpenStatus':
                
                #Restaurant Open Status
                $objRestaurant = new Restaurant;
                $objRestaurant->restaurantSetStatus();
                break;
                
            case 'restaurantCloseStatus':
                
                #Restaurant Open Status
                $objRestaurant = new Restaurant;
                $objRestaurant->restaurantSetStatus();
                break;
                
            case 'customerregister':
                
                #Customer Register
                $objCustomer = new Customer;
                $objCustomer->customerRegister();
                break;
                
            case 'checkCustomerEmail':
            
                #Check already user
                $objCustomer = new Customer;
                $objCustomer->checkAlreadyUser();
                break;
            case 'mailsubscribe':
                
                #Customer Register
                $objCustomer = new Customer;
                $objCustomer->addmailsubscribe();
                break;
                
             case 'checkSubscribeEmail':
            
                #Check already user
                $objCustomer = new Customer;
                $objCustomer->checkAlreadySubscribe();
                break;
                
            case 'MyFavorites':
            
                #My Favorites Add / Remove
                $objSearchDetails	= new SearchDetails;
                $objSearchDetails->ListMyFavorties();
                break;
                
            case 'checkChangePassword':
            
                #Change Password
                $objCustomer = new Customer;
                $objCustomer->customerChangePassword();
                break;
                
            case 'customerUpdateProfile':
            
                #Update Profile
                $objCustomer = new Customer;
                $objCustomer->customerUpdateProfile();
                break;
                
            case 'customerUpdateSecondary':
            
                #Update Secondary Address
                $objCustomer = new Customer;
                $objCustomer->customerUpdateSecondaryAddress();
                break;
                
            case 'customerReviews':
                
                #Customer Reviews
                $objCustomer = new Customer;
                $objCustomer->customerReviews();
                break;
                
            case 'restaurantOwnerregister':
                
                #Restaurant Owner
                $objRestaurant = new Restaurant;
                $objRestaurant->restaurantOwnerRegister();
                break;
                
            case 'restaurantOwnerlogin':
            
                #Restaurant Login
                $objRestaurant = new Restaurant;
                $objRestaurant->restaurantOwnerLogin();
                break;
                
            case 'restaurantforgetPassword':
            
                #Restaurant Forget Password
                $objRestaurant = new Restaurant;
                $objRestaurant->restaurantForgetPassword();
                break;
                
            case 'restaurantOrder':   
                     
                #Order details
                $objCheckout = new Checkout();
                $objCheckout->restaurantOrder();
                break;
            case 'checkResNameAlreadyExist':   
                     
                #Order details
                $objRestaurant	= new Restaurant;
                $objRestaurant->checkResNameAlreadyExist();
                break; 
                
            case 'checkResEmailAlreadyExist':   
                     
                #Order details
                $objRestaurant	= new Restaurant;
                $objRestaurant->checkResEmailAlreadyExist();
                break;   
            case 'checkOrderEmailId':
            
                #check Order EmailId is alrady exist or not
                $objCheckout = new Checkout();
                $objCheckout->checkOrderEmailId();
                break;
                
            case 'checkaddtitle':
            
                #check Address title is already exist or not
                $objCheckout = new Checkout();
		        $objCheckout->checkaddtitle();
                break;
                
            case 'checkOrderResubmit':
            
                #While Order ReSubmit
                $objCheckout = new Checkout();
                $objCheckout->checkOrderResubmit();
                break;
                
            case 'checkOrderStatus':
            
                #Check Customer Status
                $objCheckout = new Checkout();
		        $objCheckout->checkOrderStatus();
                break;
                
            case 'restaurantAccountInfo':
            
                #Check Customer Status
                $objRestaurant = new Restaurant;
                $objRestaurant->restaurantAccountInfo();
                break;
                
            case 'restaurantEditContactInfo':
            
                #Restaurant Edit ContactInfo Update
                $objRestaurant	= new Restaurant;
		        $objRestaurant->restaurantEditContactInfo();
                break;
                
            case 'restaurantEditRestaurantInfo':
            
                #Restaurant Edit Info Update
                $objRestaurant	= new Restaurant;
		        $objRestaurant->editRestaurantInfo();
                break;
                
            case 'restaurantEditDeliveryInfo':
            
                #Restaurant Edit Info Update
                $objRestaurant	= new Restaurant;
		        $objRestaurant->editDeliveryInfo();
                break;
                
            case 'restaurantEditBankInfo':
            
                #Restaurant Edit Bank Info Update
                $objRestaurant	= new Restaurant;
		        $objRestaurant->editBankInfo();
                break;
                
            case 'restaurantEditInvoiceInfo':
            
                #Restaurant Edit Invoice Info Update
                $objRestaurant	= new Restaurant;
		        $objRestaurant->editInvoiceInfo();
                break;
                
            case 'restaurantEditOpenCloseInfo':
            
                #Restaurant Edit OpenCloseInfo Update
                $objRestaurant	= new Restaurant;
		        $objRestaurant->editOpenCloseInfo();
                
                break;
                
            case 'checkRestChangePassword':
            
                #Change Password
                $objRestaurant	= new Restaurant;
		        $objRestaurant->restaurantChangePassword();
                break;
  
                
            case 'disOptPhotoVideo':
            
                #My account Google Map
                $objRestaurant	= new Restaurant;
		        $objRestaurant->updatePhotoVideoDisplay();
                break;
                
            case 'checkMenuName':
            
                #My account check Menu Name
                $objSite->checkMenuName();
                break;
                
            case 'checkEditMenuName':
            
                #My account check Edit MenuName
                $objSite->checkEditMenuName();
                break;
                
            case 'checkMenuCategoryOthers':
            
                #check Category others availabilty
                $objSite->checkMenuCategoryOthers();
                break;
                
            case 'editMenuOption':
            
                #Edit Menu Option
                $objRestaurant = new Restaurant;
                $objRestaurant->restaurantEditMenuOption();
                break;
                
            case 'removeCrustOption':
            
                #Remove Crust Option
                $objRestaurant = new Restaurant;
                $objRestaurant->resRemoveCrustOption();
                break;
                
            case 'checkCategoryName':
            
                #Check Category Name 
                $objRestaurant = new Restaurant;
                $objRestaurant->checkCategoryName();
                break;
                
            case 'checkNewAddons':
            
                #Check aDD Addons availabilty
                $objRestaurant = new Restaurant;
                $objRestaurant->addonNew();
                break;
                
            case 'checkEditAddons':
            
                #check Edit Addons availabilty
                $objRestaurant = new Restaurant;
                $objRestaurant->addonEdit();
                break;
                
            case 'editAddonsOption':
            
                #Edit Addon Option
                $objRestaurant = new Restaurant;
                $objRestaurant->restaurantEditAddons();
                break;
                
            case 'checkNewOffer':
            
                #check Offers availabilty
                $objRestaurant = new Restaurant;
                $objRestaurant->offerNew();	
                break;
                
            case 'editOffersOption':
            
                #Edit Offer Option availabilty
                $objRestaurant = new Restaurant;
                $objRestaurant->restaurantEditOffers();
                break;
                
            case 'checkEditOffer':
            
                #Update Offers 
                $objRestaurant = new Restaurant;
	            $objRestaurant->offEdit();
                break;
                
            case 'checkOfferAlready':
            
                #Check Add Offer Already
                $objRestaurant = new Restaurant;
                $objRestaurant->offerAlreadyCheck();
                break;
                
            case 'checkEditOfferAlready':
            
                #Check Edit Offer Already
                $objRestaurant = new Restaurant;
                $objRestaurant->offerEditAlreadyCheck();
                break;
                
            case 'changeStatus':
            
                #Change status
                $objRestaurant = new Restaurant;

                if (isset($_POST['mid']) && !empty($_POST['mid'])) {
                    $objRestaurant->changeStatus();
                }
            
                $objSmarty->assign('sortbystatus', $_REQUEST['sortbystatus']);
                $objSmarty->assign('objRestaurant', $objRestaurant);
                break;
                
            case 'checkNewcategory':
            
                #Check Edit Offer Already
                $objRestaurant = new Restaurant;
                $objRestaurant->categoryNew();
                break;
                
             case 'editCategoryOption':
            
                #Check Edit Offer Already
                $objRestaurant = new Restaurant;
                $objRestaurant->restaurantEditCategorys();
                break;
                
            case 'checkEditCategory':
            
                #Check Edit Offer Already
                $objRestaurant = new Restaurant;
		        $objRestaurant->categoryEdit();
                break;
                
            case 'updateCategoryOrder':
            
                #Check Edit Offer Already
                $objSite->updateCategoryOrder();
                break;
                
            case 'updateMenuOrder':
            
                #Check Edit Offer Already
                $objSite->updateMenuOrder();
                break;
                
            case 'checkCategoryExist':
            
                #Check Edit Offer Already
                $objRestaurant = new Restaurant;
                $objRestaurant->checkCategoryExist();
                break;
                
            case 'resownerdeletePhotos':
            
                #Resowner deletePhotos
                $objRestaurant = new Restaurant;
		        $objRestaurant->resOwnerDelPhotos();
                break;
                
            case 'resownerdeleteLogo':
            
                #Delete Restaurant Owner Logo 
                $objRestaurant = new Restaurant;
                $objRestaurant->resOwnerDelLogo();
                break;
                
            case 'resownerdeleteBanner':
            
                #Delete Restaurant Owner Banner  
                $objRestaurant = new Restaurant;
                $objRestaurant->resOwnerDelBanner();
                break;
                
            case 'checkCategoryName':
            
                #Check Category Name 
                $objSearchDetails = new SearchDetails();
		        $objSearchDetails->checkCategoryName();
                break;
                
            case 'customerReviewsCheck':
            
                #Check Reviews
                $objCustomer = new Customer();
                $objCustomer->customerReviewsCheck();
                break;   
                
            case 'check_print_res':
            
                #GPRS Printer Response
                $sel_order = "SELECT printer_response FROM ".$CFG['table']['order']." WHERE orderid = '".base64_decode($objSite->filterInput($_POST['orderid']))."' ";
        		$res_order = $objSite->ExecuteQuery($sel_order,'select');
        		
        		echo $res_order['0']['printer_response'];
        		exit;
                break; 
                
            case 'addBookTable':
            
                #addBookTable
                $objSearchDetails	= new SearchDetails;
                $objSearchDetails->addBookTable();
                break;  
                
            case 'tipcalculation':
            
                #addBookTable
                $objCheckout = new Checkout;
                $objCheckout->tipcalculated();
                break;
                
            case 'restaurantEditCommissionInfo':
            
                $objRestaurant	= new Restaurant;
                $objRestaurant->editCommissionInfo();
                break;
                
            case 'getMenuCount':
            
                $objSearchDetails	= new SearchDetails;
                $objSearchDetails->getMenuCount();
                break;
            case 'callprocess':
                
                $objSite->callSmsOrder($_REQUEST['ordid']);
                break;
            case 'checkRestaurantDeliveryAddress':
            
                $objSite->deliveryAreaCheck();
                break;  
            case 'checkArea':
                $objSite->checkArea();
                break;  
        }
    }  elseif ($getAction != '') {
        
        switch ($getAction) {
            
             case 'searchArea':
            
                //Auto Suggestion Search Area
                $objCommon = new Common;
                $objCommon->autoSuggestByArea();
                break;
                
             case 'searchCuisine':
            
                #Search Cuisine
                $objCommon = new Common;
		        $objCommon->autoSuggestByCuisine();
                break;
            case 'restaurantLogout':
            
                #Restaurant Logout
                $objRestaurant = new Restaurant;
                $objRestaurant->restaurantLogout();
                break;
            case 'customerLogout':
                
                #Customer Logout
                $objCustomer = new Customer;
                $objCustomer->customerLogout();
                break;
                
             case 'restMyAccMap':
            
                #My account Google Map
                $objSite = new Site();
                $objSite->generateGoogleMap();
                break;
                
             case 'searchRestaurant':
            
                #Search Cuisine
                $objCommon = new Common;
		        $objCommon->autoSuggestByRestaurant();
                break;


        }
    }

?>