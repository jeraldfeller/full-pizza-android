
	{* ----------- Restaurant Order ------------- *}
	{*<div class="mandatoryField"><span class="color1">*</span> - Mandatory Fields</div>*}
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Email Order </span>
		<div class="col-sm-4">
    		<div class="radio-inline radio">
                <input class="" type="radio" name="order_email" id="order_email_yes" value="Yes" {if $smarty.get.eid neq ''}  {if $restaurantEditList.0.order_email_option eq 'Yes'} checked="checked" {/if} {elseif $restaurantEditList.0.order_email_option neq 'No'}checked="checked" {/if} onclick="document.getElementById('orderemail').style.display = 'block'" />
                <label for="order_email_yes">Yes</label>
            </div>
            <div class="radio-inline radio">
                <input class="" type="radio" name="order_email" id="order_email_no" value="No" {if $restaurantEditList.0.order_email_option eq 'No'} checked="checked" {/if} onclick="document.getElementById('orderemail').style.display = 'none'"/>
                <label for="order_email_no">No</label>
            </div>
        </div>
	</div>
	{******ORDER EMAIL*****}
	<div class="form-group" id="orderemail" style="display:block">
		<span class="control-label col-sm-4 font-normal">Order Email </span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="receive_email" id="receive_email" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.order_receive_email|stripslashes}{/if}" />
    		<div class="tooltip"><div class="HelpButton">?</div><span>Enter restaurant Email for receive the order details</span></div>
    		<span id="resEstTimeErr"></span>
        </div>
	</div>
    {******ORDER PHONE NUMBER*****}
	<div class="form-group" id="ordernumber" style="display:block">
		<span class="control-label col-sm-4 font-normal">Order Phone Number </span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="order_number" id="order_number" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.order_phone_number|stripslashes}{/if}" />
    		<div class="tooltip"><div class="HelpButton">?</div><span>Enter restaurant Order Number  for receive the order details</span></div>
    		<span id="resOrdnumErr"></span>
        </div>
	</div>
	{******SEND FAX OPTION*****}
	<!-- <div class="form-group">
		<span class="control-label col-sm-4 font-normal">Send Fax Option </span>
		<div class="col-sm-4">
	        <div class="radio-inline radio">
			  <input class="radiobotton" type="radio" name="send_fax" id="send_fax_yes" value="Yes" {if $restaurantEditList.0.send_fax_option eq 'Yes'} checked="checked" {/if}  onclick="document.getElementById('sendfax').style.display = 'block'" />
	          <label for="send_fax_yes">Yes</label>
	        </div> 
			<div class="radio-inline radio">
		        <input class="radiobotton" type="radio" name="send_fax" id="send_fax_no" value="No" {if $restaurantEditList.0.send_fax_option eq 'No'} checked="checked"{elseif $restaurantEditList.0.send_fax_option neq 'Yes'}checked="checked" {/if} onclick="document.getElementById('sendfax').style.display = 'none'"/>
		        <label for="send_fax_no">No</label>
	        </div>
	    </div>
	</div> -->
	{******RESTAURANT FAX*****}
	<!-- <div class="form-group" id="sendfax" {if $restaurantEditList.0.send_fax_option neq 'Yes'}style="display:none" {else}style="display:block"{/if}>
		<span class="control-label col-sm-4 font-normal">Restaurant Fax </span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="restaurant_fax" id="restaurant_fax" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_fax|stripslashes}{/if}" />
	        <span id="resEstTimeErr"></span>
        </div>
	</div> -->
	
	{*******GPRS OPTION*********}
	<!-- <div class="form-group">
		<span class="control-label col-sm-4 font-normal">GPRS Option </span>
		<div class="col-sm-4">
	        <div class="radio-inline radio">
			  <input class="" type="radio" name="gprs" id="gprs_yes" value="Yes" {if $restaurantEditList.0.gprs_option eq 'Yes'} checked="checked" {/if} />
	           <label for="gprs_yes">Yes</label>
	        </div>
	        <div class="radio-inline radio">
	            <input class="" type="radio" name="gprs" id="gprs_no" value="No" {if $restaurantEditList.0.gprs_option eq 'No'} checked="checked"{elseif $restaurantEditList.0.gprs_option neq 'Yes'}checked="checked" {/if}/>
	             <label for="gprs_no">No</label>
	        </div>
	     </div>
	</div> -->
	
	{*******GOOGLE CLOUD PRINTER*********}
	{*<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Google Cloud Printer </span>
		<div class="col-sm-4">
            <div class="radio-inline radio">
				<input class="" type="radio" name="google_cloud_printer" id="google_cloud_printer_yes" value="Yes" {if $restaurantEditList.0.google_cloud_printer_option eq 'Yes'} checked="checked" {/if}  onclick="document.getElementById('googlecloud').style.display = 'block'" />
            	<label for="google_cloud_printer_yes">Yes</label>
            </div>
            <div class="radio-inline radio">	
	    		<input class="" type="radio" name="google_cloud_printer" id="google_cloud_printer_no" value="No" {if $restaurantEditList.0.google_cloud_printer_option eq 'No'} checked="checked"{elseif $restaurantEditList.0.google_cloud_printer_option neq 'Yes'}checked="checked" {/if} onclick="document.getElementById('googlecloud').style.display = 'none'"/>
	            <label for="google_cloud_printer_no">No</label>
            </div>
        </div>
	</div>*}
	
	{*******GOOGLE CLOUD PRINTER EMAIL AND PASSWORD*********}
	<div id="googlecloud" {if $restaurantEditList.0.google_cloud_printer_option neq 'Yes'}style="display:none" {else}style="display:block"{/if}>
		<!-- Cloud printer Email -->
		<div class="form-group">
			<span class="control-label col-sm-4 font-normal">Cloud Printer Email </span>
			<div class="col-sm-4">
				<input class="form-control" type="text" name="restaurant_cloud_printer_email" id="restaurant_cloud_printer_email" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_cloud_printer_email|stripslashes}{/if}" />
				<span id="resPswdErr"></span>
            </div>
		</div>
		
		<!-- Cloud printer password -->
		<div class="form-group">
			<span class="control-label col-sm-4 font-normal">Cloud Printer Password </span>
			<div class="col-sm-4">
				<input class="form-control" type="password" name="restaurant_cloud_printer_password" id="restaurant_cloud_printer_password" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_cloud_printer_password|stripslashes}{/if}" autocomplete="off"/>
				<span id="resPswdErr"></span>
            </div>
		</div>
	</div>
	
	{* ***********SMS Option************ *}
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">SMS Option </span>
		<div class="col-sm-4">
	        <div class="radio-inline radio">	
				<input class="" type="radio" name="sms" id="sms_yes" value="Yes" {if $restaurantEditList.0.sms_option eq 'Yes'} checked="checked" {/if} />
	       		<label for="sms_yes">Yes</label>
	        </div> 
        	<div class="radio-inline radio">	
	        	<input class="radiobotton" type="radio" name="sms" id="sms_no" value="No" {if $restaurantEditList.0.sms_option eq 'No'} checked="checked"{elseif $restaurantEditList.0.sms_option neq 'Yes'}checked="checked" {/if}/>
	       		 <label for="sms_no">No</label>
	        </div>
        </div>
	</div>
	{* ******Order Pending Alert Tone******** *}
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Order Pending Alert Ring </span>
		<div class="col-sm-4">
            <div class="radio-inline radio">	
    			<input class="" type="radio" name="res_order_alert" id="res_order_alert_yes" value="Yes" {if $restaurantEditList.0.pending_order_alert eq 'Yes'} checked="checked" {/if} />
    			<label for="res_order_alert_yes">Yes</label>
    		</div>
            <div class="radio-inline radio">	
            	<input class="" type="radio" name="res_order_alert" id="res_order_alert_no" value="No" {if $restaurantEditList.0.pending_order_alert eq 'No'} checked="checked"{elseif $restaurantEditList.0.pending_order_alert neq 'Yes' and $restaurantEditList.0.pending_order_alert neq 'No'}checked="checked" {/if}/>
           		<label for="res_order_alert_no">No</label>
            </div>
        </div>
	</div>
	
