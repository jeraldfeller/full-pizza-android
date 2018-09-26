
	{* -------------- Restaurant Delivery ---------- *}
	{*<div class="mandatoryField"><span class="color1">*</span> - Mandatory Fields</div> *}
	<div class="form-group">
		<span class="control-label col-sm-4 font-normal">Delivery </span>
		<div class="col-sm-4">
            <div class="radio-inline radio">
    		  <input class="radiobotton" type="radio" name="restaurant_delivery" id="restaurant_delivery_yes" value="Yes" {if $smarty.get.eid neq ''}  {if $restaurantEditList.0.restaurant_delivery eq 'Yes'} checked="checked" {/if} {else}checked="checked" {/if}/>
                <label for="restaurant_delivery_yes">Yes</label>
            </div>
            <div class="radio-inline radio">
    		  <input class="radiobotton" type="radio" name="restaurant_delivery" id="restaurant_delivery_no" value="No" {if $restaurantEditList.0.restaurant_delivery eq 'No'} checked="checked" {/if} />
                <label for="restaurant_delivery_no">No</label>
            </div>
        </div>
	</div>
	
    <div id="Deliveryinfo" {if $restaurantEditList.0.restaurant_delivery eq 'No'} style="display:none;" {/if}>
    	{* Restaurant Delivery estimated time 
    	<div class="form-group">
    		<span class="control-label col-sm-4 font-normal">Restaurant delivery estimated time </span>
    		<div class="col-sm-4">
        		<input class="form-control" type="text" name="restaurant_estimated_time" id="restaurant_estimated_time" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_estimated_time|stripslashes}{/if}" />
        		<span id="resEstTimeErr"></span>
            </div>
    	</div>*}
    	
    	{* Restaurant Delivery charge*}
    	<div class="form-group">
    		<span class="control-label col-sm-4 font-normal">Delivery Charge </span>
    		<div class="col-sm-4">
        		<input class="form-control numericfield" type="text" name="restaurant_delivery_charge" id="restaurant_delivery_charge" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_delivery_charge|stripslashes}{else}0.00{/if}" {if $smarty.get.eid eq ''} onfocus="this.value=''" {/if}  />
    		    <span id="resDeliChgErr"></span>
            </div>
    	</div>
    	
    	{* Restaurant Delivery Zone*}
    	<div class="form-group">
    		<span class="control-label col-sm-4 font-normal">Coordenadas </span>
    		<div class="col-sm-4">
        		<input class="form-control numericfield" type="text" name="restaurant_coordinates" id="restaurant_coordinates" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_lat|stripslashes},{$restaurantEditList.0.restaurant_long|stripslashes}{else}0.00{/if}" {if $smarty.get.eid eq ''} onfocus="this.value=''" {/if}  />
    		    
    		    <input id="restaurant_delivery_zone" name="restaurant_delivery_zone" type="hidden" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_delivery_zone|stripslashes}{else}0.00{/if}">
            </div>
            <div class="col-sm-2">
                	<a href="javascript:void(0);" onclick="viewMap();" class="btn btn-info" id="view_map"><i class="fa fa-search-plus"></i> refresh map</a>
            	</div>
    	</div>
    	
    		
    	
    	{* Restaurant Delivery Distance*}
    	<div class="form-group">
    		<!--<span class="control-label col-sm-4 font-normal">Delivery Distance (miles) <span class="color-red"></span></span>
    		<div class="col-sm-4">
        		<input class="form-control" type="text" name="restaurant_delivery_distance" id="restaurant_delivery_distance" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_delivery_distance|stripslashes}{/if}" {if $smarty.get.eid eq ''} onfocus="this.value=''" {/if}  />
        		<span id="restdelDistanceErr"></span>
            </div>-->
        	
    	</div>
    	
    	{*if $smarty.get.eid neq ''*}
    	{*Google Map Delivery Area*}
    	<div class="form-group" id="map_distance_show">
            <div class="col-sm-12">
        		<input type="hidden" name="restaurant_address" id="restaurant_address" value="{$restaurant_address_map}" />
        		<input type="hidden" name="rest_deliver_miles" id="rest_deliver_miles" value="{if $restaurantEditList.0.restaurant_delivery_distance neq ''}{$restaurantEditList.0.restaurant_delivery_distance|stripslashes}{else}45{/if}" />
        		<div id="map" style="height:500px;"></div>
            </div>
    	</div>
    	 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGsX2crAYxL0RPi1CMc-SWj2VaDmTjxtU&libraries=drawing"
         async defer></script>
    	{*/if*}
    </div>
	
	<!--Restaurant Delivery Areas-->
	{*	<div class="addPageCont">
		<span class="addPageRightFont">Delivery Cities </span>
		<span class="colon1">:</span>
		<select class="multipleselectbx" name="restaurant_delivery_areas[]" id="restaurant_delivery_areas" multiple="multiple" size="16">
			{assign var="getdeliveryareas" value=","|explode:$restaurantEditList.0.restaurant_delivery_areas}
			{section name=arealist loop=$showDeliveryAreasList}
			<option value="{$showDeliveryAreasList[arealist].city_id}" {foreach from=$getdeliveryareas item=areasid}{if $areasid eq $showDeliveryAreasList[arealist].city_id}selected="selected"{/if}{/foreach} >{$showDeliveryAreasList[arealist].cityname|stripslashes}</option>
			{/section}
		</select>
		<div class="tooltip"><div class="HelpButton">?</div><span>Select restaurant dlivery area</span></div>
		<spans id="resDeliAreErr"></span>
	</div>*}
	
