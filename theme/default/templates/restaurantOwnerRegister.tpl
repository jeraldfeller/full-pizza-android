<div class="container">
	<div class="row">
		<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
			<div class="customerLeftBox clearfix">
				<h1 class="customSignupHead">{$LANG.res_reg_hey}</h1>
				<div class="ownerSignupTop">
					<h2>{$LANG.res_reg_join}</h2>
					<h3>{$LANG.res_reg_increasesales}</h3>
				</div>
				<!-- Create Account start -->
				<form name="restaurantowner" method="post" action="" onsubmit="return restOwnerRegisterValidate();" class="form-horizontal">
					<h1 class="customSignupHead">{$LANG.res_reg_info}</h1>
					<div class="custRegBox">
						<div class="loginBg">
							<div class="form-group no-margin-bottom">
								<div class="col-sm-offset-4 col-sm-7">
									<div class="mandatoryField">
										<span class="redStar">{$LANG.res_mandatory_symbol|utf8_encode}</span> - {$LANG.res_reg_mandatory}
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-7">
									<span id="errormsg3" class="errormsg_login"></span>
								</div>
							</div>
							 <div class="form-group">
								<label for="customer_name" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>{$LANG.res_reg_resname}</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="restaurant_name" id="restaurant_name" value="{$smarty.post.restaurant_name}"/>
									<script type="text/javascript">document.restaurantowner.restaurant_name.focus();</script>
								</div>
							</div>
							<div class="form-group">
								<label for="customer_name" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>{$LANG.res_reg_resphone}</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="restaurant_phone" id="restaurant_phone" value="{$smarty.post.restaurant_phone}" maxlength="15"/>
								</div>
							</div>
							<div class="form-group">
								<label for="cusrestaurant_faxtomer_name" class="col-sm-4 control-label font-normal">{$LANG.res_reg_resfax}</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="restaurant_fax" id="restaurant_fax" value="{$smarty.post.restaurant_fax}"/>
								</div>
							</div>
							<div class="form-group">
								<label for="restaurant_contact_name" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>{$LANG.res_reg_contactname}</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="restaurant_contact_name" id="restaurant_contact_name" value="{$smarty.post.restaurant_contact_name}" />
								</div>
							</div>
							<div class="form-group">
								<label for="restaurant_contact_phone" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>{$LANG.res_reg_contactphone}</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="restaurant_contact_phone" id="restaurant_contact_phone" value="{$smarty.post.restaurant_contact_phone}" maxlength="15"/>
								</div>
							</div>
							<div class="form-group">	
								<label for="restaurant_contact_email" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>{$LANG.res_reg_contactemail}</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="restaurant_contact_email" id="restaurant_contact_email" value="{$smarty.post.restaurant_contact_email}"/>
								</div>
							</div>
							<div class="form-group">	
								<label for="restaurant_website" class="col-sm-4 control-label font-normal">{$LANG.res_reg_reswebsite}</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="restaurant_website" id="restaurant_website" value="{$smarty.post.restaurant_website}"/>
								</div>
							</div>
							<div class="form-group">
								<label for="restaurant_streetaddress" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>{$LANG.res_reg_address}</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="restaurant_streetaddress" id="restaurant_streetaddress" value="{$smarty.post.restaurant_streetaddress}"/>
								</div>
							</div>
							<div class="form-group">
								<label for="restaurant_state" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>{$LANG.res_reg_state}</label>
								<div class="col-sm-7">
									<div class="selectboxouter">
										<div class="selectboxInner">
											<select class="form-control" name="restaurant_state" id="restaurant_state" onchange="getCityListRest(this.value);">
												<option value="">{$LANG.res_reg_select}</option>
												{foreach from=$showStatelist item=state}
												<option value="{$state.statecode}">{$state.statename|stripslashes}</option>
												{/foreach}
											</select>
										</div>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label for="restaurant_city" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>{$LANG.res_reg_city}</label>
								<div class="col-sm-7">
									<div class="selectboxouter">
										<div class="selectboxInner">
										<div id="showResCityList">
											<select class="form-control" name="restaurant_city" id="restaurant_city_con" >
												<option value="">{$LANG.res_reg_firstselectstate}</option>
												{foreach from=$selectCityList item=city}
												<option value="{$city.city_id}">{$city.cityname|stripslashes}</option>
												{/foreach}
											</select>
										</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label for="restaurant_zip" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.res_mandatory_symbol|utf8_encode}</span>{$LANG.res_reg_zip}</label>
								<div class="col-sm-7">
									<div class="selectboxouter">
										<div class="selectboxInner">
											<div id="showResZipList">
												<input type="text" class="form-control" name="restaurant_zip" id="restaurant_zip" autocomplete="off" value="{if $restaurantEditList.0.restaurant_zip neq ''}{$restaurantEditList.0.restaurant_zip}{/if}" onfocus="if (this.value == '{if $restaurantEditList.0.restaurant_zip neq ''}{$restaurantEditList.0.restaurant_zip}{else}Restaurant Zip Code{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $restaurantEditList.0.restaurant_zip neq ''}{$restaurantEditList.0.restaurant_zip}{else}{/if}';" onkeyup="autoSuggestZip();" />
												{*<select class="selectboxindex" name="restaurant_zip" id="restaurant_zip" >
													<option value="">{$LANG.res_reg_firstselectcity}</option>
													{foreach from=$showZiplist item=ziplist}
														<option value="{$ziplist.zipcode_id}" {if $restaurantEditList.0.restaurant_zip eq $ziplist.zipcode_id}selected="selected"{/if}>{$ziplist.zipcode|stripslashes} - {$ziplist.areaname|stripslashes}</option>
													{/foreach}
												</select>*}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<!-- Create Account end -->
					
					<!-- Login Info end -->
					<div class="contain">
						<div class="form-group no-margin-bottom">
							<div class="col-sm-offset-4 col-sm-7">
								<input type="submit" class="submit-bg" id="restaurantregistersubmit" value="{$LANG.res_reg_submitbut}" />
							</div>
						</div>
					</div>
				 </div>
				</form>
			</div>
		</div>
		<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 ">
			<div class="customerRightBox clearfix">
				<h1 class="haveanAccnt">{$LANG.res_reg_account}</h1>
				<h1 class="restOwnerLogin">{$LANG.res_reg_ownerlog}</h1>
				<div class="contain center">
					<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerLogin.php{else}restaurant-login{/if}" class="submit-bg">
						{$LANG.res_reg_loginbut}
					</a>
				</div>
			</div>
			{if $sitefeedbackcnt gt 0}
			<div class="restOwnerRightCont">
				<h1 class="restOwnerRiteHead">{$LANG.res_reg_ownersay}</h1>
				<div class="restRightContNew">
				{section name="feed" loop=$sitefeedbacklist}
					<p>{$sitefeedbacklist[feed].feedback|stripslashes}</p>
					<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantDetails.php?resid={$sitefeedbacklist[feed].restaurant_id}&amp;resname={$sitefeedbacklist[feed].restaurant_seourl}{else}menu/{$sitefeedbacklist[feed].restaurant_id}/{$sitefeedbacklist[feed].restaurant_seourl}{/if}" class="color1">{$sitefeedbacklist[feed].restaurant_name|stripslashes}, {$sitefeedbacklist[feed].cityname|stripslashes}</a>
				{/section}
				</div>
			</div>
			{/if}		
		</div>
	</div>
</div>