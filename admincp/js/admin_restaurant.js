
						//Jquery Tab - Add & Edit Restaurant
//------------------------------------------------------------------------------	
	$(document).ready(function(){
		
		//Add & Edit Restaurant
		$(".restaurantTab a").click(function() { //When click open tab
			 $(".restaurantTab a").removeClass("active");
			$(".restaurantTabContent").hide();
			
			$(this).addClass("active"); 
			var activeTab = $(this).attr("id");
				
			$('#'+activeTab+'_content').show();
		   
		});
		
		//Restaurant Details
		$(".restaurantDetailsTab div").click(function() { //When click open tab
			
			$(".restaurantDetailsTab div").removeClass("active");
			$(".restDetTabCon").hide();
			
			$(this).addClass("active"); 
			var activeTab = $(this).attr("id");
			//alert(activeTab);
			$('#'+activeTab+'_content').show();
		});
		$(".active").trigger("click");
	});
//------------------------------------------------------------------------------
					//add restaurant's dispaly options in restaurant photo tab
	$(document).ready(function(){
		
		$("#restaurant_display_photo_yes").click(function(){
			$(".photoDispOpt").show();
		});
		$("#restaurant_display_photo_no").click(function(){
			$(".photoDispOpt").hide();
		});
		
		$("#restaurant_display_video_yes").click(function(){
			$(".videoDispOpt").show();
		});
		$("#restaurant_display_video_no").click(function(){
			$(".videoDispOpt").hide();
		});
		
		$("#restaurant_display_banner_yes").click(function(){
			$(".bannerDispOpt").show();
		});
		$("#restaurant_display_banner_no").click(function(){
			$(".bannerDispOpt").hide();
		});
		
		$("#restaurant_delivery_yes").click(function(){
			$("#Deliveryinfo").show();
		});
		$("#restaurant_delivery_no").click(function(){
			$("#Deliveryinfo").hide();
		});
	});					
	
	$(document).ready(function(){
		 
		if($("#restaurant_display_map").is(":checked") ){
			$("#mapDispOpt").show();
			$(".photoDispOpt").hide();
			$("#videoDispOpt").hide();
		}
		if($("#restaurant_display_ph").is(":checked") ){
			$(".photoDispOpt").show();
			$("#mapDispOpt").hide();
			$("#videoDispOpt").hide();
		}
		if($("#restaurant_display_vid").is(":checked") ){
			$("#videoDispOpt").show();
			$(".photoDispOpt").hide();
			$("#mapDispOpt").hide();
		}
	});
	
//------------------------------------------------------------------------------
//add restaurant validate
function addRestaurantValidate()
{		
	var numregexp                   = new RegExp(/^[-+]?\d{0,10}(\.\d{2})?$/);
	var regUrl 						= /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
	var eid             		    = $.trim($("#eid").val());
	var restaurant_name    		    = $.trim($("#restaurant_name").val());
	var restaurant_phone    		= $.trim($("#restaurant_phone").val());
	var restaurant_fax    		    = $.trim($("#restaurant_fax").val());
	var restaurant_logo    		    = $("#restaurant_logo").val();	
	var restaurant_photos1 		    = $("#restaurant_photos1").val();
	var restaurant_website  	    = $.trim($("#restaurant_website").val());
	var restaurant_streetaddress    = $.trim($("#restaurant_streetaddress").val());
	var restaurant_city			    = $.trim($("#restaurant_city").val());
	var restaurant_state		    = $.trim($("#restaurant_state").val());
	var restaurant_zip			    = $("#restaurant_zip").val();
	var restaurant_contact_name	    = $.trim($("#restaurant_contact_name").val());
	var restaurant_contact_phone    = $.trim($("#restaurant_contact_phone").val());
	var restaurant_contact_email    = $.trim($("#restaurant_contact_email").val());
	var restaurant_description	    = $.trim($("#restaurant_description").val());
	var restaurant_estimated_time   = $.trim($("#restaurant_estimated_time").val());
	var restaurant_password 	    = $.trim($("#restaurant_password").val());
	var nameRegex = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
    var deliverycharge = $.trim($("#restaurant_delivery_charge").val());
    var orderphonenumber = $.trim($("#order_number").val());
	
	var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
	var valid = regexp.test(restaurant_website);
	var regexp1 	= new RegExp("^[0-9]{0,10}([\.][0-9]{1,2})?$");
	
	var rid	= $("#eid").val();
	
	$(".errClass").html('');
	$('span').removeClass('errClass')
	
	/*if(restaurant_name == '' || restaurant_phone == '' || restaurant_streetaddress == '' || restaurant_contact_name == '' || restaurant_contact_phone == '' || restaurant_contact_email == ''){
		$("#contactinfo_content").show();
		$("#restaurantinfo_content").hide();
		$("#deliveryinfo_content").hide();
		$("#restaurantphoto_content").hide();
		$("#restaurantcommission_content").hide();
		
		$("#contactinfo").addClass('active');
		$("#restaurantinfo").removeClass('active');
		$("#deliveryinfo").removeClass('active');
		$("#restaurantphoto").removeClass('active');
		$("#restaurantcommission").removeClass('active');
	}*/
	/*
	if(restaurant_name == ''){
        $("#contactinfo_tab").trigger('click');
		$("#resNameErr").addClass('errClass').html("Please enter the restaurant name");
		$("#restaurant_name").focus();
		return false;		
	}*/
	if((restaurant_phone) == ''){
        $("#contactinfo_tab").trigger('click');
		$("#resPhoneErr").addClass('errClass').html("Please enter restaurant phone");
		$("#restaurant_phone").focus();
		return false;	
	}
	if(restaurant_phone != ''){
		if(isNaN(restaurant_phone)){
            $("#contactinfo_tab").trigger('click');
			$("#resPhoneErr").addClass('errClass').html("Please enter valid restaurant phone");
			$("#restaurant_phone").focus();
			return false;
		}
		if(restaurant_phone.length < 10){
            $("#contactinfo_tab").trigger('click');
			$("#resPhoneErr").addClass('errClass').html("Please enter Valid Restaurant Phone");
			$("#restaurant_phone").focus();
			return false;
		}	
	}
	if((restaurant_website) != ''){

		if(regUrl.test(restaurant_website) == false){
            $("#contactinfo_tab").trigger('click');
			$("#resWebErr").addClass('errClass').html("Please enter Valid Restaurant Website");
			$("#restaurant_website").focus();
			$("#restaurant_website").select();
			return false;
		}
	}
	
	if(restaurant_streetaddress == ''){
        $("#contactinfo_tab").trigger('click');
		$("#resStrErr").addClass('errClass').html("Please enter restaurant street address");
		$("#restaurant_streetaddress").focus();
		return false;		
	}
	else if(restaurant_state == ''){
        $("#contactinfo_tab").trigger('click');
		$("#resStaErr").addClass('errClass').html("Please select restaurant state");
		$("#restaurant_state").focus();
		return false;		
	}
	else if(restaurant_city == ''){
        $("#contactinfo_tab").trigger('click');
		$("#resCitErr").addClass('errClass').html("Please select restaurant city");
		$("#restaurant_city").focus();
		return false;		
	}
	else if(restaurant_zip == ''){
        $("#contactinfo_tab").trigger('click');
		$("#resZipErr").addClass('errClass').html("Please enter restaurant zip");
		$("#restaurant_zip").focus();
		return false;		
	}
	else if(restaurant_contact_name == ''){
        $("#contactinfo_tab").trigger('click');
		$("#resCntNameErr").addClass('errClass').html("Please enter contact name");
		$("#restaurant_contact_name").focus();
		return false;		
	}
	else if(!restaurant_contact_name.match(nameRegex)) {
        $("#contactinfo_tab").trigger('click');
        $("#resCntNameErr").addClass('errClass').html("Please enter valid contact name");
		$("#restaurant_contact_name").focus();
		return false;		
	}
	if(restaurant_contact_phone == ''){
        $("#contactinfo_tab").trigger('click');
		$("#resCntPhoneErr").addClass('errClass').html("Please enter contact phone number");
		$("#restaurant_contact_phone").focus();
		return false;		
	}
	else if(restaurant_contact_phone != ''){
		if(isNaN(restaurant_contact_phone))
		{
            $("#contactinfo_tab").trigger('click');
			$("#resCntPhoneErr").addClass('errClass').html("Please enter Valid Contact Phone Number");
			$("#restaurant_contact_phone").focus();
			$("#restaurant_contact_phone").select();
			return false;
		}	
	}
	if(restaurant_contact_phone != ''){
		if(restaurant_contact_phone.length < 10){
            $("#contactinfo_tab").trigger('click');
			$("#resCntPhoneErr").addClass('errClass').html("Please enter Valid Contact Phone Number");
			$("#restaurant_contact_phone").focus();
			$("#restaurant_contact_phone").select();
			return false;
		}		
	}
	
	if((restaurant_contact_email) == ''){
        $("#contactinfo_tab").trigger('click');
		$("#resEmailErr").addClass('errClass').html("Please enter e-mail");
		$("#restaurant_contact_email").focus();
		return false;	
	}
	
	else if(restaurant_contact_email != '')
	{
		var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
		var valid = emailRegex.test(restaurant_contact_email);
		if (!valid)
		{
            $("#contactinfo_tab").trigger('click');
			$("#resEmailErr").addClass('errClass').html("Please enter valid e-mail");
			$("#restaurant_contact_email").focus();
			$("#restaurant_contact_email").select();
			return false;
		}
		else if(valid)
		{ 
			$.post('adminAjaxFile.php',{"restaurant_name":restaurant_name,"restaurant_contact_email":restaurant_contact_email, "rid":eid, "action":"checkResEmailAlreadyExist"},function(response)
			{
	               //alert(response);return false;
                   //alert("hai");return false;		 
				if($.trim(response) == 'resAlready'){
				    $("#contactinfo_tab").trigger('click');
					$("#resNameErr").addClass('errClass').html(" This Restaurant Name Already Exist");
					return false;
				}else if($.trim(response) == 'emailAlready'){
				    $("#contactinfo_tab").trigger('click');
					$("#resEmailErr").addClass('errClass').html("This Email Id Already Exist");
					return false;
				}else if($.trim(response) == 'resemailAlready'){
				    $("#contactinfo_tab").trigger('click');
					$("#resEmailErr").addClass('errClass').html("This Restaurant Name and Email Id Already Exist");
					return false;
				}
                
				else if(restaurant_password == '')
				{
					if(eid == ''){
                        $("#contactinfo_tab").trigger('click');
						$("#resPswdErr").addClass('errClass').html("Please enter password");
						$("#restaurant_password").focus();
						return false;
					}else{
                        
                        $('#restaurantAdd').attr('disabled', true);
						document.addNewRestaurant.submit();
						return false;
					}			
				} /*else if(restaurant_logo != '')
				{
					var ext = $('#restaurant_logo').val().split('.').pop().toLowerCase();
			
        			if($.inArray(ext, ['gif','jpg','jpeg']) == -1){
        				$("#resLogoErr").addClass('errClass').html("Please select the valid photo format (gif,jpg,jpeg)");
        					$("#restaurant_logo").focus();
        					return false;
			         }else
    				{
    				    $('#restaurantAdd').attr('disabled', true);
    					document.addNewRestaurant.submit();
    					return false;
    				}	
				}*/
   	           else if(orderphonenumber != ''){
            		if(isNaN(orderphonenumber)){
                        $("#orderinfo_tab").trigger('click');
            			$("#resOrdnumErr").addClass('errClass').html("Please enter valid Order Phone Number");
            			$("#order_number").focus();
            			return false;
            		}
            		else if(orderphonenumber.length < 10){
                        $("#orderinfo_tab").trigger('click');
            			$("#resOrdnumErr").addClass('errClass').html("Please enter valid Order Phone Number");
            			$("#order_number").focus();
            			return false;
            		}
                 	else
    				{
    				   
    				    $('#restaurantAdd').attr('disabled', true);
    					document.addNewRestaurant.submit();
    					return false;
    				}	
            	}
				else
				{
				   
				    $('#restaurantAdd').attr('disabled', true);
					document.addNewRestaurant.submit();
					return false;
				}
			});
			return false;
		}
	}
}
//--------------------------------------- Menu  -----------------------------------------------
//Check Category Name already exists
function checkCatNameExist(catname){
	if(catname != ""){
		$.post('adminAjaxFile.php',{"menu_catothers":catname,"action":"checkMenuCategoryOthers"},function(response){
			if($.trim(response) == "exist"){
				$("#catname_errormsg").addClass('errClass').html("This category already exists");
                return false;
			}else{
				$("#catname_errormsg").addClass('errClass').html("");
				return false;
			}
		});
		return false;
	}
}
//---------------------------------------------------------------------------------------------//
//Menu Validation 
function menuValidateNew(){
	
	var restaurant_name  = $.trim($("#restaurant_name").val());
	var menu_name 	     = $.trim($("#menu_name").val());
	var menu_category    = $.trim($("#menu_category").val());
	var menu_cuisine     = $.trim($("#menu_cuisine").val());
	var menu_catothers   = $.trim($("#menu_catothers").val());
	var menu_description = $.trim($("#menu_description").val());
	var resid        	 = $.trim($("#resid").val());
    var menu_photo       = $.trim($("#menu_photo").val());
	var nameRegex 	 	 = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
	var regexp1 		 = new RegExp("^[0-9]{0,10}([\.][0-9]{1,2})?$");
    
    var menu_type = $.trim($("[name=menu_type]:checked").val());
    
    var sizeoption = $.trim($("input[name=sizeoption]:visible:checked").val());
	//Menu unico
	/*
	if(resid == ''){
		if(restaurant_name == ''){
			$("#errormsg").addClass('errormsg').html("Please select restaurant name");
			$("#restaurant_name").focus();
			return false;
		}
	}*/
	if(menu_name == ''){
		$("#errormsg").addClass('errormsg').html("Please enter menu name");
		$("#menu_name").focus();
		return false;		
	}
    
    if(menu_category == ''){
		$("#errormsg").addClass('errormsg').html("Please select menu category");
		$("#menu_category").focus();
		return false;		
	}
    if(menu_photo != ''){	
			var ext = $('#menu_photo').val().split('.').pop().toLowerCase();
			
			if($.inArray(ext, ['gif','jpg','jpeg']) == -1){
				$("#errormsg").addClass('errormsg').html("Please select the valid photo format (gif,jpg,jpeg)");
					$("#menu_photo").focus();
					return false;
			}				
		}
    var menu_addons = $("[name=menu_addons]:checked").val();
	if(menu_category == 'other'){
		if(menu_catothers == ''){
			$("#errormsg").addClass('errormsg').html("Please enter menu category others");
			$("#menu_catothers").focus();
			return false;	
		}else if(menu_catothers != ""){
			$.post('adminAjaxFile.php',{"menu_catothers":menu_catothers,"restaurant_name":restaurant_name,"action":"checkMenuCategoryOthers"},function(response){ 
				if($.trim(response) == "exist"){
					$("#errormsg").addClass('errormsg').html("This category already exists");
					$("#menu_catothers").focus();
					return false;
				}else{
				   if(menu_category != ''){
	  
    				 if(menu_name != "" && menu_category != "" ){
    				     if (restaurant_name == '') {
		        var restaurant_name = resid;
	                    }
    					$.post('adminAjaxFile.php',{"restaurant_name":restaurant_name, "menu_name":menu_name, "menu_category":menu_category, "menu_type":menu_type,"action":"checkMenuName"},function(response){
    						//alert(response);
    						if($.trim(response) == "exist"){
    							$("#errormsg").addClass('errormsg').html("Menu name already exist");
    							$("#menu_name").focus();
    							return false;
    						}else{
    						  if(menu_addons == 'Yes'){
                
                                if(sizeoption == '' || sizeoption == undefined){
                                    $("#errormsg").addClass('errormsg').html("Please select menu size option");
                                    $("#sizeoption_default1").focus();
                                    return false;
                                }else if(sizeoption == 'default'){
                        			if(document.getElementById("small").checked == true){ var small  = $.trim($("#smallval").val()); }
                        			else if(document.getElementById("medium").checked == true){ var medium  = $.trim($("#mediumval").val()); }
                        			else if(document.getElementById("large").checked == true){ var large  = $.trim($("#largeval").val());	}
                        			else{ $("#errormsg").addClass('errormsg').html("Please Select any one pizza size"); 
                                          return false;
                        			}
                                    //Small
                        			if(document.getElementById("small").checked == true){
                        				var smallval   = $.trim($("#smallval").val());
                        				if(smallval == ""){ $("#errormsg").addClass('errormsg').html("Please enter small value");  $("#smallval").focus();  return false; }else if(isNaN(smallval) || smallval.charAt(0) == '0'){
                                    $("#errormsg").addClass('errormsg').html("Please enter valid small menu price"); 
                                    $("#smallval").focus(); 
                                    return false; 
                                }
                        			}
                                    //Medium
                        			if(document.getElementById("medium").checked == true){
                        				var mediumval   = $.trim($("#mediumval").val());
                        				if(mediumval == ""){ $("#errormsg").addClass('errormsg').html("Please enter medium value"); $("#mediumval").focus(); return false; }else if(isNaN(mediumval) ||mediumval.charAt(0) == '0'){
                                    $("#errormsg").addClass('errormsg').html("Please enter valid medium menu price"); 
                                    $("#mediumval").focus(); 
                                    return false; 
                                }
                        			}
                                    //Large
                        			if(document.getElementById("large").checked == true){
                        				var largeval   = $.trim($("#largeval").val());
                        				if(largeval == ""){ $("#errormsg").addClass('errormsg').html("Please enter large value"); $("#largeval").focus(); return false; }else if(isNaN(largeval) || largeval.charAt(0) == '0'){
                                    $("#errormsg").addClass('errormsg').html("Please enter valid large menu price"); 
                                    $("#largeval").focus(); 
                                    return false; 
                                }
                        			}
                        		}else if(sizeoption == 'fixed'){
                        			var menu_price       = $.trim($("#menu_price").val());
                                    
                        			if(menu_price == ''){
                        				$("#errormsg").addClass('errormsg').html("Please enter menu price");
                        					$("#menu_price").focus(); return false;		
                        			}else if(isNaN(menu_price) || menu_price.charAt(0) == '0'){
                        				$("#errormsg").addClass('errormsg').html("Please enter valid menu price");
                        					$("#menu_price").focus(); return false;
                        			}else if(!regexp1.test(menu_price)){
                        				$("#errormsg").addClass('errormsg').html("Please enter valid menu price");
                        					$("#menu_price").focus(); return false;
                        			}
                        		}
                            }else{
                                //var sizeoption = $("input[name=sizeoption]:visible:checked").val();
                                 
                        		if(sizeoption == 'default'){
                        			if(document.getElementById("small").checked == true){ var small  = $.trim($("#smallval").val()); }
                        			else if(document.getElementById("medium").checked == true){ var medium  = $.trim($("#mediumval").val()); }
                        			else if(document.getElementById("large").checked == true){ var large  = $.trim($("#largeval").val());	}
                        			else{ 
                  			           $("#errormsg").addClass('errormsg').html("Please select any one menu size");; 
                                        return false;
                        			}
                                    //Small
                        			if(document.getElementById("small").checked == true){
                        				var smallval   = $.trim($("#smallval").val());
                        				if(smallval == ""){ $("#errormsg").addClass('errormsg').html("Please enter small value"); $("#smallval").focus();  return false; }else if(isNaN(smallval) || smallval.charAt(0) == '0'){
                                    $("#errormsg").addClass('errormsg').html("Please enter valid small menu price"); 
                                    $("#smallval").focus(); 
                                    return false; 
                                }
                        			}
                                    //Medium
                        			if(document.getElementById("medium").checked == true){
                        				var mediumval   = $.trim($("#mediumval").val());
                        				if(mediumval == ""){ $("#errormsg").addClass('errormsg').html("Please enter medium value"); $("#mediumval").focus(); return false; }else if(isNaN(mediumval) ||mediumval.charAt(0) == '0'){
                                    $("#errormsg").addClass('errormsg').html("Please enter valid medium menu price"); 
                                    $("#mediumval").focus(); 
                                    return false; 
                                }
                        			}
                                    //Large
                        			if(document.getElementById("large").checked == true){
                        				var largeval   = $.trim($("#largeval").val());
                        				if(largeval == ""){ $("#errormsg").addClass('errormsg').html("Please enter large value"); $("#largeval").focus();  return false; }else if(isNaN(largeval) || largeval.charAt(0) == '0'){
                                    $("#errormsg").addClass('errormsg').html("Please enter valid large menu price"); 
                                    $("#largeval").focus(); 
                                    return false; 
                                }
                        			}
                        		}else if(sizeoption == 'fixed'){
                        			var menu_price       = $.trim($("#menu_price").val());
                        			if(menu_price == ''){
                        				$("#errormsg").addClass('errormsg').html("Please enter menu price");
                        				$("#menu_price").focus(); return false;		
                        			}else if(isNaN(menu_price) || menu_price.charAt(0) == '0'){
                        				$("#errormsg").addClass('errormsg').html("Please enter valid menu price");
                        				$("#menu_price").focus(); return false;
                        			}else if(!regexp1.test(menu_price)){
                        				$("#errormsg").addClass('errormsg').html("Please enter valid menu price");
                        				$("#menu_price").focus(); return false;
                        			}
                        		}
                    		}
    						  if(sizeoption == 'other'){
                                    if($(document).find(".slicevalidate:visible").length > 0){
                                        var i = $(".slicevalidate:visible").length;
                                        $(".slicevalidate:visible").each(function(){
                                           if($(this).val() == ''){
                                            $("#errormsg").addClass('errormsg').html("Please enter slice name with price");
                                            //alert("Please enter slice name with price");
                                            $(this).focus();
                                            return false;
                                           }
                                           if(i%2 != 0){
                                            if((isNaN($(this).val()) || $(this).val() == '0.00' || $(this).val() == '0')){
                                                $("#errormsg").addClass('errormsg').html("Please enter valid slice price");
                                                $(this).focus();
                                                $(this).select();
                                                return false;
                                            }
                                           }
                                           i--;
                                           if(i == 0){
                                            $("#errormsg").addClass('successmsg').html("Menu added successfully");
                                            $('#MenuAdd').attr('disabled', true);
                                            document.addNewMenu.submit();
                                            return false;
                                           }
                                        });
                                    }else{
                                        $("#errormsg").addClass('errormsg').html("Please add atleast one slice");
                                        return false;
                                    }
                                }else{
                                    $('#MenuAdd').attr('disabled', true);
                                    $("#errormsg").addClass('successmsg').html("Menu added successfully");
                                    document.addNewMenu.submit();
                                }
    						  			
    						}
    					});
    					return false;
    				 }
    			}
				}
			});
		}	
	}else{
	  if(menu_category != ''){
	  
			 if(menu_name != "" && menu_category != "" ){
			      if (restaurant_name == '') {
		        var restaurant_name = resid;
	                    }
				$.post('adminAjaxFile.php',{"restaurant_name":restaurant_name, "menu_name":menu_name, "menu_category":menu_category, "menu_type":menu_type,"action":"checkMenuName"},function(response){
					//alert(response);
					if($.trim(response) == "exist"){
						$("#errormsg").addClass('errormsg').html("Menu name already exist");
						$("#menu_name").focus();
						return false;
					}else{
					  if(menu_addons == 'Yes'){
                        var sizeoption = $.trim($("input[name=sizeoption]:visible:checked").val());
                        if(sizeoption == '' || sizeoption == undefined){
                            $("#errormsg").addClass('errormsg').html("Please select menu size option");
                            $("#sizeoption_default1").focus();
                            return false;
                        }else if(sizeoption == 'default'){
                			if(document.getElementById("small").checked == true){ var small  = $.trim($("#smallval").val()); }
                			else if(document.getElementById("medium").checked == true){ var medium  = $.trim($("#mediumval").val()); }
                			else if(document.getElementById("large").checked == true){ var large  = $.trim($("#largeval").val());	}
                			else{ $("#errormsg").addClass('errormsg').html("Please Select any one pizza size");  
                                  return false;
                			}
                            //Small
                			if(document.getElementById("small").checked == true){
                				var smallval   = $.trim($("#smallval").val());
                				if(smallval == ""){ $("#errormsg").addClass('errormsg').html("Please enter small value");  $("#smallval").focus();  return false; }else if(isNaN(smallval) || smallval.charAt(0) == '0'){
                                    $("#errormsg").addClass('errormsg').html("Please enter valid small menu price"); 
                                    $("#smallval").focus(); 
                                    return false; 
                                }
                			}
                            //Medium
                			if(document.getElementById("medium").checked == true){
                				var mediumval   = $.trim($("#mediumval").val());
                				if(mediumval == ""){ $("#errormsg").addClass('errormsg').html("Please enter medium value"); $("#mediumval").focus(); return false; }else if(isNaN(mediumval) ||mediumval.charAt(0) == '0'){
                                    $("#errormsg").addClass('errormsg').html("Please enter valid medium menu price"); 
                                    $("#mediumval").focus(); 
                                    return false; 
                                }
                			}
                            //Large
                			if(document.getElementById("large").checked == true){
                				var largeval   = $.trim($("#largeval").val());
                				if(largeval == ""){ $("#errormsg").addClass('errormsg').html("Please enter large value"); $("#largeval").focus(); return false; }else if(isNaN(largeval) || largeval.charAt(0) == '0'){
                                    $("#errormsg").addClass('errormsg').html("Please enter valid large menu price"); 
                                    $("#largeval").focus(); 
                                    return false; 
                                }
                			}
                		}else if(sizeoption == 'fixed'){
                			var menu_price       = $.trim($("#menu_price").val());
                            
                			if(menu_price == ''){
                				$("#errormsg").addClass('errormsg').html("Please enter menu price");
                				$("#menu_price").focus(); return false;		
                			}else if(isNaN(menu_price) || menu_price.charAt(0) == '0'){
                				$("#errormsg").addClass('errormsg').html("Please enter valid menu price");
                				$("#menu_price").focus(); return false;
                			}else if(!regexp1.test(menu_price)){
                				$("#errormsg").addClass('errormsg').html("Please enter valid menu price");
                				$("#menu_price").focus(); return false;
                			}
                		}
                    }else{
                        var sizeoption = $("input[name=sizeoption]:visible:checked").val();
                         
                		if(sizeoption == 'default'){
                			if(document.getElementById("small").checked == true){ var small  = $.trim($("#smallval").val()); }
                			else if(document.getElementById("medium").checked == true){ var medium  = $.trim($("#mediumval").val()); }
                			else if(document.getElementById("large").checked == true){ var large  = $.trim($("#largeval").val());	}
                			else{  $("#errormsg").addClass('errormsg').html("Please select any one menu size");; 
                                  return false;
                			}
                            //Small
                			if(document.getElementById("small").checked == true){
                				var smallval   = $.trim($("#smallval").val());
                				if(smallval == ""){ 
                				    $("#errormsg").addClass('errormsg').html("Please enter small value"); 
                                    $("#smallval").focus();  
                                    return false; 
                                }else if(isNaN(smallval) || smallval.charAt(0) == '0'){
                                    $("#errormsg").addClass('errormsg').html("Please enter valid small menu price"); 
                                    $("#smallval").focus(); 
                                    return false; 
                                }
                			}
                            //Medium
                			if(document.getElementById("medium").checked == true){
                				var mediumval   = $.trim($("#mediumval").val());
                				if(mediumval == ""){ 
                				    $("#errormsg").addClass('errormsg').html("Please enter medium value"); 
                                    $("#mediumval").focus(); 
                                    return false; 
                                }else if(isNaN(mediumval) ||mediumval.charAt(0) == '0'){
                                    $("#errormsg").addClass('errormsg').html("Please enter valid medium menu price"); 
                                    $("#mediumval").focus(); 
                                    return false; 
                                }
                			}
                            //Large
                			if(document.getElementById("large").checked == true){
                				var largeval   = $.trim($("#largeval").val());
                				if(largeval == ""){ 
                				    $("#errormsg").addClass('errormsg').html("Please enter large value"); 
                                    $("#largeval").focus();  
                                    return false; 
                                }else if(isNaN(largeval) || largeval.charAt(0) == '0'){
                                    $("#errormsg").addClass('errormsg').html("Please enter valid large menu price"); 
                                    $("#largeval").focus(); 
                                    return false; 
                                }
                			}
                		}else if(sizeoption == 'fixed'){
                			var menu_price       = $.trim($("#menu_price").val());
                			if(menu_price == ''){
                				$("#errormsg").addClass('errormsg').html("Please enter menu price");
                				$("#menu_price").focus(); return false;		
                			}else if(isNaN(menu_price) || menu_price == '0.00' || menu_price == 0){
                				$("#errormsg").addClass('errormsg').html("Please enter valid  menu price");
                				$("#menu_price").focus(); return false;
                			}else if(!regexp1.test(menu_price)){
                				$("#errormsg").addClass('errormsg').html("Please enter valid menu price");
                				$("#menu_price").focus(); return false;
                			}
                		}
            		}
					  if(sizeoption == 'other'){
                            if($(document).find(".slicevalidate:visible").length > 0){
                                var i = $(".slicevalidate:visible").length;
                                $(".slicevalidate:visible").each(function(){
                                   if($(this).val() == ''){
                                    $("#errormsg").addClass('errormsg').html("Please enter slice name with price");
                                    //alert("Please enter slice name with price");
                                    $(this).focus();
                                    return false;
                                   }
                                   if(i%2 != 0){
                                    if((isNaN($(this).val()) || $(this).val() == '0.00' || $(this).val() == '0')){
                                        $("#errormsg").addClass('errormsg').html("Please enter valid slice price");
                                        $(this).focus();
                                        $(this).select();
                                        return false;
                                    }
                                   }
                                   i--;
                                   if(i == 0){
                                    $('#MenuAdd').attr('disabled', true);
                                    $("#errormsg").addClass('successmsg').html("Menu added successfully");
                                    document.addNewMenu.submit();
                                    return false;
                                   }
                                });
                            }else{
                                $("#errormsg").addClass('errormsg').html("Please add atleast one slice");
                                return false;
                            }
                        }else{
                            
                            $("#errormsg").addClass('successmsg').html("Menu added successfully");
                            document.addNewMenu.submit();
                            $('#MenuAdd').attr('disabled', true);
                        }
					  			
					}
				});
				return false;
			 }
		}
	}
	return false;
}
	//-----------------------------------------------------------------------------
	//Menu Validation 
	function menuValidateEdit(){
	   	 var restaurant_name  = $.trim($("#restaurant_name").val());
		var menu_name 	     = $.trim($("#menu_name").val());
		var menu_category    = $.trim($("#menu_category").val());
		//var menu_type  	     = $.trim($("#menu_type").val());
		var menu_cuisine     = $.trim($("#menu_cuisine").val());
		var menu_catothers   = $.trim($("#menu_catothers").val());
		var menu_description = $.trim($("#menu_description").val());
		var resid        	 = $.trim($("#resid").val());
		var nameRegex 	 	 = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
		var regexp 		    = new RegExp("^[0-9]{0,8}([\.][0-9]{1,2})?$");
		var regexp1 		 = new RegExp("^[0-9]{0,10}([\.][0-9]{1,2})?$");
        var menu_photo       = $.trim($("#menu_photo").val());
 	    var eid        	     = $.trim($("#eid").val());
        var menu_type = $.trim($("[name=menu_type]:checked").val());
        
        var sizeoption = $.trim($("input[name=sizeoption]:visible:checked").val());
		if(resid == ''){
			if(restaurant_name == ''){
				$("#errormsg").addClass('errormsg').html("Please select restaurant name");
				$("#restaurant_name").focus();
				return false;
			}
		}
		if(menu_name == ''){
			$("#errormsg").addClass('errormsg').html("Please enter menu name");
			$("#menu_name").focus();
			return false;		
		}
        
        if(menu_category == ''){
			$("#errormsg").addClass('errormsg').html("Please select menu category");
			$("#menu_category").focus();
			return false;		
		}
        if(menu_photo != ''){	
			var ext = $('#menu_photo').val().split('.').pop().toLowerCase();
			
			if($.inArray(ext, ['gif','jpg','jpeg']) == -1){
				$("#errormsg").addClass('errormsg').html("Please select the valid photo format (gif,jpg,jpeg)");
					$("#menu_photo").focus();
					return false;
			}				
		}
        var menu_addons = $("[name=menu_addons]:checked").val();
		if(menu_category == 'other'){
			if(menu_catothers == ''){
				$("#errormsg").addClass('errormsg').html("Please enter menu category others");
				$("#menu_catothers").focus();
				return false;	
			}else if(menu_catothers != ""){
				$.post('adminAjaxFile.php',{"menu_catothers":menu_catothers,"action":"checkMenuCategoryOthers"},function(response){ 
					if($.trim(response) == "exist"){
						$("#errormsg").addClass('errormsg').html("This category already exists");
						$("#menu_catothers").focus();
						return false;
					}else{
					   if(menu_category != ''){
		  
        				 if(menu_name != "" && menu_category != "" ){
        				    if (restaurant_name == '') {
			        var restaurant_name = resid;
		                    }
        					$.post('adminAjaxFile.php',{"eid":eid,"restaurant_name":restaurant_name, "menu_name":menu_name, "menu_category":menu_category, "menu_type":menu_type,"action":"checkEditMenuName"},function(response){
        						//alert(response);
        						if($.trim(response) == "exist"){
        							$("#errormsg").addClass('errormsg').html("Menu name already exist");
        							$("#menu_name").focus();
        							return false;
        						}else{
        						  if(menu_addons == 'Yes'){
                    
                                    if(sizeoption == '' || sizeoption == undefined){
                                        $("#errormsg").addClass('errormsg').html("Please select menu size option");
                                        $("#sizeoption_default1").focus();
                                        return false;
                                    }else if(sizeoption == 'default'){
                            			if(document.getElementById("small").checked == true){ var small  = $.trim($("#smallval").val()); }
                            			else if(document.getElementById("medium").checked == true){ var medium  = $.trim($("#mediumval").val()); }
                            			else if(document.getElementById("large").checked == true){ var large  = $.trim($("#largeval").val());	}
                            			else{ $("#errormsg").addClass('errormsg').html("Please Select any one pizza size"); 
                                              return false;
                            			}
                                        //Small
                            			if(document.getElementById("small").checked == true){
                            				var smallval   = $.trim($("#smallval").val());
                            				if(smallval == ""){ $("#errormsg").addClass('errormsg').html("Please enter small value");  $("#smallval").focus();  return false; }else if(isNaN(smallval) || smallval.charAt(0) == '0' || !regexp.test(smallval)){
                                        $("#errormsg").addClass('errormsg').html("Please enter valid small menu price"); 
                                        $("#smallval").focus(); 
                                        return false; 
                                    }
                            			}
                                        //Medium
                            			if(document.getElementById("medium").checked == true){
                            				var mediumval   = $.trim($("#mediumval").val());
                            				if(mediumval == ""){ $("#errormsg").addClass('errormsg').html("Please enter medium value"); $("#mediumval").focus(); return false; }else if(isNaN(mediumval) ||mediumval.charAt(0) == '0' || !regexp.test(mediumval)){
                                        $("#errormsg").addClass('errormsg').html("Please enter valid medium menu price"); 
                                        $("#mediumval").focus(); 
                                        return false; 
                                    }
                            			}
                                        //Large
                            			if(document.getElementById("large").checked == true){
                            				var largeval   = $.trim($("#largeval").val());
                            				if(largeval == ""){ $("#errormsg").addClass('errormsg').html("Please enter large value"); $("#largeval").focus(); return false; }else if(isNaN(largeval) || largeval.charAt(0) == '0' || !regexp.test(largeval)){
                                        $("#errormsg").addClass('errormsg').html("Please enter valid large menu price"); 
                                        $("#largeval").focus(); 
                                        return false; 
                                    }
                            			}
                            		}else if(sizeoption == 'fixed'){
                            			var menu_price       = $.trim($("#menu_price").val());
                                        
                            			if(menu_price == ''){
                            				$("#errormsg").addClass('errormsg').html("Please enter menu price");
                            					$("#menu_price").focus(); return false;		
                            			}else if(isNaN(menu_price) || menu_price == 0){
                            				$("#errormsg").addClass('errormsg').html("Please enter valid menu price");
                            					$("#menu_price").focus(); return false;
                            			}else if(!regexp1.test(menu_price)){
                            				$("#errormsg").addClass('errormsg').html("Please enter valid menu price");
                            					$("#menu_price").focus(); return false;
                            			}
                            		}
                                }else{
                                    //var sizeoption = $("input[name=sizeoption]:visible:checked").val();
                                     
                            		if(sizeoption == 'default'){
                            			if(document.getElementById("small").checked == true){ var small  = $.trim($("#smallval").val()); }
                            			else if(document.getElementById("medium").checked == true){ var medium  = $.trim($("#mediumval").val()); }
                            			else if(document.getElementById("large").checked == true){ var large  = $.trim($("#largeval").val());	}
                            			else{  $("#errormsg").addClass('errormsg').html("Please select any one menu size");; 
                                              return false;
                            			}
                                        //Small
                            			if(document.getElementById("small").checked == true){
                            				var smallval   = $.trim($("#smallval").val());
                            				if(smallval == ""){ $("#errormsg").addClass('errormsg').html("Please enter small value"); $("#smallval").focus();  return false; }else if(isNaN(smallval) || smallval.charAt(0) == '0' || !regexp.test(smallval)){
                                        $("#errormsg").addClass('errormsg').html("Please enter valid small menu price"); 
                                        $("#smallval").focus(); 
                                        return false; 
                                    }
                            			}
                                        //Medium
                            			if(document.getElementById("medium").checked == true){
                            				var mediumval   = $.trim($("#mediumval").val());
                            				if(mediumval == ""){ $("#errormsg").addClass('errormsg').html("Please enter medium value"); $("#mediumval").focus(); return false; }else if(isNaN(mediumval) ||mediumval.charAt(0) == '0' || !regexp.test(mediumval)){
                                        $("#errormsg").addClass('errormsg').html("Please enter valid medium menu price"); 
                                        $("#mediumval").focus(); 
                                        return false; 
                                    }
                            			}
                                        //Large
                            			if(document.getElementById("large").checked == true){
                            				var largeval   = $.trim($("#largeval").val());
                            				if(largeval == ""){ $("#errormsg").addClass('errormsg').html("Please enter large value"); $("#largeval").focus();  return false; }else if(isNaN(largeval) || largeval.charAt(0) == '0' || !regexp.test(largeval)){
                                        $("#errormsg").addClass('errormsg').html("Please enter valid large menu price"); 
                                        $("#largeval").focus(); 
                                        return false; 
                                    }
                            			}
                        		}else if(sizeoption == 'fixed'){
                            			var menu_price       = $.trim($("#menu_price").val());
                            			if(menu_price == ''){
                            				$("#errormsg").addClass('errormsg').html("Please enter menu price");
                            				$("#menu_price").focus(); return false;		
                            			}else if(isNaN(menu_price) || menu_price.charAt(0) == '0'){
                            				$("#errormsg").addClass('errormsg').html("Please enter valid  menu price");
                            				$("#menu_price").focus(); return false;
                            			}else if(!regexp1.test(menu_price)){
                            				$("#errormsg").addClass('errormsg').html("Please enter valid  menu price");
                            				$("#menu_price").focus(); return false;
                            			}
                            		}
                        		}
        						  if(sizeoption == 'other'){
                                        if($(document).find(".slicevalidate:visible").length > 0){
                                            var i = $(".slicevalidate:visible").length;
                                            $(".slicevalidate:visible").each(function(){
                                               if($(this).val() == ''){
                                                $("#errormsg").addClass('errormsg').html("Please enter slice name with price");
                                                //alert("Please enter slice name with price");
                                                $(this).focus();
                                                return false;
                                               }
                                               if(i%2 != 0){
                                                if(isNaN($(this).val()) || $(this).val() == '0.00' || $(this).val() == 0){
                                                    $("#errormsg").addClass('errormsg').html("Please enter valid slice price");
                                                    $(this).focus();
                                                    $(this).select();
                                                    return false;
                                                }
                                               }
                                               i--;
                                               if(i == 0){
                                                $("#errormsg").addClass('successmsg').html("Menu Edited successfully");
                                                document.addNewMenu.submit();
                                                return false;
                                               }
                                            });
                                        }else{
                                            $("#errormsg").addClass('errormsg').html("Please add atleast one slice");
                                            //alert("Please add atleast one slice");
                                            return false;
                                        }
                                    }else{
                                        
                                        $("#errormsg").addClass('successmsg').html("Menu Edited successfully");
                                        document.addNewMenu.submit();
                                    }
        						  			
        						}
        					});
        					return false;
        				 }
        			}
					}
				});
			}	
		}else{
		  if(menu_category != ''){
		  
				 if(menu_name != "" && menu_category != "" ){
				    if (restaurant_name == '') {
			        var restaurant_name = resid;
		                    }
					$.post('adminAjaxFile.php',{"eid":eid,"restaurant_name":restaurant_name, "menu_name":menu_name, "menu_category":menu_category, "menu_type":menu_type,"action":"checkEditMenuName"},function(response){
						//alert(response);
						if($.trim(response) == "exist"){
							$("#errormsg").addClass('errormsg').html("Menu name already exist");
							$("#menu_name").focus();
							return false;
						}else{
						  if(menu_addons == 'Yes'){
                            var sizeoption = $.trim($("input[name=sizeoption]:visible:checked").val());
                            if(sizeoption == '' || sizeoption == undefined){
                                $("#errormsg").addClass('errormsg').html("Please select menu size option");
                                $("#sizeoption_default1").focus();
                                return false;
                            }else if(sizeoption == 'default'){
                    			if(document.getElementById("small").checked == true){ var small  = $.trim($("#smallval").val()); }
                    			else if(document.getElementById("medium").checked == true){ var medium  = $.trim($("#mediumval").val()); }
                    			else if(document.getElementById("large").checked == true){ var large  = $.trim($("#largeval").val());	}
                    			else{ $("#errormsg").addClass('errormsg').html("Please Select any one pizza size"); 
                                      return false;
                    			}
                                //Small
                    			if(document.getElementById("small").checked == true){
                    				var smallval   = $.trim($("#smallval").val());
                    				if(smallval == ""){ $("#errormsg").addClass('errormsg').html("Please enter small value");  $("#smallval").focus();  return false; }else if(isNaN(smallval) || smallval.charAt(0) == '0' || !regexp.test(smallval)){
                                        $("#errormsg").addClass('errormsg').html("Please enter valid small menu price"); 
                                        $("#smallval").focus(); 
                                        return false; 
                                    }
                    			}
                                //Medium
                    			if(document.getElementById("medium").checked == true){
                    				var mediumval   = $.trim($("#mediumval").val());
                    				if(mediumval == ""){ $("#errormsg").addClass('errormsg').html("Please enter medium value"); $("#mediumval").focus(); return false; }else if(isNaN(mediumval) || mediumval.charAt(0) == '0' || !regexp.test(mediumval)){
                                        $("#errormsg").addClass('errormsg').html("Please enter valid medium menu price"); 
                                        $("#mediumval").focus(); 
                                        return false; 
                                    }
                    			}
                                //Large
                    			if(document.getElementById("large").checked == true){
                    				var largeval   = $.trim($("#largeval").val());
                    				if(largeval == ""){ $("#errormsg").addClass('errormsg').html("Please enter large value"); $("#largeval").focus(); return false; }else if(isNaN(largeval) || largeval.charAt(0) == '0' || !regexp.test(largeval)){
                                        $("#errormsg").addClass('errormsg').html("Please enter valid large menu price"); 
                                        $("#largeval").focus(); 
                                        return false; 
                                    }
                    			}
                    		}else if(sizeoption == 'fixed'){
                    			var menu_price       = $.trim($("#menu_price").val());
                                
                    			if(menu_price == ''){
                    				$("#errormsg").addClass('errormsg').html("Please enter menu price");
                    				$("#menu_price").focus(); return false;		
                    			}else if(isNaN(menu_price) || menu_price.charAt(0) == '0'){
                    				$("#errormsg").addClass('errormsg').html("Please enter valid  menu price");
                    				$("#menu_price").focus(); return false;
                    			}else if(!regexp1.test(menu_price)){
                    				$("#errormsg").addClass('errormsg').html("Please enter valid menu price");
                    				$("#menu_price").focus(); return false;
                    			}
                    		}
                        }else{
                            var sizeoption = $("input[name=sizeoption]:visible:checked").val();
                             
                    		if(sizeoption == 'default'){
                    			if(document.getElementById("small").checked == true){ var small  = $.trim($("#smallval").val()); }
                    			else if(document.getElementById("medium").checked == true){ var medium  = $.trim($("#mediumval").val()); }
                    			else if(document.getElementById("large").checked == true){ var large  = $.trim($("#largeval").val());	}
                    			else{  $("#errormsg").addClass('errormsg').html("Please select any one menu size");; 
                                      return false;
                    			}
                                //Small
                    			if(document.getElementById("small").checked == true){
                    				var smallval   = $.trim($("#smallval").val());
                    				if(smallval == ""){ 
                    				    $("#errormsg").addClass('errormsg').html("Please enter small value"); 
                                        $("#smallval").focus();  
                                        return false; 
                                    }else if(isNaN(smallval) || smallval.charAt(0) == '0' || !regexp.test(smallval)){
                                        $("#errormsg").addClass('errormsg').html("Please enter valid small menu price"); 
                                        $("#smallval").focus(); 
                                        return false; 
                                    }
                    			}
                                //Medium
                    			if(document.getElementById("medium").checked == true){
                    				var mediumval   = $.trim($("#mediumval").val());
                    				if(mediumval == ""){ 
                    				    $("#errormsg").addClass('errormsg').html("Please enter medium value"); 
                                        $("#mediumval").focus(); 
                                        return false; 
                                    }else if(isNaN(mediumval) || mediumval.charAt(0) == '0' || !regexp.test(mediumval)){
                                        $("#errormsg").addClass('errormsg').html("Please enter valid medium menu price"); 
                                        $("#mediumval").focus(); 
                                        return false; 
                                    }
                    			}
                                //Large
                    			if(document.getElementById("large").checked == true){
                    				var largeval   = $.trim($("#largeval").val());
                    				if(largeval == ""){ 
                    				    $("#errormsg").addClass('errormsg').html("Please enter large value"); 
                                        $("#largeval").focus();  
                                        return false; 
                                    }else if(isNaN(largeval) || largeval.charAt(0) == '0' || !regexp.test(largeval)){
                                        $("#errormsg").addClass('errormsg').html("Please enter valid large menu price"); 
                                        $("#largeval").focus(); 
                                        return false; 
                                    }
                    			}
                    		}else if(sizeoption == 'fixed'){
                    			var menu_price       = $.trim($("#menu_price").val());
                    			if(menu_price == ''){
                    				$("#errormsg").addClass('errormsg').html("Please enter menu price");
                    				$("#menu_price").focus(); return false;		
                    			}else if(isNaN(menu_price) || menu_price.charAt(0) == '0'){
                    				$("#errormsg").addClass('errormsg').html("Please enter valid  menu price");
                    				$("#menu_price").focus(); return false;
                    			}else if(!regexp1.test(menu_price)){
                    				$("#errormsg").addClass('errormsg').html("Please enter valid menu price");
                    				$("#menu_price").focus(); return false;
                    			}
                    		}
                		}
						  if(sizeoption == 'other'){
                                if($(document).find(".slicevalidate:visible").length > 0){
                                    var i = $(".slicevalidate:visible").length;
                                    $(".slicevalidate:visible").each(function(){
                                       if($(this).val() == ''){
                                        $("#errormsg").addClass('errormsg').html("Please enter slice name with price");
                                        //alert("Please enter slice name with price");
                                        $(this).focus();
                                        return false;
                                       }
                                       if(i%2 != 0){
                                        if(isNaN($(this).val()) || $(this).val() == '0.00' || $(this).val() == 0){
                                            $("#errormsg").addClass('errormsg').html("Please enter valid slice price");
                                            $(this).focus();
                                            $(this).select();
                                            return false;
                                        }
                                       }
                                       i--;
                                       if(i == 0){
                                        $("#errormsg").addClass('successmsg').html("Menu Edited successfully");
                                        document.addNewMenu.submit();
                                        return false;
                                       }
                                    });
                                }else{
                                    $("#errormsg").addClass('errormsg').html("Please add atleast one slice");
                                    //alert("Please add atleast one slice");
                                    return false;
                                }
                            }else{
                                $("#errormsg").addClass('successmsg').html("Menu Edited successfully");
                                document.addNewMenu.submit();
                            }
						  			
						}
					});
					return false;
				 }
			}
		}
			return false;
	  }
	
	//-------------------------------------------
	function otherSpecify(option){
		
		if(option=="category")
		{
			if(document.getElementById("categoryOther").selected){
				document.getElementById("catoters").style.display = "block";
			}else {
				document.getElementById("catoters").style.display = "none";
				$("#menu_catothers").val('');
			}
			return false;
		}
	}
	//------------------------------------------
	//Show option 
	function showPrice(){
		$("#showPriceOption").show();
	}
	function showAddtionalPrice(){
		$("#showAdditionalPrice").show();
	}
	function showAddtionalFreePrice(){
		$("#showAdditionalPrice").hide();
	}
//--------------------------------------- Restaurant Offer -----------------------------------------------
	//addNewRestaurantOffer Validation
	function addNewRestaurantOffer()
	{	
		$("#errormsg").removeClass('successmsg');
		var numregexp 			= new RegExp(/^[-+]?\d{0,10}(\.\d{2})?$/);
		var restaurant_name   	= $.trim($("#restaurant_name").val());
		var offer_percentage   	= $.trim($("#offer_percentage").val());
		var offer_price  		= $.trim($("#offer_price").val());
		var offer_valid_from    = $.trim($("#offer_valid_from").val());
		var offer_valid_to      = $.trim($("#offer_valid_to").val());
		var resid     = $.trim($("#resid").val());
		var valid 				= numregexp.test(offer_percentage);
		var validPri			= numregexp.test(offer_price);
        
		fieldDateFirst = offer_valid_from.split("-");
		fieldDateSecound = offer_valid_to.split("-");
		var Date1 = new Date();
		var Date2 = new Date();
		
		Date1.setFullYear(fieldDateFirst[2],fieldDateFirst[1],fieldDateFirst[0]);
		Date2.setFullYear(fieldDateSecound[2],fieldDateSecound[1],fieldDateSecound[0]);
		
		/*alert(Date1);
		alert(Date2);*/
		
		if(resid == ''){
			if(restaurant_name == ''){
				$("#errormsg").addClass('errormsg').html("Please select restaurant name");
				$("#restaurant_name").focus();
				return false;
			}
		}
		
		if(offer_percentage == '')
		{
			$("#errormsg").addClass('errormsg').html("Please enter offer percentage");
			$("#offer_percentage").focus();
			return false;
		} else if(isNaN(offer_percentage) || offer_percentage <= 0) {
		  
			$("#errormsg").addClass('errormsg').html("Please enter valid offer percentage");
			$("#offer_percentage").focus();
			$("#offer_percentage").select();
			return false;
		} else if(offer_percentage > 100) {
		  
			$("#errormsg").addClass('errormsg').html("Please enter offer not more than 100%");
			$("#offer_percentage").focus();
			$("#offer_percentage").select();
			return false;
		} if(offer_price == '') {
		  
			$("#errormsg").addClass('errormsg').html("Please enter offer price");
			$("#offer_price").focus();
			return false;
		} else if(isNaN(offer_price) || offer_price<= 0 ||validPri == false)
		{
			$("#errormsg").addClass('errormsg').html("Please enter valid offer price");
			$("#offer_price").focus();
			$("#offer_price").select();
			return false;
		}
		
		if(offer_valid_from == '')
		{
			$("#errormsg").addClass('errormsg').html("Please select offer from Date");
			$("#offer_valid_from").focus();
			return false;
		}
		if(offer_valid_to == '')
		{
			$("#errormsg").addClass('errormsg').html("Please select offer to Date");
			$("#offer_valid_to").focus();
			return false;
		}
		if (Date1 > Date2)
		{
			$("#errormsg").addClass('errormsg').html("Please select valid offer to Date");
			$("#offer_valid_to").focus();
			$("#offer_valid_to").select();
			return false;
		}
		if(offer_valid_to != ''){
			$.post('adminAjaxFile.php',{"restaurant_name":restaurant_name,"offer_valid_from":offer_valid_from,"offer_valid_to":offer_valid_to,"action":"checkOfferAlready"},function(resp){
				//return false;          
				if(resp == 'Already'){
					$("#errormsg").addClass('errormsg').html("Already one offer is their in particular period of time.please delete or deactivate that offer then you can add another One offer");
					return false;
				}else{
				    $('#OfferAdd').attr('disabled', true);
   	                $("#errormsg").addClass('successmsg').html("Offer Added Successfully");
                    document.addNewResOffr.submit();
				}
			});
			return false;
		}   
	}
	
	//---------------------------------------------------------------------------------
	//editRestaurantOffer Validation
	function editRestaurantOffer()
	{	
	  
		$("#errormsg").removeClass('successmsg');
		var numregexp 			= new RegExp(/^[-+]?\d{0,10}(\.\d{2})?$/);
		var restaurant_name   	= $.trim($("#restaurant_name").val());
		var offer_percentage   	= $.trim($("#offer_percentage").val());
		var offer_price  		= $.trim($("#offer_price").val());
		var offer_valid_from    = $.trim($("#offer_valid_from").val());
		var offer_valid_to      = $.trim($("#offer_valid_to").val());
		var offer_id		    = $.trim($("#offer_id").val());
			
		var valid 				= numregexp.test(offer_percentage);
		var validPri			= numregexp.test(offer_price);
		
		var resid     = $.trim($("#resid").val());
		
		fieldDateFirst = offer_valid_from.split("-");
		fieldDateSecound = offer_valid_to.split("-");
		var Date1 = new Date();
		var Date2 = new Date();
		
		var offer_valid_to1 = fieldDateSecound[1]+'-'+fieldDateSecound[0]+'-'+fieldDateSecound[2];
		
		Date1.setFullYear(fieldDateFirst[2],fieldDateFirst[1]-1,fieldDateFirst[0]);
		Date2.setFullYear(fieldDateSecound[2],fieldDateSecound[1]-1,fieldDateSecound[0]);
		
		if(resid == ''){
			if(restaurant_name == ''){
				$("#errormsg").addClass('errormsg').html("Please select restaurant name");
				$("#restaurant_name").focus();
				return false;
			}
		}
		
		if(offer_percentage == '')
		{
			$("#errormsg").addClass('errormsg').html("Please enter offer percentage");
			$("#offer_percentage").focus();
			return false;
		}else if(isNaN(offer_percentage) || offer_percentage.charAt(0) == '0') {
		  
			$("#errormsg").addClass('errormsg').html("Please enter valid offer percentage");
			$("#offer_percentage").focus();
			$("#offer_percentage").select();
			return false;
		} else if(offer_percentage > 100) {
		  
			$("#errormsg").addClass('errormsg').html("Please enter offer not more than 100%");
			$("#offer_percentage").focus();
			$("#offer_percentage").select();
			return false;
		}
		
		if(offer_price == '')
		{
			$("#errormsg").addClass('errormsg').html("Please enter offer price");
			$("#offer_price").focus();
			return false;
		}else if(isNaN(offer_price) ||offer_price.charAt(0) == '0' ||validPri == false)
		{
			$("#errormsg").addClass('errormsg').html("Please enter valid offer price");
			$("#offer_price").focus();
			$("#offer_price").select();
			return false;
		}	
		
		if(offer_valid_from == '')
		{
			$("#errormsg").addClass('errormsg').html("Please select offer from date");
			$("#offer_valid_from").focus();
			return false;
		}
		
		if(offer_valid_to == '')
		{
			$("#errormsg").addClass('errormsg').html("Please select offer to date");
			$("#offer_valid_to").focus();
			return false;
		}
		if (Date1 > Date2)
		{
			$("#errormsg").addClass('errormsg').html("Please select valid offer to date");
			$("#offer_valid_to").focus();
			$("#offer_valid_to").select();
			return false;
		}
		if(offer_valid_to != ''){   
			
			$.post('adminAjaxFile.php',{"restaurant_name":restaurant_name,"offer_valid_from":offer_valid_from,"offer_id":offer_id,"offer_valid_to":offer_valid_to,"action":"checkEditOfferAlready"},function(resp){
							
				if(resp == 'Already'){
					$("#errormsg").addClass('errormsg').html("Already one offer is their in particular period of time.please delete or deactivate that offer then you can add another One offer");
					return false;
				}else{
				    $("#errormsg").addClass('successmsg').html("Offer Edited Successfully");
					document.addNewResOffr.submit();
				}
			});
			return false;
		}    
	}
	
	//----------------------------- Addons Validate ---------------------------------------
	//Addons Validation
	function addonsValidateNew(){
		
		var restaurant_name = $.trim($("#restaurant_name").val());
		var category_name   = $.trim($("#category_name").val());
		var addons_name 	= $.trim($("#addons_name").val());
		var resid = $("#resid").val();
        
		if(resid == ''){
			if(restaurant_name == ''){
				$("#errormsg").addClass('errormsg').html("Please select restaurant name");
				$("#restaurant_name").focus();
				return false;
			}
		}
		if(category_name == ''){
			$("#errormsg").addClass('errormsg').html("Please select category name");
			$("#category_name").focus();
			return false;
		}
		if(addons_name == ''){
			$("#errormsg").addClass('errormsg').html("Please enter addons name");
			$("#addons_name").focus();
			return false;		
		}
		/*if(addons_name != ''){
			if(document.getElementById("mainaddon_paid").checked == true){
				var mainaddonvalue 	= $.trim($("#mainaddonvalue").val());
				if(mainaddonvalue == ''){
					$("#errormsg").addClass('errormsg').html("Please enter addons value");
					$("#mainaddonvalue").focus();
					return false;
				}
				if(isNaN(mainaddonvalue)){
					$("#errormsg").addClass('errormsg').html("Please enter valid addons value");
					$("#mainaddonvalue").focus();
					return false;
				}
			}
		}*/
		if(addons_name != '' ){
			
			$.post('adminAjaxFile.php',{"restaurant_name":restaurant_name,"category_name":category_name,"addons_name":addons_name,"resid":resid,"action":"checkNewAddonsName"},function(response){
		      //alert(response);
				if($.trim(response) == "exist"){
					$("#errormsg").addClass('errormsg').html("Addons name already exist");
					$("#addons_name").focus();
					return false;
				}
				else{
				    
				    $("#errormsg").addClass('successmsg').html("Addons Added Successfully");
					document.addNewAddons.submit();
					$('#AddonsAdd').attr('disabled', true); 
				}
			});
			return false;
		}
		return false;
	}
	
	//Edit Addons
	function addonsValidateEdit(){
	
		var restaurant_name = $.trim($("#restaurant_name").val());
		var category_name   = $.trim($("#category_name").val());
		var addons_name 	= $.trim($("#addons_name").val());
		var resid 	= $("#resid").val();
		var eid     = $("#eid").val();
		var mainaddoncnt 	    = $.trim($("#mainaddoncnt").val());
		var regexp1 		 = new RegExp("^[0-9]{0,10}([\.][0-9]{1,2})?$");
		
		if(resid == ''){
			if(restaurant_name == ''){
				$("#errormsg").addClass('errormsg').html("Please select restaurant name");
				$("#restaurant_name").focus();
				return false;
			}
		}
		if(category_name == ''){
			$("#errormsg").addClass('errormsg').html("Please select category name");
			$("#category_name").focus();
			return false;
		}
		if(addons_name == ''){
			$("#errormsg").addClass('errormsg').html("Please enter addons name");
			$("#addons_name").focus();
			return false;		
		}
		/*if(addons_name != ''){
			if(document.getElementById("mainaddon_paid").checked == true){
				var mainaddonvalue 	= $.trim($("#mainaddonvalue").val());
				if(mainaddonvalue == ''){
					$("#errormsg").addClass('errormsg').html("Please enter addons value");
					$("#mainaddonvalue").focus();
					return false;
				}
				if(isNaN(mainaddonvalue)){
					$("#errormsg").addClass('errormsg').html("Please enter valid addons value");
					$("#mainaddonvalue").focus();
					return false;
				}
			}
		}*/
		else if(mainaddoncnt != '' && !regexp1.test(mainaddoncnt)){
			$("#errormsg").addClass('errormsg').html('please enter valid count');
			$("#mainaddoncnt").focus();
			return false;		
		}else if(addons_name != ''){
			
			$.post('adminAjaxFile.php',{"restaurant_name":restaurant_name,"category_name":category_name,"addons_name":addons_name,"eid":eid,"resid":resid,"action":"checkEditAddonsName"},function(response){
			//alert(response);
				if($.trim(response) == "exist"){
					$("#errormsg").addClass('errormsg').html("Addons name already exist");
					$("#addons_name").focus();
					return false;
				}
				else{
				    
				    $("#errormsg").addClass('successmsg').html("Addons Edited Successfully");
					document.addNewAddons.submit();
				}
			});
			return false;
		}
	}
//AJAX START----------------------------------------------------------------------------------------
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

//Get Show City
function getCityListRest(statecode,frompage){
	
	req.onreadystatechange = function(){
		
		if (req.readyState == 4){
			if (req.status == 200){
				//alert(req.responseText);
				document.getElementById('showResCityList').innerHTML=req.responseText;
				$(".selectpicker").selectpicker();
			}else {
				alert("There was a problem while using XMLHTTP:\n" + req.statusText);
			}
		}
	}
	req.open("GET", "adminAjaxAction.php?statecode="+statecode+"&action=showResCityList&frompage="+frompage, true);
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
	req.open("GET", "adminAjaxAction.php?cid="+cid+"&action=showResZipList&frompage="+frompage, true);
	req.send(null);
}

function Suggestzip()
{
    var state=$('#restaurant_state').val();
    var city=$('#restaurant_city').val();
    //alert(state);
    
    
    var restaurant_zip = $("#restaurant_zip");
    //alert(restaurant_zip);
    //alert(city);
    
    $('#retaurant_zip').autocomplete({source:'adminAjaxAction.php?action=autosuggestzip&city='+city,minLength:1});
    //$('#site_timezone').autocomplete({source:'adminAjaxFile.php?action=searchsitezone&timezone='+timezone, minLength:1});
}         


//--------------------------------------------------------------------------------------------------------------------//
	//Get Show Addons
	function getShowAddons(catid){
		
		var resid = $("#resid").val();
		var eid	  = $("#eid").val();
		if(resid == ''){
			var restaurant_name = $("#restaurant_name").val();
		}else{
			var restaurant_name = resid;
		}
		//alert(restaurant_name);
		/*var cat_pizzaddoncheck		=	$("#cat_pizzasubaddon_changecat_val_"+catid).val();
		alert(cat_pizzaddoncheck);*/
		
		if(restaurant_name == ''){
			alert("Please select restaurant");
			$("#restaurant_name").focus();
			$("#menu_category").val('');
			return false;
		}else{
			if(eid != ''){
			   //$("#menusize_option").hide();
			}
			//$("#menusize_option").hide();
			$("#showcataddonsList").load("adminAjaxAction.php?catid="+catid+"&resid="+restaurant_name+"&eid="+eid+"&action=showCatAddonsList", function(response){
			  $('input[name=menu_addons]:checked').trigger('click');
			  $('input[name=sizeoption]:checked').trigger('click');
			  $('#specialPizzaSize').children('tbody').remove();
			  $('#existSlice').html('');
			  return false;
				//$("#menusize_option").hide();
			});	
		}	
	}

	/**************************Opening & closing time start ********************************/
	//Change Select All Open Time
	function selectAllOpeningTime(){
		
		var opentimehrs    = $("#restaurant_delivery_mon_open_hr").val();
		var opentimemins   = $("#restaurant_delivery_mon_open_min").val();
		var opentimesess   = $("#restaurant_delivery_mon_open_sess").val();
		
		if( opentimehrs == "" || opentimemins == "" ){
			$("#resSelectAllOpenErr").addClass("errormsg").html("Please select monday opening time").show();
			$("#selectopen").attr('checked',false);
			return false;
		}else{
			$("#resSelectAllOpenErr").hide();
			
			//Tues
			$('#restaurant_delivery_tue_open_hr.selectpicker').selectpicker('val', opentimehrs);
			$('#restaurant_delivery_tue_open_min.selectpicker').selectpicker('val', opentimemins);
			$('#restaurant_delivery_tue_open_sess.selectpicker').selectpicker('val', opentimesess);
			

			//wed
			$('#restaurant_delivery_wed_open_hr.selectpicker').selectpicker('val', opentimehrs);
			$('#restaurant_delivery_wed_open_min.selectpicker').selectpicker('val', opentimemins);
			$('#restaurant_delivery_wed_open_sess.selectpicker').selectpicker('val', opentimesess);
			
			//thu
			$('#restaurant_delivery_thu_open_hr.selectpicker').selectpicker('val', opentimehrs);
			$('#restaurant_delivery_thu_open_min.selectpicker').selectpicker('val', opentimemins);
			$('#restaurant_delivery_thu_open_sess.selectpicker').selectpicker('val', opentimesess);
			
			//fri
			$('#restaurant_delivery_fri_open_hr.selectpicker').selectpicker('val', opentimehrs);
			$('#restaurant_delivery_fri_open_min.selectpicker').selectpicker('val', opentimemins);
			$('#restaurant_delivery_fri_open_sess.selectpicker').selectpicker('val', opentimesess);
			
			//sat
			$('#restaurant_delivery_sat_open_hr.selectpicker').selectpicker('val', opentimehrs);
			$('#restaurant_delivery_sat_open_min.selectpicker').selectpicker('val', opentimemins);
			$('#restaurant_delivery_sat_open_sess.selectpicker').selectpicker('val', opentimesess);
			
			//sun
			$('#restaurant_delivery_sun_open_hr.selectpicker').selectpicker('val', opentimehrs);
			$('#restaurant_delivery_sun_open_min.selectpicker').selectpicker('val', opentimemins);
			$('#restaurant_delivery_sun_open_sess.selectpicker').selectpicker('val', opentimesess);
			
		}
	}
	//Change Select All Close Time
	function selectAllCloseingTime(){
		
		var closetimehrs    = $("#restaurant_delivery_mon_close_hr").val();
		var closetimemins   = $("#restaurant_delivery_mon_close_min").val();
		var closetimesess   = $("#restaurant_delivery_mon_close_sess").val();
		
		if( closetimehrs == "" || closetimemins == "" ){
			$("#resSelectAllCloseErr").addclass("errormsg").html("Please select monday closeing time").show();
			$("#selectclose").attr('checked',false);
			return false;
		}else{
			$("#resSelectAllCloseErr").hide();
			
			//Tues
			$('#restaurant_delivery_tue_close_hr.selectpicker').selectpicker('val', closetimehrs);
			$('#restaurant_delivery_tue_close_min.selectpicker').selectpicker('val', closetimemins);
			$('#restaurant_delivery_tue_close_sess.selectpicker').selectpicker('val', closetimesess);
			
			//wed
			$('#restaurant_delivery_wed_close_hr.selectpicker').selectpicker('val', closetimehrs);
			$('#restaurant_delivery_wed_close_min.selectpicker').selectpicker('val', closetimemins);
			$('#restaurant_delivery_wed_close_sess.selectpicker').selectpicker('val', closetimesess);
			
			//thu
			$('#restaurant_delivery_thu_close_hr.selectpicker').selectpicker('val', closetimehrs);
			$('#restaurant_delivery_thu_close_min.selectpicker').selectpicker('val', closetimemins);
			$('#restaurant_delivery_thu_close_sess.selectpicker').selectpicker('val', closetimesess);
			
			//fri
			$('#restaurant_delivery_fri_close_hr.selectpicker').selectpicker('val', closetimehrs);
			$('#restaurant_delivery_fri_close_min.selectpicker').selectpicker('val', closetimemins);
			$('#restaurant_delivery_fri_close_sess.selectpicker').selectpicker('val', closetimesess);
			
			//sat
			$('#restaurant_delivery_sat_close_hr.selectpicker').selectpicker('val', closetimehrs);
			$('#restaurant_delivery_sat_close_min.selectpicker').selectpicker('val', closetimemins);
			$('#restaurant_delivery_sat_close_sess.selectpicker').selectpicker('val', closetimesess);
			
			//sun
			$('#restaurant_delivery_sun_close_hr.selectpicker').selectpicker('val', closetimehrs);
			$('#restaurant_delivery_sun_close_min.selectpicker').selectpicker('val', closetimemins);
			$('#restaurant_delivery_sun_close_sess.selectpicker').selectpicker('val', closetimesess);
			
		}
	}
	
	//Change Select All Second Open Time
	function selectAllSecondOpeningTime(){
		
		var opentimehrs    = $("#restaurant_delivery_mon_open_hr_second").val();
		var opentimemins   = $("#restaurant_delivery_mon_open_min_second").val();
		var opentimesess   = $("#restaurant_delivery_mon_open_sess_second").val();
		
		/*if( opentimehrs == "" || opentimemins == "" ){
			$("#resSelectAllOpenErr").addclass("errormsg").html("Please select monday second opening time").show();
			$("#selectsecondopen").attr('checked',false);
			return false;
		}else{*/
			$("#resSelectAllSecondOpenErr").hide();
			
			//Tues
			$('#restaurant_delivery_tue_open_hr_second.selectpicker').selectpicker('val', opentimehrs);
			$('#restaurant_delivery_tue_open_min_second.selectpicker').selectpicker('val', opentimemins);
			$('#restaurant_delivery_tue_open_sess_second.selectpicker').selectpicker('val', opentimesess);
			
			//wed
			$('#restaurant_delivery_wed_open_hr_second.selectpicker').selectpicker('val', opentimehrs);
			$('#restaurant_delivery_wed_open_min_second.selectpicker').selectpicker('val', opentimemins);
			$('#restaurant_delivery_wed_open_sess_second.selectpicker').selectpicker('val', opentimesess);
			
			//thu
			$('#restaurant_delivery_thu_open_hr_second.selectpicker').selectpicker('val', opentimehrs);
			$('#restaurant_delivery_thu_open_min_second.selectpicker').selectpicker('val', opentimemins);
			$('#restaurant_delivery_thu_open_sess_second.selectpicker').selectpicker('val', opentimesess);
			
			//fri
			$('#restaurant_delivery_fri_open_hr_second.selectpicker').selectpicker('val', opentimehrs);
			$('#restaurant_delivery_fri_open_min_second.selectpicker').selectpicker('val', opentimemins);
			$('#restaurant_delivery_fri_open_sess_second.selectpicker').selectpicker('val', opentimesess);
			
			//sat
			$('#restaurant_delivery_sat_open_hr_second.selectpicker').selectpicker('val', opentimehrs);
			$('#restaurant_delivery_sat_open_min_second.selectpicker').selectpicker('val', opentimemins);
			$('#restaurant_delivery_sat_open_sess_second.selectpicker').selectpicker('val', opentimesess);
			
			//sun
			$('#restaurant_delivery_sun_open_hr_second.selectpicker').selectpicker('val', opentimehrs);
			$('#restaurant_delivery_sun_open_min_second.selectpicker').selectpicker('val', opentimemins);
			$('#restaurant_delivery_sun_open_sess_second.selectpicker').selectpicker('val', opentimesess);
			
		//}
	}
	
	//Change Select All Close Time
	function selectAllSecondCloseingTime(){
		
		var closetimehrs    = $("#restaurant_delivery_mon_close_hr_second").val();
		var closetimemins   = $("#restaurant_delivery_mon_close_min_second").val();
		var closetimesess   = $("#restaurant_delivery_mon_close_sess_second").val();
		
		/*if( closetimehrs == "" || closetimemins == "" ){
			$("#resSelectAllSecondCloseErr").addclass("errormsg").html("Please select monday Second closing time").show();
			$("#selectsecondclose").attr('checked',false);
			return false;
		}else{*/
			$("#resSelectAllSecondCloseErr").hide();
			
			//Tues
			$('#restaurant_delivery_tue_close_hr_second.selectpicker').selectpicker('val', closetimehrs);
			$('#restaurant_delivery_tue_close_min_second.selectpicker').selectpicker('val', closetimemins);
			$('#restaurant_delivery_tue_close_sess_second.selectpicker').selectpicker('val', closetimesess);
			
			//wed
			$('#restaurant_delivery_wed_close_hr_second.selectpicker').selectpicker('val', closetimehrs);
			$('#restaurant_delivery_wed_close_min_second.selectpicker').selectpicker('val', closetimemins);
			$('#restaurant_delivery_wed_close_sess_second.selectpicker').selectpicker('val', closetimesess);
			
			//thu
			$('#restaurant_delivery_thu_close_hr_second.selectpicker').selectpicker('val', closetimehrs);
			$('#restaurant_delivery_thu_close_min_second.selectpicker').selectpicker('val', closetimemins);
			$('#restaurant_delivery_thu_close_sess_second.selectpicker').selectpicker('val', closetimesess);

			//fri
			$('#restaurant_delivery_fri_close_hr_second.selectpicker').selectpicker('val', closetimehrs);
			$('#restaurant_delivery_fri_close_min_second.selectpicker').selectpicker('val', closetimemins);
			$('#restaurant_delivery_fri_close_sess_second.selectpicker').selectpicker('val', closetimesess);

			//sat
			$('#restaurant_delivery_sat_close_hr_second.selectpicker').selectpicker('val', closetimehrs);
			$('#restaurant_delivery_sat_close_min_second.selectpicker').selectpicker('val', closetimemins);
			$('#restaurant_delivery_sat_close_sess_second.selectpicker').selectpicker('val', closetimesess);
			
			//sun
			$('#restaurant_delivery_sun_close_hr_second.selectpicker').selectpicker('val', closetimehrs);
			$('#restaurant_delivery_sun_close_min_second.selectpicker').selectpicker('val', closetimemins);
			$('#restaurant_delivery_sun_close_sess_second.selectpicker').selectpicker('val', closetimesess);
		//}
	}
	function changemonvalopen(){
		$("#selectopen").attr('checked',false);
	}
	function changemonvalclose(){
		$("#selectclose").attr('checked',false);
	}
	/**************************Opening & closing time End ********************************/
//changeRestaurant
function changeRestaurant(){
	$("#menu_category").val('');
	$("#showcataddonsList").hide();
	$("#addonsval_yes").attr('checked',false);
	$("#addonsval_no").attr('checked',true);
}
//---------------------------------------------------------------------------------------//
//Addons In Menu Mgmt
function showAddons(){
	var catid = $("#menu_category").val();
	//alert(catid);
	if(catid == ''){
		$("#addonsval_yes").attr('checked',false);
		$("#addonsval_no").attr('checked',true);
		$("#errormsg").addClass('errClass').html("Please enter menu category");
		$("#menu_category").focus();
		return false;		
	}else{		
		$('input#sizeoption:checked').trigger('click');
		document.getElementById("showcataddonsList").style.display = "block";
	}
}
//Addons In Menu Mgmt
function showeditaddon(cat_edit,eid,resid){
	var catid = $("#menu_category").val();
	
	if(catid == ''){
		$("#addonsval_yes").attr('checked',false);
		$("#addonsval_no").attr('checked',true);
		$("#errormsg").addClass('errClass').html("Please enter menu category");
		$("#menu_category").focus();
		return false;		
	}else{
		document.getElementById("showcataddonsList").style.display = "block";
	}
}

//Addons In Menu Mgmt
function showeditaddon_yes(){
	var catid = $("#menu_category").val();
	
	if(catid == ''){
		$("#addonsval_yes").attr('checked',false);
		$("#addonsval_no").attr('checked',true);
		$("#errormsg").addClass('errClass').html("Please enter menu category");
		$("#menu_category").focus();
		return false;		
	}else{		
		document.getElementById("showcataddonsList").style.display = "block";
	}
}

function showAddons1(){
	$('input#sizeoption:checked').trigger('click');
	document.getElementById("showcataddonsList").style.display = "none";
}

function addonsfreeoption(aid,optionval){
	
	var option1 = optionval;
	if( option1 == undefined ){
		var option = $("#selectoptions").val();
	}else{
		var option = option1;
	}
	var menupriceoption = $("input[name=sizeoption]:visible:checked").val();
	if(menupriceoption == 'fixed'){
		var option  = 'fixed';
	}else if(menupriceoption == 'default'){
		var option  = 'size';
	}else if(menupriceoption == 'other'){
		var option  = 'slice';
	}
	
	$("#showprice_"+aid+"_"+option).hide();
}


function addonspaidoption(aid,optionval){
	
	$("#addonspricepaid_"+aid).show();  
	
	var option1 = optionval;
	if( option1 == undefined ){
		var option = $("#selectoptions").val();
	}else{
		var option = option1;
	}
	
	var menupriceoption = $("input[name=sizeoption]:visible:checked").val();
	if(menupriceoption == 'fixed'){
		var option  = 'fixed';
	}else if(menupriceoption == 'default'){
		var option  = 'size';
	}else if(menupriceoption == 'other'){
		var option  = 'slice';
	}
	//alert("#showprice_"+aid+"_"+option);
	var eid = $("#eid").val();
    
	if( eid == '' ){
	   
		if(menupriceoption == ''){
			alert("Please select menu price options");
			$(".free").attr('checked',true);
			$(".paid").attr('checked',false);
			return false;
		}else{
			$("#showprice_"+aid+"_"+option).show();
		}
	}else{
	   //alert("hai");
		$("#showprice_"+aid+"_"+option).show();
	}
}

function moreaddonsfreeoption(aid){
	$("#showprice1_"+aid).hide();
}
function moreaddonspaidoption(aid){
	$("#showprice1_"+aid).show();
}

//Restaurant Menu Addons more option
var special_row=0;
function addMoreMenuAddons(totrow) {
	//alert("totrow");
	if(totrow!=undefined && special_row == 0){
		special_row = totrow;
	}
	html  = '<tr id="special_row' + special_row + '">';
	
	html += '<td class="left" height="30" width="22%"><input type="text" name="moreaddons['+special_row+'][menuaddonsname]" id="menuaddonsname['+special_row+']" class="mar4"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="moreaddons['+special_row+'][menuaddons_priceoption]" value="Free" checked="checked" onclick="moreaddonsfreeoption('+special_row+');"/>&nbsp;Free</td><td height="30" width="22%"><input type="radio" name="moreaddons['+special_row+'][menuaddons_priceoption]" value="Paid" onclick="moreaddonspaidoption('+special_row+');"/>&nbsp;Paid &nbsp;<span id="showprice1_'+special_row+'" style="display:none;"> Price : <input type="text" name="moreaddons['+special_row+'][menuaddons_price]" id="addonsprice" value="" /></span></td>';
	
	html += '<td class="left1"  height="30" width="20%" align="left"><a onclick="$(\'#special_row' + special_row + '\').remove();" style="color:#f34571;cursor:pointer;margin-left:0px;"><span>Remove</span></a></td>';
	html += '</tr>';
	
	$('#special tfoot').before(html);
	special_row++;
	
}

//Delete Restaurant Photo's
function deletephotos(restaurantid,fieldnumber){
 
	if(fieldnumber != ''){
		if(confirm('Are you sure want to delete?')){
			$.post("adminAjaxFile.php", {'fieldnumber':fieldnumber,'restaurantid':restaurantid, 'action':'resdeletePhotos'},function(response){
				if($.trim(response) == "success"){		
					
					$("#res_photo"+fieldnumber).hide();
					return false;
				}else{
					alert("error");return false;
				}
			});return false;
		}
	}else{
		alert("Error occured");
	}
}


//Delete Restaurant Logo
function deletelogo(restaurantid){
 
	if(restaurantid != ''){
		
			if(confirm('Are you sure want to delete?')){
				$.post("adminAjaxFile.php", {'restaurantid':restaurantid, 'action':'resdeleteLogo'},function(response){
				//alert(response);	
					if($.trim(response) == "success"){		
						
						$("#res_logo1").hide();
						return false;
					}else{
						alert("error");return false;
					}
				});return false;
			}
	}else{
		alert("Error occured");
	}
}
//------------------------------------------------------------------------
function report_validate(){
	
	FormName = document.reportmanage;
	
	var startdate = FormName.report_from.value;
	var enddate = FormName.report_to.value;
	
	fieldDateFirst = startdate.split("-");
	fieldDateSecound = enddate.split("-");
	var Date1 = new Date();
	var Date2 = new Date();
	Date1.setFullYear(fieldDateFirst[2],fieldDateFirst[1]-1,fieldDateFirst[0]);
	Date2.setFullYear(fieldDateSecound[2],fieldDateSecound[1]-1,fieldDateSecound[0]);
	
	if(startdate == ""){
		alert("Please enter From Date");
		FormName.report_from.focus();
		return false;
	}else if(enddate == ""){
		alert("Please enter To Date");
		FormName.report_to.focus();
		return false;
	}else if(Date1 > Date2){
		alert("Please Enter valid To Date");
		FormName.report_to.focus();
		return false;
	}else{
		FormName.action	= "restaurantReportManage.php";
	}
	
}

//-----------------------------------------------------------------------------------------
//Restaurant Pizza Addons more option
var special_row_pizza=0;
function addMorePizzaAddons(totrow) {
	//alert("totrow");
	if(totrow!=undefined && special_row_pizza == 0){
		special_row_pizza = totrow;
	}
	html  = '<tr id="special_row_pizza' + special_row_pizza + '">';
	
	html += '<td class="left" height="30" width="22%"><input type="text" name="morepizzaaddons['+special_row_pizza+'][pizzaaddonsname]" id="pizzaaddonsname['+special_row_pizza+']" class="mar4"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="morepizzaaddons['+special_row_pizza+'][pizzaaddons_priceoption]" value="Free" checked="checked" onclick="pizzamoreaddonsfreeoption('+special_row_pizza+');"/>&nbsp;Free</td><td height="30" width="22%"><input type="radio" name="morepizzaaddons['+special_row_pizza+'][pizzaaddons_priceoption]" value="Paid" onclick="pizzamoreaddonspaidoption('+special_row_pizza+');"/>&nbsp;Paid &nbsp;<span id="showpizzaprice1_'+special_row_pizza+'" style="display:none;"> Price : <input type="text" name="morepizzaaddons['+special_row_pizza+'][pizzaaddons_price]" id="pizzaaddonsprice" value="" /></span></td>';
	
	html += '<td class="left1"  height="30" width="20%" align="left"><a onclick="$(\'#special_row_pizza' + special_row_pizza + '\').remove();" style="color:#f34571;cursor:pointer;margin-left:0px;"><span>Remove</span></a></td>';
	html += '</tr>';
	
	$('#specialpizza tfoot').before(html);
	special_row_pizza++;
}

function pizzaaddonsfreeoption(aid){
	$("#showpizzaprice_"+aid).hide();
}
function pizzaaddonspaidoption(aid){
	$("#showpizzaprice_"+aid).show();
}
function pizzamoreaddonsfreeoption(aid){
	$("#showpizzaprice1_"+aid).hide();
}
function pizzamoreaddonspaidoption(aid){
	$("#showpizzaprice1_"+aid).show();
}

function showSmallPrice(){
	
	if(document.getElementById("small").checked == true){
		$("#smallpriceshow").show();
	}else{
		$("#smallval").val('');
		$("#smallpriceshow").hide();
	}	
}
function showMediumPrice(){
	
	if(document.getElementById("medium").checked == true){
		$("#mediumpriceshow").show();
	}else{
		$("#mediumval").val('');
		$("#mediumpriceshow").hide();
	}	
}
function showLargePrice(){
	
	if(document.getElementById("large").checked == true){
		$("#largepriceshow").show();
	}else{
		$("#largeval").val('');
		$("#largepriceshow").hide();
	}	
}


function showSmallPrice1(){
	//alert("showSmallPrice");
	if(document.getElementById("small1").checked == true){		
		$("#smallpriceshow1").css("display", "block");
	}else{		
		$("#smallval1").val('');
		$("#smallpriceshow1").hide();
	}	
}
function showMediumPrice1(){
	//alert("showMediumPrice");
	if(document.getElementById("medium1").checked == true){		
		$("#mediumpriceshow1").css("display", "block");
	}else{		
		$("#mediumval1").val('');
		$("#mediumpriceshow1").hide();
	}	
}
function showLargePrice1(){
	//alert("showLargePrice");
	if(document.getElementById("large1").checked == true){		
		$("#largepriceshow1").css("display", "block");
	}else{		
		$("#largeval1").val('');
		$("#largepriceshow1").hide();
	}	
}

//------------------------------------------------------------------------------------
//Restaurant Pizza Addons more option
var special_row_crust=0;
function addMorePizzaCrust(totrow) {
	//alert("totrow");
	if(totrow!=undefined && special_row_crust == 0){
		special_row_crust = totrow;
	}
	html  = '<tbody id="special_row_crust' + special_row_crust + '">';
	html += '<tr>'; 
	html += '<td class="left" height="30" width="22%"><input type="text" name="morecrustaddons['+special_row_crust+'][crustname]" id="pizzacrustname['+special_row_crust+']" class="mar4"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="morecrustaddons['+special_row_crust+'][pizzacrust_priceoption]" value="Free" checked="checked" onclick="pizzamorecrustfreeoption('+special_row_crust+');"/>&nbsp;Free</td><td height="30" width="22%"><input type="radio" name="morecrustaddons['+special_row_crust+'][pizzacrust_priceoption]" value="Paid" onclick="pizzamorecrustpaidoption('+special_row_crust+');"/>&nbsp;Paid &nbsp;<span id="showpizzacrustprice1_'+special_row_crust+'" style="display:none;"> Price : <input type="text" name="morecrustaddons['+special_row_crust+'][pizzacrust_price]" id="pizzacrustprice" value="" /></span></td>';
	
	html += '<td class="left1"  height="30" width="20%" align="left"><a onclick="$(\'#special_row_crust' + special_row_crust + '\').remove();" style="color:#f34571;cursor:pointer;margin-left:0px;"><span>Remove</span></a></td>';
	html += '</tr>';
	html += '</tbody>';
	$('#specialcrust tfoot').before(html);
	special_row_crust++;
	
}
function pizzacrustfreeoption(){
	$("#showcrustpizzaprice").hide();
}
function pizzacrustpaidoption(){
	$("#showcrustpizzaprice").show();
}

function pizzacrusteditfreeoption(cid){
	$("#showcrustpizzaprice_"+cid).hide();
}
function pizzacrusteditpaidoption(cid){
	$("#showcrustpizzaprice_"+cid).show();
}
function pizzamorecrustfreeoption(cid){
	$("#showpizzacrustprice1_"+cid).hide();
}
function pizzamorecrustpaidoption(cid){
	$("#showpizzacrustprice1_"+cid).show();
}
//------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------
//Delivery Areas in miles
function viewMap(){
	
	var restaurant_delivery_distance	=	$("#restaurant_delivery_distance").val();
	var eid								=	$("#eid").val();
	var rest_coord 						=  	$("#restaurant_coordinates").val().split(",");
	var map_center 						= 	new google.maps.LatLng(rest_coord[0], rest_coord[1]);
	var polygon_points 					=  	$("#restaurant_delivery_zone").val().split(",");
	
	
	var shapes = [];
	var markers = [];
	var map = new google.maps.Map(document.getElementById('map'), {
          center: map_center,
          zoom: 12
        });

        drawingManager = new google.maps.drawing.DrawingManager({
        	drawingMode: google.maps.drawing.OverlayType.POLYGON,
        	drawingControl: true,
        	drawingControlOptions: {
            	position: google.maps.ControlPosition.TOP_CENTER,
            	drawingModes: [google.maps.drawing.OverlayType.POLYGON,google.maps.drawing.OverlayType.MARKER]
        	},
        	polygonOptions: {
            	editable: true,
            	draggable: true
        	}
    	});
        drawingManager.setMap(map);
        
        if (polygon_points)
        {
        	// Define the LatLng coordinates for the polygon's path.
        	var deliveryPath = Array();
        	
        	for (var i = 0; i < polygon_points.length; i++) 
            {
            	var point = polygon_points[i].split(" ");
            	deliveryPath.push(new google.maps.LatLng(point[0], point[1]));
            	
            }
        	
  			

  			// Construct the polygon.
  			var deliveryPolygon = new google.maps.Polygon({
   		 		paths: deliveryPath,
    			strokeColor: '#FF0000',
    			strokeOpacity: 0.8,
    			strokeWeight: 2,
    			fillColor: '#FF0000',
    			fillOpacity: 0.35
  			});
  			deliveryPolygon.setMap(map);
  			shapes.push(deliveryPolygon);
        }
        
        if (map_center)
        {
        	var marker = new google.maps.Marker({
    			position: map_center
  			});
  			marker.setMap(map);
  			markers.push(marker);
        }
        
        
        // Add a listener for creating new shape event.
    	google.maps.event.addListener(drawingManager, "overlaycomplete", function (event) {
        	var newShape = event.overlay;
        	newShape.type = event.type;
        	
        	if (drawingManager.getDrawingMode()) 
        	{
            	drawingManager.setDrawingMode(null);
        	}
        
        	if(event.type == 'polygon') 
        	{
        		setPolygonPoints(event.overlay);
        		shapes.push(newShape);
        	
        	/*
       			var vertices = event.overlay.getPath();
      			var firstLat, firstLong;
      			var polyString = '';
  				// Iterate over the vertices.
  				for (var i =0; i < vertices.getLength(); i++) 
  				{
  					var xy = vertices.getAt(i);
  					if (i == 0)
  					{
  						firstLat = xy.lat();
  						firstLong = xy.lng();
  					}
  					polyString += xy.lat() + ' ' + xy.lng() + ',';
  				}
  				polyString += firstLat + ' ' + firstLong;
      			polyString += '';
      			$("#restaurant_delivery_zone").val(polyString);
      			//console.log(polyString);
      		*/
    		}
    		
    		if(event.type == 'marker') 
        	{
        		console.log(event);
        		markers.push(newShape);
        		$("#restaurant_coordinates").val(newShape.getPosition().lat() + "," + newShape.getPosition().lng());
        	}
    	});
        
        // add a listener for the drawing mode change event, delete any existing polygons
    	google.maps.event.addListener(drawingManager, "drawingmode_changed", function () {
        	if (drawingManager.getDrawingMode() != null) 
        	{
        		if (drawingManager.getDrawingMode() == google.maps.drawing.OverlayType.POLYGON)
        		{
        			for (var i = 0; i < shapes.length; i++) 
            		{
                		shapes[i].setMap(null);
            		}
            		shapes = [];
        		}
        		if (drawingManager.getDrawingMode() == google.maps.drawing.OverlayType.MARKER)
        		{
        			markers[0].setMap(null);
        			markers = [];
        		}
            	
        	}
    	});
    
     	// Add a listener for the "drag" event.
    	google.maps.event.addListener(drawingManager, "overlaycomplete", function (event) 
    	{
    		if(event.type == 'polygon') 
        	{
        		overlayDragListener(event.overlay);
        		$('#vertices').val(event.overlay.getPath().getArray());
        	}
    	});
        
        function overlayDragListener(overlay) 
        {
    		google.maps.event.addListener(overlay.getPath(), 'set_at', function (event) 
    		{
        		$('#vertices').val(overlay.getPath().getArray());
        		setPolygonPoints(overlay);
    		});
    		google.maps.event.addListener(overlay.getPath(), 'insert_at', function (event) 
    		{
        		$('#vertices').val(overlay.getPath().getArray());
        		setPolygonPoints(overlay);
    		});
		}   
		
		function setPolygonPoints(overlay)
		{
			var vertices = overlay.getPath();
      			var firstLat, firstLong;
      			var polyString = '';
  				// Iterate over the vertices.
  				for (var i =0; i < vertices.getLength(); i++) 
  				{
  					var xy = vertices.getAt(i);
  					if (i == 0)
  					{
  						firstLat = xy.lat();
  						firstLong = xy.lng();
  					}
  					polyString += xy.lat() + ' ' + xy.lng() + ',';
  				}
  				polyString += firstLat + ' ' + firstLong;
      			polyString += '';
      			$("#restaurant_delivery_zone").val(polyString);
      			//console.log(polyString);
      		
		
		}
	
	/*
	if(eid == ''){
		var street = $('#restaurant_streetaddress').val();
		var state  = $('#restaurant_state').val();
		var city   = $('#restaurant_city').val();
		var zip    = $('#restaurant_zip').val();
		
		if(street == '' || state == '' || city == '' || zip == '') {
			alert('contact info should not be blank');
			$('#contactinfo').trigger('click');
			return false;
		}else{
			$("#map").html('<img src="images/loader.gif" border="0" alt="Loading" />');
			$.post("adminAjaxFile.php", {'street':street, 'state':state, 'city':city, 'zip':zip, 'action':'addMapView'},function(response){
				var restaurant_address 	= $.trim(response);
				var rest_deliver_miles 	= $('#restaurant_delivery_distance').val();
				$('#map_distance_show').show();
				restaurant_gmap_delivery_area(restaurant_address, rest_deliver_miles);
			});
			return false;
		}
		
	}else{
		$("#map").html('<img src="images/loader.gif" border="0" alt="Loading" />');
		$("#map_distance_show").load("adminAjaxAction.php?action=mapInfoUpdate&restaurant_delivery_distance="+restaurant_delivery_distance+"&eid="+eid,function(response){		
    		var restaurant_address 	= $('#restaurant_address').val();
    		var rest_deliver_miles 	= $('#rest_deliver_miles').val();
    		
    		restaurant_gmap_delivery_area(restaurant_address, rest_deliver_miles);
    	});
	}*/
}

function restaurantCategory(resid){	
	$("#restCategoryList").load("adminAjaxAction.php?action=resCategory&resid="+resid, function() {
							$('.selectpicker').selectpicker('refresh');
						});
}
function restaurantAddonsCategory(resid){	
	$("#restAddonCategoryList").load("adminAjaxAction.php?action=resAddonCategory&resid="+resid);
}

//----------------------------------------------
function fixedOption(){

	$("#fixedOption").css("display", "block");
	$("#pizzaOtherOption").css("display", "none");
	$("#pizzaDefaultOption").css("display", "none");
	
	//AjaxAcition
	$("#fixedOption1").css("display", "block");
	$("#pizzaOtherOption1").css("display", "none");
	$("#pizzaDefaultOption1").css("display", "none");
	
	$(".showprice_fixed").show();
	$(".showprice_slice").hide();
	$(".showprice_size").hide();
	
	$(".madSubAddonNew2").css("display", "none");
	$(".slicemoreprice_txt").css("display", "none");
	
	$('#paid:checked').trigger('click');
	$('#free:checked').trigger('click');
}
function defaultOption(){

	$("#pizzaDefaultOption").css("display", "block");
	$("#fixedOption").css("display", "none");
	$("#pizzaOtherOption").css("display", "none");
	
	//AjaxAcition
	$("#pizzaDefaultOption1").css("display", "block");
	$("#fixedOption1").css("display", "none");
	$("#pizzaOtherOption1").css("display", "none");
	
	$(".showprice_size").show();
	$(".showprice_slice").hide();
	$(".showprice_fixed").hide();
	
	$(".madSubAddonNew2").css("display", "none");
	$(".slicemoreprice_txt").css("display", "none");
	
	$('#paid:checked').trigger('click');
	$('#free:checked').trigger('click');
}
function otherOption(){
	//alert("otherOption");	
	$("#pizzaOtherOption").css("display", "block");
	$("#pizzaDefaultOption").css("display", "none");
	$("#fixedOption").css("display", "none");
	
	//AjaxAcition
	$("#pizzaOtherOption1").css("display", "block");
	$("#pizzaDefaultOption1").css("display", "none");
	$("#fixedOption1").css("display", "none");
	
	$(".showprice_size").hide();
	$(".showprice_fixed").hide();
	$(".showprice_slice").show();
	
	$(".madSubAddonNew2").css("display", "none");
	$(".slicemoreprice_txt").css("display", "block");
	
	$('#paid:checked').trigger('click');
	$('#free:checked').trigger('click');
}
//--------------------------------------------------------------------------------------//
function fixedOption1(){
	
	//AjaxAcition
	$("#fixedOption1").css("display", "block");
	$("#pizzaOtherOption1").css("display", "none");
	$("#pizzaDefaultOption1").css("display", "none");
	
	$(".selectoptionVal").html("<input type='hidden' id='selectoptions' name='selectoptions' value='fixed' />");
	$(".selectoptionsFirst").val('');
	
	$(".free").attr('checked',false);
	$(".paid").attr('checked',true);
	
	$(".showprice_fixed").show();
	$(".showprice_slice").hide();
	$(".showprice_size").hide();
	
	$("#madAddons_def_fixed_add").css("display", "block");
	$("#madAddons_def_fix").css("display", "none"); // Sri
	$("#madAddons_firstajax").hide();
	$("#madAddons_slice").hide();
	$(".showAjaxsizeoption").show();
	
	$(".madSubAddonNew2").css("display", "none");
	$(".slicemoreprice_txt").css("display", "none");
}
function defaultOption1(){	
	
	//AjaxAcition
	$("#pizzaDefaultOption1").css("display", "block");
	$("#fixedOption1").css("display", "none");
	$("#pizzaOtherOption1").css("display", "none");
	
	$(".selectoptionVal").html("<input type='hidden' id='selectoptions' name='selectoptions' value='size' />");
	$(".selectoptionsFirst").val('');
	
	$(".free").attr('checked',false);
	$(".paid").attr('checked',true);
	
	$(".showprice_size").show();
	$(".showprice_slice").hide();
	$(".showprice_fixed").hide();
	
	$("#madAddons_def_fixed_add").css("display", "none"); //Sri
	$("#madAddons_def_fix").css("display", "block");
	$("#madAddons_firstajax").hide();
	$("#madAddons_slice").hide();
	$(".showAjaxsizeoption").show();
	
	$(".madSubAddonNew2").css("display", "none");
	$(".slicemoreprice_txt").css("display", "none");
}
function otherOption1(){
	
	//AjaxAcition
	$("#pizzaOtherOption1").css("display", "block");
	$("#pizzaDefaultOption1").css("display", "none");
	$("#fixedOption1").css("display", "none");
	
	$(".selectoptionVal").html("<input type='hidden' id='selectoptions' name='selectoptions' value='slice' />");
	$(".selectoptionsFirst").val('');
	
	$(".free").attr('checked',false);
	$(".paid").attr('checked',true);
	
	$(".showprice_size").hide();
	$(".showprice_fixed").hide();
	$(".showprice_slice").show();
	
	$("#madAddons_def_fixed_add").css("display", "none"); //Sri
	$("#madAddons_slice").css("display", "block");
	$("#madAddons_firstajax").hide();
	$("#madAddons_def_fix").hide();
	$(".showAjaxsizeoption").show();
	
	$(".madSubAddonNew2").css("display", "none");
	$(".slicemoreprice_txt").css("display", "block");
}
//-----------------------------------------------------//
var specialsize_main = 0;
function addMorePizzaSize_main(totrow){	
	//alert("sri");
   if(totrow!=undefined && specialsize_main == 0){
		specialsize_main = totrow;
   }
	html  = '<div class="specialsize_main' + specialsize_main + '" id="specialsize_main' + specialsize_main + '">';
	html += '<div>'; 
	html += '<div class="col-sm-4"><input type="text" name="morepizzasize['+specialsize_main+'][sizename]" id="sizename['+specialsize_main+']" class="form-control slicevalidate sliceCnt" value="" placeholder="Name"/><input type="text" name="morepizzasize['+specialsize_main+'][sizevalue]" value="" placeholder="Price" class="addonbox slicevalidate"/></div>';
	
	html += '<div class="col-sm-2"><a onclick="removeSlice('+specialsize_main+');" class="btn btn-danger" >X</a></div>';
	
	html += '</div>';
	html += '</div>';
	
	$('#specialPizzaSize_main tfoot').before(html);
	specialsize_main++;
} 
//-----------------------------------------------------
var specialsize = 0;
var html_sliceprice = '';
var count = 0;
function addMorePizzaSize(totrow){
	
	$(".madSubAddonNew2").css("display", "none");
	
	if(totrow!=undefined && specialsize == 0){
		specialsize = totrow;
	}
	
	html  = '<div class="specialsize' + specialsize + ' col-sm-12 no-pad marBtm5" id="specialsize' + specialsize + '">';

	html += '<div class="col-sm-4 no-pad"><input type="text" name="morepizzasize['+specialsize+'][sizename]" id="sizename['+specialsize+']" class="form-control slicevalidate sliceCnt" value="" placeholder="Name" /></div><div class="col-sm-2"><input type="text" name="morepizzasize['+specialsize+'][sizevalue]" value="" placeholder="Price" class="slicevalidate form-control" /></div>';
	
	html += '<div class="col-sm-2" ><a onclick="removeSlice('+specialsize+');" class="btn btn-danger btn-icon"><i class="fa fa-close"></i></a></div>';
	

	html += '</div>';
	
	$('#specialPizzaSize').before(html);
	
	var subaddonindex		=	$("#subaddonindex").val();	
	var mainaddonindex		=	$("#mainaddonindex").val();
	
	var cntSliceAddons = 0;
	//Slice addons more price:
	$(".slicemoreprice").each(function(index){		
		var now_id		=	$(this).attr("id");
		//alert(now_id);
		var now_id_arr	=	now_id.split("_");
				
		if(cntSliceAddons == 0){
				cntSliceAddons		=	$("#cntSliceAddons").val();
		}		
		//alert("<br>fff-->"+cntSliceAddons);
		var slicemoreprice_countperslice	=	$("#slicemoreprice_countperslice_"+now_id_arr[1]+"_"+now_id_arr[2]).val();
		//alert(slicemoreprice_countperslice)	;	
		if(slicemoreprice_countperslice == ''){			
			var slicemoreprice_countperslice_val	=	cntSliceAddons;
		}else{
			var slicemoreprice_countperslice_val	=	slicemoreprice_countperslice;
		}
		
		//alert(slicemoreprice_countperslice_val);
		if(slicemoreprice_countperslice_val == ''){
			slicemoreprice_countperslice_val = '0';
		}
		
		html_sliceprice	= ' <div class="col-sm-4 marBtm5"><input class="form-control input-sm numericfield" type="text" name="mainaddons['+now_id_arr[1]+'][addons]['+now_id_arr[2]+']['+slicemoreprice_countperslice_val+'][addons_price_slice]" id="addonsprice_slice_'+slicemoreprice_countperslice_val+'" value="" placeholder="Price"/></div>';
		
		$("#slicemoreprice_"+now_id_arr[1]+"_"+now_id_arr[2]).append(html_sliceprice);
		
		$("#slicemoreprice_countperslice_"+now_id_arr[1]+"_"+now_id_arr[2]).val(++slicemoreprice_countperslice_val);		
		//$("#cntSliceAddons_createsub").val(slicemoreprice_countperslice_val);		
	});    
	
	specialsize++;
	
	//Set Total Slice count For create more addons function:
	//Loading page	
	cntSliceAddons		=	$("#cntSliceAddons").val();	
	//alert("cntSliceAddons "+cntSliceAddons);
	var cntsliceaddonsize_load	=	$("#cntSliceAddons_createsub").val();
	//alert("cntsliceaddonsize_load "+cntsliceaddonsize_load);
	if(cntsliceaddonsize_load == ''){
		cntsliceaddonsize_new_load	=	cntSliceAddons;
	}else{
		cntsliceaddonsize_new_load	=	cntsliceaddonsize_load;
	}	
	$("#cntSliceAddons_createsub").val(++cntsliceaddonsize_new_load);
	//alert($("#cntSliceAddons_createsub").val());
	
	//Ajax	
	cntSliceAddons1			=	$("#cntSliceAddons1").val();		
	var cntsliceaddonsize	=	$("#cntSliceAddons_createsub1").val();
	if(cntsliceaddonsize == ''){
		cntsliceaddonsize_new	=	cntSliceAddons1;
	}else{
		cntsliceaddonsize_new	=	cntsliceaddonsize;
	}	
	$("#cntSliceAddons_createsub1").val(++cntsliceaddonsize_new);
}

function removeSlice(slice_id){	
	
	$(".specialsize"+slice_id).remove();
	$(".specialsize_main"+slice_id).remove();
	//$('#specialsize'+ slice_id).hide();
	
	$(".madSubAddonNew2").css("display", "none");
	var cntSliceAddons = 0;
	//Slice addons more price:
	$(".slicemoreprice").each(function(index){	
		var now_id		=	$(this).attr("id");
		var now_id_arr	=	now_id.split("_");
				
		if(cntSliceAddons == 0){
				cntSliceAddons		=	$("#cntSliceAddons").val();
		}		
		var slicemoreprice_countperslice	=	$("#slicemoreprice_countperslice_"+now_id_arr[1]+"_"+now_id_arr[2]).val();
		
		if(slicemoreprice_countperslice == ''){			
			var slicemoreprice_countperslice_val	=	--cntSliceAddons;
		}else{
			var slicemoreprice_countperslice_val	=	--slicemoreprice_countperslice;
		}	
		
		$('#addonsprice_slice_'+slicemoreprice_countperslice_val).remove();
		
		$("#slicemoreprice_countperslice_"+now_id_arr[1]+"_"+now_id_arr[2]).val(slicemoreprice_countperslice_val);	
		
		//Page
		$("#cntSliceAddons_createsub").val(slicemoreprice_countperslice_val); 
		//Ajax
		$("#cntSliceAddons_createsub1").val(slicemoreprice_countperslice_val);
	}); 
	  var slicecnt = $('.sliceCnt').length;
    
    $("#cntSliceAddons_createsub").val(slicecnt); 
		//Ajax
	$("#cntSliceAddons_createsub1").val(slicecnt);
	var page  = window.location.href;

}

function addCreateMoreAddons_firstAjax(){
	alert("Please select menu price Option");
	return false;
}

function addCreateMoreAddons_first(){	
		
	var chk_val 	=	$('input[name=sizeoption]:checked').val();

	if(chk_val == 'other'){
		addCreateMoreAddons_slice();
	}else if(chk_val == 'fixed'){
	   addCreateMoreAddons_fixed();
	}else{
		addCreateMoreAddons();
	}
}


//-------------------------------------------------------------
var special_row=0;
function addCreateMoreAddons(){	
	
	$('#createbuttondiv').append('<div class="form-group madSubAddonNew2">'+
	'<span class="col-sm-offset-4 col-sm-8 marTop10" id="mainremove_'+special_row+'">'+

	'<span id="mainaddremove_'+special_row+'" class="contain marBtm5">'+
		'<span class="col-sm-4"><input type="text" name="createmainaddons['+special_row+'][mainaddonsname]" id="mainaddons_'+special_row+'" class="form-control marginBot10" value="" /></span>  '+
		
			
			'<span class="col-sm-2"><input type="text" name="createmainaddons['+special_row+'][mainaddoncnt]" id="mainaddoncnt" value="" placeholder="count" size="12" class="form-control numericfield"/></span>'+
			'<span class="col-sm-2"><a onclick="return removemainaddon('+special_row+');"  class="btn btn-danger btn-icon"><i class="fa fa-close"></i></a></span>'+
			'<span id="sublist_'+special_row+'"><a onclick="createAddSubaddonsList('+special_row+');" class="btn btn-success">Add Sub Addons</a>'+
		
		
		'<div id="createsubbuttondiv_'+special_row+'" class="addtoCartInner"></div></span>'+
	' </span>'+
	' </span>'+
	'</div>');
	special_row++;
	var special_row1=0;		
}

function createAddSubaddonsList(mainaddid){
	//alert(special_row1);
		
		var pizza_size_ht = '<span class="col-sm-4 no-pad-left"><input class="form-control" type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsprice_medium]" value="" placeholder="Price"/></span>'+'<span class="col-sm-4 no-pad-left"><input class="form-control" type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsprice_large]" value="" placeholder="Price" /></span>';
		
		$('#createsubbuttondiv_'+mainaddid).append(''+
			'<span id="removesubmore_'+special_row1+'" class="contain martopbtm5">'+
			'<span class="col-sm-3"><input type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsname]" id="mainaddonsmore_'+special_row1+'" class="form-control" value="" /></span>'+
			
			'<span class="col-sm-3"><div class="radio-inline radio"><input class="" type="radio" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsradio]" value="Free" checked="checked" onclick="createaddonsfreeoption('+special_row1+');" id="slidefreeaddon_m'+special_row1+'"/><label for="slidefreeaddon_m'+special_row1+'"> Free</label></div>'+
			'<div class="radio-inline radio"><input class="" type="radio" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsradio]" value="Paid" onclick="createaddonspaidoption('+special_row1+');" id="slidepaidaddon_m'+special_row1+'"/><label for="slidepaidaddon_m'+special_row1+'">Paid</label></div></span>'+
			'<span id="showcreateaddonsprice1_'+special_row1+'" style="display:none;" class="col-sm-5"><span class="col-sm-4 no-pad-left"><input class="form-control numericfield" type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsprice]" value="" placeholder="Price"></span>'+
			pizza_size_ht+
			'</span>'+
			'<span class="col-sm-1"><a onclick="removeSubmore('+special_row1+');" class="btn btn-danger btn-icon"><i class="fa fa-close"></i></a></span>'+
			'</span>');
		special_row1++;		
}
//-------------------------------------------------------------------------------------------------------------------------------------------//
function addCreateMoreAddons_fixed(){	
	
	$('#createbuttondiv').append('<div class="form-group madSubAddonNew2">'+
	'<span class="botderTopPadTop" id="mainremove_'+special_row+'" class="mainremove_'+special_row+'">'+
	
	'<span id="mainaddremove_'+special_row+'" class="col-sm-offset-4 col-sm-8 marTop10">'+
		'<span class="col-sm-4"><input type="text" name="createmainaddons['+special_row+'][mainaddonsname]" id="mainaddons_'+special_row+'" class="form-control marginBot10" value="" /></span>  '+
		'<span class="col-sm-2"><input type="text" name="createmainaddons['+special_row+'][mainaddoncnt]" id="mainaddoncnt" value="" placeholder="count" size="12" class="form-control numericfield"/></span>'+
		'<span class="col-sm-2"><a onclick="return removemainaddon('+special_row+');" class="btn btn-danger btn-icon"><i class="fa fa-close"></i></a></span>'+
		'<span id="sublist_'+special_row+'"><a onclick="createAddSubaddonsList_fixed('+special_row+');" class="btn btn-success" >Add Sub Addons</a>'+
	
		
		'<div id="createsubbuttondiv_'+special_row+'" class="addtoCartInner"></div></span>'+
	' </span>'+
	' </span>'+
	'</div>');
	special_row++;
	var special_row1=0;		
}
//Remove Main Addons
function removemainaddon(aid){
	$('#mainremove_'+aid).html('');
	
}
function createAddSubaddonsList_fixed(mainaddid){
		
		$('#createsubbuttondiv_'+mainaddid).append(''+
			'<span id="removesubmore_'+special_row1+'" class="contain martopbtm5">'+
			'<span class="col-sm-3"><input type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsname]" id="mainaddonsmore_'+special_row1+'" class="form-control" value="" /></span>'+
			
			'<span class="col-sm-3"><div class="radio-inline radio"><input class="" type="radio" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsradio]" value="Free" checked="checked" onclick="createaddonsfreeoption('+special_row1+');" id="fixedaddonfree_m'+special_row1+'"/><label for="fixedaddonfree_m'+special_row1+'">Free</label></div>'+
			'<div class="radio-inline radio"><input class="" type="radio" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsradio]" value="Paid" onclick="createaddonspaidoption('+special_row1+');" id="fixedaddonprice_m'+special_row1+'"/><label for="fixedaddonprice_m'+special_row1+'">Paid</label></div></span>'+
			'<span id="showcreateaddonsprice1_'+special_row1+'" style="display:none;" class="col-sm-4"><span class="col-sm-8"><input class="form-control numericfield" type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsprice]" value="" placeholder="Fixed" ></span>'+
			'</span>'+
			'<span class="col-sm-1"><a class="btn btn-danger btn-icon" onclick="removeSubmore('+special_row1+');" ><i class="fa fa-close"></i></a></span>'+
			'</span>');
		special_row1++;		
}
//------------------------------------------------------------------------------------------------------------------------------------------------//

//-------------------------------------------------------------
function addCreateMoreAddons_slice(){
	
	$('#createbuttondiv').append('<div class="form-group madSubAddonNew2">'+
	'<span class="botderTopPadTop" id="mainremove_'+special_row+'">'+
	
	'<span id="mainaddremove_'+special_row+'" class="col-sm-offset-4 col-sm-8 marTop10">'+
		'<span class="col-sm-4"><input type="text" name="createmainaddons['+special_row+'][mainaddonsname]" id="mainaddons_'+special_row+'" class="form-control  marginBot10" value="" /> </span> '+
		'<span  class="col-sm-2"><input type="text" name="createmainaddons['+special_row+'][mainaddoncnt]" id="mainaddoncnt" value="" placeholder="count" size="12" class="form-control numericfield"/></span>'+
		'<span class="col-sm-2"><a onclick="return removemainaddon('+special_row+');" class="btn btn-danger btn-icon"><i class="fa fa-close"></i></a></span>'+
		'<span id="sublist_'+special_row+'"><a onclick="createAddSubaddonsList_slice('+special_row+');" class="btn btn-success">Add Sub Addons</a>'+
		
		
		'<div id="createsubbuttondiv_'+special_row+'" class="addtoCartInner"></div></span>'+
	' </span>'+
	' </span>'+
	'</div>');
	special_row++;		
}


function createAddSubaddonsList_slice(mainaddid){
		
		var cntSliceAddons_chk		=	$("#cntSliceAddons_createsub").val();
		
		if(cntSliceAddons_chk == ''){
			var cntSliceAddons	=	$("#cntSliceAddons").val();
		}else{
			var cntSliceAddons	=	$("#cntSliceAddons_createsub").val();
		}

		var cntSliceAddons       = $("input.sliceCnt:visible").length;
		var pizza_size_ht  = '';
		
		for(var i=0;i<cntSliceAddons;i++){			
		 pizza_size_ht += '<span class="col-sm-6 marBtm5"><input  type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+']['+i+'][subaddonsprice_slice]" value="" placeholder="Price" class="form-control input-sm" /></span>';
		}
		
		$('#createsubbuttondiv_'+mainaddid).append(''+
			'<span id="removesubmore_'+special_row1+'" class="contain martopbtm5">'+
			'<span class="col-sm-3"><input type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsname]" id="mainaddonsmore_'+special_row1+'" class="form-control" value="" /></span>'+
			
			'<span class="col-sm-3"><div class="radio-inline radio"><input class="" type="radio" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsradio]" value="Free" checked="checked" onclick="createaddonsfreeoption('+special_row1+');" id="sliceaddonfree_m'+special_row1+'"/><label for="sliceaddonfree_m'+special_row1+'">Free</label></div>'+
			'<div class="radio-inline radio"><input class="" type="radio" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsradio]" value="Paid" onclick="createaddonspaidoption('+special_row1+');" id="sliceaddonprice_m'+special_row1+'"/><label for="sliceaddonprice_m'+special_row1+'">Paid</label></div></span>'+	
			'<span id="showcreateaddonsprice1_'+special_row1+'" style="display:none;" class="col-sm-5" >'+		
			pizza_size_ht+
			'</span>'+
			'<span class="col-sm-1"><a onclick="removeSubmore('+special_row1+');" class="btn btn-danger btn-icon"><i class="fa fa-close"></i></a></span>'+
			'</span>');
		special_row1++;		
}

//-------------------------------------------------------------
function addCreateMoreAddons_slice_ajax(){
	
	$('#createbuttondiv').append('<div class="madSubAddonNew2">'+
	'<span class="botderTopPadTop" id="mainremove_'+special_row+'"><span class="addPageRightFont"><span class="redStar"></span>Addons Name</span>'+
	'<span class="colon1">:</span>'+
	'<span id="mainaddremove_'+special_row+'" class="madSubAddon4">'+
		'<input type="text" name="createmainaddons['+special_row+'][mainaddonsname]" id="mainaddons_'+special_row+'" class="textbox marginBot10" value="" />  '+
		'<div class="madLeftNew">'+
			
			'<span><input type="text" name="createmainaddons['+special_row+'][mainaddoncnt]" id="mainaddoncnt" value="" placeholder="count" size="12" class="madTxtBoxcntNew numericfield"/></span>'+
			'<a onclick="return removemainaddon('+special_row+');" class="btn btn-danger btn-icon"><i class="fa fa-close"></i></a>'+
			'<span id="sublist_'+special_row+'"><a onclick="createAddSubaddonsList_slice_ajax('+special_row+');" >Add Sub Addons</a>'+
		'</div>'+
		
		'<div id="createsubbuttondiv_'+special_row+'" class="addtoCartInner"></div></span>'+
	' </span>'+
	' </span>'+
	'</div>');
	special_row++;		
}

function createAddSubaddonsList_slice_ajax(mainaddid){		
		
		var cntSliceAddons_chk		=	$("#cntSliceAddons_createsub1").val();
		
		if(cntSliceAddons_chk == ''){
			var cntSliceAddons	=	$("#cntSliceAddons1").val();
		}else{
			var cntSliceAddons	=	$("#cntSliceAddons_createsub1").val();
		}
        
		var pizza_size_ht  = '';
		
		for(var i=0;i<cntSliceAddons;i++){			
		 pizza_size_ht += '<input class="flt paidTxtBox numericfield" type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+']['+i+'][subaddonsprice_slice]" value="" placeholder="Price" />';
		}
		
		$('#createsubbuttondiv_'+mainaddid).append('<div class="madSubAddonNew1">'+
			'<span id="removesubmore_'+special_row1+'" class="madSubAddon1">'+
			'<input type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsname]" id="mainaddonsmore_'+special_row1+'" class="madTxtBox" value="" />'+
			
			'<input class="inputPrice" type="radio" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsradio]" value="Free" checked="checked" onclick="createaddonsfreeoption('+special_row1+');"/><span class="freeInput"> Free</span>'+
			'<input class="inputPrice" type="radio" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsradio]" value="Paid" onclick="createaddonspaidoption('+special_row1+');"/><span class="freeInput">Paid</span>'+			
			'<span id="showcreateaddonsprice1_'+special_row1+'" style="display:none;" class="priceSpan flt">'+
			pizza_size_ht+
			'</span>'+
			'<a onclick="removeSubmore('+special_row1+');" class="btn btn-danger btn-icon"><i class="fa fa-close"></i></a>'+
			'</div></span>');
		special_row1++;		
}

//-------------------------------------------------------------
function createaddonsfreeoption(cid){
	
	$("#showcreateaddonsprice1_"+cid).hide();
}
function createaddonspaidoption(cid){
	
	$("#showcreateaddonsprice1_"+cid).show();
}

function removeAddon(parentid,catid,mainaddon_id,menu_addonid,resid,addon_name){
	
	var eid	  = $("#eid").val();
	if(confirm('Are you sure want to delete?')){		
		$(".addonsListShow").load("adminAjaxAction.php", {"parentid":parentid,"catid":catid,"eid":eid,"mainaddon_id":mainaddon_id,"menu_addonid":menu_addonid,"resid":resid,"action":"deleteAddons","addon_name":addon_name},function(response){
		});
	}	
}
//Print page
function print(){
	var win=window.open('about:blank');
	with(win.document)
	{
	  open();
	  
	  //write($("head").html());
	  $("#printing").html("<link type='text/css' rel='stylesheet' href='css/style.css' />");
	  $("#logoimg").show();
	  $("#print_new_page").hide();
	  $("#printpage").show();
	  
	  write($(".rightContBody").html());
	  $("#printing").html('');
	  $("#logoimg").hide();
	  $("#print_new_page").show();
	  $("#printpage").hide();
	  close();
	}
}

//FB Apps
function fbApps(){
	alert('Please Contact Roamsoft Support Team');
	return false;
}

//Plugin Concept
function restaurantPlugin(resid, resname) {
    
    var jssitebaseUrl = 'http://comeneat.com/v2';
    $('#restaurantPluginId').html('<textarea class="col-md-12" rows="5" ><span id="plugins"></span>'+
                                    '<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>'+
                                    '<script type="text/javascript" src="'+jssitebaseUrl+'/plugin/widget.js?resid='+resid+'&resname='+resname+'"></script></textarea>');             				
                            					
}

//others
	function otherSpecifyAddon(option){
		if(option=="category"){
			if(document.getElementById("categoryOther_addon").selected){
				document.getElementById("catoters_addon").style.display = "block";
			}else {
				document.getElementById("catoters_addon").style.display = "none";
				//$("#menu_categor").val('');
			}
			return false;
		}
	}