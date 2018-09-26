//text box check value script word is there or not
$("input[type=text],textarea").keyup(function(){
    var output = $(this).val();
    //alert(output);
    if(output.toLowerCase().match(/script/)) {
        $(this).val('');
	    alert("Please Avoid java script related codes");  
        return false;  
	}
});	

//---------------------------------------------------------------------------------------------//
//Restaurant Owner Register Start**************************************************************//
//---------------------------------------------------------------------------------------------//
	//Restaurant Owner Register Validate
	function restOwnerRegisterValidate(){
		
		//alert("hello");
		var err_lang_arr = error_language();
		
		var restaurant_name 			= $("#restaurant_name").val();
		var restaurant_phone 			= $("#restaurant_phone").val();
		var restaurant_fax 				= $("#restaurant_fax").val();
		var restaurant_contact_name 	= $("#restaurant_contact_name").val();
		var restaurant_contact_phone 	= $("#restaurant_contact_phone").val();
		var restaurant_contact_email 	= $("#restaurant_contact_email").val();
		var restaurant_website 	    	= $("#restaurant_website").val();
		var restaurant_streetaddress 	= $("#restaurant_streetaddress").val();
		var restaurant_city 			= $("#restaurant_city_con").val();
		var restaurant_state 			= $("#restaurant_state").val();
		var restaurant_zip 				= $("#restaurant_zip").val();
        
        var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
		
		//alert(restaurant_city);
		//var regUrl 						= /^(((ht|f){1}(tp:[/][/]){1})|((www.){1}))[-a-zA-Z0-9@:%_\+.~#?&//=]+$/;
        var regUrl 						= /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
		//var regUrl							= /(^|&lt;|\s)(ftp|http|https):\/\/(www\..+?\..+?)(\s|&gt;|$)/g;
/*		var regUrl = /^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/;*/
		var nameRegex = /^[a-zA-Z ]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z ]*)*$/;
		var reg       = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        $("#restaurantregistersubmit").prop("disabled",true);
		if(restaurant_name == ''){
			//$("#errormsg").addClass('errormsg').html(err_lang_arr['res_owner_res_name']);
            $("#restaurantregistersubmit").prop("disabled",false);
			$("#errormsg3").addClass('errClass1').html(err_lang_arr['res_owner_res_name']);
			$("#restaurant_name").focus();
			$("#restaurant_name").parent().parent().addClass("has-error");
			return false;		
		}
		else{
	    $("#restaurantregistersubmit").prop("disabled",false);
		$("#restaurant_name").parent().parent().removeClass("has-error");
	}
    /**
		if(!restaurant_name.match(nameRegex)) {
		    $("#restaurantregistersubmit").prop("disabled",false);
		    $("#errormsg3").addClass('errClass1').html(err_lang_arr['res_owner_res_correctname']);
		    $("#restaurant_name").focus();
			$("#restaurant_name").parent().parent().addClass("has-error");
			
		    return false;
  		}
		else{
        $("#restaurantregistersubmit").prop("disabled",false);
		$("#restaurant_name").parent().parent().removeClass("has-error");
	}  **/
		
		if((restaurant_phone) == ''){
		    $("#restaurantregistersubmit").prop("disabled",false);
			$("#errormsg3").addClass('errClass1').html(err_lang_arr['res_owner_res_phone']);
			$("#restaurant_phone").focus();
			$("#restaurant_phone").parent().parent().addClass("has-error");
			return false;	
		}
		else{
        $("#restaurantregistersubmit").prop("disabled",false);
		$("#restaurant_phone").parent().parent().removeClass("has-error");
	}
		if(restaurant_phone != ''){
			if(isNaN(restaurant_phone)){
                $("#restaurantregistersubmit").prop("disabled",false);
				$("#errormsg3").addClass('errClass1').html(err_lang_arr['res_owner_res_validphone']);
				$("#restaurant_phone").focus();
				$("#restaurant_phone").parent().parent().addClass("has-error");
				return false;
			}
			else{
		$("#restaurant_phone").parent().parent().removeClass("has-error");
	}
			/*if(restaurant_phone.length < 7){
				$("#errormsg").addClass('errormsg').html(err_lang_arr['res_owner_res_phonenoless']);
				$("#restaurant_phone").focus();
				return false;
			}*/		
		}
		
		/*if(restaurant_fax == ''){
			$("#errormsg").addClass('errormsg').html(err_lang_arr['res_owner_res_fax']);
			$("#restaurant_fax").focus();
			return false;		
		}*/
		
		if(restaurant_fax != ''){
			if(isNaN(restaurant_fax)){
                $("#restaurantregistersubmit").prop("disabled",false);
				$("#errormsg3").addClass('errClass1').html(err_lang_arr['res_owner_res_invalidfax']);
				$("#restaurant_fax").focus();
				$("#restaurant_fax").parent().parent().addClass("has-error");
				return false;		
			}
			else{
	    $("#restaurantregistersubmit").prop("disabled",false);
		$("#restaurant_fax").parent().parent().removeClass("has-error");
	}
		}
		
		if(restaurant_contact_name == ''){
            $("#restaurantregistersubmit").prop("disabled",false);
			$("#errormsg3").addClass('errClass1').html(err_lang_arr['res_owner_res_contactname']);
			$("#restaurant_contact_name").focus();
			$("#restaurant_contact_name").parent().parent().addClass("has-error");
			return false;		
		}
		else{
        $("#restaurantregistersubmit").prop("disabled",false);
		$("#restaurant_contact_name").parent().parent().removeClass("has-error");
	}
        if(!restaurant_contact_name.match(nameRegex)) {
            $("#restaurantregistersubmit").prop("disabled",false);
			$("#errormsg3").addClass('errClass1').html(err_lang_arr['res_owner_res_validname']);
			$("#restaurant_contact_name").focus();
			$("#restaurant_contact_name").parent().parent().addClass("has-error");
			return false;		
		}
		else{
        $("#restaurantregistersubmit").prop("disabled",false);
		$("#restaurant_contact_name").parent().parent().removeClass("has-error");
	}
		
		if((restaurant_contact_phone) == ''){
            $("#restaurantregistersubmit").prop("disabled",false);
			$("#errormsg3").addClass('errClass1').html(err_lang_arr['res_owner_res_contactphone']);
			$("#restaurant_contact_phone").focus();
			$("#restaurant_contact_phone").parent().parent().addClass("has-error");
			return false;	
		}
		else{
        $("#restaurantregistersubmit").prop("disabled",false);
		$("#restaurant_contact_phone").parent().parent().removeClass("has-error");
	}
		if(restaurant_contact_phone != ''){
			if(isNaN(restaurant_contact_phone)){
                $("#restaurantregistersubmit").prop("disabled",false);
				$("#errormsg3").addClass('errClass1').html(err_lang_arr['res_owner_res_validcontactphone']);
				$("#restaurant_contact_phone").focus();
				$("#restaurant_contact_phone").parent().parent().addClass("has-error");
				return false;
			}
			else{
	    $("#restaurantregistersubmit").prop("disabled",false);
		$("#restaurant_contact_phone").parent().parent().removeClass("has-error");
	}
			/*if(restaurant_contact_phone.length < 7){
				$("#errormsg").addClass('errormsg').html(err_lang_arr['res_owner_res_validcontphoneless']);
				$("#restaurant_contact_phone").focus();
				return false;
			}*/		
		}
		
		if(restaurant_contact_email == ''){
            $("#restaurantregistersubmit").prop("disabled",false);
			$("#errormsg3").addClass('errClass1').html(err_lang_arr['res_owner_res_contactemail']);
			$("#restaurant_contact_email").focus();
			$("#restaurant_contact_email").parent().parent().addClass("has-error");
			return false;		
		}
		else{
        $("#restaurantregistersubmit").prop("disabled",false);
		$("#restaurant_contact_email").parent().parent().removeClass("has-error");
	}
		//if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(restaurant_contact_email))){
		if(!(reg.test(restaurant_contact_email))){
            $("#restaurantregistersubmit").prop("disabled",false);
		   	$("#errormsg3").addClass('errClass1').html(err_lang_arr['res_owner_res_invalidemail']).show();
			$("#restaurant_contact_email").focus();
			$("#restaurant_contact_email").parent().parent().addClass("has-error");
			return false;
	    }
		else{
        $("#restaurantregistersubmit").prop("disabled",false);
		$("#restaurant_contact_email").parent().parent().removeClass("has-error");
	}
	    
	    /*if(restaurant_website == ''){
			$("#errormsg3").addClass('errormsg').html(err_lang_arr['res_owner_res_website']);
			$("#restaurant_website").focus();
			return false;		
		}*/
		if((restaurant_website) != ''){
			if(regUrl.test(restaurant_website) == false){
                $("#restaurantregistersubmit").prop("disabled",false);
				$("#errormsg3").addClass('errClass1').html(err_lang_arr['res_owner_res_validwebsite']);
				$("#restaurant_website").focus();
				$("#restaurant_website").parent().parent().addClass("has-error");
				return false;
			}
			else{
	    $("#restaurantregistersubmit").prop("disabled",false);
		$("#restaurant_website").parent().parent().removeClass("has-error");
	}
		}
		
		if((restaurant_streetaddress) == ''){
		    $("#restaurantregistersubmit").prop("disabled",false);
			$("#errormsg3").addClass('errClass1').html(err_lang_arr['res_owner_res_streetaddr']);
			$("#restaurant_streetaddress").focus();
			$("#restaurant_streetaddress").parent().parent().addClass("has-error");
			return false;	
		}
		else{
        $("#restaurantregistersubmit").prop("disabled",false);
		$("#restaurant_streetaddress").parent().parent().removeClass("has-error");
	}
		
		if((restaurant_state) == ''){
            $("#restaurantregistersubmit").prop("disabled",false);
			$("#errormsg3").addClass('errClass1').html(err_lang_arr['res_owner_res_state']);
			$("#restaurant_state").focus();
			$("#restaurant_state").parent().parent().addClass("has-error");
			return false;	
		}
		else{
        $("#restaurantregistersubmit").prop("disabled",false);
		$("#restaurant_state").parent().parent().removeClass("has-error");
	}
		if((restaurant_city) == ''){
		    $("#restaurantregistersubmit").prop("disabled",false);
			$("#errormsg3").addClass('errClass1').html(err_lang_arr['res_owner_res_city']);
			$("#restaurant_city").focus();
			$("#restaurant_city").parent().parent().addClass("has-error");
			return false;		
		}
		else{
	    $("#restaurantregistersubmit").prop("disabled",false);  
		$("#restaurant_city").parent().parent().removeClass("has-error");
	}
		
		
		if(restaurant_zip == ''){
            $("#restaurantregistersubmit").prop("disabled",false);
			$("#errormsg3").addClass('errClass1').html(err_lang_arr['res_owner_res_zip']);
			$("#restaurant_zip").focus();
			$("#restaurant_zip").parent().parent().addClass("has-error");
			return false;		
		}
		else{
        $("#restaurantregistersubmit").prop("disabled",false); 
		$("#restaurant_zip").parent().parent().removeClass("has-error");
	}
		/*if(isNaN(restaurant_zip)){
			$("#errormsg").addClass('errormsg').html(err_lang_arr['res_owner_res_correctzip']);
			$("#restaurant_zip").focus();
			return false;
		}*/
		//alert(restaurant_contact_phone);
       
        $("#restaurantregistersubmit").prop("disabled",true);
		$.post(jssitebaseUrl+useFile,{"restaurant_name":restaurant_name,"restaurant_phone":restaurant_phone,"restaurant_fax":restaurant_fax,"restaurant_contact_name":restaurant_contact_name,"restaurant_contact_phone":restaurant_contact_phone,"restaurant_contact_email":restaurant_contact_email,"restaurant_website":restaurant_website,"restaurant_streetaddress":restaurant_streetaddress,"restaurant_city":restaurant_city,"restaurant_state":restaurant_state,"restaurant_zip":restaurant_zip,"action":"restaurantOwnerregister"},function(output){
			//alert(output);
			//return false;
            
			if(output == 'resowner_success'){
			     
				if(jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook'){
					window.location = jssitebaseUrl+"/restaurantOwnerThanks.php";
				}else{
				    window.location = jssitebaseUrl+"/rest_thanks";
				}
			}else if(output == 'already_name'){
                $("#restaurantregistersubmit").prop("disabled",false);
				$("#errormsg3").addClass('errClass1').html(err_lang_arr['res_owner_res_namealready']);
				$("#restaurant_name").select();
				return false;	
			}else if(output == 'already_email'){
			    $("#restaurantregistersubmit").prop("disabled",false);
				$("#errormsg3").addClass('errClass1').html(err_lang_arr['res_owner_res_mailalready']);
				$("#restaurant_contact_email`").select();
				return false;
			}
		});
		return false;
	}
//---------------------------------------------------------------------------------------------//
//Restaurant Owner Register End***************************************************************//
//---------------------------------------------------------------------------------------------//

//---------------------------------------------------------------------------------------------//
//Restaurant Owner Login Start****************************************************************//
//---------------------------------------------------------------------------------------------//
	//Restaurant Login Validate
	function restOwnerLoginValidate(){
		//alert("yes");
		var err_lang_arr = error_language();
		var restaurant_logemail 	= $("#restaurant_logemail").val();
		var restaurant_logpassword 	= $("#restaurant_logpassword").val();
        var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
		
		var feedback = $(".feedback").val();
		
		if(restaurant_logemail == ''){
			$("#errormsg").addClass('errClass1').html(err_lang_arr['res_owner_login_email']);
			$("#restaurant_logemail").focus();
			$("#restaurant_logemail").parent().parent().addClass("has-error");
			return false;		
		}
		else{
			$("#restaurant_logemail").parent().parent().removeClass("has-error");
		}
		if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(restaurant_logemail))){
		   	$("#errormsg").addClass('errClass1').html(err_lang_arr['res_owner_login_invalidemail']).show();
			$("#restaurant_logemail").focus();
			$("#restaurant_logemail").parent().parent().addClass("has-error");
			return false;
	    }
		else{
			$("#restaurant_logemail").parent().parent().removeClass("has-error");
		}
		if((restaurant_logpassword) == ''){
			$("#errormsg").addClass('errClass1').html(err_lang_arr['res_owner_login_password']);
			$("#restaurant_logpassword").focus();
			$("#restaurant_logpassword").parent().parent().addClass("has-error");
			return false;	
		}
		else{
			$("#restaurant_logpassword").parent().parent().removeClass("has-error");
		}
		if(restaurant_logemail != '' && restaurant_logpassword != ''){	
			//alert("ok");	
			$.post(jssitebaseUrl+useFile,{'restaurant_logemail':restaurant_logemail,'restaurant_logpassword':restaurant_logpassword,'action':'restaurantOwnerlogin'}, function(output){
				//alert(output); 
				//return false;	
				if(output == 'Deactivated'){
					$("#errormsg").addClass('errClass1').html(err_lang_arr['res_owner_login_deactivatation']).show();
					return false;
				}else if(output == 'Pending'){
					$("#errormsg").addClass('errClass1').html(err_lang_arr['res_owner_login_pending']).show();
					return false;
				}else if(output == 'deleted'){
					$("#errormsg").addClass('errClass1').html(err_lang_arr['res_owner_login_delete']).show();
					return false;
				}else if(output == 'Invalid_Login'){
					$("#errormsg").addClass('errClass1').html(err_lang_arr['res_owner_login_invalid']).show();
					return false;
				}else{
					if(feedback==''){
						if(jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook'){
							window.location = jssitebaseUrl+"/restaurantOwnerMyaccount.php";
						}else{
							window.location = jssitebaseUrl+"/restaurant-myaccount";
						}
					}else{
						if(jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook'){
							window.location = jssitebaseUrl+"/siteFeedback.php";
						}else{
							window.location = jssitebaseUrl+"/site-feedback";
						}
					}
				} 
			});
		}
		return false;
	}
//---------------------------------------------------------------------------------------------//
//Restaurant Owner Login End******************************************************************//
//---------------------------------------------------------------------------------------------//

//---------------------------------------------------------------------------------------------//
//Restaurant Owner Forget Password Start******************************************************//
//---------------------------------------------------------------------------------------------//
	//Forget Password POPUP
	function restaurantForgetPasswordPopup(){
			
			//myPopupWindowOpen('#restaurantforgetpop','#maska');
			//Form
			$("#errforgetemail").hide();
			$("#forgetemail").focus();
	}
	//Forget Password validate
	function restaurantForgetPassword(){
		
		var err_lang_arr = error_language();
		var forgetemail  = $("#forgetemail1").val();
        var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
	//	alert(forgetemail);
	/*	if(forgetemail == ''){
			alert("enter email");
			$("#errforgetemail1").addClass('errormsg').html("hi").show();
			}*/
	//	alert("forgetemail"+forgetemail);
	//	alert(forgetemail);
        $("#resownerforgotpasssubmit").prop("disabled",true);
		if(forgetemail == ''){
		//	alert("please enter email");
            $("#resownerforgotpasssubmit").prop("disabled",false);
			$(".errforgetemail").addClass('errormsg').html(err_lang_arr['res_owner_forgetpass_email']).show();
			//$("#errforgetemail").addClass('errormsg').html(err_lang_arr['res_owner_forgetpass_email']).show();
			$(".forgetemail").select();
			return false;
		}
		if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(forgetemail))){
		    $("#resownerforgotpasssubmit").prop("disabled",false);
		   	$(".errforgetemail").addClass('errormsg').html(err_lang_arr['res_owner_forgetpass_invalidemail']).show();
			$(".forgetemail").select();
			return false;
	    }else{
			$(".errforgetemail").hide();
		} 
		//alert("hello");
		if(forgetemail != ''){	
		    $("#resownerforgotpasssubmit").prop("disabled",true);
			$.post(jssitebaseUrl+useFile,{'forgetemail':forgetemail,'action':'restaurantforgetPassword'}, function(output){
				//alert(output); return false;
				if(output == 'sendpass_success'){
					$(".errforgetemail").addClass('succmsg').html(err_lang_arr['res_owner_forgetpass_sendemail']).show();
					setTimeout(function() {  
						$("#restaurantforgetpop").hide();
						$('#maska').fadeOut();
						$(".forgetemail").val(''); 
						window.location.reload(); }, 2000);
						return false;
				}else if(output == 'no_email'){
				    $("#resownerforgotpasssubmit").prop("disabled",false);
					$(".errforgetemail").addClass('errormsg').html(err_lang_arr['res_owner_forgetpass_notregemail']).show();
					return false;
				}else if(output == 'deleted'){
				    $("#resownerforgotpasssubmit").prop("disabled",false);
					$(".errforgetemail").addClass('errormsg').html('Your account was deleted! Please contact administrator').show();
					return false;
				}else if(output == 'pending'){
				    $("#resownerforgotpasssubmit").prop("disabled",false);
					$(".errforgetemail").addClass('errormsg').html('Your account is waiting for activation.').show();
					return false;
				}else if(output == 'deactivated'){
				    $("#resownerforgotpasssubmit").prop("disabled",false);
					$(".errforgetemail").addClass('errormsg').html('Your account was deactivated! Please contact administrator.').show();
					return false;
				}
				return false;
			});
		}
		return false;
	}
//---------------------------------------------------------------------------------------------//
//Restaurant Owner Forget Password End************************************************//
//---------------------------------------------------------------------------------------------//
//Get Show City
	function getCityListRest(statecode){
		
		req.onreadystatechange = function(){
			document.getElementById('showResCityList').innerHTML=('<span class="txt"><img align="right" style="margin:6px 5px 0 0;" src="'+jssitebaseUrl +'/theme/default/images/loader_veg.gif" border="0" alt="Loading.." /></span>');
	    	if(req.readyState == 4){
	    		
			 	if (req.status == 200){
			 		//alert(req.responseText);
			 		
			    	document.getElementById('showResCityList').innerHTML=req.responseText;
			 	}else {
		   	   		$.prompt("There was a problem while using XMLHTTP:\n" + req.statusText);
			 	}
	      	}
		}
	   	req.open("GET", jssitebaseUrl+"/ajaxActionRestaurant.php?statecode="+statecode+"&action=showResCityList", true);
	   	req.send(null);
	}
	//Get Show Zip
	function getZipListRest(cid){
		
		req.onreadystatechange = function(){
			
	    	if (req.readyState == 4){
			 	if (req.status == 200){
			 		//alert(req.responseText);
			    	document.getElementById('showResZipList').innerHTML=req.responseText;
			 	}else {
		   	   		$.prompt("There was a problem while using XMLHTTP:\n" + req.statusText);
			 	}
	      	}
		}
	   	req.open("GET", jssitebaseUrl+"/ajaxActionRestaurant.php?cid="+cid+"&action=showResZipList", true);
	   	req.send(null);
	}
	//---------------------------------------------------
	function restaurantResetValidate(){
		
		var err_lang_arr = error_language();

		var resetpassword  = $("#restaurant_resetpassword").val();
		var retypepassword = $("#restaurant_retypepassword").val();
		
		if(resetpassword == ''){
			
			//$("#errormsg").addClass('errormsg').html(err_lang_arr['enter_your_reset_password']);
	        $("#errormsg").addClass('errormsg').html(err_lang_arr['enter_your_reset_password']);
			$("#customer_resetpassword").focus();
			return false;		
		}
		if(retypepassword == ''){
			
			//$("#errormsg").addClass('errormsg').html(err_lang_arr['enter_your_retype_password']);
	        $("#errormsg").addClass('errormsg').html(err_lang_arr['enter_your_retype_password']);
			$("#customer_retypepassword").focus();
			return false;		
		}
		if(resetpassword != retypepassword){
			$("#errormsg").addClass('errormsg').html(err_lang_arr['enter_your_wrong_password']);
			$("#customer_retypepassword").focus();
			return false;
		}
		
	}
	