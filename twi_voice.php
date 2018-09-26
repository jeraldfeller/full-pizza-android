<?php

include("includes/config.inc.php");
global $CFG;
session_start();
#Offline
$objSite->siteOfflineStaus();
#Language
$objSite->languageSession();
//echo (int) $_REQUEST['Digits'];
//$callsms1 = fopen((dirname(__FILE__))."/includes/allsms1.log", "a+"); 

    header('Content-type: text/xml');
        
    $_SESSION['cusNum']     = $_GET['cusNum'];
    $_SESSION['orderid']    = $_GET['orderid'];
    $_SESSION['site_phone'] =  $_GET['site_phone'];
    //$_SESSION['resphone']   =  $_GET['resphone'];
   // $_SESSION['admin_email']   =  $_GET['admin_email'];
   // $_SESSION['res_email']     =  $_GET['res_email'];echo '<Dial>+919597292612</Dial>';   
    
    $ordergenid = $objSite->generateId($_SESSION['orderid']);
    $finalorderid = "ORD" . $ordergenid;
    
        if($_GET['callcount'] <= 3){
        
        	echo '<?xml version="1.0" encoding="UTF-8"?>';
        
        	echo '<Response>';
        
            echo '<Gather action="twi_gather.php" numDigits="3" method="POST">';
        
            echo '<Say voice="alice">Now you got order from ComeneatPlatinum V2 dot com site. Your order is </Say>';
            
            echo '<Say> '.$finalorderid.'</Say>';
          
            echo '<Say voice="alice">If you want to accept this order mean please enter your confirmation number.</Say>';
            
            echo '<Pause length="7"/>';
            
            echo '</Gather>';    
            
            echo '<Enqueue>support</Enqueue>';        
                             
            echo '</Response>';
          
          }
  
?>
