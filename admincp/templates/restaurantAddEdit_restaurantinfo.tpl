	{* -------------- Restaurant Logo - ------------------ *}
	{*<div class="mandatoryField"><span class="color1">*</span> - Mandatory Fields</div>*}
	{*<div class="form-group">
		<label class="control-label col-sm-2 font-normal">Restaurant Logo </label>
		<div class="col-sm-5">
			<input class="fileUpload" type="file" name="restaurant_logo" id="restaurant_logo" size="25" style="display:none;" />
            <label for="restaurant_logo" class="btn btn-default btn-sm valigntop" >
                 <i class="fa fa-folder-open"></i> Add Restaurant Logo		
            </label>
			<div class="tooltip"><div class="HelpButton">?</div><span>Upload restaurant logo</span></div>
			<div id="resLogoErr"></div>
			{if $smarty.get.eid neq '' and $restaurantEditList.0.restaurant_logo neq ''}
			<div id="res_logo1">
				<div class="photoContainer" >
					<img src="{$SITE_IMAGE_RESTAURANT_URL}/logo/{$restaurantEditList.0.restaurant_logo}" alt="image" >
                    <a href="javascript:void(0);" id="restaurantlogo1" onclick="deletelogo('{$smarty.get.eid}');" class="upload-cls btn btn-sm btn-icon btn-rounded"><i class="fa fa-close"></i></a>
				</div>	
			</div>
            {/if}
        </div>   
	</div>	*}
	{* --------------- About Restaurant --------------- *}
	<div class="form-group">
		<span class="control-label col-sm-2 font-normal">About Restaurant </span>
		<div class="col-sm-5">
    		<textarea class="form-control" rows="5" name="restaurant_description" id="restaurant_description" />{$restaurantEditList.0.restaurant_description|stripslashes}</textarea>
    		<div class="tooltip"><div class="HelpButton">?</div><span>Enter details about restaurant</span></div>
    		<span id="resAbtResErr"></span>
        </div>
	</div>
	
	{* ---------------Restaurant Pickup --------------- *}
	<div class="form-group">
		<span class="control-label col-sm-2 font-normal">Pickup </span>
		<div class="col-sm-5">
    		<div class="radio-inline radio">
                <input class="" type="radio" name="restaurant_pickup" id="restaurant_pickup_yes" value="Yes" {if $smarty.get.eid neq ''}  {if $restaurantEditList.0.restaurant_pickup eq 'Yes'} checked="checked" {/if} {else}checked="checked" {/if}/>
                <label for="restaurant_pickup_yes">Yes</label>
            </div> 
            <div class="radio-inline radio">
                <input class="" type="radio" name="restaurant_pickup" id="restaurant_pickup_no" value="No" {if $restaurantEditList.0.restaurant_pickup eq 'No'} checked="checked" {/if} />
                <label for="restaurant_pickup_no">No</label>
            </div>
        </div>
	</div>
	
	{* --------------- Restaurant Book Table--------------- *}
	<div class="form-group">
		<span class="control-label col-sm-2 font-normal">Book Table </span>
		<div class="col-sm-5">
            <div class="radio-inline radio">
        		<input class="" type="radio" name="restaurant_booktable" id="restaurant_booktable_yes" value="Yes" {if $smarty.get.eid neq ''}  {if $restaurantEditList.0.restaurant_booktable eq 'Yes'} checked="checked" {/if} {else}checked="checked" {/if}/>
                <label for="restaurant_booktable_yes">Yes</label>
            </div>
            <div class="radio-inline radio">
                <input class="" type="radio" name="restaurant_booktable" id="restaurant_booktable_no" value="No" {if $restaurantEditList.0.restaurant_booktable eq 'No'} checked="checked" {/if} />
                <label for="restaurant_booktable_no">No</label>
            </div>
        </div>
	</div>
	
	{* --------------- Restaurant Delivery Hrs --------------- *}
	<div class="form-group">
		<span class="control-label col-sm-2 font-normal">Opening &amp; Closing Time </span>
		{*<input class="textbox" type="text" name="restaurant_delivery_hrs" id="restaurant_delivery_hrs" value="" />*}
		<div class="col-sm-10">
			<span class="DeliveryHrsInfo col-sm-3">
                <span class="contain center marBtm5">Opening Time</span>
                <span class="contain center">
    				<label class="DeliverHrs_Font btn btn-default" for="selectopen">
    					<input type="checkbox" id="selectopen" onclick="selectAllOpeningTime();" style="display:none;"/>Select All
    				</label>
                </span>
				<span id="resSelectAllOpenErr"></span>
			</span>
			<span class="DeliveryHrsInfo col-sm-3">
                <span class="contain center marBtm5">Closing Time</span>
                <span class="contain center">
    				<label class="DeliverHrs_Font btn btn-default" for="selectclose">
    					<input type="checkbox" id="selectclose" onclick="selectAllCloseingTime();" style="display:none;"/>Select All
    				</label>
                </span>
				<span id="resSelectAllCloseErr"></span>
			</span>
			<span class="DeliveryHrsInfo col-sm-3">
                <span class="contain center marBtm5">Second Opening Time</span>
                <span class="contain center">
    				<label class="DeliverHrs_Font btn btn-default" for="selectsecondopen">
    					<input type="checkbox" id="selectsecondopen" onclick="selectAllSecondOpeningTime();" style="display:none;"/>Select All
    				</label>
                </span>
				<span id="resSelectAllSecondOpenErr"></span>
			</span>
			<span class="DeliveryHrsInfo col-sm-3">
                <span class="contain center marBtm5">Second Closing Time</span>
                <span class="contain center">
    				<label class="DeliverHrs_Font btn btn-default" for="selectsecondclose">
    					<input type="checkbox" id="selectsecondclose" onclick="selectAllSecondCloseingTime();" style="display:none;"/>Select All
    				</label>
                </span>
				<span id="resSelectAllSecondCloseErr"></span>
			</span>
		
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
		<span class="DeliverHrs_Font"><b>Note</b> : Your Restaurant is closed in particular day , Please select time <b> 00:00 </b></span>
        </div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-2">	
			<div class="col-sm-12 control-label margin_btm22">Monday</div>
			<div class="col-sm-12 control-label margin_btm22">Tuesday</div>
			<div class="col-sm-12 control-label margin_btm22">Wednesday</div>
			<div class="col-sm-12 control-label margin_btm22">Thursday</div>
			<div class="col-sm-12 control-label margin_btm22">Friday</div>
			<div class="col-sm-12 control-label margin_btm22">Saturday</div>
			<div class="col-sm-12 control-label margin_btm22">Sunday</div>
		</div>
		<div class="col-sm-10">
			<div class="col-sm-3 no-padding">
				<span class="DeliveryHrs">
					<select class="selectpicker" data-width="65px" name="restaurant_delivery_mon_open_hr" id="restaurant_delivery_mon_open_hr" onchange="changemonvalopen();">
						<option value="">Hrs</option>
						{$HOURS_LIST_MON}
					</select>
					<select class="selectpicker" data-width="65px" name="restaurant_delivery_mon_open_min" id="restaurant_delivery_mon_open_min" onchange="changemonvalopen();">
						<option value="">Mins</option>
						{$MINUTES_LIST_MON}
					</select>
					<select class="selectpicker" data-width="65px" name="restaurant_delivery_mon_open_sess" id="restaurant_delivery_mon_open_sess">
						<option value="AM" {if $monopentimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
						<option value="PM" {if $monopentimesess eq 'PM'}selected="selected"{/if}>PM</option>
					</select>
				</span>
				<span id="selectallopentime">
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_tue_open_hr" id="restaurant_delivery_tue_open_hr">
							<option value="">Hrs</option>
							{$HOURS_LIST_TUE}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_tue_open_min" id="restaurant_delivery_tue_open_min">
							<option value="">Mins</option>
							{$MINUTES_LIST_TUE}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_tue_open_sess" id="restaurant_delivery_tue_open_sess">
							<option value="AM" {if $tueopentimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $tueopentimesess eq 'PM'}selected="selected"{/if}>PM</option>
						</select>
					</span>
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_wed_open_hr" id="restaurant_delivery_wed_open_hr">
							<option value="">Hrs</option>
							{$HOURS_LIST_WED}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_wed_open_min" id="restaurant_delivery_wed_open_min">
							<option value="">Mins</option>
							{$MINUTES_LIST_WED}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_wed_open_sess" id="restaurant_delivery_wed_open_sess">
							<option value="AM" {if $wedopentimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $wedopentimesess eq 'PM'}selected="selected"{/if}>PM</option>
						</select>
					</span>
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_thu_open_hr" id="restaurant_delivery_thu_open_hr">
							<option value="">Hrs</option>
							{$HOURS_LIST_THU}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_thu_open_min" id="restaurant_delivery_thu_open_min">
							<option value="">Mins</option>
							{$MINUTES_LIST_THU}
						</select>
						<select class="selectpicker" data-width="65px"   name="restaurant_delivery_thu_open_sess" id="restaurant_delivery_thu_open_sess">
							<option value="AM" {if $thuopentimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $thuopentimesess eq 'PM'}selected="selected"{/if}>PM</option>
						</select>
					</span>
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_fri_open_hr" id="restaurant_delivery_fri_open_hr">
							<option value="">Hrs</option>
							{$HOURS_LIST_FRI}
						</select>
						<select class="selectpicker"  data-width="65px" name="restaurant_delivery_fri_open_min" id="restaurant_delivery_fri_open_min">
							<option value="">Mins</option>
							{$MINUTES_LIST_FRI}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_fri_open_sess" id="restaurant_delivery_fri_open_sess">
							<option value="AM" {if $friopentimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $friopentimesess eq 'PM'}selected="selected"{/if}>PM</option>
						</select>
					</span>
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_sat_open_hr" id="restaurant_delivery_sat_open_hr">
							<option value="">Hrs</option>
							{$HOURS_LIST_SAT}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_sat_open_min" id="restaurant_delivery_sat_open_min">
							<option value="">Mins</option>
							{$MINUTES_LIST_SAT}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_sat_open_sess" id="restaurant_delivery_sat_open_sess">
							<option value="AM" {if $satopentimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $satopentimesess eq 'PM'}selected="selected"{/if}>PM</option>
						</select>
					</span>
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_sun_open_hr" id="restaurant_delivery_sun_open_hr">
							<option value="">Hrs</option>
							{$HOURS_LIST_SUN}
						</select>
						<select class="selectpicker"  data-width="65px" name="restaurant_delivery_sun_open_min" id="restaurant_delivery_sun_open_min">
							<option value="">Mins</option>
							{$MINUTES_LIST_SUN}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_sun_open_sess" id="restaurant_delivery_sun_open_sess">
							<option value="AM" {if $sunopentimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $sunopentimesess eq 'PM'}selected="selected"{/if}>PM</option>
						</select>
					</span>
				</span>
			</div>
			<div class="col-sm-3 no-padding">
				<span class="DeliveryHrs">
					<select class="selectpicker" data-width="65px" name="restaurant_delivery_mon_close_hr" id="restaurant_delivery_mon_close_hr" onchange="changemonvalclose();">
						<option value="">Hrs</option>
						{$HOURS_LIST_CLOSE_MON}
					</select>
					<select class="selectpicker" data-width="65px" name="restaurant_delivery_mon_close_min" id="restaurant_delivery_mon_close_min" onchange="changemonvalclose();">
						<option value="">Mins</option>
						{$MINUTES_LIST_CLOSE_MON}
					</select>
					<select class="selectpicker" data-width="65px" name="restaurant_delivery_mon_close_sess" id="restaurant_delivery_mon_close_sess">
						<option value="AM" {if $monclosetimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
						<option value="PM" {if $monclosetimesess eq 'PM'}selected="selected"{elseif $monclosetimesess neq 'AM'}selected="selecetd"{/if}>PM</option>
					</select>
					<span class="resEstTimeMonErr1 errorTime" id="resEstTimeMonErr"></span>
				</span>
				<span id="selectallclosetime">
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_tue_close_hr" id="restaurant_delivery_tue_close_hr">
							<option value="">Hrs</option>
								{$HOURS_LIST_CLOSE_TUE}
						</select> 
						<select class=" selectpicker" data-width="65px" name="restaurant_delivery_tue_close_min" id="restaurant_delivery_tue_close_min">
							<option value="">Mins</option>
								{$MINUTES_LIST_CLOSE_TUE}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_tue_close_sess" id="restaurant_delivery_tue_close_sess">
							<option value="AM" {if $tueclosetimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $tueclosetimesess eq 'PM'}selected="selected"{elseif $tueclosetimesess neq 'AM'}selected="selecetd"{/if}>PM</option>
						</select>
						<span class="resEstTimeTueErr1 errorTime" id="resEstTimeTueErr"></span>			
					</span>
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_wed_close_hr" id="restaurant_delivery_wed_close_hr">
							<option value="">Hrs</option>
							{$HOURS_LIST_CLOSE_WED}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_wed_close_min" id="restaurant_delivery_wed_close_min">
							<option value="">Mins</option>
							{$MINUTES_LIST_CLOSE_WED}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_wed_close_sess" id="restaurant_delivery_wed_close_sess">
							<option value="AM" {if $wedclosetimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $wedclosetimesess eq 'PM'}selected="selected"{elseif $wedclosetimesess neq 'AM'}selected="selecetd"{/if}>PM</option>
						</select>
						<span class="resEstTimeWedErr1 errorTime" id="resEstTimeWedErr"></span>
					</span>
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_thu_close_hr" id="restaurant_delivery_thu_close_hr">
							<option value="">Hrs</option>
							{$HOURS_LIST_CLOSE_THU}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_thu_close_min" id="restaurant_delivery_thu_close_min">
							<option value="">Mins</option>
							{$MINUTES_LIST_CLOSE_THU}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_thu_close_sess" id="restaurant_delivery_thu_close_sess">
							<option value="AM" {if $thuclosetimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $thuclosetimesess eq 'PM'}selected="selected"{elseif $thuclosetimesess neq 'AM'}selected="selecetd"{/if}>PM</option>
						</select>
						<span class="resEstTimeThuErr1 errorTime" id="resEstTimeThuErr"></span>	
					</span>
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_fri_close_hr" id="restaurant_delivery_fri_close_hr">
							<option value="">Hrs</option>
							{$HOURS_LIST_CLOSE_FRI}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_fri_close_min" id="restaurant_delivery_fri_close_min">
							<option value="">Mins</option>
							{$MINUTES_LIST_CLOSE_FRI}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_fri_close_sess" id="restaurant_delivery_fri_close_sess">
							<option value="AM" {if $friclosetimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $friclosetimesess eq 'PM'}selected="selected"{elseif $friclosetimesess neq 'AM'}selected="selecetd"{/if}>PM</option>
						</select>
						<span class="resEstTimeFriErr1 errorTime" id="resEstTimeFriErr"></span>
					</span>
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_sat_close_hr" id="restaurant_delivery_sat_close_hr">
							<option value="">Hrs</option>
							{$HOURS_LIST_CLOSE_SAT}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_sat_close_min" id="restaurant_delivery_sat_close_min">
							<option value="">Mins</option>
							{$MINUTES_LIST_CLOSE_SAT}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_sat_close_sess" id="restaurant_delivery_sat_close_sess">
							<option value="AM" {if $satclosetimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $satclosetimesess eq 'PM'}selected="selected"{elseif $satclosetimesess neq 'AM'}selected="selecetd"{/if}>PM</option>
						</select>
						<span class="resEstTimeSatErr1 errorTime" id="resEstTimeSatErr"></span>
					</span>
                    
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_sun_close_hr" id="restaurant_delivery_sun_close_hr">
							<option value="">Hrs</option>
							{$HOURS_LIST_CLOSE_SUN}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_sun_close_min" id="restaurant_delivery_sun_close_min">
							<option value="">Mins</option>
							{$MINUTES_LIST_CLOSE_SUN}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_sun_close_sess" id="restaurant_delivery_sun_close_sess">
							<option value="AM" {if $sunclosetimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $sunclosetimesess eq 'PM'}selected="selected"{elseif $sunclosetimesess neq 'AM'}selected="selecetd"{/if}>PM</option>
						</select>
						<span class="resEstTimeSunErr1 errorTime" id="resEstTimeSunErr"></span>
					</span>
				</span>
			</div>
			{*-----------------------------------Second Open and Close time------------------------------*}
			<!--Second Open time-->
			<div class="col-sm-3 no-padding">
				<span class="DeliveryHrs">
					<select class="selectpicker" data-width="65px" name="restaurant_delivery_mon_open_hr_second" id="restaurant_delivery_mon_open_hr_second" onchange="changemonvalopen();">
						<option value="">Hrs</option>
						{$HOURS_LIST_MON_SEC}
					</select>
					<select class="selectpicker" data-width="65px" name="restaurant_delivery_mon_open_min_second" id="restaurant_delivery_mon_open_min_second" onchange="changemonvalopen();">
						<option value="">Mins</option>
						{$MINUTES_LIST_MON_SEC}
					</select>
					<select class="selectpicker" data-width="65px" name="restaurant_delivery_mon_open_sess_second" id="restaurant_delivery_mon_open_sess_second">
						<option value="AM" {if $monsecondopentimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
						<option value="PM" {if $monsecondopentimesess eq 'PM'}selected="selected"{/if}>PM</option>
					</select>
				</span>
				<span id="selectallopentime">
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_tue_open_hr_second" id="restaurant_delivery_tue_open_hr_second">
							<option value="">Hrs</option>
							{$HOURS_LIST_TUE_SEC}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_tue_open_min_second" id="restaurant_delivery_tue_open_min_second">
							<option value="">Mins</option>
							{$MINUTES_LIST_TUE_SEC}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_tue_open_sess_second" id="restaurant_delivery_tue_open_sess_second">
							<option value="AM" {if $tuesecondopentimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $tuesecondopentimesess eq 'PM'}selected="selected"{/if}>PM</option>
						</select>
					</span>  
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_wed_open_hr_second" id="restaurant_delivery_wed_open_hr_second">
							<option value="">Hrs</option>
							{$HOURS_LIST_WED_SEC}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_wed_open_min_second" id="restaurant_delivery_wed_open_min_second">
							<option value="">Mins</option>
							{$MINUTES_LIST_WED_SEC}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_wed_open_sess_second" id="restaurant_delivery_wed_open_sess_second">
							<option value="AM" {if $wedsecondopentimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $wedsecondopentimesess eq 'PM'}selected="selected"{/if}>PM</option>
						</select>
					</span>  
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_thu_open_hr_second" id="restaurant_delivery_thu_open_hr_second">
							<option value="">Hrs</option>
							{$HOURS_LIST_THU_SEC}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_thu_open_min_second" id="restaurant_delivery_thu_open_min_second">
							<option value="">Mins</option>
							{$MINUTES_LIST_THU_SEC}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_thu_open_sess_second" id="restaurant_delivery_thu_open_sess_second">
							<option value="AM" {if $thusecondopentimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $thusecondopentimesess eq 'PM'}selected="selected"{/if}>PM</option>
						</select>
					</span>  
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_fri_open_hr_second" id="restaurant_delivery_fri_open_hr_second">
							<option value="">Hrs</option>
							{$HOURS_LIST_FRI_SEC}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_fri_open_min_second" id="restaurant_delivery_fri_open_min_second">
							<option value="">Mins</option>
							{$MINUTES_LIST_FRI_SEC}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_fri_open_sess_second" id="restaurant_delivery_fri_open_sess_second">
							<option value="AM" {if $frisecondopentimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $frisecondopentimesess eq 'PM'}selected="selected"{/if}>PM</option>
						</select>
					</span>
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_sat_open_hr_second" id="restaurant_delivery_sat_open_hr_second">
							<option value="">Hrs</option>
							{$HOURS_LIST_SAT_SEC}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_sat_open_min_second" id="restaurant_delivery_sat_open_min_second">
							<option value="">Mins</option>
							{$MINUTES_LIST_SAT_SEC}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_sat_open_sess_second" id="restaurant_delivery_sat_open_sess_second">
							<option value="AM" {if $satsecondopentimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $satsecondopentimesess eq 'PM'}selected="selected"{/if}>PM</option>
						</select>
					</span>
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_sun_open_hr_second" id="restaurant_delivery_sun_open_hr_second">
							<option value="">Hrs</option>
							{$HOURS_LIST_SUN_SEC}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_sun_open_min_second" id="restaurant_delivery_sun_open_min_second">
							<option value="">Mins</option>
							{$MINUTES_LIST_SUN_SEC}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_sun_open_sess_second" id="restaurant_delivery_sun_open_sess_second">
							<option value="AM" {if $sunsecondopentimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $sunsecondopentimesess eq 'PM'}selected="selected"{/if}>PM</option>
						</select>
					</span>
				</span>
			</div>		
			<!--second open time-->
			
			<!--second Close time-->
			<div class="col-sm-3 no-padding">
				<span class="DeliveryHrs">
					<select class="selectpicker" data-width="65px" name="restaurant_delivery_mon_close_hr_second" id="restaurant_delivery_mon_close_hr_second" onchange="changemonvalclose();">
						<option value="">Hrs</option>
						{$HOURS_LIST_CLOSE_MON_SEC}
					</select>
					<select class="selectpicker" data-width="65px" name="restaurant_delivery_mon_close_min_second" id="restaurant_delivery_mon_close_min_second" onchange="changemonvalclose();">
						<option value="">Mins</option>
						{$MINUTES_LIST_CLOSE_MON_SEC}
					</select>
					<select class="selectpicker" data-width="65px" name="restaurant_delivery_mon_close_sess_second" id="restaurant_delivery_mon_close_sess_second" >
						<option value="AM" {if $monsecondclosetimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
						<option value="PM" {if $monsecondclosetimesess eq 'PM'}selected="selected"{/if}>PM</option>
					</select>
					<span class="resEstTimeMonErr1 errorTime" id="resEstTimeMonSECErr"></span>
				</span>
				<span id="selectallclosetime">
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px"  name="restaurant_delivery_tue_close_hr_second" id="restaurant_delivery_tue_close_hr_second">
							<option value="">Hrs</option>
								{$HOURS_LIST_CLOSE_TUE_SEC}
						</select>
						<select class="selectpicker" data-width="65px"  name="restaurant_delivery_tue_close_min_second" id="restaurant_delivery_tue_close_min_second">
							<option value="">Mins</option>
								{$MINUTES_LIST_CLOSE_TUE_SEC}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_tue_close_sess_second" id="restaurant_delivery_tue_close_sess_second">
							<option value="AM" {if $tuesecondclosetimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $tuesecondclosetimesess eq 'PM'}selected="selected"{/if}>PM</option>
						</select>
						<span class="resEstTimeTueErr1 errorTime" id="resEstTimeTueSECErr"></span>			
					</span>
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_wed_close_hr_second" id="restaurant_delivery_wed_close_hr_second">
							<option value="">Hrs</option>
							{$HOURS_LIST_CLOSE_WED_SEC}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_wed_close_min_second" id="restaurant_delivery_wed_close_min_second">
							<option value="">Mins</option>
							{$MINUTES_LIST_CLOSE_WED_SEC}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_wed_close_sess_second" id="restaurant_delivery_wed_close_sess_second">
							<option value="AM" {if $wedsecondclosetimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $wedsecondclosetimesess eq 'PM'}selected="selected"{/if}>PM</option>
						</select>
						<span class="resEstTimeWedErr1 errorTime" id="resEstTimeWedSECErr"></span>
					</span>
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_thu_close_hr_second" id="restaurant_delivery_thu_close_hr_second">
							<option value="">Hrs</option>
							{$HOURS_LIST_CLOSE_THU_SEC}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_thu_close_min_second" id="restaurant_delivery_thu_close_min_second">
							<option value="">Mins</option>
							{$MINUTES_LIST_CLOSE_THU_SEC}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_thu_close_sess_second" id="restaurant_delivery_thu_close_sess_second">
							<option value="AM" {if $thusecondclosetimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $thusecondclosetimesess eq 'PM'}selected="selected"{/if}>PM</option>
						</select>
						<span class="resEstTimeThuErr1 errorTime" id="resEstTimeThuSECErr"></span>	
					</span>
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_fri_close_hr_second" id="restaurant_delivery_fri_close_hr_second">
							<option value="">Hrs</option>
							{$HOURS_LIST_CLOSE_FRI_SEC}
						</select>
						<select class="selectpicker" data-width="65px"  name="restaurant_delivery_fri_close_min_second" id="restaurant_delivery_fri_close_min_second">
							<option value="">Mins</option>
							{$MINUTES_LIST_CLOSE_FRI_SEC}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_fri_close_sess_second" id="restaurant_delivery_fri_close_sess_second">
							<option value="AM" {if $frisecondclosetimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $frisecondclosetimesess eq 'PM'}selected="selected"{/if}>PM</option>
						</select>
						<span class="resEstTimeFriErr1 errorTime" id="resEstTimeFriSECErr"></span>
					</span>
					<span class="DeliveryHrs">
						<select class="selectpicker"  data-width="65px" name="restaurant_delivery_sat_close_hr_second" id="restaurant_delivery_sat_close_hr_second">
							<option value="">Hrs</option>
							{$HOURS_LIST_CLOSE_SAT_SEC}
						</select>
						<select class="selectpicker" data-width="65px"  name="restaurant_delivery_sat_close_min_second" id="restaurant_delivery_sat_close_min_second">
							<option value="">Mins</option>
							{$MINUTES_LIST_CLOSE_SAT_SEC}
						</select>
						<select class="selectpicker" data-width="65px"  name="restaurant_delivery_sat_close_sess_second" id="restaurant_delivery_sat_close_sess_second">
							<option value="AM" {if $satsecondclosetimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $satsecondclosetimesess eq 'PM'}selected="selected"{/if}>PM</option>
						</select>
						<span class="resEstTimeSatErr1 errorTime" id="resEstTimeSatSECErr"></span>
					</span>
					<span class="DeliveryHrs">
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_sun_close_hr_second" id="restaurant_delivery_sun_close_hr_second">
							<option value="">Hrs</option>
							{$HOURS_LIST_CLOSE_SUN_SEC}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_sun_close_min_second" id="restaurant_delivery_sun_close_min_second">
							<option value="">Mins</option>
							{$MINUTES_LIST_CLOSE_SUN_SEC}
						</select>
						<select class="selectpicker" data-width="65px" name="restaurant_delivery_sun_close_sess_second" id="restaurant_delivery_sun_close_sess_second">
							<option value="AM" {if $sunsecondclosetimesess eq 'AM'}selected="selected"{/if}>AM</option> <!--Testing Validation-->
							<option value="PM" {if $sunsecondclosetimesess eq 'PM'}selected="selected"{/if}>PM</option>
						</select>
						<span class="resEstTimeSunErr1 errorTime" id="resEstTimeSunSECErr"></span>
					</span>
				</span>
			</div>		
			<!--second Close time-->
		
		</div>
		
	</div>
	{*  ------------- Restaurant Delivery Areas--   -------------- *}
	{*<div class="addPageCont">
		<span class="addPageRightFont">Delivery Areas <span class="color1">*</span></span>
		<span class="colon1">:</span>
		<select class="multipleselectbx" name="restaurant_delivery_areas[]" id="restaurant_delivery_areas" multiple="multiple" size="16">
			{assign var="getdeliveryareas" value=","|explode:$restaurantEditList.0.restaurant_delivery_areas}
			{section name=arealist loop=$showDeliveryAreasList}
			<option value="{$showDeliveryAreasList[arealist].zipcode_id}" {foreach from=$getdeliveryareas item=areasid}{if $areasid eq $showDeliveryAreasList[arealist].zipcode_id}selected="selected"{/if}{/foreach} >{$showDeliveryAreasList[arealist].areaname|stripslashes}</option>
			{/section}
		</select>
		<span id="resDeliAreErr"></span>	
	</div>*}
	
	{*  ------------- Restaurant Delivery Charge   -------------- *}
	{*<div class="addPageCont">
		<span class="addPageRightFont">Delivery Charge <span class="color1">*</span></span>
		<span class="colon1">:</span>
		<input class="textbox" type="text" name="restaurant_delivery_charge" id="restaurant_delivery_charge" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_delivery_charge|stripslashes}{else}0.00{/if}" {if $smarty.get.eid eq ''} onfocus="this.value=''" {/if}  />
		<div class="tooltip"><div class="HelpButton">?</div><span>Enter restaurant dlivery charge</span></div>
		<span id="resDeliChgErr"></span>
	</div>*}
	
	{* --------------  Restaurant Minimumorder Price--------------- *}
	<div class="form-group">
		<span class="control-label col-sm-2 font-normal">Min Order </span>
		<div class="col-sm-5">
		<input class="form-control" type="text" name="restaurant_minorder_price" id="restaurant_minorder_price" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_minorder_price|stripslashes}{/if}" />
		<div class="tooltip"><div class="HelpButton">?</div><span>Enter restaurant minimum order price</span></div>
		<span id="resMinOrdErr"></span>
        </div>	
	</div>
	
	{* -------------- Restaurant Salestax --------------- *}
	<div class="form-group">
		<span class="control-label col-sm-2 font-normal">Sales Tax(%) </span>
		<div class="col-sm-5">
    		<input class="form-control" type="text" name="restaurant_salestax" id="restaurant_salestax" value="{if $smarty.get.eid neq ''}{$restaurantEditList.0.restaurant_salestax|stripslashes}{/if}" />
    		<div class="tooltip"><div class="HelpButton">?</div><span>Enter restaurant salestax</span></div>
    		<span id="resSalTaxErr"></span>
        </div>
	</div>
	
	{* -------------- Restaurant Serving Cuisines --------------- *}
	<div class="form-group">
		<span class="control-label col-sm-2 font-normal">Serving Cuisines </span>
		<div class="col-sm-5">
    		<select class="form-control" name="restaurant_serving_cuisines[]" id="restaurant_serving_cuisines" multiple="multiple" size="16">
    			{assign var="getcuisine" value=","|explode:$restaurantEditList.0.restaurant_serving_cuisines}
    			{foreach from=$showcuisinelist item=cuisine}
    			<option value="{$cuisine.cuisine_id}" {foreach from=$getcuisine item=cuisineid}{if $cuisineid eq $cuisine.cuisine_id}selected="selected"{/if}{/foreach}>{$cuisine.cuisine_name}</option>
    			{/foreach}
    		</select>	
    		<div class="tooltip"><div class="HelpButton">?</div><span>Select restaurant serving cuisines</span></div>
    		<span id="resSerCuiErr"></span>
        </div>
	</div>
