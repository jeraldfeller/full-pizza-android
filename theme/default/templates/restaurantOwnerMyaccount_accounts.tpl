<!-- Accounts start -->
<div class="accountDetails">
	{include file='restaurantOwnerMyaccount_accounts_ajax.tpl'}
</div>
<!-- Edit Accounts -->
<div id="editAccounts" style="display:none;">
	<div class="detailsInnerNewWrap">
	<!-- Accounts start -->
	<h1 class="restOwnMyHead">{$LANG.res_myaccount_accedit}</h1>
	<div class="mandatoryField" style="color:#fff;">
	<span class="yellowStar">*</span>
	- {$LANG.res_myaccount_accmandatory}
	</div>
		<div class="ownerStaticContainer">
		
			{$objRestaurant->restaurantDetailsList()}
		<!--<form name="res_accout" method="post" onsubmit="return restaurantAccountsValidate();" >-->
			
			<div class="restTabNewIn1">
				<div class="addPageCont">
					<span class="addPageRightFont"><span class="yellowStar">*</span>{$LANG.res_myaccount_accresname}</span>
					<span class="colon1">:</span>
					<input class="textbox" type="text" name="restaurant_name" id="restaurant_name1" value="{$restaurantDetailsList.0.restaurant_name|stripslashes}" />
					<!--<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_name|stripslashes}</span>-->
					<span class="errClass" id="resNameErr"></span>
				</div>	
				<div class="addPageCont">
					<span class="addPageRightFont"><span class="yellowStar">*</span>{$LANG.res_myaccount_accresphone} </span>
					<span class="colon1">:</span>
					<input class="textbox" type="text" name="restaurant_phone" id="restaurant_phone1" value="{$restaurantDetailsList.0.restaurant_phone|stripslashes}" />
					<span class="errClass" id="resPhoneErr"></span>
				</div>
				<div class="addPageCont">
					<span class="addPageRightFont">{$LANG.res_myaccount_accreswebsite} </span>
					<span class="colon1">:</span>
					<input class="textbox" type="text" name="restaurant_website" id="restaurant_website1" value="{$restaurantDetailsList.0.restaurant_website|stripslashes}" />
					<span class="errClass" id="resWebErr"></span>
				</div>
				<div class="addPageCont">
					<span class="addPageRightFont"><span class="yellowStar">*</span>{$LANG.res_myaccount_accresfax} </span>
					<span class="colon1">:</span>
					<input class="textbox" type="text" name="restaurant_fax" id="restaurant_fax1" value="{$restaurantDetailsList.0.restaurant_fax|stripslashes}" />
					<span class="errClass" id="resFaxErr"></span>
				</div>
				<div class="addPageCont">
					<span class="addPageRightFont"><span class="yellowStar">*</span>{$LANG.res_myaccount_accaddress} </span>
					<span class="colon1">:</span>
					<input class="textbox" type="text" name="restaurant_streetaddress" id="restaurant_streetaddress1" value="{$restaurantDetailsList.0.restaurant_streetaddress|stripslashes}" />
					<span class="errClass" id="resStrErr"></span>
				</div>
				
				<div class="addPageCont">
					<span class="addPageRightFont"><span class="yellowStar">*</span>{$LANG.res_myaccount_accstate} </span>
					<span class="colon1">:</span> 
					<select class="selectboxindex" name="restaurant_state" id="restaurant_state1" onchange="getCityListRest(this.value);">
						<option value="">{$LANG.res_myaccount_account_select}</option>
						{foreach from="$showStatelist" item=state}
						<option value="{$state.statecode}" {if $restaurantDetailsList.0.restaurant_state eq $state.statecode}selected="selected"{/if}>{$state.statename|stripslashes}</option>
						{/foreach}
					</select>
					<span class="errClass" id="resStaErr"></span>
					<!--<span class="addPageRightFont">{$restaurantDetailsList.0.restaurant_state}</span>-->
				</div>
			</div>
			<div class="restTabNewIn2">
				<div class="addPageCont">
					<span class="addPageRightFont"><span class="yellowStar">*</span>{$LANG.res_myaccount_acccity} </span>
					<span class="colon1">:</span> 
					<div id="showResCityList">
						<select class="selectboxindex" name="restaurant_city" id="restaurant_city1">
							<option value="">{$LANG.res_myaccount_account_firstselect}</option>
							{foreach from="$selectCityList" item=city}
								<option value="{$city.city_id}" {if $restaurantDetailsList.0.restaurant_city eq $city.city_id}selected="selected"{/if}>{$city.cityname|stripslashes}</option>
							{/foreach}
						</select>
					</div>
					<span class="errClass" id="resCitErr"></span>
					<!--<span class="addPageRightFont">{$restaurantcity}</span>-->
				</div>
				<div class="addPageCont">
					<span class="addPageRightFont"><span class="yellowStar"></span>{$LANG.res_myaccount_acczip} </span>
					<span class="colon1">:</span> 
					<div id="showResZipList">
						
						<input type="text" class="txt" name="restaurant_zip" id="restaurant_zip1" autocomplete="off" value="{if $restaurantDetailsList.0.restaurant_zip neq ''}{$restaurantDetailsList.0.restaurant_zip}{else}Zip Code{/if}" onfocus="if (this.value == '{if $restaurantDetailsList.0.restaurant_zip neq ''}{$restaurantDetailsList.0.restaurant_zip}{else}Zip Code{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $restaurantDetailsList.0.restaurant_zip neq ''}{$restaurantDetailsList.0.restaurant_zip}{else}Zip Code{/if}';" onkeyup="autoSuggestZip();"/>
						
						{*<select class="selectboxindex" name="restaurant_zip" id="restaurant_zip1" >
							<option value="">{$LANG.res_myaccount_accselectcity}</option>
							{foreach from="$showZiplist" item=ziplist}
								<option value="{$ziplist.zipcode_id}" {if $restaurantDetailsList.0.restaurant_zip eq $ziplist.zipcode_id}selected="selected"{/if}>{$ziplist.zipcode|stripslashes} - {$ziplist.areaname|stripslashes}</option>
							{/foreach}
						</select>*}
					</div>
					<span class="errClass" id="resZipErr"></span>
					<!--<span class="addPageRightFont">{$restaurantzip}</span>-->
				</div>
				<div class="addPageCont">
					<span class="addPageRightFont"><span class="yellowStar">*</span>{$LANG.res_myaccount_acccontactname} </span>
					<span class="colon1">:</span>
					<input class="textbox" type="text" name="restaurant_contact_name" id="restaurant_contact_name1" value="{$restaurantDetailsList.0.restaurant_contact_name|stripslashes}" />
					<span class="errClass" id="resCntNameErr"></span>
				</div>
				<div class="addPageCont">
					<span class="addPageRightFont"><span class="yellowStar">*</span>{$LANG.res_myaccount_acccontactphone} </span>
					<span class="colon1">:</span>
					<input class="textbox" type="text" name="restaurant_contact_phone" id="restaurant_contact_phone1" value="{$restaurantDetailsList.0.restaurant_contact_phone|stripslashes}" maxlength="15"/>
					<span class="errClass" id="resCntPhoneErr"></span>
				</div>
				<div class="addPageCont">
					<span class="addPageRightFont"><span class="yellowStar">*</span>{$LANG.res_myaccount_acccontactemail} </span>
					<span class="colon1">:</span>
					<input class="textbox" type="text" name="restaurant_contact_email" id="restaurant_contact_email1" value="{$restaurantDetailsList.0.restaurant_contact_email|stripslashes}" />
					<span class="errClass" id="resEmailErr"></span>
				</div>
				<div class="addPageCont">
					<span class="addPageRightFont"><span class="yellowStar">*</span>{$LANG.res_myaccount_accpassword}</span>
					<span class="colon1">:</span>
					<input class="textbox" type="password" name="restaurant_password" id="restaurant_password" value="{$restaurantDetailsList.0.restaurant_password|stripslashes}" autocomplete="off"/>
				</div>
				<div class="loginBtnMargin">
					<span class="buttonleft">
						<span class="buttonright">
							<input type="submit" class="" onclick="return restaurantAccountsValidate();" value="{$LANG.res_myaccount_accsubmitbut}" />
						</span>
					</span>
				</div>
			</div>
			
			<!--</form>-->
		</div>
	</div>
	<!-- Accounts end -->
</div>