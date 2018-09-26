<?php
include ("includes/config.inc.php");
//----------------------------------------------------------------

switch($_REQUEST['action']) {
    
    #Customer Login
    case ('login') :
        if(isset($_POST["email"])&&($_POST["password"])){
	
		$email    =  trim($_POST["email"]);
		$password =  trim($_POST["password"]);
		
		//Check user name and password 
        $User_details   = $objSite->getMultiValue("customer_id, customer_name, customer_password, status", $CFG['table']['customer'],"customer_email = '" . $email . "' ");
        $db_pass        = $User_details['0']['customer_password'];
        $cuspass        = $password;
        #Customer Status Check
        if($objSite->validate_password($cuspass, $db_pass)){
            $userid     = $User_details[0]['customer_id'];
            switch($User_details[0]['status']) {
                case ('0') :
                    $response["status"]     = 0;
        			$response["message"]    = "Your account was deactivate.";
                    
                case ('2') :
                    $response["status"]     = 0;
        			$response["message"]    = "Your account is waiting for activation.";
                    
                default :
                    $response["status"]     = 1;
        			$response["userid"]     = $userid;
                    $response['username']   = $User_details[0]['customer_name'];
        			$response["message"]    = "Login successfully";
                break;
            }
        }else{
            $response["status"]     = 0;
			$response["message"]    = "Check username and password";
        }
        echo json_encode($response, true);
	}
    break;
    
    #Forgot Password
    case ('forgotPassword') :
        if(!empty($_REQUEST['forgetemail']) && $_REQUEST['action'] == 'forgotPassword'){  
    	    global $CFG;
    
            $email = $objSite->My_addslashes($_REQUEST['forgetemail']);
    
            $userdetails = $objSite->GetMultivalue("customer_name,customer_lastname,customer_email,customer_password,status,delete_status", $CFG['table']['customer'], "customer_email = '" . $email . "' ");
            if (count($userdetails[0]['customer_password']) > 0 && count($userdetails[0]['customer_password']) != 0){
                
                if ($userdetails[0]['delete_status'] == 'No'){
                    
                    switch ($userdetails[0]['status']) {
                        case ('1') :
                            $customername = $userdetails[0]['customer_name'].' '.$userdetails[0]['customer_lastname'];
                        
                            $toemail = $_REQUEST['forgetemail'];
                            
                            $active_link = $CFG['site']['main_base_url'] . "/customerResetPassword.php?ui=" . base64_encode($toemail);
                            
                            $password = '   <tr>
                                                	<td style="font-family:Verdana,Arial;font-size:12px;padding:0px 0px 0px 10px;color:#727171">Please <a target="_blank" style="color:#005fa8" href="'.$active_link.'">
                            <b>Click Here</b> 
                            </a> to reset your account password.</td>
                            				</tr>';
                            
                            $mailsubject = $CFG['site']['sitedomain'] . ": " . $CFG['site']['sitename'] . " Forgot Password Account information ";
                            $mail_content = $objSite->readfilecontent($CFG['site']['email_path'] . "/emailForgotPassword.html");
                            $mail_content = str_replace('{SITE_URL}', $CFG['site']['main_base_url'], $mail_content);
                            $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
                            $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
                            $mail_content = str_replace('{USEREMAIL}', $toemail, $mail_content);
                            $mail_content = str_replace('{PASSWORD}', $password, $mail_content);
                            $mail_content = str_replace('{CUSNAME}', $customername, $mail_content);
                            $ok = $objSite->sendMail($CFG['site']['sitename'], $CFG['site']['adminemail'], $toemail,$mailsubject, $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');
                            if ($ok){
                                $response['status']    = 1;
                                $response['message']    = 'Reset password link sent to your registered mail';
                            }
                            break;
                            
                        case ('2') :
                            $response['status']    = 0;
                            $response['message']    = 'Your account is waiting for activation';
                            break;
                        
                        default :
                            $response['status']    = 0;
                            $response['message']    = 'Your account was deactivated';
                            break;
                    }
                     
                } elseif ($userdetails[0]['delete_status'] == 'Yes'){
                    $response['status']    = 0;
                    $response['message']    = 'Your account was deleted';
                }
            } else {
                $response['status']    = 0;
                $response['message']    = 'Your email is not registered with us';
            }
        }   
        echo json_encode($response, true);
        break; 
        
        #FB Login
        case ('FBLogin') :
           $firstname = addslashes(trim($_REQUEST['first_name']));
           $lastname  = addslashes(trim($_REQUEST['last_name']));
           $email     = trim($_REQUEST['email']);
           
           $num_customer = $objSite->getNumValues($CFG['table']['customer'],"customer_email = '" . $email . "' AND ( status ='1' OR status = '2' ) ");
            if ($num_customer > 0){
                $customerId = $objSite->getValue("customer_id", $CFG['table']['customer'],"customer_email = '" . $email . "' ");
                
                $response['status']    = 1;
                $response["userid"]     = $customerId;
                $response['username']   = $firstname;
                $response['message']    = 'Login successfully';
            }else{
                $customerpassword = rand();
                $cuspass = $objSite->encrypt_password_md5($customerpassword);
                $ins_cus = "INSERT INTO 
    								" . $CFG['table']['customer'] . "
    						    SET
    						    	customer_name  			= '" . $firstname . "',
    						    	customer_lastname		= '" . $lastname . "',
    						    	customer_email  		= '" . $email . "',
    						    	customer_password  		= '" . $cuspass . "',
    						    	status					= '1',
    						    	addeddate               = '" . CUR_TIME . "' ";
                $res_cus = $objSite->ExecuteQuery($ins_cus, 'insert');
                if($res_cus){
                    $toemail  = $email;
        			$active_link  = $CFG['site']['base_url']."/login.php?ui=".base64_encode($toemail);
        			
        			$mailsubject  = $CFG['site']['sitedomain'].": ".$CFG['site']['sitename']." Customer Register";
        			$mail_content = $objSite->readfilecontent($CFG['site']['email_path']."/emailCustomerRegister.html");
        			$mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
        	        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['sitename'],$mail_content);
        	        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
        	        $mail_content = str_replace('{SITE_DOMAIN}',$CFG['site']['sitedomain'],$mail_content); 
        	        $mail_content = str_replace('{CUSTOMER_EMAIL}',$email,$mail_content);
        	        $mail_content = str_replace('{CUSTOMER_PASSWORD}',$customerpassword,$mail_content);
        	        $mail_content = str_replace('{ACTIVATION_LINK}',$active_link,$mail_content);
        	        
        	        $ok = $objSite->sendMail($CFG['site']['sitename'],$CFG['site']['adminemail'],$toemail,$mailsubject,$mail_content,  $mail_attachment_name = '', $mail_attachment_content = '');
        	        if($ok){
        				$to_email  = $CFG['site']['adminemail'];
        				
        				$mailsubject  = $CFG['site']['sitedomain'].": ".$CFG['site']['sitename']." Customer Register";
        				$mail_content = $objSite->readfilecontent($CFG['site']['email_path']."/emailCustomerRegisterSendadmin.html");
        				$mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
        		        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['sitename'],$mail_content);
        		        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
        		        $mail_content = str_replace('{SITE_DOMAIN}',$CFG['site']['sitedomain'],$mail_content);
        		        $mail_content = str_replace('{CUSTOMER_NAME}',$firstname." ".$lastname,$mail_content);
        		        $mail_content = str_replace('{CUSTOMER_PHONE}','',$mail_content);
        		        $mail_content = str_replace('{CUSTOMER_STREETADDRESS}','',$mail_content);
        		        $mail_content = str_replace('{CUSTOMER_CITY}','',$mail_content);
        		        $mail_content = str_replace('{CUSTOMER_STATE}','',$mail_content);
        		        $mail_content = str_replace('{CUSTOMER_EMAIL}',$email,$mail_content);
        		        $ok = $objSite->sendMail($firstname,$email,$to_email,$mailsubject,$mail_content,  $mail_attachment_name = '', $mail_attachment_content = '');
        			}
                    $response['status']    = 1;
                    $response["userid"]     = $res_cus;
                    $response['username']   = $firstname;
                    $response['message']    = 'Login successfully';
                }
            }
            echo json_encode($response, true);
            break;
            
        #Customer Register
        case ('register') :
            if($_POST["firstname"] && $_POST["lastname"] && $_POST["email"] && $_POST["password"] && $_POST["mobile"])
        	{
            	$firstname     = addslashes($_POST["firstname"]);
            	$lastname      = addslashes($_POST["lastname"]);
            	$email         = $_POST["email"];
            	$password      = $_POST["password"];
            	$mobile        = $_POST["mobile"];
                #Check Customer Exist Or Not
                $exist_cus     = $objSite->getNumvalues($CFG['table']['customer'],"customer_email = '".$email."'");
            
                if($exist_cus == '0'){
                    $cuspass   = $objSite->encrypt_password_md5($password);
                    $sessionid = session_id();
                    $ins_cus   = "INSERT INTO 
            								" . $CFG['table']['customer'] . "
            						    SET
            						    	customer_name  			= '" . $firstname . "',
            						    	customer_lastname		= '" . $lastname . "',
            						    	customer_phone  		= '" . $mobile . "',
            						    	customer_email  		= '" . $email . "',
            						    	customer_password  		= '" . $cuspass . "',
            						    	addeddate   			= '" . CUR_TIME . "',
            								last_logged 			= '" . CUR_TIME . "',
            								logged_in   			= '1',
            								status		   			= '1',
            								last_active 			= '" . CUR_TIME . "', 
            								ip          			= '" . $_SERVER['REMOTE_ADDR'] . "',
            								session     			= '" . $sessionid . "' ";
                    $res_cus = $objSite->ExecuteQuery($ins_cus, 'insert');
                    if($res_cus){
                        $toemail  = $email;
            			$active_link  = $CFG['site']['base_url']."/login.php?ui=".base64_encode($toemail);
            			
            			$mailsubject  = $CFG['site']['sitedomain'].": ".$CFG['site']['sitename']." Customer Register";
            			$mail_content = $objSite->readfilecontent($CFG['site']['email_path']."/emailCustomerRegister.html");
            			$mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
            	        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['sitename'],$mail_content);
            	        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
            	        $mail_content = str_replace('{SITE_DOMAIN}',$CFG['site']['sitedomain'],$mail_content); 
            	        $mail_content = str_replace('{CUSTOMER_EMAIL}',$email,$mail_content);
            	        $mail_content = str_replace('{CUSTOMER_PASSWORD}',$password,$mail_content);
            	        $mail_content = str_replace('{ACTIVATION_LINK}',$active_link,$mail_content);
            	        
            	        $ok = $objSite->sendMail($CFG['site']['sitename'],$CFG['site']['adminemail'],$toemail,$mailsubject,$mail_content,  $mail_attachment_name = '', $mail_attachment_content = '');
            	        if($ok){
            				$to_email  = $CFG['site']['adminemail'];
            				
            				$mailsubject  = $CFG['site']['sitedomain'].": ".$CFG['site']['sitename']." Customer Register";
            				$mail_content = $objSite->readfilecontent($CFG['site']['email_path']."/emailCustomerRegisterSendadmin.html");
            				$mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
            		        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['sitename'],$mail_content);
            		        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
            		        $mail_content = str_replace('{SITE_DOMAIN}',$CFG['site']['sitedomain'],$mail_content);
            		        $mail_content = str_replace('{CUSTOMER_NAME}',$firstname." ".$lastname,$mail_content);
            		        $mail_content = str_replace('{CUSTOMER_PHONE}',$mobile,$mail_content);
            		        $mail_content = str_replace('{CUSTOMER_STREETADDRESS}','',$mail_content);
            		        $mail_content = str_replace('{CUSTOMER_CITY}','',$mail_content);
            		        $mail_content = str_replace('{CUSTOMER_STATE}','',$mail_content);
            		        $mail_content = str_replace('{CUSTOMER_EMAIL}',$email,$mail_content);
            		        $ok = $objSite->sendMail($firstname,$email,$to_email,$mailsubject,$mail_content,  $mail_attachment_name = '', $mail_attachment_content = '');
            			}
                        $response["status"] = 1;
                		$response["message"] = "Registered successfully, please check your mail for activation";
                    } else {
                        $response["status"] = 0;
                		$response["message"] = "Can't insert";
                    }
                } else {
                    $response["status"] = 0;
            		$response["message"] = "Email already exist";
                }
        	}
            echo json_encode($response, true);
            //echo "Prueba repetido";
            break;
         
        #Get Profile Details  
        case ('getProfile') :
            $userid = trim($_REQUEST['userid']);
            if($userid != '') {
                $sel_profile = "SELECT customer_name, customer_lastname, customer_email, customer_phone, customer_crossstreet, customer_buildtype, customer_buildtype, customer_landmark, customer_city, customer_zip, customer_state  FROM ".$CFG['table']['customer']." WHERE customer_id = '".$userid."'";
        		$res_profile = $objSite->ExecuteQuery($sel_profile,'select');
                if(!empty($res_profile)){
                    $response["status"]     = 1;
        			$response["firstname"]  = stripslashes($res_profile[0]['customer_name']);
        			$response["lastname"]   = stripslashes($res_profile[0]['customer_lastname']);
        			$response["email"]      = $res_profile[0]['customer_email'];
        			$response["mobile"]     = $res_profile[0]['customer_phone']; 
                } else {
                    $response['status']     = 0;
                    $response['message']    = 'You have an empty profile';
                }
            } else {
                $response['status']     = 0;
                $response['message']    = 'Required fields are missing';
            }
            echo json_encode($response, true);
            break;
            
        #Update User Profile   
        case ('updateuser'):
            $userid     = trim($_REQUEST['userid']);
            if($userid != '') {
                $firstname  = mysql_real_escape_string(trim($_REQUEST["firstname"]));
        		$lastname   = mysql_real_escape_string(trim($_REQUEST["lastname"]));
        		$email      = trim($_REQUEST["email"]); 
        		$mobile     = trim($_REQUEST["mobile"]);
                #Check Email Exist Or Not
                $mail_num   = $objSite->getNumvalues($CFG['table']['customer'],"customer_email = '".$email."' AND customer_id != '".$userid."'");
                if($mail_num == '0'){
                    $upd_profile = "UPDATE 
        								".$CFG['table']['customer']." 
        							SET 
        								customer_name   	= '".$firstname."',
        								customer_lastname	= '".$lastname."',
        								customer_email  	= '".$email."',
        								customer_phone  	= '".$mobile."'
        							WHERE 
                                        customer_id         = '".$userid."' ";
        	       $res_profile = $objSite->ExecuteQuery($upd_profile,'update');
                   if($res_profile){
                        $response['status']    = 1;
                        $response['message']    = 'Update successfully';
                   } else {
                        $response['status']    = 0;
                        $response['message']    = 'No changes in your profile';
                   }
                } else {
                    $response['status']    = 0;
                    $response['message']    = 'E-mail already exist';
                }
            } else {
                $response['status']    = 0;
                $response['message']    = 'Required fields are missing';
            }
            echo json_encode($response, true);
            break;
            
        #Change Password
        case ('changepassword'):
            $userid         = trim($_POST['userid']);
            $newpassword    = $objSite->encrypt_password_md5($_POST["newpassword"]);
            if($userid != '' && $newpassword != '') {
                $sql_ups = "UPDATE " . $CFG['table']['customer'] . " SET customer_password = '" . $newpassword . "' WHERE customer_id='" . $userid . "' ";
                $res_ups = $objSite->ExecuteQuery($sql_ups, 'update');
                if($res_ups){
                    $response["status"]  = 1;
        			$response["message"] = "Password changed successfully";
                } else {
                    $response["status"]  = 0;
        			$response["message"] = "Update failed";
                }
            } else {
                $response['status']     = 0;
                $response['message']    = 'Required fields are missing';
            }
            echo json_encode($response, true);
            break;
         
        #Customer Address List   
        case ('addressList'):
            $cusid   = trim($_REQUEST['cusid']);

            if($cusid != '') {
                #Get Customer's address list
                $address_list   = $objSite->addressbooklist($cusid);
                
                if(!empty($address_list)){
                    $response['status']     = 1;
                    $response['Address']    = $address_list;
                } else {
                    $response['status']     = 0;
                    $response['message']    = 'No address found';
                }
            } else {
                $response['status']     = 0;
                $response['message']    = 'Required fields are missing';
            }
            echo json_encode($response, true);
            break;

        #Add the Customer's Address   
        case ('addAddress'):
            $cusid    = trim($_REQUEST['cusid']);
            if($cusid != '') {
                $address_title  = addslashes(trim($_REQUEST['address_title']));
                $building       = addslashes(trim($_REQUEST['building']));
                $street         = addslashes(trim($_REQUEST['street']));
                $landmark         = addslashes(trim($_REQUEST['landmark']));
                $latitude         = addslashes(trim($_REQUEST['lat']));
                $longitude         = addslashes(trim($_REQUEST['long']));
                $state          = $objSite->getValue("statecode",$CFG['table']['state'],"statename = '".addslashes($_POST['state'])."'  AND state_status = '1'");
                $city           = $objSite->getValue("city_id",$CFG['table']['city'],"cityname = '".addslashes($_POST['city'])."'");
                $zip            = trim($_REQUEST['zip']);
                
                $ins_add    = "INSERT INTO
                                            ".$CFG['table']['customer_addressbook']."
                                        SET
                                            customer_id             = '".$cusid."',
                                            customer_apartment_name = '".$building."',
                                            customer_street         = '".$street."',
                                            customer_address_title  = '".$address_title."',
                                            customer_state          = '".$state."',
                                            customer_city           = '".$city."',
                                            customer_zip            = '".$zip."',
                                            customer_landmark       = '".$landmark."',
                                            customer_longitude      = '".$longitude."',
                                            customer_latitude       = '".$latitude."',
                                            added_date              = '".CUR_TIME."'";
                $res_add    = $objSite->ExecuteQuery($ins_add,'insert');
                if($res_add){
                    $response['status']     = 1;
                    $response['message']    = 'Address added successfully';
                } else {
    				$response['status']     = 0;
                    $response['message']    = 'Can not add into server please try again';
    			}
            } else {
                $response['status']     = 0;
                $response['message']    = 'Required fields are missing';
            }
            echo json_encode($response, true);
            break;
            
        #Update the Customer's Address
        case ('updateAddress'):
            $cusid     = trim($_REQUEST['cusid']);
            $add_id    = trim($_REQUEST['addressid']);
            if($cusid != '' && $add_id != '') {
                $address_title  = addslashes(trim($_REQUEST['address_title']));
                $building       = addslashes(trim($_REQUEST['building']));
                $street         = addslashes(trim($_REQUEST['street']));
                $landmark       = addslashes(trim($_REQUEST['landmark']));
                $latitude       = addslashes(trim($_REQUEST['lat']));
                $longitude      = addslashes(trim($_REQUEST['long']));
                $state          = $objSite->getValue("statecode",$CFG['table']['state'],"statename = '".$_POST['state']."' AND state_status = '1'");
                $city           = $objSite->getValue("city_id",$CFG['table']['city'],"cityname = '".$_POST['city']."'");
                $zip            = trim($_REQUEST['zip']);
                
                $up_add     = "UPDATE
                                     ".$CFG['table']['customer_addressbook']."
                                SET
                                    customer_apartment_name = '".$building."',
                                    customer_street         = '".$street."',
                                    customer_address_title  = '".$address_title."',
                                    customer_state          = '".$state."',
                                    customer_city           = '".$city."',
                                    customer_landmark       = '".$landmark."',
                                    customer_longitude      = '".$longitude."',
							        customer_latitude       = '".$latitude."',
                                    customer_zip            = '".$zip."'
                              WHERE
                                    id = '".$add_id."' AND  customer_id = '".$cusid."'";
                $res_up_add = $objSite->ExecuteQuery($up_add,'update');
                if($res_up_add){
                    $response['status']     = 1;
                    $response['message']    = 'Address updated successfully';
                } else {
                    $response['status']     = 0;
                    $response['message']    = 'There are no changes in your address';
                }
            } else {
                $response['status']     = 0;
                $response['message']    = 'Required fields are missing';
            }
            echo json_encode($response, true);
            break;
            
        #Change customer address status
        case ('changeAddressStatus'):
            $add_id     = trim($_REQUEST['address_id']);
            $value      = trim($_REQUEST['status']);
            if($add_id != '' && $value != '') {
                $table      = 'rt_customer_addressbook';
                $field      = 'status';
                $condition  = "id = '".$add_id."'";
                
                $res        = $objSite->change_status($table,$field,$value,$condition);
                if($res){
                    $response['status']     = 1;
                    $response['message']    = 'Address status changed successfully';
                } else {
                    $response['status']     = 0;
                    $response['message']    = 'Failed to change status';
                }
            } else {
                $response['status']     = 0;
                $response['message']    = 'Required fields are missing';
            }
            echo json_encode($response, true);
            break;
            
        #Delete the Customer Address
        case ('deleteAddress'):
            $add_id     = trim($_REQUEST['address_id']);
            $add_id     = trim($_REQUEST['address_id']);
            $table      = 'rt_customer_addressbook';
            $condition  = "id = '".$add_id."'";
            if($add_id != ''){
                $res_del    = $objSite->delete_record($table,$condition);
                if($res_del){
                    $response['status']     = 1;
                    $response['message']    = 'Address deleted successfully';
                }else{
                    $response['status']     = 0;
                    $response['message']    = 'Address not delete';
                }
            } else {
                $response['status']     = 0;
                $response['message']    = 'Required fields are missing';
            }
            echo json_encode($response, true);
            break;
            
        #Order List
        case ('orderList'):
            $cusid  = trim($_REQUEST['cusid']);
            #Select Order Lists
            if($cusid != ''){
                $sel_ord    = "SELECT orderid, restaurant_id, ordergenerateid, ordertotalprice, payment_type, deliverydate, deliverytime, deliverytype, status, orderdate FROM ".$CFG['table']['order']." WHERE customer_id = '".$cusid."' AND paypal_status = 'success' ORDER BY orderid DESC ";
                $res_ord    = $objSite->ExecuteQuery($sel_ord,'select');
                if(!empty($res_ord)){
                    $response['status']         = 1;
                    $response['orders_List']     = $res_ord;
                }else{
                    $response['status']     = 0;
                    $response['message']    = 'No orders found';
                }
            } else {
                $response['status']     = 0;
                $response['message']    = 'Required fields are missing';
            }
            echo json_encode($response, true);
            break;
            
        #View Single Order
        case ('orderView'):
            $ord_id     = trim($_REQUEST['order_id']);
            #Select Particular Order
            if($ord_id != ''){
                $sel_order  = "SELECT orderid, restaurant_id, ordergenerateid, customername, customeremail, deliverystreet, deliverycity, deliverystate, deliveryzip, deliverydoornumber, ordertotalprice, ordersubtotal, payment_type, offervalue  AS offer_percentage, offeramount AS offer_price, taxvalue, taxamount, deliverytype, deliveryamount, foodassoonas, deliverydate, deliverytime, instructions, status, orderdate, customercellphone FROM ".$CFG['table']['order']." WHERE orderid = '".$ord_id."' AND paypal_status = 'success' ORDER BY orderid LIMIT 1 ";
                $res_order  = $objSite->ExecuteQuery($sel_order,'select');
                
                $res_order[0]['offer_price'] = ($res_order[0]['offer_percentage'] != '') ? $res_order[0]['offer_price'] : '';
                
                if(!empty($res_order)){
                    #Restaurant Details
                    $restDetails	= $objSite->GetMultivalue("restaurant_name",$CFG['table']['restaurant'],"restaurant_id = '".$res_order[0]['restaurant_id']."'");
            		if($res_order[0]['deliverytype'] != 'pickup'){
                        $deliverychargeamt = $res_order[0]['deliveryamount'];
            		}
                    
                    #Cart Details
                    //$sel_cart = "SELECT cart_id, menuid, restaurantid, menuname, menutype, addonsname, addonsprice, menuprice, quantity, specialinstruction, tot_menuprice,pizza_size, pizza_crustname, pizza_crustprice, pizza_addonsname, pizza_addons_price FROM ".$CFG['table']['restaurant_cart']." WHERE orderid = '".$ord_id."' AND quantity != '0' ";
            		
            		$sel_cart = "SELECT cart_id, menuid, restaurantid, menuname, menutype, addonsname, addonsprice, menuprice, quantity, specialinstruction, tot_menuprice,pizza_size, pizza_crustname, pizza_crustprice, pizza_addonsname, pizza_addons_price, category.maincatename AS categoria FROM ".$CFG['table']['restaurant_cart'].", ".$CFG['table']['category_main']." category, ".$CFG['table']['restaurant_menu']." menu WHERE orderid = '".$ord_id."' AND quantity != '0' AND menuid = menu.id AND menu.menu_category = category.maincateid ";
            		
            		$res_cart = $objSite->ExecuteQuery($sel_cart, "select");
            		
                    
                    $state  = $objSite->getValue("statename",$CFG['table']['state']," statecode= '".$res_order[0]['deliverystate']."'");
                    $city   = $objSite->getValue("cityname",$CFG['table']['city']," city_id= '".$res_order[0]['deliverycity']."'");
                    #Assign All Values To One Array
                    $res_order['0']['Restaurantname']    = $restDetails[0]['restaurant_name'];
                    $res_order['0']['CartDetails']       = $res_cart;
                    $res_order['0']['DeliveryCharge']    = ($deliverychargeamt > 0) ? $res_order[0]['deliveryamount'] : 0.00;
                    $res_order['0']['SubTotal']          = $res_order[0]['ordersubtotal'];
                    $res_order['0']['cus_address']       = stripcslashes($res_order[0]['deliverydoornumber']).','.stripcslashes($res_order[0]['deliverystreet']).','.$city.','.$state.' - '.stripcslashes($res_order[0]['deliveryzip']);
                    
                    $response['status']     = 1;
                    $response['Order']      = $res_order;
                }
            } else {
                $response['status']     = 0;
                $response['message']    = 'Required fields are missing';
            }
            echo json_encode($response, true);
            break;
            
        #Checkout Customer
        case ('customerAddress'):
            $cusid      = trim($_REQUEST['cusid']);
            if($cusid != '') {
                #Select Customer Details
                $sel_detail = "SELECT customer_name, customer_lastname, customer_email, customer_phone, customer_crossstreet, customer_buildtype FROM ".$CFG['table']['customer']." WHERE customer_id = '".$cusid."' LIMIT 1";
        		$res_detail = $objSite->ExecuteQuery($sel_detail,'select');
                #Customer Address List
                $res_detail[0]['Address']   = $objSite->getMultiValue("id, customer_address_title",$CFG['table']['customer_addressbook'],"customer_id = '".$cusid."'");
                if(is_array($res_detail[0]['Address']) && !empty($res_detail[0]['Address'])){
                    foreach($res_detail[0]['Address'] as $key=>$value){
                        $sel_address    = "SELECT ad.customer_id, ad.customer_apartment_name, ad.customer_landmark, ad.customer_street, ad.customer_zip, st.statename, ct.cityname ".
                                            " FROM    ".$CFG['table']['customer_addressbook']." AS ad".
                                            " LEFT JOIN ".$CFG['table']['state']." AS st ON st.statecode = ad.customer_state AND st.state_status = '1' ".
                                            " LEFT JOIN ".$CFG['table']['city']." AS ct ON ct.city_id = ad.customer_city".
                                            " WHERE ad.id = '".$res_detail[0]['Address'][$key]['id']."' ";
                        $res_detail[0]['Address'][$key]['customer_address'] = $objSite->ExecuteQuery($sel_address,'select');
                    }
                }
                $response['status']     = 1;
                $response['Customer']   = $res_detail;
            } else {
                $response['status']     = 0;
                $response['message']    = 'Required fields are missing';
            }
            echo json_encode($response, true);
            break;
            
        #Booking List
        case ('bookingList'):    
             $userid = $_REQUEST['userid']; 
             if($userid != ''){
                $sel_book = "SELECT id, bookinggenerateid, restaurant_id, customer_id, num_guests, booking_date, booking_time, booking_name, booking_email, booking_mobileno, booking_instruction, status FROM " .
                    $CFG['table']['restaurant_booking'] . " WHERE customer_id = '" . $userid . "' ORDER BY id DESC";
                   
                $bookList = $objSite->ExecuteQuery($sel_book, 'select');
                $NumValue = $objSite->getNumvalues($CFG['table']['restaurant_booking'],"customer_id = '".$userid."' ");
                           
                if($NumValue > '0'){
                    $response['status']        = 1;
                    $response["BookingList"]   = $bookList;
                }else{
                    $response['status']   = 0;
                    $response["message"]  = "No booking Result";
                }
             } else {
                $response['status']    = 0;
                $response["message"]    = "Required fields are missing";
             }
             echo json_encode($response,true);
             break;
             
        case ('bookingView') :
    
            $booking_id = $_REQUEST['booking_id'];
            if($booking_id != '') {
                $Query = " SELECT book.restaurant_id, book.bookinggenerateid, book.customer_id, book.num_guests, book.booking_date, book.booking_time, book.booking_name, book.booking_email, book.booking_mobileno, book.booking_instruction, book.status, res.restaurant_name 
                FROM ".$CFG['table']['restaurant_booking']." AS book
                INNER JOIN ".$CFG['table']['restaurant']." AS res ON (res.restaurant_id = book.restaurant_id)
                WHERE book.id = '".$booking_id."'";
                
                $bookingDetails = $objSite->ExecuteQuery($Query, 'select');
                
                $response['status']         = 1;
                $response['bookingDetails']  = $bookingDetails;
            } else {
                $response['status']     = 0;
                $response['message']    = 'Required fields are missing';
            }
            echo json_encode($response, true);
            break;
        
           
        default:
            $response['status']     = 0;
            $response['message']    = 'Required fields are missing';
            echo json_encode($response, true);
            break;
 }




    
//----------------------------------------------------------------
?>