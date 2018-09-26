<!-- Header starts -->
{if $req_file_name neq 'offline.php'}
<header class="header fondo">
	<div class="headerTop {if $req_file_name neq 'index.php'}headerTopSec{/if}">
		<div class="container">
          <!--  <div class="headerTopMiddle hidden-xs">{$LANG.menu_number_one_online}</div>-->
          {if $smarty.session.plugin eq ''}
		   <a href="{$SITE_BASEURL}" class="logo {if $req_file_name eq 'restaurantDetails.php'} menu-left {/if} {if $req_file_name eq 'searchResult.php'}logo_pad{/if}">
                    <img src="{$SITE_LOGO}" alt="{$SITE_NAME}" title="{$SITE_NAME}" />
                </a>
               {else}
                <a class="iframe plugins" href="http://comeneat.com/v2/restaurantDetails.php?resid={$smarty.session.resid}&resname={$smarty.session.resname}&plugin=yes">Show Menu</a>
            {/if}
                <input type="hidden" name="pagetype" id="pagetype1" value="{$smarty.get.pagetype}"/>
                
				{if $req_file_name eq 'restaurantOwnerLogin.php'}
					{*************************** RESTAURANT *******************************}
					<ul class="nav navbar-nav headerTopRight pull-right">
						<li> <a href="{$SITE_BASEURL}" class="regBtn"><i class="glyphicon glyphicon-home marRight"></i>{$LANG.restaurant_owner_home}</a></li>
						{if $smarty.session.restaurantownerid neq ''}
						<li><a href="javascript:void(0);" class="regBtn">{$LANG.home_log_out}</a></li>
						{else}
						<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerRegister.php{else}restaurant-register{/if}" class="regBtn"><i class="glyphicon glyphicon-cutlery marRight"></i>{$LANG.restaurant_owner_signup}</a></li>
						{/if}
					</ul>
					 <div class="welcomeTxt pull-right visible-lg" >
						{if $smarty.session.customerid neq ''}				
							Welcome <b>{$customerDetails.0.customer_name|stripslashes} {$customerDetails.0.customer_lastname|stripslashes}</b>
						{/if}
					 </div>	
				{else}
					{*************************** CUSTOMER *******************************}
					<ul class="headerTopRight pull-right">
					   <li> <a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}contactUs.php{else}contact-us{/if}" class="regBtn"><i class="glyphicon contact_icon marRight"></i>{$LANG.menu_contact}</a></li>
					{if $smarty.session.restaurantownerid neq ''}
					   {*<li> <a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantOwnerMyaccount.php{else}restaurant-myaccount{/if}"  class="regBtn"><i class="glyphicon glyphicon-user marRight"></i>{$LANG.header_res_myaccount}</a></li>*}
					{else}
						{*<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}restaurant-register{else}restaurantOwnerRegister.php{/if}" class="signUpBanner"></a></li>*}
					   
					{/if}
					{if $smarty.session.customerid neq ''}
						<li ><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}customerMyaccount.php{else}myaccount{/if}"  class="regBtn"><i class="glyphicon glyphicon-user marRight"></i>{$LANG.header_customer_myaccount}</a></li>
						<li ><a href="javascript:void(0);" class="regBtn" {if $smarty.session.cusLogin eq 'FB'}onclick="FacebookLogout();"{else}onclick="customerLogout();"{/if}><i class="glyphicon glyphicon-lock marRight"></i>{$LANG.header_customer_logout}</a></li>
					{else}
						{*<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}login{else}customerLogin.php{/if}"  class="signIn">{$LANG.header_signin}<span class="regBtnActive"></span></a></li>*}
					   <li> <a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}customerRegister.php{else}register{/if}"  class="regBtn signup_btn">{$LANG.header_signup}</a></li>
					   <li>
							<a href="javascript:void(0);" id="signindrop"  class="signIn visible-lg">{$LANG.header_signin}<span class="caret"></span></a>
							<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}customerLogin.php{else}login{/if}" class="signIn hidden-lg">{$LANG.header_signin}</a>
						</li>

					{/if}
					<li>
					<div class="loginContain" style="display:none;">
						<form name="customerlogin_head" method="post" action="{$SITE_BASEURL}/{if $smarty.get.pagetype eq 'checkout'}{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}checkout.php{else}checkout{/if}{elseif $smarty.get.pagetype eq 'details'}{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurantDetails.php?resid={$smarty.get.resid}&resname={$smarty.get.resname}{else}menu/{$smarty.get.resid}/{$smarty.get.resname}{/if}{/if}" onsubmit="return customerLoginValidate_header();" >
					
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
									<input type="text" class="form-control" name="customer_logemail_header" id="customer_logemail_header" autocomplete="off" value="{if $cookieusermail neq ''}{$cookieusermail}{/if}" placeholder="e-mail"/>
								<!--<script>document.customerlogin.customer_logemail.focus();</script>-->
								 </div>
								
									<span class="customForgot">
										<a data-target="#customerforgetpop" href="javascript:void(0);" data-toggle="modal" onclick="return customerForgetPasswordPopup();" class="color2" >{$LANG.home_customer_login_fpwd}</a>
									</span>
							   
								 <div class="form-group">
									<label for="customer_logpassword_header"><span class="redStar">*</span>{$LANG.home_password}:</label></label>
									<input type="password" class="form-control" name="customer_logpassword_header" id="customer_logpassword_header" autocomplete="off" value="{if $cookieuserpassword neq ''}{$cookieuserpassword}{/if}" placeholder="password"/>
								</div>
							  
									<span class="customForgot pull-left"><input class="headChckBox" type="checkbox" name="rememberme" id="rememberme" value="Yes" {if $cookieusermail neq '' and $cookieuserpassword neq ''} checked="checked"{/if} />{*$LANG.home_customer_rem*}{$LANG.home_remember_me}</span>
									
								<div class="form-group">
									<div class="keepContain">
										<input type="submit" class="headLoginBtn" value="Login" onclick="return loginValidation()" />
										<a href="javascript:void(0);" class="fbSignIn" onclick="callFacebookConnect();"></a>
									</div>
								</div>
								<!--<a class="fbSignIn"  href="javascript:void(0);" onclick="callFacebookConnect();"></a>-->
								
								<!--<a  href="javascript:void(0);" class="frt"><span class="restOwnerLoginBtnLeft"><span class="restOwnerLoginBtnRight">Login</span></span></a>-->
							</div>
						</form>
						</div>
					 </li>
				 </ul>
				{/if}
				  {if $req_file_name neq 'restaurantOwnerLogin.php'}
					 <div class="welcomeTxt pull-right visible-lg" >
						{if $smarty.session.customerid neq ''}				
							{$LANG.home_welcome} <b>{$customerDetails.0.customer_name|stripslashes} {$customerDetails.0.customer_lastname|stripslashes}</b>
						{/if}
					</div>
				{/if}		
		</div>
	</div>
</header>
<!-- Header ends -->

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
{*
<!--Customer Forget Password -->
<div id="customerforgetpop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
	<div class="modal-dialog">
    	<div class="modal-content">
            <div class="addtoCartInner">
                <div class="customaddtocartPopupHead">
                    <h1 class="addtocartPopupHeadNew">{$LANG.customer_customer_forget_password}</h1>
                    <div class="addtoCartClose" data-dismiss="modal"></div>
                </div>
                <div class="customaddtocartPopup" >
                    <div class="customaddtocartWrap">
                    <form name="customerforgetpass" action="" method="post" onsubmit="return customerForgetPassword();">
                        <ul class="customsignupUl ulCustomPop">
                            <li class="contain"><span id="errforgetemail" class="errormsg_login"></span></li>
                            <li class="clr">
                                <label class="name">{$LANG.customer_your_email_address}:</label>
                            </li>
                            <li>
                                <input type="text" name="forgetemail" id="forgetemail" value="" class="txt" />
                            </li>
                        </ul>
                        <ul class="customsignupUl">
                            <li><label class="name">&nbsp;</label></li>
                            <li>
                                <span class="buttonleft">
                                    <span class="buttonright">
                                    <input class="" type="submit" value="{$LANG.customer_forgot_submit}" />
                                    </span>
                                </span>
                            </li>
                        </ul>
                    </form>
                    </div>
                </div>
            </div>
        </div>
     </div>
</div>
*}
{/if}