<?php 
include("includes/config.inc.php");
#Language
$objSite->languageSession();
#.............................................................................................
if(isset($_GET['action'])&&($_GET['action']=="searchResultRight"))
{
    #echo "come";
	$objSearchResult = new SearchResult;
    $objSearchDetails	= new SearchDetails;
	$objSearchResult->searchResultRestaurant();
	
	$objSmarty->assign('action',$_GET['action']);
}
	$objSmarty->assign("objSearchDetails", $objSearchDetails);
#.............................................................................................
#SMARTY ASSIGNING 
$objSmarty->assign("objSearchResult", $objSearchResult);
$objSmarty->display('searchResultAjax.tpl');
?>