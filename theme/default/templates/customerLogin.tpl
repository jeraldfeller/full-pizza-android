<div class="container" style="margin-top: 10% !important;">
	
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="background: white;padding-left: 0;padding-right: 0;">
		{if $smarty.get.pagetype eq 'checkout'}
			<p style="font-size: x-large !important;" class="AgentOrange">{$LANG.customer_returning_customer}</p>
		{else}
			<p style="font-size: x-large !important;" class="AgentOrange">{$LANG.customer_login_heading}</p>
		{/if}

		<div class="reticulaInterna"></div>
		
		<div class="customerLeftBox clearfix">
			
			<input type="hidden" name="pagetype" id="pagetype" value="{$smarty.get.pagetype}"/>
			<!-- {if $smarty.get.pagetype eq 'checkout'}
				<h1 class="customSignupHead">{$LANG.customer_returning_customer}</h1>
			{else}
				<h1 class="customSignupHead">{$LANG.customer_login_heading}</h1>
			{/if} -->
			<form name="customerlogin" method="post" action="{$SITE_BASEURL}/{if $smarty.get.pagetype eq 'checkout'}{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}checkout.php{else}checkout{/if}{elseif $smarty.get.pagetype eq 'details'}{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantDetails.php?resid={$smarty.get.resid}&resname={$smarty.get.resname}{else}menu/{$smarty.get.resid}/{$smarty.get.resname}{/if}{/if}"
			onsubmit="return customerLoginValidate();" class="form-horizontal">
			
				{if $smarty.get.pagetype eq 'checkout'}
					<!--<input type="hidden" name="filetype" id="filetype" value="checkout.php" />-->
					<input type="hidden" name="resid" id="resid" value="{$smarty.request.resid}"/>
					<input type="hidden" name="offer" id="offer" value="{$smarty.request.offer}" />
					<input type="hidden" name="deliverypickup" id="deliverypickup" value="{$smarty.request.deliverypickup}"/>
				{/if}
			
				<div class="customerLeft">	
					<div class="form-group no-margin-bottom">
						<div class="col-sm-offset-4 col-sm-7">			
							<div class="mandatoryField mandotaryRite">
								<span class="redStar">*</span> - {$LANG.customer_login_mandatory_fields}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-7">
							<span id="errormsg4" class="errormsg_login">
								{if $smarty.get.msg eq 'Success'}<span style="color:green;">Your password is reset successfully! Login your account.</span>{/if}
							</span>		
							{if $message neq ''}<span style="color:green; float:left; text-align:center; width:100%;" id="loginsuccess" >{$message}</span>{/if}
						</div>
					</div>
					<div class="form-group">
						<label for="customer_logemail" class="col-sm-4 control-label font-normal"><span class="redStar">*</span>{$LANG.customer_email}</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="customer_logemail" id="customer_logemail" value="{if $smarty.get.ui neq ''}{$smarty.get.ui|base64_decode}{else}{$cookieusermail}{/if}" {if $smarty.get.ui neq ''}disabled="disabled"{/if} />
							<script type="text/javascript">document.customerlogin.customer_logemail.focus();</script>
						</div>
					</div>
					<div class="form-group">
						<label for="customer_logpassword" class="col-sm-4 control-label font-normal"><span class="redStar">*</span>{$LANG.customer_password}</label>
						<div class="col-sm-7">
							<input type="password" class="form-control" name="customer_logpassword" id="customer_logpassword" value="{$cookieuserpassword}" autocomplete="off"/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-7">
							<label class="checkout-inline font-normal checknews">	
								{$LANG.customer_login_forget_password}? 
								<a data-target="#customerforgetpop" href="javascript:void(0);" data-toggle="modal" onclick=" return customerForgetPasswordPopup();" class="color2">{$LANG.customer_click_here}</a>
							</label>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-7">
							<label class="checkout-inline font-normal checknews">
								<span class="pull-right marginRight40">
									<input type="checkbox" class="headChckBox" name="rememberme" id="rememberme" value="Yes" {if $cookieusermail neq '' and $cookieuserpassword neq ''}checked="checked"{/if} />{$LANG.customer_remember_me}
								</span>
							</label>
						</div>
					</div>
					<div class="form-group no-margin-bottom">
						<div class="col-sm-offset-4 col-sm-7">
							 <input type="submit" class="goToCheckout" value="" />
						</div>
					</div>

					{*<span class="customForgot">{$LANG.customer_login_forget_password}? <a href="#customerforgetpop" data-toggle="modal" onclick=" return customerForgetPasswordPopup();" class="color2">{$LANG.customer_click_here}</a></span>
				<span class="customForgot"><input type="checkbox" name="rememberme" id="rememberme" value="Yes" {if $cookieusermail neq '' and $cookieuserpassword neq ''}checked="checked"{/if} />{$LANG.customer_remember_me}</span>
				<div class="login1btn">
					<div class="buttonleft">
						<div class="buttonright">
							<input type="submit" value="{$LANG.customer_login}" />
						</div>
					</div>
				</div>*}

					<!--<a  href="javascript:void(0);" class="frt"><span class="restOwnerLoginBtnLeft"><span class="restOwnerLoginBtnRight">Login</span></span></a>-->
				</div>
			</form>
		</div>
	</div>
	{if $smarty.get.pagetype eq 'checkout'}
		<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12" style="text-align:center;background: white;padding-left: 0;padding-right: 0;margin-left: 1%;width: 49%;">
			<p style="font-size: x-large !important;" class="AgentOrange">{$LANG.customer_guest_checkout}</p>
			<div class="reticulaInterna"></div>	
			<div class="customerRightBox clearfix">
				<!-- <h1>{$LANG.customer_guest_checkout}</h1> -->

				<span class="viewNew">{$LANG.customer_proceed_to}.</span>
				<form style="width: 100%;" class="pull-left" name="guestcheckout" method="post" action="{$SITE_BASEURL}/{if $smarty.get.pagetype eq 'checkout'}{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}checkout.php{else}checkout{/if}{/if}">
					<input type="hidden" name="resid" id="resid" value="{$smarty.request.resid}"/>
					<input type="hidden" name="offer" id="offer" value="{$smarty.request.offer}" />
					<input type="hidden" name="deliverypickup" id="deliverypickup" value="{$smarty.request.deliverypickup}"/>
					<input class="goToCheckout" type="submit" value="" />
				</form>
				<!-- <span class="orOption">{$LANG.customer_or}</span>
				<a class="fbLink" href="javascript:void(0);" onclick="callFacebookConnectCheckout({$smarty.request.resid},{$smarty.request.offer},{$smarty.request.deliverypickup});">
					<span class="facebook">f</span>
					<span class="text">Signin with Facebook</span>
				</a> -->
			</div>			
		</div>
	{else}
		<div class="customerRight col-lg-6 col-md-6 col-xs-12 col-sm-12">
			<div class="customerRightBox clearfix">
				<figure href="javascript:void(0);" class="glassImg tossing"><img src="{$SITE_IMAGE_URL}/glass.png" alt="" title="" /></figure>
				<h1>{$LANG.customer_create_new_account}</h1>
				<span class="contain center"><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}customerRegister.php{else}register{/if}" class="signupBg">{$LANG.customer_sign_up}</a></span>
				<span class="viewNew">{$LANG.customer_view_past_msg}...</span>
				<a class="fbLink" href="javascript:void(0);" onclick="callFacebookConnect();">
					<span class="facebook">f</span>
					<span class="text">Signin with Facebook</span>
				</a>
			</div>
		</div>
	{/if}
	<!-- Search By Cuisine start -->
	{*include file='searchCuisine.tpl'*}
</div>
