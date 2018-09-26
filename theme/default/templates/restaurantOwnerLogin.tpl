<div class="container">
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<div class="customerLeftBox clearfix">
			<h1 class="customSignupHead">{$LANG.restaurant_owner_admin_panel}</h1>
			<form name="restaurantOwnerLogin" method="post" action="" onsubmit="return restOwnerLoginValidate();" class="form-horizontal">
				<input type="hidden" name="feedback" class="feedback" value="{$smarty.get.page}" />
				<div class="customerLeft">
					<div class="form-group no-margin-bottom">
						<div class="col-sm-offset-4 col-sm-7">	
							<div class="mandatoryField mandotaryRite">
								<span class="redStar">{$LANG.restaurant_mandatory_sign|utf8_encode}</span> - {$LANG.restaurant_mandatory_fields}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-7">	
							<span id="errormsg" class="errormsg_login"{if $error neq ''}class="errormsg"{/if}>{$error}</span>
						</div>
					</div>
					<div class="form-group">
						<label for="restaurant_logemail" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.restaurant_mandatory_sign|utf8_encode}</span>{*$LANG.restaurant_restauraunt_email_id*}{$LANG.restaurant_owner_login_email|utf8_encode}</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="restaurant_logemail" id="restaurant_logemail" value=""/>
							<script type="text/javascript">document.restaurantOwnerLogin.restaurant_logemail.focus();</script>
						</div>
					</div>
					<div class="form-group">
						<label for="restaurant_logpassword" class="col-sm-4 control-label font-normal"><span class="redStar">{$LANG.restaurant_mandatory_sign|utf8_encode}</span>{$LANG.restaurant_owner_login_password|utf8_encode}</label>
						<div class="col-sm-7">
							<input type="password" class="form-control" name="restaurant_logpassword" id="restaurant_logpassword" value="" autocomplete="off"/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-7">
							<label class="checkout-inline checknews">{$LANG.restaurant_forgot_your_password}? 
								<a data-target="#restaurantforgetpop" href="javascript:void(0);" data-toggle="modal" onclick="return restaurantForgetPasswordPopup();" class="color2">{$LANG.restaurant_click_here}</a>
							</label>
						</div>
					</div>
					
					<div class="form-group no-margin-bottom">
						<div class="col-sm-offset-4 col-sm-7">
							<input type="submit" class="submit-bg" value="{$LANG.restaurant_login}"/>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="customerRight col-lg-6 col-md-6 col-xs-12 col-sm-12">
		<div class="customerRightBox clearfix">
			<div class="ownerAdminRite">
				<span class="ownerAdminImg">
					<img src="{$SITE_IMAGE_URL}/book.png" alt="" title="" />
				</span>
				<div class="ownerAdminTxt">
					<h1 class="ownerAdminHead">{$LANG.restaurant_confirm_orders}</h1>
					<span class="ownerAdminCont">{$LANG.restaurant_confirm_incoming_ord}</span>
				</div>
			</div>
			<div class="ownerAdminRite">
				<span class="ownerAdminImg">
					<img src="{$SITE_IMAGE_URL}/pc.png" alt="" title="" />
				</span>
				<div class="ownerAdminTxt">
					<h1 class="ownerAdminHead">{$LANG.restaurant_manage_your_restaurant}</h1>
					<span class="ownerAdminCont">{$LANG.restaurant_update_menu_settings}</span>
				</div>
			</div>
			<div class="ownerAdminRite">
				<span class="ownerAdminImg">
					<img src="{$SITE_IMAGE_URL}/board.png" alt="" title="" />
				</span>
				<div class="ownerAdminTxt">
					<h1 class="ownerAdminHead">{$LANG.restaurant_sales}</h1>
					<span class="ownerAdminCont">{$LANG.restaurant_complete_analysis_page}</span>
				</div>
			</div>
		</div>
	</div>
</div>

{if $termsContentList.0.content_title neq ''}
	<div class="termsCont">
		<div class="container">
			<span class="terms">{$LANG.restaurant_by_using_our_site} </span><span class="termsofUse"><a href="{$SITE_BASEURL}/staticPage.php?contentpage=terms-conditions" data-toggle="modal"  class="color5">{$LANG.restaurant_ownerlogin_footer}</a></span>
		</div>
	</div>
{/if}
	
	
{*-------Restaurant Owner Forgot Password----------------*}
<div id="restaurantforgetpop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
			 <div class="addtoCartInner">
                <div class="carthead">
                    <h1>{$LANG.restaurant_forgot_title}</h1>
                    <div class="addtoCartClose" data-dismiss="modal"></div>
                </div>
				 <div class="forgotBg clearfix">
					<form name="restaurantforgetpass" method="post" action="" onsubmit="return restaurantForgetPassword();" class="form-horizontal">
						<div id="errforgetemail" class="errforgetemail errormsg_login"></div>
						<div class="form-group">
							<label for="forgetemail" class="col-sm-4 control-label">{$LANG.restaurant_your_email_address}:</label>
							<div class="col-sm-8">
								<input type="text" name="forgetemail" id="forgetemail1" class="form-control" value=""/>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-8">
								<input class="submit-bg" type="submit" id="resownerforgotpasssubmit" value="{$LANG.restaurant_forgot_submit}" />
							</div>
						</div>			
					</form>
        		</div>
			</div>
        </div>
    </div>
</div>
