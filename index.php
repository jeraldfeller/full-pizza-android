<?php 
include("includes/config.inc.php");
#Offline
$objSite->siteOfflineStaus();
#Language
$objSite->languageSession();
//echo "hi";
$objCommon = new Common;

$objSetting	= new Setting;

//echo "<pre>";print_r($_SESSION);echo "</pre>";
if( ($_SESSION['voucher']) && !empty($_SESSION['voucher']) ){
    unset($_SESSION['voucher']);
}
if( ($_SESSION['voucherPrice']) && !empty($_SESSION['voucherPrice']) ){
    unset($_SESSION['voucherPrice']);
}    
//secho "hi";
//$copy_date = "$#$%^%&*()<>_+|!~ hello";
//$copy_date = "123+#% hello";
//$copy_date = preg_match("(/^[a-z][a-z0-9]*$/i)", " ", $copy_date);
//$q = preg_replace('/[^a-zA-Z0-9]+/', ' ', $copy_date);
//$q = preg_replace("([0-9+$]+#%)"," ", $copy_date);
//echo memory_get_usage() . "\n"; 
//print $q;
#.............................................................................................

#echo "<pre>";print_r($_SESSION);echo "</pre>";.
	#Meta tag Info
	$objCommon->site_metatag_info();

	#Top Restaurant by Cuisine
	$objCommon->topRestaurantByCuisine();
	
	#Top Restauraunt by Location - Areas
	$objCommon->topRestByMostPopularCities();
	
	#Top Restauraunt by Location - Areas
	$objCommon->topRestByAreas();
	#Feature Restaurant Hot Offers
	$objCommon->FeaturedRestHotOffers();
	#Restaurant Table Booking
	$objCommon->FeaturedRestTableBooking();

	#Banner List
	$objCommon->bannerList();
	
	#Wht Not Try List
	if(!empty($_SESSION['searcharea'])){
		$searcharea = $objSite->filterInput($_SESSION['searcharea']);
	}else{
		$searcharea = '';
	}
    $_REQUEST['searcharea'] = $_SESSION['searcharea'];
    $searcharea = $objSite->filterInput($_REQUEST['searcharea']);
    
    #echo "<pre>--->1";print_r($_REQUEST);echo "</pre>";
    
	$objCommon->restaurantListIndex($searcharea);
    
   	//$objCommon->browseByAreas();
    
    if(!empty($_SESSION['searcharea'])){
        $_SESSION['searcharea'] == '';
        unset($_SESSION['searcharea']);
    }
    #echo "<pre>--->2";print_r($_REQUEST);echo "</pre>";
     #echo "<pre>--->2";print_r($CFG);echo "</pre>";
#.............................................................................................
$objSearchResult	= new SearchResult;
$objSmarty->assign("objSearchResult", $objSearchResult);
$ACTUAL_PAGE = 'index';

$searchoption = $objSetting->getValue("searchoption", $CFG['table']['sitesetting'],"id = '1'");
$objSmarty->assign("searchoption", $searchoption);

$searchbyoption = $objSetting->getValue("searchbyoption", $CFG['table']['sitesetting'],"id = '1'");
$objSmarty->assign("searchbyoption", $searchbyoption);
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('index.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->assign("ACTUAL_PAGE", $ACTUAL_PAGE);
$objSmarty->display('main.tpl');
?>