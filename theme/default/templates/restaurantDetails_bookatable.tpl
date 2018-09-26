<div class="searchResultInner">
	<div class="restDetInfo1Inner">
		<h1 class="bookaTabHead">{$LANG.res_details_bookingformenu}</h1>
		{*<div class="bookaTabSlots">{$LANG.res_details_bookingslots} : 11:30 AM to 12:30 PM and 2:00 PM to 3:30 PM and 6:30 PM to 7:30 PM and 9:30 PM to 10:00 PM</div>
		<div class="bookaTabSlots">{$LANG.res_details_bookingcond} : {$LANG.res_details_nobookingcond}</div>*}		
		<div class="contain">
			<h1 class="bookaTabInfoHead">{$LANG.res_details_bookinginfo}</h1>
			<form name="booking_form" id="booking_form" method="post" action="" onsubmit="return validateBooking();" class="form-horizontal">
			<input type="hidden" name="rest_id" id="rest_id" value="{$smarty.request.resid}" />
            <input type="hidden" name="bookatable" id="bookatable" value="bookatable" />
				<div class="form-group">
					<div class="col-sm-12">
						<span class="mandatoryfield pull-right"><span class="star">*</span>{$LANG.res_book_mantatory_field}</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<div id="bookingerror" class="center"></div>
					</div>
				</div>

				<div class="form-group">
					<span class="control-label col-sm-3 col-lg-2 col-md-4 col-xs-12 font-normal">{$LANG.res_details_noguests}<span class="star">*</span></span>
					<div class="col-sm-2 col-lg-1 pad0 col-xs-12 mobilecls">
						<select class="form-control" name="num_guests" id="num_guests">
							<option value="">{$LANG.res_book_select}</option>
							{$GUESTS_LIST}
						</select>
					</div>
				
					<span class="control-label col-xs-12 col-sm-3 col-md-2 col-lg-2 font-normal">{$LANG.res_details_bookingdate}<span class="star">*</span></span>	
					<div class="col-sm-4 col-lg-2 col-xs-12">
		               	<div class="input-group date dateWid">							
		                    <input type="text" class="form-control booking_date" name="booking_date" id="booking_date" value="" />
		                    <span class="input-group-addon">
						      <span class="glyphicon glyphicon-calendar"></span>
				            </span>
				        </div>
		            </div>

	                <span class="control-label col-sm-3 col-lg-1 font-normal col-xs-12 mobilemargin">{$LANG.res_details_bookingtime}<span class="star">*</span></span>
					{*<div class="col-sm-2 col-lg-1 col-xs-12 padMar0 mobilecls mobilemargin">
						<select class="form-control" name="booking_hours" id="booking_hours">
							<option value="">{$LANG.res_book_hours}</option>
							<option value="00">00</option>
							<option value="01">01</option>
							<option value="02">02</option>
							<option value="03">03</option>
							<option value="04">04</option>
							<option value="05">05</option>
							<option value="06">06</option>
							<option value="07">07</option>
							<option value="08">08</option>
							<option value="09">09</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>
					</div>
					<div class="col-sm-2 col-lg-1 col-xs-12 padMar0 mobilecls mobilemargin">
						<select class="form-control" name="booking_mins" id="booking_mins">
							<option value="">{$LANG.res_book_mins}</option>
							<option value="00">00</option>
							<option value="15">15</option>
							<option value="30">30</option>
							<option value="45">45</option>
						</select>
					</div>
					<div class="col-sm-2 col-lg-1 col-xs-12 padMar0 mobilecls mobilemargin">
						<select class="form-control" name="booking_time" id="booking_time">
							<option value="">{$LANG.res_book_am_pm_select}</option>
							<option value="AM">{$LANG.res_book_am}</option>
							<option value="PM">{$LANG.res_book_pm}</option>
						</select>
					</div>*}
                    <div id="Newopentimeclosetimebook" class="col-sm-3">
                                   
                        {if $times eq ''} 
                            
                               <select name="booking_hours" id="booking_hours" class="form-control">
                                    <option value="">Closed</option>   
                              </select>
                                 
                           
                        {else}    
                            <select name="booking_hours" id="booking_hours" class="form-control">
                                {foreach key=opentime item=timelist from=$times}
                                    {$timelist}
                                {/foreach}
                            </select>
                        {/if}
                    </div>
				</div>
			
		
			<div class="contain">
				<h1 class="bookaTabContactHead">{$LANG.res_details_bookingcontact}</h1>
				
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal">{$LANG.res_details_bookingname}<span class="star">*</span></span>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="booking_name" id="booking_name" value="" />
					</div>
				</div>
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal">{$LANG.res_details_bookingemail}<span class="star">*</span></span>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="booking_email" id="booking_email" value="" />
					</div>
				</div>
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal">{$LANG.res_details_bookingmobileno}<span class="star">*</span></span>
					<div class="col-sm-4">
						<span class="code"></span><input type="text" class="form-control" name="booking_mobileno" id="booking_mobileno" value="" />
					</div>
				</div>
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal">{$LANG.res_details_bookinglandline}</span>
					<div class="col-sm-4">
						<span class="code"></span><input type="text" class="form-control" name="booking_phoneno" id="booking_phoneno" value="" />
						<span class="line">{$LANG.res_details_bookingphonecond}</span>
					</div>
				</div>
				
				<div class="form-group">
					<span class="control-label col-sm-4 font-normal">{$LANG.res_details_bookinginst}</span>
					<div class="col-sm-4">
						<textarea rows="5" cols="" class="form-control" name="booking_instruction" id="booking_instruction"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-4">
					<span  id="booktab"><img src="'{$SITE_BASEURL}/images/loader.gif" border="0" alt="Loading" style="display:none"/></span>
					<input type="submit" class="findRestBtn" name="booking_submit" id="booking_submit" value="{$LANG.res_details_bookingbut}" />
				</div>
				</div>
				
			</div>
			</form>
		</div>
	</div>
</div>

