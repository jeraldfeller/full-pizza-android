<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-18 19:49:55
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/admin_main_js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4467696075806c333382659-11938481%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aebc5ddec642f1b0a7befbf7c9173df217b1bda0' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/admin_main_js.tpl',
      1 => 1475619674,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4467696075806c333382659-11938481',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'req_file_name' => 0,
    'SITE_JS_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5806c3333b3d52_64028921',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5806c3333b3d52_64028921')) {function content_5806c3333b3d52_64028921($_smarty_tpl) {?>
  <?php echo '<script'; ?>
 type="text/javascript" src="js/bootstrap.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript" src="js/bootstrap-select.js"><?php echo '</script'; ?>
>
<!--Js-->

<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-te-1.4.0.min.js" charset="utf-8"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/nicescroll.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"><?php echo '</script'; ?>
>
<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='categoryManage.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='menuManage.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='menuDeleteManage.php') {?>
<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.tablednd.js"><?php echo '</script'; ?>
>
<?php }?>
<?php echo '<script'; ?>
 type="text/javascript" src="js/admin_common.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/admin_restaurant.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/validation.js"><?php echo '</script'; ?>
>





<!--Confirm Message-->


<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantAddEdit.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='adminAjaxAction.php') {?>
<!--<?php echo '<script'; ?>
 type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&extension=.js"><?php echo '</script'; ?>
>-->
<!--<?php echo '<script'; ?>
 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGsX2crAYxL0RPi1CMc-SWj2VaDmTjxtU&libraries=drawing"
         async defer><?php echo '</script'; ?>
>-->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SITE_JS_URL']->value;?>
/restaurant_gmap_deliveryarea.js"><?php echo '</script'; ?>
>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantManage.php') {?>
<?php echo '<script'; ?>
 src="http://connect.facebook.net/en_US/all.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
>

<?php }?>

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


<!--Date Picker Files--> 
<?php if ($_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantOfferAddEdit.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='voucherAddEdit.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantReportManage.php'||$_smarty_tpl->tpl_vars['req_file_name']->value=='restaurantInvoiceManage.php') {?>
<?php echo '<script'; ?>
 type="text/javascript" src="js/datepicker.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
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
<?php echo '</script'; ?>
>

<?php }?>



<?php echo '<script'; ?>
>
  $('.jqte-test').jqte();
  
  // settings of status
  var jqteStatus = true;
  $(".status").click(function()
  {
    jqteStatus = jqteStatus ? false : true;
    $('.jqte-test').jqte({"status" : jqteStatus})
  });
<?php echo '</script'; ?>
>
<?php }} ?>
