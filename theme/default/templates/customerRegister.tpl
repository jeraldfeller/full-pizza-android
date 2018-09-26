{include file='home_header.tpl'}


<div class="container">
	<!-- Create Account start -->
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1 col-md-7 col-sm-12 col-xs-12">
			<div class="customerLeftBox clearfix bordeContenedores">

				<form name="customer_register" method="post" action="" onsubmit="return customerRegisterValidate();" class="form-horizontal">
					<h1 class="customSignupHead">{$LANG.customer_reg_create_account}</h1>					
					<div class="custRegBox">
						<div class="loginBg">
							<div class="mandatoryField">
								<span class="redStar">{$LANG.customer_mandatory_symbol|utf8_encode}</span> - {$LANG.customer_reg_mandatory_fields}
							</div>
							<div class="clr"></div>
							<span id="errormsg" class="errormsg_login"></span>
							  <div class="form-group">
									<label for="customer_name" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.customer_mandatory_symbol|utf8_encode}</span>{$LANG.customer_reg_full_name}</label>
									<div class="col-sm-7">
										<input type="text" class="form-control bordesInputs" name="customer_name" id="customer_name" value="{$smarty.post.customer_name}" />
										<script type="text/javascript">document.customer_register.customer_name.focus();</script>
										<span id="cusnameerrormsg" class="errClass1"></span>
									</div>
								</div>
							  <div class="form-group">
									<label for="customer_lastname" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.customer_mandatory_symbol|utf8_encode}</span>{$LANG.customer_reg_last_name}</label>
									<div class="col-sm-7">
										<input type="text" class="form-control bordesInputs" name="customer_lastname" id="customer_lastname" value="{$smarty.post.customer_lastname}" />
										<span id="cuslastnameerrormsg" class="errClass1"></span>
									</div>
							   </div>							  
							  
							  {*<div class="form-group">
									<label for="customer_buildtype" class="col-sm-4 control-label font-normal">{$LANG.customer_reg_apt_suite_building}</label>
									<div class="col-sm-7">
									<input type="text" class="form-control bordesInputs" name="customer_buildtype" id="customer_buildtype" value="{$smarty.post.customer_buildtype}"/>
									<span id="cusbuildtypeerrormsg" class="errClass1 "></span>
									</div>
							   </div>*}
							{*<div class="form-group">
								<label for="customer_crossstreet" class="col-sm-4 control-label font-normal"><span class="redStar">*</span>{$LANG.customer_reg_cross_street}</label>
								<div class="col-sm-7">
							   <input type="text" class="txt" name="customer_crossstreet" id="customer_crossstreet" value="{$smarty.post.customer_crossstreet}"/>
							   <span id="cuscrossstreeterrormsg" class="errClass1 "></span>
							   </div>
							</div>*}
							
						
						   {*<div class="form-group">
								<label for="customer_state" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.customer_mandatory_symbol|utf8_encode}</span>{$LANG.customer_reg_state}</label>
								<div class="col-sm-7">
									<select name="customer_state" id="customer_state" class="form-control" onchange="getCityListCus(this.value);">
										<option value="">{$LANG.customer_reg_statestate}</option>
										{section name="state" loop=$showStatelist}
											<option value="{$showStatelist[state].statecode}" {if $showStatelist[state].statecode eq $customerprofiledetails.0.customer_state}selected="selected"{/if}>{$showStatelist[state].statename|stripslashes}</option>
										{/section}
										
									</select>						
									<span id="cusstateerrormsg" class="errClass1 "></span>
								</div>
						   </div>	
							
							<div class="form-group">
								<label for="customer_state" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.customer_mandatory_symbol|utf8_encode}</span>{$LANG.customer_reg_city}</label>
								<div class="col-sm-7">
									<span id="showCusCityList">
										<select name="customer_city" id="customer_city" class="form-control" >
											<option value="">{$LANG.customer_reg_firstselect}</option>
											{section name=city loop=$selectCityList}
												<option value="{$selectCityList[city].city_id}" {if $selectCityList[city].city_id eq $customerprofiledetails.0.customer_city}selected="selected"{/if}>{$selectCityList[city].cityname|stripslashes}</option>
											{/section}
										</select>
									</span>
									<span id="cuscityerrormsg" class="errClass1 "></span>
								</div>
							</div>
							
							<div class="form-group">
								<label for="customer_zip" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.customer_mandatory_symbol|utf8_encode}</span>{$LANG.customer_reg_zip}</label>
								<div class="col-sm-7">
									<span id="showCusZipList">
										<input type="text" class="form-control" name="customer_zip" id="customer_zip" autocomplete="off" value="{if $customerprofiledetails.0.customer_zip neq ''}{$customerprofiledetails.0.customer_zip}{else}Zip Code{/if}" onfocus="if (this.value == '{if $customerprofiledetails.0.customer_zip neq ''}{$customerprofiledetails.0.customer_zip}{else}Zip Code{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $customerprofiledetails.0.customer_zip neq ''}{$customerprofiledetails.0.customer_zip}{else}Zip Code{/if}';" onkeyup="autoSuggestZip();" />
									</span>
									<span id="cusziperrormsg" class="errClass1"></span>
								</div>
							</div>*}
							
						   <div class="form-group">
								<label for="customer_phone" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.customer_mandatory_symbol|utf8_encode}</span>{$LANG.customer_reg_phone|utf8_encode}</label>
								<div class="col-sm-5">
									<input type="text" class="form-control bordesInputs" name="customer_phone" id="customer_phone" value="{$smarty.post.customer_phone}"/>
									<span id="cusphoneerrormsg" class="errClass1"></span>
								</div>
								<span class="phoneNo col-sm-2">{$LANG.customer_reg_phone_eg}</span>
						   </div>
							
							
							{*<div class="form-group">
								<label  class="col-sm-4 control-label font-normal">{$LANG.customer_reg_address_label}</label>
								<div class="col-sm-7">
									<label class="radio-inline">
										<input type="radio" class="btn" name="customer_addresslabel" id="customer_addresslabel_home" value="home" checked="checked"/>
										{$LANG.customer_reg_home}
									</label>
									<label class="radio-inline">
										<input type="radio" class="btn" name="customer_addresslabel" id="customer_addresslabel_off" value="office"/>
										{$LANG.customer_reg_office}
									</label>
									<label class="radio-inline">
										<input type="radio" class="btn" name="customer_addresslabel" id="customer_addresslabel_other" value="other"/>
										{$LANG.customer_reg_other}
									</label>
								</div>
							</div>*}
						</div>
						<!-- Login Info start -->
						<div class="loginBg">
							<h1 class="customSignupHead marbtm15">{$LANG.customer_reg_login_info|utf8_encode}</h1>
							<div class="form-group">
								<label for="customer_email"  class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.customer_mandatory_symbol|utf8_encode}</span>{$LANG.customer_reg_email|utf8_encode}</label>
								<div class="col-sm-7">
									<input type="text" class="form-control bordesInputs" name="customer_email" id="customer_email" value="{$smarty.post.customer_email}"/>
									<span id="cusemailerrormsg" class="errClass1 "></span>
									{*<span class="mail-inst col-xs-12 no-padding">{$LANG.customer_reg_we_will}.</span>*}
								</div>
						   </div>

						   <div class="form-group">
								<label for="customer_email_confirm"  class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.customer_mandatory_symbol|utf8_encode}</span>{$LANG.customer_reg_conemail|utf8_encode}</label>
								<div class="col-sm-7">
									<input type="text" class="form-control bordesInputs" name="customer_email_confirm" id="customer_email_confirm" value="{$smarty.post.customer_email_confirm}"/>
									<span id="cusemailconerrormsg" class="errClass1 "></span>
									{*<span class="mail-inst col-xs-12 no-padding">{$LANG.customer_reg_we_will}.</span>*}
								</div>
						   </div>
							
							<div class="form-group">
								<label for="customer_password"  class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.customer_mandatory_symbol|utf8_encode}</span>{$LANG.customer_reg_password|utf8_encode}</label>
								<div class="col-sm-7">
									<input type="password" class="form-control bordesInputs" name="customer_password" id="customer_password" value="{$smarty.post.customer_password}" autocomplete="off"/>
									<span id="cuspasserrormsg" class="errClass1 "></span>
								</div>
						   </div>
						   <div class="form-group">
								<label for="customer_conpassword"  class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.customer_mandatory_symbol|utf8_encode}</span>{$LANG.customer_reg_conpassword|utf8_encode}</label>
								<div class="col-sm-7">
									<input type="password" class="form-control bordesInputs" name="customer_conpassword" id="customer_conpassword" value="{$smarty.post.customer_conpassword}" autocomplete="off"/>
									<span id="cusconpasserrormsg" class="errClass1 "></span>
								</div>
						   </div>
						   <div class="form-group" style="display:none;">
								<div class="col-sm-offset-4 col-sm-7">
								<span class="redStar">{$LANG.customer_mandatory_symbol|utf8_encode}</span>
									<label class="checkbox-inline checknews">
										<input type="checkbox" class="" name="customer_terms" id="customer_terms" value="Yes"/>
									</label>
										{$LANG.customer_accept_agree|utf8_encode}
										<a class="color4" data-target="#termsCondition" href="javascript:void(0);" data-toggle="modal">{$LANG.customer_terms_conditions|utf8_encode}</a>
									
									<span id="custermerror" class="errClass1 "></span>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-7">								
									<label class="checkbox-inline checknews">
										<input type="checkbox" class="" name="customer_active_sesion" id="customer_active_sesion" value="Yes"/>
									</label>
										{$LANG.customer_active_session|utf8_encode}										
									
									<span id="custermerror" class="errClass1 "></span>
								</div>
							</div>
							{*<div class="form-group">
								<div class="col-sm-offset-4 col-sm-7">
									 <label class="checkbox-inline checknews">
										<input type="checkbox" class="" name="customer_news" id="customer_news" value="" checked="checked"/>
										{$LANG.customer_monthly_newsletter|utf8_encode}</span>
									</label>
									<span id="cusnewserror" class="errClass1 "></span>
								</div>
							</div>*}
						</div>
						<!-- Login Info end -->
						<div class="contain">
						 <div class="form-group">
							<div class="col-md-12 text-center">
								{*<input style="background-color: #FCCB05; color:#3F3F3F; background-image: url(../theme/default/images/check.png);" type="submit" id="customerregistersubmit" class="submit-bg" value="{$LANG.customer_reg_Continue}"/> *}
								<input type="image" id="customerregistersubmit" style="width: 8%;" src="../theme/default/images/check.png"/>
								
							</div>
						</div>
						</div>
					</div>
				</form>
			</label>
		</div>
		</div>
		<!-- Create Account end -->
		{*<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 ">
			{section name="list" loop=$customerContentList}
				<div class="customerRightBox clearfix">
					<h1>{$customerContentList[list].content_title|ucfirst|stripslashes}</h1>
					{$customerContentList[list].content|stripslashes}
				</div>	
			{/section}
		</div>*}
	</div>
</div>
{**********Terms and Conditions********}
<div id="termsCondition" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
	<div class="modal-dialog">
    	<div class="modal-content">
			<div class="carthead">
				<h1>{$SITE_NAME|stripslashes}</h1>
				<div class="addtoCartClose" data-dismiss="modal"></div>
			</div>
			<div class="termsCondionPop clearfix">
				<h1>{$termsContentList.0.content_title|ucfirst|stripslashes}</h1>	
				<p>{$termsContentList.0.content|stripslashes}</p>
			</div>
		</div>
	</div>
</div>

