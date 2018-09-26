<?php 
include("includes/config.inc.php");
#Offline
$objSite->siteOfflineStaus();
#Language
$objSite->languageSession();

$objSearchResult	= new SearchResult;
$objSearchDetails	= new SearchDetails;
$objSetting			= new Setting;
#.............................................................................................
	//echo("<script>console.log('vamos a ver q lo q es');</script>"); 

	$_SESSION['deliverypickup'] = 'delivery';
	
	#Cuisine List
	$objSearchResult->chooseCuisineList();
	
	#Delivery Area List
	$objSearchResult->chooseDeliveryAreaList();
	
	#Search Result
	$objSearchResult->searchResultRestaurant();
	//$objSearchResult->searchResultRestaurantByLocation();
    //$objSearchResult->reviewmessage();

	//all rest
	$objSearchResult->searchResultAllRestaurants();
 
	
	#Banner List
	$objCommon->bannerList();

#----------------------------------------------------------------------------------------------
$searchoption = $objSetting->getValue("searchoption", $CFG['table']['sitesetting'],"id = '1'");
$objSmarty->assign("searchoption", $searchoption);

$searchbyoption = $objSetting->getValue("searchbyoption", $CFG['table']['sitesetting'],"id = '1'");
$objSmarty->assign("searchbyoption", $searchbyoption);
    	
#-----------------------------------------------------------------------------------------
	$objSmarty->assign("objSearchResult", $objSearchResult);
    $objSmarty->assign("objSearchDetails", $objSearchDetails);
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('searchResult.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');
?>