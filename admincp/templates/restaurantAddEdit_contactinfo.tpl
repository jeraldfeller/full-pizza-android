
	<!--Restaurant Name-->
	<div class="mandatoryField"><span class="color-red">*</span> - Mandatory Fields</div>
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Restaurant Name <span class="color-red">*</span></span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="restaurant_name" id="restaurant_name" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_name|stripslashes}{/if}" />
    		<script>document.addNewRestaurant.restaurant_name.focus();</script>
    		<span id="resNameErr"></span>
        </div>
	</div>
	
	<!--Restaurant Phone-->
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Restaurant Phone <span class="color-red">*</span></span>
		<div class="col-sm-4">
		<input class="form-control" type="text" name="restaurant_phone" id="restaurant_phone" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_phone|stripslashes}{/if}" />
		<span id="resPhoneErr"></span>
        </div>
	</div>
	
	<!--Restaurant Website-->
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Restaurant Website </span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="restaurant_website" id="restaurant_website" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_website|stripslashes}{/if}" />
    		<span id="resWebErr"></span>
        </div>
	</div>
	
	<!--Restaurant Fax-->
	{*<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Restaurant Fax </span>
		<span class="colon1">:</span>
		<input class="form-control" type="text" name="restaurant_fax" id="restaurant_fax" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_fax|stripslashes}{/if}" />
		<div class="tooltip"><div class="HelpButton">?</div><span>Enter restaurant fax</span></div>
		<span id="resFaxErr"></span>
	</div>
	*}
	<!--Restaurant Street Address-->
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Restaurant Street Address <span class="color-red">*</span></span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="restaurant_streetaddress" id="restaurant_streetaddress" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_streetaddress|stripslashes}{/if}" />
    		<span id="resStrErr"></span>
       </div>
	</div>
	
	<!--Restaurant State-->
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">State <span class="color-red">*</span></span>
		<div class="col-sm-4">
    		<select class="form-control selectpicker" name="restaurant_state" id="restaurant_state" onchange="getCityListRest(this.value,'rest');">
    			<option value="">Select</option>
    			{foreach from=$showStatelist item=state}
    			<option value="{$state.statecode}" {if $restaurantEditList.0.restaurant_state eq $state.statecode}selected="selected"{/if}>{$state.statename|stripslashes}</option>
    			{/foreach}
    		</select>
    		<span id="resStaErr"></span>
        </div>
	</div>
	
	<!--Restaurant City-->
	<div class="form-group">
    	<div id="showResCityList">
    		<span class="control-label col-sm-4 font-normal">City <span class="color-red">*</span></span>
    		<div class="col-sm-4">
        		<select class="form-control selectpicker" name="restaurant_city" id="restaurant_city" >
        		<option value="">First Select State</option>
        		{foreach from=$selectCityList item=city}
        		<option value="{$city.city_id}" {if $restaurantEditList.0.restaurant_city eq $city.city_id}selected="selected"{/if}>{$city.cityname|stripslashes}</option>
        		{/foreach}
        		</select>
        		<span id="resCitErr"></span>
            </div>
    	</div>
        {*<input class="textbox" type="text" name="restaurant_city" id="restaurant_city" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_city|stripslashes}{/if}" />*}
	</div>
	
	<!--Restaurant Zip-->
	<div class="form-group">
    	<span id="showResZipList">
    		<span class="control-label col-sm-4 font-normal">PostCode <span class="color-red">*</span></span>
    		<div class="col-sm-4">
        		{*<input type="text" class="textbox" name="restaurant_zip" id="restaurant_zip" autocomplete="off" value="{if $restaurantEditList.0.restaurant_zip neq ''}{$restaurantEditList.0.restaurant_zip}{else}Restaurant Zip Code{/if}" onfocus="if (this.value == '{if $restaurantEditList.0.restaurant_zip neq ''}{$restaurantEditList.0.restaurant_zip}{else}Restaurant Zip Code{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $restaurantEditList.0.restaurant_zip neq ''}{$restaurantEditList.0.restaurant_zip}{else}Restaurant Zip Code{/if}';" onkeyup="autoSuggestZip();" />*}
        		<input type="text" class="form-control" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_zip|stripslashes}{/if}"  name="restaurant_zip" id="restaurant_zip"  maxlength="8" autocomplete="off" onkeyup="Suggestzip()"/>
        		<span id="resZipErr"></span>
            </div>
    	</span>
	</div>
	
	<!--Restaurant Contact Name-->
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Contact Name <span class="color-red">*</span></span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="restaurant_contact_name" id="restaurant_contact_name" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_contact_name|stripslashes}{/if}" />
    		<span id="resCntNameErr"></span>
        </div>
	</div>
	
	<!--Restaurant Contact Phone-->
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Contact Phone <span class="color-red">*</span></span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="restaurant_contact_phone" id="restaurant_contact_phone" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_contact_phone|stripslashes}{/if}" maxlength="15"/>
    		<span id="resCntPhoneErr"></span>
        </div>
	</div>
	
	<!--Restaurant Contact Email-->
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Contact Email <span class="color-red">*</span></span>
		<div class="col-sm-4">
    		<input class="form-control" type="text" name="restaurant_contact_email" id="restaurant_contact_email" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_contact_email|stripslashes}{/if}" />
    		<span id="resEmailErr"></span>
        </div>
	</div>
	<!--Restaurant Password-->
	{if $smarty.get.eid eq ''}
		<div class="form-group">
			<span class="control-label col-sm-4 font-normal">Password <span class="color-red">*</span></span>
			<div class="col-sm-4">
    			<input class="form-control" type="password" name="restaurant_password" id="restaurant_password" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_password|stripslashes}{/if}" autocomplete="off"/>
    			<span id="resPswdErr"></span>
            </div>
		</div>
	{/if}

