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
//Order Pending Alert Tone
$alerttone = $objSite->getValue("pending_order_alert", $CFG['table']['restaurant'],"restaurant_id = '" . $objSite->filterInput($_SESSION['restaurantownerid']) . "'");
$objSmarty->assign("Alert", $alerttone);
//Number of pending order
$pending_ord = $objSite->getNumvalues($CFG['table']['order'],"status = 'pending' AND restaurant_id = '" . $objSite->filterInput($_SESSION['restaurantownerid']) ."' AND paypal_status = 'success'");
$objSmarty->assign("Pending", $pending_ord);

//Number of processing order
$processing_ord = $objSite->getNumvalues($CFG['table']['order'],"status = 'processing' AND restaurant_id = '" . $objSite->filterInput($_SESSION['restaurantownerid']) ."' AND paypal_status = 'success'");
$objSmarty->assign("Processing", $processing_ord);
#.............................................................................................
#echo "<pre>222";print_r($_SESSION);echo "</pre>";
#echo "<pre>";print_r($_FILES);echo "</pre>";

$resid = $objSite->filterInput($_SESSION['restaurantownerid']);

if (isset($_GET['menuid']) && !empty($_GET['menuid'])){
    
    $menuid = $_GET['menuid'];
    if (isset($_POST['action']) && ($_POST['action'] == "Edit"))
    {
        $objRestaurant->restaurantMenuEdit();
    } 
    $objRestaurant->restaurantEditMenuOption($menuid);
    
    #For Addons
    $sizeopt	=	$objSite->getShowMenuPriceDet($menuid);  
	$objSite->getShowPizzaSizeoption($sizeopt['0']['menu_category'],$sizeopt['0']['maincat_option']);
	$objSite->getShowAddonsList($sizeopt['0']['menu_category'],$objSite->filterInput($_SESSION['restaurantownerid']));
	$objSmarty->assign('menuid',$menuid);
}
if (isset($_POST['action']) && ($_POST['action'] == "Add"))
{
    $objRestaurant->restaurantMenuAdd();
}

$objSite->getShowCuisineList();
$objSite->getShowCategoryList_res($resid);

$objSmarty->assign("resid", $resid);
$objSmarty->assign("objRestaurant", $objRestaurant);

#--------------------------------------------------------------------------

#.............................................................................................
#SMARTY ASSIGNING
$objSmarty->assign('objSite', $objSite);
//$objSmarty->display('restaurantOwnerMyaccount.tpl');
$main_content = $objSmarty->fetch('restaurantOwnerMyaccount_menuAddEdit.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('restaurantOwnerMyaccount.tpl');

?> 