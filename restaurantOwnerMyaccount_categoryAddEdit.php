<?php

include ("includes/config.inc.php");
#Offline
$objSite->siteOfflineStaus();
#Language
$objSite->languageSession();

#Classes
$objCommon = new Common;
$objRestaurant = new Restaurant;
$objRestaurant->restaurant_unauthetic();
$objThumb = new Thumbnail;
global $objThumb;
//echo "<pre>"; print_r($objSite->languageSession()); echo "</pre>";
#.............................................................................................
#Restaurant Log In Status
if (isset($_SESSION['restaurantownerid']) && !empty($_SESSION['restaurantownerid']))
{
    $restaurantStatus = $objCommon->restaurantLogInStatus();
    if ($restaurantStatus != '1')
    {
        $objRestaurant->restaurantLogout();
    }
}

#--------------------------------------------------------------------------
$restaurantdetail = $objRestaurant->restDetailsMyacc();
$objSmarty->assign("restaurantname", $restaurantdetail[0]['restaurant_name']);
$objSmarty->assign("aboutrestaurant", $restaurantdetail[0]['restaurant_description']);

#--------------------------------------------------------------------------
#.............................................................................................
#Order Count
include_once ("restaurantOwnerMyaccount_orderCount.php");
#.............................................................................................
//echo "<pre>"; print_r($objSite->languageSession()); echo "</pre>";
if(isset($_GET['catid']) && !empty($_GET['catid']) ){
   
   $catid = $_GET['catid'];
   $objRestaurant->restaurantEditCategorys($catid);
	if(isset($_POST['action']) && ($_POST['action'] == "Edit") ){
		$objRestaurant->categoryEdit();
	}
    
    
}

if(isset($_POST['action']) && ($_POST['action'] == "Add") ){
	$objRestaurant->categoryNew();
}


$objSmarty->assign("resid", $resid);
$objSmarty->assign("objRestaurant", $objRestaurant);


#.............................................................................................
#SMARTY ASSIGNING
$objSmarty->assign('objSite', $objSite);
//$objSmarty->display('restaurantOwnerMyaccount.tpl');
$main_content = $objSmarty->fetch('restaurantOwnerMyaccount_categoryAddEdit.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('restaurantOwnerMyaccount.tpl');

?> 