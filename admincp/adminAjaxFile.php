<?php
	include("../includes/config.inc.php");
	
	/****************************************** Common *****************************************/
	#Change Status 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'changeStatus'){
		
		$objAdmin = new Admin();		
		$objAdmin->changeStatus();
	}
    #Change BookingStatus 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'changebookStatus'){
		
		$objAdmin = new Admin();		
		$objAdmin->changebookStatus();
	}
	#Change Status Pending
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'changeStatusPending'){
		
		$objAdmin = new Admin();		
		$objAdmin->changeStatusPending();
	}
	#Delete 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'deleteProcess'){
		 
		$objAdmin = new Admin();		
		$objAdmin->Delete_Admin();		
	}
	#Full Delete Restaurant 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'fulldeleteProcess'){
		
		$objAdmin = new Admin();		
		$objAdmin->RestaurantFullDelete();		
	}
	#Full Delete More Than One Restaurant 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'FullDeleteRestaurants'){
		
		$objAdmin = new Admin();		
		$objAdmin->RestaurantFullDelete();		
	}
	#Full Restore Process 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'restoreProcess'){
		
		$objAdmin = new Admin();		
		$objAdmin->RestoreProcess();		
	}
	#Change Popular to Normal 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'changePopularDish'){
		
		$objAdmin = new Admin();		
		$objAdmin->changeStatus();
	}
	#Change Feature to Normal 
	/*if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'changeFeatureRes'){
		
		$objAdmin = new Admin();		
		$objAdmin->changeFeatureRestaurant();
	}
	*/	
	
	/****************************************** Admin Login *****************************************/
	#Admin Login
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkAdminLogin'){
		
		$objAdmin = new Admin();
		$objAdmin->chkAdminLogin();
	}
	/****************************************** Change Password *****************************************/
	#Change Password
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkChangePassword'){
		
		$objAdmin = new Admin();
		$objAdmin->change_pwd();
	}
	/****************************************** Icon Settings *****************************************/
	#Update Icon Setting
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'editUpdateIconSetting'){
		
		$objSetting	= new Setting();
		$objSetting->updateIconSettings();
	}
	
	/****************************************** Category *********************************************/
	#check newcatename availabilty
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkNewCateName'){
		
		$objAdminMgmt = new AdminManagement;
		$objAdminMgmt->mainCategoryAdd();
	}
    #check followers  availabilty
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkExistsFollowers'){
		
		$objAdminMgmt = new AdminManagement;
		$objAdminMgmt->checkFollowersName();
	}
	#check editcatename availabilty
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkEditCateName'){
		
		$objAdminMgmt = new AdminManagement;
		$objAdminMgmt->mainCategoryEdit();
	}
	
	/****************************************** Cuisine *********************************************/
	#New cuisine Name Add validation 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkCuisineName'){
		
		$objAdminMgmt = new AdminManagement;
		$objAdminMgmt->cuisineValidation();		
	}
	#cuisine Edit Validation
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkEditCuisineName'){
		
		$objAdminMgmt = new AdminManagement;
		$objAdminMgmt->cuisineEditValidation();		
	}
	#New cuisine Name Add validation 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkPaymentInfoName'){
		
		$objAdminMgmt = new AdminManagement;
		$objAdminMgmt->paymentinfoValidation();		
	}
	#cuisine Edit Validation
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkEditPaymentInfoName'){
		
		$objAdminMgmt = new AdminManagement;
		$objAdminMgmt->paymentInfoEditValidation();		
	}
	
	/****************************************** Addons *********************************************/
	#check Addons availabilty
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkNewAddonsName'){
		
		$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objAdminRestaurantMgmt->addonsNew();
	}
	#check Addons availabilty
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkEditAddonsName'){
		
		$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objAdminRestaurantMgmt->addonsEdit();
	}
	#check Sub Addons availabilty
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkNewSubAddonsName'){
		
		$objAdminMgmt = new AdminManagement;
		$objAdminMgmt->addonsSubNew();
	}
	
	/****************************************** State *********************************************/
	#add state name
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkAddStateName'){
		
		$objAdminMgmt	= new AdminManagement;
		$objAdminMgmt->stateNameAdd();
	}
	#Edit state name 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkEditStateName'){
		
		$objAdminMgmt	= new AdminManagement;
		$objAdminMgmt->stateNameEdit();
	}
	/****************************************** Language  checkAddCustomer*********************************************/
	#add Language name
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkAddLanguageName'){
		
		$objAdminMgmt	= new AdminManagement;
		$objAdminMgmt->LanguageNameAdd();
	}
	#Edit Language name 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkEditLanguageName'){
		
		$objAdminMgmt	= new AdminManagement;
		$objAdminMgmt->languageNameEdit();
	}
	if(isset($_POST['action']) && !empty($_POST['action']) && ( $_POST['action'] == 'LanguageFilesListEdit') && ($_POST['lfile'] == $_POST['lang_file_name'])){
		$objAdminMgmt	= new AdminManagement;
		$objAdminMgmt->updateLanguageFiles();
	}
	/****************************************** Admin customer Register  *********************************************/
	#add new customer
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkAddCustomer'){
		
		$objAdminMgmt	= new AdminManagement;
		$objAdminMgmt->customerRegister();
	}
	#Edit customer 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkEditCustomer'){
		
		$objAdminMgmt	= new AdminManagement;
		$objAdminMgmt->cutomerEdit();
	}
	/****************************************** City *********************************************/
	#add city name
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkAddCityName'){
		
		$objAdminMgmt	= new AdminManagement;
		$objAdminMgmt->cityNameAdd();
	}
	#Edit city name 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkEditCityName'){
		
		$objAdminMgmt	= new AdminManagement;
		$objAdminMgmt->cityNameEdit();
	}
	
	/****************************************** Zipcode *********************************************/
	#Add New zipcode 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkAddZipcode'){
		
		$objAdminMgmt	= new AdminManagement;
		$objAdminMgmt->newZipcodeAdd();
	}
	#Edit zipcode
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkEditZipcode'){
		
		$objAdminMgmt	= new AdminManagement;
		$objAdminMgmt->zipcodeEdit();
	}
	
	/****************************************** FAQ *********************************************/
	#add Faq Manage
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'addFaqManage'){
		
		$objAdminMgmt	= new AdminManagement;
		$objAdminMgmt->faqAdd();
	}
	
	#edit Faq Manage
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'updateFaqManage'){
		
		$objAdminMgmt	= new AdminManagement;
		$objAdminMgmt->faqManageUpdate();
	}
	
	/****************************************** Content *********************************************/
	#New content Add validation 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkContentAdd'){
		
		$objAdminMgmt = new AdminManagement;
		$objAdminMgmt->newContentAdd();	
	}
	#Edit content 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkContentEdit'){
		
		$objAdminMgmt = new AdminManagement;
		$objAdminMgmt->contentEdit();	
	}
	#Update Content Sort Order
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action']=='updateContentOrder'){
	
		$objAdminMgmt = new AdminManagement;
		$objAdminMgmt->updateContentOrder();
	}
	
	/****************************************** Restaurant Menu ************************************/
	#check Menu name availabilty
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkMenuName'){
		#echo "<pre>";print_r($_REQUEST);echo "</pre>";
		#$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objSite->checkMenuName();
	}
	#check Edit Menu name availabilty
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkEditMenuName'){
		#echo "<pre>";print_r($_REQUEST);echo "</pre>";
		#$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objSite->checkEditMenuName();
	}
    #==========================================================================================================
    #Check Whether the emailid is already exist or not
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkResEmailAlreadyExist'){
		
		$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objAdminRestaurantMgmt->checkResEmailAlreadyExist();
	}
    #==========================================================================================================
    
	#check Category others availabilty
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkMenuCategoryOthers'){
		
		#$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objSite->checkMenuCategoryOthers();
	}
	/****************************************** Restaurant Offer *********************************************/
	#add New Restaurant offer
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'restaurantOfferNew'){
		
		$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objAdminRestaurantMgmt->restaurantOfferNew();
	}
	#edit Restaurant offer
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'restaurantOfferEdit'){
		
		$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objAdminRestaurantMgmt->restaurantOfferUpdate();
	}
	/****************************************** Restaurant Select All Time *********************************************/
	/*#Select All Open Time
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkSelectAllOpen'){
		
		#$objSite	= new Site;
		#$objSite->selectAllOpen();
		$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objAdminRestaurantMgmt->selectAllOpen();
	}*/
	
	
	/****************************************** Payment Settings *****************************************/
	#Update Payment Setting
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'editUpdatePaymentSetting'){
		
		$objSetting	= new Setting();
		$objSetting->updatePaymentSettings();
	}
	
	#Delete Restaurant Photo's 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'resdeletePhotos'){
		
		$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objAdminRestaurantMgmt->Res_Delete_Photo();		
	}
	
	#Delete Restaurant Logo 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'resdeleteLogo'){
		
		$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objAdminRestaurantMgmt->Res_Delete_Logo();		
	}
	#----------------------------------------------------------------------------
	#Check Category Name 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkCategoryName'){
		
		$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objAdminRestaurantMgmt->checkCategoryName();		
	}
	#----------------------------------------------------------------------------
	#Check Category Name 
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'checkCategoryName1'){
		
		$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objAdminRestaurantMgmt->checkCategoryName1();		
	}
	#----------------------------------------------------------------------------
	#Select Payment Method
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'selectPaymentMethod'){
		
		$objAdminMgmt = new AdminManagement;
		$objAdminMgmt->selectpaymentMethod();
	}
	#Auto Select Zip Code
	if(isset($_REQUEST['action']) && !empty($_REQUEST['action']) && $_REQUEST['action'] == 'searchzip'){
		
		$objAdminMgmt = new AdminManagement;
		$objAdminMgmt->autoSuggestzip();
	}
    #Auto Select Country 
    if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'searchcountry'){
		
		$objAdminMgmt = new AdminManagement;
		$objAdminMgmt->autoSuggestcountry();
	}
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'searchcountryshort'){
		
		$objAdminMgmt = new AdminManagement;
		$objAdminMgmt->autoSuggestcountryshort();
	}
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'searchsitezone'){
		
		$objAdminMgmt = new AdminManagement;
		$objAdminMgmt->autoSuggestsitezone();
	}
    if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'searchsitezonec'){
		
		$objAdminMgmt = new AdminManagement;
		$objAdminMgmt->autoSuggestsitezonec();
	}
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'getCurrencySymbol'){
		
        $objAdminMgmt = new AdminManagement;
		$objAdminMgmt->autoSuggestcurrency();
        
	}
    if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'searchsitecity'){
		
        $objAdminMgmt = new AdminManagement;
		$objAdminMgmt->autoSuggestcity();
        
	}
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'getstate'){
		
        $objAdminMgmt = new AdminManagement;
		$objAdminMgmt->autoSuggeststate();
        
	}
    if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'getzipcode'){
		
        $objAdminMgmt = new AdminManagement;
		$objAdminMgmt->autoSuggestzipcode();
        
	}
    
    
    #------------------------------------------------------------------------------------------------#
	#Update Category Sort Order
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action']=='updateCategoryOrder'){
	   
		$objSite->updateCategoryOrder();
	}
    #------------------------------------------------------------------------------------------------#
	#Update Category Sort Order
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action']=='updateMenuOrder'){
	   
		$objSite->updateMenuOrder();
	}
	#------------------------------------------------------------------------------------------------#
	#Offer Check
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action']=='checkOfferAlready'){
	   
       	$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objAdminRestaurantMgmt->offerAlreadyCheck();
	}
    #Edit Offer Check 
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action']=='checkEditOfferAlready'){
	   
       	$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objAdminRestaurantMgmt->offerEditAlreadyCheck();
	}
    
    #Edit Offer Check 
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action']=='addMapView'){
	   
       	$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objAdminRestaurantMgmt->addMapViewDetails();
	}

	#Voucher AddEdit
	if(isset($_REQUEST['action']) && !empty($_REQUEST['action']) && $_REQUEST['action']=='checkVoucherCode'){
	   
       	$objAdminRestaurantMgmt	= new AdminRestaurantMgmt;
		$objAdminRestaurantMgmt->checkVoucherCode();
	}
	
?>