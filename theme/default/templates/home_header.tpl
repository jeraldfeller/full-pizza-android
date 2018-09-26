<div style="width: 100%; margin-top: 40px;" class="container">
	<div class="row">		
		<div class="col-md-1 col-sm-2 col-xs-3 partialHeader">
			<a style="max-width: 100%;" href="/index.php">
				<img class="img-responsive homeLogo home" src="theme/default/images/home.png">
			</a>
		</div>
		<div class="col-md-3 col-sm-2 hidden-xs partialHeader" style="height: 60px;"></div>
		<div class="col-md-5 col-sm-4 col-xs-6 partialHeader">
			<img class="img-responsive fullPizzaLogo" src="theme/default/images/Logotipo.png">
		</div>
		<div class="col-md-2 col-sm-2 hidden-xs partialHeader" style="height: 60px;"></div>
		<div class="col-md-1 col-sm-2 col-xs-3">
			<a id="profileIcon" style="max-width: 100%;" href="javascript:void(0);">
				<img class="img-responsive userIcon homeLogo" src="theme/default/images/user.png">
			</a>
		</div>
	</div>
</div>

<div class="loginContain" style="display: none;">
						{*<form name="customerlogin_head" method="post" action="{$SITE_BASEURL}/{if $smarty.get.pagetype eq 'checkout'}{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}checkout.php{else}checkout{/if}{elseif $smarty.get.pagetype eq 'details'}{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantDetails.php?resid={$smarty.get.resid}&resname={$smarty.get.resname}{else}menu/{$smarty.get.resid}/{$smarty.get.resname}{/if}{/if}" onsubmit="return customerLoginValidate_header();" >*}

						<form name="customerlogin_head" method="post" action="{$SITE_BASEURL}/myaccount" onsubmit="return customerLoginValidate_header();" >
					
						{if $smarty.get.pagetype eq 'checkout'}
							<!--<input type="hidden" name="filetype" id="filetype" value="checkout.php" />-->
							<input type="hidden" name="resid" id="resid" value="{$smarty.request.resid}"/>
							<input type="hidden" name="offer" id="offer" value="{$smarty.request.offer}" />
							<input type="hidden" name="deliverypickup" id="deliverypickup" value="{$smarty.request.deliverypickup}"/>
						{/if}
							<div class="contain">
								<!--<div class="mandatoryField mandotaryRite">
									<span class="redStar">*</span> - {$LANG.customer_login_mandatory_fields}
								</div>-->
								<div class="clr"></div>
								<span id="errormsg5" class="errormsg_login_head" style="margin: 0;text-align: center;width: 100%;"></span>
								{if $message neq ''}<span style="color:green;">{$message}</span>{/if}
								<div class="form-group">
									<label for="customer_logemail_header"><span class="redStar">*</span>{$LANG.home_email}:</label></label>
						<!--		<li><input type="text" class="txtbox" name="customer_logemail" id="customer_logemail" value="email{*{$cookieusermail}*}" /></li><i></i>-->
								<!--<li><input type="text" class="txtbox customer_logemail_head" name="customer_logemail_header" id="customer_logemail_header" autocomplete="off" value="{if $cookieusermail neq ''}{$cookieusermail}{else}e-mail{/if}" onfocus="if (this.value == '{if $cookieusermail neq ''}{$cookieusermail}{else}e-mail{/if}')this.value='';" onblur="if(this.value == '')this.value='{if $cookieusermail neq ''}{$smarty.session.customer_logemail}{else}email{/if}';"  /></li>-->
									<input type="text" class="form-control" name="customer_logemail_header" id="customer_logemail_header" autocomplete="off" value="{if $cookieusermail neq ''}{$cookieusermail}{/if}" placeholder="Correo"/>
								<!--<script>document.customerlogin.customer_logemail.focus();</script>-->
								 </div>
								
									<span class="customForgot">
										<a data-target="#customerforgetpop" href="javascript:void(0);" data-toggle="modal" onclick="return customerForgetPasswordPopup();" class="color2" >{$LANG.home_customer_login_fpwd|utf8_encode}</a>
									</span>
							   
								 <div class="form-group">
									<label for="customer_logpassword_header"><span class="redStar">*</span>{$LANG.home_password|utf8_encode}:</label></label>
									<input type="password" class="form-control" name="customer_logpassword_header" id="customer_logpassword_header" autocomplete="off" value="{if $cookieuserpassword neq ''}{$cookieuserpassword}{/if}" placeholder="Contraseña"/>
								</div>
							  
									<span class="customForgot pull-left"><input class="headChckBox" type="checkbox" name="rememberme" id="rememberme" value="Yes" {if $cookieusermail neq '' and $cookieuserpassword neq ''} checked="checked"{/if} />{*$LANG.home_customer_rem*}{$LANG.home_remember_me|utf8_encode}</span>
									
								<div class="form-group">
									<div class="keepContain">
										<input type="submit" class="headLoginBtn" value="Iniciar sesión" onclick="return loginValidation()" />
										{*<a href="javascript:void(0);" class="fbSignIn" onclick="callFacebookConnect();"></a>*}

										<span style="margin-top: 10px;" class="customForgot pull-left">{$LANG.home_not_registered|utf8_encode}</span>

										<a href="{$SITE_BASEURL}/register" class="regSignIn">Crea una cuenta</a>
									</div>
								</div>
								<!--<a class="fbSignIn"  href="javascript:void(0);" onclick="callFacebookConnect();"></a>-->
								
								<!--<a  href="javascript:void(0);" class="frt"><span class="restOwnerLoginBtnLeft"><span class="restOwnerLoginBtnRight">Login</span></span></a>-->
							</div>
						</form>
</div>


<div id="customerforgetpop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
	<div class="modal-dialog">
    	<div class="modal-content">
            <div class="addtoCartInner">
                <div class="carthead">
                    <h1>{$LANG.home_cust_forget_pwd}</h1>
                    <div class="addtoCartClose" data-dismiss="modal"></div>
                </div>
                <div class="forgotBg clearfix">
					<form name="customerforgetpass" class="form-horizontal" action="" method="post" onsubmit="return customerForgetPassword();">
						<div id="errforgetemail" class="errormsg_login"></div>
						<div class="form-group">
							<label class="col-sm-4 control-label font-normal"> {$LANG.home_your_email_address}:</label>
							<div class="col-sm-7 pad0">
								<input type="text" name="forgetemail" id="forgetemail" value="" class="form-control" />
							</div>
						</div>
						<div class="form-group no-margin-bottom">
							<label class="col-sm-4 control-label font-normal">&nbsp;</label>
							<div class="col-sm-7 pad0">
								<input class="submit-bg" id="forgotpasswordsubmit" type="submit" value="{$LANG.home_submit}" />
							</div>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
{include file='main_menu.tpl'}