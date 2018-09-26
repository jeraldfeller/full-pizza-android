//text box check value script word is there or not
$("input[type=text],textarea").keyup(function(){
    var output = $(this).val();
    //alert(output);
    if(output.toLowerCase().match(/script/)) {
        $(this).val('');
	    alert("Please Avoid java script related codes");   
	}
});	

$(document).ready(function(){
	
	//Checkout Payment Information
	//if( document.getElementById("paymentInfoPro").checked==true){
	//	$("#paymentinfo_credit_paypalpro").show();
	//}
	$("#instructions").val(sessionStorage.getItem("instrucciones_especiales"));
	$("#deliverystreet").val(sessionStorage.getItem("calle"));
	//alert(sessionStorage.getItem('addressType'));
	
	sessionStorage.getItem("")
    
	$("#paymentInfoPro").click(function(){
		
		$("#paymentinfo_credit_paypalpro").show();
        $("#paymentinfo_credit_contact").hide();
        $("#payment_authorizeNetnfo").hide();
        $("#payment_idealinfo").hide();
        $(".tipOptionContent").show();
	});
	
	$("#paymentinfo_credit").click(function(){
	   
		$("#paymentinfo_credit_contact").show();
        $("#paymentinfo_credit_paypalpro").hide();
        $("#payment_authorizeNetnfo").hide();
        $("#payment_idealinfo").hide();
        $(".tipOptionContent").show();
	});
	$("#paymentinfo_paypal").click(function(){
	
		$("#paymentinfo_credit_contact").hide();
		$("#paymentinfo_cashon_contact").hide();
        $("#payment_authorizeNetnfo").hide();
        $("#payment_idealinfo").hide();
        $(".tipOptionContent").show();
	});
	$("#paymentinfo_cashon").click(function(){
		
		$("#paymentinfo_credit_contact").hide();
        $("#paymentinfo_credit_paypalpro").hide();
        $("#payment_authorizeNetnfo").hide();
        $("#payment_idealinfo").hide();
        $(".tipOptionContent").hide();
        //tipcalculation()
        $("[name=creditCal]").prop('checked', false);
	});
    $("#paymentinfo_authorize").click(function(){
		
		$("#paymentinfo_credit_contact").hide();
        $("#paymentinfo_credit_paypalpro").hide();
		$("#payment_authorizeNetnfo").show();
        $("#payment_idealinfo").hide();
        $(".tipOptionContent").show();
	});
    $("#paymentinfo_ideal").click(function(){
		
		$("#paymentinfo_credit_contact").hide();
        $("#paymentinfo_credit_paypalpro").hide();
		$("#payment_authorizeNetnfo").hide();
        $("#payment_idealinfo").show();
        $(".tipOptionContent").show();
	});
});
//-----------------------------------------------------------------------------------------//
//Checkout
function foodSoonAsCheck(){
	//alert("sri");
	if(document.getElementById("foodassoonas").checked == true){
		$("#soonaspos").hide();
	}else{
		$("#soonaspos").show();
	}
}

//-----------------------------------------------------------------------------------------//
//Clear Contact Info
function clearContactInfo(){
	
	$("#contactname").val('');
	$("#contactlastame").val('');
	$("#contactemail").val('');
	$("#contactpassword").val('');
	$("#contactphone").val('');
	$("#contactlandline").val('');
	$("#deliveryaddress").val('');
	$("#deliverystreet").val('');
	$("#deliverylandmark").val('');
	$("#deliveryarea").val('');
	$("#deliverycity").val('');
}
/*function example()
{
    alert('hi');
    	var contactname 	 = $("#contactname").val();
        
        return false;
}*/


//-----------------------------------------------------------------------------------------//
//Submit Order
function submitOrder(){
	//alert("sri"); 
	
	//Error Language
	
    
	var err_lang_arr = error_language();
	var paypal_type = $("[name=paymentinfo]:checked").val();
	
	/*if( document.getElementById("paymentinfo_cashon").checked==true){
		var paypal_type = $("#paymentinfo_cashon").val();
	}else if( document.getElementById("paymentInfoPro").checked==true){
		var paypal_type = $("#paymentInfoPro").val();
	}else if(document.getElementById("paymentinfo_authorize").checked==true){
		var paypal_type = $("#paymentinfo_authorize").val();
	}else{
		var paypal_type = '';
	}*/
	//alert(paypal_type);
	var contactname 	 = $("#contactname").val();
	var contactlastname	 = $("#contactlastname").val();
	
	var title			 = $("#deliveryaddresstitle").val();
	var add_title		 = $("#otheraddresstitle").val();
	var cus_type		 = $("#cus_type").val();
	
	var deliveryaddress  = $("#deliveryaddress").val();
	var deliverystreet   = $("#deliverystreet").val();
	var deliverylandmark = $("#deliverylandmark").val();
	var deliveryarea	 = $("#deliveryarea").val();
	var deliverycity	 = $("#deliverycity").val();
	var deliveryzip	 	 = $("#deliveryzip").val();
	var deliverystate	 = $("#deliverystate").val();
	var contactphone	 = $("#contactphone").val();
	var contactlandline  = $("#contactlandline").val();
	var contactemail	 = $("#contactemail").val();
	var contactpassword	 = $("#contactpassword").val();

	var datedelivery 	 = $("#datedelivery").val();
	var hr_delivery 	 = $("#hr_delivery").val();
	var min_delivery 	 = $("#min_delivery").val();
	var sess_delivery 	 = $("#sess_delivery").val();
	var instructions 	 = $("#instructions").val();
	var ordertotalprice  = $("#ordertotalprice").val();
	var restid  		 = $("#restid").val();
	var deliverypickup   = $("#deliverypickup").val();
	var offer   		 = $("#offer").val();
	var cusid   		 = $("#cusid").val();
	
	
	console.log("contactname: " +contactname);
	
	console.log("delivery_pickup nuevo: " + deliverypickup);
    //alert('come');exit;
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
    
	$(".errClass1").html('');
	
	instructions 	   = check_undefined(instructions);
	contactpassword    = check_undefined(contactpassword);
	contactlandline    = check_undefined(contactlandline);
	offer 	     	   = check_undefined(offer);
	$("#checkoutSubmit").prop("disabled",true);
    //alert("hai");
	if(contactname == ''){				
        $("#checkoutSubmit").prop("disabled",false);
		$("#contactnameerrormsg").addClass('errClass1').html(err_lang_arr['submit_order_contactname']);
		$("#contactname").focus();
		$("#contactname").parent().parent().addClass("has-error");
		return false;
	}
	else{
		$("#contactname").parent().parent().removeClass("has-error");
	}
	
	if(contactlastname == ''){
		console.log("entro en contactlastname empty");
	    $("#checkoutSubmit").prop("disabled",false);
		$("#contactlastnameerrormsg").addClass('errClass1').html(err_lang_arr['submit_order_contactlastname']);
		$("#contactlastname").focus();
		$("#contactlastname").parent().parent().addClass("has-error");
		return false;
	}
	else{
	    $("#checkoutSubmit").prop("disabled",false);
		$("#contactlastname").parent().parent().removeClass("has-error");
	}
	
    if (deliverypickup == 'delivery') {
        if(cus_type == 'Customer'){ 
            if(title == 'Other'){ 
                if(add_title == ''){
					
                    $("#checkoutSubmit").prop("disabled",false);
                    $("#otheradderrormsg").addClass('errClass1').html(err_lang_arr['submit_order_addresstitle']);
                    $("#otheraddresstitle").focus();
                    $("#otheraddresstitle").parent().parent().addClass("has-error");
                    return false;
                }
            }  
        } 
                      
         if(cus_type == 'Guest'){
			 
    		if(add_title == ''){
                $("#checkoutSubmit").prop("disabled",false);
    			$("#otheradderrormsg").addClass('errClass1').html(err_lang_arr['submit_order_addresstitle']);
    			$("#otheraddresstitle").focus();
    			$("#otheraddresstitle").parent().parent().addClass("has-error");
    			return false;
    		}
    		else{
                $("#checkoutSubmit").prop("disabled",false);
        		$("#otheraddresstitle").parent().parent().removeClass("has-error");
    		}
    	}
    	
    	if(deliverystreet == ''){
			
    	    $("#checkoutSubmit").prop("disabled",false);
    		$("#deliverystreeterrormsg").addClass('errClass1').html(err_lang_arr['submit_order_street']);
    		$("#deliverystreet").focus();
    		$("#deliverystreet").parent().parent().addClass("has-error");
    		return false;
    	}
    	else{
    	    $("#checkoutSubmit").prop("disabled",false);
    		$("#deliverystreet").parent().parent().removeClass("has-error");
    	}
    	
    	if(deliverystate == ''){
			console.log("centinela especial");
    	    $("#checkoutSubmit").prop("disabled",false);
    		$("#deliverystateerrormsg").addClass('errClass1').html(err_lang_arr['submit_order_state']);
    		$("#deliverystate").focus();
    		$("#deliverystate").parent().parent().addClass("has-error");
    		return false;
    	}
    	else{
    	    $("#checkoutSubmit").prop("disabled",false);
    		$("#deliverystate").parent().parent().removeClass("has-error");
    	}
    	if(deliverycity == ''){
			console.log("centinela especial");
    	    $("#checkoutSubmit").prop("disabled",false);
    		$("#deliverycityerrormsg").addClass('errClass1').html(err_lang_arr['submit_order_city']);
    		$("#deliverycity").focus();
    		$("#deliverycity").parent().parent().addClass("has-error");
    		return false;
    	}
    	else{
    	    $("#checkoutSubmit").prop("disabled",false);
    		$("#deliverycity").parent().parent().removeClass("has-error");
    	}
        if(deliveryzip == ''){
			console.log("centinela especial");
            $("#checkoutSubmit").prop("disabled",false);
    		$("#deliveryziperrormsg").addClass('errClass1').html(err_lang_arr['submit_order_zip']);
    		$("#deliveryzip").focus();
    		$("#deliveryzip").parent().parent().addClass("has-error");
    		return false;
    	}
    	else{
    	    $("#checkoutSubmit").prop("disabled",false);
    		$("#deliveryzip").parent().parent().removeClass("has-error");
    	}
    
    }
	
	if(contactphone == ''){
		console.log("centinela especial");
        $("#checkoutSubmit").prop("disabled",false);
		$("#contactphoneerrormsg").addClass('errClass1').html(err_lang_arr['submit_order_contactphone']);
		$("#contactphone").focus();
		$("#contactphone").parent().parent().addClass("has-error");
		return false;
	}
	else{		
        $("#checkoutSubmit").prop("disabled",false);
		$("#contactphone").parent().parent().removeClass("has-error");
	}
	/*if(contactphone != ''){ modificado aca
		if(isNaN(contactphone)){
			
            $("#checkoutSubmit").prop("disabled",false);
			$("#contactphoneerrormsg").addClass('errClass1').html(err_lang_arr['submit_order_validphoneno']);
			$("#contactphone").focus();
			$("#contactphone").parent().parent().addClass("has-error");
			return false;
		}
		else{
            $("#checkoutSubmit").prop("disabled",false);
    		$("#contactphone").parent().parent().removeClass("has-error");
		}
			
	} */
	
	if(contactemail == ''){
		console.log("centinela especial x");
        $("#checkoutSubmit").prop("disabled",false);
		$("#contactemailerrormsg").addClass('errClass1').html(err_lang_arr['submit_order_email']);
		$("#contactemail").focus();
		$("#contactemail").parent().parent().addClass("has-error");
		return false;
	}
	else{
	    $("#checkoutSubmit").prop("disabled",false);
		$("#contactemail").parent().parent().removeClass("has-error");
	}
	
	/*if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(contactemail))){ modificado aca
		console.log("centinela especial");
	    $("#checkoutSubmit").prop("disabled",false);
	   	$("#contactemailerrormsg").addClass('errClass1').html(err_lang_arr['submit_order_invalidemail']).show();
		$("#contactemail").focus();
		$("#contactemail").parent().parent().addClass("has-error");
		return false;
    }
	else{
	    $("#checkoutSubmit").prop("disabled",false);
		$("#contactemail").parent().parent().removeClass("has-error");
	} */
    
    if(cusid == ''){

		
    	/*if(contactpassword == ''){
    	    $("#checkoutSubmit").prop("disabled",false);
			$("#contactpasserrormsg").addClass('errClass1').html(err_lang_arr['submit_order_password']);
			$("#contactpassword").focus();
			$("#contactpassword").parent().parent().addClass("has-error");
			return false;
		}
		else{
            $("#checkoutSubmit").prop("disabled",false);
    		$("#contactpassword").parent().parent().removeClass("has-error");
		}*/
		if($("#customer_terms").is(":checked") == false){
		    $("#checkoutSubmit").prop("disabled",false);
			$("#custermerror").addClass('errormsg').html(err_lang_arr['submit_order_terms_conditions']);
			$("#customer_terms").focus();
			$("#customer_terms").parent().parent().addClass("has-error");
			return false;
		}
		else{
            $("#checkoutSubmit").prop("disabled",false);
    		$("#customer_terms").parent().parent().removeClass("has-error");
		}
	}
    console.log("herex");	
	//----------------------------------------------------------------------------------------//
    if(paypal_type == 'authorizenet'){
		
		var cardtype  		 = $("#aut_cardtype").val();
		var cardholdername   = $("#cardholdername").val();
		var cardnumber   	 = $("#aut_cardnumber").val();
		var cardexpmonth   	 = $("#aut_expmonth").val();
		var cardexpyear   	 = $("#aut_expyear").val();
		var cardcvccode   	 = $("#aut_cvccode").val();
		
		if(cardtype == ''){
		    $("#checkoutSubmit").prop("disabled",false);
			$("#aut_cardDetailserrormsg").addClass('errClass1').html("Please select your card type");
			$("#aut_cardtype").focus();
			return false;
		}
		if(cardholdername == ''){
		    $("#checkoutSubmit").prop("disabled",false);
			$("#aut_cardDetailserrormsg").addClass('errClass1').html("Please enter your name");
			$("#cardholdername").focus();
			return false;
		}
		if(cardnumber == ''){
		    $("#checkoutSubmit").prop("disabled",false);
			$("#aut_cardDetailserrormsg").addClass('errClass1').html("Please enter your card number");
			$("#aut_cardnumber").focus();
			return false;
		}
		else if( (cardnumber.length < 13) || (cardnumber.length > 16) ){
		    $("#checkoutSubmit").prop("disabled",false);
			$("#aut_cardDetailserrormsg").addClass('errormsg').html("Card number must between 13 and 16 digits");
			$("#aut_cardnumber").focus();
			return false;
		}
		
		if(cardexpmonth == ''){
		    $("#checkoutSubmit").prop("disabled",false);
			$("#aut_cardDetailserrormsg").addClass('errClass1').html("Please select your exp month");
			$("#aut_expmonth").focus();
			return false;
		}
		if(cardexpyear == ''){
		    $("#checkoutSubmit").prop("disabled",false);
			$("#aut_cardDetailserrormsg").addClass('errClass1').html("Please select your exp year");
			$("#aut_cardexpyear").focus();
			return false;
		}
		
		if(cardcvccode == ''){
		    $("#checkoutSubmit").prop("disabled",false);
			$("#aut_cardDetailserrormsg").addClass('errClass1').html("Please enter cvc code");
			$("#aut_cvccode").focus();
			return false;
		}
		
		if(cardcvccode != ''){
			if(cardtype == 'amex'){
				if( (cardcvccode.length < 4) || (cardcvccode.length > 4) ){
                    $("#checkoutSubmit").prop("disabled",false);
					$("#aut_cardDetailserrormsg").addClass('errClass1').html("CVC code must have 4 digits");
					$('#aut_cardcvccode').focus();
					return false;
				}
			}else if((cardcvccode.length < 3) || (cardcvccode.length > 3)){
                $("#checkoutSubmit").prop("disabled",false);
				$("#aut_cardDetailserrormsg").addClass('errClass1').html("CVC code must have 3 digits");
				$('#aut_cardcvccode').focus();
				return false;
			}
		}
	}
    //----------------------------------------------------------------------------------//
    if(paypal_type == 'paypalpro'){
		
		var cardtype  		 	 = $("#cardtype").val();
		var cardholderfirstname  = $("#cardholderfirstname").val();
        var cardholderlastname   = $("#cardholderlastname").val();
		var cardnumber   	 	 = $("#cardnumber").val();
		var cardexpmonth   	 	 = $("#expmonth").val();
		var cardexpyear   	 	 = $("#expyear").val();
		var cardcvccode   	 	 = $("#cvccode").val();
        
        var card	   = cardnumber.substr(0,1);
        var masterCard = cardnumber.substr(0,2);
        //alert(masterCard); return false;
		
		if(cardtype == 'Select Card'){
            $("#checkoutSubmit").prop("disabled",false);
			$("#cardDetailserrormsg").addClass('errClass1').html("Please select your card type");
			$("#cardtype").focus();
			return false;
		}
		if(cardholderfirstname == ''){
            $("#checkoutSubmit").prop("disabled",false);
			$("#cardDetailserrormsg").addClass('errClass1').html("Please enter your first name");
			$("#cardholderfirstname").focus();
			return false;
		}
        if(cardholderlastname == ''){
            $("#checkoutSubmit").prop("disabled",false);
			$("#cardDetailserrormsg").addClass('errClass1').html("Please enter your last name");
			$("#cardholderlastname").focus();
			return false;
		}
		if(cardnumber == ''){
		    $("#checkoutSubmit").prop("disabled",false);
			$("#cardDetailserrormsg").addClass('errClass1').html("Please enter your card number");
			$("#cardnumber").focus();
			return false;
		}else if(cardtype == 'visa'){
			
			if( (cardnumber.length != 13) && (cardnumber.length != 16) ){
			    $("#checkoutSubmit").prop("disabled",false);
				$("#cardDetailserrormsg").addClass('errormsg').html("Card number must between 13 and 16 digits");
				$("#cardnumber").focus();
				return false;
			}
			if(card != '4')
			{
	            $("#checkoutSubmit").prop("disabled",false);		 
				$("#cardDetailserrormsg").addClass('errormsg').html("Visa card number must starts with 4.");
				$("#cardnumber").focus();
				return false;
			}
		}else if(cardtype == 'master'){
			if( (cardnumber.length != 16) ){
                $("#checkoutSubmit").prop("disabled",false);
				$("#cardDetailserrormsg").addClass('errormsg').html("Master card number must have 16 digits.");
				$("#cardnumber").focus();
				return false;
			}
			if(masterCard < 51 || masterCard > 55){
			    $("#checkoutSubmit").prop("disabled",false);
				$("#cardDetailserrormsg").addClass('errormsg').html("Master card number starts with 51-55.");
				$("#cardnumber").focus();
				return false;
			}
		}else if(cardtype == 'maestro'){
			if( (cardnumber.length != 16) ){
                $("#checkoutSubmit").prop("disabled",false);
				$("#cardDetailserrormsg").addClass('errormsg').html("Maestro card number must have 16 digits.");
				$("#cardnumber").focus();
				return false;
			}
		}else if(cardtype == 'switch'){
			if( (cardnumber.length != 16) ){
                $("#checkoutSubmit").prop("disabled",false);
				$("#cardDetailserrormsg").addClass('errormsg').html("Switch card number must have 16 digits.");
				$("#cardnumber").focus();
				return false;
			}
		}
		
		if(cardexpmonth == 'Month'){
            $("#checkoutSubmit").prop("disabled",false);
			$("#cardDetailserrormsg").addClass('errClass1').html("Please select your exp month");
			$("#expmonth").focus();
			return false;
		}
		if(cardexpyear == 'Year'){
            $("#checkoutSubmit").prop("disabled",false);
			$("#cardDetailserrormsg").addClass('errClass1').html("Please select your exp year");
			$("#cardexpyear").focus();
			return false;
		}
		if(cardcvccode == ''){
            $("#checkoutSubmit").prop("disabled",false);
			$("#cardDetailserrormsg").addClass('errClass1').html("Please enter cvc code");
			$("#cvccode").focus();
			return false;
		}
		
		if(cardcvccode != ''){
			if(cardtype == 'amex'){
				if( (cardcvccode.length < 4) || (cardcvccode.length > 4) ){
				    $("#checkoutSubmit").prop("disabled",false);
					$("#cardDetailserrormsg").addClass('errClass1').html("CVC code must have 4 digits");
					$('#cardcvccode').focus();
					return false;
				}
			}else if((cardcvccode.length < 3) || (cardcvccode.length > 3)){
                $("#checkoutSubmit").prop("disabled",false);
				$("#cardDetailserrormsg").addClass('errClass1').html("CVC code must have 3 digits");
				$('#cardcvccode').focus();
				return false;
			}
		}
	}
    if(paypal_type == 'creditcard'){
        
        
        //var stripe_houseno       = $("#stripe_houseno").val();
        //var stripe_postcode      = $("#stripe_postcode").val();
        //var stripe_cardtype      = $("#stripe_cardtype").val();
        var cardname   	 	     = $("#stripe_cardname").val();
        var cardnumber   	 	 = $("#stripe_cardnumber").val();
		var cardexpmonth   	 	 = $("#stripe_expmonth").val();
		var cardexpyear   	 	 = $("#stripe_expyear").val();
		var cardcvccode   	 	 = $("#stripe_cvccode").val();
            
        /*if(stripe_houseno == ''){
            $('input[type="button"]').attr('disabled',false); 
			$("#stripecardDetailserrormsg").addClass('errClass1').html("Please enter your house number");
			$("#stripe_houseno").focus();
			return false;
		}
        if(stripe_postcode == ''){
            $('input[type="button"]').attr('disabled',false);
			$("#stripecardDetailserrormsg").addClass('errClass1').html("Please select your Postcode");
			$("#stripe_postcode").focus();
			return false;
		}
        if(stripe_cardtype == ''){
            $('input[type="button"]').attr('disabled',false);
			$("#stripecardDetailserrormsg").addClass('errClass1').html("Please select your card type");
			$("#stripe_cardtype").focus();
			return false;
		}*/
        /*if(cardname == ''){
            $("#checkoutSubmit").prop("disabled",false);
            $('input[type="button"]').attr('disabled',false);
			$("#stripecardDetailserrormsg").addClass('errClass1').html("Please enter  card holder name");
			$("#stripe_cardname").focus();
			return false;
		} 
        else {
            $("#stripe_cardname").parent().parent().removeClass("has-error");
		}*/
        if(cardnumber == ''){
            $("#checkoutSubmit").prop("disabled",false);
            $('input[type="button"]').attr('disabled',false);
			$("#stripecardDetailserrormsg").addClass('errClass1').html("Please enter your card number");
			$("#stripe_cardnumber").focus();
			return false;
		}
        else {
            $("#stripe_cardnumber").parent().parent().removeClass("has-error");
		}
        if(cardnumber != ''){
            if(isNaN(cardnumber)){
                $("#checkoutSubmit").prop("disabled",false);
                $('input[type="button"]').attr('disabled',false);
                $("#stripecardDetailserrormsg").addClass('errClass1').html("Enter valid card number");
    			$("#stripe_cardnumber").focus();
			     return false;
            }
            else {
                $("#stripe_cardnumber").parent().parent().removeClass("has-error");
	        }
            if( (cardnumber.length != 16) ){
                $("#checkoutSubmit").prop("disabled",false);
                $('input[type="button"]').attr('disabled',false);
    			$("#stripecardDetailserrormsg").addClass('errClass1').html("Card number must have 16 digits.");
    			$("#cardnumber").focus();
    			return false;
    		}
            else {
                $("#stripe_cardnumber").parent().parent().removeClass("has-error");
            }
        }
        if(cardcvccode == ''){
            $("#checkoutSubmit").prop("disabled",false);
            $('input[type="button"]').attr('disabled',false);
			$("#stripecardDetailserrormsg").addClass('errClass1').html("Please enter cvc code");
			$("#stripe_cvccode").focus();
			return false;
		}
        else {
            $("#stripe_cvccode").parent().parent().removeClass("has-error");
        }
        if(cardexpmonth == 'Month'){
            $("#checkoutSubmit").prop("disabled",false);
            $('input[type="button"]').attr('disabled',false);
			$("#stripecardDetailserrormsg").addClass('errClass1').html("Please select your exp month");
			$("#stripe_expmonth").focus();
			return false;
		}
        else {
            $("#stripe_expmonth").parent().parent().removeClass("has-error");
        }
		if(cardexpyear == 'Year'){
		    $("#checkoutSubmit").prop("disabled",false);
		    $('input[type="button"]').attr('disabled',false);
			$("#stripecardDetailserrormsg").addClass('errClass1').html("Please select your exp year");
			$("#stripe_expyear").focus();
			return false;
		}
        else {
            $("#stripe_expyear").parent().parent().removeClass("has-error");
        }
              
    }
    $("#checkoutSubmit").prop("disabled",true);
    //----------------------------------------------------------------------------------------------//
    //alert(paypal_type);
    // For Ideal payment
    if(paypal_type == 'ideal'){
        
        var bank = $("#bank").val();
        
        if(bank==''){
            $("#checkoutSubmit").prop("disabled",false);
            alert("Please select any one bank");
	        return false;
        }
    	/*if(ordertotalprice < '84'){
			//alert("Ideal Payment minimum total price more then 0.50 ");
			alert("Please order total price more then 84 for ideal payment");
			return false;
		}*/	
	}
    $("#checkoutSubmit").prop("disabled",true);
    //----------------------------------------------------------------------------------------------//
	if(deliverypickup == 'delivery'){
		
		/*if(document.getElementById("foodassoonas").checked == true){
			var deliveryassoonas = $("#foodassoonas").val();
		}else{
			var deliveryassoonas = 0 ;
		} */

		var deliveryassoonas = 0
		
		if(deliveryassoonas == '0'){
		//$("#datetimeerrormsg").addClass('errClass1').html("Please enter date and time for delivery ");
		//$("#deliverycity").focus();
		//return false;
			/*if(datedelivery == ''){
                $("#checkoutSubmit").prop("disabled",false);
				$("#dateerrormsg").addClass('errClass1 margin0').html(err_lang_arr['submit_order_deliverydate']);
				$("#datedelivery").focus();
				return false;
			} */
			if(hr_delivery == ''){
                $("#checkoutSubmit").prop("disabled",false);
				$("#timeerrormsg").addClass('errClass1 margin0').html(err_lang_arr['submit_order_timehr']);
				$("#hr_delivery").focus();
				return false;
			}
			if(min_delivery == ''){
                $("#checkoutSubmit").prop("disabled",false);
				$("#timeerrormsg").addClass('errClass1 margin0').html(err_lang_arr['submit_order_timemin']);
				$("#min_delivery").focus();
				return false;
			}
			if(sess_delivery == ''){
                $("#checkoutSubmit").prop("disabled",false);
				$("#timeerrormsg").addClass('errClass1').html(err_lang_arr['submit_order_timesess']);
				$("#sess_delivery").focus();
				return false;
			}
		}
	}
	console.log("llego aki3");
    $("#checkoutSubmit").prop("disabled",true);
	$.post(jssitebaseUrl+useFile,{'contactemail':contactemail,'action':'checkOrderEmailId'}, function(output){ 
		if(output == 'already'){
            $("#checkoutSubmit").prop("disabled",false);
			$("#errAlreadyemail").addClass('errormsg').html(err_lang_arr['submit_order_mailexist']).show();
			return false;
		} else if(output == 'gotopayment') { 
            $.post(jssitebaseUrl+useFile,{'action':'checkOrderResubmit'}, function(response) {
                if ($.trim(response) == 'already') {
                    window.location.href = jssitebaseUrl;                   
                    return false;
                }
                else if ($.trim(response) == 'proceed_order') { 
                    $.post(jssitebaseUrl+useFile,{'cusid':cusid,'action':'checkOrderStatus'}, function(response) {
                         //alert(response); return false;
                        if($.trim(response) == 'deactive'){
                           $("#checkoutSubmit").prop("disabled",false);
                           $("#submiterror").addClass('errormsg').html(err_lang_arr['submit_acc_deactivate']); 
                        }else{
                            if (deliverypickup == 'delivery') { 
                            $("#checkoutSubmit").prop("disabled",true);                          
                            $.post(jssitebaseUrl+useFile,{'restid':restid, 'deliverystreet':deliverystreet, 'deliverystate':deliverystate,'deliverycity':deliverycity,'deliveryzip':deliveryzip, 'action':'checkRestaurantDeliveryAddress' },
                                function(data)
                                {
                                    document.checkoutform.submit();
                                        $("#checkoutSubmit").prop("disabled",true); 
										return false;
                                    //alert(data);return false;
                                   /* if ($.trim(data) == 'Available') {
                                        document.checkoutform.submit();
                                        $("#checkoutSubmit").prop("disabled",true); 
                                        return false;
                                    } else {
                                        alert("This Restaurant Couldn't Delivery For Your Address");
                                        $("#checkoutSubmit").prop("disabled",false); 
                                        return false;
									} */
                                });
                        }else{
                              document.checkoutform.submit();
                              $("#checkoutSubmit").prop("disabled",true);
                              $('#checkoutSubmit').removeAttr('disabled');
                        }
                        }
                    });
				    return false;
                }  
            });
		} else {
            $("#checkoutSubmit").prop("disabled",false);
			alert(err_lang_arr['resdetail_checkout_error']);
			return false;
		}
		return false;
	});
	return false;
}

//-----------------------------------------------------------------------------------------//
function getCityListCuscheck(statecode){   
	//alert(statecode);
    
    var useAction = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxAction.php' : '/use-action';
	req.onreadystatechange = function(){
		document.getElementById('showCusCityListcheck').innerHTML=('<span class="txt"><img align="right" style="margin:6px 5px 0 0;" src="'+jssitebaseUrl +'/images/loader_veg.gif" border="0" alt="Loading.." /></span>');
    	if (req.readyState == 4){
		 	if (req.status == 200){
		 		//alert(req.responseText);
		    	document.getElementById('showCusCityListcheck').innerHTML=req.responseText;
		 	}else {
	   	   		$.prompt("There was a problem while using XMLHTTP:\n" + req.statusText);
		 	}
      	}
	}
   	req.open("GET", jssitebaseUrl+"/ajaxAction.php?statecode="+statecode+"&action=showCusCityListcheck", true);
   	req.send(null);
}
//-----------------------------------------------------------------------------------------//
//Get Show Zip
function getZipListRestcheck(cid){
    
    var useAction = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxAction.php' : '/use-action';
	req.onreadystatechange = function(){
		
    	if (req.readyState == 4){
		 	if (req.status == 200){
		 		//alert(req.responseText);
		    	document.getElementById('showCusZipListcheck').innerHTML=req.responseText;
		 	}else {
	   	   		$.prompt("There was a problem while using XMLHTTP:\n" + req.statusText);
		 	}
      	}
	}
   	req.open("GET", jssitebaseUrl+"/ajaxAction.php?cid="+cid+"&action=showCusZipListcheck", true);
   	req.send(null);
}
//-----------------------------------------------------------------------------------------//
//Get Address for check out
function getAddressByTitle(deliverypickup){
	console.log('entro en deliverypickup ' + deliverypickup);
	var address		= $("#deliveryaddresstitle").val();
    var useAction = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxAction.php' : '/use-action';
	
	var selectedText = $( "#deliveryaddresstitle option:selected" ).text();

	if(address == 'Other'){
		$("#OtherAddress").show();
		$("#deliverystreet").val('');
		$("#deliveryaddress").val('');
		$("#deliverystate").val('');
		$("#deliverycity").val('');
		$("#deliveryzip").val('');

		/*$("#flooraddress").val('');
        $("#apartmentaddress").val('');
        $("#companyaddress").val('');
        $("#universityaddress").val('');
        $("#facultyaddress").val('');*/
		$("#flooraddress").show();
        $("#apartmentaddress").show();
        $("#companyaddress").show();
        $("#universityaddress").show();
        $("#facultyaddress").show();
        $("#flooraddresslabel").show();
        $("#apartmentaddresslabel").show();
        $("#companyaddresslabel").show();
        $("#universityaddresslabel").show();
        $("#facultyaddresslabel").show();
		console.log('entro en other');
		return false;
	}else{
		

		$("#OtherAddress").hide();


		switch(selectedText) {
		    case 'Universidad':
		    	console.log('entro en else' + selectedText);
		        $("#flooraddress").show();
		        $("#apartmentaddress").show();
		        $("#companyaddress").hide();
		        $("#universityaddress").show();
		        $("#facultyaddress").show();
		        $("#flooraddresslabel").show();
		        $("#apartmentaddresslabel").show();
		        $("#companyaddresslabel").hide();
		        $("#universityaddresslabel").show();
		        $("#facultyaddresslabel").show();
		        break;
		    case 'Apartamento':
		    	console.log('entro en else' + selectedText);
		        $("#flooraddress").show();
		        $("#apartmentaddress").show();
		        $("#companyaddress").hide();
		        $("#universityaddress").hide();
		        $("#facultyaddress").hide();
		        $("#flooraddresslabel").show();
		        $("#apartmentaddresslabel").show();
		        $("#companyaddresslabel").hide();
		        $("#universityaddresslabel").hide();
		        $("#facultyaddresslabel").hide();
		        break;
		    case 'Oficina':
		    	console.log('entro en else' + selectedText);
		        $("#flooraddress").show();
		        $("#apartmentaddress").show();
		        $("#companyaddress").show();
		        $("#universityaddress").hide();
		        $("#facultyaddress").hide();
		        $("#flooraddresslabel").show();
		        $("#apartmentaddresslabel").show();
		        $("#companyaddresslabel").show();
		        $("#universityaddresslabel").hide();
		        $("#facultyaddresslabel").hide();
		        break;
		    case 'Hotel':
		    	console.log('entro en else' + selectedText);
		        $("#flooraddress").show();
		        $("#apartmentaddress").show();
		        $("#companyaddress").hide();
		        $("#universityaddress").hide();
		        $("#facultyaddress").hide();
		        $("#flooraddresslabel").show();
		        $("#apartmentaddresslabel").show();
		        $("#companyaddresslabel").hide();
		        $("#universityaddresslabel").hide();
		        $("#facultyaddresslabel").hide();
		        break;

		    // default:
		    //     code block
		}

		$.post(jssitebaseUrl+useAction,{"address":address, "deliverypickup":deliverypickup, "action":"GetAddress"}, function(response){
			//alert(response); return false;
			$("#addressbook").html(response);
		});




		var flooraddress = $("#flooraddress").val();
		var apartmentaddress = $("#apartmentaddress").val();
		var companyaddress = $("#companyaddress").val();
		var universityaddress = $("#universityaddress").val();
		var facultyaddress = $("#facultyaddress").val();

		$('#addressTypeContainer').load(jssitebaseUrl+"/ajaxAction.php?action=GetAddress",{'floor':flooraddress,'apartment':apartmentaddress,'company':companyaddress,'university':universityaddress,'faculty':facultyaddress});
	}


	/*if(address == 'Other'){
		$("#OtherAddress").show();
		$("#deliverystreet").val('');
		$("#deliveryaddress").val('');
		$("#deliverystate").val('');
		$("#deliverycity").val('');
		$("#deliveryzip").val('');
		console.log('entro en other');
		return false;
	}else{
		console.log('entro en else');
		$("#OtherAddress").hide();
		$.post(jssitebaseUrl+useAction,{"address":address, "deliverypickup":deliverypickup, "action":"GetAddress"}, function(response){
			//alert(response); return false;
			$("#addressbook").html(response);
		});
	}*/
}
//-----------------------------------------------------------------------------------------//
//Tip calculation Perchantage
function tipcalculation(per,subtot){
   
    //alert('subtot---->'+subtot);
    var grandtotal = $("#grandtotal").val(); 
    //alert('grandtotal=====>'+grandtotal);
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
	$.post(jssitebaseUrl+useFile,{'per':per,'subtot':subtot,'grandtotal':grandtotal, 'action':'tipcalculation'}, function(output){
	   //alert('output===>'+output);
       	//return false;
		var answer_info = output.split("^^");
        
		$(".pervalue").val(answer_info[0]);
        $("#checkpervalue").html(answer_info[0]);    
        $("#checkpervalue1").append("<input type='hidden' name='checkpervalue' class='checkpervalue1' value='"+answer_info[0]+"' />");    
        
		$(".updatevalue").html(answer_info[1]);
		$("#checkupdatetotal").html(answer_info[2]+' '+answer_info[1]);
		$("#checkupdatetotal1").append("<input type='hidden' name='checkupdatetotal1' class='checkupdatetotal1' value='"+answer_info[1]+"' />");
        if(answer_info[0] != '0.00') {
            $("#checkupdatetotalshow").show();
        } else {
            $("#checkupdatetotalshow").hide();
        }
	});
}
//---------------------------------
//paytip textbox
function calculateSumPaypal(tot){
	var sum = tot;
	var tipval;
	$("#txtcredit").each(function() {
		tipval = parseFloat(this.value);
        if(!isNaN(this.value) && this.value.length!=0) {
            sum += parseFloat(this.value);
        }
        $(".pervalue").val(this.value);
        $("#checkpervalue").html(tipval.toFixed(2));
		$("#checkpervalue1").append("<input type='hidden' name='checkpervalue' class='checkpervalue1' value='"+this.value+"' />");
    });
    $(".updatetotal").html(sum.toFixed(2));
    $("#checkupdatetotal").html(sum.toFixed(2));
	$("#checkupdatetotal1").append("<input type='hidden' name='checkupdatetotal1' class='checkupdatetotal1' value='"+sum.toFixed(2)+"' />");
}
//---------------------------------
//Credittip textbox
function calculateSum(tot){
	var sum = tot;
	var tipval;
	$("#txt1").each(function() {
		tipval = parseFloat(this.value);
        if(!isNaN(this.value) && this.value.length!=0) {
            sum += parseFloat(this.value);
        }
        $(".pervalue").val(this.value);
        $("#checkpervalue").html(tipval.toFixed(2));
		$("#checkpervalue1").append("<input type='hidden' name='checkpervalue' class='checkpervalue1' value='"+this.value+"' />");
    });
    $(".updatetotal").html(sum.toFixed(2));
    $("#checkupdatetotal").html(sum.toFixed(2));
	$("#checkupdatetotal1").append("<input type='hidden' name='checkupdatetotal1' class='checkupdatetotal1' value='"+sum.toFixed(2)+"' />");
}
//-----------------------------------------------------------------------------------------//
//voucher code apply
function applyVoucherCode(resId){
    //alert(resId);
    //return false;
    var voucher         = $.trim($("#voucher").val());
    var deliverypickup   = $.trim($("#deliverypickup").val());
    //alert("ghello");
    //alert(voucher);
    //alert(deliveryPickup);
    //return false;
    //alert(resId);
    var per = $("[name=creditCal]:checked").val();
    var subtot = $("#tipsubtot").val();
    $("#voucherErr").html('');
    if (voucher == '') {
        $("#voucherErr").html("Voucher code cannot be empty")
    }else {
        //alert("yesyu");
        //return false;
        $("#checkoutcart").load(jssitebaseUrl+"/ajaxAction.php",{'voucher':voucher, 'resid':resId, 'deliverypickup':deliverypickup,'action':'applyVoucher'});
        //tipcalculation(per,subtot);
        return false;
    }
    //alert('hi'); 
    return false;
}

//Destroy voucher
function removeVoucherCode(resId)
{
    //alert("dzfdjf");
   
    var deliverypickup   = $.trim($("#deliverypickup").val());
     $('div#checkoutcart:visible').load(jssitebaseUrl+"/ajaxAction.php",{'resid':resId,'deliverypickup':deliverypickup,'action':'destryVoucher'});
     var per = $("[name=creditCal]:checked").val();
    var subtot = $("#tipsubtot").val(); 
    //tipcalculation(per,subtot);   
}