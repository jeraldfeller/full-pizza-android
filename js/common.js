//text box check value script word is there or not
$("input[type=text],textarea").keyup(function(){
    var output = $(this).val();
    //alert(output);
    if(output.toLowerCase().match(/script/)) {
        $(this).val('');
	    alert("Please Avoid java script related codes");   
	}
});	

// Form validation design

	$(document).ready(function(){
		$(".nav a").on("click", function(){
  			$(".nav").find(".active").removeClass("active");
   			$(this).parent().addClass("active");
   			var isVisible = $( ".loginContain" ).is( ":visible" );
			$(".loginContain:visible").toggle();
		});
		//restowner
		var accheight = $(".myAccntMenuUl").outerHeight() - $("#myacctFooter").outerHeight();
		//alert(accheight);
		$(".detailsInnerNewWrap").css("min-height",accheight);

		//fb cart script
		$(".fb-addCart a").click(function(){
			$("#menu_container").toggle();
		});

		//alert($(window).height()+" "+$(".header").outerHeight()+" "+$("footer.footer").outerHeight());
		var windhei = $(window).height() - ($(".header").outerHeight() + $("footer.footer").outerHeight());
		$("#balancing").css("min-height",windhei);
		$(".form-control").keypress(function(){
			$(this).parent().parent().removeClass("has-error has-feedback");
			$(".errormsg").html('');
			$(".errClass1").html('');
		});

		// var doc_height=$(document).height();	
		// //alert(doc_height);	
		// $(".ownerInnerwrap").css("min-height",doc_height);
		// $(".myAccntMenu").css("min-height",doc_height);

		var left_height = $(".myAccntMenuUl").outerHeight();
		$(".ownerInnerwrap .white ").css("background","#ffffff");
		$(".ownerInnerwrap .white .restaurantReviewsContent").css({"min-height":left_height,"background":"#ffffff"});


	});

// On loading image 

 window.onbeforeunload=before;				
	function before(){
	   $("#maska").show();
	   $(".ui-loader").show();
	}

//------------------------------------------------------------------------
//Open Faq
function openFaq(a){
	var e = document.getElementById(a);
	if(e.style.display=="none"){
		var i;
		var tot=document.getElementById("total").value;
		for (i=1; i<=tot; i++) {
			var d = new Array(i);
			d[i] = "q" + i;
			if (document.getElementById(d[i])) {
				document.getElementById(d[i]).style.display="none";
			} 
			e.style.display="block";
		}
	}
	else {
		e.style.display="none"
	}
	/*$('.staticContent').hide();

	if( $('#ans'+ansId).is(':visible') ){
		$('#ans'+ansId).hide();
	}else{
		$('#ans'+ansId).show();
	}*/
}

//-----------------------------------------------------------------------
// viewRestaurantNamewise
function viewRestaurantNamewise(firstname){
	
	firstname 		= check_undefined(firstname);
    var useAction = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxAction.php' : '/use-action';
    
	$('#resnameDetailsList').html('<div class="addtocartloading"><span class="image"><img src="'+jssitebaseUrl +'/theme/default/images/loader.gif" border="0" alt="Loading" /></span><span>Please wait...</span></div>').show();
	$("#resnameDetailsList").load(jssitebaseUrl+"/ajaxAction.php",{'firstname':firstname,'action':'viewRestaurantNamewise' } );
	
}

$(".viewRestAllInner .viewAlpha").click(function() { 
		$(".viewAlpha").removeClass("active");
		$(this).addClass("active"); 
});

//--------------------------------------------------------------------------
//Facebook pageTabFBConnectSite
	function pageTabFBConnectSite()
		{
		  //alert("lll");
			FB.init({
					appId   : site_fb_appsid,		
					status  : true, 
					cookie  : true, 
					xfbml   : true
				});
			
			 FB.login(function(response) 
			 {
	        	if (response.authResponse) 
				{
	          		FB.api('/me', function(response) 
					{
	          			//alert(response.email);
	          			if(response.email!="")
	          			{
     			            var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
                            $.post(jssitebaseUrl+useFile,{'fb_email':response.email, 'fb_username':response.username, 'fb_userid':response.id, 'fb_first_name':response.first_name, 'fb_last_name':response.last_name, 'fb_location':response.location.name, 'action' : 'pageTabFBOrderMenuCustomer'},function(data_new)
							{
							 //alert(data_new);
                             return false;
								if(data_new=="fb_userid_success")
								{
									window.location.href=jssitebaseUrl+"/index.php";
								}else{
									alert("Error");
									FB.logout();
								}
								
							});
                            //return false;
						}
	          		});
	        	}
	       	 },{scope: 'email'}); 
  		}

//--------------------------------------------------------------------------
//Facebook pageTabFBConnectMenu
	function pageTabFBConnectMenu(resid)
		{
			FB.init({
					appId   : site_fb_menu_appsid,
					//appId   : '506413799384574',			
					status  : true, 
					cookie  : true, 
					xfbml   : true
				});
			
			 FB.login(function(response) 
			 {
	        	if (response.authResponse) 
				{
	          		FB.api('/me', function(response) 
					{
					   
	          			if(response.email!="")
	          			{
	          			    /*alert(response.name);
                            alert(response.first_name);
                            alert(response.last_name);
                            //alert(response.hometown.name);//its working fine
                            alert(response.location.name);//its working fine*/
                            var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
                            $.post(jssitebaseUrl+useFile,{'fb_email':response.email, 'fb_username':response.username, 'fb_userid':response.id, 'fb_first_name':response.first_name, 'fb_last_name':response.last_name, 'fb_location':response.location.name, 'action' : 'pageTabFBOrderMenuCustomer'},function(data_new)
							{
							     //alert(data_new);    
								if(data_new=="fb_userid_success")
								{
									window.location.href=jssitebaseUrl+"/restaurantDetails.php",{'resid':resid};
								}else{
									alert("Error");
									//FB.logout();
								}
								
							});
                            //return false;
						}
	          		});
	        	}
	       	 },{scope: 'email'}); 
  		}
//-------------------------------------------------------------------------------------------
	//Facebook Logout
	function FacebookLogout(){
		FB.init({
			appId   : site_fb_appsid,			
			status  : true, 
			cookie  : true,
			oauth : true, 
			xfbml   : true
		});
		FB.getLoginStatus(function(response) {
          if (response.authResponse) {
            FB.logout(function() {
              customerLogout();
            });
            return false;
          } else {
            customerLogout();
            return false;
          }
        });
        //window.location.href = jssitebaseUrl+'/ajaxFile.php?action=customerLogout';
	}
	//Customer Logout
	function customerLogout() {
	   
        window.location.href = jssitebaseUrl+'/ajaxFile.php?action=customerLogout';
	}
	//Restaurant Logout
	function restaurantLogout(){
	   var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
		$.post(jssitebaseUrl+useFile,{'action':'restaurantLogout'}, function(output){
			//alert(output);
			if(output=='logout'){
				window.location = jssitebaseUrl;
			}
		});
	}

//------------------------------------------------------------------------------
//Feedback Validation
function validateFeedback()
{
	//Error Language
	var err_lang_arr 	   = error_language();
	$(".errormsg").html('');
	
	var feedback       = $.trim($("#feedback").val());
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
	
	if(feedback == ''){
		$("#errormsgFeed").addClass('errormsg').html(err_lang_arr['site_feedback_empty']);
		$("#feedback").focus();
		return false;
	}
	else if(feedback != ''){
	   $('#submitFeedback').attr('disabled', true);
		$.post(jssitebaseUrl+useFile,{"feedback":feedback,"action":"sendFeedback"},function(response){
			
			if($.trim(response) == "insert"){
				$(".restaurantFeedbackSuccess").html(err_lang_arr['site_feedback_success_msg']).show();
				setTimeout(function() {  
				    $(".restaurantFeedbackSuccess").hide();
                    $("#feedback").val('');
                    $('#submitFeedback').removeAttr('disabled');
                 }, 2000);
				
			}
		});
		return false;
	}
	return false;
}
//---------------------------------------------------------------------------------------------//
//Common Method START--------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------
//Popup Window Close
function myPopupWindowClose(myPopupWindowId){
	if(myPopupWindowId == '#guestDetailPop'){
		guestDetailValid();
	}else{
	   if(myPopupWindowId	!=	'#orderPopup_limit'){
            $('#maska').fadeOut();
        }
		//$('#maska').fadeOut();
        
		$(myPopupWindowId).hide();
		$(".popupContain").hide();
		$(".popbgmask").hide();
	}
    if(myPopupWindowId	==	'#orderPopup_limit'){
        $('#maskaa').fadeOut();
    }
	if(myPopupWindowId	==	'#bookingViewFullDetailsPop'){
		//$('#maskaa').fadeOut();
		//$(myPopupWindowId).hide();
	}
	$(".neworderscroll").removeClass("fixedpos");
		
}
//Popup Window Open
function myPopupWindowOpen(myPopupWindowId,myMaskId){
	
	//Popup
	/*	var ismozilla 	= $.browser.mozilla;
		var isie 		= $.browser.msie;
		
		if (document.documentElement.scrollHeight === document.documentElement.clientHeight) {
			if(isie == true){
				var maskHeight = $(document).height()-6;
			}else{
				var maskHeight = $(document).height()-2;
			}
		}else{
			if(ismozilla == true){
				var maskHeight = $(document).height();
			}
			else{
				var maskHeight = $(document).height()-2;
			}
		}
		if (document.documentElement.scrollWidth === document.documentElement.clientWidth) {
			var maskWidth = $(window).width()-2;
		}else{
			var maskWidth = $(window).width()-19;
		}
				
		if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){ //test for MSIE x.x;
	 	var ieversion=new Number(RegExp.$1) // capture x.x portion and store as a number
	 	if (ieversion==7)
			var maskWidth = $(window).width()-3;
		}
		*/
		//$(myMaskId).css({'width':maskWidth,'height':maskHeight});
		//$(myPopupWindowId).fadeIn(2000);
		$(myPopupWindowId).show();
		$(myPopupWindowId).css({"display":"block"});
		//$(myMaskId).fadeIn(1000);
		$(myMaskId).show();
		$(myMaskId).fadeTo("slow",0.5);
		
		var winscrollH = $(window).height();
		$(".neworderscroll").css("height",winscrollH);
		$(".neworderscroll").addClass("fixedpos");
		
		var windowWidth = document.documentElement.clientWidth;
		var windowHeight = document.documentElement.clientHeight;
		var popupHeight = $(myPopupWindowId).height();
		var popupWidth = $(myPopupWindowId).width();
		var winH = $(window).height();
		var winW = $(window).width();
		var winnewtop = $(window).scrollTop() + 100;
		var maskpopheight = $(window).scrollTop() + 100;
		
		//centering
		if(myPopupWindowId == '#orderpop'){
			
			//var addtocart_pop_ht = $('.addtocartWrapNew1').height();
			//alert(addtocart_pop_ht);
			
			var topvar =(winH-popupHeight)/ 2 + 'px';
			var leftvar = (winW-popupWidth)/ 2 + 'px';
		}else{
			var topvar 	= windowHeight/2-popupHeight/2 + 'px';
			var leftvar = windowWidth/2-popupWidth/2 + 'px';
		}
		
		/*alert(windowHeight);
		alert(popupHeight);
		alert(topvar);
		alert(leftvar);*/
		
		//$(myPopupWindowId).css({"z-index":"1101","top": windowHeight/2-popupHeight/2,"left": windowWidth/2-popupWidth/2});
		if(myPopupWindowId == '#orderpop'){
			//$(myPopupWindowId).css({"position": "fixed","top": topvar,"left": leftvar});
		}
		else{
			$(myPopupWindowId).css({"position": "fixed","top": topvar,"left": leftvar});
		}
		//$("#orderpop").css({"position": "static"});
		$(".popupContain").css("top",winnewtop);
		$(".popbgmask").css("height",maskpopheight);
		
}

//---------------------------------------------------------------------------------------------//
//AJAX START-----------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------//
function getXMLHTTP() { //fuction to return the xml http object                                     
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
//---------------------------------------------------------------------------------------------//
//AJAX END-----------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------// 

//---------------------------------------------------------------------
function check_undefined(Chk_Var)
{
	if(Chk_Var == undefined)
	{
		Chk_Var = "";
	}
	return Chk_Var;
}

//------------------------------------------------------------------------------------------------------
//Guest Details Popup
function guestDetailPopup(){
	$("#errormsg").html('');
	myPopupWindowOpen('#guestDetailPop','#maska');
}
function guestDetailValid(){
	
	//Error Language
	var err_lang_arr 	   = error_language();
	
	var guest_name 		= $('#guest_name').val();
	var guest_email 	= $('#guest_email').val();
	var guest_country 	= $('#guest_country').val();
	var guest_skypeid	= $('#guest_skypeid').val();
    
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
	
	if(guest_name == ''){
		$("#errormsg").addClass('errormsg').html(err_lang_arr['common_plese_enter_yourname']);
		$("#guest_name").focus();
		return false;		
	}
	else if(guest_email == ''){
		$("#errormsg").addClass('errormsg').html(err_lang_arr['common_plese_enter_youremail']);
		$("#guest_email").focus();
		return false;		
	}
	else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(guest_email))){
	   	$("#errormsg").addClass('errormsg').html(err_lang_arr['common_plese_enter_validmail']);
		$("#guest_email").focus();
		return false;
    }
	else if(guest_country == ''){
		$("#errormsg").addClass('errormsg').html(err_lang_arr['common_plese_enter_yourcountry']);
		$("#guest_country").focus();
		return false;		
	}else{
		$.post(jssitebaseUrl+useFile,{'guest_name':guest_name,'guest_email':guest_email,'guest_country':guest_country,'guest_skypeid':guest_skypeid,'action':'updateGuestInfo'}, function(output){
			//alert(output);
			if(output == 'success'){
				window.location.href=jssitebaseUrl;
			}else if(output == 'invalid_domain'){
				$("#errormsg").addClass('errormsg').html(err_lang_arr['common_plz_enter_valideaddress']);
				return false;
			}else{
				$("#errormsg").addClass('errormsg').html(err_lang_arr['common_error_occured']);
				return false;
			}
			return false;
		});
		return false;
	}
}
//--------------------------------------------------------------------------
//ContactUs Validation
function contactValidate(){
	
	//Error Language
	var err_lang_arr = error_language();
	
	var contactname 			= $.trim($("#contact_name").val());
	var contactemail 			= $.trim($("#contact_email").val());
	var contactordernumber 	    = $.trim($("#contact_ordernumber").val());
	var contactorderdate 		= $.trim($("#contact_orderdate").val());
	var contactrestaurantname 	= $.trim($("#contact_restaurantname").val());
	var contactcomments 		= $.trim($("#contact_comments").val());
	var contactdigit 	    	= $.trim($("#contact_digit").val());
	var captchcode				=$("#captchcode").val();
	//var captchcode				= $.trim(".contact_verifycode").html();
	var nameRegex = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
	
	$(".errormsg").html('');
	//alert(contactname);
	$("#contactussubmit").prop("disabled",true);
	if(contactname == ''){
	    $("#contactussubmit").prop("disabled",false);
		$("#errormsg").addClass('errormsg').html(err_lang_arr['contact_contactname']);
		$("#contact_name").focus();
		return false;		
	}
	if(!contactname.match(nameRegex)) {
	    $("#contactussubmit").prop("disabled",false);
	    $("#errormsg").addClass('errormsg').html(err_lang_arr['conatct_valid_contactname']);
	    $("#contact_name").focus();
	    return false;
  	}
  	
  	if(contactemail == ''){
  	    $("#contactussubmit").prop("disabled",false);
		$("#errormsg").addClass('errormsg').html(err_lang_arr['contact_email']);
		$("#contact_email").focus();
		return false;		
	}
	if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(contactemail))){
        $("#contactussubmit").prop("disabled",false);
	   	$("#errormsg").addClass('errormsg').html(err_lang_arr['conatct_valid_contactmail']).show();
		$("#contact_email").focus();
		return false;
    }
    if(contactdigit == ''){
        $("#contactussubmit").prop("disabled",false);
		$("#errormsg").addClass('errormsg').html(err_lang_arr['contact_code']);
		$("#contact_digit").focus();
		return false;		
	}
	if(contactdigit != captchcode){
	    $("#contactussubmit").prop("disabled",false);
		$("#errormsg").addClass('errormsg').html(err_lang_arr['contact_valid_code']);
		$("#contact_digit").focus();
		return false;
	}
    
}

//--------------------------------------------------------------------------
//Gprs Printer Acknowledgement
function goToAck(orderid)
{
	myPopupWindowOpen('#printer_respone','#maska');
	
	var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
    var useAction = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxAction.php' : '/use-action';
	//ajaxTime.php is called every second to get time from server
	var refreshId = setInterval(function()
   	{
   		$.post(jssitebaseUrl+useFile,{'action':'check_print_res','orderid':orderid}, function(output){
   			//alert(output);
  			if (output=='Y') {
  				
                $("#printer_respone").load(jssitebaseUrl+useAction, {'action':'check_printer_response','orderid':orderid}, function(output){
     		
     				//stop the clock when this button is clicked
					clearInterval(refreshId);
				});  
            }
  		});
   	}, 10000);
	
}
//-------------------------------------------------------------------//
//Facebook Connect/ Login
function callFacebookConnect()
{
	//alert("hi");
	//Error Language
	var err_lang_arr = error_language();
	FB.init({
			appId   : site_fb_appsid,
			status  : true, 
			cookie  : true, 
			xfbml   : true
		});
	
	 FB.login(function(response) 
	 {
	 	//alert(response);
        //return false;
    	if (response.authResponse) 
		{
      		FB.api('/me', function(response) 
			{
      			//alert(response.email);
      			if(response.email!="")
      			{
      				/*alert(response.email);
      				alert(response.name);
      				alert(response.first_name);
      				alert(response.last_name);
      				alert(response.username);
      				alert(response.gender);
      				alert(response.id);return false;*/
                    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
    
					$.post(jssitebaseUrl+useFile,{'customerlogemail':response.email, 'customername':response.name, 'customerfirstname':response.first_name, 'customerlastname':response.last_name, 'action' : 'customerLoginFb'},function(data)
					{
						//alert(data);
                        //return false;
						if(data=="loginSuccess")
						{
							window.location.href=jssitebaseUrl+"/customerMyaccount.php";
						}else{
							alert(err_lang_arr['common_invalid_email_id']);
							FB.logout();
						}
						
					});
				}
      		});
    	}
   	 },{scope: 'email'}); 
}
//-----------------------------------------------------------------------------------------//
function callFacebookConnectCheckout(resid,offer,deliverypickup)
	{
		//Error Language
		var err_lang_arr = error_language();
		FB.init({
				appId   : site_fb_appsid,			
				status  : true, 
				cookie  : true, 
				xfbml   : true
			});
		
		 FB.login(function(response) 
		 {
        	if (response.authResponse) 
			{
          		FB.api('/me', function(response) 
				{
          			//alert(response.email);
          			if(response.email!="")
          			{
          				/*alert(response.email);
          				alert(response.name);
          				alert(response.first_name);
          				alert(response.last_name);
          				alert(response.username);
          				alert(response.gender);
          				alert(response.id);return false;*/
                        var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
    
						$.post(jssitebaseUrl+useFile,{'customerlogemail':response.email, 'customername':response.name, 'customerfirstname':response.first_name, 'customerlastname':response.last_name, 'action' : 'customerLoginFb'},function(data)
						{
							//alert(data);
							if(data=="loginSuccess")
							{
								window.location.href=jssitebaseUrl+"/checkout.php?resid="+resid+"&offer="+offer+"&deliverypickup="+deliverypickup;
							}else{
								alert(err_lang_arr['common_fbinvalid_email_id']);
								FB.logout();
							}
							
						});
					}
          		});
        	}
       	 },{scope: 'email'}); 
	}
//------------------------------------------------------------------------------------
	//Terms and Condition POPUP
	function termsConditionPopup(){
		myPopupWindowOpen('#termsCondition','#maska');
	}
	//Food Allergy and Dietary Information PopUp
	function foodAllergyDietary(){
		myPopupWindowOpen('#foodAllergy','#maska');
	}
$(document).ready(function(){
						   
	/*$("#signindrop").click(function(){
		$(".loginContain").toggle();
	});*/
	

	$("#profileIcon").click(function(){
		$(".loginContain").toggle();
	});

	$(".partialHeader").click(function(){
		var isVisible = $( ".loginContain" ).is( ":visible" );

		$(".loginContain:visible").toggle();
	});

	

	$(".howImg img").mouseover(function(){
		$(this).addClass("flip animated");
	});
	$(".howImg img").mouseout(function(){
		$(this).removeClass("flip animated");
	});
	/*$(document).click(function(event){ 
		if($(event.target).closest(".headerTopRight").length == 0) {
			$(".loginContain").fadeOut(200);
		}
	}); */

	/*$(document).click(function(event){ 
		if($(event.target).closest("#profileIcon").length == 0) {
			$(".loginContain").fadeOut(200);

		}
	}); */
	
	$(".myAccntMenu").css("top",$(".headerDiv").outerHeight());

	$(".menu_list img").click(function(){
		$(".myAccntMenu").addClass('hidden');
		$(".ownerInnerwrap").css("margin-left",0);
		$(".menu_list").hide();
		$(".menus_open").show();
	});
	$(".menus_open").click(function(){
		$(".myAccntMenu").removeClass('hidden');
		$(".ownerInnerwrap").css("margin-left",200);
		$(".menus_open").hide();
		$(".menu_list").show();
	});

});
//Auto Suggest Zip Code
function autoSuggestZip(){
	var customer_zip_city 		= $("#customer_city").val();
	var restaurant_zip_city		= $("#restaurant_city").val();
	var customer_zip_city_new 	= $("#customer_city_new").val();
	var deliveryzip_city		= $("#deliverycity").val();
 	var restaurant_zip_city_con	= $("#restaurant_city_con").val();
 	var restaurant_zip_city1	= $("#restaurant_city1").val();
	//From Customer Register
	$('#customer_zip').autocomplete({source:jssitebaseUrl+'/ajaxFile.php?action=searchzip&city='+customer_zip_city, minLength:1});
	//From customer my account
	$('#customer_zip_new').autocomplete({source:jssitebaseUrl+'/ajaxFile.php?action=searchzip&city='+customer_zip_city_new, minLength:1});
	//From check out
	$('#deliveryzip').autocomplete({source:jssitebaseUrl+'/ajaxFile.php?action=searchzip&city='+deliveryzip_city, minLength:1});
	//From restaurant my account
	$('#restaurant_zip_con').autocomplete({source:jssitebaseUrl+'/ajaxFile.php?action=searchzip&city='+restaurant_zip_city_con, minLength:1});
	//From Restaurant Account Tab
	$('#restaurant_zip1').autocomplete({source:jssitebaseUrl+'/ajaxFile.php?action=searchzip&city='+restaurant_zip_city1, minLength:1});
	//From Restaurant Register
	$('#restaurant_zip').autocomplete({source:jssitebaseUrl+'/ajaxFile.php?action=searchzip&city='+restaurant_zip_city, minLength:1});
	
	
}
//-------------------------------------------------------------------------------------------
//Customer Login Validate
function loginValidation(){
	
	
	//Error Language
	var err_lang_arr = error_language();
	
	var customerlogemail 		= $("#customer_logemail_header").val();
	var customerlogpassword 	= $("#customer_logpassword_header").val();
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var pagetype = $('#pagetype1').val();
    
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';	
	
	if(document.getElementById('rememberme').checked == true){
		var rememberme = $("#rememberme").val();
	}else{
		var rememberme = "";
	}
	$("#errormsg5").html('');
	
	if(customerlogemail == '' || customerlogemail == 'email'){
		$("#errormsg5").addClass('errormsg').html(err_lang_arr['cus_login_email_empty']);
		$("#customer_logemail_header").focus();
		return false;		
	}
	if(!(reg.test(customerlogemail))){
	   	$("#errormsg5").addClass('errormsg').html(err_lang_arr['cus_login_email_valid']);
		$("#customer_logemail_header").focus();
		return false;
    }
	if((customerlogpassword) == '' || customerlogpassword == 'password'){
		
		$("#errormsg5").addClass('errormsg').html(err_lang_arr['cus_login_pass_empty']);
		$("#customer_logpassword_header").focus();
		return false;	
	}
	//return false;
	if(customerlogemail != '' && customerlogpassword != ''){
				
		$.post(jssitebaseUrl+useFile,{'customerlogemail':customerlogemail,'customerlogpassword':customerlogpassword,'rememberme':rememberme,'action':'customerlogin'}, function(output){
		//alert(output);
			if(output == 'Deactivated'){
				$("#errormsg5").addClass('errormsg').html(err_lang_arr['cus_login_account_deacivate']).show();
				return false;
			}else if(output == 'Pending'){
				$("#errormsg5").addClass('errormsg').html(err_lang_arr['cus_login_account_pending']).show();
				return false;
			}else if(output == 'Deleted'){
				$("#errormsg5").addClass('errormsg').html(err_lang_arr['cus_login_account_deleted']).show();
				return false;
			}else if(output == 'Invalid_Login'){
				$("#errormsg5").addClass('errormsg').html(err_lang_arr['cus_login_invalid']).show();
				return false;
			}else{
			     if(pagetype != ''){
			     	
               	    document.customerlogin_head.submit();
                }else{
                	
                    window.location = jssitebaseUrl+"/customerMyaccount.php";
                }
				
			} 
		});
	}
	return false;
}
//-------------------------------------------------------------------------------------------
//Forget Password POPUP
function customerForgetPasswordPopup(){
	
		//myPopupWindowOpen('#customerforgetpop','#maska');
		//Form
		$("#errforgetemail").hide();
		$("#forgetemail").focus();
}

function customerForgetPassword(){
	
	var err_lang_arr = error_language();
	var forgetemail = $("#forgetemail").val();
    $("#forgotpasswordsubmit").prop("disabled",true);
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
    
	//alert("hi");
	if(forgetemail == ''){
        $("#forgotpasswordsubmit").prop("disabled",false);
		$("#errforgetemail").addClass('errormsg').html(err_lang_arr['cus_login_forgetemail_empty']).show();
		$("#forgetemail").focus();
		return false;
	}else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(forgetemail))){
	    $("#forgotpasswordsubmit").prop("disabled",false);
	   	$("#errforgetemail").addClass('errormsg').html(err_lang_arr['cus_login_forgetemail_valid']).show();
		$("#forgetemail").focus();
		return false;
    }else{
		$("#errforgetemail").hide();
	} 
	if(forgetemail != ''){		
		$.post(jssitebaseUrl+useFile,{'forgetemail':forgetemail,'action':'customerforgetPassword'}, function(output){
			//alert(output);
            $("#forgotpasswordsubmit").prop("disabled",true);
			if($.trim(output) == 'sendpass_success'){
			     $("#forgotpasswordsubmit").prop("disabled",true);
				$("#errforgetemail").addClass('succmsg').html(err_lang_arr['customer_pwd_has_been_sent']).show();
				setTimeout(function() {  
					$("#customerforgetpop").hide();
					$('#maska').fadeOut();
					$("#forgetemail").val('');
					var filename = $(location).attr('href');
				    $('body').load(filename, function() {});
				}, 2000);
				 	
			}else if($.trim(output) == 'no_email'){
                $("#forgotpasswordsubmit").prop("disabled",false);
				$("#errforgetemail").addClass('errormsg').html(err_lang_arr['customer_email_address_not_reg']).show();
			}else if($.trim(output) == 'pending'){
                $("#forgotpasswordsubmit").prop("disabled",false);
				$("#errforgetemail").addClass('errormsg').html("Your account is waiting for activation!").show();
			}else if($.trim(output) == 'deactive'){
                $("#forgotpasswordsubmit").prop("disabled",false);
				$("#errforgetemail").addClass('errormsg').html("Your account was deactivated! Please contact administrator.").show();
			}else if($.trim(output) == 'deleted'){
                $("#forgotpasswordsubmit").prop("disabled",false);
				$("#errforgetemail").addClass('errormsg').html("Your account was deleted! Please contact administrator.").show();
			}
		});
	}
	return false;
}

//call order process
function callorderprocess(ordid){
    
    $.post(jssitebaseUrl+'/ajaxFile.php',{'ordid':ordid,'action':'callprocess'},function(response){
        //alert(response);
        //return false;
    });
    return false;
}

//-------------------------------------------------------------------------------------
//Open Restaurant Status
function openStatusChange(resid){
    
    $.post(jssitebaseUrl+'/ajaxFile.php',{'resid':resid, 'status':'open', 'action' : 'restaurantOpenStatus'},function(data){
        //alert(data);
        if(data == 'success'){
            //window.location.href=jssitebaseUrl+'/restaurantOwnerMyaccount.php';
            window.location.reload();
        }
        return false;
    });
}

//Close Restaurant Status
function closeStatusChange(resid){
    //alert("s");
    $.post(jssitebaseUrl+'/ajaxFile.php',{'resid':resid, 'status':'close', 'action' : 'restaurantCloseStatus'},function(data){
        //alert(data);
        if(data == 'success'){
            //window.location.href=jssitebaseUrl+'/restaurantOwnerMyaccount.php';
            window.location.reload();
        }
        return false;
    });
}

//TT Restaurant status
function timeStatusChange(resid){
    $.post(jssitebaseUrl+'/ajaxFile.php',{'resid':resid, 'status':'TT', 'action' : 'restaurantCloseStatus'},function(data){
        //alert(data);
        if($.trim(data) == 'success'){
            //window.location.href=jssitebaseUrl+'/restaurantOwnerMyaccount.php';
            window.location.reload();
        }
        return false;
    });
}

//Contact us page refresh
function refreshContact(contact_verify_code,verification){
    
    $(".contact_verify_code").load(jssitebaseUrl+"/ajaxAction.php",{'action':'verification'});
}





 //////////F12 disable code////////////////////////
	/*	document.onkeypress = function (event) {
			event = (event || window.event);
			if (event.keyCode == 123) {
			   //alert('No F-12');
				return false;
			}
		}
		document.onmousedown = function (event) {
			event = (event || window.event);
			if (event.keyCode == 123) {
				//alert('No F-keys');
				return false;
			}
		}
		document.onkeydown = function (event) {
				event = (event || window.event);
				if (event.keyCode == 123) {
					//alert('No F-keys');
					return false;
				}
			}
		/////////////////////end///////////////////////

		//Disable right click script 
		
		var message="Sorry, right-click has been disabled"; 
		/////////////////////////////////// 
		function clickIE() {if (document.all) {(message);return false;}} 
		function clickNS(e) {if 
		(document.layers||(document.getElementById&&!document.all)) { 
		if (e.which==2||e.which==3) {(message);return false;}}} 
		if (document.layers) 
		{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;} 
		else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;} 
		document.oncontextmenu=new Function("return false") 
		// 
		function disableCtrlKeyCombination(e)
		{
		//list all CTRL + key combinations you want to disable
		var forbiddenKeys = new Array('u');
		var key;
		var isCtrl;
		if(window.event)
		{
		key = window.event.keyCode;     //IE
		if(window.event.ctrlKey)
		isCtrl = true;
		else
		isCtrl = false;
		}
		else
		{
		key = e.which;     //firefox
		if(e.ctrlKey)
		isCtrl = true;
		else
		isCtrl = false;
		}
		//if ctrl is pressed check if other key is in forbidenKeys array
		if(isCtrl)
		{
		for(i=0; i<forbiddenKeys.length; i++)
		{
		//case-insensitive comparation
		if(forbiddenKeys[i].toLowerCase() == String.fromCharCode(key).toLowerCase())
		{
		//alert('Key combination CTRL + '+String.fromCharCode(key) +' has been disabled.');
		return false;
		}
		}
		}
		return true;
		}*/
        
function customersubscribenewsletter() {
   
var customeremail 			= $.trim($("#newsletter").val());
$("#newslettersubsubmit").prop("disabled",true);
   	if(customeremail == ''){
	    $("#newslettersubsubmit").prop("disabled",false);
		$("#cusemailerrormsg").addClass('errClass1').html("Please Enter Email");
		$("#newsletter").focus();
		$("#newsletter").parent().parent().addClass("has-error");
		return false;		
	}
	else{
	   $("#newslettersubsubmit").prop("disabled",false);
	  
       $("#newsletter").parent().parent().removeClass("has-error");}
	if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(customeremail))){
	    $("#newslettersubsubmit").prop("disabled",false);
	    
	   	$("#cusemailerrormsg").addClass('errClass1').html("Please Enter Valid Mail").show();
		$("#newsletter").focus();
			$("#newsletter").parent().parent().addClass("has-error");
		return false;
    }
	else{
       $("#newslettersubsubmit").prop("disabled",false);
	 
       $("#newsletter").parent().parent().removeClass("has-error");}
    
    	if(customeremail != ''){
	    $("#newslettersubsubmit").prop("disabled",true);
		$.post(jssitebaseUrl+'/ajaxFile.php',{'customeremail':customeremail,'action':'checkSubscribeEmail'}, function(output){
			
			if(output > '0'){
			    $("#newslettersubsubmit").prop("disabled",false);
				$("#cusemailerrormsg").addClass('errClass1').html("This mail Already Subscribed").show();
				$("#newsletter").parent().parent().addClass("has-error");
                }
                else {
                    $("#newslettersubsubmit").prop("disabled",true);
                   	$.post(jssitebaseUrl+'/ajaxFile.php',{"subscribemail":customeremail,"action":"mailsubscribe"},function(output){
				
					if(output == 'success'){					
						//window.location = jssitebaseUrl+"/customerMyaccount.php";
						$("#customerregistersubmit").prop("disabled",true);
						$("#cusemailerrormsg").removeClass("errClass1");
                        $("#cusemailerrormsg").addClass('succmsg').html("Your Mail Subscribed Successfully ").show();
                    	setTimeout(function() {  
					var filename = $(location).attr('href');
				    $('body').load(filename, function() {});
				}, 2000);
					}
                    
				});
				return false;
                }
            		});
		return false;
	}
    
    
    
}