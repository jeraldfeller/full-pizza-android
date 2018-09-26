//------------------------------------------------------------------------------
						//Jquery Tab 
//------------------------------------------------------------------------------

function autoSuggestZip(){
	var cus_zip_city	= $("#cus_city").val();
	var restaurant_zip_city	= $("#restaurant_city").val();
	
	//From Customer Address Book Add Edit
	$('#zip_code').autocomplete({source:'adminAjaxFile.php?action=searchzip&city='+cus_zip_city, minLength:1});
	
	//Restaurant Zip Code Search
	$('#restaurant_zip').autocomplete({source:'adminAjaxFile.php?action=searchzip&city='+restaurant_zip_city, minLength:1});
	
}

//Auto Suggestion
$(function() {
	$('[data-toggle="tooltip"]').tooltip();
});
	
/* Page Loading */
$(window).load(function() {
	$(".loading").fadeOut(750);
});

$(document).ready(function(){
$('#selectall').click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
    if ($('input[id*=tableselect_][type=checkbox]:checked').length > 0) {
    	$('.but_activate').show();
		$('.but_deactivate').show();
    } else{
    	$('.but_activate').hide();
		$('.but_deactivate').hide();
    }
});

$("[id*=tableselect_]").change(function () {

    if ($('input[id*=tableselect_][type=checkbox]:checked').length == $('input[id*=tableselect_][type=checkbox]').length) {
        $('#selectall').prop('checked', true);
    } else {
        $('#selectall').prop('checked', false);
    }
    if ($('input[id*=tableselect_][type=checkbox]:checked').length > 0) {
    	$('.but_activate').show();
		$('.but_deactivate').show();
    } else{
    	$('.but_activate').hide();
		$('.but_deactivate').hide();
    }
});

	//Menu slide
	$(".Admin-box").click(function(){
		$(this).next("ul.acc-dropdown").slideToggle();
	});
	//Site settings
	$(".siteSettingTab a").click(function() { //When click open tab
		
		$(".siteSettingTab a").removeClass("active");
		$(".siteSettingTabContent").hide();
		
		$(this).addClass("active"); 
		var activeTab = $(this).attr("id");
		$('#'+activeTab+'_content').show();
	});

	//Index Page - Left
	
		//Add & Edit Restaurant
		$(".yearMonthStatics li a").click(function() { //When click open tab
			
			$(".yearMonthStatics li a").removeClass("active");
			$(".indexLeftTabContent").hide();
			
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
			$('#'+activeTab+'_content').show();
		});
	
//Index Page - Right
		//Add & Edit Restaurant
		$(".rightStatics li a").click(function() { //When click open tab
			
			$(".rightStatics li a").removeClass("active");
			$(".indexRightTabContent").hide();
			
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
			$('#'+activeTab+'_content').show();
		});
	
	//Currency Settings for Site Settings
		$("#currency_display_img").click(function() { 
			
			$("#currency_img_display").show();
			$("#currency_sym_display").hide();
		});
		
		$("#currency_display_sym").click(function() { 
			
			$("#currency_sym_display").show();
			$("#currency_img_display").hide();
		});
	
	//Paypal Payment settings for Payment settings
		$("#live_mode").click(function() { 
			
			$("#paypal_url_live").show();
			$("#paypal_url_test").hide();
			$("#business_live").show();
			$("#business_test").hide();
			$('input#test_mode').attr('checked', false);
		});
		
		$("#test_mode").click(function() {
			
			 $("#paypal_url_test").show();
			 $("#paypal_url_live").hide();
			 $("#business_test").show();
			 $("#business_live").hide();
			 $('input#live_mode').attr('checked', false);
		});
		
		//PayPal Pro Payment Setting
		$("#paypal_pro_live_mode").click(function() { 
			
			$("#pro_uname_live").show();
			$("#pro_uname_test").hide();
			$("#pro_password_live").show();
			$("#pro_password_test").hide();
			$("#pro_sign_live").show();
			$("#pro_sign_test").hide();
			$('input#paypal_pro_test_mode').attr('checked', false);
		});
		$("#paypal_pro_test_mode").click(function() {
			
			 $("#pro_uname_test").show();
			 $("#pro_uname_live").hide();
			 $("#pro_password_test").show();
			 $("#pro_password_live").hide();
			 $("#pro_sign_test").show();
			 $("#pro_sign_live").hide();
			 $('input#paypal_pro_live_mode').attr('checked', false);
		});
		
		//Authorized.net Payment Setting
		$("#authorized_live_mode").click(function() { 
			
			$("#authorized_url_live").show();
			$("#authorized_url_test").hide();
			$("#authorized_login_key_live").show();
			$("#authorized_login_key_test").hide();
			$("#authorized_transaction_key_live").show();
			$("#authorized_transaction_key_test").hide();
			$('input#authorized_test_mode').attr('checked', false);
		});
		$("#authorized_test_mode").click(function() {
			
			 $("#authorized_url_test").show();
			 $("#authorized_url_live").hide();
			 $("#authorized_login_key_test").show();
			 $("#authorized_login_key_live").hide();
			 $("#authorized_transaction_key_test").show();
			 $("#authorized_transaction_key_live").hide();
			 $('input#authorized_live_mode').attr('checked', false);
		});
        //Stripe Payment Setting
		$("#credit_live_mode").click(function() { 
			
			$("#credit_stripe_live").show();
			$("#credit_stripe_test").hide();
			$('input#credit_test_mode').attr('checked', false);
		});
		$("#credit_test_mode").click(function() {
			
			$("#credit_stripe_test").show();
		    $("#credit_stripe_live").hide();
		    $('input#credit_live_mode').attr('checked', false);
		});
});

function selectDeselectAll() {
    
    	var selectallvar = $('#selectall').is(':checked');
		if(selectallvar == true){
			//alert("true");
			$(".case").prop('checked',true);

		}else{
			//alert("false");
			$(".case").prop('checked',false);
		}
			
		var checkedvar = $('.case').is(':checked');
		if(checkedvar == true){
			$('.but_activate').show();
			$('.but_deactivate').show();
			//$('.but_delete').show();
		}else{
			$('.but_activate').hide();
			$('.but_deactivate').hide();
			//$('.but_delete').hide();
		}
    
}

//--------------------------------------- Filter -----------------------------------------------
//Display filter option
function filterOptShowHide(){
	$(".plusimg").toggle();
	$(".minusimg").toggle();
	$("#searchkey").toggle();	 
	$("#export").hide();
	$("#import").hide(); 
}
//Filter validation
function filterValidation(){
	var keyword = $.trim($("#keyword").val());
	
	if(keyword == ''){
		//$("#errormsg").addClass('errormsg').html("Please Enter the Keyword");
		alert("Please enter the keyword");
		$("#keyword").focus();
		return false;
	}
}

//Clear Filter Text Box
function clearFilterTxtBox(){
	$("#keyword").val('');
	return false;
}

//Back to content
function backToContent(){
    $currentFile = window.location.pathname.split("/").pop();
	window.location.href = $currentFile;
	return false;
}
function backToOldContent(){
    $previous = document.referrer;
    window.location.href = $previous;
	return false;
}
//--------------------------------------- Export -----------------------------------------------
//Display Export
function exportOptShowHide(){
	$("#export").toggle();
	$("#searchkey").hide();
	$("#import").hide(); 
}

//export validaton
function exportValidation(){
	var exportvalue = $.trim($("#exportfile").val());
	
	if(exportvalue == ''){
		alert("Please Select the File Format");
		$("#exportfile").focus();
		return false;
	}
}
//--------------------------------------- Import -----------------------------------------------
//Display Import
function importOptShowHide(){
	
	$("#import").toggle();
	$("#export").hide();
	$("#searchkey").hide(); 
}

//import validation
function importValidation(){
	
	var import_file = $.trim($("#importfile").val());
	
	if(import_file == ''){
		alert("Please Browse the File");
		$("#importfile").focus();
		return false;
	}	
	if(import_file != ''){	
		var ext = $('#importfile').val().split('.').pop().toLowerCase();
		
		if($.inArray(ext, ['csv','xls']) == -1){
			alert("Please select the valid file format (csv,xls)");
			$("#importfile").focus();
			return false;
		}				
	}
}
//--------------------------------------- Change Password -----------------------------------------------
//ChangePassword
function changepassword()
{
    if(viewable == 'No') {
        //alert("Access denied");
        window.location.href = 'demoVersion.php';
        return false;
    } else {
        $("#errormsg").removeClass('successmsg');
        $("#errormsg").removeClass('succFixed');
    	var old_password = $.trim($("#old_password").val());
    	var new_password = $.trim($("#new_password").val());
    	var con_password = $.trim($("#confirmed_password").val());
    		
    	if(old_password == ''){
    		$("#errormsg").addClass('errormsg').html("Please enter old password");
    		$("#old_password").focus();
    		return false;
    	}
    	else if(new_password == ''){
    		$("#errormsg").addClass('errormsg').html("Please enter new password");
    		$("#new_password").focus();
    		return false;
    	}
    	else if(con_password == ''){
    		$("#errormsg").addClass('errormsg').html("Please enter confirm password");
    		$("#confirmed_password").focus();
    		return false;		
    	}
    	else if(old_password == new_password){
    		$("#errormsg").addClass('errormsg').html("Old password and new password should not be same");
    		$("#old_password").focus();
    		return false;
    	}
    	else if(new_password != con_password){
    		$("#errormsg").addClass('errormsg').html("New password and confirm password should be same");
    		$("#new_password").focus();
    		return false;
    	}
    	else{		
    		$.post('adminAjaxFile.php',{"old_password":old_password,"new_password":new_password,"action":"checkChangePassword"},function(response){
    		
    			if($.trim(response) == "Invalid_Old_Pwd")
    			{
    				$("#errormsg").addClass('errormsg').html("Invalid old password");
    				return false;
    			}
    			else
    			{
    				$("#errormsg").removeClass('errormsg');
    				$("#errormsg").addClass('succFixed').html("Password has been updated successfully");
    				$("#old_password").val('');
    				$("#new_password").val('');
    				$("#confirmed_password").val('');
    			} 
    		});
    		return false;
    	}
    }
}


/*************************** Common Method Start**********************************************/

//Individual Select
function individualSelect(){
    
	if($(".case").length == $(".case:checked").length) {
		
        $("#selectall").attr("checked", "checked");
        
        $('.but_activate').show();
		$('.but_deactivate').show();
        if(viewable == 'Yes') {
            $('.but_delete').show();
        }
		
    } else {
        $("#selectall").removeAttr("checked");
        
        if($(".case:checked").length > 0){
			$('.but_activate').show();
			$('.but_deactivate').show();
			if(viewable == 'Yes') {
                $('.but_delete').show();
            }
		}else{
			$('.but_activate').hide();
			$('.but_deactivate').hide();
			if(viewable == 'Yes') {
                $('.but_delete').show();
            }
		}
    }
}

//Show Per Page
function showPerPage(limit,keyword,sortby){
	
	if(limit != ''){
		//get url
   		var filename = $(location).attr('href'); 
   		//get Parameter
        
   		var qrystr, qrystrlen, qryparam;
   		qrystr = filename.split("="); 
   		qrystrlen = qrystr.length;    
   		qryparam = (qrystrlen == '1') ? '?' : '&';
						
		$('.tableListContainer,.table-responsive').load(filename+' .tableListContainer,.table-responsive',qryparam+'sortby='+sortby+'&limit='+limit+'&keyword='+keyword, function() {
			$(".loading").hide();
		});
	}
}

//Show Per Page
function sortByAscDesc(sortby,limit,keyword){
	
	if(sortby != ''){
		//get url
   		var filename = $(location).attr('href');
   		//get Parameter
   		var qrystr, qrystrlen, qryparam;
   		qrystr = filename.split("=");
   		qrystrlen = qrystr.length;
   		qryparam = (qrystrlen == '1') ? '' : '&';
   		$("#errormsg").html('<img src="images/loadingAnimation.gif" border="0" alt="Loading" />');
		$('.tableListContainer,.table-responsive').load(filename+' .tableListContainer,.table-responsive',qryparam+'sortby='+sortby+'&limit='+limit+'&keyword='+keyword, function() {
			$(".loading").hide();
            $("#errormsg").html('');
   			$.getScript('js/admin_common.js');
		});
	}
}

//Activate, Deactivate and Delete
function adminActivateDeactivate(changestatusval,fieldname,whereField,tablename,word,filetype){
    var word = word.toLowerCase();
    var checkedvar = $('.case').is(':checked');
    if(checkedvar == true){
    	
    	if(changestatusval == '1'){
			var str = 'Are you sure want to activate?';
		}else if(changestatusval == '0'){
			var str = 'Are you sure want to deactivate?';
		}if(changestatusval == 'Yes'){
			var str = 'Are you sure want to change to popular dish?';
		}else if(changestatusval == 'No'){
			var str = 'Are you sure want to change to normal dish?';
		}else if(changestatusval == 'delete'){
			var str = 'Are you sure want to delete?';
		}
    	if( confirm(str) ){
		    	var checkedvalues = $('input:checkbox:checked.case').map(function () {
				  return this.value;
				}).get();
				
			    //Delete
			    if(changestatusval == 'delete'){
			    	$.post("adminAjaxFile.php", { 'whereField':whereField, 'tablename':tablename, 'filetype':filetype, 'checkedvaluesarr[]': checkedvalues, 'action':'deleteProcess' },function(response){
			    		//alert(response)
				       	if($.trim(response) == 'success'){
				       		
				       		var filename = $(location).attr('href');
				       		$("#errormsg").html('<img src="images/loadingAnimation.gif" border="0" alt="Loading" />');
							$('.tableListContainer,.table-responsive').load(filename + ' .tableListContainer,.table-responsive', function() {
								$(".loading").hide();
							});
						}else{
							alert("error");return false;
						} 
	                });
	            }else if(changestatusval == '1' || changestatusval == '0'){
	            	
	            	//Active & Deactive
					$.post("adminAjaxFile.php", { 'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'checkedvaluesarr[]': checkedvalues, 'action':'changeStatus' },function(response){
				    	if($.trim(response) == 'success'){
				    		
				    		var filename = $(location).attr('href');
				    		$("#errormsg").html('<img src="images/loadingAnimation.gif" border="0" alt="Loading" />');
							$('.tableListContainer,.table-responsive').load(filename + ' .tableListContainer,.table-responsive', function() {
								$(".loading").hide();
								
								if(changestatusval == '1')
									$("#errormsg").addClass('successmsglist').html('Selected '+word+' activated successfully');
								else if(changestatusval == '0')
									$("#errormsg").addClass('successmsglist').html('Selected '+word+' deactivated successfully');
								else
									$("#errormsg").addClass('errormsglist').html('Error');
							});
						}else{
							alert("error");return false;
						} 
                	});
				}else if(changestatusval == 'Yes' || changestatusval == 'No'){
	            	
	            	//Popular & Normal
					$.post("adminAjaxFile.php", { 'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'checkedvaluesarr[]': checkedvalues, 'action':'changePopularDish' },function(response){
				    	if($.trim(response) == 'success'){
				    		
				    		var filename = $(location).attr('href');
				    		$("#errormsg").html('<img src="images/loadingAnimation.gif" border="0" alt="Loading" />');
							$('.tableListContainer,.table-responsive').load(filename + ' .tableListContainer,.table-responsive', function() {
								$(".loading").hide();
								
								if(changestatusval == 'Yes')
									$("#errormsg").addClass('successmsglist').html('Selected '+word+' changed to popular dish successfully');
								else if(changestatusval == 'No')
									$("#errormsg").addClass('successmsglist').html('Selected '+word+' changed to normal dish successfully');
								else
									$("#errormsg").addClass('errormsglist').html('Error');
							});
						}else{
							alert("error");return false;
						} 
                	});
				}
		}
	}else{
		alert("Please select anyone record then proceed.")
	}
}
//Full Delete For More Than One Restaurant
function adminFullDelete(changestatusval,fieldname,whereField,tablename,word,filetype){
	
	var checkedvar = $('.case').is(':checked');
    if(checkedvar == true){
    	
    	if(changestatusval == 'delete'){
			var str = 'Are you sure want to delete?';
		}
    	if( confirm(str) ){
		    	var checkedvalues = $('input:checkbox:checked.case').map(function () {
				  return this.value;
				}).get();
				
			    //Delete
			    if(changestatusval == 'delete'){
			    	$.post("adminAjaxFile.php", { 'whereField':whereField, 'tablename':tablename, 'filetype':filetype, 'checkedvaluesarr[]': checkedvalues, 'action':'FullDeleteRestaurants' },function(response){
			    		//alert(response)
				       	if($.trim(response) == 'success'){
				       		
				       		var filename = $(location).attr('href');
				       		$("#errormsg").html('<img src="images/loadingAnimation.gif" border="0" alt="Loading" />');
							$('.tableListContainer,.table-responsive').load(filename + ' .tableListContainer,.table-responsive', function() {
								$(".loading").hide();
							});
						}else{
							alert("error");return false;
						} 
	                });
	            }
		}
	}
}

//Change Status
function changeStatus(changestatusval,fieldname,whereField,tablename,word,maincateid,filetype){
    var word = word.toLowerCase();
    //alert(filename1);
    //alert(changestatusval);
    //alert(whereField);
    //alert(tablename);
    //alert(word);
    //alert(maincateid);
    
	if(maincateid != '' && changestatusval != '')
	{
		
		if(changestatusval == 'Pending'){
		  //alert('hi');
		//Pending Process........................................
			var changestatusval = '1';
			
			$.post("adminAjaxFile.php", { 'changestatusval':changestatusval,'word':word, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'maincateid': maincateid, 'action':'changeStatusPending'  },function(response){
				//alert(response);
				//return false;
				if($.trim(response) == 'success'){
					//alljsget();
					//$("body").html($("body").html());	
                   	var filename = $(location).attr('href');
					
					$("#errormsg").html('<img src="images/loadingAnimation.gif" border="0" alt="Loading" />');
					if(changestatusval == '1')
							$("#errormsg").addClass('successmsglist').html('Selected '+word+' activated successfully');
						else if(changestatusval == '0')
							$("#errormsg").addClass('successmsglist').html('Selected '+word+' deactivated successfully');
						else
							$("#errormsg").addClass('errormsglist').html('Error');
					//$('body').load(filename, function() {
					$('.tableListContainer,.table-responsive').load(filename + ' .tableListContainer,.table-responsive', function() {
						$(".loading").hide();
					});return false;
					
				}else{
					alert("error");return false;
				}
			});
			return false;
		}
		else if(changestatusval == 'delete' ){
		 
		//Delete Process........................................
			
			if(confirm('Are you sure want to delete?')){
				$.post("adminAjaxFile.php", { 'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'maincateid': maincateid, "filetype":filetype, 'action':'deleteProcess'  },function(response){
				//alert(response);	return false;
					if($.trim(response) == "success"){		
					
						$("#deletecate"+maincateid).hide();
						var filename = $(location).attr('href');
						$("#errormsg").html('<img src="images/loadingAnimation.gif" border="0" alt="Loading" />');
						$('.tableListContainer,.table-responsive').load(filename + ' .tableListContainer,.table-responsive', function() {
							$(".loading").hide();
							$("#errormsg").addClass('successmsglist').html('Selected '+word+' deleted successfully');
						});	
						return false;
					}else{
						alert("error");return false;
					}
				});return false;
			}
		}else if(changestatusval == '0' || changestatusval == '1'){ //alert('yes');
			//Change Status Process........................................
			
			$.post("adminAjaxFile.php", { 'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'maincateid': maincateid, 'action':'changeStatus'  },function(response){ //alert(response);
				
				if($.trim(response) == 'success'){
					//alert($("body").html());
					//$("body").html();
					
					var filename = $(location).attr('href');
					$("#errormsg").html('<img src="images/loadingAnimation.gif" border="0" alt="Loading" />');
				
					//$('body').load(filename, function() {
					$('.tableListContainer,.table-responsive').load(filename + ' .tableListContainer,.table-responsive', function() {
						$(".loading").hide();
						if(changestatusval == '1')
							$("#errormsg").addClass('successmsglist').html('Selected '+word+' activated successfully');
						else if(changestatusval == '0')
							$("#errormsg").addClass('successmsglist').html('Selected '+word+' deactivated successfully');
						else
							$("#errormsg").addClass('errormsglist').html('Error');
					});
					
					return false;
				}else{
					alert("error");return false;
				}
			});
			return false;
		}else if(changestatusval == 'Yes' || changestatusval == 'No'){ 
			
				//Change Popular Dish Process........................................
				$.post("adminAjaxFile.php", { 'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'maincateid': maincateid, 'action':'changePopularDish'  },function(response){
				
					//alert(response);
					if($.trim(response) == 'success'){
						
						var desired_msg  = '';
						if(fieldname == 'menu_popular_dish'){
							if(changestatusval == 'Yes'){
								desired_msg = 'Selected '+word+' changed to popular dish successfully';
							}else if(changestatusval == 'No'){
								desired_msg = 'Selected '+word+' changed to normal dish successfully';
							}
						}else if(fieldname == 'restaurant_feature_status'){
							if(changestatusval == 'Yes'){
								desired_msg = 'Selected '+word+' changed to feature successfully';
							}else if(changestatusval == 'No'){
								desired_msg = 'Selected '+word+' changed to normal successfully';
							}
						}else if(fieldname == 'restaurant_footer_status'){
							if(changestatusval == 'Yes'){
								desired_msg = 'Selected '+word+' changed to footer successfully';
							}else if(changestatusval == 'No'){
								desired_msg = 'Selected '+word+' changed to normal successfully';
							}
						}else if(fieldname == 'lang_site'){
							if(changestatusval == 'Yes'){
								desired_msg = 'Selected '+word+' changed to site language successfully';
							}else if(changestatusval == 'No'){
								desired_msg = 'Selected '+word+' changed to normal language successfully';
							}
						}else if(fieldname == 'followers_header'){
							if(changestatusval == 'Yes'){
								desired_msg = 'Selected '+word+' changed to followers header successfully';
							}else if(changestatusval == 'No'){
								desired_msg = 'Selected '+word+' changed to normal dish successfully';
							}
						}
						
						var filename = $(location).attr('href');
						$("#errormsg").html('<img src="images/loadingAnimation.gif" border="0" alt="Loading" />');
						//$('body').load(filename, function() {
						$('.tableListContainer,.table-responsive').load(filename + ' .tableListContainer,.table-responsive', function() {
							$(".loading").hide();
							$('.selectpicker').selectpicker('refresh');
							if(changestatusval == 'Yes')
								$("#errormsg").addClass('successmsglist').html(desired_msg);
							else if(changestatusval == 'No')
								$("#errormsg").addClass('successmsglist').html(desired_msg);
							else
								$("#errormsg").addClass('errormsglist').html('Error');
						});
					}else{
						alert("error");return false;
					}
				});
				return false;
		}
	}else{
		alert("Error occured");
	}
	//}	
}
//Order Change to Disclaim
function disclaimOrder(orderStatus,id,fieldname,wherefield,tbl,word,ordid){
    //alert(orderStatus);
    //alert(id);
    //alert(fieldname);
    //alert(wherefield);
    //alert(tbl);
    //alert(word);
   // alert(ordid);
	var word = word.toLowerCase();
	if(orderStatus == 'processing'){
		changeOrderStatus("processing",fieldname,wherefield,tbl,word,ordid);
	}else if(orderStatus == 'testing'){
		changeOrderStatus("testing",fieldname,wherefield,tbl,word,ordid);
	}else if(orderStatus == 'failed'){
		$("#"+id).show();
	}else if(orderStatus == 'pending'){
		$("#"+id).hide();
	}
}
//Order Change Status
function changeOrderStatus(changestatusval,fieldname,whereField,tablename,word,maincateid){
	
	
		var reason = $("#reason"+maincateid).val(); 
		if(changestatusval == 'failed'){
			if(reason == ''){
				alert("Please enter the reason for disclaim order");
				return false;
			}	
		}
	
	$.post("adminAjaxFile.php", { 'changestatusval':changestatusval, 'reason':reason, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'maincateid': maincateid, 'action':'changeStatus'  },function(response){
		//alert(response);	
		//alert(changestatusval);	
		if($.trim(response) == 'success'){
			
			var filename = $(location).attr('href'); 
			$("#errormsg").html('<img src="images/loadingAnimation.gif" border="0" alt="Loading" />');
			$('.tableListContainer,.table-responsive').load(filename + ' .tableListContainer,.table-responsive', function() {
				$(".loading").hide();
				if(changestatusval == 'processing' || changestatusval == 'pending' || changestatusval == 'completed' || changestatusval == 'failed' || changestatusval == 'testing' || changestatusval == 'preparando' || changestatusval == 'horneando' || changestatusval == 'empacando' || changestatusval == 'listo-para-enviar' || changestatusval == 'enviado' )
					$("#errormsg").addClass('successmsglist').html('Selected '+word+' status change successfully');
				else if(changestatusval == 'IS' || changestatusval == 'PS' || changestatusval == 'PR' ){
					var invoice_status;
					if(changestatusval == 'IS') invoice_status = 'Invoice Sent';
					if(changestatusval == 'PS') invoice_status = 'Payment Sent';
					if(changestatusval == 'PR') invoice_status = 'Payment Received';
					
					$("#errormsg").addClass('successmsglist').html('Selected '+word+' status is changed to '+invoice_status+' ');
				}
				else
					$("#errormsg").addClass('errormsglist').html('Error');
			});
		}else{
			alert("error");return false;
		}
	});
	return false;
}

//Booking Order Change to Disclaim
function bookstatus(orderStatus,id,fieldname1,wherefield,tbl,word,ordid){
    //alert(orderStatus);
   // alert(id);
    //alert(fieldname1);
   // alert(wherefield);
    //alert(tbl);
    //alert(word);
   // alert(ordid);
	var word = word.toLowerCase();
	if(orderStatus == 'accept'){
	   //alert('hi');
		changebookOrderStatus("accept",fieldname1,wherefield,tbl,word,ordid);
	}else if(orderStatus == 'reject'){
		$("#"+id).show();
	}
}

//Order Change Status
function changebookOrderStatus(changestatusval,fieldname1,whereField,tablename,word,maincateid){
	
           
           
           var reason = $("#reason"+maincateid).val(); 
           
		if(changestatusval == 'reject'){
			if(reason == ''){
				alert("Please enter the reason for disclaim order");
				return false;
			}	
		}
        //alert(changestatusval);
        //alert(id);
        //alert(maincateid); 
        //alert('hiiiii');
        //return false;
        //alert(maincateid);
		$.post("adminAjaxFile.php", { 'changestatusval':changestatusval,'reason':reason,  'fieldname':fieldname1, 'whereField':whereField, 'tablename':tablename, 'maincateid': maincateid, 'action':'changebookStatus'  },function(response){
		//alert(response);
          if($.trim(response) == 'success'){
			
			var filename = $(location).attr('href'); 
			$("#errormsg").html('<img src="images/loadingAnimation.gif" border="0" alt="Loading" />');
			$('.tableListContainer,.table-responsive').load(filename + ' .tableListContainer,.table-responsive', function() {
				$(".loading").hide();
				if(changestatusval == 'accept' || changestatusval == 'reject') {
				    //alert('hello');
					$("#errormsg").addClass('successmsglist').html('Selected '+word+' status change successfully');
                }
				else if(changestatusval == 'IS' || changestatusval == 'PS' || changestatusval == 'PR' ){
					var invoice_status;
					if(changestatusval == 'IS') invoice_status = 'Invoice Sent';
					if(changestatusval == 'PS') invoice_status = 'Payment Sent';
					if(changestatusval == 'PR') invoice_status = 'Payment Received';
					
					$("#errormsg").addClass('successmsglist').html('Selected '+word+' status is changed to '+invoice_status+' ');
				}
				else
					$("#errormsg").addClass('errormsglist').html('Error');
			});
		}else{
			alert("error");return false;
		}
	});
		
}


























//Select Payment Method
function selectPaymentMethod(changestatusval,fieldname,whereField,tablename,word,maincateid,resid,status){
	var word = word.toLowerCase();
	if(status == '1'){
		$.post("adminAjaxFile.php", { 'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'maincateid': maincateid, 'resid':resid, 'action':'selectPaymentMethod'  },function(response){
		
			if($.trim(response) == 'success'){
						
				var filename = $(location).attr('href');
				$("#errormsg").html('<img src="images/loadingAnimation.gif" border="0" alt="Loading" />');
				$('.tableListContainer,.table-responsive').load(filename + ' .tableListContainer,.table-responsive', function() {
					$(".loading").hide();
					
					if(changestatusval == 'Yes')
						$("#errormsg").addClass('successmsglist').html('Selected '+word+' select successfully');
					else if(changestatusval == 'No')
						$("#errormsg").addClass('successmsglist').html('Selected '+word+' unselect successfully');
					else
						$("#errormsg").addClass('errormsglist').html('Error');
				});
				
			}else{
				alert("error");return false;
			}
		});
	}else{
		$("#errormsg").addClass('errormsglist').html('You will select only active status');
	}
	
	return false;
}
//......... Encode & decode for utf8 start
/*function encode_utf8( s )
{
  return unescape( encodeURIComponent( s ) );
}

function decode_utf8( s )
{
  return decodeURIComponent( escape( s ) );
}*/
//......... Encode & decode for utf8 End
/*************************** Common Method Start**********************************************/
//Restaurant Delete complete details
function fullDelete(changestatusval,fieldname,whereField,tablename,word,maincateid,filetype){
    var word = word.toLowerCase();
	if(confirm('Are you sure want to delete?')){
		$.post("adminAjaxFile.php", { 'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'maincateid': maincateid, "filetype":filetype, 'action':'fulldeleteProcess'  },function(response){
		//alert(response);	return false;
			if($.trim(response) == "success"){		
					
				$("#deletecate"+maincateid).hide();
				var filename = $(location).attr('href');
				$("#errormsg").html('<img src="images/loadingAnimation.gif" border="0" alt="Loading" />');
				$('.tableListContainer,.table-responsive').load(filename + ' .tableListContainer,.table-responsive', function() {
					$(".loading").hide();
					$("#errormsg").addClass('successmsglist').html('Selected '+word+' deleted successfully');
				});	
				return false;
			}else{
				alert("error");return false;
			}
		});return false;
	}
}
//Restore Restaurant
function restoreProcess(changestatusval,fieldname,whereField,tablename,word,maincateid,filetype){
    var word = word.toLowerCase();
	if(confirm('Are you sure want to Restore?')){
		$.post("adminAjaxFile.php", { 'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'maincateid': maincateid, "filetype":filetype, 'action':'restoreProcess'  },function(response){
	//alert(response);	return false;
			if($.trim(response) == "success"){		
					
				$("#deletecate"+maincateid).hide();
				var filename = $(location).attr('href');
				$("#errormsg").html('<img src="images/loadingAnimation.gif" border="0" alt="Loading" />');
				$('.tableListContainer,.table-responsive').load(filename + ' .tableListContainer,.table-responsive', function() {
					$(".loading").hide();
					$("#errormsg").addClass('successmsglist').html('Selected '+word+' restored successfully');
					if(filetype == 'restaurant'){
						window.location = 'restaurantManage.php';
					}else if(filetype == 'order_delete'){
						window.location = 'restaurantOrderManage.php';
					}else if(filetype == 'delete_menu'){
						window.location = 'menuManage.php';
					}else if(filetype == 'customer'){
						window.location = 'customerManage.php';
					}
					
				});	
				return false;
			}else{
				alert("error");return false;
			}
		});return false;
	}
}

$(document).ready(function(){
	$(".filterBgImg").click(function(){
		$(".filterBgImg").removeClass('active');							 
		$(this).toggleClass('active');
	});
});

//Voucher Concept

function AddEditVoucher(type)
{
    
    var coupon      = $.trim($("#voucherCode").val());
    var use         = $.trim($("[name=useType]:checked").val());
    var off         = $.trim($("[name=offType]:checked").val());
    var price       = $.trim($("#offPrice").val());
    var validFrom   = $.trim($("#valid_from").val());
    var validTo     = $.trim($("#valid_to").val());
    var res         = $.trim($("#restaurantList").val());
    var numregexp 			= new RegExp(/^[-+]?\d{0,10}(\.\d{2})?$/);
    var validPri			= numregexp.test(price);
    $('#errormsg').html('');
    fieldDateFirst = validFrom.split("-");
		fieldDateSecound = validTo.split("-");
		var Date1 = new Date();
		var Date2 = new Date();
		
		/*alert(fieldDateFirst[0]);
		alert(fieldDateFirst[1]);
		alert(fieldDateFirst[2]);
		alert(fieldDateSecound[0]);
		alert(fieldDateSecound[1]);
		alert(fieldDateSecound[2]);*/
		
		//var offer_valid_to1 = fieldDateSecound[0]+'-'+fieldDateSecound[1]+'-'+fieldDateSecound[2];
		//alert(offer_valid_to1);
		
		Date1.setFullYear(fieldDateFirst[2],fieldDateFirst[1],fieldDateFirst[0]);
		Date2.setFullYear(fieldDateSecound[2],fieldDateSecound[1],fieldDateSecound[0]);
    if (coupon == '') {
        $('#errormsg').addClass('errormsg').html('Please enter voucher code');
        $("#voucherCode").focus();
        return false;
    } else if (use == '') {
        $('#errormsg').addClass('errormsg').html('Please select type of use');
        $("[name=useType]:first").focus()
        return false;
    } else if (off == '') {
        $('#errormsg').addClass('errormsg').html('Please select type of off/-');
        $("[name=offType]:first").focus()
        return false;
    } else if (price == '') {
        $('#errormsg').addClass('errormsg').html('Please enter price/percentage');
        $("#offPrice").focus();
        return false;
    } else if (off == 'Price' && price!='' && validPri == false) {
        $('#errormsg').addClass('errormsg').html('Please enter valid price');
        $("#offPrice").focus();
        return false;
    } else if (off == 'Percentage' && price!='' && price >= 100) {
        $('#errormsg').addClass('errormsg').html('Please enter offer not more than 100%');
        $("#offPrice").focus();
        return false;
    }else if(isNaN(price) || price.charAt(0) == '0') {
		  
			$("#errormsg").addClass('errormsg').html("Please enter valid price/percentage");
			$("#offPrice").focus();
			return false;
    }else if (validFrom == '') {
        $('#errormsg').addClass('errormsg').html('Please select from date');
        $("#valid_from").focus();
        $("#valid_from").val();
        return false;
    } else if (validTo == '') {
        $('#errormsg').addClass('errormsg').html('Please select to date');
        $("#valid_to").focus();
        $("#valid_to").val();
        return false;
    } else if (Date1 > Date2){
        $("#errormsg").addClass('errormsg').html("Please select valid offer to Date");
        $("#valid_to").focus();
        $("#valid_to").val();
        return false;
        }else if (res == '') {
        $('#errormsg').addClass('errormsg').html('Please select any one restaurant from the list');
        $("#restaurantList").focus();
        return false;
    } else {
        if(type== '0') {
        	$.post("adminAjaxFile.php",{"coupon":coupon, 'action':'checkVoucherCode'},function (data) {
               if(data == '0' ) {
               		$("#errormsg").addClass('successmsg').html("Voucher Added Successfully");
			        $("[name=voucherAddEdit]").submit();
			        return false;
               } else {
               		$('#errormsg').addClass('errormsg').html('Voucher already exists');
			        $("#voucherCode").focus();
			        return false;
               }
            });  
        
        } else if(type== '1') {
	        $("#errormsg").addClass('successmsg').html("Voucher Edited Successfully");
	        $("[name=voucherAddEdit]").submit();
	        return false;
        }
    }
    return false;
}

//Get Site Country

function autoSuggestCountry(){

    
  /**   var country	= $("#site_country").val(); 
    
    //alert(country);
    $('#site_country').autocomplete({source:'adminAjaxFile.php?action=searchcountry&country='+country, minLength:1});
    //alert(data);
    $('#site_country').on('autocompleteselect', function (e, ui) {
      alert(  $('#site_country').html('You selected: ' + ui.item.value));
    }); **/
    var country	= $("#site_country").val();
    
    $("#site_country").autocomplete({source: "adminAjaxFile.php?action=searchcountry&country="+country ,minLength:1});

}    
    
//Get CountryShort Name   
 
function autoSuggestCountryShort(){   
 
        var country	= $("#site_country").val();	
        if(country == ''){
            
            alert('please select the country');
            return false;
        } else {
        
            //alert(country);
            $.post("adminAjaxFile.php",{"country":country, 'action':'searchcountryshort'},        
            function (data) {
                //alert(data); 
                $('#site_country_short').val(data);
                
            });
          
            
        } 
        return false;    
}   
//Get site Timezone   

function autoSuggestSitetimezone(){    
  
    
        
        var country= $("#site_country_short").val() ;
        //alert(country);
                
        if(country == ''){
            alert('please select the country');
            return false;
        } else {
        
                //var country=$("#site_country").val();
                //alert(country);
                $.post("adminAjaxFile.php",{"country":country, 'action':'searchsitezone'},        
                
                function (data) {
                        //alert(data); 
                        
                        $('#site_timezone').autocomplete({source:'adminAjaxFile.php?action=searchsitezonec&country='+country , minLength:1});
                        
                        $('#site_timezone').val(data);
                    
                        //$('#site_timezone').focus()
                    });
                
        
        } 
        return false;    

}    

//Get Currency Symbol    
function autocurrencysymbol()
{
   //var str=site_country.value;
        
     var currency = $('#site_country').val();
     
     if(currency == '') {
        alert('Please enter site country');
        return false;
     }  else {
            //alert(currency); 
            $.post("adminAjaxFile.php",{"currency":currency, 'action':'getCurrencySymbol'},        
            function (data) {
                //alert(data); 
                $('#currency_sym').val(data);
            });
      
     }
     return false;
      
}

function autoSuggestcity()
{
    var city=$('#site_city').val();
    $('#site_city').autocomplete({source :'adminAjaxFile.php?action=searchsitecity&city='+city,minLength:1});
}

function sitestate()
{
    var city=$('#site_city').val();
    //alert(city);
    if(city == '') {
        alert('Please enter site city');
        return false;
     }  else {
            //alert(currency); 
            $.post("adminAjaxFile.php",{"city":city, 'action':'getstate'},        
            function (data) {
                //alert(data); 
                $('#site_state').val(data);
            });
      
     }
     return false;
 
}
function autozipcode()
{
        var city=$('#site_city').val();
  
        //alert(currency); 
        //$.post("adminAjaxFile.php",{"city":city, 'action':'getzipcode'}, 
        $('#site_zipcode').autocomplete({source :'adminAjaxFile.php?action=getzipcode&city='+city,minLength:1});       

}

/* Sidebar Menu*/
$(document).ready(function () {

	sidebar();
	settings_toggle();	
  $('.nav > li > a').click(function(){
    //if ($(this).attr('class') != 'active'){
     // $('.nav li ul').slideUp();
      $(this).next().slideToggle();
      $('.nav li a').removeClass('active');
      $(this).addClass('active');
    //}
  });

  /*Middle content*/

 $(".content").css("min-height", $(document).height());

/* ****** Nice Scroll ****** */
 $("html").niceScroll({  autohidemode: 'false',cursorcolor:"#1B5E99",cursorwidth:"10px", boxzoom:true,});


   $('.sidebar-open-button').on('click', function(){

   		
	    
	        if($('.sidebar').hasClass('hidden')){
	            $('.sidebar').removeClass('hidden');
	            $('.content').css({
	                'marginLeft' : 250
	            });  
	        }
	        else{
	            $('.sidebar').addClass('hidden');
	            $('.content').css({
	                'marginLeft' : 0
	            });    
	        }
    	
    });

   $('.setting_button').on('click', function(){

   		
	    
	        if($('.settings_tab').hasClass('hidden')){
	            $('.settings_tab').removeClass('hidden');
	             
	        }
	        else{
	            $('.settings_tab').addClass('hidden');
	               
	        }
	    
    	
    });



});

$(window).resize(function(){
	sidebar();
	settings_toggle();

});

function sidebar()
{
        var win_width=$(window).width();
        if(win_width < 980){
	        $('.sidebar').addClass('hidden');
	            $('.content').css({
	                'marginLeft' : 0
	            });	
	        } 
	        else{
            $('.sidebar').removeClass('hidden');
            $('.content').css({
                'marginLeft' : 250
            });    
        } 	
}

function settings_toggle()
{
        var win_width=$(window).width();
        if(win_width < 768){
	        $('.settings_tab').addClass('hidden');	       
	        } 
	        else{
            $('.settings_tab').removeClass('hidden');              
        	} 	
}


