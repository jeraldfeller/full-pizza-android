function error_language(){
	
	var errLangArr = new Array();
	
	//Customer Register 
	errLangArr['cus_reg_empty_name'] 				= "Please enter customer name";
	errLangArr['cus_reg_correct_name']				= "Please enter valid name";
	errLangArr['cus_reg_empty_lastname'] 			= "Please enter last name";
    errLangArr['cus_reg_empty_address_title'] 		= "Please enter address title";
	errLangArr['cus_reg_empty_street'] 				= "Please enter street address";
	errLangArr['cus_reg_empty_zip'] 				= "Please enter customer zip";
	errLangArr['cus_reg_empty_city'] 				= "Please enter customer city";
	errLangArr['cus_reg_empty_state'] 				= "Please enter customer state";
	errLangArr['cus_reg_correct_zip']				= "Please enter valid zip";
	errLangArr['cus_reg_correct_city']				= "Please enter valid city";
	errLangArr['cus_reg_correct_state']				= "Please enter valid state";
	errLangArr['cus_reg_empty_phone'] 				= "Please enter customer phone";
	errLangArr['cus_reg_correct_phone']				= "Please enter valid phone";
	errLangArr['cus_reg_empty_email'] 				= "Please enter customer email";
	errLangArr['cus_reg_invalid_email'] 			= "Invalid Email Address";
	errLangArr['cus_reg_empty_password'] 			= "Please enter customer password";
	errLangArr['cus_reg_empty_conpassword'] 		= "Please enter customer confirm password";
	errLangArr['cus_reg_invalid_password'] 		    = "Mismatch confirm password";
    errLangArr['cus_reg_accept_terms']   		    = "Please accept terms and conditions";
    //new 14-5-2015
    errLangArr['cus_reg_select_state']              = "Please select your state";
    errLangArr['cus_reg_select_city']               = "Please select your city";
    errLangArr['cus_reg_select_zip_code']           = "Please select your zip code";
	
	//Customer Login 
	errLangArr['cus_login_email_empty'] 			= "Please enter email address";
	errLangArr['cus_login_email_valid'] 			= "Invalid Email Address";
	errLangArr['cus_login_pass_empty'] 				= "Please enter password";
	errLangArr['cus_login_account_deacivate'] 		= "Deactivated your profile , Please contact admin";
	//errLangArr['cus_login_account_pending'] 		= "Pending your profile , Please contact admin";
	errLangArr['cus_login_account_pending'] 		= "Your account is not activated,Please check your mail and click activation link to activate your account";
	errLangArr['cus_login_invalid'] 				= "Invalid Login";
     errLangArr['cus_login_account_deleted']        = "Your account was deleted, Please contact admin!";
     errLangArr['cus_login_success']                = "You are Successfully Login";
	
	//Customer Forget Password
	errLangArr['cus_login_forgetemail_empty'] 		= "Please enter email address";
	errLangArr['cus_login_forgetemail_valid'] 		= "Invalid Email Address";
	
	//Customer Update Profile
	errLangArr['cus_profile_update_name'] 			= "Please enter firstname";
	errLangArr['cus_profile_update_lastname']		= "Please enter lastname";
	errLangArr['cus_profile_update_street'] 		= "Please enter customer street";
	errLangArr['cus_profile_update_email'] 			= "Please enter customer email";
	errLangArr['cus_profile_update_phone'] 			= "Please enter customer phone";
	errLangArr['cus_profile_update_phonenocheck']	= "Please enter valid customer phone";
	errLangArr['cus_profile_update_phonenoless'] 	= "Please enter valid customer phone";
	errLangArr['cus_profile_update_success'] 		= "Profile has been Updated Successfully";
	
	//Customer Update Profile
	errLangArr['cus_addressbook_update_doorno'] 	= "Please enter door number";
	errLangArr['cus_addressbook_update_street'] 	= "Please enter customer street";
	errLangArr['cus_addressbook_update_area'] 		= "Please enter customer area";
	errLangArr['cus_addressbook_update_city'] 		= "Please enter customer city";
	errLangArr['cus_addressbook_update_state'] 		= "Please enter customer state";
	errLangArr['cus_addressbook_update_landline'] 	= "Please enter valid landline number";
	errLangArr['cus_addressbook_update_zip'] 	    = "Please enter customer zip";
	errLangArr['cus_addressbook_update_validzip'] 	= "Please enter customer valid zip";
	errLangArr['cus_addressbook_update_success'] 	= "Priamry address has been updated successfully";
	
	//Customer Change Password
	errLangArr['cus_changepass_check_oldpass'] 		= "Please enter old password";
	errLangArr['cus_changepass_check_newpass'] 		= "Please enter new password";
	errLangArr['cus_changepass_check_retypepass'] 	= "Please enter retype password";
	errLangArr['cus_changepass_check_oldnewpass'] 	= "Old password and new password should not be same";
	errLangArr['cus_changepass_check_newconfpass']	= "New password and confirm password should be same";
	errLangArr['cus_changepass_check_invalidpass']	= "Invalid Old Password";
	errLangArr['cus_changepass_check_success']		= "Password has been updated successfully";
      //Customer addresbook
	errLangArr['cus_address_change_success']		= "Your new address updated successfully";
	
	//Customer My Favorites
	errLangArr['cusfav_sure_want_delete']			= "Are you sure want to delete?";
	
	//Restaurant Owner Register
	errLangArr['res_owner_res_name']				= "Please enter restaurant name";
	errLangArr['res_owner_res_correctname']			= "Please enter restaurant valid name";
	errLangArr['res_owner_res_phone']				= "Please enter restaurant phone";
	errLangArr['res_owner_res_validphone']			= "Please enter valid restaurant phone";
	errLangArr['res_owner_res_phonenoless']			= "Please enter valid restaurant phone";
	errLangArr['res_owner_res_fax']					= "Please enter restaurant fax";
	errLangArr['res_owner_res_invalidfax']			= 'Please enter restaurant valid fax number';
	errLangArr['res_owner_res_contactname']			= "Please enter restaurant contact name";
	errLangArr['res_owner_res_contactphone']		= "Please enter restaurant contact phone";
	errLangArr['res_owner_res_validcontactphone']	= "Please enter valid contact phone";
	errLangArr['res_owner_res_validcontphoneless']	= "Please enter valid contact phone";
	errLangArr['res_owner_res_contactemail']		= "Please enter restaurant contact email";
	errLangArr['res_owner_res_invalidemail']		= "Invalid Email Address";
	errLangArr['res_owner_res_website']				= "Please enter restaurant website";
	errLangArr['res_owner_res_validwebsite']		= "Please enter valid restaurant website";
	errLangArr['res_owner_res_streetaddr']			= "Please enter restaurant streetaddress";
	errLangArr['res_owner_res_city']				= "Please enter restaurant city";
	errLangArr['res_owner_res_state']				= "Please enter restaurant state";
	errLangArr['res_owner_res_zip']					= "Please enter restaurant zip";
	errLangArr['res_owner_res_correctzip']			= "Please enter restaurant valid zip";
	errLangArr['res_owner_res_namealready']			= "Restaurant name already exist";
    errLangArr['res_owner_res_mailalready']         = "The e-mail already exists";
	
	
	//Restaurant Owner Login
	errLangArr['res_owner_login_email']				= "Please enter email address";
	errLangArr['res_owner_login_invalidemail']		= "Invalid Email Address";
	errLangArr['res_owner_login_password']			= "Please enter password";
	errLangArr['res_owner_login_deactivatation']	= "Deactivated your profile , Please contact admin";
	errLangArr['res_owner_login_pending']			= "Pending your profile , Please contact admin";
	errLangArr['res_owner_login_invalid']			= "Invalid Login";
    errLangArr['res_owner_login_delete']            = "Your account was deleted! Please contact administrator.";
	
	//Restaurant owner Forget Password
	errLangArr['res_owner_forgetpass_email']		= "Please Enter Email Address";
	errLangArr['res_owner_forgetpass_invalidemail']	= "Invalid Email Address";
	errLangArr['res_owner_forgetpass_sendemail']	= "Password has been sent to your email address";
	errLangArr['res_owner_forgetpass_notregemail']	= "This email address not registered";
	
	//Restaurant owner Category Edit
	errLangArr['res_owner_category_name']			= "Please enter category name";
	errLangArr['res_owner_category_exist']			= "Category Name Already Exist";
	errLangArr['res_owner_category_error']			= "Error occured";
    errLangArr['res_owner_category_upsucess']       = "Category updated successfully";
    
	
	//Restaurant owner Category Add New
	errLangArr['res_owner_categorynew_name']		= "Please enter category name";
	errLangArr['res_owner_categorynew_exist']		= "Category name already exist";
	errLangArr['res_owner_categorynew_error']		= "Error occured";
    errLangArr['res_owner_categorynew_adsucess']    = "Category added successfully";
	
	//Restaurant Owner Menu Add New
	errLangArr['res_owner_menunew_name']			= "Please enter menu name ";
	errLangArr['res_owner_menunew_catothers']		= "Please enter menu category others";
	errLangArr['res_owner_menunew_category']		= "Please select menu category";
	errLangArr['res_owner_menunew_catexist']		= "This Category already exists";
	errLangArr['res_owner_menunew_type']			= "Please select menu type";
	errLangArr['res_owner_menunew_menuexist']		= "Menu name already exist";
	errLangArr['res_owner_menunew_cuisine']			= "Please select menu cuisine";
	errLangArr['res_owner_menunew_price']			= "Please enter menu price";
	errLangArr['res_owner_menunew_correctprice']	= "Please enter correct menu price";
	
	//Restaurant Owner Menu Edit 
	errLangArr['res_owner_menuedit_name']			= "Please Enter menu name";
	errLangArr['res_owner_menuedit_category']		= "Please select menu category";
	errLangArr['res_owner_menuedit_catothers']		= "Please enter menu category others";
	errLangArr['res_owner_menuedit_catexist']		= "Other category already exist";
	errLangArr['res_owner_menuedit_type']			= "Please select menu type";
	errLangArr['res_owner_menuedit_menuexist']		= "Menu name already exist";
	errLangArr['res_owner_menuedit_cuisine']		= "Please select menu cuisine";
	errLangArr['res_owner_menuedit_price']			= "Please Enter menu price";
	errLangArr['res_owner_menuedit_desc']			= "Please Enter menu description";
	errLangArr['res_owner_menuedit_correctprice']	= "Please Enter correct menu price";
	
	//Restaurant Owner Addon New
	errLangArr['res_owner_addonnew_catname']		= "Please select category name";
	errLangArr['res_owner_addonnew_catnameothers']	= "Please enter category name other";
	errLangArr['res_owner_addonnew_name']			= "Please enter addons name";
	errLangArr['res_owner_addonnew_addonexist']		= "Addons name already exist";
	errLangArr['res_owner_addonnew_error']			= "Error occured";
    // new 14-5-2015
    errLangArr['res_owner_addon_added_success']     = "Addons added successfully";
	
	
	//Restaurant Owner Addon Edit	
	errLangArr['res_owner_addonedit_catname']		= "Please select category name";
	errLangArr['res_owner_addonedit_catnameothers']	= "Please enter category name other";
	errLangArr['res_owner_addonedit_name']			= "Please enter addons name";
	errLangArr['res_owner_addonedit_addonexist']	= "Addons name already Exist";
	errLangArr['res_owner_addonedit_error']			= "Error occured";
    // new 14-5-2015
    errLangArr['res_owner_addon_edit_success']      = "Addons updated successfully";
	
	//Restaurant Owner Offer New
	errLangArr['res_owner_offer_percentage']		= "Please enter offer percentage";
	errLangArr['res_owner_offer_validpercentage']	= "Please enter valid offer percentage";
	errLangArr['res_owner_offer_price']				= "Please enter offer price";
	errLangArr['res_owner_offer_validprice']		= "Please enter valid offer price";
	errLangArr['res_owner_offer_from']				= "Please enter offer from";
	errLangArr['res_owner_offer_to']				= "Please enter offer to";
	errLangArr['res_owner_offer_validto']			= "Please enter valid offer To";
	errLangArr['res_owner_offer_exist']				= "Offer already exist";
	errLangArr['res_owner_offer_error']				= "Error occured";
    // new 14-5-2015
    errLangArr['res_owner_offer_add_success']       = "Offer added successfully";
	
	//Restaurant Owner Offer Edit
	errLangArr['res_owner_offeredit_percentage']	= "Please enter offer percentage";
	errLangArr['res_owner_offeredit_validpercent']	= "Please enter valid offer percentage";
	errLangArr['res_owner_offeredit_price']			= "Please enter offer price";
	errLangArr['res_owner_offeredit_validprice']	= "Please enter valid offer price";
	errLangArr['res_owner_offeredit_from']			= "Please enter offer from";
	errLangArr['res_owner_offeredit_to']			= "Please enter offer to";
	errLangArr['res_owner_offeredit_validto']		= "Please enter valid offer to";
	errLangArr['res_owner_offeredit_exist']			= "Offer already exist";
	errLangArr['res_owner_offeredit_error']			= "Error occured";
    //ne w14-5-2015
    errLangArr['res_owner_offeredit_success']	    = "Offer updated successfully";
	
	
	//Restaurant Owner Account Info
	errLangArr['res_owner_account_resname']			= "Please enter restaurant name";
	errLangArr['res_owner_account_resphone']		= "Please enter restaurant phone";
	errLangArr['res_owner_account_resvalidphone']	= "Please enter valid restaurant phone";
	errLangArr['res_owner_account_validphoneless']	= "Please enter valid restaurant phone";
	errLangArr['res_owner_account_reswebsite']		= "Please enter restaurant website";
	errLangArr['res_owner_account_resvalidweb']		= "Please enter valid restaurant website";
	errLangArr['res_owner_account_resfax']			= "Please enter restaurant fax";
	errLangArr['res_owner_account_resstreetaddr']	= "Please enter restaurant street address";
	errLangArr['res_owner_account_resstate']		= "Please enter restaurant state";
	errLangArr['res_owner_account_rescity']			= "Please enter restaurant city";
	errLangArr['res_owner_account_reszip']			= "Please select restaurant zip";
	errLangArr['res_owner_account_contactname']		= "Please enter contact name";
	errLangArr['res_owner_account_contactphoneno']	= "Please enter contact phone number";
	errLangArr['res_owner_account_validphoneno']	= "Please enter valid contact phone number";
	errLangArr['res_owner_account_validphonenoless']= "Please enter valid contact phone number";
	errLangArr['res_owner_account_email']			= "Please enter email";
	errLangArr['res_owner_account_validemail']		= "Please enter valid email";
	errLangArr['res_owner_account_success']   		= "Your account info updated successfully";
	
	
	//Restaurant Owner Setting 
	//Contact And Location Info
	errLangArr['res_owner_setting_contactname']  	= "Please enter contact name";
	errLangArr['res_owner_setting_contactphoneno']  = "Please enter contact phone number";
	errLangArr['res_owner_setting_contactemail']  	= "Please enter email";
	errLangArr['res_owner_setting_validemail']  	= "Please enter valid email";
	errLangArr['res_owner_setting_contactpassword'] = "Please enter password";
	errLangArr['res_owner_setting_streetaddr']  	= "Please enter restaurant street address";
	errLangArr['res_owner_setting_resstate'] 	 	= "Please select restaurant state";
	errLangArr['res_owner_setting_rescity'] 	 	= "Please select restaurant city";
	errLangArr['res_owner_setting_reszip'] 	 		= "Please enter restaurant zip";
	errLangArr['res_owner_setting_contactsuccess'] 	= "Your contact info updated successfully";
	//changepassword
	errLangArr['res_owner_setting_oldpass'] 	 	= "Please enter old password";
	errLangArr['res_owner_setting_newpass'] 	 	= "Please enter new password";
	errLangArr['res_owner_setting_confirmpass'] 	= "Please enter confirm password";
	errLangArr['res_owner_setting_oldnewpass'] 	 	= "Old password and new password should not be same";
	errLangArr['res_owner_setting_newconfirm'] 	 	= "New password and confirm password should be same";
	errLangArr['res_owner_setting_invalidoldpass'] 	= "Invalid Old Password";
    //new 14-5-2015
    errLangArr['res_owner_pass_changed_success']    = "Password changed successfully";
	//Restaurant Info
	errLangArr['res_owner_setting_resinfo_name'] 	= "Please enter restaurant name";
    errLangArr['res_owner_setting_name_exists'] 	= "This Restaurant Name Already Exist";
	errLangArr['res_owner_setting_resinfo_phone'] 	= "Please enter restaurant phone";
	errLangArr['res_owner_setting_resinfo_valphone']= "Please enter valid restaurant phone";
	errLangArr['res_owner_setting_resinfo_phoneles']= "Please enter valid restaurant phone";
	errLangArr['res_owner_setting_resinfo_website'] = "Please enter restaurant website";
	errLangArr['res_owner_setting_resinfo_validweb']= "Please enter valid restaurant website";
	errLangArr['res_owner_setting_resinfo_fax'] 	= "Please enter restaurant fax";
	errLangArr['res_owner_setting_resinfo_aboutres']= "Please enter about restaurant";
	errLangArr['res_owner_setting_resinfo_pickup']  = "Please select pickup";
	errLangArr['res_owner_setting_resinfo_booktab']	= "Please select book a table";
	errLangArr['res_owner_setting_info_minorder']	= "Please enter minimum order price";
	errLangArr['res_owner_setting_info_validminord']= "Please enter valid minimum order price";
	errLangArr['res_owner_setting_info_valminord2']	= "Please enter valid minimum order price";
	errLangArr['res_owner_setting_info_salestax']	= "Please enter sales tax";
	errLangArr['res_owner_setting_info_valsalestax']= "Please enter valid sales tax";
	errLangArr['res_owner_setting_info_salestaxno']	= "Please enter valid sales tax";
    //new 14-5-2015
    errLangArr['res_owner_enter_mail']              = "Please enter e-mail for order mail";
    errLangArr['res_owner_enter_valid_mail']        = "Please enter valid e-mail for order mail";
    errLangArr['res_owner_info_update_success']    = "Your restaurant info updated successfully";
	//Restaurant Delivery
	errLangArr['res_owner_setting_delivery_select'] = "Please select delivery";
	errLangArr['res_owner_setting_delivery_esttime']= "Please enter restaurant estimated time";
     errLangArr['res_owner_setting_deliv_valesttime']= "Please enter valid estimated time";
	errLangArr['res_owner_setting_delivery_charge']	= "Please enter delivery charge";
	errLangArr['res_owner_setting_delivery_valchar']= "Please enter valid delivery charge";
	//new 14-5-2015
    errLangArr['res_owner_setting_delivery_miles']  = "Please enter delivert distance in miles";
    errLangArr['res_owner_delivery_up_success']     = "Your delivery info updated successfully";
    
	//Restaurant Bank Info
	errLangArr['res_owner_setting_bank_name'] 		= "Please enter bank name";
	errLangArr['res_owner_setting_bank_acno'] 		= "Please enter A/C no";
	errLangArr['res_owner_setting_routineno'] 		= "Please enter routine no";
	errLangArr['res_owner_setting_swiftno'] 		= "Please enter swift code";
	errLangArr['res_owner_setting_bank_update'] 	= "Your bank info is updated successfully";
	
	//Restaurant Invoice Info
	errLangArr['res_owner_setting_inv_time_period']	= "Please select invoice time period";
	errLangArr['res_owner_setting_invoice_update'] 	= "Your invoice time period is updated successfully";
	
    //First Time
	//Restaurant Open Close Time Monday
	errLangArr['res_owner_setting_monopenhr']		= "Please enter monday open hours";
	errLangArr['res_owner_setting_monopenmin']		= "Please enter monday open minutes";
	errLangArr['res_owner_setting_monclosehr']		= "Please enter monday close hours";
	errLangArr['res_owner_setting_monclosemin']		= "Please enter monday close minutes";
	//Restaurant Open Close Time Tuesday
	errLangArr['res_owner_setting_tueopenhr']		= "Please enter tuesday Open hours";
	errLangArr['res_owner_setting_tueopenmin']		= "Please enter tuesday Open minutes";
	errLangArr['res_owner_setting_tueclosehr']		= "Please enter tuesday Close hours";
	errLangArr['res_owner_setting_tueclosemin']		= "Please enter tuesday Close minutes";
	//Restaurant Open Close Time Wednesday
	errLangArr['res_owner_setting_wedopenhr']		= "Please enter wednesday open hours";
	errLangArr['res_owner_setting_wedopenmin']		= "Please enter wednesday open minutes";
	errLangArr['res_owner_setting_wedclosehr']		= "Please enter wednesday close hours";
	errLangArr['res_owner_setting_wedclosemin']		= "Please enter wednesday close minutes";
	//Restaurant Open Close Time Friday
	errLangArr['res_owner_setting_thuropenhr']		= "Please enter thursday open hours";
	errLangArr['res_owner_setting_thuropenmin']		= "Please enter thursday open minutes";
	errLangArr['res_owner_setting_thurclosehr']		= "Please enter thursday close hours";
	errLangArr['res_owner_setting_thurclosemin']	= "Please enter thursday close minutes";
	//Restaurant Open Close Time Thursday
	errLangArr['res_owner_setting_friopenhr']		= "Please enter friday open hours";
	errLangArr['res_owner_setting_friopenmin']		= "Please enter friday open minutes";
	errLangArr['res_owner_setting_friclosehr']		= "Please enter friday close hours";
	errLangArr['res_owner_setting_friclosemin']		= "Please enter friday close minutes";
	//Restaurant Open Close Time Saturday
	errLangArr['res_owner_setting_satopenhr']		= "Please enter saturday open hours";
	errLangArr['res_owner_setting_satopenmin']		= "Please enter saturday open minutes";
	errLangArr['res_owner_setting_satclosehr']		= "Please enter saturday close hours";
	errLangArr['res_owner_setting_satclosemin']		= "Please enter saturday close minutes";
	//Restaurant Open Close Time Sunday
	errLangArr['res_owner_setting_sunopenhr']		= "Please enter sunday open hours";
	errLangArr['res_owner_setting_sunopenmin']		= "Please enter sunday open minutes";
	errLangArr['res_owner_setting_sunclosehr']		= "Please enter sunday close hours";
	errLangArr['res_owner_setting_sunclosemin']		= "Please enter sunday close minutes";
    //new 14-5-2015
    errLangArr['res_open_close_up_success']         = "Your open close info updated successfully";
    
    //Second Time
    //Restaurant Open Close Time Monday
	errLangArr['res_owner_setting_monopenhr_sec']		= "Please enter monday open hours second";
	errLangArr['res_owner_setting_monopenmin_sec']		= "Please enter monday open minutes second";
	errLangArr['res_owner_setting_monclosehr_sec']		= "Please enter monday close hours second";
	errLangArr['res_owner_setting_monclosemin_sec']		= "Please enter monday close minutes second";
	//Restaurant Open Close Time Tuesday
	errLangArr['res_owner_setting_tueopenhr_sec']		= "Please enter tuesday Open hours second";
	errLangArr['res_owner_setting_tueopenmin_sec']		= "Please enter tuesday Open minutes second";
	errLangArr['res_owner_setting_tueclosehr_sec']		= "Please enter tuesday Close hours second";
	errLangArr['res_owner_setting_tueclosemin_sec']		= "Please enter tuesday Close minutes";
	//Restaurant Open Close Time Wednesday
	errLangArr['res_owner_setting_wedopenhr_sec']		= "Please enter wednesday open hours second";
	errLangArr['res_owner_setting_wedopenmin_sec']		= "Please enter wednesday open minutes second";
	errLangArr['res_owner_setting_wedclosehr_sec']		= "Please enter wednesday close hours second";
	errLangArr['res_owner_setting_wedclosemin_sec']		= "Please enter wednesday close minutes second";
	//Restaurant Open Close Time Friday
	errLangArr['res_owner_setting_thuropenhr_sec']		= "Please enter thursday open hours second";
	errLangArr['res_owner_setting_thuropenmin_sec']		= "Please enter thursday open minutes second";
	errLangArr['res_owner_setting_thurclosehr_sec']		= "Please enter thursday close hours second";
	errLangArr['res_owner_setting_thurclosemin_sec']	= "Please enter thursday close minutes second";
	//Restaurant Open Close Time Thursday
	errLangArr['res_owner_setting_friopenhr_sec']		= "Please enter friday open hours second";
	errLangArr['res_owner_setting_friopenmin_sec']		= "Please enter friday open minutes second";
	errLangArr['res_owner_setting_friclosehr_sec']		= "Please enter friday close hours second";
	errLangArr['res_owner_setting_friclosemin_sec']		= "Please enter friday close minutes second";
	//Restaurant Open Close Time Saturday
	errLangArr['res_owner_setting_satopenhr_sec']		= "Please enter saturday open hours second";
	errLangArr['res_owner_setting_satopenmin_sec']		= "Please enter saturday open minutes second";
	errLangArr['res_owner_setting_satclosehr_sec']		= "Please enter saturday close hours second";
	errLangArr['res_owner_setting_satclosemin_sec']		= "Please enter saturday close minutes second";
	//Restaurant Open Close Time Sunday
	errLangArr['res_owner_setting_sunopenhr_sec']		= "Please enter sunday open hours second";
	errLangArr['res_owner_setting_sunopenmin_sec']		= "Please enter sunday open minutes second";
	errLangArr['res_owner_setting_sunclosehr_sec']		= "Please enter sunday close hours second";
	errLangArr['res_owner_setting_sunclosemin_sec']		= "Please enter sunday close minutes second";
	
	
	//paymentinfo_paypal
	errLangArr['payment_paypal_contactname']		= "Please enter contact name";
	errLangArr['payment_paypal_contactlastname']	= "Please enter last name";
	errLangArr['payment_paypal_doorno']				= "Please enter delivery address door number";
	errLangArr['payment_paypal_street']				= "Please enter delivery street";
	errLangArr['payment_paypal_area']				= "Please enter delivery area";
	errLangArr['payment_paypal_validphoneno']		= "Please enter valid contact phone";
	errLangArr['payment_paypal_validlandline']		= "Please enter valid contact landline";
	errLangArr['payment_paypal_email']				= "Please enter contact email";
	errLangArr['payment_paypal_invalidemail']		= "Invalid Email Address";
	errLangArr['payment_paypal_deliverydate']		= "Please enter delivery date";
	errLangArr['payment_paypal_timehr']				= "Please enter time";
	errLangArr['payment_paypal_timemin']			= "Please enter time";
	errLangArr['payment_paypal_timesess']			= "Please enter time";			
	errLangArr['payment_paypal_mailexist']			= "This email id is already exist";
	errLangArr['payment_paypal_timesess']			= "Please enter time";
	errLangArr['payment_paypal_timesess']			= "Please enter time";
	errLangArr['payment_paypal_timesess']			= "Please enter time";
	errLangArr['payment_paypal_timesess']			= "Please enter time";
	errLangArr['payment_paypal_timesess']			= "Please enter time";
	
	//Alert Messages
	errLangArr['alert_message_indexarea']			= "Please enter search area name";
	errLangArr['alert_message_indexcuisine']		= "Please enter search cuisine name";
	errLangArr['alert_message_indexresname']		= "Please enter search restaurant name";
	errLangArr['alert_message_searcharea']			= "Please enter search area name";
	errLangArr['alert_message_searchcuisine']		= "Please enter search cuisine name";
	errLangArr['alert_message_searchresname']		= "Please enter search restaurant name";
	
	//submitOrder
	errLangArr['submit_order_contactname']			= "Please enter contact name";
	errLangArr['submit_order_contactlastname']		= "Please enter last name";
    errLangArr['submit_order_addresstitle']	    	= "Please enter a title for your address";
	errLangArr['submit_order_doorno']				= "Please enter delivery address door number";
	errLangArr['submit_order_street']				= "Please enter delivery street";
	errLangArr['submit_order_area']					= "Please enter delivery area";
	errLangArr['submit_order_city']					= "Please enter delivery city";
	errLangArr['submit_order_zip']					= "Please enter delivery zip";
	errLangArr['submit_order_state']				= "Please enter delivery state";
	errLangArr['submit_order_contactphone']			= "Please enter contact phone";
	errLangArr['submit_order_validphoneno']			= "Please enter valid contact phone";
	errLangArr['submit_order_validlandline']		= "Please enter valid contact landline";
	errLangArr['submit_order_email']				= "Please enter contact email";
	errLangArr['submit_order_invalidemail']			= "Invalid Email Address";
	errLangArr['submit_order_deliverydate']			= "Please enter delivery date";
	errLangArr['submit_order_pickupdate']			= "Please enter pickup date";
	errLangArr['submit_order_timehr']				= "Please enter time";
	errLangArr['submit_order_timemin']				= "Please enter time";
	errLangArr['submit_order_timesess']				= "Please enter time";
	errLangArr['submit_order_mailexist']			= "This email id is already exist";
    errLangArr['submit_order_password']             = "Please enter password";
    errLangArr['submit_order_terms_conditions']     = "Please accept terms and conditions";
    errLangArr['submit_acc_deactivate']             = "Your account is deactivated...Please contact to admin";
	
	//Restaurant Details - Add & Remove favorites
	errLangArr['res_det_myfav_content_add'] 		= "Add this restaurant to favorites";
	errLangArr['res_det_myfav_content_remove'] 		= "Remove this restaurant from favorites";
	
	//ContactUs
	errLangArr['contact_contactname']			= 'Please enter contact name';
	errLangArr['conatct_valid_contactname']		= 'Please enter valid contact name';
	errLangArr['contact_email']					= 'Please enter contact email address';
	errLangArr['conatct_valid_contactmail']		= 'Please enter valid email address';
	errLangArr['contact_code']					= 'Please enter security code';
	errLangArr['contact_valid_code']			= 'Please enter correct security code';
	
	//Restaurant Details - Add & Remove favorites
	errLangArr['res_det_myfav_content_add'] 		= "Add this restaurant to favorites";
	errLangArr['res_det_myfav_content_remove'] 		= "Remove this restaurant from favorites";
	
	//Site Feedback
	errLangArr['site_feedback_empty'] 				= "Please enter feedback";
	errLangArr['site_feedback_success_msg'] 		= "Your feedback has been sent successfully";
	
	
	//restaurant details Booking table	
	errLangArr['booking_numguests']				= 'Please choose number of guests';
	errLangArr['booking_date']					= 'Please choose booking date';
	errLangArr['booking_hour']					= 'Please choose booking hours';
	errLangArr['booking_minutes']				= 'Please choose booking minutes';
	errLangArr['booking_session']				= 'Please choose booking session';
	errLangArr['booking_name']					= 'Please enter name';
	errLangArr['booking_namealpha']				= 'Name should be alphabets';
	errLangArr['booking_email']					= 'Please enter email';
	errLangArr['booking_invalidemail']			= 'Invalid email';
	errLangArr['booking_mobileno']				= 'Please enter your mobile number';
	errLangArr['booking_invalidmobileno']		= 'Please enter valid mobile number';
	errLangArr['booking_lessmobileno']			= 'Invalid mobile number';
	errLangArr['booking_success']				= 'Booked Successfully';
	
	//common
	errLangArr['common_plese_enter_yourname']	= "Please enter your Name";
	errLangArr['common_plese_enter_youremail']	= "Please enter your Email";	
	errLangArr['common_plese_enter_validmail']	= "Please enter valid Email";
	errLangArr['common_plese_enter_yourcountry']= "Please enter your Country";
	errLangArr['common_plz_enter_valideaddress']= "Please Enter Valid Email Address";
	errLangArr['common_error_occured']			= "Error Occured";
	errLangArr['common_invalid_email_id']		= "Invalid Email Id";	
	errLangArr['common_fbinvalid_email_id']		= "Invalid Email Id";
	errLangArr['common_please_enter_name']		= "Please enter name";
	errLangArr['common_please_enter_validname']	= "Please enter valid name";
	errLangArr['common_please_enter_email']		= "Please enter email id";
	errLangArr['common_please_enter_validemail']= "Please enter valid email id";
	errLangArr['common_please_enter_country']	= "Please enter country";
	errLangArr['common_please_enter_message']	= "Please enter message";
	errLangArr['common_please_enter_vnumber']	= "Please enter verify number";
	errLangArr['common_invalid_email_id']		= "Invalid Email Id";
	errLangArr['common_fbinvalid_email_id']		= "Invalid Email Id";
	errLangArr['common_please_enter_name']		= "Please enter name";
	errLangArr['common_please_enter_validname']	= "Please enter valid name";	
	errLangArr['common_please_enter_emailid']	= "Please enter email id";
	errLangArr['common_please_enter_validid']	= "Please enter valid email id";
	errLangArr['common_please_enter_country']	= "Please enter country";
	errLangArr['common_please_enter_message']	= "Please enter message";
	errLangArr['common_please_verifynumber']	= "Please enter verify number";	
	errLangArr['common_please_enter_code']		= "Please enter correct code";
	errLangArr['common_your_detail_success']	= "Your details successfully send.";	
	
	//customer
	errLangArr['customer_please_select_state']	= "Please select state value";
	errLangArr['customer_please_select_city']	= "Please select city value";
	errLangArr['customer_please_select_zipcode']= "please choose zipcode value";
	errLangArr['customer_email_already_exists']	= "This email id already exist";	
	errLangArr['customer_pwd_has_been_sent']	= "Password has been sent to your email address";
	errLangArr['customer_email_address_not_reg']= "This email address not registered";
	errLangArr['customer_please_enter_sec_cus']	= "Please enter secondary customer name";
	errLangArr['customer_please_enter_sec_addr']= "Please enter secondary customer address";
	errLangArr['customer_pleaseenter_secstreet']= "Please enter secondary customer street";
	errLangArr['customer_pleaseenter_area']		= "Please enter secondary customer area";
	errLangArr['customer_pleaseenter_city']		= "Please enter secondary customer city";
	errLangArr['customer_pleaseenter_cellphone']= "Please enter secondary customer cellphone";
	errLangArr['customer_entervalidcellphone']	= "Please enter valid secondary customer cellphone";
	errLangArr['customer_entervalidlandline']	= "Please enter valid secondary landline number";
	errLangArr['customer_sec_address_has_been']	= "Secondary address has been updated successfully";	
	errLangArr['customer_already_review_posted']= "Already review posted this order";		
	errLangArr['customer_please_select_rating']	= "Please select rating";		
	errLangArr['customer_please_enter_message']	= "Please enter your message";
	errLangArr['customer_your_review_has_been']	= "Your reviews has been sent successfully";
	
	//retaurant owner myaccount
	errLangArr['resmyccount_enter_menu_cat']	= "Please enter menu category";	
	errLangArr['resmyccount_enter_valid_menuna']= "Please enter valid menu name";
	errLangArr['resmyccount_menuname_exist']	= "Menu name already exist";
	errLangArr['resmyccount_plz_enter_cuisine']	= "Please enter menu cuisine";
	errLangArr['resmyccount_plz_sel_pizza_size']= "Please Select any one pizza size";
	errLangArr['resmyccount_plz_enter_small']	= "Please enter small value";
	errLangArr['resmyccount_plz_enter_medium']	= "Please enter medium value";	
	errLangArr['resmyccount_plz_enter_large']	= "Please enter large value";
	errLangArr['resmyccount_menuname_alr_exist']= "Menu name already exist";
	errLangArr['resmyccount_plz_enter_menucui']	= "Please enter menu cuisine";
	errLangArr['resmyccount_plz_enter_menuname']= "Please enter valid manu name";
	errLangArr['resmyccount_pl_enter_menuprice']= "Please enter menu price";
	errLangArr['resmycc_plz_enter_valid_menu']	= "Please enter valid menu price";
	errLangArr['resmycc_plz_valid_menu_price']	= "Please enter valid menu price";
	errLangArr['resmyccount_catmenuname_exist']	= "Menu name already exist";
	errLangArr['resmyccount_menuname_menucui']	= "Please enter menu cuisine";
    //new 14-5-2015
    errLangArr['resmyccount_choose_menu_price'] = "Please choose menu price options";
    errLangArr['resmyccount_choose_valid_price']= "Please enter valid price";
    errLangArr['resmyccount_choose_menu_size']  = "Please choose menu size";
    errLangArr['resmyccount_ent_smal_men_size'] = "Please enter small menu price";
    errLangArr['resmyccount_ent_med_men_size']  = "Please enter medium menu price";
    errLangArr['resmyccount_ent_lar_men_size']  = "Please enter large menu price";
    errLangArr['resmyccount_ent_sli_nam_size']  = "Please enter slice name with price";
    errLangArr['resmyccount_menu_updat_success']= "Menu updated successfully";
    errLangArr['resmyccount_add_atl_one_slice'] = "Please add atleast one slice";
    errLangArr['resmyccount_menu_added_success']= "Menu added successfully";
	
	
	errLangArr['resmycc_plz_enter_slice_name']	= "Please enter slice name";
	errLangArr['resmycc_plz_enter_slice_price']	= "Please enter slice price";
	errLangArr['resmycc_plz_ent_valid__price1']	= "Please enter valid slice price";
	errLangArr['resmycc_plz_ent_valid_price2']	= "Please enter valid slice price";
	errLangArr['resmycc_menu_name_exist']		= "Menu name already exist";
	errLangArr['resmycc_menu_name_alreadyexist']= "Menu name already exist";
	
	errLangArr['resmycc_please_sel_one_pizza']	= "Please select any one pizza size";
	errLangArr['resmycc_please_enter_small_val']= "Please enter small value";
	errLangArr['resmycc_please_enter_med_val']	= "Please enter medium value";
	errLangArr['resmycc_please_enter_large_val']= "Please enter large value";
	errLangArr['resmycc_menuname_alre_exist']	= "Menu name already exist";
	errLangArr['resmycc_please_enter_mcuisine']	= "Please enter menu cuisine";
	
	errLangArr['resmycc_please_enter_menuprice']= "Please enter menu price";	
	errLangArr['resmycc_enter_valid_menuprice']	= "Please enter valid menu price";
	errLangArr['resmycc_enter_valid_menuprice1']= "Please enter valid menu price";
	
	errLangArr['resmycc_please_enter_slice_nam']= "Please enter slice name";
	errLangArr['resmycc_please_entersliceprice']= "Please enter slice price";
	errLangArr['resmycc_enter_val_sliceprice1']	= "Please enter valid size price";
	errLangArr['resmycc_enter_val_sliceprice2']	= "Please enter valid size price";
	errLangArr['resmycc_menunamealready_exist1']= "Menu name already exist";
	errLangArr['resmycc_menunamealready_exist2']= "Menu name already exist";
	
	errLangArr['resmycc_shoaddon_enter_menucat']= "Please enter menu category";
	errLangArr['resmycc_must_select_atleast1']	= "Must select at least 1 serving cuisines";
	errLangArr['resmycc_must_sel_atleast_1area']= "Must select at least 1 serving areas";
	errLangArr['resmycc_plz_sel_mon_open_time']	= "Please select monday opening time";
	errLangArr['resmycc_plz_sel_mon_close_time']= "Please select monday closeing time";
	errLangArr['resmycc_plz_enter_videocontent']= "Please enter video content";	
	errLangArr['resmycc_value_update_success']	= "Value updated successfully";	
	errLangArr['resmycc_error_occured']			= "Error occured";
	errLangArr['resmycc_bank_error_occured']	= "Error Occured";
	errLangArr['resmycc_invoice_error_occured']	= "Error Occured";
	errLangArr['resmycc_please_enter_from_date']= "Please enter from date";
	errLangArr['resmycc_please_enter_to_date']	= "Please enter to date";
	errLangArr['resmycc_please_update_valphoto']= "Please upload valid format(jpg,jpeg,gif)";
	errLangArr['resmycc_photo']					= "Photo";
	errLangArr['resmycc_deleted_successfully']	= "Deleted Successfully";	
	errLangArr['resmycc_delete_error_occured']	= "Error occured";
	errLangArr['resmycc_delete_error']			= "error";
	errLangArr['resmycc_logo_deleted_success']	= "Logo deleted successfully";
	errLangArr['resmycc_logo_error']			= "error";	
	errLangArr['resmycc_banner_error']			= "error";
	errLangArr['resmycc_banner_error_occured']	= "Error occured";
    //new 14-5-2015
    errLangArr['resmycc_sel_mon_sec_open_time'] = "Please select monday second opening time";
    errLangArr['resmycc_sel_mon_sec_clo_time']  = "Please select monday Second closing time";
	
	//restaurant detail
	errLangArr['resdetail_you_can_select_max']	= "You can select maximum ";
	errLangArr['resdetail_addons_only']			= "addons only";
	errLangArr['resdetail_myfav_error_occured']	= "Error Occured";	
	errLangArr['resdetail_minus_error_occured']	= "Error Occured";
	errLangArr['resdetail_val_error_occured']	= "Error Occured";
	
	//checkout
	errLangArr['resdetail_checkout_error']		= "Error";
	
	//cearchresult Gmap
	errLangArr['searchresult_geocode']			= "Geocode was not successful for the following reason: ";
		 
	return errLangArr;
}