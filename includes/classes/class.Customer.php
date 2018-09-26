<?php

/*	Class Function for Restaurant ADMIN RESTAURANT MANAGEMENT	*/

/**
 * Customer
 * 
 * @package   
 * @author 
 * @copyright gencyolcu
 * @version 2014
 * @access public
 */
class Customer extends Site
{

    var $customername;
    var $customerlastname;
    var $customerstreet;
    var $customerbuildtype;
    var $customercrossstreet;
    var $customerzip;
    var $customercity;
    var $customerstate;
    var $customerphone;
    var $customeraddresslabel;
    var $customeremail;
    var $customerpassword;

    var $customerlogemail;
    var $customerlogpassword;

    function Customer()
    {

        #Restaurant
        parent::__construct();
        if (array_key_exists("customername", $_POST))
        {
            $this->customername = $this->filterInput($_POST['customername']);
        }
        if (array_key_exists("customerlastname", $_POST))
        {
            $this->customerlastname = $this->filterInput($_POST['customerlastname']);
        }
        if (array_key_exists("customerstreet", $_POST))
        {
            $this->customerstreet = $this->filterInput($_POST['customerstreet']);
        }
        if (array_key_exists("customerbuildtype", $_POST))
        {
            $this->customerbuildtype = $this->filterInput($_POST['customerbuildtype']);
        }
        if (array_key_exists("customercrossstreet", $_POST))
        {
            $this->customercrossstreet = $this->filterInput($_POST['customercrossstreet']);
        }
        if (array_key_exists("customerzip", $_POST))
        {
            $this->customerzip = $this->filterInput($_POST['customerzip']);
        }
        if (array_key_exists("customercity", $_POST))
        {
            $this->customercity = $this->filterInput($_POST['customercity']);
        }

        if (array_key_exists("customerstate", $_POST))
        {
            $this->customerstate = $this->filterInput($_POST['customerstate']);
        }
        if (array_key_exists("customerphone", $_POST))
        {
            $this->customerphone = $this->filterInput($_POST['customerphone']);
        }
        if (array_key_exists("customeraddresslabel", $_POST))
        {
            $this->customeraddresslabel = $this->filterInput($_POST['customeraddresslabel']);
        }
        if (array_key_exists("customeremail", $_POST))
        {
            $this->customeremail = $this->filterInput($_POST['customeremail']);
        }
        if (array_key_exists("customerpassword", $_POST))
        {
            $this->customerpassword = $this->filterInput($_POST['customerpassword']);
        }

        if (array_key_exists("customerlogemail", $_POST))
        {
            $this->customerlogemail = $this->filterInput($_POST['customerlogemail']);
        }
        if (array_key_exists("customerlogpassword", $_POST))
        {
            $this->customerlogpassword = $this->filterInput($_POST['customerlogpassword']);
        }

    }
    #-------------------------------------------------------------------------------------------
    #check Authentic
    function customer_authetic()
    {
        global $CFG;

        if (isset($_SESSION['customerid']) && !empty($_SESSION['customerid']))
        {

            if ($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook')
            {
                $this->redirectUrl($CFG['site']['base_url'] . '/customerMyaccount.php');
            } else
            {
                $this->redirectUrl($CFG['site']['base_url'] . '/myaccount');
            }
        }
    }
    #check UnAuthentic
    function customer_unauthetic()
    {
        global $CFG;

        if (!isset($_SESSION['customerid']) && empty($_SESSION['customerid']))
        {

            if ($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook')
            {
                $this->redirectUrl($CFG['site']['base_url'] . '/customerLogin.php');
            } else
            {
                $this->redirectUrl($CFG['site']['base_url'] . '/login');
            }
        }
    }
    #-------------------------------------------------------------------------------------------
    #Customer Add New
    function customerRegister()
    {
        global $CFG, $objSmarty;

        $sel = "SELECT * FROM " . $CFG['table']['customer'] . " WHERE customer_id != '' ";
        $num_visit = $this->ExecuteQuery($sel, 'norows');
        $num_visits = $num_visit + 1;
        $sessionid = session_id();
        //$this->customerzip   = $this->getValue("zipcode",$CFG['table']['zipcode'],"zipcode_id = '".$this->customerzip."'");

        $cuspass = $this->encrypt_password_md5($this->customerpassword);

        $ins_cus = "INSERT INTO 
								" . $CFG['table']['customer'] . "
						    SET
						    	customer_name  			= '" . $this->filterInput($this->customername). "',
						    	customer_lastname		= '" . $this->filterInput($this->customerlastname) . "',
						    	customer_street  		= '" . $this->filterInput($this->customerstreet) . "',
						    	customer_buildtype  	= '" . $this->filterInput($this->customerbuildtype) . "',
						    	customer_crossstreet  	= '" . $this->filterInput($this->customercrossstreet) . "',
						    	customer_zip  			= '" . $this->filterInput($this->customerzip) . "',
						    	customer_city  			= '" . $this->customercity . "',
						    	customer_state  		= '" . $this->customerstate . "',
						    	customer_phone  		= '" . $this->filterInput($this->customerphone) . "',
						    	newsletter				= '" . $this->filterInput(addslashes($_REQUEST['newsletter'])) . "',
						    	customer_email  		= '" . $this->filterInput($this->customeremail) . "',
						    	customer_password  		= '" . $this->filterInput($cuspass) . "',
						    	addeddate   			= '" . CUR_TIME . "',
								last_logged 			= '" . CUR_TIME . "',
								num_visits  			= '" . $num_visits . "', 
								logged_in   			= '1',
								last_active 			= '" . CUR_TIME . "', 
								ip          			= '" . $this->filterInput($_SERVER['REMOTE_ADDR']) . "',
								session     			= '" . $sessionid . "' ";
        $res_cus = $this->ExecuteQuery($ins_cus, 'insert');
        #echo "customer_success";
        if ($res_cus)
        {
            echo "customer_success";

            $ins_address = "INSERT INTO
											" . $CFG['table']['customer_addressbook'] . "
										SET
											customer_id				= '" . $res_cus . "',
											customer_apartment_name = '" . $this->filterInput($this->customerbuildtype) . "',
											customer_street			= '" . $this->filterInput($this->customerstreet) . "',
											customer_address_title	= '" . $this->filterInput(addslashes($_REQUEST['add_title'])) . "',
											customer_state			= '" . $this->customerstate . "',
											customer_city			= '" . $this->customercity . "',
											customer_zip			= '" . $this->customerzip . "',
											customer_address_label	= '" . $this->customeraddresslabel . "',
											added_date				= '" . CUR_TIME . "'";
                                            $this->ExecuteQuery($ins_address, 'insert');
                                           
            if($_REQUEST['newsletter'] == 'Yes'){
                
                $sub_newsletter = "INSERT INTO
											" . $CFG['table']['newsletter'] . "
										SET
											customer_id				= '" . $res_cus  . "',
											customer_name           = '" . $this->filterInput($this->customername) . "',
											customer_lastname		= '" . $this->filterInput($this->customerlastname)  . "',
											customer_email   	    = '" . $this->filterInput($this->customeremail) . "',
											customer_phone			= '" . $this->filterInput($this->customerphone)  . "',
											newsletter		     	= '" . addslashes($this->filterInput($_REQUEST['newsletter'])) . "',
											added_date				= '" . CUR_TIME . "'";
                                            
                $this->ExecuteQuery($sub_newsletter, 'insert');
                
            }                                
             

            $city = $this->getValue("cityname", $CFG['table']['city'], "city_id = '" . $this->customercity . "'");
            $state = $this->getValue("statename", $CFG['table']['state'], "statecode = '" . $this->customerstate . "'");

            $toemail = $this->customeremail;
            //$active_link = $CFG['site']['base_url'] . "/customerLogin.php?ui=" . base64_encode($toemail);
            
            if($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook'){
                $active_link  = $CFG['site']['base_url']."/customerLogin.php?ui=".base64_encode($toemail);
			}else{
                $active_link  = $CFG['site']['base_url']."/customer-activation/".base64_encode($toemail);
			}

            //$mailsubject = $CFG['site']['sitedomain'] . ": " . $CFG['site']['sitename'] . " Customer Register";
            $mailsubject = $CFG['site']['sitename'] .":   Customer Login Details";
            
            $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] . "/emailCustomerRegister.tpl");
            $mail_content = str_replace('{SITE_URL}', $CFG['site']['base_url'], $mail_content);
            $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
            $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
            $mail_content = str_replace('{SITE_DOMAIN}', $CFG['site']['sitedomain'], $mail_content);
            /*$mail_content = str_replace('{CUSTOMER_NAME}',$this->customername,$mail_content);
            $mail_content = str_replace('{CUSTOMER_PHONE}',$this->customerphone,$mail_content);
            $mail_content = str_replace('{CUSTOMER_STREETADDRESS}',$this->customerstreet,$mail_content);
            $mail_content = str_replace('{CUSTOMER_CITY}',$city,$mail_content);
            $mail_content = str_replace('{CUSTOMER_STATE}',$state,$mail_content);*/
            $mail_content = str_replace('{CUSTOMER_EMAIL}', $this->customeremail, $mail_content);
            $mail_content = str_replace('{CUSTOMER_PASSWORD}', $this->customerpassword, $mail_content);
            $mail_content = str_replace('{ACTIVATION_LINK}', $active_link, $mail_content);

            $ok = $this->sendMail($CFG['site']['sitename'], $CFG['site']['adminemail'], $toemail,
                $mailsubject, $mail_content, $mail_attachment_name = '', $mail_attachment_content =
                '');
            #echo $ok;    
            if ($ok)
            {
                $to_email = $CFG['site']['adminemail'];

                $mailsubject = $CFG['site']['sitedomain'] . ": " . $CFG['site']['sitename'] . "Customer Register";
                $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] . "/emailCustomerRegisterSendadmin.tpl");
                $mail_content = str_replace('{SITE_URL}', $CFG['site']['base_url'], $mail_content);
                $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
                $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
                $mail_content = str_replace('{SITE_DOMAIN}', $CFG['site']['sitedomain'], $mail_content);
                $mail_content = str_replace('{CUSTOMER_NAME}', stripslashes($this->customername) . " " . stripslashes($this->customerlastname), $mail_content);
                $mail_content = str_replace('{CUSTOMER_PHONE}', $this->customerphone, $mail_content);
                $mail_content = str_replace('{CUSTOMER_STREETADDRESS}', stripslashes($this->customerstreet), $mail_content);
                $mail_content = str_replace('{CUSTOMER_CITY}', $city, $mail_content);
                $mail_content = str_replace('{CUSTOMER_STATE}', $state, $mail_content);
                $mail_content = str_replace('{CUSTOMER_EMAIL}', $this->customeremail, $mail_content);
                //$mail_content = str_replace('{CUSTOMER_PASSWORD}',$this->customerpassword,$mail_content);
                $ok = $this->sendMail($this->customername, $this->customeremail, $to_email, $mailsubject, $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');
            }
        }

        #$_SESSION['customerid'] = $res_cus;
    }
    
    #---------------------------------------------------------------------------------------
    #Crear FTP Cliente--------------------------------------------------------------------
    
    public function uploadfile(){
    	$dia = date("j");
    	$mes = date("m");
    	$ano = date("y");
    	//$nombre = $_POST["codtienda"].$dia.$mes.$ano.$_POST["id_usuario"];
    	//var_dump($nombre);
    	$nom_file= $_SESSION['restaurantownerid'].$dia.$mes.$ano.$res_cus.'.txt';
    	$adress= $this->customeraddresslabel.$this->customerstate.$this->customercity.$this->customercrossstreet. $this->customerbuildtype.$this->customerzip;
   		($nom_file);
    	$ar=fopen("$nom_file","a") or die("Problemas en la creacion");
    	//{
    
    	fputs($ar,$_REQUEST['cod_client']);
    	fputs($ar, ";");
    	fputs($ar,$_REQUEST['cedula']);
    	fputs($ar, ";");
    	fputs($ar,$this->customername);
    	fputs($ar, ";");
    	fputs($ar,$this->customerlastname);
    	fputs($ar, ";");
    	fputs($ar, $this->customerphone);
    	fputs($ar, ";");
    	fputs($ar, $this->customerphone);
    	fputs($ar, ";");
    	fputs($ar,$this->customeremail);
    	fputs($ar, ";");
    	fputs($ar,$adress);
    	fputs($ar,"\n");
    
    	fputs($ar,"");
    	fputs($ar,"\n");
    	fclose($ar);

    
    
    	// connect and login to FTP server
    	$ftp_server = "64.250.116.160";
    	$ftp_username=" admin_fullpizzadev";
    	$ftp_userpass= "YGT2uR72C";
    
    	$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
    	$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);
    
    	$file = $nom_file;
    
    	// upload file
    	if (ftp_put($ftp_conn, $file, $file, FTP_ASCII))
    	{
    		echo "Successfully uploaded $file.";
    	}
    	else
    	{
    		echo "Error uploading $file.";
    	}
    
    	// close connection
    	ftp_close($ftp_conn);
    
    }
    
    #---------------------------------------------------------------------------------------
    #Add Mail Subscribe--------------------------------------------------------------------
    function addmailsubscribe() {
        
        global $CFG, $objSmarty;
        
        $email = $_REQUEST['subscribemail'];
        
        $addmail = "INSERT INTO
											" . $CFG['table']['newsletter'] . "
										SET
                                            customer_email          = '" . $this->filterInput(addslashes($email)) . "',                                        
											newsletter		     	= 'Yes',
											added_date				= '" . CUR_TIME . "'";
        $sub_mail = $this->ExecuteQuery($addmail,'insert');
        if($sub_mail) {
            
            echo "success";
            
        }
                                            
        
    }
    #---------------------------------------------------------------------------------------
    #Acount acctivation throught the email
    function Email_Activation($email)
    {
        global $CFG, $objSmarty;

        $this->email = base64_decode($email);
        $status = $this->getValue("status", $CFG['table']['customer'],
            "customer_email = '" . $this->email . "'");
            
        if (count($status) > 0)
        {
            if ($status == '2')
            {
                $inssql = "UPDATE " . $CFG['table']['customer'] .
                    " SET status = '1' WHERE customer_email = '" . $this->filterInput($this->email) . "'";
                $ressql = $this->ExecuteQuery($inssql, "update");

                $msg = "Thank you! Your account has been activated successfully! <br> Please login your account";
            } else
            {
                $msg = " Your account has been already activated! <br> Please login your account";
            }
        } else
        {
            $msg = "Sorry your activation code doesn't match with us! ";
        }
        return $msg;
    }
    #---------------------------------------------------------------
    #Login
    function customerLogin()
    {
        global $CFG, $objSmarty;

        $cuspass = $this->customerlogpassword;

        $User_details = $this->getMultiValue("customer_id, customer_password, status, delete_status", $CFG['table']['customer'], "customer_email = '" . $this->customerlogemail . "' ");
        #$User_details = $this->getMultiValue("customer_id,status",$CFG['table']['customer'],"customer_email = '".$this->customerlogemail."' AND customer_password='".$this->customerlogpassword."' ");

        $db_pass = $User_details['0']['customer_password'];

        //echo "<pre>";print_r($User_details);echo "</pre>";
        //if(count($User_details) > 0){
        if ($this->validate_password($cuspass, $db_pass))
        {
            $id = $User_details[0]['customer_id'];

            if ($User_details[0]['status'] == 0)
            { #Status 0 means Deactivated user
                echo "Deactivated";
            } elseif ($User_details[0]['delete_status'] == 'Yes')
            {
                #Status 2 means Pending user
                echo "Deleted";
            } elseif ($User_details[0]['status'] == 2)
            {
                #Status 2 means Pending user
                echo "Pending";
            } else
            {
                if (isset($_POST['rememberme']) && $_POST['rememberme'] == 'Yes')
                {
                    setcookie("cookie_userMail", $this->customerlogemail);
                    setcookie("cookie_userPassword", $this->customerlogpassword);
                    setcookie("cookie_userMail", $this->customerlogemail, time() + 3600 * 24 * 30);
                     /* expire in 30 days */
                    setcookie("cookie_userPassword", $this->customerlogpassword, time() + 3600 * 24 *
                        30);
                     /* expire in 30 days */
                } else
                {
                    setcookie("cookie_userMail", '', time() - 1000);
                    setcookie("cookie_userMail", '', time() - 1000, '/');
                    setcookie("cookie_userPassword", '', time() - 1000);
                    setcookie("cookie_userPassword", '', time() - 1000, '/');
                }
                $_SESSION['customerid'] = $id;
                /*if($_SESSION['URL'] != ''){
                $redirect=explode("/",$_SESSION['URL']);
                #echo 'previousurl'.'^^'.$redirect[2];  //Demo
                echo 'previousurl'.'^^'.$redirect[3];  //Localhost
                $_SESSION['customerid'] = $id;
                }else{
                $_SESSION['customerid'] = $id;
                }*/
            }
        } else
        {
            echo "Invalid_Login";
        }
    }
    #---------------------------------------------------------------
    #Login
    function customerLoginFacebook()
    {
        global $CFG, $objSmarty;
        
        $num_customer = $this->getNumValues($CFG['table']['customer'],
            "customer_email = '" . $this->customerlogemail .
            "' AND ( status ='1' OR status = '2' ) ");
        //echo $num_customer;
        if ($num_customer > 0)
        {
            $customerId = $this->getValue("customer_id", $CFG['table']['customer'],
                "customer_email = '" . $this->customerlogemail . "' ");

            $_SESSION['customerid'] = $customerId;
            $_SESSION['cusLogin'] = 'FB';
            echo "loginSuccess";
        } else
        {

            $customerpassword = rand();
            $cuspass = $this->encrypt_password_md5($customerpassword);
            $ins_cus = "INSERT INTO 
								" . $CFG['table']['customer'] . "
						    SET
						    	customer_name  			= '" . $this->filterInput($_POST['customerfirstname']) .
                "',
						    	customer_lastname		= '" . $this->filterInput($_POST['customerlastname']) .
                "',
						    	customer_email  		= '" . $this->filterInput($this->customerlogemail) . "',
						    	customer_password  		= '" . $this->filterInput($cuspass) . "',
						    	status					= '1',
						    	addeddate = '" . CUR_TIME . "' ";
                                        
            $res_cus = $this->ExecuteQuery($ins_cus, 'insert');
            
            $_SESSION['customerid'] = $res_cus;
            $_SESSION['cusLogin'] = 'FB';

            $fromname = $CFG['site']['adminname'];
            $fromemail = $CFG['site']['adminemail'];
            $toemail = $this->customerlogemail;

            $mailsubject = $CFG['site']['sitedomain'] . ": " . $CFG['site']['sitename'] ." Customer Login Account Details";
            $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] . "/emailFbCustomerRegister.tpl");
            $mail_content = str_replace('{SITE_URL}', $CFG['site']['base_url'], $mail_content);
            $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
            $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
            $mail_content = str_replace('{SITE_DOMAIN}', $CFG['site']['sitedomain'], $mail_content);
            $mail_content = str_replace('{CUSTOMER_EMAIL}', $this->customerlogemail, $mail_content);
            $mail_content = str_replace('{CUSTOMER_NAME}', $_POST['customerfirstname'] .' '. $_POST['customerlastname'], $mail_content);

            $ok = $this->sendMail($fromname, $fromemail, $toemail, $mailsubject, $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');
            if($ok){
                $this->sendMail($_POST['customerfirstname'], $toemail, $fromemail, $mailsubject, $mail_content, $mail_attachment_name = '', $mail_attachment_content = '');
            }
            echo "loginSuccess";
        }
    }

    #---------------------------------------------------------------
    #FB Menu Order Register
    function pageTabFBOrderMenuCustomer()
    {
        global $CFG, $objSmarty;

        $user           = $this->filterInput($_REQUEST['fb_userid']);
        $fb_email       = $this->filterInput($_REQUEST['fb_email']);
        $fb_username    = $this->filterInput($_REQUEST['fb_username']);
        $fb_first_name  = $this->filterInput($_REQUEST['fb_first_name']);
        $fb_last_name   = $this->filterInput($_REQUEST['fb_last_name']);
        $fb_location    = $this->filterInput($_REQUEST['fb_location']);

        //echo "<pre>";print_r($_REQUEST);echo "</pre>";
        /*echo "<br>user=>".$user;
        echo "<br>fb_email=>".$fb_email;
        echo "<br>fb_username=>".$fb_username;
        //exit;*/
        if (isset($user) && !empty($user))
        {
            // Proceed knowing you have a logged in user who's authenticated
            $customer_id = $this->getValue("customer_id", $CFG['table']['customer'],
                " fb_userid='" . $user . "'");
            //echo "<br>customer_id------".$customer_id;
            $user_profile = array();
            $user_profile['id'] = $user;
            $user_profile['email'] = $fb_email;
            $user_profile['first_name'] = $fb_first_name;
            $user_profile['last_name'] = $fb_last_name;
            $user_profile['location'] = $fb_location;
            //exit;

            $this->customerRegister_FBOrder($user_profile);
            echo 'fb_userid_success';
            exit;
            /*if( isset($customer_id) && !empty($customer_id) )
            {
            //echo "11111";
            //echo "<br>customer_id------".$customer_id;
            //$_SESSION['customerid'] = $customer_id;
            $this->customerRegister_FBOrder($user_profile);
            
            //echo "<pre>SESSION";print_r($_SESSION);echo "</pre>";
            echo 'fb_userid_success';exit;
            } 
            else{
            //echo "<br>ELSE";
            //echo "3333333";
            $this->customerRegister_FBOrder($user_profile);
            echo 'fb_userid_success';exit;
            }
            //echo "<pre>SESSION";print_r($_SESSION);echo "</pre>";*/

        }
    }
    #---------------------------------------------------------------
    #FB Menu Order Register
    function customerRegister_FBOrder($fbarray)
    {
        global $CFG, $objSmarty;

        $customer_email = $this->filterInput($fbarray['email']);
        $customer_first_name = $this->filterInput($fbarray['first_name']);
        $customer_last_name = $this->filterInput($fbarray['last_name']);
        $fb_userid = $fbarray['id'];

        #city & State
        $customer_loc = $this->filterInput($fbarray['location']);
        if (isset($customer_loc) && !empty($customer_loc))
        {
            list($customer_c, $customer_s) = explode(", ", $customer_loc);

            if (isset($customer_s) && !empty($customer_s))
            {
                $c_statecode = $this->getValue("statecode", $CFG['table']['state'], "statename = '" . $customer_s . "' ");
            }

            if (isset($customer_c) && !empty($customer_c))
            {
                $c_city_id = $this->getValue("city_id", $CFG['table']['city'], "cityname = '" . $customer_c . "' ");
            }
        }

        $num_customer = $this->getNumValues($CFG['table']['customer'], "customer_email = '" . $customer_email . "' AND ( status ='1' OR status = '2' ) ");
        if ($num_customer > 0)
        {
            $customerId = $this->getValue("customer_id", $CFG['table']['customer'], "customer_email = '" . $customer_email . "' ");

            $ins_cus = "UPDATE 
								" . $CFG['table']['customer'] . "
						    SET
						    	customer_name  			= '" . $this->filterInput($customer_first_name) . "',
						    	customer_lastname		= '" . $this->filterInput($customer_last_name) . "',
						    	customer_email  		= '" . $this->filterInput($customer_email) . "',
						    	customer_password  		= '" . $this->filterInput($customer_password) . "',
                                customer_state  		= '" . $c_statecode . "',
                                customer_city  		    = '" . $c_city_id . "'
                       WHERE
                                fb_userid               = '" . $fb_userid . "' ";
            $res_cus = $this->ExecuteQuery($ins_cus, 'update');
            $_SESSION['customerid'] = $customerId;
            //$_SESSION['cusLogin'] = 'FB';
            //echo "loginSuccess";
        } else
        {

            $customer_password = rand();
            $ins_cus = "INSERT INTO 
								" . $CFG['table']['customer'] . "
						    SET
						    	customer_name  			= '" .  $this->filterInput($customer_first_name) . "',
						    	customer_lastname		= '" .  $this->filterInput($customer_last_name) . "',
						    	customer_email  		= '" .  $this->filterInput($customer_email) . "',
						    	customer_password  		= '" .  $this->filterInput($customer_password) . "',
                                customer_state  		= '" . $c_statecode . "',
                                customer_city  		    = '" . $c_city_id . "',
                                fb_userid               = '" . $fb_userid . "', 
						    	status					= '1',
						    	addeddate = now() ";
            $res_cus = $this->ExecuteQuery($ins_cus, 'insert');
            //echo "<br>".$ins_cus;
            $_SESSION['customerid'] = $res_cus;
            //$_SESSION['cusLogin'] = 'FB';

            $fromname = $CFG['site']['adminname'];
            $fromemail = $CFG['site']['adminemail'];
            $toemail = $customer_email;
            $active_link = $CFG['site']['base_url_https'] . "/customerLogin.php?ui=" . base64_encode($toemail);

            $mailsubject = $CFG['site']['sitedomain'] . ": " . $CFG['site']['sitename'] . " Customer Login Account Details";
            $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] . "/emailCustomerRegister.tpl");
            $mail_content = str_replace('{SITE_URL}', $CFG['site']['base_url_https'], $mail_content);
            $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
            $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
            $mail_content = str_replace('{SITE_DOMAIN}', $CFG['site']['sitedomain'], $mail_content);
            $mail_content = str_replace('{CUSTOMER_EMAIL}', $customer_email, $mail_content);
            $mail_content = str_replace('{CUSTOMER_PASSWORD}', $customer_password, $mail_content);
            $mail_content = str_replace('{ACTIVATION_LINK}', $active_link, $mail_content);

            $this->sendMail($fromname, $fromemail, $toemail, $mailsubject, $mail_content, $mail_attachment_name =
                '', $mail_attachment_content = '');
        }
    }
    #---------------------------------------------------------------
    #Forget Password
    function customerForgetPassword()
    {
        global $CFG, $objSmarty;

        $email = $this->filterInput($_POST['forgetemail']);

        $userdetails = $this->GetMultivalue("customer_name,customer_lastname,customer_email,customer_password,status,delete_status", $CFG['table']['customer'], "customer_email = '" . $email . "' ");
        //echo "<pre>";print_r($userdetails);echo "</pre>";
        if (count($userdetails[0]['customer_password']) > 0 && count($userdetails[0]['customer_password']) != 0)
        {
            if ($userdetails[0]['delete_status'] == 'No')
            {
                if ($userdetails[0]['status'] == '1')
                {
                    $toemail = $_POST['forgetemail'];
                    //$password   = $userdetails[0]['customer_password'];

                    //$active_link = $CFG['site']['base_url'] . "/customerResetPassword.php?ui=" . base64_encode($toemail);
                    if ($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook' ){
                        
                        $active_link = $CFG['site']['base_url'] . "/customerResetPassword.php?ui=" .base64_encode($toemail);
        			}else{
        			     $active_link = $CFG['site']['base_url'] . "/customer-reset-password/" .base64_encode($toemail);
        			}

                    /*$password = '<tr>
										<td width="15%" align="left" valign="top">Reset Password Link</td>
										<td width="5%" align="center" valign="top">:</td>
										<td width="" align="left" valign="top">' . $active_link . '</td>
									</tr>';*/
                    $password = '<tr>
                    				<td align="left" valign="top" colspan="3">Please <a href="'.$active_link.'">Click here</a> to reset your password</td>
                    			</tr>';

                    $mailsubject = $CFG['site']['sitedomain'] . ": " . $CFG['site']['sitename'] . " Forgot Password Account information ";
                    $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] . "/emailForgetPassword.tpl");
                    $mail_content = str_replace('{SITE_URL}', $CFG['site']['base_url'], $mail_content);
                    $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], $mail_content);
                    $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
                    $mail_content = str_replace('{CUSTOMER}', stripslashes($userdetails[0]['customer_name']), $mail_content);
                    $mail_content = str_replace('{CUSTOMERLAST}', stripslashes($userdetails[0]['customer_lastname']), $mail_content);
                    $mail_content = str_replace('{USEREMAIL}', $toemail, $mail_content);
                    $mail_content = str_replace('{PASSWORD}', $password, $mail_content);
                    //$mail_content = str_replace('{ACTIVATION_LINK}',$active_link,$mail_content);

                    $ok = $this->sendMail($CFG['site']['sitename'], $CFG['site']['adminemail'], $toemail,
                        $mailsubject, $mail_content, $mail_attachment_name = '', $mail_attachment_content =
                        '');
                    //echo "///////////".$ok.".............";
                    if ($ok)
                    {
                        echo 'sendpass_success';
                    }

                } elseif ($userdetails[0]['status'] == '2')
                {
                    echo 'pending';
                } elseif ($userdetails[0]['status'] == '0')
                {
                    echo 'deactive';
                }
            } elseif ($userdetails[0]['delete_status'] == 'Yes')
            {
                echo "deleted";
            }
        } else
        {
            echo 'no_email';
        }
    }
    #---------------------------------------------------------------------------------------
    #Acount acctivation throught the email
    function customerResetPassword($email)
    {
        global $CFG, $objSmarty;

        $this->email = base64_decode($this->filterInput($email));
        $num_email = $this->getNumvalues($CFG['table']['customer'], "customer_email = '" .
            $this->email . "'");
        $password = $this->filterInput($_REQUEST['customer_resetpassword']);
        $customer_resetpass = $this->encrypt_password_md5($this->filterInput($password));

        if ($num_email == '1')
        {
            $status = $this->getValue("status", $CFG['table']['customer'],
                "customer_email = '" . $this->email . "'");
            $deletestatus = $this->getValue("delete_status", $CFG['table']['customer'],
                "customer_email = '" . $this->email . "'");
            if ($deletestatus == 'No')
            {
                if ($status == '1')
                {
                    $inssql = "UPDATE " . $CFG['table']['customer'] . " SET customer_password = '" .
                        $this->filterInput($customer_resetpass) . "' WHERE customer_email = '" . $this->email . "'";
                    $ressql = $this->ExecuteQuery($inssql, "update");
                    $msg = "Success";
                    $objSmarty->assign("message", "Your password is reset successfully! Login your account.");
                    $url = 'customerLogin.php?msg=' . $msg;
                    
                    if ($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook' ){
                        $this->redirectUrl($CFG['site']['base_url'].'/'.$url);
        			}else{
                        $this->redirectUrl($CFG['site']['base_url'].'/login/msg');
                        
        			}
                    
                } elseif ($status == '2')
                {
                    $msg = "Pending";
                    $url = 'customerResetPassword.php?msg=' . $msg;
                    
                    if ($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook' ){
                        
                        $this->redirectUrl($CFG['site']['base_url'].'/'.$url);
        			}else{
                        $this->redirectUrl($CFG['site']['base_url'].'/customer-reset-password/msg');
        			}
                    
                } elseif ($status == '0')
                {
                    $msg = "Deactive";
                    $url = 'customerResetPassword.php?msg=' . $msg;
                    
                    if ($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook' ){
                        
                        $this->redirectUrl($CFG['site']['base_url'].'/'.$url);
        			}else{
                        $this->redirectUrl($CFG['site']['base_url'].'/customer-reset-password/msg');
        			}
                    
                }
            } elseif ($deletestatus == 'Yes')
            {
                $msg = "Deleted";
                $url = 'customerResetPassword.php?msg=' . $msg;
                
                if ($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook' ){
                        
                    $this->redirectUrl($CFG['site']['base_url'].'/'.$url);
    			}else{
                    $this->redirectUrl($CFG['site']['base_url'].'/customer-reset-password/msg');
    			}
                
            }

        } else
        {
            $msg = "Fail";
            $url = 'customerResetPassword.php?msg=' . $msg;
            
            if ($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook' ){
                        
                $this->redirectUrl($CFG['site']['base_url'].'/'.$url);
			}else{
                $this->redirectUrl($CFG['site']['base_url'].'/customer-reset-password/msg');
			}
            
        }

        //$this->redirectUrl($CFG['site']['base_url'] . '/' . $url);
    }
    #----------------------------------------------------------------------------
    #Customer Logout
    function customerLogout()
    {
        global $CFG;

        if (!empty($_SESSION['customerid']))
        {
            $_SESSION['customerid'] = "";
            unset($_SESSION['customerid']);
            unset($_SESSION['cusLogin']);
            unset($_SESSION['URL']);
            unset($_SESSION['RESTID']);
            unset($_SESSION['OFFER']);
            //echo 'logout';
        }
            if ($CFG['site']['userfriendly'] == 'N' || $CFG['site']['fb_domain_name'] == 'fb' || $CFG['site']['fb_domain_name'] == 'facebook')
            {
                $this->redirectUrl($CFG['site']['base_url'] . '/customerLogin.php');
            } else
            {
                $this->redirectUrl($CFG['site']['base_url'] . '/login');
            }

        //}
    }
    #--------------------------------------------------------------------------------
    #Check Already User
    function checkAlreadyUser()
    {
        global $CFG, $objSmarty;

        $email = $this->filterInput($_POST['customeremail']);

        $customerid = $this->filterInput($_SESSION['customerid']);

        if (!empty($customerid))
        {
            $userdetails = $this->getNumvalues($CFG['table']['customer'],
                "customer_email = '" . $email . "' AND customer_id != '" . $this->filterInput($_SESSION['customerid']) .
                "' ");
        } else
        {
            $userdetails = $this->getNumvalues($CFG['table']['customer'],
                "customer_email = '" . $email . "' ");
        }
        echo $userdetails;
    }
    #--------------------------------------------------------------------------------
    #Check Already Subscribe
    function checkAlreadySubscribe()
    {
        global $CFG, $objSmarty;

        $email = $this->filterInput($_POST['customeremail']);

        if (!empty($email))
        {
            $subscribedetails = $this->getNumvalues($CFG['table']['newsletter'],
                "customer_email = '" . $email . "' ");
        } 
        echo $subscribedetails;
    }
    #----------------------------------------------------------------------------
    #Customer Change Password
    function customerChangePassword()
    {
        global $CFG;

        #$oldpassword = $this->filterInput($_POST["oldpassword"]);
        #$newpassword = $_POST["newpassword"];
        $newpassword = $this->encrypt_password_md5($this->filterInput($_POST["newpassword"]));

        $sql_ups = "UPDATE " . $CFG['table']['customer'] . " SET customer_password = '" .$this->filterInput($newpassword) . "' WHERE customer_id='" . $this->filterInput($_SESSION['customerid']) . "' ";
        $res_ups = $this->ExecuteQuery($sql_ups, 'update');
        echo 'success';

        /*$oldpwd_db = trim($this->GetValue("customer_password",$CFG['table']['customer'],"customer_id = '".$_SESSION['customerid']."'"));
        
        if($oldpwd_db != $oldpassword){
        echo "Invalid_Old_Pwd";		
        }else{
        $sql_ups = "UPDATE ".$CFG['table']['customer']." SET customer_password = '".$newpassword."' WHERE customer_id='".$_SESSION['customerid']."' ";
        $res_ups = $this->ExecuteQuery($sql_ups,'update');
        echo 'success';
        }*/
    }
    #-----------------------------------------------------------------------------
    #Customer Profile
    function customerProfileDetails()
    {
        global $CFG, $objSmarty;

        $sel_profile = "SELECT customer_name, customer_lastname, customer_street, customer_crossstreet, customer_email, customer_phone, customer_buildtype, customer_landmark, customer_area, customer_city, customer_zip, customer_state, customer_landline, customer_addresslabel, customer_sec_name, customer_sec_address, customer_sec_street, customer_sec_landmark, customer_sec_area, customer_sec_city, customer_sec_phone, customer_sec_landline, newsletter FROM " .
            $CFG['table']['customer'] . " WHERE customer_id = '" . $this->filterInput($_SESSION['customerid']) .
            "'";
        $res_profile = $this->ExecuteQuery($sel_profile, 'select');
        //echo "<pre>";print_r($res_profile);echo "</pre>";#exit;
        $objSmarty->assign("customerprofiledetails", $res_profile);

    }
    #-----------------------------------------------------------------------------
    #Customer Profile
    function customerUpdateProfile()
    {
        global $CFG, $objSmarty;

        $customername       = $this->filterInput($_POST['firstname']);
        $customerlastname   = $this->filterInput($_POST['lastname']);
        $customerstreet     = $this->filterInput($_POST['customerstreet']);
        $customeremail      = $this->filterInput($_POST['customeremail']);
        $customerphone      = $this->filterInput($_POST['customerphone']);
        $customer_buildtype = $this->filterInput($_POST['customer_buildtype']);
        $customer_landline  = $this->filterInput($_POST['customer_landline']);
        $customer_landmark  = $this->filterInput($_POST['customer_landmark']);

        $upd_profile = "UPDATE 
								" . $CFG['table']['customer'] . " 
							SET 
								customer_name   	= '" . $this->filterInput($customername) . "',
								customer_lastname	= '" . $this->filterInput($customerlastname) . "',
                                customer_buildtype  = '" . $this->filterInput($customer_buildtype) ."',
								customer_street 	= '" . $this->filterInput($customerstreet) . "',
								customer_email  	= '" . $this->filterInput($customeremail) . "',
                                customer_landline   = '" . $this->filterInput($customer_landline) .",
                                customer_landmark   = '" . $this->filterInput($customer_landmark) .",
								customer_phone  	= '" . $this->filterInput($customerphone) . "',
								newsletter			= '" . addslashes($this->filterInput($_REQUEST['newsletter'])) . "'
							WHERE customer_id = '" . $this->filterInput($_SESSION['customerid']) . "' ";
        $res_profile = $this->ExecuteQuery($upd_profile, 'update');
       
        if($res_profile) {
        
         
        if($_REQUEST['newsletter'] == 'Yes') {  
        $addsubscribemail = "UPDATE 
								" . $CFG['table']['newsletter'] . "
								SET
                                                                           
								    newsletter		     	= 'Yes',
								    added_date				= '" . CUR_TIME . "'
                            WHERE customer_email          = '" . $customeremail. "'";
        $sub_mail = $this->ExecuteQuery($addsubscribemail,'update');
        }
        if($_REQUEST['newsletter'] == 'No') {  
        $addsubscribemail = "UPDATE 
								" . $CFG['table']['newsletter'] . "
								SET                                      
                                    newsletter		     	= 'No',
                                    added_date				= '" . CUR_TIME . "'
                            WHERE customer_email          = '" . $customeremail . "'";
        $sub_mail = $this->ExecuteQuery($addsubscribemail,'update');
        }
            
            
        }
        echo 'success';
    }
    #--------------------------------------------------------------------------------
    #Update Primary Address
    function customerUpdatePrimaryAddress()
    {
        global $CFG, $objSmarty;

        $addressID = $this->filterInput($_POST['id']);
        $customer_add_title = $this->filterInput($_POST['add_title']);
        $customer_buildtype = $this->filterInput($_POST['apt_name']);
        $customer_street = $this->filterInput($_POST['street_add']);
        $customer_landmark = $this->filterInput($_POST['landmark']);
        $customer_city = $this->filterInput($_POST['city']);
        $customer_zip = $this->filterInput($_POST['zip']);
        $customer_state = $this->filterInput($_POST['state']);
        $customer_landline = $this->filterInput($_POST['landline']);
        $customer_addresslabel = $this->filterInput($_POST['customeraddresslabel']);
        if ($addressID != '')
        {
            $upd_primary = "UPDATE 
								" . $CFG['table']['customer_addressbook'] . " 
							SET 
								customer_address_title	= '" . $this->filterInput($customer_add_title) . "',
								customer_apartment_name = '" . $this->filterInput($customer_buildtype) . "',
								customer_street 		= '" . $this->filterInput($customer_street) . "',
								customer_landmark  	 	= '" . $this->filterInput($customer_landmark) . "',
								customer_city  	 	 	= '" . $customer_city . "',
								customer_zip  	 	 	= '" . $this->filterInput($customer_zip) . "',
								customer_state  	 	= '" . $customer_state . "',
								customer_landline  	 	= '" . $this->filterInput($customer_landline) . "',
								customer_address_label 	= '" . $customer_addresslabel . "'
							WHERE 
								id = '" . $addressID . "' ";

            $res_primary = $this->ExecuteQuery($upd_primary, 'update');
            //echo "Success";
        }
    }
    #--------------------------------------------------------------------------------
    #Update Secondary Address
    function customerUpdateSecondaryAddress()
    {
        global $CFG, $objSmarty;

        $customer_sec_name = $this->filterInput($_POST['secondaryname']);
        $customer_sec_address = $this->filterInput($_POST['secondaryaddress']);
        $customer_sec_street = $this->filterInput($_POST['secondarystreet']);
        $customer_sec_landmark = $this->filterInput($_POST['secondarylandmark']);
        $customer_sec_area = $this->filterInput($_POST['secondaryarea']);
        $customer_sec_city = $this->filterInput($_POST['secondarycity']);
        $customer_sec_phone = $this->filterInput($_POST['secondarycellphone']);
        $customer_sec_landline = $this->filterInput($_POST['secondarylandline']);

        $upd_secondary = "UPDATE 
								" . $CFG['table']['customer'] . " 
							SET 
								customer_sec_name   	= '" . $this->filterInput($customer_sec_name) . "',
								customer_sec_address 	= '" . $this->filterInput($customer_sec_address) . "',
								customer_sec_street  	= '" . $this->filterInput($customer_sec_street) . "',
								customer_sec_landmark  	= '" . $this->filterInput($customer_sec_landmark) . "',
								customer_sec_area  	 	= '" . $this->filterInput($customer_sec_area) . "',
								customer_sec_city  	 	= '" . $this->filterInput($customer_sec_city) . "',
								customer_sec_phone  	= '" . $this->filterInput($customer_sec_phone) . "',
								customer_sec_landline  	= '" . $this->filterInput($customer_sec_landline) . "'
							WHERE customer_id = '" . $this->filterInput($_SESSION['customerid']) . "' ";
        $res_secondary = $this->ExecuteQuery($upd_secondary, 'update');
        echo 'success';
    }
    #--------------------------------------------------------------------------------
    #Customer Order Details
    function customerMyorderHistory()
    {
        global $CFG, $objSmarty;
        
        if(isset($_REQUEST['startdate']) && !empty($_REQUEST['startdate']) && isset($_REQUEST['enddate']) && !empty($_REQUEST['enddate']) ){
		
			$stdate = $_REQUEST['startdate'];
			list($day,$month,$year) = explode("-",$stdate);
			$startdate = $year.'-'.$month.'-'.$day.' 00:00:01';
			
			$enddate = $_REQUEST['enddate'];
			list($day,$month,$year) = explode("-",$enddate);
			$end_date = $year.'-'.$month.'-'.$day.' 23:59:59';
			
			$condition = " AND orderdate BETWEEN '".$startdate."' AND '".$end_date."' ";
		}

        $sel_order_history =
            "SELECT orderid, restaurant_id, ordergenerateid, customername, customeremail, deliverydoornumber, deliverystreet,taxamount, ordertotalprice, payment_type, status, orderdate, deliverytype FROM " .
            $CFG['table']['order'] . " WHERE customer_id = '" . $this->filterInput($_SESSION['customerid']) .
            "' AND paypal_status = 'success' ".$condition." ORDER BY orderid DESC ";
         
         #echo $sel_order_history."<br>";   
            
        $res_order_history = $this->ExecuteQuery($sel_order_history, 'select');
        
        foreach($res_order_history as $key=>$val){
            $res_order_history[$key]['rating'] = $this->getValue('rating', $CFG['table']['restaurant_reviews'], "customer_id = '" . $this->filterInput($_SESSION['customerid']) . "' AND order_id = '" . $this->filterInput($res_order_history[$key]['orderid']) . "' AND restaurant_id = '" . $this->filterInput($res_order_history[$key]['restaurant_id']) . "' AND status = '1' ");
            $res_order_history[$key]['deliverydate'] = $this->setDateFormatWithOutTime($res_order[0]['deliverydate']);
        $res_order_history[$key]['orderdate'] = $this->setDateFormatWithTime($res_order_history[$key]['orderdate']);
            
        }
        #echo "<pre>";print_r($res_order_history);echo "</pre>";
        $objSmarty->assign("customerOrderList", $res_order_history);
        
        return $res_order_history;
    }
    #--------------------------------------------------------------------------------
    #Customer Order Details
    function customerMyFavoritesList()
    {
        global $CFG, $objSmarty;

        $sel_fav_list = " SELECT mf.id, mf.restaurant_id, mf.adddate," .
            "res.restaurant_name,res.restaurant_seourl " . " FROM " . $CFG['table']['myfavorties'] .
            " AS mf " . " LEFT JOIN " . $CFG['table']['restaurant'] .
            " AS res ON mf.restaurant_id = res.restaurant_id " . " WHERE mf.customerid = '" .
            $_SESSION['customerid'] . "' AND res.restaurant_status = '1' AND res.delete_status = 'No' ORDER BY mf.id DESC ";
        $res_fav_list = $this->ExecuteQuery($sel_fav_list, 'select');
        #echo "<pre>";print_r($res_fav_list);echo "</pre>";
        $objSmarty->assign("customerFavoritesList", $res_fav_list);
    }
    #---------------------------------------------------------------------------------
    function customerReviews()
    {
        global $CFG, $objSmarty;

        $rating = $this->filterInput($_POST['rating']);
        $message = $this->filterInput($_POST['message']);

        $ins_rev = "INSERT INTO 
								" . $CFG['table']['restaurant_reviews'] . "
						    SET
						    	customer_id  	= '" . $this->filterInput($_SESSION['customerid']) . "',
						    	restaurant_id  	= '" . $this->filterInput($_POST['resid']) . "',
						    	order_id  	   	= '" . $this->filterInput($_POST['orderid']) . "',
						    	rating			= '" . $rating . "',
						    	message  	    = '" . $this->filterInput($message) . "',
						    	addeddate 		= '" . CUR_TIME . "' ";
        $res_rev = $this->ExecuteQuery($ins_rev, 'insert');
        echo 'success';
    }
    #---------------------------------------------------------------------------------
    function customerReviewsCheck()
    {
        global $CFG, $objSmarty;

        $reviewdet = $this->getNumvalues($CFG['table']['restaurant_reviews'],
            "customer_id = '" . $this->filterInput($_SESSION['customerid']) . "' AND order_id = '" . $this->filterInput($_POST['orderid']) .
            "' AND restaurant_id = '" . $this->filterInput($_POST['resid']) . "' ");
        echo $reviewdet;
    }
    #---------------------------------------------------------------------------------
    function favoriteDelete()
    {
        global $CFG, $objSmarty;

        $sel = "DELETE FROM " . $CFG['table']['myfavorties'] . " WHERE id = '" . $this->filterInput($_REQUEST['mid']) .
            "' AND customerid = '" . $this->filterInput($_SESSION['customerid']) . "' ";
        $res = $this->ExecuteQuery($sel, 'delete');
    }
    #---------------------------------------------------------------------------------
    #Content List from content mgmt
    function contentList()
    {
        global $CFG, $objSmarty;

        $sel = "SELECT content_title, content FROM " . $CFG['table']['content'] .
            " WHERE display_customer = 'CR' AND status = '1'";
        $res = $this->ExecuteQuery($sel, 'select');
        $objSmarty->assign("customerContentList", $res);
    }
    #-----------------------------------------------------------------------------------------------------------------------------------------------------------------
    #											Customer My Account - Address Book
    #-----------------------------------------------------------------------------------------------------------------------------------------------------------------

    #Customer Address Book List
    function addressBookList()
    {
        global $CFG, $objSmarty;

        //$customerId	= $_SESSION['customerid'];
        
        $currentpage = $_SERVER['PHP_SELF'];
        //echo $currentpage;
        $currpage     = explode("/",$currentpage);  
        $currentpage1 = end($currpage);
        //echo"<pre>";print_r($currentpage1);echo"</pre>";
        
        $now_current_page = $currentpage1;
        
        //echo $now_current_page;

        $addressBookId = $this->filterInput($_POST['addressID']);

        if (isset($_POST['addressID']) && !empty($_POST['addressID']))
        {
            if($now_current_page == 'checkout.php'){
                $subQuery = " status = '1' AND cus.id ='" . $addressBookId . "' ORDER BY id ASC ";
            }else{
                $subQuery = "cus.id ='" . $addressBookId . "' ORDER BY id ASC";
            }
            //$subQuery = "cus.id ='" . $addressBookId . "' ORDER BY id ASC";
            
        } else
        {
            //$subQuery = "cus.customer_id ='" . $_SESSION['customerid'] . "' ORDER BY id ASC";
            if($now_current_page == 'checkout.php'){
                $subQuery = " status = '1' AND cus.customer_id ='" . $this->filterInput($_SESSION['customerid']) . "' ORDER BY id ASC ";
            }else{
                $subQuery = "cus.customer_id ='" . $this->filterInput($_SESSION['customerid']) . "' ORDER BY id ASC";
            }  
        }
        //echo "-------->".$now_current_page;
        $select_address = "SELECT cus.id, cus.customer_id, cus.customer_apartment_name, cus.customer_landmark, cus.customer_street, cus.customer_address_title, cus.customer_state, cus.customer_city, cus.customer_zip, cus.customer_landline, cus.customer_address_label, cus.status, cus.added_date
		 					 FROM 
							  		" . $CFG['table']['customer_addressbook'] . " AS cus " . "WHERE 
									$subQuery";
        $result_address = $this->ExecuteQuery($select_address, 'select');

        foreach ($result_address as $key => $value)
        {
            $result_address[$key]['statename'] = $this->getValue("statename", $CFG['table']['state'],
                "statecode='" . $this->filterInput($result_address[$key]['customer_state']) . "'");
            $result_address[$key]['cityname'] = $this->getValue("cityname", $CFG['table']['city'],
                "city_id='" . $this->filterInput($result_address[$key]['customer_city']) . "'");
            //$result_address[$key]['zip'] 		= $this->getValue("zipcode",$CFG['table']['zipcode'],"zipcode_id='".$result_address[$key]['customer_zip']."'" );
            //$result_address[$key]['cus_area'] 	= $this->getValue("areaname",$CFG['table']['zipcode'],"zipcode_id='".$result_address[$key]['customer_zip']."'" );
        }

        #echo "<pre>"; print_r($result_address); echo "</pre>";

        $objSmarty->assign("customerAddress", $result_address);
        //print_r($result_address);


        $objSmarty->assign("tablename", $CFG['table']['customer_addressbook']);
        $objSmarty->assign("whereField", 'id');
        $objSmarty->assign("fieldname", 'status');
        $objSmarty->assign("word", 'Address_Book');
        $objSmarty->assign("filename", 'customerMyaccount.php');
        return $result_address;

    }
    //Add New Customer Address Book
    function AddNewAddress()
    {
        global $CFG, $objSmarty;

        $cus_id = $this->filterInput($_SESSION['customerid']);

        $add_title = $this->filterInput($_REQUEST['add_title']);
        $apt_name = $this->filterInput($_REQUEST['apt_name']);
        $street_add = $this->filterInput($_REQUEST['street_add']);
        $landmark = $this->filterInput($_REQUEST['landmark']);
        $state = $this->filterInput($_REQUEST['state']);
        $city = $this->filterInput($_REQUEST['city']);
        $zip = $this->filterInput($_REQUEST['zip']);
        $landline = $this->filterInput($_REQUEST['landline']);
        $add_label = $this->filterInput($_REQUEST['add_label']);

        $ins_add = "INSERT INTO 
									" . $CFG['table']['customer_addressbook'] . "
								SET
									customer_id				= '" . $cus_id . "',
									customer_apartment_name = '" . $this->filterInput($apt_name) . "',
									customer_landmark		= '" . $this->filterInput($landmark) . "',
									customer_street			= '" . $this->filterInput($street_add) . "',
									customer_address_title	= '" . $this->filterInput($add_title) . "',
									customer_state			= '" . $state . "',
									customer_city			= '" . $city . "',
									customer_zip			= '" . $this->filterInput($zip) . "',
									customer_landline		= '" . $this->filterInput($landline) . "',
									customer_address_label	= '" . $add_label . "',
									added_date				= '" . CUR_TIME . "'";
        $ok = $this->ExecuteQuery($ins_add, 'insert');
    }

    #Change Address Book status And Delete
    function ChangeStatus($tablename, $fieldname_status, $fieldname_updateid)
    {
        global $CFG, $objSmarty;

        $chgevalue = trim($_POST['chgeval']);
        $mid = trim($_POST['mid']);

        if (isset($mid) && !empty($mid) && ($chgevalue == '1' || $chgevalue == '0'))
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
    #get Particular Address
    function getParticularAddress()
    {
        global $CFG, $objSmarty;

        $cus_id = $this->filterInput($_SESSION['customerid']);
        $address_id = $this->filterInput($_REQUEST['address']);

        $sel_address = $this->getMultiValue("customer_street, customer_apartment_name, customer_state, customer_city, customer_zip",
            $CFG['table']['customer_addressbook'], "id='" . $address_id .
            "' AND customer_id='" . $cus_id . "'");

        $objSmarty->assign("customeraddress", $sel_address);
    }

    
    
    
}

?>