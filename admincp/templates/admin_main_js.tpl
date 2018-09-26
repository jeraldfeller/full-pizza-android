
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/bootstrap-select.js"></script>
<!--Js-->

<script type="text/javascript" src="js/jquery-te-1.4.0.min.js" charset="utf-8"></script>
<script type="text/javascript" src="js/nicescroll.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
{if $req_file_name eq 'categoryManage.php' or $req_file_name eq 'menuManage.php' or $req_file_name eq 'menuDeleteManage.php'}
<script type="text/javascript" src="js/jquery.tablednd.js"></script>
{/if}
<script type="text/javascript" src="js/admin_common.js"></script>
<script type="text/javascript" src="js/admin_restaurant.js"></script>
<script type="text/javascript" src="js/validation.js"></script>





<!--Confirm Message-->
{*<link type="text/css" href="css/confirm.css" rel="stylesheet" media="screen" />
<script type="text/javascript" src="js/jquery.simplemodal.js"></script>
<script type="text/javascript" src="js/confirm.js"></script>*}

{if $req_file_name eq 'restaurantAddEdit.php' or $req_file_name eq 'adminAjaxAction.php'}
<!--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&extension=.js"></script>-->
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGsX2crAYxL0RPi1CMc-SWj2VaDmTjxtU&libraries=drawing"
         async defer></script>-->
<script type="text/javascript" src="{$SITE_JS_URL}/restaurant_gmap_deliveryarea.js"></script>
{/if}

{if $req_file_name eq 'restaurantManage.php' }
<script src="http://connect.facebook.net/en_US/all.js"></script>
{literal}
<script>
   /* window.fbAsyncInit = function() {
	  	FB.init({appId: site_fb_menu_appsid, status: true, cookie: true});
 		  FB.Canvas.setAutoGrow();
	  }
	  function addToPage(resid) {
      FB.ui({
            method: 'pagetab',
            redirect_uri: 'http://comeneat.com/platinum/admincp/facebookApps.php?resid='+resid,
          }, function(response){});
	  }*/
</script>
{/literal}
{/if}
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

<!--Date Picker Files--> 
{if $req_file_name eq 'restaurantOfferAddEdit.php' or $req_file_name eq 'voucherAddEdit.php' or $req_file_name eq 'restaurantReportManage.php' or $req_file_name eq 'restaurantInvoiceManage.php'}
<script type="text/javascript" src="js/datepicker.js"></script>
{literal}
<script type="text/javascript">
	$(document).ready(function() 
  {
        var date = new Date();
        date.setDate(date.getDate());
        $('#offer_valid_from').datepicker({
             startDate: date,
             endDate: '+45d',
            autoclose:true,
        	//direction: 1
            format: 'dd-mm-yyyy',
			//direction:true,
            
			//pair: $('#offer_valid_from')
   		});
   		 
   		$('#offer_valid_to').datepicker({
   		     startDate: date,
             endDate: '+45d',
   		    format: 'dd-mm-yyyy',
   		//	direction:true,
			//pair: $('#offer_valid_to')
        	//direction: 1                
   		});
      $('#valid_from').datepicker({
         startDate: date,
         endDate: '+45d',
        autoclose:true,
          //direction: 1
          format: 'dd-mm-yyyy',
      //direction:true,
            
      //pair: $('#valid_from')
      });
       
      $('#valid_to').datepicker({
        startDate: date,
             endDate: '+45d',
        autoclose:true,
           format: 'dd-mm-yyyy',
      //  direction:true,
      //pair: $('#valid_to')
          //direction: 1                
      });
       $('#report_from').datepicker({
        autoclose:true,
        format: 'dd-mm-yyyy',
      //direction: [false, '2012-01-01'],
      //pair: $('#report_from')
      });
       
      $('#report_to').datepicker({
        autoclose:true,
        format: 'dd-mm-yyyy',
        //direction: [false, '2012-01-01'],
      //pair: $('#report_to')        
      });
        $('#invoice_from').datepicker({
      //direction: [false, '2012-01-01'],
      //pair: $('#invoice_from')
      });
       
      $('#invoice_to').datepicker({
        //direction: [false, '2012-01-01'],
    //  pair: $('#invoice_to')        
      });
      
      //Yearly
      $('#invoice_yearly').datepicker({
        //view: 'years',
        //format: 'Y'   //  note that becase there's no day in the format
                      //  users will not be able to select a day!
    });
      //Monthly
      $('#invoice_monthly').datepicker({
      //  view: 'years',
        //format: 'Y-m'   //  note that becase there's no day in the format
                      //  users will not be able to select a day!
    });
    //Monthly Twice
      $('#invoice_monthly_twice').datepicker({
      //  view: 'years',
        //format: 'Y-m'   //  note that becase there's no day in the format
                      //  users will not be able to select a day!
    });
    //Monthly Twice
      $('#invoice_monthly_4times').datepicker({
        //view: 'years',
        //format: 'Y-m'   //  note that becase there's no day in the format
                      //  users will not be able to select a day!
    });
   	});
</script>
{/literal}
{/if}


{literal}
<script>
  $('.jqte-test').jqte();
  
  // settings of status
  var jqteStatus = true;
  $(".status").click(function()
  {
    jqteStatus = jqteStatus ? false : true;
    $('.jqte-test').jqte({"status" : jqteStatus})
  });
</script>
{/literal}