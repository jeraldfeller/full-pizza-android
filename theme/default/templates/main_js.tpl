
{if $req_file_name eq 'checkout.php'}
<script type="text/javascript" src="{$SITE_JS_URL}/checkout.js"></script>
{/if}
{******************** Restaurant Myaccount *********************}
{if $req_file_name eq 'restaurantOwnerMyaccount_category.php' or $req_file_name eq 'restaurantOwnerMyaccount_menu.php'}
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.tablednd.js"></script>



{literal}

<script type="text/javascript">
$(document).ready(function(){
	//Category Sort Order
	
	//var filenameurl = $("#filenameurl").val();
    
	//if(filenameurl == 'restaurantOwnerMyaccount_category.php'){
		$("#table_catgory_own").tableDnD({
		    onDragClass: "myDragClass",
		    onDrop: function(table, row) {
		      //alert('Mani'); return false;
	            var rows = table.tBodies[0].rows;
				var data = '';
	            var debugStr = "Row dropped was "+row.id+". New order: ";
	            for (var i=1; i<rows.length; i++) {
	                debugStr += rows[i].id+"^";
					data += rows[i].id+"^";
                    $("#sort_order_"+rows[i].id).html(i-0);
	            }
                
				$.post("ajaxFile.php", {'data':data, action:'updateCategoryOrder'}, function(theResponse){
					//alert("ccc-->"+theResponse); return false;
                      var filename = $(location).attr('href');
                //alert(filename); return false;
                    $('body').load(filename);
				}); 
                return false;
		    }
		});
        
        	$("#table_menu_own").tableDnD({
		    onDragClass: "myDragClass",
		    onDrop: function(table, row) {
		      //alert('Mani'); return false;
	            var rows = table.tBodies[0].rows;
				var data = '';
	            var debugStr = "Row dropped was "+row.id+". New order: ";
	            for (var i=1; i<rows.length; i++) {
	                debugStr += rows[i].id+"^";
					data += rows[i].id+"^";
                    $("#sort_order_"+rows[i].id).html(i-1);
	            }
                
				$.post("ajaxFile.php", {'data':data, action:'updateMenuOrder'}, function(theResponse){
					//alert("ccc-->"+theResponse); return false;
				}); 
                return false;
		    }
		});
        //return false;
	//}
});
</script>
{/literal}

{/if}

<!--Facebook Connection-->
<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>

{if $smarty.session.lan}<script type="text/javascript" src="{$LANGUAGE_URL}/{$smarty.session.lan|upper}/error_lang.js"></script>{/if}
<script type="text/javascript" src="{$SITE_JS_URL}/common.js"></script>

{if $req_file_name eq 'index.php' or $req_file_name eq 'searchResult.php'} 
   <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
    <script src='http://maps.googleapis.com/maps/api/js?v=3&sensor=false&amp;libraries=places'></script>
    <script type="text/javascript" src="{$SITE_JS_URL}/jquery-ui-1.8.2.custom.min.js"></script>        
    <script type="text/javascript" src="{$SITE_JS_URL}/auto_suggest.js"></script>    
    <script type="text/javascript" src="{$SITE_JS_URL}/onlyaddress.js"></script>    
 {/if}
{******************** Auto Suggestion *********************}
{if  $req_file_name eq 'restaurant_innerpage.php' or $req_file_name eq 'restaurantOwnerRegister.php' or $req_file_name eq 'customerRegister.php' or $req_file_name eq 'customerMyaccount.php'}
<!--<script type="text/javascript" src="{$SITE_JS_URL}/jquery.autocomplete.js"></script>-->
<!--<script type="text/javascript" src="{$SITE_JS_URL}/jquery-1.4.2.min.js"></script>-->
<script type="text/javascript" src="{$SITE_JS_URL}/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/auto_suggest.js"></script>
{/if}
{******************** Restaurant Search *********************}
{if $req_file_name eq 'searchResult.php'}
<script type="text/javascript" src="{$SITE_JS_URL}/searchResult.js"></script>
{/if}

{******************** Address *********************}
{if $req_file_name eq 'address.php'}
<script type="text/javascript" src="{$SITE_JS_URL}/address.js"></script>
{/if}


{******************** Restaurant Details *********************}
{if $req_file_name eq 'restaurantDetails.php'}
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/resturantDetail.js"></script>
<!-- <script type="text/javascript" src="{$SITE_JS_URL}/nicescroll.js"></script>
{literal}
	<script type="text/javascript">
	$(document).ready(function(){
		$(".cartitem-list").niceScroll({  autohidemode: 'false',cursorcolor:"#333333",cursorwidth:"5px", boxzoom:true,});
	});
	</script>
{/literal} -->

<!--Slideshow-->
<!--[if IE]><script type="text/javascript" src="{$SITE_JS_URL}/jquery-1.5.1.min.js"></script><![endif]-->
{*<script type="text/javascript" src="{$SITE_JS_URL}/jquery-1.7.2.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.cycle.js"></script>

{literal}
<script type="text/javascript">
    $(document).ready(function() {
            if ($('#cycleimages').length > 0) {
                $('#cycleimages').cycle({ 
                    fx: 'fade',
                    speed: 750,
                    timeout: 4000, 
                    randomizeEffects: false, 
                    easing: 'easeOutCubic',
                    next:   '.cyclenext', 
                    prev:   '.cycleprev',
                    pager:  '#cyclewrapnav',
                    cleartypeNoBg: true
                });
            }
        });
    </script>
{/literal}
*}


{/if}


<!--Date Picker Files-->
{if $req_file_name eq 'contactUs.php' or $req_file_name eq 'restaurantDetails.php' or $req_file_name eq 'checkout.php' or $req_file_name eq 'restaurantOwnerMyaccount_offers_AddEdit.php' or $req_file_name eq 'restaurantOwnerMyaccount_report.php' or $req_file_name eq 'ajaxActionRestaurant.php' or $req_file_name eq 'customerMyaccount.php' }

<script type="text/javascript" src="{$SITE_JS_URL}/datepicker.js"></script>
{literal}
<script type="text/javascript">
	$(document).ready(function() 
	{
        var date = new Date();
        date.setDate(date.getDate());
	       	
        
        
        
     	$('.offer_valid_from').datepicker({ 
            startDate: date, 
            autoclose: true,
            //endDate: '+10d',
            	
            
     });
   		
		$('.offer_valid_to').datepicker({
            startDate: date,
            autoclose: true,
        	//endDate: '+10d',
           
                           
   		});
		//Book a Table

		
        //Booking table
        
        $('#booking_date').datepicker({
		  format:'dd-mm-yyyy',
            startDate: date, 
            //endDate: '+15d',
            autoclose: true}).on('change', function() {
			var date1   = ($(this).val());
            var restid = $("#rest_id").val();
            $("#Newopentimeclosetimebook").load(jssitebaseUrl+'/ajaxAction.php',{'date':date1,'resid':restid,'action':'Datepickerdatebook'},function(response){
               
                    var response = response.split("|@@|");
                    //alert($.trim(response[1]));
                    //alert($.trim(response[0]));				
                    if ($.trim(response[1]) == 'Closed') { 
                       // alert('hello');
                        $("#Newopentimeclosetimebook").html(response[0]);
                        $("input#booking_submit").attr('disabled',true);
                        //$("#foodassoonpos").hide();
                        return false;
                    } else if ($.trim(response[1]) == 'Open') {
                        //alert('hi');
                        $("#Newopentimeclosetimebook").html(response[0]);
                        $("input#booking_submit").removeAttr('disabled');
                        //$("#foodassoonpos").show();
                        return false;
                    }
                
                
            } );
		});

		$('.booking_date').datepicker({
        	//direction: 1
			//direction:true,
			//pair: $('.booking_date')
            startDate: date 	
   		});

   		//checkout page
		
		$('#datedelivery').datepicker({
		    format:'yyyy-mm-dd',
            autoclose: true,
            startDate: date, 
            endDate: '+15d',
            }).on('change', function() {
			var date1   = ($(this).val());
            var restid = $("#restid").val();
            var deliverypickup = $("#deliverypickup").val();
            $("#Newopentimeclosetime").load(jssitebaseUrl+'/ajaxAction.php',{'date':date1,'resid':restid,'deliverypickup':deliverypickup,'action':'Datepickerdate'}, function(response){
                
                //alert(response);
                var response = response.split("|@@|");
                //alert($.trim(response[1]));
                if ($.trim(response[1]) == 'Closed') { 
                       // alert('hello');
                        $("#Newopentimeclosetime").html(response[0]);
                        $("#checkoutSubmit").prop("disabled",true);
                        $("#foodassoonpos").hide();
                        return false;
                    } else if ($.trim(response[1]) == 'Open') {
                        //alert('hi');
                        $("#Newopentimeclosetime").html(response[0]);
                        $("#checkoutSubmit").prop("disabled",false);
                        $("#foodassoonpos").show();
                        return false;
                    }
                
            });
		});
		
   		
		//$(".datedelivery").click(function(){
			/*$(".datedelivery_check").datepicker({
			onSelect: function(dateText) {	
				var restid = $("#restid").val();
            alert("jfjh");    
			//alert(dateText);
            //alert(restid);
				//alert($('.datedelivery_check').data('datepicker').date);
				$("#Newopentimeclosetime").load(jssitebaseUrl+'/ajaxAction.php',{'date':date,'restid':restid, 'action':'Datepickerdate'});
			},*/
			//direction:true
			
			
		//});
		//Rest Owner Myaccount Reports
		$('#report_from').datepicker({
			direction: [false, '2025-01-01'],
            autoclose:true,
			//pair: $('#report_from') 	
   		});
   		 
        $('#contact_orderdate').datepicker ({ 
            startDate: date,
            //endDate: '+10d',
            autoclose: true	
            
     }); 
         
         
   		$('#report_to').datepicker({
        	direction: [false, '2025-01-01'],
             autoclose: true,	
			//pair: $('#report_to')                
   		});
        
});
</script>
{/literal}
{literal}
    <script type="text/javascript">
    	/*$(document).ready(function() 
    	{
       		$('#order_from').Zebra_DatePicker({
    			direction: [false, '2025-01-01'],
    			pair: $('#report_from') 	
       		});
       		 
       		$('#order_to').Zebra_DatePicker({
            	direction: [false, '2025-01-01'],
    			//pair: $('#report_to')                
       		});
       		
       	});*/
    </script>
    {/literal}


{/if}



{if $req_file_name eq 'index.php' or $req_file_name eq 'restaurant_innerpage.php'}
		<script type="text/javascript" src="{$SITE_JS_URL}/jquery.bxslider.js"></script>
		{literal}
		<script type="text/javascript">
		$(document).ready(function(){
			$('.slider14').bxSlider({
				slideWidth: 400,
				minSlides: 2,
				maxSlides: 2,
				moveSlides: 1,
				slideMargin: 20,
				pager:false
			});
			$('.index_slider').bxSlider({
				slideWidth: 1600,
				minSlides: 1,
				maxSlides: 1,
				moveSlides: 1,
				
			});
		});
		</script>
		{/literal}
{/if}

{if $req_file_name eq 'index.php' or $req_file_name eq 'index_letseat.php'}

<script type="text/javascript" src="{$SITE_JS_URL}/owl.carousel.js"></script>
{literal}
  <script type="text/javascript">
    $(document).ready(function() {     
	    $("#owl-demo").owlCarousel({	     
	       loop:true,
		   autoplay:true,
		   items:2,
		   nav:true,
		   responsive:{
		        0:{
		            items:1
		        },
		        600:{
		            items:2
		        },
		        900:{
		            items:3
		        },
		        1100:{
		            items:4
		        },
   			}    
    	});
    });	
	</script>
{/literal} 
{/if}


{******************** Customer *********************}
{*{if $req_file_name eq 'customerLogin.php' or $req_file_name eq 'index.php'}
<!--Facebook Connection-->
<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>
<!--Twitter Connection-->
<!--<script src="http://platform.twitter.com/anywhere.js?id=1bWYADXVS0snl4iu3BNw&v=1" type="text/javascript"></script>-->
{/if}*}

{if  $req_file_name eq 'index.php' or $req_file_name eq 'customerRegister.php' or $req_file_name eq 'customerLogin.php' or $req_file_name eq 'customerMyaccount.php'  or $req_file_name eq 'customerResetPassword.php'}
<script type="text/javascript" src="{$SITE_JS_URL}/customer.js"></script>
{/if}
{******************** Restaurant Owner *********************}
{if $req_file_name eq 'restaurantOwnerRegister.php' or $req_file_name eq 'restaurantOwnerLogin.php' or $req_file_name eq 'restaurantResetPassword.php'}
<script type="text/javascript" src="{$SITE_JS_URL}/restaurantOwner.js"></script>
{* Footer fixed *}
{literal}
<script type="text/javascript">
	$(document).ready(function(){
		var winHg = $(window).height();
		var docHg = $(document).height();
		if(winHg >= docHg){
			$(".termsCont").css({"position":"fixed","bottom":0});
		}
	});
	$(window).resize(function(){
		var winHg = $(window).height();
		var docHg = $(document).height();
		if(winHg >= docHg){
			$(".termsCont").css({"position":"fixed","bottom":0});
		}
		else{
			$(".termsCont").css("position","static");
		}
	});
</script>	
{/literal}
{/if}

{literal}
<script type="text/javascript">

</script>{/literal}
{literal}
<script type="text/javascript">
	$(document).ready(function(){
		var winHg = $(window).height();
		var docHg = $(document).height();
		if(winHg >= docHg){
			$("#myacctFooter").css({"position":"fixed","bottom":0});
		}
	});
	$(window).resize(function(){
		var winHg = $(window).height();
		var docHg = $(document).height();
		if(winHg >= docHg){
			$("#myacctFooter").css({"position":"fixed","bottom":0});
		}
		else{
			$("#myacctFooter").css("position","static");
		}
	});
</script>	
{/literal}

{if $req_file_name eq 'restaurantOwnerMyaccount.php' or $req_file_name eq 'restaurantOwnerMyaccount_order.php' or $req_file_name eq 'restaurantOwnerMyaccount_report.php' or $req_file_name eq 'restaurantOwnerMyaccount_category.php' or $req_file_name eq 'restaurantOwnerMyaccount_payment.php' or $req_file_name eq 'restaurantOwnerMyaccount_setting.php' or $req_file_name eq 'restaurantOwnerMyaccount_reviews.php' or $req_file_name eq 'restaurantOwnerMyaccount_invoice.php' or $req_file_name eq 'restaurantOwnerMyaccount_offers.php' or $req_file_name eq 'restaurantOwnerMyaccount_offers_AddEdit.php' or $req_file_name eq 'restaurantOwnerMyaccount_category.php' or $req_file_name eq 'restaurantOwnerMyaccount_categoryAddEdit.php' or $req_file_name eq 'restaurantOwnerMyaccount_menu.php' or $req_file_name eq 'restaurantOwnerMyaccount_menuAddEdit.php' or $req_file_name eq 'restaurantOwnerMyaccount_addons.php' or $req_file_name eq 'restaurantOwnerMyaccount_addonsAddEdit.php' or  $req_file_name eq 'restaurantOwnerMyaccount_bookings.php'}

<script type="text/javascript" src="{$SITE_JS_URL}/restaurantOwner.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/restaurantOwnerMyaccount.js"></script>

{/if}
{if $req_file_name eq 'restaurantOwnerMyaccount_setting.php' }
<script type="text/javascript" src="{$SITE_JS_URL}/jquery-1.7.2.js"></script>
{/if}
{******************** Google Map *********************}
{if $req_file_name eq 'searchResult.php'}
<script type="text/javascript" src="{$SITE_JS_URL}/infobox.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/searchResultGMap.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/restaurant_gmap_deliveryarea.js"></script>
{/if}
{if $req_file_name eq 'restaurantOwnerMyaccount.php' or $req_file_name eq 'restaurantDetails.php' or $req_file_name eq 'restaurantOwnerMyaccount_setting.php' }
<!--Google Map-->

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/infobox.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/searchResultGMap.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/restaurant_gmap_deliveryarea.js"></script>
{/if}
{******************** Checkout *********************}
{if $req_file_name eq 'checkout.php'}
<!--<script type="text/javascript" src="{$SITE_JS_URL}/checkout.js"></script>-->
<!--<script type="text/javascript" src="{$SITE_JS_URL}/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/jquery-ui-1.8.2.custom.min.js"></script>-->
{literal}

{/literal}

{/if}


{******************** Order Payment *********************}
{if $req_file_name eq 'orderPayment.php' and $smarty.post.paymentinfo eq 'creditcard'}
{literal}<script type='text/javascript'>window.onload=document.pf.submit();</script>{/literal}
{/if}
{if $req_file_name eq 'restaurantDetails.php' }
<script type="text/javascript" src="{$SITE_JS_URL}/scrollnew.js"></script>
{/if}


{literal}
<script type="text/javascript">
	/*$(document).ready(function(){
		$('[data-toggle="modal"]').live('click',function(){
			var toppop = $(window).scrollTop() + 30;
			$(".modal").css("top",toppop);	
		});
	});*/
 </script>
{/literal}

{literal}
<script type="text/javascript">
	$(document).ready(function(){
		$(".mobilesigndown").click(function(){
			$(".headerTopRight").slideToggle();
		});
		/*$(window).resize(function(){*/
			var winheight = $(window).width();
			if(winheight<510){
				$(".footerList").click(function(){
					$(this).next(".footerListDiv").slideToggle();
				});
				$(".mobilemenu").click(function(){
					$(".detailsMainMenuUlMobile").slideToggle();
				});
				$(".detailsMainMenuUlMobile li a").click(function(){
					var a = $(this).html();
					$(".detailsMainMenuMobile").text(a);
				});
				$(".detailsMainMenuUlMobile li a").click(function() { 
					$(".detailsMainMenuUlMobile li a").removeClass("active");
					$(".detailsTabContent").hide();
					$(this).addClass("active"); 
					var activeTab = $(this).attr("id");
					$('#'+activeTab+'_content').show();
					//Google Map
					if(activeTab == 'details_map'){
						
						var reslattitude 	= $('#reslattitude').val();
						var reslongtitude 	= $('#reslongtitude').val();
						var resid 			= $('#resid').val();
						resDetailsGmap(reslattitude,reslongtitude,resid);
					}
				});
			}
		/*});*/
		var windowsizeMenu = $(window).width();
		if ((windowsizeMenu > 200 && windowsizeMenu < 750)) {
			var menutop = $(".header").height() + $(".searchAreaBgOuter ").height() + $(".detSrchInner").height() + $(".detailsMainMenu").height() + 50;   
			$(window).scroll(function(){
				var scrolltopval = $(window).scrollTop();
				if(scrolltopval > menutop){
					$(".menufixedMobile").addClass("fixed");
					$(".menufixedMobile").show();
				}
				if(scrolltopval < menutop){
					$(".menufixedMobile").removeClass("fixed");
					$(".menufixedMobile").hide();
				}
			});			
		}
	});
 </script>
{/literal}

{if $req_file_name eq 'restaurantDetails.php'}
<script type="text/javascript" src="{$SITE_JS_URL}/ion.tabs.js"></script>

{literal}

	<script type="text/javascript">

		/*$('#tabs').tabs();

		$('#tabs ul li a').click(function () {location.hash = $(this).attr('href');});	*/		
		$.ionTabs("#tabs_1", {
			
			type: "storage",                    // hash, storage or none
			onChange: function(obj){            // callback
				//console.log(obj);
			}
			
		});
	</script>

{/literal}
{/if}
{if $req_file_name eq 'restaurantOwnerMyaccount_setting.php' or $req_file_name eq 'restaurantOwnerMyaccount.php'}
<script type="text/javascript" src="{$SITE_JS_URL}/ion.tabs.js"></script>

{literal}

	<script type="text/javascript">
		var reslattitude 	= $('#reslattitude').val();
		var reslongtitude 	= $('#reslongtitude').val();
		resMyaccGmap(reslattitude,reslongtitude);
		$(document).ready(function(){
			$("#Button__setting__details_map").click(function(){
				var reslattitude 	= $('#reslattitude').val();
				var reslongtitude 	= $('#reslongtitude').val();
				resMyaccGmap(reslattitude,reslongtitude);
			});
		});
		
		$.ionTabs("#tabs_2", {
			
			type: "hash",                    // hash, storage or none
			onChange: function(obj){            // callback
				//console.log(obj);
			}
			
		});
	</script>

{/literal}
{/if}

<script type="text/javascript" src="{$SITE_JS_URL}/jquery.cookkie.js"></script>
{*
{if $req_file_name eq 'restaurantOwnerMyaccount.php'}
{literal}
<script type="text/javascript">
$(document).ready(function(){ 
						  
		$(".settingMenuInner .settingMenu").click(function() {
		$("#owner_setting").addClass("active");
		$("#owner_dash_content").hide();
		$("#owner_setting_content").show();
		$("#owner_dash").removeClass("active");
		
		$(".settingTab1 a").removeClass("active");		
		var iconactiveTab = $(this).attr("id");
		$(".settingTabsContent").hide();
		$("#"+iconactiveTab+"_tab").addClass("active");
		$("#"+iconactiveTab+"_tab_content").show();
		
		var activeURL = jssitebaseUrl+"/restaurantOwnerMyaccount.php#owner_setting"; //alert(activeURL);
		window.location.href = activeURL;
		//location.reload();  
		});
	});


</script>
{/literal}
{/if}

*}

{if $req_file_name eq 'searchResult.php'}
{literal}
<script type="text/javascript">
	$(document).ready(function(){
		$("#chage_location").click(function(){
			$(".change_loc_slide").slideToggle();
			$(this).toggleClass("active");
		});
	});
</script>
{/literal}
{/if}
{if $req_file_name eq 'searchResult.php'}
{literal}
<script type="text/javascript">
	$(document).ready(function(){
		$("#map_btn").click(function(){
			 if ($(this).text() == "Back")
			 {			     
			     $(this).text("Map view");
                 $(".map_view").hide(); 
                 $(".searchResultMidInner").show();
              }  
			 else{
                $(this).text("Back");
    			$(".searchResultMidInner").hide();
    			$(".map_view").show(); 
                var ser_qrystring = $(this).attr("data-string");              
                var firstreclat    		= $('#firstreclat').val();
        		var firstreclong    	= $('#firstreclong').val();
                gmapLoad(firstreclat,firstreclong,ser_qrystring);
              }		
		});
	});
</script>
{/literal}
{/if}
{literal}
<script type="text/javascript">
	$(document).ready(function(){
		$(".faqHead").click(function(){
			$(".faqcontent").hide();
			$(".faqHead").removeClass("active");
			$(this).toggleClass("active");
			$(this).next(".faqcontent").slideToggle();
		});
	});
</script>
{/literal}
{literal}
    <script type="text/javascript">
        //Allow only numbers in textbox
        $(".numericfield").keypress(function(e) {	
            var k = e.which;    
            /* numeric inputs can come from the keypad or the numeric row at the top */
            if ( (k < 48 || k > 57) && (k!=8) &&(k!=0) && (k!=46) ) {
                e.preventDefault();
                return false;
            }				   
        });	
    </script>
{/literal}

<!--********************************* For all Checkbox Designs ******************************************* -->
{literal}
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('.checkbox-inline input[type="checkbox"]').hide();
    		$(".checkbox-inline").append("<span></span>");
    	});	
    </script>
{/literal}    

<!--********************************** For all Selectbox Designs ***************************************** -->
{*literal}
    <script type="text/javascript">
    	$(document).ready(function(){    		
    		$(".selectpicker").selectpicker();
    	});	
    </script>
{/literal*} 