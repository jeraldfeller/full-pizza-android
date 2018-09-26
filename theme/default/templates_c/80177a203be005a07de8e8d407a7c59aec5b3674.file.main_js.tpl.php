<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-20 14:33:07
         compiled from "C:\wamp\www\theme\default\templates\main_js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:475357dcadca21fbb4-70154442%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80177a203be005a07de8e8d407a7c59aec5b3674' => 
    array (
      0 => 'C:\\wamp\\www\\theme\\default\\templates\\main_js.tpl',
      1 => 1500567529,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '475357dcadca21fbb4-70154442',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57dcadca5c6699_97813194',
  'variables' => 
  array (
    'req_file_name' => 0,
    'SITE_JS_URL' => 0,
    'LANGUAGE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57dcadca5c6699_97813194')) {function content_57dcadca5c6699_97813194($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='checkout.php') {?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/checkout.js"><?php echo '</script'; ?>
>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_category.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_menu.php') {?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/jquery.tablednd.js"><?php echo '</script'; ?>
>





<?php echo '<script'; ?>
 type="text/javascript">
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
<?php echo '</script'; ?>
>


<?php }?>

<!--Facebook Connection-->
<?php echo '<script'; ?>
 type="text/javascript" src="http://connect.facebook.net/en_US/all.js"><?php echo '</script'; ?>
>

<?php if ($_SESSION['lan']) {?><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE_URL']->value;?>
/<?php echo mb_strtoupper($_SESSION['lan'], 'UTF-8');?>
/error_lang.js"><?php echo '</script'; ?>
><?php }?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/common.js"><?php echo '</script'; ?>
>

<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='index.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='searchResult.php') {?> 
   <?php echo '<script'; ?>
 src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src='http://maps.googleapis.com/maps/api/js?v=3&sensor=false&amp;libraries=places'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/jquery-ui-1.8.2.custom.min.js"><?php echo '</script'; ?>
>        
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/auto_suggest.js"><?php echo '</script'; ?>
>    
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/onlyaddress.js"><?php echo '</script'; ?>
>    
 <?php }?>

<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurant_innerpage.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerRegister.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='customerRegister.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='customerMyaccount.php') {?>
<!--<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/jquery.autocomplete.js"><?php echo '</script'; ?>
>-->
<!--<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/jquery-1.4.2.min.js"><?php echo '</script'; ?>
>-->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/jquery-ui-1.8.2.custom.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/auto_suggest.js"><?php echo '</script'; ?>
>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='searchResult.php') {?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/searchResult.js"><?php echo '</script'; ?>
>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='address.php') {?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/address.js"><?php echo '</script'; ?>
>
<?php }?>



<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantDetails.php') {?>
<?php echo '<script'; ?>
 src="//code.jquery.com/ui/1.11.2/jquery-ui.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/resturantDetail.js"><?php echo '</script'; ?>
>
<!-- <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/nicescroll.js"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function(){
		$(".cartitem-list").niceScroll({  autohidemode: 'false',cursorcolor:"#333333",cursorwidth:"5px", boxzoom:true,});
	});
	<?php echo '</script'; ?>
>
 -->

<!--Slideshow-->
<!--[if IE]><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/jquery-1.5.1.min.js"><?php echo '</script'; ?>
><![endif]-->



<?php }?>


<!--Date Picker Files-->
<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='contactUs.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantDetails.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='checkout.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_offers_AddEdit.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_report.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='ajaxActionRestaurant.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='customerMyaccount.php') {?>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/datepicker.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
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
<?php echo '</script'; ?>
>


    <?php echo '<script'; ?>
 type="text/javascript">
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
    <?php echo '</script'; ?>
>
    


<?php }?>



<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='index.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurant_innerpage.php') {?>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/jquery.bxslider.js"><?php echo '</script'; ?>
>
		
		<?php echo '<script'; ?>
 type="text/javascript">
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
		<?php echo '</script'; ?>
>
		
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='index.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='index_letseat.php') {?>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/owl.carousel.js"><?php echo '</script'; ?>
>

  <?php echo '<script'; ?>
 type="text/javascript">
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
	<?php echo '</script'; ?>
>
 
<?php }?>





<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='index.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='customerRegister.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='customerLogin.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='customerMyaccount.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='customerResetPassword.php') {?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/customer.js"><?php echo '</script'; ?>
>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerRegister.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerLogin.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantResetPassword.php') {?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/restaurantOwner.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript">
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
<?php echo '</script'; ?>
>	

<?php }?>


<?php echo '<script'; ?>
 type="text/javascript">

<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
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
<?php echo '</script'; ?>
>	


<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_order.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_report.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_category.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_payment.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_setting.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_reviews.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_invoice.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_offers.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_offers_AddEdit.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_category.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_categoryAddEdit.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_menu.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_menuAddEdit.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_addons.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_addonsAddEdit.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_bookings.php') {?>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/restaurantOwner.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/restaurantOwnerMyaccount.js"><?php echo '</script'; ?>
>

<?php }?>
<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_setting.php') {?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/jquery-1.7.2.js"><?php echo '</script'; ?>
>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='searchResult.php') {?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/infobox.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/searchResultGMap.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/restaurant_gmap_deliveryarea.js"><?php echo '</script'; ?>
>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantDetails.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_setting.php') {?>
<!--Google Map-->

<?php echo '<script'; ?>
 type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/infobox.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/searchResultGMap.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/restaurant_gmap_deliveryarea.js"><?php echo '</script'; ?>
>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='checkout.php') {?>
<!--<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/checkout.js"><?php echo '</script'; ?>
>-->
<!--<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/jquery-1.4.2.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/jquery-ui-1.8.2.custom.min.js"><?php echo '</script'; ?>
>-->




<?php }?>



<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='orderPayment.php'&&$_POST['paymentinfo']=='creditcard') {?>
<?php echo '<script'; ?>
 type='text/javascript'>window.onload=document.pf.submit();<?php echo '</script'; ?>
>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantDetails.php') {?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/scrollnew.js"><?php echo '</script'; ?>
>
<?php }?>



<?php echo '<script'; ?>
 type="text/javascript">
	/*$(document).ready(function(){
		$('[data-toggle="modal"]').live('click',function(){
			var toppop = $(window).scrollTop() + 30;
			$(".modal").css("top",toppop);	
		});
	});*/
 <?php echo '</script'; ?>
>



<?php echo '<script'; ?>
 type="text/javascript">
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
 <?php echo '</script'; ?>
>


<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantDetails.php') {?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/ion.tabs.js"><?php echo '</script'; ?>
>



	<?php echo '<script'; ?>
 type="text/javascript">

		/*$('#tabs').tabs();

		$('#tabs ul li a').click(function () {location.hash = $(this).attr('href');});	*/		
		$.ionTabs("#tabs_1", {
			
			type: "storage",                    // hash, storage or none
			onChange: function(obj){            // callback
				//console.log(obj);
			}
			
		});
	<?php echo '</script'; ?>
>


<?php }?>
<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount_setting.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOwnerMyaccount.php') {?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/ion.tabs.js"><?php echo '</script'; ?>
>



	<?php echo '<script'; ?>
 type="text/javascript">
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
	<?php echo '</script'; ?>
>


<?php }?>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/jquery.cookkie.js"><?php echo '</script'; ?>
>


<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='searchResult.php') {?>

<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function(){
		$("#chage_location").click(function(){
			$(".change_loc_slide").slideToggle();
			$(this).toggleClass("active");
		});
	});
<?php echo '</script'; ?>
>

<?php }?>
<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='searchResult.php') {?>

<?php echo '<script'; ?>
 type="text/javascript">
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
<?php echo '</script'; ?>
>

<?php }?>

<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function(){
		$(".faqHead").click(function(){
			$(".faqcontent").hide();
			$(".faqHead").removeClass("active");
			$(this).toggleClass("active");
			$(this).next(".faqcontent").slideToggle();
		});
	});
<?php echo '</script'; ?>
>


    <?php echo '<script'; ?>
 type="text/javascript">
        //Allow only numbers in textbox
        $(".numericfield").keypress(function(e) {	
            var k = e.which;    
            /* numeric inputs can come from the keypad or the numeric row at the top */
            if ( (k < 48 || k > 57) && (k!=8) &&(k!=0) && (k!=46) ) {
                e.preventDefault();
                return false;
            }				   
        });	
    <?php echo '</script'; ?>
>


<!--********************************* For all Checkbox Designs ******************************************* -->

    <?php echo '<script'; ?>
 type="text/javascript">
    	$(document).ready(function(){
    		$('.checkbox-inline input[type="checkbox"]').hide();
    		$(".checkbox-inline").append("<span></span>");
    	});	
    <?php echo '</script'; ?>
>
    

<!--********************************** For all Selectbox Designs ***************************************** -->
 <?php }} ?>
