<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-25 22:38:32
         compiled from "/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/customerRegister.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19080887245767f09915dbb5-52526611%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89a31d717dcbf8b04c62826be60d7b86aa3f5fc9' => 
    array (
      0 => '/var/sentora/hostdata/admin/public_html/fullpizzadev_mobilemediacms_com/theme/default/templates/customerRegister.tpl',
      1 => 1474859813,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19080887245767f09915dbb5-52526611',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5767f0993d5fb5_00436928',
  'variables' => 
  array (
    'LANG' => 0,
    'SITE_NAME' => 0,
    'termsContentList' => 0,
    'SITE_BASEURL' => 0,
    'USERFRIENDLY' => 0,
    'FB_DOMAIN_NAME' => 0,
    'message' => 0,
    'cookieusermail' => 0,
    'cookieuserpassword' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5767f0993d5fb5_00436928')) {function content_5767f0993d5fb5_00436928($_smarty_tpl) {?><br>
<br>
<br>
<br>

<div class="container">
	<!-- Create Account start -->
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1 col-md-7 col-sm-12 col-xs-12">
			<div class="customerLeftBox clearfix">
				<form name="customer_register" method="post" action="" onsubmit="return customerRegisterValidate();" class="form-horizontal">
					<h1 class="customSignupHead"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_reg_create_account'];?>
</h1>
					<div class="custRegBox">
						<div class="loginBg">
							<div class="mandatoryField">
								<span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_mandatory_symbol']);?>
</span> - <?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_reg_mandatory_fields'];?>

							</div>
							<div class="clr"></div>
							<span id="errormsg" class="errormsg_login"></span>
							  <div class="form-group">
									<label for="customer_name" class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_reg_full_name'];?>
</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="customer_name" id="customer_name" value="<?php echo $_POST['customer_name'];?>
" />
										<?php echo '<script'; ?>
 type="text/javascript">document.customer_register.customer_name.focus();<?php echo '</script'; ?>
>
										<span id="cusnameerrormsg" class="errClass1"></span>
									</div>
								</div>
							  <div class="form-group">
									<label for="customer_lastname" class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_reg_last_name'];?>
</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="customer_lastname" id="customer_lastname" value="<?php echo $_POST['customer_lastname'];?>
" />
										<span id="cuslastnameerrormsg" class="errClass1"></span>
									</div>
							   </div>							  
							  
							  
							
							
						
						   
							
						   <div class="form-group">
								<label for="customer_phone" class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_mandatory_symbol']);?>
</span><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_reg_phone']);?>
</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="customer_phone" id="customer_phone" value="<?php echo $_POST['customer_phone'];?>
"/>
									<span id="cusphoneerrormsg" class="errClass1"></span>
								</div>
								<span class="phoneNo col-sm-2"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_reg_phone_eg'];?>
</span>
						   </div>
							
							
							
						</div>
						<!-- Login Info start -->
						<div class="loginBg">
							<h1 class="customSignupHead marbtm15"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_reg_login_info']);?>
</h1>
							<div class="form-group">
								<label for="customer_email"  class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_mandatory_symbol']);?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_reg_email'];?>
</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="customer_email" id="customer_email" value="<?php echo $_POST['customer_email'];?>
"/>
									<span id="cusemailerrormsg" class="errClass1 "></span>
									
								</div>
						   </div>
							
							<div class="form-group">
								<label for="customer_password"  class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_mandatory_symbol']);?>
</span><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_reg_password']);?>
</label>
								<div class="col-sm-7">
									<input type="password" class="form-control" name="customer_password" id="customer_password" value="<?php echo $_POST['customer_password'];?>
" autocomplete="off"/>
									<span id="cuspasserrormsg" class="errClass1 "></span>
								</div>
						   </div>
						   <div class="form-group">
								<label for="customer_conpassword"  class="col-sm-4 control-label font-normal"><span class="redStar"><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_mandatory_symbol']);?>
</span><?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_reg_conpassword']);?>
</label>
								<div class="col-sm-7">
									<input type="password" class="form-control" name="customer_conpassword" id="customer_conpassword" value="<?php echo $_POST['customer_conpassword'];?>
" autocomplete="off"/>
									<span id="cusconpasserrormsg" class="errClass1 "></span>
								</div>
						   </div>
						   

							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-7">								
									<label class="checkbox-inline checknews">
										<input type="checkbox" class="" name="customer_terms" id="customer_terms" value="Yes"/>
									</label>
										<?php echo utf8_encode($_smarty_tpl->tpl_vars['LANG']->value['customer_active_session']);?>
										
									
									<span id="custermerror" class="errClass1 "></span>
								</div>
							</div>
							
						</div>
						<!-- Login Info end -->
						<div class="contain">
						 <div class="form-group">
							<div class="col-sm-offset-4 col-sm-7">
								<input type="submit" id="customerregistersubmit" class="submit-bg" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_reg_Continue'];?>
"/>
							</div>
						</div>
						</div>
					</div>
				</form>
			</label>
		</div>
		</div>
		<!-- Create Account end -->
		
	</div>
</div>

<div id="termsCondition" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
	<div class="modal-dialog">
    	<div class="modal-content">
			<div class="carthead">
				<h1><?php echo stripslashes($_smarty_tpl->tpl_vars['SITE_NAME']->value);?>
</h1>
				<div class="addtoCartClose" data-dismiss="modal"></div>
			</div>
			<div class="termsCondionPop clearfix">
				<h1><?php echo stripslashes(ucfirst($_smarty_tpl->tpl_vars['termsContentList']->value[0]['content_title']));?>
</h1>	
				<p><?php echo stripslashes($_smarty_tpl->tpl_vars['termsContentList']->value[0]['content']);?>
</p>
			</div>
		</div>
	</div>
</div>



<div class="loginContain" style="">
						<form name="customerlogin_head" method="post" action="<?php echo $_smarty_tpl->tpl_vars['SITE_BASEURL']->value;?>
/<?php if ($_GET['pagetype']=='checkout') {
if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>checkout.php<?php } else { ?>checkout<?php }
} elseif ($_GET['pagetype']=='details') {
if ($_smarty_tpl->tpl_vars['USERFRIENDLY']->value=='N'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='fb'||$_smarty_tpl->tpl_vars['FB_DOMAIN_NAME']->value=='facebook') {?>restaurantDetails.php?resid=<?php echo $_GET['resid'];?>
&resname=<?php echo $_GET['resname'];
} else { ?>menu/<?php echo $_GET['resid'];?>
/<?php echo $_GET['resname'];
}
}?>" onsubmit="return customerLoginValidate_header();" >
					
						<?php if ($_GET['pagetype']=='checkout') {?>
							<!--<input type="hidden" name="filetype" id="filetype" value="checkout.php" />-->
							<input type="hidden" name="resid" id="resid" value="<?php echo $_REQUEST['resid'];?>
"/>
							<input type="hidden" name="offer" id="offer" value="<?php echo $_REQUEST['offer'];?>
" />
							<input type="hidden" name="deliverypickup" id="deliverypickup" value="<?php echo $_REQUEST['deliverypickup'];?>
"/>
						<?php }?>
							<div class="contain">
								<!--<div class="mandatoryField mandotaryRite">
									<span class="redStar">*</span> - <?php echo $_smarty_tpl->tpl_vars['LANG']->value['customer_login_mandatory_fields'];?>

								</div>-->
								<div class="clr"></div>
								<span id="errormsg5" class="errormsg_login_head" style="margin: 0;text-align: center;width: 100%;"></span>
								<?php if ($_smarty_tpl->tpl_vars['message']->value!='') {?><span style="color:green;"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</span><?php }?>
								<div class="form-group">
									<label for="customer_logemail_header"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['home_email'];?>
:</label></label>
						<!--		<li><input type="text" class="txtbox" name="customer_logemail" id="customer_logemail" value="email" /></li><i></i>-->
								<!--<li><input type="text" class="txtbox customer_logemail_head" name="customer_logemail_header" id="customer_logemail_header" autocomplete="off" value="<?php if ($_smarty_tpl->tpl_vars['cookieusermail']->value!='') {
echo $_smarty_tpl->tpl_vars['cookieusermail']->value;
} else { ?>e-mail<?php }?>" onfocus="if (this.value == '<?php if ($_smarty_tpl->tpl_vars['cookieusermail']->value!='') {
echo $_smarty_tpl->tpl_vars['cookieusermail']->value;
} else { ?>e-mail<?php }?>')this.value='';" onblur="if(this.value == '')this.value='<?php if ($_smarty_tpl->tpl_vars['cookieusermail']->value!='') {
echo $_SESSION['customer_logemail'];
} else { ?>email<?php }?>';"  /></li>-->
									<input type="text" class="form-control" name="customer_logemail_header" id="customer_logemail_header" autocomplete="off" value="<?php if ($_smarty_tpl->tpl_vars['cookieusermail']->value!='') {
echo $_smarty_tpl->tpl_vars['cookieusermail']->value;
}?>" placeholder="e-mail"/>
								<!--<?php echo '<script'; ?>
>document.customerlogin.customer_logemail.focus();<?php echo '</script'; ?>
>-->
								 </div>
								
									<span class="customForgot">
										<a data-target="#customerforgetpop" href="javascript:void(0);" data-toggle="modal" onclick="return customerForgetPasswordPopup();" class="color2" ><?php echo $_smarty_tpl->tpl_vars['LANG']->value['home_customer_login_fpwd'];?>
</a>
									</span>
							   
								 <div class="form-group">
									<label for="customer_logpassword_header"><span class="redStar">*</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['home_password'];?>
:</label></label>
									<input type="password" class="form-control" name="customer_logpassword_header" id="customer_logpassword_header" autocomplete="off" value="<?php if ($_smarty_tpl->tpl_vars['cookieuserpassword']->value!='') {
echo $_smarty_tpl->tpl_vars['cookieuserpassword']->value;
}?>" placeholder="password"/>
								</div>
							  
									<span class="customForgot pull-left"><input class="headChckBox" type="checkbox" name="rememberme" id="rememberme" value="Yes" <?php if ($_smarty_tpl->tpl_vars['cookieusermail']->value!=''&&$_smarty_tpl->tpl_vars['cookieuserpassword']->value!='') {?> checked="checked"<?php }?> /><?php echo $_smarty_tpl->tpl_vars['LANG']->value['home_remember_me'];?>
</span>
									
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
<?php }} ?>
