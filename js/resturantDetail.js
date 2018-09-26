//text box check value script word is there or not
$("input[type=text],textarea").keyup(function(){
    var output = $(this).val();
    //alert(output);
    if(output.toLowerCase().match(/script/)) {
        $(this).val('');
	    alert("Please Avoid java script related codes");    
	}
});	

function getCurrentScroll() {
	return window.pageYOffset || document.documentElement.scrollTop;
}
$(document).ready(function(){
	//Cart Fixed Script
	$(".cartScroll").click(function(){
		 	var cartWindHeight = $(window).height();
			 $(".cartMenu").css("height",cartWindHeight + "px");
			 $(".cartMenu").addClass("showCart");
			 $(".cartMask").show();
	});
	$(".cartMask,.cart-close").click(function(){
		$(".cartMask").hide();
		$(".cartMenu").removeClass("showCart");
	});
	var shrinkHeader = 100;
	$(window).scroll(function() {
		var scroll = getCurrentScroll();
		if ( scroll >= shrinkHeader ) {
			$('.headerBtm').addClass('active');
		}
		else {
			$('.headerBtm').removeClass('active');
		}
	});
	
		


    $(".textbox-leftIcn").click(function(){
    	$('#menuvalue').toggle('slide', 'right', 500);
    });
     $(".detRiteNewCont1Ul li.item .contNew1").click(function(){
    	$(this).toggleClass("active");
    	$(this).parent().parent().next().toggle();
    	//execute();
    });
     $("#restDetailmobile").click(function(){
		$(this).parent().next(".categorysel-xs").toggleClass("active");
	});
    //Category Select
    // $(".category-leftIcn").click(function(){
    // 	$('.fullMeuListUl').toggle('slide', 'right', 500);
    // });
    //Scroll Top
    $(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollup').fadeIn();
		} else {
			$('.scrollup').fadeOut();
		}
	}); 
	
	$('.scrollup').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 600);
		return false;
	});
    
    // $(".fullMeuListUl li").click(function(){
    //    $(".fullMeuListUl").fadeOut(100); 
    // });
    var type = $("[name=deliverypickup]:checked").val();
    var ordoption = $("#ordoption").val();
    
    if(type == 'delivery'){
       $("#deliveryopt").click();
    }
    
   //alert(ordoption);
    if(ordoption == 'pickup'){
         $("#pickupopt").click();
    }else{
        $("#deliveryopt").click();
       
    }
    
	//..................................................................................
	//Restaurant Details Page Tab
    $("#Button__Tabs_Group__details_map").click(function(){
		  
			
			var reslattitude 	= $('#reslattitude').val();
			var reslongtitude 	= $('#reslongtitude').val();
			var resid 			= $('#resid').val();
            
			resDetailsGmap(reslattitude,reslongtitude,resid);
		
		});
	$(".detailsMainMenuUl li a").click(function() { //When click open tab
		var mapTab = $(this).parent().attr('id');
		if(mapTab == 'Button__Tabs_Group__details_menu'){
			$(".cartScroll").show();	
		}
		else{
			$(".cartScroll").hide();
		}
		
		//Google Map
		if ( $("#Button__Tabs_Group__details_map").hasClass("ionTabs__tab_state_active") )
		{
		  //alert('hii');
          	var reslattitude 	= $('#reslattitude').val();
			var reslongtitude 	= $('#reslongtitude').val();
			var resid 			= $('#resid').val();
            
			resDetailsGmap(reslattitude,reslongtitude,resid);
		};
		
		
		/*$('#loadingimg').html('<div style="text-align:center;min-height:500px;"><img src="'+jssitebaseUrl +'/theme/default/images/loader.gif" border="0" alt="Loading" /></div>').show();
		setTimeout(function(){
			 $("#loadingimg").hide(); 
			 $('#'+activeTab+'_content').show();
		}, 50);*/
	$("#sidebar,.catleftIn").addClass("relativescroll");
	//$.getScript(jssitebaseUrl+'/js/scrollnew.js');
	});
	$(window).scroll(function () {
		var topval = $(".header").outerHeight()+$(".detSrchInner").outerHeight()+$(".detailsMainMenuUl").outerHeight()+50;	
		var scrolltop = $(window).scrollTop();
		if(scrolltop>topval){
			$("#sidebar,.catleftIn").removeClass("relativescroll");
		}
	});
	
	//..................................................................................
	//Restaurant Veg & Nonveg Tab
	$(".detailsOption div").click(function() { //When click open tab
		
		var resid = $("#restaid").val();
		var activeTab = $(this).attr("id");
		$(".menusvegnonvegtab").hide();
		$('#vegNonvegIndiv_Items').hide();
		
		
		if(activeTab == 'menus_veg'){
			
			$('#loadingimg_vegnonveg').html('<div class="loaderveg"><img src="'+jssitebaseUrl +'/theme/default/images/loader_veg.gif" border="0" alt="Loading" /></div>').show(); //Loading for Category
			$('#loadingimg_vegnonveg_items').html('<div class="loaderveg"><img src="'+jssitebaseUrl +'/theme/default/images/loader_veg.gif" border="0" alt="Loading" />&nbsp;Please wait...</div>').show(); //Loading for Menu Item
		}else{
			
			$('#loadingimg_vegnonveg').html('<div class="loadernonveg"><img src="'+jssitebaseUrl +'/theme/default/images/loader_nonveg.gif" border="0" alt="Loading" /></div>').show(); //Loading for Category
			$('#loadingimg_vegnonveg_items').html('<div class="loadernonveg"><img src="'+jssitebaseUrl +'/theme/default/images/loader_nonveg.gif" border="0" alt="Loading" />&nbsp;Please wait...</div>').show(); //Loading for Menu Item
		}
		setTimeout(function(){
			 $("#loadingimg_vegnonveg").hide();
			 $("#loadingimg_vegnonveg_items").hide();  
			 $('#'+activeTab+'_content').show();
			 $('#'+activeTab+'_details').show();
		}, 50);
	});
	//..................................................................................
	//Close Add to Cart
	/*$("#closeOrder").click(function (){
		var menuid = $(".mid").val();
		$('#maska').fadeOut();
		$("#orderpop").hide();
		$('#loadingimg_veg'+menuid).hide();
		$('#loadingimg_nonveg'+menuid).hide();
	});
	//..................................................................................
	//Close Add to Cart
	$("#closeNoteitPop").click(function (){
		$('#maska').fadeOut();
		$("#noteitpop").hide();
	});*/
	//..................................................................................
	//Menus in edit profile page starts here
		accordion_script();

        

    	//Menus in edit profile page ends here
});

function clear()
{
    //alert('hi');
    	 $("#contactname").val('');
         $("#contactlastname").val('');
	
    	$("#deliveryaddresstitle").val('');
        $("#otheraddresstitle").val('');
        $("#cus_type").val('');
        	
        $("#deliveryaddress").val('');
        $("#deliverystreet").val('');
        $("#deliverylandmark").val('');
         $("#deliveryarea").val('');
        $("#deliverycity").val('');
        $("#deliveryzip").val('');
         $("#deliverystate").val('');
        $("#contactphone").val('');
        $("#contactlandline").val('');
        $("#contactemail").val('');
        $("#contactpassword").val('');
            
        return false;
}


//..................................................................................
//Category wise menu list
function categoryMenuListIndi(catid,resid){
		
	//$('#menus_veg_details').hide();
	$('#menus_details').hide();
	$('#Indiv_Items').show();
	
	$('#Indiv_Items').html('<div class="loaderveg"><img src="'+jssitebaseUrl +'/theme/default/images/loader_veg.gif" border="0" alt="Loading" />&nbsp;Please wait...</div>'); //Loading for Menu Item
	$('#Indiv_Items').load(jssitebaseUrl+"/ajaxAction.php",{'action':'CategoryMenu','catid':catid, 'resid':resid } );
	$(".leftside").load(jssitebaseUrl+"/ajaxAction.php", {'action':'CategoryMenuleft','catid':catid, 'resid':resid } );
}
//..................................................................................
//Category wise veg menu list
function categoryVegMenuList(catid,resid){
	
	$('#menus_veg_details').hide();
	$('#menus_nonveg_details').hide();
	$('#vegNonvegIndiv_Items').show();
	
	$('#vegNonvegIndiv_Items').html('<div class="loaderveg"><img src="'+jssitebaseUrl +'/theme/default/images/loader_veg.gif" border="0" alt="Loading" />&nbsp;Please wait...</div>'); //Loading for Menu Item
	$('#vegNonvegIndiv_Items').load(jssitebaseUrl+"/ajaxAction.php?action=vegCategoryMenu", { 'catid':catid, 'resid':resid } );
}
//..................................................................................
//Category wise Non veg menu list
function categoryNonvegMenuList(catid,resid){
	
	$('#menus_veg_details').hide();
	$('#menus_nonveg_details').hide();
	$('#vegNonvegIndiv_Items').show();
	
	$('#vegNonvegIndiv_Items').html('<div class="loadernonveg"><img src="'+jssitebaseUrl +'/theme/default/images/loader_nonveg.gif" border="0" alt="Loading" />&nbsp;Please wait...</div>'); //Loading for Menu Item
	$('#vegNonvegIndiv_Items').load(jssitebaseUrl+"/ajaxAction.php?action=nonvegCategoryMenu", { 'catid':catid, 'resid':resid } );
}
//----------------------------------------------------------------------------------
//Populat List menu
function searchPopularList(resid){
    
	//Popular
	if(document.getElementById("popular").checked == true){
		var popular  = $("#popular").val();
		$('#resscrollDownTop').val('Y');
	}else{
		var popular  = '';
		$('#resscrollDownTop').val('N');
	}
	//Spicy
	if(document.getElementById("spicy").checked == true){
		var spicy  = $("#spicy").val();
		$('#resscrollDownTop').val('Y');
	}else{
		var spicy  = '';
		$('#resscrollDownTop').val('N');
	}
	//Non Veg
	if(document.getElementById("nonveg").checked == true){
		var nonveg  = $("#nonveg").val();
		$('#resscrollDownTop').val('Y');
	}else{
		var nonveg  = '';
		$('#resscrollDownTop').val('N');
	}
	//Veg
	if(document.getElementById("veg").checked == true){
		var veg  = $("#veg").val();
		$('#resscrollDownTop').val('Y');
	}else{
		var veg  = '';
		$('#resscrollDownTop').val('N');
	}
	
	$('#menus_details').load(jssitebaseUrl+"/ajaxAction.php?action=selectOptionMenuList", { 'resid':resid, 'popular':popular, 'nonveg':nonveg, 'veg':veg, 'spicy':spicy } );
}
//..................................................................................
//Add to Cart
function menuOrder(menuid,resid){
	    //alert(menuid);   
		$(".mid").val(menuid);
		//myPopupWindowOpen('#orderpop','#maska');
		//Form
		$('#addt').html('<div class="addtocartloading"><span class="image"><img src="'+jssitebaseUrl +'/theme/default/images/loader.gif" border="0" alt="Loading" /></span><span>Please wait...</span></div>').show();
		//$("#Popupordermenuinfo").load(jssitebaseUrl+"/ajaxAction.php?action=orderPopup&menuid="+menuid+"&resid="+resid, function(response){
			$("#addt").load(jssitebaseUrl+"/ajaxAction.php",{'action':'orderPopup','resid':resid,'menuid':menuid},function(response){
		  if($.trim(response) != ''){
		      $("input[name=pizza_size]:visible:checked").trigger("click");
		  }
		});
        
		//$(".popbgmask").show();
		//$(".popupContain").show();
}
function addhovercart(){
	var addnewcart = $(".addtoCartInner").height() + 50;
	$(".popupContain").css("height",addnewcart);
	//$(".maskaPop").css("height",maskpopheight);
}	

//Add to Cart noteItPopup
function noteItPopup(menuid){
	
		$("#orderpop").hide();
		
		//Loading Image
		$('#loadingimg_veg'+menuid).html('<div style="text-align:center;min-height:100px;"><img src="'+jssitebaseUrl +'/theme/default/images/loader_veg.gif" border="0" alt="Loading" /></div>').hide();
		$('#loadingimg_nonveg'+menuid).html('<div style="text-align:center;min-height:100px;"><img src="'+jssitebaseUrl +'/theme/default/images/loader_nonveg.gif" border="0" alt="Loading" /></div>').hide();
		
		myPopupWindowOpen('#noteitpop','#maska');
}
//---------------------------------------------------------------------------------------------------------------
//Add To Cart
function addToMenu(){
    
	//padMenu = parseInt($(".middleIn").css("paddingBottom"));
	//$(".middleIn").css("paddingBottom",padMenu+40);	
	var menuid     	  = $("#menuid").val();
	var resid      	  = $("#restid").val();
	var quantity      = $("#qty").val();
	var menuspl_ins   = $("#splins").val();
	menuspl_ins    	  = check_undefined(menuspl_ins);
	var offer		  = $("#offer").val();
    var resname       = $("#resname").val();  
	offer    	  	  = check_undefined(offer);
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
	
	var pizzasliceprice_position	=	$("#pizzasliceprice_position").val();
	
	$.post(jssitebaseUrl+useFile,{"menuid":menuid,"action":"checkCategoryName"},function(response){
		//if($.trim(response) == 'pizza'){
		//  alert(response);
			var sizeoption  = $("#sizeoption").val();
			if(sizeoption == 'size'){
				var pizzasmall  = $("#pizzasmall").val();
				var pizzamedium = $("#pizzamedium").val();
				var pizzalarge  = $("#pizzalarge").val();
				
				if(pizzasmall != ''){
					if(document.getElementById("size_small").checked == true){
						var menuprice 	= $("#size_small").val();
						var pizzasize   = "Small_"+$("#size_small").val();
					}
				}
				if(pizzamedium != ''){
					if(document.getElementById("size_medium").checked == true){ 
						var menuprice 	= $("#size_medium").val();
						var pizzasize   = "Medium_"+$("#size_medium").val();
					}
				}
				if(pizzalarge != ''){
					if(document.getElementById("size_large").checked == true){ 
						var menuprice 	= $("#size_large").val();
						var pizzasize   = "Large_"+$("#size_large").val();
					}
				}
				if(pizzasmall == '' && pizzamedium == '' && pizzalarge == ''){
					var menuprice     = $("#menuprice").val();
				}
			}
			
			else if(sizeoption == 'fixed'){ //alert('hi');return false;
				var menuprice     = $("#menuprice").val();
			}
			else{
				var slicetype;
				var totslicetype = $("input[name=pizzasliceoption]:checked").length;
				
				if(totslicetype == undefined){
                    var slicetype = $("input[name=pizzasliceoption]:checked").val(); 
					var slice=slicetype;	
					if( slice !='' ){
						var pizzasize = slice;
					}
				}else{
					if(totslicetype > 0){
                        var slicetype = $("input[name=pizzasliceoption]:checked").val();
						var sliceSin=slicetype;	
						if( sliceSin !='' ){
							var pizzasize_slice = sliceSin;
						}
					}
				}
			}
			
		var addonstype1   = $("#addonstype1").val();
		//alert(addonstype1);
		if(addonstype1 >0){
			
			var multipleoption   = $("#multipleopt").val();
			var singleoption     = $("#singleopt").val();
			var singleoptioncnt  = $("#singleoptcnt").val();
			
			//Radio Button Value
			if(singleoption == 'single'){
				var AddonstypeSingle=[];
				$("div.single input[type=radio]:checked").each( function() {
				    AddonstypeSingle.push( this.value );
				});
			}
			
		    
			if(multipleoption == 'multiple'){
			//Check Box Value
				var totaddonsid = document.orderpop.addonstype.length;
				//alert("totaddonsid "+totaddonsid);
				if(totaddonsid == undefined){
					if(document.orderpop.addonstype.checked==true){
						addonstype=document.orderpop.addonstype.value;
					}
					var Addonsmul=addonstype;	
					if( Addonsmul !='' ){
						var Addonstypemultiple = Addonsmul+',';
					}
				}else{
					if(totaddonsid > 0){
						var addonstype=new Array();
						var j=0;
						for(var i=0;i<totaddonsid;i++){
							if(document.orderpop.addonstype[i].checked==true){
								addonstype[j]=document.orderpop.addonstype[i].value;
								j++;
							}
						}
						var Addonsmul=addonstype;	
						if( Addonsmul !='' ){
							var Addonstypemultiple = Addonsmul+',';
						}
					}
				}
			}
			
			if(Addonstypemultiple == undefined){
				var Addons = AddonstypeSingle;
			}
			else if(AddonstypeSingle == undefined){
				var Addons = Addonstypemultiple;
			}
			else{
				var Addons = AddonstypeSingle+','+Addonstypemultiple;
				//var Addons = Addonstypemultiple+AddonstypeSingle;
				//var Addons = Addonstypemultiple;
			}
		}	
			//alert("menuprice "+ menuprice);
			//alert("Addons "+Addons);
		
		Addons             	= check_undefined(Addons);  
		//pizzaAddons     	= check_undefined(pizzaAddons);
		//crustAddons    		= check_undefined(crustAddons);
		pizzasize      		= check_undefined(pizzasize);
		pizzasize_slice    	  = check_undefined(pizzasize_slice);
		
		//$("#orderpop").hide();
		//$(".neworderscroll").removeClass("fixedpos");
		//$("#maska").hide();
		$('#loadingimg_veg'+menuid).hide();
		$('#loadingimg_nonveg'+menuid).hide();
		
			//$(".popbgmask").hide();
			//$(".popupContain").hide();
		
		/*$('.restaurantMenuAddtocartmm').load(jssitebaseUrl+"/ajaxAction.php?menuid="+menuid+"&offer="+offer+"&resid="+resid+"&resname="+resname+"&menuprice="+menuprice+"&Addons="+Addons+"&quantity="+quantity+"&pizzasize="+pizzasize+"&pizzasize_slice="+pizzasize_slice+"&pizzasliceprice_position="+pizzasliceprice_position+"&action=addtoItem",{ 'menuspl_ins':menuspl_ins },
        function(){ */

        	$(".restaurantMenuAddtocartmm").load(jssitebaseUrl+"/ajaxAction.php",{'action':'addtoItem','menuid':menuid,'offer':offer,'resid':resid,'resname':resname,'menuprice':menuprice,'Addons':Addons,'quantity':quantity,'pizzasize':pizzasize,'pizzasize_slice':pizzasize_slice,'pizzasliceprice_position':pizzasliceprice_position,'menuspl_ins':menuspl_ins,},function(){

        	 var cartWindHeight = $(window).height();
			 var cartHead = $(".filterResult").height()+118;
			 var cartTop = $(".cartTop").height();
			 var cartBottom = $(".cartBottom").height();
			 var cartitemTable = (cartWindHeight)-(cartHead + cartTop + cartBottom);
			 //$(".cartitem-list").css("height",cartitemTable + "px");
			 //$(".cartMenu").css("height",cartWindHeight + "px");
			// $(".cartMenu").addClass("showCart");
			 //$(".cartMask").show();
			 
			 /*setTimeout(function(){
				 $(".cartMenu").removeClass("showCart");
				 $(".cartMask").hide();
			 }, 1000);*/
        	//execute();
        	//window.scrollBy(0, -10);
            if($.cookie('deliverypickup') == 'delivery' || $.cookie('deliverypickup') == null){
                $('#deliveryopt').click();
            }else{
                $('#pickupopt').click();
            }
             /*$.post(jssitebaseUrl+'/ajaxFile.php', {"resid":resid, "action":"getMenuCount"}, function(response){
                $('.cart-count').html(response);
                return false;  
            });*/
            /*$.post(jssitebaseUrl+'/ajaxFile.php', {"resid":resid, "action":"getMenuCount"}, function(response){
                $('#CartCount').html(response);
                return false;  
            });*/
			$(".cartloadingimage").show();
            $("#cartTotal").load(jssitebaseUrl+"/ajaxAction.php",{'action':'cartTotal','resid':resid},function(response){
				$(".cartloadingimage").hide();																						   
			}); 
            
        });
		return false;
		
	});
	return false;
	
}
//---------------------------------------------------------------------------------------------------------------
// Add To Cart (no needed this function)
function addToMenu1(){
	//alert("sri");
	
	var menuid     	  = $("#menuid").val();
	var resid      	  = $("#restid").val();
	//var menuprice     = $("#menuprice").val();
	//var addons     	  = $("#addons").val();
	//addons    	  	  = check_undefined(addons);
	//var splitaddons   = addons.split("+");
	//var addonsname    = $.trim(splitaddons[0]);
	//var addonsprice   = $.trim(splitaddons[1]);
	var quantity      = $("#qty").val();
	var menuspl_ins   = $("#splins").val();
	menuspl_ins    	  = check_undefined(menuspl_ins);
	var offer		  = $("#offer").val();
	offer    	  	  = check_undefined(offer);
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
	
	$.post(jssitebaseUrl+useFile,{"menuid":menuid,"action":"checkCategoryName"},function(response){
		//alert(response);
		if($.trim(response) == 'pizza'){
			
			var pizzasmall  = $("#pizzasmall").val();
			var pizzamedium = $("#pizzamedium").val();
			var pizzalarge  = $("#pizzalarge").val();
			
			if(pizzasmall != ''){
				if(document.getElementById("size_small").checked == true){
					var menuprice 	= $("#size_small").val();
					var pizzasize   = "Small_"+$("#size_small").val();
				}
			}
			if(pizzamedium != ''){
				if(document.getElementById("size_medium").checked == true){ 
					var menuprice 	= $("#size_medium").val();
					var pizzasize   = "Medium_"+$("#size_medium").val();
				}
			}
			if(pizzalarge != ''){
				if(document.getElementById("size_large").checked == true){ 
					var menuprice 	= $("#size_large").val();
					var pizzasize   = "Large_"+$("#size_large").val();
				}
			}
			if(pizzasmall == '' && pizzamedium == '' && pizzalarge == ''){
				var menuprice     = $("#menuprice").val();
			}
			
			var crusttype_cnt = $("#crusttype_cnt").val();
			if(crusttype_cnt >0){
				//Pizza Crust
				var totcrustid = document.orderpop.crusttype.length;
				if(totcrustid == undefined){
					if(document.orderpop.crusttype.checked==true){
						crusttypee=document.orderpop.crusttype.value;
					}
					var crustAddons1=crusttypee;
					if( crustAddons1 !='' ){
						var crustAddons = crustAddons1;
					}
				}else{
					if(totcrustid > 0){
						var crusttypee=new Array();
						var j=0;
						for(var i=0;i<totcrustid;i++){
							if(document.orderpop.crusttype[i].checked==true){
								crusttypee[j]=document.orderpop.crusttype[i].value;
								j++;
							}
						}
						var crustAddons1=crusttypee.toString();
						if( crustAddons1 !='' ){
							var crustAddons = crustAddons1;
						}
					}
				}
			}
			
			var pizzatype1 = $("#pizzatype1").val();
			if(pizzatype1 > 0){
				//Pizza Topping
				var totpizzaid = document.orderpop.pizzatype.length;
				if(totpizzaid == undefined){
					if(document.orderpop.pizzatype.checked==true){
						pizzatype=document.orderpop.pizzatype.value;
					}
					var pizzaAddons1=pizzatype;
					if( pizzaAddons1 !='' ){
						var pizzaAddons = pizzaAddons1;
					}
				}else{
					if(totpizzaid > 0){
						var pizzatype=new Array();
						var j=0;
						for(var i=0;i<totpizzaid;i++){
							if(document.orderpop.pizzatype[i].checked==true){
								pizzatype[j]=document.orderpop.pizzatype[i].value;
								j++;
							}
						}
						var pizzaAddons1=pizzatype.toString();
						if( pizzaAddons1 !='' ){
							var pizzaAddons = pizzaAddons1;
						}
					}
				}
			}
		}
		else{
			var menuprice     = $("#menuprice").val();
			var addonstype1   = $("#addonstype1").val();
			
			if(addonstype1 >0){
				//Addons
				var totaddonsid = document.orderpop.addonstypecart.length;
				if(totaddonsid == undefined){
					if(document.orderpop.addonstypecart.checked==true){
						addonstypecart=document.orderpop.addonstypecart.value;
					}
					var Addons1=addonstypecart;
					if( Addons1 !='' ){
						var Addons = Addons1;
					}
				}else{
					if(totaddonsid > 0){
						var addonstypecart=new Array();
						var j=0;
						for(var i=0;i<totaddonsid;i++){
							if(document.orderpop.addonstypecart[i].checked==true){
								addonstypecart[j]=document.orderpop.addonstypecart[i].value;
								j++;
							}
						}
						var Addons1=addonstypecart.toString();
						if( Addons1 !='' ){
							var Addons = Addons1;
						}
					}
				}
			}
		}
		
		Addons         = check_undefined(Addons);
		pizzaAddons    = check_undefined(pizzaAddons);
		crustAddons    = check_undefined(crustAddons);
		pizzasize      = check_undefined(pizzasize);
		
		$("#orderpop").hide();
		$("#maska").hide();
		$('#loadingimg_veg'+menuid).hide();
		$('#loadingimg_nonveg'+menuid).hide();
		//return false;
		
		//$('#restaurantMenuAddtocart').load(jssitebaseUrl+"/ajaxAction.php?action=addtoItem",{ 'menuid':menuid,'offer':offer,'resid':resid,'menuprice':menuprice,'Addons':Addons,'quantity':quantity,'menuspl_ins':menuspl_ins,'pizzaAddons':pizzaAddons,'crustAddons':crustAddons,'pizzasize':pizzasize});
		
		$('.restaurantMenuAddtocartmm').load(jssitebaseUrl+"/ajaxAction.php?action=addtoItem",{ 'menuid':menuid,'offer':offer,'resid':resid,'menuprice':menuprice,'Addons':Addons,'quantity':quantity,'menuspl_ins':menuspl_ins,'pizzaAddons':pizzaAddons,'crustAddons':crustAddons,'pizzasize':pizzasize});
		
		/*//$('#restaurantMenuAddtocart').load(jssitebaseUrl+"/ajaxAction.php?action=addtoItem", {'menuid':menuid, 'offer':offer,'resid':resid, 'menuprice':menuprice, 'addonsname':addonsname, 'addonsprice':addonsprice,'quantity':quantity,'menuspl_ins':menuspl_ins,'pizzaAddons':pizzaAddons, 'crustAddons':crustAddons, 'pizzasize':pizzasize} );
		//$('#restaurantMenuAddtocart').load(jssitebaseUrl+"/ajaxAction.php?menuid="+menuid+"&offer="+offer+"&resid="+resid+"&menuprice="+menuprice+"&addonsname="+addonsname+"&addonsprice="+addonsprice+"&quantity="+quantity+"&menuspl_ins="+menuspl_ins+"&pizzaAddons="+pizzaAddons+"&crustAddons="+crustAddons+"&pizzasize="+pizzasize+"&action=addtoItem" );*/
	});
	return false;	
}
//Delete To Cart
function deletecartItem(cartid){
	var resid = $("#resid").val();
	var offer = $("#offer").val();
    var resname = $("#resname").val();
	offer     = check_undefined(offer);
	
	//$('#restaurantMenuAddtocart').load(jssitebaseUrl+"/ajaxAction.php?cartid="+cartid+"&offer="+offer+"&resid="+resid+"&action=deleteItem" );
	//$('.restaurantMenuAddtocartmm').load(jssitebaseUrl+"/ajaxAction.php?cartid="+cartid+"&offer="+offer+"&resname="+resname+"&resid="+resid+"&action=deleteItem",function(){
		$(".restaurantMenuAddtocartmm").load(jssitebaseUrl+"/ajaxAction.php",{'action':'deleteItem','cartid':cartid,'offer':offer,'resname':resname,'resid':resid},function(){
	    var cartWindHeight = $(window).height();
		 var cartHead = $(".filterResult").height()+118;
		 var cartTop = $(".cartTop").height();
		 var cartBottom = $(".cartBottom").height();
		 var cartitemTable = (cartWindHeight)-(cartHead + cartTop + cartBottom);
		// $(".cartitem-list").css("height",cartitemTable + "px");
		 $(".cartMenu").css("height",cartWindHeight + "px");
		 $(".cartMenu").addClass("showCart");
		 $(".cartMask").show();

		
        if($.cookie('deliverypickup') == 'delivery'){
            $('#deliveryopt').click();
        }else{
            $('#pickupopt').click();
        }
        /*$.post(jssitebaseUrl+'/ajaxFile.php', {"resid":resid, "action":"getMenuCount"}, function(response){
            $('#CartCount').html(response);
            return false;
        });*/
        /*$.post(jssitebaseUrl+'/ajaxFile.php', {"resid":resid, "action":"getMenuCount"}, function(response){
            $('.cart-count').html(response);
            return false;
        });*/
        $("#cartTotal").load(jssitebaseUrl+"/ajaxAction.php",{'action':'cartTotal','resid':resid});  

	});
    return false;
}
//Decrement And Increment
function orderItemDecInc(rowid,decinc){
		
	var resid = $("#resid").val();
	var offer = $("#offer").val();
	offer     = check_undefined(offer);
	var menuid = $("#menuid"+rowid).val();
	var cartid = $("#cartid"+rowid).val();
    var resname = $("#resname").val();
    
    //alert(resname);
	
	var orderoption = (decinc == '0') ? 'dec' : 'inc';
	
	//$('#restaurantMenuAddtocart').load(jssitebaseUrl+"/ajaxAction.php?menuid="+menuid+"&offer="+offer+"&orderoption="+orderoption+"&resid="+resid+"&action=modifyItem" );
	/*$('.restaurantMenuAddtocartmm').load(jssitebaseUrl+"/ajaxAction.php?menuid="+menuid+"&offer="+offer+"&resname="+resname+"&orderoption="+orderoption+"&resid="+resid+"&cartid="+cartid+"&action=modifyItem",function(){*/

	$(".restaurantMenuAddtocartmm").load(jssitebaseUrl+"/ajaxAction.php",{'action':'modifyItem','menuid':menuid,'offer':offer,'resname':resname,'orderoption':orderoption,'resid':resid,'cartid':cartid},function(){
	  
        if($.cookie('deliverypickup') == 'delivery'){
            $('#deliveryopt').click();
        }else{
            $('#pickupopt').click();
        }
        /*$.post(jssitebaseUrl+'/ajaxFile.php', {"resid":resid, "action":"getMenuCount"}, function(response){
            $('#CartCount').html(response);
            return false;
        });	*/  
        $("#cartTotal").load(jssitebaseUrl+"/ajaxAction.php",{'action':'cartTotal','resid':resid});  
  	}); 
  	return false;
}


//Offer Percentage DropdownList Show And Calcullation.
function offerValue(offer)
{
	var resid = $("#resid").val();
	//$('#restaurantMenuAddtocart').load(jssitebaseUrl+"/ajaxAction.php?offer="+offer+"&resid="+resid+"&action=offerItem");
	$('.restaurantMenuAddtocartmm').load(jssitebaseUrl+"/ajaxAction.php?offer="+offer+"&resid="+resid+"&action=offerItem");
}
function check_undefined(Chk_Var)
{
	if(Chk_Var == undefined){
		Chk_Var = ""; }
	return Chk_Var;
}
//--------------------------------------------------------------------------------------
function clickCheckedBox(id,cnt,mysel_length,addclass){
	
	//Error Language
	var err_lang_arr = error_language();
	
    var total_true = $('input.'+addclass+':checked').length;
	/*var total = 0;
	var total_true = 0;
	for(var i=1; i<= cnt; i++){
		var xx = document.getElementById("addonstype_"+cnt+"_"+i).checked;
		if(xx == false){
			total++;
		}else{
			total_true++;
		}
	}*/
	if(total_true > mysel_length)
	{
	   $("#limitaddon").html(err_lang_arr['resdetail_you_can_select_max'] + mysel_length +' '+ err_lang_arr['resdetail_addons_only']);
	    //myPopupWindowOpen("#orderPopup_limit","#maskaa");
		$("#"+id).prop("checked",false);
		alert(err_lang_arr['resdetail_you_can_select_max'] + mysel_length +' '+ err_lang_arr['resdetail_addons_only']);
		
		return false;
        
	}
}

//-----------------------------------------------------------------
//Organize Review
function organizeReview(ratingval,resid) {
	
	$('#revieworganizeby').load(jssitebaseUrl+"/ajaxAction.php",{'ratingval':ratingval,'resid':resid,'action':'reviewOrganize'});
}
//-----------------------------------------------------------------
//My Favorites
function myFavorites(resid){
	
	//Error Language
	var err_lang_arr = error_language();
	
	var Classname = $("#favaddrem").attr("class");
    
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';

	if(Classname == "detailsAddicon")
	{
		$.post(jssitebaseUrl+useFile,{'resid':resid, 'sel_type':'Add', 'action' : 'MyFavorites'},	function(data)
		{
		  //alert(data);return false;
			if(data == 'success'){
				$("#favaddrem span").text(err_lang_arr['res_det_myfav_content_remove']);
				$("#favaddrem").removeClass('detailsAddicon');
				$("#favaddrem").addClass('detailsMinusicon');	
				$("#favaddrem i").removeClass('glyphicon-plus-sign');
				$("#favaddrem i").addClass('glyphicon-minus-sign');
				
			}else{
				alert(err_lang_arr['resdetail_myfav_error_occured']);
			}
	 		
	 	});
	}
	else if(Classname == "detailsMinusicon")
	{
		$.post(jssitebaseUrl+useFile,{'resid':resid, 'sel_type':'Remove', 'action' : 'MyFavorites'}, function(data)
		{
			if(data == 'success'){
				$("#favaddrem span").text(err_lang_arr['res_det_myfav_content_add']);
				$("#favaddrem").removeClass('detailsMinusicon');
				$("#favaddrem").addClass('detailsAddicon');					
				$("#favaddrem i").removeClass('glyphicon-minus-sign');
				$("#favaddrem i").addClass('glyphicon-plus-sign');	
				
			}else{
				alert(err_lang_arr['resdetail_minus_error_occured']);
			}
			
		});
	}
	return false;
}

function pickupbutton(){
    $.cookie('deliverypickup','pickup');
	$(".showCheckoutButton").show();
	$(".hideCheckoutButton").hide();
	$("#deliveryShowCharge").hide();
	$(".totalWithoutDelCharge").show();
	$(".totalWithDelCharge").hide();
	$("#deliveryopt").parent("label").removeClass("active");
	$("#pickupopt").parent("label").addClass("active");	
	$.cookie('tuleke','tuberculo');
	
}
function deliverybutton(){
    $.cookie('deliverypickup','delivery');
	$(".showCheckoutButton").hide();
	$(".hideCheckoutButton").show();
	$("#deliveryShowCharge").show();
	$(".totalWithoutDelCharge").hide();
	$(".totalWithDelCharge").show();
	$("#deliveryopt").parent("label").addClass("active");
	$("#pickupopt").parent("label").removeClass("active");
}

function validateBooking(){
	//Error Language
	var err_lang_arr = error_language();
	
	var num_guests	 		=	$.trim($("#num_guests").val());
	var booking_date 		=	$.trim($("#booking_date").val());
	var booking_hours 		=	$.trim($("#booking_hours").val());
	var booking_mins 		=	$.trim($("#booking_mins").val());
	var booking_time 		=	$.trim($("#booking_time").val());
	var booking_name 		=	$.trim($("#booking_name").val());
	var booking_email 		=	$.trim($("#booking_email").val());
	var booking_mobileno 	=	$.trim($("#booking_mobileno").val());
	var booking_phoneno		=	$.trim($("#booking_phoneno").val());
	var booking_ext 		=	$.trim($("#booking_ext").val());
	var booking_instruction	=	$.trim($("#booking_instruction").val());
	var res_id				=	$.trim($("#rest_id").val());
	var letters 			=  /^[A-Za-z]+$/; 
    var useFile = (jssiteuserfriendly == 'N' || fb_domain_name == 'fb' || fb_domain_name == 'facebook') ? '/ajaxFile.php' : '/use-file';
	$("#booking_submit").prop("disabled",true);
    
	if(num_guests == ''){
	    $("#booking_submit").prop("disabled",false);
		$("#bookingerror").addClass('errormsg').html(err_lang_arr['booking_numguests']);
		$("#num_guests").focus();
		return false;		
	}	
	else if(booking_date == ''){
	    $("#booking_submit").prop("disabled",false);
		$("#bookingerror").addClass('errormsg').html(err_lang_arr['booking_date']);
		$("#booking_date").focus();
		return false;		
	}
	else if(booking_hours == ''){
	    $("#booking_submit").prop("disabled",false);
		$("#bookingerror").addClass('errormsg').html(err_lang_arr['booking_hour']);
		$("#booking_hours").focus();
		return false;		
	}
	
	else if(booking_name == ''){
	    $("#booking_submit").prop("disabled",false);
		$("#bookingerror").addClass('errormsg').html(err_lang_arr['booking_name']);
		$("#booking_name").focus();
		return false;		
	}
	else if(booking_email == ''){
	    $("#booking_submit").prop("disabled",false);
		$("#bookingerror").addClass('errormsg').html(err_lang_arr['booking_email']);
		$("#booking_email").focus();
		return false;		
	}
	else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(booking_email))){
	    $("#booking_submit").prop("disabled",false);
		$("#bookingerror").addClass('errormsg').html(err_lang_arr['booking_invalidemail']);
		$("#booking_email").focus();
		return false;		
	}
	else if(booking_mobileno == ''){
	    $("#booking_submit").prop("disabled",false);
		$("#bookingerror").addClass('errormsg').html(err_lang_arr['booking_mobileno']);
		$("#booking_mobileno").focus();
		return false;		
	}
	else if(isNaN(booking_mobileno)){
	    $("#booking_submit").prop("disabled",false);
		$("#bookingerror").addClass('errormsg').html(err_lang_arr['booking_invalidmobileno']);
		$("#booking_mobileno").focus();
		return false;		
	}
	else if(booking_mobileno.length != 10){
	    $("#booking_submit").prop("disabled",false);
		$("#bookingerror").addClass('errormsg').html(err_lang_arr['booking_lessmobileno']);
		$("#booking_mobileno").focus();
		return false;		
	}
    
	else
	{
		$("#booking_submit").attr('disabled',true);
		$("#booktab").show();
		$.post(jssitebaseUrl+useFile,{'rest_id':res_id,'num_guests':num_guests,'booking_date':booking_date,'booking_hours':booking_hours,'booking_name':booking_name,'booking_email':booking_email,'booking_mobileno':booking_mobileno,'booking_phoneno':booking_phoneno,'booking_instruction':booking_instruction,'action':'addBookTable'}, function(data)
		{
		  //alert(data);return false;
			if(data == 'success'){
				$("#bookingerror").addClass('succmsg').text(err_lang_arr['booking_success']);
				$("#num_guests").val('');
				$("#booking_date").val('');
				$("#booking_hours").val('');
				$("#booking_mins").val('');
				$("#booking_time").val('');
				$("#booking_name").val('');
				$("#booking_email").val('');
				$("#booking_mobileno").val('');
				$("#booking_phoneno").val('');
				$("#booking_ext").val('');
				$("#booking_instruction").val('');
				$("#rest_id").val('');
				$("#booking_submit").removeAttr('disabled');
				$("#booktab").hide();
                 setTimeout(function() {
                        window.location.reload();
				     }, 2000);
                return false;
            }else if(data == 'closed'){
				alert("Currently the restaurant is closed, please check the openings timings and then book your table"); 
				$("#booking_submit").show();
                $("#booking_submit").removeAttr('disabled');
				$("#booktab").hide();
                //window.location.reload();
                return false;
			}else if(data == 'time_exceeded'){
				alert("Please Enter Correct Time"); 
				$("#booking_submit").show();
                $("#booking_submit").removeAttr('disabled');
				$("#booktab").hide();
                //window.location.reload();
                return false;
			}else{
				$("#booking_submit").show();
                $("#booking_submit").removeAttr('disabled');
				$("#booktab").hide();
				alert(err_lang_arr['resdetail_val_error_occured']);
                //window.location.reload();
                return false;
			}
			return false;
		});
		
	}
	return false;
}
	
	
//NEWIMPLEMENTATION:
function pizzaSlize_PriceperIndex(pos,menuid,resid){
	//alert(pos);
	var pos_ind			=	pos;
	var pos_ind_new		=	++pos_ind;
	   
	$(".pizza_prize_size_new").load(jssitebaseUrl+"/ajaxAction.php",{'action':'showPizzaPriceSize_new','pos':pos,'menuid':menuid,'resid':resid},function(response){   
		//alert(response);
		$("#pizzasliceoption_"+pos_ind_new).attr('checked', true);
		$("#pizzasliceprice_position").val(pos);
	});
}

//---------------------------------------------------------------------------------------------------------------
function pizzaSize_Price(pizza_size,menuid,resid){
	
	$(".pizza_prize_size_new").load(jssitebaseUrl+"/ajaxAction.php?action=showPizzaPriceSize_new&pizza_size="+pizza_size+"&menuid="+menuid+"&resid="+resid,function(response){   
		$("#"+pizza_size).attr('checked', true);
	});	
}
//---------------------------------------------------------------------------------------------------------------
$(document).ready(function(){
	$(document).keydown(function(e){
		if (e.keyCode == 38 || e.keyCode == 40 ) { 
		   $(".menus_detailsLink").css("margin-bottom",0);
		}
	});	
});
//-------------------------------------------------
function searchMenuItems(resid){
    
	var menuvalue = $.trim($("#menuvalue").val());
    
	$("#Indiv_Items").load(jssitebaseUrl+"/ajaxAction.php",{'action':'searchMenuItems','menuvalue':menuvalue, 'resid':resid } );
	return false;
}
//-------------------------------------------------
//Reset radio buttons on subaddons on popup
function uncheckSingleAddon(addonclass){
    $("."+addonclass).attr('checked',false); 
    return false;
    
}
//-------------------------------------------------



// === accordion_script

function accordion_script(){
    var windowWid = $(window).width();
	if(windowWid > 768){
		$(".accordion h1:first").removeClass("active");
	    $(".accordion div.new:not(:first)").show();
	}else {
		$(".categoryContain:first-child .accordion h1").removeClass("active");
		$(".categoryContain:first-child .accordion div.new").show();
		$(".accordion h1").addClass("active");
	    $(".accordion div.new").hide();
	}
    $(".accordion h1").click(function(e){ 
	e.preventDefault(); 
	$(this).next("div.new").slideToggle("fast")
	.siblings("div.new:visible").slideUp("fast");
	$(this).toggleClass("active");
    });
    $(".close").click(function(e){
    e.preventDefault();
       	var id=$(this).attr("id");
		$("."+id).slideUp("fast");
		$("."+id).prev("h3").removeClass("active");
    });  
}

function customAddItemToCart() {
		//make post

		console.log("en custom function");
		console.log(itemList);

		 $.each(itemList, function(itemNo, item) {                         
                    
            console.log(item.pizzasize_slice);
			$(".restaurantMenuAddtocartmm").load(jssitebaseUrl+"/ajaxAction.php",{'action':'addtoItem','menuid':item.menuid,'resid':item.resid,'resname':"tuleke",'Addons':"",'quantity':item.quantity,'pizzasize_slice':item.pizzasize_slice,'menuspl_ins':"llevar a casa",},function(){

					var cartWindHeight = $(window).height();
					var cartHead = $(".filterResult").height()+118;
					var cartTop = $(".cartTop").height();
					var cartBottom = $(".cartBottom").height();
					var cartitemTable = (cartWindHeight)-(cartHead + cartTop + cartBottom);
					
					if($.cookie('deliverypickup') == 'delivery' || $.cookie('deliverypickup') == null){
						$('#deliveryopt').click();
					}else{
						$('#pickupopt').click();
					}
					
					$(".cartloadingimage").show();					
					$("#cartTotal").load(jssitebaseUrl+"/ajaxAction.php",{'action':'cartTotal','resid':item.resid},function(response){
						$(".cartloadingimage").hide();																						   
					}); 

					
            
       		 });
			
                    
                             
		});

		orderItemDecInc(1,'1');
		orderItemDecInc(1,'0');

	
/*
		$(".restaurantMenuAddtocartmm").load(jssitebaseUrl+"/ajaxAction.php",{'action':'addtoItem','menuid':menuid,'offer':offer,'resid':resid,'resname':resname,'menuprice':menuprice,'Addons':Addons,'quantity':quantity,'pizzasize':pizzasize,'pizzasize_slice':pizzasize_slice,'pizzasliceprice_position':pizzasliceprice_position,'menuspl_ins':menuspl_ins,},function(){

        	 var cartWindHeight = $(window).height();
			 var cartHead = $(".filterResult").height()+118;
			 var cartTop = $(".cartTop").height();
			 var cartBottom = $(".cartBottom").height();
			 var cartitemTable = (cartWindHeight)-(cartHead + cartTop + cartBottom);
			
            if($.cookie('deliverypickup') == 'delivery' || $.cookie('deliverypickup') == null){
                $('#deliveryopt').click();
            }else{
                $('#pickupopt').click();
            }
            
			$(".cartloadingimage").show();
            $("#cartTotal").load(jssitebaseUrl+"/ajaxAction.php",{'action':'cartTotal','resid':resid},function(response){
				$(".cartloadingimage").hide();																						   
			}); 
            
        }); */



}