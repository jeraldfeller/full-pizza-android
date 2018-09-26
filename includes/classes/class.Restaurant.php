<?php

/*	Class Function for Restaurant ADMIN RESTAURANT MANAGEMENT	*/

/**
 * Restaurant
 * 
 * @package 
 * @author gencyolcu
 * @copyright 2014
 * @version $Id$
 * @access public
 */
class Restaurant extends Site
{

    var $restaurant_name;
    var $restaurant_phone;
    var $restaurant_website;
    var $restaurant_streetaddress;
    var $restaurant_city;
    var $restaurant_state;
    var $restaurant_zip;
    var $restaurant_contact_name;
    var $restaurant_contact_phone;
    var $restaurant_contact_email;
    var $restaurant_fax;
    #Login
    var $restaurant_logemail;
    var $restaurant_logpassword;

    /**
     * Restaurant::__construct()
     * 
     * @return
     */
    function __construct()
    {

        parent::__construct();
        #Restaurant
        if (array_key_exists("restaurant_name", $_POST))
        {
            $this->restaurant_name = $this->filterInput($_POST['restaurant_name']);
        }
        if (array_key_exists("restaurant_website", $_POST))
        {
            $this->restaurant_website = $this->filterInput($_POST['restaurant_website']);
        }
        if (array_key_exists("restaurant_streetaddress", $_POST))
        {
            $this->restaurant_streetaddress = $this->filterInput($_POST['restaurant_streetaddress']);
        }
        if (array_key_exists("restaurant_city", $_POST))
        {
            $this->restaurant_city = $this->filterInput($_POST['restaurant_city']);
        }
        if (array_key_exists("restaurant_state", $_POST))
        {
            $this->restaurant_state = $this->filterInput($_POST['restaurant_state']);
        }
        if (array_key_exists("restaurant_zip", $_POST))
        {
            $this->restaurant_zip = $this->filterInput($_POST['restaurant_zip']);
        }

        if (array_key_exists("restaurant_contact_name", $_POST))
        {
            $this->restaurant_contact_name = $this->filterInput($_POST['restaurant_contact_name']);
        }
        if (array_key_exists("restaurant_contact_phone", $_POST))
        {
            $this->restaurant_contact_phone = $this->filterInput($_POST['restaurant_contact_phone']);
        }
        if (array_key_exists("restaurant_contact_email", $_POST))
        {
            $this->restaurant_contact_email = $this->filterInput($_POST['restaurant_contact_email']);
        }
        if (array_key_exists("restaurant_phone", $_POST))
        {
            $this->restaurant_phone = $this->filterInput($_POST['restaurant_phone']);
        }
        if (array_key_exists("restaurant_fax", $_POST))
        {
            $this->restaurant_fax = $this->filterInput($_POST['restaurant_fax']);
        }
        #Login
        if (array_key_exists("restaurant_logemail", $_POST))
        {
            $this->restaurant_logemail = $this->filterInput($_POST['restaurant_logemail']);
        }
        if (array_key_exists("restaurant_logpassword", $_POST))
        {
            $this->restaurant_logpassword = $this->filterInput($_POST['restaurant_logpassword']);
        }

    }
    #-------------------------------------------------------------------------------------------
    #check Authentic
    /**
     * Restaurant::restaurant_authetic()
     * 
     * @return
     */
    function restaurant_authetic()
    {
        global $CFG;

        if (isset($_SESSION['restaurantownerid']) && !empty($_SESSION['restaurantownerid']))
        {
            if ($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook' ){
                
                $this->redirectUrl($CFG['site']['base_url'].'/restaurantOwnerMyaccount.php');
    		}else{
                $this->redirectUrl($CFG['site']['base_url'].'/restaurant-myaccount');
    		}

        }
    }
    #check Authentic
    /**
     * Restaurant::restaurant_unauthetic()
     * 
     * @return
     */
    function restaurant_unauthetic()
    {
        global $CFG;

        if (!isset($_SESSION['restaurantownerid']) && empty($_SESSION['restaurantownerid']))
        {
            if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook' ){
                
                $this->redirectUrl($CFG['site']['base_url'].'/restaurantOwnerLogin.php');
    		}else{
                $this->redirectUrl($CFG['site']['base_url'].'/restaurant-login');
    		}
        }
    }
    #-------------------------------------------------------------------------------------------
    #Restaurant Owner Add New
    /**
     * Restaurant::restaurantOwnerRegister()
     * 
     * @return
     */
    function restaurantOwnerRegister()
    {
        global $CFG, $objSmarty;
        //echo "<pre>";print_r($_REQUEST);echo "</pre>";
        $pass = time();
        $password = substr(md5($pass), 0, 7);
        $restaurantseourl = $this->seoUrl($_POST['restaurant_name']);

        #baseencode for
        $encode_password = base64_encode($password);

        #newmethod for encryption
        $restaurantpass = $this->encrypt_password_md5($password);
        //echo $restaurantpass;

        $countresname = $this->getNumvalues($CFG['table']['restaurant'],"restaurant_name='" . $this->restaurant_name . "'");
        $countresemail = $this->getNumvalues($CFG['table']['restaurant'], "restaurant_contact_email='" . $this->restaurant_contact_email . "'");

        //if ($countresname == 0)
        //{
            if ($countresemail == '0')
            {
                $ins_rest = "INSERT INTO 
									" . $CFG['table']['restaurant'] . "
							    SET
							    	restaurant_name  				 	= '" . $this->filterInput($this->restaurant_name) . "',
							    	restaurant_seourl  				 	= '" . $this->filterInput($restaurantseourl) . "',
							    	restaurant_phone  				 	= '" . $this->filterInput($this->restaurant_phone) . "',
							    	restaurant_website  			 	= '" . $this->filterInput($this->restaurant_website) . "',
							    	restaurant_streetaddress  		 	= '" . $this->filterInput($this->restaurant_streetaddress) . "',
							    	restaurant_city  					= '" . $this->filterInput($this->restaurant_city) . "',
							    	restaurant_state  					= '" . $this->filterInput($this->restaurant_state) . "',
							    	restaurant_zip  					= '" . $this->filterInput($this->restaurant_zip) . "',
							    	restaurant_contact_name  			= '" . $this->filterInput($this->restaurant_contact_name) .
                    "',
							    	restaurant_contact_phone  			= '" . $this->filterInput($this->restaurant_contact_phone) .
                    "',
							    	restaurant_contact_email  			= '" . $this->filterInput($this->restaurant_contact_email) .
                    "',
							    	order_receive_email					= '" . $this->filterInput($this->restaurant_contact_email) . "',
							    	restaurant_fax  			        = '" . $this->filterInput($this->restaurant_fax) . "',
							    	restaurant_password					= '" . $this->filterInput($restaurantpass) . "',
							    	restaurant_encrypt_password			= '" . $this->filterInput($encode_password) . "',
							    	restaurant_status  			        = '2',
							    	addeddate = '" . CUR_TIME . "' ";

                $res_rest = $this->ExecuteQuery($ins_rest, 'insert');
            } else
            {
                echo "already_email";
            }

        /*} else
        {
            echo "already_name";
        }*/

        if ($res_rest)
        {
            echo 'resowner_success';

            $inse = "INSERT INTO " . $CFG['table']['restaurant_choose_paymentoption'] .
                " SET restaurant_id = '" . $res_rest .
                "',paymentoption = '1',paymentmethod = 'Yes',addeddate = '" . CUR_TIME . "'";
            $rese = $this->ExecuteQuery($inse, 'insert');

            $city = $this->getValue("cityname", $CFG['table']['city'], "city_id = '" . $this->
                restaurant_city . "'");
            $zip = $this->restaurant_zip;

            $toemail = $CFG['site']['adminemail'];
            $res_name = stripslashes($this->filterInput($_POST['restaurant_name']));
            $street_addr = stripslashes($this->filterInput($_POST['restaurant_streetaddress']));
            $res_contact_name = stripslashes($this->filterInput($_POST['restaurant_contact_name']));


            #$mailsubject  = $CFG['site']['sitedomain'].": ".$CFG['site']['sitename']." Owner Register";
            $mailsubject = $CFG['site']['sitedomain'] . ": " . $CFG['site']['sitename'] . " New Restaurant Added";
            $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] . "/emailOwnerRegister.tpl");
            $mail_content = str_replace('{SITE_URL}', $CFG['site']['base_url'], $mail_content);
            $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
            $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
            $mail_content = str_replace('{SITE_DOMAIN}', $CFG['site']['sitedomain'], $mail_content);
            $mail_content = str_replace('{REST_NAME}', $res_name, $mail_content);
            $mail_content = str_replace('{REST_PHONE}', $this->restaurant_phone, $mail_content);
            $mail_content = str_replace('{REST_WEBSITE}', $this->restaurant_website, $mail_content);
            $mail_content = str_replace('{REST_STREETADDRESS}', $street_addr, $mail_content);
            $mail_content = str_replace('{REST_CITY}', $city, $mail_content);
            $mail_content = str_replace('{REST_STATE}', $this->restaurant_state, $mail_content);
            $mail_content = str_replace('{REST_ZIP}', $zip, $mail_content);
            $mail_content = str_replace('{REST_CONTACTNAME}', $res_contact_name, $mail_content);
            $mail_content = str_replace('{REST_CONTACTPHONE}', $this->restaurant_contact_phone, $mail_content);
            $mail_content = str_replace('{REST_CONTACTEMAIL}', $this->restaurant_contact_email, $mail_content);
            $mail_content = str_replace('{REST_CONTACTFAX}', $this->restaurant_fax, $mail_content);
            $mail_content = str_replace('{ADMIN}', $res_name, $mail_content);
            
            //$toemail      = $this->restaurant_contact_email;   
            
            $this->sendMail($res_name, $this->restaurant_contact_email, $toemail, $mailsubject, $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');
            $this->sendMail($res_name, $toemail, $this->restaurant_contact_email, $mailsubject, $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');

            /*$sel_order = "SELECT restaurant_id, restaurant_password,restaurant_encrypt_password FROM ".$CFG['table']['restaurant']." WHERE restaurant_id != '' ";
            $res_order = $objSite->ExecuteQuery($sel_order,'select');
            
            foreach($res_order as $key=>$value){
            
            $encode_password = base64_encode($res_order[$key]['restaurant_password']);
            $restaurantpass  = $objSite->encrypt_password_md5($res_order[$key]['restaurant_password']);
            
            $inssql = "UPDATE ".$CFG['table']['restaurant']." SET restaurant_password = '".$restaurantpass."',restaurant_encrypt_password = '".$encode_password."' WHERE restaurant_id = '".$res_order[$key]['restaurant_id']."'";
            
            //$inssql = "UPDATE ".$CFG['table']['restaurant']." SET restaurant_encrypt_password = '".$encode_password."' WHERE restaurant_id = '".$res_order[$key]['restaurant_id']."'";
            //echo $inssql;
            
            //$ord_upd = "UPDATE ".$CFG['table']['order']." SET ordersubtotal = '".$orderSubTotal."',res_comm_perchantage = '".$rescom."',res_comm_price = '".$comm_price."',res_order_delivereddate = '".CUR_TIME."',payment_status = 'P' WHERE orderid = '".$_POST['orderid']."'";
            
            $ressql = $objSite->ExecuteQuery($inssql, "update");
            
            }*/
        }
    }
    #---------------------------------------------------------------
    #Restaurant Login
    /*function restaurantOwnerLogin(){
    global $CFG,$objSmarty;
    
    $usernum = $this->getNumvalues($CFG['table']['restaurant'],"restaurant_contact_email = '".$this->restaurant_logemail."' AND restaurant_password='".$this->restaurant_logpassword."' ");
    
    if($usernum > 0){
    
    $User_details = $this->getMultiValue("restaurant_id,restaurant_status,delete_status",$CFG['table']['restaurant'],"restaurant_contact_email = '".$this->restaurant_logemail."' AND restaurant_password='".$this->restaurant_logpassword."' LIMIT 1 ");
    
    if($User_details[0]['restaurant_status'] == 0)
    {   #Status 0 means Deactivated user
    echo "Deactivated";
    }elseif($User_details[0]['restaurant_status'] == 2)
    {   #Status 2 means Pending user
    echo "Pending";
    }elseif($User_details[0]['delete_status'] == 'Yes'){
    echo "deleted";
    }else{
    $_SESSION['restaurantownerid'] = $User_details[0]['restaurant_id'];
    }
    }else{
    echo "Invalid_Login";	
    }
    }*/
    /**
     * Restaurant::restaurantOwnerLogin()
     * 
     * @return
     */
    function restaurantOwnerLogin()
    {
        global $CFG, $objSmarty;

        //echo "<pre>";print_r($_REQUEST);echo "</pre>";
        $respass = $this->restaurant_logpassword;
        //$usernum = $this->getNumvalues($CFG['table']['restaurant'],"restaurant_contact_email = '".$this->restaurant_logemail."' AND restaurant_password='".$this->restaurant_logpassword."' ");

        $User_details = $this->getMultiValue("restaurant_id,restaurant_status,restaurant_name,restaurant_encrypt_password, delete_status,restaurant_password ",
            $CFG['table']['restaurant'], "restaurant_contact_email = '" . $this->
            restaurant_logemail . "' ");
        $db_pass = $User_details['0']['restaurant_password'];

        //echo "<pre>";print_r($User_details);echo "</pre>";
        //$encrypt_pass = base64_decode($User_details['0']['restaurant_encrypt_password']);

        if ($this->validate_password($respass, $db_pass))
        {

            $id = $User_details[0]['restaurant_id'];

            if ($User_details[0]['restaurant_status'] == 0)
            { #Status 0 means Deactivated user
                echo "Deactivated";
            } elseif ($User_details[0]['restaurant_status'] == 2)
            { #Status 2 means Pending user
                echo "Pending";
            } elseif ($User_details[0]['delete_status'] == 'Yes')
            {
                echo "deleted";
            } else
            {
                $_SESSION['restaurantownerid'] = $User_details[0]['restaurant_id'];
            }
        } else
        {
            echo "Invalid_Login";
        }
    }
    #---------------------------------------------------------------
    #Forget Password
    /*function restaurantForgetPassword(){
    global $CFG,$objSmarty;
    
    $email   	  = $this->filterInput($_POST['forgetemail']);
    
    $userdetails  = $this->GetMultivalue("restaurant_contact_email,restaurant_password,restaurant_status,delete_status",$CFG['table']['restaurant'],"restaurant_contact_email = '".$email."' ");
    
    if(count($userdetails[0]['restaurant_password']) > 0 && count($userdetails[0]['restaurant_password']) != 0){
    
    if($userdetails[0]['restaurant_status'] == '1'){
    if($userdetails[0]['delete_status'] == 'No'){
    $toemail    = $_POST['forgetemail'];
    //$password   = $userdetails[0]['restaurant_password'];
    
    $password   = '<tr>
    <td width="15%" align="left" valign="top">Password</td>
    <td width="5%" align="center" valign="top">:</td>
    <td width="" align="left" valign="top">'.$userdetails[0]['restaurant_password'].'</td>
    </tr>';
    
    $mailsubject  = $CFG['site']['sitedomain'].": ".$CFG['site']['sitename']." Forget Password Account information ";
    $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailForgetPassword.tpl");
    $mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
    $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['sitename'],$mail_content);
    $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
    $mail_content = str_replace('{USEREMAIL}',$toemail,$mail_content);
    $mail_content = str_replace('{PASSWORD}',$password,$mail_content);
    
    $ok = $this->sendMail($CFG['site']['sitename'],$CFG['site']['adminemail'],$toemail,$mailsubject,$mail_content, $mail_attachment_name='', $mail_attachment_content='');
    if($ok){
    echo 'sendpass_success';
    }
    }elseif($userdetails[0]['delete_status'] == 'Yes'){
    echo "deleted";
    }
    }elseif($userdetails[0]['restaurant_status'] == '2'){
    echo 'pending';
    }elseif($userdetails[0]['restaurant_status'] == '0'){
    echo 'deactivated';
    }
    }else{
    echo 'no_email';
    }
    }*/
    /**
     * Restaurant::restaurantForgetPassword()
     * 
     * @return
     */
    function restaurantForgetPassword()
    {

        global $CFG, $objSmarty;

        $email = $this->filterInput($_POST['forgetemail']);

        $userdetails = $this->GetMultivalue("restaurant_name,restaurant_contact_email,restaurant_password,restaurant_status,delete_status", $CFG['table']['restaurant'], "restaurant_contact_email = '" . $email . "' AND delete_status = 'No' ");
        //echo "<pre>";print_r($userdetails);echo "</pre>";

        if (count($userdetails[0]['restaurant_password']) > 0 && count($userdetails[0]['restaurant_password']) != 0)
        {

            if ($userdetails[0]['restaurant_status'] == '1')
            {
                if ($userdetails[0]['delete_status'] == 'No')
                {
                    $toemail = $_POST['forgetemail'];
                    //$password   = $userdetails[0]['restaurant_password'];

                    //$active_link = $CFG['site']['base_url'] . "/restaurantResetPassword.php?ui=" . base64_encode($toemail);
                    
                    if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook' ){
                        $active_link = $CFG['site']['base_url'] . "/restaurantResetPassword.php?ui=" .base64_encode($toemail);
        			}else{
                         $active_link = $CFG['site']['base_url'] . "/restaurant-reset-password/" .base64_encode($toemail);
        			}
                    /*$password = '<tr>
										<td width="15%" align="left" valign="top"> Reset Password Link</td>
										<td width="5%" align="center" valign="top">:</td>
										<td width="" align="left" valign="top">' . $active_link . '</td>
									</tr>';*/
                    $password = '<tr>
                    				<td align="left" valign="top" colspan="3">Please <a href="'.$active_link.'">Click here</a> to reset your password</td>
                    			</tr>';
                                                        
                    
                    $mailsubject = $CFG['site']['sitedomain'] . ": " . $CFG['site']['sitename'] . " Forgot Password Account information ";
                    $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] . "/emailForgetPassword_restaurant.tpl");
                    $mail_content = str_replace('{SITE_URL}', $CFG['site']['base_url'], $mail_content);
                    $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
                    $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
                    $mail_content = str_replace('{RESTUARANT}', stripslashes($userdetails[0]['restaurant_name']), $mail_content);
                    $mail_content = str_replace('{USEREMAIL}', $toemail, $mail_content);
                    $mail_content = str_replace('{PASSWORD}', $password, $mail_content);

                    //echo $mail_content;

                    $ok = $this->sendMail($CFG['site']['sitename'], $CFG['site']['adminemail'], $toemail, $mailsubject, $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');
                    if ($ok)
                    {
                        echo 'sendpass_success';
                    }
                } elseif ($userdetails[0]['delete_status'] == 'Yes')
                {
                    echo "deleted";
                }
            } elseif ($userdetails[0]['restaurant_status'] == '2')
            {
                echo 'pending';
            } elseif ($userdetails[0]['restaurant_status'] == '0')
            {
                echo 'deactivated';
            }
        } else
        {
            echo 'no_email';
        }
    }
    #---------------------------------------------------------------
    #Logout
    /**
     * Restaurant::restaurantLogout()
     * 
     * @return
     */
    function restaurantLogout()
    {
        global $CFG;

        if (!empty($_SESSION['restaurantownerid']))
        {
            $_SESSION['restaurantownerid'] = "";
            unset($_SESSION['restaurantownerid']);
            echo 'logout';
            //$this->redirectUrl($CFG['site']['base_url'].'/restaurantOwnerLogin.php');
        }
            if ($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook')
            {
                $this->redirectUrl($CFG['site']['base_url'] . '/restaurantOwnerLogin.php');
            } else
            {
                $this->redirectUrl($CFG['site']['base_url'] . '/restaurant-login');
            }
        //}
    }
    #Restaurant Details
    /**
     * Restaurant::restDetailsMyacc()
     * 
     * @return
     */
    function restDetailsMyacc()
    {
        global $CFG, $objSmarty;

        $sel = " SELECT restaurant_name, restaurant_zip, restaurant_state, restaurant_city, restaurant_delivery_mon_opentime, restaurant_delivery_tue_opentime, restaurant_delivery_wed_opentime, restaurant_delivery_thu_opentime, restaurant_delivery_fri_opentime, restaurant_delivery_sat_opentime, restaurant_delivery_sun_opentime, restaurant_delivery_mon_closetime, restaurant_delivery_tue_closetime, restaurant_delivery_wed_closetime, restaurant_delivery_thu_closetime, restaurant_delivery_fri_closetime, restaurant_delivery_sat_closetime, restaurant_delivery_sun_closetime, restaurant_streetaddress, restaurant_city, restaurant_state, restaurant_description,restaurant_delivery_distance, " .
            " cty.cityname, state.statename " . " FROM " . $CFG['table']['restaurant'] .
            " AS rest " . " LEFT JOIN " . $CFG['table']['city'] .
            " AS cty ON cty.city_id = rest.restaurant_city " .
            //" LEFT JOIN ".$CFG['table']['zipcode']." AS zip ON zip.zipcode_id = rest.restaurant_zip ".
            " LEFT JOIN " . $CFG['table']['state'] .
            " AS state ON state.statecode = rest.restaurant_state " .
            " WHERE rest.restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) . "' ";
        $res = $this->ExecuteQuery($sel, 'select');
        #echo "<pre>";print_r($res);echo "</pre>";

        return $res;
    }
    #---------------------------------------------------------------
    # My Account Page Start #
    #---------------------------------------------------------------
    #Dashboard List - Order
    /**
     * Restaurant::restDashboardOrderInfo()
     * 
     * @param mixed $ordertype
     * @return
     */
    function restDashboardOrderInfo($ordertype)
    {
        global $CFG, $objSmarty;

        if ($ordertype == 'pendingorder')
        {
            $ordcond = " AND status = 'pending' ";
        } elseif ($ordertype == 'processingorder')
        {
            $ordcond = " AND status = 'processing' ";
        } elseif ($ordertype == 'deliveredorder')
        {
            $ordcond = " AND status = 'completed' ";
        } elseif ($ordertype == 'failedorder')
        {
            $ordcond = " AND status = 'failed' ";
        }

        $sel_order = "SELECT ordergenerateid, customername, ordertotalprice FROM " . $CFG['table']['order'] .
            " WHERE restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) . "' " . $ordcond .
            " ORDER BY orderid DESC ";
        $res_order = $this->ExecuteQuery($sel_order, 'select');
        #echo "<pre>";print_r($res_order);echo "</pre>";
        $objSmarty->assign("ordersList_" . $ordertype . "Cnt", count($res_order));
        $objSmarty->assign("ordersList_" . $ordertype, $res_order);
    }
    #---------------------------------------------------------------
    #Commission Price
    /**
     * Restaurant::restaurantDashboardCommission()
     * 
     * @return
     */
    function restaurantDashboardCommission()
    {
        global $CFG, $objSmarty;
        #Calcualte Total Sales Order Price

        $totalsalesprice = $this->getMultivalue("ordersubtotal,ordertotalprice,res_comm_price",
            $CFG['table']['order'], "status = 'completed' AND restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) .
            "' ");
        if (is_array($totalsalesprice))
        {
            foreach ($totalsalesprice as $key => $value)
            {
                $total[] = $totalsalesprice[$key]['ordersubtotal'];
                $commprice[] = $totalsalesprice[$key]['res_comm_price'];
                $ordertotal[] = $totalsalesprice[$key]['ordertotalprice'];
            }
        }
        if (!empty($total))
        {
            $sales = str_replace(",", "", $total);
            $salesprice = array_sum($sales);
        }
        if (!empty($commprice))
        {
            $commsales = str_replace(",", "", $commprice);
            $commsalesprice = array_sum($commsales);
        }
        if (!empty($ordertotal))
        {
            $ordtotal = str_replace(",", "", $ordertotal);
            $totalorderprice = array_sum($ordtotal);
        }

        $commission = $this->getValue("restaurant_commission", $CFG['table']['restaurant'],
            "restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) . "'");
        //$commission = '5';
        #$total_comm_price =  ( $salesprice*($commission/100) );
        $total_comm_price = $commsalesprice;
        $remaining_price = $salesprice - $total_comm_price;
        if ($salesprice == 0)
        {
            $total_comm_price = 0;
            $remaining_price = 0;
        }
        $objSmarty->assign("totalorderprice", number_format($totalorderprice, 2));
        $objSmarty->assign("totalsalesprice", number_format($salesprice, 2));
        $objSmarty->assign("totalsalesCommissionprice", number_format($total_comm_price,
            2));
        $objSmarty->assign("remainingprice", number_format($remaining_price, 2));
        $objSmarty->assign("commission", $commission);

    }
    #Order statistics
    /**
     * Restaurant::restOrderStatistics()
     * 
     * @param mixed $ordertype
     * @return
     */
    function restOrderStatistics($ordertype)
    {
        global $CFG, $objSmarty;

        if ($ordertype == 'today')
        {

            $currentday = date('Y-m-d');
            $ordercondi = " AND DATE_FORMAT(orderdate,'%Y-%m-%d')='" . $currentday . "' ";

        } elseif ($ordertype == 'week')
        {

            $ordercondi = " AND WEEK('" . CUR_TIME .
                "',7) = WEEK(orderdate,7)AND DATEDIFF('" . CUR_TIME . "',orderdate)<7 ";

        } elseif ($ordertype == 'month')
        {

            $currentmonth = date("Y-m");
            $ordercondi = " AND DATE_FORMAT(orderdate,'%Y-%m')='" . $currentmonth . "' ";

        } elseif ($ordertype == 'year')
        {

            $currentyear = date("Y");
            $ordercondi = " AND DATE_FORMAT(orderdate,'%Y')='" . $currentyear . "' ";

        }

        #Total Number Orders Today
        $totalorderstat = $this->getNumvalues($CFG['table']['order'],
            "restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) . "'" . $ordercondi);
        $objSmarty->assign("totalorder" . $ordertype, $totalorderstat);

        #Total Price Sales Today
        $totalsalespricetoday = $this->getMultivalue("ordertotalprice", $CFG['table']['order'],
            "status = 'completed' AND restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) .
            "' " . $ordercondi);
        if (is_array($totalsalespricetoday))
        {
            foreach ($totalsalespricetoday as $key => $value)
            {
                $totalsales[] = $totalsalespricetoday[$key]['ordertotalprice'];
            }
            if (!empty($totalsales))
            {
                $sales_val = str_replace(",", "", $totalsales);
                $salestoday = array_sum($sales_val);
            }
            $objSmarty->assign("totalsalesorder" . $ordertype, $salestoday);
        }

        #Deliver Order Today
        $totaldeliverorder = $this->getNumvalues($CFG['table']['order'],
            "restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) .
            "' AND status = 'completed' " . $ordercondi);
        $objSmarty->assign("totaldeliver" . $ordertype, $totaldeliverorder);

        #Pending Order Today
        $totalpendingorder = $this->getNumvalues($CFG['table']['order'],
            "restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) .
            "' AND status = 'pending' " . $ordercondi);
        $objSmarty->assign("totalpending" . $ordertype, $totalpendingorder);

        #Processing Order Today
        $totalprocessingorder = $this->getNumvalues($CFG['table']['order'],
            "restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) .
            "' AND status = 'processing' " . $ordercondi);
        $objSmarty->assign("totalprocessing" . $ordertype, $totalprocessingorder);

        #Failed Order Today
        $totalfailedorder = $this->getNumvalues($CFG['table']['order'],
            "restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) .
            "' AND status = 'failed' " . $ordercondi);
        $objSmarty->assign("totalfailed" . $ordertype, $totalfailedorder);
    }
    #---------------------------------------------------------------
    #Order List
    /**
     * Restaurant::ordersList()
     * 
     * @return
     */
    function ordersList()
    {
        global $CFG, $objSmarty;

        $resid = $this->filterInput($_SESSION['restaurantownerid']);

        if (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']) && $_REQUEST['sortbystatus'] == 'pending')
        {
            $condition .= " AND status = 'pending'";
        } elseif (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']) &&
        $_REQUEST['sortbystatus'] == 'processing')
        {
            $condition .= " AND status = 'processing'";
        } elseif (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']) &&
        $_REQUEST['sortbystatus'] == 'completed')
        {
            $condition .= " AND status = 'completed'";
        } elseif (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']) &&
        $_REQUEST['sortbystatus'] == 'failed')
        {
            $condition .= " AND status = 'failed'";
        }

        #Pagination
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']))
        {
            $limit = $_REQUEST['limit'];
            $fields .= "&limit=" . $_REQUEST['limit'];
        } else
        {
            $limit = USERPAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;
        if (($_REQUEST['limit'] <> "") && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = " $start, $limit";
        }

        $sql_ord = "SELECT orderid, ordergenerateid, customername, customeremail, deliverydoornumber, deliverystreet, ordertotalprice, payment_type, foodassoonas, deliverydate, deliverytime, deliverytype, status, orderdate FROM " .
            $CFG['table']['order'] . " WHERE restaurant_id = '" . $resid . "' " . $condition .
            " ORDER BY orderid DESC ";
        $total_pages = $this->ExecuteQuery($sql_ord, 'norows');

        $targetpage = ",'Order'";
        $sortbystatus = ",'$_REQUEST[sortbystatus]'";
        $next_page = $this->make_page_usersideAjax_myaccount($targetpage, $total_pages,
            $limit, $page, $fields, $sortbystatus);

        $sql_limit = $sql_ord . " LIMIT " . $sql_lim;
        $res_ord = $this->ExecuteQuery($sql_limit, 'select');
       
        
        if ($total_pages > 0)
        {
            foreach ($res_ord as $key => $value)
            {
                $res_ord[$key]['sno'] = (($page - 1) * $limit) + ($key + 1);
                if ($res_ord[$key]['deliverydate'] == '--') {
                $res_ord[$key]['deliverydate'] = '';
                }
                else {
                    $res_ord[$key]['deliverydate'] = $this->setDateFormatWithOutTime($res_ord[$key]['deliverydate']);
                }
                $res_ord[$key]['orderdate'] = $this->setDateFormatWithTime($res_ord[$key]['orderdate']);
            }
        }
         
        
        //$tot_ord  		 = $this->ExecuteQuery($sql_ord,'select');
        $tot_ord = $this->getNumvalues($CFG['table']['order'], "restaurant_id = '" . $resid .
            "' ");
        $delivered_ord = $this->getNumvalues($CFG['table']['order'],
            "status = 'completed' AND restaurant_id = '" . $resid . "' " . $condition . " ");
        $processing_ord = $this->getNumvalues($CFG['table']['order'],
            "status = 'processing' AND restaurant_id = '" . $resid . "' " . $condition . " ");
        $pending_ord = $this->getNumvalues($CFG['table']['order'],
            "status = 'pending' AND restaurant_id = '" . $resid . "' " . $condition . " ");
        $failed_ord = $this->getNumvalues($CFG['table']['order'],
            "status = 'failed' AND restaurant_id = '" . $resid . "' " . $condition . " ");
        
        $objSmarty->assign("ordersListCnt", count($res_ord));
        $objSmarty->assign("ordersList", $res_ord);
        $objSmarty->assign("pagination", $next_page);
        $objSmarty->assign("fields", $fields);

        #Statistics
        #$objSmarty->assign("ordersList_orderCnt", count($tot_ord));
        $objSmarty->assign("ordersList_orderCnt", $tot_ord);
        $objSmarty->assign("delivered_ord", $delivered_ord);
        $objSmarty->assign("processing_ord", $processing_ord);
        $objSmarty->assign("pending_ord", $pending_ord);
        $objSmarty->assign("failed_ord", $failed_ord);
        return $res_ord;

    }
    #---------------------------------------------------------------
    #Order Report List
    /**
     * Restaurant::ordersReportList()
     * 
     * @return
     */
    function ordersReportList()
    {
        global $CFG, $objSmarty;

        #echo "<pre>";print_r($_REQUEST);echo "</pre>";

        $resid = $this->filterInput($_SESSION['restaurantownerid']);

        #List
        if (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']))
        {

            if ($_REQUEST['sortbystatus'] == "Today")
            {
                $today = date("Y-m-d");
                $condition = " AND DATE_FORMAT(orderdate,'%Y-%m-%d') = '" . $today . "'";
            } elseif ($_REQUEST['sortbystatus'] == "ThisWeek")
            {
                $condition = " AND WEEK('" . CUR_TIME .
                    "',7) = WEEK(orderdate,7) AND DATEDIFF('" . CUR_TIME . "',orderdate)<7";
            } elseif ($_REQUEST['sortbystatus'] == "LastWeek")
            {

                $lastweek = date("d-m-Y", strtotime('-1 week'));
                $date = $this->week_from_monday($lastweek);
                $weekdate = implode(",", $date);

                $condition = " AND (
							DATE_FORMAT(orderdate,'%Y-%m-%d')='" . $date[0] . "' OR 
							DATE_FORMAT(orderdate,'%Y-%m-%d')='" . $date[1] . "' OR 
							DATE_FORMAT(orderdate,'%Y-%m-%d')='" . $date[2] . "' OR 
							DATE_FORMAT(orderdate,'%Y-%m-%d')='" . $date[3] . "' OR 
							DATE_FORMAT(orderdate,'%Y-%m-%d')='" . $date[4] . "' OR 
							DATE_FORMAT(orderdate,'%Y-%m-%d')='" . $date[5] . "' OR
							DATE_FORMAT(orderdate,'%Y-%m-%d')='" . $date[6] . "' ) ";
            } elseif ($_REQUEST['sortbystatus'] == "LastMonth")
            {
                $lastmonth = date("Y-m", strtotime("-1 month"));
                $condition = " AND DATE_FORMAT(orderdate,'%Y-%m')='" . $lastmonth . "'";
            } elseif ($_REQUEST['sortbystatus'] == "ThisMonth")
            {
                $currentmonth = date("Y-m");
                $condition = " AND DATE_FORMAT(orderdate,'%Y-%m')='" . $currentmonth . "'";
            } elseif ($_REQUEST['sortbystatus'] == "ThisYear")
            {
                $currentyear = date("Y");
                $condition = " AND DATE_FORMAT(orderdate,'%Y')='" . $currentyear . "'";
            } elseif ($_REQUEST['sortbystatus'] == "LastYear")
            {
                $lastyear = date("Y", strtotime("-1 year"));
                $condition = " AND DATE_FORMAT(orderdate,'%Y')='" . $lastyear . "'";
            }

        }

        if (isset($_REQUEST['startdate']) && !empty($_REQUEST['startdate']) && isset($_REQUEST['enddate']) &&
            !empty($_REQUEST['enddate']))
        {

            $stdate = $this->filterInput($_REQUEST['startdate']);
            list($day, $month, $year) = explode("-", $stdate);
            $startdate = $year . '-' . $month . '-' . $day;

            $enddate = $this->filterInput($_REQUEST['enddate']);
            list($day, $month, $year) = explode("-", $enddate);
            $end_date = $year . '-' . $month . '-' . $day;
            $end_date = strtotime($end_date);
            $end_date = strtotime("+1 day",$end_date);
            $end_date = date("Y-m-d",$end_date);
            

            $condition .= " AND orderdate BETWEEN '" . $startdate . " 00:00:01' AND '" . $end_date ." 00:00:01' ";
           
        }

        #Pagination
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']))
        {
            //echo "hi";
            $limit = $_REQUEST['limit'];
            $fields .= "&limit=" . $_REQUEST['limit'];
        } else
        {
            
            $limit = USERPAGELIMIT;
            //echo $limit;
        }

        
        $page = $_REQUEST['page'];
        
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;
        if (($_REQUEST['limit'] <> "") && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = " $start, $limit";
        }

        /*if($_REQUEST['sortbystatus'] == "Today" || $_REQUEST['sortbystatus'] == "ThisWeek" || $_REQUEST['sortbystatus'] == "LastWeek" || $_REQUEST['sortbystatus'] == "LastMonth" || $_REQUEST['sortbystatus'] == "ThisMonth" || $_REQUEST['sortbystatus'] == "ThisYear" || $_REQUEST['sortbystatus'] == "LastYear" ){
        $sortbystatus = ",'$_REQUEST[sortbystatus]'";
        }else{
        
        $sortbystatus = ",'startdate=$_REQUEST[startdate]&enddate=$_REQUEST[enddate]'";
        }*/

        $sql_ord = "SELECT orderid, ordergenerateid, customername, customeremail, deliverydoornumber, deliverystreet, ordertotalprice, status, orderdate FROM " .
            $CFG['table']['order'] . " WHERE restaurant_id = '" . $resid .
            "' AND status = 'completed' " . $condition . " ORDER BY orderid DESC ";
        #echo $sql_ord;
        $total_pages = $this->ExecuteQuery($sql_ord, 'norows');
       
        $targetpage = ",'Report'";
        $sortbystatus = ",'$_REQUEST[sortbystatus]'";
        $next_page = $this->make_page_usersideAjax_myaccount($targetpage, $total_pages,
            $limit, $page, $fields, $sortbystatus);

        $sql_limit = $sql_ord . " LIMIT " . $sql_lim;
        $res_ord = $this->ExecuteQuery($sql_limit, 'select');
        #echo "<pre>";print_r($res_ord);echo "</pre>";
        if ($total_pages > 0)
        {
            foreach ($res_ord as $key => $value)
            {
                $res_ord[$key]['sno'] = (($page - 1) * $limit) + ($key + 1);
                $res_ord[$key]['orderdate'] = $this->setDateFormatWithTime($res_ord[$key]['orderdate']);
            }
        }

        #$tot_ord  	 = $this->ExecuteQuery($sql_ord,'select');

        #$objSmarty->assign("ordersReportListCnt", count($res_ord));
        $objSmarty->assign("ordersReportListCnt", $total_pages);
        $objSmarty->assign("ordersReportList", $res_ord);
        $objSmarty->assign("pagination", $next_page);
        $objSmarty->assign("fields", $fields);

    }
    #---------------------------------------------------------------------------------
    #change order status
    /**
     * Restaurant::orderChangeStatus()
     * 
     * @return
     */
    function orderChangeStatus()
    {
        global $CFG, $objSmarty;

        if (isset($_POST['orderid']) && !empty($_POST['orderid']))
        {

            $sel_upd = "UPDATE " . $CFG['table']['order'] . " SET status = '" . $this->filterInput($_POST['val']) .
                "' WHERE orderid = '" . $this->filterInput($_POST['orderid']) . "'";
            $res_upd = $this->ExecuteQuery($sel_upd, 'update');

            $changestatusval = trim($_POST['val']);
            
            #Order ID And Restaurant Name
            /*$gcm_det = "SELECT gcm.gcm_register_id, ord.ordergenerateid, res.restaurant_name, cus.customer_name ".
                        "FROM ".$CFG['table']['gcm']." AS gcm".
                        " LEFT JOIN ".$CFG['table']['order']." AS ord ON gcm.order_id = ord.orderid".
                        " LEFT JOIN ".$CFG['table']['restaurant']." AS res ON gcm.restaurant_id = res.restaurant_id".
                        " LEFT JOIN ".$CFG['table']['customer']." AS cus ON gcm.userid = cus.customer_id".
                        " WHERE gcm.order_id AND gcm.status = '1'";
            $gcm_res = $this->ExecuteQuery($gcm_det,'select');*/
#--------------------------------------------------------------------------------------------------------------------------------------------------------------
            #Send GCM Notification For Android 
            $gcm_det = "SELECT gcm.gcm_register_id, ord.ordergenerateid, res.restaurant_name ".
                "FROM ".$CFG['table']['gcm']." AS gcm".
                " LEFT JOIN ".$CFG['table']['order']." AS ord ON gcm.order_id = ord.orderid".
                " LEFT JOIN ".$CFG['table']['restaurant']." AS res ON gcm.restaurant_id = res.restaurant_id".
                //" LEFT JOIN ".$CFG['table']['customer']." AS cus ON gcm.userid = cus.customer_id".
                " WHERE gcm.order_id = '" . $_POST['orderid'] . "' AND gcm.status = '1'";
            $gcm_res = $this->ExecuteQuery($gcm_det,'select');
            if(isset($gcm_res) && !empty($gcm_res)){
                $this->sendGCMnotification($changestatusval,trim($gcm_res[0]['gcm_register_id']),trim($gcm_res[0]['ordergenerateid']),trim(stripslashes($gcm_res[0]['restaurant_name'])));
            }
#--------------------------------------------------------------------------------------------------------------------------------------------------------------

            if ($changestatusval == 'completed')
            {
                $sel_cart = "SELECT tot_menuprice FROM " . $CFG['table']['restaurant_cart'] . " WHERE orderid = '" . $this->filterInput($_POST['orderid']) . "' GROUP BY cart_id ";
                $res_cart = $this->ExecuteQuery($sel_cart, "select");

                if (count($res_cart) > 0)
                {
                    $orderSubTotal = 0;
                    foreach ($res_cart as $key => $value)
                    {
                        $orderSubTotal += $res_cart[$key]['tot_menuprice'];
                    }
                }

                $res = $this->getMultivalue("restaurant_id,ordersubtotal,ordertotalprice", $CFG['table']['order'], "orderid = '" . $this->filterInput($_POST['orderid']) . "' ");
                $rescom = $this->getValue("restaurant_commission", $CFG['table']['restaurant'], "restaurant_id = '" . $this->filterInput($res[0]['restaurant_id']) . "'");
                #$orderprice = $res[0]['ordersubtotal'];
                $orderprice = $orderSubTotal;
                $comm_price = ($orderprice * ($rescom / 100));

                $ord_upd = "UPDATE " . $CFG['table']['order'] . " SET ordersubtotal = '" . $orderSubTotal .
                    "',res_comm_perchantage = '" . $rescom . "',res_comm_price = '" . $comm_price .
                    "',res_order_delivereddate = '" . CUR_TIME .
                    "',payment_status = 'P' WHERE orderid = '" . $this->filterInput($_POST['orderid']) . "'";
                $res_upd = mysqli_query($this->DBCONN,$ord_upd) or die(mysqli_error($this->DBCONN));

                $res_det = $this->getMultiValue("restaurant_name,restaurant_phone, restaurant_website, restaurant_streetaddress, restaurant_city, restaurant_state, restaurant_zip, restaurant_contact_name, restaurant_contact_email, restaurant_website", $CFG['table']['restaurant'], "restaurant_id = '" . $this->filterInput($res[0]['restaurant_id']) . "'");
                $cus_det = $this->getMultiValue("ordergenerateid, customername, customerlastname, customeremail, customercellphone, deliverydoornumber, deliverystreet, deliverycity, deliverystate, deliveryzip", $CFG['table']['order'], "orderid = '" . $this->filterInput($_POST['orderid']) . "' ");

                $cus_city = $this->getValue("cityname", $CFG['table']['city'], "city_id='" . $this->filterInput($cus_det[0]['deliverycity']) . "'");
                $cus_state = $this->getValue("statename", $CFG['table']['state'], "state_id='" . $this->filterInput($cus_det[0]['deliverystate']) . "'");
                
                /*#Send GCM Notification For Android 
                $gcm_res = $this->getValue('gcm_register_id',$CFG['table']['gcm'],"order_id AND status = '1'");
                if(isset($gcm_res) && !empty($gcm_res)){
                    $this->sendGCMnotification('completed',trim($gcm_res[0]['gcm_register_id']),trim($cus_det[0]['ordergenerateid']),trim(stripslashes($res_det[0]['restaurant_name'])));
                }*/

                #Send Mail To Customer From Restaurant
                $fromname = stripcslashes($res_det[0]['restaurant_name']);
                $fromemail = stripcslashes($res_det[0]['restaurant_contact_email']);
                $toemail = stripcslashes($cus_det[0]['customeremail']);

                //Content
                $order_num = $cus_det[0]['ordergenerateid'];
                $cus_address = '<tr>
									<td align="left" valign="top" width="17%">Delivery Address : </td>
									<td align="left" valign="top">
										<table>
											<tr><td align="left" valign="top">' . $cus_det[0]['deliverydoornumber'] .'</td></tr>
											<tr><td align="left" valign="top">' . $cus_det[0]['deliverystreet'] .'</td></tr>
											<tr><td align="left" valign="top">' . $cus_city . '</td></tr>
											<tr><td align="left" valign="top">' . $cus_state . '-' . $cus_det[0]['deliveryzip'] .'</td></tr>
											<tr><td align="left" valign="top">' . $cus_det[0]['customercellphone'] .'</td></tr>
										</table>
									</td>
								</tr>';


                $mailsubject = "Delivery confirmation of '" . $CFG['site']['sitename'] . "' ['" . $order_num . "']";
                $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] . "/emailOrderDelivery.tpl");
                $mail_content = str_replace('{SITE_URL}', $CFG['site']['base_url'], $mail_content);
                $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
                $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
                $mail_content = str_replace('{SITE_DOMAIN}', $CFG['site']['sitedomain'], $mail_content);
                $mail_content = str_replace('{CUSTOMER_NAME}', stripslashes($cus_det[0]['customername']), $mail_content);
                $mail_content = str_replace('{CUSTOMER_LAST_NAME}', stripslashes($cus_det[0]['customerlastname']), $mail_content);
                $mail_content = str_replace('{ORDERNUMBER}', $order_num, $mail_content);
                $mail_content = str_replace('{CUSTOMERADDRESS}', $cus_address, $mail_content);
                $mail_content = str_replace('{RESTAURANT}', stripslashes($res_det[0]['restaurant_name']), $mail_content);


                $ok = $this->sendMail($fromname, $fromemail, $toemail, $mailsubject, $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');
                if ($ok)
                {
                    #Send Mail To Site Admin From Restaurant
                    $fromname = stripcslashes($res_det[0]['restaurant_name']);
                    $fromemail = stripcslashes($res_det[0]['restaurant_contact_email']);
                    $toemail = stripcslashes($CFG['site']['adminemail']);

                    //Content
                    $order_num = $cus_det[0]['ordergenerateid'];
                    $cus_address = '<tr>
										<td align="left" valign="top" width="17%">Delivery Address : </td>
										<td align="left" valign="top">
                                            <div style="line-height:24px;">' . $cus_det[0]['deliverydoornumber'] .'</div>
                                            <div style="line-height:24px;">' . $cus_det[0]['deliverystreet'] .'</div>
                                            <div style="line-height:24px;">' . $cus_city . '</div>
                                            <div style="line-height:24px;">' . $cus_state . '-' . $cus_det[0]['deliveryzip'] .'</div>
                                            <div style="line-height:24px;">' . $cus_det[0]['customercellphone'] .'</div>
										</td>
									</tr>';
                    $mailsubject = "Delivery confirmation by '" . $res_det[0]['restaurant_name'] . "' ['" . $order_num . "']";
                    $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] . "/emailOrderDeliveryToAdmin.tpl");
                    $mail_content = str_replace('{SITE_URL}', $CFG['site']['base_url'], $mail_content);
                    $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
                    $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
                    $mail_content = str_replace('{SITE_DOMAIN}', $CFG['site']['sitedomain'], $mail_content);
                    $mail_content = str_replace('{ORDERNUMBER}', $order_num, $mail_content);
                    $mail_content = str_replace('{CUSTOMERADDRESS}', $cus_address, $mail_content);
                    $mail_content = str_replace('{RESTAURANT}', stripslashes($res_det[0]['restaurant_name']), $mail_content);
                    $mail_content = str_replace('{RESTAURANTWEB}', $res_det[0]['restaurant_website'], $mail_content);

                    $this->sendMail($fromname, $fromemail, $toemail, $mailsubject, $mail_content, $mail_attachment_name =  '', $mail_attachment_content = '');
                }
            } elseif ($changestatusval == 'processing' || $changestatusval == 'pending' || $changestatusval == 'failed')
            {
                $ord_upd = "UPDATE " . $CFG['table']['order'] .
                    " SET res_comm_perchantage = '',res_comm_price = '',res_order_delivereddate = '' WHERE orderid = '" . $this->filterInput($_POST['orderid']) . "'";
                $res_upd = mysqli_query($this->DBCONN,$ord_upd) or die(mysqli_error($this->DBCONN));

                if ($changestatusval == 'failed')
                {

                    $fail_reason = stripslashes($_REQUEST['reason']);

                    $res_id = $this->getvalue("restaurant_id", $CFG['table']['order'], "orderid = '" . $this->filterInput($_POST['orderid']) . "' ");

                    $res_det = $this->getMultiValue("restaurant_name,restaurant_phone, restaurant_website, restaurant_streetaddress, restaurant_city, restaurant_state, restaurant_zip, restaurant_contact_name, restaurant_contact_email, restaurant_website", $CFG['table']['restaurant'], "restaurant_id = '" . $this->filterInput($res_id) . "'");
                    $cus_det = $this->getMultiValue("ordergenerateid, customername, customerlastname, customeremail, customercellphone, deliverydoornumber, deliverystreet, deliverycity, deliverystate, deliveryzip", $CFG['table']['order'], "orderid = '" . $this->filterInput($_POST['orderid']) . "' ");

                    $cus_city = $this->getValue("cityname", $CFG['table']['city'], "city_id='" . $this->filterInput($cus_det[0]['deliverycity']) . "'");
                    $cus_state = $this->getValue("statename", $CFG['table']['state'], "state_id='" .  $this->filterInput($cus_det[0]['deliverystate']) . "'");
                    
                    /*#Send GCM Notification For Android 
                    $gcm_res = $this->getValue('gcm_register_id',$CFG['table']['gcm'],"order_id AND status = '1'");
                    if(isset($gcm_res) && !empty($gcm_res)){
                        $this->sendGCMnotification('completed',trim($gcm_res[0]['gcm_register_id']),trim($cus_det[0]['ordergenerateid']),trim(stripslashes($res_det[0]['restaurant_name'])),$fail_reason);
                    }*/

                    #Send Failure Mail To Customer From Restaurant
                    $fromname = stripcslashes($res_det[0]['restaurant_name']);
                    $fromemail = stripcslashes($res_det[0]['restaurant_contact_email']);
                    $toemail = stripcslashes($cus_det[0]['customeremail']);

                    //Content
                    $order_num = $cus_det[0]['ordergenerateid'];
                    $cus_address = '<tr>
										<td align="left" valign="top" width="17%">Delivery Address : </td>
										<td align="left" valign="top">
											<table>
												<tr><td align="left" valign="top">' . $cus_det[0]['deliverydoornumber'] .'</td></tr>
												<tr><td align="left" valign="top">' . $cus_det[0]['deliverystreet'] .'</td></tr>
												<tr><td align="left" valign="top">' . $cus_city . '</td></tr>
												<tr><td align="left" valign="top">' . $cus_state . '-' . $cus_det[0]['deliveryzip'] .'</td></tr>
												<tr><td align="left" valign="top">' . $cus_det[0]['customercellphone'] .'</td></tr>
											</table>
										</td>
									</tr>';


                    $mailsubject = "Delivery Failure of '" . $CFG['site']['sitename'] . "' ['" . $order_num . "']";
                    $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] . "/emailFailureOrder.tpl");
                    $mail_content = str_replace('{SITE_URL}', $CFG['site']['base_url'], $mail_content);
                    $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
                    $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
                    $mail_content = str_replace('{SITE_DOMAIN}', $CFG['site']['sitedomain'], $mail_content);
                    $mail_content = str_replace('{REASON}', $fail_reason, $mail_content);
                    $mail_content = str_replace('{CUSTOMER_NAME}', stripslashes($cus_det[0]['customername']), $mail_content);
                    $mail_content = str_replace('{CUSTOMER_LAST_NAME}', stripslashes($cus_det[0]['customerlastname']), $mail_content);
                    $mail_content = str_replace('{ORDERNUMBER}', $order_num, $mail_content);
                    $mail_content = str_replace('{CUSTOMERADDRESS}', $cus_address, $mail_content);
                    $mail_content = str_replace('{RESTAURANT}', stripslashes($res_det[0]['restaurant_name']), $mail_content);


                    $ok = $this->sendMail($fromname, $fromemail, $toemail, $mailsubject, $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');
                    if ($ok)
                    {
                        #Send Failure Mail To Site Admin From Restaurant
                        $fromname = stripcslashes($res_det[0]['restaurant_name']);
                        $fromemail = stripcslashes($res_det[0]['restaurant_contact_email']);
                        $toemail = stripcslashes($CFG['site']['adminemail']);

                        //Content
                        $order_num = $cus_det[0]['ordergenerateid'];
                        $cus_address = '<tr>
											<td align="left" valign="top" width="17%">Delivery Address : </td>
											<td align="left" valign="top">
												<table>
													<tr><td align="left" valign="top">' . $cus_det[0]['deliverydoornumber'] .'</td></tr>
													<tr><td align="left" valign="top">' . $cus_det[0]['deliverystreet'] .'</td></tr>
													<tr><td align="left" valign="top">' . $cus_city . '</td></tr>
													<tr><td align="left" valign="top">' . $cus_state . '-' . $cus_det[0]['deliveryzip'] .'</td></tr>
													<tr><td align="left" valign="top">' . $cus_det[0]['customercellphone'] .'</td></tr>
												</table>
											</td>
										</tr>';


                        $mailsubject = "Delivery Failure of '" . $CFG['site']['sitename'] . "' ['" . $order_num . "']";
                        $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] . "/emailFailureOrder.tpl");
                        $mail_content = str_replace('{SITE_URL}', $CFG['site']['base_url'], $mail_content);
                        $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
                        $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
                        $mail_content = str_replace('{SITE_DOMAIN}', $CFG['site']['sitedomain'], $mail_content);
                        $mail_content = str_replace('{REASON}', $fail_reason, $mail_content);
                        $mail_content = str_replace('{CUSTOMER_NAME}', $CFG['site']['sitename'], $mail_content);

                        $mail_content = str_replace('{ORDERNUMBER}', $order_num, $mail_content);
                        $mail_content = str_replace('{CUSTOMERADDRESS}', $cus_address, $mail_content);
                        $mail_content = str_replace('{RESTAURANT}', stripslashes($res_det[0]['restaurant_name']), $mail_content);

                        $this->sendMail($fromname, $fromemail, $toemail, $mailsubject, $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');

                    }
                }
            }
        }
    }
    #change booktable status
    /**
     * Restaurant::orderChangeStatus()
     * 
     * @return
     */
    function booktableChangeStatus()
    {
        global $CFG, $objSmarty;

        if (isset($_POST['orderid']) && !empty($_POST['orderid']))
        {

            $sel_upd = "UPDATE " . $CFG['table']['restaurant_booking'] . " SET bookingstatus = '" . $this->filterInput($_POST['val']) .
                "' WHERE id = '" . $this->filterInput($_POST['orderid']) . "'";
            $res_upd = $this->ExecuteQuery($sel_upd, 'update');
            //echo "<pre>";print_r($res_upd);echo "</pre>";
            $changestatusval = trim($_POST['val']);
            
            #Order ID And Restaurant Name
            /*$gcm_det = "SELECT gcm.gcm_register_id, ord.ordergenerateid, res.restaurant_name, cus.customer_name ".
                        "FROM ".$CFG['table']['gcm']." AS gcm".
                        " LEFT JOIN ".$CFG['table']['order']." AS ord ON gcm.order_id = ord.orderid".
                        " LEFT JOIN ".$CFG['table']['restaurant']." AS res ON gcm.restaurant_id = res.restaurant_id".
                        " LEFT JOIN ".$CFG['table']['customer']." AS cus ON gcm.userid = cus.customer_id".
                        " WHERE gcm.order_id AND gcm.status = '1'";
            $gcm_res = $this->ExecuteQuery($gcm_det,'select');*/
#--------------------------------------------------------------------------------------------------------------------------------------------------------------
            #Send GCM Notification For Android 
            $gcm_det = "SELECT gcm.gcm_register_id, ord.ordergenerateid, res.restaurant_name ".
                "FROM ".$CFG['table']['gcm']." AS gcm".
                " LEFT JOIN ".$CFG['table']['order']." AS ord ON gcm.order_id = ord.orderid".
                " LEFT JOIN ".$CFG['table']['restaurant']." AS res ON gcm.restaurant_id = res.restaurant_id".
                //" LEFT JOIN ".$CFG['table']['customer']." AS cus ON gcm.userid = cus.customer_id".
                " WHERE gcm.order_id = '" . $this->filterInput($_POST['orderid']) . "' AND gcm.status = '1'";
            $gcm_res = $this->ExecuteQuery($gcm_det,'select');
            if(isset($gcm_res) && !empty($gcm_res)){
                $this->sendGCMnotification($changestatusval,trim($gcm_res[0]['gcm_register_id']),trim($gcm_res[0]['ordergenerateid']),trim(stripslashes($gcm_res[0]['restaurant_name'])));
            }
#--------------------------------------------------------------------------------------------------------------------------------------------------------------

            if ($changestatusval == 'accept')
            {
                $sel_cart = "SELECT tot_menuprice FROM " . $CFG['table']['restaurant_cart'] . " WHERE orderid = '" . $this->filterInput($_POST['orderid']) . "' GROUP BY cart_id ";
               /* $res_cart = $this->ExecuteQuery($sel_cart, "select");

                if (count($res_cart) > 0)
                {
                    $orderSubTotal = 0;
                    foreach ($res_cart as $key => $value)
                    {
                        $orderSubTotal += $res_cart[$key]['tot_menuprice'];
                    }
                }*/

                $res = $this->getMultivalue("restaurant_id", $CFG['table']['restaurant_booking'], "id = '" . $this->filterInput($_POST['orderid']) . "' ");
                //$rescom = $this->getValue("restaurant_commission", $CFG['table']['restaurant'], "restaurant_id = '" . $res[0]['restaurant_id'] . "'");
                #$orderprice = $res[0]['ordersubtotal'];
                //$orderprice = $orderSubTotal;
                //$comm_price = ($orderprice * ($rescom / 100));

               /*$ord_upd = "UPDATE " . $CFG['table']['order'] . " SET ordersubtotal = '" . $orderSubTotal .
                    "',res_comm_perchantage = '" . $rescom . "',res_comm_price = '" . $comm_price .
                    "',res_order_delivereddate = '" . CUR_TIME .
                    "',payment_status = 'P' WHERE orderid = '" . $_POST['orderid'] . "'";
                $res_upd = mysqli_query($this->DBCONN,$ord_upd) or die(mysqli_error($this->DBCONN));*/

                $res_det = $this->getMultiValue("restaurant_name,restaurant_phone, restaurant_website, restaurant_streetaddress, restaurant_city, restaurant_state, restaurant_zip, restaurant_contact_name, restaurant_contact_email, restaurant_website", $CFG['table']['restaurant'], "restaurant_id = '" . $this->filterInput($res[0]['restaurant_id']) . "'");
                $cus_det = $this->getMultiValue("bookinggenerateid, booking_name,  booking_email,num_guests, booking_mobileno, booking_time, booking_date",     $CFG['table']['restaurant_booking'], "id = '" . $this->filterInput($_POST['orderid']) . "' ");

               // $cus_city = $this->getValue("cityname", $CFG['table']['city'], "city_id='" . $cus_det[0]['deliverycity'] . "'");
               // $cus_state = $this->getValue("statename", $CFG['table']['state'], "state_id='" . $cus_det[0]['deliverystate'] . "'");
                
                /*#Send GCM Notification For Android 
                $gcm_res = $this->getValue('gcm_register_id',$CFG['table']['gcm'],"order_id AND status = '1'");
                if(isset($gcm_res) && !empty($gcm_res)){
                    $this->sendGCMnotification('completed',trim($gcm_res[0]['gcm_register_id']),trim($cus_det[0]['ordergenerateid']),trim(stripslashes($res_det[0]['restaurant_name'])));
                }*/

                #Send Mail To Customer From Restaurant
                $fromname = stripcslashes($res_det[0]['restaurant_name']);
                $fromemail = stripcslashes($res_det[0]['restaurant_contact_email']);
                $toemail = stripcslashes($cus_det[0]['booking_email']);

                //Content
                $order_num = $cus_det[0]['bookinggenerateid'];
                $cus_address = '<tr>
									<td align="left" valign="top" width="17%">Booking Details : </td>
									<td align="left" valign="top">
										<table>
											<tr><td align="left" valign="top">' . $cus_det[0]['booking_date'] .'</td></tr>
											<tr><td align="left" valign="top">' . $cus_det[0]['booking_time'] .'</td></tr>
											<tr><td align="left" valign="top">' . $cus_det[0]['num_guests'] .'</td></tr>
                                            <tr><td align="left" valign="top">' . $cus_det[0]['booking_mobileno'] .'</td></tr>
										</table>
									</td>
								</tr>';


                $mailsubject = "Booking confirmation of '" . $CFG['site']['sitename'] . "' ['" . $order_num . "']";
                $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] . "/bookTableAcceptMail.tpl");
                $mail_content = str_replace('{SITE_URL}', $CFG['site']['base_url'], $mail_content);
                $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
                $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
                $mail_content = str_replace('{SITE_DOMAIN}', $CFG['site']['sitedomain'], $mail_content);
                $mail_content = str_replace('{CUSTOMER_NAME}', stripslashes($cus_det[0]['booking_name']), $mail_content);
                //$mail_content = str_replace('{CUSTOMER_LAST_NAME}', stripslashes($cus_det[0]['customerlastname']), $mail_content);
                $mail_content = str_replace('{ORDERNUMBER}', $order_num, $mail_content);
                $mail_content = str_replace('{CUSTOMERADDRESS}', $cus_address, $mail_content);
                $mail_content = str_replace('{RESTAURANT}', stripslashes($res_det[0]['restaurant_name']), $mail_content);


                $ok = $this->sendMail($fromname, $fromemail, $toemail, $mailsubject, $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');
                if ($ok)
                {
                    #Send Mail To Site Admin From Restaurant
                    $fromname = stripcslashes($res_det[0]['restaurant_name']);
                    $fromemail = stripcslashes($res_det[0]['restaurant_contact_email']);
                    $toemail = stripcslashes($CFG['site']['adminemail']);

                    //Content
                    $order_num = $cus_det[0]['bookinggenerateid'];
                    $cus_address = '<tr>
										<td align="left" valign="top" width="17%">Booking Deatils : </td>
										<td align="left" valign="top">
											<table>
												<tr><td align="left" valign="top">' . $cus_det[0]['booking_date'] .'</td></tr>
												<tr><td align="left" valign="top">' . $cus_det[0]['booking_time'] .'</td></tr>
												<tr><td align="left" valign="top">' . $cus_det[0]['num_guests'] .'</td></tr>
                                                <tr><td align="left" valign="top">' . $cus_det[0]['booking_mobileno'] .'</td></tr>
											</table>
										</td>
									</tr>';
                    $mailsubject = "Booking confirmation by '" . $res_det[0]['restaurant_name'] . "' ['" . $order_num . "']";
                    $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] . "/bookTableAcceptMailToAdmin.tpl");
                    $mail_content = str_replace('{SITE_URL}', $CFG['site']['base_url'], $mail_content);
                    $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
                    $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
                    $mail_content = str_replace('{SITE_DOMAIN}', $CFG['site']['sitedomain'], $mail_content);
                    $mail_content = str_replace('{ORDERNUMBER}', $order_num, $mail_content);
                    $mail_content = str_replace('{CUSTOMERADDRESS}', $cus_address, $mail_content);
                    $mail_content = str_replace('{RESTAURANT}', stripslashes($res_det[0]['restaurant_name']), $mail_content);
                    $mail_content = str_replace('{RESTAURANTWEB}', $res_det[0]['restaurant_website'], $mail_content);

                    $this->sendMail($fromname, $fromemail, $toemail, $mailsubject, $mail_content, $mail_attachment_name =  '', $mail_attachment_content = '');
                }
            } elseif ($changestatusval == 'accept' || $changestatusval == 'reject')
            {
               /* $ord_upd = "UPDATE " . $CFG['table']['order'] .
                    " SET res_comm_perchantage = '',res_comm_price = '',res_order_delivereddate = '' WHERE orderid = '" . $_POST['orderid'] . "'";
                $res_upd = mysqli_query($this->DBCONN,$ord_upd) or die(mysqli_error($this->DBCONN));*/

                if ($changestatusval == 'reject')
                {

                    $fail_reason = stripslashes($this->filterInput($_REQUEST['reason']));

                    $res_id = $this->getvalue("restaurant_id", $CFG['table']['restaurant_booking'], "id = '" . $this->filterInput($_POST['orderid']) . "' ");

                    $res_det = $this->getMultiValue("restaurant_name,restaurant_phone, restaurant_website, restaurant_streetaddress, restaurant_city, restaurant_state, restaurant_zip, restaurant_contact_name, restaurant_contact_email, restaurant_website", $CFG['table']['restaurant'], "restaurant_id = '" . $this->filterInput($res_id) . "'");
                                        
                    $cus_det = $this->getMultiValue("bookinggenerateid, booking_name,  booking_email,num_guests, booking_mobileno, booking_time, booking_date",     $CFG['table']['restaurant_booking'], "id = '" . $this->filterInput($_POST['orderid']) . "' ");

                   // $cus_city = $this->getValue("cityname", $CFG['table']['city'], "city_id='" . $cus_det[0]['deliverycity'] . "'");
                   // $cus_state = $this->getValue("statename", $CFG['table']['state'], "state_id='" .  $cus_det[0]['deliverystate'] . "'");
                    
                    /*#Send GCM Notification For Android 
                    $gcm_res = $this->getValue('gcm_register_id',$CFG['table']['gcm'],"order_id AND status = '1'");
                    if(isset($gcm_res) && !empty($gcm_res)){
                        $this->sendGCMnotification('completed',trim($gcm_res[0]['gcm_register_id']),trim($cus_det[0]['ordergenerateid']),trim(stripslashes($res_det[0]['restaurant_name'])),$fail_reason);
                    }*/

                    #Send Failure Mail To Customer From Restaurant
                    $fromname = stripcslashes($res_det[0]['restaurant_name']);
                    $fromemail = stripcslashes($res_det[0]['restaurant_contact_email']);
                    $toemail = stripcslashes($cus_det[0]['booking_email']);

                    //Content
                    $order_num = $cus_det[0]['bookinggenerateid'];
                    $cus_address = '<tr>
										<td align="left" valign="top" width="17%">Booking Details : </td>
										<td align="left" valign="top">
											<table>
												<tr><td align="left" valign="top">' . $cus_det[0]['booking_date'] .'</td></tr>
												<tr><td align="left" valign="top">' . $cus_det[0]['booking_time'] .'</td></tr>
                                                <tr><td align="left" valign="top">' . $cus_det[0]['num_guests'] .'</td></tr>
												<tr><td align="left" valign="top">' . $cus_det[0]['booking_mobileno'] .'</td></tr>
											</table>
										</td>
									</tr>';


                    $mailsubject = "Booking Failure of '" . $CFG['site']['sitename'] . "' ['" . $order_num . "']";
                    $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] . "/bookTableRejectMail.tpl");
                    $mail_content = str_replace('{SITE_URL}', $CFG['site']['base_url'], $mail_content);
                    $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
                    $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
                    $mail_content = str_replace('{SITE_DOMAIN}', $CFG['site']['sitedomain'], $mail_content);
                    $mail_content = str_replace('{REASON}', $fail_reason, $mail_content);
                    $mail_content = str_replace('{CUSTOMER_NAME}', stripslashes($cus_det[0]['booking_name']), $mail_content);
                   // $mail_content = str_replace('{CUSTOMER_LAST_NAME}', stripslashes($cus_det[0]['customerlastname']), $mail_content);
                    $mail_content = str_replace('{ORDERNUMBER}', $order_num, $mail_content);
                    $mail_content = str_replace('{CUSTOMERADDRESS}', $cus_address, $mail_content);
                    $mail_content = str_replace('{RESTAURANT}', stripslashes($res_det[0]['restaurant_name']), $mail_content);


                    $ok = $this->sendMail($fromname, $fromemail, $toemail, $mailsubject, $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');
                    if ($ok)
                    {
                        #Send Failure Mail To Site Admin From Restaurant
                        $fromname = stripcslashes($res_det[0]['restaurant_name']);
                        $fromemail = stripcslashes($res_det[0]['restaurant_contact_email']);
                        $toemail = stripcslashes($CFG['site']['adminemail']);

                        //Content
                        $order_num = $cus_det[0]['bookinggenerateid'];
                        $cus_address = '<tr>
											<td align="left" valign="top" width="17%">Booking details : </td>
											<td align="left" valign="top">
												<table>
													<tr><td align="left" valign="top">' . $cus_det[0]['booking_date'] .'</td></tr>
													<tr><td align="left" valign="top">' . $cus_det[0]['booking_time'] .'</td></tr>
													<tr><td align="left" valign="top">' . $cus_det[0]['num_guests'] .'</td></tr>
                                                    <tr><td align="left" valign="top">' . $cus_det[0]['booking_mobileno'] .'</td></tr>
												</table>
											</td>
										</tr>';


                        $mailsubject = "Booking Failure of '" . $CFG['site']['sitename'] . "' ['" . $order_num . "']";
                        $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] . "/bookTableRejectMailToAdmin.tpl");
                        $mail_content = str_replace('{SITE_URL}', $CFG['site']['base_url'], $mail_content);
                        $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
                        $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
                        $mail_content = str_replace('{SITE_DOMAIN}', $CFG['site']['sitedomain'], $mail_content);
                        $mail_content = str_replace('{REASON}', $fail_reason, $mail_content);
                        $mail_content = str_replace('{CUSTOMER_NAME}', $CFG['site']['sitename'], $mail_content);

                        $mail_content = str_replace('{ORDERNUMBER}', $order_num, $mail_content);
                        $mail_content = str_replace('{CUSTOMERADDRESS}', $cus_address, $mail_content);
                        $mail_content = str_replace('{RESTAURANT}', stripslashes($res_det[0]['restaurant_name']), $mail_content);

                        $this->sendMail($fromname, $fromemail, $toemail, $mailsubject, $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');

                    }
                }
            }
        }
    }
    
    #------------------------------------------------------------------------------------
    #Category List
    /**
     * Restaurant::categoryList()
     * 
     * @return
     */
    function categoryList()
    {
        global $CFG, $objSmarty;

        $resid = $this->filterInput($_SESSION['restaurantownerid']);

        #Sort By
        if (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']) && $_REQUEST['sortbystatus'] ==
            'active')
        {
            $condition .= " AND status = '1'";
        } elseif (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']) &&
        $_REQUEST['sortbystatus'] == 'deactive')
        {
            $condition .= " AND status = '0'";
        }

        #Pagination
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']))
        {
            $limit = $_REQUEST['limit'];
            $fields .= "&limit=" . $_REQUEST['limit'];
        } else
        {
            $limit = USERPAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;
        if (($_REQUEST['limit'] <> "") && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = " $start, $limit";
        }

        $sql_cat = "SELECT maincateid, restaurant_id, maincatename, maincat_seourl, sortorder, status, addeddate FROM " .
            $CFG['table']['category_main'] . " WHERE restaurant_id = '" . $resid . "' " . $condition .
            " ORDER BY sortorder ASC";
        $total_pages = $this->ExecuteQuery($sql_cat, 'norows');

        $targetpage = ",'Category'";
        $sortbystatus = ",'$_REQUEST[sortbystatus]'";
        $next_page = $this->make_page_usersideAjax_myaccount($targetpage, $total_pages,
            $limit, $page, $fields, $sortbystatus);

        $sql_limit = $sql_cat . " LIMIT " . $sql_lim;
        $res_cat = $this->ExecuteQuery($sql_limit, 'select');
        

        if ($total_pages > 0)
        {
            foreach ($res_cat as $key => $value)
            {
                $res_cat[$key]['sno'] = (($page - 1) * $limit) + ($key + 1);
                $res_cat[$key]['addeddate'] = $this->setDateFormatWithTime($res_cat[$key]['addeddate']);
                
            }
        }
       
        #Statistics
        $totalactive = $this->getNumvalues($CFG['table']['category_main'],
            "status = '1' AND restaurant_id = '" . $resid . "' " . $condition . " ");
        $totdeactive = $this->getNumvalues($CFG['table']['category_main'],
            "status = '0' AND restaurant_id = '" . $resid . "' " . $condition . " ");
        $total_categ = $this->getNumvalues($CFG['table']['category_main'],
            "restaurant_id = '" . $resid . "' ");
        #$total_categ = $this->ExecuteQuery($sql_cat,'select');
        
        $objSmarty->assign("tablename", $CFG['table']['category_main']);
        $objSmarty->assign("fieldname", 'status');
        $objSmarty->assign("wherefield", 'maincateid');

        //echo "<pre>";print_r($res_cat);echo "</pre>";
        $objSmarty->assign("categoryListCnt", count($res_cat));
        $objSmarty->assign("categoryList", $res_cat);
        $objSmarty->assign("pagination", $next_page);
        $objSmarty->assign("fields", $fields);

        #$objSmarty->assign("totalcategory", count($total_categ));
        $objSmarty->assign("totalcategory", $total_categ);
        $objSmarty->assign("totalactive", $totalactive);
        $objSmarty->assign("totdeactive", $totdeactive);
    }
    #---------------------------------------------------------------
    #Menu List
    /**
     * Restaurant::menuList()
     * 
     * @return
     */
    function menuList()
    {
        global $CFG, $objSmarty;

        $resid = $this->filterInput($_SESSION['restaurantownerid']);

        if (isset($_SESSION['restaurantownerid']) && !empty($_SESSION['restaurantownerid']))
        {
            $resid = $this->filterInput($_SESSION['restaurantownerid']);
        }

        //echo "<pre>";print_r($_REQUEST);echo "</pre>"; 

        #Sort By
        if (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']) && $_REQUEST['sortbystatus'] ==
            'active')
        {
            $condition .= " AND rm.status = '1' ";
            $cond .= " AND status = '1' ";
            $sort .= "ORDER BY rm.id DESC";
        } elseif (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']) &&
        $_REQUEST['sortbystatus'] == 'deactive')
        {
            $condition .= " AND rm.status = '0' ";
            $cond .= " AND status = '0' ";
            $sort .= "ORDER BY rm.id DESC";
        } elseif (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']) &&
        $_REQUEST['sortbystatus'] == 'popular')
        {
            $condition .= " AND rm.menu_popular_dish = 'Yes' ";
            $cond .= " AND menu_popular_dish = 'Yes' ";
            $sort .= "ORDER BY rm.id DESC";
        } elseif (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']) &&
        $_REQUEST['sortbystatus'] == 'normal')
        {
            $condition .= " AND rm.menu_popular_dish = 'No' ";
            $cond .= " AND menu_popular_dish = 'No' ";
            $sort .= "ORDER BY rm.id DESC";
        } elseif (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']))
        {
            $condition .= " AND rm.menu_category = '" . $this->filterInput($_REQUEST['sortbystatus']) . "' ";
            $cond .= " AND menu_category = '" . $this->filterInput($_REQUEST['sortbystatus']) . "' ";
            $sort .= " ORDER BY rm.sortorder ASC ";
        } else
        {
            $sort .= "ORDER BY rm.sortorder ASC";
        }

        #Pagination
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']))
        {
            $limit = $_REQUEST['limit'];
            $fields .= "&limit=" . $_REQUEST['limit'];
        } else
        {
            $limit = USERPAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;
        if (($_REQUEST['limit'] <> "") && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = " $start, $limit";
        }
        
        if(isset($_REQUEST['mcatid']) && !empty($_REQUEST['mcatid'])){
            
            $condition .= " AND menu_category = '" . $this->filterInput($_REQUEST['mcatid']) . "' ";
            $objSmarty->assign("mcatid", $_REQUEST['mcatid']);
        }
        if(isset($_REQUEST['categorysortby']) && !empty($_REQUEST['categorysortby'])){
            
            $condition .= " AND rm.menu_category = '" . $this->filterInput($_REQUEST['categorysortby']) . "' ";
            $objSmarty->assign("categorysortby", $_REQUEST['categorysortby']);
        }

        $sql_menu = "SELECT rm.id, rm.menu_name, rm.menu_price, rm.menu_category, rm.restaurant_id, rm.menu_type, rm.menu_popular_dish, rm.sortorder, rm.status, rm.addeddate, " .
            " cat.maincatename " . " FROM " . $CFG['table']['restaurant_menu'] . " AS rm " .
            " LEFT JOIN " . $CFG['table']['category_main'] .
            " AS cat ON rm.menu_category = cat.maincateid " . " LEFT JOIN " . $CFG['table']['restaurant'] .
            " AS res ON rm.restaurant_id = res.restaurant_id " .
            " WHERE rm.delete_status = 'No' AND res.delete_status = 'No' AND rm.restaurant_id = '" . $resid . "' " . $condition . " " . $sort . " ";
        $total_pages = $this->ExecuteQuery($sql_menu, 'norows');

        $targetpage = ",'Menu'";
        $sortbystatus = ",'$_REQUEST[sortbystatus]'";

        #echo "<pre>";print_r($res_menu);echo "</pre>";
        $next_page = $this->make_page_usersideAjax_myaccount($targetpage, $total_pages,
            $limit, $page, $fields, $sortbystatus);

        $sql_limit = $sql_menu . " LIMIT " . $sql_lim;
        $res_search = $this->ExecuteQuery($sql_limit, 'select');
         #echo "<pre>";print_r($res_menu);echo "</pre>";

        if ($total_pages > 0)
        {
            foreach ($res_search as $key => $value)
            {
                $res_search[$key]['sno'] = (($page - 1) * $limit) + ($key + 1);
                $res_search[$key]['addeddate'] = $this->setDateFormatWithTime($res_search[$key]['addeddate']);
                
            }
        }

        $objSmarty->assign("menuListCnt", count($res_search));
        $objSmarty->assign("menuList", $res_search);
        $objSmarty->assign("pagination", $next_page);
        $objSmarty->assign("fields", $fields);

        #statistics
        #$tot_menu = $this->ExecuteQuery($sql_menu,'select');
        $tot_menu = $this->getNumvalues($CFG['table']['restaurant_menu'], "restaurant_id = '" . $resid . "' AND delete_status = 'No' ");
        $tot_menu_active = $this->getNumvalues($CFG['table']['restaurant_menu'], "status = '1' AND restaurant_id = '" . $resid . "' AND delete_status = 'No' " . $cond . "  ");
        $tot_menu_deactive = $this->getNumvalues($CFG['table']['restaurant_menu'], "status = '0' AND restaurant_id = '" . $resid . "' AND delete_status = 'No' " . $cond . "  ");
        $tot_menu_popular = $this->getNumvalues($CFG['table']['restaurant_menu'], "menu_popular_dish = 'Yes' AND restaurant_id = '" . $resid . "' AND delete_status = 'No' " . $cond . "  ");
        $tot_menu_normal = $this->getNumvalues($CFG['table']['restaurant_menu'], "menu_popular_dish = 'No' AND restaurant_id = '" . $resid . "' AND delete_status = 'No' " . $cond . "  ");
            
        $objSmarty->assign("tablename", $CFG['table']['restaurant_menu']);
        $objSmarty->assign("fieldname", 'status');
        $objSmarty->assign("wherefield", 'id');

        $objSmarty->assign("tot_menu", $tot_menu);
        $objSmarty->assign("tot_menu_active", $tot_menu_active);
        $objSmarty->assign("tot_menu_deactive", $tot_menu_deactive);
        $objSmarty->assign("tot_menu_popular", $tot_menu_popular);
        $objSmarty->assign("tot_menu_normal", $tot_menu_normal);
    }
    
    
    function getShowCategoryList($restid)
    {
        global $CFG, $objSmarty;

        $sel_cat = "SELECT maincateid,maincatename FROM " . $CFG['table']['category_main'] .
            " WHERE status = '1' AND restaurant_id = '" . $this->filterInput($restid) .
            "' GROUP BY maincatename ORDER BY maincatename ASC";
        $res_cat = $this->ExecuteQuery($sel_cat, "select");
        //echo "<pre>";print_r($res_cat);echo "</pre>";
        $objSmarty->assign("showcategorylist", $res_cat);
    }
    #---------------------------------------------------------------
    #Menu List
    /**
     * Restaurant::addonsList()
     * 
     * @return
     */
    function addonsList()
    {
        global $CFG, $objSmarty;

        $resid = $this->filterInput($_SESSION['restaurantownerid']);

        #Sort By
        if (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']) && $_REQUEST['sortbystatus'] ==
            'active')
        {
            $condition .= " AND ra.status = '1' ";
            $cond .= " AND status = '1' ";
        } elseif (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']) &&
        $_REQUEST['sortbystatus'] == 'deactive')
        {
            $condition .= " AND ra.status = '0' ";
            $cond .= " AND status = '0' ";
        }

        #Pagination
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']))
        {
            $limit = $_REQUEST['limit'];
            $fields .= "&limit=" . $_REQUEST['limit'];
        } else
        {
            $limit = USERPAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;
        if (($_REQUEST['limit'] <> "") && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = " $start, $limit";
        }

        $sql_add = "SELECT ra.id, ra.addonsname, ra.category_id, ra.restaurant_id, ra.status,ra.addeddate, " .
            " cat.maincatename " . " FROM " . $CFG['table']['restaurant_addons'] . " AS ra " .
            " LEFT JOIN " . $CFG['table']['category_main'] .
            " AS cat ON ra.category_id = cat.maincateid " .
            " WHERE parentid = '0' AND ra.restaurant_id = '" . $resid . "' " . $condition .
            " ORDER BY ra.id DESC  ";
        $total_pages = $this->ExecuteQuery($sql_add, 'norows');

        $targetpage = ",'Addon'";
        $sortbystatus = ",'$_REQUEST[sortbystatus]'";
        $next_page = $this->make_page_usersideAjax_myaccount($targetpage, $total_pages,
            $limit, $page, $fields, $sortbystatus);

        $sql_limit = $sql_add . " LIMIT $sql_lim ";
        $res_add = $this->ExecuteQuery($sql_limit, 'select');

        if ($total_pages > 0)
        {
            foreach ($res_add as $key => $value)
            {
                $res_add[$key]['sno'] = (($page - 1) * $limit) + ($key + 1);
                $res_add[$key]['addeddate'] = $this->setDateFormatWithTime($res_add[$key]['addeddate']);
            }
        }

        #statistics
        #$tot_add = $this->ExecuteQuery($sql_add,'select');
        $tot_add = $this->getNumvalues($CFG['table']['restaurant_addons'],
            "parentid = '0' AND restaurant_id = '" . $resid . "' " . $cond . " ");
        $tot_addon_active = $this->getNumvalues($CFG['table']['restaurant_addons'],
            "parentid = '0' AND status = '1' AND restaurant_id = '" . $resid . "' " . $cond . " ");
        $tot_addon_deactive = $this->getNumvalues($CFG['table']['restaurant_addons'],
            "parentid = '0' AND status = '0' AND restaurant_id = '" . $resid . "' " . $cond . " ");
            
        $objSmarty->assign("tablename", $CFG['table']['restaurant_addons']);
        $objSmarty->assign("fieldname", 'status');
        $objSmarty->assign("wherefield", 'id');
        
        $objSmarty->assign("addonsListCnt", count($res_add));
        $objSmarty->assign("addonsList", $res_add);
        $objSmarty->assign("pagination", $next_page);
        $objSmarty->assign("fields", $fields);

        $objSmarty->assign("tot_add", $tot_add);
        $objSmarty->assign("tot_addon_active", $tot_addon_active);
        $objSmarty->assign("tot_addon_deactive", $tot_addon_deactive);

    }
    #---------------------------------------------------------------
    #Offers List
    /**
     * Restaurant::offersList()
     * 
     * @return
     */
    function offersList()
    {
        global $CFG, $objSmarty;

        $resid = $this->filterInput($_SESSION['restaurantownerid']);

        #Sort By
        if (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']) && $_REQUEST['sortbystatus'] ==
            'active')
        {
            $condition .= " AND ro.status = '1' ";
            $cond .= " AND status = '1' ";
        } elseif (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']) &&
        $_REQUEST['sortbystatus'] == 'deactive')
        {
            $condition .= " AND ro.status = '0' ";
            $cond .= " AND status = '0' ";
        }

        #Pagination
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']))
        {
            $limit = $_REQUEST['limit'];
            $fields .= "&limit=" . $_REQUEST['limit'];
        } else
        {
            $limit = USERPAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;
        if (($_REQUEST['limit'] <> "") && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = " $start, $limit";
        }
        $today = date("Y-m-d");
        $objSmarty->assign("today", $today);
        
        $offerstatus = "UPDATE ".$CFG['table']['restaurant_offer']." SET status = '0'  WHERE offer_valid_to < '".$today."' AND status != '2'";
        $offerEnd = $this->ExecuteQuery($offerstatus,'update');
        $sql_offer = "SELECT ro.offer_id,ro.restaurant_id, ro.offer_percentage, ro.offer_price, ro.offer_valid_from, ro.offer_valid_to,ro.status,ro.addeddate, " .
            " ra.restaurant_name " . " FROM " . $CFG['table']['restaurant_offer'] .
            " AS ro " . " LEFT JOIN " . $CFG['table']['restaurant'] .
            " AS ra ON ra.restaurant_id = ro.restaurant_id " . " WHERE ro.restaurant_id = '" .
            $resid . "' " . $condition . " ORDER BY ro.offer_id ASC ";
        $total_pages = $this->ExecuteQuery($sql_offer, 'norows');

        $targetpage = ",'OwnerOffer'";
        $sortbystatus = ",'$_REQUEST[sortbystatus]'";
        $next_page = $this->make_page_usersideAjax_myaccount($targetpage, $total_pages,
            $limit, $page, $fields, $sortbystatus);

        $sql_limit = $sql_offer . " LIMIT $sql_lim ";
        $res_offer = $this->ExecuteQuery($sql_limit, 'select');

        if ($total_pages > 0)
        {
            foreach ($res_offer as $key => $value)
            {
                $res_offer[$key]['sno'] = (($page - 1) * $limit) + ($key + 1);
                $res_offer[$key]['offer_valid_from'] = $this->setDateFormatWithOutTime($res_offer[$key]['offer_valid_from']);
                $res_offer[$key]['offer_valid_to'] = $this->setDateFormatWithOutTime($res_offer[$key]['offer_valid_to']);
                $res_offer[$key]['addeddate'] = $this->setDateFormatWithTime($res_offer[$key]['addeddate']);
                
            }
        }

        #statistics
        #$totres_offer = $this->ExecuteQuery($sql_offer,'select');
        $totres_offer = $this->getNumvalues($CFG['table']['restaurant_offer'],
            "restaurant_id = '" . $resid . "' " . $cond . " ");
        $tot_offer_active = $this->getNumvalues($CFG['table']['restaurant_offer'],
            "status = '1' AND restaurant_id = '" . $resid . "' " . $cond . " ");
        $tot_offer_deactive = $this->getNumvalues($CFG['table']['restaurant_offer'],
            "status = '0' AND restaurant_id = '" . $resid . "' " . $cond . " ");
            
        $objSmarty->assign("tablename", $CFG['table']['restaurant_offer']);
        $objSmarty->assign("fieldname", 'status');
        $objSmarty->assign("wherefield", 'offer_id');

        $objSmarty->assign("offersListCnt", count($res_offer));
        $objSmarty->assign("offersList", $res_offer);
        $objSmarty->assign("pagination", $next_page);
        $objSmarty->assign("fields", $fields);

        $objSmarty->assign("totres_offer", $totres_offer);
        $objSmarty->assign("tot_offer_active", $tot_offer_active);
        $objSmarty->assign("tot_offer_deactive", $tot_offer_deactive);
    }
    #---------------------------------------------------------------------------------------
    #Restaurant Details list
    /**
     * Restaurant::restaurantDetailsList()
     * 
     * @return
     */
    function restaurantDetailsList()
    {
        global $CFG, $objSmarty;

        $resid = $this->filterInput($_SESSION['restaurantownerid']);

        $sel = "SELECT " . " restaurant_id, restaurant_name, restaurant_phone, restaurant_fax, restaurant_website,order_receive_email, restaurant_streetaddress, restaurant_city, restaurant_state, restaurant_zip, restaurant_contact_name, restaurant_contact_phone, restaurant_contact_email, restaurant_description, restaurant_estimated_time, restaurant_delivery, restaurant_delivery_areas, restaurant_delivery_charge, restaurant_minorder_price, restaurant_salestax, restaurant_serving_cuisines,  restaurant_logo, restaurant_delivery_mon_opentime, restaurant_delivery_tue_opentime, restaurant_delivery_wed_opentime, restaurant_delivery_thu_opentime, restaurant_delivery_fri_opentime, restaurant_delivery_sat_opentime, restaurant_delivery_sun_opentime, restaurant_delivery_mon_closetime, restaurant_delivery_tue_closetime, restaurant_delivery_wed_closetime, restaurant_delivery_thu_closetime, restaurant_delivery_fri_closetime, restaurant_delivery_sat_closetime, restaurant_delivery_sun_closetime, restaurant_displayoption, restaurant_pickup, restaurant_booktable, restaurant_status, restaurant_password, addeddate, restaurant_photos1, restaurant_photos2, restaurant_photos3, restaurant_photos4, restaurant_displayoption, restaurant_map, restaurant_displayoption, restaurant_video,restaurant_commission, res_marketbanner_option, res_marketbanner_img_code, restaurant_display_photo, restaurant_display_video, restaurant_display_banner, res_bank_name, res_ac_no, res_routine_no, res_swift_code, restaurant_inv_setting,restaurant_delivery_distance, pending_order_alert, restaurant_set_status, restaurant_set_time " .
            " FROM " . $CFG['table']['restaurant'] . " WHERE restaurant_id = '" . $resid .
            "'  ";
        $res = $this->ExecuteQuery($sel, 'select');
        

        $servingareas = $this->getArrayAreas($res[0]['restaurant_delivery_areas']);
        $servingcuisine = $this->getArrayCuisines($res[0]['restaurant_serving_cuisines']);
        $resOwnNumPhoto = 4;

        $restaurantcity = $this->GetValue("cityname", $CFG['table']['city'],
            "city_id = '" . $this->filterInput($res[0]['restaurant_city']) . "'");
        //$restaurantzip   = $this->GetValue("zipcode",$CFG['table']['zipcode'],"zipcode_id = '".$res[0]['restaurant_zip']."'");
        $restaurantzip = $this->filterInput($res[0]['restaurant_zip']);
        $restaurantstate = $this->GetValue("statename", $CFG['table']['state'],
            "	statecode = '" . $this->filterInput($res[0]['restaurant_state']) . "'");

        $objSmarty->assign("photoLimit", $resOwnNumPhoto);
        $objSmarty->assign("restaurantstate", $restaurantstate);
        $objSmarty->assign("restaurantcity", $restaurantcity);
        $objSmarty->assign("restaurantzip", $restaurantzip);
        $objSmarty->assign("servingcuisine", $servingcuisine);
        $objSmarty->assign("servingareas", $servingareas);

        $sel_time = "SELECT 
						restaurant_id, mon_firstopen_time, 	mon_firstclose_time, tue_firstopen_time, tue_firstclose_time, wed_firstopen_time, wed_firstclose_time, 	thu_firstopen_time,	thu_firstclose_time, fri_firstopen_time, fri_firstclose_time, sat_firstopen_time, sat_firstclose_time, sun_firstopen_time, sun_firstclose_time, mon_secondopen_time, mon_secondclose_time, tue_secondopen_time,	tue_secondclose_time, wed_secondopen_time, wed_secondclose_time, thu_secondopen_time, thu_secondclose_time,	fri_secondopen_time, fri_secondclose_time, sat_secondopen_time,	sat_secondclose_time, sun_secondopen_time, sun_secondclose_time	FROM " .
            $CFG['table']['restaurant_timing'] . " WHERE restaurant_id = '" . $resid . "'  ";
        $res_time = $this->ExecuteQuery($sel_time, 'select');
        $objSmarty->assign("restaurantEditListTiming", $res_time);

        $objSmarty->assign("restaurantDetailsList", $res);


        //return $res;
    }
    #---------------------------------------------------------------
    #Offers List
    /**
     * Restaurant::reviewsList()
     * 
     * @return
     */
    function reviewsList()
    {
        global $CFG, $objSmarty;

        $resid = $this->filterInput($_SESSION['restaurantownerid']);

        #Sort By
        if (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']) && $_REQUEST['sortbystatus'] ==
            'active')
        {
            $condition .= " AND rr.status = '1' ";
            $cond .= " AND status = '1' ";
        } elseif (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']) &&
        $_REQUEST['sortbystatus'] == 'deactive')
        {
            $condition .= " AND rr.status = '0' ";
            $cond .= " AND status = '0' ";
        }

        #Pagination
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']))
        {
            //echo "hi";
            $limit = $_REQUEST['limit'];
            $fields .= "&limit=" . $_REQUEST['limit'];
        } else
        {
            
            $limit = USERPAGELIMIT;
            //echo $limit;
        }

        
        $page = $_REQUEST['page'];
        
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;
        if (($_REQUEST['limit'] <> "") && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = " $start, $limit";
        }

        $sql_review = "SELECT rr.rating_id, rr.order_id, rr.restaurant_id, rr.customer_id, rr.rating, rr.message, rr.addeddate, rr.status, " .
            " res.restaurant_name, " . "cus.customer_name " . " FROM " . $CFG['table']['restaurant_reviews'] .
            " AS rr " . " LEFT JOIN " . $CFG['table']['restaurant'] .
            " AS res ON rr.restaurant_id = res.restaurant_id " . " LEFT JOIN " . $CFG['table']['customer'] .
            " AS cus ON rr.customer_id = cus.customer_id " . " WHERE rr.restaurant_id = '" .
            $resid . "' AND res.restaurant_status = '1' AND rr.rating_id IS NOT NULL " . $condition .
            " ORDER BY rr.rating_id DESC ";
        $total_pages = $this->ExecuteQuery($sql_review, 'norows');

        $targetpage = ",'Reviews'";
        $sortbystatus = ",'$_REQUEST[sortbystatus]'";
        $next_page = $this->make_page_usersideAjax_myaccount($targetpage, $total_pages,
            $limit, $page, $fields, $sortbystatus);

        $sql_limit = $sql_review . " LIMIT " . $sql_lim;
        $res_review = $this->ExecuteQuery($sql_limit, 'select');
        //echo $total_pages;
        //echo $page;
        //echo "<pre>";print_r($res_review);echo "</pre>"; 
        if ($total_pages > 0)
        {
            foreach ($res_review as $key => $value)
            {
                //echo $page;
                $res_review[$key]['sno'] = (($page - 1) * $limit) + ($key + 1);
                $res_review[$key]['addeddate'] =  $this->setDateFormatWithTime($res_review[$key]['addeddate']);
            }
        }

        #statistics
        $totres_review = $this->getNumvalues($CFG['table']['restaurant_reviews'],
            "restaurant_id = '" . $resid . "' " . $cond . " ");
        $tot_review_active = $this->getNumvalues($CFG['table']['restaurant_reviews'],
            "status = '1' AND restaurant_id = '" . $resid . "' " . $cond . " ");
        $tot_review_deactive = $this->getNumvalues($CFG['table']['restaurant_reviews'],
            "status = '0' AND restaurant_id = '" . $resid . "' " . $cond . " ");

        $objSmarty->assign("reviewsListCnt", count($res_review));
        $objSmarty->assign("reviewsList", $res_review);
        $objSmarty->assign("pagination", $next_page);
        $objSmarty->assign("fields", $fields);

        $objSmarty->assign("totres_review", $totres_review);
        $objSmarty->assign("tot_review_active", $tot_review_active);
        $objSmarty->assign("tot_review_deactive", $tot_review_deactive);
    }
    #---------------------------------------------------------------------------------------
    #Restaurant Myaccount Info
    /**
     * Restaurant::restaurantAccountInfo()
     * 
     * @return
     */
    function restaurantAccountInfo()
    {
        global $CFG, $objSmarty;

        #echo "<pre>";print_r($_REQUEST);echo "</pre>";

        $restaurant_name = $this->filterInput($_POST['restaurant_name']);
        $restaurant_phone = $this->filterInput($_POST['restaurant_phone']);
        $restaurant_fax = $this->filterInput($_POST['restaurant_fax']);
        $restaurant_website = $this->filterInput($_POST['restaurant_website']);
        $restaurant_streetaddress = $this->filterInput($_POST['restaurant_streetaddress']);
        $restaurant_city = $this->filterInput($_POST['restaurant_city']);
        $restaurant_state = $this->filterInput($_POST['restaurant_state']);
        $restaurant_zip = $this->filterInput($_POST['restaurant_zip']);
        $restaurant_contact_name = $this->filterInput($_POST['restaurant_contact_name']);
        $restaurant_contact_phone = $this->filterInput($_POST['restaurant_contact_phone']);
        $restaurant_contact_email = $this->filterInput($_POST['restaurant_contact_email']);
        $restaurant_password = $this->filterInput($_POST['restaurant_password']);

        $restaurantseourl = $this->seoUrl($_POST['restaurant_name']);

        $upd_rest = "UPDATE  
								" . $CFG['table']['restaurant'] . "
						    SET
						    	restaurant_name  				 	= '" . $this->filterInput($restaurant_name) . "',
						    	restaurant_seourl  				 	= '" . $this->filterInput($restaurantseourl) . "',
						    	restaurant_phone  				 	= '" . $this->filterInput($restaurant_phone) . "',
						    	restaurant_website  			 	= '" . $this->filterInput($restaurant_website) . "',
						    	restaurant_fax 				 	    = '" . $this->filterInput($restaurant_fax) . "',
						    	restaurant_streetaddress  		 	= '" . $this->filterInput($restaurant_streetaddress) . "',
						    	restaurant_city  					= '" . $restaurant_city . "',
						    	restaurant_state  					= '" . $restaurant_state . "',
						    	restaurant_zip  					= '" . $this->filterInput($restaurant_zip) . "',
						    	restaurant_contact_name  			= '" . $this->filterInput($restaurant_contact_name) . "',
						    	restaurant_contact_phone  			= '" . $this->filterInput($restaurant_contact_phone) . "',
						    	restaurant_contact_email  			= '" . $this->filterInput($restaurant_contact_email) . "',
						    	restaurant_password  			    = '" . $this->filterInput($restaurant_password) . "'
							WHERE restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) . "' ";
        #echo $ins_rest;
        $upd_res_rest = $this->ExecuteQuery($upd_rest, 'update');
        echo 'success';

    }
     #---------------------------------------------------------------------------------------
    #Restaurant Check Mail Exists
    /**
     * Restaurant::restaurantEditContactInfo()
     * 
     * @return
     */
     /*function checkResNameAlreadyExist(){
		global $CFG,$objSmarty;
		//echo "<pre>";print_r($_REQUEST);echo "</pre>";
		$resname = $this->getMultiValue("restaurant_name,restaurant_id",$CFG['table']['restaurant'],"restaurant_name = '".$_REQUEST['restaurant_name']."'");
		//echo "<pre>";print_r($email);echo "</pre>";
		$resname = $this->getMultiValue("restaurant_name,restaurant_id",$CFG['table']['restaurant'],"restaurant_name = '".$_REQUEST['restaurant_name']."'");
		//echo "<pre>";print_r($email);echo "</pre>";
		if( isset($_SESSION['restaurantownerid']) && !empty($_SESSION['restaurantownerid']) ){
            $countresname		=	$this->getNumvalues($CFG['table']['restaurant']," restaurant_name = '".$_REQUEST['restaurant_name']."' AND restaurant_id != '".$_SESSION['restaurantownerid']."' ");
			//$countresemail		=   $this->getNumvalues($CFG['table']['restaurant']," restaurant_contact_email = '".$_REQUEST['restaurant_contact_email']."' AND restaurant_id != '".$_SESSION['restaurantownerid']."' " );
			
			if($countresname != '0'){
				echo "nameAlready";
			}
			else{
				echo "success";
			}
			
		}	
	}*/
    
    #---------------------------------------------------------------------------------------
    #Restaurant Check Mail Exists
    /**
     * Restaurant::restaurantEditContactInfo()
     * 
     * @return
     */
     function checkResEmailAlreadyExist(){
		global $CFG,$objSmarty;
		//echo "<pre>";print_r($_REQUEST);echo "</pre>";
		$email = $this->getMultiValue("restaurant_name,restaurant_id",$CFG['table']['restaurant'],"restaurant_contact_email = '".$this->filterInput($_REQUEST['restaurant_contact_email'])."'");
		//echo "<pre>";print_r($email);echo "</pre>";
		$email = $this->getMultiValue("restaurant_name,restaurant_id,restaurant_contact_email",$CFG['table']['restaurant'],"restaurant_contact_email = '".$this->filterInput($_REQUEST['restaurant_contact_email'])."'");
		//echo "<pre>";print_r($email);echo "</pre>";
		if( isset($_SESSION['restaurantownerid']) && !empty($_SESSION['restaurantownerid']) ){
            $countresname		=	$this->getNumvalues($CFG['table']['restaurant']," restaurant_name = '".$_REQUEST['restaurant_name']."' AND restaurant_id != '".$this->filterInput($_SESSION['restaurantownerid'])."' ");
			$countresemail		=   $this->getNumvalues($CFG['table']['restaurant']," restaurant_contact_email = '".$_REQUEST['restaurant_contact_email']."' AND restaurant_id != '".$this->filterInput($_SESSION['restaurantownerid'])."' " );
			
			if($countresemail != '0'){
				echo "emailAlready";
			}
			else{
				echo "success";
			}
			
		}	
	}
    
    #---------------------------------------------------------------------------------------
    #Restaurant Myaccount Info
    /**
     * Restaurant::restaurantEditContactInfo()
     * 
     * @return
     */
    function restaurantEditContactInfo()
    {
        global $CFG, $objSmarty;

        #echo "<pre>";print_r($_REQUEST);echo "</pre>";
        #exit;

        $restaurant_contact_name = $this->filterInput($_POST['restaurant_contact_name']);
        $restaurant_contact_phone = $this->filterInput($_POST['restaurant_contact_phone']);
        $restaurant_contact_email = $this->filterInput($_POST['restaurant_contact_email']);
        $restaurant_streetaddress = $this->filterInput($_POST['restaurant_streetaddress']);
        $restaurant_city = $this->filterInput($_POST['restaurant_city']);
        $restaurant_state = $this->filterInput($_POST['restaurant_state']);
        $restaurant_zip = $this->filterInput($_POST['restaurant_zip']);

        $upd_rest = "UPDATE  
								" . $CFG['table']['restaurant'] . "
						    SET
						    	restaurant_contact_name  			= '" . $this->filterInput($restaurant_contact_name) . "',
						    	restaurant_contact_phone  			= '" . $this->filterInput($restaurant_contact_phone) . "',
						    	restaurant_contact_email  			= '" . $this->filterInput($restaurant_contact_email) . "',
						    	restaurant_streetaddress  		 	= '" . $this->filterInput($restaurant_streetaddress) . "',
						    	restaurant_city  					= '" . $restaurant_city . "',
						    	restaurant_state  					= '" . $restaurant_state . "',
						    	restaurant_zip  					= '" . $this->filterInput($restaurant_zip) . "'
							WHERE restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) . "' ";
        //echo $upd_rest;
        $upd_res_rest = $this->ExecuteQuery($upd_rest, 'update');
        echo 'success';

    }
    #----------------------------------------------------------------------------
    #Restaurant Change Password
    /*function restaurantChangePassword(){
    global $CFG;
    
    $oldpassword = $this->filterInput($_POST["oldpassword"]);
    $newpassword = $_POST["newpassword"];
    
    $oldpwd_db = trim($this->GetValue("restaurant_password",$CFG['table']['restaurant'],"restaurant_id = '".$_SESSION['restaurantownerid']."'"));
    if($oldpwd_db != $oldpassword){
    echo "Invalid_Old_Pwd";		
    }else{
    $sql_ups = "UPDATE ".$CFG['table']['restaurant']." SET restaurant_password = '".$newpassword."' WHERE restaurant_id ='".$_SESSION['restaurantownerid']."' ";
    $res_ups = $this->ExecuteQuery($sql_ups,'update');
    echo 'success';
    }
    }*/
    #based on encrption
    /**
     * Restaurant::restaurantChangePassword()
     * 
     * @return
     */
    function restaurantChangePassword()
    {
        global $CFG;

        $newpassword = $this->encrypt_password_md5($_POST["newpassword"]);

        $sql_ups = "UPDATE " . $CFG['table']['restaurant'] .
            " SET restaurant_password = '" . $this->filterInput($newpassword) . "' WHERE restaurant_id ='" . $this->filterInput($_SESSION['restaurantownerid']) .
            "' ";
        $res_ups = $this->ExecuteQuery($sql_ups, 'update');
        //echo $sql_ups;
        echo 'success';
    }
    #---------------------------------------------------------------------------------------
    #Restaurant Myaccount Info
    /**
     * Restaurant::editRestaurantInfo()
     * 
     * @return
     */
    function editRestaurantInfo()
    {
        global $CFG, $objSmarty;

        $restaurant_name = $this->filterInput($_POST['restaurant_name']);
        $restaurant_phone = $this->filterInput($_POST['restaurant_phone']);
        $restaurant_web = $this->filterInput($_POST['restaurant_website']);
        $restaurant_order_receive_mail = $this->filterInput($_POST['order_receive_mail']);
        $restaurant_fax = $this->filterInput($_POST['restaurant_fax']);
        $restaurant_desc = $this->filterInput($_POST['restaurant_description']);
        $restaurant_minorder = $this->filterInput($_POST['restaurant_minorder_price']);
        $restaurant_tax = $this->filterInput($_POST['restaurant_salestax']);
        $restaurant_pickup = $this->filterInput($_POST['pickup']);
        $restaurant_bookatable = $this->filterInput($_POST['bookatable']);

        $restaurantseourl = $this->seoUrl($_POST['restaurant_name']);

        $sel_cuisine = $_POST['cuisineid'];
        $servecuisine = substr($sel_cuisine, 0, -1);
        
        $setrest_status = $_POST['restaurant_setstatus'];
        if($setrest_status != 'TT'){
            $setcurrenttime = date("H:i");
        }

        $upd_rest = "UPDATE  
								" . $CFG['table']['restaurant'] . "
						    SET
						    	restaurant_name  				 	= '" . $this->filterInput($restaurant_name) . "',
						    	restaurant_seourl  				 	= '" . $this->filterInput($restaurantseourl) . "',
						    	restaurant_phone  				 	= '" . $this->filterInput($restaurant_phone) . "',
						    	restaurant_website  			 	= '" . $this->filterInput($restaurant_web) . "',
						    	order_receive_email					= '" . $this->filterInput($restaurant_order_receive_mail) . "',
						    	restaurant_fax 				 	    = '" . $this->filterInput($restaurant_fax) . "',
						    	restaurant_description  		 	= '" . $this->filterInput($restaurant_desc) . "',
						    	restaurant_pickup					= '" . $restaurant_pickup . "',
						    	restaurant_booktable          		= '" . $restaurant_bookatable . "',
						    	restaurant_minorder_price  			= '" . $this->filterInput($restaurant_minorder) . "',
						    	restaurant_salestax  				= '" . $this->filterInput($restaurant_tax) . "',
						    	restaurant_serving_cuisines  		= '" . $servecuisine . "',
                                restaurant_set_status               = '" . $setrest_status."',
                                restaurant_set_time                 = '" . $setcurrenttime."',
						    	pending_order_alert					= '" . addslashes($this->filterInput($_REQUEST['alert'])) . "'
							WHERE restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) . "' ";
        $upd_res_rest = $this->ExecuteQuery($upd_rest, 'update');

        if ($upd_res_rest)
        {

            $getresdet = $this->getMultivalue("restaurant_serving_cuisines,restaurant_paymentoption",
                $CFG['table']['restaurant'], "restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) . "'");
            $selcuisine = explode(",", $getresdet[0]['restaurant_serving_cuisines']);

            #Serving Cuisine
            $trunc_tab = "DELETE FROM " . $CFG['table']['restaurant_serving_cuisines'] .
                " WHERE restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) . "' ";
            $trunc_res = mysqli_query($this->DBCONN,$trunc_tab) or die(mysqli_error($this->DBCONN));

            for ($i = 0; $i < count($selcuisine); $i++)
            {
                $ins_sercuisine = "INSERT INTO " . $CFG['table']['restaurant_serving_cuisines'] .
                    " SET restaurant_id = '" . $_SESSION['restaurantownerid'] . "', cuisine_id = '" .
                    $this->filterInput($selcuisine[$i]) . "', addeddate='" . CUR_TIME . "' ";
                $res_sercuisine = $this->ExecuteQuery($ins_sercuisine, 'insert');
            }

        }
        echo 'success';

    }
    #---------------------------------------------------------------------------------------
    #Restaurant Myaccount Info
    /**
     * Restaurant::editDeliveryInfo()
     * 
     * @return
     */
    function editDeliveryInfo()
    {
        global $CFG, $objSmarty;

        $restaurant_delivery            = $this->filterInput($_POST['delivery']);
        $restaurant_estimated_time      = $this->filterInput($_POST['restaurant_estimated_time']);
        $restaurant_delivery_charge     = $this->filterInput($_POST['restaurant_delivery_charge']);
        $restaurant_delivery_distance   = $this->filterInput($_REQUEST['restaurant_delivery_distance']);

        $selarea = $_POST['areaid'];
        $serveareas = substr($selarea, 0, -1);

        $upd_rest = "UPDATE  
								" . $CFG['table']['restaurant'] . "
						    SET
							    restaurant_delivery  				= '" . $this->filterInput($restaurant_delivery) . "',
							    restaurant_delivery_areas 			= '" . $this->filterInput($serveareas) . "',
						    	restaurant_estimated_time  			= '" . $this->filterInput($restaurant_estimated_time) . "',
						    	restaurant_delivery_charge 			= '" . $this->filterInput($restaurant_delivery_charge) .
            "',
						    	restaurant_delivery_distance		= '" . $this->filterInput($restaurant_delivery_distance) .
            "'
							WHERE restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) . "' ";
        $upd_res_rest = $this->ExecuteQuery($upd_rest, 'update');
        if ($upd_res_rest)
        {

            $getresdet = $this->getMultivalue("restaurant_delivery_areas", $CFG['table']['restaurant'],
                "restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) . "'");
            $selareass = explode(",", $getresdet[0]['restaurant_delivery_areas']);

            #Serving Cuisine
            $trunc_tab = "DELETE FROM " . $CFG['table']['restaurant_delivery_areas'] .
                " WHERE restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) . "' ";
            $trunc_res = mysqli_query($this->DBCONN,$trunc_tab) or die(mysqli_error($this->DBCONN));

            for ($i = 0; $i < count($selareass); $i++)
            {
                //$ins_serareass = "INSERT INTO " . $CFG['table']['restaurant_delivery_areas'] .
                   // " SET restaurant_id = '" . $_SESSION['restaurantownerid'] . "', city_id = '" . $selareass[$i] .
                    //"', addeddate='" . CUR_TIME . "' ";
                //$res_serareass = $this->ExecuteQuery($ins_serareass, 'insert');
            }
        }
        echo 'success';

    }

    #---------------------------------------------------------------------------------------
    #Restaurant Myaccount Bank Info
    /**
     * Restaurant::editBankInfo()
     * 
     * @return
     */
    function editBankInfo()
    {
        global $CFG, $objSmarty;

        $res_bank_name  = $this->filterInput($_POST['res_bank_name']);
        $res_ac_no      = $this->filterInput($_POST['res_ac_no']);
        $res_routine_no = $this->filterInput($_POST['res_routine_no']);
        $res_swift_code = $this->filterInput($_POST['res_swift_code']);

        $upd_rest = "UPDATE " . $CFG['table']['restaurant'] . " SET
							    res_bank_name		= '" . $this->filterInput($res_bank_name) . "',
							    res_ac_no 			= '" . $this->filterInput($res_ac_no) . "',
						    	res_routine_no		= '" . $this->filterInput($res_routine_no) . "',
						    	res_swift_code		= '" . $this->filterInput($res_swift_code) . "'
							WHERE restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) . "' ";
        $upd_res_rest = $this->ExecuteQuery($upd_rest, 'update');
        echo 'success';

    }
    #---------------------------------------------------------------------------------------
    #Restaurant Myaccount Invoice Info
    /**
     * Restaurant::editInvoiceInfo()
     * 
     * @return
     */
    function editInvoiceInfo()
    {
        global $CFG, $objSmarty;

        $restaurant_inv_setting = $this->filterInput($_POST['restaurant_inv_setting']);

        $upd_rest = "UPDATE " . $CFG['table']['restaurant'] . " SET
							    restaurant_inv_setting		= '" . $restaurant_inv_setting . "'
							WHERE restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) . "' ";
        $upd_res_rest = $this->ExecuteQuery($upd_rest, 'update');
        echo 'success';

    }
    #---------------------------------------------------------------
    #Invoice List
    /**
     * Restaurant::invoiceList()
     * 
     * @return
     */
    function invoiceList()
    {
        global $CFG, $objSmarty;

        $resid = $this->filterInput($_SESSION['restaurantownerid']);

        if (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']) && $_REQUEST['sortbystatus'] ==
            'IS')
        {
            $condition .= " AND invoice_status = 'IS'";
        } elseif (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']) &&
        $_REQUEST['sortbystatus'] == 'PS')
        {
            $condition .= " AND invoice_status = 'PS'";
        } elseif (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']) &&
        $_REQUEST['sortbystatus'] == 'PR')
        {
            $condition .= " AND invoice_status = 'PR'";
        }

        #Pagination
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']))
        {
            $limit = $_REQUEST['limit'];
            $fields .= "&limit=" . $_REQUEST['limit'];
        } else
        {
            $limit = USERPAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;
        if (($_REQUEST['limit'] <> "") && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = " $start, $limit";
        }

        $sql_ord = "SELECT invoice_id, invoice_gen_id, inv_month, inv_month_p_short, inv_month_period, inv_month_period_limit, inv_acc_balance, invoice_status, invoice_sent_date FROM " .
            $CFG['table']['invoice'] .
            " WHERE restaurant_id != '0' AND invoice_id IS NOT NULL AND restaurant_id = '" .
            $resid . "' " . $condition . " ORDER BY invoice_id DESC ";
        $total_pages = $this->ExecuteQuery($sql_ord, 'norows');

        $targetpage = ",'Invoice'";
        $sortbystatus = ",'$_REQUEST[sortbystatus]'";
        $next_page = $this->make_page_usersideAjax_myaccount($targetpage, $total_pages,
            $limit, $page, $fields, $sortbystatus);

        $sql_limit = $sql_ord . " LIMIT " . $sql_lim;
        $res_ord = $this->ExecuteQuery($sql_limit, 'select');
        

        if ($total_pages > 0)
        {
            foreach ($res_ord as $key => $value)
            {
                $res_ord[$key]['sno'] = (($page - 1) * $limit) + ($key + 1);
            }
        }

        //$tot_ord  		 	= $this->ExecuteQuery($sql_ord,'select');
        $inv_tot_cnt = $this->getNumvalues($CFG['table']['invoice'], "restaurant_id = '" .
            $resid . "' ");
        $inv_sent_cnt = $this->getNumvalues($CFG['table']['invoice'],
            "invoice_status = 'IS' AND restaurant_id = '" . $resid . "' " . $condition . " ");
        $inv_payment_sent_cnt = $this->getNumvalues($CFG['table']['invoice'],
            "invoice_status = 'PS' AND restaurant_id = '" . $resid . "' " . $condition . " ");
        $inv_paymnet_receive_cnt = $this->getNumvalues($CFG['table']['invoice'],
            "invoice_status = 'PR' AND restaurant_id = '" . $resid . "' " . $condition . " ");

        $objSmarty->assign("invoiceList", $res_ord);
        $objSmarty->assign("pagination", $next_page);
        $objSmarty->assign("fields", $fields);

        #Statistics
        $objSmarty->assign("inv_tot_cnt", $inv_tot_cnt);
        $objSmarty->assign("inv_sent_cnt", $inv_sent_cnt);
        $objSmarty->assign("inv_payment_sent_cnt", $inv_payment_sent_cnt);
        $objSmarty->assign("inv_paymnet_receive_cnt", $inv_paymnet_receive_cnt);

    }
    #----------------------------------------------------------------------------------------
    #Restaurant Open And Close
    /**
     * Restaurant::editOpenCloseInfo_BackupByRaja()
     * 
     * @return
     */
    function editOpenCloseInfo_BackupByRaja()
    {
        global $CFG, $objSmarty;

        #Mon
        list($res_mon_opening_time, $res_mon_closeing_time) = $this->insertTimeOption($_POST['restaurant_delivery_mon_open_hr'],
            $_POST['restaurant_delivery_mon_open_min'], $_POST['restaurant_delivery_mon_open_sess'],
            $_POST['restaurant_delivery_mon_close_hr'], $_POST['restaurant_delivery_mon_close_min'],
            $_POST['restaurant_delivery_mon_close_sess']);
        #Tues
        list($res_tue_opening_time, $res_tue_closeing_time) = $this->insertTimeOption($_POST['restaurant_delivery_tue_open_hr'],
            $_POST['restaurant_delivery_tue_open_min'], $_POST['restaurant_delivery_tue_open_sess'],
            $_POST['restaurant_delivery_tue_close_hr'], $_POST['restaurant_delivery_tue_close_min'],
            $_POST['restaurant_delivery_tue_close_sess']);
        #Wed
        list($res_wed_opening_time, $res_wed_closeing_time) = $this->insertTimeOption($_POST['restaurant_delivery_wed_open_hr'],
            $_POST['restaurant_delivery_wed_open_min'], $_POST['restaurant_delivery_wed_open_sess'],
            $_POST['restaurant_delivery_wed_close_hr'], $_POST['restaurant_delivery_wed_close_min'],
            $_POST['restaurant_delivery_wed_close_sess']);
        #Thurs
        list($res_thu_opening_time, $res_thu_closeing_time) = $this->insertTimeOption($_POST['restaurant_delivery_thu_open_hr'],
            $_POST['restaurant_delivery_thu_open_min'], $_POST['restaurant_delivery_thu_open_sess'],
            $_POST['restaurant_delivery_thu_close_hr'], $_POST['restaurant_delivery_thu_close_min'],
            $_POST['restaurant_delivery_thu_close_sess']);
        #Fri
        list($res_fri_opening_time, $res_fri_closeing_time) = $this->insertTimeOption($_POST['restaurant_delivery_fri_open_hr'],
            $_POST['restaurant_delivery_fri_open_min'], $_POST['restaurant_delivery_fri_open_sess'],
            $_POST['restaurant_delivery_fri_close_hr'], $_POST['restaurant_delivery_fri_close_min'],
            $_POST['restaurant_delivery_fri_close_sess']);
        #Satur
        list($res_sat_opening_time, $res_sat_closeing_time) = $this->insertTimeOption($_POST['restaurant_delivery_sat_open_hr'],
            $_POST['restaurant_delivery_sat_open_min'], $_POST['restaurant_delivery_sat_open_sess'],
            $_POST['restaurant_delivery_sat_close_hr'], $_POST['restaurant_delivery_sat_close_min'],
            $_POST['restaurant_delivery_sat_close_sess']);
        #Sun
        list($res_sun_opening_time, $res_sun_closeing_time) = $this->insertTimeOption($_POST['restaurant_delivery_sun_open_hr'],
            $_POST['restaurant_delivery_sun_open_min'], $_POST['restaurant_delivery_sun_open_sess'],
            $_POST['restaurant_delivery_sun_close_hr'], $_POST['restaurant_delivery_sun_close_min'],
            $_POST['restaurant_delivery_sun_close_sess']);

        $upd_rest = "UPDATE  
								" . $CFG['table']['restaurant'] . "
						    SET
						    	restaurant_delivery_mon_opentime  	= '" . $res_mon_opening_time . "',
						    	restaurant_delivery_mon_closetime  	= '" . $res_mon_closeing_time .
            "',
						    	restaurant_delivery_tue_opentime  	= '" . $res_tue_opening_time . "',
						    	restaurant_delivery_tue_closetime  	= '" . $res_tue_closeing_time .
            "',
						    	restaurant_delivery_wed_opentime  	= '" . $res_wed_opening_time . "',
						    	restaurant_delivery_wed_closetime 	= '" . $res_wed_closeing_time .
            "',
						    	restaurant_delivery_thu_opentime  	= '" . $res_thu_opening_time . "',
						    	restaurant_delivery_thu_closetime  	= '" . $res_thu_closeing_time .
            "',
						    	restaurant_delivery_fri_opentime  	= '" . $res_fri_opening_time . "',
						    	restaurant_delivery_fri_closetime  	= '" . $res_fri_closeing_time .
            "',
						    	restaurant_delivery_sat_opentime  	= '" . $res_sat_opening_time . "',
						    	restaurant_delivery_sat_closetime  	= '" . $res_sat_closeing_time .
            "',
						    	restaurant_delivery_sun_opentime  	= '" . $res_sun_opening_time . "',
						    	restaurant_delivery_sun_closetime  	= '" . $res_sun_closeing_time .
            "'
							WHERE restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) . "'  ";
        $upd_res_rest = $this->ExecuteQuery($upd_rest, 'update');
        echo 'success';

    }
    #----------------------------------------------------------------------------------------
    #Restaurant Open And Close
    /**
     * Restaurant::editOpenCloseInfo()
     * 
     * @return
     */
    function editOpenCloseInfo()
    {
        global $CFG, $objSmarty;

        #Second Time Implementation:
        #Mon
        list($mon_firstopen_time, $mon_firstclose_time, $mon_secondopen_time, $mon_secondclose_time) =
            $this->insertTimeOption_Second_Time($_POST['restaurant_delivery_mon_open_hr'], $_POST['restaurant_delivery_mon_open_min'],
            $_POST['restaurant_delivery_mon_open_sess'], $_POST['restaurant_delivery_mon_close_hr'],
            $_POST['restaurant_delivery_mon_close_min'], $_POST['restaurant_delivery_mon_close_sess'],
            $_POST['restaurant_delivery_mon_open_hr_second'], $_POST['restaurant_delivery_mon_open_min_second'],
            $_POST['restaurant_delivery_mon_open_sess_second'], $_POST['restaurant_delivery_mon_close_hr_second'],
            $_POST['restaurant_delivery_mon_close_min_second'], $_POST['restaurant_delivery_mon_close_sess_second']);
        #Tues
        list($tue_firstopen_time, $tue_firstclose_time, $tue_secondopen_time, $tue_secondclose_time) =
            $this->insertTimeOption_Second_Time($_POST['restaurant_delivery_tue_open_hr'], $_POST['restaurant_delivery_tue_open_min'],
            $_POST['restaurant_delivery_tue_open_sess'], $_POST['restaurant_delivery_tue_close_hr'],
            $_POST['restaurant_delivery_tue_close_min'], $_POST['restaurant_delivery_tue_close_sess'],
            $_POST['restaurant_delivery_tue_open_hr_second'], $_POST['restaurant_delivery_tue_open_min_second'],
            $_POST['restaurant_delivery_tue_open_sess_second'], $_POST['restaurant_delivery_tue_close_hr_second'],
            $_POST['restaurant_delivery_tue_close_min_second'], $_POST['restaurant_delivery_tue_close_sess_second']);
        #Wed
        list($wed_firstopen_time, $wed_firstclose_time, $wed_secondopen_time, $wed_secondclose_time) =
            $this->insertTimeOption_Second_Time($_POST['restaurant_delivery_wed_open_hr'], $_POST['restaurant_delivery_wed_open_min'],
            $_POST['restaurant_delivery_wed_open_sess'], $_POST['restaurant_delivery_wed_close_hr'],
            $_POST['restaurant_delivery_wed_close_min'], $_POST['restaurant_delivery_wed_close_sess'],
            $_POST['restaurant_delivery_wed_open_hr_second'], $_POST['restaurant_delivery_wed_open_min_second'],
            $_POST['restaurant_delivery_wed_open_sess_second'], $_POST['restaurant_delivery_wed_close_hr_second'],
            $_POST['restaurant_delivery_wed_close_min_second'], $_POST['restaurant_delivery_wed_close_sess_second']);
        #Thurs
        list($thu_firstopen_time, $thu_firstclose_time, $thu_secondopen_time, $thu_secondclose_time) =
            $this->insertTimeOption_Second_Time($_POST['restaurant_delivery_thu_open_hr'], $_POST['restaurant_delivery_thu_open_min'],
            $_POST['restaurant_delivery_thu_open_sess'], $_POST['restaurant_delivery_thu_close_hr'],
            $_POST['restaurant_delivery_thu_close_min'], $_POST['restaurant_delivery_thu_close_sess'],
            $_POST['restaurant_delivery_thu_open_hr_second'], $_POST['restaurant_delivery_thu_open_min_second'],
            $_POST['restaurant_delivery_thu_open_sess_second'], $_POST['restaurant_delivery_thu_close_hr_second'],
            $_POST['restaurant_delivery_thu_close_min_second'], $_POST['restaurant_delivery_thu_close_sess_second']);
        #Fri
        list($fri_firstopen_time, $fri_firstclose_time, $fri_secondopen_time, $fri_secondclose_time) =
            $this->insertTimeOption_Second_Time($_POST['restaurant_delivery_fri_open_hr'], $_POST['restaurant_delivery_fri_open_min'],
            $_POST['restaurant_delivery_fri_open_sess'], $_POST['restaurant_delivery_fri_close_hr'],
            $_POST['restaurant_delivery_fri_close_min'], $_POST['restaurant_delivery_fri_close_sess'],
            $_POST['restaurant_delivery_fri_open_hr_second'], $_POST['restaurant_delivery_fri_open_min_second'],
            $_POST['restaurant_delivery_fri_open_sess_second'], $_POST['restaurant_delivery_fri_close_hr_second'],
            $_POST['restaurant_delivery_fri_close_min_second'], $_POST['restaurant_delivery_fri_close_sess_second']);
        #Satur
        list($sat_firstopen_time, $sat_firstclose_time, $sat_secondopen_time, $sat_secondclose_time) =
            $this->insertTimeOption_Second_Time($_POST['restaurant_delivery_sat_open_hr'], $_POST['restaurant_delivery_sat_open_min'],
            $_POST['restaurant_delivery_sat_open_sess'], $_POST['restaurant_delivery_sat_close_hr'],
            $_POST['restaurant_delivery_sat_close_min'], $_POST['restaurant_delivery_sat_close_sess'],
            $_POST['restaurant_delivery_sat_open_hr_second'], $_POST['restaurant_delivery_sat_open_min_second'],
            $_POST['restaurant_delivery_sat_open_sess_second'], $_POST['restaurant_delivery_sat_close_hr_second'],
            $_POST['restaurant_delivery_sat_close_min_second'], $_POST['restaurant_delivery_sat_close_sess_second']);
        #Sun
        list($sun_firstopen_time, $sun_firstclose_time, $sun_secondopen_time, $sun_secondclose_time) =
            $this->insertTimeOption_Second_Time($_POST['restaurant_delivery_sun_open_hr'], $_POST['restaurant_delivery_sun_open_min'],
            $_POST['restaurant_delivery_sun_open_sess'], $_POST['restaurant_delivery_sun_close_hr'],
            $_POST['restaurant_delivery_sun_close_min'], $_POST['restaurant_delivery_sun_close_sess'],
            $_POST['restaurant_delivery_sun_open_hr_second'], $_POST['restaurant_delivery_sun_open_min_second'],
            $_POST['restaurant_delivery_sun_open_sess_second'], $_POST['restaurant_delivery_sun_close_hr_second'],
            $_POST['restaurant_delivery_sun_close_min_second'], $_POST['restaurant_delivery_sun_close_sess_second']);
            
            $count = $this->getNumvalues($CFG['table']['restaurant_timing'], "restaurant_id = '".$_SESSION['restaurantownerid']."'");
        
        if($count != '0'){
            $upd_time = "UPDATE  
    								" . $CFG['table']['restaurant_timing'] . "
    							SET
    							   restaurant_id 		 = '" . $this->filterInput($_SESSION['restaurantownerid']) . "',
    							   mon_firstopen_time    = '" . $mon_firstopen_time . "',
    							   mon_firstclose_time   = '" . $mon_firstclose_time . "',
    							   tue_firstopen_time	 = '" . $tue_firstopen_time . "',
    							   tue_firstclose_time	 = '" . $tue_firstclose_time . "',
    							   wed_firstopen_time    = '" . $wed_firstopen_time . "',
    							   wed_firstclose_time	 = '" . $wed_firstclose_time . "',
    							   thu_firstopen_time	 = '" . $thu_firstopen_time . "',
    							   thu_firstclose_time	 = '" . $thu_firstclose_time . "',
    							   fri_firstopen_time	 = '" . $fri_firstopen_time . "',
    							   fri_firstclose_time	 = '" . $fri_firstclose_time . "',
    							   sat_firstopen_time	 = '" . $sat_firstopen_time . "',
    							   sat_firstclose_time	 = '" . $sat_firstclose_time . "',
    							   sun_firstopen_time	 = '" . $sun_firstopen_time . "',
    							   sun_firstclose_time	 = '" . $sun_firstclose_time . "',
    							   mon_secondopen_time	 = '" . $mon_secondopen_time . "',
    							   mon_secondclose_time	 = '" . $mon_secondclose_time . "',
    							   tue_secondopen_time	 = '" . $tue_secondopen_time . "',
    							   tue_secondclose_time	 = '" . $tue_secondclose_time . "',
    							   wed_secondopen_time	 = '" . $wed_secondopen_time . "',
    							   wed_secondclose_time	 = '" . $wed_secondclose_time . "',
    							   thu_secondopen_time	 = '" . $thu_secondopen_time . "',
    							   thu_secondclose_time	 = '" . $thu_secondclose_time . "',
    							   fri_secondopen_time	 = '" . $fri_secondopen_time . "',
    							   fri_secondclose_time	 = '" . $fri_secondclose_time . "',
    							   sat_secondopen_time	 = '" . $sat_secondopen_time . "',
    							   sat_secondclose_time	 = '" . $sat_secondclose_time . "',
    							   sun_secondopen_time	 = '" . $sun_secondopen_time . "',
    							   sun_secondclose_time	 = '" . $sun_secondclose_time . "'
    						WHERE restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) . "' ";
            #echo "<br> upd_time: ".$upd_time;
            $upd_res_rest = $this->ExecuteQuery($upd_time, 'update');
            echo 'success';
        }else{
            
            $insert_time = "INSERT INTO  
								".$CFG['table']['restaurant_timing']."
							SET
							   restaurant_id 		 = '".$this->filterInput($_SESSION['restaurantownerid'])."',
							   mon_firstopen_time    = '".$mon_firstopen_time."',
							   mon_firstclose_time   = '".$mon_firstclose_time."',
							   tue_firstopen_time	 = '".$tue_firstopen_time."',
							   tue_firstclose_time	 = '".$tue_firstclose_time."',
							   wed_firstopen_time    = '".$wed_firstopen_time."',
							   wed_firstclose_time	 = '".$wed_firstclose_time."',
							   thu_firstopen_time	 = '".$thu_firstopen_time."',
							   thu_firstclose_time	 = '".$thu_firstclose_time."',
							   fri_firstopen_time	 = '".$fri_firstopen_time."',
							   fri_firstclose_time	 = '".$fri_firstclose_time."',
							   sat_firstopen_time	 = '".$sat_firstopen_time."',
							   sat_firstclose_time	 = '".$sat_firstclose_time."',
							   sun_firstopen_time	 = '".$sun_firstopen_time."',
							   sun_firstclose_time	 = '".$sun_firstclose_time."',
							   mon_secondopen_time	 = '".$mon_secondopen_time."',
							   mon_secondclose_time	 = '".$mon_secondclose_time."',
							   tue_secondopen_time	 = '".$tue_secondopen_time."',
							   tue_secondclose_time	 = '".$tue_secondclose_time."',
							   wed_secondopen_time	 = '".$wed_secondopen_time."',
							   wed_secondclose_time	 = '".$wed_secondclose_time."',
							   thu_secondopen_time	 = '".$thu_secondopen_time."',
							   thu_secondclose_time	 = '".$thu_secondclose_time."',
							   fri_secondopen_time	 = '".$fri_secondopen_time."',
							   fri_secondclose_time	 = '".$fri_secondclose_time."',
							   sat_secondopen_time	 = '".$sat_secondopen_time."',
							   sat_secondclose_time	 = '".$sat_secondclose_time."',
							   sun_secondopen_time	 = '".$sun_secondopen_time."',
							   sun_secondclose_time	 = '".$sun_secondclose_time."'";
                               
            $ins_res_rest = $this->ExecuteQuery($insert_time,'update');
            
        	echo 'success'; 
        }
    }
    #----------------------------------------------------------------------------------------
    #Restaurant Setting Info
    /**
     * Restaurant::restaurantSettingInfo()
     * 
     * @return
     */
    function restaurantSettingInfo()
    {
        global $CFG, $objSmarty, $objThumb;

        $resid = $this->filterInput($_SESSION['restaurantownerid']);

        $restaurant_description = $this->filterInput($_POST['restaurant_description']);
        $restaurant_estimated_time = $this->filterInput($_POST['restaurant_estimated_time']);
        $restaurant_delivery = $this->filterInput($_POST['restaurant_delivery']);
        $restaurant_delivery_areas = $this->filterInput($_POST['restaurant_delivery_areas']);
        $restaurant_delivery_charge = $this->filterInput($_POST['restaurant_delivery_charge']);
        $restaurant_minorder_price = $this->filterInput($_POST['restaurant_minorder_price']);
        $restaurant_salestax = $this->filterInput($_POST['restaurant_salestax']);
        $restaurant_pickup = $this->filterInput($_POST['restaurant_pickup']);
        $restaurant_booktable = $this->filterInput($_POST['restaurant_booktable']);

        #Mon
        list($res_mon_opening_time, $res_mon_closeing_time) = $this->insertTimeOption($_POST['restaurant_delivery_mon_open_hr'],
            $_POST['restaurant_delivery_mon_open_min'], $_POST['restaurant_delivery_mon_open_sess'],
            $_POST['restaurant_delivery_mon_close_hr'], $_POST['restaurant_delivery_mon_close_min'],
            $_POST['restaurant_delivery_mon_close_sess']);
        #Tues
        list($res_tue_opening_time, $res_tue_closeing_time) = $this->insertTimeOption($_POST['restaurant_delivery_tue_open_hr'],
            $_POST['restaurant_delivery_tue_open_min'], $_POST['restaurant_delivery_tue_open_sess'],
            $_POST['restaurant_delivery_tue_close_hr'], $_POST['restaurant_delivery_tue_close_min'],
            $_POST['restaurant_delivery_tue_close_sess']);
        #Wed
        list($res_wed_opening_time, $res_wed_closeing_time) = $this->insertTimeOption($_POST['restaurant_delivery_wed_open_hr'],
            $_POST['restaurant_delivery_wed_open_min'], $_POST['restaurant_delivery_wed_open_sess'],
            $_POST['restaurant_delivery_wed_close_hr'], $_POST['restaurant_delivery_wed_close_min'],
            $_POST['restaurant_delivery_wed_close_sess']);
        #Thurs
        list($res_thu_opening_time, $res_thu_closeing_time) = $this->insertTimeOption($_POST['restaurant_delivery_thu_open_hr'],
            $_POST['restaurant_delivery_thu_open_min'], $_POST['restaurant_delivery_thu_open_sess'],
            $_POST['restaurant_delivery_thu_close_hr'], $_POST['restaurant_delivery_thu_close_min'],
            $_POST['restaurant_delivery_thu_close_sess']);
        #Fri
        list($res_fri_opening_time, $res_fri_closeing_time) = $this->insertTimeOption($_POST['restaurant_delivery_fri_open_hr'],
            $_POST['restaurant_delivery_fri_open_min'], $_POST['restaurant_delivery_fri_open_sess'],
            $_POST['restaurant_delivery_fri_close_hr'], $_POST['restaurant_delivery_fri_close_min'],
            $_POST['restaurant_delivery_fri_close_sess']);
        #Satur
        list($res_sat_opening_time, $res_sat_closeing_time) = $this->insertTimeOption($_POST['restaurant_delivery_sat_open_hr'],
            $_POST['restaurant_delivery_sat_open_min'], $_POST['restaurant_delivery_sat_open_sess'],
            $_POST['restaurant_delivery_sat_close_hr'], $_POST['restaurant_delivery_sat_close_min'],
            $_POST['restaurant_delivery_sat_close_sess']);
        #Sun
        list($res_sun_opening_time, $res_sun_closeing_time) = $this->insertTimeOption($_POST['restaurant_delivery_sun_open_hr'],
            $_POST['restaurant_delivery_sun_open_min'], $_POST['restaurant_delivery_sun_open_sess'],
            $_POST['restaurant_delivery_sun_close_hr'], $_POST['restaurant_delivery_sun_close_min'],
            $_POST['restaurant_delivery_sun_close_sess']);

        $selareas = $this->filterInput($_POST['restaurant_delivery_areas']);
        if (isset($selareas) && !empty($selareas))
        {
            for ($i = 0; $i < count($selareas); $i++)
            {
                $serveareas = implode(",", $selareas);
            }
        }

        $selcuisine = $this->filterInput($_POST['restaurant_serving_cuisines']);
        if (isset($selcuisine) && !empty($selcuisine))
        {
            for ($i = 0; $i < count($selcuisine); $i++)
            {
                $servecuisine = implode(",", $selcuisine);
            }
        }

        #$restaurantseourl  = $this->seoUrl($_POST['restaurant_name']);

        $upd_rest = "UPDATE  
								" . $CFG['table']['restaurant'] . "
						    SET
						    	restaurant_description  			= '" . $this->filterInput($restaurant_description) . "',
						    	restaurant_estimated_time  			= '" . $this->filterInput($restaurant_estimated_time) . "',
						    	restaurant_delivery  				= '" . $this->filterInput($restaurant_delivery) . "',
						    	restaurant_delivery_mon_opentime  	= '" . $res_mon_opening_time . "',
						    	restaurant_delivery_mon_closetime  	= '" . $res_mon_closeing_time .
            "',
						    	restaurant_delivery_tue_opentime  	= '" . $res_tue_opening_time . "',
						    	restaurant_delivery_tue_closetime  	= '" . $res_tue_closeing_time .
            "',
						    	restaurant_delivery_wed_opentime  	= '" . $res_wed_opening_time . "',
						    	restaurant_delivery_wed_closetime 	= '" . $res_wed_closeing_time .
            "',
						    	restaurant_delivery_thu_opentime  	= '" . $res_thu_opening_time . "',
						    	restaurant_delivery_thu_closetime  	= '" . $res_thu_closeing_time .
            "',
						    	restaurant_delivery_fri_opentime  	= '" . $res_fri_opening_time . "',
						    	restaurant_delivery_fri_closetime  	= '" . $res_fri_closeing_time .
            "',
						    	restaurant_delivery_sat_opentime  	= '" . $res_sat_opening_time . "',
						    	restaurant_delivery_sat_closetime  	= '" . $res_sat_closeing_time .
            "',
						    	restaurant_delivery_sun_opentime  	= '" . $res_sun_opening_time . "',
						    	restaurant_delivery_sun_closetime  	= '" . $res_sun_closeing_time .
            "',
						    	restaurant_delivery_areas 			= '" . $serveareas . "',
						    	restaurant_delivery_charge 			= '" . $this->filterInput($restaurant_delivery_charge) .
            "',
						    	restaurant_minorder_price 			= '" . $this->filterInput($restaurant_minorder_price) . "',
						    	restaurant_salestax 				= '" . $this->filterInput($restaurant_salestax) . "',
						    	restaurant_serving_cuisines 		= '" . $servecuisine . "',
						    	restaurant_displayoption 		    = '" . $restaurant_display . "',
						    	restaurant_pickup  					= '" . $restaurant_pickup . "',
						    	restaurant_booktable  				= '" . $restaurant_booktable . "'
							WHERE restaurant_id = '" . $resid . "' ";
        #echo $ins_rest;
        $upd_res_rest = $this->ExecuteQuery($upd_rest, 'update');

        #Serving Cuisine & Delivery Areas added in new table
        if ($upd_res_rest)
        {

            #Delivery Areas
            $trunc_tab = "DELETE FROM " . $CFG['table']['restaurant_delivery_areas'] .
                " WHERE restaurant_id = '" . $resid . "' ";
            $trunc_res = mysqli_query($this->DBCONN,$trunc_tab) or die(mysqli_error($this->DBCONN));

            for ($i = 0; $i < count($selareas); $i++)
            {
                $ins_areas = "INSERT INTO " . $CFG['table']['restaurant_delivery_areas'] .
                    " SET restaurant_id = '" . $resid . "', zipcode_id = '" . $this->filterInput($selareas[$i]) .
                    "', addeddate='" . CUR_TIME . "' ";
                $res_areas = $this->ExecuteQuery($ins_areas, 'insert');
            }

            #Serving Cuisine
            $trunc_tab = "DELETE FROM " . $CFG['table']['restaurant_serving_cuisines'] .
                " WHERE restaurant_id = '" . $resid . "' ";
            $trunc_res = mysqli_query($this->DBCONN,$trunc_tab) or die(mysqli_error($this->DBCONN));

            for ($i = 0; $i < count($selcuisine); $i++)
            {
                $ins_sercuisine = "INSERT INTO " . $CFG['table']['restaurant_serving_cuisines'] .
                    " SET restaurant_id = '" . $resid . "', cuisine_id = '" . $this->filterInput($selcuisine[$i]) .
                    "', addeddate='" . CUR_TIME . "' ";
                $res_sercuisine = $this->ExecuteQuery($ins_sercuisine, 'insert');
            }
        }

        #Restaurant Logo
        $imagesizedata = getimagesize($_FILES['restaurant_logo']['tmp_name']);
        if (isset($_FILES['restaurant_logo']['name']) && !empty($_FILES['restaurant_logo']['name']) && $imagesizedata == TRUE)
        {

            $getphotoname = $this->GetValue("restaurant_logo", $CFG['table']['restaurant'],
                "restaurant_id = '" . $resid . "' ");
            if (!empty($getphotoname))
            {
                @unlink($CFG['site']['photo_restaurant_path'] . '/logo' . '/' . $getphotoname);
            }

            $logoext = $this->getFileExtension($_FILES['restaurant_logo']['name']);
            $logoname = $this->seoUrl($restaurant_name) .time(). "." . $logoext;
            $logoimage = "logo_" . $logoname;
            $dest_name = $CFG['site']['photo_restaurant_path'] . '/logo' . '/' . $logoimage;

            $uploadsuccess = @move_uploaded_file($_FILES['restaurant_logo']['tmp_name'], $dest_name);
            @chmod($dest_name, 0777);

            if ($uploadsuccess)
            {
                #Get Thumbnail width & height
                $restlogothumb = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath = $dest_name;
                $logo = "logo_thumb_" . $logoname;

                $dest_imagepath = $CFG['site']['photo_restaurant_path'] . '/logo' . '/' . $logo;
                $objThumb->createThumb($sour_imagepath, $dest_imagepath, $restlogothumb['0']['restaurant_logo_thumb_width'],
                    $restlogothumb['0']['restaurant_logo_thumb_height'], 'crop');

                unlink($dest_name);

                $query = "UPDATE " . $CFG['table']['restaurant'] . " SET restaurant_logo = '" .
                    $logo . "' WHERE restaurant_id = '" . $resid . "' ";
                $res = $this->ExecuteQuery($query, "update");
            }
        }
    }
    /**
     * Restaurant::updatePhotoVideoDisplay()
     * 
     * @return
     */
    function updatePhotoVideoDisplay()
    {
        global $CFG, $objSmarty;

        $qryup = "UPDATE " . $CFG['table']['restaurant'] .
            " SET restaurant_display_photo = '" . $this->filterInput($_POST['photoval']) .
            "', restaurant_display_video = '" . $this->filterInput($_POST['videoval']) .
            "', restaurant_display_banner = '" . $this->filterInput($_POST['bannerval']) .
            "', restaurant_video='" . $this->filterInput(trim(addslashes($_POST['restaurant_video']))) .
            "' WHERE restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) . "' ";
        $qryres = $this->ExecuteQuery($qryup, "update");
        echo 'success';
    }
    #----------------------------------------------------
    #getShowCrustList
    /**
     * Restaurant::getShowCrustList()
     * 
     * @param mixed $menuid
     * @return
     */
    function getShowCrustList($menuid)
    {
        global $CFG, $objSmarty;

        $sel_crust = "SELECT pizza_crustid, pizza_crust_restaurantid, pizza_crust_categoryid, pizza_crust_menuid, pizza_crust_addonsname, pizza_crust_priceoption, pizza_crust_price FROM " .
            $CFG['table']['restaurant_pizza_crust'] . " WHERE pizza_crust_menuid = '" . $this->filterInput($menuid) .
            "' ORDER BY pizza_crustid ASC";
        #echo $sel_crust;
        $res_crust = $this->ExecuteQuery($sel_crust, "select");
        #echo "<pre>";print_r($res_crust);echo "</pre>";
        $objSmarty->assign("showPizzaCrustlist", $res_crust);
        $objSmarty->assign("cntcrustAddons", count($res_crust));

    }
    #--------------------------------------------------------------------------------------
    #ADD NEW MENU
    /**
     * Restaurant::restaurantMenuAdd()
     * 
     * @return
     */
    function restaurantMenuAdd()
    {
        global $CFG, $objSmarty, $objThumb;

        //echo "<pre>";print_r($_REQUEST);echo "</pre>";
        //exit;

        $resid = $this->filterInput($_SESSION['restaurantownerid']);
        $restaurantname = $resid;
        $menuname = $this->filterInput($_POST['menu_name']);
        $menu_category = $this->filterInput($_POST['menu_category']);
        $menu_catothers = $this->filterInput($_POST['menu_catothers']);
        $menu_type = $this->filterInput($_POST['menu_type']);
        $menu_cuisine = $this->filterInput($_POST['menu_cuisine']);
        #$menu_price 	  =  $this->filterInput($_POST['menu_price']);
        $menu_addons = $this->filterInput($_POST['menu_addons']);
        $menu_spl_ins = $this->filterInput($_POST['menu_spl_ins']);
        $menu_description = $this->filterInput($_POST['menu_description']);
        $menu_popular_dish = $this->filterInput($_POST['menu_popular_dish']);
        $menu_spicy = $this->filterInput($_POST['menu_spicy']);

        #echo "<pre>";print_r($_REQUEST);echo "</pre>";
        #exit;

        if ($menu_category == 'other')
        {
            $ins_cat = "INSERT INTO " . $CFG['table']['category_main'] .
                " SET maincatename = '" . $this->filterInput(html_entity_decode($menu_catothers)) . "',restaurant_id ='" . $restaurantname .
                "',addeddate = '" . CUR_TIME . "' ";
            $res_cat = $this->ExecuteQuery($ins_cat, "insert");
            $menu_category = $res_cat;
            $main_catoption = 'normal';
        } else
        {
            $main_catoption = $this->getValue("maincat_option", $CFG['table']['category_main'],
                "maincateid = '" . $this->filterInput($_POST['menu_category']) . "'");
        }

        $categoryname = $this->getValue("maincatename", $CFG['table']['category_main'],
            "maincateid = '" . $menu_category . "'");
        $categoryname1 = strtolower($categoryname);

        if ($_POST['sizeoption'] == 'default') {

            if ($_POST['smallval'] == '' && $_POST['mediumval'] != '') {
                $menu_price = $this->filterInput($_POST['mediumval']);
            } elseif (($_POST['smallval'] == '') && ($_POST['mediumval'] == '')) {
                $menu_price = $this->filterInput($_POST['largeval']);
            } else {
                $menu_price = $this->filterInput($_POST['smallval']);
            }
            $sizeoption = 'size';
        } elseif ($_POST['sizeoption'] == 'fixed') {
            
            $menu_price = $this->filterInput($_POST['menu_price_main']);
            $sizeoption = 'fixed';
        } else {
            if (isset($_POST['size_option']) && !empty($_POST['size_option']) && is_array($_POST['size_option'])) {
                foreach ($_POST['size_option'] as $so=>$val) {
                    $menu_price = $this->filterInput($_POST['size_option'][$so]['sizevalue']);
                    break;
                }
            } elseif (isset($_POST['morepizzasize']) && !empty($_POST['morepizzasize']) && is_array($_POST['morepizzasize'])) {
                foreach ($_POST['morepizzasize'] as $so=>$val) {
                    $menu_price = $this->filterInput($_POST['morepizzasize'][$so]['sizevalue']);
                    break;
                }
            }
            $sizeoption = 'slice';
        }

        $pizza_small_value = $this->filterInput($_POST['smallval']);
        $pizza_medium_value = $this->filterInput($_POST['mediumval']);
        $pizza_large_value = $this->filterInput($_POST['largeval']);

        $ins_menu = "INSERT INTO 
								" . $CFG['table']['restaurant_menu'] . " 
							SET 
								restaurant_id        = '" . $restaurantname . "',
								menu_name 		 	 = '" . $this->filterInput(html_entity_decode($menuname)) . "',
								menu_category    	 = '" . $menu_category . "',
								maincat_option		 = '" . $this->filterInput($main_catoption) . "',
								menu_type 		     = '" . $menu_type . "',
								menu_cuisine      	 = '" . $menu_cuisine . "',
								menu_price 		 	 = '" . $this->filterInput($menu_price) . "',
								menu_addons 		 = '" . $menu_addons . "',
								sizeoption 		 	 = '" . $sizeoption . "',
								pizza_size_small	 = '" . $this->filterInput($_POST['small']) . "',
								pizza_small_value	 = '" . $this->filterInput($pizza_small_value) . "',
								pizza_size_medium	 = '" . $this->filterInput($_POST['medium']) . "',
								pizza_medium_value	 = '" . $this->filterInput($pizza_medium_value) . "',
								pizza_size_large	 = '" . $this->filterInput($_POST['large']) . "',
								pizza_large_value	 = '" . $this->filterInput($pizza_large_value) . "',
								menu_spl_instruction = '" . $menu_spl_ins . "',
								menu_description 	 = '" . $this->filterInput($menu_description) . "',
								menu_popular_dish  	 = '" . $menu_popular_dish . "',
								menu_spicy		  	 = '" . $menu_spicy . "',
								addeddate 			 = '" . CUR_TIME . "' ";
        $res_menu = $this->ExecuteQuery($ins_menu, "insert");
        
        $imagesizedata = getimagesize($_FILES['menu_photo']['tmp_name']);
        if (isset($_FILES['menu_photo']['name']) && !empty($_FILES['menu_photo']['name']) && $imagesizedata == TRUE)
        {

            $logoext = $this->getFileExtension($_FILES['menu_photo']['name']);
            $logoname = $this->seoUrl($_POST["menu_name"]) . "." . $logoext;
            $logoimage = "photo_" . $logoname;
            $dest_name = $CFG['site']['photo_menu_path'] . '/' . $logoimage;

            $uploadsuccess = @move_uploaded_file($_FILES['menu_photo']['tmp_name'], $dest_name);
            @chmod($dest_name, 0777);

            if ($uploadsuccess)
            {
                #Get Thumbnail width & height
                $menuthumb = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath = $dest_name;
                $photo = "thumb_" . $logoname;

                $dest_imagepath = $CFG['site']['photo_menu_path'] . '/' . $photo;
                $objThumb->createThumb($sour_imagepath, $dest_imagepath, $menuthumb['0']['menu_thumb_width'],
                    $menuthumb['0']['menu_thumb_height'], 'crop');

                @unlink($dest_name);

                $query = "UPDATE " . $CFG['table']['restaurant_menu'] . " SET menu_photo = '" .
                    $photo . "' WHERE id = '" . $res_menu . "' ";
                $res = $this->ExecuteQuery($query, "update");
            }
        }

        if ($res_menu)
        {
            if ($menu_addons == 'Yes')
            {
                if (count($_POST['mainaddons']) > 0)
                {
                    //for($i=0;$i<count($_POST['mainaddons']);$i++){
                    foreach ($_POST['mainaddons'] as $keyi => $value)
                    {
                        if ($_POST['mainaddons'][$keyi]['mainaddonsname'] != '')
                        {

                            if ($_POST['mainaddons'][$keyi]['mainaddonsname'] != '' && $_POST['sizeoption'] !=
                                'other')
                            {
                                $mainaddonsname = $this->filterInput($_POST['mainaddons'][$keyi]['mainaddonsname']);
                                $mainaddonspriceoption = $this->filterInput($_POST['mainaddons'][$keyi]['addonspriceoption']);
                                if ($mainaddonspriceoption != '')
                                {
                                    if ($mainaddonspriceoption == 'Free')
                                    {
                                        $mainaddonsprice = '';
                                        $mainaddonsprice_medium = '';
                                        $mainaddonsprice_large = '';
                                    } else
                                    {
                                        if ($_POST['sizeoption'] == 'fixed')
                                        {
                                            $mainaddonsprice = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_fixed']);
                                            $mainaddonsprice_medium = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_medium_fixed']);
                                            $mainaddonsprice_large = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_large_fixed']);
                                        } else
                                        {
                                            $mainaddonsprice = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_size']);
                                            $mainaddonsprice_medium = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_medium_size']);
                                            $mainaddonsprice_large = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_large_size']);
                                        }
                                        /*$mainaddonsprice = $_POST['mainaddons'][$keyi]['addons_price'];
                                        $mainaddonsprice_medium = $_POST['mainaddons'][$keyi]['addons_price_medium']; 
                                        $mainaddonsprice_large  = $_POST['mainaddons'][$keyi]['addons_price_large']; */
                                    }
                                    $inst = "INSERT INTO 
												" . $CFG['table']['restaurant_menuaddons'] . " 
												SET 
													menuaddons_restaurantid = '" . $restaurantname . "',
													menuaddons_categoryid   = '" . $menu_category . "',
													menu_catoption			= '" . $main_catoption . "',
													menuaddons_menuid 		= '" . $res_menu . "',
													addonparentid           = '" . $mainaddonsname . "',
													menuaddons_addonsname 	= '" . $this->filterInput($mainaddonsname) . "',
													menuaddons_priceoption 	= '" . $mainaddonspriceoption . "',
													menuaddons_price 		= '" . $this->filterInput($mainaddonsprice) . "',
													menuaddons_price_medium	= '" . $this->filterInput($mainaddonsprice_medium) . "',
													menuaddons_price_large	= '" . $this->filterInput($mainaddonsprice_large) . "' ";
                                    $res = $this->ExecuteQuery($inst, "insert");
                                } else
                                {
                                    if (count($_POST['mainaddons'][$keyi]['addons']) > 0)
                                    {
                                        //for($j=0;$j<count($_POST['mainaddons'][$keyi]['addons']);$j++){
                                        foreach ($_POST['mainaddons'][$keyi]['addons'] as $keyj => $value)
                                        {
                                            $addonsname1 = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addonsname']);
                                            $addonspriceoption = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addonspriceoption']);
                                            if ($addonspriceoption == 'Free')
                                            {
                                                $menuaddonsprice = '';
                                                $mainaddonsprice_medium = '';
                                                $mainaddonsprice_large = '';
                                            } else
                                            {
                                                if ($_POST['sizeoption'] == 'fixed')
                                                {
                                                    $mainaddonsprice = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_fixed']);
                                                    $mainaddonsprice_medium = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_medium_fixed']);
                                                    $mainaddonsprice_large = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_large_fixed']);
                                                } else
                                                {
                                                    $mainaddonsprice = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_size']);
                                                    $mainaddonsprice_medium = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_medium_size']);
                                                    $mainaddonsprice_large = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_large_size']);
                                                }
                                                /*$menuaddonsprice = $_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price'];
                                                $mainaddonsprice_medium = $_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_medium']; 
                                                $mainaddonsprice_large  = $_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_large']; */
                                            }
                                            if ($addonsname1 != '')
                                            {
                                                $inst = "INSERT INTO 
															" . $CFG['table']['restaurant_menuaddons'] . " 
															SET 
																menuaddons_restaurantid = '" . $restaurantname . "',
																menuaddons_categoryid   = '" . $menu_category . "',
																menu_catoption			= '" . $main_catoption . "',
																menuaddons_menuid 		= '" . $res_menu . "',
																addonparentid           = '" . $mainaddonsname . "',
																menuaddons_addonsname 	= '" . $this->filterInput($addonsname1) . "',
																menuaddons_priceoption 	= '" . $addonspriceoption . "',
																menuaddons_price 		= '" . $this->filterInput($mainaddonsprice) . "',
																menuaddons_price_medium	= '" . $this->filterInput($mainaddonsprice_medium) . "',
																menuaddons_price_large	= '" . $this->filterInput($mainaddonsprice_large) . "' ";
                                                $res = $this->ExecuteQuery($inst, "insert");
                                            }
                                        }
                                    }
                                }
                            } #END SIZE AND FIXED OPTIONS

                            #Slice size Addon Price ********************************************************************
                            elseif ($_POST['mainaddons'][$keyi]['mainaddonsname'] != '' && $_POST['sizeoption'] ==
                                'other')
                            {

                                $mainaddonsname = $this->filterInput($_POST['mainaddons'][$keyi]['mainaddonsname']);
                                $mainaddonspriceoption = $this->filterInput($_POST['mainaddons'][$keyi]['addonspriceoption']);

                                if ($mainaddonspriceoption != '')
                                {

                                    if ($mainaddonspriceoption == 'Free')
                                    {
                                        $mainaddonsprice_slice = '';
                                    } else
                                    {
                                        $mainaddonsprice_slice_arr[] = $_POST['mainaddons'][$keyi]['addons_price_slice'];
                                        $mainaddonsprice_slice = implode(",", $mainaddonsprice_slice_arr);
                                    }

                                    $inst = "INSERT INTO 
													" . $CFG['table']['restaurant_menuaddons'] . " 
													SET 
														menuaddons_restaurantid = '" . $restaurantname . "',
														menuaddons_categoryid   = '" . $menu_category . "',
														menu_catoption			= '" . $main_catoption . "',
														menuaddons_menuid 		= '" . $res_menu . "',
														addonparentid           = '" . $mainaddonsname . "',
														menuaddons_addonsname 	= '" . $this->filterInput($mainaddonsname) . "',
														menuaddons_priceoption 	= '" . $mainaddonspriceoption . "',
														menuaddons_price_slice 	= '" . $this->filterInput($mainaddonsprice_slice) . "'";
                                    //echo "<br>Insert1--->".$inst;
                                    $res = $this->ExecuteQuery($inst, "insert");
                                } else
                                {

                                    if (count($_POST['mainaddons'][$keyi]['addons']) > 0)
                                    {
                                        //for($j=0;$j<count($_POST['mainaddons'][$keyi]['addons']);$j++){
                                        foreach ($_POST['mainaddons'][$keyi]['addons'] as $keyj => $value)
                                        {
                                            $addonsname1 = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addonsname']);
                                            $addonspriceoption = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addonspriceoption']);

                                            if ($addonspriceoption == 'Free')
                                            {
                                                $mainaddonsprice_slice = '';
                                            }
                                             /*else{
                                            $mainaddonsprice_slice_arr[] 		= $_POST['mainaddons'][$i]['addons'][$j]['addons_price_slice'];
                                            $mainaddonsprice_slice				= implode(",",$mainaddonsprice_slice_arr);
                                            }*/  else
                                            {
                                                #$mainaddonsprice_slice_arr[] 	= $_POST['mainaddons'][$i]['addons'][$j]['addons_price_slice'];
                                                #$mainaddonsprice_slice			= implode(",",$mainaddonsprice_slice_arr);

                                                if (isset($_POST['slicemoreprice_countperslice']) && !empty($_POST['slicemoreprice_countperslice']))
                                                {
                                                    $sizeopt_cnt = $this->filterInput($_POST['slicemoreprice_countperslice']);
                                                } else
                                                {
                                                    $sizeopt_cnt = count($this->filterInput($_POST['size_option']));
                                                }
                                                //echo "<br>sizeopt_cnt ------>".$sizeopt_cnt;
                                                #for($k=0;$k<count($_POST['size_option']);$k++){
                                                for ($k = 0; $k < $sizeopt_cnt; $k++)
                                                {
                                                    $mainaddonsprice_slice_arr[$keyj][$k] = $_POST['mainaddons'][$keyi]['addons'][$keyj][$k]['addons_price_slice'];
                                                }

                                                foreach ($mainaddonsprice_slice_arr as $key => $val)
                                                {
                                                    /*if(is_array($mainaddonsprice_slice_arr) && count($mainaddonsprice_slice_arr) >= 2){
                                                    $mainaddonsprice_slice_arr_new[]	=	$val;
                                                    unset($mainaddonsprice_slice_arr_new[$key-1]);    	
                                                    #echo "<pre>";print_r($mainaddonsprice_slice_arr_new);echo "</pre>";
                                                    #echo "<br>val =>=>=>".$j.print_r($val)."<br>";
                                                    $mainaddonsprice_slice_arr_new2[]  = $val;
                                                    $string[] = implode( ',',$val);	
                                                    }elseif(is_array($mainaddonsprice_slice_arr) && count($mainaddonsprice_slice_arr) ==1){
                                                    #$mainaddonsprice_slice_arr_new[]	=	$val;
                                                    $mainaddonsprice_slice_arr_new2[]	=	$val;
                                                    $string[] = implode( ',',$val);	
                                                    }*/
                                                    #echo "<br>key ".$key;
                                                    $mainaddonsprice_slice_arr_new = $val;
                                                    #unset($mainaddonsprice_slice_arr[$key-1]);
                                                    $mainaddonsprice_slice_arr_new2[] = $val;
                                                    #echo "<pre>";print_r($val);
                                                    $string = implode(',', $val);
                                                }
                                                $mainaddonsprice_slice = $string;
                                            }
                                            #echo "<br>mainaddonsprice_slice --->".$mainaddonsprice_slice."<br>";
                                            /*echo "mainaddonsprice_medium ".$mainaddonsprice_medium;
                                            echo "mainaddonsprice_large ".$mainaddonsprice_large;  */
                                            if ($addonsname1 != '')
                                            {
                                                $inst = "INSERT INTO 
																" . $CFG['table']['restaurant_menuaddons'] . " 
																SET 
																	menuaddons_restaurantid = '" . $restaurantname . "',
																	menuaddons_categoryid   = '" . $menu_category . "',
																	menu_catoption			= '" . $main_catoption . "',
																	menuaddons_menuid 		= '" . $res_menu . "',
																	addonparentid           = '" . $mainaddonsname . "',
																	menuaddons_addonsname 	= '" . $this->filterInput($addonsname1) . "',
																	menuaddons_priceoption 	= '" . $addonspriceoption . "',
																	menuaddons_price_slice	= '" . $this->filterInput($mainaddonsprice_slice) . "'";
                                                //echo "<br>Insert2 --->".$inst;
                                                $res = $this->ExecuteQuery($inst, "insert");
                                            }
                                        }
                                    }
                                }
                            } #END Slice size Addon Price CONDITION####################
                        }
                    }
                }
                #exit;
                #Create Addons
                if (count($_POST['createmainaddons']) > 0)
                {
                    //for($i=0;$i<count($_POST['createmainaddons']);$i++){
                    foreach ($_POST['createmainaddons'] as $keyi => $value)
                    {
                        if ($_POST['createmainaddons'][$keyi]['mainaddonsname'] != '')
                        {
                            $ins_ad = "INSERT INTO 
											" . $CFG['table']['restaurant_addons'] . " 
										SET 
											parentid      	= '0',
											restaurant_id 	= '" . $restaurantname . "',
											category_id   	= '" . $menu_category . "',
											addonsname 		= '" . $this->filterInput(html_entity_decode(mysqli_real_escape_string($this->DBCONN,$this->filterInput($_POST['createmainaddons'][$keyi]['mainaddonsname'])))) .
                                "',
											addonscount 	= '" . $this->filterInput($_POST['createmainaddons'][$keyi]['mainaddoncnt']) .
                                "',
											addeddate 		= '" . CUR_TIME . "' ";
                            $resid = $this->ExecuteQuery($ins_ad, "insert");
                            /*if($resid){
                            if(count($_POST['createmainaddons'][$i]['subaddons']) > 0){
                            for($j=0;$j<count($_POST['createmainaddons'][$i]['subaddons']);$j++){
                            
                            $addonsname1 = $_POST['createmainaddons'][$i]['subaddons'][$j]['subaddonsname'];
                            if($addonsname1 != ''){
                            $inst_add = "INSERT INTO 
                            ".$CFG['table']['restaurant_addons']." 
                            SET 
                            parentid      	= '".$resid."',
                            restaurant_id 	= '".$restaurantname."',
                            category_id   	= '".$menu_category."',
                            addonsname 		= '".$addonsname1."',
                            addeddate 		= NOW() ";
                            $res_add = $this->ExecuteQuery($inst_add, "insert");
                            
                            $inst = "INSERT INTO 
                            ".$CFG['table']['restaurant_menuaddons']." 
                            SET 
                            menuaddons_restaurantid = '".$restaurantname."',
                            menuaddons_categoryid   = '".$menu_category."',
                            menuaddons_menuid 		= '".$res_menu."',
                            addonparentid           = '".$resid."',
                            menuaddons_addonsname 	= '".$res_add."',
                            menuaddons_priceoption 	= '".$_POST['createmainaddons'][$i]['subaddons'][$j]['subaddonsradio']."',
                            menuaddons_price 		= '".$_POST['createmainaddons'][$i]['subaddons'][$j]['subaddonsprice']."' ";
                            #echo "<br>sublist--->".$inst;
                            $res = $this->ExecuteQuery($inst, "insert");
                            }
                            }
                            }
                            }*/


                            if ($resid)
                            {
                                if (count($_POST['createmainaddons'][$keyi]['subaddons']) > 0)
                                {

                                    foreach ($_POST['createmainaddons'][$keyi]['subaddons'] as $key => $value)
                                    {

                                        $addonsname1 = $this->filterInput($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsname']);
                                        if ($addonsname1 != '')
                                        {
                                            $inst_add = "INSERT INTO 
														" . $CFG['table']['restaurant_addons'] . " 
													SET 
														parentid      	= '" . $resid . "',
														restaurant_id 	= '" . $restaurantname . "',
														category_id   	= '" . $menu_category . "',
														addonsname 		= '" . $this->filterInput(html_entity_decode(mysqli_real_escape_string($this->DBCONN,$addonsname1))) . "',
														addeddate 		= '" . CUR_TIME . "' ";
                                            #echo "<br>inst_add--->".$inst_add;
                                            $res_add = $this->ExecuteQuery($inst_add, "insert");


                                            #Fixed and default Addons Prices condition
                                            if ($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsname'] != '' &&
                                                $_POST['sizeoption'] != 'other')
                                            {
                                                $ins_createaddone_price = ", menuaddons_price = '" . $this->filterInput($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsprice']) .
                                                    "', menuaddons_price_medium	= '" . $this->filterInput($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsprice_medium']) .
                                                    "', menuaddons_price_large 	= '" . $this->filterInput($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsprice_large']) .
                                                    "'";
                                            }

                                            #Slice Addons Prices Condition
                                            if ($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsname'] && $_POST['sizeoption'] ==
                                                'other')
                                            {


                                                if (isset($_POST['cntSliceAddons_createsub']) && !empty($_POST['cntSliceAddons_createsub']) ||
                                                    isset($_POST['cntSliceAddons_createsub1']) && !empty($_POST['cntSliceAddons_createsub']))
                                                {
                                                    if (isset($_POST['cntSliceAddons_createsub']) && !empty($_POST['cntSliceAddons_createsub']))
                                                    {
                                                        $sizeopt_cnt = $this->filterInput($_POST['cntSliceAddons_createsub']);
                                                    }
                                                    if (isset($_POST['cntSliceAddons_createsub1']) && !empty($_POST['cntSliceAddons_createsub1']))
                                                    {
                                                        $sizeopt_cnt = $this->filterInput($_POST['cntSliceAddons_createsub1']);
                                                    }
                                                } else
                                                {
                                                    if (isset($_POST['slicemoreprice_countperslice']) && !empty($_POST['slicemoreprice_countperslice']))
                                                    {
                                                        $sizeopt_cnt = $this->filterInput($_POST['slicemoreprice_countperslice']);
                                                    } else
                                                    {
                                                        $sizeopt_cnt = count($this->filterInput($_POST['size_option']));
                                                    }
                                                }
                                                #echo "sizeopt_cnt ---->".$_POST['cntSliceAddons_createsub'];
                                                for ($k = 0; $k < $sizeopt_cnt; $k++)
                                                {
                                                    if ($_POST['createmainaddons'][$keyi]['subaddons'][$key][$k]['subaddonsprice_slice'] !=
                                                        '')
                                                        $mainaddonsprice_slice_arr[$j][$k] = $_POST['createmainaddons'][$keyi]['subaddons'][$key][$k]['subaddonsprice_slice'];
                                                    else
                                                        $mainaddonsprice_slice_arr[$j][$k] = 0;
                                                }
                                                foreach ($mainaddonsprice_slice_arr as $ky => $val)
                                                {
                                                    #echo "<br>key ".$key;
                                                    $mainaddonsprice_slice_arr_new = $val;
                                                    #unset($mainaddonsprice_slice_arr[$key-1]);
                                                    $mainaddonsprice_slice_arr_new2[] = $val;
                                                    #echo "<pre>";print_r($val);echo ;
                                                    $string = implode(',', $val);
                                                }
                                                $mainaddonsprice_slice = $string;
                                                $ins_createaddone_price = ", menuaddons_price_slice = '" . $mainaddonsprice_slice .
                                                    "' ";
                                            }

                                            /*$inst = "INSERT INTO
                                            ".$CFG['table']['restaurant_menuaddons']." 
                                            SET 
                                            menuaddons_restaurantid = '".$restaurantname."',
                                            menuaddons_categoryid   = '".$menu_category."',
                                            menu_catoption			= '".$main_catoption."',
                                            menuaddons_menuid 		= '".$res_menu."',
                                            addonparentid           = '".$resid."',
                                            menuaddons_addonsname 	= '".$res_add."',
                                            menuaddons_priceoption 	= '".$_POST['createmainaddons'][$i]['subaddons'][$key]['subaddonsradio']."',
                                            menuaddons_price 		= '".$_POST['createmainaddons'][$i]['subaddons'][$key]['subaddonsprice']."',
                                            menuaddons_price_medium	= '".$_POST['createmainaddons'][$i]['subaddons'][$key]['subaddonsprice_medium']."',
                                            menuaddons_price_large 	= '".$_POST['createmainaddons'][$i]['subaddons'][$key]['subaddonsprice_large']."' ";*/
                                            $inst = "INSERT INTO " . $CFG['table']['restaurant_menuaddons'] . " SET 
																menuaddons_restaurantid = '" . $restaurantname . "',
																menuaddons_categoryid   = '" . $menu_category . "',
																menu_catoption			= '" . $main_catoption . "',
																menuaddons_menuid 		= '" . $res_menu . "',
																addonparentid           = '" . $resid . "',
																menuaddons_addonsname 	= '" . $res_add . "',
																menuaddons_priceoption 	= '" . $this->filterInput($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsradio']) .
                                                "'
																$ins_createaddone_price
																";
                                            //echo "<br>sublist--->".$inst;
                                            $res = $this->ExecuteQuery($inst, "insert");
                                        }
                                    }
                                }
                            }
                        }
                    }
                } #end
            } #End Addons Count

            if ($_POST['sizeoption'] == 'other')
            {
                #Pizza Slice Option
                if (!empty($_POST['sizename']))
                {
                    $ins_size = "INSERT INTO 
											" . $CFG['table']['restaurant_pizza_slice'] . " 
										SET
											pizza_slice_restaurantid    = '" . $restaurantname . "',
											pizza_slice_categoryid      = '" . $menu_category . "',
											pizza_slice_menuid 		    = '" . $res_menu . "',
											pizza_slice_name 	    	= '" . $this->filterInput(html_entity_decode(mysqli_real_escape_string($this->DBCONN,$this->filterInput($_POST['sizename'])))) .
                        "',
											pizza_slice_price 		    = '" . $this->filterInput($_POST['sizevalue']) . "' ";
                    $res_size = $this->ExecuteQuery($ins_size, "insert");
                }
                if (count($_POST['morepizzasize']) > 0)
                {
                    //for($i=0;$i<count($_POST['morepizzasize']);$i++){
                    foreach ($_POST['morepizzasize'] as $keyi => $value)
                    {
                        if ($_POST['morepizzasize'][$keyi]['sizename'] != '')
                        {
                            $ins_size = "INSERT INTO 
													" . $CFG['table']['restaurant_pizza_slice'] . " 
												SET
													pizza_slice_restaurantid    = '" . $restaurantname . "',
													pizza_slice_categoryid      = '" . $menu_category . "',
													pizza_slice_menuid 		    = '" . $res_menu . "',
													pizza_slice_name 	    	= '" . $this->filterInput(html_entity_decode(mysqli_real_escape_string($this->DBCONN,$this->filterInput($_POST['morepizzasize'][$keyi]['sizename'])))) .
                                "',
													pizza_slice_price 		    = '" . $this->filterInput($_POST['morepizzasize'][$keyi]['sizevalue']) .
                                "' ";
                            $res_size = $this->ExecuteQuery($ins_size, "insert");
                        }
                    }
                }
            }

        }
        #exit;
        if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
            $this->redirectUrl("restaurantOwnerMyaccount_menu.php");
		}else{
            $this->redirectUrl($CFG['site']['base_url'].'/restaurant-myaccount-menu');
		}
        //$this->redirectUrl("restaurantOwnerMyaccount.php#owner_menu");
    }
    #-------------------------------------------------------------------------------
    #Edit Menu Option
    /**
     * Restaurant::restaurantEditMenuOption()
     * 
     * @return
     */
    function restaurantEditMenuOption($menuid)
    {
        global $CFG, $objSmarty;

        $sel = "SELECT id, restaurant_id, menu_name, menu_category, menu_type, menu_cuisine, menu_price, menu_addons, menu_spl_instruction, menu_description, menu_photo, menu_popular_dish, menu_spicy, pizza_size_small, pizza_small_value, pizza_size_medium, pizza_medium_value, pizza_size_large, pizza_large_value FROM " .
            $CFG['table']['restaurant_menu'] . " WHERE id='" . $this->filterInput($menuid) . "'";
        $res = $this->ExecuteQuery($sel, 'select');

        $category = $this->getValue("maincatename", $CFG['table']['category_main'], "maincateid = '" . $this->filterInput($res[0]['menu_category']) . "'");

        $objSmarty->assign('menuValue',$res);
        $objSmarty->assign('maincatname',$category);
    }
    #-------------------------------------------------------------------------------
    #Edit Menu Option
    /**
     * Restaurant::restaurantEditPizzaOption()
     * 
     * @param mixed $menuid
     * @return
     */
    function restaurantEditPizzaOption($menuid)
    {
        global $CFG, $objSmarty;

        $sel = "SELECT id, pizza_size_small, pizza_small_value, pizza_size_medium, pizza_medium_value, pizza_size_large, pizza_large_value FROM " .
            $CFG['table']['restaurant_menu'] . " WHERE id='" . $this->filterInput($menuid) . "'";
        $res = $this->ExecuteQuery($sel, 'select');
        $objSmarty->assign("menudet", $res);
    }
    #-------------------------------------------------------------------------------
    #Edit Menu
    /**
     * Restaurant::restaurantMenuEdit()
     * 
     * @return
     */
    function restaurantMenuEdit()
    {
        global $CFG, $objSmarty, $objThumb;
        //echo "<pre>"; print_r($_POST); echo "</pre>";  die();
        $resid             = $this->filterInput($_SESSION['restaurantownerid']);
        $restaurantname    = $resid;
        $menuname          = $this->filterInput($_POST['menu_name']);
        $menu_category     = $this->filterInput($_POST['menu_category']);
        $menu_catothers    = $this->filterInput($_POST['menu_catothers']);
        $menu_type         = $this->filterInput($_POST['menu_type']);
        $menu_cuisine      = $this->filterInput($_POST['menu_cuisine']);
        $menu_addons       = $this->filterInput($_POST['menu_addons']);
        $menu_spl_ins      = $this->filterInput($_POST['menu_spl_ins']);
        $menu_description  = $this->filterInput($_POST['menu_description']);
        $menu_popular_dish = $this->filterInput($_POST['menu_popular_dish']);
        $menu_spicy        = $this->filterInput($_POST['menu_spicy']);

        if ($menu_category == 'other')
        {

            $ins_cat = "INSERT INTO 
                                    " . $CFG['table']['category_main'] . "
                                SET 
                                    maincatename = '" . $this->filterInput($menu_catothers) . "',
                                    restaurant_id ='" . $restaurantname . "',
                                    addeddate = '" . CUR_TIME . "' ";
                                    
            $res_cat = $this->ExecuteQuery($ins_cat, "insert");
            $menu_category = $res_cat;
            $main_catoption = 'normal';
        } else
        {
            $main_catoption = $this->getValue("maincat_option", $CFG['table']['category_main'],"maincateid = '" . $this->filterInput($_POST['menu_category']) . "'");
        }

        $categoryname = $this->getValue("maincatename", $CFG['table']['category_main'],"maincateid = '" . $menu_category . "'");
        $categoryname1 = strtolower($categoryname);

        if ($_POST['sizeoption'] == 'default')
        {
            if ($_POST['smallval'] == '' && ($_POST['mediumval'] != ''))
            {
                $menu_price = $this->filterInput($_POST['mediumval']);
            } elseif (($_POST['smallval'] == '') && ($_POST['mediumval'] == ''))
            {
                $menu_price = $this->filterInput($_POST['largeval']);
            } else
            {
                $menu_price = $this->filterInput($_POST['smallval']);
            }
            $sizeoption = 'size';
        } elseif ($_POST['sizeoption'] == 'fixed')
        {
            $menu_price = $this->filterInput($_POST['menu_price_main']);
            $sizeoption = 'fixed';
        } else
        {
            
            if (isset($_POST['size_option']) && !empty($_POST['size_option']) && is_array($_POST['size_option'])) {
                foreach ($_POST['size_option'] as $so=>$val) {
                    $menu_price = $this->filterInput($_POST['size_option'][$so]['sizevalue']);
                    break;
                }
            } elseif (isset($_POST['morepizzasize']) && !empty($_POST['morepizzasize']) && is_array($_POST['morepizzasize'])) {
                foreach ($_POST['morepizzasize'] as $so=>$val) {
                    $menu_price = $this->filterInput($_POST['morepizzasize'][$so]['sizevalue']);
                    break;
                }
            }
            
            $sizeoption = 'slice';
        }

        $upd_menu = "UPDATE  
								" . $CFG['table']['restaurant_menu'] . " 
							SET 
								restaurant_id        = '" . $restaurantname . "',
								menu_name 		 	 = '" . $this->filterInput($menuname) . "',
								menu_category    	 = '" . $menu_category . "',
								menu_type 		     = '" . $menu_type . "',
								menu_cuisine      	 = '" . $menu_cuisine . "',
								menu_price 		 	 = '" . $this->filterInput($menu_price) . "',
								menu_addons 		 = '" . $menu_addons . "',
								sizeoption 		 	 = '" . $sizeoption . "',
								pizza_size_small	 = '" . $this->filterInput($_POST['small']) . "',
								pizza_small_value	 = '" . $this->filterInput($_POST['smallval']) . "',
								pizza_size_medium	 = '" . $this->filterInput($_POST['medium']) . "',
								pizza_medium_value	 = '" . $this->filterInput($_POST['mediumval']) . "',
								pizza_size_large	 = '" . $this->filterInput($_POST['large']) . "',
								pizza_large_value	 = '" . $this->filterInput($_POST['largeval']) . "',
								menu_spl_instruction = '" . $menu_spl_ins . "',
								menu_description 	 = '" . $menu_description . "',
								menu_popular_dish  	 = '" . $menu_popular_dish . "',
								menu_spicy		  	 = '" . $menu_spicy . "'
							WHERE id = '" . $_POST['menuid'] . "' ";
        //echo 'Query-->'.$upd_menu; exit;
        $res_upmenu = $this->ExecuteQuery($upd_menu, "update");

        if (isset($_FILES['menu_photo']['name']) && !empty($_FILES['menu_photo']['name']))
        {

            $getphotoname = $this->GetValue("menu_photo", $CFG['table']['restaurant_menu'],
                "id = '" . $this->filterInput($_POST['menuid']) . "' ");
            if (!empty($getphotoname))
            {
                @unlink($CFG['site']['photo_menu_path'] . '/' . $getphotoname);
            }

            $logoext = $this->getFileExtension($_FILES['menu_photo']['name']);
            $logoname = $this->seoUrl($_POST["menu_name"]) . "." . $logoext;
            $logoimage = "photo_" . $logoname;
            $dest_name = $CFG['site']['photo_menu_path'] . '/' . $logoimage;

            $uploadsuccess = @move_uploaded_file($_FILES['menu_photo']['tmp_name'], $dest_name);
            @chmod($dest_name, 0777);

            if ($uploadsuccess)
            {
                #Get Thumbnail width & height
                $menuthumb = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath = $dest_name;
                $photo = "thumb_" . $logoname;

                $dest_imagepath = $CFG['site']['photo_menu_path'] . '/' . $photo;
                $objThumb->createThumb($sour_imagepath, $dest_imagepath, $menuthumb['0']['menu_thumb_width'], $menuthumb['0']['menu_thumb_height'], 'crop');

                unlink($dest_name);

                $query = " UPDATE " . $CFG['table']['restaurant_menu'] . " SET menu_photo = '" . $photo . "' WHERE id = '" . $this->filterInput($_POST['menuid']) . "' ";
                $res = $this->ExecuteQuery($query, "update");
            }
        }

        if ($menu_addons == 'Yes')
        {
            if (count($_POST['mainaddons']) > 0)
            {
                foreach ($_POST['mainaddons'] as $keyi => $value)
                {
                    $mainaddoneditid = $this->filterInput($_POST['mainaddons'][$keyi]['mainaddoneditid']);
                    if ($_POST['mainaddons'][$keyi]['mainaddonsname'] != '')
                    {
                        #Fixed and Default Addon prices:----------------------------------------------------------
                        if ($_POST['mainaddons'][$keyi]['mainaddonsname'] != '' && $_POST['sizeoption'] !=
                            'other')
                        {
                            $mainaddonsname = $this->filterInput($_POST['mainaddons'][$keyi]['mainaddonsname']);

                            $mainaddonspriceoption = $this->filterInput($_POST['mainaddons'][$keyi]['addonspriceoption']);
                            if ($mainaddonspriceoption != '')
                            {
                                if ($mainaddonspriceoption == 'Free')
                                {
                                    $mainaddonsprice = '';
                                    $mainaddonsprice_medium = '';
                                    $mainaddonsprice_large = '';
                                } else
                                {
                                    if ($_POST['sizeoption'] == 'fixed')
                                    {
                                        $mainaddonsprice = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_fixed']);
                                        $mainaddonsprice_medium = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_medium_fixed']);
                                        $mainaddonsprice_large = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_large_fixed']);
                                    } else
                                    {
                                        $mainaddonsprice = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_size']);
                                        $mainaddonsprice_medium = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_medium_size']);
                                        $mainaddonsprice_large = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_large_size']);
                                    }
                            
                                }
                                if (isset($mainaddoneditid) && !empty($mainaddoneditid))
                                {
                                    $inst = "UPDATE  
											         " . $CFG['table']['restaurant_menuaddons'] . " 
    											 SET 
    												menuaddons_restaurantid = '" . $restaurantname . "',
    												menuaddons_categoryid   = '" . $menu_category . "',
    												menu_catoption			= '" . $main_catoption . "',
    												menuaddons_menuid 		= '" . $this->filterInput($_POST['menuid']) . "',
    												addonparentid           = '" . $mainaddonsname . "',
    												menuaddons_addonsname 	= '" . $this->filterInput($mainaddonsname) . "',
    												menuaddons_priceoption 	= '" . $mainaddonspriceoption . "',
    												menuaddons_price 		= '" . $this->filterInput($this->filterInput($mainaddonsprice)) . "',
    												menuaddons_price_medium	= '" . $this->filterInput($mainaddonsprice_medium) . "',
    												menuaddons_price_large	= '" . $this->filterInput($mainaddonsprice_large) . "'
    											WHERE  
    												menuaddons_id = '" . $mainaddoneditid . "'";
                                                    
                                    $res = $this->ExecuteQuery($inst, "update");
                                } else
                                {
                                    $ins = "INSERT INTO  
											             " . $CFG['table']['restaurant_menuaddons'] . " 
        											SET 
        												menuaddons_restaurantid = '" . $restaurantname . "',
        												menuaddons_categoryid   = '" . $menu_category . "',
        												menuaddons_menuid 		= '" . $this->filterInput($_POST['menuid']) . "',
        												addonparentid           = '" . $mainaddonsname . "',
        												menuaddons_addonsname 	= '" . $this->filterInput($mainaddonsname) . "',
        												menuaddons_priceoption 	= '" . $mainaddonspriceoption . "',
        												menuaddons_price 		= '" . $this->filterInput($mainaddonsprice) . "',
        												menuaddons_price_medium	= '" . $this->filterInput($mainaddonsprice_medium) . "',
        												menuaddons_price_large	= '" . $this->filterInput($mainaddonsprice_large) . "'";
                                                        
                                    $res = $this->ExecuteQuery($ins, "insert");
                                }
                            } else
                            {
                                if (count($_POST['mainaddons'][$keyi]['addons']) > 0)
                                {
                                    foreach ($_POST['mainaddons'][$keyi]['addons'] as $keyj => $value)
                                    {
                                        $addoneditid       = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addoneditid']);
                                        $addonsname1       = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addonsname']);
                                        $addonspriceoption = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addonspriceoption']);
                                        if ($addonspriceoption == 'Free')
                                        {
                                            $menuaddonsprice = '';
                                            $mainaddonsprice_medium = '';
                                            $mainaddonsprice_large = '';
                                        } else
                                        {
                                            if ($_POST['sizeoption'] == 'fixed')
                                            {
                                                $menuaddonsprice        = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_fixed']);
                                                $mainaddonsprice_medium = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_medium_fixed']);
                                                $mainaddonsprice_large  = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_large_fixed']);
                                            } else
                                            {
                                                $menuaddonsprice        = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_size']);
                                                $mainaddonsprice_medium = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_medium_size']);
                                                $mainaddonsprice_large  = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addons_price_large_size']);
                                            }
                                        }

                                        if (isset($addoneditid) && !empty($addoneditid))
                                        {
                                            if ($addonsname1 != '')
                                            {
                                                $upda = "UPDATE 
															     " . $CFG['table']['restaurant_menuaddons'] . " 
    															SET 
    																menuaddons_restaurantid = '" . $restaurantname . "',
    																menuaddons_categoryid   = '" . $menu_category . "',
    																menu_catoption			= '" . $main_catoption . "',
    																menuaddons_menuid 		= '" . $this->filterInput($_POST['menuid']) . "',
    																addonparentid           = '" . $mainaddonsname . "',
    																menuaddons_addonsname 	= '" . $this->filterInput($addonsname1) . "',
    																menuaddons_priceoption 	= '" . $addonspriceoption . "',
    																menuaddons_price 		= '" . $this->filterInput($menuaddonsprice) . "',
    																menuaddons_price_medium	= '" . $this->filterInput($mainaddonsprice_medium) . "',
    																menuaddons_price_large	= '" . $this->filterInput($mainaddonsprice_large) . "'
    															WHERE  
    																menuaddons_id = '" . $addoneditid . "'";
                                                                    
                                                $res = $this->ExecuteQuery($upda, "update");
                                            } else
                                            {
                                                $del = " DELETE FROM " . $CFG['table']['restaurant_menuaddons'] . " WHERE menuaddons_id = '" . $addoneditid . "'";
                                                $res = $this->ExecuteQuery($del, "delete");
                                            }
                                        } else
                                        {
                                            if ($addonsname1 != '')
                                            {
                                                $inst = "INSERT INTO 
															         " . $CFG['table']['restaurant_menuaddons'] . " 
        															SET 
        																menuaddons_restaurantid = '" . $restaurantname . "',
        																menuaddons_categoryid   = '" . $menu_category . "',
        																menu_catoption			= '" . $main_catoption . "',
        																menuaddons_menuid 		= '" . $this->filterInput($_POST['menuid']) . "',
        																addonparentid           = '" . $mainaddonsname . "',
        																menuaddons_addonsname 	= '" . $this->filterInput($addonsname1) . "',
        																menuaddons_priceoption 	= '" . $addonspriceoption . "',
        																menuaddons_price 		= '" . $this->filterInput($menuaddonsprice) . "',
        																menuaddons_price_medium	= '" . $this->filterInput($mainaddonsprice_medium) . "',
        																menuaddons_price_large	= '" . $this->filterInput($mainaddonsprice_large) . "'";
                                                                        
                                                $res = $this->ExecuteQuery($inst, "insert");
                                            }
                                        }
                                    }
                                }
                            }
                        } #END Fixed and Default Addon prices:------------------------------------------------------

                        #Slice Addon prices:------------------------------------------------------------------------
                        elseif ($_POST['mainaddons'][$keyi]['mainaddonsname'] != '' && $_POST['sizeoption'] ==
                            'other')
                        {

                            $mainaddonsname = $this->filterInput($_POST['mainaddons'][$keyi]['mainaddonsname']);
                            $mainaddonspriceoption = $this->filterInput($_POST['mainaddons'][$keyi]['addonspriceoption']);

                            if ($mainaddonspriceoption != '')
                            {
                                if ($mainaddonspriceoption == 'Free')
                                {
                                    $mainaddonsprice_slice = '';
                                } else
                                {
                                    $mainaddonsprice_slice_arr[] = $_POST['mainaddons'][$keyi]['addons_price_slice'];
                                    $mainaddonsprice_slice = implode(",", $mainaddonsprice_slice_arr);
                                }
                                if (isset($mainaddoneditid) && !empty($mainaddoneditid))
                                {
                                    $inst = "UPDATE  
													" . $CFG['table']['restaurant_menuaddons'] . " 
													SET 
														menuaddons_restaurantid = '" . $restaurantname . "',
														menuaddons_categoryid   = '" . $menu_category . "',
														menu_catoption			= '" . $main_catoption . "',
														menuaddons_menuid 		= '" . $this->filterInput($_POST['menuid']) . "',
														addonparentid           = '" . $mainaddonsname . "',
														menuaddons_addonsname 	= '" . $this->filterInput($mainaddonsname) . "',
														menuaddons_priceoption 	= '" . $mainaddonspriceoption . "',
														menuaddons_price_slice 	= '" . $this->filterInput($mainaddonsprice_slice) . "'
													WHERE  
														menuaddons_id = '" . $mainaddoneditid . "'";
                                                        
                                    $res = $this->ExecuteQuery($inst, "update");
                                } else
                                {
                                    $ins = "INSERT INTO  
							                             " . $CFG['table']['restaurant_menuaddons'] . " 
													SET 
														menuaddons_restaurantid = '" . $restaurantname . "',
														menuaddons_categoryid   = '" . $menu_category . "',
														menu_catoption			= '" . $main_catoption . "',
														menuaddons_menuid 		= '" . $this->filterInput($_POST['menuid']) . "',
														addonparentid           = '" . $mainaddonsname . "',
														menuaddons_addonsname 	= '" . $this->filterInput($mainaddonsname) . "',
														menuaddons_priceoption 	= '" . $mainaddonspriceoption . "',
														menuaddons_price_slice 	= '" . $this->filterInput($mainaddonsprice_slice) . "'";
                                                        
                                    $res = $this->ExecuteQuery($ins, "insert");
                                }
                            } else
                            {
                                if (count($_POST['mainaddons'][$keyi]['addons']) > 0)
                                {
                                    foreach ($_POST['mainaddons'][$keyi]['addons'] as $keyj => $value)
                                    {
                                        $addoneditid       = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addoneditid']);
                                        $addonsname1       = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addonsname']);
                                        $addonspriceoption = $this->filterInput($_POST['mainaddons'][$keyi]['addons'][$keyj]['addonspriceoption']);
                                        if ($addonspriceoption == 'Free')
                                        {
                                            $mainaddonsprice_slice = '';
                                        } else
                                        {
                                            
                                            if (isset($_POST['slicemoreprice_countperslice']) && !empty($_POST['slicemoreprice_countperslice']))
                                            {
                                                $sizeopt_cnt = $this->filterInput($_POST['slicemoreprice_countperslice']);
                                            } else
                                            {
                                                $sizeopt_cnt = count($this->filterInput($_POST['size_option']));
                                            }
                                            for ($k = 0; $k < $sizeopt_cnt; $k++)
                                            {
                                                $mainaddonsprice_slice_arr[$keyj][$k] = $_POST['mainaddons'][$keyi]['addons'][$keyj][$k]['addons_price_slice'];
                                            }
                                            foreach ($mainaddonsprice_slice_arr as $key => $val)
                                            {
                                                unset($mainaddonsprice_slice_arr[$key - 1]);
                                                $string = implode(',', $val);
                                                
                                            }
                                            $mainaddonsprice_slice = $string;
                                        }
                                       
                                        if (isset($addoneditid) && !empty($addoneditid))
                                        {
                                            if ($addonsname1 != '')
                                            {
                                                $upda = "UPDATE 
																" . $CFG['table']['restaurant_menuaddons'] . " 
																SET 
																	menuaddons_restaurantid = '" . $restaurantname . "',
																	menuaddons_categoryid   = '" . $menu_category . "',
																	menu_catoption			= '" . $main_catoption . "',
																	menuaddons_menuid 		= '" . $this->filterInput($_POST['menuid']) . "',
																	addonparentid           = '" . $mainaddonsname . "',
																	menuaddons_addonsname 	= '" . $this->filterInput($addonsname1) . "',
																	menuaddons_priceoption 	= '" . $addonspriceoption . "',
																	menuaddons_price_slice 	= '" . $this->filterInput($mainaddonsprice_slice) . "'
																WHERE  
																	menuaddons_id = '" . $addoneditid . "'";
                                                                    
                                                $res = $this->ExecuteQuery($upda, "update");
                                            } else
                                            {
                                                $del = " DELETE FROM " . $CFG['table']['restaurant_menuaddons'] . " WHERE menuaddons_id = '" . $addoneditid . "'";
                                                $res = $this->ExecuteQuery($del, "delete");
                                            }
                                        } else
                                        {
                                            if ($addonsname1 != '')
                                            {
                                                $inst = "INSERT INTO 
																	" . $CFG['table']['restaurant_menuaddons'] . " 
																	SET 
																		menuaddons_restaurantid = '" . $restaurantname . "',
																		menuaddons_categoryid   = '" . $menu_category . "',
																		menu_catoption			= '" . $main_catoption . "',
																		menuaddons_menuid 		= '" . $this->filterInput($_POST['menuid']) . "',
																		addonparentid           = '" . $mainaddonsname . "',
																		menuaddons_addonsname 	= '" . $this->filterInput($addonsname1) . "',
																		menuaddons_priceoption 	= '" . $addonspriceoption . "',
																		menuaddons_price_slice 	= '" . $this->filterInput($mainaddonsprice_slice) . "'";
                                                $res = $this->ExecuteQuery($inst, "insert");
                                            }
                                        }
                                    }
                                }
                            }
                            #}
                        } #END Slice Addon prices:-----------------------------------------------------------
                    } else
                    {
                        $del = " DELETE FROM " . $CFG['table']['restaurant_menuaddons'] . " WHERE menuaddons_id = '" . $mainaddoneditid . "'";
                        $res = $this->ExecuteQuery($del, "delete");
                    }
                }
            } #END

            #Create Addons
            if (count($_POST['createmainaddons']) > 0)
            {
                foreach ($_POST['createmainaddons'] as $keyi => $value)
                {
                    if ($_POST['createmainaddons'][$keyi]['mainaddonsname'] != '')
                    {
                        $ins_ad = "INSERT INTO 
    										" . $CFG['table']['restaurant_addons'] . " 
    									SET 
    										parentid      	= '0',
    										restaurant_id 	= '" . $restaurantname . "',
    										category_id   	= '" . $menu_category . "',
    										addonsname 		= '" . $this->filterInput($_POST['createmainaddons'][$keyi]['mainaddonsname']) . "',
    										addonscount 	= '" . $this->filterInput($_POST['createmainaddons'][$keyi]['mainaddoncnt']) . "',
    										addeddate 		= '" . CUR_TIME . "' ";
                                            
                        $resid = $this->ExecuteQuery($ins_ad, "insert");

                        if ($resid)
                        {
                            if (count($_POST['createmainaddons'][$keyi]['subaddons']) > 0)
                            {

                                foreach ($_POST['createmainaddons'][$keyi]['subaddons'] as $key => $value)
                                {

                                    $addonsname1 = $this->filterInput($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsname']);
                                    if ($addonsname1 != '')
                                    {
                                        $inst_add = " INSERT INTO 
                                                                " . $CFG['table']['restaurant_addons'] . " 
            												SET 
            													parentid      	= '" . $resid . "',
            													restaurant_id 	= '" . $restaurantname . "',
            													category_id   	= '" . $menu_category . "',
            													addonsname 		= '" . $this->filterInput($addonsname1) . "',
            													addeddate 		= '" . CUR_TIME . "' ";
                                        
                                        $res_add = $this->ExecuteQuery($inst_add, "insert");

                                        #Fixed and default Addons Prices condition
                                        if ($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsname'] != '' &&
                                            $_POST['sizeoption'] != 'other')
                                        {
                                            $ins_createaddone_price = ", menuaddons_price = '" . $this->filterInput($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsprice']) .
                                                "', menuaddons_price_medium	= '" . $this->filterInput($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsprice_medium']) .
                                                "', menuaddons_price_large 	= '" . $this->filterInput($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsprice_large']) .
                                                "'";
                                        }

                                        #Slice Addons Prices Condition
                                        if ($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsname'] && $_POST['sizeoption'] ==
                                            'other')
                                        {

                                            if (isset($_POST['cntSliceAddons_createsub']) && !empty($_POST['cntSliceAddons_createsub']) ||
                                                isset($_POST['cntSliceAddons_createsub1']) && !empty($_POST['cntSliceAddons_createsub']))
                                            {
                                                if (isset($_POST['cntSliceAddons_createsub']) && !empty($_POST['cntSliceAddons_createsub']))
                                                {
                                                    $sizeopt_cnt = $this->filterInput($_POST['cntSliceAddons_createsub']);
                                                }
                                                if (isset($_POST['cntSliceAddons_createsub1']) && !empty($_POST['cntSliceAddons_createsub1']))
                                                {
                                                    $sizeopt_cnt = $this->filterInput($_POST['cntSliceAddons_createsub1']);
                                                }
                                            } else
                                            {
                                                if (isset($_POST['slicemoreprice_countperslice']) && !empty($_POST['slicemoreprice_countperslice']))
                                                {
                                                    $sizeopt_cnt = $this->filterInput($_POST['slicemoreprice_countperslice']);
                                                } else
                                                {
                                                    $sizeopt_cnt = count($this->filterInput($_POST['size_option']));
                                                }
                                            }

                                            for ($k = 0; $k < $sizeopt_cnt; $k++)
                                            {
                                                if ($_POST['createmainaddons'][$keyi]['subaddons'][$key][$k]['subaddonsprice_slice'] !=
                                                    '')
                                                    $mainaddonsprice_slice_arr[$j][$k] = $this->filterInput($_POST['createmainaddons'][$keyi]['subaddons'][$key][$k]['subaddonsprice_slice']);
                                                else
                                                    $mainaddonsprice_slice_arr[$j][$k] = 0;
                                            }
                                            foreach ($mainaddonsprice_slice_arr as $ky => $val)
                                            {
                                                $string = implode(',', $val);
                                            }
                                            $mainaddonsprice_slice = $string;

                                            $ins_createaddone_price = ", menuaddons_price_slice = '" . $this->filterInput($mainaddonsprice_slice) .
                                                "' ";
                                        }

                                        $inst = "INSERT INTO 
												" . $CFG['table']['restaurant_menuaddons'] . " 
												SET 
													menuaddons_restaurantid = '" . $restaurantname . "',
													menuaddons_categoryid   = '" . $menu_category . "',
													menu_catoption			= '" . $main_catoption . "',
													menuaddons_menuid 		= '" . $this->filterInput($_POST['menuid']) . "',
													addonparentid           = '" . $resid . "',
													menuaddons_addonsname 	= '" . $res_add . "',
													menuaddons_priceoption 	= '" . $this->filterInput($_POST['createmainaddons'][$keyi]['subaddons'][$key]['subaddonsradio']) . "'
													$ins_createaddone_price ";
                                        $res = $this->ExecuteQuery($inst, "insert");
                                    }
                                }
                            }
                        }
                    }
                }
            }

        }
        #exit;
        if ($_POST['sizeoption'] == 'other')
        {
            #Pizza Slice Option
            if (count($_POST['size_option']) > 0)
            {
                foreach ($_POST['size_option'] as $keyi => $value)
                {
                    $sliceeditid = $this->filterInput($_POST['size_option'][$keyi]['sliceeditid']);
                    $slicename = mysqli_real_escape_string($this->DBCONN,$_POST['size_option'][$keyi]['sizename']);
                    if ($slicename != '')
                    {
                        $ins_slice = "UPDATE  
										      " . $CFG['table']['restaurant_pizza_slice'] . " 
        									SET 
        										pizza_slice_restaurantid    = '" . $restaurantname . "',
        										pizza_slice_categoryid      = '" . $menu_category . "',
        										pizza_slice_menuid 		    = '" . $this->filterInput($_POST['menuid']) . "',
        										pizza_slice_name 	    	= '" . $this->filterInput($slicename) . "',
        										pizza_slice_price 		    = '" . $this->filterInput($_POST['size_option'][$keyi]['sizevalue']) . "'
        									WHERE 
        									    pizza_slice_id = '" . $sliceeditid . "' ";
                                                
                                                
                        $res_slice = $this->ExecuteQuery($ins_slice, "update");
                    }
                }
            }

            if (count($_POST['morepizzasize']) > 0)
            {
                foreach ($_POST['morepizzasize'] as $keyi => $value)
                {
                    if ($_POST['morepizzasize'][$keyi]['sizename'] != '')
                    {
                        $ins_size = "INSERT INTO 
												" . $CFG['table']['restaurant_pizza_slice'] . " 
											SET
												pizza_slice_restaurantid    = '" . $restaurantname . "',
												pizza_slice_categoryid      = '" . $menu_category . "',
												pizza_slice_menuid 		    = '" . $this->filterInput($_POST['menuid']) . "',
												pizza_slice_name 	    	= '" . $this->filterInput(mysqli_real_escape_string($this->DBCONN,$_POST['morepizzasize'][$keyi]['sizename'])) . "',
												pizza_slice_price 		    = '" . $this->filterInput($_POST['morepizzasize'][$keyi]['sizevalue']) . "' ";
                                                
                        $res_size = $this->ExecuteQuery($ins_size, "insert");
                    }
                }
            }
        }
        #exit;
        
        if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
            $this->redirectUrl("restaurantOwnerMyaccount_menu.php");
		}else{
            $this->redirectUrl($CFG['site']['base_url'].'/restaurant-myaccount-menu');
		}
        //$this->redirectUrl("restaurantOwnerMyaccount_menu.php");
    }
    #-----------------------------------------------------------------------------------------------------
    #Delete select crust
    /**
     * Restaurant::resRemoveCrustOption()
     * 
     * @return
     */
    function resRemoveCrustOption()
    {
        global $CFG, $objSmarty;

        $delsel = "DELETE FROM " . $CFG['table']['restaurant_pizza_crust'] .
            " WHERE pizza_crustid = '" . $this->filterInput($_POST['crustid']) . "' ";
        $delres = $this->ExecuteQuery($delsel, "delete");
        echo 'success';
    }
    #-----------------------------------------------------------------------------------------------------
    #--------------------------------------------------------------------------------
    #  ADDONS  MANAGEMENT START  #
    #--------------------------------------------------------------------------------
    #Addons Add & Check Availability
    /**
     * Restaurant::addonNew()
     * 
     * @return
     */
    function addonNew()
    {
        global $CFG;

        $restaurant_name = $this->filterInput($_SESSION['restaurantownerid']);
        $category_name = $this->filterInput($_POST['menu_category']);
        $addons_name = $this->filterInput($_POST['addons_name']);

        $noofrows = $this->getNumvalues($CFG['table']['restaurant_addons'],
            "category_id = '" . $category_name . "' AND addonsname='" . $addons_name . "'");

        if ($noofrows > 0)
        {
            echo "exist";
        }
         /*else{
        $query = "INSERT INTO ".$CFG['table']['restaurant_addons']." SET restaurant_id = '".$restaurant_name."',category_id = '".$category_name."', addonsname = '".$addons_name."', addeddate = NOW()";
        $res   = $this->ExecuteQuery($query, "insert");
        echo "insert";
        }*/
    }
    #Addons Edit & Check Availability
    /**
     * Restaurant::addonEdit()
     * 
     * @return
     */
    function addonEdit()
    {
        global $CFG;

        $restaurant_name = $this->filterInput($_SESSION['restaurantownerid']);
        $category_name = $this->filterInput($_POST['menu_category']);
        $addons_name = $this->filterInput($_POST['addons_name']);

        $noofrows = $this->getNumvalues($CFG['table']['restaurant_addons'],
            "category_id = '" . $category_name . "' AND addonsname='" . $addons_name .
            "' AND id != '" . $this->filterInput($_POST['addonid']) . "' ");

        if ($noofrows > 0)
        {
            echo "exist";
        }
         /*else{
        $qry = "UPDATE ".$CFG['table']['restaurant_addons']." SET category_id = '".$category_name."', addonsname = '".$addons_name."' WHERE id = '".$_POST['addonid']."'";	
        $res   = $this->ExecuteQuery($qry, "update");
        echo "update";
        }*/
    }
    #-------------------------------------------------------------------------------
    #AddonsList
    /**
     * Restaurant::restaurantEditAddons()
     * 
     * @return
     */
    function restaurantEditAddons($addonid)
    {
        global $CFG, $objSmarty;

        $sel = "SELECT category_id,addonsname FROM " . $CFG['table']['restaurant_addons'] .
            " WHERE id = '" . $this->filterInput($addonid) . "'";
        $res = $this->ExecuteQuery($sel, "select");
        //$category = $this->getValue("maincatename",$CFG['table']['category_main'],"maincateid = '".$res[0]['category_id']."'");
        $objSmarty->assign('addonsValue',$res);
    }
    #-----------------------------------------------
    /**
     * Restaurant::restaurantAddonsAdd()
     * 
     * @return
     */
    function restaurantAddonsAdd()
    {
        global $CFG, $objSmarty;

        $restaurant_name = $this->filterInput($_SESSION['restaurantownerid']);
        $category_name   = $this->filterInput($_POST['menu_categor']);
        $addons_name     = $this->filterInput($_POST['addons_name']);
        $addons_option   = $this->filterInput($_POST['mainaddonoption']);
        $addons_value    = $this->filterInput($_POST['mainaddonvalue']);
        $addonstype      = $this->filterInput($_POST['addonstype']);

        if ($_POST['menu_categor'] == 'other')
        {
            $ins_cat = " INSERT INTO 
                                    " . $CFG['table']['category_main'] .  " 
                                SET 
                                    maincatename  = '" . $this->filterInput(mysqli_real_escape_string($this->DBCONN,$this->filterInput($_REQUEST['addon_catothers']))) . "',
                                    restaurant_id ='" . $restaurant_name . "',
                                    addeddate     = '" . CUR_TIME . "' ";
                                    
            $category_name = $this->ExecuteQuery($ins_cat, "insert");
        }


        $query = " INSERT INTO 
                                " . $CFG['table']['restaurant_addons'] . "
                            SET 
                                restaurant_id     = '" . $restaurant_name . "',
                                category_id       = '" . $category_name . "',
                                addonsname        = '" . $this->filterInput($addons_name) . "',
                                addonspriceoption = '" . $addons_option . "',
                                addonsprice       = '" . $this->filterInput($addons_value) . "',
                                addonscount       = '" . $this->filterInput($_POST['mainaddoncnt']) . "',
                                addons_option     = '" . $addonstype . "',
                                addeddate         = '" . CUR_TIME . "'";
                                
        $resaddonid = $this->ExecuteQuery($query, "insert");

        if ($resaddonid)
        {

            if (count($_POST['subadd']) > 0)
            {
                foreach ($_POST['subadd'] as $key => $value)
                {
                    if ($_POST['subadd'][$key]['subaddon'] != '')
                    {
                        $ins = "INSERT INTO 
											" . $CFG['table']['restaurant_addons'] . " 
										SET 
											parentid      		= '" . $resaddonid . "',
											restaurant_id 		= '" . $restaurant_name . "',
											category_id   		= '" . $category_name . "',
											addonsname 			= '" . $this->filterInput(mysqli_real_escape_string($this->DBCONN,$this->filterInput($_POST['subadd'][$key]['subaddon']))) . "',
											addeddate 			= '" . CUR_TIME . "' ";
                        $res = $this->ExecuteQuery($ins, "insert");
                    }
                }
            }
            if (count($_POST['mainaddons']) > 0)
            {
                foreach ($_POST['mainaddons'] as $key1 => $value1)
                {
                    if ($_POST['mainaddons'][$key1]['mainaddons_priceoption'] == 'Free')
                    {
                        $mainaddons_price = '';
                    } elseif ($_POST['mainaddons'][$key1]['mainaddons_priceoption'] == 'Paid')
                    {
                        $mainaddons_price = $this->filterInput($_POST['mainaddons'][$key1]['mainaddons_price']);
                    }

                    if ($_POST['mainaddons'][$key1]['mainaddonsname'] != '')
                    {
                        $ins = "INSERT INTO 
											" . $CFG['table']['restaurant_addons'] . " 
										SET 
											parentid      	= '0',
											restaurant_id 	= '" . $restaurant_name . "',
											category_id   	= '" . $category_name . "',
											addonsname 		= '" . $this->filterInput(mysqli_real_escape_string($this->DBCONN,$this->filterInput($_POST['mainaddons'][$key1]['mainaddonsname']))) . "',
											addonspriceoption = '" . $this->filterInput($_POST['mainaddons'][$key1]['mainaddons_priceoption']) . "',
											addonsprice 	= '" . $this->filterInput($mainaddons_price) . "',
											addons_option 	= '" . $this->filterInput($_POST['mainaddons'][$key1]['addonstype']) . "',
											addonscount 	= '" . $this->filterInput($_POST['mainaddons'][$key1]['mainaddoncnt']) . "',
											addeddate 		= '" . CUR_TIME . "' ";
                                            
                        $resid = $this->ExecuteQuery($ins, "insert");
                    }
                    if ($resid)
                    {
                        if (count($_POST['mainaddons'][$key1]['subaddons']) > 0)
                        {
                            foreach ($_POST['mainaddons'][$key1]['subaddons'] as $key2 => $value2)
                            {
                                $addonsname1 = $this->filterInput($_POST['mainaddons'][$key1]['subaddons'][$key2]['subaddonsname']);
                                if ($addonsname1 != '')
                                {
                                    $inst = "INSERT INTO 
            											" . $CFG['table']['restaurant_addons'] . " 
            										SET 
            											parentid      	= '" . $resid . "',
            											restaurant_id 	= '" . $restaurant_name . "',
            											category_id   	= '" . $category_name . "',
            											addonsname 		= '" . $this->filterInput($addonsname1) . "',
            											addeddate 		= '" . CUR_TIME . "' ";
                                                        
                                    $res = $this->ExecuteQuery($inst, "insert");
                                }
                            }
                        }
                    }
                }
            }
        }
        if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
            
            $this->redirectUrl("restaurantOwnerMyaccount_addons.php");
		}else{
            $this->redirectUrl($CFG['site']['base_url'].'/restaurant-myaccount-addons');
		}
        
    }
    #-------------------------------------------------------------------------------
    /**
     * Restaurant::restaurantAddonsEdit()
     * 
     * @return
     */
    function restaurantAddonsEdit()
    {
        global $CFG, $objSmarty;
        //echo "<pre>"; print_r($_POST); echo "</pre>"; //exit;
        $restaurant_name = $this->filterInput($_SESSION['restaurantownerid']);
        $category_name   = $this->filterInput($_POST['menu_categor']);
        $addons_name     = $this->filterInput($_POST['addons_name']);
        $addons_option   = $this->filterInput($_POST['mainaddonoption']);
        $addons_value    = $this->filterInput($_POST['mainaddonvalue']);
        $addonstype      = $this->filterInput($_POST['addonstype']);

        if ($_POST['menu_categor'] == 'other')
        {
            $ins_cat = " INSERT INTO 
                                    " . $CFG['table']['category_main'] . " 
                                SET 
                                    maincatename   = '" . $this->filterInput(mysqli_real_escape_string($this->DBCONN,$this->filterInput($_REQUEST['addon_catothers']))) . "',
                                    restaurant_id  = '" . $restaurant_name . "',
                                    addeddate      = '" . CUR_TIME . "' ";
                                
            $category_name = $this->ExecuteQuery($ins_cat, "insert");
        }

        $upquery = " UPDATE 
                            " . $CFG['table']['restaurant_addons'] . "
                        SET 
                            restaurant_id     = '" . $restaurant_name . "',
                            category_id       = '" . $category_name . "', 
                            addonsname        = '" . $this->filterInput($addons_name) . "',
                            addonspriceoption = '" . $addons_option . "',
                            addonsprice       = '" . $this->filterInput($addons_value) . "',
                            addons_option     = '" . $addonstype . "',
                            addonscount       = '" . $this->filterInput($_POST['mainaddoncnt']) . "' 
                        WHERE 
                            id = '" . $this->filterInput($_REQUEST['addonid']) .
            "'";
        //echo 'Query-->'.$upquery; exit;
        $resaddonid = $this->ExecuteQuery($upquery, "update");

        if (count($_POST['addonsub']) > 0)
        {
            foreach ($_POST['addonsub'] as $key => $value)
            {
                $editid = $this->filterInput($_POST['addonsub'][$key]['subaddoneditid']);

                if ($addons_option != 'Paid')
                {
                    if (isset($editid) && !empty($editid))
                    {
                        $upd = "UPDATE  
										" . $CFG['table']['restaurant_addons'] . " 
									SET 
										parentid      	= '" . $this->filterInput($_REQUEST['addonid']) . "',
										restaurant_id 	= '" . $restaurant_name . "',
										category_id   	= '" . $category_name . "',
										addonsname 		= '" . $this->filterInput(mysqli_real_escape_string($this->DBCONN,$this->filterInput($_POST['addonsub'][$key]['subaddonsname']))) . "'
									WHERE 
										id = '" . $editid . "' ";
                        
                        $res = $this->ExecuteQuery($upd, "update");
                    }
                    if (empty($editid))
                    {
                        $ins = "INSERT INTO 
										      " . $CFG['table']['restaurant_addons'] . " 
			                             SET 
    										parentid      	= '" . $this->filterInput($_REQUEST['addonid']) . "',
    										restaurant_id 	= '" . $restaurant_name . "',
    										category_id   	= '" . $category_name . "',
    										addonsname 		= '" . $this->filterInput(mysqli_real_escape_string($this->DBCONN,$this->filterInput($_POST['addonsub'][$key]['subaddonsname']))) . "'
    										addeddate 		= '" . CUR_TIME . "' ";
                        //echo 'Query-->'. $ins; exit;
                        $res = $this->ExecuteQuery($ins, "insert");
                    }
                } else
                {
                    $del = "DELETE FROM " . $CFG['table']['restaurant_addons'] . " WHERE id = '" . $editid ."' ";
                    $res = $this->ExecuteQuery($del, "delete");
                }
            }
        }

        if (count($_POST['subadd']) > 0)
        {
            foreach ($_POST['subadd'] as $key1 => $value1)
            {
                if ($_POST['subadd'][$key1]['subaddon'] != '')
                {
                    $ins = "INSERT INTO 
										" . $CFG['table']['restaurant_addons'] . " 
									SET 
										parentid      		= '" . $this->filterInput($_REQUEST['addonid']) . "',
										restaurant_id 		= '" . $restaurant_name . "',
										category_id   		= '" . $category_name . "',
										addonsname 			= '" . $this->filterInput(mysqli_real_escape_string($this->DBCONN,$this->filterInput($_POST['subadd'][$key1]['subaddon']))) ."',
										addeddate 			= '" . CUR_TIME . "' ";
                     //echo 'Query-->'. $ins; exit;                 
                    $res = $this->ExecuteQuery($ins, "insert");
                }
            }
        }
        if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
            $this->redirectUrl("restaurantOwnerMyaccount_addons.php");
		}else{
            $this->redirectUrl($CFG['site']['base_url'].'/restaurant-myaccount-addons');
		}
    }
    #--------------------------------------------------------------------------------
    #  Offer  MANAGEMENT START  #
    #--------------------------------------------------------------------------------
    #Offers Add & Check Availability
    /**
     * Restaurant::offerNew()
     * 
     * @return
     */
    function offerNew()
    {
        global $CFG;
        
        //echo "<pre>";print_r($_POST);echo "</pre>";
        
        $restaurant_name   = $this->filterInput($_SESSION['restaurantownerid']);
        $offer_percentage  = $this->filterInput($_POST['offer_percentage']);
        $offer_price       = $this->filterInput($_POST['offer_price']);
        //$offer_valid_from  = date('Y-m-d', strtotime($this->filterInput($_POST['offer_valid_from'])));
        //$offer_valid_to    = date('Y-m-d', strtotime($this->filterInput($_POST['offer_valid_to'])));
        
        list($day,$month,$year) = explode("-",$_POST['offer_valid_from']);
		$startdate = $day.'-'.$month.'-'.$year;
        //echo $startdate."<br>";
        
        list($day,$month,$year) = explode("-",$_POST['offer_valid_to']);
		$enddate = $day.'-'.$month.'-'.$year;        
        
        $offer_valid_from = date('Y-m-d', strtotime($this->filterInput($startdate)));
		$offer_valid_to	  = date('Y-m-d', strtotime($this->filterInput($enddate)));

        
        $query = "INSERT INTO 
                            " . $CFG['table']['restaurant_offer'] . "
                        SET 
                            restaurant_id     = '" . $restaurant_name . "', 
                            offer_percentage  = '" . $this->filterInput($offer_percentage) . "',
                            offer_price       = '" . $this->filterInput($offer_price) . "', 
                            offer_valid_from  = '" . $offer_valid_from . "',
                            offer_valid_to    = '" . $offer_valid_to . "', 
                            addeddate         = '" . CUR_TIME . "'";
                            
       // echo $query."<br>";
        //exit ;                    
                            
        $res = $this->ExecuteQuery($query, "insert");
        
        if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
            $this->redirectUrl("restaurantOwnerMyaccount_offers.php");
		}else{
            $this->redirectUrl($CFG['site']['base_url'].'/restaurant-myaccount-offers');
		}
        
    }

    #-------------------------------------------------------------------------------
    #OffersList
    /**
     * Restaurant::restaurantEditOffers()
     * 
     * @return
     */
    function restaurantEditOffers($offerid)
    {
        global $CFG, $objSmarty;
        
        $sel = "SELECT offer_percentage, offer_price, offer_valid_from, offer_valid_to FROM " .$CFG['table']['restaurant_offer'] . " WHERE offer_id = '" . $this->filterInput($offerid) ."'";
        $res = $this->ExecuteQuery($sel, "select");
        //echo "<pre>"; print_r($res); echo "</pre>";
        $objSmarty->assign('offerValue',$res);
        
    }

    #-------------------------------------------------------------------------------
    #Offers Edit & Check Availability
    /**
     * Restaurant::offEdit()
     * 
     * @return
     */
    function offEdit()
    {
        global $CFG;
        
        $offer_id         = $this->filterInput($_POST['offerid']);
        $offer_percentage = $this->filterInput($_POST['offer_percentage']);
        $offer_price      = $this->filterInput($_POST['offer_price']);
       // $offer_valid_from = date('Y-m-d', strtotime($this->filterInput($_POST['offer_valid_from'])));
       // $offer_valid_to   = date('Y-m-d', strtotime($this->filterInput($_POST['offer_valid_to'])));
       
        list($day,$month,$year) = explode("-",$_POST['offer_valid_from']);
		$startdate = $day.'-'.$month.'-'.$year;
        //echo $startdate."<br>";
        
        list($day,$month,$year) = explode("-",$_POST['offer_valid_to']);
		$enddate = $day.'-'.$month.'-'.$year;        
        
        $offer_valid_from = date('Y-m-d', strtotime($this->filterInput($startdate)));
		$offer_valid_to	  = date('Y-m-d', strtotime($this->filterInput($enddate)));

        $qry = " UPDATE 
                        " . $CFG['table']['restaurant_offer'] . "
                    SET 
                        offer_percentage = '" . $this->filterInput($offer_percentage) . "', 
                        offer_price      = '" . $this->filterInput($offer_price) . "',
                        offer_valid_from = '" . $offer_valid_from . "', 
                        offer_valid_to   = '" . $offer_valid_to . "'
                    WHERE 
                        offer_id = '" . $offer_id . "' ";
        
        $res = $this->ExecuteQuery($qry, "update");
        
        if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
            $this->redirectUrl("restaurantOwnerMyaccount_offers.php");
		}else{
            $this->redirectUrl($CFG['site']['base_url'].'/restaurant-myaccount-offers');
		}
    }
    #CheckwithOffer Already Exist or not
     function offerAlreadyCheck(){
        
            global $CFG,$admin_smarty;
            
            //echo "<pre>";print_r($_POST);echo "</pre>";
                    
            $toDate     = $this->getValue('offer_valid_to', $CFG['table']['restaurant_offer'],
                    "restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) . "' AND status = '1' ");
            
            //$nowToDate  = strtotime($_POST['offer_valid_to']);
            //$toDate     = strtotime($toDate);
            list($day,$month,$year) = explode("-",$_POST['offer_valid_to']);
		    $enddate = $day.'-'.$month.'-'.$year;  
            $toDate     = strtotime($toDate);
            $nowToDate     = strtotime($enddate);
                    
            if($nowToDate < $toDate){
                echo "Already";
            }else{
                echo "Nooffer";
            }       
     }
     #
     function offerEditAlreadyCheck(){
        
          global $CFG,$admin_smarty;
          
          $toDate     = $this->getValue('offer_valid_to', $CFG['table']['restaurant_offer'],
                "restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) . "' AND status = '1' and offer_id != '".$_POST['offer_id']."' ");
        
            //$nowToDate  = strtotime($_POST['offer_valid_to']);
            //$toDate     = strtotime($toDate);
            list($month,$day,$year) = explode("-",$_POST['offer_valid_to']);
		    $enddate = $day.'-'.$month.'-'.$year;  
            $toDate     = strtotime($toDate);
            $nowToDate     = strtotime($enddate);
                    
            if($nowToDate < $toDate){
                echo "Already";
            }else{
                echo "Nooffer";
            }  
     }
    
   /* function checkOfferExist()
    {
        global $CFG;
        
        $restaurant_name  = $_SESSION['restaurantownerid'];
        $offer_percentage = $this->filterInput($_POST['offer_percentage']);
        $offer_price      = $this->filterInput($_POST['offer_price']);
        $offer_valid_from = date('Y-m-d', strtotime($this->filterInput($_POST['offer_valid_from'])));
        $offer_valid_to   = date('Y-m-d', strtotime($this->filterInput($_POST['offer_valid_to'])));
        
        if(isset($_POST['offerid']) && !empty($_POST['offerid'])){
            
            $cond = " AND offer_id != '".$_POST['offerid']."' ";
        }
        
        $noofrows = $this->getNumvalues($CFG['table']['restaurant_offer'],"restaurant_id = '" . $restaurant_name . "' AND offer_percentage ='" . $offer_percentage ."' AND offer_price ='" . $offer_price . "' AND offer_valid_from ='" . $offer_valid_from ."' AND 	offer_valid_to ='" . $offer_valid_to . "' ".$cond." ");

        if ($noofrows > 0)
        {
            echo "exist";
        }
    }*/
    

    #--------------------------------------------------------------------------------
    #  CATEGORY  MANAGEMENT START  #
    #--------------------------------------------------------------------------------
    #Category Add & Check Availability
    /*function categoryNew(){
    global $CFG;
    
    #echo "<pre>";print_r($_POST);echo "</pre>";
    #echo "<pre>";print_r($_SESSION);echo "</pre>";
    
    $restaurant_id = $_SESSION['restaurantownerid'];
    $maincatename   = $this->filterInput($_POST['maincatename']);
    $cateoption 	= $this->filterInput($_POST['cateoption']);
    
    $noofrows = $this->getNumvalues($CFG['table']['category_main'],"maincatename = '".$maincatename."' AND restaurant_id = '".$restaurant_name."' " );
    
    if($noofrows > 0){
    echo "exist";			
    }else{		
    $query = "INSERT INTO ".$CFG['table']['category_main']." SET restaurant_id = '".$restaurant_id."', maincatename = '".$maincatename."', maincat_option = '".$cateoption."', addeddate = NOW()";
    $res   = $this->ExecuteQuery($query, "insert");
    echo "insert";
    }	
    }*/
    /**
     * Restaurant::categoryNew()
     * 
     * @return
     */
    function categoryNew()
    {
        global $CFG;
        //echo "<pre>"; print_r($_POST); echo "</pre>";
        $restaurant_id = $this->filterInput($_SESSION['restaurantownerid']);
        $maincatename  = $this->filterInput($_POST['maincatename']);
        $cateoption    = $this->filterInput($_POST['maincat_option']);

        $query = "INSERT INTO  
                            ".$CFG['table']['category_main'] ." 
                        SET 
                            restaurant_id  = '" . $restaurant_id . "', 
                            maincatename   = '" . $this->filterInput($maincatename) ."', 
                            maincat_option = '" . $cateoption . "', 
                            addeddate      = '" . CUR_TIME . "'";
         //echo "Query-->". $query; exit;                  
        $res = $this->ExecuteQuery($query, "insert");
        //echo "insert";
        if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
            
            $this->redirectUrl("restaurantOwnerMyaccount_category.php");
		}else{
            $this->redirectUrl($CFG['site']['base_url'].'/restaurant-myaccount-category');
		}
        
    }

    #-------------------------------------------------------------------------------
    #CategoryEditList
    /**
     * Restaurant::restaurantEditCategorys()
     * 
     * @return
     */
    function restaurantEditCategorys($catid)
    {
        global $CFG, $objSmarty;
        
        $sel = " SELECT maincatename, maincat_option FROM " . $CFG['table']['category_main'] ." WHERE maincateid = '" . $this->filterInput($catid) . "'";
        $res = $this->ExecuteQuery($sel, "select");
        //echo "<pre>"; print_r($res); echo "</pre>";
        $objSmarty->assign('categoryValue',$res);
        //echo $res[0]['maincatename'] . "^^" . $res[0]['maincat_option'];
    }

    #Category Edit & Check Availability
    /**
     * Restaurant::categoryEdit()
     * 
     * @return
     */
    function categoryEdit()
    {
        global $CFG;
        //echo "<pre>"; print_r($_POST); echo "</pre>";
        $restaurant_name = $this->filterInput($_SESSION['restaurantownerid']);
        $maincatename    = $this->filterInput($_POST['maincatename']);
        $cateoption      = $this->filterInput($_POST['maincat_option']);
        
        $qry = "UPDATE 
                        " . $CFG['table']['category_main'] . " 
                    SET 
                        maincatename    = '" . $this->filterInput($maincatename) . "',
                        maincat_option  = '" . $cateoption . "' 
                    WHERE maincateid    = '" . $this->filterInput($_POST['catid']) . "'";
         //echo "Query-->". $qry; exit;  
        $res = $this->ExecuteQuery($qry, "update");
        
        if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
            
            $this->redirectUrl("restaurantOwnerMyaccount_category.php");
		}else{
            $this->redirectUrl($CFG['site']['base_url'].'/restaurant-myaccount-category');
		}

        //echo "update";
        
    }

    function checkCategoryExist()
    {
        global $CFG;
        //echo "<pre>"; print_r($_POST); echo "</pre>";
        $restaurant_name = $this->filterInput($_SESSION['restaurantownerid']);
        $maincatename    = $this->filterInput($_POST['maincatename']);
        $cateoption      = $this->filterInput($_POST['cateoption']);
        
        if(isset($_POST['catid']) && !empty($_POST['catid'])){
            
            $cond = " AND maincateid != '".$this->filterInput($_POST['catid'])."' ";
        }
        
        $noofrows = $this->getNumvalues($CFG['table']['category_main'],"maincatename = '" . $maincatename . "' AND maincateid != '" . $this->filterInput($_POST['catid']) ."' AND restaurant_id = '" . $restaurant_name . "' ");

        if ($noofrows > 0)
        {
            echo "exist";
        }
    }

    #-------------------------------------------------------------------------------------
    #Order View Full Details
    /**
     * Restaurant::viewOrderFullDetails()
     * 
     * @param mixed $orderid
     * @return
     */
    function viewOrderFullDetails($orderid)
    {
        global $CFG, $objSmarty;
        
        $sel_order = "SELECT ordergenerateid, orderid, restaurant_id, customername,customerlastname,  customeremail, customercellphone, customerlandline, deliverydoornumber, deliverystreet, deliverylandmark, deliveryarea, deliverycity, deliverystate, deliveryzip, deliverytype, ordertotalprice, offervalue, taxvalue, foodassoonas, deliverydate, deliverytime, instructions, status, orderdate, payment_type, deliveryamount, taxamount, offeramount, tipamount, ordersubtotal, payment_status, transaction_id,voucher_id,voucher_code,voucher_price, printer_sent, printer_response, printer_ack, printer_ack_msg, printer_res_deli_time FROM " .
            $CFG['table']['order'] . " WHERE orderid = '" . $this->filterInput($orderid) . "' ";
        $res_order = $this->ExecuteQuery($sel_order, 'select');
        #echo "<pre>";print_r($res_order);echo "</pre>";
        $deliverytype = $res_order[0]['deliverytype'];

        /*if(isset($res_order[0]['deliveryzip']) && !empty($res_order[0]['deliveryzip']))
        {
        foreach($res_order as $key=>$value){
        $res_order[$key]['deliveryzip'] = $this->GetValue("zipcode",$CFG['table']['zipcode'],"zipcode_id  = '".$res_order[0]['deliveryzip']."'");
        }
        }*/
        if (is_numeric($res_order[0]['deliverycity']))
        {
            foreach ($res_order as $key => $value)
            {
                $res_order[$key]['deliverycity'] = $this->GetValue("cityname", $CFG['table']['city'],"city_id = '" . $this->filterInput($res_order[0]['deliverycity']) . "'");
                $res_order[$key]['deliverystate'] = $this->GetValue("statename", $CFG['table']['state'],"statecode = '" . $this->filterInput($res_order[0]['deliverystate']) . "'");
            }
        }

        $restDetails = $this->GetMultivalue("restaurant_name,restaurant_salestax,restaurant_delivery_charge,restaurant_minorder_price,restaurant_delivery,restaurant_pickup, gprs_option",
            $CFG['table']['restaurant'], "restaurant_id = '" . $this->filterInput($res_order[0]['restaurant_id']) .
            "'");
        //if($restDetails[0]['restaurant_delivery'] == 'Yes' && $res_order[0]['deliverytype'] != 'pickup'){
        if ($res_order[0]['deliverytype'] != 'pickup')
        {
            $deliverychargeamt = $this->filterInput($res_order['0']['deliveryamount']);
        }

        $sel_cart = "SELECT cart_id, menuid, restaurantid, menuname, menutype, addonsname, addonsprice, menuprice, quantity, specialinstruction, tot_menuprice,pizza_size, pizza_crustname, pizza_crustprice, pizza_addonsname, pizza_addons_price FROM " .
            $CFG['table']['restaurant_cart'] . " WHERE orderid = '" . $this->filterInput($orderid) .
            "' AND quantity != '0' ";
        $res_cart = $this->ExecuteQuery($sel_cart, "select");

        if (count($res_cart) > 0)
        {
            foreach ($res_cart as $key => $value)
            {
                $res_cart[$key]['catid'] = $this->getValue("menu_category", $CFG['table']['restaurant_menu'],
                    "id = '" . $this->filterInput($res_cart[$key]['menuid']) . "'");
                $res_cart[$key]['catname'] = $this->getValue("maincatename", $CFG['table']['category_main'],
                    "maincateid = '" . $this->filterInput($res_cart[$key]['catid']) . "'");
                $rowTotal[] = $res_cart[$key]['tot_menuprice'];
            }
        }
        #echo "<pre>";print_r($res_cart);echo "</pre>";
        $orderSubTotal = $res_order['0']['ordersubtotal'];
        #$tax = $restDetails[0]['restaurant_salestax'];
        $tax = $res_order[0]['taxvalue'];
        if ($tax != '')
        {
            $taxamount = $res_order[0]['taxamount'];
        }

        $tipamt = $res_order[0]['tipamount'];
        if ($tipamt != '0.00')
        {
            $tipamount = $tipamt;
        }

        $offer_percentage = $res_order['0']['offervalue'];
        if (isset($offer_percentage) && !empty($offer_percentage))
        {

            $orderDiscountPrice = $res_order['0']['offeramount'];
        }
        /*if(!empty($deliverychargeamt))
        {
            $orderGrandTotal = ($res_order['0']['ordertotalprice']) + $deliverychargeamt;    
        } else {
            $orderGrandTotal = $res_order['0']['ordertotalprice'];   
        }*/
        $orderGrandTotal = $res_order['0']['ordertotalprice']; 
        
        if($res_order[0]['voucher_price'] != ''){
            //voucher_price
            $orderGrandTotal1 = ($orderGrandTotal-$res_order[0]['voucher_price']);
        }else{
            $orderGrandTotal1 = $orderGrandTotal;
        }
        $res_order[0]['orderdate'] = $this->setDateFormatWithTime($res_order[0]['orderdate']);
        $res_order[0]['deliverydate'] = $this->setDateFormatWithOutTime($res_order[0]['deliverydate']);
         #echo "<pre>";print_r($res_order);echo "</pre>";
        
        
        $objSmarty->assign('subtotal', number_format($orderSubTotal, 2));
        $objSmarty->assign('taxamount', number_format($taxamount, 2));
        $objSmarty->assign('total', $orderGrandTotal);
        $objSmarty->assign('orderDiscountPrice', number_format($orderDiscountPrice, 2));

        $objSmarty->assign('deliverycharge', $res_order['0']['deliveryamount']);
        $objSmarty->assign('res_salestax', $res_order[0]['taxvalue']);
        $objSmarty->assign('salestax', $res_order[0]['taxvalue']);
        $objSmarty->assign('tipamount', $tipamount);
        $objSmarty->assign('restaurantname', $restDetails[0]['restaurant_name']);
        $objSmarty->assign('minorderprice', $restDetails[0]['restaurant_minorder_price']);
        $objSmarty->assign('deliveryoption', $restDetails[0]['restaurant_delivery']);
        $objSmarty->assign('pickupoption', $restDetails[0]['restaurant_pickup']);
        $objSmarty->assign('gprsoption', $restDetails[0]['gprs_option']);
        $objSmarty->assign('deliverytype', $deliverytype);

        $objSmarty->assign('cartDetails', $res_cart);
        $objSmarty->assign('orderDetails', $res_order);
    }

    #........................................................................................
    #DELETE Restaurant Owner Photo's
    /**
     * Restaurant::resOwnerDelPhotos()
     * 
     * @return
     */
    function resOwnerDelPhotos()
    {
        global $CFG, $objSmarty;

        $tab_fieldname = "restaurant_photos" . $this->filterInput($_POST['fieldnumber']);
        $restaurantid = $this->filterInput($_SESSION['restaurantownerid']);

        $getphotoname = $this->GetValue($tab_fieldname, $CFG['table']['restaurant'],
            "restaurant_id = '" . $restaurantid . "' ");

        if ($getphotoname != '' && $tab_fieldname != '')
        {
            @unlink($CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $getphotoname);

            $query = "UPDATE " . $CFG['table']['restaurant'] . " SET " . $tab_fieldname .
                " = '' WHERE restaurant_id = '" . $restaurantid . "' ";
            $res = $this->ExecuteQuery($query, "update");

            echo 'success';
            exit;
        }
    }

    #Update Restaurant Owner Photo's
    /**
     * Restaurant::resOwnerUpdatePhotos()
     * 
     * @return
     */
    function resOwnerUpdatePhotos()
    {
        global $CFG, $objSmarty, $objThumb;

        $tab_fieldname = "restaurant_photos" . $this->filterInput($_POST['photonumber']);
        $photonumbers = $this->filterInput($_POST['photonumber']);
        $restaurantid = $this->filterInput($_SESSION['restaurantownerid']);
        $mode = $this->filterInput($_POST['mode']);
        
        if (isset($tab_fieldname) && !empty($tab_fieldname))
        {

            $getphotoname = $this->GetValue($tab_fieldname, $CFG['table']['restaurant'],
                "restaurant_id = '" . $restaurantid . "' ");

            if ($mode == 'modify')
            {
                if (!empty($getphotoname))
                {
                    @unlink($CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $getphotoname);
                }

                $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                    "restaurant_id = '" . $restaurantid . "'");

                $logoext = $this->getFileExtension($_FILES[$tab_fieldname]['name']);
                
                $logoname = $this->seoUrl($restname) . $this->filterInput($_POST['photonumber']) . time() . '.'  . $logoext ;
                $logoimage = "photo_" . $logoname;
                $dest_name = $CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $logoimage;

                $uploadsuccess = @move_uploaded_file($_FILES[$tab_fieldname]['tmp_name'], $dest_name);
                @chmod($dest_name, 0777);

                if ($uploadsuccess)
                {
                    #Get Thumbnail width & height
                    $restphotothumb = $this->iconSettingValues();

                    #Create Thumbnail
                    $sour_imagepath = $dest_name;
                    $photo = "thumb_" . $logoname;

                    $dest_imagepath = $CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $photo;
                    $objThumb->createThumb($sour_imagepath, $dest_imagepath, $restphotothumb['0']['restaurant_photo_thumb_width'],
                        $restphotothumb['0']['restaurant_photo_thumb_height'], 'crop');
                    unlink($dest_name);

                    $query = "UPDATE " . $CFG['table']['restaurant'] . " SET restaurant_photos$photonumbers = '" .
                        $photo . "' WHERE restaurant_id = '" . $restaurantid . "' ";
                    $res = $this->ExecuteQuery($query, "update");
                      if ($res){
                    
                            if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
                                $this->redirectUrl($CFG['site']['base_url'].'/restaurantOwnerMyaccount_setting.php#tabs|setting:details_photo');
                    		}else{
                                $this->redirectUrl($CFG['site']['base_url'].'/restaurant-myaccount-setting#tabs|setting:details_photo');
                    		}
                        }
                }
            } else
            {
                $file_fieldname = "restaurant_photo" . $this->filterInput($_POST['photonumber']);
                
                if (isset($tab_fieldname) && !empty($tab_fieldname))
                {

                    $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                        "restaurant_id = '" . $restaurantid . "'");
                    
                    $logoext = $this->getFileExtension($_FILES[$file_fieldname]['name']);
                    $logoname = $this->seoUrl($restname) . $this->filterInput($_POST['photonumber']). time() . '.' . $logoext;
                    $logoimage = "photo_" . $logoname;
                    $dest_name = $CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $logoimage;

                    $uploadsuccess = @move_uploaded_file($_FILES[$file_fieldname]['tmp_name'], $dest_name);
                    @chmod($dest_name, 0777);

                    if ($uploadsuccess)
                    {
                        #Get Thumbnail width & height
                        $restphotothumb = $this->iconSettingValues();

                        #Create Thumbnail
                        $sour_imagepath = $dest_name;
                        $photo = "thumb_" . $logoname;

                        $dest_imagepath = $CFG['site']['photo_restaurant_path'] . '/photos' . '/' . $photo;
                        $objThumb->createThumb($sour_imagepath, $dest_imagepath, $restphotothumb['0']['restaurant_photo_thumb_width'],
                            $restphotothumb['0']['restaurant_photo_thumb_height'], 'crop');

                        @unlink($dest_name);

                        $query = "UPDATE " . $CFG['table']['restaurant'] . " SET restaurant_photos$photonumbers = '" .
                            $photo . "' WHERE restaurant_id = '" . $restaurantid . "' ";
                          
                        $res = $this->ExecuteQuery($query, "update");
                         if ($res){
                    
                            if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
                                $this->redirectUrl($CFG['site']['base_url'].'/restaurantOwnerMyaccount_setting.php#tabs|setting:details_photo');
                    		}else{
                                $this->redirectUrl($CFG['site']['base_url'].'/restaurant-myaccount-setting#tabs|setting:details_photo');
                    		}
                        }
                        
                    }
                }
            }

        }
    }
    #----------------------------------------------------------------------------------------------
    # Restaurant Logo Start #
    #----------------------------------------------------------------------------------------------
    #Add Restaurant Owner Photo's.
    /**
     * Restaurant::resOwnerAddLogo()
     * 
     * @return
     */
    function resOwnerAddLogo()
    {
        global $CFG, $objSmarty, $objThumb;

        $restaurantid = $this->filterInput($_SESSION['restaurantownerid']);
        $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
            "restaurant_id = '" . $restaurantid . "'");
        
        $imagesizedata = getimagesize($_FILES['restaurant_log']['tmp_name']);
        if (isset($_FILES['restaurant_log']['name']) && !empty($_FILES['restaurant_log']['name']) && $imagesizedata == TRUE)
        {

            $logoext = $this->getFileExtension($_FILES['restaurant_log']['name']);
            $logoname = $this->seoUrl($restname) .time(). "." . $logoext;
            $logoimage = "logo_" . $logoname;
            $dest_name = $CFG['site']['photo_restaurant_path'] . '/logo' . '/' . $logoimage;

            $uploadsuccess = @move_uploaded_file($_FILES['restaurant_log']['tmp_name'], $dest_name);
            @chmod($dest_name, 0777);

            if ($uploadsuccess)
            {
                #Get Thumbnail width & height
                $restlogothumb = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath = $dest_name;
                $logo = "logo_thumb_" . $logoname;

                $dest_imagepath = $CFG['site']['photo_restaurant_path'] . '/logo' . '/' . $logo;
                $objThumb->createThumb($sour_imagepath, $dest_imagepath, $restlogothumb['0']['restaurant_logo_thumb_width'],
                    $restlogothumb['0']['restaurant_logo_thumb_height'], 'crop');

                @unlink($dest_name);

                $query = "UPDATE " . $CFG['table']['restaurant'] . " SET restaurant_logo = '" .
                    $logo . "' WHERE restaurant_id = '" . $restaurantid . "' ";
                $res = $this->ExecuteQuery($query, "update");
                if ($res){
                    
                    if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
                         $this->redirectUrl($CFG['site']['base_url'].'/restaurantOwnerMyaccount_setting.php#tabs|setting:details_photo');
            		}else{
                        $this->redirectUrl($CFG['site']['base_url'].'/restaurant-myaccount-setting#tabs|setting:details_photo');
            		}
                }
                    
            }
        }
    }
    #Restaurant Logo
    /**
     * Restaurant::resOwnerUpdateLogo()
     * 
     * @return
     */
    function resOwnerUpdateLogo()
    {

        global $CFG, $objSmarty, $objThumb;

        $restaurantid = $this->filterInput($_SESSION['restaurantownerid']);
        $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
            "restaurant_id = '" . $restaurantid . "'");
        
        $imagesizedata = getimagesize($_FILES['restaurant_logo']['tmp_name']);
        if (isset($_FILES['restaurant_logo']['name']) && !empty($_FILES['restaurant_logo']['name']) && $imagesizedata == TRUE)
        {

            $getlogoname = $this->GetValue("restaurant_logo", $CFG['table']['restaurant'],
                "restaurant_id = '" . $restaurantid . "' ");
            if (!empty($getlogoname))
            {
                @unlink($CFG['site']['photo_restaurant_path'] . '/logo/' . $getlogoname);
            }

            $logoext = $this->getFileExtension($_FILES['restaurant_logo']['name']);
            $logoname = $this->seoUrl($restname) .time(). "." . $logoext;
            $logoimage = "logo_" . $logoname;
            $dest_name = $CFG['site']['photo_restaurant_path'] . '/logo/' . $logoimage;

            $uploadsuccess = @move_uploaded_file($_FILES['restaurant_logo']['tmp_name'], $dest_name);
            @chmod($dest_name, 0777);

            if ($uploadsuccess)
            {
                #Get Thumbnail width & height
                $restlogothumb = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath = $dest_name;
                $logo = "logo_thumb_" . $logoname;

                $dest_imagepath = $CFG['site']['photo_restaurant_path'] . '/logo/' . $logo;
                $objThumb->createThumb($sour_imagepath, $dest_imagepath, $restlogothumb['0']['restaurant_logo_thumb_width'],
                    $restlogothumb['0']['restaurant_logo_thumb_height'], 'crop');

                @unlink($dest_name);

                $query = "UPDATE " . $CFG['table']['restaurant'] . " SET restaurant_logo = '" .
                    $logo . "' WHERE restaurant_id = '" . $restaurantid . "' ";
                $res = $this->ExecuteQuery($query, "update");
                if ($res){
                    if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
                        $this->redirectUrl($CFG['site']['base_url'].'/restaurantOwnerMyaccount_setting.php#tabs|setting:details_photo');
            		}else{
                        $this->redirectUrl($CFG['site']['base_url'].'/restaurant-myaccount-setting#tabs|setting:details_photo');
            		}
                }
                    
            }
        }
    }
    #DELETE Restaurant Logo
    /**
     * Restaurant::resOwnerDelLogo()
     * 
     * @return
     */
    function resOwnerDelLogo()
    {
        global $CFG, $objSmarty;

        $restaurantid = $this->filterInput($_SESSION['restaurantownerid']);

        $getlogoname = $this->GetValue("restaurant_logo", $CFG['table']['restaurant'],
            "restaurant_id = '" . $restaurantid . "' ");

        if ($getlogoname != '' && $restaurantid != '')
        {

            @unlink($CFG['site']['photo_restaurant_path'] . '/logo/' . $getlogoname);

            $query = "UPDATE " . $CFG['table']['restaurant'] .
                " SET restaurant_logo = '' WHERE restaurant_id = '" . $restaurantid . "' ";
            $res = $this->ExecuteQuery($query, "update");

            echo 'success';
            exit;
        }
    }
    #----------------------------------------------------------------------------------------------
    # Restaurant Banner Start #
    #----------------------------------------------------------------------------------------------
    #Add Restaurant Owner Banner
    /**
     * Restaurant::resOwnerAddBanner()
     * 
     * @return
     */
    function resOwnerAddBanner()
    {
        global $CFG, $objSmarty, $objThumb;

        $restaurantid = $this->filterInput($_SESSION['restaurantownerid']);
        $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
            "restaurant_id = '" . $restaurantid . "'");
        
        $imagesizedata = getimagesize($_FILES['restaurant_bann']['tmp_name']);
        if (isset($_FILES['restaurant_bann']['name']) && !empty($_FILES['restaurant_bann']['name']) && $imagesizedata == TRUE)
        {

            $logoext = $this->getFileExtension($_FILES['restaurant_bann']['name']);
            $logoname = $this->seoUrl($restname) . "." . $logoext;
            $logoimage = "logo_" . $logoname;
            $dest_name = $CFG['site']['photo_restaurant_path'] . '/banner/' . $logoimage;

            $uploadsuccess = @move_uploaded_file($_FILES['restaurant_bann']['tmp_name'], $dest_name);
            @chmod($dest_name, 0777);

            if ($uploadsuccess)
            {
                #Get Thumbnail width & height
                $restlogothumb = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath = $dest_name;
                $banner = "thumb_" . $logoname;

                $dest_imagepath = $CFG['site']['photo_restaurant_path'] . '/banner/' . $banner;
                $objThumb->createThumb($sour_imagepath, $dest_imagepath, $restlogothumb['0']['marketbanner_width'],
                    $restlogothumb['0']['marketbanner_height'], 'crop');

                @unlink($dest_name);

                $query = "UPDATE " . $CFG['table']['restaurant'] .
                    " SET res_marketbanner_img_code = '" . $banner . "' WHERE restaurant_id = '" . $restaurantid .
                    "' ";
                $res = $this->ExecuteQuery($query, "update");

                if ($res){
                    if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
                        $this->redirectUrl($CFG['site']['base_url'].'/restaurantOwnerMyaccount_setting.php#tabs|setting:details_photo');
            		}else{
                        $this->redirectUrl($CFG['site']['base_url'].'/restaurant-myaccount-setting#tabs|setting:details_photo');
            		}
                }
                   
            }
        }
    }
    #Restaurant Banner
    /**
     * Restaurant::resOwnerUpdateBanner()
     * 
     * @return
     */
    function resOwnerUpdateBanner()
    {
        global $CFG, $objSmarty, $objThumb;

        #echo "<pre>";print_r($_FILES);echo "</pre>";exit;

        $restaurantid = $this->filterInput($_SESSION['restaurantownerid']);
        $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
            "restaurant_id = '" . $restaurantid . "'");
        
        $imagesizedata = getimagesize($_FILES['restaurant_banner']['tmp_name']);
        if (isset($_FILES['restaurant_banner']['name']) && !empty($_FILES['restaurant_banner']['name']) && $imagesizedata == TRUE)
        {
            $getbannername = $this->GetValue("res_marketbanner_img_code", $CFG['table']['restaurant'],
                "restaurant_id = '" . $restaurantid . "' ");
            if (!empty($getbannername))
            {
                @unlink($CFG['site']['photo_restaurant_path'] . '/banner/' . $getbannername);
            }

            $logoext = $this->getFileExtension($_FILES['restaurant_banner']['name']);
            $logoname = $this->seoUrl($restname) . "." . $logoext;
            $logoimage = "logo_" . $logoname;
            $dest_name = $CFG['site']['photo_restaurant_path'] . '/banner/' . $logoimage;

            $uploadsuccess = @move_uploaded_file($_FILES['restaurant_banner']['tmp_name'], $dest_name);
            @chmod($dest_name, 0777);

            if ($uploadsuccess)
            {
                #Get Thumbnail width & height
                $restlogothumb = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath = $dest_name;
                $banner = "thumb_" . $logoname;

                $dest_imagepath = $CFG['site']['photo_restaurant_path'] . '/banner/' . $banner;
                $objThumb->createThumb($sour_imagepath, $dest_imagepath, $restlogothumb['0']['marketbanner_width'],
                    $restlogothumb['0']['marketbanner_height'], 'crop');

                @unlink($dest_name);

                $query = "UPDATE " . $CFG['table']['restaurant'] .
                    " SET res_marketbanner_img_code = '" . $banner . "' WHERE restaurant_id = '" . $restaurantid .
                    "' ";
                $res = $this->ExecuteQuery($query, "update");
                if ($res){
                    if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
                        $this->redirectUrl($CFG['site']['base_url'].'/restaurantOwnerMyaccount_setting.php#tabs|setting:details_photo');
            		}else{
                        $this->redirectUrl($CFG['site']['base_url'].'/restaurant-myaccount-setting#tabs|setting:details_photo');
            		}
                }
                    
            }
        }
        #}
    }
    #DELETE Restaurant Banner
    /**
     * Restaurant::resOwnerDelBanner()
     * 
     * @return
     */
    function resOwnerDelBanner()
    {
        global $CFG, $objSmarty;

        $restaurantid = $this->filterInput($_SESSION['restaurantownerid']);

        $getbannername = $this->GetValue("res_marketbanner_img_code", $CFG['table']['restaurant'],
            "restaurant_id = '" . $restaurantid . "' ");

        if ($getbannername != '' && $restaurantid != '')
        {
            @unlink($CFG['site']['photo_restaurant_path'] . '/banner/' . $getbannername);

            $query = "UPDATE " . $CFG['table']['restaurant'] .
                " SET res_marketbanner_img_code = '' WHERE restaurant_id = '" . $restaurantid .
                "' ";
            $res = $this->ExecuteQuery($query, "update");
            echo 'success';
            exit;
        }
    }
    #------------------------------------------------------------------------------------
    #Common Method Start
    #------------------------------------------------------------------------------------
    #change status
    /**
     * Restaurant::changeStatusResMyaccount()
     * 
     * @param mixed $tablename
     * @param mixed $fieldname_status
     * @param mixed $fieldname_updateid
     * @return
     */
    function changeStatusResMyaccount($tablename, $fieldname_status, $fieldname_updateid)
    {
        global $CFG, $objSmarty;

        $chgevalue = trim($this->filterInput($_POST['chgeval']));
        $mid = trim($this->filterInput($_POST['mid']));

        if (isset($mid) && !empty($mid) && ($chgevalue == '1' || $chgevalue == '0' || $chgevalue ==
            'Yes' || $chgevalue == 'No'))
        {

            $sel_up = "UPDATE " . $tablename . " SET " . $fieldname_status . " = '" . $chgevalue .
                "' WHERE " . $fieldname_updateid . " = '" . $mid . "' ";
            $res_up = $this->ExecuteQuery($sel_up, 'update');
        } elseif (isset($mid) && !empty($mid) && ($chgevalue == 'delete'))
        {

            $sql_cat = "DELETE FROM " . $tablename . " WHERE " . $fieldname_updateid .
                " = '" . $mid . "' LIMIT 1";
            $res_cat = $this->ExecuteQuery($sql_cat, 'delete');
        }
    }
    
    
    function changeStatus()
    {
        global $CFG, $objSmarty;
        //echo "<pre>"; print_r($_POST); echo "</pre>"; exit;
        $chgevalue          = trim($this->filterInput($_POST['chgeval']));
        $mid                = trim($this->filterInput($_POST['mid']));
        $tablename          = trim($this->filterInput($_POST['table']));
        $fieldname_status   = trim($this->filterInput($_POST['fieldname']));
        $fieldname_updateid =  trim($this->filterInput($_POST['whereField']));
        

        if (isset($mid) && !empty($mid) && ($chgevalue == '1' || $chgevalue == '0' || $chgevalue =='Yes' || $chgevalue == 'No'))
        {

            $sel_up = "UPDATE " . $tablename . " SET " . $fieldname_status . " = '" . $chgevalue ."' WHERE " . $fieldname_updateid . " = '" . $mid . "' ";
            //echo 'Query-->'.$sel_up;
            $res_up = $this->ExecuteQuery($sel_up, 'update');
            //echo "<pre>"; print_r($res_up); echo "</pre>"; //exit;
            if($res_up){
                
                echo 'success';
            }
            
        } elseif (isset($mid) && !empty($mid) && ($chgevalue == 'delete'))
        {

            $sql_cat = "DELETE FROM " . $tablename . " WHERE " . $fieldname_updateid ." = '" . $mid . "' LIMIT 1";
            $res_cat = $this->ExecuteQuery($sql_cat, 'delete');
            
            if($res_cat){
                
                echo 'success';
            }
        }
    }
    #-----------------------------------------------------------------------------------------------
    /**
     * Restaurant::checkCategoryName()
     * 
     * @return
     */
    function checkCategoryName()
    {
        global $CFG, $objSmarty;
        //echo"<pre>";print_r($_POST);echo"</pre>";
        $getcatname = $this->GetValue("maincatename", $CFG['table']['category_main'],
            "maincateid = '" . $this->filterInput($_POST['catid']) . "' ");
        echo strtolower($getcatname);
    }
    /**
     * Restaurant::checkCategoryName1()
     * 
     * @return
     */
    function checkCategoryName1()
    {
        global $CFG, $objSmarty;

        $getcatname = $this->GetValue("maincatename", $CFG['table']['category_main'],
            "maincateid = '" . $this->filterInput($_POST['menu_category']) . "' ");
        echo strtolower($getcatname);
    }
    #------------------------------------------------------------------------------------
    #Payment Method List
    /**
     * Restaurant::paymentMethodList()
     * 
     * @return
     */
    function paymentMethodList()
    {
        global $CFG, $objSmarty;

        $resid = $this->filterInput($_SESSION['restaurantownerid']);

        $sql_sel = "SELECT paymentinfo_id, paymentinfo_name, paymentinfo_photo, paymentinfo_status, addeddate FROM " .
            $CFG['table']['paymentinfo'] .
            " WHERE paymentinfo_status = '1' AND paymentinfo_id IS NOT NULL ORDER BY paymentinfo_name ASC";
        $res = $this->ExecuteQuery($sql_sel, 'select');
        
        
        foreach ($res as $key => $value)
        {
            $res[$key]['paymentmethod'] = $this->getValue("paymentmethod", $CFG['table']['restaurant_choose_paymentoption'],
                "paymentoption = '" . $this->filterInput($res[$key]['paymentinfo_id']) . "' AND restaurant_id = '" .
                $resid . "'");
                
        }
        $objSmarty->assign("searchrestaurantDetailsPaymethod", $res);
    }
    #--------------------------------------------------------------------------------
    #Select payment method option
    /**
     * Restaurant::selectpaymentMethod()
     * 
     * @param mixed $tablename
     * @return
     */
    function selectpaymentMethod($tablename)
    {
        global $CFG, $objSmarty;

        $resid = $this->filterInput($_SESSION['restaurantownerid']);

        if ($_POST['chgeval'] == 'Yes')
        {

            $ins = "INSERT INTO 
								" . $tablename . " 
							SET 
								restaurant_id = '" . $resid . "',
								paymentoption = '" . $this->filterInput($_POST['mid']) . "',
								paymentmethod = '" . $this->filterInput($_POST['chgeval']) . "',
								addeddate     = '" . CUR_TIME . "' ";
            $res = $this->ExecuteQuery($ins, 'insert');
        } else
        {
            $del = "DELETE FROM " . $tablename . " WHERE restaurant_id = '" . $resid .
                "' AND paymentoption = '" . $this->filterInput($_POST['mid']) . "'";
            $res = $this->ExecuteQuery($del, 'delete');
        }
    }
    #------------------------------------------------------------------------------------
    #Site Feedback
    /**
     * Restaurant::resOwnerSiteFeedback()
     * 
     * @return
     */
    function resOwnerSiteFeedback()
    {
        global $CFG, $objSmarty;
        $resid = $this->filterInput($_SESSION['restaurantownerid']);

        $getresdet = $this->getMultivalue("restaurant_name,restaurant_city", $CFG['table']['restaurant'], "restaurant_id = '" . $resid . "'");
            
        $res_name  = addslashes($this->filterInput($getresdet[0]['restaurant_name']));
        $resCity   = addslashes($this->filterInput($getresdet[0]['restaurant_city']));
        $City = $this->getValue("cityname", $CFG['table']['city'], " city_id = '".$resCity."'" );
        $res_email = $getresdet[0]['restaurant_contact_email'];

        $ins = "INSERT INTO 
							" . $CFG['table']['sitefeedback'] . " 
						SET 
							restaurantname  = '".$resid."',
                            restaurantcity  = '".$City."',
							feedback        = '".$this->filterInput(addslashes($this->filterInput($_POST['feedback'])))."',
                            status          = '0',
							addeddate       = '" . CUR_TIME . "' ";
        $res = $this->ExecuteQuery($ins, 'insert');
        echo "insert";
    }
    #-----------------------------------------------------------------------------------
    #Site Feedback List
    /**
     * Restaurant::siteFeedbackList()
     * 
     * @return
     */
    function siteFeedbackList()
    {
        global $CFG, $objSmarty;

        $sel = " SELECT " . " rs.restaurant_name, rs.restaurant_id, rs.restaurant_seourl, cty.cityname, sitefeed.feedback " .
            " FROM " . $CFG['table']['sitefeedback'] . " AS sitefeed " . " LEFT JOIN " . $CFG['table']['restaurant'] .
            " AS rs ON sitefeed.restaurantname = rs.restaurant_id " . " LEFT JOIN " . $CFG['table']['city'] .
            " AS cty  ON cty.city_id = rs.restaurant_city " .
            " WHERE sitefeed.status = '1' AND rs.restaurant_status ='1' AND rs.delete_status = 'No' ORDER BY RAND() ";
        $res = $this->ExecuteQuery($sel, 'select');
        
        //echo $sel;
        
        //echo "<pre>";print_r($res);echo "</pre>";

        $objSmarty->assign("sitefeedbacklist", $res);
        $objSmarty->assign("sitefeedbackcnt", count($res));
    }

    #------------------------------------------------------------------------------------
    #bookingsList:
    /**
     * Restaurant::bookingsList()
     * 
     * @return
     */
    function bookingsList()
    {
        global $CFG, $objSmarty;


        $resid = $this->filterInput($_SESSION['restaurantownerid']);

        #Sort By
        if (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']) && $_REQUEST['sortbystatus'] ==
            'accept')
        {
            $condition .= " AND bookingstatus = 'accept'";
        } elseif (isset($_REQUEST['sortbystatus']) && !empty($_REQUEST['sortbystatus']) &&
        $_REQUEST['sortbystatus'] == 'reject')
        {
            $condition .= " AND bookingstatus = 'reject'";
        }

        #Pagination
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']))
        {
            $limit = $_REQUEST['limit'];
            $fields .= "&limit=" . $_REQUEST['limit'];
        } else
        {
            $limit = USERPAGELIMIT;
        }

        $page = $_REQUEST['page'];

        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;
        if (($_REQUEST['limit'] <> "") && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = " $start, $limit";
        }

        $sql_ord = "SELECT id,bookinggenerateid, num_guests, booking_date, booking_time, restaurant_id, booking_name, booking_email, booking_mobileno, addeddate, bookingstatus,status
				   	 FROM " . $CFG['table']['restaurant_booking'] .
            "  WHERE restaurant_id = '" . $resid . "' " . $condition . " ORDER BY id DESC ";
        $total_pages = $this->ExecuteQuery($sql_ord, 'norows');

        $targetpage = ",'Bookings'";
        $sortbystatus = ",'$_REQUEST[sortbystatus]'";
        $next_page = $this->make_page_usersideAjax_myaccount($targetpage, $total_pages,
            $limit, $page, $fields, $sortbystatus);

        $sql_limit = $sql_ord . " LIMIT " . $sql_lim;
        $res_ord = $this->ExecuteQuery($sql_limit, 'select');
        

        if ($total_pages > 0)
        {
            foreach ($res_ord as $key => $value)
            {
                $res_ord[$key]['sno'] = (($page - 1) * $limit) + ($key + 1);
                $res_ord[$key]['booking_date'] = $this->setDateFormatWithOutTime($res_ord[$key]['booking_date']);
                $res_ord[$key]['addeddate'] = $this->setDateFormatWithTime($res_ord[$key]['addeddate']);
            }
        }

        //$tot_ord  		 = $this->ExecuteQuery($sql_ord,'select');
        $tot_ord = $this->getNumvalues($CFG['table']['restaurant_booking'], "restaurant_id = '" . $resid . "' ");
        /*$tot_active = $this->getNumvalues($CFG['table']['restaurant_booking'], "restaurant_id = '" . $resid . "' AND status = '1' ");
        $tot_deactive = $this->getNumvalues($CFG['table']['restaurant_booking'], "restaurant_id = '" . $resid . "' AND status = '0' ");*/
        $tot_accept = $this->getNumvalues($CFG['table']['restaurant_booking'], "restaurant_id = '" . $resid . "' AND bookingstatus = 'accept' ");
        $tot_reject = $this->getNumvalues($CFG['table']['restaurant_booking'], "restaurant_id = '" . $resid . "' AND bookingstatus = 'reject' ");

        $objSmarty->assign("ordersListCnt", count($res_ord));
        $objSmarty->assign("ordersList", $res_ord);
        /*$objSmarty->assign("orderActive", $tot_active);
        $objSmarty->assign("orderDeactive", $tot_deactive);*/
        $objSmarty->assign("orderAccept", $tot_accept);
        $objSmarty->assign("orderReject", $tot_reject);
        $objSmarty->assign("pagination", $next_page);
        $objSmarty->assign("fields", $fields);

        #Statistics
        #$objSmarty->assign("ordersList_orderCnt", count($tot_ord));
        $objSmarty->assign("ordersList_orderCnt", $tot_ord);
    }

    #-------------------------------------------------------------------------------------
    #Booking View Full Details
    /**
     * Restaurant::viewBookingFullDetails()
     * 
     * @param mixed $id
     * @return
     */
    function viewBookingFullDetails($id)
    {
        global $CFG, $objSmarty;

        $sel_order = "SELECT id, num_guests, booking_date, booking_time, restaurant_id, booking_name, booking_email,booking_instruction, booking_mobileno, addeddate, status
				   	 FROM " . $CFG['table']['restaurant_booking'] . " WHERE id = '" . $id .
            "' ";
        $res_order = $this->ExecuteQuery($sel_order, 'select');
        //$deliverytype = $res_order[0]['deliverytype'];
        foreach ($res_order as $key1 => $value)
        {
            //$res_order[$key1]['deliverystate'] = $this->getValue("statename",$CFG['table']['state'],"state_id = '".$res_order[$key1]['deliveryarea']."'");
            //$res_order[$key1]['deliverycity']  = $this->getValue("cityname",$CFG['table']['city'],"city_id = '".$res_order[$key1]['deliverycity']."'");
        }

        $restDetails = $this->GetMultivalue("restaurant_name,restaurant_salestax,restaurant_delivery_charge,restaurant_minorder_price,restaurant_delivery,restaurant_pickup",
            $CFG['table']['restaurant'], "restaurant_id = '" . $this->filterInput($res_order[0]['restaurant_id']) .
            "'");
        if ($restDetails[0]['restaurant_delivery'] == 'Yes' && $res_order[0]['deliverytype'] !=
            'pickup')
        {
            $deliverychargeamt = $restDetails[0]['restaurant_delivery_charge'];
        }

        $objSmarty->assign('subtotal', number_format($orderSubTotal, 2));
        $objSmarty->assign('taxamount', number_format($taxamount, 2));
        $objSmarty->assign('total', $orderGrandTotal);
        $objSmarty->assign('orderDiscountPrice', number_format($orderDiscountPrice, 2));

        $objSmarty->assign('deliverycharge', $restDetails[0]['restaurant_delivery_charge']);
        $objSmarty->assign('res_salestax', $restDetails[0]['restaurant_salestax']);
        $objSmarty->assign('salestax', $restDetails[0]['restaurant_salestax']);
        $objSmarty->assign('restaurantname', $restDetails[0]['restaurant_name']);
        $objSmarty->assign('minorderprice', $restDetails[0]['restaurant_minorder_price']);
        $objSmarty->assign('deliveryoption', $restDetails[0]['restaurant_delivery']);
        $objSmarty->assign('pickupoption', $restDetails[0]['restaurant_pickup']);
        $objSmarty->assign('deliverytype', $deliverytype);

        $objSmarty->assign('cartDetails', $res_cart);
        $objSmarty->assign('orderDetails', $res_order);
    }

    #---------------------------------------------------------------------------------
    #change order status
    /**
     * Restaurant::invoiceChangeStatus()
     * 
     * @return
     */
    function invoiceChangeStatus()
    {
        global $CFG, $objSmarty;

        if (isset($_POST['invoiceid']) && !empty($_POST['invoiceid']))
        {

            $sel_upd = "UPDATE " . $CFG['table']['invoice'] . " SET invoice_status = '" . $this->filterInput($_POST['val']) .
                "' WHERE invoice_id = '" . $this->filterInput($_POST['invoiceid']) . "'";
            $res_upd = $this->ExecuteQuery($sel_upd, 'update');
            //echo 'success';
        }
    }
    //------------------------------based on map function------------------------------------------
    /**
     * Restaurant::mapInfoUpdate()
     * 
     * @return
     */
    function mapInfoUpdate()
    {
        global $CFG, $objSmarty;

        $update = "UPDATE " . $CFG['table']['restaurant'] .
            " SET restaurant_delivery_distance = '" . $this->filterInput($_REQUEST['restaurant_delivery_distance']) .
            "' WHERE restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) . "'";
        $res = $this->ExecuteQuery($update, "update");
    }

    //------------------------------------------restaurant register
    #Acount acctivation throught the email
    /**
     * Restaurant::restaurantResetPassword()
     * 
     * @param mixed $email
     * @return
     */
    function restaurantResetPassword($email)
    {
        global $CFG, $objSmarty;

        $this->email = base64_decode($email);
        $num_email = $this->getNumvalues($CFG['table']['restaurant'], "restaurant_contact_email = '" . $this->email . "' ");
        $password = $this->filterInput($_REQUEST['restaurant_resetpassword']);
        $customer_resetpass = $this->encrypt_password_md5($password);

        if ($num_email == '1')
        {
            $status = $this->getValue("restaurant_status", $CFG['table']['restaurant'], "restaurant_contact_email = '" . $this->email . "'");
            $deletestatus = $this->getValue("delete_status", $CFG['table']['restaurant'], "restaurant_contact_email = '" . $this->email . "'");
            if ($deletestatus == 'No')
            {
                if ($status == '1')
                {
                    $inssql = "UPDATE " . $CFG['table']['restaurant'] . " SET restaurant_password = '" . $customer_resetpass . "' WHERE restaurant_contact_email = '" . $this->email . "'";
                    $ressql = $this->ExecuteQuery($inssql, "update");
                    $msg = "Success";
                    $objSmarty->assign("message", "Your password is reset successfully! Login your account.");
                    $url = 'restaurantOwnerLogin.php?msg=' . $msg;
                    
                    if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
                        
                        $this->redirectUrl($CFG['site']['base_url'].'/'.$url);
            		}else{
                        $this->redirectUrl($CFG['site']['base_url'].'/restaurant-login/msg');
            		}
                    
                } elseif ($status == '2')
                {
                    $msg = "Pending";
                    $url = 'restaurantResetPassword.php?msg=' . $msg;
                    
                    if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
                        $this->redirectUrl($CFG['site']['base_url'].'/' . $url);
            		}else{
                        $this->redirectUrl($CFG['site']['base_url'].'/restaurant-reset-password/msg');
            		}
                    
                } elseif ($status == '0')
                {
                    $msg = "Deactive";
                    $url = 'restaurantResetPassword.php?msg=' . $msg;
                    
                    if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
                        $this->redirectUrl($CFG['site']['base_url'].'/' . $url);
            		}else{
                        $this->redirectUrl($CFG['site']['base_url'].'/restaurant-reset-password/msg');
            		}
                    
                }
            } elseif ($deletestatus == 'Yes')
            {
                $msg = "Deleted";
                $url = 'restaurantResetPassword.php?msg=' . $msg;
                
                if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
                    $this->redirectUrl($CFG['site']['base_url'].'/' . $url);
        		}else{
                    $this->redirectUrl($CFG['site']['base_url'].'/restaurant-reset-password/msg');
        		}
                
            }

        } else
        {
            $msg = "Fail";
            $url = 'restaurantResetPassword.php?msg=' . $msg;
            
            if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
                $this->redirectUrl($CFG['site']['base_url'].'/' . $url);
    		}else{
                $this->redirectUrl($CFG['site']['base_url'].'/restaurant-reset-password/msg');
    		}
            
        }
        //$this->redirectUrl($CFG['site']['base_url'] . '/' . $url);
    }
    
     #------------------------------ Restauarnt Set Open/Close Status ---------------------------------
    function restaurantSetStatus(){
        global $CFG,$objSmarty;
        
        
        $setrest_status = $this->filterInput($_POST['status']);
        $setcurrenttime = date("H:i");
		
		$upd_rest = "UPDATE  
    						".$CFG['table']['restaurant']."
    				    SET
                            restaurant_set_status          = '".$setrest_status."',
                            restaurant_set_time            = '".$setcurrenttime."'
    					WHERE 
                            restaurant_id = '".$this->filterInput($_SESSION['restaurantownerid'])."' ";
        //echo $upd_rest;
		$upd_res_rest = $this->ExecuteQuery($upd_rest,'update');
        
        echo 'success';
    }
    #---------------------------------------------------------------------------------------
    #Restaurant Myaccount Info
    /**
     * Restaurant::editCommissionInfo()
     * 
     * @return
     */
    function editCommissionInfo()
    {
        global $CFG, $objSmarty;

        $restaurant_commission  = $this->filterInput($_REQUEST['restaurant_commission']);

        $upd_rest_commission = "UPDATE  
								" . $CFG['table']['restaurant'] . "
						       SET
						    	restaurant_commission		= '" . $this->filterInput($restaurant_commission) .
                 "'
						  	   WHERE restaurant_id = '" . $this->filterInput($_SESSION['restaurantownerid']) . "' ";
        $upd_res_rest = $this->ExecuteQuery($upd_rest_commission, 'update');
        echo 'success';

    }

} #End of class


?>