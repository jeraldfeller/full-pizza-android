//text box check value script word is there or not
$("input[type=text],textarea").keyup(function(){
    var output = $(this).val();
    //alert(output);
    if(output.toLowerCase().match(/script/)) {
        $(this).val('');
	    alert("Please Avoid java script related codes");    
	}
});	

//---------------------------------------------------------------------------------------------//
//Jquery works Start***************************************************************************//
//---------------------------------------------------------------------------------------------// 
$(document).ready(function(){
	$(".setting_slide").click(function(){
		$("#managementslide").animate({marginLeft:"-"+100+"%"},2500);
	});
	$(".manage_slide").click(function(){
		$("#managementslide").animate({marginLeft:"-"+0+"%"},2500);
	});
	//$('#loadingimg').html('');
	//Initialize a cookie
	var date = new Date();
	date.setTime(date.getTime() + (10 * 60 * 1000));
	
	
	//..................................................................................
	//Settings Tab
	/*$(".settingTabs a").click(function() { //When click open tab
		
		$(".settingTabs a").removeClass("active");
		$(".settingTabsContent").hide();
		
		$(this).addClass("active"); 
		var activeTab = $(this).attr("id");
		$('#'+activeTab+'_content').show();
		
		
		//Google Map
		if(activeTab == 'setting6_tab'){
			
			var reslattitude 	= $('#reslattitude').val();
			var reslongtitude 	= $('#reslongtitude').val();
			resMyaccGmap(reslattitude,reslongtitude);
		}
    });*/
	
	// Restaurant Owner My Account Left tab starts
	$(".leftTab li a").click(function() { //When click open tab
		
		$(".leftTab li a").removeClass("active");
		$(".leftTabContent").hide();
		
		$(this).addClass("active"); 
		var activeTab = $(this).attr("id");
		$('#'+activeTab+'_content').show();
	});
	// Restaurant Owner My Account Middle tab starts
	$(".midTab li a").click(function() { //When click open tab
		
		$(".midTab li a").removeClass("active");
		$(".midTabContent").hide();
		
		$(this).addClass("active"); 
		var activeTab = $(this).attr("id");
		$('#'+activeTab+'_content').show();
	});
	
});

//------------------------------------
//Restaurant banner option
$(document).ready(function(){
		
	$("#restaurant_banner_img").click(function() { 
		
		$("#marketbannerimageOpt").show();
		$("#marketbannercodeOpt").hide();
	});
	
	$("#restaurant_banner_code").click(function() { 
		var id = $(this).attr('id');
		$(".codeid").val(id);
		
		$("#marketbannerimageOpt").hide();
		$("#marketbannercodeOpt").show();
	});
	
});	
//---------------------------------------------------------------------------------------------//
//Jquery works End****************************************************************************//
//---------------------------------------------------------------------------------------------//

//---------------------------------------------------------------------------------------------//
//Myaccount - Dashboard Tab Start
//---------------------------------------------------------------------------------------------//
//View more for order
function dashboardSortbyStatus(change,from){
    if(change != 'All'){
        changeSortbyStatus(change,from);
    }
    $("#ordtab").trigger('click');
}
	//View More	
	function viewmoreOrderdisplay(){
			$(".myAccntMenuUl li a").removeClass("active");
			$(".ownerTabContent").hide();
			
			$('#owner_order').addClass("active"); 
			
			$('#loadingimg').html('<div style="text-align:center;min-height:500px;"><img src="'+jssitebaseUrl +'/images/loader.gif" border="0" alt="Loading" /></div>').show();
			setTimeout(function(){
				 $("#loadingimg").hide(); 
				 $("#orderstatusChange").hide();
				 $('#owner_order_content').show();
			}, 200);
	}
	//Clcik addd new Menu
	function showAddNewmenu(){
		
		$(".myAccntMenuUl li a").removeClass("active");
		$(".ownerTabContent").hide();
		$("#owner_menu").addClass("active"); 
		$("#owner_dash_content").hide();
		$("#menuEdit").hide();
		$(".restaurantMenuContent").hide();
		$("#owner_menu_content").show();
		$("#menuAddNew").show();
	}
	//-----------------------------------
	//Print Report 
	function showPrintReport(){
		
		$(".myAccntMenuUl li a").removeClass("active");
		$(".ownerTabContent").hide();
		$("#owner_report").addClass("active"); 
		$("#owner_dash_content").hide();
		$("#owner_report_content").show();
		$(".restaurantReportContent").show();
	}
	//-----------------------------------
	//Latest Orders
	function latestOrder(){
		
		$(".myAccntMenuUl li a").removeClass("active");
		$(".ownerTabContent").hide();
		$("#owner_order").addClass("active"); 
		$("#owner_order_content").hide();
		$("#owner_order_content").show();
		$(".restaurantOrderContent").show();
        $(".restaurantBookingsContent").show();
	}
//---------------------------------------------------------------------------------------------//
//Myaccount - Dashboard Tab End
//---------------------------------------------------------------------------------------------//

//---------------------------------------------------------------------------------------------//
//Myaccount - Orders Tab Start
//---------------------------------------------------------------------------------------------//
//Restaurant order change to disclaim
function disclaimOrder(orderStatus,id,ordid){
//	alert(orderStatus);
	if(orderStatus == 'processing'){
		changeOrderStatus("processing",ordid);
	}else if(orderStatus == 'testing'){
		changeOrderStatus("testing",ordid);
	}else if(orderStatus == 'failed'){
		$("#"+id).show();
	}else if(orderStatus == 'pending'){
		$("#"+id).hide();
	}
}
	//Restaurant Order Status
	function changeOrderStatus(val,orderid){
		
        var err_lang_arr = error_language();
        
		var reason = $("#reason"+orderid).val();
		if(val == 'failed'){
			if(reason == ''){
			     
                alert(err_lang_arr['Please_enter_the_reason']); 
				//alert("Please enter the reason for disclaim order");
                //$("#error").parent().parent().addClass("has-error");
				return false;
			}	
		}
		$('#ordstatustd'+orderid).html('<img src="'+jssitebaseUrl +'/theme/default/images/load.gif" border="0" alt="Loading" />').show();
		$(".restaurantOrderContent").load(jssitebaseUrl+"/ajaxActionRestaurant.php", {'action':'Orderstatus','val':val ,'orderid':orderid, 'reason':reason} );
        var filename = $(location).attr('href');
                //alert(filename); return false;
        $('body').load(filename);	
	}
 //Restaurant Book a table change to disclaim
    function bookstatus(orderStatus,id,ordid){
        
        //alert(orderStatus);
        //alert(id);
        //alert(ordid);
	
	if(orderStatus == 'accept'){
	   //alert('hi');
		changebookOrderStatus("accept",ordid);
	}else if(orderStatus == 'reject'){
		$("#"+id).show();
	}
}
	//Restaurant Order Status
	function changebookOrderStatus(val,orderid){
	   
        //alert(val);
        //alert(orderid);
		
        var err_lang_arr = error_language();
        
		var reason = $("#reason"+orderid).val();
		if(val == 'reject'){
			if(reason == ''){
			     
                alert(err_lang_arr['Please_enter_the_reason']); 
				//alert("Please enter the reason for disclaim order");
                //$("#error").parent().parent().addClass("has-error");
				return false;
			}	
		}
		$('#bokstatustd'+orderid).html('<img src="'+jssitebaseUrl +'/theme/default/images/load.gif" border="0" alt="Loading" />').show();
		$(".restaurantBookingsContent").load(jssitebaseUrl+"/ajaxActionRestaurant.php", {'action':'booktable','val':val,'orderid':orderid, 'reason':reason} );	
	}
    
  
    
	//Restaurant Invoice Status
	function changeInvoiceStatus(val,invoiceid){
		
		$(".restaurantInvoiceContent").load(jssitebaseUrl+"/ajaxActionRestaurant.php", {'action':'Invoice', 'val':val ,'invoiceid':invoiceid } );	
	}
	//Order View Full details
	function orderViewFullDetails(orderid){
		
		//myPopupWindowOpen('#orderViewFullDetailsPop','#maska');
        $('#msg').hide();
		$('.pagination').hide();
		$('.ownerStaticContainer').hide();
		$('#rest_myorder').hide();
		$('#rest_fullorder').show();
		$('#rest_fullorder').html('<div class="addtocartloading"><span class="image"><img src="'+jssitebaseUrl +'/theme/default/images/loader.gif" border="0" alt="Loading" /></span><span>Please wait...</span></div>').show();
		$("#rest_fullorder").load(jssitebaseUrl+"/ajaxActionRestaurant.php",{'action':'orderFullDetails','orderid':orderid});
	
		//Form
		//$('#orderFullDetailsList').html('<div class="addtocartloading"><span class="image"><img src="'+jssitebaseUrl +'/images/loader.gif" border="0" alt="Loading" /></span><span>Please wait...</span></div>').show();
		//$("#orderFullDetailsList").load(jssitebaseUrl+"/ajaxActionRestaurant.php?action=orderFullDetails&orderid="+orderid);
	}
	
function print(){
	var win=window.open('about:blank');
    with(win.document)
    {
      open();
      
      write($("head").html());
      write('<body onload="document.body.offsetHeight;window.print();">');
      write('<div class="ordersInnerWrap">');
      $("div.addtocartPopupHead").hide();
      $("a.pdf").hide();
      $("a.print").hide();
      $("a.backHistTxt").hide();
      //$("#printpage").show();
      $("#logoimg").show();
      
      write($("#rest_fullorder").html());
      write('</div>');
      write('</body>');
      
      $("#logoimg").hide();
      $("a.pdf").show();
      $("a.print").show();
      $("#printpage").hide();
      $("div.addtocartPopupHead").show();
      $("a.backHistTxt").show();
	  close();
    }
}
//---------------------------------------------------------------------------------------------//
//Myaccount - Report Tab Start
//---------------------------------------------------------------------------------------------//

//---------------------------------------------------------------------------------------------//
//Myaccount - Category Tab Start
//---------------------------------------------------------------------------------------------//
	//Restaurant Owner Myaccount Category add new 
	function clickAddnewCategory(){
		$("#categoryAddNew").show();
		$("#categoryEdit").hide();
		//$("#categoryAddnew_buttun").hide();
		$(".restaurantCategoryContent").hide();
	}
	//Back to Category Tab
	function backToCategoryTab(){
		
		//$("#categoryAddnew_buttun").show();
		$("#categoryAddNew").hide();
		$("#categoryEdit").hide();
		
		$(".restaurantCategoryContent").show();
	}
	//--------------------------------------- MainCategory -----------------------------------------------
	//Category addnew Validation
	function validateCategoryNew()
	{
		//Error Language
		var err_lang_arr 	   = error_language();
		
		var maincatename       = $.trim($("#maincatename").val());
		//alert(maincatename); return false;
		if(document.getElementById("maincat_option_normal").checked == true){
			var cateoption 	= $.trim($("#maincat_option_normal").val());
		}else if(document.getElementById("maincat_option_pizza").checked == true){
			var cateoption 	= $.trim($("#maincat_option_pizza").val());
		}
        
        var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
		
		if(maincatename == ''){
			$("#errormsgCategory").addClass('ownerErr').html(err_lang_arr['res_owner_categorynew_name']);
			$("#maincatename").focus();
			return false;
		}
		else if(maincatename != ''){
			$('#restcategoryAddEdit').prop("disabled",true);
			$.post(jssitebaseUrl+useFile,{"maincatename":maincatename,"cateoption":cateoption,"action":"checkCategoryExist"},function(response){
				
				if($.trim(response) == "exist"){
					$('#restcategoryAddEdit').prop("disabled",false);
					$("#errormsgCategory").addClass('ownerErr').html(err_lang_arr['res_owner_categorynew_exist']);
					$("#maincatename").focus();
					return false;
				}else{
				     $("#errormsgCategory").addClass('succmsg ownerErr').html(err_lang_arr['res_owner_categorynew_adsucess']);
                    setTimeout(function(){
					   document.categoryAddEdit.submit();
                       $(".myaccsubmitbtn").prop("disabled",true);  
                        $('.myaccsubmitbtn').removeAttr('disabled');
                    },2000);
				    
				}
			});
			return false;
		} 
		//return false;
	}
 
	
	//Category Edit Validation
	function validateCategoryEdit()
	{
		//Error Language
		var err_lang_arr = error_language();
		
		var catid  = $("#catid").val();
		var maincatename  = $.trim($("#maincatename").val());
		
		if(document.getElementById("maincat_option_normal").checked == true){
			var cateoption 	= $.trim($("#maincat_option_normal").val());
		}else if(document.getElementById("maincat_option_pizza").checked == true){
			var cateoption 	= $.trim($("#maincat_option_pizza").val());
		}
        
        var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
		
		if(maincatename == ''){
			$("#errormsgCategory").addClass('ownerErr').html(err_lang_arr['res_owner_category_name']);
			$("#maincatename").focus();
			return false;
		}
		else if(maincatename != ''){
			$.post(jssitebaseUrl+useFile,{"catid":catid, "maincatename":maincatename, "cateoption":cateoption, "action":"checkCategoryExist"},function(response){
				//alert(response);
				if($.trim(response) == "exist"){
					$("#errormsgCategory").addClass('ownerErr').html(err_lang_arr['res_owner_category_exist']);
					$("#maincatename").focus();
					return false;
				}else{
				    $("#errormsgCategory").addClass('succmsg ownerErr').html(err_lang_arr['res_owner_category_upsucess']);
                    setTimeout(function(){
					   document.categoryAddEdit.submit();
                    },2000);
				}
			});
			return false;
		}
		return false;
	}
	
	

//---------------------------------------------------------------------------------------------//
//Myaccount - Menu Tab Start
//---------------------------------------------------------------------------------------------//
	//Click on Add New Button in Menu
	function clickAddnewMenu(){
		
		$("#menuAddNew").show();
		//$(".categorydropList").load(jssitebaseUrl+"/ajaxActionRestaurant.php?action=categoryDropList");
		$("#menuEdit").hide();
		//$("#addnew_buttun").hide();
		$(".restaurantMenuContent").hide();
	}
	//Back to Menu Tab
	function backToMenuTab(){
		window.location.reload(); return false;
		$("#menuAddNew").hide();
		$("#menuEdit").hide();
		//$("#addnew_buttun").show();
		$(".restaurantMenuContent").show();
	}
//Edit (Click Edit option)
function menuEdit1(menuid){
	
	$("#menuAddNew").hide();
	$(".restaurantMenuContent").hide();
	//$("#addnew_buttun").hide();
	$("#menuEdit").show();
	$(".menu_id").val(menuid);
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
	
	$.post(jssitebaseUrl+useFile,{"menuid":menuid, "action":"editMenuOption"},function(output){
		//alert(output);
		var answer_info = output.split("^^");
		//alert(answer_info);
		
		$(".menu_name").val(answer_info[0]);
		
		$(".menu_categoryedit").val(answer_info[1]);
		$(".categorydropListEdit").load(jssitebaseUrl+"/ajaxActionRestaurant.php",{'action':'categoryDropListEdit','catval':answer_info[1]});
		$(".menu_type_"+answer_info[2]).attr('checked',true);
		$(".menu_cuisine").val(answer_info[3]);
		//$(".menu_price").val(answer_info[4]);
		$(".menu_addons_"+answer_info[5]).attr('checked',true);
		$(".menu_spl_ins_"+answer_info[6]).attr('checked',true);
		$(".menu_description").val(answer_info[7]);
		$("#menu_popular_dish_"+answer_info[16]).attr('checked',true);
		$("#menu_spicy_"+answer_info[17]).attr('checked',true);
		
		if(answer_info[8] != ''){
			$('#menu_photo_show').html('<img src="'+jssitebaseUrl +'/photo_menu/'+answer_info[8]+'" border="0" alt="Menu photo" />').show();
		}
		
		$(".pizza_size_small_"+answer_info[9]).attr('checked',true);
		$(".pizza_size_small_value").val(answer_info[10]);
		$(".pizza_size_medium_"+answer_info[11]).attr('checked',true);
		$(".pizza_size_medium_value").val(answer_info[12]);
		$(".pizza_size_large_"+answer_info[13]).attr('checked',true);
		$(".pizza_size_large_value").val(answer_info[14]);
		
		if(answer_info[5] == 'Yes'){
			$("#showcataddonsList1").show();
			$("#restaurantMenuAddons").load(jssitebaseUrl+"/ajaxActionRestaurant.php?action=menuAddons&menuid="+menuid+"&catid="+answer_info[1]);
		}else{
			$("#showcataddonsList1").hide();
		}
		
		$("#menupricedet").load(jssitebaseUrl+"/ajaxActionRestaurant.php?action=menuPriceDetails&menuid="+menuid);
		
		/*if(answer_info[15] == 'pizza'){
			//$("#showcataddonsList1").hide();
			$("#pizzaprice_menu_edit").hide();
			//$("#addonsoption_edit").hide();
			//$("#showcatPizzaAddonsList1").show();
			//$("#restaurantPizzaAddons").load(jssitebaseUrl+"/ajaxActionRestaurant.php?action=pizzaAddons&menuid="+menuid+"&catid="+answer_info[1]);
			
			if(answer_info[5] == 'Yes'){
				$("#showcataddonsList1").show();
				$("#restaurantMenuAddons").load(jssitebaseUrl+"/ajaxActionRestaurant.php?action=menuAddons&menuid="+menuid+"&catid="+answer_info[1]);
			}else{
				$("#showcataddonsList1").hide();
			}
		}else{
			$("#showcatPizzaAddonsList1").hide();
			$("#addonsoption_edit").show();
			if(answer_info[5] == 'Yes'){
				$("#showcataddonsList1").show();
				$("#restaurantMenuAddons").load(jssitebaseUrl+"/ajaxActionRestaurant.php?action=menuAddons&menuid="+menuid+"&catid="+answer_info[1]);
			}else{
				$("#showcataddonsList1").hide();
			}
		}*/
		
	});
	
	
	
}

function showAddons1(){
	document.getElementById("showcataddonsList1").style.display = "none";
    document.getElementById("menusize_option").style.display = "block";
}


var special_row1=0;
function addMoreMenuAddonsedit(totrow1) {
	//alert("totrow");
	if(totrow1!=undefined && special_row1 == 0){
		special_row1 = totrow1;
	}
	
	html  = '<tbody id="special_row1' + special_row1 + '">';
	html += '<tr height="35">'; 
	html += '<td class="left" width="32%"><input type="text" name="moreaddons['+special_row1+'][menuaddonsname]" id="menuaddonsname['+special_row1+']"/>&nbsp;<input type="radio" name="moreaddons['+special_row1+'][menuaddons_priceoption]" value="Free" checked="checked" onclick="moreaddonsfreeoptionedit('+special_row1+');"/>&nbsp;Free</td><td width="40%"><input type="radio" name="moreaddons['+special_row1+'][menuaddons_priceoption]" value="Paid" onclick="moreaddonspaidoptionedit('+special_row1+');"/>&nbsp;Paid &nbsp;<span id="showpriceedit_'+special_row1+'" style="display:none;"> Price : <input type="text" name="moreaddons['+special_row1+'][menuaddons_price]" id="addonsprice" value="" /></span></td>';
	
	html += '<td class="left1" width="9%"><a onclick="$(\'#special_row1' + special_row1 + '\').remove();" style="color:#ff0000;cursor:pointer;"><span>Remove</span></a></td>';
	html += '</tr>';
	html += '</tbody>';
	$('#specialedit tfoot').before(html);
	special_row1++;
	
}
function addonsfreeoptionedit(aid){
	$("#showprice1_"+aid).hide();
}
function addonspaidoptionedit(aid){
    
	$("#showprice1_"+aid).show();
}
function moreaddonsfreeoptionedit(aid){
	$("#showpriceedit_"+aid).hide();
}
function moreaddonspaidoptionedit(aid){
	$("#showpriceedit_"+aid).show();
}
//--------------------------------------------------------------------------------------------//
//Menu Validation 
function restaurantMenuEditValidate(){
    
    //Error Language
	var err_lang_arr = error_language();
    
    
    var menu_name 	   	 	= $.trim($("#menu_name").val());
    var menu_cuisine   	 	= $.trim($("#menu_cuisine").val());
	var menu_category  	 	= $.trim($("#menu_category").val());
	var menu_catothers 	 	= $.trim($("#menu_catothers").val());
	var menu_description 	= $.trim($("#menu_description").val());
	var nameRegex 	 	 = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
	var regexp1 		    = new RegExp("^[0-9]{0,8}([\.][0-9]{1,2})?$");
	
	var eid    = $("#menu_id").val();
	var restid = $("#restaurant_name").val();
    var cateid = $("#categoryid").val();
    
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
    
    if(menu_name == ''){
		$("#errormsg").addClass('errormsg').html(err_lang_arr['res_owner_menuedit_name']);
		$("#menu_name").focus();
		return false;		
	}
    var menu_type 	= $.trim($("input[name=menu_type]:checked").val()); 
    if (menu_type == '') {
        $("#errormsg").addClass('errormsg').html(err_lang_arr['res_owner_menuedit_type']);
		document.res_menuedit.menu_type[0].focus();
		return false;
    }
    
    
    var menu_addons = $.trim($("input[name=menu_addons]:checked").val());
    var menu_price  = $.trim($("#menu_price").val());
   
    
    if(menu_category == ''){
		$("#errormsg").addClass('errormsg').html(err_lang_arr['res_owner_menuedit_category']);
		$("#menu_category").focus();
		return false;		
	}
    
    if(menu_category == 'other'){
        
		if(menu_catothers == ''){
			$("#errormsg").addClass('errormsg').html(err_lang_arr['res_owner_menuedit_catothers']);
			$("#menu_catothers").focus();
			return false;	
		}else if(menu_catothers != ""){
		  
			$.post(jssitebaseUrl+useFile,{"menu_catothers":menu_catothers,"action":"checkMenuCategoryOthers"},function(response){
				
				if($.trim(response) == "exist"){
					$("#errormsgedit").addClass('errormsg').html(err_lang_arr['res_owner_menuedit_catexist']);
					$("#menu_catothers1").focus();
					return false;
				}else if(menu_name != "" && menu_category != "" ){
				    $.post(jssitebaseUrl+useFile,{"eid":eid, "restid":restid, "menu_name":menu_name, "menu_category":menu_category, "menu_type":menu_type,"action":"checkMenuName"},function(response){
					   //alert(response);return false;
    					if($.trim(response) == "exist"){
    						$("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_menuname_alr_exist']);
						    $("#menu_name").focus();
						    return false;
    					} else {
                            
                            var sizeoption = $.trim($("input[name=sizeoption]:checked").val());
                            
                            
                            if(sizeoption == ''){
                                $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_menu_price']);
                                return false;
                            }else if(sizeoption == 'fixed'){
                                $("#sizeoption_fixedprice").attr("checked",true);
                                $(".showAjaxsizeoption").show();
                                $("#fixedOption").show();
                                $("#pizzaDefaultOption").hide();
                                $("#pizzaOtherOption").hide();
                                if(menu_price == ''){
            						$("#errormsg").addClass('errormsg').html(err_lang_arr['resmycc_please_enter_menuprice']);
            						$("#menu_price").focus();
            						return false;		
            					} else if((isNaN(menu_price)) || (menu_price == 0)){
            					    //alert("Hai");
            					    $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
            						$("#menu_price").focus();
            						return false;
            					} else if( menu_price < 0 ){
            					   //alert("Bye");
                                    $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
                                    $("#menu_price").select();
                                    return false;
                				}
                            }else if(sizeoption == 'default'){
                                if(document.getElementById("small").checked == true){ var small  = $.trim($("#small").val()); }
        						else if(document.getElementById("medium").checked == true){ var medium  = $.trim($("#medium").val()); }
        						else if(document.getElementById("large").checked == true){ var large  = $.trim($("#large").val());	}
        						else{ $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_menu_size']); return false; }
                                //Small
        						if(document.getElementById("small").checked == true){
        							var smallval   = $.trim($("#smallval").val());
        							if(smallval == ""){ 
                                        $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_ent_smal_men_size']); 
                                        $("#smallval").focus();
                                        return false; 
                                    } else if(isNaN(smallval) || !regexp1.test(smallval) || smallval == 0){
                					    $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
                						$("#smallval").select();
                						return false;
                					} else if( smallval < 0 ){
                                        $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
                                        $("#menu_price").select();
                                        return false;
                				}
        						}
                                //Medium
        						if(document.getElementById("medium").checked == true){
        							var mediumval   = $.trim($("#mediumval").val());
        							if(mediumval == ""){
                                        $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_ent_med_men_size']); 
                                        $("#mediumval").focus();
                                        return false; 
                                    } else if(isNaN(mediumval) || !regexp1.test(mediumval)  || mediumval == 0){
                					    $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
                						$("#mediumval").select();
                						return false;
                					} else if( mediumval < 0 ){
                                        $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
                                        $("#menu_price").select();
                                        return false;
                				    }
        						}
                                //Large
        						if(document.getElementById("large").checked == true){
        							var largeval   = $.trim($("#largeval").val());
        							if(largeval == ""){
                                        $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_ent_lar_men_size']); 
                                        $("#largeval").focus();
                                        return false; 
                                    } else if(isNaN(largeval) || !regexp1.test(largeval) || largeval == 0){
                					    $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
                						$("#largeval").select();
                						return false;
                					} else if( largeval < 0 ){
                                        $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
                                        $("#menu_price").select();
                                        return false;
                				    }
        						}
                            }
                            if(sizeoption == 'other'){
                                if($(document).find(".slicevalidate:visible").length > 0){
                                    var i = $(".slicevalidate:visible").length;
                                    $(".slicevalidate:visible").each(function(){
                                       if($(this).val() == ''){
                                        $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_ent_sli_nam_size']).show();
                                        $(this).focus();
                                        return false;
                                       }
                                       if(i%2 != 0){
                                        if(isNaN($(this).val()) || $(this).val() == '0.00' || $(this).val() == 0){
                                            $("#errormsg").addClass('errormsg').html(err_lang_arr['resmycc_plz_ent_valid_price2']).show(); 
                                            $(this).select();
                                            return false;
                                        } else if($(this).val() < 0 ){
                                            $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
                                            $("#menu_price").select();
                                            return false;
                				        }
                                       }
                                       i--;
                                       if(i == 0){
                                        $("#errormsg").addClass('succmsg').html(err_lang_arr['resmyccount_menu_updat_success']).show(); 
                                        //setTimeout(function(){
                                            document.res_menuadd.submit();
                                            return false;
                                        //},2000);
                                        
                                       }
                                    });
                                }else{
                                    $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_add_atl_one_slice']).show(); 
                                    return false;
                                }
                            }else{
                                $("#errormsg").addClass('succmsg').html(err_lang_arr['resmyccount_menu_updat_success']).show(); 
                                //setTimeout(function(){
                                    document.res_menuadd.submit();
                                    return false;
                                //},2000);
                							
                			}
                            
                        }
    				});
				return false;
                } 
			});
            return false;
		}	
	}	
    
    if(menu_name != "" && menu_category != "" ){
        

		$.post(jssitebaseUrl+useFile,{"restid":restid, "menu_name":menu_name, "menu_category":menu_category, "menu_type":menu_type,"action":"checkMenuName"},function(response){
			
			if($.trim(response) == "exist"){
				$("#errormsg").addClass('errormsgNew errorContain').html(err_lang_arr['resmyccount_menuname_alr_exist']);
				$("#menu_name").focus();
				return false;
			} else {
                
                var sizeoption = $.trim($("input[name=sizeoption]:checked").val());
                
                if(sizeoption == ''){
                    $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_menu_price']);
                    return false;
                }else if(sizeoption == 'fixed'){
                    $("#sizeoption_fixedprice").attr("checked",true);
                    $(".showAjaxsizeoption").show();
                    $("#fixedOption").show();
                    $("#pizzaDefaultOption").hide();
                    $("#pizzaOtherOption").hide();
                    if(menu_price == ''){
						$("#errormsg").addClass('errormsg').html(err_lang_arr['resmycc_please_enter_menuprice']);
						$("#menu_price").focus();
						return false;		
					} else if(isNaN(menu_price) || !regexp1.test(menu_price)|| menu_price == '0'){
					    $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
						$("#menu_price").select();
						return false;
					} else if( menu_price < 0 ){
					   $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
					   $("#menu_price").select();
                       return false;
                	}
                }else if(sizeoption == 'default'){
                    if(document.getElementById("small").checked == true){ var small  = $.trim($("#small").val()); }
					else if(document.getElementById("medium").checked == true){ var medium  = $.trim($("#medium").val()); }
					else if(document.getElementById("large").checked == true){ var large  = $.trim($("#large").val());	}
					else{ $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_menu_size']); return false; }
                    //Small
					if(document.getElementById("small").checked == true){
						var smallval   = $.trim($("#smallval").val());
						if(smallval == ""){ 
                            $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_ent_smal_men_size']); 
                            $("#smallval").focus();
                            return false; 
                        } else if(isNaN(smallval) || !regexp1.test(smallval) || smallval == '0'){
                            $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
                            $("#smallval").select();
                            return false;
    					} else if( smallval < 0 ){
                            $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
                            $("#menu_price").select();
                            return false;
                		}
					}
                    //Medium
					if(document.getElementById("medium").checked == true){
						var mediumval   = $.trim($("#mediumval").val());
						if(mediumval == ""){ 
                            $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_ent_med_men_size']); 
                            $("#mediumval").focus();
                            return false; 
                        } else if(isNaN(mediumval) || !regexp1.test(mediumval) || mediumval == '0'){
    					    $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
    						$("#mediumval").select();
    						return false;
    					} else if( mediumval < 0 ){
                            $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
                            $("#menu_price").select();
                            return false;
                		}
					}
                    //Large
					if(document.getElementById("large").checked == true){
						var largeval   = $.trim($("#largeval").val());
						if(largeval == ""){
                            $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_ent_lar_men_size']); 
                            return false; 
                        } else if(isNaN(largeval) || !regexp1.test(largeval) || largeval == '0'){
    					    $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
    						$("#largeval").select();
    						return false;
    					} else if( largeval < 0 ){
                            $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
                            $("#menu_price").select();
                            return false;
                		}
					}
                }
                if(sizeoption == 'other'){
                    if($(document).find(".slicevalidate:visible").length > 0){
                        var i = $(".slicevalidate:visible").length;
                        $(".slicevalidate:visible").each(function(){
                           if($(this).val() == ''){
                            $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_ent_sli_nam_size']).show(); 
                            $(this).focus();
                            return false;
                           }
                           if(i%2 != 0){
                            if(isNaN($(this).val()) || $(this).val() == '0.00' || $(this).val() == '0'){
                                $("#errormsg").addClass('errormsg').html(err_lang_arr['resmycc_plz_ent_valid__price1']).show(); 
                                $(this).select();
                                return false;
                            } else if($(this).val() < 0 ){
                                $("#errormsg").addClass('errormsg').html(err_lang_arr['resmycc_plz_ent_valid__price1']);
                                $("#menu_price").select();
                                return false;
                				}
                           }
                           i--;
                           if(i == 0){
                            $("#errormsg").addClass('succmsg').html(err_lang_arr['resmyccount_menu_updat_success']).show(); 
                            //setTimeout(function(){
                                document.res_menuadd.submit();
                                return false;
                            //},2000);
                            
                           }
                        });
                    }else{
                        $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_add_atl_one_slice']).show(); 
                        return false;
                    }
                }else{
    				$("#errormsg").addClass('succmsg').html(err_lang_arr['resmyccount_menu_updat_success']).show(); 
                    //setTimeout(function(){
                        document.res_menuadd.submit();
                        return false;
                    //},2000);			
    			}
            }
		});
        return false;
	}
}
//----------------------------------------------------------------------------------------//

//-------------------------------------------------------------------------------//
function otherSpecify(option){
	if(option=="category"){
		if(document.getElementById("categoryOther").selected){
			document.getElementById("catoters").style.display = "block";
		}else {
			document.getElementById("catoters").style.display = "none";
			$("#menu_catothers").val('');
		}
		return false;
	}
}
function otherSpecifyEdit(option){
    
	if(option=="category"){
		if(document.getElementById("categoryOtherEdit").selected){
			document.getElementById("catotersEdit").style.display = "block";
		}else {
			document.getElementById("catotersEdit").style.display = "none";
			$("#menu_catothers").val('');
		}
		return false;
	}
}
function showAddonsnew(){
	document.getElementById("showcataddonsList").style.display = "none";
    document.getElementById("menusize_option_add").style.display = "block";
}
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
function moreaddonsfreeoption(aid){
	$("#showprice1_"+aid).hide();
}
function moreaddonspaidoption(aid){
	$("#showprice1_"+aid).show();
}
function addonsfreeoption(aid){
    var priceoption = $("input[name=sizeoption]:visible:checked").val();
    if(priceoption == 'fixed'){
        var option = 'fixed';
    }else if(priceoption == 'default'){
        var option = 'size';
    }else if(priceoption == 'other'){
        var option = 'slice';
    }
    if(option == 'slice'){
        $(".showprice_"+aid+"_"+option).hide();
        $("#showprice_"+aid+"_"+option).hide();
    }else{
        $("#showprice_"+aid+"_"+option).hide();
    }
	//var option = $("#selectoptions").val();
    //alert("optionval--->"+option);
	//$("#showprice_"+aid+"_"+option).hide();
}
function addonspaidoption(aid){
	//$("#showprice_"+aid).show();
    $("#addonspricefreepaid_"+aid).show();
    var priceoption = $("input[name=sizeoption]:visible:checked").val();
    if(priceoption == 'fixed'){
        var option = 'fixed';
    }else if(priceoption == 'default'){
        var option = 'size';
    }else if(priceoption == 'other'){
        var option = 'slice';
    }
    //var option = $("#selectoptions").val();
    //alert("optionval--->"+option);
			
	var fixed_ajax	=	$('#sizeoption_fixedprice').is(":checked"); 
	var size_ajax	=	$('#sizeoption_default').is(":checked"); 
	var slice_ajax	=	$('#sizeoption_other').is(":checked"); 
	
	if(slice_ajax == false && fixed_ajax == true){
		$("#showprice_"+aid+"_"+option).show();	
	}else if(slice_ajax == false && size_ajax == true){
		$("#showprice_"+aid+"_"+option).show();
	}else if(slice_ajax == true){		
		$(".showprice_fixed").hide();
		$(".showprice_size").hide();	
		$("#showprice_"+aid+"_slice").show();
	}	
}
//------------------------------------------------------------------------------------------------//
function addonspaidoption_ajax(aid){
    
    var option = $("#selectoptions").val();
    
    var cntSliceAddons_createsub1 = $("#cntSliceAddons_createsub1").val();
    //alert(cntSliceAddons_createsub1);
    
	var chk_val		=	$("#sizeoption_addmoreaddonedit_ajax").val();
    
    
    var priceoption = $.trim($("input[name=sizeoption]:checked").val());
    
    if(priceoption == ''){
        alert("Please Select price options");
        $("#free").attr('checked',true);
        $("#paid").attr('checked',false);
        return false;
    }else if(priceoption == 'other'){
        $("#showprice_"+aid+"_slice").show();
        $(".showprice_"+aid+"_slice").show();
    }else if(priceoption == 'default'){
        $("#showprice_"+aid+"_size").show();
    }else if(priceoption == 'fixed'){
        $("#showprice_"+aid+"_fixed").show();
    }
	return false;
    
    
	var fixed_ajax	=	$('#sizeoption_fixedprice2').is(":checked"); 
	var size_ajax	=	$('#sizeoption_default2').is(":checked"); 
	var slice_ajax	=	$('#sizeoption_other2').is(":checked"); 
    
    if( slice_ajax == false && fixed_ajax == false && size_ajax == false ){
        alert("Please Select price options");
        $("#free").attr('checked',true);
        $("#paid").attr('checked',false);
        return false;
    }
    else if(slice_ajax == true){
        if(cntSliceAddons_createsub1 == ''){
            alert("Please select add more slice options");
            $(".free").attr('checked',true);
            $(".paid").attr('checked',false);
            return false;
        }else{
            $(".showprice_"+aid+"_slice").show();
        }
    }
    else{
        if(slice_ajax == false && fixed_ajax == true){
    		//$("#showprice_"+aid).hide();
    		$("#showprice_"+aid+"_"+option).show();	
    	}else if(slice_ajax == false && size_ajax == true){
    		//$("#showprice_"+aid).hide();
    		$("#showprice_"+aid+"_"+option).show();
    	}else{
    		$("#showprice_"+aid+"_slice").show();
    	}
    }
}
//------------------------------------------------------------------------------------------------//
//Restaurant Menu Addons more option
var special_row=0;
function addMoreMenuAddons(totrow) {
	
	if(totrow!=undefined && special_row == 0){
		special_row = totrow;
	}
	
	html  = '<tbody id="special_row' + special_row + '">';
	html += '<tr height="35">'; 
	html += '<td class="left" width="32%"><input type="text" name="moreaddons['+special_row+'][menuaddonsname]" id="menuaddonsname['+special_row+']"/>&nbsp;<input type="radio" name="moreaddons['+special_row+'][menuaddons_priceoption]" value="Free" checked="checked" onclick="moreaddonsfreeoption('+special_row+');"/>&nbsp;Free </td><td width="40%"><input type="radio" name="moreaddons['+special_row+'][menuaddons_priceoption]" value="Paid" onclick="moreaddonspaidoption('+special_row+');"/>&nbsp;Paid &nbsp;<span id="showprice1_'+special_row+'" style="display:none;"> Price : <input type="text" name="moreaddons['+special_row+'][menuaddons_price]" id="addonsprice" value="" /></span></td>';
	
	html += '<td class="left1" width="9%"><a onclick="$(\'#special_row' + special_row + '\').remove();" style="color:#ff0000;cursor:pointer;"><span>Remove</span></a></td>';
	html += '</tr>';
	html += '</tbody>';
	$('#special tfoot').before(html);
	special_row++;
	
}
//---------------------------------------- Validate Add new ---------------------------------------------------//
function restaurantMenuAddnewValidate(){
	
	//Error Language
	var err_lang_arr = error_language();
		
	var menu_name 	     = $.trim($("#menu_name").val());
	var menu_category    = $.trim($("#menu_category").val());
	var menu_cuisine     = $.trim($("#menu_cuisine").val());
	var menu_price       = $.trim($("#menu_price").val());
	var menu_catothers   = $.trim($("#menu_catothers").val());
	var menu_description = $.trim($("#menu_description").val());
	var nameRegex 	 	 = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
	var regexp1 		 = new RegExp("^[0-9]{0,10}([\.][0-9]{1,2})?$");
	var restid = $("#restaurant_name").val();
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';

	if(menu_name == ''){
		$("#errormsg").addClass('errormsg').html(err_lang_arr['res_owner_menunew_name']);
		$("#menu_name").focus();
		return false;		
	}
    
    var menu_type   = $("[name=menu_type]:checked").val();
    var menu_addons = $("[name=menu_addons]:checked").val();
    
    var menu_price  = $.trim($("#menu_price").val());
    
    
	if(menu_category == ''){
		$("#errormsg").addClass('errormsg').html(err_lang_arr['res_owner_menunew_category']);
		$("#menu_category").focus();
		return false;		
	}
	if(menu_category == 'other'){
		if(menu_catothers == ''){
			$("#errormsg").addClass('errormsg errorContain').html(err_lang_arr['res_owner_menunew_catothers']);
			$("#menu_catothers").focus();
			return false;	
		}else if(menu_catothers != ""){
		  
			$.post(jssitebaseUrl+useFile,{"menu_catothers":menu_catothers,"action":"checkMenuCategoryOthers"},function(response){
				
				if($.trim(response) == "exist"){
					$("#errormsg").addClass('errormsgNew errorContain').html(err_lang_arr['res_owner_menunew_catexist']);
					$("#menu_catothers").focus();
					return false;
				}else if(menu_name != "" && menu_category != "" && menu_type != "" ){
				    $.post(jssitebaseUrl+useFile,{"restid":restid, "menu_name":menu_name, "menu_category":menu_category, "menu_type":menu_type,"action":"checkMenuName"},function(response){
					
    					if($.trim(response) == "exist"){
    						$("#errormsg").addClass('errormsgNew errorContain').html(err_lang_arr['resmycc_menuname_alre_exist']);
    						$("#menu_name").focus();
    						return false;
    					}
                        else{
                            var sizeoption  = $("[name=sizeoption]:checked").val();
                        
                            if(sizeoption == ''){
                                $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_menu_price']);
                                return false;
                            }else if(sizeoption == 'fixed'){
                                $("#sizeoption_fixedprice2").attr("checked",true);
                                $(".showAjaxsizeoption").show();
                                $("#fixedOption2").show();
                                $("#pizzaDefaultOption2").hide();
                                $("#pizzaOtherOption2").hide();
                                if(menu_price == ''){
                                    $("#errormsg").addClass('errormsg').html(err_lang_arr['resmycc_please_enter_menuprice']);
                                    $("#menu_price").focus();
                                    return false;
                                } /*else if((menu_price != '0.00') || (menu_price == '0')){
            					    $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
            						$("#menu_price").select();
            						return false;
            					}*/ else if( menu_price <= 0 ){
                    					   $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
                    						$("#menu_price").select();
                                            return false;
                				}
                            }else if(sizeoption == 'default'){ 
                                if(document.getElementById("small").checked == true){ var small  = $.trim($("#small").val()); }
        						else if(document.getElementById("medium").checked == true){ var medium  = $.trim($("#medium").val()); }
        						else if(document.getElementById("large").checked == true){ var large  = $.trim($("#large").val());	}
        						else{ $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_menu_size']); return false; }
                                //Small
        						if(document.getElementById("small").checked == true){
        							var smallval   = $.trim($("#smallval").val());
        							if(smallval == ""){ 
                                        $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_ent_smal_men_size']); 
                                        return false; 
                                    } else if(isNaN(smallval) || !regexp1.test(smallval) || smallval == 0){
                					    $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
                						$("#smallval").select();
                						return false;
                					} else if( smallval <= 0 ){
                    					   $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
                    						$("#menu_price").select();
                                            return false;
                					}
        						}
                                //Medium
        						if(document.getElementById("medium").checked == true){
        							var mediumval   = $.trim($("#mediumval").val());
        							if(mediumval == ""){ 
                                        $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_ent_med_men_size']); 
                                        return false; 
                                    } else if(isNaN(mediumval) || !regexp1.test(mediumval) || mediumval == 0){
                					    $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
                						$("#mediumval").select();
                						return false;
                					} else if( mediumval <= 0 ){
                    					   $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
                    						$("#menu_price").select();
                                            return false;
                					} 
                                    
        						}
                                //Large
        						if(document.getElementById("large").checked == true){
        							var largeval   = $.trim($("#largeval").val());
        							if(largeval == ""){
                                        $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_ent_lar_men_size']); 
                                        return false; 
                                    } else if(isNaN(largeval) || !regexp1.test(largeval) || largeval == 0){
                					    $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
                						$("#largeval").select();
                						return false;
                					} else if( largeval <= 0 ){
                    					   $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
                    						$("#menu_price").select();
                                            return false;
                					}
        						}
                            }
                            if(sizeoption == 'other'){
                                if($(document).find(".slicevalidate:visible").length > 0){
                                    var i = $(".slicevalidate:visible").length;
                                    $(".slicevalidate:visible").each(function(){
                                       if($(this).val() == ''){
                                        $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_ent_sli_nam_size']).show(); 
                                        $(this).focus();
                                        return false;
                                       }
                                       if(i%2 != 0){
                                        if(isNaN($(this).val()) || $(this).val() == '0.00' || $(this).val() == '0'){
                                            $("#errormsg").addClass('errormsg').html(err_lang_arr['resmycc_plz_ent_valid_price2']).show(); 
                                            $(this).select();
                                            return false;
                                        } else if( $(this).val() <= 0 ){
                    					   $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
                    						$("#menu_price").select();
                                            return false;
                					    }
                                       }
                                       i--;
                                       if(i == 0){
                                        $("#errormsg").addClass('succmsg').html(err_lang_arr['resmyccount_menu_added_success']).show(); 
                                        //setTimeout(function(){
                                            document.res_menuadd.submit();
                                            return false;
                                        //},2000);
                                        
                                       }
                                    });
                                }else{
                                    $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_add_atl_one_slice']).show(); 
                                    return false;
                                }
                            }else{
                				$("#errormsg").addClass('succmsg').html(err_lang_arr['resmyccount_menu_added_success']).show(); 
                                //setTimeout(function(){
                                    document.res_menuadd.submit();
                                    return false;
                                //},2000);				
                			}
                        }
    				});
				return false;
                } 
			});
            return false;
		}	
	}	
			
				
	if(menu_name != "" && menu_category != "" ){

		$.post(jssitebaseUrl+useFile,{"restid":restid, "menu_name":menu_name, "menu_category":menu_category, "menu_type":menu_type,"action":"checkMenuName"},function(response){
			
			if($.trim(response) == "exist"){
				$("#errormsg").addClass('errormsgNew errorContain').html(err_lang_arr['resmycc_menuname_alre_exist']);
				$("#menu_name").focus();
				return false;
			}
            
            else{
                var sizeoption  = $("[name=sizeoption]:checked").val();
                
                if(sizeoption == ''){
                    $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_menu_price']);
                    return false;
                }else if(sizeoption == 'fixed'){
                    $("#sizeoption_fixedprice2").attr("checked",true);
                    $(".showAjaxsizeoption").show();
                    $("#fixedOption2").show();
                    $("#pizzaDefaultOption2").hide();
                    $("#pizzaOtherOption2").hide();
                    if(menu_price == ''){
						$("#errormsg").addClass('errormsg').html(err_lang_arr['resmycc_please_enter_menuprice']);
						$("#menu_price").focus();
						return false;
                    } else if(isNaN(menu_price) || !regexp1.test(menu_price) || menu_price == 0 ){
					    $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
						$("#menu_price").select();
						return false;
                        
					} else if(menu_price != ''){
					   if(menu_price <= 0 ){
					   $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
						$("#menu_price").select();
                        return false;
					   
					} 
					}
                    //alert(menu_price); return false;
                }else if(sizeoption == 'default'){
                    if(document.getElementById("small").checked == true){ var small  = $.trim($("#small").val()); }
					else if(document.getElementById("medium").checked == true){ var medium  = $.trim($("#medium").val()); }
					else if(document.getElementById("large").checked == true){ var large  = $.trim($("#large").val());	}
					else{
                        $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_menu_size']);
						return false;
					}
					if(document.getElementById("small").checked == true){
						var smallval   = $.trim($("#smallval").val());
						if(smallval == ""){
                            $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_ent_smal_men_size']);
							return false;
						} else if(isNaN(smallval) || !regexp1.test(smallval) || smallval == 0){
    					    $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
    						$("#smallval").select();
    						return false;
    					} else if(smallval <= 0 ){
    					   $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
    						$("#menu_price").select();
                            return false;
					    }
                        
					}
					if(document.getElementById("medium").checked == true){
						var mediumval   = $.trim($("#mediumval").val());
						if(mediumval == ""){
                            $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_ent_med_men_size']);
							return false;
						} else if(isNaN(mediumval) || !regexp1.test(mediumval) || mediumval == 0){
    					    $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
    						$("#mediumval").select();
    						return false;
    					} else if(mediumval <= 0 ){
    					   $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
    						$("#menu_price").select();
                            return false;
					    } 
					}
					if(document.getElementById("large").checked == true){
						var largeval   = $.trim($("#largeval").val());
						if(largeval == ""){
                            $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_ent_lar_men_size']);
							return false;
						} else if(isNaN(largeval) || !regexp1.test(largeval) || largeval == 0){
    					    $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
    						$("#largeval").select();
    						return false;
    					} else if(largeval <= 0 ){
    					   $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_choose_valid_price']);
    						$("#menu_price").select();
                            return false;
					    } 
					}
                }
                if(sizeoption == 'other'){
                    if($(document).find(".slicevalidate:visible").length > 0){
                        var i = $(".slicevalidate:visible").length;
                        $(".slicevalidate:visible").each(function(){
                           if($(this).val() == ''){
                            $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_ent_sli_nam_size']).show();
                            $(this).focus();
                            return false;
                           }
                           if(i%2 != 0){
                            if(isNaN($(this).val()) || $(this).val() == '0.00' || $(this).val() == '0'){
                                $("#errormsg").addClass('errormsg').html(err_lang_arr['resmycc_plz_ent_valid__price2']).show(); 
                                $(this).select();
                                return false;
                            } else if($(this).val() <= 0 ){
    					   $("#errormsg").addClass('errormsg').html(err_lang_arr['resmycc_plz_ent_valid__price2']);
    						$("#menu_price").select();
                            return false;
					    } 
                            
                           }
                           i--;
                           if(i == 0){
                            $("#errormsg").addClass('succmsg').html(err_lang_arr['resmyccount_menu_added_success']).show(); 
                            //setTimeout(function(){
                                document.res_menuadd.submit();
                                return false;
                            //},2000);
                           }
                        });
                    }else{
                        $("#errormsg").addClass('errormsg').html(err_lang_arr['resmyccount_add_atl_one_slice']).show(); 
                        //alert("Please add atleast one slice");
                        return false;
                    }
                }else{
    				$("#errormsg").addClass('succmsg').html(err_lang_arr['resmyccount_menu_added_success']).show(); 
                    //setTimeout(function(){
                        document.res_menuadd.submit();
                        return false;
                    //},2000);				
    			}
            }
		});
        return false;
	}	
	
}

//---------------------------------------------------------------------------------------------//

//---------------------------------------------------------------------------------------------//
//Myaccount - Addons Tab Start
//---------------------------------------------------------------------------------------------//
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
	//others edit
	function otherSpecifyAddonEdit(option){
		if(option=="category"){
			if($("#menu_categor1").val() == 'other'){ 
				document.getElementById("catoters_addon_edit").style.display = "block";
			}else {
				document.getElementById("catoters_addon_edit").style.display = "none";
			}
			return false;
		}
	}
	//Addons addnew Validation
	function validateAddonsNew()
	{
		//Error Language
		var err_lang_arr = error_language();
		
		var menu_category       = $.trim($("#menu_categor").val());
		var menu_category_addon = $.trim($("#addon_catothers").val());
		var addons_name 	    = $.trim($("#addons_name").val());
        var mainaddoncnt 	    = $.trim($("#mainaddoncnt").val());
        var regexp1 		 = new RegExp("^[0-9]{0,10}([\.][0-9]{1,2})?$");    
        var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
		
		if(menu_category == ''){
			$("#errormsgAddon").addClass('ownerErr').html(err_lang_arr['res_owner_addonnew_catname']);
			$("#menu_categor").focus();
			return false;
		}
		if(menu_category == 'other'){
			if(menu_category_addon == ''){
				$("#errormsgAddon").addClass('ownerErr').html(err_lang_arr['res_owner_addonnew_catnameothers']);
				$("#addon_catothers").focus();
				return false;
			}
		}
		if(addons_name == ''){
			$("#errormsgAddon").addClass('ownerErr').html(err_lang_arr['res_owner_addonnew_name']);
			$("#addons_name").focus();
			return false;		
		}else if(mainaddoncnt != '' && !regexp1.test(mainaddoncnt)){
			$("#errormsgAddon").addClass('ownerErr').html('please enter valid count');
			$("#mainaddoncnt").focus();
			return false;		
		}else if(addons_name != ''){
			$('#restAddonsAddEdit').attr("disabled","disabled");
			$.post(jssitebaseUrl+useFile,{"menu_category":menu_category,"addons_name":addons_name,"action":"checkNewAddons"},function(response){
			//alert(response);
				if($.trim(response) == "exist"){
					$('#restAddonsAddEdit').attr("disabled",false);
					$("#errormsgAddon").addClass('ownerErr').html(err_lang_arr['res_owner_addonnew_addonexist']);
					$("#addons_name").focus();
					return false;
				}else{
				    $("#errormsgAddon").addClass('succmsg ownerErr').html(err_lang_arr['res_owner_addon_added_success']).show(); 
                    setTimeout(function(){
                        document.res_AddonsaddEdit.submit();
                        $(".myaccsubmitbtn").prop("disabled",true);  
                        $('.myaccsubmitbtn').removeAttr('disabled');
                        return false;
                    },2000);
                                      
				}
			});
			return false;
		}
		return false;
	}
	
	//Addons Edit Validation
	function validateAddonsEdit()
	{
		//Error Language
		var err_lang_arr = error_language();
		
		var addonid       		= $("#addonid").val();
		var menu_category       = $.trim($("#menu_categor").val());
		var menu_category_addon = $.trim($("#addon_catothers").val());
		var addons_name 	    = $.trim($("#addons_name").val());
        var mainaddoncnt 	    = $.trim($("#mainaddoncnt").val());
        var regexp1 		 = new RegExp("^[0-9]{0,10}([\.][0-9]{1,2})?$");                
        
        var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
		
		if(menu_category == ''){
			$("#errormsgAddon").addClass('ownerErr').html(err_lang_arr['res_owner_addonedit_catname']);
			$("#menu_categor").focus();
			return false;
		}
		if(menu_category == 'other'){
			if(menu_category_addon == ''){
				$("#errormsgAddon").addClass('ownerErr').html(err_lang_arr['res_owner_addonedit_catnameothers']);
				$("#addon_catothers").focus();
				return false;
			}
		}
		if(addons_name == ''){
			$("#errormsgAddon").addClass('ownerErr').html(err_lang_arr['res_owner_addonedit_name']);
			$("#addons_name").focus();
			return false;		
		}else if(mainaddoncnt != '' && !regexp1.test(mainaddoncnt)){
			$("#errormsgAddon").addClass('ownerErr').html('please enter valid count');
			$("#mainaddoncnt").focus();
			return false;		
		}else if(addons_name != ''){
			$.post(jssitebaseUrl+useFile,{"addonid":addonid,"menu_category":menu_category,"addons_name":addons_name,"action":"checkEditAddons"},function(response){
				//alert(response); return false;
				if($.trim(response) == "exist"){
					$("#errormsgAddon").addClass('ownerErr').html(err_lang_arr['res_owner_addonedit_addonexist']);
					$("#addons_name").focus();
					return false;
				}else{
				    $("#errormsgAddon").addClass('succmsg ownerErr').html(err_lang_arr['res_owner_addon_edit_success']).show(); 
                    setTimeout(function(){
                        document.res_AddonsaddEdit.submit();
                        return false;
                    },2000);
				}
			});
			return false;
		}
		return false;
	}
//---------------------------------------------------------------------------------------------//
//Myaccount - Offers Tab Start
//---------------------------------------------------------------------------------------------//
	
	//addNewRestaurantOffer Validation
	function addNewRestaurantOffer()
	{	
        // return false;
		//Error Language
		var err_lang_arr = error_language();
		
		
		var regexp1 		    = new RegExp("^[0-9]{0,10}([\.][0-9]{1,2})?$");
		var offer_percentage   	= $.trim($("#offer_percentage").val());
		var offer_price  		= $.trim($("#offer_price").val());
		var offer_valid_from    = $.trim($("#offer_valid_from").val());
		var offer_valid_to      = $.trim($("#offer_valid_to").val());
        var useFile             = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
		
		var valid 				= regexp1.test(offer_percentage);
		var validPri			= regexp1.test(offer_price);
		
		fieldDateFirst = offer_valid_from.split("-");
		fieldDateSecound = offer_valid_to.split("-");
	    var Date1 = new Date();
	    var Date2 = new Date();
	    Date1.setFullYear(fieldDateFirst[2],fieldDateFirst[1]-1,fieldDateFirst[0]);
	 	Date2.setFullYear(fieldDateSecound[2],fieldDateSecound[1]-1,fieldDateSecound[0]);
		
		if(offer_percentage == '')
		{
			$("#offer_errormsg").addClass('ownerErr').html(err_lang_arr['res_owner_offer_percentage']);
			$("#offer_percentage").focus();
			return false;
		}else if(valid == false || offer_percentage == 0 )
		{
			$("#offer_errormsg").addClass('ownerErr').html(err_lang_arr['res_owner_offer_validpercentage']);
			$("#offer_percentage").focus();
			$("#offer_percentage").select();
			return false;
		}else if(offer_percentage > 100) {
		  
			$("#offer_errormsg").addClass('ownerErr').html("Please enter offer not more than 100%");
			$("#offer_percentage").focus();
			$("#offer_percentage").select();
			return false;
		}
        
		if(offer_price == '')
		{
			$("#offer_errormsg").addClass('ownerErr').html(err_lang_arr['res_owner_offer_price']);
			$("#offer_price").focus();
			return false;
		}else if(validPri == false || offer_price == 0)
		{
			$("#offer_errormsg").addClass('ownerErr').html(err_lang_arr['res_owner_offer_validprice']);
			$("#offer_price").focus();
			$("#offer_price").select();
			return false;
		}
		
		if(offer_valid_from == '')
		{
			$("#offer_errormsg").addClass('ownerErr').html(err_lang_arr['res_owner_offer_from']);
			$("#offer_valid_from").focus();
			return false;
		}
		if(offer_valid_to == '')
		{
			$("#offer_errormsg").addClass('ownerErr').html(err_lang_arr['res_owner_offer_to']);
			$("#offer_valid_to").focus();
			return false;
		}
        
		if (Date1 > Date2)
	    {
	    	$("#offer_errormsg").addClass('ownerErr').html(err_lang_arr['res_owner_offer_validto']);
			$("#offer_valid_to").focus();
			$("#offer_valid_to").select();
	        return false;
	    }
	    
		else if(offer_percentage != ''){
		  
           $.post(jssitebaseUrl+useFile,{"offer_valid_from":offer_valid_from,"offer_valid_to":offer_valid_to,"action":"checkOfferAlready"},function(resp){
                           
                if(resp == 'Already'){
                    alert('Already one offer is their in particular period of time.please delete or deactivate that offer then you can add another One offer');
                    return false;
                }else{
                    $("#offer_errormsg").addClass('succmsg ownerErr').html(err_lang_arr['res_owner_offer_add_success']).show(); 
                    setTimeout(function(){
                        document.offerAddEdit.submit();
                        return false;
                    },2000);
                }
            });
            return false;
       }     
		  
		/*	$.post(jssitebaseUrl+useFile,{"offer_percentage":offer_percentage, "offer_price":offer_price, "offer_valid_from":offer_valid_from, "offer_valid_to":offer_valid_to, "action":"checkOfferExist"},function(response){
				//alert(response); return false;
				if($.trim(response) == "exist"){
					$("#offer_errormsg").addClass('errormsg').html(err_lang_arr['res_owner_offer_exist']);
					return false;
				}
				else{
				    $("#offer_errormsg").addClass('errormsg').html('Category added successfully');
					document.offerAddEdit.submit();
				}
			});
			return false;
		}
		return false;*/
	}
	

//UpdateRestaurantOffer Validation
	function editRestaurantOffer()
	{
	   
		//Error Language
		var err_lang_arr = error_language();
		
		var regexp1 		    = new RegExp("^[0-9]{0,10}([\.][0-9]{1,2})?$");
		var offerid             = $.trim($("#offerid").val());
		var offer_percentage   	= $.trim($("#offer_percentage").val());
		var offer_price  		= $.trim($("#offer_price").val());
		var offer_valid_from    = $.trim($("#offer_valid_from").val());
		var offer_valid_to      = $.trim($("#offer_valid_to").val());
		var valid 				= regexp1.test(offer_percentage);
		var validPri			= regexp1.test(offer_price);
        var useFile             = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
        
		fieldDateFirst = offer_valid_from.split("-");
		fieldDateSecound = offer_valid_to.split("-");
	    var Date1 = new Date();
	    var Date2 = new Date();
	    Date1.setFullYear(fieldDateFirst[2],fieldDateFirst[1]-1,fieldDateFirst[0]);
	 	Date2.setFullYear(fieldDateSecound[2],fieldDateSecound[1]-1,fieldDateSecound[0]);
		
		if(offer_percentage == '')
		{
			$("#offer_errormsg").addClass('ownerErr').html(err_lang_arr['res_owner_offeredit_percentage']);
			$("#offer_percentage").focus();
			return false;
		}else if(valid == false || offer_percentage == 0 )
		{
			$("#offer_errormsg").addClass('ownerErr').html(err_lang_arr['res_owner_offeredit_validpercent']);
			$("#off_percentage").focus();
			$("#off_percentage").select();
			return false;
		}else if(offer_percentage > 100) {
		  
			$("#offer_errormsg").addClass('ownerErr').html("Please enter offer not more than 100%");
			$("#offer_percentage").focus();
			$("#offer_percentage").select();
			return false;
		}
		if(offer_price == '')
		{
			$("#offer_errormsg").addClass('ownerErr').html(err_lang_arr['res_owner_offeredit_price']);
			$("#offer_price").focus();
			return false;
		}else if(validPri == false || offer_price == 0)
		{
			$("#offer_errormsg").addClass('ownerErr').html(err_lang_arr['res_owner_offeredit_validprice']);
			$("#offer_price").focus();
			$("#offer_price").select();
			return false;
		}
		
		if(offer_valid_from == '')
		{
			$("#offer_errormsg").addClass('ownerErr').html(err_lang_arr['res_owner_offeredit_from']);
			$("#offer_valid_from").focus();
			return false;
		}
		if(offer_valid_to == '')
		{
			$("#offer_errormsg").addClass('ownerErr').html(err_lang_arr['res_owner_offeredit_to']);
			$("#offer_valid_to").focus();
			return false;
		}
		if (Date1 > Date2)
	    {
	    	$("#offer_errormsg").addClass('ownerErr').html(err_lang_arr['res_owner_offeredit_validto']);
			$("#off_valid_to").focus();
			$("#offer_valid_to").select();
	        return false;
	    }
	    else if(offer_percentage != ''){
		  
           $.post(jssitebaseUrl+useFile,{"offer_valid_from":offer_valid_from,"offer_valid_to":offer_valid_to,"offer_id":offerid, "action":"checkEditOfferAlready"},function(resp){
                           
                if(resp == 'Already'){
                    alert('Already one offer is their in particular period of time.please delete or deactivate that offer then you can add another One offer');
                    return false;
                }else{
                    $("#offer_errormsg").addClass('succmsg ownerErr').html(err_lang_arr['res_owner_offeredit_success']).show(); 
                    setTimeout(function(){
                        document.offerAddEdit.submit();
                        return false;
                    },2000);
                }
            });
            return false;
        }    
            
		/*else if(offer_percentage != '' && offer_price !='' && offer_valid_from !='' && offer_valid_to !=''){
            //document.offerAddEdit.submit();
			$.post(jssitebaseUrl+useFile,{"offer_percentage":offer_percentage, "offer_price":offer_price, "offer_valid_from":offer_valid_from, "offer_valid_to":offer_valid_to, "offerid":offerid, "action":"checkOfferExist"},function(response){
				//alert(response); return false;
				
				if($.trim(response) == "exist"){
					$("#offer_errormsg").addClass('errormsg').html(err_lang_arr['res_owner_offeredit_exist']);
					return false;
				}else{
				    //setTimeout(function() { 
				        $("#offer_errormsg").addClass('errormsg').html('Offer updated successfully');
				        document.offerAddEdit.submit();
				    //}, 2000);
				    
				}
				
			});
			return false;
		}
		return false;*/
	}
//---------------------------------------------------------------------------------------------//
//Myaccount - Reviews Tab Start
//---------------------------------------------------------------------------------------------//

//---------------------------------------------------------------------------------------------//
//Myaccount - Accounts Tab Start
//---------------------------------------------------------------------------------------------//
	//Click showEditAccounts Button
	function showEditAccounts(){
		$("#editAccounts").show();
		$(".accountDetails").hide();
	}
	//add restaurant validate
	function restaurantAccountsValidate(){	
		
		//Error Language
		var err_lang_arr = error_language();
		
		//alert("sri");	
		var numregexp = new RegExp(/^[-+]?\d{0,10}(\.\d{2})?$/);
		var regUrl = /^(((ht|f){1}(tp:[/][/]){1})|((www.){1}))[-a-zA-Z0-9@:%_\+.~#?&//=]+$/;
		var restaurant_name    		    = $.trim($("#restaurant_name1").val());
		var restaurant_phone    		= $.trim($("#restaurant_phone1").val());
		var restaurant_fax    		    = $.trim($("#restaurant_fax1").val());
		//var restaurant_photos  		    = $("#restaurant_photos").val();
		var restaurant_website  	    = $.trim($("#restaurant_website1").val());
		var restaurant_streetaddress    = $.trim($("#restaurant_streetaddress1").val());
		var restaurant_city			    = $.trim($("#restaurant_city1").val());
		var restaurant_state		    = $.trim($("#restaurant_state1").val());
		var restaurant_zip			    = $("#restaurant_zip1").val();
		var restaurant_contact_name	    = $.trim($("#restaurant_contact_name1").val());
		var restaurant_contact_phone    = $.trim($("#restaurant_contact_phone1").val());
		var restaurant_contact_email    = $.trim($("#restaurant_contact_email1").val());
		var restaurant_password    		= $.trim($("#restaurant_password").val());
        var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
		
		$(".errClass").html('');
		
		//alert(restaurant_name);
		if(restaurant_name == ''){
			$("#resNameErr").html(err_lang_arr['res_owner_account_resname']);
			$("#restaurant_name1").focus();
			return false;		
		}
		if((restaurant_phone) == ''){
			$("#resPhoneErr").html(err_lang_arr['res_owner_account_resphone']);
			$("#restaurant_phone1").focus();
			return false;	
		}
		if(restaurant_phone != ''){
			if(isNaN(restaurant_phone)){
				$("#resPhoneErr").html(err_lang_arr['res_owner_account_resvalidphone']);
				$("#restaurant_phone1").focus();
				return false;
			}
			/*if(restaurant_phone.length < 10){
				$("#resPhoneErr").html(err_lang_arr['res_owner_account_validphoneless']);
				$("#restaurant_phone1").focus();
				return false;
			}*/		
		}
		
		/*if((restaurant_website) == ''){
			$("#resWebErr").html(err_lang_arr['res_owner_account_reswebsite']);
			$("#restaurant_website1").focus();
			return false;	
		}
		if((restaurant_website) != ''){
			if(regUrl.test(restaurant_website) == false){
				$("#resWebErr").html(err_lang_arr['res_owner_account_resvalidweb']);
				$("#restaurant_website1").focus();
				$("#restaurant_website1").select();
				return false;
			}
		}*/
		if((restaurant_fax) == ''){
			$("#resFaxErr").html(err_lang_arr['res_owner_account_resfax']);
			$("#restaurant_fax1").focus();
			return false;	
		}
		
		if(restaurant_streetaddress == ''){
			$("#resStrErr").html(err_lang_arr['res_owner_account_resstreetaddr'])
			$("#restaurant_streetaddress1").focus();
			return false;		
		}
		else if(restaurant_state == ''){
			$("#resStaErr").html(err_lang_arr['res_owner_account_resstate']);
			$("#restaurant_state1").focus();
			return false;		
		}
		else if(restaurant_city == ''){
			$("#resCitErr").html(err_lang_arr['res_owner_account_rescity']);
			$("#restaurant_city1").focus();
			return false;		
		}
		else if(restaurant_zip == ''){
			$("#resZipErr").html(err_lang_arr['res_owner_account_reszip']);
			$("#restaurant_zip1").focus();
			return false;		
		}
		else if(restaurant_contact_name == ''){
			$("#resCntNameErr").html(err_lang_arr['res_owner_account_contactname']);
			$("#restaurant_contact_name1").focus();
			return false;		
		}
		
		if(restaurant_contact_phone == ''){
			$("#resCntPhoneErr").html(err_lang_arr['res_owner_account_contactphoneno']);
			$("#restaurant_contact_phone1").focus();
			return false;		
		}
		else if(restaurant_contact_phone != ''){
			if(isNaN(restaurant_contact_phone))
			{
				$("#resCntPhoneErr").html(err_lang_arr['res_owner_account_validphoneno']);
				$("#restaurant_contact_phone1").focus();
				$("#restaurant_contact_phone1").select();
				return false;
			}	
		}
		/*if(restaurant_contact_phone != ''){
			if(restaurant_contact_phone.length < 10){
				$("#resCntPhoneErr").html(err_lang_arr['res_owner_account_validphonenoless']);
				$("#restaurant_contact_phone1").focus();
				$("#restaurant_contact_phone1").select();
				return false;
			}		
		}*/
		
		if((restaurant_contact_email) == ''){
			$("#resEmailErr").html(err_lang_arr['res_owner_account_email']);
			$("#restaurant_contact_email1").focus();
			return false;	
		}
		else if(restaurant_contact_email != ''){
			var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
			var valid = emailRegex.test(restaurant_contact_email);
			if (!valid)
			{
				$("#resEmailErr").html(err_lang_arr['res_owner_account_validemail']);
				$("#restaurant_contact_email1").focus();
				$("#restaurant_contact_email1").select();
				return false;
			}
		}
		
			
		$.post(jssitebaseUrl+useFile,{'restaurant_name':restaurant_name,'restaurant_phone':restaurant_phone,'restaurant_website':restaurant_website,'restaurant_fax':restaurant_fax,'restaurant_streetaddress':restaurant_streetaddress,'restaurant_state':restaurant_state,'restaurant_city':restaurant_city,'restaurant_zip':restaurant_zip,'restaurant_contact_name':restaurant_contact_name,'restaurant_contact_phone':restaurant_contact_phone,'restaurant_contact_email':restaurant_contact_email,'restaurant_password':restaurant_password,'action':'restaurantAccountInfo'}, function(output){
			//alert(output);
			if(output == 'success'){
				$(".accountDetails").load(jssitebaseUrl+"/ajaxActionRestaurant.php",{'action':'resownerAccountsList'});
				//$(".restaurantAddonContent").load(jssitebaseUrl+"/ajaxActionRestaurant.php?action=resownershowaddonList", {'resid':resid} );
				$("#accountinfo").html(err_lang_arr['res_owner_account_success']);
				$("#editAccounts").hide();
				$(".accountDetails").show();
				setTimeout(function() { $("#accountinfo").hide(); }, 2000);
			}
		});
		
		
		//return false;
	}
//---------------------------------------------------------------------------------------------//
//Myaccount - Settings Tab Start
//---------------------------------------------------------------------------------------------//
	//Edit Contact and Location
	function editLocationShow(){
		$(".contactLocationDetails").hide();
		$("#editContactLocation").show();
	}
	function backContactInfo(){
		$(".contactLocationDetails").show();
		$("#editContactLocation").hide();
		$("#changePasswordDetails").hide();
	}
	//---------------------------------------------------------------
	function restaurantEditContactValidate(){
		
		//Error Language
		var err_lang_arr = error_language();
		
		var numregexp = new RegExp(/^[-+]?\d{0,10}(\.\d{2})?$/);
		var regUrl = /^(((ht|f){1}(tp:[/][/]){1})|((www.){1}))[-a-zA-Z0-9@:%_\+.~#?&//=]+$/;
		var restaurant_contact_name	    = $.trim($("#restaurant_contact_name_con").val());
		var restaurant_contact_phone    = $.trim($("#restaurant_contact_phone_con").val());
		var restaurant_contact_email    = $.trim($("#restaurant_contact_email_con").val());
		//var restaurant_password    		= $.trim($("#restaurant_password_con").val());
		var restaurant_streetaddress    = $.trim($("#restaurant_streetaddress_con").val());
		var restaurant_city			    = $.trim($("#restaurant_city_con").val());
		var restaurant_state		    = $.trim($("#restaurant_state_con").val());
		var restaurant_zip			    = $("#restaurant_zip_con").val();
        var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
		
		$(".errClass").html('');
		if(restaurant_contact_name == ''){
			$(".resCntNameErr").html(err_lang_arr['res_owner_setting_contactname']);
			$("#restaurant_contact_name_con").focus();
			return false;		
		}
		else if(restaurant_contact_phone == ''){
			$(".resCntPhoneErr").html(err_lang_arr['res_owner_setting_contactphoneno']);
			$("#restaurant_contact_phone_con").focus();
			return false;		
		}
		else if(restaurant_contact_phone != ''){
			if(isNaN(restaurant_contact_phone))
			{
				$(".resCntPhoneErr").html("Please enter Valid Contact Phone Number");
				$("#restaurant_contact_phone1").focus();
				$("#restaurant_contact_phone_con").select();
				return false;
			}else if(restaurant_contact_phone.length < 10){
				$(".resCntPhoneErr").html("Please enter Valid Contact Phone Number");
				$("#restaurant_contact_phone_con").focus();
				$("#restaurant_contact_phone_con").select();
				return false;
			}
		}
		if((restaurant_contact_email) == ''){
			$(".resCntEmailErr").html(err_lang_arr['res_owner_setting_contactemail']);
			$("#restaurant_contact_email_con").focus();
			return false;	
		}
		if(restaurant_contact_email != ''){
			var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
			var valid = emailRegex.test(restaurant_contact_email);
			if (!valid)
			{
				$(".resCntEmailErr").html(err_lang_arr['res_owner_setting_validemail']);
				$("#restaurant_contact_email_con").focus();
				$("#restaurant_contact_email_con").select();
				return false;
			}
		
		/*if(restaurant_password == ''){
			$(".resCntPassErr").html(err_lang_arr['res_owner_setting_contactpassword']);
			$("#restaurant_password_con").focus();
			return false;
		}*/
        else if(valid) {
        $.post(jssitebaseUrl+useFile,{"restaurant_contact_email":restaurant_contact_email,"action":"checkResEmailAlreadyExist"},function(response)
        {
        if($.trim(response) == 'emailAlready'){
        			$(".resCntEmailErr").addClass('errClass').html(" This Email Already Exist");
                    $("#restaurant_contact_email_con").focus();
			    	$("#restaurant_contact_email_con").select();
        			return false;
		        }    
		if(restaurant_streetaddress == ''){
			$(".resCntStrErr").html(err_lang_arr['res_owner_setting_streetaddr']);
			$("#restaurant_streetaddress_con").focus();
			return false;		
		}
		else if(restaurant_state == ''){
			$(".resCntStaErr").html(err_lang_arr['res_owner_setting_resstate']);
			$("#restaurant_state_con").focus();
			return false;		
		}
		else if(restaurant_city == ''){
			$(".resCntCitErr").html(err_lang_arr['res_owner_setting_rescity']);
			$("#restaurant_city_con").focus();
			return false;		
		}
		else if(restaurant_zip == ''){
			$(".resCntZipErr").html(err_lang_arr['res_owner_setting_reszip']);
			$("#restaurant_zip_con").focus();
			return false;		
		}
		//return false;
		
		$.post(jssitebaseUrl+useFile,{'restaurant_streetaddress':restaurant_streetaddress,'restaurant_state':restaurant_state,'restaurant_city':restaurant_city,'restaurant_zip':restaurant_zip,'restaurant_contact_name':restaurant_contact_name,'restaurant_contact_phone':restaurant_contact_phone,'restaurant_contact_email':restaurant_contact_email,'action':'restaurantEditContactInfo'}, function(output){
			//alert(output); return false;
			if(output == 'success'){
				$(".contactLocationDetails").load(jssitebaseUrl+"/ajaxActionRestaurant.php",{'action':'resownerEditContactList'});
				//$(".restaurantAddonContent").load(jssitebaseUrl+"/ajaxActionRestaurant.php?action=resownershowaddonList", {'resid':resid} );
				$("#contactErr").addClass('succmsg').html(err_lang_arr['res_owner_setting_contactsuccess']).show(); 
                setTimeout(function() {
 			        $("#editContactLocation").hide();
        			$(".contactLocationDetails").show();
                    $("#contactErr").hide(); 
                }, 2000);
			}
		});
        });
   }	
   }
    }
	//----------------------------------------------------------------------------------------
	//Restaurant Change Password
	function showChangePassword(){
		$("#changePasswordDetails").show();
		$(".contactLocationDetails").hide();
		$("#editContactLocation").hide();
        $(".resCntnewpassErr").hide();
        $(".resCntconfirmpassErr").hide();
        $("#oldpassword").val('');
						$("#newpassword").val('');
	}
	//----------------------------------------------------------------------------------------------------
	//Restaurant Password
	/*function restaurantChangePasswordValidate(){
		
		//Error Language
		var err_lang_arr = error_language();
		
		var oldpassword     = $("#oldpassword").val();
		var newpassword     = $("#newpassword").val();
		var confirmpassword = $("#confirmpassword").val();
		
		$(".errClass").html('');
		
		if(oldpassword == ''){
			$(".resCntoldpassErr").html(err_lang_arr['res_owner_setting_oldpass']);
			$("#oldpassword").focus();
			return false;
		}
		else if(newpassword == ''){
			$(".resCntnewpassErr").html(err_lang_arr['res_owner_setting_newpass']);
			$("#newpassword").focus();
			return false;
		}
		else if(confirmpassword == ''){
			$(".resCntconfirmpassErr").html(err_lang_arr['res_owner_setting_confirmpass']);
			$("#confirmpassword").focus();
			return false;		
		}
		else if(oldpassword == newpassword){
			$(".resCntnewpassErr").html(err_lang_arr['res_owner_setting_oldnewpass']);
			$("#oldpassword").focus();
			return false;
		}
		else if(newpassword != confirmpassword){
			$(".resCntconfirmpassErr").html(err_lang_arr['res_owner_setting_newconfirm']);
			$("#newpassword").focus();
			return false;
		}
		else{		
			$.post(jssitebaseUrl+'/ajaxFile.php',{"oldpassword":oldpassword,"newpassword":newpassword,"action":"checkRestChangePassword"},function(response){
			//alert(response);
				if($.trim(response) == "Invalid_Old_Pwd")
				{
					$(".resCntoldpassErr").html(err_lang_arr['res_owner_setting_invalidoldpass']);
					return false;
				}
				else if($.trim(response) == 'success')
				{
					//$(".contactLocationDetails").load(jssitebaseUrl+"/ajaxActionRestaurant.php?action=resownerEditContactList");
					$(".contactLocationDetails").show();
					$("#changePasswordDetails").hide();
					setTimeout(function() {
						$("#oldpassword").val('');
						$("#newpassword").val('');
						$("#confirmpassword").val(''); }, 2000);
				} 
			});
			return false;
		}
	}*/
	function restaurantChangePasswordValidate(){
		
		//alert("hello");
		//Error Language
		var err_lang_arr = error_language();
		
		var newpassword     = $("#newpassword").val();
		var confirmpassword = $("#confirmpassword").val();
        var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
		
		if(newpassword == ''){
			$(".resCntnewpassErr").html(err_lang_arr['res_owner_setting_newpass']).show();
			$("#newpassword").focus();
			return false;
		}
		else if(confirmpassword == ''){
			$(".resCntnewpassErr").hide();
			$(".resCntconfirmpassErr").html(err_lang_arr['res_owner_setting_confirmpass']).show();
			$("#confirmpassword").focus();
			return false;		
		}
		else if(newpassword != confirmpassword){
			$(".resCntconfirmpassErr").html(err_lang_arr['res_owner_setting_newconfirm']).show();
			$("#newpassword").focus();
			return false;
		}
		else{
			
			$.post(jssitebaseUrl+useFile,{"newpassword":newpassword,"action":"checkRestChangePassword"},function(response){
				
				//alert(response);
				if($.trim(response) == 'success')
				{
				    $('#success').addClass('succmsg ').html(err_lang_arr['res_owner_pass_changed_success']).show();
					
					setTimeout(function() {
                        $('#success').removeClass('succmsg1').html('');
						$("#oldpassword").val('');
						$("#newpassword").val('');
                        $(".contactLocationDetails").show();
                        $("#changePasswordDetails").hide();
						$("#confirmpassword").val(''); 
                    }, 2000);
				} 
			});
			return false;
		}
	}		
	//-----------------------------------------------------------------------------------------------
	//Edit Contact and Location
	function editRestaurantInfoShow(){
		$(".restaurantInfoDetails").hide();
		$("#editrestaurantinfo").show();
	}
	function backRestaurantInfo(){
		$(".restaurantInfoDetails").show();
		$("#editrestaurantinfo").hide();
	}
	//---------------------------------------------------------------------
	function editRestaurantInfoValidate(){
		
		//Error Language
		var err_lang_arr = error_language();
		//alert("sri");
		var numregexp = new RegExp(/^[-+]?\d{0,10}(\.\d{2})?$/);
		var regUrl = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
		var restaurant_name    		    = $.trim($("#restaurant_name_res").val());
		var restaurant_phone    		= $.trim($("#restaurant_phone_res").val());
		var restaurant_fax    		    = $.trim($("#restaurant_fax_res").val());
		//var restaurant_photos  		    = $("#restaurant_photos").val();
		var restaurant_website  	    = $.trim($("#restaurant_website_res").val());
		var restaurant_description	    = $.trim($("#restaurant_description_res").val());
		var restaurant_minorder_price	= $.trim($("#restaurant_minorder_price_res").val());
		var restaurant_salestax			= $.trim($("#restaurant_salestax_res").val());
		var restaurant_serving_cuisines	= $("#restaurant_serving_cuisines_res").val();
		var regexp1 		            = new RegExp("^[0-9]{0,10}([\.][0-9]{1,2})?$");
		var alert_tone					= $("[name=pending_alert]:checked").val();
		var res_order_receive_mail		= $("#restaurant_ordermail").val();
        var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
		
		$(".errClass").html('');
		if(restaurant_name == ''){
			$(".resNameErr").html(err_lang_arr['res_owner_setting_resinfo_name']);
			$("#restaurant_name_res").focus();
			return false;		
		}
		if((restaurant_phone) == ''){
			$(".resPhoneErr").html(err_lang_arr['res_owner_setting_resinfo_phone']);
			$("#restaurant_phone_res").focus();
			return false;	
		}
		if(restaurant_phone != ''){
			if(isNaN(restaurant_phone)){
				$(".resPhoneErr").html(err_lang_arr['res_owner_setting_resinfo_valphone']);
				$("#restaurant_phone_res").focus();
				return false;
			}
			/*if(restaurant_phone.length < 10){
				$(".resPhoneErr").html(err_lang_arr['res_owner_setting_resinfo_phoneles']);
				$("#restaurant_phone_res").focus();
				return false;
			}*/		
		}
		
		/*if((restaurant_website) == ''){
			$(".resWebErr").html(err_lang_arr['res_owner_setting_resinfo_website']);
			$("#restaurant_website_res").focus();
			return false;	
		}
		*/
        if((restaurant_website) != '' && regUrl.test(restaurant_website) == false){
			$(".resWebErr").html(err_lang_arr['res_owner_setting_resinfo_validweb']);
			$("#restaurant_website_res").focus();
			$("#restaurant_website_res").select();
			return false;
		}
		if(res_order_receive_mail == ''){
			$(".resreceiveErr").html(err_lang_arr['res_owner_enter_mail']);
			$("#restaurant_ordermail").focus();
			$("#restaurant_ordermail").select();
			return false;
		}else if(res_order_receive_mail != ''){
			var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
			var valid = emailRegex.test(res_order_receive_mail);
			if (!valid)
			{
				$("#resreceiveErr").html(err_lang_arr['res_owner_enter_valid_mail']);
				$("#restaurant_ordermail").focus();
				$("#restaurant_ordermail").select();
				return false;
			}
			
		}
		/*if((restaurant_fax) == ''){
			$(".resFaxErr").html(err_lang_arr['res_owner_setting_resinfo_fax']);
			$("#restaurant_fax_res").focus();
			return false;	
		}*/
		
		/*if(restaurant_description == ''){
			$(".resAbtResErr").html(err_lang_arr['res_owner_setting_resinfo_aboutres']);
			$("#restaurant_description_res").focus();
			return false;		
		}*/
		
		if(document.getElementById("restaurant_pickup_Yes_res").checked == true){
			var pickup 	= $.trim($("#restaurant_pickup_Yes_res").val());
		}else if(document.getElementById("restaurant_pickup_No_res").checked == true){ 
			var pickup 	= $.trim($("#restaurant_pickup_No_res").val());
		}else{
			$(".resPickupErr").html(err_lang_arr['res_owner_setting_resinfo_pickup']);
			//document.res_menuadd.menu_type[0].focus();
			return false;	
		}
		
		if(document.getElementById("restaurant_booktable_yes").checked == true){
			var bookatable 	= $.trim($("#restaurant_booktable_yes").val());
		}else if(document.getElementById("restaurant_booktable_no").checked == true){ 
			var bookatable 	= $.trim($("#restaurant_booktable_no").val());
		}else{
			$(".resBooktableErr").html(err_lang_arr['res_owner_setting_resinfo_booktab']);
			//document.res_menuadd.menu_type[0].focus();
			return false;	
		}
		
		if(restaurant_minorder_price == ''){
			$(".resMinOrdErr").html(err_lang_arr['res_owner_setting_info_minorder']);
			$("#restaurant_minorder_price_res").focus();
			return false;		
		}
		else if(isNaN(restaurant_minorder_price)){
			$(".resMinOrdErr").html(err_lang_arr['res_owner_setting_info_validminord']);
			$("#restaurant_minorder_price_res").focus();
			$("#restaurant_minorder_price_res").select();
			return false;
		}
		else if(!regexp1.test(restaurant_minorder_price)){
			$(".resMinOrdErr").html(err_lang_arr['res_owner_setting_info_validminord']);
			$("#restaurant_minorder_price_res").focus();
			return false;
		}
		/*else if(restaurant_minorder_price != ''){
			var valid = numregexp.test(restaurant_minorder_price);
			if(!valid){
				$(".resMinOrdErr").html(err_lang_arr['res_owner_setting_info_valminord2']);
				$("#restaurant_minorder_price_res").focus();
				$("#restaurant_minorder_price_res").select();
				return false;
			}
		}*/
		
		else if(restaurant_salestax == ''){
			$(".resSalTaxErr").html(err_lang_arr['res_owner_setting_info_salestax']);
			$("#restaurant_salestax_res").focus();
			return false;		
		}
		else if(isNaN(restaurant_salestax))
		{
			$(".resSalTaxErr").html(err_lang_arr['res_owner_setting_info_valsalestax']);
			$("#restaurant_salestax_res").focus();
			$("#restaurant_salestax_res").select();
			return false;
		}
        else if(!regexp1.test(restaurant_salestax)){
			$(".resSalTaxErr").html(err_lang_arr['res_owner_setting_info_valsalestax']);
			$("#restaurant_salestax_res").focus();
			return false;
		}/*else if(restaurant_salestax != ''){
			var valid = numregexp.test(restaurant_salestax);
			if(!valid){
				$(".resSalTaxErr").html(err_lang_arr['res_owner_setting_info_salestaxno']);
				$("#restaurant_salestax_res").focus();
				$("#restaurant_salestax_res").select();
				return false;
			}
		}*/
		
		oSelect_serving_cuisine =document.getElementById("restaurant_serving_cuisines_res");
		var cuisineid='';
		var serving_cuisine_count = 0;
		cuisineid += $("#restaurant_serving_cuisines_res").val()+',';
		for(var i=0;i<oSelect_serving_cuisine.options.length;i++){
			if(oSelect_serving_cuisine.options[i].selected)
				serving_cuisine_count++;
		}
		/*if(serving_cuisine_count<1){
			alert(err_lang_arr['res_owner_setting_info_valsalestax']);
			return false;
		}*/
		$.post(jssitebaseUrl+useFile,{"restaurant_name":restaurant_name,"action":"checkResNameAlreadyExist"},function(response) {
		  	if($.trim(response) == 'nameAlready'){
					//alert("That email id already there");/
					$(".resNameErr").html(err_lang_arr['res_owner_setting_name_exists']);
			        $("#restaurant_name_res").focus();
                    return false;
	    	}else {
    		$.post(jssitebaseUrl+useFile,{'restaurant_name':restaurant_name,'restaurant_phone':restaurant_phone,'restaurant_website':restaurant_website,'order_receive_mail':res_order_receive_mail,'restaurant_fax':restaurant_fax,'restaurant_description':restaurant_description,'pickup':pickup,'bookatable':bookatable,'restaurant_minorder_price':restaurant_minorder_price,'restaurant_salestax':restaurant_salestax,'cuisineid':cuisineid,'alert':alert_tone, 'action':'restaurantEditRestaurantInfo'}, function(output){
    			//alert(output);
    			if(output == 'success'){
    				$(".restaurantInfoDetails").load(jssitebaseUrl+"/ajaxActionRestaurant.php",{'action':'resownerEditRestaurantInfoList'});
    				window.location.reload(true);
                    $("#resErr").addClass('succmsg').html(err_lang_arr['res_owner_info_update_success']).show(); 
                    setTimeout(function() {
     			        $("#editrestaurantinfo").hide();
    				    $(".restaurantInfoDetails").show();
                        $("#resErr").hide();
                    }, 2000);
			}
		});
        }
        });
	}
	//-----------------------------------------------------------------------------------------------
	//Edit Contact and Location
	function editDeliveryInfoShow(){
		$(".deliveryInfoDetails").hide();
		$("#editDeliveryInfo").show();
		viewMap();
	}
	function backDeliveryInfo(){
		$(".deliveryInfoDetails").show();
		$("#editDeliveryInfo").hide();
	}
	//---------------------------
	function editDeliveryInfoValidate(){
		
		//Error Language
		var err_lang_arr = error_language();
		
		var regexp1 	= new RegExp("^[0-9]{0,10}([\.][0-9]{1,2})?$");
		
		if(document.getElementById("restaurant_delivery_yes").checked == true){
			var delivery 	= $.trim($("#restaurant_delivery_yes").val());
		}else if(document.getElementById("restaurant_delivery_no").checked == true){ 
			var delivery 	= $.trim($("#restaurant_delivery_no").val());
		}else{
			$(".resDeliErr").html(err_lang_arr['res_owner_setting_delivery_select']);
			//document.res_menuadd.menu_type[0].focus();
			return false;	
		}
		
		var restaurant_estimated_time   = $.trim($("#restaurant_estimated_time_res").val());
		var areaid='';
        var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
		/*oSelect_serving_area =document.getElementById("restaurant_delivery_areas_res");
		var areaid='';
		var serving_area_count = 0;
		areaid += $("#restaurant_delivery_areas_res").val()+',';
		for(var i=0;i<oSelect_serving_area.options.length;i++){
			if(oSelect_serving_area.options[i].selected)
				serving_area_count++;
		}
		if(serving_area_count<1){
			alert(err_lang_arr['resmycc_must_sel_atleast_1area']);
			return false;
		}*/
		var restaurant_estimated_time   = $.trim($("#restaurant_estimated_time_res").val());
		var restaurant_delivery_charge	= $.trim($("#restaurant_delivery_charge_res").val());
		var restaurant_delivery_distance = $.trim($("#restaurant_delivery_distance").val());
		
		$(".errClass").html('');
		if($.trim(delivery) == 'Yes'){
		  if(restaurant_estimated_time == ''){
    			$(".resEstTimeErr").html(err_lang_arr['res_owner_setting_delivery_esttime']);
    			$("#restaurant_estimated_time_res").focus();
    			return false;		
    		}if(isNaN(restaurant_estimated_time)){
    			$(".resEstTimeErr").html(err_lang_arr['res_owner_setting_deliv_valesttime']);
    			$("#restaurant_estimated_time_res").focus();
    			return false;
    		}if(!regexp1.test(restaurant_estimated_time)){
    			$(".resEstTimeErr").html(err_lang_arr['res_owner_setting_deliv_valesttime']);
    			$("#restaurant_estimated_time_res").focus();
    			return false;
    		}
    		if(restaurant_delivery_charge == ''){
    			$(".resDeliChgErr").html(err_lang_arr['res_owner_setting_delivery_charge']);
    			$("#restaurant_delivery_charge_res").focus();
    			return false;		
    		}else if(isNaN(restaurant_delivery_charge)){
    			$(".resDeliChgErr").html(err_lang_arr['res_owner_setting_delivery_valchar']);
    			$("#restaurant_delivery_charge_res").focus();
    			$("#restaurant_delivery_charge_res").select();
    			return false;
    		}else if(!regexp1.test(restaurant_delivery_charge) || restaurant_delivery_charge == 0){
    			$(".resDeliChgErr").html(err_lang_arr['res_owner_setting_delivery_valchar']);
    			$("#restaurant_delivery_charge_res").focus();
    			return false;
    		}else if(restaurant_delivery_distance == ''){
    			$(".restdelDistanceErr").html(err_lang_arr['res_owner_setting_delivery_miles']);
    			$("#restaurant_delivery_distance").focus();
    			return false;
    		}
		}
		
		
		$.post(jssitebaseUrl+useFile,{'delivery':delivery,'areaid':areaid,'restaurant_estimated_time':restaurant_estimated_time,'restaurant_delivery_charge':restaurant_delivery_charge,'restaurant_delivery_distance':restaurant_delivery_distance,'action':'restaurantEditDeliveryInfo'}, function(output){
			//alert(output);
			if(output == 'success'){
				$(".deliveryInfoDetails").load(jssitebaseUrl+"/ajaxActionRestaurant.php",{'action':'resownerEditDeliveryInfoList'});
                $("#DeliveryErr").addClass('succmsg').html(err_lang_arr['res_owner_delivery_up_success']).show();
				setTimeout(function() { 
    				$("#editDeliveryInfo").hide();
    				$(".deliveryInfoDetails").show();
                    $("#DeliveryErr").hide();
    				$("#DeliveryErr").removeClass('succmsg'); 
                }, 2000);
                window.location.reload();
			}
		});
	}
	//-----------------------------------------------------------------------------------------------
	//Edit Open and Close
	function editOpenAndCloseInfoShow(){
		$(".resOpenCloseDetails").hide();
        $(".errorTime").html('');
        $("#selectopen").prop('checked', false);
        $("#selectclose").prop('checked', false);
        $("#selectsecondopen").prop('checked', false);
        $("#selectsecondclose").prop('checked', false);
		$("#editOpenClose").show();
	}
	function backOpenAndCloseInfo(){
		$(".resOpenCloseDetails").show();
		$("#editOpenClose").hide();
	}
	//--------------------------------------
	function editOpenCloseInfoValidate_BackupByRaja(){
		
		//Error Language
		var err_lang_arr = error_language();
		
		var restaurant_delivery_mon_open_hr    = $.trim($("#restaurant_delivery_mon_open_hr").val());
		var restaurant_delivery_mon_open_min   = $.trim($("#restaurant_delivery_mon_open_min").val());
		var restaurant_delivery_mon_open_sess  = $.trim($("#restaurant_delivery_mon_open_sess").val());
		var restaurant_delivery_mon_close_hr   = $.trim($("#restaurant_delivery_mon_close_hr").val());
		var restaurant_delivery_mon_close_min  = $.trim($("#restaurant_delivery_mon_close_min").val());
		var restaurant_delivery_mon_close_sess = $.trim($("#restaurant_delivery_mon_close_sess").val());
		
		var restaurant_delivery_tue_open_hr    = $.trim($("#restaurant_delivery_tue_open_hr").val());
		var restaurant_delivery_tue_open_min   = $.trim($("#restaurant_delivery_tue_open_min").val());
		var restaurant_delivery_tue_open_sess  = $.trim($("#restaurant_delivery_tue_open_sess").val());
		var restaurant_delivery_tue_close_hr   = $.trim($("#restaurant_delivery_tue_close_hr").val());
		var restaurant_delivery_tue_close_min  = $.trim($("#restaurant_delivery_tue_close_min").val());
		var restaurant_delivery_tue_close_sess = $.trim($("#restaurant_delivery_tue_close_sess").val());
		
		var restaurant_delivery_wed_open_hr    = $.trim($("#restaurant_delivery_wed_open_hr").val());
		var restaurant_delivery_wed_open_min   = $.trim($("#restaurant_delivery_wed_open_min").val());
		var restaurant_delivery_wed_open_sess  = $.trim($("#restaurant_delivery_wed_open_sess").val());
		var restaurant_delivery_wed_close_hr   = $.trim($("#restaurant_delivery_wed_close_hr").val());
		var restaurant_delivery_wed_close_min  = $.trim($("#restaurant_delivery_wed_close_min").val());
		var restaurant_delivery_wed_close_sess = $.trim($("#restaurant_delivery_wed_close_sess").val());
		
		var restaurant_delivery_thu_open_hr    = $.trim($("#restaurant_delivery_thu_open_hr").val());
		var restaurant_delivery_thu_open_min   = $.trim($("#restaurant_delivery_thu_open_min").val());
		var restaurant_delivery_thu_open_sess  = $.trim($("#restaurant_delivery_thu_open_sess").val());
		var restaurant_delivery_thu_close_hr   = $.trim($("#restaurant_delivery_thu_close_hr").val());
		var restaurant_delivery_thu_close_min  = $.trim($("#restaurant_delivery_thu_close_min").val());
		var restaurant_delivery_thu_close_sess = $.trim($("#restaurant_delivery_thu_close_sess").val());
		
		var restaurant_delivery_fri_open_hr    = $.trim($("#restaurant_delivery_fri_open_hr").val());
		var restaurant_delivery_fri_open_min   = $.trim($("#restaurant_delivery_fri_open_min").val());
		var restaurant_delivery_fri_open_sess  = $.trim($("#restaurant_delivery_fri_open_sess").val());
		var restaurant_delivery_fri_close_hr   = $.trim($("#restaurant_delivery_fri_close_hr").val());
		var restaurant_delivery_fri_close_min  = $.trim($("#restaurant_delivery_fri_close_min").val());
		var restaurant_delivery_fri_close_sess = $.trim($("#restaurant_delivery_fri_close_sess").val());
		
		var restaurant_delivery_sat_open_hr    = $.trim($("#restaurant_delivery_sat_open_hr").val());
		var restaurant_delivery_sat_open_min   = $.trim($("#restaurant_delivery_sat_open_min").val());
		var restaurant_delivery_sat_open_sess  = $.trim($("#restaurant_delivery_sat_open_sess").val());
		var restaurant_delivery_sat_close_hr   = $.trim($("#restaurant_delivery_sat_close_hr").val());
		var restaurant_delivery_sat_close_min  = $.trim($("#restaurant_delivery_sat_close_min").val());
		var restaurant_delivery_sat_close_sess = $.trim($("#restaurant_delivery_sat_close_sess").val());
		
		var restaurant_delivery_sun_open_hr    = $.trim($("#restaurant_delivery_sun_open_hr").val());
		var restaurant_delivery_sun_open_min   = $.trim($("#restaurant_delivery_sun_open_min").val());
		var restaurant_delivery_sun_open_sess  = $.trim($("#restaurant_delivery_sun_open_sess").val());
		var restaurant_delivery_sun_close_hr   = $.trim($("#restaurant_delivery_sun_close_hr").val());
		var restaurant_delivery_sun_close_min  = $.trim($("#restaurant_delivery_sun_close_min").val());
		var restaurant_delivery_sun_close_sess = $.trim($("#restaurant_delivery_sun_close_sess").val());
		
		if(restaurant_delivery_mon_open_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_monopenhr']);
			$("#restaurant_delivery_mon_open_hr").focus();
			return false;		
		}else if(restaurant_delivery_mon_open_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_monopenmin']);
			$("#restaurant_delivery_mon_open_min").focus();
			return false;	
		}else if(restaurant_delivery_mon_close_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_monclosehr']);
			$("#restaurant_delivery_mon_close_hr").focus();
			return false;	
		}else if(restaurant_delivery_mon_close_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_monclosemin']);
			$("#restaurant_delivery_mon_close_min").focus();
			return false;	
		}
		
		if(restaurant_delivery_tue_open_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_tueopenhr']);
			$("#restaurant_delivery_tue_open_hr").focus();
			return false;		
		}else if(restaurant_delivery_tue_open_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_tueopenmin']);
			$("#restaurant_delivery_tue_open_min").focus();
			return false;	
		}else if(restaurant_delivery_tue_close_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_tueclosehr']);
			$("#restaurant_delivery_tue_close_hr").focus();
			return false;	
		}else if(restaurant_delivery_tue_close_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_tueclosemin']);
			$("#restaurant_delivery_tue_close_min").focus();
			return false;	
		}
		
		if(restaurant_delivery_wed_open_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_wedopenhr']);
			$("#restaurant_delivery_wed_open_hr").focus();
			return false;		
		}else if(restaurant_delivery_wed_open_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_wedopenmin']);
			$("#restaurant_delivery_wed_open_min").focus();
			return false;	
		}else if(restaurant_delivery_wed_close_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_wedclosehr']);
			$("#restaurant_delivery_wed_close_hr").focus();
			return false;	
		}else if(restaurant_delivery_wed_close_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_wedclosemin']);
			$("#restaurant_delivery_wed_close_min").focus();
			return false;	
		}
		
		if(restaurant_delivery_thu_open_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_thuropenhr']);
			$("#restaurant_delivery_thu_open_hr").focus();
			return false;		
		}else if(restaurant_delivery_thu_open_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_thuropenmin']);
			$("#restaurant_delivery_thu_open_min").focus();
			return false;	
		}else if(restaurant_delivery_thu_close_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_thurclosehr']);
			$("#restaurant_delivery_thu_close_hr").focus();
			return false;	
		}else if(restaurant_delivery_thu_close_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_thurclosemin']);
			$("#restaurant_delivery_thu_close_min").focus();
			return false;	
		}
		
		if(restaurant_delivery_fri_open_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_friopenhr']);
			$("#restaurant_delivery_fri_open_hr").focus();
			return false;		
		}else if(restaurant_delivery_fri_open_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_friopenmin']);
			$("#restaurant_delivery_fri_open_min").focus();
			return false;	
		}else if(restaurant_delivery_fri_close_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_friclosehr']);
			$("#restaurant_delivery_fri_close_hr").focus();
			return false;	
		}else if(restaurant_delivery_fri_close_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_friclosemin']);
			$("#restaurant_delivery_fri_close_min").focus();
			return false;	
		}
		
		if(restaurant_delivery_sat_open_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_satopenhr']);
			$("#restaurant_delivery_sat_open_hr").focus();
			return false;		
		}else if(restaurant_delivery_sat_open_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_satopenmin']);
			$("#restaurant_delivery_sat_open_min").focus();
			return false;	
		}else if(restaurant_delivery_sat_close_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_satclosehr']);
			$("#restaurant_delivery_sat_close_hr").focus();
			return false;	
		}else if(restaurant_delivery_sat_close_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_satclosemin']);
			$("#restaurant_delivery_sat_close_min").focus();
			return false;	
		}
		
		if(restaurant_delivery_sun_open_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_sunopenhr']);
			$("#restaurant_delivery_sun_open_hr").focus();
			return false;		
		}else if(restaurant_delivery_sun_open_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_sunopenmin']);
			$("#restaurant_delivery_sun_open_min").focus();
			return false;	
		}else if(restaurant_delivery_sun_close_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_sunclosehr']);
			$("#restaurant_delivery_sun_close_hr").focus();
			return false;	
		}else if(restaurant_delivery_sun_close_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_sunclosemin']);
			$("#restaurant_delivery_sun_close_min").focus();
			return false;	
		}
		
		$.post(jssitebaseUrl+'/ajaxFile.php',{'restaurant_delivery_mon_open_hr':restaurant_delivery_mon_open_hr,'restaurant_delivery_mon_open_min':restaurant_delivery_mon_open_min,'restaurant_delivery_mon_open_sess':restaurant_delivery_mon_open_sess,'restaurant_delivery_mon_close_hr':restaurant_delivery_mon_close_hr,'restaurant_delivery_mon_close_min':restaurant_delivery_mon_close_min,'restaurant_delivery_mon_close_sess':restaurant_delivery_mon_close_sess,'restaurant_delivery_tue_open_hr':restaurant_delivery_tue_open_hr,'restaurant_delivery_tue_open_min':restaurant_delivery_tue_open_min,'restaurant_delivery_tue_open_sess':restaurant_delivery_tue_open_sess,'restaurant_delivery_tue_close_hr':restaurant_delivery_tue_close_hr,'restaurant_delivery_tue_close_min':restaurant_delivery_tue_close_min,'restaurant_delivery_tue_close_sess':restaurant_delivery_tue_close_sess,'restaurant_delivery_wed_open_hr':restaurant_delivery_wed_open_hr,'restaurant_delivery_wed_open_min':restaurant_delivery_wed_open_min,'restaurant_delivery_wed_open_sess':restaurant_delivery_wed_open_sess,'restaurant_delivery_wed_close_hr':restaurant_delivery_wed_close_hr,'restaurant_delivery_wed_close_min':restaurant_delivery_wed_close_min,'restaurant_delivery_wed_close_sess':restaurant_delivery_wed_close_sess,'restaurant_delivery_thu_open_hr':restaurant_delivery_thu_open_hr,'restaurant_delivery_thu_open_min':restaurant_delivery_thu_open_min,'restaurant_delivery_thu_open_sess':restaurant_delivery_thu_open_sess,'restaurant_delivery_thu_close_hr':restaurant_delivery_thu_close_hr,'restaurant_delivery_thu_close_min':restaurant_delivery_thu_close_min,'restaurant_delivery_thu_close_sess':restaurant_delivery_thu_close_sess,'restaurant_delivery_fri_open_hr':restaurant_delivery_fri_open_hr,'restaurant_delivery_fri_open_min':restaurant_delivery_fri_open_min,'restaurant_delivery_fri_open_sess':restaurant_delivery_fri_open_sess,'restaurant_delivery_fri_close_hr':restaurant_delivery_fri_close_hr,'restaurant_delivery_fri_close_min':restaurant_delivery_fri_close_min,'restaurant_delivery_fri_close_sess':restaurant_delivery_fri_close_sess,'restaurant_delivery_sat_open_hr':restaurant_delivery_sat_open_hr,'restaurant_delivery_sat_open_min':restaurant_delivery_sat_open_min,'restaurant_delivery_sat_open_sess':restaurant_delivery_sat_open_sess,'restaurant_delivery_sat_close_hr':restaurant_delivery_sat_close_hr,'restaurant_delivery_sat_close_min':restaurant_delivery_sat_close_min,'restaurant_delivery_sat_close_sess':restaurant_delivery_sat_close_sess,'restaurant_delivery_sun_open_hr':restaurant_delivery_sun_open_hr,'restaurant_delivery_sun_open_min':restaurant_delivery_sun_open_min,'restaurant_delivery_sun_open_sess':restaurant_delivery_sun_open_sess,'restaurant_delivery_sun_close_hr':restaurant_delivery_sun_close_hr,'restaurant_delivery_sun_close_min':restaurant_delivery_sun_close_min,'restaurant_delivery_sun_close_sess':restaurant_delivery_sun_close_sess,'action':'restaurantEditOpenCloseInfo'}, function(output){
			//alert(output);
			if(output == 'success'){
				$(".resOpenCloseDetails").load(jssitebaseUrl+"/ajaxActionRestaurant.php",{'action':'resownerEditOpenCloseInfoList'});
                $("#rest_status").load(jssitebaseUrl+"/ajaxActionRestaurant.php",{'action':'rest_status'});
				$("#openCloseErr").addClass('succmsg').html(err_lang_arr['res_open_close_up_success']).show();
				setTimeout(function() { 
    				$("#editOpenClose").hide();
				    $(".resOpenCloseDetails").show();
                    $("#openCloseErr").hide();
    				$("#openCloseErr").removeClass('succmsg'); 
                }, 2000);
			}
		});
	}
	
	//--------------------------------------
	function editOpenCloseInfoValidate(){
				
		//Error Language
		var err_lang_arr = error_language();
		
		var restaurant_delivery_mon_open_hr    = $.trim($("#restaurant_delivery_mon_open_hr").val());
		var restaurant_delivery_mon_open_min   = $.trim($("#restaurant_delivery_mon_open_min").val());
		var restaurant_delivery_mon_open_sess  = $.trim($("#restaurant_delivery_mon_open_sess").val());
		var restaurant_delivery_mon_close_hr   = $.trim($("#restaurant_delivery_mon_close_hr").val());
		var restaurant_delivery_mon_close_min  = $.trim($("#restaurant_delivery_mon_close_min").val());
		var restaurant_delivery_mon_close_sess = $.trim($("#restaurant_delivery_mon_close_sess").val());
		
		var restaurant_delivery_mon_open_hr_second    = $.trim($("#restaurant_delivery_mon_open_hr_second").val());
		var restaurant_delivery_mon_open_min_second  = $.trim($("#restaurant_delivery_mon_open_min_second").val());
		var restaurant_delivery_mon_open_sess_second  = $.trim($("#restaurant_delivery_mon_open_sess_second").val());
		var restaurant_delivery_mon_close_hr_second   = $.trim($("#restaurant_delivery_mon_close_hr_second").val());
		var restaurant_delivery_mon_close_min_second  = $.trim($("#restaurant_delivery_mon_close_min_second").val());
		var restaurant_delivery_mon_close_sess_second = $.trim($("#restaurant_delivery_mon_close_sess_second").val());
		
		var restaurant_delivery_tue_open_hr    = $.trim($("#restaurant_delivery_tue_open_hr").val());
		var restaurant_delivery_tue_open_min   = $.trim($("#restaurant_delivery_tue_open_min").val());
		var restaurant_delivery_tue_open_sess  = $.trim($("#restaurant_delivery_tue_open_sess").val());
		var restaurant_delivery_tue_close_hr   = $.trim($("#restaurant_delivery_tue_close_hr").val());
		var restaurant_delivery_tue_close_min  = $.trim($("#restaurant_delivery_tue_close_min").val());
		var restaurant_delivery_tue_close_sess = $.trim($("#restaurant_delivery_tue_close_sess").val());
		
		var restaurant_delivery_tue_open_hr_second    = $.trim($("#restaurant_delivery_tue_open_hr_second").val());
		var restaurant_delivery_tue_open_min_second   = $.trim($("#restaurant_delivery_tue_open_min_second").val());
		var restaurant_delivery_tue_open_sess_second  = $.trim($("#restaurant_delivery_tue_open_sess_second").val());
		var restaurant_delivery_tue_close_hr_second   = $.trim($("#restaurant_delivery_tue_close_hr_second").val());
		var restaurant_delivery_tue_close_min_second  = $.trim($("#restaurant_delivery_tue_close_min_second").val());
		var restaurant_delivery_tue_close_sess_second = $.trim($("#restaurant_delivery_tue_close_sess_second").val());
		
		var restaurant_delivery_wed_open_hr    = $.trim($("#restaurant_delivery_wed_open_hr").val());
		var restaurant_delivery_wed_open_min   = $.trim($("#restaurant_delivery_wed_open_min").val());
		var restaurant_delivery_wed_open_sess  = $.trim($("#restaurant_delivery_wed_open_sess").val());
		var restaurant_delivery_wed_close_hr   = $.trim($("#restaurant_delivery_wed_close_hr").val());
		var restaurant_delivery_wed_close_min  = $.trim($("#restaurant_delivery_wed_close_min").val());
		var restaurant_delivery_wed_close_sess = $.trim($("#restaurant_delivery_wed_close_sess").val());
		
		var restaurant_delivery_wed_open_hr_second    = $.trim($("#restaurant_delivery_wed_open_hr_second").val());
		var restaurant_delivery_wed_open_min_second   = $.trim($("#restaurant_delivery_wed_open_min_second").val());
		var restaurant_delivery_wed_open_sess_second  = $.trim($("#restaurant_delivery_wed_open_sess_second").val());
		var restaurant_delivery_wed_close_hr_second   = $.trim($("#restaurant_delivery_wed_close_hr_second").val());
		var restaurant_delivery_wed_close_min_second  = $.trim($("#restaurant_delivery_wed_close_min_second").val());
		var restaurant_delivery_wed_close_sess_second = $.trim($("#restaurant_delivery_wed_close_sess_second").val());
		
		var restaurant_delivery_thu_open_hr    = $.trim($("#restaurant_delivery_thu_open_hr").val());
		var restaurant_delivery_thu_open_min   = $.trim($("#restaurant_delivery_thu_open_min").val());
		var restaurant_delivery_thu_open_sess  = $.trim($("#restaurant_delivery_thu_open_sess").val());
		var restaurant_delivery_thu_close_hr   = $.trim($("#restaurant_delivery_thu_close_hr").val());
		var restaurant_delivery_thu_close_min  = $.trim($("#restaurant_delivery_thu_close_min").val());
		var restaurant_delivery_thu_close_sess = $.trim($("#restaurant_delivery_thu_close_sess").val());
		
		var restaurant_delivery_thu_open_hr_second    = $.trim($("#restaurant_delivery_thu_open_hr_second").val());
		var restaurant_delivery_thu_open_min_second   = $.trim($("#restaurant_delivery_thu_open_min_second").val());
		var restaurant_delivery_thu_open_sess_second  = $.trim($("#restaurant_delivery_thu_open_sess_second").val());
		var restaurant_delivery_thu_close_hr_second   = $.trim($("#restaurant_delivery_thu_close_hr_second").val());
		var restaurant_delivery_thu_close_min_second  = $.trim($("#restaurant_delivery_thu_close_min_second").val());
		var restaurant_delivery_thu_close_sess_second = $.trim($("#restaurant_delivery_thu_close_sess_second").val());
		
		var restaurant_delivery_fri_open_hr    = $.trim($("#restaurant_delivery_fri_open_hr").val());
		var restaurant_delivery_fri_open_min   = $.trim($("#restaurant_delivery_fri_open_min").val());
		var restaurant_delivery_fri_open_sess  = $.trim($("#restaurant_delivery_fri_open_sess").val());
		var restaurant_delivery_fri_close_hr   = $.trim($("#restaurant_delivery_fri_close_hr").val());
		var restaurant_delivery_fri_close_min  = $.trim($("#restaurant_delivery_fri_close_min").val());
		var restaurant_delivery_fri_close_sess = $.trim($("#restaurant_delivery_fri_close_sess").val());
		
		var restaurant_delivery_fri_open_hr_second    = $.trim($("#restaurant_delivery_fri_open_hr_second").val());
		var restaurant_delivery_fri_open_min_second   = $.trim($("#restaurant_delivery_fri_open_min_second").val());
		var restaurant_delivery_fri_open_sess_second  = $.trim($("#restaurant_delivery_fri_open_sess_second").val());
		var restaurant_delivery_fri_close_hr_second   = $.trim($("#restaurant_delivery_fri_close_hr_second").val());
		var restaurant_delivery_fri_close_min_second  = $.trim($("#restaurant_delivery_fri_close_min_second").val());
		var restaurant_delivery_fri_close_sess_second = $.trim($("#restaurant_delivery_fri_close_sess_second").val());
		
		var restaurant_delivery_sat_open_hr    = $.trim($("#restaurant_delivery_sat_open_hr").val());
		var restaurant_delivery_sat_open_min   = $.trim($("#restaurant_delivery_sat_open_min").val());
		var restaurant_delivery_sat_open_sess  = $.trim($("#restaurant_delivery_sat_open_sess").val());
		var restaurant_delivery_sat_close_hr   = $.trim($("#restaurant_delivery_sat_close_hr").val());
		var restaurant_delivery_sat_close_min  = $.trim($("#restaurant_delivery_sat_close_min").val());
		var restaurant_delivery_sat_close_sess = $.trim($("#restaurant_delivery_sat_close_sess").val());
		
		var restaurant_delivery_sat_open_hr_second    = $.trim($("#restaurant_delivery_sat_open_hr_second").val());
		var restaurant_delivery_sat_open_min_second   = $.trim($("#restaurant_delivery_sat_open_min_second").val());
		var restaurant_delivery_sat_open_sess_second  = $.trim($("#restaurant_delivery_sat_open_sess_second").val());
		var restaurant_delivery_sat_close_hr_second   = $.trim($("#restaurant_delivery_sat_close_hr_second").val());
		var restaurant_delivery_sat_close_min_second  = $.trim($("#restaurant_delivery_sat_close_min_second").val());
		var restaurant_delivery_sat_close_sess_second = $.trim($("#restaurant_delivery_sat_close_sess_second").val());
		
		var restaurant_delivery_sun_open_hr    = $.trim($("#restaurant_delivery_sun_open_hr").val());
		var restaurant_delivery_sun_open_min   = $.trim($("#restaurant_delivery_sun_open_min").val());
		var restaurant_delivery_sun_open_sess  = $.trim($("#restaurant_delivery_sun_open_sess").val());
		var restaurant_delivery_sun_close_hr   = $.trim($("#restaurant_delivery_sun_close_hr").val());
		var restaurant_delivery_sun_close_min  = $.trim($("#restaurant_delivery_sun_close_min").val());
		var restaurant_delivery_sun_close_sess = $.trim($("#restaurant_delivery_sun_close_sess").val());
		
		var restaurant_delivery_sun_open_hr_second    = $.trim($("#restaurant_delivery_sun_open_hr_second").val());
		var restaurant_delivery_sun_open_min_second   = $.trim($("#restaurant_delivery_sun_open_min_second").val());
		var restaurant_delivery_sun_open_sess_second  = $.trim($("#restaurant_delivery_sun_open_sess_second").val());
		var restaurant_delivery_sun_close_hr_second   = $.trim($("#restaurant_delivery_sun_close_hr_second").val());
		var restaurant_delivery_sun_close_min_second  = $.trim($("#restaurant_delivery_sun_close_min_second").val());
		var restaurant_delivery_sun_close_sess_second = $.trim($("#restaurant_delivery_sun_close_sess_second").val());
        
        var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
		
		if(restaurant_delivery_mon_open_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_monopenhr']);
			$("#restaurant_delivery_mon_open_hr").focus();
			return false;		
		}else if(restaurant_delivery_mon_open_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_monopenmin']);
			$("#restaurant_delivery_mon_open_min").focus();
			return false;	
		}else if(restaurant_delivery_mon_close_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_monclosehr']);
			$("#restaurant_delivery_mon_close_hr").focus();
			return false;	
		}else if(restaurant_delivery_mon_close_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_monclosemin']);
			$("#restaurant_delivery_mon_close_min").focus();
			return false;	
		}
		
		 if(restaurant_delivery_mon_open_hr_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_monopenhr_sec']);
			$("#restaurant_delivery_mon_open_hr_second").focus();
			return false;		
		}else if(restaurant_delivery_mon_open_min_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_monopenmin_sec']);
			$("#restaurant_delivery_mon_open_min_second").focus();
			return false;	
		}else if(restaurant_delivery_mon_close_hr_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_monclosehr_sec']);
			$("#restaurant_delivery_mon_close_hr_second").focus();
			return false;	
		}else if(restaurant_delivery_mon_close_min_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_monclosemin_sec']);
			$("#restaurant_delivery_mon_close_min_second").focus();
			return false;	
		} 
		
		if(restaurant_delivery_tue_open_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_tueopenhr']);
			$("#restaurant_delivery_tue_open_hr").focus();
			return false;		
		}else if(restaurant_delivery_tue_open_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_tueopenmin']);
			$("#restaurant_delivery_tue_open_min").focus();
			return false;	
		}else if(restaurant_delivery_tue_close_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_tueclosehr']);
			$("#restaurant_delivery_tue_close_hr").focus();
			return false;	
		}else if(restaurant_delivery_tue_close_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_tueclosemin']);
			$("#restaurant_delivery_tue_close_min").focus();
			return false;	
		}
        
         if(restaurant_delivery_tue_open_hr_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_tueopenhr_sec']);
			$("#restaurant_delivery_tue_open_hr_second").focus();
			return false;		
		}else if(restaurant_delivery_tue_open_min_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_tueopenmin_sec']);
			$("#restaurant_delivery_tue_open_min_second").focus();
			return false;	
		}else if(restaurant_delivery_tue_close_hr_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_tueclosehr_sec']);
			$("#restaurant_delivery_tue_close_hr").focus();
			return false;	
		}else if(restaurant_delivery_tue_close_min_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_tueclosemin_sec']);
			$("#restaurant_delivery_tue_close_min_second").focus();
			return false;	
		} 
		
		if(restaurant_delivery_wed_open_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_wedopenhr']);
			$("#restaurant_delivery_wed_open_hr").focus();
			return false;		
		}else if(restaurant_delivery_wed_open_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_wedopenmin']);
			$("#restaurant_delivery_wed_open_min").focus();
			return false;	
		}else if(restaurant_delivery_wed_close_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_wedclosehr']);
			$("#restaurant_delivery_wed_close_hr").focus();
			return false;	
		}else if(restaurant_delivery_wed_close_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_wedclosemin']);
			$("#restaurant_delivery_wed_close_min").focus();
			return false;	
		}
        
         if(restaurant_delivery_wed_open_hr_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_wedopenhr_sec']);
			$("#restaurant_delivery_wed_open_hr_second").focus();
			return false;		
		}else if(restaurant_delivery_wed_open_min_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_wedopenmin_sec']);
			$("#restaurant_delivery_wed_open_min_second").focus();
			return false;	
		}else if(restaurant_delivery_wed_close_hr_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_wedclosehr_sec']);
			$("#restaurant_delivery_wed_close_hr_second").focus();
			return false;	
		}else if(restaurant_delivery_wed_close_min_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_wedclosemin_sec']);
			$("#restaurant_delivery_wed_close_min_second").focus();
			return false;	
		} 
		
		if(restaurant_delivery_thu_open_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_thuropenhr']);
			$("#restaurant_delivery_thu_open_hr").focus();
			return false;		
		}else if(restaurant_delivery_thu_open_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_thuropenmin']);
			$("#restaurant_delivery_thu_open_min").focus();
			return false;	
		}else if(restaurant_delivery_thu_close_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_thurclosehr']);
			$("#restaurant_delivery_thu_close_hr").focus();
			return false;	
		}else if(restaurant_delivery_thu_close_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_thurclosemin']);
			$("#restaurant_delivery_thu_close_min").focus();
			return false;	
		}
        
         if(restaurant_delivery_thu_open_hr_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_thuropenhr_sec']);
			$("#restaurant_delivery_thu_open_hr_second").focus();
			return false;		
		}else if(restaurant_delivery_thu_open_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_thuropenmin_sec']);
			$("#restaurant_delivery_thu_open_min_second").focus();
			return false;	
		}else if(restaurant_delivery_thu_close_hr_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_thurclosehr_sec']);
			$("#restaurant_delivery_thu_close_hr_second").focus();
			return false;	
		}else if(restaurant_delivery_thu_close_min_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_thurclosemin_sec']);
			$("#restaurant_delivery_thu_close_min_second").focus();
			return false;	
		} 
		
		if(restaurant_delivery_fri_open_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_friopenhr']);
			$("#restaurant_delivery_fri_open_hr").focus();
			return false;		
		}else if(restaurant_delivery_fri_open_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_friopenmin']);
			$("#restaurant_delivery_fri_open_min").focus();
			return false;	
		}else if(restaurant_delivery_fri_close_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_friclosehr']);
			$("#restaurant_delivery_fri_close_hr").focus();
			return false;	
		}else if(restaurant_delivery_fri_close_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_friclosemin']);
			$("#restaurant_delivery_fri_close_min").focus();
			return false;	
		}
        
         if(restaurant_delivery_fri_open_hr_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_friopenhr_sec']);
			$("#restaurant_delivery_fri_open_hr_second").focus();
			return false;		
		}else if(restaurant_delivery_fri_open_min_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_friopenmin_sec']);
			$("#restaurant_delivery_fri_open_min_second").focus();
			return false;	
		}else if(restaurant_delivery_fri_close_hr_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_friclosehr_sec']);
			$("#restaurant_delivery_fri_close_hr_second").focus();
			return false;	
		}else if(restaurant_delivery_fri_close_min_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_friclosemin_sec']);
			$("#restaurant_delivery_fri_close_min_second").focus();
			return false;	
		} 
		
		if(restaurant_delivery_sat_open_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_satopenhr']);
			$("#restaurant_delivery_sat_open_hr").focus();
			return false;		
		}else if(restaurant_delivery_sat_open_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_satopenmin']);
			$("#restaurant_delivery_sat_open_min").focus();
			return false;	
		}else if(restaurant_delivery_sat_close_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_satclosehr']);
			$("#restaurant_delivery_sat_close_hr").focus();
			return false;	
		}else if(restaurant_delivery_sat_close_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_satclosemin']);
			$("#restaurant_delivery_sat_close_min").focus();
			return false;	
		}
        
         if(restaurant_delivery_sat_open_hr_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_satopenhr_sec']);
			$("#restaurant_delivery_sat_open_hr_second").focus();
			return false;		
		}else if(restaurant_delivery_sat_open_min_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_satopenmin_sec']);
			$("#restaurant_delivery_sat_open_min_second").focus();
			return false;	
		}else if(restaurant_delivery_sat_close_hr_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_satclosehr_sec']);
			$("#restaurant_delivery_sat_close_hr_second").focus();
			return false;	
		}else if(restaurant_delivery_sat_close_min_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_satclosemin_sec']);
			$("#restaurant_delivery_sat_close_min_second").focus();
			return false;	
		} 
		
		if(restaurant_delivery_sun_open_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_sunopenhr']);
			$("#restaurant_delivery_sun_open_hr").focus();
			return false;		
		}else if(restaurant_delivery_sun_open_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_sunopenmin']);
			$("#restaurant_delivery_sun_open_min").focus();
			return false;	
		}else if(restaurant_delivery_sun_close_hr == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_sunclosehr']);
			$("#restaurant_delivery_sun_close_hr").focus();
			return false;	
		}else if(restaurant_delivery_sun_close_min == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_sunclosemin']);
			$("#restaurant_delivery_sun_close_min").focus();
			return false;	
		}
        
         if(restaurant_delivery_sun_open_hr_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_sunopenhr_sec']);
			$("#restaurant_delivery_sun_open_hr_second").focus();
			return false;		
		}else if(restaurant_delivery_sun_open_min_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_sunopenmin_sec']);
			$("#restaurant_delivery_sun_open_min_second").focus();
			return false;	
		}else if(restaurant_delivery_sun_close_hr_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_sunclosehr_sec']);
			$("#restaurant_delivery_sun_close_hr").focus();
			return false;	
		}else if(restaurant_delivery_sun_close_min_second == ''){
			$(".errorTime").html(err_lang_arr['res_owner_setting_sunclosemin_sec']);
			$("#restaurant_delivery_sun_close_min").focus();
			return false;	
		} 
		
		$.post(jssitebaseUrl+useFile,{'restaurant_delivery_mon_open_hr':restaurant_delivery_mon_open_hr,'restaurant_delivery_mon_open_min':restaurant_delivery_mon_open_min,'restaurant_delivery_mon_open_sess':restaurant_delivery_mon_open_sess,'restaurant_delivery_mon_close_hr':restaurant_delivery_mon_close_hr,'restaurant_delivery_mon_close_min':restaurant_delivery_mon_close_min,'restaurant_delivery_mon_close_sess':restaurant_delivery_mon_close_sess,'restaurant_delivery_tue_open_hr':restaurant_delivery_tue_open_hr,'restaurant_delivery_tue_open_min':restaurant_delivery_tue_open_min,'restaurant_delivery_tue_open_sess':restaurant_delivery_tue_open_sess,'restaurant_delivery_tue_close_hr':restaurant_delivery_tue_close_hr,'restaurant_delivery_tue_close_min':restaurant_delivery_tue_close_min,'restaurant_delivery_tue_close_sess':restaurant_delivery_tue_close_sess,'restaurant_delivery_wed_open_hr':restaurant_delivery_wed_open_hr,'restaurant_delivery_wed_open_min':restaurant_delivery_wed_open_min,'restaurant_delivery_wed_open_sess':restaurant_delivery_wed_open_sess,'restaurant_delivery_wed_close_hr':restaurant_delivery_wed_close_hr,'restaurant_delivery_wed_close_min':restaurant_delivery_wed_close_min,'restaurant_delivery_wed_close_sess':restaurant_delivery_wed_close_sess,'restaurant_delivery_thu_open_hr':restaurant_delivery_thu_open_hr,'restaurant_delivery_thu_open_min':restaurant_delivery_thu_open_min,'restaurant_delivery_thu_open_sess':restaurant_delivery_thu_open_sess,'restaurant_delivery_thu_close_hr':restaurant_delivery_thu_close_hr,'restaurant_delivery_thu_close_min':restaurant_delivery_thu_close_min,'restaurant_delivery_thu_close_sess':restaurant_delivery_thu_close_sess,'restaurant_delivery_fri_open_hr':restaurant_delivery_fri_open_hr,'restaurant_delivery_fri_open_min':restaurant_delivery_fri_open_min,'restaurant_delivery_fri_open_sess':restaurant_delivery_fri_open_sess,'restaurant_delivery_fri_close_hr':restaurant_delivery_fri_close_hr,'restaurant_delivery_fri_close_min':restaurant_delivery_fri_close_min,'restaurant_delivery_fri_close_sess':restaurant_delivery_fri_close_sess,'restaurant_delivery_sat_open_hr':restaurant_delivery_sat_open_hr,'restaurant_delivery_sat_open_min':restaurant_delivery_sat_open_min,'restaurant_delivery_sat_open_sess':restaurant_delivery_sat_open_sess,'restaurant_delivery_sat_close_hr':restaurant_delivery_sat_close_hr,'restaurant_delivery_sat_close_min':restaurant_delivery_sat_close_min,'restaurant_delivery_sat_close_sess':restaurant_delivery_sat_close_sess,'restaurant_delivery_sun_open_hr':restaurant_delivery_sun_open_hr,'restaurant_delivery_sun_open_min':restaurant_delivery_sun_open_min,'restaurant_delivery_sun_open_sess':restaurant_delivery_sun_open_sess,'restaurant_delivery_sun_close_hr':restaurant_delivery_sun_close_hr,'restaurant_delivery_sun_close_min':restaurant_delivery_sun_close_min,'restaurant_delivery_sun_close_sess':restaurant_delivery_sun_close_sess,'restaurant_delivery_mon_open_hr_second':restaurant_delivery_mon_open_hr_second,'restaurant_delivery_mon_open_min_second':restaurant_delivery_mon_open_min_second,'restaurant_delivery_mon_open_sess_second':restaurant_delivery_mon_open_sess_second,'restaurant_delivery_mon_close_hr_second':restaurant_delivery_mon_close_hr_second,'restaurant_delivery_mon_close_min_second':restaurant_delivery_mon_close_min_second,'restaurant_delivery_mon_close_sess_second':restaurant_delivery_mon_close_sess_second,'restaurant_delivery_tue_open_hr_second':restaurant_delivery_tue_open_hr_second,'restaurant_delivery_tue_open_min_second':restaurant_delivery_tue_open_min_second,'restaurant_delivery_tue_open_sess_second':restaurant_delivery_tue_open_sess_second,'restaurant_delivery_tue_close_hr_second':restaurant_delivery_tue_close_hr_second,'restaurant_delivery_tue_close_min_second':restaurant_delivery_tue_close_min_second,'restaurant_delivery_tue_close_sess_second':restaurant_delivery_tue_close_sess_second,'restaurant_delivery_wed_open_hr_second':restaurant_delivery_wed_open_hr_second,'restaurant_delivery_wed_open_min_second':restaurant_delivery_wed_open_min_second,'restaurant_delivery_wed_open_sess_second':restaurant_delivery_wed_open_sess_second,'restaurant_delivery_wed_close_hr_second':restaurant_delivery_wed_close_hr_second,'restaurant_delivery_wed_close_min_second':restaurant_delivery_wed_close_min_second,'restaurant_delivery_wed_close_sess_second':restaurant_delivery_wed_close_sess_second,'restaurant_delivery_thu_open_hr_second':restaurant_delivery_thu_open_hr_second,'restaurant_delivery_thu_open_min_second':restaurant_delivery_thu_open_min_second,'restaurant_delivery_thu_open_sess_second':restaurant_delivery_thu_open_sess_second,'restaurant_delivery_thu_close_hr_second':restaurant_delivery_thu_close_hr_second,'restaurant_delivery_thu_close_min_second':restaurant_delivery_thu_close_min_second,'restaurant_delivery_thu_close_sess_second':restaurant_delivery_thu_close_sess_second,'restaurant_delivery_fri_open_hr_second':restaurant_delivery_fri_open_hr_second,'restaurant_delivery_fri_open_min_second':restaurant_delivery_fri_open_min_second,'restaurant_delivery_fri_open_sess_second':restaurant_delivery_fri_open_sess_second,'restaurant_delivery_fri_close_hr_second':restaurant_delivery_fri_close_hr_second,'restaurant_delivery_fri_close_min_second':restaurant_delivery_fri_close_min_second,'restaurant_delivery_fri_close_sess_second':restaurant_delivery_fri_close_sess_second,'restaurant_delivery_sat_open_hr_second':restaurant_delivery_sat_open_hr_second,'restaurant_delivery_sat_open_min_second':restaurant_delivery_sat_open_min_second,'restaurant_delivery_sat_open_sess_second':restaurant_delivery_sat_open_sess_second,'restaurant_delivery_sat_close_hr_second':restaurant_delivery_sat_close_hr_second,'restaurant_delivery_sat_close_min_second':restaurant_delivery_sat_close_min_second,'restaurant_delivery_sat_close_sess_second':restaurant_delivery_sat_close_sess_second,'restaurant_delivery_sun_open_hr_second':restaurant_delivery_sun_open_hr_second,'restaurant_delivery_sun_open_min_second':restaurant_delivery_sun_open_min_second,'restaurant_delivery_sun_open_sess_second':restaurant_delivery_sun_open_sess_second,'restaurant_delivery_sun_close_hr_second':restaurant_delivery_sun_close_hr_second,'restaurant_delivery_sun_close_min_second':restaurant_delivery_sun_close_min_second,'restaurant_delivery_sun_close_sess_second':restaurant_delivery_sun_close_sess_second,'action':'restaurantEditOpenCloseInfo'}, function(output){
			//alert(output);
			if(output == 'success'){
				$(".resOpenCloseDetails").load(jssitebaseUrl+"/ajaxActionRestaurant.php?action=resownerEditOpenCloseInfoList");
                //$("#rest_status").load(jssitebaseUrl+"/ajaxActionRestaurant.php?action=rest_status");
                var filename = $(location).attr('href');
                    //alert(filename); return false;
                    $('body').load(filename);
				//$("#openCloseErr").addClass('succmsg').html(err_lang_arr['res_open_close_up_success']).show();
				setTimeout(function() { 
    				$("#editOpenClose").hide();
				    $(".resOpenCloseDetails").show();
                    $("#openCloseErr").hide();
    				$("#openCloseErr").removeClass('succmsg'); 
                    
                }, 2000);
                
			}
		});
	}
	
	//Change Select All Open Time
	function selectAllOpeningTime(){
		
		var opentimehrs    = $("#restaurant_delivery_mon_open_hr").val();
		var opentimemins   = $("#restaurant_delivery_mon_open_min").val();
		var opentimesess   = $("#restaurant_delivery_mon_open_sess").val();
		
		if( (opentimehrs == "") || (opentimemins == "") ){
			$("#resSelectAllOpenErr").html(err_lang_arr['resmycc_plz_sel_mon_open_time']).show();
			$("#selectopen").attr('checked',false);
			return false;
		}else{
			$("#resSelectAllOpenErr").hide();
			
			//Tues
			$('#restaurant_delivery_tue_open_hr').val(opentimehrs);
			$('#restaurant_delivery_tue_open_min').val(opentimemins);
			$('#restaurant_delivery_tue_open_sess').val(opentimesess);
			//wed
			$('#restaurant_delivery_wed_open_hr').val(opentimehrs);
			$('#restaurant_delivery_wed_open_min').val(opentimemins);
			$('#restaurant_delivery_wed_open_sess').val(opentimesess);
			//thu
			$('#restaurant_delivery_thu_open_hr').val(opentimehrs);
			$('#restaurant_delivery_thu_open_min').val(opentimemins);
			$('#restaurant_delivery_thu_open_sess').val(opentimesess);
			//fri
			$('#restaurant_delivery_fri_open_hr').val(opentimehrs);
			$('#restaurant_delivery_fri_open_min').val(opentimemins);
			$('#restaurant_delivery_fri_open_sess').val(opentimesess);
			//sat
			$('#restaurant_delivery_sat_open_hr').val(opentimehrs);
			$('#restaurant_delivery_sat_open_min').val(opentimemins);
			$('#restaurant_delivery_sat_open_sess').val(opentimesess);
			//sun
			$('#restaurant_delivery_sun_open_hr').val(opentimehrs);
			$('#restaurant_delivery_sun_open_min').val(opentimemins);
			$('#restaurant_delivery_sun_open_sess').val(opentimesess);
		}
	}
	//Change Select All Close Time
	function selectAllCloseingTime(){
		
		var closetimehrs    = $("#restaurant_delivery_mon_close_hr").val();
		var closetimemins   = $("#restaurant_delivery_mon_close_min").val();
		var closetimesess   = $("#restaurant_delivery_mon_close_sess").val();
		
		if( (closetimehrs == "") || (closetimemins == "")  ){
			$("#resSelectAllCloseErr").html(err_lang_arr['resmycc_plz_sel_mon_close_time']).show();
			$("#selectclose").attr('checked',false);
			return false;
		}else{
			$("#resSelectAllCloseErr").hide();
			
			//Tues
			$('#restaurant_delivery_tue_close_hr').val(closetimehrs);
			$('#restaurant_delivery_tue_close_min').val(closetimemins);
			$('#restaurant_delivery_tue_close_sess').val(closetimesess);
			//wed
			$('#restaurant_delivery_wed_close_hr').val(closetimehrs);
			$('#restaurant_delivery_wed_close_min').val(closetimemins);
			$('#restaurant_delivery_wed_close_sess').val(closetimesess);
			//thu
			$('#restaurant_delivery_thu_close_hr').val(closetimehrs);
			$('#restaurant_delivery_thu_close_min').val(closetimemins);
			$('#restaurant_delivery_thu_close_sess').val(closetimesess);
			//fri
			$('#restaurant_delivery_fri_close_hr').val(closetimehrs);
			$('#restaurant_delivery_fri_close_min').val(closetimemins);
			$('#restaurant_delivery_fri_close_sess').val(closetimesess);
			//sat
			$('#restaurant_delivery_sat_close_hr').val(closetimehrs);
			$('#restaurant_delivery_sat_close_min').val(closetimemins);
			$('#restaurant_delivery_sat_close_sess').val(closetimesess);
			//sun
			$('#restaurant_delivery_sun_close_hr').val(closetimehrs);
			$('#restaurant_delivery_sun_close_min').val(closetimemins);
			$('#restaurant_delivery_sun_close_sess').val(closetimesess);
		}
	}
	
	//Change Select All Second Open Time
	function selectAllSecondOpeningTime(){
		
		var opentimehrs    = $("#restaurant_delivery_mon_open_hr_second").val();
		var opentimemins   = $("#restaurant_delivery_mon_open_min_second").val();
		var opentimesess   = $("#restaurant_delivery_mon_open_sess_second").val();
		
		/** if( opentimehrs == "" || opentimemins == "" ){
			$("#resSelectAllOpenErr").html("Please select monday second opening time").show();
			$("#selectsecondopen").attr('checked',false);
			return false;
		}else{
			$("#resSelectAllSecondOpenErr").hide(); **/
			
			//Tues
			$('#restaurant_delivery_tue_open_hr_second').val(opentimehrs);
			$('#restaurant_delivery_tue_open_min_second').val(opentimemins);
			$('#restaurant_delivery_tue_open_sess_second').val(opentimesess);
			//wed
			$('#restaurant_delivery_wed_open_hr_second').val(opentimehrs);
			$('#restaurant_delivery_wed_open_min_second').val(opentimemins);
			$('#restaurant_delivery_wed_open_sess_second').val(opentimesess);
			//thu
			$('#restaurant_delivery_thu_open_hr_second').val(opentimehrs);
			$('#restaurant_delivery_thu_open_min_second').val(opentimemins);
			$('#restaurant_delivery_thu_open_sess_second').val(opentimesess);
			//fri
			$('#restaurant_delivery_fri_open_hr_second').val(opentimehrs);
			$('#restaurant_delivery_fri_open_min_second').val(opentimemins);
			$('#restaurant_delivery_fri_open_sess_second').val(opentimesess);
			//sat
			$('#restaurant_delivery_sat_open_hr_second').val(opentimehrs);
			$('#restaurant_delivery_sat_open_min_second').val(opentimemins);
			$('#restaurant_delivery_sat_open_sess_second').val(opentimesess);
			//sun
			$('#restaurant_delivery_sun_open_hr_second').val(opentimehrs);
			$('#restaurant_delivery_sun_open_min_second').val(opentimemins);
			$('#restaurant_delivery_sun_open_sess_second').val(opentimesess);
		}
	
	
	//Change Select All Close Time
	function selectAllSecondCloseingTime(){
		
		var closetimehrs    = $("#restaurant_delivery_mon_close_hr_second").val();
		var closetimemins   = $("#restaurant_delivery_mon_close_min_second").val();
		var closetimesess   = $("#restaurant_delivery_mon_close_sess_second").val();
		
		/** if( closetimehrs == "" || closetimemins == "" ){
			$("#resSelectAllSecondCloseErr").html("Please select monday Second closing time").show();
			$("#selectsecondclose").attr('checked',false);
			return false;
		}else{
			$("#resSelectAllSecondCloseErr").hide(); **/
			
			//Tues
			$('#restaurant_delivery_tue_close_hr_second').val(closetimehrs);
			$('#restaurant_delivery_tue_close_min_second').val(closetimemins);
			$('#restaurant_delivery_tue_close_sess_second').val(closetimesess);
			//wed
			$('#restaurant_delivery_wed_close_hr_second').val(closetimehrs);
			$('#restaurant_delivery_wed_close_min_second').val(closetimemins);
			$('#restaurant_delivery_wed_close_sess_second').val(closetimesess);
			//thu
			$('#restaurant_delivery_thu_close_hr_second').val(closetimehrs);
			$('#restaurant_delivery_thu_close_min_second').val(closetimemins);
			$('#restaurant_delivery_thu_close_sess_second').val(closetimesess);
			//fri
			$('#restaurant_delivery_fri_close_hr_second').val(closetimehrs);
			$('#restaurant_delivery_fri_close_min_second').val(closetimemins);
			$('#restaurant_delivery_fri_close_sess_second').val(closetimesess);
			//sat
			$('#restaurant_delivery_sat_close_hr_second').val(closetimehrs);
			$('#restaurant_delivery_sat_close_min_second').val(closetimemins);
			$('#restaurant_delivery_sat_close_sess_second').val(closetimesess);
			//sun
			$('#restaurant_delivery_sun_close_hr_second').val(closetimehrs);
			$('#restaurant_delivery_sun_close_min_second').val(closetimemins);
			$('#restaurant_delivery_sun_close_sess_second').val(closetimesess);
		}
		
	
	function changemonvalopen(){
		$("#selectopen").attr('checked',false);
	}
	function changemonvalclose(){
		$("#selectclose").attr('checked',false);
	}
    function changemonvalsecopen(){
		$("#selectsecondopen").attr('checked',false);
	}
	function changemonvalsecclose(){
		$("#selectsecondclose").attr('checked',false);
	}
	
	
	function resVideoShowornot(){
		//video
		if ($('#restaurant_display_video_yes').is(':checked')) {
		  		  
			var videoval = $.trim($("#restaurant_display_video_yes").val());
			$('#restaurant_video_container').show();
		} else if($('#restaurant_display_video_no').is(':checked')) {
		  
			var videoval = $.trim($("#restaurant_display_video_no").val()); 
			$('#restaurant_video_container').hide();
		}
	}
    
    function resPhotoShowornot() {
        
        //photos
		if($('#restaurant_display_photo_yes').is(':checked')) {
		  
			var photoval = $.trim($("#restaurant_display_photo_yes").val());
			$('#restaurant_display_photos').show();
		} else if($('#restaurant_display_photo_no').is(':checked')) {
		  
			var photoval = $.trim($("#restaurant_display_photo_no").val()); 
			$('#restaurant_display_photos').hide();
		}
    }
    
	function photoVideoDisplayValid(){
		
		//Error Language
		var err_lang_arr = error_language();
		
		var restaurant_video = $('#restaurant_video').val();
        var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
		
		//photo
		if($('#restaurant_display_photo_yes').is(':checked')) {
			var photoval = $.trim($("#restaurant_display_photo_yes").val());
		}else if($('#restaurant_display_photo_no').is(':checked')) {
			var photoval = $.trim($("#restaurant_display_photo_no").val()); 
		}
		
		//video
		if($('#restaurant_display_video_yes').is(':checked')) {
			var videoval = $.trim($("#restaurant_display_video_yes").val());
			if(restaurant_video == '') {
				alert(err_lang_arr['resmycc_plz_enter_videocontent']);
				return false;
			}
			
		}else if($('#restaurant_display_video_no').is(':checked')) {
			var videoval = $.trim($("#restaurant_display_video_no").val()); 
		}
		
		//Market Banner
		if($('#restaurant_display_banner_yes').is(':checked')) {
			var bannerval = $.trim($("#restaurant_display_banner_yes").val());
		}else if($('#restaurant_display_banner_no').is(':checked')) {
			var bannerval = $.trim($("#restaurant_display_banner_no").val()); 
		}
		
		$.post(jssitebaseUrl+useFile,{"photoval":photoval, "videoval":videoval, "bannerval":bannerval, "restaurant_video":restaurant_video, "action":"disOptPhotoVideo"},function(response){
			
			if($.trim(response) == 'success'){
				
				/*$('#succPhotoMsg').html('<div style="text-align:center;"><img src="'+jssitebaseUrl +'/images/loader.gif" border="0" alt="Loading" /><span>Please wait...</span></div>').show();*/
				$("#succPhotoMsg").addClass('succmsg1').html(err_lang_arr['resmycc_value_update_success']).show();
                setTimeout(function(){
                    $('#showVideoYoutube').html(restaurant_video);
                    $("#succPhotoMsg").hide();
                },2000)
				
			}	
			else
				$("#succPhotoMsg").addClass('errormsg').html(err_lang_arr['resmycc_error_occured']);
		});
		return false;
	}
	
	/*------ Edit Bank Info------  */
	function editBankInfoValidate(){
		
		//Error Language
		var err_lang_arr = error_language();
		
		var res_bank_name   	= $.trim($("#res_bank_name").val());
		var res_ac_no   		= $.trim($("#res_ac_no").val());
		var res_routine_no   	= $.trim($("#res_routine_no").val());
		var res_swift_code   	= $.trim($("#res_swift_code").val());
        var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
		
		$(".errClass").html('');
		$("#bankinfo_update").html('');
		
		/*if(res_bank_name == ''){
			$(".resBankNameErr").html(err_lang_arr['res_owner_setting_bank_name']);
			$("#res_bank_name").focus();
			return false;		
		}
		if(res_ac_no == ''){
			$(".resBankAcNoErr").html(err_lang_arr['res_owner_setting_bank_acno']);
			$("#res_ac_no").focus();
			return false;		
		}
		if(res_routine_no == ''){
			$(".resBankRoutineNoErr").html(err_lang_arr['res_owner_setting_routineno']);
			$("#res_routine_no").focus();
			return false;		
		}
		if(res_swift_code == ''){
			$(".resBankSwiftNoErr").html(err_lang_arr['res_owner_setting_swiftno']);
			$("#res_swift_code").focus();
			return false;		
		}*/
		
		$.post(jssitebaseUrl+useFile,{'res_bank_name':res_bank_name, 'res_ac_no':res_ac_no, 'res_routine_no':res_routine_no, 'res_swift_code':res_swift_code, 'action':'restaurantEditBankInfo'}, function(output){
			//alert(output);
			if(output == 'success'){
				
				$("#bankinfo_update").addClass('succmsg').html(err_lang_arr['res_owner_setting_bank_update']);
			}else{
				$("#invoiceinfo_update").html(err_lang_arr['resmycc_bank_error_occured']);
			}
		});
	}
	/*---------- Edit Invoice Info ---------- */
	function editInvoiceInfoValidate(){
		
		//Error Language
		var err_lang_arr = error_language();
		
		var restaurant_inv_setting   	= $.trim($("#restaurant_inv_setting").val());
        var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
		
		$(".errClass").html('');
		$("#invoiceinfo_update").html('');
		
		if(restaurant_inv_setting == ''){
			$(".resInvSettErr").html(err_lang_arr['res_owner_setting_inv_time_period']);
			$("#restaurant_inv_setting").focus();
			return false;		
		}
		
		$.post(jssitebaseUrl+useFile,{'restaurant_inv_setting':restaurant_inv_setting, 'action':'restaurantEditInvoiceInfo'}, function(output){
			//alert(output);
			if(output == 'success'){
				
				$("#invoiceinfo_update").addClass('succmsg').html(err_lang_arr['res_owner_setting_invoice_update']);
			}else{
				$("#invoiceinfo_update").html(err_lang_arr['resmycc_invoice_error_occured']);
			}
		});
	}
//---------------------------------------------------------------------------------------------//
//Myaccount - Settings Tab End
//---------------------------------------------------------------------------------------------//



//---------------------------------------------------------------------------------------------//
//Myaccount - Report Tab Start
//---------------------------------------------------------------------------------------------//
	function report_validate(){
		
		//Error Language
		var err_lang_arr = error_language();
		
		var startdate = $("#report_from").val();
		var enddate   = $("#report_to").val();
		
		fieldDateFirst = startdate.split("-");
		fieldDateSecound = enddate.split("-");
	    var Date1 = new Date();
	    var Date2 = new Date();
	    Date1.setFullYear(fieldDateFirst[2],fieldDateFirst[1]-1,fieldDateFirst[0]);
	 	Date2.setFullYear(fieldDateSecound[2],fieldDateSecound[1]-1,fieldDateSecound[0]);
		
		
		if(startdate == ""){
			alert(err_lang_arr['resmycc_please_enter_from_date']);
			$("#report_from").focus();
			//FormName.report_from.focus();
			return false;
		}
		if(enddate == ""){
			alert(err_lang_arr['resmycc_please_enter_to_date']);
			$("#report_to").focus();
			//FormName.report_to.focus();
			return false;
		}
		if(Date1 > Date2){
			alert("From and To Date combinations are wrong");
			$("#report_from").focus();
			//FormName.report_to.focus();
			return false;
		}
		
		if(startdate != '' && enddate != ''){
			var sortbystatus = "startdate="+startdate+"&enddate="+enddate;
		}
		//alert(sortbystatus);
		//return false;
		//var sortbystatus = "Datewise";
		//alert(sortbystatus);
		$(".restaurantReportContent").load(jssitebaseUrl+"/ajaxActionRestaurant.php", {'action':'Reportdate', 'sortbystatus':sortbystatus , 'startdate':startdate , 'enddate':enddate } );
		//FormName.action	= "restaurantReportmanage.php";
	}
	//----------------------------------------------------------------------------------------
	//Restaurant Photo Add, Update & Delete
	//----------------------------------------------------------------------------------------
	function resownerphotoUpdate(photonumber,mode){
	
			if(mode == 'modify'){
				var ext = $("#restaurant_photos"+photonumber).val().split('.').pop().toLowerCase();
			}
			photo_add1 = $("#restaurant_photo1"+photonumber).val();
			photo_add2 = $("#restaurant_photo2"+photonumber).val();
			
			if(mode == 'add'){
				if(photo_add1 == undefined){
					var ext = $("#restaurant_photo2"+photonumber).val().split('.').pop().toLowerCase();
				}
				if(photo_add2 == undefined){
					var ext = $("#restaurant_photo1"+photonumber).val().split('.').pop().toLowerCase();
				}
				
			}
			
			if($.inArray(ext, ['gif','jpg','jpeg']) == -1)
			{
				$("#succPhotoMsg").addClass('errormsg').html(err_lang_arr['resmycc_please_update_valphoto']);
				return false;
			}
			else{
				document.resOwnerPhotoUpdate.action.value="resOwnerPhotoUpdates";
				document.resOwnerPhotoUpdate.photonumber.value=photonumber;
				document.resOwnerPhotoUpdate.mode.value=mode;
				document.resOwnerPhotoUpdate.submit();		
			}
	
		}
		
	//Delete Restaurant Owner Photo's
	function resownerdeletephotos(restaurantid,fieldnumber){
	
	 	if(fieldnumber != ''){
	 	         var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
			
				if(confirm('Are you sure want to delete?')){
					$.post(jssitebaseUrl+useFile, {'fieldnumber':fieldnumber,'restaurantid':restaurantid, 'action':'resownerdeletePhotos'},function(response){
					//alert(response);	
						if($.trim(response) == "success"){		
							
							$("#res_owner_photo"+fieldnumber).hide();
							$("#res_owner_add_disp_photo"+fieldnumber).show();
							$("#succPhotoMsg").addClass('errormsg').html(err_lang_arr['resmycc_photo']+fieldnumber+err_lang_arr['resmycc_deleted_successfully']);
							return false;
						}else{
							alert(err_lang_arr['resmycc_delete_error']);return false;
						}
					});return false;
				}
		}else{
			alert(err_lang_arr['resmycc_delete_error']);
		}
	}
//----------------------------------------------------------------------------------------
//Restaurant Logo Add, Update & Delete
//----------------------------------------------------------------------------------------
	//Add Restaurant Owner Logo.
	function resownerlogoAdd(){
	
		document.resOwnerPhotoUpdate.action.value="resOwnerLogoAdd";
		document.resOwnerPhotoUpdate.submit();	
	}
	//Update Restaurant Owner Logo.
	function resownerlogoUpdate(){
	
		document.resOwnerPhotoUpdate.action.value="resOwnerLogoUpdates";
		document.resOwnerPhotoUpdate.submit();	
	}	
	//Delete Restaurant Owner Logo.
	function resownerdeletelogo(){
			var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
			if(confirm('Are you sure want to delete?')){
				$.post(jssitebaseUrl+useFile, {'action':'resownerdeleteLogo'},function(response){
				//alert(response);	
					if($.trim(response) == "success"){		
						
						$("#res_owner_logo1").hide();
						$("#res_owner_add_disp_logo").show();
						$("#succPhotoMsg").addClass('errormsg').html(err_lang_arr['resmycc_logo_deleted_success']);
						return false;
					}else{
						alert(err_lang_arr['resmycc_logo_error']);return false;
					}
				});return false;
			}
	}
//----------------------------------------------------------------------------------------
//Restaurant Market Banner Add, Update & Delete
//----------------------------------------------------------------------------------------
	//Add Restaurant Owner Banner.
	function resownerbannerAdd(){
	
		document.resOwnerPhotoUpdate.action.value="resOwnerBannerAdd";
		document.resOwnerPhotoUpdate.submit();
	}
	
	//Update Restaurant Owner Banner.
	function resownerbannerUpdate(){
	
		document.resOwnerPhotoUpdate.action.value="resOwnerBannerUpdates";
		document.resOwnerPhotoUpdate.submit();	
	}
	
	//Delete Restaurant Owner Banner.
	function resownerdeletebanner(restaurantid){
	   var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
	 	if(restaurantid != ''){
			if(confirm('Are you sure want to delete?')){
				$.post(jssitebaseUrl+useFile, {'restaurantid':restaurantid, 'action':'resownerdeleteBanner'},function(response){
				//alert(response);	
					if($.trim(response) == "success"){
						$("#res_owner_banner1").hide();
						$("#res_owner_add_disp_banner").show();
						return false;
					}else{
						alert(err_lang_arr['resmycc_banner_error']);return false;
					}
				});return false;
			}
		}else{
			alert(err_lang_arr['resmycc_banner_error_occured']);
		}
	}
//------------------------------------------------------------------------------------------------------
//Common Method
//------------------------------------------------------------------------------------------------------
//Restaurant Myaccount Status changes
function changeStatusResMyacc(chgeval,mid,actionval){
	
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
	
	if(confirm(str)){
		$(".restaurant"+actionval+"Content").load(jssitebaseUrl+"/ajaxActionRestaurant.php?action="+actionval, {'chgeval':chgeval,'mid':mid} );
        setTimeout(function(){
           $(".succmsg1").html(''); 
        },2000);
	}
}

//Restaurant Myaccount Status changes
function changeStatus(chgeval,mid,actionval,table,fieldname,whereField){
	
    /*alert('chgeval-->'+chgeval);
    alert('mid-->'+mid);
    alert('actionval-->'+actionval);
    alert('table-->'+table);
    alert('fieldname-->'+fieldname);
    alert('whereField-->'+whereField);
    return false;*/
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
	if(chgeval == '1'){
		var str = 'Are you sure want to activate?';
	}else if(chgeval == '2'){
		$.post(jssitebaseUrl+useFile, {'chgeval':chgeval,'mid':mid,'table':table,'fieldname':fieldname, 'whereField':whereField, 'action':actionval},function(response){
		  //alert(response); return false;
          
		});
        setTimeout(function(){
            $(".succmsg1").html('');
        },2000);
	}else if(chgeval == '0'){
		var str = 'Are you sure want to deactivate?';
	}else if(chgeval == 'delete'){
		var str = 'Are you sure want to delete?';
	}else if(chgeval == 'Yes' && actionval == 'Menu'){
		var str = 'Are you sure want to change to popular dish?';
	}else if(chgeval == 'No' && actionval == 'Menu'){
		 str = 'Are you sure want to change to normal dish?';
	}
    
	if(chgeval != '2'){
    	if(confirm(str)){
    		$.post(jssitebaseUrl+useFile, {'chgeval':chgeval,'mid':mid,'table':table,'fieldname':fieldname, 'whereField':whereField, 'action':'changeStatus'},function(response){ 
    		  //alert(response); //return false;
              
              if($.trim(response) == 'success'){
                var filename = $(location).attr('href');
                //alert(filename); return false;
                $('body').load(filename);
                setTimeout(function(){
                if(chgeval == '1'){
                    $(".succmsg1").addClass('ownerSucc').html('Selected '+actionval+' activated successfully');
                }else if(chgeval == '0'){
                    $(".succmsg1").addClass('ownerSucc').html('Selected '+actionval+' deactivated successfully');
                }else if(chgeval == 'delete'){
                    $(".succmsg1").addClass('ownerSucc').html('Selected '+actionval+' deleted successfully');
                }else if(chgeval == 'Yes' && actionval == 'Menu'){
                    $(".succmsg1").addClass('ownerSucc').html('Selected '+actionval+' changed to popular dish successfully');
                }else if(chgeval == 'No' && actionval == 'Menu'){
                    $(".succmsg1").addClass('ownerSucc').html('Selected '+actionval+' changed to normal dish successfully');
                }
                $(".succmsg1").html(''); 
            },10);
                		
                
              }
    		});
            
               
    	}
    }
}
//--------------------------------- End Offer --------------------------------------------

function offerEnd(){
    
    alert('Offer was expired');
}
//------------------------------------------------------------------------------------------------------
//Order Sort By
function changeSortbyStatus(sortbystatus,pagename){
   
	$(".restaurant"+pagename+"Content").load(jssitebaseUrl+"/ajaxActionRestaurant.php?action="+pagename, { 'sortbystatus':sortbystatus } );
}
//Category Sort By
function categorySortbyStatus(sortbystatus,pagename){

	$(".restaurant"+pagename+"Content").load(jssitebaseUrl+"/ajaxActionRestaurant.php?action="+pagename, { 'sortbystatus':sortbystatus } );
}
//------------------------------------------------------------------------------------------------------
//Pagination
function ajaxPagination(page,pagename,sortbystatus){
	//alert(page);alert(pagename);//alert(resid);
	
	if(pagename != '') {
				
                //alert('hi');
		$(".restaurant"+pagename+"Content").load(jssitebaseUrl+"/ajaxActionRestaurant.php?action="+pagename, { 'page':page, 'sortbystatus':sortbystatus } );
	}
}
//-----------------------------------------------------------------------------------------------------
//Pizza Addons In menu mgmt
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

//-----------------------------------------------------------------------------------------------------
//Pizza Addons In menu mgmt
function showSmallPrice_Ajax(){
    
    if($("input#small1:visible").is(':checked') == true){
        $("#smallpriceshow1").show();
        return false;
    }else{
		$("#smallval1").val('');
		$("#smallpriceshow1").hide();
        return false;
	}
	
	/*if(document.getElementById("small1").checked == true){
		$("#smallpriceshow1").show();
	}else{
		$("#smallval1").val('');
		$("#smallpriceshow1").hide();
	}*/	
}
function showMediumPrice_Ajax(){
    if($("input#medium1:visible").is(':checked') == true){
        $("#mediumpriceshow1").show();
        return false;
    }else{
		$("#mediumval1").val('');
		$("#mediumpriceshow1").hide();
        return false;
	}
	
	/*if(document.getElementById("medium1").checked == true){
		$("#mediumpriceshow1").show();
	}else{
		$("#mediumval1").val('');
		$("#mediumpriceshow1").hide();
	}*/	
}
function showLargePrice_Ajax(){
	
    if($("input#large1:visible").is(':checked') == true){
        $("#largepriceshow1").show();
        return false;
    }else{
		$("#largeval1").val('');
		$("#largepriceshow1").hide();
        return false;
	}
    
	/*if(document.getElementById("large1").checked == true){
		$("#largepriceshow1").show();
	}else{
		$("#largeval1").val('');
		$("#largepriceshow1").hide();
	}	*/
}


function pizzacrustfreeoption(){
	$("#showcrustpizzaprice").hide();
}
function pizzacrustpaidoption(){
	$("#showcrustpizzaprice").show();
}
//Restaurant Pizza Addons more option
var special_row_crust=0;
function addMorePizzaCrust1(totrow) {
	//alert("totrow");
	if(totrow!=undefined && special_row_crust == 0){
		special_row_crust = totrow;
	}
	
	html  = '<tbody id="special_row_crust' + special_row_crust + '">';
	html += '<tr height="35">'; 
	html += '<td width="25%"><input type="text" name="morecrustaddons['+special_row_crust+'][crustname]" id="pizzacrustname['+special_row_crust+']"/></td>';
	html += '<td width="40%">&nbsp;<input type="radio" name="morecrustaddons['+special_row_crust+'][pizzacrust_priceoption]" value="Free" checked="checked" onclick="pizzamorecrustfreeoption('+special_row_crust+');"/>&nbsp;Free&nbsp;<input type="radio" name="morecrustaddons['+special_row_crust+'][pizzacrust_priceoption]" value="Paid" onclick="pizzamorecrustpaidoption('+special_row_crust+');"/>&nbsp;Paid &nbsp;<span id="showpizzacrustprice1_'+special_row_crust+'" style="display:none;"> Price : <input type="text" name="morecrustaddons['+special_row_crust+'][pizzacrust_price]" id="pizzacrustprice" value="" size="5" /></span></td>';
	
	html += '<td><a onclick="$(\'#special_row_crust' + special_row_crust + '\').remove();" style="color:#ff0000;cursor:pointer;margin-left:0px;"><span>Remove</span></a></td>';
	html += '</tr>';
	html += '</tbody>';
	$('#specialcrust tfoot').before(html);
	special_row_crust++;
}

function pizzamorecrustfreeoption(cid){
	$("#showpizzacrustprice1_"+cid).hide();
}
function pizzamorecrustpaidoption(cid){
	$("#showpizzacrustprice1_"+cid).show();
}

//---------------------------------------------------
function removeCrust(menuid,catid,crustid){
    
	var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
	$.post(jssitebaseUrl+useFile,{"crustid":crustid,"action":"removeCrustOption"},function(output){
		//alert(output);
		if(output == 'success'){
			$("#restaurantPizzaAddons").load(jssitebaseUrl+"/ajaxActionRestaurant.php",{'action':'pizzaAddons','menuid':menuid,'catid':catid});
		}
	});
}
//-----------------------------------------------------------------------------------------
//Restaurant Pizza Addons more option
var special_row_pizza=0;
function addMorePizzaAddons1(totrow) {
	//alert("totrow");
	if(totrow!=undefined && special_row_pizza == 0){
		special_row_pizza = totrow;
	}
	html  = '<tbody id="special_row_pizza' + special_row_pizza + '">';
	html += '<tr height="35">'; 
	html += '<td width="25%"><input type="text" name="morepizzaaddons['+special_row_pizza+'][pizzaaddonsname]" id="pizzaaddonsname['+special_row_pizza+']" /></td>';
	html += '<td width="40%">&nbsp;<input type="radio" name="morepizzaaddons['+special_row_pizza+'][pizzaaddons_priceoption]" value="Free" checked="checked" onclick="pizzamoreaddonsfreeoption('+special_row_pizza+');"/>&nbsp;Free&nbsp;<input type="radio" name="morepizzaaddons['+special_row_pizza+'][pizzaaddons_priceoption]" value="Paid" onclick="pizzamoreaddonspaidoption('+special_row_pizza+');"/>&nbsp;Paid &nbsp;<span id="showpizzaprice1_'+special_row_pizza+'" style="display:none;"> Price : <input type="text" name="morepizzaaddons['+special_row_pizza+'][pizzaaddons_price]" id="pizzaaddonsprice" value="" size="5" /></span></td>';
	
	html += '<td><a onclick="$(\'#special_row_pizza' + special_row_pizza + '\').remove();" style="color:#ff0000;cursor:pointer;margin-left:0px;"><span>Remove</span></a></td>';
	html += '</tr>';
	html += '</tbody>';
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
//-------------------------------------------------------------------------------
//Restaurant Myaccount Status changes
function selectPaymentMethod(chgeval,mid,actionval){

	if(chgeval == 'Yes'){
		var str = 'Are you sure want to active?';
	}else if(chgeval == 'No'){
		var str = 'Are you sure want to deactive?';
	}
	
	if(confirm(str)){
		$(".restaurant"+actionval+"Content").load(jssitebaseUrl+"/ajaxActionRestaurant.php?action="+actionval, {'chgeval':chgeval,'mid':mid} );
	}
}

//Booking View Full details
	function bookingViewFullDetails(bookid){
		//alert('Mani'); return false;
		//myPopupWindowOpen('#bookingViewFullDetailsPop','#maska');
	
		//Form
		$('#bookingFullDetailsList').html('<div class="addtocartloading" ><span class="image"><img src="'+jssitebaseUrl +'/theme/default/images/loader.gif" border="0" alt="Loading" /></span><span>Please wait...</span></div>').show();
		$("#bookingFullDetailsList").load(jssitebaseUrl+"/ajaxActionRestaurant.php?action=bookingFullDetails&id="+bookid);
	}
//-----------------------------------------------------------------------------------
//------------------------------------------------------------------------------
var special_row=0;
function addListSubAddons(){
	//$('#buttondiv').append('<div><input type="text" name="subaddons['+$special_row+'][subaddonsname]" class="textboxff0000" value="" /></div>');
	
    $('#buttondiv').append('<div class="newContMadfood"><span id="mainremove_'+special_row+'" class="mainremove_'+special_row+'">'+
	'<span class="flt"><input type="text" name="mainaddons['+special_row+'][mainaddonsname]" class="textbox madTxtBoxNew" value="" /></span> &nbsp; '+
	'<span class="madLeft1 col-lg-2"><input type="text" name="mainaddons['+special_row+'][mainaddoncnt]" id="mainaddoncnt" value="" placeholder="Addons count" size="12" class="madTxtBox addoncountbox"/></span>'+
	'<a onclick="removemainaddonajax('+special_row+');" style="color:#ff0000;cursor:pointer; line-height:28px;" class="madAddons madLeft1"><span>Remove</span></a> &nbsp;'+
	' <a onclick="addSubaddonsList('+special_row+');" style="color:#009900;cursor:pointer; line-height:28px;" class="madAddons madLeft1"><span>Add Subaddons List </span></a>'+
	'<div id="subbuttondiv_'+special_row+'"></div></span></div>');
	special_row++;
}
//Remove Main Addons
function removemainaddonajax(aid){
    $(".mainremove_"+aid).html('');
}
/*function addListSubAddons(){
	//$('#buttondiv').append('<div><input type="text" name="subaddons['+$special_row+'][subaddonsname]" class="textboxff0000" value="" /></div>');
	
    $('#buttondiv').append('<div class="newContMadfood"><span id="mainremove_'+special_row+'">'+
	'<span class="flt"><input type="text" name="mainaddons['+special_row+'][mainaddonsname]" class="textboxxx madTxtBoxNew" value="" /></span> &nbsp; '+
	'<span class="madLeft1"><span class="madAddons"><input type="radio" name="mainaddons['+special_row+'][mainaddons_priceoption]" value="Free" checked="checked" onclick="subaddonsfreeoption('+special_row+');" class="madInput"/><span class="flt">Free</span></span>'+
	'<span class="madAddons"><input type="radio" name="mainaddons['+special_row+'][mainaddons_priceoption]" value="Paid" onclick="subaddonspaidoption('+special_row+');" class="madInput"/><span class="flt">Paid</span></span></span><span id="showaddPrice1_'+special_row+'" style="display:none;" class="madLeft1"><span class="madInput">Price :</span><input type="text" name="mainaddons['+special_row+'][mainaddons_price]" id="addonsprice" value="" size="10" class="madTxtBox"/></span>'+
	
	'<span class="madLeft1"><input type="text" name="mainaddons['+special_row+'][mainaddoncnt]" id="mainaddoncnt" value="Addons count" size="12" class="madTxtBox"/></span>'+
	'<a onclick="remove('+special_row+');" style="color:#ff0000;cursor:pointer;" class="madAddons madLeft1"><span>Remove</span></a> &nbsp;'+
	'<div class="clr"></div><div class="madLeft1" style="width:100%;"><input type="radio" name="mainaddons['+special_row+'][addonstype]" id="addonstype_single" value="single" checked="checked">&nbsp;Single &nbsp;<input type="radio" name="mainaddons['+special_row+'][addonstype]" id="addonstype_multiple" value="multiple" >&nbsp;Multiple &nbsp;</div><span id="sublist_'+special_row+'">'+
	'<div id="subbuttondiv_'+special_row+'"></div></span>'+
	' </span></div><a onclick="addSubaddonsList('+special_row+');" style="color:#ff0000;cursor:pointer;" class="madAddons madLeft1"><span>Add Subaddons List </span></a>');
	special_row++;
}*/

var special_row1=0;
function addSubaddonsList(mainaddid){
	
	
	$('#subbuttondiv_'+mainaddid).append('<div id="removesubmore_'+special_row1+'"><span class="newSubBtnDiv"><label class="madInput"></label><input type="text" name="mainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsname]" class="textboxAddon  madTxtBox" value="" />'+
	'<a onclick="removeSubmore('+special_row1+');" style="color:#ff0000;cursor:pointer; line-height:28px;" class="madAddons"><span>Remove</span></a> &nbsp;</div></span>');
	special_row1++;
	//$('#subbuttondiv_'+mainaddid).append('<div><label>subtext#'+mainaddid+'</label><input type="text" name="subaddons['+$special_row1+'][subaddonsname]" class="textboxzz" value="" /></div>');
	
}
var special_row2=0;
function addListSubAddons1(){
	
	$('#subaddonslist').append('<div id="removesubmain_'+special_row2+'" class="form-group"><span class="col-sm-offset-4 col-sm-4"><input type="text" class="removesubmain_'+special_row2+' form-control" name="subadd['+special_row2+'][subaddon]" value="" />'+
	'</span><span class="col-sm-2"><a onclick="removeSubmain('+special_row2+');" class="addons-remove btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a></span></div>');
	special_row2++;
}

var special_row3=0;
function addListSubAddonsEdit(){
	
	$('#subaddonslistEdit').append('<div id="removesubmainedit_'+special_row3+'"><span class="newSubBtnDiv"><input type="text" class="removesubmainedit_'+special_row3+' textboxzz madTxtBox" name="subadd['+special_row3+'][subaddon]" value="" />'+
	'<a onclick="removeSubmainedit('+special_row3+');" style="color:#ff0000;cursor:pointer; line-height:28px;" class="madAddons">Remove</a> </span></div>');
	special_row3++;
}
//-----------------------------------------------------
function subaddonsfreeoption(aid){
	$("#showaddPrice1_"+aid).hide();
	$('#sublist_'+aid).show();
}
function subaddonspaidoption(aid){
	$("#showaddPrice1_"+aid).show();
	$('#sublist_'+aid).hide();
}
function subaddonseditfreeoption(aid){
	$("#showaddoneditprice_"+aid).hide();
}
function subaddonseditpaidoption(aid){
	$("#showaddoneditprice_"+aid).show();
}
function remove(aid){
	$('[name=mainremove_'+aid+']').html('');
}
function removeSubmore(said){
	/*$('#removesubmore_'+said).html('');*/
	$('#removesubmore_'+said).remove();
}
function removeSubmain(said){
    //$('.removesubmain_'+said).val('');
	//$('#removesubmain_'+said).hide();
    $('#removesubmain_'+said).remove();
    
}
function removeSubmainedit(said){
	//$('#removesubmainedit_'+said).hide();
    $('#removesubmainedit_'+said).html('');
}
//-----------------------------------------------------
function mainaddonfree(){
	$(".showaddPrice").hide();
	$(".showaddPriceList").show();
	$("#mainaddonvalue").val('');
	$("#subaddonslistEdit").show();
}
function mainaddonpaid(){
	$(".showaddPrice").show();
	$(".showaddPriceList").hide();
	$("#subaddonslistEdit").hide();
}
//-------------------------------------------------------------
function openAddons(a){
    
    if($("#"+a).is(':visible') == true){
        $("#"+a).hide();
    }else{
        $("#"+a).show();
    }
    return false;
    /*
	var e = document.getElementById(a);
	if(e.style.display=="none"){
		var i;
		var tot=document.getElementById("total").value;
		for (i=1; i<=tot; i++) {
			var d = new Array(i);
			d[i] = "q" + i;
			if (document.getElementById(d[i])) {
				//document.getElementById(d[i]).style.display="none";
			} 
			e.style.display="block";
		}
	}
	else {
		e.style.display="none"
	}*/
}
//-------------------------------------------------------------
/*function fixedOption(){
	
	$("#fixedOption").show();
	$("#pizzaOtherOption").hide();
	$("#pizzaDefaultOption").hide();
}
function defaultOption(){
	
	$("#pizzaDefaultOption").show();
	$("#fixedOption").hide();
	$("#pizzaOtherOption").hide();
}
function otherOption(){
	
	$("#pizzaOtherOption").show();
	$("#pizzaDefaultOption").hide();
	$("#fixedOption").hide();
}*/

//-------------------------------------------------------------
/*var special_row=0;
function addCreateMoreAddons(){
	
    $('#createbuttondiv').append('<div class="madSubAddonNew2">'+
	'<span class="botderTopPadTop" id="mainremove_'+special_row+'"><span class="addPageRightFont">Addons Name<span class="redStar">*</span></span>'+
	'<span class="colon1">:</span>'+
	'<span id="mainremove_'+special_row+'" class="madSubAddon4">'+
		'<input type="text" name="createmainaddons['+special_row+'][mainaddonsname]" id="mainaddons_'+special_row+'" class="textbox marginBot10" value="" />  '+
		'<div class="madLeftNew">'+
			
			'<span><input type="text" name="createmainaddons['+special_row+'][mainaddoncnt]" id="mainaddoncnt" value="" placeholder="count" size="12" class="madTxtBoxcnt"/></span>'+
			'<a onclick="remove('+special_row+');" style="color:#ff0000; cursor:pointer;" class="madAddons"><span>Remove</span></a>'+
			'<span id="sublist_'+special_row+'"><a onclick="createAddSubaddonsList('+special_row+');" style="color:orange;cursor:pointer;text-decoration:underline;"><span>Add Sub Addons</span></a>'+
		'</div>'+
		
		'<div id="createsubbuttondiv_'+special_row+'" class="addtoCartInner"></div></span>'+
	' </span>'+
	' </span>'+
	'</div>');
	special_row++;
	var special_row1=0;
}
//-------------------------------------------------------------
var special_row1=0;
function createAddSubaddonsList(mainaddid){
	
	$('#createsubbuttondiv_'+mainaddid).append('<div class="madSubAddonNew1">'+
		'<span id="removesubmore_'+special_row1+'" class="madSubAddon1">'+
		'<input type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsname]" id="mainaddonsmore_'+special_row1+'" class="textboxzz madTxtBox" value="" />'+
		
		'<input type="radio" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsradio]" value="Free" checked="checked" onclick="createaddonsfreeoption('+special_row1+');"/>Free'+
		'<input type="radio" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsradio]" value="Paid" onclick="createaddonspaidoption('+special_row1+');"/>Paid'+
		'<span id="showcreateaddonsprice1_'+special_row1+'" style="display:none;">Price:<input type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsprice]" value="" /></span>'+
		'<a onclick="removeSubmore('+special_row1+');" style="color:#ff0000; cursor:pointer;"><span>Remove</span></a>'+
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
//-------------------------------------------------------------
var specialsize = 0;
function addMorePizzaSize(totrow){
	
	if(totrow!=undefined && specialsize == 0){
		specialsize = totrow;
	}
	html  = '<tbody id="specialsize' + specialsize + '">';
	html += '<tr>'; 
	html += '<td class="left" height="30" width="22%"><input type="text" name="morepizzasize['+specialsize+'][sizename]" id="sizename['+specialsize+']" class="mar4"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="morepizzasize['+specialsize+'][sizevalue]" value="" /></span></td>';
	
	html += '<td class="left1"  height="30" width="20%" align="left"><a onclick="$(\'#specialsize' + specialsize + '\').remove();" style="color:#ff0000;cursor:pointer;margin-left:0px;"><span>Remove</span></a></td>';
	html += '</tr>';
	html += '</tbody>';
	$('#specialPizzaSize tfoot').before(html);
	specialsize++;
}*/
//-------------------------------------------------------------

//#################################NEW IMPLEMENTAION ####################################
//----------------------------------------------
function fixedOption(){
	
	$("#fixedOption").css("display","block");
	$("#pizzaOtherOption").hide();
	$("#pizzaDefaultOption").hide();
	
	$(".showprice_fixed").show();
	$(".showprice_slice").hide();
	$(".showprice_size").hide();
    
    if ($.trim($('input[name=menu_addons]:checked').val()) == 'Yes') {
        $("input.paid").trigger('click');
    }
	
	$(".madSubAddonNew2").css("display", "none");
	$(".slicemoreprice_txt").css("display", "none");
}
function defaultOption(){
	
	$("#pizzaDefaultOption").css("display","block");
	$("#fixedOption").hide();
	$("#pizzaOtherOption").hide();
	
	$(".showprice_size").show();
	$(".showprice_slice").hide();
	$(".showprice_fixed").hide();
    
    if ($.trim($('input[name=menu_addons]:checked').val()) == 'Yes') {
        $("input.paid").trigger('click');
    }
	
	$(".madSubAddonNew2").css("display", "none");
	$(".slicemoreprice_txt").css("display", "none");
}
function otherOption(){
	
	$("#pizzaOtherOption").css("display","block");
	$("#pizzaDefaultOption").hide();
	$("#fixedOption").hide();
	
	$(".showprice_size").hide();
	$(".showprice_fixed").hide();
	$(".showprice_slice").show();
    
    if ($.trim($('input[name=menu_addons]:checked').val()) == 'Yes') {
        $("input.paid").trigger('click');
    }
	
	$(".madSubAddonNew2").css("display", "none");	
	$(".slicemoreprice_txt").css("display", "block");
}

//----------------------------------------------
function fixedOption_Edit(){
	
	$("#fixedOption1").show();
	$("#pizzaOtherOption1").hide();
	$("#pizzaDefaultOption1").hide();
	
	
	$(".showprice_fixed").show();
	$(".showprice_slice").hide();
	$(".showprice_size").hide();
	
	$(".madSubAddonNew2").css("display", "none");
	$(".slicemoreprice_txt").css("display", "none");
    $("#sizeoption_addmoreaddonedit").attr('value','fixed');
}
function defaultOption_Edit(){
	
	$("#pizzaDefaultOption1").show();
	$("#fixedOption1").hide();
	$("#pizzaOtherOption1").hide();
	
	$(".showprice_size").show();
	$(".showprice_slice").hide();
	$(".showprice_fixed").hide();
	
	$(".madSubAddonNew2").css("display", "none");
	$(".slicemoreprice_txt").css("display", "none");
    $("#sizeoption_addmoreaddonedit").attr('value','other');
}
function otherOption_Edit(){
	
	$("#pizzaOtherOption1").show();
	$("#pizzaDefaultOption1").hide();
	$("#fixedOption1").hide();
	
	$(".showprice_size").hide();
	$(".showprice_fixed").hide();
	$(".showprice_slice").show();
	
	$(".madSubAddonNew2").css("display", "none");
	$(".slicemoreprice_txt").css("display", "block");
    $("#sizeoption_addmoreaddonedit").attr('value','slice');
}

//Functions of Sizes when changing the Category option:
function fixedOption1(){
	
	//alert("fixedOption1");
	//AjaxAcition
	$("#fixedOption2").css("display", "block");
	$("#pizzaOtherOption2").css("display", "none");
	$("#pizzaDefaultOption2").css("display", "none");
    
    $(".selectoptionVal").html("<input type='hidden' id='selectoptions' name='selectoptions' value='fixed' />");
    $(".selectoptionsFirst").val('');
	
    $(".free").attr('checked',true);
    $(".paid").attr('checked',false);
	
	$(".showprice_fixed").hide();
	$(".showprice_slice").hide();
	$(".showprice_size").hide();
    
    $("#madAddons_def_fixed_add").css("display", "block");
	$("#madAddons_def_fix").css("display", "none");
	//$("#madAddons_def_fix").css("display", "block");
	$("#madAddons_firstajax").hide();
	$("#madAddons_slice").hide();
	$(".showAjaxsizeoption").show();
	$("#sizeoption_addmoreaddonedit").val("fixed");
	
	$(".madSubAddonNew2").css("display", "none");
	$(".slicemoreprice_txt").css("display", "none");
}
function defaultOption1(){	
	//alert("defaultOption1");
	//AjaxAcition
	$("#pizzaDefaultOption2").css("display", "block");
	$("#fixedOption2").css("display", "none");
	$("#pizzaOtherOption2").css("display", "none");
    
    $(".selectoptionVal").html("<input type='hidden' id='selectoptions' name='selectoptions' value='size' />");
    $(".selectoptionsFirst").val('');
	
    $(".free").attr('checked',true);
    $(".paid").attr('checked',false);
	
	$(".showprice_size").hide();
	$(".showprice_slice").hide();
	$(".showprice_fixed").hide();
	
    $("#madAddons_def_fixed_add").css("display", "none"); //Sri
	$("#madAddons_def_fix").css("display", "block");
	$("#madAddons_firstajax").hide();
	$("#madAddons_slice").hide();
	$(".showAjaxsizeoption").show();
	$("#sizeoption_addmoreaddonedit").val("default");
	
	$(".madSubAddonNew2").css("display", "none");
	$(".slicemoreprice_txt").css("display", "none");
}
function otherOption1(){
	
	//alert("otherOption1");
	//AjaxAcition
	$("#pizzaOtherOption2").css("display", "block");
	$("#pizzaDefaultOption2").css("display", "none");
	$("#fixedOption2").css("display", "none");
    
    $(".selectoptionVal").html("<input type='hidden' id='selectoptions' name='selectoptions' value='slice' />");
    $(".selectoptionsFirst").val('');
    
    $("#free").attr('checked',true);
    $("#paid").attr('checked',false);
	
	$(".showprice_size").hide();
	$(".showprice_fixed").hide();
	$(".showprice_slice").hide();
	
    $("#madAddons_def_fixed_add").css("display", "none"); //Sri
	$("#madAddons_slice").css("display", "block");
	$("#madAddons_firstajax").hide();
	$("#madAddons_def_fix").hide();
	$(".showAjaxsizeoption").show();
	$("#sizeoption_addmoreaddonedit").val("slice");
	
	$(".madSubAddonNew2").css("display", "none");
	$(".slicemoreprice_txt").css("display", "block");
}

//-------------------------------------------------------------
var special_row=0;
function addCreateMoreAddons(){
	
    $('#createbuttondiv').append('<div class="form-group madSubAddonNew2">'+
	'<span class="col-sm-offset-3 col-sm-9" id="mainremove_'+special_row+'" name="mainremove_'+special_row+'">'+
	
	'<span id="mainaddremove_'+special_row+'" class="">'+
	'<span class="col-sm-4"><input type="text" name="createmainaddons['+special_row+'][mainaddonsname]" id="mainaddons_'+special_row+'" class="form-control input-sm" value="" placeholder="Name" /> </span> '+
	'<span class="col-sm-3"><input type="text" name="createmainaddons['+special_row+'][mainaddoncnt]" id="mainaddoncnt" value="" placeholder="count" size="12" class="form-control input-sm"/></span>'+
	'<span class="col-sm-2"><a onclick="removemainaddon('+special_row+');"  class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i></a></span>'+
	'<span id="sublist_'+special_row+'" ><span class="col-sm-3"><a onclick="createAddSubaddonsList('+special_row+');" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus-sign marRight"></i>Add Sub Addons</a></span>'+
	'<div id="createsubbuttondiv_'+special_row+'" class="addtoCartInner"></div></span>'+
	' </span>'+
	' </span>'+
	'</div>');
	special_row++;
	var special_row1=0;
}
//-------------------------------------------------------------
var special_row1=0;
function createAddSubaddonsList(mainaddid){
	
	//For Pizza category only:
	/*if(cat_id == 0){
		var cat_name  = 'Others';
	}else{
		var cat_name	= $("#cat_pizzasubaddon_changecat_val_"+cat_id).val();
	}
	$.post("ajaxFile.php",{"cat_name":cat_name,"action":"caps_catname"},function(resp){
					
		var findme      = "Pizza";
		//if(cat_name == "Pizza"){
		if ( resp.indexOf(findme) > -1 ) {	
			//alert("pizza cat");		
			var pizza_size_ht = '<input class="flt paidTxtBox" type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsprice_medium]" value="Medium" />'+'<input class="flt paidTxtBox" type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsprice_large]" value="Large" />';
		}else{
			//alert("other cat");
			var pizza_size_ht = '';	
		}
	});
	*/	
	
	var pizza_size_ht = '<span class="col-sm-4"><input class="form-control input-sm" type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsprice_medium]" value="" placeholder="Price"/></span>'+'<span class="col-sm-4"><input class="form-control input-sm" type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsprice_large]" value="" placeholder="Price"/></span>';
	
	$('#createsubbuttondiv_'+mainaddid).append('<div id="removesubmore_'+special_row1+'" class="madSubAddonNew1">'+
		'<span id="removesubmore_'+special_row1+'">'+
		'<span class="col-sm-4"><input type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsname]" id="mainaddonsmore_'+special_row1+'" class="form-control input-sm" value="" placeholder="Name"/></span>'+
		
		'<span class="col-sm-3"><span class="radioln radio-inline radio-primary"><input id="1" class="inputPrice" type="radio" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsradio]" value="Free" checked="checked" onclick="createaddonsfreeoption('+special_row1+');"/><label for="1">Free</label></span>'+
		'<span class="radioln radio-inline radio-primary"><input id="2" class="inputPrice" type="radio" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsradio]" value="Paid" onclick="createaddonspaidoption('+special_row1+');"/><label for="2">Paid</label></span></span>'+
		'<span id="showcreateaddonsprice1_'+special_row1+'" style="display:none;" class="col-sm-4 pad0"><span class="col-sm-4"><input class="form-control input-sm" type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsprice]" value="" placeholder="Price"/></span>'+
		pizza_size_ht+
		'</span>'+
		'<span class="col-sm-1"><a onclick="removeSubmore('+special_row1+');" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i></a></span>'+
		'</div></span>');
	special_row1++;	
}
//-------------------------------------------------------//
function addCreateMoreAddons_fixed(){
	
    $('#createbuttondiv').append('<div class="form-group madSubAddonNew2">'+
	'<span class="botderTopPadTop" id="mainremove_'+special_row+'" name="mainremove_'+special_row+'">'+
	
	'<span id="mainaddremove_'+special_row+'" class="col-sm-offset-3 col-sm-8 marTop10">'+
		'<span class="col-sm-4"><input type="text" name="createmainaddons['+special_row+'][mainaddonsname]" id="mainaddons_'+special_row+'" class="form-control input-sm" value="" placeholder="Name"/> </span> '+			
		'<span class="col-sm-2"><input type="text" name="createmainaddons['+special_row+'][mainaddoncnt]" id="mainaddoncnt" value="" placeholder="count" size="12" class="form-control input-sm"/></span>'+
		'<span class="col-sm-3"><a onclick="removemainaddon('+special_row+');" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i></a></span>'+
		'<span id="sublist_'+special_row+'"><span class="col-sm-3"><a onclick="createAddSubaddonsList_fixed('+special_row+');" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus-sign marRight"></i>Add Sub Addons</a></span>'+
		
		
		'<div id="createsubbuttondiv_'+special_row+'" class="addtoCartInner"></div></span>'+
	' </span>'+
	' </span>'+
	'</div>');
	special_row++;
	var special_row1=0;
}

function removemainaddon(aid){
    $("#mainremove_"+aid).parent("div").remove();
    return false;
}

var special_row1=0;
function createAddSubaddonsList_fixed(mainaddid){
	
	$('#createsubbuttondiv_'+mainaddid).append('<div id="removesubmore_'+special_row1+'" class="madSubAddonNew1">'+
		'<span id="removesubmore_'+special_row1+'" class="">'+
		'<span class="col-sm-4 col-sm-offset-1"><input type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsname]" id="mainaddonsmore_'+special_row1+'" class="form-control input-sm" value="" placeholder="Name"/></span>'+
		
		'<span class="col-sm-3"><label class="radio-inline"><input class="inputPrice" type="radio" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsradio]" value="Free" checked="checked" onclick="createaddonsfreeoption('+special_row1+');"/> Free</label>'+
		'<label class="radio-inline"><input class="inputPrice" type="radio" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsradio]" value="Paid" onclick="createaddonspaidoption('+special_row1+');"/>Paid</label></span>'+
		'<span id="showcreateaddonsprice1_'+special_row1+'" style="display:none;" class="col-sm-4"><span class="col-sm-6"><input class="form-control input-sm" type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsprice]" value="" placeholder="Fixed"/></span>'+
		'</span>'+
		'<span class="col-sm-1"><a onclick="removeSubmore('+special_row1+');" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i></a>'+
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


function addCreateMoreAddons_firstAjax(){
	
	/*alert($('input[name=sizeoption]:checked').val());	
	var chk_val 	=	$('input[name=sizeoption]:checked').val();
	
	if(chk_val == 'other'){
		addCreateMoreAddons_slice_ajax();
	}else{
		addCreateMoreAddons();
	}*/
	
	alert("Please select menu price option");
	return false;
}

function addCreateMoreAddons_first(){	
		
	var chk_val 	=	$.trim($('input[name=sizeoption]:checked').val());
	//var chk_val 	=	$("#sizeoption_addmoreaddonedit").val();
	 
    if(chk_val == ''){
        alert("Please select menu price option");
	    return false;
    }else if(chk_val == 'other'){
		addCreateMoreAddons_slice();
        return false;
	}else if(chk_val == 'fixed'){
	   addCreateMoreAddons_fixed();
       return false;
	}else if(chk_val == 'default'){
	   addCreateMoreAddons();
       return false;
	}/*else{
		addCreateMoreAddons();
	}*/
}


//######################## Slice Create more Addon Group

//-------------------------------------------------------------
function addCreateMoreAddons_slice(){	
	
	/*var cat_id  = $("#menu_category").val();	
	
	if(cat_id == 'other'){
		cat_id = 0;
	}*/
	
    $('#createbuttondiv').append('<div class="form-group madSubAddonNew2">'+
	'<span class="botderTopPadTop" id="mainremove_'+special_row+'" name="mainremove_'+special_row+'">'+
	
	'<span id="mainaddremove_'+special_row+'" class="col-sm-offset-3 col-sm-8 marTop10">'+
		'<span class="col-sm-4"><input type="text" name="createmainaddons['+special_row+'][mainaddonsname]" id="mainaddons_'+special_row+'" class="form-control input-sm" value="" placeholder="Name"/> </span> '+
		'<span class="col-sm-2"><input type="text" name="createmainaddons['+special_row+'][mainaddoncnt]" id="mainaddoncnt" value="" placeholder="count" size="12" class="form-control input-sm"/></span>'+
		'<span class="col-sm-3"><a onclick="removemainaddon('+special_row+');" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i></a></span>'+
		'<span id="sublist_'+special_row+'"><span class="col-sm-3"><a onclick="createAddSubaddonsList_slice('+special_row+');" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus-sign marRight"></i>Add Sub Addons</a></span>'+
		'<div id="createsubbuttondiv_'+special_row+'" class="addtoCartInner"></div></span>'+
	' </span>'+
	' </span>'+
	'</div>');
	special_row++;		
}

function createAddSubaddonsList_slice(mainaddid){	
	
		//var cntSliceAddons_old	=	$("#cntSliceAddons").val();
		/*var cntSliceAddons		=	$("#cntSliceAddons_createsub").val();
		
		alert(cntSliceAddons);*/				
		
		var cntSliceAddons_chk		=	$("#cntSliceAddons_createsub").val();
		
		if(cntSliceAddons_chk == ''){
			var cntSliceAddons	=	$("#cntSliceAddons").val();
		}else{
			var cntSliceAddons	=	$("#cntSliceAddons_createsub").val();
		}
		
		//alert("cntSliceAddons "+cntSliceAddons);
		var cntSliceAddons = $(".slicenamecnt:visible").length;
		var pizza_size_ht  = '';
		
		for(var i=0;i<cntSliceAddons;i++){			
		 pizza_size_ht += '<span class="col-sm-4"><input class="form-control input-sm" type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+']['+i+'][subaddonsprice_slice]" value="" placeholder="Price"/></span>';
		}
		
		$('#createsubbuttondiv_'+mainaddid).append('<div class="madSubAddonNew1">'+
			'<span id="removesubmore_'+special_row1+'" class="">'+
			'<span class="col-sm-4"><input type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsname]" id="mainaddonsmore_'+special_row1+'" class="form-control input-sm" value="" placeholder="Name"/></span>'+
			'<span class="col-sm-2"><span class="radioln radio-inline radio-primary"><input id="1" class="inputPrice" type="radio" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsradio]" value="Free" checked="checked" onclick="createaddonsfreeoption('+special_row1+');"/><label for="1"> Free</label></span>'+
			'<span class="radioln radio-inline radio-primary"><input id="2" class="inputPrice" type="radio" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsradio]" value="Paid" onclick="createaddonspaidoption('+special_row1+');"/><label for="2">Paid</label></span></span>'+	
			'<span id="showcreateaddonsprice1_'+special_row1+'" class="col-sm-4" style="display:none;">'+		
			pizza_size_ht+
			'</span>'+
			'<span class="col-sm-1"><a onclick="removeSubmore('+special_row1+');" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i></a></span'+
			'</div></span>');
		special_row1++;		
}

//-------------------------------------------------------------
function addCreateMoreAddons_slice_ajax(){	
	
	/*var cat_id  = $("#menu_category").val();	
	
	if(cat_id == 'other'){
		cat_id = 0;
	}*/
	
    $('#createbuttondiv').append('<div class="madSubAddonNew2">'+
	'<span class="botderTopPadTop" id="mainremove_'+special_row+'" name="mainremove_'+special_row+'"><span class="addPageRightFont"><span class="redStar"></span>Addons Name</span>'+
	'<span class="colon1">:</span>'+
	'<span id="mainaddremove_'+special_row+'" class="myaccMenudiv myaccMenudivNew frt">'+
		'<input type="text" name="createmainaddons['+special_row+'][mainaddonsname]" id="mainaddons_'+special_row+'" class="textbox marginBot10" value="" placeholder="Name"/>  '+
		'<div class="madLeftNew">'+
			
			'<span><input type="text" name="createmainaddons['+special_row+'][mainaddoncnt]" id="mainaddoncnt" value="" placeholder="count" size="12" class="madTxtBoxcnt"/></span>'+
			'<a onclick="removemainaddon('+special_row+');" style="color:#ff0000; cursor:pointer; line-height:25px;" class="madAddons"><span>Remove</span></a>'+
			'<span id="sublist_'+special_row+'"><a onclick="createAddSubaddonsList_slice_ajax('+special_row+');" style="color:#ff0000;cursor:pointer; line-height:25px;"><span>Add Sub Addons</span></a>'+
		'</div>'+
		
		'<div id="createsubbuttondiv_'+special_row+'" class="addtoCartInner"></div></span>'+
	' </span>'+
	' </span>'+
	'</div>');
	special_row++;		
}

function createAddSubaddonsList_slice_ajax(mainaddid){	
	
		/*var cntSliceAddons_old	=	$("#cntSliceAddons1").val();
		var cntSliceAddons		=	$("#cntSliceAddons_createsub1").val();*/		
		
		var cntSliceAddons_chk		=	$("#cntSliceAddons_createsub1").val();
		if(cntSliceAddons_chk == ''){
			var cntSliceAddons	=	$("#cntSliceAddons1").val();
		}else{
			var cntSliceAddons	=	$("#cntSliceAddons_createsub1").val();
		}
        var slicenamecnt = $(".slicenamecnt:visible").length;
        if(cntSliceAddons != slicenamecnt){
            var cntSliceAddons = slicenamecnt;
        }
				
		var pizza_size_ht  = '';
		
		for(var i=0;i<cntSliceAddons;i++){			
		 pizza_size_ht += '<input class="flt paidTxtBox" type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+']['+i+'][subaddonsprice_slice]" value="" placeholder="Price" />';
		}
		
		$('#createsubbuttondiv_'+mainaddid).append('<div class="madSubAddonNew1">'+
			'<span id="removesubmore_'+special_row1+'" class="madSubAddon1">'+
			'<input type="text" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsname]" id="mainaddonsmore_'+special_row1+'" class="madTxtBox" value="" placeholder="Name" />'+
			
			'<input class="inputPrice" type="radio" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsradio]" value="Free" checked="checked" onclick="createaddonsfreeoption('+special_row1+');"/><span class="freeInput"> Free</span>'+
			'<input class="inputPrice" type="radio" name="createmainaddons['+mainaddid+'][subaddons]['+special_row1+'][subaddonsradio]" value="Paid" onclick="createaddonspaidoption('+special_row1+');"/><span class="freeInput">Paid</span>'+			
			'<span id="showcreateaddonsprice1_'+special_row1+'" style="display:none;">'+
			pizza_size_ht+
			'</span>'+
			'<a onclick="removeSubmore('+special_row1+');" style="color:#ff0000; cursor:pointer;"><span class="freeInput">Remove</span></a>'+
			'</div></span>');
		special_row1++;		
}
//-----------------------------------------------------//
/*function removeSubmore(selectid){
    alert(selectid);
    $("#removesubmore_"+selectid).hide();
}*/
//####################### Slice Create More Addon Group
//-----------------------------------------------------
var specialsize_main = 0;
function addMorePizzaSize_main(totrow){
    if(totrow!=undefined && specialsize_main == 0){
		specialsize_main = totrow;
	}
    
    html  = '<tbody class="specialsize_main' + specialsize_main + '" id="specialsize_main' + specialsize_main + '">';
	html += '<tr>'; 
	html += '<td class="left" height="30" width="22%"><input type="text" name="morepizzasize['+specialsize_main+'][sizename]" id="sizename['+specialsize_main+']" class="addonbox textboxAddonajaxsize slicevalidate" value="" placeholder="Name"/><input type="text" name="morepizzasize['+specialsize_main+'][sizevalue]" value="" class="addonbox textboxAddonajaxsize slicevalidate" placeholder="Price"/></span></td>';
    
	html += '<td class="left1"  height="30" width="20%" align="left"><a onclick="$(\'#specialsize_main' + specialsize_main + '\').remove();" style="color:#ff0000;cursor:pointer;margin-left:0px;"><span>Remove</span></a></td>';
	//html += '<td class="left1"  height="30" width="20%" align="left"><a onclick="removeSlice('+specialsize_main+');" style="color:#ff0000;cursor:pointer;margin-left:0px;"><span>Remove</span></a></td>';
	html += '</tr>';
	html += '</tbody>';
	$('#specialPizzaSize_main tfoot').before(html);
	specialsize_main++;
} 
//-----------------------------------------------------
var specialsize = 0;
var html_sliceprice = '';
function addMorePizzaSize(totrow){
	
	$(".madSubAddonNew2").css("display", "none");
	
	if(totrow!=undefined && specialsize == 0){
		specialsize = totrow;
	}
	html  = '<tbody class="specialsize' + specialsize + '" id="specialsize' + specialsize + '">';
	html += '<tr>'; 
	html += '<td class="left" height="40" width="6%"><input type="text" name="morepizzasize['+specialsize+'][sizename]" id="sizename['+specialsize+']" class="addonbox textboxAddonajaxsize1 slicevalidate" value="" placeholder="Name"/><input type="text" name="morepizzasize['+specialsize+'][sizevalue]" value="" class="addonbox textboxAddonajaxsize1 slicevalidate" placeholder="Price"/></td>';
	
	//html += '<td class="left1"  height="30" width="20%" align="left"><a onclick="$(\'#specialsize' + specialsize + '\').remove();" style="color:#ff0000;cursor:pointer;margin-left:0px;"><span>Remove</span></a></td>';
	html += '<td class="left1" width="10%"  height="30" width="" align="left"><a onclick="removeSlice('+specialsize+');" style="color:#ff0000;cursor:pointer;margin-left:0px;"><span>Remove</span></a></td>';
	html += '</tr>';
	html += '</tbody>';
	$('#specialPizzaSize tfoot').before(html);
	specialsize++;
	
	var subaddonindex		=	$("#subaddonindex").val();	
	var mainaddonindex		=	$("#mainaddonindex").val();
	
	var cntSliceAddons = 0;
	//Slice addons more price:
	$(".slicemoreprice").each(function(index){		
		var now_id		=	$(this).attr("id");
		//alert("<br>now-->"+now_id);
		var now_id_arr	=	now_id.split("_");
				
		if(cntSliceAddons == 0){
			cntSliceAddons		=	$("#cntSliceAddons").val();
		}
        
        //alert("<br>sliceadd-->"+cntSliceAddons);
		
		var slicemoreprice_countperslice	=	$("#slicemoreprice_countperslice_"+now_id_arr[1]+"_"+now_id_arr[2]).val();
		//alert("<br>cntprice-->"+slicemoreprice_countperslice);		
		if(slicemoreprice_countperslice == ''){			
			var slicemoreprice_countperslice_val	=	cntSliceAddons;
		}else{
			var slicemoreprice_countperslice_val	=	slicemoreprice_countperslice;
		}
		//alert("<br>val-->"+slicemoreprice_countperslice_val);
        /*if(slicemoreprice_countperslice_val == ''){
            slicemoreprice_countperslice_val = '0';
        }*/
		html_sliceprice	= '<input class="paidTxtBox slicemoreprice_txt" type="text" name="mainaddons['+now_id_arr[1]+'][addons]['+now_id_arr[2]+']['+slicemoreprice_countperslice_val+'][addons_price_slice]" id="addonsprice_slice_'+slicemoreprice_countperslice_val+'" value="" Placeholder="Price" />';
		
		//$("#slicemoreprice_"+now_id_arr[1]+"_"+now_id_arr[2]).after(html_sliceprice);
		$("#slicemoreprice_"+now_id_arr[1]+"_"+now_id_arr[2]+".addonrowline").append(html_sliceprice);
		
		$("#slicemoreprice_countperslice_"+now_id_arr[1]+"_"+now_id_arr[2]).val(++slicemoreprice_countperslice_val);		
		//$("#cntSliceAddons_createsub").val(slicemoreprice_countperslice_val);		
	});	
	
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
}
//------------------------------------------------------------------------------------------//
function addMorePizzaSize_ajax(totrow){
	
    $(".madSubAddonNew2").css("display", "none");
    
    var menu_id		=	$(".menu_id").val();
    
	if(totrow!=undefined && specialsize == 0){
		specialsize = totrow;
	}
    
	html  = '<div class="specialsize' + specialsize + ' col-sm-12 marBtm5 pad0" id="specialsize' + specialsize + '">';
	html += '<div class="col-sm-4 pad0"><input type="text" name="morepizzasize['+specialsize+'][sizename]" id="sizename['+specialsize+']" class="form-control slicevalidate slicenamecnt" value="" placeholder="Name"/></div><div class="col-sm-2"><input type="text" name="morepizzasize['+specialsize+'][sizevalue]" value="" class="form-control slicevalidate"  placeholder="Price"/></div>';
	html += '<div class="col-sm-3"><a onclick="removeSlice('+specialsize+');" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a></div>';

	html += '</div>';
	$('div #specialPizzaSize:visible').before(html);
	specialsize++;
	
	var subaddonindex		=	$("#subaddonindex").val();	
	var mainaddonindex		=	$("#mainaddonindex").val();
	
	var cntSliceAddons = 0;
	//Slice addons more price:
	$(".slicemoreprice").each(function(index){		
		var now_id		=	$(this).attr("id");
		//alert(now_id);
		var now_id_arr	=	now_id.split("_");
				
		if(cntSliceAddons == 0){
				cntSliceAddons		=	$.trim($("#cntSliceAddons").val());
		}
        if(cntSliceAddons == ''){
				cntSliceAddons		=	0;
		}	
		
		var slicemoreprice_countperslice	=	$.trim($("#slicemoreprice_countperslice_"+now_id_arr[1]+"_"+now_id_arr[2]).val());
		//alert(slicemoreprice_countperslice);		
		if(slicemoreprice_countperslice == ''){			
			var slicemoreprice_countperslice_val	=	cntSliceAddons;
		}else{
			var slicemoreprice_countperslice_val	=	slicemoreprice_countperslice;
		}
		//alert(slicemoreprice_countperslice_val);
        if(slicemoreprice_countperslice_val == ''){ 
            slicemoreprice_countperslice_val = '0';
        }
		html_sliceprice	= '<div class="col-sm-4"><input class="form-control input-sm slicemoreprice_txt" type="text" name="mainaddons['+now_id_arr[1]+'][addons]['+now_id_arr[2]+']['+slicemoreprice_countperslice_val+'][addons_price_slice]" id="addonsprice_slice_'+slicemoreprice_countperslice_val+'" value="" placeholder="Price"/></div>';
		
		//$("#slicemoreprice_"+now_id_arr[1]+"_"+now_id_arr[2]+" .addonrowline").append(html_sliceprice);
        $("#slicemoreprice_"+now_id_arr[1]+"_"+now_id_arr[2]).append(html_sliceprice);
		
		//$("#slicemoreprice_"+now_id_arr[1]+"_"+now_id_arr[2]).html(html_sliceprice);
		
		$("#slicemoreprice_countperslice_"+now_id_arr[1]+"_"+now_id_arr[2]).val(++slicemoreprice_countperslice_val);		
		//$("#cntSliceAddons_createsub").val(slicemoreprice_countperslice_val);		
	});	
	
	//Ajax	
	cntSliceAddons1		=	$("#cntSliceAddons1").val();		
	var cntsliceaddonsize	=	$("#cntSliceAddons_createsub1").val();
	if(cntsliceaddonsize == ''){
		cntsliceaddonsize_new	=	cntSliceAddons1;
	}else{
		cntsliceaddonsize_new	=	cntsliceaddonsize;
	}	
	$("#cntSliceAddons_createsub1").val(++cntsliceaddonsize_new);
    
    //$(".free").attr('checked',false);
    //$(".paid").attr('checked',true);
    //$("input.paid").trigger('click');
}
//------------------------------------------------------------------------------------------//
function removeSlice(slice_id){	
	
    $(".madSubAddonNew2").css("display", "none");//alert(slice_id);
    
	$('.specialsize'+ slice_id).remove();
    $('.specialsize_main'+ slice_id).remove();
	var cntSliceAddons = 0;
	//Slice addons more price:
	$(".slicemoreprice").each(function(index){		
		var now_id		=	$(this).attr("id");
		var now_id_arr	=	now_id.split("_");
				
		if(cntSliceAddons == 0){
			cntSliceAddons	=	$("#cntSliceAddons").val();
		}
        //alert(cntSliceAddons);		
		var slicemoreprice_countperslice  =	$("#slicemoreprice_countperslice_"+now_id_arr[1]+"_"+now_id_arr[2]).val();
        //alert(slicemoreprice_countperslice);
        		
		if(slicemoreprice_countperslice == ''){			
			var slicemoreprice_countperslice_val =	--cntSliceAddons;
		}else{
			var slicemoreprice_countperslice_val =	--slicemoreprice_countperslice;
		}		
		//alert(slicemoreprice_countperslice_val);
		$('#addonsprice_slice_'+slicemoreprice_countperslice_val).remove();
		
		$("#slicemoreprice_countperslice_"+now_id_arr[1]+"_"+now_id_arr[2]).val(slicemoreprice_countperslice_val);	
        
        //Page
		$("#cntSliceAddons_createsub").val(slicemoreprice_countperslice_val); 
		//Ajax
		$("#cntSliceAddons_createsub1").val(slicemoreprice_countperslice_val);	
	}); 
	//cntSliceAddons		=	$("#cntSliceAddons").val();
    //alert(cntSliceAddons);
	//$("#cntSliceAddons_createsub").val(--cntSliceAddons); 
    //$("#cntSliceAddons_createsub1").val(--cntSliceAddons);
	var page  = window.location.href;
	//alert(page);	
	//window.location.replace(page);
}
//------------------------------------------------------------------------------------------//
function removeAddon(parentid,catid,mainaddon_id,menu_addonid,resid,addon_name,menu_id){
	//alert(parentid);
	//alert(catid);
	//alert(mainaddon_id);
	//alert(menu_addonid);
	//alert(addon_name);
	//alert("removeAddon");
    if(menu_id == ''){
        var menu_id		=	$(".menu_id").val();
    }
	//alert(menu_id);
    var useRestaurant = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxActionRestaurant.php' : '/use-restaurant';
	if(confirm('Are you sure want to delete?')){	
		$("#madAddons_firstajax").hide();
		//$(".showcataddonsList_delete").load(jssitebaseUrl+"/ajaxActionRestaurant.php?parentid="+parentid+"&catid="+catid+"&mainaddon_id="+mainaddon_id+"&menu_addonid="+menu_addonid+"&menu_id="+menu_id+"&resid="+resid+"&addon_name="+addon_name+"&action=deleteAddons",function(response){
		//$("#menusize_option_add").hide();
		//$("#menusize_option").hide();
		//$("#madAddons_slice").hide();
		//$(".showcataddonsList_delete").load(jssitebaseUrl+useRestaurant, {"parentid":parentid,"catid":catid,"mainaddon_id":mainaddon_id,"menu_addonid":menu_addonid,"resid":resid,"menuid":menu_id,"action":"deleteAddons","addon_name":addon_name},function(response){
																																																															   $("#showcataddonsList").load(jssitebaseUrl+useRestaurant, {"parentid":parentid,"catid":catid,"mainaddon_id":mainaddon_id,"menu_addonid":menu_addonid,"resid":resid,"menuid":menu_id,"action":"deleteAddons","addon_name":addon_name},function(response){
			//$("#menusize_option_add").hide();
			//$("#menusize_option").hide();
			//$("#madAddons_slice").hide();
			//$("#madAddons_firstajax").hide();
			$("#specialPizzaSize").children("tbody").remove();
		});
	}	
}
//------------------------------------------------------------------------------------------//
//Get Show Addons
	function getShowAddons(catid){
	   
		var restaurant_name = $("#restaurant_name").val();
		//$("#menusize_option_add").hide();		
		$("#showcataddonsList").load(jssitebaseUrl+"/ajaxActionRestaurant.php?catid="+catid+"&resid="+restaurant_name+"&action=showCatAddonsList",function(resp){
		  if (resp != '') {
		      $("input[type=radio]:checked").trigger('click');
		  }
          
			//$("#menusize_option_add").hide();
		});
	}
	function getShowAddonsEdit(catid){
		//alert(catid);
		var restaurant_name = $("#restaurant_name").val();
		var menu_id		=	$(".menu_id").val();
		//alert(menu_id);
		$("#menusize_option").hide();
		$("#showcataddonsList1").load(jssitebaseUrl+"/ajaxActionRestaurant.php?catid="+catid+"&resid="+restaurant_name+"&menu_id="+menu_id+"&action=showCatAddonsList",function(resp){
			$("#menusize_option").hide();
		});
		$("#showcataddonsList1").show();
	}
//------------------------------------------------------------------------------------------//	
//Addons In Menu Mgmt
function showAddons(){
	//alert("ren");
	//Error Language
	var err_lang_arr = error_language();
	var catid = $("#menu_category").val();
	var restaurant_name = $("#restaurant_name").val();
    var menuid = $("#menuid").val();
    var sizeoption = $("input[name=sizeoption]:checked").val();
	
	if(catid == ''){
		$("#addonsval_no").trigger('click');
		//$("#caterrormsg").addClass('errClass').html(err_lang_arr['please_enter_menu_cat1']);
        $("#caterrormsg").addClass('errClass').html("Please select your category");
		$("#menu_category").focus();
		//return false;		
	}else{
	    //$("#menusize_option_add").hide();
		//$("#showcataddonsList").load(jssitebaseUrl+"/ajaxActionRestaurant.php?catid="+catid+"&resid="+restaurant_name+"&action=showCatAddonsList");
		$("#showcataddonsList").show();
        if (menuid == '') {
            //alert(sizeoption);
            //return false;
            if (sizeoption == 'fixed') {
                $("#sizeoption_fixedprice").trigger('click');    
            } else if (sizeoption == 'default') {
                $("#sizeoption_default").trigger('click');    
            } else if (sizeoption == 'other') {
                $("#sizeoption_other").trigger('click');    
            }
                
        }
        
        
        //$("#sizeoption_fixedprice2").attr('checked',true);
        
        /*$(".priceoptionhide").hide();
        $(".showprice_size").hide();
        $(".showprice_slice").hide();*/
		//document.getElementById("showcataddonsList").style.display = "block";
	}
}
//------------------------------------------------------------------------------------------//
//Addons In Menu Mgmt
function showeditaddon(){
	//Error Language
	var err_lang_arr = error_language();	
	var catid = $("#menu_category1").val();
	var restaurant_name = $("#restaurant_name").val();	
	if(catid == ''){
		$("#addonsval_yes1").attr('checked',false);
		$("#addonsval_no1").attr('checked',true);
		$("#caterrormsg1").addClass('errClass').html(err_lang_arr['please_enter_menu_cat']);
		$("#menu_category1").focus();
		return false;		
	}else{		
		$("#menusize_option").hide();
		$("#showcataddonsList1").load(jssitebaseUrl+"/ajaxActionRestaurant.php?catid="+catid+"&resid="+restaurant_name+"&action=showCatAddonsList");
		$("#showcataddonsList1").show();
		//document.getElementById("showcataddonsList1").style.display = "block";
	}
}
//------------------------------------------------------------------------------------------//
/*  Restaurantowner Dashboar page icon tab  */
$(document).ready(function(){ 						  
	$(".menubgInner a, .menubgInner span").click(function() { //When click open tab  
			$(".myAccntMenuUl li a").removeClass("active");
			var iconactiveTab = $(this).attr("id");
			$(".ownerTabContent").hide();
			var iconactiveTab = iconactiveTab.replace("_sub",""); 
			$("#"+iconactiveTab).addClass("active");
			$("#"+iconactiveTab+"_content").show();
			var activeURL = jssitebaseUrl+"/restaurantOwnerMyaccount.php#"+iconactiveTab; //alert(activeURL);
			window.location.href = activeURL;
			//location.reload();
			/*$('#loadingimg').html('<div style="text-align:center;min-height:500px;"><img src="'+jssitebaseUrl +'/images/loader.gif" border="0" alt="Loading" /></div>').show();
			setTimeout(function(){
				 $('#'+iconactiveTab+'_content').show();
				 
				 $("#loadingimg").hide(); 
			}, 2000);*/
	});
});
  
//---------------------------------------------------------google map----------------------------------------------------
function viewMap(){
	
	var restaurant_delivery_distance	=	$("#restaurant_delivery_distance").val();	
	
	//alert(restaurant_delivery_distance);
		
	$("#map_distance_show").html('<img src="{$SITE_IMAGE_URL}/images/loader.gif" border="0" alt="Loading" />');
	//alert("before ajax");
	$("#map_distance_show").load(jssitebaseUrl+"/ajaxAction.php?action=mapInfoUpdate&restaurant_delivery_distance="+restaurant_delivery_distance,function(response){	
		//alert("after ajax");
		//alert(response);	
				var restaurant_address 	= $('#restaurant_address').val();
				//var rest_deliver_miles 	= $('#rest_deliver_miles').val();
				
				//alert(restaurant_address);
				//alert(rest_deliver_miles);
				
				restaurant_gmap_delivery_area(restaurant_address, restaurant_delivery_distance);
	});
}


	/*$(document).ready(function(){
		$('[data-toggle="modal"]').on('click',function(){
			var toppop = $(window).scrollTop() + 30;
			$(".modal").css("top",toppop);	
		});
	});*/
//-------------------------------------------------------------------------------------------------------------
function headerOrder(status){
	$("#owner_order").trigger('click');
	changeSortbyStatus(status,'Order');	
}


//Back History
function backHistory(){
	$('#rest_myorder').show();
	$('.pagination').show();
	$('.ownerStaticContainer').show();
	$('#rest_fullorder').hide();
}
//View Invoice Details
function restaurantInvoice(invoiceno,resid){
	$(".ownerStaticContainer").hide();
	$("#restaurantInvoice").hide();
	$('#restaurantInvoiceDetails').html('<div class="addtocartloading"><span class="image"><img src="'+jssitebaseUrl +'/theme/default/images/loader.gif" border="0" alt="Loading" /></span><span>Please wait...</span></div>').show();
	$('#restaurantInvoiceDetails').load(jssitebaseUrl+"/ajaxActionRestaurant.php",{'action':'restaurantInvoiceDetails','invoiceno':invoiceno,'resid':resid});
}
function backtoinvoice(){
	$(".ownerStaticContainer").show();
	$("#restaurantInvoice").show();
	$('#restaurantInvoiceDetails').hide();
}

//---------------------------------------------------------------------//
//Sort Order
$(document).ready(function(){
	//Category Sort Order
	
	var filenameurl = $("#filenameurl").val();
    
	/*$("#table_catgory").tableDnD({
	    onDragClass: "myDragClass",
	    onDrop: function(table, row) {
            var rows = table.tBodies[0].rows;
			var data = '';
            var debugStr = "Row dropped was "+row.id+". New order: ";
            for (var i=1; i<rows.length; i++) {
                debugStr += rows[i].id+"^";
				data += rows[i].id+"^";
                $("#sort_order_"+rows[i].id).html(i);
            }
			$.post(jssitebaseUrl+"ajaxFile.php", {data:data, action:'updateCategoryOrder'}, function(theResponse){
				//alert("ccc-->"+theResponse);
			}); 
	    }
	});*/
	
	//Menu Sort Order
	/*$("#table_menu").tableDnD({
	    onDragClass: "myDragClass",
	    onDrop: function(table, row) {
	    	//var totid = $("#totmenucnt").val();
	    	//alert(totid);
            var rows = table.tBodies[0].rows;
			var data = '';
            var debugStr = "Row dropped was "+row.id+". New order: ";
            for (var i=1; i<rows.length; i++) {
                debugStr += rows[i].id+"^";
				data += rows[i].id+"^";
                $("#sort_order_"+rows[i].id).html(i);
            }
			$.post(jssitebaseUrl+"ajaxFile.php", {data:data, action:'updateMenuOrder'}, function(theResponse){
				//alert("ccc-->"+theResponse);
			}); 
	    }
	});*/
    
});


//Plugin Concept
function restaurantPlugin(resid, resname) {
    
    $('#restaurantPluginId').html('<textarea class="form-control" rows="5"><span id="plugins"></span>'+
                                    '<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>'+
                                    '<script type="text/javascript" src="'+jssitebaseUrl+'/plugin/widget.js?resid='+resid+'&resname='+resname+'"></script></textarea>');             				
                            					
}
function editCommissionInfoShow(){
		$(".commissionInfoDetails").hide();
		$("#editCommissionInfo").show();
		
}
function backCommissionInfo(){
	$(".commissionInfoDetails").show();
	$("#editCommissionInfo").hide();
}
    
 //////////---------Edit Commission Info
function editCommissionInfoValidate(){
	
	//Error Language
	var err_lang_arr = error_language();
	
	var regexp1 	= new RegExp("^[0-9]{0,10}([\.][0-9]{1,2})?$");
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
	var restaurant_commission	= $.trim($("#restaurant_commission").val());
    
	$(".errClass").html('');
		if(restaurant_commission == ''){
			$(".resCommissionTimeErr").html(err_lang_arr['res_owner_setting_commission']);
			$("#restaurant_commission").focus();
			return false;		
		}else if(isNaN(restaurant_commission)){
			$(".resCommissionTimeErr").html(err_lang_arr['res_owner_setting_comis_valchar']);
			$("#restaurant_commission").focus();
			return false;
		}else if(!regexp1.test(restaurant_commission)){
			$(".resCommissionTimeErr").html(err_lang_arr['res_owner_setting_comis_valchar']);
			$("#restaurant_commission").focus();
			return false;
		}
	
	
	
	$.post(jssitebaseUrl+useFile,{'restaurant_commission':restaurant_commission,'action':'restaurantEditCommissionInfo'}, function(output){
		//alert(output);return false;
		if(output == 'success'){
			$(".commissionInfoDetails").load(jssitebaseUrl+"/ajaxActionRestaurant.php?action=resownerEditCommissionInfoList");
            $("#CommissionErr").addClass('succmsg').html("Your commission info updated successfully").show();
			setTimeout(function() { 
				$("#editCommissionInfo").hide();
				$(".commissionInfoDetails").show();
                $("#CommissionErr").hide();
				$("#CommissionErr").removeClass('succmsg'); 
            }, 2000);
		}
	});
} 
//If delivery is yes
function restaurantDeliverYes(){
    $("#Deliveryinfo").show();
}

function restaurantDeliverNo(){
    $("#Deliveryinfo").hide();
}   

