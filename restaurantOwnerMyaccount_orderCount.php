<?php

//Order Pending Alert Tone
$alerttone = $objSite->getValue("pending_order_alert", $CFG['table']['restaurant'], "restaurant_id = '" . $objSite->filterInput($_SESSION['restaurantownerid']) . "'");
$objSmarty->assign("Alert", $alerttone);
//Number of pending order
$pending_ord = $objSite->getNumvalues($CFG['table']['order'],"status = 'pending' AND restaurant_id = '" . $objSite->filterInput($_SESSION['restaurantownerid']) ."' ");
$objSmarty->assign("Pending", $pending_ord);

//Number of processing order
$processing_ord = $objSite->getNumvalues($CFG['table']['order'],"status = 'processing' AND restaurant_id = '" . $objSite->filterInput($_SESSION['restaurantownerid']) ."' ");
$objSmarty->assign("Processing", $processing_ord);
 

?> 