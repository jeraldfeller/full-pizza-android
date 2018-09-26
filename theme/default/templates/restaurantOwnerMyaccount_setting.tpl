
<!-- Setting starts -->
<!--<form name="resOwnerPhotoUpdate" method="post" action="restaurantOwnerMyaccount.php" enctype="multipart/form-data">-->
<input type="hidden" name="reslattitude" id="reslattitude" value="{$reslattitude}" />
<input type="hidden" name="reslongtitude" id="reslongtitude" value="{$reslongtitude}" />

<div class="detailsInnerNewWrap">
	<h1 class="restOwnMyHead">Settings</h1>
	<hr class="heading-hr">
	<div class="ionTabs" id="tabs_2" data-name="setting">	
	<ul class="settingTab1 settingTabs ionTabs__head">
		<li class="ionTabs__tab" data-target="details_contact"><a href="javascript:void(0);" >{$LANG.res_myaccount_setcontactinfo}</a></li>
		<li class="ionTabs__tab" data-target="details_restinfo"><a href="javascript:void(0);">{$LANG.res_myaccount_setresinfo}</a></li>
		<li class="ionTabs__tab" data-target="details_deliveryinfo"><a href="javascript:void(0);">{$LANG.res_myaccount_setdeliveryinfo}</a></li>
		<li class="ionTabs__tab" data-target="details_openclose"><a href="javascript:void(0);" >{$LANG.res_myaccount_setopenclose}</a></li>
		<li class="ionTabs__tab" data-target="details_photo"><a href="javascript:void(0);" >{$LANG.res_myaccount_setmultimedia}</a></li>
		<li class="ionTabs__tab" data-target="details_map"><a href="javascript:void(0);" >{$LANG.res_myaccount_setmaps}</a></li>
		<li class="ionTabs__tab" data-target="details_bankinfo"><a href="javascript:void(0);" >{$LANG.res_myaccount_bankinfo}</a></li>
		<li class="ionTabs__tab" data-target="details_invoice"><a href="javascript:void(0);" >{$LANG.res_myaccount_invoiceinfo}</a></li>
        <li class="ionTabs__tab" data-target="details_commission"><a href="javascript:void(0);" >{*$LANG.res_myaccount_commission*}Commission</a></li>
	</ul>
	<div class="ionTabs__body">
	{$objRestaurant->restaurantDetailsList()}
    
	<div class="settingTabsContent ordersInnerWrap ionTabs__item"  data-name="details_contact">
		<div class="settingsInnerWrap">
			<div class="contain">
				<div class="contactLocationDetails">
					<a class="addbtn pull-right" href="javascript:void(0);" onclick="return editLocationShow();"><i class="fa fa-pencil marRight"></i>{$LANG.res_myaccount_setlocedit}</a>
					<div class="contain">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<!-- Content start -->
						<h1 class="restOwnMyHead">{$LANG.res_myaccount_setcontact}</h1> 
						<div class="addPageCont">
							<span class="addPageRightFont">{$LANG.res_myaccount_setcontactname}</span>
							<span class="colon1">:</span>
							<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_contact_name|stripslashes}</span>
						</div>
						<div class="addPageCont">
							<span class="addPageRightFont">{$LANG.res_myaccount_setcontactphone}</span>
							<span class="colon1">:</span>
							<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_contact_phone|stripslashes}</span>
						</div>
						<div class="addPageCont">
							<span class="addPageRightFont">{$LANG.res_myaccount_setcontactemail}</span>
							<span class="colon1">:</span>
							<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_contact_email}</span>
						</div>
						<div class="addPageCont">
							<span class="addPageRightFont">{$LANG.res_myaccount_setcontactpassword}</span>
							<span class="colon1">:</span>
							<span class="addPageRightFont"><a href="javascript:void(0);" onclick="showChangePassword();" class="addbtn"><i class="glyphicon glyphicon-edit marRight"></i> {$LANG.res_myaccount_setcontactchgpass} </a></span>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<h1 class="restOwnMyHead">{$LANG.res_myaccount_setlocinfo}</h1>
						<div class="addPageCont">
							<span class="addPageRightFont">{$LANG.res_myaccount_setlocaddress}</span>
							<span class="colon1">:</span>
							<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_streetaddress|stripslashes}</span>
						</div>
						<div class="addPageCont">
							<span class="addPageRightFont">{$LANG.res_myaccount_setlocstate} </span>
							<span class="colon1">:</span>
							<span class="addPageRightFont">{$restaurantstate|stripslashes}</span>
						</div>
						<div class="addPageCont">
							<span class="addPageRightFont">{$LANG.res_myaccount_setloccity} </span>
							<span class="colon1">:</span>
							<span class="addPageRightFont">{$restaurantcity}</span>
						</div>
						<div class="addPageCont">
							<span class="addPageRightFont">{$LANG.res_myaccount_setloczip} </span>
							<span class="colon1">:</span>
							<span class="addPageRightFont">{$restaurantzip}</span>
						</div>
					</div>
				</div>
					<!-- Content end -->
				</div>
				
				<!-- Edit Contact Start -->
				<div id="editContactLocation" style="display:none;" class="col-sm-12">
					<a class="addbtn pull-right" onclick="return backContactInfo();"><i class="glyphicon glyphicon-arrow-left marRight"></i>{$LANG.res_myaccount_setlocconbackbut}</a>	
					
					<h1 class="restOwnMyHead">{$LANG.res_myaccount_setloceditconloc}</h1>
					
					<div class="form-horizontal">
						<div class="form-group">
							<div class="mandatoryField">
								<span class="yellowStar">*</span>- {$LANG.res_myaccount_setmandatory}
							</div>
						</div>
						<div class="form-group">
                			<div class="col-sm-offset-4 col-sm-7">
                				<div id="contactErr"></div>
                			</div>
                		</div>
						{$objRestaurant->restaurantDetailsList()}
						<div class="restTabNewIn1 col-sm-6">
							<div class="form-group">
								<label for="restaurant_contact_name_con" class="col-sm-4 control-label font-normal"><span class="redStar">*</span>{$LANG.res_myaccount_setcontactname}</label>
								<div class="col-sm-6">
									<input class="form-control" type="text" name="restaurant_contact_name" id="restaurant_contact_name_con" value="{$restaurantDetailsList.0.restaurant_contact_name|stripslashes}" />
									<span class="errClass resCntNameErr" id="resCntNameErr"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="restaurant_contact_phone_con" class="col-sm-4 control-label font-normal"><span class="redStar">*</span>{$LANG.res_myaccount_setcontactphone}</label>
								<div class="col-sm-6">
									<input class="form-control" type="text" name="restaurant_contact_phone" id="restaurant_contact_phone_con" value="{$restaurantDetailsList.0.restaurant_contact_phone|stripslashes}" maxlength="15"/>
									<span class="errClass resCntPhoneErr" id="resCntPhoneErr"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="restaurant_contact_email_con" class="col-sm-4 control-label font-normal"><span class="redStar">*</span>{$LANG.res_myaccount_setcontactemail}</label>
								<div class="col-sm-6">
									<input class="form-control" type="text" name="restaurant_contact_email" id="restaurant_contact_email_con" value="{$restaurantDetailsList.0.restaurant_contact_email|stripslashes}" />
									<span class="errClass resCntEmailErr" id="resEmailErr"></span>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="restaurant_streetaddress_con" class="col-sm-4 control-label font-normal"><span class="redStar">*</span>{$LANG.res_myaccount_setlocaddress}</label>
								<div class="col-sm-6">
									<input class="form-control" type="text" name="restaurant_streetaddress" id="restaurant_streetaddress_con" value="{$restaurantDetailsList.0.restaurant_streetaddress|stripslashes}" />
									<span class="errClass resCntStrErr" id="resStrErr"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="restaurant_state_con" class="col-sm-4 control-label font-normal"><span class="redStar">*</span>{$LANG.res_myaccount_setlocstate}</label>
								<div class="col-sm-6">
									<select class="form-control" name="restaurant_state" id="restaurant_state_con" onchange="getCityListRest(this.value);">
										<option value="">{$LANG.res_myaccount_settingedit_select}</option>
										{foreach from=$showStatelist item=state}
										<option value="{$state.statecode}" {if $restaurantDetailsList.0.restaurant_state eq $state.statecode}selected="selected"{/if}>{$state.statename|stripslashes}</option>
										{/foreach}
									</select>
									<span class="errClass resCntStaErr" id="resStaErr"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="restaurant_city_con" class="col-sm-4 control-label font-normal"><span class="redStar">*</span>{$LANG.res_myaccount_setloccity}</label>
								<div class="col-sm-6">
									<div id="showResCityList">
										<select class="form-control" name="restaurant_city" id="restaurant_city_con" >
											<option value="">{$LANG.res_myaccount_setselectstate}</option>
											{foreach from=$selectCityList item=city}
												<option value="{$city.city_id}" {if $restaurantDetailsList.0.restaurant_city eq $city.city_id}selected="selected"{/if}>{$city.cityname|stripslashes}</option>
											{/foreach}
										</select>
									</div>
									<span class="errClass resCntCitErr" id="resCitErr"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="restaurant_zip_con" class="col-sm-4 control-label font-normal"><span class="redStar">*</span>{$LANG.res_myaccount_setloczip}</label>
								<div class="col-sm-6">
									<div id="showResZipList">
										<input type="text" class="form-control" name="restaurant_zip" id="restaurant_zip_con" autocomplete="off" value="{$restaurantDetailsList.0.restaurant_zip}"    />
										
										{*<select class="selectboxindex" name="restaurant_zip" id="restaurant_zip_con" >
											<option value="">{$LANG.res_myaccount_setselectcity}</option>
											{foreach from="$showZiplist" item=ziplist}
												<option value="{$ziplist.zipcode_id}" {if $restaurantDetailsList.0.restaurant_zip eq $ziplist.zipcode_id}selected="selected"{/if}>{$ziplist.zipcode|stripslashes} - {$ziplist.areaname|stripslashes}</option>
											{/foreach}
										</select>*}
									</div>
									<span class="errClass resCntZipErr" id="resZipErr"></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-4">
									<input type="submit" class="myaccsubmitbtn" onclick="return restaurantEditContactValidate();" value="{$LANG.res_myaccount_setlocconsubmitbut}" />	
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Edit Contact End -->
				<!-- Change Password Restaurant -->
				<div id="changePasswordDetails" style="display:none;" class="col-sm-12">
					<div class="addbtn pull-right" onclick="return backContactInfo();"><i class="glyphicon glyphicon-circle-arrow-left marRight"></i>{$LANG.res_myaccount_setlocconbackbut}</div>
					<h1 class="restOwnMyHead">{$LANG.res_myaccount_setcontactchgpass}</h1>
					<form class="form-horizontal" method="post">
						<div class="form-group">	
							<div class="col-sm-offset-4 col-sm-4">
	                    		<div id="success"></div>
	                    	</div>
	                    </div>
						<div class="form-group">
							<label for="newpassword" class="col-sm-4 control-label font-normal"><span class="yellowStar">*</span>{$LANG.res_myaccount_setcontactnewpass}</label>
							<div class="col-sm-3">
								<input class="form-control" type="pasword" name="newpassword" id="newpassword" value="" autocomplete="off"/>
								<span class="errClass resCntnewpassErr"></span>
							</div>
						</div>
						<div class="form-group">
							<label for="confirmpassword" class="col-sm-4 control-label font-normal"><span class="yellowStar">*</span>{$LANG.res_myaccount_setcontactconfpass}</label>
							<div class="col-sm-3">
								<input class="form-control" type="password" name="confirmpassword" id="confirmpassword" value="" autocomplete="off"/>
								<span class="errClass resCntconfirmpassErr"></span>
							</div>
						</div>
						<div class="form-group">
							<span class="col-sm-offset-4 col-sm-4">
								<input type="submit" class="myaccsubmitbtn" onclick="return restaurantChangePasswordValidate();" value="{$LANG.res_myaccount_setlocconsubmitbut}" />								
							</span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	{*-----------------------------------*********************-----------------------------------*}
						{*   RESTAURANT INFO START *} 
	{*-----------------------------------*********************-----------------------------------*}
	<div class="settingTabsContent ordersInnerWrap ionTabs__item" data-name="details_restinfo">
		<div class="settingsInnerWrap">
			<div class="contain">
				<!-- Content start -->
			<div class="restaurantInfoDetails">
				<div class="contain">
					<a class="addbtn pull-right btn-sm" href="javascript:void(0);" onclick="editRestaurantInfoShow();"><i class="fa fa-pencil marRight"></i>{$LANG.res_myaccount_setresedit}</a>
					<h1 class="restOwnMyHead">{$LANG.res_myaccount_setresinfo}</h1>
				</div>
				<div class="restTabNewIn3">
					<div class="addPageCont">
						<span class="addPageRightFont">{$LANG.res_myaccount_setresname}</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_name|stripslashes}</span>
					</div>	
					<div class="addPageCont">
						<span class="addPageRightFont">{$LANG.res_myaccount_setresphone}</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_phone|stripslashes}</span>
					</div>
					<div class="addPageCont">
						<span class="addPageRightFont">{$LANG.res_myaccount_setreswebsite}</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_website|stripslashes}</span>
					</div>
					<div class="addPageCont">
						<span class="addPageRightFont">Order Receive Email</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont">{$restaurantDetailsList.0.order_receive_email|stripslashes}</span>
					</div>
					<div class="addPageCont">
						<span class="addPageRightFont">{$LANG.res_myaccount_setresfax}</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_fax|stripslashes}</span>
					</div>
					<div class="addPageCont">
						<span class="addPageRightFont">{$LANG.res_myaccount_setresabout}</span>
						<span class="colon1">:</span>
						<span class="widthAboutRest">{$restaurantDetailsList.0.restaurant_description|stripslashes}</span>
					</div>
				</div>
				<div class="restTabNewIn2">
					<div class="addPageCont">
						<span class="addPageRightFont">{$LANG.res_myaccount_setrespickup}</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_pickup|stripslashes}</span>
					</div>
					<div class="addPageCont">
						<span class="addPageRightFont">{$LANG.res_myaccount_setresbooktab}</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_booktable|stripslashes}</span>
					</div>
					<div class="addPageCont">
						<span class="addPageRightFont">{$LANG.res_myaccount_setresminorder}</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_minorder_price|stripslashes}</span>
					</div>
					<div class="addPageCont">
						<span class="addPageRightFont">{$LANG.res_myaccount_setrestax}</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_salestax|stripslashes}</span>
					</div>
					<div class="addPageCont">
						<span class="addPageRightFont">{$LANG.res_myaccount_setresservcuis}</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont">{$servingcuisine}</span>
					</div>
					<div class="addPageCont">
						<span class="addPageRightFont">Order Pending Alert Tone</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont">{$restaurantDetailsList.0.pending_order_alert|stripslashes}</span>
					</div>
				<!-- Content end -->
				</div>
				
			</div>
			{*-----------------------------------  Restaurant Edit  -----------------------------------*}
			<!-- Edit Restaurant Info Start-->
			<div id="editrestaurantinfo" style="display:none;">
				<div class="addbtn pull-right" onclick="return backRestaurantInfo();"><i class="glyphicon glyphicon-arrow-left marRight"></i>{$LANG.res_myaccount_setresbackbut}</div>
               
				<div class="contain"><h1 class="restOwnMyHead">{$LANG.res_myaccount_setreseditres}</h1></div>
				<div class="form-horizontal">
					<div id="resErr"></div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="restaurant_name_res" class="col-sm-4 control-label font-normal"><span class="redStar">*</span>{$LANG.res_myaccount_setresname}</label>
						 <div class="col-sm-6">
							<input class="form-control" type="text" name="restaurant_name" id="restaurant_name_res" value="{$restaurantDetailsList.0.restaurant_name|stripslashes}" />
							<span class="errClass resNameErr" id="resNameErr"></span>
						</div>
					</div>	
					<div class="form-group">
						<label for="restaurant_phone_res" class="col-sm-4 control-label font-normal"><span class="redStar">*</span>{$LANG.res_myaccount_setresphone}</label>	
						 <div class="col-sm-6">
							<input class="form-control" type="text" name="restaurant_phone" id="restaurant_phone_res" value="{$restaurantDetailsList.0.restaurant_phone|stripslashes}" />
							<span class="errClass resPhoneErr" id="resPhoneErr"></span>
						</div>
					</div>
					<div class="form-group">
						<label for="restaurant_website_res" class="col-sm-4 control-label font-normal"><span class="redStar"></span>{$LANG.res_myaccount_setreswebsite}</label>	
						<div class="col-sm-6">
							<input class="form-control" type="text" name="restaurant_website" id="restaurant_website_res" value="{$restaurantDetailsList.0.restaurant_website|stripslashes}" />
							<span class="errClass resWebErr" id="resWebErr"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="restaurant_ordermail" class="col-sm-4 control-label font-normal"><span class="redStar">*</span>Order Receive Email</label>	
						<div class="col-sm-6">
							<input class="form-control" type="text" name="restaurant_ordermail" id="restaurant_ordermail" value="{$restaurantDetailsList.0.order_receive_email|stripslashes}" />
							<span class="errClass resreceiveErr" id="resreceiveErr"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="restaurant_fax_res" class="col-sm-4 control-label font-normal">{$LANG.res_myaccount_setresfax}</label>
						<div class="col-sm-6">
							<input class="form-control" type="text" name="restaurant_fax" id="restaurant_fax_res" value="{$restaurantDetailsList.0.restaurant_fax|stripslashes}" />
							<span class="errClass resFaxErr" id="resFaxErr"></span>
						</div>
					</div>
					<div class="form-group">	
						<label for="restaurant_description_res" class="col-sm-4 control-label font-normal">{$LANG.res_myaccount_setresabout}</label>
						<div class="col-sm-6">
							<textarea rows="5" cols="" class="form-control" name="restaurant_description" id="restaurant_description_res">{$restaurantDetailsList.0.restaurant_description|stripslashes}</textarea>
							<span class="errClass resAbtResErr" id="resAbtResErr"></span>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">	
						<label for="" class="col-sm-4 control-label font-normal">{$LANG.res_myaccount_setrespickup}</label>
						<div class="col-sm-6">
							<div class="radio-inline radioln radio-primary" >
								<input class="" type="radio" name="restaurant_pickup" id="restaurant_pickup_Yes_res" value="Yes" {if $restaurantDetailsList.0.restaurant_pickup eq 'Yes'} checked="checked" {/if} />
								<label for="restaurant_pickup_Yes_res">{$LANG.res_myaccount_info_pickup_yes}</label>
							</div> 
							<div class="radio-inline radioln radio-primary" >
								<input class="" type="radio" name="restaurant_pickup" id="restaurant_pickup_No_res" value="No" {if $restaurantDetailsList.0.restaurant_pickup eq 'No'} checked="checked" {/if} />
								<label for="restaurant_pickup_No_res">{$LANG.res_myaccount_info_pickup_no}</label>
							</div>
							<span class="errClass resPickupErr" ></span>	
						</div>
					</div>
				
					<div class="form-group">
						<label for="" class="col-sm-4 control-label font-normal">{$LANG.res_myaccount_setresbooktab}</label>
						<div class="col-sm-6">
							<div class="radio-inline radioln radio-primary" >
								<input class="" type="radio" name="restaurant_booktable" id="restaurant_booktable_yes" value="Yes" {if $restaurantDetailsList.0.restaurant_booktable eq 'Yes'} checked="checked" {/if} />
								<label for="restaurant_booktable_yes">{$LANG.res_myaccount_info_book_a_tab_yes}</label>
							</div>
							<div class="radio-inline radioln radio-primary" >
								<input class="" type="radio" name="restaurant_booktable" id="restaurant_booktable_no" value="No" {if $restaurantDetailsList.0.restaurant_booktable eq 'No'} checked="checked" {/if} />
								<label for="restaurant_booktable_no">{$LANG.res_myaccount_info_book_a_tab_no}</label>
							</div>
							<span class="errClass resBooktableErr" ></span>	
						</div>
					</div>
					
					<div class="form-group">
						<label for="restaurant_minorder_price_res" class="col-sm-4 control-label font-normal">{$LANG.res_myaccount_setresminorder}</label>
						<div class="col-sm-6">
							<input class="form-control" type="text" name="restaurant_minorder_price" id="restaurant_minorder_price_res" value="{$restaurantDetailsList.0.restaurant_minorder_price|stripslashes}" />
							<span class="errClass resMinOrdErr" id="resMinOrdErr"></span>	
						</div>
					</div>
			
					<div class="form-group">
						<label for="restaurant_salestax_res" class="col-sm-4 control-label font-normal">{$LANG.res_myaccount_setrestax}</label>
						<div class="col-sm-6">
							<input class="form-control" type="text" name="restaurant_salestax" id="restaurant_salestax_res" value="{$restaurantDetailsList.0.restaurant_salestax|stripslashes}" />
							<span class="errClass resSalTaxErr" id="resSalTaxErr"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="restaurant_serving_cuisines_res" class="col-sm-4 control-label font-normal">{$LANG.res_myaccount_setresservcuis}</label>
						<div class="col-sm-6">
							<select class="form-control" name="restaurant_serving_cuisines[]" id="restaurant_serving_cuisines_res" multiple="multiple" size="5">
								{assign var="getcuisine" value=","|explode:$restaurantDetailsList.0.restaurant_serving_cuisines}
								{foreach from=$showcuisinelist item=cuisine}
								<option value="{$cuisine.cuisine_id}" {foreach from=$getcuisine item=cuisineid}{if $cuisineid eq $cuisine.cuisine_id}selected="selected"{/if}{/foreach}>{$cuisine.cuisine_name}</option>
								{/foreach}
							</select>
							<span class="errClass resSerCuiErr" id="resSerCuiErr"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-4 control-label font-normal">Order Pending Alert Tone</label>
						<div class="col-sm-6">
							<div class="radio-inline radioln radio-primary" >
								<input class="" type="radio" name="pending_alert" id="pending_alert_Yes" value="Yes" {if $restaurantDetailsList.0.pending_order_alert eq 'Yes'} checked="checked" {/if} />
								<label for="pending_alert_Yes">{$LANG.res_myaccount_info_pickup_yes}</label>
							</div>
							<div class="radio-inline radioln radio-primary" >
								<input class="" type="radio" name="pending_alert" id="pending_alert_No" value="No" {if $restaurantDetailsList.0.pending_order_alert eq 'No'} checked="checked" {/if} />
								<label for="pending_alert_No">{$LANG.res_myaccount_info_pickup_no}</label>
							</div>
							<span class="errClass resalertErr" ></span>	
						</div>
					</div>
                    
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-4">
							<input type="submit" class="myaccsubmitbtn" onclick="return editRestaurantInfoValidate();" value="{$LANG.res_myaccount_setressubmitbut}" />
						</div>
					</div>
				</div>
				</div>
			</div>
			<!-- Edit Restaurant Info End-->
			</div>
		</div>
	</div>
	{*-----------------------------------*****************************************-----------------------------------*}
							{* RESTAURANT INFO END *}
	{*-----------------------------------*****************************************-----------------------------------*}
							{* RESTAURANT DELIVERY INFO START *}
	{*-----------------------------------*****************************************-----------------------------------*}
	<div class="settingTabsContent ordersInnerWrap ionTabs__item" data-name="details_deliveryinfo">
		<div class="settingsInnerWrap">
				<div class="deliveryInfoDetails">
					<h1 class="restOwnMyHead">{$LANG.res_myaccount_setdeliverinfo}</h1>
					<a class=" pull-right addbtn" href="javascript:void(0);" onclick="editDeliveryInfoShow();"><i class="fa fa-pencil marRight"></i>{$LANG.res_myaccount_setdeliveredit}</a>
					<!-- Content start -->
					<div class="addPageCont">
						<span class="addPageRightFont">{$LANG.res_myaccount_setdeliver}</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_delivery|stripslashes}</span>
					</div>	
				
					{*<div class="addPageCont">
						<span class="addPageRightFont">{$LANG.res_myaccount_setdeliverareas}</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont1">{$servingareas}</span>
					</div>*}
                    <div id="Deliveryinfo1" {if $restaurantDetailsList.0.restaurant_delivery eq 'No'} style="display:none; {/if}">
    					<div class="addPageCont">
    						<span class="addPageRightFont">{$LANG.res_myaccount_setdelivertime}</span>
    						<span class="colon1">:</span>
    						<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_estimated_time|stripslashes}</span>
    					</div>
    					<div class="addPageCont">
    						<span class="addPageRightFont">{$LANG.res_myaccount_setdelivercharge}</span>
    						<span class="colon1">:</span>
    						<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_delivery_charge|stripslashes}</span>
    					</div>
    					<div class="addPageCont">
    						<span class="addPageRightFont">Delivery miles</span>
    						<span class="colon1">:</span>
    						<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_delivery_distance|stripslashes}</span>
    					</div>
                    </div>
					<!-- Content end -->
				</div>
				{*------------------ Restaurant EDIT DELIVERY INFO strat --------------------------*}
				<!-- Edit Delivery Info Start -->
				<div id="editDeliveryInfo" class="col-sm-12" style="display:none;">
                 	<div class="addbtn pull-right" onclick="return backDeliveryInfo();"><i class="glyphicon glyphicon-circle-arrow-left marRight"></i>{$LANG.res_myaccount_setdeliverbackbut}</div>
                 	
					<h1 class="restOwnMyHead">{$LANG.res_myaccount_setdelivereditdel}</h1>
					<div class="form-horizontal col-sm-12">
						<div id="DeliveryErr"></div>
						<div class="form-group">
							<label for="" class="col-sm-4 control-label font-normal">{$LANG.res_myaccount_setdeliver}</label>
							<div class="col-sm-2">
								<div class="radioln radio-inline radio-primary" >
									<input class="" type="radio" name="restaurant_delivery" id="restaurant_delivery_yes" onclick="restaurantDeliverYes()" value="Yes" {if $restaurantDetailsList.0.restaurant_delivery eq 'Yes'} checked="checked" {/if} />
									<label for="restaurant_delivery_yes">{$LANG.res_myaccount_setdeliveryes}</label>
								</div> 
								<div class="radioln radio-inline radio-primary" >
									<input class="" type="radio" name="restaurant_delivery" id="restaurant_delivery_no" onclick="restaurantDeliverNo()" value="No" {if $restaurantDetailsList.0.restaurant_delivery eq 'No'} checked="checked" {/if} />
									<label for="restaurant_delivery_no">{$LANG.res_myaccount_setdeliverno}</label>
								</div>
								<span class="errClass resDeliErr" id="resDeliErr"></span>
							</div>
						</div>
					
					{*<div class="addPageCont">
						<span class="addPageRightFont">{$LANG.res_myaccount_setdeliverareas}</span>
						<span class="colon1">:</span>
						<select class="multipleselectbx" name="restaurant_delivery_areas[]" id="restaurant_delivery_areas_res" multiple="multiple" size="5">
							{assign var="getdeliveryareas" value=","|explode:$restaurantDetailsList.0.restaurant_delivery_areas}
							{section name=arealist loop=$showDeliveryAreasList}
							<option value="{$showDeliveryAreasList[arealist].zipcode_id}" {foreach from=$getdeliveryareas item=areasid}{if $areasid eq $showDeliveryAreasList[arealist].zipcode_id}selected="selected"{/if}{/foreach} >{$showDeliveryAreasList[arealist].areaname|stripslashes}</option>
							{/section}
						</select>
						<span class="errClass resDeliAreErr" id="resDeliAreErr"></span>
					</div>*}
				<div id="Deliveryinfo" {if $restaurantDetailsList.0.restaurant_delivery eq 'No'} style="display:none; {/if}">
    					<div class="form-group">
    						<label for="restaurant_estimated_time_res" class="col-sm-4 control-label font-normal">{$LANG.res_myaccount_setdelivertime}</label>
    						<div class="col-sm-2">
    							<input class="form-control numericfield" type="text" name="restaurant_estimated_time" id="restaurant_estimated_time_res" value="{$restaurantDetailsList.0.restaurant_estimated_time|stripslashes}" />
    							<span class="errClass resEstTimeErr" id="resEstTimeErr"></span>
    						</div>
    					</div>
    					
    					<div class="form-group">
    						<label for="restaurant_estimated_time_res" class="col-sm-4 control-label font-normal">{$LANG.res_myaccount_setdelivercharge}</label>
    						<div class="col-sm-2">
    							<input class="form-control numericfield" type="text" name="restaurant_delivery_charge" id="restaurant_delivery_charge_res" value="{if $restaurantDetailsList.0.restaurant_delivery_charge eq '0.00'}Free{else}{$restaurantDetailsList.0.restaurant_delivery_charge|stripslashes}{/if}" />
    							<span class="errClass resDeliChgErr" id="resDeliChgErr"></span>
    						</div>	
    					</div>
    					
    					<div class="form-group">
    						<label for="restaurant_estimated_time_res" class="col-sm-4 control-label font-normal">Delivery miles</label>
    						<div class="col-sm-4">
    							<input class="textbox numericfield" type="text" name="restaurant_delivery_distance" id="restaurant_delivery_distance" value="{if $restaurantDetailsList.0.restaurant_delivery_distance neq ''}{$restaurantDetailsList.0.restaurant_delivery_distance|stripslashes}{else}45{/if}"/>	
    							<a href="javascript:void(0);" onclick="viewMap();" id="view_map" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-map-marker"></i>View map</a>					
    							<span class="errClass" id="restdelDistanceErr"></span>
    						</div>
    					</div>
    					<div  class="form-group" >		
    						<div  class="col-sm-12" id="map_distance_show">
    							<input type="hidden" name="restaurant_address" id="restaurant_address" value="{$restaurant_address_map}" />
    							<input type="hidden" name="rest_deliver_miles" id="rest_deliver_miles" value="{if $restaurantDetailsList.0.restaurant_delivery_distance neq ''}{$restaurantDetailsList.0.restaurant_delivery_distance|stripslashes}{else}5{/if}" />
    							<div id="map" style="width:100%;height:500px;"></div>
    						</div>
    					</div>
				</div>
                	
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-4">
						<input type="submit" class="myaccsubmitbtn" onclick="return editDeliveryInfoValidate();" value="{$LANG.res_myaccount_setdeliversubmitbut}" />
					</div>	
				</div>
					
				</div>
				<!-- Content end -->
			</div>
		</div>
	</div>
	{*-----------------------------------***************************************************-----------------------------------*}
						{*  RESTAURANT DELIVERY INFO END  *}
	{*-----------------------------------***************************************************-----------------------------------*}
						{*  RESTAURANT OPEN AND CLOSE TIME START  *}
	{*-----------------------------------***************************************************-----------------------------------*}
	<div class="settingTabsContent ordersInnerWrap ionTabs__item" data-name="details_openclose">
		<div class="settingsInnerWrap">
			<div class="contain">
				<div class="resOpenCloseDetails">
					<a class="addbtn pull-right" href="javascript:void(0);" onclick="editOpenAndCloseInfoShow();"><i class="fa fa-pencil marRight"></i>{$LANG.res_myaccount_settimingedit}</a>
					<h1 class="restOwnMyHead">{$LANG.res_myaccount_setopenclose}</h1>
					
					<!-- Content start -->
					<div class="addPageCont">
						<span class="addPageRightFont">&nbsp;</span>
						<span class="colon1">&nbsp;</span>
						<span class="width53">
							<span class="DeliveryHrs1 col-lg-3 col-md-3 col-sm-12 col-xs-12 ">{$LANG.res_myaccount_setopentime}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrs1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$LANG.res_myaccount_setclosetime}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrs1 col-lg-3 col-md-3 col-sm-12 col-xs-12">Second Opening Time</span>
							<span class="DeliveryHrs1 col-lg-3 col-md-3 col-sm-12 col-xs-12">Second Closing Time</span>
						</span>
					</div>
					
					{*<div class="addPageCont">
						<span class="addPageRightFont">{$LANG.res_myaccount_setmonday} </span>
						<span class="colon1">:</span>
						<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_mon_opentime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
						<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_mon_closetime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
					</div>
					
					<div class="addPageCont">
						<span class="addPageRightFont">{$LANG.res_myaccount_settuesday} </span>
						<span class="colon1">:</span>
						<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_tue_opentime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
						<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_tue_closetime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
					</div>
					
					<div class="addPageCont">
						<span class="addPageRightFont">{$LANG.res_myaccount_setwednesday} </span>
						<span class="colon1">:</span>
						<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_wed_opentime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
						<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_wed_closetime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
					</div>
					
					<div class="addPageCont">
						<span class="addPageRightFont">{$LANG.res_myaccount_setthursday} </span>
						<span class="colon1">:</span>
						<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_thu_opentime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
						<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_thu_closetime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
					</div>
					
					<div class="addPageCont">
						<span class="addPageRightFont">{$LANG.res_myaccount_setfriday} </span>
						<span class="colon1">:</span>
						<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_fri_opentime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
						<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_fri_closetime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
					</div>
					
					<div class="addPageCont">
						<span class="addPageRightFont">{$LANG.res_myaccount_setsaturday} </span>
						<span class="colon1">:</span>
						<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_sat_opentime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
						<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_sat_closetime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
					</div>
					
					<div class="addPageCont">
						<span class="addPageRightFont">{$LANG.res_myaccount_setsunday} </span>
						<span class="colon1">:</span>
						<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_sun_opentime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
						<span class="DeliveryHrsdet1">{$restaurantDetailsList.0.restaurant_delivery_sun_closetime|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
					</div>*}
					
					<div class="contain timeOpenClose">
						<span class="addPageRightFont">{$LANG.res_myaccount_setmonday} </span>
						<span class="colon1">:</span>
						<span class="width53">
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.mon_firstopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.mon_firstclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.mon_secondopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.mon_secondclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
						</span>
					</div>
					
					<div class="contain timeOpenClose">
						<span class="addPageRightFont">{$LANG.res_myaccount_settuesday} </span>
						<span class="colon1">:</span>
						<span class="width53">
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.tue_firstopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.tue_firstclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.tue_secondopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.tue_secondclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
						</span>
					</div>
					
					<div class="contain timeOpenClose">
						<span class="addPageRightFont">{$LANG.res_myaccount_setwednesday} </span>
						<span class="colon1">:</span>
						<span class="width53">
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.wed_firstopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.wed_firstclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.wed_secondopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.wed_secondclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
						</span>
					</div>
					
					<div class="contain timeOpenClose">
						<span class="addPageRightFont">{$LANG.res_myaccount_setthursday} </span>
						<span class="colon1">:</span>
						<span class="width53">
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.thu_firstopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.thu_firstclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.thu_secondopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.thu_secondclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
						</span>
					</div>
					
					<div class="contain timeOpenClose">
						<span class="addPageRightFont">{$LANG.res_myaccount_setfriday} </span>
						<span class="colon1">:</span>
						<span class="width53">
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.fri_firstopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.fri_firstclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.fri_secondopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.fri_secondclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
						</span>
					</div>
					
					<div class="contain timeOpenClose">
						<span class="addPageRightFont">{$LANG.res_myaccount_setsaturday} </span>
						<span class="colon1">:</span>
						<span class="width53">
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.sat_firstopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.sat_firstclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.sat_secondopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.sat_secondclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
						</span>
					</div>
					
					<div class="contain timeOpenClose">
						<span class="addPageRightFont">{$LANG.res_myaccount_setsunday} </span>
						<span class="colon1">:</span>
						<span class="width53">
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.sun_firstopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.sun_firstclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.sun_secondopen_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
							<span class="DeliveryHrsdet1 col-lg-3 col-md-3 col-sm-12 col-xs-12">{$restaurantEditListTiming.0.sun_secondclose_time|stripslashes}<span class="DeliverHrs_Font">&nbsp;</span></span>
						</span>
					</div>
					<!-- Content end -->
				</div>
				{*----------------------------------- EDIT OPEN AND CLOSE TIME -----------------------------*}
				<!-- Edit Open ANd Close Time -->
				<div id="editOpenClose" style="display:none;">
                   	<div class="addbtn pull-right" onclick="return backOpenAndCloseInfo();" ><i class="glyphicon glyphicon-circle-arrow-left marRight"></i>{$LANG.res_myaccount_setclosebackbut}</div>
					<h1 class="restOwnMyHead">{$LANG.res_myaccount_settimingeditopen}</h1>
					 <div id="openCloseErr"></div>
					<div class="addPageCont">
						<div class="addPageRightFontNew1 width25">	
							<span class="addPageRightFont">{$LANG.res_myaccount_setdelhour}</span>
							<span class="colon1">:</span>
						</div>
					<div class="width75">
						<div class="DeliveryHrsNew col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<b>{$LANG.res_myaccount_setopentime}</b>
							<div class="DeliverHrs_Font">
								<input type="checkbox" id="selectopen" onclick="return selectAllOpeningTime();" style="display:none"/>
								<label for="selectopen" class="DeliverHrs_Font btn btn-info btn-sm">{$LANG.res_myaccount_setselall}</span>
							</div >
							<span id="resSelectAllOpenErr" class="errClass"></span>
						</div>
						<div class="DeliveryHrsNew col-lg-3 col-md-3 col-sm-12 col-xs-12">	
							<b>{$LANG.res_myaccount_setclosetime}</b>
							<div class="DeliverHrs_Font">
								<input type="checkbox" id="selectclose" onclick="return selectAllCloseingTime();" style="display:none"/>
								<label for="selectclose" class="DeliverHrs_Font btn btn-info btn-sm">{$LANG.res_myaccount_setselall}</span>
							</div>
							<span id="resSelectAllCloseErr" class="errClass"></span>
						</div>
						<div class="DeliveryHrsNew col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<b>Second Opening Time</b>
							<div class="DeliverHrs_Font">
								<input type="checkbox" id="selectsecondopen" onclick="selectAllSecondOpeningTime();" style="display:none"/>
								<label for="selectsecondopen" class="DeliverHrs_Font btn btn-info btn-sm">{$LANG.res_myaccount_setselall}</label>
							</div>
							<span id="resSelectAllSecondOpenErr"></span>
						</div>
						<div class="DeliveryHrsNew col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<b>Second Closing Time</b>
							<div class="DeliverHrs_Font">
								<input type="checkbox" id="selectsecondclose" onclick="selectAllSecondCloseingTime();" style="display:none;"/>
								<label for="selectsecondclose" class="DeliverHrs_Font btn btn-info btn-sm">{$LANG.res_myaccount_setselall}</label>
							</div>
							<span id="resSelectAllSecondCloseErr"></span>
						</div>
					</div>
					</div>
					
					<div class="addPageCont">
						<span class="addPageRightFont">&nbsp;</span>
						<span class="colon1">&nbsp;</span>
						<span class="DeliverHrs_Font DeliverHrs_FontFull"><b>{$LANG.res_myaccount_open_and_close_time}</b> : {$LANG.res_myaccount_your_restaurantclose} <b> 00:00 </b></span>
					</div>
                    <div class="errClass resEstTimeMonErr1 errorTime" id="errorTime"></div>
					
					<div class="addPageCont">
						<div class="addPageRightFontNew1 width25">	
							<div class="addPageCont"><span class="addPageRightFont">{$LANG.res_myaccount_setmonday} </span><span class="colon1">:</span></div>
							<div class="addPageCont"><span class="addPageRightFont">{$LANG.res_myaccount_settuesday} </span><span class="colon1">:</span></div>
							<div class="addPageCont"><span class="addPageRightFont">{$LANG.res_myaccount_setwednesday} </span><span class="colon1">:</span></div>
							<div class="addPageCont"><span class="addPageRightFont">{$LANG.res_myaccount_setthursday} </span><span class="colon1">:</span></div>
							<div class="addPageCont"><span class="addPageRightFont">{$LANG.res_myaccount_setfriday} </span><span class="colon1">:</span></div>
							<div class="addPageCont"><span class="addPageRightFont">{$LANG.res_myaccount_setsaturday} </span><span class="colon1">:</span></div>
							<div class="addPageCont"><span class="addPageRightFont">{$LANG.res_myaccount_setsunday} </span><span class="colon1">:</span></div>
						</div>
						
						<div class="width75">
							<!--Open Time start-->
							<div class="DeliveryHrsNew col-lg-3 col-md-3 col-sm-12 col-xs-12 pad0">
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_mon_open_hr" id="restaurant_delivery_mon_open_hr" onchange="changemonvalopen();">
										<option value="">{$LANG.res_myaccount_setdelselecthrs}</option>
										{$HOURS_LIST_MON}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_mon_open_min" id="restaurant_delivery_mon_open_min" onchange="changemonvalopen();">
										<option value="">{$LANG.res_myaccount_setdelselectmns}</option>
										{$MINUTES_LIST_MON}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_mon_open_sess" id="restaurant_delivery_mon_open_sess" onchange="changemonvalopen();" >
										<option value="AM" {if $monopentimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> 
										<option value="PM" {if $monopentimesess eq 'PM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_tue_open_hr" id="restaurant_delivery_tue_open_hr">
										<option value="">{$LANG.res_myaccount_setdelselecthrs}</option>
										{$HOURS_LIST_TUE}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_tue_open_min" id="restaurant_delivery_tue_open_min">
										<option value="">{$LANG.res_myaccount_setdelselectmns}</option>
										{$MINUTES_LIST_TUE}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_tue_open_sess" id="restaurant_delivery_tue_open_sess" >
										<option value="AM" {if $tueopentimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> 
										<option value="PM" {if $tueopentimesess eq 'PM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_wed_open_hr" id="restaurant_delivery_wed_open_hr">
										<option value="">{$LANG.res_myaccount_setdelselecthrs}</option>
										{$HOURS_LIST_WED}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_wed_open_min" id="restaurant_delivery_wed_open_min">
										<option value="">{$LANG.res_myaccount_setdelselectmns}</option>
										{$MINUTES_LIST_WED}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_wed_open_sess" id="restaurant_delivery_wed_open_sess" >
										<option value="AM" {if $wedopentimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> 
										<option value="PM" {if $wedopentimesess eq 'PM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_thu_open_hr" id="restaurant_delivery_thu_open_hr">
										<option value="">{$LANG.res_myaccount_setdelselecthrs}</option>
										{$HOURS_LIST_THU}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_thu_open_min" id="restaurant_delivery_thu_open_min">
										<option value="">{$LANG.res_myaccount_setdelselectmns}</option>
										{$MINUTES_LIST_THU}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_thu_open_sess" id="restaurant_delivery_thu_open_sess" >
										<option value="AM" {if $thuopentimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> 
										<option value="PM" {if $thuopentimesess eq 'PM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_fri_open_hr" id="restaurant_delivery_fri_open_hr">
										<option value="">{$LANG.res_myaccount_setdelselecthrs}</option>
										{$HOURS_LIST_FRI}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_fri_open_min" id="restaurant_delivery_fri_open_min">
										<option value="">{$LANG.res_myaccount_setdelselectmns}</option>
										{$MINUTES_LIST_FRI}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_fri_open_sess" id="restaurant_delivery_fri_open_sess" >
										<option value="AM" {if $friopentimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> 
										<option value="PM" {if $friopentimesess eq 'PM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sat_open_hr" id="restaurant_delivery_sat_open_hr">
										<option value="">{$LANG.res_myaccount_setdelselecthrs}</option>
										{$HOURS_LIST_SAT}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sat_open_min" id="restaurant_delivery_sat_open_min">
										<option value="">{$LANG.res_myaccount_setdelselectmns}</option>
										{$MINUTES_LIST_SAT}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sat_open_sess" id="restaurant_delivery_sat_open_sess" >
										<option value="AM" {if $satopentimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> 
										<option value="PM" {if $satopentimesess eq 'PM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sun_open_hr" id="restaurant_delivery_sun_open_hr">
										<option value="">{$LANG.res_myaccount_setdelselecthrs}</option>
										{$HOURS_LIST_SUN}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sun_open_min" id="restaurant_delivery_sun_open_min">
										<option value="">{$LANG.res_myaccount_setdelselectmns}</option>
										{$MINUTES_LIST_SUN}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sun_open_sess" id="restaurant_delivery_sun_open_sess" >
										<option value="AM" {if $sunopentimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> 
										<option value="PM" {if $sunopentimesess eq 'PM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
								</span>
							</div>
							<!--Open Time End-->
							
							<!--Close Time start-->
							<div class="DeliveryHrsNew col-lg-3 col-md-3 col-sm-12 col-xs-12 pad0">
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_mon_close_hr" id="restaurant_delivery_mon_close_hr" onchange="changemonvalclose();">
										<option value="">{$LANG.res_myaccount_setdelselecthrs}</option>
										{$HOURS_LIST_CLOSE_MON}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_mon_close_min" id="restaurant_delivery_mon_close_min" onchange="changemonvalclose();">
										<option value="">{$LANG.res_myaccount_setdelselectmns}</option>
										{$MINUTES_LIST_CLOSE_MON}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_mon_close_sess" id="restaurant_delivery_mon_close_sess" onchange="changemonvalclose();" >
										<option value="AM" {if $monclosetimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> 
										<option value="PM" {if $monclosetimesess eq 'PM'}selected="selected"{else}selected="selecetd"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
									{*<span class="errClass resEstTimeMonErr1 errorTime" id="resEstTimeMonErr"></span>*}
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_tue_close_hr" id="restaurant_delivery_tue_close_hr">
										<option value="">{$LANG.res_myaccount_setdelselecthrs}</option>
											{$HOURS_LIST_CLOSE_TUE}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_tue_close_min" id="restaurant_delivery_tue_close_min">
										<option value="">{$LANG.res_myaccount_setdelselectmns}</option>
											{$MINUTES_LIST_CLOSE_TUE}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_tue_close_sess" id="restaurant_delivery_tue_close_sess" >
										<option value="AM" {if $tueclosetimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> 
										<option value="PM" {if $tueclosetimesess eq 'PM'}selected="selected"{else}selected="selecetd"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
									{*<span class="errClass resEstTimeTueErr1 errorTime" id="resEstTimeTueErr"></span>*}			
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_wed_close_hr" id="restaurant_delivery_wed_close_hr">
										<option value="">{$LANG.res_myaccount_setdelselecthrs}</option>
										{$HOURS_LIST_CLOSE_WED}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_wed_close_min" id="restaurant_delivery_wed_close_min">
										<option value="">{$LANG.res_myaccount_setdelselectmns}</option>
										{$MINUTES_LIST_CLOSE_WED}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_wed_close_sess" id="restaurant_delivery_wed_close_sess" >
										<option value="AM" {if $wedclosetimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> 
										<option value="PM" {if $wedclosetimesess eq 'PM'}selected="selected"{else}selected="selecetd"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
									{*<span class="errClass resEstTimeWedErr1 errorTime" id="resEstTimeWedErr"></span>*}
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_thu_close_hr" id="restaurant_delivery_thu_close_hr">
										<option value="">{$LANG.res_myaccount_setdelselecthrs}</option>
										{$HOURS_LIST_CLOSE_THU}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_thu_close_min" id="restaurant_delivery_thu_close_min">
										<option value="">{$LANG.res_myaccount_setdelselectmns}</option>
										{$MINUTES_LIST_CLOSE_THU}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_thu_close_sess" id="restaurant_delivery_thu_close_sess" >
										<option value="AM" {if $thuclosetimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> 
										<option value="PM" {if $thuclosetimesess eq 'PM'}selected="selected"{else}selected="selecetd"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
									{*<span class="errClass resEstTimeThuErr1 errorTime" id="resEstTimeThuErr"></span>*}	
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_fri_close_hr" id="restaurant_delivery_fri_close_hr">
										<option value="">{$LANG.res_myaccount_setdelselecthrs}</option>
										{$HOURS_LIST_CLOSE_FRI}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_fri_close_min" id="restaurant_delivery_fri_close_min">
										<option value="">{$LANG.res_myaccount_setdelselectmns}</option>
										{$MINUTES_LIST_CLOSE_FRI}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_fri_close_sess" id="restaurant_delivery_fri_close_sess" >
										<option value="AM" {if $friclosetimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> 
										<option value="PM" {if $friclosetimesess eq 'PM'}selected="selected"{else}selected="selecetd"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
									{*<span class="errClass resEstTimeFriErr1 errorTime" id="resEstTimeFriErr"></span>*}
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sat_close_hr" id="restaurant_delivery_sat_close_hr">
										<option value="">{$LANG.res_myaccount_setdelselecthrs}</option>
										{$HOURS_LIST_CLOSE_SAT}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sat_close_min" id="restaurant_delivery_sat_close_min">
										<option value="">{$LANG.res_myaccount_setdelselectmns}</option>
										{$MINUTES_LIST_CLOSE_SAT}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sat_close_sess" id="restaurant_delivery_sat_close_sess" >
										<option value="AM" {if $satclosetimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> 
										<option value="PM" {if $satclosetimesess eq 'PM'}selected="selected"{else}selected="selecetd"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
									{*<span class="errClass resEstTimeSatErr1 errorTime" id="resEstTimeSatErr"></span>*}
								</span>
								<span class="DeliveryHrs">
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sun_close_hr" id="restaurant_delivery_sun_close_hr">
										<option value="">{$LANG.res_myaccount_setdelselecthrs}</option>
										{$HOURS_LIST_CLOSE_SUN}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sun_close_min" id="restaurant_delivery_sun_close_min">
										<option value="">{$LANG.res_myaccount_setdelselectmns}</option>
										{$MINUTES_LIST_CLOSE_SUN}
									</select>
									<select class="resopenclose_hrsmins" name="restaurant_delivery_sun_close_sess" id="restaurant_delivery_sun_close_sess">
										<option value="AM" {if $sunclosetimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> 
										<option value="PM" {if $sunclosetimesess eq 'PM'}selected="selected"{else}selected="selecetd"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
									{*<span class="errClass resEstTimeSunErr1 errorTime" id="resEstTimeSunErr"></span>*}
								</span>
								<!--Close Time end-->
							</div>
							
							<!--Second Open time-->
							<div class="DeliveryHrsNew col-lg-3 col-md-3 col-sm-12 col-xs-12 pad0">
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_mon_open_hr_second" id="restaurant_delivery_mon_open_hr_second"  onchange="changemonvalsecopen();">
										<option value="">Hrs</option>
										{$HOURS_LIST_MON_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_mon_open_min_second" id="restaurant_delivery_mon_open_min_second"  onchange="changemonvalsecopen();">
										<option value="">Mins</option>
										{$MINUTES_LIST_MON_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_mon_open_sess_second" id="restaurant_delivery_mon_open_sess_second" onchange="changemonvalsecopen();" >
										<option value="AM" {if $monsecondopentimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> <!--Testing Validation-->
										<option value="PM" {if $monsecondopentimesess eq 'PM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
								</span>
							<span id="selectallopentime">
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_tue_open_hr_second" id="restaurant_delivery_tue_open_hr_second" >
										<option value="">Hrs</option>
										{$HOURS_LIST_TUE_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_tue_open_min_second" id="restaurant_delivery_tue_open_min_second" >
										<option value="">Mins</option>
										{$MINUTES_LIST_TUE_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_tue_open_sess_second" id="restaurant_delivery_tue_open_sess_second" >
										<option value="AM" {if $tuesecondopentimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> <!--Testing Validation-->
										<option value="PM" {if $tuesecondopentimesess eq 'PM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
								</span>
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_wed_open_hr_second" id="restaurant_delivery_wed_open_hr_second" >
										<option value="">Hrs</option>
										{$HOURS_LIST_WED_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_wed_open_min_second" id="restaurant_delivery_wed_open_min_second" >
										<option value="">Mins</option>
										{$MINUTES_LIST_WED_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_wed_open_sess_second" id="restaurant_delivery_wed_open_sess_second" >
										<option value="AM" {if $wedsecondopentimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> <!--Testing Validation-->
										<option value="PM" {if $wedsecondopentimesess eq 'PM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
								</span>
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_thu_open_hr_second" id="restaurant_delivery_thu_open_hr_second" >
										<option value="">Hrs</option>
										{$HOURS_LIST_THU_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_thu_open_min_second" id="restaurant_delivery_thu_open_min_second" >
										<option value="">Mins</option>
										{$MINUTES_LIST_THU_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_thu_open_sess_second" id="restaurant_delivery_thu_open_sess_second" >
										<option value="AM" {if $thusecondopentimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> <!--Testing Validation-->
										<option value="PM" {if $thusecondopentimesess eq 'PM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
								</span>
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_fri_open_hr_second" id="restaurant_delivery_fri_open_hr_second" >
										<option value="">Hrs</option>
										{$HOURS_LIST_FRI_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_fri_open_min_second" id="restaurant_delivery_fri_open_min_second" >
										<option value="">Mins</option>
										{$MINUTES_LIST_FRI_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_fri_open_sess_second" id="restaurant_delivery_fri_open_sess_second" >
										<option value="AM" {if $frisecondopentimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> <!--Testing Validation-->
										<option value="PM" {if $frisecondopentimesess eq 'PM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
								</span>
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_sat_open_hr_second" id="restaurant_delivery_sat_open_hr_second" >
										<option value="">Hrs</option>
										{$HOURS_LIST_SAT_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_sat_open_min_second" id="restaurant_delivery_sat_open_min_second" >
										<option value="">Mins</option>
										{$MINUTES_LIST_SAT_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_sat_open_sess_second" id="restaurant_delivery_sat_open_sess_second" >
										<option value="AM" {if $satsecondopentimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> <!--Testing Validation-->
										<option value="PM" {if $satsecondopentimesess eq 'PM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
								</span>
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_sun_open_hr_second" id="restaurant_delivery_sun_open_hr_second" >
										<option value="">Hrs</option>
										{$HOURS_LIST_SUN_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_sun_open_min_second" id="restaurant_delivery_sun_open_min_second" >
										<option value="">Mins</option>
										{$MINUTES_LIST_SUN_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_sun_open_sess_second" id="restaurant_delivery_sun_open_sess_second" >
										<option value="AM" {if $sunsecondopentimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> <!--Testing Validation-->
										<option value="PM" {if $sunsecondopentimesess eq 'PM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
								</span>
							</span>
							</div>		
							<!--second open time-->
							
							<!--second Close time-->
							<div class="DeliveryHrsNew col-lg-3 col-md-3 col-sm-12 col-xs-12 pad0">
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_mon_close_hr_second" id="restaurant_delivery_mon_close_hr_second"  onchange="changemonvalsecclose();">
										<option value="">Hrs</option>
										{$HOURS_LIST_CLOSE_MON_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_mon_close_min_second" id="restaurant_delivery_mon_close_min_second"  onchange="changemonvalsecclose();">
										<option value="">Mins</option>
										{$MINUTES_LIST_CLOSE_MON_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_mon_close_sess_second" id="restaurant_delivery_mon_close_sess_second" onchange="changemonvalsecclose();" >
										<option value="AM" {if $monsecondclosetimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> <!--Testing Validation-->
										<option value="PM" {if $monsecondclosetimesess eq 'PM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
									{*<span class="errClass resEstTimeMonErr1 errorTime" id="resEstTimeMonSECErr"></span>*}
								</span>
							<span id="selectallclosetime">
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_tue_close_hr_second" id="restaurant_delivery_tue_close_hr_second" >
										<option value="">Hrs</option>
											{$HOURS_LIST_CLOSE_TUE_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_tue_close_min_second" id="restaurant_delivery_tue_close_min_second" >
										<option value="">Mins</option>
											{$MINUTES_LIST_CLOSE_TUE_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_tue_close_sess_second" id="restaurant_delivery_tue_close_sess_second" >
										<option value="AM" {if $tuesecondclosetimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> <!--Testing Validation-->
										<option value="PM" {if $tuesecondclosetimesess eq 'PM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
									{*<span class="errClass resEstTimeTueErr1 errorTime" id="resEstTimeTueSECErr"></span>*}			
								</span>
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_wed_close_hr_second" id="restaurant_delivery_wed_close_hr_second" >
										<option value="">Hrs</option>
										{$HOURS_LIST_CLOSE_WED_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_wed_close_min_second" id="restaurant_delivery_wed_close_min_second" >
										<option value="">Mins</option>
										{$MINUTES_LIST_CLOSE_WED_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_wed_close_sess_second" id="restaurant_delivery_wed_close_sess_second" >
										<option value="AM" {if $wedsecondclosetimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> <!--Testing Validation-->
										<option value="PM" {if $wedsecondclosetimesess eq 'PM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
									{*<span class="errClass resEstTimeWedErr1 errorTime" id="resEstTimeWedSECErr"></span>*}
								</span>
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_thu_close_hr_second" id="restaurant_delivery_thu_close_hr_second" >
										<option value="">Hrs</option>
										{$HOURS_LIST_CLOSE_THU_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_thu_close_min_second" id="restaurant_delivery_thu_close_min_second" >
										<option value="">Mins</option>
										{$MINUTES_LIST_CLOSE_THU_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_thu_close_sess_second" id="restaurant_delivery_thu_close_sess_second" >
										<option value="AM" {if $thusecondclosetimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> <!--Testing Validation-->
										<option value="PM" {if $thusecondclosetimesess eq 'PM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
									{*<span class="errClass resEstTimeThuErr1 errorTime" id="resEstTimeThuSECErr"></span>*}	
								</span>
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_fri_close_hr_second" id="restaurant_delivery_fri_close_hr_second" >
										<option value="">Hrs</option>
										{$HOURS_LIST_CLOSE_FRI_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_fri_close_min_second" id="restaurant_delivery_fri_close_min_second" >
										<option value="">Mins</option>
										{$MINUTES_LIST_CLOSE_FRI_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_fri_close_sess_second" id="restaurant_delivery_fri_close_sess_second" >
										<option value="AM" {if $frisecondclosetimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> <!--Testing Validation-->
										<option value="PM" {if $frisecondclosetimesess eq 'PM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
									{*<span class="errClass resEstTimeFriErr1 errorTime" id="resEstTimeFriSECErr"></span>*}
								</span>
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_sat_close_hr_second" id="restaurant_delivery_sat_close_hr_second" >
										<option value="">Hrs</option>
										{$HOURS_LIST_CLOSE_SAT_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_sat_close_min_second" id="restaurant_delivery_sat_close_min_second" >
										<option value="">Mins</option>
										{$MINUTES_LIST_CLOSE_SAT_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_sat_close_sess_second" id="restaurant_delivery_sat_close_sess_second" >
										<option value="AM" {if $satsecondclosetimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> <!--Testing Validation-->
										<option value="PM" {if $satsecondclosetimesess eq 'PM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
									{*<span class="errClass resEstTimeSatErr1 errorTime" id="resEstTimeSatSECErr"></span>*}
								</span>
								<span class="DeliveryHrs">
									<select class="selectbx" name="restaurant_delivery_sun_close_hr_second" id="restaurant_delivery_sun_close_hr_second" >
										<option value="">Hrs</option>
										{$HOURS_LIST_CLOSE_SUN_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_sun_close_min_second" id="restaurant_delivery_sun_close_min_second" >
										<option value="">Mins</option>
										{$MINUTES_LIST_CLOSE_SUN_SEC}
									</select>
									<select class="selectbx" name="restaurant_delivery_sun_close_sess_second" id="restaurant_delivery_sun_close_sess_second">
										<option value="AM" {if $sunsecondclosetimesess eq 'AM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectam}</option> <!--Testing Validation-->
										<option value="PM" {if $sunsecondclosetimesess eq 'PM'}selected="selected"{/if}>{$LANG.res_myaccount_setdelselectpm}</option>
									</select>
									{*<span class="errClass resEstTimeSunErr1 errorTime" id="resEstTimeSunSECErr"></span>*}
								</span>
							</span>
							</div>
							<!--Open Time Close TIme New-->	
						</div>
						
					</div>
					<div class="form-group">
					
						<div class="col-sm-offset-4 col-sm-4">
							<input type="submit" class="myaccsubmitbtn" onclick="return editOpenCloseInfoValidate();" value="{$LANG.res_myaccount_setopensubmitbut}" />
						</div>
							
						
					</div>
				</div>
			</div>
		</div>
	</div>
	{*-----------------------------------*******LOGO PHOTOS VIDEOS MARKET BANNER*****************-----------------------------------*}	
	{*------------------------ Edit Logo, Photo, videos, Market banner -------------------------------*}
	
	<div class="settingTabsContent ordersInnerWrap ionTabs__item" data-name="details_photo">
		<div class="settingsInnerWrap">
			<div class="contain">
				<!-- Content start -->
				<div id="succPhotoMsg"></div>
				<div class="col-sm-12">
					<form class="form-horizontal" name="" method="post" action="restaurantOwnerMyaccount_setting.php#tabs|Tabs_Group:details_photo" onsubmit="return photoVideoDisplayValid();">
						<div class="form-group">
							<label class=" control-label font-normal col-sm-3">{$LANG.res_myaccount_display_photos}</label>
							<div class="col-sm-9">
								<div class="radioln radio-inline radio-primary">
									<input type="radio" name="restaurant_display_photo" id="restaurant_display_photo_yes" value="Yes" {if $restaurantDetailsList.0.restaurant_display_photo eq 'Yes'} checked="checked"{/if} onclick="resPhotoShowornot()"/>
									<label class="btnName" for="restaurant_display_photo_yes" onclick="resPhotoShowornot()">&nbsp;{$LANG.res_myaccount_display_photosyes}</label> 
								</div>
								<div class="radioln radio-inline radio-primary">	
									<input type="radio" name="restaurant_display_photo" id="restaurant_display_photo_no" value="No" {if $restaurantDetailsList.0.restaurant_display_photo eq 'No'} checked="checked"{/if} onclick="resPhotoShowornot()"/>
									<label class="btnName" for="restaurant_display_photo_no" onclick="resPhotoShowornot()">&nbsp;{$LANG.res_myaccount_display_photosno}</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class=" control-label font-normal col-sm-3">{$LANG.res_myaccount_display_video}</label>
							<div class="col-sm-9">
								<div class="radioln radio-inline radio-primary">
									<input type="radio" name="restaurant_display_video" id="restaurant_display_video_yes" value="Yes" {if $restaurantDetailsList.0.restaurant_display_video eq 'Yes'} checked="checked"{/if} onclick="resVideoShowornot()" />
									<label class="btnName" for="restaurant_display_video_yes" onclick="resVideoShowornot()">&nbsp;{$LANG.res_myaccount_display_videoyes}</label> 
								</div>
								<div class="radioln radio-inline radio-primary">
									<input type="radio" name="restaurant_display_video" id="restaurant_display_video_no" value="No" {if $restaurantDetailsList.0.restaurant_display_video eq 'No'} checked="checked"{/if} onclick="resVideoShowornot()" />
									<label class="btnName" for="restaurant_display_video_no" onclick="resVideoShowornot()">&nbsp;{$LANG.res_myaccount_display_videosno}</label>
								</div>						
							</div>
						</div>
						<div class="form-group" {if $restaurantDetailsList.0.restaurant_display_video eq 'No'}style="display:none;"{/if} id="restaurant_video_container">
							<label class=" control-label font-normal col-sm-3">{$LANG.res_myaccount_youtube_videocontent}</label>
							<div class="col-sm-6">
								<textarea name="restaurant_video" id="restaurant_video" rows="" cols="" class="form-control">
									{$restaurantDetailsList.0.restaurant_video|stripslashes}
								</textarea>
							</div>
						</div>
						{*<div class="form-group">
							<span class="addPageRightFont">{$LANG.res_myaccount_display_marketbanner}</span><span class="colon1">:</span>
							<span class="radioBtn">
								<input type="radio" name="restaurant_display_banner" id="restaurant_display_banner_yes" value="Yes" {if $restaurantDetailsList.0.restaurant_display_banner eq 'Yes'} checked="checked"{/if} /><label class="btnName" for="yes">&nbsp;{$LANG.res_myaccount_display_marketbanyes}</label> 
								<input type="radio" name="restaurant_display_banner" id="restaurant_display_banner_no" value="No" {if $restaurantDetailsList.0.restaurant_display_banner eq 'No'} checked="checked"{/if} /><label class="btnName" for="no">&nbsp;{$LANG.res_myaccount_display_marketbanno}</label>
							</span>
						</div>*}
						<div class="form-group">
							<div class="col-sm-5 col-sm-offset-3">					
								<input type="submit" class="myaccsubmitbtn" onclick="return photoVideoDisplayValid();" value="{$LANG.res_myaccount_setlocconsubmitbut}" />
							</div>
						</div>	
					</form>
				</div>
			</div>
					
			<div class="contain" id="restaurant_display_photos" {if $restaurantDetailsList.0.restaurant_display_photo eq 'No'}style="display:none;"{/if}>	
				<form name="resOwnerPhotoUpdate" method="post" action="restaurantOwnerMyaccount_setting.php#tabs|Tabs_Group:details_photo" enctype="multipart/form-data">
				<!--Restaurant Owner Photos Update start-->
				<input type="hidden" name="action" value="resOwnerPhotoUpdates" />
				<input type="hidden" name="photonumber" value="" />
				<input type="hidden" name="mode" value="" />
				
				<!--Restaurant Owner Logo Update Start-->
				<div class="newInnerLogo2">
					<h1 class="restOwnMyHead">{$LANG.res_myaccount_setlogo}</h1>
					<div class="clr"></div>
					<div class="addPageCont">
						{if $restaurantDetailsList.0.restaurant_logo neq ''}
							<div class="logoUpload" id="res_owner_logo1">
								<div class="logoImgInner">
									<div class="logo posRelate">
										<img src="{$SITE_IMAGE_RESTAURANT_URL}/logo/{$restaurantDetailsList.0.restaurant_logo}" alt="image" title="" class="logoInfoImg" width="70" height="70"  />
										<a href="javascript:void(0);" id="restaurantlogo1" onclick="resownerdeletelogo();" class="logoCloseIcon"></a>		
									<input type="button" value="Modify" class="addphoto-button logoInfoImgTxt" />
									<input type="file" class="hided modifyNew" size="10" name="restaurant_logo" id="restaurant_logo" onChange="resownerlogoUpdate('add');" />
									</div>
								</div>
							</div>
							
							<div id="res_owner_add_disp_logo" style="display:none;">
								<div class="logoImgInner">
									<div class="logo posRelate">
										<img src="{$SITE_IMAGE_URL}/no-image.jpg" alt="No Photo" title="" width="70" height="70" class="logoInfoImg" />
										<input type="button" value="Add" class="addphoto-button logoInfoImgTxt" />
										<input type="file" class="hided modifyNew" size="10" name="restaurant_log" id="restaurant_log" onChange="resownerlogoAdd('add');" />
									</div>
								</div>
							</div>
						{else}
							<div id="res_owner_add_disp_logo" >
								<div class="logoImgInner">
									<div class="logo posRelate">
										<img src="{$SITE_IMAGE_URL}/no-image.jpg" alt="No Photo" title="" width="70" height="70" class="logoInfoImg" />
										<input type="button" value="Add" class="addphoto-button logoInfoImgTxt" />
										<input type="file" class="hided modifyNew" size="10" name="restaurant_log" id="restaurant_log" onChange="resownerlogoAdd('add');" />
									</div>
								</div>
							</div>
						{/if}
					</div>
				</div>
				<!--Restaurant Owner Logo Update end-->
			{*	<!-- Banner Image start -->
				<div class="newInnerLogo2">
					<h1 class="restOwnMyHead">{$LANG.res_myaccount_setmarketban}</h1>
					<div class="restaurantBannerCode">
					
					<div id="marketbannerimageOpt" >
						<div class="addPageCont">
							{if $restaurantDetailsList.0.res_marketbanner_img_code neq ''}
								
								<div class="logoUpload" id="res_owner_banner1">
									<div class="logoImgInner">
										<div class="logo posRelate">
											<img src="{$SITE_IMAGE_RESTAURANT_URL}/banner/{$restaurantDetailsList.0.res_marketbanner_img_code}" alt="image empty" title="" class="logoInfoImg" width="70" height="70" />
											<a href="javascript:void(0);" id="restaurantbanner1" onclick="resownerdeletebanner('{$resid}');" class="logoCloseIcon"></a>
										
										
										<input type="button" value="Modify" class="addphoto-button logoInfoImgTxt" />
										<input type="file" class="hided modifyNew" size="10" name="restaurant_banner" id="restaurant_banner" onChange="resownerbannerUpdate();" />
										</div>
									</div>
								</div>
								
								<div id="res_owner_add_disp_banner" style="display:none;">
									<div class="logoImgInner">
										<div class="logo posRelate">
											<img src="{$SITE_IMAGE_URL}/nophoto.jpg" alt="No Photo" title="" width="70" height="70" class="logoInfoImg" />
											<input type="button" value="Add" class="addphoto-button logoInfoImgTxt" />
											<input type="file" class="hided modifyNew" size="10" name="restaurant_bann" id="restaurant_bann" onChange="resownerbannerAdd();" />
										</div>
									</div>
								</div>
							{else}
								<div id="res_owner_add_disp_banner" >
									<div class="logoImgInner">
										<div class="logo posRelate">
											<img src="{$SITE_IMAGE_URL}/nophoto.jpg" alt="No Photo" title="" width="70" height="70" class="logoInfoImg" />
											<input type="button" value="Add" class="addphoto-button logoInfoImgTxt" />
											<input type="file" class="hided modifyNew" size="10" name="restaurant_bann" id="restaurant_bann" onChange="resownerbannerAdd();" />
										</div>
									</div>
								</div>
							{/if}
						</div>
					</div>
					</div>
				</div>
				<!-- Banner Image end -->*}
				<div class="clr"></div>
				<div class="newInner1">
					<h1 class="restOwnMyHead">{$LANG.res_myaccount_setphoto}</h1>
					<div class="clr"></div>
					{section name=photo loop=$photoLimit}
					{assign var="indexval" value=0}
					{assign var="rownumval" value="restaurant_photos"|cat:$smarty.section.photo.rownum}
					
						<div class="logoImgInner">
							<div class="logo posRelate">
								{if $restaurantDetailsList.$indexval.$rownumval neq ''}
								<div id="res_owner_photo{$smarty.section.photo.rownum}" class="photoMargin">
									<!--Modify-->
									<img src="{$SITE_IMAGE_RESTAURANT_URL}/photos/{$restaurantDetailsList.$indexval.$rownumval}" alt="Photo{$rownumval}" title="" width="70" height="70" class="logoInfoImg"  />
								
									<a href="javascript:void(0);" id="restaurant_photo{$smarty.section.photo.rownum}" onclick="resownerdeletephotos('{$resid}','{$smarty.section.photo.rownum}');" class="logoCloseIcon"></a>
								
									<input type="button" value="modify" class="addphoto-button logoInfoImgTxt" />
									<input type="file" class="hided modifyNew" size="10" name="{$rownumval}" id="{$rownumval}" onChange="resownerphotoUpdate('{$smarty.section.photo.rownum}','modify');" />
								</div>
								
								<div id="res_owner_add_disp_photo{$smarty.section.photo.rownum}" style="display:none;" class="photoMargin">
									<img src="{$SITE_IMAGE_URL}/no-image.jpg" alt="No Photo" title="" width="70" height="70" class="logoInfoImg" />
								
									<input type="button" value="Add" class="addphoto-button logoInfoImgTxt" />
									<input type="file"  class="hided modifyNew" size="10" name="restaurant_photo{$smarty.section.photo.rownum}" id="restaurant_photo1{$smarty.section.photo.rownum}" onchange="resownerphotoUpdate('{$smarty.section.photo.rownum}','add');"  />
									
								</div>
											
								{else}
									<!--Add-->
									<img src="{$SITE_IMAGE_URL}/no-image.jpg" alt="No Photo" title="" width="70" height="70" class="logoInfoImg" />
									
									<input type="button" value="Add" class="addphoto-button logoInfoImgTxt" />
									<input type="file"  class="hided modifyNew" size="10" name="restaurant_photo{$smarty.section.photo.rownum}" id="restaurant_photo2{$smarty.section.photo.rownum}" onChange="resownerphotoUpdate('{$smarty.section.photo.rownum}','add');" />
								 {/if}	
							</div>
						</div>
					{/section}
				</div>
				<!-- Videos start -->
				{if $restaurantDetailsList.0.restaurant_video neq ''}
				<div class="newInner1">
					<div class="contain"><h1 class="restOwnMyHead">{$LANG.res_myaccount_setvideo}</h1></div>
					<div class="restInfo_wrapVideo" id="showVideoYoutube">{$restaurantDetailsList.0.restaurant_video|stripslashes}</div>
				</div>
				{/if}
				<!-- Videos end -->
				</form>
				
				
			</div>
		</div>		
	</div>
	<!--Restaurant Owner Photos Update end-->
	
	{**********************MAP START*******************************}
	<div class="settingTabsContent ordersInnerWrap ionTabs__item" data-name="details_map">
		<div class="settingsInnerWrap">
			<div class="contain">
				<h1 class="restOwnMyHead">{$LANG.res_myaccount_setmap}</h1>
				{*<a class="restOwnMyAddBtn" href="javascript:void(0);">{$LANG.res_myaccount_setmapedit}</a>*}
				<!-- Content start -->
					<div class="contain">
						<div id="showGoogleMaps" style="width: 100%; height: 350px;"></div>
					</div>
				<!-- Content end -->
			</div>
		</div>
	</div>
	{**********************MAP END*******************************}
	
	{*************************** BANK INFO start ****************************}
	<div class="settingTabsContent ordersInnerWrap ionTabs__item" data-name="details_bankinfo">
		<div class="settingsInnerWrap">
			<div class="contain">
				<div class="bankInfoDetails">
					<div id="bankinfo_update"></div>
					<h1 class="restOwnMyHead">{$LANG.res_myacc_bank_title}</h1>
					
					<div class="addPageCont">
						<span class="addPageRightFont"><span class="yellowStar"></span>{$LANG.res_myacc_bank_name} </span>
						<span class="colon1">:</span>
						<input class="textbox" type="text" name="res_bank_name" id="res_bank_name" value="{$restaurantDetailsList.0.res_bank_name|stripslashes}" />
						<span class="errClass resBankNameErr" id="resBankNameErr"></span>
					</div>
					
					<div class="addPageCont">
						<span class="addPageRightFont"><span class="yellowStar"></span>{$LANG.res_myacc_bank_acno} </span>
						<span class="colon1">:</span>
						<input class="textbox" type="text" name="res_ac_no" id="res_ac_no" value="{$restaurantDetailsList.0.res_ac_no|stripslashes}" />
						<span class="errClass resBankAcNoErr" id="resBankAcNoErr"></span>
					</div>
					
					<div class="addPageCont">
						<span class="addPageRightFont"><span class="yellowStar"></span>{$LANG.res_myacc_bank_routineno} </span>
						<span class="colon1">:</span>
						<input class="textbox" type="text" name="res_routine_no" id="res_routine_no" value="{$restaurantDetailsList.0.res_routine_no|stripslashes}" />
						<span class="errClass resBankRoutineNoErr" id="resBankRoutineNoErr"></span>
					</div>
					
					<div class="addPageCont">
						<span class="addPageRightFont"><span class="yellowStar"></span>{$LANG.res_myacc_bank_swift_code} </span>
						<span class="colon1">:</span>
						<input class="textbox" type="text" name="res_swift_code" id="res_swift_code" value="{$restaurantDetailsList.0.res_swift_code|stripslashes}" />
						<span class="errClass resBankSwiftNoErr" id="resBankSwiftNoErr"></span>
					</div>
					
					<div class="addPageCont">
						<span class="addPageRightFont">&nbsp;</span>
						<span class="colon1">&nbsp;</span>
						<input type="submit" class="myaccsubmitbtn" onclick="return editBankInfoValidate();" value="{$LANG.res_myaccount_setdeliversubmitbut}" />
					</div>
				</div>
			</div>
		</div>		
	</div>
	{**********************BANK INFO INFO END*******************************}
	
	{*************************** INVOICE INFO start ****************************}
	<div class="settingTabsContent ordersInnerWrap ionTabs__item"  data-name="details_invoice">
		<div class="settingsInnerWrap">
			<div class="contain">
				<div class="invoiceInfoDetails">
					<div id="invoiceinfo_update"></div>
					<h1 class="restOwnMyHead">{$LANG.res_myacc_invoice_title}</h1>
					
					<div class="addPageCont">
						<span class="addPageRightFont">{$LANG.res_myacc_inv_time_period} </span>
						<span class="colon1">:</span>
						<select id="restaurant_inv_setting" name="restaurant_inv_setting" class="selectboxindex">
							<option value="m1" {if $restaurantDetailsList.0.restaurant_inv_setting eq 'm1'}selected="selected"{/if}>{$LANG.res_myaccount_invoice_monthly}</option>
							<option value="m2" {if $restaurantDetailsList.0.restaurant_inv_setting eq 'm2'}selected="selected"{/if}>{$LANG.res_myaccount_invoice_monthlytwice}</option>
							<option value="m4" {if $restaurantDetailsList.0.restaurant_inv_setting eq 'm4'}selected="selected"{/if}>{$LANG.res_myaccount_invoice_monthlyfour}</option>
						</select>
						<span class="errClass resInvSettErr" id="resInvSettErr"></span>
					</div>
					
					<div class="addPageCont">
						<span class="addPageRightFont">&nbsp;</span>
						<span class="colon1">&nbsp;</span>
						<input type="submit" class="myaccsubmitbtn" onclick="return editInvoiceInfoValidate();" value="{$LANG.res_myaccount_setdeliversubmitbut}" />
					</div>
					
				</div>
			</div>
		</div>	
	</div>
    {* RESTAURANT Commission INFO START *}
	{*-----------------------------------*****************************************-----------------------------------*}
	<div class="settingTabsContent ordersInnerWrap ionTabs__item" data-name="details_commission">
		<div class="settingsInnerWrap">
				<div class="commissionInfoDetails">
					<h1 class="restOwnMyHead">{*$LANG.res_myaccount_setcommissioninfo*}Commission Info</h1>
					{*<a class="btn btn-warning pull-right btn-sm" href="javascript:void(0);" onclick="editCommissionInfoShow();"><i class="glyphicon glyphicon-edit marRight"></i>{$LANG.res_myaccount_setdeliveredit}</a>*}
					<!-- Content start -->
					<div class="addPageCont">
						<span class="addPageRightFont">{*$LANG.res_myaccount_setcommission*}Commission</span>
						<span class="colon1">:</span>
						<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_commission}</span>
					</div>	
				
					<!-- Content end -->
				</div>
				{*------------------ Restaurant EDIT Commission INFO strat --------------------------*}
				<!-- Edit Delivery Info Start -->
				<div id="editCommissionInfo" class="col-sm-12" style="display:none;">
                 	<div class="addbtn pull-right" onclick="return backCommissionInfo();"><i class="glyphicon glyphicon-circle-arrow-left marRight"></i>{$LANG.res_myaccount_setdeliverbackbut}</div>
                 	
					<h1 class="restOwnMyHead">{*$LANG.res_myaccount_setcommissionedit*}Edit Commission Info</h1>
					<div class="form-horizontal">
						<div id="CommissionErr"></div>
					<div class="form-group">
						<label for="restaurant_estimated_time_res" class="col-sm-4 control-label font-normal">{*$LANG.res_myaccount_setcommissioninfo*}Commission Info (%)</label>
						<div class="col-sm-2">
							<input class="form-control" type="text" name="restaurant_commission" id="restaurant_commission" value="{$restaurantDetailsList.0.restaurant_commission}" />
                            <span class="errClass resCommissionTimeErr" id="resCommissionTimeErr"></span>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-4">
							<input type="submit" class="myaccsubmitbtn" onclick="return editCommissionInfoValidate();" value="{*$LANG.res_myaccount_setdeliversubmitbut*}Submit" />
						</div>	
					</div>
					
				</div>
				<!-- Content end -->
			</div>
		</div>
	</div>
	{*-----------------------------------***************************************************-----------------------------------*}
						{*  RESTAURANT Commission INFO END  *}
	{**********************INVOICE INFO INFO END*******************************}
	 <div class="ionTabs__preloader"></div> 
	</div>
</div>
<!--</form>-->
<!-- Setting end -->