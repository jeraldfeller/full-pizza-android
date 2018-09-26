<?php
include ("includes/config.inc.php");
//----------------------------------------------------------------

switch($_REQUEST['action']) {
    
    case ('AllStateCity'):
        $sel_state  = $objSite->getMultiValue("state_id, statecode, statename",$CFG['table']['state'],"statename != '' AND state_status = '1' AND statecode != ''");
    
        if(isset($sel_state) && is_array($sel_state)){
            foreach($sel_state as $key=>$value){
                $sel_state[$key]['city']    = $objSite->getMultiValue("city_id, statecode, cityname",$CFG['table']['city'],"cityname != '' AND city_status = '1' AND statecode = '".$sel_state[$key]['statecode']."'"  );
            }
        }
        $sel_state = json_decode(html_entity_decode((json_encode($sel_state, JSON_HEX_APOS | JSON_UNESCAPED_SLASHES))), true);
        
        
    	if($sel_state) {
        	$response['status']     = 1;
            $response['statecity']  = $sel_state;
    	} else {
        	$response['status']   = 0;
            $response['message']  = 'Can not found state and cities';
    	}
        echo json_encode($response, true);
        break;
     
    case ('CuisineList'):
    
        $cuisineList = $objSite->getMultiValue("cuisine_id, cuisine_name",$CFG['table']['cuisine'],"cuisine_status = '1' ");
        if($cuisineList) {
        	$response['status']     = 1;
            $response['cuisinelist']  = $cuisineList;
    	} else {
        	$response['status']   = 0;
            $response['message']  = 'Can not found Cuisine List';
    	}
        echo json_encode($response, true);
        break;
        
    case ('terms_condition'):
        $terms = $objSite->getValue("content", $CFG['table']['content'], "content_id = '2' AND status = '1'");
        $response['status']             = 1;
        $response['terms_condition']    = $terms;
        echo json_encode($response);
        break;
    
    case ('cardPayment') :
	    list($stripe, $msg) = $objSite->payment_stripe_payment();
        if($msg == 'paid') {
            $response['status']          = 1;
            $response['message']         = 'Payment Success';
            $response['transaction_id']  = $stripe;
        } else {
            $response['status']    = 0;
            $response['message']    = $stripe;
        }
        echo json_encode($response, true);
        break;
        
    #Coupon code process
    case ('couponcode'): 
     
        $couponCode     = $_REQUEST['couponcode'];
        $resid          = $_REQUEST['resid'];
        $customerid     = $_REQUEST['userid'];
        
        if($couponCode != ''){
             $voucherDet = $objSite->voucherDetailByCode($resid,$couponCode);
        }
        
        if ($voucherDet != 'Not Avail') {
            if ($customerid && $voucherDet[0]['use_type'] == 'S') {
                //Get existing used voucher 
                $existUse = $objSite->getNumvalues($CFG['table']['order'],"customer_id = '".$customerid."' AND voucher_id = '".$voucherDet[0]['id']."'");
                if ($existUse == 0) {
                    $response['status']    = 1;
                    $response["coupon_price"]    = $voucherDet;
                    $response["message"]    = 'Coupon added successfully';
                }else{
                    $response['status']    = 0;
                    $response['message']  = 'Already Used';
                }
            } else {
                    $response['status']    = 1;
                    $response["coupon_price"]    = $voucherDet;
                    $response["message"]    = 'Coupon added successfully';
            }                
        } else {
                $response['status']    = 0;
                $response['message']    = 'This voucher code not available now..!';
        }
        echo json_encode($response,true);
        break; 
    
            
    default:
        $response['status']     = 0;
        $response['message']    = 'Required fields are missing';
        echo json_encode($response, true);
        break;
 }




    
//----------------------------------------------------------------
?>