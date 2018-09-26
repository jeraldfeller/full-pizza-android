
{* Select picker  *}



{if $action eq "showcityList"}
	<!-- City List from state wise -->
		<select class="form-control selectpicker" name="cityname" id="cityname" >
			<option value="">Select</option>
			{foreach from=$selectCityList item=city}
			<option value="{$city.city_id}"{if $zipcodeValue.0.cityid eq $city.city_id}selected="selected"{/if}>{$city.cityname}</option>
			{/foreach}
		</select>
		
{/if}
{*-----------------------------------------------------------------------------------------------------------*}
{if $action eq "showResCityList"}
	{if $smarty.get.frompage eq 'rest'}
		<!-- City List from Restaurant -->
		<label class="control-label col-sm-4 font-normal">City <span class="color-red">*</span></label>
		<div class="col-sm-4">
			<select class="form-control selectpicker" name="restaurant_city" id="restaurant_city">
	    		<option value="">Select</option>
	    		{foreach from=$selectCityList item=city}
	    		<option value="{$city.city_id}" {if $restaurantEditList.0.restaurant_city eq $city.city_id}selected="selected"{/if}>{$city.cityname|stripslashes}</option>
	    		{/foreach}
			</select>
			<span id="resCitErr"></span>
        </div>
		
	{/if}
	{if $smarty.get.frompage eq 'cust'}
		<!-- City List from Customer -->
		<label class="control-label col-sm-4 font-normal">City <span class="color-red">*</span></label>
		<div class="col-sm-4">
			<select class="selectpicker form-control" name="cus_city" id="cus_city" >
			<option value="">Select</option>
			{foreach from=$selectCityList item=city}
			<option value="{$city.city_id}" {if $customervalue.0.customer_city eq $city.city_id}selected="selected"{/if}>{$city.cityname|stripslashes}</option>
			{/foreach}
			</select>	
			<span id="resCitErr"></span>	
		</div>
		
		
	{/if}
{/if}
{*-----------------------------------------------------------------------------------------------------------*}
{if $action eq "showResZipList"}
	{if $smarty.get.frompage eq 'rest'}
		<!-- Zipcode List from Restaurant -->
		<span class="addPageRightFont">Zip <span class="color1">*</span></span>
		<span class="colon1">:</span>
		<select class="selectbx" name="restaurant_zip" id="restaurant_zip" >
			<option value="">Select</option>
			{foreach from=$showZiplist item=ziplist}
			<option value="{$ziplist.zipcode_id}" {if $restaurantEditList.0.restaurant_zip eq $ziplist.zipcode_id}selected="selected"{/if}>{$ziplist.zipcode|stripslashes} - {$ziplist.areaname|stripslashes}</option>
			{/foreach}
		</select>
		<span class="errClass" id="resZipErr" style="color:red"></span>
	{/if}
	{if $smarty.get.frompage eq 'cust'}
		<!-- Zipcode List from Restaurant -->
		<span class="addPageRightFont">Zip <span class="color1">*</span></span>
		<span class="colon1">:</span>
		<select class="selectbx" name="cus_zip" id="cus_zip" >
			<option value="">Select</option>
			{foreach from=$showZiplist item=ziplist}
			<option value="{$ziplist.zipcode_id}" {if $customervalue.0.customer_zip eq $ziplist.zipcode_id}selected="selected"{/if}>{$ziplist.zipcode|stripslashes} - {$ziplist.areaname|stripslashes}</option>
			{/foreach}
		</select>
		<span class="errClass" id="resZipErr" style="color:red"></span>
	{/if}
{/if}
{*-----------------------------------------------------------------------------------------------------------*}
{if $action eq "checkSelectAllOpen"}

	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_tue_open_hr" id="restaurant_delivery_tue_open_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
			{$HOURS_LIST_TUE}
		</select>
		<select class="selectbx" name="restaurant_delivery_tue_open_min" id="restaurant_delivery_tue_open_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
			{$MINUTES_LIST_TUE}
		</select>
		<select class="selectbx" name="restaurant_delivery_tue_open_sess" id="restaurant_delivery_tue_open_sess" style="width:60px">
			<option value="AM" {if $tueopentimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
			<option value="PM" {if $tueopentimesess eq 'PM'}selected="selected"{/if}>PM</option>
		</select>
	</span>
	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_wed_open_hr" id="restaurant_delivery_wed_open_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
			{$HOURS_LIST_WED}
		</select>
		<select class="selectbx" name="restaurant_delivery_wed_open_min" id="restaurant_delivery_wed_open_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
			{$MINUTES_LIST_WED}
		</select>
		<select class="selectbx" name="restaurant_delivery_wed_open_sess" id="restaurant_delivery_wed_open_sess" style="width:60px">
			<option value="AM" {if $wedopentimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
			<option value="PM" {if $wedopentimesess eq 'PM'}selected="selected"{/if}>PM</option>
		</select>
	</span>
	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_thu_open_hr" id="restaurant_delivery_thu_open_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
			{$HOURS_LIST_THU}
		</select>
		<select class="selectbx" name="restaurant_delivery_thu_open_min" id="restaurant_delivery_thu_open_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
			{$MINUTES_LIST_THU}
		</select>
		<select class="selectbx" name="restaurant_delivery_thu_open_sess" id="restaurant_delivery_thu_open_sess" style="width:60px">
			<option value="AM" {if $thuopentimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
			<option value="PM" {if $thuopentimesess eq 'PM'}selected="selected"{/if}>PM</option>
		</select>
	</span>
	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_fri_open_hr" id="restaurant_delivery_fri_open_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
			{$HOURS_LIST_FRI}
		</select>
		<select class="selectbx" name="restaurant_delivery_fri_open_min" id="restaurant_delivery_fri_open_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
			{$MINUTES_LIST_FRI}
		</select>
		<select class="selectbx" name="restaurant_delivery_fri_open_sess" id="restaurant_delivery_fri_open_sess" style="width:60px">
			<option value="AM" {if $friopentimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
			<option value="PM" {if $friopentimesess eq 'PM'}selected="selected"{/if}>PM</option>
		</select>
	</span>
	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_sat_open_hr" id="restaurant_delivery_sat_open_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
			{$HOURS_LIST_SAT}
		</select>
		<select class="selectbx" name="restaurant_delivery_sat_open_min" id="restaurant_delivery_sat_open_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
			{$MINUTES_LIST_SAT}
		</select>
		<select class="selectbx" name="restaurant_delivery_sat_open_sess" id="restaurant_delivery_sat_open_sess" style="width:60px">
			<option value="AM" {if $satopentimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
			<option value="PM" {if $satopentimesess eq 'PM'}selected="selected"{/if}>PM</option>
		</select>
	</span>
	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_sun_open_hr" id="restaurant_delivery_sun_open_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
			{$HOURS_LIST_SUN}
		</select>
		<select class="selectbx" name="restaurant_delivery_sun_open_min" id="restaurant_delivery_sun_open_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
			{$MINUTES_LIST_SUN}
		</select>
		<select class="selectbx" name="restaurant_delivery_sun_open_sess" id="restaurant_delivery_sun_open_sess" style="width:60px">
			<option value="AM" {if $sunopentimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
			<option value="PM" {if $sunopentimesess eq 'PM'}selected="selected"{/if}>PM</option>
		</select>
	</span>	
{/if}
{*-----------------------------------------------------------------------------------------------------------*}
{if $action eq "checkSelectAllClose"}

	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_tue_close_hr" id="restaurant_delivery_tue_close_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
				{$HOURS_LIST_CLOSE_TUE}
		</select>
		<select class="selectbx" name="restaurant_delivery_tue_close_min" id="restaurant_delivery_tue_close_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
				{$MINUTES_LIST_CLOSE_TUE}
		</select>
		<select class="selectbx" name="restaurant_delivery_tue_close_sess" id="restaurant_delivery_tue_close_sess" style="width:60px">
			<option value="AM" {if $tueclosetimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
			<option value="PM" {if $tueclosetimesess eq 'PM'}selected="selected"{else}selected="selecetd"{/if}>PM</option>
		</select>			
	</span>
	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_wed_close_hr" id="restaurant_delivery_wed_close_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
			{$HOURS_LIST_CLOSE_WED}
		</select>
		<select class="selectbx" name="restaurant_delivery_wed_close_min" id="restaurant_delivery_wed_close_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
			{$MINUTES_LIST_CLOSE_WED}
		</select>
		<select class="selectbx" name="restaurant_delivery_wed_close_sess" id="restaurant_delivery_wed_close_sess" style="width:60px">
			<option value="AM" {if $wedclosetimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
			<option value="PM" {if $wedclosetimesess eq 'PM'}selected="selected"{else}selected="selecetd"{/if}>PM</option>
		</select>
	</span>
	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_thu_close_hr" id="restaurant_delivery_thu_close_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
			{$HOURS_LIST_CLOSE_THU}
		</select>
		<select class="selectbx" name="restaurant_delivery_thu_close_min" id="restaurant_delivery_thu_close_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
			{$MINUTES_LIST_CLOSE_THU}
		</select>
		<select class="selectbx" name="restaurant_delivery_thu_close_sess" id="restaurant_delivery_thu_close_sess" style="width:60px">
			<option value="AM" {if $thuclosetimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
			<option value="PM" {if $thuclosetimesess eq 'PM'}selected="selected"{else}selected="selecetd"{/if}>PM</option>
		</select>	
	</span>
	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_fri_close_hr" id="restaurant_delivery_fri_close_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
			{$HOURS_LIST_CLOSE_FRI}
		</select>
		<select class="selectbx" name="restaurant_delivery_fri_close_min" id="restaurant_delivery_fri_close_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
			{$MINUTES_LIST_CLOSE_FRI}
		</select>
		<select class="selectbx" name="restaurant_delivery_fri_close_sess" id="restaurant_delivery_fri_close_sess" style="width:60px">
			<option value="AM" {if $friclosetimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
			<option value="PM" {if $friclosetimesess eq 'PM'}selected="selected"{else}selected="selecetd"{/if}>PM</option>
		</select>
	</span>
	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_sat_close_hr" id="restaurant_delivery_sat_close_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
			{$HOURS_LIST_CLOSE_SAT}
		</select>
		<select class="selectbx" name="restaurant_delivery_sat_close_min" id="restaurant_delivery_sat_close_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
			{$MINUTES_LIST_CLOSE_SAT}
		</select>
		<select class="selectbx" name="restaurant_delivery_sat_close_sess" id="restaurant_delivery_sat_close_sess" style="width:60px">
			<option value="AM" {if $satclosetimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
			<option value="PM" {if $satclosetimesess eq 'PM'}selected="selected"{else}selected="selecetd"{/if}>PM</option>
		</select>
	</span>
	<span class="DeliveryHrs">
		<select class="selectbx" name="restaurant_delivery_sun_close_hr" id="restaurant_delivery_sun_close_hr" style="width:60px; margin-right:15px;">
			<option value="">Hrs</option>
			{$HOURS_LIST_CLOSE_SUN}
		</select>
		<select class="selectbx" name="restaurant_delivery_sun_close_min" id="restaurant_delivery_sun_close_min" style="width:60px; margin-right:15px;">
			<option value="">Mins</option>
			{$MINUTES_LIST_CLOSE_SUN}
		</select>
		<select class="selectbx" name="restaurant_delivery_sun_close_sess" id="restaurant_delivery_sun_close_sess" style="width:60px;">
			<option value="AM" {if $sunclosetimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
			<option value="PM" {if $sunclosetimesess eq 'PM'}selected="selected"{else}selected="selecetd"{/if}>PM</option>
		</select>
	</span>	
{/if}
{*-----------------------------------------------------------------------------------------------------------*}
{if $action eq "showCatPizzaAddonsList"}

<div class="addPageCont">
	<span class="addPageRightFont">Size Option</span>
	<span class="colon1">:</span>
	<span>
		<input type="radio" name="sizeoption" id="sizeoption_default" value="default" checked="checked" onclick="return defaultOption();"/>&nbsp;Size
		&nbsp;
		<input type="radio" name="sizeoption" id="sizeoption_other" value="other" onclick="return otherOption();"/>&nbsp;Slice
	</span>
	
	<span id="pizzaDefaultOption">
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td align="left" width="30%" height="30">
					<input type="checkbox" name="small" id="small" value="small" onclick="showSmallPrice();">&nbsp;Small &nbsp;
				
					<span id="smallpriceshow" style="display:none;">
					<input type="text" name="smallval" id="smallval" value="" class="addonbox" />&nbsp;</span>
				</td>
			</tr>
			<tr>
				<td align="left" width="30%" height="30">
					<input type="checkbox" name="medium" id="medium" value="medium" onclick="showMediumPrice();">&nbsp;Medium &nbsp;
				
					<span id="mediumpriceshow" style="display:none;">
					<input type="text" name="mediumval" id="mediumval" value="" class="addonbox" />&nbsp;</span>
				</td>
			</tr>
			<tr>
				<td align="left" width="30%" height="30">	
					<input type="checkbox" name="large" id="large" value="large" onclick="showLargePrice();">&nbsp;Large &nbsp;
				
					<span id="largepriceshow" style="display:none;">
					<input type="text" name="largeval" id="largeval" value="" class="addonbox" />&nbsp;</span>
				</td>
			</tr>
		</table>
	</span>
	
	<span id="pizzaOtherOption" style="display:none;">
		<table width="70%" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td align="left" width="16%" height="30">
					<input type="text" name="sizename" id="sizename" value="" /> &nbsp;&nbsp;
					<input type="txt" name="sizevalue" id="sizevalue" value="" /> 
				</td>
			</tr>
		</table>
		<label style="float:left; width:250px;">&nbsp;</label>
		<table id="specialPizzaSize" border="0" width="70%">
			
			<tfoot><tr>
			<td class="left" height="20">
				<a onclick="addMorePizzaSize();" style="color:#f34571;cursor:pointer;margin-left:100px;"><span>Add More Size</span></a>
			</td>
			</tr></tfoot>
		</table>
	</span>
	
</div>			
{/if}
{*-----------------------------------------------------------------------------------------------------------*}
{if $action eq "mapInfoUpdate"}
	{if $smarty.request.eid neq ''}
	<!--Google Map Delivery Area-->
	<div class="addPageCont" id="map_distance_show">
		<input type="hidden" name="restaurant_address" id="restaurant_address" value="{$restaurant_address_map}" />
		<input type="hidden" name="rest_deliver_miles" id="rest_deliver_miles" value="{if $restaurantEditList.0.restaurant_delivery_distance neq ''}{$restaurantEditList.0.restaurant_delivery_distance|stripslashes}{else}45{/if}" />
		<div id="map" style="width:500px;height:500px;"></div>
	</div>
	{/if}
{/if}
{*-----------------------------------------------------------------------------------------------------------*}
{if $action eq "resCategory"}
	<span class="col-sm-4 control-label">Menu Category <span class="color-red">*</span></span>
	<div class="col-sm-4">
		<select class="form-control selectpicker" name="menu_category" id="menu_category" onchange="otherSpecify('category'); getShowAddons(this.value);" >
			<option value="">Select</option>
			{foreach from=$showcategorylist item=cat}
				<option value="{$cat.maincateid}" {if $cat.maincateid eq $menudet.0.menu_category}selected="selected"{/if}>{$cat.maincatename}</option>
			{/foreach}
			<option value="other" id="categoryOther" onclick="otherSpecify('category');">Others</option>
			<!--<option value="other" id="categoryOther" onclick="otherSpecify('category');">Others</option>-->
		</select>
		<span id="caterrormsg"></span>
	</div>
{/if}
{*-----------------------------------------------------------------------------------------------------------*}
{if $action eq "resAddonCategory"}
    <label class="control-label font-normal col-sm-4">Category Name <span class="color-red">*</span></label>
	<div class="col-sm-4">
		<select class="form-control selectpicker" name="category_name" id="category_name" onchange="otherSpecifyAddon('category');">
		<option value="">Select</option>
		{foreach from=$showcategorylist item=cat}
			<option value="{$cat.maincateid}" {if $cat.maincateid eq $addonsvalue.0.category_id}selected="selected"{/if}>{$cat.maincatename}</option>
		{/foreach} 
        <option value="other" id="categoryOther_addon">Others</option>
		</select>
	</div>
{/if}
{*-----------------------------------------------------------------------------------------------------------*}
{*####################################### NEW IMPLEMENTATION ############################*}
{*-----Show Addons List---------------*}
{if $action eq "showCatAddonsList"}
	
	<!--Addons List from menu mgmt-->
	<div class="contain">
			
	
	<input type="hidden" name="cntSliceAddons" id="cntSliceAddons1" value="{$cntSliceAddons}" />
	<input type="hidden" name="cntSliceAddons_createsub" id="cntSliceAddons_createsub1" value="" />
    
    <input type='hidden' class="selectoptionsFirst selectoptions" id="selectoptions" name='selectoptions' value='slice' />
    <span class="selectoptionVal"></span>
    <div class="col-sm-8 col-sm-offset-4">
	{section name="addon" loop=$showAddonslist}
			{assign var='showSubAddonslist' value=$objSite->getShowSubAddonsList($showAddonslist[addon].id,$showAddonslist[addon].maincat_option)}
			{if $showSubAddonslist neq ''}
                <b class="addPageRightFont" style="cursor:pointer;" onclick="openAddons('q{$smarty.section.addon.rownum}')">{$showAddonslist[addon].addonsname|stripslashes}
                    <img src="images/arrowdown.png" class="uparr_q{$smarty.section.addon.rownum}" {if $smarty.section.addon.rownum eq '1'}style="display:none;"{/if}/>
                    <img src="images/arrowup.png" class="downarr_q{$smarty.section.addon.rownum}" {if $smarty.section.addon.rownum neq '1'}style="display:none;"{/if}/>
                </b>
            {/if}
						
					<div class="clr"></div>
					<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][mainaddonsname]" value="{$showAddonslist[addon].id}" />
					<div id="q{$smarty.section.addon.rownum}" {if $smarty.section.addon.rownum neq '1'}style="display:none;"{/if}>				
					{section name="subaddon" loop=$showSubAddonslist}
						<div class="form-group">
						  <div class="col-sm-3">
								{if $showSubAddonslist[subaddon].menu_categoryoption neq 'pizza'}
                                <div class="checkbox-inline checkbox checkbox-primary">
									<input type="checkbox" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonsname]" id="{$showSubAddonslist[subaddon].addonsname|stripslashes}" value="{$showSubAddonslist[subaddon].id}" class="inputCheck" />
									<label for="{$showSubAddonslist[subaddon].addonsname|stripslashes}">{$showSubAddonslist[subaddon].addonsname|stripslashes}</label>
                                </div>
								{else}
								<div class="checkbox-inline checkbox checkbox-primary">
									<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonsname]" id="{$showSubAddonslist[subaddon].addonsname|stripslashes}" value="{$showSubAddonslist[subaddon].id}" class="inputCheck" />
									<label for="{$showSubAddonslist[subaddon].addonsname|stripslashes}">{$showSubAddonslist[subaddon].addonsname|stripslashes}</label>
								</div>
								{/if}
							</div>
                            <div class="col-sm-3">
                                <div class="radio-inline radio">
									<input type="radio" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" id="free_[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" class="free radiobotton" value="Free" checked="checked" onclick="addonsfreeoption('{$showSubAddonslist[subaddon].id}');" />
									<label for="free_[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]">Free</label>
                                </div> 
								
								{*<input type="radio" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" id="free_[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" value="Free" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $showSubAddonslist[subaddon].menuprice eq ''}checked="checked"{/if} onclick="addonsfreeoption('{$showSubAddonslist[subaddon].id}');"/> Free *}
						
								 <div class="radio-inline radio">
                                	 <input type="radio" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" id="paid_mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" class="paid radiobotton" value="Paid" {if $showSubAddonslist[subaddon].menupriceoption eq 'Paid'}checked="checked"{elseif $showSubAddonslist[subaddon].menupriceoption neq 'Free'}checked="checked"{/if} onclick="addonspaidoption('{$showSubAddonslist[subaddon].id}');" />
                                	 <label for="paid_mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]">Paid</label>
                                 </div>
								
								{*<span class="flt"><input type="radio" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" id="paid" value="Paid" {if $showSubAddonslist[subaddon].menupriceoption eq 'Paid'}checked="checked"{elseif $showSubAddonslist[subaddon].menupriceoption neq 'Free'}checked="checked"{/if} onclick="addonspaidoption('{$showSubAddonslist[subaddon].id}');"/>Paid  &nbsp;</span>*}
						  </div>	
                          <div  class="col-sm-5">	
									<!--Fixed option's addons price-->												
									<span id="showprice_{$showSubAddonslist[subaddon].id}_fixed" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $menudet.0.sizeoption neq 'fixed'} style="display:none;" {/if} class="showprice_fixed priceSpan flt">
										<span class="col-sm-6">
										
											<input class="form-control input-sm numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_fixed]" id="addonsprice" value="{*if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Fixed{/if*}"  placeholder="Price"/>			
											{*<input class="paidTxtBox" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_medium]" id="addonsprice_medium" value="{if $showSubAddonslist[subaddon].menuaddons_price_medium eq 0.00}Medium{else}{$showSubAddonslist[subaddon].menuaddons_price_medium}{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuaddons_price_medium neq '0.00'}{$showSubAddonslist[subaddon].menuaddons_price_medium}{else}Medium{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuaddons_price_medium neq ''}{$showSubAddonslist[subaddon].menuaddons_price_medium|stripslashes}{else}Medium{/if}';" />
											<input class="paidTxtBox" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_large]" id="addonsprice_large" value="{if $showSubAddonslist[subaddon].menuaddons_price_large eq 0.00}Large{else}{$showSubAddonslist[subaddon].menuaddons_price_large}{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuaddons_price_large neq '0.00'}{$showSubAddonslist[subaddon].menuaddons_price_large}{else}Large{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuaddons_price_large neq ''}{$showSubAddonslist[subaddon].menuaddons_price_large|stripslashes}{else}Large{/if}';" />*}
											
										</span>
									</span>						
													
									<!--Size option's addons price-->
									<span id="showprice_{$showSubAddonslist[subaddon].id}_size" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $menudet.0.sizeoption neq 'size'} style="display:none;" {/if} class="showprice_size">
										 <div class="col-sm-4">
										
										<input class="form-control numericfield input-sm" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_size]" id="addonsprice" value="{*if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Small{/if*}"   placeholder="Price"/>
                                        </div>
                                         <div class="col-sm-4">
										<input class="form-control numericfield input-sm" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_medium_size]" id="addonsprice_medium" value="{*if $showSubAddonslist[subaddon].menuaddons_price_medium neq ''}{$showSubAddonslist[subaddon].menuaddons_price_medium}{else}Medium{/if*}"  placeholder="Price"/>
                                         </div>
                                         <div class="col-sm-4">
										<input class="form-control numericfield input-sm" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_large_size]" id="addonsprice_large" value="{*if $showSubAddonslist[subaddon].menuaddons_price_large neq ''}{$showSubAddonslist[subaddon].menuaddons_price_large}{else}Large{/if*}"  placeholder="Price" />
                                        </div>
									</span>
													
									<!--Slice options addons price-->
									<span id="showprice_{$showSubAddonslist[subaddon].id}_slice" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $menudet.0.sizeoption neq 'slice'} style="display:none;" {/if} class="showprice_slice">
									
										<input type="hidden" name="subaddonindex" id="subaddonindex" value="{$smarty.section.subaddon.index}" />
										<input type="hidden" name="mainaddonindex" id="mainaddonindex" value="{$smarty.section.addon.index}" />																						
										{if $showSubAddonslist[subaddon].menuaddons_price_slice neq ''}
											{*$objSite->getSliceAddonsPrice($showSubAddonslist[subaddon].menuaddons_price_slice)*}
											{section name=slice1 loop=$sliceaddonprice_arr}
											{assign var=sliceList value=$smarty.section.slice1.index}
                                            <div class="col-sm-4 marBtm5">
											<input class="form-control numericfield input-sm" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][{$smarty.section.slice1.index}][addons_price_slice]" id="addonsprice_slice" value="{*if $sliceaddonprice_arr[slice1] neq ''}{$sliceaddonprice_arr[slice1]}{else}Price{/if*}"  placeholder="Price"/>
                                            </div>														
											{/section}													
										{else}											
											{section name=slice1 loop=$cntSliceAddons}
											{assign var=sliceList value=$smarty.section.slice1.index}
                                            <div class="col-sm-4">
											<input class="form-control numericfield input-sm" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][{$smarty.section.slice1.index}][addons_price_slice]" id="addonsprice_slice" value="{*if $cntSliceAddons[slice1] neq ''}{$sliceaddonprice_arr[slice1]}{else}Price{/if*}"  placeholder="Price"/>
                                            </div>														
											{/section}
										{/if}
										<input type="hidden" name="slicemoreprice_countperslice" class="slicemoreprice_countperslice" id="slicemoreprice_countperslice_{$smarty.section.addon.index}_{$smarty.section.subaddon.index}" value="" />		
										<span class="slicemoreprice" id="slicemoreprice_{$smarty.section.addon.index}_{$smarty.section.subaddon.index}"></span>	
									</span>
								</div>
								{*------------------- Remove Existing addons ---------------------------*}
								{if $showSubAddonslist[subaddon].menu_addonid neq '' and $menuid neq ''}
								{*<td  valign="top" style="cursor:pointer;" onclick="return removeAddon({$showAddonslist[addon].id},{$showSubAddonslist[subaddon].category_id},{$showSubAddonslist[subaddon].addonid},{$showSubAddonslist[subaddon].menu_addonid},{$showSubAddonslist[subaddon].restaurant_id},'{$showSubAddonslist[subaddon].addonsname}');">Remove</td>*}
								{/if}
							
						</div>
					{/section}
					</div>
				
			
	{/section}
    </div>
	<input type="hidden" id="total" value="{$smarty.section.addon.total}" />
	</div>
	
	<div id="subaddonslist" class="madSubAddonNew4"></div>
	<div id="createbuttondiv" class="addtoCartInnerNew1"></div>
    <div class="col-sm-offset-4 col-sm-2 marTop10">
	<a onclick="addCreateMoreAddons_first();" class="btn btn-success" id="madAddons_firstajax">Create Addons</a>
    </div>
    
{/if}
{*-----------------------------------------------------------------------------------------------------------*}
{if $action eq 'deleteAddons'}
    <div class="col-sm-8 col-sm-offset-4">
    	<input type="hidden" name="cntSliceAddons" id="cntSliceAddons" value="{$cntSliceAddons}" />
    	<input type="hidden" name="cntSliceAddons_createsub" id="cntSliceAddons_createsub" value="" />
			<div id="showcataddonsList">
				<div class="contain">
					{section name="addon" loop=$showAddonslist}					
					{*if $showAddonslist[addon].addonspriceoption eq 'Free'*}
					<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][mainaddonsname]" value="{$showAddonslist[addon].id}" />{*/if*}
					<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][mainaddoneditid]" value="{$showAddonslist[addon].menu_addonid}" />
					{assign var='showSubAddonslist' value=$objSite->getShowSubAddonsList($showAddonslist[addon].id,$showAddonslist[addon].maincat_option)}
					{if $showSubAddonslist neq ''}

						<b style="cursor:pointer;" class="contain marBtm5" onclick="openAddons('q{$smarty.section.addon.rownum}')">{$showAddonslist[addon].addonsname|ucfirst|stripslashes}
                            <img src="images/arrowdown.png" class="uparr_q{$smarty.section.addon.rownum}" {if $smarty.section.addon.rownum eq '1'}style="display:none;"{/if}/>
                            <img src="images/arrowup.png" class="downarr_q{$smarty.section.addon.rownum}" {if $smarty.section.addon.rownum neq '1'}style="display:none;"{/if}/>
                        </b>	
										
						<div id="q{$smarty.section.addon.rownum}" {if $smarty.section.addon.rownum neq '1'}style="display:none;"{/if}>

							{section name="subaddon" loop=$showSubAddonslist}
							<input type="hidden" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addoneditid]" value="{$showSubAddonslist[subaddon].menu_addonid}" />
							<div class="form-group">
                                <div class="col-sm-3">				
        							{if $showSubAddonslist[subaddon].menu_categoryoption neq 'pizza'}
        								<div class="checkbox-inline checkbox checkbox-primary">
        									<input type="checkbox" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonsname]" id="{$showSubAddonslist[subaddon].addonsname|stripslashes}" value="{$showSubAddonslist[subaddon].id}" {if $showSubAddonslist[subaddon].id eq $showSubAddonslist[subaddon].addonid}checked="checked"{/if} class=""/>
        									<label for="{$showSubAddonslist[subaddon].addonsname|stripslashes}">{$showSubAddonslist[subaddon].addonsname|ucfirst|stripslashes}</label>
        								</div>
        							{else}
                                    	<label class="checkbox-inline">
        								    <input type="hidden" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonsname]" id="{$showSubAddonslist[subaddon].addonsname|stripslashes}" value="{$showSubAddonslist[subaddon].id}" class="" />{$showSubAddonslist[subaddon].addonsname|ucfirst|stripslashes}
                                        </label>
        							{/if}
	                           </div>
                               <div class="col-sm-3">
                                  <div class="radio-inline radio">	
								    	<input type="radio" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" id="free_[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" value="Free" onclick="addonsfreeoption('{$showSubAddonslist[subaddon].id}','{$menudet.0.sizeoption}');" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free'}checked="checked"{/if} class=""/>
								    	<label for="free_[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]">Free</label>
                                	</div> 
								   <div class="radio-inline radio">				
								    	<input type="radio" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" id="paid_[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]" value="Paid" onclick="addonspaidoption('{$showSubAddonslist[subaddon].id}','{$menudet.0.sizeoption}');" {if $showSubAddonslist[subaddon].menupriceoption eq 'Paid'}checked="checked"{elseif $showSubAddonslist[subaddon].menupriceoption neq 'Free'}checked="checked"{/if} class="inputCheck"/>
								    	<label for="paid_[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addonspriceoption]">Paid</label>
                                    </div>
                                </div>
                                												
								<div class="col-sm-5">	
                          			<!--Fixed option's addons price-->												
    												
                                    <div id="showprice_{$showSubAddonslist[subaddon].id}_fixed" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $menudet.0.sizeoption neq 'fixed'} style="display:none;" {/if} class="showprice_fixed priceSpan flt">
                                        <input class="form-control numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_fixed]" id="addonsprice" value="{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Fixed{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Fixed{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice|stripslashes}{else}Fixed{/if}';"/>			
    									{*<input class="paidTxtBox" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_medium]" id="addonsprice_medium" value="{if $showSubAddonslist[subaddon].menuaddons_price_medium eq 0.00}Medium{else}{$showSubAddonslist[subaddon].menuaddons_price_medium}{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuaddons_price_medium neq '0.00'}{$showSubAddonslist[subaddon].menuaddons_price_medium}{else}Medium{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuaddons_price_medium neq ''}{$showSubAddonslist[subaddon].menuaddons_price_medium|stripslashes}{else}Medium{/if}';" />
    									<input class="paidTxtBox" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_large]" id="addonsprice_large" value="{if $showSubAddonslist[subaddon].menuaddons_price_large eq 0.00}Large{else}{$showSubAddonslist[subaddon].menuaddons_price_large}{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuaddons_price_large neq '0.00'}{$showSubAddonslist[subaddon].menuaddons_price_large}{else}Large{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuaddons_price_large neq ''}{$showSubAddonslist[subaddon].menuaddons_price_large|stripslashes}{else}Large{/if}';" />*}
    								</div>						
    												
    								<!--Size option's addons price-->
    								<div id="showprice_{$showSubAddonslist[subaddon].id}_size" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $menudet.0.sizeoption neq 'size'} style="display:none;" {/if} class="showprice_size priceSpan flt">
    								    <div class="col-sm-4">
   									    	<input class="form-control numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_size]" id="addonsprice" value="{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Small{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Small{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice|stripslashes}{else}Small{/if}';"/>
                                        </div>
                                        <div class="col-sm-4">
    										<input class="form-control numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_medium_size]" id="addonsprice_medium" value="{if $showSubAddonslist[subaddon].menuaddons_price_medium neq ''}{$showSubAddonslist[subaddon].menuaddons_price_medium}{else}Medium{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuaddons_price_medium neq ''}{$showSubAddonslist[subaddon].menuaddons_price_medium}{else}Medium{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuaddons_price_medium neq ''}{$showSubAddonslist[subaddon].menuaddons_price_medium|stripslashes}{else}Medium{/if}';" />
                                        </div>
                                        <div class="col-sm-4">
    										<input class="form-control numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][addons_price_large_size]" id="addonsprice_large" value="{if $showSubAddonslist[subaddon].menuaddons_price_large neq ''}{$showSubAddonslist[subaddon].menuaddons_price_large}{else}Large{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuaddons_price_large neq ''}{$showSubAddonslist[subaddon].menuaddons_price_large}{else}Large{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuaddons_price_large neq ''}{$showSubAddonslist[subaddon].menuaddons_price_large|stripslashes}{else}Large{/if}';" />
    								    </div>
    								</div>
												
									<!--Slice options addons price-->
									<div id="showprice_{$showSubAddonslist[subaddon].id}_slice" {if $showSubAddonslist[subaddon].menupriceoption eq 'Free' or $menudet.0.sizeoption neq 'slice'} style="display:none;" {/if} class="priceSpan showprice_slice flt">
									
										<input type="hidden" name="subaddonindex" id="subaddonindex" value="{$smarty.section.subaddon.index}" />
										<input type="hidden" name="mainaddonindex" id="mainaddonindex" value="{$smarty.section.addon.index}" />	
                                        
										{if $showSubAddonslist[subaddon].menuaddons_price_slice neq ''}
											{assign var='sliceaddonprice_arr' value=$objSite->getSliceAddonsPrice($showSubAddonslist[subaddon].menuaddons_price_slice)}	
											{section name=slice1 loop=$sliceaddonprice_arr}
											{assign var=sliceList value=$smarty.section.slice1.index}
                                            
                                            <div class="col-sm-4 marBtm5">
											 <input class="form-control numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][{$smarty.section.slice1.index}][addons_price_slice]" id="addonsprice_slice" value="{if $sliceaddonprice_arr[slice1] neq ''}{$sliceaddonprice_arr[slice1]}{else}Price{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Price{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice|stripslashes}{else}Price{/if}';"/>
                                            </div>			
											{/section}										
										{else}											
											{section name=slice1 loop=$cntSliceAddons}
											{assign var=sliceList value=$smarty.section.slice1.index}
                                            <div class="col-sm-4 marBtm5">
											 <input class="form-control numericfield" type="text" name="mainaddons[{$smarty.section.addon.index}][addons][{$smarty.section.subaddon.index}][{$smarty.section.slice1.index}][addons_price_slice]" id="addonsprice_slice" value="{if $cntSliceAddons[slice1] neq ''}{$sliceaddonprice_arr[slice1]}{else}Price{/if}"  onfocus="if (this.value == '{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice}{else}Price{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $showSubAddonslist[subaddon].menuprice neq ''}{$showSubAddonslist[subaddon].menuprice|stripslashes}{else}Price{/if}';"/>
                                            </div>
											{/section}
										{/if}
										<input type="hidden" name="slicemoreprice_countperslice" class="slicemoreprice_countperslice" id="slicemoreprice_countperslice_{$smarty.section.addon.index}_{$smarty.section.subaddon.index}" value="" />
										
										<span class="slicemoreprice" id="slicemoreprice_{$smarty.section.addon.index}_{$smarty.section.subaddon.index}"></span>																																		 
									</div>
								</div>
								{*------------- Remove Existing addons -----------------*}
                                {if $showSubAddonslist[subaddon].menu_addonid neq '' and $menuid neq ''}
                                <div class="col-sm-1">
								    <span onclick="return removeAddon({$showAddonslist[addon].id},{$showSubAddonslist[subaddon].category_id},{$showSubAddonslist[subaddon].addonid},{$showSubAddonslist[subaddon].menu_addonid},{$showSubAddonslist[subaddon].restaurant_id},'{$showSubAddonslist[subaddon].addonsname|addslashes}');" class="btn btn-danger btn-icon"><i class="fa fa-close"></i></span>
                                </div>
                                {/if}
										
                            </div>									
						{/section}
							
						</div>
							
						{/if}
					{/section}
					<input type="hidden" id="total" value="{$smarty.section.addon.total}" />
				
					</div>
					<div id="createbuttondiv" class="addtoCartInnerNew1"></div>					
					
					{if $menudet.0.menu_addons neq 'No' and $smarty.get.eid neq ''}
    				    <div class="col-sm-4 col-sm-offset-4">	
                            <a onclick="addCreateMoreAddons_first();"  class="btn btn-success" id="madAddons_first">Create Addons</a>
                        </div>
                    {/if}
					
				</div>
        </div>
                
{/if}
{*-----------------------------DELETE ADDONS----------------------------*}

{*------------------- DELETE ADDONS --------------------------------*}


{*####################################### NEW IMPLEMENTATION ############################*}
{*--------------Price Field Validation----------------*}
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

{*------------------- Restaurant Details Show Per Page--------------------
{if $action eq 'restaurantDetailsShowPerPage'}
	{include file="$Tab.tpl"}
{/if}*}

