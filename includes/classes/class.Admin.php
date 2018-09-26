<?php 
	/*	Class Function for Admin	*/

/**
 * Admin
 * 
 * @package   
 * @author 
 * @copyright gencyolcu
 * @version 2014
 * @access public
 */
class Admin extends Site
{
	#........................................................................................
	#ADMIN AUTHETICATION
	/**
	 * Admin::Admin_Notauthetic()
	 * 
	 * @return
	 */
    function __construct()
    {
        parent::__construct();
    }
	function Admin_Notauthetic()
        {
    		if($_SESSION['adminid']) 
                {
        			$this->redirectUrl("index.php");;
        		}
    	}
	#........................................................................................
	#ADMIN NOT AUTHETICATION
	/**
	 * Admin::Admin_authetic()
	 * 
	 * @return
	 */
	function Admin_authetic()
        {		
    		if(!$_SESSION['adminid']) 
                {
                    $admin_qry_str = '';
                    if( isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING']) )
                        {
                            $admin_qry_str = '?'.$_SERVER['QUERY_STRING'];
                        }
                    $req_file_name = $this->get_file_name();
        			$this->redirectUrl("login.php?os_destination=".$req_file_name.$admin_qry_str);
        		}
    	}
    #Page Authentic
    function Admin_Pageauthetic($filename){
		global $CFG,$admin_smarty;	

        $adminid = $this->filterInput($_SESSION['adminid']);
        
        #Get Current file name        
        $php_self_arr 		= explode("/",$_SERVER['PHP_SELF']);
        $req_file_name = end($php_self_arr); 
                   
		if(isset($adminid) && !empty($adminid) && ($adminid) != '1'){
		            
             $adminmodulepage   = $this->getValue("modules",$CFG['table']['admin'],"admin_id = '".$adminid."'");
    
             $adminmodulepagelist = explode(",",$adminmodulepage);  
             
             $adminmodulepage_url   = $this->getValue("page_url",$CFG['table']['modules'],"parent_id='".$this->filterInput($adminmodulepagelist[0])."'");
             
             //echo "<pre>";print_r($adminmodulepage_url);echo "</pre>";
             
             foreach($adminmodulepagelist as $key=>$value){
                //echo $adminmodulepagelist[$key]."<br>";
                $adminmodulepagelist1[] = $this->getValue("page_url",$CFG['table']['modules'],"id='".$this->filterInput($adminmodulepagelist[$key])."' AND module_status != '0' ");
             }
             foreach($adminmodulepagelist1 as $key=>$value){
                
                if($adminmodulepagelist1[$key] != ''){
                    
                    #echo $adminmodulepagelist1[$key]."<br>";  

                   if($adminmodulepagelist1[$key] == 'menuManage.php'){

                         $adminmodulepagelist1[] = 'menuManage.php';
                    }
                    if($adminmodulepagelist1[$key] == 'menuAddEdit.php'){

                         $adminmodulepagelist1[] = 'menuAddEdit.php';
                    }
                    if($adminmodulepagelist1[$key] == 'mainAddonsAddEditManage.php'){
                        
                         $adminmodulepagelist1[] = 'mainAddonsAddEditManage.php';  
                    }
                    if($adminmodulepagelist1[$key] == 'addonsManage.php'){
                         $adminmodulepagelist1[] = 'addonsManage.php';
                    }
                    if($adminmodulepagelist1[$key] == 'addonsAddEdit.php'){
                         $adminmodulepagelist1[] = 'addonsAddEdit.php';
                    }
                    if($adminmodulepagelist1[$key] == 'categoryManage.php'){
                         $adminmodulepagelist1[] = 'categoryManage.php';
                    }
                    if($adminmodulepagelist1[$key] == 'categoryAddEdit.php'){
                         $adminmodulepagelist1[] = 'categoryAddEdit.php';
                    }
                    if($adminmodulepagelist1[$key] == 'cuisineManage.php'){
                         $adminmodulepagelist1[] = 'cuisineManage.php';
                    }
                    if($adminmodulepagelist1[$key] == 'cuisineAddEdit.php'){
                         $adminmodulepagelist1[] = 'cuisineAddEdit.php';
                    }
                    if($adminmodulepagelist1[$key] == 'restaurantOrderManage.php'){
                         $adminmodulepagelist1[] = 'restaurantOrderManage.php';
                    }
                    if($adminmodulepagelist1[$key] == 'viewOrderDetails.php'){
                         $adminmodulepagelist1[] = 'viewOrderDetails.php';
                    }
                    if($adminmodulepagelist1[$key] == 'pdfReportList.php'){
                         $adminmodulepagelist1[] = 'pdfReportList.php';
                    }
                    if($adminmodulepagelist1[$key] == 'restaurantReportManage.php'){
                        $adminmodulepagelist1[] = 'restaurantReportManage.php';
                    }
                    if($adminmodulepagelist1[$key] == 'viewOrderDetails.php'){
                        $adminmodulepagelist1[] = 'viewOrderDetails.php';
                        $adminmodulepagelist1[] = 'orderReportList.php';
                        $adminmodulepagelist1[] = 'pdfReportList.php';
                    }
                    if($adminmodulepagelist1[$key] == 'orderReportList.php'){
                        $adminmodulepagelist1[] = 'orderReportList.php';
                    }
                    if($adminmodulepagelist1[$key] == 'pdfReportList.php'){
                        $adminmodulepagelist1[] = 'pdfReportList.php';
                    }  
                    if($adminmodulepagelist1[$key] == 'voucherManage.php'){
                        $adminmodulepagelist1[] = 'voucherManage.php';
                    } 
                    if($adminmodulepagelist1[$key] == 'voucherAddEdit.php'){
                        $adminmodulepagelist1[] = 'voucherAddEdit.php';
                    }
                    if($adminmodulepagelist1[$key] == 'contentManage.php'){
                        $adminmodulepagelist1[] = 'contentManage.php';
                    }
                    if($adminmodulepagelist1[$key] == 'contentAddEdit.php'){
                        $adminmodulepagelist1[] = 'contentAddEdit.php';
                    } 
                    if($adminmodulepagelist1[$key] == 'faqManage.php'){
                        $adminmodulepagelist1[] = 'faqManage.php';
                    }
                    if($adminmodulepagelist1[$key] == 'faqAddEdit.php'){
                        $adminmodulepagelist1[] = 'faqAddEdit.php';
                    } 
                    if($adminmodulepagelist1[$key] == 'languageManage.php'){
                        $adminmodulepagelist1[] = 'languageManage.php';
                    }
                    if($adminmodulepagelist1[$key] == 'languageAddEdit.php'){
                        $adminmodulepagelist1[] = 'languageAddEdit.php';
                    } 
                    if($adminmodulepagelist1[$key] == 'followersManage.php'){
                        $adminmodulepagelist1[] = 'followersManage.php';
                    } 
                    if($adminmodulepagelist1[$key] == 'followersAddEdit.php'){
                        $adminmodulepagelist1[] = 'followersAddEdit.php';
                    } 
                    if($adminmodulepagelist1[$key] == 'paymentInfoManage.php'){
                        $adminmodulepagelist1[] = 'paymentInfoManage.php';
                    }
                    if($adminmodulepagelist1[$key] == 'paymentInfoAddEdit.php'){
                        $adminmodulepagelist1[] = 'paymentInfoAddEdit.php';
                    } 
                    if($adminmodulepagelist1[$key] == 'indexBannerManage.php'){
                        $adminmodulepagelist1[] = 'indexBannerManage.php';
                    }
                    if($adminmodulepagelist1[$key] == 'indexBannerAddEdit.php'){
                        $adminmodulepagelist1[] = 'indexBannerAddEdit.php';
                    }   
                    if($adminmodulepagelist1[$key] == 'metatagManage.php'){
                        $adminmodulepagelist1[] = 'metatagManage.php';
                    }
                    if($adminmodulepagelist1[$key] == 'metatagAddEdit.php'){
                        $adminmodulepagelist1[] = 'metatagAddEdit.php';
                    } 
                    
                    if($adminmodulepagelist1[$key] == 'stateManage.php'){
                        $adminmodulepagelist1[] = 'stateManage.php';
                    }
                    if($adminmodulepagelist1[$key] == 'stateAddEdit.php'){
                        $adminmodulepagelist1[] = 'stateAddEdit.php';
                    }  
                    if($adminmodulepagelist1[$key] == 'cityManage.php'){
                        $adminmodulepagelist1[] = 'cityManage.php';
                    } 
                    if($adminmodulepagelist1[$key] == 'cityAddEdit.php'){
                        $adminmodulepagelist1[] = 'cityAddEdit.php';
                    }
                    if($adminmodulepagelist1[$key] == 'zipcodeManage.php'){
                        $adminmodulepagelist1[] = 'zipcodeManage.php';
                    }
                    if($adminmodulepagelist1[$key] == 'zipcodeAddEdit.php'){
                        $adminmodulepagelist1[] = 'zipcodeAddEdit.php';
                    } 
                    if($adminmodulepagelist1[$key] == 'locationManage.php'){
                        $adminmodulepagelist1[] = 'locationManage.php';
                    } 
                    if($adminmodulepagelist1[$key] == 'locationAddEdit.php'){
                        $adminmodulepagelist1[] = 'locationAddEdit.php';
                    }
                    if($adminmodulepagelist1[$key] == 'zoneManage.php'){
                        $adminmodulepagelist1[] = 'zoneManage.php';
                    }
                    if($adminmodulepagelist1[$key] == 'zoneAddEdit.php'){
                        $adminmodulepagelist1[] = 'zoneAddEdit.php';
                    } 
                    if($adminmodulepagelist1[$key] == 'restaurantFeatureManage.php'){
                        $adminmodulepagelist1[] = 'restaurantFeatureManage.php';
                    }
                    if($adminmodulepagelist1[$key] == 'restaurantFeatureAddEdit.php'){
                        $adminmodulepagelist1[] = 'restaurantFeatureAddEdit.php';
                    }
                    if($adminmodulepagelist1[$key] == 'customerManage.php'){
                        $adminmodulepagelist1[] = 'customerManage.php';
                    }
                    if($adminmodulepagelist1[$key] == 'customerAddEdit.php'){
                        $adminmodulepagelist1[] = 'customerAddEdit.php';
                    }
                    if($adminmodulepagelist1[$key] == 'addressBookManage.php'){
                        $adminmodulepagelist1[] = 'addressBookManage.php';
                    }
                    if($adminmodulepagelist1[$key] == 'addressBookAddEdit.php'){
                        $adminmodulepagelist1[] = 'addressBookAddEdit.php';
                    }
                    if($adminmodulepagelist1[$key] == 'restaurantDealManage.php'){
                        $adminmodulepagelist1[] = 'restaurantDealManage.php';
                    }
                    if($adminmodulepagelist1[$key] == 'restaurantDealAddEdit.php'){
                        $adminmodulepagelist1[] = 'restaurantDealAddEdit.php';
                    }
                    if($adminmodulepagelist1[$key] == 'restaurantInManage.php'){
                        $adminmodulepagelist1[] = 'restaurantInManage.php';
                    }
                    if($adminmodulepagelist1[$key] == 'restaurantInAddEdit.php'){
                        $adminmodulepagelist1[] = 'restaurantInAddEdit.php';
                    }
                    if($adminmodulepagelist1[$key] == 'restaurantOfferManage.php'){
                        $adminmodulepagelist1[] = 'restaurantOfferManage.php';
                    }
                    if($adminmodulepagelist1[$key] == 'restaurantOfferAddEdit.php'){
                        $adminmodulepagelist1[] = 'restaurantOfferAddEdit.php';
                    }    
                    //echo "heelo";
                    //echo $adminmodulepagelist1[$key]."<br>";  
                   // echo "<pre>";print_r($adminmodulepagelist1);echo "</pre>";
                    
                    $adminmodulepagelist2[]  = $adminmodulepagelist1[$key];
                } 
            }    
            // echo "<pre>";print_r($adminmodulepagelist2);echo "</pre>";
             #Assign true value
             foreach($adminmodulepagelist1 as $key=>$value){
                if($req_file_name == $adminmodulepagelist1[$key]){
                    $variable = 'True';
                }
             } 
             
            // echo "variable".$variable."<br>";
             
            // echo "<pre>";print_r($adminmodulepagelist2);echo "</pre>";
             
            #Check true i set or not
            if(empty($variable) && $variable != 'True')
            {
                if($filename != $adminmodulepage_url){
                     //$this->redirectUrl($adminmodulepage_url);
                     $this->redirectUrl($adminmodulepagelist2[0]);
                }
            }
        } 
    }      
	#........................................................................................
	//Admin Login
	/**
	 * Admin::AdminLogout()
	 * 
	 * @return
	 */
	function AdminLogout()
        {		
    		session_destroy();
    		unset($_SESSION);
    		$this->redirectUrl("login.php");
    	}
	#........................................................................................
	//Admin Login
	/**
	 * Admin::chkAdminLogin()
	 * 
	 * @return
	 */
	function chkAdminLogin()
    {
		global $CFG;
        
		$username	= $this->filterInput($_POST["admin_username"]);
		$Password	= $this->filterInput($_POST["admin_password"]);
        
		$num_admin = $this->getNumvalues($CFG['table']['admin'],"username='".$username."' AND password='".$Password."' AND log_status = '1'");
		$AdminId   = $this->getValue("admin_id",$CFG['table']['admin'],"username='".$username."' AND password='".$Password."' AND log_status = '1'");
        $num_deactivate_state  = $this->getNumvalues($CFG['table']['admin'],"username='".$username."' AND password='".$Password."' AND log_status = '0'");
        
        if($num_admin == 1)
        {
			$_SESSION['lan'] = $this->getValue("lang_code",$CFG['table']['language']," lang_site ='Yes' LIMIT 1");
			
			$_SESSION['adminid'] = $AdminId;
            
            $admin_qry_str = '';
            if( isset($_POST['os_destination']) && !empty($_POST['os_destination']) )
            {
                $admin_qry_str = $_POST['os_destination'];
                echo $admin_qry_str;
                exit();
            }
		}
        elseif($num_deactivate_state != '0'){
			echo "deactive";
			exit();
       	} 
		else
        {
			echo "Invalid_Login";
			exit();
		}
	}
	#........................................................................................
	#ADMIN CHANGE PWD
	/**
	 * Admin::change_pwd()
	 * 
	 * @return
	 */
	function change_pwd()
        {
    		global $CFG;
    		
    		$old_password = $this->filterInput($_POST["old_password"]);
    		$new_password = $this->filterInput($_POST["new_password"]);
    		
    		if($this->chkPassword($old_password, $_SESSION['adminid']))
                {
        			$UpQuery  = "UPDATE ".$CFG['table']['admin']." SET password = '".addslashes($new_password)."' WHERE admin_id  = ". $this->filterInput($_SESSION['adminid']);
        			$UpResult = mysqli_query($this->DBCONN,$UpQuery) or die(mysqli_error($this->DBCONN));			
        		}
    		else
                {			
        			echo "Invalid_Old_Pwd";			
        			exit();
        		}
    	}
	#........................................................................................
	#ADMIN CHECK PWD
	/**
	 * Admin::chkPassword()
	 * 
	 * @return
	 */
	function chkPassword($CurPwd, $AdminId)
        {
    		global $CFG;
    		
    		$AdminId   = $this->GetValue("admin_id",$CFG['table']['admin'],"password = '".$CurPwd."' AND admin_id  = ".$AdminId." LIMIT 0,1");
    		if(!empty($AdminId))
    		return true;
    		else
    		return false;
    	}	
	#........................................................................................
	#COMMON
    #........................................................................................
    /**
     * Admin::changeStatus()
     * 
     * @return
     */
    function changeStatus()
    {
    	global $CFG;
    	
		$sel_id 		 = $this->filterInput($_POST['checkedvaluesarr']);
		$tablename 		 = $this->filterInput($_POST['tablename']);
		$filedname 		 = $this->filterInput($_POST['fieldname']);//lang_site
		$changestatusval = $this->filterInput($_POST['changestatusval']);
        $upid            = $this->filterInput($_POST['whereField']);
		$maincateid 	 = $this->filterInput($_POST['maincateid']);
		
		#echo "<pre>";print_r($_REQUEST);echo "</pre>";
		#exit;
		
		if( isset($sel_id) && is_array($sel_id) ) 
            {
    	        foreach($sel_id as $x => $value)
                    {
        	        	
        	            $sel_del = "UPDATE ".$tablename." SET ".$filedname." = '".$changestatusval."' WHERE ".$upid." = '".$value."'";
        	            $res_del = mysqli_query($this->DBCONN,$sel_del) or die(mysqli_error($this->DBCONN));
        	        }
    	        echo 'success1';
    	        exit;
    	    }
        else
            {
    			if(isset($maincateid) && !empty($maincateid))
                    {
        				if( $filedname == 'lang_site' && $changestatusval = 'Yes')
                            {
            					$sel_deln = "UPDATE ".$tablename." SET ".$filedname." = 'No' ";
            	            	$res_deln = mysqli_query($this->DBCONN,$sel_deln) or die(mysqli_error($this->DBCONN));
            				}
        					
        				$sel_del = "UPDATE ".$tablename." SET ".$filedname." = '".$changestatusval."' WHERE ".$upid." = '".$maincateid."'";
        				#echo $sel_del;
        	            $res_del = mysqli_query($this->DBCONN,$sel_del) or die(mysqli_error($this->DBCONN));
#--------------------------------------------------------------------------------------------------------------------------------------------------------------
                        #Send GCM Notification For Android 
                        $gcm_det = "SELECT gcm.gcm_register_id, ord.ordergenerateid, res.restaurant_name ".
                            "FROM ".$CFG['table']['gcm']." AS gcm".
                            " LEFT JOIN ".$CFG['table']['order']." AS ord ON gcm.order_id = ord.orderid".
                            " LEFT JOIN ".$CFG['table']['restaurant']." AS res ON gcm.restaurant_id = res.restaurant_id".
                            //" LEFT JOIN ".$CFG['table']['customer']." AS cus ON gcm.userid = cus.customer_id".
                            " WHERE gcm.order_id = '".$maincateid."' AND gcm.status = '1'";
                        $gcm_res = $this->ExecuteQuery($gcm_det,'select');
                        #echo $gcm_res;
                        if(isset($gcm_res) && !empty($gcm_res)){
                            $this->sendGCMnotification($changestatusval,trim($gcm_res[0]['gcm_register_id']),trim($gcm_res[0]['ordergenerateid']),trim(stripslashes($gcm_res[0]['restaurant_name'])));
                        }
#--------------------------------------------------------------------------------------------------------------------------------------------------------------
        	            if($changestatusval == 'completed')
                            {
            	            	$sel_cart = "SELECT tot_menuprice FROM ".$CFG['table']['restaurant_cart']." WHERE orderid = '".$maincateid."' GROUP BY cart_id ";
            					$res_cart = $this->ExecuteQuery($sel_cart, "select");
            					
            					if(count($res_cart) > 0)
                                    {
                						$orderSubTotal = 0;
                						foreach($res_cart as $key=>$value)
                                            {
                    							$orderSubTotal += $res_cart[$key]['tot_menuprice'];
                    						}
                					}
            	            	$res      = $this->getMultivalue("restaurant_id,ordersubtotal,ordertotalprice",$CFG['table']['order'],"orderid = '".$maincateid."' ");
            					$rescom   = $this->getValue("restaurant_commission",$CFG['table']['restaurant'],"restaurant_id = '".$this->filterInput($res[0]['restaurant_id'])."'");
            					//$orderprice = $res[0]['ordersubtotal'];
            					$orderprice = $orderSubTotal;
            					$comm_price =  ( $orderprice*($rescom/100) );
            					
            					$ord_upd = "UPDATE ".$CFG['table']['order']." SET ordersubtotal = '".$orderSubTotal."',res_comm_perchantage = '".$rescom."',res_comm_price = '".$comm_price."',res_order_delivereddate = '".CUR_TIME."',payment_status = 'P' WHERE orderid = '".$maincateid."'";
            					$res_upd = mysqli_query($this->DBCONN,$ord_upd) or die(mysqli_error($this->DBCONN));
            					
            					$res_det 	= $this->getMultiValue("restaurant_name,restaurant_phone, restaurant_website, restaurant_streetaddress, restaurant_city, restaurant_state, restaurant_zip, restaurant_contact_name, restaurant_contact_email, restaurant_website",$CFG['table']['restaurant'],"restaurant_id = '".$this->filterInput($res[0]['restaurant_id'])."'");
            					$cus_det	= $this->getMultiValue("ordergenerateid, customername, customerlastname, customeremail, customercellphone, deliverydoornumber, deliverystreet, deliverycity, deliverystate, deliveryzip",$CFG['table']['order'],"orderid = '".$maincateid."' "); 
            					
            					$cus_city	= $this->getValue("cityname",$CFG['table']['city'],"city_id='".$this->filterInput($cus_det[0]['deliverycity'])."'");
            					$cus_state	= $this->getValue("statename",$CFG['table']['state'],"state_id='".$this->filterInput($cus_det[0]['deliverystate'])."'");
            					
                                /*#Send GCM Notification For Android 
                                $gcm_res = $this->getValue('gcm_register_id',$CFG['table']['gcm'],"order_id AND status = '1'");
                                if(isset($gcm_res) && !empty($gcm_res)){
                                    $this->sendGCMnotification('completed',trim($gcm_res[0]['gcm_register_id']),trim($cus_det[0]['ordergenerateid']),trim(stripslashes($res_det[0]['restaurant_name'])));
                                }*/
                                
            					#Send Mail To Customer From Restaurant
            					$fromname	= stripcslashes($res_det[0]['restaurant_name']);
            					$fromemail	= stripcslashes($res_det[0]['restaurant_contact_email']);
            					$toemail	= stripcslashes($cus_det[0]['customeremail']);
            					
            					//Content
            					$order_num			 = $cus_det[0]['ordergenerateid'];
            					$cus_address		 = '<tr>
            											<td align="left" valign="top" width="17%">Delivery Address : </td>
														<td align="left" valign="top">
															<table>
            													<tr><td align="left" valign="top">'.$cus_det[0]['deliverydoornumber'].'</td></tr>
            													<tr><td align="left" valign="top">'.$cus_det[0]['deliverystreet'].'</td></tr>
            													<tr><td align="left" valign="top">'.$cus_city.'</td></tr>
            													<tr><td align="left" valign="top">'.$cus_state.'-'.$cus_det[0]['deliveryzip'].'</td></tr>
																<tr><td align="left" valign="top">'.$cus_det[0]['customercellphone'].'</td></tr>
															</table>
														</td>
            										</tr>';
            					$mailsubject  = "Delivery confirmation of '".$CFG['site']['sitename']."' ['".$order_num."']";
            					$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailOrderDelivery.tpl");
            					$mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
            					$mail_content = str_replace('{SITE_TITLE}',$CFG['site']['sitename'],$mail_content);
            					$mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
            					$mail_content = str_replace('{SITE_DOMAIN}',$CFG['site']['sitedomain'],$mail_content);
            					$mail_content = str_replace('{CUSTOMER_NAME}',$cus_det[0]['customername'],$mail_content);
            					$mail_content = str_replace('{CUSTOMER_LAST_NAME}',$cus_det[0]['customerlastname'],$mail_content);
            					$mail_content = str_replace('{ORDERNUMBER}',$order_num,$mail_content);
            					$mail_content = str_replace('{CUSTOMERADDRESS}',$cus_address,$mail_content);
            					$mail_content = str_replace('{RESTAURANT}',$res_det[0]['restaurant_name'],$mail_content);
            					
            					$ok = $this->sendMail($fromname,$fromemail,$toemail,$mailsubject,$mail_content, $mail_attachment_name='', $mail_attachment_content='');
            					$this->sendMail($CFG['site']['sitename'],$CFG['site']['adminemail'],$fromemail,$mailsubject,$mail_content, $mail_attachment_name='', $mail_attachment_content='');
                                
            					if($ok)
                                    {
                    					#Send Mail To Site Admin From Restaurant
                    					$fromname	= stripcslashes($res_det[0]['restaurant_name']);
                    					$fromemail	= stripcslashes($res_det[0]['restaurant_contact_email']);
                    					$toemail	= stripcslashes($CFG['site']['adminemail']);
                                        
                    					//Content
                    					$order_num			 = $cus_det[0]['ordergenerateid'];
                    					$cus_address		 = '<tr>
                    												<td align="left" valign="top" width="17%">Delivery Address : </td>
																	<td align="left" valign="top">
																		<table>
                    														<tr><td align="left" valign="top">'.$cus_det[0]['deliverydoornumber'].'</td></tr>
                    														<tr><td align="left" valign="top">'.$cus_det[0]['deliverystreet'].'</td></tr>
                    														<tr><td align="left" valign="top">'.$cus_city.'</td></tr>
                    														<tr><td align="left" valign="top">'.$cus_state.'-'.$cus_det[0]['deliveryzip'].'</td></tr>
                    														<tr><td align="left" valign="top">'.$cus_det[0]['customercellphone'].'</td></tr>
																		</table>
																	</td>
                    											</tr>';
                    					$mailsubject  = "Delivery confirmation by '".$res_det[0]['restaurant_name']."' ['".$order_num."']";
                    					$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailOrderDeliveryToAdmin.tpl");
                    					$mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
                    					$mail_content = str_replace('{SITE_TITLE}',$CFG['site']['sitename'],$mail_content);
                    					$mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
                    					$mail_content = str_replace('{SITE_DOMAIN}',$CFG['site']['sitedomain'],$mail_content);
                    					$mail_content = str_replace('{ORDERNUMBER}',$order_num,$mail_content);
                    					$mail_content = str_replace('{CUSTOMERADDRESS}',$cus_address,$mail_content);
                    					$mail_content = str_replace('{RESTAURANT}',$res_det[0]['restaurant_name'],$mail_content);
                    					$mail_content = str_replace('{RESTAURANTWEB}',$res_det[0]['restaurant_website'],$mail_content);
                    					
                    					$this->sendMail($fromname,$fromemail, $toemail,$mailsubject,$mail_content, $mail_attachment_name='', $mail_attachment_content='');
                                    }
                            }
        				elseif($changestatusval == 'processing' || $changestatusval == 'pending' || $changestatusval == 'failed' )
                            {
            					$ord_upd = "UPDATE ".$CFG['table']['order']." SET res_comm_perchantage = '',res_comm_price = '',res_order_delivereddate = '' WHERE orderid = '".$maincateid."'";
            					$res_upd = mysqli_query($this->DBCONN,$ord_upd) or die(mysqli_error($this->DBCONN));
        					
        					    if($changestatusval == 'failed')
                                    {
                						$fail_reason	= stripslashes($_REQUEST['reason']);
                						$res_id  = $this->getvalue("restaurant_id",$CFG['table']['order'],"orderid = '".$maincateid."' ");
                						
                						$res_det 	= $this->getMultiValue("restaurant_name,restaurant_phone, restaurant_website, restaurant_streetaddress, restaurant_city, restaurant_state, restaurant_zip, restaurant_contact_name, restaurant_contact_email, restaurant_website",$CFG['table']['restaurant'],"restaurant_id = '".$res_id."'");
                						$cus_det	= $this->getMultiValue("ordergenerateid, customername, customerlastname, customeremail, customercellphone, deliverydoornumber, deliverystreet, deliverycity, deliverystate, deliveryzip",$CFG['table']['order'],"orderid = '".$maincateid."' "); 
                						
                						$cus_city	= $this->getValue("cityname",$CFG['table']['city'],"city_id='".$this->filterInput($cus_det[0]['deliverycity'])."'");
                						$cus_state	= $this->getValue("statename",$CFG['table']['state'],"state_id='".$this->filterInput($cus_det[0]['deliverystate'])."'");
                						
                                        /*#Send GCM Notification For Android 
                                        $gcm_res = $this->getValue('gcm_register_id',$CFG['table']['gcm'],"order_id AND status = '1'");
                                        if(isset($gcm_res) && !empty($gcm_res)){
                                            $this->sendGCMnotification('completed',trim($gcm_res[0]['gcm_register_id']),trim($cus_det[0]['ordergenerateid']),trim(stripslashes($res_det[0]['restaurant_name'])),$fail_reason);
                                        }*/
                                        
                						#Send Failure Mail To Customer From Restaurant
                						$fromname	= stripcslashes($res_det[0]['restaurant_name']);
                						$fromemail	= stripcslashes($res_det[0]['restaurant_contact_email']);
                						$toemail	= stripcslashes($cus_det[0]['customeremail']);
                						
                						//Content
                						$order_num			 = $cus_det[0]['ordergenerateid'];
                						$cus_address		 = '<tr>
                												<td align="left" valign="top" width="17%">Delivery Address : </td>
                												<td align="left" valign="top">
																	<table>
                    													<tr><td align="left" valign="top">'.$cus_det[0]['deliverydoornumber'].'</td></tr>
                														<tr><td align="left" valign="top">'.$cus_det[0]['deliverystreet'].'</td></tr>
                														<tr><td align="left" valign="top">'.$cus_city.'</td></tr>
                														<tr><td align="left" valign="top">'.$cus_state.'-'.$cus_det[0]['deliveryzip'].'</td></tr>
                														<tr><td align="left" valign="top">'.$cus_det[0]['customercellphone'].'</td></tr>
																	</table>
																</td>
                											</tr>';
                							
                						$mailsubject  = "Delivery Failure of '".$CFG['site']['sitename']."' ['".$order_num."']";
                						$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailFailureOrder.tpl");
                						$mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
                						$mail_content = str_replace('{SITE_TITLE}',$CFG['site']['sitename'],$mail_content);
                						$mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
                						$mail_content = str_replace('{SITE_DOMAIN}',$CFG['site']['sitedomain'],$mail_content);
                						$mail_content = str_replace('{REASON}',$fail_reason,$mail_content);
                						$mail_content = str_replace('{CUSTOMER_NAME}',$cus_det[0]['customername'],$mail_content);
                						$mail_content = str_replace('{CUSTOMER_LAST_NAME}',$cus_det[0]['customerlastname'],$mail_content);
                						$mail_content = str_replace('{ORDERNUMBER}',$order_num,$mail_content);
                						$mail_content = str_replace('{CUSTOMERADDRESS}',$cus_address,$mail_content);
                						$mail_content = str_replace('{RESTAURANT}',$res_det[0]['restaurant_name'],$mail_content);
                						
                						$ok = $this->sendMail($fromname,$fromemail,$toemail,$mailsubject,$mail_content, $mail_attachment_name='', $mail_attachment_content='');
                                        $this->sendMail($CFG['site']['sitename'],$CFG['site']['adminemail'],$fromemail,$mailsubject,$mail_content, $mail_attachment_name='', $mail_attachment_content='');
                                        
                						if($ok)
                                            {
                    							#Send Failure Mail To Site Admin From Restaurant
                    							$fromname	= stripcslashes($res_det[0]['restaurant_name']);
                    							$fromemail	= stripcslashes($res_det[0]['restaurant_contact_email']);
                    							$toemail	= stripcslashes($CFG['site']['adminemail']);
                    							
                    							//Content
                    							$order_num			 = $cus_det[0]['ordergenerateid'];
                    							$cus_address		 = '<tr>
                    													<td align="left" valign="top" width="17%">Delivery Address : </td>
                    													<td align="left" valign="top">
																			<table>
                    															<tr><td align="left" valign="top">'.$cus_det[0]['deliverydoornumber'].'</td></tr>
                    															<tr><td align="left" valign="top">'.$cus_det[0]['deliverystreet'].'</td></tr>
                    															<tr><td align="left" valign="top">'.$cus_city.'</td></tr>
                    															<tr><td align="left" valign="top">'.$cus_state.'-'.$cus_det[0]['deliveryzip'].'</td></tr>
                    													
                    															<tr><td align="left" valign="top">'.$cus_det[0]['customercellphone'].'</td></tr>
																			</table>
																		</td>
                    												</tr>';
                    							
                    							
                    							$mailsubject  = "Delivery Failure of '".$CFG['site']['sitename']."' ['".$order_num."']";
                    							$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailFailureOrder.tpl");
                    							$mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
                    							$mail_content = str_replace('{SITE_TITLE}',$CFG['site']['sitename'],$mail_content);
                    							$mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
                    							$mail_content = str_replace('{SITE_DOMAIN}',$CFG['site']['sitedomain'],$mail_content);
                    							$mail_content = str_replace('{REASON}',$fail_reason,$mail_content);
                    							$mail_content = str_replace('{CUSTOMER_NAME}',$CFG['site']['sitename'],$mail_content);
                    						
                    							$mail_content = str_replace('{ORDERNUMBER}',$order_num,$mail_content);
                    							$mail_content = str_replace('{CUSTOMERADDRESS}',$cus_address,$mail_content);
                    							$mail_content = str_replace('{RESTAURANT}',$res_det[0]['restaurant_name'],$mail_content);
                    							
                    							$this->sendMail($fromname,$fromemail,$toemail,$mailsubject,$mail_content, $mail_attachment_name='', $mail_attachment_content='');	
                    						}
            					       }
        				        }
        	            if( $filedname == 'lang_site' && $changestatusval = 'Yes')
                            {
            	            	$_SESSION['lan'] = $this->getValue("lang_code",$CFG['table']['language'],$upid." = '".$maincateid."' AND lang_site ='Yes' LIMIT 1");
            	            }
        				echo 'success';exit;	
        			}			
    		}
	}
	#........................................................................................
    /**
     * Admin::changeStatusPending()
     * 
     * @return
     */
    function changeStatusPending()
        {
        	global $CFG;
        	//echo "<pre>";print_r($_REQUEST);echo "</pre>";
        	
    		$sel_id 		 = $this->filterInput($_POST['checkedvaluesarr']);
    		$tablename 		 = $this->filterInput($_POST['tablename']);
    		$filedname 		 = $this->filterInput($_POST['fieldname']);
    		$changestatusval = $this->filterInput($_POST['changestatusval']);
    		$upid 			 = $this->filterInput($_POST['whereField']);
            $word            = $this->filterInput($_POST['word']);
            $maincateid            = $this->filterInput($_POST['maincateid']);
    		echo $sel_id;
            if($word == 'customer'){ //echo"hfkdsfdsf0";
                if( isset($sel_id) && is_array($sel_id) ) 
                {
        	        foreach($sel_id as $x => $value)
                        {	
            	            $sel_del = "UPDATE ".$tablename." SET ".$filedname." = '".$changestatusval."' WHERE ".$upid." = '".$value."'";
            	            $res_del = mysqli_query($this->DBCONN,$sel_del) or die(mysqli_error($this->DBCONN));
            	           	            
            	            if($res_del)
                                {
                					$getlogindetails = $this->getMultivalue("customer_email,customer_password ",$tablename," ".$upid." = '".$value."' ");
                					//echo "<pre>";print_r($getlogindetails);echo "</pre>";
                					
                					//$encrypt_pass = base64_decode($getlogindetails['0']['restaurant_encrypt_password']);
                					//echo $encrypt_pass;
                					
                					$toemail  = $getlogindetails[0]['customer_email'];
                					$password = $getlogindetails[0]['customer_password'];
                					
                					$mailsubject  = $CFG['site']['sitedomain'].": ".$CFG['site']['sitename']." Customer Login Details";
                					$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailOwnerLogin.tpl");
                			        $mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
                			        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['sitename'],$mail_content);
                			        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
                			        $mail_content = str_replace('{SITE_DOMAIN}',$CFG['site']['sitedomain'],$mail_content);
                			        $mail_content = str_replace('{USEREMAIL}',$toemail,$mail_content);
                			        //$mail_content = str_replace('{PASSWORD}',$encrypt_pass,$mail_content);
                			        
                			        $this->sendMail($CFG['site']['sitename'],$CFG['site']['adminemail'],$toemail,$mailsubject,$mail_content, $mail_attachment_name='', $mail_attachment_content='');
                				}
            	        }
        	        
        	    }
                echo 'success';exit;
            }
            
    	   else	if( isset($sel_id) && is_array($sel_id) ) 
                {
        	        foreach($sel_id as $x => $value)
                        {	
            	            $sel_del = "UPDATE ".$tablename." SET ".$filedname." = '".$changestatusval."' WHERE ".$upid." = '".$value."'";
            	            $res_del = mysqli_query($this->DBCONN,$sel_del) or die(mysqli_error($this->DBCONN));
            	           	            
            	            if($res_del)
                                {
                					$getlogindetails = $this->getMultivalue("restaurant_contact_email,restaurant_password,restaurant_encrypt_password ",$tablename," ".$upid." = '".$value."' ");
                					//echo "<pre>";print_r($getlogindetails);echo "</pre>";
                					
                					$encrypt_pass = base64_decode($getlogindetails['0']['restaurant_encrypt_password']);
                					//echo $encrypt_pass;
                					
                					$toemail  = $getlogindetails[0]['restaurant_contact_email'];
                					$password = $getlogindetails[0]['restaurant_password'];
                					
                					$mailsubject  = $CFG['site']['sitedomain'].": ".$CFG['site']['sitename']." Restaurant Login Details";
                					$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailOwnerLogin.tpl");
                			        $mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
                			        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['sitename'],$mail_content);
                			        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
                			        $mail_content = str_replace('{SITE_DOMAIN}',$CFG['site']['sitedomain'],$mail_content);
                			        $mail_content = str_replace('{USEREMAIL}',$toemail,$mail_content);
                			        $mail_content = str_replace('{PASSWORD}',$encrypt_pass,$mail_content);
                			        
                			        $this->sendMail($CFG['site']['sitename'],$CFG['site']['adminemail'],$toemail,$mailsubject,$mail_content, $mail_attachment_name='', $mail_attachment_content='');
                				}
            	        }
        	        echo 'success';exit;
        	    }
            else
            {
    			if(isset($maincateid) && !empty($maincateid)){
    				
    				$sel_del = "UPDATE ".$tablename." SET ".$filedname." = '".$changestatusval."' WHERE ".$upid." = '".$maincateid."'";
    	            $res_del = mysqli_query($this->DBCONN,$sel_del) or die(mysqli_error($this->DBCONN));
    	            
    	            if($res_del){
    					$getlogindetails = $this->getMultivalue("restaurant_contact_email,restaurant_password,restaurant_encrypt_password",$tablename," ".$upid." = '".$maincateid."' ");
    					
    					$encrypt_pass = base64_decode($getlogindetails['0']['restaurant_encrypt_password']);
    					//echo $encrypt_pass;
    					
    					$toemail  = $getlogindetails[0]['restaurant_contact_email'];
    					$password = $getlogindetails[0]['restaurant_password'];
    					
    					$mailsubject  = $CFG['site']['sitedomain'].": ".$CFG['site']['sitename']." Restaurant Login Details";
    					$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailOwnerLogin.tpl");
    			        $mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
    			        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['sitename'],$mail_content);
    			        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
    			        $mail_content = str_replace('{SITE_DOMAIN}',$CFG['site']['sitedomain'],$mail_content);
    			        $mail_content = str_replace('{USEREMAIL}',$toemail,$mail_content);
    			        $mail_content = str_replace('{PASSWORD}',$encrypt_pass,$mail_content);
    			        
    			        $this->sendMail($CFG['site']['sitename'],$CFG['site']['adminemail'],$toemail,$mailsubject,$mail_content, $mail_attachment_name='', $mail_attachment_content='');
    				}
    				echo 'success';exit;	
    			}			
    		}	
    	}
    #........................................................................................
	#COMMON
    #........................................................................................
    /**
     * Admin::changeStatus()
     * 
     * @return
     */
        
        function changebookStatus()
    {
    	global $CFG;
    	
		$sel_id 		 = $this->filterInput($_POST['checkedvaluesarr']);
		$tablename 		 = $this->filterInput($_POST['tablename']);
		$filedname 		 = $this->filterInput($_POST['fieldname']);//lang_site
		$changestatusval = $this->filterInput($_POST['changestatusval']);
        $upid            = $this->filterInput($_POST['whereField']);
		$maincateid 	 = $this->filterInput($_POST['maincateid']);
		
		//echo "<pre>";print_r($_REQUEST);echo "</pre>";
		#exit;
		
		if( isset($sel_id) && is_array($sel_id) ) 
            {
    	        foreach($sel_id as $x => $value)
                    {
        	        	echo "hi";
        	            echo $sel_del = "UPDATE ".$tablename." SET ".$filedname." = '".$changestatusval."' WHERE ".$upid." = '".$value."'";
        	            $res_del = mysqli_query($this->DBCONN,$sel_del) or die(mysqli_error($this->DBCONN));
        	        }
                    //echo "hi";
    	        echo 'success';exit;
    	    }
        else
            {
    			if(isset($maincateid) && !empty($maincateid))
                    {
        				if( $filedname == 'lang_site' && $changestatusval = 'Yes')
                            {
            					$sel_deln = "UPDATE ".$tablename." SET ".$filedname." = 'No' ";
            	            	$res_deln = mysqli_query($this->DBCONN,$sel_deln) or die(mysqli_error($this->DBCONN));
            				}
        					
        				$sel_del = "UPDATE ".$tablename." SET ".$filedname." = '".$changestatusval."' WHERE ".$upid." = '".$maincateid."'";
        				//echo $sel_del;
        	            $res_del = mysqli_query($this->DBCONN,$sel_del) or die(mysqli_error($this->DBCONN));
#--------------------------------------------------------------------------------------------------------------------------------------------------------------
                        #Send GCM Notification For Android 
                       /* $gcm_det = "SELECT gcm.gcm_register_id, ord.ordergenerateid, res.restaurant_name ".
                            "FROM ".$CFG['table']['gcm']." AS gcm".
                            " LEFT JOIN ".$CFG['table']['order']." AS ord ON gcm.order_id = ord.orderid".
                            " LEFT JOIN ".$CFG['table']['restaurant']." AS res ON gcm.restaurant_id = res.restaurant_id".
                            //" LEFT JOIN ".$CFG['table']['customer']." AS cus ON gcm.userid = cus.customer_id".
                            " WHERE gcm.order_id = '".$maincateid."' AND gcm.status = '1'";
                        $gcm_res = $this->ExecuteQuery($gcm_det,'select');
                        if(isset($gcm_res) && !empty($gcm_res)){
                            $this->sendGCMnotification($changestatusval,trim($gcm_res[0]['gcm_register_id']),trim($gcm_res[0]['ordergenerateid']),trim(stripslashes($gcm_res[0]['restaurant_name'])));
                        }*/
#--------------------------------------------------------------------------------------------------------------------------------------------------------------
        	            if($changestatusval == 'accept')
                            {
            	            	
            	            	$res      = $this->getMultivalue("restaurant_id,num_guests",$CFG['table']['restaurant_booking'],"id = '".$maincateid."' ");
            				//	$rescom   = $this->getValue("restaurant_commission",$CFG['table']['restaurant'],"restaurant_id = '".$res[0]['restaurant_id']."'");
            					//$orderprice = $res[0]['ordersubtotal'];
            					//$orderprice = $orderSubTotal;
            				//	$comm_price =  ( $orderprice*($rescom/100) );
            					
            				//	$ord_upd = "UPDATE ".$CFG['table']['order']." SET ordersubtotal = '".$orderSubTotal."',res_comm_perchantage = '".$rescom."',res_comm_price = '".$comm_price."',res_order_delivereddate = '".CUR_TIME."',payment_status = 'P' WHERE orderid = '".$maincateid."'";
            					//$res_upd = mysqli_query($this->DBCONN,$ord_upd) or die(mysqli_error($this->DBCONN));
            					
            					$res_det 	= $this->getMultiValue("restaurant_name,restaurant_phone, restaurant_website, restaurant_streetaddress, restaurant_city, restaurant_state, restaurant_zip, restaurant_contact_name, restaurant_contact_email, restaurant_website",$CFG['table']['restaurant'],"restaurant_id = '".$this->filterInput($res[0]['restaurant_id'])."'");
            					$cus_det	= $this->getMultiValue("bookinggenerateid, booking_name,  booking_email, booking_mobileno, booking_time, booking_date, num_guests",$CFG['table']['restaurant_booking'],"id = '".$maincateid."' "); 
            					
            				//	$cus_city	= $this->getValue("cityname",$CFG['table']['city'],"city_id='".$cus_det[0]['deliverycity']."'");
            				//	$cus_state	= $this->getValue("statename",$CFG['table']['state'],"state_id='".$cus_det[0]['deliverystate']."'");
            					
                                /*#Send GCM Notification For Android 
                                $gcm_res = $this->getValue('gcm_register_id',$CFG['table']['gcm'],"order_id AND status = '1'");
                                if(isset($gcm_res) && !empty($gcm_res)){
                                    $this->sendGCMnotification('completed',trim($gcm_res[0]['gcm_register_id']),trim($cus_det[0]['ordergenerateid']),trim(stripslashes($res_det[0]['restaurant_name'])));
                                }*/
                                
            					#Send Mail To Customer From Restaurant
            					$fromname	= stripcslashes($res_det[0]['restaurant_name']);
            					$fromemail	= stripcslashes($res_det[0]['restaurant_contact_email']);
            					$toemail	= stripcslashes($cus_det[0]['booking_email']);
            					
            					//Content
            					$order_num			 = $cus_det[0]['bookinggenerateid'];
            					$cus_address		 = '<tr>
            											<td align="left" valign="top" width="17%">Booking Information: </td>
														<td align="left" valign="top">
															<table>
            													<tr><td align="left" valign="top">'.$cus_det[0]['booking_name'].'</td></tr>
            													<tr><td align="left" valign="top">'.$cus_det[0]['booking_mobileno'].'</td></tr>
            													<tr><td align="left" valign="top">'.$cus_det[0]['booking_date'].'</td></tr>
                                                                <tr><td align="left" valign="top">'.$cus_det[0]['booking_time'].'</td></tr>
            													
																
															</table>
														</td>
            										</tr>';
            					$mailsubject  = "Booking confirmation of '".$CFG['site']['sitename']."' ['".$order_num."']";
            					$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/bookTableAcceptMail.tpl");
            					$mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
            					$mail_content = str_replace('{SITE_TITLE}',$CFG['site']['sitename'],$mail_content);
            					$mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
            					$mail_content = str_replace('{SITE_DOMAIN}',$CFG['site']['sitedomain'],$mail_content);
            					$mail_content = str_replace('{CUSTOMER_NAME}',$cus_det[0]['booking_name'],$mail_content);
            					//$mail_content = str_replace('{CUSTOMER_LAST_NAME}',$cus_det[0]['customerlastname'],$mail_content);
            					$mail_content = str_replace('{ORDERNUMBER}',$order_num,$mail_content);
            					$mail_content = str_replace('{CUSTOMERADDRESS}',$cus_address,$mail_content);
            					$mail_content = str_replace('{RESTAURANT}',$res_det[0]['restaurant_name'],$mail_content);
            					
            					$ok = $this->sendMail($fromname,$fromemail,$toemail,$mailsubject,$mail_content, $mail_attachment_name='', $mail_attachment_content='');
            					
            					if($ok)
                                    {
                    					#Send Mail To Site Admin From Restaurant
                    					$fromname	= stripcslashes($res_det[0]['restaurant_name']);
                    					$fromemail	= stripcslashes($res_det[0]['restaurant_contact_email']);
                    					$toemail	= stripcslashes($CFG['site']['adminemail']);
                                        
                    					//Content
                    					$order_num			 = $cus_det[0]['bookinggenerateid'];
                    					$cus_address		 = '<tr>
                    												<td align="left" valign="top" width="17%">BOoking Information: </td>
																	<td align="left" valign="top">
																		<table>
                    														<tr><td align="left" valign="top">'.$cus_det[0]['booking_name'].'</td></tr>
                    														<tr><td align="left" valign="top">'.$cus_det[0]['booking_mobileno'].'</td></tr>                                                                                   <tr><td align="left" valign="top">'.$cus_det[0]['booking_date'].'</td></tr>
                    														<tr><td align="left" valign="top">'.$cus_det[0]['booking_time'].'</td></tr>
                    														<tr><td align="left" valign="top">'.$cus_det[0]['booking_email'].'</td></tr>
																		</table>
																	</td>
                    											</tr>';
                    					$mailsubject  = "Booking confirmation by '".$res_det[0]['restaurant_name']."' ['".$order_num."']";
                    					$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/bookTableAcceptMailToAdmin.tpl");
                    					$mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
                    					$mail_content = str_replace('{SITE_TITLE}',$CFG['site']['sitename'],$mail_content);
                    					$mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
                    					$mail_content = str_replace('{SITE_DOMAIN}',$CFG['site']['sitedomain'],$mail_content);
                    					$mail_content = str_replace('{ORDERNUMBER}',$order_num,$mail_content);
                    					$mail_content = str_replace('{CUSTOMERADDRESS}',$cus_address,$mail_content);
                    					$mail_content = str_replace('{RESTAURANT}',$res_det[0]['restaurant_name'],$mail_content);
                    					$mail_content = str_replace('{RESTAURANTWEB}',$res_det[0]['restaurant_website'],$mail_content);
                    					
                    					$this->sendMail($fromname,$toemail,$fromemail,$mailsubject,$mail_content, $mail_attachment_name='', $mail_attachment_content='');
                                    }
                            }
        				elseif($changestatusval == 'accept' ||  $changestatusval == 'reject')
                            {
                                //echo "hi";
            					$ord_upd = "UPDATE ".$CFG['table']['order']." SET res_comm_perchantage = '',res_comm_price = '',res_order_delivereddate = '' WHERE orderid = '".$maincateid."'";
            					$res_upd = mysqli_query($this->DBCONN,$ord_upd) or die(mysqli_error($this->DBCONN));
                                
                               // echo"sfdfdfd=>". $res_upd;
        					
        					    if($changestatusval == 'reject')
                                    {
                						$fail_reason	= $this->filterInput($_REQUEST['reason']);
                						$res_id  = $this->getvalue("restaurant_id",$CFG['table']['order'],"orderid = '".$maincateid."' ");
                						
                						$res_det 	= $this->getMultiValue("restaurant_name,restaurant_phone, restaurant_website, restaurant_streetaddress, restaurant_city, restaurant_state, restaurant_zip, restaurant_contact_name, restaurant_contact_email, restaurant_website",$CFG['table']['restaurant'],"restaurant_id = '".$res_id."'");
                						$cus_det	= $this->getMultiValue("ordergenerateid, customername, customerlastname, customeremail, customercellphone, deliverydoornumber, deliverystreet, deliverycity, deliverystate, deliveryzip",$CFG['table']['order'],"orderid = '".$maincateid."' "); 
                						
                						$cus_city	= $this->getValue("cityname",$CFG['table']['city'],"city_id='".$this->filterInput($cus_det[0]['deliverycity'])."'");
                						$cus_state	= $this->getValue("statename",$CFG['table']['state'],"state_id='".$this->filterInput($cus_det[0]['deliverystate'])."'");
                						
                                        /*#Send GCM Notification For Android 
                                        $gcm_res = $this->getValue('gcm_register_id',$CFG['table']['gcm'],"order_id AND status = '1'");
                                        if(isset($gcm_res) && !empty($gcm_res)){
                                            $this->sendGCMnotification('completed',trim($gcm_res[0]['gcm_register_id']),trim($cus_det[0]['ordergenerateid']),trim(stripslashes($res_det[0]['restaurant_name'])),$fail_reason);
                                        }*/
                                        
                						#Send Failure Mail To Customer From Restaurant
                						$fromname	= stripcslashes($res_det[0]['restaurant_name']);
                						$fromemail	= stripcslashes($res_det[0]['restaurant_contact_email']);
                						$toemail	= stripcslashes($cus_det[0]['customeremail']);
                						
                						//Content
                						$order_num			 = $cus_det[0]['ordergenerateid'];
                						$cus_address		 = '<tr>
                												<td align="left" valign="top" width="17%">Delivery Address : </td>
                												<td align="left" valign="top">
																	<table>
                    													<tr><td align="left" valign="top">'.$cus_det[0]['deliverydoornumber'].'</td></tr>
                														<tr><td align="left" valign="top">'.$cus_det[0]['deliverystreet'].'</td></tr>
                														<tr><td align="left" valign="top">'.$cus_city.'</td></tr>
                														<tr><td align="left" valign="top">'.$cus_state.'-'.$cus_det[0]['deliveryzip'].'</td></tr>
                														<tr><td align="left" valign="top">'.$cus_det[0]['customercellphone'].'</td></tr>
																	</table>
																</td>
                											</tr>';
                							
                						$mailsubject  = "Delivery Failure of '".$CFG['site']['sitename']."' ['".$order_num."']";
                						$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/bookTableRejectMail.tpl");
                						$mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
                						$mail_content = str_replace('{SITE_TITLE}',$CFG['site']['sitename'],$mail_content);
                						$mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
                						$mail_content = str_replace('{SITE_DOMAIN}',$CFG['site']['sitedomain'],$mail_content);
                						$mail_content = str_replace('{REASON}',$fail_reason,$mail_content);
                						$mail_content = str_replace('{CUSTOMER_NAME}',$cus_det[0]['customername'],$mail_content);
                						$mail_content = str_replace('{CUSTOMER_LAST_NAME}',$cus_det[0]['customerlastname'],$mail_content);
                						$mail_content = str_replace('{ORDERNUMBER}',$order_num,$mail_content);
                						$mail_content = str_replace('{CUSTOMERADDRESS}',$cus_address,$mail_content);
                						$mail_content = str_replace('{RESTAURANT}',$res_det[0]['restaurant_name'],$mail_content);
                						
                						$ok = $this->sendMail($fromname,$fromemail,$toemail,$mailsubject,$mail_content, $mail_attachment_name='', $mail_attachment_content='');
                						if($ok)
                                            {
                    							#Send Failure Mail To Site Admin From Restaurant
                    							$fromname	= stripcslashes($res_det[0]['restaurant_name']);
                    							$fromemail	= stripcslashes($res_det[0]['restaurant_contact_email']);
                    							$toemail	= stripcslashes($CFG['site']['adminemail']);
                    							
                    							//Content
                    							$order_num			 = $cus_det[0]['ordergenerateid'];
                    							$cus_address		 = '<tr>
                    													<td align="left" valign="top" width="17%">Delivery Address : </td>
                    													<td align="left" valign="top">
																			<table>
                    															<tr><td align="left" valign="top">'.$cus_det[0]['deliverydoornumber'].'</td></tr>
                    															<tr><td align="left" valign="top">'.$cus_det[0]['deliverystreet'].'</td></tr>
                    															<tr><td align="left" valign="top">'.$cus_city.'</td></tr>
                    															<tr><td align="left" valign="top">'.$cus_state.'-'.$cus_det[0]['deliveryzip'].'</td></tr>
                    													
                    															<tr><td align="left" valign="top">'.$cus_det[0]['customercellphone'].'</td></tr>
																			</table>
																		</td>
                    												</tr>';
                    							
                    							
                    							$mailsubject  = "Delivery Failure of '".$CFG['site']['sitename']."' ['".$order_num."']";
                    							$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/bookTableRejectMailToAdmin.tpl");
                    							$mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
                    							$mail_content = str_replace('{SITE_TITLE}',$CFG['site']['sitename'],$mail_content);
                    							$mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
                    							$mail_content = str_replace('{SITE_DOMAIN}',$CFG['site']['sitedomain'],$mail_content);
                    							$mail_content = str_replace('{REASON}',$fail_reason,$mail_content);
                    							$mail_content = str_replace('{CUSTOMER_NAME}',$CFG['site']['sitename'],$mail_content);
                    						
                    							$mail_content = str_replace('{ORDERNUMBER}',$order_num,$mail_content);
                    							$mail_content = str_replace('{CUSTOMERADDRESS}',$cus_address,$mail_content);
                    							$mail_content = str_replace('{RESTAURANT}',$res_det[0]['restaurant_name'],$mail_content);
                    							
                    							$this->sendMail($fromname,$toemail,$fromemail,$mailsubject,$mail_content, $mail_attachment_name='', $mail_attachment_content='');	
                    						}
            					       }
        				        }
        	            if( $filedname == 'lang_site' && $changestatusval = 'Yes')
                            {
                                //echo "hidfdsfdsf";
            	            	$_SESSION['lan'] = $this->getValue("lang_code",$CFG['table']['language'],$upid." = '".$maincateid."' AND lang_site ='Yes' LIMIT 1");
            	            }
        				echo 'success';exit;	
        			}			
    		}
	}
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    #........................................................................................
	#DELETE
	/**
	 * Admin::Delete_Admin()
	 * 
	 * @return
	 */
	function Delete_Admin()
        {
    		global $CFG,$admin_smarty;
    		
    		$sel_id 		= $_POST['checkedvaluesarr'];
    		$tablename 		= $_POST['tablename'];
    		$upid 			= $_POST['whereField'];
    		$filetype		= $_POST['filetype'];
            		
    		
    	    if(is_array($sel_id)) 
                {
        	        foreach($sel_id as $x => $value)
                        {
            	        	#language folder delete
            		        if($filetype == 'language')
                                {				
                					$langCode = $this->getValue('lang_code',$tablename,$upid .'='. $value);					
                					$this->removee_directory($CFG['site']['language_path'].'/'.$langCode);
                                    
                                    $sql_user = "DELETE FROM ".$tablename." WHERE ".$upid." = '".$value."'";
                                	$res_user = mysqli_query($this->DBCONN,$sql_user) or die(mysqli_error($this->DBCONN));
                				}
                            elseif($filetype == 'Order')
                                {	
                			    	$order_del	= "UPDATE ".$tablename." SET delete_status = 'Yes' WHERE ".$upid." = '".$value."'";
                			    	$this->ExecuteQuery($order_del,'update');	
                					//echo 'success';exit;
                				}
                            elseif($filetype == 'customer')
                                {
                					$cus_del	= "UPDATE ".$tablename." SET delete_status = 'Yes' WHERE ".$upid." = '".$value."'";
                			    	$this->ExecuteQuery($cus_del,'update');
                					//echo 'success';exit;
                				}
                            elseif($filetype == 'Menu')
                                {
                					$menu_del	= "UPDATE ".$tablename." SET delete_status = 'Yes' WHERE ".$upid." = '".$value."'";
                			    	$this->ExecuteQuery($menu_del,'update');
                					//echo 'success';exit;
                				}
                            elseif($filetype == 'category')
                                {
                					$cat_del	= "UPDATE ".$tablename." SET delete_status = 'Yes' WHERE ".$upid." = '".$value."'";
                			    	$this->ExecuteQuery($cat_del,'update');
                					//echo 'success';exit;
                				}
                            elseif($filetype == 'cuisine')
                                {
                					$cat_del	= "UPDATE ".$tablename." SET delete_status = 'Yes' WHERE ".$upid." = '".$value."'";
                			    	$this->ExecuteQuery($cat_del,'update');
                					//echo 'success';exit;
                				}
                            else
                                {
                					$sql_user = "DELETE FROM ".$tablename." WHERE ".$upid." = '".$value."'";
                                	$res_user = mysqli_query($this->DBCONN,$sql_user) or die(mysqli_error($this->DBCONN));
                				}	
            	        }
        	        echo 'success';exit;
        	    }
            elseif($filetype == 'restaurant')
                {
        	    	
        	    	$restaurant_del	= "UPDATE ".$tablename." SET delete_status = 'Yes' WHERE restaurant_id = '".$_POST['maincateid']."'";
        	    	$this->ExecuteQuery($restaurant_del,'update');
        	    	
        			echo 'success';exit;
        		}
            elseif($filetype == 'order_delete')
                {
        	    	
        	    	$order_del	= "UPDATE ".$tablename." SET delete_status = 'Yes' WHERE ".$upid." = '".$_POST['maincateid']."'";
        	    	$this->ExecuteQuery($order_del,'update');
        	    	
        			echo 'success';exit;
        		}
            elseif($filetype == 'delete_menu')
                {
        			$menu_del	= "UPDATE ".$tablename." SET delete_status = 'Yes' WHERE ".$upid." = '".$_POST['maincateid']."'";
        	    	$this->ExecuteQuery($menu_del,'update');
        	    	
        			echo 'success';exit;
        		}
            elseif($filetype == 'delete_category')
                {
        			$category_del	= "UPDATE ".$tablename." SET delete_status = 'Yes' WHERE ".$upid." = '".$_POST['maincateid']."'";
        	    	$this->ExecuteQuery($category_del,'update');
        	    	
        			echo 'success';exit;
        		}
            elseif($filetype == 'delete_cuisine')
                {
        			$category_del	= "UPDATE ".$tablename." SET delete_status = 'Yes' WHERE ".$upid." = '".$_POST['maincateid']."'";
        	    	$this->ExecuteQuery($category_del,'update');
        	    	
        			echo 'success';exit;
        		}
            elseif($filetype == 'customer')
                {
        			$menu_del	= "UPDATE ".$tablename." SET delete_status = 'Yes' WHERE ".$upid." = '".$_POST['maincateid']."'";
        	    	$this->ExecuteQuery($menu_del,'update');
        	    	
        			echo 'success';exit;
        		}
            else
                {	
        	    	#language folder delete
        	    	if($filetype == 'language')
                        {			
            				$langCode = $this->getValue('lang_code',$tablename,$upid .'='. $_POST['maincateid']);
            				$this->removee_directory($CFG['site']['language_path'].'/'.$langCode);
            			}
        			$sql_user = "DELETE FROM ".$tablename." WHERE ".$upid." = '".$_POST['maincateid']."' LIMIT 1";
                    $res_user = mysqli_query($this->DBCONN,$sql_user) or die(mysqli_error($this->DBCONN));
                    echo 'success';exit;
        		}		
        }
    //Restaurant full delete
    /**
     * Admin::RestaurantFullDelete()
     * 
     * @return
     */
    function RestaurantFullDelete()
        {
    		global $CFG,$admin_smarty;
            
			$id								= $_POST['maincateid'];
	    	$restaurant						= $CFG['table']['restaurant'];
	    	$restaurant_addon				= $CFG['table']['restaurant_addons'];
	    	$restaurant_booking				= $CFG['table']['restaurant_booking'];
	    	$restaurant_cart				= $CFG['table']['restaurant_cart'];
	    	$restaurant_payment				= $CFG['table']['restaurant_choose_paymentoption'];
	    	$restaurant_menu				= $CFG['table']['restaurant_menu']; 
	    	$restaurant_menuaddons			= $CFG['table']['restaurant_menuaddons']; 
	    	$restaurant_offer				= $CFG['table']['restaurant_offer']; 
	    	$restaurant_pizza_addons		= $CFG['table']['restaurant_pizza_addons'];
	    	$restaurant_pizza_slice			= $CFG['table']['restaurant_pizza_slice'];
	    	$restaurant_reviews				= $CFG['table']['restaurant_reviews'];
	    	$restaurant_serving_cuisines	= $CFG['table']['restaurant_serving_cuisines'];
	    	$restaurant_timing				= $CFG['table']['restaurant_timing'];
	    	$sel_id 						= $_POST['checkedvaluesarr'];
    	    	
	    	if(is_array($sel_id)) 
                {
    		        foreach($sel_id as $x => $value)
                        {	
        		        	$del_res	= "DELETE FROM ".$restaurant." WHERE restaurant_id = '".$value."'";
        	    			$ok			= $this->ExecuteQuery($del_res,'delete');
        	    			if($ok)
                                {
            						$del_addon	= "DELETE FROM ".$restaurant_addon." WHERE restaurant_id = '".$value."'";
            						$this->ExecuteQuery($del_addon,'delete');
            						
            						$del_cart	= "DELETE FROM ".$restaurant_cart." WHERE restaurantid = '".$value."'";
            						$this->ExecuteQuery($del_cart,'delete');
            						
            						$del_menu	= "DELETE FROM ".$restaurant_menu." WHERE restaurant_id = '".$value."'";
            						$this->ExecuteQuery($del_menu,'delete');
            						
            						$del_menuaddons	= "DELETE FROM ".$restaurant_menuaddons." WHERE menuaddons_restaurantid = '".$value."'";
            						$this->ExecuteQuery($del_menuaddons,'delete');
            						
            						$del_offer	= "DELETE FROM ".$restaurant_offer." WHERE restaurant_id = '".$value."'";
            						$this->ExecuteQuery($del_offer,'delete');
            						
            						$del_pizzaaddons	= "DELETE FROM ".$restaurant_pizza_addons." WHERE pizza_addons_restaurantid = '".$value."'";
            						$this->ExecuteQuery($del_pizzaaddons,'delete');
            						
            						$del_pizzaslice	= "DELETE FROM ".$restaurant_pizza_slice." WHERE pizza_slice_restaurantid = '".$value."'";
            						$this->ExecuteQuery($del_pizzaslice,'delete');
            						
            						$del_serving	= "DELETE FROM ".$restaurant_serving_cuisines." WHERE restaurant_id = '".$value."'";
            						$this->ExecuteQuery($del_serving,'delete');
            						
            						$del_timeing	= "DELETE FROM ".$restaurant_timing." WHERE restaurant_id = '".$value."'";
            						$this->ExecuteQuery($del_timeing,'delete');
            						echo "success"; exit;	
            					}
        		            $sql_user = "DELETE FROM ".$tablename." WHERE ".$upid." = '".$value."'";
        	                $res_user = mysqli_query($this->DBCONN,$sql_user) or die(mysqli_error($this->DBCONN));
        		        }
    		    }
                else
                    {	
        		    	$del_res	= "DELETE FROM ".$restaurant." WHERE restaurant_id = '".$id."'";
        		    	$ok			= $this->ExecuteQuery($del_res,'delete');
        		    	if($ok)
                            {	
            					$del_addon	= "DELETE FROM ".$restaurant_addon." WHERE restaurant_id = '".$id."'";
            					$this->ExecuteQuery($del_addon,'delete');
            					
            					$del_cart	= "DELETE FROM ".$restaurant_cart." WHERE restaurantid = '".$id."'";
            					$this->ExecuteQuery($del_cart,'delete');
            					
            					$del_menu	= "DELETE FROM ".$restaurant_menu." WHERE restaurant_id = '".$id."'";
            					$this->ExecuteQuery($del_menu,'delete');
            					
            					$del_menuaddons	= "DELETE FROM ".$restaurant_menuaddons." WHERE menuaddons_restaurantid = '".$id."'";
            					$this->ExecuteQuery($del_menuaddons,'delete');
            					
            					$del_offer	= "DELETE FROM ".$restaurant_offer." WHERE restaurant_id = '".$id."'";
            					$this->ExecuteQuery($del_offer,'delete');
            					
            					$del_pizzaaddons	= "DELETE FROM ".$restaurant_pizza_addons." WHERE pizza_addons_restaurantid = '".$id."'";
            					$this->ExecuteQuery($del_pizzaaddons,'delete');
            					
            					$del_pizzaslice	= "DELETE FROM ".$restaurant_pizza_slice." WHERE pizza_slice_restaurantid = '".$id."'";
            					$this->ExecuteQuery($del_pizzaslice,'delete');
            					
            					$del_serving	= "DELETE FROM ".$restaurant_serving_cuisines." WHERE restaurant_id = '".$id."'";
            					$this->ExecuteQuery($del_serving,'delete');
            					
            					$del_timeing	= "DELETE FROM ".$restaurant_timing." WHERE restaurant_id = '".$id."'";
            					$this->ExecuteQuery($del_timeing,'delete');
            					echo "success"; exit;	
            				}
        			}
    	}
	//Restore Restaurant Details
	/**
	 * Admin::RestoreProcess()
	 * 
	 * @return
	 */
	function RestoreProcess()
        {
    		global $CFG,$admin_smarty;
            
    		$tablename 		= $_POST['tablename'];
    		$upid 			= $_POST['whereField'];
    		$filetype		= $_POST['filetype'];
            	
    		if($filetype == 'restaurant')
                {
        			$res_restore	= "UPDATE ".$tablename." SET delete_status = 'No' WHERE restaurant_id = '".$_POST['maincateid']."'";
        		    $this->ExecuteQuery($res_restore,'update');
        			echo "success"; exit;
        		}
            elseif($filetype == 'order_delete')
                {
        			$order_del	= "UPDATE ".$tablename." SET delete_status = 'No' WHERE ".$upid." = '".$_POST['maincateid']."'";
        	    	$this->ExecuteQuery($order_del,'update');
        			echo 'success';exit;
        		}
            elseif($filetype == 'delete_menu')
                {
        			$order_del	= "UPDATE ".$tablename." SET delete_status = 'No' WHERE ".$upid." = '".$_POST['maincateid']."'";
        	    	$this->ExecuteQuery($order_del,'update');
        			echo 'success';exit;
        		}
            elseif($filetype == 'delete_category')
                {
        			$order_del	= "UPDATE ".$tablename." SET delete_status = 'No' WHERE ".$upid." = '".$_POST['maincateid']."'";
        	    	$this->ExecuteQuery($order_del,'update');
        			echo 'success';exit;
        		}
            elseif($filetype == 'delete_cuisine')
                {
        			$order_del	= "UPDATE ".$tablename." SET delete_status = 'No' WHERE ".$upid." = '".$_POST['maincateid']."'";
        	    	$this->ExecuteQuery($order_del,'update');
        			echo 'success';exit;
        		}
            elseif($filetype == 'customer')
                {
        			$order_del	= "UPDATE ".$tablename." SET delete_status = 'No' WHERE ".$upid." = '".$_POST['maincateid']."'";
        	    	$this->ExecuteQuery($order_del,'update');
        			echo 'success';exit;
        		}
    		
    	}
    //Remove Directory   
    /**
     * Admin::removee_directory()
     * 
     * @return
     */
    function removee_directory($dir) 
        {
    	   if (is_dir($dir)) 
               {
                    $objects = scandir($dir);
                    foreach ($objects as $object) 
                        {
                            if ($object != "." && $object != "..") 
                                {
                                    if (filetype($dir."/".$object) == "dir") $this->removee_directory($dir."/".$object); else unlink($dir."/".$object);
                                }
                        }
        	       reset($objects);
        	       rmdir($dir);
        	   }
    	 }
         
    #----------------------------------------------------------------------------------------
    #Modules Name list in main menu
    function moduleslist_mainmenu(){
        global $CFG,$admin_smarty;
        
        //echo "adminid============".$_SESSION['adminid'];
      
        $sel = "SELECT id, modulesname, page_url FROM ".$CFG['table']['modules']." WHERE parent_id = '0' AND status = '1' ";
        
        
        $res = $this->ExecuteQuery($sel,'select');
        
        foreach($res as $key=>$value){
            $res[$key]['menucount'] = $this->getNumvalues($CFG['table']['modules'],"parent_id='".$res[$key]['id']."'");
        }
        
        //echo "<pre>";print_r($res);echo "</pre>";
        $admin_smarty->assign("mainModulesList", $res);
    } 
    #Moduleslist_user
    function moduleslist_user(){
        
        global $CFG,$admin_smarty;
              
        $sel1 = "SELECT id, modulesname, page_url FROM ".$CFG['table']['modules']." WHERE parent_id = '0' AND status = '1' AND module_status = '1' ";
        
        $res1 = $this->ExecuteQuery($sel1,'select');
        
        foreach($res1 as $key=>$value){
            $res1[$key]['menucount'] = $this->getNumvalues($CFG['table']['modules'],"parent_id='".$res1[$key]['id']."'");
        }
        
        //echo "<pre>";print_r($res);echo "</pre>";
        $admin_smarty->assign("userModulesList1", $res1);
    }    
    #--------------------------------------------------------------------------------
    #Sub menu List
    function selectSubMenu($subid){
        global $CFG,$admin_smarty;
        
        $subsel = "SELECT id, modulesname, page_url FROM ".$CFG['table']['modules']." WHERE parent_id = '".$subid."' AND status = '1' ";
        $subres = $this->ExecuteQuery($subsel,'select');

        return $subres;
        //echo "<pre>";print_r($subres);echo "</pre>";
        $admin_smarty->assign("subModulesList", $subres);

        return $subres;
        #echo "<pre>";print_r($subres);echo "</pre>";
        #$admin_smarty->assign("subModulesList", $subres);

        return $subres;
    }
    #--------------------------------------------------------------------------------
    #moduleslist_currentUser
    function moduleslist_currentUser(){
        global $CFG,$admin_smarty;
        
        $userUsedModule = $this->getMultiValue("modules",$CFG['table']['modulesuser_list'],"userid='".$_SESSION['adminid']."'");
        $admin_smarty->assign("userModulesList",$userUsedModule);
        $admin_smarty->assign("userUsedModulesList",$userUsedModule);
        
        $userUsedModule123 = $this->getValue("modules",$CFG['table']['admin'],"admin_id='".$_SESSION['adminid']."' AND log_status = '1' AND admin_id != '1' ");
        $userUsedModule2 = $this->getMultiValue("modules",$CFG['table']['admin'],"admin_id='".$_SESSION['adminid']."' AND log_status = '1' AND admin_id != '1' ");
        $getmodulesids = explode(",",$userUsedModule123);
        $firstmodulesid = $getmodulesids[0]; 
       	foreach($getmodulesids as $key1=>$value){
       		if($getmodulesids[$key1] == '11'){
				$admin_smarty->assign("orderpage",'orderpage'); 
			}
			if($getmodulesids[$key1] == '45'){
				$admin_smarty->assign("customermanage",'customermanage'); 
			}
			if($getmodulesids[$key1] == '39'){
				$admin_smarty->assign("restaurantmanage",'restaurantmanage'); 
			}
        }	
        //echo "<pre>";print_r($getmodulesids);echo "</pre>";
        $lastmodulesid = end($getmodulesids); 
        $admin_smarty->assign("firstmodulesid",$firstmodulesid); 
        $admin_smarty->assign("lastmodulesid",$lastmodulesid);  
		$admin_smarty->assign("getmodulelist",$getmodulesids1);   
        
    }
     #Current Admin Name
    function current_Admin(){
         global $CFG,$admin_smarty;
         //echo "<pre>";print_r($_SESSION);echo "</pre>";
         $currentUser = $this->getValue("username",$CFG['table']['admin'],"admin_id='".$_SESSION['adminid']."' AND log_status = '1' ");
         //echo "currentuser".$currentUser.
         $admin_smarty->assign("currentUser",$currentUser);   
    }    
    
    #User AddEdit 
    function addNewUser(){
        global $CFG,$admin_smarty;
        
        //echo "<pre>";print_r($_REQUEST);echo "</pre>";
        //exit ;
        
        $username     = $this->filterInput($_POST['username']);
        $useremail    = $this->filterInput($_POST['useremail']);
        $userpassword = $this->filterInput($_POST['userpassword']);
        $restuarantid = $this->filterInput($_POST['restaurantname']);
        $userdesignation     = $this->filterInput($_POST['userdesignation']);
        //echo "<pre>";print_r($_REQUEST);echo "</pre>";
        //exit;
        
        $usermodules = $_POST['modules'];
		if(isset($usermodules) && !empty($usermodules)){
			for($i=0;$i<count($usermodules);$i++){
				$modules = implode(",",$usermodules);
			}
		}
        
        $usertype = $this->filterInput($_POST['modulestype']);
        
        $getUserCnt = $this->getNumvalues($CFG['table']['admin'],"username = '".$username."'");
        
        if($getUserCnt == '0'){
        
            $ins_user = "INSERT INTO 
                                    ".$CFG['table']['admin']." 
                                  SET
                                    username      = '".$username."',
                                    password      = '".$userpassword."',
                                    modules       = '".$modules."',
                                    user_designation	  = '".$userdesignation."',	
                                    log_status    = '1' ";
            $res_user = $this->ExecuteQuery($ins_user,'insert');
            
            if($res_user){
                
                for($i=0;$i<count($usermodules);$i++){
    				$ins_modu = "INSERT INTO ".$CFG['table']['modulesuser_list']." SET userid = '".$res_user."', useremail = '".$useremail."', modules = '".$usermodules[$i]."' ";
    				$res_modu = $this->ExecuteQuery($ins_modu,'insert');
    			}
            }
            $this->redirectUrl("userManage.php");
        }else{
            $admin_smarty->assign('errormsg', 'Name '. $username .' Already Exits');
        }
    }
    
    #EDit User
    function editUser($uid){
        global $CFG,$admin_smarty;
        
        $username     = $this->filterInput($_POST['username']);
        $useremail    = $this->filterInput($_POST['useremail']);
        $userpassword = $this->filterInput($_POST['userpassword']);
        $restuarantid = $this->filterInput($_POST['restaurantname']);
        $userdesignation     = $this->filterInput($_POST['userdesignation']);
        
        $usertype = $this->filterInput($_POST['modulestype']);
        
        $usermodules = $_POST['modules'];
		if(isset($usermodules) && !empty($usermodules)){
			for($i=0;$i<count($usermodules);$i++){
				$modules = implode(",",$usermodules);
			}
		}
        $getUserCnt = $this->getNumvalues($CFG['table']['admin'],"username = '".$username."' AND admin_id != '".$uid."'");
        if($getUserCnt == '0'){
            $ins_user = "UPDATE  
                                ".$CFG['table']['admin']." 
                              SET
                                username      = '".$username."',
                                password      = '".$userpassword."',
                                modules       = '".$modules."',
                            	user_designation	  = '".$userdesignation."',	
                                log_status    = '1'
                              WHERE admin_id  = '".$uid."' ";
            $res_user = $this->ExecuteQuery($ins_user,'insert');
            
            //if($res_user){
                
                #Modules List
    			$trunc_tab = "DELETE FROM ".$CFG['table']['modulesuser_list']." WHERE userid = '".$uid."' ";
    			$trunc_res = mysqli_query($this->DBCONN,$trunc_tab) or die(mysqli_error($this->DBCONN));
                
                for($i=0;$i<count($usermodules);$i++){
    				$ins_modu = "INSERT INTO ".$CFG['table']['modulesuser_list']." SET userid = '".$uid."', useremail = '".$useremail."', modules = '".$usermodules[$i]."' ";
    				$res_modu = $this->ExecuteQuery($ins_modu,'insert');
    			}
            //}
            $this->redirectUrl("userManage.php");
        }
        else{
            $admin_smarty->assign('errormsg', 'Name '. $username .' Already Exits');
        }
    }
    #User Manage
    #--------------------------------------------------------------------------------
	#usersList 
	function usersList(){
		global $CFG,$admin_smarty;
		$req_keyword        = $this->filterInput($_REQUEST['keyword']);
		#sort order
		if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'aasc'){
			$sort = " ORDER BY username ASC";
			$fields .= "&sortby=".$_REQUEST['sortby'];
		}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'adesc'){
			$sort = " ORDER BY username DESC";
			$fields .= "&sortby=".$_REQUEST['sortby'];
		}else{
			$sort = " ORDER BY username ASC";
		}
		
		#Status
		if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
			$condition .= " AND log_status = '1' ";
		}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
			$condition .= " AND log_status = '0' ";
		}
				
		if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
			$limit = $_REQUEST['limit'];
			$fields = "&limit=$_REQUEST[limit]";
		 }else{
			$limit = PAGELIMIT; 	
		 }
		 							
		$page = $_REQUEST['page'];
		if ($page == 0) $page = 1;
		if($page) 
			$start = ($page - 1) * $limit; 			
		else
			$start = 0;
			
		 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
		 {
		   $sql_lim = $_REQUEST['limit'];
		 }else{
			$sql_lim = "$start, $limit";
		 }
		
		 #Keyword
		 if( isset($req_keyword) && !empty($req_keyword) ){
			$keyword = "&keyword=$_REQUEST[keyword]";
			$condition.="AND username LIKE '%".addslashes($req_keyword)."%' ";
			$fields .= "&keyword=$_REQUEST[keyword]";
		 }
		 
		
		$sql_sel = "SELECT admin_id, username, log_status FROM ".$CFG['table']['admin']." WHERE admin_id != '1' AND admin_id IS NOT NULL $condition $sort";
		$total_pages = $this->ExecuteQuery($sql_sel,'norows');
		
		$targetpage = "userManage.php"; 
		$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
		$sql_limit = $sql_sel." LIMIT ".$sql_lim;
		$result = mysqli_query($this->DBCONN, $sql_limit) or die(mysqli_error($this->DBCONN));
		$cnt = 1;
		while($row_seller = mysqli_fetch_array($result)){
			$row_seller['sno'] = (($page-1)*$limit)+$cnt;
            //$row_seller['usertype'] = $this->getValue("modules",$CFG['table']['modules_type'],"id = '".$row_seller['usertype']."'");
			$userlist[] =$row_seller;
			$cnt++;
		}
		
		#From & To Records
		 if($page == 1){
			$fromRecords 	= 1;
			$toRecords		= $limit;
			if($toRecords >= $total_pages) $toRecords	= $total_pages;
		}else{
			$fromRecords 	= $start+1;
			$toRecords		= $start+$limit;
			if($toRecords >= $total_pages) $toRecords	= $total_pages;
		}
		
		
		$admin_smarty->assign("tablename",$CFG['table']['admin']);
		$admin_smarty->assign("whereField",'admin_id');
		//$admin_smarty->assign("fieldname",'status');
		$admin_smarty->assign("fieldname",'log_status');
		$admin_smarty->assign("word",'User');
		$admin_smarty->assign("filename",'userManage.php');
		$admin_smarty->assign("page",$page);
		
		$admin_smarty->assign("totalRecords", $total_pages);
		$admin_smarty->assign("fromRecords", $fromRecords);
		$admin_smarty->assign("toRecords", $toRecords);
		$admin_smarty->assign("limit", $limit);
		
		
		$admin_smarty->assign("userlist", $userlist);
		$admin_smarty->assign("pagination", $next_page);
	}
	/*#........................................................................................
	#Change Feature to Normal
	function changeFeatureRestaurant(){
    	global $CFG;
    	
		$sel_id 		 = $_POST['checkedvaluesarr'];
		$tablename 		 = $_POST['tablename'];
		$filedname 		 = $_POST['fieldname'];
		$changestatusval = $_POST['changestatusval'];
		$upid 			 = $_POST['whereField'];
		
		if( isset($sel_id) && is_array($sel_id) ) {
	        foreach($sel_id as $x => $value){
	        	
	            $sel_del = "UPDATE ".$tablename." SET ".$filedname." = '".$changestatusval."' WHERE ".$upid." = '".$value."'";
	            $res_del = mysqli_query($sel_del) or die(mysqli_error());
	        }
	        echo 'success';exit;
	    }else{
			if(isset($_POST['maincateid']) && !empty($_POST['maincateid'])){
				
				$sel_del = "UPDATE ".$tablename." SET ".$filedname." = '".$changestatusval."' WHERE ".$upid." = '".$_POST['maincateid']."'";
	            $res_del = mysqli_query($sel_del) or die(mysqli_error());
				echo 'success';exit;	
			}			
		}
	}*/
	
    
}
?>