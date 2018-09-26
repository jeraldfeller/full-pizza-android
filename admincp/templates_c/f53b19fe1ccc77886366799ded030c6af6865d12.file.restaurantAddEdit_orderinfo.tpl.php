<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-19 11:42:21
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantAddEdit_orderinfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3206922085807a26d7108a2-50199908%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f53b19fe1ccc77886366799ded030c6af6865d12' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/admincp/templates/restaurantAddEdit_orderinfo.tpl',
      1 => 1466424111,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3206922085807a26d7108a2-50199908',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'restaurantEditList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5807a26d9607a2_39228193',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5807a26d9607a2_39228193')) {function content_5807a26d9607a2_39228193($_smarty_tpl) {?>
	
	
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Email Order </span>
		<div class="col-sm-4">
    		<div class="radio-inline radio">
                <input class="" type="radio" name="order_email" id="order_email_yes" value="Yes" <?php if ($_GET['eid']!='') {?>  <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['order_email_option']=='Yes') {?> checked="checked" <?php }?> <?php } elseif ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['order_email_option']!='No') {?>checked="checked" <?php }?> onclick="document.getElementById('orderemail').style.display = 'block'" />
                <label for="order_email_yes">Yes</label>
            </div>
            <div class="radio-inline radio">
                <input class="" type="radio" name="order_email" id="order_email_no" value="No" <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['order_email_option']=='No') {?> checked="checked" <?php }?> onclick="document.getElementById('orderemail').style.display = 'none'"/>
                <label for="order_email_no">No</label>
            </div>
        </div>
	</div>
	
	<div class="form-group" id="orderemail" style="display:block">
		<span class="control-label col-sm-4 font-normal">Order Email </span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="receive_email" id="receive_email" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['order_receive_email']);
}?>" />
    		<div class="tooltip"><div class="HelpButton">?</div><span>Enter restaurant Email for receive the order details</span></div>
    		<span id="resEstTimeErr"></span>
        </div>
	</div>
    
	<div class="form-group" id="ordernumber" style="display:block">
		<span class="control-label col-sm-4 font-normal">Order Phone Number </span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="order_number" id="order_number" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['order_phone_number']);
}?>" />
    		<div class="tooltip"><div class="HelpButton">?</div><span>Enter restaurant Order Number  for receive the order details</span></div>
    		<span id="resOrdnumErr"></span>
        </div>
	</div>
	
	<!-- <div class="form-group">
		<span class="control-label col-sm-4 font-normal">Send Fax Option </span>
		<div class="col-sm-4">
	        <div class="radio-inline radio">
			  <input class="radiobotton" type="radio" name="send_fax" id="send_fax_yes" value="Yes" <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['send_fax_option']=='Yes') {?> checked="checked" <?php }?>  onclick="document.getElementById('sendfax').style.display = 'block'" />
	          <label for="send_fax_yes">Yes</label>
	        </div> 
			<div class="radio-inline radio">
		        <input class="radiobotton" type="radio" name="send_fax" id="send_fax_no" value="No" <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['send_fax_option']=='No') {?> checked="checked"<?php } elseif ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['send_fax_option']!='Yes') {?>checked="checked" <?php }?> onclick="document.getElementById('sendfax').style.display = 'none'"/>
		        <label for="send_fax_no">No</label>
	        </div>
	    </div>
	</div> -->
	
	<!-- <div class="form-group" id="sendfax" <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['send_fax_option']!='Yes') {?>style="display:none" <?php } else { ?>style="display:block"<?php }?>>
		<span class="control-label col-sm-4 font-normal">Restaurant Fax </span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="restaurant_fax" id="restaurant_fax" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_fax']);
}?>" />
	        <span id="resEstTimeErr"></span>
        </div>
	</div> -->
	
	
	<!-- <div class="form-group">
		<span class="control-label col-sm-4 font-normal">GPRS Option </span>
		<div class="col-sm-4">
	        <div class="radio-inline radio">
			  <input class="" type="radio" name="gprs" id="gprs_yes" value="Yes" <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['gprs_option']=='Yes') {?> checked="checked" <?php }?> />
	           <label for="gprs_yes">Yes</label>
	        </div>
	        <div class="radio-inline radio">
	            <input class="" type="radio" name="gprs" id="gprs_no" value="No" <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['gprs_option']=='No') {?> checked="checked"<?php } elseif ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['gprs_option']!='Yes') {?>checked="checked" <?php }?>/>
	             <label for="gprs_no">No</label>
	        </div>
	     </div>
	</div> -->
	
	
	
	
	
	<div id="googlecloud" <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['google_cloud_printer_option']!='Yes') {?>style="display:none" <?php } else { ?>style="display:block"<?php }?>>
		<!-- Cloud printer Email -->
		<div class="form-group">
			<span class="control-label col-sm-4 font-normal">Cloud Printer Email </span>
			<div class="col-sm-4">
				<input class="form-control" type="text" name="restaurant_cloud_printer_email" id="restaurant_cloud_printer_email" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_cloud_printer_email']);
}?>" />
				<span id="resPswdErr"></span>
            </div>
		</div>
		
		<!-- Cloud printer password -->
		<div class="form-group">
			<span class="control-label col-sm-4 font-normal">Cloud Printer Password </span>
			<div class="col-sm-4">
				<input class="form-control" type="password" name="restaurant_cloud_printer_password" id="restaurant_cloud_printer_password" value="<?php if ($_GET['eid']!='') {
echo stripslashes($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['restaurant_cloud_printer_password']);
}?>" autocomplete="off"/>
				<span id="resPswdErr"></span>
            </div>
		</div>
	</div>
	
	
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">SMS Option </span>
		<div class="col-sm-4">
	        <div class="radio-inline radio">	
				<input class="" type="radio" name="sms" id="sms_yes" value="Yes" <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['sms_option']=='Yes') {?> checked="checked" <?php }?> />
	       		<label for="sms_yes">Yes</label>
	        </div> 
        	<div class="radio-inline radio">	
	        	<input class="radiobotton" type="radio" name="sms" id="sms_no" value="No" <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['sms_option']=='No') {?> checked="checked"<?php } elseif ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['sms_option']!='Yes') {?>checked="checked" <?php }?>/>
	       		 <label for="sms_no">No</label>
	        </div>
        </div>
	</div>
	
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Order Pending Alert Ring </span>
		<div class="col-sm-4">
            <div class="radio-inline radio">	
    			<input class="" type="radio" name="res_order_alert" id="res_order_alert_yes" value="Yes" <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['pending_order_alert']=='Yes') {?> checked="checked" <?php }?> />
    			<label for="res_order_alert_yes">Yes</label>
    		</div>
            <div class="radio-inline radio">	
            	<input class="" type="radio" name="res_order_alert" id="res_order_alert_no" value="No" <?php if ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['pending_order_alert']=='No') {?> checked="checked"<?php } elseif ($_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['pending_order_alert']!='Yes'&&$_smarty_tpl->tpl_vars['restaurantEditList']->value[0]['pending_order_alert']!='No') {?>checked="checked" <?php }?>/>
           		<label for="res_order_alert_no">No</label>
            </div>
        </div>
	</div>
	
<?php }} ?>
