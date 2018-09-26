<?php 
include("includes/config.inc.php");
$objSite->languageSession();
//$objSearchResult2	= new SearchResult;
//$objSearchResult2->searchResultRestaurantByLocation();
#SMARTY ASSIGNING 
$ACTUAL_PAGE = 'address';
//$objSmarty->assign("objSearchResult", $objSearchResult2);
$objSearchResult	= new SearchResult;
$objCustomer = new Customer;
$objCustomer->addressBookList();
$objSmarty->assign("objCustomer", $objCustomer);
$objSearchResult->searchResultAllRestaurants();
if( isset($_SESSION['customerid']) && !empty($_SESSION['customerid']) ){
	  $objSmarty->assign("logged_user", true);
} else{
    $objSmarty->assign("logged_user", false);
}

if( isset($_REQUEST['lat']) && !empty($_REQUEST['lat']) && isset($_REQUEST['long']) && !empty($_REQUEST['long'])  ){
	  $objSearchResult->searchResultRestaurantByLocation();
      die();
} 

$main_content = $objSmarty->fetch('address.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->assign("ACTUAL_PAGE", $ACTUAL_PAGE);
$objSmarty->display('main.tpl');
?>