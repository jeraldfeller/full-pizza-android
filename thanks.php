<?php 
include("includes/config.inc.php");
error_reporting(E_ERROR | E_PARSE);
#Offline
$objSite->siteOfflineStaus();
#Language
$objSite->languageSession();

$objSearchDetails	= new SearchDetails;
#.............................................................................................
//echo "<pre>";print_r($_REQUEST);echo "</pre>";
//echo "<pre>";print_r($_GET);echo "</pre>";
#echo "<br>de-->".base64_decode($_GET['orderid']);
//exit;
//echo "<pre>";print_r($_SESSION);echo "</pre>";

	#$resessionid = $_SESSION['resessionid'];
	#$gprs = $objSite->getValue("gprs_option",$CFG['table']['restaurant'],"restaurant_id = ".$_SESSION['orderresid']."");
    #$objSmarty->assign('gprsoption',$gprs);
	//Paypal
	if(isset($_GET['action']) && $_GET['action']=="buyProdSucc")
	{
		
		if( isset($_POST['txn_id']) && !empty($_POST['txn_id']) &&  $_POST['mc_gross']== $_POST['payment_gross'] ){
		
			$paymentid = base64_decode($objSite->filterInput($_GET['paymentId']));
			$transactionId = $objSite->filterInput($_POST['txn_id']);
			$lastorderid = base64_decode($objSite->filterInput($_GET['orderid']));
			$objCheckout	= new Checkout;
			$objCheckout->updatePaypalPaySuccess($paymentid, $transactionId,$lastorderid);
			
		}
		$objSearchDetails->orderDetailsList(base64_decode($objSite->filterInput($_GET['orderid'])));
		
		//$getorderid = $objSite->getValue("orderid",$CFG['table']['payment'],"payment_id = '".$paymentid."' ");
		//$objSearchDetails->orderDetailsList($getorderid);
		
	}
	//Credit Card
	elseif( isset($_POST['USER1']) && ($_POST['USER1']=='creditcard') ){
	   
		if( $_REQUEST['RESULT'] == 0 && $_REQUEST['RESPMSG']=='Approved' ){
			$objCheckout	= new Checkout;
			$objCheckout->updateCreditCardSuccess();
		}else{
			$objSmarty->assign("respmsg", $_POST['RESPMSG']);
		}
	}
    #Ideal
    elseif( isset($_GET['action']) && $_GET['action']=="Ideal" ){
        
        $rtlo=75263;
        // De consument komt vanaf de bank terug op de returnurl. 
        // Hier controleren we de transactiestatus
        if( isset($_GET['ec']) && isset($_GET['trxid'])){
              // 000000 OK betekent succesvol. We kunnen het product leveren
            if(($status = $objSite->CheckReturnurl( $rtlo,  $objSite->filterInput($_GET['trxid'] )))=="000000 OK" ){
                
               // Voeg hier programmacode toe om de orderstatus bij te werken.
               $objSearchDetails->orderDetailsList($objSite->filterInput($_GET['orderid']));
               die( "Status was Successful...<br>Thank you for your order" );
            }
            // Bij alle  andere statussen producten niet leveren 
            // Voeg hier zelf programmacode toe om de status bij te werken
            else{
               $objSite->orderDetailsList_failure($objSite->filterInput($_GET['orderid'])); 
               //$objSite->redirectUrl("index.php");
               //die( $status );
            }
        }
        
        // De reporturl wordt vanaf de Targetpay server aangeroepen
        if ( isset($_POST['rtlo'])&&isset($_POST['trxid'])&& isset($_POST['status'])) {
          $objSite->HandleReporturl($objSite->filterInput($_POST['rtlo']), $objSite->filterInput($_POST['trxid']), $objSite->filterInput($_POST['status']) );
        }
    }
    //Cash on Delivery
	elseif(isset($_GET['orderid']) && !empty($_GET['orderid'])){
		#Menu Cart Order Details
		$objSearchDetails->orderDetailsList(base64_decode($objSite->filterInput($_GET['orderid'])));
	}
    else{
		$objSite->redirectUrl("index.php");
	}
 #call+sms order process start
//$objSite->callSmsOrder($noworderid);
$lastorderid1 = base64_decode($_GET['orderid']);
$objSite->dispatchSystemOrder($lastorderid1);
$objSmarty->assign("lastorderid",$lastorderid1);	
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('thanks.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');
?>