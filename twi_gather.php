<?php
include("includes/config.inc.php");
global $CFG;
#Offline
$objSite->siteOfflineStaus();
#Language
$objSite->languageSession();
//$phoneno= '+001'.$_SESSION['cusNum'];
//$phoneno= '+1'.$_SESSION['cusNum'];
$phoneno= COUNTRY_CODE.$_SESSION['cusNum'];
$orderid= $objSite->filterInput($_SESSION['orderid']);

$user_pushed = (int) $_REQUEST['Digits'];	


$ordergenid = $objSite->generateId($_SESSION['orderid']);
$finalorderid = "ORD" . $ordergenid;

if(isset($_SESSION['cusNum'])){

header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

$fax_confirmation_num = $objSite->getValue("fax_confirmation_num", $CFG['table']['order'],"orderid = '" . $orderid . "'");

$callCount = $objSite->getValue("twillo_callCount",$CFG['table']['order'], "orderid = '".$orderid."' ");



?>

<?
if(isset($user_pushed) && !empty($user_pushed) ){

    if ($user_pushed == $fax_confirmation_num){
    ?>
    <Response>
    <Say voice="woman">Your Order Rejected.</Say>
    </Response>
    
    <?php 
    
    require_once dirname(__FILE__) . '/includes/classes/Services/Twilio.php';
            $sid      = "AC23575e0350087da5c864f1ceeec3ff68";// Your Account SID from www.twilio.com/user/account
            $token    = "7839cf270546bc0a76ff3a64cde30d61"; // Your Auth Token from www.twilio.com/user/account
            $client = new Services_Twilio($sid, $token);
            $message = $client->account->messages->sendMessage(
              '+13603287748', // From a valid Twilio number
              $phoneno, // Text this number
              "Your Order ".$finalorderid." now accepted, Thanks for Order "
            );
        $updqry =  "UPDATE ".$CFG['table']['order']." SET status = 'processing', twillo_call_status = 'Yes' WHERE orderid = '".$orderid."' ";
    	$res    = $objSite->ExecuteQuery($updqry, "update");   
        
        unset($_SESSION['cusNum']);
        unset($_SESSION['orderid']); 
            
      } 
    else {  
                               
            
                ?>
                <Response>
                <Say voice="woman">Your Order Rejected.</Say>
                </Response>
                <?php 
                                 
                $updqry =  "UPDATE ".$CFG['table']['order']." SET status = 'failed',  twillo_call_status = 'Yes' WHERE orderid = '".$orderid."' ";
            	$res    = $objSite->ExecuteQuery($updqry, "update");    
                
                //$updqry1 =  "UPDATE ".$CFG['table']['order']." SET twillo_call_status = 'Yes' WHERE orderid = '".$orderid."' ";
            	//$res1    = $objSite->ExecuteQuery($updqry1, "update");  
            
            
            /*if(isset($_SESSION['cusNum']) && !empty($_SESSION['cusNum']) ){
                unset($_SESSION['cusNum']);
            }
            if(isset($_SESSION['orderid']) && !empty($_SESSION['orderid']) ){
                unset($_SESSION['orderid']);
            }*/
            
            /*else{
                 ?>
                <Response>
                <Say voice="woman">Confirmation number was wrong.</Say>
                </Response>
                <?php 
                
                $objSite->callSmsOrder($orderid);
            }*/
            
        //unset($_SESSION['cusNum']);
        //unset($_SESSION['orderid']);  
            
       } 
   }else{
    #Call Order Process
       
       $objSite->callSmsOrder($orderid);
       
   }
    
} 
 ?>

