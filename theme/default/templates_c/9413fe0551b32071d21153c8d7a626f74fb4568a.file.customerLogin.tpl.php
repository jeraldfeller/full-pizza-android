<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-22 22:35:09
         compiled from "C:\wamp\www\theme\default\templates\customerLogin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:537057dccf21229fc4-69181101%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9413fe0551b32071d21153c8d7a626f74fb4568a' => 
    array (
      0 => 'C:\\wamp\\www\\theme\\default\\templates\\customerLogin.tpl',
      1 => 1500567529,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '537057dccf21229fc4-69181101',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57dccf214adcf0_54306171',
  'variables' => 
  array (
    'LANG' => 0,
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
    'message' => 0,
    'cookieusermail' => 0,
    'cookieuserpassword' => 0,
    'SITE_IMAGE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57dccf214adcf0_54306171')) {function content_57dccf214adcf0_54306171($_smarty_tpl) {?><div class="container" style="margin-top: 10% !important;">
	
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="background: white;padding-left: 0;padding-right: 0;">
		<?php if ($_GET['pagetype']=='checkout') {?>
			<p style="font-size: x-large !important;" class="AgentOrange"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_returning_customer'];?>
</p>
		<?php } else { ?>
			<p style="font-size: x-large !important;" class="AgentOrange"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_login_heading'];?>
</p>
		<?php }?>

		<div class="reticulaInterna"></div>
		
		<div class="customerLeftBox clearfix">
			
			<input type="hidden" name="pagetype" id="pagetype" value="<?php echo $_GET['pagetype'];?>
"/>
			<!-- <?php if ($_GET['pagetype']=='checkout') {?>
				<h1 class="customSignupHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_returning_customer'];?>
</h1>
			<?php } else { ?>
				<h1 class="customSignupHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_login_heading'];?>
</h1>
			<?php }?> -->
			<form name="customerlogin" method="post" action="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_GET['pagetype']=='checkout') {
if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>checkout.php<?php } else { ?>checkout<?php }
} elseif ($_GET['pagetype']=='details') {
if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantDetails.php?resid=<?php echo $_GET['resid'];?>
&resname=<?php echo $_GET['resname'];
} else { ?>menu/<?php echo $_GET['resid'];?>
/<?php echo $_GET['resname'];
}
}?>"
			onsubmit="return customerLoginValidate();" class="form-horizontal">
			
				<?php if ($_GET['pagetype']=='checkout') {?>
					<!--<input type="hidden" name="filetype" id="filetype" value="checkout.php" />-->
					<input type="hidden" name="resid" id="resid" value="<?php echo $_REQUEST['resid'];?>
"/>
					<input type="hidden" name="offer" id="offer" value="<?php echo $_REQUEST['offer'];?>
" />
					<input type="hidden" name="deliverypickup" id="deliverypickup" value="<?php echo $_REQUEST['deliverypickup'];?>
"/>
				<?php }?>
			
				<div class="customerLeft">	
					<div class="form-group no-margin-bottom">
						<div class="col-sm-offset-4 col-sm-7">			
							<div class="mandatoryField mandotaryRite">
								<span class="redStar">*</span> - <?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_login_mandatory_fields'];?>

							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-7">
							<span id="errormsg4" class="errormsg_login">
								<?php if ($_GET['msg']=='Success') {?><span style="color:green;">Your password is reset successfully! Login your account.</span><?php }?>
							</span>		
							<?php if ($_smarty_tpl->tpl_vars['message']->value!='') {?><span style="color:green; float:left; text-align:center; width:100%;" id="loginsuccess" ><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</span><?php }?>
						</div>
					</div>
					<div class="form-group">
						<label for="customer_logemail" class="col-sm-4 control-label font-normal"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_email'];?>
</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="customer_logemail" id="customer_logemail" value="<?php if ($_GET['ui']!='') {
echo base64_decode($_GET['ui']);
} else {
echo $_smarty_tpl->tpl_vars['cookieusermail']->value;
}?>" <?php if ($_GET['ui']!='') {?>disabled="disabled"<?php }?> />
							<?php echo '<script'; ?>
 type="text/javascript">document.customerlogin.customer_logemail.focus();<?php echo '</script'; ?>
>
						</div>
					</div>
					<div class="form-group">
						<label for="customer_logpassword" class="col-sm-4 control-label font-normal"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_password'];?>
</label>
						<div class="col-sm-7">
							<input type="password" class="form-control" name="customer_logpassword" id="customer_logpassword" value="<?php echo $_smarty_tpl->tpl_vars['cookieuserpassword']->value;?>
" autocomplete="off"/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-7">
							<label class="checkout-inline font-normal checknews">	
								<?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_login_forget_password'];?>
? 
								<a data-target="#customerforgetpop" href="javascript:void(0);" data-toggle="modal" onclick=" return customerForgetPasswordPopup();" class="color2"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_click_here'];?>
</a>
							</label>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-7">
							<label class="checkout-inline font-normal checknews">
								<span class="pull-right marginRight40">
									<input type="checkbox" class="headChckBox" name="rememberme" id="rememberme" value="Yes" <?php if ($_smarty_tpl->tpl_vars['cookieusermail']->value!=''&&$_smarty_tpl->tpl_vars['cookieuserpassword']->value!='') {?>checked="checked"<?php }?> /><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_remember_me'];?>

								</span>
							</label>
						</div>
					</div>
					<div class="form-group no-margin-bottom">
						<div class="col-sm-offset-4 col-sm-7">
							 <input type="submit" class="goToCheckout" value="" />
						</div>
					</div>

					

					<!--<a  href="javascript:void(0);" class="frt"><span class="restOwnerLoginBtnLeft"><span class="restOwnerLoginBtnRight">Login</span></span></a>-->
				</div>
			</form>
		</div>
	</div>
	<?php if ($_GET['pagetype']=='checkout') {?>
		<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12" style="text-align:center;background: white;padding-left: 0;padding-right: 0;margin-left: 1%;width: 49%;">
			<p style="font-size: x-large !important;" class="AgentOrange"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_guest_checkout'];?>
</p>
			<div class="reticulaInterna"></div>	
			<div class="customerRightBox clearfix">
				<!-- <h1><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_guest_checkout'];?>
</h1> -->

				<span class="viewNew"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_proceed_to'];?>
.</span>
				<form style="width: 100%;" class="pull-left" name="guestcheckout" method="post" action="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_GET['pagetype']=='checkout') {
if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>checkout.php<?php } else { ?>checkout<?php }
}?>">
					<input type="hidden" name="resid" id="resid" value="<?php echo $_REQUEST['resid'];?>
"/>
					<input type="hidden" name="offer" id="offer" value="<?php echo $_REQUEST['offer'];?>
" />
					<input type="hidden" name="deliverypickup" id="deliverypickup" value="<?php echo $_REQUEST['deliverypickup'];?>
"/>
					<input class="goToCheckout" type="submit" value="" />
				</form>
				<!-- <span class="orOption"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_or'];?>
</span>
				<a class="fbLink" href="javascript:void(0);" onclick="callFacebookConnectCheckout(<?php echo $_REQUEST['resid'];?>
,<?php echo $_REQUEST['offer'];?>
,<?php echo $_REQUEST['deliverypickup'];?>
);">
					<span class="facebook">f</span>
					<span class="text">Signin with Facebook</span>
				</a> -->
			</div>			
		</div>
	<?php } else { ?>
		<div class="customerRight col-lg-6 col-md-6 col-xs-12 col-sm-12">
			<div class="customerRightBox clearfix">
				<figure href="javascript:void(0);" class="glassImg tossing"><img src="<?php echo $_smarty_tpl->tpl_vars['SITE_IMAGE_URL']->value;?>
/glass.png" alt="" title="" /></figure>
				<h1><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_create_new_account'];?>
</h1>
				<span class="contain center"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>customerRegister.php<?php } else { ?>register<?php }?>" class="signupBg"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_sign_up'];?>
</a></span>
				<span class="viewNew"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_view_past_msg'];?>
...</span>
				<a class="fbLink" href="javascript:void(0);" onclick="callFacebookConnect();">
					<span class="facebook">f</span>
					<span class="text">Signin with Facebook</span>
				</a>
			</div>
		</div>
	<?php }?>
	<!-- Search By Cuisine start -->
	
</div>
<?php }} ?>
