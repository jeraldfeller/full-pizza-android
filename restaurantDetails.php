<?php 
include("includes/config.inc.php");
#Offline
$objSite->siteOfflineStaus();
#Language
$objSite->languageSession();

$objSearchDetails	= new SearchDetails;
$objSearchResult	= new SearchResult;
#.............................................................................................
	#Restaurant Status
	/*if(isset($_REQUEST['resid']) && !empty($_REQUEST['resid'])){
		$restaurantStatus	= $objCommon->restaurantDetailsLogInStatus();
		if($restaurantStatus != '1'){
			$objSite->redirectUrl($CFG['site']['base_url_https']);
		}
	}*/
    //print_r($_SESSION);
	#Restaurant details
	$objSearchDetails->restaurantDetails();
	$objSearchDetails->restaurantDetailsPaymentMethod($_REQUEST['resid']);
	#Category All From left side
	$objSearchDetails->categoryList();
	#Category Veg List
	#$objSearchDetails->vegCategoryList();
	#Category Non Veg List
	#$objSearchDetails->nonvegCategoryList();
	#Offers List
	$objSearchDetails->RestaurantOffers();
	#Menu Cart List
	$objSearchDetails->menuCartList();
	//$objSearchDetails->categoryMenuList(3);
	$objSearchDetails->pizzzaSizeList(3, 'normal', 6);
	$objSearchDetails->restaurantReviewDetails($_GET['resid']);
	#Average Rating
	$reviewsrating = $objSearchResult->averageReviews($_GET['resid']);
    $objSmarty->assign('reviewrating', $reviewsrating);
	#Last Updated voucher for restuarant
    $reviewscount = $objSite->getNumValues($CFG['table']['restaurant_reviews'],
                " restaurant_id='" . $objSite->filterInput($_GET['resid']) . "' AND status = '1' "); 
    $objSmarty->assign('reviewscount', $reviewscount);
    $objSite->checkRestVoucherValid($_REQUEST['resid']);
    #Res Voucher List
    $objSearchDetails->resVoucherList($_REQUEST['resid'], '');
    
	$guests_list = $objSite->guestsList();
	$objSmarty->assign('GUESTS_LIST', $guests_list);
	
	$objSmarty->assign("objSearchDetails", $objSearchDetails);
    $objSmarty->assign("resid",$_REQUEST['resid']);
    #Yelp Review
    $objSite->yelpRestuarantReviews($_REQUEST['resid']);
    $objSearchDetails->MyFavoritesAddid($_REQUEST['resid']);
    $objSite->checkbookingdatePickerDate($_REQUEST['resid']);
#.............................................................................................
#SMARTY ASSIGNING 

$main_content = $objSmarty->fetch('restaurantDetails.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');
?>