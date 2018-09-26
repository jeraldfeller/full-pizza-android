//text box check value script word is there or not
$("input[type=text],textarea").keyup(function(){
    var output = $(this).val();
    //alert(output);
    if(output.toLowerCase().match(/script/)) {
        $(this).val('');
	    alert("Please Avoid java script related codes");    
	}
});	


//***********NUEVOS CHANGES CARLOS ********* */


$(document).ready(function(){
	
	//Customer Owner My Account Tab
	$(".myaccInnerNewMenuUlNew li").click(function() { //When click open tab (antes era .myaccInnerNewMenuUl)
		
		$(".myaccInnerNewMenuUlNew li").removeClass("active");
		$(".customerTabContent").hide();
		
		$(this).addClass("active"); 
		var activeTab = $(this).attr("id");
		if(activeTab == 'customer_myorder'){
			$('#cus_myorder').show();
			$('#cus_fullorder').hide();
		}
		//alert(activeTab);
		$('#'+activeTab+'_content').show();
		
		//$('#loadingimg').html('<div style="text-align:center;min-height:500px;"><img src="'+jssitebaseUrl +'/images/loader.gif" border="0" alt="Loading" /></div>').show();
		//$('#loadingimg').html('<div class="addtocartloading"><img src="'+jssitebaseUrl +'/theme/default/images/loader.gif" border="0" alt="Loading" /><span>Please wait...</span></div>').show();
		//setTimeout(function(){
		//	 $("#loadingimg").hide(); 
		//	 $('#'+activeTab+'_content').show();
		//}, 100);
		
	});
	
});







//***********FIN NUEVOS CHANGES CARLOS ********* */


//------------------------------------------------------------------------------------
//customerResetValidate
function customerResetValidate(){
	
	//alert("sri");
	
	//Error Language
	var err_lang_arr = error_language();
	
	var resetpassword  = $("#customer_resetpassword").val();
	var retypepassword = $("#customer_retypepassword").val();
	
	$("#resetsuccess").hide();
	
	if(resetpassword == ''){
		
		//$("#errormsg").addClass('errormsg').html(err_lang_arr['enter_your_reset_password']);
        $("#errormsg").addClass('errormsg').html(err_lang_arr['enter_your_reset_password']);
		$("#customer_resetpassword").focus();
        //$("#customer_resetpassword").parent().parent().addClass("has-error");
		return false;		
	}
    
    
	if(retypepassword == ''){
		
		//$("#errormsg").addClass('errormsg').html(err_lang_arr['enter_your_retype_password']);
        $("#errormsg").addClass('errormsg').html(err_lang_arr['enter_your_retype_password']);
		$("#customer_retypepassword").focus();
        //$("#customer_retypepassword").parent().parent().addClass("has-error");
		return false;		
	}
    
	if(resetpassword != retypepassword){
	    //$("#errormsg").addClass('errormsg').html(err_lang_arr['enter_your_wrong_password']);   
		$("#errormsg").addClass('errormsg').html(err_lang_arr['enter_your_wrong_password']);
		$("#customer_retypepassword").focus();
        //$("#customer_retypepassword").parent().parent().addClass("has-error");
		return false;
	}
	//return false;
	
}
//------------------------------------------------------------------------------------
//Customer Register Validate
function customerRegisterValidate(){
	
	
	//Error Language
	var err_lang_arr = error_language();
	
	var customername 			= $.trim($("#customer_name").val());
	var customerlastname 		= $.trim($("#customer_lastname").val());
	var customeraddresstitle	= $.trim($("#customer_address_title").val());
	var customerstreet 			= $.trim($("#customer_street").val());
	var customerbuildtype 		= $.trim($("#customer_buildtype").val());
	var customercrossstreet 	= $.trim($("#customer_crossstreet").val());
	var customerzip 		    = $.trim($("#customer_zip").val());
	var customercity 			= $.trim($("#customer_city").val());
	var customerstate 	    	= $.trim($("#customer_state").val());
	var customerphone 			= $.trim($("#customer_phone").val());
	var customeremail 			= $.trim($("#customer_email").val());
	var customerconemail 		= $.trim($("#customer_email_confirm").val());
	var customerpassword 		= $.trim($("#customer_password").val());
	var customerconpassword 	= $.trim($("#customer_conpassword").val());


	
	if($("#customer_news").is(":checked") == true){
		var newsletter				= 'Yes';
	}else{
		var newsletter				= 'No';
	}
	
	var nameRegex = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
	
	$(".errormsg").html('');
	//alert(customerstate);
	//alert(customercity);
	//alert(customerzip);
	$("#customerregistersubmit").prop("disabled",true);
	if(customername == ''){
	    $("#customerregistersubmit").prop("disabled",false);
		$("#cusnameerrormsg").addClass('errormsg').html(err_lang_arr['cus_reg_empty_name']);
		$("#customer_name").focus();
		$("#customer_name").parent().parent().addClass("has-error");
		return false;		
	}
	else{
	    $("#customerregistersubmit").prop("disabled",false);
		$("#customer_name").parent().parent().removeClass("has-error");
	}
	/*if(!customername.match(nameRegex)) {
	    $("#errormsg").addClass('errormsg').html(err_lang_arr['cus_reg_correct_name']);
	    $("#customer_name").focus();
	    $("#customer_name").select();
	    return false;
  	}*/
	if(customerlastname == ''){
	    $("#customerregistersubmit").prop("disabled",false);
		$("#cuslastnameerrormsg").addClass('errormsg').html(err_lang_arr['cus_reg_empty_lastname']);
		$("#customer_lastname").focus();
		$("#customer_lastname").parent().parent().addClass("has-error");
		/*$("#customer_lastname").next().append('<i class="glyphicon glyphicon-remove form-control-feedback"></i>');*/
		return false;		
	}
	else{
	    $("#customerregistersubmit").prop("disabled",false);
		$("#customer_lastname").parent().parent().removeClass("has-error");
	}
	/*if(customeraddresstitle == ''){
        $("#customerregistersubmit").prop("disabled",false);
		$("#titleerrormsg").addClass('errormsg').html(err_lang_arr['cus_reg_empty_address_title']);
		$("#customer_address_title").focus();
		$("#customer_address_title").parent().parent().addClass("has-error");
		return false;
	} 
	else{
	    $("#customerregistersubmit").prop("disabled",false);
		$("#customer_address_title").parent().parent().removeClass("has-error");
	}
	if((customerstreet) == ''){
	    $("#customerregistersubmit").prop("disabled",false);
		$("#cusstreeterrormsg").addClass('errormsg').html(err_lang_arr['cus_reg_empty_street']);
		$("#customer_street").focus();
		$("#customer_street").parent().parent().addClass("has-error");
		return false;	
	}
	else{
	    $("#customerregistersubmit").prop("disabled",false);
		$("#customer_street").parent().parent().removeClass("has-error");
	}
	
	if(customerstate == ''){
	    $("#customerregistersubmit").prop("disabled",false);
		$("#cusstateerrormsg").addClass('errormsg').html(err_lang_arr['cus_reg_empty_state']);
		$("#customer_state").focus();
		$("#customer_state").parent().parent().addClass("has-error");
		return false;		
	} 
	else{
	    $("#customerregistersubmit").prop("disabled",false);
		$("#customer_state").parent().parent().removeClass("has-error");
	}
	if(customercity == ''){
	    $("#customerregistersubmit").prop("disabled",false);
		$("#cuscityerrormsg").addClass('errormsg').html(err_lang_arr['cus_reg_empty_city']);
		$("#customer_city").focus();
		$("#customer_city").parent().parent().addClass("has-error");
		return false;		
	}
	else{
	    $("#customerregistersubmit").prop("disabled",false);
		$("#customer_city").parent().parent().removeClass("has-error");
	}
	if(customerzip == '' || customerzip == 'Zip Code'){
	    $("#customerregistersubmit").prop("disabled",false);
		$("#cusziperrormsg").addClass('errormsg').html(err_lang_arr['cus_reg_empty_zip']);
		$("#customer_zip").focus();
        $("#customer_zip").parent().parent().addClass("has-error");
		return false;		
	}else{
	    $("#customerregistersubmit").prop("disabled",false);
		$("#customer_zip").parent().parent().removeClass("has-error");
	}*/
	
/*	if(customerzip == ''){
		$("#cusziperrormsg").addClass('errormsg').html(err_lang_arr['cus_reg_empty_zip']);
		$("#customer_zip").focus();
		return false;		
	}
	else if(isNaN(customerzip)){
		$("#cusziperrormsg").addClass('errormsg').html(err_lang_arr['cus_reg_correct_zip']);
		$("#customer_zip").focus();
		$("#customer_zip").select();
		return false;		
	}
	
	*/
	
	
	/*if(customercity != ''){
		if(!customercity.match(nameRegex)){
			$("#cuscityerrormsg").addClass('errormsg').html(err_lang_arr['cus_reg_correct_city']);
			$("#customer_city").focus();
			$("#customer_city").select();
			return false;
		}	
	}
	
	if(customerstate != ''){
		if(!customerstate.match(nameRegex)){
			$("#cuscityerrormsg").addClass('errormsg').html(err_lang_arr['cus_reg_correct_state']);
			$("#customer_state").focus();
			$("#customer_state").select();
			return false;	
		}	
	}*/
	
	if(customerphone == ''){
	    $("#customerregistersubmit").prop("disabled",false);
		$("#cusphoneerrormsg").addClass('errormsg').html(err_lang_arr['cus_reg_empty_phone']);
		$("#customer_phone").focus();
		$("#customer_phone").parent().parent().addClass("has-error");
		return false;	
	}
	else if(isNaN(customerphone)){
	    $("#customerregistersubmit").prop("disabled",false);
		$("#cusphoneerrormsg").addClass('errormsg').html(err_lang_arr['cus_reg_correct_phone']);
		$("#customer_phone").focus();
		$("#customer_phone").select();
		$("#customer_phone").parent().parent().addClass("has-error");
		return false;	
	}
	else{$("#customerregistersubmit").prop("disabled",false);
    $("#customer_phone").parent().parent().removeClass("has-error");}
	

	
	//alert(customeraddresslabel);
	
	
	if(customeremail == ''){
	    $("#customerregistersubmit").prop("disabled",false);
		$("#cusemailerrormsg").addClass('errormsg').html(err_lang_arr['cus_reg_empty_email']);
		$("#customer_email").focus();
		$("#customer_email").parent().parent().addClass("has-error");
		return false;		
	}
	else{
	   $("#customerregistersubmit").prop("disabled",false);
       $("#customer_email").parent().parent().removeClass("has-error");}
	if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(customeremail))){
	    $("#customerregistersubmit").prop("disabled",false);
	   	$("#cusemailerrormsg").addClass('errormsg').html(err_lang_arr['cus_reg_invalid_email']).show();
		$("#customer_email").focus();
			$("#customer_email").parent().parent().addClass("has-error");
		return false;
    }
	else{
	   $("#customerregistersubmit").prop("disabled",false);
       $("#customer_email").parent().parent().removeClass("has-error");}

       //confirm
       if(customerconemail == '') {
       		$("#customerregistersubmit").prop("disabled",false);
			$("#cusemailconerrormsg").addClass('errormsg').html(err_lang_arr['cus_reg_confirm_email_empty']);
			$("#customer_email_confirm").focus();
			$("#customer_email_confirm").parent().parent().addClass("has-error");
			return false;
       } 
       else{
	       	if(customerconemail != customeremail) {
				$("#customerregistersubmit").prop("disabled",false);
				$("#cusemailconerrormsg").addClass('errormsg').html(err_lang_arr['cus_reg_confirm_email']);
				$("#customer_email_confirm").focus();
				$("#customer_email_confirm").parent().parent().addClass("has-error");
				return false;
			}
       }
       
	
	/*if((customerpassword) == ''){
		$("#errormsg").addClass('errormsg').html(err_lang_arr['cus_reg_empty_password']);
		$("#customer_password").focus();
		return false;	
	}
	if((customerconpassword) == ''){
		$("#errormsg").addClass('errormsg').html(err_lang_arr['cus_reg_empty_conpassword']);
		$("#customer_conpassword").focus();
		return false;	
	}
	if(customerpassword != customerconpassword){
		$("#errormsg").addClass('errormsg').html(err_lang_arr['cus_reg_invalid_password']);
		$("#customer_password").focus();
		return false;
	}*/
	//alert("sri");

	if(customeremail != ''){
	    $("#customerregistersubmit").prop("disabled",true);
		$.post(jssitebaseUrl+useFile,{'customeremail':customeremail,'action':'checkCustomerEmail'}, function(output){
			//alert(output);
			if(output > '0'){
			    $("#customerregistersubmit").prop("disabled",false);
				$("#cusemailerrormsg").addClass('errormsg').html(err_lang_arr['customer_email_already_exists']).show();
				$("#customer_email").parent().parent().addClass("has-error");
			}else {
				if((customerpassword) == ''){
                    $("#customerregistersubmit").prop("disabled",false);
					$("#cuspasserrormsg").addClass('errormsg').html(err_lang_arr['cus_reg_empty_password']);
					$("#customer_password").focus();
					$("#customer_password").parent().parent().addClass("has-error");
					return false;	
				}else{
				    $("#customerregistersubmit").prop("disabled",false);
                    $("#customer_password").parent().parent().removeClass("has-error");}
				if((customerconpassword) == ''){
				    $("#customerregistersubmit").prop("disabled",false);
					$("#cusconpasserrormsg").addClass('errormsg').html(err_lang_arr['cus_reg_empty_conpassword']);
					$("#customer_conpassword").focus();
					$("#customer_conpassword").parent().parent().addClass("has-error");
					return false;	
				}else{
				    $("#customerregistersubmit").prop("disabled",false);
                    $("#customer_conpassword").parent().parent().removeClass("has-error");}
				if(customerpassword != customerconpassword){
				    $("#customerregistersubmit").prop("disabled",false);
					$("#cusconpasserrormsg").addClass('errormsg').html(err_lang_arr['cus_reg_invalid_password']);
					$("#customer_conpassword").focus();
					$("#customer_conpassword").parent().parent().addClass("has-error");
					return false;
				}else{
				    $("#customerregistersubmit").prop("disabled",false);
                    $("#customer_conpassword").parent().parent().removeClass("has-error");}   
                $("#customer_terms").prop("checked",true);             
				if($("#customer_terms").is(":checked") == false){					
				    $("#customerregistersubmit").prop("disabled",false);
					$("#custermerror").addClass('errormsg').html(err_lang_arr['cus_reg_accept_terms']);
					$("#customer_terms").focus();
					$("#customer_terms").parent().parent().addClass("has-error");
					return false;
				}else{					
				    $("#customerregistersubmit").prop("disabled",false);
                    $("#customer_terms").parent().parent().removeClass("has-error");}
				$("#customerregistersubmit").prop("disabled",true);
				$.post(jssitebaseUrl+useFile,{"customername":customername, "customerlastname":customerlastname,"add_title":customeraddresstitle,  "customerstreet":customerstreet,"customerbuildtype":customerbuildtype,"customercrossstreet":customercrossstreet,"customerzip":customerzip,"customercity":customercity,"customerstate":customerstate,"customerphone":customerphone,"newsletter":newsletter,"customeremail":customeremail,"customerpassword":customerpassword,"action":"customerregister"},function(output){
					//alert(output);
					if(output == 'customer_success'){					
						//window.location = jssitebaseUrl+"/customerMyaccount.php";
						$("#customerregistersubmit").prop("disabled",true);
						if(jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook'){
							//window.location = jssitebaseUrl+"/success.php?action=cusRegSucc";
							window.location = jssitebaseUrl+"/home.php";
						}else{
							window.location = jssitebaseUrl+"/home.php";
						}
					}
				});
				return false;
			}
		});
		return false;
	}

	
	/*$.post(jssitebaseUrl+'/ajaxFile.php',{"customername":customername,"customerstreet":customerstreet,"customerbuildtype":customerbuildtype,"customercrossstreet":customercrossstreet,"customerzip":customerzip,"customercity":customercity,"customerstate":customerstate,"customerphone":customerphone,"customeraddresslabel":customeraddresslabel,"customeremail":customeremail,"customerpassword":customerpassword,"action":"customerregister"},function(output){
		
		if(output == 'customer_success'){
			window.location = jssitebaseUrl+"/customerMyaccount.php";
			//window.location = jssitebaseUrl+"/index.php";
		}
	});
	return false;*/
	
}
//------------------------------------------------------------------------------------------
//customer subscribe newsletter


//-------------------------------------------------------------------------------------------
//Customer Login Validate
function customerLoginValidate(){
	//alert("sri");
	//Error Language
	
	var err_lang_arr = error_language();
	
	var customerlogemail 		= $("#customer_logemail").val();
	var customerlogpassword 	= $("#customer_logpassword").val();
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var pagetype = $('#pagetype').val();
    
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
	
	//alert(customerlogemail);
	//alert(customerlogpassword);
	
	if(document.getElementById('rememberme').checked == true){
		var rememberme = $("#rememberme").val();
	}
    else{
		var rememberme = "";
	}
	$(".errormsg").html('');
	$("#loginsuccess").hide();
	if(customerlogemail == '' || customerlogemail == 'email'){
		$(".errormsg_login").addClass('errClass1').html(err_lang_arr['cus_login_email_empty']);
		$("#customer_logemail").focus();
		$("#customer_logemail").parent().parent().addClass("has-error");
		return false;		
	}
	else{
		$("#customer_logemail").parent().parent().removeClass("has-error");
	}
	//if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(customerlogemail))){
	if(!(reg.test(customerlogemail))){
	   	$(".errormsg_login").addClass('errClass1').html(err_lang_arr['cus_login_email_valid']);
		$("#customer_logemail").focus();
		$("#customer_logemail").parent().parent().addClass("has-error");
		return false;
    }
	else{
		$("#customer_logemail").parent().parent().removeClass("has-error");
	}
	if((customerlogpassword) == '' || customerlogpassword == 'password'){
		
		$(".errormsg_login").addClass('errClass1').html(err_lang_arr['cus_login_pass_empty']);
		$("#customer_logpassword").focus();
		$("#customer_logpassword").parent().parent().addClass("has-error");
		return false;	
	}
	else{
		$("#customer_logpassword").parent().parent().removeClass("has-error");
	}
	//return false;
	if(customerlogemail != '' && customerlogpassword != ''){

		console.log("jssitebaseUrl: " + jssitebaseUrl);
		console.log("useFile: " + useFile);
		console.log("customerlogemail: " + customerlogemail);
		console.log("customerlogpassword: " + customerlogpassword);
		console.log("rememberme: " + rememberme);


		$.post(jssitebaseUrl+useFile,{'customerlogemail':customerlogemail,'customerlogpassword':customerlogpassword,'rememberme':rememberme,'action':'customerlogin'}, function(output){
		//alert(output);
			if(output == 'Deactivated'){
				$(".errormsg_login").addClass('errClass1').html(err_lang_arr['cus_login_account_deacivate']).show();
				return false;
			}else if(output == 'Pending'){
				$(".errormsg_login").addClass('errClass1').html(err_lang_arr['cus_login_account_pending']).show();
				return false;
			}else if(output == 'Deleted'){
				$(".errormsg_login").addClass('errClass1').html(err_lang_arr['cus_login_account_deleted']).show();
				return false;
			}else if(output == 'Invalid_Login'){
				$(".errormsg_login").addClass('errClass1').html(err_lang_arr['cus_login_invalid']).show();
				return false;
			}else{
				$(".errormsg_login").removeClass('errClass1');
                $(".errormsg_login").addClass('succmsg').html(err_lang_arr['cus_login_success']).show();
                
                setTimeout(function() {
                    if(pagetype != ''){
                        document.customerlogin.submit();
                    }else{
                        window.location = jssitebaseUrl+"/customerMyaccount.php";
                    }
				    
                }, 2000);  
			} 
		});
	}
	return false;
}
//-------------------------------------------------------------------------------------------
//Customer Register Validate
function customerLoginValidate_header(){
	
	//Error Language
	var err_lang_arr = error_language();
	
	var customerlogemail 		= $(".customer_logemail_head").val();
	var customerlogpassword 	= $(".customer_logpassword_head").val();
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var pagetype = $('#pagetype1').val();
    
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
	
	//alert(customerlogemail);
	//alert(customerlogpassword);
	
	if(document.getElementById('rememberme').checked == true){
		var rememberme = $("#rememberme").val();
	}else{
		var rememberme = "";
	}
	$(".errormsg").html('');
	
	if(customerlogemail == '' || customerlogemail == 'email'){
		$(".errormsg_login_head").addClass('errormsg').html(err_lang_arr['cus_login_email_empty']);
		//$("#errormsg5").addClass('errormsg').html(err_lang_arr['cus_login_email_empty']);
		$(".customer_logemail_head").focus();
		return false;		
	}
	//if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(customerlogemail))){
	if(!(reg.test(customerlogemail))){
	   //$("#errormsg").addClass('errormsg').html(err_lang_arr['cus_login_email_valid']).show();
	   	//$("#errormsg4").addClass('errormsg').html(err_lang_arr['cus_login_email_valid']);
	   	$(".errormsg_login_head").addClass('errormsg').html(err_lang_arr['cus_login_email_valid']);
		$(".customer_logemail_head").focus();
		return false;
    }
	if((customerlogpassword) == '' || customerlogpassword == 'password'){
		
		$(".errormsg_login_head").addClass('errormsg').html(err_lang_arr['cus_login_pass_empty']);
		//$("#errormsg5").addClass('errormsg').html(err_lang_arr['cus_login_pass_empty']);
		$(".customer_logpassword_head").focus();
		return false;	
	}
	//return false;
	if(customerlogemail != '' && customerlogpassword != ''){
				
		$.post(jssitebaseUrl+useFile,{'customerlogemail':customerlogemail,'customerlogpassword':customerlogpassword,'rememberme':rememberme,'action':'customerlogin'}, function(output){
	//	alert(output);
			if(output == 'Deactivated'){
				$(".errormsg_login_head").addClass('errormsg').html(err_lang_arr['cus_login_account_deacivate']).show();
				return false;
			}else if(output == 'Pending'){
				$(".errormsg_login_head").addClass('errormsg').html(err_lang_arr['cus_login_account_pending']).show();
				return false;
			}else if(output == 'Invalid_Login'){
				$(".errormsg_login_head").addClass('errormsg').html(err_lang_arr['cus_login_invalid']).show();
				return false;
			}else{
			//	alert("submit");
                if(pagetype != ''){
                	
               	    document.customerlogin_head.submit();
                }else{

                    window.location = jssitebaseUrl+"/customerMyaccount.php";
                }
			
				//window.location = jssitebaseUrl+"/"+filetype;
			} 
		});
	}
	return false;
}


//-------------------------------------------------------------------------------------------


/*$(document).ready(function(){
	//Close Forget PAssword
	$("#closeCustomerForget").click(function (){
		$('#maska').fadeOut();
		$("#customerforgetpop").hide();
	});
	$(".closeOrderFullDetails").click(function() {
		$('#maska').fadeOut();
		$("#orderViewFullDetailsPop").hide();
	});
});
function closeOrderFullDetails(){
	$('#maska').fadeOut();
	$("#orderViewFullDetailsPop").hide();
	$("#customerReviewsPop").hide();
}*/
//----------------------------------------------------------------------------------------------------
//Change Password
function customerChangePassword(){
	
	var err_lang_arr = error_language();
	//var oldpassword    = $("#oldpassword").val();
	var newpassword    = $("#newpassword").val();
	var retypepassword = $("#retypepassword").val();
    
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
    
	$("#changeerrormsg").removeClass('succmsg');
	/*if(oldpassword == ''){
		$("#changeerrormsg").addClass('errormsg').html(err_lang_arr['cus_changepass_check_oldpass']);
		$("#oldpassword").focus();
		return false;
	}*/
	if(newpassword == ''){
		$("#changeerrormsg").addClass('errormsg').html(err_lang_arr['cus_changepass_check_newpass']);
		$("#newpassword").focus();
		return false;
	}
	else if(retypepassword == ''){
		$("#changeerrormsg").addClass('errormsg').html(err_lang_arr['cus_changepass_check_retypepass']);
		$("#retypepassword").focus();
		return false;		
	}
	/*else if(oldpassword == newpassword){
		$("#changeerrormsg").addClass('errormsg').html(err_lang_arr['cus_changepass_check_oldnewpass']);
		$("#oldpassword").focus();
		return false;
	}*/
	else if(newpassword != retypepassword){
		$("#changeerrormsg").addClass('errormsg').html(err_lang_arr['cus_changepass_check_newconfpass']);
		$("#newpassword").focus();
		return false;
	}
	else{		
		$.post(jssitebaseUrl+useFile,{"newpassword":newpassword,"action":"checkChangePassword"},function(response){
		//alert(response);
			if($.trim(response) == "Invalid_Old_Pwd")
			{
				$("#changeerrormsg").addClass('errormsg').html(err_lang_arr['cus_changepass_check_invalidpass']);
				return false;
			}
			else if($.trim(response) == 'success')
			{
				$("#changeerrormsg").removeClass('errormsg');   
				$("#changeerrormsg").addClass('succmsg').html(err_lang_arr['cus_changepass_check_success']); 
				setTimeout(function() {
					//$("#changeerrormsg").hide();
					$("#changeerrormsg").removeClass('errormsg').html('');
					$("#oldpassword").val('');
					$("#newpassword").val('');
					$("#retypepassword").val(''); }, 2000);
			} 
		});
		return false;
	}
}
//-------------------------------------------------------------------------------------------------
//Customer Profile Update
function customerUpdateProfile(){
	
	var err_lang_arr = error_language();
	
	var firstname    	 = $.trim($("#firstname").val());
	var lastname    	 = $.trim($("#lastname").val());
	var customerstreet   = $.trim($("#customerstreet").val());
	var customeremail 	 = $.trim($("#customeremail").val());
	var customerphone    = $.trim($("#customerphone").val());
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
	//var customerlandline = $("#customerlandline").val();
	if($("#customer_news").is(":checked") == true){
		var newsletter				= 'Yes';
	}
    else{
		var newsletter				= 'No';
	}
	
	$(".errormsg").html('');
	
	if(firstname == ''){
		$("#profileerrormsg").addClass('errormsg').html(err_lang_arr['cus_profile_update_name']);
		$("#firstname").focus();
		return false;
	}
	if(lastname == ''){
		$("#profileerrormsg").addClass('errormsg').html(err_lang_arr['cus_profile_update_lastname']);
		$("#lastname").focus();
		return false;
	}
	/*if(customerstreet == ''){
		$("#profileerrormsg").addClass('errormsg').html(err_lang_arr['cus_profile_update_street']);
		$("#customerstreet").focus();
		return false;
	}*/
	if(customeremail == ''){
		$("#profileerrormsg").addClass('errormsg').html(err_lang_arr['cus_profile_update_email']);
		$("#customeremail").focus();
		return false;
	}
    if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(customeremail))){
	   	$("#profileerrormsg").addClass('errormsg').html(err_lang_arr['cus_reg_invalid_email']);
		$("#customeremail").focus();
		return false;
    }
	if(customerphone == ''){
		$("#profileerrormsg").addClass('errormsg').html(err_lang_arr['cus_profile_update_phone']);
		$("#customerphone").focus();
		return false;
	}
    
	//alert(customerphone);
	if(customerphone != ''){
		if(isNaN(customerphone)){
			$("#profileerrormsg").addClass('errormsg').html(err_lang_arr['cus_profile_update_phonenocheck']);
			$("#customerphone").focus();
			return false;
		}
		/*else if(customerphone.length < 10 || customerphone.length > 10 ){
			$("#profileerrormsg").addClass('errormsg').html(err_lang_arr['cus_profile_update_phonenoless']);
			$("#customerphone").focus();
			return false;
		}*/
	}
	console.log("jssitebaseUrl: " + jssitebaseUrl);
		console.log("useFile: " + useFile);
	$.post(jssitebaseUrl+useFile,{"firstname":firstname, "lastname":lastname, "customerstreet":customerstreet,"customeremail":customeremail,"customerphone":customerphone, "newsletter":newsletter, "action":"customerUpdateProfile"},function(response){
		
		if($.trim(response) == 'success'){
			//$("#profileerrormsg").removeClass('errormsg');
			$("#profilesuccessmsg").addClass('errormsg').html(err_lang_arr['cus_profile_update_success']);
			setTimeout(function() {
				$("#profilesuccessmsg").removeClass('errormsg').html(''); 
				//$("#profilesuccessmsg").hide();
			}, 2000);
		} 
	});
}
//---------------------------------------------------------------------------------------------
//Update Customer Primary Address
function customerUpdatePrimaryAddress(){
	var err_lang_arr = error_language();
	
	var id			= $.trim($("#Address_id").val());
	var add_title	= $.trim($("#address_title").val());
	var doornumber  = $.trim($("#doornumber").val());
	var street   	= $.trim($("#customerstreet").val());
	var landmark 	= $.trim($("#landmark").val());
	//var area    	= $.trim($("#area").val());
	var city   		= $.trim($("#customer_city").val());
	var zip   		= $.trim($("#customer_zip").val());
	var state  		= $.trim($("#customer_state").val());
	var landline 	= $.trim($("#landline").val());
    
    var useAction = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxAction.php' : '/use-action';
	
	$(".errormsg").html('');
	 $("#editaddressbook").prop("disabled",true);
	if(add_title == ''){
	    $("#editaddressbook").prop("disabled",false);
		$("#primaryerrormsg").addClass('errormsg').html(err_lang_arr['cus_reg_empty_address_title']);
		$("#address_title").focus();
		return false;
	}
	/*if(doornumber == ''){
		$("#primaryerrormsg").addClass('errormsg').html(err_lang_arr['cus_addressbook_update_doorno']);
		$("#doornumber").focus();
		return false;
	}*/
	if(street == ''){
	    $("#editaddressbook").prop("disabled",false);
		$("#primaryerrormsg").addClass('errormsg').html(err_lang_arr['cus_addressbook_update_street']);
		$("#customerstreet").focus();
		return false;
	}
	/*if(area == ''){
		$("#primaryerrormsg").addClass('errormsg').html(err_lang_arr['cus_addressbook_update_area']);
		$("#area").focus();
		return false;
	}*/
	if(city == ''){
	    $("#editaddressbook").prop("disabled",false);
		$("#primaryerrormsg").addClass('errormsg').html(err_lang_arr['cus_addressbook_update_city']);
		$("#city").focus();
		return false;
	}
	if(state == ''){
	    $("#editaddressbook").prop("disabled",false);
		$("#primaryerrormsg").addClass('errormsg').html(err_lang_arr['cus_addressbook_update_state']);
		$("#state").focus();
		return false;
	}
	if(landline != ''){
		if(isNaN(landline)){
		    $("#editaddressbook").prop("disabled",false);
			$("#primaryerrormsg").addClass('errormsg').html(err_lang_arr['cus_addressbook_update_landline']);
			$("#landline").focus();
			return false;
		}
	}
	if(zip == ''){
	    $("#editaddressbook").prop("disabled",false);
		$("#primaryerrormsg").addClass('errormsg').html(err_lang_arr['cus_addressbook_update_zip']);
		$("#zip").focus();
		return false;
	}
	/*if(zip != ''){
		if(isNaN(zip)){
			$("#primaryerrormsg").addClass('errormsg').html(err_lang_arr['cus_addressbook_update_validzip']);
			$("#zip").focus();
			return false;
		}
	}*/
	
	if(document.getElementById("customer_addresslabel_home").checked == true){
		var customeraddresslabel  = $.trim($("#customer_addresslabel_home").val());
	}else if(document.getElementById("customer_addresslabel_off").checked == true){ 
		var customeraddresslabel  = $.trim($("#customer_addresslabel_off").val());
	}else if(document.getElementById("customer_addresslabel_other").checked == true){ 
		var customeraddresslabel  = $.trim($("#customer_addresslabel_other").val());
	}else{
		var customeraddresslabel  = '';
	}
	$("#editaddressbook").prop("disabled",true);
	$("#CustomerAddress_Book").load(jssitebaseUrl+useAction,{"id":id, "add_title":add_title, "apt_name":doornumber, "street_add":street, "landmark":landmark, "state":state, "city":city, "zip":zip, "landline":landline, "customeraddresslabel":customeraddresslabel, "action":"customerUpdatePrimary"},function(response){
		
            
			$("#primarysuccessmsg").addClass('errormsg').html(err_lang_arr['cus_address_change_success']);
			setTimeout(function(){
				$("#CustomerAddress_Book").show();
				$("#customer_address_book_edit").hide();
				$("#customer_address_book_add").hide();
				$("#primarysuccessmsg.errormsg").html('');
			}, 2000);
		
	});
}
//---------------------------------------------------------------------------------------------
//Update Customer Primary Address
function customerUpdateSecondaryAddress(){
	
	var err_lang_arr 		= error_language();	
	var secondaryname  		= $("#secname").val();
	var secondaryaddress    = $("#secaddress").val();
	var secondarystreet 	= $("#secstreet").val();
	var secondarylandmark   = $("#seclandmark").val();
	var secondaryarea   	= $("#secarea").val();
	var secondarycity 		= $("#seccity").val();
	var secondarycellphone  = $("#seccellphone").val();
	var secondarylandline 	= $("#seclandline").val();
    
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
	
	$(".errormsg").html('');
	if(secondaryname == ''){
		$("#seconndaryerrormsg").addClass('errormsg').html(err_lang_arr['customer_please_enter_sec_cus']);
		$("#secondaryname").focus();
		return false;
	}
	if(secondaryaddress == ''){
		$("#seconndaryerrormsg").addClass('errormsg').html(err_lang_arr['customer_please_enter_sec_addr']);
		$("#secondaryaddress").focus();
		return false;
	}
	if(secondarystreet == ''){
		$("#seconndaryerrormsg").addClass('errormsg').html(err_lang_arr['customer_pleaseenter_secstreet']);
		$("#secondarystreet").focus();
		return false;
	}
	if(secondaryarea == ''){
		$("#seconndaryerrormsg").addClass('errormsg').html(err_lang_arr['customer_pleaseenter_area']);
		$("#secondaryarea").focus();
		return false;
	}
	if(secondarycity == ''){
		$("#seconndaryerrormsg").addClass('errormsg').html(err_lang_arr['customer_pleaseenter_city']);
		$("#secondarycity").focus();
		return false;
	}
	if(secondarycellphone == ''){
		$("#seconndaryerrormsg").addClass('errormsg').html(err_lang_arr['customer_pleaseenter_cellphone']);
		$("#secondarycellphone").focus();
		return false;
	}
	if(secondarycellphone != ''){
		if(isNaN(secondarycellphone)){
			$("#seconndaryerrormsg").addClass('errormsg').html(err_lang_arr['customer_entervalidcellphone']);
			$("#secondarycellphone").focus();
			return false;
		}
		/*else if(secondarycellphone < 10){
			$("#seconndaryerrormsg").addClass('errormsg').html("Please enter valid secondary customer cellphone");
			$("#secondarycellphone").focus();
			return false;
		}*/
	}
	if(secondarylandline != ''){
		if(isNaN(secondarylandline)){
			$("#seconndaryerrormsg").addClass('errormsg').html(err_lang_arr['customer_entervalidlandline']);
			$("#secondarylandline").focus();
			return false;
		}
	}
	
	$.post(jssitebaseUrl+useFile,{"secondaryname":secondaryname,"secondaryaddress":secondaryaddress,"secondarystreet":secondarystreet,"secondarylandmark":secondarylandmark,"secondaryarea":secondaryarea,"secondarycity":secondarycity,"secondarycellphone":secondarycellphone,"secondarylandline":secondarylandline,"action":"customerUpdateSecondary"},function(response){
		//alert(response);
		if($.trim(response) == 'success'){
				$("#secondarysuccessmsg").html(err_lang_arr['customer_sec_address_has_been']);
				setTimeout(function() {
					$("#secondarysuccessmsg").hide();  }, 2000);
		} 
	});
}
//------------------------------------------------------------------------------------------------------
//Order View Full details
function orderViewFullDetails(orderid){
	
	$('#cus_myorder').hide();
    $('#order_filter').hide();
	$('#cus_fullorder').show();
	$('#cus_fullorder').html('<div class="addtocartloading"><span class="image"><img src="'+jssitebaseUrl +'/theme/default/images/loader.gif" border="0" alt="Loading" /></span><span>Please wait...</span></div>').show();
	$("#cus_fullorder").load(jssitebaseUrl+"/ajaxAction.php?action=orderFullDetails&orderid="+orderid);
	
	/*myPopupWindowOpen('#orderViewFullDetailsPop','#maska');

	//Form
	$('#customerOrderFullDetailsList').html('<div class="addtocartloading"><img src="'+jssitebaseUrl +'/images/loader.gif" border="0" alt="Loading" /><span>Please wait...</span></div>').show();
	$("#customerOrderFullDetailsList").load(jssitebaseUrl+"/ajaxAction.php?action=orderFullDetails&orderid="+orderid);*/
}
function print(){
	var win=window.open('about:blank');
    with(win.document)
    {
      open();
      write($("head").html());
      write('<body onload="document.body.offsetHeight;window.print();">');
      write('<div class="ordersInnerWrap">');
      $("a.pdf").hide();
      $("a.print").hide();
      //$("#printpage").show();
      $("#logoimg").show();
      $(".backHistTxt").hide();
      
      write($("#cus_fullorder").html());
      write('</div>');
      write('</body>');
      
      $("#logoimg").hide();
      $("a.pdf").show();
      $("a.print").show();
      $("#printpage").hide();
      $(".backHistTxt").show();
      close();
    }
}
//---------------------------------------------
//Back History
function backHistory(){
	$('#cus_myorder').show();
    $('#order_filter').show();
	$('#cus_fullorder').hide();
}
//------------------------------------------------------------------------------------------------------
//Customer Reviews
function customerReviews(orderid,resid){
	
	var err_lang_arr 		= error_language();		
	$(".orderid").val(orderid);
	$(".resid").val(resid);
    $('#errormsg_review').html('');
    $("[type=radio]").attr('checked',false)
    $("#ratingmessage").val('');
    
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
	
	$.post(jssitebaseUrl+useFile,{"orderid":orderid,"resid":resid,"action":"customerReviewsCheck"},function(response){
		
		if($.trim(response) == '0'){
			//myPopupWindowOpen('#customerReviewsPop','#maska');
		}else{
			//$("#customerReviewsPop").hide();
			$(".addtoCartClose").trigger("click");
			alert(err_lang_arr['customer_already_review_posted']);
			
			
			//$('#maska').fadeOut();
			return false;
		}
	});
}

function customerReviewsSubmit(){
	
	var err_lang_arr 		= error_language();		
	if(document.getElementById("rating1").checked == true){
		var rating 	= $.trim($("#rating1").val());
	}else if(document.getElementById("rating2").checked == true){ 
		var rating 	= $.trim($("#rating2").val());
	}else if(document.getElementById("rating3").checked == true){ 
		var rating 	= $.trim($("#rating3").val());
	}else if(document.getElementById("rating4").checked == true){ 
		var rating 	= $.trim($("#rating4").val());
	}else if(document.getElementById("rating5").checked == true){ 
		var rating 	= $.trim($("#rating5").val());
	}else{
		$("#errormsg_review").addClass('errormsg').html(err_lang_arr['customer_please_select_rating']);
		document.customer_review.rating[0].focus();
		return false;	
	}
	var message = $("#ratingmessage").val();
	var orderid = $(".orderid").val();
	var resid   = $(".resid").val();
    
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
	
	$("#errormsg_review").html('');
	
	if(message == ''){
		$("#errormsg_review").addClass('errormsg').html(err_lang_arr['customer_please_enter_message']).show();
		$("#ratingmessage").focus();
		return false;
	}
	if(message != ''){	
	    $('#review').attr('disabled', true);
		$.post(jssitebaseUrl+useFile,{'rating':rating,'message':message,'orderid':orderid,'resid':resid,'action':'customerReviews'}, function(output){
			//alert(output);
			if(output == 'success'){
				$("#errormsg_review").addClass('succmsg').html(err_lang_arr['customer_your_review_has_been']).show();
				setTimeout(function() {  
					$(".addtoCartClose").trigger("click");
					//$("#customerReviewsPop").hide();
					//$('#maska').fadeOut();
					$("#errormsg").hide();
					$("#rating1").attr('checked',false);
					$("#rating2").attr('checked',false);
					$("#rating3").attr('checked',false);
					$("#rating4").attr('checked',false);
					$("#rating5").attr('checked',false);
					$("#ratingmessage").val('');
                    $('#review').removeAttr('disabled'); 
                    window.location.reload();
                    }, 2000);
			}
		});
        return false;
	}
	return false;
}
//--------------------------------------------------------------------------------
//customer favorite delete
function changeStatusOptionFav(chgeval,mid,chgestatus){
	
	//Error Language
	var err_lang_arr = error_language();
	
	if(chgeval == 'delete'){
		var str = err_lang_arr['cusfav_sure_want_delete'];
	}
	
	if(confirm(str)){
		
		$(".favoriteListDetails").load(jssitebaseUrl+"/ajaxAction.php", {'action':'customerFavStatus','chgeval':chgeval ,'mid':mid , 'chgestatus':chgestatus } );
	}
}
//--------------------------------------------------------------------------------
//Get Show Zip
function getCityListCus(statecode){   
	req.onreadystatechange = function(){
		//document.getElementById('showCusCityList').innerHTML=('<span class="txt"><img align="right" style="margin:6px 5px 0 0;" src="'+jssitebaseUrl +'/images/loader_veg.gif" border="0" alt="Loading.." /></span>'); 
    	if (req.readyState == 4){
		 	if (req.status == 200){
		 		//alert(req.responseText);
                //return false;
		    	document.getElementById('showCusCityList').innerHTML=req.responseText;
		 	}else {
	   	   		$.prompt("There was a problem while using XMLHTTP:\n" + req.statusText);
		 	}
      	}
	}
   	req.open("GET", jssitebaseUrl+"/ajaxAction.php?statecode="+statecode+"&action=showCusCityList", true);
   	req.send(null);
}

//Get Show Zip
function getZipListRest(cid){
	req.onreadystatechange = function(){
		
    	if (req.readyState == 4){
		 	if (req.status == 200){
		 		//alert(req.responseText);
		    	document.getElementById('showCusZipList').innerHTML=req.responseText;
		 	}else {
	   	   		$.prompt("There was a problem while using XMLHTTP:\n" + req.statusText);
		 	}
      	}
	}
   	req.open("GET", jssitebaseUrl+"/ajaxAction.php?cid="+cid+"&action=showCusAreaList", true);
   	req.send(null);
}
//Get Show City List for Add Address
function getCityListCusAdd(statecode){   
	req.onreadystatechange = function(){
		
    	if (req.readyState == 4){
		 	if (req.status == 200){
		 		//alert(req.responseText);
                //return false;
		    	document.getElementById('showCusAddCityList').innerHTML=req.responseText;
		 	}else {
	   	   		$.prompt("There was a problem while using XMLHTTP:\n" + req.statusText);
		 	}
      	}
	}
   	req.open("GET", jssitebaseUrl+"/ajaxAction.php?statecode="+statecode+"&action=showCusCityListAdd", true);
   	req.send(null);
}
//Get Show Zip List for Add Address
function getZipListCusAdd(cid){
	req.onreadystatechange = function(){
		
    	if (req.readyState == 4){
		 	if (req.status == 200){
		 		//alert(req.responseText);
		    	document.getElementById('showCusZipAddList').innerHTML=req.responseText;
		 	}else {
	   	   		$.prompt("There was a problem while using XMLHTTP:\n" + req.statusText);
		 	}
      	}
	}
   	req.open("GET", jssitebaseUrl+"/ajaxAction.php?cid="+cid+"&action=showCusAreaListAdd", true);
   	req.send(null);
}
//AJAX START----------------------------------------------------------------------------------------
/*function getXMLHTTP() { //fuction to return the xml http object                                     
		var xmlhttp=false;	                                                                        
		try{                                                                                        
			xmlhttp=new XMLHttpRequest();                                                           
		}                                                                                           
		catch(e)	{		                                                                        
			try{			                                                                        
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");                                    
			}                                                                                       
			catch(e){                                                                               
				try{                                                                                
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");                                      
				}                                                                                   
				catch(e1){                                                                          
					xmlhttp=false;                                                                  
				}                                                                                   
			}                                                                                       
		}                                                                                                                                                         
		return xmlhttp;                                                                             
	}                                                                                               
var req = getXMLHTTP(); 

//Get Show City
function getCityListCus(statecode,frompage){
	
	req.onreadystatechange = function(){
		
    	if (req.readyState == 4){
		 	if (req.status == 200){
		 		//alert(req.responseText);
		    	document.getElementById('showResCityList').innerHTML=req.responseText;
		 	}else {
	   	   		alert("There was a problem while using XMLHTTP:\n" + req.statusText);
		 	}
      	}
	}
   	req.open("GET", "ajaxAction.php?statecode="+statecode+"&action=showResCityList&frompage="+frompage, true);
   	req.send(null);
}
//Get Show City
function getZipListRest(cid,frompage){
	
	req.onreadystatechange = function(){
		
    	if (req.readyState == 4){
		 	if (req.status == 200){
		 		//alert(req.responseText);
		    	document.getElementById('showResZipList').innerHTML=req.responseText;
		 	}else {
	   	   		alert("There was a problem while using XMLHTTP:\n" + req.statusText);
		 	}
      	}
	}
   	req.open("GET", "ajaxAction.php?cid="+cid+"&action=showResZipList&frompage="+frompage, true);
   	req.send(null);
}*/
//----------------------------------------------------------------------------------------------------------------------------------------------------------------
//														Change status and Delete
//----------------------------------------------------------------------------------------------------------------------------------------------------------------
function changeStatusCus(chgeval,mid,actionval)
{
	//alert(chgeval+mid+actionval); return false;
	
	if(chgeval == '1'){
		var str = 'Are you sure want to activate?';
	}else if(chgeval == '0'){
		var str = 'Are you sure want to deactivate?';
	}else if(chgeval == 'delete'){
		var str = 'Are you sure want to delete?';
	}else if(chgeval == 'Yes' && actionval == 'Menu'){
		var str = 'Are you sure want to change to popular dish?';
	}else if(chgeval == 'No' && actionval == 'Menu'){
		var str = 'Are you sure want to change to normal dish?';
	}

	if(confirm(str))
	{
		$(".Customer"+actionval).load(jssitebaseUrl+"/ajaxAction.php?action="+actionval, {'chgeval':chgeval,'mid':mid} );
		
	}
	
}
//View address book
function newAddress()
{
	$("#CustomerAddress_Book").hide();
	$("#customer_address_book_edit").hide();
	$("#customer_address_book_add").show();
    $('#NewButton').removeAttr('disabled');
	return false;
}
//Back to Address List
function backtolist(){
	$("#CustomerAddress_Book").show();
	$("#customer_address_book_edit").hide();
	$("#customer_address_book_add").hide();
	return false;
}
function editAddress(editID)
{
	var useAction = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxAction.php' : '/use-action';
	$.post(jssitebaseUrl+useAction,{"addressID":editID, "action":"EditAddress"},function(response)
	{
		//alert(response); return false;
		//document.getElementById("editAddress").style.display = 'block';
        //alert(response);
		$("#customer_address_book_edit").html(response);
		$("#CustomerAddress_Book").hide();
		$("#customer_address_book_edit").show();
		$("#customer_address_book_add").hide();
		return false;
	});
	
	
}
//Add New Address
function CusAddNewAddress(){
	
	var add_title	= $.trim($("#address_title_new").val());
	var apt_name	= $.trim($("#doornumber_new").val());
	var street_add	= $.trim($("#customerstreet_new").val());
	var landmark	= $.trim($("#landmark_new").val());
	var state		= $("#customer_state_new").val();
	var city		= $("#customer_city_new").val();
	var zip			= $("#customer_zip_new").val();
	var landline	= $.trim($("#landline_new").val());
	var add_label	= $("input[name=customer_addresslabel_new]:checked").val();
    var useAction = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxAction.php' : '/use-action';
    
	$("#errormsg").html('');
	
	$("#NewButton").prop("disabled",true);
	if(add_title == ''){
        $("#NewButton").prop("disabled",false);
		$("#errormsg").addClass('errormsg').html("Please enter address title");
		$("#address_title_new").focus();
		return false;
	}else if(street_add == ''){
	    $("#NewButton").prop("disabled",false);
		$("#errormsg").addClass('errormsg').html("Please enter street address");
		$("#customerstreet_new").focus();
		return false;
	}else if(state == ''){
	    $("#NewButton").prop("disabled",false);
		$("#errormsg").addClass('errormsg').html("Please select your state");
		$("#customer_state_new").focus();
		return false;
	}else if(city == ''){
	    $("#NewButton").prop("disabled",false);
		$("#errormsg").addClass('errormsg').html("Please select your city");
		$("#customer_city_new").focus();
		return false;
	}else if(zip == ''){
	    $("#NewButton").prop("disabled",false);
		$("#errormsg").addClass('errormsg').html("Please select your zip code");
		$("#customer_zip_new").focus();
		return false;
	}/*else if(landline == ''){
		$("#errormsg").addClass('errormsg').html("Please enter your landline number");
		$("#customer_city_new").focus();
		return false;
	}*/else{
        $('#NewButton').attr('disabled',true);
		$("#CustomerAddress_Book").load(jssitebaseUrl+useAction,{"add_title":add_title, "apt_name":apt_name, "street_add":street_add, "landmark":landmark, "state":state, "city":city, "zip":zip, "landline":landline, "add_label":add_label,"action":"AddNewAddress"},function(response){
			
				$("#successmsg").html("Your new address added successfully");
				setTimeout(function(){
					$("#successmsg").html('');
					$("#address_title_new").val('');
					$("#doornumber_new").val('');
					$("#customerstreet_new").val('');
					$("#landmark_new").val('');
					$("#customer_state_new").val('');
					$("#customer_city_new").val('');
					$("#customer_zip_new").val('');
					$("#landline_new").val('');
					$("input[name=customer_addresslabel_new]").attr("checked",false);
					
				$("#CustomerAddress_Book").show();
				$("#customer_address_book_edit").hide();
				$("#customer_address_book_add").hide();
				}, 2000);
		});
	}
}

//Customer Order Report
function order_validate(){
	
	var startdate = $("#order_from").val();
	var enddate   = $("#order_to").val();
    
    //Error Language
	var err_lang_arr = error_language();
	
	fieldDateFirst = startdate.split("-");
	fieldDateSecound = enddate.split("-");
    var Date1 = new Date();
    var Date2 = new Date();
    Date1.setFullYear(fieldDateFirst[2],fieldDateFirst[1]-1,fieldDateFirst[0]);
 	Date2.setFullYear(fieldDateSecound[2],fieldDateSecound[1]-1,fieldDateSecound[0]);
	
	if(startdate == ""){
		alert('Please select from date');
		$("#order_from").focus();
		//FormName.report_from.focus();
		return false;
	}
	if(enddate == ""){
		alert('Please select to date');
		$("#order_to").focus();
		//FormName.report_to.focus();
		return false;
	}
	if(Date1 > Date2){
		alert("From and To Date combinations are wrong");
		$("#order_from").focus();
		//FormName.report_to.focus();
		return false;
	}
	
	if(startdate != '' && enddate != ''){
		var sortbystatus = "startdate="+startdate+"&enddate="+enddate;
	}
	
	$("#customer_myorder_content").load(jssitebaseUrl+"/ajaxAction.php", {'action':'OrderFilter','sortbystatus':sortbystatus , 'startdate':startdate , 'enddate':enddate } );
	
}