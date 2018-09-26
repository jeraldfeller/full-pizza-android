<div class="form-horizontal col-sm-12">
	<!--Restaurant Commission-->
	
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Restaurant Commission</span>
		<div class="col-sm-4">
            <div class="input-group">
                <input class="form-control" type="text" name="restaurant_commission" id="restaurant_commission" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_commission|stripslashes}{/if}" />
                <span class="input-group-addon">%</span>
            </div>
    		<span id="resCommErr"></span>
        </div>
	</div>
	
	{*<div class="addPageCont">
		<span class="addPageRightFont">Invoice Time Period <span class="color1">*</span></span>
		<span class="colon2">: (%) </span>
		
		<select class="selectbx" name="restaurant_inv_setting" id="restaurant_inv_setting">
			<option value="m1" {if $restaurantEditList.0.restaurant_inv_setting eq 'm1'}selected="selected"{/if}>Monthly</option>
			<option value="m2" {if $restaurantEditList.0.restaurant_inv_setting eq 'm2'}selected="selected"{/if}>Monthly Twice</option>
			<option value="m4" {if $restaurantEditList.0.restaurant_inv_setting eq 'm4'}selected="selected"{/if}>Monthly 4 Times</option>
		</select>
		<div class="tooltip"><div class="HelpButton">?</div><span>Enter Invoice Setting Monthly -> 1 time, Twice -> 1-15 &amp; 16-30, 4times-> 1-7, 8-14, 15-21 &amp; 22-30</span></div>
		<span id="resCommErr"></span>
	</div>*}
	
</div>